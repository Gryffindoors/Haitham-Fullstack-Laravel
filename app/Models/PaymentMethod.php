<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Bill;
use App\Models\BillPayment;

class PaymentMethod extends Model
{
    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

    public function payments()
    {
        return $this->hasMany(BillPayment::class);
    }
}

