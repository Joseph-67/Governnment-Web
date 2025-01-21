<x-layouts.admin-app>
    <div class="container-xxl">
        <div class="row">
            <div class="col-md-12 col-lg-3">
                <div class="card">
                <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Material Details</h4>
                            </div><!--end col-->
                        </div> <!--end row-->
                    </div><!--end card-header-->
                    <div class="card-body bg-black"> 
                        <div class="row">
                            <div class="col-4 align-self-center">                                                
                                <img src="assets/images/logo-sm.png" alt="logo-small" class="logo-sm me-1" height="70" > 
                            </div><!--end col-->    
                            <div class="col-8 text-end align-self-center">                                                
                                <h5 class="mb-1 fw-semibold text-white"> {{ $material->company_name }}</h5> 
                                <!-- <h5 class="mb-0 fw-semibold text-white"><span class="text-muted">Industry:</span> {{ $material->industry }}</h5>  -->
                                <h5 class="mb-0 text-white">({{ $material->state }}, {{ $material->country }}.)</p> 
                            </div><!--end col-->    
                        </div><!--end row-->     
                    </div><!--end card-body-->

                    <div class="card-body pt-0">
                        <div class="d-flex align-items-center border-dashed-bottom py-3">
                            <div class="flex-grow-1 ms-2">
                                <h5 class="m-0">Material Name:</h5><span>{{ $material->material }}</span>
                            </div><!--end media-body-->
                        </div><!--end media-->

                        <div class="d-flex align-items-center border-dashed-bottom py-2">
                            <div class="flex-grow-1 ms-2">
                                <h5 class="m-0">Category Name:</h5><span>
                                    @php
                                    $category = DB::table('materials')->join('categories', 'materials.categoryID', '=', 'categories.categoryID')->where('materials.materialID', '=', $material->materialID)->first(['category_name']);
                                    @endphp
                                    {{ $category->category_name }}
                                </span>

                            </div><!--end media-body-->
                        </div><!--end media-->
                        <div class="d-flex align-items-center border-dashed-bottom py-3">
                            <div class="flex-grow-1 ms-2">
                                <h5 class="m-0">Description:</h5><span>{{ $material->description }}</span>

                            </div><!--end media-body-->
                        </div><!--end media-->
                        <div class="d-flex align-items-center border-dashed-bottom py-3">
                            <div class="flex-grow-1 ms-2">
                                <h5 class="m-0">Latest Material Price:</h5><span>₦{{number_format($prices->price,
                                    2)}}</span>

                            </div><!--end media-body-->
                        </div><!--end media-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
            <div class="col-md-12 col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Metrics</h4>
                            </div><!--end col-->
                            <div class="col-auto">
                                <div class="dropdown">
                                    <a href="#" class="btn bt btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="icofont-calendar fs-5 me-1"></i> This Year<i
                                            class="las la-angle-down ms-1"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Today</a>
                                        <a class="dropdown-item" href="#">Last Week</a>
                                        <a class="dropdown-item" href="#">Last Month</a>
                                        <a class="dropdown-item" href="#">This Year</a>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div> <!--end row-->
                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        <div id="reports-bar" class="apex-charts pill-bar"></div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Visits Details</h4>
                            </div><!--end col-->
                        </div> <!--end row-->
                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>URL</th>
                                        <th class="text-end">Views</th>
                                        <th class="text-end">Uniques</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>htpps:/</td>
                                        <td class="text-end">9.2k</td>
                                        <td class="text-end">7.9k</td>
                                    </tr>
                                    <tr>
                                        <td>.com/dashboard</td>
                                        <td class="text-end">7.7k</td>
                                        <td class="text-end">6.2k</td>
                                    </tr>
                                    <tr>
                                        <td>.com/ecommerce-index</td>
                                        <td class="text-end">6.8k</td>
                                        <td class="text-end">5.5k</td>
                                    </tr>
                                    <tr>
                                        <td>.com/apps/projects-overview</td>
                                        <td class="text-end">5k</td>
                                        <td class="text-end">4.9k</td>
                                    </tr>
                                    <tr>
                                        <td>.com/blog/crypto/exchange</td>
                                        <td class="text-end">4.3k</td>
                                        <td class="text-end">3.3k</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">By Social Media</h4>
                            </div><!--end col-->
                        </div> <!--end row-->
                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Source</th>
                                        <th class="text-end">Views</th>
                                        <th class="text-end">Uniques</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Twitter</td>
                                        <td class="text-end">9.2k</td>
                                        <td class="text-end">7.9k</td>
                                    </tr>
                                    <tr>
                                        <td>Facebook</td>
                                        <td class="text-end">7.7k</td>
                                        <td class="text-end">6.2k</td>
                                    </tr>
                                    <tr>
                                        <td>Instagram</td>
                                        <td class="text-end">6.8k</td>
                                        <td class="text-end">5.5k</td>
                                    </tr>
                                    <tr>
                                        <td>LinkedIn</td>
                                        <td class="text-end">5k</td>
                                        <td class="text-end">4.9k</td>
                                    </tr>
                                    <tr>
                                        <td>WhatsApp</td>
                                        <td class="text-end">4.3k</td>
                                        <td class="text-end">3.3k</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div><!-- container -->
    @section('scripts')
    <script src="{{asset('adminAssets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('adminAssets/libs/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('adminAssets/js/pages/analytics-reports.init.js')}}"></script>
    @endsection
</x-layouts.admin.app>