@component('mail::message')
# Contact Enquiry Received

Dear Administrator,

A new contact enquiry has been generated. Following are the details.

<table style="width: 100%; margin-bottom: 1.5rem;">
    <tbody>
        <tr>
            <td style="padding: .5rem 1rem; width: 10rem">Name:</td>
            <td style="padding: 0 1rem;">{{ $enquiry->full_name }}</td>
        </tr>
        <tr>
            <td style="padding: .5rem 1rem; width: 10rem">Email:</td>
            <td style="padding: 0 1rem;">{{ $enquiry->email }}</td>
        </tr>
        <tr>
            <td style="padding: .5rem 1rem; width: 10rem">Contact Number:</td>
            <td style="padding: 0 1rem;">{{ $enquiry->contact_number }}</td>
        </tr>
        <tr>
            <td style="padding: .5rem 1rem; width: 10rem; vertical-align: top;">Message:</td>
            <td style="padding: .5rem 1rem 0;">{{ $enquiry->message_content }}</td>
        </tr>
    </tbody>
</table>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
