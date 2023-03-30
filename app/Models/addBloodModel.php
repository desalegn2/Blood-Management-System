<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class addBloodModel extends Model
{
  use HasFactory, Notifiable;
  public $table = "bloodstock";
  protected $fillable = [
    'tech_id',
    'donor_id',
    'packno',
    'bloodgroup',
    'volume',
    'rh',
    'status',
  ];
}
