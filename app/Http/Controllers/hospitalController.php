<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hospitalRequestModel;
use App\Models\technicianOrderModel;
use Illuminate\Support\Facades\Notification;
use App\Models\hospitalPosts;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\bloodStock;
use App\Models\Doctor;
use App\Models\BloodRequestItem;
use App\Models\BloodRequest;
use App\Models\hospitalModel;

class hospitalController extends Controller
{
    function addDoctors(Request $req)
    {
        $req->validate([
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]+$/'
            ],

            'email' => 'required|unique:users|max:255|string|email',
            'role' => ['required', 'int', 'max:6'],
            // 'password' => 'required|string|min:8|confirmed',
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
            ->where("hospital_id", $id)
            ->exists();

        if ($isExist) {
            $data = BloodRequest::with('hospital', 'bloodRequestItems')->where('hospital_id', "=", $id)->get();
            //$data = BloodRequest::where('hospital_id', "=", $id)->orderBy('created_at', 'desc')->get();
            //$data = hospitalRequestModel::where('user_id', 'LIKE', '%' . $id . '%')->get();
            return view('healthinstitute.viewRequest', compact('data'));
        } else {
            // return view('healthinstitute.healthinstituteHome')->with('warning', 'you do not send request!');
            return redirect('healthinstitute/home')->with('warning', 'No Request');
        }
    }
    public function Accept($id)
    {
        $res = BloodRequest::find($id);
        $res->accepted = true;
        $res->save();
        return redirect()->back();
    }



    function findDonor(Request $req)
    {
        $data = addBloodModel::all();
        return view('healthinstitute.findDonor', ['data' => $data]);
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

        $user = Auth::user();
        $id = $user->id;

        $stockInfo = DB::table('distribute')
            ->join('bloodstock', 'distribute.stock_id', '=', 'bloodstock.id')
            ->join('hospitals', 'distribute.hospital_id', '=', 'hospitals.hospital_id')
            ->where('hospitals.hospital_id', $id)
            ->selectRaw('
                 SUM(CASE WHEN bloodgroup = "A+" THEN volume ELSE 0 END) AS aplus,
                 SUM(CASE WHEN bloodgroup = "A-" THEN volume ELSE 0 END) AS aminus,
                 SUM(CASE WHEN bloodgroup = "B+" THEN volume ELSE 0 END) AS bplus,
                 SUM(CASE WHEN bloodgroup = "B-" THEN volume ELSE 0 END) AS bminus,
                 SUM(CASE WHEN bloodgroup = "AB+" THEN volume ELSE 0 END) AS abplus,
                 SUM(CASE WHEN bloodgroup = "AB-" THEN volume ELSE 0 END) AS abminus,
                 SUM(CASE WHEN bloodgroup = "O+" THEN volume ELSE 0 END) AS oplus,
                 SUM(CASE WHEN bloodgroup = "O-" THEN volume ELSE 0 END) AS ominus')
            ->first();
        return view('healthinstitute.healthinstituteHome', compact('stockInfo', 'aplus', 'aminus', 'oplus', 'ominus', 'bplus', 'bminus', 'abplus', 'abminus',));
    }

    function deletepost($id)
    {
        $res = hospitalPosts::find($id);
        $res->delete();

        return redirect()->back();
    }

    function Profile()
    {
        $user = Auth::user();
        $id = $user->id;
        $isExist = User::select("*")
            ->where("id", $id)
            ->exists();
        if ($isExist) {
            // $data = User::all()->where('id', '=', $id);
            $data = hospitalModel::where('hospital_id', $id)->with('user')->get();
            return view('healthinstitute.profile', ['data' => $data]);
        }
    }
    function updateProfile(Request $req, int $id)
    {

        hospitalModel::where("hospital_id", $id)
            ->update(["hospitalname" => $req->hospitalname, "manager_fname" => $req->fname, "manager_lname" => $req->lname, "phone" => $req->phone]);
        return redirect()->back()->with('success', 'your Profile,are Updated');
    }

    function updatephoto(Request $req, int $id)
    {

        $var = hospitalModel::all()->where('hospital_id', '=', $id);
        if ($req->hasfile('photo')) {
            $file = $req->file('photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/registers', $filename);
            $var->photo = $filename;
        }
        hospitalModel::where("hospital_id", $id)
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
