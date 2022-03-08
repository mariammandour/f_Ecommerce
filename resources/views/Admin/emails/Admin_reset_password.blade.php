@component('mail::message')
# Introduction
welcome {{$data['data']->name}}

@component('mail::button', ['url' => 'reset/password'.$data['token']])
click here to reset your password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
