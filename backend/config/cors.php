<?php

return [
    'paths' => ['api/', 'sanctum/csrf-cookie'],
    'allowed_methods' => [''],
    'allowed_origins' => ['*'], // Adjust this to your Vue.js app's domain
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,
];