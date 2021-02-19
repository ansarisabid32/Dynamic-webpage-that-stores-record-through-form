-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2021 at 06:57 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `details`
--
CREATE DATABASE IF NOT EXISTS `details` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `details`;

-- --------------------------------------------------------

--
-- Table structure for table `cricketer_records`
--

CREATE TABLE `cricketer_records` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `runs_scored` int(11) NOT NULL,
  `fours_scored_count` int(11) NOT NULL,
  `sixes_scored_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cricketer_records`
--

INSERT INTO `cricketer_records` (`id`, `full_name`, `runs_scored`, `fours_scored_count`, `sixes_scored_count`) VALUES
(1, 'Sabid Ansari', 255, 365, 36),
(2, 'dfg', 565, 767, 86),
(3, 'Vaibhav Ameta', 335, 23, 42),
(4, 'ghgdfg', 45, 53, 55),
(5, '', 355, 355, 355),
(6, '', 363, 363, 363),
(7, 'Sabid A', 355, 355, 355),
(8, '225', 363, 363, 363),
(9, 'Vaibhav', 355, 355, 355),
(10, '225', 363, 363, 363),
(11, 'Ashok', 25, 25, 25),
(12, '36', 3256, 3256, 3256),
(13, 'Abc', 556, 556, 556),
(14, '365', 256, 256, 256),
(15, 'dfdvgdfvfdvdf', 0, 0, 0),
(16, 'kfhgfk', 656, 566, 2356),
(17, 'Hello', 656, 566, 2356),
(18, 'World', 5656, 5256, 22),
(19, 'Hello', 656, 566, 2356),
(20, 'Hello', 656, 566, 2356),
(21, 'Hello', 656, 566, 2356),
(22, 'Hello', 656, 566, 2356),
(23, 'dfsd', 43, 43, 64),
(24, 'dfsd', 43, 43, 64),
(25, 'dfsd', 43, 43, 64),
(26, 'dfsd', 43, 43, 64),
(27, 'dsfsdfdsfd', 33, 335, 53),
(28, 'dsfsdfdsfd', 33, 335, 53),
(29, 'dsfsdfdsfd', 33, 335, 53),
(30, 'dsfsdfdsfd', 33, 335, 53),
(31, 'dsfsdfdsfd', 33, 335, 53),
(32, 'dsfsdfdsfd', 33, 335, 53),
(33, 'dsfsdfdsfd', 33, 335, 53),
(34, 'dsfsdfdsfd', 33, 335, 53),
(35, 'dsfsdfdsfd', 33, 335, 53),
(36, 'dsfsdfdsfd', 33, 335, 53),
(37, 'dsfsdsf', 432, 2342, 4332),
(38, 'Sahid Ansari', 556, 255, 255);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cricketer_records`
--
ALTER TABLE `cricketer_records`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cricketer_records`
--
ALTER TABLE `cricketer_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
