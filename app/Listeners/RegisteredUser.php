<?php

namespace App\Listeners;

use App\User;
use App\Events\UserHasRegistered;
use App\Notifications\RegisteredUser as Notification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisteredUser
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
     * @param  UserHasRegistered  $event
     * @return void
     */
    public function handle(UserHasRegistered $event)
    {
        $admin = User::where('email', config('app.email'))->first();
        $admin->notify(new Notification($event->user));
    }
}
