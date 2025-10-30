@extends('components.layouts.app')
@section('PageTitle', $page->title)

@section('pageContent')
<!-- @php
    // Helper function to get gallery images as array
    $getGalleryImages = function($galleryData) {
        if (is_string($galleryData)) {
            return json_decode($galleryData, true) ?? [];
        }
        if (is_array($galleryData)) {
            return $galleryData;
        }
        return [];
    };
    
    $galleryImages = $getGalleryImages($page->gallery_images ?? null);
@endphp -->

<main>

{{-- Debug Section - Remove this after fixing --}}
<!-- @if(config('app.debug'))
    <div class="container mt-3">
        <div class="alert alert-success">
            <h5>Fixed Gallery Images Debug:</h5>
            <p><strong>Original Type:</strong> {{ gettype($page->gallery_images ?? 'undefined') }}</p>
            <p><strong>Processed Array Count:</strong> {{ count($galleryImages) }}</p>
            <p><strong>Gallery Images:</strong></p>
            <ul>
                @foreach($galleryImages as $img)
                    <li>{{ $img }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif -->

@if(isset($page->enable_slider) && $page->enable_slider && isset($sliderImages) && !empty($sliderImages))
    <!-- Image Slider Section -->
    <section class="slider__area p-relative">
        <div class="slider__wrapper">
            <div class="slider__container">
                @foreach($sliderImages as $index => $slide)
                    <div class="slider__item {{ $index === 0 ? 'active' : '' }}" 
                         style="background-image: url('{{ $slide['image'] ?? asset('MainAssets/img/slider/default-slide.jpg') }}');">
                        <div class="container">
                            <div class="row">
                                <div class="col-xxl-12">
                                    <div class="breadcrumb__content z-index text-center">
                                        @if(!empty($slide['title']))
                                            <h3 class="breadcrumb__title">{{ $slide['title'] }}</h3>
                                        @endif
                                        @if(!empty($slide['caption']))
                                            <p>{{ $slide['caption'] }}</p>
                                        @endif
                                        @if(!empty($slide['link']))
                                            <div class="breadcrumb__list">
                                                <a href="{{ $slide['link'] }}" class="tp-btn">Learn More</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Slider Navigation -->
            @if(count($sliderImages) > 1)
                <div class="postbox__slider-arrow-wrap">
                    <button class="postbox-arrow-prev slider-prev-btn">
                        <i class="fa-solid fa-angle-left"></i>
                    </button>
                    <button class="postbox-arrow-next slider-next-btn">
                        <i class="fa-solid fa-angle-right"></i>
                    </button>
                </div>
            @endif
        </div>
    </section>
@elseif((isset($page->hero_bg) && $page->hero_bg) || (isset($page->hero_title) && $page->hero_title))
    <!-- Hero Section -->
    <div class="breadcrumb__area breadcrumb__overlay breadcrumb__height p-relative fix"
         @if(isset($page->hero_bg) && $page->hero_bg)
             data-background="{{ $page->hero_bg }}"
         @else
             data-background="{{ asset('MainAssets/img/department/landscape-2.webp') }}"
         @endif>
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content z-index text-center">
                        <h3 class="breadcrumb__title">
                            {{ $page->hero_title ?? $page->title }}
                        </h3>
                        @if(isset($page->hero_subtitle) && $page->hero_subtitle)
                            <p>{{ $page->hero_subtitle }}</p>
                        @endif
                        <div class="breadcrumb__list">
                            <span><a href="{{ url('/') }}">Home</a></span>
                            <span class="dvdr"><i class="fa fa-angle-right"></i></span>
                            <span>{{ $page->title }}</span>
                        </div>
                        @if(isset($page->hero_button_text) && $page->hero_button_text && isset($page->hero_button_url) && $page->hero_button_url)
                            <div class="breadcrumb__btn mt-30">
                                <a href="{{ $page->hero_button_url }}" class="tp-btn">
                                    {{ $page->hero_button_text }}
                                    <svg width="26" height="19" viewBox="0 0 26 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.54688 10.2031L12.7969 16.4531C13.9688 17.625 16 16.8047 16 15.125V12.3516C20.6094 12.5469 20.7266 13.5625 20.0625 15.8672C19.5547 17.5469 21.4688 18.9141 22.9141 17.9375C24.9062 16.5703 26 14.8516 26 12.3516C26 6.76562 21 5.67188 16 5.47656V2.66406C16 0.984375 13.9688 0.164062 12.7969 1.33594L6.54688 7.58594C5.80469 8.28906 5.80469 9.5 6.54688 10.2031ZM7.875 8.875L14.125 2.625V7.3125C18.8125 7.3125 24.125 7.58594 24.125 12.3516C24.125 14.5391 22.9922 15.6328 21.8594 16.375C23.4609 11.0625 19.4766 10.4375 14.125 10.4375V15.125L7.875 8.875ZM1.54688 7.58594C0.804688 8.28906 0.804688 9.5 1.54688 10.2031L7.79688 16.4531C8.57812 17.2734 9.75 17.1562 10.4531 16.4531L2.875 8.875L10.4531 1.33594C9.75 0.632812 8.57812 0.515625 7.79688 1.33594L1.54688 7.58594Z" fill="currentColor"></path>
                                    </svg>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <!-- Default Breadcrumb -->
    <div class="breadcrumb__area breadcrumb__overlay breadcrumb__height p-relative fix"
         data-background="{{ asset('MainAssets/img/department/landscape-2.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content z-index text-center">
                        <h3 class="breadcrumb__title">{{ $page->title }}</h3>
                        <div class="breadcrumb__list">
                            <span><a href="{{ url('/') }}">Home</a></span>
                            <span class="dvdr"><i class="fa fa-angle-right"></i></span>
                            <span>{{ $page->title }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<!-- postbox area start -->
<section class="postbox__area pt-120 pb-90">
    <div class="container">
        <div class="row">
            @if(isset($page->layout_style) && ($page->layout_style === 'sidebar-left' || $page->layout_style === 'sidebar-right'))
                @if(isset($page->layout_style) && $page->layout_style === 'sidebar-left')
                    <!-- Sidebar Left -->
                    <div class="col-xxl-4 col-xl-4 col-lg-4">
                        <div class="postbox__sidebar">
                            <div class="sidebar__widget mb-50">
                                <h3 class="sidebar__widget-title">Sidebar</h3>
                                <div class="sidebar__widget-content">
                                    <p>Sidebar widgets will be displayed here.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                
                <!-- Main Content -->
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    <div class="postbox__wrapper">
                        <article class="postbox__item format-image mb-50 transition-3">
                            @if(isset($page->featured_image) && $page->featured_image)
                                <div class="postbox__thumb mb-30">
                                    <div class="postbox__thumb-wrapper">
                                        <img src="{{ $page->featured_image }}" alt="{{ $page->title }}">
                                    </div>
                                </div>
                            @endif
                            
                            <div class="postbox__text">
                                @if(isset($page->excerpt) && $page->excerpt)
                                    <div class="postbox__excerpt mb-30">
                                        <p>{{ $page->excerpt }}</p>
                                    </div>
                                @endif
                                
                                <div class="postbox__content">
                                    {!! $page->body ?? '' !!}
                                </div>
                                
                                @if(count($galleryImages) > 0)
                                    <div class="postbox__gallery mt-40">
                                        <h4>Gallery</h4>
                                        <div class="row">
                                            @foreach($page->gallery_images as $image)
                                                <div class="col-md-4">
                                                    <div class="postbox__gallery-item mb-30">
                                                        <img src="{{ $image }}" alt="Gallery Image">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </article>
                    </div>
                </div>
                
                @if(isset($page->layout_style) && $page->layout_style === 'sidebar-right')
                    <!-- Sidebar Right -->
                    <div class="col-xxl-4 col-xl-4 col-lg-4">
                        <div class="postbox__sidebar">
                            <div class="sidebar__widget mb-50">
                                <h3 class="sidebar__widget-title">Sidebar</h3>
                                <div class="sidebar__widget-content">
                                    <p>Sidebar widgets will be displayed here.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @else
                <!-- Full Width Layout -->
                <div class="col-xxl-12 col-xl-12 col-lg-12">
                    <div class="postbox__wrapper">
                        <article class="postbox__item format-image mb-50 transition-3">
                            @if(isset($page->featured_image) && $page->featured_image)
                                <div class="postbox__thumb mb-30">
                                    <div class="postbox__thumb-wrapper">
                                        <img src="{{ $page->featured_image }}" alt="{{ $page->title }}">
                                    </div>
                                </div>
                            @endif
                            
                            <div class="postbox__text">
                                @if(isset($page->excerpt) && $page->excerpt)
                                    <div class="postbox__excerpt mb-30">
                                        <p>{{ $page->excerpt }}</p>
                                    </div>
                                @endif
                                
                                <div class="postbox__content">
                                    {!! $page->body ?? '' !!}
                                </div>
                                
                                @php $page->gallery_images = $galleryImages; @endphp
                                @if(count($galleryImages) > 0)
                                    <div class="postbox__gallery mt-40">
                                        <h4>Gallery</h4>
                                        <div class="row">
                                @foreach($galleryImages as $index => $image)
                                                <div class="col-md-4">
                                                    <div class="postbox__gallery-item mb-30">
                                                        <img src="{{ $image }}" alt="Gallery Image">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </article>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
<!-- postbox area end -->

@if(isset($page->contact_form_enabled) && $page->contact_form_enabled)
    <!-- contact area start -->
    <section class="contact__area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-8 offset-xxl-2 offset-xl-2 offset-lg-2">
                    <div class="contact__wrapper">
                        <div class="section__title-wrapper mb-40">
                            <h3 class="section__title">{{ $page->contact_form_subject ?? 'Contact Us' }}</h3>
                        </div>
                        <div class="contact__form">
                            <form action="#" method="POST">
                                @csrf
                                <input type="hidden" name="page_id" value="{{ $page->page_id }}">
                                
                                @if(isset($page->contact_form_fields) && is_array($page->contact_form_fields))
                                    @foreach($page->contact_form_fields as $field)
                                        <div class="contact__input">
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
                                    <!-- Default Contact Form Fields -->
                                    <div class="contact__input">
                                        <input type="text" name="name" placeholder="Your Name" required>
                                    </div>
                                    <div class="contact__input">
                                        <input type="email" name="email" placeholder="Your Email" required>
                                    </div>
                                    <div class="contact__input">
                                        <textarea name="message" placeholder="Your Message" required></textarea>
                                    </div>
                                @endif
                                
                                <div class="contact__btn">
                                    <button type="submit" class="tp-btn">Send Message 
                                        <svg width="26" height="19" viewBox="0 0 26 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.54688 10.2031L12.7969 16.4531C13.9688 17.625 16 16.8047 16 15.125V12.3516C20.6094 12.5469 20.7266 13.5625 20.0625 15.8672C19.5547 17.5469 21.4688 18.9141 22.9141 17.9375C24.9062 16.5703 26 14.8516 26 12.3516C26 6.76562 21 5.67188 16 5.47656V2.66406C16 0.984375 13.9688 0.164062 12.7969 1.33594L6.54688 7.58594C5.80469 8.28906 5.80469 9.5 6.54688 10.2031ZM7.875 8.875L14.125 2.625V7.3125C18.8125 7.3125 24.125 7.58594 24.125 12.3516C24.125 14.5391 22.9922 15.6328 21.8594 16.375C23.4609 11.0625 19.4766 10.4375 14.125 10.4375V15.125L7.875 8.875ZM1.54688 7.58594C0.804688 8.28906 0.804688 9.5 1.54688 10.2031L7.79688 16.4531C8.57812 17.2734 9.75 17.1562 10.4531 16.4531L2.875 8.875L10.4531 1.33594C9.75 0.632812 8.57812 0.515625 7.79688 1.33594L1.54688 7.58594Z" fill="currentColor"></path>
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact area end -->
@endif

</main>

@endsection

@push('styles')
<style>
/* Enhanced Page Content Styling */
.postbox__content {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #333;
}

.postbox__content h1,
.postbox__content h2,
.postbox__content h3,
.postbox__content h4,
.postbox__content h5,
.postbox__content h6 {
    color: #1e7e34;
    font-weight: 600;
    margin-top: 2rem;
    margin-bottom: 1rem;
    position: relative;
}

.postbox__content h1::after,
.postbox__content h2::after,
.postbox__content h3::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 50px;
    height: 3px;
    background: linear-gradient(90deg, #1e7e34 0%, #ffc107 100%);
    border-radius: 2px;
}

.postbox__content p {
    margin-bottom: 1.5rem;
    text-align: justify;
}

/* Enhanced List Styling with Custom Arrows */
.postbox__content ul {
    list-style: none;
    padding-left: 0;
    margin-bottom: 2rem;
}

.postbox__content ul li {
    position: relative;
    padding-left: 40px;
    margin-bottom: 15px;
    padding-top: 5px;
    padding-bottom: 5px;
    transition: all 0.3s ease;
}

.postbox__content ul li::before {
    content: '';
    position: absolute;
    left: 0;
    top: 8px;
    width: 20px;
    height: 15px;
    background-image: url("data:image/svg+xml,%3Csvg width='20' height='15' viewBox='0 0 16 15' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M15.794 2.17595C14.426 3.42395 13.094 4.87595 11.798 6.53195C10.67 7.95995 9.656 9.42395 8.756 10.924C7.94 12.268 7.346 13.42 6.974 14.38C6.962 14.416 6.938 14.446 6.902 14.47C6.866 14.506 6.824 14.524 6.776 14.524C6.764 14.536 6.752 14.542 6.74 14.542C6.656 14.542 6.596 14.518 6.56 14.47L0.134 7.93595C0.122 7.92395 0.278 7.76795 0.602 7.46795C0.926 7.15595 1.244 6.87395 1.556 6.62195C1.904 6.33395 2.09 6.20195 2.114 6.22595L5.642 8.99795C6.674 7.78595 7.832 6.58595 9.116 5.39795C11.048 3.62195 13.04 2.10995 15.092 0.861953C15.128 0.861953 15.266 1.02995 15.506 1.36595L15.866 1.88795C15.878 1.93595 15.878 1.98995 15.866 2.04995C15.854 2.09795 15.83 2.13995 15.794 2.17595Z' fill='%231e7e34'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-size: contain;
    transition: transform 0.3s ease;
}

.postbox__content ul li:hover::before {
    transform: translateX(5px);
}

.postbox__content ul li:hover {
    background: rgba(30, 126, 52, 0.05);
    padding-left: 45px;
    border-radius: 8px;
}

/* Ordered List Enhancement */
.postbox__content ol {
    counter-reset: custom-counter;
    list-style: none;
    padding-left: 0;
    margin-bottom: 2rem;
}

.postbox__content ol li {
    position: relative;
    padding-left: 50px;
    margin-bottom: 15px;
    padding-top: 8px;
    padding-bottom: 8px;
    counter-increment: custom-counter;
}

.postbox__content ol li::before {
    content: counter(custom-counter);
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 30px;
    height: 30px;
    background: linear-gradient(135deg, #1e7e34 0%, #ffc107 100%);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 0.9rem;
    box-shadow: 0 2px 8px rgba(30, 126, 52, 0.3);
}

/* Blockquote Enhancement */
.postbox__content blockquote {
    position: relative;
    background: linear-gradient(135deg, rgba(30, 126, 52, 0.05) 0%, rgba(255, 193, 7, 0.05) 100%);
    border-left: 4px solid #1e7e34;
    padding: 20px 30px;
    margin: 2rem 0;
    border-radius: 0 8px 8px 0;
    font-style: italic;
    font-size: 1.1rem;
}

.postbox__content blockquote::before {
    content: '"';
    position: absolute;
    top: -10px;
    left: 15px;
    font-size: 3rem;
    color: #1e7e34;
    font-weight: bold;
}

/* Link Enhancement */
.postbox__content a:not(.tp-btn):not([class*="btn"]) {
    color: #1e7e34;
    text-decoration: none;
    font-weight: 500;
    position: relative;
    transition: all 0.3s ease;
}

.postbox__content a:not(.tp-btn):not([class*="btn"]):hover {
    color: #ffc107;
    transform: translateX(3px);
}

.postbox__content a:not(.tp-btn):not([class*="btn"])::after {
    content: '';
    display: inline-block;
    width: 16px;
    height: 12px;
    margin-left: 5px;
    background-image: url("data:image/svg+xml,%3Csvg width='16' height='12' viewBox='0 0 16 12' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M15.5303 6.53033C15.8232 6.23744 15.8232 5.76256 15.5303 5.46967L10.7574 0.696699C10.4645 0.403806 9.98959 0.403806 9.6967 0.696699C9.40381 0.989593 9.40381 1.46447 9.6967 1.75736L13.9393 6L9.6967 10.2426C9.40381 10.5355 9.40381 11.0104 9.6967 11.3033C9.98959 11.5962 10.4645 11.5962 10.7574 11.3033L15.5303 6.53033ZM0 6.75H15V5.25H0V6.75Z' fill='%231e7e34'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-size: contain;
    vertical-align: middle;
    transition: transform 0.3s ease;
}

.postbox__content a:not(.tp-btn):not([class*="btn"]):hover::after {
    transform: translateX(3px);
    background-image: url("data:image/svg+xml,%3Csvg width='16' height='12' viewBox='0 0 16 12' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M15.5303 6.53033C15.8232 6.23744 15.8232 5.76256 15.5303 5.46967L10.7574 0.696699C10.4645 0.403806 9.98959 0.403806 9.6967 0.696699C9.40381 0.989593 9.40381 1.46447 9.6967 1.75736L13.9393 6L9.6967 10.2426C9.40381 10.5355 9.40381 11.0104 9.6967 11.3033C9.98959 11.5962 10.4645 11.5962 10.7574 11.3033L15.5303 6.53033ZM0 6.75H15V5.25H0V6.75Z' fill='%23ffc107'/%3E%3C/svg%3E");
}

/* Table Enhancement */
.postbox__content table {
    width: 100%;
    border-collapse: collapse;
    margin: 2rem 0;
    background: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.postbox__content table th {
    background: linear-gradient(135deg, #1e7e34 0%, #155724 100%);
    color: white;
    padding: 15px;
    text-align: left;
    font-weight: 600;
}

.postbox__content table td {
    padding: 12px 15px;
    border-bottom: 1px solid #eee;
    transition: background 0.3s ease;
}

.postbox__content table tr:hover td {
    background: rgba(30, 126, 52, 0.05);
}

/* Code Enhancement */
.postbox__content code {
    background: #f8f9fa;
    padding: 2px 6px;
    border-radius: 4px;
    font-family: 'Courier New', monospace;
    color: #e83e8c;
    border: 1px solid #e9ecef;
}

.postbox__content pre {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    overflow-x: auto;
    border-left: 4px solid #1e7e34;
    margin: 1.5rem 0;
}

/* Excerpt Enhancement */
.postbox__excerpt {
    background: linear-gradient(135deg, rgba(30, 126, 52, 0.08) 0%, rgba(255, 193, 7, 0.08) 100%);
    border-left: 4px solid #ffc107;
    padding: 20px 25px;
    border-radius: 0 8px 8px 0;
    margin-bottom: 2rem;
    position: relative;
}

.postbox__excerpt::before {
    content: '';
    position: absolute;
    top: 15px;
    right: 20px;
    width: 20px;
    height: 15px;
    background-image: url("data:image/svg+xml,%3Csvg width='20' height='15' viewBox='0 0 16 15' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M15.794 2.17595C14.426 3.42395 13.094 4.87595 11.798 6.53195C10.67 7.95995 9.656 9.42395 8.756 10.924C7.94 12.268 7.346 13.42 6.974 14.38C6.962 14.416 6.938 14.446 6.902 14.47C6.866 14.506 6.824 14.524 6.776 14.524C6.764 14.536 6.752 14.542 6.74 14.542C6.656 14.542 6.596 14.518 6.56 14.47L0.134 7.93595C0.122 7.92395 0.278 7.76795 0.602 7.46795C0.926 7.15595 1.244 6.87395 1.556 6.62195C1.904 6.33395 2.09 6.20195 2.114 6.22595L5.642 8.99795C6.674 7.78595 7.832 6.58595 9.116 5.39795C11.048 3.62195 13.04 2.10995 15.092 0.861953C15.128 0.861953 15.266 1.02995 15.506 1.36595L15.866 1.88795C15.878 1.93595 15.878 1.98995 15.866 2.04995C15.854 2.09795 15.83 2.13995 15.794 2.17595Z' fill='%23ffc107'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-size: contain;
}

.postbox__excerpt p {
    font-size: 1.2rem;
    font-weight: 500;
    color: #1e7e34;
    margin: 0;
    line-height: 1.6;
}

/* Enhanced Gallery Styling */
.postbox__gallery {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 40px;
    border-radius: 15px;
    margin-top: 3rem;
    border-top: 4px solid #1e7e34;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
}

.postbox__gallery-header {
    text-align: center;
    border-bottom: 2px solid #e9ecef;
    padding-bottom: 20px;
}

.postbox__gallery-title {
    color: #1e7e34;
    font-size: 1.8rem;
    margin-bottom: 10px;
    position: relative;
    display: inline-flex;
    align-items: center;
    gap: 12px;
}

.postbox__gallery-title i {
    font-size: 1.5rem;
    color: #ffc107;
}

.gallery-count {
    font-size: 0.9rem;
    color: #666;
    font-weight: 400;
    margin-left: 10px;
}

.postbox__gallery-subtitle {
    color: #666;
    font-size: 1rem;
    margin: 0;
    font-style: italic;
}

.postbox__gallery-item {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    transition: all 0.4s ease;
    position: relative;
    background: #fff;
}

.postbox__gallery-item:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 15px 40px rgba(30, 126, 52, 0.2);
}

.gallery-image-wrapper {
    position: relative;
    overflow: hidden;
}

.postbox__gallery-item img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    object-position: center;
    transition: transform 0.4s ease;
}

.postbox__gallery-item:hover img {
    transform: scale(1.1);
}

.gallery-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(30, 126, 52, 0.8) 0%, rgba(255, 193, 7, 0.8) 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.postbox__gallery-item:hover .gallery-overlay {
    opacity: 1;
}

.gallery-overlay-content {
    text-align: center;
    color: white;
}

.gallery-zoom-btn {
    background: rgba(255, 255, 255, 0.2);
    border: 2px solid rgba(255, 255, 255, 0.5);
    color: white;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    cursor: pointer;
    transition: all 0.3s ease;
    margin: 0 auto 10px;
}

.gallery-zoom-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    border-color: rgba(255, 255, 255, 0.8);
    transform: scale(1.1);
}

.gallery-image-number {
    font-size: 0.9rem;
    font-weight: 600;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
}

.postbox__gallery-nav {
    background: rgba(255, 255, 255, 0.8);
    padding: 20px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

.gallery-nav-btn {
    background: linear-gradient(135deg, #1e7e34 0%, #155724 100%);
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 25px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
}

.gallery-nav-btn:hover {
    background: linear-gradient(135deg, #155724 0%, #1e7e34 100%);
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(30, 126, 52, 0.3);
}

.gallery-nav-info {
    color: #666;
    font-weight: 500;
    font-size: 0.95rem;
}

/* Responsive Gallery */
@media (max-width: 992px) {
    .postbox__gallery-item img {
        height: 220px;
    }
    
    .postbox__gallery {
        padding: 30px 20px;
    }
}

@media (max-width: 768px) {
    .postbox__gallery-item img {
        height: 200px;
    }
    
    .postbox__gallery-title {
        font-size: 1.5rem;
    }
    
    .postbox__gallery-nav {
        flex-direction: column;
        gap: 15px;
    }
    
    .gallery-nav-btn {
        width: 100%;
        justify-content: center;
    }
}

@media (max-width: 576px) {
    .postbox__gallery-item img {
        height: 180px;
    }
    
    .postbox__gallery {
        padding: 20px 15px;
    }
    
    .gallery-zoom-btn {
        width: 50px;
        height: 50px;
        font-size: 1rem;
    }
}

/* Navigation Enhancement */
.postbox__navigation {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 25px;
    border-radius: 12px;
    border-top: 3px solid #1e7e34;
}

.postbox__nav-link {
    color: #1e7e34;
    text-decoration: none;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    padding: 10px 15px;
    border-radius: 6px;
}

.postbox__nav-link:hover {
    background: rgba(30, 126, 52, 0.1);
    color: #155724;
    transform: translateY(-2px);
}

.postbox__nav-link i {
    font-size: 1.2rem;
}

/* Sidebar Enhancement */
.sidebar__widget {
    background: white;
    border-radius: 12px;
    padding: 25px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    border-top: 3px solid #1e7e34;
    transition: transform 0.3s ease;
}

.sidebar__widget:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(30, 126, 52, 0.15);
}

.sidebar__widget-title {
    color: #1e7e34;
    font-size: 1.3rem;
    margin-bottom: 20px;
    position: relative;
    padding-bottom: 10px;
}

.sidebar__widget-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 30px;
    height: 2px;
    background: linear-gradient(90deg, #1e7e34 0%, #ffc107 100%);
    border-radius: 1px;
}

.sidebar__widget-content a {
    color: #666;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 5px;
}

.sidebar__widget-content a:hover {
    color: #1e7e34;
    transform: translateX(5px);
}

.sidebar__widget-content a::after {
    content: '';
    display: inline-block;
    width: 14px;
    height: 12px;
    background-image: url("data:image/svg+xml,%3Csvg width='14' height='12' viewBox='0 0 16 12' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M15.5303 6.53033C15.8232 6.23744 15.8232 5.76256 15.5303 5.46967L10.7574 0.696699C10.4645 0.403806 9.98959 0.403806 9.6967 0.696699C9.40381 0.989593 9.40381 1.46447 9.6967 1.75736L13.9393 6L9.6967 10.2426C9.40381 10.5355 9.40381 11.0104 9.6967 11.3033C9.98959 11.5962 10.4645 11.5962 10.7574 11.3033L15.5303 6.53033ZM0 6.75H15V5.25H0V6.75Z' fill='%23666666'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-size: contain;
    transition: transform 0.3s ease;
}

.sidebar__widget-content a:hover::after {
    transform: translateX(3px);
    background-image: url("data:image/svg+xml,%3Csvg width='14' height='12' viewBox='0 0 16 12' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M15.5303 6.53033C15.8232 6.23744 15.8232 5.76256 15.5303 5.46967L10.7574 0.696699C10.4645 0.403806 9.98959 0.403806 9.6967 0.696699C9.40381 0.989593 9.40381 1.46447 9.6967 1.75736L13.9393 6L9.6967 10.2426C9.40381 10.5355 9.40381 11.0104 9.6967 11.3033C9.98959 11.5962 10.4645 11.5962 10.7574 11.3033L15.5303 6.53033ZM0 6.75H15V5.25H0V6.75Z' fill='%231e7e34'/%3E%3C/svg%3E");
}

/* Featured Image Enhancement */
.postbox__thumb {
    position: relative;
    margin-bottom: 30px;
}

.postbox__thumb-wrapper {
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
    transition: all 0.4s ease;
    position: relative;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 8px;
}

.postbox__thumb-wrapper:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 50px rgba(30, 126, 52, 0.2);
}

.postbox__thumb img {
    width: 100%;
    height: 400px;
    object-fit: cover;
    object-position: center;
    transition: transform 0.4s ease;
    border-radius: 12px;
    display: block;
}

.postbox__thumb-wrapper:hover img {
    transform: scale(1.03);
}

/* Add overlay effect for featured image */
.postbox__thumb-wrapper::before {
    content: '';
    position: absolute;
    top: 8px;
    left: 8px;
    right: 8px;
    bottom: 8px;
    background: linear-gradient(135deg, rgba(30, 126, 52, 0.05) 0%, rgba(255, 193, 7, 0.05) 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
    border-radius: 12px;
    z-index: 2;
}

.postbox__thumb-wrapper:hover::before {
    opacity: 1;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .postbox__thumb img {
        height: 350px;
    }
}

@media (max-width: 992px) {
    .postbox__thumb img {
        height: 300px;
    }
}

@media (max-width: 768px) {
    .postbox__content {
        font-size: 1rem;
    }
    
    .postbox__content ul li {
        padding-left: 35px;
    }
    
    .postbox__content ol li {
        padding-left: 45px;
    }
    
    .postbox__gallery {
        padding: 20px;
    }
    
    .sidebar__widget {
        margin-bottom: 30px;
    }
    
    .postbox__thumb img {
        height: 250px;
    }
}

@media (max-width: 576px) {
    .postbox__thumb img {
        height: 200px;
    }
    
    .postbox__thumb-wrapper {
        border-radius: 12px;
        padding: 6px;
    }
    
    .postbox__thumb img {
        border-radius: 10px;
    }
}

/* Enhanced Gallery Styling for Default Template */
.postbox__gallery {
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
    padding: 40px;
    border-radius: 15px;
    margin-top: 3rem;
    border-top: 4px solid #1e7e34;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
}

.postbox__gallery h4 {
    color: #1e7e34;
    font-size: 1.8rem;
    margin-bottom: 30px;
    text-align: center;
    position: relative;
}

.postbox__gallery h4::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 3px;
    background: linear-gradient(90deg, #1e7e34 0%, #ffc107 100%);
    border-radius: 2px;
}

.postbox__gallery-item {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    transition: all 0.4s ease;
    position: relative;
    background: #fff;
}

.postbox__gallery-item:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 15px 40px rgba(30, 126, 52, 0.2);
}

.postbox__gallery-item img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    object-position: center;
    transition: transform 0.4s ease;
    display: block;
}

.postbox__gallery-item:hover img {
    transform: scale(1.1);
}

/* Responsive Gallery for Default Template */
@media (max-width: 992px) {
    .postbox__gallery {
        padding: 30px 20px;
    }
    
    .postbox__gallery-item img {
        height: 200px;
    }
}

@media (max-width: 768px) {
    .postbox__gallery {
        padding: 25px 15px;
        border-radius: 12px;
    }
    
    .postbox__gallery-item img {
        height: 180px;
    }
    
    .postbox__gallery h4 {
        font-size: 1.5rem;
    }
}

@media (max-width: 576px) {
    .postbox__gallery-item img {
        height: 160px;
    }
    
    .postbox__gallery-item {
        border-radius: 10px;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Enhanced slider functionality with arrow navigation
    const sliderItems = document.querySelectorAll('.slider__item');
    const prevBtn = document.querySelector('.slider-prev-btn');
    const nextBtn = document.querySelector('.slider-next-btn');
    
    if (sliderItems.length > 1) {
        let currentSlide = 0;
        
        function showSlide(index) {
            sliderItems.forEach((item, i) => {
                if (i === index) {
                    item.classList.add('active');
                    item.style.opacity = '1';
                    item.style.zIndex = '2';
                } else {
                    item.classList.remove('active');
                    item.style.opacity = '0';
                    item.style.zIndex = '1';
                }
            });
        }
        
        function nextSlide() {
            currentSlide = (currentSlide + 1) % sliderItems.length;
            showSlide(currentSlide);
        }
        
        function prevSlide() {
            currentSlide = (currentSlide - 1 + sliderItems.length) % sliderItems.length;
            showSlide(currentSlide);
        }
        
        // Arrow button event listeners
        if (nextBtn) {
            nextBtn.addEventListener('click', nextSlide);
        }
        
        if (prevBtn) {
            prevBtn.addEventListener('click', prevSlide);
        }
        
        // Initialize first slide
        showSlide(0);
        
        // Auto-play slider every 5 seconds
        setInterval(nextSlide, 5000);
    }
    
    // Smooth scroll for back to top
    const backToTopLinks = document.querySelectorAll('a[href="#"]');
    backToTopLinks.forEach(link => {
        if (link.textContent.includes('Back to Top')) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }
    });
    
    // Enhanced list item animations
    const listItems = document.querySelectorAll('.postbox__content ul li');
    listItems.forEach((item, index) => {
        item.style.animationDelay = `${index * 0.1}s`;
        item.classList.add('fade-in-up');
    });
    
    // Enhanced Gallery functionality
    const galleryImages = document.querySelectorAll('.postbox__gallery-item img');
    const galleryZoomBtns = document.querySelectorAll('.gallery-zoom-btn');
    
    // Lazy loading effect
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'scale(1)';
                observer.unobserve(entry.target);
            }
        });
    });
    
    galleryImages.forEach(img => {
        img.style.opacity = '0';
        img.style.transform = 'scale(0.9)';
        img.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        imageObserver.observe(img);
    });
    
    // Gallery zoom functionality
    galleryZoomBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const imageUrl = this.dataset.image;
            const imageIndex = this.dataset.index;
            
            // Create modal for image viewing
            const modal = document.createElement('div');
            modal.className = 'gallery-modal';
            modal.innerHTML = `
                <div class="gallery-modal-content">
                    <div class="gallery-modal-header">
                        <span class="gallery-modal-title">Gallery Image ${parseInt(imageIndex) + 1}</span>
                        <button class="gallery-modal-close">&times;</button>
                    </div>
                    <div class="gallery-modal-body">
                        <img src="${imageUrl}" alt="Gallery Image ${parseInt(imageIndex) + 1}">
                    </div>
                </div>
            `;
            
            document.body.appendChild(modal);
            
            // Close modal functionality
            const closeBtn = modal.querySelector('.gallery-modal-close');
            closeBtn.addEventListener('click', () => {
                document.body.removeChild(modal);
            });
            
            // Close on backdrop click
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    document.body.removeChild(modal);
                }
            });
            
            // Close on escape key
            document.addEventListener('keydown', function escapeHandler(e) {
                if (e.key === 'Escape') {
                    if (document.body.contains(modal)) {
                        document.body.removeChild(modal);
                    }
                    document.removeEventListener('keydown', escapeHandler);
                }
            });
        });
    });
    
    // Gallery navigation (if needed)
    const galleryPrev = document.getElementById('galleryPrev');
    const galleryNext = document.getElementById('galleryNext');
    
    if (galleryPrev && galleryNext) {
        // Add navigation functionality if needed
        galleryPrev.addEventListener('click', () => {
            // Scroll to previous set of images
            const gallery = document.querySelector('.postbox__gallery .row');
            gallery.scrollBy({ left: -300, behavior: 'smooth' });
        });
        
        galleryNext.addEventListener('click', () => {
            // Scroll to next set of images
            const gallery = document.querySelector('.postbox__gallery .row');
            gallery.scrollBy({ left: 300, behavior: 'smooth' });
        });
    }
});
</script>

<style>
/* Additional CSS for animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.fade-in-up {
    animation: fadeInUp 0.6s ease forwards;
}

/* Slider Navigation Styling */
.postbox__slider-arrow-wrap {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    transform: translateY(-50%);
    z-index: 10;
    pointer-events: none;
}

.postbox-arrow-prev,
.postbox-arrow-next {
    position: absolute;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.9);
    border: none;
    color: #1e7e34;
    font-size: 18px;
    cursor: pointer;
    transition: all 0.3s ease;
    pointer-events: all;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.postbox-arrow-prev {
    left: 30px;
}

.postbox-arrow-next {
    right: 30px;
}

.postbox-arrow-prev:hover,
.postbox-arrow-next:hover {
    background: #fff;
    color: #ffc107;
    transform: scale(1.1);
    box-shadow: 0 6px 20px rgba(30, 126, 52, 0.2);
}

/* Gallery Modal Styles */
.gallery-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.9);
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
    animation: fadeIn 0.3s ease;
}

.gallery-modal-content {
    background: white;
    border-radius: 12px;
    max-width: 90vw;
    max-height: 90vh;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    animation: slideIn 0.3s ease;
}

.gallery-modal-header {
    background: linear-gradient(135deg, #1e7e34 0%, #155724 100%);
    color: white;
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.gallery-modal-title {
    font-weight: 600;
    font-size: 1.1rem;
}

.gallery-modal-close {
    background: none;
    border: none;
    color: white;
    font-size: 1.5rem;
    cursor: pointer;
    padding: 5px 10px;
    border-radius: 4px;
    transition: background 0.3s ease;
}

.gallery-modal-close:hover {
    background: rgba(255, 255, 255, 0.2);
}

.gallery-modal-body {
    padding: 0;
    text-align: center;
}

.gallery-modal-body img {
    max-width: 100%;
    max-height: 70vh;
    object-fit: contain;
    display: block;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideIn {
    from { 
        opacity: 0;
        transform: scale(0.8) translateY(-50px);
    }
    to { 
        opacity: 1;
        transform: scale(1) translateY(0);
    }
}

/* Slider Item Transitions */
.slider__item {
    transition: opacity 0.5s ease-in-out;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.slider__container {
    position: relative;
    height: 500px;
    overflow: hidden;
}

@media (max-width: 768px) {
    .postbox-arrow-prev,
    .postbox-arrow-next {
        width: 40px;
        height: 40px;
        font-size: 16px;
    }
    
    .postbox-arrow-prev {
        left: 15px;
    }
    
    .postbox-arrow-next {
        right: 15px;
    }
}
</style>
@endpush