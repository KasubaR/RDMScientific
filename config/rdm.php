<?php

return [
    'name' => 'RDM Scientific Products Limited',
    'phone' => '+260 977 783636',
    'phone_href' => '+260977783636',
    'email' => 'sales@rdmscientific.com',

    // WhatsApp number in international format, digits only. Confirm this number is on WhatsApp.
    'whatsapp' => env('RDM_WHATSAPP', '260977783636'),
    'address' => 'Plot No. 1 Chisokone Road, Off Great East Road, Lusaka, Zambia',
    'website' => 'https://www.rdmscientific.com',

    // Where new website enquiries are sent.
    'sales_email' => env('RDM_SALES_EMAIL', 'sales@rdmscientific.com'),

    // Send the visitor an automatic copy of their enquiry (off by default).
    'send_confirmation' => (bool) env('RDM_SEND_CONFIRMATION', false),
];
