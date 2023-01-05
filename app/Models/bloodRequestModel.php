<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bloodRequestModel extends Model
{
    use HasFactory;
    public $table = "bloodrequest";

    protected $fillable = [
        'name',
        'lastname',
        'email',
        'phone',
        'gender',
        'whenneed',
        'amount',
        'bloodtype',
        'age',
        'hospital',
        'state',
        'city',
        'purpose',
        'photo',
    ];
}
