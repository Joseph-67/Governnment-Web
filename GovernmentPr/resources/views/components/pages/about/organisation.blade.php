@extends('components.layouts.app')
@section('PageTitle', 'organisation')
@section('pageContent')

<main>

<!-- breadcrumb area start -->
<div class="breadcrumb__area breadcrumb__overlay breadcrumb__height p-relative fix" data-background="{{asset('MainAssets/img/department/departments-1.jpg')}}">
   <div class="container">
      <div class="row">
         <div class="col-xxl-12">
            <div class="breadcrumb__content z-index text-center">
               <h3 class="breadcrumb__title">ORGANISATION</h3>
               <div class="breadcrumb__list">
                  <span><a href="index.html">Home</a></span>
                  <span class="dvdr"><i class="fa fa-angle-right"></i></span>
                  <span>organisation</span>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- breadcrumb area end -->

<!-- departments area start -->
<div class="tp-department-area pt-120 pb-120">
   <div class="container">
      <div class="row">
         <div class="col-xl-12">
            <div class="dp-top-thumb mb-50">
               <img src="{{asset('MainAssets/img/department/organogram1.jpeg')}}" alt="">
            </div>
         </div>
      </div>
 
   </div>
</div>
<!-- departments area end -->


</main
@endsection