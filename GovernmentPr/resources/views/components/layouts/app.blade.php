<!doctype html>
<html class="no-js" lang="zxx">

<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title> @yield('PageTitle') – Federal Ministry of Environment </title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Place favicon.ico in the root directory -->
   <link rel="shortcut icon" type="image/x-icon" href="{{asset('MainAssets/img/logo/icon-100x100.png')}}" sizes="32x32">

   <!-- CSS here -->
   <link rel="stylesheet" href="{{asset('MainAssets/css/bootstrap.css')}}">
   <link rel="stylesheet" href="{{asset('MainAssets/css/animate.css')}}">
   <link rel="stylesheet" href="{{asset('MainAssets/css/swiper-bundle.css')}}">
   <link rel="stylesheet" href="{{asset('MainAssets/css/slick.css')}}">
   <link rel="stylesheet" href="{{asset('MainAssets/css/flaticon_statex.css')}}">
   <link rel="stylesheet" href="{{asset('MainAssets/css/magnific-popup.css')}}">
   <link rel="stylesheet" href="{{asset('MainAssets/css/font-awesome-pro.css')}}">
   <link rel="stylesheet" href="{{asset('MainAssets/css/spacing.css')}}">
   <link rel="stylesheet" href="{{asset('MainAssets/css/custom-animation.css')}}">
   <link rel="stylesheet" href="{{asset('MainAssets/css/main.css')}}">

</head>

<body>

   <!-- pre loader area start -->
   <div id="loading">
      <div id="loading-center">
         <div id="loading-center-absolute">
            <div class="object" id="object_four"></div>
            <div class="object" id="object_three"></div>
            <div class="object" id="object_two"></div>
            <div class="object" id="object_one"></div>
         </div>
      </div>
   </div>
   <!-- pre loader area end -->

   <!-- back to top start -->
   <div class="back-to-top-wrapper">
      <button id="back_to_top" type="button" class="back-to-top-btn">
         <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
               stroke-linejoin="round" />
         </svg>
      </button>
   </div>
   <!-- back to top end -->

   <!-- search popup start -->
   <div class="search__popup">
      <div class="container">
         <div class="row">
            <div class="col-xxl-12">
               <div class="search__wrapper">
                  <div class="search__top d-flex justify-content-between align-items-center">
                     <div class="search__logo">
                        <a href="index.html">
                           <img src="{{asset('MainAssets/img/logo/fme-logo.png')}}" alt="">
                        </a>
                     </div>
                     <div class="search__close">
                        <button type="button" class="search__close-btn search-close-btn">
                           <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                              xmlns="http://www.w3.org/2000/svg">
                              <path d="M17 1L1 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                 stroke-linejoin="round" />
                              <path d="M1 1L17 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                 stroke-linejoin="round" />
                           </svg>
                        </button>
                     </div>
                  </div>
                  <div class="search__form">
                     <form action="index.html#">
                        <div class="search__input">
                           <input class="search-input-field" type="text" placeholder="Type here to search...">
                           <span class="search-focus-border"></span>
                           <button type="submit">
                              <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <path
                                    d="M9.55 18.1C14.272 18.1 18.1 14.272 18.1 9.55C18.1 4.82797 14.272 1 9.55 1C4.82797 1 1 4.82797 1 9.55C1 14.272 4.82797 18.1 9.55 18.1Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                 <path d="M19.0002 19.0002L17.2002 17.2002" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
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
   <!-- search popup end -->

   <!-- tp-offcanvus-area-start -->
   <div class="tpoffcanvas-area">
      <div class="tpoffcanvas">
         <div class="tpoffcanvas__close-btn">
            <button class="close-btn"><i class="fal fa-times"></i></button>
         </div>
         <div class="tpoffcanvas__logo">
            <a href="index.html">
               <img src="{{asset('MainAssets/img/logo/logo-white.png')}}" alt="">
            </a>
         </div>
         <div class="tpoffcanvas__title">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima incidunt eaque ab cumque, porro maxime
               autem sed.</p>
         </div>
         <div class="tp-main-menu-mobile d-xl-none"></div>
         <div class="tpoffcanvas__contact-info">
            <div class="tpoffcanvas__contact-title">
               <h5>Contact us</h5>
            </div>
            <ul>
               <li>
                  <i class="fa-light fa-location-dot"></i>
                  <a href="https://www.google.com/maps/@23.8223586,90.3661283,15z" target="_blank">Melbone st,
                     Australia, Ny 12099</a>
               </li>
               <li>
                  <i class="fas fa-envelope"></i>
                  <a href="https://template.wphix.com/cdn-cgi/l/email-protection#70031f1c11021514171530171d11191c5e131f1d"><span class="__cf_email__" data-cfemail="f88c909d959d888d8a9db89f95999194d69b9795">[email&#160;protected]</span></a>
               </li>
               <li>
                  <i class="fal fa-phone-alt"></i>
                  <a href="tel:+48555223224">+48 555 223 224</a>
               </li>
            </ul>
         </div>
         <div class="tpoffcanvas__input">
            <div class="tpoffcanvas__input-title">
               <h4>Get UPdate</h4>
            </div>
            <form action="index.html#">
               <div class="p-relative">
                  <input type="text" placeholder="Enter mail">
                  <button>
                     <i class="fas fa-paper-plane"></i>
                  </button>
               </div>
            </form>
         </div>
         <div class="tpoffcanvas__social">
            <div class="social-icon">
               <a href="index.html#"><i class="fab fa-twitter"></i></a>
               <a href="index.html#"><i class="fab fa-instagram"></i></a>
               <a href="index.html#"><i class="fab fa-facebook-f"></i></a>
               <a href="index.html#"><i class="fab fa-pinterest-p"></i></a>
            </div>
         </div>
      </div>
   </div>
   <div class="body-overlay"></div>
   <!-- tp-offcanvus-area-end -->

   <header class="tp-header-height">

      <!-- header top area start -->
      <div class="tp-header-top__area tp-header-top__space d-none d-md-block theme-bg-2">
         <div class="container-fluid">
            <div class="row">
               <div class="col-xl-6 col-lg-7 col-md-9">
                  <div class="tp-header-top__left-info">
                     <ul>
                        <li>
                           <i class="flaticon-map"></i>
                           <a href="https://www.google.com/maps/@23.822337,90.3654296,15z?entry=ttu" target="_blank">76
                              San Fransisco Street. New York</a>
                        </li>
                        <li>
                           <i class="flaticon-envelope"></i>
                           <a href="https://template.wphix.com/cdn-cgi/l/email-protection#630d0606070b060f1323000c0e13020d1a4d000c0e"><span class="__cf_email__" data-cfemail="630d0606070b060f1323000c0e13020d1a4d000c0e">[email&#160;protected]</span></a>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="col-xl-6 col-lg-5 col-md-3">
                  <div class="tp-header-top__right-wrap d-flex align-items-center justify-content-end">
                     <div class="tp-header-top__right-info d-none d-xl-block">
                        <span>Council</span>
                        <span><em>/</em>Goverment</span>
                        <span><em>/</em>Complaints</span>
                     </div>
                     <div class="tp-header-top__right-social">
                        <a href="index.html#"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="index.html#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="index.html#"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="index.html#"><i class="fa-brands fa-twitter"></i></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- header top area end -->

      <!-- header area end -->
      <div id="header-sticky" class="tp-header-area tp-header-plr">
         <div class="container-fluid">
            <div class="row align-items-center">
               <div class="col-xxl-2 col-xl-2 col-lg-6 col-md-6 col-8">
                  <div class="tp-header-logo">
                     <a href="index.html"><img src="{{asset('MainAssets/img/logo/fme-logo.png')}}" alt=""></a>
                  </div>
               </div>
               <div class="col-xxl-6 col-xl-7 d-none d-xl-block">
                  <div class="tp-header-menu">
                     <nav class="tp-main-menu-content">
                        <ul>
                           <li class="has-dropdown">
                              <a href="index.html">HOME</a>
  
                           </li>
                           <li class="has-dropdown">
                              <a href="service.html">ABOUT US</a>
                              <ul class="tp-submenu submenu">
                                 <li><a href="">MANDATE</a></li>
                                 <li><a href="">ORGANIZATION</a></li>
                                 <li><a href="">LEADERSHIP</a></li>
                                 <li><a href="">CAREER</a></li>
                              </ul>
                           </li>
                           <li class="has-dropdown">
                              <a href="service.html">DEPARTMENTS</a>
                              <ul class="tp-submenu submenu">
                                 <li><a href="">AUDIT</a></li>
                                 <li><a href="">CLIMATE CHANGE</a></li>
                              </ul>
                           </li>
                           <li class="has-dropdown">
                              <a href="service.html">INITIATIVES</a>
                              <ul class="tp-submenu submenu">
                                 <li><a href="">ACRSEAL</a></li>
                                 <li><a href="">CLEAN AND GREEN INITIATIVE</a></li>
                              </ul>
                              
                           </li>
                           
                          
                           <li class="has-dropdown">
                              <a href="index.html#">MORE</a>
                              <ul class="tp-submenu submenu">
                              <li class="has-dropdown">
                                 <a href="blog.html">EVENTS & NEWS</a>
                              </li>
                              <li class="has-dropdown">
                                 <a href="blog.html">AGENCIES</a>
                              </li>
                              <li class="has-dropdown">
                                 <a href="blog.html">MEDIA & FOLLOWING</a>
                              </li>
                                 
                              
                              </ul>
                           </li>
                           <li><a href="contact.html">CONTACT</a></li>
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
                        <div class="tp-header-right-btn d-none d-sm-block">
                           <a class="tp-btn" href="{{route('login')}}"> LOGIN </a>
                        </div>
                        <div class="tp-header-right-tel-icon-box d-none d-xxl-block">
                           <div class="tp-header-right-tel-icon d-flex align-items-center">
                              <i class="flaticon-phone-call-1"></i>
                              <div class="tp-header-right-tel-content">
                                 <span>Call Us</span>
                                 <a href="tel:(00)122456789">(00) 122 456 789</a>
                              </div>
                           </div>
                        </div>                     
                        <div class="tp-header-bar d-xl-none text-end">
                           <button class="tp-menu-bar">
                               <i class="fa-light fa-bars-staggered"></i>
                           </button>
                       </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- header area end -->


   </header>

   @yield('pageContent')

   <footer>
   
      <!-- footer-top area start -->
      <div id="footer-one-page" class="tp-footer-top-area tp-footer-top-bdr-bottom pt-35 theme-bg-2">
         <div class="container">
            <div class="row">
               <div class="col-xl-4 col-lg-4 col-md-6">
                  <div class="tp-footer-top-item tp-footer-top-space-1 d-flex align-items-center">
                     <div class="tp-footer-top-info-icon">
                        <i class="flaticon-globe"></i>
                     </div>
                     <div class="tp-footer-top-info">
                        <h4 class="tp-footer-top-info-title">Address</h4>
                        <span>
                           <a href="https://www.google.com.bd/maps/@23.7806365,90.4193257,12z?hl=en&entry=ttu"
                              target="_blank">420 Kalapani Road, Mirpur 12 kingston, Bangladesh
                           </a>
                        </span>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-4 col-md-6">
                  <div class="tp-footer-top-item tp-footer-top-space-2 d-flex align-items-center">
                     <div class="tp-footer-top-info-icon">
                        <i class="flaticon-email"></i>
                     </div>
                     <div class="tp-footer-top-info">
                        <h4 class="tp-footer-top-info-title">Contact</h4>
                        <span>
                           <a href="https://template.wphix.com/cdn-cgi/l/email-protection#493a3d283d2c31212c253920272f26092e24282025672a2624"><span class="__cf_email__" data-cfemail="285b5c495c4d50404d445841464e47684f45494144064b4745">[email&#160;protected]</span></a>
                        </span>
                        <span>
                           <a href="tel:+88(3265)56720">+88 (3265) 56720</a>
                        </span>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-4 col-md-6">
                  <div class="tp-footer-top-item tp-footer-top-space-3 d-flex align-items-center">
                     <div class="tp-footer-top-info-icon">
                        <i class="flaticon-fast-time"></i>
                     </div>
                     <div class="tp-footer-top-info">
                        <h4 class="tp-footer-top-info-title">Clock</h4>
                        <span>
                           Mon - Sat 8 am - 5 pm
                           Friday: Closed
                        </span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- footer-top area end -->
   
      <!-- footer area start -->
      <div class="tp-footer-area theme-bg-2 pt-110 pb-60 p-relative z-index">
         <div class="tp-footer-shape">
            <img src="assets/img/footer/footer-shape.png" alt="">
         </div>
         <div class="container">
            <div class="row">
               <div class="col-xl-3 col-lg-4 col-md-6 mb-50 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                  <div class="tp-footer-widget footer-col-1">
                     <div class="tp-footer-widget-logo">
                        <a href="index.html"><img src="assets/img/logo/logo-white.png" alt=""></a>
                     </div>
                     <div class="tp-footer-widget-content">
                        <p class="mb-40">Desires to obtain pain of it because it is pain, but occasionally circum
                           We work with a passion of
                        </p>
                        <a class="tp-btn white-anim" href="about.html">KNOW MORE</a>
                     </div>
                  </div>
               </div>
               <div class="col-xl-2 col-lg-4 col-md-6 mb-50 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".5s">
                  <div class="tp-footer-widget footer-col-2">
                     <h4 class="tp-footer-widget-title">Usefull Links</h4>
                     <div class="tp-footer-widget-menu">
                        <ul>
                           <li><a href="index.html#">About us</a></li>
                           <li><a href="index.html#">Our Team</a></li>
                           <li><a href="index.html#">Upcoming Events</a></li>
                           <li><a href="index.html#">Latest News</a></li>
                           <li><a href="index.html#">Contact Us</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-lg-4 col-md-6 mb-50 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".7s">
                  <div class="tp-footer-widget footer-col-3">
                     <h4 class="tp-footer-widget-title">Instagram</h4>
                     <div class="tp-footer-widget-instagram">
                        <ul>
                           <li>
                              <a href="index.html#">
                                 <img src="assets/img/instagram/insta-1.jpg" alt="">
                                 <i class="fa-brands fa-instagram"></i>
                              </a>
                           </li>
                           <li>
                              <a href="index.html#">
                                 <img src="assets/img/instagram/insta-2.jpg" alt="">
                                 <i class="fa-brands fa-instagram"></i>
                              </a>
                           </li>
                           <li>
                              <a href="index.html#">
                                 <img src="assets/img/instagram/insta-3.jpg" alt="">
                                 <i class="fa-brands fa-instagram"></i>
                              </a>
                           </li>
                           <li>
                              <a href="index.html#">
                                 <img src="assets/img/instagram/insta-4.jpg" alt="">
                                 <i class="fa-brands fa-instagram"></i>
                              </a>
                           </li>
                           <li>
                              <a href="index.html#">
                                 <img src="assets/img/instagram/insta-1.jpg" alt="">
                                 <i class="fa-brands fa-instagram"></i>
                              </a>
                           </li>
                           <li>
                              <a href="index.html#">
                                 <img src="assets/img/instagram/insta-2.jpg" alt="">
                                 <i class="fa-brands fa-instagram"></i>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-6 col-md-6 mb-50 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".9s">
                  <div class="tp-footer-widget footer-col-4">
                     <h4 class="tp-footer-widget-title">News & Updates</h4>
                     <div class="tp-footer-widget-content">
                        <p class="mb-25">
                           The latest Mayorx news, articles, and resources
                           sent straight to your inbox every month
                        </p>
                     </div>
                     <form action="index.html#">
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
      <!-- footer area end -->
   
      <!-- copy-right area start -->
      <div class="tp-copyright-area tp-copyright-space green-bg pt-25 pb-25">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                  <div class="tp-copyright-left-text text-center text-md-start">
                     <p>© Copyright 2023 by <a href="index.html#">Mayorx.com</a></p>
                  </div>
               </div>
               <div class="col-xl-6 col-lg-6 col-md-6 d-none col-sm-6 d-sm-block">
                  <div class="tp-copyright-right-social text-center text-md-end">
                     <a href="index.html#"><i class="fa-brands fa-facebook-f"></i></a>
                     <a href="index.html#"><i class="fa-brands fa-pinterest-p"></i></a>
                     <a href="index.html#"><i class="fa-brands fa-instagram"></i></a>
                     <a href="index.html#"><i class="fa-brands fa-twitter"></i></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- copy-right area end -->
   
   </footer>



   <!-- JS here -->
   <script data-cfasync="false" src="{{ asset('MainAssets/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}"></script><script src="assets/js/vendor/jquery.js"></script>
   <script src="{{ asset('MainAssets/js/vendor/jquery.js')}}"></script>
   <script src="{{asset('MainAssets/js/vendor/waypoints.js')}}"></script>
   <script src="{{asset('MainAssets/js/bootstrap-bundle.js')}}"></script>
   <script src="{{asset('MainAssets/js/meanmenu.js')}}"></script>
   <script src="{{asset('MainAssets/js/gsap.min.js')}}"></script>
   <script src="{{asset('MainAssets/js/ScrollTrigger.min.js')}}"></script>
   <script src="{{asset('MainAssets/js/split-text.min.js')}}"></script>
   <script src="{{asset('MainAssets/js/swiper-bundle.js')}}"></script>
   <script src="{{asset('MainAssets/js/slick.js')}}"></script>
   <script src="{{asset('MainAssets/js/range-slider.js')}}"></script>
   <script src="{{asset('MainAssets/js/magnific-popup.js')}}"></script>
   <script src="{{asset('MainAssets/js/nice-select.js')}}"></script>
   <script src="{{asset('MainAssets/js/purecounter.js')}}"></script>
   <script src="{{asset('MainAssets/js/countdown.js')}}"></script>
   <script src="{{asset('MainAssets/js/jequery-knob.js')}}"></script>
   <script src="{{asset('MainAssets/js/jequery-appear.js')}}"></script>
   <script src="{{asset('MainAssets/js/wow.js')}}"></script>
   <script src="{{asset('MainAssets/js/jarallax.js')}}"></script>
   <script src="{{asset('MainAssets/js/isotope-pkgd.js')}}"></script>
   <script src="{{asset('MainAssets/js/imagesloaded-pkgd.js')}}"></script>
   <script src="{{asset('MainAssets/js/ajax-form.js')}}"></script>
   <script src="{{asset('MainAssets/js/main.js')}}"></script>
</body>

</html>