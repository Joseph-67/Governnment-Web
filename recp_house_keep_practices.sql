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
-- Table structure for table `recp_house_keep_practices`
--

DROP TABLE IF EXISTS `recp_house_keep_practices`;
CREATE TABLE IF NOT EXISTS `recp_house_keep_practices` (
  `houseKeepingID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `companyID` bigint UNSIGNED NOT NULL,
  `practice_title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`houseKeepingID`),
  KEY `recp_house_keep_practices_companyid_foreign` (`companyID`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recp_house_keep_practices`
--

INSERT INTO `recp_house_keep_practices` (`houseKeepingID`, `companyID`, `practice_title`, `status`, `created_at`, `updated_at`) VALUES
(1, 161, 'Attitudinal change (negligence attitude).', 'active', '2025-07-16 13:30:44', '2025-07-16 13:30:44'),
(2, 161, 'Good operating practices(personel practices, waste segregation etc.).', 'active', '2025-07-16 13:30:52', '2025-07-16 13:30:52'),
(3, 162, 'Improved workplace management.', 'active', '2025-07-17 12:23:10', '2025-07-17 12:23:10'),
(4, 162, 'Good operating practices(personel practices, waste segregation etc.).', 'active', '2025-07-17 12:23:13', '2025-07-17 12:23:13'),
(5, 162, 'Workers motivation.', 'active', '2025-07-17 12:23:14', '2025-07-17 12:23:14'),
(6, 163, 'Improved workplace management.', 'active', '2025-07-17 12:52:52', '2025-07-17 12:52:52'),
(7, 163, 'Workers motivation.', 'active', '2025-07-17 12:52:56', '2025-07-17 12:52:56'),
(8, 163, 'Good operating practices(personel practices, waste segregation etc.).', 'active', '2025-07-17 12:53:08', '2025-07-17 12:53:08'),
(9, 164, 'Attitudinal change (negligence attitude).', 'active', '2025-07-28 12:41:36', '2025-07-28 12:41:36'),
(10, 164, 'Good operating practices(personel practices, waste segregation etc.).', 'active', '2025-07-28 12:41:43', '2025-07-28 12:41:43'),
(11, 164, 'Workers motivation.', 'active', '2025-07-28 12:41:44', '2025-07-28 12:41:44'),
(12, 164, 'Improved workplace management.', 'active', '2025-07-28 12:41:48', '2025-07-28 12:41:48'),
(13, 165, 'Improved workplace management.', 'active', '2025-07-28 13:34:27', '2025-07-28 13:34:27'),
(14, 165, 'Good operating practices(personel practices, waste segregation etc.).', 'active', '2025-07-28 13:34:31', '2025-07-28 13:34:31'),
(15, 165, 'Workers motivation.', 'active', '2025-07-28 13:34:33', '2025-07-28 13:34:33'),
(16, 167, 'Improved workplace management.', 'active', '2025-07-28 14:58:16', '2025-07-28 14:58:16'),
(17, 167, 'Good operating practices(personel practices, waste segregation etc.).', 'active', '2025-07-28 14:58:20', '2025-07-28 14:58:20'),
(18, 167, 'Workers motivation.', 'active', '2025-07-28 14:58:25', '2025-07-28 14:58:25');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
