<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hospitalRequestModel extends Model
{
    use HasFactory;
    public $table = "hospitalrequests";
    protected $fillable = [
        'user_id',
        'hospitalname',
        'date',
        'phone',
        'email',
        'bloodgroup',
        'volume',
        'reason',
        'readat',
        'status',
    ];
}
