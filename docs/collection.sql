CREATE DATABASE IF NOT EXISTS collection_app;

USE collection_app;

DROP TABLE IF EXISTS `paints`;
DROP TABLE IF EXISTS `colours`;
DROP TABLE IF EXISTS `brands`;

CREATE TABLE `colours` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT, 
`name` varchar(255) NOT NULL, 
PRIMARY KEY (`id`)
);

INSERT INTO `colours` (`name`)
VALUES ('Prussian Blue');
INSERT INTO `colours` (`name`)
VALUES ('Permanent Yellow Deep');
INSERT INTO `colours` (`name`)
VALUES ('Scarlet Red');
INSERT INTO `colours` (`name`)
VALUES ('Permanent Green Middle');
INSERT INTO `colours` (`name`)
VALUES ('Viridian Green');
INSERT INTO `colours`(`name`)
VALUES ('Primary Red');


CREATE TABLE `brands` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT, 
`name` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
);

INSERT INTO `brands` (`name`)
VALUES ('Winsor & Newton');
INSERT INTO `brands` (`name`)
VALUES ('Arteza');


CREATE TABLE `paints` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`brand_id` int(11) unsigned,
`colour_id` int(11) unsigned, 
`needs_replacing` tinyint unsigned DEFAULT 0,
`image` varchar(255),
PRIMARY KEY (`id`),
CONSTRAINT `fk_paints_brands` FOREIGN KEY (`brand_id`) REFERENCES `brands`(`id`), 
CONSTRAINT `fk_paints_colours` FOREIGN KEY (`colour_id`) REFERENCES `colours`(`id`)
);

INSERT INTO `paints` (`brand_id`, `colour_id`, `needs_replacing`, `image`)
VALUES (1, 1, 0, 'https://i.ibb.co/wrF5H1P/w-and-n-prussian-blue.png');
INSERT INTO `paints` (`brand_id`, `colour_id`, `needs_replacing`, `image`)
VALUES (2, 1, 0, 'https://i.ibb.co/h8BG0Zt/arteza-prussian-blue.png');
INSERT INTO `paints` (`brand_id`, `colour_id`, `needs_replacing`, `image`)
VALUES (1, 2, 0, 'https://i.ibb.co/G0LrJFF/w-and-n-permanent-yellow-deep.png');
INSERT INTO `paints` (`brand_id`, `colour_id`, `needs_replacing`, `image`)
VALUES (1, 4, 0, 'https://i.ibb.co/SfVhyH7/w-and-n-permanent-green-middle.png');
INSERT INTO `paints` (`brand_id`, `colour_id`, `needs_replacing`, `image`)
VALUES (2, 3, 0, 'https://i.ibb.co/pXQ5FZ8/arteza-scarlet-red.png');
INSERT INTO `paints` (`brand_id`, `colour_id`, `needs_replacing`, `image`)
VALUES (2, 5, 1, 'https://i.ibb.co/mcMM4xr/arteza-viridian-green.png');
INSERT INTO `paints` (`brand_id`, `colour_id`)
VALUES (1, 6);
