@extends('components.layouts.app')
@section('PageTitle', 'Home')
@section('pageContent')
   <main>

      <!-- breadcrumb area start -->
      <div class="breadcrumb__area breadcrumb__overlay breadcrumb__height p-relative fix" data-background="assets/img/breadcurmb/breadcurmb.jpg">
         <div class="container">
            <div class="row">
               <div class="col-xxl-12">
                  <div class="breadcrumb__content z-index text-center">
                     <h3 class="breadcrumb__title">Faqs</h3>
                     <div class="breadcrumb__list">
                        <span><a href="index.html">Home</a></span>
                        <span class="dvdr"><i class="fa fa-angle-right"></i></span>
                        <span>Faqs</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- breadcrumb area end -->

      <!-- Faq area start -->
      <div class="tp-faq-area pt-120 pb-120">
         <div class="container">
            <div class="row">
               <div class="col-xl-12">
                  <div class="tp-faq-title-box mb-80 p-relative">
                     <span class="tp-section-subtitle-2"><i class="flaticon-spark"></i>check our faqs</span>
                     <h4 class="tp-section-title">Frequently Asked Question <br> & Answer Here</h4>
                     <div class="tp-faq-img d-none d-lg-block">
                        <img src="assets/img/faq/faq.png" alt="">
                     </div>
                     <div class="tp-faq-input-box">
                        <input type="text" placeholder="Search here">
                        <span><i class="fa-sharp fa-light fa-magnifying-glass"></i></span>
                     </div>
                  </div>
               </div>
            </div>
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