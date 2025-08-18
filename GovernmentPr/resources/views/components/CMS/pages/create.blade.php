<x-layouts.admin-app>

@section('styles')
<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/quill-emoji@0.2.0/dist/quill-emoji.css" rel="stylesheet" />
<style>
/* --- General --- */
body, input, textarea, select, button {
    font-family: 'Inter', 'Roboto', sans-serif;
    color: #212529;
}
/* Editor container */
#editor-container {
    border: 1px solid #ddd;
    border-radius: 6px;
    background: #fff;
    display: flex;
    flex-direction: column;
    height: auto;
    min-height: 200px;
    max-height: 600px;
    overflow-y: auto;
}

/* Toolbar */
.ql-toolbar {
    border: none;
    background: #f9f9f9;
    border-bottom: 1px solid #ddd;
    border-radius: 6px 6px 0 0;
    padding: 4px 8px;
}

.ql-toolbar button {
    border: none;
    background: transparent;
    padding: 4px 6px;
    border-radius: 4px;
}

.ql-toolbar button:hover {
    background-color: #e8f0fe; /* Gmail-like hover */
}

.ql-toolbar .ql-formats {
    margin-right: 8px;
}

/* Editor area */
#editor {
    padding: 12px;
    flex: 1;
    min-height: 200px;
    outline: none;
}

/* Fullscreen editor */
.ql-fullscreen {
    top: 0; left: 0; right: 0; bottom: 0;
    width: 100%; height: 100%;
    z-index: 1050;
    background: #fff;
    padding: 1rem;
}

/* Remove heavy shadows for professional look */
.card {
    box-shadow: none;
    border: 1px solid #ddd;
    border-radius: 6px;
}

/* Tabs & buttons consistent */
.nav-tabs .nav-link.active {
    border-bottom: 2px solid #0d6efd;
}
.btn-primary, .btn-warning, .btn-danger { border-radius: 6px; }


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

/* Tabs */
.nav-tabs .nav-link {
    border: none;
    color: #495057;
    padding: 0.75rem 1rem;
    font-weight: 500;
}
.nav-tabs .nav-link.active {
    border-bottom: 3px solid #0d6efd; /* template primary color */
    color: #0d6efd;
}

/* Buttons */
.btn-primary, .btn-warning, .btn-danger { border-radius: 6px; }

/* Form inputs */
.form-control, .form-select {
    border-radius: 6px;
    border: 1px solid #CED4DA;
    padding: 0.5rem 0.75rem;
}

/* SEO preview box */
.preview-seo {
    background: #f8f9fa;
    border-radius: 6px;
    padding: 1rem;
    margin-top: 0.5rem;
}

/* Responsive spacing */
.row.g-0 > .col-lg-7, .row.g-0 > .col-lg-5 {
    padding: 1.5rem;
}
</style>
@endsection

<div class="container-xxl">
    <h1 class="mb-4">📄 Create New Page</h1>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <form method="POST" action="{{ route('admin.pages.store') }}" id="pageForm">
                        @csrf
                        <div class="row g-0 h-100">
                            <div class="col-lg-7 border-end">
                                <div class="p-4">
                                    <h4>Create Content</h4>
                                    <div class="form-group mb-3">
                                        <label>Page Title</label>
                                        <input type="text" class="form-control" name="title" id="pageTitle">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Slug / URL</label>
                                        <input type="text" class="form-control" name="slug" id="pageSlug">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Page Content</label>
                                        <div id="editor-container">
                                            <div id="editor"></div>
                                        </div>
                                        <input type="hidden" name="content" id="body">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <div class="p-4">
                                    <h4>Page Settings</h4>

                                    <div class="form-group mb-3">
                                        <label>Status</label>
                                        <select class="form-select" name="status" id="pageStatus">
                                            <option value="draft">Draft</option>
                                            <option value="published">Published</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label>Schedule Publish</label>
                                        <input type="datetime-local" class="form-control" name="publish_at">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label>Visibility</label>
                                        <select class="form-select" name="visibility">
                                            <option value="public">Public</option>
                                            <option value="private">Private</option>
                                            <option value="password">Password Protected</option>
                                        </select>
                                    </div>
                                </div>

                                <ul class="nav nav-tabs" id="pageTab" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#seoTab">SEO</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#mediaTab">Media</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#heroTab">Hero</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#scriptsTab">Custom Code</a></li>
                                </ul>

                                <div class="tab-content border p-4">
                                    <div class="tab-pane fade show active" id="seoTab">
                                        <div class="form-group mb-3">
                                            <label>SEO Title</label>
                                            <input type="text" class="form-control" name="seo_title" id="seoTitle">
                                            <small class="text-muted">Recommended: 50–60 characters</small>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Meta Description</label>
                                            <textarea class="form-control" rows="3" name="seo_description" id="seoDescription"></textarea>
                                            <small class="text-muted">Recommended: 150–160 characters</small>
                                        </div>
                                        <div class="preview-seo">
                                            <p><strong>Google Preview:</strong></p>
                                            <h5 id="seoPreviewTitle">Page Title | Site Name</h5>
                                            <p id="seoPreviewUrl" class="text-success">https://yoursite.com/slug</p>
                                            <p id="seoPreviewDesc">Meta description here...</p>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="mediaTab">
                                        <div class="form-group mb-3">
                                            <label>Featured Image</label>
                                            <input type="file" class="form-control" name="featured_image">
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="heroTab">
                                        <div class="form-group mb-3">
                                            <label>Hero Image</label>
                                            <input type="file" class="form-control" name="hero_image">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Hero Title</label>
                                            <input type="text" class="form-control" name="hero_title">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Hero Subtitle</label>
                                            <input type="text" class="form-control" name="hero_subtitle">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Hero Button Text</label>
                                            <input type="text" class="form-control" name="hero_button_text">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Hero Button URL</label>
                                            <input type="text" class="form-control" name="hero_button_url">
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="scriptsTab">
                                        <div class="form-group mb-3">
                                            <label>Custom CSS</label>
                                            <textarea class="form-control" rows="3" name="custom_css"></textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Custom JS</label>
                                            <textarea class="form-control" rows="3" name="custom_js"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 p-3 border-top d-flex gap-2">
                            <button type="submit" class="btn btn-primary">💾 Save Page</button>
                            <button type="button" class="btn btn-warning" id="previewBtn">👁 Preview</button>
                            <a href="{{ route('admin.pages.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill-emoji@0.2.0/dist/quill-emoji.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js"></script>

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
