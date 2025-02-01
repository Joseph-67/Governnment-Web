@component('mail::message')
# {{ $subject }}

<main>
{!! $body !!}
</main> <!-- Render the body content as raw HTML -->

@isset($url)
@component('mail::button', ['url' => $url])
View More
@endcomponent
@endisset

Thanks,<br>
{{ config('app.name') }}
@endcomponent