-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 04, 2025 at 12:56 PM
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
-- Table structure for table `recp_areas_of_improvements`
--

DROP TABLE IF EXISTS `recp_areas_of_improvements`;
CREATE TABLE IF NOT EXISTS `recp_areas_of_improvements` (
  `improvementAreaID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `companyID` bigint UNSIGNED NOT NULL,
  `area_title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`improvementAreaID`),
  KEY `recp_areas_of_improvements_companyid_foreign` (`companyID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recp_areas_of_improvements`
--

INSERT INTO `recp_areas_of_improvements` (`improvementAreaID`, `companyID`, `area_title`, `status`, `created_at`, `updated_at`) VALUES
(1, 161, 'Basic Maintenance', 'active', '2025-07-16 13:34:36', '2025-07-16 13:34:36'),
(2, 161, 'Understanding oil change', 'active', '2025-07-16 13:34:54', '2025-07-16 13:34:54'),
(3, 166, 'Equipment operation and maintenance training', 'active', '2025-07-28 13:55:19', '2025-07-28 13:55:19'),
(4, 166, 'Quality control and safety standard', 'active', '2025-07-28 13:55:49', '2025-07-28 13:55:49');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
