<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hospitalRequestModel;
use App\Models\technicianOrderModel;
use Illuminate\Support\Facades\Notification;

use App\Notifications\orderTechnician;
use App\Models\donorRequestModel;

class hospitalRequestController extends Controller
{
    function hospitalreq(Request $req)
    {
        $var = new hospitalRequestModel;
        $var->user_id = $req->user_id;
        $var->hospitalname = $req->hospital;
        $var->date = $req->date;
        $var->phone = $req->phone;
        $var->email = $req->email;
        $var->bloodgroup = $req->bloodtype;
        $var->volume = $req->volume;
        $var->reason = $req->reason;
        $var->save();

        return redirect('healthinstitute/hospitalrequest')->with('success', 'Task Added Successfully!');
    }
    function viewHospitalRequest(Request $req)
    {
        $views = hospitalRequestModel::all()->where('readat', '=', 'unread');
        return view('admin.hospitalRequest', ['views' => $views]);
    }
    function approved($id)
    {
        $donors = hospitalRequestModel::find($id);
        $donors->status = "Available";
        $donors->save();
        return redirect()->back();
    }
    function canceled($id)
    {
        $donors = hospitalRequestModel::find($id);
        $donors->status = "Not Available";
        $donors->save();
        return redirect()->back();
    }

    function adminmessageT(Request $req)
    {
        $var = new technicianOrderModel;
        $var->hospitalname = $req->hospital;
        $var->date = $req->date;
        $var->bloodgroup = $req->bloodtype;
        $var->volume = $req->volume;
        $var->save();
        return redirect('admin/hospitalrequest');
    }
    public function show($id)
    {
        $user = hospitalRequestModel::find($id);
        return response()->json($user);
    }
    public function viewrequest($id)
    {
        $isExist = hospitalRequestModel::select("*")
            ->where("user_id", $id)
            ->exists();

        if ($isExist) {
            $data = hospitalRequestModel::where('user_id', "=", $id)->first();
            //$data = hospitalRequestModel::where('user_id', 'LIKE', '%' . $id . '%')->get();
            return view('healthinstitute.viewRequest', compact('data'));
        } else {
            echo ('Status  is empity you donot send request');
        }
    }
    public function search(Request $request)
    {
        //$var= new donorRequestModel;
        $blood = $request->bloodtype;
        $city = $request->city;
        $data = donorRequestModel::where('bloodtype', $blood)->Where('city', $city)->get();
        return view('healthinstitute.donor',  ['data' => $data]);
        //echo($dat->name);
        //echo($dat->email);
    }
}
