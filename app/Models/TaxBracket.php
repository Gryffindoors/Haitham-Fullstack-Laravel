<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaxBracket extends Model
{
    public static function calculateProgressiveTax(float $monthlySalary): float
    {
        $annualSalary = $monthlySalary * 12;
        $tax = 0;

        $brackets = self::orderBy('min_income')->get();

        foreach ($brackets as $bracket) {
            $min = $bracket->min_income;
            $max = $bracket->max_income ?? $annualSalary; // no upper limit for last bracket

            if ($annualSalary > $min) {
                $taxable = min($annualSalary, $max) - $min;
                $tax += $taxable * $bracket->rate;
            } else {
                break;
            }
        }

        return round($tax, 2);
    }
}
