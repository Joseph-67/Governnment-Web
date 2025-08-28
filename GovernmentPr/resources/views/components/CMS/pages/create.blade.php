<x-layouts.admin-app>
    @section('styles')
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/quill-emoji@0.2.0/dist/quill-emoji.css" rel="stylesheet" />
    <link href="{{asset('adminAssets/libs/uppy/uppy.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('adminAssets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('adminAssets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

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

    @endsection

    <div class="container-xxl">
        <!-- Page Title + Actions -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0">📄 Page Builder</h2>

            <!-- Action Buttons Top -->
            <div class="d-flex gap-2">
                <button type="submit" form="pageForm" class="btn btn-primary">💾 Save Page</button>
                <button type="button" class="btn btn-warning" id="previewBtn">👁 Preview</button>
                <a href="{{ route('admin.pages.index') }}" class="btn btn-danger">Cancel</a>
            </div>
            <!-- End Action Buttons Top -->
        </div>

        <form method="POST" action="{{ route('admin.pages.store') }}" id="pageForm">
            @csrf
            <div class="row g-4">
                <!-- Left Column -->
                <div class="col-lg-7">
                    <div class="card card-body">
                        <h4 class="mb-3">Create Content</h4>
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="pageTitle" class="form-label">Page Title</label>
                                <input type="text" class="form-control" name="title" id="pageTitle"
                                    value="{{ old('title') }}" placeholder="e.g. About Us">
                            </div>

                            <div class="col-md-8">
                                <label for="pageSlug" class="form-label">Slug / URL</label>
                                <input type="text" class="form-control" name="slug" id="pageSlug"
                                    value="{{ old('slug') }}" placeholder="about-us">
                            </div>
                            <div class="col-md-4">
                                <label for="menuOrder" class="form-label">Order / Position</label>
                                <input type="number" class="form-control" name="menu_order" id="menuOrder"
                                    value="{{ old('menu_order', 0) }}">
                            </div>
                            <div class="col-md-12">
                                <label for="excerpt" class="form-label">Excerpt / Summary</label>
                                <textarea class="form-control" name="excerpt" id="excerpt" rows="2"
                                    placeholder="Short description for cards and previews">{{ old('excerpt') }}</textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Page Content</label>
                                <div id="editor-container">
                                    <div id="editor">{!! old('content') !!}</div>
                                </div>
                                <input type="hidden" name="body" id="body">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right Column -->
                <div class="col-lg-5">
                    <div class="card card-body">
                        <h4 class="mb-3">Page Settings</h4>
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="pageStatus" class="form-label">Status</label>
                                <select class="form-select" name="status" id="pageStatus">
                                    <option value="draft" {{ old('status')==='draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="published" {{ old('status')==='published' ? 'selected' : '' }}>
                                        Published</option>
                                    <option value="archived" {{ old('status')==='archived' ? 'selected' : '' }}>Archived
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="publishAt">Schedule Publish</label>
                                <input type="datetime-local" class="form-control" name="publish_at" id="publishAt"
                                    value="{{ old('publish_at') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="expireAt">Expiry / Auto-Unpublish</label>
                                <input type="datetime-local" class="form-control" name="expire_at" id="expireAt"
                                    value="{{ old('expire_at') }}">
                            </div>
                            <div class="col-md-12">
                                <label for="visibility" class="form-label">Visibility</label>
                                <select class="form-select" name="visibility" id="visibility">
                                    <option value="public" {{ old('visibility')==='public' ? 'selected' : '' }}>Public
                                    </option>
                                    <option value="private" {{ old('visibility')==='private' ? 'selected' : '' }}>
                                        Private</option>
                                    <option value="password" {{ old('visibility')==='password' ? 'selected' : '' }}>
                                        Password Protected</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="visibilityPassword" class="form-label">Password (if protected)</label>
                                <input type="text" class="form-control" name="visibility_password"
                                    id="visibilityPassword" placeholder="Enter password"
                                    value="{{ old('visibility_password') }}" {{ old('visibility')==='password' ? ''
                                    : 'disabled' }}>
                            </div>
                            <div class="col-md-12">
                                <label for="parentPage" class="form-label">Parent Page</label>
                                <select class="form-select" name="parent_id" id="parentPage">
                                    <option value="">— None —</option>
                                    @foreach(($parents ?? []) as $p)
                                    <option value="{{ $p->id }}" {{ old('parent_id')==$p->id ? 'selected' : '' }}>{{
                                        $p->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="authorId" class="form-label">Author</label>
                                <select class="form-select" name="author_id" id="authorId">
                                    @foreach(($authors ?? []) as $author)
                                    <option value="{{ $author->id }}" {{ old('author_id')==$author->id ? 'selected' : ''
                                        }}>{{ $author->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="categoryIds">Categories</label>
                                <select class="form-select" name="category_ids[]" id="categoryIds" multiple>
                                    @foreach(($categories ?? []) as $cat)
                                    <option value="{{ $cat->id }}" @selected(collect(old('category_ids', []))->
                                        contains($cat->id))>{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="tagIds">Tags</label>
                                <select class="form-select" name="tag_ids[]" id="tagIds" multiple>
                                    @foreach(($tags ?? []) as $tag)
                                    <option value="{{ $tag->id }}" @selected(collect(old('tag_ids', []))->
                                        contains($tag->id))>{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="revisionNotes">Revision Notes</label>
                                <textarea class="form-control" name="revision_notes" id="revisionNotes" rows="2"
                                    placeholder="What changed in this version?">{{ old('revision_notes') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabs Section -->
                <div class="col-12">
                    <!-- Tabs -->
                    <ul class="nav nav-tabs mb-2" id="pageTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#seoTab"
                                data-description="Manage SEO titles, meta descriptions, and keywords.">🔍 SEO</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#mediaTab"
                                data-description="Upload featured images and gallery assets.">🖼 Media</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#layoutTab"
                                data-description="Edit hero section and choose page layout.">🎨 Layout</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#componentsTab"
                                data-description="Add reusable blocks and components.">⚙️ Components</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#scriptsTab"
                                data-description="Insert custom CSS or JavaScript code.">💻 Custom Code</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#accessTab"
                                data-description="Restrict by role, device, or location.">🔒 Access</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#analyticsTab"
                                data-description="Per-page analytics and experiments.">📊 Analytics</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#settingsTab"
                                data-description="Control page status, visibility, and scheduling.">⚡ Settings</a></li>
                    </ul>

                    <!-- Tab Subtitle -->
                    <p id="tabDescription" class="tab-subtitle active">
                        <span id="tabIcon">📝</span> Manage SEO titles, meta descriptions, and keywords.
                    </p>


                    <!-- Tab Content -->
                    <div class="tab-content" id="pageTabContent">

                        <!-- SEO -->
                        <div class="tab-pane fade show active" id="seoTab" role="tabpanel">
                            <div class="card card-body p-4">
                                <h5 class="fw-semibold mb-3">SEO Settings</h5>
                                <div class="row g-3">
                                    <div class="col-lg-6">
                                        <label class="form-label" for="seoTitle">Meta Title</label>
                                        <input type="text" class="form-control" id="seoTitle" name="meta_title"
                                            placeholder="Enter SEO title" value="{{ old('meta_title') }}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label" for="canonicalUrl">Canonical URL</label>
                                        <input type="url" class="form-control" id="canonicalUrl" name="canonical_url"
                                            value="{{ old('canonical_url') }}" placeholder="https://example.com/page">
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="form-label">Meta Description</label>
                                        <textarea class="form-control" id="seoDescription" name="meta_description"
                                            rows="3"
                                            placeholder="Enter SEO description">{{ old('meta_description') }}</textarea>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label" for="keywords">Keywords</label>
                                        <input type="text" class="form-control" id="keywords" name="keywords"
                                            placeholder="keyword1, keyword2" value="{{ old('keywords') }}">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label" for="robotsIndex">Robots: Indexing</label>
                                        <select class="form-select" id="robotsIndex" name="robots_index">
                                            @php($ri = old('robots_index', 'index'))
                                            <option value="index" {{ $ri==='index' ? 'selected' : '' }}>index</option>
                                            <option value="noindex" {{ $ri==='noindex' ? 'selected' : '' }}>noindex
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label" for="robotsFollow">Robots: Following</label>
                                        <select class="form-select" id="robotsFollow" name="robots_follow">
                                            @php($rf = old('robots_follow', 'follow'))
                                            <option value="follow" {{ $rf==='follow' ? 'selected' : '' }}>follow
                                            </option>
                                            <option value="nofollow" {{ $rf==='nofollow' ? 'selected' : '' }}>nofollow
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <h5 class="mt-4">Open Graph (Social Media)</h5>
                                <div class="row g-3">
                                    <div class="col-lg-6"><input type="text" class="form-control" name="og_title"
                                            placeholder="OG Title" value="{{ old('og_title') }}"></div>
                                    <div class="col-lg-6"><input type="text" class="form-control" name="og_description"
                                            placeholder="OG Description" value="{{ old('og_description') }}"></div>
                                    <div class="col-lg-6">
                                        <input type="file" class="form-control" name="og_image" accept="image/*">
                                    </div>
                                </div>
                                <h5 class="mt-4">Twitter Card</h5>
                                <div class="row g-3">
                                    <div class="col-lg-6"><input type="text" class="form-control" name="twitter_title"
                                            placeholder="Twitter Title" value="{{ old('twitter_title') }}"></div>
                                    <div class="col-lg-6"><input type="text" class="form-control"
                                            name="twitter_description" placeholder="Twitter Description"
                                            value="{{ old('twitter_description') }}"></div>
                                    <div class="col-lg-6">
                                        <input type="file" class="form-control" name="twitter_image" accept="image/*">
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <label class="form-label">Custom Meta Attributes (JSON)</label>
                                    <textarea class="form-control font-monospace" rows="3" name="custom_meta"
                                        placeholder='[{"name":"robots","content":"noindex"}]'>{{ old('custom_meta') }}</textarea>
                                </div>
                                <div class="alert alert-light border-0 shadow-sm mt-4">
                                    <small class="text-muted">📊 Live Preview will show here (like Google search
                                        snippet).</small>
                                    <div class="mt-2">
                                        <h6 id="seoPreviewTitle" class="text-primary">Your SEO Title | Site Name</h6>
                                        <p id="seoPreviewDesc" class="text-muted">Your meta description will appear
                                            here.</p>
                                        <span class="text-success" id="seoPreviewUrl">www.example.com/slug</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Media -->
                        <div class="tab-pane fade" id="mediaTab" role="tabpanel">
                            <div class="card card-body p-4">
                                <h5 class="fw-semibold mb-3">Media Management</h5>
                                <div class="mb-3">
                                    <label class="form-label">Featured Image</label>
                                    <input type="file" class="form-control" name="featured_image" accept="image/*">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Gallery</label>
                                    <div id="drag-drop-area" class="border rounded p-3"></div>

                                    <!-- Hidden input to store uploaded file metadata -->
                                    <input type="hidden" name="gallery_images" id="gallery_images" value="[]">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Hero Background</label>
                                    <input type="file" class="form-control" name="hero_bg" accept="image/*,video/*">
                                </div>
                            </div>
                        </div>

                        <!-- Layout -->
                        <div class="tab-pane fade" id="layoutTab" role="tabpanel">
                            <div class="card card-body p-4">
                                <h5 class="fw-semibold mb-3">Hero & Layout</h5>
                                <div class="row g-3">
                                    <div class="col-lg-6"><label class="form-label">Hero Title</label><input type="text"
                                            class="form-control" name="hero_title" placeholder="Enter main heading"
                                            value="{{ old('hero_title') }}"></div>
                                    <div class="col-lg-6"><label class="form-label">Hero Subtitle</label><input
                                            class="form-control" name="hero_subtitle" placeholder="Subtitle"
                                            value="{{ old('hero_subtitle') }}"></div>
                                    <div class="col-lg-6"><label class="form-label">Hero Button Text</label><input
                                            type="text" class="form-control" name="hero_button_text"
                                            value="{{ old('hero_button_text') }}"></div>
                                    <div class="col-lg-6"><label class="form-label">Hero Button URL</label><input
                                            type="text" class="form-control" name="hero_button_url"
                                            value="{{ old('hero_button_url') }}"></div>
                                </div>
                                <div class="row g-3 mt-2">
                                    <div class="col-md-6">
                                        <label class="form-label">Template</label>
                                        <select class="form-select" name="template">
                                            @php($tpl = old('template', 'fullwidth'))
                                            <option value="fullwidth" @selected($tpl==='fullwidth' )>Full Width</option>
                                            <option value="sidebar-left" @selected($tpl==='sidebar-left' )>Sidebar Left
                                            </option>
                                            <option value="sidebar-right" @selected($tpl==='sidebar-right' )>Sidebar
                                                Right</option>
                                            <option value="landing" @selected($tpl==='landing' )>Landing Page</option>
                                            <option value="blog" @selected($tpl==='blog' )>Blog Post</option>
                                            <option value="faq" @selected($tpl==='faq' )>FAQ Page</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Layout Style</label>
                                        <select class="form-select" name="layout_style">
                                            @php($ls = old('layout_style', 'default'))
                                            <option value="default" @selected($ls==='default' )>Default</option>
                                            <option value="boxed" @selected($ls==='boxed' )>Boxed</option>
                                            <option value="fluid" @selected($ls==='fluid' )>Fluid</option>
                                            <option value="grid" @selected($ls==='grid' )>Grid-based</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label class="form-label">Sidebar Widgets (JSON)</label>
                                    <textarea class="form-control font-monospace" rows="3" name="sidebar_widgets"
                                        placeholder='["recent_posts","categories"]'>{{ old('sidebar_widgets') }}</textarea>
                                </div>
                                <div class="mt-3">
                                    <label class="form-label">Footer Widgets (JSON)</label>
                                    <textarea class="form-control font-monospace" rows="3" name="footer_widgets"
                                        placeholder='["links","newsletter"]'>{{ old('footer_widgets') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Components -->
                        <div class="tab-pane fade" id="componentsTab" role="tabpanel">
                            <div class="card card-body p-4">
                                <h5 class="fw-semibold mb-3">Page Components</h5>

                                {{-- 🔹 Slider / Carousel --}}
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label class="form-label">Enable Slider / Carousel</label>
                                        <select class="form-select" name="enable_slider">
                                            <option value="0" @selected(old('enable_slider')==='0')>No</option>
                                            <option value="1" @selected(old('enable_slider')==='1')>Yes</option>
                                        </select>
                                    </div>
                                    <div class="col-md-8">
                                <!-- 🔹 Image Slider Manager -->
                                <div class="row g-3 mb-3">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <label class="form-label fw-semibold">Image Slider</label>
                                        
                                            <!-- Add Slide Button -->
                                            <button type="button" class="btn btn-sm btn-primary mb-3" id="addSlideBtn">
                                                + Add Slide
                                            </button>
                                        </div>
                                        <!-- Slides Container -->
                                        <div id="slidesContainer" class="d-flex flex-column gap-3">
                                            {{-- Existing slides (if editing an existing page) --}}
                                            @if(old('slider_images'))
                                                @foreach(json_decode(old('slider_images'), true) as $index => $slide)
                                                    <div class="card p-3 slide-item">
                                                        <div class="row g-2 align-items-center">
                                                            <div class="col-md-2">
                                                                <input type="file" class="form-control" name="slides[{{ $index }}][image]">
                                                                @if(isset($slide['image']))
                                                                    <small class="text-muted d-block mt-1">Current: {{ $slide['image'] }}</small>
                                                                @endif
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="text" class="form-control" name="slides[{{ $index }}][title]" placeholder="Title" value="{{ $slide['title'] ?? '' }}">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="text" class="form-control" name="slides[{{ $index }}][caption]" placeholder="Caption" value="{{ $slide['caption'] ?? '' }}">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="url" class="form-control" name="slides[{{ $index }}][media_link]" placeholder="Media Link (optional)" value="{{ $slide['media_link'] ?? '' }}">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="text" class="form-control" name="slides[{{ $index }}][link]" placeholder="Link (optional)" value="{{ $slide['link'] ?? '' }}">
                                                            </div>
                                                            <div class="col-md-1">
                                                                <input type="number" class="form-control" name="slides[{{ $index }}][order]" placeholder="Order" value="{{ $slide['order'] ?? $index }}">
                                                            </div>
                                                            <div class="col-md-1 text-end">
                                                                <button type="button" class="btn btn-danger btn-sm removeSlideBtn">&times;</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Hidden JSON field (final payload) -->
                                <input type="hidden" name="slider_images" id="sliderImagesInput">
                                    </div>
                                </div>

                                {{-- 🔹 Reusable Components --}}
                                <div class="row g-3 mt-1">
                                    <div class="col-12">
                                        <label class="form-label">Reusable Components (JSON)</label>
                                        <textarea class="form-control font-monospace" rows="3"
                                                name="reusable_components"
                                                placeholder='[{"type":"testimonial","content":"..."}]'>{{ old('reusable_components') }}</textarea>
                                    </div>
                                </div>

                                {{-- 🔹 Contact Form --}}
                                <div class="row g-3 mt-1">
                                    <div class="col-lg-4">
                                        <label class="form-label">Enable Contact Form</label>
                                        <select class="form-select" name="contact_form_enabled">
                                            <option value="0" @selected(old('contact_form_enabled')==='0')>No</option>
                                            <option value="1" @selected(old('contact_form_enabled')==='1')>Yes</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="form-label">Recipient Email</label>
                                        <input type="email" class="form-control" name="contact_form_email"
                                            value="{{ old('contact_form_email') }}">
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="form-label">Form Subject</label>
                                        <input type="text" class="form-control" name="contact_form_subject"
                                            value="{{ old('contact_form_subject') }}">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Custom Fields (JSON)</label>
                                        <textarea class="form-control font-monospace" rows="3"
                                                name="contact_form_fields"
                                                placeholder='[{"label":"Name","type":"text"}]'>{{ old('contact_form_fields') }}</textarea>
                                    </div>
                                </div>

                                {{-- 🔹 Newsletter Signup --}}
                                <div class="row g-3 mt-1">
                                    <div class="col-lg-6">
                                        <label class="form-label">Newsletter Signup</label>
                                        <select class="form-select" name="newsletter_enabled">
                                            <option value="0" @selected(old('newsletter_enabled')==='0')>No</option>
                                            <option value="1" @selected(old('newsletter_enabled')==='1')>Yes</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Integration Provider</label>
                                        <input type="text" class="form-control" name="newsletter_provider"
                                            placeholder="e.g. Mailchimp, SendGrid"
                                            value="{{ old('newsletter_provider') }}">
                                    </div>
                                </div>

                                {{-- 🔹 Polls / Surveys --}}
                                <div class="row g-3 mt-1">
                                    <div class="col-12">
                                        <label class="form-label">Polls / Surveys (JSON)</label>
                                        <textarea class="form-control font-monospace" rows="3"
                                                name="polls_surveys"
                                                placeholder='[{"question":"...","options":["a","b"]}]'>{{ old('polls_surveys') }}</textarea>
                                    </div>
                                </div>

                                {{-- 🔹 Dynamic Tables --}}
                                <div class="row g-3 mt-1">
                                    <div class="col-12">
                                        <label class="form-label">Dynamic Tables / Grids (JSON)</label>
                                        <textarea class="form-control font-monospace" rows="3"
                                                name="dynamic_tables"
                                                placeholder='[{"columns":["Name","Email"],"rows":[...]}]'>{{ old('dynamic_tables') }}</textarea>
                                    </div>
                                </div>

                                {{-- 🔹 Conditional Logic --}}
                                <div class="row g-3 mt-1">
                                    <div class="col-12">
                                        <label class="form-label">Conditional Display Logic (JSON)</label>
                                        <textarea class="form-control font-monospace" rows="3"
                                                name="conditional_logic"
                                                placeholder='[{"component":"hero","condition":{"role":"admin"}}]'>{{ old('conditional_logic') }}</textarea>
                                    </div>
                                </div>

                                {{-- 🔹 Extra Components (future-proofing) --}}
                                <div class="row g-3 mt-1">
                                    <div class="col-lg-6">
                                        <label class="form-label">Embed Code (HTML/JS)</label>
                                        <textarea class="form-control font-monospace" rows="3"
                                                name="embed_code"
                                                placeholder="<script>...</script>">{{ old('embed_code') }}</textarea>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Custom CSS</label>
                                        <textarea class="form-control font-monospace" rows="3"
                                                name="custom_css"
                                                placeholder=".hero { background:red; }">{{ old('custom_css') }}</textarea>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Custom Code -->
                        <div class="tab-pane fade" id="scriptsTab" role="tabpanel">
                            <div class="card card-body">
                                <h5 class="fw-semibold mb-3">Custom Code</h5>
                                <div class="mb-3">
                                    <label class="form-label">Custom CSS</label>
                                    <textarea class="form-control font-monospace" rows="5"
                                        name="custom_css">{{ old('custom_css') }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Custom JS</label>
                                    <textarea class="form-control font-monospace" rows="5"
                                        name="custom_js">{{ old('custom_js') }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Custom Head Injection</label>
                                    <textarea class="form-control font-monospace" rows="4"
                                        name="custom_head">{{ old('custom_head') }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Custom Body Injection</label>
                                    <textarea class="form-control font-monospace" rows="4"
                                        name="custom_body">{{ old('custom_body') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Access Control -->
                        <div class="tab-pane fade" id="accessTab" role="tabpanel">
                            <div class="card card-body">
                                <h5 class="fw-semibold mb-3">Access Control</h5>
                                <div class="row g-3">
                                    <div class="col-lg-4">
                                        <label class="form-label">Visible to Roles</label>
                                        <select class="form-select" name="visible_roles[]" multiple>
                                            @foreach(($roles ?? []) as $r)
                                            <option value="{{ $r->name }}" @selected(collect(old('visible_roles', []))->
                                                contains($r->name))>{{ $r->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="form-label">Device Visibility</label>
                                        @php($dv = collect(old('device_visibility', [])))
                                        <div class="form-check"><input class="form-check-input" type="checkbox"
                                                name="device_visibility[]" value="desktop" id="dvDesktop"
                                                @checked($dv->contains('desktop'))><label class="form-check-label"
                                                for="dvDesktop">Desktop</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox"
                                                name="device_visibility[]" value="tablet" id="dvTablet"
                                                @checked($dv->contains('tablet'))><label class="form-check-label"
                                                for="dvTablet">Tablet</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox"
                                                name="device_visibility[]" value="mobile" id="dvMobile"
                                                @checked($dv->contains('mobile'))><label class="form-check-label"
                                                for="dvMobile">Mobile</label></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="form-label">Geolocation Rules (JSON)</label>
                                        <textarea class="form-control font-monospace" rows="4" name="geo_rules"
                                            placeholder='{"allow":["NG","US"],"deny":["CN"]}'>{{ old('geo_rules') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Analytics -->
                        <div class="tab-pane fade" id="analyticsTab" role="tabpanel">
                            <div class="card card-body">
                                <h5 class="fw-semibold mb-3">Analytics & Experiments</h5>
                                <div class="row g-3">
                                    <div class="col-lg-6">
                                        <label class="form-label">Custom Tracking Code</label>
                                        <textarea class="form-control font-monospace" rows="4" name="tracking_code"
                                            placeholder="&lt;script&gt;...&lt;/script&gt;">{{ old('tracking_code') }}</textarea>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">A/B Test Variants (JSON)</label>
                                        <textarea class="form-control font-monospace" rows="4" name="ab_variants"
                                            placeholder='[{"key":"hero","variant":"B"}]'>{{ old('ab_variants') }}</textarea>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Conversion Goals (JSON)</label>
                                        <textarea class="form-control font-monospace" rows="3" name="conversion_goals"
                                            placeholder='[{"name":"Lead","selector":"#contact-submit"}]'>{{ old('conversion_goals') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Settings (Extra) -->
                        <div class="tab-pane fade" id="settingsTab" role="tabpanel">
                            <div class="card card-body">
                                <h5 class="fw-semibold mb-3">Additional Settings</h5>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Layout</label>
                                        <select class="form-select" name="layout">
                                            @php($layout = old('layout', 'default'))
                                            <option value="default" @selected($layout==='default' )>Default</option>
                                            <option value="fullwidth" @selected($layout==='fullwidth' )>Full Width
                                            </option>
                                            <option value="sidebar-left" @selected($layout==='sidebar-left' )>Sidebar
                                                Left</option>
                                            <option value="sidebar-right" @selected($layout==='sidebar-right' )>Sidebar
                                                Right</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Template</label>
                                        <select class="form-select" name="template_alt">
                                            @php($templateAlt = old('template_alt', 'default'))
                                            <option value="default" @selected($templateAlt==='default' )>Default
                                                Template</option>
                                            <option value="landing" @selected($templateAlt==='landing' )>Landing Page
                                            </option>
                                            <option value="blog" @selected($templateAlt==='blog' )>Blog Post</option>
                                            <option value="faq" @selected($templateAlt==='faq' )>FAQ Page</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @section('scripts')
    <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill-emoji@0.2.0/dist/quill-emoji.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js"></script>
    <script src="{{asset('adminAssets/libs/uppy/uppy.legacy.min.js')}}"></script>

    <script>
        const galleryInput = document.getElementById("gallery_images");

        const uppy = new Uppy.Uppy({
            restrictions: {
                maxNumberOfFiles: 10,
                allowedFileTypes: ["image/*"]
            },
            autoProceed: false   // ✅ wait until user clicks upload
        })
        .use(Uppy.Dashboard, {
            inline: true,
            target: "#drag-drop-area",
            proudlyDisplayPoweredByUppy: false,
            showProgressDetails: true,
        })
        .use(Uppy.XHRUpload, {
            endpoint: "{{ route('admin.pages.uploadMedia') }}",
            fieldName: "media",
            headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}" },
        });

        let uploadedFiles = [];

        // Handle Upload button click
        document.getElementById("upload-btn").addEventListener("click", () => {
            uppy.upload().then((result) => {
                if (result.failed.length === 0) {
                    uploadedFiles = result.successful.map(file => {
                        return {
                            name: file.name,
                            url: file.response.body.url, // From Laravel response
                            type: file.type
                        };
                    });

                    // Store in hidden input
                    galleryInput.value = JSON.stringify(uploadedFiles);
                    console.log("Uploaded:", galleryInput.value);

                    alert("All files uploaded successfully!");
                } else {
                    alert("Some files failed to upload.");
                }
            });
        });
    </script>
    <!-- <script src="{{asset('adminAssets/js/pages/file-upload.init.js')}}"></script> -->
    <script>
        // Tab subtitle with icons
        document.addEventListener('DOMContentLoaded', function () {
            const tabLinks = document.querySelectorAll('#pageTab .nav-link');
            const tabDescription = document.getElementById('tabDescription');
            const tabIcon = document.getElementById('tabIcon');

            const tabIcons = {
                '#seoTab': '📝',
                '#mediaTab': '🖼️',
                '#layoutTab': '🎨',
                '#componentsTab': '⚙️',
                '#scriptsTab': '💻',
                '#settingsTab': '🛠️',
                '#accessTab': '🔒',
                '#analyticsTab': '📊'
            };

            tabLinks.forEach(link => {
                link.addEventListener('shown.bs.tab', function (event) {
                    const desc = event.target.getAttribute('data-description');
                    const href = event.target.getAttribute('href');

                    tabDescription.style.opacity = 0;
                    setTimeout(() => {
                        tabIcon.textContent = tabIcons[href] || '';
                        tabDescription.textContent = desc;
                        tabDescription.prepend(tabIcon);
                        tabDescription.style.opacity = 1;
                        tabDescription.classList.remove('active');
                    }, 50);
                });
            });
        });
    </script>
    <script>
        // Register modules
        Quill.register('modules/imageResize', window.ImageResize.default || window.ImageResize);
        Quill.register('modules/emoji', window.QuillEmoji);

        // Initialize Quill
        const quill = new Quill('#editor', {
            theme: 'snow',
            placeholder: 'Start writing your page content...',
            modules: {
                toolbar: [
                    [{ 'font': [] }, { 'size': [] }, { 'header': [1, 2, 3, 4, 5, 6, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'script': 'sub' }, { 'script': 'super' }],
                    [{ 'header': 1 }, { 'header': 2 }],
                    ['blockquote', 'code-block'],
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                    [{ 'indent': '-1' }, { 'indent': '+1' }],
                    [{ 'align': [] }, { 'direction': 'rtl' }],
                    ['link', 'image', 'video', 'formula'],
                    ['emoji'],
                    ['clean'],
                    ['html']
                ],
                imageResize: { modules: ['Resize', 'DisplaySize'] },
                "emoji-toolbar": true,
                "emoji-textarea": false,
                "emoji-shortname": true
            }
        });

        // Fullscreen button
        const toolbar = quill.getModule('toolbar');
        const buttonContainer = toolbar.container.querySelector('.ql-formats');
        const fullscreenBtn = document.createElement('button');
        fullscreenBtn.type = 'button';
        fullscreenBtn.innerHTML = '<svg viewBox="0 0 18 18"><polyline points="3,7 3,3 7,3" stroke="currentColor" stroke-width="2" fill="none"/><polyline points="11,3 15,3 15,7" stroke="currentColor" stroke-width="2" fill="none"/><polyline points="15,11 15,15 11,15" stroke="currentColor" stroke-width="2" fill="none"/><polyline points="7,15 3,15 3,11" stroke="currentColor" stroke-width="2" fill="none"/></svg>';
        fullscreenBtn.title = "Toggle Fullscreen";
        buttonContainer.appendChild(fullscreenBtn);

        let fullscreen = false;
        const expandIcon = fullscreenBtn.innerHTML;
        const collapseIcon = '<svg viewBox="0 0 18 18"><polyline points="5,5 5,3 3,3" stroke="currentColor" stroke-width="2" fill="none"/><polyline points="13,3 15,3 15,5" stroke="currentColor" stroke-width="2" fill="none"/><polyline points="15,13 15,15 13,15" stroke="currentColor" stroke-width="2" fill="none"/><polyline points="3,13 3,15 5,15" stroke="currentColor" stroke-width="2" fill="none"/></svg>';

        fullscreenBtn.addEventListener('click', () => {
            fullscreen = !fullscreen;
            const container = document.querySelector('#editor-container');
            container.classList.toggle('ql-fullscreen', fullscreen);
            if (fullscreen) window.scrollTo(0, 0);
            fullscreenBtn.innerHTML = fullscreen ? collapseIcon : expandIcon;
        });
        document.addEventListener('keydown', e => { if (e.key === "Escape" && fullscreen) fullscreenBtn.click(); });

        // HTML insert
        const htmlBtn = toolbar.container.querySelector('.ql-html');
        if (htmlBtn) htmlBtn.addEventListener('click', () => {
            const html = prompt("Paste your HTML code:");
            if (html) {
                const range = quill.getSelection(true);
                quill.clipboard.dangerouslyPasteHTML(range.index, html);
            }
        });

        // Undo / Redo
        const undoStack = [], redoStack = [];
        quill.on('text-change', (delta, oldDelta, source) => { if (source === 'user') undoStack.push(oldDelta); });
        function undo() { if (undoStack.length > 0) { const last = undoStack.pop(); redoStack.push(quill.getContents()); quill.setContents(last); } }
        function redo() { if (redoStack.length > 0) { const next = redoStack.pop(); undoStack.push(quill.getContents()); quill.setContents(next); } }

        // Save & Preview
        document.querySelector('#previewBtn').onclick = (e) => {
            e.preventDefault();
            const previewForm = document.querySelector('#pageForm').cloneNode(true);
            previewForm.action = "{{ route('admin.pages.preview') }}";
            previewForm.target = "_blank";
            document.body.appendChild(previewForm);
            previewForm.submit();
            previewForm.remove();
        };


        // SEO live preview
        document.querySelector('#seoTitle').addEventListener('input', e => {
            document.querySelector('#seoPreviewTitle').textContent = e.target.value + " | Site Name";
        });
        document.querySelector('#seoDescription').addEventListener('input', e => {
            document.querySelector('#seoPreviewDesc').textContent = e.target.value;
        });


        // --- Visibility password toggle ---
        (function () {
            const visibility = document.getElementById('visibility');
            const password = document.getElementById('visibilityPassword');
            function sync() { password.disabled = visibility.value !== 'password'; }
            visibility.addEventListener('change', sync); sync();
        })();

        // On form submit, set hidden input with Quill HTML
        document.querySelector('#pageForm').addEventListener('submit', function (e) {
            e.preventDefault();
            document.querySelector('input[name="body"]').value = quill.root.innerHTML;
            this.submit();
        });

    </script>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        let slidesContainer = document.getElementById("slidesContainer");
        let addSlideBtn = document.getElementById("addSlideBtn");
        let sliderInput = document.getElementById("sliderImagesInput");

        // Add new slide
        addSlideBtn.addEventListener("click", function () {
            let index = slidesContainer.children.length;
            let slide = document.createElement("div");
            slide.classList.add("card", "p-3", "slide-item", "mb-2");
            slide.innerHTML = `
                <div class="row g-2 align-items-center">
                    <div class="col-md-2">
                        <input type="file" class="form-control" name="slides[${index}][image]">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="slides[${index}][title]" placeholder="Title">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="slides[${index}][caption]" placeholder="Caption">
                    </div>
                    <div class="col-md-2">
                        <input type="url" class="form-control" name="slides[${index}][media_link]" placeholder="Media Link (optional)">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="slides[${index}][link]" placeholder="Link (optional)">
                    </div>
                    <div class="col-md-1">
                        <input type="number" class="form-control" name="slides[${index}][order]" placeholder="Order" value="${index}">
                    </div>
                    <div class="col-md-1 text-end">
                        <button type="button" class="btn btn-danger btn-sm removeSlideBtn">&times;</button>
                    </div>
                </div>
            `;
            slidesContainer.appendChild(slide);

            // Bind remove
            slide.querySelector(".removeSlideBtn").addEventListener("click", function () {
                slide.remove();
            });
        });

        // Remove slide button (for pre-rendered slides)
        slidesContainer.querySelectorAll(".removeSlideBtn").forEach(btn => {
            btn.addEventListener("click", function () {
                btn.closest(".slide-item").remove();
            });
        });

        // On form submit → compile into JSON
        document.querySelector("#pageForm").addEventListener("submit", function () {
            let slides = [];
            slidesContainer.querySelectorAll(".slide-item").forEach((el, idx) => {
                let caption = el.querySelector(`input[name^="slides"][name$="[caption]"]`)?.value || "";
                let link = el.querySelector(`input[name^="slides"][name$="[link]"]`)?.value || "";
                let order = el.querySelector(`input[name^="slides"][name$="[order]"]`)?.value || idx;
                // file input is handled by backend, just store filename placeholder
                slides.push({ caption, link, order });
            });
            sliderInput.value = JSON.stringify(slides);
        });
    });
    </script>


    @endsection

</x-layouts.admin-app>