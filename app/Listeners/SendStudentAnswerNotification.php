<?php

namespace App\Listeners;

use App\Events\StudentAnswer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendStudentAnswerNotification
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
     * @param  StudentAnswer  $event
     * @return void
     */
    public function handle(StudentAnswer $event)
    {
        //
    }
}
