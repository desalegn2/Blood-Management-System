<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\enrollementModel;
use App\Models\hospitalRequestModel;
use PDF;
use App\Models\addBloodModel;

use App\Models\discardBloodModel;
use App\Models\distributeBloodModel;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use \Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Notifications\sendNotification;
use App\Models\feedbackModel;
use App\Models\bbinformatiomModel;
use App\Http\Requests\CreateaccountRequest;

class bbManagerController extends Controller
{

    function addInfo(Request $req)
    {

        $var = new bbinformatiomModel;
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
        return redirect()->back();
    }

    function addHospital(CreateaccountRequest $req)
    {
        try {

            // $password = $req->password;
            // $pass = bcrypt($password);
            if ($req->hasfile('photo')) {
                $file = $req->file('photo');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->move('uploads/registers', $filename);
            }
            User::create([
                'photo' => $req->hasfile('photo') ? $filename : '0.png',
                'name' => $req->name,
                'email' => $req->email,
                'password' => Hash::make($req->password),
                'role' => $req->role,
            ]);
            return redirect('bbmanager/addhospital')->with('success', 'Task Added Successfully!');
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong in bbManagerController.addHospital',
                'error' => $e->getMessage()
            ], 400);
        }
    }
    function view()
    {
        $don = enrollementModel::all();
        return view('bloodBankManager.generatePdf', ['don' => $don]);
    }

    function ReportCollection(Request $request)
    {
        $startDate = $request->startdate;
        $endDate = $request->enddate;

        $data = enrollementModel::whereBetween('created_at', [$startDate, $endDate])->get();
        $pdf = PDF::setOptions([
            'defaultFont' => 'sans-serif',
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            'chroot' => public_path('uploads/registers'),
        ])->loadView('bloodBankManager.pdf.generateCollection', compact('data'));
        return $pdf->download('demo.pdf');
    }
    function ReportDistribute(Request $request)
    {
        $startDate = $request->startdate;
        $endDate = $request->enddate;
        $data = distributeBloodModel::whereBetween('created_at', [$startDate, $endDate])->get();

        $pdf = PDF::setOptions([
            'defaultFont' => 'sans-serif',
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
        ])->loadView('bloodBankManager.pdf.generateDistribute', compact('data'));
        return $pdf->download('Distribute_Data.pdf');
    }
    function ReportDis_one(Request $request)
    {
        $startDate = $request->startdate;
        $data = distributeBloodModel::where('created_at', $startDate)->get();

        $pdf = PDF::setOptions([
            'defaultFont' => 'sans-serif',
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
        ])->loadView('bloodBankManager.pdf.one', compact('data'));
        return $pdf->download('Dist_Data.pdf');
    }

    function ReportRequest(Request $request)
    {
        $startDate = $request->startdate;
        $endDate = $request->enddate;
        $data = hospitalRequestModel::whereBetween('created_at', [$startDate, $endDate])->get();

        $pdf = PDF::setOptions([
            'defaultFont' => 'sans-serif',
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            'chroot' => public_path('uploads/registers'),
        ])->loadView('bloodBankManager.pdf.generateRequest', compact('data'));
        return $pdf->download('Request_Data.pdf');
    }
    function requests()
    {
        $request = hospitalRequestModel::all()->where('readat', '=', 'unread');
        return view('bloodBankManager.request', ['req' => $request]);
    }

    function deleteRequest($id)
    {
        $res = hospitalRequestModel::find($id);
        $res->delete();

        return redirect()->back()->with('success', 'Message Delete Successfully!');
    }
    function Bloods()
    {
        $data = addBloodModel::all()->where('status', '=', 'notexpired');
        return view('bloodBankManager.availableBlood', ['data' => $data]);
    }
    function Read($id)
    {

        $res = hospitalRequestModel::find($id);
        $res->readat = "read";
        $res->save();
        return redirect()->back();
    }
    function Approve($id)
    {
        $data = hospitalRequestModel::find($id);
        $data->status = "Available";
        $data->save();
        return redirect()->back();
    }
    function DisApprove($id)
    {
        $data = hospitalRequestModel::find($id);
        $data->status = "Not Availabe";
        $data->save();
        return redirect()->back();
    }

    function DonorHistory()
    {
        $data = addBloodModel::paginate(5);

        return view('bloodBankManager.donorHistory', ['data' => $data]);
    }
    function searchDonor(Request $req)
    {
        $a = $req->fullname;
        $data = addBloodModel::where('fullname', $a)->orWhere('phone', $a)->orWhere('email', $a)->paginate(5);
        return view('bloodBankManager.donorHistory', ['data' => $data]);
    }

    function sendResult(Request $req, $id)
    {
        //$id = $req->id;
        $greeting = $req->greeting;
        $body = $req->body;
        $acttext = $req->acttext;
        $actionurl = $req->actionurl;
        $lastline = $req->lastline;
        $details = [
            'greeting' => $greeting,
            'body' => $body,
            'acttext' => $acttext,
            'actionurl' => $actionurl,
            'lastline' => $lastline,
        ];
        try {

            $message = addBloodModel::find($id);

            \Notification::send($message, new sendNotification($details));

            return redirect()->back()->with('success', 'Message send Successfully! to', $message);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong in bbManagerController.sendnotification',
                'error' => $e->getMessage()
            ], 400);
        }
    }
    function feedbacks()

    {
        $feedback = User::join('feedbacks', 'feedbacks.user_id', '=', 'users.id')
            ->get(['feedbacks.*', 'users.*']);
        $fdbk = feedbackModel::all();
        return view('bloodBankManager.feedback', compact('feedback', 'fdbk'));
    }
    function deleteFeedbacks($id)
    {
        $res = feedbackModel::find($id);
        $res->delete();
        return redirect()->back()->with('success', 'Message Delete Successfully!');
    }
    function Distribute(Request $req)
    {
        $aplus_stored = addBloodModel::where('bloodgroup', 'A+')->sum('volume');
        $aminus_stored = addBloodModel::where('bloodgroup', 'A-')->sum('volume');
        $oplus_stored = addBloodModel::where('bloodgroup', 'O+')->sum('volume');
        $ominus_stored = addBloodModel::where('bloodgroup', 'O-')->sum('volume');
        $bplus_stored = addBloodModel::where('bloodgroup', 'B+')->sum('volume');
        $bminus_stored = addBloodModel::where('bloodgroup', 'B-')->sum('volume');
        $abplus_stored = addBloodModel::where('bloodgroup', 'AB+')->sum('volume');
        $abminu_stored = addBloodModel::where('bloodgroup', 'AB-')->sum('volume');

        $aplusdiscard = discardBloodModel::where('bloodgroup', 'A+')->sum('unitdiscarded');
        $aminudiscard = discardBloodModel::where('bloodgroup', 'A-')->sum('unitdiscarded');
        $bplusdiscard = discardBloodModel::where('bloodgroup', 'B+')->sum('unitdiscarded');
        $bminusdiscard = discardBloodModel::where('bloodgroup', 'B-')->sum('unitdiscarded');
        $abplusdiscard = discardBloodModel::where('bloodgroup', 'AB+')->sum('unitdiscarded');
        $abminudiscard = discardBloodModel::where('bloodgroup', 'AB-')->sum('unitdiscarded');
        $oplusdiscard = discardBloodModel::where('bloodgroup', 'O+')->sum('unitdiscarded');
        $ominusdiscard = discardBloodModel::where('bloodgroup', 'O-')->sum('unitdiscarded');

        $aplusdistribute = distributeBloodModel::where('bloodgroup', 'A+')->sum('volume');
        $aminusdistribute = distributeBloodModel::where('bloodgroup', 'A-')->sum('volume');
        $bplusdistribute = distributeBloodModel::where('bloodgroup', 'B+')->sum('volume');
        $bminusdistribute = distributeBloodModel::where('bloodgroup', 'B-')->sum('volume');
        $abplusdistribute = distributeBloodModel::where('bloodgroup', 'AB+')->sum('volume');
        $abminusdistribute = distributeBloodModel::where('bloodgroup', 'AB-')->sum('volume');
        $oplusdistribute = distributeBloodModel::where('bloodgroup', 'O+')->sum('volume');
        $ominusdistribute = distributeBloodModel::where('bloodgroup', 'O-')->sum('volume');
        //$total = $aplus + $aminus + $oplus + $ominus + $bplus + $bminus + $abplus + $abminus;
        $aplus = $aplus_stored - $aplusdiscard - $aplusdistribute;
        $aminus = $aminus_stored - $aminudiscard - $aminusdistribute;
        $bplus = $bplus_stored - $bplusdiscard - $bplusdistribute;
        $bminus = $bminus_stored - $bminusdiscard - $bminusdistribute;
        $abplus = $abplus_stored - $abplusdiscard - $abplusdistribute;
        $abminus = $abminu_stored - $abminudiscard - $abminusdistribute;
        $oplus = $oplus_stored - $oplusdiscard - $oplusdistribute;
        $ominus = $ominus_stored - $ominusdiscard - $ominusdistribute;

        if ($req->bloodtype == 'A+') {
            if ($aplus >= $req->volume) {
                $var = new distributeBloodModel;
                $var->packno = $req->packno;
                $var->user_id = $req->user_id;
                $var->bloodgroup = $req->bloodtype;
                $var->volume = $req->volume;
                $var->bloodpressure = $req->bloodpressure;
                $var->rh = $req->rh;
                $var->hct = $req->hct;
                $var->issueddate = $req->issuedate;
                $var->expirydate = $req->expirydate;
                $var->recievedby = $req->centerid;

                $var->donateby = $req->fullname;
                $var->donoremail = $req->email;
                $var->donorphone = $req->phone;
                $var->save();
                return redirect('technitian/distributetohospital')->with('success', 'Task Added Successfully!');
            } else {
                return redirect('technitian/discardblood')->with('warning', 'amount of blood stored less!');
            }
        } else if ($req->bloodtype == 'A-') {
            if ($aminus >= $req->volume) {
                $var = new distributeBloodModel;

                $var->packno = $req->packno;
                $var->user_id = $req->user_id;
                $var->bloodgroup = $req->bloodtype;
                $var->volume = $req->volume;
                $var->bloodpressure = $req->bloodpressure;
                $var->rh = $req->rh;
                $var->hct = $req->hct;
                $var->issueddate = $req->issuedate;
                $var->expirydate = $req->expirydate;
                $var->recievedby = $req->centerid;

                $var->donateby = $req->fullname;
                $var->donoremail = $req->email;
                $var->donorphone = $req->phone;
                $var->save();
                return redirect('bbmanager/bloods')->with('success', 'Task Added Successfully!');
            } else {
                return redirect('bbmanager/bloods')->with('warning', 'amount of blood stored less!');
            }
        } else if ($req->bloodtype == 'B-') {
            if ($bminus >= $req->volume) {
                $var = new distributeBloodModel;
                $var->packno = $req->packno;
                $var->user_id = $req->user_id;
                $var->bloodgroup = $req->bloodtype;
                $var->volume = $req->volume;
                $var->bloodpressure = $req->bloodpressure;
                $var->rh = $req->rh;
                $var->hct = $req->hct;
                $var->issueddate = $req->issuedate;
                $var->expirydate = $req->expirydate;
                $var->recievedby = $req->centerid;

                $var->donateby = $req->fullname;
                $var->donoremail = $req->email;
                $var->donorphone = $req->phone;
                $var->save();
                return redirect('technitian/distributetohospital')->with('success', 'Task Added Successfully!');
            } else {
                return redirect('technitian/discardblood')->with('warning', 'amount of blood stored less!');
            }
        } else if ($req->bloodtype == 'B+') {
            if ($bplus >= $req->volume) {
                $var = new distributeBloodModel;
                $var->packno = $req->packno;
                $var->user_id = $req->user_id;
                $var->bloodgroup = $req->bloodtype;
                $var->volume = $req->volume;
                $var->bloodpressure = $req->bloodpressure;
                $var->rh = $req->rh;
                $var->hct = $req->hct;
                $var->issueddate = $req->issuedate;
                $var->expirydate = $req->expirydate;
                $var->recievedby = $req->centerid;

                $var->donateby = $req->fullname;
                $var->donoremail = $req->email;
                $var->donorphone = $req->phone;
                $var->save();
                return redirect('technitian/distributetohospital')->with('success', 'Task Added Successfully!');
            } else {
                return redirect('technitian/discardblood')->with('warning', 'amount of blood stored less!');
            }
        } else if ($req->bloodtype == 'AB-') {
            if ($abminus >= $req->volume) {
                $var = new distributeBloodModel;
                $var->packno = $req->packno;
                $var->user_id = $req->user_id;
                $var->bloodgroup = $req->bloodtype;
                $var->volume = $req->volume;
                $var->bloodpressure = $req->bloodpressure;
                $var->rh = $req->rh;
                $var->hct = $req->hct;
                $var->issueddate = $req->issuedate;
                $var->expirydate = $req->expirydate;
                $var->recievedby = $req->centerid;

                $var->donateby = $req->fullname;
                $var->donoremail = $req->email;
                $var->donorphone = $req->phone;
                $var->save();
                return redirect('technitian/distributetohospital')->with('success', 'Task Added Successfully!');
            } else {
                return redirect('technitian/discardblood')->with('warning', 'amount of blood stored less!');
            }
        } else if ($req->bloodtype == 'AB+') {
            if ($abplus >= $req->volume) {
                $var = new distributeBloodModel;
                $var->packno = $req->packno;
                $var->user_id = $req->user_id;
                $var->bloodgroup = $req->bloodtype;
                $var->volume = $req->volume;
                $var->bloodpressure = $req->bloodpressure;
                $var->rh = $req->rh;
                $var->hct = $req->hct;
                $var->issueddate = $req->issuedate;
                $var->expirydate = $req->expirydate;
                $var->recievedby = $req->centerid;

                $var->donateby = $req->fullname;
                $var->donoremail = $req->email;
                $var->donorphone = $req->phone;
                $var->save();
                return redirect('technitian/distributetohospital')->with('success', 'Task Added Successfully!');
            } else {
                return redirect('technitian/discardblood')->with('warning', 'amount of blood stored less!');
            }
        } else if ($req->bloodtype == 'O-') {
            if ($ominus >= $req->volume) {
                $var = new distributeBloodModel;
                $var->packno = $req->packno;
                $var->user_id = $req->user_id;
                $var->bloodgroup = $req->bloodtype;
                $var->volume = $req->volume;
                $var->bloodpressure = $req->bloodpressure;
                $var->rh = $req->rh;
                $var->hct = $req->hct;
                $var->issueddate = $req->issuedate;
                $var->expirydate = $req->expirydate;
                $var->recievedby = $req->centerid;

                $var->donateby = $req->fullname;
                $var->donoremail = $req->email;
                $var->donorphone = $req->phone;
                $var->save();
                return redirect('technitian/distributetohospital')->with('success', 'Task Added Successfully!');
            } else {
                return redirect('technitian/discardblood')->with('warning', 'amount of blood stored less!');
            }
        } else if ($req->bloodtype == 'O+') {
            if ($oplus >= $req->volume) {
                $var = new distributeBloodModel;
                $var->packno = $req->packno;
                $var->user_id = $req->user_id;
                $var->bloodgroup = $req->bloodtype;
                $var->volume = $req->volume;
                $var->bloodpressure = $req->bloodpressure;
                $var->rh = $req->rh;
                $var->hct = $req->hct;
                $var->issueddate = $req->issuedate;
                $var->expirydate = $req->expirydate;
                $var->recievedby = $req->centerid;

                $var->donateby = $req->fullname;
                $var->donoremail = $req->email;
                $var->donorphone = $req->phone;
                $var->save();
                return redirect('bbmanager/bloods')->with('success', 'Task Added Successfully!');
            } else {
                return redirect('bbmanager/bloods')->with('warning', 'amount of blood stored less!');
            }
        }
    }

    function Profile($id)
    {
        $isExist = User::select("*")
            ->where("id", $id)
            ->exists();
        if ($isExist) {
            $data = User::all()->where('id', '=', $id);
            return view('bloodBankManager.profile', ['data' => $data]);
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


    function HomePage()
    {
        $donors = enrollementModel::paginate(10);
        $numberof_message = hospitalRequestModel::where('readat', 'unread')->count();

        $date = \Carbon\Carbon::today()->subDays(1);
        $stats = enrollementModel::where('created_at', '>=', $date)->get();
        // $now = Carbon::now();
        //$created_at = Carbon::parse($calls['created_at']);
        //$diffMinutes = $created_at->diffInMinutes($now);
        $aplus_stored = addBloodModel::where('bloodgroup', 'A+')->sum('volume');
        $aminus_stored = addBloodModel::where('bloodgroup', 'A-')->sum('volume');
        $oplus_stored = addBloodModel::where('bloodgroup', 'O+')->sum('volume');
        $ominus_stored = addBloodModel::where('bloodgroup', 'O-')->sum('volume');
        $bplus_stored = addBloodModel::where('bloodgroup', 'B+')->sum('volume');
        $bminus_stored = addBloodModel::where('bloodgroup', 'B-')->sum('volume');
        $abplus_stored = addBloodModel::where('bloodgroup', 'AB+')->sum('volume');
        $abminu_stored = addBloodModel::where('bloodgroup', 'AB-')->sum('volume');

        $aplusdiscard = discardBloodModel::where('bloodgroup', 'A+')->sum('unitdiscarded');
        $aminudiscard = discardBloodModel::where('bloodgroup', 'A-')->sum('unitdiscarded');
        $bplusdiscard = discardBloodModel::where('bloodgroup', 'B+')->sum('unitdiscarded');
        $bminusdiscard = discardBloodModel::where('bloodgroup', 'B-')->sum('unitdiscarded');
        $abplusdiscard = discardBloodModel::where('bloodgroup', 'AB+')->sum('unitdiscarded');
        $abminudiscard = discardBloodModel::where('bloodgroup', 'AB-')->sum('unitdiscarded');
        $oplusdiscard = discardBloodModel::where('bloodgroup', 'O+')->sum('unitdiscarded');
        $ominusdiscard = discardBloodModel::where('bloodgroup', 'O-')->sum('unitdiscarded');

        $aplusdistribute = distributeBloodModel::where('bloodgroup', 'A+')->sum('volume');
        $aminusdistribute = distributeBloodModel::where('bloodgroup', 'A-')->sum('volume');
        $bplusdistribute = distributeBloodModel::where('bloodgroup', 'B+')->sum('volume');
        $bminusdistribute = distributeBloodModel::where('bloodgroup', 'B-')->sum('volume');
        $abplusdistribute = distributeBloodModel::where('bloodgroup', 'AB+')->sum('volume');
        $abminusdistribute = distributeBloodModel::where('bloodgroup', 'AB-')->sum('volume');
        $oplusdistribute = distributeBloodModel::where('bloodgroup', 'O+')->sum('volume');
        $ominusdistribute = distributeBloodModel::where('bloodgroup', 'O-')->sum('volume');
        //$total = $aplus + $aminus + $oplus + $ominus + $bplus + $bminus + $abplus + $abminus;
        $aplus = $aplus_stored - $aplusdiscard - $aplusdistribute;
        $aminus = $aminus_stored - $aminudiscard - $aminusdistribute;
        $bplus = $bplus_stored - $bplusdiscard - $bplusdistribute;
        $bminus = $bminus_stored - $bminusdiscard - $bminusdistribute;
        $abplus = $abplus_stored - $abplusdiscard - $abplusdistribute;
        $abminus = $abminu_stored - $abminudiscard - $abminusdistribute;
        $oplus = $oplus_stored - $oplusdiscard - $oplusdistribute;
        $ominus = $ominus_stored - $ominusdiscard - $ominusdistribute;

        return view('bloodBankManager.home', compact('donors', 'numberof_message', 'stats', 'aplus', 'aminus', 'oplus', 'ominus', 'bplus', 'bminus', 'abplus', 'abminus',));
    }
}
