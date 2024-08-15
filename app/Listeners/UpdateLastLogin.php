<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;

class UpdateLastLogin
{
    public function handle(Login $event)
    {
        $user = $event->user;
        $user->last_login_at = now();
        $user->save();
    }
}
