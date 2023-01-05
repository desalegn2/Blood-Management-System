<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\addBloodModel;
use App\Models\discardBloodModel;
use App\Models\adminsend;

class techController extends Controller
{

    function view()
    {
        $blood = addBloodModel::all()->where('status', '=', 'notexpired');
        return view('technitian.viewStoredBlood', ['blood' => $blood]);
    }
    function discard($id)
    {

        $blood = addBloodModel::find($id);
        $blood->status = "discard";
        $blood->save();
        return redirect()->back();
    }

    function setExpaired()
    {
        $dist = addBloodModel::all()->where('status', '=', 'notexpired');
        return view('technitian.viewStoredBlood', ['dist' => $dist]);
    }

    function filldiscard(Request $req)
    {
        $var = new discardBloodModel;
        $var->user_id = $req->user_id;
        $var->bloodgroup = $req->bloodgroup;
        $var->unitdiscarded = $req->bloodgroup;
        $var->reason = $req->bloodgroup;
        $var->save();
        return redirect('technitian/viewstoredblood')->with('success', 'Task Added Successfully!');
    }
    function read($id)
    {
        $res = adminsend::find($id);
        $res->readat = "read";
        $res->save();
        return redirect()->back();
    }
}
