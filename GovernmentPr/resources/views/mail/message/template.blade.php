<x-mail::message>
    {{ $subject }}

    {!! $body !!}

   

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
