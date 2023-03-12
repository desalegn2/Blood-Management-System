<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservationModel extends Model
{
    use HasFactory;

    public $table = "reservation";

    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'age',
        'occupation',
        'photo',
        'email',
        'phone',
        'gender',
        'weight',
        'height',

        'bloodtype',
        'country',
        'state',
        'city',
        'zone',
        'woreda',
        'kebelie',
        'housenumber',
    ];
}
