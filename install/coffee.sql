-- phpMyAdmin SQL Dump
-- version 4.0.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 23, 2014 at 02:34 PM
-- Server version: 5.6.12
-- PHP Version: 5.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `coffee`
--
CREATE DATABASE IF NOT EXISTS `coffee` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `coffee`;

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE IF NOT EXISTS `assets` (
  `intID` int(11) NOT NULL AUTO_INCREMENT,
  `strPerson` varchar(255) NOT NULL,
  `dateAdded` datetime NOT NULL,
  `strDescription` varchar(255) NOT NULL,
  `strBrand` varchar(255) NOT NULL,
  `strMAC` varchar(255) NOT NULL,
  `strSerial` varchar(255) NOT NULL,
  `strDepartment` varchar(255) NOT NULL,
  `strType` varchar(255) NOT NULL,
  `strDisk` varchar(255) NOT NULL,
  `strOS` varchar(255) NOT NULL,
  `strComputerName` varchar(255) NOT NULL,
  PRIMARY KEY (`intID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`intID`, `strPerson`, `dateAdded`, `strDescription`, `strBrand`, `strMAC`, `strSerial`, `strDepartment`, `strType`, `strDisk`, `strOS`, `strComputerName`) VALUES
(1, 'Test user', '2014-09-23 14:01:36', 'Apple iPad', 'Apple', '24-4A-64-E9-C2-E1', '123456789', 'Teacher', 'tablet', 'ssd', 'ios', 'Ipad Mini');

-- --------------------------------------------------------

--
-- Table structure for table `byod`
--

CREATE TABLE IF NOT EXISTS `byod` (
  `intID` int(11) NOT NULL AUTO_INCREMENT,
  `strPerson` varchar(255) NOT NULL,
  `strUsername` varchar(255) NOT NULL,
  `strMAC` varchar(255) NOT NULL,
  `dateAdded` datetime NOT NULL,
  `strModel` varchar(255) NOT NULL,
  PRIMARY KEY (`intID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `byod`
--

INSERT INTO `byod` (`intID`, `strPerson`, `strUsername`, `strMAC`, `dateAdded`, `strModel`) VALUES
(1, 'Test User 1', 'User1', '12-34-45-56-56-76', '2014-09-23 14:19:09', 'Windows Laptop');

-- --------------------------------------------------------

--
-- Table structure for table `computers`
--

CREATE TABLE IF NOT EXISTS `computers` (
  `intID` int(11) NOT NULL AUTO_INCREMENT,
  `strComputerBrand` varchar(255) NOT NULL,
  `strComputerModel` varchar(255) NOT NULL,
  `strComputerType` varchar(255) NOT NULL,
  `strComputerCost` int(11) NOT NULL,
  PRIMARY KEY (`intID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `computers`
--

INSERT INTO `computers` (`intID`, `strComputerBrand`, `strComputerModel`, `strComputerType`, `strComputerCost`) VALUES
(1, 'Apple', 'Apple iPad Mini', 'Tablet', 329),
(3, 'Apple', 'Apple iPad', 'Laptop', 459),
(4, 'VeryPC', 'Broadleaf One', 'Desktop', 350),
(5, 'VeryPC', 'Nano Sketch', 'Desktop', 350),
(7, 'Microsoft', 'Surface 3', 'Laptop', 899),
(8, 'HP', 'HP 3120', 'Desktop', 399),
(9, 'Samsung', 'Samsung N130', 'Laptop', 239),
(10, 'Acer', 'Acer Timeline x TM8371', 'Laptop', 459),
(11, 'MSI', 'MSI Wind', 'Laptop', 229),
(12, 'Lenovo', 'Lenovo EDGE E320', 'Laptop', 399);

-- --------------------------------------------------------

--
-- Table structure for table `platforms`
--

CREATE TABLE IF NOT EXISTS `platforms` (
  `intID` int(11) NOT NULL AUTO_INCREMENT,
  `strPlatform` varchar(255) NOT NULL,
  `strBrand` varchar(255) NOT NULL,
  PRIMARY KEY (`intID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `platforms`
--

INSERT INTO `platforms` (`intID`, `strPlatform`, `strBrand`) VALUES
(1, 'Windows Laptop', 'Microsoft'),
(2, 'Windows Phone', 'Microsoft'),
(3, 'Windows Tablet', 'Microsoft'),
(4, 'Apple Laptop', 'Apple'),
(5, 'Apple Tablet', 'Apple'),
(6, 'Apple Phone', 'Apple'),
(7, 'Google Laptop', 'Google'),
(8, 'Google Tablet', 'Google'),
(9, 'Google Phone', 'Google'),
(10, 'Google Smartwatch', 'Google'),
(11, 'Blackberry Phone', 'Blackberry'),
(12, 'Blackberry Tablet', 'Blackberry');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `intID` int(11) NOT NULL AUTO_INCREMENT,
  `strSmtpServer` varchar(255) NOT NULL,
  `strSmtpUser` varchar(255) NOT NULL,
  `strSmtpPassword` varchar(255) NOT NULL,
  `intSmtpPort` varchar(255) NOT NULL,
  `strSmtpEmail` varchar(255) NOT NULL,
  `intSmtpSSL` varchar(255) NOT NULL,
  `intTicketsMax` int(11) NOT NULL,
  `intUsersMax` int(11) NOT NULL,
  PRIMARY KEY (`intID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`intID`, `strSmtpServer`, `strSmtpUser`, `strSmtpPassword`, `intSmtpPort`, `strSmtpEmail`, `intSmtpSSL`, `intTicketsMax`, `intUsersMax`) VALUES
(1, 'smtp.google.com', 'user@gmail.com', 'password', '465', 'user@gmail.com', '1', 100, 100);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `intID` int(11) NOT NULL AUTO_INCREMENT,
  `strRequesterEmail` varchar(255) DEFAULT NULL,
  `strRequesterName` varchar(255) NOT NULL,
  `dateSubmitted` datetime DEFAULT NULL,
  `strTicketDescription` text,
  `intProgress` int(11) DEFAULT '0',
  `intPriority` int(11) NOT NULL DEFAULT '0',
  `dateLastAction` datetime DEFAULT NULL,
  `strLastAction` text,
  `intOpenJob` int(11) NOT NULL DEFAULT '1',
  `strUserComplete` varchar(255) DEFAULT NULL,
  `dateJobCompleted` datetime DEFAULT NULL,
  PRIMARY KEY (`intID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`intID`, `strRequesterEmail`, `strRequesterName`, `dateSubmitted`, `strTicketDescription`, `intProgress`, `intPriority`, `dateLastAction`, `strLastAction`, `intOpenJob`, `strUserComplete`, `dateJobCompleted`) VALUES
(1, 'admin@school-name.co.uk', 'admin', '2014-09-23 12:01:07', 'Test job number 1', 0, 0, '2014-09-23 12:19:57', 'checked it works', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `intID` int(11) NOT NULL AUTO_INCREMENT,
  `strName` varchar(255) NOT NULL,
  `strEmail` varchar(255) NOT NULL,
  `strPassword` varchar(255) NOT NULL,
  `strAdmin` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`intID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`intID`, `strName`, `strEmail`, `strPassword`, `strAdmin`) VALUES
(2, 'admin', 'admin@school-name.co.uk', '', 'on');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
