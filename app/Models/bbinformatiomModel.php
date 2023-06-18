<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bbinformatiomModel extends Model
{
    use HasFactory;
    public $table = "bloodbankinfo";
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'image',
        'type',
    ];
}
