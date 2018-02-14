<?php

namespace App\Listeners;

use App\Events\UpdateToBanckEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        //
    }
}
