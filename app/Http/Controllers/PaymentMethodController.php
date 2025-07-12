<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PaymentMethod;
class PaymentMethodController extends Controller
{

    public function index()
    {
        return PaymentMethod::select('id', 'name', 'name_ar')->get();
    }
}
