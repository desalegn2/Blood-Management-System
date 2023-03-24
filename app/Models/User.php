<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'photo',
        'usertype',
        'referral_code',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected function role(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["bbmanager", "donor", "admin", "nurse", "technitian", "healthinstitute", "encoder"][$value],
        );
    }
    //authogenerate referral code for user when they register
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($donor) {
            $donor->referral_code = Str::random(10);
        });
    }

    public function referredUsers()
    {
        return $this->hasMany(referralModel::class, 'referring_id', 'id')->with('user');
    }
    //relationship between user and referral table
    public function referrals()
    {
        return $this->hasMany('App\Models\referralModel', 'referring_id');
    }

    public function referredBy()
    {
        return $this->belongsTo('App\Models\User', 'referred_id');
    }

    public function posts()
    {
        //return $this->hasMany('App\hospitalPosts');
        return $this->hasMany(hospitalPosts::class);
    }
    public function feedbak()
    {
        //return $this->hasMany('App\hospitalPosts');
        return $this->hasMany(feedbackModel::class);
    }
    public function hi()
    {
        //return $this->hasMany('App\hospitalPosts');
        return $this->hasMany(hospitalPosts::class);
    }
}
