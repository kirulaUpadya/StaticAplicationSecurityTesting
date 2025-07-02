@extends('layouts.app')
@section('content')

  <section class="section">
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
    <div class="container fpw_container">
      <div class="fpw_img">
        <img src="{{asset('images/forgotpw.png')}}" alt="" class="forgotpw_img">
      </div>
      <p class="fpw_p">Forgot your Password?</p>
      <p class="fpw_sub_p">Enter your email so that we can send you password reset link</p>
      <div class="fpw_email">
        <div class="fpw_form_group">
            <form method="POST" action="{{route('forgotpassword.email')}}">
                @csrf
          <input type="email" name="email" placeholder="Email" class="form_input" />
          <button class="fpw_form_btn" type = "submit">
            Send Email
          </button>
        </form>
          <a href="{{route('login')}}" class="nav_link_fpw_btol">< Back to Login</a>
        </div>
      </div>

    </div>
  </section>





    <!-- Swiper JS -->
   <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

   <script src="./js/app.js"></script>
@endsection
