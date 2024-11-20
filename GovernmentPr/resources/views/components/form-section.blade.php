<div {{ $attributes->merge(['class' => 'd-flex ']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="mt-lg-3 col-md-6">
        <form wire:submit.prevent="{{ $submit }}">
            <div class="px-2 py-3 card card-body p-5 shadow-sm rounded">
                <div class=" g-2">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>
