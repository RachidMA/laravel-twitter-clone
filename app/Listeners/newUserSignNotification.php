<?php

namespace App\Listeners;

use App\Events\newUserSign;
use App\Notifications\newUserNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class newUserSignNotification  implements ShouldQueue
{

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(newUserSign $event): void
    {
        Log::info('SENDING NOTIFICTION TO NEW JOINED USER');


        $event->user->notify(new newUserNotification());
    }
}
