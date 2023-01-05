<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HIprofile;

class healthinstituteController extends Controller
{
    function profile(Request $req)
    {
        $var = new HIprofile;
        $var->user_id = $req->user_id;
        $var->Hospitalname = $req->hospitalname;
        $var->firstname = $req->firstname;
        $var->lastname = $req->lastname;
        $var->email = $req->email;
        $var->phone = $req->phone;

        if ($req->hasfile('photo')) {
            $file = $req->file('photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/registers', $filename);
            $var->photo =  $filename;
        }
        $var->save();
        return redirect('healthinstitute/profile');
    }
}
