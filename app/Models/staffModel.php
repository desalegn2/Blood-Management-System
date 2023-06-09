<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staffModel extends Model
{
    use HasFactory;
    public $table = "staffs";
    protected $primaryKey = 'staff_id';
    public $incrementing = false;
    protected $fillable = [
        'staff_id',
        'firstname',
        'lastname',
        'gender',
        'phone',
        'photo',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }
    public function bloodstock()
    {
        return $this->hasOne(bloodStock::class, 'tech_id', 'staff_id');
    }
}
