-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 09, 2023 at 08:26 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sunnyvale`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

DROP TABLE IF EXISTS `amenities`;
CREATE TABLE IF NOT EXISTS `amenities` (
  `amenity_id` int(11) NOT NULL AUTO_INCREMENT,
  `amenity_name` varchar(255) NOT NULL,
  `subdivision_id` int(11) NOT NULL,
  `subdivision_name` varchar(50) NOT NULL,
  `availability` varchar(50) NOT NULL,
  PRIMARY KEY (`amenity_id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`amenity_id`, `amenity_name`, `subdivision_id`, `subdivision_name`, `availability`) VALUES
(1, 'Court', 1, 'Sunnyvale 1', 'Available'),
(4, 'Multi-purpose Hall', 2, 'Sunnyvale 2', 'Available'),
(5, 'Swimming Pool', 1, 'Sunnyvale 1', 'Available'),
(6, 'Clubhouse', 1, 'Sunnyvale 1', 'Unavailable'),
(10, 'Clubhouse', 3, 'Sunnyvale 3', 'Unavailable'),
(16, 'Bathhouse', 1, 'Sunnyvale 1', 'Available'),
(31, 'Court', 4, 'Sunnyvale 4', 'Available'),
(30, 'Court', 2, 'Sunnyvale 2', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `amenity_purpose`
--

DROP TABLE IF EXISTS `amenity_purpose`;
CREATE TABLE IF NOT EXISTS `amenity_purpose` (
  `amenity_purpose_id` int(10) NOT NULL AUTO_INCREMENT,
  `amenity_id` int(10) NOT NULL,
  `amenity_purpose` varchar(100) NOT NULL,
  `day_rate` int(10) NOT NULL,
  `night_rate` int(10) NOT NULL,
  PRIMARY KEY (`amenity_purpose_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `amenity_purpose`
--

INSERT INTO `amenity_purpose` (`amenity_purpose_id`, `amenity_id`, `amenity_purpose`, `day_rate`, `night_rate`) VALUES
(1, 1, 'Basketball', 50, 150),
(3, 1, 'Volleyball', 50, 150),
(5, 5, 'Swimming', 50, 100),
(8, 10, 'Party', 150, 300),
(9, 1, 'Badminton', 50, 150),
(10, 1, 'Chess', 80, 360),
(11, 30, 'Chessboxing', 20, 30),
(12, 30, 'Volleyball', 70, 480);

-- --------------------------------------------------------

--
-- Table structure for table `amenity_renting`
--

DROP TABLE IF EXISTS `amenity_renting`;
CREATE TABLE IF NOT EXISTS `amenity_renting` (
  `amenity_renting_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(10) DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  `renter_name` varchar(255) NOT NULL,
  `subdivision_name` varchar(255) NOT NULL,
  `amenity_name` varchar(255) NOT NULL,
  `amenity_purpose` varchar(255) NOT NULL,
  `date_from` datetime DEFAULT NULL,
  `date_to` datetime DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `cart` varchar(10) NOT NULL,
  PRIMARY KEY (`amenity_renting_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `amenity_renting`
--

INSERT INTO `amenity_renting` (`amenity_renting_id`, `transaction_id`, `user_id`, `renter_name`, `subdivision_name`, `amenity_name`, `amenity_purpose`, `date_from`, `date_to`, `cost`, `cart`) VALUES
(9, NULL, 1, 'Mon Carlo Delima', 'Sunnyvale 1', 'Court', '1', '2023-02-13 01:00:00', '2023-02-13 02:00:00', 50, 'Removed'),
(8, NULL, 1, 'Mon Carlo Delima', 'Sunnyvale 1', 'Court', '1', '2023-02-12 18:00:00', '2023-02-12 21:00:00', 450, 'Removed'),
(7, NULL, 1, 'Mon Carlo Delima', 'Sunnyvale 1', 'Court', '1', '2023-02-15 13:00:00', '2023-02-15 17:00:00', NULL, 'Removed'),
(13, 1, 1, 'Mon Carlo Delima', 'Sunnyvale 1', 'Court', '1', '2023-02-14 09:00:00', '2023-02-14 21:00:00', 900, 'Approved'),
(12, NULL, 1, 'Mon Carlo Delima', 'Sunnyvale 1', 'Court', '1', NULL, NULL, NULL, 'Removed'),
(14, 1, 1, 'Mon Carlo Delima', 'Sunnyvale 1', 'Court', '3', '2023-02-15 09:00:00', '2023-02-15 12:00:00', 150, 'Approved'),
(15, 1, 1, 'Mon Carlo Delima', 'Sunnyvale 1', 'Court', '1', '2023-02-16 18:00:00', '2023-02-16 21:00:00', 450, 'Approved'),
(16, NULL, 1, 'Mon Carlo Delima', 'Sunnyvale 1', 'Court', '1', NULL, NULL, NULL, 'Removed'),
(20, NULL, 48, 'SV1_Treasurer', 'Sunnyvale 1', 'Court', '3', NULL, NULL, NULL, 'Removed'),
(25, 3, 1, 'Mon Carlo Delima', 'Sunnyvale 3', 'Clubhouse', '8', '2023-04-15 01:00:00', '2023-04-15 02:00:00', 150, 'Approved'),
(23, 2, 48, 'SV1_Treasurer', 'Sunnyvale 2', 'Court', '11', '2023-04-08 08:00:00', '2023-04-08 10:00:00', 40, 'Approved'),
(24, 2, 48, 'SV1_Treasurer', 'Sunnyvale 2', 'Court', '12', '2023-04-08 10:00:00', '2023-04-08 12:00:00', 140, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `annual_dues`
--

DROP TABLE IF EXISTS `annual_dues`;
CREATE TABLE IF NOT EXISTS `annual_dues` (
  `annual_dues_id` int(11) NOT NULL AUTO_INCREMENT,
  `subdivision_name` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`annual_dues_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `annual_dues`
--

INSERT INTO `annual_dues` (`annual_dues_id`, `subdivision_name`, `amount`, `updated_at`) VALUES
(1, 'Sunnyvale 1', 200, '2022-11-27'),
(2, 'Sunnyvale 2', 250, '2022-11-27'),
(3, 'Sunnyvale 3', 500, '2022-11-29'),
(4, 'Sunnyvale 4', 350, '2022-11-27'),
(5, 'Sunnyvale 7', 500, '2022-11-27'),
(6, 'Sunnyvale 5', 500, '2022-11-29'),
(7, 'Sunnyvale 5', 300, '2022-11-29'),
(11, 'Sunnyvale 10', 720, '2022-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `audit_trail`
--

DROP TABLE IF EXISTS `audit_trail`;
CREATE TABLE IF NOT EXISTS `audit_trail` (
  `audit_id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `action` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`audit_id`)
) ENGINE=MyISAM AUTO_INCREMENT=907 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `audit_trail`
--

INSERT INTO `audit_trail` (`audit_id`, `user`, `action`, `datetime`) VALUES
(3, 'SV1_Admin', 'logged in', '2022-11-29 12:32:22'),
(5, 'SV1_Admin', 'logged in', '2022-11-29 12:36:16'),
(6, 'SV1_Admin', 'logged out', '2022-11-29 12:36:18'),
(7, 'SV1_Admin', 'logged in', '2022-11-29 12:36:33'),
(14, 'SV1_Admin', 'updated homeowner Mon Carlo Delima', '2022-11-29 12:58:49'),
(13, 'SV1_Admin', 'updated homeowner Mon Carlo Delim', '2022-11-29 12:58:29'),
(12, 'SV1_Admin', 'added homeowner Tristram Hudson', '2022-11-29 12:56:04'),
(17, 'SV1_Admin', 'deactivated user Kyle Andrei Casingal', '2022-11-29 13:08:19'),
(16, 'SV1_Admin', 'activated user Kyle Andrei Casingal', '2022-11-29 13:06:29'),
(18, 'SV1_Admin', 'logged in', '2022-11-29 13:57:18'),
(20, 'SV1_Admin', 'added a new amenity Sunnyvale 1-Bathhouse', '2022-11-29 14:04:34'),
(21, 'SV1_Admin', 'added a new amenity Sunnyvale 1-Bath', '2022-11-29 14:05:41'),
(24, 'SV1_Admin', 'updated an exisiting amenity Sunnyvale 1-Bathhouse', '2022-11-29 14:07:00'),
(25, 'SV1_Admin', 'added a new subdivision Sunnyvale 10 Calumpang', '2022-11-29 14:08:20'),
(26, 'SV1_Admin', 'updated an existing subdivision Sunnyvale 10 Calum', '2022-11-29 14:09:12'),
(27, 'SV1_Admin', 'updated an existing subdivision Sunnyvale 10 Calumpang', '2022-11-29 14:09:22'),
(31, 'SV1_Admin', 'added a new monthly due Sunnyvale 10-50.00', '2022-11-29 14:12:13'),
(32, 'SV1_Admin', 'updated an existing monthly due Sunnyvale 10-720.00', '2022-11-29 14:13:01'),
(33, 'SV1_Admin', 'added a new system account SV1_TreasurerTreasurer', '2022-11-29 14:16:20'),
(34, 'SV1_Admin', 'added a new system account SV2_Admin-Admin', '2022-11-29 14:17:28'),
(35, 'SV1_Admin', 'updated an existing system account SV1_Treasurer-Treasurer', '2022-11-29 14:18:50'),
(36, 'SV1_Admin', 'updated an existing system account SV1_Treasurer-Treasurer', '2022-11-29 14:19:03'),
(37, 'SV1_Admin', 'added a new subdivision officer Chopper-Secretary', '2022-11-29 14:23:46'),
(38, 'SV1_Admin', 'updated an existing subdivision officer Chopper-Treasurer', '2022-11-29 14:24:39'),
(39, 'SV1_Admin', 'logged in', '2022-11-29 14:30:54'),
(40, 'SV1_Admin', 'logged out', '2022-11-29 14:31:38'),
(41, 'Mon Carlo Delima', 'logged in', '2022-11-29 14:31:45'),
(42, 'Mon Carlo Delima', 'logged out', '2022-11-29 14:32:50'),
(43, 'SV1_Admin', 'logged in', '2022-11-29 14:32:54'),
(44, 'SV1_Admin', 'logged out', '2022-11-29 17:47:17'),
(45, 'SV1_Admin', 'logged in', '2022-11-29 17:47:29'),
(46, 'SV1_Admin', 'added homeowner Ralph Monsour Delima', '2022-11-29 17:49:12'),
(47, 'SV1_Admin', 'updated homeowner Ralph Monsour Delima', '2022-11-29 17:49:28'),
(48, 'SV1_Admin', 'logged out', '2022-11-29 17:50:11'),
(49, 'SV1_Admin', 'logged in', '2022-11-29 18:15:44'),
(50, 'SV1_Admin', 'logged out', '2022-11-29 18:16:29'),
(51, 'SV1_Admin', 'logged in', '2022-11-29 21:00:17'),
(52, 'SV1_Admin', 'logged out', '2022-11-29 21:03:43'),
(53, 'SV1_Admin', 'logged in', '2022-11-29 21:03:45'),
(54, 'SV1_Admin', 'logged out', '2022-11-29 21:05:05'),
(55, 'SV1_Admin', 'logged in', '2022-11-29 21:05:07'),
(56, 'SV1_Admin', 'logged out', '2022-11-29 21:06:39'),
(57, 'Mon Carlo Delima', 'logged in', '2022-11-29 21:06:53'),
(58, 'Mon Carlo Delima', 'logged out', '2022-11-29 21:24:55'),
(59, 'Mon Carlo Delima', 'logged in', '2022-11-29 21:24:57'),
(60, 'Mon Carlo Delima', 'logged out', '2022-11-29 21:25:29'),
(61, 'Mon Carlo Delima', 'logged in', '2022-11-29 21:25:31'),
(62, 'Mon Carlo Delima', 'logged out', '2022-11-29 22:11:34'),
(63, 'SV1_Admin', 'logged in', '2022-11-29 22:11:37'),
(64, 'SV1_Admin', 'logged in', '2022-11-29 23:10:34'),
(65, 'SV1_Admin', 'updated an exisiting amenity Sunnyvale 1-Basketball Court', '2022-11-30 00:53:48'),
(66, 'SV1_Admin', 'added a new subdivision Sunnyvale 11 Bilibiran', '2022-11-30 00:55:31'),
(67, 'SV1_Admin', 'logged in', '2022-11-30 13:13:52'),
(68, 'SV1_Admin', 'logged out', '2022-11-30 13:15:09'),
(69, 'SV1_Admin', 'logged in', '2022-11-30 13:15:27'),
(70, 'SV1_Admin', 'logged out', '2022-11-30 13:35:15'),
(71, 'SV1_Admin', 'logged in', '2022-11-30 13:42:14'),
(72, 'SV1_Admin', 'logged out', '2022-11-30 13:50:47'),
(73, 'SV1_Admin', 'logged in', '2022-11-30 13:50:54'),
(74, 'SV1_Admin', 'logged in', '2022-11-30 13:51:50'),
(75, 'SV1_Admin', 'logged out', '2022-11-30 15:59:27'),
(76, 'SV1_Admin', 'logged in', '2022-11-30 15:59:51'),
(77, 'SV1_Admin', 'logged out', '2022-11-30 16:00:00'),
(78, 'SV1_Admin', 'logged in', '2022-11-30 16:06:03'),
(79, 'SV1_Admin', 'logged out', '2022-11-30 16:07:52'),
(80, 'SV1_Treasurer', 'logged in', '2022-11-30 16:08:27'),
(81, 'SV1_Treasurer', 'logged out', '2022-11-30 16:17:11'),
(82, 'SV1_Admin', 'logged in', '2022-11-30 16:17:20'),
(83, 'SV1_Admin', 'logged out', '2022-11-30 16:34:42'),
(84, 'SV1_Secretary', 'logged in', '2022-11-30 16:35:05'),
(85, 'SV1_Secretary', 'logged out', '2022-11-30 16:35:42'),
(86, 'SV1_Admin', 'logged in', '2022-11-30 16:35:49'),
(87, 'SV1_Admin', 'logged out', '2022-11-30 16:37:59'),
(88, 'SV1_Admin', 'logged in', '2022-11-30 16:38:08'),
(89, 'SV1_Admin', 'logged out', '2022-11-30 16:48:57'),
(90, 'SV1_Admin', 'logged in', '2022-11-30 16:49:17'),
(91, 'SV1_Admin', 'logged out', '2022-11-30 16:52:09'),
(92, 'SV1_Secretary', 'logged in', '2022-11-30 16:52:22'),
(93, 'SV1_Secretary', 'logged out', '2022-11-30 16:52:35'),
(94, 'SV1_Admin', 'logged in', '2022-11-30 21:55:37'),
(95, 'SV1_Admin', 'logged out', '2022-11-30 23:32:58'),
(96, 'SV1_Admin', 'logged in', '2022-11-30 23:33:06'),
(97, 'SV1_Admin', 'logged out', '2022-11-30 23:40:02'),
(98, 'SV1_Admin', 'logged in', '2022-11-30 23:40:12'),
(99, 'SV1_Admin', 'reserved an amenity', '2022-11-30 23:45:17'),
(100, 'SV1_Admin', 'logged out', '2022-11-30 23:53:02'),
(101, 'SV1_Admin', 'logged in', '2022-11-30 23:59:07'),
(102, 'SV1_Admin', 'logged out', '2022-12-01 00:00:03'),
(103, 'SV1_Admin', 'logged in', '2022-12-01 00:04:39'),
(104, 'SV1_Admin', 'logged out', '2022-12-01 00:05:18'),
(105, 'Mon Carlo Delima', 'logged in', '2022-12-01 00:08:11'),
(106, 'Mon Carlo Delima', 'logged out', '2022-12-01 01:41:29'),
(107, 'SV1_Admin', 'logged in', '2022-12-01 01:41:58'),
(108, 'SV1_Admin', 'logged out', '2022-12-01 01:43:16'),
(109, 'Mon Carlo Delima', 'logged in', '2022-12-01 01:43:26'),
(110, 'Mon Carlo Delima', 'logged out', '2022-12-01 03:14:51'),
(111, 'John Doe', 'logged in', '2022-12-01 03:16:07'),
(112, 'John Doe', 'logged out', '2022-12-01 03:56:21'),
(113, 'Mon Carlo Delima', 'logged in', '2022-12-01 03:56:28'),
(114, 'SV1_Admin', 'logged out', '2022-12-01 06:23:21'),
(115, 'Mon Carlo Delima', 'logged in', '2022-12-01 06:23:30'),
(116, 'Mon Carlo Delima', 'logged out', '2022-12-01 06:23:36'),
(117, 'SV1_Treasurer', 'logged in', '2022-12-01 06:23:55'),
(118, 'SV1_Treasurer', 'logged out', '2022-12-01 06:25:54'),
(119, 'Mon Carlo Delima', 'logged in', '2022-12-01 06:25:57'),
(120, 'Mon Carlo Delima', 'reserved an amenity', '2022-12-01 06:26:26'),
(121, 'Mon Carlo Delima', 'logged out', '2022-12-01 06:26:31'),
(122, 'SV1_Treasurer', 'logged in', '2022-12-01 06:26:35'),
(123, 'SV1_Treasurer', 'logged out', '2022-12-01 06:27:34'),
(124, 'Mon Carlo Delima', 'logged in', '2022-12-01 06:27:37'),
(125, 'Mon Carlo Delima', 'logged out', '2022-12-01 06:28:12'),
(126, 'SV1_Admin', 'logged in', '2022-12-01 06:28:15'),
(127, 'SV1_Admin', 'added homeowner Marco Ivan Sta. Maria', '2022-12-01 06:29:40'),
(128, 'SV1_Admin', 'logged out', '2022-12-01 06:34:43'),
(129, 'Marco Ivan Sta. Maria', 'logged in', '2022-12-01 06:34:50'),
(130, 'Marco Ivan Sta. Maria', 'uploaded a new post', '2022-12-01 06:37:21'),
(131, 'Marco Ivan Sta. Maria', 'logged out', '2022-12-01 06:40:06'),
(132, 'Krishatelene BendaÃ±a', 'logged in', '2022-12-01 06:40:14'),
(133, 'Krishatelene BendaÃ±a', 'logged out', '2022-12-01 06:42:48'),
(134, 'Mon Carlo Delima', 'logged in', '2022-12-01 06:42:53'),
(135, 'Mon Carlo Delima', 'logged out', '2022-12-01 06:42:54'),
(136, 'SV1_Admin', 'logged in', '2022-12-01 06:42:58'),
(137, 'SV1_Admin', 'logged out', '2022-12-01 06:42:59'),
(138, 'Krishatelene BendaÃ±a', 'logged in', '2022-12-01 06:43:06'),
(139, 'Krishtalene BendaÃ±a', 'uploaded a new post', '2022-12-01 06:48:14'),
(140, 'Krishtalene BendaÃ±a', 'uploaded a new post', '2022-12-01 06:48:54'),
(141, 'Krishtalene BendaÃ±a', 'logged out', '2022-12-01 06:49:01'),
(142, 'Marco Ivan Sta. Maria', 'logged in', '2022-12-01 06:49:06'),
(143, 'Marco Ivan Sta. Maria', 'uploaded a new post', '2022-12-01 06:49:23'),
(144, 'Marco Ivan Sta. Maria', 'logged out', '2022-12-01 06:50:03'),
(145, 'Krishtalene BendaÃ±a', 'logged in', '2022-12-01 06:50:06'),
(146, 'Krishtalene BendaÃ±a', 'uploaded a new post', '2022-12-01 06:50:15'),
(147, 'Krishtalene BendaÃ±a', 'logged out', '2022-12-01 06:50:41'),
(148, 'Marco Ivan Sta. Maria', 'logged in', '2022-12-01 06:50:44'),
(149, 'Marco Ivan Sta. Maria', 'uploaded a new post', '2022-12-01 06:51:00'),
(150, 'Marco Ivan Sta. Maria', 'logged out', '2022-12-01 06:51:10'),
(151, 'Marco Ivan Sta. Maria', 'logged in', '2022-12-01 06:53:46'),
(152, 'Marco Ivan Sta. Maria', 'uploaded a new post', '2022-12-01 06:53:50'),
(153, 'Marco Ivan Sta. Maria', 'uploaded a new post', '2022-12-01 06:54:48'),
(154, 'Marco Ivan Sta. Maria', 'uploaded a new post', '2022-12-01 06:55:39'),
(155, 'Marco Ivan Sta. Maria', 'logged out', '2022-12-01 06:59:45'),
(156, 'SV1_Treasurer', 'logged in', '2022-12-01 06:59:50'),
(157, 'SV1_Treasurer', 'logged out', '2022-12-01 07:00:11'),
(158, 'Mon Carlo Delima', 'logged in', '2022-12-01 07:00:14'),
(159, 'Mon Carlo Delima', 'logged out', '2022-12-01 07:00:21'),
(160, 'SV1_Admin', 'logged in', '2022-12-01 08:45:05'),
(161, 'SV1_Admin', 'logged out', '2022-12-01 09:02:26'),
(162, 'John Doe', 'logged in', '2022-12-01 09:02:51'),
(163, 'John Doe', 'logged out', '2022-12-01 09:08:37'),
(164, 'Kyle Andrei Casingal', 'created an account', '2022-12-01 09:10:14'),
(165, 'kylecasingal36@gmail.com', 'verified their email', '2022-12-01 09:10:39'),
(166, 'SV1_Admin', 'logged in', '2022-12-01 09:10:50'),
(167, 'SV1_Admin', 'activated user Kyle Andrei Casingal', '2022-12-01 09:11:02'),
(168, 'SV1_Admin', 'logged out', '2022-12-01 09:11:05'),
(169, 'SV1_Admin', 'logged in', '2022-12-01 09:12:31'),
(170, 'SV1_Admin', 'deactivated user John Doe', '2022-12-01 09:12:59'),
(171, 'SV1_Admin', 'activated user John Doe', '2022-12-01 09:13:09'),
(172, 'SV1_Admin', 'deactivated user John Doe', '2022-12-01 09:13:46'),
(173, 'SV1_Admin', 'deactivated user Roiemar Escueta', '2022-12-01 09:13:46'),
(174, 'SV1_Admin', 'activated user John Doe', '2022-12-01 09:15:52'),
(175, 'SV1_Admin', 'activated user janwel castillo', '2022-12-01 09:15:52'),
(176, 'SV1_Admin', 'deactivated user John Doe', '2022-12-01 09:16:01'),
(177, 'SV1_Admin', 'deactivated user janwel castillo', '2022-12-01 09:16:01'),
(178, 'SV1_Admin', 'logged out', '2022-12-01 09:17:25'),
(179, 'SV1_Admin', 'logged in', '2022-12-01 09:17:43'),
(180, 'SV1_Admin', 'logged out', '2022-12-01 09:18:46'),
(181, 'SV1_Admin', 'logged in', '2022-12-01 09:26:41'),
(182, 'SV1_Admin', 'logged out', '2022-12-01 10:05:25'),
(183, 'Kyle Andrei Casingal', 'created an account', '2022-12-01 10:10:32'),
(184, 'kylecasingal36@gmail.com', 'verified their email', '2022-12-01 10:11:20'),
(185, 'SV1_Admin', 'logged in', '2022-12-01 10:12:15'),
(186, 'SV1_Admin', 'activated user Kyle Andrei Casingal', '2022-12-01 10:12:24'),
(187, 'SV1_Admin', 'logged out', '2022-12-01 10:12:27'),
(188, 'Kyle Andrei Casingal', 'logged in', '2022-12-01 10:12:37'),
(189, 'Kyle Andrei Casingal', 'uploaded a new post', '2022-12-01 10:13:20'),
(190, 'Kyle Andrei Casingal', 'reserved an amenity', '2022-12-01 10:14:41'),
(191, 'Kyle Andrei Casingal', 'logged out', '2022-12-01 10:14:55'),
(192, 'Kyle Andrei Casingal', 'logged in', '2022-12-01 10:15:08'),
(193, 'Kyle Andrei Casingal', 'logged out', '2022-12-01 10:15:51'),
(194, 'Kyle Andrei Casingal', 'logged in', '2022-12-01 10:15:59'),
(195, 'Kyle Andrei Casingal', 'submitted a concern', '2022-12-01 10:16:33'),
(196, 'Kyle Andrei Casingal', 'logged out', '2022-12-01 10:16:42'),
(197, 'SV1_Admin', 'logged in', '2022-12-01 10:16:49'),
(198, 'SV1_Admin', 'logged out', '2022-12-01 10:17:27'),
(199, 'SV1_Treasurer', 'logged in', '2022-12-01 10:17:44'),
(200, 'SV1_Treasurer', 'logged out', '2022-12-01 10:17:56'),
(201, 'SV1_Secretary', 'logged in', '2022-12-01 10:18:06'),
(202, 'SV1_Secretary', 'logged out', '2022-12-01 10:18:23'),
(203, 'SV1_Admin', 'logged in', '2022-12-01 10:18:41'),
(204, 'SV1_Admin', 'added homeowner Cardo Dalisay', '2022-12-01 10:20:28'),
(205, 'SV1_Admin', 'updated homeowner Cardo Dalisay', '2022-12-01 10:21:00'),
(206, 'SV1_Admin', 'deactivated user Krishtalene BendaÃ±a', '2022-12-01 10:21:54'),
(207, 'SV1_Admin', 'deactivated user Kyle Andrei Casingal', '2022-12-01 10:21:54'),
(208, 'SV1_Admin', 'activated user Krishtalene BendaÃ±a', '2022-12-01 10:22:16'),
(209, 'SV1_Admin', 'activated user Kyle Andrei Casingal', '2022-12-01 10:22:16'),
(210, 'SV1_Admin', 'updated an exisiting amenity Sunnyvale 1-Basketball Court', '2022-12-01 10:22:49'),
(211, 'SV1_Admin', 'logged in', '2023-01-13 13:30:20'),
(212, 'SV1_Admin', 'logged out', '2023-01-13 13:35:53'),
(213, 'SV1_Admin', 'logged in', '2023-01-13 13:36:09'),
(214, 'SV1_Admin', 'logged out', '2023-01-13 13:38:21'),
(215, 'SV1_Admin', 'logged in', '2023-01-13 13:38:30'),
(216, 'SV1_Admin', 'logged out', '2023-01-13 13:38:41'),
(217, 'SV1_Admin', 'logged in', '2023-01-13 13:38:48'),
(218, 'SV1_Admin', 'logged out', '2023-01-13 13:38:51'),
(219, 'SV1_Admin', 'logged in', '2023-01-13 13:39:01'),
(220, 'Mon Carlo Delima', 'logged out', '2023-01-13 14:33:50'),
(221, 'SV1_Admin', 'logged in', '2023-01-13 14:33:53'),
(222, 'SV1_Admin', 'logged out', '2023-01-13 14:39:57'),
(223, 'SV1_Admin', 'logged in', '2023-01-13 14:40:00'),
(224, 'SV1_Admin', 'logged out', '2023-01-13 17:54:10'),
(225, 'SV1_Admin', 'logged in', '2023-01-13 17:54:12'),
(226, 'SV1_Admin', 'logged out', '2023-01-13 17:54:35'),
(227, 'Mon Carlo Delima', 'logged in', '2023-01-13 17:54:39'),
(228, 'Mon Carlo Delima', 'logged out', '2023-01-13 17:54:56'),
(229, 'SV1_Admin', 'logged in', '2023-01-13 17:54:59'),
(230, 'SV1_Admin', 'logged out', '2023-01-13 18:10:15'),
(231, 'SV1_Admin', 'logged in', '2023-01-13 18:10:17'),
(232, 'SV1_Admin', 'logged out', '2023-01-14 16:43:31'),
(233, 'Mon Carlo Delima', 'logged in', '2023-01-14 16:43:35'),
(234, 'Mon Carlo Delima', 'logged out', '2023-01-14 17:15:18'),
(235, 'Mon Carlo Delima', 'logged in', '2023-01-14 17:15:21'),
(236, 'Mon Carlo Delima', 'logged out', '2023-01-14 17:20:46'),
(237, 'Mon Carlo Delima', 'logged in', '2023-01-14 17:20:49'),
(238, 'Mon Carlo Delima', 'logged out', '2023-01-14 17:21:20'),
(239, 'SV1_Treasurer', 'logged in', '2023-01-14 17:21:25'),
(240, 'SV1_Treasurer', 'logged out', '2023-01-14 17:21:29'),
(241, 'SV1_Admin', 'logged in', '2023-01-14 17:21:35'),
(242, 'SV1_Admin', 'logged out', '2023-01-14 17:24:30'),
(243, 'Mon Carlo Delima', 'logged in', '2023-01-14 17:24:32'),
(244, 'Mon Carlo Delima', 'logged out', '2023-01-14 17:26:29'),
(245, 'SV1_Admin', 'logged in', '2023-01-14 17:26:36'),
(246, 'SV1_Admin', 'logged out', '2023-01-14 17:27:16'),
(247, 'Mon Carlo Delima', 'logged in', '2023-01-14 17:27:19'),
(248, 'Mon Carlo Delima', 'logged out', '2023-01-14 17:40:47'),
(249, 'SV1_Admin', 'logged in', '2023-01-14 17:40:50'),
(250, 'SV1_Admin', 'logged out', '2023-01-14 17:41:29'),
(251, 'Mon Carlo Delima', 'logged in', '2023-01-14 17:41:33'),
(252, 'Mon Carlo Delima', 'logged out', '2023-01-14 17:42:18'),
(253, 'SV1_Admin', 'logged in', '2023-01-14 17:42:20'),
(254, 'SV1_Admin', 'logged out', '2023-01-14 17:43:05'),
(255, 'Mon Carlo Delima', 'logged in', '2023-01-14 17:43:09'),
(256, 'Mon Carlo Delima', 'logged out', '2023-01-14 17:47:08'),
(257, 'Mon Carlo Delima', 'logged in', '2023-01-14 21:27:15'),
(258, 'Mon Carlo Delima', 'logged out', '2023-01-15 11:16:23'),
(259, 'SV1_Admin', 'logged in', '2023-01-15 11:16:25'),
(260, 'SV1_Admin', 'logged out', '2023-01-15 11:17:45'),
(261, 'Mon Carlo Delima', 'logged in', '2023-01-15 11:17:49'),
(262, 'Mon Carlo Delima', 'logged out', '2023-01-15 11:26:25'),
(263, 'Mon Carlo Delima', 'logged in', '2023-01-15 11:26:33'),
(264, 'Mon Carlo Delima', 'logged out', '2023-01-15 11:50:11'),
(265, 'SV1_Admin', 'logged in', '2023-01-15 11:50:13'),
(266, 'SV1_Admin', 'logged out', '2023-01-15 11:50:54'),
(267, 'Mon Carlo Delima', 'logged in', '2023-01-15 11:50:57'),
(268, 'Mon Carlo Delima', 'logged out', '2023-01-15 12:06:34'),
(269, 'SV1_Admin', 'logged in', '2023-01-15 12:06:36'),
(270, 'SV1_Admin', 'updated an exisiting amenity Sunnyvale 1-Basketball', '2023-01-15 12:06:57'),
(271, 'SV1_Admin', 'updated an exisiting amenity Sunnyvale 1-Basketball Court', '2023-01-15 12:07:03'),
(272, 'SV1_Admin', 'logged out', '2023-01-15 12:08:04'),
(273, 'SV1_Admin', 'logged in', '2023-01-15 12:08:07'),
(274, 'SV1_Admin', 'updated homeowner Mon Carl Delima', '2023-01-15 12:08:32'),
(275, 'SV1_Admin', 'updated homeowner Mon Carlo Delima', '2023-01-15 12:08:48'),
(276, 'SV1_Admin', 'updated homeowner Mon Carl Delima', '2023-01-15 12:08:53'),
(277, 'SV1_Admin', 'updated homeowner Mon Carlo Delima', '2023-01-15 12:08:57'),
(278, 'SV1_Admin', 'logged out', '2023-01-15 12:09:14'),
(279, 'Mon Carlo Delima', 'logged in', '2023-01-15 12:09:18'),
(280, 'Mon Carlo Delima', 'logged out', '2023-01-15 15:49:45'),
(281, 'SV1_Admin', 'logged in', '2023-01-15 15:49:52'),
(282, 'SV1_Admin', 'logged out', '2023-01-15 15:50:11'),
(283, 'SV1_Admin', 'logged in', '2023-01-15 15:51:36'),
(284, 'SV1_Admin', 'logged out', '2023-01-15 15:55:36'),
(285, 'Mon Carlo Delima', 'logged in', '2023-01-15 15:55:39'),
(286, 'Mon Carlo Delima', 'logged out', '2023-01-15 16:17:42'),
(287, 'SV1_Admin', 'logged in', '2023-01-15 16:30:41'),
(288, 'SV1_Admin', 'logged out', '2023-01-18 21:19:10'),
(289, 'Mon Carlo Delima', 'logged in', '2023-01-18 21:19:13'),
(290, 'Mon Carlo Delima', 'logged in', '2023-01-18 22:03:53'),
(291, 'Mon Carlo Delima', 'uploaded a new post', '2023-01-18 22:10:04'),
(292, 'Mon Carlo Delima', 'uploaded a new post', '2023-01-20 09:07:53'),
(293, 'Mon Carlo Delima', 'uploaded a new post', '2023-01-20 09:08:12'),
(294, 'SV1_Admin', 'logged out', '2023-01-24 19:58:31'),
(295, 'SV1_Admin', 'logged in', '2023-01-24 19:58:36'),
(296, 'SV1_Admin', 'uploaded a new post', '2023-01-24 20:00:38'),
(297, 'SV1_Admin', 'logged out', '2023-01-24 20:00:42'),
(298, 'SV1_Admin', 'logged in', '2023-01-24 20:01:33'),
(299, 'SV1_Admin', 'uploaded a new post', '2023-01-24 20:06:20'),
(300, 'SV1_Admin', 'logged out', '2023-01-24 20:10:40'),
(301, 'Mon Carlo Delima', 'logged in', '2023-01-24 20:10:45'),
(302, 'Mon Carlo Delima', 'logged out', '2023-01-24 20:12:57'),
(303, 'Mon Carlo Delima', 'logged in', '2023-01-24 20:14:08'),
(304, 'Mon Carlo Delima', 'logged out', '2023-01-24 20:14:36'),
(305, 'Mon Carlo Delima', 'logged in', '2023-01-24 20:14:40'),
(306, 'SV1_Admin', 'logged in', '2023-01-24 20:16:04'),
(307, 'Mon Carlo Delima', 'logged out', '2023-01-27 19:00:55'),
(308, 'SV1_Admin', 'logged in', '2023-01-27 19:00:58'),
(309, 'SV1_Admin', 'logged out', '2023-01-30 20:30:02'),
(310, 'Mon Carlo Delima', 'logged in', '2023-01-30 20:30:04'),
(311, 'Mon Carlo Delima', 'logged out', '2023-01-30 20:35:01'),
(312, 'Mon Carlo Delima', 'logged in', '2023-01-30 20:35:03'),
(313, 'Mon Carlo Delima', 'logged in', '2023-01-30 20:48:05'),
(314, 'Mon Carlo Delima', 'logged out', '2023-01-30 20:48:08'),
(315, 'SV1_Admin', 'logged in', '2023-01-30 20:48:13'),
(316, 'SV1_Admin', 'logged out', '2023-01-30 20:49:42'),
(317, 'Mon Carlo Delima', 'logged in', '2023-01-30 20:49:45'),
(318, 'Mon Carlo Delima', 'logged out', '2023-01-30 21:09:28'),
(319, 'SV1_Admin', 'logged in', '2023-01-30 21:09:31'),
(320, 'SV1_Admin', 'logged out', '2023-01-30 21:09:58'),
(321, 'Mon Carlo Delima', 'logged in', '2023-01-30 21:10:01'),
(322, 'Mon Carlo Delima', 'logged out', '2023-01-30 21:17:47'),
(323, 'Mon Carlo Delima', 'logged in', '2023-01-30 21:17:53'),
(324, 'Mon Carlo Delima', 'logged out', '2023-01-30 21:21:23'),
(325, 'Mon Carlo Delima', 'logged in', '2023-01-30 21:21:26'),
(326, 'Mon Carlo Delima', 'logged out', '2023-01-30 21:29:44'),
(327, 'Mon Carlo Delima', 'logged in', '2023-01-30 21:29:46'),
(328, 'Mon Carlo Delima', 'logged out', '2023-01-30 21:36:26'),
(329, 'Mon Carlo Delima', 'logged in', '2023-01-30 21:36:28'),
(330, 'Mon Carlo Delima', 'logged out', '2023-01-30 21:36:40'),
(331, 'Mon Carlo Delima', 'logged in', '2023-01-30 21:36:41'),
(332, 'Mon Carlo Delima', 'logged out', '2023-01-30 21:36:50'),
(333, 'Mon Carlo Delima', 'logged in', '2023-01-30 21:36:51'),
(334, 'Mon Carlo Delima', 'logged out', '2023-02-01 18:43:53'),
(335, 'Mon Carlo Delima', 'logged in', '2023-02-01 18:43:57'),
(336, 'Mon Carlo Delima', 'logged out', '2023-02-01 19:12:20'),
(337, 'SV1_Admin', 'logged in', '2023-02-01 19:12:23'),
(338, 'SV1_Admin', 'logged out', '2023-02-01 19:13:39'),
(339, 'Mon Carlo Delima', 'logged in', '2023-02-01 19:14:00'),
(340, 'Mon Carlo Delima', 'logged out', '2023-02-01 20:14:33'),
(341, 'Mon Carlo Delima', 'logged in', '2023-02-01 20:14:37'),
(342, 'Mon Carlo Delima', 'logged out', '2023-02-03 22:48:43'),
(343, 'SV1_Admin', 'logged in', '2023-02-03 22:48:46'),
(344, 'SV1_Admin', 'logged out', '2023-02-04 14:02:17'),
(345, 'SV1_Admin', 'logged in', '2023-02-04 14:02:24'),
(346, 'SV1_Admin', 'logged out', '2023-02-04 15:23:51'),
(347, 'SV1_Admin', 'logged in', '2023-02-04 15:23:54'),
(348, 'SV1_Admin', 'logged in', '2023-02-04 15:24:55'),
(349, 'SV1_Admin', 'logged out', '2023-02-04 15:25:09'),
(350, 'SV1_Admin', 'logged in', '2023-02-04 15:25:11'),
(351, 'SV1_Admin', 'logged out', '2023-02-04 15:25:15'),
(352, 'Mon Carlo Delima', 'logged in', '2023-02-04 15:25:17'),
(353, 'SV1_Admin', 'logged out', '2023-02-06 16:36:40'),
(354, 'SV1_Admin', 'logged in', '2023-02-06 16:36:43'),
(355, 'SV1_Admin', 'logged out', '2023-02-06 16:39:33'),
(356, 'SV1_Admin', 'logged in', '2023-02-06 16:39:36'),
(357, 'SV1_Admin', 'logged out', '2023-02-06 16:42:41'),
(358, 'SV1_Admin', 'logged in', '2023-02-06 16:42:45'),
(359, 'Mon Carlo Delima', 'logged in', '2023-02-06 17:41:45'),
(360, 'SV1_Admin', 'logged out', '2023-02-07 17:01:41'),
(361, 'Mon Carlo Delima', 'logged in', '2023-02-07 17:01:48'),
(362, 'Mon Carlo Delima', 'logged out', '2023-02-07 17:19:20'),
(363, 'Mon Carlo Delima', 'logged in', '2023-02-10 10:25:18'),
(364, 'Mon Carlo Delima', 'logged out', '2023-02-10 14:25:46'),
(365, 'SV1_Admin', 'logged in', '2023-02-10 14:25:50'),
(366, 'Mon Carlo Delima', 'logged in', '2023-02-10 14:26:11'),
(367, 'Mon Carlo Delima', 'logged out', '2023-02-10 14:26:37'),
(368, 'Mon Carlo Delima', 'logged in', '2023-02-10 14:26:39'),
(369, 'SV1_Admin', 'logged out', '2023-02-11 13:10:56'),
(370, 'Mon Carlo Delima', 'logged in', '2023-02-11 13:11:18'),
(371, 'Mon Carlo Delima', 'logged out', '2023-02-11 14:38:43'),
(372, 'SV1_Admin', 'logged in', '2023-02-11 14:38:46'),
(373, 'SV1_Admin', 'logged out', '2023-02-11 15:53:23'),
(374, 'Mon Carlo Delima', 'logged in', '2023-02-11 15:53:25'),
(375, 'Mon Carlo Delima', 'logged out', '2023-02-11 15:56:19'),
(376, 'SV1_Admin', 'logged in', '2023-02-11 15:58:47'),
(377, 'SV1_Admin', 'logged out', '2023-02-11 15:58:51'),
(378, 'Mon Carlo Delima', 'logged in', '2023-02-11 15:58:56'),
(379, 'Mon Carlo Delima', 'logged out', '2023-02-12 16:35:26'),
(380, 'Mon Carlo Delima', 'logged in', '2023-02-12 16:35:36'),
(381, 'Mon Carlo Delima', 'logged out', '2023-02-14 18:24:06'),
(382, 'SV1_Admin', 'logged in', '2023-02-14 18:24:11'),
(383, 'SV1_Admin', 'logged out', '2023-02-14 21:32:16'),
(384, 'SV1_Admin', 'logged in', '2023-02-14 21:32:22'),
(385, 'SV1_Admin', 'logged out', '2023-02-14 21:32:26'),
(386, 'Mon Carlo Delima', 'logged in', '2023-02-14 21:32:29'),
(387, 'Mon Carlo Delima', 'logged out', '2023-02-14 22:22:38'),
(388, 'Mon Carlo Delima', 'logged in', '2023-02-14 22:23:01'),
(389, 'SV1_Treasurer', 'logged in', '2023-02-16 00:58:57'),
(390, 'SV1_Treasurer', 'logged out', '2023-02-16 01:30:01'),
(391, 'SV1_Treasurer', 'logged in', '2023-02-16 01:39:20'),
(392, 'SV1_Admin', 'logged in', '2023-02-18 13:07:41'),
(393, 'SV1_Treasurer', 'logged in', '2023-02-20 08:30:38'),
(394, 'SV1_Treasurer', 'logged out', '2023-02-20 08:50:17'),
(395, 'SV1_Treasurer', 'logged in', '2023-02-20 11:00:09'),
(396, 'SV1_Treasurer', 'logged in', '2023-02-20 11:41:51'),
(397, 'SV1_Treasurer', 'logged in', '2023-03-18 18:44:00'),
(398, 'SV1_Treasurer', 'logged out', '2023-03-18 22:04:11'),
(399, 'SV1_Admin', 'logged in', '2023-03-18 22:04:14'),
(400, 'SV1_Admin', 'logged out', '2023-03-18 22:04:33'),
(401, 'SV1_Treasurer', 'logged in', '2023-03-18 22:05:22'),
(402, 'SV1_Treasurer', 'logged in', '2023-03-20 14:56:10'),
(403, 'SV1_Treasurer', 'logged in', '2023-03-22 07:54:03'),
(404, 'SV1_Treasurer', 'logged in', '2023-03-22 11:10:42'),
(405, 'SV1_Treasurer', 'logged in', '2023-03-22 13:24:08'),
(406, 'SV1_Admin', 'logged in', '2023-04-01 13:04:18'),
(407, 'SV1_Admin', 'logged out', '2023-04-01 13:43:26'),
(408, 'SV1_Admin', 'logged in', '2023-04-01 13:43:28'),
(409, 'SV1_Admin', 'logged out', '2023-04-01 13:43:47'),
(410, 'SV1_Admin', 'logged in', '2023-04-01 13:43:49'),
(411, 'SV1_Admin', 'logged out', '2023-04-01 13:44:06'),
(412, 'SV1_Admin', 'logged in', '2023-04-01 13:44:09'),
(413, 'SV1_Admin', 'logged out', '2023-04-01 13:46:43'),
(414, 'SV1_Admin', 'logged in', '2023-04-01 13:46:46'),
(415, 'SV1_Admin', 'logged out', '2023-04-01 14:00:24'),
(416, 'SV1_Admin', 'logged in', '2023-04-01 14:00:27'),
(417, 'SV1_Admin', 'logged out', '2023-04-01 14:13:13'),
(418, 'SV1_Admin', 'logged in', '2023-04-01 14:13:16'),
(419, 'SV1_Admin', 'logged out', '2023-04-01 14:13:17'),
(420, 'Mon Carlo Delima', 'logged in', '2023-04-01 14:13:21'),
(421, 'Mon Carlo Delima', 'logged out', '2023-04-01 14:13:41'),
(422, 'SV1_Treasurer', 'logged in', '2023-04-01 14:13:44'),
(423, 'SV1_Treasurer', 'logged out', '2023-04-01 21:41:30'),
(424, 'SV1_Admin', 'logged in', '2023-04-01 21:41:33'),
(425, 'SV1_Admin', 'logged out', '2023-04-01 22:18:05'),
(426, 'Mon Carlo Delima', 'logged in', '2023-04-01 22:18:08'),
(427, 'Mon Carlo Delima', 'uploaded a new post', '2023-04-01 22:19:20'),
(428, 'Mon Carlo Delima', 'uploaded a new post', '2023-04-01 22:20:08'),
(429, 'Mon Carlo Delima', 'uploaded a new post', '2023-04-01 22:20:36'),
(430, 'Mon Carlo Delima', 'uploaded a new post', '2023-04-01 22:21:36'),
(431, 'Mon Carlo Delima', 'logged out', '2023-04-01 22:21:55'),
(432, 'SV1_Admin', 'logged in', '2023-04-01 22:21:58'),
(433, 'SV1_Admin', 'uploaded a new post', '2023-04-01 22:22:03'),
(434, 'SV1_Admin', 'logged out', '2023-04-01 22:22:13'),
(435, 'Mon Carlo Delima', 'logged in', '2023-04-01 22:22:16'),
(436, 'Mon Carlo Delima', 'uploaded a new post', '2023-04-01 22:24:20'),
(437, 'Mon Carlo Delima', 'logged out', '2023-04-02 12:33:54'),
(438, 'SV1_Admin', 'logged in', '2023-04-02 12:33:57'),
(439, 'SV1_Admin', 'logged out', '2023-04-02 12:37:58'),
(440, 'SV1_Admin', 'logged in', '2023-04-02 12:38:01'),
(441, 'SV1_Admin', 'logged out', '2023-04-02 12:38:05'),
(442, 'SV1_Treasurer', 'logged in', '2023-04-02 12:38:09'),
(443, 'SV1_Treasurer', 'logged out', '2023-04-02 12:38:13'),
(444, 'SV1_Admin', 'logged in', '2023-04-02 12:38:15'),
(445, 'SV1_Admin', 'logged out', '2023-04-02 12:39:45'),
(446, 'Mon Carlo Delima', 'logged in', '2023-04-02 12:39:55'),
(447, 'Mon Carlo Delima', 'logged out', '2023-04-02 12:42:58'),
(448, 'SV1_Admin', 'logged in', '2023-04-02 12:43:00'),
(449, 'SV1_Admin', 'logged out', '2023-04-02 12:44:11'),
(450, 'SV1_Treasurer', 'logged in', '2023-04-02 12:44:15'),
(451, 'SV1_Treasurer', 'logged out', '2023-04-02 12:44:41'),
(452, 'Mon Carlo Delima', 'logged in', '2023-04-02 12:44:45'),
(453, 'Mon Carlo Delima', 'logged out', '2023-04-02 12:45:10'),
(454, 'SV1_Admin', 'logged in', '2023-04-02 12:45:13'),
(455, 'SV1_Admin', 'logged out', '2023-04-02 12:51:02'),
(456, 'SV1_Admin', 'logged in', '2023-04-02 12:51:06'),
(457, 'SV1_Admin', 'logged out', '2023-04-02 12:58:30'),
(458, 'Mon Carlo Delima', 'logged in', '2023-04-02 12:58:32'),
(459, 'Mon Carlo Delima', 'uploaded a new post', '2023-04-02 12:59:46'),
(460, 'Mon Carlo Delima', 'uploaded a new post', '2023-04-02 13:00:31'),
(461, 'Mon Carlo Delima', 'logged out', '2023-04-02 13:00:40'),
(462, 'SV1_Admin', 'logged in', '2023-04-02 13:00:45'),
(463, 'SV1_Admin', 'uploaded a new post', '2023-04-02 13:01:32'),
(464, 'SV1_Admin', 'uploaded a new post', '2023-04-02 13:03:49'),
(465, 'SV1_Admin', 'uploaded a new post', '2023-04-02 13:04:24'),
(466, 'SV1_Admin', 'uploaded a new post', '2023-04-02 13:04:37'),
(467, 'SV1_Admin', 'uploaded a new post', '2023-04-02 13:05:10'),
(468, 'SV1_Admin', 'uploaded a new post', '2023-04-02 13:05:16'),
(469, 'SV1_Admin', 'uploaded a new post', '2023-04-02 13:06:44'),
(470, 'SV1_Admin', 'logged out', '2023-04-02 13:36:57'),
(471, 'SV1_Admin', 'logged in', '2023-04-04 11:57:08'),
(472, 'SV1_Admin', 'logged out', '2023-04-04 12:21:10'),
(473, 'SV1_Treasurer', 'logged in', '2023-04-04 12:21:13'),
(474, 'SV1_Treasurer', 'logged out', '2023-04-04 12:22:43'),
(475, 'SV1_Admin', 'logged in', '2023-04-04 12:22:52'),
(476, 'SV1_Admin', 'updated an exisiting amenity Sunnyvale 1-Court', '2023-04-04 18:26:35'),
(477, 'SV1_Admin', 'added a new amenity Sunnyvale 1-test', '2023-04-04 18:28:20'),
(478, 'SV1_Admin', 'updated an exisiting amenity Sunnyvale 1-Court', '2023-04-04 18:31:00'),
(479, 'SV1_Admin', 'added a new amenity Sunnyvale 1-Test', '2023-04-05 10:17:59'),
(480, 'SV1_Admin', 'added a new amenity Sunnyvale 1-Test', '2023-04-05 10:18:56'),
(481, 'SV1_Admin', 'added a new amenity Sunnyvale 1-Test', '2023-04-05 10:19:24'),
(482, 'SV1_Admin', 'added a new amenity Sunnyvale 1-test', '2023-04-05 10:20:37'),
(483, 'SV1_Admin', 'added a new amenity Sunnyvale 1-123', '2023-04-05 10:21:06'),
(484, 'SV1_Admin', 'added a new amenity Sunnyvale 2-test', '2023-04-05 10:21:44'),
(485, 'SV1_Admin', 'added a new amenity Sunnyvale 1-test', '2023-04-05 10:22:09'),
(486, 'SV1_Admin', 'added a new amenity Sunnyvale 1-test', '2023-04-05 10:22:21'),
(487, 'SV1_Admin', 'added a new amenity Sunnyvale 1-test', '2023-04-05 10:25:51'),
(488, 'SV1_Admin', 'added a new amenity Sunnyvale 1-test', '2023-04-05 10:27:06'),
(489, 'SV1_Admin', 'added a new amenity Sunnyvale 1-test', '2023-04-05 10:27:47'),
(490, 'SV1_Admin', 'added a new amenity Sunnyvale 1-test', '2023-04-05 10:27:56'),
(491, 'SV1_Admin', 'added a new amenity Sunnyvale 1-test', '2023-04-05 10:28:59'),
(492, 'SV1_Admin', 'added a new amenity Sunnyvale 1-test', '2023-04-05 10:29:05'),
(493, 'SV1_Admin', 'added a new amenity Sunnyvale 1-test', '2023-04-05 10:32:14'),
(494, 'SV1_Admin', 'updated an exisiting amenity Sunnyvale 1-Swimming Pool', '2023-04-05 10:33:35'),
(495, 'SV1_Admin', 'updated an exisiting amenity Sunnyvale 1-Swimming Pool', '2023-04-05 10:33:41'),
(496, 'SV1_Admin', 'updated an exisiting amenity Sunnyvale 1-Clubhouse', '2023-04-05 10:34:31'),
(497, 'SV1_Admin', 'updated an exisiting amenity Sunnyvale 1-Clubhouse', '2023-04-05 10:34:40'),
(498, 'SV1_Admin', 'added a new amenity Sunnyvale 1-test1', '2023-04-05 10:34:55'),
(499, 'SV1_Admin', 'added a new amenity Sunnyvale 1-test2', '2023-04-05 10:35:48'),
(500, 'SV1_Admin', 'added a new amenity Sunnyvale 2-test', '2023-04-05 10:41:26'),
(501, 'SV1_Admin', 'added a new amenity Sunnyvale 1-test', '2023-04-05 10:44:28'),
(502, 'SV1_Admin', 'added a new amenity Sunnyvale 1-asd', '2023-04-05 10:44:37'),
(503, 'SV1_Admin', 'updated an exisiting amenity Sunnyvale 1-Courts', '2023-04-05 10:45:51'),
(504, 'SV1_Admin', 'updated an exisiting amenity Sunnyvale 1-Court', '2023-04-05 10:45:57'),
(505, 'SV1_Admin', 'added a new amenity Sunnyvale 1-test', '2023-04-05 11:16:56'),
(506, 'SV1_Admin', 'added a new amenity Sunnyvale 1-asd', '2023-04-05 11:26:30'),
(507, 'SV1_Admin', 'added a new amenity Sunnyvale 1-123', '2023-04-05 11:27:51'),
(508, 'SV1_Admin', 'logged out', '2023-04-06 09:58:53'),
(509, 'Mon Carlo Delima', 'logged in', '2023-04-06 09:58:56'),
(510, 'Mon Carlo Delima', 'logged out', '2023-04-06 10:00:36'),
(511, 'Jeune Paolus Flores', 'logged in', '2023-04-06 10:00:44'),
(512, 'Jeune Paolus Flores', 'logged out', '2023-04-06 10:01:02'),
(513, 'SV1_Admin', 'logged in', '2023-04-06 10:01:20'),
(514, 'SV1_Admin', 'logged out', '2023-04-06 10:01:27'),
(515, 'SV1_Admin', 'logged in', '2023-04-06 10:01:30'),
(516, 'SV1_Admin', 'logged out', '2023-04-06 10:03:33'),
(517, 'SV1_Secretary', 'logged in', '2023-04-06 10:03:38'),
(518, 'SV1_Secretary', 'logged out', '2023-04-06 10:04:45'),
(519, 'SV1_Secretary', 'logged in', '2023-04-06 10:04:53'),
(520, 'SV1_Secretary', 'logged out', '2023-04-06 10:06:55'),
(521, 'SV1_Admin', 'logged in', '2023-04-06 10:06:59'),
(522, 'SV1_Admin', 'logged out', '2023-04-06 10:08:27'),
(523, 'SV1_Secretary', 'logged in', '2023-04-06 10:08:31'),
(524, 'SV1_Secretary', 'logged out', '2023-04-06 10:09:34'),
(525, 'SV1_Treasurer', 'logged in', '2023-04-06 10:09:36'),
(526, 'SV1_Treasurer', 'logged out', '2023-04-06 10:10:32'),
(527, 'SV1_Secretary', 'logged in', '2023-04-06 10:10:35'),
(528, 'SV1_Secretary', 'logged out', '2023-04-06 10:10:41'),
(529, 'SV1_Admin', 'logged in', '2023-04-06 10:10:45'),
(530, 'SV1_Admin', 'logged out', '2023-04-06 10:11:18'),
(531, 'SV1_Secretary', 'logged in', '2023-04-06 10:11:20'),
(532, 'SV1_Secretary', 'logged out', '2023-04-06 10:12:09'),
(533, 'SV1_Secretary', 'logged in', '2023-04-06 10:12:12'),
(534, 'SV1_Secretary', 'logged out', '2023-04-06 10:22:12'),
(535, 'SV1_Admin', 'logged in', '2023-04-06 10:22:15'),
(536, 'SV1_Admin', 'logged out', '2023-04-06 10:22:34'),
(537, 'SV1_Secretary', 'logged in', '2023-04-06 10:22:38'),
(538, 'SV1_Secretary', 'logged out', '2023-04-06 10:24:07'),
(539, 'SV1_Admin', 'logged in', '2023-04-06 10:24:11'),
(540, 'SV1_Admin', 'logged out', '2023-04-06 10:27:39'),
(541, 'SV1_Admin', 'logged in', '2023-04-06 10:27:41'),
(542, 'SV1_Admin', 'logged out', '2023-04-06 10:31:33'),
(543, 'SV1_Admin', 'logged in', '2023-04-06 10:31:39'),
(544, 'SV1_Admin', 'logged out', '2023-04-06 10:31:54'),
(545, 'SV1_Secretary', 'logged in', '2023-04-06 10:31:59'),
(546, 'SV1_Secretary', 'logged out', '2023-04-06 10:32:01'),
(547, 'Kyle Andrei Casingal', 'logged in', '2023-04-06 10:32:42'),
(548, 'Kyle Andrei Casingal', 'logged out', '2023-04-06 10:33:06'),
(549, 'SV1_Admin', 'logged in', '2023-04-06 10:33:20'),
(550, 'SV1_Admin', 'logged out', '2023-04-06 10:33:52'),
(551, 'SV1_Admin', 'logged in', '2023-04-06 10:33:56'),
(552, 'SV1_Admin', 'logged out', '2023-04-06 10:45:07'),
(553, 'SV1_Admin', 'logged in', '2023-04-06 10:46:25'),
(554, 'SV1_Admin', 'logged out', '2023-04-06 10:51:03'),
(555, 'SV1_Admin', 'logged in', '2023-04-06 10:51:08'),
(556, 'SV1_Admin', 'logged out', '2023-04-06 10:51:10'),
(557, 'Mon Carlo Delima', 'logged in', '2023-04-06 10:51:12'),
(558, 'Mon Carlo Delima', 'logged out', '2023-04-06 10:52:45'),
(559, 'Mon Carlo Delima', 'logged in', '2023-04-06 10:52:48'),
(560, 'Mon Carlo Delima', 'submitted a concern', '2023-04-06 10:52:51'),
(561, 'Mon Carlo Delima', 'logged out', '2023-04-06 10:53:03'),
(562, 'SV1_Admin', 'logged in', '2023-04-06 10:53:06'),
(563, 'SV1_Admin', 'logged out', '2023-04-06 10:53:18'),
(564, 'SV1_Admin', 'logged in', '2023-04-06 10:53:21'),
(565, 'SV1_Admin', 'logged out', '2023-04-06 10:53:22'),
(566, 'Mon Carlo Delima', 'logged in', '2023-04-06 10:53:27'),
(567, 'Mon Carlo Delima', 'submitted a concern', '2023-04-06 10:54:16'),
(568, 'Mon Carlo Delima', 'logged out', '2023-04-06 11:00:35'),
(569, 'Mon Carlo Delima', 'logged in', '2023-04-06 11:04:00'),
(570, 'Mon Carlo Delima', 'logged in', '2023-04-06 14:00:15'),
(571, 'Mon Carlo Delima', 'logged out', '2023-04-06 14:06:53'),
(572, 'SV1_Treasurer', 'logged in', '2023-04-06 14:06:57'),
(573, 'SV1_Treasurer', 'logged out', '2023-04-06 14:07:51'),
(574, 'SV1_Treasurer', 'logged in', '2023-04-06 14:09:56'),
(575, 'SV1_Treasurer', 'logged out', '2023-04-06 14:11:24'),
(576, 'Mon Carlo Delima', 'logged in', '2023-04-06 14:11:28'),
(577, 'Mon Carlo Delima', 'logged out', '2023-04-06 14:21:49'),
(578, 'SV1_Admin', 'logged in', '2023-04-06 14:21:57'),
(579, 'SV1_Admin', 'logged out', '2023-04-06 14:26:51'),
(580, 'SV1_Admin', 'logged in', '2023-04-06 14:26:54'),
(581, 'SV1_Admin', 'logged out', '2023-04-06 14:30:27'),
(582, 'Mon Carlo Delima', 'logged in', '2023-04-06 14:30:30'),
(583, 'Mon Carlo Delima', 'logged in', '2023-04-06 15:19:28'),
(584, 'Mon Carlo Delima', 'submitted a concern', '2023-04-06 15:34:28'),
(585, 'Mon Carlo Delima', 'logged out', '2023-04-06 16:03:03'),
(586, 'Kyle Andrei Casingal', 'logged in', '2023-04-06 16:03:06'),
(587, 'Kyle Andrei Casingal', 'logged out', '2023-04-06 16:03:14'),
(588, 'SV1_Admin', 'logged in', '2023-04-06 16:03:17'),
(589, 'SV1_Admin', 'logged out', '2023-04-06 16:03:26'),
(590, 'Mon Carlo Delima', 'logged in', '2023-04-06 16:03:29'),
(591, 'Mon Carlo Delima', 'submitted a concern', '2023-04-06 16:03:47'),
(592, 'Mon Carlo Delima', 'submitted a concern', '2023-04-06 16:04:20'),
(593, 'Mon Carlo Delima', 'submitted a concern', '2023-04-06 16:04:50'),
(594, 'Mon Carlo Delima', 'submitted a concern', '2023-04-06 16:05:27'),
(595, 'Mon Carlo Delima', 'logged out', '2023-04-06 16:06:44'),
(596, 'SV1_Admin', 'logged in', '2023-04-06 17:31:45'),
(597, 'SV1_Admin', 'logged out', '2023-04-06 17:35:09'),
(598, 'SV1_Treasurer', 'logged in', '2023-04-06 17:35:12'),
(599, 'SV1_Treasurer', 'logged out', '2023-04-06 17:35:31'),
(600, 'SV1_Secretary', 'logged in', '2023-04-06 17:35:35'),
(601, 'SV1_Secretary', 'logged out', '2023-04-06 17:35:42'),
(602, 'SV1_Admin', 'logged in', '2023-04-06 17:35:46'),
(603, 'SV1_Admin', 'logged out', '2023-04-06 17:38:07'),
(604, 'SV1_Secretary', 'logged in', '2023-04-06 17:38:12'),
(605, 'SV1_Secretary', 'logged out', '2023-04-06 17:40:00'),
(606, 'SV1_Admin', 'logged in', '2023-04-06 17:40:03'),
(607, 'SV1_Admin', 'logged out', '2023-04-06 17:42:56'),
(608, 'SV1_Secretary', 'logged in', '2023-04-06 17:42:59'),
(609, 'SV1_Secretary', 'logged out', '2023-04-06 17:43:10'),
(610, 'SV1_Admin', 'logged in', '2023-04-06 17:43:13'),
(611, 'SV1_Admin', 'logged out', '2023-04-06 17:44:36'),
(612, 'SV1_Secretary', 'logged in', '2023-04-06 17:44:39'),
(613, 'SV1_Secretary', 'logged out', '2023-04-06 17:44:51'),
(614, 'SV1_Treasurer', 'logged in', '2023-04-06 17:44:53'),
(615, 'SV1_Treasurer', 'logged out', '2023-04-06 17:45:26'),
(616, 'SV1_Secretary', 'logged in', '2023-04-06 17:45:30'),
(617, 'SV1_Secretary', 'logged out', '2023-04-06 17:45:57'),
(618, 'SV1_Secretary', 'logged in', '2023-04-06 17:46:01'),
(619, 'SV1_Secretary', 'logged out', '2023-04-06 17:46:02'),
(620, 'SV1_Admin', 'logged in', '2023-04-06 17:46:05'),
(621, 'SV1_Admin', 'logged out', '2023-04-06 17:47:43'),
(622, 'SV1_Admin', 'logged in', '2023-04-06 17:48:47'),
(623, 'SV1_Admin', 'logged out', '2023-04-06 18:38:13'),
(624, 'SV1_Admin', 'logged in', '2023-04-06 18:48:42'),
(625, 'SV1_Admin', 'logged out', '2023-04-06 18:52:05'),
(626, 'SV1_Admin', 'logged in', '2023-04-06 18:52:54'),
(627, 'SV1_Admin', 'logged out', '2023-04-06 18:59:11'),
(628, 'SV1_Secretary', 'logged in', '2023-04-06 18:59:56'),
(629, 'SV1_Secretary', 'logged out', '2023-04-06 19:01:01'),
(630, 'SV1_Admin', 'logged in', '2023-04-06 19:01:04'),
(631, 'SV1_Admin', 'logged in', '2023-04-06 22:02:03'),
(632, 'SV1_Admin', 'logged out', '2023-04-06 22:05:25'),
(633, 'SV1_Admin', 'logged in', '2023-04-06 22:05:28'),
(634, 'SV1_Admin', 'logged out', '2023-04-06 22:11:16'),
(635, 'SV1_Admin', 'logged in', '2023-04-06 22:11:20'),
(636, 'SV1_Admin', 'logged out', '2023-04-06 22:47:30'),
(637, 'Mon Carlo Delima', 'logged in', '2023-04-06 22:47:33'),
(638, 'Mon Carlo Delima', 'logged out', '2023-04-06 22:47:49'),
(639, 'SV1_Admin', 'logged in', '2023-04-06 22:47:51'),
(640, 'SV1_Admin', 'logged out', '2023-04-06 23:10:35'),
(641, 'Mon Carlo Delima', 'logged in', '2023-04-06 23:10:38'),
(642, 'Mon Carlo Delima', 'logged out', '2023-04-06 23:11:41'),
(643, 'SV1_Admin', 'logged in', '2023-04-06 23:11:44'),
(644, 'SV1_Admin', 'logged out', '2023-04-06 23:16:33'),
(645, 'Mon Carlo Delima', 'logged in', '2023-04-06 23:16:37'),
(646, 'Mon Carlo Delima', 'logged out', '2023-04-06 23:27:22'),
(647, 'SV1_Admin', 'logged in', '2023-04-06 23:27:25'),
(648, 'SV1_Admin', 'logged out', '2023-04-06 23:30:08'),
(649, 'Mon Carlo Delima', 'logged in', '2023-04-06 23:30:11'),
(650, 'Mon Carlo Delima', 'submitted a concern', '2023-04-06 23:30:23'),
(651, 'Mon Carlo Delima', 'logged out', '2023-04-06 23:30:41'),
(652, 'SV1_Admin', 'logged in', '2023-04-06 23:30:46'),
(653, 'Mon Carlo Delima', 'logged in', '2023-04-06 23:33:18'),
(654, 'Mon Carlo Delima', 'submitted a concern', '2023-04-06 23:33:30'),
(655, 'SV1_Admin', 'logged out', '2023-04-06 23:37:32'),
(656, 'Mon Carlo Delima', 'logged in', '2023-04-06 23:37:36'),
(657, 'Mon Carlo Delima', 'logged out', '2023-04-06 23:40:49'),
(658, 'SV1_Admin', 'logged in', '2023-04-06 23:40:51'),
(659, 'SV1_Admin', 'logged out', '2023-04-06 23:40:56'),
(660, 'Mon Carlo Delima', 'logged in', '2023-04-06 23:40:59'),
(661, 'Mon Carlo Delima', 'logged out', '2023-04-06 23:42:33'),
(662, 'Janwel Castillo', 'logged in', '2023-04-06 23:43:43'),
(663, 'Janwel Castillo', 'submitted a concern', '2023-04-06 23:44:02'),
(664, 'Janwel Castillo', 'logged out', '2023-04-06 23:44:11'),
(665, 'Mon Carlo Delima', 'logged in', '2023-04-06 23:44:15'),
(666, 'Mon Carlo Delima', 'logged out', '2023-04-06 23:46:46'),
(667, 'SV1_Admin', 'logged in', '2023-04-06 23:46:49'),
(668, 'SV1_Admin', 'logged out', '2023-04-06 23:46:56'),
(669, 'Mon Carlo Delima', 'logged in', '2023-04-06 23:47:00'),
(670, 'Mon Carlo Delima', 'logged out', '2023-04-06 23:58:48'),
(671, 'Mon Carlo Delima', 'logged in', '2023-04-06 23:58:52'),
(672, 'Mon Carlo Delima', 'submitted a concern', '2023-04-06 23:59:18'),
(673, 'Mon Carlo Delima', 'logged out', '2023-04-07 00:00:16'),
(674, 'SV1_Admin', 'logged in', '2023-04-07 00:04:34'),
(675, 'SV1_Admin', 'logged in', '2023-04-07 09:43:45'),
(676, 'SV1_Admin', 'logged out', '2023-04-07 09:44:32'),
(677, 'Mon Carlo Delima', 'logged in', '2023-04-07 09:44:34'),
(678, 'Mon Carlo Delima', 'logged out', '2023-04-07 09:46:39'),
(679, 'SV1_Admin', 'logged in', '2023-04-07 09:46:42'),
(680, 'SV1_Admin', 'added a new system account Test-Admin', '2023-04-07 09:49:47'),
(681, 'SV1_Admin', 'logged out', '2023-04-07 09:59:20'),
(682, 'Mon Carlo Delima', 'logged in', '2023-04-07 09:59:23'),
(683, 'Mon Carlo Delima', 'logged out', '2023-04-07 09:59:28'),
(684, 'SV1_Admin', 'logged in', '2023-04-07 09:59:33'),
(685, 'SV1_Admin', 'logged in', '2023-04-07 10:20:46'),
(686, 'SV1_Admin', 'logged out', '2023-04-07 10:25:40'),
(687, 'SV1_Admin', 'logged in', '2023-04-07 10:25:43'),
(688, 'SV1_Admin', 'logged out', '2023-04-07 10:32:49'),
(689, 'Mon Carlo Delima', 'logged in', '2023-04-07 10:32:52'),
(690, 'Mon Carlo Delima', 'logged out', '2023-04-07 10:36:50'),
(691, 'SV1_Admin', 'logged in', '2023-04-07 10:36:53'),
(692, 'SV1_Admin', 'logged out', '2023-04-07 10:36:59'),
(693, 'Mon Carlo Delima', 'logged in', '2023-04-07 10:37:02'),
(694, 'Mon Carlo Delima', 'logged out', '2023-04-07 10:38:51'),
(695, 'SV1_Admin', 'logged in', '2023-04-07 10:38:53'),
(696, 'SV1_Admin', 'logged out', '2023-04-07 10:39:05'),
(697, 'Mon Carlo Delima', 'logged in', '2023-04-07 10:39:08'),
(698, 'Mon Carlo Delima', 'logged out', '2023-04-07 10:39:49'),
(699, 'SV1_Admin', 'logged in', '2023-04-07 10:39:54'),
(700, 'SV1_Admin', 'logged out', '2023-04-07 10:39:57'),
(701, 'Mon Carlo Delima', 'logged in', '2023-04-07 10:40:01'),
(702, ' Mon Carlo Delima', 'logged out', '2023-04-07 10:59:35'),
(703, 'SV1_Admin', 'logged in', '2023-04-07 10:59:38'),
(704, 'SV1_Admin', 'logged out', '2023-04-07 10:59:40'),
(705, ' Mon Carlo Delima', 'logged in', '2023-04-07 10:59:43'),
(706, ' Mon Carlo Delima', 'logged out', '2023-04-07 11:01:41'),
(707, 'Jeune Paolus Flores', 'logged in', '2023-04-07 11:01:44'),
(708, 'Jeune Paolus Flores', 'logged out', '2023-04-07 11:01:49'),
(709, ' Mon Carlo Delima', 'logged in', '2023-04-07 11:01:52'),
(710, ' Mon Carlo Delima', 'logged out', '2023-04-07 11:03:08'),
(711, 'Jeune Paolus Flores', 'logged in', '2023-04-07 11:03:12'),
(712, 'Jeune Paolus Flores', 'logged out', '2023-04-07 11:03:39'),
(713, ' Mon Carlo Delima', 'logged in', '2023-04-07 11:03:42'),
(714, 'Mon Carlo Delima', 'logged out', '2023-04-07 11:10:16'),
(715, 'SV1_Admin', 'logged in', '2023-04-07 11:10:18'),
(716, 'SV1_Admin', 'logged out', '2023-04-07 11:10:44'),
(717, 'Mon Carlo Delima', 'logged in', '2023-04-07 11:10:47'),
(718, 'Mon Carlo Delima', 'logged out', '2023-04-07 11:11:36'),
(719, 'SV1_Admin', 'logged in', '2023-04-07 11:11:39'),
(720, 'SV1_Admin', 'logged in', '2023-04-07 13:54:39'),
(721, 'SV1_Admin', 'logged out', '2023-04-07 13:58:16'),
(722, 'SV1_Treasurer', 'logged in', '2023-04-07 13:58:18'),
(723, 'SV1_Treasurer', 'logged out', '2023-04-07 13:58:45'),
(724, 'SV1_Admin', 'logged in', '2023-04-07 13:58:54'),
(725, 'SV1_Admin', 'added a new amenity Sunnyvale 2-test2', '2023-04-07 14:05:46'),
(726, 'SV1_Admin', 'updated an exisiting amenity 2-Court', '2023-04-07 14:19:24'),
(727, 'SV1_Admin', 'updated an exisiting amenity 2-Court', '2023-04-07 14:19:31'),
(728, 'SV1_Admin', 'updated an exisiting amenity 2-Court', '2023-04-07 14:19:39'),
(729, 'SV1_Admin', 'updated an exisiting amenity 2-Court', '2023-04-07 14:20:00'),
(730, 'SV1_Admin', 'updated an exisiting amenity 2-Court', '2023-04-07 14:20:06'),
(731, 'SV1_Admin', 'updated an exisiting amenity 1-Court', '2023-04-07 14:20:29'),
(732, 'SV1_Admin', 'updated an exisiting amenity Sunnyvale 2-Court', '2023-04-07 14:27:12'),
(733, 'SV1_Admin', 'updated an exisiting amenity -Court', '2023-04-07 14:33:06'),
(734, 'SV1_Admin', 'updated an exisiting amenity -Court', '2023-04-07 14:33:28'),
(735, 'SV1_Admin', 'updated an exisiting amenity -Multi-purpose Hall', '2023-04-07 14:34:02'),
(736, 'SV1_Admin', 'updated an exisiting amenity Sunnyvale 1-Court', '2023-04-07 14:35:05'),
(737, 'SV1_Admin', 'updated an exisiting amenity Sunnyvale 2-Multi-purpose Hall', '2023-04-07 14:35:08'),
(738, 'SV1_Admin', 'updated an exisiting amenity Sunnyvale 2-Court', '2023-04-07 14:35:17'),
(739, 'SV1_Admin', 'updated an exisiting amenity Sunnyvale 1-Court', '2023-04-07 14:35:58'),
(740, 'SV1_Admin', 'added a new amenity -test4', '2023-04-07 14:36:19'),
(741, 'SV1_Admin', 'added a new amenity -test4', '2023-04-07 14:36:56'),
(742, 'SV1_Admin', 'added a new amenity -test4', '2023-04-07 14:37:16'),
(743, 'SV1_Admin', 'added a new amenity Sunnyvale 4-test4', '2023-04-07 14:37:44'),
(744, 'SV1_Admin', 'added a new amenity Sunnyvale 4-test123', '2023-04-07 14:38:18'),
(745, 'SV1_Admin', 'updated an exisiting amenity Sunnyvale 4-test12345', '2023-04-07 14:38:42'),
(746, 'SV1_Admin', 'added a new amenity Sunnyvale 3-test again', '2023-04-07 14:39:03'),
(747, 'SV1_Admin', 'updated an exisiting amenity Sunnyvale 3-Clubhouse', '2023-04-07 14:39:36'),
(748, 'SV1_Admin', 'added a new amenity Sunnyvale 2-Court', '2023-04-07 14:40:15'),
(749, 'SV1_Admin', 'updated an exisiting amenity -', '2023-04-07 14:54:02'),
(750, 'SV1_Admin', 'updated an exisiting amenity -', '2023-04-07 14:54:12'),
(751, 'SV1_Admin', 'updated an existing monthly due Sunnyvale 2-280.00', '2023-04-07 15:00:31'),
(752, 'SV1_Admin', 'logged out', '2023-04-07 15:05:14'),
(753, 'Mon Carlo Delima', 'logged in', '2023-04-07 15:05:17'),
(754, 'Mon Carlo Delima', 'logged out', '2023-04-07 15:05:36'),
(755, 'SV1_Admin', 'logged in', '2023-04-07 15:05:38'),
(756, 'SV1_Admin', 'logged out', '2023-04-07 15:07:08'),
(757, 'Mon Carlo Delima', 'logged in', '2023-04-07 15:07:11'),
(758, 'Mon Carlo Delima', 'logged out', '2023-04-07 15:07:35'),
(759, 'SV1_Admin', 'logged in', '2023-04-07 15:07:38'),
(760, 'SV1_Admin', 'added a new amenity Sunnyvale 4-Court', '2023-04-07 15:08:22'),
(761, 'SV1_Admin', 'logged out', '2023-04-07 15:13:49'),
(762, 'Mon Carlo Delima', 'logged in', '2023-04-07 15:13:54'),
(763, 'Mon Carlo Delima', 'logged out', '2023-04-07 15:14:46'),
(764, 'SV1_Admin', 'logged in', '2023-04-07 15:14:48'),
(765, 'SV1_Treasurer', 'logged in', '2023-04-07 19:43:08'),
(766, 'SV1_Treasurer', 'logged out', '2023-04-07 19:43:35'),
(767, 'SV1_Secretary', 'logged in', '2023-04-07 19:43:38'),
(768, 'SV1_Secretary', 'logged out', '2023-04-07 19:43:44'),
(769, 'SV1_Treasurer', 'logged in', '2023-04-07 19:43:46'),
(770, 'SV1_Treasurer', 'logged out', '2023-04-07 19:49:20'),
(771, 'SV1_Admin', 'logged in', '2023-04-07 19:49:24'),
(772, 'SV1_Admin', 'logged out', '2023-04-07 19:49:27'),
(773, 'SV1_Treasurer', 'logged in', '2023-04-07 19:49:32'),
(774, 'SV1_Admin', 'logged in', '2023-04-07 20:10:49'),
(775, 'SV1_Treasurer', 'logged out', '2023-04-07 21:16:13'),
(776, 'SV1_Treasurer', 'logged in', '2023-04-07 21:16:18'),
(777, 'SV1_Treasurer', 'logged out', '2023-04-07 21:40:59'),
(778, 'SV1_Treasurer', 'logged in', '2023-04-07 21:41:02'),
(779, 'SV1_Treasurer', 'logged out', '2023-04-07 22:20:03'),
(780, 'SV1_Admin', 'logged in', '2023-04-07 22:20:07'),
(781, 'SV1_Admin', 'logged out', '2023-04-07 22:20:24'),
(782, 'SV1_Treasurer', 'logged in', '2023-04-07 22:20:30'),
(783, 'SV1_Treasurer', 'logged out', '2023-04-07 22:54:40'),
(784, 'Mon Carlo Delima', 'logged in', '2023-04-07 22:54:42'),
(785, 'Mon Carlo Delima', 'logged out', '2023-04-07 22:55:26'),
(786, 'SV1_Treasurer', 'logged in', '2023-04-07 22:55:30'),
(787, 'SV1_Treasurer', 'logged out', '2023-04-07 23:21:59'),
(788, 'SV1_Treasurer', 'logged in', '2023-04-08 10:19:51'),
(789, 'SV1_Treasurer', 'logged out', '2023-04-08 10:33:07'),
(790, 'SV1_Admin', 'logged in', '2023-04-08 10:33:12'),
(791, 'SV1_Admin', 'logged out', '2023-04-08 10:33:52'),
(792, 'SV1_Treasurer', 'logged in', '2023-04-08 10:33:55'),
(793, 'SV1_Treasurer', 'logged out', '2023-04-08 10:34:44'),
(794, 'SV1_Admin', 'logged in', '2023-04-08 10:34:48'),
(795, 'SV1_Admin', 'logged out', '2023-04-08 10:48:31'),
(796, 'SV1_Treasurer', 'logged in', '2023-04-08 10:48:34'),
(797, 'SV1_Treasurer', 'logged out', '2023-04-08 10:50:37'),
(798, 'SV1_Admin', 'logged in', '2023-04-08 10:50:46'),
(799, 'SV1_Admin', 'logged out', '2023-04-08 12:09:33'),
(800, 'SV1_Admin', 'logged in', '2023-04-08 12:09:35'),
(801, 'SV1_Admin', 'logged out', '2023-04-08 12:09:48'),
(802, 'SV1_Treasurer', 'logged in', '2023-04-08 12:09:55'),
(803, 'SV1_Treasurer', 'logged out', '2023-04-08 12:10:03'),
(804, 'SV1_Admin', 'logged in', '2023-04-08 12:10:08'),
(805, 'SV1_Admin', 'logged out', '2023-04-08 12:10:55'),
(806, 'SV1_Admin', 'logged in', '2023-04-08 12:11:04'),
(807, 'SV1_Admin', 'logged out', '2023-04-08 12:11:46'),
(808, 'SV1_Admin', 'logged in', '2023-04-08 12:11:53'),
(809, 'SV1_Admin', 'logged out', '2023-04-08 12:12:12'),
(810, 'Kyle Andrei Casingal', 'logged in', '2023-04-08 12:12:16'),
(811, 'Mon Carlo Delima', 'logged in', '2023-04-08 12:17:07'),
(812, 'Kyle Andrei Casingal', 'submitted a concern', '2023-04-08 12:30:20'),
(813, 'Kyle Andrei Casingal', 'logged out', '2023-04-08 12:32:50'),
(814, 'Mon Carlo Delima', 'logged in', '2023-04-08 12:32:53'),
(815, 'Mon Carlo Delima', 'logged out', '2023-04-08 12:48:32'),
(816, 'SV1_Admin', 'logged in', '2023-04-08 12:48:35'),
(817, 'SV1_Admin', 'logged out', '2023-04-08 12:48:43'),
(818, 'SV1_Treasurer', 'logged in', '2023-04-08 12:48:46'),
(819, 'SV1_Treasurer', 'logged in', '2023-04-08 18:00:37');
INSERT INTO `audit_trail` (`audit_id`, `user`, `action`, `datetime`) VALUES
(820, 'SV1_Treasurer', 'logged out', '2023-04-08 18:01:29'),
(821, 'Mon Carlo Delima', 'logged in', '2023-04-08 18:01:32'),
(822, 'Mon Carlo Delima', 'logged out', '2023-04-08 18:02:31'),
(823, 'SV1_Admin', 'logged in', '2023-04-08 18:02:42'),
(824, 'SV1_Admin', 'updated an existing system account John Does-Treasurer', '2023-04-08 18:03:13'),
(825, 'SV1_Admin', 'updated an existing system account John Does-Treasurer', '2023-04-08 18:03:24'),
(826, 'SV1_Admin', 'updated an existing system account John Doe-Treasurer', '2023-04-08 18:04:03'),
(827, 'SV1_Admin', 'updated an existing system account John Doe-Treasurer', '2023-04-08 18:04:08'),
(828, 'SV1_Admin', 'updated an existing system account John Doe-Treasurer', '2023-04-08 18:04:46'),
(829, 'SV1_Admin', 'updated an existing system account John Doe-Treasurer', '2023-04-08 18:04:50'),
(830, 'SV1_Admin', 'updated an existing system account SV1_Admins-Admin', '2023-04-08 18:05:55'),
(831, 'SV1_Admin', 'updated an existing system account SV1_Admin-Admin', '2023-04-08 18:06:01'),
(832, 'SV1_Admin', 'updated an existing system account SV1_Admin-Admin', '2023-04-08 18:06:04'),
(833, 'SV1_Admin', 'updated an existing system account John Does-Treasurer', '2023-04-08 18:07:51'),
(834, 'SV1_Admin', 'updated an existing system account John Does-Treasurer', '2023-04-08 18:07:56'),
(835, 'SV1_Admin', 'updated an existing system account -Treasurer', '2023-04-08 18:19:10'),
(836, 'SV1_Admin', 'logged out', '2023-04-08 18:19:17'),
(837, 'John Does', 'logged in', '2023-04-08 18:21:06'),
(838, 'John Does', 'logged out', '2023-04-08 18:22:32'),
(839, 'SV1_Admin', 'logged in', '2023-04-08 18:22:39'),
(840, 'SV1_Admin', 'updated an existing system account -Treasurer', '2023-04-08 18:22:48'),
(841, 'SV1_Admin', 'logged out', '2023-04-08 18:22:54'),
(842, 'John Doe', 'logged in', '2023-04-08 18:23:01'),
(843, 'John Doe', 'logged out', '2023-04-08 18:23:36'),
(844, 'SV1_Admin', 'logged in', '2023-04-08 18:23:40'),
(845, 'SV1_Admin', 'updated an existing system account -Treasurer', '2023-04-08 18:23:45'),
(846, 'SV1_Admin', 'logged out', '2023-04-08 18:23:46'),
(847, 'John Does', 'logged in', '2023-04-08 18:23:53'),
(848, 'John Does', 'logged out', '2023-04-08 18:23:57'),
(849, 'SV1_Admin', 'logged in', '2023-04-08 18:24:25'),
(850, 'SV1_Admin', 'added a new system account SV2_Admin-Admin', '2023-04-08 18:24:38'),
(851, 'SV1_Admin', 'updated an existing system account -Admin', '2023-04-08 18:25:03'),
(852, 'SV1_Admin', 'updated an existing system account -Admin', '2023-04-08 18:30:37'),
(853, 'SV1_Admin', 'updated an existing system account -Admin', '2023-04-08 18:30:40'),
(854, 'SV1_Admin', 'updated an existing system account -Admin', '2023-04-08 18:31:17'),
(855, 'SV1_Admin', 'logged out', '2023-04-08 18:31:43'),
(856, 'SV2_Admins123', 'logged in', '2023-04-08 18:31:50'),
(857, 'SV2_Admins123', 'logged out', '2023-04-08 18:31:53'),
(858, 'SV1_Admin', 'logged in', '2023-04-08 18:31:58'),
(859, 'SV1_Admin', 'updated an existing system account -Admin', '2023-04-08 18:32:04'),
(860, 'SV1_Admin', 'logged out', '2023-04-08 18:32:08'),
(861, 'SV1_Admin', 'logged in', '2023-04-08 18:36:45'),
(862, 'SV1_Admin', 'updated an existing system account -Admin', '2023-04-08 18:37:01'),
(863, 'SV1_Admin', 'updated an existing system account -Admin', '2023-04-08 18:37:23'),
(864, 'SV1_Admin', 'logged out', '2023-04-08 18:37:25'),
(865, 'SV1_Admin', 'logged in', '2023-04-09 07:24:32'),
(866, 'SV1_Admin', 'logged out', '2023-04-09 07:28:27'),
(867, 'Mon Carlo Delima', 'logged in', '2023-04-09 07:28:35'),
(868, 'Mon Carlo Delima', 'logged out', '2023-04-09 07:34:22'),
(869, 'SV1_Admin', 'logged in', '2023-04-09 07:34:25'),
(870, 'SV1_Admin', 'added homeowner test test', '2023-04-09 07:43:18'),
(871, 'SV1_Admin', 'added homeowner test test', '2023-04-09 07:54:42'),
(872, 'SV1_Admin', 'added homeowner a a', '2023-04-09 07:56:21'),
(873, 'SV1_Admin', 'added homeowner b b', '2023-04-09 07:56:49'),
(874, 'SV1_Admin', 'added homeowner b b', '2023-04-09 07:58:13'),
(875, 'SV1_Admin', 'added homeowner b b', '2023-04-09 08:02:09'),
(876, 'SV1_Admin', 'added homeowner c c', '2023-04-09 08:02:34'),
(877, 'Mon Carlo Delima', 'updated homeowner Mon Carlo Delima', '2023-04-09 08:07:53'),
(878, 'Mon Carlo Delima', 'updated homeowner Mon Carlo Delima', '2023-04-09 08:08:13'),
(879, 'Mon Carlo Delima', 'updated homeowner Mon Carlo Delima', '2023-04-09 08:08:56'),
(880, 'Mon Carl Delima', 'updated homeowner Mon Carl Delima', '2023-04-09 08:09:25'),
(881, 'Mon Carlo Delima', 'updated homeowner Mon Carlo Delima', '2023-04-09 08:10:29'),
(882, 'Mon Carlo Delima', 'updated homeowner Mon Carlo Delima', '2023-04-09 08:11:43'),
(883, 'Mon Carlo Delima', 'updated homeowner Mon Carlo Delima', '2023-04-09 08:13:00'),
(884, 'Mon Carlo Delima', 'updated homeowner Mon Carlo Delima', '2023-04-09 08:13:41'),
(885, 'Mon Carlo Delima', 'updated homeowner Mon Carlo Delima', '2023-04-09 08:15:18'),
(886, 'Mon Carlo Delima', 'updated homeowner Mon Carlo Delima', '2023-04-09 08:16:00'),
(887, 'Mon Carlo Delima', 'logged out', '2023-04-09 08:17:08'),
(888, 'Mon Carlo Delima', 'logged in', '2023-04-09 08:17:13'),
(889, 'Mon Carlo Delima', 'logged out', '2023-04-09 08:17:27'),
(890, 'SV1_Admin', 'logged in', '2023-04-09 08:19:03'),
(891, 'SV1_Admin', 'logged out', '2023-04-09 08:19:05'),
(892, 'Mon Carlo Delima', 'logged in', '2023-04-09 08:19:07'),
(893, 'Mon Carlo Delima', 'logged out', '2023-04-09 08:19:12'),
(894, 'SV1_Admin', 'logged in', '2023-04-09 08:19:13'),
(895, 'SV1_Admin', 'updated homeowner Mon Carlo Delima', '2023-04-09 08:22:52'),
(896, 'SV1_Admin', 'updated homeowner Mon Carlo Delima', '2023-04-09 08:23:15'),
(897, 'SV1_Admin', 'logged out', '2023-04-09 08:23:57'),
(898, 'SV1_Admin', 'logged in', '2023-04-09 08:23:59'),
(899, 'SV1_Admin', 'added a new system account SV3_Admin-Admin', '2023-04-09 08:24:14'),
(900, 'SV1_Admin', 'logged out', '2023-04-09 08:24:29'),
(901, 'SV3_Admin', 'logged in', '2023-04-09 08:24:36'),
(902, 'SV3_Admin', 'logged out', '2023-04-09 08:24:39'),
(903, 'SV1_Admin', 'logged in', '2023-04-09 08:24:45'),
(904, 'SV1_Admin', 'updated an existing system account -Admin', '2023-04-09 08:24:53'),
(905, 'SV1_Admin', 'updated an existing system account -Admin', '2023-04-09 08:25:02'),
(906, 'SV1_Admin', 'logged out', '2023-04-09 08:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `billing_period`
--

DROP TABLE IF EXISTS `billing_period`;
CREATE TABLE IF NOT EXISTS `billing_period` (
  `billingPeriod_id` int(11) NOT NULL AUTO_INCREMENT,
  `month` varchar(45) NOT NULL,
  `year` varchar(45) NOT NULL,
  PRIMARY KEY (`billingPeriod_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing_period`
--

INSERT INTO `billing_period` (`billingPeriod_id`, `month`, `year`) VALUES
(1, 'January', '2023'),
(2, 'February', '2023'),
(3, 'March', '2023'),
(4, 'April', '2023'),
(5, 'May', '2023'),
(6, 'June', '2023'),
(7, 'July', '2023'),
(8, 'August', '2023'),
(9, 'September', '2023'),
(10, 'October', '2023'),
(11, 'November', '2023'),
(12, 'December', '2023'),
(13, 'January', '2024'),
(14, 'February', '2024'),
(15, 'March', '2024'),
(16, 'April', '2024'),
(17, 'May', '2024'),
(18, 'June', '2024'),
(19, 'July', '2024'),
(20, 'August', '2024'),
(21, 'September', '2024'),
(22, 'October', '2024'),
(23, 'November', '2024'),
(24, 'December', '2024'),
(25, 'January', '2024'),
(26, 'February', '2024'),
(27, 'March', '2024'),
(28, 'April', '2024'),
(29, 'May', '2024'),
(30, 'June', '2024'),
(31, 'July', '2024'),
(32, 'August', '2024'),
(33, 'September', '2024'),
(34, 'October', '2024'),
(35, 'November', '2024'),
(36, 'December', '2024'),
(37, 'January', '2024'),
(38, 'February', '2024'),
(39, 'March', '2024'),
(40, 'April', '2024'),
(41, 'May', '2024'),
(42, 'June', '2024'),
(43, 'July', '2024'),
(44, 'August', '2024'),
(45, 'September', '2024'),
(46, 'October', '2024'),
(47, 'November', '2024'),
(48, 'December', '2024'),
(49, 'January', '2024'),
(50, 'February', '2024'),
(51, 'March', '2024'),
(52, 'April', '2024'),
(53, 'May', '2024'),
(54, 'June', '2024'),
(55, 'July', '2024'),
(56, 'August', '2024'),
(57, 'September', '2024'),
(58, 'October', '2024'),
(59, 'November', '2024'),
(60, 'December', '2024'),
(61, 'January', '2024'),
(62, 'February', '2024'),
(63, 'March', '2024'),
(64, 'April', '2024'),
(65, 'May', '2024'),
(66, 'June', '2024'),
(67, 'July', '2024'),
(68, 'August', '2024'),
(69, 'September', '2024'),
(70, 'October', '2024'),
(71, 'November', '2024'),
(72, 'December', '2024');

-- --------------------------------------------------------

--
-- Table structure for table `bill_consumer`
--

DROP TABLE IF EXISTS `bill_consumer`;
CREATE TABLE IF NOT EXISTS `bill_consumer` (
  `billConsumer_id` int(11) NOT NULL AUTO_INCREMENT,
  `billingPeriod_id` int(11) NOT NULL,
  `homeowner_id` int(11) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `amount` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`billConsumer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill_consumer`
--

INSERT INTO `bill_consumer` (`billConsumer_id`, `billingPeriod_id`, `homeowner_id`, `fullname`, `amount`, `status`) VALUES
(1, 1, 1, 'Mon Carlo Delima', '200', 'PAID'),
(2, 2, 1, 'Mon Carlo Delima', '200', 'PAID'),
(3, 3, 1, 'Mon Carlo Delima', '200', 'PAID'),
(4, 1, 2, 'Kyle Andrei Casingal', '500', 'PAID'),
(5, 2, 2, 'Kyle Andrei Casingal', '500', 'PAID'),
(6, 3, 2, 'Kyle Andrei Casingal', '500', 'PAID'),
(7, 4, 2, 'Kyle Andrei Casingal', '500', 'PAID'),
(8, 5, 2, 'Kyle Andrei Casingal', '500', 'PAID'),
(9, 6, 2, 'Kyle Andrei Casingal', '500', 'PAID'),
(10, 7, 2, 'Kyle Andrei Casingal', '500', 'PAID'),
(11, 8, 2, 'Kyle Andrei Casingal', '500', 'PAID'),
(12, 9, 2, 'Kyle Andrei Casingal', '500', 'PAID');

-- --------------------------------------------------------

--
-- Table structure for table `concern`
--

DROP TABLE IF EXISTS `concern`;
CREATE TABLE IF NOT EXISTS `concern` (
  `concern_id` int(11) NOT NULL AUTO_INCREMENT,
  `complainant_homeowner_id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `complainee_homeowner_id` int(11) DEFAULT NULL,
  `complainee_full_name` varchar(100) DEFAULT NULL,
  `concern_subject` varchar(100) NOT NULL,
  `concern_description` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `datetime` datetime DEFAULT NULL,
  `datetime_submitted` datetime DEFAULT NULL,
  PRIMARY KEY (`concern_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `concern`
--

INSERT INTO `concern` (`concern_id`, `complainant_homeowner_id`, `full_name`, `complainee_homeowner_id`, `complainee_full_name`, `concern_subject`, `concern_description`, `status`, `datetime`, `datetime_submitted`) VALUES
(1, 1, 'Mon Carlo Delima', NULL, NULL, 'This is a Concern', 'I am very Concern', 'Resolved', '2023-04-07 15:07:44', '2023-04-06 23:33:30'),
(2, 16, 'Janwel Castillo', 1, 'Mon Carlo Delima', 'Ipapa tulfo kita', 'wahahahaha', 'Resolved', '2023-04-07 15:07:47', '2023-04-06 23:44:02'),
(3, 1, 'Mon Carlo Delima', 16, 'Janwel Castillo', 'Pwede bang mamaya na', 'Sorry camera', 'Resolved', '2023-04-08 12:10:44', '2023-04-06 23:59:18'),
(4, 2, 'Kyle Andrei Casingal', 4, 'John Doe', 'John Doe is doing it', 'Akala ko ikaw ay akin.', 'Processing', '2023-04-08 18:02:58', '2023-04-08 12:30:20');

-- --------------------------------------------------------

--
-- Table structure for table `homeowner_profile`
--

DROP TABLE IF EXISTS `homeowner_profile`;
CREATE TABLE IF NOT EXISTS `homeowner_profile` (
  `homeowner_id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `suffix` varchar(100) DEFAULT NULL,
  `sex` varchar(100) NOT NULL,
  `street` varchar(255) NOT NULL,
  `subdivision` varchar(255) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `business_address` varchar(255) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `email_address` varchar(100) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `mobile_number` varchar(20) DEFAULT NULL,
  `employer` varchar(100) DEFAULT NULL,
  `vehicle_registration` varchar(20) DEFAULT NULL,
  `display_picture` varchar(255) NOT NULL,
  PRIMARY KEY (`homeowner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `homeowner_profile`
--

INSERT INTO `homeowner_profile` (`homeowner_id`, `last_name`, `first_name`, `middle_name`, `suffix`, `sex`, `street`, `subdivision`, `barangay`, `business_address`, `occupation`, `email_address`, `birthdate`, `mobile_number`, `employer`, `vehicle_registration`, `display_picture`) VALUES
(1, 'Delima', 'Mon Carlo', 'Zonio', 'N/A', 'Male', 'Lot 1 Block 2', 'Sunnyvale 1', 'Pantok', 'N/A', 'N/A', 'dmoncarlo6@gmail.com', '2002-10-06', '09157189636', 'N/A', 'LTO 5678', 'hdversion.png'),
(2, 'Casingal', 'Kyle Andrei', 'Morillo', 'N/A', 'Male', 'Lot 1 Block 1', 'Sunnyvale 3', 'Palangoy', 'N/A', 'N/A', 'kylecasingal36@gmail.com', '2001-09-02', '09123456789', 'N/A', 'N/A', '316495100_870517180796101_3304939871151226288_n.jpg'),
(3, 'Flores', 'Jeune Paolus', 'Damaso', 'N/A', 'Male', 'Lot 1 Block 3', 'Sunnyvale 2', 'Pantok', 'N/A', 'N/A', 'floresjeunepaolus@gmail.com', '2002-06-16', '09123123123', 'Inya', 'N/A', '316156823_3360766927514073_2770550987709432568_n.jpg'),
(4, 'Doe', 'John', 'N/A', 'Jr.', 'Male', 'Lot 2 Block 4', 'Sunnyvale 3', 'Palangoy', 'N/A', 'Programmer', 'dmoncarlo@gmail.com', '2002-10-06', '09157189636', 'Mark Zuckerberg', 'N/A', 'default.png'),
(8, 'BendaÃ±a', 'Krishtalene', 'Edejer', 'N/A', 'Female', 'Lot 1 Block 5', 'Sunnyvale 2', 'Pantok', 'N/A', 'N/A', 'tissabendana@gmail.com', '2002-10-19', '09123456789', 'N/A', 'N/A', '86705321_2748280675293170_833038108541845504_n.jpg'),
(17, 'Escueta', 'Roiemar', 'Conchada', 'N/A', 'Male', 'Lot 4 Block 3', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'escuetaroiemar@gmail.com', '2022-11-28', '09123456789', 'N/A', 'N/A', 'default.png'),
(16, 'Castillo', 'Janwel', NULL, 'N/A', 'Male', 'Lot 2 Block 3 ', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'janweljigycastillo20@gmail.com', '2022-11-25', '09123456789', 'N/A', 'N/A', '315887907_1137649846869408_655406644278059076_n.png'),
(30, 'Doe', 'John', 'Smith', 'N/A', 'Male', 'Lot 1 Block 8', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'johndoe@gmail.com', '2010-01-01', '09123456789', 'N/A', 'N/A', 'default.png'),
(28, '', 'SV1_Secretary', NULL, NULL, '', '', '', '', NULL, NULL, '', '2022-11-29', '', NULL, NULL, 'default.png'),
(31, 'Lowery', 'Amirah', 'Meyers', 'N/A', 'Female', 'Lot 1 Block 7', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'amirahlowery@gmail.com', '2009-01-15', '09123456789', 'N/A', 'N/A', 'default.png'),
(32, 'Miller', 'Kian', 'Smith', 'N/A', 'Female', 'Lot 2 Block 10', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'Kian Miller', '1997-07-16', '09123456789', 'N/A', 'N/A', 'default.png'),
(33, 'Shepherd', 'Leona', 'Villegas', 'N/A', 'Female', 'Lot 2 Block 4', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'leonashepherd@gmail.com', '2000-02-29', '09123456789', 'N/A', 'N/A', 'default.png'),
(34, 'Warner', 'Sophie', 'Manning', 'N/A', 'Female', 'Lot 3 Block 7', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'sophiewarner@gmail.com', '1998-06-03', '09123456789', 'N/A', 'N/A', 'default.png'),
(35, 'Hudson', 'Tristram', 'Ray', 'N/A', 'Male', 'Lot 4 Block 1', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'tristramhudson', '1982-07-29', '09123456789', 'N/A', 'N/A', 'default.png'),
(36, '', 'SV1_Treasurer', NULL, NULL, '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, 'default.png'),
(37, '', 'SV2_Admin', NULL, NULL, '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, 'default.png'),
(39, 'Sta. Maria', 'Marco Ivan', 'Quierrez', 'N/A', 'Male', 'Lot 4 Block 3', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'marcoivanstamaria@gmail.com', '2001-06-13', '09123456789', 'N/A', 'N/A', '290509682_1413885909103188_6599438684369654480_n.jpg'),
(40, 'Dalisay', 'Cardo', 'Dela Cruz', 'N/A', 'Male', 'Block 3 Lot 5', 'Sunnyvale 2', 'Palangoy', 'Palangoy', 'N/A', 'cardoDalisay@gmail.com', '1977-11-07', '09123456789', 'N/A', 'N/A', 'default.png'),
(44, 'test', 'test', 'pogi', 'N/A', 'Male', 'Lot 1 Block 1', 'Sunnyvale 4', 'Pantok', 'N/A', 'N/A', 'test@gmail.com', '2023-04-09', '09987654321', 'N/A', 'LTO 1234', 'default.png'),
(18, '', 'SV1_Admin', NULL, NULL, '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, 'default.png'),
(50, '', 'SV3_Admin', NULL, NULL, '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `mission_vision`
--

DROP TABLE IF EXISTS `mission_vision`;
CREATE TABLE IF NOT EXISTS `mission_vision` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mission_vision`
--

INSERT INTO `mission_vision` (`id`, `type`, `description`) VALUES
(1, 'Mission', 'Natatangi ka, paraluman\r\nKislap mo\'y \'di maiwan, \'di iiwan\r\nMamahalin kita nang marahan\r\nSayo\'y paroroon sa kalawakan'),
(2, 'Vision', 'Palad ay basang-basa\r\nAng dagitab ay damang-dama\r\nSa \'king kalamnang punong-puno\r\nNg pananabik at ng kaba'),
(3, 'Goals', 'Naaalala ko pa no\'ng tayo pang dalawa\r\nSine lang ay okay ka na\r\nPero ngayon, kolehiyala ka na\r\nMas trip mong magtoma');

-- --------------------------------------------------------

--
-- Table structure for table `monthly_dues`
--

DROP TABLE IF EXISTS `monthly_dues`;
CREATE TABLE IF NOT EXISTS `monthly_dues` (
  `monthly_dues_id` int(11) NOT NULL AUTO_INCREMENT,
  `subdivision_id` int(10) NOT NULL,
  `subdivision_name` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`monthly_dues_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `monthly_dues`
--

INSERT INTO `monthly_dues` (`monthly_dues_id`, `subdivision_id`, `subdivision_name`, `amount`, `updated_at`) VALUES
(1, 1, 'Sunnyvale 1', 200, '2022-11-27'),
(2, 2, 'Sunnyvale 2', 280, '2023-04-07'),
(3, 3, 'Sunnyvale 3', 500, '2022-11-29'),
(4, 4, 'Sunnyvale 4', 350, '2022-11-27');

-- --------------------------------------------------------

--
-- Table structure for table `monthly_dues_bill`
--

DROP TABLE IF EXISTS `monthly_dues_bill`;
CREATE TABLE IF NOT EXISTS `monthly_dues_bill` (
  `monthlyDues_ID` int(11) NOT NULL AUTO_INCREMENT,
  `homeowner_name` varchar(255) NOT NULL,
  `subdivision` varchar(45) NOT NULL,
  `month` varchar(45) NOT NULL,
  `year` varchar(45) NOT NULL,
  `address` varchar(255) NOT NULL,
  `paid_at` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`monthlyDues_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `monthly_dues_bill`
--

INSERT INTO `monthly_dues_bill` (`monthlyDues_ID`, `homeowner_name`, `subdivision`, `month`, `year`, `address`, `paid_at`, `status`) VALUES
(1, 'Mon Carlo Delima', 'Sunnyvale 1', 'December', '2022', 'Block 1 Lot 2', '2022-12-01 02:36:53', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `officers`
--

DROP TABLE IF EXISTS `officers`;
CREATE TABLE IF NOT EXISTS `officers` (
  `officer_id` int(11) NOT NULL AUTO_INCREMENT,
  `subdivision_name` varchar(50) NOT NULL,
  `officer_name` varchar(255) NOT NULL,
  `position_name` varchar(50) NOT NULL,
  PRIMARY KEY (`officer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `officers`
--

INSERT INTO `officers` (`officer_id`, `subdivision_name`, `officer_name`, `position_name`) VALUES
(1, 'Sunnyvale 1', 'Saddie Wheeler', 'President'),
(2, 'Sunnyvale 1', 'Bennett Cooke', 'Vice President'),
(3, 'Sunnyvale 1', 'Martin Craig', 'Secretary'),
(4, 'Sunnyvale 1', 'Audrey Benson', 'Treasurer'),
(5, 'Sunnyvale 1', 'Ruth Walsh', 'Auditor'),
(6, 'Sunnyvale 1', 'Hadley Steele', 'PIO'),
(7, 'Sunnyvale 1', 'Tadano Hitohito', 'Sgt.at Arms'),
(10, 'Sunnyvale 2', 'Bogart D. Explorer', 'President'),
(13, 'Sunnyvale 10', 'Monkey D. Luffy', 'President'),
(14, 'Sunnyvale 10', 'Portgas D. Ace', 'Vice President'),
(15, 'Sunnyvale 10', 'Chopper', 'Treasurer');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
CREATE TABLE IF NOT EXISTS `positions` (
  `position_id` int(11) NOT NULL AUTO_INCREMENT,
  `subdivision_id` int(11) NOT NULL,
  `subdivision_name` varchar(50) NOT NULL,
  `position_name` varchar(255) NOT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`position_id`, `subdivision_id`, `subdivision_name`, `position_name`) VALUES
(1, 1, 'Sunnyvale 1', 'President'),
(2, 1, 'Sunnyvale 1', 'Vice President'),
(3, 1, 'Sunnyvale 1', 'Secretary'),
(4, 1, 'Sunnyvale 1', 'Treasurer'),
(5, 1, 'Sunnyvale 1', 'Auditor'),
(6, 1, 'Sunnyvale 1', 'PIO'),
(7, 1, 'Sunnyvale 1', 'Sgt.at Arms');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `published_at` datetime NOT NULL,
  `days_archive` int(11) DEFAULT NULL,
  `content_image` varchar(255) DEFAULT NULL,
  `officer_post` varchar(10) NOT NULL,
  `post_status` varchar(45) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `full_name`, `title`, `content`, `published_at`, `days_archive`, `content_image`, `officer_post`, `post_status`) VALUES
(1, 28, 'Mon Carlo Delima', 'The moon is beautiful, isn\'t it?', '', '2022-11-24 01:09:01', NULL, '315906640_1753081135077201_6331420859846659098_n.png', 'No', 'Archived'),
(2, 24, 'Jeune Paolus Flores', 'Fascinating art created by nature.', '', '2022-11-24 09:59:54', NULL, '316218368_829271824950879_360246867658747215_n.png', 'No', 'Archived'),
(3, 23, 'Kyle Andrei Casingal', 'Reflection', 'Imagine seeing these astonishing cars, lively blue skies, and few waves of clouds in an upside-down world. Inconceivable, isn\'t it?', '2022-11-24 10:03:11', NULL, '316189223_691988422233113_5145406262467036356_n.png', 'No', 'Archived'),
(4, 23, 'Kyle Andrei Casingal', 'Windows of truth shows the real beauty of nature.', '', '2022-11-24 10:04:40', NULL, '313194508_684251046380877_4560164667618025920_n.png', 'No', 'Archived'),
(5, 28, 'Mon Carlo Delima', 'Vintage mansion represents calm, warm, and peace.', '', '2022-11-24 10:05:22', NULL, '312140489_698881924813395_203606755662892340_n.png', 'No', 'Archived'),
(15, 52, 'Marco Ivan Sta. Maria', '', 'Oh well, the sun strengthens the health of the plant, does this photo represents a good day because of that?', '2022-12-01 06:37:21', NULL, 'Picture2.jpg', 'No', 'Archived'),
(17, 53, 'Krishtalene BendaÃ±a', '', 'Just had a ride inside the Sunnyvale subdivision, I feel like this will be part of my everyday routine.', '2022-12-01 06:48:54', NULL, 'Picture4.png', 'No', 'Archived'),
(18, 52, 'Marco Ivan Sta. Maria', '', 'The kids enjoyed the party in Sunnyvale Subdivision, it\'s great seeing them happy while watching the program.', '2022-12-01 06:49:23', NULL, 'Picture5.jpg', 'No', 'Archived'),
(19, 53, 'Krishtalene BendaÃ±a', '', 'Hi everyone! Just want to share this beautiful view I took near Sunnyvale Subdivision. It\'s in ArtSector Gallery and Chimney Cafe 360Â°. Let\'s visit this place together.', '2022-12-01 06:50:15', NULL, 'Picture6.jpg', 'No', 'Archived'),
(20, 52, 'Marco Ivan Sta. Maria', '', 'Sometimes it\'s good to be blue. How sweet to be a cloud and floating in blue. I never get tired of the blue sky.', '2022-12-01 06:51:00', NULL, 'Picture3.png', 'No', 'Archived'),
(24, 55, 'Kyle Andrei Casingal', 'Light Bulb', 'insert description here', '2022-12-01 10:13:20', NULL, '188-1889845_a-very-simple-concept-infinitustoken-medium-light-bulb.png', 'No', 'Archived'),
(28, 18, 'SV1_Admin', 'Water interruption', 'test', '2023-01-24 20:00:38', NULL, '', 'Yes', 'Active'),
(29, 18, 'SV1_Admin', 'Chinese New Year event', 'test', '2023-01-24 20:06:20', NULL, '', 'Yes', 'Active'),
(30, 1, 'Mon Carlo Delima', 'URS', 'University of Rizal System - Binangonan', '2023-03-16 22:24:20', NULL, 'URS.png', 'No', 'Archived'),
(31, 1, 'Mon Carlo Delima', 'Nihonjin Desu', 'Japan numba 1', '2023-04-02 12:59:46', NULL, 'lockscreen.png', 'No', 'Active'),
(32, 1, 'Mon Carlo Delima', 'Magical World', 'I love Biringan', '2023-04-02 13:00:31', NULL, 'sEt5ph.jpg', 'No', 'Active'),
(33, 18, 'SV1_Admin', 'test', 'test', '2023-04-02 13:06:44', 1, '', 'Yes', 'Archived');

-- --------------------------------------------------------

--
-- Table structure for table `subdivision`
--

DROP TABLE IF EXISTS `subdivision`;
CREATE TABLE IF NOT EXISTS `subdivision` (
  `subdivision_id` int(11) NOT NULL AUTO_INCREMENT,
  `subdivision_name` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  PRIMARY KEY (`subdivision_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subdivision`
--

INSERT INTO `subdivision` (`subdivision_id`, `subdivision_name`, `barangay`) VALUES
(1, 'Sunnyvale 1', 'Pantok'),
(2, 'Sunnyvale 2', 'Palangoy'),
(3, 'Sunnyvale 3', 'Palangoy'),
(4, 'Sunnyvale 4', 'Pantok');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `renter_name` varchar(255) NOT NULL,
  `total_cost` int(11) DEFAULT NULL,
  `payment_proof` varchar(255) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `user_id`, `renter_name`, `total_cost`, `payment_proof`, `status`) VALUES
(1, 1, 'Mon Carlo Delima', 1500, '315887907_1137649846869408_655406644278059076_n.png', 'Approved'),
(2, 48, 'SV1_Treasurer', 180, '315887907_1137649846869408_655406644278059076_n.png', 'Approved'),
(3, 1, 'Mon Carlo Delima', 2150, '328148270_726681382138928_1391919010667224674_n.png', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_homeowner_id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `user_type` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email_address` varchar(40) DEFAULT NULL,
  `account_status` varchar(15) NOT NULL,
  `verification_code` varchar(6) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_homeowner_id`, `full_name`, `user_type`, `password`, `email_address`, `account_status`, `verification_code`, `email_verified_at`) VALUES
(55, 2, 'Kyle Andrei Casingal', 'Homeowner', 'password', 'kylecasingal36@gmail.com', 'Activated', '248425', '2022-12-01 10:11:20'),
(3, 3, 'Jeune Paolus Flores', 'Homeowner', 'thisfeelsgud', 'floresjeunepaolus@gmail.com', 'Activated', '943962', '2022-11-10 22:51:58'),
(1, 1, 'Mon Carlo Delima', 'Homeowner', '12345', 'dmoncarlo6@gmail.com', 'Activated', '286140', '2022-11-24 13:48:07'),
(27, 16, 'Janwel Castillo', 'Homeowner', 'dadada', 'janweljigycastillo20@gmail.com', 'Activated', '943962', '2022-11-15 20:43:59'),
(58, 50, 'SV3_Admin', 'Admin', 'password', 'SV3_Admin', 'Activated', NULL, NULL),
(18, 18, 'SV1_Admin', 'Admin', 'password', 'SV1_Admin', 'Activated', NULL, NULL),
(42, 17, 'Roiemar Escueta', 'Homeowner', '123', 'escuetaroiemar@gmail.com', 'Deactivated', '135447', '2022-11-28 23:28:23'),
(46, 28, 'SV1_Secretary', 'Secretary', '123', 'SV1_Secretary', 'Activated', NULL, NULL),
(48, 36, 'SV1_Treasurer', 'Treasurer', '123', 'SV1_Treasurer', 'Activated', NULL, NULL),
(49, 37, 'SV2_Admin', 'Admin', 'password', 'SV2_Admin', 'Activated', NULL, NULL),
(52, 39, 'Marco Ivan Sta. Maria', 'Homeowner', '123', 'marcoivanstamaria@gmail.com', 'Activated', '257545', '2022-12-01 06:31:28'),
(53, 8, 'Krishtalene BendaÃ±a', 'Homeowner', '123', 'tissabendana@gmail.com', 'Activated', '573856', '2022-12-01 06:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

DROP TABLE IF EXISTS `years`;
CREATE TABLE IF NOT EXISTS `years` (
  `yearID` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(45) NOT NULL,
  PRIMARY KEY (`yearID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`yearID`, `year`) VALUES
(1, '2023'),
(2, '2024'),
(3, '2025'),
(4, '2026'),
(5, '2027');

DELIMITER $$
--
-- Events
--
DROP EVENT IF EXISTS `archive`$$
CREATE DEFINER=`root`@`localhost` EVENT `archive` ON SCHEDULE EVERY '0:1' MINUTE_SECOND STARTS '2023-04-01 21:59:31' ON COMPLETION PRESERVE ENABLE DO UPDATE `post` SET `post_status`='Archived' WHERE `published_at` < NOW() - INTERVAL 7 DAY AND `post_status` = 'Active' AND `officer_post`= 'No'$$

DROP EVENT IF EXISTS `days_archive`$$
CREATE DEFINER=`root`@`localhost` EVENT `days_archive` ON SCHEDULE EVERY '0:1' MINUTE_SECOND STARTS '2023-04-02 13:29:33' ON COMPLETION PRESERVE ENABLE DO UPDATE `post` SET `post_status`='Archived' WHERE `published_at` < NOW() - INTERVAL `days_archive` DAY AND `post_status`='Active' AND `officer_post`= 'Yes'$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
