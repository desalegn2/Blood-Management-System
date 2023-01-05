<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\discardBloodModel;
use App\Models\technicianOrderModel;
use App\Models\distributeBloodModel;
use App\Models\adminsend;

class discardBloodControlle extends Controller
{
    function discardblood(Request $req)
    {
        $var = new discardBloodModel;
        $var->bloodGroup = $req->bloodtype;
        $var->unitdiscarded = $req->unitdiscard;
        $var->discarddate = $req->date;
        $var->centerid = $req->centerid;
        $var->reason = $req->message;
        $var->save();
        return redirect('technitian/discardblood');
    }

    function distribute()
    {
        $dist = adminsend::all()->where('readat', '=', 'unread');
        return view('technitian.distributeToHospital', ['dist' => $dist]);
    }


    function saveddistribute(Request $req)
    {
        $var = new distributeBloodModel;
        $var->user_id = $req->user_id;
        $var->bloodgroup = $req->bloodtype;
        $var->volume = $req->volume;
        $var->issueddate = $req->issuedate;
        $var->expirydate = $req->expirydate;
        $var->recievedby = $req->centerid;
        $var->save();
        return redirect('technitian/distributetohospital')->with('success', 'Task Added Successfully!');
    }
    function read($id)
    {

        $res = adminsend::find($id);
        $res->readat = "read";
        $res->save();
        return redirect()->back();
    }
}
