<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="light" data-bs-theme="light">
<head>
    <meta charset="utf-8" />
    <title>Rizz | Admin & Dashboard Template</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('MainAssets/img/logo/icon-100x100.png') }}" sizes="32x32">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('adminAssets/libs/jsvectormap/css/jsvectormap.min.css') }}">
    <link href="{{ asset('adminAssets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminAssets/css/icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminAssets/css/app.min.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Top Bar -->
    <div class="topbar d-print-none">
        <div class="container-xxl">
            <nav class="topbar-custom d-flex justify-content-between">
                <ul class="topbar-item list-unstyled d-inline-flex align-items-center mb-0">
                    <li>
                        <button class="nav-link mobile-menu-btn nav-icon" id="togglemenu">
                            <i class="iconoir-menu-scale"></i>
                        </button>
                    </li>
                    <li class="mx-3 welcome-text">
                        <h3 class="mb-0 fw-bold text-truncate">
                            Good Morning, <span class="text-capitalize">{{ Auth::guard('web')->user()->first_name }}</span>!
                        </h3>
                    </li>
                </ul>
                <ul class="topbar-item list-unstyled d-inline-flex align-items-center mb-0">
                    <li class="hide-phone app-search">
                        <form role="search" method="get">
                            <input type="search" name="search" class="form-control top-search mb-0" placeholder="Search here...">
                            <button type="submit"><i class="iconoir-search"></i></button>
                        </form>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle nav-icon" data-bs-toggle="dropdown" href="#">
                            <img src="assets/images/flags/us_flag.jpg" alt="" class="thumb-sm rounded-circle">
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#"><img src="assets/images/flags/us_flag.jpg" alt="" height="15" class="me-2">English</a>
                            <a class="dropdown-item" href="#"><img src="assets/images/flags/spain_flag.jpg" alt="" height="15" class="me-2">Spanish</a>
                            <a class="dropdown-item" href="#"><img src="assets/images/flags/germany_flag.jpg" alt="" height="15" class="me-2">German</a>
                            <a class="dropdown-item" href="#"><img src="assets/images/flags/french_flag.jpg" alt="" height="15" class="me-2">French</a>
                        </div>
                    </li>
                    <li class="topbar-item">
                        <a class="nav-link nav-icon" href="javascript:void(0);" id="light-dark-mode">
                            <i class="icofont-moon dark-mode"></i>
                            <i class="icofont-sun light-mode"></i>
                        </a>
                    </li>
                    <li class="dropdown topbar-item">
                        <a class="nav-link dropdown-toggle nav-icon" data-bs-toggle="dropdown" href="#">
                            <i class="icofont-bell-alt"></i>
                            <span class="alert-badge"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-lg py-0">
                            <h5 class="dropdown-item-text m-0 py-3 d-flex justify-content-between align-items-center">
                                Notifications <a href="#" class="badge text-body-tertiary badge-pill"><i class="iconoir-plus-circle fs-4"></i></a>
                            </h5>
                            <div class="ms-0" style="max-height:230px;" data-simplebar>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active">
                                        <a href="#" class="dropdown-item py-3">
                                            <small class="float-end text-muted ps-2">2 min ago</small>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                                    <i class="iconoir-wolf fs-4"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2 text-truncate">
                                                    <h6 class="my-0 fw-normal text-dark fs-13">Your order is placed</h6>
                                                    <small class="text-muted mb-0">Dummy text of the printing and industry.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="pages-notifications.html" class="dropdown-item text-center text-dark fs-13 py-2">
                                View All <i class="fi-arrow-right"></i>
                            </a>
                        </div>
                    </li>
                    <li class="dropdown topbar-item">
                        <a class="nav-link dropdown-toggle nav-icon" data-bs-toggle="dropdown" href="#">
                            <img src="assets/images/users/avatar-1.jpg" alt="" class="thumb-lg rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end py-0">
                            <div class="d-flex align-items-center dropdown-item py-2 bg-secondary-subtle">
                                <div class="flex-shrink-0">
                                    <img src="assets/images/users/avatar-1.jpg" alt="" class="thumb-md rounded-circle">
                                </div>
                                <div class="flex-grow-1 ms-2 text-truncate">
                                    <h6 class="my-0 fw-medium text-dark fs-13">{{ Auth::user()->last_name }} {{ Auth::user()->first_name }}</h6>
                                    <small class="text-muted mb-0">{{ Auth::getDefaultDriver() }}</small>
                                </div>
                            </div>
                            <div class="dropdown-divider mt-0"></div>
                            <small class="text-muted px-2 py-1 d-block">Settings</small>
                            <a class="dropdown-item" href="pages-profile.html"><i class="las la-cog fs-18 me-1"></i>Account Settings</a>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <x-dropdown-link class="dropdown-item text-danger" href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    <i class="las la-power-off fs-18 me-1"></i> {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="startbar d-print-none">
        <div class="brand">
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('MainAssets/img/logo/logo3.png') }}" alt="logo" class="logo-sm img-sm">
            </a>
        </div>
        <div class="startbar-menu">
            <div class="startbar-collapse" id="startbarCollapse" data-simplebar>
                <ul class="navbar-nav mb-auto">
                    <li class="menu-label pt-0 mt-0"><span>Main Menu</span></li>
                    <li class="nav-item">
                        <a class="nav-link" href="">
                            <i class="iconoir-home-simple menu-icon"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarApplications" data-bs-toggle="collapse">
                            <i class="iconoir-view-grid menu-icon"></i>
                            <span>Applications</span>
                        </a>
                        <div class="collapse" id="sidebarApplications">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.view-company') }}">Company</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.real-time-updates') }}">Real-Time Update</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.inventory-forecasting') }}">Forecasting</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="menu-label mt-2"><span>Management Systems</span></li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarAdvancedUI" data-bs-toggle="collapse">
                            <i class="iconoir-apple-shortcuts menu-icon"></i>
                            <span>Content Management System</span>
                        </a>
                        <div class="collapse" id="sidebarAdvancedUI">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('CMS.CMS') }}">Pages</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('CMS.posts') }}">Posts</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('CMS.event') }}">Events & News</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('email-configuration') }}">
                            <i class="iconoir-fingerprint-lock-circle menu-icon"></i>
                            <span>Email Integration</span>
                        </a>
                    </li>
                </ul>
                <div class="update-msg text-center">
                    <div class="d-flex justify-content-center align-items-center thumb-lg update-icon-box rounded-circle mx-auto">
                        <img src="{{ asset('MainAssets/img/logo/icon-100x100.png') }}" alt="logo" width="70px">
                    </div>
                    <h5 class="mt-3">Federal Ministry of Environment</h5>
                    <p class="mb-3 text-muted">Made by Elite Tech. Dev.</p>
                    <a href="javascript:void(0);" class="btn text-primary shadow-sm rounded-pill">Contact Us</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="page-wrapper">
        {{ $slot }}
    </div>

    <!-- Scripts -->
    <script src="{{ asset('adminAssets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminAssets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('adminAssets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('adminAssets/data/stock-prices.js') }}"></script>
    <script src="{{ asset('adminAssets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('adminAssets/libs/jsvectormap/maps/world.js') }}"></script>
    <script src="{{ asset('adminAssets/js/pages/index.init.js') }}"></script>
    <script src="{{ asset('adminAssets/js/pages/analytics-reports.init.js') }}"></script>
    <script src="{{ asset('adminAssets/js/app.js') }}"></script>

    @stack('modals')
    @livewireScripts
</body>
</html>
