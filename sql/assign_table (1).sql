-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 06:15 AM
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
-- Table structure for table `assign_table`
--

CREATE TABLE `assign_table` (
  `aid` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL COMMENT '0-emp,1-laptop,2-desktop\r\n3-ram,4-Mouse,5-keyboard,6-Harddisk,7-Graphic Card,8-Monitor,9-Headphone,10-mobile',
  `accessories_type` varchar(255) DEFAULT NULL COMMENT '0-ram,1-mouse,2-ketword,3-cable,4-hard desk,5-graphic card,6-monitor,7-headphone',
  `ram` varchar(255) DEFAULT NULL,
  `item_id` varchar(255) DEFAULT NULL,
  `assign` varchar(255) DEFAULT NULL,
  `assign_by` varchar(255) DEFAULT NULL,
  `assign_date` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assign_table`
--

INSERT INTO `assign_table` (`aid`, `type`, `accessories_type`, `ram`, `item_id`, `assign`, `assign_by`, `assign_date`, `created_at`, `updated_at`) VALUES
(1, '1', NULL, '4', '1', '2', 'Pawan', '2024-04-09', '2024-04-09 09:51:06', '2024-04-09 09:51:06'),
(3, '1', NULL, '2', '1', '3', 'Pawan', '2024-04-10', '2024-04-10 06:56:54', '2024-04-10 06:56:54'),
(4, '2', NULL, '8', '2', '2', 'Pawan', '2024-04-12', '2024-04-12 04:20:38', '2024-04-12 04:20:38'),
(6, '3', NULL, NULL, '1', '2', 'Pawan', '2024-04-12', '2024-04-12 09:33:50', '2024-04-12 09:33:50'),
(7, '4', NULL, NULL, '2', '2', 'Pawan', '2024-04-13', '2024-04-13 05:34:44', '2024-04-13 05:34:44'),
(9, '3', NULL, NULL, '4', '2', 'Pawan', '2024-04-13', '2024-04-13 05:44:10', '2024-04-13 05:44:10'),
(11, '4', NULL, NULL, '6', '2', 'Pawan', '2024-04-15', '2024-04-15 05:31:44', '2024-04-15 05:31:44'),
(14, '4', NULL, NULL, '6', '3', 'Pawan', '2024-04-15', '2024-04-15 06:09:09', '2024-04-15 06:09:09'),
(15, '3', NULL, NULL, '4', '1', 'Pawan', '2024-04-03', '2024-04-15 06:12:53', '2024-04-15 06:12:53'),
(16, '5', NULL, NULL, '7', '2', 'Pawan', '2024-04-15', '2024-04-15 07:17:10', '2024-04-15 07:17:10'),
(17, '5', NULL, NULL, '7', '2', 'Pawan', '2024-04-16', '2024-04-15 07:18:10', '2024-04-15 07:18:10'),
(18, '6', NULL, NULL, '8', '2', 'Pawan', '2024-04-16', '2024-04-16 03:59:25', '2024-04-16 03:59:25'),
(19, '6', NULL, NULL, '8', '4', 'Pawan', '2024-04-17', '2024-04-16 04:00:45', '2024-04-16 04:00:45'),
(20, '7', NULL, NULL, '9', '2', 'Pawan', '2024-04-16', '2024-04-16 04:17:38', '2024-04-16 04:17:38'),
(21, '8', NULL, NULL, '10', '2', 'Pawan', '2024-04-16', '2024-04-16 04:29:24', '2024-04-16 04:29:24'),
(22, '9', NULL, NULL, '11', '2', 'Pawan', '2024-04-16', '2024-04-16 04:41:59', '2024-04-16 04:41:59'),
(23, '9', NULL, NULL, '12', '2', 'Pawan', '2024-04-16', '2024-04-16 04:43:41', '2024-04-16 04:43:41'),
(24, '9', NULL, NULL, '12', '4', 'Pawan', '2024-04-17', '2024-04-16 04:47:55', '2024-04-16 04:47:55'),
(25, '1', NULL, '4', '3', '2', 'Suman Kumar', '2024-04-16', '2024-04-16 06:22:44', '2024-04-16 06:22:44'),
(26, '1', NULL, NULL, '3', '1', 'Pawan', '2024-04-16', '2024-04-16 06:24:43', '2024-04-16 06:24:43'),
(27, '10', NULL, '2', '4', '1', 'Pawan', '2024-04-17', '2024-04-17 04:38:46', '2024-04-17 04:38:46'),
(28, '10', NULL, NULL, '4', '4', 'Pawan', '2024-04-18', '2024-04-17 04:40:42', '2024-04-17 04:40:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_table`
--
ALTER TABLE `assign_table`
  ADD PRIMARY KEY (`aid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_table`
--
ALTER TABLE `assign_table`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
