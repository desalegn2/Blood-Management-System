<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nurseprofile extends Model
{
    use HasFactory;
    public $table = "nurseprofile";
    protected $fillable = [
        'user_id',
        'nursename',
        'nurselname',
        'nursephoto',
        'email',
        'phone',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function hiprofile()
    {
        return $this->belongsTo(HIprofile::class);
    }
}
