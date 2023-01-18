<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enrollementModel extends Model
{
    use HasFactory;
    public $table = "enrolldonor";
    protected $fillable = [
        'user_id',
        'fullname',
        'occupation',
        'photo',
        'phone',
        'gender',
        'bloodtype',
        'volume',
        'bloodpressure',
        'hct',
        'remark',
        'weight',
        'height',
        'rh',
        'bithdate',
        'state',
        'city',
        'zone',
        'woreda',
        'kebelie',
        'housenumber',
        'typeofdonation',
        'email',
    ];
}
