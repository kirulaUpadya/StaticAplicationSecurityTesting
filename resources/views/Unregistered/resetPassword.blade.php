@extends('layouts.app')
@section('content')


  <section class="section">

    <div class="container">

      <div class="reset_img">
        <img src="{{asset('images/Resetpw.png')}}" alt="" class="resetpw_img">
      </div>
      <p class="fpw_p">Reset Password</p>
      <p class="fpw_sub_p">Please kindly set your new password.</p>
      <div class="fpw_email">
        <div class="fpw_form_group">
            <form method="POST" action="{{route('reset.password.post')}}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

          <div class="form_group form_pass">
            <label for="email">Email</label>
            <input
              type="email"
              class="form_input"
              name="email"
              id="email"
              required
            />
            <label for="new_password">New Password</label>
            <input
              type="password"
              class="form_input"
              name="password"
              id="new-password"
              oninput="checkStrength()"
              required
            />
            <div class="strength-bar">
              {{-- <span id="strength-text">Password strength:</span> <span id="strength-value">Weak</span> --}}
            </div>
            <label for="confirm_password">Re-enter password</label>
            <input
              type="password"
              class="form_input"
              name="confirmPassword"
              id="confirm-password"
              required
            />
          </div>
          <button class="fpw_form_btn" type="submit">
            Change Password
          </button>
        </div>
      </div>
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

    </div>
  </section>





    <!-- Swiper JS -->
   <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

   <script src="./js/app.js"></script>
@endsection
