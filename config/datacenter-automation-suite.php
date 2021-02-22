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
    'IN_DEVELOPMENT' => false,
    'whitelist'      => [
        '::1',            // IPv6 localhost address
        '127.0.0.1',      // IPv4 localhost address
        '172.16.238.1',   // IPv4 router interface
        '172.16.238.2',   // IPv4 elasticsearch docker container
        '172.16.238.8',   // IPv4 redis docker container
        '172.16.238.10',  // IPv4 web docker container
        '172.16.238.13',  // IPv4 php docker container
        '172.16.238.14',  // IPv4 mysql docker container
        '172.16.238.16',  // IPv4 memcached docker container
    ],
];
