<x-layouts.admin-app>
    <div class="container py-4">
        <h4>Create Page</h4>
        <form action="{{ route('admin.pages.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control">
                <small class="text-muted">Leave empty to auto-generate</small>
            </div>

            <div class="mb-3">
                <label class="form-label">Content</label>
                <div id="editor" style="height: 250px;"></div>
                <textarea name="body" id="body" class="d-none"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                    <option value="scheduled">Scheduled</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Publish At (optional)</label>
                <input type="text" name="published_at" class="form-control datepicker">
            </div>

            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>

    @push('scripts')
    <script>
        const quill = new Quill('#editor', { theme: 'snow' });
        document.querySelector('form').onsubmit = function () {
            document.querySelector('#body').value = quill.root.innerHTML;
        };
    </script>
    @endpush
</x-layouts.admin-app>
