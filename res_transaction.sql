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
-- Table structure for table `res_transaction`
--

CREATE TABLE IF NOT EXISTS `res_transaction` (
  `inv_no` varchar(10) NOT NULL,
  `inv_date` date NOT NULL,
  `total` int(20) NOT NULL,
  `paid` int(20) NOT NULL,
  `change` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `res_transaction`
--

INSERT INTO `res_transaction` (`inv_no`, `inv_date`, `total`, `paid`, `change`) VALUES
('N001', '2015-03-06', 1234, 1234, 0),
('N002', '2015-03-06', 1234, 1234, 0),
('N003', '2015-03-06', 1234, 12345, 11111),
('N004', '2015-03-06', 13574, 1245566, 1231992),
('N005', '2015-03-06', 7404, 12345, 4941),
('N006', '2015-03-06', 7404, 123456, 116052),
('N007', '2015-03-06', 22212, 123467, 101255),
('N008', '2015-03-06', 30850, 123456, 92606),
('N009', '2015-03-06', 1234, 12345, 11111),
('N010', '2015-03-06', 1234, 1234, 0),
('N011', '2015-03-06', 3702, 12345, 8643),
('N012', '2015-03-06', 11106, 10000000, 9988894),
('N013', '2015-03-06', 1234, 1234, 0),
('N014', '2015-03-06', 4936, 123456, 118520),
('N015', '2015-03-08', 2234, 22340, 20106),
('N016', '2015-03-09', 33234, 332340, 299106),
('N017', '2015-03-11', 7936, 8000, 64),
('N018', '2015-03-11', 120574, 500000, 379426),
('N019', '2015-03-11', 209702, 12345678, 12135976),
('N020', '2015-03-11', 2000, 2000, 0),
('N021', '2015-03-11', 1000, 1000, 0),
('N022', '2015-03-11', 45234, 50000, 4766),
('N023', '2015-03-11', 1000, 1000, 0),
('N024', '2015-03-11', 72000, 72000, 0),
('N025', '2015-03-11', 30000, 30000, 0),
('N026', '2015-03-11', 1234, 1234, 0),
('N027', '2015-03-11', 55234, 100000000, 99944766),
('N028', '2015-03-11', 32468, 10000000, 9967532);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `res_transaction`
--
ALTER TABLE `res_transaction`
 ADD PRIMARY KEY (`inv_no`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
