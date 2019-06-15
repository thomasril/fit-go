<?php

namespace App\Http\Controllers;

use App\Notification;
use App\Notifications\SMSNotification;
use App\User;
use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class NotificationController extends Controller
{
    public function sendSMSNotification(){
        $user = User::find(3);
        $nexmo = app('Nexmo\Client');
        $nexmo->message()->send([
            'to' => '+6281351911928',
            'from' => 'Fitgo',
            'text' => 'Sayang, kita pulang yuk',
        ]);
        return "Success";
    }
}
