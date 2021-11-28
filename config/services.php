<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'nexmo' => [
        'key' => env('NEXMO_KEY'),
        'secret' => env('NEXMO_SECRET'),
        'sms_from' => 'insta',
    ],

    'OpenWeatherMap' => [
        'key' => 'a17b3fca0e10218974c851a16fb49ba1'
    ],

    'paypal' => [
        'mode' => 'Sandbox',
        'client_id' => 'ATnNxI_bvyenBrmvz4chSG4n6FixvEfXQPp4c9TutM__pl5ViqocaBAu5Yh2ClgUSS_JDKn1rb82Zq1c',
        'secret' => 'EJ7eHKUdXA_jeYjMJI4TKkxtTq4GFIfWfxAPV1FeFZUFaGNM5EoMo5f7F9lA8M4-w3JB-5QAKT5PbdAr',

    ]

];
