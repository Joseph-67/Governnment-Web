@extends('components.layouts.app')
@section('PageTitle', 'Home')
@section('pageContent')
@section('styles')
      <style>
         .tp-funfact-2-item {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.07);
            padding: 40px 20px 30px 20px;
            transition: box-shadow 0.3s;
            border-bottom: 6px solid #1e7e34; /* brand green */
         }
         .tp-funfact-2-item:hover {
            box-shadow: 0 8px 32px rgba(30,126,52,0.15);
            border-bottom: 6px solid #ffc107; /* brand yellow on hover */
         }
         .tp-funfact-2-icon span {
            display: inline-block;
            background: linear-gradient(135deg, #1e7e34 60%, #ffc107 100%);
            color: #fff;
            border-radius: 50%;
            width: 70px;
            height: 70px;
            line-height: 70px;
            font-size: 2.2rem;
            margin-bottom: 18px;
            box-shadow: 0 2px 12px rgba(30,126,52,0.12);
         }
         .tp-funfact-2-content h4 {
            color: #1e7e34;
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 8px;
         }
         .tp-funfact-2-content span {
            color: #222;
            font-size: 1.1rem;
            letter-spacing: 0.5px;
        }
        /* service area */
         /* Uniform card size for service cards */
         .tp-service-item {
            min-height: 370px;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: stretch;
            box-sizing: border-box;
         }
         .tp-service-icon {
            min-height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
        }
         .tp-service-content {
            flex: 1 1 auto;
         }
         .tp-service-title-sm {
            min-height: 48px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
         }
         .tp-service-link {
            margin-top: auto;
         }
         @media (max-width: 991.98px) {
            .tp-service-item {
               min-height: 340px;
            }
         }
         @media (max-width: 767.98px) {
            .tp-service-item {
               min-height: 300px;
            }
         }
         /* end service area */
         /* blog area */
         /* Uniform card size for blog cards */
         .tp-blog__item {
            height: 420px;
            min-height: 420px;
            max-height: 420px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: stretch;
            box-sizing: border-box;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            overflow: hidden;
            transition: box-shadow 0.2s;
         }
         .tp-blog__item:hover {
            box-shadow: 0 8px 24px rgba(30,126,52,0.13);
         }
         .tp-blog__thumb {
            height: 200px;
            min-height: 200px;
            max-height: 200px;
            overflow: hidden;
         }
         .tp-blog__thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
         }
         .tp-blog__content-wrap {
            flex: 1 1 auto;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px 18px 18px 18px;
         }
         .tp-blog__title-sm {
            font-size: 1.15rem;
            font-weight: 600;
            margin-bottom: 12px;
            min-height: 48px;
            display: flex;
            align-items: center;
         }
         .tp-blog__link {
            margin-top: auto;
         }
         @media (max-width: 991.98px) {
            .tp-blog__item {
               height: 380px;
               min-height: 380px;
               max-height: 380px;
            }
            .tp-blog__thumb {
               height: 170px;
               min-height: 170px;
               max-height: 170px;
            }
         }
         @media (max-width: 767.98px) {
            .tp-blog__item {
               height: 340px;
               min-height: 340px;
               max-height: 340px;
            }
            .tp-blog__thumb {
               height: 130px;
               min-height: 130px;
               max-height: 130px;
            }
         }
         /* end blog area */
      </style>
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
   /* .tp-slider-content-wrap {
      text-align: center;
   } */

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
                        'title' => "Fostering sustainable growth through RECP and innovation.",
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


</main>
@endsection
