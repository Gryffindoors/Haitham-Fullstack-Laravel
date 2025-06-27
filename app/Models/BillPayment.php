<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Bill;
use App\Models\PaymentMethod;

class BillPayment extends Model
{
    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
    
}
