<?php

namespace App\Listeners;

use App\Events\UserCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;


class SendWelcomeEmail
{
    
    public function __construct()
    {
        //
    }

  
    public function handle(UserCreated $event)
    {
       $user = $event->user;
        $data = array('name'=>$user->first_name, 'email'=>$user->email);
        Mail::send('emails.welcome', $data, function($message) use ($user) {
            $message->to($user->email);
            $message->subject('Account Created');
        });
    }
}
