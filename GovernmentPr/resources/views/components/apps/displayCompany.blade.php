<x-layouts.admin-app>
    @section('PageTitle', 'Company')
    @section('styles')
    <link href="{{asset('adminAssets/libs/simple-datatables/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('adminAssets/libs/mobius1-selectr/selectr.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('adminAssets/libs/huebee/huebee.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.4.1/dist/css/tom-select.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.33.0/tagify.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset('adminAssets/css/toastify.css')}}" rel="stylesheet" type="text/css" />

    <style>

        .tagify {
            width: 100%;
            max-width: 700px;
            background: rgba(white, .8);
        }

        :root {
            --tagify-dd-item-pad: .5em .7em;
        }

        .tagify__dropdown.users-list .tagify__dropdown__item {
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 0 1em;
            grid-template-areas: "avatar name"
                "avatar email";
        }

        .tagify__dropdown.users-list header.tagify__dropdown__item {
            grid-template-areas: "add remove-tags"
                "remaning .";
        }

        .tagify__dropdown.users-list .tagify__dropdown__item:hover .tagify__dropdown__item__avatar-wrap {
            transform: scale(1.2);
        }

        .tagify__dropdown.users-list .tagify__dropdown__item__avatar-wrap {
            grid-area: avatar;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            overflow: hidden;
            background: #EEE;
            transition: .1s ease-out;
        }

        .tagify__dropdown.users-list img {
            width: 100%;
            vertical-align: top;
        }

        .tagify__dropdown.users-list header.tagify__dropdown__item>div,
        .tagify__dropdown.users-list .tagify__dropdown__item strong {
            grid-area: name;
            width: 100%;
            align-self: center;
        }

        .tagify__dropdown.users-list span {
            grid-area: email;
            width: 100%;
            font-size: .9em;
            opacity: .6;
        }

        .tagify__dropdown.users-list .tagify__dropdown__item__addAll {
            border-bottom: 1px solid #DDD;
            gap: 0;
        }

        .tagify__dropdown.users-list .remove-all-tags {
            grid-area: remove-tags;
            justify-self: self-end;
            font-size: .8em;
            padding: .2em .3em;
            border-radius: 3px;
            user-select: none;
users: selectedUsers,
        }

        .tagify__dropdown.users-list .remove-all-tags:hover {
            color: white;
            background: salmon;
        }


        /* Tags items */
        .tagify__tag {
            white-space: nowrap;
        }

        .tagify__tag img {
            width: 100%;
            vertical-align: top;
            pointer-events: none;
        }


        .tagify__tag:hover .tagify__tag__avatar-wrap {
            transform: scale(1.6) translateX(-10%);
        }

        .tagify__tag .tagify__tag__avatar-wrap {
            width: 16px;
            height: 16px;
            white-space: normal;
            border-radius: 50%;
            background: silver;
            margin-right: 5px;
            transition: .12s ease-out;
        }

        .users-list .tagify__dropdown__itemsGroup:empty {
            display: none;
        }

        .users-list .tagify__dropdown__itemsGroup::before {
            content: attr(data-title);
            display: inline-block;
            font-size: .9em;
            padding: 4px 6px;
            margin: var(--tagify-dd-item-pad);
            font-style: italic;
            border-radius: 4px;
            background: #00ce8d;
            color: white;
            font-weight: 600;
        }

        .users-list .tagify__dropdown__itemsGroup:not(:first-of-type) {
            border-top: 1px solid #DDD;
        }

    </style>
    @endsection
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
            tagTextProp: 'name', // very important since a custom template is used with this property as text
            enforceWhitelist: true,
            maxTags: 1, // Alacw only single selection
            dropdown: {
            closeOnSelect: true, // Close dropdown after selection
            enabled: 1, // Show suggestions after typing one character
            classname: 'users-list',
            searchKeys: ['name', 'email'],  // very important to set by which keys to search for suggestions when typing
            position: "text", // Position suggestions relative to the cursor
            },
            templates: {
            tag: tagTemplate,
            dropdownItem: suggestionItemTemplate
            },
            whitelist: []
        });

        // Event listener for input typing
        tagify.on('input', async (e) => {
            const searchTerm = e.detail.value.trim(); // Get the input value
            if (searchTerm.length < 2) return; // Wait for at least 2 characters before fetching
            tagify.settings.whitelist.length = 0
            tagify.loading(true).dropdown.hide.call(tagify)
            debounceTimer = setTimeout(async () => {
            try {
            tagify.loading(true).dropdown.hide()
            // Fetch suggestions from the API
            const url = new URL("{{ route('user.details') }}");
            url.searchParams.append("query", searchTerm);
            console.log(url.toString());

            const response = await fetch(url.toString());
            const users = await response.json();
            console.log(users);

            if (!users || !Array.isArray(users.users)) {
            console.error('Unexpected API response structure:', users);
            return;
            }
            // Format the data to match Tagify's whitelist structure
            let formattedUsers = users.users.map(user => ({
            value: user.id,
            name: `${user.first_name} ${user.last_name}`,
            avatar: user.profile_photo_path || 'https://via.placeholder.com/80',
            email: user.email,
            role: 'user'
            }));

            // Update Tagify's whitelist and show the dropdown
            tagify.settings.whitelist = formattedUsers;
            tagify.loading(false).dropdown.show.call(tagify, searchTerm)
            } catch (error) {
            console.error('Error fetching user data:', error);
            tagify.settings.whitelist = [];
            tagify.dropdown.show.call('Error fetching data. Try again later.');
            }
            }, 300); // Delay of 300ms
        });
        


    </script>
    <!-- store users -->
    <script>
    document.querySelector('#assignUserForm').addEventListener('submit', function (e) {
         e.preventDefault(); // Prevent the default form submission

         const formData = new FormData(this); // Create a FormData object from the form

         fetch("{{ route('admin.store-assign-users') }}", {
          method: 'POST',
          body: formData,
          headers: {
              'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token for security
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
    <!-- end assign users -->
    @endSection
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
                            </div><!--end col-->
                            <div class="col-auto">
                                <a class="btn btn-primary" href="{{ route('admin.create-company') }}"><i
                                        class="fas fa-plus me-1"></i> Register Company </a>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end card-header-->
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
            </div> <!-- end col -->
        </div> <!-- end row -->
        <!-- modalmodal to assign users -->
        <!-- Modal -->
       <!-- Modal -->
<div class="modal fade" id="assignUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="assignUserForm" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Assign Users to <span id="modalCompanyName"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                <input type="hidden" name="company_id" value="{{ $company->company_id }}">

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

    <!-- end modal -->
    </div><!-- container -->
</x-layouts.admin-app>