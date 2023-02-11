<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class distributeBloodModel extends Model
{
    use HasFactory;
    public $table = "distribute";
    protected $fillable = [
        'user_id',
        'bloodgroup',
        'volume',
        'issueddate',
        'expirydate',
        'recievedby',

        'donateby',
        'rh',
        'hct',
        'bloodpressure',
        'packno',
        'donoremail',
        'donorphone'

    ];
}
