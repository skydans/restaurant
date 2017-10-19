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
-- Table structure for table `res_cashier`
--

CREATE TABLE IF NOT EXISTS `res_cashier` (
  `no` int(10) NOT NULL,
  `id_cashier` varchar(20) NOT NULL,
  `last_login` varchar(20) NOT NULL,
  `remarks` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `res_cashier`
--

INSERT INTO `res_cashier` (`no`, `id_cashier`, `last_login`, `remarks`) VALUES
(1, 'cashier2', '2015-03-09 20:58:50', 'login'),
(2, 'cashier2', '2015-03-09 20:59:03', 'login'),
(3, 'cashier2', '2015-03-09 20:59:16', 'logout'),
(4, 'cashier', '2015-03-11 15:29:01', 'login'),
(5, 'cashier', '2015-03-11 15:31:35', 'logout'),
(6, 'cashier', '2015-03-11 17:00:48', 'login'),
(7, 'cashier', '2015-03-11 18:18:58', 'logout');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `res_cashier`
--
ALTER TABLE `res_cashier`
 ADD PRIMARY KEY (`no`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
