<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\BillPayment;
use App\Models\Order;
use App\Models\Customer;

class Bill extends Model
{
    //connections
    public function billPayments()
    {
        return $this->hasMany(BillPayment::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'bill_orders');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }


    //calculations
    public function getTotalWithChargesAttribute()
    {
        return $this->total_cost + $this->tax + $this->service_charge;
    }

    public function getPaidAmountAttribute()
    {
        return $this->billPayments->sum('amount');
    }

    public function getRemainingAmountAttribute()
    {
        return $this->total_with_charges + $this->tips - $this->paid_amount;
    }


    protected $fillable = [
        'total_cost',
        'tax',
        'service_charge',
        'tips',
    ];

    public function getStatusAttribute()
    {
        return $this->paid_amount >= $this->total_with_charges
            ? 'paid'
            : 'unpaid';
    }
    public function getTipDistributionAttribute(): array
    {
        $waiterShare = $this->tips * 0.5;
        $supportShare = $this->tips * 0.5;

        return [
            'waiter' => round($waiterShare, 2),
            'support_staff' => round($supportShare, 2),
        ];
    }
}
