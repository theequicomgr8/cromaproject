-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2024 at 09:51 AM
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
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `blade_name` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `name`, `pic`, `blade_name`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', '1712637986-laptop-icon.svg', 'laptop-list', '2024-04-09 04:46:26', '2024-04-09 04:46:26'),
(2, 'Desktop', '1712638019-pc-monitor.svg', 'desktop-list', '2024-04-09 04:46:59', '2024-04-09 04:46:59'),
(3, 'Mobile', '1712638038-mobile.svg', 'mobile-list', '2024-04-09 04:47:18', '2024-04-09 04:47:18'),
(4, 'Sim', '1712638059-sim.svg', 'sim.blade.php', '2024-04-09 04:47:39', '2024-04-09 04:47:39'),
(5, 'Frejune', '1712638093-frejune.svg', 'frejune.blade.php', '2024-04-09 04:48:13', '2024-04-09 04:48:13'),
(6, 'Keys', '1712638109-keys.svg', 'key.blade.php', '2024-04-09 04:48:29', '2024-04-09 04:48:29'),
(7, 'Ups', '1712638135-ups.svg', 'ups.blade.php', '2024-04-09 04:48:55', '2024-04-09 04:48:55'),
(8, 'House Keeping', '1712638155-house-keeping.svg', 'house-keeping.blade.php', '2024-04-09 04:49:15', '2024-04-09 04:49:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
