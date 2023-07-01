-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jun 21, 2023 at 08:42 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ceitonlinepaymentdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(40) DEFAULT NULL,
  `admin_email` varchar(40) DEFAULT NULL,
  `admin_pass` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`) VALUES
(1, 'Ahrrol Cervantes', 'ahrrol.cervantes@csucc.edu.ph', '12345'),
(2, 'Nikki Autor', 'nikki.autor@csucc.edu.ph', '54321');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `login_id` int(11) NOT NULL,
  `login_date` datetime DEFAULT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`login_id`, `login_date`, `admin_id`) VALUES
(1, '0000-00-00 00:00:00', 1),
(2, '0000-00-00 00:00:00', 1),
(3, '0000-00-00 00:00:00', 2),
(4, '0000-00-00 00:00:00', 2),
(5, '0000-00-00 00:00:00', 1),
(6, '0000-00-00 00:00:00', 1),
(7, '0000-00-00 00:00:00', 1),
(8, '0000-00-00 00:00:00', 1),
(9, '0000-00-00 00:00:00', 2),
(10, '0000-00-00 00:00:00', 2),
(11, '0000-00-00 00:00:00', 2),
(12, '0000-00-00 00:00:00', 1),
(13, '0000-00-00 00:00:00', 2),
(14, '0000-00-00 00:00:00', 1),
(15, '0000-00-00 00:00:00', 1),
(16, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_logout`
--

CREATE TABLE `admin_logout` (
  `logout_id` int(11) NOT NULL,
  `logout_date` datetime DEFAULT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_logout`
--

INSERT INTO `admin_logout` (`logout_id`, `logout_date`, `admin_id`) VALUES
(1, '0000-00-00 00:00:00', 1),
(2, '0000-00-00 00:00:00', 1),
(3, '0000-00-00 00:00:00', 2),
(4, '0000-00-00 00:00:00', 1),
(5, '0000-00-00 00:00:00', 1),
(6, '0000-00-00 00:00:00', 1),
(7, '0000-00-00 00:00:00', 1),
(8, '0000-00-00 00:00:00', 2),
(9, '0000-00-00 00:00:00', 2),
(10, '0000-00-00 00:00:00', 2),
(11, '0000-00-00 00:00:00', 2),
(12, '0000-00-00 00:00:00', 1),
(13, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `bill_id` int(11) NOT NULL,
  `bill_description` varchar(100) DEFAULT NULL,
  `bill_amount` int(11) DEFAULT NULL,
  `bill_publish` datetime DEFAULT NULL,
  `bill_deadline` date DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '1=paid,\r\n0=notpaid',
  `admin_id` int(11) NOT NULL,
  `student_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`bill_id`, `bill_description`, `bill_amount`, `bill_publish`, `bill_deadline`, `status`, `admin_id`, `student_id`) VALUES
(41, 'Sites Membership Fee', 50, '2023-06-20 00:32:27', '2023-06-30', 0, 1, 1),
(44, 'Sites Membership Fee', 50, '2023-06-20 00:32:27', '2023-06-30', 1, 1, 4),
(45, 'Sites Membership Fee', 50, '2023-06-20 00:32:27', '2023-06-30', 0, 1, 5),
(46, 'Sites Membership Fee', 50, '2023-06-20 00:32:27', '2023-06-30', 0, 1, 6),
(47, 'Sites Membership Fee', 50, '2023-06-20 00:32:27', '2023-06-30', 0, 1, 7),
(49, 'Sites Membership Fee', 50, '2023-06-20 00:37:11', '2023-06-27', 0, 2, 8),
(50, 'PTA Fee', 200, '2023-06-20 00:37:29', '2023-06-21', 0, 2, 1),
(53, 'PTA Fee', 200, '2023-06-20 00:37:29', '2023-06-21', 1, 2, 4),
(54, 'PTA Fee', 200, '2023-06-20 00:37:29', '2023-06-21', 0, 2, 5),
(55, 'PTA Fee', 200, '2023-06-20 00:37:29', '2023-06-21', 0, 2, 6),
(56, 'PTA Fee', 200, '2023-06-20 00:37:29', '2023-06-21', 0, 2, 7),
(57, 'PTA Fee', 200, '2023-06-20 00:37:29', '2023-06-21', 0, 2, 8),
(58, 'College Fee', 300, '2023-06-20 00:38:32', '2023-06-23', 0, 2, 1),
(61, 'College Fee', 300, '2023-06-20 00:38:32', '2023-06-23', 1, 2, 4),
(62, 'College Fee', 300, '2023-06-20 00:38:32', '2023-06-23', 0, 2, 5),
(63, 'College Fee', 300, '2023-06-20 00:38:32', '2023-06-23', 0, 2, 6),
(64, 'College Fee', 300, '2023-06-20 00:38:32', '2023-06-23', 0, 2, 7),
(65, 'College Fee', 300, '2023-06-20 00:38:32', '2023-06-23', 0, 2, 8),
(66, 'ceit department shirt', 500, '2023-06-20 00:39:08', '2023-06-21', 0, 2, 1),
(69, 'ceit department shirt', 500, '2023-06-20 00:39:08', '2023-06-21', 1, 2, 4),
(70, 'ceit department shirt', 500, '2023-06-20 00:39:08', '2023-06-21', 0, 2, 5),
(71, 'ceit department shirt', 500, '2023-06-20 00:39:08', '2023-06-21', 0, 2, 6),
(72, 'ceit department shirt', 500, '2023-06-20 00:39:08', '2023-06-21', 0, 2, 7),
(73, 'ceit department shirt', 500, '2023-06-20 00:39:08', '2023-06-21', 0, 2, 8),
(74, 'Additional Fees', 10, '2023-06-20 00:39:38', '2023-06-20', 0, 2, 1),
(77, 'Additional Fees', 10, '2023-06-20 00:39:38', '2023-06-20', 0, 2, 4),
(78, 'Additional Fees', 10, '2023-06-20 00:39:38', '2023-06-20', 0, 2, 5),
(79, 'Additional Fees', 10, '2023-06-20 00:39:38', '2023-06-20', 0, 2, 6),
(80, 'Additional Fees', 10, '2023-06-20 00:39:38', '2023-06-20', 0, 2, 7),
(81, 'Additional Fees', 10, '2023-06-20 00:39:38', '2023-06-20', 0, 2, 8),
(82, 'College Fee', 300000, '2023-06-20 10:26:21', '2023-06-20', 0, 2, 9),
(83, 'College Fee', 300900, '2023-06-20 10:46:53', '2023-06-21', 1, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

CREATE TABLE `student_login` (
  `login_id` int(11) NOT NULL,
  `login_date` datetime DEFAULT NULL,
  `student_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_login`
--

INSERT INTO `student_login` (`login_id`, `login_date`, `student_id`) VALUES
(1, '2023-06-17 01:06:19', 1),
(2, '2023-06-17 01:06:38', 1),
(7, '2023-06-17 12:34:41', 4),
(8, '2023-06-19 02:17:28', 5),
(9, '2023-06-19 14:43:19', 6),
(10, '2023-06-19 16:35:12', 7),
(11, '2023-06-19 23:42:39', 8),
(12, '2023-06-20 00:01:04', 6),
(13, '2023-06-20 07:44:00', 4),
(14, '2023-06-20 10:25:32', 9),
(15, '2023-06-20 10:45:04', 10),
(16, '2023-06-21 02:17:22', 4),
(17, '2023-06-21 02:53:29', 4),
(18, '2023-06-21 02:54:48', 4),
(19, '2023-06-21 10:16:55', 10),
(20, '2023-06-21 10:36:54', 9),
(21, '2023-06-21 10:42:01', 4),
(22, '2023-06-21 10:49:10', 4),
(23, '2023-06-21 11:21:05', 4);

-- --------------------------------------------------------

--
-- Table structure for table `student_logout`
--

CREATE TABLE `student_logout` (
  `logout_id` int(11) NOT NULL,
  `logout_date` datetime DEFAULT NULL,
  `student_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_logout`
--

INSERT INTO `student_logout` (`logout_id`, `logout_date`, `student_id`) VALUES
(1, '2023-06-17 01:06:33', 1),
(2, '2023-06-17 01:09:34', 1),
(6, '2023-06-17 12:35:38', 4),
(7, '2023-06-19 13:47:56', 5),
(8, '2023-06-19 15:59:15', 6),
(9, '2023-06-19 23:41:14', 7),
(10, '2023-06-19 23:59:48', 8),
(11, '2023-06-20 00:45:09', 6),
(12, '2023-06-20 08:38:49', 4),
(13, '2023-06-20 10:40:28', 9),
(14, '2023-06-21 02:15:28', 10),
(15, '2023-06-21 02:53:18', 4),
(16, '2023-06-21 10:16:30', 4),
(17, '2023-06-21 10:17:00', 10),
(18, '2023-06-21 10:40:49', 9),
(19, '2023-06-21 11:10:01', 4);

-- --------------------------------------------------------

--
-- Table structure for table `student_signup`
--

CREATE TABLE `student_signup` (
  `student_id` int(15) NOT NULL,
  `student_fname` varchar(100) NOT NULL,
  `student_lname` varchar(100) NOT NULL,
  `student_schoolid` varchar(100) NOT NULL,
  `student_program` varchar(100) NOT NULL,
  `student_yearlevel` varchar(100) NOT NULL,
  `student_gender` varchar(100) NOT NULL,
  `student_address` varchar(250) NOT NULL,
  `student_email` varchar(100) NOT NULL,
  `student_password` varchar(250) NOT NULL,
  `student_created` datetime NOT NULL,
  `student_mobilenumber` varchar(100) DEFAULT NULL,
  `profile_picture` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_signup`
--

INSERT INTO `student_signup` (`student_id`, `student_fname`, `student_lname`, `student_schoolid`, `student_program`, `student_yearlevel`, `student_gender`, `student_address`, `student_email`, `student_password`, `student_created`, `student_mobilenumber`, `profile_picture`) VALUES
(1, 'admin', 'administrator', '2021-2021', 'Bachelor of Science in Information Technology', '5th Year', 'Male', 'Secret City', 'admin@csucc.edu.ph', 'admin123', '2023-06-17 01:06:13', '09123456789', NULL),
(4, 'Jasper', 'Cabodbod', '2021-0266', 'Bachelor of Science in Information Technology', '2nd Year', 'Male', 'P1 Galaxy Banza, Butuan City', 'jasper.cabodbod@csucc.edu.ph', 'jasper123', '2023-06-17 12:34:30', '09631283986', 'jasper.jpg'),
(5, 'Carl Anthony ', 'Nolasco', '2023-1086', 'Bachelor of Science in Information Technology', '1st Year', 'Male', 'Manapa, Buenavista, Agusan del Norte', 'carlanthony.nolasco@csucc.edu.ph', 'carltoni', '2023-06-19 02:16:51', '09158587694', NULL),
(6, 'Jasper', 'Autor', '2021-2023', 'Bachelor of Science in Information Technology', '2nd Year', 'Male', 'Purok 3, Baranggay 3, Cagampang St. Buenavista, Agusan del Norte', 'jasper.autor@csucc.edu.ph', 'qweasd123', '2023-06-19 14:43:11', '09158585690', NULL),
(7, 'Ahrrol Monzon', 'Cervantes', '2021-0026', 'Diploma in Computer Technology', '2nd Year', 'Male', 'santiago, pangaylan', 'ahrrolmonzon.cervantes@csucc.edu.ph', 'ahrrol123', '2023-06-19 16:34:57', '09246872056', 'ahrrol.jpg'),
(8, 'Jason Arvin', 'Cardona', '2021-0834', 'Bachelor of Science in Electrical Engineering Technology', '4th Year', 'Male', 'Purok 3, Calamba, Cabadbaran City', 'jasonarvin.cardona@csucc.edu.ph', 'jason123', '2023-06-19 23:42:28', '09058585698', NULL),
(9, 'Jaymar', 'Losdoce', '2021-0286', 'Diploma in Computer Technology', '3rd Year', 'Male', 'Sabang Dike, Magallanes USA', 'jungkook.losdoce@csucc.edu.ph', 'jungkook123', '2023-06-20 10:25:19', '09501987678', NULL),
(10, 'Jaymar', 'salas', '2021-0201', 'Bachelor of Science in Information Technology', '2nd Year', 'Male', 'brgy. 1, Sabang Cabiltes', 'jaymar.salas@csucc.edu.ph', 'abcde12345', '2023-06-20 10:44:44', '09385430994', 'ahrrol.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `transaction_description` varchar(100) DEFAULT NULL,
  `transaction_amount` int(11) DEFAULT NULL,
  `transaction_deadline` date DEFAULT NULL,
  `transaction_datepaid` datetime DEFAULT NULL,
  `transaction_referenceno` varchar(40) DEFAULT NULL,
  `transaction_paymentmethod` varchar(40) DEFAULT NULL,
  `student_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `transaction_description`, `transaction_amount`, `transaction_deadline`, `transaction_datepaid`, `transaction_referenceno`, `transaction_paymentmethod`, `student_id`) VALUES
(10, 'College Fee', 300, '2023-06-21', '2023-06-19 14:43:57', '300325461562', 'GCASH', 6),
(11, 'Panaghigala Fee', 300, '2023-06-30', '2023-06-20 00:01:27', '3003254615623', 'GCASH', 6),
(13, 'College Fee', 300, '2023-06-23', '2023-06-21 10:42:50', '30032546156233', 'GCASH', 4),
(14, 'ceit department shirt', 500, '2023-06-21', '2023-06-21 10:55:16', '300325461562322', 'GCASH', 4),
(15, 'PTA Fee', 200, '2023-06-21', '2023-06-21 11:05:32', '55', 'GCASH', 4),
(16, 'Sites Membership Fee', 50, '2023-06-30', '2023-06-21 11:54:26', '111', 'GCASH', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`login_id`),
  ADD KEY `admin_admin_login` (`admin_id`);

--
-- Indexes for table `admin_logout`
--
ALTER TABLE `admin_logout`
  ADD PRIMARY KEY (`logout_id`),
  ADD KEY `admin_admin_logout` (`admin_id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `admin_bills` (`admin_id`),
  ADD KEY `student_signup_bills` (`student_id`);

--
-- Indexes for table `student_login`
--
ALTER TABLE `student_login`
  ADD PRIMARY KEY (`login_id`),
  ADD KEY `student_signup_student_login` (`student_id`);

--
-- Indexes for table `student_logout`
--
ALTER TABLE `student_logout`
  ADD PRIMARY KEY (`logout_id`),
  ADD KEY `student_signup_student_logout` (`student_id`);

--
-- Indexes for table `student_signup`
--
ALTER TABLE `student_signup`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `student_signup_transactions` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `admin_logout`
--
ALTER TABLE `admin_logout`
  MODIFY `logout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `student_login`
--
ALTER TABLE `student_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `student_logout`
--
ALTER TABLE `student_logout`
  MODIFY `logout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `student_signup`
--
ALTER TABLE `student_signup`
  MODIFY `student_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD CONSTRAINT `admin_admin_login` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `admin_logout`
--
ALTER TABLE `admin_logout`
  ADD CONSTRAINT `admin_admin_logout` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `admin_bills` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `student_signup_bills` FOREIGN KEY (`student_id`) REFERENCES `student_signup` (`student_id`);

--
-- Constraints for table `student_login`
--
ALTER TABLE `student_login`
  ADD CONSTRAINT `student_signup_student_login` FOREIGN KEY (`student_id`) REFERENCES `student_signup` (`student_id`);

--
-- Constraints for table `student_logout`
--
ALTER TABLE `student_logout`
  ADD CONSTRAINT `student_signup_student_logout` FOREIGN KEY (`student_id`) REFERENCES `student_signup` (`student_id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `student_signup_transactions` FOREIGN KEY (`student_id`) REFERENCES `student_signup` (`student_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
