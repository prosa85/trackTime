<?php

namespace App\Listeners;

use App\Events\UpdateToBanckEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Notification;
use App\Cuenta;
use App\Notifications\BankUpdate;

class UpdateToBanckListener implements ShouldQueue
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
        $cuentas = Cuenta::all();
        $total = $cuentas->sum('amount');

        Notification::route('mail', 'prosa85@yahoo.com')
            ->notify(new BankUpdate($event->monto->amount,$total));
        
        Notification::route('mail', 'gustavo4581@gmail.com')
            ->notify(new BankUpdate($event->monto->amount,$total));
    }
}
