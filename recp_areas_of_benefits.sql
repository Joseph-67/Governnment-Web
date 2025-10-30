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
-- Table structure for table `recp_areas_of_benefits`
--

DROP TABLE IF EXISTS `recp_areas_of_benefits`;
CREATE TABLE IF NOT EXISTS `recp_areas_of_benefits` (
  `areaBenefitID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `companyID` bigint UNSIGNED NOT NULL,
  `benefit_title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`areaBenefitID`),
  KEY `recp_areas_of_benefits_companyid_foreign` (`companyID`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recp_areas_of_benefits`
--

INSERT INTO `recp_areas_of_benefits` (`areaBenefitID`, `companyID`, `benefit_title`, `status`, `created_at`, `updated_at`) VALUES
(1, 161, 'To deliver impactful training on Resource Efficient and Cleaner Production (RECP), including comprehensive support materials, toolkits, and learning resources, tailored for staff and employees across Nigeria\'s industrial manufacturing sector.', 'active', '2025-07-16 13:36:13', '2025-07-16 13:36:13'),
(2, 161, 'To deliver the cost-saving benefits of RECP to your industrial manufacturing sector by facilitating greater access to financial mechanisms—both commercial and government—to support the financing of RECP projects.', 'active', '2025-07-16 13:36:23', '2025-07-16 13:36:23'),
(3, 161, 'To enhance the adoption of RECP practices and associated investments by providing a targeted financial assistance package for companies participating in RECP pilot programs.', 'active', '2025-07-16 13:36:32', '2025-07-16 13:36:32'),
(4, 162, 'To deliver impactful training on Resource Efficient and Cleaner Production (RECP), including comprehensive support materials, toolkits, and learning resources, tailored for staff and employees across Nigeria\'s industrial manufacturing sector.', 'active', '2025-07-17 12:20:40', '2025-07-17 12:20:40'),
(5, 162, 'To raise awareness and implement pilot programs on RECP, aimed at enhancing productivity through efficient use of manufacturing inputs (water, chemicals, and materials), minimizing waste and emissions, and promoting regulatory compliance while boosting competitiveness within your industrial sector.', 'active', '2025-07-17 12:20:50', '2025-07-17 12:20:50'),
(6, 162, 'To enhance the adoption of RECP practices and associated investments by providing a targeted financial assistance package for companies participating in RECP pilot programs.', 'active', '2025-07-17 12:21:02', '2025-07-17 12:21:02'),
(7, 163, 'To deliver impactful training on Resource Efficient and Cleaner Production (RECP), including comprehensive support materials, toolkits, and learning resources, tailored for staff and employees across Nigeria\'s industrial manufacturing sector.', 'active', '2025-07-17 12:49:12', '2025-07-17 12:49:12'),
(8, 163, 'To strengthen the internal capacity for delivering RECP training and related technical assistance to your enterprise, ensuring long-term impact and achieving commercially sustainable outcomes.', 'active', '2025-07-17 12:49:17', '2025-07-17 12:49:17'),
(9, 163, 'To raise awareness and implement pilot programs on RECP, aimed at enhancing productivity through efficient use of manufacturing inputs (water, chemicals, and materials), minimizing waste and emissions, and promoting regulatory compliance while boosting competitiveness within your industrial sector.', 'active', '2025-07-17 12:49:28', '2025-07-17 12:49:28'),
(10, 163, 'To enhance the adoption of RECP practices and associated investments by providing a targeted financial assistance package for companies participating in RECP pilot programs.', 'active', '2025-07-17 12:49:37', '2025-07-17 12:49:37'),
(11, 163, 'To deliver the cost-saving benefits of RECP to your industrial manufacturing sector by facilitating greater access to financial mechanisms—both commercial and government—to support the financing of RECP projects.', 'active', '2025-07-17 12:49:39', '2025-07-17 12:49:39'),
(12, 164, 'Develop policy and regulation that deliver economic, human and environmental health gain to your company.', 'active', '2025-07-28 12:40:07', '2025-07-28 12:40:07'),
(13, 164, 'To offer standard accreditation and certification capacity building on ISO 15000 and 14000 series to your enterprise.', 'active', '2025-07-28 12:40:12', '2025-07-28 12:40:12'),
(14, 164, 'To deliver impactful training on Resource Efficient and Cleaner Production (RECP), including comprehensive support materials, toolkits, and learning resources, tailored for staff and employees across Nigeria\'s industrial manufacturing sector.', 'active', '2025-07-28 12:40:13', '2025-07-28 12:40:13'),
(15, 164, 'To strengthen the internal capacity for delivering RECP training and related technical assistance to your enterprise, ensuring long-term impact and achieving commercially sustainable outcomes.', 'active', '2025-07-28 12:40:15', '2025-07-28 12:40:15'),
(16, 164, 'To raise awareness and implement pilot programs on RECP, aimed at enhancing productivity through efficient use of manufacturing inputs (water, chemicals, and materials), minimizing waste and emissions, and promoting regulatory compliance while boosting competitiveness within your industrial sector.', 'active', '2025-07-28 12:40:25', '2025-07-28 12:40:25'),
(17, 164, 'To enhance the adoption of RECP practices and associated investments by providing a targeted financial assistance package for companies participating in RECP pilot programs.', 'active', '2025-07-28 12:40:26', '2025-07-28 12:40:26'),
(18, 164, 'To deliver the cost-saving benefits of RECP to your industrial manufacturing sector by facilitating greater access to financial mechanisms—both commercial and government—to support the financing of RECP projects.', 'active', '2025-07-28 12:40:30', '2025-07-28 12:40:30'),
(19, 165, 'Develop policy and regulation that deliver economic, human and environmental health gain to your company.', 'active', '2025-07-28 13:31:44', '2025-07-28 13:31:44'),
(20, 165, 'To offer standard accreditation and certification capacity building on ISO 15000 and 14000 series to your enterprise.', 'active', '2025-07-28 13:31:46', '2025-07-28 13:31:46'),
(21, 165, 'To deliver impactful training on Resource Efficient and Cleaner Production (RECP), including comprehensive support materials, toolkits, and learning resources, tailored for staff and employees across Nigeria\'s industrial manufacturing sector.', 'active', '2025-07-28 13:31:48', '2025-07-28 13:31:48'),
(22, 165, 'To strengthen the internal capacity for delivering RECP training and related technical assistance to your enterprise, ensuring long-term impact and achieving commercially sustainable outcomes.', 'active', '2025-07-28 13:31:51', '2025-07-28 13:31:51'),
(23, 165, 'To raise awareness and implement pilot programs on RECP, aimed at enhancing productivity through efficient use of manufacturing inputs (water, chemicals, and materials), minimizing waste and emissions, and promoting regulatory compliance while boosting competitiveness within your industrial sector.', 'active', '2025-07-28 13:31:52', '2025-07-28 13:31:52'),
(24, 165, 'To enhance the adoption of RECP practices and associated investments by providing a targeted financial assistance package for companies participating in RECP pilot programs.', 'active', '2025-07-28 13:31:53', '2025-07-28 13:31:53'),
(25, 165, 'To deliver the cost-saving benefits of RECP to your industrial manufacturing sector by facilitating greater access to financial mechanisms—both commercial and government—to support the financing of RECP projects.', 'active', '2025-07-28 13:31:56', '2025-07-28 13:31:56'),
(26, 166, 'To deliver impactful training on Resource Efficient and Cleaner Production (RECP), including comprehensive support materials, toolkits, and learning resources, tailored for staff and employees across Nigeria\'s industrial manufacturing sector.', 'active', '2025-07-28 13:52:37', '2025-07-28 13:52:37'),
(27, 166, 'To strengthen the internal capacity for delivering RECP training and related technical assistance to your enterprise, ensuring long-term impact and achieving commercially sustainable outcomes.', 'active', '2025-07-28 13:52:49', '2025-07-28 13:52:49'),
(28, 166, 'To raise awareness and implement pilot programs on RECP, aimed at enhancing productivity through efficient use of manufacturing inputs (water, chemicals, and materials), minimizing waste and emissions, and promoting regulatory compliance while boosting competitiveness within your industrial sector.', 'active', '2025-07-28 13:52:52', '2025-07-28 13:52:52'),
(29, 166, 'To enhance the adoption of RECP practices and associated investments by providing a targeted financial assistance package for companies participating in RECP pilot programs.', 'active', '2025-07-28 13:52:55', '2025-07-28 13:52:55'),
(30, 167, 'To deliver impactful training on Resource Efficient and Cleaner Production (RECP), including comprehensive support materials, toolkits, and learning resources, tailored for staff and employees across Nigeria\'s industrial manufacturing sector.', 'active', '2025-07-28 14:56:00', '2025-07-28 14:56:00'),
(31, 167, 'Develop policy and regulation that deliver economic, human and environmental health gain to your company.', 'active', '2025-07-28 14:56:02', '2025-07-28 14:56:02'),
(32, 167, 'To strengthen the internal capacity for delivering RECP training and related technical assistance to your enterprise, ensuring long-term impact and achieving commercially sustainable outcomes.', 'active', '2025-07-28 14:56:03', '2025-07-28 14:56:03'),
(33, 167, 'To raise awareness and implement pilot programs on RECP, aimed at enhancing productivity through efficient use of manufacturing inputs (water, chemicals, and materials), minimizing waste and emissions, and promoting regulatory compliance while boosting competitiveness within your industrial sector.', 'active', '2025-07-28 14:56:04', '2025-07-28 14:56:04'),
(34, 167, 'To enhance the adoption of RECP practices and associated investments by providing a targeted financial assistance package for companies participating in RECP pilot programs.', 'active', '2025-07-28 14:56:05', '2025-07-28 14:56:05'),
(35, 167, 'To deliver the cost-saving benefits of RECP to your industrial manufacturing sector by facilitating greater access to financial mechanisms—both commercial and government—to support the financing of RECP projects.', 'active', '2025-07-28 14:56:08', '2025-07-28 14:56:08');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
