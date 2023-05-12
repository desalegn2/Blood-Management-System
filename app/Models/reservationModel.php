<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservationModel extends Model
{
    use HasFactory;
    
    public $table = "reservation";
    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'age',
        'occupation',
        'photo',
        'email',
        'phone',
        'gender',
        'weight',
        'height',
        'center',
        'bloodtype',
        'reservationdate',
        'country',
        'state',
        'city',
        'zone',
        'woreda',
        'kebelie',
        'housenumber',
    ];

    public function donors()
    {
        return $this->belongsTo(Donor::class, 'donor_id');
    }
}
