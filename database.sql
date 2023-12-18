DROP TABLE IF EXISTS `entries`;
DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `username` varchar(255) NOT NULL,
    `account_name` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `user_type` ENUM('owner', 'admin', 'user') NOT NULL DEFAULT 'user',
    `avatar` varchar(255) NOT NULL DEFAULT 'default_avatar.png',
    `banner` varchar(255) NOT NULL DEFAULT 'default_banner.png',
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

CREATE TABLE `password_resets` (
    `email` varchar(255) NOT NULL,
    `token` varchar(255) NOT NULL,
    `created_at` datetime NOT NULL
);

CREATE TABLE `follows` {
    `follower_id` int(12) NOT NULL,
    `following_id` int(12) NOT NULL,
    `status` ENUM(`accepted`, `pending`) NOT NULL,
    PRIMARY KEY (`follower_id`, `following_id`),
    FOREIGN KEY `follower_id` REFERENCES users(id),
    FOREIGN KEY `following_id` REFERENCES users(id)
};

