<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://unpkg.com/scrollreveal"></script>
    <!-- Link Swiper's CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
    <title>Exclusive E-Commerce Website</title>
  </head>



</head>
<body style="">
    @include('Unregistered.header')

        @yield('content')

    @include('Unregistered.footer')
</body>


{{-- unreg --}}
</html>



