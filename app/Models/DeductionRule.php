<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\SalaryDeduction;

class DeductionRule extends Model
{
    public function salaryDeductions()
    {
        return $this->hasMany(SalaryDeduction::class);
    }
}

