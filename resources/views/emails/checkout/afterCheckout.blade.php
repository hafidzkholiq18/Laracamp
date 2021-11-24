@component('mail::message')
# Your Has Been Register Camp : {{ $checkout->Camps->title}}

Hi Bro, {{ $checkout->user->name }}
<br>
Thank for Register on <b>{{ $checkout->Camps->title}}</b>, Please see payment instruction by click the button below.

@component('mail::button', ['url' => route('checkout.invoice', $checkout->id)])
Get Invoice
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent