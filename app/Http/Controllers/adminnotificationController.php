<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Notification;
use App\Notifications\sendNotification;

class adminnotificationController extends Controller
{

    public function sendnotification($id)
    {

        $user = User::find($id);
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
            'lastline' => 'last information',
        ];

        Notification::send($user, new sendNotification($details));
        //return view('admin.viewNewUser');
        return redirect('admin/home')->with('success', 'Task Added Successfully!');
        // return redirect()->back()->with('success', 'Task Added Successfully!');
    }
}
