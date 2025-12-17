<?php

namespace App\Listeners;

use App\Events\BlogPublishEvent;
use App\Mail\BlogPublishMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class BlogPublishListener
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
    public function handle(BlogPublishEvent $event): void
    {
        Mail::to($event->user->email)->send(new BlogPublishMail($event->blog->title));
    }
}
