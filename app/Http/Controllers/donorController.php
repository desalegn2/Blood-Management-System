<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\advertises;
use App\Models\donorRequestModel;
use App\Models\reservationModel;
use App\Models\commentModel;
use App\Models\User;
use App\Models\hospitalPosts;

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
        return redirect('donor/home');
    }
    function reservation(Request $req, int $id)
    {
        $stat = donorRequestModel::where('user_id', '=', $id)->get(['status']);

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
            return redirect('donor/home');
        } else if ($stat == 'Dispproved') {
            dd("you are not approved");
        } else if ($stat == 'inprogress') {
            dd("pleas wait until approved");
        } else
            dd("pleas registor as donor");
    }
    function history($id)
    {
        $isExist = donorRequestModel::select("*")
            ->where("user_id", $id)
            ->exists();

        if ($isExist) {

            $stat = donorRequestModel::where('user_id', $id)->get(['status']);
            return view('donor.history', ['stat' => $stat]);
        } else {
            echo ('history  is empity you donot send request');
        }
    }
    function view()
    {
        $data = User::join('hospitalpost', 'hospitalpost.user_id', '=', 'users.id')
            ->get(['hospitalpost.id', 'hospitalpost.phone', 'hospitalpost.email', 'hospitalpost.purpose', 'hospitalpost.photo', 'hospitalpost.created_at', 'users.name']);
        //$views = hospitalPosts::all();

        $comments = hospitalPosts::join('comment', 'comment.post_id', '=', 'hospitalpost.id')
            ->get(['comment.commentorname', 'comment.email', 'comment.comment']);
        return view('donor.viewP', compact('data', 'comments'));
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
}
