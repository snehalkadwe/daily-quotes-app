<?php

namespace App\Listeners;

use App\Models\User;
use Novu\Laravel\Facades\Novu;
use App\Events\NewUserSubscribed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNewUserSubscribedNovuNotification
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
    public function handle(NewUserSubscribed $event): void
    {
         // create and trigger novu email event to send notification
        // send email to newly registed user
        $subscriberId = config('novuworkflow.emailSubscriberId');
        $response = Novu::triggerEvent([
            'name' => 'daily-quote-generator-app',
            'to' => [
                'subscriberId' => $subscriberId,
                'email' =>  $event->email
            ]
        ])->toArray();

        // send notification to admin
        $admin = User::where('is_admin', 1)->first();
        if ($admin) {
            // create and trigger novu email event
            $response = Novu::triggerEvent([
                'name' => 'testemail',
                'payload' => ['userEmail' => $event->email],
                'to' => [
                    'subscriberId' => $subscriberId,
                    'email' => $admin->email,
                    'phone' => ''
                ]
            ])->toArray();
        }

    }
}
