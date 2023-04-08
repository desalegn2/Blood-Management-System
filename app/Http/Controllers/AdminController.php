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
use App\Models\staffModel;


class AdminController extends Controller
{
    public function searchUser(Request $req)
    {
        $a = $req->users;
        $members = User::where('name', $a)->orWhere('email', $a)->orWhere('role', $a)->paginate(10);
        return view('admin.manageuser', compact('members'));
    }
    public function getUser()
    {
        $members = User::paginate(5);
        return view('admin.manageuser', compact('members'));
    }


    function register(Request $req)
    {
        $req->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'role' => ['required', 'int', 'max:6'],
            'password' => 'required|string|min:8|confirmed',

            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|numeric|digits:10',
            'gender' => 'required|string|max:25',
        ]);
        try {

            $user = User::create([
                'email' => $req->email,
                'password' => Hash::make($req->password),
                'role' => $req->role,
            ]);

            if ($user) {
                $staff = staffModel::create([
                    'staff_id' => $user->id,
                    'firstname' => $req->firstname,
                    'lastname' => $req->lastname,
                    'phone' => $req->phone,
                    'gender' => $req->gender,
                    'photo' => '0.png',

                ]);
                return redirect()->back()->with('success', 'Task Added Successfully!');
            }
            
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





    public function updateNurse(Request $request, $id)
    {
        $member = User::find($id);
        $input = $request->all();
        $member->fill($input)->save();

        return redirect()->back();
    }

    function deleteNurse($id)
    {
        $donor = User::find($id);
        $donor->delete();

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
        $numberof_donor = User::where('role', 2)->count();
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
        $users = User::where('role', '0')->orWhere('role', '1')->orWhere('role', '3')->orWhere('role', '4')->orWhere('role', '5')->orWhere('role', '6')->get();

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


    /*profile */
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
    function changepassword(Request $req)
    {
        # Validation
        $req->validate([
            'oldpassword' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $currentPasswordStatus = Hash::check($req->oldpassword, auth()->user()->password);
        if ($currentPasswordStatus) {

            User::findOrFail(auth()->user()->id)->update([
                'password' => Hash::make($req->password)
            ]);
            return redirect()->back()->with('success', 'password changed Successfully!');
        } else {
            return redirect()->back()->with('warnig', 'password not match with old!');
        }
    }
}
