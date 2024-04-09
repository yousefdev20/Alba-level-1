<?php

return "
CREATE TABLE `services`
(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `section` varchar(255) NOT NULL,
    `title` varchar(255) NOT NULL,
    `image` varchar(255) NOT NULL,
    `description` TEXT,
    `updated_at`  timestamp,
    `created_at`  timestamp DEFAULT CURRENT_TIMESTAMP(),
    PRIMARY KEY (`id`)
);
";