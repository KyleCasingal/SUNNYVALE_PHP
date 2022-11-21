-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 21, 2022 at 11:08 PM
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
  `birthdate` date NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `employer` varchar(100) DEFAULT NULL,
  `display_picture` varchar(255) NOT NULL,
  PRIMARY KEY (`homeowner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `homeowner_profile`
--

INSERT INTO `homeowner_profile` (`homeowner_id`, `last_name`, `first_name`, `middle_name`, `suffix`, `sex`, `residence_address`, `business_address`, `occupation`, `email_address`, `birthdate`, `mobile_number`, `employer`, `display_picture`) VALUES
(1, 'Delima', 'Mon Carlo', 'Zonio', NULL, 'Male', 'sa bahay', NULL, NULL, 'dmoncarlo6@gmail.com', '2002-10-06', '09157189636', 'Jayson pogi', 'DELIMA_2x2.png'),
(2, 'Casingal', 'Kyle Andrei', 'Morillo', NULL, 'Yes', 'sa tabi ng URS', 'Brgy. Hindi pinili, Sana ako na lang', 'Professional Front-end Developer', 'kylecasingal36@gmail.com', '2001-09-02', '09123456789', 'si Madam', 'default.png'),
(3, 'Flores', 'Jeune Paolus', 'Damaso', NULL, 'Male', 'hahahaha', NULL, 'magroll saka magsend ng bold, Gacha Addict', 'floresjeunepaolus@gmail.com', '2002-06-16', '09123123123', 'Inya', 'default.png');

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
  `content` varchar(255) NOT NULL,
  `published_at` datetime NOT NULL,
  `content_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `full_name`, `title`, `content`, `published_at`, `content_image`) VALUES
(29, 28, 'Mon Carlo Delima', 'bagong test', 'hehehe', '2022-11-20 18:17:38', 'Blank diagram.png'),
(30, 28, 'Mon Carlo Delima', 'asdasdas', 'asdasd', '2022-11-20 18:18:34', 'Software-Development-Cycle.jpg'),
(28, 23, 'Kyle Andrei Casingal', 'test', 'test', '2022-11-17 16:53:28', '313097255_1100729344140534_3602640388851360481_n.jpg'),
(27, 28, 'Mon Carlo Delima', 'qr', 'qr', '2022-11-17 12:17:48', 'qrcode.png'),
(26, 28, 'Mon Carlo Delima', 'tite ito', 'hahaha', '2022-11-16 18:18:07', '314637692_5392043370921096_8348706659662332474_n.jpg'),
(25, 28, 'Mon Carlo Delima', 'sdlc', 'sdlc bilog', '2022-11-15 23:27:58', 'Software-Development-Cycle.jpg'),
(24, 28, 'Mon Carlo Delima', 'Bong GO', '3123123', '2022-11-15 21:13:41', '241522086_206365484811292_6123461207224243682_n.jpg'),
(23, 28, 'Mon Carlo Delima', 'test', 'maganda si Krish sa pic na ito (sabi nya)', '2022-11-15 21:10:15', '241687233_241452884562043_2743427910860384322_n.jpg'),
(31, 28, 'Mon Carlo Delima', '123', '123', '2022-11-20 18:20:04', 'DELIMA_2x2.png'),
(32, 28, 'Mon Carlo Delima', 'asd', 'asd', '2022-11-20 18:20:25', 'URS Giants.png'),
(33, 28, 'Mon Carlo Delima', 'urs numba wan', 'hehehe', '2022-11-20 19:43:03', 'URS Logo.png'),
(34, 28, 'Mon Carlo Delima', 'pusang may sore eyes', 'hahaha', '2022-11-21 15:15:06', 'dutch_angle.png'),
(35, 28, 'Mon Carlo Delima', 'Country Road', 'Take me home', '2022-11-21 15:51:55', 'silhouette_final.png'),
(36, 28, 'Mon Carlo Delima', 'Hello there', 'I have the high ground', '2022-11-21 15:52:51', '05b.jpg'),
(37, 23, 'Kyle Andrei Casingal', 'aasdasd', 'asdasd', '2022-11-21 15:53:25', 'lockscreen.png'),
(38, 28, 'Mon Carlo Delima', 'asd', 'asd', '2022-11-21 22:29:50', 'sEt5ph.jpg');

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
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`full_name`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `full_name`, `user_type`, `password`, `email_address`, `account_status`, `verification_code`, `email_verified_at`) VALUES
(23, 'Kyle Andrei Casingal', 'Homeowner', 'password', 'kylecasingal36@gmail.com', 'Active', '943962', '2022-11-10 22:50:54'),
(6, 'Nene Yashiro', 'Homeowner', '123', 'bogart@gmail.com', 'Active', '943962', NULL),
(24, 'Jeune Paolus Flores', 'Homeowner', 'thisfeelsgud', 'floresjeunepaolus@gmail.com', 'Active', '943962', '2022-11-10 22:51:58'),
(25, 'Mon Kanor', 'Homeowner', 'monkanor', 'Crae0619@gmail.com', 'Active', '943962', '2022-11-11 15:33:05'),
(28, 'Mon Carlo Delima', 'Homeowner', '123', 'dmoncarlo6@gmail.com', 'Active', '155306', '2022-11-18 17:13:20'),
(27, 'janwel castillo', 'Homeowner', 'dadada', 'janweljigycastillo20@gmail.com', 'Active', '943962', '2022-11-15 20:43:59');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
