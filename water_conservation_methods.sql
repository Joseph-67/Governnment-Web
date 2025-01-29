-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 29, 2025 at 02:50 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

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
-- Table structure for table `water_conservation_methods`
--

DROP TABLE IF EXISTS `water_conservation_methods`;
CREATE TABLE IF NOT EXISTS `water_conservation_methods` (
  `WaterConservationMethodId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`WaterConservationMethodId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `water_conservation_methods`
--

INSERT INTO `water_conservation_methods` (`WaterConservationMethodId`, `label`, `method`, `status`, `created_at`, `updated_at`) VALUES
(1, 'serious_recycling_measure', 'Establishment of a serious recycling measure', 'active', NULL, NULL),
(2, 'rinsing_down_with_water', 'Floors or machinery before rinsing them down with water', 'active', NULL, NULL),
(3, 'clean_up', 'Dry clean-up method', 'active', NULL, NULL),
(4, 'equipments_to_control_water_consumption', 'Installation of self-closing taps and water meters to control water consumption', 'active', NULL, NULL),
(5, 'repair_of_broken_pipes', 'Timely identification and repair of broken pipes and leakages', 'active', NULL, NULL),
(6, 'avoidance_of_water_from_running_without_attention', 'Prevention of lose valvs or hoses from being left running without attention', 'active', NULL, NULL),
(7, 'automatic_shutoffs where necessary', 'The use of automatic shut offs/flow limits where necessary', 'active', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
