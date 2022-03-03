-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 09, 2022 at 05:38 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

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
-- Table structure for table `csv`
--

CREATE TABLE `csv` (
  `id` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `csv`
--

INSERT INTO `csv` (`id`, `file`, `created_at`, `updated_at`) VALUES
(1, 'test', '2022-02-08 15:51:59', '0000-00-00 00:00:00'),
(2, 'sample1', '2022-02-08 15:52:07', '0000-00-00 00:00:00'),
(3, 'MOCK_DATA', '2022-02-08 15:52:10', '0000-00-00 00:00:00'),
(4, 'Cities', '2022-02-08 15:54:32', '0000-00-00 00:00:00'),
(5, 'dummy', '2022-02-09 10:49:20', '0000-00-00 00:00:00'),
(6, 'us-500', '2022-02-09 11:15:56', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `csv`
--
ALTER TABLE `csv`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `csv`
--
ALTER TABLE `csv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
