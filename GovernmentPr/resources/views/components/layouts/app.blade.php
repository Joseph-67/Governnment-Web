<!doctype html>
<html lang="en_us" class="no-js">
<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>@yield('PageTitle') – Federal Ministry of Environment</title>
   <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Open Graph Meta Tags -->
   <meta property="og:title" content="@yield('PageTitle') – Federal Ministry of Environment">
   <meta property="og:description" content="Nigeria promotes RECP for sustainable industrial growth and environmental protection.">
   <meta property="og:image" content="{{ asset('MainAssets/img/logo/logo3.png') }}">
   <meta property="og:url" content="https://recp.elitetechnologydev.ng/home">
   <meta property="og:type" content="website">
   <meta property="og:site_name" content="Federal Ministry of Environment">

   <link rel="shortcut icon" type="image/x-icon" href="{{ asset('MainAssets/img/logo/icon-100x100.png') }}" sizes="32x32">

   <!-- CSS -->
   @foreach([
      'bootstrap', 'animate', 'swiper-bundle', 'slick', 'flaticon_statex', 'magnific-popup',
      'font-awesome-pro', 'spacing', 'custom-animation', 'main'
   ] as $css)
      <link rel="stylesheet" href="{{ asset("MainAssets/css/$css.css") }}">
   @endforeach

   <style>
      .dropdown-menu { padding: 10px 0; }
      .dropdown-item { padding: 15px 15px; margin: 2px 0; }
      .logo-link { display: inline-block; }
      .logo-img { max-width: 50px; height: auto; display: inline-block; z-index: 9; }
      .tp-header-logo a img { max-height: 30px; height: auto; }
      @media (max-width: 1200px) {
         .tp-header-menu nav ul { justify-content: center; }
      }
      @media (max-width: 991.98px) {
         .tp-header-menu { display: none; }
         .tp-menu-bar { display: inline-block; font-size: 24px; cursor: pointer; background: none; border: none; }
         .tp-header-right-box { justify-content: flex-end; }
         .tp-header-logo { text-align: left; }
      }
      @media (max-width: 575.98px) {
         .tp-header-logo a img { max-width: 25px; }
         .tp-header-right-tel-icon-box,
         .tp-header-right-search { display: none !important; }
         .tp-btn.dropdown-toggle { padding: 6px 10px; font-size: 14px; }
      }
   </style>
</head>
<body>
   <!-- Preloader -->
   <div id="loading">
      <div id="loading-center">
         <div id="loading-center-absolute">
            @foreach(['four', 'three', 'two', 'one'] as $obj)
               <div class="object" id="object_{{ $obj }}"></div>
            @endforeach
         </div>
      </div>
   </div>

   <!-- Back to top -->
   <div class="back-to-top-wrapper">
      <button id="back_to_top" type="button" class="back-to-top-btn">
         <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
         </svg>
      </button>
   </div>

   <!-- Search popup -->
   <div class="search__popup">
      <div class="container">
         <div class="row">
            <div class="col-xxl-12">
               <div class="search__wrapper">
                  <div class="search__top d-flex justify-content-between align-items-center">
                     <div class="search__logo">
                        <a href="{{ url('/') }}">
                           @foreach(['logo3.png', 'logo1.png', 'logo4.jpeg', 'logo2.png'] as $logo)
                              <img src="{{ asset("MainAssets/img/logo/$logo") }}" alt="logo" class="logo-sm" style="max-width:50px">
                           @endforeach
                        </a>
                     </div>
                     <div class="search__close">
                        <button type="button" class="search__close-btn search-close-btn">
                           <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M17 1L1 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M1 1L17 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                           </svg>
                        </button>
                     </div>
                  </div>
                  <div class="search__form">
                     <form action="#">
                        <div class="search__input">
                           <input class="search-input-field" type="text" placeholder="Type here to search...">
                           <span class="search-focus-border"></span>
                           <button type="submit">
                              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M9.55 18.1C14.272 18.1 18.1 14.272 18.1 9.55C18.1 4.82797 14.272 1 9.55 1C4.82797 1 1 4.82797 1 9.55C1 14.272 4.82797 18.1 9.55 18.1Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M19.0002 19.0002L17.2002 17.2002" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                              </svg>
                           </button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Offcanvas -->
   <div class="tpoffcanvas-area">
      <div class="tpoffcanvas">
         <div class="tpoffcanvas__close-btn">
            <button class="close-btn"><i class="fal fa-times"></i></button>
         </div>
         <div class="tpoffcanvas__logo">
            <a href="{{ url('/') }}">
               @foreach(['logo3.png', 'logo1.png', 'logo4.jpeg', 'logo2.png'] as $logo)
                  <img src="{{ asset("MainAssets/img/logo/$logo") }}" alt="logo" class="logo-sm" style="max-width:50px">
               @endforeach
            </a>
         </div>
         <div class="tpoffcanvas__title">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima incidunt eaque ab cumque, porro maxime autem sed.</p>
         </div>
         <div class="tp-main-menu-mobile d-xl-none"></div>
         <div class="tpoffcanvas__contact-info">
            <div class="tpoffcanvas__contact-title"><h5>Contact us</h5></div>
            <ul>
               <li>
                  <i class="fa-light fa-location-dot"></i>
                  <a href="https://www.google.com/maps/@23.8223586,90.3661283,15z" target="_blank">76 Federal Ministry of Environment Headquarters</a>
               </li>
               <li>
                  <i class="fas fa-envelope"></i>
                  <a href="#"><span class="__cf_email__" data-cfemail="f88c909d959d888d8a9db89f95999194d69b9795">[email&#160;protected]</span></a>
               </li>
               <li>
                  <i class="fal fa-phone-alt"></i>
                  <a href="tel:+48555223224">+48 555 223 224</a>
               </li>
            </ul>
         </div>
         <div class="tpoffcanvas__input">
            <div class="tpoffcanvas__input-title"><h4>Get Update</h4></div>
            <form action="#">
               <div class="p-relative">
                  <input type="text" placeholder="Enter mail">
                  <button><i class="fas fa-paper-plane"></i></button>
               </div>
            </form>
         </div>
         <div class="tpoffcanvas__social">
            <div class="social-icon">
               @foreach(['twitter', 'instagram', 'facebook-f', 'pinterest-p'] as $icon)
                  <a href="#"><i class="fab fa-{{ $icon }}"></i></a>
               @endforeach
            </div>
         </div>
      </div>
   </div>
   <div class="body-overlay"></div>

   <header class="tp-header-height">
      <!-- Header Top -->
      <div class="tp-header-top__area tp-header-top__space d-none d-md-block theme-bg-2">
         <div class="container-fluid">
            <div class="row">
               <div class="col-xl-6 col-lg-7 col-md-9">
                  <div class="tp-header-top__left-info">
                     <ul>
                        <li>
                           <i class="flaticon-map"></i>
                           <a href="https://www.google.com/maps/@23.822337,90.3654296,15z?entry=ttu" target="_blank">76 Federal Ministry of Environment Headquarters</a>
                        </li>
                        <li>
                           <i class="flaticon-envelope"></i>
                           <a href="#"><span class="__cf_email__" data-cfemail="630d0606070b060f1323000c0e13020d1a4d000c0e">[email&#160;protected]</span></a>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="col-xl-6 col-lg-5 col-md-3">
                  <div class="tp-header-top__right-wrap d-flex align-items-center justify-content-end">
                     <div class="tp-header-top__right-info d-none d-xl-block">
                        <span>Council</span>
                        <span><em>/</em>Government</span>
                        <span><em>/</em>Complaints</span>
                     </div>
                     <div class="tp-header-top__right-social">
                        @foreach(['facebook-f', 'instagram', 'linkedin-in', 'twitter'] as $icon)
                           <a href="#"><i class="fa-brands fa-{{ $icon }}"></i></a>
                        @endforeach
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Header Main -->
      <div id="header-sticky" class="tp-header-area tp-header-plr">
         <div class="container-fluid">
            <div class="row align-items-center">
               <div class="col-xxl-2 col-xl-2 col-lg-6 col-md-6 col-8">
                  <div class="tp-header-logo logo-grid">
                     <a href="{{ url('/') }}" style="display: flex; align-items: center; gap: 10px;">
                        @foreach(['logo3.png', 'logo1.png', 'logo4.jpeg', 'logo2.png'] as $logo)
                           <img src="{{ asset("MainAssets/img/logo/$logo") }}" alt="logo" class="logo-sm" style="max-width:50px">
                        @endforeach
                     </a>
                  </div>
               </div>
               <div class="col-xxl-6 col-xl-7 d-none d-xl-block">
                  <div class="tp-header-menu">
                     <nav class="tp-main-menu-content">
                        <ul>
                           <li class="has-dropdown"><a href="{{ route('home') }}">HOME</a></li>
                           <li class="has-dropdown">
                              <a href="#">ABOUT US</a>
                              <ul class="tp-submenu submenu">
                                 <li><a href="{{ route('mandate') }}">MANDATE</a></li>
                                 <li><a href="{{ route('organisation') }}">ORGANIZATION</a></li>
                                 <li><a href="#">LEADERSHIP</a></li>
                                 <li><a href="#">CAREER</a></li>
                              </ul>
                           </li>
                           <li class="has-dropdown">
                              <a href="#">DEPARTMENTS</a>
                              <ul class="tp-submenu submenu">
                                 <li><a href="#">AUDIT</a></li>
                                 <li><a href="#">CLIMATE CHANGE</a></li>
                              </ul>
                           </li>
                           <li class="has-dropdown">
                              <a href="#">INITIATIVES</a>
                              <ul class="tp-submenu submenu">
                                 <li><a href="#">ACRSEAL</a></li>
                                 <li><a href="#">CLEAN AND GREEN INITIATIVE</a></li>
                              </ul>
                           </li>
                           <li class="has-dropdown">
                              <a href="#">MORE</a>
                              <ul class="tp-submenu submenu">
                                 <li class="has-dropdown"><a href="#">EVENTS & NEWS</a></li>
                                 <li class="has-dropdown"><a href="#">AGENCIES</a></li>
                                 <li class="has-dropdown"><a href="#">MEDIA & FOLLOWING</a></li>
                              </ul>
                           </li>
                           <li><a href="{{ route('contact-us') }}">CONTACT</a></li>
                        </ul>
                     </nav>
                  </div>
               </div>
               <div class="col-xxl-4 col-xl-3 col-lg-6 col-md-6 col-4">
                  <div class="tp-header-right-box">
                     <div class="tp-header-right-action d-flex align-items-center justify-content-end">
                        <div class="tp-header-right-search d-none d-sm-block">
                           <button class="search-open-btn"><i class="fa-regular fa-magnifying-glass"></i></button>
                        </div>
                        <div class="tp-header-right-btn">
                           <a class="tp-btn dropdown-toggle" style="color: #fff;" href="{{ route('login') }}" role="button" id="loginDropdown" data-bs-toggle="dropdown" aria-expanded="false">LOGIN</a>
                           <ul class="dropdown-menu" aria-labelledby="loginDropdown">
                              <li><a href="{{ route('login') }}" class="dropdown-item">User Login</a></li>
                              <li><a href="{{ route('admin.login') }}" class="dropdown-item">Admin Login</a></li>
                           </ul>
                        </div>
                        <div class="tp-header-right-tel-icon-box d-none d-lg-block">
                           <div class="tp-header-right-tel-icon d-flex align-items-center">
                              <i class="flaticon-phone-call-1"></i>
                              <div class="tp-header-right-tel-content">
                                 <span>Call Us</span>
                                 <a href="tel:(234)9160173332">09160173332</a>
                              </div>
                           </div>
                        </div>
                        <div class="tp-header-bar d-xl-none text-end">
                           <button class="tp-menu-bar"><i class="fa-light fa-bars-staggered"></i></button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </header>

   @yield('pageContent')

   <footer>
      <!-- Footer Top -->
      <div id="footer-one-page" class="tp-footer-top-area tp-footer-top-bdr-bottom pt-35 theme-bg-2">
         <div class="container">
            <div class="row">
               <div class="col-xl-4 col-lg-4 col-md-6">
                  <div class="tp-footer-top-item tp-footer-top-space-1 d-flex align-items-center">
                     <div class="tp-footer-top-info-icon"><i class="flaticon-globe"></i></div>
                     <div class="tp-footer-top-info">
                        <h4 class="tp-footer-top-info-title">Address</h4>
                        <span><a href="#">Federal Ministry of Environment Headquarters 3FH3+WC8, Mabushi 900108, Abuja</a></span>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-4 col-md-6">
                  <div class="tp-footer-top-item tp-footer-top-space-2 d-flex align-items-center">
                     <div class="tp-footer-top-info-icon"><i class="flaticon-email"></i></div>
                     <div class="tp-footer-top-info">
                        <h4 class="tp-footer-top-info-title">Contact</h4>
                        <span><a href="#"><span class="__cf_email__" data-cfemail="285b5c495c4d50404d445841464e47684f45494144064b4745">[email&#160;protected]</span></a></span>
                        <span><a href="tel:+88(3265)56720">+88 (3265) 56720</a></span>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-4 col-md-6">
                  <div class="tp-footer-top-item tp-footer-top-space-3 d-flex align-items-center">
                     <div class="tp-footer-top-info-icon"><i class="flaticon-fast-time"></i></div>
                     <div class="tp-footer-top-info">
                        <h4 class="tp-footer-top-info-title">Clock</h4>
                        <span>Mon - Sat 8 am - 5 pm<br>Friday: Closed</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Footer Main -->
      <div class="tp-footer-area theme-bg-2 pt-110 pb-60 p-relative z-index">
         <div class="tp-footer-shape">
            <img src="assets/img/footer/footer-shape.png" alt="">
         </div>
         <div class="container">
            <div class="row">
               <div class="col-xl-3 col-lg-4 col-md-6 mb-50 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                  <div class="tp-footer-widget footer-col-1">
                     <div class="tp-footer-widget-logo">
                        <a href="">
                           @foreach(['logo3.png', 'logo1.png', 'logo4.jpeg', 'logo2.png'] as $logo)
                              <img src="{{ asset("MainAssets/img/logo/$logo") }}" alt="logo" class="logo-sm" style="max-width:50px">
                           @endforeach
                        </a>
                     </div>
                     <div class="tp-footer-widget-content">
                        <p class="mb-40">We focus on innovative strategies that emphasize the use of environmental re-engineering as a veritable tool for job creation, poverty eradication, food security, sustainable economic development and general improvement in the livelihood of Nigerians.</p>
                        <a class="tp-btn white-anim" href="about.html">KNOW MORE</a>
                     </div>
                  </div>
               </div>
               <div class="col-xl-2 col-lg-4 col-md-6 mb-50 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".5s">
                  <div class="tp-footer-widget footer-col-2">
                     <h4 class="tp-footer-widget-title">Useful Links</h4>
                     <div class="tp-footer-widget-menu">
                        <ul>
                           <li><a href="#">About us</a></li>
                           <li><a href="#">Our Team</a></li>
                           <li><a href="#">Upcoming Events</a></li>
                           <li><a href="#">Latest News</a></li>
                           <li><a href="#">Contact Us</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-lg-4 col-md-6 mb-50 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".7s">
                  <div class="tp-footer-widget footer-col-3">
                     <h4 class="tp-footer-widget-title">Instagram</h4>
                     <div class="tp-footer-widget-instagram">
                        <ul>
                           @foreach([1,2,3,4,1,2] as $i)
                              <li>
                                 <a href="#">
                                    <img src="assets/img/instagram/insta-{{ $i }}.jpg" alt="">
                                    <i class="fa-brands fa-instagram"></i>
                                 </a>
                              </li>
                           @endforeach
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-6 col-md-6 mb-50 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".9s">
                  <div class="tp-footer-widget footer-col-4">
                     <h4 class="tp-footer-widget-title">News & Updates</h4>
                     <div class="tp-footer-widget-content">
                        <p class="mb-25">The latest Mayorx news, articles, and resources sent straight to your inbox every month</p>
                     </div>
                     <form action="#">
                        <div class="tp-footer-mail-box p-relative">
                           <input type="text" placeholder="Your Email">
                           <button class="tp-btn-subscribe-sm">SUBSCRIBE</button>
                        </div>
                        <div class="tp-footer-check-box">
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                 I agree that my data is collected
                              </label>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Copyright -->
      <div class="tp-copyright-area tp-copyright-space green-bg pt-25 pb-25">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                  <div class="tp-copyright-left-text text-center text-md-start">
                     <p>© Copyright 2025 by <a href="#">Elite Tech. Dev.</a></p>
                  </div>
               </div>
               <div class="col-xl-6 col-lg-6 col-md-6 d-none col-sm-6 d-sm-block">
                  <div class="tp-copyright-right-social text-center text-md-end">
                     @foreach(['facebook-f', 'pinterest-p', 'instagram', 'twitter'] as $icon)
                        <a href="#"><i class="fa-brands fa-{{ $icon }}"></i></a>
                     @endforeach
                  </div>
               </div>
            </div>
         </div>
      </div>
   </footer>

   <!-- JS -->
   <script data-cfasync="false" src="{{ asset('MainAssets/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script>
   <script src="{{ asset('MainAssets/js/vendor/jquery.js') }}"></script>
   @foreach([
      'vendor/waypoints', 'bootstrap-bundle', 'meanmenu', 'gsap.min', 'ScrollTrigger.min', 'split-text.min',
      'swiper-bundle', 'slick', 'range-slider', 'magnific-popup', 'nice-select', 'purecounter', 'countdown',
      'jequery-knob', 'jequery-appear', 'wow', 'jarallax', 'isotope-pkgd', 'imagesloaded-pkgd', 'ajax-form', 'main'
   ] as $js)
      <script src="{{ asset("MainAssets/js/$js.js") }}"></script>
   @endforeach
   @yield('scripts')
</body>
</html>
