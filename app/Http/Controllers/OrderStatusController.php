<?php

namespace App\Http\Controllers;

use App\Models\OrderStatus;

class OrderStatusController extends Controller
{
    public function index()
    {
        return response()->json(
            OrderStatus::orderBy('id')->get(['id', 'status', 'status_ar'])
        );
    }
}

