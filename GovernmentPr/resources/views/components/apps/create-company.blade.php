<x-layouts.admin-app>
@section('PageTitle', 'Register Company')
@section('styles')
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
/>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.33.0/tagify.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        .email table {
            font-weight: 600;
        }

        .email table a {
            color: #666;
        }

        .email table tr.read>td {
            background-color: #f6f6f6;
        }

        .email table tr.read>td {
            font-weight: 400;
        }

        .email table tr td>i.fa {
            font-size: 1.2em;
            line-height: 1.5em;
            text-align: center;
        }

        .email table tr td>i.fa-star {
            color: #f39c12;
        }

        .email table tr td>i.fa-bookmark {
            color: #e74c3c;
        }

        .email table tr>td.action {
            padding-left: 0px;
            padding-right: 2px;
        }



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

        .chat-input {
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-color: var(--bs-secondary-bg);
            border: var(--bs-border-width) solid var(--bs-border-color);
            width: auto;
            border-radius: 8px;
        }

        /* Adjust the size of the Quill editor container */
        .ql-container {
            height: 200px;
            /* Set desired height */
        }

        /* Optional: Adjust the editor content size */
        .ql-editor {
            font-size: 14px;
            /* Control text size */
        }

        /* .chat-input textarea {
        flex: 1;
        border: none;
        outline: none;
        resize: none;
        padding: 10px;
        font-size: 16px;
        border-radius: 10px;
    } */
        .chat-icons {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 2px 0px;
        }

        .chat-icons a {
            color: var(--bs-label-color);
            font-size: 20px;
            margin-left: 12px;
        }

        .chat-icons a:hover {
            color: #22c55e
        }

        input[type="file"] {
            display: none;
        }

        #captured-photos,
        .file-preview {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
            max-width: 600px;
        }

        .photo-item,
        .file-item {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 5px 10px;
            margin-bottom: 5px;
            background: var(--bs-card-bg);
            border-radius: 5px;
            border: 1px solid var(--bs-border-color);
        }

        .photo-item img {
            max-width: 100px;
            border-radius: 5px;
        }

        .remove-btn {
            cursor: pointer;
            color: red;
            font-weight: bold;
            margin-left: 10px;
        }
    </style>
@endsection
<div class="container-xxl">
<x-validation-errors class="alert" />
@include('shared.feedback')


<form action="{{route('admin.store-company')}}" method="post">
        @csrf
    <!-- Basic Profile -->
    <x-form-section submit="">
        <x-slot name="title">
            {{ __('Company\'s Profile') }}
        </x-slot>
        <x-slot name="description">
            {{ __('Update your company\'s profile information.') }}
        </x-slot>
        <x-slot name="form">
        <div class="row">
            <div class="col-md-12">
                <input type="text" class="form-control" placeholder="Company name" name="company_name">
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="">Industry</label>
                    <select name="industry" id="industry" class="form-select">
                        <option value="" selected disabled> Choose... </option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 mt-2">
            <div class="form-group">
                    <label for="">Industrial Process Used</label>
                    <select name="" id="industry-process" name="industry_process_used" class="form-select">
                        <option value="" selected disabled> Choose... </option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" placeholder="Example: company@domain.com" name="email">
                </div>
            </div>

            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="">Website Address</label>
                    <input type="url" class="form-control" placeholder="" name="website_address">
                </div>
            </div>

            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="">Primary Phone Number</label>
                    <input id="mobile_code_primary" type="tel" class="form-control" placeholder="">
                    <input type="hidden" name="primary_phone_number">
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="">Secondary Phone Number</label>
                    <input id="mobile_code_secondary" type="tel" class="form-control" placeholder="" >
                    <input type="hidden" name="secondary_phone_number">
                </div>
            </div>

            <div class="col-md-4 mt-2">
                <div class="form-group">
                    <label for="">Number Of Employees.</label>
                    <input type="number" class="form-control" placeholder="" name="number_of_employees">
                </div>
            </div>

            <div class="col-md-4 mt-2">
                <label for="">Date of Establishment</label>
                <input class="form-control" type="date" id="" name="date_of_establishment">
            </div>
        </div>
        </x-slot>
    </x-form-section>
<!-- End Basic Profile -->
<x-section-border />
<!-- Location Details -->
<x-form-section>
    <x-slot name="title">
        {{ __('Company\'s Location') }}
    </x-slot>
    <x-slot name="description">
        {{ __('Update your company\'s address information.') }}
    </x-slot>
    <x-slot name="form">
        <div class="row">
            <div class="col-md-4 mt-2">
                <div class="form-group">
                    <label for="">Country</label>
                    <select name="country" id="" class="form-select countries" id="countryId">
                        <option value="" selected disabled> Choose... </option>
                    </select>
                </div>
            </div>

            <div class="col-md-4 mt-2">
                <div class="form-group">
                    <label for="">State</label>
                    <select id="" class="form-select states" onchange="toggleLGA(this);" id="stateId" name="state">
                        <option value="" selected disabled> Choose... </option>
                    </select>
                </div>
            </div>

            <div class="col-md-4 mt-2">
                <div class="form-group">
                    <label for="">City</label>
                    <select id="lga" class="form-select select-lga cities" id="cityId" name="city">
                        <option value="" selected disabled> Choose... </option>
                    </select>
                </div>
            </div>

            <div class="col-md-12 mt-2">
                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" class="form-control" placeholder="" name="address">
                </div>
            </div>

            <div class="col-md-12 mt-2">
                <label>Geographic Information System(GIS) Location</label>
            </div>
            <div class="col-md-4 mt-2">
                 <div class="form-group">
                 <label for="">ZIP code</label>
                    <input type="text" class="form-control" placeholder="" name="zip_code">
                </div>
            </div>

            <div class="col-md-4 mt-2">
                 <div class="form-group">
                 <label for="">Longitude</label>
                    <input type="text" class="form-control" placeholder="" name="longitude">
                </div>
            </div>

            <div class="col-md-4 mt-2">
                 <div class="form-group">
                 <label for="">Latitude</label>
                    <input type="text" class="form-control" placeholder="" name="latitude">
                </div>
            </div>

            <div class="col-md-4 mt-2">
                 <div class="form-group">
                 <label for="">Military Grid Reference System (MGRS) coordinate</label>
                    <input type="text" class="form-control" placeholder="" name="mgrs">
                </div>
            </div>
        </div>
    </x-slot>
    
</x-form-section>
<!-- End Location Details -->
<x-section-border />
<x-form-section>
    <x-slot name="title">
        {{ __('Company\'s Policy, Objectives and Target') }}
    </x-slot>
    <x-slot name="description">
        {{ __('For effective management and performance, the company\'s policy should deliver economic, human, and environmental health gains.') }}
    </x-slot>
    <x-slot name="form">
        <div class="row">
            <h5>Organization Policy</h5>
            <p>Select the area(s) your company policy imply.</p>
            @foreach($policies as $key => $policy)
                <div class="col-md-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="policy_{{ $policy->policy_id }}" value="{{ $policy->policy_id }}" name="policy[]">
                        <label class="form-check-label" for="policy_{{ $policy->policy_id }}">{{ $policy->title }}</label>
                    </div>
                </div>
            @endforeach
            
            <h5 class="mt-4">Organization Objective</h5>
            <p>Select the area(s) your company objective imply.</p>
            @foreach($objectives as $objective)
                <div class="col-md-4 mt-2">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheck_{{ $objective->objective_id }}" value="{{ $objective->objective_id }}" name="objective[]">
                        <label class="form-check-label" for="flexSwitchCheck_{{ $objective->objective_id }}">{{ $objective->name }}</label>
                    </div>
                </div>
            @endforeach
        </div>
    </x-slot>
</x-form-section>
<x-section-border />
<x-form-section>
    <x-slot name="title">
        {{ __('Additional Informations') }}
    </x-slot>
    <x-slot name="description">
        {{ __('') }}
    </x-slot>
    <x-slot name="form">
        <div class="row">
            <div class="col-md-12">
            <div class="form-group">
                <label for="user-selector">Environmental Operations Manager</label>
                <input name="enviromental_operations_manager" type="text" class="form-control" id="user-selector">
            </div>
            </div>
            <div class="col-md-6 mt-2">
            <div class="form-group">
                <label for="contact_person_name">Full Name of Contact Person</label>
                <input type="text" class="form-control" id="contact_person_name" placeholder="Full Name of Contact Person" name="contact_person_name">
            </div>
            </div>
            <div class="col-md-6 mt-2">
            <div class="form-group">
                <label for="contact_person_position">Office Position of Contact Person</label>
                <input type="text" class="form-control" id="contact_person_position" placeholder="Office Position of Contact Person" name="contact_person_position">
            </div>
            </div>
            <div class="col-md-6 mt-2">
            <div class="form-group">
                <label for="mobile_code_contact">Contact Personnel Phone Number</label>
                <input id="mobile_code_contact" type="tel" class="form-control" placeholder="">
                <input type="hidden" name="contact_person_phone_number">
            </div>
            </div>
            <div class="col-md-12 mt-4">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckReverse" name="is_sharable" value="active">
                <label class="form-check-label" for="flexSwitchCheckReverse">Do you wish for your information to be shared with other companies?</label>
            </div>
            </div>
        </div>
    </x-slot>
</x-form-section>

<div class="row justify-content-end">
    <div class="col-md-3 py-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</form>
</div>

@section('scripts')
<script src="{{ asset('adminAssets/js/location.js') }}"></script>
<script src="{{ asset('adminAssets/js/industry.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"></script>
<script>
    // -----Country Code Selection
    let tel_primary = document.querySelector('#mobile_code_primary')
    let tel_secondary = document.querySelector('#mobile_code_secondary')
    let tel_contact = document.querySelector('#mobile_code_contact')
    let primary = window.intlTelInput(tel_primary, {
    	initialCountry: "ng",
    	separateDialCode: true,
    	utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"
    });
    let secondary = window.intlTelInput(tel_secondary, {
    	initialCountry: "ng",
    	separateDialCode: true,
    	utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"
    });
    let contact = window.intlTelInput(tel_contact, {
    	initialCountry: "ng",
    	separateDialCode: true,
    	utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"
    });

    tel_primary.addEventListener("blur", function () {
        const fullPhoneNumber = primary.getNumber(); // Gets the full number in E.164 format
        console.log("Full phone number:", fullPhoneNumber);
        document.querySelector('input[name="primary_phone_number"]').value = fullPhoneNumber
    });

    tel_secondary.addEventListener("blur", function () {
        const fullPhoneNumber = secondary.getNumber(); // Gets the full number in E.164 format
        console.log("Full phone number:", fullPhoneNumber);
        document.querySelector('input[name="secondary_phone_number"]').value = fullPhoneNumber
    });

    tel_contact.addEventListener("blur", function () {
        const fullPhoneNumber = contact.getNumber(); // Gets the full number in E.164 format
        console.log("Full phone number:", fullPhoneNumber);
        document.querySelector('input[name="contact_person_phone_number"]').value = fullPhoneNumber
    });

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.17.8/tagify.min.js"></script>
    <script>
        var inputElm = document.querySelector('input[name=enviromental_operations_manager]');

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
                    <img onerror="this.style.visibility='hidden'" src="${tagData.avatar ? tagData.avatar : 'https://ui-avatars.com/api/?name=' + encodeURIComponent(tagData.name)}" alt="avatar">
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
            role="option" style="display: flex; align-items: center; gap: 10px;">
                <div class='tagify__dropdown__item__avatar-wrap' style="width:32px;height:32px;border-radius:50%;overflow:hidden;background:#EEE;">
                    <img onerror="this.style.visibility='hidden'" src="${tagData.avatar ? tagData.avatar : 'https://ui-avatars.com/api/?name=' + encodeURIComponent(tagData.name)}" style="width:100%;height:100%;object-fit:cover;" alt="avatar">
                </div>
                <div style="display:flex;flex-direction:column;">
                    <strong>${tagData.name}</strong>
                    <span style="font-size:0.9em;opacity:0.7;">${tagData.email}</span>
                </div>
            </div>
            `
        }

        // initialize Tagify on the above input node reference
        var tagify = new Tagify(inputElm, {
            tagTextProp: 'name', // very important since a custom template is used with this property as text
            enforceWhitelist: true,
            maxTags: 1, // Allow only single selection
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
                        avatar: user.profile_photo_path ? user.profile_photo_path : 'https://ui-avatars.com/api/?name=' + encodeURIComponent(user.first_name + ' ' + user.last_name),
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
    <script src="{{asset('adminAssets/js/popper.min.js')}}"></script>
    <script src="{{asset('adminAssets/js/bootstrap.min.js')}}"></script>
   
   
@endsection
</x-layouts.admin-app>