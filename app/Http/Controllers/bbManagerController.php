<?php

namespace App\Http\Controllers;

use Alert;
use Illuminate\Http\Request;
use App\Models\enrollementModel;
use App\Models\hospitalRequestModel;
use PDF;
use App\Models\distributeBloodModel;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use \Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Notifications\sendNotification;
use App\Models\feedbackModel;
use App\Models\bbinformatiomModel;
use App\Http\Requests\CreateaccountRequest;
use App\Models\referralModel;
use App\Models\donationModel;
use App\Models\bloodStock;
use App\Models\Donor;
use App\Models\hospitalModel;
use App\Models\BloodRequest;
use App\Models\staffModel;

class bbManagerController extends Controller
{

    function addInfo(Request $req)
    {
        $var = new bbinformatiomModel;
        $var->user_id = $req->user_id;
        $var->title = $req->title;
        $var->description = $req->description;
        $var->type = $req->type;

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

            $user = User::create([
                'email' => $req->email,
                'password' => Hash::make($req->password),
                'role' => $req->role,
            ]);
            if ($user) {
                hospitalModel::create([
                    'hospital_id' => $user->id,
                    'hospitalname' => $req->hospitalname,
                    'manager_fname' => $req->managerfname,
                    'manager_lname' => $req->managerlname,
                    'gender' => $req->gender,
                    'phone' => $req->phone,
                ]);
                return redirect()->back()->with('success', 'Hospital Add is Done!');
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong in bbManagerController.addHospital',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    function requests()
    {

        $bloodRequests = BloodRequest::with('hospital', 'bloodRequestItems')->get();

        return view('bloodBankManager.request', ['bloodRequests' => $bloodRequests]);
    }


    function Approve(Request $req, $id)
    {
        $data = BloodRequest::find($id);

        $user = Auth::user();
        $staff_id = $user->id;
        $approvedby = staffModel::find($staff_id);

        $name = $approvedby->firstname;
        $status = $req->status;

        $data->status = $status;
        $data->approved_by = $name;

        $data->save();
        return redirect()->back();
    }

    function deleteRequest($id)
    {
        $res = hospitalRequestModel::find($id);
        $res->delete();

        return redirect()->back()->with('success', 'Message Delete Successfully!');
    }
    function view()
    {
        //$don = enrollementModel::all();
        return view('bloodBankManager.generatePdf');
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

    function Bloods()
    {
        $hospital = hospitalModel::all();
        $data = bloodStock::where('status', '=', 'accept')->paginate(10);

        return view('bloodBankManager.availableBlood', compact('hospital', 'data'));
    }


    function DonorHistory()
    {
        $data = bloodStock::paginate(5);

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

            $message = User::find($id);
            \Notification::send($message, new sendNotification($details));

            return redirect()->back()->with('success', 'Message send Successfully! to', $message);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong in bbManagerController.sendnotification',
                'error' => $e->getMessage()
            ], 400);
        }
    }
    function bloodJorny()
    {
        $data = distributeBloodModel::with(['hospital', 'stock'])->paginate(5);
        //$data = distributeBloodModel::paginate(5);
        return view('bloodBankManager.bloodJorny', ['data' => $data]);
    }
    function sendBloodJorny(Request $req, $id)
    {
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

            $message = User::find($id);
            \Notification::send($message, new sendNotification($details));

            return redirect()->back()->with('success', 'Message send Successfully! to', $message);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong in bbManagerController.sendnotification',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    function searchDonor(Request $req)
    {
        $a = $req->fullname;
        $data = addBloodModel::where('fullname', $a)->orWhere('phone', $a)->orWhere('email', $a)->paginate(5);
        return view('bloodBankManager.donorHistory', ['data' => $data]);
    }


    function feedbacks()

    {
        $feedback = User::join('feedback', 'feedback.user_id', '=', 'users.id')
            ->get(['feedback.id', 'feedback.created_at', 'feedback.feedback', 'users.email']);
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
        $var->stock_id = $id;
        $var->hospital_id = $req->hospitalid;

        $var->save();

        if ($var) {

            bloodStock::where("id", $id)
                ->update(["status" => "distribute"]);
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
        //$donors = donationModel::paginate(10);
        // $donors = bloodStock::where('status', '=', 'accept')->paginate(10);

        // $numberof_message = hospitalRequestModel::where('readat', 'unread')->count();

        //$date = \Carbon\Carbon::today()->subDays(1);
        //$recentdoner = donorRequestModel::where('created_at', '>=', $date)->get();


        $aplus = bloodStock::where('bloodgroup', 'A+')->where('status', '=', 'accept')->sum('volume');
        $aminus = bloodStock::where('bloodgroup', 'A-')->where('status', '=', 'accept')->sum('volume');
        $oplus = bloodStock::where('bloodgroup', 'O+')->where('status', '=', 'accept')->sum('volume');
        $ominus = bloodStock::where('bloodgroup', 'O-')->where('status', '=', 'accept')->sum('volume');
        $bplus = bloodStock::where('bloodgroup', 'B+')->where('status', '=', 'accept')->sum('volume');
        $bminus = bloodStock::where('bloodgroup', 'B-')->where('status', '=', 'accept')->sum('volume');
        $abplus = bloodStock::where('bloodgroup', 'AB+')->where('status', '=', 'accept')->sum('volume');
        $abminus = bloodStock::where('bloodgroup', 'AB-')->where('status', '=', 'accept')->sum('volume');
        //for pie chart
        $bloodTypes = ['A+', 'A-', 'O+', 'O-', 'B+', 'B-', 'AB+', 'AB-'];
        $volumes = [$aplus, $aminus, $oplus, $ominus, $bplus, $bminus, $abplus, $abminus];

        return view('bloodBankManager.home', compact('bloodTypes', 'volumes', 'aplus', 'aminus', 'oplus', 'ominus', 'bplus', 'bminus', 'abplus', 'abminus',));
    }

    function Referral()
    {

        // $referrals = User::whereHas('referrals')->with('referredUsers.user')->get();

        // $list_referred = referralModel::select('u1.name as referring_name', 'u1.email as referring_email', 'u2.name as referred_name', 'u2.email as referred_email')
        //     ->join('users as u1', 'referrals.referring_id', '=', 'u1.id')
        //     ->join('users as u2', 'referrals.referred_id', '=', 'u2.id')->get();
        $referrals = Donor::whereHas('referrals')->with('referredUsers.donor')->paginate(2);

        return view('bloodBankManager.referralProgram', compact('referrals'));
    }
}
