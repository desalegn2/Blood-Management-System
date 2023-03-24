<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class enrollementModel extends Model
{
    use HasFactory, Notifiable;
    public $table = "enrolldonor";
    protected $fillable = [
        'nurse_id',
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

        'packno',
        'bloodtype',
        'volume',
        'remark',

        'country',
        'state',
        'city',
        'zone',
        'woreda',
        'kebelie',
        'housenumber',
        'typeofdonation',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
