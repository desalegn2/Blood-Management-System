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

    /*The referringDonor() and referredDonor() functions define the relationships 
    between the referralModel and Donor models. They specify that the referralModel 
    model belongs to a Donor model, and that the foreign key for the relationship is 
    the referring_id or referred_id field in the referralModel table, respectively.*/

    public function referringDonor()
    {
        return $this->belongsTo(Donor::class, 'referring_id');
    }

    public function referredDonor()
    {
        return $this->belongsTo(Donor::class, 'referred_id');
    }
}
