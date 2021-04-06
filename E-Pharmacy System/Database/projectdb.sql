-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 20, 2021 at 12:08 PM
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
-- Database: `projectdb`
--
USE `PROJECTDB`;
-- --------------------------------------------------------

--
-- Table structure for table `emplog`
--


DROP TABLE IF EXISTS `emplog`;
CREATE TABLE IF NOT EXISTS `emplog` (
  `username` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `emptype` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `emplog`
--


INSERT INTO `emplog` (`username`, `name`, `password`, `emptype`) VALUES
('Adil', 'Adil Asad', '12345', 'admin');
-- --------------------------------------------------------

--
-- Table structure for table `emp_table`
--

DROP TABLE IF EXISTS `emp_table`;
CREATE TABLE IF NOT EXISTS `emp_table` (
  `EMPID` decimal(4,0) NOT NULL,
  `EMP_NAME` varchar(30) DEFAULT NULL,
  `EMP_ADDRESS` varchar(30) DEFAULT NULL,
  `EMP_PHN1` decimal(11,0) DEFAULT NULL,
  `EMP_PHN2` decimal(11,0) DEFAULT NULL,
  `EMP_CNIC` decimal(16,0) DEFAULT NULL,
  `EMP_SALARY` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`EMPID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
CREATE TABLE IF NOT EXISTS `history` (
  `HID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar (30) NOT NULL,
  `total` varchar(255) NOT NULL,
  `quantity` int (4),
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`HID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `PRID` int(11) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `CODE` varchar(30) NOT NULL,
  `PRICE` decimal(8,2) NOT NULL,
  `IMAGE` varchar(100) NOT NULL,
  `MFG` varchar(30) NOT NULL,
  PRIMARY KEY (`PRID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sup_table`
--

DROP TABLE IF EXISTS `sup_table`;
CREATE TABLE IF NOT EXISTS `sup_table` (
  `SUPID` decimal(4,0) NOT NULL,
  `SUP_NAME` varchar(30) DEFAULT NULL,
  `SUP_ADDRESS` varchar(30) DEFAULT NULL,
  `SUP_PHN1` decimal(11,0) DEFAULT NULL,
  PRIMARY KEY (`SUPID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `email`, `name`, `password`, `address`, `phone`, `created_at`) VALUES
(1, 'john.doe@example.com', '', '$2y$10$vFDx4cSKbaB.kudlVPZXy.H8hTxpul07cDF3fYkU8wXPF8L4fmuZy', '', '', '2021-02-19 22:32:03'),
(2, 'zubair@zubi', '', '$2y$10$1fIn5QSdhk/O/0/za9.OUup6tFMVdnWqjrdJ8Bmr0betL0XwLLB22', '', '', '2021-02-19 23:06:56'),
(3, 'adil@adil', 'zubair', '$2y$10$MKBRex.txR6ATnkaNyUMpe6a3w8yvQE40eAe0G6KfpHvD0QK8fIUO', 'helo', '03204598042', '2021-02-19 23:39:41');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
