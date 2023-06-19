# ---------------------------------------------------------------------- #
# Script generated with: DeZign for Databases 13.0.4                     #
# Target DBMS:           MySQL 8                                         #
# Project file:          ceitpaymentonlinedez.dez                        #
# Project name:          ceitpaymentonlinedez                            #
# Author:                                                                #
# Script type:           Database creation script                        #
# Created on:            2023-06-17 00:55                                #
# ---------------------------------------------------------------------- #


# ---------------------------------------------------------------------- #
# Add tables                                                             #
# ---------------------------------------------------------------------- #

# ---------------------------------------------------------------------- #
# Add table "student_signup"                                             #
# ---------------------------------------------------------------------- #

CREATE TABLE `student_signup` (
    `student_id` INTEGER(15) NOT NULL AUTO_INCREMENT,
    `student_fname` VARCHAR(100) NOT NULL,
    `student_lname` VARCHAR(100) NOT NULL,
    `student_schoolid` VARCHAR(100) NOT NULL,
    `student_program` VARCHAR(100) NOT NULL,
    `student_yearlevel` VARCHAR(100) NOT NULL,
    `student_gender` VARCHAR(100) NOT NULL,
    `student_address` VARCHAR(250) NOT NULL,
    `student_email` VARCHAR(100) NOT NULL,
    `student_password` VARCHAR(250) NOT NULL,
    `student_created` DATETIME NOT NULL,
    `student_mobilenumber` VARCHAR(100),
    CONSTRAINT `PK_student_signup` PRIMARY KEY (`student_id`)
);

# ---------------------------------------------------------------------- #
# Add table "student_login"                                              #
# ---------------------------------------------------------------------- #

CREATE TABLE `student_login` (
    `login_id` INTEGER NOT NULL AUTO_INCREMENT,
    `login_date` DATETIME,
    `student_id` INTEGER(15) NOT NULL,
    CONSTRAINT `PK_student_login` PRIMARY KEY (`login_id`)
);

# ---------------------------------------------------------------------- #
# Add table "transactions"                                               #
# ---------------------------------------------------------------------- #



CREATE TABLE `transactions` (
    `transaction_id` INTEGER NOT NULL AUTO_INCREMENT,
    `transaction_description` VARCHAR(100),
    `transaction_amount` INTEGER,
    `transaction_deadline` DATE,
    `transaction_datepaid` DATETIME,
    `transaction_referenceno` VARCHAR(40),
    `transaction_paymentmethod` VARCHAR(40),
    `student_id` INTEGER(15) NOT NULL,
    CONSTRAINT `PK_transactions` PRIMARY KEY (`transaction_id`)
);



# ---------------------------------------------------------------------- #
# Add table "admin"                                                      #
# ---------------------------------------------------------------------- #

CREATE TABLE `admin` (
    `admin_id` INTEGER NOT NULL AUTO_INCREMENT,
    `admin_name` VARCHAR(40),
    `admin_email` VARCHAR(40),
    `admin_pass` VARCHAR(40),
    CONSTRAINT `PK_admin` PRIMARY KEY (`admin_id`)
);

# ---------------------------------------------------------------------- #
# Add table "admin_login"                                                #
# ---------------------------------------------------------------------- #

CREATE TABLE `admin_login` (
    `login_id` INTEGER NOT NULL AUTO_INCREMENT,
    `login_date` DATETIME,
    `admin_id` INTEGER NOT NULL,
    CONSTRAINT `PK_admin_login` PRIMARY KEY (`login_id`)
);

# ---------------------------------------------------------------------- #
# Add table "student_logout"                                             #
# ---------------------------------------------------------------------- #

CREATE TABLE `student_logout` (
    `logout_id` INTEGER NOT NULL AUTO_INCREMENT,
    `logout_date` DATETIME,
    `student_id` INTEGER(15) NOT NULL,
    CONSTRAINT `PK_student_logout` PRIMARY KEY (`logout_id`)
);

# ---------------------------------------------------------------------- #
# Add table "admin_logout"                                               #
# ---------------------------------------------------------------------- #

CREATE TABLE `admin_logout` (
    `logout_id` INTEGER NOT NULL AUTO_INCREMENT,
    `logout_date` DATETIME,
    `admin_id` INTEGER NOT NULL,
    CONSTRAINT `PK_admin_logout` PRIMARY KEY (`logout_id`)
);

# ---------------------------------------------------------------------- #
# Add table "bills"                                                      #
# ---------------------------------------------------------------------- #



CREATE TABLE `bills` (
    `bill_id` INTEGER NOT NULL AUTO_INCREMENT,
    `bill_description` VARCHAR(100),
    `bill_amount` INTEGER,
    `bill_publish` DATETIME,
    `bill_deadline` DATETIME,
    `admin_id` INTEGER NOT NULL,
    `student_id` INTEGER(15) NOT NULL,
    CONSTRAINT `PK_bills` PRIMARY KEY (`bill_id`)
);



# ---------------------------------------------------------------------- #
# Add foreign key constraints                                            #
# ---------------------------------------------------------------------- #

ALTER TABLE `bills` ADD CONSTRAINT `admin_bills` 
    FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

ALTER TABLE `bills` ADD CONSTRAINT `student_signup_bills` 
    FOREIGN KEY (`student_id`) REFERENCES `student_signup` (`student_id`);

ALTER TABLE `student_login` ADD CONSTRAINT `student_signup_student_login` 
    FOREIGN KEY (`student_id`) REFERENCES `student_signup` (`student_id`);

ALTER TABLE `transactions` ADD CONSTRAINT `student_signup_transactions` 
    FOREIGN KEY (`student_id`) REFERENCES `student_signup` (`student_id`);

ALTER TABLE `admin_login` ADD CONSTRAINT `admin_admin_login` 
    FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

ALTER TABLE `student_logout` ADD CONSTRAINT `student_signup_student_logout` 
    FOREIGN KEY (`student_id`) REFERENCES `student_signup` (`student_id`);

ALTER TABLE `admin_logout` ADD CONSTRAINT `admin_admin_logout` 
    FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);
