<?php

namespace App\Notifications\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class EmailVerificationToken extends Notification
{
    use Queueable; protected $user;
    public function __construct($user)
    {   
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }
    
    public function toMail($notifiable)
    {
        $user_id = $this->user->hashId();
        $url =  url('/verify-email/'.urlencode($this->user->emailmagictoken->email_token).'/'.$user_id);
        return (new MailMessage)
                    ->subject('Validate Your Email')
                    ->greeting('Hello!')
                    ->line('Thank for registring with us. Please click the button below to validate your account.')
                    ->action('Validate Email', $url)
                    ->line('If you did not register with us please discard this email.')
                    ->line('Thank you for using our application!');
    }
}
