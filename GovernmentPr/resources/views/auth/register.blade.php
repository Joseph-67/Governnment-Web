<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-slot:pageHeading>
            <h4 class="mt-3 mb-1 fw-semibold text-white fs-18">Create an account</h4>   
            <p class="text-muted fw-medium mb-0">Enter your detail to Create your account today.</p>  
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form class="my-4" method="POST" action="{{ (isset($guard))? route($guard.'.register'):route('register') }}">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group mb-2">
                        <label class="form-label" for="username">First name</label>
                        <input type="text" class="form-control" id="firstname" name="first_name" placeholder="John">                               
                    </div><!--end form-group--> 
                </div>

                <div class="col-md-4">
                    <div class="form-group mb-2">
                        <label class="form-label" for="lastname">Last name</label>
                        <input type="text" class="form-control" id="lastname" name="last_name" placeholder="Doe">                               
                    </div><!--end form-group--> 
                </div>

                <div class="col-md-4">
                    <div class="form-group mb-2">
                        <label class="form-label" for="othername">Other name</label>
                        <input type="text" class="form-control" id="othername" name="other_name" placeholder="">                               
                    </div><!--end form-group--> 
                </div>

                <div class="col-md-12">
                    <div class="form-group mb-2">
                        <label class="form-label" for="useremail">Email</label>
                        <input type="email" class="form-control" id="useremail" name="email" placeholder="johndoe@domain.com">                               
                    </div><!--end form-group-->
                </div>

                <div class="col-md-12">
                    <div class="form-group mb-2">
                        <label class="form-label" for="userpassword">Password</label>                                            
                        <input type="password" class="form-control" name="password" id="userpassword" placeholder="Enter password">                            
                    </div><!--end form-group--> 
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-2">
                        <label class="form-label" for="Confirmpassword">ConfirmPassword</label>                                            
                        <input type="password" class="form-control" name="password_confirmation" id="Confirmpassword" placeholder="Enter Confirm password">                            
                    </div><!--end form-group--> 
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-2">
                        <label class="form-label" for="mobileNo">Mobile Number</label>
                        <input type="text" class="form-control" id="mobileNo" name="mobile number" placeholder="Enter Mobile Number">                               
                    </div><!--end form-group-->
                </div>
                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="col-md-12">
                    <div class="form-group row mt-3">
                        <div class="col-12">
                            <div class="form-check form-switch form-switch-success">
                                <input class="form-check-input" type="checkbox" id="customSwitchSuccess" name ="terms">
                                <label class="form-check-label" for="customSwitchSuccess">By registering you agree to the Federal Ministry of Environment <a href="#" class="text-primary">Terms of Use</a></label>
                            </div>
                        </div><!--end col--> 
                    </div><!--end form-group--> 
                </div>
                @endif
                <div class="form-group mb-0 row">
                    <div class="col-12">
                        <div class="d-grid mt-3">
                            <x-button class="btn btn-primary"> Register <i class="fas fa-sign-in-alt ms-1"></i></x-button>
                        </div>
                    </div><!--end col--> 
                </div> <!--end form-group--> 
            </div>                          
        </form><!--end form-->
        <div class="text-center">
            <p class="text-muted">Already have an account ?  <a href="{{ route('login') }}" class="text-primary ms-2">Log in</a></p>
        </div>

    </x-authentication-card>
</x-guest-layout>
