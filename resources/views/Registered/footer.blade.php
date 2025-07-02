<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .footer {
    margin-top: 3rem;
    background-color: var(--colo-dark-1);
}

.footer_container {
    width: 100%;
    display: flex;
    flex-wrap: nowrap;
    gap: 1rem;
    justify-content: space-between;
    align-items: flex-start;
    padding: 3rem 0rem;
    color: var(--colo-white-1);
}

.footer_item {
    color: var(--colo-white-1);
    flex: 1;
    min-width: 15%;
    padding: 0 1rem;
    margin: 0;
}

.footer_logo {
    font-size: 1.2rem;
    color: var(--colo-white-1);
    font-weight: 700;
    margin-top: 0rem;
}

.footer_p {
    margin-top: 0.5rem;
    font-size: 0.8rem;
}

.footer_p .footer_p_title {
    margin-bottom: 0.5rem;
    font-size: 1rem;
    color: var(--colo-white-1);
}

.footer_item_title {
   color: var(--colo-white-1);
    margin-bottom: 0.5rem;
    font-size: 1rem;
    margin-top: 0.5rem;
}

.footer_list_item {
    margin-bottom: 0.5rem;
    font-size: 0.8rem;
}

.footer_bottom_container {
    width: 100%;
    text-align: center;
}

.footer_p_cont {
    color: var(--colo-dark-2);
    font-size: 0.8rem;
    margin: 1rem 0rem;
}

.app_links {
    margin-top: 1rem;
    display: flex;
    gap: 1rem;
    align-items: center;
    flex-wrap: nowrap;
    justify-content: flex-start;
}

.img_col {
    display: block;
}

.social_media {
    margin-top: 1rem;
    display: flex;
    gap: 2rem;
    align-items: center;
    flex-wrap: nowrap;
}

.app_links img,
.social_media img {
    max-width: 100%;
    height: auto;
}

.footer_copy {
    color: var(--colo-dark-2);
    padding: 0.5rem 0rem;
    font-size: 0.8rem;
    text-align: center;
}

.hamburger {
    display: none;
    cursor: pointer;
}

.hamburger > svg {
    width: 4.5rem;
    height: 4.5rem;
}

@media only screen and (max-width: 1070px) {
    .header_container {
        flex-direction: column;
    }

    .header_filter {
        display: none;
    }
}

@media only screen and (max-width: 800px) {
    .top_nav {
        display: none;
    }
    .nav_list {
        display: none;
    }
    .nav_items {
        display: none;
    }
    .hamburger {
        display: block;
    }
    .gallery {
        width: 100%;
        display: flex;
        flex-direction: column;
    }
    .footer_container {
        display: block;
    }
    .footer_p {
        margin-bottom: 0.5rem;
        margin-top: 0.5rem;
    }
    .footer_p .footer_p_title {
        margin-bottom: 0.2rem;
        font-size: 1rem;
    }
    .footer_item_title {
        margin-bottom: 0.2rem;
        margin-left:0.1rem;
        margin-top: 0.5rem;
        font-size: 1rem;
    }
    .footer_list_item {
        margin-bottom: 0.2rem;
        margin-top: 0rem;
    }
    .footer_p_cont {
        margin: 0.2rem 0rem;
    }
    .footer_copy {
        padding: 0.2rem 0rem;
    }
}

  </style> 
</head>
<body>
<footer class="footer">
    <div class="container footer_container">
      <div class="footer_item">
        <a href="#" class="footer_logo">Exclusive</a>
        <div class="footer_p">
          <h3 class="footer_p_title">Subscribe</h3>
          Get 10% off your first order</div>
        </div>


      <div class="footer_item">
        <h3 class="footer_item_title">Support</h3>
        <ul class="footer_list">
          <li class="li footer_list_item">111 Bijoy sarani, Dhaka,  DH 1515, Bangladesh.</li>
          <li class="li footer_list_item">exclusive@gmail.com</li>
          <li class="li footer_list_item">+88015-88888-9999</li>
        </ul>
      </div>

      <div class="footer_item">
        <h3 class="footer_item_title">Account</h3>
        <ul class="footer_list">
          <li class="li footer_list_item">My Account</li>
          <li class="li footer_list_item">Login / Register</li>
          <li class="li footer_list_item">Cart</li>
          <li class="li footer_list_item">Wishlist</li>
          <li class="li footer_list_item">Shop</li>
        </ul>
      </div>

      <div class="footer_item">
        <h3 class="footer_item_title">Quick Link</h3>
        <ul class="footer_list">
          <li class="li footer_list_item">Privacy Policy</li>
          <li class="li footer_list_item">Terms Of Use</li>
          <li class="li footer_list_item">FAQ</li>
          <li class="li footer_list_item">Contact</li>
        </ul>
      </div>

      <div class="footer_item">
        <h3 class="footer_item_title">Download App</h3>
        <div class="footer_p">
          <p class="footer_p_cont">Save $3 with App New User Only</p>
          <div class="app_links">
            <div class="img_col">
              <img src="{{asset('images/footer/Qr Code.png')}}" alt="" class="app_qr">
            </div>
            <div class="img_col">
              <img src="{{asset('images/footer/png-transparent-google-play-store-logo-google-play-app-store-android-wallets-text-label-logo.png')}}" alt="Google_Play">

              <div class="img_col">
                <img src="{{asset('images/footer/download-appstore.png')}}" alt="App_store">
              </div>
            </div>
          </div>
          <div class="social_media">
            <a href="#">
              <img src="{{asset('images/footer/Icon-Facebook.png')}}" alt="facebook" class="social_media_icon">
            </a>
            <a href="#">
              <img src="{{asset('images/footer/Icon-Twitter.png')}}" alt="twitter" class="social_media_icon">
            </a>
            <a href="#">
              <img src="{{asset('images/footer/icon-instagram.png')}}" alt="inster" class="social_media_icon">
            </a>
            <a href="#">
              <img src="{{asset('images/footer/Icon-Linkedin.png')}}" alt="linkdin" class="social_media_icon">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="footer_bottom">
      <div class="container footer_bottom_container">
        <p class="footer_copy">
          Copyright Rimel 2022. All right reserved
        </p>
      </div>
    </div>
  </footer>
</body>
</html>
