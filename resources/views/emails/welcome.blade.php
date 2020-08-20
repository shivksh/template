@component('mail::message')
# Welcome User Good to See You . This is Checking mail Only.



@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
