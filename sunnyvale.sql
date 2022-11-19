-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 20, 2022 at 12:08 AM
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
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `published_at` datetime NOT NULL,
  `content_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `full_name`, `title`, `content`, `published_at`, `content_image`) VALUES
(28, 'Jane Doe', 'test', 'test', '2022-11-17 16:53:28', '313097255_1100729344140534_3602640388851360481_n.jpg'),
(27, 'Mon Carlo Delima', 'qr', 'qr', '2022-11-17 12:17:48', 'qrcode.png'),
(26, 'Mon Carlo Delima', 'tite ito', 'hahaha', '2022-11-16 18:18:07', '314637692_5392043370921096_8348706659662332474_n.jpg'),
(25, 'Mon Carlo Delima', 'sdlc', 'sdlc bilog', '2022-11-15 23:27:58', 'Software-Development-Cycle.jpg'),
(24, 'Mon Carlo Delima', 'Bong GO', '3123123', '2022-11-15 21:13:41', '241522086_206365484811292_6123461207224243682_n.jpg'),
(23, 'Mon Carlo Delima', 'test', 'maganda si Krish sa pic na ito (sabi nya)', '2022-11-15 21:10:15', '241687233_241452884562043_2743427910860384322_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `user_type` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email_address` varchar(40) NOT NULL,
  `account_status` varchar(15) NOT NULL,
  `verification_code` varchar(6) NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `display_picture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `user_type`, `password`, `email_address`, `account_status`, `verification_code`, `email_verified_at`, `display_picture`) VALUES
(23, 'Jane Doe', 'Homeowner', 'password', 'kylecasingal36@gmail.com', 'Active', '943962', '2022-11-10 22:50:54', 'default.png'),
(6, 'Nene Yashiro', 'Homeowner', '123', 'bogart@gmail.com', 'Active', '943962', NULL, 'default.png'),
(24, 'Lez Neko', 'Homeowner', 'thisfeelsgud', 'Leztheneko@gmail.com', 'Active', '943962', '2022-11-10 22:51:58', 'default.png'),
(25, 'Mon Kanor', 'Homeowner', 'monkanor', 'Crae0619@gmail.com', 'Active', '943962', '2022-11-11 15:33:05', 'default.png'),
(28, 'Mon Carlo Delima', 'Homeowner', '123', 'dmoncarlo6@gmail.com', 'Active', '155306', '2022-11-18 17:13:20', 'default.png'),
(27, 'janwel castillo', 'Homeowner', 'dadada', 'janweljigycastillo20@gmail.com', 'Active', '943962', '2022-11-15 20:43:59', 'default.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
