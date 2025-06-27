<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Salary;
use App\Models\SalaryDeduction;
use App\Models\Attendance;
use App\Models\User;

class Staff extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'national_id',
        'address',
        'department_id',
        'timetable_id',
        'employment_date',
        'termination_date',
        'image_url',
        'note',
        'created_by',
        'updated_by'
    ];

    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }

    public function salaryDeductions()
    {
        return $this->hasMany(SalaryDeduction::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function getFullNameAttribute()
    {
        return trim("{$this->first_name} {$this->last_name}");
    }

    public function getImageUrlAttribute($value)
    {
        return $value ? asset($value) : null;
    }
}
