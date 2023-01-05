<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class advertises extends Model
{
    use HasFactory;
    public $table = "advertise";

    protected $fillable = [
        'title',
        'description',
        'image',

    ];
}
