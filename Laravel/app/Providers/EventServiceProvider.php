<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Listeners\SendWelcomeEmail;
use App\Events\UserRegistered;

class EventServiceProvider extends ServiceProvider
{
    
    protected $listen = [
        'App\Events\UserCreated' => [
            'App\Listeners\SendWelcomeEmail',
        ],
    ];

   
    public function boot()
    {
        //
    }
}
