<?php

namespace App\Listeners;

use App\Events\UpdateToBanckEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Notification;
use App\Notifications\BankUpdate;

class UpdateToBanckListener
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
     * @param  UpdateToBanckEvent  $event
     * @return void
     */
    public function handle(UpdateToBanckEvent $event)
    {
        Notification::route('mail', 'gustavo4581@gmail.com')
            ->route('mail', 'prosa85@yahoo.com')
            ->notify(new BankUpdate($event->monto));
    }
}
