-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2020 at 03:52 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `netbill_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `connection_id` int(11) NOT NULL,
  `connection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `zone_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subzone_id` int(11) DEFAULT NULL,
  `subzone_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `connection_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `collection_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `January` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `February` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `March` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `April` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `May` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `June` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `July` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `August` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `September` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `October` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `November` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `December` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `connection_id`, `connection_name`, `zone_id`, `zone_name`, `subzone_id`, `subzone_name`, `connection_type`, `status`, `ip_address`, `bill_type`, `amount`, `collection_date`, `year`, `month`, `January`, `February`, `March`, `April`, `May`, `June`, `July`, `August`, `September`, `October`, `November`, `December`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sabbir', 1, 'Nikunjo Road 10', 3, 'Pocchim Para', 'Net Bill', 'Active', '488934983434', 'Monthly Fee', 3000, '2020-10-16', '2020', 'May', NULL, NULL, NULL, '3000', '3000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-15 21:28:39', '2020-10-15 23:25:07'),
(2, 2, 'Sorol', 2, 'Nikunjo Road 14', 1, 'Purbo Para', 'Dish Bill', 'Active', '488934983434', 'Monthly Fee', 10000, '2020-10-16', '2020', 'January', '10000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-15 21:53:46', '2020-10-15 21:53:46'),
(3, 1, 'Sabbir', 1, 'Nikunjo Road 10', 3, 'Pocchim Para', 'Net Bill', 'Active', '488934983434', 'Monthly Fee', 2000, '2020-10-16', '2020', 'February', NULL, '2000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-15 21:54:54', '2020-10-15 21:54:54'),
(4, 1, 'Sabbir', 1, 'Nikunjo Road 10', 3, 'Pocchim Para', 'Net Bill', 'Active', '488934983434', 'Monthly Fee', 5000, '2020-10-16', '2020', 'March', NULL, NULL, '5000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-15 21:55:09', '2020-10-15 21:55:09'),
(5, 1, 'Sabbir', 1, 'Nikunjo Road 10', 3, 'Pocchim Para', 'Net Bill', 'Active', '488934983434', 'Monthly Fee', 2500, '2020-10-16', '2020', 'August', '', '', '', '', '', '', '', '2500', '', '', '', '', '2020-10-15 22:30:17', '2020-10-16 07:42:18'),
(6, 2, 'Sorol', 2, 'Nikunjo Road 14', 1, 'Purbo Para', 'Dish Bill', 'Active', '488934983434', 'Monthly Fee', 3500, '2020-10-16', '2020', 'December', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3500', '2020-10-15 22:48:46', '2020-10-15 22:48:46'),
(7, 3, 'Ramcharan', 2, 'Nikunjo Road 14', 1, 'Purbo Para', 'Net Bill', 'Active', '48893498343477', 'Monthly Fee', 5000, '2020-10-16', '2020', 'February', NULL, '5000', NULL, NULL, '5000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-15 22:51:56', '2020-10-15 23:26:23'),
(8, 1, 'Sabbir', 1, 'Nikunjo Road 10', 3, 'Pocchim Para', 'Net Bill', 'Active', '488934983434', 'Monthly Fee', 3000, '2020-10-14', '2020', 'June', NULL, NULL, NULL, NULL, NULL, '3000', NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-15 23:15:22', '2020-10-15 23:15:22'),
(9, 1, 'Sabbir', 1, 'Nikunjo Road 10', 3, 'Pocchim Para', 'Net Bill', 'Active', '488934983434', 'Monthly Fee', 3000, '2020-10-17', '2020', 'July', NULL, NULL, NULL, NULL, NULL, NULL, '3000', NULL, NULL, NULL, NULL, NULL, '2020-10-15 23:16:46', '2020-10-15 23:16:46'),
(10, 2, 'Sorol', 2, 'Nikunjo Road 14', 1, 'Purbo Para', 'Dish Bill', 'Active', '488934983434', 'Monthly Fee', 2400, '2020-10-22', '2020', 'August', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2400', NULL, NULL, NULL, NULL, '2020-10-15 23:17:09', '2020-10-15 23:17:09'),
(11, 3, 'Ramcharan', 2, 'Nikunjo Road 14', 1, 'Purbo Para', 'Net Bill', 'Active', '48893498343477', 'Monthly Fee', 2500, '2020-10-13', '2020', 'September', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2500', NULL, NULL, NULL, '2020-10-15 23:17:34', '2020-10-15 23:17:34'),
(12, 2, 'Sorol', 2, 'Nikunjo Road 14', 1, 'Purbo Para', 'Dish Bill', 'Active', '488934983434', 'Monthly Fee', 5000, '2020-10-17', '2020', 'October', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5000', NULL, NULL, '2020-10-15 23:18:08', '2020-10-15 23:18:08'),
(13, 1, 'Sabbir', 1, 'Nikunjo Road 10', 3, 'Pocchim Para', 'Net Bill', 'Active', '488934983434', 'Monthly Fee', 10000, '2020-10-27', '2020', 'November', '', '', '', '', '', '', '', '', '', '', '10000', '', '2020-10-15 23:18:22', '2020-10-16 07:12:34'),
(14, 3, 'Ramcharan', 2, 'Nikunjo Road 14', 1, 'Purbo Para', 'Net Bill', 'Active', '48893498343477', 'Monthly Fee', 1234, '2020-10-16', '2020', 'November', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1234', NULL, '2020-10-16 07:48:05', '2020-10-16 07:49:42');

-- --------------------------------------------------------

--
-- Table structure for table `connections`
--

CREATE TABLE `connections` (
  `id` int(10) UNSIGNED NOT NULL,
  `zone_id` int(10) UNSIGNED NOT NULL,
  `zone_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subzone_id` int(11) DEFAULT NULL,
  `subzone_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prev_zone_id` int(11) DEFAULT NULL,
  `prev_zone_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prev_subzone_id` int(11) DEFAULT NULL,
  `prev_subzone_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `connection_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_tv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_mbps` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `connection_area_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `connections`
--

INSERT INTO `connections` (`id`, `zone_id`, `zone_name`, `subzone_id`, `subzone_name`, `prev_zone_id`, `prev_zone_name`, `prev_subzone_id`, `prev_subzone_name`, `connection_type`, `number_of_tv`, `number_of_mbps`, `user_name`, `full_name`, `user_mobile_number`, `user_email`, `connection_area_name`, `status`, `ip_address`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nikunjo Road 10', 3, 'Pocchim Para', NULL, NULL, NULL, NULL, 'Net Bill', NULL, '23', 'Sabbir', 'Sabbir hossain', '01839108551', 'sabbir@gmail.com', 'Khilket', 'Active', '488934983434', '2020-10-15 21:27:57', '2020-10-15 21:27:57'),
(2, 2, 'Nikunjo Road 14', 1, 'Purbo Para', NULL, NULL, NULL, NULL, 'Dish Bill', '34', NULL, 'Sorol', 'Ashikur Rahman Sorol', '01839108534', 'Sorol@gmail.com', 'Khilket', 'Active', '488934983434', '2020-10-15 21:28:19', '2020-10-15 21:28:19'),
(3, 2, 'Nikunjo Road 14', 1, 'Purbo Para', NULL, NULL, NULL, NULL, 'Net Bill', NULL, '244', 'Ramcharan', 'Ramcharan', '01839108534', 'Rahul@gmail.com', 'Khilket', 'Active', '48893498343477', '2020-10-15 22:51:39', '2020-10-15 22:51:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2020_09_24_110529_create_admins_table', 1),
(11, '2020_09_24_134142_create_connections_table', 1),
(12, '2020_09_24_160100_create_zones_table', 1),
(13, '2020_09_25_124211_create_bills_table', 1),
(14, '2020_09_29_104305_create_subzones_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subzones`
--

CREATE TABLE `subzones` (
  `id` int(10) UNSIGNED NOT NULL,
  `zone_id` int(11) NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subzone_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subzone_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `connection_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subzones`
--

INSERT INTO `subzones` (`id`, `zone_id`, `ip`, `subzone_name`, `subzone_code`, `connection_type`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, 'Purbo Para', 'PP-14', NULL, '2020-10-15 21:27:11', '2020-10-15 21:27:11'),
(2, 2, NULL, 'Purbo Para 01', 'PP-14', NULL, '2020-10-15 21:27:20', '2020-10-15 21:27:20'),
(3, 1, NULL, 'Pocchim Para', 'PP-11', NULL, '2020-10-15 21:27:28', '2020-10-15 21:27:28'),
(4, 1, NULL, 'Pocchim Para 01', 'PP-15', NULL, '2020-10-15 21:27:36', '2020-10-15 21:27:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$5.OU80bs6SX2RD8ia4p4U.LClKouoKHJQIiRNp.vQtlbZJ/JmIow2', NULL, '2020-10-15 21:09:47', '2020-10-15 21:09:47');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zone_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `connection_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `ip`, `zone_name`, `zone_code`, `connection_type`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Nikunjo Road 10', 'NR-10', NULL, '2020-10-15 21:26:55', '2020-10-15 21:26:55'),
(2, NULL, 'Nikunjo Road 14', 'NR-14', NULL, '2020-10-15 21:27:01', '2020-10-15 21:27:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `connections`
--
ALTER TABLE `connections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `subzones`
--
ALTER TABLE `subzones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `connections`
--
ALTER TABLE `connections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subzones`
--
ALTER TABLE `subzones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
