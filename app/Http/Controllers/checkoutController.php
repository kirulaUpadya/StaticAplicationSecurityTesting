<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Payment;
use App\Models\Order;
use App\Models\Shipping_Address;
use Illuminate\Support\Facades\DB;

use Darryldecode\Cart\Facades\CartFacade as Cart;


class checkoutController extends Controller
{
    public function checkoutPage()
    {
        $total = Cart::instance('cart')->total();
        return view('Registered.checkout', compact('total'));
    }

    function checkout(){
        $user = auth()->user();
        // $total = session('stripe_total'); // retrieve total from session

        return view("Registered.placeOrder", compact('user'));
    }

    public function placeOrderPost(Request $req)
    {
        $user = auth()->user();  // Get the authenticated user

        // Begin a database transaction to ensure atomicity
        DB::beginTransaction();

        try {
            // Create the Order first, it will automatically generate the order_id (auto-increment)
            $order = Order::create([
                'user_id' => $user->user_id,
                'status' => "pending",
                'order_date' => now(),
                'total_amount' => $req->amount,
            ]);

            // Now that we have the order_id, create the Shipping Address
            $shipping_address = Shipping_Address::create([
                'user_id' => $user->user_id,
                'order_id' => $order->order_id,  // Assign the auto-generated order_id
                'address_line1' => $req->addressline1,
                'address_line2' => $req->addressline2,
                'city' => $req->city,
                'postal_code' => $req->postalCode,
                'country' => $req->country,
            ]);

            // Create the Payment record
            $payment = Payment::create([
                'order_id' => $order->order_id,
                'payment_method' => "Stripe", // Example
                'payment_date' => now(),
                'amount' => $req->amount,
            ]);

            // Commit the transaction
            DB::commit();

            Cart::instance('cart')->destroy();

            // Redirect or return success
            return redirect()->route('home')->with('success', 'Order Placed Successfully');
        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollBack();

            // Handle the error and return an appropriate response
            return redirect()->route('customer.placeorder')->with('error', 'Order Failed: ' . $e->getMessage());
        }
    }

}
