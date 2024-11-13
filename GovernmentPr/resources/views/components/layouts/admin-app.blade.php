<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="light" data-bs-theme="light">


<!-- Mirrored from mannatthemes.com/rizz/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Nov 2024 14:14:37 GMT -->
<head>
    <meta charset="utf-8" />
    <title>@yield('PageTitle') – Federal Ministry of Environment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Federal Ministry of Environment" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('MainAssets/img/logo/icon-100x100.png')}}" sizes="32x32">

    <link rel="stylesheet" href="{{asset('adminAssets/libs/jsvectormap/css/jsvectormap.min.css')}}">

     <!-- App css -->
     <link href="{{asset('adminAssets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
     <link href="{{asset('adminAssets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
     <link href="{{asset('adminAssets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
     @yield('styles')
</head>

<body>

    <!-- Top Bar Start -->
    <div class="topbar d-print-none">
        <div class="container-xxl">
            <nav class="topbar-custom d-flex justify-content-between" id="topbar-custom">    
        

                <ul class="topbar-item list-unstyled d-inline-flex align-items-center mb-0">                        
                    <li>
                        <button class="nav-link mobile-menu-btn nav-icon" id="togglemenu">
                            <i class="iconoir-menu-scale"></i>
                        </button>
                    </li> 
                    <li class="mx-3 welcome-text">
                        <h3 class="mb-0 fw-bold text-truncate">Good Morning, <span class="text-capitalize">{{Auth::guard('admin')->user()->first_name}}</span>!</h3>
                        <!-- <h6 class="mb-0 fw-normal text-muted text-truncate fs-14">Here's your overview this week.</h6> -->
                    </li>                   
                </ul>
                <ul class="topbar-item list-unstyled d-inline-flex align-items-center mb-0">
                    <li class="hide-phone app-search">
                        <form role="search" action="#" method="get">
                            <input type="search" name="search" class="form-control top-search mb-0" placeholder="Search here...">
                            <button type="submit"><i class="iconoir-search"></i></button>
                        </form>
                    </li>     
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#" role="button"
                        aria-haspopup="false" aria-expanded="false">
                        <img src="{{asset('adminAssets/images/flags/us_flag.jpg')}}" alt="" class="thumb-sm rounded-circle">
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#"><img src="{{asset('adminAssets/images/flags/us_flag.jpg')}}" alt="" height="15" class="me-2">English</a>
                            <a class="dropdown-item" href="#"><img src="{{asset('adminAssets/images/flags/spain_flag.jpg')}}" alt="" height="15" class="me-2">Spanish</a>
                            <a class="dropdown-item" href="#"><img src="{{asset('adminAssets/images/flags/germany_flag.jpg')}}" alt="" height="15" class="me-2">German</a>
                            <a class="dropdown-item" href="#"><img src="{{asset('adminAssets/images/flags/french_flag.jpg')}}" alt="" height="15" class="me-2">French</a>
                        </div>
                    </li><!--end topbar-language-->
        
                    <li class="topbar-item">
                        <a class="nav-link nav-icon" href="javascript:void(0);" id="light-dark-mode">
                            <i class="icofont-moon dark-mode"></i>
                            <i class="icofont-sun light-mode"></i>
                        </a>                    
                    </li>
    
                    <li class="dropdown topbar-item">
                        <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <i class="icofont-bell-alt"></i>
                            <span class="alert-badge"></span>
                        </a>
                        <div class="dropdown-menu stop dropdown-menu-end dropdown-lg py-0">
                            <h5 class="dropdown-item-text m-0 py-3 d-flex justify-content-between align-items-center">
                                Notifications <a href="#" class="badge text-body-tertiary badge-pill">
                                    <i class="iconoir-plus-circle fs-4"></i>
                                </a>
                            </h5>
                            <ul class="nav nav-tabs nav-tabs-custom nav-success nav-justified mb-1" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link mx-0 active" data-bs-toggle="tab" href="#All" role="tab" aria-selected="true">
                                        All <span class="badge bg-primary-subtle text-primary badge-pill ms-1">24</span>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link mx-0" data-bs-toggle="tab" href="#Projects" role="tab" aria-selected="false" tabindex="-1">
                                        Projects
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link mx-0" data-bs-toggle="tab" href="#Teams" role="tab" aria-selected="false" tabindex="-1">
                                        Team
                                    </a>
                                </li>
                            </ul>
                            <div class="ms-0" style="max-height:230px;" data-simplebar>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="All" role="tabpanel" aria-labelledby="all-tab" tabindex="0">
                                        <!-- item-->
                                        <a href="#" class="dropdown-item py-3">
                                            <small class="float-end text-muted ps-2">2 min ago</small>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                                    <i class="iconoir-wolf fs-4"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2 text-truncate">
                                                    <h6 class="my-0 fw-normal text-dark fs-13">Your order is placed</h6>
                                                    <small class="text-muted mb-0">Dummy text of the printing and industry.</small>
                                                </div><!--end media-body-->
                                            </div><!--end media-->
                                        </a><!--end-item-->
                                        <!-- item-->
                                        <a href="#" class="dropdown-item py-3">
                                            <small class="float-end text-muted ps-2">10 min ago</small>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                                    <i class="iconoir-apple-swift fs-4"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2 text-truncate">
                                                    <h6 class="my-0 fw-normal text-dark fs-13">Meeting with designers</h6>
                                                    <small class="text-muted mb-0">It is a long established fact that a reader.</small>
                                                </div><!--end media-body-->
                                            </div><!--end media-->
                                        </a><!--end-item-->
                                        <!-- item-->
                                        <a href="#" class="dropdown-item py-3">
                                            <small class="float-end text-muted ps-2">40 min ago</small>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">                                                    
                                                    <i class="iconoir-birthday-cake fs-4"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2 text-truncate">
                                                    <h6 class="my-0 fw-normal text-dark fs-13">UX 3 Task complete.</h6>
                                                    <small class="text-muted mb-0">Dummy text of the printing.</small>
                                                </div><!--end media-body-->
                                            </div><!--end media-->
                                        </a><!--end-item-->
                                        <!-- item-->
                                        <a href="#" class="dropdown-item py-3">
                                            <small class="float-end text-muted ps-2">1 hr ago</small>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                                    <i class="iconoir-drone fs-4"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2 text-truncate">
                                                    <h6 class="my-0 fw-normal text-dark fs-13">Your order is placed</h6>
                                                    <small class="text-muted mb-0">It is a long established fact that a reader.</small>
                                                </div><!--end media-body-->
                                            </div><!--end media-->
                                        </a><!--end-item-->
                                        <!-- item-->
                                        <a href="#" class="dropdown-item py-3">
                                            <small class="float-end text-muted ps-2">2 hrs ago</small>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                                    <i class="iconoir-user fs-4"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2 text-truncate">
                                                    <h6 class="my-0 fw-normal text-dark fs-13">Payment Successfull</h6>
                                                    <small class="text-muted mb-0">Dummy text of the printing.</small>
                                                </div><!--end media-body-->
                                            </div><!--end media-->
                                        </a><!--end-item-->
                                    </div>
                                    <div class="tab-pane fade" id="Projects" role="tabpanel" aria-labelledby="projects-tab" tabindex="0">
                                        <!-- item-->
                                        <a href="#" class="dropdown-item py-3">
                                            <small class="float-end text-muted ps-2">40 min ago</small>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">                                                    
                                                    <i class="iconoir-birthday-cake fs-4"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2 text-truncate">
                                                    <h6 class="my-0 fw-normal text-dark fs-13">UX 3 Task complete.</h6>
                                                    <small class="text-muted mb-0">Dummy text of the printing.</small>
                                                </div><!--end media-body-->
                                            </div><!--end media-->
                                        </a><!--end-item-->
                                        <!-- item-->
                                        <a href="#" class="dropdown-item py-3">
                                            <small class="float-end text-muted ps-2">1 hr ago</small>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                                    <i class="iconoir-drone fs-4"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2 text-truncate">
                                                    <h6 class="my-0 fw-normal text-dark fs-13">Your order is placed</h6>
                                                    <small class="text-muted mb-0">It is a long established fact that a reader.</small>
                                                </div><!--end media-body-->
                                            </div><!--end media-->
                                        </a><!--end-item-->
                                        <!-- item-->
                                        <a href="#" class="dropdown-item py-3">
                                            <small class="float-end text-muted ps-2">2 hrs ago</small>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                                    <i class="iconoir-user fs-4"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2 text-truncate">
                                                    <h6 class="my-0 fw-normal text-dark fs-13">Payment Successfull</h6>
                                                    <small class="text-muted mb-0">Dummy text of the printing.</small>
                                                </div><!--end media-body-->
                                            </div><!--end media-->
                                        </a><!--end-item-->
                                    </div>
                                    <div class="tab-pane fade" id="Teams" role="tabpanel" aria-labelledby="teams-tab" tabindex="0">
                                        <!-- item-->
                                        <a href="#" class="dropdown-item py-3">
                                            <small class="float-end text-muted ps-2">1 hr ago</small>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                                    <i class="iconoir-drone fs-4"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2 text-truncate">
                                                    <h6 class="my-0 fw-normal text-dark fs-13">Your order is placed</h6>
                                                    <small class="text-muted mb-0">It is a long established fact that a reader.</small>
                                                </div><!--end media-body-->
                                            </div><!--end media-->
                                        </a><!--end-item-->
                                        <!-- item-->
                                        <a href="#" class="dropdown-item py-3">
                                            <small class="float-end text-muted ps-2">2 hrs ago</small>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                                    <i class="iconoir-user fs-4"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2 text-truncate">
                                                    <h6 class="my-0 fw-normal text-dark fs-13">Payment Successfull</h6>
                                                    <small class="text-muted mb-0">Dummy text of the printing.</small>
                                                </div><!--end media-body-->
                                            </div><!--end media-->
                                        </a><!--end-item-->
                                    </div>
                                </div>
                            
                            </div>
                            <!-- All-->
                            <a href="pages-notifications.html" class="dropdown-item text-center text-dark fs-13 py-2">
                                View All <i class="fi-arrow-right"></i>
                            </a>
                        </div>
                    </li>
    
                    <li class="dropdown topbar-item">
                        <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <img src="{{asset('adminAssets/images/users/avatar-1.jpg')}}" alt="" class="thumb-lg rounded-circle">
                            @else
                                <span class="inline-flex rounded-md text-uppercase">
                                    {{ substr(Auth::guard('admin')->user()->first_name, 0, 1) }}
                                    {{ substr(Auth::guard('admin')->user()->last_name, 0, 1) }}
                                </span>
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-end py-0">
                            <div class="d-flex align-items-center dropdown-item py-2 bg-secondary-subtle">
                                <div class="flex-shrink-0">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <img src="{{asset('adminAssets/images/users/avatar-1.jpg')}}" alt="" class="thumb-lg rounded-circle">
                                @else
                                    <span class="inline-flex rounded-md text-uppercase">
                                        {{ substr(Auth::guard('admin')->user()->first_name, 0, 1) }}
                                        {{ substr(Auth::guard('admin')->user()->last_name, 0, 1) }}
                                    </span>
                                @endif
                                </div>
                                <div class="flex-grow-1 ms-2 text-truncate align-self-center">
                                    <h6 class="my-0 fw-medium text-dark fs-13 text-capitalize">{{Auth::user()->last_name}} {{Auth::user()->first_name}} {{Auth::user()->other_name}}</h6>
                                    <small class="text-muted mb-0 text-capitalize">{{Auth::getDefaultDriver()}}</small>
                                </div><!--end media-body-->
                            </div>
                            <div class="dropdown-divider mt-0"></div>
                            <small class="text-muted px-2 pb-1 d-block">Account</small>
                            <a class="dropdown-item" href="pages-profile.html"><i class="las la-user fs-18 me-1 align-text-bottom"></i> Profile</a>
                            <a class="dropdown-item" href="pages-faq.html"><i class="las la-wallet fs-18 me-1 align-text-bottom"></i> Earning</a>
                            <small class="text-muted px-2 py-1 d-block">Settings</small>                        
                            <a class="dropdown-item" href="pages-profile.html"><i class="las la-cog fs-18 me-1 align-text-bottom"></i>Account Settings</a>
                            <a class="dropdown-item" href="pages-profile.html"><i class="las la-lock fs-18 me-1 align-text-bottom"></i> Security</a>
                            <a class="dropdown-item" href="pages-faq.html"><i class="las la-question-circle fs-18 me-1 align-text-bottom"></i> Help Center</a>                       
                            <div class="dropdown-divider mb-0"></div>

                            <form method="POST" action="{{ route('admin.logout') }}" x-data>
                                @csrf

                                <x-dropdown-link class="dropdown-item text-danger" href="{{ route('admin.logout') }}"
                                         @click.prevent="$root.submit();">
                                         <i class="las la-power-off fs-18 me-1 align-text-bottom"></i> {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </li>
                </ul><!--end topbar-nav-->
            </nav>
            <!-- end navbar-->
        </div>
    </div>
    <!-- Top Bar End -->
    <!-- leftbar-tab-menu -->
    <div class="startbar d-print-none">
        <!--start brand-->
        <div class="brand">
            <a href="{{ url('/') }}" class="logo">
                <span>
                    <img src="{{asset('MainAssets/img/logo/icon-100x100.png')}}" alt="logo-small" class="logo-sm">
                </span>
                <span class="">
                    <img src="{{asset('MainAssets/img/logo/fme-logo-text.png')}}" alt="logo-large" class="logo-lg logo-light">
                    <img src="{{asset('MainAssets/img/logo/fme-logo-text.png')}}" alt="logo-large" class="logo-lg logo-dark">
                </span>
            </a>
        </div>
        <!--end brand-->
        <!--start startbar-menu-->
        <div class="startbar-menu" >
            <div class="startbar-collapse" id="startbarCollapse" data-simplebar>
                <div class="d-flex align-items-start flex-column w-100">
                    <!-- Navigation -->
                    <ul class="navbar-nav mb-auto w-100">
                        <li class="menu-label pt-0 mt-0">
                            <!-- <small class="label-border">
                                <div class="border_left hidden-xs"></div>
                                <div class="border_right"></div>
                            </small> -->
                            <span>Main Menu</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.dashboard')}}">
                                <i class="iconoir-home-simple menu-icon"></i>
                                <span>Dashboard</span>
                            </a>
                        </li><!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarApplications" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarApplications">
                                <i class="iconoir-view-grid menu-icon"></i>
                                <span>Applications</span>
                            </a>
                            <div class="collapse " id="sidebarApplications">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('admin.display-roles')}}">Roles Management</a>
                                    </li><!--end nav-item-->                                
                                    <li class="nav-item">
                                        <a class="nav-link" href="#sidebarUsersManagement">Users Management</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="#sidebarEcommerce">Blogs Management</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="apps-chat.html">Categories Management</a>
                                    </li><!--end nav-item--> 
                                    <li class="nav-item">
                                        <a class="nav-link" href="apps-contact-list.html">Tags Management</a>
                                    </li><!--end nav-item--> 
                                    <li class="nav-item">
                                        <a class="nav-link" href="apps-calendar.html">Pages Management</a>
                                    </li><!--end nav-item-->                               
                                </ul><!--end nav-->
                            </div><!--end startbarApplications-->
                        </li><!--end nav-item-->
                        <li class="menu-label mt-2">
                            <small class="label-border">
                                <div class="border_left hidden-xs"></div>
                                <div class="border_right"></div>
                            </small>
                            <span>Components</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarElements" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarElements">
                                <i class="iconoir-compact-disc menu-icon"></i>
                                <span>UI Elements</span>
                            </a>
                            <div class="collapse " id="sidebarElements">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="ui-alerts.html">Alerts</a>
                                    </li><!--end nav-item--> 
                                    <li class="nav-item">
                                        <a class="nav-link" href="ui-avatar.html">Avatar</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="ui-buttons.html">Buttons</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="ui-badges.html">Badges</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="ui-cards.html">Cards</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="ui-carousels.html">Carousels</a>
                                    </li><!--end nav-item-->                                
                                    <li class="nav-item">
                                        <a class="nav-link" href="ui-dropdowns.html">Dropdowns</a>
                                    </li><!--end nav-item-->                                   
                                    <li class="nav-item">
                                        <a class="nav-link" href="ui-grids.html">Grids</a>
                                    </li><!--end nav-item-->                                
                                    <li class="nav-item">
                                        <a class="nav-link" href="ui-images.html">Images</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="ui-list.html">List</a>
                                    </li><!--end nav-item-->                                   
                                    <li class="nav-item">
                                        <a class="nav-link" href="ui-modals.html">Modals</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="ui-navs.html">Navs</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="ui-navbar.html">Navbar</a>
                                    </li><!--end nav-item--> 
                                    <li class="nav-item">
                                        <a class="nav-link" href="ui-paginations.html">Paginations</a>
                                    </li><!--end nav-item-->   
                                    <li class="nav-item">
                                        <a class="nav-link" href="ui-popover-tooltips.html">Popover & Tooltips</a>
                                    </li><!--end nav-item-->                                
                                    <li class="nav-item">
                                        <a class="nav-link" href="ui-progress.html">Progress</a>
                                    </li><!--end nav-item-->                                
                                    <li class="nav-item">
                                        <a class="nav-link" href="ui-spinners.html">Spinners</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="ui-tabs-accordions.html">Tabs & Accordions</a>
                                    </li><!--end nav-item-->                               
                                    <li class="nav-item">
                                        <a class="nav-link" href="ui-typography.html">Typography</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="ui-videos.html">Videos</a>
                                    </li><!--end nav-item--> 
                                </ul><!--end nav-->
                            </div><!--end startbarElements-->
                        </li><!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarAdvancedUI" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarAdvancedUI">
                                <i class="iconoir-peace-hand menu-icon"></i>
                                <span>Advanced UI</span><span class="badge rounded text-success bg-success-subtle ms-1">New</span>
                            </a>
                            <div class="collapse " id="sidebarAdvancedUI">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="advanced-animation.html">Animation</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="advanced-clipboard.html">Clip Board</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="advanced-dragula.html">Dragula</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="advanced-files.html">File Manager</a>
                                    </li><!--end nav-item--> 
                                    <li class="nav-item">
                                        <a class="nav-link" href="advanced-highlight.html">Highlight</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="advanced-rangeslider.html">Range Slider</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="advanced-ratings.html">Ratings</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="advanced-ribbons.html">Ribbons</a>
                                    </li><!--end nav-item-->                                  
                                    <li class="nav-item">
                                        <a class="nav-link" href="advanced-sweetalerts.html">Sweet Alerts</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="advanced-toasts.html">Toasts</a>
                                    </li><!--end nav-item-->
                                </ul><!--end nav-->
                            </div><!--end startbarAdvancedUI-->
                        </li><!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarForms" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarForms">
                                <i class="iconoir-journal-page menu-icon"></i>
                                <span>Forms</span>
                            </a>
                            <div class="collapse " id="sidebarForms">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="forms-elements.html">Basic Elements</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="forms-advanced.html">Advance Elements</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="forms-validation.html">Validation</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="forms-wizard.html">Wizard</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="forms-editors.html">Editors</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="forms-uploads.html">File Upload</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="forms-img-crop.html">Image Crop</a>
                                    </li><!--end nav-item-->
                                </ul><!--end nav-->
                            </div><!--end startbarForms-->
                        </li><!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarCharts" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarCharts">
                                <i class="iconoir-candlestick-chart menu-icon"></i>
                                <span>Charts</span>
                            </a>
                            <div class="collapse " id="sidebarCharts">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="charts-apex.html">Apex</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="charts-justgage.html">JustGage</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="charts-chartjs.html">Chartjs</a>
                                    </li><!--end nav-item--> 
                                    <li class="nav-item">
                                        <a class="nav-link" href="charts-toast-ui.html">Toast</a>
                                    </li><!--end nav-item--> 
                                </ul><!--end nav-->
                            </div><!--end startbarCharts-->
                        </li><!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarTables" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarTables">
                                <i class="iconoir-table-rows menu-icon"></i>
                                <span>Tables</span>
                            </a>
                            <div class="collapse " id="sidebarTables">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="tables-basic.html">Basic</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="tables-datatable.html">Datatables</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="tables-editable.html">Editable</a>
                                    </li><!--end nav-item--> 
                                </ul><!--end nav-->
                            </div><!--end startbarTables-->
                        </li><!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarIcons" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarIcons">
                                <i class="iconoir-trophy menu-icon"></i>
                                <span>Icons</span>
                            </a>
                            <div class="collapse " id="sidebarIcons">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="icons-fontawesome.html">Font Awesome</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="icons-lineawesome.html">Line Awesome</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="icons-icofont.html">Icofont</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="icons-iconoir.html">Iconoir</a>
                                    </li><!--end nav-item-->
                                </ul><!--end nav-->
                            </div><!--end startbarIcons-->
                        </li><!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarMaps" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarMaps">
                                <i class="iconoir-navigator-alt menu-icon"></i>
                                <span>Maps</span>
                            </a>
                            <div class="collapse " id="sidebarMaps">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="maps-google.html">Google Maps</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="maps-leaflet.html">Leaflet Maps</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="maps-vector.html">Vector Maps</a>
                                    </li><!--end nav-item--> 
                                </ul><!--end nav-->
                            </div><!--end startbarMaps-->
                        </li><!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarEmailTemplates" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarEmailTemplates">
                                <i class="iconoir-send-mail menu-icon"></i>
                                <span>Email Templates</span>
                            </a>
                            <div class="collapse " id="sidebarEmailTemplates">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="email-templates-basic.html">Basic Action Email</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="email-templates-alert.html">Alert Email</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="email-templates-billing.html">Billing Email</a>
                                    </li><!--end nav-item-->  
                                </ul><!--end nav-->
                            </div><!--end startbarEmailTemplates-->
                        </li><!--end nav-item-->
                        <li class="menu-label mt-2">
                            <small class="label-border">
                                <div class="border_left hidden-xs"></div>
                                <div class="border_right"></div>
                            </small>
                            <span>Crafted</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarPages" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarPages">
                                <i class="iconoir-page-star menu-icon"></i>
                                <span>Pages</span>
                            </a>
                            <div class="collapse " id="sidebarPages">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages-profile.html">Profile</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages-notifications.html">Notifications</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages-timeline.html">Timeline</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages-treeview.html">Treeview</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages-starter.html">Starter Page</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages-pricing.html">Pricing</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages-blogs.html">Blogs</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages-faq.html">FAQs</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages-gallery.html">Gallery</a>
                                    </li><!--end nav-item-->  
                                </ul><!--end nav-->
                            </div><!--end startbarPages-->
                        </li><!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarAuthentication" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarAuthentication">
                                <i class="iconoir-fingerprint-lock-circle menu-icon"></i>
                                <span>Authentication</span>
                            </a>
                            <div class="collapse " id="sidebarAuthentication">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="auth-login.html">Log in</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="auth-register.html">Register</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="auth-recover-pw.html">Re-Password</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="auth-lock-screen.html">Lock Screen</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="auth-maintenance.html">Maintenance</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="auth-404.html">Error 404</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="auth-500.html">Error 500</a>
                                    </li><!--end nav-item-->
                                </ul><!--end nav-->
                            </div><!--end startbarAuthentication-->
                        </li><!--end nav-item-->
                    </ul><!--end navbar-nav--->
                    <div class="update-msg text-center"> 
                        <div class="d-flex justify-content-center align-items-center thumb-lg update-icon-box  rounded-circle mx-auto">
                            <img src="{{asset('MainAssets/img/logo/icon-100x100.png')}}" alt="logo" width="70px">
                        </div>                   
                        <h5 class="mt-3"> Federal Ministry of Environment </h5>
                        <p class="mb-3 text-muted">Made by Elite Tech. Dev.</p>
                        <a href="javascript: void(0);" class="btn text-primary shadow-sm rounded-pill">Contact Us</a>
                    </div>
                </div>
            </div><!--end startbar-collapse-->
        </div><!--end startbar-menu-->    
    </div><!--end startbar-->
    <div class="startbar-overlay d-print-none"></div>
    <!-- end leftbar-tab-menu-->

    <div class="page-wrapper">
        {{ $slot }}
    </div>
    <!-- end page-wrapper -->

    <!-- Javascript  -->
    <!-- vendor js -->
    
    <script src="{{asset('adminAssets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('adminAssets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('adminAssets/libs/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('adminAssets/data/stock-prices.js')}}"></script>
    <script src="{{asset('adminAssets/libs/jsvectormap/js/jsvectormap.min.js')}}"></script>
    <script src="{{asset('adminAssets/libs/jsvectormap/maps/world.js')}}"></script>
    <script src="{{asset('adminAssets/js/pages/index.init.js')}}"></script>
    <script src="{{asset('adminAssets/js/app.js')}}"></script>
    @yield('scripts')
</body>
<!--end body-->


<!-- Mirrored from mannatthemes.com/rizz/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Nov 2024 14:15:49 GMT -->
</html>