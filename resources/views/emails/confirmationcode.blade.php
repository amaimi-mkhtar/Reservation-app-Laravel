@component('mail::message')
HI,
Thanks for creating an account with the Reservation System  app.
Please follow the link below to verify your email address

@component('mail::button', ['url' => 'http://rv.me/singup/verification/' . $confirmation_code])
Confirmation Link
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
