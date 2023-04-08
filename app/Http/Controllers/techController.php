<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\donationModel;
use App\Models\bloodTest;
use App\Models\bloodStock;
use App\Models\Donor;

class techController extends Controller
{
    function testBlood()
    {
        $data = donationModel::where('status', '=', 'in progress')->get();
        return view('technitian.testBlood', ['data' => $data]);
    }

    function testBloodDetail($id)
    {
        $data = donationModel::find($id);
        return view('technitian.testbloodDetail', ['data' => $data]);
    }

    function storeStock(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status' => ['required', Rule::in(['accept', 'discard'])],
            'diseases' => ['required'],

            'bloodgroup' => 'required|string|max:5',
            'volume' => 'required|string|max:255',
            'rh' => 'required|string|max:25',
            'blood_pressure' => 'required|string|max:255',
            'pulse_rate' => 'required|string|max:255',
            'homoglobin_level' => 'required|string|max:255',
            'alt' => 'required|string|max:255',
            'cholesterol_level' => 'required|string|max:255',
            'blood_glucose_level' => 'required|string|max:255',
            'iron_level' => 'required|string|max:255',
            'ast' => 'required|string|max:255',
            'hct' => 'required|string|max:255',
        ]);

        $validator->after(function ($validator) use ($request) {
            $status = $request->input('status');
            $diseases = $request->input('diseases');
            if ($status === 'discard' && $diseases === 'none') {
                $validator->errors()->add('diseases', 'The diseases field is required when status is discard.');
            } elseif ($status === 'accept' && $diseases !== 'none') {
                $validator->errors()->add('diseases', 'The diseases field must be "none" when status is accept.');
            }
        });

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $health = new bloodTest;
        $health->tech_id = $request->user_id;
        $health->donor_id = $request->donor_id;
        $health->infectious_disease = $request->diseases;
        $health->blood_pressure = $request->blood_pressure;
        $health->pulse_rate = $request->pulse_rate;
        $health->homoglobin_level = $request->homoglobin_level;
        $health->alt_level = $request->alt;
        $health->cholesterol_level = $request->cholesterol_level;
        $health->blood_glucose_level = $request->blood_glucose_level;
        $health->iron_level = $request->iron_level;
        $health->ast_level = $request->ast;
        $health->hct = $request->hct;
        $health->save();

        if ($health) {
            $var = new bloodStock;
            $var->tech_id = $request->user_id;
            $var->donor_id = $request->donor_id;
            $var->test_id = $health->id;
            $var->bloodgroup = $request->bloodgroup;
            $var->volume = $request->volume;
            $var->packno = $request->packno;
            $var->rh = $request->rh;
            $var->status = $request->status;

            $var->save();
        }
        if ($health) {
            donationModel::where("donor_id", $request->donor_id)
                ->update(["status" => $request->status]);
            Donor::where("donor_id", $request->donor_id)
                ->update(["bloodtype" => $request->bloodgroup]);
            return redirect()->back()->with('success', 'Task Added Successfully!');
        }
    }

    function view()
    {
        $blood = bloodStock::all()->where('status', '=', 'accept');
        return view('technitian.viewStoredBlood', ['blood' => $blood]);
    }

    function expired($id)
    {
        bloodStock::where("id", $id)
            ->update(["status" => "expired"]);
            return redirect()->back()->with('success', 'Blood is set as Expired!');
    }
    function ExpiredBlood()
    {
        $date = \Carbon\Carbon::today()->subDays(1);
        $blood = bloodStock::where('created_at', '<=', $date)->get();
        return view('technitian.expired', compact('blood'));
    }


    function viewblood()
    {
        $bloods = bloodStock::paginate(10);

        $date = \Carbon\Carbon::today()->subDays(1);
        $notification = bloodStock::where('created_at', '<=', $date)->where('status', '=', 'accept')->count();
     //   $notification = bloodStock::where('created_at', '<=', $date && 'status' ,'=','accept')->count();
    
        $aplus = bloodStock::where('bloodgroup', 'A+')->sum('volume');
        $aminus = bloodStock::where('bloodgroup', 'A-')->sum('volume');
        $oplus = bloodStock::where('bloodgroup', 'O+')->sum('volume');
        $ominus = bloodStock::where('bloodgroup', 'O-')->sum('volume');
        $bplus = bloodStock::where('bloodgroup', 'B+')->sum('volume');
        $bminus = bloodStock::where('bloodgroup', 'B-')->sum('volume');
        $abplus = bloodStock::where('bloodgroup', 'AB+')->sum('volume');
        $abminus = bloodStock::where('bloodgroup', 'AB-')->sum('volume');
        return view('technitian.technitanHome', compact('bloods', 'notification', 'aplus', 'aminus', 'oplus', 'ominus', 'bplus', 'bminus', 'abplus', 'abminus',));
    }
    function handling()
    {
        //$dist = addBloodModel::all()->where('status', '=', 'notexpired');
        return view('technitian.handling');
    }


    function Profile($id)
    {
        $isExist = User::select("*")
            ->where("id", $id)
            ->exists();
        if ($isExist) {
            $data = User::all()->where('id', '=', $id);
            return view('technitian.profile', ['data' => $data]);
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
