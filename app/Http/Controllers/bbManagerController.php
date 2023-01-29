<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\enrollementModel;
use App\Models\hospitalRequestModel;
use PDF;

class bbManagerController extends Controller
{
    function view()
    {
        $don = enrollementModel::all();
        return view('bloodBankManager.generatePdf', ['don' => $don]);
    }

    function Reports()
    {
        $don = enrollementModel::all();
        $pdf = PDF::setOptions([
            'defaultFont' => 'sans-serif',
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            'chroot' => public_path('uploads/registers'),
        ])->loadView('bloodBankManager.pdf.generate', compact('don'));
        return $pdf->download('demo.pdf');
    }
    function requests()
    {
        $request = hospitalRequestModel::all()->where('readat', '=', 'unread');
        return view('bloodBankManager.request', ['req' => $request]);
    }
}
