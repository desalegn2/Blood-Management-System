<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\seekerregister;
class skregisterController extends Controller
{
    function register(Request $req){
        $seek=new seekerregister;
        $seek->fname=$req->firstname;
        $seek->lname=$req->lastname;
        $seek->email=$req->email;
        $seek->password=$req->password;
        $seek->phone=$req->phone;
        $seek->save();
        return redirect('sklogin');
    }

}
