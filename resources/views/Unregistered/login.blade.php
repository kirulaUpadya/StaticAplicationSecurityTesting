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
      <div class="auth_container">
        <div class="auth_img">
          <img src="./images/auth-image.png" alt="" class="auth_image" />
        </div>
        <div class="auth_content">
          <form action="{{route('login.user')}}" class="auth_form" method="POST">
            @csrf
            <h2 class="form_title">Login to your account</h2>
            <p class="auth_p">Enter your details below</p>
            <div class="form_group">
              <input type="email" placeholder="Email" class="form_input" name="email"/>
            </div>
            <div class="form_group form_pass">
              <input
                type="password"
                placeholder="Password"
                class="form_input"
                name="password" />
            </div>
            <div class="form_group">
              <button class="form_btn" type="submit">
                Login
              </button>
            </div>
            <div class="form_group">
              <span>
                Don't have an account?
                <a href="{{route('show.signup')}}" class="form_auth_link">Register</a>
              </span>
            </div>
            <div class="form_group">
              <span>
                Forgot your password?
                <a href="{{route('show.forgotpasswordpage')}}" class="form_auth_link">Reset Password</a>
              </span>
            </div>
          </form>
        </div>
      </div>
    </section>



    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="./js/app.js"></script>
  </body>
@endsection
