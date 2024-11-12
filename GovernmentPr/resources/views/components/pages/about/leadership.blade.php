@extends('componets/layouts,app')
@section('pageContent')
<!-- team area start -->
<div class="tp-team-2-area pt-115 pb-90">
   <div class="container">
      <div class="row">
         <div class="col-xl-12">
            <div class="tp-team-section-title text-center mb-55">
               <span class="tp-section-subtitle">our team members</span>
               <h4 class="tp-section-title">Let’s Meet With Our Best <br>City Councl Member</h4>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
            <div class="tp-team-2-item fix p-relative">
               <div class="tp-team-2-thumb-box fix">
                  <img class="w-100" src="{{asset('MainAssets/img/team/team-details-1.jpg')}}" alt="">
               </div>
               <div class="tp-team-2-content text-center">
                  <h4 class="tp-team-2-title"><a href="team-details.html">Rose Gardner</a></h4>
                  <span>Advisor</span>
                  <div class="tp-team-2-social-box">
                     <button><i class="fa-solid fa-share-nodes"></i></button>
                     <div class="tp-team-2-social">
                        <a class="icon-1" href="index.html#"><i class="fa-brands fa-facebook-f"></i></a>
                        <a class="icon-2" href="index.html#"><i class="fa-brands fa-instagram"></i></a>
                        <a class="icon-3" href="index.html#"><i class="fa-brands fa-linkedin-in"></i></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".5s">
            <div class="tp-team-2-item fix p-relative">
               <div class="tp-team-2-thumb-box fix">
                  <img class="w-100" src="{{asset('MainAssets/img/team/team-details-2.jpg')}}" alt="">
               </div>
               <div class="tp-team-2-content text-center">
                  <h4 class="tp-team-2-title"><a href="team-details.html">Tasha Baily</a></h4>
                  <span>Mayor</span>
                  <div class="tp-team-2-social-box">
                     <button><i class="fa-solid fa-share-nodes"></i></button>
                     <div class="tp-team-2-social">
                        <a class="icon-1" href="index.html#"><i class="fa-brands fa-facebook-f"></i></a>
                        <a class="icon-2" href="index.html#"><i class="fa-brands fa-instagram"></i></a>
                        <a class="icon-3" href="index.html#"><i class="fa-brands fa-linkedin-in"></i></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".7s">
            <div class="tp-team-2-item fix p-relative">
               <div class="tp-team-2-thumb-box fix">
                  <img class="w-100" src="{{asset('MainAssets/img/team/team-details-3.jpg')}}" alt="">
               </div>
               <div class="tp-team-2-content text-center">
                  <h4 class="tp-team-2-title"><a href="team-details.html">Dan Hodges</a></h4>
                  <span>Councilor</span>
                  <div class="tp-team-2-social-box">
                     <button><i class="fa-solid fa-share-nodes"></i></button>
                     <div class="tp-team-2-social">
                        <a class="icon-1" href="index.html#"><i class="fa-brands fa-facebook-f"></i></a>
                        <a class="icon-2" href="index.html#"><i class="fa-brands fa-instagram"></i></a>
                        <a class="icon-3" href="index.html#"><i class="fa-brands fa-linkedin-in"></i></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- team area end -->

@endsection