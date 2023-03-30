<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\addBloodModel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\enrollementModel;
use App\Models\discardBloodModel;
use App\Models\distributeBloodModel;
use App\Models\donorHealthModel;

class encoderController extends Controller
{

    function Record()
    {
        $data = enrollementModel::all()->where('status', '=', 'approve');
        return view('encoder.recordBloodDetail', ['data' => $data]);
    }

    function recordBloods($id)
    {
        $data = enrollementModel::find($id);
        return view('encoder.add', ['data' => $data]);
    }
    function addblood(Request $req, $id)

    {
        
        $req->validate([
            'packno' => ['required', 'unique:bloodstock'],
        ]);
        $var = new addBloodModel;
        $var->tech_id = $req->user_id;
        $var->donor_id = $req->donor_id;
        $var->bloodgroup = $req->bloodtype;
        $var->volume = $req->volume;
        $var->packno = $req->packno;
        $var->rh = $req->rh;
        $var->save();
        if ($var) {
            $health = new donorHealthModel;
            $health->tech_id = $req->user_id;
            $health->donor_id = $req->donor_id;
            $health->blood_pressure = $req->blood_pressure;
            $health->pulse_rate = $req->pulse_rate;
            $health->homoglobin_level = $req->homoglobin_level;
            $health->blood_temprature = $req->blood_temprature;
            $health->cholesterol_level = $req->cholesterol_level;
            $health->blood_glucose_level = $req->blood_glucose_level;
            $health->iron_level = $req->iron_level;
            $health->blood_viscosity = $req->blood_viscosity;
            $health->hct = $req->hct;
            $health->Weight = $req->Weight;
            $health->save();
        }
        if ($health) {
            enrollementModel::where("id", $id)
                ->update(["status" => 'recorded', "bloodtype" => $req->bloodtype]);
            return redirect('encoder/record')->with('success', 'Task Added Successfully!');
        }
    }
    function Profile($id)
    {
        $isExist = User::select("*")
            ->where("id", $id)
            ->exists();
        if ($isExist) {
            $data = User::all()->where('id', '=', $id);
            //return view('nurse.profile', ['data' => $data]);
            return view('encoder.profile', ['data' => $data]);
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
    function viewblood()
    {
        $aplus = addBloodModel::where('bloodgroup', 'A+')->sum('volume');
        $aminus = addBloodModel::where('bloodgroup', 'A-')->sum('volume');
        $oplus = addBloodModel::where('bloodgroup', 'O+')->sum('volume');
        $ominus = addBloodModel::where('bloodgroup', 'O-')->sum('volume');
        $bplus = addBloodModel::where('bloodgroup', 'B+')->sum('volume');
        $bminus = addBloodModel::where('bloodgroup', 'B-')->sum('volume');
        $abplus = addBloodModel::where('bloodgroup', 'AB+')->sum('volume');
        $abminus = addBloodModel::where('bloodgroup', 'AB-')->sum('volume');



        return view('encoder.encoderHome', compact('aplus', 'aminus', 'oplus', 'ominus', 'bplus', 'bminus', 'abplus', 'abminus',));
    }
}
