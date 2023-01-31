<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\addBloodModel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class encoderController extends Controller
{
    function addblood(Request $req)
    {
        $var = new addBloodModel;
        $var->user_id = $req->user_id;
        $var->bloodgroup = $req->bloodtype;
        $var->volume = $req->volume;
        $var->packno = $req->packno;
        $var->donationtype = $req->donationtype;

        $var->rh = $req->rh;
        $var->hct = $req->hct;
        $var->bloodpressure = $req->bloodpressure;

        $var->save();
        return redirect()->back()->with('success', 'Task Added Successfully!');
        //return redirect()->with('success', 'Task Added Successfully!');
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
}