@component('mail::message')
# Welcome Bro!
Hi  {{ $user->name }}

<br>
Welcome to Laracamp.com, your account has been created successfuly. Now you can choose your best match for great future!

@component('mail::button', ['url' => route('login')])
Login Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
