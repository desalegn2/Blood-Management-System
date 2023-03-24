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
use App\Models\referralModel;
use Illuminate\Support\Facades\Auth;

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
        $var->referral_code = $req->referral_code;
        $var->save();
        return redirect('login')->with('success', 'register Successfully!');
    }
    function createAccount_Reffered($referral_code)

    {
        $referring = User::where('referral_code', $referral_code)->get()->first();
        //$referring_id = $referring->id;
        return view('createAccountReffered', ['referral_code' => $referral_code]);
    }
    function Account_Reffered(Request $req)
    {

        $user = Auth::user();
        $referral_code = $req->referral_code;
        $referrer = User::where('referral_code', $referral_code)->first();
        //$referralLink = url('create_account', ['referral_code' => $user->referral_code]);

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
        $var->referral_code = $req->referral_code;
        $var->save();
        if ($var) {
            referralModel::create([
                'referring_id' => $referrer->id,
                'referred_id' => $var->id,
            ]);
            return redirect('login')->with('success', 'register Successfully!');
        } else {
            return redirect('login')->with('warnig', 'referral not working!');
        }
    }

    function ReferrdedDonor($user_id)
    {

        $user = User::find($user_id);
        // $don=referralModel::find($user_id);
        $num_referred = $user->referrals()->count();

        $list_referred = $user->referrals()->with('referringUser')->get();

        return view('donor.referring', compact('num_referred', 'list_referred'));
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
    function ReservationForm()
    {
        $data = User::where('role', 5)->get();
        return view('donor.reservation', ['data' => $data]);
    }
    function reservation(Request $req)
    {
        $req->validate([
            'email' => 'required|string|email|max:255',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'occupation' => 'required|string|max:255',
            'phone' => 'required|numeric|digits:10',
            //'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:13',
            'gender' => 'required|string|max:25',
            'bloodtype' => 'required|string|max:5',
            'age' => 'required|numeric|min:17|max:65',
            'weight' => 'required|numeric|min:48',
            'health' => 'required|string|max:255',
            'center' => 'required|string|max:255',

            'country' => 'required|string|max:25',
            'state' => 'required|string|max:25',
            'city' => 'required|string|max:25',
            'zone' => 'required|string|max:25',
            'woreda' => 'required|string|max:25',
            'kebelie' => 'required|string|max:25',
            'housenumber' => 'required|numeric|digits:5',
            'reservationdate' => 'required|date_format:Y-m-d|after_or_equal:today'
        ]);
        if ($req->health == "hiv" || $req->health == 'hepatite') {
            $message = 'ህይወትን ለማዳን ደም ለመለገስ ላሳዩት ፍላጎት እና ቁርጠኝነት እናመሰግናለን። እንደ አለመታደል ሆኖ ተላላፊ በሽታ ካለባቸዉ ግለሰቦች የደም ልገሳን መቀበል አንችልም ምክንያቱም ለለጋሹም ሆነ ለተቀባዩ አደጋ ሊያስከትል ይችላል. የደም ልገሳን አስፈላጊነት ግንዛቤ በማስጨበጥ እና ሌሎችም እንዲለግሱ በማበረታታት የዓላማችንን ድጋፍ እንድትቀጥሉ እናሳስባለን።';
            return redirect()->back()->with('error', $message);
        } else {

            $var = new reservationModel;
            $var->user_id = $req->user_id;
            $var->firstname = $req->firstname;
            $var->lastname = $req->lastname;

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
            $var->center = $req->center;
            $var->save();
            if ($var) {
                $isExist = referralModel::select("*")

                    ->where("referred_id", $req->user_id)
                    ->exists();
                if ($isExist) {
                    $res = referralModel::where("referred_id", $req->user_id)->first();
                    $res->status = "Send Reservation";
                    $res->save();
                    return redirect()->back()->with('success', 'Thank you for your donation!');
                } else {
                    return redirect()->back()->with('success', 'Thank you for your donation!');
                }
            }
        }
    }

    function reservationHistory($id)
    {
        $isExist = reservationModel::select("*")

            ->where("user_id", $id)
            ->exists();
        if ($isExist) {

            $stats = reservationModel::where('user_id', '=', $id)->orderBy('created_at', 'desc')->get(['appointmentdate'])->first();
            //$stat = donorRequestModel::where('user_id', $id)->get(['status']);
            $stat = $stats->appointmentdate;

            return view('donor.reservationHistory', compact('stat'));
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
