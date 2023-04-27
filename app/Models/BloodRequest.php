<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodRequest extends Model
{
    use HasFactory;
    public $table = "blood_request";
    protected $fillable = [
        'hospital_id',
        'status',
        'approved_by',
        'accepted',
    ];

    public function hospital()
{
    return $this->belongsTo(hospitalModel::class,'hospital_id');
}

public function bloodRequestItems()
{
    return $this->hasMany(BloodRequestItem::class,'request_id');
}

}
