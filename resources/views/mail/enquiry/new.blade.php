<x-mail::message>
# New website enquiry

**Type:** {{ $enquiry->type->label() }}
**Name:** {{ $enquiry->name }}
@if ($enquiry->organization)
**Organization:** {{ $enquiry->organization }}
@endif
**Email:** {{ $enquiry->email }}
@if ($enquiry->phone)
**Telephone:** {{ $enquiry->phone }}
@endif
@if ($enquiry->subject)
**Subject:** {{ $enquiry->subject }}
@endif

<x-mail::panel>
{{ $enquiry->message }}
</x-mail::panel>

Reply to this email to respond directly to {{ $enquiry->name }}.
</x-mail::message>
