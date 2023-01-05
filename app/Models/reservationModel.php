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
        'name',
        'lastname',
        'email',
        'phone',
        'gender',
        'reservationdate',
        'center',
    ];
}
