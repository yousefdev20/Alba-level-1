<?php

$routes = require_once __DIR__ . '/../../../routes/web.php';

if (! function_exists('route')) {
    function route(?string $name): ?string
    {
        global $routes;

        foreach ($routes as $route) {
            if ($route['name'] === $name) {
                return $route['url'];
            }
        }
        http_response_code(404);
        die(json_encode(['error' => 'Not Found 4O4.']));
    }
}