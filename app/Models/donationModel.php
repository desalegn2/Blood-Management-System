<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donationModel extends Model
{
    use HasFactory;
    public $table = "donation";
    protected $fillable = [
        'nurse_id',
        'donor_id',
        'packno',
        'volume',
        'weight',
        'remark',
    ];

    public function donor()
    {
        return $this->belongsTo(Donor::class, 'donor_id');
    }
}
