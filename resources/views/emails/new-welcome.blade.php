@component('mail::message')
# Welcome {{ $customer->name }}...

Thanks for subscribe!,<br>
{{ config('app.name') }}
@endcomponent
