<x-layouts.admin-app>
@section('PageTitle', 'Media Library')
@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="{{asset('adminAssets/libs/uppy/uppy.min.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .modal-backdrop {
            z-index: 1050 !important;
        }
        #mediaCategoryModal {
            z-index: 1055 !important;
        }
        #iconPickerModal {
            z-index: 1060 !important;
        }
    </style>

@endsection
@section('scripts')
    <script src="{{asset('adminAssets/libs/uppy/uppy.legacy.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <!-- Uppy File Upload -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const uploadSection = document.getElementById("upload-section");
            const cancelUpload = document.getElementById("cancelUpload");
            const fileUploadInput = document.getElementById("file_upload");
            const uploadTitle = document.getElementById("uploadTitle");
            const uploadDesc = document.getElementById("uploadDesc");
            const uploadTargetLabel = document.getElementById("uploadTargetLabel");
            const uploadCategory = document.getElementById("uploadCategory");

            // Upload endpoints for each storage type
            const uploadEndpoints = {
                server: "{{ route('admin.media.uploadServer') }}",
                dropbox: "{{ route('admin.media.uploadDropbox') }}",
                google: "{{ route('admin.media.uploadGoogle') }}",
                onedrive: "{{ route('admin.media.uploadOneDrive') }}"
            };

            // Friendly labels for each endpoint
            const endpointLabels = {
                server: "Server Storage",
                dropbox: "Dropbox Cloud",
                google: "Google Drive",
                onedrive: "OneDrive"
            };

            // Track upload meta data
            let uploadMeta = {
                upload_type: "",
                category_id: ""
            };

            // Uppy instance
            let uppy = new Uppy.Uppy({
                restrictions: {
                    maxFileSize: 5 * 1024 * 1024 * 1024, // 5 GB
                    maxNumberOfFiles: 200,
                    allowedFileTypes: ['image/*', 'video/*', 'audio/*', 'application/pdf', 'application/zip']
                },
                autoProceed: false // Wait until user clicks upload
            });

            // Uppy Dashboard
            uppy.use(Uppy.Dashboard, {
                inline: true,
                target: '#uppyDashboard',
                showProgressDetails: true,
                proudlyDisplayPoweredByUppy: false,
                height: 300
            });

            // XHR Upload plugin
            let uploadPlugin = uppy.use(Uppy.XHRUpload, {
                endpoint: uploadEndpoints.server, // default endpoint
                fieldName: 'files[]',
                formData: true,
                headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}" },
                bundle: true
            });

            // Handle upload button clicks
            document.querySelectorAll(".upload-trigger").forEach(item => {
                item.addEventListener("click", function (e) {
                    e.preventDefault();
                    const type = this.getAttribute("data-type");

                    // Update UI text
                    uploadTitle.innerText = `Upload to ${type.charAt(0).toUpperCase() + type.slice(1)}`;
                    uploadDesc.innerText = `Drag & drop or click below to upload files to ${type}.`;
                    uploadTargetLabel.innerText = endpointLabels[type];

                    // Store selected type
                    uploadMeta.upload_type = type;
                    uploadMeta.category_id = uploadCategory.value || "";

                    // Apply meta
                    uppy.setMeta(uploadMeta);

                    // Change upload endpoint dynamically
                    uploadPlugin.setOptions({
                        endpoint: uploadEndpoints[type]
                    });

                    // Show upload section
                    uploadSection.classList.remove("d-none");
                });
            });

            // Update meta when category changes
            uploadCategory.addEventListener("change", function () {
                uploadMeta.category_id = this.value;
                uppy.setMeta(uploadMeta);
            });

            // Ensure meta is always updated before upload starts
            uppy.on('upload', () => {
                uppy.setMeta({
                    upload_type: uploadMeta.upload_type,
                    category_id: uploadMeta.category_id
                });
            });

            // Handle successful uploads (multiple uploads allowed)
            uppy.on('complete', (result) => {
                console.log('Uploaded files:', result.successful);
                fileUploadInput.value = JSON.stringify(result.successful.map(f => f.response.body));
                // Keep dashboard open for multiple uploads, don't reset automatically
            });

            // Handle errors
            uppy.on('error', (error) => {
                console.error('General error:', error);
            });
            uppy.on('upload-error', (file, error, response) => {
                console.error(`Error uploading ${file.name}:`, error);
            });

            // Cancel button resets dashboard manually
            cancelUpload.addEventListener("click", () => {
                uppy.reset(); // Clear files manually
                uploadSection.classList.add("d-none");
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
                
                if (data.success==true) {
                    addCategoryToUI(data.category);
                    this.reset();
                }
                if (data.success == false) {
                    if (data.errors) {
                        let errorMessages = [];
                        if (typeof data.errors === 'object') {
                            for (const key in data.errors) {
                                if (Array.isArray(data.errors[key])) {
                                    errorMessages.push(...data.errors[key]);
                                } else {
                                    errorMessages.push(data.errors[key]);
                                }
                            }
                        } else if (Array.isArray(data.errors)) {
                            errorMessages = data.errors;
                        } else {
                            errorMessages = [data.errors];
                        }
                        Toastify({
                            text: errorMessages.join('\n'),
                            duration: 4000,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#dc3545"
                        }).showToast();
                    } else if (data.message) {
                        Toastify({
                            text: data.message,
                            duration: 4000,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#dc3545"
                        }).showToast();
                    }
                    
                }
            });
        });

        // Delete Category
        document.addEventListener('click', function(e) {
            if (e.target.closest('.delete-category')) {
                let id = e.target.closest('.delete-category').dataset.id;
                console.log(id);
                
                fetch(`/admin/media/categories/${id}`, {
                    method: "DELETE",
                    headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}" }
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
            // Tabs
            let tab = document.createElement('li');
            tab.className = 'nav-item';
            tab.id = `tab-${category.category_id}`;
            tab.innerHTML = `<a class="nav-link fw-semibold py-2" data-bs-toggle="tab" href="#category-${category.category_id}" role="tab" aria-selected="false">
                                <i class="${category.icon || 'fa-regular fa-folder'} me-1"></i> ${category.name}
                                <span class="badge rounded text-blue bg-blue-subtle ms-1">0</span>
                            </a>`;
            document.getElementById('categoryTabs').appendChild(tab);

            // Dropdown
            let option = document.createElement('option');
            option.value = category.category_id;
            option.textContent = category.name;
            document.getElementById('uploadCategory').appendChild(option);

            // Modal list
            let li = document.createElement('li');
            li.classList.add('list-group-item','d-flex','justify-content-between','align-items-center');
            li.innerHTML = `<span><i class="${category.icon || 'fa-regular fa-folder'} me-1"></i> ${category.name}</span>
                            <button class="btn btn-sm btn-danger delete-category" data-id="${category.category_id}">
                                <i class="fa fa-trash"></i>
                            </button>`;
            document.getElementById('categoryList').appendChild(li);
        }

    </script>
    <script>
        const iconList = [
            "fa-regular fa-folder-open", "fa-regular fa-image", "fa-regular fa-file",
            "fa-solid fa-music", "fa-solid fa-headphones", "fa-solid fa-video", "fa-regular fa-file-pdf",
            "fa-regular fa-file-word", "fa-regular fa-file-excel", "fa-solid fa-database"
        ];

        // Populate icon modal
        document.getElementById('openIconPicker').addEventListener('click', function() {
            let container = document.getElementById('iconList');
            container.innerHTML = '';
            iconList.forEach(icon => {
                let div = document.createElement('div');
                div.className = 'col-2 text-center mb-3';
                div.innerHTML = `<i class="${icon} fs-3 p-2 border rounded icon-choice" data-icon="${icon}" style="cursor:pointer"></i>`;
                container.appendChild(div);
            });
            new bootstrap.Modal(document.getElementById('iconPickerModal')).show();
        });

        // Select icon
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('icon-choice')) {
                let icon = e.target.dataset.icon;
                document.getElementById('iconInput').value = icon;
                bootstrap.Modal.getInstance(document.getElementById('iconPickerModal')).hide();
            }
        });

    </script>
@endsection
@section('modals')
<!-- icon modal -->
<div class="modal fade" id="iconPickerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content" style="z-index: 1060;">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title">Select Icon</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row" id="iconList"></div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="mediaCategoryModal" tabindex="-1" aria-labelledby="mediaCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content shadow-lg" style="z-index: 1055;">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="mediaCategoryModalLabel">Manage Media Categories</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body d-flex">
                <!-- Left: Add Category Form -->
                <div class="col-md-5 border-end pe-3">
                    <h6>Add New Category</h6>
                    <form id="addCategoryForm">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="e.g., Images, Documents" required>
                        </div>

                        <!-- Icon Picker Field -->
                        <div class="mb-3">
                            <label class="form-label">Icon</label>
                            <div class="input-group">
                                <input type="text" name="icon" id="iconInput" class="form-control" placeholder="e.g., fa-regular fa-folder" readonly>
                                <button class="btn btn-outline-secondary" type="button" id="openIconPicker">
                                    <i class="fa fa-icons"></i>
                                </button>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Add Category</button>
                    </form>
                </div>

                <!-- Right: Existing Categories -->
                <div class="col-md-7 ps-3">
                    <h6>Existing Categories</h6>
                    <ul class="list-group" id="categoryList">
                        @foreach($categories as $category)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="{{ $category->icon ?? 'fa-regular fa-folder' }} me-1"></i> {{ $category->name }}</span>
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
        @foreach($storages as $storage)
            <div class="col-md-6 col-lg-3 mb-3">
                <div class="card">
                    <div class="card-body">
                        <!-- Dropdown -->
                        <div class="dropdown float-end">
                            <a href="#" class="text-muted fs-16 dropdown-toggle p-1" data-bs-toggle="dropdown">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">View Detail</a>
                                <a class="dropdown-item" href="#">Clear All</a>
                                <a class="dropdown-item" href="#">Delete</a>
                            </div>
                        </div>

                        <!-- Icon -->
                        <img src="{{ asset($storage['icon']) }}" class="me-2 align-self-center thumb-xl" alt="{{ $storage['name'] }}">

                        <!-- Title -->
                        <h5 class="fw-semibold mt-3 fs-14">{{ $storage['name'] }}</h5>

                        <!-- Files and Capacity -->
                        <div class="d-flex justify-content-between my-2">
                            <p class="text-muted mb-0 fs-13 fw-semibold"><span class="text-dark">{{ $storage['files'] }}</span> Files</p>
                            <p class="text-muted mb-0 fs-13 fw-semibold"><span class="text-dark">{{ $storage['capacity'] }}</span> GB</p>
                        </div>

                        <!-- Progress Bar -->
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 text-truncate">
                                <div class="d-flex align-items-center">
                                    <div class="progress bg-secondary-subtle w-100" style="height:5px;">
                                        <div class="progress-bar bg-secondary" style="width: {{ number_format($storage['percentage'], 0) }}%"></div>
                                    </div>
                                    <small class="flex-shrink-1 ms-1">{{ number_format($storage['percentage'], 0) }}%</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

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
                    <option value="" selected disabled>Select Category</option>
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
                    @foreach($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link fw-semibold py-2 {{ $loop->first ? 'active' : '' }}" 
                            data-bs-toggle="tab" 
                            href="#category-{{ $category->category_id }}" 
                            role="tab">
                            <i class="fa-regular fa-folder-open me-1"></i> 
                            {{ $category->name }}
                            <span class="badge rounded text-blue bg-blue-subtle ms-1">{{ $category->media->count() }}</span>
                            </a>
                        </li>
                    @endforeach
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
                        @foreach($categories as $category)
                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="category-{{ $category->category_id }}">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Name</th>
                                                <th class="text-end">Last Modified</th>
                                                <th class="text-end">Size</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($category->media as $file)
                                                <tr>
                                                    <td>
                                                        <div class="d-inline-flex justify-content-center align-items-center thumb-md bg-blue-subtle rounded mx-auto me-1">
                                                            <i class="fa-solid fa-file-{{ $file->type ?? 'pdf' }} fs-18 align-self-center mb-0 text-blue"></i>
                                                        </div>
                                                        <a href="{{ Storage::url($file->path) }}" target="_blank" class="text-body">{{ $file->original_name }}</a>
                                                    </td>
                                                    <td class="text-end">{{ $file->updated_at->format('d M Y') }}</td>
                                                    <td class="text-end">
                                                        {{ formatFileSize($file->size) }}
                                                    </td>
                                                    <td class="text-end">
                                                        <a href="{{ Storage::url($file->path) }}"><i class="las la-download text-secondary fs-18"></i></a>
                                                        <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                                        <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center text-muted">No files in this category.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div><!--end card-body--> 
            </div><!--end card--> 
        </div> <!--end col-->                                                                                                     
    </div><!--end row-->                     
</div><!-- container -->
</x-layouts.admin-app>
