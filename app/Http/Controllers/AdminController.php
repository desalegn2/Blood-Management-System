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
use App\Http\Requests\CreateaccountRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\aaa;
use App\Models\feedbackModel;

class AdminController extends Controller
{
    public function searchUser(Request $req)
    {
        $a = $req->user;
        $members = User::where('role', $a)->paginate(10);

        return view('admin.manageuser', compact('members'));
    }
    public function getUser()
    {
        $members = User::paginate(5);
        return view('admin.manageuser', compact('members'));
    }

    public function imgup()
    {
        //$members = User::where('role', '1')->get();
        return view('admin.imageup');
    }

    public function imgups(Request $req)
    {
        if ($req->hasfile('image')) {
            $file = $req->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/registers', $filename);
        }
        aaa::create([
            'imgage' => $req->hasfile('image') ? $filename : '0.png'
        ]);
        return view('admin.imageup');
    }

    function register(CreateaccountRequest $req)
    {
        try {

            // $password = $req->password;
            // $pass = bcrypt($password);
            if ($req->hasfile('photo')) {
                $file = $req->file('photo');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->move('uploads/registers', $filename);
            }
            User::create([
                'photo' => $req->hasfile('photo') ? $filename : '0.png',
                'name' => $req->name,
                'email' => $req->email,
                'password' => Hash::make($req->password),
                'role' => $req->role,
            ]);
            return redirect('admin/add')->with('success', 'Task Added Successfully!');
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong in AdminController.register',
                'error' => $e->getMessage()
            ], 400);
        }
    }
    function feedbacks()

    {
        $feedback = User::join('feedbacks', 'feedbacks.user_id', '=', 'users.id')
            ->get(['feedbacks.*', 'users.*']);
        //$feedback = feedbackModel::all();
        return view('admin.feedback', ['feedback' => $feedback]);
    }

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
        $numberof_user = User::count();
        $numberof_donor = User::where('role', 1)->count();
        $numberof_nurse = User::where('role', 3)->count();
        $numberof_manager = User::where('role', 0)->count();
        $numberof_tech = User::where('role', 4)->count();
        $numberof_hi = User::where('role', 5)->count();
        $numberof_encoder = User::where('role', 6)->count();
        $numberof_blocked = User::where('isBlocked', 1)->count();

        $date = \Carbon\Carbon::today()->subDays(1);
        $stats = User::where('created_at', '>=', $date)->get();

        $user = User::paginate(10);
        return view('admin.dashboard', compact('numberof_user', 'user', 'stats', 'numberof_blocked', 'numberof_encoder', 'numberof_donor', 'numberof_nurse', 'numberof_manager', 'numberof_tech', 'numberof_hi'));
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
        // return redirect()->previous();
        return redirect()->back();
    }
    function Profile($id)
    {
        $isExist = User::select("*")
            ->where("id", $id)
            ->exists();
        if ($isExist) {
            $data = User::all()->where('id', '=', $id);
            //return view('nurse.profile', ['data' => $data]);
            return view('admin.profile', ['data' => $data]);
        }
    }
    function updateProfile(Request $req, int $id)
    {

        User::where("id", $id)
            ->update(["name" => $req->name, "email" => $req->email, "phone" => $req->phone]);
        return redirect()->back()->with('success', 'your Profile,Changed');
    }

    function updatephoto(Request $req, int $id)
    {

        $var = User::all()->where('id', '=', $id);
        if ($req->hasfile('photo')) {
            $file = $req->file('photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/registers', $filename);
            $var->photo = $filename;
        }
        User::where("id", $id)
            ->update(["photo" => $filename]);
        return redirect()->back()->with('success', 'your Image,Changed');
    }
}
