<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\advertises;
use App\Models\donorRequestModel;
use App\Models\reservationModel;
use App\Models\commentModel;
use App\Models\User;
use App\Models\hospitalPosts;
use App\Models\donorProfile;
use App\Models\feedbackModel;
use App\Models\bbinformatiomModel;
use App\Http\Requests\CreateaccountRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Exceptions\PostTooLargeException;

class donorController extends Controller
{
    function createAccount(Request $req)
    {

        $req->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => ['required', 'int', 'max:5'],
            'password' => 'required|string|min:8|confirmed',
        ]);
        if ($req->hasfile('photo')) {
            $file = $req->file('photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/registers', $filename);
        }
        $var = new User;
        $var->photo = $req->hasfile('photo') ? $filename : '0.png';
        $var->name = $req->name;
        $var->email = $req->email;
        $var->password = Hash::make($req->password);
        $var->role = $req->role;
        $var->save();
        return redirect('login')->with('success', 'register Successfully!');
    }

    function getAdvertise()
    {
        $advert = advertises::all();
        return view('donor.donorHome', ['advert' => $advert]);
    }

    function viewNews()
    {
        $advert = advertises::all();
        return view('donor.blog', ['advert' => $advert]);
    }


    function viewInfo()
    {
        $data = bbinformatiomModel::all();
        return view('donor.bbinformation', ['data' => $data]);
    }
    function register(Request $req)
    {
        try {

            $req->validate([
                'photo' => 'required|file|max:102400|mimes:jpeg,png,jpg,gif',
                'email' => 'required|string|email|max:255|unique:users',
                'firstname' => 'required|string|max:255',
                //'phone' => 'required|numeric|digits:10',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:13',
                'age' => 'required|numeric|min:17|max:70',
                'weight' => 'required|numeric|min:48'
            ]);

            $var = new donorRequestModel;
            $var->user_id = $req->user_id;
            $var->name = $req->firstname;
            $var->lastname = $req->lastname;
            $var->phone = $req->phone;
            $var->gender = $req->gender;
            $var->bloodtype = $req->bloodtype;
            $var->weight = $req->weight;
            $var->healthstatus = $req->healthstatus;
            $var->bithdate = $req->age;
            $var->state = $req->state;
            $var->city = $req->city;
            $var->email = $req->email;
            if ($req->hasfile('photo')) {
                $file = $req->file('photo');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->move('uploads/registers', $filename);
                $var->photo =  $filename;
            }
            $var->save();

            return redirect('donor/home')->with('success', 'Task Added Successfully!');
        } catch (PostTooLargeException $exception) {
            return redirect()->back()->with('success', 'The uploaded file exceeds the maximum size allowed.');
        }
    }

    function ReservationForm()
    {
        $data = User::where('role', 5)->get();
        return view('donor.reservation', ['data' => $data]);
    }
    function reservation(Request $req)
    {
        $var = new reservationModel;
        $var->user_id = $req->user_id;
        $var->firstname = $req->first_name;
        $var->lastname = $req->last_name;

        $var->occupation = $req->occupation;
        $var->email = $req->email;
        $var->phone = $req->phone;
        $var->gender = $req->gender;
        $var->bloodtype = $req->bloodtype;

        $var->weight = $req->weight;
        $var->height = $req->height;
        $var->health = $req->health;

        $var->age = $req->age;
        $var->country = $req->country;
        $var->state = $req->state;
        $var->city = $req->city;
        $var->zone = $req->zone;
        $var->woreda = $req->woreda;
        $var->kebelie = $req->kebelie;
        $var->housenumber = $req->housenumber;
        $var->reservationdate = $req->reservationdate;


        $var->save();
        return redirect()->back()->with('success', 'Task Added Successfully!');
    }
    function history($id)
    {
        $isExist = donorRequestModel::select("*")
            ->where("user_id", $id)
            ->exists();
        if ($isExist) {
            $stats = donorRequestModel::where('user_id', '=', $id)->orderBy('created_at', 'desc')->get(['status'])->first();
            //$stat = donorRequestModel::where('user_id', $id)->get(['status']);
            $stat = $stats->status;
            return view('donor.history', compact('stat'));
        } else {
            return redirect('donor/home')->with('warning', 'first register');
        }
    }

    function reservationHistory($id)
    {
        $isExist = reservationModel::select("*")
            ->where("user_id", $id)
            ->exists();
        if ($isExist) {
            $stats = reservationModel::where('user_id', '=', $id)->orderBy('created_at', 'desc')->get(['status'])->first();
            //$stat = donorRequestModel::where('user_id', $id)->get(['status']);
            $stat = $stats->status;
            //  $date=$stats->appointmentdate;
            if ($stat == 'Accepted') {
                return view('donor.reservationHistory', compact('stat'));
            } else if ($stat == 'Disapproved') {
                $res = reservationModel::where('user_id', '=', $id)->orderBy('created_at', 'desc')->get(['appointmentdate'])->first();
                $stat = $res->appointmentdate;
                //dd($stat);
                return view('donor.reservationHistory', compact('stat'));
            } else if ($stat == 'in progress') {
                return view('donor.reservationHistory', compact('stat'));
            }
        } else {
            return redirect('donor/home')->with('warning', 'Reservation empity send reservation');
        }
    }

    function view()

    {
        $date = \Carbon\Carbon::today()->subDays(3);
        $views = User::join('hospitalpost', 'hospitalpost.user_id', '=', 'users.id')
            ->where('hospitalpost.created_at', '>=', $date)->get(['hospitalpost.*', 'users.name', 'users.email']);

        return view('donor.viewseeker', compact('views'));
    }

    function comments(Request $com)
    {
        $var = new commentModel;
        $var->post_id = $com->post_id;
        $var->user_id = $com->user_id;
        $var->commentorname = $com->commentorName;
        $var->email = $com->commentorEmail;
        $var->comment = $com->message;
        $var->save();
        return redirect('donor/view');
    }
    function aa()
    {
        $numberof_message = User::where('role', 1)->count();


        // $numberof_message = User::where('role', '0')->count();
        // dd($numberof_message);
        // return view('donor.sidebar')->with('numberof_message', $numberof_message);
        // return view('admin.navbar', ['numberof_message' => $numberof_message]);
    }

    function insertprofile(Request $req)
    {
        $var = new User;
        $var->user_id = $req->user_id;
        $var->donorname = $req->firstname;
        $var->donorlastname = $req->lastname;
        $var->email = $req->email;
        $var->phone = $req->phone;

        if ($req->hasfile('photo')) {
            $file = $req->file('photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/registers', $filename);
            $var->donorphoto =  $filename;
        }
        $var->save();
        return redirect('donor/home')->with('success', 'Your Profile are inserted !');
    }

    function Profile($id)
    {
        $isExist = User::select("*")
            ->where("id", $id)
            ->exists();
        if ($isExist) {
            $data = User::all()->where('id', '=', $id);
            //return view('nurse.profile', ['data' => $data]);
            return view('donor.profile', ['data' => $data]);
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

    function feedbacks()
    {
        return view('donor.feedback');
    }
    function givefeedbacks(Request $req)

    {
        $var = new feedbackModel;
        $var->name = $req->name;
        $var->user_id = $req->user_id;
        $var->email = $req->email;
        $var->address = $req->address;
        $var->feedback = $req->feedback;
        $var->save();
        return view('donor.feedback');
    }
}
