@extends('components.layouts.app')
@section('PageTitle', $page->title ?? 'Frequently Asked Questions')
@section('pageContent')

@php
    // Default FAQ data structure if not provided
    $defaultFaqs = [
        [
            'category' => 'General',
            'questions' => [
                [
                    'question' => 'What services do you offer?',
                    'answer' => 'We offer a comprehensive range of services designed to meet your needs. Our team of experts is dedicated to providing high-quality solutions tailored to your specific requirements.'
                ],
                [
                    'question' => 'How can I contact customer support?',
                    'answer' => 'You can reach our customer support team through multiple channels: email, phone, or live chat. Our support team is available 24/7 to assist you with any questions or concerns.'
                ]
            ]
        ],
        [
            'category' => 'Services',
            'questions' => [
                [
                    'question' => 'What is your pricing structure?',
                    'answer' => 'Our pricing is competitive and transparent. We offer flexible packages to suit different budgets and requirements. Contact us for a detailed quote based on your specific needs.'
                ],
                [
                    'question' => 'Do you offer refunds?',
                    'answer' => 'Yes, we have a comprehensive refund policy. If you are not satisfied with our services, you may be eligible for a refund within the specified timeframe as outlined in our terms and conditions.'
                ]
            ]
        ]
    ];

    // Use provided FAQs or default ones
    $faqData = $page->faq_data ?? $defaultFaqs;
    $supportInfo = $page->support_info ?? [
        'title' => 'Need More Help?',
        'subtitle' => 'Talk to an expert',
        'phone' => '+1 (555) 123-4567',
        'email' => 'support@example.com'
    ];
@endphp

<main>
    {{-- HERO/BREADCRUMB SECTION --}}
    <div class="breadcrumb__area breadcrumb__overlay breadcrumb__height p-relative fix"
         @if(isset($page->hero_bg) && $page->hero_bg)
             data-background="{{ $page->hero_bg }}"
         @else
             data-background="{{ asset('MainAssets/img/faq/faq-hero.jpg') }}"
         @endif>
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content z-index text-center">
                        <div class="breadcrumb__subtitle">
                            <span class="breadcrumb__subtitle-icon">
                                <i class="flaticon-question"></i>
                            </span>
                            <span class="breadcrumb__subtitle-text">Help Center</span>
                        </div>
                        <h1 class="breadcrumb__title">{{ $page->title ?? 'Frequently Asked Questions' }}</h1>
                        @if(isset($page->subtitle) && $page->subtitle)
                            <p class="breadcrumb__description">{{ $page->subtitle }}</p>
                        @else
                            <p class="breadcrumb__description">Find answers to the most commonly asked questions about our services</p>
                        @endif
                        <div class="breadcrumb__list">
                            <span><a href="{{ url('/') }}">Home</a></span>
                            <span class="dvdr"><i class="fa fa-angle-right"></i></span>
                            <span>FAQ</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- FAQ AREA START --}}
    <div class="tp-faq-area pt-120 pb-120">
        <div class="container">
            {{-- FAQ Header Section --}}
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-faq-title-box mb-80 text-center">
                        <div class="tp-section-subtitle">
                            <span class="tp-section-subtitle-icon">
                                <i class="flaticon-spark"></i>
                            </span>
                            <span class="tp-section-subtitle-text">Help & Support</span>
                        </div>
                        <h2 class="tp-section-title">
                            {{ $page->faq_title ?? 'Find Your Answers' }}<br>
                            {{ $page->faq_subtitle ?? 'Quick & Easy' }}
                        </h2>
                        <div class="tp-section-title-line">
                            <span></span>
                        </div>
                        <p class="tp-section-description">
                            {{ $page->faq_description ?? 'Browse through our comprehensive FAQ section to find answers to common questions. Can\'t find what you\'re looking for? Contact our support team.' }}
                        </p>
                        
                        {{-- FAQ Search Box --}}
                        <div class="tp-faq-search-wrapper">
                            <div class="tp-faq-search-box">
                                <input type="text" id="faqSearch" placeholder="Search for answers..." autocomplete="off">
                                <button type="button" class="tp-faq-search-btn">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                            <div class="tp-faq-search-results" id="searchResults" style="display: none;"></div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- FAQ Categories Navigation --}}
            @if(count($faqData) > 1)
                <div class="row">
                    <div class="col-xl-12">
                        <div class="tp-faq-categories mb-60">
                            <div class="tp-faq-categories-nav">
                                <button class="tp-faq-category-btn active" data-category="all">
                                    <i class="fa-solid fa-list"></i>
                                    All Categories
                                </button>
                                @foreach($faqData as $index => $category)
                                    <button class="tp-faq-category-btn" data-category="category-{{ $index }}">
                                        <i class="fa-solid fa-folder"></i>
                                        {{ $category['category'] }}
                                        <span class="tp-faq-count">({{ count($category['questions']) }})</span>
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
               <div class="col-xl-4 col-lg-4">
                  <div class="tp-faq-sidebar">
                     <div class="tp-faq-sidebar-item tp-faq-sidebar-bg" data-background="assets/img/faq/faq-sidebar.jpg">
                        <div class="tp-faq-sidebar-content-box z-index-2">
                           <div class="tp-faq-sidebar-content">
                              <span><i class="fa-sharp fa-light fa-phone-volume"></i></span>
                              <h4 class="tp-faq-sidebar-title">We Are Here For Support You</h4>
                           </div>
                           <div class="tp-faq-sidebar-info">
                              <span>Talk to an expert</span>
                              <span><a href="tel:+99(786)8765">Free +99 (786) 8765</a></span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-8 col-lg-8">
                  <div class="tp-faq-right-box">
                     <div class="tp-custom-accordion">
                        <div class="accordion" id="accordionExample">
                           <div class="accordion-items">
                             <h2 class="accordion-header">
                               <button class="accordion-buttons" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                 Are there any discounts included?
                               </button>
                             </h2>
                             <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                               <div class="accordion-body">
                                <p>Already the people had fled from the city by millions at first the rich, in their private motor-cars and dirigibles, and then the great mass of the population, on foot, carrying the plague</p>
                               </div>
                             </div>
                           </div>
                           <div class="accordion-items">
                             <h2 class="accordion-header">
                               <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                 How can I apply for the tourist visa?
                               </button>
                             </h2>
                             <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                               <div class="accordion-body">
                                 <p>Already the people had fled from the city by millions at first the rich, in their private motor-cars and dirigibles, and then the great mass of the population, on foot, carrying the plague</p>
                               </div>
                             </div>
                           </div>
                           <div class="accordion-items">
                             <h2 class="accordion-header">
                               <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                 Does your immigration offers the money-back guarantee? 
                               </button>
                             </h2>
                             <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                               <div class="accordion-body">
                                 <p>Already the people had fled from the city by millions at first the rich, in their private motor-cars and dirigibles, and then the great mass of the population, on foot, carrying the plague</p>
                               </div>
                             </div>
                           </div>
                           <div class="accordion-items">
                             <h2 class="accordion-header">
                               <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                 Does your immigration offers the money-back guarantee? 
                               </button>
                             </h2>
                             <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                               <div class="accordion-body">
                                 <p>Already the people had fled from the city by millions at first the rich, in their private motor-cars and dirigibles, and then the great mass of the population, on foot, carrying the plague</p>
                               </div>
                             </div>
                           </div>
                           <div class="accordion-items">
                             <h2 class="accordion-header">
                               <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                 Does your immigration offers the money-back guarantee? 
                               </button>
                             </h2>
                             <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                               <div class="accordion-body">
                                 <p>Already the people had fled from the city by millions at first the rich, in their private motor-cars and dirigibles, and then the great mass of the population, on foot, carrying the plague</p>
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
      <!-- faq area end -->

      <!-- brand area start -->
      <div class="tp-brand-area pb-120">
         <div class="container">
            <div class="row">
               <div class="col-xl-12">
                  <div class="tp-brand-title-box mb-60 text-center">
                     <span class="tp-section-subtitle-2">CHECK OUR PARTNER AND SUPPORTES</span>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-xl-12">
                  <div class="tp-brand-slider-wrapper">
                     <div class="swiper-container tp-brand-slider-active">
                        <div class="swiper-wrapper">
                           <div class="swiper-slide">
                              <div class="tp-brand-item text-center">
                                 <img src="assets/img/brand/brand-1.png" alt="">
                              </div>
                           </div>
                           <div class="swiper-slide">
                              <div class="tp-brand-item text-center">
                                 <img src="assets/img/brand/brand-2.png" alt="">
                              </div>
                           </div>
                           <div class="swiper-slide">
                              <div class="tp-brand-item text-center">
                                 <img src="assets/img/brand/brand-3.png" alt="">
                              </div>
                           </div>
                           <div class="swiper-slide">
                              <div class="tp-brand-item text-center">
                                 <img src="assets/img/brand/brand-4.png" alt="">
                              </div>
                           </div>
                           <div class="swiper-slide">
                              <div class="tp-brand-item text-center">
                                 <img src="assets/img/brand/brand-5.png" alt="">
                              </div>
                           </div>
                           <div class="swiper-slide">
                              <div class="tp-brand-item text-center">
                                 <img src="assets/img/brand/brand-4.png" alt="">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- brand area end -->


   </main>
@endsection