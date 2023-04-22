<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodRequestItem extends Model
{
    use HasFactory;
    public $table = "blood_request_items";
    protected $fillable = [
        'request_id',
        'blood_type',
        'quantity',
    ];
}
