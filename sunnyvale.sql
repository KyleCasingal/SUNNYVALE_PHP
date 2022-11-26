-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 26, 2022 at 04:32 PM
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
  `price` int(11) NOT NULL,
  PRIMARY KEY (`amenity_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`amenity_id`, `amenity_name`, `price`) VALUES
(1, 'Basketball Court', 150),
(2, 'Volleyball Court', 150),
(3, 'Badminton Court', 150),
(4, 'Multi-purpose Hall', 150);

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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `homeowner_profile`
--

INSERT INTO `homeowner_profile` (`homeowner_id`, `last_name`, `first_name`, `middle_name`, `suffix`, `sex`, `residence_address`, `business_address`, `occupation`, `email_address`, `birthdate`, `mobile_number`, `employer`, `display_picture`) VALUES
(1, 'Delima', 'Mon Carlo', 'Zonio', 'N/A', 'Male', 'Taytay, Rizal', 'N/A', 'N/A', 'dmoncarlo6@gmail.com', '2002-10-06', '09157189636', 'N/A', 'DELIMA_2x2.png'),
(2, 'Casingal', 'Kyle Andrei', 'Morillo', 'N/A', 'Male', 'Binangonan, Rizal', 'N/A', 'N/A', 'kylecasingal36@gmail.com', '2001-09-02', '09123456789', 'N/A', '316495100_870517180796101_3304939871151226288_n.jpg'),
(3, 'Flores', 'Jeune Paolus', 'Damaso', 'N/A', 'Male', 'Binangonan, Rizal', 'N/A', 'N/A', 'floresjeunepaolus@gmail.com', '2002-06-16', '09123123123', 'Inya', '316156823_3360766927514073_2770550987709432568_n.jpg'),
(4, 'Doe', 'John', 'N/A', 'Jr.', 'Male', 'Binangonan, Rizal', 'N/A', 'Programmer', 'dmoncarlo@gmail.com', '2002-10-06', '09157189636', 'Mark Zuckerberg', 'default.png'),
(8, 'BendaÃ±a', 'Krishtalene', 'Edejer', 'N/A', 'Female', 'Lot 1 Block 3 Sunnyvale 1 Palangoy', 'N/A', 'N/A', 'tissabendana@gmail.com', '2002-10-19', '09123456789', 'N/A', 'default.png'),
(16, 'castillo', 'janwel', 'pogi', 'N/A', 'Male', 'Lot 2 Block 3 Sunnyvale 1 Palangoy', 'N/A', 'N/A', 'janweljigycastillo20@gmail.com', '2022-11-25', '09123456789', 'N/A', '315887907_1137649846869408_655406644278059076_n.png');

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

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
(8, 28, 'Mon Carlo Delima', 'Mike Wazowski', 'One eye', '2022-11-26 16:03:52', 'Delima, Mon Carlo Z. - Color Layer.png');

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
  `email_address` varchar(40) NOT NULL,
  `account_status` varchar(15) NOT NULL,
  `verification_code` varchar(6) NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `full_name`, `user_type`, `password`, `email_address`, `account_status`, `verification_code`, `email_verified_at`) VALUES
(23, 'Kyle Andrei Casingal', 'Homeowner', 'password', 'kylecasingal36@gmail.com', 'Deactivated', '943962', '2022-11-10 22:50:54'),
(24, 'Jeune Paolus Flores', 'Homeowner', 'thisfeelsgud', 'floresjeunepaolus@gmail.com', 'Deactivated', '943962', '2022-11-10 22:51:58'),
(25, 'Mon Kanor', 'Homeowner', 'monkanor', 'Crae0619@gmail.com', 'Activated', '943962', '2022-11-11 15:33:05'),
(28, 'Mon Carlo Delima', 'Secretary', '123', 'dmoncarlo6@gmail.com', 'Activated', '286140', '2022-11-24 13:48:07'),
(27, 'janwel castillo', 'Homeowner', 'dadada', 'janweljigycastillo20@gmail.com', 'Activated', '943962', '2022-11-15 20:43:59'),
(39, 'John Doe', 'Homeowner', '123', 'dmoncarlo@gmail.com', 'Activated', '105861', '2022-11-24 15:17:36');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
