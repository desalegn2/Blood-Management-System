<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dnRegisterModel extends Model
{
    use HasFactory;
    public $table ="dnregister";

    protected $fillable=[
        'fname',
        'lname',
        'email',
        'password',
        'phone',
    ];
}
