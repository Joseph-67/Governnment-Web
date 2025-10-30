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
-- Table structure for table `recp_innovation_areas`
--

DROP TABLE IF EXISTS `recp_innovation_areas`;
CREATE TABLE IF NOT EXISTS `recp_innovation_areas` (
  `innovationAreaID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `companyID` bigint UNSIGNED NOT NULL,
  `innovation_area_title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`innovationAreaID`),
  KEY `recp_innovation_areas_companyid_foreign` (`companyID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recp_innovation_areas`
--

INSERT INTO `recp_innovation_areas` (`innovationAreaID`, `companyID`, `innovation_area_title`, `status`, `created_at`, `updated_at`) VALUES
(1, 166, 'Biodegradable packing', 'active', '2025-07-28 13:56:48', '2025-07-28 13:56:48'),
(2, 166, 'Composite packing', 'active', '2025-07-28 13:57:06', '2025-07-28 13:57:06');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
