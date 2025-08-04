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
-- Table structure for table `recp_problem_and_solutions`
--

DROP TABLE IF EXISTS `recp_problem_and_solutions`;
CREATE TABLE IF NOT EXISTS `recp_problem_and_solutions` (
  `problemSolutionID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `companyID` bigint UNSIGNED NOT NULL,
  `problem_title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `solution_title` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`problemSolutionID`),
  KEY `recp_problem_and_solutions_companyid_foreign` (`companyID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recp_problem_and_solutions`
--

INSERT INTO `recp_problem_and_solutions` (`problemSolutionID`, `companyID`, `problem_title`, `solution_title`, `status`, `created_at`, `updated_at`) VALUES
(2, 167, 'High diesel use of boiler', NULL, 'active', '2025-07-28 15:31:29', '2025-07-28 15:31:51'),
(3, 167, 'High energy consumption of ETP equipment', NULL, 'active', '2025-07-28 15:32:44', '2025-07-28 15:32:44');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
