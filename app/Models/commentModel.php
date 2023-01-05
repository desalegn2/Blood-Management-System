<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commentModel extends Model
{
    use HasFactory;
    public $table = "comment";
    protected $fillable = [
        'post_id',
        'user_id',
        'commentorname',
        'comment',
        'email',
    ];

    public function post()
    {
        return $this->belongsTo(hospitalPosts::class);
    }
}
