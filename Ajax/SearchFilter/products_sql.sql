-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 26, 2022 at 08:20 AM
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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `inventory_count` int(11) NOT NULL,
  `price` float NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `inventory_count`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Cup', 120, 1, '2022-02-26 03:56:49', '2022-02-26 03:56:49'),
(2, 'Dress', 55, 3, '2022-02-26 03:56:49', '2022-02-26 03:56:49'),
(3, 'Shoes', 15, 5, '2022-02-26 03:57:32', '2022-02-26 03:57:32'),
(4, 'Shorts', 200, 2.5, '2022-02-26 03:57:32', '2022-02-26 03:57:32'),
(5, 'T-shirt', 1000, 2, '2022-02-26 03:58:55', '2022-02-26 03:58:55'),
(6, 'Mug', 1001, 3, '2022-02-26 03:58:55', '2022-02-26 03:58:55'),
(7, 'Pen', 300, 1, '2022-02-26 03:59:26', '2022-02-26 03:59:26');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
