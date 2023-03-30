<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;
    protected $primaryKey = 'donor_id';
    public $incrementing = false;
    protected $fillable = [
        'donor_id',
        'referral_code',
        'firstname',
        'lastname',
        'age',
        'occupation',
        'photo',
        'phone',
        'gender',
        'weight',
        'height',
        'bloodtype',
        'typeofdonation',
        'country',
        'state',
        'city',
        'zone',
        'woreda',
        'kebelie',
        'housenumber',
    ];

    //authogenerate referral code for user when they register
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($donor) {
            $donor->referral_code = Str::random(10);
        });
    }

    //relationship between donor and referral table
    
    /*The referrals() function defines a one-to-many relationship between the Donor 
    and referralModel models. It specifies that the Donor model has many referral 
    models, and that the foreign key for the relationship is the referring_id field 
    in the referralModel table.
    */
    public function referrals()
    {
        return $this->hasMany(referralModel::class, 'referring_id');
    }
}
