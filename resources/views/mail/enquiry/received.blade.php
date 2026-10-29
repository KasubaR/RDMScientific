<x-mail::message>
# Thank you, {{ $enquiry->name }}

We have received your enquiry and a member of the {{ config('rdm.name') }} team will reply as soon as possible.

If your request is urgent, call us on {{ config('rdm.phone') }}.

<x-mail::panel>
{{ $enquiry->message }}
</x-mail::panel>

{{ config('rdm.name') }}
{{ config('rdm.address') }}
</x-mail::message>
