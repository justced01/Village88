-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 21, 2022 at 03:33 PM
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
-- Database: `product_dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `message_id` (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `message_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'comment', '2022-02-21 21:06:40', '2022-02-21 21:06:40'),
(2, 1, 1, 'this is comment', '2022-02-21 21:33:17', '2022-02-21 21:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `product_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '1231231', '2022-02-21 20:11:33', '2022-02-21 20:11:33'),
(2, 1, 2, '123213', '2022-02-21 20:13:20', '2022-02-21 20:13:20');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `inventory_count` int(11) NOT NULL,
  `quantity_sold` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `inventory_count`, `quantity_sold`, `created_at`, `updated_at`) VALUES
(2, 'V88 T-shirt', 'V88 T-shirt V88 T-shirt V88 T-shirt V88 T-shirt', 155, 20, 0, '2022-02-21 17:29:11', '2022-02-21 17:56:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `salt`, `user_level`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'admin@admin.com', 'ff4e9deefc9c0e1b05d65950b9b8063a', 'b9be42ddff2df8119c5a77febf87e3356d59fba34989', 9, '2022-02-21 13:27:46', '2022-02-21 23:18:57'),
(2, 'John Cedrick', 'Dela Carcel', 'jced.delacarcel@gmail.com', '2dc70873ce1a2d247137241e7c39972c', '59afe088d4f15df65bfbc66fe2cf62c94c72ef3aa7de', 1, '2022-02-21 13:28:14', '2022-02-21 13:28:14'),
(3, 'Ireneo III', 'Navida', 'cdelacarcel@gmail.com', '309854857481a60e5bd92f853d59eaf3', 'c487fcb8e756a61ea82e5581845208c0e3c7e6440572', 1, '2022-02-21 14:41:46', '2022-02-21 14:41:46');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
