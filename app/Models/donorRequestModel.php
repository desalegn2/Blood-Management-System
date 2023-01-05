<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donorRequestModel extends Model
{
    use HasFactory;
    public $table = "donorrequests";

    protected $fillable = [
        'user_id',
        'name',
        'lastname',
        'phone',
        'gender',
        'bloodtype',
        'weight',
        'healthstatus',
        'bithdate',
        'state',
        'city',
        'email',
        'photo',
    ];
}
