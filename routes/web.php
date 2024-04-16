<?php

include_once __DIR__ . '/../app/Http/Controllers/AppController.php';
include_once __DIR__ . '/../app/Http/Controllers/Admin/AdminController.php';
include_once __DIR__ . '/../app/Http/Controllers/Admin/ServiceController.php';
include_once __DIR__ . '/../app/Http/Controllers/Auth/AuthController.php';

return [

    // The Landing page.
    ['url' => '/', 'name' => 'index', 'action' => [AppController::class, 'index'], 'method' => 'get'],
    ['url' => '/login', 'name' => 'auth.login.show', 'action' => [AuthController::class, 'showLogin'], 'method' => 'get'],
    ['url' => '/signup', 'name' => 'auth.register.show', 'action' => [AuthController::class, 'showRegister'], 'method' => 'get'],
    ['url' => '/register', 'name' => 'auth.register', 'action' => [AuthController::class, 'register'], 'method' => 'post'],
    ['url' => '/logout', 'name' => 'auth.logout', 'action' => [AuthController::class, 'logout'], 'method' => 'get'],
    ['url' => '/login_', 'name' => 'auth.login', 'action' => [AuthController::class, 'login'], 'method' => 'post'],

    // Admin Area.
    ['url' => '/mysite/admin', 'name' => 'admin.index', 'action' => [AdminController::class, 'index'], 'method' => 'get', 'middleware' => [IsAuthenticated::class, HasValidSession::class]],
    ['url' => '/mysite/admin/project/store', 'name' => 'admin.store', 'action' => [AdminController::class, 'store'], 'method' => 'post', 'middleware' => [IsAuthenticated::class, HasValidSession::class]],
    ['url' => '/mysite/admin/project/edit', 'name' => 'admin.edit', 'action' => [AdminController::class, 'edit'], 'method' => 'get', 'middleware' => [IsAuthenticated::class, HasValidSession::class]],
    ['url' => '/mysite/admin/project/update', 'name' => 'admin.update', 'action' => [AdminController::class, 'update'], 'method' => 'post', 'middleware' => [IsAuthenticated::class, HasValidSession::class]],
    ['url' => '/mysite/admin/project/delete', 'name' => 'admin.delete', 'action' => [AdminController::class, 'destroy'], 'method' => 'get', 'middleware' => [IsAuthenticated::class, HasValidSession::class]],

    // Admin Service Area.
    ['url' => '/mysite/admin/service', 'name' => 'admin.service.index', 'action' => [ServiceController::class, 'index'], 'method' => 'get', 'middleware' => [IsAuthenticated::class, HasValidSession::class]],
    ['url' => '/mysite/admin/service/store', 'name' => 'admin.service.store', 'action' => [ServiceController::class, 'store'], 'method' => 'post', 'middleware' => [IsAuthenticated::class, HasValidSession::class]],
    ['url' => '/mysite/admin/service/edit', 'name' => 'admin.service.edit', 'action' => [ServiceController::class, 'edit'], 'method' => 'get', 'middleware' => [IsAuthenticated::class, HasValidSession::class]],
    ['url' => '/mysite/admin/service/update', 'name' => 'admin.service.update', 'action' => [ServiceController::class, 'update'], 'method' => 'post', 'middleware' => [IsAuthenticated::class, HasValidSession::class]],
    ['url' => '/mysite/admin/service/delete', 'name' => 'admin.service.delete', 'action' => [ServiceController::class, 'destroy'], 'method' => 'get', 'middleware' => [IsAuthenticated::class, HasValidSession::class]],
];
