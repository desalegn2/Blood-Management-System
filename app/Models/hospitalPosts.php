<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hospitalPosts extends Model
{
    use HasFactory;

    public $table = "hospitalpost";
    protected $fillable = [
        'user_id',
        'patientname',
        'lastname',
        'email',
        'phone',
        'gender',
        'whenneed',
        'amount',
        'bloodtype',
        'age',
        'hospital',
        'state',
        'city',
        'purpose',
        'photo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comment()
    {
        //return $this->hasMany('App\hospitalPosts');
        return $this->hasMany(commentModel::class);
    }
}
