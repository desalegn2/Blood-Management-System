<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class discardBloodModel extends Model
{
    use HasFactory;
    public $table = "discardbloods";
    protected $fillable = [
        'user_id',
        'bloodGroup',
        'unitdiscarded',
        'reason',
    ];
}
