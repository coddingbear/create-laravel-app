<?php

namespace App\Providers\App\Listeners;

use App\Providers\App\Events\AritclesEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ArticlesEventListener
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
     * @param  AritclesEvent  $event
     * @return void
     */
    public function handle(AritclesEvent $event)
    {
        //
    }
}
