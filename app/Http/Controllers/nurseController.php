<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HIprofile;
use App\Models\nurseprofile;
use App\Models\approvedViewModel;
use App\Models\User;
use App\Models\advertises;
use App\Models\reservationModel;

class nurseController extends Controller
{
    function insertprofile(Request $req)
    {
        $var = new nurseprofile;
        $var->user_id = $req->user_id;
        $var->nursename = $req->firstname;
        $var->nurselname = $req->lastname;
        $var->email = $req->email;
        $var->phone = $req->phone;

        if ($req->hasfile('photo')) {
            $file = $req->file('photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/registers', $filename);
            $var->nursephoto =  $filename;
        }
        $var->save();
        return redirect('nurse/home');
    }

    function updateProfile(Request $req, int $id)
    {

        nurseprofile::where("user_id", $id)
            ->update(["nurselname" => $req->nurselname, "phone" => $req->phone]);
        return redirect('nurse/home');
    }

    function updatephoto(Request $req, int $id)
    {

        $var = nurseprofile::all()->where('user_id', '=', $id);
        if ($req->hasfile('photo')) {
            $file = $req->file('photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/registers', $filename);
            $var->nursephoto = $filename;
        }
        nurseprofile::where("user_id", $id)
            ->update(["nursephoto" => $filename]);
        return redirect('nurse/home');
    }
    function advertise(Request $req)
    {
        $var = new advertises;
        $var->title = $req->title;
        $var->description = $req->discription;

        if ($req->hasfile('image')) {
            $file = $req->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/registers', $filename);
            $var->image = $filename;
        }
        $var->save();
        return redirect('nurse/home');
    }

    function displayapproved()
    {
        $xy = approvedViewModel::all()->where('status', '=', 'Approved');
        return view('nurse.approvedDonor', ['xy' => $xy]);
    }
    function displayA()
    {

        $display1 = approvedViewModel::all()->where('status', '=', 'Approved');
        return view('nurse.nurseHome', compact('display1'));
    }
    function Profile($id)
    {
        $isExist = nurseprofile::select("*")
            ->where("user_id", $id)
            ->exists();
        if ($isExist) {
            $data = nurseprofile::all()->where('user_id', '=', $id);
            //return view('nurse.profile', ['data' => $data]);
            return view('nurse.profile', ['data' => $data]);
        } else {
            return redirect('nurse/insert');
        }
    }

    function manageReservation()
    {
        $accepts = reservationModel::all();
        return view('nurse.reserationManagement', ['accepts' => $accepts]);
    }

    function deleteRes($id)
    {
        $res = reservationModel::find($id);
        $res->delete();

        return view('nurse.reserationManagement');
    }
    function accept($id)
    {
        $res = reservationModel::find($id);
        $res->status = "Accepted";
        $res->save();
        return redirect()->back();
    }
    function notAccept($id)
    {
        $res = reservationModel::find($id);
        $res->status = "Disapproved";
        $res->save();
        return redirect()->back();
    }
}
