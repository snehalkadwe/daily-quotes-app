<?php

namespace App\Console\Commands;

use App\Jobs\SendDailyQuotesJob;
use App\Models\Subscription;
use Illuminate\Console\Command;

class SendDailyQuotes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quotes:send-daily-quotes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will send the quotes to the subscribed users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get all users
        $users = Subscription::get();
        // Dispatch a job
        SendDailyQuotesJob::dispatch($users);
    }
}
