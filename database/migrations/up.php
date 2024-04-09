<?php

include_once __DIR__ . '/../../system/Core/Database/Connection.php';

$connection = (new Connection())->init();

mysqli_query($connection, "SET FOREIGN_KEY_CHECKS = 0;");

$migrations = [
    ['table' => 'projects', 'file' => '2024_04_27_091739_create_projects_table.php'],
    ['table' => 'services', 'file' => '2024_04_27_091742_create_services_table.php'],
    ['table' => 'projects_services', 'file' => '2024_04_27_091743_create_projects_services_table.php'],
    ['table' => 'users', 'file' => '2024_04_29_091743_create_users_table.php'],
];

foreach ($migrations as $migration) {
    $query = include_once $migration['file'];

    $table = $migration['table'];
    mysqli_query($connection, "DROP TABLE IF EXISTS `$table`");

    mysqli_query($connection, $query);
}

mysqli_query($connection, "SET FOREIGN_KEY_CHECKS = 1;");