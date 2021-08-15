@component('mail::message')
# Introduction

reset your bassword in blood bank.

@component('mail::button', ['url' => 'https://facebool.com'])
reset
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
