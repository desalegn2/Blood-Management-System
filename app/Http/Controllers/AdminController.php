<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\addBloodModel;
use App\Models\discardBloodModel;
use App\Models\distributeBloodModel;
//use App\Models\donorRequest;
use App\Models\donorRequestModel;
use App\Models\adminsend;
use App\Models\hospitalRequestModel;

class AdminController extends Controller
{
    function read($id)
    {
        $donors = hospitalRequestModel::find($id);
        $donors->readat = "read";
        $donors->save();
        return redirect()->back();
    }
    public function getDonors()
    {

        $members = User::where('role', '1')->get();
        return view('admin.donorDetail')->with('members', $members);
    }
    public function updateDonor(Request $request, $id)
    {
        $member = User::find($id);
        $input = $request->all();
        $member->fill($input)->save();

        return redirect('admin/viewdonor');
    }

    function deleteDonor($id)
    {
        $donor = User::find($id);
        $donor->delete();

        return redirect('admin/viewdonor');
    }

    public function getNurse()
    {

        $members = User::where('role', '3')->get();
        return view('admin.manageNurse')->with('members', $members);
    }
    public function updateNurse(Request $request, $id)
    {
        $member = User::find($id);
        $input = $request->all();
        $member->fill($input)->save();

        return redirect('admin/viewnurse');
    }

    function deleteNurse($id)
    {
        $donor = User::find($id);
        $donor->delete();

        return redirect('admin/viewnurse');
    }
    public function getTech()
    {

        $members = User::where('role', '4')->get();
        return view('admin.manageTech')->with('members', $members);
    }
    public function updateTech(Request $request, $id)
    {
        $member = User::find($id);
        $input = $request->all();
        $member->fill($input)->save();

        return redirect('admin/viewtech');
    }

    function deleteTech($id)
    {
        $donor = User::find($id);
        $donor->delete();

        return redirect('admin/viewtech');
    }
    public function getHI()
    {

        $members = User::where('role', '5')->get();
        return view('admin.manageHI')->with('members', $members);
    }
    public function updateHI(Request $request, $id)
    {
        $member = User::find($id);
        $input = $request->all();
        $member->fill($input)->save();
        return redirect('admin/viewhi');
    }

    function deleteHI($id)
    {
        $donor = User::find($id);
        $donor->delete();

        return redirect('admin/viewhi');
    }

    function viewnew_user()
    {
        $views = User::all();
        return view('admin.viewNewUser', ['views' => $views]);
    }
    /*donor=1,admin=2,nurse=3, tech=4,health=5*/
    function donorPermision($id)
    {
        $donors = User::find($id);
        $donors->role = "1";
        $donors->save();
        return redirect()->back();
    }
    function nursePermision($id)
    {
        $donors = User::find($id);
        $donors->role = "3";
        $donors->save();
        return redirect()->back();
    }
    function technicianPermision($id)
    {
        $donors = User::find($id);
        $donors->role = "4";
        $donors->save();
        return redirect()->back();
    }
    function healthPermision($id)
    {
        $donors = User::find($id);
        $donors->role = "5";
        $donors->save();
        return redirect()->back();
    }
    function userNotification()
    {
        $notification = User::where('readat', 'unread')->count();
        return view('admin.navbar', ['notification' => $notification]);
    }
    function aa()
    {
        $numberof_message = User::count();


        // $numberof_message = User::where('role', '0')->count();
        // dd($numberof_message);
        return view('admin.navbar')->with('numberof_message', $numberof_message);
        // return view('admin.navbar', ['numberof_message' => $numberof_message]);
    }

    function bloodavailability()
    {
        $numberof_message = User::count();

        $aplus_stored = addBloodModel::where('bloodgroup', 'A+')->sum('volume');
        $aminus_stored = addBloodModel::where('bloodgroup', 'A-')->sum('volume');
        $oplus_stored = addBloodModel::where('bloodgroup', 'O+')->sum('volume');
        $ominus_stored = addBloodModel::where('bloodgroup', 'O-')->sum('volume');
        $bplus_stored = addBloodModel::where('bloodgroup', 'B+')->sum('volume');
        $bminus_stored = addBloodModel::where('bloodgroup', 'B-')->sum('volume');
        $abplus_stored = addBloodModel::where('bloodgroup', 'AB+')->sum('volume');
        $abminu_stored = addBloodModel::where('bloodgroup', 'AB-')->sum('volume');

        $aplusdiscard = discardBloodModel::where('bloodgroup', 'A+')->sum('unitdiscarded');
        $aminudiscard = discardBloodModel::where('bloodgroup', 'A-')->sum('unitdiscarded');
        $bplusdiscard = discardBloodModel::where('bloodgroup', 'B+')->sum('unitdiscarded');
        $bminusdiscard = discardBloodModel::where('bloodgroup', 'B-')->sum('unitdiscarded');
        $abplusdiscard = discardBloodModel::where('bloodgroup', 'AB+')->sum('unitdiscarded');
        $abminudiscard = discardBloodModel::where('bloodgroup', 'AB-')->sum('unitdiscarded');
        $oplusdiscard = discardBloodModel::where('bloodgroup', 'O+')->sum('unitdiscarded');
        $ominusdiscard = discardBloodModel::where('bloodgroup', 'O-')->sum('unitdiscarded');

        $aplusdistribute = distributeBloodModel::where('bloodgroup', 'A+')->sum('volume');
        $aminusdistribute = distributeBloodModel::where('bloodgroup', 'A-')->sum('volume');
        $bplusdistribute = distributeBloodModel::where('bloodgroup', 'B+')->sum('volume');
        $bminusdistribute = distributeBloodModel::where('bloodgroup', 'B-')->sum('volume');
        $abplusdistribute = distributeBloodModel::where('bloodgroup', 'AB+')->sum('volume');
        $abminusdistribute = distributeBloodModel::where('bloodgroup', 'AB-')->sum('volume');
        $oplusdistribute = distributeBloodModel::where('bloodgroup', 'O+')->sum('volume');
        $ominusdistribute = distributeBloodModel::where('bloodgroup', 'O-')->sum('volume');
        //$total = $aplus + $aminus + $oplus + $ominus + $bplus + $bminus + $abplus + $abminus;
        $aplus = $aplus_stored - $aplusdiscard - $aplusdistribute;
        $aminus = $aminus_stored - $aminudiscard - $aminusdistribute;
        $bplus = $bplus_stored - $bplusdiscard - $bplusdistribute;
        $bminus = $bminus_stored - $bminusdiscard - $bminusdistribute;
        $abplus = $abplus_stored - $abplusdiscard - $abplusdistribute;
        $abminus = $abminu_stored - $abminudiscard - $abminusdistribute;
        $oplus = $oplus_stored - $oplusdiscard - $oplusdistribute;
        $ominus = $ominus_stored - $ominusdiscard - $ominusdistribute;

        return view('admin.dashboard', compact('numberof_message', 'aplus', 'aminus', 'oplus', 'ominus', 'bplus', 'bminus', 'abplus', 'abminus',));
    }

    function register(Request $req)
    {
        try {
            $password = $req->password; // password is form field

            $pass = bcrypt($password);
            $var = new User;
            $var->name = $req->name;
            $var->email = $req->email;
            $var->password = $pass;
            $var->role = $req->role;
            $var->save();
            return redirect('admin/add')->with('success', 'Task Added Successfully!');
        } catch (\Exception $e) {

            return redirect('admin/add')->with('success', $e->getMessage());
        }
    }
    function send(Request $req)
    {
        try {
            $var = new adminsend;
            $var->hospitalname = $req->hospitalname;
            $var->date = $req->date;
            $var->phone = $req->phone;
            $var->email = $req->email;
            $var->bloodgroup = $req->bloodgroup;
            $var->volume = $req->volume;
            $var->reason = $req->reason;
            $var->save();
            return redirect('admin/hospitalrequest')->with('success', 'Task Added Successfully!');
        } catch (\Exception $e) {

            return redirect('admin/add')->with('success', $e->getMessage());
        }
    }

    public function index()
    {
        $users = User::where('role', '1')->orWhere('role', '3')->orWhere('role', '4')->orWhere('role', '5')->get();

        return view('admin.block_user', ['users' => $users]);
        //dd($users);
    }
    public function blocks(Request $request, $id)
    {
        $user = User::find($id);

        $isBlocked = $user->isBlocked == 1 ? 0 : 1;

        User::where('id', $id)
            ->update([
                'isBlocked' => $isBlocked
            ]);

        if ($isBlocked == 1)
            $msg = 'User blocked successfully';
        else
            $msg = 'User unblocked successfully';



        return redirect('admin/user')->with('success', $msg);;
    }
}
