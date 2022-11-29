-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 29, 2022 at 08:25 AM
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
  `subdivision_name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `availability` varchar(50) NOT NULL,
  PRIMARY KEY (`amenity_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`amenity_id`, `amenity_name`, `subdivision_name`, `price`, `availability`) VALUES
(1, 'Basketball Court', 'Sunnyvale 1', 350, 'Unavailable'),
(2, 'Volleyball Court', 'Sunnyvale 1', 150, 'Available'),
(3, 'Badminton Court', 'Sunnyvale 2', 150, 'Available'),
(4, 'Multi-purpose Hall', 'Sunnyvale 2', 200, 'Available'),
(5, 'Swimming Pool', 'Sunnyvale 1', 200, 'Available'),
(6, 'Clubhouse', 'Sunnyvale 1', 400, 'Unavailable'),
(9, 'Basketball Court', 'Sunnyvale 8', 500, 'Available'),
(10, 'Clubhouse', 'Sunnyvale 3', 250, 'Available'),
(11, 'Basketball Court', 'Sunnyvale 4', 50, 'Available'),
(12, 'Swimming Pool', 'Sunnyvale 1', 480, 'Available'),
(13, 'Court of Appeal', 'Sunnyvale 1', 20, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `facility_renting`
--

DROP TABLE IF EXISTS `facility_renting`;
CREATE TABLE IF NOT EXISTS `facility_renting` (
  `transaction_id` int(20) NOT NULL AUTO_INCREMENT,
  `amenity_name` varchar(255) NOT NULL,
  `renter_name` varchar(255) NOT NULL,
  `date_from` datetime NOT NULL,
  `date_to` datetime NOT NULL,
  `cost` int(20) NOT NULL,
  `payment_proof` varchar(255) NOT NULL,
  `marked_by` varchar(255) DEFAULT NULL,
  `approved` varchar(20) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `facility_renting`
--

INSERT INTO `facility_renting` (`transaction_id`, `amenity_name`, `renter_name`, `date_from`, `date_to`, `cost`, `payment_proof`, `marked_by`, `approved`) VALUES
(1, 'Basketball Court', 'Mon Carlo Delima', '2022-11-26 01:00:00', '2022-11-26 02:00:00', 150, 'test', 'test', 'NOT YET'),
(2, 'Volleyball Court', 'Mon Carlo Delima', '2022-11-26 02:00:00', '2022-11-26 04:00:00', 300, 'test', NULL, 'NOT YET'),
(3, 'Multi-purpose Hall', 'Mon Carlo Delima', '2022-11-27 05:30:00', '2022-11-27 06:30:00', 150, 'Delima, Mon Carlo Z. output.png', NULL, 'NOT YET');

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
  `residence_address` varchar(255) NOT NULL,
  `business_address` varchar(255) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `email_address` varchar(100) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `employer` varchar(100) DEFAULT NULL,
  `display_picture` varchar(255) NOT NULL,
  PRIMARY KEY (`homeowner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `homeowner_profile`
--

INSERT INTO `homeowner_profile` (`homeowner_id`, `last_name`, `first_name`, `middle_name`, `suffix`, `sex`, `residence_address`, `business_address`, `occupation`, `email_address`, `birthdate`, `mobile_number`, `employer`, `display_picture`) VALUES
(1, 'Delima', 'Mon Carlo', 'Zonio', 'N/A', 'Male', 'Taytay, Rizal', 'N/A', 'N/A', 'dmoncarlo6@gmail.com', '2002-10-06', '09157189636', 'N/A', 'DELIMA_2x2.png'),
(2, 'Casingal', 'Kyle Andrei', 'Morillo', 'N/A', 'Male', 'Binangonan, Rizal', 'N/A', 'N/A', 'kylecasingal36@gmail.com', '2001-09-02', '09123456789', 'N/A', '316495100_870517180796101_3304939871151226288_n.jpg'),
(3, 'Flores', 'Jeune Paolus', 'Damaso', 'N/A', 'Male', 'Binangonan, Rizal', 'N/A', 'N/A', 'floresjeunepaolus@gmail.com', '2002-06-16', '09123123123', 'Inya', '316156823_3360766927514073_2770550987709432568_n.jpg'),
(4, 'Doe', 'John', 'N/A', 'Jr.', 'Male', 'Binangonan, Rizal', 'N/A', 'Programmer', 'dmoncarlo@gmail.com', '2002-10-06', '09157189636', 'Mark Zuckerberg', 'default.png'),
(18, '', 'SV1_Admin', NULL, NULL, '', '', NULL, '', '', NULL, '', NULL, 'default.png'),
(8, 'BendaÃ±a', 'Krishtalene', 'Edejer', 'N/A', 'Female', 'Lot 1 Block 3 Sunnyvale 1 Palangoy', 'N/A', 'N/A', 'tissabendana@gmail.com', '2002-10-19', '09123456789', 'N/A', 'default.png'),
(17, 'Escueta', 'Roiemar', 'Conchada', 'N/A', 'Male', 'Lot 1 Block 3 Sunnyvale 2 Pantok', 'N/A', 'N/A', 'escuetaroiemar@gmail.com', '2022-11-28', '09123456789', 'N/A', 'default.png'),
(16, 'castillo', 'janwel', 'pogi', 'N/A', 'Male', 'Lot 2 Block 3 Sunnyvale 1 Palangoy', 'N/A', 'N/A', 'janweljigycastillo20@gmail.com', '2022-11-25', '09123456789', 'N/A', '315887907_1137649846869408_655406644278059076_n.png'),
(21, '', 'SV4_Admin', NULL, NULL, '', '', NULL, NULL, '', '2022-11-29', '', '', 'default.png');

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `monthly_dues`
--

INSERT INTO `monthly_dues` (`monthly_dues_id`, `subdivision_name`, `amount`, `updated_at`) VALUES
(1, 'Sunnyvale 1', 200, '2022-11-27'),
(2, 'Sunnyvale 2', 250, '2022-11-27'),
(3, 'Sunnyvale 3', 500, '2022-11-29'),
(4, 'Sunnyvale 4', 350, '2022-11-27'),
(5, 'Sunnyvale 7', 500, '2022-11-27');

-- --------------------------------------------------------

--
-- Table structure for table `officers`
--

DROP TABLE IF EXISTS `officers`;
CREATE TABLE IF NOT EXISTS `officers` (
  `officer_id` int(20) NOT NULL AUTO_INCREMENT,
  `subdivision_name` varchar(50) NOT NULL,
  `officer_name` varchar(255) NOT NULL,
  `position_name` varchar(50) NOT NULL,
  PRIMARY KEY (`officer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

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
(10, 'Sunnyvale 2', 'Bogart D. Explorer', 'President');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
CREATE TABLE IF NOT EXISTS `positions` (
  `position_id` int(20) NOT NULL AUTO_INCREMENT,
  `subdivision_id` int(20) NOT NULL,
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
  `user_id` int(20) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `published_at` datetime NOT NULL,
  `content_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

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
  `subdivision_id` int(11) NOT NULL AUTO_INCREMENT,
  `subdivision_name` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  PRIMARY KEY (`subdivision_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

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
(10, 'Sunnyvale 9', 'Darangan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(20) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL,
  `user_type` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email_address` varchar(40) DEFAULT NULL,
  `account_status` varchar(15) NOT NULL,
  `verification_code` varchar(6) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `full_name`, `user_type`, `password`, `email_address`, `account_status`, `verification_code`, `email_verified_at`) VALUES
(23, 'Kyle Andrei Casingal', 'Homeowner', 'password', 'kylecasingal36@gmail.com', 'Deactivated', '943962', '2022-11-10 22:50:54'),
(24, 'Jeune Paolus Flores', 'Homeowner', 'thisfeelsgud', 'floresjeunepaolus@gmail.com', 'Deactivated', '943962', '2022-11-10 22:51:58'),
(25, 'Mon Kanor', 'Homeowner', 'monkanor', 'Crae0619@gmail.com', 'Activated', '943962', '2022-11-11 15:33:05'),
(28, 'Mon Carlo Delima', 'Homeowner', '12345', 'dmoncarlo6@gmail.com', 'Activated', '286140', '2022-11-24 13:48:07'),
(27, 'janwel castillo', 'Homeowner', 'dadada', 'janweljigycastillo20@gmail.com', 'Activated', '943962', '2022-11-15 20:43:59'),
(39, 'John Doe', 'Treasurer', '123', 'dmoncarlo@gmail.com', 'Activated', '105861', '2022-11-24 15:17:36'),
(40, 'SV1_Admin', 'Admin', 'password', 'SV1_Admin', 'Activated', NULL, NULL),
(41, 'SV1_Secretary', 'Secretary', 'hehehe', NULL, 'Activated', NULL, NULL),
(42, 'Roiemar Escueta', 'Homeowner', '123', 'escuetaroiemar@gmail.com', 'Activated', '135447', '2022-11-28 23:28:23'),
(43, 'SV2_Admin', 'Admin', '123', 'SV2_Admin', 'Activated', NULL, NULL),
(44, 'SV3_Admin', 'Admin', '123', 'SV3_Admin', 'Activated', NULL, NULL),
(45, 'SV4_Admin', 'Admin', '123', 'SV4_Admin', 'Activated', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
