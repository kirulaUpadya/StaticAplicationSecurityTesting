@extends('layouts.app')
@section('content')

  <section class="section">
    <div class="container">
      <div class="reset_img">
        <img src="./images/resetpwconfmsg.png" alt="" class="resetpw_img">
      </div>
      <p class="fpw_p">Check your email!</p>
      <p class="fpw_sub_p">Thanks! An email was sent that will ask you to click on a link to verify you own this account.<br> If you don't get the email please contact exclusive@gmail.com</p>
      <div class="fpw_email">
        <div class="fpw_form_group">
          <button class="fpw_form_btn">
            <a href="https://mail.google.com/" target="_blank" class="form_link">Open email inbox</a>
          </button>
          <a href="forgotpw.html" class="nav_link_fpw_btol">< Resend email</a>
        </div>
      </div>

    </div>
  </section>





    <!-- Swiper JS -->
   <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

   <script src="./js/app.js"></script>
@endsection
