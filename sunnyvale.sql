-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Feb 10, 2023 at 11:47 AM
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
  `price` int(11) NOT NULL,
  `availability` varchar(50) NOT NULL,
  PRIMARY KEY (`amenity_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`amenity_id`, `amenity_name`, `subdivision_id`, `subdivision_name`, `price`, `availability`) VALUES
(1, 'Court', 1, 'Sunnyvale 1', 200, 'Available'),
(4, 'Multi-purpose Hall', 1, 'Sunnyvale 1', 200, 'Available'),
(5, 'Swimming Pool', 1, 'Sunnyvale 1', 200, 'Available'),
(6, 'Clubhouse', 1, 'Sunnyvale 1', 400, 'Unavailable'),
(10, 'Clubhouse', 3, 'Sunnyvale 3', 250, 'Available'),
(14, 'Volleyball Court', 2, 'Sunnyvale 2', 21, 'Available'),
(16, 'Bathhouse', 1, 'Sunnyvale 1', 300, 'Available');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `amenity_purpose`
--

INSERT INTO `amenity_purpose` (`amenity_purpose_id`, `amenity_id`, `amenity_purpose`, `day_rate`, `night_rate`) VALUES
(1, 1, 'Basketball', 50, 100);

-- --------------------------------------------------------

--
-- Table structure for table `amenity_renting`
--

DROP TABLE IF EXISTS `amenity_renting`;
CREATE TABLE IF NOT EXISTS `amenity_renting` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `renter_name` varchar(255) NOT NULL,
  `subdivision_name` varchar(255) NOT NULL,
  `amenity_name` varchar(255) NOT NULL,
  `amenity_purpose` varchar(255) NOT NULL,
  `date_from` datetime DEFAULT NULL,
  `date_to` datetime DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `payment_proof` varchar(255) DEFAULT NULL,
  `cart` varchar(10) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `amenity_renting`
--

INSERT INTO `amenity_renting` (`transaction_id`, `user_id`, `renter_name`, `subdivision_name`, `amenity_name`, `amenity_purpose`, `date_from`, `date_to`, `cost`, `payment_proof`, `cart`) VALUES
(2, 1, 'Mon Carlo Delima', 'Sunnyvale 1', 'Court', 'Basketball', NULL, NULL, NULL, NULL, 'Yes'),
(3, 1, 'Mon Carlo Delima', '', '', '', NULL, NULL, NULL, NULL, 'Yes');

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
) ENGINE=MyISAM AUTO_INCREMENT=364 DEFAULT CHARSET=utf8;

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
(363, 'Mon Carlo Delima', 'logged in', '2023-02-10 10:25:18');

-- --------------------------------------------------------

--
-- Table structure for table `concern`
--

DROP TABLE IF EXISTS `concern`;
CREATE TABLE IF NOT EXISTS `concern` (
  `concern_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL,
  `concern_subject` varchar(100) NOT NULL,
  `concern_description` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`concern_id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `concern`
--

INSERT INTO `concern` (`concern_id`, `full_name`, `concern_subject`, `concern_description`, `status`, `datetime`) VALUES
(1, 'Kyle Casingal', 'Noise Complaint', 'Nagvivideoke pa rin yung kapitbahay namin kahit lagpas 10 na', 'Pending', '2022-11-10 22:13:45'),
(2, 'Kyle Casingal', 'Basura', 'Kung saan-saan nagtatapon ng basura yung kapitbahay ko.', 'Pending', '2022-11-02 22:13:59'),
(3, 'Mon Carlo Delima', 'Vandalism', 'Dinrawingan ng kapitbahay namin yung kalsada sa tapat ng bahay namin.', 'Pending', '2022-11-04 22:14:02'),
(6, 'Mon Carlo Delima', 'Aso', 'Nagtatae sa harap ng bahay', 'Pending', '2022-11-22 22:14:03'),
(7, 'Mon Carlo Delima', 'Kapitbahay', 'Malapit na magsaksakan', 'Pending', '2022-11-18 22:14:06'),
(41, 'Mon Carlo Delima', 'Lasing', 'Nagwawala sa daan', 'Pending', '2022-11-20 22:14:08'),
(45, 'Mon Carlo Delima', 'Batang maingay', 'Iyak nang iyak', 'Pending', '2022-11-27 22:14:09'),
(44, 'Mon Carlo Delima', 'Pusa sa bubong', 'Nagnanakaw ng ulam', 'Pending', '2022-11-28 22:14:11'),
(43, 'Mon Carlo Delima', 'Singer', 'Sintunado, maingay', 'Pending', '2022-11-12 22:14:13'),
(42, 'Mon Carlo Delima', 'Noise complaint', 'nagddrums, hindi naman magaling', 'Pending', '2022-11-18 22:14:15'),
(46, 'Kyle Andrei Casingal', 'Noise Complain', 'being too loud at 10 pm ', 'Pending', NULL);

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
  `mobile_number` varchar(20) NOT NULL,
  `employer` varchar(100) DEFAULT NULL,
  `display_picture` varchar(255) NOT NULL,
  PRIMARY KEY (`homeowner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `homeowner_profile`
--

INSERT INTO `homeowner_profile` (`homeowner_id`, `last_name`, `first_name`, `middle_name`, `suffix`, `sex`, `street`, `subdivision`, `barangay`, `business_address`, `occupation`, `email_address`, `birthdate`, `mobile_number`, `employer`, `display_picture`) VALUES
(1, 'Delima', 'Mon Carlo', 'Zonio', 'N/A', 'Male', 'Lot 1 Block 2', 'Sunnyvale 1', 'Pantok', 'N/A', 'N/A', 'dmoncarlo6@gmail.com', '2002-10-06', '09157189636', 'N/A', 'hdversion.png'),
(2, 'Casingal', 'Kyle Andrei', 'Morillo', 'N/A', 'Male', 'Lot 1 Block 1', 'Sunnyvale 3', 'Palangoy', 'N/A', 'N/A', 'kylecasingal36@gmail.com', '2001-09-02', '09123456789', 'N/A', '316495100_870517180796101_3304939871151226288_n.jpg'),
(3, 'Flores', 'Jeune Paolus', 'Damaso', 'N/A', 'Male', 'Lot 1 Block 3', 'Sunnyvale 2', 'Pantok', 'N/A', 'N/A', 'floresjeunepaolus@gmail.com', '2002-06-16', '09123123123', 'Inya', '316156823_3360766927514073_2770550987709432568_n.jpg'),
(4, 'Doe', 'John', 'N/A', 'Jr.', 'Male', 'Lot 2 Block 4', 'Sunnyvale 3', 'Palangoy', 'N/A', 'Programmer', 'dmoncarlo@gmail.com', '2002-10-06', '09157189636', 'Mark Zuckerberg', 'default.png'),
(18, '', 'SV1_Admin', NULL, NULL, '', '', '', '', NULL, '', '', NULL, '', 'N/A', 'default.png'),
(8, 'BendaÃ±a', 'Krishtalene', 'Edejer', 'N/A', 'Female', 'Lot 1 Block 5', 'Sunnyvale 2', 'Pantok', 'N/A', 'N/A', 'tissabendana@gmail.com', '2002-10-19', '09123456789', 'N/A', '86705321_2748280675293170_833038108541845504_n.jpg'),
(17, 'Escueta', 'Roiemar', 'Conchada', 'N/A', 'Male', 'Lot 4 Block 3', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'escuetaroiemar@gmail.com', '2022-11-28', '09123456789', 'N/A', 'default.png'),
(16, 'castillo', 'janwel', NULL, 'N/A', 'Male', 'Lot 2 Block 3 ', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'janweljigycastillo20@gmail.com', '2022-11-25', '09123456789', 'N/A', '315887907_1137649846869408_655406644278059076_n.png'),
(30, 'Doe', 'John', 'Smith', 'N/A', 'Male', 'Lot 1 Block 8', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'johndoe@gmail.com', '2010-01-01', '09123456789', 'N/A', 'default.png'),
(28, '', 'SV1_Secretary', NULL, NULL, '', '', '', '', NULL, NULL, '', '2022-11-29', '', '', 'default.png'),
(31, 'Lowery', 'Amirah', 'Meyers', 'N/A', 'Female', 'Lot 1 Block 7', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'amirahlowery@gmail.com', '2009-01-15', '09123456789', 'N/A', 'default.png'),
(32, 'Miller', 'Kian', 'Smith', 'N/A', 'Female', 'Lot 2 Block 10', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'Kian Miller', '1997-07-16', '09123456789', 'N/A', 'default.png'),
(33, 'Shepherd', 'Leona', 'Villegas', 'N/A', 'Female', 'Lot 2 Block 4', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'leonashepherd@gmail.com', '2000-02-29', '09123456789', 'N/A', 'default.png'),
(34, 'Warner', 'Sophie', 'Manning', 'N/A', 'Female', 'Lot 3 Block 7', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'sophiewarner@gmail.com', '1998-06-03', '09123456789', 'N/A', 'default.png'),
(35, 'Hudson', 'Tristram', 'Ray', 'N/A', 'Male', 'Lot 4 Block 1', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'tristramhudson', '1982-07-29', '09123456789', 'N/A', 'default.png'),
(36, '', 'SV1_Treasurer', NULL, NULL, '', '', '', '', NULL, NULL, '', '2022-11-29', '', '', 'default.png'),
(37, '', 'SV2_Admin', NULL, NULL, '', '', '', '', NULL, NULL, '', '2022-11-29', '', '', 'default.png'),
(39, 'Sta. Maria', 'Marco Ivan', 'Quierrez', 'N/A', 'Male', 'Lot 4 Block 3', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'marcoivanstamaria@gmail.com', '2001-06-13', '09123456789', 'N/A', '290509682_1413885909103188_6599438684369654480_n.jpg'),
(40, 'Dalisay', 'Cardo', 'Dela Cruz', 'N/A', 'Male', 'Block 3 Lot 5', 'Sunnyvale 2', 'Palangoy', 'Palangoy', 'N/A', 'cardoDalisay@gmail.com', '1977-11-07', '09123456789', 'N/A', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `monthly_dues`
--

DROP TABLE IF EXISTS `monthly_dues`;
CREATE TABLE IF NOT EXISTS `monthly_dues` (
  `monthly_dues_id` int(11) NOT NULL AUTO_INCREMENT,
  `subdivision_name` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`monthly_dues_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `monthly_dues`
--

INSERT INTO `monthly_dues` (`monthly_dues_id`, `subdivision_name`, `amount`, `updated_at`) VALUES
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
  `content_image` varchar(255) DEFAULT NULL,
  `officer_post` varchar(10) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `full_name`, `title`, `content`, `published_at`, `content_image`, `officer_post`) VALUES
(1, 28, 'Mon Carlo Delima', 'The moon is beautiful, isn\'t it?', '', '2022-11-24 01:09:01', '315906640_1753081135077201_6331420859846659098_n.png', 'No'),
(2, 24, 'Jeune Paolus Flores', 'Fascinating art created by nature.', '', '2022-11-24 09:59:54', '316218368_829271824950879_360246867658747215_n.png', 'No'),
(3, 23, 'Kyle Andrei Casingal', 'Reflection', 'Imagine seeing these astonishing cars, lively blue skies, and few waves of clouds in an upside-down world. Inconceivable, isn\'t it?', '2022-11-24 10:03:11', '316189223_691988422233113_5145406262467036356_n.png', 'No'),
(4, 23, 'Kyle Andrei Casingal', 'Windows of truth shows the real beauty of nature.', '', '2022-11-24 10:04:40', '313194508_684251046380877_4560164667618025920_n.png', 'No'),
(5, 28, 'Mon Carlo Delima', 'Vintage mansion represents calm, warm, and peace.', '', '2022-11-24 10:05:22', '312140489_698881924813395_203606755662892340_n.png', 'No'),
(15, 52, 'Marco Ivan Sta. Maria', '', 'Oh well, the sun strengthens the health of the plant, does this photo represents a good day because of that?', '2022-12-01 06:37:21', 'Picture2.jpg', 'No'),
(17, 53, 'Krishtalene BendaÃ±a', '', 'Just had a ride inside the Sunnyvale subdivision, I feel like this will be part of my everyday routine.', '2022-12-01 06:48:54', 'Picture4.png', 'No'),
(18, 52, 'Marco Ivan Sta. Maria', '', 'The kids enjoyed the party in Sunnyvale Subdivision, it\'s great seeing them happy while watching the program.', '2022-12-01 06:49:23', 'Picture5.jpg', 'No'),
(19, 53, 'Krishtalene BendaÃ±a', '', 'Hi everyone! Just want to share this beautiful view I took near Sunnyvale Subdivision. It\'s in ArtSector Gallery and Chimney Cafe 360Â°. Let\'s visit this place together.', '2022-12-01 06:50:15', 'Picture6.jpg', 'No'),
(20, 52, 'Marco Ivan Sta. Maria', '', 'Sometimes it\'s good to be blue. How sweet to be a cloud and floating in blue. I never get tired of the blue sky.', '2022-12-01 06:51:00', 'Picture3.png', 'No'),
(24, 55, 'Kyle Andrei Casingal', 'Light Bulb', 'insert description here', '2022-12-01 10:13:20', '188-1889845_a-very-simple-concept-infinitustoken-medium-light-bulb.png', 'No'),
(28, 18, 'SV1_Admin', 'Water interruption', 'test', '2023-01-24 20:00:38', '', 'Yes'),
(29, 18, 'SV1_Admin', 'Chinese New Year event', 'test', '2023-01-24 20:06:20', '', 'Yes');

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
(4, 'Sunnyvale 4', 'Pantok'),
(5, 'Sunnyvale 5', 'Darangan'),
(6, 'Sunnyvale 6', 'Darangan'),
(7, 'Sunnyvale 7', 'Bilibiran'),
(9, 'Sunnyvale 8', 'Palangoy'),
(10, 'Sunnyvale 9', 'Darangan'),
(11, 'Sunnyvale 10', 'Calumpang'),
(12, 'Sunnyvale 11', 'Bilibiran');

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
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_homeowner_id`, `full_name`, `user_type`, `password`, `email_address`, `account_status`, `verification_code`, `email_verified_at`) VALUES
(55, 2, 'Kyle Andrei Casingal', 'Homeowner', 'password', 'kylecasingal36@gmail.com', 'Activated', '248425', '2022-12-01 10:11:20'),
(3, 3, 'Jeune Paolus Flores', 'Homeowner', 'thisfeelsgud', 'floresjeunepaolus@gmail.com', 'Activated', '943962', '2022-11-10 22:51:58'),
(1, 1, 'Mon Carlo Delima', 'Homeowner', '12345', 'dmoncarlo6@gmail.com', 'Activated', '286140', '2022-11-24 13:48:07'),
(27, 16, 'janwel castillo', 'Homeowner', 'dadada', 'janweljigycastillo20@gmail.com', 'Deactivated', '943962', '2022-11-15 20:43:59'),
(4, 4, 'John Doe', 'Treasurer', '123', 'dmoncarlo@gmail.com', 'Deactivated', '105861', '2022-11-24 15:17:36'),
(18, 18, 'SV1_Admin', 'Admin', 'password', 'SV1_Admin', 'Activated', NULL, NULL),
(42, 17, 'Roiemar Escueta', 'Homeowner', '123', 'escuetaroiemar@gmail.com', 'Deactivated', '135447', '2022-11-28 23:28:23'),
(46, 28, 'SV1_Secretary', 'Secretary', '123', 'SV1_Secretary', 'Activated', NULL, NULL),
(48, 36, 'SV1_Treasurer', 'Treasurer', '123', 'SV1_Treasurer', 'Activated', NULL, NULL),
(49, 37, 'SV2_Admin', 'Admin', 'password', 'SV2_Admin', 'Activated', NULL, NULL),
(52, 39, 'Marco Ivan Sta. Maria', 'Homeowner', '123', 'marcoivanstamaria@gmail.com', 'Activated', '257545', '2022-12-01 06:31:28'),
(53, 8, 'Krishtalene BendaÃ±a', 'Homeowner', '123', 'tissabendana@gmail.com', 'Activated', '573856', '2022-12-01 06:37:48');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
