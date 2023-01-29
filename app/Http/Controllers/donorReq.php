<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\donorRequest;
use App\Models\nurseprofile;
use Illuminate\Support\Facades\DB;

class donorReq extends Controller
{
    function display()
    {
        $donors = donorRequest::paginate(3);
        return view('nurse.viewDonor', ['donors' => $donors]);
    }

    function approved($id)
    {
        $donors = donorRequest::find($id);
        $donors->status = "Approved";
        $donors->save();
        return redirect()->back();
    }
    function canceled($id)
    {
        $donors = donorRequest::find($id);
        $donors->status = "Disapproved";
        $donors->save();
        return redirect()->back();
    }

    function delete($id)
    {
        $donors = donorRequest::find($id);
        $donors->delete();

        return redirect('nurse/display');
    }


    function admindelete($id)
    {
        $donors = donorRequest::find($id);
        $donors->delete();

        return redirect('admin/display');
    }
    function viewdetail($id)
    {
        $donors = donorRequest::find($id);
        return view('nurse.donorDetail', ['donors' => $donors]);
    }
}
