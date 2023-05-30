
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE ceit;

CREATE TABLE user_info (
    `id` INT(11) NOT NULL PRIMARY KEY,
    `school_id` VARCHAR(11) NOT NULL UNIQUE,
    `lastname` VARCHAR(250) NOT NULL,
    `firstname` VARCHAR(250) NOT NULL,
    `sex` VARCHAR(10) NOT NULL,
    `program` VARCHAR(50) NOT NULL,
    `phonenumber` NOT NULL
    `address` VARCHAR(250) NOT NULL, 
    `email` VARCHAR(50) NOT NULL UNIQUE,
    `password` VARCHAR(250) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user_info` (`id`,`school_id`,`lastname`,`firstname`, `sex`, `program`, `guardian_name`) 
VALUES (1, `2021-1296`, `Autor`, `Christian Kyle`, 'Male', 'Bachelor of Science in Information Technology','Jee Ann Guinsod')

--year
--section
--relationship to sender
--proof receipt
--reference number


