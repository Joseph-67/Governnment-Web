<x-layouts.admin-app>
<x-form-section submit="">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
    <div class="row">
        <div class="col-md-12">
            <input type="text" class="form-control" placeholder="Company name">
        </div>
        <div class="col-md-7 mt-2">
            <input type="text" class="form-control" placeholder="Slogan" aria-label="Last name">
        </div>
        <div class="col-md-5 mt-2">
            <input type="text" class="form-control" placeholder="Abbreviation">
        </div>

    <div class="col-md-6 mt-2">
                            
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">                      
                                            <h4 class="card-title">Custom File Upload</h4>                      
                                        </div><!--end col-->
                                    </div>  <!--end row-->                                  
                                </div><!--end card-header-->
                                <div class="card-body pt-0">
                                    <div class="d-grid">
                                        <p class="text-muted">Upload your blog image here, Please click "Upload Image" Button.</p>
                                        <div class="preview-box d-block justify-content-center rounded  border-dashed border-theme-color overflow-hidden p-3"></div>
                                        <input type="file" id="input-file" name="input-file" accept="image/*" onchange={handleChange()} hidden />
                                        <label class="btn-upload btn btn-primary mt-3" for="input-file">Upload Image</label>
                                    </div>             
                                </div><!--end card-body--> 
                            
                        </div> <!--end col-->
                        <div class="col-md-6 col-lg-6 mt-2">
                            
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">                      
                                            <h4 class="card-title">Custom File Upload</h4>                      
                                        </div><!--end col-->
                                    </div>  <!--end row-->                                  
                                </div><!--end card-header-->
                                <div class="card-body pt-0">
                                    <div class="d-grid">
                                        <p class="text-muted">Upload your blog image here, Please click "Upload Image" Button.</p>
                                        <div class="preview-box d-block justify-content-center rounded  border-dashed border-theme-color overflow-hidden p-3"></div>
                                        <input type="file" id="input-file" name="input-file" accept="image/*" onchange={handleChange()} hidden />
                                        <label class="btn-upload btn btn-primary mt-3" for="input-file">Upload Image</label>
                                    </div>             
                                
                            </div><!--end card--> 
                        </div> <!--end col-->
    </div>

    </x-slot>
</x-form-section>
<x-form-section submit="">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
    <div class="row">
        <div class="col-md-7">
            <input type="text" class="form-control" placeholder="First name" aria-label="First name">
        </div>
        <div class="col-md-5">
            <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
        </div>
    </div>
    </x-slot>
</x-form-section>
@section('scripts')
<script src="assets/js/pages/file-upload.init.js"></script>
@endsection
</x-layouts.admin-app>