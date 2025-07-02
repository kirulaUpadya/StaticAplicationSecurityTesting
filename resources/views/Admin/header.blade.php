



  <div class="top_nav">
    <div class="container top_nav_container">
      <div class="top_nav_wrapper">
        <p class="tap_nav_p">
          Summer Sale For All Swim Suits And Free Express Delivery - OFF 50%!
        </p>
        <a href="#" class="top_nav_link">SHOP NOW</a>
      </div>
    </div>
  </div>
  <nav class="nav">
    <div class="container nav_container">
      <a href="#" class="nav_logo">EXCLUSIVE</a>
      <ul class="nav_list">
        <li class="nav_item">
          <a href="{{route('home')}}" class="nav_link">Home</a>
        </li>
        {{-- <li class="nav_item">
          <a href="{{route('shop')}}" class="nav_link">Shop</a>
        </li> --}}
        <li class="nav_item">
          <a href="{{route('about.us')}}" class="nav_link">About</a>
        </li>
        {{-- <li class="nav_item">
          <a href="{{route('contact.us')}}" class="nav_link">Contact</a>
        </li> --}}
        <li class="nav_item">
          <a href="{{route('admin.index')}}" class="nav_link">AdminDashboard</a>
        </li>
        {{-- <li class="nav_item">
          <a href="{{route('log.out')}}" class="nav_link">Log out</a>
        </li> --}}
      </ul>
      <div class="nav_items">
        <form action="#" class="nav_form">
          <input
            type="text"
            class="nav_input"
            placeholder="search here...."
          />
          <img src="{{ asset('images/search.png')}}" alt="" class="nav_search" />
        </form>
        <img src="{{ asset('images/heart.png') }}" alt="" class="nav_heart" />
        <a href="{{ route('cart.index')}}">
          <img src="{{ asset('images/cart.png') }}" alt="" class="nav_cart" />
        </a>
        <div class="nav_profile">
          <input
            type="checkbox"
            id="profile-toggle"
            class="nav_profile_checkbox"
            hidden
          />
          <label for="profile-toggle" class="nav_profile_icon">
          <img src="{{ asset('images/userred.png') }}" alt="Profile" class="profile_icon_img"/>
          <span class="user-name">{{ session('name') }}</span>
        </label>
          <ul class="nav_profile_menu">
            <li>
              <a href="{{route('customer.profile')}}"
                ><img
                  src="{{ asset('images/icon-user.png') }}"
                  class="nav_profile_items_icon"
                />Admin Dashboard</a
              >
            </li>
            <li>
              <a href="{{route('log.out')}}"
                ><img
                  src="{{ asset('images/icon-logout.png') }}"
                  class="nav_profile_items_icon"
                />Logout</a
              >
            </li>
          </ul>
        </div>
      </div>
      <span class="hamburger">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="w-6 h-6"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
          />
        </svg>
      </span>
    </div>
  </nav>
  <nav class="mobile_nav mobile_nav_hide">
    <ul class="mobile_nav_list">
      <li class="mobile_nav_item">
        <a href="/" class="mobile_nav_link">Home</a>
      </li>
      <li class="mobile_nav_item">
        <a href="#" class="mobile_nav_link">About</a>
      </li>
      <li class="mobile_nav_item">
        <a href="#" class="mobile_nav_link">Contact</a>
      </li>
      <li class="mobile_nav_item">
        <a href="/sign-up.html" class="mobile_nav_link">Sign Up</a>
      </li>
      <li class="mobile_nav_item">
        <a href="/cart.html" class="mobile_nav_link">Cart</a>
      </li>
    </ul>
  </nav>
