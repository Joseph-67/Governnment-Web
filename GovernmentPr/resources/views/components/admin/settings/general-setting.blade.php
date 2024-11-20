<x-layouts.admin-app>
<x-form-section submit="">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
    <div class="row">
        <div class="col-md-7">
            <input type="text" class="form-control" placeholder="First name" aria-label="First name">
        </div>
        <div class="col-md-5">
            <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
        </div>
    </div>
    </x-slot>
</x-form-section>
<x-form-section submit="">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
    <div class="row">
        <div class="col-md-7">
            <input type="text" class="form-control" placeholder="First name" aria-label="First name">
        </div>
        <div class="col-md-5">
            <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
        </div>
    </div>
    </x-slot>
</x-form-section>
@section('scripts')
@endsection
</x-layouts.admin-app>