<?php

namespace App\Notifications\Wallet;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class EmailWalletDetails extends Notification
{
    use Queueable;

    protected $user, $bitcoin, $ether;
    
    public function __construct($user, $bitcoin, $ether)
    {
        $this->user =  $user;
        $this->ether  = $ether;
        $this->bitcoin = $bitcoin;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

   
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Your Wallet Details')
                    ->line(message('walletTextOne'))
                    ->line('BTC Addresses = '. $this->bitcoin->address)
                    ->line('Ether Addresses = '. $this->ether->address)
                    ->line('Ether Private key = '. $this->ether->privateKey)
                    ->line('Ether passphrase = '. $this->ether->mnemonic)
                    ->line(message('walletclosing'));
    }

}
