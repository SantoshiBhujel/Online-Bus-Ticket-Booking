@component('mail::message')
Dear Customer,

With due respect, it is to notify that our trip has been cancelled due to {{ $cause }}.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
