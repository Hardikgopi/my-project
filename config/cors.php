<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'], // Define the paths that should allow CORS requests.

    'allowed_methods' => ['*'], // Specify the HTTP methods allowed (e.g., GET, POST, PUT, DELETE, etc.).

    'allowed_origins' => ['*'], // Define which origins can send requests (use * for all origins or specify the domains).

    'allowed_origins_patterns' => [], // Use patterns (regular expressions) if you need advanced origin matching.

    'allowed_headers' => ['*'], // Define which HTTP headers can be used during the request.

    'exposed_headers' => [], // Specify headers that are safe to expose to the browser (optional).

    'max_age' => 0, // Set the maximum time a preflight request can be cached (in seconds, 0 for no caching).

    'supports_credentials' => false, // Set to true if your application supports cookies or HTTP authentication.
];
