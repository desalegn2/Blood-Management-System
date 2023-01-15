<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedbackModel extends Model
{
    use HasFactory;
    public $table = "feedbacks";
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'address',
        'feedback',

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
