@extends('components.layouts.app')
@section('PageTitle', $page->title)

@section('pageContent')
<main>

@if(isset($page->enable_slider) && $page->enable_slider && isset($sliderImages) && !empty($sliderImages))
    {{-- HERO SLIDER AREA --}}
    <section class="tp-slider-area">
        <div class="tp-slider-wrapper p-relative">
            {{-- Meta Info --}}
            <div class="tp-slider-meta-box d-none d-md-block">
                <div class="tp-slider-meta d-flex align-items-center">
                    <div class="tp-slider-meta-icon">
                        <i class="flaticon-sun"></i>
                    </div>
                    <div class="tp-slider-meta-content">
                        <span id="weather-time">30°C<br>12:14 Local Time</span>
                    </div>
                </div>
            </div>
            
            {{-- Slider Navigation Arrows --}}
            <div class="tp-slider-arrow-box">
                <button class="slider-prev"><i class="fa-solid fa-angle-left"></i></button>
                <button class="slider-next"><i class="fa-solid fa-angle-right"></i></button>
            </div>
            
            {{-- Decoration Shape --}}
            <div class="tp-slider-shape-5">
                <img src="{{ asset('MainAssets/img/slider/slider-new1.png') }}" alt="Slider Decoration">
            </div>
            
            {{-- Swiper Container --}}
            <div class="swiper-container tp-slider-active">
                <div class="swiper-wrapper">
                    @foreach($sliderImages as $slide)
                        <div class="swiper-slide">
                            <div class="tp-slider-bg d-flex justify-content-center align-items-center p-relative fix" 
                                 style="background-image: url('{{ $slide['image'] ?? asset('MainAssets/img/slider/default-slide.jpg') }}');">
                                <div class="tp-slider-img" style="background-image: url('{{ $slide['image'] ?? asset('MainAssets/img/slider/default-slide.jpg') }}');"></div>
                                <div class="tp-slider-shape-1 z-index-1"><img src="{{ asset('MainAssets/img/slider/slider-shape-1-1.png') }}" alt=""></div>
                                <div class="tp-slider-shape-2 z-index-2"><img src="{{ asset('MainAssets/img/slider/slider-shape-1-2.png') }}" alt=""></div>
                                <div class="tp-slider-shape-3 z-index-1"><img src="{{ asset('MainAssets/img/slider/slider-shape-1-3.png') }}" alt=""></div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xl-9 col-lg-10 col-md-12">
                                            <div class="tp-slider-content-wrap p-relative z-index-2">
                                                <div class="tp-slider-shape-1"><img src="{{ asset('MainAssets/img/slider/slider-shape-1-4.png') }}" alt=""></div>
                                                <div class="tp-slider-title-box p-relative">
                                                    @if(!empty($slide['caption']))
                                                        <span class="tp-slider-subtitle text-uppercase">{{ $slide['caption'] }}</span>
                                                    @endif
                                                    @if(!empty($slide['title']))
                                                        <h4 class="tp-slider-title">{{ $slide['title'] }}</h4>
                                                    @endif
                                                </div>
                                                <div class="tp-slider-video-box d-flex align-items-center">
                                                    @if(!empty($slide['link']))
                                                        <div class="tp-slider-btn">
                                                            <a class="tp-btn-xl mr-30" href="{{ $slide['link'] }}">Discover More</a>
                                                        </div>
                                                    @endif
                                                    @if(!empty($slide['media_link']))
                                                        <div class="tp-slider-video d-flex align-items-center">
                                                            <a class="popup-video video-animation" href="{{ $slide['media_link'] }}" target="_blank" rel="noopener noreferrer">
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
@elseif((isset($page->hero_bg) && $page->hero_bg) || (isset($page->hero_title) && $page->hero_title))
    {{-- HERO SECTION WITHOUT SLIDER --}}
    <section class="tp-hero-area">
        <div class="tp-hero-bg d-flex justify-content-center align-items-center p-relative fix"
             @if(isset($page->hero_bg) && $page->hero_bg)
                 style="background-image: url('{{ $page->hero_bg }}');"
             @else
                 style="background-image: url('{{ asset('MainAssets/img/department/landscape-2.webp') }}');"
             @endif>
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-10 col-md-12">
                        <div class="tp-hero-content-wrap text-center">
                            <div class="tp-hero-title-box">
                                @if(isset($page->hero_subtitle) && $page->hero_subtitle)
                                    <span class="tp-hero-subtitle text-uppercase">{{ $page->hero_subtitle }}</span>
                                @endif
                                <h1 class="tp-hero-title">{{ $page->hero_title ?? $page->title }}</h1>
                            </div>
                            @if(isset($page->hero_button_text) && $page->hero_button_text && isset($page->hero_button_url) && $page->hero_button_url)
                                <div class="tp-hero-btn">
                                    <a class="tp-btn-xl" href="{{ $page->hero_button_url }}">{{ $page->hero_button_text }}</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

{{-- PAGE CONTENT SECTION --}}
@if((isset($page->excerpt) && $page->excerpt) || (isset($page->body) && $page->body))
    <section class="tp-about-area pt-120 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if(isset($page->excerpt) && $page->excerpt)
                        <div class="tp-section-title-wrapper mb-50 text-center">
                            <div class="tp-section-subtitle">
                                <span class="tp-section-subtitle-icon">
                                    <i class="flaticon-star"></i>
                                </span>
                                <span class="tp-section-subtitle-text">About Us</span>
                            </div>
                            <h2 class="tp-section-title">{{ $page->excerpt }}</h2>
                            <div class="tp-section-title-line">
                                <span></span>
                            </div>
                        </div>
                    @endif
                    @if(isset($page->body) && $page->body)
                        <div class="tp-about-content-wrapper">
                            <div class="tp-about-content">
                                {!! $page->body !!}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endif

{{-- FEATURED IMAGE SECTION --}}
@if(isset($page->featured_image) && $page->featured_image)
    <section class="tp-feature-area pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tp-feature-img-wrapper">
                        <div class="tp-feature-img">
                            <img src="{{ $page->featured_image }}" alt="{{ $page->title }}" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

{{-- GALLERY SECTION --}}
@if(isset($page->gallery_images) && is_array($page->gallery_images) && count($page->gallery_images) > 0)
    <section class="tp-gallery-area pt-120 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tp-section-title-wrapper text-center mb-60">
                        <div class="tp-section-subtitle">
                            <span class="tp-section-subtitle-icon">
                                <i class="flaticon-gallery"></i>
                            </span>
                            <span class="tp-section-subtitle-text">Our Gallery</span>
                        </div>
                        <h3 class="tp-section-title">Visual Journey</h3>
                        <div class="tp-section-title-line">
                            <span></span>
                        </div>
                        <p class="tp-section-description">Explore our collection of memorable moments and achievements</p>
                    </div>
                </div>
            </div>
            <div class="row tp-gallery-masonry">
                @foreach($page->gallery_images as $index => $image)
                    <div class="col-lg-4 col-md-6 mb-30 tp-gallery-item-wrapper" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="tp-gallery-item">
                            <div class="tp-gallery-img">
                                <img src="{{ $image }}" alt="Gallery Image {{ $index + 1 }}" class="img-fluid">
                                <div class="tp-gallery-overlay">
                                    <div class="tp-gallery-overlay-content">
                                        <a href="{{ $image }}" class="tp-gallery-zoom" data-lightbox="gallery" data-title="Gallery Image {{ $index + 1 }}">
                                            <i class="fa-solid fa-magnifying-glass-plus"></i>
                                        </a>
                                        <div class="tp-gallery-info">
                                            <span class="tp-gallery-number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

{{-- REUSABLE COMPONENTS SECTION --}}
@if(isset($page->reusable_components) && is_array($page->reusable_components) && count($page->reusable_components) > 0)
    @foreach($page->reusable_components as $component)
        @if(view()->exists('components.blocks.' . $component))
            @include('components.blocks.' . $component)
        @endif
    @endforeach
@endif

{{-- CONTACT FORM SECTION --}}
@if(isset($page->contact_form_enabled) && $page->contact_form_enabled)
    <section class="tp-contact-area pt-120 pb-120" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="tp-contact-wrapper">
                        <div class="tp-section-title-wrapper text-center mb-50">
                            <div class="tp-section-subtitle">
                                <span class="tp-section-subtitle-icon">
                                    <i class="flaticon-mail"></i>
                                </span>
                                <span class="tp-section-subtitle-text">Get In Touch</span>
                            </div>
                            <h3 class="tp-section-title">{{ $page->contact_form_subject ?? 'Contact Us' }}</h3>
                            <div class="tp-section-title-line">
                                <span></span>
                            </div>
                            <p class="tp-section-description">We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
                        </div>
                        <div class="tp-contact-form">
                            <form action="#" method="POST">
                                @csrf
                                <input type="hidden" name="page_id" value="{{ $page->page_id }}">
                                
                                @if(isset($page->contact_form_fields) && is_array($page->contact_form_fields))
                                    @foreach($page->contact_form_fields as $field)
                                        <div class="tp-contact-input mb-20">
                                            @if(($field['type'] ?? '') === 'textarea')
                                                <textarea name="{{ $field['name'] ?? '' }}" 
                                                        placeholder="{{ $field['label'] ?? '' }}"
                                                        {{ ($field['required'] ?? false) ? 'required' : '' }}></textarea>
                                            @else
                                                <input type="{{ $field['type'] ?? 'text' }}" 
                                                     name="{{ $field['name'] ?? '' }}" 
                                                     placeholder="{{ $field['label'] ?? '' }}"
                                                     {{ ($field['required'] ?? false) ? 'required' : '' }}>
                                            @endif
                                        </div>
                                    @endforeach
                                @else
                                    <div class="tp-contact-input mb-20">
                                        <input type="text" name="name" placeholder="Your Name" required>
                                    </div>
                                    <div class="tp-contact-input mb-20">
                                        <input type="email" name="email" placeholder="Your Email" required>
                                    </div>
                                    <div class="tp-contact-input mb-20">
                                        <textarea name="message" placeholder="Your Message" required></textarea>
                                    </div>
                                @endif
                                
                                <div class="tp-contact-btn text-center">
                                    <button type="submit" class="tp-btn-xl">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

{{-- NEWSLETTER SECTION --}}
@if(isset($page->newsletter_enabled) && $page->newsletter_enabled)
    <section class="tp-newsletter-area pt-80 pb-80" style="background: linear-gradient(135deg, #1e7e34 0%, #155724 100%); position: relative; overflow: hidden;">
        <div class="tp-newsletter-shape">
            <div class="tp-newsletter-shape-1"></div>
            <div class="tp-newsletter-shape-2"></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="tp-newsletter-wrapper text-center">
                        <div class="tp-section-title-wrapper mb-40">
                            <div class="tp-section-subtitle tp-section-subtitle-white">
                                <span class="tp-section-subtitle-icon">
                                    <i class="flaticon-newsletter"></i>
                                </span>
                                <span class="tp-section-subtitle-text">Stay Connected</span>
                            </div>
                            <h4 class="tp-section-title tp-section-title-white">Subscribe to Our Newsletter</h4>
                            <div class="tp-section-title-line tp-section-title-line-white">
                                <span></span>
                            </div>
                            <p class="tp-section-description tp-section-description-white">Stay updated with our latest news, updates, and exclusive offers delivered straight to your inbox.</p>
                        </div>
                        <div class="tp-newsletter-form">
                            <form action="#" method="POST">
                                @csrf
                                <div class="tp-newsletter-input d-flex">
                                    <input type="email" name="newsletter_email" placeholder="Enter your email" required>
                                    <button type="submit" class="tp-btn">
                                        Subscribe <i class="fa-solid fa-angle-right"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

</main>

{{-- Custom CSS if provided --}}
@if(isset($page->custom_css) && $page->custom_css)
    @push('styles')
    <style>
        {!! $page->custom_css !!}
    </style>
    @endpush
@endif

{{-- Custom JavaScript if provided --}}
@if(isset($page->custom_js) && $page->custom_js)
    @push('scripts')
    <script>
        {!! $page->custom_js !!}
    </script>
    @endpush
@endif

@endsection

@push('styles')
<style>
/* Landing Page Specific Styles */
.tp-slider-title {
    font-size: 2.5rem;
    line-height: 1.2;
    font-weight: 700;
    margin-bottom: 20px;
}

/* Featured Image Enhancement */
.tp-feature-img-wrapper {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 15px 50px rgba(0, 0, 0, 0.15);
    transition: all 0.4s ease;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 20px;
}

.tp-feature-img-wrapper:hover {
    transform: translateY(-8px);
    box-shadow: 0 25px 70px rgba(30, 126, 52, 0.2);
}

.tp-feature-img {
    border-radius: 15px;
    overflow: hidden;
    position: relative;
    background: #fff;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
}

.tp-feature-img::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(30, 126, 52, 0.05) 0%, rgba(255, 193, 7, 0.05) 100%);
    z-index: 2;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.tp-feature-img:hover::before {
    opacity: 1;
}

.tp-feature-img img {
    width: 100%;
    height: 450px;
    object-fit: cover;
    object-position: center;
    transition: transform 0.4s ease;
    display: block;
}

.tp-feature-img:hover img {
    transform: scale(1.05);
}

/* Responsive Featured Image */
@media (max-width: 1200px) {
    .tp-feature-img img {
        height: 400px;
    }
}

@media (max-width: 992px) {
    .tp-feature-img img {
        height: 350px;
    }
    
    .tp-feature-img-wrapper {
        padding: 15px;
    }
}

@media (max-width: 768px) {
    .tp-feature-img img {
        height: 280px;
    }
    
    .tp-feature-img-wrapper {
        padding: 12px;
        border-radius: 15px;
    }
    
    .tp-feature-img {
        border-radius: 12px;
    }
}

@media (max-width: 576px) {
    .tp-feature-img img {
        height: 220px;
    }
    
    .tp-feature-img-wrapper {
        padding: 10px;
        border-radius: 12px;
    }
    
    .tp-feature-img {
        border-radius: 10px;
    }
}

@media (min-width: 768px) {
    .tp-slider-title {
        font-size: 3.5rem;
    }
}

@media (min-width: 1200px) {
    .tp-slider-title {
        font-size: 4rem;
    }
}

.tp-slider-subtitle {
    font-size: 1rem;
    font-weight: 600;
    color: #ffc107;
    margin-bottom: 10px;
    display: block;
}

.tp-slider-video-box {
    margin-top: 30px;
}

.tp-slider-btn .tp-btn-xl {
    margin-right: 30px;
}

.tp-slider-video {
    color: #fff;
}

.tp-slider-video a {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 15px;
    transition: all 0.3s ease;
}

.tp-slider-video a:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: scale(1.1);
}

.tp-slider-arrow-box {
    position: absolute;
    top: 50%;
    left: 50px;
    right: 50px;
    transform: translateY(-50%);
    z-index: 10;
    pointer-events: none;
}

.tp-slider-arrow-box button {
    position: absolute;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.9);
    border: none;
    color: #333;
    font-size: 18px;
    cursor: pointer;
    transition: all 0.3s ease;
    pointer-events: all;
}

.tp-slider-arrow-box .slider-prev {
    left: 0;
}

.tp-slider-arrow-box .slider-next {
    right: 0;
}

.tp-slider-arrow-box button:hover {
    background: #fff;
    transform: scale(1.1);
}

.tp-slider-meta-box {
    position: absolute;
    top: 30px;
    right: 30px;
    z-index: 10;
}

.tp-slider-meta {
    background: rgba(255, 255, 255, 0.9);
    padding: 15px 20px;
    border-radius: 10px;
    color: #333;
}

.tp-slider-meta-icon {
    margin-right: 10px;
    font-size: 24px;
    color: #ffc107;
}

.tp-hero-area {
    min-height: 600px;
    display: flex;
    align-items: center;
}

.tp-hero-bg {
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    min-height: 600px;
    position: relative;
}

.tp-hero-bg::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.4);
}

.tp-hero-content-wrap {
    position: relative;
    z-index: 2;
    color: #fff;
}

.tp-hero-title {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 30px;
}

.tp-hero-subtitle {
    font-size: 1.1rem;
    font-weight: 600;
    color: #ffc107;
    margin-bottom: 15px;
    display: block;
}

/* Enhanced Section Styling */
.tp-section-subtitle {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: linear-gradient(135deg, rgba(30, 126, 52, 0.1) 0%, rgba(255, 193, 7, 0.1) 100%);
    padding: 8px 20px;
    border-radius: 25px;
    margin-bottom: 20px;
    border: 1px solid rgba(30, 126, 52, 0.2);
}

.tp-section-subtitle-icon {
    color: #1e7e34;
    font-size: 1.1rem;
}

.tp-section-subtitle-text {
    color: #1e7e34;
    font-weight: 600;
    font-size: 0.95rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.tp-section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 20px;
    position: relative;
}

.tp-section-title-line {
    display: flex;
    justify-content: center;
    margin-bottom: 20px;
}

.tp-section-title-line span {
    width: 80px;
    height: 3px;
    background: linear-gradient(90deg, #1e7e34 0%, #ffc107 100%);
    border-radius: 2px;
    position: relative;
}

.tp-section-title-line span::before {
    content: '';
    position: absolute;
    left: -10px;
    top: 50%;
    transform: translateY(-50%);
    width: 8px;
    height: 8px;
    background: #1e7e34;
    border-radius: 50%;
}

.tp-section-title-line span::after {
    content: '';
    position: absolute;
    right: -10px;
    top: 50%;
    transform: translateY(-50%);
    width: 8px;
    height: 8px;
    background: #ffc107;
    border-radius: 50%;
}

.tp-section-description {
    color: #666;
    font-size: 1.1rem;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

.tp-about-content-wrapper {
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
    padding: 50px;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
    border-top: 4px solid #1e7e34;
    position: relative;
    overflow: hidden;
}

.tp-about-content-wrapper::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 100%;
    height: 100%;
    background: radial-gradient(circle, rgba(30, 126, 52, 0.03) 0%, transparent 70%);
    z-index: 1;
}

.tp-about-content {
    font-size: 1.1rem;
    line-height: 1.8;
    position: relative;
    z-index: 2;
}

/* Enhanced Gallery Styling */
.tp-gallery-masonry {
    position: relative;
}

.tp-gallery-item-wrapper {
    transition: transform 0.3s ease;
}

.tp-gallery-item {
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
    transition: all 0.4s ease;
    position: relative;
    background: #fff;
}

.tp-gallery-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 50px rgba(30, 126, 52, 0.2);
}

.tp-gallery-img {
    position: relative;
    overflow: hidden;
}

.tp-gallery-item img {
    width: 100%;
    height: 280px;
    object-fit: cover;
    object-position: center;
    transition: transform 0.4s ease;
}

.tp-gallery-item:hover img {
    transform: scale(1.1);
}

.tp-gallery-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(30, 126, 52, 0.85) 0%, rgba(255, 193, 7, 0.85) 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.tp-gallery-item:hover .tp-gallery-overlay {
    opacity: 1;
}

.tp-gallery-overlay-content {
    text-align: center;
    color: white;
}

.tp-gallery-zoom {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 60px;
    height: 60px;
    background: rgba(255, 255, 255, 0.2);
    border: 2px solid rgba(255, 255, 255, 0.5);
    border-radius: 50%;
    color: white;
    font-size: 1.3rem;
    text-decoration: none;
    transition: all 0.3s ease;
    margin-bottom: 15px;
}

.tp-gallery-zoom:hover {
    background: rgba(255, 255, 255, 0.3);
    border-color: rgba(255, 255, 255, 0.8);
    transform: scale(1.1);
    color: white;
}

.tp-gallery-info {
    margin-top: 10px;
}

.tp-gallery-number {
    font-size: 1.1rem;
    font-weight: 600;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
}

/* Responsive Gallery */
@media (max-width: 992px) {
    .tp-gallery-item img {
        height: 250px;
    }
    
    .tp-about-content-wrapper {
        padding: 40px 30px;
    }
}

@media (max-width: 768px) {
    .tp-gallery-item img {
        height: 220px;
    }
    
    .tp-section-title {
        font-size: 2rem;
    }
    
    .tp-about-content-wrapper {
        padding: 30px 20px;
        border-radius: 15px;
    }
    
    .tp-gallery-zoom {
        width: 50px;
        height: 50px;
        font-size: 1.1rem;
    }
}

@media (max-width: 576px) {
    .tp-gallery-item img {
        height: 200px;
    }
    
    .tp-section-title {
        font-size: 1.8rem;
    }
    
    .tp-about-content-wrapper {
        padding: 25px 15px;
    }
    
    .tp-gallery-item {
        border-radius: 12px;
    }
}

.tp-gallery-item {
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.tp-gallery-item:hover {
    transform: translateY(-5px);
}

.tp-gallery-item img {
    width: 100%;
    height: 250px;
    object-fit: cover;
}

/* Enhanced Contact Form Styling */
.tp-contact-wrapper {
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    padding: 60px;
    border-radius: 20px;
    box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
    border-top: 4px solid #1e7e34;
    position: relative;
    overflow: hidden;
}

.tp-contact-wrapper::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 100%;
    height: 100%;
    background: radial-gradient(circle, rgba(30, 126, 52, 0.03) 0%, transparent 70%);
    z-index: 1;
}

.tp-contact-form {
    position: relative;
    z-index: 2;
}

.tp-contact-input {
    position: relative;
    margin-bottom: 25px;
}

.tp-contact-input input,
.tp-contact-input textarea {
    width: 100%;
    padding: 18px 20px;
    border: 2px solid #e9ecef;
    border-radius: 12px;
    font-size: 16px;
    transition: all 0.3s ease;
    background: #fff;
    font-family: inherit;
}

.tp-contact-input input:focus,
.tp-contact-input textarea:focus {
    outline: none;
    border-color: #1e7e34;
    box-shadow: 0 0 0 3px rgba(30, 126, 52, 0.1);
    transform: translateY(-2px);
}

.tp-contact-input textarea {
    min-height: 120px;
    resize: vertical;
}

.tp-newsletter-input {
    max-width: 500px;
    margin: 0 auto;
    position: relative;
}

.tp-newsletter-input input {
    flex: 1;
    padding: 15px 20px;
    border: 1px solid #ddd;
    border-radius: 50px 0 0 50px;
    font-size: 16px;
}

.tp-newsletter-input button {
    padding: 15px 30px;
    border-radius: 0 50px 50px 0;
    border: none;
    background: #1e7e34;
    color: #fff;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.3s ease;
}

.tp-newsletter-input button:hover {
    background: #155724;
}

@media (max-width: 767px) {
    .tp-slider-video-box {
        flex-direction: column;
        align-items: center;
    }
    
    .tp-slider-btn {
        margin-bottom: 20px;
        margin-right: 0 !important;
    }
    
    .tp-hero-title {
        font-size: 2rem;
    }
    
    .tp-contact-wrapper {
        padding: 30px 20px;
    }
    
    .tp-newsletter-input {
        flex-direction: column;
    }
    
    .tp-newsletter-input input {
        border-radius: 8px;
        margin-bottom: 15px;
    }
    
    .tp-newsletter-input button {
        border-radius: 8px;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Weather and time update
    function updateWeatherAndTime() {
        const temperature = Math.floor(Math.random() * 36) + 15; // 15°C to 50°C
        const now = new Date();
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const localTime = `${hours}:${minutes} Local Time`;
        
        const weatherElement = document.getElementById('weather-time');
        if (weatherElement) {
            weatherElement.innerHTML = `${temperature}°C<br>${localTime}`;
        }
    }
    
    // Update immediately and then every minute
    updateWeatherAndTime();
    setInterval(updateWeatherAndTime, 60000);
    
    // Slider navigation
    const sliderPrev = document.querySelector('.slider-prev');
    const sliderNext = document.querySelector('.slider-next');
    const sliderWrapper = document.querySelector('.swiper-wrapper');
    const slides = document.querySelectorAll('.swiper-slide');
    
    if (slides.length > 1) {
        let currentSlide = 0;
        
        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.style.display = i === index ? 'block' : 'none';
            });
        }
        
        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }
        
        function prevSlide() {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(currentSlide);
        }
        
        if (sliderNext) {
            sliderNext.addEventListener('click', nextSlide);
        }
        
        if (sliderPrev) {
            sliderPrev.addEventListener('click', prevSlide);
        }
        
        // Initialize first slide
        showSlide(0);
        
        // Auto-play slider
        setInterval(nextSlide, 5000);
    }
});
</script>
@endpush