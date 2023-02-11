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


        $aplus_stored = addBloodModel::where('bloodgroup', 'A+')->sum('volume');
        $aminus_stored = addBloodModel::where('bloodgroup', 'A-')->sum('volume');
        $oplus_stored = addBloodModel::where('bloodgroup', 'O+')->sum('volume');
        $ominus_stored = addBloodModel::where('bloodgroup', 'O-')->sum('volume');
        $bplus_stored = addBloodModel::where('bloodgroup', 'B+')->sum('volume');
        $bminus_stored = addBloodModel::where('bloodgroup', 'B-')->sum('volume');
        $abplus_stored = addBloodModel::where('bloodgroup', 'AB+')->sum('volume');
        $abminu_stored = addBloodModel::where('bloodgroup', 'AB-')->sum('volume');

        $aplusdiscard = discardBloodModel::where('bloodgroup', 'A+')->sum('unitdiscarded');
        $aminudiscard = discardBloodModel::where('bloodgroup', 'A-')->sum('unitdiscarded');
        $bplusdiscard = discardBloodModel::where('bloodgroup', 'B+')->sum('unitdiscarded');
        $bminusdiscard = discardBloodModel::where('bloodgroup', 'B-')->sum('unitdiscarded');
        $abplusdiscard = discardBloodModel::where('bloodgroup', 'AB+')->sum('unitdiscarded');
        $abminudiscard = discardBloodModel::where('bloodgroup', 'AB-')->sum('unitdiscarded');
        $oplusdiscard = discardBloodModel::where('bloodgroup', 'O+')->sum('unitdiscarded');
        $ominusdiscard = discardBloodModel::where('bloodgroup', 'O-')->sum('unitdiscarded');

        $aplusdistribute = distributeBloodModel::where('bloodgroup', 'A+')->sum('volume');
        $aminusdistribute = distributeBloodModel::where('bloodgroup', 'A-')->sum('volume');
        $bplusdistribute = distributeBloodModel::where('bloodgroup', 'B+')->sum('volume');
        $bminusdistribute = distributeBloodModel::where('bloodgroup', 'B-')->sum('volume');
        $abplusdistribute = distributeBloodModel::where('bloodgroup', 'AB+')->sum('volume');
        $abminusdistribute = distributeBloodModel::where('bloodgroup', 'AB-')->sum('volume');
        $oplusdistribute = distributeBloodModel::where('bloodgroup', 'O+')->sum('volume');
        $ominusdistribute = distributeBloodModel::where('bloodgroup', 'O-')->sum('volume');
        //$total = $aplus + $aminus + $oplus + $ominus + $bplus + $bminus + $abplus + $abminus;
        $aplus = $aplus_stored - $aplusdiscard - $aplusdistribute;
        $aminus = $aminus_stored - $aminudiscard - $aminusdistribute;
        $bplus = $bplus_stored - $bplusdiscard - $bplusdistribute;
        $bminus = $bminus_stored - $bminusdiscard - $bminusdistribute;
        $abplus = $abplus_stored - $abplusdiscard - $abplusdistribute;
        $abminus = $abminu_stored - $abminudiscard - $abminusdistribute;
        $oplus = $oplus_stored - $oplusdiscard - $oplusdistribute;
        $ominus = $ominus_stored - $ominusdiscard - $ominusdistribute;
        if ($req->bloodtype == 'A+') {
            if ($aplus >= $req->unitdiscard) {
                $var = new discardBloodModel;
                $var->user_id = $req->user_id;
                $var->bloodGroup = $req->bloodtype;
                $var->unitdiscarded = $req->unitdiscard;
                $var->reason = $req->message;
                $var->save();

                return redirect('technitian/discardblood')->with('success', 'Task Added Successfully!');
            } else {
                return redirect('technitian/discardblood')->with('warning', 'you enter wrong amount!');
            }
        } else if ($req->bloodtype == 'A-') {
            if ($aminus >= $req->unitdiscard) {
                $var = new discardBloodModel;
                $var->user_id = $req->user_id;
                $var->bloodGroup = $req->bloodtype;
                $var->unitdiscarded = $req->unitdiscard;
                $var->reason = $req->message;
                $var->save();
                return redirect('technitian/discardblood')->with('success', 'Task Added Successfully!');
            } else {
                return redirect('technitian/discardblood')->with('warning', 'you enter wrong amount!');
            }
        } else if ($req->bloodtype == 'B-') {
            if ($bminus >= $req->unitdiscard) {
                $var = new discardBloodModel;
                $var->user_id = $req->user_id;
                $var->bloodGroup = $req->bloodtype;
                $var->unitdiscarded = $req->unitdiscard;
                $var->reason = $req->message;
                $var->save();
                return redirect('technitian/discardblood')->with('success', 'Task Added Successfully!');
            } else {
                return redirect('technitian/discardblood')->with('warning', 'you enter wrong amount!');
            }
        } else if ($req->bloodtype == 'B+') {
            if ($bplus >= $req->unitdiscard) {
                $var = new discardBloodModel;
                $var->user_id = $req->user_id;
                $var->bloodGroup = $req->bloodtype;
                $var->unitdiscarded = $req->unitdiscard;
                $var->reason = $req->message;
                $var->save();
                return redirect('technitian/discardblood')->with('success', 'Task Added Successfully!');
            } else {
                return redirect('technitian/discardblood')->with('warning', 'you enter wrong amount!');
            }
        } else if ($req->bloodtype == 'AB-') {
            if ($abminus >= $req->unitdiscard) {
                $var = new discardBloodModel;
                $var->user_id = $req->user_id;
                $var->bloodGroup = $req->bloodtype;
                $var->unitdiscarded = $req->unitdiscard;
                $var->reason = $req->message;
                $var->save();
                return redirect('technitian/discardblood')->with('success', 'Task Added Successfully!');
            } else {
                return redirect('technitian/discardblood')->with('warning', 'you enter wrong amount!');
            }
        } else if ($req->bloodtype == 'AB+') {
            if ($abplus >= $req->unitdiscard) {
                $var = new discardBloodModel;
                $var->user_id = $req->user_id;
                $var->bloodGroup = $req->bloodtype;
                $var->unitdiscarded = $req->unitdiscard;
                $var->reason = $req->message;
                $var->save();
                return redirect('technitian/discardblood')->with('success', 'Task Added Successfully!');
            } else {
                return redirect('technitian/discardblood')->with('warning', 'you enter wrong amount!');
            }
        } else if ($req->bloodtype == 'O-') {
            if ($ominus >= $req->unitdiscard) {
                $var = new discardBloodModel;
                $var->user_id = $req->user_id;
                $var->bloodGroup = $req->bloodtype;
                $var->unitdiscarded = $req->unitdiscard;
                $var->reason = $req->message;
                $var->save();
                return redirect('technitian/discardblood')->with('success', 'Task Added Successfully!');
            } else {
                return redirect('technitian/discardblood')->with('warning', 'you enter wrong amount!');
            }
        } else if ($req->bloodtype == 'O+') {
            if ($oplus >= $req->unitdiscard) {

                $var = new discardBloodModel;
                $var->user_id = $req->user_id;
                $var->bloodGroup = $req->bloodtype;
                $var->unitdiscarded = $req->unitdiscard;
                $var->reason = $req->message;
                $var->save();
                return redirect('technitian/discardblood')->with('success', 'Task Added Successfully!');
            } else {
                return redirect('technitian/discardblood')->with('warning', 'you enter wrong amount!');
            }
        }
    }

    function distribute()
    {
        $dist = hospitalRequestModel::all()->where('readat', '=', 'unread');
        return view('technitian.distributeToHospital', ['dist' => $dist]);
    }


    function saveddistribute(Request $req)
    {
        $aplus_stored = addBloodModel::where('bloodgroup', 'A+')->sum('volume');
        $aminus_stored = addBloodModel::where('bloodgroup', 'A-')->sum('volume');
        $oplus_stored = addBloodModel::where('bloodgroup', 'O+')->sum('volume');
        $ominus_stored = addBloodModel::where('bloodgroup', 'O-')->sum('volume');
        $bplus_stored = addBloodModel::where('bloodgroup', 'B+')->sum('volume');
        $bminus_stored = addBloodModel::where('bloodgroup', 'B-')->sum('volume');
        $abplus_stored = addBloodModel::where('bloodgroup', 'AB+')->sum('volume');
        $abminu_stored = addBloodModel::where('bloodgroup', 'AB-')->sum('volume');

        $aplusdiscard = discardBloodModel::where('bloodgroup', 'A+')->sum('unitdiscarded');
        $aminudiscard = discardBloodModel::where('bloodgroup', 'A-')->sum('unitdiscarded');
        $bplusdiscard = discardBloodModel::where('bloodgroup', 'B+')->sum('unitdiscarded');
        $bminusdiscard = discardBloodModel::where('bloodgroup', 'B-')->sum('unitdiscarded');
        $abplusdiscard = discardBloodModel::where('bloodgroup', 'AB+')->sum('unitdiscarded');
        $abminudiscard = discardBloodModel::where('bloodgroup', 'AB-')->sum('unitdiscarded');
        $oplusdiscard = discardBloodModel::where('bloodgroup', 'O+')->sum('unitdiscarded');
        $ominusdiscard = discardBloodModel::where('bloodgroup', 'O-')->sum('unitdiscarded');

        $aplusdistribute = distributeBloodModel::where('bloodgroup', 'A+')->sum('volume');
        $aminusdistribute = distributeBloodModel::where('bloodgroup', 'A-')->sum('volume');
        $bplusdistribute = distributeBloodModel::where('bloodgroup', 'B+')->sum('volume');
        $bminusdistribute = distributeBloodModel::where('bloodgroup', 'B-')->sum('volume');
        $abplusdistribute = distributeBloodModel::where('bloodgroup', 'AB+')->sum('volume');
        $abminusdistribute = distributeBloodModel::where('bloodgroup', 'AB-')->sum('volume');
        $oplusdistribute = distributeBloodModel::where('bloodgroup', 'O+')->sum('volume');
        $ominusdistribute = distributeBloodModel::where('bloodgroup', 'O-')->sum('volume');
        //$total = $aplus + $aminus + $oplus + $ominus + $bplus + $bminus + $abplus + $abminus;
        $aplus = $aplus_stored - $aplusdiscard - $aplusdistribute;
        $aminus = $aminus_stored - $aminudiscard - $aminusdistribute;
        $bplus = $bplus_stored - $bplusdiscard - $bplusdistribute;
        $bminus = $bminus_stored - $bminusdiscard - $bminusdistribute;
        $abplus = $abplus_stored - $abplusdiscard - $abplusdistribute;
        $abminus = $abminu_stored - $abminudiscard - $abminusdistribute;
        $oplus = $oplus_stored - $oplusdiscard - $oplusdistribute;
        $ominus = $ominus_stored - $ominusdiscard - $ominusdistribute;

        if ($req->bloodtype == 'A+') {
            if ($aplus >= $req->volume) {
                $var = new distributeBloodModel;
                $var->user_id = $req->user_id;
                $var->bloodgroup = $req->bloodtype;
                $var->volume = $req->volume;
                $var->issueddate = $req->issuedate;
                $var->expirydate = $req->expirydate;
                $var->recievedby = $req->centerid;
                $var->save();
                return redirect('technitian/distributetohospital')->with('success', 'Task Added Successfully!');
            } else {
                return redirect('technitian/discardblood')->with('warning', 'amount of blood stored less!');
            }
        } else if ($req->bloodtype == 'A-') {
            if ($aminus >= $req->volume) {
                $var = new distributeBloodModel;
                $var->user_id = $req->user_id;
                $var->bloodgroup = $req->bloodtype;
                $var->volume = $req->volume;
                $var->issueddate = $req->issuedate;
                $var->expirydate = $req->expirydate;
                $var->recievedby = $req->centerid;
                $var->save();
                return redirect('technitian/distributetohospital')->with('success', 'Task Added Successfully!');
            } else {
                return redirect('technitian/discardblood')->with('warning', 'amount of blood stored less!');
            }
        } else if ($req->bloodtype == 'B-') {
            if ($bminus >= $req->volume) {
                $var = new distributeBloodModel;
                $var->user_id = $req->user_id;
                $var->bloodgroup = $req->bloodtype;
                $var->volume = $req->volume;
                $var->issueddate = $req->issuedate;
                $var->expirydate = $req->expirydate;
                $var->recievedby = $req->centerid;
                $var->save();
                return redirect('technitian/distributetohospital')->with('success', 'Task Added Successfully!');
            } else {
                return redirect('technitian/discardblood')->with('warning', 'amount of blood stored less!');
            }
        } else if ($req->bloodtype == 'B+') {
            if ($bplus >= $req->volume) {
                $var = new distributeBloodModel;
                $var->user_id = $req->user_id;
                $var->bloodgroup = $req->bloodtype;
                $var->volume = $req->volume;
                $var->issueddate = $req->issuedate;
                $var->expirydate = $req->expirydate;
                $var->recievedby = $req->centerid;
                $var->save();
                return redirect('technitian/distributetohospital')->with('success', 'Task Added Successfully!');
            } else {
                return redirect('technitian/discardblood')->with('warning', 'amount of blood stored less!');
            }
        } else if ($req->bloodtype == 'AB-') {
            if ($abminus >= $req->volume) {
                $var = new distributeBloodModel;
                $var->user_id = $req->user_id;
                $var->bloodgroup = $req->bloodtype;
                $var->volume = $req->volume;
                $var->issueddate = $req->issuedate;
                $var->expirydate = $req->expirydate;
                $var->recievedby = $req->centerid;
                $var->save();
                return redirect('technitian/distributetohospital')->with('success', 'Task Added Successfully!');
            } else {
                return redirect('technitian/discardblood')->with('warning', 'amount of blood stored less!');
            }
        } else if ($req->bloodtype == 'AB+') {
            if ($abplus >= $req->volume) {
                $var = new distributeBloodModel;
                $var->user_id = $req->user_id;
                $var->bloodgroup = $req->bloodtype;
                $var->volume = $req->volume;
                $var->issueddate = $req->issuedate;
                $var->expirydate = $req->expirydate;
                $var->recievedby = $req->centerid;
                $var->save();
                return redirect('technitian/distributetohospital')->with('success', 'Task Added Successfully!');
            } else {
                return redirect('technitian/discardblood')->with('warning', 'amount of blood stored less!');
            }
        } else if ($req->bloodtype == 'O-') {
            if ($ominus >= $req->volume) {
                $var = new distributeBloodModel;
                $var->user_id = $req->user_id;
                $var->bloodgroup = $req->bloodtype;
                $var->volume = $req->volume;
                $var->issueddate = $req->issuedate;
                $var->expirydate = $req->expirydate;
                $var->recievedby = $req->centerid;
                $var->save();
                return redirect('technitian/distributetohospital')->with('success', 'Task Added Successfully!');
            } else {
                return redirect('technitian/discardblood')->with('warning', 'amount of blood stored less!');
            }
        } else if ($req->bloodtype == 'O+') {
            if ($oplus >= $req->volume) {
                $var = new distributeBloodModel;
                $var->user_id = $req->user_id;
                $var->bloodgroup = $req->bloodtype;
                $var->volume = $req->volume;
                $var->issueddate = $req->issuedate;
                $var->expirydate = $req->expirydate;
                $var->recievedby = $req->centerid;
                $var->save();
                return redirect('technitian/distributetohospital')->with('success', 'Task Added Successfully!');
            } else {
                return redirect('technitian/discardblood')->with('warning', 'amount of blood stored less!');
            }
        }
    }

    function testBlood()
    {
        $data = enrollementModel::all();
        return view('technitian.testBlood', ['data' => $data]);
    }

    function approved($id)
    {
        $data = enrollementModel::find($id);

        $data->status = "approve";
        $data->save();
        return redirect()->back();
    }

    function discards($id)
    {
        $data = enrollementModel::find($id);

        $data->status = "discard";
        $data->save();
        return redirect()->back();
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

    function filldiscard(Request $req)
    {
        $var = new discardBloodModel;
        $var->user_id = $req->user_id;
        $var->bloodgroup = $req->bloodgroup;
        $var->unitdiscarded = $req->volume;
        $var->reason = $req->reason;
        $var->save();
        return redirect('technitian/viewstoredblood')->with('success', 'Task Added Successfully!');
    }
    function read($id)
    {
        $res = hospitalRequestModel::find($id);
        $res->readat = "read";
        $res->save();
        return redirect()->back();
    }

    function viewblood()
    {
        $bloods = addBloodModel::paginate(10);
        $numberof_message = hospitalRequestModel::where('readat', 'unread')->count();
        // $now = Carbon::now();
        //$created_at = Carbon::parse($calls['created_at']);
        //$diffMinutes = $created_at->diffInMinutes($now);
        $aplus_stored = addBloodModel::where('bloodgroup', 'A+')->sum('volume');
        $aminus_stored = addBloodModel::where('bloodgroup', 'A-')->sum('volume');
        $oplus_stored = addBloodModel::where('bloodgroup', 'O+')->sum('volume');
        $ominus_stored = addBloodModel::where('bloodgroup', 'O-')->sum('volume');
        $bplus_stored = addBloodModel::where('bloodgroup', 'B+')->sum('volume');
        $bminus_stored = addBloodModel::where('bloodgroup', 'B-')->sum('volume');
        $abplus_stored = addBloodModel::where('bloodgroup', 'AB+')->sum('volume');
        $abminu_stored = addBloodModel::where('bloodgroup', 'AB-')->sum('volume');

        $aplusdiscard = discardBloodModel::where('bloodgroup', 'A+')->sum('unitdiscarded');
        $aminudiscard = discardBloodModel::where('bloodgroup', 'A-')->sum('unitdiscarded');
        $bplusdiscard = discardBloodModel::where('bloodgroup', 'B+')->sum('unitdiscarded');
        $bminusdiscard = discardBloodModel::where('bloodgroup', 'B-')->sum('unitdiscarded');
        $abplusdiscard = discardBloodModel::where('bloodgroup', 'AB+')->sum('unitdiscarded');
        $abminudiscard = discardBloodModel::where('bloodgroup', 'AB-')->sum('unitdiscarded');
        $oplusdiscard = discardBloodModel::where('bloodgroup', 'O+')->sum('unitdiscarded');
        $ominusdiscard = discardBloodModel::where('bloodgroup', 'O-')->sum('unitdiscarded');

        $aplusdistribute = distributeBloodModel::where('bloodgroup', 'A+')->sum('volume');
        $aminusdistribute = distributeBloodModel::where('bloodgroup', 'A-')->sum('volume');
        $bplusdistribute = distributeBloodModel::where('bloodgroup', 'B+')->sum('volume');
        $bminusdistribute = distributeBloodModel::where('bloodgroup', 'B-')->sum('volume');
        $abplusdistribute = distributeBloodModel::where('bloodgroup', 'AB+')->sum('volume');
        $abminusdistribute = distributeBloodModel::where('bloodgroup', 'AB-')->sum('volume');
        $oplusdistribute = distributeBloodModel::where('bloodgroup', 'O+')->sum('volume');
        $ominusdistribute = distributeBloodModel::where('bloodgroup', 'O-')->sum('volume');
        //$total = $aplus + $aminus + $oplus + $ominus + $bplus + $bminus + $abplus + $abminus;
        $aplus = $aplus_stored - $aplusdiscard - $aplusdistribute;
        $aminus = $aminus_stored - $aminudiscard - $aminusdistribute;
        $bplus = $bplus_stored - $bplusdiscard - $bplusdistribute;
        $bminus = $bminus_stored - $bminusdiscard - $bminusdistribute;
        $abplus = $abplus_stored - $abplusdiscard - $abplusdistribute;
        $abminus = $abminu_stored - $abminudiscard - $abminusdistribute;
        $oplus = $oplus_stored - $oplusdiscard - $oplusdistribute;
        $ominus = $ominus_stored - $ominusdiscard - $ominusdistribute;

        $res = $aplus - $aplusdiscard - $aminusdistribute;
        return view('technitian.technitanHome', compact('bloods', 'numberof_message', 'res', 'aplus', 'aminus', 'oplus', 'ominus', 'bplus', 'bminus', 'abplus', 'abminus',));
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
