# ---------------------------------------------------------------------- #
# Script generated with: DeZign for Databases 13.0.3                     #
# Target DBMS:           MySQL 8                                         #
# Project file:          CEIT online payment                             #
# Project name:                                                          #
# Author:                                                                #
# Script type:           Database creation script                        #
# Created on:            2023-05-25 23:49                                #
# ---------------------------------------------------------------------- #


# ---------------------------------------------------------------------- #
# Add tables                                                             #
# ---------------------------------------------------------------------- #

# ---------------------------------------------------------------------- #
# Add table "PROGRAM"                                                    #
# ---------------------------------------------------------------------- #

CREATE TABLE `PROGRAM` (
    `prog_code` INTEGER NOT NULL AUTO_INCREMENT,
    `prog_name` VARCHAR(40),
    CONSTRAINT `PK_PROGRAM` PRIMARY KEY (`prog_code`)
);

# ---------------------------------------------------------------------- #
# Add table "ADMINISTRATOR"                                              #
# ---------------------------------------------------------------------- #

CREATE TABLE `ADMINISTRATOR` (
    `admin_ID` INTEGER NOT NULL AUTO_INCREMENT,
    `admin_fname` VARCHAR(40),
    `admin_lname` VARCHAR(40),
    `admin_address` VARCHAR(40),
    `admin_contactNo` VARCHAR(40),
    `prog_code` INTEGER,
    CONSTRAINT `PK_ADMINISTRATOR` PRIMARY KEY (`admin_ID`)
);

# ---------------------------------------------------------------------- #
# Add table "YEAR LEVEL"                                                 #
# ---------------------------------------------------------------------- #

CREATE TABLE `YEAR LEVEL` (
    `lvl_id` INTEGER NOT NULL AUTO_INCREMENT,
    `lvl_lvlname` VARCHAR(40),
    CONSTRAINT `PK_YEAR LEVEL` PRIMARY KEY (`lvl_id`)
);

# ---------------------------------------------------------------------- #
# Add table "PAYMENT METHOD"                                             #
# ---------------------------------------------------------------------- #

CREATE TABLE `PAYMENT METHOD` (
    `pay_id` INTEGER NOT NULL AUTO_INCREMENT,
    `pay_name` VARCHAR(40),
    CONSTRAINT `PK_PAYMENT METHOD` PRIMARY KEY (`pay_id`)
);

# ---------------------------------------------------------------------- #
# Add table "BILL"                                                       #
# ---------------------------------------------------------------------- #

CREATE TABLE `BILL` (
    `bill_code` INTEGER NOT NULL AUTO_INCREMENT,
    `bill_type` VARCHAR(40),
    `bill_name` VARCHAR(40),
    `admin_ID` INTEGER,
    CONSTRAINT `PK_BILL` PRIMARY KEY (`bill_code`)
);

# ---------------------------------------------------------------------- #
# Add table "STUD_USERNAME & PASSWORD"                                   #
# ---------------------------------------------------------------------- #

CREATE TABLE `STUD_USERNAME & PASSWORD` (
    `user_email` VARCHAR(40) NOT NULL,
    `users_pass` VARCHAR(40),
    CONSTRAINT `PK_STUD_USERNAME & PASSWORD` PRIMARY KEY (`user_email`)
);

# ---------------------------------------------------------------------- #
# Add table "PAYMENT ADMIN"                                              #
# ---------------------------------------------------------------------- #

CREATE TABLE `PAYMENT ADMIN` (
    `payID_id` INTEGER NOT NULL AUTO_INCREMENT,
    `pay_id` INTEGER,
    `admin_ID` INTEGER,
    CONSTRAINT `PK_PAYMENT ADMIN` PRIMARY KEY (`payID_id`)
);

# ---------------------------------------------------------------------- #
# Add table "STUDENT SIGN-UP"                                            #
# ---------------------------------------------------------------------- #

CREATE TABLE `STUDENT SIGN-UP` (
    `stud_id` INTEGER NOT NULL AUTO_INCREMENT,
    `stud_fname` VARCHAR(40),
    `stud_lname` VARCHAR(40),
    `stud_contactNo` VARCHAR(40),
    `stud_gender` VARCHAR(40),
    `stud_address` VARCHAR(40),
    `prog_code` INTEGER,
    `lvl_id` INTEGER,
    `user_email` VARCHAR(40),
    CONSTRAINT `PK_STUDENT SIGN-UP` PRIMARY KEY (`stud_id`)
);

# ---------------------------------------------------------------------- #
# Add table "STUDENT SIGN-UP_BILL"                                       #
# ---------------------------------------------------------------------- #

CREATE TABLE `STUDENT SIGN-UP_BILL` (
    `stud_id` INTEGER NOT NULL,
    `bill_code` INTEGER NOT NULL,
    `pay_id` INTEGER,
    CONSTRAINT `PK_STUDENT SIGN-UP_BILL` PRIMARY KEY (`stud_id`, `bill_code`)
);

# ---------------------------------------------------------------------- #
# Add table "PAID LIST"                                                  #
# ---------------------------------------------------------------------- #

CREATE TABLE `PAID LIST` (
    `list_id` INTEGER NOT NULL AUTO_INCREMENT,
    `stud_id` INTEGER,
    `bill_code` INTEGER,
    PRIMARY KEY (`list_id`)
);

# ---------------------------------------------------------------------- #
# Add foreign key constraints                                            #
# ---------------------------------------------------------------------- #

ALTER TABLE `STUDENT SIGN-UP` ADD CONSTRAINT `PROGRAM_STUDENT SIGN-UP` 
    FOREIGN KEY (`prog_code`) REFERENCES `PROGRAM` (`prog_code`);

ALTER TABLE `STUDENT SIGN-UP` ADD CONSTRAINT `YEAR LEVEL_STUDENT SIGN-UP` 
    FOREIGN KEY (`lvl_id`) REFERENCES `YEAR LEVEL` (`lvl_id`);

ALTER TABLE `STUDENT SIGN-UP` ADD CONSTRAINT `STUD_USERNAME & PASSWORD_STUDENT SIGN-UP` 
    FOREIGN KEY (`user_email`) REFERENCES `STUD_USERNAME & PASSWORD` (`user_email`);

ALTER TABLE `ADMINISTRATOR` ADD CONSTRAINT `PROGRAM_ADMINISTRATOR` 
    FOREIGN KEY (`prog_code`) REFERENCES `PROGRAM` (`prog_code`);

ALTER TABLE `BILL` ADD CONSTRAINT `ADMINISTRATOR_BILL` 
    FOREIGN KEY (`admin_ID`) REFERENCES `ADMINISTRATOR` (`admin_ID`);

ALTER TABLE `PAYMENT ADMIN` ADD CONSTRAINT `PAYMENT METHOD_PAYMENT ADMIN` 
    FOREIGN KEY (`pay_id`) REFERENCES `PAYMENT METHOD` (`pay_id`);

ALTER TABLE `PAYMENT ADMIN` ADD CONSTRAINT `ADMINISTRATOR_PAYMENT ADMIN` 
    FOREIGN KEY (`admin_ID`) REFERENCES `ADMINISTRATOR` (`admin_ID`);

ALTER TABLE `PAID LIST` ADD CONSTRAINT `STUDENT SIGN-UP_BILL_PAID LIST` 
    FOREIGN KEY (`stud_id`, `bill_code`) REFERENCES `STUDENT SIGN-UP_BILL` (`stud_id`,`bill_code`);

ALTER TABLE `STUDENT SIGN-UP_BILL` ADD CONSTRAINT `STUDENT SIGN-UP_STUDENT SIGN-UP_BILL` 
    FOREIGN KEY (`stud_id`) REFERENCES `STUDENT SIGN-UP` (`stud_id`);

ALTER TABLE `STUDENT SIGN-UP_BILL` ADD CONSTRAINT `BILL_STUDENT SIGN-UP_BILL` 
    FOREIGN KEY (`bill_code`) REFERENCES `BILL` (`bill_code`);

ALTER TABLE `STUDENT SIGN-UP_BILL` ADD CONSTRAINT `PAYMENT METHOD_STUDENT SIGN-UP_BILL` 
    FOREIGN KEY (`pay_id`) REFERENCES `PAYMENT METHOD` (`pay_id`);
