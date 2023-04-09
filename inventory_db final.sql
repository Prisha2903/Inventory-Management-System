-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2023 at 07:48 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_db`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_category` (IN `cat_id` INT)   BEGIN
      delete from supplies
where STK_ID in (select STK_ID from stock where INV_ID = cat_id);

delete from stock
       where INV_ID = cat_id;
       END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `INV_ID` int(4) NOT NULL,
  `INV_NAME` varchar(20) DEFAULT NULL,
  `NO_OF_ITEMS` decimal(3,0) DEFAULT NULL,
  `USER_NAME` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`INV_ID`, `INV_NAME`, `NO_OF_ITEMS`, `USER_NAME`) VALUES
(1234, 'Beverages', '8', 'prisha'),
(2345, 'Grains & Pulses', '8', 'prisha'),
(3456, 'Baking', '5', 'prisha'),
(4567, 'Biscuits & Cookies', '10', 'prisha'),
(5678, 'Chocolates', '9', 'prisha'),
(7645, 'Edible oils', '10', 'prisha'),
(7890, 'Flours', '7', 'prisha'),
(8244, 'Pooja needs', '10', 'prisha'),
(8901, 'Soaps & Detergents', '7', 'prisha');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `USER_NAME` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(10) NOT NULL,
  `LOGIN_TIME` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`USER_NAME`, `PASSWORD`, `LOGIN_TIME`) VALUES
('prisha', '12345', '2023-01-22 19:59:44'),
('tejal', '5678', '2023-01-23 13:55:41'),
('tejal', '5678', '2023-01-25 10:56:11'),
('prisha', '12345', '2023-01-27 17:32:19'),
('prisha', '12345', '2023-01-29 20:07:57'),
('prisha', '12345', '2023-01-29 21:35:10'),
('prisha', '12345', '2023-01-29 21:36:01');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `STK_ID` int(4) NOT NULL,
  `ITEM_NAME` varchar(30) DEFAULT NULL,
  `QUANTITY` int(3) DEFAULT NULL,
  `SUP_ID` int(4) DEFAULT NULL,
  `INV_ID` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`STK_ID`, `ITEM_NAME`, `QUANTITY`, `SUP_ID`, `INV_ID`) VALUES
(102, 'KrackJack', 40, 567, 4567),
(111, 'Fried gram', 27, 789, 2345),
(114, 'Cocoa Powder', 26, 123, 3456),
(123, 'Taj Mahal tea', 28, 657, 1234),
(135, 'Horlicks', 28, 657, 1234),
(139, 'Ariel', 45, 456, 8901),
(148, 'Bourbon', 40, 789, 4567),
(153, 'MarieLight Oats', 40, 456, 4567),
(156, 'Baking powder', 28, 657, 3456),
(159, 'HomeLites matchbox', 45, 567, 8244),
(168, 'KitKat', 40, 567, 5678),
(170, 'Turmeric', 45, 567, 8244),
(196, 'Oreo', 40, 789, 4567),
(201, 'Rin soap', 45, 456, 8901),
(213, 'Corn Flour', 45, 678, 7890),
(222, 'Chana dal', 38, 567, 2345),
(234, 'Pears', 45, 657, 8244),
(243, 'Fuse', 45, 123, 5678),
(244, 'Figaro Olive Oil', 50, 123, 7645),
(256, 'Mariegold Oats', 40, 657, 4567),
(267, 'Lizol', 45, 678, 8901),
(285, 'Sunpure', 50, 456, 7645),
(333, 'Urad dal', 20, 678, 2345),
(345, 'Toor dal', 28, 657, 2345),
(361, 'Dettol', 45, 567, 8901),
(390, 'Saffola gold', 50, 123, 7645),
(396, 'rice', 6, 123, 2345),
(403, 'Baking paper', 30, 678, 3456),
(427, 'Lux', 45, 123, 8244),
(432, 'Gems', 45, 123, 5678),
(438, 'Besan', 45, 123, 7890),
(456, 'Saffola Tasty', 50, 456, 7645),
(470, 'Crispello', 45, 123, 5678),
(478, 'Red Label tea', 16, 123, 1234),
(512, 'SurfExcel', 45, 123, 8901),
(527, 'Milkybar', 45, 678, 5678),
(539, 'Ragi Flour', 45, 567, 7890),
(561, 'Hide&Seek', 40, 123, 4567),
(563, 'BournVita', 20, 456, 1234),
(571, 'Perk', 45, 789, 5678),
(581, 'Saffola Active', 50, 123, 7645),
(584, 'Vim', 45, 123, 8901),
(603, 'Lifebuoy', 45, 456, 8244),
(621, 'Idly Sooji', 45, 456, 7890),
(630, 'Fortune-SunLite', 40, 567, 7645),
(636, 'Bru coffee', 28, 657, 1234),
(645, 'Dairy Milk', 45, 456, 5678),
(648, 'Rice Flour', 45, 123, 7890),
(694, 'Levista coffee', 30, 456, 1234),
(715, 'Maida', 45, 456, 7890),
(719, 'Complan', 25, 657, 1234),
(729, 'Gemini', 50, 657, 7645),
(753, 'Cycle Agarbatti', 45, 123, 8244),
(755, 'Camphor', 45, 456, 8244),
(765, 'Dark Fantasy', 40, 789, 4567),
(768, 'Groundnuts', 25, 567, 2345),
(794, 'Fortune Rice Bran Oil', 45, 123, 7645),
(798, 'Dettol Handwash', 45, 567, 8244),
(809, 'Vanilla Essence', 23, 567, 3456),
(835, 'wheat', 28, 657, 2345),
(845, 'Boost', 30, 123, 1234),
(862, 'JimJam', 40, 567, 4567),
(865, 'Dove', 45, 123, 8244),
(870, 'Aashirvaad Atta', 45, 567, 7890),
(888, 'Mangaldeep Agarbatti', 45, 657, 8244),
(890, 'Dry Yeast', 25, 567, 3456),
(914, 'Freedom Groundnut Oil', 50, 123, 7645),
(920, 'Sundrop', 50, 789, 7645),
(923, 'Munch', 45, 456, 5678),
(932, 'Snkickers', 45, 657, 5678),
(938, 'Hide&Seek Caffe Mocha', 40, 567, 4567),
(957, 'Monaco', 40, 456, 4567),
(967, 'Tide', 45, 567, 8901),
(987, 'moong dal', 30, 456, 2345);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `SUP_ID` int(4) NOT NULL,
  `SUP_NAME` varchar(25) DEFAULT NULL,
  `SUP_MOBILE` decimal(10,0) DEFAULT NULL,
  `SUP_EMAIL` varchar(25) DEFAULT NULL,
  `SUP_LOCATION` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`SUP_ID`, `SUP_NAME`, `SUP_MOBILE`, `SUP_EMAIL`, `SUP_LOCATION`) VALUES
(123, 'Rajesh', '9876765432', 'rajesh@gmail.com', 'bangalore'),
(456, 'suresh', '7654328763', 'suresh@gmail.com', 'chennai'),
(567, 'Yashwanth', '9879879871', 'yash@gmail.com', 'bangalore'),
(657, 'mahesh', '9873879545', 'mahesh@gmail.com', 'chennai'),
(678, 'Bharath', '7657657652', 'bharath@gmail.com', 'mumbai'),
(789, 'Eshwar', '5675675678', 'eshwar@gmail.com', 'mumbai');

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE `supplies` (
  `SUP_ID` int(4) NOT NULL,
  `STK_ID` int(4) NOT NULL,
  `ITEM_NAME` varchar(30) DEFAULT NULL,
  `QUANTITY` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`SUP_ID`, `STK_ID`, `ITEM_NAME`, `QUANTITY`) VALUES
(123, 114, 'Cocoa Powder', 26),
(123, 243, 'Fuse', 45),
(123, 244, 'Figaro Olive Oil', 50),
(123, 390, 'Saffola gold', 50),
(123, 396, 'Rice', 36),
(123, 427, 'Lux', 45),
(123, 432, 'Gems', 45),
(123, 438, 'Besan', 45),
(123, 470, 'Crispello', 45),
(123, 478, 'Red Label tea', 16),
(123, 512, 'SurfExcel', 45),
(123, 561, 'Hide&Seek', 40),
(123, 581, 'Saffola Active', 50),
(123, 584, 'Vim', 45),
(123, 648, 'Rice Flour', 45),
(123, 753, 'Cycle Agarbatti', 45),
(123, 794, 'Fortune Rice Bran Oil', 45),
(123, 845, 'Boost', 30),
(123, 865, 'Dove', 45),
(123, 914, 'Freedom Groundnut Oil', 50),
(456, 139, 'Ariel', 45),
(456, 153, 'MarieLight Oats', 40),
(456, 201, 'Rin soap', 45),
(456, 285, 'Sunpure', 50),
(456, 456, 'Saffola Tasty', 50),
(456, 563, 'BournVita', 20),
(456, 603, 'Lifebuoy', 45),
(456, 621, 'Idly Sooji', 45),
(456, 645, 'Dairy Milk', 45),
(456, 694, 'Levista coffee', 30),
(456, 715, 'Maida', 45),
(456, 755, 'Camphor', 45),
(456, 923, 'Munch', 45),
(456, 957, 'Monaco', 40),
(456, 987, 'moong dal', 30),
(567, 102, 'KrackJack', 40),
(567, 159, 'HomeLites matchbox', 45),
(567, 168, 'KitKat', 40),
(567, 170, 'Turmeric', 45),
(567, 222, 'Chana dal', 38),
(567, 361, 'Dettol', 45),
(567, 539, 'Ragi Flour', 45),
(567, 630, 'Fortune-SunLite', 40),
(567, 768, 'Groundnuts', 25),
(567, 798, 'Dettol Handwash', 45),
(567, 809, 'Vanilla Essence', 23),
(567, 862, 'JimJam', 40),
(567, 870, 'Aashirvaad Atta', 45),
(567, 890, 'Dry Yeast', 25),
(567, 938, 'Hide&Seek Caffe Mocha', 40),
(567, 967, 'Tide', 45),
(657, 123, 'Taj Mahal tea', 28),
(657, 135, 'Horlicks', 28),
(657, 156, 'Baking powder', 28),
(657, 234, 'Pears', 45),
(657, 256, 'Mariegold Oats', 40),
(657, 345, 'Toor dal', 28),
(657, 636, 'Bru coffee', 28),
(657, 719, 'Complan', 25),
(657, 729, 'Gemini', 50),
(657, 835, 'Wheat', 28),
(657, 888, 'Mangaldeep Agarbatti', 45),
(657, 932, 'Snkickers', 45),
(678, 213, 'Corn Flour', 45),
(678, 267, 'Lizol', 45),
(678, 333, 'Urad dal', 20),
(678, 403, 'Baking paper', 30),
(678, 527, 'Milkybar', 45),
(789, 111, 'Fried gram', 27),
(789, 148, 'Bourbon', 40),
(789, 196, 'Oreo', 40),
(789, 571, 'Perk', 45),
(789, 765, 'Dark Fantasy', 40),
(789, 920, 'Sundrop', 50);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `USER_NAME` varchar(25) NOT NULL,
  `USER_MOBILE` decimal(10,0) DEFAULT NULL,
  `USER_EMAIL` varchar(25) DEFAULT NULL,
  `USER_LOCATION` varchar(50) DEFAULT NULL,
  `USER_PASSWORD` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`USER_NAME`, `USER_MOBILE`, `USER_EMAIL`, `USER_LOCATION`, `USER_PASSWORD`) VALUES
('manju', '9876587657', 'manju@gmail.com', 'bangalore', 'asdf'),
('mohan', '7654328765', 'mohan@gmail.com', 'bangalore', '76543'),
('prisha', '2345676533', 'prisha@gmail.com', 'Bangalore', '12345'),
('shreya', '7654328765', 'shreya@gmail.com', 'bangalore', '5678'),
('tejal', '8765432876', 'tejal@gmail.com', 'bangalore', '5678');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `invalid_phone` BEFORE INSERT ON `users` FOR EACH ROW BEGIN
	IF length (NEW.USER_MOBILE) >10 or length (NEW.USER_MOBILE) <10 THEN
    	SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'INVALID PHONE NUMBER';
    END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`INV_ID`),
  ADD KEY `USER_NAME` (`USER_NAME`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD KEY `USER_NAME` (`USER_NAME`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`STK_ID`),
  ADD KEY `INV_ID` (`INV_ID`),
  ADD KEY `stock_ibfk_2` (`SUP_ID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`SUP_ID`);

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`SUP_ID`,`STK_ID`),
  ADD KEY `SUP_ID` (`SUP_ID`),
  ADD KEY `STK_ID` (`STK_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USER_NAME`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`USER_NAME`) REFERENCES `users` (`USER_NAME`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`USER_NAME`) REFERENCES `users` (`USER_NAME`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`INV_ID`) REFERENCES `categories` (`INV_ID`),
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`SUP_ID`) REFERENCES `supplier` (`SUP_ID`);

--
-- Constraints for table `supplies`
--
ALTER TABLE `supplies`
  ADD CONSTRAINT `supplies_ibfk_1` FOREIGN KEY (`SUP_ID`) REFERENCES `supplier` (`SUP_ID`),
  ADD CONSTRAINT `supplies_ibfk_2` FOREIGN KEY (`STK_ID`) REFERENCES `stock` (`STK_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
