<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\donorview;
use App\Models\hospitalPosts;
use App\Models\User;
use App\Models\commentModel;

class donorViewseeker extends Controller
{
    function viewS()
    {
        $views = donorview::all();
        return view('donor.viewSeekers', ['views' => $views]);
    }

    function search(Request $request)
    {
        $get_name = $request->search;
        $views = donorview::where('bloodtype', 'LIKE', '%' . $get_name . '%')->get();
        return view('donor.viewSeekers', ['views' => $views]);
    }
    function viewdetail($id)
    {
        $seekers = donorview::find($id);
        return view('donor.donorViewDetail', ['seekers' => $seekers]);
    }
}
