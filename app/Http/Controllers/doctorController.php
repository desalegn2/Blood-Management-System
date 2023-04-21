<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class doctorController extends Controller
{
    function viewblood()
    {
        $user = Auth::user();
        $id = $user->id;

        $stockInfo = DB::table('distribute')
            ->join('bloodstock', 'distribute.stock_id', '=', 'bloodstock.id')
            ->join('doctors', 'distribute.hospital_id', '=', 'doctors.hospital_id')
            ->where('doctors.doctor_id', $id)
            ->selectRaw('
                 SUM(CASE WHEN bloodgroup = "A+" THEN volume ELSE 0 END) AS aplus,
                 SUM(CASE WHEN bloodgroup = "A-" THEN volume ELSE 0 END) AS aminus,
                 SUM(CASE WHEN bloodgroup = "B+" THEN volume ELSE 0 END) AS bplus,
                 SUM(CASE WHEN bloodgroup = "B-" THEN volume ELSE 0 END) AS bminus,
                 SUM(CASE WHEN bloodgroup = "AB+" THEN volume ELSE 0 END) AS abplus,
                 SUM(CASE WHEN bloodgroup = "AB-" THEN volume ELSE 0 END) AS abminus,
                 SUM(CASE WHEN bloodgroup = "O+" THEN volume ELSE 0 END) AS oplus,
                 SUM(CASE WHEN bloodgroup = "O-" THEN volume ELSE 0 END) AS ominus')
            ->first();

            $distributes = DB::table('distribute')
            ->join('bloodstock', 'distribute.stock_id', '=', 'bloodstock.id')
            ->join('hospitals', 'distribute.hospital_id', '=', 'hospitals.hospital_id')
            ->selectRaw('hospitals.hospitalname,
                 SUM(CASE WHEN bloodgroup = "A+" THEN volume ELSE 0 END) AS aplus,
                 SUM(CASE WHEN bloodgroup = "A-" THEN volume ELSE 0 END) AS aminus,
                 SUM(CASE WHEN bloodgroup = "B+" THEN volume ELSE 0 END) AS bplus,
                 SUM(CASE WHEN bloodgroup = "B-" THEN volume ELSE 0 END) AS bminus,
                 SUM(CASE WHEN bloodgroup = "AB+" THEN volume ELSE 0 END) AS abplus,
                 SUM(CASE WHEN bloodgroup = "AB-" THEN volume ELSE 0 END) AS abminus,
                 SUM(CASE WHEN bloodgroup = "O+" THEN volume ELSE 0 END) AS oplus,
                 SUM(CASE WHEN bloodgroup = "O-" THEN volume ELSE 0 END) AS ominus')
            ->groupBy('hospitals.hospitalname')
            ->get();
        
        //return view('distributes', compact('distributes'));
        
        return view('doctor.home', compact('stockInfo','distributes'));
    }
    function BloodTransfer()
    {
        $user = Auth::user();
        $id = $user->id;

        $distributes = DB::table('distribute')
            ->join('bloodstock', 'distribute.stock_id', '=', 'bloodstock.id')
            ->join('doctors', 'distribute.hospital_id', '=', 'doctors.hospital_id')
            ->select('distribute.hospital_id', 'bloodstock.id', 'bloodstock.bloodgroup', 'bloodstock.volume', 'bloodstock.rh', 'bloodstock.expitariondate')
            ->where('doctors.doctor_id', '=', $id)
            ->get();
        return view('doctor.transfer', compact('distributes'));
    }
}
