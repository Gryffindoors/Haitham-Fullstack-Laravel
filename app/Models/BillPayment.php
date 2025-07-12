<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Bill;
use App\Models\PaymentMethod;

class BillPayment extends Model
{
    protected $fillable = [
        'payment_method_id',
        'amount',
        'transaction_number',
        'paid_at',
        'created_by',
    ];

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
