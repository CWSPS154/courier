<?php

/**
 * PHP Version 8.1.11
 * Laravel Framework 9.43.0
 *
 * @category Listener
 *
 * @author CWSPS154 <codewithsps154@gmail.com>
 * @license MIT License https://opensource.org/licenses/MIT
 *
 * @link https://github.com/CWSPS154
 *
 * Date 11/12/22
 * */

namespace App\Listeners\Admin;

use App\Mail\SendToDriver;
use App\Models\User;
use App\Notifications\NewNotification;
use Illuminate\Support\Facades\Mail;
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
        $user = User::findOrFail($event->user);
        Mail::to($user->email)->send(new SendToDriver($user->name, $event->order_job_id, $event->job));
//        if ($user->driver->company_email) {
//            $notification = 'Your driver '.$user->name.' has been assigned to a new job, Job ID:'.$event->order_job_id;
//            Notification::route('mail', $user->driver->company_email)
//                ->notify(new NewNotification($notification));
//        }
    }
}
