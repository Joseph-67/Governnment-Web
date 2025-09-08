<x-layouts.admin-app>
@section('PageTitle', 'Media Library')

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Media Library</h1>
        <div>
            <button class="btn btn-danger me-2 d-none" id="bulkDeleteBtn">Delete Selected</button>
            <button class="btn btn-primary" type="button" onclick="document.getElementById('fileInput').click()">
                Upload Media
            </button>
        </div>
        <form id="uploadForm" class="d-none">
            @csrf
            <input type="file" name="files[]" id="fileInput" multiple>
        </form>
    </div>

    <!-- Drag & Drop Area -->
    <div id="dropArea" class="border border-primary rounded p-4 text-center mb-4" style="cursor: pointer;">
        <p class="mb-0 text-muted">Drag & drop files here or click to select</p>
    </div>

    <!-- File Previews -->
    <div id="filePreview" class="mb-3 row g-2"></div>

    <!-- Filter -->
    <div class="mb-4 d-flex justify-content-between">
        <form method="GET" action="{{ route('admin.media') }}" class="d-flex gap-2">
            <select name="category" class="form-select w-auto">
                <option value="">All Categories</option>
                <option value="image" {{ request('category')=='image'?'selected':'' }}>Images</option>
                <option value="video" {{ request('category')=='video'?'selected':'' }}>Videos</option>
                <option value="audio" {{ request('category')=='audio'?'selected':'' }}>Audio</option>
                <option value="document" {{ request('category')=='document'?'selected':'' }}>Documents</option>
            </select>
            <button class="btn btn-secondary">Filter</button>
        </form>

        <!-- Select All -->
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="selectAll">
            <label class="form-check-label" for="selectAll">Select All</label>
        </div>
    </div>

    <!-- Media Grid -->
    <div class="row g-3" id="mediaGrid">
        @forelse($media as $item)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 media-item" id="media-{{ $item->media_id }}">
            <div class="card h-100 shadow-sm">
                <div class="position-absolute p-1">
                    <input type="checkbox" class="form-check-input media-checkbox" value="{{ $item->media_id }}">
                </div>
                <div class="ratio ratio-4x3 bg-light d-flex align-items-center justify-content-center overflow-hidden">
                    @if(Str::startsWith($item->mime_type, 'image/'))
                        <img src="{{ $item->url }}" alt="{{ $item->original_name }}" class="img-fluid w-100 h-100 object-fit-cover">
                    @else
                        <div class="text-center text-muted">
                            <i class="bi bi-file-earmark-text fs-1"></i>
                            <p class="small">{{ strtoupper($item->category) }}</p>
                        </div>
                    @endif
                </div>
                <div class="card-body p-2">
                    <p class="fw-semibold small text-truncate mb-1">{{ $item->original_name }}</p>
                    <p class="text-muted small mb-0">{{ number_format($item->size/1024, 1) }} KB</p>
                </div>
                <div class="card-footer bg-white border-0 d-flex justify-content-between p-2">
                    <a href="{{ $item->url }}" target="_blank" class="btn btn-link btn-sm text-primary">View</a>
                    <button class="btn btn-link btn-sm text-danger deleteBtn" data-id="{{ $item->media_id }}">Delete</button>
                </div>
            </div>
        </div>
        @empty
        <p class="text-center text-muted">No media found.</p>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $media->links('pagination::bootstrap-5') }}
    </div>
</div>

<!-- Toastify -->
 @section('styles')
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
@endsection
@section('scripts')
<script>
document.addEventListener("DOMContentLoaded", () => {
    const selectAll = document.getElementById('selectAll');
    const bulkDeleteBtn = document.getElementById('bulkDeleteBtn');
    const mediaGrid = document.getElementById('mediaGrid');

    // Select All Toggle
    selectAll.addEventListener('change', () => {
        const checkboxes = document.querySelectorAll('.media-checkbox');
        checkboxes.forEach(cb => cb.checked = selectAll.checked);
        toggleBulkDeleteButton();
    });

    // Show/Hide Bulk Delete Button
    document.addEventListener('change', e => {
        if (e.target.classList.contains('media-checkbox')) {
            toggleBulkDeleteButton();
        }
    });

    function toggleBulkDeleteButton() {
        const checked = document.querySelectorAll('.media-checkbox:checked').length;
        bulkDeleteBtn.classList.toggle('d-none', checked === 0);
    }

    // Bulk Delete
    bulkDeleteBtn.addEventListener('click', () => {
        const selectedIds = Array.from(document.querySelectorAll('.media-checkbox:checked')).map(cb => cb.value);
        if (selectedIds.length === 0) return;
        if (!confirm(`Delete ${selectedIds.length} files?`)) return;

        fetch("{{ route('media.bulkDelete') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ ids: selectedIds })
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                showToast(data.message, 'success');
                selectedIds.forEach(id => document.getElementById(`media-${id}`).remove());
                toggleBulkDeleteButton();
            } else {
                showToast("Bulk delete failed", 'error');
            }
        });
    });

    // Single Delete
    mediaGrid.addEventListener('click', e => {
        if (e.target.classList.contains('deleteBtn')) {
            const id = e.target.dataset.id;
            fetch(`/media/${id}`, {
                method: 'DELETE',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    showToast(data.message, 'success');
                    document.getElementById(`media-${id}`).remove();
                } else {
                    showToast("Delete failed", 'error');
                }
            });
        }
    });

    // Toastify Notification
    function showToast(message, type) {
        Toastify({
            text: message,
            duration: 3000,
            gravity: "top",
            position: "right",
            backgroundColor: type === 'success' ? "green" : "red",
        }).showToast();
    }
});
</script>
@endsection
</x-layouts.admin-app>
