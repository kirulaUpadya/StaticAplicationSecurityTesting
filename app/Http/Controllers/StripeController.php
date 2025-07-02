<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Stripe\StripeClient;

class StripeController extends Controller
{
    public function stripe(Request $request)
    {
        $total = $request->total;
        $totalNumeric = (float) str_replace(',', '', $total); // 15125.00
        $amountInCents = (int) round($totalNumeric * 100); // 1512500


        $stripe = new StripeClient(config('stripe.stripe_sk'));

        $response = $stripe->checkout->sessions->create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'lkr',
                        'product_data' => [
                            'name' => 'Cart Total',
                        ],
                        'unit_amount' => $amountInCents,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('cancel'),
        ]);

        if (isset($response->id) && $response->id != '') {
            return redirect($response->url);
        } else {
            return redirect()->route('cancel');
        }
    }
        public function success(Request $request){
            if(isset($request->session_id)){

                $stripe = new \Stripe\StripeClient(config('stripe.stripe_sk'));
                $response = $stripe->checkout->sessions->retrieve($request->session_id);
                // store total in session
                 session(['stripe_total' => $response->amount_total / 100]);

                return redirect(route('customer.placeorder'))->with('success', 'Payment is Successful');

            }else{
                return redirect()->route('cancel');
            }
        }

        public function cancel(Request $request){
            return "Payment is Unsuccessful";
        }
    }
