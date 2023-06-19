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

    'google' => [
        'client_id' => '543317000447-1lhsbs7bm0264p2ujv4d6vtuv83li732.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/auth/google/callback',
    ],

    'facebook' => [
        'client_id' => '154054017652097',
        'client_secret' => 'aeca160666d71c58e68c0b55c6913fd9',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],

    'github' => [
        'client_id' => 'd571aa8f5ffe70158c1d',
        'client_secret' => '9792997924c00a99dc5a7d6a729655681fd1d9df',
        'redirect' => 'http://localhost:8000/login/oauth2/code/github',
    ],

];
