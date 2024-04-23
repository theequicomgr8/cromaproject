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
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `empcode` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `empcode`, `name`, `email`, `password`, `mobile`, `gender`, `department`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'CC-00001', 'Suman Kumar', 'suman@gmail.com', '5fec4ba8376f207d1ff2f0cac0882b01', '7828719994', 'male', 'IT', 'emp', 1, '2024-04-10 09:15:37', '2024-04-10 09:15:37'),
(2, 'CC-00002', 'Pawan', 'pawan@gmail.com', '5fec4ba8376f207d1ff2f0cac0882b01', '5125471258', 'maile', 'MIS', 'AdminIT', 1, '2024-04-10 09:17:05', '2024-04-10 09:17:05'),
(3, 'CC-00003', 'Nitesh', 'nitesh@gmail.com', '5fec4ba8376f207d1ff2f0cac0882b01', '8541257451', 'male', 'creative', 'emp', 1, '2024-04-10 09:41:01', '2024-04-10 09:41:01'),
(4, 'CC-00004', 'Nadeem', 'nadeem@gmail.com', '5fec4ba8376f207d1ff2f0cac0882b01', '9541257412', 'male', 'sales', 'emp', 1, '2024-04-10 09:42:08', '2024-04-10 09:42:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
