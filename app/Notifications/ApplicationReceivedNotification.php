<?php

namespace App\Notifications;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class ApplicationReceivedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Application $application)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'mail', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            // ready to display — no extra queries needed
            'message' => $this->application->user->name .
                ' applied for ' .
                $this->application->companyJob->title,
            'link' => route('employer.applicants.show', $this->application->id),

            // extra data if needed later
            'application_id' => $this->application->id,
            'job_title' => $this->application->companyJob->title,
            'candidate_name' => $this->application->user->name,
            'created_at' => $this->application->created_at,
        ];
    }
    public function toBroadcast(object $notifiable): BroadcastMessage
    {
        return new BroadcastMessage([
            'message' => $this->application->user->name .
                ' applied for ' .
                $this->application->companyJob->title,
            'link' => route('employer.applicants.show', $this->application->id),
            'created_at' => $this->application->created_at,
            'id' => $this->application->id,
        ]);
    }
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Application Received: ' . $this->application->companyJob->title)
            ->view('emails.application-received', [
                'employerName' => $notifiable->name,
                'jobTitle' => $this->application->companyJob->title,
                'candidateName' => $this->application->user->name,
                'candidateEmail' => $this->application->user->email,
                'appliedAt' => $this->application->created_at->format('M d, Y H:i A'),
                'dashboardUrl' => route('employer.dashboard'),
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
