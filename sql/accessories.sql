-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 06:16 AM
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
-- Table structure for table `accessories`
--

CREATE TABLE `accessories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `blade_name` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accessories`
--

INSERT INTO `accessories` (`id`, `name`, `pic`, `blade_name`, `created_at`, `updated_at`) VALUES
(1, 'Ram', '1712639895-ram.svg', 'ram-list', '2024-04-09 05:18:15', '2024-04-09 05:18:15'),
(2, 'Mouse', '1712639928-mouse.svg', 'mouse-list', '2024-04-09 05:18:48', '2024-04-09 05:18:48'),
(3, 'keyboard', '1712639951-keyboard.svg', 'keyboard-list', '2024-04-09 05:19:11', '2024-04-09 05:19:11'),
(4, 'cable', '1712639991-cable.svg', NULL, '2024-04-09 05:19:51', '2024-04-09 05:19:51'),
(5, 'harddisk', '1712640011-harddisk.svg', 'harddisk-list', '2024-04-09 05:20:11', '2024-04-09 05:20:11'),
(6, 'graphic card', '1712640032-graphic-card.svg', 'graphiccard-list', '2024-04-09 05:20:32', '2024-04-09 05:20:32'),
(7, 'monitor', '1712640049-monitor.svg', 'monitor-list', '2024-04-09 05:20:49', '2024-04-09 05:20:49'),
(8, 'headphone', '1712640067-headphone.svg', 'headphone-list', '2024-04-09 05:21:07', '2024-04-09 05:21:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessories`
--
ALTER TABLE `accessories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
