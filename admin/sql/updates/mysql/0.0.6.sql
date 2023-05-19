DROP TABLE IF EXISTS `#__movieAPI`;

CREATE TABLE `#__movieAPI` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`url` VARCHAR(100) NOT NULL,
	`key` VARCHAR(100) NOT NULL,
	PRIMARY KEY (`id`)
)
	ENGINE=InnoDB
	AUTO_INCREMENT =0
	DEFAULT CHARSET=utf8mb4
	DEFAULT COLLATE=utf8mb4_unicode_ci;


INSERT INTO `#__movieAPI` (`url`, `key`) VALUES
('api.themoviedb.org/3/discover/movie', 'b3d42014ab99493c7373eb7d36b4a2b4');