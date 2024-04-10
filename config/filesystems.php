<?php

include_once __DIR__ . '/../system/Core/Helpers/env.php';

return [

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => 'app',
        ],
    ],
];
