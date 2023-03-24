<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\addBloodModel;
use App\Models\discardBloodModel;
use App\Models\hospitalRequestModel;
use App\Models\distributeBloodModel;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\enrollementModel;

class techController extends Controller
{
    function discardblood(Request $req)
    {
 
    }

    function distribute()
    {
        $dist = hospitalRequestModel::all()->where('readat', '=', 'unread');
        return view('technitian.distributeToHospital', ['dist' => $dist]);
    }

    function saveddistribute(Request $req)
    {

     
    }

    function testBlood()
    {
        $data = enrollementModel::where('status', '=', 'in progress')->get();
        return view('technitian.testBlood', ['data' => $data]);
    }

    function approved($id)
    {
        $data = enrollementModel::find($id);

        $data->status = "approve";
        $data->save();
        return redirect()->back();
    }

    function discards(Request $req, $id)
    {
        $var = new discardBloodModel;
        $var->user_id = $req->user_id;
        $var->bloodGroup = $req->bloodtype;
        $var->unitdiscarded = $req->volume;
        $var->reason = $req->reason;
        $var->save();
        if ($var) {

            $data = enrollementModel::find($id);
            $data->delete();
            return redirect()->back();
        }
    }
    function addblood(Request $req)
    {
        $var = new addBloodModel;
        $var->user_id = $req->user_id;
        $var->bloodgroup = $req->bloodtype;
        $var->volume = $req->volume;
        $var->packno = $req->packno;
        $var->donationtype = $req->donationtype;
        $var->save();
        return redirect()->back()->with('success', 'Task Added Successfully!');
        //return redirect()->with('success', 'Task Added Successfully!');
    }

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

    function filldiscard(Request $req, $id)
    {
        $var = new discardBloodModel;
        $var->user_id = $req->user_id;
        $var->bloodGroup = $req->bloodtype;
        $var->unitdiscarded = $req->volume;
        $var->reason = $req->reason;
        $var->save();
        if ($var) {
            $data = addBloodModel::find($id);
            $data->delete();
            return redirect()->back()->with('success', 'Task Added Successfully!');
        }
        //return redirect('technitian/viewstoredblood')->with('success', 'Task Added Successfully!');
    }
    function read($id)
    {
        $res = hospitalRequestModel::find($id);
        $res->readat = "read";
        $res->save();
        return redirect()->back();
    }
    function ExpiredBlood()
    {
        $date = \Carbon\Carbon::today()->subDays(1);
        $blood = addBloodModel::where('created_at', '<=', $date)->get();
        return view('technitian.expired', compact('blood'));
    }

    function viewblood()
    {

        $bloods = addBloodModel::paginate(10);
        $numberof_message = hospitalRequestModel::where('readat', 'unread')->count();

        $date = \Carbon\Carbon::today()->subDays(1);
        $notification = addBloodModel::where('created_at', '<=', $date)->count();
        $aplus = addBloodModel::where('bloodgroup', 'A+')->sum('volume');
        $aminus = addBloodModel::where('bloodgroup', 'A-')->sum('volume');
        $oplus = addBloodModel::where('bloodgroup', 'O+')->sum('volume');
        $ominus = addBloodModel::where('bloodgroup', 'O-')->sum('volume');
        $bplus = addBloodModel::where('bloodgroup', 'B+')->sum('volume');
        $bminus = addBloodModel::where('bloodgroup', 'B-')->sum('volume');
        $abplus = addBloodModel::where('bloodgroup', 'AB+')->sum('volume');
        $abminus = addBloodModel::where('bloodgroup', 'AB-')->sum('volume');
        return view('technitian.technitanHome', compact('bloods', 'numberof_message', 'notification', 'aplus', 'aminus', 'oplus', 'ominus', 'bplus', 'bminus', 'abplus', 'abminus',));
    }
    function handling()
    {
        //$dist = addBloodModel::all()->where('status', '=', 'notexpired');
        return view('technitian.handling');
    }


    function Profile($id)
    {
        $isExist = User::select("*")
            ->where("id", $id)
            ->exists();
        if ($isExist) {
            $data = User::all()->where('id', '=', $id);
            return view('technitian.profile', ['data' => $data]);
        }
    }
    function updateProfile(Request $req, int $id)
    {

        User::where("id", $id)
            ->update(["name" => $req->name, "email" => $req->email, "phone" => $req->phone]);
        return redirect()->back()->with('success', 'your Profile,Changed');
    }

    function updatephoto(Request $req, int $id)
    {

        $var = User::all()->where('id', '=', $id);
        if ($req->hasfile('photo')) {
            $file = $req->file('photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/registers', $filename);
            $var->photo = $filename;
        }
        User::where("id", $id)
            ->update(["photo" => $filename]);
        //return redirect('nurse/home');
        return redirect()->back()->with('success', 'your Image,Changed');
    }
    function changepassword(Request $req)
    {
        # Validation
        $req->validate([
            'oldpassword' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $currentPasswordStatus = Hash::check($req->oldpassword, auth()->user()->password);
        if ($currentPasswordStatus) {

            User::findOrFail(auth()->user()->id)->update([
                'password' => Hash::make($req->password)
            ]);
            return redirect()->back()->with('success', 'password changed Successfully!');
        } else {
            return redirect()->back()->with('warnig', 'password not match with old!');
        }
    }
}
