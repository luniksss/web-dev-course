CREATE TABLE post
(
   `id`      INT NOT NULL AUTO_INCREMENT,
   `title`        VARCHAR(255) NOT NULL,
   `subtitle`     VARCHAR(255) NOT NULL,
   `content` TEXT NOT NULL,
	`author` VARCHAR(255),
	`author_url` VARCHAR(255),
   `author_image` VARCHAR(255),
	`data` VARCHAR(255),
	`image` VARCHAR(255),
	`featured` TINYINT(1) DEFAULT 0,
   PRIMARY KEY (`id`)
)