@extends('layouts.regapp')

@section('content')

<section class="section">
    <div class="container">
    <h1>CART</h1>

<div class="shopping-cart">
        @if($items->count()>0)
        <div class="cart-table__wrapper">
          <table class="cart-table">
            <thead>
              <tr>
                <th>Product</th>
                <th></th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
              <tr>
                <td>
                  <div class="shopping-cart__product-item">
                    <img loading="lazy" src="{{ asset('adminassets/uploads/products/thumbnails') }}/{{$item->model->image}}" width="120" height="120" alt="{{$item->name}}" />
                  </div>
                </td>
                <td>
                  <div class="shopping-cart__product-item__detail">
                    <h4>{{$item->name}}</h4>
                    <ul class="shopping-cart__product-item__options">
                      <li>Color: Yellow</li>
                      <li>Size: L</li>
                    </ul>
                  </div>
                </td>
                <td>
                  <span class="shopping-cart__product-price">LKR{{$item->price}}</span>
                </td>
                <td>
                  <div class="qty-control position-relative">
                    <input type="number" name="quantity" value="{{$item->qty}}" min="1" class="qty-control__number text-center">

                    <form method="POST" action="{{ route('cart.qty.decrease',['rowId'=>$item->rowId]) }}">
                    @csrf
                    @method('PUT')
                    <div class="qty-control__reduce">-</div>
                    </form>

                    <form method="POST" action="{{ route('cart.qty.increase',['rowId'=>$item->rowId]) }}">
                      @csrf
                      @method('PUT')
                    <div class="qty-control__increase">+</div>
                    </form>

                  </div>
                </td>
                <td>
                  <span class="shopping-cart__subtotal">LKR{{$item->subTotal()}}</span>
                </td>
                <td>
                  <a href="#" class="remove-cart">
                    <svg width="10" height="10" viewBox="0 0 10 10" fill="#767676" xmlns="http://www.w3.org/2000/svg">
                      <path d="M0.259435 8.85506L9.11449 0L10 0.885506L1.14494 9.74056L0.259435 8.85506Z" />
                      <path d="M0.885506 0.0889838L9.74057 8.94404L8.85506 9.82955L0 0.97449L0.885506 0.0889838Z" />
                    </svg>
                  </a>
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
          <div class="cart-table-footer ml-4">
            <button class="btn btn-light">UPDATE CART</button>
          </div>
        </div>
        <div class="shopping-cart__totals-wrapper">
          <div class="sticky-content">
            <div class="shopping-cart__totals">
              <h3>Cart Totals</h3>
              <table class="cart-totals">
                <tbody>
                  <tr>
                    <th>Subtotal</th>
                    <td>LKR{{Cart::instance('cart')->subTotal()}}</td>
                  </tr>
                  <tr>
                    <th>Shipping</th>
                    <td>Free</td>
                  </tr>
                  <tr>
                    <th>VAT</th>
                    <td>LKR{{Cart::instance('cart')->tax()}}</td>
                  </tr>
                  <tr>
                    <th>Total</th>
                    <td>LKR{{Cart::instance('cart')->total()}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        @else
             <div class="row">
                <div class="col-md-12 text-center pt-5 pb-5 ">
                    <p>No items found in the cart</p>
                    <a href="{{ route('shop') }}">Shop Now</a>
                </div>
             </div>
        @endif
      </div>

         <!-- Empty Cart Message (optional, hidden by default) -->
        <p class="cart-empty-message" style="display: none;">Your cart is empty!</p>
        <a href="{{route('checkout')}}">
          <button class="checkout_button">Proceed to Checkout</button>
        </a>
      </div>
    </div>
  </section>


@endsection

@push('scripts')

<script>
  $(function(){
     $(".qty-control__increase").on("click",function(){
      $(this).closest('form').submit();
     });

     $(".qty-control__reduce").on("click",function(){
      $(this).closest('form').submit();
     });

  })
</script>

@endpush
