DROP TABLE IF EXISTS `entries`;
DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `username` varchar(255) NOT NULL,
    `name` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `user_type` ENUM('owner', 'admin', 'user') NOT NULL DEFAULT 'user',
    `avatar_path` varchar(255) NOT NULL DEFAULT 'default_avatar.png',
    `banner_path` varchar(255) NOT NULL DEFAULT 'default_banner.png',
    `bio` text,
    `private` boolean NOT NULL DEFAULT false,
    `joined_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);

CREATE TABLE `entries` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `user_id` int(11) NOT NULL,
    `title` varchar(255),
    `content` text NOT NULL,
    `media_path` varchar(255),
    `created_at` datetime NOT NULL,
    `updated_at` datetime NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
);
