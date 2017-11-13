-- the database name is group10 
CREATE DATABASE IF NOT EXISTS group10;


USE group10;

CREATE TABLE IF NOT EXISTS `lists` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `description` TEXT DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `UserID`(`user_id` ASC),
  CONSTRAINT `user_id` FOREIGN KEY(`user_id`) REFERENCES `group10`.`users`(`id`) ON DELETE RESTRICT ON UPDATE CASCADE 
);
