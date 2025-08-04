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
-- Table structure for table `recp_waste_reduction_measures`
--

DROP TABLE IF EXISTS `recp_waste_reduction_measures`;
CREATE TABLE IF NOT EXISTS `recp_waste_reduction_measures` (
  `wasteReductionID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `companyID` bigint UNSIGNED NOT NULL,
  `waste_reduction_title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`wasteReductionID`),
  KEY `recp_waste_reduction_measures_companyid_foreign` (`companyID`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recp_waste_reduction_measures`
--

INSERT INTO `recp_waste_reduction_measures` (`wasteReductionID`, `companyID`, `waste_reduction_title`, `status`, `created_at`, `updated_at`) VALUES
(1, 161, 'Using production equipment or technology that supports energy/resource-efficient production.', 'active', '2025-07-16 13:31:15', '2025-07-16 13:31:15'),
(2, 161, 'Recording of fuel usage.', 'active', '2025-07-16 13:31:23', '2025-07-16 13:31:23'),
(3, 161, 'Maintain the unit process/equipment to minimize emission of pollutants.', 'active', '2025-07-16 13:31:29', '2025-07-16 13:31:29'),
(4, 161, 'Plant flowers and trees around the premises to reduce large number of pollutants in the air.', 'active', '2025-07-16 13:31:33', '2025-07-16 13:31:33'),
(5, 162, 'Water recycling flow.', 'active', '2025-07-17 12:25:27', '2025-07-17 12:25:27'),
(7, 162, 'Waste water treatment.', 'active', '2025-07-17 12:25:36', '2025-07-17 12:25:36'),
(8, 162, 'Monitoring of the quality and quantity of waste water.', 'active', '2025-07-17 12:25:45', '2025-07-17 12:25:45'),
(9, 162, 'Use of enviromentally friendly/renewable energy.', 'active', '2025-07-17 12:26:16', '2025-07-17 12:26:16'),
(10, 162, 'Substitute high yield pollutant raw materials with other less polluting materials.', 'active', '2025-07-17 12:26:25', '2025-07-17 12:26:25'),
(11, 162, 'Maintain the unit process/equipment to minimize emission of pollutants.', 'active', '2025-07-17 12:26:31', '2025-07-17 12:26:31'),
(12, 162, 'Plant flowers and trees around the premises to reduce large number of pollutants in the air.', 'active', '2025-07-17 12:26:38', '2025-07-17 12:26:38'),
(13, 162, 'Use of waste for internal energy sources.', 'active', '2025-07-17 12:27:02', '2025-07-17 12:27:02'),
(14, 163, 'Water recycling flow.', 'active', '2025-07-17 12:53:48', '2025-07-17 12:53:48'),
(15, 163, 'Monitoring of the quality and quantity of waste water.', 'active', '2025-07-17 12:53:53', '2025-07-17 12:53:53'),
(16, 163, 'Recording of fuel usage.', 'active', '2025-07-17 12:54:02', '2025-07-17 12:54:02'),
(17, 163, 'Plant flowers and trees around the premises to reduce large number of pollutants in the air.', 'active', '2025-07-17 12:54:07', '2025-07-17 12:54:07'),
(18, 164, 'Utilization of sunlight for daytime lighting.', 'active', '2025-07-28 12:43:06', '2025-07-28 12:43:06'),
(19, 164, 'Use of enviromentally friendly/renewable energy.', 'active', '2025-07-28 12:43:11', '2025-07-28 12:43:11'),
(20, 164, 'Recording of fuel usage.', 'active', '2025-07-28 12:43:17', '2025-07-28 12:43:17'),
(21, 164, 'Maintain the unit process/equipment to minimize emission of pollutants.', 'active', '2025-07-28 12:43:29', '2025-07-28 12:43:29'),
(22, 164, 'Plant flowers and trees around the premises to reduce large number of pollutants in the air.', 'active', '2025-07-28 12:43:32', '2025-07-28 12:43:32'),
(23, 165, 'Using production equipment or technology that supports energy/resource-efficient production.', 'active', '2025-07-28 13:35:10', '2025-07-28 13:35:10'),
(24, 165, 'Installation of lighting sensor.', 'active', '2025-07-28 13:35:16', '2025-07-28 13:35:16'),
(25, 165, 'Recording of fuel usage.', 'active', '2025-07-28 13:35:22', '2025-07-28 13:35:22'),
(26, 165, 'Minimize the use of generating sets.', 'active', '2025-07-28 13:35:27', '2025-07-28 13:35:27'),
(27, 165, 'Fuel substituting(petrol and diesel can be replaced with compressed natural gas, solar and wind energy).', 'active', '2025-07-28 13:35:30', '2025-07-28 13:35:30'),
(28, 166, 'Recording of fuel usage.', 'active', '2025-07-28 13:59:30', '2025-07-28 13:59:30'),
(29, 166, 'Minimize the use of generating sets.', 'active', '2025-07-28 13:59:35', '2025-07-28 13:59:35'),
(30, 166, 'Maintain the unit process/equipment to minimize emission of pollutants.', 'active', '2025-07-28 13:59:41', '2025-07-28 13:59:41'),
(31, 166, 'Plant flowers and trees around the premises to reduce large number of pollutants in the air.', 'active', '2025-07-28 13:59:45', '2025-07-28 13:59:45'),
(32, 166, 'Fuel substituting(petrol and diesel can be replaced with compressed natural gas, solar and wind energy).', 'active', '2025-07-28 13:59:48', '2025-07-28 13:59:48'),
(33, 167, 'Water recycling flow.', 'active', '2025-07-28 15:34:44', '2025-07-28 15:34:44'),
(34, 167, 'Waste water treatment.', 'active', '2025-07-28 15:34:48', '2025-07-28 15:34:48'),
(35, 167, 'Monitoring of the quality and quantity of waste water.', 'active', '2025-07-28 15:34:53', '2025-07-28 15:34:53'),
(36, 167, 'Installation of lighting sensor.', 'active', '2025-07-28 15:35:02', '2025-07-28 15:35:02'),
(37, 167, 'Recording of fuel usage.', 'active', '2025-07-28 15:35:06', '2025-07-28 15:35:06'),
(38, 167, 'Minimize the use of generating sets.', 'active', '2025-07-28 15:35:12', '2025-07-28 15:35:12'),
(39, 167, 'Substitute high yield pollutant raw materials with other less polluting materials.', 'active', '2025-07-28 15:35:17', '2025-07-28 15:35:17'),
(40, 167, 'Plant flowers and trees around the premises to reduce large number of pollutants in the air.', 'active', '2025-07-28 15:35:22', '2025-07-28 15:35:22');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
