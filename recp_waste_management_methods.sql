-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 04, 2025 at 12:58 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `governmentapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `recp_waste_management_methods`
--

DROP TABLE IF EXISTS `recp_waste_management_methods`;
CREATE TABLE IF NOT EXISTS `recp_waste_management_methods` (
  `wasteManagementID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `companyID` bigint UNSIGNED NOT NULL,
  `management_method_title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`wasteManagementID`),
  KEY `recp_waste_management_methods_companyid_foreign` (`companyID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recp_waste_management_methods`
--

INSERT INTO `recp_waste_management_methods` (`wasteManagementID`, `companyID`, `management_method_title`, `status`, `created_at`, `updated_at`) VALUES
(1, 161, 'Recycling', 'active', '2025-07-16 13:31:58', '2025-07-16 13:31:58'),
(2, 162, 'Recycling', 'active', '2025-07-17 12:27:39', '2025-07-17 12:27:39'),
(3, 162, 'Waste segregation', 'active', '2025-07-17 12:27:41', '2025-07-17 12:27:41'),
(4, 163, 'Recycling', 'active', '2025-07-17 12:54:17', '2025-07-17 12:54:17'),
(5, 164, 'Incineration', 'active', '2025-07-28 12:43:53', '2025-07-28 12:43:53'),
(6, 165, 'Waste segregation', 'active', '2025-07-28 13:35:49', '2025-07-28 13:35:49'),
(7, 166, 'Incineration', 'active', '2025-07-28 14:00:23', '2025-07-28 14:00:23'),
(8, 166, 'Waste segregation', 'active', '2025-07-28 14:00:26', '2025-07-28 14:00:26'),
(9, 167, 'Landfill', 'active', '2025-07-28 15:35:33', '2025-07-28 15:35:33'),
(10, 167, 'Waste segregation', 'active', '2025-07-28 15:35:37', '2025-07-28 15:35:37');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
