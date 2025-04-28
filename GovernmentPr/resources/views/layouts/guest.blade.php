<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="light" data-bs-theme="light">
<head>
        <meta charset="utf-8" />
        <title>@yield('pageTitle') | Federal Ministry of Environment</title>
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Federal Ministry of Environment" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('MainAssets/img/logo/icon-100x100.png') }}" sizes="32x32">

        <!-- Vite -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- App CSS -->
        <link href="{{ asset('adminAssets/css/bootstrap.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('adminAssets/css/icons.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('adminAssets/css/app.min.css') }}" rel="stylesheet" />
        <style>
                .animated-logo {
                width: 50px; /* Adjust width */
                height: auto; /* Maintain aspect ratio */
                opacity: 0;
                animation: fadeInSequence 1s ease-in-out forwards;
                }

                .logo-container span{
                        display: flex;
                        justify-content: center; /* Center the logos horizontally */
                        align-items: center; /* Align them vertically */
                        gap: 10px; /* Add spacing between logos */
                }

                .animated-logo:nth-child(1) {
                animation-delay: 0s;
                }

                .animated-logo:nth-child(2) {
                animation-delay: 1s;
                }

                .animated-logo:nth-child(3) {
                animation-delay: 2s;
                }

                .animated-logo:nth-child(4) {
                animation-delay: 3s;
                }

                @keyframes fadeInSequence {
                0% {
                        opacity: 0;
                        transform: translateY(10px) scale(0.8); /* Smaller scale for entrance */
                }
                100% {
                        opacity: 1;
                        transform: translateY(0) scale(1); /* Normal size */
                }
                }


        </style>
</head>
<body>
        <div class="container-xxl">
                {{ $slot }}
        </div>
</body>
</html>
