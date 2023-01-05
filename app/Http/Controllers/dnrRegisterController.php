<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dnRegisterModel;
class dnrRegisterController extends Controller
{
     function register(Request $req){
        $donor=new dnRegisterModel;
        $donor->fname=$req->firstname;
        $donor->lname=$req->lastname;
        $donor->email=$req->email;
        $donor->password=$req->password;
        $donor->phone=$req->phone;
        $donor->save();
        return redirect('dnlogin');
    }
}
