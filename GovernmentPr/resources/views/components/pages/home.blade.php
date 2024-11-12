@extends('components.layouts.app')
@section('PageTitle', 'Home')
@section('pageContent')
<main>

<!-- hero area start -->
<div class="tp-slider-area">
   <div class="tp-slider-wrapper p-relative">
      <div class="tp-slider-meta-box d-none d-md-block">
         <div class="tp-slider-meta d-flex align-items-center">
            <div class="tp-slider-meta-icon">
               <i class="flaticon-sun"></i>
            </div>
            <div class="tp-slider-meta-content">
               <span>30°C<br>12:14 Local Time</span>
            </div>
         </div>
      </div>
      <div class="tp-slider-arrow-box">
         <button class="slider-prev"><i class="fa-regular fa-arrow-left"></i></button>
         <button class="slider-next"><i class="fa-regular fa-arrow-right"></i></button>
      </div>
      <div class="tp-slider-shape-5">
         <img src="{{asset('MainAssets/img/slider/slider-new1.png')}}"  alt="">
      </div>
      <div class="swiper-container tp-slider-active">
         <div class="swiper-wrapper">
            <div class="swiper-slide">
               <div class="tp-slider-bg d-flex justify-content-center align-items-center p-relative fix">
                  <div class="tp-slider-img" data-background="{{asset('MainAssets/img/slider/slider-1.jpg')}}"></div>
                  <div class="tp-slider-shape-1 z-index-1">
                     <img src="{{asset('MainAssets/img/slider/slider-shape-1-1.png')}}" alt="">
                  </div>
                  <div class="tp-slider-shape-2 z-index-2">
                     <img src="{{asset('MainAssets/img/slider/slider-shape-1-3.png')}}" alt="">
                  </div>
                  <div class="tp-slider-shape-3 z-index-1">
                     <img src="{{asset('MainAssets/img/slider/slider-shape-1-2.png')}}" alt="">
                  </div>
                  <div class="container">
                     <div class="row">
                        <div class="col-xl-9">
                           <div class="tp-slider-content-wrap p-relative z-index-2">
                              <div class="tp-slider-shape-4">
                                 <img src="{{asset('MainAssets/img/slider/slider-shape-1-4.png')}}" alt="">
                              </div>
                              <div class="tp-slider-title-box p-relative">
                                 <span class="tp-slider-subtitle">OUR VISION</span>
                                 <h4 class="tp-slider-title">To be a nation that develops in harmony with its environment</p>
                              </div>
                              <div class="tp-slider-video-box d-flex align-items-center">
                                 <div class="tp-slider-btn">
                                    <a class="tp-btn-xl mr-30" href="about.html">Discover More</a>
                                 </div>
                                 <div class="tp-slider-video d-flex align-items-center">
                                    <a class="popup-video video-animation" href="https://www.youtube.com/watch?v=R6rchakWh5Q"><i class="fa-sharp fa-light fa-play"></i></a>
                                    <span>Watch Our <br> Showcase</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="swiper-slide">
               <div class="tp-slider-bg d-flex justify-content-center align-items-center p-relative fix">
                  <div class="tp-slider-img" data-background="{{asset('MainAssets/img/slider/slider-2.jpg')}}"></div>
                  <div class="tp-slider-shape-1 z-index-1">
                     <img src="{{asset('MainAssets/img/slider/slider-shape-1-1.png')}}" alt="">
                  </div>
                  <div class="tp-slider-shape-2 z-index-2">
                     <img src="{{asset('MainAssets/img/slider/slider-shape-1-3.png')}}" alt="">
                  </div>
                  <div class="tp-slider-shape-3 z-index-1">
                     <img src="{{asset('MainAssets/img/slider/slider-shape-1-2.png')}}" alt="">
                  </div>
                  <div class="container">
                     <div class="row">
                        <div class="col-xl-9">
                           <div class="tp-slider-content-wrap p-relative z-index-2">
                              <div class="tp-slider-shape-4">
                                 <img src="{{asset('MainAssets/img/slider/slider-shape-1-4.png')}}" alt="">
                              </div>
                              <div class="tp-slider-title-box p-relative">
                                 <span class="tp-slider-subtitle">OUR VISION</span>
                                 <h4 class="tp-slider-title">To be a nation that develops in harmony with its environment</p>
                              </div>
                              <div class="tp-slider-video-box d-flex align-items-center">
                                 <div class="tp-slider-btn">
                                    <a class="tp-btn-xl mr-30" href="about.html">Discover More</a>
                                 </div>
                                 <div class="tp-slider-video d-flex align-items-center">
                                    <a class="popup-video video-animation" href="https://www.youtube.com/watch?v=K527oNxtO7o"><i class="fa-sharp fa-light fa-play"></i></a>
                                    <span>Watch Our <br> Showcase</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="swiper-slide">
               <div class="tp-slider-bg d-flex justify-content-center align-items-center p-relative fix">
                  <div class="tp-slider-img" data-background="{{asset('MainAssets/img/slider/slider-3.jpg')}}"></div>
                  <div class="tp-slider-shape-1 z-index-1">
                     <img src="{{asset('MainAssets/img/slider/slider-shape-1-1.png')}}" alt="">
                  </div>
                  <div class="tp-slider-shape-2 z-index-2">
                     <img src="{{asset('MainAssets/img/slider/slider-shape-1-3.png')}}" alt="">
                  </div>
                  <div class="tp-slider-shape-3 z-index-1">
                     <img src="assets/i{{asset('MainAssets/mg/slider/slider-shape-1-2.png')}}" alt="">
                  </div>
                  <div class="container">
                     <div class="row">
                        <div class="col-xl-9">
                           <div class="tp-slider-content-wrap p-relative z-index-2">
                              <div class="tp-slider-shape-4">
                                 <img src="{{asset('MainAssets/img/slider/slider-shape-1-4.png')}}" alt="">
                              </div>
                             <div class="tp-slider-title-box p-relative">
                                 <span class="tp-slider-subtitle">OUR VISION</span>
                                 <h4 class="tp-slider-title">To be a nation that develops in harmony with its environment</p>
                              </div>
                              <div class="tp-slider-video-box d-flex align-items-center">
                                 <div class="tp-slider-btn">
                                    <a class="tp-btn-xl mr-30" href="about.html">Discover More</a>
                                 </div>
                                 <div class="tp-slider-video d-flex align-items-center">
                                    <a class="popup-video video-animation" href="https://www.youtube.com/watch?v=K527oNxtO7o"><i class="fa-sharp fa-light fa-play"></i></a>
                                    <span>Watch Our <br> Showcase</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- hero area end -->

<!-- feature area start -->
<div id="feature-one-page" class="tp-feature-area pt-130 pb-110 p-relative z-index grey-bg-2">
   <div class="tp-feature-shape-1 d-none d-xxl-block">
      <img src="{{asset('MainAssets/img/feature/ab-shape-2.png')}}" alt="">
   </div>
   <div class="tp-feature-shape-2">
      <img src="{{asset('MainAssets/img/feature/ab-bg.png')}}" alt="">
   </div>
   <div class="container">
      <div class="row row-cols-xl-5 row-cols-lg-3 justify-content-center justify-content-xl-start">
         <div class="col col-sm-6 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
            <div class="tp-feature-item mb-30 text-center">
               <div class="tp-feature-icon">
               <i class="fas fa-rocket mission-icon"></i>
               </div>
               <div class="tp-feature-content">
                  <h4 class="tp-feature-title-sm">OUR MISSION</h4>
                  <!-- <p>How We Serve Our Fatherland</p> -->
               </div>
            </div>
         </div>
         <div class="col col-sm-6 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".5s">
            <div class="tp-feature-item mb-30 text-center">
               <div class="tp-feature-icon">
               <i class="fa fa-recycle" aria-hidden="true"></i>

               </div>
               <div class="tp-feature-content">
                  <h4 class="tp-feature-title-sm">ENVIRONMENTAL PROTECTION</h4>
                  <!-- <p>Through environmental standards regulation and enforcement.</p> -->
               </div>
            </div>
         </div>
         <div class="col col-sm-6 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".7s">
            <div class="tp-feature-item mb-30 text-center">
               <div class="tp-feature-icon">
               <i class="fa fa-water" aria-hidden="true"></i>


               </div>
               <div class="tp-feature-content">
                  <h4 class="tp-feature-title-sm">Natural Resources Conservation</h4>
                  <!-- <h5>Through forestry research and national park service.</h5> -->
               </div>
            </div>
         </div>
         <div class="col col-sm-6 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".9s">
            <div class="tp-feature-item mb-30 text-center">
               <div class="tp-feature-icon">
               <i class="fa fa-building" aria-hidden="true"></i>

               </div>
               <div class="tp-feature-content">
                  <h4 class="tp-feature-title-sm">SUSTAINABLE DEVELOPMENT</h4>
               </div>
            </div>
         </div>
         <div class="col col-sm-6 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay="1s">
            <div class="tp-feature-item mb-30 text-center">
               <div class="tp-feature-icon">
               <i class="fa fa-hands-helping" aria-hidden="true"></i>

               </div>
               <div class="tp-feature-content">
                  <h4 class="tp-feature-title-sm">COMMUNITY INVOLVEMENT</h4>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- feature area end -->

<!-- about area start -->
<div id="about-one-page" class="tp-about-area fix pt-120">
   <div class="container">
      <div class="row">
         <div class="col-xl-10">
            <div class="tp-about-title-box mb-45">
               <h4 class="tp-section-subtitle">OUR MANDATE</h4>
            </div>
         </div>
      </div>
      <div class="tp-about-right-wrap pb-120 p-relative">
         <div class="tp-about-shape d-none d-xl-block">
            <img src="{{asset('MainAssets/img/about/ab-shape-1.png')}}" alt="">
         </div>
         <div class="tp-about-right-img d-none d-xl-block wow tpfadeRight " data-wow-duration=".9s" data-wow-delay=".3s">
            <img src="{{asset('MainAssets/img/about/minister2.png')}}" alt="">
         </div>
         <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-12">
               <div class="tp-about-feature-box">
                  <h4 class="tp-about-feature-title">Ministerial focal points</h4>
                  <div class="tp-about-feature-list">
                     <ul>
                        <li><a href="#">Quality Environment</a></li>
                        <li><a href="#">Sustainability</a></li>
                        <li><a href="#">Restoration</a></li>
                        <li><a href="#">Public Awareness</a></li>
                        <li><a href="#">Collaborations</a></li>
                     </ul>
                  </div>
                  <div class="tp-about-feature-btn">
                     <a class="tp-btn-purple" href="service.html">KNOW MORE</a>
                  </div>
               </div>
            </div>
            <div class="col-xl-6 col-lg-8 col-md-12">
               <div class="tp-about-content-wrap p-relative">
                  <div class="tp-about-text">
                     <p>We focus on protecting the environment, promoting sustainability, and addressing climate change.

                     </p>
                  </div>
                  <div class="tp-about-city-info d-flex align-items-center">
                     <i class="flaticon-smart-city"></i>
                     <span>How We Serve Our Fatherland</span>
                  </div>
                  <div class="tp-about-progress p-relative">
                     <span class="progress-label">City Development</span>
                     <span class="progress-count">92%</span>
                     <div class="progress">
                        <div class="progress-bar wow slideInLeft" data-wow-duration="1s" data-wow-delay=".3s"
                           role="progressbar" data-width="92%" aria-valuenow="25" aria-valuemin="0"
                           aria-valuemax="100"
                           style="width: 58%; visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: slideInLeft;">
                        </div>
                     </div>
                  </div>
                  <!-- <div class="tp-about-tel-info d-flex align-items-center">
                     <div class="tp-about-tel-box mr-100 d-flex align-items-center">
                        <div class="tp-about-tel-icon">
                           <span><i class="flaticon-phone-call-1"></i></span>
                        </div>
                        <div class="tp-about-tel-number">
                           <span>Call Us</span>
                           <a href="tel:(00)122456789">(00) 122 456 789</a>
                        </div>
                     </div>
                     <div class="tp-about-signature">
                        <img src="{{asset('MainAssets/img/about/signature.png')}}" alt="">
                     </div>
                  </div> -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- about area end -->

<!-- service area start -->
<div id="service-one-page" class="tp-service-area p-relative theme-bg-2 pt-120 pb-90">
   <!-- <div class="tp-service-shape-1 d-none d-lg-block">
      <img src="{{asset('MainAssets/img/service/sv-flag.png')}}" alt="">
   </div> -->
   <div class="container custom-container">
      <div class="row">
         <div class="col-xl-12">
            <div class="tp-service-title-box text-center mb-70">
               <span class="tp-section-subtitle">OUR DEPERTMENTS</span>
               <h4 class="tp-section-title text-white">Explore our departments</h4>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xl-3 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
            <div class="tp-service-item p-relative">
               <div class="tp-service-shape">
                  <img src="{{asset('MainAssets/img/service/sv-item-shape.png')}}" alt="">
               </div>
               <div class="tp-service-icon">
                  <i class="flaticon-approved"></i>
               </div>
               <div class="tp-service-content">
                  <h4 class="tp-service-title-sm"><a href="service-details.html">Audit</a></h4>
                  <p>
                  The Audit department ensures transparency and accuracy in our operations.
                  </p>
               </div>
               <div class="tp-service-link">
                  <a href="#">Read More <i class="fa-light fa-arrow-right"></i></a>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".5s">
            <div class="tp-service-item p-relative">
               <div class="tp-service-shape">
                  <img src="{{asset('MainAssets/img/service/sv-item-shape.png')}}" alt="">
               </div>
               <div class="tp-service-icon">
               <i class="fa fa-wind" aria-hidden="true"></i>

               </div>
               <div class="tp-service-content">
                  <h4 class="tp-service-title-sm"><a href="service-details.html">Climate Change</a></h4>
                  <p>
                  Dedicated to addressing the impacts of climate change through research, advocacy, and action. 
                  </p>
               </div>
               <div class="tp-service-link">
                  <a href="#">Read More <i class="fa-light fa-arrow-right"></i></a>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".7s">
            <div class="tp-service-item p-relative">
               <div class="tp-service-shape">
                  <img src="{{asset('MainAssets/img/service/sv-item-shape.png')}}" alt="">
               </div>
               <div class="tp-service-icon">
               <i class="fa fa-file-invoice" aria-hidden="true"></i>

               </div>
               <div class="tp-service-content">
                  <h4 class="tp-service-title-sm"><a href="service-details.html">Finance & Accounts </a></h4>
                  <p>
                  Ensures accurate financial records, supports strategic planning, and maintains financial health.
                  </p>
               </div>
               <div class="tp-service-link">
                  <a href="#">Read More <i class="fa-light fa-arrow-right"></i></a>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".9s">
            <div class="tp-service-item p-relative">
               <div class="tp-service-shape">
                  <img src="{{asset('MainAssets/img/service/sv-item-shape.png')}}" alt="">
               </div>
               <div class="tp-service-icon">
               <i class="fas fa-briefcase"></i>
               </div>
               <div class="tp-service-content">
                  <h4 class="tp-service-title-sm"><a href="service-details.html">General Services </a></h4>
                  <p>
                  Provides essential support functions to ensure smooth operations within an organization. 
                  </p>
               </div>
               <div class="tp-service-link">
                  <a href="#">Read More <i class="fa-light fa-arrow-right"></i></a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- service area end -->

<!-- event area start -->
<div class="tp-event-area pt-120 pb-90 p-relative grey-bg-2">
   <div class="container">
      <div class="tp-event-title-wrap mb-40">
         <div class="row justify-content-center">
            <div class="col-xl-8">
               <div class="tp-event-title-box text-center">
                  <span class="tp-section-subtitle">Latest events</span>
                  <h4 class="tp-section-title">Our ministerial activities</h4>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
            <div class="tp-event-item text-center">
               <div class="tp-event-thumb fix">
                  <img src="{{asset('MainAssets/img/event/min-event1.jpg')}}" height="200px" alt="">
               </div>
               <div class="tp-event-content-wrap">
                  <div class="tp-event-content">
                     <!-- <div class="tp-event-meta">
                        <span><i class="fa-regular fa-clock"></i>08:00 am</span>
                        <span><i class="fa-light fa-location-dot"></i><a
                              href="https://www.google.com/maps/@23.8202709,90.2804172,9z?entry=ttu"
                              target="_blank">Watsica 24, USA</a></span>
                     </div> -->
                     <h4 class="tp-event-title-sm"><a href="event-details.html">Environment Day 2024</a></h4>
                  </div>
                  <div class="tp-event-link">
                     <a href="event-details.html">Read More</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
            <div class="tp-event-item text-center">
               <div class="tp-event-thumb fix">
                  <img src="{{asset('MainAssets/img/event/min-event2.jpg')}}" alt="">
               </div>
               <div class="tp-event-content-wrap">
                  <div class="tp-event-content">
                     <!-- <div class="tp-event-meta">
                        <span><i class="fa-regular fa-clock"></i>08:00 am</span>
                        <span><i class="fa-light fa-location-dot"></i><a
                              href="https://www.google.com/maps/@23.8202709,90.2804172,9z?entry=ttu"
                              target="_blank">Watsica 24, USA</a></span>
                     </div> -->
                     <h4 class="tp-event-title-sm"><a href="event-details.html">Training or workshop</a></h4>
                  </div>
                  <div class="tp-event-link">
                     <a href="event-details.html">Read More</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
            <div class="tp-event-item text-center">
               <div class="tp-event-thumb fix">
                  <img src="{{asset('MainAssets/img/event/min-event3.jpg')}}" height="200px" alt="">
               </div>
               <div class="tp-event-content-wrap">
                  <div class="tp-event-content">
                     <!-- <div class="tp-event-meta">
                        <span><i class="fa-regular fa-clock"></i>08:00 am</span>
                        <span><i class="fa-light fa-location-dot"></i><a
                              href="https://www.google.com/maps/@23.8202709,90.2804172,9z?entry=ttu"
                              target="_blank">Watsica 24, USA</a></span>
                     </div> -->
                     <h4 class="tp-event-title-sm"><a href="event-details.html">Climate change dialouge</a></h4>
                  </div>
                  <div class="tp-event-link">
                     <a href="event-details.html">Read More</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- event area end -->

<!-- funfact area end -->
<div class="tp-funfact-2-area tp-funfact-2-bg pt-120 pb-90 p-relative" data-background="{{asset('MainAssets/img/funfact/funfact-bg.jpg')}}">
   <div class="container">
      <div class="row">
         <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
            <div class="tp-funfact-2-item z-index text-center">
               <div class="tp-funfact-2-icon p-relative">
                  <span><i class="flaticon-foundation"></i></span>
               </div>
               <div class="tp-funfact-2-content">
                  <h4><em data-purecounter-duration="1" data-purecounter-end="820" class="purecounter">0</em>+</h4>
                  <span>Years of Foundation</span>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".5s">
            <div class="tp-funfact-2-item z-index text-center">
               <div class="tp-funfact-2-icon p-relative">
                  <span><i class="flaticon-running-man"></i></span>
               </div>
               <div class="tp-funfact-2-content">
                  <h4><em data-purecounter-duration="1" data-purecounter-end="26" class="purecounter">0</em>k</h4>
                  <span>People in the City</span>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".7s">
            <div class="tp-funfact-2-item z-index text-center">
               <div class="tp-funfact-2-icon p-relative">
                  <span><i class="flaticon-landscape"></i></span>
               </div>
               <div class="tp-funfact-2-content">
                  <h4><em data-purecounter-duration="1" data-purecounter-end="46" class="purecounter">0</em>%</h4>
                  <span>Private Gardens Lands</span>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".9s">
            <div class="tp-funfact-2-item z-index text-center">
               <div class="tp-funfact-2-icon p-relative">
                  <span><i class="flaticon-windrose"></i></span>
               </div>
               <div class="tp-funfact-2-content">
                  <h4><em data-purecounter-duration="1" data-purecounter-end="920" class="purecounter">0</em>+</h4>
                  <span>Successful Rating</span>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- funfact area end -->

<!-- project area start -->
<div class="tp-project-area pt-120 fix">
   <div class="container">
      <div class="tp-project-top-wrap mb-40">
         <div class="row align-items-end">
            <div class="col-xl-7 col-lg-6">
               <div class="tp-project-title-box">
                  <span class="tp-section-subtitle">Latest events</span>
                  <h4 class="tp-section-title">Explore Our Latest Events</h4>
               </div>
            </div>
            <div class="col-xl-5 col-lg-6">
               <div class="tp-project-right-text">
                  <p>We focus on protecting the environment, promoting sustainability, and addressing climate change.
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="container-fluid">
      <div class="col-xl-12">
         <div class="tp-project-slider-wrap">
            <div class="swiper-container tp-project-slider-active">
               <div class="swiper-wrapper">
                  <div class="swiper-slide">
                     <div class="tp-project-item p-relative">
                        <div class="tp-project-thumb fix">
                           <img src="{{asset('MainAssets/img/event/event-sec2.jpeg')}}" alt="">
                        </div>
                        <div class="tp-project-content-wrap d-flex align-items-center justify-content-between">
                           <div class="tp-project-content">
                           <span>WORKSHOP & TRAINING</span>
                              <h4 class="tp-project-title-sm"><a href="portfolio-details.html">ABUJA</a></h4>
                           </div>
                           <div class="tp-project-icon">
                              <a href="portfolio-details.html"><i class="fa-regular fa-arrow-right"></i></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="swiper-slide">
                     <div class="tp-project-item p-relative">
                        <div class="tp-project-thumb fix">
                           <img src="{{asset('MainAssets/img/event/event-sec3.jpg')}}" alt="">
                        </div>
                        <div class="tp-project-content-wrap d-flex align-items-center justify-content-between">
                           <div class="tp-project-content">
                           <span>WORKSHOP & TRAINING</span>
                              <h4 class="tp-project-title-sm"><a href="portfolio-details.html">ABUJA</a></h4>
                           </div>
                           <div class="tp-project-icon">
                              <a href="portfolio-details.html"><i class="fa-regular fa-arrow-right"></i></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="swiper-slide">
                     <div class="tp-project-item p-relative">
                        <div class="tp-project-thumb fix">
                           <img src="{{asset('MainAssets/img/event/event-secv1.jpg')}}" alt="">
                        </div>
                        <div class="tp-project-content-wrap d-flex align-items-center justify-content-between">
                           <div class="tp-project-content">
                           <span>WORKSHOP & TRAINING</span>
                              <h4 class="tp-project-title-sm"><a href="portfolio-details.html">ABUJA</a></h4>
                           </div>
                           <div class="tp-project-icon">
                              <a href="portfolio-details.html"><i class="fa-regular fa-arrow-right"></i></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="swiper-slide">
                     <div class="tp-project-item p-relative">
                        <div class="tp-project-thumb fix">
                           <img src="{{asset('MainAssets/img/event/event-sec5.jpg')}}" alt="">
                        </div>
                        <div class="tp-project-content-wrap d-flex align-items-center justify-content-between">
                           <div class="tp-project-content">
                           <span>WORKSHOP & TRAINING</span>
                              <h4 class="tp-project-title-sm"><a href="portfolio-details.html">ABUJA</a></h4>
                           </div>
                           <div class="tp-project-icon">
                              <a href="portfolio-details.html"><i class="fa-regular fa-arrow-right"></i></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="swiper-slide">
                     <div class="tp-project-item p-relative">
                        <div class="tp-project-thumb fix">
                           <img src="{{asset('MainAssets/img/event/event-secv1.jpg')}}" alt="">
                        </div>
                        <div class="tp-project-content-wrap d-flex align-items-center justify-content-between">
                           <div class="tp-project-content">
                              <span>WORKSHOP & TRAINING</span>
                              <h4 class="tp-project-title-sm"><a href="portfolio-details.html">ABUJA</a></h4>
                           </div>
                           <div class="tp-project-icon">
                              <a href="portfolio-details.html"><i class="fa-regular fa-arrow-right"></i></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  
                 
                  
                                              
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- project area end -->

<!-- online-service area start -->
<div class="tp-online-area fix p-relative pt-120 pb-90">
   <div class="tp-online-right-shape">
      <img src="{{asset('MainAssets/img/event/event-right-bg.png')}}" alt="">
   </div>
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-xl-8">
            <div class="tp-online-title-box text-center mb-50">
               <h4 class="tp-section-title">Ministerial Initiatives</h4>
            </div>
         </div>
      </div>
      <div class="row gx-0 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
         <div class="col-xl-6 col-lg-6 col-md-12 mb-30">
            <div class="tp-online-list-box  theme-bg">
            <ul>
                  <li><a href="#">Environmental Impact Assessment<span><i class="flaticon-right-arrow"></i></span></a></li>
                  <li><a href="#">Environmentally Sound Management & PCBS<span><i class="flaticon-right-arrow"></i></span></a></li>
                  <li><a href="#">Ogoni Cleanup<span><i class="flaticon-right-arrow"></i></span></a></li>
                  <li><a href="#">Green Bonds<span><i class="flaticon-right-arrow"></i></span></a></li>
                  <li><a href="#">Clean & Green Initiative<span><i class="flaticon-right-arrow"></i></span></a></li>
                  <li><a href="#">Great Green Wall Programme<span><i class="flaticon-right-arrow"></i></span></a></li>
               </ul>
            </div>
         </div>
         <div class="col-xl-6 col-lg-6 col-md-12 mb-30">
            <div class="tp-online-list-box background-style-2 theme-bg-2">
               <ul>
                  <li><a href="#">Erosion & Watershed Management Project<span><i class="flaticon-right-arrow"></i></span></a></li>
                  <li><a href="#">Clean Energy Initiative<span><i class="flaticon-right-arrow"></i></span></a></li>
                  <li><a href="#">Public Service Identy<span><i class="flaticon-right-arrow"></i></span></a></li>
                  <li><a href="#">National Planning Frame<span><i class="flaticon-right-arrow"></i></span></a></li>
                  <li><a href="#">Apply for Business License<span><i class="flaticon-right-arrow"></i></span></a></li>
                  <li><a href="#">Professional License<span><i class="flaticon-right-arrow"></i></span></a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- online-service area end -->

<!-- video area start -->
<div class="tp-video-area tp-video-space fix p-relative">
   <div class="tp-video-shape-1 d-none d-xl-block">
      <img src="{{asset('MainAssets/img/video/shape-1-1.png')}}" alt="">
   </div>
   <div class="tp-video-shape-2 d-none d-xl-block">
      <img src="{{asset('MainAssets/img/video/shape-1-2.png')}}" alt="">
   </div>
   <div class="tp-video-shape-3 d-none d-xl-block">
      <img src="{{asset('MainAssets/img/video/shape-1-3.png')}}" alt="">
   </div>
   <div class="tp-video-shape-4 d-none d-xl-block">
      <img src="{{asset('MainAssets/img/video/shape-1-4.png')}}" alt="">
   </div>
   <div class="tp-video-bg jarallax" data-background="{{asset('MainAssets/img/video/bg-1-1.jpg')}}"></div>
   <div class="container">
      <div class="row">
         <div class="col-xl-12">
            <div class="tp-video-content text-center">
               <div class="tp-video-content-icon-box">
                  <a class="popup-video video-animation-2" href="https://www.youtube.com/watch?v=xaufnElEtog"><i
                        class="flaticon-play"></i></a>
               </div>
               <h6 class="tp-video-content-title">We Help You to Solve Climate Change Problems </h6>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- video area end -->

<!-- team area start -->
<div class="tp-team-2-area pt-115 pb-90">
   <div class="container">
      <div class="row">
         <div class="col-xl-12">
            <div class="tp-team-section-title text-center mb-55">
               <span class="tp-section-subtitle">LEADERSHIP</span>
               <h4 class="tp-section-title">Let’s Meet With Our Leaders</h4>
            </div>
         </div>
      </div>
      <div class="row justify-content-center">
         <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
            <div class="tp-team-2-item fix p-relative">
               <div class="tp-team-2-thumb-box fix">
                  <img class="w-100" src="{{asset('MainAssets/img/team/leader1.jpg')}}" alt="">
               </div>
               <div class="tp-team-2-content text-center">
                  <h4 class="tp-team-2-title"><a href="team-details.html">BALARABE ABBAS LAWAL</a></h4>
                  <span>Honourable Minister</span>
                  <!-- <div class="tp-team-2-social-box">
                     <button><i class="fa-solid fa-share-nodes"></i></button>
                     <div class="tp-team-2-social">
                        <a class="icon-1" href="index.html#"><i class="fa-brands fa-facebook-f"></i></a>
                        <a class="icon-2" href="index.html#"><i class="fa-brands fa-instagram"></i></a>
                        <a class="icon-3" href="index.html#"><i class="fa-brands fa-linkedin-in"></i></a>
                     </div>
                  </div> -->
               </div>
            </div>
         </div>
         <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".5s">
            <div class="tp-team-2-item fix p-relative">
               <div class="tp-team-2-thumb-box fix">
                  <img class="w-100" src="{{asset('MainAssets/img/team/leader2.jpg')}}" alt="">
               </div>
               <div class="tp-team-2-content text-center">
                  <h4 class="tp-team-2-title"><a href="team-details.html">AYODELE OLAWANDE</a></h4>
                  <span>Honourable Minister Of State</span>
                  <!-- <div class="tp-team-2-social-box">
                     <button><i class="fa-solid fa-share-nodes"></i></button>
                     <div class="tp-team-2-social">
                        <a class="icon-1" href="index.html#"><i class="fa-brands fa-facebook-f"></i></a>
                        <a class="icon-2" href="index.html#"><i class="fa-brands fa-instagram"></i></a>
                        <a class="icon-3" href="index.html#"><i class="fa-brands fa-linkedin-in"></i></a>
                     </div>
                  </div> -->
               </div>
            </div>
         </div>
    
      </div>
   </div>
</div>
<!-- team area end -->

<!-- testimonial area end -->
<div class="tp-testimonial-area theme-bg-2 pt-120 pb-120 z-index">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-xl-8">
            <div class="tp-testimonial-title-box mb-50 text-center">
               <span class="tp-section-subtitle">our testimonials</span>
               <h4 class="tp-section-title text-white">Some Clients Feedback</h4>
            </div>
         </div>
      </div>
      <div class="tp-testimonial-img-wrap p-relative">
         <div class="tp-testimonial-arrow-box">
            <button class="testi-prev"><i class="fa-solid fa-arrow-left"></i></button>
            <button class="testi-next"><i class="fa-solid fa-arrow-right"></i></button>
         </div>
         <div class="tp-testimonial-img-1 d-none d-xl-block">
            <img src="{{asset('MainAssets/img/testimonial/testi-1.jpg')}}" alt="">
         </div>
         <div class="tp-testimonial-img-2 d-none d-xl-block">
            <img src="{{asset('MainAssets/img/testimonial/testi-2.jpg')}}" alt="">
         </div>
         <div class="row justify-content-center">
            <div class="col-xl-9">
               <div class="tp-testimonial-bg p-relative">
                  <div class="tp-testimonial-bg-shape">
                     <img src="{{asset('MainAssets/img/testimonial/testi-bg-shape.png')}}" alt="">
                  </div>
                  <div class="swiper-container tp-testimonial-slider-actve">
                     <div class="swiper-wrapper">
                        <div class="swiper-slide">
                           <div class="tp-testimonial-item">
                              <div class="tp-testimonial-avatar">
                                 <img src="{{asset('MainAssets/img/avata/avata-3.png')}}" alt="">
                              </div>
                              <div class="tp-testimonial-content">
                                 <p>“Because a city story is never complete there
                                    is always something new and to discover.
                                    An environment spent at estene”</p>
                              </div>
                              <div class="tp-testimonial-avatar-info">
                                 <span>Mayor</span>
                                 <h4 class="tp-testimonial-title-sm">Tasha Baily</h4>
                              </div>
                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="tp-testimonial-item">
                              <div class="tp-testimonial-avatar">
                                 <img src="{{asset('MainAssets/img/avata/avata-3.png')}}" alt="">
                              </div>
                              <div class="tp-testimonial-content">
                                 <p>“Because a city story is never complete there
                                    is always something new and to discover.
                                    An environment spent at estene”</p>
                              </div>
                              <div class="tp-testimonial-avatar-info">
                                 <span>Mayor</span>
                                 <h4 class="tp-testimonial-title-sm">Tasha Baily</h4>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- testimonial area end -->

<!-- blog area start -->
<div id="blog-one-page" class="tp-blog-area pt-100 pb-90">
   <div class="container">
      <div class="row">
         <div class="col-xl-12">
            <div class="tp-blog-section-title text-center mb-55">
               <span class="tp-section-subtitle">our latest blogs</span>
               <h4 class="tp-section-title">Latest News & Blog <br>From Articles</h4>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
            <div class="tp-blog__item">
               <div class="tp-blog__thumb p-relative fix">
                  <a href="#"><img class="w-100" src="{{asset('MainAssets/img/blog/blogpic2.jpg')}}" alt=""></a>
                 
               </div>
               <div class="tp-blog__content-wrap">
                  
                  <h5 class="tp-blog__title-sm"><a href="blog-details.html">ENVIRONMENT MINISTER CALLS ON NGOS</h5>
                  <div class="tp-blog__link">
                     <a href="#">Read More <i class="fa-regular fa-arrow-right-long"></i></a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
            <div class="tp-blog__item">
               <div class="tp-blog__thumb p-relative fix">
                  <a href="#"><img class="w-100" src="{{asset('MainAssets/img/blog/blogpic3.jpeg')}}" alt=""></a>
                
               </div>
               <div class="tp-blog__content-wrap">
                 
                  <h5 class="tp-blog__title-sm"><a href="blog-details.html">ENVIRONMENT MINISTER ASSURES WOMEN OF GOVERNMENT SUPPORT</a></h5>
                  <div class="tp-blog__link">
                     <a href="#">Read More <i class="fa-regular fa-arrow-right-long"></i></a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
            <div class="tp-blog__item">
               <div class="tp-blog__thumb p-relative fix">
                  <a href="#"><img class="w-100" src="{{asset('MainAssets/img/blog/blogpic4.jpeg')}}" alt=""></a>
                
               </div>
               <div class="tp-blog__content-wrap">
                  
                  <h5 class="tp-blog__title-sm"><a href="blog-details.html">PRESENTATION OF REPORT</a></h5>
                  <div class="tp-blog__link">
                     <a href="#">Read More <i class="fa-regular fa-arrow-right-long"></i></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- blog area end -->

</main>
@endsection