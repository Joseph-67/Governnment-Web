-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 04, 2025 at 12:57 PM
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
-- Table structure for table `recp_human_and_environmental_health_benefits`
--

DROP TABLE IF EXISTS `recp_human_and_environmental_health_benefits`;
CREATE TABLE IF NOT EXISTS `recp_human_and_environmental_health_benefits` (
  `enviromentalBenefitID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `companyID` bigint UNSIGNED NOT NULL,
  `environmental_benefit_title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`enviromentalBenefitID`),
  KEY `recp_human_and_environmental_health_benefits_companyid_foreign` (`companyID`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recp_human_and_environmental_health_benefits`
--

INSERT INTO `recp_human_and_environmental_health_benefits` (`enviromentalBenefitID`, `companyID`, `environmental_benefit_title`, `status`, `created_at`, `updated_at`) VALUES
(1, 161, 'Achieve a 40% reduction in CO2 emissions within 18 months.', 'active', '2025-07-16 13:35:20', '2025-07-16 13:35:20'),
(2, 161, 'Achieve a minimum 20% reduction in energy consumption within one year.', 'active', '2025-07-16 13:35:26', '2025-07-16 13:35:26'),
(3, 161, 'Achieve a 50% increase in overall material productivity within one year.', 'active', '2025-07-16 13:35:34', '2025-07-16 13:35:34'),
(4, 162, 'Achieve a minimum 20% reduction in energy consumption within one year.', 'active', '2025-07-17 12:22:07', '2025-07-17 12:22:07'),
(5, 162, 'Achieve a 40% reduction in CO2 emissions within 18 months.', 'active', '2025-07-17 12:22:10', '2025-07-17 12:22:10'),
(6, 162, 'Enhance customer satisfaction through improved products, services, and overall experience.', 'active', '2025-07-17 12:22:25', '2025-07-17 12:22:25'),
(7, 162, 'Attain ISO 14000 certification to demonstrate your commitment to effective environmental management and sustainability practices.', 'active', '2025-07-17 12:22:33', '2025-07-17 12:22:33'),
(8, 162, 'Achieve a 50% increase in overall material productivity within one year.', 'active', '2025-07-17 12:22:37', '2025-07-17 12:22:37'),
(9, 162, 'Double your water productivity within one year.', 'active', '2025-07-17 12:22:40', '2025-07-17 12:22:40'),
(10, 163, 'Achieve a minimum 20% reduction in energy consumption within one year.', 'active', '2025-07-17 12:51:08', '2025-07-17 12:51:08'),
(11, 163, 'Achieve a 40% reduction in CO2 emissions within 18 months.', 'active', '2025-07-17 12:51:09', '2025-07-17 12:51:09'),
(12, 163, 'Double your water productivity within one year.', 'active', '2025-07-17 12:51:22', '2025-07-17 12:51:22'),
(13, 163, 'Achieve a 50% increase in overall material productivity within one year.', 'active', '2025-07-17 12:51:55', '2025-07-17 12:51:55'),
(14, 163, 'Enhance customer satisfaction through improved products, services, and overall experience.', 'active', '2025-07-17 12:52:23', '2025-07-17 12:52:23'),
(15, 164, 'Attain ISO 14000 certification to demonstrate your commitment to effective environmental management and sustainability practices.', 'active', '2025-07-28 12:37:32', '2025-07-28 12:37:32'),
(16, 164, 'Achieve a 50% increase in overall material productivity within one year.', 'active', '2025-07-28 12:37:32', '2025-07-28 12:37:32'),
(17, 164, 'Achieve a minimum 20% reduction in energy consumption within one year.', 'active', '2025-07-28 12:40:01', '2025-07-28 12:40:01'),
(18, 164, 'Achieve ISO 15000 series certification to demonstrate adherence to international standards for information and communication technology management.', 'active', '2025-07-28 12:40:44', '2025-07-28 12:40:44'),
(19, 164, 'Enhance customer satisfaction through improved products, services, and overall experience.', 'active', '2025-07-28 12:40:47', '2025-07-28 12:40:47'),
(20, 164, 'Achieve an increase in overall annual financial savings.', 'active', '2025-07-28 12:40:48', '2025-07-28 12:40:48'),
(22, 165, 'Achieve a minimum 20% reduction in energy consumption within one year.', 'active', '2025-07-28 13:33:37', '2025-07-28 13:33:37'),
(23, 165, 'Achieve a 40% reduction in CO2 emissions within 18 months.', 'active', '2025-07-28 13:33:39', '2025-07-28 13:33:39'),
(24, 165, 'Double your water productivity within one year.', 'active', '2025-07-28 13:33:42', '2025-07-28 13:33:42'),
(25, 165, 'Achieve a 50% increase in overall material productivity within one year.', 'active', '2025-07-28 13:33:43', '2025-07-28 13:33:43'),
(26, 165, 'Achieve an increase in overall annual financial savings.', 'active', '2025-07-28 13:33:51', '2025-07-28 13:33:51'),
(27, 165, 'Enhance customer satisfaction through improved products, services, and overall experience.', 'active', '2025-07-28 13:33:52', '2025-07-28 13:33:52'),
(28, 166, 'Achieve a minimum 20% reduction in energy consumption within one year.', 'active', '2025-07-28 13:53:40', '2025-07-28 13:53:40'),
(29, 166, 'Double your water productivity within one year.', 'active', '2025-07-28 13:53:52', '2025-07-28 13:53:52'),
(30, 166, 'Achieve a 50% increase in overall material productivity within one year.', 'active', '2025-07-28 13:53:57', '2025-07-28 13:53:57'),
(31, 167, 'Achieve a minimum 20% reduction in energy consumption within one year.', 'active', '2025-07-28 14:57:21', '2025-07-28 14:57:21'),
(32, 167, 'Achieve a 40% reduction in CO2 emissions within 18 months.', 'active', '2025-07-28 14:57:25', '2025-07-28 14:57:25'),
(33, 167, 'Double your water productivity within one year.', 'active', '2025-07-28 14:57:34', '2025-07-28 14:57:34'),
(35, 167, 'Achieve a 50% increase in overall material productivity within one year.', 'active', '2025-07-28 14:57:45', '2025-07-28 14:57:45'),
(36, 167, 'Enhance customer satisfaction through improved products, services, and overall experience.', 'active', '2025-07-28 14:57:58', '2025-07-28 14:57:58'),
(37, 167, 'Achieve an increase in overall annual financial savings.', 'active', '2025-07-28 14:58:03', '2025-07-28 14:58:03');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
