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
use Illuminate\Support\Facades\DB;

use App\Models\Donor;
use App\Models\centorModel;
use App\Models\donationModel;

class donorController extends Controller
{

    function createAccount(Request $req)
    {
        $messages = [
            'regex' => 'ትክክለኛ ስም ያስገቡ',
            'phone.regex' => 'ትክክለኛ ስልክ ቁጥር ያስገቡ',
            //'photo.max' => 'The :attribute may not be greater than :max kilobytes.',
            'weight.min' => 'ክብደትወት ከ 48 ኪ.ግ በታች ከሆነ ደም መለገስ አይችሉም',
            'age.min' => 'ከ 17 አመት በታች መለገስ አይቻልም',
            'age.max' => 'ከ 65 አመት በላይ መለገስ አይቻልም',

            'photo.required' => 'Please upload a photo.',
            'photo.image' => 'The file must be a valid image.',
            'photo.mimes' => 'The photo must be in JPEG or PNG format.',
            'photo.max' => 'The photo may not be larger than 2 MB.',
        ];

        $req->validate(
            [
                'email' => 'required|string|email|max:255|unique:users',
                'role' => ['required', 'int', 'max:6'],
                'password' => 'required|string|min:8|confirmed',
                //'photo' => ['required', 'image', 'mimes:jpeg,jpg,png,gif,bmp,svg', 'max:2048'],
                // 'photo' => 'required|mimes:jpeg,jpg,png,gif,bmp,svg|max:10240',
                'firstname' => ['required', 'regex:/^[\p{L}\s]+$/u', 'max:255'],
                'lastname' => ['required', 'regex:/^[a-zA-Z\s]+$/', 'max:255'],
                'occupation' => 'required|string|max:255',
                'phone' => ['required', 'regex:/^(9|7)\d{8}$/'],
                'gender' => 'required|string|max:25',
                'bloodtype' => 'required|string|max:25',
                'age' => 'required|numeric|min:17|max:65',
                'weight' => 'required|numeric|min:48',
                'height' => 'required|numeric',
                'country' => 'required|string|max:25',
                'state' => 'required|string|max:25',
                'city' => 'required|string|max:25',
                'zone' => 'required|string|max:25',
                'woreda' => 'required|string|max:25',
                'kebelie' => 'required|string|max:25',
                'housenumber' => 'required|numeric|digits:5',
            ],
            $messages
        );
        $var = new User;
        $var->email = $req->email;
        $var->password = Hash::make($req->password);
        $var->role = $req->role;
        $var->save();
        if ($var) {
            if ($req->hasfile('photo')) {
                $file = $req->file('photo');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->move('uploads/registers', $filename);
            }
            $donor = new Donor;
            $donor->photo = '0.png';
            $donor->donor_id = $var->id;
            $donor->firstname = ucfirst($req->input('firstname'));
            $donor->lastname = ucfirst($req->input('lastname'));
            $donor->occupation = $req->occupation;
            // $donor->phone = $req->phone;
            $donor->phone = '+251' . $req->phone;

            $donor->gender = $req->gender;
            $donor->bloodtype = $req->bloodtype;
            $donor->typeofdonation = $req->typeofdonation;
            $donor->weight = $req->weight;
            $donor->height = $req->height;
            $donor->age = $req->age;
            $donor->country = $req->country;
            $donor->country = ucfirst($req->input('country'));
            $donor->state = $req->state;
            $donor->city = $req->city;
            $donor->zone = $req->zone;
            $donor->woreda = $req->woreda;
            $donor->kebelie = $req->kebelie;
            $donor->housenumber = $req->housenumber;

            $donor->save();

            return redirect('login')->with('success', 'register Successfully!');
        }
    }
    function createAccount_Reffered($referral_code)

    {
        // $referring = Donor::where('referral_code', $referral_code)->get()->first();
        //$referring_id = $referring->id;
        return view('createAccountReffered', ['referral_code' => $referral_code]);
    }
    function Account_Reffered(Request $req)
    {
        //$user = Auth::user();
        $referral_code = $req->referral_code;
        $referrer = Donor::where('referral_code', $referral_code)->first();
        $req->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'role' => ['required', 'int', 'max:6'],
            'password' => 'required|string|min:8|confirmed',

            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'occupation' => 'required|string|max:255',
            'phone' => 'required|numeric|digits:10',
            'gender' => 'required|string|max:25',
            'bloodtype' => 'required|string|max:25',
            'age' => 'required|numeric|min:17|max:65',
            'weight' => 'required|numeric|min:48',
            'height' => 'required|numeric',
            'country' => 'required|string|max:25',
            'state' => 'required|string|max:25',
            'city' => 'required|string|max:25',
            'zone' => 'required|string|max:25',
            'woreda' => 'required|string|max:25',
            'kebelie' => 'required|string|max:25',
            'housenumber' => 'required|numeric|digits:5',
        ]);
        $var = new User;
        $var->email = $req->email;
        $var->password = Hash::make($req->password);
        $var->role = $req->role;
        $var->save();
        if ($var) {
            if ($req->hasfile('photo')) {
                $file = $req->file('photo');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->move('uploads/registers', $filename);
            }

            $donor = new Donor;
            $donor->donor_id = $var->id;
            $donor->firstname = $req->firstname;
            $donor->lastname = $req->lastname;
            $donor->photo = $req->hasfile('photo') ? $var->filename : '0.png';
            $donor->occupation = $req->occupation;
            $donor->phone = $req->phone;
            $donor->gender = $req->gender;
            $donor->bloodtype = $req->bloodtype;
            $donor->typeofdonation = $req->typeofdonation;
            $donor->weight = $req->weight;
            $donor->height = $req->height;
            $donor->age = $req->age;
            $donor->country = $req->country;
            $donor->state = $req->state;
            $donor->city = $req->city;
            $donor->zone = $req->zone;
            $donor->woreda = $req->woreda;
            $donor->kebelie = $req->kebelie;
            $donor->housenumber = $req->housenumber;
            $donor->save();

            if ($donor) {

                referralModel::create([
                    'referring_id' => $referrer->donor_id,
                    'referred_id' => $donor->donor_id,
                ]);
                return redirect('login')->with('success', 'register Successfully!');
            }
        }
    }

    function ReferrdedDonor($donor_id)
    {
        $user = Donor::where('donor_id', $donor_id)->first();
        $referral_code = $user->referral_code;
        // $don=referralModel::find($user_id);
        $num_referred = $user->referrals()->count();
        $list_referred = $user->referrals()->with('referringDonor')->get();

        return view('donor.referring', compact('num_referred', 'list_referred', 'referral_code'));
    }

    function Home()
    {
        $data = bbinformatiomModel::where('type', 'service')->get();
        return view('donor.home', ['data' => $data]);
    }

    function viewNews()
    {
        $data = bbinformatiomModel::where('type', 'news')->get();
        return view('donor.news', ['data' => $data]);
    }

    function viewInfo()
    {
        $data = bbinformatiomModel::where('type', 'information')->get();
        return view('donor.bbinformation', ['data' => $data]);
    }

    function ReservationForm()
    {
        $data = centorModel::all();
        return view('donor.reservation', ['data' => $data]);
    }
    function reservation(Request $req)
    {
        $req->validate([
            'health' => 'required|string|max:255',
            'center' => 'required|string|max:255',
            'reservationdate' => 'required|date_format:Y-m-d|after_or_equal:today'
        ]);
        if ($req->health == "hiv" || $req->health == 'hepatite') {
            $message = 'ህይወትን ለማዳን ደም ለመለገስ ላሳዩት ፍላጎት እና ቁርጠኝነት እናመሰግናለን። ነገር ግን ተላላፊ በሽታ ካለባቸዉ ግለሰቦች የደም ልገሳን መቀበል አንችልም ምክንያቱም ለለጋሹም ሆነ ለተቀባዩ አደጋ ያስከትላል.የደም ልገ ሳን አስፈላጊነት ግንዛቤ በማስጨበጥ እና ሌሎችም እንዲለግሱ በማበረታታት የዓላማችንን ድጋፍ እንድትቀጥሉ እናሳስባለን።';
            return redirect()->back()->with('error', $message);
        } else {

            $var = new reservationModel;
            $var->donor_id = $req->user_id;
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

            ->where("donor_id", $id)
            ->exists();
        if ($isExist) {

            $stats = reservationModel::where('donor_id', '=', $id)->orderBy('created_at', 'desc')->get(['status'])->first();
            //$stat = donorRequestModel::where('user_id', $id)->get(['status']);
            $stat = $stats->status;

            return view('donor.reservationHistory', compact('stat'));
        } else {
            return redirect('donor/home')->with('warning', 'Reservation empity send reservation');
        }
    }

    function viewSeeer()

    {
        // $date = \Carbon\Carbon::today()->subDays(3);
        // $views = User::join('seeker', 'seeker.hospital_id', '=', 'hospitals.hospital_id')
        //     ->where('seeker.created_at', '>=', $date)
        //     ->get(['seeker.*', 'hospitals.hospitalname']);
        $views = DB::table('seeker')
            ->join('hospitals', 'seeker.hospital_id', '=', 'hospitals.hospital_id')
            ->select('seeker.*', 'hospitals.hospitalname')
            ->get();
        return view('donor.viewseeker', compact('views'));
    }

    function Profile($id)
    {
        $isExist = Donor::select("*")
            ->where("donor_id", $id)
            ->exists();

        if ($isExist) {
            $data = Donor::all()->where('donor_id', '=', $id);
            $frequency = donationModel::all()->where('donor_id', '=', $id)->count('donor_id');


            return view('donor.profile', ['data' => $data, 'frequency' => $frequency]);
        }
    }
    function updateProfile(Request $req, int $id)
    {

        Donor::where("donor_id", $id)
            ->update(["firstname" => $req->firstname, "phone" => $req->phone]);
        return redirect()->back()->with('success', 'your Profile,Changed');
    }

    function updatephoto(Request $req, int $id)
    {

        $var = Donor::all()->where('donor_id', '=', $id);
        if ($req->hasfile('photo')) {
            $file = $req->file('photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/registers', $filename);
            $var->photo = $filename;
        }
        Donor::where("donor_id", $id)
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

        $var->user_id = $req->user_id;
        $var->feedback = $req->feedback;
        $var->save();
        return redirect()->back()->with('success', 'your feed has sent Successfully!');
    }

    public function landingPage()
    {
        $data = bbinformatiomModel::where('type', 'service')->get();
        return view('HomePage', ['data' => $data]);
    }
}
