<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\addAdminModel;

class addAdminController extends Controller
{
    function register(Request $req)
    {
        $admin = new addAdminModel;
        $admin->fname = $req->firstname;
        $admin->lname = $req->lastname;
        $admin->email = $req->email;
        $admin->password = $req->password;
        $admin->phone = $req->phone;
        $admin->save();
        return redirect('admindashboard');
    }
}
