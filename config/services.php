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
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    // Stripe
    // 'stripe' =>[
    //     'key' => env('STRIPE_KEY'),
    //     'secret' => env('STRIPE_SECRET'),
    // ],

    // Paypal
    // 'paypal' => [
    //     'client' => env('PAYPAL_CLIENT'),
    //     'secret' => env('PAYPAL_SECRET'),
    // ],

    // fedex
    // 'fedex' => [
    //     'api_url' => env('FEDEX_API_URL'),
    //     'key' => env('FEDEX_KEY'),
    //     'password' => env('FEDEX_PASSWORD'),
    //     'account_number' => env('FEDEX_ACCOUNT_NUMBER'),
    //     'meter_number' => env('FEDEX_METER_NUMBER'),
    //     'mode' => env('FEDEX_MODE'),
    // ],

    // UPS
    // 'ups' => [
    //     'api_url' => env('UPS_API_URL'),
    //     'client_id' => env('UPS_CLIENT_ID'),
    //     'secret' => env('UPS_SECRET'),
    //     'user' => env('UPS_USER_NAME'),
    //     'password' => env('UPS_PASSWORD'),
    //     'account_number' => env('UPS_ACCOUNT_NUMBER'),
    //     'ship_from_addressLine' => env('UPS_SHIP_FROM_ADDRESS_LINE'),
    //     'ship_from_city' => env('UPS_SHIP_FROM_CITY'),
    //     'ship_from_state' => env('UPS_SHIP_FROM_STATE'),
    //     'ship_from_postalCode' => env('UPS_SHIP_FROM_POSTAL_CODE'),
    //     'ship_from_countryCode' => env('UPS_SHIP_FROM_COUNTRY_CODE'),
    // ],

];
