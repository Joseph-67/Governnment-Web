<x-layouts.admin-app>
    @section('PageTitle', 'Company Profile')

    @section('styles')
    
    <link href="{{asset('adminAssets/libs/simple-datatables/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('adminAssets/css/toastify.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.33.0/tagify.min.css">
    <link href="{{asset('adminAssets/libs/huebee/huebee.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('adminAssets/libs/vanillajs-datepicker/css/datepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('adminAssets/libs/mobius1-selectr/selectr.min.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .tag-input {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            /* border: 1px solid #ccc; */
            padding: 5px;
            /* border-radius: 8px; */
            cursor: text;
            position: relative;
        }

        .tag-input input {
            border: none;
            outline: none;
            flex: 1;
            min-width: 100px;
        }

        .tag {
            display: flex;
            align-items: center;
            background-color: #e0e7ff;
            color: #1d4ed8;
            border-radius: 16px;
            padding: 5px 10px;
            margin: 5px;
            font-size: 14px;
        }

        .tag span {
            margin-left: 5px;
            cursor: pointer;
        }

        .tag span:hover {
            color: #dc2626;
        }

        .suggestions {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            /* border: 1px solid #ccc; */
            border-radius: 4px;
            max-height: 150px;
            overflow-y: auto;
            z-index: 10;
        }

        .TagSuggestion {
            padding: 5px;
            border: 1px solid #ccc;
            cursor: pointer;
        }
        .TagSuggestion:hover {
            background-color: #f0f0f0;
        }

        .suggestion {
            padding: 8px 10px;
            cursor: pointer;
        }

        .suggestion img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
        }

        .suggestion:hover {
            background-color: #f3f4f6;
        }

        /* Profile card */
        .profile-card {
        width: 250px;
        border: 1px solid #ccc;
        border-radius: 12px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        text-align: center;
        }

        .profile-card img {
        width: 100%;
        height: 150px;
        object-fit: cover;
        }

        .profile-card .profile-info {
        padding: 15px;
        }

        .profile-card .profile-info h2 {
        margin: 10px 0 5px;
        font-size: 18px;
        }

        .profile-card .profile-info p {
        margin: 0;
        color: #666;
        font-size: 14px;
        }
        /* Profile card */
        .taggable-container {
            flex: 1;
            max-width: 400px;
        }

        .supervisor-tag-input {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            /* border: 1px solid #ccc; */
            /* padding: 5px; */
            border-radius: 8px;
            cursor: text;
            position: relative;
            /* background-color: #fff; */
        }

        .supervisor-tag-input input {
            /* border: none;
            outline: none; */
            flex: 1;
            min-width: 100px;
        }

        .manager-tag-input {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            /* border: 1px solid #ccc; */
            /* padding: 5px; */
            border-radius: 8px;
            cursor: text;
            position: relative;
            /* background-color: #fff; */
        }

        .manager-tag-input input {
            /* border: none;
            outline: none; */
            flex: 1;
            min-width: 100px;
        }
    </style>
    <style>
        /* Tag Input Wrapper */
        .tag-inline-container {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            /* gap: 4px;
            padding: 4px 8px; */
            background: #fff;
            border-radius: 0.375rem;
            border: 1px solid #ced4da;
            /* min-height: 38px; */
            position: relative;
            transition: box-shadow 0.2s, border-color 0.2s;
        }
        .tag-inline-container:focus-within {
            box-shadow: 0 0 0 0.2rem rgba(13,110,253,.25);
            border-color: #86b7fe;
        }

        /* Tag Styling */
        .task-tag {
            display: inline-flex;
            align-items: center;
            background: #0d6efd;
            color: #fff;
            padding: 4px 12px 4px 10px;
            border-radius: 1rem;
            font-size: 14px;
            margin: 2px 2px 2px 0;
            box-shadow: 0 1px 2px rgba(13,110,253,0.08);
            font-weight: 500;
            cursor: default;
            transition: background 0.2s, box-shadow 0.2s, transform 0.1s;
        }
        .task-tag:hover {
            background: #0b5ed7;
            box-shadow: 0 2px 6px rgba(13,110,253,0.12);
            transform: translateY(-1px) scale(1.04);
        }
        .task-tag span {
            margin-left: 8px;
            cursor: pointer;
            font-weight: bold;
            color: #fff;
            opacity: 0.7;
            transition: opacity 0.15s;
        }
        .task-tag span:hover {
            opacity: 1;
            color: #f87171;
        }

        /* Input Styling */
        #task-tag-input {
            flex-grow: 1;
            min-width: 120px;
            padding: 6px 10px;
            border: none;
            outline: none;
            font-size: 15px;
            background: transparent;
            color: #212529;
            margin: 2px 0;
        }
        #task-tag-input::placeholder {
            color: #adb5bd;
            opacity: 1;
        }

        /* Suggestions Dropdown */
        #task-suggestions {
            margin-top: 4px;
            background: #fff;
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
            box-shadow: 0 4px 16px rgba(13,110,253,0.10);
            max-height: 220px;
            overflow-y: auto;
            z-index: 20;
            position: absolute;
            /* left: 0;
            right: 0;
            min-width: 180px; */
        }

        .task-suggestion {
            padding: 8px 16px;
            cursor: pointer;
            border-bottom: 1px solid #f3f4f6;
            font-size: 15px;
            color: #212529;
            background: transparent;
            transition: background 0.18s, color 0.18s;
        }
        .task-suggestion:last-child {
            border-bottom: none;
        }
        .task-suggestion:hover,
        .task-suggestion.active {
            background: #0d6efd;
            color: #fff;
        }

        /* Scrollbar Styling */
        #task-suggestions::-webkit-scrollbar {
            width: 8px;
        }
        #task-suggestions::-webkit-scrollbar-thumb {
            background: #0d6efd;
            border-radius: 10px;
        }
        #task-suggestions::-webkit-scrollbar-thumb:hover {
            background: #0b5ed7;
        }
    </style>
    <style>
        /* Tag Input Wrapper */
        .tag-inline-container {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            /* gap: 4px;
            padding: 4px 8px; */
            background: #fff;
            border-radius: 0.375rem;
            border: 1px solid #ced4da;
            /* min-height: 38px; */
            position: relative;
            transition: box-shadow 0.2s, border-color 0.2s;
        }
        .tag-inline-container:focus-within {
            box-shadow: 0 0 0 0.2rem rgba(13,110,253,.25);
            border-color: #86b7fe;
        }

        /* Tag Styling */
        .task-tag {
            display: inline-flex;
            align-items: center;
            background: #0d6efd;
            color: #fff;
            padding: 4px 12px 4px 10px;
            border-radius: 1rem;
            font-size: 14px;
            margin: 2px 2px 2px 0;
            box-shadow: 0 1px 2px rgba(13,110,253,0.08);
            font-weight: 500;
            cursor: default;
            transition: background 0.2s, box-shadow 0.2s, transform 0.1s;
        }
        .task-tag:hover {
            background: #0b5ed7;
            box-shadow: 0 2px 6px rgba(13,110,253,0.12);
            transform: translateY(-1px) scale(1.04);
        }
        .task-tag span {
            margin-left: 8px;
            cursor: pointer;
            font-weight: bold;
            color: #fff;
            opacity: 0.7;
            transition: opacity 0.15s;
        }
        .task-tag span:hover {
            opacity: 1;
            color: #f87171;
        }

        /* Input Styling */
        #task-tag-input {
            flex-grow: 1;
            min-width: 120px;
            padding: 6px 10px;
            border: none;
            outline: none;
            font-size: 15px;
            background: transparent;
            color: #212529;
            margin: 2px 0;
        }

        #task-tag-input::placeholder {
            color: #adb5bd;
            opacity: 1;
        }

        /* Suggestions Dropdown */
        #task-suggestions {
            margin-top: 4px;
            background: #fff;
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
            box-shadow: 0 4px 16px rgba(13,110,253,0.10);
            max-height: 220px;
            overflow-y: auto;
            z-index: 20;
            position: absolute;
            /* left: 0;
            right: 0;
            min-width: 180px; */
        }

        .task-suggestion {
            padding: 8px 16px;
            cursor: pointer;
            border-bottom: 1px solid #f3f4f6;
            font-size: 15px;
            color: #212529;
            background: transparent;
            transition: background 0.18s, color 0.18s;
        }
        .task-suggestion:last-child {
            border-bottom: none;
        }
        .task-suggestion:hover,
        .task-suggestion.active {
            background: #0d6efd;
            color: #fff;
        }

        /* Scrollbar Styling */
        #task-suggestions::-webkit-scrollbar {
            width: 8px;
        }
        #task-suggestions::-webkit-scrollbar-thumb {
            background: #0d6efd;
            border-radius: 10px;
        }
        #task-suggestions::-webkit-scrollbar-thumb:hover {
            background: #0b5ed7;
        }
    </style>
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
    <style>
        /* Loader style */
        .loader {
            display: none;
            margin: 20px auto;
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            animation: spin 1s linear infinite;
        }

        .profile-header {
            background: linear-gradient(to right, #4e73df, #1cc88a);
            color: white;
            padding: 20px;
            border-radius: 8px;
        }

        .fancy-card {
            /* border: 1px solid #dee2e6; */
            border-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .fancy-card:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        }

        .fancy-card .card-header {
            /* background-color: #f8f9fa; */
            /* font-weight: 600; */
            /* border-bottom: 1px solid #dee2e6; */
        }

        .offcanvas {
            border-top-left-radius: 1rem;
            border-bottom-left-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            border-radius: 0.5rem;
        }

        .btn-danger {
            border-radius: 0.5rem;
        }

        .bg-gradient-primary {
            background: linear-gradient(90deg, #007bff, #22c55e); /* Updated gradient colors for primary */
            color: #ffffff; /* Ensures text is visible on the gradient */
        }


        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }
    </style>

     <style>
        #production-process-form-container .card {
            border-radius: 1rem;
            box-shadow: 0 6px 24px rgba(0,0,0,0.10);
            background: #f8fafc;
        }
        #production-process-form-container .card-header {
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
            font-size: 1.1rem;
            font-weight: 600;
            background: linear-gradient(90deg, #36b3e8 0%, #0ea5e9 100%);
        }
        #production-process-form-container .btn-close,
        #production-process-form-container .btn[aria-label="Cancel"] {
            opacity: 0.8;
            background: none !important;
            box-shadow: none;
            outline: none;
            color: #333;
            font-size: 2rem;
        }
        #production-process-form-container .btn-close:hover,
        #production-process-form-container .btn[aria-label="Cancel"]:hover {
            opacity: 1;
            color: #0ea5e9;
        }
        #production-process-form-container .card-body {
            background: #f8fafc;
        }
        #production-process-form-container label {
            font-weight: 500;
            color: #0ea5e9;
        }
        #production-process-form-container .form-control,
        #production-process-form-container .form-select {
            border-radius: 0.5rem;
            border: 1px solid #b6e0fe;
            background: #fff;
        }
        #production-process-form-container .btn-info {
            background: linear-gradient(90deg, #36b3e8 0%, #0ea5e9 100%);
            border: none;
            color: #fff;
            font-weight: 600;
            border-radius: 0.5rem;
            box-shadow: 0 2px 8px rgba(14,165,233,0.10);
        }
        #production-process-form-container .btn-secondary {
            border-radius: 0.5rem;
        }
        @media (min-width: 992px) {
            #productionProcessModal .modal-dialog {
                max-width: 1000px;
            }
        }
    </style>
    <style>
        :root {
            --primary: #0072ff;
            --accent: #00c6ff;
            --muted: #6c757d;
            --radius: 14px;
            --bg-light: #f8f9fa;
            --bg-dark: #1a1a2f;
            --card-bg: #ffffff;
        }

        /* Hero Section */
        .wm-hero {
            background: linear-gradient(90deg, var(--accent), var(--primary));
            border-radius: var(--radius);
            padding: 2rem;
            position: relative;
            color: #fff;
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .wm-hero .illustration {
            position: absolute;
            right: 2rem;
            bottom: 0;
            z-index: -0;
            width: 260px;
            height: 160px;
            background: url('https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=1000&auto=format&fit=crop') center/cover no-repeat;
            opacity: 0.15;
        }

        .wm-hero .company-meta h2 {
            font-weight: 700;
            margin-bottom: 0.4rem;
        }

        .wm-hero small.badge {
            background: rgba(255, 255, 255, 0.3);
        }

        /* Navigation Tabs */
        .nav-wm {
            /* background: var(--card-bg); */
            border-radius: var(--radius);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            padding: 0.5rem;
        }

        .nav-wm .nav-link {
            border-radius: 10px;
            color: var(--muted);
            transition: all 0.25s ease;
        }

        .nav-wm .nav-link.active {
            background: linear-gradient(90deg, var(--accent), var(--primary));
            color: #fff;
            box-shadow: 0 4px 14px rgba(0, 114, 255, 0.18);
        }

        /* Cards */
        .info-card {
            border: none;
            border-radius: var(--radius);
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .info-card:hover {
            transform: translateY(-3px);
        }

        .info-card .card-header {
            background: rgba(0, 114, 255, 0.08);
            font-weight: 600;
            border-bottom: none;
            color: var(--primary);
        }

        .info-card .card-body p {
            margin-bottom: 0.5rem;
        }

        .section-heading {
            font-weight: 600;
            margin: 1rem 0;
            color: var(--primary);
            border-left: 4px solid var(--primary);
            padding-left: 0.6rem;
        }

        .policy-item:hover, .objective-item:hover {
            background: #f0f7ff;
            transform: translateY(-2px);
            border-color: var(--primary);
        }

        .policy-item .form-check-input:checked,
        .objective-item .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .bg-gradient-primary {
            background: linear-gradient(135deg, #0072ff, #00c6ff);
        }

        .accordion-button:not(.collapsed) {
            background-color: #0072ff !important;
            color: #fff !important;
            box-shadow: 0 2px 6px rgba(0, 114, 255, 0.3);
        }

        .accordion-button:focus {
            box-shadow: none !important;
        }

        .table-hover tbody tr:hover {
            background-color: #f3faff !important;
        }

        .btn-outline-primary:hover {
            background-color: #0072ff;
            color: #fff;
        }


        /* Responsiveness */
        @media (max-width: 768px) {
            .wm-hero .illustration {
                display: none;
            }
        }
    </style>
    @endsection

    <div class="container-fluid py-3">

        <!-- Hero Header -->
        <div class="wm-hero d-flex align-items-center justify-content-between flex-wrap">
            <div class="d-flex align-items-center gap-3">
                <img src="{{ asset($company->logo ?? 'images/default-logo.png') }}" alt="Company Logo"
                    class="rounded-circle border border-light" style="width: 80px; height: 80px; object-fit: cover;">

                <div class="company-meta">
                    <h2>{{ $company->company_name ?? 'Company Name' }}</h2>
                    <p class="mb-1">{{ $company->industry ?? 'Industry Not Set' }}</p>
                    <small class="badge">{{ $company->status ?? 'Active' }}</small>
                </div>
            </div>

            <a href="" class="btn btn-light btn-sm">
                <i class="la la-edit me-1"></i> Edit Profile
            </a>

            <div class="illustration"></div>
        </div>

        <!-- Navigation Tabs -->
        <ul class="nav nav-pills nav-wm mb-4 bg-light flex-wrap justify-content-center" id="profileTabs" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#overview" role="tab"><i class="la la-info-circle me-1"></i> Overview</a></li>
            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#policy" role="tab"><i class="la la-file-alt me-1"></i> Policies</a></li>
            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#recp" role="tab"><i class="la la-chart-line me-1"></i> R.E.C.P</a></li>
            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#finance" role="tab"><i class="la la-dollar-sign me-1"></i> Finance</a></li>
            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#hr" role="tab"><i class="la la-users me-1"></i> HR</a></li>
            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#inventory" role="tab"><i class="la la-box me-1"></i> Inventory</a></li>
            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#operations" role="tab"><i class="la la-cogs me-1"></i> Operations</a></li>
            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab"><i class="la la-cog me-1"></i> Settings</a></li>
        </ul>

        <!-- Tab Contents -->
        <div class="tab-content">
            <!-- Overview -->
            <div class="tab-pane fade show active" id="overview" role="tabpanel">
                <h5 class="section-heading">Company Overview</h5>
                <div class="row g-3">
                    <div class="col-md-6 col-lg-4">
                        <div class="card info-card">
                            <div class="card-header">Basic Information</div>
                            <div class="card-body">
                                <p><strong>Name:</strong> {{ $company->company_name ?? 'N/A' }}</p>
                                <p><strong>Industry:</strong> {{ $company->industry ?? 'N/A' }}</p>
                                <p><strong>Founded:</strong>
                                    {{ $company->date_of_establishment ? \Carbon\Carbon::parse($company->date_of_establishment)->format('F j, Y') : 'N/A' }}
                                </p>
                                <p><strong>Employees:</strong> {{ $company->number_of_employees ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card info-card">
                            <div class="card-header">Headquarters</div>
                            <div class="card-body">
                                <p>{{ $company->address ?? 'Address not set' }}</p>
                                <p>{{ $company->city }}, {{ $company->state }}</p>
                                <p>{{ $company->country }}</p>
                                <p><strong>ZIP:</strong> {{ $company->zip_code ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card info-card">
                            <div class="card-header">Contact</div>
                            <div class="card-body">
                                <p><strong>Email:</strong> {{ $company->email ?? 'N/A' }}</p>
                                <p><strong>Phone:</strong> {{ $company->primary_phone_number ?? 'N/A' }}</p>
                                <p><strong>Website:</strong>
                                    <a href="{{ $company->website_url }}" target="_blank">{{ $company->website_url }}</a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card info-card">
                            <div class="card-header">Location Data</div>
                            <div class="card-body">
                                <p><strong>Latitude:</strong> {{ $company->latitude ?? 'N/A' }}</p>
                                <p><strong>Longitude:</strong> {{ $company->longitude ?? 'N/A' }}</p>
                                <p><strong>MGRS:</strong> {{ $company->mgrs ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card info-card">
                            <div class="card-header">Primary Contact</div>
                            <div class="card-body">
                                <p><strong>Name:</strong> {{ $company->contact_person_full_name ?? 'N/A' }}</p>
                                <p><strong>Position:</strong> {{ $company->contact_person_position ?? 'N/A' }}</p>
                                <p><strong>Phone:</strong> {{ $company->contact_person_contact_number ?? 'N/A' }}</p>
                                <p><strong>Email:</strong> {{ $company->contact_person_email ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card info-card">
                            <div class="card-header">Operations Manager</div>
                            <div class="card-body">
                                <p><strong>Name:</strong> {{ $company->operations_manager ?? 'N/A' }}</p>
                                <p><strong>Email:</strong> {{ $company->operations_email ?? 'N/A' }}</p>
                                <p><strong>Phone:</strong> {{ $company->operations_phone ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Other tabs placeholder -->
             <!-- Policy -->
            <div class="tab-pane fade" id="policy" role="tabpanel">
                <div class="row">
                    <!-- Company Policies -->
                    <div class="col-12 mb-4">
                        <div class="card shadow-sm border-0">
                            <div class="card-header bg-white border-0 d-flex align-items-center justify-content-between">
                                <h4 class="card-title fw-semibold mb-0 text-primary">
                                    <i class="la la-file-alt me-2 text-primary"></i>Company Policies
                                </h4>
                            </div>
                            <div class="card-body pt-3">
                                @if($policies->count() > 0)
                                    <div class="row">
                                        @foreach($policies as $policy)
                                            <div class="col-md-4 col-sm-6 mb-3">
                                                <div class="policy-item p-3 border rounded-3 shadow-sm d-flex align-items-center justify-content-between"
                                                    style="transition: all 0.3s ease;">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <i class="la la-balance-scale text-accent fs-4"></i>
                                                        <label class="form-check-label fw-medium mb-0" for="policy-{{ $policy->policy_id }}">
                                                            {{ ucfirst($policy->title) }}
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <input class="form-check-input ms-2" type="checkbox" role="switch"
                                                            id="policy-{{ $policy->policy_id }}"
                                                            value="{{ $policy->policy_id }}"
                                                            onchange="ChangePolicy(this, '{{ $company->company_id }}', '{{ $policy->policy_id }}')"
                                                            name="policy[]"
                                                            {{ in_array($policy->policy_id, array_column($company_policies->toArray(), 'policy_id')) ? 'checked' : '' }}>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-muted">No company policies defined yet.</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Company Objectives -->
                    <div class="col-12">
                        <div class="card shadow-sm border-0">
                            <div class="card-header bg-white border-0 d-flex align-items-center justify-content-between">
                                <h4 class="card-title fw-semibold mb-0 text-primary">
                                    <i class="la la-bullseye me-2 text-primary"></i>Company Objectives
                                </h4>
                            </div>
                            <div class="card-body pt-3">
                                @if($objectives->count() > 0)
                                    <div class="row">
                                        @foreach($objectives as $objective)
                                            <div class="col-md-4 col-sm-6 mb-3">
                                                <div class="objective-item p-3 border rounded-3 shadow-sm d-flex align-items-center justify-content-between"
                                                    style="transition: all 0.3s ease;">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <i class="la la-check-circle text-success fs-4"></i>
                                                        <label class="form-check-label fw-medium mb-0" for="objective-{{ $objective->objective_id }}">
                                                            {{ ucfirst($objective->name) }}
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <input class="form-check-input ms-2" type="checkbox" role="switch"
                                                            id="objective-{{ $objective->objective_id }}"
                                                            value="{{ $objective->objective_id }}"
                                                            onchange="ChangeObjective(this, '{{ $company->company_id }}', '{{ $objective->objective_id }}')"
                                                            name="objective[]"
                                                            {{ in_array($objective->objective_id, array_column($company_objectives->toArray(), 'objective_id')) ? 'checked' : '' }}>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-muted">No company objectives defined yet.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Policy -->
             <!-- RECP -->
            <div class="tab-pane fade" id="recp" role="tabpanel">
                <div class="recp-section">
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-header bg-white border-0 d-flex align-items-center justify-content-between">
                            <h4 class="card-title fw-semibold text-primary mb-0">
                                <i class="la la-recycle me-2 text-primary"></i>Resource Efficiency & Cleaner Production (R.E.C.P)
                            </h4>
                            <a href="#" class="btn btn-sm btn-gradient">
                                <i class="la la-plus me-1"></i> Add Initiative
                            </a>
                        </div>

                        <div class="card-body">
                            <p class="text-muted">
                                This section helps track your company’s progress toward sustainable and cleaner production goals — 
                                monitoring resource consumption, waste reduction, and environmental efficiency.
                            </p>

                            <!-- RECP Metrics -->
                            <div class="row g-3 mt-3">
                                <div class="col-md-4">
                                    <div class="card card-wm p-3 text-center border-0 shadow-sm">
                                        <i class="la la-tint fs-1 text-primary mb-2"></i>
                                        <h6 class="fw-semibold">Water Efficiency</h6>
                                        <p class="text-muted small mb-1">Usage per production cycle</p>
                                        <div class="progress" style="height: 6px;">
                                            <div class="progress-bar bg-primary" style="width: 72%;"></div>
                                        </div>
                                        <small class="text-success fw-medium mt-1 d-block">72% Efficiency</small>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card card-wm p-3 text-center border-0 shadow-sm">
                                        <i class="la la-bolt fs-1 text-warning mb-2"></i>
                                        <h6 class="fw-semibold">Energy Efficiency</h6>
                                        <p class="text-muted small mb-1">kWh saved this quarter</p>
                                        <div class="progress" style="height: 6px;">
                                            <div class="progress-bar bg-warning" style="width: 64%;"></div>
                                        </div>
                                        <small class="text-success fw-medium mt-1 d-block">64% Target Achieved</small>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card card-wm p-3 text-center border-0 shadow-sm">
                                        <i class="la la-cubes fs-1 text-success mb-2"></i>
                                        <h6 class="fw-semibold">Material Utilization</h6>
                                        <p class="text-muted small mb-1">Recycled vs. new materials</p>
                                        <div class="progress" style="height: 6px;">
                                            <div class="progress-bar bg-success" style="width: 81%;"></div>
                                        </div>
                                        <small class="text-success fw-medium mt-1 d-block">81% Reuse Rate</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Initiatives -->
                            <div class="mt-5">
                                <h5 class="fw-semibold mb-3">Recent R.E.C.P Initiatives</h5>
                                <div class="table-responsive">
                                    <table class="table align-middle table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Initiative</th>
                                                <th>Category</th>
                                                <th>Status</th>
                                                <th>Impact</th>
                                                <th>Date Implemented</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Water Recycling System</td>
                                                <td>Water Efficiency</td>
                                                <td><span class="badge bg-success">Ongoing</span></td>
                                                <td>Reduced water usage by 30%</td>
                                                <td>Mar 2025</td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-outline-primary"><i class="la la-eye"></i></a>
                                                    <a href="#" class="btn btn-sm btn-outline-secondary"><i class="la la-pencil"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Solar Power Integration</td>
                                                <td>Energy Efficiency</td>
                                                <td><span class="badge bg-info">Completed</span></td>
                                                <td>Cut energy cost by 25%</td>
                                                <td>Jan 2025</td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-outline-primary"><i class="la la-eye"></i></a>
                                                    <a href="#" class="btn btn-sm btn-outline-secondary"><i class="la la-pencil"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="empty-state mt-4" style="display:none;">
                                    <img src="{{ asset('images/empty-state.svg') }}" alt="No initiatives">
                                    <p class="mt-2 text-muted">No R.E.C.P initiatives added yet.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <h4 class="">General Knowledge of Nigeria IEE RECP Concept/Benefit</h4>
                    <p class="subtitle">In Nigeria, Industrial Energy Efficiency (IEE) and Resource Efficiency
                        and Cleaner Production (RECP) focus on optimizing energy and resource use while minimizing
                        waste.
                        These practices help businesses reduce costs, enhance sustainability, and lower
                        environmental impacts.
                        The benefits include cost savings, compliance with regulations, improved competitiveness,
                        and positive
                        contributions to Nigeria's economic growth and environmental protection. Adopting IEE and
                        RECP strategies
                        enables industries to operate more efficiently and sustainably, fostering a cleaner, greener
                        future.</p>
                    <!-- this projct -->
                    <div class="card">
                        <!-- card header -->
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="true" href="#this-project"
                                        data-bs-toggle="tab">This Project</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#environmental-health" data-bs-toggle="tab">Human and
                                        Environmental Health/Business Benefits</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tab-innovation" data-bs-toggle="tab">Innovation</a>
                                </li>
                            </ul>
                        </div><!--end card-header-->
                        <div class="card-body pt-2">
                            <div class="tab-content">
                                <div class="row tab-pane fade show active" id="this-project">
                                    <div class="col-md-12">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id=""
                                                onchange="ChangeUtmostBenefit(this, '{{$company->company_id}}', `Develop policy and regulation that deliver economic, human and environmental health gain to your company.`)"
                                                value="Develop policy and regulation that deliver economic, human and environmental health gain to your company."
                                                name="areas_of_company_benefit[]"
                                                {{ in_array("Develop policy and regulation that deliver economic, human and environmental health gain to your company.", array_column($company_benefits->toArray(), 'benefit_title')) ? "checked" : "" }}>
                                            <label class="form-check-label" for=""> Develop policy and regulation
                                                that deliver economic, humanand environmental health gain to your
                                                company. </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-md-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id=""
                                                onchange="ChangeUtmostBenefit(this, '{{$company->company_id}}', `To offer standard accreditation and certification capacity building on ISO 15000 and 14000 series to your enterprise.`)"
                                                value="To offer standard accreditation and certification capacity building on ISO 15000 and 14000 series to your enterprise."
                                                name="areas_of_company_benefit[]"
                                                {{ in_array("To offer standard accreditation and certification capacity building on ISO 15000 and 14000 series to your enterprise.", array_column($company_benefits->toArray(), 'benefit_title')) ? "checked" : "" }}>
                                            <label class="form-check-label" for=""> To offer standard accreditation
                                                and certification capacity building on ISO 15000 and 14000 series to
                                                your enterprise </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-md-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id=""
                                                onchange="ChangeUtmostBenefit(this, '{{$company->company_id}}', `To deliver impactful training on Resource Efficient and Cleaner Production (RECP), including comprehensive support materials, toolkits, and learning resources, tailored for staff and employees across Nigeria's industrial manufacturing sector.`)"
                                                value="To deliver impactful training on Resource Efficient and Cleaner Production (RECP), including comprehensive support materials, toolkits, and learning resources, tailored for staff and employees across Nigeria's industrial manufacturing sector."
                                                name="areas_of_company_benefit[]"
                                                {{ in_array("To deliver impactful training on Resource Efficient and Cleaner Production (RECP), including comprehensive support materials, toolkits, and learning resources, tailored for staff and employees across Nigeria's industrial manufacturing sector.", array_column($company_benefits->toArray(), 'benefit_title')) ? "checked" : "" }}>
                                            <label class="form-check-label" for=""> To deliver impactful training on
                                                Resource Efficient and Cleaner Production (RECP), including
                                                comprehensive support materials, toolkits, and learning resources,
                                                tailored for staff and employees across Nigeria's industrial
                                                manufacturing sector. </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-md-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id=""
                                                onchange="ChangeUtmostBenefit(this, '{{$company->company_id}}', `To strengthen the internal capacity for delivering RECP training and related technical assistance to your enterprise, ensuring long-term impact and achieving commercially sustainable outcomes.`)"
                                                value="To strengthen the internal capacity for delivering RECP training and related technical assistance to your enterprise, ensuring long-term impact and achieving commercially sustainable outcomes."
                                                name="areas_of_company_benefit[]"
                                                {{ in_array("To strengthen the internal capacity for delivering RECP training and related technical assistance to your enterprise, ensuring long-term impact and achieving commercially sustainable outcomes.", array_column($company_benefits->toArray(), 'benefit_title')) ? "checked" : "" }}>
                                            <label class="form-check-label" for=""> To strengthen the internal
                                                capacity for delivering RECP training and related technical
                                                assistance to your enterprise, ensuring long-term impact and
                                                achieving commercially sustainable outcomes. </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-md-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id=""
                                                onchange="ChangeUtmostBenefit(this, '{{$company->company_id}}', `To raise awareness and implement pilot programs on RECP, aimed at enhancing productivity through efficient use of manufacturing inputs (water, chemicals, and materials), minimizing waste and emissions, and promoting regulatory compliance while boosting competitiveness within your industrial sector.`)"
                                                value="To raise awareness and implement pilot programs on RECP, aimed at enhancing productivity through efficient use of manufacturing inputs (water, chemicals, and materials), minimizing waste and emissions, and promoting regulatory compliance while boosting competitiveness within your industrial sector."
                                                name="areas_of_company_benefit[]"
                                                {{ in_array("To raise awareness and implement pilot programs on RECP, aimed at enhancing productivity through efficient use of manufacturing inputs (water, chemicals, and materials), minimizing waste and emissions, and promoting regulatory compliance while boosting competitiveness within your industrial sector.", array_column($company_benefits->toArray(), 'benefit_title')) ? "checked" : "" }}>
                                            <label class="form-check-label" for=""> To raise awareness and implement
                                                pilot programs on RECP, aimed at enhancing productivity through
                                                efficient use of manufacturing inputs (water, chemicals, and
                                                materials), minimizing waste and emissions, and promoting regulatory
                                                compliance while boosting competitiveness within your industrial
                                                sector. </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-md-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id=""
                                                onchange="ChangeUtmostBenefit(this, '{{$company->company_id}}', `To enhance the adoption of RECP practices and associated investments by providing a targeted financial assistance package for companies participating in RECP pilot programs.`)"
                                                value="To enhance the adoption of RECP practices and associated investments by providing a targeted financial assistance package for companies participating in RECP pilot programs."
                                                name="areas_of_company_benefit[]"
                                                {{ in_array("To enhance the adoption of RECP practices and associated investments by providing a targeted financial assistance package for companies participating in RECP pilot programs.", array_column($company_benefits->toArray(), 'benefit_title')) ? "checked" : "" }}>
                                            <label class="form-check-label" for=""> To enhance the adoption of RECP
                                                practices and associated investments by providing a targeted
                                                financial assistance package for companies participating in RECP
                                                pilot programs. </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-md-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id=""
                                                onchange="ChangeUtmostBenefit(this, '{{$company->company_id}}', `To deliver the cost-saving benefits of RECP to your industrial manufacturing sector by facilitating greater access to financial mechanisms—both commercial and government—to support the financing of RECP projects.`)"
                                                value="To deliver the cost-saving benefits of RECP to your industrial manufacturing sector by facilitating greater access to financial mechanisms—both commercial and government—to support the financing of RECP projects."
                                                name="areas_of_company_benefit[]"
                                                {{ in_array("To deliver the cost-saving benefits of RECP to your industrial manufacturing sector by facilitating greater access to financial mechanisms—both commercial and government—to support the financing of RECP projects.", array_column($company_benefits->toArray(), 'benefit_title')) ? "checked" : "" }}>
                                            <label class="form-check-label" for=""> To deliver the cost-saving
                                                benefits of RECP to your industrial manufacturing sector by
                                                facilitating greater access to financial mechanisms—both commercial
                                                and government—to support the financing of RECP projects. </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- environmental health -->
                                <div class="row tab-pane fade" id="environmental-health">
                                    <div class="col-md-12">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id=""
                                                onchange="ChangeEnvironmentalBenefit(this, '{{$company->company_id}}', `Achieve a minimum 20% reduction in energy consumption within one year.`)"
                                                value="Achieve a minimum 20% reduction in energy consumption within one year."
                                                name="environment_health_benefit[]"
                                                {{ in_array("Achieve a minimum 20% reduction in energy consumption within one year.", array_column($company_enviromental_benefits->toArray(), 'environmental_benefit_title')) ? "checked" : "" }}>
                                            <label class="form-check-label" for=""> Achieve a minimum 20% reduction
                                                in energy consumption within one year. </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-md-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id=""
                                                onchange="ChangeEnvironmentalBenefit(this, '{{$company->company_id}}', `Achieve a 40% reduction in CO2 emissions within 18 months.`)"
                                                value="Achieve a 40% reduction in CO2 emissions within 18 months."
                                                name="environment_health_benefit[]"
                                                {{ in_array("Achieve a 40% reduction in CO2 emissions within 18 months.", array_column($company_enviromental_benefits->toArray(), 'environmental_benefit_title')) ? "checked" : "" }}>
                                            <label class="form-check-label" for=""> Achieve a 40% reduction in
                                                CO<sub>2</sub> emissions within 18 months.</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-md-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id=""
                                                onchange="ChangeEnvironmentalBenefit(this, '{{$company->company_id}}', `Double your water productivity within one year.`)"
                                                value="Double your water productivity within one year."
                                                name="environment_health_benefit[]"
                                                {{ in_array("Double your water productivity within one year.", array_column($company_enviromental_benefits->toArray(), 'environmental_benefit_title')) ? "checked" : "" }}>
                                            <label class="form-check-label" for=""> Double your water productivity
                                                within one year. </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-md-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id=""
                                                onchange="ChangeEnvironmentalBenefit(this, '{{$company->company_id}}', `Achieve a 50% increase in overall material productivity within one year.`)"
                                                value="Achieve a 50% increase in overall material productivity within one year."
                                                name="environment_health_benefit[]"
                                                {{ in_array("Achieve a 50% increase in overall material productivity within one year.", array_column($company_enviromental_benefits->toArray(), 'environmental_benefit_title')) ? "checked" : "" }}>
                                            <label class="form-check-label" for=""> Achieve a 50% increase in
                                                overall material productivity within one year. </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-md-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id=""
                                                onchange="ChangeEnvironmentalBenefit(this, '{{$company->company_id}}', `Attain ISO 14000 certification to demonstrate your commitment to effective environmental management and sustainability practices.`)"
                                                value="Attain ISO 14000 certification to demonstrate your commitment to effective environmental management and sustainability practices."
                                                name="environment_health_benefit[]"
                                                {{ in_array("Attain ISO 14000 certification to demonstrate your commitment to effective environmental management and sustainability practices.", array_column($company_enviromental_benefits->toArray(), 'environmental_benefit_title')) ? "checked" : "" }}>
                                            <label class="form-check-label" for=""> Attain ISO 14000 certification
                                                to demonstrate your commitment to effective environmental management
                                                and sustainability practices. </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-md-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id=""
                                                onchange="ChangeEnvironmentalBenefit(this, '{{$company->company_id}}', `Achieve an increase in overall annual financial savings.`)"
                                                value="Achieve an increase in overall annual financial savings."
                                                name="environment_health_benefit[]"
                                                {{ in_array("Achieve an increase in overall annual financial savings.", array_column($company_enviromental_benefits->toArray(), 'environmental_benefit_title')) ? "checked" : "" }}>
                                            <label class="form-check-label" for=""> Achieve an increase in overall
                                                annual financial savings. </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-md-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id=""
                                                onchange="ChangeEnvironmentalBenefit(this, '{{$company->company_id}}', `Enhance customer satisfaction through improved products, services, and overall experience.`)"
                                                value="Enhance customer satisfaction through improved products, services, and overall experience."
                                                name="environment_health_benefit[]"
                                                {{ in_array("Enhance customer satisfaction through improved products, services, and overall experience.", array_column($company_enviromental_benefits->toArray(), 'environmental_benefit_title')) ? "checked" : "" }}>
                                            <label class="form-check-label" for=""> Enhance customer satisfaction
                                                through improved products, services, and overall experience.
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-md-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id=""
                                                onchange="ChangeEnvironmentalBenefit(this, '{{$company->company_id}}', `Achieve ISO 15000 series certification to demonstrate adherence to international standards for information and communication technology management.`)"
                                                value="Achieve ISO 15000 series certification to demonstrate adherence to international standards for information and communication technology management."
                                                name="environment_health_benefit[]"
                                                {{ in_array("Achieve ISO 15000 series certification to demonstrate adherence to international standards for information and communication technology management.", array_column($company_enviromental_benefits->toArray(), 'environmental_benefit_title')) ? "checked" : "" }}>
                                            <label class="form-check-label" for=""> Achieve ISO 15000 series
                                                certification to demonstrate adherence to international standards
                                                for information and communication technology management. </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- environmental health -->
                                <!-- Innovation -->
                                <div class="row tab-pane fade g-2" id="tab-innovation">
                                    <div class="col-md-12">
                                        <div class="col-md-8">
                                            <label for="">Key areas for improving performance in your
                                                industry.</label>
                                        </div>
                                        <div class="col-md-12 key-areas-container">
                                            @foreach($company_areas_of_improvement as $keyArea)
                                            <div class="row g-2 my-1">
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                            value="{{ $keyArea->area_title }}"
                                                            placeholder="Key area for improving performance in your industry"
                                                            onblur='update_key_area("{{$company->company_id}}", "{{ $keyArea->improvementAreaID }}", this)'>
                                                    </div>
                                                </div>
                                                <div class="col-md-3"><button class="btn btn-outline-danger"
                                                        onclick='remove_key_area(this, "{{ $keyArea->improvementAreaID }}")'
                                                        type="button"> <i class="iconoir-trash"></i> </button></div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="row g-2">
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="Key area for performance improvement"
                                                        id="key_area_for_improvent">
                                                </div>
                                            </div>
                                            <div class="col-md-3"><button
                                                    class="btn btn-outline-primary btn-sm add_more_key_areas"
                                                    type="button"> <i class="iconoir-plus fs-4"></i> </button></div>
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="col-md-8">
                                            <label for="">Highlight innovations that enhance your product's
                                                environmental compatibility.</label>
                                        </div>
                                        <div class="col-md-12 product-innovation-container">
                                            @foreach($company_product_innovation as $productInnovation)
                                            <div class="row g-2 my-1">
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                            value="{{ $productInnovation->innovation_area_title }}"
                                                            placeholder="Key innovation that enhance your product's environmental compatibility"
                                                            onblur='update_product_innovation("{{$company->company_id}}", "{{ $productInnovation->innovationAreaID }}", this)'>
                                                    </div>
                                                </div>
                                                <div class="col-md-3"><button class="btn btn-outline-danger"
                                                        onclick='remove_product_innovation(this, "{{ $productInnovation->innovationAreaID }}")'
                                                        type="button"> <i class="iconoir-trash"></i> </button></div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="row g-2">
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="Key innovation that enhance your product's environmental compatibility"
                                                        id="key_product_innovation">
                                                </div>
                                            </div>
                                            <div class="col-md-3"><button
                                                    class="btn btn-outline-primary btn-sm add_more_key_innovation"
                                                    type="button"> <i class="iconoir-plus fs-4"></i> </button></div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="col-md-8">
                                            <label for="">Identify hazarduous materials in your process system that
                                                can be reduced, eliminated, or replaced with safer
                                                alternatives.</label>
                                        </div>
                                        <div class="col-md-12 hazarduous-material-container">
                                            @foreach($company_hazarduous_material as $hazarduousMaterial)
                                            <div class="row g-2 my-1">
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                            value="{{ $hazarduousMaterial->material_title }}"
                                                            placeholder="Key innovation that enhance your product's environmental compatibility"
                                                            onblur='update_hazardous_material("{{$company->company_id}}", "{{ $hazarduousMaterial->hazarduousMaterialID }}", this)'>
                                                    </div>
                                                </div>
                                                <div class="col-md-3"><button class="btn btn-outline-danger"
                                                        onclick='remove_hazardous_material(this, "{{ $hazarduousMaterial->hazarduousMaterialID }}")'
                                                        type="button"> <i class="iconoir-trash"></i> </button></div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="row g-2">
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="Hazarduous material " id="hazarduous_material">
                                                </div>
                                            </div>
                                            <div class="col-md-3"><button
                                                    class="btn btn-outline-primary btn-sm add_more_hazardous_material"
                                                    type="button"> <i class="iconoir-plus fs-4"></i> </button></div>
                                        </div>
                                    </div>
                                    <!-- Innovation -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 class="">Resource Efficiency & Cleaner Production Opportunities</h4>
                    <p>Resource Efficiency and Cleaner Production (RECP) focus on optimizing
                        the use of resources while minimizing waste and environmental impacts
                        throughout production processes. By adopting these strategies, industries
                        can enhance productivity, reduce costs, and achieve sustainability goals.</p>
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="true" href="#tab-housekeeping"
                                        data-bs-toggle="tab">Good Housekeeping</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#process-specific-optimization"
                                        data-bs-toggle="tab">Process Specific Optimization</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#process-waste-reduction-measures"
                                        data-bs-toggle="tab">Waste Reduction Measures</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#waste-management-method" data-bs-toggle="tab">Waste
                                        Management & Disposal Methods</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#product-recovery" data-bs-toggle="tab">Product
                                        Recovery Measures</a>
                                </li>
                            </ul>
                        </div><!--end card-header-->
                        <div class="card-body pt-2">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-housekeeping">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeGoodHouseKeeping(this, '{{$company->company_id}}', `Attitudinal change (negligence attitude).`)"
                                                    value="Attitudinal change (negligence attitude)."
                                                    name="house_keeping[]"
                                                    {{ in_array("Attitudinal change (negligence attitude).", array_column($company_house_keeping->toArray(), 'practice_title')) ? "checked" : "" }}>
                                                <label class="form-check-label" for=""> Attitudinal change (negligence attitude). </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeGoodHouseKeeping(this, '{{$company->company_id}}', `Improved workplace management.`)"
                                                    value="Improved workplace management."
                                                    name="house_keeping[]"
                                                    {{ in_array("Improved workplace management.", array_column($company_house_keeping->toArray(), 'practice_title')) ? "checked" : "" }}>
                                                <label class="form-check-label" for=""> Improved Workplace management. </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeGoodHouseKeeping(this, '{{$company->company_id}}', `Good operating practices(personel practices, waste segregation etc.).`)"
                                                    value="Good operating practices(personel practices, waste segregation etc.)."
                                                    name="house_keeping[]"
                                                    {{ in_array("Good operating practices(personel practices, waste segregation etc.).", array_column($company_house_keeping->toArray(), 'practice_title')) ? "checked" : "" }}>
                                                <label class="form-check-label" for=""> Good operating practices(personel practices, waste segregation etc.). </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeGoodHouseKeeping(this, '{{$company->company_id}}', `Workers motivation.`)"
                                                    value="Workers motivation."
                                                    name="house_keeping[]"
                                                    {{ in_array("Workers motivation.", array_column($company_house_keeping->toArray(), 'practice_title')) ? "checked" : "" }}>
                                                <label class="form-check-label" for=""> Workers motivation. </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Process  Specific Specialization -->
                                <div class="row g-2 tab-pane fade " id="process-specific-optimization">
                                    <div class="col-md-12">
                                        <div class="col-md-8">
                                            <label for="">List Unit Processes Requiring Intervention (if
                                                applicable)</label>
                                        </div>
                                        <div class="col-md-12 unit-process-container">
                                            @foreach($company_unit_process as $unitProcess)
                                            <div class="row g-2 my-1">
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                            value="{{ $unitProcess->unit_process_title }}"
                                                            placeholder="Unit process"
                                                            onblur='update_unit_process("{{$company->company_id}}", "{{ $unitProcess->unitProcessID }}", this)'>
                                                    </div>
                                                </div>
                                                <div class="col-md-3"><button class="btn btn-outline-danger"
                                                        onclick='remove_unit_process(this, "{{ $unitProcess->unitProcessID }}")'
                                                        type="button"> <i class="iconoir-trash"></i> </button></div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="row g-2">
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Unit process"
                                                        id="unit_process">
                                                </div>
                                            </div>
                                            <div class="col-md-3"><button
                                                    class="btn btn-outline-primary btn-sm add_more_unit_process"
                                                    type="button"> <i class="iconoir-plus fs-4"></i> </button></div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="col-md-8">
                                            <label for=""> Problem Summary and Suggested Solutions. </label>
                                        </div>
                                        <div class="col-md-12 problems-solutions-container">
                                            @foreach($company_problems_and_solutions as $problemSolution)
                                            <div class="row g-2 my-1 align-items-end">
                                                <div class="col-md-5">
                                                    <label for="">Problem Summary</label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                            value="{{ $problemSolution->problem_title }}"
                                                            placeholder="Problem Summary"
                                                            onblur='update_problem_summary("{{$company->company_id}}", "{{ $problemSolution->problemSolutionID }}", this)'>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <label for="">Suggested Solution</label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                            value="{{ $problemSolution->solution_title }}"
                                                            placeholder="Suggested solution"
                                                            onblur='update_suggested_solution("{{$company->company_id}}", "{{ $problemSolution->problemSolutionID }}", this)'>
                                                    </div>
                                                </div>
                                                <div class="col-md-2"><button class="btn btn-outline-danger"
                                                        onclick='remove_problem_solution(this, "{{ $problemSolution->problemSolutionID }}")'
                                                        type="button"> <i class="iconoir-trash"></i> </button></div>
                                            </div>
                                            @endforeach
                                        </div>

                                        <div class="row g-2 align-items-end">
                                            <div class="col-md-5">
                                                <label for="">Problem summary</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="Problem summary" id="problem_summary">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <label for="">Suggested Solution</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="Suggested solution" id="suggested_solution">
                                                </div>
                                            </div>
                                            <div class="col-md-2 "><button
                                                    class="btn btn-outline-primary btn-sm add_more_problem_solution"
                                                    type="button"> <i class="iconoir-plus fs-4"></i> </button></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Process specific specialization -->
                                <!-- waste reduction measures -->
                                <div class="tab-pane fade" id="process-waste-reduction-measures">
                                    <div class="row mb-2">
                                        @php
                                            // Get all checked waste reduction titles as an array for easy lookup
                                            $checkedWasteReductions = array_column($company_waste_reduction_measures->toArray(), 'waste_reduction_title');
                                        @endphp

                                        <div class="col-md-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Water recycling flow.`)"
                                                    id="" value="Water recycling flow."
                                                    name="RECP_waste_reduction_measures[]"
                                                    {{ in_array("Water recycling flow.", $checkedWasteReductions) ? "checked" : "" }}>
                                                <label class="form-check-label" for=""> Water recycling flow.
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Waste water treatment.`)"
                                                    value="Waste water treatment."
                                                    name="RECP_waste_reduction_measures[]"
                                                    {{ in_array("Waste water treatment.", $checkedWasteReductions) ? "checked" : "" }}>
                                                <label class="form-check-label" for=""> Waste water treatment.
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Monitoring of the quality and quantity of waste water.`)"
                                                    value="Monitoring of the quality and quantity of waste water."
                                                    name="RECP_waste_reduction_measures[]"
                                                    {{ in_array("Monitoring of the quality and quantity of waste water.", $checkedWasteReductions) ? "checked" : "" }}>
                                                <label class="form-check-label" for=""> Monitoring of the quality
                                                    and quantity of wastewater. </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Using production equipment or technology that supports energy/resource-efficient production.`)"
                                                    value="Using production equipment or technology that supports energy/resource-efficient production."
                                                    name="RECP_waste_reduction_measures[]"
                                                    {{ in_array("Using production equipment or technology that supports energy/resource-efficient production.", $checkedWasteReductions) ? "checked" : "" }}>
                                                <label class="form-check-label" for=""> Using production equipment
                                                    or technology that supports energy/resource-efficient
                                                    production. </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Use of waste for internal energy sources.`)"
                                                    value="Use of waste for internal energy sources."
                                                    name="RECP_waste_reduction_measures[]"
                                                    {{ in_array("Use of waste for internal energy sources.", $checkedWasteReductions) ? "checked" : "" }}>
                                                <label class="form-check-label" for=""> Use of waste for internal
                                                    energy sources. </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Installation of lighting sensor.`)"
                                                    value="Installation of lighting sensor."
                                                    name="RECP_waste_reduction_measures[]"
                                                    {{ in_array("Installation of lighting sensor.", $checkedWasteReductions) ? "checked" : "" }}>
                                                <label class="form-check-label" for=""> Installation of lighting
                                                    sensor. </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Utilization of sunlight for daytime lighting.`)"
                                                    value="Utilization of sunlight for daytime lighting."
                                                    name="RECP_waste_reduction_measures[]"
                                                    {{ in_array("Utilization of sunlight for daytime lighting.", $checkedWasteReductions) ? "checked" : "" }}>
                                                <label class="form-check-label" for=""> Utilization of sunlight for
                                                    daytime lighting. </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Use of enviromentally friendly/renewable energy.`)"
                                                    value="Use of enviromentally friendly/renewable energy."
                                                    name="RECP_waste_reduction_measures[]"
                                                    {{ in_array("Use of enviromentally friendly/renewable energy.", $checkedWasteReductions) ? "checked" : "" }}>
                                                <label class="form-check-label" for=""> Use of enviromentally
                                                    friendly/renewable energy. </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Recording of fuel usage.`)"
                                                    value="Recording of fuel usage."
                                                    name="RECP_waste_reduction_measures[]"
                                                    {{ in_array("Recording of fuel usage.", $checkedWasteReductions) ? "checked" : "" }}>
                                                <label class="form-check-label" for=""> Recording of fuel usage.
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Minimize the use of generating sets.`)"
                                                    value="Minimize the use of generating sets."
                                                    name="RECP_waste_reduction_measures[]"
                                                    {{ in_array("Minimize the use of generating sets.", $checkedWasteReductions) ? "checked" : "" }}>
                                                <label class="form-check-label" for=""> Minimize the use of
                                                    generating sets. </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Substitute high yield pollutant raw materials with other less polluting materials.`)"
                                                    value="Substitute high yield pollutant raw materials with other less polluting materials."
                                                    name="RECP_waste_reduction_measures[]"
                                                    {{ in_array("Substitute high yield pollutant raw materials with other less polluting materials.", $checkedWasteReductions) ? "checked" : "" }}>
                                                <label class="form-check-label" for=""> Substitute high yield
                                                    pollutant raw materials with other less polluting materials.
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Maintain the unit process/equipment to minimize emission of pollutants.`)"
                                                    value="Maintain the unit process/equipment to minimize emission of pollutants."
                                                    name="RECP_waste_reduction_measures[]"
                                                    {{ in_array("Maintain the unit process/equipment to minimize emission of pollutants.", $checkedWasteReductions) ? "checked" : "" }}>
                                                <label class="form-check-label" for=""> Maintain the unit
                                                    process/equipment to minimize emission of pollutants. </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Diluting the air pollutants.`)"
                                                    value="Diluting the air pollutants."
                                                    name="RECP_waste_reduction_measures[]"
                                                    {{ in_array("Diluting the air pollutants.", $checkedWasteReductions) ? "checked" : "" }}>
                                                <label class="form-check-label" for=""> Diluting the air pollutants.
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Plant flowers and trees around the premises to reduce large number of pollutants in the air.`)"
                                                    value="Plant flowers and trees around the premises to reduce large number of pollutants in the air."
                                                    name="RECP_waste_reduction_measures[]"
                                                    {{ in_array("Plant flowers and trees around the premises to reduce large number of pollutants in the air.", $checkedWasteReductions) ? "checked" : "" }}>
                                                <label class="form-check-label" for=""> Plant flowers and trees
                                                    around the premises to reduce large number of pollutants in the
                                                    air. </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteReductionMeasures(this, '{{$company->company_id}}', `Fuel substituting(petrol and diesel can be replaced with compressed natural gas, solar and wind energy).`)"
                                                    value="Fuel substituting(petrol and diesel can be replaced with compressed natural gas, solar and wind energy)."
                                                    name="RECP_waste_reduction_measures[]"
                                                    {{ in_array("Fuel substituting(petrol and diesel can be replaced with compressed natural gas, solar and wind energy).", $checkedWasteReductions) ? "checked" : "" }}>
                                                <label class="form-check-label" for=""> Fuel substituting(petrol and
                                                    diesel can be replaced with compressed natural gas, solar and
                                                    wind energy). </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- waste reduction measures -->
                                <!-- waste management and disposal methods -->
                                <div class="tab-pane fade" id="waste-management-method">
                                    <div class="row g-2 mb-2">
                                        <div class="col-md-4">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteDisposalMethod(this, '{{$company->company_id}}', `Landfill`)"
                                                    value="Landfill" name="waste_management_methods[]"
                                                    {{(in_array("Landfill",
                                                    array_column($company_management_measures->toArray(),
                                                'management_method_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Landfill </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteDisposalMethod(this, '{{$company->company_id}}', `Recycling`)"
                                                    value="Recycling" name="waste_management_methods[]"
                                                    {{(in_array("Recycling",
                                                    array_column($company_management_measures->toArray(),
                                                'management_method_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Recycling </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteDisposalMethod(this, '{{$company->company_id}}', `Waste segregation`)"
                                                    value="Waste segregation" name="waste_management_methods[]"
                                                    {{(in_array("Waste segregation",
                                                    array_column($company_management_measures->toArray(),
                                                'management_method_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Waste segregation </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteDisposalMethod(this, '{{$company->company_id}}', `Incineration`)"
                                                    value="Incineration" name="waste_management_methods[]"
                                                    {{(in_array("Incineration",
                                                    array_column($company_management_measures->toArray(),
                                                'management_method_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Incineration </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteDisposalMethod(this, '{{$company->company_id}}', `Composting`)"
                                                    value="Composting" name="waste_management_methods[]"
                                                    {{(in_array("Composting",
                                                    array_column($company_management_measures->toArray(),
                                                'management_method_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Composting </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeWasteDisposalMethod(this, '{{$company->company_id}}', `Waste Symbiosis`)"
                                                    value="Waste Symbiosis" name="waste_management_methods[]"
                                                    {{(in_array("Waste Symbiosis",
                                                    array_column($company_management_measures->toArray(),
                                                'management_method_title')))? "checked": ""}}>
                                                <label class="form-check-label" for=""> Waste Symbiosis </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--  -->
                                <!--  -->
                                <div class="tab-pane fade" id="product-recovery">
                                    <div class="row mb-2">
                                        @php
                                            // Get all checked product recovery method titles as an array for easy lookup
                                            $checkedProductRecoveryMethods = array_column($company_product_recovery_measures->toArray(), 'recovery_method_title');
                                        @endphp

                                        <div class="col-md-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeProductRecoveryMeasure(this, '{{$company->company_id}}', `High temperature recovery method`)"
                                                    value="High temperature recovery method"
                                                    name="product_recovery_measures[]"
                                                    {{ in_array("High temperature recovery method", $checkedProductRecoveryMethods) ? "checked" : "" }}>
                                                <label class="form-check-label" for=""> High temperature recovery method </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeProductRecoveryMeasure(this, '{{$company->company_id}}', `Using correct material ratio`)"
                                                    value="Using correct material ratio"
                                                    name="product_recovery_measures[]"
                                                    {{ in_array("Using correct material ratio", $checkedProductRecoveryMethods) ? "checked" : "" }}>
                                                <label class="form-check-label" for=""> Using correct material ratio </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeProductRecoveryMeasure(this, '{{$company->company_id}}', `Using standard measuring equipment`)"
                                                    value="Using standard measuring equipment"
                                                    name="product_recovery_measures[]"
                                                    {{ in_array("Using standard measuring equipment", $checkedProductRecoveryMethods) ? "checked" : "" }}>
                                                <label class="form-check-label" for=""> Using standard measuring equipment </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeProductRecoveryMeasure(this, '{{$company->company_id}}', `Adequate chemical/ material storage facility`)"
                                                    value="Adequate chemical/ material storage facility"
                                                    name="product_recovery_measures[]"
                                                    {{ in_array("Adequate chemical/ material storage facility", $checkedProductRecoveryMethods) ? "checked" : "" }}>
                                                <label class="form-check-label" for=""> Adequate chemical/ material storage facility </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeProductRecoveryMeasure(this, '{{$company->company_id}}', `Adequate container seal to prevent spill`)"
                                                    value="Adequate container seal to prevent spill"
                                                    name="product_recovery_measures[]"
                                                    {{ in_array("Adequate container seal to prevent spill", $checkedProductRecoveryMethods) ? "checked" : "" }}>
                                                <label class="form-check-label" for=""> Adequate container seal to prevent spill </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeProductRecoveryMeasure(this, '{{$company->company_id}}', `Recycling`)"
                                                    value="Recycling"
                                                    name="product_recovery_measures[]"
                                                    {{ in_array("Recycling", $checkedProductRecoveryMethods) ? "checked" : "" }}>
                                                <label class="form-check-label" for=""> Recycling </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeProductRecoveryMeasure(this, '{{$company->company_id}}', `Filtration`)"
                                                    value="Filtration"
                                                    name="product_recovery_measures[]"
                                                    {{ in_array("Filtration", $checkedProductRecoveryMethods) ? "checked" : "" }}>
                                                <label class="form-check-label" for=""> Filtration </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id=""
                                                    onchange="ChangeProductRecoveryMeasure(this, '{{$company->company_id}}', `Extended Producer Responsibility(EPR)`)"
                                                    value="Extended Producer Responsibility(EPR)"
                                                    name="product_recovery_measures[]"
                                                    {{ in_array("Extended Producer Responsibility(EPR)", $checkedProductRecoveryMethods) ? "checked" : "" }}>
                                                <label class="form-check-label" for=""> Extended Producer Responsibility(EPR) </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!--  -->
                            </div>
                        </div>
                    </div>
                    @if(auth()->guard('admin')->check())
                        <!-- RECP Approval and Disapproval Section -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="recpHeading">
                                <button class="accordion-button collapsed p-3 bg-primary text-white" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#recpCollapse" aria-expanded="false" aria-controls="recpCollapse">
                                    <i class="las la-check-circle me-2" style="font-size: 1.5rem;"></i> 
                                    <span class="fw-bold">RECP Compliance</span>
                                </button>
                            </h2>
                            <div id="recpCollapse" class="accordion-collapse collapse" aria-labelledby="recpHeading">
                                <div class="accordion-body">
                                    <div class="card shadow-sm border-0 mb-4">
                                        <div class="card-body">
                                            @if(auth()->guard('admin')->check())
                                                <form id="recp-form">
                                                    <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                                    <div class="mb-3">
                                                        <label for="recpStatus" class="form-label">Select RECP Status</label>
                                                        <select class="form-select" id="recpStatus" name="recp_status" required>
                                                            <option value="" disabled {{ empty($recp_state->status) ? 'selected' : '' }}>Select status</option>
                                                            @foreach(['approved' => 'Approved', 'disapproved' => 'Disapproved', 'pending' => 'Pending'] as $value => $label)
                                                                <option value="{{ $value }}" {{ ($recp_state->status ?? '') === $value ? 'selected' : '' }}>{{ $label }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recpComments" class="form-label">Comments</label>
                                                        <textarea class="form-control" id="recpComments" name="recp_comment" rows="3" placeholder="Enter comments">{{ old('recp_comment', $recp_state->remark ?? '') }}</textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End RECP Approval and Disapproval Section -->
                    @endif
                </div>
            </div>
             <!-- RECP -->
            <div class="tab-pane fade" id="finance" role="tabpanel" aria-labelledby="finance-tab">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-gradient-primary text-white py-3 d-flex align-items-center justify-content-between">
                        <h5 class="mb-0 fw-bold"><i class="las la-wallet me-2"></i>Finance Management</h5>
                    </div>

                    <div class="card-body">
                        <!-- Finance Tabs Navigation -->
                        <ul class="nav nav-pills mb-4 justify-content-center flex-wrap" id="financeTabs" role="tablist">
                            <li class="nav-item m-1" role="presentation">
                                <button class="nav-link active" id="fin-overview-tab" data-bs-toggle="tab"
                                    data-bs-target="#fin-overview" type="button" role="tab" aria-controls="fin-overview"
                                    aria-selected="true"><i class="las la-chart-line me-1"></i> Overview</button>
                            </li>
                            <li class="nav-item m-1" role="presentation">
                                <button class="nav-link" id="fin-income-tab" data-bs-toggle="tab"
                                    data-bs-target="#fin-income" type="button" role="tab" aria-controls="fin-income"
                                    aria-selected="false"><i class="las la-money-bill-wave me-1"></i> Income</button>
                            </li>
                            <li class="nav-item m-1" role="presentation">
                                <button class="nav-link" id="fin-expense-tab" data-bs-toggle="tab"
                                    data-bs-target="#fin-expense" type="button" role="tab" aria-controls="fin-expense"
                                    aria-selected="false"><i class="las la-receipt me-1"></i> Expenses</button>
                            </li>
                            <li class="nav-item m-1" role="presentation">
                                <button class="nav-link" id="fin-budget-tab" data-bs-toggle="tab"
                                    data-bs-target="#fin-budget" type="button" role="tab" aria-controls="fin-budget"
                                    aria-selected="false"><i class="las la-coins me-1"></i> Budgets</button>
                            </li>
                        </ul>

                        <!-- Finance Tab Content -->
                        <div class="tab-content" id="financeTabsContent">
                            <!-- =================== OVERVIEW =================== -->
                            <div class="tab-pane fade show active" id="fin-overview" role="tabpanel" aria-labelledby="fin-overview-tab">
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <div class="card text-center shadow-sm border-0">
                                            <div class="card-body">
                                                <h6 class="text-muted mb-1">Total Revenue</h6>
                                                <h4 class="fw-bold text-success">₦{{ number_format($totalRevenue ?? 0, 2) }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card text-center shadow-sm border-0">
                                            <div class="card-body">
                                                <h6 class="text-muted mb-1">Total Expenses</h6>
                                                <h4 class="fw-bold text-danger">₦{{ number_format($totalExpense ?? 0, 2) }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card text-center shadow-sm border-0">
                                            <div class="card-body">
                                                <h6 class="text-muted mb-1">Profit / Loss</h6>
                                                @php $profit = ($totalRevenue ?? 0) - ($totalExpense ?? 0); @endphp
                                                <h4 class="fw-bold {{ $profit >= 0 ? 'text-success' : 'text-danger' }}">
                                                    ₦{{ number_format($profit, 2) }}
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card text-center shadow-sm border-0">
                                            <div class="card-body">
                                                <h6 class="text-muted mb-1">Active Budgets</h6>
                                                <h4 class="fw-bold text-primary">{{ $activeBudgets ?? 0 }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <canvas id="financeChart" height="100"></canvas>
                                </div>
                            </div>

                            <!-- =================== INCOME =================== -->
                            <div class="tab-pane fade" id="fin-income" role="tabpanel" aria-labelledby="fin-income-tab">
                                <form method="POST" action="" class="card shadow-sm border-0 mb-3">
                                    @csrf
                                    <div class="card-header bg-light fw-semibold">
                                        <i class="las la-plus-circle me-1"></i> Record New Income
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <label class="form-label fw-semibold">Source</label>
                                                <input type="text" name="source" class="form-control" placeholder="Sales, Investment, etc.">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-semibold">Amount (₦)</label>
                                                <input type="number" name="amount" step="0.01" class="form-control" placeholder="0.00">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-semibold">Date</label>
                                                <input type="date" name="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="text-end mt-3">
                                            <button class="btn btn-primary btn-sm px-3"><i class="las la-save me-1"></i> Save Income</button>
                                        </div>
                                    </div>
                                </form>

                                <div class="table-responsive">
                                    <table class="table table-striped align-middle">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Source</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($incomes as $income)
                                                <tr>
                                                    <td>{{ $income->source }}</td>
                                                    <td>₦{{ number_format($income->amount, 2) }}</td>
                                                    <td>{{ $income->date->format('d M Y') }}</td>
                                                    <td class="text-end">
                                                        <button class="btn btn-sm btn-outline-primary"><i class="las la-edit"></i></button>
                                                        <button class="btn btn-sm btn-outline-danger"><i class="las la-trash"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- =================== EXPENSES =================== -->
                            <div class="tab-pane fade" id="fin-expense" role="tabpanel" aria-labelledby="fin-expense-tab">
                                <form method="POST" action="" class="card shadow-sm border-0 mb-3">
                                    @csrf
                                    <div class="card-header bg-light fw-semibold">
                                        <i class="las la-plus me-1"></i> Record Expense
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <label class="form-label fw-semibold">Category</label>
                                                <input type="text" name="category" class="form-control" placeholder="Utilities, Rent, etc.">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-semibold">Amount (₦)</label>
                                                <input type="number" name="amount" step="0.01" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-semibold">Date</label>
                                                <input type="date" name="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="text-end mt-3">
                                            <button class="btn btn-primary btn-sm px-3"><i class="las la-save me-1"></i> Save Expense</button>
                                        </div>
                                    </div>
                                </form>

                                <div class="table-responsive">
                                    <table class="table table-hover align-middle">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Category</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($expenses as $expense)
                                                <tr>
                                                    <td>{{ $expense->category }}</td>
                                                    <td>₦{{ number_format($expense->amount, 2) }}</td>
                                                    <td>{{ $expense->date->format('d M Y') }}</td>
                                                    <td class="text-end">
                                                        <button class="btn btn-sm btn-outline-primary"><i class="las la-edit"></i></button>
                                                        <button class="btn btn-sm btn-outline-danger"><i class="las la-trash"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- =================== BUDGETS =================== -->
                            <div class="tab-pane fade" id="fin-budget" role="tabpanel" aria-labelledby="fin-budget-tab">
                                <div class="alert alert-info">
                                    Budget planning, allocation and monitoring tools will appear here.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- HRMS -->
            <div class="tab-pane fade" id="hr" role="tabpanel">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Human Resources</h4>
                    </div>
                    <div class="card-body">
                        <!-- HR Sub Tabs -->
                        <ul class="nav nav-tabs mb-3" id="hrSubTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="hr-overview-tab" data-bs-toggle="tab" data-bs-target="#hr-overview" type="button" role="tab">
                                    <i class="la la-tachometer-alt"></i> Overview
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="department-tab" data-bs-toggle="tab" data-bs-target="#department" type="button" role="tab">
                                    <i class="la la-user-plus"></i> Departments & Recruitment
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="employees-tab" data-bs-toggle="tab" data-bs-target="#employees" type="button" role="tab">
                                    <i class="la la-users"></i> Employees
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="training-tab" data-bs-toggle="tab" data-bs-target="#training" type="button" role="tab">
                                    <i class="la la-graduation-cap"></i> Training & Development
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="performance-tab" data-bs-toggle="tab" data-bs-target="#performance" type="button" role="tab">
                                    <i class="la la-chart-bar"></i> Performance
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="welfare-tab" data-bs-toggle="tab" data-bs-target="#welfare" type="button" role="tab">
                                    <i class="la la-heart"></i> Welfare
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content" id="hrSubTabContent">
                            <div class="tab-pane fade show active" id="hr-overview" role="tabpanel" aria-labelledby="hr-overview-tab">
                                <h5 class="section-heading mb-3">HR Overview</h5>
                                <p>Summary of HR activities, employee statistics, and key performance indicators.</p>
                            </div>
                            <div class="tab-pane fade" id="department" role="tabpanel" aria-labelledby="department-tab">
                                <h5 class="section-heading mb-3">Departments & Recruitment</h5>
                                <p class="text-muted">Manage company departments, job postings, and recruitment processes.</p>

                                <!-- Inner Tabs -->
                                <ul class="nav nav-tabs" id="departmentRecruitmentTabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="departments-subtab" data-bs-toggle="tab"
                                            data-bs-target="#departments" type="button" role="tab" aria-controls="departments"
                                            aria-selected="true">
                                            <i class="bi bi-diagram-3"></i> Departments
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="recruitment-subtab" data-bs-toggle="tab"
                                            data-bs-target="#recruitment" type="button" role="tab" aria-controls="recruitment"
                                            aria-selected="false">
                                            <i class="bi bi-person-badge"></i> Recruitment
                                        </button>
                                    </li>
                                </ul>

                                <!-- Inner Tab Content -->
                                <div class="tab-content mt-3" id="departmentRecruitmentTabsContent">
                                    <!-- Departments Tab -->
                                    <div class="tab-pane fade show active" id="departments" role="tabpanel"
                                        aria-labelledby="departments-subtab">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h6 class="mb-0">Departments</h6>
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addDepartmentModal">
                                                <i class="la la-plus-circle"></i> Add Department
                                            </button>
                                        </div>

                                        <table class="table table-hover table-stripped rounded shadow-sm align-middle w-100" id="tbl-departments">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Manager</th>
                                                    <th>Employees</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                        <div class="empty-state d-none" id="emptyItems">
                                            <img src="{{ asset('adminAssets/images/illustrate/addItem.svg') }}" alt="No waste items">
                                            <h5 class="mt-3">No waste items yet</h5>
                                            <p>Create waste items to start tracking materials and quantities.</p>
                                            <button class="btn btn-gradient" id="addItemEmpty">Add Waste Item</button>
                                        </div>
                                    </div>

                                    <!-- Recruitment Tab -->
                                    <div class="tab-pane fade" id="recruitment" role="tabpanel"
                                        aria-labelledby="recruitment-subtab">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h6 class="mb-0">Job Postings</h6>
                                            <button class="btn btn-sm btn-primary">
                                                <i class="bi bi-plus-circle"></i> Add Job Posting
                                            </button>
                                        </div>

                                        <table class="table table-striped table-hover align-middle">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Job Title</th>
                                                    <th>Department</th>
                                                    <th>Status</th>
                                                    <th>Applicants</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Software Engineer</td>
                                                    <td>IT Department</td>
                                                    <td><span class="badge bg-info">Open</span></td>
                                                    <td>15</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-eye"></i></button>
                                                        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>HR Assistant</td>
                                                    <td>Human Resources</td>
                                                    <td><span class="badge bg-secondary">Closed</span></td>
                                                    <td>22</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-eye"></i></button>
                                                        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Employees Tab -->
                            <div class="tab-pane fade" id="employees" role="tabpanel" aria-labelledby="employees-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div class="">
                                                <h5 class="section-heading mb-3">Employee Management</h5>
                                                <p>Overview of all employees, departments, and job roles.</p>
                                            </div>
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">
                                                <i class="las la-user-plus me-1"></i> Add Employee
                                            </button>
                                        </div>
                                        <table class="table table-striped mb-0" id="tbl-employees">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Department</th>
                                                    <th class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Training Tab -->
                            <div class="tab-pane fade" id="training" role="tabpanel" aria-labelledby="training-tab">
                                <h5 class="section-heading mb-3">Training & Development</h5>
                                <ul class="list-group">
                                    @foreach($trainings as $training)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <strong>{{ $training->title }}</strong> <br>
                                                <small>{{ $training->description }}</small>
                                            </div>
                                            <span class="badge bg-success">{{ \Carbon\Carbon::parse($training->date)->format('M Y') }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Performance Tab -->
                            <div class="tab-pane fade" id="performance" role="tabpanel" aria-labelledby="performance-tab">
                                <h5 class="section-heading mb-3">Performance Appraisal</h5>
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Employee</th>
                                            <th>Score</th>
                                            <th>Period</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($performances as $perf)
                                            <tr>
                                                <td>{{ $perf->employee->name }}</td>
                                                <td><span class="badge bg-info">{{ $perf->score }}%</span></td>
                                                <td>{{ $perf->period }}</td>
                                                <td>{{ $perf->remarks }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Welfare Tab -->
                            <div class="tab-pane fade" id="welfare" role="tabpanel" aria-labelledby="welfare-tab">
                                <h5 class="section-heading mb-3">Employee Welfare</h5>
                                <div class="list-group">
                                    @foreach($welfarePrograms as $program)
                                        <a href="#" class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h6 class="mb-1">{{ $program->title }}</h6>
                                                <small class="text-muted">{{ \Carbon\Carbon::parse($program->created_at)->diffForHumans() }}</small>
                                            </div>
                                            <p class="mb-1">{{ $program->description }}</p>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="inventory" role="tabpanel">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-light border-bottom-0">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <h4 class="card-title mb-0">
                                <i class="la la-box text-primary me-2"></i>Inventory Management
                            </h4>

                            <ul class="nav nav-pills mt-2 mt-md-0" id="inventoryTabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="inv-general-tab" data-bs-toggle="tab" href="#inv-general"
                                        role="tab" aria-controls="inv-general" aria-selected="true">
                                        <i class="la la-warehouse me-1"></i>General
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="inv-chemical-tab" data-bs-toggle="tab" href="#inv-chemical"
                                        role="tab" aria-controls="inv-chemical" aria-selected="false">
                                        <i class="la la-flask me-1"></i>Chemicals
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="inv-water-tab" data-bs-toggle="tab" href="#inv-water"
                                        role="tab" aria-controls="inv-water" aria-selected="false">
                                        <i class="la la-tint me-1"></i>Water
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="inv-equipment-tab" data-bs-toggle="tab" href="#inv-equipment"
                                        role="tab" aria-controls="inv-equipment" aria-selected="false">
                                        <i class="la la-cogs me-1"></i>Equipment
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="inv-raw-tab" data-bs-toggle="tab" href="#inv-raw"
                                        role="tab" aria-controls="inv-raw" aria-selected="false">
                                        <i class="la la-cube me-1"></i>Raw Materials
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#productsInventory" role="tab">
                                        <i class="la la-box-open"></i> Products
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="tab-content" id="inventoryTabsContent">

                            <!-- 🌐 GENERAL INVENTORY -->
                            <div class="tab-pane fade show active" id="inv-general" role="tabpanel">
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <div class="card bg-light text-center p-3">
                                            <h6 class="text-muted">Total Items</h6>
                                            <h3 class="fw-bold text-primary">0</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card bg-light text-center p-3">
                                            <h6 class="text-muted">Low Stock</h6>
                                            <h3 class="fw-bold text-warning">{{ $lowStockCount ?? 0 }}</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card bg-light text-center p-3">
                                            <h6 class="text-muted">Out of Stock</h6>
                                            <h3 class="fw-bold text-danger">{{ $outOfStockCount ?? 0 }}</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card bg-light text-center p-3">
                                            <h6 class="text-muted">Active Categories</h6>
                                            <h3 class="fw-bold text-success">{{ $activeCategories ?? 0 }}</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="mb-0"><i class="la la-list me-1 text-primary"></i>Inventory List</h5>
                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addGeneralModal"><i class="la la-plus-circle me-1"></i>Add Item</button>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped table-hover align-middle" id="generalTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Item</th>
                                                <th>Category</th>
                                                <th>Quantity</th>
                                                <th>Unit</th>
                                                <th>Status</th>
                                                <th>Updated</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($generalItems as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->category }}</td>
                                                    <td>{{ $item->quantity }}</td>
                                                    <td>{{ $item->unit }}</td>
                                                    <td>
                                                        @if($item->quantity == 0)
                                                            <span class="badge bg-danger">Out of Stock</span>
                                                        @elseif($item->quantity < 10)
                                                            <span class="badge bg-warning">Low</span>
                                                        @else
                                                            <span class="badge bg-success">In Stock</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->updated_at->diffForHumans() }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- ⚗️ CHEMICAL INVENTORY -->
                            <div class="tab-pane fade" id="inv-chemical" role="tabpanel">
                                <div class="d-flex justify-content-between mb-3 align-items-center">
                                    <h5><i class="la la-flask text-primary me-1"></i>Chemical Inventory</h5>
                                    <button class="btn btn-sm btn-outline-primary" onclick="openChemicalModal('add')">
                                        <i class="la la-plus-circle me-1"></i> Add Chemical
                                    </button>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped" id="chemicalTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Quantity</th>
                                                <th>Unit</th>
                                                <th>Hazardous</th>
                                                <th>Storage</th>
                                                <th>Updated</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($chemicalItems as $chem)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $chem->name }}</td>
                                                    <td>{{ $chem->type }}</td>
                                                    <td>{{ $chem->quantity }}</td>
                                                    <td>{{ $chem->unit }}</td>
                                                    <td>
                                                        <span class="badge {{ $chem->is_hazardous ? 'bg-danger' : 'bg-success' }}">
                                                            {{ $chem->is_hazardous ? 'Yes' : 'No' }}
                                                        </span>
                                                    </td>
                                                    <td>{{ $chem->storage_location }}</td>
                                                    <td>{{ $chem->updated_at->diffForHumans() }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- 💧 WATER INVENTORY -->
                            <div class="tab-pane fade" id="inv-water" role="tabpanel">
                                <div class="d-flex justify-content-between mb-3 align-items-center">
                                    <h5><i class="la la-tint text-primary me-1"></i>Water Usage</h5>
                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addWaterModal"><i class="la la-plus-circle me-1"></i>Add Record</button>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped" id="waterTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Source</th>
                                                <th>Usage (L)</th>
                                                <th>Recycled (%)</th>
                                                <th>Quality</th>
                                                <th>Updated</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($waterRecords as $w)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ ucfirst($w->source) }}</td>
                                                    <td>{{ $w->usage }}</td>
                                                    <td>{{ $w->recycled_percentage }}%</td>
                                                    <td>{{ ucfirst($w->quality_level) }}</td>
                                                    <td>{{ $w->updated_at->diffForHumans() }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- ⚙️ EQUIPMENT -->
                            <div class="tab-pane fade" id="inv-equipment" role="tabpanel">
                                <div class="d-flex justify-content-between mb-3 align-items-center">
                                    <h5><i class="la la-cogs text-primary me-1"></i>Equipment</h5>
                                    <button class="btn btn-sm btn-outline-primary"><i class="la la-plus-circle me-1"></i>Add Equipment</button>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped" id="equipmentTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Condition</th>
                                                <th>Last Maintenance</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($equipmentList as $eq)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $eq->name }}</td>
                                                    <td>{{ $eq->type }}</td>
                                                    <td>{{ $eq->condition }}</td>
                                                    <td>{{ $eq->last_maintenance->diffForHumans() }}</td>
                                                    <td>
                                                        <span class="badge {{ $eq->is_active ? 'bg-success' : 'bg-secondary' }}">
                                                            {{ $eq->is_active ? 'Active' : 'Inactive' }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- 🧱 RAW MATERIALS -->
                            <div class="tab-pane fade" id="inv-raw" role="tabpanel">
                                <div class="d-flex justify-content-between mb-3 align-items-center">
                                    <h5><i class="la la-cube text-primary me-1"></i>Raw Materials</h5>
                                    <button class="btn btn-sm btn-outline-primary"><i class="la la-plus-circle me-1"></i>Add Material</button>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped" id="rawTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Supplier</th>
                                                <th>Quantity</th>
                                                <th>Unit</th>
                                                <th>Reorder Level</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($rawMaterials as $raw)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $raw->name }}</td>
                                                    <td>{{ $raw->supplier }}</td>
                                                    <td>{{ $raw->quantity }}</td>
                                                    <td>{{ $raw->unit }}</td>
                                                    <td>{{ $raw->reorder_level }}</td>
                                                    <td>
                                                        <span class="badge {{ $raw->quantity <= $raw->reorder_level ? 'bg-warning' : 'bg-success' }}">
                                                            {{ $raw->quantity <= $raw->reorder_level ? 'Reorder' : 'Available' }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Products -->
                            <div class="tab-pane fade" id="productsInventory" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-bordered align-middle">
                                        <thead class="table-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Product Name</th>
                                                <th>SKU</th>
                                                <th>Category</th>
                                                <th>Quantity</th>
                                                <th>Unit</th>
                                                <th>Reorder Level</th>
                                                <th>Last Batch Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($products as $product)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->sku }}</td>
                                                    <td>{{ $product->category }}</td>
                                                    <td>{{ $product->quantity }}</td>
                                                    <td>{{ $product->unit }}</td>
                                                    <td>{{ $product->reorder_level }}</td>
                                                    <td>{{ $product->last_batch_date ? \Carbon\Carbon::parse($product->last_batch_date)->format('M d, Y') : '—' }}</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-primary"><i class="la la-edit"></i></button>
                                                        <button class="btn btn-sm btn-outline-danger"><i class="la la-trash"></i></button>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr><td colspan="9" class="text-center text-muted">No product records found.</td></tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="tab-pane fade" id="operations" role="tabpanel" aria-labelledby="operations-tab">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold text-primary mb-0"><i class="la la-cogs me-2"></i>Operations Management</h5>
                    <button class="btn btn-gradient btn-sm" data-bs-toggle="modal" data-bs-target="#addOperationModal">
                        <i class="la la-plus me-1"></i> New Operation
                    </button>
                </div>

                <div class="card card-wm mb-3">
                    <div class="card-body">
                        <ul class="nav nav-pills nav-wm mb-3" id="operationTabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#op-overview" role="tab">
                                    <i class="la la-chart-bar d-block"></i>
                                    Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#annualPlan">
                                    <i class="la la-calendar d-block"></i>
                                    Annual Plan
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#productionOps" role="tab" aria-selected="true">
                                    <i class="la la-industry d-block"></i>Production
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#op-performance" role="tab">
                                    <i class="la la-tachometer-alt d-block"></i>
                                Performance</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#logisticsOps" role="tab" aria-selected="false">
                                    <i class="la la-truck d-block"></i>Logistics
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#qualityOps" role="tab" aria-selected="false">
                                    <i class="la la-check-circle d-block"></i>Quality Control
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#wasteOps" role="tab" aria-selected="false">
                                    <i class="la la-recycle d-block"></i>Waste Tracking
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#reports" role="tab">
                                    <i class="la la-file-alt d-block"></i>    
                                Reports</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <!-- Overview -->
                            <div class="tab-pane fade show active" id="op-overview" role="tabpanel">
                                <div class="text-muted mb-3">
                                    <p>Manage and monitor your organization’s annual operations, production batches, waste generation, and performance efficiency.</p>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <div class="card text-center shadow-sm border-0 p-3">
                                            <h6 class="text-muted">Total Plans</h6>
                                            <h3 class="fw-bold text-primary">0</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card text-center shadow-sm border-0 p-3">
                                            <h6 class="text-muted">Total Batches</h6>
                                            <h3 class="fw-bold text-primary"></h3>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card text-center shadow-sm border-0 p-3">
                                            <h6 class="text-muted">Avg. Efficiency</h6>
                                            <h3 class="fw-bold text-success">{{ $avg_efficiency ?? '92%' }}</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card text-center shadow-sm border-0 p-3">
                                            <h6 class="text-muted">Total Waste (tons)</h6>
                                            <h3 class="fw-bold text-danger">{{ $total_waste ?? '18.4' }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Annual Plan -->
                            <div class="tab-pane fade" id="annualPlan" role="tabpanel">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
                                        <h5 class="fw-bold text-primary mb-0">Annual Operational Plan</h5>
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addAnnualPlanModal">
                                            <i class="la la-plus-circle me-1"></i> New Annual Plan
                                        </button>
                                    </div>

                                    <div class="card-body">
                                        <table class="table table-hover align-middle table-bordered">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Year</th>
                                                    <th>Expected Operations</th>
                                                    <th>Expected Production (Units)</th>
                                                    <th>Expected Water Usage (m³)</th>
                                                    <th>Expected Waste (kg)</th>
                                                    <th>Expected Chemical Usage (L)</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($annualPlans as $plan)
                                                    <tr>
                                                        <td>{{ $plan->year }}</td>
                                                        <td>{{ $plan->expected_operations }}</td>
                                                        <td>{{ number_format($plan->expected_production) }}</td>
                                                        <td>{{ number_format($plan->expected_water_usage) }}</td>
                                                        <td>{{ number_format($plan->expected_waste_generated) }}</td>
                                                        <td>{{ number_format($plan->expected_chemical_usage) }}</td>
                                                        <td>
                                                            <span class="badge bg-{{ $plan->status === 'active' ? 'success' : 'secondary' }}">
                                                                {{ ucfirst($plan->status) }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                                                    data-bs-target="#editPlanModal-{{ $plan->id }}">
                                                                    <i class="la la-edit"></i>
                                                                </button>
                                                                <button class="btn btn-sm btn-outline-danger">
                                                                    <i class="la la-trash"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <!-- Edit Modal -->
                                                    <div class="modal fade" id="editPlanModal-{{ $plan->id }}" tabindex="-1" aria-labelledby="editPlanLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <form method="POST" action="{{ route('admin.annual-plan.update', $plan->id) }}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title fw-bold">Edit Annual Plan ({{ $plan->year }})</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row g-3">
                                                                            <div class="col-md-6">
                                                                                <label class="form-label fw-semibold">Expected Operations</label>
                                                                                <input type="text" name="expected_operations" value="{{ $plan->expected_operations }}" class="form-control">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label class="form-label fw-semibold">Expected Production (Units)</label>
                                                                                <input type="number" name="expected_production" value="{{ $plan->expected_production }}" class="form-control">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label class="form-label fw-semibold">Expected Water Usage (m³)</label>
                                                                                <input type="number" name="expected_water_usage" value="{{ $plan->expected_water_usage }}" class="form-control">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label class="form-label fw-semibold">Expected Waste Generated (kg)</label>
                                                                                <input type="number" name="expected_waste_generated" value="{{ $plan->expected_waste_generated }}" class="form-control">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label class="form-label fw-semibold">Expected Chemical Usage (L)</label>
                                                                                <input type="number" name="expected_chemical_usage" value="{{ $plan->expected_chemical_usage }}" class="form-control">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label class="form-label fw-semibold">Status</label>
                                                                                <select name="status" class="form-select">
                                                                                    <option value="active" {{ $plan->status == 'active' ? 'selected' : '' }}>Active</option>
                                                                                    <option value="archived" {{ $plan->status == 'archived' ? 'selected' : '' }}>Archived</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary">Update Plan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <tr>
                                                        <td colspan="8" class="text-center text-muted py-4">No annual plans created yet.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- end Annual Plan -->
                            <!-- Production -->
                            <div class="tab-pane fade" id="productionOps" role="tabpanel">
                                <h5 class="section-heading mb-3">Production Management</h5>

                                <!-- Sub-tabs -->
                                <ul class="nav nav-tabs" id="productionSubTabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#prod-overview" role="tab">
                                            <i class="la la-industry me-1"></i>Overview
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#batch-operations" role="tab">
                                            <i class="la la-layer-group me-1"></i>Batch Operations
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="process-tab" data-bs-toggle="tab" href="#production-process" role="tab"
                                            aria-controls="production-process" aria-selected="false">
                                            <i class="la la-cogs me-1"></i>Production Process
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#resource-usage" role="tab">
                                            <i class="la la-flask me-1"></i>Resource Usage
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#production-analytics" role="tab">
                                            <i class="la la-chart-bar me-1"></i>Analytics
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content mt-3">

                                    <!-- OVERVIEW TAB -->
                                    <div class="tab-pane fade show active" id="prod-overview" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="card info-card shadow-sm text-center">
                                                    <div class="card-body">
                                                        <h6 class="text-muted">Annual Output</h6>
                                                        <h3 class="fw-bold text-primary">{{ number_format($productionStats['annual_output'] ?? 0) }}</h3>
                                                        <small class="text-success"><i class="la la-arrow-up"></i> {{ $productionStats['growth_rate'] ?? 0 }}% vs LY</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card info-card shadow-sm text-center">
                                                    <div class="card-body">
                                                        <h6 class="text-muted">Total Batches</h6>
                                                        <h3 class="fw-bold">{{ $productionStats['total_batches'] ?? 0 }}</h3>
                                                        <small class="text-muted">Active: {{ $productionStats['active_batches'] ?? 0 }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card info-card shadow-sm text-center">
                                                    <div class="card-body">
                                                        <h6 class="text-muted">Avg Efficiency</h6>
                                                        <h3 class="fw-bold text-success">{{ $productionStats['efficiency_ratio'] ?? '0.0' }}%</h3>
                                                        <small class="text-muted">Output per Input Unit</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card info-card shadow-sm text-center">
                                                    <div class="card-body">
                                                        <h6 class="text-muted">Waste Generated</h6>
                                                        <h3 class="fw-bold text-danger">{{ number_format($productionStats['waste_generated'] ?? 0) }} kg</h3>
                                                        <small class="text-muted">All batches combined</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- BATCH OPERATIONS -->
                                    <div class="tab-pane fade" id="batch-operations" role="tabpanel">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h5 class="fw-semibold">Batch Operations</h5>
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addBatchModal">
                                                <i class="la la-plus me-1"></i> Add Batch
                                            </button>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table table-hover align-middle">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Batch ID</th>
                                                        <th>Product</th>
                                                        <th>Production Date</th>
                                                        <th>Output</th>
                                                        <th>Waste (kg)</th>
                                                        <th>Water Used (L)</th>
                                                        <th>Chemicals</th>
                                                        <th>Efficiency (%)</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($batches as $batch)
                                                        <tr>
                                                            <td class="fw-bold">{{ $batch->batch_code }}</td>
                                                            <td>{{ $batch->product_name }}</td>
                                                            <td>{{ \Carbon\Carbon::parse($batch->production_date)->format('d M Y') }}</td>
                                                            <td>{{ number_format($batch->output_quantity, 2) }} {{ $batch->unit }}</td>
                                                            <td>{{ number_format($batch->waste_generated, 2) }}</td>
                                                            <td>{{ number_format($batch->water_used, 2) }}</td>
                                                            <td>{{ $batch->chemical_summary }}</td>
                                                            <td class="{{ $batch->efficiency >= 90 ? 'text-success' : 'text-danger' }}">
                                                                {{ number_format($batch->efficiency, 1) }}%
                                                            </td>
                                                            <td>
                                                                <span class="badge bg-{{ $batch->status == 'Completed' ? 'success' : 'warning' }}">
                                                                    {{ ucfirst($batch->status) }}
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="9" class="text-center text-muted py-4">No batch data available.</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- PRODUCTION PROCESS -->
                                    <div class="tab-pane fade" id="production-process" role="tabpanel">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h5 class="fw-semibold">Production Process</h5>
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addProcessModal">
                                                <i class="la la-plus me-1"></i>Add Process Step
                                            </button>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table table-striped align-middle">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Step No.</th>
                                                        <th>Process Name</th>
                                                        <th>Description</th>
                                                        <th>Expected Duration</th>
                                                        <th>Responsible Unit</th>
                                                        <th>Resources Required</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($processes as $step)
                                                        <tr>
                                                            <td>{{ $step->step_number }}</td>
                                                            <td>{{ $step->name }}</td>
                                                            <td>{{ $step->description }}</td>
                                                            <td>{{ $step->expected_duration }} hrs</td>
                                                            <td>{{ $step->responsible_unit }}</td>
                                                            <td>{{ $step->resources_required }}</td>
                                                            <td>
                                                                <span class="badge {{ $step->status == 'Active' ? 'bg-success' : 'bg-secondary' }}">
                                                                    {{ $step->status }}
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="7" class="text-center text-muted">No production process defined yet.</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- RESOURCE USAGE -->
                                    <div class="tab-pane fade" id="resource-usage" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card shadow-sm h-100">
                                                    <div class="card-body">
                                                        <h6 class="fw-semibold mb-3 text-primary"><i class="la la-tint me-1"></i>Water Usage</h6>
                                                        <p>Total Water Used: <strong>{{ number_format($resourceUsage['water_total'] ?? 0) }} L</strong></p>
                                                        <p>Avg Water per Batch: <strong>{{ number_format($resourceUsage['avg_water_per_batch'] ?? 0) }} L</strong></p>
                                                        <p>Efficiency (Output/Litre): <strong>{{ $resourceUsage['efficiency'] ?? 0 }}</strong></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="card shadow-sm h-100">
                                                    <div class="card-body">
                                                        <h6 class="fw-semibold mb-3 text-danger"><i class="la la-flask me-1"></i>Chemical Usage</h6>
                                                        <ul class="list-group">
                                                            @foreach($chemicalUsage as $chemical)
                                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                    {{ $chemical->chemical_name }}
                                                                    <span class="badge bg-secondary">{{ $chemical->quantity_used }} {{ $chemical->unit }}</span>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ANALYTICS -->
                                    <div class="tab-pane fade" id="production-analytics" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card shadow-sm">
                                                    <div class="card-header bg-light">
                                                        <h6 class="fw-bold mb-0"><i class="la la-chart-line me-1"></i>Annual Production Trend</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <canvas id="productionTrendChart" height="150"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card shadow-sm">
                                                    <div class="card-header bg-light">
                                                        <h6 class="fw-bold mb-0"><i class="la la-balance-scale me-1"></i>Efficiency vs Waste Ratio</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <canvas id="efficiencyWasteChart" height="150"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>

                            <!-- Operational Performance -->
                            <div class="tab-pane fade" id="op-performance" role="tabpanel">
                                <div class="card border-0 shadow-sm mb-4">
                                    <div class="card-header bg-white d-flex justify-content-between align-items-center border-bottom">
                                        <h5 class="fw-bold text-primary mb-0">Operational Performance Tracking</h5>
                                        <select id="performanceYear" class="form-select w-auto">
                                            @foreach($years as $year)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="card-body">
                                        <!-- Summary Metrics -->
                                        <div class="row text-center mb-4">
                                            <div class="col-md-3">
                                                <div class="p-3 rounded bg-light shadow-sm">
                                                    <h6 class="text-muted mb-1">Production Efficiency</h6>
                                                    <h4 class="fw-bold text-success">{{ $performance['production_efficiency'] ?? '0' }}%</h4>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="p-3 rounded bg-light shadow-sm">
                                                    <h6 class="text-muted mb-1">Water Efficiency</h6>
                                                    <h4 class="fw-bold text-primary">{{ $performance['water_efficiency'] ?? '0' }}%</h4>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="p-3 rounded bg-light shadow-sm">
                                                    <h6 class="text-muted mb-1">Waste Reduction</h6>
                                                    <h4 class="fw-bold text-danger">{{ $performance['waste_reduction'] ?? '0' }}%</h4>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="p-3 rounded bg-light shadow-sm">
                                                    <h6 class="text-muted mb-1">Chemical Efficiency</h6>
                                                    <h4 class="fw-bold text-info">{{ $performance['chemical_efficiency'] ?? '0' }}%</h4>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Charts -->
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="card shadow-sm border-0 h-100">
                                                    <div class="card-header bg-white border-bottom">
                                                        <h6 class="fw-bold text-primary mb-0">Production: Planned vs Actual</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <canvas id="productionChart" height="150"></canvas>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <div class="card shadow-sm border-0 h-100">
                                                    <div class="card-header bg-white border-bottom">
                                                        <h6 class="fw-bold text-primary mb-0">Water Usage: Planned vs Actual</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <canvas id="waterChart" height="150"></canvas>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <div class="card shadow-sm border-0 h-100">
                                                    <div class="card-header bg-white border-bottom">
                                                        <h6 class="fw-bold text-primary mb-0">Waste Generation by Category</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <canvas id="wasteChart" height="150"></canvas>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <div class="card shadow-sm border-0 h-100">
                                                    <div class="card-header bg-white border-bottom">
                                                        <h6 class="fw-bold text-primary mb-0">Chemical Usage per Batch</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <canvas id="chemicalChart" height="150"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Efficiency Ratios -->
                                        <div class="card border-0 shadow-sm">
                                            <div class="card-header bg-white border-bottom">
                                                <h6 class="fw-bold text-primary mb-0">Efficiency Ratios</h6>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-striped align-middle">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th>Metric</th>
                                                            <th>Planned</th>
                                                            <th>Actual</th>
                                                            <th>Efficiency (%)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Output per Water Unit</td>
                                                            <td>{{ number_format($efficiency['planned_output_per_water'] ?? 0, 2) }}</td>
                                                            <td>{{ number_format($efficiency['actual_output_per_water'] ?? 0, 2) }}</td>
                                                            <td>{{ number_format($efficiency['eff_output_per_water'] ?? 0, 2) }}%</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Output per Chemical Unit</td>
                                                            <td>{{ number_format($efficiency['planned_output_per_chemical'] ?? 0, 2) }}</td>
                                                            <td>{{ number_format($efficiency['actual_output_per_chemical'] ?? 0, 2) }}</td>
                                                            <td>{{ number_format($efficiency['eff_output_per_chemical'] ?? 0, 2) }}%</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Waste per Production Unit</td>
                                                            <td>{{ number_format($efficiency['planned_waste_per_unit'] ?? 0, 2) }}</td>
                                                            <td>{{ number_format($efficiency['actual_waste_per_unit'] ?? 0, 2) }}</td>
                                                            <td>{{ number_format($efficiency['eff_waste_per_unit'] ?? 0, 2) }}%</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end operational performance -->
                            <!-- Logistics -->
                            <div class="tab-pane fade" id="logisticsOps" role="tabpanel">
                                <h5 class="section-heading mb-3">Logistics & Supply Chain Management</h5>

                                <!-- Logistics Sub Tabs -->
                                <ul class="nav nav-tabs" id="logisticsSubTabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="log-overview-tab" data-bs-toggle="tab" href="#log-overview" role="tab" aria-selected="true">
                                            <i class="la la-truck me-1"></i>Overview
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="transport-tab" data-bs-toggle="tab" href="#transport" role="tab" aria-selected="false">
                                            <i class="la la-road me-1"></i>Transport Records
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="fuel-tab" data-bs-toggle="tab" href="#fuel" role="tab" aria-selected="false">
                                            <i class="la la-gas-pump me-1"></i>Fuel Usage
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="supply-tab" data-bs-toggle="tab" href="#supply" role="tab" aria-selected="false">
                                            <i class="la la-boxes me-1"></i>Supply Chain
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content mt-3" id="logisticsSubTabsContent">
                                    <!-- OVERVIEW -->
                                    <div class="tab-pane fade show active" id="log-overview" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="card info-card shadow-sm">
                                                    <div class="card-body">
                                                        <h6 class="text-muted">Total Deliveries (Annual)</h6>
                                                        <h3 class="fw-bold">{{ $logisticsStats['total_deliveries'] ?? 0 }}</h3>
                                                        <small class="text-success"><i class="la la-arrow-up"></i> +{{ $logisticsStats['delivery_growth'] ?? 0 }}%</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="card info-card shadow-sm">
                                                    <div class="card-body">
                                                        <h6 class="text-muted">Fuel Efficiency</h6>
                                                        <h3 class="fw-bold">{{ $logisticsStats['fuel_efficiency'] ?? 0 }} km/L</h3>
                                                        <small class="text-muted">Average across fleet</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="card info-card shadow-sm">
                                                    <div class="card-body">
                                                        <h6 class="text-muted">Total Distance Covered</h6>
                                                        <h3 class="fw-bold">{{ number_format($logisticsStats['total_distance'] ?? 0) }} km</h3>
                                                        <small class="text-primary">All vehicles combined</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- TRANSPORT RECORDS -->
                                    <div class="tab-pane fade" id="transport" role="tabpanel">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h5 class="fw-semibold">Transport Records</h5>
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addTransportModal">
                                                <i class="la la-plus me-1"></i>Add Record
                                            </button>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table table-striped align-middle">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Vehicle</th>
                                                        <th>Driver</th>
                                                        <th>From</th>
                                                        <th>To</th>
                                                        <th>Distance (km)</th>
                                                        <th>Fuel Used (L)</th>
                                                        <th>Goods</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($transportRecords as $record)
                                                        <tr>
                                                            <td>{{ \Carbon\Carbon::parse($record->date)->format('d M, Y') }}</td>
                                                            <td>{{ $record->vehicle_name }}</td>
                                                            <td>{{ $record->driver_name }}</td>
                                                            <td>{{ $record->from_location }}</td>
                                                            <td>{{ $record->to_location }}</td>
                                                            <td>{{ $record->distance }}</td>
                                                            <td>{{ $record->fuel_used }}</td>
                                                            <td>{{ $record->goods }}</td>
                                                            <td>
                                                                <span class="badge {{ $record->status == 'Delivered' ? 'bg-success' : 'bg-warning' }}">
                                                                    {{ $record->status }}
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="9" class="text-center text-muted">No transport records yet.</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- FUEL USAGE -->
                                    <div class="tab-pane fade" id="fuel" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card shadow-sm">
                                                    <div class="card-body">
                                                        <h6 class="fw-semibold mb-3"><i class="la la-gas-pump me-1 text-danger"></i>Fuel Usage Summary</h6>
                                                        <p>Total Fuel Used (Annual): <strong>{{ number_format($fuelStats['total_fuel'] ?? 0) }} L</strong></p>
                                                        <p>Average Fuel/Trip: <strong>{{ $fuelStats['avg_per_trip'] ?? 0 }} L</strong></p>
                                                        <p>Cost Efficiency: <strong>${{ $fuelStats['cost_efficiency'] ?? 0 }} /km</strong></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="card shadow-sm">
                                                    <div class="card-body">
                                                        <h6 class="fw-semibold mb-3"><i class="la la-truck-loading me-1 text-primary"></i>Top Performing Vehicles</h6>
                                                        <ul class="list-group">
                                                            @foreach($topVehicles as $vehicle)
                                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                    {{ $vehicle->vehicle_name }}
                                                                    <span class="badge bg-secondary">{{ $vehicle->efficiency }} km/L</span>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- SUPPLY CHAIN -->
                                    <div class="tab-pane fade" id="supply" role="tabpanel">
                                        <h5 class="fw-semibold mb-3">Supply Chain Activities</h5>
                                        <p class="text-muted">Track inbound and outbound supply chain operations, including suppliers, materials received, and delivery performance.</p>
                                        <div class="table-responsive">
                                            <table class="table table-hover align-middle">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Supplier</th>
                                                        <th>Material</th>
                                                        <th>Quantity</th>
                                                        <th>Delivery Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($supplyChain as $supply)
                                                        <tr>
                                                            <td>{{ \Carbon\Carbon::parse($supply->date)->format('d M, Y') }}</td>
                                                            <td>{{ $supply->supplier_name }}</td>
                                                            <td>{{ $supply->material }}</td>
                                                            <td>{{ $supply->quantity }} {{ $supply->unit }}</td>
                                                            <td>
                                                                <span class="badge {{ $supply->status == 'Delivered' ? 'bg-success' : 'bg-warning' }}">
                                                                    {{ $supply->status }}
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr><td colspan="5" class="text-center text-muted">No supply records found.</td></tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- ADD TRANSPORT MODAL -->
                                <div class="modal fade" id="addTransportModal" tabindex="-1" aria-labelledby="addTransportModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <form method="POST" action="">
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addTransportModalLabel">Add Transport Record</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <label class="form-label">Vehicle</label>
                                                            <input type="text" name="vehicle_name" class="form-control" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Driver Name</label>
                                                            <input type="text" name="driver_name" class="form-control" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">From</label>
                                                            <input type="text" name="from_location" class="form-control">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">To</label>
                                                            <input type="text" name="to_location" class="form-control">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label">Distance (km)</label>
                                                            <input type="number" name="distance" step="0.1" class="form-control">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label">Fuel Used (L)</label>
                                                            <input type="number" name="fuel_used" step="0.1" class="form-control">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label">Goods</label>
                                                            <input type="text" name="goods" class="form-control">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="form-label">Status</label>
                                                            <select name="status" class="form-select">
                                                                <option value="In Transit">In Transit</option>
                                                                <option value="Delivered">Delivered</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Save Record</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Quality Control -->
                            <div class="tab-pane fade" id="qualityOps" role="tabpanel">
                                <h5 class="section-heading mb-3">Quality Control & Assurance</h5>

                                <!-- Sub-tabs for QC -->
                                <ul class="nav nav-tabs" id="qcSubTabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="qc-overview-tab" data-bs-toggle="tab" href="#qc-overview" role="tab" aria-selected="true">
                                            <i class="la la-chart-bar me-1"></i>Overview
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="inspection-tab" data-bs-toggle="tab" href="#qc-inspections" role="tab" aria-selected="false">
                                            <i class="la la-search me-1"></i>Inspections
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="defects-tab" data-bs-toggle="tab" href="#qc-defects" role="tab" aria-selected="false">
                                            <i class="la la-times-circle me-1"></i>Defects
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="actions-tab" data-bs-toggle="tab" href="#qc-actions" role="tab" aria-selected="false">
                                            <i class="la la-tools me-1"></i>Corrective Actions
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content mt-3" id="qcSubTabsContent">
                                    <!-- OVERVIEW -->
                                    <div class="tab-pane fade show active" id="qc-overview" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="card info-card shadow-sm">
                                                    <div class="card-body">
                                                        <h6 class="text-muted">Inspections Completed</h6>
                                                        <h3 class="fw-bold">{{ $qcStats['inspections_done'] ?? 0 }}</h3>
                                                        <small class="text-success"><i class="la la-arrow-up"></i> +{{ $qcStats['inspection_growth'] ?? 0 }}% from last year</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="card info-card shadow-sm">
                                                    <div class="card-body">
                                                        <h6 class="text-muted">Defect Rate</h6>
                                                        <h3 class="fw-bold text-danger">{{ $qcStats['defect_rate'] ?? '0.0' }}%</h3>
                                                        <small class="text-muted">Target: <strong>{{ $qcStats['defect_target'] ?? '2.0' }}%</strong></small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="card info-card shadow-sm">
                                                    <div class="card-body">
                                                        <h6 class="text-muted">Customer Complaints Resolved</h6>
                                                        <h3 class="fw-bold">{{ $qcStats['complaints_resolved'] ?? 0 }}</h3>
                                                        <small class="text-primary">{{ $qcStats['complaint_resolution_rate'] ?? 0 }}% resolution rate</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- INSPECTIONS -->
                                    <div class="tab-pane fade" id="qc-inspections" role="tabpanel">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h5 class="fw-semibold">Quality Inspections</h5>
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addInspectionModal">
                                                <i class="la la-plus me-1"></i>Add Inspection
                                            </button>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table table-striped align-middle">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Batch</th>
                                                        <th>Inspector</th>
                                                        <th>Product</th>
                                                        <th>Result</th>
                                                        <th>Remarks</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($inspections as $inspection)
                                                        <tr>
                                                            <td>{{ \Carbon\Carbon::parse($inspection->date)->format('d M, Y') }}</td>
                                                            <td>{{ $inspection->batch_code }}</td>
                                                            <td>{{ $inspection->inspector_name }}</td>
                                                            <td>{{ $inspection->product_name }}</td>
                                                            <td>
                                                                <span class="badge {{ $inspection->result == 'Pass' ? 'bg-success' : 'bg-danger' }}">
                                                                    {{ $inspection->result }}
                                                                </span>
                                                            </td>
                                                            <td>{{ $inspection->remarks ?? '-' }}</td>
                                                        </tr>
                                                    @empty
                                                        <tr><td colspan="6" class="text-center text-muted">No inspections recorded yet.</td></tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- DEFECTS -->
                                    <div class="tab-pane fade" id="qc-defects" role="tabpanel">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h5 class="fw-semibold">Defect Tracking</h5>
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addDefectModal">
                                                <i class="la la-plus me-1"></i>Log Defect
                                            </button>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table table-hover align-middle">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Product</th>
                                                        <th>Batch</th>
                                                        <th>Type</th>
                                                        <th>Severity</th>
                                                        <th>Detected By</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($defects as $defect)
                                                        <tr>
                                                            <td>{{ \Carbon\Carbon::parse($defect->date)->format('d M, Y') }}</td>
                                                            <td>{{ $defect->product_name }}</td>
                                                            <td>{{ $defect->batch_code }}</td>
                                                            <td>{{ ucfirst($defect->type) }}</td>
                                                            <td><span class="badge bg-{{ $defect->severity == 'High' ? 'danger' : ($defect->severity == 'Medium' ? 'warning' : 'secondary') }}">{{ $defect->severity }}</span></td>
                                                            <td>{{ $defect->detected_by }}</td>
                                                            <td>
                                                                <span class="badge {{ $defect->status == 'Resolved' ? 'bg-success' : 'bg-warning' }}">
                                                                    {{ $defect->status }}
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr><td colspan="7" class="text-center text-muted">No defects logged yet.</td></tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- CORRECTIVE ACTIONS -->
                                    <div class="tab-pane fade" id="qc-actions" role="tabpanel">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h5 class="fw-semibold">Corrective Actions</h5>
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addActionModal">
                                                <i class="la la-plus me-1"></i>Add Action
                                            </button>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table table-striped align-middle">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Defect</th>
                                                        <th>Action Taken</th>
                                                        <th>Responsible</th>
                                                        <th>Status</th>
                                                        <th>Remarks</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($actions as $action)
                                                        <tr>
                                                            <td>{{ \Carbon\Carbon::parse($action->date)->format('d M, Y') }}</td>
                                                            <td>{{ $action->defect_type }}</td>
                                                            <td>{{ $action->action_taken }}</td>
                                                            <td>{{ $action->responsible_person }}</td>
                                                            <td>
                                                                <span class="badge {{ $action->status == 'Completed' ? 'bg-success' : 'bg-warning' }}">
                                                                    {{ $action->status }}
                                                                </span>
                                                            </td>
                                                            <td>{{ $action->remarks ?? '-' }}</td>
                                                        </tr>
                                                    @empty
                                                        <tr><td colspan="6" class="text-center text-muted">No corrective actions recorded yet.</td></tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Waste Tracking -->
                            <div class="tab-pane fade" id="wasteOps" role="tabpanel">
                                <h5 class="section-heading mb-3">Waste Tracking & Management</h5>

                                <!-- Sub-tabs -->
                                <ul class="nav nav-tabs" id="wasteSubTabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="waste-overview-tab" data-bs-toggle="tab" href="#waste-overview" role="tab" aria-selected="true">
                                            <i class="la la-chart-pie me-1"></i>Overview
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="waste-batch-tab" data-bs-toggle="tab" href="#waste-batch" role="tab" aria-selected="false">
                                            <i class="la la-industry me-1"></i>Batch Waste Records
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="waste-disposal-tab" data-bs-toggle="tab" href="#waste-disposal" role="tab" aria-selected="false">
                                            <i class="la la-dumpster me-1"></i>Treatment & Disposal
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="waste-reports-tab" data-bs-toggle="tab" href="#waste-reports" role="tab" aria-selected="false">
                                            <i class="la la-file-alt me-1"></i>Reports
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content mt-3" id="wasteSubTabsContent">
                                    <!-- OVERVIEW -->
                                    <div class="tab-pane fade show active" id="waste-overview" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="card info-card shadow-sm">
                                                    <div class="card-body">
                                                        <h6 class="text-muted">Total Waste Generated</h6>
                                                        <h3 class="fw-bold">{{ number_format($wasteStats['total_generated'] ?? 0, 2) }} tons</h3>
                                                        <small class="text-muted">Year: {{ date('Y') }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card info-card shadow-sm">
                                                    <div class="card-body">
                                                        <h6 class="text-muted">Hazardous Waste</h6>
                                                        <h3 class="fw-bold text-danger">{{ number_format($wasteStats['hazardous'] ?? 0, 2) }} tons</h3>
                                                        <small class="text-muted">{{ $wasteStats['hazardous_percent'] ?? 0 }}% of total</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card info-card shadow-sm">
                                                    <div class="card-body">
                                                        <h6 class="text-muted">Non-Hazardous Waste</h6>
                                                        <h3 class="fw-bold text-success">{{ number_format($wasteStats['non_hazardous'] ?? 0, 2) }} tons</h3>
                                                        <small class="text-muted">{{ $wasteStats['non_hazardous_percent'] ?? 0 }}% of total</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card info-card shadow-sm">
                                                    <div class="card-body">
                                                        <h6 class="text-muted">Recycling Efficiency</h6>
                                                        <h3 class="fw-bold text-primary">{{ $wasteStats['recycle_rate'] ?? 0 }}%</h3>
                                                        <small class="text-success">Goal: 80%</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- BATCH WASTE RECORDS -->
                                    <div class="tab-pane fade" id="waste-batch" role="tabpanel">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h5 class="fw-semibold">Batch Waste Records</h5>
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addWasteModal">
                                                <i class="la la-plus me-1"></i>Add Record
                                            </button>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table table-striped align-middle">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Batch</th>
                                                        <th>Category</th>
                                                        <th>Waste Type</th>
                                                        <th>Quantity</th>
                                                        <th>Unit</th>
                                                        <th>Disposal Method</th>
                                                        <th>Generated By</th>
                                                        <th>Remarks</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($batchWastes as $waste)
                                                        <tr>
                                                            <td>{{ \Carbon\Carbon::parse($waste->date)->format('d M, Y') }}</td>
                                                            <td>{{ $waste->batch_code }}</td>
                                                            <td>
                                                                <span class="badge {{ $waste->is_hazardous ? 'bg-danger' : 'bg-success' }}">
                                                                    {{ $waste->is_hazardous ? 'Hazardous' : 'Non-Hazardous' }}
                                                                </span>
                                                            </td>
                                                            <td>{{ $waste->waste_type }}</td>
                                                            <td>{{ number_format($waste->quantity, 2) }}</td>
                                                            <td>{{ $waste->unit }}</td>
                                                            <td>{{ $waste->disposal_method }}</td>
                                                            <td>{{ $waste->generated_by }}</td>
                                                            <td>{{ $waste->remarks ?? '-' }}</td>
                                                        </tr>
                                                    @empty
                                                        <tr><td colspan="9" class="text-center text-muted">No batch waste recorded yet.</td></tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- TREATMENT & DISPOSAL -->
                                    <div class="tab-pane fade" id="waste-disposal" role="tabpanel">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h5 class="fw-semibold">Waste Treatment & Disposal</h5>
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addDisposalModal">
                                                <i class="la la-plus me-1"></i>Add Disposal Record
                                            </button>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table table-hover align-middle">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Waste Type</th>
                                                        <th>Quantity</th>
                                                        <th>Method</th>
                                                        <th>Disposal Site</th>
                                                        <th>Handled By</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($disposals as $disposal)
                                                        <tr>
                                                            <td>{{ \Carbon\Carbon::parse($disposal->date)->format('d M, Y') }}</td>
                                                            <td>{{ $disposal->waste_type }}</td>
                                                            <td>{{ number_format($disposal->quantity, 2) }}</td>
                                                            <td>{{ $disposal->method }}</td>
                                                            <td>{{ $disposal->disposal_site }}</td>
                                                            <td>{{ $disposal->handled_by }}</td>
                                                            <td>
                                                                <span class="badge {{ $disposal->status == 'Completed' ? 'bg-success' : 'bg-warning' }}">
                                                                    {{ $disposal->status }}
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr><td colspan="7" class="text-center text-muted">No disposal data recorded yet.</td></tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- REPORTS -->
                                    <div class="tab-pane fade" id="waste-reports" role="tabpanel">
                                        <h5 class="fw-semibold mb-3">Annual Waste Reports</h5>
                                        <div class="card">
                                            <div class="card-body">
                                                <p>Generate summary and analytics for waste generation, treatment, and compliance per year.</p>
                                                <form class="row g-3">
                                                    <div class="col-md-4">
                                                        <label class="form-label">Select Year</label>
                                                        <select class="form-select">
                                                            <option value="">-- Choose Year --</option>
                                                            @for ($i = date('Y'); $i >= date('Y') - 5; $i--)
                                                                <option value="{{ $i }}">{{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 align-self-end">
                                                        <button type="button" class="btn btn-primary">
                                                            <i class="la la-file-alt me-1"></i>Generate Report
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="reports" role="tabpanel" aria-labelledby="reports-tab">
                                <h5 class="section-heading mb-3">Reports & Analytics</h5>
                                <p>Comprehensive operational performance reports, environmental tracking, and yearly insights.</p>

                                <div class="row g-3 mt-4">
                                    <div class="col-md-4">
                                        <div class="card shadow-sm border-0">
                                            <div class="card-body">
                                                <h6 class="fw-semibold"><i class="la la-chart-area text-primary me-1"></i> Annual Performance</h6>
                                                <p class="text-muted small mb-2">Compare expected vs actual production, waste, and resource use per year.</p>
                                                <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#annualPerformanceReportModal">View Report</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card shadow-sm border-0">
                                            <div class="card-body">
                                                <h6 class="fw-semibold"><i class="la la-industry text-success me-1"></i> Waste Analytics</h6>
                                                <p class="text-muted small mb-2">Breakdown of waste generation by category, batch, and disposal type.</p>
                                                <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#wasteAnalyticsModal">View Report</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card shadow-sm border-0">
                                            <div class="card-body">
                                                <h6 class="fw-semibold"><i class="la la-flask text-warning me-1"></i> Chemical Usage & Efficiency</h6>
                                                <p class="text-muted small mb-2">Track chemical consumption and calculate operational efficiency ratios.</p>
                                                <button class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#chemicalEfficiencyModal">View Report</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                <div class="card card-wm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="la la-cog me-2"></i>General Settings</h5>
                    </div>
                    <div class="card-body">
                        <form id="companySettingsForm" method="POST" action="">
                            @csrf
                            @method('PUT')

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Company Name</label>
                                    <input type="text" name="company_name" class="form-control" value="{{ $company->company_name }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Industry</label>
                                    <input type="text" name="industry" class="form-control" value="{{ $company->industry }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $company->email }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Website URL</label>
                                    <input type="url" name="website_url" class="form-control" value="{{ $company->website_url }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Primary Phone</label>
                                    <input type="text" name="primary_phone_number" class="form-control" value="{{ $company->primary_phone_number }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Secondary Phone</label>
                                    <input type="text" name="secondary_phone_number" class="form-control" value="{{ $company->secondary_phone_number }}">
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-semibold">Address</label>
                                    <textarea name="address" class="form-control" rows="2">{{ $company->address }}</textarea>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">City</label>
                                    <input type="text" name="city" class="form-control" value="{{ $company->city }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">State</label>
                                    <input type="text" name="state" class="form-control" value="{{ $company->state }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Country</label>
                                    <input type="text" name="country" class="form-control" value="{{ $company->country }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Time Zone</label>
                                    <select name="time_zone" class="form-select">
                                        @foreach(timezone_identifiers_list() as $tz)
                                            <option value="{{ $tz }}" {{ $company->time_zone == $tz ? 'selected' : '' }}>{{ $tz }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Fiscal Year Start</label>
                                    <input type="month" name="fiscal_year_start" class="form-control" value="{{ $company->fiscal_year_start }}">
                                </div>
                            </div>

                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-gradient"><i class="la la-save me-1"></i> Save Settings</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Preferences -->
                <div class="card card-wm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="la la-sliders-h me-2"></i>Preferences</h5>
                    </div>
                    <div class="card-body">
                        <form id="preferencesForm">
                            <div class="row align-items-center g-3">
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Theme Mode</label>
                                    <select class="form-select" name="theme_mode">
                                        <option value="light">Light</option>
                                        <option value="dark">Dark</option>
                                        <option value="auto">Auto</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Language</label>
                                    <select class="form-select" name="language">
                                        <option value="en">English</option>
                                        <option value="fr">French</option>
                                        <option value="es">Spanish</option>
                                        <option value="de">German</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Data Display Format</label>
                                    <select class="form-select" name="data_format">
                                        <option value="metric">Metric (kg, m³)</option>
                                        <option value="imperial">Imperial (lb, gal)</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Notifications -->
                <div class="card card-wm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="la la-bell me-2"></i>Notifications</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="emailNotifications" checked>
                                    <label class="form-check-label" for="emailNotifications">Email Alerts</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="smsNotifications">
                                    <label class="form-check-label" for="smsNotifications">SMS Alerts</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="slackNotifications">
                                    <label class="form-check-label" for="slackNotifications">Slack/Teams Alerts</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Integrations -->
                <div class="card card-wm">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="la la-plug me-2"></i>Integrations & Automation</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted small">Connect external services or automate periodic tasks.</p>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">API Key</label>
                                <input type="text" class="form-control" value="{{ $company->api_key ?? '************' }}" readonly>
                            </div>
                            <div class="col-md-6 text-end">
                                <button class="btn btn-outline-muted btn-sm mt-4"><i class="la la-sync me-1"></i>Regenerate Key</button>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" id="autoSync" checked>
                                    <label class="form-check-label" for="autoSync">Enable Automatic Data Sync (daily)</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @section('modals')
    <!-- Add your modal content here if needed -->
     @include('components.apps.company.modals._annual_plan')
     @include('components.apps.company.modals._batch')
     @include('components.apps.company.modals.qc_modals')
     @include('components.apps.company.modals.waste_modals')
     @include('components.apps.company.modals.report')
     @include('components.apps.company.modals.process_modals')
     @include('components.apps.company.modals.department_modals')
     @include('components.apps.company.modals.employee_modals')
     @include('components.apps.company.modals.chemical_modals')


<!-- --- Edit General Modal (for editing general items) --- -->
<div class="modal fade" id="editGeneralModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-secondary text-white">
        <h5 class="modal-title">Edit Item</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <form id="editGeneralForm">
        @csrf
        @method('PUT')
        <input type="hidden" name="type" value="general">
        <input type="hidden" name="id" id="editGeneralId">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Item Name</label>
            <input id="editGeneralName" type="text" name="name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Category</label>
            <input id="editGeneralCategory" type="text" name="category" class="form-control">
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Quantity</label>
              <input id="editGeneralQty" type="number" name="quantity" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Unit</label>
              <input id="editGeneralUnit" type="text" name="unit" class="form-control">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary"><i class="la la-save me-1"></i> Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- --- Finish Add Water Modal (continued) --- -->
<div class="modal fade" id="addWaterModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Add Water Record</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <form id="addWaterForm">
        @csrf
        <input type="hidden" name="type" value="water">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Source</label>
            <input name="source" class="form-control" required>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Usage (L)</label>
              <input name="usage" type="number" step="0.01" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Recycled (%)</label>
              <input name="recycled_percentage" type="number" step="0.01" class="form-control" min="0" max="100">
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Quality Level</label>
            <select name="quality_level" class="form-select">
              <option value="" selected>Choose...</option>
              <option value="good">Good</option>
              <option value="fair">Fair</option>
              <option value="poor">Poor</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Last Test Date</label>
            <input name="last_test_date" type="date" class="form-control">
          </div>
        </div>

        <div class="modal-footer">
          <button class="btn btn-primary"><i class="la la-save me-1"></i> Save Record</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- --- Edit Water Modal --- -->
<div class="modal fade" id="editWaterModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-secondary text-white">
        <h5 class="modal-title">Edit Water Record</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <form id="editWaterForm">
        @csrf
        @method('PUT')
        <input type="hidden" name="type" value="water">
        <input type="hidden" name="id" id="editWaterId">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Source</label>
            <input id="editWaterSource" name="source" class="form-control" required>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Usage (L)</label>
              <input id="editWaterUsage" name="usage" type="number" step="0.01" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Recycled (%)</label>
              <input id="editWaterRecycled" name="recycled_percentage" type="number" step="0.01" class="form-control" min="0" max="100">
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Quality Level</label>
            <select id="editWaterQuality" name="quality_level" class="form-select">
              <option value="">Choose...</option>
              <option value="good">Good</option>
              <option value="fair">Fair</option>
              <option value="poor">Poor</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Last Test Date</label>
            <input id="editWaterTestDate" name="last_test_date" type="date" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary"><i class="la la-save me-1"></i> Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

    <!-- add general inventory item -->
    <div class="modal fade" id="addGeneralModal" tabindex="-1" aria-labelledby="addGeneralModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"><i class="la la-plus-circle me-2"></i>Add New Item</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form id="addGeneralForm">
                <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Item Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <input type="text" name="category" class="form-control" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                    <label class="form-label">Quantity</label>
                    <input type="number" name="quantity" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                    <label class="form-label">Unit</label>
                    <input type="text" name="unit" class="form-control" required>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><i class="la la-save me-1"></i> Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- end add general inventory item -->


    <!-- add department -->

     <!-- Add employees -->

    <!-- workflow management -->
    <!-- Workflow Edit Form Modal -->
    <div class="modal fade" id="workflowEditModal" tabindex="-4" aria-labelledby="workflowEditModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="workflow-edit-form" method="post">
                    @csrf
                    <input type="hidden" name="workflow_id" id="workflow_edit_id">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="workflowEditModalLabel">Edit Workflow</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="workflow_edit_name" class="form-label">Workflow Name</label>
                                <input type="text" class="form-control" id="workflow_edit_name" name="workflow_name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="workflow_edit_description" class="form-label">Description</label>
                                <input type="text" class="form-control" id="workflow_edit_description" name="workflow_description" />
                            </div>
                            <div class="col-md-6">
                                <label for="workflow_edit_status" class="form-label">Status</label>
                                <select class="form-select" id="workflow_edit_status" name="workflow_status" required>
                                    <option value="" selected disabled>Select Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                    <option value="pending">Pending</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Workflow</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Workflow Edit Form Modal -->
    <!-- Stage Management Modal -->
    <div class="modal fade" id="stageManagementModal" tabindex="-4" aria-labelledby="stageManagementModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="stage-management-form">
                    @csrf
                    <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                    <input type="hidden" name="workflow_id" id="stage_workflow_id">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="stageManagementModalLabel">
                            Stage Management for <span id="stage-workflow-title"></span>
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="stage_name" class="form-label">Stage Name</label>
                                <input type="text" class="form-control" id="stage_name" name="stage_name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="stage_description" class="form-label">Description</label>
                                <input type="text" class="form-control" id="stage_description" name="stage_description" placeholder="Enter stage description">
                            </div>
                            <div class="col-md-6">
                                <label for="stage_status" class="form-label">Status</label>
                                <select class="form-select" id="stage_status" name="stage_status" required>
                                    <option value="" selected disabled>Select Status</option>
                                    <option value="Pending">Pending</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Cancelled">Cancelled</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="stage_sequence_order" class="form-label">Sequence Order</label>
                                <input type="number" class="form-control" id="stage_sequence_order" name="stage_sequence_order" min="1" placeholder="Enter sequence order">
                            </div>
                        </div>
                        <div class="col-12 mt-3 text-end">
                            <button type="submit" class="btn btn-info">Save Stage</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive px-3 pb-3">
                    <table class="table table-striped mb-0 w-100" id="tbl-stage-management">
                        <thead class="table-light">
                            <tr>
                                <th>Stage Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Sequence Order</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dynamic rows will be appended here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Stage Management Modal -->
    <!-- View Single Company Stage Modal (Enhanced UI/UX) -->
    <div class="modal fade" id="viewSingleCompanyStageModal" tabindex="-1" aria-labelledby="viewSingleCompanyStageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content shadow-lg border-0 rounded-4">
                <div class="modal-header bg-gradient-primary text-white rounded-top-4">
                    <h5 class="modal-title fw-bold" id="viewSingleCompanyStageModalLabel">
                        <i class="las la-layer-group me-2"></i> Stage Details
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-light">
                    <div class="row g-4 align-items-center">
                        <div class="col-md-4 text-center">
                            <div class="stage-icon mb-3">
                                <i class="las la-stream" style="font-size: 3rem; color: #22c55e;"></i>
                            </div>
                            <h3 class="fw-bold text-primary mb-1" id="stage_name_preview">Stage Name</h3>
                            <span class="badge bg-info text-white px-3 py-2" id="stage_status_preview">Status</span>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Description</label>
                                <div class="p-2 rounded bg-white border" id="stage_description_preview">Stage description goes here.</div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Sequence Order</label>
                                    <div class="p-2 rounded bg-white border" id="stage_sequence_order_preview">1</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Estimated Time (hrs)</label>
                                    <div class="p-2 rounded bg-white border" id="stage_estimated_time_preview">0.00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Tasks in this Stage</label>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered mb-0" id="tbl-stage-tasks-preview">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Task Title</th>
                                            <th>Supervisor</th>
                                            <th>Due Date</th>
                                            <th>Priority</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Dynamic rows will be appended here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light rounded-bottom-4">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="las la-times"></i> Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End View Single Company Stage Modal -->
    <!-- Estimated Time Stage Modal (Improved Design & Pop-Out) -->
    <div class="modal fade" id="setStageDurationModal" tabindex="-1" aria-labelledby="estimatedTimeStageModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-lg animate__animated animate__zoomIn">
            <div class="modal-content shadow-lg border-0 rounded-4">
                <form id="estimated-time-stage-form" autocomplete="off">
                    @csrf
                    <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                    <input type="hidden" name="stage_id" id="estimated_time_stage_id">
                    <div class="modal-header bg-gradient-primary text-white rounded-top-4">
                        <h5 class="modal-title fw-bold" id="estimatedTimeStageModalLabel">
                            <i class="las la-clock me-2"></i> Set Estimated Time for Stage
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-light">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label for="estimated_time_stage_name" class="form-label fw-semibold">Stage Name</label>
                                <input type="text" class="form-control" id="estimated_time_stage_name" name="stage_name" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="estimated_time" class="form-label fw-semibold">Estimated Time (hours)</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="estimated_time" name="estimated_time" min="0" step="0.01" placeholder="Enter estimated time" required>
                                    <span class="input-group-text"><i class="las la-hourglass-half"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light rounded-bottom-4">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="las la-times"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-info px-4 fw-bold">
                            <i class="las la-save"></i> Save Estimated Time
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Estimated Time Stage Modal -->
    <!-- Edit Stage Modal -->
    <div class="modal fade animate__animated animate__fadeInDown" id="editStageModal" tabindex="-3" aria-labelledby="editStageModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" style="z-index: 1200;">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content shadow-lg border-0 rounded-3">
                <form id="edit-stage-form" autocomplete="off">
                    @csrf
                    <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                    <input type="hidden" name="stage_id" id="edit_stage_id">
                    <div class="modal-header bg-gradient-primary text-white rounded-top">
                        <h5 class="modal-title fw-bold" id="editStageModalLabel">
                            <i class="las la-edit me-2"></i> Edit Stage
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-light">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="edit_stage_name" class="form-label fw-semibold">Stage Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="edit_stage_name" name="stage_name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_stage_description" class="form-label fw-semibold">Description</label>
                                <input type="text" class="form-control" id="edit_stage_description" name="stage_description">
                            </div>
                            <div class="col-md-6">
                                <label for="edit_stage_status" class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                                <select class="form-select" id="edit_stage_status" name="stage_status" required>
                                    <option value="" selected disabled>Select Status</option>
                                    <option value="pending">Pending</option>
                                    <option value="in_progress">In Progress</option>
                                    <option value="completed">Completed</option>
                                    <option value="halted">Halted</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_stage_sequence_order" class="form-label fw-semibold">Sequence Order</label>
                                <input type="number" class="form-control" id="edit_stage_sequence_order" name="stage_sequence_order" min="1">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light rounded-bottom">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="las la-times"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="las la-save"></i> Update Stage
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Stage Management Modal -->
     <!-- Task Management Modal -->
    <!-- Task Management Modal -->
    <div class="modal fade" id="taskManagementModal" tabindex="-3" aria-labelledby="taskManagementModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="task-management-form">
                    @csrf
                    <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                    <input type="hidden" name="stage_id" id="stage_task_id">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title" id="taskManagementModalLabel">Task Management</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="task_title" class="form-label">Task Title</label>
                                <input type="text" class="form-control" id="task_title" name="task_title" required>
                            </div>
                            <div class="col-md-6">
                                <div class="taggable-container " id="manager-tag-input-5">
                                    <label for="manager" class="form-label">Supervisor</label>
                                    <div class="manager-tag-input-5 manager-tag-input border-primary bg-light">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="task_due_date" class="form-label">Due Date</label>
                                <input type="date" class="form-control" id="task_due_date" name="task_due_date" required>
                            </div>
                            <div class="col-md-6">
                                <label for="task_priority" class="form-label">Priority</label>
                                <select class="form-select" id="task_priority" name="task_priority" required>
                                    <option value="" selected disabled>Select Priority</option>
                                    <option value="high">High</option>
                                    <option value="medium">Medium</option>
                                    <option value="low">Low</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="task_description" class="form-label">Description</label>
                                <textarea class="form-control" id="task_description" name="task_description" rows="3" placeholder="Enter task description"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="task_status" class="form-label">Status</label>
                                <select class="form-select" id="task_status" name="task_status" required>
                                    <option value="" selected disabled>Select Status</option>
                                    <option value="pending">Pending</option>
                                    <option value="in_progress">In Progress</option>
                                    <option value="completed">Completed</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="task_tags" class="form-label">Tags</label>
                                <div id="tagging-system-2"></div>
                            </div>
                        </div>
                        <div class="col-12 mt-3 text-end">
                            <button type="submit" class="btn btn-info">Save Task</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive px-3 pb-3">
                    <table class="table table-striped mb-0 w-100" id="tbl-task-management">
                        <thead class="table-light">
                            <tr>
                                <th>Title</th>
                                <th>Supervisor</th>
                                <th>Due Date</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Tags</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dynamic rows will be appended here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Stage Task Modal -->
    <div class="modal fade" id="editStageTaskModal" tabindex="-2" aria-labelledby="editStageTaskModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" style="z-index: 1200;">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content shadow-lg border-0 rounded-3">

                <form id="edit-stage-task-form" autocomplete="off">
                    @csrf
                    <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                    <input type="hidden" name="stage_task_id" id="edit_task_id">
                <div class="modal-header bg-gradient-primary text-white rounded-top">
                    <h5 class="modal-title" id="editStageTaskModalLabel">Edit Stage Task</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="edit_task_title" class="form-label">Task Title</label>
                                <input type="text" class="form-control" id="edit_task_title" name="task_title" required>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_task_due_date" class="form-label">Due Date</label>
                                <input type="date" class="form-control" id="edit_task_due_date" name="task_due_date" required>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_task_priority" class="form-label">Priority</label>
                                <select class="form-select" id="edit_task_priority" name="task_priority" required>
                                    <option value="" selected disabled>Select Priority</option>
                                    <option value="high">High</option>
                                    <option value="medium">Medium</option>
                                    <option value="low">Low</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_task_status" class="form-label">Status</label>
                                <select class="form-select" id="edit_task_status" name="task_status" required>
                                    <option value="" selected disabled>Select Status</option>
                                    <option value="pending">Pending</option>
                                    <option value="in_progress">In Progress</option>
                                    <option value="completed">Completed</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="edit_task_description" class="form-label">Description</label>
                                <textarea class="form-control" id="edit_task_description" name="task_description" rows="3" placeholder="Enter task description"></textarea>
                            </div>
                        </div>
                        <div class="col-12 mt-3 text-end">
                            <button type="submit" class="btn btn-primary">Update Task</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Edit Stage Task Modal -->
    <!-- End Task Management Modal -->
    <!-- Task Scheduling Modal -->
    <div class="modal fade" id="taskSchedulingModal" tabindex="-2" aria-labelledby="taskSchedulingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="task-scheduling-form" method="post">
                    @csrf
                    <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                    <input type="hidden" name="task_id" id="task_id">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="taskSchedulingModalLabel">
                            <i class="las la-calendar-check me-2"></i> Task Scheduling
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="schedule_task_title" class="form-label">Task Title</label>
                                <input type="text" class="form-control" id="schedule_task_title" name="task_title" required readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="start_date" class="form-label fw-semibold">Scheduled Date</label>
                                <div class="input-group" id="DateRange">
                                    <input type="date" class="form-control" name="start_date" id="schedule_start_date" placeholder="Start" aria-label="StartDate">
                                    <span class="input-group-text">to</span>
                                    <input type="date" class="form-control" name="end_date" id="schedule_end_date" placeholder="End" aria-label="EndDate">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="schedule_status" class="form-label">Status</label>
                                <select class="form-select" id="schedule_status" name="status" required>
                                    <option value="" selected disabled>Select Status</option>
                                    <option value="pending">Pending</option>
                                    <option value="in_progress">In Progress</option>
                                    <option value="completed">Completed</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="is_recurrence" class="form-label">Is Recurring?</label>
                                <div class="d-flex align-items-center mt-2">
                                    <div class="form-check me-4">
                                        <input class="form-check-input" type="radio" id="is_recurrence" name="is_recurrence" value="1">
                                        <label class="form-check-label" for="is_recurrence">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="is_not_recurrence" name="is_recurrence" value="0" checked>
                                        <label class="form-check-label" for="is_not_recurrence">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" id="recurrence-rule-container" style="display: none;">
                                <label for="recurrence_rule_id" class="form-label">Recurrence Rule</label>
                                <select class="form-select" id="recurrence_rule_id" name="recurrence_rule_id">
                                    <option value="" selected disabled>Select Recurrence Rule</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 mt-3 text-end">
                            <button type="submit" class="btn btn-primary">Schedule Task</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive px-3 pb-3">
                    <table class="table table-striped mb-0 w-100" id="tbl-task-scheduling">
                        <thead class="table-light">
                            <tr>
                                <th>Recurrence</th>
                                <th>Assignee</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Frequency</th>
                                <th>Status</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dynamic rows will be appended here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Task Metrics Modal -->
    <div class="modal fade" id="taskMetricsModal" tabindex="-1" aria-labelledby="taskMetricsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" style="min-height: 80vh;">
            <div class="modal-content shadow-lg border-0 rounded-3" style="min-height: 75vh;">
                <form id="task-metrics-form" method="post">
                    @csrf
                    <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                    <input type="hidden" name="task_schedule_id">

                    <div class="modal-header bg-primary text-white rounded-top">
                        <h5 class="modal-title fw-bold" id="taskMetricsModalLabel">
                            <i class="las la-flask me-2"></i> Task Metrics: Expected Quantities
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-light">
                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <label for="expected_chemical_quantity" class="form-label fw-semibold">Expected Chemical Quantity</label>
                                <input type="number" class="form-control" id="expected_chemical_quantity" name="expected_chemical_quantity" min="0" step="any" placeholder="Enter expected chemical quantity" required>
                            </div>
                            <div class="col-md-4">
                                <label for="expected_material_quantity" class="form-label fw-semibold">Expected Material Quantity</label>
                                <input type="number" class="form-control" id="expected_material_quantity" name="expected_material_quantity" min="0" step="any" placeholder="Enter expected material quantity" required>
                            </div>
                            <div class="col-md-4">
                                <label for="expected_water_quantity" class="form-label fw-semibold">Expected Water Quantity (Liters)</label>
                                <input type="number" class="form-control" id="expected_water_quantity" name="expected_water_quantity" min="0" step="any" placeholder="Enter expected water quantity" required>
                            </div>
                        </div>
                        <div class="col-12 text-end mb-3">
                            <button type="submit" class="btn btn-primary px-4 py-2 shadow-sm">
                                <i class="las la-save"></i> Save Metrics
                            </button>
                        </div>
                    </div>
                </form>
               
                <div class="table-responsive">
                    <table class="table table-striped mb-0 w-100" id="tbl-task-metrics">
                        <thead class="table-light">
                            <tr>
                                <th>Chemical Quantity</th>
                                <th>Material Quantity</th>
                                <th>Water Quantity (L)</th>
                                <th >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Metrics rows will be dynamically loaded here -->
                        </tbody>
                    </table>
                </div>
                    
            </div>
        </div>
    </div>
    <!-- End Task Metrics Modal -->
    <!-- End Task Scheduling Modal -->
    <!-- Assign Employee to Task Modal -->
    <div class="modal fade" id="assignEmployeeToTaskModal" tabindex="-1" aria-labelledby="assignEmployeeToTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content shadow-lg border-0 rounded-3">
                <form id="assign-employee-task-form" autocomplete="off">
                    @csrf
                    <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                    <input type="hidden" name="task_id" id="assign_task_id">
                    <div class="modal-header bg-gradient-primary text-white rounded-top">
                        <h5 class="modal-title fw-bold" id="assignEmployeeToTaskModalLabel">
                            <i class="las la-user-plus me-2"></i> Assign Employee to Task
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-light">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="taggable-container " id="manager-tag-input-6">
                                    <label for="manager" class="form-label">Employee</label>
                                    <div class="manager-tag-input-6 manager-tag-input border-primary bg-light">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="assignment_note" class="form-label">Assignment Note (optional)</label>
                                <textarea class="form-control" id="assignment_note" name="assignment_note" rows="2" placeholder="Add any notes for the assignee(s)"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light rounded-bottom">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="las la-times"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="las la-user-check"></i> Assign
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Assign Employee to Task Modal -->
    <!-- Employee Assignment Management Table Modal -->
    <div class="modal fade" id="employeeAssignmentManagementModal" tabindex="-1" aria-labelledby="employeeAssignmentManagementModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content shadow-lg border-0 rounded-3">
                <div class="modal-header bg-gradient-primary text-white rounded-top">
                    <h5 class="modal-title fw-bold" id="employeeAssignmentManagementModalLabel">
                        <i class="las la-users-cog me-2"></i> Employee Assignment Management
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-light">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0 w-100" id="tbl-employee-assignment-management">
                            <thead class="table-light">
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Email</th>
                                    <th>Assigned Task</th>
                                    <th>Assignment Note</th>
                                    <th>Status</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Dynamic rows will be appended here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Employee Assignment Management Table Modal -->
    <!-- end workflow management -->

     <!-- Annual operations activity -->
    <!-- Annual Operations Activity Modal -->
    <div class="modal fade" id="annualOperationsActivityModal" tabindex="-1" aria-labelledby="annualOperationsActivityModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="annualOperationsActivityModalLabel">Annual Operations Activities for</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card shadow-sm border-0 d-none" id = "annual-operation-activity-form-card" style="background: linear-gradient(90deg, #f8ffae 0%, #43c6ac 100%); color: #333;">
                <div class="card-header d-flex justify-content-between align-items-center rounded-top" style="background: #f8ffae; color: #333;">
                    <h4 class="card-title mb-0 fw-bold">
                        <i class="las la-tasks me-2" style="color: #22c55e;"></i> <span class="fw-bold">Annual Operations Activity Form</span>
                    </h4>
                    <button type="button" class="btn-close" aria-label="Close" onclick="this.closest('.card').classList.add('d-none');"></button>
                </div>
                <div class="card-body">
                    <form action="" method="post" id="annual-operations-activity-form" class="needs-validation" novalidate>
                    <input type="hidden" name="annual_op_metadata_ID" id="annual_op_metadata_ID">
                    <div class="row g-4">
                        <div class="col-md-12">
                        <label for="annual_operation_title" class="form-label fw-semibold">Annual Operation Activity Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="annual_operation_activity_title" name="annual_operation_activity_title" placeholder="Enter Annual Operation Activity Title" readonly>
                        </div>
                        <div class="col-md-6">
                        <label for="operation_name" class="form-label fw-semibold">Operation Activity (Operation type) <span class="text-danger">*</span></label>
                        <select class="form-select operation-select" id="operation_id" name="operation_activity" required>
                            <option value="" selected disabled>Select Operation</option>
                        </select>
                        <div class="invalid-feedback">Please select an operation activity.</div>
                        </div>
                        <div class="col-md-6">
                        <label class="form-label fw-semibold">Activity Date <span class="text-danger">*</span></label>
                        <div class="input-group" id="DateRange">
                            <input type="date" class="form-control" name="activity_start_date" placeholder="Start" aria-label="StartDate" required>
                            <span class="input-group-text">to</span>
                            <input type="date" class="form-control rounded-end" name="activity_end_date" placeholder="End" aria-label="EndDate" required>
                        </div>
                        <div class="invalid-feedback">Please provide both start and end dates.</div>
                        </div>
                        <div class="col-md-6">
                        <label for="objectives" class="form-label fw-semibold">Objectives</label>
                        <textarea name="Objectives" id="objectives" rows="3" class="form-control" placeholder="Enter the objectives of the activity"></textarea>
                        </div>
                        <div class="col-md-6">
                        <label for="description" class="form-label fw-semibold">Description</label>
                        <textarea name="Description" id="description" rows="3" class="form-control" placeholder="Enter a detailed description of the activity"></textarea>
                        </div>
                        <div class="col-md-6">
                        <div class="material-quantity-used-container-annual-operation-activity">
                            <div class="row g-2 align-items-end mb-3">
                            <div class="col-md-6">
                                <label for="expected_material" class="form-label fw-semibold">Material Needed</label>
                                <select class="form-select material-select" id="expected_material" name="material_used[0][material_id]">
                                <option value="" selected disabled>Select Material</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="expected_quantity" class="form-label fw-semibold">Quantity</label>
                                <input type="number" class="form-control" id="expected_quantity" name="material_used[0][quantity]" placeholder="Quantity" min="0">
                            </div>
                            <div class="col-md-2">
                                <label for="expected_unit" class="form-label fw-semibold">Unit</label>
                                <input type="text" class="form-control" id="expected_unit" name="material_used[0][unit]" placeholder="Unit">
                            </div>
                            </div>
                        </div>
                        <div class="text-start">
                            <button type="button" class="btn btn-outline-dark btn-sm add-more-material-quantity-annual-operation-activity">
                            <i class="las la-plus"></i> Add More
                            </button>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="chemical-quantity-container-annual-operation-activity">
                            <div class="row g-2 align-items-end mb-3">
                            <div class="col-md-6">
                                <label for="chemical_used" class="form-label fw-semibold">Chemical Needed</label>
                                <select class="form-select chemical-select" id="chemical_used" name="chemical_used[0][chemical_id]">
                                <option value="" selected disabled>Select Chemical</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="chemical_quantity" class="form-label fw-semibold">Quantity</label>
                                <input type="number" class="form-control" id="chemical_quantity" name="chemical_used[0][quantity]" placeholder="Enter Quantity Used" min="0">
                            </div>
                            <div class="col-md-2">
                                <label for="chemical_unit" class="form-label fw-semibold">Unit</label>
                                <input type="text" class="form-control" id="chemical_unit" name="chemical_used[0][unit]" placeholder="Unit">
                            </div>
                            </div>
                        </div>
                        <div class="text-start">
                            <button type="button" class="btn btn-outline-dark btn-sm add-more-chemical-quantity-annual-operation-activity">
                            <i class="las la-plus"></i> Add More
                            </button>
                        </div>
                        </div>
                        <div class="col-md-3">
                        <label for="water_usage" class="form-label fw-semibold">Expected Water Usage (Liters)</label>
                        <input type="number" class="form-control" id="water_usage" name="water_usage" min="0" placeholder="Enter expected water usage" required>
                        </div>
                        <div class="col-md-3">
                        <label for="energy_usage" class="form-label fw-semibold">Expected Energy Usage (kWh)</label>
                        <input type="number" class="form-control" id="energy_usage" name="energy_usage" min="0" placeholder="Enter expected energy usage">
                        </div>
                        <div class="col-md-6">
                        <div class="annual-operation-activity-waste-quantity-container">
                            <div class="row g-2 align-items-end mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="expected_waste" class="form-label fw-bold">Waste Type</label>
                                <select class="form-select waste-select" name="waste_generated[0][waste_id]" id="expected_waste">
                                    <option value="" selected disabled>Select Waste</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="expected_quantity" class="form-label fw-bold">Quantity</label>
                                <input type="number" class="form-control" name="waste_generated[0][quantity]" id="expected_quantity" placeholder="Enter Expected Quantity" min="0">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                <label for="expected_unit" class="form-label fw-bold">Unit</label>
                                <input type="text" class="form-control" name="waste_generated[0][unit]" id="expected_unit" placeholder="Enter Expected Unit" >
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-start">
                            <button type="button" class="btn btn-outline-dark btn-sm add-more-annual-activity-waste-quantity-operation">
                            <i class="las la-plus"></i> Add More
                            </button>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <label for="priority" class="form-label fw-semibold">Priority <span class="text-danger">*</span></label>
                        <select class="form-select" id="priority" name="priority" required>
                            <option value="" selected disabled>Select Priority</option>
                            <option value="high">High</option>
                            <option value="medium">Medium</option>
                            <option value="low">Low</option>
                        </select>
                        </div>
                        <div class="col-md-4">
                        <label for="status" class="form-label fw-semibold">Status</label>
                        <select class="form-select" id="status" name="Status">
                            <option value="" selected disabled>Select Status</option>
                            <option value="pending">Pending</option>
                            <option value="in_progress">In Progress</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                        </div>
                        <div class="col-md-4">
                            <div class="taggable-container " id="manager-tag-input-3">
                                <label for="manager" class="form-label fw-bold">Manager</label>
                                <div class="manager-tag-input-3 manager-tag-input border-primary bg-light">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                        <label for="location" class="form-label fw-semibold">Location</label>
                        <input type="text" class="form-control" id="location" name="Location" placeholder="Enter activity location">
                        </div>
                        <div class="col-md-4">
                        <label for="success_criteria" class="form-label fw-semibold">Success Criteria</label>
                        <textarea class="form-control" id="success_criteria" name="success_criteria" rows="2" placeholder="Enter success criteria"></textarea>
                        </div>
                        <div class="col-md-4">
                            <label for="tag-input-field" class="form-label fw-semibold">Tags</label>
                            <div id="tagging-system"></div>
                        </div>
                        <div class="col-12 mt-3 text-end">
                        <button type="submit" class="btn btn-dark fw-bold px-4 py-2 shadow-sm">Save Activity</button>
                        </div>
                    </div>
                    </form>
                </div>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="text-primary mb-0">Annual Operations Activities</h4>
                <button type="button" class="btn btn-primary btn-sm" id="btn-add-annual-activity"
                    onclick="addActivityAnnualOperationLogForm()">
                    <i class="iconoir-plus"></i> Add Activity
                </button>
                </div>
                <div class="table-responsive">
                <table class="table table-striped mb-0 w-100" id="tbl-annual-operations-activity">
                    <thead class="table-light">
                    <tr>
                        <th>Activity Name</th>
                        <th>Operation Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Priority</th>
                        <th>Tags</th>
                        <th class="text-end">Action</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- End Annual Operations Activity Modal -->
    <!-- Annual Operation Performance Metrics Modal -->
    <div class="modal fade" id="annualOperationPerformanceMetricsModal" tabindex="-1" aria-labelledby="annualOperationPerformanceMetricsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-secondary text-white">
                    <h5 class="modal-title" id="annualOperationPerformanceMetricsModalLabel">Annual Operation Performance Metrics</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="annual-operation-performance-metrics-form">
                        @csrf
                        <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                        <div class="row g-3">
                            <!-- Total Operations -->
                            <div class="col-md-4">
                                <label for="total_operations" class="form-label">Total Operations</label>
                                <input type="number" class="form-control" id="total_operations" name="total_operations" min="0" placeholder="Enter total operations" required>
                            </div>
                            <!-- Total Waste Generated -->
                            <div class="col-md-4">
                                <label for="total_waste_generated" class="form-label">Total Waste Generated (Units)</label>
                                <input type="number" class="form-control" id="total_waste_generated" name="total_waste_generated" min="0" placeholder="Enter total waste generated" required>
                            </div>
                            <!-- Total Water Used -->
                            <div class="col-md-4">
                                <label for="total_water_used" class="form-label">Total Water Used (Liters)</label>
                                <input type="number" class="form-control" id="total_water_used" name="total_water_used" min="0" placeholder="Enter total water used" required>
                            </div>
                            <!-- Total Units Produced -->
                            <div class="col-md-4">
                                <label for="total_units_produced" class="form-label">Total Units Produced</label>
                                <input type="number" class="form-control" id="total_units_produced" name="total_units_produced" min="0" placeholder="Enter total units produced" required>
                            </div>
                            <!-- Total Cost -->
                            <div class="col-md-4">
                                <label for="total_cost" class="form-label">Total Cost (₦)</label>
                                <input type="number" class="form-control" id="total_cost" name="total_cost" min="0" placeholder="Enter total cost" required>
                            </div>
                            <!-- Efficiency -->
                            <div class="col-md-4">
                                <label for="efficiency" class="form-label">Efficiency (%)</label>
                                <input type="number" class="form-control" id="efficiency" name="efficiency" min="0" max="100" placeholder="Enter efficiency percentage" required>
                            </div>
                            <!-- Submit Button -->
                            <div class="col-12 text-end mt-3">
                                <button type="submit" class="btn btn-secondary">Save Performance Metrics</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
     <!-- End annual operations Log -->
    @endsection

    @section('scripts')
    <script src="{{ asset('adminAssets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminAssets/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('adminAssets/js/toastify.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('adminAssets/js/location.js') }}"></script>
    <script src="{{ asset('adminAssets/js/industry.js') }}"></script>
    <script src="{{ asset('adminAssets/libs/vanillajs-datepicker/js/datepicker-full.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="{{ asset('adminAssets/js/moment.js')}}"></script>
    <script src="{{ asset('adminAssets/libs/imask/imask.min.js')}}"></script>
    <script src="{{ asset('adminAssets/js/pages/forms-advanced.js')}}"></script>
    <script src="{{ asset('adminAssets/js/app.js')}}"></script>
    @include('components.apps.company.scripts.fetch_cycle')
    @include('components.apps.company.scripts.recp')
    @include('components.apps.company.scripts.utils')
    @include('components.apps.company.scripts.departments')
    @include('components.apps.company.scripts.employee')
    @include('components.apps.company.scripts.chemicals')
    <script>
        $(document).ready(function() {
            $('#generalTable, #chemicalTable, #waterTable, #equipmentTable, #rawTable').DataTable();
        });
    </script>
    <script>
        // company policies and objectives
        // company policies
        async function ChangePolicy(ele, company, policy) {
            console.log(ele, company, policy);

            const uri = ele.checked 
                ? "{{ route('admin.add-company-policy') }}" 
                : "{{ route('admin.remove-company-policy') }}";

            if (!ele.checked && !confirm("Do you want to remove this policy?")) return;

            const formData = new FormData();
            formData.append('company', company);
            formData.append('policy', policy);

            try {
                const response = await fetch(uri, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    credentials: 'same-origin',
                    body: formData
                });

                const data = await response.json();
                console.log("--policy", data);

                if (data.status === 'success') {
                    Toastify({
                        text: data.message,
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        style: {
                            background: "linear-gradient(to right, #00b09b, #96c93d)",
                        },
                    }).showToast();
                } else if (data.status === 'error') {
                    Object.values(data.errors).forEach(error => {
                        Toastify({
                            text: error,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            stopOnFocus: true,
                            style: {
                                background: "linear-gradient(to right, #ff0000, #ff1745)",
                            },
                        }).showToast();
                    });
                }
            } catch (error) {
                console.error("Error:", error);
            }
        }
        // end company policies
        // Company Objectives
        async function ChangeObjective(element, company, objective) {
            console.log(element, company, objective);

            const uri = element.checked 
                ? "{{ route('admin.add-company-objective') }}" 
                : "{{ route('admin.remove-company-objective') }}";

            if (!element.checked && !confirm("Do you want to remove this objective?")) return;

            const formData = new FormData();
            formData.append('company', company);
            formData.append('objective', objective);

            try {
                const response = await fetch(uri, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    credentials: 'same-origin',
                    body: formData
                });

                const data = await response.json();
                console.log("--objective", data);

                if (data.status === 'success') {
                    Toastify({
                        text: data.message,
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        style: {
                            background: "linear-gradient(to right, #00b09b, #96c93d)",
                        },
                    }).showToast();
                } else if (data.status === 'error') {
                    Object.values(data.errors).forEach(error => {
                        Toastify({
                            text: error,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            stopOnFocus: true,
                            style: {
                                background: "linear-gradient(to right, #ff0000, #ff1745)",
                            },
                        }).showToast();
                    });
                }
            } catch (error) {
                console.error("Error:", error);
            }
        }
        // end company objectives
    </script>

<<<<<<< HEAD
            try {
                const result = await fetch_cycle('--Save Water Check-In', url, 'POST', formData);
                console.log(result);

                if (result.status === 'success') {
                    const tableBody = document.querySelector('#tbl-water-management tbody');
                    tableBody.innerHTML = result.water_stock_movements.map(water_stock_movement => {
                        const sourceName = water_stock_movement.company_water_sources?.water_source?.sources ?? 'N/A';
                        const calendarYear = water_stock_movement.calendar_year?.name ?? 'N/A';
                        const formattedDate = new Date(water_stock_movement.movement_date).toLocaleDateString('en-GB', {
                            day: '2-digit', month: 'short', year: 'numeric'
                        });

                        return `
                            <tr>
                                <td class="text-capitalize">
                                    ${water_stock_movement.movement_type}
                                    ${water_stock_movement.movement_type === 'in' ? '<i class="fas fa-caret-up text-success font-16"></i>' : ''}
                                    ${water_stock_movement.movement_type === 'out' ? '<i class="fas fa-caret-down text-danger font-16"></i>' : ''}
                                    ${water_stock_movement.movement_type === 'recycling' ? '<i class="fas fa-recycle text-info font-16"></i>' : ''}
                                    ${water_stock_movement.movement_type === 'usage' ? '<i class="fas fa-tint text-primary font-16"></i>' : ''}
                                </td>
                                <td>${sourceName}</td>
                                <td>${water_stock_movement.volume}</td>
                                <td>${calendarYear}</td>
                                <td>${formattedDate}</td>
                                <td>${water_stock_movement.remark ?? ''}</td>
                                <td class="text-end">
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-outline-primary btn-sm me-2">Edit</button>
                                        <button class="btn btn-outline-danger btn-sm">Delete</button>
                                    </div>
                                </td>
                            </tr>`;
                    }).join('');
                }
            } catch (error) {
                console.error('Error during water check-in:', error);
            }
        });
        // End check-in form submission
        // Water usage log form submission
        document.querySelector('#water-usage-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.water-stock-check-out') }}";

            try {
                const result = await fetch_cycle('--Save Water Usage Log', url, 'POST', formData);
                console.log(result);

                if (result.status === 'success') {
                    const tableBody = document.querySelector('#tbl-water-management tbody');
                    tableBody.innerHTML = result.water_stock_movements.map(water_stock_movement => {
                        const sourceName = water_stock_movement.company_water_sources?.water_source?.sources ?? 'N/A';
                        const calendarYear = water_stock_movement.calendar_year?.name ?? 'N/A';
                        const formattedDate = new Date(water_stock_movement.movement_date).toLocaleDateString('en-GB', {
                            day: '2-digit', month: 'short', year: 'numeric'
                        });

                        return `
                            <tr>
                                <td class="text-capitalize">
                                    ${water_stock_movement.movement_type}
                                    ${water_stock_movement.movement_type === 'in' ? '<i class="fas fa-caret-up text-success font-16"></i>' : ''}
                                    ${water_stock_movement.movement_type === 'out' ? '<i class="fas fa-caret-down text-danger font-16"></i>' : ''}
                                    ${water_stock_movement.movement_type === 'recycling' ? '<i class="fas fa-recycle text-info font-16"></i>' : ''}
                                    ${water_stock_movement.movement_type === 'usage' ? '<i class="fas fa-tint text-primary font-16"></i>' : ''}
                                </td>
                                <td>${sourceName}</td>
                                <td>${water_stock_movement.volume}</td>
                                <td>${calendarYear}</td>
                                <td>${formattedDate}</td>
                                <td>${water_stock_movement.remark ?? ''}</td>
                                <td class="text-end">
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-outline-primary btn-sm me-2">Edit</button>
                                        <button class="btn btn-outline-danger btn-sm">Delete</button>
                                    </div>
                                </td>
                            </tr>`;
                    }).join('');
                }
            } catch (error) {
                console.error('Error saving water usage log:', error);
            }
        });
        // End water usage log form submission
        // Water recycling log form submission
        document.querySelector('#water-recycling-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.water-stock-recycling-log') }}";

            try {
                const result = await fetch_cycle('--Save Water Recycling Log', url, 'POST', formData);
                if (result.status === 'success') {
                    updateWaterManagementTable(result.water_stock_movements);
                }
            } catch (error) {
                console.error('Error saving water recycling log:', error);
            }
        });

        // Update Water Management Table
        function updateWaterManagementTable(waterStockMovements) {
            const tableBody = document.querySelector('#tbl-water-management tbody');
            tableBody.innerHTML = waterStockMovements.map(waterStockMovement => {
                const sourceName = waterStockMovement.company_water_sources?.water_source?.sources ?? 'N/A';
                const calendarYear = waterStockMovement.calendar_year?.name ?? 'N/A';
                const formattedDate = new Date(waterStockMovement.movement_date).toLocaleDateString('en-GB', {
                    day: '2-digit', month: 'short', year: 'numeric'
                });

                return `
                    <tr>
                        <td class="text-capitalize">
                            ${waterStockMovement.movement_type}
                            ${getMovementTypeIcon(waterStockMovement.movement_type)}
                        </td>
                        <td>${sourceName}</td>
                        <td>${waterStockMovement.volume}</td>
                        <td>${calendarYear}</td>
                        <td>${formattedDate}</td>
                        <td>${waterStockMovement.remark ?? ''}</td>
                        <td class="text-end">
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-outline-primary btn-sm me-2">Edit</button>
                                <button class="btn btn-outline-danger btn-sm">Delete</button>
                            </div>
                        </td>
                    </tr>`;
            }).join('');
        }

        // Get Movement Type Icon
        function getMovementTypeIcon(movementType) {
            const icons = {
                in: '<i class="fas fa-caret-up text-success font-16"></i>',
                out: '<i class="fas fa-caret-down text-danger font-16"></i>',
                recycling: '<i class="fas fa-recycle text-info font-16"></i>',
                usage: '<i class="fas fa-tint text-primary font-16"></i>'
            };
            return icons[movementType] || '';
        }

        // Store Water Sources
        document.querySelector('#waterSourceForm').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.store-water-source-details') }}";

            try {
                const result = await fetch_cycle('--Store Water Sources', url, 'POST', formData);
                if (result.status === 'success') {
                    updateWaterSourcesTable(result.water_sources);
                }
            } catch (error) {
                console.error('Error storing water sources:', error);
            }
        });

        // Update Water Sources Table
        function updateWaterSourcesTable(waterSources) {
            const tableBody = document.querySelector('#tbl-water-sources tbody');
            tableBody.innerHTML = waterSources.map(source => `
                <tr>
                    <td>${source.sources}</td>
                    <td>${source.description ?? ""}</td>
                    <td class="text-end">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-sm btn-primary me-2">Edit</button>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </div>
                    </td>
                </tr>`).join('');
        }
        // End water sources
    </script>
    <script>
        // Store Quality Control Logs
        document.querySelector('#qualityControlLogForm').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.store-water-quality-logs') }}";

            try {
                const result = await fetch_cycle('--Store Quality Control Log', url, 'POST', formData);
                if (result.status === 'success') {
                    const tableBody = document.querySelector('#tbl-quality-control-management tbody');
                    tableBody.innerHTML = result.water_quality_logs.map(quality => `
                        <tr>
                            <td>${quality.test_date}</td>
                            <td>${quality.parameter_tested}</td>
                            <td>${quality.test_results}</td>
                            <td>${quality.deviation_detected}</td>
                            <td>${quality.corrective_actions}</td>
                            <td class="text-end">
                                <div class="dropdown d-inline-block">
                                    <a class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button">
                                        <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    `).join('');
                }
            } catch (error) {
                console.error('Error storing quality control log:', error);
            }
        });
    </script>
    <!-- end water quality control logs -->
    <!-- Waste Disposal -->
    <script>
        // Store Waste Disposal
        // Handles the submission of the waste disposal form and updates the waste disposal table.
        document.querySelector('#waste-disposal-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.store-waste-disposal') }}";

            try {
                const result = await fetch_cycle('--Store Waste Disposal', url, 'POST', formData);
                if (result.status === 'success' && Array.isArray(result.waste_disposals)) {
                    const tableBody = document.querySelector('#tbl-waste-disposal tbody');
                    tableBody.innerHTML = result.waste_disposals.map(disposal => `
                        <tr>
                            <td>${disposal.waste_type ?? ''}</td>
                            <td>${disposal.quantity ?? ''}</td>
                            <td>${disposal.disposal_method ?? ''}</td>
                            <td>${disposal.disposal_date ?? ''}</td>
                            <td>${disposal.operation?.operation_name ?? 'N/A'}</td>
                            <td>${disposal.calendarYear?.name ?? 'N/A'}</td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-sm btn-primary me-2">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </div>
                            </td>
                        </tr>
                    `).join('');
                }
            } catch (error) {
                console.error('Error storing waste disposal:', error);
            }
        });
    </script>
    <!-- end waste disposal -->

    <!--store IoT Device Management -->
    <script>
        /**
         * Handles the submission of the IoT Device Management form.
         *
         * - Prevents the default form submission behavior.
         * - Collects form data and sends it via an asynchronous POST request to the server.
         * - On successful response, updates the IoT devices table with the latest device data.
         * - Handles and logs any errors that occur during the process.
         *
         * Dependencies:
         * - Assumes the existence of a `fetch_cycle` function for making AJAX requests.
         * - Requires a form with the ID `iot-device-form` and a table with the ID `tbl-iot-devices`.
         * - Uses Laravel's route helper to generate the endpoint URL.
         */
        document.querySelector('#iot-device-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.store-iot-device') }}";

            try {
                const result = await fetch_cycle('--Store IoT Device', url, 'POST', formData);
                if (result.status === 'success') {
                    const tableBody = document.querySelector('#tbl-iot-devices tbody');
                    tableBody.innerHTML = result.iot_devices.map(device => `
                        <tr>
                            <td>${device.device_name}</td>
                            <td>${device.device_type}</td>
                            <td>${device.serial_number}</td>
                            <td>${device.status}</td>
                            <td>${device.date_added}</td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-sm btn-primary me-2">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </div>
                            </td>
                        </tr>
                    `).join('');
                }
            } catch (error) {
                console.error('Error storing IoT device:', error);
            }
        });
    </script>
    <!-- end iot device managment -->
    <!-- Chemical  -->
    <script>
        /**
         * Chemical Management Script
         *
         * Handles:
         * - Submission of new company chemicals.
         * - Dynamic update of the chemical management table.
         * - Modal triggers for chemical check-in and check-out.
         * - Submission of check-in/check-out forms for chemicals.
         *
         * Features:
         * - Validates required fields before submission.
         * - Uses fetch_cycle for AJAX requests.
         * - Updates the chemical table on success.
         * - Provides utility functions for modal handling and field validation.
         */

        // Button for submitting a new chemical
        const btnSubmitChemical = document.querySelector('#btn-submit-chemical');

        // Utility: Validate required fields
        const validateFields = (fields) => {
            for (const { value, message } of fields) {
                if (!value.trim()) {
                    showToast(message);
                    return false;
                }
            }
            return true;
        };

        // Utility: Handle AJAX submission and update table
        const handleSubmit = async (url, formData, loader) => {
            loader.style.display = 'inline-block';
            try {
                const result = await fetch_cycle('--Save Chemical', url, 'POST', formData);
                loader.style.display = 'none';
                if (result.status === "success") {
                    // Update chemical management table with new data
                    const tableBody = document.querySelector('#tbl-company-chemical tbody');
                    tableBody.innerHTML = result.company_chemical.map(chemical => `
                        <tr>
                            <td>${escapeHTML(chemical.name ?? '')}</td>
                            <td>${escapeHTML(chemical.unit ?? '')}</td>
                            <td>
                                <span 
                                    class="badge bg-${chemical.chemical_status === 'active' ? 'success' : 'danger'}" 
                                    role="status" 
                                    aria-label="Chemical status: ${escapeHTML(chemical.chemical_status)}"
                                >
                                    ${escapeHTML(chemical.chemical_status)}
                                </span>
                            </td>
                            <td class="text-end">
                                <div class="dropdown d-inline-block">
                                    <a 
                                        class="dropdown-toggle arrow-none" 
                                        data-bs-toggle="dropdown" 
                                        href="#" 
                                        role="button" 
                                        aria-expanded="false"
                                    >
                                        <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a 
                                            class="dropdown-item" 
                                            href="${`/admin/view-chemical/${encodeURIComponent(chemical.company_chemical_id)}`}"
                                        >
                                            Open Chemical
                                        </a>
                                        <a class="dropdown-item" href="#">Update Chemical</a>
                                        <a class="dropdown-item" href="#">Delete Chemical</a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item" href="#">Setup Price</a>
                                        <a class="dropdown-item" href="#">Check In Item</a>
                                        <a class="dropdown-item" href="#">Check Out Item</a>
                                        <a class="dropdown-item" href="#">Adjustment</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    `).join('');
                }
            } catch (error) {
                console.error(error);
                loader.style.display = 'none';
            }
        };

        // Handle chemical submission
        btnSubmitChemical.addEventListener('click', () => {
            const loader = document.querySelector('#btn-submit-chemical #loader');
            const companyId = document.querySelector('#chemical-form input[name="company_id"]').value;
            const chemical = document.querySelector('#chemical-form select[name="chemical"]').value;
            const unitOfMeasurement = document.querySelector('#chemical-form input[name="unit_of_measurement"]').value;
            const threshold = document.querySelector('#chemical-form input[name="threshold"]').value;

            if (!validateFields([
                { value: companyId, message: "Company ID field cannot be empty." },
                { value: chemical, message: "Chemical field cannot be empty." },
                { value: unitOfMeasurement, message: "Unit of measurement field cannot be empty." }
            ])) return;

            const formData = new FormData();
            formData.append('chemical_id', chemical);
            formData.append('unit_of_measurement', unitOfMeasurement);
            formData.append('threshold', threshold);
            formData.append('company_id', companyId);

            handleSubmit("{{ route('admin.store-company-chemical') }}", formData, loader);
        });

        // Utility: Trigger modal and set fields
        const triggerModal = (modalId, fields) => {
            const modal = document.querySelector(modalId);
            fields.forEach(({ name, value }) => {
                modal.querySelector(`input[name="${name}"]`).value = value;
            });
            const loader = modal.querySelector('#loader');
            loader.style.display = 'none';
            new bootstrap.Modal(modal).show();
        };

        // Utility: Handle check-in/check-out AJAX
        const handleCheckInOut = async (url, modalId, loaderSelector) => {
            const modal = document.querySelector(modalId);
            const loader = modal.querySelector(loaderSelector);
            loader.style.display = 'inline-block';

            const formData = new FormData(modal.querySelector('form'));
            if (!validateFields([
                { value: formData.get('checkIn_chemical_id') || formData.get('checkOut_chemical_id'), message: "Chemical ID field cannot be empty." },
                { value: formData.get('quantity'), message: "Quantity field cannot be empty." },
                { value: formData.get('date'), message: "Date field cannot be empty." }
            ])) {
                loader.style.display = 'none';
                return;
            }

            try {
                const result = await fetch_cycle('--Create Check In/Out', url, 'POST', formData);
                loader.style.display = 'none';
            } catch (error) {
                console.error(error);
                loader.style.display = 'none';
            }
        };

        // Chemical check-in
        document.querySelector('#btn-submit-check-in-chemical').addEventListener('click', () => {
            handleCheckInOut("{{ route('admin.save-company-chemical-check-in') }}", '#checkInChemicalModal', '#loader');
        });

        // Chemical check-out
        document.querySelector('#btn-submit-check-out-chemical').addEventListener('click', () => {
            handleCheckInOut("{{ route('admin.save-company-chemical-check-out') }}", '#checkOutChemicalModal', '#loader');
        });

        // Modal triggers for check-in/check-out
        window.triggerCheckInChemical = (companyChemicalID, chemicalID, companyID, chemicalName) => {
            triggerModal('#checkInChemicalModal', [
                { name: 'checkIn_chemical_id', value: companyChemicalID },
                { name: 'chemical_id', value: chemicalID },
                { name: 'company_id', value: companyID },
                { name: 'checkIn_chemical_name', value: chemicalName }
            ]);
        };

        window.triggerCheckOutChemical = (companyChemicalID, chemicalID, companyID, chemicalName) => {
            triggerModal('#checkOutChemicalModal', [
                { name: 'checkOut_chemical_id', value: companyChemicalID },
                { name: 'chemical_id', value: chemicalID },
                { name: 'company_id', value: companyID },
                { name: 'checkOut_chemical_name', value: chemicalName }
            ]);
        };
    </script>
    <!-- end chemical management -->

    <!-- operations -->
    <script>
        /**
         * Operations Management Script
         *
         * Handles:
         * - Submission and update of operation types and categories.
         * - Submission of equipment types and equipment logs.
         * - Submission of operation logs and quality control records.
         * - Submission of waste items.
         *
         * Features:
         * - Updates corresponding tables on success.
         * - Uses fetch_cycle for AJAX requests.
         * - Provides utility functions for editing and confirming deletions.
         */

        // Store Operation Type
        document.querySelector('#company_operation_type_form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.store-operation-type') }}";

            try {
                const result = await fetch_cycle('--Store Operation Type', url, 'POST', formData);
                if (result.status === 'success') {
                    const tableBody = document.querySelector('#tbl-operation-types tbody');
                    tableBody.innerHTML = result.operation_types.map(type => `
                        <tr>
                            <td>${type.name}</td>
                            <td>${type.description || ""}</td>
                            <td>${type.sequence_order || ""}</td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <button class="btn btn-outline-primary btn-sm" onclick="editOperationType(${type.operation_type_id}, '${type.name}', '${type.description || ""}', ${type.sequence_order || 0})">
                                        <i class="las la-edit"></i> Edit
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm" onclick="confirmTypeDeletion(${type.operation_type_id}, '${type.name}')">
                                        <i class="las la-trash-alt"></i> Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `).join('');
                }
            } catch (error) {
                console.error('Error storing operation type:', error);
            }
        });

        // Edit Operation Type
        document.querySelector('#edit_operation_type_form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.update-operation-type') }}";

            try {
                const result = await fetch_cycle('--Update Operation Type', url, 'POST', formData);
                if (result.status === 'success') {
                    const updatedData = result.operation_types.map(
                        type => new OperationTypeObject(type.operation_type_id, type.name, type.description, type.sequence_order)
                    );

                    table.clear();
                    table.rows.add(updatedData).draw();
                }
            } catch (error) {
                console.error('Error updating operation type:', error);
            }
        });

        // Store Equipment Type
        document.querySelector('#equipment_type_form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.store-equipment-type') }}";

            try {
                const result = await fetch_cycle('--Store Equipment Type', url, 'POST', formData);
                if (result.status === 'success') {
                    const tableBody = document.querySelector('#tbl-equipment-types tbody');
                    tableBody.innerHTML = result.equipment_types.map(type => `
                        <tr>
                            <td>${type.name}</td>
                            <td>${type.description || ""}</td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-sm btn-primary me-2">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </div>
                            </td>
                        </tr>
                    `).join('');
                }
            } catch (error) {
                console.error('Error storing equipment type:', error);
            }
        });

        // Store Equipment Log
        document.querySelector('#industrial-equipment-log-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.store-equipment-log') }}";

            try {
                const result = await fetch_cycle('--Store Equipment Log', url, 'POST', formData);
                if (result.status === 'success') {
                    const tableBody = document.querySelector('#tbl-equipment-logs tbody');
                    tableBody.innerHTML = result.equipment_logs.map(log => `
                        <tr>
                            <td>${log.equipment_name}</td>
                            <td>${log.equipment_type?.name || 'N/A'}</td>
                            <td>${log.equipment_capacity}</td>
                            <td>${log.status}</td>
                            <td>${log.date_added}</td>
                            <td class="text-end">
                                <div class="dropdown d-inline-block">
                                    <a class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button">
                                        <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Update</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    `).join('');
                }
            } catch (error) {
                console.error('Error storing equipment log:', error);
            }
        });

        // Store Operation Category
        document.querySelector('#operation_category_form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.store-operation-category') }}";

            try {
                const result = await fetch_cycle('--Store Operation Category', url, 'POST', formData);
                if (result.status === 'success') {
                    const tableBody = document.querySelector('#tbl-operation-categories tbody');
                    tableBody.innerHTML = result.operation_categories.map(category => `
                        <tr>
                            <td>${category.name}</td>
                            <td>${category.description || ""}</td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <button class="btn btn-outline-primary btn-sm" onclick="editOperationCategory(${category.operation_category_id}, '${category.name}', '${category.description || ""}')">
                                        <i class="las la-edit"></i> Edit
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm" onclick="confirmCategoryDeletion(${category.operation_category_id}, '${category.name}')">
                                        <i class="las la-trash-alt"></i> Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `).join('');
                }
            } catch (error) {
                console.error('Error storing operation category:', error);
            }
        });

        // Edit Operation Category
        document.querySelector('#edit_operation_category_form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.update-operation-category') }}";

            try {
                const result = await fetch_cycle('--Update Operation Category', url, 'POST', formData);
                if (result.status === 'success') {
                    const updatedCategories = result.operation_categories.map(
                        category => new OperationCategoryObject(category.operation_category_id, category.name, category.description)
                    );

                    categoriesTable.clear();
                    categoriesTable.rows.add(updatedCategories).draw();
                }
            } catch (error) {
                console.error('Error updating operation category:', error);
            }
        });

        // Store Operation Log
        document.querySelector('#operations-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.store-operation') }}";

            try {
                const result = await fetch_cycle('--Store Operation Log', url, 'POST', formData);
                if (result.status === 'success') {
                    const tableBody = document.querySelector('#tbl-operations-log tbody');
                    tableBody.innerHTML = result.operation_logs.map(log => `
                        <tr>
                            <td>${log.operation_name}</td>
                            <td>${log.operation_code || ''}</td>
                            <td>${log.operation_type || ''}</td>
                            <td>${log.operation_category || ''}</td>
                            <td>${log.operation_unit || ''}</td>
                            <td>${log.expected_waste_per_operation || ''}</td>
                            <td>${log.expected_water_usage_per_operation || ''}</td>
                            <td>${log.expected_unit_produced_for_goods || ''}</td>
                            <td>${log.calendar_year_name || ''}</td>
                            <td>${log.start_date || ''}</td>
                            <td>${log.end_date || ''}</td>
                            <td>
                                <span class="badge bg-${log.status === 'active' ? 'success' : 'danger'}">
                                    ${log.status}
                                </span>
                            </td>
                            <td class="text-end">
                                <div class="dropdown d-inline-block">
                                    <a class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button">
                                        <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#" onclick="triggerUpdateOperation('${log.company_operation_id}')">Update</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    `).join('');
                }
            } catch (error) {
                console.error('Error storing operation log:', error);
            }
        });

        // Store Quality Control
        document.querySelector('#quality-control-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.store-quality-control') }}";

            try {
                const result = await fetch_cycle('--Store Quality Control', url, 'POST', formData);
                if (result.status === 'success') {
                    const tableBody = document.querySelector('#tbl-quality-control tbody');
                    tableBody.innerHTML = result.quality_controls_record.map(control => `
                        <tr>
                            <td>${control.quality_metric}</td>
                            <td>${control.acceptable_range}</td>
                            <td>${control.measurement_frequency}</td>
                            <td>${control.responsible_person}</td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-sm btn-primary me-2">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </div>
                            </td>
                        </tr>
                    `).join('');
                }
            } catch (error) {
                console.error('Error storing quality control:', error);
            }
        });

        // Store Waste Item
        document.querySelector('#submit-waste-item').addEventListener('click', async function () {
            const form = document.querySelector('#waste-item-form');
            const formData = new FormData(form);
            const url = "{{ route('admin.store-waste') }}";

            try {
                const result = await fetch_cycle('--Store Waste Item', url, 'POST', formData);
                if (result.status === 'success') {
                    const tableBody = document.querySelector('#tbl-waste-items tbody');
                    tableBody.innerHTML = result.waste_items.map(item => `
                        <tr>
                            <td>${item.waste_name}</td>
                            <td>${item.waste_type}</td>
                            <td>${item.unit}</td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-sm btn-primary me-2">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </div>
                            </td>
                        </tr>
                    `).join('');
                }
            } catch (error) {
                console.error('Error storing waste item:', error);
            }
        });
    </script>
    <!-- operations -->

    <!-- Production Log -->
    <script>
        /**
         * Production Log Section
         * 
         * This section handles the dynamic addition of materials, chemicals, and products
         * for the production log form. It also manages the submission of the production log
         * and updates the production log table accordingly.
         * 
         * - initializeMaterialSection: Handles dynamic material rows.
         * - initializeChemicalSection: Handles dynamic chemical rows.
         * - initializeProductSection: Handles dynamic product rows.
         * - Form submission: Handles production log form submission and table update.
         */
        document.addEventListener('DOMContentLoaded', function () {
            /**
             * Initialize the "Add More Material" functionality for a section.
             * @param {string} containerSelector - Selector for the parent container where rows will be added.
             * @param {string} buttonSelector - Selector for the button to trigger adding a new row.
             */
            function initializeMaterialSection(containerSelector, buttonSelector) {
                const container = document.querySelector(containerSelector);
                const addButton = document.querySelector(buttonSelector);
                let materialIndex = 1;

                async function createMaterialRow(index) {
                    const newRow = document.createElement('div');
                    newRow.classList.add('row', 'g-2', 'align-items-end', 'mb-3');
                    newRow.innerHTML = `
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="material-used-${index}">Material Needed</label>
                                <select id="material-used-${index}" class="form-select material-select" name="material_used[${index}][material_id]" required>
                                    <option value="" selected disabled>Select Material</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="material-quantity-${index}">Quantity</label>
                                <input id="material-quantity-${index}" type="number" class="form-control" name="material_used[${index}][quantity]" placeholder="Quantity" min="0" step="any" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="expected_unit" class="form-label fw-semibold">Unit</label>
                            <input type="text" class="form-control" id="expected_unit" name="material_used[${index}][unit]" placeholder="Unit">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-outline-danger btn-sm remove-material-quantity">Remove</button>
                        </div>
                    `;
                    const materialSelect = newRow.querySelector(`#material-used-${index}`);
                    const companyID = "{{ json_encode($company->company_id) }}";
                    const url = `/admin/get-materials/${companyID}`;
                    try {
                        const data = await fetchFieldInput(url);
                        data.company_materials.forEach(material => {
                            if (material.material) {
                                const option = document.createElement('option');
                                option.value = material.materialID;
                                option.textContent = material.material.material;
                                materialSelect.appendChild(option);
                            }
                        });
                    } catch (error) {
                        console.error("Error fetching materials:", error);
                        alert("Failed to load materials. Please try again.");
                    }
                    return newRow;
                }

                addButton.addEventListener('click', async function () {
                    const newRow = await createMaterialRow(materialIndex);
                    container.appendChild(newRow);
                    materialIndex++;
                });

                container.addEventListener('click', function (e) {
                    if (e.target.classList.contains('remove-material-quantity')) {
                        e.target.closest('.row').remove();
                    }
                });
            }

            initializeMaterialSection('.material-quantity-used-container-production-log', '.add-more-material-used-production-log');
            initializeMaterialSection('.material-quantity-used-container-annual-operation-activity', '.add-more-material-quantity-annual-operation-activity');
        });

        document.addEventListener('DOMContentLoaded', function () {
            /**
             * Initialize the "Add More Chemical" functionality for a section.
             * @param {string} containerSelector - Selector for the parent container where rows will be added.
             * @param {string} buttonSelector - Selector for the button to trigger adding a new row.
             */
            function initializeChemicalSection(containerSelector, buttonSelector) {
                const container = document.querySelector(containerSelector);
                const addButton = document.querySelector(buttonSelector);
                let chemicalIndex = 1;

                async function createChemicalRow(index) {
                    const newRow = document.createElement('div');
                    newRow.classList.add('row', 'g-2', 'align-items-end', 'mb-3');
                    newRow.innerHTML = `
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="chemical-used-${index}">Chemical Needed</label>
                                <select id="chemical-used-${index}" class="form-select chemical-select" name="chemical_used[${index}][chemical_id]" required>
                                    <option value="" selected disabled>Select Chemical</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="chemical-quantity-${index}">Quantity</label>
                                <input id="chemical-quantity-${index}" type="number" class="form-control" name="chemical_used[${index}][quantity]" placeholder="Used Quantity" min="0" step="any" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="chemical_unit" class="form-label fw-semibold">Unit</label>
                            <input type="text" class="form-control" id="chemical_unit" name="chemical_used[${index}][unit]" placeholder="Unit">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-outline-danger btn-sm remove-chemical-quantity">Remove</button>
                        </div>
                    `;
                    const chemicalSelect = newRow.querySelector(`#chemical-used-${index}`);
                    const companyID = "{{ json_encode($company->company_id) }}";
                    const url = `/admin/get-chemicals/${companyID}`;
                    try {
                        const data = await fetchFieldInput(url);
                        data.company_chemicals.forEach(chemical => {
                            if (chemical.chemical) {
                                const option = document.createElement('option');
                                option.value = chemical.chemicalID;
                                option.textContent = chemical.chemical.name;
                                chemicalSelect.appendChild(option);
                            }
                        });
                    } catch (error) {
                        console.error("Error fetching chemicals:", error);
                        alert("Failed to load chemicals. Please try again.");
                    }
                    return newRow;
                }

                addButton.addEventListener('click', async function () {
                    const newRow = await createChemicalRow(chemicalIndex);
                    container.appendChild(newRow);
                    chemicalIndex++;
                });

                container.addEventListener('click', function (e) {
                    if (e.target.classList.contains('remove-chemical-quantity')) {
                        e.target.closest('.row').remove();
                    }
                });
            }

            initializeChemicalSection('.chemical-quantity-container-production-log', '.add-more-chemical-used-production-log');
            initializeChemicalSection('.chemical-quantity-container-annual-operation-activity', '.add-more-chemical-quantity-annual-operation-activity');
        });

        document.addEventListener('DOMContentLoaded', function () {
            /**
             * Initialize the "Add More Product" functionality for a section.
             * @param {string} containerSelector - Selector for the parent container where rows will be added.
             * @param {string} buttonSelector - Selector for the button to trigger adding a new row.
             */
            function initializeProductSection(containerSelector, buttonSelector) {
                const container = document.querySelector(containerSelector);
                const addButton = document.querySelector(buttonSelector);
                let productIndex = 1;

                async function createProductRow(index) {
                    const newRow = document.createElement('div');
                    newRow.classList.add('row', 'g-2', 'align-items-end', 'mb-3');
                    newRow.innerHTML = `
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="produced-product-${index}">Produced Product</label>
                                <select id="produced-product-${index}" class="form-select product-select" name="product_produced[${index}][product_id]" required>
                                    <option value="" selected disabled>Select Product</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="produced-quantity-${index}">Quantity Produced</label>
                                <input id="produced-quantity-${index}" type="number" class="form-control" name="product_produced[${index}][quantity]" placeholder="Produced Quantity" min="0" step="any" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-outline-danger btn-sm remove-product-quantity">Remove</button>
                        </div>
                    `;
                    const productSelect = newRow.querySelector(`#produced-product-${index}`);
                    const companyID = "{{ json_encode($company->company_id) }}";
                    const url = `/admin/get-product/${companyID}`;
                    try {
                        const data = await fetchFieldInput(url);
                        data.products.forEach(product => {
                            const option = document.createElement('option');
                            option.value = product.product_id;
                            option.textContent = product.name;
                            productSelect.appendChild(option);
                        });
                    } catch (error) {
                        console.error("Error fetching products:", error);
                    }
                    return newRow;
                }

                addButton.addEventListener('click', async function () {
                    const newRow = await createProductRow(productIndex);
                    container.appendChild(newRow);
                    productIndex++;
                });

                container.addEventListener('click', function (e) {
                    if (e.target.classList.contains('remove-product-quantity')) {
                        e.target.closest('.row').remove();
                    }
                });
            }

            initializeProductSection('.operation-log-product-quantity-container', '.add-more-operation-log-product-quantity-operation');
        });

        /**
         * Waste Section for Production Log
         * 
         * This section handles the dynamic addition of waste items for the production log form.
         * It allows users to add/remove waste rows and select waste types, enter quantities, and units.
         */
        document.addEventListener('DOMContentLoaded', function () {
            /**
             * Initialize the "Add More Waste" functionality for a section.
             * @param {string} containerSelector - Selector for the parent container where rows will be added.
             * @param {string} buttonSelector - Selector for the button to trigger adding a new row.
             */
            function initializeWasteSection(containerSelector, buttonSelector) {
                const container = document.querySelector(containerSelector);
                const addButton = document.querySelector(buttonSelector);
                let wasteIndex = 1;

                async function createWasteRow(index) {
                    const newRow = document.createElement('div');
                    newRow.classList.add('row', 'g-2', 'align-items-end', 'mb-3');
                    newRow.innerHTML = `
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="waste-type-${index}">Waste Type</label>
                                <select id="waste-type-${index}" class="form-select waste-select" name="waste_generated[${index}][waste_id]" required>
                                    <option value="" selected disabled>Select Waste</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="waste-quantity-${index}">Quantity</label>
                                <input id="waste-quantity-${index}" type="number" class="form-control" name="waste_generated[${index}][quantity]" placeholder="Quantity" min="0" step="any" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="waste_unit" class="form-label fw-semibold">Unit</label>
                            <input type="text" class="form-control" id="waste_unit" name="waste_generated[${index}][unit]" placeholder="Unit">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-outline-danger btn-sm remove-waste-quantity">Remove</button>
                        </div>
                    `;
                    const wasteSelect = newRow.querySelector(`#waste-type-${index}`);
                    const companyID = "{{ json_encode($company->company_id) }}";
                    const url = `/admin/get-waste/${companyID}`;
                    try {
                        const data = await fetchFieldInput(url);
                        if (data.company_wastes && Array.isArray(data.company_wastes)) {
                            data.company_wastes.forEach(waste => {
                                const option = document.createElement('option');
                                option.value = waste.company_waste_id;
                                option.textContent = waste.waste_name;
                                wasteSelect.appendChild(option);
                            });
                        }
                    } catch (error) {
                        console.error("Error fetching wastes:", error);
                        alert("Failed to load wastes. Please try again.");
                    }
                    return newRow;
                }

                addButton.addEventListener('click', async function () {
                    const newRow = await createWasteRow(wasteIndex);
                    container.appendChild(newRow);
                    wasteIndex++;
                });

                container.addEventListener('click', function (e) {
                    if (e.target.classList.contains('remove-waste-quantity')) {
                        e.target.closest('.row').remove();
                    }
                });
            }

            // Example usage for production log waste section
            initializeWasteSection('.annual-operation-activity-waste-quantity-container', '.add-more-annual-activity-waste-quantity-operation');
        });

        document.querySelector('#production-log-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.store-production-log') }}";

        await fetch_cycle('--Store Production Log', url, 'POST', formData).then(result => {
                if (result.status === 'success') {
                    const tableBody = document.querySelector('#tbl-production-logs tbody');
                    tableBody.innerHTML = result.production_logs.map(log => `
                        <tr>
                            <td>${log.production_title}</td>
                            <td>${log.operation?.operation_name || 'N/A'}</td>
                            <td>${log.material?.material_name || 'N/A'} (${log.quantity_used})</td>
                            <td>${log.chemical?.name || 'N/A'} (${log.chemical?.volume_used || 0} Liters)</td>
                            <td>${log.amount_of_water_used} Liters</td>
                            <td>${log.product?.name || 'N/A'} (${log.product?.quantity_produced || 0} Produced, ${log.product?.quantity_defected || 0} Defected)</td>
                            <td>${new Date(log.production_date).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' })}</td>
                            <td>
                                <span class="badge bg-${log.production_status === 'completed' ? 'success' : (log.production_status === 'ongoing' ? 'primary' : 'danger')}">
                                    ${log.production_status.charAt(0).toUpperCase() + log.production_status.slice(1)}
                                </span>
                            </td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <button class="btn btn-outline-primary btn-sm" onclick="editProductionLog(${log.id})">Edit</button>
                                    <button class="btn btn-outline-danger btn-sm" onclick="deleteProductionLog(${log.id})">Delete</button>
                                </div>
                            </td>
                        </tr>
                    `).join('');
                }
            });
        });
    </script>
    <!-- End Production Log -->

    <!-- Calendar Year Management Script -->
    <script>
        // Calendar Year Management
        // This section handles the submission and update of the company calendar year table.
        document.querySelector('#calendar_year_form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.store-calendar-year') }}";

            try {
                const result = await fetch_cycle('--Store Calendar Year', url, 'POST', formData);
                if (result.status === 'success') {
                    updateCalendarYearTable(result.calendar_years);
                }
            } catch (error) {
                console.error('Error storing calendar year:', error);
            }
        });

        /**
         * Updates the Calendar Year table with new data.
         * @param {Array} calendarYears - Array of calendar year objects.
         */
        function updateCalendarYearTable(calendarYears) {
            const tableBody = document.querySelector('#calendar_year_table tbody');
            tableBody.innerHTML = calendarYears.map(year => `
                <tr>
                    <td>${year.name || ''}</td>
                    <td>${year.start_date || ''}</td>
                    <td>${year.end_date || ''}</td>
                    <td class="text-end">
                        <button class="btn btn-sm btn-primary" onclick="editCalendar('${year.calendar_year_id}')">Edit</button>
                        <button class="btn btn-sm btn-danger" onclick="deleteCalendar('${year.calendar_year_id}')">Delete</button>
                    </td>
                </tr>
            `).join('');
        }
    </script>
    <!-- End Calendar Year Management Script -->

    <!-- Product Management Script -->
    <script>
        /**
         * (No code provided in the selection.)
         *
         * Please provide the code you want documented.
         */
        // Utility function to update table content
        function updateTableContent(tableSelector, data, rowTemplate) {
            const tableBody = document.querySelector(tableSelector);
            tableBody.innerHTML = data.map(rowTemplate).join('');
        }

        // Store Product Category
        document.querySelector('#add-product-category-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.store-product-category') }}";

            try {
                const result = await fetch_cycle('--Store Product Category', url, 'POST', formData);
                if (result.status === 'success') {
                    updateTableContent('#tbl-product-categories tbody', result.product_categories, category => `
                        <tr>
                            <td>${category.name}</td>
                            <td>${category.description}</td>
                            <td class="text-end">
                                <div class="dropdown d-inline-block">
                                    <a class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button">
                                        <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Update</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    `);
                }
            } catch (error) {
                console.error('Error storing product category:', error);
            }
        });

        // Edit Product Category
        document.querySelector('#edit-product-category-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.update-product-category') }}";

            try {
                const result = await fetch_cycle('--Update Product Category', url, 'POST', formData);
                if (result.status === 'success') {
                    updateTableContent('#tbl-product-categories tbody', result.product_categories, category => `
                        <tr>
                            <td>${category.name}</td>
                            <td>${category.description}</td>
                            <td class="text-end">
                                <div class="dropdown d-inline-block">
                                    <a class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button">
                                        <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Update</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    `);
                }
            } catch (error) {
                console.error('Error updating product category:', error);
            }
        });

        // Store Product
        document.querySelector('#add-product-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.store-product') }}";

            try {
                const result = await fetch_cycle('--Store Product', url, 'POST', formData);
                if (result.status === 'success') {
                    updateTableContent('#tbl-products tbody', result.products, product => `
                        <tr>
                            <td>${product.name}</td>
                            <td>${product.product_category.name}</td>
                            <td>${product.currency} ${product.price}</td>
                            <td>${product.quantity_per_unit}</td>
                            <td>${product.unit}</td>
                            <td class="text-end">
                                <button class="btn btn-primary btn-sm">Edit</button>
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                    `);
                }
            } catch (error) {
                console.error('Error storing product:', error);
            }
        });
    </script>
    <!-- Product Management Script -->
     
    <!-- Annual Operation log -->
    <script>
        // Annual Operation Metadata Management
        // This section handles fetching, displaying, and managing annual operation metadata logs.
        let annualOperationMetadataTable = $('#tbl-annual-operations-metadata-log').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            responsive: true,
            columnDefs: [
                { orderable: false, targets: [5] } // Disable sorting on the "Action" column
            ],
            data: [], // Start with an empty data array
            columns: [
                { data: 'operation_name', title: 'Operation Name' },
                { data: 'calendarYear', title: 'Calendar Year' },
                { data: 'expected_operations_per_year', title: 'Expected Operations (Per Year)' },
                {
                    data: 'prepared_by',
                    title: 'Prepared By',
                    render: function(data, type, row) {
                        if (type === 'display' && data !== 'N/A') {
                            return data; // HTML content for rendering Prepared By column
                        }
                        return 'N/A'; // Fallback
                    }
                },
                { data: 'status', title: 'Operation Status' },
                {
                    data: null,
                    title: 'Actions',
                    render: function (data, type, row) {
                        return `
                            <div class="d-flex justify-content-end gap-2">
                                <button class="btn btn-primary btn-sm" onclick="addActivityAnnualOperationLog(${row.id}, '${row.operation_name}')">
                                    <i class="fas fa-tasks"></i> Manage Activities
                                </button>
                                <button class="btn btn-success btn-sm" onclick="editAnnualOperationLog(${row.id})">
                                    <i class="fas fa-edit"></i> Edit Log
                                </button>
                                <button class="btn btn-danger btn-sm" onclick="deleteAnnualOperationLog(${row.id})">
                                    <i class="fas fa-trash-alt"></i> Delete Log
                                </button>
                            </div>`;
                    }
                }
            ]
        });

        document.querySelector('#annualOperationsLogCollapse').addEventListener('shown.bs.collapse', async () => {
            // Initialize DataTable for Annual Operations Metadata Log
            console.log("Annual Operations Metadata Log initialized");
            // const annualOperationMetadataTable = $('#tbl-annual-operations-metadata-log').DataTable();
            
            const companyId = "{{ json_encode($company->company_id) }}";
            console.log("Company ID:", companyId);
            
            const url = `/admin/metadata/company/${companyId}`;
            const spinner = document.getElementById('loading-spinner');

            showElement(spinner);

            try {
                const data = await fetchFieldInput(url);

                if (data.status === "success" && Array.isArray(data.annual_operation_metadata)) {
                    const logs = data.annual_operation_metadata.map(log => {
                        let preparedBy = "N/A";

                        // Attempt to parse the PreparedBy JSON string
                        try {
                            const parsedPreparedBy = JSON.parse(log.PreparedBy);
                            if (Array.isArray(parsedPreparedBy) && parsedPreparedBy.length > 0) {
                                preparedBy = parsedPreparedBy.map(prep => `
                                    <div style="display: flex; align-items: center; gap: 10px;">
                                        <img src="${prep.avatar}" alt="${prep.name}" style="width: 30px; height: 30px; border-radius: 50%;" />
                                        <div>
                                            <strong>${prep.name}</strong><br />
                                            <small>${prep.email}</small>
                                        </div>
                                    </div>
                                `).join("<br />");
                            }
                        } catch (e) {
                            console.error("Error parsing PreparedBy field:", e);
                        }

                        return {
                            operation_name: log.OperationName || "N/A",
                            calendarYear: log.calendar_year?.name || "N/A",
                            expected_operations_per_year: log.annual_no_of_operation || "N/A",
                            prepared_by: preparedBy,
                            status: log.Status || "N/A",
                            id: log.annual_op_metadata_ID || "N/A"
                        };
                    });

                    // Populate the table with the fetched data
                    annualOperationMetadataTable.clear();
                    annualOperationMetadataTable.rows.add(logs).draw();

                    // Enable rendering HTML in the 'Prepared By' column
                    annualOperationMetadataTable.columns().every(function () {
                        this.render(function (data, type, row) {
                            if (type === 'display') {
                                return data;
                            }
                            return data;
                        });
                    });
                } else {
                    displayMessage('warning', 'No annual operation logs found or invalid data structure.');
                }
            } catch (error) {
                console.error("Error fetching annual operation logs:", error);
                displayMessage('danger', 'An error occurred while fetching annual operation logs. Please try again.');
            } finally {
                hideElement(spinner);
            }

        });

        // Form submission for storing annual operation log
        document.querySelector('#annual-operations-log-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            let manager = manager_4.getSelectedUserIds();
            if (manager.length === 0) {
                displayMessage('warning', 'Please select at least one manager.');
                return;
            }

            manager.forEach(id => {
                formData.append('prepared_by_ids[]', id);
            });

            const url = "{{ route('admin.store-annual-operation-metadata') }}";

            try {
                const result = await fetch_cycle('--Store Annual Operation Log', url, 'POST', formData);
                if (result.status === 'success') {
                    console.log("Annual operation log stored successfully:", result.annual_operation_metadatas);
                    updateAnnualOperationLogTable(result.annual_operation_metadatas);
                }
            } catch (error) {
                console.log('Error storing annual operation log:', error);
            }
        });
        /**
         * Updates the Annual Operation Log table with new data.
         * @param {Array} logs - Array of annual operation logs.
         */
        function updateAnnualOperationLogTable(logs) {
            if (Array.isArray(logs)) {
                // Transform logs to match DataTable columns
                const formattedLogs = logs.map(log => {
                let preparedBy = "N/A";
                try {
                    const parsedPreparedBy = JSON.parse(log.PreparedBy);
                    if (Array.isArray(parsedPreparedBy) && parsedPreparedBy.length > 0) {
                    preparedBy = parsedPreparedBy.map(prep => `
                        <div style="display: flex; align-items: center; gap: 10px;">
                        <img src="${prep.avatar}" alt="${prep.name}" style="width: 30px; height: 30px; border-radius: 50%;" />
                        <div>
                            <strong>${prep.name}</strong><br />
                            <small>${prep.email}</small>
                        </div>
                        </div>
                    `).join("<br />");
                    }
                } catch (e) {
                    // ignore parse error, fallback to N/A
                }
                return {
                    operation_name: log.OperationName || "N/A",
                    calendarYear: log.calendar_year?.name || "N/A",
                    expected_operations_per_year: log.annual_no_of_operation || "N/A",
                    prepared_by: preparedBy,
                    status: log.Status || "N/A",
                    id: log.annual_op_metadata_ID || "N/A"
                };
                });
                annualOperationMetadataTable.clear().rows.add(formattedLogs).draw();
            }
        }

        /**
         * Adds an activity for the specified metadata ID.
         * @param {number} metadataId - The ID of the metadata to add an activity for.
         */
        function addActivityAnnualOperationLog(metadataId, metadataName) {
            console.log("Adding activity for metadata ID:", metadataId);

            const form = document.querySelector('form#annual-operations-activity-form');
            document.getElementById('annualOperationsActivityModalLabel').textContent = `Annual Operations Activities for Annual Operation Metadata: ${metadataName}`;
            if (!form) {
                console.log('Form with ID "annual-operations-activity-form" not found.');
                return;
            }

            // Reset the form and populate default options
            form.reset();

            // Set the metadata ID in the form
            const metadataInput = form.querySelector('input[name="annual_op_metadata_ID"]');
            if (metadataInput) {
                metadataInput.value = metadataId;
            } else {
                console.log('Input field "annual_op_metadata_ID" not found in the form.');
            }

            // Show the modal for adding activities
            const modalElement = document.getElementById('annualOperationsActivityModal');
            if (modalElement) {
                const modal = new bootstrap.Modal(modalElement);
                modal.show();
            } else {
                console.log('Modal with ID "annualOperationsActivityModal" not found.');
            }
        }

        // annual operation activity
        let annualOperationsActivityTable = $('#tbl-annual-operations-activity').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            responsive: true,
            destroy: true,
            columnDefs: [
                { orderable: false, targets: [6] } // Disable sorting on the "Action" column
            ],
            data: [],
            columns: [
                { data: 'activity_name', title: 'Activity Name' },
                { data: 'operation_name', title: 'Operation Name' },
                { data: 'start_date', title: 'Start Date' },
                { data: 'end_date', title: 'End Date' },
                { data: 'priority', title: 'Priority' },
                { data: 'tags', title: 'Tags' },
                {
                    data: null,
                    title: 'Actions',
                    render: function (data, type, row) {
                        return `
                            <div class="d-flex justify-content-end gap-2">
                                <button class="btn btn-primary btn-sm" onclick="editActivity(${row.id})">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <button class="btn btn-danger btn-sm" onclick="deleteActivity(${row.id})">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </div>`;
                    }
                }
            ]
        });
        // Annual Operations Activity Modal: Fetch and display activities for the selected annual operation metadata
        // This section listens for the modal to be shown, then fetches activities and populates the DataTable.
        // Listen for when the Annual Operations Activity Modal is shown
        document.getElementById('annualOperationsActivityModal').addEventListener('shown.bs.modal', async function () {
            const metadataId = document.querySelector('input[name="annual_op_metadata_ID"]').value;
            if (!metadataId) return;

            const url = `/admin/metadata/activities/${metadataId}`;
            const spinner = document.getElementById('loading-spinner');
            showElement(spinner);

            try {
                const data = await fetchFieldInput(url);
                if (data.status === "success" && Array.isArray(data.activities)) {
                    const activities = data.activities.map(activity => ({
                        activity_name: activity.activity_name || "N/A",
                        operation_name: activity.operation?.operation_name || "N/A",
                        start_date: activity.start_date ? new Date(activity.start_date).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }) : "N/A",
                        end_date: activity.end_date ? new Date(activity.end_date).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }) : "N/A",
                        priority: activity.priority || "N/A",
                        tags: activity.tags || "N/A",
                        id: activity.id || "N/A"
                    }));

                    annualOperationsActivityTable.clear().rows.add(activities).draw();
                } else {
                    displayMessage('warning', 'No activities found for this metadata.');
                    annualOperationsActivityTable.clear().draw();
                }
            } catch (error) {
                console.error("Error fetching activities:", error);
                displayMessage('danger', 'An error occurred while fetching activities. Please try again.');
                annualOperationsActivityTable.clear().draw();
            } finally {
                hideElement(spinner);
            }
        });
        // Form submission for adding activities
        // This section listens for the form submission, collects data, and sends it to the server.
        // Form submission for adding activities
        document.querySelector('#annual-operations-activity-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            console.log('====================================');
            console.log('Annual Operations Activity Form submitted');
            console.log('====================================');
            const formData = new FormData(this);
            const url = "{{ route('admin.store-activity') }}";

            // Show loading spinner
            const spinner = document.getElementById('loading-spinner');
            showElement(spinner);
            // Store the activity data
            try {
                const result = await fetch_cycle('--Store Annual Operation Activity', url, 'POST', formData);
                if (result.status === 'success') {
                    if (Array.isArray(result.activities)) {
                        const activities = result.activities.map(activity => ({
                            activity_name: activity.activity_name || "N/A",
                            operation_name: activity.operation?.operation_name || "N/A",
                            start_date: activity.start_date ? new Date(activity.start_date).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }) : "N/A",
                            end_date: activity.end_date ? new Date(activity.end_date).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }) : "N/A",
                            priority: activity.priority || "N/A",
                            tags: activity.tags || "N/A",
                            id: activity.id || "N/A"
                        }));
                        annualOperationsActivityTable.clear().rows.add(activities).draw();
                    }
                }
            } catch (error) {
                console.error('Error storing annual operation activity:', error);
            }
        });

    </script>
    <!-- Annual Operation log -->

    <!-- Batch tracking -->
    <script>
document.addEventListener('DOMContentLoaded', function () {
    // --- Batch Tracking Table ---
    const batchTrackingTable = $('#tbl-batch-tracking').DataTable({
        paging: true,
        searching: true,
        ordering: true,
        responsive: true,
        destroy: true,
        columnDefs: [{ orderable: false, targets: [5] }],
        data: [],
        columns: [
            { data: 'batch_name', title: 'Batch Name' },
            { data: 'product_name', title: 'Product Name' },
            { data: 'start_date', title: 'Start Date' },
            { data: 'end_date', title: 'End Date' },
            {
                data: 'status',
                title: 'Status',
                render: function (data, type) {
                    if (type === 'display') {
                        let badgeClass = 'secondary';
                        let label = data || 'N/A';
                        if (typeof data === 'string') {
                            switch (data.toLowerCase()) {
                                case 'completed': badgeClass = 'success'; break;
                                case 'pending': badgeClass = 'warning'; break;
                                case 'rejected': badgeClass = 'dark'; break;
                            }
                        }
                        return `<span class="badge bg-${badgeClass}">${label.charAt(0).toUpperCase() + label.slice(1)}</span>`;
                    }
                    return data;
                }
            },
            {
                data: null,
                title: 'Actions',
                render: function (data, type, row) {
                    return `
                        <div class="d-flex justify-content-end gap-2">
                            <button class="btn btn-info btn-sm setup-production-btn">
                                <i class="fas fa-cogs"></i> Setup Production Process
                            </button>
                            <button class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </div>`;
                }
            }
        ]
    });

    // --- Fetch Batch Tracking Data ---
    document.getElementById('batchTrackingCollapse').addEventListener('shown.bs.collapse', async () => {
        const companyId = "{{ json_encode($company->company_id) }}";
        const url = `/admin/batch-tracking/company/${companyId}`;
        const spinner = document.getElementById('loading-spinner');
        showElement(spinner);

        try {
            const data = await fetchFieldInput(url);
            if (data.status === "success" && Array.isArray(data.production_batch_tracking)) {
                const batchTrackingData = data.production_batch_tracking.map(batch => ({
                    batch_name: batch.batch_name || "N/A",
                    product_name: batch.product?.name || "N/A",
                    start_date: batch.start_date ? new Date(batch.start_date).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }) : "N/A",
                    end_date: batch.end_date ? new Date(batch.end_date).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }) : "N/A",
                    status: batch.status || "N/A",
                    batch_id: batch.batch_id || "N/A"
                }));
                batchTrackingTable.clear().rows.add(batchTrackingData).draw();
            } else {
                displayMessage('warning', 'No batch tracking data found or invalid data structure.');
            }
        } catch (error) {
            console.error("Error fetching batch tracking data:", error);
            displayMessage('danger', 'An error occurred while fetching batch tracking data. Please try again.');
        } finally {
            hideElement(spinner);
        }
    });

    // Make toggleBatchTrackingForm globally accessible
    window.toggleBatchTrackingForm = function () {
        const form = document.getElementById('batch-tracking-form-container');
        form.classList.toggle('d-none');
        if (!form.classList.contains('d-none')) {
            form.scrollIntoView({ behavior: 'smooth' });
        }
    };

    // --- Add Batch Tracking ---
    document.querySelector('#batch-tracking-form').addEventListener('submit', async function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        const url = "{{ route('admin.store-batch-tracking') }}";
        try {
            const result = await fetch_cycle('--Store Batch Tracking', url, 'POST', formData);
            if (result.status === 'success') {
                const batch = result.productionBatchTracking;
                const newRow = {
                    batch_name: batch.batch_name || "N/A",
                    product_name: batch.product?.name || "N/A",
                    start_date: batch.start_date ? new Date(batch.start_date).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }) : "N/A",
                    end_date: batch.end_date ? new Date(batch.end_date).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }) : "N/A",
                    status: batch.status || "N/A",
                    batch_id: batch.batch_id || "N/A"
                };
                batchTrackingTable.row.add(newRow).draw(false);
            }
        } catch (error) {
            console.error('Error storing batch tracking:', error);
        }
    });

    // --- Setup Production Process Modal ---
    $(document).on('click', '.setup-production-btn', function () {
        const rowData = batchTrackingTable.row($(this).closest('tr')).data();
        const batchId = rowData.batch_id || '';
        const productionProcessForm = document.getElementById('production-process-form');
        if (productionProcessForm) productionProcessForm.reset();
        document.getElementById('batch_id').value = batchId;
        showProductionProcessModal(batchId);
    });

    // --- Show/Hide Production Process Form/Table ---
    function showProductionProcessTable() {
        
        document.getElementById('production-process-form-container').classList.add('d-none');
        document.getElementById('production-process-table-container').classList.remove('d-none');
    }
    function showProductionProcessForm() {
        document.getElementById('production-process-form-container').classList.remove('d-none');
        document.getElementById('production-process-table-container').classList.add('d-none');
    }
    $('#productionProcessModal').on('show.bs.modal', showProductionProcessTable);
    document.getElementById('show-production-process-form')?.addEventListener('click', showProductionProcessForm);
    document.getElementById('cancel-production-process-form')?.addEventListener('click', showProductionProcessTable);
    document.getElementById('close-production-process-form')?.addEventListener('click', showProductionProcessTable);

    // --- Production Process Table ---
    const productionProcessTable = $('#tbl-production-process').DataTable({
        paging: true,
        searching: true,
        ordering: true,
        responsive: true,
        destroy: true,
        columnDefs: [{ orderable: false, targets: [5] }],
        data: [],
        columns: [
            { data: 'workflow_name', title: 'Workflow' },
            { data: 'start_date', title: 'Start Date' },
            { data: 'end_date', title: 'End Date' },
            { data: 'remarks', title: 'Remarks' },
            {
                data: 'status',
                title: 'Status',
                render: (data, type) => {
                    if (type === 'display') {
                        let badgeClass = 'secondary';
                        let label = data || 'N/A';
                        switch ((data || '').toLowerCase()) {
                            case 'completed': badgeClass = 'success'; break;
                            case 'pending': badgeClass = 'warning'; break;
                            case 'rejected': badgeClass = 'dark'; break;
                        }
                        return `<span class="badge bg-${badgeClass}">${label.charAt(0).toUpperCase() + label.slice(1)}</span>`;
                    }
                    return data;
                }
            },
            {
                data: null,
                title: 'Actions',
                render: (data, type, row) => `
                    <div class="d-flex justify-content-end gap-2">
                        <button class="btn btn-outline-primary btn-sm" onclick="editProductionProcess(${row.process_id})">Edit</button>
                        <button class="btn btn-outline-danger btn-sm" onclick="deleteProductionProcess(${row.process_id})">Delete</button>
                    </div>
                `
            }
        ]
    });

    // --- Fetch Production Process Table for Batch ---
    window.showProductionProcessModal = function (batchId) {
        const modalElement = document.getElementById('productionProcessModal');
        if (!modalElement) return;
        (async function populateProductionProcessTable() {
            if (!batchId) return;
            const url = `/admin/get-production-process/${batchId}`;
            try {
                const data = await fetchFieldInput(url);
                if (data.status === "success" && Array.isArray(data.production_processes)) {
                    const processes = data.production_processes.map(proc => ({
                        workflow_name: (proc.workflow && proc.workflow.workflow_name) ? proc.workflow.workflow_name : 'N/A',
                        start_date: proc.start_time ? (() => { const d = new Date(proc.start_time); return isNaN(d) ? 'N/A' : `${d.getFullYear()}-${String(d.getMonth() + 1).padStart(2, '0')}-${String(d.getDate()).padStart(2, '0')}`; })() : 'N/A',
                        end_date: proc.end_time ? (() => { const d = new Date(proc.end_time); return isNaN(d) ? 'N/A' : `${d.getFullYear()}-${String(d.getMonth() + 1).padStart(2, '0')}-${String(d.getDate()).padStart(2, '0')}`; })() : 'N/A',
                        remarks: proc.remarks || '',
                        status: proc.status || 'N/A',
                        process_id: proc.process_id || ''
                    }));
                    productionProcessTable.clear().rows.add(processes).draw();
                } else {
                    productionProcessTable.clear().draw();
                }
            } catch (error) {
                console.error("Error fetching production process data:", error);
                productionProcessTable.clear().draw();
            } finally {
                hideElement(document.getElementById('loading-spinner'));
                const modal = new bootstrap.Modal(modalElement);
                modal.show();
            }
        })();
    };

    // --- Production Process Form Submission ---
    document.getElementById('production-process-form').addEventListener('submit', async function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        const url = "{{ route('admin.store-production-process') }}";
        try {
            const result = await fetch_cycle('--Store Production Process', url, 'POST', formData);
            if (result.status === 'success' && Array.isArray(result.production_processes)) {
                const formatted = result.production_processes.map(proc => ({
                    workflow_name: proc.workflow?.workflow_name || 'N/A',
                    start_date: proc.start_time ? new Date(proc.start_time).toLocaleDateString('en-GB') : 'N/A',
                    end_date: proc.end_time ? new Date(proc.end_time).toLocaleDateString('en-GB') : 'N/A',
                    remarks: proc.remarks || '',
                    status: proc.status || 'N/A',
                    process_id: proc.process_id || ''
                }));
                productionProcessTable.clear().rows.add(formatted).draw();
                // Hide form and show table
                showProductionProcessTable();
                // Optionally reset the form
                this.reset();
            }
        } catch (error) {
            console.error('Error storing production process:', error);
        }
    });

    // Edit Production Process Modal Handler
    window.editProductionProcess = async function(id) {
        // Try to get the process data from the DataTable row
        const row = $(`button[onclick="editProductionProcess(${id})"]`).closest('tr');
        let process = productionProcessTable.row(row).data();

        // If not found, fetch from backend
        if (!process) {
            try {
                const response = await fetch(`/admin/production-process/${id}`);
                if (response.ok) {
                    process = await response.json();
                } else {
                    console.error('Failed to fetch production process:', response.statusText);
                    return;
                }
            } catch (error) {
                console.error('Failed to fetch production process:', error);
                return;
            }
        }
        if (!process) return;

       

        // Populate form fields
        document.getElementById('edit_process_id').value = process.process_id || process.id || "";
        document.getElementById('edit_process_start_date').value = formatDateForInput(process.start_time || process.start_date);
        document.getElementById('edit_process_end_date').value = formatDateForInput(process.end_time || process.end_date);
        document.getElementById('edit_process_status').value = process.status || "";
        document.getElementById('edit_remarks').value = process.remarks || "";

        // Populate workflow select
        // Populate workflow select with the workflow directly from the DataTable row first, then fetch all others
        const workflowSelect = document.getElementById('edit_workflow');
        workflowSelect.innerHTML = '';

        // Get workflow from the current row (prefer direct row data)
        let currentWorkflowId = process.workflow_id || (process.workflow && (process.workflow.id || process.workflow.workflow_id)) || '';
        let currentWorkflowName = process.workflow_name || (process.workflow && (process.workflow.name || process.workflow.workflow_name)) || 'Select Workflow';

        // Add the workflow from the row as the first (selected) option
        if (currentWorkflowId) {
            workflowSelect.appendChild(new Option(currentWorkflowName, currentWorkflowId, true, true));
        }

        // Fetch all workflows for the company and add the rest (avoid duplicate)
        try {
            const companyId = "{{ json_encode($company->company_id) }}";
            const url = `/admin/get-workflows/${companyId}`;
            const data = await fetchFieldInput(url);

            if (data.status === "success" && Array.isArray(data.workflows)) {
            data.workflows.forEach(wf => {
                const wfId = wf.workflow_id || wf.id;
                // Avoid duplicate of the already-selected workflow
                if (wfId != currentWorkflowId) {
                workflowSelect.appendChild(new Option(wf.workflow_name || wf.name || '', wfId));
                }
            });
            }
        } catch (error) {
            // fallback: just show the current workflow
            if (currentWorkflowId) {
            workflowSelect.innerHTML = `<option value="${currentWorkflowId}" selected>${currentWorkflowName}</option>`;
            }
        }

        // Show the modal
        new bootstrap.Modal(document.getElementById('editProductionProcessModal')).show();

        // Helper function to format date as YYYY-MM-DD for input fields
        function formatDateForInput(dateString) {
            if (!dateString) return '';
            const date = new Date(dateString);
            if (isNaN(date)) return '';
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        }
    };

    // --- Update Production Process ---
    const editForm = document.querySelector('#edit-production-process-form');
if (editForm) {
    editForm.addEventListener('submit', async function (e) {
        e.preventDefault();

        const formData = new FormData(editForm);
        const processId = formData.get('process_id');

        if (!processId) {
            console.error('No process_id provided for update.');
            return;
        }

        try {
            const url = `/admin/production-process/${processId}`;
            const result = await fetch_cycle('--Update Production Process', url, 'POST', formData);

            if (result.status === 'success' && Array.isArray(result.production_processes)) {
                const formatted = result.production_processes.map(proc => ({
                    workflow_name: proc.workflow?.workflow_name || 'N/A',
                    start_date: proc.start_time ? new Date(proc.start_time).toLocaleDateString('en-GB') : 'N/A',
                    end_date: proc.end_time ? new Date(proc.end_time).toLocaleDateString('en-GB') : 'N/A',
                    remarks: proc.remarks || '',
                    status: proc.status || 'N/A',
                    process_id: proc.process_id || ''
                }));

                productionProcessTable.clear().rows.add(formatted).draw();

                // Hide modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('editProductionProcessModal'));
                if (modal) modal.hide();

                // Optionally reset the form
                editForm.reset();
            } else {
                console.error('Update failed:', result.errors || result.message);
            }
        } catch (error) {
            console.error('Error updating production process:', error);
        }
    });
}

    
    
    
    // --- Delete Production Process ---
    window.deleteProductionProcess = function (processId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to delete this production process?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(async (result) => {
            if (result.isConfirmed) {
                const url = `/admin/production-process/${processId}`;
                try {
                    const response = await fetch(url, {
                        method: 'DELETE',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                    });
                    const data = await response.json();
                    if (data.status === 'success') {
                        productionProcessTable.row($(`button[onclick="deleteProductionProcess(${processId})"]`).parents('tr')).remove().draw();
                        Swal.fire('Deleted!', 'Production process has been deleted.', 'success');
                    } else {
                        Swal.fire('Error!', data.message || 'Failed to delete production process.', 'error');
                    }
                } catch (error) {
                    Swal.fire('Error!', 'An unexpected error occurred.', 'error');
                }
            }
        });
    };
});
</script>

    <!-- end store production process -->
    <!-- End Batch tracking -->

    <script>
        /**
         * Toggle the visibility of the annual operation activity form card.
         * Called when addActivityAnnualOperationLog is invoked.
         */
        function addActivityAnnualOperationLogForm() {
            // Show the activity form card
            const formCard = document.getElementById('annual-operation-activity-form-card');
            if (formCard) {
                formCard.classList.remove('d-none');
                formCard.scrollIntoView({ behavior: 'smooth' });
            }
            // Reset the form fields
            const form = document.getElementById('annual-operations-activity-form');
            if (form) {
                form.reset();
            }
        }
    </script>
    <script>
        class TaskTaggingSystem {
            constructor({ containerId, apiUrl }) {
                this.container = document.getElementById(containerId);
                this.apiUrl = apiUrl;
                this.tags = [];
                this.init();
            }

            // Initialize the tagging system
            init() {
                // Build the tag input UI
                this.container.innerHTML = `
                    <div class="tag-inline-container" style="display: flex; align-items: center; flex-wrap: wrap; padding: 0 10px;">
                        <div class="tags-display" style="display: flex; flex-wrap: wrap;"></div>
                        <input type="text" class="form-control border-0 shadow-none" autocomplete="off" placeholder="Add a task tag..." style="flex: 1; min-width: 120px;" />
                    </div>
                    <div class="task-suggestions"></div>
                `;

                this.tagsContainer = this.container.querySelector(".tags-display");
                this.inputField = this.container.querySelector("input[type='text']");
                this.suggestionsDiv = this.container.querySelector(".task-suggestions");

                this.bindEvents();
                this.renderTags();
            }


            // Fetch suggestions from API
            async fetchSuggestions(query) {
                try {
                    const response = await fetch(`${this.apiUrl}?query=${encodeURIComponent(query)}&type=task`);
                    if (!response.ok) throw new Error("Failed to fetch task suggestions");
                    return await response.json();
                } catch (error) {
                    console.error("Error fetching task suggestions:", error);
                    return [];
                }
            }

            // Add a task tag
            addTag(idOrName, name = null) {
                // If called with (id, name) from suggestion, use id as tag object
                let tagObj;
                if (typeof idOrName === "object" && idOrName !== null) {
                    tagObj = idOrName;
                } else if (name !== null) {
                    tagObj = { id: idOrName, name };
                } else {
                    // Called from free input, treat as plain string
                    tagObj = { id: null, name: idOrName };
                }
                // Prevent duplicates by name (case-insensitive)
                if (
                    tagObj.name &&
                    !this.tags.some(t => t.name.toLowerCase() === tagObj.name.toLowerCase())
                ) {
                    this.tags.push(tagObj);
                    this.renderTags();
                }
                this.inputField.value = "";
                this.suggestionsDiv.innerHTML = "";
            }

            // Remove a task tag
            removeTag(tag) {
                const index = this.tags.indexOf(tag);
                if (index > -1) {
                    this.tags.splice(index, 1);
                    this.renderTags();
                }
            }

            // Render task tags
            renderTags() {
                this.tagsContainer.innerHTML = "";
                this.tags.forEach(tag => {
                    const tagElement = document.createElement("div");
                    tagElement.className = "task-tag";
                    tagElement.innerHTML = `
                        ${tag.name}
                        <span title="Remove tag">&times;</span>
                    `;
                    tagElement.querySelector("span").onclick = () => this.removeTag(tag);
                    this.tagsContainer.appendChild(tagElement);
                });
            }

            // Show task suggestions
            async showSuggestions(input) {
                const suggestions = await this.fetchSuggestions(input);
                // Only show suggestions not already tagged (by id or name)
                const filteredSuggestions = suggestions.filter(suggestion => !this.tags.includes(suggestion.name));
                this.suggestionsDiv.innerHTML = "";
                filteredSuggestions.forEach(suggestion => {
                    const suggestionElement = document.createElement("div");
                    suggestionElement.className = "task-suggestion";
                    suggestionElement.textContent = suggestion.name;
                    suggestionElement.addEventListener('click', () => this.addTag(suggestion.tagID, suggestion.name));
                    this.suggestionsDiv.appendChild(suggestionElement);
                });
            }

            // Bind events
            bindEvents() {
                this.inputField.addEventListener("input", () => {
                    const input = this.inputField.value.trim();
                    if (input) {
                        this.showSuggestions(input);
                    } else {
                        this.suggestionsDiv.innerHTML = "";
                    }
                });

                this.inputField.addEventListener("keydown", (event) => {
                    if (event.key === "Enter" || event.key === ",") {
                        event.preventDefault();
                        this.addTag(this.inputField.value.trim());
                    }
                });
            }
            // Extract tag IDs for submission
            getTagIds() {
                // Return an array of tag IDs (excluding null/undefined)
                console.log(this.tags);
                
                return this.tags
                    .map(tag => tag.id)
                    .filter(id => typeof id !== "undefined" && id !== null && id !== "");
            }
        }

        // Usage example
        const taskTaggingSystem2 = new TaskTaggingSystem({
            containerId: "tagging-system-2",
            apiUrl: "{{ url('/admin/search-tag') }}"
        });
    </script>
    <script>
    /**
     * TaggingComponent class for managing tagging functionality.
     * - Handles user input for tagging.
     * - Fetches user suggestions from the server.
     * - Allows adding and removing tags.
     */
    class TaggingComponent {
      constructor(containerId, TagInput) {
        this.container = document.getElementById(containerId);
        this.tagInput = this.container.querySelector(`.${TagInput}`);
        this.tags = [];
        this.userMap = {}; // Maps user names to ids

        this.renderInputField();
        this.renderSuggestions();
      }

      renderInputField() {
        const inputField = document.createElement('input');
        inputField.type = 'text';
        inputField.placeholder = 'Tag someone...';
        inputField.className = 'form-control';
        inputField.classList.add('form-control');
        inputField.addEventListener('input', (e) => this.fetchUsers(e.target.value.trim()));
        inputField.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ',') {
            e.preventDefault();
            const name = e.target.value.trim();
            console.log("Adding tag:", name);
            
            if (this.userMap[name]) {
                this.addTag(this.userMap[name], name);
            }
          }
        });
        this.tagInput.appendChild(inputField);
        this.inputField = inputField;
      }

      renderSuggestions() {
        const suggestionsDiv = document.createElement('div');
        suggestionsDiv.className = 'suggestions';
        this.tagInput.appendChild(suggestionsDiv);
        this.suggestionsDiv = suggestionsDiv;
      }

      async fetchUsers(query) {
        if (!query) {
          this.suggestionsDiv.innerHTML = '';
          return;
        }
        try {
          const companyId = "{{ $company->company_id }}";
          const response = await fetch(`{{ url('/admin/search-employee') }}?search=${encodeURIComponent(query)}&company_id=${encodeURIComponent(companyId)}`);
          const users = await response.json();
          console.log("Fetched users:", users);
          this.showSuggestions(users.users || []);
        } catch (error) {
          console.error("Failed to fetch users:", error);
        }
      }

      showSuggestions(users) {
        const filteredUsers = users.filter(user => !this.tags.includes(user.name));
        this.suggestionsDiv.innerHTML = '';
        filteredUsers.forEach(user => {
          const suggestionElement = document.createElement('div');
          suggestionElement.className = 'suggestion';
          suggestionElement.innerHTML = `
            <div style="display: flex; align-items: center; gap: 10px;">
              <img src="${user.profilePic}" alt="${user.name}" style="width: 32px; height: 32px; border-radius: 50%; object-fit: cover; border: 2px solid #e0e7ff;">
              <div>
                <strong style="font-size: 15px; color: #1d4ed8;">${user.name}</strong><br>
                <span style="font-size: 13px; color: #64748b;">${user.role}</span><br>
                <span style="font-size: 12px; color: #6366f1;">${user.email}</span>
              </div>
            </div>
          `;
          suggestionElement.addEventListener('click', () => this.addTag(user.id, user.name));
          this.suggestionsDiv.appendChild(suggestionElement);
          
           // Update the user map
            this.userMap[user.name] = user.id;
        });
      }

      addTag(userId, userName) {
        if (userId && !this.tags.includes(userId)) {
            this.tags.push(userId);
            this.renderTags();
            this.inputField.value = '';
            this.suggestionsDiv.innerHTML = '';
        }
      }

      removeTag(userId) {
        this.tags = this.tags.filter(id => id !== userId);
        this.renderTags();
      }

      renderTags() {
        this.tagInput.innerHTML = '';
        this.tags.forEach(userId => {
            const userName = Object.keys(this.userMap).find(name => this.userMap[name] === userId);
            const tagElement = document.createElement('div');
            tagElement.className = 'tag';
            tagElement.innerHTML = `${userName} <span>&times;</span>`;
            tagElement.querySelector('span').addEventListener('click', () => this.removeTag(userId));
            this.tagInput.appendChild(tagElement);
        });
        this.tagInput.appendChild(this.inputField);
        this.tagInput.appendChild(this.suggestionsDiv);
      }
      // Get selected user IDs and names
      getSelectedUserIds() {
        return this.tags;
      }

      getSelectedUserNames() {
        return this.tags.map(id => Object.keys(this.userMap).find(name => this.userMap[name] === id));
      }
    }
    
    let  manager_1 =  new TaggingComponent('manager-tag-input-1', 'manager-tag-input-1');
    let  manager_2 =  new TaggingComponent('manager-tag-input-2', 'manager-tag-input-2');
    let  manager_3 =  new TaggingComponent('manager-tag-input-3', 'manager-tag-input-3');
    let  manager_4 =  new TaggingComponent('manager-tag-input-4', 'manager-tag-input-4');
    let  manager_5 =  new TaggingComponent('manager-tag-input-5', 'manager-tag-input-5');
    let  manager_6 =  new TaggingComponent('manager-tag-input-6', 'manager-tag-input-6');
  </script>
  <!-- Department -->
   <script>
    /**
     * Handles the submission of the Department form.
     * - Prevents default form submission.
     * - Collects form data and selected manager IDs.
     * - Sends data to the server using fetch_cycle for AJAX POST.
     * - Handles success and error responses.
     */
    /**
     * Department Management Script
     * Handles the submission of the Department form and updates the department table.
     * - Prevents default form submission.
     * - Collects form data and selected manager IDs.
     * - Sends data to the server using fetch_cycle for AJAX POST.
     * - Handles success and error responses.
     */

    /**
     * Department Management Script
     * Handles the submission of the Department form and updates the department table.
     * - Prevents default form submission.
     * - Collects form data and selected manager IDs.
     * - Sends data to the server using fetch_cycle for AJAX POST.
     * - Handles success and error responses.
     */

    let departmentsTable = $('#tbl-departments').DataTable({
        paging: true,
        searching: true,
        ordering: false,
        responsive: true,
        columnDefs: [
            { orderable: false, targets: [2] } // Disable sorting on the "Action" column
        ],
        data: [],
        columns: [
            { data: 'name', title: 'Department Name' },
            {
                data: 'managers',
                title: 'Managers',
                render: function(data, type, row) {
                    if (Array.isArray(data) && data.length > 0) {
                        return `
                            <div class="d-flex flex-row flex-wrap gap-2">
                                ${data.map(mgr => `
                                    <div class="card shadow-sm mb-0" style="display:inline-block; min-width:220px; max-width:320px;">
                                        <div class="card-body p-2">
                                            <div class="d-flex align-items-center">
                                                <img src="${mgr.profilePic || 'https://via.placeholder.com/32'}" alt="${mgr.name ?? mgr.full_name ?? 'N/A'}" class="rounded-circle me-2" style="width:32px;height:32px;object-fit:cover;">
                                                <div>
                                                    <div class="fw-bold">${mgr.name ?? mgr.full_name ?? 'N/A'}</div>
                                                    <div class="small text-muted">${mgr.email ?? ''}</div>
                                                    <div class="small text-secondary">${mgr.jobTitle ?? ''}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `).join('')}
                            </div>
                        `;
                    }
                    return '<span class="text-muted">None</span>';
                }
            },
            {
                data: null,
                title: 'Action',
                render: function(data, type, row) {
                    return `
                        <div class="d-flex justify-content-end gap-2">
                            <button class="btn btn-outline-primary btn-sm" onclick="editDepartment('${row.id}')">
                                <i class="las la-edit"></i> Edit
                            </button>
                            <button class="btn btn-outline-danger btn-sm" onclick="deleteDepartment('${row.id}')">
                                <i class="las la-trash-alt"></i> Delete
                            </button>
                        </div>
                    `;
                },
                className: 'text-end'
            }
        ]
    });
    // Fetch and display departments when the accordion is expanded
    document.getElementById('departmentCollapse').addEventListener('shown.bs.collapse', async () => {
        console.log('====================================');
        console.log('Fetching departments for company:', "{{ json_encode($company->company_id) }}");
        console.log('====================================');
        const companyId = "{{ json_encode($company->company_id) }}";
        const url = `/admin/get-departments/${companyId}`;
        const spinner = document.getElementById('loading-spinner');
        showElement(spinner);

        try {
            const data = await fetchFieldInput(url);
            if (data.status === "success" && Array.isArray(data.departments)) {
                const departments = data.departments.map(department => ({
                    name: department.DepartmentName || "N/A",
                    managers: department.managers || [],
                    id: department.DepartmentID || "N/A"
                }));
                departmentsTable.clear().rows.add(departments).draw();
            } else {
                displayMessage('warning', 'No departments found or invalid data structure.');
                departmentsTable.clear().draw();
            }
        } catch (error) {
            console.error("Error fetching departments:", error);
            displayMessage('danger', 'An error occurred while fetching departments.');
        } finally {
            hideElement(spinner);
        }
    });

    // Handle department form submission
    document.addEventListener('DOMContentLoaded', function () {
        const departmentForm = document.getElementById('department-form');
        if (departmentForm) {
            departmentForm.addEventListener('submit', async function (e) {
                e.preventDefault();
                const formData = new FormData(departmentForm);
                console.log('====================================');
                console.log(manager_1.getSelectedUserIds());
                console.log('====================================');
                let manager = manager_1.getSelectedUserIds();
                // Append manager IDs to the form data
                manager.forEach(id => {
                    formData.append('manager_ids[]', id);
                });
                // Append the company ID to the form data
                const url = "{{ route('admin.store-company-department') }}";

                try {
                    const result = await fetch_cycle('--Store Department', url, 'POST', formData);
                    if (result.status === 'success') {
                        // Optionally update UI or show a success message
                        console.log("Department stored successfully:", result.department);
                    } else {
                        // Handle validation errors
                        console.error("Error storing department:", result.message);
                    }
                } catch (error) {
                    console.error('Error storing department:', error);
                }
            });
        }
    });
   </script>
  <!-- End Department -->
   <!-- Employee -->
    <script>
        // Handle employee form submission
        document.getElementById('employee-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = "{{ route('admin.store-company-employee') }}";

            try {
                // Ensure the route supports POST; if not, use GET and append params to URL
                // If the route only supports GET, use the following pattern:
                // const params = new URLSearchParams(formData).toString();
                // const response = await fetch(url + '?' + params, { method: 'GET' });
                // Otherwise, use POST as below if the route supports it:
                const result = await fetch_cycle('--Store Employee', url, 'POST', formData);
                if (result.status === 'success' && result.employee) {
                    const emp = result.employee;
                    employeesTable.row.add({
                        name: emp.name ?? "N/A",
                        email: emp.email ?? "N/A",
                        role: emp.role ?? "N/A",
                        department: emp.department?.DepartmentName ?? "N/A",
                        id: emp.id ?? "N/A"
                    }).draw(false);
                } else {
                    displayMessage('danger', result.message || 'Failed to add employee.');
                }
            } catch (error) {
                console.error('Error storing employee:', error);
                displayMessage('danger', 'An error occurred while adding employee.');
            }
        });

    </script>
   <!-- Employee -->
    <!-- Company Workflow Management Script -->
    <script>
    /**
     * Company Workflow Management Script
     * Handles:
     * - Fetching and displaying company workflows in a DataTable.
     * - Adding, editing, and deleting workflows.
     * - Uses fetch_cycle for AJAX requests.
     */

    // Initialize DataTable for Company Workflow
    const workflowTable = $('#tbl-workflow-management').DataTable({
        paging: true,
        searching: true,
        ordering: false,
        responsive: true,
        columnDefs: [
            { orderable: false, targets: [4] }
        ],
        data: [],
        columns: [
            { data: 'workflow_name', title: 'Workflow Name' },
            { data: 'description', title: 'Description' },
            {
                data: 'creator',
                title: 'Created By',
                render: data => data
                    ? `<div class="d-flex align-items-center">
                            <img src="${data.profile_picture}" alt="Profile" class="rounded-circle me-2" width="30" height="30">
                            <div>
                                <strong>${data.first_name ?? ''} ${data.last_name ?? ''} ${data.other_name ?? ''}</strong>
                                <div>${data.email}</div>
                            </div>
                       </div>`
                    : 'N/A'
            },
            {
                data: 'status',
                title: 'Status',
                render: data => `<span class="${data === 'active' ? 'text-success' : 'text-danger'} fw-bold">${data}</span>`
            },
            {
                data: null,
                title: 'Action',
                className: 'text-end',
                render: (data, type, row) => `
                    <div class="d-flex justify-content-end gap-2">
                        <button class="btn btn-outline-secondary btn-sm" onclick="manageWorkflowStages('${row.workflow_id}')">
                            <i class="las la-layer-group"></i> Stages
                        </button>
                        <button class="btn btn-outline-primary btn-sm" onclick="editWorkflowStep('${row.workflow_id}')">
                            <i class="las la-edit"></i> Edit
                        </button>
                        <button class="btn btn-outline-danger btn-sm" onclick="deleteWorkflowStep('${row.workflow_id}')">
                            <i class="las la-trash-alt"></i> Delete
                        </button>
                    </div>
                `
            }
        ]
    });

    // Load workflows into the table
    function loadWorkflows(data) {
        workflowTable.clear().rows.add(data).draw();
    }

    // Fetch and display workflows when the accordion is expanded
    document.getElementById('workflowManagementCollapse').addEventListener('shown.bs.collapse', async () => {
        const companyId = "{{ json_encode($company->company_id) }}";
        const url = `/admin/get-workflows/${companyId}`;
        const spinner = document.getElementById('loading-spinner');
        showElement(spinner);

        try {
            const data = await fetchFieldInput(url);
            if (data.status === "success" && Array.isArray(data.workflows)) {
                const workflows = data.workflows.map(wf => ({
                    workflow_name: wf.workflow_name || "N/A",
                    description: wf.description || "",
                    creator: wf.creator
                        ? {
                            first_name: wf.creator.first_name || "N/A",
                            last_name: wf.creator.last_name || "N/A",
                            other_name: wf.creator.other_name || "",
                            profile_picture: wf.creator.profile_photo_path || 'https://via.placeholder.com/30',
                            email: wf.creator.email || "N/A"
                        }
                        : null,
                    status: wf.status || "N/A",
                    workflow_id: wf.workflow_id || "N/A"
                }));
                loadWorkflows(workflows);
            } else {
                displayMessage('warning', 'No workflows found or invalid data structure.');
                workflowTable.clear().draw();
            }
        } catch (error) {
            console.error("Error fetching workflows:", error);
            displayMessage('danger', 'An error occurred while fetching workflows.');
        } finally {
            hideElement(spinner);
        }
    });

    // Handle workflow form submission
    document.addEventListener('DOMContentLoaded', function () {
        const workflowForm = document.getElementById('workflow-management-form');
        if (workflowForm) {
            workflowForm.addEventListener('submit', async function (e) {
                e.preventDefault();
                const formData = new FormData(workflowForm);
                const url = "{{ route('admin.store-company-workflow') }}";

                try {
                    const result = await fetch_cycle('--Store Workflow', url, 'POST', formData);
                    if (result.status === 'success' && Array.isArray(result.workflows)) {
                        const workflows = result.workflows.map(wf => ({
                            workflow_name: wf.workflow_name || "N/A",
                            description: wf.description || "",
                            creator: wf.creator
                                ? {
                                    first_name: wf.creator.first_name || "N/A",
                                    last_name: wf.creator.last_name || "N/A",
                                    other_name: wf.creator.other_name || "",
                                    profile_picture: wf.creator.profile_photo_path || 'https://via.placeholder.com/30',
                                    email: wf.creator.email || "N/A"
                                }
                                : null,
                            status: wf.status || "N/A",
                            workflow_id: wf.workflow_id || "N/A"
                        }));
                        loadWorkflows(workflows);
                    }
                } catch (error) {
                    console.error('Error storing workflow:', error);
                }
            });
        }
    });

    // Edit workflow step
    window.editWorkflowStep = function (id) {
        const row = $(`button[onclick="editWorkflowStep('${id}')"]`).closest('tr');
        const workflow = workflowTable.row(row).data();
        if (!workflow) {
            Toastify({
                text: 'Workflow data not found.',
                duration: 4000,
                style: { background: "linear-gradient(to right, #ff0000, #ff1745)" }
            }).showToast();
            return;
        }
        document.getElementById('workflow_edit_id').value = id;
        document.getElementById('workflow_edit_name').value = workflow.workflow_name || '';
        document.getElementById('workflow_edit_description').value = workflow.description || '';
        const statusSelect = document.getElementById('workflow_edit_status');
        if (statusSelect) {
            Array.from(statusSelect.options).forEach(option => {
                option.selected = (option.value === (workflow.status || ''));
            });
        }
        const modal = new bootstrap.Modal(document.getElementById('workflowEditModal'));
        modal.show();
    };

    document.getElementById('workflow-edit-form').addEventListener('submit', async function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        const url = "{{ route('admin.update-company-workflow') }}";
        try {
            const result = await fetch_cycle('--Update Workflow', url, 'POST', formData);
            if (result.status === 'success' && Array.isArray(result.workflows)) {
                const workflows = result.workflows.map(wf => ({
                    workflow_name: wf.workflow_name || "N/A",
                    description: wf.description || "",
                    creator: wf.creator
                        ? {
                            first_name: wf.creator.first_name || "N/A",
                            last_name: wf.creator.last_name || "N/A",
                            other_name: wf.creator.other_name || "",
                            profile_picture: wf.creator.profile_photo_path || 'https://via.placeholder.com/30',
                            email: wf.creator.email || "N/A"
                        }
                        : null,
                    status: wf.status || "N/A",
                    workflow_id: wf.workflow_id || "N/A"
                }));
                loadWorkflows(workflows);
                const modal = bootstrap.Modal.getInstance(document.getElementById('workflowEditModal'));
                if (modal) modal.hide();
            }
        } catch (error) {
            console.error('Error updating workflow:', error);
        }
    });

    // Delete workflow step
    window.deleteWorkflowStep = function(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to delete this workflow?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(async (result) => {
            if (result.isConfirmed) {
                const url = `/admin/workflow/${id}`;
                try {
                    const response = await fetch(url, {
                        method: 'DELETE',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                    });
                    const data = await response.json();
                    if (data.status === 'success') {
                        workflowTable.row($(`button[onclick="deleteWorkflowStep('${id}')"]`).parents('tr')).remove().draw();
                        Swal.fire('Deleted!', 'Workflow step has been deleted.', 'success');
                    } else {
                        Swal.fire('Error!', data.message || 'Failed to delete workflow step.', 'error');
                    }
                } catch (error) {
                    Swal.fire('Error!', 'An unexpected error occurred.', 'error');
                }
            }
        });
    };

    </script>
    <!-- End Company Workflow Management Script -->
    <!-- Stage Management Script -->
    <script>
    /**
     * Stage Management Script
     * Handles:
     * - Fetching and displaying stages for a batch in a DataTable.
     * - Adding, editing, and deleting stages.
     * - Submitting the stage management form and updating the stage table.
     * - Uses fetch_cycle for AJAX requests.
     */

    // Initialize DataTable for Stage Management
    // Initialize DataTable for Stage Management
    const stageTable = $('#tbl-stage-management').DataTable({
        paging: true,
        searching: true,
        ordering: false,
        responsive: true,
        columnDefs: [
            { orderable: false, targets: [4] } // Action column
        ],
        data: [],
        columns: [
            { data: 'stage_name', title: 'Stage Name' },
            { data: 'description', title: 'Description' },
            { data: 'status', title: 'Status' },
            { data: 'sequence_order', title: 'Sequence Order' },
            {
                data: null,
                title: 'Action',
                className: 'text-end',
                render: (data, type, row) => `
                    <div class="d-flex justify-content-end gap-2">
                        <button class="btn btn-outline-secondary btn-sm" onclick="manageStageTasks('${row.stage_id}')">
                            <i class="las la-tasks"></i> Tasks
                        </button>
                        <button class="btn btn-outline-primary btn-sm" onclick="editStage('${row.stage_id}')">
                            <i class="las la-edit"></i> Edit
                        </button>
                        <button class="btn btn-outline-danger btn-sm" onclick="deleteStage('${row.stage_id}')">
                            <i class="las la-trash-alt"></i> Delete
                        </button>
                        <div class="dropdown d-inline-block">
                            <button class="btn btn-outline-dark btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="las la-ellipsis-h"></i> More
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#" onclick="viewStageDetails('${row.stage_id}')">
                                        <i class="las la-eye"></i> View Details
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#" onclick="duplicateStage('${row.stage_id}')">
                                        <i class="las la-copy"></i> Duplicate
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#" onclick="archiveStage('${row.stage_id}')">
                                        <i class="las la-archive"></i> Archive
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#" onclick="setStageDuration('${row.stage_id}', '${row.stage_name}', '${row.estimated_time || ''}')">
                                        <i class="las la-clock"></i> Estimated Time
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#" onclick="inputMaterial('${row.stage_id}')">
                                        <i class="las la-cube"></i> Input Material
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#" onclick="outputMaterial('${row.stage_id}')">
                                        <i class="las la-box"></i> Output Material
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                `
            }
        ]
    });

    window.manageWorkflowStages = function(workflowId) {
        // clear the form fields
        document.getElementById('stage-management-form').reset();
        // Set the batch_id (or workflow_id) in the hidden input for the stage form
        document.getElementById('stage_workflow_id').value = workflowId;

        const workflow = workflowTable.row($(`button[onclick="manageWorkflowStages('${workflowId}')"]`).parents('tr')).data();
        if (workflow && document.getElementById('stage-workflow-title')) {
            document.getElementById('stage-workflow-title').textContent = workflow.workflow_name || '';
        }

        // Fetch and display stages for the selected workflow
        (async () => {
            const url = `/admin/get-company-stages/${workflowId}`;
            try {
                const data = await fetchFieldInput(url);
                if (data.status === "success" && Array.isArray(data.stages)) {
                    const stages = data.stages.map(stage => ({
                        stage_name: stage.name || "N/A",
                        description: stage.description || "",
                        status: stage.status || "N/A",
                        sequence_order: stage.sequence || "N/A",
                        stage_id: stage.stage_id || stage.id || "N/A"
                    }));
                    stageTable.clear().rows.add(stages).draw();
                    // Clear the form for new entry
                    document.getElementById('stage-management-form').reset();
                } else {
                    stageTable.clear().draw();
                }
            } catch (error) {
                console.error("Error fetching stages:", error);
                stageTable.clear().draw();
            }
        })();
        
        // Show the stage management modal
        const modal = new bootstrap.Modal(document.getElementById('stageManagementModal'));
        modal.show();
    };


    // Handle stage form submission
    document.addEventListener('DOMContentLoaded', function () {
        const stageForm = document.getElementById('stage-management-form');
        if (stageForm) {
            stageForm.addEventListener('submit', async function (e) {
                e.preventDefault();
                const formData = new FormData(stageForm);
                const url = "{{ route('admin.store-company-stage') }}";

                try {
                    const result = await fetch_cycle('--Store Stage', url, 'POST', formData);
                    if (result.status === 'success' && Array.isArray(result.stages)) {
                        const stages = result.stages.map(stage => ({
                            stage_name: stage.name || "N/A",
                            description: stage.description || "",
                            status: stage.status || "N/A",
                            sequence_order: stage.sequence || "N/A",
                            stage_id: stage.stage_id || stage.id || "N/A"
                        }));
                        stageTable.clear().rows.add(stages).draw();
                        stageForm.reset();
                    }
                } catch (error) {
                    console.error('Error storing stage:', error);
                }
            });
        }
    });

<<<<<<< HEAD
    // View stage details using modal
    window.viewStageDetails = async function(id) {
        let stage;
        try {
            const response = await fetch_cycle('--Fetch Stage Details', `/admin/company-stages/${id}`, 'GET');
            if (response && response.status === "success") {
                stage = response.company_stage || response;
            }
        } catch (error) {
            console.error('Failed to fetch stage details:', error);
            return;
        }
        if (stage) {
            // Enhanced UI/UX for Stage Details Modal
            const modal = document.getElementById('viewSingleCompanyStageModal');
            modal.querySelector('.modal-header').innerHTML = `
                <div class="d-flex align-items-center gap-2">
                    <span class="rounded-circle bg-gradient-primary d-flex align-items-center justify-content-center shadow" style="width:48px;height:48px;">
                        <i class="las la-layer-group text-white" style="font-size:2rem;"></i>
                    </span>
                    <div>
                        <span class="fw-bold" style="font-size:1.3rem;">${stage.name || stage.stage_name || "Stage Details"}</span>
                        <div class="small text-muted">${stage.status ? `<span class="badge bg-info">${stage.status}</span>` : ""}</div>
                    </div>
                </div>
            `;
            modal.querySelector('.modal-body').innerHTML = `
                <div class="container-fluid py-2">
                    <div class="row g-4 align-items-center">
                        <div class="col-md-4 text-center">
                            <div class="stage-icon mb-2">
                                <i class="las la-stream text-primary" style="font-size: 3.2rem;"></i>
                            </div>
                            <h4 class="fw-bold mb-1" id="stage_name_preview">${stage.name || stage.stage_name || "Stage Name"}</h4>
                            <span class="badge bg-info text-white px-3 py-2" id="stage_status_preview">${stage.status || "Status"}</span>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label fw-semibold text-secondary">Description</label>
                                <div class="p-2 rounded bg-white border shadow-sm" id="stage_description_preview" style="min-height:48px;">${stage.description ? stage.description : "<span class='text-muted'>No description provided.</span>"}</div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-secondary">Sequence Order</label>
                                    <div class="p-2 rounded bg-white border shadow-sm" id="stage_sequence_order_preview">${stage.sequence ? stage.sequence : "<span class='text-muted'>N/A</span>"}</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-secondary">Estimated Time (hrs)</label>
                                    <div class="p-2 rounded bg-white border shadow-sm" id="stage_estimated_time_preview">${stage.estimated_time ? stage.estimated_time : "<span class='text-muted'>N/A</span>"}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Stage Tasks Section -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <label class="form-label fw-semibold text-secondary">Stage Tasks</label>
                            <div class="p-2 rounded bg-white border shadow-sm" id="stage_tasks_preview">
                                ${
                                    Array.isArray(stage.tasks) && stage.tasks.length > 0
                                        ? `<ul class="list-group mb-0">
                                            ${stage.tasks.map(task => `
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    <span>
                                                        <i class="las la-tasks text-primary me-2"></i>
                                                        <strong>${task.title || task.task_name || "Task"}</strong>
                                                        ${task.status ? `<span class="badge bg-secondary ms-2">${task.status}</span>` : ""}
                                                    </span>
                                                    <span class="text-muted small">${task.due_date ? new Date(task.due_date).toLocaleDateString('en-GB') : ""}</span>
                                                </li>
                                            `).join('')}
                                        </ul>`
                                        : "<span class='text-muted'>No tasks assigned to this stage.</span>"
                                }
                            </div>
                        </div>
                    </div>
                </div>
            `;
            modal.querySelector('.modal-footer').innerHTML = `
                <div class="w-100 d-flex justify-content-between align-items-center">
                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="setStageDuration('${stage.stage_id || stage.id}', '${stage.name || stage.stage_name}', '${stage.estimated_time || ''}')">
                        <i class="las la-clock"></i> Set Estimated Time
                    </button>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                        <i class="las la-times"></i> Close
                    </button>
                </div>
            `;
            new bootstrap.Modal(modal).show();
        }
    };
=======
    // View stage details
    window.viewStageDetails = function(id) {
        // Get stage data 
        let stage = stageTable.row($(`button[onclick="viewStageDetails('${id}')"]`).parents('tr')).data();
        if (!stage) {
            try {
                const response = await fetch_cycle('--Fetch Stage Details', `/admin/get-stage/${id}`, 'GET');
                if (response && response.status === 'success' && response.stage) {
                    stage = {
                        stage_name: response.stage.name || "N/A",
                        description: response.stage.description || "",
                        status: response.stage.status || "N/A",
                        sequence_order: response.stage.sequence || "N/A",
                        stage_id: response.stage.stage_id || response.stage.id || "N/A"
                    };
                }
            } catch (error) {
                console.error('Failed to fetch stage details:', error);
                stage = {};
            }
        }
        // Populate the modal with stage details
        document.getElementById('stage_details_name').textContent = stage.stage_name || 'N/A';
        document.getElementById('stage_details_description').textContent = stage.description || 'N/A';
        document.getElementById('stage_details_status').textContent = stage.status || 'N/A';
        document.getElementById('stage_details_sequence_order').textContent = stage.sequence_order || 'N/A';
        document.getElementById('stage_details_id').textContent = stage.stage_id || 'N/A';

        // Show the modal
        const modal = new bootstrap.Modal(document.getElementById('viewStageDetailsModal'));
        modal.show();
    };

>>>>>>> 57d7e19fa5500719fbf156d44f90d07307648537
    // Estimated Time Management
    window.setStageDuration = function(id, stage_name, estimated_time="") {
        // Get stage data from DataTable row
        
        // Populate modal fields
        document.getElementById('estimated_time_stage_id').value = id || "";
        document.getElementById('estimated_time_stage_name').value = stage_name  || "";
        document.getElementById('estimated_time').value = estimated_time || "";

        // Show modal
        new bootstrap.Modal(document.getElementById('setStageDurationModal')).show();
    };

    // submit estimated duration
    const estimatedTimeForm = document.getElementById('estimated-time-stage-form');
    if (estimatedTimeForm) {
        estimatedTimeForm.addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(estimatedTimeForm);
            const url = "{{ route('admin.update-estimated-time') }}";

            try {
                const result = await fetch_cycle('--Store Estimated Time', url, 'POST', formData);
                if (result.status === 'success') {
                    // Handle success (e.g., refresh stage data)
                    console.log('Estimated time stored successfully');
                }
            } catch (error) {
                console.error('Error storing estimated time:', error);
            }
        });
    }


    // Edit stage
    window.editStage = async function(id) {
        // Optionally fetch the latest stage data from the server
        let stage = stageTable.row($(`button[onclick="editStage('${id}')"]`).parents('tr')).data();

        // If not found in DataTable, fetch from backend
        if (!stage) {
            try {
                const response = await fetch(`/admin/get-stage/${id}`);
                if (response.ok) {
                    stage = await response.json();
                }
            } catch (error) {
                console.error('Failed to fetch stage:', error);
                return;
            }
        }
        // Populate the form fields with stage data
        console.log("Editing stage:", stage);

        if (stage) {
            document.getElementById('edit_stage_id').value = stage.stage_id || stage.id || "";
            document.getElementById('edit_stage_name').value = stage.stage_name || stage.name || "";
            document.getElementById('edit_stage_status').value = stage.status || "";
            document.getElementById('edit_stage_sequence_order').value = stage.sequence_order || stage.sequence || "";
            document.getElementById('edit_stage_description').value = stage.description || "";
            // Show the modal for editing stage
            const modal = new bootstrap.Modal(document.getElementById('editStageModal'));
            modal.show();
        }
    };

    document.addEventListener('DOMContentLoaded', function () {
        const editStageForm = document.getElementById('edit-stage-form');
        if (editStageForm) {
            editStageForm.addEventListener('submit', async function (e) {
                e.preventDefault();
                const formData = new FormData(editStageForm);
                const url = "{{ route('admin.update-company-stage') }}";
                try {
                    const result = await fetch_cycle('--Update Stage', url, 'POST', formData);
                    if (result.status === 'success' && Array.isArray(result.stages)) {
                        const stages = result.stages.map(stage => ({
                            stage_name: stage.name || "N/A",
                            description: stage.description || "",
                            status: stage.status || "N/A",
                            sequence_order: stage.sequence || "N/A",
                            stage_id: stage.stage_id || stage.id || "N/A"
                        }));
                        stageTable.clear().rows.add(stages).draw();
                        const modal = bootstrap.Modal.getInstance(document.getElementById('editStageModal'));
                        if (modal) modal.hide();
                    }
                } catch (error) {
                    console.error('Error updating stage:', error);
                }
            });
        }
    });

    // Delete stage
    window.deleteStage = function(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to delete this stage?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(async (result) => {
            if (result.isConfirmed) {
                const url = `/admin/company-stages/${id}`;
                try {
                    const response = await fetch(url, {
                        method: 'DELETE',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                    });
                    const data = await response.json();
                    if (data.status === 'success') {
                        stageTable.row($(`button[onclick="deleteStage('${id}')"]`).parents('tr')).remove().draw();
                        Swal.fire('Deleted!', 'Stage has been deleted.', 'success');
                    } else {
                        Swal.fire('Error!', data.message || 'Failed to delete stage.', 'error');
                    }
                } catch (error) {
                    Swal.fire('Error!', 'An unexpected error occurred.', 'error');
                }
            }
        });
    };
    </script>
    <!-- End Stage Management Script -->
     <!-- Task Management -->
    <script>
    /**
     * Task Management Script
     * Handles:
     * - Fetching and displaying tasks for a stage in a DataTable.
     * - Adding, editing, and deleting tasks.
     * - Submitting the task management form and updating the task table.
     * - Uses fetch_cycle for AJAX requests.
     */

    // Initialize DataTable for Task Management
    const taskTable = $('#tbl-task-management').DataTable({
        paging: true,
        searching: true,
        ordering: false,
        responsive: true,
        columnDefs: [
            { orderable: false, targets: [6] } // Action column
        ],
        data: [],
        columns: [
            { data: 'title', title: 'Title' },
            {
                data: 'supervisor',
                title: 'Supervisor',
                render: function(data, type, row) {
                    // If supervisor is an array of objects, display as cards
                    if (Array.isArray(row.supervisors) && row.supervisors.length > 0) {
                        return row.supervisors.map(sup => `
                            <div class="card shadow-sm mb-1" style="display:inline-block; min-width:220px; max-width:320px;">
                                <div class="card-body p-2">
                                    <div class="d-flex align-items-center">
                                        <img src="${sup.profilePic || 'https://via.placeholder.com/32'}" alt="${sup.name ?? sup.full_name ?? 'N/A'}" class="rounded-circle me-2" style="width:32px;height:32px;object-fit:cover;">
                                        <div>
                                            <div class="fw-bold">${sup.name ?? sup.full_name ?? 'N/A'}</div>
                                            <div class="small text-muted">${sup.email ?? ''}</div>
                                            <div class="small text-secondary">${sup.jobTitle ?? ''}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `).join('');
                    }
                    // Fallback: display as plain text
                    return data || '<span class="text-muted">None</span>';
                }
            },
            { data: 'due_date', title: 'Due Date' },
            { data: 'priority', title: 'Priority' },
            { data: 'status', title: 'Status' },
            { data: 'tags', title: 'Tags' },
            {
                data: null,
                title: 'Action',
                className: 'text-end',
                render: (data, type, row) => `
                    <div class="d-flex justify-content-end gap-2">
                        <button class="btn btn-outline-light btn-sm" onclick="viewTask('${row.task_id}')">
                            <i class="las la-eye"></i> View Task
                        </button>
                        <button class="btn btn-outline-warning btn-sm" onclick="scheduleTask('${row.task_id}')">
                            <i class="las la-calendar-plus"></i> Schedule Management
                        </button>
                        <button class="btn btn-outline-info btn-sm" onclick="assignTask('${row.task_id}')">
                            <i class="las la-user-plus"></i> Assigned Employee
                        </button>
                        <button class="btn btn-outline-primary btn-sm" onclick="editTask('${row.task_id}')">
                            <i class="las la-edit"></i> Edit
                        </button>
                        <button class="btn btn-outline-danger btn-sm" onclick="deleteTask('${row.task_id}')">
                            <i class="las la-trash-alt"></i> Delete
                        </button>
                    </div>
                `
            }
        ]
    });
    // Show Task Management Modal for a stage
    window.manageStageTasks = function(stageId) {
        console.log("Manage Stage Tasks for Stage ID:", stageId);
        document.getElementById('task-management-form').reset();
        document.getElementById('stage_workflow_id').value = ""; // Clear workflow id if present
        document.getElementById('task-management-form').querySelector('input[name="stage_id"]').value = stageId;

        // Fetch and display tasks for the selected stage
        (async () => {
            const url = `/admin/get-stage-tasks/${stageId}`;
            try {
                const data = await fetchFieldInput(url);
                if (data.status === "success" && Array.isArray(data.tasks)) {
                    const tasks = data.tasks.map(task => ({
                        title: task.title || task.task_name || "N/A",
                        supervisor: Array.isArray(task.supervisors) && task.supervisors.length > 0
                            ? task.supervisors.map(sup => `
                                <div class="card shadow-sm mb-1" style="display:inline-block; min-width:220px; max-width:320px;">
                                    <div class="card-body p-2">
                                        <div class="d-flex align-items-center">
                                            <img src="${sup.ProfilePicture || 'https://via.placeholder.com/32'}" alt="${sup.name ?? sup.full_name ?? 'N/A'}" class="rounded-circle me-2" style="width:32px;height:32px;object-fit:cover;">
                                            <div>
                                                <div class="fw-bold">${sup.name ?? sup.full_name ?? [sup.FirstName, sup.LastName].filter(Boolean).join(" ") ?? 'N/A'}</div>
                                                <div class="small text-muted">${sup.Email ?? ''}</div>
                                                <div class="small text-secondary">${sup.EmployeeNumber ?? ''}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `).join('')
                            : '<span class="text-muted">None</span>',
                        due_date: task.due_date ? new Date(task.due_date).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }) : "N/A",
                        priority: task.priority || "N/A",
                        status: task.status || "N/A",
                        tags: Array.isArray(task.tags)
                            ? task.tags.map(tag => tag.name || tag).join(", ")
                            : (task.tags || ""),
                        task_id: task.stage_task_id || task.id || "N/A"
                    }));
                    taskTable.clear().rows.add(tasks).draw();
                    document.getElementById('task-management-form').reset();
                } else {
                    taskTable.clear().draw();
                }
            } catch (error) {
                console.error("Error fetching tasks:", error);
                taskTable.clear().draw();
            }
        })();

        // Show the task management modal
        const modal = new bootstrap.Modal(document.getElementById('taskManagementModal'));
        modal.show();
    };



    // Handle task form submission
    document.addEventListener('DOMContentLoaded', function () {
    const taskForm = document.getElementById('task-management-form');

    if (!taskForm) return;

    taskForm.addEventListener('submit', async function (e) {
        e.preventDefault();

        const formData = new FormData(taskForm);

        // Append selected supervisor IDs
        const supervisorIds = manager_5.getSelectedUserIds();
        supervisorIds.forEach(id => formData.append('supervisor_ids[]', id));

        // Append selected tag IDs
        const tagIds = taskTaggingSystem2.getTagIds();
        tagIds.forEach(id => formData.append('task_tag_ids[]', id));

        const url = "{{ route('admin.store-company-stage-task') }}";

        try {
            const result = await fetch_cycle('--Store Task', url, 'POST', formData);

            if (result.status === 'success' && result.data) {
                const task = result.data;

                // Prepare the row data for DataTable
                const formattedTask = {
                    title: task.task_name || "N/A",
                    supervisor: '', // Will be rendered by DataTable using `supervisors`
                    supervisors: Array.isArray(task.supervisors) ? task.supervisors.map(sup => ({
                        profilePic: sup.ProfilePicture || '',
                        name: sup.name || sup.full_name || [sup.FirstName, sup.LastName].filter(Boolean).join(' ') || 'N/A',
                        email: sup.Email || '',
                        jobTitle: sup.EmployeeNumber || ''
                    })) : [],
                    due_date: task.due_date
                        ? new Date(task.due_date).toLocaleDateString('en-GB', {
                            day: '2-digit',
                            month: 'short',
                            year: 'numeric'
                        })
                        : 'N/A',
                    priority: task.priority || 'N/A',
                    status: task.status || 'N/A',
                    tags: Array.isArray(task.tags)
                        ? task.tags.map(tag => tag.name || tag).join(', ')
                        : (task.tags || ''),
                    task_id: task.stage_task_id || task.id || 'N/A'
                };

                // Check if this task already exists in the table
                const rowIndex = taskTable.rows().indexes().filter(i => {
                    return taskTable.row(i).data().task_id === formattedTask.task_id;
                });

                let updatedRow;
                if (rowIndex.length > 0) {
                    // Update existing row
                    taskTable.row(rowIndex[0]).data(formattedTask).draw(false);
                    updatedRow = taskTable.row(rowIndex[0]).nodes().to$();
                } else {
                    // Add as new row
                    taskTable.row.add(formattedTask).draw(false);
                    updatedRow = taskTable.row(':last').nodes().to$();
                }

                // Highlight the updated or added row
                updatedRow.addClass('table-success');
                setTimeout(() => updatedRow.removeClass('table-success'), 2000);

                // Reset the form
                taskForm.reset();
            }
        } catch (error) {
            console.error('Error submitting task:', error);
        }
    });
});

    // Task Scheduling Management
    // Initialize DataTable for Task Scheduling
    const taskSchedulingTable = $('#tbl-task-scheduling').DataTable({
        paging: true,
        searching: true,
        ordering: false,
        responsive: true,
        columnDefs: [
            { orderable: false, targets: [6] } // Disable sorting on the Action column
        ],
        data: [],
        columns: [
            {
                data: 'is_recurrence',
                title: 'Recurrence',
                render: (data) => data ? data : 'N/A'
            },
            {
                data: 'assignee',
                title: 'Assignee',
                render: (data, type, row) => {
                    if (row.employee && row.employee.name) {
                        return row.employee.name;
                    }
                    return data ? data : '<span class="text-muted">None</span>';
                }
            },
            {
                data: 'start_date',
                title: 'Start Date',
                render: (data) => data ? new Date(data).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }) : 'N/A'
            },
            {
                data: 'end_date',
                title: 'End Date',
                render: (data) => data ? new Date(data).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }) : 'N/A'
            },
            {
                data: 'frequency',
                title: 'Frequency',
                render: (data) => data ? data : '<span class="text-muted">None</span>'
            },
            {
                data: 'status',
                title: 'Status',
                render: (data) => {
                    let badgeClass = 'secondary';
                    let label = data || 'N/A';
                    if (typeof data === 'string') {
                        switch (data.toLowerCase()) {
                            case 'completed': badgeClass = 'success'; break;
                            case 'pending': badgeClass = 'warning'; break;
                            case 'rejected': badgeClass = 'dark'; break;
                        }
                    }
                    return `<span class="badge bg-${badgeClass}">${label.charAt(0).toUpperCase() + label.slice(1)}</span>`;
                }
            },
            {
                data: null,
                title: 'Action',
                className: 'text-end',
                render: (data, type, row) => `
                    <div class="d-flex justify-content-end gap-2">
                    <button class="btn btn-outline-secondary btn-sm setup-task-metrics">
                        <i class="las la-chart-bar"></i> Metrics
                    </button>
                    </button>
                        <button class="btn btn-outline-primary btn-sm" onclick="editTaskSchedule('${row.schedule_id}')">
                            <i class="las la-edit"></i> Edit
                        </button>
                        <button class="btn btn-outline-danger btn-sm" onclick="deleteTaskSchedule('${row.schedule_id}')">
                            <i class="las la-trash-alt"></i> Delete
                        </button>
                    </div>
                `
            }
        ]
    });

    // Show Task Scheduling Modal for a task
    window.scheduleTask = function(taskId) {
        document.getElementById('task-scheduling-form').reset();
        document.getElementById('task_id').value = taskId;

        const row = taskTable.row($(`button[onclick="scheduleTask('${taskId}')"]`).parents('tr')).data();
        console.log('Task Title:', row ? row.title || row.task_name || 'N/A' : 'N/A');
        document.getElementById('schedule_task_title').value = row ? row.title || row.task_name || 'N/A' : 'N/A';
        // Fetch and display schedules for the selected task
        (async () => {
            const url = `/admin/get-task-schedules/${taskId}`;
            // const url = ``;
            try {
                const data = await fetchFieldInput(url);
                if (data.status === "success" && Array.isArray(data.task_schedules)) {
                    const schedules = data.task_schedules.map(schedule => ({
                        employee: schedule.employee?.name || "N/A",
                        start_date: schedule.start_time ? new Date(schedule.start_time).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }) : "N/A",
                        end_date: schedule.end_time ? new Date(schedule.end_time).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }) : "N/A",
                        status: (schedule.status && schedule.status.toLowerCase() === "in_progress") 
                            ? "In Progress" 
                            : (schedule.status ? schedule.status.charAt(0).toUpperCase() + schedule.status.slice(1) : "N/A"),
                        is_recurrence: schedule.is_recurrence=== true
                            ? '<span class="text-success"><i class="las la-check-circle"></i> Yes</span>'
                            : '<span class="text-danger"><i class="las la-times-circle"></i> No</span>',
                        frequency: schedule.recurrenceRule && schedule.recurrenceRule.frequency ? schedule.recurrenceRule.frequency : "N/A",
                        schedule_id: schedule.task_schedule_id || schedule.id || "N/A"
                    }));
                    taskSchedulingTable.clear().rows.add(schedules).draw();
                } else {
                    taskSchedulingTable.clear().draw();
                }
            } catch (error) {
                console.error("Error fetching task schedules:", error);
                taskSchedulingTable.clear().draw();
            }
        })();

        // Show the task scheduling modal
        const modal = new bootstrap.Modal(document.getElementById('taskSchedulingModal'));
        modal.show();
    };

    
    // Show/hide recurrence rule container based on is_recurrence radio
    document.addEventListener('DOMContentLoaded', function () {
        const recurrenceRadios = document.querySelectorAll('input[name="is_recurrence"]');
        const recurrenceRuleContainer = document.getElementById('recurrence-rule-container');
        if (recurrenceRadios.length && recurrenceRuleContainer) {
            function toggleRecurrenceRule() {
                const checked = Array.from(recurrenceRadios).find(r => r.checked);
                if (checked && checked.value === "1") {
                    recurrenceRuleContainer.style.display = '';
                } else {
                    recurrenceRuleContainer.style.display = 'none';
                }
            }
            recurrenceRadios.forEach(radio => {
                radio.addEventListener('change', toggleRecurrenceRule);
            });
            // Initial state
            toggleRecurrenceRule();
        }
    });
    
    // Fetch recurrence rule when a recurrence_rule_id is selected
    document.addEventListener('DOMContentLoaded', function () {
        const recurrenceRuleSelect = document.getElementById('recurrence_rule_id');
        console.log("Recurrence Rule Select Element:", recurrenceRuleSelect);
        
        if (recurrenceRuleSelect) {
            recurrenceRuleSelect.addEventListener('focus', async function () {
                console.log("Recurrence Rule Select Focused: ", recurrenceRuleSelect);
                
                // Populate recurrence rule select options dynamically
                try {
                    const companyId = "{{ json_encode($company->company_id) }}";
                    const url = `/admin/get-recurrence-rules/${companyId}`;
                    const data = await fetchFieldInput(url);
                    if (data.status === "success" && Array.isArray(data.recurrence_rules)) {
                        // Clear existing options
                        recurrenceRuleSelect.innerHTML = '';
                        // Add default option
                        const defaultOption = document.createElement('option');
                        defaultOption.value = '';
                        defaultOption.textContent = 'Select recurrence rule';
                        defaultOption.disabled = true;
                        defaultOption.selected = true;
                        recurrenceRuleSelect.appendChild(defaultOption);
                        // Add options from data
                        data.recurrence_rules.forEach(rule => {
                            const option = document.createElement('option');
                            option.value = rule.id || rule.recurrence_rule_id;
                            option.textContent = rule.name || rule.title || rule.frequency || 'Rule';
                            recurrenceRuleSelect.appendChild(option);
                        });
                    }
                } catch (error) {
                    console.error("Error fetching recurrence rules:", error);
                }
            });

            recurrenceRuleSelect.addEventListener('change', async function () {
                const ruleId = this.value;
                if (!ruleId) return;
                try {
                    const url = `/admin/get-recurrence-rule/${ruleId}`;
                    const data = await fetchFieldInput(url);
                    if (data.status === "success" && data.recurrence_rule) {
                        // Example: populate a description field or display rule details
                        const descField = document.getElementById('recurrence_rule_description');
                        if (descField) {
                            descField.textContent = data.recurrence_rule.description || '';
                        }
                        // You can populate other fields as needed
                    }
                } catch (error) {
                    console.error("Error fetching recurrence rule:", error);
                }
            });
        }
    });

    // Handle task scheduling form submission
    document.addEventListener('DOMContentLoaded', function () {
        const schedulingForm = document.getElementById('task-scheduling-form');
        if (schedulingForm) {
            schedulingForm.addEventListener('submit', async function (e) {
                e.preventDefault();
                const formData = new FormData(schedulingForm);
                const url = "{{ route('admin.store-company-stage-task-schedule') }}";

                try {
                    const result = await fetch_cycle('--Store Task Schedule', url, 'POST', formData);
                    if (result.status === 'success' && Array.isArray(result.schedules)) {
                        const schedules = result.schedules.map(schedule => ({
                            employee: schedule.employee?.name || "N/A",
                            start_date: schedule.start_date ? new Date(schedule.start_date).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }) : "N/A",
                            end_date: schedule.end_date ? new Date(schedule.end_date).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }) : "N/A",
                            status: schedule.status || "N/A",
                            remarks: schedule.remarks || "",
                            schedule_id: schedule.schedule_id || schedule.id || "N/A"
                        }));
                        taskSchedulingTable.clear().rows.add(schedules).draw();
                        schedulingForm.reset();
                    }
                } catch (error) {
                    console.error('Error storing task schedule:', error);
                }
            });
        }
    });

    
    // Edit task schedule
    window.editTaskSchedule = async function(id) {
        let schedule = taskSchedulingTable.row($(`button[onclick="editTaskSchedule('${id}')"]`).parents('tr')).data();

        if (!schedule) {
            try {
                const response = await fetch(`/admin/get-task-schedule/${id}`);
                if (response.ok) {
                    schedule = await response.json();
                }
            } catch (error) {
                console.error('Failed to fetch task schedule:', error);
                return;
            }
        }

        if (schedule) {
            document.getElementById('schedule_id').value = schedule.schedule_id || schedule.id || "";
            document.getElementById('employee_id').value = schedule.employee_id || "";
            document.getElementById('start_date').value = schedule.start_date || "";
            document.getElementById('end_date').value = schedule.end_date || "";
            document.getElementById('status').value = schedule.status || "";
            document.getElementById('remarks').value = schedule.remarks || "";
            // Show the modal for editing schedule
            const modal = new bootstrap.Modal(document.getElementById('taskSchedulingModal'));
            modal.show();
        }
    };

    // Delete task schedule
    window.deleteTaskSchedule = function(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to delete this schedule?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(async (result) => {
            if (result.isConfirmed) {
                const url = `/admin/task-schedules/${id}`;
                try {
                    const response = await fetch(url, {
                        method: 'DELETE',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                    });
                    const data = await response.json();
                    if (data.status === 'success') {
                        taskSchedulingTable.row($(`button[onclick="deleteTaskSchedule('${id}')"]`).parents('tr')).remove().draw();
                        Swal.fire('Deleted!', 'Schedule has been deleted.', 'success');
                    } else {
                        Swal.fire('Error!', data.message || 'Failed to delete schedule.', 'error');
                    }
                } catch (error) {
                    Swal.fire('Error!', 'An unexpected error occurred.', 'error');
                }
            }
        });
    };

    // assign task
    window.assignTask = function(taskId) {
        console.log("Assign Task for Task ID:", taskId);
        document.getElementById('assign-employee-task-form').reset();
        document.getElementById('assign_task_id').value = taskId;

        // Fetch and display assigned employees for the selected task
        (async () => {
            const url = `/admin/get-task-assignees/${taskId}`;
            try {
                const data = await fetchFieldInput(url);
                if (data.status === "success" && Array.isArray(data.assignees)) {
                    const assignees = data.assignees.map(assignee => ({
                        employee_id: assignee.employee_id || assignee.id || "N/A",
                        name: assignee.name || assignee.full_name || "N/A",
                        email: assignee.email || "N/A",
                        job_title: assignee.job_title || "N/A"
                    }));
                    // Populate the assign task table or form as needed
                    // For example, you can use a DataTable or a simple list
                } else {
                    // Handle no assignees case
                }
            } catch (error) {
                console.error("Error fetching task assignees:", error);
            }
        })();

        // Show the assign task modal
        const modal = new bootstrap.Modal(document.getElementById('assignEmployeeToTaskModal'));
        modal.show();
    };
    // Handle assign employee form submission
    document.addEventListener('DOMContentLoaded', function () {
        const assignEmployeeForm = document.getElementById('assign-employee-task-form');
        if (assignEmployeeForm) {
            assignEmployeeForm.addEventListener('submit', async function (e) {
                e.preventDefault();
                const formData = new FormData(assignEmployeeForm);
                // Append selected supervisor IDs
                const employeeIds = manager_6.getSelectedUserIds();
                employeeIds.forEach(id => formData.append('employee_ids[]', id));
                const url = "{{ route('admin.store-task-employee') }}";
                try {
                    const result = await fetch_cycle('--Assign Employee to Task', url, 'POST', formData);
                    if (result.status === 'success') {
                        const modal = bootstrap.Modal.getInstance(document.getElementById('assignEmployeeToTaskModal'));
                        if (modal) modal.hide();
                    }
                } catch (error) {
                    console.error('Error assigning employee to task:', error);
                }
            });
        }
    });

    // Edit task
    window.editTask = async function(id) {
        let task = taskTable.row($(`button[onclick="editTask('${id}')"]`).parents('tr')).data();

        if (!task) {
            try {
                const response = await fetch(`/admin/get-stage-tasks/${id}`);
                if (response.ok) {
                    task = await response.json();
                }
            } catch (error) {
                console.error('Failed to fetch task:', error);
                return;
            }
        }
        console.log("Editing task:", task);
        if (task) {
            document.getElementById('edit_task_id').value = task.task_id || task.id || "";
            document.getElementById('edit_task_title').value = task.title || task.task_name || "";
            document.getElementById('edit_task_description').value = task.description || "";
            document.getElementById('edit_task_status').value = task.status || "";
            document.getElementById('edit_task_priority').value = task.priority || "";
            document.getElementById('edit_task_due_date').value = task.due_date ? new Date(task.due_date).toISOString().split('T')[0] : "";
            const modal = new bootstrap.Modal(document.getElementById('editStageTaskModal'));
            modal.show();
            
        }
    };

    // Handle task edit form submission
    document.addEventListener('DOMContentLoaded', function () {
        const editTaskForm = document.getElementById('edit-stage-task-form');
        if (editTaskForm) {
            editTaskForm.addEventListener('submit', async function (e) {
                e.preventDefault();
                const formData = new FormData(editTaskForm);
                const url = "{{ route('admin.update-company-stage-task') }}";
                try {
                    const result = await fetch_cycle('--Update Task', url, 'POST', formData);
                    if (result.status === 'success' && Array.isArray(result.tasks)) {
                        const tasks = result.tasks.map(task => ({
                            title: task.title || "N/A",
                            supervisor: task.supervisor || "N/A",
                            due_date: task.due_date ? new Date(task.due_date).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }) : "N/A",
                            priority: task.priority || "N/A",
                            status: task.status || "N/A",
                            tags: Array.isArray(task.tags) ? task.tags.map(tag => tag.name || tag).join(", ") : (task.tags || ""),
                            task_id: task.task_id || task.id || "N/A"
                        }));
                        taskTable.clear().rows.add(tasks).draw();
                        const modal = bootstrap.Modal.getInstance(document.getElementById('taskManagementModal'));
                        if (modal) modal.hide();
                    }
                } catch (error) {
                    console.error('Error updating task:', error);
                }
            });
        }
    });

    // Delete task
    window.deleteTask = function(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to delete this task?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(async (result) => {
            if (result.isConfirmed) {
                const url = `/admin/stage-tasks/${id}`;
                try {
                    const response = await fetch(url, {
                        method: 'DELETE',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                    });
                    const data = await response.json();
                    if (data.status === 'success') {
                        taskTable.row($(`button[onclick="deleteTask('${id}')"]`).parents('tr')).remove().draw();
                        Swal.fire('Deleted!', 'Task has been deleted.', 'success');
                    } else {
                        Swal.fire('Error!', data.message || 'Failed to delete task.', 'error');
                    }
                } catch (error) {
                    Swal.fire('Error!', 'An unexpected error occurred.', 'error');
                }
            }
        });
    };
    // Show task metrics modal
    $(document).on('click', '.setup-task-metrics', async function() {
        const rowData = taskSchedulingTable.row($(this).closest('tr')).data();
        const scheduleId = rowData.task_schedule_id || rowData.schedule_id || rowData.id || '';
        document.querySelector('#task-metrics-form input[name="task_schedule_id"]').value = scheduleId;
        const taskMetricsModal = new bootstrap.Modal(document.getElementById('taskMetricsModal'));
        taskMetricsModal.show();
    });
   // Initialize the DataTable
const taskMetricsHistoryTable = $('#tbl-task-metrics').DataTable({
    paging: true,
    searching: true,
    ordering: false,
    responsive: true,
    data: [],
    columns: [
        { data: 'expected_chemical_quantity' },           // Chemical Quantity
        { data: 'expected_material_quantity' },           // Material Quantity
        { data: 'expected_water_quantity' },              // Water Quantity (L)
        {
            data: null,                                   // Action buttons
            orderable: false,
            className: 'text-center',                        // Align right
            render: (data, type, row) => `
                <div class="d-flex justify-content-end gap-2">
                    <button class="btn btn-outline-primary btn-sm" onclick="editTaskMetrics('${row.task_metrics_id}')">
                        <i class="las la-edit"></i> Edit
                    </button>
                    <button class="btn btn-outline-danger btn-sm" onclick="deleteTaskMetrics('${row.task_metrics_id}')">
                        <i class="las la-trash-alt"></i> Delete
                    </button>
                </div>
            `
        }
    ]
});

// Fetch and reload task metrics
async function reloadTaskMetrics(scheduleId) {
    if (!scheduleId) return;

    const url = `/admin/get-task-schedule-metrics/${scheduleId}`;
    try {
        const response = await fetch_cycle('--Reload Task Metrics', url, 'GET');
        if (response.status === "success" && Array.isArray(response.task_schedule_metrics)) {
            const metrics = response.task_schedule_metrics.map(metric => ({
                expected_chemical_quantity: metric.expected_chemical_quantity || "N/A",
                expected_material_quantity: metric.expected_material_quantity || "N/A",
                expected_water_quantity: metric.expected_water_quantity || "N/A",
                task_metrics_id: metric.task_schedule_metric_id || metric.id || "N/A"
            }));
            taskMetricsHistoryTable.clear().rows.add(metrics).draw();
        } else {
            taskMetricsHistoryTable.clear().draw();
        }
    } catch (error) {
        console.error("Error reloading task metrics:", error);
        taskMetricsHistoryTable.clear().draw();
    }
}

// Handle form submission
document.getElementById('task-metrics-form').addEventListener('submit', async function (e) {
    e.preventDefault();

    const formData = new FormData(this);
    const scheduleId = formData.get('task_schedule_id');
    const url = "{{ route('admin.store-task-metrics') }}";

    try {
        const result = await fetch_cycle('--Store Task Metrics', url, 'POST', formData);
        if (result.status === 'success') {
            await reloadTaskMetrics(scheduleId);
            this.reset();
        } else {
            console.warn('Task metric store failed:', result);
        }
    } catch (error) {
        console.error('Error storing task metrics:', error);
    }
});

// Fetch when modal opens
$('#taskMetricsModal').on('shown.bs.modal', async function () {
    const scheduleId = document.querySelector('#task-metrics-form input[name="task_schedule_id"]').value;
    await reloadTaskMetrics(scheduleId);
});


    // Edit task metrics
    window.editTaskMetrics = async function(id) {
        let metric;
        try {
            const response = await fetch(`/admin/get-task-metrics-by-id/${id}`);
            if (response.ok) {
                metric = await response.json();
            }
        } catch (error) {
            console.error('Failed to fetch task metrics:', error);
            return;
        }
        if (metric) {
            document.querySelector('#task-metrics-form input[name="expected_chemical_quantity"]').value = metric.expected_chemical_quantity || "";
            document.querySelector('#task-metrics-form input[name="expected_material_quantity"]').value = metric.expected_material_quantity || "";
            document.querySelector('#task-metrics-form input[name="expected_water_quantity"]').value = metric.expected_water_quantity || "";
            document.querySelector('#task-metrics-form input[name="task_metrics_id"]').value = metric.task_metrics_id || metric.id || "";
        }
    };

    // Delete task metrics
    window.deleteTaskMetrics = function(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to delete this task metrics entry?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(async (result) => {
            if (result.isConfirmed) {
                const url = `/admin/task-metrics/${id}`;
                try {
                    const response = await fetch(url, {
                        method: 'DELETE',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                    });
                    const data = await response.json();
                    if (data.status === 'success') {
                        taskMetricsHistoryTable.row($(`button[onclick="deleteTaskMetrics('${id}')"]`).parents('tr')).remove().draw();
                        Swal.fire('Deleted!', 'Task metrics entry has been deleted.', 'success');
                    } else {
                        Swal.fire('Error!', data.message || 'Failed to delete task metrics.', 'error');
                    }
                } catch (error) {
                    Swal.fire('Error!', 'An unexpected error occurred.', 'error');
                }
            }
        });
    };

            // Employee Assignment Management
            // Initialize DataTable for Employee Assignment Management
            const employeeAssignmentTable = $('#tbl-employee-assignment-management').DataTable({
                paging: true,
                searching: true,
                ordering: false,
                responsive: true,
                columnDefs: [
                    { orderable: false, targets: [4] } // Action column
                ],
                data: [],
                columns: [
                    { data: 'employee_name', title: 'Employee Name' },
                    { data: 'email', title: 'Email' },
                    { data: 'job_title', title: 'Job Title' },
                    { data: 'assignment_status', title: 'Status' },
                    {
                        data: null,
                        title: 'Action',
                        className: 'text-end',
                        render: (data, type, row) => `
                            <div class="d-flex justify-content-end gap-2">
                                <button class="btn btn-outline-danger btn-sm" onclick="removeEmployeeAssignment('${row.assignment_id}')">
                                    <i class="las la-trash-alt"></i> Remove
                                </button>
                            </div>
                        `
                    }
                ]
            });
            
            // Show Employee Assignment Management Modal for a task
            window.viewEmployeeAssignmentManagement = function(taskId) {
                // Fetch and display assigned employees for the selected task
                (async () => {
                    const url = `/admin/get-task-assignees/${taskId}`;
                    try {
                        const data = await fetchFieldInput(url);
                        if (data.status === "success" && Array.isArray(data.assignees)) {
                            const assignees = data.assignees.map(assignee => ({
                                employee_name: assignee.name || assignee.full_name || "N/A",
                                email: assignee.email || "N/A",
                                job_title: assignee.job_title || "N/A",
                                assignment_status: assignee.status || "N/A",
                                assignment_id: assignee.assignment_id || assignee.id || "N/A"
                            }));
                            employeeAssignmentTable.clear().rows.add(assignees).draw();
                        } else {
                            employeeAssignmentTable.clear().draw();
                        }
                    } catch (error) {
                        console.error("Error fetching task assignees:", error);
                        employeeAssignmentTable.clear().draw();
                    }
                })();

                // Show the employee assignment management modal
                const modal = new bootstrap.Modal(document.getElementById('employeeAssignmentManagementModal'));
                modal.show();
            };

            // Remove employee assignment from task
            
    </script>
    <!-- End Task Management -->
=======
>>>>>>> af7d38bfde04eca4651980506daea42e09a51b6a
    @endsection

</x-layouts.admin-app>