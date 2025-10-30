<x-layouts.admin-app>
    @section('styles')
        <link href="{{ asset('adminAssets/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('adminAssets/libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('adminAssets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('adminAssets/libs/spectrum-colorpicker/spectrum.css') }}"
            rel="stylesheet" type="text/css" />
                <!-- Inline CSS (consider extracting to file) -->
        <style>
            /* --- General Font & Colors --- */
            body,
            input,
            textarea,
            select,
            button {
                font-family: 'Inter', 'Roboto', sans-serif;
                color: #212529;
                /* background-color: #f8f9fa; */
            }

            /* --- Cards --- */
            .card {
                border: none;
                border-radius: 12px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
                /* padding: 1.5rem; */
                margin-bottom: 1.5rem;
                transition: transform 0.25s ease, box-shadow 0.25s ease;
                /* background-color: #fff; */
            }

            .card:hover {
                /* transform: translateY(-3px); */
                box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
            }

            /* --- Quill Editor --- */
            #editor-container {
                border: 1px solid #ddd;
                border-radius: 8px;
                display: flex;
                flex-direction: column;
                min-height: 200px;
                max-height: 600px;
                overflow-y: auto;
                /* background-color: #fff; */
            }

            .ql-toolbar {
                border: none;
                background: #f9f9f9;
                border-bottom: 1px solid #ddd;
                border-radius: 8px 8px 0 0;
                padding: 4px 8px;
            }

            .ql-toolbar button {
                border: none;
                background: transparent;
                padding: 4px 6px;
                border-radius: 4px;
                transition: background-color 0.2s ease;
            }

            .ql-toolbar button:hover {
                background-color: #e8f0fe;
                /* Gmail-like hover */
            }

            .ql-toolbar .ql-formats {
                margin-right: 8px;
            }

            #editor {
                padding: 12px;
                flex: 1;
                min-height: 200px;
                outline: none;
            }

            /* --- Fullscreen Editor --- */
            /* Fullscreen editor */
            .ql-fullscreen {
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                width: 100%;
                height: 100%;
                z-index: 1050;
                /* background: #fff; */
                padding: 1rem;
            }

            /* Fullscreen */
            .ql-fullscreen {
                position: fixed !important;
                top: 0 !important;
                left: 0 !important;
                right: 0 !important;
                bottom: 0 !important;
                width: 100% !important;
                height: 100% !important;
                z-index: 1050 !important;
                background: #fff;
                overflow: auto;
                display: flex;
                flex-direction: column;
                padding: 1rem;
            }

            .ql-fullscreen .ql-toolbar {
                position: sticky;
                top: 0;
                z-index: 1060;
                background: #fff;
            }

            /* --- Tabs --- */
            .nav-tabs {
                border-bottom: none;
                margin-bottom: 1rem;
            }

            .nav-tabs .nav-link {
                border: none;
                font-weight: 500;
                color: #6c757d;
                display: flex;
                align-items: center;
                gap: 6px;
                padding: 0.75rem 1rem;
                transition: color 0.2s ease, border-bottom 0.2s ease;
            }

            .nav-tabs .nav-link.active {
                color: #0d6efd;
                border-bottom: 2px solid #0d6efd;
                background-color: transparent;
            }

            /* --- Tab Subtitles --- */
            .tab-subtitle {
                font-size: 0.95rem;
                color: #6c757d;
                margin-top: -0.25rem;
                margin-bottom: 1.5rem;
                display: flex;
                align-items: center;
                transition: color 0.2s ease, font-weight 0.2s ease, opacity 0.25s ease;
            }

            .tab-subtitle span#tabIcon {
                font-size: 1rem;
                margin-right: 0.5rem;
            }

            .tab-subtitle.active {
                color: #0d6efd;
                font-weight: 500;
            }

            /* --- Form Inputs --- */
            .form-control,
            .form-select {
                border-radius: 8px;
                border: 1px solid #CED4DA;
                padding: 0.5rem 0.75rem;
                transition: border-color 0.25s ease, box-shadow 0.25s ease;
            }

            .form-control:focus,
            .form-select:focus {
                border-color: #0d6efd;
                box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
            }

            /* --- Buttons --- */
            .btn-primary,
            .btn-warning,
            .btn-danger {
                border-radius: 8px;
                padding: 0.5rem 1rem;
                font-weight: 500;
                transition: transform 0.15s ease, box-shadow 0.15s ease, background-color 0.15s ease;
            }

            .btn-primary:hover,
            .btn-warning:hover,
            .btn-danger:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            }

            /* --- SEO Preview Box --- */
            .preview-seo {
                background: #f8f9fa;
                border-radius: 8px;
                padding: 1rem;
                margin-top: 0.5rem;
            }

            /* --- Responsive Row Padding --- */
            .row.g-0>.col-lg-7,
            .row.g-0>.col-lg-5 {
                padding: 1.5rem;
            }

            /* --- Action Buttons & Heading Row --- */
            .header-actions {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 1.5rem;
            }

            .header-actions h1 {
                margin: 0;
                font-size: 1.75rem;
                font-weight: 600;
            }

            .header-actions .btn-group {
                display: flex;
                gap: 0.5rem;
            }
        </style>
        <style>
            /* Container */
            .author-tag-input {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            padding: 8px;
            border: 1px solid #d1d5db; /* gray-300 */
            border-radius: 8px;
            background-color: #ffffff;
            position: relative;
            min-height: 50px;
            cursor: text;
            }

            /* Input field */
            .author-tag-input input.form-control {
            flex: 1;
            min-width: 160px;
            border: none;
            }

            /* Tag (selected author) */
            .author-tag-input .tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background-color: #e0f2fe; /* sky-100 */
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
            }

            .author-tag-input .tag span {
            cursor: pointer;
            font-weight: bold;
            margin-left: 6px;
            color: #475569; /* slate-600 */
            transition: color 0.2s ease;
            }

            .author-tag-input .tag span:hover {
            color: #ef4444; /* red-500 */
            }

            /* Suggestions Dropdown */
            .suggestions {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            max-height: 220px;
            overflow-y: auto;
            background: #ffffff;
            /* border: 1px solid #d1d5db; */
            border-radius: 8px;
            margin-top: 4px;
            z-index: 9999;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            }

            /* Each suggestion */
            .suggestions .suggestion {
            padding: 10px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: background-color 0.2s ease;
            }

            .suggestions .suggestion:hover {
            background-color: #f1f5f9; /* slate-100 */
            }

            /* Suggestion text */
            .suggestions .suggestion strong {
            font-size: 15px;
            color: #1d4ed8; /* blue-700 */
            }

            .suggestions .suggestion span {
            font-size: 13px;
            color: #64748b; /* slate-500 */
            }

            /* Scrollbar styling */
            .suggestions::-webkit-scrollbar {
            width: 6px;
            }
            .suggestions::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
            }
            /* ===========================
            CATEGORY TAGGING COMPONENT
            =========================== */

            /* Container */
            .tag-input {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            padding: 8px;
            border: 1px solid #d1d5db; /* gray-300 */
            border-radius: 8px;
            background-color: #ffffff;
            position: relative;
            min-height: 50px; 
            cursor: text;
            }

            /* Input field */
            .tag-input input.form-control {
            flex: 1;
            min-width: 140px;
            border: none;
            outline: none;
            font-size: 14px;
            padding: 6px 8px;
            background: transparent;
            }

            /* Tag (selected category) */
            .tag-input .tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background-color: #dcfce7; /* green-100 */
            color: #166534; /* green-800 */
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            }

            .tag-input .tag span {
            cursor: pointer;
            font-weight: bold;
            margin-left: 6px;
            color: #475569; /* slate-600 */
            transition: color 0.2s ease;
            }

            .tag-input .tag span:hover {
            color: #ef4444; /* red-500 */
            }

            /* Media Item Styles */
            .media-item {
                transition: transform 0.2s, box-shadow 0.2s;
            }
            .media-item:hover {
                transform: scale(1.05);
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            }
            .media-item.selected {
                border-color: #0d6efd !important;
                box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
            }
            .media-card {
                background: #fff;
                border: 1px solid #dee2e6;
                border-radius: 8px;
                padding: 0.5rem;
                text-align: center;
            }
            .media-card small {
                display: block;
                font-size: 0.8rem;
                color: #6c757d;
            }
            #media-loading {
                text-align: center;
                padding: 2rem;
            }
            #uppy-upload {
                min-height: 200px;
                border: 2px dashed #ced4da;
                border-radius: 8px;
                padding: 2rem;
                text-align: center;
            }
        </style>
        <style>
            .media-card.selected {
                border: 2px solid #007bff !important;
                background-color: rgba(0, 123, 255, 0.05);
                box-shadow: 0 0 10px rgba(0,123,255,0.3);
                transform: scale(1.02);
                transition: all 0.2s;
            }

            .pagination .page-item.active .page-link {
                background-color: #007bff;
                border-color: #007bff;
                color: white;
            }

        </style>
    @endsection

    {{-- ✅ Set dynamic page title for browser tab --}}
    @section('PageTitle', $title ?? 'Edit Page')

    <div class="container-xxl">
        <!-- 🔹 Page Title + Actions -->
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <h1 class="mb-0">✏️ Edit Page — <span class="text-primary">{{ $page->title }}</span></h1>
            <div class="d-flex flex-wrap gap-2">
                <button type="submit" form="pageForm" class="btn btn-primary">
                    💾 Update Page
                </button>
                <button type="button" id="previewBtn" class="btn btn-warning">
                    👁 Preview
                </button>
                <a href="{{ route('admin.pages.index') }}" class="btn btn-danger">
                    ❌ Cancel
                </a>
            </div>
        </div>

        <form id="pageForm" method="POST" action="{{ route('admin.pages.update', ['page' => $page->page_id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-4">
                <!-- 🔸 Left Column: Main Content -->
                <div class="col-lg-8 col-md-12">
                    <div class="grid gap-4">
                        <!-- Page Content -->
                        <div class="card shadow-sm border-0">
                            <div class="card-header bg-light fw-bold">📝 Page Content</div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Page Title</label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title', $page->title) }}" required>
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Slug</label>
                                        <input type="text" name="slug" class="form-control" value="{{ old('slug', $page->slug) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Menu Order</label>
                                        <input type="number" name="menu_order" class="form-control" value="{{ old('menu_order', $page->menu_order) }}">
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <label class="form-label fw-semibold">Excerpt</label>
                                    <textarea name="excerpt" class="form-control" rows="3">{{ old('excerpt', $page->excerpt) }}</textarea>
                                </div>

                                <div class="mt-3">
                                    <label class="form-label fw-semibold">Body</label>
                                    <textarea name="body" class="form-control" rows="10">{{ old('body', $page->body) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- SEO & Meta -->
                        <div class="card shadow-sm border-0">
                            <div class="card-header bg-light fw-bold">🔍 SEO & Metadata</div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $page->meta_title) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Meta Description</label>
                                        <input type="text" name="meta_description" class="form-control" value="{{ old('meta_description', $page->meta_description) }}">
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <label class="form-label">Keywords (comma-separated)</label>
                                    <input type="text" name="keywords" class="form-control"
                                        value="{{ old('keywords', is_array($page->keywords) ? implode(',', $page->keywords) : $page->keywords) }}">
                                </div>

                                <div class="row g-3 mt-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Canonical URL</label>
                                        <input type="text" name="canonical_url" class="form-control" value="{{ old('canonical_url', $page->canonical_url) }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Index</label>
                                        <select name="robots_index" class="form-select">
                                            <option value="index" {{ $page->robots_index === 'index' ? 'selected' : '' }}>Index</option>
                                            <option value="noindex" {{ $page->robots_index === 'noindex' ? 'selected' : '' }}>No Index</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Follow</label>
                                        <select name="robots_follow" class="form-select">
                                            <option value="follow" {{ $page->robots_follow === 'follow' ? 'selected' : '' }}>Follow</option>
                                            <option value="nofollow" {{ $page->robots_follow === 'nofollow' ? 'selected' : '' }}>No Follow</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Template & Layout -->
                        <div class="card shadow-sm border-0">
                            <div class="card-header bg-light fw-bold">🎨 Template & Layout</div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Template</label>
                                        <select name="template" class="form-select">
                                            <option value="default" {{ $page->template === 'default' ? 'selected' : '' }}>Default</option>
                                            <option value="fullwidth" {{ $page->template === 'fullwidth' ? 'selected' : '' }}>Full Width</option>
                                            <option value="sidebar" {{ $page->template === 'sidebar' ? 'selected' : '' }}>Sidebar</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Layout Style</label>
                                        <select name="layout_style" class="form-select">
                                            <option value="default" {{ $page->layout_style === 'default' ? 'selected' : '' }}>Default</option>
                                            <option value="boxed" {{ $page->layout_style === 'boxed' ? 'selected' : '' }}>Boxed</option>
                                            <option value="wide" {{ $page->layout_style === 'wide' ? 'selected' : '' }}>Wide</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Media -->
                        <div class="card shadow-sm border-0">
                            <div class="card-header bg-light fw-bold">🖼 Media</div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Featured Image</label>
                                    <input type="file" name="featured_image" class="form-control">
                                    @if($page->featured_image)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $page->featured_image) }}" class="img-thumbnail rounded" width="160">
                                        </div>
                                    @endif
                                </div>

                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="enable_slider" name="enable_slider" value="1" {{ $page->enable_slider ? 'checked' : '' }}>
                                    <label class="form-check-label" for="enable_slider">Enable Slider</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 🔸 Right Column: Settings / Sidebar -->
                <div class="col-lg-4 col-md-12">
                    <div class="grid gap-4">
                        <!-- Visibility -->
                        <div class="card shadow-sm border-0">
                            <div class="card-header bg-light fw-bold">🔒 Visibility & Scheduling</div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="draft" {{ $page->status === 'draft' ? 'selected' : '' }}>Draft</option>
                                        <option value="published" {{ $page->status === 'published' ? 'selected' : '' }}>Published</option>
                                        <option value="scheduled" {{ $page->status === 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Visibility</label>
                                    <select name="visibility" class="form-select">
                                        <option value="public" {{ $page->visibility === 'public' ? 'selected' : '' }}>Public</option>
                                        <option value="private" {{ $page->visibility === 'private' ? 'selected' : '' }}>Private</option>
                                        <option value="password" {{ $page->visibility === 'password' ? 'selected' : '' }}>Password Protected</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Password (if protected)</label>
                                    <input type="text" name="visibility_password" class="form-control" value="{{ old('visibility_password', $page->visibility_password) }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Publish Date</label>
                                    <input type="datetime-local" name="publish_at" class="form-control" value="{{ old('publish_at', optional($page->publish_at)->format('Y-m-d\TH:i')) }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Expire Date</label>
                                    <input type="datetime-local" name="expire_at" class="form-control" value="{{ old('expire_at', optional($page->expire_at)->format('Y-m-d\TH:i')) }}">
                                </div>
                            </div>
                        </div>

                        <!-- Hierarchy -->
                        <div class="card shadow-sm border-0">
                            <div class="card-header bg-light fw-bold">📂 Parent Page</div>
                            <div class="card-body">
                                <select name="parent_id" class="form-select">
                                    <option value="">No Parent (Top Level)</option>
                                    @foreach($allPages as $p)
                                        @if($p->page_id !== $page->page_id)
                                            <option value="{{ $p->page_id }}" {{ $p->page_id == $page->parent_id ? 'selected' : '' }}>
                                                {{ $p->title }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @section('scripts')
        <script src="{{ asset('adminAssets/libs/quill/quill.min.js') }}"></script>
        <script src="{{ asset('adminAssets/libs/select2/select2.min.js') }}"></script>
        <script src="{{ asset('adminAssets/libs/spectrum-colorpicker/spectrum.js') }}"></script>
        <script src="{{ asset('adminAssets/js/pages/form-editor.init.js') }}"></script>
        <script src="{{ asset('adminAssets/js/pages/form-advanced.init.js') }}"></script>
        {{-- Optional: Preview handler --}}
        <script>
            document.getElementById('previewBtn').addEventListener('click', function() {
                const form = document.getElementById('pageForm');
                form.action = "{{ route('admin.pages.preview') }}";
                form.target = "_blank";
                form.submit();
            });
        </script>
    @endsection
</x-layouts.admin-app>