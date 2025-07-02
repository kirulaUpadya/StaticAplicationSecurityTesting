@extends('layouts.regapp')
@section('content')

<section class="section">
    <div class="checkout_container">
        @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
 @endif
      <label><a href="#" class="myacc_home">Shop</a> / <a href="#" class="myacc_home">Cart</a> / Place Order</label>
      <h2 class="checkout_form_title">Billing Details</h2>
      <div class="checkout_form_container">
        <div class="billing_details_form_with_checkout_details">
          <div class="billing_details_form">
            <form action="{{route('place.order.post')}}" method="POST" class="bd_form">
                @csrf
                <label class="lbl_billing_details_form">
                    Amount (LKR)
                  </label>
                  <input type="number" name="amount" class="billing_details_input" value ="{{session('stripe_total')}}"required readonly/>
                  <label class="lbl_billing_details_form">
                    Status
                  </label>
                  <input type="text" name="name" class="billing_details_input" value ="Successful" required readonly/>
              <label class="lbl_billing_details_form">
                Name
              </label>
              <input type="text" name="name" class="billing_details_input" value ="{{$user->name}}"required/>

              <label class="lbl_billing_details_form">
                Address Line 1
              </label>
              <input type="text" name="addressline1" class="billing_details_input" required/>

              <label class="lbl_billing_details_form">
                Address Line 2
              </label>
              <input type="text" name="addressline2" class="billing_details_input" />

              <label class="lbl_billing_details_form">
                Town/City
              </label>
              <input type="text" name="city" class="billing_details_input" required/>
              <label class="lbl_billing_details_form">
                Country
              </label>
              <input type="text" name="country" class="billing_details_input" required/>
              <label class="lbl_billing_details_form">
                Postal Code
              </label>
              <input type="text" name="postalCode" class="billing_details_input" required/>

              <label class="lbl_billing_details_form">
                Phone Number
              </label>
              <input type="text" name="phoneNumber" class="billing_details_input" required/>


              <label class="lbl_billing_details_form">
                Email Address
              </label>
              <input type="email" class="billing_details_input" value="{{$user->email}}"required readonly/>

              <div class="check_save_checkout">
                <input type="checkbox" id="sentenceCheck">
                <label for="sentenceCheck" class="checkout_save_sentence">
                  Save this information for faster check-out next time.
                </label>
              </div>

            <div class="apply_coupon">
              <input type="text" placeholder="Coupon Code">
              <button class="apply_coupon_button">Apply Coupon</button>
            </div>

            <div class="pob_rb">
              <button type="submit" class="place_order_button">Place Order</button>
              <button type="reset" class="reset_button">Reset</button>
            </div>
        </form>
          </div>
        </div>
        <div class="checkout_img">
          <img src="{{asset('images/charming-lady-fashionable-blouse-trousers-takes-notes-tablet-girl-posing-background-dresses.png')}}">
        </div>
      </div>
    </div>
  </section>


@endsection
