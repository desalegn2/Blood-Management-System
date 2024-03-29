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
        'email',
        'password',
        'role',
        'isBlocked',
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
            get: fn ($value) =>  ["bbmanager", "admin", "donor", "nurse", "technitian", "healthinstitute", "doctor"][$value],
        );
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
