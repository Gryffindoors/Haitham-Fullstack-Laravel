<?php

namespace App\Http\Controllers;

use App\Models\OrderType;
use Illuminate\Http\Request;

class OrderTypeController extends Controller
{
    public function index()
    {
        $types = OrderType::orderBy('id')->get(['id', 'type', 'type_ar']);

        return response()->json($types);
    }
}
