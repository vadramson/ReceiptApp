-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 01, 2018 at 04:16 PM
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
  `picture` varchar(45) DEFAULT NULL,
  `status` varchar(19) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`cookerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cookers`
--

INSERT INTO `cookers` (`cookerId`, `name`, `email`, `password`, `picture`, `status`) VALUES
(1, 'Vadrama NDISANG', 'vadramson@gmail.com', 'e2d2273190cdec6cd4a6c5f396eb57469a45ae0a', 'vadson.png', 'Active'),
(2, 'Laura Becker', 'laura@mail.com', '6a3fb35b674b4c3a1978da2a495b411eba2fc3c0', 'purchase.png', 'Active'),
(3, 'Valentine Carlos Mendoza', 'valentine@gmail.com', '5ffb609b008b9750d8b43c24b4ec0da0d4d890dd', 'admin.png', 'Active'),
(6, 'Alvarado Cambra', 'alvarado@gmail.com', '0920e216162a2da98881caa8abc4192abf501ea6', 'user.jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE IF NOT EXISTS `favorites` (
  `favoritesId` int(11) NOT NULL AUTO_INCREMENT,
  `cookerId` int(11) NOT NULL,
  `receiptsId` int(11) NOT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
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
  `unit` varchar(255) NOT NULL,
  `quantity` float DEFAULT NULL,
  PRIMARY KEY (`ingredientId`),
  KEY `FK_association2` (`receiptsId`),
  KEY `FK_association4` (`cookerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `ingredient`
--

INSERT INTO `ingredient` (`ingredientId`, `receiptsId`, `cookerId`, `name`, `unit`, `quantity`) VALUES
(1, 10, 1, 'Pepper', 'small red', 4),
(2, 10, 1, 'Paster', 'Packet', 1),
(3, 10, 1, 'Meat', 'Kg', 2),
(4, 10, 1, 'Flour', 'Kg', 2),
(5, 10, 1, 'Tomato Paste', 'Tins', 2),
(6, 9, 1, 'Flour', 'Kg', 2),
(7, 7, 1, 'Corri Powder', 'spoons', 2);

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
  `receipt_status` varchar(10) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`receiptsId`),
  KEY `FK_association5` (`cookerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`receiptsId`, `cookerId`, `name`, `duration`, `description`, `guest`, `image`, `receipt_status`) VALUES
(0, 2, 'Buko Pandan', 20, '<ul>\r\n	<li>Some quick example text to build on the card title and make up the bulk of the card&#39;s content.</li>\r\n</ul>\r\n\r\n<ol>\r\n	<li>Some quick example text to build on the card title and make up the bulk of the card&#39;s content.</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>Some quick example text to build on the card title and make up the bulk of the card&#39;s content.</li>\r\n</ul>', 1, 'Buko Pandan,d.jpg', 'Active'),
(1, 1, 'Fish Fillet in Tartar source', 45, '<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>mindless, emotionless, and easily replicable factors of production,</li>\r\n	<li>Taylorism was a critical factor in the unprecedented scale of US factory output that led to</li>\r\n	<li>Allied victory in Second World War, and the subsequent US dominance of the industrial world.<br />\r\n	&nbsp;</li>\r\n</ul>', 5, 'Fish Fillet in Tartar Sauce.jpg', 'Active'),
(2, 1, 'Beef', 10, '<p>&nbsp;</p>\r\n\r\n<p>mindless, emotionless, and easily replicable factors of production, Taylorism was a critical</p>\r\n\r\n<p><br />\r\nfactor in the unprecedented scale of US factory output that led to Allied victory in Second</p>\r\n\r\n<p><br />\r\nWorld War, and the subsequent US dominance of the industrial world.<br />\r\n&nbsp;</p>', 2, 'b,Beef Misono.jpg', 'Active'),
(3, 1, 'Black Sambo', 25, '<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>mindless, emotionless, and easily replicable factors of production, Taylorism was a critical</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>factor in the unprecedented scale of US factory output that led to Allied victory in Second</li>\r\n	<li>World War, and the subsequent US dominance of the industrial world.<br />\r\n	&nbsp;</li>\r\n</ol>', 3, 'Black Sambo,d.jpg', 'Active'),
(4, 1, 'Beef Salpicao', 10, '<p>&nbsp;</p>\r\n\r\n<p>Maslow (1943) stated that people are motivated to achieve certain needs. When one<br />\r\nneed is fulfilled a person seeks to fulifil the next one, and so on.<br />\r\nThe earliest and most widespread version of Maslow&#39;s (1943, 1954) <em>hierarchy of</em><br />\r\n<em>needs </em>includes five motivational needs, often depicted as hierachical levels within a pyramid.<br />\r\n&nbsp;</p>', 2, 'b,Beef Salpicao.jpg', 'Active'),
(5, 1, 'Bar B Q Pork', 50, '<p>&nbsp;</p>\r\n\r\n<p>Maslow (1943) stated that people are motivated to achieve certain needs. When one<br />\r\nneed is fulfilled a person seeks to fulifil the next one, and so on.<br />\r\nThe earliest and most widespread version of Maslow&#39;s (1943, 1954) <em>hierarchy of</em><br />\r\n<em>needs </em>includes five motivational needs, often depicted as hierachical levels within a pyramid.<br />\r\n&nbsp;</p>', 2, 'barbequed pork.jpg', 'Active'),
(6, 1, 'Chicken Cordon Bleu', 25, '<p>&nbsp;</p>\r\n\r\n<p>Maslow (1943) stated that people are motivated to achieve certain needs. When one<br />\r\nneed is fulfilled a person seeks to fulifil the next one, and so on.<br />\r\nThe earliest and most widespread version of Maslow&#39;s (1943, 1954) <em>hierarchy of</em><br />\r\n<em>needs </em>includes five motivational needs, often depicted as hierachical levels within a pyramid.<br />\r\n&nbsp;</p>', 3, 'Chicken Cordon Bleu.jpg', 'Active'),
(7, 1, 'Caterina', 20, '<p>&nbsp;</p>\r\n\r\n<p>Maslow (1943) stated that people are motivated to achieve certain needs. When one<br />\r\nneed is fulfilled a person seeks to fulifil the next one, and so on.<br />\r\nThe earliest and most widespread version of Maslow&#39;s (1943, 1954) <em>hierarchy of</em><br />\r\n<em>needs </em>includes five motivational needs, often depicted as hierachical levels within a pyramid.<br />\r\n&nbsp;</p>', 4, 'Catering.jpg', 'Active'),
(8, 1, 'Roasted Carrot Soup', 15, '<p>&nbsp;</p>\r\n\r\n<p>Maslow (1943) stated that people are motivated to achieve certain needs. When one<br />\r\nneed is fulfilled a person seeks to fulifil the next one, and so on.<br />\r\nThe earliest and most widespread version of Maslow&#39;s (1943, 1954) <em>hierarchy of</em><br />\r\n<em>needs </em>includes five motivational needs, often depicted as hierachical levels within a pyramid.<br />\r\n&nbsp;</p>', 3, 'Roaste Carrot Soup.jpg', 'Active'),
(9, 1, 'Buko Pie', 10, '<p>&nbsp;</p>\r\n\r\n<p>Maslow (1943) stated that people are motivated to achieve certain needs. When one<br />\r\nneed is fulfilled a person seeks to fulifil the next one, and so on.<br />\r\nThe earliest and most widespread version of Maslow&#39;s (1943, 1954) <em>hierarchy of</em><br />\r\n<em>needs </em>includes five motivational needs, often depicted as hierachical levels within a pyramid.<br />\r\n&nbsp;</p>', 6, 'buko pie.jpg', 'Active'),
(10, 1, 'Spaghetti Meat Balls', 50, '<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>Maslow (1943) stated that people are motivated to achieve certain needs. When one&nbsp;</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>need is fulfilled a person seeks to fulifil the next one, and so on.</li>\r\n	<li>The earliest and most widespread version of Maslow&#39;s (1943, 1954) <em>hierarchy of</em></li>\r\n</ul>\r\n\r\n<ol>\r\n	<li><em>needs </em>includes five motivational needs, often depicted as hierachical levels within a pyramid.<br />\r\n	&nbsp;</li>\r\n</ol>', 5, 'spaghetti meat balls.jpg', 'Active'),
(11, 2, 'Calos PlaZZetos', 50, '<p>Maslow (1943) stated that people are motivated to achieve certain needs. When one<br />\r\nneed is fulfilled a person seeks to fulifil the next one, and so on.<br />\r\nThe earliest and most widespread version of Maslow&#39;s (1943, 1954) <em>hierarchy of</em><br />\r\n<em>needs </em>includes five motivational needs, often depicted as hierachical levels within a pyramid.<br />\r\n&nbsp;</p>', 2, 's,lasagna.jpg', 'Deactivate'),
(13, 2, 'Brazo', 20, '<p>Some quick example text to build on the card title and make up the bulk of the card&#39;s content.</p>', 2, 'Brazo de Mercedes,d.jpg', 'Active'),
(14, 2, 'Freid Chicken', 25, '<p>Freid Chicken good for the body, it&#39;s very special</p>', 3, 'images4.jpg', 'Active'),
(15, 3, 'Rellenong Bangus', 50, '<ol>\r\n	<li>Rellenong Bangus good for the body Rellenong Bangus good for the body Rellenong</li>\r\n	<li>Bangus good for the body Rellenong Bangus good for the body Rellenong Bangus</li>\r\n	<li>good for the body Rellenong Bangus good for the body Rellenong Bangus</li>\r\n	<li>good for the body Rellenong Bangus good for the body Rellenong Bangus good for the bodyv</li>\r\n</ol>', 5, 'Rellenong Bangus.jpg', 'Active');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `FK_association1` FOREIGN KEY (`receiptsId`) REFERENCES `receipts` (`receiptsId`),
  ADD CONSTRAINT `FK_association3` FOREIGN KEY (`cookerId`) REFERENCES `cookers` (`cookerId`);

--
-- Constraints for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD CONSTRAINT `FK_association2` FOREIGN KEY (`receiptsId`) REFERENCES `receipts` (`receiptsId`),
  ADD CONSTRAINT `FK_association4` FOREIGN KEY (`cookerId`) REFERENCES `cookers` (`cookerId`);

--
-- Constraints for table `receipts`
--
ALTER TABLE `receipts`
  ADD CONSTRAINT `FK_association5` FOREIGN KEY (`cookerId`) REFERENCES `cookers` (`cookerId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
