<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class addBloodModel extends Model
{
  use HasFactory, Notifiable;
  public $table = "storeblood";
  protected $fillable = [
    'user_id',
    'fullname',
    'email',
    'phone',
    'state',
    'city',
    'kebelie',
    'bloodgroup',
    'volume',
    'donationtype',
    'status',
    'rh',
    'hct',
    'bloodpressure',
  ];
}
