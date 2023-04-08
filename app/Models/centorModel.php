<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class centorModel extends Model
{
    use HasFactory;
    public $table = "donationcentor";
    protected $fillable = [
        'centor_name',
        'address',
        'maximum_donation',
    ];

}
