@component('mail::message')
# {{ $msg->subject }}

{!! $msg->content !!}

From,<br>
{{ $msg->name }}
@endcomponent
