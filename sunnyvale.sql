-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 09, 2023 at 09:22 PM
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
  `amenity_purpose_id` int(11) NOT NULL AUTO_INCREMENT,
  `amenity_id` int(11) NOT NULL,
  `amenity_purpose` varchar(100) NOT NULL,
  `day_rate` int(11) NOT NULL,
  `night_rate` int(11) NOT NULL,
  PRIMARY KEY (`amenity_purpose_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

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
(12, 30, 'Volleyball', 70, 480),
(13, 5, 'test', 20, 30);

-- --------------------------------------------------------

--
-- Table structure for table `amenity_renting`
--

DROP TABLE IF EXISTS `amenity_renting`;
CREATE TABLE IF NOT EXISTS `amenity_renting` (
  `amenity_renting_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `renter_name` varchar(255) NOT NULL,
  `subdivision_name` varchar(255) NOT NULL,
  `amenity_name` varchar(255) NOT NULL,
  `amenity_purpose` varchar(255) NOT NULL,
  `date_from` datetime DEFAULT NULL,
  `date_to` datetime DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `cart` varchar(10) NOT NULL,
  PRIMARY KEY (`amenity_renting_id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

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
(26, 11, 1, 'Mon Carlo Delima', 'Sunnyvale 1', 'Swimming Pool', '5', '2023-04-10 08:00:00', '2023-04-10 09:00:00', 50, 'Approved'),
(20, NULL, 48, 'SV1_Treasurer', 'Sunnyvale 1', 'Court', '3', NULL, NULL, NULL, 'Removed'),
(25, 3, 1, 'Mon Carlo Delima', 'Sunnyvale 3', 'Clubhouse', '8', '2023-04-15 01:00:00', '2023-04-15 02:00:00', 150, 'Approved'),
(23, 2, 48, 'SV1_Treasurer', 'Sunnyvale 2', 'Court', '11', '2023-04-08 08:00:00', '2023-04-08 10:00:00', 40, 'Approved'),
(24, 2, 48, 'SV1_Treasurer', 'Sunnyvale 2', 'Court', '12', '2023-04-08 10:00:00', '2023-04-08 12:00:00', 140, 'Approved'),
(27, NULL, 1, 'Mon Carlo Delima', 'Sunnyvale 1', 'Court', '10', '2023-05-09 01:00:00', '2023-05-09 02:00:00', 80, 'Removed'),
(28, NULL, 18, 'Test', 'Sunnyvale 1', 'Swimming Pool', '5', '2023-05-05 01:00:00', '2023-05-05 02:00:00', 50, 'Yes'),
(29, NULL, 18, 'aaaaaa', 'Sunnyvale 1', 'Swimming Pool', '5', NULL, NULL, NULL, 'Yes'),
(30, NULL, 3, 'aa', 'Sunnyvale 2', 'Court', '12', NULL, NULL, NULL, 'Removed'),
(31, NULL, 3, 'Jeune Paolus Flores', 'Sunnyvale 1', 'Swimming Pool', '5', NULL, NULL, NULL, 'Yes'),
(32, NULL, 3, 'Jeune Paolus Flores', 'Sunnyvale 1', 'Swimming Pool', '5', NULL, NULL, NULL, 'Yes'),
(33, 16, NULL, 'Rie Takahashi', 'Sunnyvale 1', 'Swimming Pool', '13', '2023-05-09 01:00:00', '2023-05-09 02:00:00', 20, 'Pending'),
(34, NULL, NULL, 'Mon Carlo Delima', 'Sunnyvale 1', 'Court', '10', NULL, NULL, NULL, 'Yes'),
(36, NULL, NULL, 'Rie Takahashi', 'Sunnyvale 1', 'Court', '10', '2023-05-09 01:00:00', '2023-05-09 02:00:00', 80, 'Removed'),
(37, NULL, 1, 'Mon Carlo Delima', 'Sunnyvale 1', 'Swimming Pool', '5', '2023-05-09 01:00:00', '2023-05-09 02:00:00', 0, 'Removed'),
(39, 16, 1, 'Mon Carlo Delima', 'Sunnyvale 1', 'Swimming Pool', '5', '2023-05-09 18:00:00', '2023-05-09 21:00:00', 300, 'Pending'),
(40, 16, 1, 'Mon Carlo Delima', 'Sunnyvale 2', 'Court', '12', '2023-05-09 18:00:00', '2023-05-09 21:00:00', 1440, 'Pending'),
(41, 16, 1, 'Mon Carlo Delima', 'Sunnyvale 1', 'Swimming Pool', '13', '2023-05-09 18:00:00', '2023-05-09 21:00:00', 90, 'Pending'),
(42, 16, 1, 'Mon Carlo Delima', 'Sunnyvale 1', 'Swimming Pool', '5', '2023-05-09 18:00:00', '2023-05-09 21:00:00', 300, 'Pending'),
(43, 17, NULL, 'Rie Takahashi', 'Sunnyvale 1', 'Swimming Pool', '13', '2023-05-09 17:00:00', '2023-05-09 19:00:00', 50, 'Pending'),
(44, 17, NULL, 'Rie Takahashi', 'Sunnyvale 2', 'Court', '11', '2023-05-09 17:00:00', '2023-05-09 19:00:00', 50, 'Pending');

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
(4, 'Sunnyvale 4', 350, '2022-11-27');

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
) ENGINE=MyISAM AUTO_INCREMENT=256 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `audit_trail`
--

INSERT INTO `audit_trail` (`audit_id`, `user`, `action`, `datetime`) VALUES
(1, 'Super_Admin', 'Logged in', '2023-05-08 14:49:48'),
(2, 'Super_Admin', 'Logged out', '2023-05-08 14:59:06'),
(3, 'SV1_Treasurer', 'Logged in', '2023-05-08 14:59:09'),
(4, 'SV1_Treasurer', 'Logged out', '2023-05-08 14:59:14'),
(5, 'Super_Admin', 'Logged in', '2023-05-08 14:59:16'),
(6, 'Super_Admin', 'Logged out', '2023-05-08 15:04:28'),
(7, 'SV1_Treasurer', 'Logged in', '2023-05-08 15:04:32'),
(8, 'SV1_Treasurer', 'Logged out', '2023-05-08 15:06:26'),
(9, 'SV1_Admin', 'Logged in', '2023-05-08 15:06:29'),
(10, 'SV1_Admin', 'Logged out', '2023-05-08 15:06:51'),
(11, 'SV1_Admin', 'Logged in', '2023-05-08 15:06:54'),
(12, 'SV1_Admin', 'Logged out', '2023-05-08 15:06:58'),
(13, 'SV1_Secretary', 'Logged in', '2023-05-08 15:07:01'),
(14, 'SV1_Secretary', 'Logged out', '2023-05-08 15:07:44'),
(15, 'SV1_Treasurer', 'Logged in', '2023-05-08 15:07:47'),
(16, 'SV1_Treasurer', 'Approved a vehicle sticker transaction', '2023-05-08 15:38:39'),
(17, 'SV1_Treasurer', 'Logged out', '2023-05-08 15:39:08'),
(18, 'SV1_Secretary', 'Logged in', '2023-05-08 15:39:11'),
(19, 'SV1_Secretary', 'Logged out', '2023-05-08 15:39:27'),
(20, 'Super_Admin', 'Logged in', '2023-05-08 15:39:32'),
(21, 'Super_Admin', 'Logged out', '2023-05-08 15:39:47'),
(22, 'Mon Carlo Delima', 'Logged in', '2023-05-08 15:39:51'),
(23, 'Mon Carlo Delima', 'Logged out', '2023-05-08 15:41:14'),
(24, 'Super_Admin', 'Logged in', '2023-05-08 15:41:17'),
(25, 'Super_Admin', 'Logged out', '2023-05-08 15:44:05'),
(26, 'SV1_Admin', 'Logged in', '2023-05-08 15:44:08'),
(27, 'SV1_Admin', 'Logged out', '2023-05-08 15:44:13'),
(28, 'Super_Admin', 'Logged in', '2023-05-08 15:44:17'),
(29, 'Super_Admin', 'Logged out', '2023-05-08 15:48:34'),
(30, 'Mon Carlo Delima', 'Logged in', '2023-05-08 15:48:38'),
(31, 'Mon Carlo Delima', 'Bought a vehicle sticker', '2023-05-08 15:48:49'),
(32, 'Mon Carlo Delima', 'Logged out', '2023-05-08 15:48:51'),
(33, 'Super_Admin', 'Logged in', '2023-05-08 15:48:55'),
(34, 'Super_Admin', 'Approved a vehicle sticker transaction', '2023-05-08 15:49:05'),
(35, 'Super_Admin', 'Logged out', '2023-05-08 15:50:29'),
(36, 'Super_Admin', 'Logged in', '2023-05-08 15:53:22'),
(37, 'Super_Admin', 'Logged out', '2023-05-08 15:54:07'),
(38, 'Mon Carlo Delima', 'Logged in', '2023-05-08 15:54:14'),
(39, 'Mon Carlo Delima', 'Logged out', '2023-05-08 16:36:49'),
(40, 'Super_Admin', 'Logged in', '2023-05-08 16:37:01'),
(41, 'Super_Admin', 'Logged out', '2023-05-08 16:43:00'),
(42, 'SV1_Admin', 'Logged in', '2023-05-08 16:43:02'),
(43, 'SV1_Admin', 'Logged out', '2023-05-08 16:44:09'),
(44, 'Mon Carlo Delima', 'Logged in', '2023-05-08 16:44:13'),
(45, 'Mon Carlo Delima', 'Logged out', '2023-05-08 16:44:47'),
(46, 'SV1_Admin', 'Logged in', '2023-05-08 16:44:49'),
(47, 'SV1_Admin', 'Logged out', '2023-05-08 16:50:10'),
(48, 'SV1_Admin', 'Logged in', '2023-05-08 16:50:12'),
(49, 'SV1_Admin', 'Logged out', '2023-05-08 16:55:07'),
(50, 'Super_Admin', 'Logged in', '2023-05-08 16:55:21'),
(51, 'Super_Admin', 'Logged out', '2023-05-08 16:55:38'),
(52, 'SV2_Admin', 'Logged in', '2023-05-08 16:55:42'),
(53, 'SV2_Admin', 'Logged out', '2023-05-08 16:56:05'),
(54, 'SV1_Admin', 'Logged in', '2023-05-08 16:56:08'),
(55, 'SV1_Admin', 'Logged out', '2023-05-08 17:03:58'),
(56, 'Super_Admin', 'Logged in', '2023-05-08 17:04:02'),
(57, 'Super_Admin', 'Logged out', '2023-05-08 17:04:48'),
(58, 'SV1_Admin', 'Logged in', '2023-05-08 17:04:50'),
(59, 'SV1_Admin', 'Logged out', '2023-05-08 17:11:00'),
(60, 'Super_Admin', 'Logged in', '2023-05-08 17:11:03'),
(61, 'Super_Admin', 'Logged out', '2023-05-08 17:12:35'),
(62, 'Super_Admin', 'Logged in', '2023-05-08 17:12:42'),
(63, 'Super_Admin', 'Logged out', '2023-05-08 17:13:42'),
(64, 'Super_Admin', 'Logged in', '2023-05-08 17:13:46'),
(65, 'Super_Admin', 'Logged out', '2023-05-08 17:15:24'),
(66, 'SV1_Admin', 'Logged in', '2023-05-08 17:15:27'),
(67, 'SV1_Admin', 'Logged out', '2023-05-08 17:18:29'),
(68, 'Super_Admin', 'Logged in', '2023-05-08 17:18:32'),
(69, 'Super_Admin', 'Bought a vehicle sticker', '2023-05-08 17:18:56'),
(70, 'Super_Admin', 'Bought a vehicle sticker', '2023-05-08 17:20:00'),
(71, 'Super_Admin', 'Added a monthly dues', '2023-05-08 17:41:47'),
(72, 'Super_Admin', 'Added a gcash number', '2023-05-08 17:42:58'),
(73, 'Super_Admin', 'Added a gcash number', '2023-05-08 17:43:41'),
(74, 'Super_Admin', 'Added a gcash number', '2023-05-08 17:44:06'),
(75, 'Super_Admin', 'Updated a gcash number', '2023-05-08 17:47:14'),
(76, 'Super_Admin', 'Updated a gcash number', '2023-05-08 17:47:30'),
(77, 'Super_Admin', 'Updated a gcash number', '2023-05-08 17:48:00'),
(78, 'Super_Admin', 'Logged out', '2023-05-08 17:48:21'),
(79, 'SV1_Admin', 'Logged in', '2023-05-08 17:48:23'),
(80, 'SV1_Admin', 'Logged out', '2023-05-08 17:48:54'),
(81, 'Mon Carlo Delima', 'Logged in', '2023-05-08 17:48:59'),
(82, 'Mon Carlo Delima', 'Logged out', '2023-05-08 17:55:53'),
(83, 'Super_Admin', 'Logged in', '2023-05-08 17:55:59'),
(84, 'Super_Admin', 'Logged out', '2023-05-08 17:57:29'),
(85, 'SV1_Admin', 'Logged in', '2023-05-08 17:57:32'),
(86, 'SV1_Admin', 'Logged out', '2023-05-08 17:59:20'),
(87, 'SV1_Treasurer', 'Logged in', '2023-05-08 17:59:23'),
(88, 'SV1_Treasurer', 'Logged out', '2023-05-08 17:59:26'),
(89, 'SV1_Secretary', 'Logged in', '2023-05-08 17:59:30'),
(90, 'SV1_Secretary', 'Logged out', '2023-05-08 18:02:57'),
(91, 'Super_Admin', 'Logged in', '2023-05-08 18:03:00'),
(92, 'Super_Admin', 'Updated a sticker price', '2023-05-08 18:06:22'),
(93, 'Super_Admin', 'Added a sticker price', '2023-05-08 18:06:24'),
(94, 'Super_Admin', 'Updated a sticker price', '2023-05-08 18:06:41'),
(95, 'Super_Admin', 'Added a sticker price', '2023-05-08 18:06:46'),
(96, 'Super_Admin', 'Added a sticker price', '2023-05-08 18:06:51'),
(97, 'Super_Admin', 'Added a sticker price', '2023-05-08 18:07:41'),
(98, 'Super_Admin', 'Added a sticker price', '2023-05-08 18:08:54'),
(99, 'Super_Admin', 'Logged out', '2023-05-08 18:09:35'),
(100, 'SV1_Admin', 'Added a gcash number', '2023-05-08 18:13:02'),
(101, 'SV1_Admin', 'Added a gcash number', '2023-05-08 18:17:32'),
(102, 'SV1_Admin', 'Logged out', '2023-05-08 20:46:48'),
(103, 'Jeune Paolus Flores', 'Logged in', '2023-05-08 20:54:18'),
(104, 'Jeune Paolus Flores', 'Logged out', '2023-05-08 20:56:27'),
(105, 'Jeune Paolus Flores', 'Logged in', '2023-05-08 21:06:11'),
(106, 'Jeune Paolus Flores', 'Logged out', '2023-05-08 21:09:39'),
(107, 'Jeune Paolus Flores', 'Logged in', '2023-05-08 22:01:17'),
(108, 'Jeune Paolus Flores', 'Logged out', '2023-05-08 22:01:25'),
(109, 'Jeune Paolus Flores', 'Logged in', '2023-05-08 22:23:10'),
(110, 'Jeune Paolus Flores', 'Logged out', '2023-05-08 22:24:24'),
(111, 'SV1_Admin', 'Logged in', '2023-05-08 22:24:29'),
(112, 'SV1_Admin', 'Logged out', '2023-05-08 22:25:30'),
(113, 'Jeune Paolus Flores', 'Logged in', '2023-05-08 22:25:39'),
(114, 'Jeune Paolus Flores', 'Logged out', '2023-05-08 23:04:58'),
(115, 'Mon Carlo Delima', 'Logged in', '2023-05-08 23:05:33'),
(116, 'Mon Carlo Delima', 'Logged out', '2023-05-08 23:10:36'),
(117, 'SV1_Admin', 'Logged in', '2023-05-08 23:10:42'),
(118, 'SV1_Admin', 'Logged out', '2023-05-08 23:11:21'),
(119, 'Mon Carlo Delima', 'Logged in', '2023-05-08 23:11:58'),
(120, 'Mon Carlo Delima', 'Added a tenant', '2023-05-08 23:17:36'),
(121, 'Mon Carlo Delima', 'Added a tenant', '2023-05-08 23:28:09'),
(122, 'Mon Carlo Delima', 'Added a tenant', '2023-05-08 23:29:10'),
(123, 'Mon Carlo Delima', 'Update a homeowner profile', '2023-05-08 23:29:34'),
(124, 'Mon Carlo Delima', 'Update a tenant profile', '2023-05-08 23:38:49'),
(125, 'SV1_Admin', 'Logged in', '2023-05-09 13:16:13'),
(126, 'SV1_Admin', 'Logged out', '2023-05-09 13:20:09'),
(127, 'SV1_Admin', 'Logged in', '2023-05-09 13:20:12'),
(128, 'SV1_Admin', 'Logged out', '2023-05-09 13:21:10'),
(129, 'Mon Carlo Delima', 'Logged in', '2023-05-09 13:21:15'),
(130, 'Mon Carlo Delima', 'Logged out', '2023-05-09 13:31:44'),
(131, 'SV2_Admin', 'Logged in', '2023-05-09 13:31:47'),
(132, 'SV2_Admin', 'Logged out', '2023-05-09 13:31:49'),
(133, 'Super_Admin', 'Logged in', '2023-05-09 13:32:24'),
(134, 'Super_Admin', 'Logged out', '2023-05-09 13:32:50'),
(135, 'Mon Carlo Delima', 'Logged in', '2023-05-09 13:32:54'),
(136, 'Mon Carlo Delima', 'Logged out', '2023-05-09 13:38:05'),
(137, 'SV1_Admin', 'Logged in', '2023-05-09 13:38:08'),
(138, 'SV1_Admin', 'Logged out', '2023-05-09 13:40:26'),
(139, 'Mon Carlo Delima', 'Logged in', '2023-05-09 13:40:29'),
(140, 'Mon Carlo Delima', 'Logged out', '2023-05-09 13:40:43'),
(141, 'SV1_Admin', 'Logged in', '2023-05-09 13:40:46'),
(142, 'SV1_Admin', 'Logged out', '2023-05-09 13:41:39'),
(143, 'SV1_Admin', 'Logged in', '2023-05-09 13:41:43'),
(144, 'SV1_Admin', 'Logged out', '2023-05-09 13:42:57'),
(145, 'Super_Admin', 'Logged in', '2023-05-09 13:43:00'),
(146, 'Super_Admin', 'Registed a homeowner profile', '2023-05-09 13:44:03'),
(147, 'Super_Admin', 'Logged out', '2023-05-09 13:47:59'),
(148, 'SV1_Admin', 'Logged in', '2023-05-09 13:48:01'),
(149, 'SV1_Admin', 'Logged out', '2023-05-09 13:48:28'),
(150, 'SV1_Admin', 'Logged in', '2023-05-09 13:48:33'),
(151, 'SV1_Admin', 'Logged out', '2023-05-09 13:48:59'),
(152, 'Super_Admin', 'Logged in', '2023-05-09 13:49:03'),
(153, 'Super_Admin', 'Added a system account', '2023-05-09 13:49:17'),
(154, 'Super_Admin', 'Added a system account', '2023-05-09 13:50:18'),
(155, 'Super_Admin', 'Logged out', '2023-05-09 13:51:44'),
(156, 'SV1_Admin', 'Logged in', '2023-05-09 13:51:47'),
(157, 'SV1_Admin', 'Added a system account', '2023-05-09 13:52:00'),
(158, 'SV1_Admin', 'Logged out', '2023-05-09 13:54:18'),
(159, 'Super_Admin', 'Logged in', '2023-05-09 13:54:21'),
(160, 'Super_Admin', 'Added a system account', '2023-05-09 13:54:33'),
(161, 'Super_Admin', 'Added a system account', '2023-05-09 13:56:07'),
(162, 'Super_Admin', 'Added a system account', '2023-05-09 14:00:02'),
(163, 'Super_Admin', 'Logged out', '2023-05-09 14:00:13'),
(164, 'Super_Admin2', 'Logged in', '2023-05-09 14:00:19'),
(165, 'Super_Admin2', 'Logged out', '2023-05-09 14:00:43'),
(166, 'Super_Admin', 'Logged in', '2023-05-09 14:01:26'),
(167, 'Super_Admin', 'Updated a system account', '2023-05-09 14:01:56'),
(168, 'Super_Admin', 'Updated a system account', '2023-05-09 14:01:59'),
(169, 'Super_Admin', 'Logged out', '2023-05-09 14:02:06'),
(170, 'Monkey Luffy', 'Logged in', '2023-05-09 14:09:25'),
(171, 'Monkey Luffy', 'Logged out', '2023-05-09 14:18:56'),
(172, 'SV1_Admin', 'Logged in', '2023-05-09 14:18:59'),
(173, 'SV1_Admin', 'Logged out', '2023-05-09 14:19:04'),
(174, 'Monkey Luffy', 'Logged in', '2023-05-09 14:19:07'),
(175, 'Monkey Luffy', 'Logged out', '2023-05-09 14:19:24'),
(176, 'Mon Carlo Delima', 'Logged in', '2023-05-09 14:19:30'),
(177, 'Mon Carlo Delima', 'Logged out', '2023-05-09 14:19:56'),
(178, 'Monkey Luffy', 'Logged in', '2023-05-09 14:20:01'),
(179, 'Monkey Luffy', 'Logged out', '2023-05-09 14:20:26'),
(180, 'Mon Carlo Delima', 'Logged in', '2023-05-09 14:20:29'),
(181, 'Mon Carlo Delima', 'Logged out', '2023-05-09 14:22:18'),
(182, 'SV1_Admin', 'Logged in', '2023-05-09 14:22:22'),
(183, 'SV1_Admin', 'Logged out', '2023-05-09 14:22:45'),
(184, 'Mon Carlo Delima', 'Logged in', '2023-05-09 14:22:50'),
(185, 'Mon Carlo Delima', 'uploaded a new post', '2023-05-09 14:29:47'),
(186, 'Mon Carlo Delima', 'Logged out', '2023-05-09 14:29:51'),
(187, 'Monkey Luffy', 'Logged in', '2023-05-09 14:29:55'),
(188, 'Monkey Luffy', 'uploaded a new post', '2023-05-09 14:30:08'),
(189, 'Monkey Luffy', 'Logged out', '2023-05-09 14:30:11'),
(190, 'SV2_Admin', 'Logged in', '2023-05-09 14:30:15'),
(191, 'SV2_Admin', 'Logged out', '2023-05-09 14:30:17'),
(192, 'SV1_Admin', 'Logged in', '2023-05-09 14:30:19'),
(193, 'SV1_Admin', 'Logged out', '2023-05-09 14:30:25'),
(194, 'Super_Admin', 'Logged in', '2023-05-09 14:30:36'),
(195, 'Super_Admin', 'Logged out', '2023-05-09 14:32:01'),
(196, 'Mon Carlo Delima', 'Logged in', '2023-05-09 14:32:10'),
(197, 'Mon Carlo Delima', 'Logged out', '2023-05-09 14:39:28'),
(198, 'Mon Carlo Delima', 'Logged in', '2023-05-09 14:39:46'),
(199, 'Mon Carlo Delima', 'Updated their profile', '2023-05-09 14:39:53'),
(200, 'Mon Carlo Delima', 'Updated their profile', '2023-05-09 14:40:00'),
(201, 'Mon Carlo Delima', 'Logged out', '2023-05-09 14:40:18'),
(202, 'Mon Carlo Delima', 'Logged in', '2023-05-09 14:40:24'),
(203, 'Mon Carlo Delima', 'Logged out', '2023-05-09 14:51:55'),
(204, 'SV1_Admin', 'Logged in', '2023-05-09 14:51:58'),
(205, 'SV1_Admin', 'Logged out', '2023-05-09 14:53:51'),
(206, 'SV1_Admin', 'Logged in', '2023-05-09 14:53:53'),
(207, 'SV1_Admin', 'Logged out', '2023-05-09 14:53:57'),
(208, 'Monkey Luffy', 'Logged in', '2023-05-09 14:54:00'),
(209, 'Monkey Luffy', 'Logged out', '2023-05-09 14:59:29'),
(210, 'Monkey Luffy', 'Logged in', '2023-05-09 14:59:32'),
(211, 'Monkey Luffy', 'Logged out', '2023-05-09 14:59:44'),
(212, 'Monkey Luffy', 'Logged in', '2023-05-09 14:59:46'),
(213, 'Monkey Luffy', 'Logged out', '2023-05-09 14:59:49'),
(214, 'Mon Carlo Delima', 'Logged in', '2023-05-09 14:59:53'),
(215, 'Mon Carlo Delima', 'Logged out', '2023-05-09 15:01:36'),
(216, 'Mon Carlo Delima', 'Logged in', '2023-05-09 15:01:38'),
(217, 'Mon Carlo Delima', 'Logged out', '2023-05-09 15:02:24'),
(218, 'Monkey Luffy', 'Logged in', '2023-05-09 15:02:28'),
(219, 'Monkey Luffy', 'Logged out', '2023-05-09 15:02:32'),
(220, 'Mon Carlo Delima', 'Logged in', '2023-05-09 15:02:35'),
(221, 'Mon Carlo Delima', 'Logged out', '2023-05-09 15:02:56'),
(222, 'Mon Carlo Delima', 'Logged in', '2023-05-09 15:02:58'),
(223, 'Mon Carlo Delima', 'Logged out', '2023-05-09 15:03:12'),
(224, 'Monkey Luffy', 'Logged in', '2023-05-09 15:03:15'),
(225, 'Monkey Luffy', 'Logged out', '2023-05-09 15:05:14'),
(226, 'Monkey Luffy', 'Logged in', '2023-05-09 15:05:16'),
(227, 'Monkey Luffy', 'Logged out', '2023-05-09 15:05:29'),
(228, 'Monkey Luffy', 'Logged in', '2023-05-09 15:05:31'),
(229, 'Monkey Luffy', 'Logged out', '2023-05-09 15:07:14'),
(230, 'Monkey Luffy', 'Logged in', '2023-05-09 15:07:17'),
(231, 'Monkey Luffy', 'Logged out', '2023-05-09 15:07:19'),
(232, 'Mon Carlo Delima', 'Logged in', '2023-05-09 15:07:23'),
(233, 'Mon Carlo Delima', 'Updated their profile photo', '2023-05-09 15:08:38'),
(234, 'Mon Carlo Delima', 'Updated their profile photo', '2023-05-09 15:11:17'),
(235, 'Mon Carlo Delima', 'Updated their profile photo', '2023-05-09 15:11:30'),
(236, 'Mon Carlo Delima', 'Updated their profile photo', '2023-05-09 15:11:40'),
(237, 'Mon Carlo Delima', 'Updated their profile photo', '2023-05-09 15:11:46'),
(238, 'Mon Carlo Delima', 'Updated their profile photo', '2023-05-09 15:13:03'),
(239, 'Mon Carlo Delima', 'Updated their profile photo', '2023-05-09 15:13:14'),
(240, 'Mon Carlo Delima', 'Updated their profile photo', '2023-05-09 15:14:23'),
(241, 'Mon Carlo Delima', 'Updated their profile photo', '2023-05-09 15:15:03'),
(242, 'Mon Carlo Delima', 'Updated their profile photo', '2023-05-09 15:16:27'),
(243, 'Mon Carlo Delima', 'Updated their profile photo', '2023-05-09 15:17:03'),
(244, 'Mon Carlo Delima', 'Updated their profile photo', '2023-05-09 15:17:12'),
(245, 'Mon Carlo Delima', 'Logged out', '2023-05-09 15:22:30'),
(246, 'Mon Carlo Delima', 'Logged in', '2023-05-09 20:04:58'),
(247, 'Mon Carlo Delima', 'Logged out', '2023-05-09 20:06:48'),
(248, 'Mon Carlo Delima', 'Logged in', '2023-05-09 20:11:35'),
(249, 'Mon Carlo Delima', 'Logged out', '2023-05-09 20:11:54'),
(250, 'Mon Carlo Delima', 'Logged in', '2023-05-09 20:14:36'),
(251, 'Mon Carlo Delima', 'Checkout', '2023-05-09 21:11:19'),
(252, 'Mon Carlo Delima', 'Logged out', '2023-05-09 21:15:24'),
(253, 'SV1_Admin', 'Logged in', '2023-05-09 21:20:07'),
(254, 'SV1_Admin', 'Logged out', '2023-05-09 21:20:55'),
(255, 'Super_Admin', 'Logged in', '2023-05-09 21:20:58');

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
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

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
  `transaction_id` int(11) DEFAULT NULL,
  `fullname` varchar(250) NOT NULL,
  `amount` varchar(45) NOT NULL,
  `datetime_paid` datetime DEFAULT NULL,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`billConsumer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bill_consumer`
--

INSERT INTO `bill_consumer` (`billConsumer_id`, `billingPeriod_id`, `homeowner_id`, `transaction_id`, `fullname`, `amount`, `datetime_paid`, `status`) VALUES
(1, 1, 1, 4, 'Mon Carlo Delima', '200', NULL, 'PAID'),
(2, 2, 1, 4, 'Mon Carlo Delima', '200', NULL, 'PAID'),
(3, 3, 1, 4, 'Mon Carlo Delima', '200', NULL, 'PAID'),
(4, 1, 2, NULL, 'Kyle Andrei Casingal', '500', '2023-04-10 11:45:59', 'PAID'),
(5, 2, 2, NULL, 'Kyle Andrei Casingal', '500', '2023-04-10 11:45:59', 'PAID'),
(6, 3, 2, NULL, 'Kyle Andrei Casingal', '500', '2023-04-10 11:45:59', 'PAID'),
(7, 4, 2, 5, 'Kyle Andrei Casingal', '500', '2023-04-10 12:08:59', 'PAID'),
(8, 5, 2, 5, 'Kyle Andrei Casingal', '500', '2023-04-10 12:08:59', 'PAID'),
(9, 6, 2, 5, 'Kyle Andrei Casingal', '500', '2023-04-10 12:08:59', 'PAID'),
(10, 7, 2, 6, 'Kyle Andrei Casingal', '500', '2023-04-10 12:09:13', 'PAID'),
(11, 8, 2, 6, 'Kyle Andrei Casingal', '500', '2023-04-10 12:09:13', 'PAID'),
(12, 9, 2, 6, 'Kyle Andrei Casingal', '500', '2023-04-10 12:09:13', 'PAID'),
(13, 1, 16, 9, 'Janwel Castillo', '200', '2023-04-10 12:10:51', 'PAID'),
(14, 2, 16, 9, 'Janwel Castillo', '200', '2023-04-10 12:10:51', 'PAID'),
(15, 3, 16, 9, 'Janwel Castillo', '200', '2023-04-10 12:10:51', 'PAID'),
(16, 4, 16, 9, 'Janwel Castillo', '200', '2023-04-10 12:10:51', 'PAID'),
(17, 5, 16, 10, 'Janwel Castillo', '200', '2023-04-10 12:12:03', 'PAID'),
(18, 6, 16, 10, 'Janwel Castillo', '200', '2023-04-10 12:12:03', 'PAID'),
(19, 7, 16, 10, 'Janwel Castillo', '200', '2023-04-10 12:12:03', 'PAID'),
(20, 8, 16, 10, 'Janwel Castillo', '200', '2023-04-10 12:12:03', 'PAID'),
(21, 9, 16, 10, 'Janwel Castillo', '200', '2023-04-10 12:12:03', 'PAID'),
(37, 1, 17, NULL, 'Roiemar Escueta', '200', NULL, 'UNPAID'),
(38, 1, 30, NULL, 'John Doe', '200', NULL, 'UNPAID'),
(39, 1, 31, NULL, 'Amirah Lowery', '200', NULL, 'UNPAID'),
(40, 1, 32, NULL, 'Kian Miller', '200', NULL, 'UNPAID'),
(41, 1, 33, NULL, 'Leona Shepherd', '200', NULL, 'UNPAID'),
(42, 1, 34, NULL, 'Sophie Warner', '200', NULL, 'UNPAID'),
(43, 1, 35, NULL, 'Tristram Hudson', '200', NULL, 'UNPAID'),
(44, 1, 39, NULL, 'Marco Ivan Sta. Maria', '200', NULL, 'UNPAID'),
(45, 2, 17, NULL, 'Roiemar Escueta', '200', NULL, 'UNPAID'),
(46, 2, 30, NULL, 'John Doe', '200', NULL, 'UNPAID'),
(47, 2, 31, NULL, 'Amirah Lowery', '200', NULL, 'UNPAID'),
(48, 2, 32, NULL, 'Kian Miller', '200', NULL, 'UNPAID'),
(49, 2, 33, NULL, 'Leona Shepherd', '200', NULL, 'UNPAID'),
(50, 2, 34, NULL, 'Sophie Warner', '200', NULL, 'UNPAID'),
(51, 2, 35, NULL, 'Tristram Hudson', '200', NULL, 'UNPAID'),
(52, 2, 39, NULL, 'Marco Ivan Sta. Maria', '200', NULL, 'UNPAID'),
(53, 3, 17, NULL, 'Roiemar Escueta', '200', NULL, 'UNPAID'),
(54, 3, 30, NULL, 'John Doe', '200', NULL, 'UNPAID'),
(55, 3, 31, NULL, 'Amirah Lowery', '200', NULL, 'UNPAID'),
(56, 3, 32, NULL, 'Kian Miller', '200', NULL, 'UNPAID'),
(57, 3, 33, NULL, 'Leona Shepherd', '200', NULL, 'UNPAID'),
(58, 3, 34, NULL, 'Sophie Warner', '200', NULL, 'UNPAID'),
(59, 3, 35, NULL, 'Tristram Hudson', '200', NULL, 'UNPAID'),
(60, 3, 39, NULL, 'Marco Ivan Sta. Maria', '200', NULL, 'UNPAID'),
(61, 4, 1, NULL, 'Mon Carlo Delima', '200', NULL, 'UNPAID'),
(62, 4, 17, NULL, 'Roiemar Escueta', '200', NULL, 'UNPAID'),
(63, 4, 30, NULL, 'John Doe', '200', NULL, 'UNPAID'),
(64, 4, 31, NULL, 'Amirah Lowery', '200', NULL, 'UNPAID'),
(65, 4, 32, NULL, 'Kian Miller', '200', NULL, 'UNPAID'),
(66, 4, 33, NULL, 'Leona Shepherd', '200', NULL, 'UNPAID'),
(67, 4, 34, NULL, 'Sophie Warner', '200', NULL, 'UNPAID'),
(68, 4, 35, NULL, 'Tristram Hudson', '200', NULL, 'UNPAID'),
(69, 4, 39, NULL, 'Marco Ivan Sta. Maria', '200', NULL, 'UNPAID'),
(70, 5, 1, NULL, 'Mon Carlo Delima', '200', NULL, 'UNPAID'),
(71, 5, 17, NULL, 'Roiemar Escueta', '200', NULL, 'UNPAID'),
(72, 5, 30, NULL, 'John Doe', '200', NULL, 'UNPAID'),
(73, 5, 31, NULL, 'Amirah Lowery', '200', NULL, 'UNPAID'),
(74, 5, 32, NULL, 'Kian Miller', '200', NULL, 'UNPAID'),
(75, 5, 33, NULL, 'Leona Shepherd', '200', NULL, 'UNPAID'),
(76, 5, 34, NULL, 'Sophie Warner', '200', NULL, 'UNPAID'),
(77, 5, 35, NULL, 'Tristram Hudson', '200', NULL, 'UNPAID'),
(78, 5, 39, NULL, 'Marco Ivan Sta. Maria', '200', NULL, 'UNPAID'),
(79, 6, 1, NULL, 'Mon Carlo Delima', '200', NULL, 'UNPAID'),
(80, 6, 17, NULL, 'Roiemar Escueta', '200', NULL, 'UNPAID'),
(81, 6, 30, NULL, 'John Doe', '200', NULL, 'UNPAID'),
(82, 6, 31, NULL, 'Amirah Lowery', '200', NULL, 'UNPAID'),
(83, 6, 32, NULL, 'Kian Miller', '200', NULL, 'UNPAID'),
(84, 6, 33, NULL, 'Leona Shepherd', '200', NULL, 'UNPAID'),
(85, 6, 34, NULL, 'Sophie Warner', '200', NULL, 'UNPAID'),
(86, 6, 35, NULL, 'Tristram Hudson', '200', NULL, 'UNPAID'),
(87, 6, 39, NULL, 'Marco Ivan Sta. Maria', '200', NULL, 'UNPAID'),
(88, 7, 1, NULL, 'Mon Carlo Delima', '200', NULL, 'UNPAID'),
(89, 7, 17, NULL, 'Roiemar Escueta', '200', NULL, 'UNPAID'),
(90, 7, 30, NULL, 'John Doe', '200', NULL, 'UNPAID'),
(91, 7, 31, NULL, 'Amirah Lowery', '200', NULL, 'UNPAID'),
(92, 7, 32, NULL, 'Kian Miller', '200', NULL, 'UNPAID'),
(93, 7, 33, NULL, 'Leona Shepherd', '200', NULL, 'UNPAID'),
(94, 7, 34, NULL, 'Sophie Warner', '200', NULL, 'UNPAID'),
(95, 7, 35, NULL, 'Tristram Hudson', '200', NULL, 'UNPAID'),
(96, 7, 39, NULL, 'Marco Ivan Sta. Maria', '200', NULL, 'UNPAID'),
(97, 8, 1, NULL, 'Mon Carlo Delima', '200', NULL, 'UNPAID'),
(98, 8, 17, NULL, 'Roiemar Escueta', '200', NULL, 'UNPAID'),
(99, 8, 30, NULL, 'John Doe', '200', NULL, 'UNPAID'),
(100, 8, 31, NULL, 'Amirah Lowery', '200', NULL, 'UNPAID'),
(101, 8, 32, NULL, 'Kian Miller', '200', NULL, 'UNPAID'),
(102, 8, 33, NULL, 'Leona Shepherd', '200', NULL, 'UNPAID'),
(103, 8, 34, NULL, 'Sophie Warner', '200', NULL, 'UNPAID'),
(104, 8, 35, NULL, 'Tristram Hudson', '200', NULL, 'UNPAID'),
(105, 8, 39, NULL, 'Marco Ivan Sta. Maria', '200', NULL, 'UNPAID'),
(106, 9, 1, NULL, 'Mon Carlo Delima', '200', NULL, 'UNPAID'),
(107, 9, 17, NULL, 'Roiemar Escueta', '200', NULL, 'UNPAID'),
(108, 9, 30, NULL, 'John Doe', '200', NULL, 'UNPAID'),
(109, 9, 31, NULL, 'Amirah Lowery', '200', NULL, 'UNPAID'),
(110, 9, 32, NULL, 'Kian Miller', '200', NULL, 'UNPAID'),
(111, 9, 33, NULL, 'Leona Shepherd', '200', NULL, 'UNPAID'),
(112, 9, 34, NULL, 'Sophie Warner', '200', NULL, 'UNPAID'),
(113, 9, 35, NULL, 'Tristram Hudson', '200', NULL, 'UNPAID'),
(114, 9, 39, NULL, 'Marco Ivan Sta. Maria', '200', NULL, 'UNPAID'),
(115, 10, 1, NULL, 'Mon Carlo Delima', '200', NULL, 'UNPAID'),
(116, 10, 17, NULL, 'Roiemar Escueta', '200', NULL, 'UNPAID'),
(117, 10, 16, NULL, 'Janwel Castillo', '200', NULL, 'UNPAID'),
(118, 10, 30, NULL, 'John Doe', '200', NULL, 'UNPAID'),
(119, 10, 31, NULL, 'Amirah Lowery', '200', NULL, 'UNPAID'),
(120, 10, 32, NULL, 'Kian Miller', '200', NULL, 'UNPAID'),
(121, 10, 33, NULL, 'Leona Shepherd', '200', NULL, 'UNPAID'),
(122, 10, 34, NULL, 'Sophie Warner', '200', NULL, 'UNPAID'),
(123, 10, 35, NULL, 'Tristram Hudson', '200', NULL, 'UNPAID'),
(124, 10, 39, NULL, 'Marco Ivan Sta. Maria', '200', NULL, 'UNPAID'),
(125, 11, 1, NULL, 'Mon Carlo Delima', '200', NULL, 'UNPAID'),
(126, 11, 17, NULL, 'Roiemar Escueta', '200', NULL, 'UNPAID'),
(127, 11, 16, NULL, 'Janwel Castillo', '200', NULL, 'UNPAID'),
(128, 11, 30, NULL, 'John Doe', '200', NULL, 'UNPAID'),
(129, 11, 31, NULL, 'Amirah Lowery', '200', NULL, 'UNPAID'),
(130, 11, 32, NULL, 'Kian Miller', '200', NULL, 'UNPAID'),
(131, 11, 33, NULL, 'Leona Shepherd', '200', NULL, 'UNPAID'),
(132, 11, 34, NULL, 'Sophie Warner', '200', NULL, 'UNPAID'),
(133, 11, 35, NULL, 'Tristram Hudson', '200', NULL, 'UNPAID'),
(134, 11, 39, NULL, 'Marco Ivan Sta. Maria', '200', NULL, 'UNPAID'),
(135, 12, 1, NULL, 'Mon Carlo Delima', '200', NULL, 'UNPAID'),
(136, 12, 17, NULL, 'Roiemar Escueta', '200', NULL, 'UNPAID'),
(137, 12, 16, NULL, 'Janwel Castillo', '200', NULL, 'UNPAID'),
(138, 12, 30, NULL, 'John Doe', '200', NULL, 'UNPAID'),
(139, 12, 31, NULL, 'Amirah Lowery', '200', NULL, 'UNPAID'),
(140, 12, 32, NULL, 'Kian Miller', '200', NULL, 'UNPAID'),
(141, 12, 33, NULL, 'Leona Shepherd', '200', NULL, 'UNPAID'),
(142, 12, 34, NULL, 'Sophie Warner', '200', NULL, 'UNPAID'),
(143, 12, 35, NULL, 'Tristram Hudson', '200', NULL, 'UNPAID'),
(144, 12, 39, NULL, 'Marco Ivan Sta. Maria', '200', NULL, 'UNPAID');

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

DROP TABLE IF EXISTS `block`;
CREATE TABLE IF NOT EXISTS `block` (
  `block_id` int(11) NOT NULL AUTO_INCREMENT,
  `subdivision_id` int(11) NOT NULL,
  `block` varchar(10) NOT NULL,
  PRIMARY KEY (`block_id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `block`
--

INSERT INTO `block` (`block_id`, `subdivision_id`, `block`) VALUES
(1, 1, '1'),
(2, 1, '2'),
(3, 3, '3'),
(4, 1, '3'),
(5, 3, '1'),
(6, 2, '3'),
(8, 4, '1'),
(9, 2, '1'),
(10, 1, '4'),
(11, 1, '5'),
(12, 1, '6'),
(13, 1, '7'),
(14, 1, '8'),
(15, 1, '9'),
(16, 1, '10'),
(17, 2, '2'),
(18, 2, '4'),
(19, 2, '5'),
(20, 2, '6'),
(21, 2, '7'),
(22, 2, '8'),
(23, 2, '9'),
(24, 2, '10'),
(25, 3, '2'),
(26, 3, '4'),
(27, 3, '5'),
(28, 3, '6'),
(29, 3, '7'),
(30, 3, '8'),
(31, 3, '9'),
(32, 3, '10'),
(33, 4, '2'),
(34, 4, '3'),
(35, 4, '4'),
(36, 4, '5'),
(37, 4, '6'),
(38, 4, '7'),
(39, 4, '8'),
(40, 4, '9'),
(41, 4, '10');

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
(1, 1, 'Mon Carlo Delima', NULL, NULL, 'Road concern', 'Unfixed potholes near court.', 'Processing', '2023-04-07 15:07:44', '2023-04-06 23:33:30'),
(2, 16, 'Janwel Castillo', 1, 'Mon Carlo Delima', 'Ipapa tulfo kita', 'wahahahaha', 'Processing', '2023-04-07 15:07:47', '2023-04-06 23:44:02'),
(3, 1, 'Mon Carlo Delima', 16, 'Janwel Castillo', 'Noise Complaint', 'Neighbor playing guitar loudly past midnight.', 'Resolved', '2023-04-08 12:10:44', '2023-04-06 23:59:18'),
(4, 2, 'Kyle Andrei Casingal', 4, 'John Doe', 'John Doe is doing it', 'Akala ko ikaw ay akin.', 'Processing', '2023-04-08 18:02:58', '2023-04-08 12:30:20');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `subdivision_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `subdivision_id`, `email`, `telephone`) VALUES
(1, 1, 'Sunnyvale1@gmail.com', '+63-280-555-7381'),
(2, 2, 'Sunnyvale2@gmail.com', '+63-929-555-0584'),
(3, 3, 'Sunnyvale3@gmail.com', '+63-933-555-8050'),
(4, 4, 'Sunnyvale4@gmail.com', '+63-280-555-7381');

-- --------------------------------------------------------

--
-- Table structure for table `gcash`
--

DROP TABLE IF EXISTS `gcash`;
CREATE TABLE IF NOT EXISTS `gcash` (
  `gcash_id` int(11) NOT NULL AUTO_INCREMENT,
  `subdivision` varchar(50) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  PRIMARY KEY (`gcash_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gcash`
--

INSERT INTO `gcash` (`gcash_id`, `subdivision`, `mobile_no`) VALUES
(1, 'Sunnyvale 1', '09123456789'),
(2, 'Sunnyvale 2', '09987654321'),
(3, 'Sunnyvale 3', '09123498765'),
(4, 'Sunnyvale 4', '09987651234');

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
  PRIMARY KEY (`homeowner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `homeowner_profile`
--

INSERT INTO `homeowner_profile` (`homeowner_id`, `last_name`, `first_name`, `middle_name`, `suffix`, `sex`, `street`, `subdivision`, `barangay`, `business_address`, `occupation`, `email_address`, `birthdate`, `mobile_number`, `employer`, `vehicle_registration`) VALUES
(1, 'Delima', 'Mon Carlo', 'Zonio', 'N/A', 'Male', 'Lot 2 Block 2', 'Sunnyvale 1', 'Pantok', 'N/A', 'N/A', 'dmoncarlo6@gmail.com', '2002-10-06', '09157189636', 'N/A', 'LTO 5678'),
(2, 'Casingal', 'Kyle Andrei', 'Morillo', 'N/A', 'Male', 'Lot 1 Block 1', 'Sunnyvale 3', 'Palangoy', 'N/A', 'N/A', 'kylecasingal36@gmail.com', '2001-09-02', '09123456789', 'N/A', 'N/A'),
(3, 'Flores', 'Jeune Paolus', 'Damaso', 'N/A', 'Male', 'Lot 1 Block 3', 'Sunnyvale 2', 'Pantok', 'N/A', 'N/A', 'floresjeunepaolus@gmail.com', '2002-06-16', '09123123123', 'Inya', 'N/A'),
(51, '', 'SV1_Guard', NULL, NULL, '', '', 'Sunnyvale 1', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(8, 'BendaÃ±a', 'Krishtalene', 'Edejer', 'N/A', 'Female', 'Lot 1 Block 5', 'Sunnyvale 2', 'Pantok', 'N/A', 'N/A', 'tissabendana@gmail.com', '2002-10-19', '09123456789', 'N/A', 'N/A'),
(17, 'Escueta', 'Roiemar', 'Conchada', 'N/A', 'Male', 'Lot 4 Block 3', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'escuetaroiemar@gmail.com', '2022-11-28', '09123456789', 'N/A', 'N/A'),
(16, 'Castillo', 'Janwel', NULL, 'N/A', 'Male', 'Lot 2 Block 3 ', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'janweljigycastillo20@gmail.com', '2022-11-25', '09123456789', 'N/A', 'N/A'),
(30, 'Doe', 'John', 'Smith', 'N/A', 'Male', 'Lot 1 Block 8', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'johndoe@gmail.com', '2010-01-01', '09123456789', 'N/A', 'N/A'),
(28, '', 'SV1_Secretary', NULL, NULL, '', '', 'Sunnyvale 1', '', NULL, NULL, '', '2022-11-29', '', NULL, NULL),
(31, 'Lowery', 'Amirah', 'Meyers', 'N/A', 'Female', 'Lot 1 Block 7', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'amirahlowery@gmail.com', '2009-01-15', '09123456789', 'N/A', 'N/A'),
(32, 'Miller', 'Kian', 'Smith', 'N/A', 'Female', 'Lot 2 Block 10', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'Kian Miller', '1997-07-16', '09123456789', 'N/A', 'N/A'),
(33, 'Shepherd', 'Leona', 'Villegas', 'N/A', 'Female', 'Lot 2 Block 4', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'leonashepherd@gmail.com', '2000-02-29', '09123456789', 'N/A', 'N/A'),
(34, 'Warner', 'Sophie', 'Manning', 'N/A', 'Female', 'Lot 3 Block 7', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'sophiewarner@gmail.com', '1998-06-03', '09123456789', 'N/A', 'N/A'),
(35, 'Hudson', 'Tristram', 'Ray', 'N/A', 'Male', 'Lot 4 Block 1', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'tristramhudson', '1982-07-29', '09123456789', 'N/A', 'N/A'),
(36, '', 'SV1_Treasurer', NULL, NULL, '', '', 'Sunnyvale 1', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(37, '', 'SV2_Admin', NULL, NULL, '', '', 'Sunnyvale 2', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(39, 'Sta. Maria', 'Marco Ivan', 'Quierrez', 'N/A', 'Male', 'Lot 4 Block 3', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'marcoivanstamaria@gmail.com', '2001-06-13', '09123456789', 'N/A', 'N/A'),
(40, 'Dalisay', 'Cardo', 'Dela Cruz', 'N/A', 'Male', 'Block 3 Lot 5', 'Sunnyvale 2', 'Palangoy', 'Palangoy', 'N/A', 'cardoDalisay@gmail.com', '1977-11-07', '09123456789', 'N/A', 'N/A'),
(18, '', 'SV1_Admin', NULL, NULL, '', '', 'Sunnyvale 1', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(50, '', 'SV3_Admin', NULL, NULL, '', '', 'Sunnyvale 3', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(54, '', 'Super_Admin', NULL, NULL, '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL),
(55, 'Wick', 'John', 'Middle', 'N/A', 'Male', 'Lot 10 Block 3', 'Sunnyvale 3', 'Palangoy', 'N/A', 'N/A', 'johnwick@gmail.com', '2023-05-09', '09123456789', 'N/A', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `lot`
--

DROP TABLE IF EXISTS `lot`;
CREATE TABLE IF NOT EXISTS `lot` (
  `lot_id` int(11) NOT NULL AUTO_INCREMENT,
  `block_id` int(11) NOT NULL,
  `lot` varchar(10) NOT NULL,
  PRIMARY KEY (`lot_id`)
) ENGINE=MyISAM AUTO_INCREMENT=405 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lot`
--

INSERT INTO `lot` (`lot_id`, `block_id`, `lot`) VALUES
(1, 1, '2'),
(4, 2, '2'),
(5, 5, '1'),
(6, 1, '1'),
(7, 1, '3'),
(8, 1, '4'),
(9, 1, '5'),
(10, 1, '6'),
(11, 1, '7'),
(12, 1, '8'),
(13, 1, '9'),
(14, 1, '10'),
(15, 2, '1'),
(16, 2, '3'),
(17, 2, '4'),
(18, 2, '5'),
(19, 2, '6'),
(20, 2, '7'),
(21, 2, '8'),
(22, 2, '9'),
(23, 2, '10'),
(24, 4, '1'),
(25, 4, '2'),
(404, 11, '5'),
(27, 4, '4'),
(28, 4, '5'),
(29, 4, '6'),
(30, 4, '7'),
(31, 4, '8'),
(32, 4, '9'),
(33, 4, '10'),
(34, 10, '1'),
(35, 10, '2'),
(36, 4, '3'),
(37, 10, '3'),
(39, 10, '5'),
(40, 10, '6'),
(41, 10, '7'),
(42, 10, '8'),
(43, 10, '9'),
(44, 10, '10'),
(45, 11, '1'),
(46, 11, '2'),
(47, 11, '3'),
(48, 10, '4'),
(49, 11, '6'),
(50, 11, '7'),
(51, 11, '8'),
(52, 11, '9'),
(53, 11, '10'),
(54, 12, '1'),
(55, 12, '2'),
(56, 12, '3'),
(57, 12, '4'),
(58, 12, '5'),
(59, 12, '6'),
(60, 12, '7'),
(61, 12, '8'),
(62, 11, '4'),
(63, 12, '10'),
(64, 12, '9'),
(65, 13, '1'),
(66, 13, '2'),
(67, 13, '3'),
(68, 13, '4'),
(69, 13, '5'),
(70, 13, '6'),
(71, 13, '7'),
(72, 13, '8'),
(73, 13, '9'),
(74, 13, '10'),
(75, 14, '1'),
(76, 14, '2'),
(77, 14, '3'),
(78, 14, '4'),
(79, 14, '5'),
(80, 14, '6'),
(81, 14, '7'),
(82, 14, '8'),
(83, 14, '9'),
(84, 14, '10'),
(85, 15, '1'),
(86, 15, '2'),
(87, 15, '3'),
(88, 15, '4'),
(89, 15, '5'),
(90, 15, '6'),
(91, 15, '7'),
(92, 15, '8'),
(93, 15, '9'),
(94, 15, '10'),
(95, 16, '1'),
(96, 16, '2'),
(97, 16, '3'),
(98, 16, '4'),
(99, 16, '5'),
(100, 16, '6'),
(101, 16, '7'),
(102, 16, '8'),
(103, 16, '9'),
(104, 16, '10'),
(105, 9, '1'),
(106, 9, '2'),
(107, 9, '3'),
(108, 9, '4'),
(109, 9, '5'),
(110, 9, '6'),
(111, 9, '7'),
(112, 9, '8'),
(113, 9, '9'),
(114, 9, '10'),
(115, 17, '1'),
(116, 17, '2'),
(117, 17, '3'),
(118, 17, '4'),
(119, 17, '5'),
(120, 17, '6'),
(121, 17, '7'),
(122, 17, '8'),
(123, 17, '9'),
(124, 17, '10'),
(125, 6, '1'),
(126, 6, '2'),
(127, 6, '3'),
(128, 6, '4'),
(129, 6, '5'),
(130, 6, '7'),
(131, 6, '8'),
(132, 6, '9'),
(133, 6, '10'),
(134, 18, '1'),
(135, 18, '2'),
(136, 18, '3'),
(137, 18, '4'),
(138, 18, '5'),
(139, 18, '6'),
(140, 18, '7'),
(141, 18, '8'),
(142, 18, '9'),
(143, 18, '10'),
(144, 19, '1'),
(145, 19, '2'),
(146, 19, '3'),
(147, 19, '4'),
(148, 19, '5'),
(149, 19, '6'),
(150, 19, '7'),
(151, 19, '8'),
(152, 19, '9'),
(153, 19, '10'),
(154, 20, '1'),
(155, 20, '2'),
(156, 20, '3'),
(157, 20, '4'),
(158, 20, '5'),
(159, 20, '6'),
(160, 20, '7'),
(161, 20, '8'),
(162, 20, '9'),
(163, 20, '10'),
(164, 21, '1'),
(165, 21, '2'),
(166, 21, '3'),
(167, 21, '4'),
(168, 21, '5'),
(169, 21, '6'),
(170, 21, '7'),
(171, 21, '8'),
(172, 21, '9'),
(173, 21, '10'),
(174, 22, '1'),
(175, 22, '2'),
(176, 22, '3'),
(177, 22, '4'),
(178, 22, '5'),
(179, 22, '6'),
(180, 22, '7'),
(181, 22, '8'),
(182, 22, '9'),
(183, 22, '10'),
(184, 23, '1'),
(185, 23, '2'),
(186, 23, '3'),
(187, 23, '4'),
(188, 23, '5'),
(189, 23, '6'),
(190, 23, '7'),
(191, 23, '8'),
(192, 23, '9'),
(193, 23, '10'),
(194, 24, '1'),
(195, 24, '2'),
(196, 24, '3'),
(197, 24, '4'),
(198, 24, '5'),
(199, 24, '6'),
(200, 24, '7'),
(201, 24, '8'),
(202, 24, '9'),
(203, 24, '10'),
(204, 6, '6'),
(205, 5, '2'),
(206, 5, '3'),
(207, 5, '4'),
(208, 5, '5'),
(209, 5, '6'),
(210, 5, '7'),
(211, 5, '8'),
(212, 5, '9'),
(213, 5, '10'),
(214, 25, '1'),
(215, 25, '2'),
(216, 25, '3'),
(217, 25, '4'),
(218, 25, '5'),
(219, 25, '6'),
(220, 25, '7'),
(221, 25, '8'),
(222, 25, '9'),
(223, 25, '10'),
(224, 3, '1'),
(225, 3, '2'),
(226, 3, '3'),
(227, 3, '4'),
(228, 3, '5'),
(229, 3, '6'),
(230, 3, '7'),
(231, 3, '8'),
(232, 3, '9'),
(233, 3, '10'),
(234, 26, '1'),
(235, 26, '2'),
(236, 26, '3'),
(237, 26, '4'),
(238, 26, '5'),
(239, 26, '6'),
(240, 26, '7'),
(241, 26, '8'),
(242, 26, '9'),
(243, 26, '10'),
(244, 27, '1'),
(245, 27, '2'),
(246, 27, '3'),
(247, 27, '4'),
(248, 27, '5'),
(249, 27, '6'),
(250, 27, '8'),
(251, 27, '9'),
(252, 27, '10'),
(253, 28, '1'),
(254, 28, '2'),
(255, 28, '3'),
(256, 28, '4'),
(257, 28, '5'),
(258, 28, '6'),
(259, 28, '7'),
(260, 28, '8'),
(261, 28, '9'),
(262, 28, '10'),
(263, 29, '1'),
(264, 29, '2'),
(265, 29, '3'),
(266, 29, '4'),
(267, 29, '5'),
(268, 29, '6'),
(269, 29, '7'),
(270, 29, '8'),
(271, 29, '9'),
(272, 29, '10'),
(273, 30, '1'),
(274, 30, '2'),
(275, 30, '3'),
(276, 30, '4'),
(277, 30, '5'),
(278, 30, '6'),
(279, 30, '7'),
(280, 30, '8'),
(281, 30, '9'),
(282, 30, '10'),
(283, 31, '1'),
(284, 31, '2'),
(285, 31, '3'),
(286, 31, '4'),
(287, 31, '5'),
(288, 31, '6'),
(289, 31, '7'),
(290, 31, '8'),
(291, 31, '9'),
(292, 31, '10'),
(293, 32, '1'),
(294, 32, '2'),
(295, 32, '3'),
(296, 32, '4'),
(297, 32, '5'),
(298, 32, '6'),
(299, 32, '7'),
(300, 32, '8'),
(301, 32, '9'),
(302, 32, '10'),
(303, 27, '7'),
(304, 8, '1'),
(305, 8, '2'),
(306, 8, '3'),
(307, 8, '4'),
(308, 8, '5'),
(309, 8, '6'),
(310, 8, '7'),
(311, 8, '8'),
(312, 8, '9'),
(313, 8, '10'),
(314, 33, '1'),
(315, 33, '2'),
(316, 33, '3'),
(317, 33, '4'),
(318, 33, '5'),
(319, 33, '6'),
(320, 33, '7'),
(321, 33, '8'),
(322, 33, '9'),
(323, 33, '10'),
(324, 34, '1'),
(325, 34, '2'),
(326, 34, '3'),
(327, 34, '4'),
(328, 34, '5'),
(329, 34, '6'),
(330, 34, '7'),
(331, 34, '8'),
(332, 34, '9'),
(333, 34, '10'),
(334, 35, '1'),
(335, 35, '2'),
(336, 35, '3'),
(337, 35, '4'),
(338, 35, '5'),
(339, 35, '6'),
(340, 35, '7'),
(341, 35, '8'),
(342, 35, '9'),
(343, 35, '10'),
(344, 36, '1'),
(345, 36, '2'),
(346, 36, '3'),
(347, 36, '4'),
(348, 36, '5'),
(349, 36, '6'),
(350, 36, '7'),
(351, 36, '8'),
(352, 36, '9'),
(353, 36, '10'),
(354, 37, '1'),
(355, 37, '2'),
(356, 37, '3'),
(357, 37, '4'),
(358, 37, '5'),
(359, 37, '6'),
(360, 37, '7'),
(361, 37, '8'),
(362, 37, '9'),
(363, 37, '10'),
(364, 38, '1'),
(365, 38, '2'),
(366, 38, '3'),
(367, 38, '4'),
(368, 38, '5'),
(369, 38, '6'),
(370, 38, '7'),
(371, 38, '8'),
(372, 38, '9'),
(373, 38, '10'),
(374, 40, '1'),
(375, 40, '2'),
(376, 40, '3'),
(377, 40, '4'),
(378, 40, '5'),
(379, 40, '6'),
(380, 40, '7'),
(381, 40, '8'),
(382, 40, '9'),
(383, 40, '10'),
(384, 41, '1'),
(385, 41, '2'),
(386, 41, '3'),
(387, 41, '4'),
(388, 41, '5'),
(389, 41, '6'),
(390, 41, '7'),
(391, 41, '8'),
(392, 41, '9'),
(393, 41, '10'),
(394, 39, '1'),
(395, 39, '2'),
(396, 39, '3'),
(397, 39, '4'),
(398, 39, '5'),
(399, 39, '6'),
(400, 39, '7'),
(401, 39, '8'),
(402, 39, '9'),
(403, 39, '10');

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
  `subdivision_id` int(11) NOT NULL,
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
  `officer_img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`officer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `officers`
--

INSERT INTO `officers` (`officer_id`, `subdivision_name`, `officer_name`, `position_name`, `officer_img`) VALUES
(1, 'Sunnyvale 1', 'Saddie Wheeler', 'President', 'pf1.jpg'),
(2, 'Sunnyvale 1', 'Bennett Cooke', 'Vice President', 'pf2.jpg'),
(3, 'Sunnyvale 1', 'Martin Craig', 'Secretary', 'pf3.jpg'),
(4, 'Sunnyvale 1', 'Audrey Benson', 'Treasurer', 'pf4.jpg'),
(5, 'Sunnyvale 1', 'Ruth Walsh', 'Auditor', 'pf5.jpg'),
(6, 'Sunnyvale 1', 'Hadley Steele', 'PIO', 'pf6.jpg'),
(20, 'Sunnyvale 2', 'Zakir Hodges', 'Treasurer', ''),
(10, 'Sunnyvale 2', 'Bogart D. Explorer', 'President', NULL),
(18, 'Sunnyvale 2', 'Aya Price', 'Vice President', ''),
(19, 'Sunnyvale 2', 'Maxim Diaz', 'Secretary', ''),
(21, 'Sunnyvale 2', 'Gloria Sharp', 'Auditor', ''),
(22, 'Sunnyvale 2', 'Dulcie Matthams', 'PIO', '');

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
(6, 1, 'Sunnyvale 1', 'PIO');

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
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `full_name`, `title`, `content`, `published_at`, `days_archive`, `content_image`, `officer_post`, `post_status`) VALUES
(1, 28, 'Mon Carlo Delima', 'The moon is beautiful, isn\'t it?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.', '2023-04-11 01:09:01', NULL, '315906640_1753081135077201_6331420859846659098_n.png', 'No', 'Active'),
(2, 24, 'Jeune Paolus Flores', 'Fascinating art created by nature.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.', '2023-04-11 09:59:54', NULL, '316218368_829271824950879_360246867658747215_n.png', 'No', 'Active'),
(3, 23, 'Kyle Andrei Casingal', 'Reflection', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.', '2023-04-11 10:03:11', NULL, '316189223_691988422233113_5145406262467036356_n.png', 'No', 'Active'),
(4, 23, 'Kyle Andrei Casingal', 'Windows of truth shows the real beauty of nature.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.', '2023-04-11 10:04:40', NULL, '313194508_684251046380877_4560164667618025920_n.png', 'No', 'Active'),
(5, 28, 'Mon Carlo Delima', 'Vintage mansion represents calm, warm, and peace.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.', '2022-11-24 10:05:22', NULL, '312140489_698881924813395_203606755662892340_n.png', 'No', 'Active'),
(15, 52, 'Marco Ivan Sta. Maria', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.', '2022-12-01 06:37:21', NULL, 'Picture2.jpg', 'No', 'Active'),
(17, 53, 'Krishtalene BendaÃ±a', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.', '2022-12-01 06:48:54', NULL, 'Picture4.png', 'No', 'Active'),
(18, 52, 'Marco Ivan Sta. Maria', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.', '2022-12-01 06:49:23', NULL, 'Picture5.jpg', 'No', 'Active'),
(19, 53, 'Krishtalene BendaÃ±a', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.', '2022-12-01 06:50:15', NULL, 'Picture6.jpg', 'No', 'Active'),
(20, 52, 'Marco Ivan Sta. Maria', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.', '2022-12-01 06:51:00', NULL, 'Picture3.png', 'No', 'Active'),
(24, 55, 'Kyle Andrei Casingal', 'Light Bulb', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.', '2022-12-01 10:13:20', NULL, '188-1889845_a-very-simple-concept-infinitustoken-medium-light-bulb.png', 'No', 'Active'),
(28, 18, 'SV1_Admin', 'Water interruption', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.', '2023-01-24 20:00:38', NULL, '', 'Yes', 'Active'),
(29, 18, 'SV1_Admin', 'Chinese New Year event', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.', '2023-01-24 20:06:20', NULL, '', 'Yes', 'Active'),
(30, 1, 'Mon Carlo Delima', 'URS', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.', '2023-03-16 22:24:20', NULL, 'URS.png', 'No', 'Active'),
(31, 1, 'Mon Carlo Delima', 'Nihonjin Desu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.', '2023-04-02 12:59:46', NULL, 'lockscreen.png', 'No', 'Active'),
(32, 1, 'Mon Carlo Delima', 'Magical World', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.', '2023-04-02 13:00:31', NULL, 'sEt5ph.jpg', 'No', 'Active'),
(33, 18, 'SV1_Admin', 'Power Interruption', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.', '2023-02-04 13:06:44', 1, '', 'Yes', 'Active'),
(34, 18, 'SV1_Admin', 'Basketball Tryouts', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.', '2023-02-22 21:43:21', 30, '', 'Yes', 'Active'),
(35, 18, 'SV1_Admin', 'Volleyball Tryouts', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.', '2023-03-17 21:43:35', 30, '', 'Yes', 'Active'),
(36, 18, 'SV1_Admin', 'Swimming Lessons', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.', '2023-01-04 21:43:46', 30, '', 'Yes', 'Active'),
(37, 18, 'SV1_Admin', 'Founding Anniv. Celebration', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.', '2023-02-01 21:44:01', 30, '', 'Yes', 'Active'),
(38, 1, 'Mon Carlo Delima', 'Sun and Moon', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.', '2023-04-14 14:19:37', NULL, 'dsa.jpg', 'No', 'Active'),
(40, 1, 'Mon Carlo Delima', 'This is a test upload', 'Test', '2023-05-09 14:29:47', NULL, 'Facebook-logo.png', 'No', 'Active'),
(41, 67, 'Monkey Luffy', 'This is a tenant post', 'Tenant post', '2023-05-09 14:30:08', NULL, 'tiktok_PNG1.png', 'No', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `privacy`
--

DROP TABLE IF EXISTS `privacy`;
CREATE TABLE IF NOT EXISTS `privacy` (
  `privacy_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`privacy_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `privacy`
--

INSERT INTO `privacy` (`privacy_id`, `type`, `description`) VALUES
(1, 'Privacy Policy for Sunnyvale Subdivisions', 'At Sunnyvale Subdivisions, we take your privacy seriously. This Privacy Policy outlines the types of personal information that we may collect from you when you visit our website and how we use and protect that information. By using our website, you agree to the terms of this Privacy Policy.'),
(2, 'What information do we collect?', 'We may collect personal information such as your name, email address, mailing address, phone number, and other information that you voluntarily provide to us when you sign up for our newsletter, fill out a form, or contact us through our website.\r\n\r\nWe also automatically collect certain non-personal information about your visit to our website, such as your IP address, browser type, device type, and operating system. This information is used to analyze and improve the performance and usability of our website.'),
(3, 'How do we use your information?', 'We may use the personal information that you provide to us to respond to your inquiries, send you our newsletter or marketing communications, process your orders, and provide you with other information or services that you request from us.\r\n\r\nWe may also use the non-personal information that we collect to analyze trends and usage patterns, improve our website, and to protect our website and our users from fraudulent or unauthorized activities.'),
(4, 'Do we share your information?', 'We do not sell, trade, or otherwise transfer your personal information to third parties without your consent, except as necessary to provide you with the services that you have requested from us. We may also share your information with our trusted service providers who assist us in operating our website, conducting our business, or servicing you, as long as those parties agree to keep this information confidential.\r\n\r\nWe may also disclose your information if we are required to do so by law or in response to a legal process, or if we believe that such disclosure is necessary to protect our rights, property, or safety, or the rights, property, or safety of our users or others.'),
(5, 'How do we protect your information?', 'We take reasonable measures to protect your personal information from unauthorized access, use, disclosure, alteration, or destruction. However, no data transmission over the Internet or storage of electronic data can be guaranteed to be 100% secure, and we cannot guarantee the security of any information that you provide to us.'),
(6, 'Your rights and choices', 'You have the right to access and modify the personal information that we have collected from you by contacting us at [Your Contact Information]. You may also opt-out of receiving our newsletter or marketing communications at any time by following the instructions provided in those communications.'),
(7, 'Updates to this Privacy Policy', 'We may update this Privacy Policy from time to time by posting a new version on our website. You should check this page periodically to ensure that you are aware of any changes.'),
(8, 'Contact Us', 'If you have any questions or concerns about this Privacy Policy, please contact us at subdivisionsunnyvale@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `sticker`
--

DROP TABLE IF EXISTS `sticker`;
CREATE TABLE IF NOT EXISTS `sticker` (
  `sticker_id` int(11) NOT NULL AUTO_INCREMENT,
  `subdivision` varchar(50) NOT NULL,
  `cost` int(11) NOT NULL,
  PRIMARY KEY (`sticker_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sticker`
--

INSERT INTO `sticker` (`sticker_id`, `subdivision`, `cost`) VALUES
(1, 'Sunnyvale 1', 150),
(2, 'Sunnyvale 2', 200),
(3, 'Sunnyvale 3', 180),
(4, 'Sunnyvale 4', 245);

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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

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
-- Table structure for table `tenant`
--

DROP TABLE IF EXISTS `tenant`;
CREATE TABLE IF NOT EXISTS `tenant` (
  `tenant_id` int(11) NOT NULL AUTO_INCREMENT,
  `homeowner_id` int(11) NOT NULL,
  `first_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `subdivision` varchar(50) DEFAULT NULL,
  `birthdate` date NOT NULL,
  `sex` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `mobile_no` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `display_picture` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`tenant_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`tenant_id`, `homeowner_id`, `first_name`, `middle_name`, `last_name`, `subdivision`, `birthdate`, `sex`, `email`, `mobile_no`, `display_picture`) VALUES
(1, 1, 'Monkey', 'D.', 'Luffy', 'Sunnyvale 1', '2023-04-12', 'Male', 'dmoncarlo@gmail.com', '09123456789', 'default.png'),
(2, 1, 'Bogart', 'D.', 'Explorer', 'Sunnyvale 1', '2023-03-01', 'Male', 'bogartdexplorer@gmail.com', '09123456789', 'default.png'),
(3, 1, 'Portgas', 'D.', 'Ace', 'Sunnyvale 1', '2023-04-13', 'Male', 'donut@gmail.com', '09123456789', 'default.png'),
(4, 1, 'Mon', 'Bogart', 'D', 'Sunnyvale 1', '2023-05-09', 'Male', '123@gmail.com', '12121212', 'default.png'),
(5, 1, 'Mon', '22', 'forever', 'Sunnyvale 1', '2023-05-03', 'Male', '12223@gmail.com', '2222222', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `total_cost` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `payment_proof` varchar(255) DEFAULT NULL,
  `transaction_type` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `user_id`, `name`, `total_cost`, `quantity`, `payment_proof`, `transaction_type`, `status`, `datetime`) VALUES
(1, 1, 'Mon Carlo Delima', 1500, NULL, '315887907_1137649846869408_655406644278059076_n.png', 'Amenity Renting', 'Approved', '2023-05-06 07:59:14'),
(2, 48, 'SV1_Treasurer', 180, NULL, '315887907_1137649846869408_655406644278059076_n.png', 'Amenity Renting', 'Approved', '2023-05-06 08:00:25'),
(3, 1, 'Mon Carlo Delima', 2150, NULL, '328148270_726681382138928_1391919010667224674_n.png', 'Amenity Renting', 'Approved', '2023-05-06 08:00:27'),
(4, 1, 'Mon Carlo Delima', 600, NULL, '328148270_726681382138928_1391919010667224674_n.png', 'Monthly Dues', 'Paid', '2023-05-06 08:07:37'),
(5, 55, 'Kyle Andrei Casingal', 1500, NULL, '328148270_726681382138928_1391919010667224674_n.png', 'Monthly Dues', 'Paid', '2023-05-06 07:28:09'),
(6, 55, 'Kyle Andrei Casingal', 1500, NULL, '328148270_726681382138928_1391919010667224674_n.png', 'Monthly Dues', 'Paid', '2023-05-06 07:27:54'),
(9, 48, 'SV1_Treasurer', 800, NULL, NULL, 'Monthly Dues', 'Paid', '2023-05-06 07:28:16'),
(10, 48, 'SV1_Treasurer', 1000, NULL, NULL, 'Monthly Dues', 'Paid', '2023-05-06 07:28:17'),
(11, 1, 'Mon Carlo Delima', 50, NULL, '328148270_726681382138928_1391919010667224674_n.png', 'Amenity Renting', 'Approved', '2023-05-06 08:00:29'),
(12, 1, 'Mon Carlo Delima', 150, 1, 'drawSQL-sunnyvale-export-2023-04-10.png', 'Vehicle Sticker', 'Paid', '2023-05-08 15:38:39'),
(13, 1, 'Mon Carlo Delima', 450, 3, 'tiktok_PNG1.png', 'Vehicle Sticker', 'Paid', '2023-05-08 15:49:05'),
(14, 64, 'Super_Admin', 360, 2, NULL, 'Vehicle Sticker', 'Paid', NULL),
(15, 64, 'Super_Admin', 300, 2, NULL, 'Vehicle Sticker', 'Paid', NULL),
(16, 1, 'Mon Carlo Delima', 2130, NULL, 'tiktok_PNG1.png', 'Amenity Renting', 'Pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_homeowner_id` int(11) DEFAULT NULL,
  `user_tenant_id` int(11) DEFAULT NULL,
  `subdivision` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `user_type` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email_address` varchar(40) DEFAULT NULL,
  `account_status` varchar(15) NOT NULL,
  `verification_code` varchar(6) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `display_picture` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_homeowner_id`, `user_tenant_id`, `subdivision`, `full_name`, `user_type`, `password`, `email_address`, `account_status`, `verification_code`, `email_verified_at`, `display_picture`) VALUES
(55, 2, NULL, 'Sunnyvale 3', 'Kyle Andrei Casingal', 'Homeowner', 'password', 'kylecasingal36@gmail.com', 'Activated', '248425', '2022-12-01 10:11:20', '316495100_870517180796101_3304939871151226288_n.jpg'),
(3, 3, NULL, 'Sunnyvale 2', 'Jeune Paolus Flores', 'Homeowner', 'thisfeelsgud', 'floresjeunepaolus@gmail.com', 'Activated', '943962', '2022-11-10 22:51:58', '316156823_3360766927514073_2770550987709432568_n.jpg'),
(1, 1, NULL, 'Sunnyvale 1', 'Mon Carlo Delima', 'Homeowner', '12345', 'dmoncarlo6@gmail.com', 'Activated', '286140', '2022-11-24 13:48:07', 'DELIMA_2x2.png'),
(27, 16, NULL, 'Sunnyvale 1', 'Janwel Castillo', 'Homeowner', 'dadada', 'janweljigycastillo20@gmail.com', 'Activated', '943962', '2022-11-15 20:43:59', '315887907_1137649846869408_655406644278059076_n.png'),
(58, 50, NULL, 'Sunnyvale 3', 'SV3_Admin', 'Admin', 'password', 'SV3_Admin', 'Activated', NULL, NULL, 'default.png'),
(18, 18, NULL, 'Sunnyvale 1', 'SV1_Admin', 'Admin', 'password', 'SV1_Admin', 'Activated', NULL, NULL, 'default.png'),
(42, 17, NULL, 'Sunnyvale 1', 'Roiemar Escueta', 'Homeowner', '123', 'escuetaroiemar@gmail.com', 'Activated', '135447', '2022-11-28 23:28:23', 'default.png'),
(46, 28, NULL, 'Sunnyvale 1', 'SV1_Secretary', 'Secretary', '123', 'SV1_Secretary', 'Activated', NULL, NULL, 'default.png'),
(48, 36, NULL, 'Sunnyvale 1', 'SV1_Treasurer', 'Treasurer', '123', 'SV1_Treasurer', 'Activated', NULL, NULL, 'default.png'),
(49, 37, NULL, 'Sunnyvale 2', 'SV2_Admin', 'Admin', 'password', 'SV2_Admin', 'Activated', NULL, NULL, 'default.png'),
(52, 39, NULL, 'Sunnyvale 1', 'Marco Ivan Sta. Maria', 'Homeowner', '123', 'marcoivanstamaria@gmail.com', 'Activated', '257545', '2022-12-01 06:31:28', '290509682_1413885909103188_6599438684369654480_n.jpg'),
(53, 8, NULL, 'Sunnyvale 2', 'Krishtalene BendaÃ±a', 'Homeowner', '123', 'tissabendana@gmail.com', 'Activated', '573856', '2022-12-01 06:37:48', '86705321_2748280675293170_833038108541845504_n.jpg'),
(59, 51, NULL, 'Sunnyvale 1', 'SV1_Guard', 'Guard', '123', 'SV1_Guard', 'Activated', NULL, NULL, 'default.png'),
(66, 61, NULL, '', 'Super_Admin', 'Admin', 'password', 'Super_Admin', 'Activated', NULL, NULL, 'default.png'),
(67, NULL, 1, 'Sunnyvale 1', 'Monkey Luffy', 'Tenant', '123', 'dmoncarlo@gmail.com', 'Activated', '123', '2023-05-09 14:06:51', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_monitoring`
--

DROP TABLE IF EXISTS `vehicle_monitoring`;
CREATE TABLE IF NOT EXISTS `vehicle_monitoring` (
  `vehicle_monitoring_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_registration` varchar(10) NOT NULL,
  `vehicle_type` varchar(50) NOT NULL,
  `vehicle_color` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`vehicle_monitoring_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicle_monitoring`
--

INSERT INTO `vehicle_monitoring` (`vehicle_monitoring_id`, `vehicle_registration`, `vehicle_type`, `vehicle_color`, `datetime`, `status`) VALUES
(10, 'XYZ 9876', 'Sedan', 'White', '2023-04-09 14:23:51', 'INCOMING'),
(11, 'XYZ 9876', 'Truck', 'Red', '2023-04-09 14:24:00', 'INCOMING'),
(9, 'LTO 1234', 'Van', 'Blue', '2023-04-09 14:23:42', 'INCOMING');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

DROP TABLE IF EXISTS `years`;
CREATE TABLE IF NOT EXISTS `years` (
  `yearID` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(45) NOT NULL,
  PRIMARY KEY (`yearID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

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
