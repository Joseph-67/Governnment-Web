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
-- Table structure for table `recp_unit_of_processes`
--

DROP TABLE IF EXISTS `recp_unit_of_processes`;
CREATE TABLE IF NOT EXISTS `recp_unit_of_processes` (
  `unitProcessID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `companyID` bigint UNSIGNED NOT NULL,
  `unit_process_title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`unitProcessID`),
  KEY `recp_unit_of_processes_companyid_foreign` (`companyID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recp_unit_of_processes`
--

INSERT INTO `recp_unit_of_processes` (`unitProcessID`, `companyID`, `unit_process_title`, `status`, `created_at`, `updated_at`) VALUES
(1, 161, 'Pillow system', 'active', '2025-07-16 13:29:24', '2025-07-16 13:29:24'),
(2, 161, 'Cool-up system', 'active', '2025-07-16 13:29:52', '2025-07-16 13:29:52'),
(3, 167, 'Boiler', 'active', '2025-07-28 14:59:11', '2025-07-28 14:59:11'),
(4, 167, 'ETP', 'active', '2025-07-28 15:33:03', '2025-07-28 15:33:03');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
