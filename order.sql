-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 08, 2019 at 03:18 PM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.11-2+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharma`
--

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderid` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `pharmaId` int(11) NOT NULL,
  `total` varchar(500) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `uaddress` varchar(100) NOT NULL,
  `uphone` varchar(25) NOT NULL,
  `phName` varchar(50) NOT NULL,
  `status` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderid`, `userId`, `pharmaId`, `total`, `userName`, `uaddress`, `uphone`, `phName`, `status`, `date`) VALUES
(7, 2, 3, '128', 'Mili', 'Uttara , Sector-13', '0199999', 'ABC Pharmacy', 'order delivered', '2019-03-30 16:15:39'),
(8, 2, 3, '250', 'Mili', 'Uttara , Sector-13', '0199999', 'ABC Pharmacy', 'order delivered', '2019-03-30 16:44:37'),
(9, 5, 3, '175', 'Israt', 'Mohakhali 66, Dhaka 1212', '0199999', 'ABC Pharmacy', 'order canceled', '2019-03-30 20:01:23'),
(10, 5, 3, '93', 'Israt', 'Mohakhali 66, Dhaka 1212', '0199999', 'ABC Pharmacy', 'order proceed', '2019-03-30 20:04:58'),
(11, 5, 3, '400', 'Israt', 'Mohakhali 66, Dhaka 1212', '0199999', 'ABC Pharmacy', 'order proceed', '2019-03-30 20:33:53'),
(13, 5, 3, '2000', 'Israt', 'Mohakhali 66, Dhaka 1212', '016123456', 'ABC Pharmacy', 'order proceed', '2019-03-30 20:37:11'),
(14, 5, 3, '3', 'Israt', 'Mohakhali 66, Dhaka 1212', '016123456', 'ABC Pharmacy', 'ordered', '2019-03-30 20:40:13'),
(15, 6, 3, '65', 'Tahsin', 'Dhanmondi 4A, Dhaka', '0153332566', 'ABC Pharmacy', 'order delivered', '2019-03-30 20:45:02'),
(16, 2, 3, '860', 'Mili', 'Uttara, Sector-13', '0199999', 'ABC Pharmacy', 'order proceed', '2019-03-31 03:10:03'),
(17, 2, 3, '475', 'Mili', 'Uttara, Sector-13', '0199999', 'ABC Pharmacy', 'ordered', '2019-04-01 20:52:45'),
(18, 2, 3, '100', 'Mili', 'Uttara, Sector-13', '0199999', 'ABC Pharmacy', 'ordered', '2019-04-01 20:56:47'),
(20, 2, 3, '65', 'Mili', 'Uttara, Sector-13', '0199999', 'ABC Pharmacy', 'ordered', '2019-04-01 20:59:16'),
(21, 5, 3, '128', 'Israt', 'Mohakhali 66, Dhaka 1212', '016123456', 'ABC Pharmacy', 'ordered', '2019-04-02 03:01:04'),
(22, 6, 3, '378', 'Tahsin', 'Dhanmondi 4A, Dhaka', '0153332566', 'ABC Pharmacy', 'order proceed', '2019-04-02 10:38:32'),
(30, 5, 16, '30', 'Israt', 'Mohakhali 66, Dhaka 1212', '016123456', 'Innovizz Pharma', 'order delivered', '2019-04-08 11:30:11'),
(32, 5, 7, '1190', 'Israt', 'Mohakhali 66, Dhaka 1212', '016123456', 'Meditrust Pharma Ltd.', 'ordered', '2019-04-08 14:27:59'),
(33, 5, 10, '840', 'Israt', 'Mohakhali 66, Dhaka 1212', '016123456', 'Ark Pharmacy', 'ordered', '2019-04-08 15:07:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
