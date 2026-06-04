<?php

namespace App\Notifications;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;

use Illuminate\Notifications\Notification;

class ApplicationStatusNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

    public function __construct ( public Application $application, public string $oldStatus, public string $newStatus)
    {
      
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database','mail', 'broadcast'];
    }

    public function toDatabase(object $notifiable):array{
        return [
            'application_id' => $this->application->id,
            'company_job_id' => $this->application->companyJob->id,
            'company_id' => $this->application->companyJob->company->id,
            'user_id' => $this->application->companyJob->company->user_id,
            'message' => 'Your application for ' . $this->application->companyJob->title . ' has changed status from ' . $this->oldStatus . ' to ' . $this->newStatus,
             'link' => route('candidate.dashboard'),
             
            'created_at' => now(),
        ];
    }

    public function toBroadcast(object $notifiable): BroadCastMessage{
        return new BroadcastMessage([
            'application_id' => $this->application->id,
            'company_job_id' => $this->application->companyJob->id,
            'company_id' => $this->application->companyJob->company->id,
            'user_id' => $this->application->companyJob->company->user_id,
            'message' => 'Your application for ' . $this->application->companyJob->title . ' has changed status from ' . $this->oldStatus . ' to ' . $this->newStatus,
             'link' => route('candidate.dashboard'),
             
            'created_at' => now(),
        ]);
    }



    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
           ->subject('Application Status Changed:'. $this->application->companyJob->title)
           ->view('emails.application-status-changed', [
                'candidate_name' => $this->application->user->name,
                'old_status' => $this->oldStatus,
                'new_status' => $this->newStatus,
                'job_title' => $this->application->companyJob->title,
                'company_name' => $this->application->companyJob->company->name,
                'job_location' => $this->application->companyJob->location,
                'application_url' => route('candidate.dashboard'),
                'unsubscribe_url' => 'https://example.com/unsubscribe',
                'new_status_color' => match($this->newStatus){
                    'pending' => 'gray',
                    'reviewing' => 'blue',
                    'shortlisted' => 'yellow',
                    'interviewing' => 'orange',
                    'rejected' => 'red',
                    'hired' => 'green',
                    default => 'gray',
                }

           ]
           );
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
