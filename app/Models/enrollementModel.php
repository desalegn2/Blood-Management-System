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
        'user_id',
        'fullname',
        'packno',
        'occupation',
        'photo',
        'phone',
        'gender',
        'bloodtype',
        'volume',


        'remark',
        'weight',
        'height',

        'bithdate',
        'state',
        'city',
        'zone',
        'woreda',
        'kebelie',
        'housenumber',
        'typeofdonation',
        'email',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
