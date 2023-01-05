<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HIprofile extends Model
{
    use HasFactory;
    public $table = "hiprofile";
    protected $fillable = [
        'user_id',
        'Hospitalname',
        'firstname',
        'lastname',
        'email',
        'photo',
        'phone',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function donor()
    {
        //return $this->hasMany('App\hospitalPosts');
        return $this->hasMany(donorRequest::class);
    }
    public function nurse()
    {
        //return $this->hasMany('App\hospitalPosts');
        return $this->hasMany(nurseprofile::class);
    }
}
