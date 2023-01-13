<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\advertises;
use App\Models\donorRequestModel;
use App\Models\reservationModel;
use App\Models\commentModel;
use App\Models\User;
use App\Models\hospitalPosts;
use App\Models\donorProfile;

class donorController extends Controller
{

    function getAdvertise()
    {
        $advert = advertises::all();
        return view('donor.donorHome', ['advert' => $advert]);
    }

    function viewblog()
    {
        $advert = advertises::all();
        return view('donor.blog', ['advert' => $advert]);
    }
    function register(Request $req)
    {
        $var = new donorRequestModel;
        $var->user_id = $req->user_id;
        $var->name = $req->firstname;
        $var->lastname = $req->lastname;
        $var->phone = $req->phone;
        $var->gender = $req->gender;
        $var->bloodtype = $req->bloodtype;
        $var->weight = $req->weight;
        $var->healthstatus = $req->healthstatus;
        $var->bithdate = $req->birthdate;
        $var->state = $req->state;
        $var->city = $req->city;
        $var->email = $req->email;
        if ($req->hasfile('photo')) {
            $file = $req->file('photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/registers', $filename);
            $var->photo =  $filename;
        }
        $var->save();

        return redirect('donor/home')->with('success', 'Task Added Successfully!');
    }
    function reservation(Request $req, int $id)
    {
        $isExist = donorRequestModel::select("*")
            ->where("user_id", $id)
            ->exists();
        if ($isExist) {
            $stats = donorRequestModel::where('user_id', '=', $id)->orderBy('created_at', 'desc')->first();
            $stat = $stats->status;
            if ($stat == 'Approved') {
                $var = new reservationModel;
                $var->user_id = $req->user_id;
                $var->name = $req->firstname;
                $var->lastname = $req->lastname;
                $var->phone = $req->phone;
                $var->gender = $req->gender;
                $var->email = $req->email;
                $var->reservationdate = $req->reservationdate;
                $var->center = $req->center;
                $var->save();
                return redirect('donor/home')->with('success', 'Task Added Successfully!');
            } else if ($stat == 'Disapproved') {
                return redirect('donor/reservation')->with('warning', 'Reservation not sent your you cannot donate now');
            } else if ($stat == 'in progress') {
                return redirect('donor/reservation')->with('warning', 'Reservation not sent please wait untill approved');
            }
        } else {

            return redirect('donor/reservation')->with('warning', 'first register');
        }
    }
    function history($id)
    {
        $isExist = donorRequestModel::select("*")
            ->where("user_id", $id)
            ->exists();
        if ($isExist) {
            $stats = donorRequestModel::where('user_id', '=', $id)->orderBy('created_at', 'desc')->get(['status'])->first();
            //$stat = donorRequestModel::where('user_id', $id)->get(['status']);
            $stat = $stats->status;
            return view('donor.history', compact('stat'));
        } else {
            return redirect('donor/home')->with('warning', 'first register');
        }
    }

    function reservationHistory($id)
    {
        $isExist = reservationModel::select("*")
            ->where("user_id", $id)
            ->exists();
        if ($isExist) {
            $stats = reservationModel::where('user_id', '=', $id)->orderBy('created_at', 'desc')->get(['status'])->first();
            //$stat = donorRequestModel::where('user_id', $id)->get(['status']);
            $stat = $stats->status;
            //  $date=$stats->appointmentdate;
            if ($stat == 'Accepted') {
                return view('donor.reservationHistory', compact('stat'));
            } else if ($stat == 'Disapproved') {
                $res = reservationModel::where('user_id', '=', $id)->orderBy('created_at', 'desc')->get(['appointmentdate'])->first();
                $stat = $res->appointmentdate;
                //dd($stat);
                return view('donor.reservationHistory', compact('stat'));
            } else if ($stat == 'in progress') {
                return view('donor.reservationHistory', compact('stat'));
            }
        } else {
            return redirect('donor/home')->with('warning', 'Reservation empity send reservation');
        }
    }

    function view()
    {
        $views = User::join('hospitalpost', 'hospitalpost.user_id', '=', 'users.id')
            ->get(['hospitalpost.id', 'hospitalpost.phone', 'hospitalpost.email', 'hospitalpost.purpose', 'hospitalpost.photo', 'hospitalpost.created_at', 'users.name']);
        //$views = hospitalPosts::all();
        return view('donor.viewseeker', compact('views'));
    }

    function comments(Request $com)
    {
        $var = new commentModel;
        $var->post_id = $com->post_id;
        $var->user_id = $com->user_id;
        $var->commentorname = $com->commentorName;
        $var->email = $com->commentorEmail;
        $var->comment = $com->message;
        $var->save();
        return redirect('donor/view');
    }
    function aa()
    {
        $numberof_message = User::where('role', 1)->count();


        // $numberof_message = User::where('role', '0')->count();
        // dd($numberof_message);
        return view('donor.sidebar')->with('numberof_message', $numberof_message);
        // return view('admin.navbar', ['numberof_message' => $numberof_message]);
    }

    function insertprofile(Request $req)
    {
        $var = new donorProfile;
        $var->user_id = $req->user_id;
        $var->donorname = $req->firstname;
        $var->donorlastname = $req->lastname;
        $var->email = $req->email;
        $var->phone = $req->phone;

        if ($req->hasfile('photo')) {
            $file = $req->file('photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/registers', $filename);
            $var->donorphoto =  $filename;
        }
        $var->save();
        return redirect('donor/home')->with('success', 'Your Profile are inserted !');
    }

    function Profile($id)
    {
        $isExist = donorProfile::select("*")
            ->where("user_id", $id)
            ->exists();
        if ($isExist) {
            $data = donorProfile::all()->where('user_id', '=', $id);
            //return view('nurse.profile', ['data' => $data]);
            return view('donor.profile', ['data' => $data]);
        } else {
            return redirect('donor/insert');
        }
    }
    function updateProfile(Request $req, int $id)
    {

        donorProfile::where("user_id", $id)
            ->update(["donorlastname" => $req->donorlastname, "phone" => $req->phone]);
        return redirect('donor/home');
    }

    function updatephoto(Request $req, int $id)
    {

        $var = donorProfile::all()->where('user_id', '=', $id);
        if ($req->hasfile('photo')) {
            $file = $req->file('photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/registers', $filename);
            $var->donorphoto = $filename;
        }
        donorProfile::where("user_id", $id)
            ->update(["donorphoto" => $filename]);
        return redirect('donor/home');
    }
}
