@extends('layouts.regapp')
@section('content')
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

<section class="section">

  <div class="container">
    <!-- Breadcrumb & Welcome -->
    <div class="myacc_labels">
      <label><a href="index.html" class="myacc_home">Home</a> / My Account</label>
      <label class="welcome_profile">Welcome! <span class="useracc_welcome_name">{{ session('name') }}</span></label>
    </div>

    <div class="sidemenu_with_linked_div">
      <!-- Side Menu -->
      <div class="side_menu">
        <label class="side_menu_main">Manage My Account</label>
        <ul class="side_menu_sub_items">
          <li><a href="#profile">Profile</a></li>
          <li><a href="#address">Address Book</a></li>
          <li><a href="#mypayment">My Payment Options</a></li>
        </ul>
        <label class="side_menu_main">My Orders</label>
        <ul class="side_menu_sub_items">
          <li><a href="#myreturns">My Returns</a></li>
          <li><a href="#mycancellations">My Cancellations</a></li>
        </ul>
        <label class="side_menu_main"><a href="#mywishlist">My Wishlist</a></label>
      </div>

      <!-- Content Sections -->
      <div class="side_menu_linked_div">
        <!-- Profile Section -->
        <div id="profile" class="content_section" style="display: block;">
          <h2 class="side_menu_linked_div_topic">Edit Your Profile</h2>
          <form action="{{route('customer.updateProfile')}}" method="POST" class="edit_profile_form">
            @csrf
            <!-- Name -->
            <div class="edit_form_div">
              <label for="edit_name" class="lbl_editprofile_topics">Name</label>
              <input type="text" class="edit_profile_input" id="edit_name" name="name" value="{{ session('name') }}" required />
            </div>

            <!-- Email -->
            <div class="edit_form_div">
              <label for="edit_email" class="lbl_editprofile_topics">Email - (*you can not change the email)</label>
              <input type="email" class="edit_profile_input" id="edit_email" name="email" value="{{ session('email') }}" disabled />
            </div>

            <!-- Password Change -->
            <label class="lbl_editprofile_topics">Change the password</label>
            <div class="edit_pwchanges">
              <input type="password" class="edit_profile_input" name="current_password" placeholder="Current Password" />
              <input type="password" class="edit_profile_input" name="new_password" placeholder="New Password" />
              <input type="password" class="edit_profile_input" name="confirm_new_password" placeholder="Confirm New Password" />
            </div>

            <!-- Buttons -->
            <div class="edit_profile_buttons">
              <button type="reset" class="cancle_button">Cancel</button>
              <button type="submit" class="save_button">Save Changes</button>
            </div>
          </form>
        </div>

        <!-- Other Sections -->
        <div id="address" class="content_section">
          <h2 class="side_menu_linked_div_topic">Address Book</h2>
        </div>

        <div id="mypayment" class="content_section">
          <h2 class="side_menu_linked_div_topic">My Payment Options</h2>
        </div>

        <div id="myreturns" class="content_section">
          <h2 class="side_menu_linked_div_topic">My Returns</h2>
        </div>

        <div id="mycancellations" class="content_section">
          <h2 class="side_menu_linked_div_topic">My Cancellations</h2>
        </div>

        <div id="mywishlist" class="content_section">
          <h2 class="side_menu_linked_div_topic">My Wishlist</h2>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

