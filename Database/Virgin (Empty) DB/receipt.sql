-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 17, 2018 at 09:37 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `receipt`
--
CREATE DATABASE IF NOT EXISTS `receipt` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `receipt`;

-- --------------------------------------------------------

--
-- Table structure for table `cookers`
--

CREATE TABLE IF NOT EXISTS `cookers` (
  `cookerId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cookerId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE IF NOT EXISTS `favorites` (
  `favoritesId` int(11) NOT NULL AUTO_INCREMENT,
  `cookerId` int(11) NOT NULL,
  `receiptsId` int(11) NOT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`favoritesId`),
  KEY `FK_association1` (`receiptsId`),
  KEY `FK_association3` (`cookerId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

CREATE TABLE IF NOT EXISTS `ingredient` (
  `ingredientId` int(11) NOT NULL AUTO_INCREMENT,
  `receiptsId` int(11) NOT NULL,
  `cookerId` int(11) NOT NULL,
  `name` varchar(254) DEFAULT NULL,
  `quantity` float DEFAULT NULL,
  PRIMARY KEY (`ingredientId`),
  KEY `FK_association2` (`receiptsId`),
  KEY `FK_association4` (`cookerId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE IF NOT EXISTS `receipts` (
  `receiptsId` int(11) NOT NULL AUTO_INCREMENT,
  `cookerId` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `description` longtext,
  `guest` int(11) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`receiptsId`),
  KEY `FK_association5` (`cookerId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `FK_association3` FOREIGN KEY (`cookerId`) REFERENCES `cookers` (`cookerId`),
  ADD CONSTRAINT `FK_association1` FOREIGN KEY (`receiptsId`) REFERENCES `receipts` (`receiptsId`);

--
-- Constraints for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD CONSTRAINT `FK_association4` FOREIGN KEY (`cookerId`) REFERENCES `cookers` (`cookerId`),
  ADD CONSTRAINT `FK_association2` FOREIGN KEY (`receiptsId`) REFERENCES `receipts` (`receiptsId`);

--
-- Constraints for table `receipts`
--
ALTER TABLE `receipts`
  ADD CONSTRAINT `FK_association5` FOREIGN KEY (`cookerId`) REFERENCES `cookers` (`cookerId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
