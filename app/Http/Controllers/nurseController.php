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

class nurseController extends Controller
{
    function viewdetail($id)
    {
        $donors = donorRequestModel::find($id);
        return view('nurse.donorDetail', ['donors' => $donors]);
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
            //return view('nurse.profile', ['data' => $data]);
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
    function displayA()
    {
        //$stats = donorRequestModel::all()->orderBy('created_at', 'desc')->take(4);
        $date = \Carbon\Carbon::today()->subDays(1);
        $stats = donorRequestModel::where('created_at', '>=', $date)->get();
        $display1 = reservationModel::all();

        return view('nurse.nurseHome', compact('display1', 'stats'));
    }

    function manageReservation()
    {
        $accepts = reservationModel::all();
        return view('nurse.reserationManagement', ['accepts' => $accepts]);
    }

    function deleteRes($id)
    {
        $res = reservationModel::find($id);
        $res->delete();

        return view('nurse.reserationManagement');
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
        $var->fullname = $req->fullname;
        $var->occupation = $req->occupation;
        $var->email = $req->email;
        $var->phone = $req->phone;
        $var->gender = $req->gender;
        $var->bloodpressure = $req->bloodpressure;
        $var->bloodtype = $req->bloodtype;
        $var->volume = $req->volume;
        $var->hct = $req->hct;
        $var->remark = $req->remark;
        $var->weight = $req->weight;
        $var->height = $req->height;
        $var->rh = $req->rh;
        $var->bithdate = $req->birthdate;
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
        return view('nurse.registerDonor')->with('success', 'Task Added Successfully!');
    }
    function notifys()
    {
        $var = enrollementModel::all();

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
            return view('nurse.nurseHome')->with('success', 'Message send Successfully!');
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong in nurseController.sendnotification',
                'error' => $e->getMessage()
            ], 400);
            //return view('nurse.notify')->with('success', 'Message send Successfully!');
        }
    }
    public function generateReport()
    {
        $pdf = PDF::loadView('nurse.viewDonor');
        return $pdf->download('demo.pdf');
    }
}
