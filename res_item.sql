-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2015 at 12:21 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `citahati`
--

-- --------------------------------------------------------

--
-- Table structure for table `res_item`
--

CREATE TABLE IF NOT EXISTS `res_item` (
  `id_item` varchar(10) NOT NULL,
  `item_name` varchar(20) NOT NULL,
  `price` int(20) NOT NULL,
  `remarks` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `res_item`
--

INSERT INTO `res_item` (`id_item`, `item_name`, `price`, `remarks`) VALUES
('C001', 'asdf', 0, 'asdf'),
('C002', 'asdf', 0, 'asdf'),
('C003', 'asdf', 1234, 'asdf'),
('C004', 'burger', 30000, ''),
('C005', 'french fries', 12000, ''),
('C006', 'rice', 1000, ''),
('C007', 'ice cream', 1234, ''),
('C008', 'blueberry', 2000, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `res_item`
--
ALTER TABLE `res_item`
 ADD PRIMARY KEY (`id_item`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
