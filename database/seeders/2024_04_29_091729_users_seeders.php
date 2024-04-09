<?php

$algo = include_once __DIR__ . '/../../config/auth.php';

$hashedPassword = password_hash('password', $algo['algo']);

return ["
INSERT INTO `users` (name, email, password) VALUES ('user', 'user@gmail.com', '$hashedPassword');
"];