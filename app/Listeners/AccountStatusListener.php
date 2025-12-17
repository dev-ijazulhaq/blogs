<?php

namespace App\Listeners;

use App\Events\AccountStatusEvent;
use App\Mail\AccountStatusMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AccountStatusListener
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

    public function handle(AccountStatusEvent $event): void
    {
        Log::info("AccountStatusEvent fired", [
            'user_id' => $event->user->id,
            'email' => $event->user->email,
            'status' => $event->user->status->label()
        ]);
        Mail::to($event->user->email)
            ->send(new AccountStatusMail($event->user));
    }
}
