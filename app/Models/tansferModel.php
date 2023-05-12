<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tansferModel extends Model
{
    use HasFactory;
    public $table = "transfusion";
    protected $fillable = [
        'doctor_id',
        'donor_id',
        'patientid_number',
        'patient_fname',
        'patient_lname',
        'gender',
        'phone',
        'photo'
    ];
}
