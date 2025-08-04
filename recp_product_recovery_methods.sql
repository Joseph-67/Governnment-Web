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
-- Table structure for table `recp_product_recovery_methods`
--

DROP TABLE IF EXISTS `recp_product_recovery_methods`;
CREATE TABLE IF NOT EXISTS `recp_product_recovery_methods` (
  `productRecoveryID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `companyID` bigint UNSIGNED NOT NULL,
  `recovery_method_title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`productRecoveryID`),
  KEY `recp_product_recovery_methods_companyid_foreign` (`companyID`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recp_product_recovery_methods`
--

INSERT INTO `recp_product_recovery_methods` (`productRecoveryID`, `companyID`, `recovery_method_title`, `status`, `created_at`, `updated_at`) VALUES
(2, 161, 'Using correct material ratio', 'active', '2025-07-16 13:32:17', '2025-07-16 13:32:17'),
(3, 161, 'Using standard measuring equipment', 'active', '2025-07-16 13:32:26', '2025-07-16 13:32:26'),
(4, 161, 'Recycling', 'active', '2025-07-16 13:32:29', '2025-07-16 13:32:29'),
(5, 162, 'High temperature recovery method', 'active', '2025-07-17 12:27:54', '2025-07-17 12:27:54'),
(6, 162, 'Recycling', 'active', '2025-07-17 12:27:58', '2025-07-17 12:27:58'),
(7, 162, 'Filtration', 'active', '2025-07-17 12:28:02', '2025-07-17 12:28:02'),
(8, 162, 'Extended Producer Responsibility(EPR)', 'active', '2025-07-17 12:28:07', '2025-07-17 12:28:07'),
(9, 163, 'Using correct material ratio', 'active', '2025-07-17 12:54:30', '2025-07-17 12:54:30'),
(10, 163, 'Using standard measuring equipment', 'active', '2025-07-17 12:54:35', '2025-07-17 12:54:35'),
(11, 163, 'Adequate chemical/ material storage facility', 'active', '2025-07-17 12:54:43', '2025-07-17 12:54:43'),
(12, 163, 'Adequate container seal to prevent spill', 'active', '2025-07-17 12:54:48', '2025-07-17 12:54:48'),
(13, 163, 'Recycling', 'active', '2025-07-17 12:54:51', '2025-07-17 12:54:51'),
(14, 163, 'Filtration', 'active', '2025-07-17 12:54:55', '2025-07-17 12:54:55'),
(15, 163, 'Extended Producer Responsibility(EPR)', 'active', '2025-07-17 12:54:57', '2025-07-17 12:54:57'),
(16, 164, 'High temperature recovery method', 'active', '2025-07-28 12:44:01', '2025-07-28 12:44:01'),
(17, 164, 'Using correct material ratio', 'active', '2025-07-28 12:44:05', '2025-07-28 12:44:05'),
(18, 164, 'Using standard measuring equipment', 'active', '2025-07-28 12:44:09', '2025-07-28 12:44:09'),
(19, 164, 'Adequate chemical/ material storage facility', 'active', '2025-07-28 12:44:15', '2025-07-28 12:44:15'),
(20, 164, 'Adequate container seal to prevent spill', 'active', '2025-07-28 12:44:19', '2025-07-28 12:44:19'),
(21, 164, 'Filtration', 'active', '2025-07-28 12:44:24', '2025-07-28 12:44:24'),
(22, 165, 'Using standard measuring equipment', 'active', '2025-07-28 13:36:07', '2025-07-28 13:36:07'),
(23, 165, 'Adequate chemical/ material storage facility', 'active', '2025-07-28 13:36:10', '2025-07-28 13:36:10'),
(24, 165, 'Adequate container seal to prevent spill', 'active', '2025-07-28 13:36:14', '2025-07-28 13:36:14'),
(25, 165, 'Extended Producer Responsibility(EPR)', 'active', '2025-07-28 13:36:17', '2025-07-28 13:36:17'),
(26, 167, 'Using correct material ratio', 'active', '2025-07-28 15:35:45', '2025-07-28 15:35:45'),
(27, 167, 'Using standard measuring equipment', 'active', '2025-07-28 15:35:51', '2025-07-28 15:35:51'),
(28, 167, 'Adequate chemical/ material storage facility', 'active', '2025-07-28 15:35:58', '2025-07-28 15:35:58'),
(29, 167, 'Adequate container seal to prevent spill', 'active', '2025-07-28 15:36:02', '2025-07-28 15:36:02'),
(30, 167, 'Recycling', 'active', '2025-07-28 15:36:07', '2025-07-28 15:36:07'),
(31, 167, 'Filtration', 'active', '2025-07-28 15:36:11', '2025-07-28 15:36:11'),
(32, 167, 'Extended Producer Responsibility(EPR)', 'active', '2025-07-28 15:36:14', '2025-07-28 15:36:14');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
