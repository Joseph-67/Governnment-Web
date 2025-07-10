@extends('components.layouts.app')
@section('PageTitle', 'Home')
@section('pageContent')
@section('styles')
<style>
   /* Slider Title Responsive Font Size */
   .tp-slider-title {
      font-size: 2rem;
   }
   @media (min-width: 768px) {
      .tp-slider-title {
         font-size: 3rem;
      }
   }
   @media (min-width: 1200px) {
      .tp-slider-title {
         font-size: 4rem;
      }
   }

   /* Slider Image and Content */
   .tp-slider-img {
      background-size: cover;
      background-position: center;
   }
   .tp-slider-content-wrap {
      text-align: center;
   }

   /* Responsive Video Box */
   @media (max-width: 767px) {
      .tp-slider-video-box {
         flex-direction: column;
         align-items: center;
      }
      .tp-slider-btn {
         margin-bottom: 15px;
      }
   }

   /* Partner Section Styles */
   .partner-section {
      padding: 60px 20px;
      text-align: center;
   }
   .partner-section h4.tp-section-title {
      font-size: 2.5rem;
      margin-bottom: 40px;
      color: #222;
   }
   .slider-container {
      overflow: hidden;
      /* width: 100%; */
      /* max-width: 1000px; */
      margin: 0 auto;
      height: 180px;
   }
   .slider-track {
      display: flex;
      animation: partner-slide 20s linear infinite;
   }
   .slider-track .card {
      /* width: 260px; */
      height: 180px;
      margin: 0 15px;
      border-radius: 15px;
      transition: transform 0.3s, box-shadow 0.3s;
      background: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
   }
   .slider-track .card:hover {
      transform: scale(1.05);
      box-shadow: 0 10px 20px rgba(0,0,0,0.12);
   }
   .slider-track img {
      height: 140px;
      object-fit: contain;
      width: 100%;
   }
   @keyframes partner-slide {
      0% { transform: translateX(0); }
      100% { transform: translateX(-50%); }
   }
</style>
@endsection
@section('scripts')
<script>
   document.addEventListener('DOMContentLoaded', function () {
      const metaContent = document.querySelector('.tp-slider-meta-content span');

      function updateTemperatureAndTime() {
         // Simulate temperature (replace with real API if needed)
         const temperature = Math.floor(Math.random() * 36) + 15; // 15°C to 50°C
         const now = new Date();
         const hours = now.getHours().toString().padStart(2, '0');
         const minutes = now.getMinutes().toString().padStart(2, '0');
         const localTime = `${hours}:${minutes} Local Time`;

         if (metaContent) {
            metaContent.innerHTML = `${temperature}°C<br>${localTime}`;
         }
      }

      updateTemperatureAndTime();
      setInterval(updateTemperatureAndTime, 60000);
   });
</script>
@endsection
<main>
   {{-- HERO AREA --}}
   <section class="tp-slider-area">
      <div class="tp-slider-wrapper p-relative">
         {{-- Meta Info --}}
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
         {{-- Arrows --}}
         <div class="tp-slider-arrow-box">
            <button class="slider-prev"><i class="fa-regular fa-arrow-left"></i></button>
            <button class="slider-next"><i class="fa-regular fa-arrow-right"></i></button>
         </div>
         {{-- Decoration --}}
         <div class="tp-slider-shape-5">
            <img src="{{ asset('MainAssets/img/slider/slider-new1.png') }}" alt="Slider Image">
         </div>
         {{-- Swiper Container --}}
         <div class="swiper-container tp-slider-active">
            <div class="swiper-wrapper">
               @php
                  $slides = [
                     [
                        'bg' => 'slider-1.jpg',
                        'subtitle' => '🌍 Welcome to the NGN IEE-RECP Project',
                        'title' => "Driving Nigeria’s Industrial Sustainability through Innovation and Efficiency.",
                        'video' => false,
                     ],
                     [
                        'bg' => 'slider-2.jpg',
                        'subtitle' => '🔧🌱⚙️ OUR MISSION',
                        'title' => "Driving sustainable growth through RECP and innovation.",
                        'video' => true,
                     ],
                     [
                        'bg' => 'slider-3.jpg',
                        'subtitle' => '🌍💡 OUR VISION',
                        'title' => "A sustainable Nigeria powered by RECP principles.",
                        'video' => true,
                     ],
                     [
                        'bg' => 'slider-4.jpg',
                        'subtitle' => '🎯⚡♻️ OUR GOAL',
                        'title' => "To empower communities through sustainable development initiatives and innovative solutions.",
                        'video' => true,
                     ],
                  ];
               @endphp
               @foreach($slides as $slide)
                  <div class="swiper-slide">
                     <div class="tp-slider-bg d-flex justify-content-center align-items-center p-relative fix">
                        <div class="tp-slider-img" style="background-image: url('{{ asset('MainAssets/img/slider/' . $slide['bg']) }}');"></div>
                        <div class="tp-slider-shape-1 z-index-1"><img src="{{ asset('MainAssets/img/slider/slider-shape-1-1.png') }}" alt=""></div>
                        <div class="tp-slider-shape-2 z-index-2"><img src="{{ asset('MainAssets/img/slider/slider-shape-1-3.png') }}" alt=""></div>
                        <div class="tp-slider-shape-3 z-index-1"><img src="{{ asset('MainAssets/img/slider/slider-shape-1-2.png') }}" alt=""></div>
                        <div class="container">
                           <div class="row">
                              <div class="col-xl-9 col-lg-10 col-md-12">
                                 <div class="tp-slider-content-wrap p-relative z-index-2">
                                    <div class="tp-slider-shape-4"><img src="{{ asset('MainAssets/img/slider/slider-shape-1-4.png') }}" alt=""></div>
                                    <div class="tp-slider-title-box p-relative">
                                       <span class="tp-slider-subtitle text-uppercase">{{ $slide['subtitle'] }}</span>
                                       <h4 class="tp-slider-title" style="font-size: 2.5rem;">{{ $slide['title'] }}</h4>
                                    </div>
                                    <div class="tp-slider-video-box d-flex align-items-center">
                                       <div class="tp-slider-btn">
                                          <a class="tp-btn-xl mr-30" href="about.html">Discover More</a>
                                       </div>
                                       @if($slide['video'])
                                          <div class="tp-slider-video d-flex align-items-center">
                                             <a class="popup-video video-animation" href="https://www.youtube.com/watch?v=yqb1gONBlEQ" target="_blank" rel="noopener noreferrer">
                                                <i class="fa-sharp fa-light fa-play"></i>
                                             </a>
                                             <span>Watch Our <br> Showcase</span>
                                          </div>
                                       @endif
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               @endforeach
            </div>
         </div>
      </div>
   </section>
   {{-- HERO AREA END --}}

   {{-- FEATURE AREA --}}
   <section id="feature-one-page" class="tp-feature-area pt-130 pb-110 p-relative z-index grey-bg-2">
      <div class="tp-feature-shape-1 d-none d-xxl-block">
         <img src="{{asset('MainAssets/img/feature/ab-shape-2.png')}}" alt="">
      </div>
      <div class="tp-feature-shape-2">
         <img src="{{asset('MainAssets/img/feature/ab-bg.png')}}" alt="">
      </div>
      <div class="container">
         <div class="row row-cols-xl-5 row-cols-lg-3 justify-content-center justify-content-xl-start">
            @php
               $features = [
                  ['icon' => 'fas fa-rocket mission-icon', 'title' => 'OUR MISSION'],
                  ['icon' => 'fa fa-recycle', 'title' => 'ENVIRONMENTAL PROTECTION'],
                  ['icon' => 'fa fa-water', 'title' => 'Natural Resources Conservation'],
                  ['icon' => 'fa fa-building', 'title' => 'SUSTAINABLE DEVELOPMENT'],
                  ['icon' => 'fa fa-hands-helping', 'title' => 'COMMUNITY INVOLVEMENT'],
               ];
            @endphp
            @foreach($features as $i => $feature)
               <div class="col col-sm-6 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".{{ 3 + $i * 2 }}s">
                  <div class="tp-feature-item mb-30 text-center">
                     <div class="tp-feature-icon">
                        <i class="{{ $feature['icon'] }}"></i>
                     </div>
                     <div class="tp-feature-content">
                        <h4 class="tp-feature-title-sm">{{ $feature['title'] }}</h4>
                     </div>
                  </div>
               </div>
            @endforeach
         </div>
      </div>
   </section>
   {{-- FEATURE AREA END --}}

   {{-- ABOUT AREA --}}
   <section id="about-one-page" class="tp-about-area fix pt-120">
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
            <div class="tp-about-right-img d-none d-xl-block wow tpfadeRight" data-wow-duration=".9s" data-wow-delay=".3s">
               <img src="{{asset('MainAssets/img/about/minister2.png')}}" alt="">
            </div>
            <div class="row">
               <div class="col-xl-3 col-lg-4 col-md-12">
                  <div class="tp-about-feature-box">
                     <h4 class="tp-about-feature-title">Ministerial focal points</h4>
                     <div class="tp-about-feature-list">
                        <ul>
                           <li><a href="#">Energy Efficiency</a></li>
                           <li><a href="#">Promoting Sustainability</a></li>
                        </ul>
                     </div>
                     <div class="tp-about-feature-btn">
                        <a class="tp-btn-purple" href="{{ route('mandate') }}">KNOW MORE</a>
                     </div>
                  </div>
               </div>
               <div class="col-xl-6 col-lg-8 col-md-12">
                  <div class="tp-about-content-wrap p-relative">
                     <div class="tp-about-text">
                        <p>Resource Efficiency and Cleaner Production (RECP) is a key strategy for promoting sustainable industrial development in Nigeria. As the country seeks to reduce environmental impact while boosting economic growth, RECP offers practical solutions to minimize waste, optimize resource use, and encourage cleaner technologies across industries.</p>
                     </div>
                     <div class="tp-about-city-info d-flex align-items-center">
                        <i class="flaticon-smart-city"></i>
                        <span>How We Serve Our Fatherland</span>
                     </div>
                     <div class="tp-about-progress p-relative">
                        <span class="progress-label">Number Of States Impacted</span>
                        <span class="progress-count">92%</span>
                        <div class="progress">
                           <div class="progress-bar wow slideInLeft" data-wow-duration="1s" data-wow-delay=".3s"
                               role="progressbar" data-width="92%" aria-valuenow="25" aria-valuemin="0"
                               aria-valuemax="100"
                               style="width: 58%; visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: slideInLeft;">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   {{-- ABOUT AREA END --}}

   @php
      $partners = [
         ['url' => 'https://www.unido.org/', 'img' => 'logo2.png', 'name' => 'UNIDO'],
         ['url' => 'https://www.thegef.org/', 'img' => 'logo3.png', 'name' => 'GEF'],
         ['url' => 'https://www.manufacturersnigeria.org/', 'img' => 'logo1.png', 'name' => 'MAN'],
      ];
   @endphp
   <!-- brand area start -->
   <div class="tp-brand-area pb-120">
      <div class="container">
         <div class="row">
            <div class="col-xl-12">
               <div class="tp-brand-title-box mb-60 text-center">
                  <i class="flaticon-spark"></i>
                  <span class="tp-section-subtitle-2">CHECK OUR PARTNERS AND SUPPORTERS</span>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xl-12">
               <div class="tp-brand-slider-wrapper">
                  <div class="swiper-container tp-brand-slider-active">
                     <div class="swiper-wrapper">
                     @foreach($partners as $partner)
                        <div class="swiper-slide">
                           <a href="{{ $partner['url'] }}" target="_blank" rel="noopener" class="tp-brand-item text-center d-block">
                              <img src="{{ asset('MainAssets/img/logo/' . $partner['img']) }}" alt="{{ $partner['name'] }} logo" style="height: 100px; width: 100px; object-fit: contain;">
                           </a>
                        </div>
                     @endforeach
                     @foreach($partners as $partner)
                        <div class="swiper-slide">
                           <a href="{{ $partner['url'] }}" target="_blank" rel="noopener" class="tp-brand-item text-center d-block">
                              <img src="{{ asset('MainAssets/img/logo/' . $partner['img']) }}" alt="{{ $partner['name'] }} logo" style="height: 100px; width: 100px; object-fit: contain;">
                           </a>
                        </div>
                     @endforeach
                     
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- brand area end -->

   {{-- SERVICE AREA --}}
   <section id="service-one-page" class="tp-service-area p-relative theme-bg-2 pt-120 pb-90">
      <div class="container custom-container">
         <div class="row">
            <div class="col-xl-12">
               <div class="tp-service-title-box text-center mb-70">
                  <span class="tp-section-subtitle">OUR DEPARTMENTS</span>
                  <h4 class="tp-section-title text-white">Explore our departments</h4>
               </div>
            </div>
         </div>
         <div class="row">
            @php
               $departments = [
                  [
                     'icon' => 'flaticon-approved',
                     'title' => 'Audit',
                     'desc' => 'The Audit department ensures transparency and accuracy in our operations.',
                  ],
                  [
                     'icon' => 'fa fa-wind',
                     'title' => 'Climate Change',
                     'desc' => 'Dedicated to addressing the impacts of climate change through research, advocacy, and action.',
                  ],
                  [
                     'icon' => 'fa fa-file-invoice',
                     'title' => 'Finance & Accounts',
                     'desc' => 'Ensures accurate financial records, supports strategic planning, and maintains financial health.',
                  ],
                  [
                     'icon' => 'fas fa-briefcase',
                     'title' => 'General Services',
                     'desc' => 'Provides essential support functions to ensure smooth operations within an organization.',
                  ],
               ];
            @endphp
            @foreach($departments as $i => $dept)
               <div class="col-xl-3 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".{{ 3 + $i * 2 }}s">
                  <div class="tp-service-item p-relative">
                     <div class="tp-service-shape">
                        <img src="{{asset('MainAssets/img/service/sv-item-shape.png')}}" alt="">
                     </div>
                     <div class="tp-service-icon">
                        <i class="{{ $dept['icon'] }}"></i>
                     </div>
                     <div class="tp-service-content">
                        <h4 class="tp-service-title-sm"><a href="service-details.html">{{ $dept['title'] }}</a></h4>
                        <p>{{ $dept['desc'] }}</p>
                     </div>
                     <div class="tp-service-link">
                        <a href="#">Read More <i class="fa-light fa-arrow-right"></i></a>
                     </div>
                  </div>
               </div>
            @endforeach
         </div>
      </div>
   </section>
   {{-- SERVICE AREA END --}}

   {{-- EVENT AREA --}}
   <section class="tp-event-area pt-120 pb-90 p-relative grey-bg-2">
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
            @php
               $events = [
                  ['img' => 'WhatsApp Image 2025-05-01 at 15.06.32.jpeg', 'title' => 'Training Or workshop'],
                  ['img' => 'IMG-20250423-WA0102.jpg', 'title' => 'Training or workshop'],
                  ['img' => 'WhatsApp Image 2025-05-01 at 15.06.37 (1).jpeg', 'title' => 'Training Or Workshop'],
               ];
            @endphp
            @foreach($events as $event)
               <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                  <div class="tp-event-item text-center">
                     <div class="tp-event-thumb fix">
                        <img src="{{asset('MainAssets/img/home/' . $event['img'])}}" height="200px" alt="">
                     </div>
                     <div class="tp-event-content-wrap">
                        <div class="tp-event-content">
                           <h4 class="tp-event-title-sm"><a href="#">{{ $event['title'] }}</a></h4>
                        </div>
                        <div class="tp-event-link">
                           <a href="#">Read More</a>
                        </div>
                     </div>
                  </div>
               </div>
            @endforeach
         </div>
      </div>
   </section>
   {{-- EVENT AREA END --}}

   {{-- FUNFACT AREA --}}
   <section class="tp-funfact-2-area tp-funfact-2-bg pt-120 pb-90 p-relative" data-background="{{asset('MainAssets/img/funfact/funfact-bg.jpg')}}">
      <div class="container">
         <div class="row">
            @php
               $funfacts = [
                  ['icon' => 'flaticon-foundation', 'end' => 820, 'suffix' => '+', 'label' => 'Years of Foundation'],
                  ['icon' => 'flaticon-running-man', 'end' => 12, 'suffix' => '', 'label' => 'Number Of States'],
                  ['icon' => 'flaticon-landscape', 'end' => 150, 'suffix' => '', 'label' => 'Number of Companies'],
                  ['icon' => 'flaticon-windrose', 'end' => 920, 'suffix' => '+', 'label' => 'Successful Rating'],
               ];
            @endphp
            @foreach($funfacts as $i => $fact)
               <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".{{ 3 + $i * 2 }}s">
                  <div class="tp-funfact-2-item z-index text-center">
                     <div class="tp-funfact-2-icon p-relative">
                        <span><i class="{{ $fact['icon'] }}"></i></span>
                     </div>
                     <div class="tp-funfact-2-content">
                        <h4><em data-purecounter-duration="1" data-purecounter-end="{{ $fact['end'] }}" class="purecounter">0</em>{{ $fact['suffix'] }}</h4>
                        <span>{{ $fact['label'] }}</span>
                     </div>
                  </div>
               </div>
            @endforeach
         </div>
      </div>
   </section>
   {{-- FUNFACT AREA END --}}

   {{-- PROJECT AREA --}}
   <section class="tp-project-area pt-120 fix">
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
                     <p>We focus on protecting the environment, promoting sustainability, and addressing climate change.</p>
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
                     @php
                        $projectImgs = [
                           'WhatsApp Image 2025-05-01 at 15.06.32.jpeg',
                           'WhatsApp Image 2025-05-01 at 15.06.35.jpeg',
                           'WhatsApp Image 2025-05-01 at 15.06.37 (1).jpeg',
                           'IMG-20250423-WA0102.jpg',
                           'IMG-20250423-WA0101.jpg',
                           'IMG-20250423-WA0096.jpg',
                        ];
                     @endphp
                     @foreach($projectImgs as $img)
                        <div class="swiper-slide">
                           <div class="tp-project-item p-relative">
                              <div class="tp-project-thumb fix">
                                 <img src="{{asset('MainAssets/img/home/' . $img)}}" alt="">
                              </div>
                              <div class="tp-project-content-wrap d-flex align-items-center justify-content-between">
                                 <div class="tp-project-content">
                                    <span>RECP ON CARBON</span>
                                    <h4 class="tp-project-title-sm"><a href="#">ABUJA</a></h4>
                                 </div>
                                 <div class="tp-project-icon">
                                    <a href="#"><i class="fa-regular fa-arrow-right"></i></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     @endforeach
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   {{-- PROJECT AREA END --}}

   {{-- ONLINE SERVICE AREA --}}
   <section class="tp-online-area fix p-relative pt-120 pb-90">
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
               <div class="tp-online-list-box theme-bg">
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
   </section>
   {{-- ONLINE SERVICE AREA END --}}

   {{-- VIDEO AREA --}}
   <section class="tp-video-area tp-video-space fix p-relative">
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
                     <a class="popup-video video-animation-2" href="https://www.youtube.com/watch?v=yqb1gONBlEQ"><i class="flaticon-play"></i></a>
                  </div>
                  <h6 class="tp-video-content-title" style="font-size: 2rem;">We Help You to Solve Your Business Problems And Maximize Profit </h6>
               </div>
            </div>
         </div>
      </div>
   </section>
   {{-- VIDEO AREA END --}}

   {{-- TESTIMONIAL AREA --}}
   <section class="tp-testimonial-area theme-bg-2 pt-120 pb-120 z-index">
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
                           @for($i = 0; $i < 2; $i++)
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
                           @endfor
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   {{-- TESTIMONIAL AREA END --}}

   {{-- BLOG AREA --}}
   <section id="blog-one-page" class="tp-blog-area pt-100 pb-90">
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
            @php
               $blogs = [
                  [
                     'img' => 'WhatsApp Image 2025-05-01 at 15.06.32.jpeg',
                     'title' => 'ENVIRONMENT MINISTER CALLS ON NGOS',
                  ],
                  [
                     'img' => 'WhatsApp Image 2025-05-01 at 15.06.35.jpeg',
                     'title' => 'ENVIRONMENT MINISTER ASSURES WOMEN OF GOVERNMENT SUPPORT',
                  ],
                  [
                     'img' => 'WhatsApp Image 2025-05-01 at 15.06.37 (1).jpeg',
                     'title' => 'PRESENTATION OF REPORT',
                  ],
               ];
            @endphp
            @foreach($blogs as $blog)
               <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                  <div class="tp-blog__item">
                     <div class="tp-blog__thumb p-relative fix">
                        <a href="#"><img class="w-100" style="height: 250px; object-fit: cover;" src="{{asset('MainAssets/img/home/' . $blog['img'])}}" alt=""></a>
                     </div>
                     <div class="tp-blog__content-wrap">
                        <h5 class="tp-blog__title-sm"><a href="blog-details.html">{{ $blog['title'] }}</a></h5>
                        <div class="tp-blog__link">
                           <a href="#">Read More <i class="fa-regular fa-arrow-right-long"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
            @endforeach
         </div>
      </div>
   </section>
   {{-- BLOG AREA END --}}
</main>
@endsection