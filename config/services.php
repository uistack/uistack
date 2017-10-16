<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => uistacks\Users\Models\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
        'client_id'     => env('FACEBOOK_ID'),
        'client_secret' => env('FACEBOOK_SECRET'),
        'redirect'      => env('FACEBOOK_URL'),
    ],

    // ..
    'amazon' => [
        'client_id'     	=>  'your_amazon_client_id',
        'client_secret' 	=>  'your_amazon_client_secret/',
        'tag'           	=>  'your_amazon_id_tag',
        'country'       	=>  'your_country_code'
    ],
    'flipkart' => [
        'client_id'     	=>  'uistacks',
        'client_secret' 	=>  'f9d92a741b994a4ab0f9e7ab18b66c28',
        'country'       	=>  'India',
        'tag'           	=>  ''
    ],

];
