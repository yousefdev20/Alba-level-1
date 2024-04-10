<?php

include_once __DIR__ . '/../system/Core/Helpers/env.php';

return [
    'connections' => [
        'default' => 'mysql',

        'mysql' => [
            'host' => env('DB_HOST', '127.0.0.1'),
            'database' => env('DB_NAME', 'alba'),
            'username' => env('DB_USERNAME', 'alba'),
            'password' => env('DB_PASSWORD', 'password'),
            'port' => env('DB_PORT', '3306'),
        ],
    ]
];
