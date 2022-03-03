-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 23, 2022 at 02:03 PM
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
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_info` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_info`, `created_at`, `updated_at`) VALUES
(1, '1 tea, 1 beef stew, 2 extra rice, 1 soup', '2022-02-23 19:56:33', '2022-02-23 19:56:33'),
(2, '1 tea, 1 beef stew, 2 extra rice, 1 soup', '2022-02-23 19:56:34', '2022-02-23 19:56:34'),
(3, '1 tea, 1 beef stew, 2 extra rice, 1 soup', '2022-02-23 19:56:34', '2022-02-23 19:56:34'),
(15, '1 tea, 1 beef stew, 2 extra rice, 1 soup', '2022-02-23 20:01:27', '2022-02-23 20:01:27'),
(16, '1 tea, 1 beef stew, 2 extra rice, 1 soup', '2022-02-23 20:01:28', '2022-02-23 20:01:28'),
(17, '1 tea, 1 beef stew, 2 extra rice, 1 soup', '2022-02-23 20:01:28', '2022-02-23 20:01:28');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
