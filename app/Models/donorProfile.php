<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donorProfile extends Model
{
    use HasFactory;
    public $table = "donorprofile";
    protected $fillable = [
        'user_id',
        'donorname',
        'donorlastname',
        'donorphoto',
        'email',
        'phone',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
