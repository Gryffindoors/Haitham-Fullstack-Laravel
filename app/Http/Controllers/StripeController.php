<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\BillPayment;
use Carbon\Carbon;

class StripeController extends Controller
{
    public function createSession(Request $request)
    {
        $request->validate([
            'bill_id' => 'required',
            'success_url' => 'required|url',
            'cancel_url' => 'required|url',
        ]);

        // Set your Stripe secret key
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        try {
            $session = Session::create([
                'payment_method_types' => ['card'],
                'mode' => 'payment',
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'egp',
                        'product_data' => [
                            'name' => 'Bill #' . $request->bill_id,
                        ],
                        'unit_amount' => 10000, // 100.00 EGP = 10000 piasters
                    ],
                    'quantity' => 1,
                ]],
                'metadata' => [
                    'bill_id' => $request->bill_id,
                ],
                'success_url' => $request->success_url,
                'cancel_url' => $request->cancel_url,
            ]);

            return response()->json(['url' => $session->url], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create session'], 500);
        }
    }

    public function verifySession(Request $request)
    {
        $request->validate([
            'session_id' => 'required',
        ]);

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $session = \Stripe\Checkout\Session::retrieve($request->session_id);

            if ($session->payment_status === 'paid') {
                $billId = $session->metadata['bill_id'] ?? null;

                if ($billId) {
                    BillPayment::create([
                        'bill_id' => $billId,
                        'payment_method_id' => 1, // assuming 1 = "card"
                        'amount' => $session->amount_total / 100, // convert back from piasters
                        'transaction_number' => $session->id,
                        'paid_at' => Carbon::now(),
                        'created_by' => auth()->id() ?? null,
                    ]);
                }

                return response()->json(['success' => true, 'status' => 'paid']);
            } else {
                return response()->json(['success' => false, 'status' => $session->payment_status]);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to verify session'], 500);
        }
    }
}
