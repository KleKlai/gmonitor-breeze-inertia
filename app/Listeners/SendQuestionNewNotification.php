<?php

namespace App\Listeners;

use App\Events\QuestionNew;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendQuestionNewNotification
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
     * @param  \App\Events\QuestionNew  $event
     * @return void
     */
    public function handle(QuestionNew $event)
    {
        //
    }
}
