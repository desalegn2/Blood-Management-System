<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seekerModel extends Model
{
    use HasFactory;
    public $table = "seeker";
    protected $fillable = [
        'hospital_id',
        'photo',
        'firstname',
        'lastname',
        'age',
        'phone',
        'email',
        'gender',
        'bloodtype',
        'when_nedded',
        'reason',
    ];
}
