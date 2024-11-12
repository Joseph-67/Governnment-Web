<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="light" data-bs-theme="light">

    
<!-- Mirrored from mannatthemes.com/rizz/default/auth-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Nov 2024 14:18:13 GMT -->
<head>
        <meta charset="utf-8" />
                <title>@yield('pageTitle')|Federal Ministry of Environment</title>
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <meta content="Federal Ministry of Environment" name="description" />
                <meta content="" name="author" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />

                <!-- App favicon -->
                <link rel="shortcut icon" type="image/x-icon" href="{{asset('MainAssets/img/logo/icon-100x100.png')}}" sizes="32x32">

       @vite(['resources/css/app.css', 'resources/js/app.js'])
         <!-- App css -->
         <link href="{{asset('adminAssets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
         <link href="{{asset('adminAssets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
         <link href="{{asset('adminAssets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
         
    </head>

    
    <!-- Top Bar Start -->
    <body>
    <div class="container-xxl">
    {{ $slot }}                                       
    </div><!-- container -->
    </body>
    <!--end body-->

<!-- Mirrored from mannatthemes.com/rizz/default/auth-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Nov 2024 14:18:13 GMT -->
</html>
