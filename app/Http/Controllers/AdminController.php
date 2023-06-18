<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\staffModel;

class AdminController extends Controller
{
    public function searchUser(Request $req)
    {
        $a = $req->users;
        $members = User::where('role', $a)->paginate(5);
        return view('admin.manageuser', compact('members'));
    }
    public function getUser()
    {
        $members = User::whereIn('role', [0, 3, 4, 5, 6])->paginate(5);

        return view('admin.manageuser', compact('members'));
    }

    function register(Request $req)
    {
        $req->validate([
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]+$/'
            ],
            'email' => 'required|string|email|max:255|unique:users',
            'role' => ['required', 'int', 'max:6'],
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
                // Generate the login link
                $loginLink = url('http://127.0.0.1:8000/login');
                // Default password
                $password = '123456@ab';
                // Send the login link and default password to the email address
                Mail::raw("Here is your login link: $loginLink \nDefault Password: $password", function ($message) use ($req) {
                    $message->to($req->email)->subject('Login Link and Default Password');
                });
                return redirect()->back()->with('success', 'Staff Add is Done! Login link has been sent to the email address.');
            }
        } catch (\Exception $e) {
            // Check if the exception is related to a network connection error
            if (strpos($e->getMessage(), 'Connection could not be established') !== false) {
                // Network connection error occurred

                // Display a short error message to the user
                Session::flash('error', 'Failed to establish a network connection. Please check your internet connection.');
                return redirect()->back();
            }
        }
    }

   

    function deleteNurse($id)
    {
        $donor = User::find($id);
        $donor->delete();

        return redirect()->back();
    }


    function bloodavailability()
    {
        $numberof_user = User::count();

        $numberof_donor = User::where('role', 2)->count();
        $numberof_nurse = User::where('role', 3)->count();
        $numberof_manager = User::where('role', 0)->count();
        $numberof_tech = User::where('role', 4)->count();
        $numberof_hi = User::where('role', 5)->count();
        $numberof_doctor = User::where('role', 6)->count();
        $numberof_blocked = User::where('isBlocked', 1)->count();

        $date = \Carbon\Carbon::today()->subDays(1);
        $stats = User::where('created_at', '>=', $date)->get();

        $user = User::paginate(10);
        return view('admin.dashboard', compact('numberof_user', 'user', 'stats', 'numberof_blocked', 'numberof_doctor', 'numberof_donor', 'numberof_nurse', 'numberof_manager', 'numberof_tech', 'numberof_hi'));
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
