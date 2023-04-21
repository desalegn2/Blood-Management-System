<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class distributeBloodModel extends Model
{
    use HasFactory;
    public $table = "distribute";
    protected $fillable = [
        'hospital_id',
        'stock_id',
    ];

    public function stock()
    {
        return $this->belongsTo(bloodStock::class, 'stock_id');
    }

    public function hospital()
    {
        return $this->belongsTo(hospitalModel::class, 'hospital_id');
    }
}
