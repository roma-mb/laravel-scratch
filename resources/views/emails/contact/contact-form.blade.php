@component('mail::message')
# Thank you for your message {{ $validate['name'] }}

<strong>Message: </strong>
{{ $validate['message'] }}
@endcomponent
