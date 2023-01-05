<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\addBloodModel;

class addBloodController extends Controller
{
    function addblood(Request $req)
    {
        $var = new addBloodModel;
        $var->user_id = $req->user_id;
        $var->bloodgroup = $req->bloodtype;
        $var->volume = $req->volume;
        $var->donationtype = $req->donationtype;
        $var->save();
        return redirect('technitian/addbloods')->with('success', 'Task Added Successfully!');
    }
}
