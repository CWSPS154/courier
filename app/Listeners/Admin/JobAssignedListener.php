<?php

/**
 * PHP Version 8.1.11
 * Laravel Framework 9.43.0
 *
 * @category Listener
 *
 * @package Laravel
 *
 * @author CWSPS154 <codewithsps154@gmail.com>
 *
 * @license MIT License https://opensource.org/licenses/MIT
 *
 * @link https://github.com/CWSPS154
 *
 * Date 11/12/22
 * */

namespace App\Listeners\Admin;

use App\Notifications\NewNotification;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Mail\SendToDriverCompany;

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
        $content = 'Your driver '.$user->name.' has been assigned to a new job, Job ID:'.$event->order_job_id ;
        Notification::send($user, new NewNotification($notification));
        if($user->driver->company_email) {
            Mail::to($user->driver->company_email)->send(new SendToDriverCompany($content));
        }
    }
}
