<x-layouts.admin-app>
    @section('PageTitle', 'Company')

    @section('styles')
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
        <link href="{{asset('adminAssets/libs/simple-datatables/style.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('adminAssets/libs/mobius1-selectr/selectr.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('adminAssets/libs/huebee/huebee.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/tom-select@2.4.1/dist/css/tom-select.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.33.0/tagify.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="{{asset('adminAssets/css/toastify.css')}}" rel="stylesheet" type="text/css" />

        <style>
            /* ... your CSS styles ... */
            /* (keep all your <style> content here) */
        </style>
    @endsection

    <div class="container-xxl">
        <x-validation-errors class="alert" alert />
        @include('shared.feedback')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Company Details</h4>
                            </div>
                            <div class="col-auto">
                                <a class="btn btn-primary" href="{{ route('admin.create-company') }}">
                                    <i class="fas fa-plus me-1"></i> Register Company
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 guard-table-section">
                        <div class="table-responsive">
                            <table class="table mb-0 guard-table" id="datatable_1">
                                <thead class="table-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone No.</th>
                                        <th>Country</th>
                                        <th>State/Province</th>
                                        <th>Date Of Est.</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($companies as $key=> $company)
                                    <tr>
                                        <td>{{$company->company_name}}</td>
                                        <td>{{$company->email}}</td>
                                        <td>{{$company->primary_phone_number}}</td>
                                        <td>{{$company->country}}</td>
                                        <td>{{$company->state}}</td>
                                        <td>
                                            @php
                                                $date = Carbon\Carbon::create($company->date_of_establishment);
                                                echo $date->format('l, d F Y');
                                            @endphp
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.show-company', ['company'=> encrypt($company->company_id)]) }}" class="btn btn-sm btn-info" title="View Company Details">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <button 
                                                type="button" 
                                                class="btn btn-sm btn-primary"
                                                title="Assign User"
                                                onclick="document.getElementById('company_name').value = '{{ $company->company_name }}'; document.querySelector('input[name=company_id]').value = '{{ $company->company_id }}';"
                                                data-bs-toggle="modal" 
                                                data-bs-target="#assignUserModal"
                                            >
                                                <i class="fas fa-user-plus"></i>
                                            </button>
                                            <button 
                                                type="button" 
                                                class="btn btn-sm btn-secondary"
                                                title="Show Company on Map"
                                                onclick="triggerLocation('{{ $company->company_id }}', '{{ $company->company_name }}', '{{ $company->longitude }}', '{{ $company->latitude }}');"
                                                data-bs-toggle="modal"
                                            >
                                                <i class="fas fa-map-marker-alt"></i>
                                            </button>
                                            <form
                                                action="{{ route('admin.show-company', ['company'=> encrypt($company->company_id)]) }}"
                                                method="POST"
                                                style="display:inline;"
                                                onsubmit="return confirm('Are you sure you want to delete this company?');"
                                            >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete Company">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @section('modals')
        <!-- Company Map Modal -->
        <div class="modal fade" id="companyMapModal" tabindex="-1" aria-labelledby="companyMapModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="companyMapModalLabel">Company Location</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <p id="mapLocationInfo" class="mb-3">
                    Click on the map to set or update the company's location.
                </p>
                <div id="companyMap" style="height: 400px; width: 100%; border-radius: 8px; overflow: hidden; background: #f5f5f5;"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>
        <!-- End Company Map Modal -->
        <!-- Modal to assign users -->
        <div class="modal fade" id="assignUserModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="assignUserForm" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title">Assign Users to <span id="modalCompanyName"></span></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="company_id" value="">
                            <div class="mb-3">
                                <label for="company_name" class="form-label">Company Name</label>
                                <input type="text" class="form-control" id="company_name" name="company_name" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="user-selector" class="form-label">Users</label>
                                <input name="users" type="text" class="form-control" id="user-selector">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Assign</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Modal -->
        @endsection
    </div>

    @section('scripts')
        <script src="{{asset('adminAssets/libs/mobius1-selectr/selectr.min.js')}}"></script>
        <script src="{{asset('adminAssets/libs/huebee/huebee.pkgd.min.js')}}"></script>
        <script src="{{asset('adminAssets/js/pages/forms-advanced.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.1/dist/js/tom-select.complete.min.js"></script>
        <script src="{{asset('adminAssets/libs/simple-datatables/umd/simple-datatables.js')}}"></script>
        <script src="{{asset('adminAssets/js/pages/datatable.init.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.17.8/tagify.min.js"></script>
        <script type="text/javascript" src="{{asset('adminAssets/js/toastify.js')}}"></script>

        <script>
            var inputElm = document.querySelector('input[name=users]');

            function tagTemplate(tagData) {
                return `
                <tag title="${tagData.email}"
                contenteditable='false'
                spellcheck='false'
                tabIndex="-1"
                class="tagify__tag ${tagData.class ? tagData.class : ""}"
                ${this.getAttributes(tagData)}>
                <x title='' class='tagify__tag__removeBtn' role='button' aria-label='remove tag'></x>
                <div>
                <div class='tagify__tag__avatar-wrap'>
                    <img onerror="this.style.visibility='hidden'" src="${tagData.avatar}">
                </div>
                <span class='tagify__tag-text'>${tagData.name}</span>
                </div>
                </tag>
                `
            }

            function suggestionItemTemplate(tagData) {
                return `
                <div ${this.getAttributes(tagData)}
                class='tagify__dropdown__item ${tagData.class ? tagData.class : ""}'
                tabindex="0"
                role="option">
                <strong>${tagData.name}</strong>
                </div>
                `
            }

            // initialize Tagify on the above input node reference
            var tagify = new Tagify(inputElm, {
                tagTextProp: 'name',
                enforceWhitelist: true,
                maxTags: 1,
                dropdown: {
                    closeOnSelect: true,
                    enabled: 1,
                    classname: 'users-list',
                    searchKeys: ['name', 'email'],
                    position: "text",
                },
                templates: {
                    tag: tagTemplate,
                    dropdownItem: suggestionItemTemplate
                },
                whitelist: []
            });

            // Event listener for input typing
            tagify.on('input', async (e) => {
                const searchTerm = e.detail.value.trim();
                if (searchTerm.length < 2) return;
                tagify.settings.whitelist.length = 0
                tagify.loading(true).dropdown.hide.call(tagify)
                debounceTimer = setTimeout(async () => {
                    try {
                        tagify.loading(true).dropdown.hide()
                        const url = new URL("{{ route('user.details') }}");
                        url.searchParams.append("query", searchTerm);
                        const response = await fetch(url.toString());
                        const users = await response.json();
                        if (!users || !Array.isArray(users.users)) {
                            console.error('Unexpected API response structure:', users);
                            return;
                        }
                        let formattedUsers = users.users.map(user => ({
                            value: user.id,
                            name: `${user.first_name} ${user.last_name}`,
                            avatar: user.profile_photo_path || 'https://via.placeholder.com/80',
                            email: user.email,
                            role: 'user'
                        }));
                        tagify.settings.whitelist = formattedUsers;
                        tagify.loading(false).dropdown.show.call(tagify, searchTerm)
                    } catch (error) {
                        console.error('Error fetching user data:', error);
                        tagify.settings.whitelist = [];
                        tagify.dropdown.show.call('Error fetching data. Try again later.');
                    }
                }, 300);
            });

            // Assign user form submission
            document.querySelector('#assignUserForm').addEventListener('submit', function (e) {
                e.preventDefault();
                const formData = new FormData(this);
                fetch("{{ route('admin.store-assign-users') }}", {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Toastify({
                            text: data.message,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: 'right',
                            backgroundColor: "rgb(239, 68, 68)",
                        }).showToast();
                        setTimeout(() => {
                            location.reload();
                        }, 2000);
                    } else {
                        Toastify({
                            text: data.message,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: 'right',
                            backgroundColor: "rgb(34, 197, 94)",
                        }).showToast();
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        </script>
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
        <script>
            // Keep a reference to the map and marker to avoid re-initializing
            let companyMapInstance = null;
            let companyMapMarker = null;

            function triggerLocation(companyId, companyName, longitude, latitude) {
                // Set modal title
                document.getElementById('companyMapModalLabel').innerText = `Location of ${companyName}`;

                // Show the modal
                var modal = new bootstrap.Modal(document.getElementById('companyMapModal'));
                modal.show();

                // Wait for modal to be fully shown before initializing the map
                setTimeout(function () {
                    // If map already exists, remove it to avoid duplicate maps
                    if (companyMapInstance) {
                        companyMapInstance.remove();
                        companyMapInstance = null;
                    }

                    // Parse coordinates as float
                    let lat = parseFloat(latitude) || 0;
                    let lng = parseFloat(longitude) || 0;

                    // Default to a world view if coordinates are not valid
                    if (!lat && !lng) {
                        lat = 20;
                        lng = 0;
                    }

                    // Initialize the map
                    companyMapInstance = L.map('companyMap').setView([lat, lng], 13);

                    // Add OpenStreetMap tiles
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; OpenStreetMap contributors'
                    }).addTo(companyMapInstance);

                    // Add marker if coordinates are valid
                    if (latitude && longitude) {
                        companyMapMarker = L.marker([lat, lng]).addTo(companyMapInstance)
                            .bindPopup(`
                                <b>${companyName}</b><br>
                                Longitude: ${lng}<br>
                                Latitude: ${lat}<br>
 <a href="{{ route('admin.show-company', ['company'=> encrypt($company->company_id)]) }}" class="btn btn-sm btn-info" title="View Company Details">
                                                <i class="fas fa-eye"></i>
                                            </a>
                            `)
                            .openPopup();
                    }
                }, 300); // Delay to ensure modal and map container are visible
            }

            // Optional: Clear map when modal is closed to avoid memory leaks
            document.getElementById('companyMapModal').addEventListener('hidden.bs.modal', function () {
                if (companyMapInstance) {
                    companyMapInstance.remove();
                    companyMapInstance = null;
                }
            });
        </script>
    @endsection
</x-layouts.admin-app>
