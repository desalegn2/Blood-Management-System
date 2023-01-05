<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\donorRequestModel;

class donorRequestController extends Controller
{
    function register(Request $req)
    {
        $var = new donorRequestModel;
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
}
