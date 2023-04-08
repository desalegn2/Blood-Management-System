<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bloodTest extends Model
{
    use HasFactory;
    public $table = "bloodtest";
    protected $fillable = [
        'tech_id',
        'donor_id',
        'blood_pressure',
        'pulse_rate',
        'homoglobin_level',
        'alt',
        'cholesterol_level',
        'blood_glucose_level',
        'iron_level',
        'ast',
        'hct',
    ];
}
