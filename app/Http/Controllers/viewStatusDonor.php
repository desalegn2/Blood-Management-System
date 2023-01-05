<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\donorRequestModel;

class viewStatusDonor extends Controller
{

    function history($id)
    {
        $isExist = donorRequestModel::select("*")
            ->where("user_id", $id)
            ->exists();

        if ($isExist) {

            $stat = donorRequestModel::where('user_id', $id)->get(['status'])->first();
            return view('donor.history', ['stat' => $stat]);
        } else {
            echo ('Status  is empity you donot send request');
        }
    }
}
