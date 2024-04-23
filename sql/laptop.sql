-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 06:17 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `laptop`
--

CREATE TABLE `laptop` (
  `id` int(11) NOT NULL,
  `systemid` varchar(255) DEFAULT NULL,
  `accessoriesName` varchar(255) DEFAULT NULL,
  `accessoriesCategory` varchar(255) DEFAULT 'Device',
  `brand` varchar(255) DEFAULT NULL,
  `processor` varchar(255) DEFAULT NULL,
  `ram` varchar(255) DEFAULT NULL,
  `hdd` varchar(255) DEFAULT NULL,
  `ssd` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `system_type` varchar(255) NOT NULL DEFAULT '1' COMMENT '1-Laptop,2-Desktop,3-Mobile',
  `deletes` varchar(255) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laptop`
--

INSERT INTO `laptop` (`id`, `systemid`, `accessoriesName`, `accessoriesCategory`, `brand`, `processor`, `ram`, `hdd`, `ssd`, `status`, `system_type`, `deletes`, `created_at`, `updated_at`) VALUES
(1, '01', NULL, NULL, 'Dell', 'I5', '4', '1000', '120', 'Old', '1', '0', '2024-04-09 09:51:06', '2024-04-09 09:51:06'),
(2, '01', NULL, NULL, 'HP', 'I7', '2', '1000', '120', 'New', '2', '0', '2024-04-12 04:20:38', '2024-04-12 04:20:38'),
(3, '02', NULL, NULL, 'laptop 2', 'I5', '8', '1000', '120', 'New', '1', '0', '2024-04-16 06:22:44', '2024-04-18 04:13:09'),
(4, '01', 'Mobile', 'Device', 'I-Phone', 'I5', '2', '1000', '120', 'New', '3', '0', '2024-04-17 04:38:46', '2024-04-17 04:38:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laptop`
--
ALTER TABLE `laptop`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laptop`
--
ALTER TABLE `laptop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
