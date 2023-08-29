-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 24, 2023 at 08:56 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recruitment`
--

-- --------------------------------------------------------

--
-- Table structure for table `cloud_capacity`
--

CREATE TABLE `cloud_capacity` (
  `id` int UNSIGNED NOT NULL,
  `cluster_id` int DEFAULT NULL,
  `mem` int DEFAULT NULL,
  `cpu` int DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cloud_capacity`
--

INSERT INTO `cloud_capacity` (`id`, `cluster_id`, `mem`, `cpu`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 12, 1, '2023-08-24 08:42:52', '2023-08-24 08:43:18'),
(2, 1, 12, 12, 1, '2023-08-24 08:42:52', '2023-08-24 08:43:18'),
(3, 1, 6, 6, 1, '2023-08-24 08:42:52', '2023-08-24 08:43:18'),
(4, 2, 4, 8, 1, '2023-08-24 08:42:52', '2023-08-24 08:43:18'),
(5, 2, 6, 6, 1, '2023-08-24 08:42:52', '2023-08-24 08:43:18'),
(6, 2, 12, 12, 1, '2023-08-24 08:42:52', '2023-08-24 08:43:18');

-- --------------------------------------------------------

--
-- Table structure for table `cluster`
--

CREATE TABLE `cluster` (
  `id` int UNSIGNED NOT NULL,
  `cluster_name` varchar(10) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cluster`
--

INSERT INTO `cluster` (`id`, `cluster_name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Silver', 1, '2023-08-24 08:41:47', '2023-08-24 08:41:51'),
(2, 'Gold', 1, '2023-08-24 08:41:47', '2023-08-24 08:41:51'),
(3, 'Platinum', 1, '2023-08-24 08:41:47', '2023-08-24 08:41:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cloud_capacity`
--
ALTER TABLE `cloud_capacity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cluster`
--
ALTER TABLE `cluster`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cloud_capacity`
--
ALTER TABLE `cloud_capacity`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cluster`
--
ALTER TABLE `cluster`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
