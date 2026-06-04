<?php

namespace App\Listeners;

use App\Events\ApplicationStatusChanged;
use App\Notifications\ApplicationStatusNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyCandidateOnStatusChange implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ApplicationStatusChanged $event): void
    {
        $candidate = $event->application->user;
        $candidate->notify(new ApplicationStatusNotification($event->application, $event->oldStatus, $event->newStatus));
    }
}
