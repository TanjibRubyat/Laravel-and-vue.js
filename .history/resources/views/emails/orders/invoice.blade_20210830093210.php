@component('mail::message')
# Introduction

Tanjib Rubyat

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
