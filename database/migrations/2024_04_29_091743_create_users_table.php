<?php

return "
CREATE TABLE `users`
(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `updated_at` timestamp,
    `created_at` timestamp DEFAULT CURRENT_TIMESTAMP(),
    PRIMARY KEY (`id`)
);";