<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Novu\Laravel\Facades\Novu;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Http;

class SendDailyQuotesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $users;
    /**
     * Create a new job instance.
     */
    public function __construct($users)
    {
        $this->users = $users;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Make a http call to get random quotes through api
        $response  = Http::get(config('quotes.quoteURL'));
        $dailyQuotes = json_decode($response->body());
        
        // Get all the subscribed users
        foreach ($this->users as $user) {
            // Trigger the Novu event to sent daily quotes to the user
            $response = Novu::triggerEvent([
                'name' => 'send-daily-quotes',
                'payload' => ['dailyQuotes' => $dailyQuotes],
                'to' => [
                    'subscriberId' => config('novuworkflow.emailSubscriberId'),
                    'email' => $user->email,
                ]
            ])->toArray();
        }

        echo "success";
    }
}
