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
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '1405282606251396',
        'client_secret' => '6440a6811c1556edddcd59494d61b5b2',
        'redirect' => 'http://localhost:8000/login/facebook/callback',
    ],
    'twitter' => [
        'client_id' => 'Qmv3nHmvzSetD7uGl1IikT2Bd',
        'client_secret' => 'TSTrlkCJ651mx5rmHqcJiAXsRrN5fA1TP2B5K650PIA6aE3DVh',
        'redirect' => 'http://localhost:8000/login/twitter/callback',
    ],
    'google' => [
        'client_id' => '1001230708266-dhhck549htae8b7rj421dd74babbvmpr.apps.googleusercontent.com',
        'client_secret' => 'kiMZdVoqouKvijBJxQiuFsA_',
        'redirect' => 'http://localhost:8000/login/google/callback',
    ],
    
];
