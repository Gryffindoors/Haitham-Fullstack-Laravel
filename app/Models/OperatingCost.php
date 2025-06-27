<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Staff;

class OperatingCost extends Model
{
    protected $fillable = [
        'category',
        'amount',
        'cost_month',
        'note',
        'created_by',
    ];

    public function creator()
    {
        return $this->belongsTo(Staff::class, 'created_by');
    }

    public function getMonthYearAttribute()
    {
        return \Carbon\Carbon::parse($this->cost_month)->format('F Y');
    }
}
