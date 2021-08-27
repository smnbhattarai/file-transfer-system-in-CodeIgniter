-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 27, 2021 at 06:18 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scratch`
--

-- --------------------------------------------------------

--
-- Table structure for table `file_transfers`
--

DROP TABLE IF EXISTS `file_transfers`;
CREATE TABLE IF NOT EXISTS `file_transfers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `file_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sender_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `receiver_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploader_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

DROP TABLE IF EXISTS `offices`;
CREATE TABLE IF NOT EXISTS `offices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `office_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `office_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `office_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `office_name`, `office_address`, `office_phone`, `created_at`) VALUES
(1, 'Head Office', 'Address', '1256532', '2018-01-17 11:42:29'),
(2, 'Demo Office', 'Demo address', '1234567', '2018-01-18 14:33:32');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `name`, `value`) VALUES
(1, 'office_name', 'Demo Office'),
(2, 'office_address', 'Address'),
(3, 'office_phone', '9876543210');

-- --------------------------------------------------------

--
-- Table structure for table `upload_records`
--

DROP TABLE IF EXISTS `upload_records`;
CREATE TABLE IF NOT EXISTS `upload_records` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `last_login`, `created_at`) VALUES
(1, 'Demo', 'Admin', 'admin@demouser.com', '1619d7adc23f4f633f11014d2f22b7d8', NULL, '2018-01-17 10:30:20'),
(2, 'Demo', 'Manager', 'manager@demouser.com', '1619d7adc23f4f633f11014d2f22b7d8', NULL, '2018-01-17 11:43:22'),
(3, 'Demo', 'User', 'user@demouser.com', '1619d7adc23f4f633f11014d2f22b7d8', '2021-08-27 00:29:46', '2021-08-27 05:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

DROP TABLE IF EXISTS `user_level`;
CREATE TABLE IF NOT EXISTS `user_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_level_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_level_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id`, `user_level_name`, `user_level_slug`, `created_at`) VALUES
(1, 'Super Admin', 'super_admin', '2018-01-17 10:23:05'),
(2, 'Manager', 'manager', '2018-01-17 10:23:05'),
(3, 'User', 'user', '2018-01-17 10:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `user_office`
--

DROP TABLE IF EXISTS `user_office`;
CREATE TABLE IF NOT EXISTS `user_office` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `office_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_office`
--

INSERT INTO `user_office` (`id`, `user_id`, `office_id`, `created_at`) VALUES
(1, 2, 1, '2018-01-17 11:43:22'),
(2, 3, 2, '2021-08-27 05:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_previlage`
--

DROP TABLE IF EXISTS `user_previlage`;
CREATE TABLE IF NOT EXISTS `user_previlage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_level` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_previlage`
--

INSERT INTO `user_previlage` (`id`, `user_id`, `user_level`, `created_at`) VALUES
(1, 1, 1, '2018-01-17 10:31:43'),
(2, 2, 2, '2018-01-17 11:43:22'),
(3, 3, 3, '2021-08-27 05:59:30');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
