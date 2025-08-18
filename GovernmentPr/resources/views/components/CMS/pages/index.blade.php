<x-layouts.admin-app>
    @section('styles')
        <link href="{{asset('adminAssets/libs/simple-datatables/style.css')}}" rel="stylesheet" type="text/css" />
    @endsection
    <div class="container-xxl">
        <div class="row">
            <div class="col-12">
                <h1>{{ $title }}</h1>
                <p>{{ $description }}</p>
                <p>Keywords: {{ $keywords }}</p>
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <p>Welcome to the Pages Management section. Here you can create, edit, and manage your pages.</p>
                            <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">Create New Page</a>
                        </div>
                        <div class="col-auto">
                            <p>List of pages will be displayed here.</p>
                            <!-- You can add a table or list to display existing pages -->
                            <div class="table-responsive">
                                <table class="table mb-0 checkbox-all" id="datatable_1">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Slug</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Author</th>
                                            <th scope="col">Updated</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Example row, replace with dynamic content -->
                                        
                                        <!-- Repeat for other pages -->
                                    </tbody>
                                </table>
                                <!-- Pagination can be added here if needed -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add your content here -->
    </div>
    @section('scripts')
        <script src="{{asset('adminAssets/libs/simple-datatables/umd/simple-datatables.js')}}"></script>
        <script src="{{asset('adminAssets/js/pages/datatable.init.js')}}"></script>
    @endsection
</x-layouts.admin-app>
