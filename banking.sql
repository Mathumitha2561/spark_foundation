-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 19, 2021 at 02:56 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(100) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `email_id` varchar(1000) NOT NULL,
  `balance` double NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_name`, `email_id`, `balance`) VALUES
(1, 'Madhu', 'madhu@gmail.com', 50000.89),
(2, 'Riya', 'riya25@gmail.com', 1000.65),
(3, 'Raja', 'raja56@gmail.com', 78943.68),
(4, 'Vetrivel', 'vetrivel@gmail.com', 567201.12),
(5, 'Divya', 'divyaraghu@gmail.com', 981.02),
(6, 'Kumar', 'kumar2001@gmail.com', 10289.47),
(7, 'Jothi', 'jothi19@gmail.com', 145982.86),
(8, 'Ramya', 'ramyakannan@gmail.com', 57023.46),
(9, 'Piranavi', 'navi@gmail.com', 19013.72),
(10, 'Sivabalan', 'siva611999@gmail.com', 19293.8),
(11, 'Raghav', 'raghavsparks@gmail.com', 782.94),
(12, 'Latha', 'lathaprabha@gmail.com', 2382.16),
(13, 'Aishwarya', 'aishu23@gmail.com', 945),
(14, 'Sankavi', 'sankavi2662001@gmail.com', 1500.02),
(15, 'Shivani', 'shivani@gmail.com', 306.83);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
