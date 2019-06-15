<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function subscription(){
        $month = request()->month;
        $now = date('Y-m-d');
        $subscription = new Subscription();
        $subscription->owner_id = Auth::user()->id;
        $subscription->price = 99999;
        $subscription->start_date = $now;
        $subscription->end_date = $subscription->end_date = date('Y-m-d', strtotime("+$month month", strtotime($now)));
        $subscription->save();
        return redirect()->back();
    }
}
