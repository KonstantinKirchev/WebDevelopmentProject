-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2015 at 11:11 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shoppingcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`Id` int(11) NOT NULL,
  `CategoryName` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Id`, `CategoryName`) VALUES
(4, 'Dairies'),
(1, 'Fruits'),
(3, 'Meats'),
(2, 'Vegetables'),
(8, 'Лекарства');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`Id` int(11) NOT NULL,
  `ProductName` varchar(45) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Category_Id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Id`, `ProductName`, `Quantity`, `Price`, `Category_Id`) VALUES
(5, 'Bananas', 79, '2.50', 1),
(7, 'Cheese', 34, '12.30', 4),
(8, 'Cottage cheese', 130, '5.80', 4),
(9, 'Milk', 221, '1.75', 4),
(10, 'Beef', 75, '15.30', 3),
(11, 'Chicken', 35, '10.25', 3),
(13, 'Mango', 0, '3.25', 1),
(15, 'Картофи', 10, '0.58', 2),
(16, 'Oranges', 80, '1.50', 1),
(17, 'Моркови', 7, '0.60', 2),
(18, 'Кашкавал', 21, '10.00', 4),
(22, 'Краставици', 188, '3.00', 2),
(24, 'Маслини', 200, '3.25', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`Id` int(11) NOT NULL,
  `Username` varchar(45) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Balance` decimal(10,2) DEFAULT '1000.00',
  `is_admin` bit(1) DEFAULT b'0',
  `is_editor` bit(1) DEFAULT b'0',
  `is_ban` bit(1) DEFAULT b'0'
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Username`, `Password`, `Balance`, `is_admin`, `is_editor`, `is_ban`) VALUES
(20, 'pipi', '$2y$10$kycjErTkfNKmP65oFpoVVO.NHQCTp8EiU1YtMGl5XrqVaBYbymb2O', '422.34', b'0', b'0', b'0'),
(21, 'kosta', '$2y$10$vNgCywSU0Q.imMKG5MvboeaIKhp2w/MgdFwbTNfSx0x8cSAT.Jnxa', '1250.66', b'1', b'0', b'0'),
(22, 'dido', '$2y$10$VJ0jCq1bqF9oU2z5bQwkguqgMwxClRDBNDY/oWPX8A.ekexbDWqDa', '998.00', b'0', b'1', b'0'),
(23, 'rali', '$2y$10$j7A/1JA2RAGLaoYt93n8O.SIyDND679aZG4GNDM/r5OEJUoTHUzDK', '996.00', b'0', b'0', b'0'),
(24, 'blueeagle', '$2y$10$aunCkIg/zbRpJ/a6Y7vdpeAUuokFGE0KlvMd5evUPpMMxjiAa8iX.', '1000.00', b'0', b'0', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `users_carts`
--

CREATE TABLE IF NOT EXISTS `users_carts` (
`id` int(11) NOT NULL,
  `cart_contents` longtext NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_carts`
--

INSERT INTO `users_carts` (`id`, `cart_contents`, `price`, `user_id`) VALUES
(14, 'a:2:{i:0;a:2:{s:7:"item_id";s:1:"5";s:8:"quantity";s:2:"12";}i:1;a:2:{s:7:"item_id";s:2:"15";s:8:"quantity";s:3:"216";}}', '155.28', 20),
(15, 'a:2:{i:0;a:2:{s:7:"item_id";s:2:"13";s:8:"quantity";s:1:"1";}i:1;a:2:{s:7:"item_id";s:2:"16";s:8:"quantity";s:2:"12";}}', '21.25', 20),
(16, 'a:1:{i:0;a:2:{s:7:"item_id";s:1:"5";s:8:"quantity";s:2:"10";}}', '25.00', 20),
(17, 'a:1:{i:0;a:2:{s:7:"item_id";s:2:"16";s:8:"quantity";s:1:"8";}}', '12.00', 20),
(18, 'a:1:{i:0;a:2:{s:7:"item_id";s:1:"5";s:8:"quantity";s:2:"14";}}', '35.00', 20),
(19, 'a:1:{i:0;a:2:{s:7:"item_id";s:1:"5";s:8:"quantity";i:1;}}', '2.50', 20),
(22, 'a:1:{i:0;a:2:{s:7:"item_id";s:2:"18";s:8:"quantity";s:1:"4";}}', '40.00', 20),
(23, 'a:1:{i:0;a:2:{s:7:"item_id";s:1:"9";s:8:"quantity";s:2:"21";}}', '36.75', 20),
(24, 'a:1:{i:0;a:2:{s:7:"item_id";s:1:"5";s:8:"quantity";s:2:"20";}}', '50.00', 20),
(25, 'a:1:{i:0;a:2:{s:7:"item_id";s:1:"9";s:8:"quantity";s:2:"23";}}', '40.25', 20),
(26, 'a:1:{i:0;a:2:{s:7:"item_id";s:1:"5";s:8:"quantity";s:2:"23";}}', '57.50', 20),
(27, 'a:3:{i:0;a:2:{s:7:"item_id";s:1:"5";s:8:"quantity";s:2:"23";}i:1;a:2:{s:7:"item_id";s:2:"22";s:8:"quantity";s:2:"12";}i:2;a:2:{s:7:"item_id";s:2:"15";s:8:"quantity";s:1:"4";}}', '47.91', 20),
(29, 'a:1:{i:0;a:2:{s:7:"item_id";s:1:"5";s:8:"quantity";i:2;}}', '4.00', 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`Id`), ADD UNIQUE KEY `CategoryName_UNIQUE` (`CategoryName`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`Id`), ADD UNIQUE KEY `ProductName_UNIQUE` (`ProductName`), ADD KEY `fk_Products_Categories_idx` (`Category_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`Id`), ADD UNIQUE KEY `Username_UNIQUE` (`Username`);

--
-- Indexes for table `users_carts`
--
ALTER TABLE `users_carts`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `users_carts`
--
ALTER TABLE `users_carts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
ADD CONSTRAINT `fk_Products_Categories` FOREIGN KEY (`Category_Id`) REFERENCES `categories` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
