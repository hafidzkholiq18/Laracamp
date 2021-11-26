@component('mail::message')
# Your Transaction Has Been Confirmed

Hi, {{ $checkout->User->name }}
<br>
Your transaction has been confirmed, now you can enjoy the benefit of <b>{{ $checkout->Camps->title }}</b>
@component('mail::button', ['url' => route('user.dashboard')])
Get Invoice
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
