-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 25, 2024 at 08:05 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `carId` int(255) NOT NULL,
  `make` varchar(16) DEFAULT NULL,
  `model` varchar(16) DEFAULT NULL,
  `engine` varchar(8) DEFAULT NULL,
  `registrationYear` year(4) NOT NULL,
  `color` varchar(16) DEFAULT NULL,
  `conditions` varchar(16) DEFAULT NULL,
  `mileage` int(32) DEFAULT NULL,
  `bodyType` varchar(16) DEFAULT NULL,
  `fuelType` varchar(16) DEFAULT NULL,
  `transmission` varchar(16) DEFAULT NULL,
  `images` varchar(255) NOT NULL,
  `price` int(16) DEFAULT NULL,
  `location` varchar(16) DEFAULT NULL,
  `contactNumber` varchar(10) DEFAULT NULL,
  `advertEmail` varchar(64) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Store car data';

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`carId`, `make`, `model`, `engine`, `registrationYear`, `color`, `conditions`, `mileage`, `bodyType`, `fuelType`, `transmission`, `images`, `price`, `location`, `contactNumber`, `advertEmail`, `description`) VALUES
(29, 'ASTON MARTIN', 'GRAND CHEROKEE', '0.8L', '2023', 'green', 'reconditioned', 500000, 'Hatchback', 'Hybrid', 'Tiptronic', 'home-main1.png', 1200000, 'Colombo', '0705782005', 'user@gmail.com', 'Wagon R Sting Ray - CBF-4839\r\n\r\n3st Owner\r\nAll Service records Available\r\nGenuine mileage 42200km');

-- --------------------------------------------------------

--
-- Table structure for table `listing`
--

CREATE TABLE `listing` (
  `listingId` int(255) NOT NULL,
  `carId` int(255) DEFAULT NULL,
  `sellerId` int(255) DEFAULT NULL,
  `listingTime` timestamp NULL DEFAULT current_timestamp(),
  `listingStatus` enum('pending','live','reject') NOT NULL DEFAULT 'pending',
  `boostAd` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Store listing data';

--
-- Dumping data for table `listing`
--

INSERT INTO `listing` (`listingId`, `carId`, `sellerId`, `listingTime`, `listingStatus`, `boostAd`) VALUES
(26, 29, 47, '2024-09-25 18:03:58', 'pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `savedAd`
--

CREATE TABLE `savedAd` (
  `savedAdId` int(255) NOT NULL,
  `userId` int(255) DEFAULT NULL,
  `listingId` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Store user''s saved ads data';

-- --------------------------------------------------------

--
-- Table structure for table `transation`
--

CREATE TABLE `transation` (
  `transactionId` int(255) NOT NULL,
  `carId` int(255) DEFAULT NULL,
  `sellerId` int(255) DEFAULT NULL,
  `totalAmout` int(32) DEFAULT NULL,
  `TrasactionTime` timestamp NULL DEFAULT NULL,
  `paymentMethod` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Store transaction data';

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(255) NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `userPassword` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `isAdmin` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Store user data';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `name`, `email`, `userPassword`, `createdAt`, `isAdmin`) VALUES
(47, 'User', 'user@gmail.com', '$2y$10$nRm3LfJFE.av5bWhnYDBc.EsU6CFna7SBMSTofLBODCv/jSn5t77W', '2024-09-25 23:32:16', 0),
(48, 'Admin', 'admin@gmail.com', '$2y$10$hM26goR5Aqk99Db03NG15Oi2Hp1/Lkmr7crq1XAkAGVMHZos4.e4W', '2024-09-25 23:34:38', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`carId`);

--
-- Indexes for table `listing`
--
ALTER TABLE `listing`
  ADD PRIMARY KEY (`listingId`),
  ADD KEY `sellerId` (`sellerId`),
  ADD KEY `carId` (`carId`);

--
-- Indexes for table `savedAd`
--
ALTER TABLE `savedAd`
  ADD PRIMARY KEY (`savedAdId`);

--
-- Indexes for table `transation`
--
ALTER TABLE `transation`
  ADD PRIMARY KEY (`transactionId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `carId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `listing`
--
ALTER TABLE `listing`
  MODIFY `listingId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `savedAd`
--
ALTER TABLE `savedAd`
  MODIFY `savedAdId` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transation`
--
ALTER TABLE `transation`
  MODIFY `transactionId` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `listing`
--
ALTER TABLE `listing`
  ADD CONSTRAINT `listing_ibfk_1` FOREIGN KEY (`sellerId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `listing_ibfk_2` FOREIGN KEY (`carId`) REFERENCES `car` (`carId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
