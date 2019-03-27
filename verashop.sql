-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2019 at 06:46 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopvera`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf32_vietnamese_ci NOT NULL,
  `address` varchar(100) COLLATE utf32_vietnamese_ci NOT NULL,
  `email` varchar(100) COLLATE utf32_vietnamese_ci NOT NULL,
  `password` varchar(50) COLLATE utf32_vietnamese_ci NOT NULL,
  `phone` char(15) COLLATE utf32_vietnamese_ci NOT NULL,
  `avatar` varchar(100) COLLATE utf32_vietnamese_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `ID` int(11) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `URL` varchar(256) NOT NULL,
  `DisplayOrder` varchar(500) DEFAULT NULL,
  `GroupID` int(11) NOT NULL,
  `Target` varchar(500) DEFAULT NULL,
  `Status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menugroup`
--

CREATE TABLE `menugroup` (
  `ID` int(11) NOT NULL,
  `Name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `PaymentMethod` varchar(500) DEFAULT NULL,
  `PaymentStatus` varchar(500) DEFAULT NULL,
  `CreateDate` datetime DEFAULT NULL,
  `CreateBy` varchar(500) DEFAULT NULL,
  `Status` bit(1) NOT NULL,
  `Messege` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `ID` int(11) NOT NULL,
  `Name` int(11) NOT NULL,
  `Alias` int(11) NOT NULL,
  `Content` int(11) DEFAULT NULL,
  `CreatedDate` int(11) DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `UpdateDate` int(11) DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  `MetaKeyword` int(11) DEFAULT NULL,
  `MetaDescription` int(11) DEFAULT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `ID` int(11) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `Alias` varchar(500) NOT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `CategoryID` int(11) NOT NULL,
  `Image` varchar(500) DEFAULT NULL,
  `Content` varchar(500) DEFAULT NULL,
  `HomeFlag` bit(1) DEFAULT NULL,
  `HotFlag` bit(1) DEFAULT NULL,
  `ViewCount` int(11) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreateBy` varchar(500) DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL,
  `UpdateBy` varchar(500) DEFAULT NULL,
  `MetaKeyword` varchar(500) DEFAULT NULL,
  `MetaDescription` varchar(500) DEFAULT NULL,
  `Status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `postcategories`
--

CREATE TABLE `postcategories` (
  `ID` int(11) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `Alias` varchar(256) NOT NULL,
  `Description` varchar(256) NOT NULL,
  `ParentID` int(11) NOT NULL,
  `DisplayOrder` int(11) NOT NULL,
  `Image` varchar(500) NOT NULL,
  `HomeFlag` bit(1) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `CreatedBy` varchar(256) NOT NULL,
  `UpdateDate` datetime NOT NULL,
  `UpdateBy` varchar(256) NOT NULL,
  `MetaKeyword` varchar(256) NOT NULL,
  `MetaDescription` varchar(256) NOT NULL,
  `Status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posttags`
--

CREATE TABLE `posttags` (
  `PostID` int(11) NOT NULL,
  `TagID` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `productcategories`
--

CREATE TABLE `productcategories` (
  `ID` int(11) NOT NULL,
  `Name` varchar(150) NOT NULL,
  `Description` varchar(5000) DEFAULT NULL,
  `ParentID` int(11) DEFAULT NULL,
  `DisplayOrder` int(11) DEFAULT NULL,
  `HomeFlag` bit(2) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` varchar(500) DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL,
  `UpdatedBy` varchar(500) DEFAULT NULL,
  `MetaKeyWord` varchar(500) DEFAULT NULL,
  `MetaDescription` varchar(500) DEFAULT NULL,
  `Status` bit(2) NOT NULL,
  `Image` varchar(500) DEFAULT NULL,
  `Alias` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productcategories`
--

INSERT INTO `productcategories` (`ID`, `Name`, `Description`, `ParentID`, `DisplayOrder`, `HomeFlag`, `CreatedDate`, `CreatedBy`, `UpdateDate`, `UpdatedBy`, `MetaKeyWord`, `MetaDescription`, `Status`, `Image`, `Alias`) VALUES
(1, 'Dell', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, b'00', NULL, 'dell'),
(2, 'HP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, b'00', NULL, 'hp'),
(3, 'Samsung', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, b'00', NULL, 'samsung'),
(4, 'Iphone', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, b'00', NULL, 'iphone'),
(5, 'Xiaomi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, b'00', NULL, 'xiaomi'),
(6, 'Oppo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, b'00', NULL, 'oppo'),
(7, 'Lenovo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, b'00', NULL, 'lenovo');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `Alias` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `Image` int(11) DEFAULT NULL,
  `Price` decimal(18,2) NOT NULL,
  `PromotionPrice` decimal(18,2) DEFAULT NULL,
  `Warantary` varchar(5000) DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `Content` varchar(500) DEFAULT NULL,
  `HomeFlag` bit(1) DEFAULT NULL,
  `HotFlag` bit(1) DEFAULT NULL,
  `ViewCount` int(11) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` varchar(500) DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL,
  `UpdateBy` varchar(500) DEFAULT NULL,
  `MetaKeyword` varchar(500) DEFAULT NULL,
  `MetaDescription` varchar(500) DEFAULT NULL,
  `Status` bit(1) NOT NULL,
  `Tags` varchar(500) DEFAULT NULL,
  `Quantity` int(11) NOT NULL,
  `OriginalPrice` decimal(18,2) NOT NULL,
  `MoreImages` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `producttags`
--

CREATE TABLE `producttags` (
  `ProductID` int(11) NOT NULL,
  `TagID` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `ID` varchar(128) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `Type` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf32_vietnamese_ci NOT NULL,
  `email` varchar(100) COLLATE utf32_vietnamese_ci NOT NULL,
  `phone` char(15) COLLATE utf32_vietnamese_ci NOT NULL,
  `address` varchar(100) COLLATE utf32_vietnamese_ci NOT NULL,
  `password` varchar(50) COLLATE utf32_vietnamese_ci NOT NULL,
  `avatar` varchar(100) COLLATE utf32_vietnamese_ci NOT NULL,
  `token` varchar(50) COLLATE utf32_vietnamese_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_vietnamese_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `GroupID` (`GroupID`);

--
-- Indexes for table `menugroup`
--
ALTER TABLE `menugroup`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`OrderID`,`ProductID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Indexes for table `postcategories`
--
ALTER TABLE `postcategories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `posttags`
--
ALTER TABLE `posttags`
  ADD PRIMARY KEY (`PostID`,`TagID`),
  ADD KEY `TagID` (`TagID`);

--
-- Indexes for table `productcategories`
--
ALTER TABLE `productcategories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Indexes for table `producttags`
--
ALTER TABLE `producttags`
  ADD PRIMARY KEY (`ProductID`,`TagID`),
  ADD KEY `TagID` (`TagID`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menugroup`
--
ALTER TABLE `menugroup`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postcategories`
--
ALTER TABLE `postcategories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productcategories`
--
ALTER TABLE `productcategories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`GroupID`) REFERENCES `menugroup` (`ID`);

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ID`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `postcategories` (`ID`);

--
-- Constraints for table `posttags`
--
ALTER TABLE `posttags`
  ADD CONSTRAINT `posttags_ibfk_1` FOREIGN KEY (`PostID`) REFERENCES `post` (`ID`),
  ADD CONSTRAINT `posttags_ibfk_2` FOREIGN KEY (`TagID`) REFERENCES `tag` (`ID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `productcategories` (`ID`);

--
-- Constraints for table `producttags`
--
ALTER TABLE `producttags`
  ADD CONSTRAINT `producttags_ibfk_1` FOREIGN KEY (`TagID`) REFERENCES `tag` (`ID`),
  ADD CONSTRAINT `producttags_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
