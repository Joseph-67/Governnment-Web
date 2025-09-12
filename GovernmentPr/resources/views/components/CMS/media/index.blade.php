<x-layouts.admin-app>
@section('PageTitle', 'Media Library')
@section('styles')
    <link href="{{asset('adminAssets/libs/uppy/uppy.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('scripts')
    <script src="{{asset('adminAssets/libs/uppy/uppy.legacy.min.js')}}"></script>
    <!-- Uppy File Upload -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const uploadSection = document.getElementById("upload-section");
            const cancelUpload = document.getElementById("cancelUpload");
            const fileUploadInput = document.getElementById("file_upload");
            const uploadTitle = document.getElementById("uploadTitle");
            const uploadDesc = document.getElementById("uploadDesc");
            const uploadTargetLabel = document.getElementById("uploadTargetLabel");

            // Dynamic endpoints for each upload type
            const uploadEndpoints = {
                server: "{{ route('admin.media.uploadServer') }}",
                dropbox: "{{ route('admin.media.uploadDropbox') }}",
                google: "{{ route('admin.media.uploadGoogle') }}",
                onedrive: "{{ route('admin.media.uploadOneDrive') }}"
            };

            // Nice labels for the footer
            const endpointLabels = {
                server: "Server Storage",
                dropbox: "Dropbox Cloud",
                google: "Google Drive",
                onedrive: "OneDrive"
            };

            // Uppy instance
            let uppy = new Uppy.Uppy({
                restrictions: {
                    maxFileSize: 5 * 1024 * 1024 * 1024 * 1024,
                    maxNumberOfFiles: 200,
                    allowedFileTypes: ['image/*', 'video/*', 'audio/*', 'application/pdf', 'application/zip']
                },
                autoProceed: false
            });

            uppy.use(Uppy.Dashboard, {
                inline: true,
                target: '#uppyDashboard',
                showProgressDetails: true,
                proudlyDisplayPoweredByUppy: false,
                height: 300
            });

            let uploadPlugin = uppy.use(Uppy.XHRUpload, {
                endpoint: uploadEndpoints.server,
                fieldName: 'file',
                formData: true,
                headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}" },
            });
            
            // Show upload section and switch endpoint dynamically
            document.querySelectorAll(".upload-trigger").forEach(item => {
                console.log(item, 'section', uploadSection);
                
                item.addEventListener("click", function (e) {
                    e.preventDefault();
                    console.log(this.dataset.type);
                    
                    const type = this.getAttribute("data-type");

                    uploadTitle.innerText = `Upload to ${type.charAt(0).toUpperCase() + type.slice(1)}`;
                    uploadDesc.innerText = `Drag & drop or click below to upload files to ${type}.`;
                    uploadTargetLabel.innerText = endpointLabels[type];

                    // Change upload endpoint dynamically
                    uploadPlugin.setOptions({ endpoint: uploadEndpoints[type] });

                    // Show section
                    uploadSection.classList.remove("d-none");
                });
            });

            // Close upload section
            cancelUpload.addEventListener("click", () => {
                uploadSection.classList.add("d-none");
            });

            // Handle upload complete
            uppy.on('complete', (result) => {
                fileUploadInput.value = JSON.stringify(result.successful.map(f => f.response.body));
                console.log('Uploaded files:', result.successful);
            });
        });
    </script>
    <script>
        // Add Category
        document.getElementById('addCategoryForm').addEventListener('submit', function(e) {
            e.preventDefault();
            let formData = new FormData(this);

            fetch("{{ route('admin.media.categories.store') }}", {
                method: "POST",
                headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}" },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                console.log(data);
                
                if (data.success) {
                    addCategoryToUI(data.category);
                    this.reset();
                }
            });
        });

        // Delete Category
        document.addEventListener('click', function(e) {
            if (e.target.closest('.delete-category')) {
                let id = e.target.closest('.delete-category').dataset.id;
                fetch(`/media/categories/${id}`, {
                    method: "DELETE",
                    headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content }
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById(`tab-${id}`)?.remove();
                        document.querySelector(`#uploadCategory option[value="${id}"]`)?.remove();
                        e.target.closest('li').remove();
                    }
                });
            }
        });

        function addCategoryToUI(category) {
            // Add to Tabs
            console.log('Adding category to UI:', category);
            
            let tab = document.createElement('li');
            tab.className = 'nav-item';
            tab.id = `tab-${category.category_id}`;
            tab.innerHTML = `<a class="nav-link fw-semibold py-2" data-bs-toggle="tab" href="#category-${category.category_id}" role="tab">
                                <i class="fa-regular fa-folder-open me-1"></i> ${category.name}
                            </a>`;
                            console.log(tab);
                            
            document.getElementById('categoryTabs').appendChild(tab);

            // Add to Dropdown
            let option = document.createElement('option');
            option.value = category.category_id;
            option.textContent = category.name;
            document.getElementById('uploadCategory').appendChild(option);

            // Add to Modal List
            let li = document.createElement('li');
            li.classList.add('list-group-item','d-flex','justify-content-between','align-items-center');
            li.innerHTML = `${category.name} <button class="btn btn-sm btn-danger delete-category" data-id="${category.category_id}"><i class="fa fa-trash"></i></button>`;
            document.getElementById('categoryList').appendChild(li);
        }
    </script>
@endsection
@section('modals')
<div class="modal fade" id="mediaCategoryModal" tabindex="-1" aria-labelledby="mediaCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Manage Media Categories</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Add New Category -->
                    <div class="col-md-5 border-end">
                        <h6>Add Category</h6>
                        <form id="addCategoryForm">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="e.g., Images, Documents" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Add</button>
                        </form>
                    </div>

                    <!-- Category List -->
                    <div class="col-md-7">
                        <h6>Existing Categories</h6>
                        <ul class="list-group" id="categoryList">
                            @foreach($categories as $category)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $category->name }}
                                    <button class="btn btn-sm btn-danger delete-category" data-id="{{ $category->category_id }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<div class="container-xxl">
    <!-- Manage Categories Button -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold">Media Library</h4>
        <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#mediaCategoryModal">
            <i class="fa fa-folder-plus me-1"></i> Manage Categories
        </button>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="text-muted fs-16 dropdown-toggle p-1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">View Detail</a>
                            <a class="dropdown-item" href="#">Clear All</a>
                            <a class="dropdown-item" href="#">Delete</a>
                        </div>
                    </div>   
                    <img src="assets/images/logos/lang-logo/gdrive.png" class="me-2 align-self-center thumb-xl" alt="...">
                    <h5 class="fw-semibold mt-3 fs-14">Google Drive</h5>
                    <div class="d-flex justify-content-between my-2">
                        <p class="text-muted mb-0 fs-13 fw-semibold"><span class="text-dark">34 </span>Files</p>
                        <p class="text-muted mb-0 fs-13 fw-semibold"><span class="text-dark">500 </span>GB</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 text-truncate"> 
                            <div class="d-flex align-items-center">
                                <div class="progress bg-secondary-subtle w-100" style="height:5px;" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-secondary" style="width: 38%"></div>
                                </div> 
                                <small class="flex-shrink-1 ms-1">38%</small>
                            </div>                                                                                    
                        </div><!--end media body-->
                    </div><!--end media-->
                </div><!--end card-body--> 
            </div><!--end card--> 
        </div> <!--end col--> 
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="text-muted fs-16 dropdown-toggle p-1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">View Detail</a>
                            <a class="dropdown-item" href="#">Clear All</a>
                            <a class="dropdown-item" href="#">Delete</a>
                        </div>
                    </div>   
                    <img src="assets/images/logos/lang-logo/dropbox.png" class="me-2 align-self-center thumb-xl" alt="...">
                    <h5 class="fw-semibold mt-3 fs-14">Dropbox</h5>
                    <div class="d-flex justify-content-between my-2">
                        <p class="text-muted mb-0 fs-13 fw-semibold"><span class="text-dark">68 </span>Files</p>
                        <p class="text-muted mb-0 fs-13 fw-semibold"><span class="text-dark">500 </span>GB</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 text-truncate"> 
                            <div class="d-flex align-items-center">
                                <div class="progress bg-secondary-subtle w-100" style="height:5px;" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-secondary" style="width: 15%"></div>
                                </div> 
                                <small class="flex-shrink-1 ms-1">15%</small>
                            </div>                                                                                    
                        </div><!--end media body-->
                    </div><!--end media-->
                </div><!--end card-body--> 
            </div><!--end card--> 
        </div> <!--end col-->
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="text-muted fs-16 dropdown-toggle p-1 " data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">View Detail</a>
                            <a class="dropdown-item" href="#">Clear All</a>
                            <a class="dropdown-item" href="#">Delete</a>
                        </div>
                    </div>   
                    <img src="assets/images/logos/lang-logo/onedrive.png" class="me-2 align-self-center thumb-xl" alt="...">
                    <h5 class="fw-semibold mt-3 fs-14">Onedrive</h5>
                    <div class="d-flex justify-content-between my-2">
                        <p class="text-muted mb-0 fs-13 fw-semibold"><span class="text-dark">192 </span>Files</p>
                        <p class="text-muted mb-0 fs-13 fw-semibold"><span class="text-dark">500 </span>GB</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 text-truncate"> 
                            <div class="d-flex align-items-center">
                                <div class="progress bg-secondary-subtle w-100" style="height:5px;" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-secondary" style="width: 48%"></div>
                                </div> 
                                <small class="flex-shrink-1 ms-1">48%</small>
                            </div>                                                                                    
                        </div><!--end media body-->
                    </div><!--end media-->
                </div><!--end card-body--> 
            </div><!--end card--> 
        </div> <!--end col-->
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="text-muted fs-16 dropdown-toggle p-1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">View Detail</a>
                            <a class="dropdown-item" href="#">Clear All</a>
                            <a class="dropdown-item" href="#">Delete</a>
                        </div>
                    </div>   
                    <img src="assets/images/logos/lang-logo/server.png" class="me-2 align-self-center thumb-xl" alt="...">
                    <h5 class="fw-semibold mt-3 fs-14">Server</h5>
                    <div class="d-flex justify-content-between my-2">
                        <p class="text-muted mb-0 fs-13 fw-semibold"><span class="text-dark">81 </span>Files</p>
                        <p class="text-muted mb-0 fs-13 fw-semibold"><span class="text-dark">500 </span>GB</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 text-truncate"> 
                            <div class="d-flex align-items-center">
                                <div class="progress bg-secondary-subtle w-100" style="height:5px;" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-secondary" style="width: 76%"></div>
                                </div> 
                                <small class="flex-shrink-1 ms-1">76%</small>
                            </div>                                                                                    
                        </div><!--end media body-->
                    </div><!--end media-->
                </div><!--end card-body--> 
            </div><!--end card--> 
        </div> <!--end col-->                                                                              
    </div><!--end row-->
    <div class="row justify-content-center">
        <div class="col-12">
            <div id="upload-section" class="card border-0 shadow-sm rounded-4 p-4 w-100 mb-4 d-none position-relative">
                <!-- Close Button -->
                <button type="button" id="cancelUpload" class="btn-close position-absolute top-0 end-0 m-3" aria-label="Close"></button>

                <!-- Header -->
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;">
                        <i class="fa-solid fa-cloud-upload-alt fs-5"></i>
                    </div>
                    <h5 id="uploadTitle" class="mb-0 fw-semibold text-dark">Upload to Server</h5>
                </div>

                <!-- Description -->
                <p id="uploadDesc" class="text-muted mb-3 small">
                    Drag & drop your files here or click below to select. Supports images, videos, documents, and archives.
                </p>
                
                <!-- Select Category -->
                <select name="category_id" id="uploadCategory" class="form-select mb-3">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->category_id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                <!-- Uppy Dashboard -->
                <div id="uppyDashboard" class="p-2"></div>

                <!-- Footer Info -->
                <div class="mt-3 text-muted small d-flex justify-content-between">
                    <span><i class="fa-regular fa-clock me-1"></i> Files stay private & secure</span>
                    <span id="uploadTargetLabel" class="fw-semibold text-primary">Server Storage</span>
                </div>

                <!-- Hidden input for storing uploaded file info -->
                <input type="hidden" name="file_upload" id="file_upload" value="[]">
            </div>
        </div>

        <div class="col-12">
            <div class="clearfix">
                <div class="btn-group float-end ms-2">
                    <button type="button" class="btn btn-secondary me-0 overflow-hidden upload-trigger" data-type="server">
                        Upload File
                    </button>
                    <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="las la-angle-down"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end p-2 shadow-lg">
                        <h6 class="dropdown-header text-uppercase text-muted fs-11 fw-bold">Upload Sources</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item upload-trigger" href="#" id="displayUpload" data-type="server"><i class="las la-file-upload fs-18 me-1 align-text-bottom"></i> Upload To Server</a>
                        <a class="dropdown-item upload-trigger" href="#" id="showFolderUpload" data-type="dropbox"><i class="lab la-dropbox fs-18 me-1 text-primary align-text-bottom"></i> Upload To Dropbox</a>
                        <a class="dropdown-item upload-trigger" href="#" id="showFolderUpload" data-type="google"><i class="lab la-google-drive fs-18 me-1 text-danger align-text-bottom"></i> Upload To GoogleDrive</a>
                        <a class="dropdown-item upload-trigger" href="#" id="showFolderUpload" data-type="onedrive"><i class="lab la-windows fs-18 me-1 text-info align-text-bottom"></i> Upload To OneDrive</a>
                    </div>
                </div>

                <ul class="nav nav-tabs my-4" role="tablist" id="categoryTabs">
                    <li class="nav-item">
                        <a class="nav-link fw-semibold active py-2" data-bs-toggle="tab" href="#documents" role="tab" aria-selected="true"><i class="fa-regular fa-folder-open me-1"></i> Documents <span class="badge rounded text-blue bg-blue-subtle ms-1">32</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold py-2" data-bs-toggle="tab" href="#images" role="tab" aria-selected="false"><i class="fa-regular fa-image me-1"></i> Images <span class="badge rounded text-blue bg-blue-subtle ms-1">85</span></a>
                    </li>                                                
                    <li class="nav-item">
                        <a class="nav-link fw-semibold py-2" data-bs-toggle="tab" href="#audio" role="tab" aria-selected="false"><i class="fa-solid fa-headphones me-1"></i> Audio <span class="badge rounded text-blue bg-blue-subtle ms-1">21</span></a>
                    </li>
                </ul>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">                      
                            <h4 class="card-title">Files</h4>                      
                        </div><!--end col-->
                        <div class="col-auto"> 
                            <div class="dropdown">
                                <a href="#" class="text-body text-decoration-underline">
                                    View All
                                </a>
                            </div>               
                        </div><!--end col-->
                    </div>  <!--end row-->                                  
                </div><!--end card-header-->
                <div class="card-body pt-0">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="documents" role="tabpanel">
                            <div class="table-responsive browser_users">
                                <table class="table mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0 text-end">Last Modified</th>
                                            <th class="border-top-0 text-end">Size</th>
                                            <th class="border-top-0 text-end">Members</th>
                                            <th class="border-top-0 text-end">Action</th>
                                        </tr><!--end tr-->
                                    </thead>
                                    <tbody>
                                        <tr>                                                        
                                            <td>
                                                <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-blue-subtle rounded mx-auto me-1">
                                                    <i class="fa-solid fa-file-pdf fs-18 align-self-center mb-0 text-blue"></i>
                                                </div>
                                                <a href="#" class="text-body">payment.pdf</a>
                                            </td>
                                            <td class="text-end">18 Jul 2024</td>                                   
                                            <td class="text-end"> 2.3 MB</td>
                                            <td class="text-end">
                                                <div class="img-group d-flex justify-content-end">
                                                    <a class="user-avatar position-relative d-inline-block" href="#">
                                                        <img src="assets/images/users/avatar-2.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                    </a>
                                                    <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                                        <img src="assets/images/users/avatar-5.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                    </a>
                                                    <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                                        <img src="assets/images/users/avatar-3.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                    </a>                 
                                                </div>
                                            </td>
                                            <td class="text-end">   
                                                <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                            </td>
                                        </tr><!--end tr-->  
                                        <tr>                                                        
                                            <td>
                                                <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-blue-subtle rounded mx-auto me-1">
                                                    <i class="fa-solid fa-file-pdf fs-18 align-self-center mb-0 text-blue"></i>
                                                </div>
                                                <a href="#" class="text-body">statement.pdf</a>
                                            </td>
                                            <td class="text-end">08 Dec 2024</td>                                   
                                            <td class="text-end"> 3.7 MB</td>
                                            <td class="text-end">
                                                <div class="img-group d-flex justify-content-end">
                                                    <a class="user-avatar position-relative d-inline-block" href="#">
                                                        <img src="assets/images/users/avatar-3.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                    </a>
                                                    <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                                        <img src="assets/images/users/avatar-10.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                    </a>                 
                                                </div>
                                            </td>
                                            <td class="text-end">   
                                                <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                            </td>
                                        </tr><!--end tr-->  
                                        <tr>                                                        
                                            <td>
                                                <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-blue-subtle rounded mx-auto me-1">
                                                    <i class="fa-solid fa-file-pdf fs-18 align-self-center mb-0 text-blue"></i>
                                                </div>
                                                <a href="#" class="text-body">idcard.pdf</a>
                                            </td>
                                            <td class="text-end">30 Nov 2024</td>                                   
                                            <td class="text-end"> 1.5 MB</td>
                                            <td class="text-end">
                                                <div class="img-group d-flex justify-content-end">
                                                    <a class="user-avatar position-relative d-inline-block" href="#">
                                                        <img src="assets/images/users/avatar-7.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                    </a>
                                                    <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                                        <img src="assets/images/users/avatar-2.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                    </a>                  
                                                </div>
                                            </td>
                                            <td class="text-end">   
                                                <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                            </td>
                                        </tr><!--end tr-->  
                                        <tr>                                                        
                                            <td>
                                                <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-blue-subtle rounded mx-auto me-1">
                                                    <i class="fa-solid fa-file-pdf fs-18 align-self-center mb-0 text-blue"></i>
                                                </div>
                                                <a href="#" class="text-body">invoice.pdf</a>
                                            </td>
                                            <td class="text-end">09 Sep 2024</td>                                   
                                            <td class="text-end"> 3.2 MB</td>
                                            <td class="text-end">
                                                -
                                            </td>
                                            <td class="text-end">   
                                                <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                            </td>
                                        </tr><!--end tr-->  
                                        <tr>                                                        
                                            <td>
                                                <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-blue-subtle rounded mx-auto me-1">
                                                    <i class="fa-solid fa-file-pdf fs-18 align-self-center mb-0 text-blue"></i>
                                                </div>
                                                <a href="#" class="text-body">tutorial.pdf</a>
                                            </td>
                                            <td class="text-end">14 Aug 2024</td>                                   
                                            <td class="text-end"> 12.7 MB</td>
                                            <td class="text-end">
                                                <div class="img-group d-flex justify-content-end">
                                                    <a class="user-avatar position-relative d-inline-block" href="#">
                                                        <img src="assets/images/users/avatar-2.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                    </a>
                                                    <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                                        <img src="assets/images/users/avatar-3.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                    </a>
                                                    <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                                        <img src="assets/images/users/avatar-8.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                    </a>                  
                                                </div>
                                            </td>
                                            <td class="text-end">   
                                                <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                            </td>
                                        </tr><!--end tr-->  
                                        <tr>                                                        
                                            <td>
                                                <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-blue-subtle rounded mx-auto me-1">
                                                    <i class="fa-solid fa-file-pdf fs-18 align-self-center mb-0 text-blue"></i>
                                                </div>
                                                <a href="#" class="text-body">project.pdf</a>
                                            </td>
                                            <td class="text-end">12 Aug 2024</td>                                   
                                            <td class="text-end"> 5.2 MB</td>
                                            <td class="text-end">
                                                <div class="img-group d-flex justify-content-end">
                                                    <a class="user-avatar position-relative d-inline-block" href="#">
                                                        <img src="assets/images/users/avatar-1.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                    </a>
                                                    <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                                        <img src="assets/images/users/avatar-4.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                    </a>
                                                    <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                                        <img src="assets/images/users/avatar-6.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                    </a>                 
                                                </div>
                                            </td>
                                            <td class="text-end">   
                                                <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                            </td>
                                        </tr><!--end tr-->     
                                                                        
                                    </tbody>
                                </table> <!--end table-->                                               
                            </div><!--end /div--> 
                        </div>
                        <div class="tab-pane" id="images" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0 text-end">Last Modified</th>
                                            <th class="border-top-0 text-end">Size</th>
                                            <th class="border-top-0 text-end">Members</th>
                                            <th class="border-top-0 text-end">Action</th>
                                        </tr><!--end tr-->
                                    </thead>
                                    <tbody>
                                        <tr>                                                        
                                            <td>
                                                <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-danger-subtle rounded mx-auto me-1">
                                                    <i class="fa-solid fa-image fs-18 align-self-center mb-0 text-danger"></i>
                                                </div>
                                                <a href="#" class="text-body">img52315.jpeg</a>
                                            </td>
                                            <td class="text-end">18 Jul 2024</td>                                   
                                            <td class="text-end"> 2.3 MB</td>
                                            <td class="text-end">
                                                <div class="img-group d-flex justify-content-end">
                                                    <a class="user-avatar position-relative d-inline-block" href="#">
                                                        <img src="assets/images/users/avatar-2.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                    </a>
                                                    <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                                        <img src="assets/images/users/avatar-5.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                    </a>
                                                    <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                                        <img src="assets/images/users/avatar-3.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                    </a>                 
                                                </div>
                                            </td>
                                            <td class="text-end">   
                                                <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                            </td>
                                        </tr><!--end tr-->  
                                        <tr>                                                        
                                            <td>
                                                <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-danger-subtle rounded mx-auto me-1">
                                                    <i class="fa-solid fa-image fs-18 align-self-center mb-0 text-danger"></i>
                                                </div>
                                                <a href="#" class="text-body">img63695.jpeg</a>
                                            </td>
                                            <td class="text-end">08 Dec 2024</td>                                   
                                            <td class="text-end"> 3.7 MB</td>
                                            <td class="text-end">
                                                <div class="img-group d-flex justify-content-end">
                                                    <a class="user-avatar position-relative d-inline-block" href="#">
                                                        <img src="assets/images/users/avatar-3.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                    </a>
                                                    <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                                        <img src="assets/images/users/avatar-10.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                    </a>                 
                                                </div>
                                            </td>
                                            <td class="text-end">   
                                                <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                            </td>
                                        </tr><!--end tr-->  
                                        <tr>                                                        
                                            <td>
                                                <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-danger-subtle rounded mx-auto me-1">
                                                    <i class="fa-solid fa-image fs-18 align-self-center mb-0 text-danger"></i>
                                                </div>
                                                <a href="#" class="text-body">img00021.jpeg</a>
                                            </td>
                                            <td class="text-end">30 Nov 2024</td>                                   
                                            <td class="text-end"> 1.5 MB</td>
                                            <td class="text-end">
                                                <div class="img-group d-flex justify-content-end">
                                                    <a class="user-avatar position-relative d-inline-block" href="#">
                                                        <img src="assets/images/users/avatar-7.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                    </a>
                                                    <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                                        <img src="assets/images/users/avatar-2.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                    </a>                  
                                                </div>
                                            </td>
                                            <td class="text-end">   
                                                <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                            </td>
                                        </tr><!--end tr-->  
                                        <tr>                                                        
                                            <td>
                                                <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-danger-subtle rounded mx-auto me-1">
                                                    <i class="fa-solid fa-image fs-18 align-self-center mb-0 text-danger"></i>
                                                </div>
                                                <a href="#" class="text-body">img36251.jpeg</a>
                                            </td>
                                            <td class="text-end">09 Sep 2024</td>                                   
                                            <td class="text-end"> 3.2 MB</td>
                                            <td class="text-end">
                                                -
                                            </td>
                                            <td class="text-end">   
                                                <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                            </td>
                                        </tr><!--end tr-->  
                                        <tr>                                                        
                                            <td>
                                                <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-danger-subtle rounded mx-auto me-1">
                                                    <i class="fa-solid fa-image fs-18 align-self-center mb-0 text-danger"></i>
                                                </div>
                                                <a href="#" class="text-body">img362511.jpeg</a>
                                            </td>
                                            <td class="text-end">14 Aug 2024</td>                                   
                                            <td class="text-end"> 12.7 MB</td>
                                            <td class="text-end">
                                                <div class="img-group d-flex justify-content-end">
                                                    <a class="user-avatar position-relative d-inline-block" href="#">
                                                        <img src="assets/images/users/avatar-2.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                    </a>
                                                    <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                                        <img src="assets/images/users/avatar-3.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                    </a>
                                                    <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                                        <img src="assets/images/users/avatar-8.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                    </a>                  
                                                </div>
                                            </td>
                                            <td class="text-end">   
                                                <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                            </td>
                                        </tr><!--end tr-->  
                                        <tr>                                                        
                                            <td>
                                                <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-danger-subtle rounded mx-auto me-1">
                                                    <i class="fa-solid fa-image fs-18 align-self-center mb-0 text-danger"></i>
                                                </div>
                                                <a href="#" class="text-body">img963852.jpeg</a>
                                            </td>
                                            <td class="text-end">12 Aug 2024</td>                                   
                                            <td class="text-end"> 5.2 MB</td>
                                            <td class="text-end">
                                                <div class="img-group d-flex justify-content-end">
                                                    <a class="user-avatar position-relative d-inline-block" href="#">
                                                        <img src="assets/images/users/avatar-1.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                    </a>
                                                    <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                                        <img src="assets/images/users/avatar-4.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                    </a>
                                                    <a class="user-avatar position-relative d-inline-block ms-n2" href="#">
                                                        <img src="assets/images/users/avatar-6.jpg" alt="avatar" class="thumb-md shadow-sm rounded-circle">
                                                    </a>                 
                                                </div>
                                            </td>
                                            <td class="text-end">   
                                                <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                            </td>
                                        </tr><!--end tr-->                                                                                     
                                    </tbody>
                                </table> <!--end table-->                                               
                            </div><!--end /div--> 
                        </div>                                                
                        <div class="tab-pane" id="audio" role="tabpanel">                                           
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0 text-end">Last Modified</th>
                                            <th class="border-top-0 text-end">Size</th>
                                            <th class="border-top-0 text-end">Action</th>
                                        </tr><!--end tr-->
                                    </thead>
                                    <tbody>
                                        <tr>                                                        
                                            <td>
                                                <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-secondary-subtle rounded mx-auto me-1">
                                                    <i class="fa-solid fa-microphone fs-18 align-self-center mb-0 text-secondary"></i>
                                                </div>
                                                <a href="#" class="text-body">audio52315..</a>
                                            </td>
                                            <td class="text-end">18 Jul 2024</td>                                   
                                            <td class="text-end"> 2.3 MB</td>
                                            <td class="text-end">   
                                                <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                            </td>
                                        </tr><!--end tr-->  
                                        <tr>                                                        
                                            <td>
                                                <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-secondary-subtle rounded mx-auto me-1">
                                                    <i class="fa-solid fa-microphone fs-18 align-self-center mb-0 text-secondary"></i>
                                                </div>
                                                <a href="#" class="text-body">audio63695..</a>
                                            </td>
                                            <td class="text-end">08 Dec 2024</td>                                   
                                            <td class="text-end"> 3.7 MB</td>
                                            <td class="text-end">   
                                                <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                            </td>
                                        </tr><!--end tr-->  
                                        <tr>                                                        
                                            <td>
                                                <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-secondary-subtle rounded mx-auto me-1">
                                                    <i class="fa-solid fa-microphone fs-18 align-self-center mb-0 text-secondary"></i>
                                                </div>
                                                <a href="#" class="text-body">audio00021..</a>
                                            </td>
                                            <td class="text-end">30 Nov 2024</td>                                   
                                            <td class="text-end"> 1.5 MB</td>
                                            <td class="text-end">   
                                                <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                            </td>
                                        </tr><!--end tr-->  
                                        <tr>                                                        
                                            <td>
                                                <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-secondary-subtle rounded mx-auto me-1">
                                                    <i class="fa-solid fa-microphone fs-18 align-self-center mb-0 text-secondary"></i>
                                                </div>
                                                <a href="#" class="text-body">audio36251..</a>
                                            </td>
                                            <td class="text-end">09 Sep 2024</td>                                   
                                            <td class="text-end"> 3.2 MB</td>
                                            <td class="text-end">   
                                                <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                            </td>
                                        </tr><!--end tr-->  
                                        <tr>                                                        
                                            <td>
                                                <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-secondary-subtle rounded mx-auto me-1">
                                                    <i class="fa-solid fa-microphone fs-18 align-self-center mb-0 text-secondary"></i>
                                                </div>
                                                <a href="#" class="text-body">audio362511..</a>
                                            </td>
                                            <td class="text-end">14 Aug 2024</td>                                   
                                            <td class="text-end"> 12.7 MB</td>
                                            <td class="text-end">   
                                                <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                            </td>
                                        </tr><!--end tr-->  
                                        <tr>                                                        
                                            <td>
                                                <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-secondary-subtle rounded mx-auto me-1">
                                                    <i class="fa-solid fa-microphone fs-18 align-self-center mb-0 text-secondary"></i>
                                                </div>
                                                <a href="#" class="text-body">audio963852..</a>
                                            </td>
                                            <td class="text-end">12 Aug 2024</td>                                   
                                            <td class="text-end"> 5.2 MB</td>
                                            <td class="text-end">   
                                                <a href="#"><i class="las la-download text-secondary fs-18"></i></a>                                                    
                                                <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                            </td>
                                        </tr><!--end tr-->                                                                                     
                                    </tbody>
                                </table> <!--end table-->                                               
                            </div><!--end /div--> 
                        </div>
                    </div>
                </div><!--end card-body--> 
            </div><!--end card--> 
        </div> <!--end col-->                                                                                                     
    </div><!--end row-->                     
</div><!-- container -->
</x-layouts.admin-app>
