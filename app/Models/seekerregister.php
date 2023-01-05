<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\skregisterController;

class seekerregister extends Model
{
    use HasFactory;
   
        public $table ="seekerregister";

        protected $fillable=[
            'fname',
            'lname',
            'email',
            'password',
            'phone',
        ];
}
