<?php

namespace App\Listeners;

use App\Events\JobApplicationSubmitted;
use App\Notifications\ApplicationReceivedNotification;
use App\Services\ApplicationService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyEmployerOnApplication
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     */
    public function handle(JobApplicationSubmitted $event): void
    {
        $employer = $event->application->companyJob->company->user;
        $employer->notify(new ApplicationReceivedNotification($event->application));

    }
}
