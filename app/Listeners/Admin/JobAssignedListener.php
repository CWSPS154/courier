<?php

namespace App\Listeners\Admin;

use App\Notifications\NewNotification;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class JobAssignedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $notification = 'You have assigned to a new job, Job ID:'.$event->order_job_id ;
        $user=User::findOrFail($event->user);
        Notification::send($user, new NewNotification($notification));
    }
}
