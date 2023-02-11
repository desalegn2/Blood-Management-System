<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hospitalRequestModel;
use App\Models\technicianOrderModel;
use Illuminate\Support\Facades\Notification;
use App\Models\hospitalPosts;
use App\Notifications\orderTechnician;
use App\Models\donorRequestModel;
use App\Models\addBloodModel;
use App\Models\discardBloodModel;
use App\Models\distributeBloodModel;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class hospitalRequestController extends Controller
{
    function hospitalreq(Request $req)
    {
        $var = new hospitalRequestModel;
        $var->user_id = $req->user_id;
        $var->hospitalname = $req->hospital;
        $var->date = $req->date;
        $var->phone = $req->phone;
        $var->email = $req->email;
        $var->bloodgroup = $req->bloodtype;
        $var->volume = $req->volume;
        $var->reason = $req->reason;
        $var->save();

        return redirect('healthinstitute/hospitalrequest')->with('success', 'Task Added Successfully!');
    }
    function viewHospitalRequest(Request $req)
    {
        $views = hospitalRequestModel::all()->where('readat', '=', 'unread');
        return view('admin.hospitalRequest', ['views' => $views]);
    }
    function approved($id)
    {
        $donors = hospitalRequestModel::find($id);
        $donors->status = "Available";
        $donors->save();
        return redirect()->back();
    }
    function canceled($id)
    {
        $donors = hospitalRequestModel::find($id);
        $donors->status = "Not Available";
        $donors->save();
        return redirect()->back();
    }

    function adminmessageT(Request $req)
    {
        $var = new technicianOrderModel;
        $var->hospitalname = $req->hospital;
        $var->date = $req->date;
        $var->bloodgroup = $req->bloodtype;
        $var->volume = $req->volume;
        $var->save();
        return redirect('admin/hospitalrequest');
    }
    public function show($id)
    {
        $user = hospitalRequestModel::find($id);
        return response()->json($user);
    }


    function postSeeker(Request $req)
    {

        $var = new hospitalPosts;
        $var->user_id = $req->user_id;
        $var->patientname = $req->fname;
        $var->lastname = $req->lname;
        $var->email = $req->email;
        $var->phone = $req->phone;
        $var->gender = $req->gender;
        $var->whenneed = $req->whenneed;
        $var->amount = $req->amount;
        $var->bloodtype = $req->bloodtype;
        $var->age = $req->age;
        $var->hospital = $req->hospital;
        $var->state = $req->state;
        $var->city = $req->city;
        $var->purpose = $req->purpose;
        if ($req->hasfile('photo')) {
            $file = $req->file('photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/registers', $filename);
            $var->photo =  $filename;
        }
        $var->save();
        return redirect('healthinstitute/post')->with('success', 'Task Added Successfully!');
    }
    public function viewrequest($id)
    {
        $isExist = hospitalRequestModel::select("*")
            ->where("user_id", $id)
            ->exists();

        if ($isExist) {
            $data = hospitalRequestModel::where('user_id', "=", $id)->orderBy('created_at', 'desc')->first();
            //$data = hospitalRequestModel::where('user_id', 'LIKE', '%' . $id . '%')->get();
            return view('healthinstitute.viewRequest', compact('data'));
        } else {
            return view('healthinstitute.healthinstituteHome')->with('warning', 'you do not send request!');
        }
    }
    public function search(Request $request)
    {
        //$var= new donorRequestModel;
        $blood = $request->bloodtype;
        $city = $request->city;
        $data = addBloodModel::where('bloodgroup', $blood)->Where('city', $city)->get();
        return view('healthinstitute.donor',  ['data' => $data]);
        //echo($dat->name);
        //echo($dat->email);
    }
    function viewblood()
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

        $res = $aplus - $aplusdiscard - $aminusdistribute;
        return view('healthinstitute.healthinstituteHome', compact('aplus', 'aminus', 'oplus', 'ominus', 'bplus', 'bminus', 'abplus', 'abminus',));
    }

    public function mypost($id)
    {
        $isExist = hospitalPosts::select("*")
            ->where("user_id", $id)
            ->exists();
        if ($isExist) {
            $data = hospitalPosts::where('user_id', "=", $id)->get();
            //$data = hospitalRequestModel::where('user_id', 'LIKE', '%' . $id . '%')->get();
            return view('healthinstitute.mypost', compact('data'));
        } else {
            return redirect('healthinstitute/post');
        }
    }
    function deletepost($id)
    {
        $res = hospitalPosts::find($id);
        $res->delete();

        return redirect()->back();
    }

    function Profile($id)
    {
        $isExist = User::select("*")
            ->where("id", $id)
            ->exists();
        if ($isExist) {
            $data = User::all()->where('id', '=', $id);
            //return view('nurse.profile', ['data' => $data]);
            return view('healthinstitute.profile', ['data' => $data]);
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
