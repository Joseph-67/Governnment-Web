<x-layouts.admin-app>
@section('styles')
<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/quill-emoji@0.2.0/dist/quill-emoji.css" rel="stylesheet" />

<style>
/* --- General Font & Colors --- */
body, input, textarea, select, button {
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
    box-shadow: 0 12px 24px rgba(0,0,0,0.08);
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
    background-color: #e8f0fe; /* Gmail-like hover */
}
.ql-toolbar .ql-formats { margin-right: 8px; }
#editor { padding: 12px; flex: 1; min-height: 200px; outline: none; }

/* --- Fullscreen Editor --- */
/* Fullscreen editor */ 
.ql-fullscreen { top: 0; left: 0; right: 0; bottom: 0; width: 100%; height: 100%; z-index: 1050; /* background: #fff; */ padding: 1rem; }
/* Fullscreen */ .ql-fullscreen { position: fixed !important; top: 0 !important; left: 0 !important; right: 0 !important; bottom: 0 !important; width: 100% !important; height: 100% !important; z-index: 1050 !important; background: #fff; overflow: auto; display: flex; flex-direction: column; padding: 1rem; } 
.ql-fullscreen .ql-toolbar { position: sticky; top: 0; z-index: 1060; background: #fff; }
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
.form-control, .form-select {
    border-radius: 8px;
    border: 1px solid #CED4DA;
    padding: 0.5rem 0.75rem;
    transition: border-color 0.25s ease, box-shadow 0.25s ease;
}
.form-control:focus, .form-select:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
}

/* --- Buttons --- */
.btn-primary, .btn-warning, .btn-danger {
    border-radius: 8px;
    padding: 0.5rem 1rem;
    font-weight: 500;
    transition: transform 0.15s ease, box-shadow 0.15s ease, background-color 0.15s ease;
}
.btn-primary:hover, .btn-warning:hover, .btn-danger:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(0,0,0,0.1);
}

/* --- SEO Preview Box --- */
.preview-seo {
    background: #f8f9fa;
    border-radius: 8px;
    padding: 1rem;
    margin-top: 0.5rem;
}

/* --- Responsive Row Padding --- */
.row.g-0 > .col-lg-7,
.row.g-0 > .col-lg-5 {
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
                    <div class="mb-3">
                        <label>Page Title</label>
                        <input type="text" class="form-control" name="title" id="pageTitle">
                    </div>
                    <div class="mb-3">
                        <label>Slug / URL</label>
                        <input type="text" class="form-control" name="slug" id="pageSlug">
                    </div>
                    <div class="mb-3">
                        <label>Page Content</label>
                        <div id="editor-container">
                            <div id="editor"></div>
                        </div>
                        <input type="hidden" name="content" id="body">
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-lg-5">
                <div class="card card-body">
                    <h4 class="mb-3">Page Settings</h4>
                    <div class="mb-3">
                        <label>Status</label>
                        <select class="form-select" name="status" id="pageStatus">
                            <option value="draft">Draft</option>
                            <option value="published">Published</option>
                            <option value="archived">Archived</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Schedule Publish</label>
                        <input type="datetime-local" class="form-control" name="publish_at">
                    </div>
                    <div class="mb-3">
                        <label>Visibility</label>
                        <select class="form-select" name="visibility">
                            <option value="public">Public</option>
                            <option value="private">Private</option>
                            <option value="password">Password Protected</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Password (if protected)</label>
                        <input type="text" class="form-control" name="visibility_password" placeholder="Enter password">
                    </div>
                    <div class="mb-3">
                        <label>Page Template</label>
                        <select class="form-select" name="template">
                            <option value="fullwidth">Full Width</option>
                            <option value="sidebar-left">Sidebar Left</option>
                            <option value="sidebar-right">Sidebar Right</option>
                            <option value="landing">Landing Page</option>
                            <option value="blog">Blog Post</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Tabs Section -->
            <div class="col-12">
                <!-- Tabs -->
                <ul class="nav nav-tabs mb-2" id="pageTab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#seoTab" data-description="Manage SEO titles, meta descriptions, and keywords.">🔍 SEO</a></li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#mediaTab" data-description="Upload featured images and gallery assets.">🖼 Media</a></li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#layoutTab" data-description="Edit hero section and choose page layout.">🎨 Layout</a></li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#componentsTab" data-description="Add reusable blocks and components.">⚙️ Components</a></li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#scriptsTab" data-description="Insert custom CSS or JavaScript code.">💻 Custom Code</a></li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#settingsTab" data-description="Control page status, visibility, and scheduling.">⚡ Settings</a></li>
                </ul>

                <!-- Tab Subtitle -->
                <p id="tabDescription" class="tab-subtitle active">Manage SEO titles, meta descriptions, and keywords.</p>

                <!-- Tab Content -->
                <div class="tab-content" id="pageTabContent">

                    <!-- SEO -->
                    <div class="tab-pane fade show active" id="seoTab" role="tabpanel">
                        <div class="card card-body p-4">
                            <h5 class="fw-semibold mb-3">SEO Settings</h5>
                            <div class="mb-3">
                                <label class="form-label">Meta Title</label>
                                <input type="text" class="form-control" name="meta_title" placeholder="Enter SEO title">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Meta Description</label>
                                <textarea class="form-control" name="meta_description" rows="3" placeholder="Enter SEO description"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Keywords</label>
                                <input type="text" class="form-control" name="keywords" placeholder="keyword1, keyword2">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Canonical URL</label> 
                                <input type="url" class="form-control" name="canonical_url">
                            </div> 
                            <h5>Open Graph (Social Media)</h5> 
                            <div class="mb-3">
                                <input type="text" class="form-control" name="og_title" placeholder="OG Title">
                            </div> 
                            <div class="mb-3">
                                <textarea class="form-control" rows="2" name="og_description" placeholder="OG Description"></textarea>
                            </div> 
                            <div class="mb-3">
                                <input type="file" class="form-control" name="og_image">
                            </div> 
                            <h5>Twitter Card</h5> 
                            <div class="mb-3">
                                <input type="text" class="form-control" name="twitter_title" placeholder="Twitter Title">
                            </div> 
                            <div class="form-group mb-3">
                                <textarea class="form-control" rows="2" name="twitter_description" placeholder="Twitter Description"></textarea>
                            </div> 
                            <div class="mb-3">
                                <input type="file" class="form-control" name="twitter_image">
                            </div> 
                            <div class="mb-3"> 
                                <label>Custom Meta Attributes</label> 
                                <textarea class="form-control" rows="4" name="custom_meta" placeholder='{"name":"robots","content":"noindex"}'></textarea> 
                            </div>
                            <div class="alert alert-light border-0 shadow-sm">
                                <small class="text-muted">📊 Live Preview will show here (like Google search snippet).</small>
                            </div>
                        </div>
                    </div>

                    <!-- Media -->
                    <div class="tab-pane fade" id="mediaTab" role="tabpanel">
                        <div class="card card-body p-4">
                            <h5 class="fw-semibold mb-3">Media Management</h5>
                            <div class="mb-3">
                                <label class="form-label">Featured Image</label>
                                <input type="file" class="form-control" name="featured_image">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gallery</label>
                                <input type="file" class="form-control" name="gallery[]" multiple>
                            </div>
                        </div>
                    </div>

                    <!-- Layout -->
                    <div class="tab-pane fade" id="layoutTab" role="tabpanel">
                        <div class="card card-body p-4">
                            <h5 class="fw-semibold mb-3">Hero & Layout</h5>
                            <div class="mb-3">
                                <label class="form-label">Hero Title</label>
                                <input type="text" class="form-control" name="hero_title" placeholder="Enter main heading">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Hero Subtitle</label>
                                <textarea class="form-control" name="hero_subtitle" rows="2"></textarea>
                            </div>
                            <div class="mb-3"><label class="form-label">Hero Button Text</label><input type="text" class="form-control" name="hero_button_text"></div>
                            <div class="mb-3"><label class="form-label">Hero Button URL</label><input type="text" class="form-control" name="hero_button_url"></div>
                            <div class="mb-3">
                                <label class="form-label">Hero Background</label>
                                <input type="file" class="form-control" name="hero_bg">
                            </div>
                        </div>
                    </div>

                    <!-- Components -->
                    <div class="tab-pane fade" id="componentsTab" role="tabpanel">
                        <div class="card card-body p-4">
                            <h5 class="fw-semibold mb-3">Page Components</h5>
                            <div class="mb-3"> <label class="form-label">Enable Slider / Carousel</label> <select class="form-select" name="enable_slider"> <option value="0">No</option> <option value="1">Yes</option> </select> </div>
                            <p class="text-muted small mb-3">⚙️ Drag and drop custom blocks here (accordion, sliders, etc.)</p>
                            <div class="border rounded p-3 text-center text-muted">
                                Components UI placeholder (integrate Vue/React for drag-drop).
                            </div>
                        </div>
                        <div class="card card-body">
                            <h5 class="fw-semibold mb-3">Forms & Dynamic Components</h5>
                            <div class="mb-3"> <label class = "form-label">Enable Contact Form</label> <select class="form-select" name="contact_form_enabled"><option value="0">No</option><option value="1">Yes</option></select> </div>
                            <div class="mb-3"> <label class = "form-label">Recipient Email</label><input type="email" class="form-control" name="contact_form_email"></div>
                            <div class="mb-3"> <label class = "form-label">Form Subject</label><input type="text" class="form-control" name="contact_form_subject"></div>
                            <div class="mb-3"> <label class = "form-label">Custom Fields (JSON)</label><textarea class="form-control" rows="3" name="contact_form_fields" placeholder='[{"label":"Name","type":"text"}]'></textarea></div>
                            <div class="mb-3"> <label class = "form-label">Newsletter Signup Form</label> <select class="form-select" name="newsletter_enabled"><option value="0">No</option><option value="1">Yes</option></select> </div>
                            <div class="mb-3"> <label class = "form-label">Polls / Surveys</label> <textarea class="form-control" rows="3" name="polls_surveys" placeholder='[{"question":"...","options":["a","b"]}]'></textarea> </div>
                            <div class="mb-3"> <label class = "form-label">Dynamic Tables / Grids</label> <textarea class="form-control" rows="3" name="dynamic_tables" placeholder='[{"columns":["Name","Email"],"rows":[...]}]'></textarea> </div>
                            <div class="mb-3"> <label class = "form-label">Reusable Components</label> <textarea class="form-control" rows="3" name="reusable_components" placeholder='[{"type":"testimonial","content":"..."}]'></textarea> </div>
                            <div class="mb-3"> <label class = "form-label">Conditional Display Logic (JSON)</label> <textarea class="form-control" rows="3" name="conditional_logic" placeholder='[{"component":"hero","condition":{"role":"admin"}}]'></textarea> </div>
                        </div>
                    </div>

                    <!-- Custom Code -->
                    <div class="tab-pane fade" id="scriptsTab" role="tabpanel">
                        <div class="card card-body">
                            <h5 class="fw-semibold mb-3">Custom Code</h5>
                            <div class="mb-3">
                                <label class="form-label">Custom CSS</label>
                                <textarea class="form-control font-monospace" rows="5" name="custom_css"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Custom JS</label>
                                <textarea class="form-control font-monospace" rows="5" name="custom_js"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Settings -->
                    <div class="tab-pane fade" id="settingsTab" role="tabpanel">
                        <div class="card card-body">
                            <h5 class="fw-semibold mb-3">Page Settings</h5>
                            <div class="mb-3"> <label class ="form-label">Layout</label> <select class="form-select" name="layout"> <option value="default">Default</option> <option value="fullwidth">Full Width</option> <option value="sidebar-left">Sidebar Left</option> <option value="sidebar-right">Sidebar Right</option> </select> </div>
                            <div class="mb-3"> <label class ="form-label">Template</label> <select class="form-select" name="template"> <option value="default">Default Template</option> <option value="landing">Landing Page</option> <option value="blog">Blog Post</option> <option value="faq">FAQ Page</option> </select> </div>
                            <div class="mb-3"> <label class ="form-label">Sidebar Widgets</label> <textarea class="form-control" rows="3" name="sidebar_widgets" placeholder='["recent_posts","categories"]'></textarea> </div>
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

<script>
// Tab subtitle with icons
document.addEventListener('DOMContentLoaded', function() {
    const tabLinks = document.querySelectorAll('#pageTab .nav-link');
    const tabDescription = document.getElementById('tabDescription');
    const tabIcon = document.getElementById('tabIcon');

    const tabIcons = {
        '#seoTab': '📝',
        '#mediaTab': '🖼️',
        '#layoutTab': '🎨',
        '#componentsTab': '⚙️',
        '#scriptsTab': '💻',
        '#settingsTab': '🛠️'
    };

    tabLinks.forEach(link => {
        link.addEventListener('shown.bs.tab', function(event) {
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
            [{ 'font': [] }, { 'size': [] }, { 'header': [1,2,3,4,5,6,false] }],
            ['bold','italic','underline','strike'],
            [{ 'color': [] }, { 'background': [] }],
            [{ 'script': 'sub' }, { 'script': 'super' }],
            [{ 'header': 1 }, { 'header': 2 }],
            ['blockquote','code-block'],
            [{ 'list': 'ordered' }, { 'list': 'bullet' }],
            [{ 'indent': '-1' }, { 'indent': '+1' }],
            [{ 'align': [] }, { 'direction': 'rtl' }],
            ['link','image','video','formula'],
            ['emoji'],
            ['clean'],
            ['html']
        ],
        imageResize: { modules: ['Resize','DisplaySize'] },
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
    if(fullscreen) window.scrollTo(0,0);
    fullscreenBtn.innerHTML = fullscreen ? collapseIcon : expandIcon;
});
document.addEventListener('keydown', e => { if(e.key === "Escape" && fullscreen) fullscreenBtn.click(); });

// HTML insert
const htmlBtn = toolbar.container.querySelector('.ql-html');
if(htmlBtn) htmlBtn.addEventListener('click', () => {
    const html = prompt("Paste your HTML code:");
    if(html) {
        const range = quill.getSelection(true);
        quill.clipboard.dangerouslyPasteHTML(range.index, html);
    }
});

// Undo / Redo
const undoStack = [], redoStack = [];
quill.on('text-change', (delta, oldDelta, source) => { if(source==='user') undoStack.push(oldDelta); });
function undo() { if(undoStack.length>0){ const last=undoStack.pop(); redoStack.push(quill.getContents()); quill.setContents(last); } }
function redo() { if(redoStack.length>0){ const next=redoStack.pop(); undoStack.push(quill.getContents()); quill.setContents(next); } }

// Save & Preview
document.querySelector('#pageForm').onsubmit = () => { document.querySelector('#body').value = quill.root.innerHTML; };
document.querySelector('#previewBtn').onclick = () => {
    document.querySelector('#body').value = quill.root.innerHTML;
    const form = document.querySelector('#pageForm');
    form.target="_blank";
    form.action="{{ route('admin.pages.preview') }}";
    form.submit();
    form.target="_self";
    form.action="{{ route('admin.pages.store') }}";
};

// SEO live preview
document.querySelector('#seoTitle').addEventListener('input', e => {
    document.querySelector('#seoPreviewTitle').textContent = e.target.value + " | Site Name";
});
document.querySelector('#seoDescription').addEventListener('input', e => {
    document.querySelector('#seoPreviewDesc').textContent = e.target.value;
});
</script>
@endsection

</x-layouts.admin-app>