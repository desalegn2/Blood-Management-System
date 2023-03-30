<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donorHealthModel extends Model
{
    use HasFactory;
    public $table = "donorhealth";
    protected $fillable = [
        'tech_id',
        'donor_id',
        'blood_pressure',
        'pulse_rate',
        'homoglobin_level',
        'blood_temprature',
        'cholesterol_level',
        'blood_glucose_level',
        'iron_level',
        'blood_viscosity',
        'hct',
        'Weight',
    ];
}
