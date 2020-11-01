-- Recent additions to add after db init (.gz)
-- mysql yaamp -p < file.sql

 -- add blocks for solo function

ALTER TABLE `blocks` ADD `solo` TINYINT(1) NULL DEFAULT NULL AFTER `category`;
