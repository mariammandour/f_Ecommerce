@component('mail::message')
# Introduction
welcome {{$data['data']->name}}

@component('mail::button', ['url' => url('Admin/resetpassword/'.$data['token'])])
click here to reset your password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
