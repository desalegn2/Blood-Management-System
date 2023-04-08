<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staffModel extends Model
{
    use HasFactory;
    public $table = "staffs";
    protected $fillable = [
        'staff_id',
        'firstname',
        'lastname',
        'gender',
        'phone',
        'photo',
    ];
}
