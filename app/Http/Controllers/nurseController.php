<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HIprofile;
use App\Models\nurseprofile;
use App\Models\approvedViewModel;
use App\Models\User;
use App\Models\advertises;
use App\Models\reservationModel;
use App\Models\donorRequestModel;
use Illuminate\Support\Facades\Hash;
use App\Models\enrollementModel;

use \Notification;
use PDF;
use Illuminate\Notifications\Messages\MailMessage;
use App\Notifications\sendNotification;
use App\Models\addBloodModel;

class nurseController extends Controller
{
    function ReturntoHome()
    {
        //$stats = donorRequestModel::all()->orderBy('created_at', 'desc')->take(4);
        $donors_enrolled = enrollementModel::count();
        $donor = donorRequestModel::count();
        //  $donors_enrolled = enrollementModel::distinct()->count('fullname');

        //  $a = enrollementModel::where('bloodtype', 'A-')->distinct()->count('fullname');

        $aplus = enrollementModel::where('bloodtype', 'A+')->count();
        $aminus = enrollementModel::where('bloodtype', 'A-')->count();
        $bplus = enrollementModel::where('bloodtype', 'B+')->count();
        $bminus = enrollementModel::where('bloodtype', 'B-')->count();
        $abminus = enrollementModel::where('bloodtype', 'AB-')->count();
        $abplus = enrollementModel::where('bloodtype', 'AB+')->count();
        $ominus = enrollementModel::where('bloodtype', 'O-')->count();
        $oplus = enrollementModel::where('bloodtype', 'O+')->count();

        $date = \Carbon\Carbon::today()->subDays(1);
        $stats = donorRequestModel::where('created_at', '>=', $date)->get();
        $display1 = reservationModel::all();

        return view('nurse.nurseHome', compact('display1', 'stats', 'donor', 'donors_enrolled', 'aminus', 'aplus', 'bminus', 'bplus', 'abminus', 'abplus', 'ominus', 'oplus'));
    }


    function aminusDonor()
    {
        $aminus = donorRequestModel::all()->where('bloodtype', '=', 'A-');
        return view('nurse.aminusDonor', ['aminusdonors' => $aminus]);
    }
    function Profile($id)
    {
        $isExist = User::select("*")
            ->where("id", $id)
            ->exists();
        if ($isExist) {
            $data = User::all()->where('id', '=', $id);
            return view('nurse.profile', ['data' => $data]);
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

    function advertise(Request $req)
    {

        $var = new advertises;
        $var->title = $req->title;
        $var->description = $req->discription;

        if ($req->hasfile('image')) {
            $file = $req->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/registers', $filename);
            $var->image = $filename;
        }
        $var->save();
        return redirect('nurse/home');
    }

    function displayapproved()
    {
        $xy = approvedViewModel::all()->where('status', '=', 'Approved');
        return view('nurse.approvedDonor', ['xy' => $xy]);
    }


    function manageReservation()
    {
        $accepts = reservationModel::all();
        return view('nurse.reserationManagement', ['accepts' => $accepts]);
    }

    function reservationDetail($id)
    {
        $donors = reservationModel::find($id);
        return view('nurse.reservationDetail', ['donors' => $donors]);
    }
    // public function reservationstatus(Request $request, $id)
    // {
    //     $user = reservationModel::find($id);

    //     $status = $user->status == 'Approve' ? 'DisApprove' : 'Approve';

    //     reservationModel::where('id', $id)
    //         ->update([
    //             'status' => $status
    //         ]);

    //     if ($status == 1)
    //         $msg = 'User blocked successfully';
    //     else
    //         $msg = 'User unblocked successfully';
    //     // return redirect()->previous();
    //     return redirect()->back();
    // }

    function deleteRes($id)
    {
        $res = reservationModel::find($id);
        $res->delete();

        return redirect()->back();
    }
    function accept($id)
    {
        $res = reservationModel::find($id);
        $res->status = "Accepted";
        $res->save();
        return redirect()->back();
    }
    function notAccept($id)
    {
        $res = reservationModel::find($id);
        $res->status = "Disapproved";
        $res->save();
        return redirect()->back();
    }
    function changeReservation(Request $req, $id)
    {

        $res = reservationModel::find($id);
        $var = $req->changedate;
        $res->appointmentdate = $var;
        $res->save();
        return redirect()->back()->with('success', 'Task Added Successfully!');
    }
    function enrollDonor(Request $req)
    {
        $var = new enrollementModel;
        $var->user_id = $req->user_id;
        $var->firstname = $req->first_name;
        $var->lastname = $req->last_name;
        $var->packno = $req->packno;
        $var->occupation = $req->occupation;
        $var->email = $req->email;
        $var->phone = $req->phone;
        $var->gender = $req->gender;
        $var->bloodtype = $req->bloodtype;
        $var->volume = $req->volume;
        $var->remark = $req->remark;
        $var->weight = $req->weight;
        $var->height = $req->height;
        $var->age = $req->age;
        $var->country = $req->country;
        $var->state = $req->state;
        $var->city = $req->city;
        $var->zone = $req->zone;
        $var->woreda = $req->woreda;
        $var->kebelie = $req->kebelie;
        $var->housenumber = $req->housenumber;
        $var->typeofdonation = $req->typeofdonation;
        if ($req->hasfile('photo')) {
            $file = $req->file('photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/registers', $filename);
            $var->photo =  $filename;
        }
        $var->save();
        return redirect()->back()->with('success', 'Task Added Successfully!');
    }

    function listofDonor()
    {
        $data = enrollementModel::paginate(5);
        return view('nurse.listOfRegistor', compact('data'));
    }
    function searchDonor(Request $req)
    {
        $a = $req->fullname;
        $data = enrollementModel::where('fullname', $a)->orWhere('phone', $a)->orWhere('email', $a)->paginate(5);
        return view('nurse.listOfRegistor', compact('data'));
    }
    function getDonor($id)
    {
        $isExist = enrollementModel::select("*")
            ->where("id", $id)
            ->exists();
        if ($isExist) {
            $donors = enrollementModel::find($id);
            return view('nurse.registorAlreadyDonated', ['data' => $donors]);
        }
    }
    function notifys()
    {
        $date = \Carbon\Carbon::today()->subDays(15);
        $var = enrollementModel::where('created_at', '<=', $date)->get();

        //  $var = enrollementModel::all();
        return view('nurse.notify', ['donors' => $var]);
    }

    function DaystoNotify(Request $req)
    {
        $date = $req->date;
        $lengthof_date = \Carbon\Carbon::today()->subDays($date);
        $var = enrollementModel::where('created_at', '<=', $lengthof_date)->get();
        return view('nurse.notify', ['donors' => $var]);
    }

    public function sendnotification($id)
    {
        $details = [
            'greeting' => 'hi',
            'body' => 'how are you',
            'acttext' => 'Dear customer, the day of donation has arrived',
            'actionurl' => 'goto to our center',
            'lastline' => 'last information',
        ];
        try {

            $msg = enrollementModel::find($id);

            \Notification::send($msg, new sendNotification($details));
            return redirect()->back()->with('success', 'Message send Successfully!', $msg);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong in nurseController.sendnotification',
                'error' => $e->getMessage()
            ], 400);
        }
    }
    public function generateReport()
    {
        $pdf = PDF::loadView('nurse.viewDonor');
        return $pdf->download('demo.pdf');
    }

    public function search_donors(Request $req)
    {

        $bloodtype = $req->bloodtype;


        //$data = enrollementModel::where('bloodtype', $bloodtype)->distinct()->get(['fullname']);
        $data = enrollementModel::where('bloodtype', $bloodtype)->paginate(5);
        return view('nurse.searchDonor', compact('data', 'bloodtype'));
    }
    public function Donordetail($id)
    {
        $donors = enrollementModel::find($id);
        return view('nurse.DetailofDonated', ['donors' => $donors]);

        //return view('nurse.searchDonor', compact('data', 'bloodtype'));
    }
}
