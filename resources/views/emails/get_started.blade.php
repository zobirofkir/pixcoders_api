@component('mail::message')
# New Get Started Request

A new user has submitted a Get Started request:

- **Name:** {{ $data['name'] }}
- **Email:** {{ $data['email'] }}
- **Company Name:** {{ $data['company_name'] }}
- **Phone Number:** {{ $data['phone_number'] }}
- **Service:** {{ $data['service'] }}

@component('mail::panel')
{{ $data['message'] ?? 'No additional message provided.' }}
@endcomponent

Thanks,  
**PixCoders Website**
@endcomponent
