-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 20, 2022 at 07:17 AM
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
-- Database: `sport_players`
--

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
CREATE TABLE IF NOT EXISTS `players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sport_id` int(11) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `img_filename` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sport_id` (`sport_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `sport_id`, `first_name`, `last_name`, `sex`, `img_filename`, `created_at`, `updated_at`) VALUES
(1, 1, 'Carlo', 'Doroteo', 'M', 'avatar.png', '2022-02-19 10:41:12', '2022-02-19 10:41:12'),
(2, 1, 'Cynthia', 'Villar', 'F', 'avatar.png', '2022-02-19 10:41:12', '2022-02-19 10:41:12'),
(3, 2, 'Sassa', 'Gurl', 'M', 'avatar.png', '2022-02-19 10:41:12', '2022-02-19 10:41:12'),
(4, 2, 'Allyza', 'Valdez', 'F', 'avatar.png', '2022-02-19 10:41:12', '2022-02-19 10:41:12'),
(5, 3, 'Robin', 'Padilla', 'M', 'avatar.png', '2022-02-19 10:41:12', '2022-02-19 10:41:12'),
(6, 3, 'Bella', 'Padilla', 'M', 'avatar.png', '2022-02-19 10:45:44', '2022-02-19 10:45:44'),
(7, 4, 'Chris', 'Hemsworth', 'M', 'avatar.png', '2022-02-19 10:45:44', '2022-02-19 10:45:44'),
(8, 4, 'Scarlet', 'Johansson', 'F', 'avatar.png', '2022-02-19 10:45:44', '2022-02-19 10:45:44'),
(9, 5, 'Jason', 'Derulo', 'M', 'avatar.png', '2022-02-19 10:45:44', '2022-02-19 10:45:44'),
(10, 5, 'Kathniss', 'Everdeen', 'F', 'avatar.png', '2022-02-19 10:45:44', '2022-02-19 10:45:44'),
(11, 1, 'Kathniss', 'Rella', 'F', 'avatar.png', '2022-02-20 05:40:05', '2022-02-20 05:40:05'),
(12, 1, 'Kathniss', 'Villar', 'M', 'avatar.png', '2022-02-20 05:40:05', '2022-02-20 05:40:05');

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

DROP TABLE IF EXISTS `sports`;
CREATE TABLE IF NOT EXISTS `sports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Basketball', '2022-02-19 10:38:54', '2022-02-19 10:38:54'),
(2, 'Volleyball', '2022-02-19 10:38:54', '2022-02-19 10:38:54'),
(3, 'Baseball', '2022-02-19 10:39:09', '2022-02-19 10:39:09'),
(4, 'Soccer', '2022-02-19 10:39:09', '2022-02-19 10:39:09'),
(5, 'Football', '2022-02-19 10:39:09', '2022-02-19 10:39:09');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`sport_id`) REFERENCES `sports` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
