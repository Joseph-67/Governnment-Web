<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-slot:pageHeading>
            <h4 class="mt-3 mb-1 fw-semibold text-white fs-18">Let's Get Started FME</h4>   
            <p class="text-muted fw-medium mb-0">Sign in to continue use of application.</p>
        </x-slot>

        <x-validation-errors class="alert" alert />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form class="my-4" method="POST" action="{{ (isset($guard))? route($guard.'.login'):route('login') }}">
            @csrf

            <div class="form-group mb-2">
                <label class="form-label" for="username">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">                               
            </div><!--end form-group--> 

            <div class="form-group">
                <label class="form-label" for="userpassword">Password</label>                                            
                <input type="password" class="form-control" name="password" id="userpassword" placeholder="Enter password">                            
            </div><!--end form-group--> 

            <div class="form-group row mt-3">
                <div class="col-sm-6">
                    <div class="form-check form-switch form-switch-success">
                        <input class="form-check-input" type="checkbox" id="customSwitchSuccess" name="remember">
                        <label class="form-check-label" for="customSwitchSuccess">Remember me</label>
                    </div>
                </div><!--end col-->
                @if (Route::has('password.request')) 
                <div class="col-sm-6 text-end">
                    <a href="{{ route('password.request') }}" class="text-muted font-13"><i class="dripicons-lock"></i> Forgot password?</a>                                    
                </div>
                @endif
                <!--end col--> 
            </div><!--end form-group--> 

            <div class="form-group mb-0 row">
                <div class="col-12">
                    <div class="d-grid mt-3">
                        <x-button class="btn btn-primary">Log In <i class="fas fa-sign-in-alt ms-1"></i></x-button>
                    </div>
                </div><!--end col--> 
            </div> <!--end form-group--> 
        </form>
    </x-authentication-card>
</x-guest-layout>
