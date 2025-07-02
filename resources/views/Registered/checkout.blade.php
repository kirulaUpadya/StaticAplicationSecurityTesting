@extends('layouts.regapp')

@section('content')
<form action="{{route('stripe')}}" method="post">
    @csrf

    <input type="hidden" name="total" value="{{$total}}">
    <button type="submit">Pay with Stripe</button>
</form>
@endsection
