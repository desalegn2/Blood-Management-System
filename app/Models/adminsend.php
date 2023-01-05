<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adminsend extends Model
{
    use HasFactory;
    public $table = "adminsendtotech";
    protected $fillable = [
        'hospitalname',
        'date',
        'phone',
        'email',
        'bloodgroup',
        'volume',
        'reason',
    ];
}
