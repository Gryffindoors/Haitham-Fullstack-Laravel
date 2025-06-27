<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Staff;
use App\Models\TaxBracket;
use App\Models\DeductionRule;

class SalaryDeduction extends Model
{
    protected $fillable = [
        'staff_id',
        'deduction_date',
        'amount',
        'reason',
        'note',
        'created_by',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function rule()
    {
        return $this->belongsTo(DeductionRule::class, 'rule_id');
    }

    public static function createIncomeTaxForStaff(Staff $staff, string $month, ?int $createdById = null): ?self
    {
        $salary = $staff->salaries()
            ->whereMonth('created_at', '=', $month)
            ->latest()
            ->first();

        if (!$salary) return null;

        $tax = TaxBracket::calculateProgressiveTax($salary->base_salary);

        return self::create([
            'staff_id'     => $staff->id,
            'deduction_date' => now()->startOfMonth()->toDateString(),
            'amount'       => $tax,
            'reason'       => 'income tax',
            'note'         => "Automatically calculated from base salary: {$salary->base_salary}",
            'created_by'   => $createdById,
        ]);
    }
}
