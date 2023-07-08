<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $casts = [
        'email_verified_at' => 'datetime',
        'name'=>'array',
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function getDpAttribute($value)
    {
        return !empty($value) ? $value : 'driver.png';
    }
}
