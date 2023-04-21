<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Notification;
use App\Notifications\sendNotification;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // var_dump(auth()->user()->role);

    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function bbmanagerHome()
    {
        return view('bloodBankManager.home');
    }
    public function donorHome()
    {
        return view('donor.home');
    }
    public function nurseHome()
    {
        return view('nurse.home');
    }
    public function technitanHome()
    {
        return view('technitian.technitanHome');
    }


    public function healthinstituteHome()
    {
        return view('healthinstitute.healthinstituteHome');
    }

    public function encoderHome()
    {
        return view('encoder.encoderHome');
    }
    
    public function doctorHome()
    {
        return view('doctor.home');
    }
}
