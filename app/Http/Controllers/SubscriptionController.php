<?php

namespace App\Http\Controllers;

use App\Events\NewUserSubscribed;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Novu\Laravel\Facades\Novu;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscriptions,email'
        ]);
       
        //  store user
        $userSubscription = Subscription::create([
            'email' => $request->email
        ]);

        // if user successfully stored send notifications to the newly registered user and admin
        if ($userSubscription) {
            // event listening to newly registed email
            event(new NewUserSubscribed($request->email));
            return redirect()->back()->with('success', 'Subscribed successfully!');
            
        }
        return redirect()->back()->with('error', 'You are not subscribed');
    }
}
