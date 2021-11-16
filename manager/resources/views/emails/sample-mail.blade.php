
@component('mail::message')

<h3>{{ $content['details']}}</h3><br>

@component('mail::button', ['url' => 'switfx.com'])
Login 
@endcomponent


Regards,<br>
{{ config('app.name') }}
@endcomponent
