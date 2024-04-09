<?php

include_once __DIR__ . '/../../system/Core/Database/Connection.php';

$connection = (new Connection())->init();

$seeders = [
    '2024_04_27_091719_services_seeders.php',
    '2024_04_29_091729_users_seeders.php',
    '2024_04_27_091729_projects_seeders.php',
    '2024_04_27_091719_portfolios_services_seeders.php',
    '2024_04_29_091729_users_seeders.php'
];

foreach ($seeders as $seeder) {
    $queries = include_once $seeder;

    foreach ($queries as $query) {
        mysqli_query($connection, $query);
    }
}