-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2021 at 06:28 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `purchase`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE IF NOT EXISTS `bills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor` int(11) NOT NULL,
  `bill_no` int(11) NOT NULL,
  `net` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `vendor`, `bill_no`, `net`) VALUES
(1, 2, 125, '0.00'),
(3, 3, 126, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `bill_products`
--

CREATE TABLE IF NOT EXISTS `bill_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `bill_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `bill_products`
--

INSERT INTO `bill_products` (`id`, `product`, `qty`, `price`, `bill_id`) VALUES
(1, 'p1', 10, 50.00, 125),
(3, 'p1', 10, 123.00, 126);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE IF NOT EXISTS `vendors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `gst_no` varchar(25) NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `gst_no`, `tax`) VALUES
(2, 'V1', 'V1789456123', '5.60'),
(3, 'V2', 'V2789456123', '8.20');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
