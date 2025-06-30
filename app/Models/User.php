<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'password',
        'role_id',
        'staff_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    // 🔁 Relations
    public function role()
    {
        return $this->belongsTo(UserRole::class, 'role_id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
