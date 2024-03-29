<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\reservationModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Donor;

use \Notification;
use PDF;
use Illuminate\Notifications\Messages\MailMessage;
use App\Notifications\sendNotification;
use App\Models\bloodStock;
use App\Models\referralModel;
use App\Models\donationModel;

use Vonage\Client;
use Vonage\Client\Credentials\Basic;
use Vonage\SMS\Message\SMS;
use Illuminate\Support\Facades\DB;
use App\Models\bbinformatiomModel;
use App\Models\staffModel;
use App\Models\bloodTest;
use Carbon\Carbon;


class nurseController extends Controller
{


    function advertise(Request $req)
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
    function ReturntoHome()
    {
        //$stats = donorRequestModel::all()->orderBy('created_at', 'desc')->take(4);
        $donors_enrolled = Donor::count();
        $male = Donor::where('gender', 'male')->count();
        $female = Donor::where('gender', 'female')->count();
 
        $aplus = Donor::where('bloodtype', 'A+')->count();
        $aminus = Donor::where('bloodtype', 'A-')->count();
        $bplus = Donor::where('bloodtype', 'B+')->count();
        $bminus = Donor::where('bloodtype', 'B-')->count();
        $abminus = Donor::where('bloodtype', 'AB-')->count();
        $abplus = Donor::where('bloodtype', 'AB+')->count();
        $ominus = Donor::where('bloodtype', 'O-')->count();
        $oplus = Donor::where('bloodtype', 'O+')->count();

        $date = \Carbon\Carbon::today()->subDays(1);
        $stats = reservationModel::where('created_at', '>=', $date)->get();
        $display1 = reservationModel::all();

        return view('nurse.nurseHome', compact('display1', 'male', 'female', 'stats', 'donors_enrolled', 'aminus', 'aplus', 'bminus', 'bplus', 'abminus', 'abplus', 'ominus', 'oplus'));
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
            $data = staffModel::where('staff_id', $id)->with('user')->get();
            return view('nurse.profile', ['data' => $data]);
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

        $var = staffModel::all()->where('staff_id', '=', $id)->first();
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
            return redirect()->back()->with('warning', 'password not match with old password!');
        }
    }

    function manageReservation()
    {

        $reservations = reservationModel::join('donors', 'reservation.donor_id', '=', 'donors.donor_id')
            ->where('reservation.status', '<>', 'Donated')
            ->select('reservation.id', 'reservation.center', 'reservation.status', 'reservation.donor_id', 'donors.phone', 'donors.firstname')
            ->get();
        //->paginate(4);
        return view('nurse.reserationManagement', ['reservations' => $reservations]);
    }

    function reservationDetail($id)
    {
        $donor = reservationModel::join('donors', 'reservation.donor_id', '=', 'donors.donor_id')
            ->where('reservation.id', $id)
            ->select('reservation.*', 'donors.*')
            ->get();
        return view('nurse.reservationDetail', compact('donor'));
    }
    function findReservation(Request $req)
    {
        $req->validate([
            'date' => 'required|date_format:Y-m-d|after_or_equal:today'
        ]);

        $date = $req->date;
        $center = $req->center;
        $reservations = reservationModel::join('donors', 'reservation.donor_id', '=', 'donors.donor_id')
            ->where('center', $center)->whereDate('reservationdate', $date)
            ->where('status', 'Accepted')
            ->select('reservation.*', 'donors.*')
            ->get();
        return view('nurse.reserationManagement', ['reservations' => $reservations]);
    }

    function getReservation($id)
    {
        $donor = reservationModel::join('donors', 'reservation.donor_id', '=', 'donors.donor_id')
            ->where('reservation.id', $id)
            ->select('reservation.*', 'donors.*')
            ->get()
            ->first();
        $donor_id = $donor->donor_id;
        $frequency = donationModel::all()->where('donor_id', '=', $donor_id)->count('donor_id');
        $lastDonationDate = donationModel::where('donor_id', $donor_id)
            ->orderBy('created_at', 'desc')
            ->pluck('created_at')
            ->first();

        return view('nurse.registorAlreadyDonated', ['data' => $donor, 'frequency' => $frequency, 'lastDonationDate' => $lastDonationDate]);
    }

    function accept($id)
    {
        $res = reservationModel::find($id);
        $res->status = "Accepted";
        $res->save();
        return redirect()->back();
    }
    function changeReservation(Request $req, $id)
    {
        $req->validate([
            'changedate' => 'required|date_format:Y-m-d|after_or_equal:today'
        ]);
        $res = reservationModel::find($id);
        $var = $req->changedate;

        $res->reservationdate = $var;
        $res->save();
        return redirect()->back()->with('success', 'Task Added Successfully!');
    }
    function enrollDonor(Request $req)
    {
        $req->validate([
            'packno' => 'required|unique:donation|numeric',
            'weight' => 'required|numeric|min:48',
        ]);
        if ($req->volume < 250 || $req->volume > 450) {
            return redirect()->back()->with('message', 'We are unable to accept your blood donation at this time, as the volume of your blood donation is not within the acceptable range. Thank you for your understanding and support.');
        } else {
            $var = new donationModel;
            $var->nurse_id = $req->nurse_id;
            $var->donor_id = $req->donor_id;
            $var->packno = $req->packno;
            $var->volume = $req->volume;
            $var->weight = $req->weight;
            $var->remark = $req->remark;
            $var->save();

            if ($var) {
                $isExist = reservationModel::select("*")
                    ->where("id", $req->reservation_id)
                    ->exists();
                if ($isExist) {
                    $res = reservationModel::where("id", $req->reservation_id)->first();
                    $res->status = "Donated";
                    $res->save();
                    return redirect()->back()->with('success', 'Thank you for your donation!');
                }
            }
        }
    }

    function getDonor($donor_id)
    {
        $isExist = Donor::select("*")
            ->where("donor_id", $donor_id)
            ->exists();
        if ($isExist) {
            $donors = Donor::find($donor_id);
            return view('nurse.registorAlreadyDonated', compact('data'));
        }
    }
    function notifys()
    {

        $data = Donor::with(['donation' => function ($query) {
            $query->select('donor_id', 'created_at')
                ->where('created_at', '<=', Carbon::now()->subDays(30))
                ->orderBy('created_at', 'desc');
        }])
            ->whereDoesntHave('donation', function ($query) {
                $query->where('created_at', '>', Carbon::now()->subDays(30));
            })
            ->paginate(5); // Specify the number of records per page

        return view('nurse.notify', ['data' => $data]);
    }

    function DaystoNotify(Request $req)
    {
        $date = $req->date;
        $lengthof_date = \Carbon\Carbon::today()->subDays($date);
        //  $var = donationModel::where('created_at', '<=', $lengthof_date)->get();

        $donor = donationModel::join('donors', 'donation.donor_id', '=', 'donors.donor_id')
            ->where('donation.created_at', '<=', $lengthof_date)
            ->select('donors.*', 'donation.created_at', 'donation.packno')
            ->get();
        return view('nurse.notify', ['donors' => $donor]);
    }
    function donorHistory()
    {
        $data = Donor::with('donation')->paginate(5);
        return view('nurse.donorhistory', compact('data'));
    }
    function searchDonorHistory(Request $req)
    {
        $dat = $req->data;
        $data = Donor::where('firstname', $dat)->orWhere('lastname', $dat)->orWhere('phone', $dat)->with('donation')->paginate(5);
        return view('nurse.donorhistory', ['data' => $data]);
    }

    function labResult(Request $request)
    {
        $donor_id = $request->donor_id;
        $data = bloodTest::where('donor_id', $donor_id)->with('bloodStocks')->paginate(3);
        return view('nurse.showResult')->with('data', $data);
    }
    function discarededBlood()
    {
        $data = bloodStock::where('status', 'discard')->with('staff')->paginate(5);
        return view('nurse.discardedBloods', compact('data'));
    }

    function discardDonor(Request $request, $donor_id)
    {
        $data = Donor::where('donor_id', $donor_id)->get();
        return view('nurse.discardDonorInformation')->with('data', $data);
    }

    function discardLabResult(Request $request, $testId)
    {
        $data = bloodTest::where('id', $testId)->get();
        return view('nurse.discardLabResult')->with('data', $data);
    }

    public function emailSend($donor_id)
    {
        $details = [
            'greeting' => 'hi',
            'body' => 'how are you',
            'acttext' => 'Dear customer, the day of donation has arrived',
            'actionurl' => 'goto to our center',
            'lastline' => 'last information',
        ];
        try {

            $msg = User::find($donor_id);

            \Notification::send($msg, new sendNotification($details));

            return redirect()->back()->with('success', 'Message send Successfully!', $msg);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong in nurseController.sendnotification',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function smsSend($donor_id)
    {
        $basic  = new \Vonage\Client\Credentials\Basic("6a348ecf", "QmbAIOePQzRM0kzl");
        $client = new \Vonage\Client($basic);

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("251943253137", 'BRAND_NAME', 'A text message sent using the Nexmo SMS API')
        );

        $message = $response->current();

        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
    }


    public function search_donors(Request $req)
    {

        $bloodtype = $req->bloodtype;


        //$data = enrollementModel::where('bloodtype', $bloodtype)->distinct()->get(['fullname']);
        $data = donationModel::where('bloodtype', $bloodtype)->paginate(5);
        return view('nurse.searchDonor', compact('data', 'bloodtype'));
    }
    public function Donordetail($id)
    {
        $donors = donationModel::find($id);
        return view('nurse.DetailofDonated', ['donors' => $donors]);

        //return view('nurse.searchDonor', compact('data', 'bloodtype'));
    }

    public function sms($donor_id)
    {

        // create a new Vonage API client instance

        $client = new Client(new Basic('6a348ecf', 'QmbAIOePQzRM0kzl'));
        try {
            $donor = Donor::find($donor_id);
            // format the phone number for Vonage API
            $phone = preg_replace('/[^0-9]/', '', $donor->phone);
            $donor = $donor->firstname;
            $phone = '251' . substr($phone, -9);
            // create a new SMS message
            $sms = new SMS($phone, '0949496106', 'Hello thank you for donating blood!');
            // send the SMS message
            $response = $client->sms()->send($sms);
            return redirect()->back()->with('success', 'sms send Successfully!');
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong in nurseController.smsSend',
                'error' => $e->getMessage()
            ], 400);
        }
    }
}
