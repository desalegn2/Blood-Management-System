<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class bloodStock extends Model
{
    use HasFactory;
    public $table = "bloodstock";
    protected $fillable = [
        'tech_id',
        'donor_id',
        'test_id',
        'packno',
        'bloodgroup',
        'volume',
        'rh',
        'status',
        'expitariondate',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($bloodstock) {
            $expiryDate = Carbon::parse($bloodstock->created_at)->addDays(20);
            $bloodstock->expitariondate = $expiryDate;
        });
    }

    public function bloodTests()
    {
        return $this->hasMany(bloodTest::class, 'id');
    }
    public function staff()
    {
        return $this->belongsTo(staffModel::class, 'tech_id', 'staff_id');
    }
}
