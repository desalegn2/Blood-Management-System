<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hospitalModel extends Model
{
    use HasFactory;
    public $table = "hospitals";
    protected $primaryKey = 'hospital_id';
    public $incrementing = false;
    protected $fillable = [
        'hospital_id',
        'hospitalname',
        'manager_fname',
        'manager_lname',
        'gender',
        'phone',
    ];

    public function bloodRequests()
    {
        return $this->hasMany(BloodRequest::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'hospital_id');
    }
}
