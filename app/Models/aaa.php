<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aaa extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "aaa";

    protected $fillable = [
        'imgage',
    ];
}
