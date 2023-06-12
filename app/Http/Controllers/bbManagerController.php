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
use Illuminate\Support\Facades\DB;
use \Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
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
use App\Models\centorModel;
use Carbon\Carbon;

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
        return redirect()->back()->with('success', 'Information is added !');;
    }

    function addCenters(Request $req)
    {
        $var = new centorModel;
        $var->centor_name = $req->centorName;
        $var->address = $req->address;
        $var->maximum_donation = $req->maximum_donation;
        $var->save();
        return redirect()->back()->with('success', 'Center is added !');
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
                    'manager_fname' => $req->manager_fname,
                    'manager_lname' => $req->manager_lname,
                    'gender' => $req->gender,
                    'phone' => $req->phone,
                ]);
                // Generate the login link
                $loginLink = url('http://127.0.0.1:8000/login');
                // Default password
                $password = '123456@ab';
                // Send the login link and default password to the email address
                Mail::raw("Here is your login link: $loginLink \nDefault Password: $password", function ($message) use ($req) {
                    $message->to($req->email)->subject('Login Link and Default Password');
                });
                return redirect()->back()->with('success', 'Hospital Add is Done! Login link has been sent to the email address.');
            }
        } catch (\Exception $e) {
            // Check if the exception is related to a network connection error
            if (strpos($e->getMessage(), 'Connection could not be established') !== false) {
                // Network connection error occurred

                // Display a short error message to the user
                Session::flash('error', 'Failed to establish a network connection. Please check your internet connection.');
                return redirect()->back();
            }
        }
    }

    function requests()
    {
        $bloodRequests = BloodRequest::with('hospital', 'bloodRequestItems')->paginate(5);
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

    function view()
    {
        $bloodTypes = ['A+', 'A-', 'B+', 'B-', 'AB-', 'AB+', 'O-', 'O+'];
        $donorCounts = [
            Donor::where('bloodtype', 'A+')->count(),
            Donor::where('bloodtype', 'A-')->count(),
            Donor::where('bloodtype', 'B+')->count(),
            Donor::where('bloodtype', 'B-')->count(),
            Donor::where('bloodtype', 'AB-')->count(),
            Donor::where('bloodtype', 'AB+')->count(),
            Donor::where('bloodtype', 'O-')->count(),
            Donor::where('bloodtype', 'O+')->count()
        ];

        $donations = donationModel::all();
        $expiration = distributeBloodModel::where('status','expired')->get();
        $expiration_two = bloodStock::where('status','expired')->get();

        return view('bloodBankManager.generatePdf', compact('bloodTypes', 'donorCounts', 'donations','expiration','expiration_two'));
    } 
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
        $user = Auth::user();
        $id = $user->id;
        $name = staffModel::where('staff_id', $id)->first();
        $fname = $name->firstname;
        $lname = $name->lastname;
        $startDate = $request->startdate;
        $endDate = $request->enddate;

        //$data = donationModel::whereBetween('created_at', [$startDate, $endDate])->get();
        $total = donationModel::whereBetween('created_at', [$startDate, $endDate])->sum('volume');

        $mytime = \Carbon\Carbon::now();
        $data = DB::table('donation')
            ->join('donors', 'donation.donor_id', '=', 'donors.donor_id')
            ->select('donors.firstname', 'donors.lastname', 'donors.bloodtype', 'donors.gender', 'age', 'donation.created_at', 'donation.volume')
            ->whereBetween('donation.created_at', [$startDate, $endDate])
            ->get();
        $pdf = PDF::setOptions([
            'defaultFont' => 'sans-serif',
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            // 'chroot' => public_path('uploads/registers'),
        ])->loadView('bloodBankManager.pdf.generateCollection', compact('data', 'fname', 'lname', 'startDate', 'endDate', 'total', 'mytime'));
        return $pdf->download('blood collection.pdf');
    }

    function oneDayCollection(Request $request)
    {
        $user = Auth::user();
        $id = $user->id;
        $name = staffModel::where('staff_id', $id)->first();
        $fname = $name->firstname;
        $lname = $name->lastname;
        $date = $request->startdate;
        //  $data = donationModel::whereDate('created_at', $date)->get();
        $total = donationModel::whereDate('created_at', $date)->sum('volume');
        $data = DB::table('donation')
            ->join('donors', 'donation.donor_id', '=', 'donors.donor_id')
            ->select('donors.firstname', 'donors.lastname', 'donors.bloodtype', 'donors.gender', 'age', 'donation.created_at', 'donation.volume')
            ->whereDate('donation.created_at', $date)
            ->get();
        $pdf = PDF::setOptions([
            'defaultFont' => 'sans-serif',
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
        ])->loadView('bloodBankManager.pdf.oneDayCollection', compact('data', 'fname', 'lname', 'total', 'date'));
        return $pdf->download('oneDayCollection.pdf');
    }

    function manyDayReportDistribute(Request $request)
    {

        $user = Auth::user();
        $id = $user->id;
        $name = staffModel::where('staff_id', $id)->first();
        $fname = $name->firstname;
        $lname = $name->lastname;

        $mytime = \Carbon\Carbon::now();

        $startDate = $request->startdate;
        $endDate = $request->enddate;
        //  $data = distributeBloodModel::whereBetween('created_at', [$startDate, $endDate])->get();

        $total = DB::table('distribute')
            ->join('bloodstock', 'distribute.stock_id', '=', 'bloodstock.id')
            ->whereBetween('distribute.created_at', [$startDate, $endDate])
            ->sum('bloodstock.volume');

        $data = DB::table('distribute')
            ->join('bloodstock', 'distribute.stock_id', '=', 'bloodstock.id')
            ->join('hospitals', 'distribute.hospital_id', '=', 'hospitals.hospital_id')
            ->select('hospitals.hospitalname', 'bloodstock.bloodgroup', 'bloodstock.volume', 'bloodstock.expitariondate')
            ->whereBetween('distribute.created_at', [$startDate, $endDate])
            ->get();

        $pdf = PDF::setOptions([
            'defaultFont' => 'sans-serif',
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
        ])->loadView('bloodBankManager.pdf.generateDistribute', compact('data', 'fname', 'lname', 'total', 'mytime', 'startDate', 'endDate'));
        return $pdf->download('Distribute_Blood.pdf');
    }
    function ReportDis_one(Request $request)
    {
        $user = Auth::user();
        $id = $user->id;
        $name = staffModel::where('staff_id', $id)->first();
        $fname = $name->firstname;
        $lname = $name->lastname;

        $startDate = $request->startdate;
        $dateofReport = \Carbon\Carbon::now();

        $total = DB::table('distribute')
            ->join('bloodstock', 'distribute.stock_id', '=', 'bloodstock.id')
            ->whereDate('distribute.created_at', $startDate)
            ->sum('bloodstock.volume');

        $data = DB::table('distribute')
            ->join('bloodstock', 'distribute.stock_id', '=', 'bloodstock.id')
            ->join('hospitals', 'distribute.hospital_id', '=', 'hospitals.hospital_id')
            ->select('hospitals.hospitalname', 'bloodstock.bloodgroup', 'bloodstock.volume', 'bloodstock.expitariondate')
            ->whereDate('distribute.created_at', $startDate)
            ->get();
        $pdf = PDF::setOptions([
            'defaultFont' => 'sans-serif',
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
        ])->loadView('bloodBankManager.pdf.oneDayDistribution', compact('data', 'startDate', 'dateofReport', 'total', 'fname', 'lname'));

        return $pdf->download('oneDayDistribution.pdf');
    }

    function ReportRequest(Request $request)
    {
        $startDate = $request->startdate;
        $endDate = $request->enddate;
        $data = BloodRequest::whereBetween('created_at', [$startDate, $endDate])->get();
        $total = BloodRequest::whereBetween('created_at', [$startDate, $endDate])->sum('volume');

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
        $data = BloodRequest::whereDate('created_at', $startDate)->get();
        $total = BloodRequest::whereDate('created_at', $startDate)->sum('volume');
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
        $data = bloodStock::where('status', '=', 'accept')->paginate(5);

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

    function feedbacks()

    {
        $feedback = User::join('feedback', 'feedback.user_id', '=', 'users.id')
            ->select('feedback.id', 'feedback.created_at', 'feedback.feedback', 'users.email')
            ->paginate(4);
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
        $isExist = staffModel::select("*")
            ->where("staff_id", $id)
            ->exists();
        if ($isExist) {
            $data = staffModel::where('staff_id', $id)->with('user')->get();

            return view('bloodBankManager.profile', ['data' => $data]);
        }
    }
    function updateProfile(Request $req, int $id)
    {

        staffModel::where("staff_id", $id)
            ->update(["firstname" => $req->firstname, "lastname" => $req->lastname, "phone" => $req->phone]);
        return redirect()->back()->with('success', 'your Profile,Changed');
    }

    function updatephoto(Request $req, int $id)
    {

        $var = staffModel::all()->where('staff_id', '=', $id);
        if ($req->hasfile('photo')) {
            $file = $req->file('photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/registers', $filename);
            $var->photo = $filename;
        }
        staffModel::where("staff_id", $id)
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
            return redirect()->back()->with('warning', 'password not match with old!');
        }
    }


    function HomePage()
    {

        $date = \Carbon\Carbon::today()->subDays(25);

        $aplus = bloodStock::whereDate('created_at', '>=', $date)->where('bloodgroup', 'A+')->where('status', '=', 'accept')->sum('volume');
        $aminus = bloodStock::whereDate('created_at', '>=', $date)->where('bloodgroup', 'A-')->where('status', '=', 'accept')->sum('volume');
        $ominus = bloodStock::whereDate('created_at', '>=', $date)->whereDate('created_at', '<=', \Carbon\Carbon::today())->where('bloodgroup', 'O-')->where('status', '=', 'accept')->sum('volume');
        $oplus = bloodStock::whereDate('created_at', '>=', $date)->where('bloodgroup', 'O+')->where('status', '=', 'accept')->sum('volume');
        $bplus = bloodStock::whereDate('created_at', '>=', $date)->where('bloodgroup', 'B+')->where('status', '=', 'accept')->sum('volume');
        $bminus = bloodStock::whereDate('created_at', '>=', $date)->where('bloodgroup', 'B-')->where('status', '=', 'accept')->sum('volume');
        $abplus = bloodStock::whereDate('created_at', '>=', $date)->where('bloodgroup', 'AB+')->where('status', '=', 'accept')->sum('volume');
        $abminus = bloodStock::whereDate('created_at', '>=', $date)->where('bloodgroup', 'AB-')->where('status', '=', 'accept')->sum('volume');

        //for pie chart
        $bloodTypes = ['A+', 'A-', 'O+', 'O-', 'B+', 'B-', 'AB+', 'AB-'];
        $volumes = [$aplus, $aminus, $oplus, $ominus, $bplus, $bminus, $abplus, $abminus];

        return view('bloodBankManager.home', compact('bloodTypes', 'volumes', 'aplus', 'aminus', 'oplus', 'ominus', 'bplus', 'bminus', 'abplus', 'abminus',));
    }

    function Referral()
    {
        $referrals = Donor::whereHas('referrals')->with('referredUsers.donor')->paginate(5);

        return view('bloodBankManager.referralProgram', compact('referrals'));
    }
}

