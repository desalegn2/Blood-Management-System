<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class referralModel extends Model
{
    use HasFactory;

    public $table = "referrals";
    protected $fillable = [
        'referring_id',
        'referred_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'referred_id', 'id');
    }

    public function referringUser()
    {
        return $this->belongsTo('App\Models\User', 'referring_id');
    }

    public function referredUser()
    {
        return $this->belongsTo('App\Models\User', 'referred_id');
    }
}
