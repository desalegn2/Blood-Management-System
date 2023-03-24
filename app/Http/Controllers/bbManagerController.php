<?php

namespace App\Http\Controllers;

use Alert;
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
use App\Models\donorRequestModel;
use App\Http\Requests\CreateaccountRequest;
use App\Models\referralModel;

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
    //Report
    function ReturnReportpage(Request $req)
    {
        if ($req->reporttype == 'collection') {
            return view('bloodBankManager.reportBloodCollection');
        } else if ($req->reporttype == 'distribution') {
            return view('bloodBankManager.reportBloodDistribution');
        } else if ($req->reporttype == 'request') {
            return view('bloodBankManager.reportBloodRequest');
        }
    }
    function ReportCollection(Request $request)
    {
        $startDate = $request->startdate;
        $endDate = $request->enddate;

        $data = enrollementModel::whereBetween('created_at', [$startDate, $endDate])->get();
        $total = enrollementModel::whereBetween('created_at', [$startDate, $endDate])->sum('volume');

        $mytime = \Carbon\Carbon::now();
        $pdf = PDF::setOptions([
            'defaultFont' => 'sans-serif',
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            // 'chroot' => public_path('uploads/registers'),
        ])->loadView('bloodBankManager.pdf.generateCollection', compact('data', 'startDate', 'endDate', 'total', 'mytime'));
        return $pdf->download('blood collection.pdf');
    }

    function oneDayCollection(Request $request)
    {
        $date = $request->startdate;
        $data = enrollementModel::whereDate('created_at', $date)->get();
        $total = enrollementModel::whereDate('created_at', $date)->sum('volume');
        $pdf = PDF::setOptions([
            'defaultFont' => 'sans-serif',
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
        ])->loadView('bloodBankManager.pdf.oneDayCollection', compact('data', 'total', 'date'));
        return $pdf->download('oneDayCollection.pdf');
    }

    function manyDayReportDistribute(Request $request)
    {
        $startDate = $request->startdate;
        $endDate = $request->enddate;
        $data = distributeBloodModel::whereBetween('created_at', [$startDate, $endDate])->get();

        $pdf = PDF::setOptions([
            'defaultFont' => 'sans-serif',
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
        ])->loadView('bloodBankManager.pdf.generateDistribute', compact('data'));
        return $pdf->download('Distribute_Blood.pdf');
    }
    function ReportDis_one(Request $request)
    {
        $startDate = $request->startdate;
        $data = distributeBloodModel::whereDate('created_at', $startDate)->get();
        $total = enrollementModel::whereDate('created_at', $startDate)->sum('volume');
        $pdf = PDF::setOptions([
            'defaultFont' => 'sans-serif',
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
        ])->loadView('bloodBankManager.pdf.oneDayDistribution', compact('data', 'startDate', 'total'));

        return $pdf->download('oneDayDistribution.pdf');
    }

    function ReportRequest(Request $request)
    {
        $startDate = $request->startdate;
        $endDate = $request->enddate;
        $data = hospitalRequestModel::whereBetween('created_at', [$startDate, $endDate])->get();
        $total = hospitalRequestModel::whereBetween('created_at', [$startDate, $endDate])->sum('volume');

        $mytime = \Carbon\Carbon::now();
        $pdf = PDF::setOptions([
            'defaultFont' => 'sans-serif',
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            'chroot' => public_path('uploads/registers'),
        ])->loadView('bloodBankManager.pdf.generateRequest', compact('data', 'total', 'mytime', 'startDate', 'endDate'));
        return $pdf->download('Request_Data.pdf');
    }
    function oneDayRequest(Request $request)
    {
        $startDate = $request->startdate;
        $data = hospitalRequestModel::whereDate('created_at', $startDate)->get();
        $total = enrollementModel::whereDate('created_at', $startDate)->sum('volume');
        $pdf = PDF::setOptions([
            'defaultFont' => 'sans-serif',
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
        ])->loadView('bloodBankManager.pdf.oneDayRequest', compact('data', 'startDate', 'total'));
        return $pdf->download('oneDayReport.pdf');
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
            ->get(['feedbacks.id', 'feedbacks.created_at', 'feedbacks.feedback', 'users.name', 'users.email', 'users.photo']);
        $fdbk = feedbackModel::all();
        return view('bloodBankManager.feedback', compact('feedback', 'fdbk'));
    }
    function deleteFeedbacks($id)
    {
        $res = feedbackModel::find($id);
        $res->delete();
        return redirect()->back()->with('success', 'Message Delete Successfully!');
    }
    function Distribute(Request $req, $id)
    {
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

        if ($var) {
            $data = addBloodModel::find($id);
            $data->delete();
            return redirect()->back()->with('success', 'Task Added Successfully!');
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
        $recentdoner = donorRequestModel::where('created_at', '>=', $date)->get();

        $aplus = addBloodModel::where('bloodgroup', 'A+')->sum('volume');
        $aminus = addBloodModel::where('bloodgroup', 'A-')->sum('volume');
        $oplus = addBloodModel::where('bloodgroup', 'O+')->sum('volume');
        $ominus = addBloodModel::where('bloodgroup', 'O-')->sum('volume');
        $bplus = addBloodModel::where('bloodgroup', 'B+')->sum('volume');
        $bminus = addBloodModel::where('bloodgroup', 'B-')->sum('volume');
        $abplus = addBloodModel::where('bloodgroup', 'AB+')->sum('volume');
        $abminus = addBloodModel::where('bloodgroup', 'AB-')->sum('volume');

        return view('bloodBankManager.home', compact('donors', 'numberof_message', 'recentdoner', 'aplus', 'aminus', 'oplus', 'ominus', 'bplus', 'bminus', 'abplus', 'abminus',));
    }

    function Referral()
    {

       // $referrals = User::whereHas('referrals')->with('referredUsers.user')->get();

        // $list_referred = referralModel::select('u1.name as referring_name', 'u1.email as referring_email', 'u2.name as referred_name', 'u2.email as referred_email')
        //     ->join('users as u1', 'referrals.referring_id', '=', 'u1.id')
        //     ->join('users as u2', 'referrals.referred_id', '=', 'u2.id')->get();
        $referrals = User::whereHas('referrals')->with('referredUsers.user')->paginate(2);

        return view('bloodBankManager.referralProgram', compact('referrals'));
    }
}
