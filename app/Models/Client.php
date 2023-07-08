<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
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
}
