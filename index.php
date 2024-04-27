<?php

$routes = include_once __DIR__ . '/routes/web.php';
include_once __DIR__ . '/system/Core/Exceptions/NonFoundPage.php';

foreach ($routes as $route) {
    if (
        preg_replace('/\//', '', $route['url'], 1) ===
        preg_replace('/\//', '', parse_url($_SERVER['REQUEST_URI'])['path'], 1)
    ) {

        if (strtolower($_SERVER['REQUEST_METHOD']) === strtolower($route['method'])) {
            $instance = new $route['action'][0]();

            if ($route['middleware'] ?? false) {
                foreach ($route['middleware'] as $middleware) {
                    $middlewareInstance = new $middleware();
                    $middlewareInstance->handel();
                }
                $instance->{$route['action'][1]}(new Request());
            } else {
                $instance->{$route['action'][1]}(new Request());
            }
            exit();
        } else {
            http_response_code(405);
            die(json_encode(['error' => 'Method not Allowed.']));
        }
    }
}
throw new NonFoundPage();
