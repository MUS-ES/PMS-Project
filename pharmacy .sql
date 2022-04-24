-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 24, 2022 at 05:38 PM
-- Server version: 10.6.7-MariaDB-1:10.6.7+maria~bullseye
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(11) NOT NULL COMMENT 'Admin''s Username',
  `password` varchar(256) NOT NULL COMMENT 'Admin''s Password'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'adminadmin');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL COMMENT 'Trading Name',
  `packing` tinyint(4) NOT NULL COMMENT 'Number of Bills in One Package',
  `generic_name` varchar(200) NOT NULL COMMENT 'Generic Name Of Medicine',
  `price` double NOT NULL COMMENT 'Medicine''s Price'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `medicines_stock`
--

CREATE TABLE `medicines_stock` (
  `id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `mfd` date NOT NULL COMMENT 'Manufacturing Date',
  `exp` date NOT NULL COMMENT 'Expire Date',
  `qty` int(11) NOT NULL COMMENT 'Quantity Of The Medicine',
  `user_id` int(11) NOT NULL COMMENT 'Foreign Key To Users Table'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `purchase_date` date NOT NULL COMMENT 'Date Of Purchase',
  `total` double NOT NULL COMMENT 'Invoice Total Amount',
  `supplier_id` int(11) NOT NULL COMMENT 'Foreign Key To Supplier''s id',
  `user_id` int(11) NOT NULL COMMENT 'Foreign Key To Users Table'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT 'Supplier''s Name',
  `email` varchar(100) NOT NULL COMMENT 'Supplier''s Email',
  `contact` varchar(14) NOT NULL COMMENT 'Supplier''s Phone Number',
  `address` varchar(100) NOT NULL COMMENT 'Supplier''s Address'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `email` varchar(50) COLLATE utf16_bin NOT NULL,
  `password` varchar(255) COLLATE utf16_bin NOT NULL,
  `first_name` varchar(100) COLLATE utf16_bin NOT NULL,
  `last_name` varchar(100) COLLATE utf16_bin NOT NULL,
  `ph_name` varchar(200) COLLATE utf16_bin NOT NULL COMMENT 'Pharmacy''s Name',
  `licence` varchar(200) COLLATE utf16_bin NOT NULL COMMENT 'Pharmacy''s Licence ID',
  `active` tinyint(1) NOT NULL COMMENT '1 if Account Is Active 0 Otherwise'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `ph_name`, `licence`, `active`) VALUES
(18, 'majd@gmail.com', '$2y$10$zUY.DfeaziA5krMB1N2SnugN550XSvWUAUsG9sg6TS/4Dfteyxrw6', 'Majd', 'Soubh', '', '', 1),
(20, 'majd2@gmail.com', '$2y$10$74TAXlZm3HguH.FwvUc/pOIUe1y6jWDLdawnJrs8JomtnzFmV1HWG', 'majd', 'soubh', 'health', '12312', 1),
(21, 'majd2@gmail.com', '$2y$10$74TAXlZm3HguH.FwvUc/pOIUe1y6jWDLdawnJrs8JomtnzFmV1HWG', 'majd', 'soubh', 'health', '12312', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines_stock`
--
ALTER TABLE `medicines_stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_medicines_stock_users` (`user_id`),
  ADD KEY `fk_medicines_stock_medicines` (`medicine_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fk_userid_users` (`user_id`),
  ADD KEY `fk_supplier_purchase` (`supplier_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicines_stock`
--
ALTER TABLE `medicines_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `medicines`
--
ALTER TABLE `medicines`
  ADD CONSTRAINT `medicines_ibfk_1` FOREIGN KEY (`id`) REFERENCES `medicines_stock` (`medicine_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `medicines_stock`
--
ALTER TABLE `medicines_stock`
  ADD CONSTRAINT `fk_medicines_stock_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
