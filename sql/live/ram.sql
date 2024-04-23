-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2024 at 09:52 AM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cromag8l_asset`
--

-- --------------------------------------------------------

--
-- Table structure for table `ram`
--

CREATE TABLE `ram` (
  `id` int(11) NOT NULL,
  `systemid` varchar(255) DEFAULT NULL,
  `accessoriesName` varchar(255) DEFAULT NULL,
  `accessoriesCategory` varchar(255) DEFAULT NULL,
  `storage` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `configuration` varchar(255) DEFAULT NULL,
  `serial_no` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `warranty_end` varchar(255) DEFAULT NULL,
  `device_pic` varchar(255) DEFAULT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `invoice_date` varchar(255) DEFAULT NULL,
  `invoice_company_name` varchar(255) DEFAULT NULL,
  `invoice_file` varchar(255) DEFAULT NULL,
  `accessories_type` varchar(255) DEFAULT NULL COMMENT '1-Ram,2-Mouse,3-Keybord,4-Harddisk,5-Graphic Card,6-Monitor,7-Headhone',
  `deletes` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ram`
--

INSERT INTO `ram` (`id`, `systemid`, `accessoriesName`, `accessoriesCategory`, `storage`, `brand`, `configuration`, `serial_no`, `status`, `warranty_end`, `device_pic`, `invoice_no`, `invoice_date`, `invoice_company_name`, `invoice_file`, `accessories_type`, `deletes`, `created_at`, `updated_at`) VALUES
(1, '01', 'Ram', 'Accessories', NULL, 'Samsung', 'config', 'trtrt565756', 'New', '2024-04-13', '3.jpg', 'INNO56756', '2024-04-12', 'croma', '4.jpeg', '1', 0, '2024-04-12 09:33:50', '2024-04-12 09:33:50'),
(2, '01', 'Mouse', 'Accessories', NULL, 'Zebronic', 'configm', 'trtrt565756m', 'Old', '2024-04-13', '1712986484-7kb.jpg', 'MINNO56756', '2024-04-13', 'croma', '1712986484-4.jpeg', '2', 0, '2024-04-13 05:34:44', '2024-04-13 05:34:44'),
(4, '02', 'Ram', 'Accessories', NULL, 'ERRRR', 'configm', 'trtrt565756m', 'New', '2024-04-12', '1712987050-1.jpg', 'INNO56756', '2024-04-19', 'Rcroma', '1712987050-2.jpg', '1', 0, '2024-04-13 05:44:10', '2024-04-13 05:44:10'),
(6, '02', 'Mouse', 'Accessories', NULL, 'Mouse Brand name', 'configm', 'trtrt565756', 'New', '2024-04-30', '1713159104-Ashish-Bhatt.png', 'INNO56756', '2024-04-15', 'Mcroma', '1713159104-4.jpeg', '2', 0, '2024-04-15 05:31:44', '2024-04-15 05:31:44'),
(7, '01', 'keyboard', 'Accessories', NULL, 'Dell Key', 'configmfghfg', 'trtrt565756mfg', 'Old', '2024-04-29', '1713165429-Ashish-Bhatt.png', 'INNO56756', '2024-04-16', 'Kcroma', '1713165429-4.jpeg', '3', 0, '2024-04-15 07:17:09', '2024-04-15 07:17:09'),
(8, '01', 'harddisk', 'Accessories', NULL, 'harddisk brand', 'config', 'trtrt565756', 'Old', '2024-04-29', '1713239965-1.jpg', 'MINNO56756', '2024-04-16', 'Hcroma', '1713239965-4.jpeg', '4', 0, '2024-04-16 03:59:25', '2024-04-16 03:59:25'),
(9, '01', 'graphiccard', 'Accessories', NULL, 'Graphic card brand', 'GFRT', 'trtrt565756m', 'Old', '2024-04-29', '1713241057-3.jpg', 'INNO56756', '2024-04-16', 'Gcroma', '1713241057-1.jpg', '5', 0, '2024-04-16 04:17:37', '2024-04-16 04:17:37'),
(10, '01', 'monitor', 'Accessories', NULL, 'Monitor Brand', 'config', 'trtrt565756mfg', 'New', '2024-04-30', '1713241764-ev1.png', 'INNO56756', '2024-04-16', 'MOcroma', '1713241764-3.jpg', '6', 0, '2024-04-16 04:29:24', '2024-04-16 04:29:24'),
(11, '01', 'headphone', 'Accessories', NULL, 'Headphone Modal', 'configm', 'trtrt565756mfg', 'Old', '2024-04-16', '1713242519-1.jpg', 'MINNO56756', '2024-04-16', 'HEADcroma', '1713242519-23.jpeg', '7', 0, '2024-04-16 04:41:59', '2024-04-16 04:41:59'),
(12, '02', 'headphone', 'Accessories', NULL, 'Headphone Modal2', 'configmfghfg', 'trtrt565756mfg', 'New', '2024-04-30', '1713242621-22.jpeg', 'INNO56756', '2024-04-16', 'Hcromasdfg', '1713242621-1.jpg', '7', 0, '2024-04-16 04:43:41', '2024-04-16 04:43:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ram`
--
ALTER TABLE `ram`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ram`
--
ALTER TABLE `ram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
