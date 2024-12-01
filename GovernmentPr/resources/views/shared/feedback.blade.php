@if(Session::has('success'))
    <div class="flash-message">
        <div class="alert alert-success">
            <h4 class="fw-medium text-success-600 fs-18">Done! Task completed.</h4>
            <p class="text-sm text-red-600 fs-14">{{ Session::get('success') }}</p>
        </div>
    </div>
@endif