<?php

namespace App\Jobs;

use App\Mail\NewCategoryPublishedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendNewCategoryPublishedJob implements ShouldQueue
{
    use Dispatchable, Queueable, SerializesModels, InteractsWithQueue;

    /**
     * Create a new job instance.
     */

    public string $email;
    public string $category;

    public function __construct(string $email, string $category)
    {
        $this->email = $email;
        $this->category = $category;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)->send(new NewCategoryPublishedMail($this->category));
    }
}
