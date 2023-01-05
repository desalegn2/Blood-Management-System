<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Notification;
use App\Notifications\sendNotification;

class adminnotificationController extends Controller
{
    public function sendnotification(Request $request)
    {
        $user = User::find($request);

        $details = [
            // 'greeting' => $request->greeting,
            // 'body' => $request->body,
            // 'acttext' => $request->acttext,
            // 'actionurl' => $request->url,
            // 'lastline' => $request->lastline,
            'greeting' => 'hi',
            'body' => 'wellcome',
            'acttext' => 'you can login',
            'actionurl' => 'goto to login',
            'lastline' => 'jvsdhvds',
        ];
        Notification::send($user, new sendNotification($details));
        dd("done");
    }
}
