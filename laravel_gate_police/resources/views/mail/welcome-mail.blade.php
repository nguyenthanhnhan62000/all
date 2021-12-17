@component('mail::message')
<h1>Welcome to my Auth & Mailing Course</h1>

The body of your message.

@component('mail::button', ['url' => 'https://www.google.com.vn/'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
