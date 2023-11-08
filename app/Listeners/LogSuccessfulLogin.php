<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Spatie\Activitylog\LogOptions;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Spatie\Activitylog\Traits\LogsActivity;

class LogSuccessfulLogin
{
    use LogsActivity;

    public function handle(Login $event)
    {
        $user = $event->user;

        activity('logged_in')
            ->performedOn($user)
            ->log('User logged in');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
}
