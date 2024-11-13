@extends('components.layouts.app')
@section('PageTitle', 'Contact Us')
@section('pageContent')
@section('styles')

@endsection
<main>

<!-- breadcrumb area start -->
<div class="breadcrumb__area breadcrumb__overlay breadcrumb__height p-relative fix"
   data-background="{{asset('MainAssets/img/contact/contact-6.jpeg')}}">
   <div class="container">
      <div class="row">
         <div class="col-xxl-12">
            <div class="breadcrumb__content z-index text-center">
               <h3 class="breadcrumb__title">Contact</h3>
               <div class="breadcrumb__list">
                  <span><a href="index.html">Home</a></span>
                  <span class="dvdr"><i class="fa fa-angle-right"></i></span>
                  <span>Contact</span>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- breadcrumb area end -->

<!-- contact area start -->
<div class="contact-area grey-bg-2 z-index pb-120 pt-120">
   <div class="container">
      <div class="contact-top-wrap">
         <div class="row">
            <div class="col-xl-5 col-lg-6">
             
                  <div class="contact-content-right">
                     <h4 class="contact-tab-title">Get In Touch</h4>
                     <div class="contact-content-item p-relative">
                        <i class="flaticon-phone-call"></i>
                        <a href="tel:00181876543210">
                        00181876543210
                        </a>
                     </div>
                     <div class="contact-content-item p-relative">
                        <i class="flaticon-envelope"></i>
                        <a href="mailto:info@environment.gov.ng">
                           <span class="__cf_email__" data-cfemail="691f001a080a06070a060419080710290e04080005470a0604">info@environment.gov.ng</span>
                        </a>
                     </div>
                     <div class="contact-content-item p-relative">
                        <i class="flaticon-map"></i>
                        <a href="#"
                           target="_blank">
                     Federal Ministry of Environment Headquarters 3FH3+WC8, Mabushi 900108, Abuja
                        </a>
                     </div>
                   
                    
                  </div>
              
            </div>
            <div class="col-xl-7 col-lg-6">
               <div class="contact-wrapper">
                  <form action="contact.html#">
                     <div class="tp-contact-2-form">
                        <div class="row">
                           <div class="col-xl-6 col-lg-6">
                              <div class="tp-contact-2-input p-relative">
                                 <input type="text" placeholder="Name">
                                 <span><i class="fal fa-user"></i></span>
                              </div>
                           </div>
                           <div class="col-xl-6 col-lg-6">
                              <div class="tp-contact-2-input p-relative">
                                 <input type="email" placeholder="Email Address">
                                 <span><i class="fa-light fa-envelope"></i></span>
                              </div>
                           </div>
                           <div class="col-xl-6 col-lg-6">
                              <div class="tp-contact-2-input p-relative">
                                 <input type="text" placeholder="Phone">
                                 <span><i class="flaticon-phone-call-1"></i></span>
                              </div>
                           </div>
                           <div class="col-xl-6 col-lg-6">
                              <div class="tp-contact-2-input p-relative">
                                 <input type="text" placeholder="Subject">
                                 <span><i class="fa-sharp fa-light fa-circle-info"></i></span>
                              </div>
                           </div>
                           <div class="col-xl-12">
                              <div class="tp-contact-2-input p-relative">
                                 <textarea placeholder="How can we help you? Feel free to get in touch!"></textarea>
                                 <span class="icon-1"><i class="fa-light fa-pen"></i></span>
                              </div>
                           </div>
                           <div class="tp-contact-2-btn">
                              <button class="tp-btn-xl green-anim">Send Message</button>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <div class="container-fluid p-0">
         <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3939.823907832437!2d7.4509930737532235!3d9.079801288194268!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e0b37df1f06d3%3A0x52b22d979d2b8bec!2sFederal%20Ministry%20of%20Environment%20Headquaters!5e0!3m2!1sen!2sng!4v1731480750157!5m2!1sen!2sng" style="width: 100%; height: 500px; border: none; border-radius: 8px;"  allowfullscreen=""></iframe>

            </div>
         </div>
      </div>
      </div>
   </div>
</div>
<!-- contact area end -->

</main>
@endsection