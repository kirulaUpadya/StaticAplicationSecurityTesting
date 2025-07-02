@extends('layouts.app')
@section('content')


      <div class="auth_container auth_container_signup">
        <div class="auth_img">
          <img src="{{ asset('images/auth2-image.png') }}" alt="" class="auth_image" />
        </div>
        <div class="auth_content">
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
          <form action="{{route('register')}}" class="auth_form auth_form_signup" method="POST">
            @csrf
            <h2 class="form_title">Create your account</h2>
            <p class="auth_p">Enter your details below</p>
            <div class="form_group">
              <input type="text" placeholder="Name" class="form_input" name="name" />
            </div>
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
             <div class="form_group form_pass">
              <input
                type="password"
                placeholder="Re-enter Password"
                class="form_input"
                name="confirm-password"/>
            </div>
            <div class="form_group">
              <button type="submit" class="form_btn">
                Create Account
              </button>
            </div>
            <div class="form_group">
              <span
                >Already have an account?
                <a href="{{route('login')}}" class="form_auth_link">Login</a></span
              >
            </div>
          </form>
        </div>
      </div>
    </section>



    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="./js/app.js"></script>

@endsection
