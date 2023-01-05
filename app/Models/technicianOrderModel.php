<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class technicianOrderModel extends Model
{
    use HasFactory;
    public $table = "technician_order";
    protected $fillable = [
        'hospitalname',
        'date',
        'bloodgroup',
        'volume',

    ];
}
