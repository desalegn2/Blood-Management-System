<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addBloodModel extends Model
{
  use HasFactory;
  public $table = "storeblood";
  protected $fillable = [
    'user_id',
    'bloodgroup',
    'volume',
    'donationtype',
    'status',
  ];
}
