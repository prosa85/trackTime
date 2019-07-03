<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Notifications\TrackMessage;

class WeeklyReport extends Notification
{
    use Queueable;
    protected $user,$times,$total,$week;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $timetrack)
    {
        $this->user = $user;
        $this->times = $timetrack;
        $this->total = $timetrack->sum('hours');
        $this->week = $timetrack->first()->week? $timetrack->first()->week : Carbon::now()->weekOfYear() - 1;
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
        return (new TrackMessage)
                    ->greeting('Hello '. $this->user->name. ', Here is your report for Week '. $this->week)
                    ->addtimes($this->times)
                    ->line('Your Accumulated hours for last week is:'. $this->total)
                    ->action('Update hours', url('/'))
                    ->line('Thank you for using timeTrack!');
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
