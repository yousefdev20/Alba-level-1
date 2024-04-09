<?php

return "
CREATE TABLE `projects_services`
(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `project_id` int(11) NOT NULL,
    `service_id` int(11) NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`project_id`) REFERENCES `projects`(`id`),
    FOREIGN KEY (`service_id`) REFERENCES `services`(`id`)
);";