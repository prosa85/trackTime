<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class BankUpdate extends Notification implements ShouldQueue
{
    use Queueable;

    protected $monto, $total, $level;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($monto, $total)
    {
        $this->monto = $monto;
        $this->total = $total;
        $this->level  = $monto>0? 'success' : 'error';
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
                    ->level($this->level)
                    ->subject('Gordos Bank account')
                    ->greeting('Hey Gordo,')
                    ->line('Your balance have changed by '. $this->monto)
                    ->line('Gordos final balance is '. $this->total)
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
