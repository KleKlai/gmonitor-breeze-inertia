<?php

namespace App\Listeners;

use App\Events\AskQuestion;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendAskQuestionNotification
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
     * @param  AskQuestion  $event
     * @return void
     */
    public function handle(AskQuestion $event)
    {
        //
    }
}
