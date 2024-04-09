<?php

return "
CREATE TABLE `projects`
(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `image` varchar(255) NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `description` TEXT,
    `updated_at` timestamp,
    `created_at` timestamp DEFAULT CURRENT_TIMESTAMP(),
    PRIMARY KEY (`id`)
);";