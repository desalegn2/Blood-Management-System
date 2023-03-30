<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\addBloodModel;
use App\Models\discardBloodModel;
use App\Models\hospitalRequestModel;
use App\Models\distributeBloodModel;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\enrollementModel;
use App\Models\donorHealthModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class techController extends Controller
{
    function testBlood()
    {
        $data = enrollementModel::where('status', '=', 'in progress')->get();
        return view('technitian.testBlood', ['data' => $data]);
    }

    function testBloodDetail($id)
    {
        $data = enrollementModel::find($id);
        return view('technitian.testbloodDetail', ['data' => $data]);
    }

    function storeDiscard(Request $req)
    {
        $data = $req->validate([
            'tech_id' => 'required|numeric',
            'donor_id' => 'required|integer',
            'bloodgroup' => 'required|string',
            'volume' => 'required|string',
            'packno' => ['required', 'unique:bloodstock'],
            'rh' => 'required|string',
            'reason' => 'required|string',
        ]);
        discardBloodModel::create($data);
        if ($data) {
            $health = $req->validate([
                'tech_id' => 'required|numeric',
                'donor_id' => 'required|integer',
                'blood_pressure' => 'required|string',
                'pulse_rate' => 'required|string',
                'homoglobin_level' => ['required', 'unique:bloodstock'],
                'blood_temprature' => 'required|string',
                'cholesterol_level' => 'required|string',
                'iron_level' => 'required|string',
                'blood_glucose_level' => 'required|string',
                'blood_viscosity' => ['required', 'unique:bloodstock'],
                'hct' => 'required|string',
                'Weight' => 'required|string',
            ]);
            donorHealthModel::create($health);
        }
        if ($health) {
            enrollementModel::where("id", $req->donor_id)
                ->update(["status" => 'discard', "bloodtype" => $req->bloodtype]);
            return response()->json(['success' => true]);
        }
    }

    function approved($id)
    {
        $data = enrollementModel::find($id);

        $data->status = "approve";
        $data->save();
        return redirect()->back();
    }

    function storeStock(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status' => ['required', Rule::in(['accept', 'discard'])],
            'diseases' =>['required'],

            'bloodgroup' => 'required|string|max:5',
            'volume' => 'required|string|max:255',
            'rh' => 'required|string|max:25',
            'blood_pressure' => 'required|string|max:255',
            'pulse_rate' => 'required|string|max:255',
            'homoglobin_level' => 'required|string|max:255',
            'blood_temprature' => 'required|string|max:255',
            'cholesterol_level' => 'required|string|max:255',
            'blood_glucose_level' => 'required|string|max:255',
            'iron_level' => 'required|string|max:255',
            'blood_viscosity' => 'required|string|max:255',
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

        $var = new addBloodModel;
        $var->tech_id = $request->user_id;
        $var->donor_id = $request->donor_id;
        $var->bloodgroup = $request->bloodgroup;
        $var->volume = $request->volume;
        $var->packno = $request->packno;
        $var->rh = $request->rh;
        $var->status = $request->status;
        $var->save();
        if ($var) {
            $health = new donorHealthModel;
            $health->tech_id = $request->user_id;
            $health->donor_id = $request->donor_id;
            $health->infectious_disease = $request->diseases;
            $health->blood_pressure = $request->blood_pressure;
            $health->pulse_rate = $request->pulse_rate;
            $health->homoglobin_level = $request->homoglobin_level;
            $health->blood_temprature = $request->blood_temprature;
            $health->cholesterol_level = $request->cholesterol_level;
            $health->blood_glucose_level = $request->blood_glucose_level;
            $health->iron_level = $request->iron_level;
            $health->blood_viscosity = $request->blood_viscosity;
            $health->hct = $request->hct;
            $health->save();
        }
        if ($health) {
            enrollementModel::where("id", $request->donor_id)
                ->update(["status" => 'recorded', "bloodtype" => $request->bloodgroup]);
            return redirect()->back()->with('success', 'Task Added Successfully!');
        }
    }

    function view()
    {
        $blood = addBloodModel::all()->where('status', '=', 'accept');
        return view('technitian.viewStoredBlood', ['blood' => $blood]);
    }

    function setExpaired()
    {
        $dist = addBloodModel::all()->where('status', '=', 'notexpired');
        return view('technitian.viewStoredBlood', ['dist' => $dist]);
    }

    function filldiscard(Request $req, $id)
    {
        $var = new discardBloodModel;
        $var->tech_id = $req->user_id;
        $var->donor_id = $req->donor_id;
        $var->reason = $req->reason;
        $var->save();
        if ($var) {
            $data = addBloodModel::find($id);
            $data->delete();
            return redirect()->back()->with('success', 'Task Added Successfully!');
        }
    }
    function read($id)
    {
        $res = hospitalRequestModel::find($id);
        $res->readat = "read";
        $res->save();
        return redirect()->back();
    }
    function ExpiredBlood()
    {
        $date = \Carbon\Carbon::today()->subDays(1);
        $blood = addBloodModel::where('created_at', '<=', $date)->get();
        return view('technitian.expired', compact('blood'));
    }

    function viewblood()
    {

        $bloods = addBloodModel::paginate(10);
        $numberof_message = hospitalRequestModel::where('readat', 'unread')->count();

        $date = \Carbon\Carbon::today()->subDays(1);
        $notification = addBloodModel::where('created_at', '<=', $date)->count();
        $aplus = addBloodModel::where('bloodgroup', 'A+')->sum('volume');
        $aminus = addBloodModel::where('bloodgroup', 'A-')->sum('volume');
        $oplus = addBloodModel::where('bloodgroup', 'O+')->sum('volume');
        $ominus = addBloodModel::where('bloodgroup', 'O-')->sum('volume');
        $bplus = addBloodModel::where('bloodgroup', 'B+')->sum('volume');
        $bminus = addBloodModel::where('bloodgroup', 'B-')->sum('volume');
        $abplus = addBloodModel::where('bloodgroup', 'AB+')->sum('volume');
        $abminus = addBloodModel::where('bloodgroup', 'AB-')->sum('volume');
        return view('technitian.technitanHome', compact('bloods', 'numberof_message', 'notification', 'aplus', 'aminus', 'oplus', 'ominus', 'bplus', 'bminus', 'abplus', 'abminus',));
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
