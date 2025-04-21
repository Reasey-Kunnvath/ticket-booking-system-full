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
     */

    'paths' => ['api/*'], // Apply CORS to all API routes
    'allowed_methods' => ['*'], // Allow all HTTP methods (GET, POST, etc.)
    'allowed_origins' => ['*'], // Frontend URL
    // 'allowed_origins' => ['http://localhost:8080'], // Frontend URL
    'allowed_origins_patterns' => [], // Optional regex patterns for origins
    'allowed_headers' => ['*'], // Allow all headers
    'exposed_headers' => [], // Headers exposed to the client
    'max_age' => 0, // Cache duration for preflight requests
    'supports_credentials' => false, // Set to true if using cookies/auth
];
