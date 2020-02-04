-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 04, 2020 at 05:31 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kisan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'hamza56', 'admin990');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `fname` text,
  `dob` text,
  `idcard` varchar(24) DEFAULT NULL,
  `phone` text,
  `address` text,
  `tehsil` text,
  `chak` text,
  `img1` text,
  `img2` text,
  `status` int(11) DEFAULT '0',
  `datec` date DEFAULT NULL,
  `dates` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=352 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

DROP TABLE IF EXISTS `party`;
CREATE TABLE IF NOT EXISTS `party` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tacct` text,
  `facct` text,
  `means` text,
  `regid` text,
  `name` text,
  `fname` text,
  `dob` text,
  `idcard` varchar(24) DEFAULT NULL,
  `phone` text,
  `address` text,
  `tehsil` text,
  `chak` text,
  `img1` text,
  `img2` text,
  `status` int(11) DEFAULT '0',
  `datec` date DEFAULT NULL,
  `dates` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `desp` text,
  `img1` text,
  `img2` text,
  `datec` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`, `desp`, `img1`, `img2`, `datec`) VALUES
(17, 'Hamza Pervaiz Ahmad', 'Attendance Short Fine', '8f5da651ea151781f39a60fba8aba0cb1.png', '6214ebd872f622c67c54a7dbac5d3e891.png', '2020-02-03 12:34:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(99) NOT NULL,
  `name` text,
  `phone` text,
  `address` text,
  `area` text,
  `city` text,
  `desp` text,
  `img` text,
  `datec` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `zakat`
--

DROP TABLE IF EXISTS `zakat`;
CREATE TABLE IF NOT EXISTS `zakat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tacct` text,
  `facct` text,
  `means` text,
  `regid` text,
  `name` text,
  `fname` text,
  `dob` text,
  `idcard` varchar(24) DEFAULT NULL,
  `phone` text,
  `address` text,
  `tehsil` text,
  `chak` text,
  `img1` text,
  `img2` text,
  `status` int(11) DEFAULT '0',
  `datec` date DEFAULT NULL,
  `dates` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
