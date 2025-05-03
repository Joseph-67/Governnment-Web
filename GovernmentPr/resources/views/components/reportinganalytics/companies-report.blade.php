<x-layouts.admin-app>
    @section('PageTitle', $pageTitle)
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <!-- Page Header -->
                <div class="header-title">
                    <h3>{{ $pageTitle }}</h3>
                    <p>Welcome to the Companies Report section. Here you can find detailed analytics and insights about various companies.</p>
                </div>
                <!-- End Page Header -->
            </div>
        </div>
        <div id="companyCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Company A</h5>
                                    <p class="card-text">Projects: 40</p>
                                    <p class="card-text">Budget: $400,000</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Company B</h5>
                                    <p class="card-text">Projects: 35</p>
                                    <p class="card-text">Budget: $350,000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Company C</h5>
                                    <p class="card-text">Projects: 50</p>
                                    <p class="card-text">Budget: $500,000</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Company D</h5>
                                    <p class="card-text">Projects: 45</p>
                                    <p class="card-text">Budget: $450,000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#companyCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#companyCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</x-layouts.admin-app>
