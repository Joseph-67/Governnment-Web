@if ($errors->any())
<div class="row my-2 rounded " style="background-color:#ffd88e3b;">
    <div {{ $attributes }} >
        <div class="fw-medium text-red-600 fs-18">{{ __('Whoops! Something went wrong.') }}</div>
        <ul class="mt-2 list-disc list-inside text-sm text-red-600 fs-14">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif
