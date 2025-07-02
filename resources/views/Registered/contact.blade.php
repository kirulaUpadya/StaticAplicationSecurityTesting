@extends('layouts.regapp')
@section('content')

    <main>
      <div class="container">
        <div class="myacc_labels">
          <label for="my_account"><a href="index.html" class="myacc_home">Home</a> / Contact</label>
        </div>
        <section class="contact-container">
            <div class="contact-info">
                <div class="contact-box">
                    <i class="fas fa-phone"></i>
                    <h3 class="section_title">Call To Us</h3><br>
                    <p>We are available 24/7, 7 days a week.</p><br>
                    <p>Phone: +880161112222</p><br>
                </div>
                <div class="contact-box">
                    <i class="fas fa-envelope"></i>
                    <h3 class="section_title">Write To Us</h3><br>
                    <p>Fill out our form and we will contact you within 24 hours.</p><br>
                    <p>Email: customer@exclusive.com</p><br>
                    <p>Email: support@exclusive.com</p><br>
                </div>
            </div>
            <div class="contact-form">
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
                <form method="POST" action="{{ route('contactUs') }}">
                    @csrf
                <input type="text" placeholder="Your Name *" name="name"><br>
                <input type="email" placeholder="Your Email *" name="email"><br>
                <input type="text" placeholder="Your Phone *" name="phone_number"><br>
                <textarea placeholder="Your Message" name="message"></textarea><br>
                <button type="submit">Send Message</button>
                </form>
            </div>
        </section>
    </main>


        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <script src="./js/app.js"></script>


@endsection
