<?php

return [
    'company_name'   => env('COMPANY_NAME'),
    'domain'         => env('DOMAIN'),
    'url'            => [
        'customer'    => env('LOGIN_URL'),
        'internal'    => env('INTERNAL_LOGIN_URL'),
        'vendor'      => env('VENDOR_LOGIN_URL'),
        'whitegloves' => env('WHITEGLOVES_LOGIN_URL'),
    ],
    'IN_DEVELOPMENT' => true,
    'whitelist'      => [
        '::1',          // IPv6 localhost address
        '127.0.0.1',    // IPv4 localhost address
    ],
];

