<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hospitalRequestModel;
use App\Models\technicianOrderModel;
use Illuminate\Support\Facades\Notification;
use App\Models\hospitalPosts;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\bloodStock;
use App\Models\Doctor;
use App\Models\BloodRequestItem;
use App\Models\BloodRequest;

class hospitalController extends Controller
{
    function addDoctors(Request $req)
    {
        $req->validate([
            'email' => 'required|unique:users|max:255|string|email',
            'role' => ['required', 'int', 'max:6'],
            'password' => 'required|string|min:8|confirmed',
            'photo' => 'required|mimes:jpeg,jpg,png,gif,bmp,svg|max:10240',
            'firstname' => ['required', 'regex:/^[\p{L}\s]+$/u', 'max:255'],
            'lastname' => ['required', 'regex:/^[\p{L}\s]+$/u', 'max:255'],
            'gender' => 'required|string|max:25',
            'phone' => ['required', 'regex:/^(09|07)\d{8}$/'],
        ]);

        try {

            $user = User::create([
                'email' => $req->email,
                'password' => Hash::make($req->password),
                'role' => $req->role,
            ]);
            if ($user) {

                if ($req->hasfile('photo')) {
                    $file = $req->file('photo');
                    $extention = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extention;
                    $file->move('uploads/registers', $filename);
                }
                Doctor::create([
                    'photo' => '0.png',
                    'doctor_id' => $user->id,
                    'hospital_id' => $req->hospital_id,
                    'firstname' => $req->firstname,
                    'lastname' => $req->lastname,
                    'gender' => $req->gender,
                    'phone' => $req->phone,
                ]);
                return redirect()->back()->with('success', 'Doctor Add is Done!');
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong in bbManagerController.addHospital',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function bloodRequest(Request $request)
    {
        // Create a new blood request
        $bloodRequest = new BloodRequest();
        $bloodRequest->hospital_id = $request->input('hospital_id');
        $bloodRequest->approved_by = $request->input('approved_by');
        $bloodRequest->save();

        // Create blood request items for each blood type
        if ($bloodRequest) {

            foreach ($request->input('blood_types') as $bloodType => $quantity) {
                if ($quantity > 0) {
                    $bloodRequestItem = new BloodRequestItem();
                    $bloodRequestItem->request_id = $bloodRequest->id;
                    $bloodRequestItem->blood_type = $bloodType;
                    $bloodRequestItem->quantity = $quantity;
                    $bloodRequestItem->save();
                }
            }
            return redirect()->back()->with('success', 'Blood request submitted successfully!');
        }
    }
    public function viewHistory($id)
    {
        $isExist = BloodRequest::select("*")
            ->where("user_id", $id)
            ->exists();

        if ($isExist) {
            $data = BloodRequest::where('user_id', "=", $id)->orderBy('created_at', 'desc')->get();
            //$data = hospitalRequestModel::where('user_id', 'LIKE', '%' . $id . '%')->get();
            return view('healthinstitute.viewRequest', compact('data'));
        } else {
            // return view('healthinstitute.healthinstituteHome')->with('warning', 'you do not send request!');
            return redirect('healthinstitute/home')->with('warning', 'No Request');
        }
    }

    function findDonor(Request $req)
    {
        $data = addBloodModel::all();
        return view('healthinstitute.findDonor', ['data' => $data]);
    }

    function viewHospitalRequest(Request $req)
    {
        $views = hospitalRequestModel::all()->where('readat', '=', 'unread');
        return view('admin.hospitalRequest', ['views' => $views]);
    }


    public function show($id)
    {
        $user = hospitalRequestModel::find($id);
        return response()->json($user);
    }


    function postSeeker(Request $req)
    {

        $req->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:hospitalpost'],
            'photo' => 'required|mimes:jpeg,png,jpg,gif',
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',

            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',


            'age' => 'min:1|max:3',
            'whenneed' => 'required|date|after_or_equal:today',
        ]);
        $var = new hospitalPosts;
        $var->user_id = $req->user_id;
        $var->patientname = $req->fname;
        $var->lastname = $req->lname;
        $var->email = $req->email;
        $var->phone = $req->phone;
        $var->gender = $req->gender;
        $var->whenneed = $req->whenneed;
        $var->amount = $req->amount;
        $var->bloodtype = $req->bloodtype;
        $var->age = $req->age;
        $var->hospital = $req->hospital;
        $var->state = $req->state;
        $var->city = $req->city;
        $var->purpose = $req->purpose;
        if ($req->hasfile('photo')) {
            $file = $req->file('photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/registers', $filename);
            $var->photo =  $filename;
        }
        $var->save();
        return redirect('healthinstitute/posts')->with('success', 'Task Added Successfully!');
    }
    public function mypost($id)
    {
        $isExist = hospitalPosts::select("*")
            ->where("user_id", $id)
            ->exists();
        if ($isExist) {
            $data = hospitalPosts::where('user_id', "=", $id)->get();
            //$data = hospitalRequestModel::where('user_id', 'LIKE', '%' . $id . '%')->get();
            return view('healthinstitute.mypost', compact('data'));
        } else {
            return redirect('healthinstitute/post_seeker');
        }
    }

  
    public function search(Request $request)
    {
        $blood = $request->bloodtype;
        $city = $request->city;
        $data = addBloodModel::where('bloodgroup', $blood)->Where('city', $city)->get();
        return view('healthinstitute.donor',  ['data' => $data]);
    }
    function viewblood()
    {
        $aplus = bloodStock::where('bloodgroup', 'A+')->where('status', '=', 'accept')->sum('volume');
        $aminus = bloodStock::where('bloodgroup', 'A-')->where('status', '=', 'accept')->sum('volume');
        $oplus = bloodStock::where('bloodgroup', 'O+')->where('status', '=', 'accept')->sum('volume');
        $ominus = bloodStock::where('bloodgroup', 'O-')->where('status', '=', 'accept')->sum('volume');
        $bplus = bloodStock::where('bloodgroup', 'B+')->where('status', '=', 'accept')->sum('volume');
        $bminus = bloodStock::where('bloodgroup', 'B-')->where('status', '=', 'accept')->sum('volume');
        $abplus = bloodStock::where('bloodgroup', 'AB+')->where('status', '=', 'accept')->sum('volume');
        $abminus = bloodStock::where('bloodgroup', 'AB-')->where('status', '=', 'accept')->sum('volume');
        return view('healthinstitute.healthinstituteHome', compact('aplus', 'aminus', 'oplus', 'ominus', 'bplus', 'bminus', 'abplus', 'abminus',));
    }

    function deletepost($id)
    {
        $res = hospitalPosts::find($id);
        $res->delete();

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
            return view('healthinstitute.profile', ['data' => $data]);
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
        //return redirect('nurse/home');
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
