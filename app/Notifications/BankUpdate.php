<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class BankUpdate extends Notification implements ShouldQueue
{
    use Queueable;

    protected $monto;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($monto)
    {
        $this->monto = $monto;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Gordos Bank account')
                    ->line('Your balance have changed by '. $this->monto)
                    ->action('check my bank', url('/cuentas'))
                    ->line('Thank you for using Gordos Bank');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
