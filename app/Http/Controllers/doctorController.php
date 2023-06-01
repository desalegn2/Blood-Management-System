<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\tansferModel;
use App\Models\Donor;
use App\Models\User;
use App\Models\donationModel;
use App\Models\hospitalModel;
use App\Models\bloodStock;
use \Notification;
use App\Notifications\sendNotification;
use App\Models\distributeBloodModel;

class doctorController extends Controller
{
    function viewblood()
    {
        $user = Auth::user();
        $id = $user->id;
        $stockInfo = DB::table('distribute')
            ->join('bloodstock', 'distribute.stock_id', '=', 'bloodstock.id')
            ->join('doctors', 'distribute.hospital_id', '=', 'doctors.hospital_id')
            ->where('doctors.doctor_id', $id)
            ->where('distribute.status', 'available')
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

        $distributes = DB::table('distribute')
            ->join('bloodstock', 'distribute.stock_id', '=', 'bloodstock.id')
            ->join('hospitals', 'distribute.hospital_id', '=', 'hospitals.hospital_id')
            ->selectRaw('hospitals.hospitalname,
                 SUM(CASE WHEN bloodgroup = "A+" THEN volume ELSE 0 END) AS aplus,
                 SUM(CASE WHEN bloodgroup = "A-" THEN volume ELSE 0 END) AS aminus,
                 SUM(CASE WHEN bloodgroup = "B+" THEN volume ELSE 0 END) AS bplus,
                 SUM(CASE WHEN bloodgroup = "B-" THEN volume ELSE 0 END) AS bminus,
                 SUM(CASE WHEN bloodgroup = "AB+" THEN volume ELSE 0 END) AS abplus,
                 SUM(CASE WHEN bloodgroup = "AB-" THEN volume ELSE 0 END) AS abminus,
                 SUM(CASE WHEN bloodgroup = "O+" THEN volume ELSE 0 END) AS oplus,
                 SUM(CASE WHEN bloodgroup = "O-" THEN volume ELSE 0 END) AS ominus')
            ->where('distribute.status', 'available')
            ->groupBy('hospitals.hospitalname')
            ->get();

        return view('doctor.home', compact('stockInfo', 'distributes'));
    }
    function BloodTransfer()
    {
        $user = Auth::user();
        $id = $user->id;

        $distributes = DB::table('distribute')
            ->join('bloodstock', 'distribute.stock_id', '=', 'bloodstock.id')
            ->join('doctors', 'distribute.hospital_id', '=', 'doctors.hospital_id')
            ->select('distribute.hospital_id', 'bloodstock.id', 'bloodstock.bloodgroup', 'bloodstock.volume', 'bloodstock.rh', 'bloodstock.expitariondate')
            ->where('doctors.doctor_id', '=', $id)
            ->where('distribute.status', 'available')
            ->get();
        return view('doctor.transfer', compact('distributes'));
    }
    function Transfusion(Request $req, $id)
    {
        $res = bloodStock::find($id);
        $donorid = $res->donor_id;
        if ($req->hasfile('photo')) {
            $file = $req->file('photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/registers', $filename);
        }
        $var = new tansferModel;
        $var->doctor_id = $req->doctor_id;
        $var->donor_id = $donorid;
        $var->patientid_number = $req->pid;
        $var->patient_fname = $req->firstname;
        $var->patient_lname = $req->lastname;
        $var->phone = $req->phone;
        $var->gender = $req->gender;
        // $var->photo = $req->filename;
        $var->photo = $req->hasfile('photo') ? $var->filename : '0.png';
        $var->save();
        if ($var) {
            distributeBloodModel::where("stock_id", $id)
                ->update(["status" => "transfer"]);
        }
        if ($var) {
            $res = bloodStock::find($id);
            $donorid = $res->donor_id;
            $doc = Doctor::where('doctor_id', $req->doctor_id)->get()->first();
            $hospitalid = $doc->hospital_id;
            $hospital = hospitalModel::find($hospitalid);
            $hospitalname = $hospital->hospitalname;

            $donor = Donor::where('donor_id', $donorid)->first();
            $fname = $donor->firstname;
            $lname = $donor->lastname;
            $frequency = donationModel::all()->where('donor_id', '=', $donorid)->count('donor_id');

            $details = [
                'greeting' => "ውድ ደም ለጋሻችን $fname $lname ደም ለወገንወ ስለለገሱ እናመሰግናለን የለገሱት ደም የሰው ህይወት ታስጏል ",
                'body' => "ለ $frequency ኛ ጊዜ የለገሱት ደም ለ $req->firstname $req->lastname ተሰጥቷል",
                'lastline' => "$hospitalname",
            ];
            try {

                $message = User::find($donorid);
                \Notification::send($message, new sendNotification($details));

                return redirect()->back()->with('success', 'Task Added Successfully! and Result are sent to donor');
            } catch (\Exception $e) {
                $errorMessage = 'Something went wrong in donorController.Transfusion';

                // Check if the error is related to the internet connection
                if (strpos($e->getMessage(), 'Temporary failure in name resolution') !== false) {
                    $errorMessage = 'There is no internet connection, so message not sent to donor.';
                }

                return redirect()->back()->with('error', $errorMessage);
            }
        }
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
            $data = Doctor::where('doctor_id', $id)->with('user')->get();
            return view('doctor.profile', ['data' => $data]);
        }
    }
    function updateProfile(Request $req, int $id)
    {

        Doctor::where("doctor_id", $id)
            ->update(["firstname" => $req->firstname, "lastname" => $req->lastname, "phone" => $req->phone]);
        return redirect()->back()->with('success', 'your Profile,are Updated');
    }

    function updatephoto(Request $req, int $id)
    {

        $var = Doctor::all()->where('doctor_id', '=', $id);
        if ($req->hasfile('photo')) {
            $file = $req->file('photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/registers', $filename);
            $var->photo = $filename;
        }
        Doctor::where("doctor_id", $id)
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
            return redirect()->back()->with('warning', 'password not match with old password!');
        }
    }
}
