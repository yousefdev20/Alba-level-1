<?php

include_once __DIR__ . '/../system/Core/Helpers/env.php';

return [
    'lifetime' => env('SESSION_LIFETIME', 120), // Minutes
];