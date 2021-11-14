<?php

namespace App\Listeners;

use App\Events\NewQuestion;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNewQuestionNotification
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
     * @param  NewQuestion  $event
     * @return void
     */
    public function handle(NewQuestion $event)
    {
        //
    }
}
