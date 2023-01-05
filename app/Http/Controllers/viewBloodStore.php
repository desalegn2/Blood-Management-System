<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\addBloodModel;
use Carbon\Carbon;
use App\Models\technicianOrderModel;
use App\Models\discardBloodModel;
use App\Models\distributeBloodModel;
use App\Models\adminsend;

class viewBloodStore extends Controller
{
    function viewblood()
    {
        $bloods = addBloodModel::paginate(3);

        // $now = Carbon::now();
        //$created_at = Carbon::parse($calls['created_at']);

        //$diffMinutes = $created_at->diffInMinutes($now);


        $numberof_message = adminsend::where('readat', 'unread')->count();

        $aplus = addBloodModel::where('bloodgroup', 'A+')->sum('volume');
        $aminus = addBloodModel::where('bloodgroup', 'A-')->sum('volume');
        $oplus = addBloodModel::where('bloodgroup', 'O+')->sum('volume');
        $ominus = addBloodModel::where('bloodgroup', 'O-')->sum('volume');
        $bplus = addBloodModel::where('bloodgroup', 'B+')->sum('volume');
        $bminus = addBloodModel::where('bloodgroup', 'B-')->sum('volume');
        $abplus = addBloodModel::where('bloodgroup', 'AB+')->sum('volume');
        $abminus = addBloodModel::where('bloodgroup', 'AB-')->sum('volume');

        $aplusdiscard = discardBloodModel::where('bloodgroup', 'A+')->sum('unitdiscarded');
        $aminudiscard = discardBloodModel::where('bloodgroup', 'A-')->sum('unitdiscarded');

        $aplusdistribute = distributeBloodModel::where('bloodgroup', 'A+')->sum('volume');
        $aminusdistribute = distributeBloodModel::where('bloodgroup', 'A-')->sum('volume');
        //$total = $aplus + $aminus + $oplus + $ominus + $bplus + $bminus + $abplus + $abminus;
        $res = $aplus - $aplusdiscard - $aminusdistribute;
        return view('technitian.technitanHome', compact('bloods', 'numberof_message', 'res', 'aplus', 'aminus', 'oplus', 'ominus', 'bplus', 'bminus', 'abplus', 'abminus',));
    }
}
