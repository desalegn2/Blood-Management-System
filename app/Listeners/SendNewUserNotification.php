<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use Illuminate\Notifications\Notification;
use App\Notifications\orderTechnician;
use App\Models\hospitalRequestModel;

class SendNewUserNotification
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

        // $admins = hospitalRequestModel::whereHas('roles', function ($query) {
        //     $query->where('id', 1);
        // })->get();

        // Notification::send($admins, new orderTechnician($event->user));
    }
}
