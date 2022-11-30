-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 30, 2022 at 12:10 PM
-- Server version: 8.0.28
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
  `amenity_id` int NOT NULL AUTO_INCREMENT,
  `amenity_name` varchar(255) NOT NULL,
  `subdivision_name` varchar(50) NOT NULL,
  `price` int NOT NULL,
  `availability` varchar(50) NOT NULL,
  PRIMARY KEY (`amenity_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`amenity_id`, `amenity_name`, `subdivision_name`, `price`, `availability`) VALUES
(1, 'Basketball Court', 'Sunnyvale 1', 150, 'Available'),
(2, 'Volleyball Court', 'Sunnyvale 1', 150, 'Available'),
(3, 'Badminton Court', 'Sunnyvale 2', 150, 'Available'),
(4, 'Multi-purpose Hall', 'Sunnyvale 2', 200, 'Available'),
(5, 'Swimming Pool', 'Sunnyvale 1', 200, 'Available'),
(6, 'Clubhouse', 'Sunnyvale 1', 400, 'Unavailable'),
(9, 'Basketball Court', 'Sunnyvale 8', 500, 'Available'),
(10, 'Clubhouse', 'Sunnyvale 3', 250, 'Available'),
(11, 'Basketball Court', 'Sunnyvale 4', 50, 'Available'),
(12, 'Swimming Pool', 'Sunnyvale 1', 480, 'Available'),
(13, 'Court of Appeal', 'Sunnyvale 1', 20, 'Available'),
(14, 'Volleyball Court', 'Sunnyvale 2', 21, 'Available'),
(16, 'Bathhouse', 'Sunnyvale 1', 300, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `audit_trail`
--

DROP TABLE IF EXISTS `audit_trail`;
CREATE TABLE IF NOT EXISTS `audit_trail` (
  `audit_id` int NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `action` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`audit_id`)
) ENGINE=MyISAM AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb3;

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
(93, 'SV1_Secretary', 'logged out', '2022-11-30 16:52:35');

-- --------------------------------------------------------

--
-- Table structure for table `concern`
--

DROP TABLE IF EXISTS `concern`;
CREATE TABLE IF NOT EXISTS `concern` (
  `concern_id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL,
  `concern_subject` varchar(100) NOT NULL,
  `concern_description` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`concern_id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `concern`
--

INSERT INTO `concern` (`concern_id`, `full_name`, `concern_subject`, `concern_description`, `status`, `datetime`) VALUES
(1, 'Mon Carlo Delima', 'Noise Complaint', 'Nagvivideoke pa rin yung kapitbahay namin kahit lagpas 10 na', 'Pending', '2022-11-10 22:13:45'),
(2, 'Mon Carlo Delima', 'Basura', 'Kung saan-saan nagtatapon ng basura yung kapitbahay ko.', 'Pending', '2022-11-02 22:13:59'),
(3, 'Mon Carlo Delima', 'Vandalism', 'Dinrawingan ng kapitbahay namin yung kalsada sa tapat ng bahay namin.', 'Pending', '2022-11-04 22:14:02'),
(6, 'Mon Carlo Delima', 'Aso', 'Nagtatae sa harap ng bahay', 'Pending', '2022-11-22 22:14:03'),
(7, 'Mon Carlo Delima', 'Kapitbahay', 'Malapit na magsaksakan', 'Pending', '2022-11-18 22:14:06'),
(41, 'Mon Carlo Delima', 'Lasing', 'Nagwawala sa daan', 'Pending', '2022-11-20 22:14:08'),
(45, 'Mon Carlo Delima', 'Batang maingay', 'Iyak nang iyak', 'Pending', '2022-11-27 22:14:09'),
(44, 'Mon Carlo Delima', 'Pusa sa bubong', 'Nagnanakaw ng ulam', 'Pending', '2022-11-28 22:14:11'),
(43, 'Mon Carlo Delima', 'Singer', 'Sintunado, maingay', 'Pending', '2022-11-12 22:14:13'),
(42, 'Mon Carlo Delima', 'Noise complaint', 'nagddrums, hindi naman magaling', 'Pending', '2022-11-18 22:14:15');

-- --------------------------------------------------------

--
-- Table structure for table `facility_renting`
--

DROP TABLE IF EXISTS `facility_renting`;
CREATE TABLE IF NOT EXISTS `facility_renting` (
  `transaction_id` int NOT NULL AUTO_INCREMENT,
  `amenity_name` varchar(255) NOT NULL,
  `renter_name` varchar(255) NOT NULL,
  `date_from` datetime NOT NULL,
  `date_to` datetime NOT NULL,
  `cost` int NOT NULL,
  `payment_proof` varchar(255) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `facility_renting`
--

INSERT INTO `facility_renting` (`transaction_id`, `amenity_name`, `renter_name`, `date_from`, `date_to`, `cost`, `payment_proof`) VALUES
(1, 'Basketball Court', 'Mon Carlo Delima', '2022-11-26 01:00:00', '2022-11-26 02:00:00', 150, 'test'),
(2, 'Volleyball Court', 'Mon Carlo Delima', '2022-11-26 02:00:00', '2022-11-26 04:00:00', 300, 'test'),
(3, 'Multi-purpose Hall', 'Mon Carlo Delima', '2022-11-27 05:30:00', '2022-11-27 06:30:00', 150, 'Delima, Mon Carlo Z. output.png'),
(4, 'Basketball Court', '', '2022-12-01 19:00:00', '2022-12-01 20:00:00', 150, 'monsters-university-clipart-clipart-panda-free-clipart-images-9HMBXK-clipart.gif');

-- --------------------------------------------------------

--
-- Table structure for table `homeowner_profile`
--

DROP TABLE IF EXISTS `homeowner_profile`;
CREATE TABLE IF NOT EXISTS `homeowner_profile` (
  `homeowner_id` int NOT NULL AUTO_INCREMENT,
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
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `homeowner_profile`
--

INSERT INTO `homeowner_profile` (`homeowner_id`, `last_name`, `first_name`, `middle_name`, `suffix`, `sex`, `street`, `subdivision`, `barangay`, `business_address`, `occupation`, `email_address`, `birthdate`, `mobile_number`, `employer`, `display_picture`) VALUES
(1, 'Delima', 'Mon Carlo', 'Zonio', 'N/A', 'Male', 'Lot 1 Block 2', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'dmoncarlo6@gmail.com', '2002-10-06', '09157189636', 'N/A', 'DELIMA_2x2.png'),
(2, 'Casingal', 'Kyle Andrei', 'Morillo', 'N/A', 'Male', 'Lot 1 Block 1', 'Sunnyvale 3', 'Palangoy', 'N/A', 'N/A', 'kylecasingal36@gmail.com', '2001-09-02', '09123456789', 'N/A', '316495100_870517180796101_3304939871151226288_n.jpg'),
(3, 'Flores', 'Jeune Paolus', 'Damaso', 'N/A', 'Male', 'Lot 1 Block 3', 'Sunnyvale 2', 'Pantok', 'N/A', 'N/A', 'floresjeunepaolus@gmail.com', '2002-06-16', '09123123123', 'Inya', '316156823_3360766927514073_2770550987709432568_n.jpg'),
(4, 'Doe', 'John', 'N/A', 'Jr.', 'Male', 'Lot 2 Block 4', 'Sunnyvale 3', 'Palangoy', 'N/A', 'Programmer', 'dmoncarlo@gmail.com', '2002-10-06', '09157189636', 'Mark Zuckerberg', 'default.png'),
(18, '', 'SV1_Admin', NULL, NULL, '', '', '', '', NULL, '', '', NULL, '', NULL, 'default.png'),
(8, 'BendaÃ±a', 'Krishtalene', 'Edejer', 'N/A', 'Female', 'Lot 1 Block 5', 'Sunnyvale 2', 'Pantok', 'N/A', 'N/A', 'tissabendana@gmail.com', '2002-10-19', '09123456789', 'N/A', 'default.png'),
(17, 'Escueta', 'Roiemar', 'Conchada', 'N/A', 'Male', 'Lot 4 Block 3', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'escuetaroiemar@gmail.com', '2022-11-28', '09123456789', 'N/A', 'default.png'),
(16, 'castillo', 'janwel', NULL, 'N/A', 'Male', 'Lot 2 Block 3 ', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'janweljigycastillo20@gmail.com', '2022-11-25', '09123456789', 'N/A', '315887907_1137649846869408_655406644278059076_n.png'),
(38, 'Delima', 'Ralph Monsour', 'Zonio', 'N/A', 'Male', 'Lot 3 Block 1', 'Sunnyvale 1', 'Palangoy', 'Palangoy', 'N/A', 'dmoncarlo@gmail.com', '2022-11-29', '09123456789', 'N/A', 'default.png'),
(30, 'Doe', 'John', 'Smith', 'N/A', 'Male', 'Lot 1 Block 8', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'johndoe@gmail.com', '2010-01-01', '09123456789', 'N/A', 'default.png'),
(28, '', 'SV1_Secretary', NULL, NULL, '', '', '', '', NULL, NULL, '', '2022-11-29', '', '', 'default.png'),
(31, 'Lowery', 'Amirah', 'Meyers', 'N/A', 'Female', 'Lot 1 Block 7', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'amirahlowery@gmail.com', '2009-01-15', '09123456789', 'N/A', 'default.png'),
(32, 'Miller', 'Kian', 'Smith', 'N/A', 'Female', 'Lot 2 Block 10', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'Kian Miller', '1997-07-16', '09123456789', 'N/A', 'default.png'),
(33, 'Shepherd', 'Leona', 'Villegas', 'N/A', 'Female', 'Lot 2 Block 4', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'leonashepherd@gmail.com', '2000-02-29', '09123456789', 'N/A', 'default.png'),
(34, 'Warner', 'Sophie', 'Manning', 'N/A', 'Female', 'Lot 3 Block 7', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'sophiewarner@gmail.com', '1998-06-03', '09123456789', 'N/A', 'default.png'),
(35, 'Hudson', 'Tristram', 'Ray', 'N/A', 'Male', 'Lot 4 Block 1', 'Sunnyvale 1', 'Palangoy', 'N/A', 'N/A', 'tristramhudson', '1982-07-29', '09123456789', 'N/A', 'default.png'),
(36, '', 'SV1_Treasurer', NULL, NULL, '', '', '', '', NULL, NULL, '', '2022-11-29', '', '', 'default.png'),
(37, '', 'SV2_Admin', NULL, NULL, '', '', '', '', NULL, NULL, '', '2022-11-29', '', '', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `monthly_dues`
--

DROP TABLE IF EXISTS `monthly_dues`;
CREATE TABLE IF NOT EXISTS `monthly_dues` (
  `monthly_dues_id` int NOT NULL AUTO_INCREMENT,
  `subdivision_name` varchar(255) NOT NULL,
  `amount` int NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`monthly_dues_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

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
-- Table structure for table `officers`
--

DROP TABLE IF EXISTS `officers`;
CREATE TABLE IF NOT EXISTS `officers` (
  `officer_id` int NOT NULL AUTO_INCREMENT,
  `subdivision_name` varchar(50) NOT NULL,
  `officer_name` varchar(255) NOT NULL,
  `position_name` varchar(50) NOT NULL,
  PRIMARY KEY (`officer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;

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
  `position_id` int NOT NULL AUTO_INCREMENT,
  `subdivision_id` int NOT NULL,
  `subdivision_name` varchar(50) NOT NULL,
  `position_name` varchar(255) NOT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

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
  `post_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `published_at` datetime NOT NULL,
  `content_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `full_name`, `title`, `content`, `published_at`, `content_image`) VALUES
(1, 28, 'Mon Carlo Delima', 'The moon is beautiful, isn\'t it?', '', '2022-11-24 01:09:01', '315906640_1753081135077201_6331420859846659098_n.png'),
(2, 24, 'Jeune Paolus Flores', 'Fascinating art created by nature.', '', '2022-11-24 09:59:54', '316218368_829271824950879_360246867658747215_n.png'),
(3, 23, 'Kyle Andrei Casingal', 'Reflection', 'Imagine seeing these astonishing cars, lively blue skies, and few waves of clouds in an upside-down world. Inconceivable, isn\'t it?', '2022-11-24 10:03:11', '316189223_691988422233113_5145406262467036356_n.png'),
(4, 23, 'Kyle Andrei Casingal', 'Windows of truth shows the real beauty of nature.', '', '2022-11-24 10:04:40', '313194508_684251046380877_4560164667618025920_n.png'),
(5, 28, 'Mon Carlo Delima', 'Vintage mansion represents calm, warm, and peace.', '', '2022-11-24 10:05:22', '312140489_698881924813395_203606755662892340_n.png'),
(6, 28, 'Mon Carlo Delima', 'Hello there!', 'I have the high ground!', '2022-11-24 22:12:30', '05b.jpg'),
(7, 28, 'Mon Carlo Delima', 'PB', 'Princess Bubblegum', '2022-11-26 15:49:56', 'Delima, Mon Carlo Z..png'),
(8, 28, 'Mon Carlo Delima', 'Mike Wazowski', 'One eye', '2022-11-26 16:03:52', 'Delima, Mon Carlo Z. - Color Layer.png'),
(12, 28, 'Mon Carlo Delima', 'Walang picture ito', 'Text lang', '2022-11-27 00:05:53', ''),
(13, 28, 'Mon Carlo Delima', 'Pixel Art', 'hahaha', '2022-11-28 23:17:37', '95218308_1293814724147342_3915191701978742784_n.png'),
(14, 42, 'Roiemar Escueta', 'splb', 'hagot', '2022-11-28 23:31:07', 'AFFEECTIONATE.png');

-- --------------------------------------------------------

--
-- Table structure for table `subdivision`
--

DROP TABLE IF EXISTS `subdivision`;
CREATE TABLE IF NOT EXISTS `subdivision` (
  `subdivision_id` int NOT NULL AUTO_INCREMENT,
  `subdivision_name` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  PRIMARY KEY (`subdivision_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

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
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_homeowner_id` int NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `user_type` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email_address` varchar(40) DEFAULT NULL,
  `account_status` varchar(15) NOT NULL,
  `verification_code` varchar(6) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_homeowner_id`, `full_name`, `user_type`, `password`, `email_address`, `account_status`, `verification_code`, `email_verified_at`) VALUES
(2, 2, 'Kyle Andrei Casingal', 'Homeowner', 'password', 'kylecasingal36@gmail.com', 'Deactivated', '943962', '2022-11-10 22:50:54'),
(3, 3, 'Jeune Paolus Flores', 'Homeowner', 'thisfeelsgud', 'floresjeunepaolus@gmail.com', 'Activated', '943962', '2022-11-10 22:51:58'),
(1, 1, 'Mon Carlo Delima', 'Homeowner', '12345', 'dmoncarlo6@gmail.com', 'Activated', '286140', '2022-11-24 13:48:07'),
(27, 16, 'janwel castillo', 'Homeowner', 'dadada', 'janweljigycastillo20@gmail.com', 'Deactivated', '943962', '2022-11-15 20:43:59'),
(4, 4, 'John Doe', 'Treasurer', '123', 'dmoncarlo@gmail.com', 'Activated', '105861', '2022-11-24 15:17:36'),
(18, 18, 'SV1_Admin', 'Admin', 'password', 'SV1_Admin', 'Activated', NULL, NULL),
(42, 17, 'Roiemar Escueta', 'Homeowner', '123', 'escuetaroiemar@gmail.com', 'Activated', '135447', '2022-11-28 23:28:23'),
(46, 28, 'SV1_Secretary', 'Secretary', '123', 'SV1_Secretary', 'Activated', NULL, NULL),
(48, 36, 'SV1_Treasurer', 'Treasurer', '123', 'SV1_Treasurer', 'Activated', NULL, NULL),
(49, 37, 'SV2_Admin', 'Admin', 'password', 'SV2_Admin', 'Activated', NULL, NULL),
(51, 38, 'Ralph Monsour Delima', 'Homeowner', '123', 'dmoncarlo@gmail.com', 'Pending', '320663', '2022-11-29 20:05:52');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
