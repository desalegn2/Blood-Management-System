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
}
