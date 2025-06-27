<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Staff;

class Salary extends Model
{
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function getTotalDeductionsAttribute()
    {
        return $this->staff->salaryDeductions()
            ->whereMonth('deduction_date', '=', $this->created_at->format('m'))
            ->sum('amount');
    }
}
