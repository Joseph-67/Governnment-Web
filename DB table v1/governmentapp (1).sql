-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 01, 2025 at 07:39 AM
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
-- Table structure for table `activities`
--

DROP TABLE IF EXISTS `activities`;
CREATE TABLE IF NOT EXISTS `activities` (
  `ActivityID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `LogID` bigint UNSIGNED NOT NULL,
  `ActivityName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OperationTypeId` bigint UNSIGNED NOT NULL,
  `ActivityStartDate` date NOT NULL,
  `ActivityEndDate` date NOT NULL,
  `Objective` text COLLATE utf8mb4_unicode_ci,
  `Description` text COLLATE utf8mb4_unicode_ci,
  `MaterialUsage` json DEFAULT NULL,
  `ChemicalUsage` json DEFAULT NULL,
  `WaterUsage` decimal(12,2) DEFAULT NULL,
  `EnergyUsage` decimal(12,2) DEFAULT NULL,
  `WasteGenerated` json DEFAULT NULL,
  `Priority` enum('Low','Medium','High') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Medium',
  `Status` enum('Pending','In Progress','Completed','Cancelled') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ResponsiblePerson` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SuccessCriteria` text COLLATE utf8mb4_unicode_ci,
  `Tags` json DEFAULT NULL,
  `ExternalReference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ActivityID`),
  KEY `activities_logid_foreign` (`LogID`),
  KEY `activities_operationtypeid_foreign` (`OperationTypeId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `add-posts`
--

DROP TABLE IF EXISTS `add-posts`;
CREATE TABLE IF NOT EXISTS `add-posts` (
  `posts_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`posts_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `add_events`
--

DROP TABLE IF EXISTS `add_events`;
CREATE TABLE IF NOT EXISTS `add_events` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`),
  KEY `admins_current_team_id_foreign` (`current_team_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `other_name`, `email`, `email_verified_at`, `last_login_at`, `password`, `mobile_number`, `remember_token`, `current_team_id`, `profile_photo_path`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Joseph', 'Atuma', NULL, 'carteratuma@gmail.com', NULL, '2025-09-29 01:28:26', '$2y$10$dwBZqr/KFKcLmVbyMA9XKuioeNU541Kbko1/Q/SiWMB6laxRS044G', '09078600016', 'i1AbAz7udo0D2jRej0zC71XCeTCByHP1t8HfcyB8Tvaci5ocmgdV9nm4hZzp', NULL, NULL, 'active', '2025-07-30 14:27:30', '2025-09-29 01:28:26'),
(2, 'Iya', 'Atuma', NULL, 'atumajoe24@gmail.com', NULL, '2025-11-01 07:32:50', '$2y$10$/tMH6.ALhihAjpvatTEEYOScSdEafEef0Wy0/Twy0R0VBFOyTIkSC', '09078600016', 'JBoFcMCUqAYaPgff589wQZIzxE4HIyq8lb4UyIk4uMyDkdpemjXkO8CvoUWd', NULL, NULL, 'active', '2025-10-16 14:30:35', '2025-11-01 07:32:50'),
(3, 'Zack', 'Oloye', 'Olumi', 'zaxolu4@gmail.com', NULL, '2025-10-31 10:43:08', '$2y$10$76NK3r14nJ7NnTsRrOpZ5utFVyv0V1cKcMST57SDUAe8vjVwTXGrK', '09056525616', 'PtlXE4UG2jWQD1wBwrcg4wTgCc2sGC2StFCG44tgF6R0IOa2GaxFSN3QmZpJ', NULL, NULL, 'active', '2025-10-27 14:41:57', '2025-10-31 10:43:08');

-- --------------------------------------------------------

--
-- Table structure for table `admin_management`
--

DROP TABLE IF EXISTS `admin_management`;
CREATE TABLE IF NOT EXISTS `admin_management` (
  `adminID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `othername` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobileNumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `annual_operations_logs`
--

DROP TABLE IF EXISTS `annual_operations_logs`;
CREATE TABLE IF NOT EXISTS `annual_operations_logs` (
  `annual_operations_log_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `operation_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operation_id` bigint UNSIGNED NOT NULL,
  `calendar_year_id` bigint UNSIGNED NOT NULL,
  `companyMaterialId` json DEFAULT NULL,
  `company_waste_id` json DEFAULT NULL,
  `company_chemical_id` json DEFAULT NULL,
  `product_id` json DEFAULT NULL,
  `company_id` bigint UNSIGNED NOT NULL,
  `expected_quantity` json DEFAULT NULL,
  `expected_quantity_chemical` json DEFAULT NULL,
  `operations_per_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `water_used_per_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `units_produced_per_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity_of_waste` json DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`annual_operations_log_id`),
  KEY `annual_operations_logs_operation_id_foreign` (`operation_id`),
  KEY `annual_operations_logs_calendar_year_id_foreign` (`calendar_year_id`),
  KEY `annual_operations_logs_company_id_foreign` (`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `annual_operation_metadata`
--

DROP TABLE IF EXISTS `annual_operation_metadata`;
CREATE TABLE IF NOT EXISTS `annual_operation_metadata` (
  `annual_op_metadata_ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_id` bigint NOT NULL,
  `OperationName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` bigint NOT NULL,
  `annual_no_of_operation` int DEFAULT NULL,
  `PreparedBy` json NOT NULL,
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `Status` enum('Draft','Published','Archived') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Draft',
  PRIMARY KEY (`annual_op_metadata_ID`),
  KEY `annual_operation_metadata_year_foreign` (`year`),
  KEY `annual_operation_metadata_company_id_foreign` (`company_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `annual_operation_metadata`
--

INSERT INTO `annual_operation_metadata` (`annual_op_metadata_ID`, `company_id`, `OperationName`, `year`, `annual_no_of_operation`, `PreparedBy`, `DateCreated`, `LastUpdated`, `is_deleted`, `Status`) VALUES
(1, 1, 'mining plenty tree resource', 1, NULL, '[\"1\"]', '2025-07-14 14:12:42', '2025-07-14 14:12:42', 0, 'Draft');

-- --------------------------------------------------------

--
-- Table structure for table `audit_trails`
--

DROP TABLE IF EXISTS `audit_trails`;
CREATE TABLE IF NOT EXISTS `audit_trails` (
  `audit_trail_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `record_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `record_id` bigint UNSIGNED NOT NULL,
  `action_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `previous_value` text COLLATE utf8mb4_unicode_ci,
  `new_value` text COLLATE utf8mb4_unicode_ci,
  `performed_by` bigint UNSIGNED NOT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci,
  `geolocation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`audit_trail_id`),
  KEY `audit_trails_performed_by_foreign` (`performed_by`),
  KEY `audit_trails_company_id_foreign` (`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `block_users`
--

DROP TABLE IF EXISTS `block_users`;
CREATE TABLE IF NOT EXISTS `block_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `blocked_by` int NOT NULL,
  `blocked_user` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blocked_by` (`blocked_by`,`blocked_user`),
  KEY `blocked_user` (`blocked_user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `brandID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `businessID` bigint UNSIGNED NOT NULL,
  `brand_colour` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`brandID`),
  KEY `brands_businessid_foreign` (`businessID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

DROP TABLE IF EXISTS `businesses`;
CREATE TABLE IF NOT EXISTS `businesses` (
  `businessID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `business_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slogan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abbreviation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industry` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `establishment_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employees_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`businessID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_brochures`
--

DROP TABLE IF EXISTS `business_brochures`;
CREATE TABLE IF NOT EXISTS `business_brochures` (
  `brochuresID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `businessID` bigint UNSIGNED NOT NULL,
  `file_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`brochuresID`),
  KEY `business_brochures_businessid_foreign` (`businessID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_certifications`
--

DROP TABLE IF EXISTS `business_certifications`;
CREATE TABLE IF NOT EXISTS `business_certifications` (
  `certificationID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `businessID` bigint UNSIGNED NOT NULL,
  `file_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`certificationID`),
  KEY `business_certifications_businessid_foreign` (`businessID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_contacts`
--

DROP TABLE IF EXISTS `business_contacts`;
CREATE TABLE IF NOT EXISTS `business_contacts` (
  `contactID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `businessID` bigint UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary_tel_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondary_tel_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_links` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_links` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_links` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`contactID`),
  KEY `business_contacts_businessid_foreign` (`businessID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_corevalues`
--

DROP TABLE IF EXISTS `business_corevalues`;
CREATE TABLE IF NOT EXISTS `business_corevalues` (
  `CorevaluesID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `businessID` bigint UNSIGNED NOT NULL,
  `core_values_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`CorevaluesID`),
  KEY `business_corevalues_businessid_foreign` (`businessID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_executives`
--

DROP TABLE IF EXISTS `business_executives`;
CREATE TABLE IF NOT EXISTS `business_executives` (
  `directorID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `businessID` bigint UNSIGNED NOT NULL,
  `director_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary_tel_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondary_tel_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`directorID`),
  KEY `business_executives_businessid_foreign` (`businessID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_logos`
--

DROP TABLE IF EXISTS `business_logos`;
CREATE TABLE IF NOT EXISTS `business_logos` (
  `logoID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `businessID` bigint UNSIGNED NOT NULL,
  `logo_mode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`logoID`),
  KEY `business_logos_businessid_foreign` (`businessID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_overviews`
--

DROP TABLE IF EXISTS `business_overviews`;
CREATE TABLE IF NOT EXISTS `business_overviews` (
  `overviewID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `businessID` bigint UNSIGNED NOT NULL,
  `mission_statement` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vision_statement` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_business` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`overviewID`),
  KEY `business_overviews_businessid_foreign` (`businessID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_promotional_photos`
--

DROP TABLE IF EXISTS `business_promotional_photos`;
CREATE TABLE IF NOT EXISTS `business_promotional_photos` (
  `promotionalphotoID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `businessID` bigint UNSIGNED NOT NULL,
  `file_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`promotionalphotoID`),
  KEY `business_promotional_photos_businessid_foreign` (`businessID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_shareholders`
--

DROP TABLE IF EXISTS `business_shareholders`;
CREATE TABLE IF NOT EXISTS `business_shareholders` (
  `ownerId` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `businessID` bigint UNSIGNED NOT NULL,
  `owner_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ownership_percentage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_tel_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondary_tel_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ownerId`),
  KEY `business_shareholders_businessid_foreign` (`businessID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `calendar_years`
--

DROP TABLE IF EXISTS `calendar_years`;
CREATE TABLE IF NOT EXISTS `calendar_years` (
  `calendar_year_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`calendar_year_id`),
  KEY `calendar_years_company_id_foreign` (`company_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calendar_years`
--

INSERT INTO `calendar_years` (`calendar_year_id`, `company_id`, `name`, `start_date`, `end_date`, `is_active`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 1, '2025 - 2026 YEAR', '2025-07-14', '2026-04-14', 1, 0, '2025-07-14 14:12:07', '2025-07-14 14:12:07');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `categoryID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `category_name`, `category_description`, `category_image`, `category_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'leather', NULL, NULL, 'active', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chemicals`
--

DROP TABLE IF EXISTS `chemicals`;
CREATE TABLE IF NOT EXISTS `chemicals` (
  `chemical_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chemical_category_id` bigint UNSIGNED NOT NULL,
  `chemical_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cas_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ec_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reach_registration_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ghs_classification` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `formula` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hazard_information` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_aid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fire_fighting` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accidental_release` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `storage_handling` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disposal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `approve_rejected_status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `approved_rejected_comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_reject_at` timestamp NULL DEFAULT NULL,
  `approved_rejected_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','banned') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`chemical_id`),
  KEY `chemicals_chemical_category_id_foreign` (`chemical_category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chemicals`
--

INSERT INTO `chemicals` (`chemical_id`, `name`, `chemical_category_id`, `chemical_image`, `cas_number`, `ec_number`, `reach_registration_number`, `ghs_classification`, `description`, `formula`, `hazard_information`, `first_aid`, `fire_fighting`, `accidental_release`, `storage_handling`, `disposal`, `is_deleted`, `deleted_by`, `deleted_at`, `approve_rejected_status`, `approved_rejected_comment`, `approved_reject_at`, `approved_rejected_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'acid', 1, NULL, '64175', '111', '01-0000589787-41-0034', 'good', NULL, 'h20', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 'pending', NULL, NULL, NULL, 'active', '2025-07-18 10:46:49', '2025-07-18 10:46:49');

-- --------------------------------------------------------

--
-- Table structure for table `chemical_stock_movements`
--

DROP TABLE IF EXISTS `chemical_stock_movements`;
CREATE TABLE IF NOT EXISTS `chemical_stock_movements` (
  `chemicalStockID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_chemical_id` bigint UNSIGNED NOT NULL,
  `chemical_id` bigint UNSIGNED NOT NULL,
  `company_id` bigint UNSIGNED NOT NULL,
  `batch_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_type` enum('checkin','checkout','transfer','adjustment','disposal','return') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adjustment_type` enum('increase','decrease') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` decimal(15,2) NOT NULL DEFAULT '0.00',
  `source_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destination_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_id` bigint UNSIGNED DEFAULT NULL COMMENT 'References related records, e.g., transfer ID, disposal ID',
  `reference_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Type of reference, e.g., transfer, disposal',
  `production_batch_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Human-readable reference number',
  `guard` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `performed_by` bigint UNSIGNED DEFAULT NULL,
  `calendar_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`chemicalStockID`),
  KEY `chemical_stock_movements_company_chemical_id_foreign` (`company_chemical_id`),
  KEY `chemical_stock_movements_chemical_id_foreign` (`chemical_id`),
  KEY `chemical_stock_movements_company_id_foreign` (`company_id`),
  KEY `chemical_stock_movements_batch_number_index` (`batch_number`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chemical_stock_movements`
--

INSERT INTO `chemical_stock_movements` (`chemicalStockID`, `company_chemical_id`, `chemical_id`, `company_id`, `batch_number`, `transaction_type`, `adjustment_type`, `quantity`, `source_location`, `destination_location`, `reference_id`, `reference_type`, `production_batch_number`, `guard`, `performed_by`, `calendar_year`, `transaction_date`, `remark`, `reason`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 'BCH-acid-20251031-384', 'checkin', NULL, 20.00, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2025', '2025-10-20 23:00:00', NULL, NULL, 'active', '2025-10-31 13:52:24', '2025-10-31 13:52:24', NULL),
(2, 1, 1, 1, 'BCH-acid-20251031-384', 'checkout', NULL, 20.00, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2025', '2025-10-30 23:00:00', NULL, NULL, 'active', '2025-10-31 13:53:14', '2025-10-31 13:53:14', NULL),
(3, 1, 1, 1, 'BCH-acid-20251031-403', 'checkin', NULL, 20.00, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2025', '2025-10-30 23:00:00', NULL, NULL, 'active', '2025-10-31 13:53:41', '2025-10-31 13:53:41', NULL),
(4, 1, 1, 1, 'BCH-acid-20251031-403', 'adjustment', 'increase', 15.00, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2025', '2025-10-30 23:00:00', NULL, NULL, 'active', '2025-10-31 13:54:23', '2025-10-31 13:54:23', NULL),
(5, 1, 1, 1, 'BCH-acid-20251031-604', 'checkin', NULL, 200.00, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2025', '2025-10-30 23:00:00', NULL, NULL, 'active', '2025-10-31 15:57:15', '2025-10-31 15:57:15', NULL),
(6, 1, 1, 1, 'BCH-acid-20251031-403', 'adjustment', 'increase', 200.00, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2025', '2025-10-30 23:00:00', NULL, NULL, 'active', '2025-10-31 16:00:09', '2025-10-31 16:00:09', NULL),
(7, 1, 1, 1, 'BCH-acid-20251031-384', 'adjustment', 'increase', 20.00, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2025', '2025-10-30 23:00:00', NULL, NULL, 'active', '2025-10-31 17:41:52', '2025-10-31 17:41:52', NULL),
(8, 2, 1, 1, 'BCH-acid-20251031-935', 'checkin', NULL, 20.00, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2025', '2025-10-30 23:00:00', NULL, NULL, 'active', '2025-10-31 20:03:55', '2025-10-31 20:03:55', NULL),
(9, 2, 1, 1, 'BCH-acid-20251031-935', 'adjustment', 'increase', 50.00, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2025', '2025-10-30 23:00:00', NULL, NULL, 'active', '2025-10-31 21:39:40', '2025-10-31 21:39:40', NULL),
(10, 2, 1, 1, 'BCH-acid-20251031-935', 'transfer', NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2025', '2025-10-30 23:00:00', NULL, NULL, 'active', '2025-10-31 22:12:41', '2025-10-31 22:12:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chemical_usages`
--

DROP TABLE IF EXISTS `chemical_usages`;
CREATE TABLE IF NOT EXISTS `chemical_usages` (
  `usage_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_chemical_id` bigint UNSIGNED NOT NULL,
  `company_id` bigint UNSIGNED NOT NULL,
  `quantity_used` int NOT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purpose` text COLLATE utf8mb4_unicode_ci,
  `usage_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`usage_id`),
  KEY `chemical_usages_company_chemical_id_foreign` (`company_chemical_id`),
  KEY `chemical_usages_company_id_foreign` (`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_categories`
--

DROP TABLE IF EXISTS `cms_categories`;
CREATE TABLE IF NOT EXISTS `cms_categories` (
  `category_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_categories`
--

INSERT INTO `cms_categories` (`category_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'ea', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(2, 'voluptatibus', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(3, 'et', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(4, 'in', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(5, 'est', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(6, 'animi', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(7, 'aspernatur', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(8, 'eligendi', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(9, 'sunt', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(10, 'qui', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(11, 'et', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(12, 'dolor', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(13, 'necessitatibus', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(14, 'et', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(15, 'vel', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(16, 'vitae', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(17, 'molestiae', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(18, 'est', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(19, 'vitae', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(20, 'animi', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(21, 'et', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(22, 'laborum', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(23, 'temporibus', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(24, 'animi', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(25, 'porro', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(26, 'quibusdam', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(27, 'delectus', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(28, 'asperiores', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(29, 'omnis', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(30, 'quisquam', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(31, 'tempore', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(32, 'incidunt', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(33, 'et', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(34, 'repellendus', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(35, 'iste', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(36, 'animi', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(37, 'officiis', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(38, 'corporis', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(39, 'ex', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(40, 'nostrum', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(41, 'et', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(42, 'dolore', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(43, 'cumque', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(44, 'harum', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(45, 'quia', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(46, 'quis', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(47, 'dicta', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(48, 'consequatur', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(49, 'aut', '2025-10-23 14:43:14', '2025-10-23 14:43:14'),
(50, 'vitae', '2025-10-23 14:43:14', '2025-10-23 14:43:14');

-- --------------------------------------------------------

--
-- Table structure for table `cms_page_categories`
--

DROP TABLE IF EXISTS `cms_page_categories`;
CREATE TABLE IF NOT EXISTS `cms_page_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `page_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cms_page_categories_page_id_foreign` (`page_id`),
  KEY `cms_page_categories_category_id_foreign` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_page_tags`
--

DROP TABLE IF EXISTS `cms_page_tags`;
CREATE TABLE IF NOT EXISTS `cms_page_tags` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `page_id` bigint UNSIGNED NOT NULL,
  `tag_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cms_page_tags_page_id_foreign` (`page_id`),
  KEY `cms_page_tags_tag_id_foreign` (`tag_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_tags`
--

DROP TABLE IF EXISTS `cms_tags`;
CREATE TABLE IF NOT EXISTS `cms_tags` (
  `tag_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_tags`
--

INSERT INTO `cms_tags` (`tag_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'voluptatibus', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(2, 'sed', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(3, 'nam', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(4, 'quo', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(5, 'aut', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(6, 'ipsum', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(7, 'dicta', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(8, 'a', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(9, 'et', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(10, 'possimus', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(11, 'occaecati', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(12, 'odit', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(13, 'sint', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(14, 'qui', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(15, 'similique', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(16, 'sint', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(17, 'neque', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(18, 'ex', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(19, 'iusto', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(20, 'et', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(21, 'sint', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(22, 'labore', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(23, 'atque', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(24, 'dolores', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(25, 'aut', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(26, 'exercitationem', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(27, 'reiciendis', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(28, 'quae', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(29, 'non', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(30, 'optio', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(31, 'eos', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(32, 'molestiae', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(33, 'ut', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(34, 'ab', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(35, 'adipisci', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(36, 'autem', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(37, 'qui', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(38, 'similique', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(39, 'cum', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(40, 'perspiciatis', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(41, 'quidem', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(42, 'facilis', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(43, 'sit', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(44, 'excepturi', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(45, 'quia', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(46, 'nihil', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(47, 'quasi', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(48, 'sit', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(49, 'vel', '2025-10-23 14:49:13', '2025-10-23 14:49:13'),
(50, 'quis', '2025-10-23 14:49:13', '2025-10-23 14:49:13');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `company_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `industry` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `industry_process` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary_phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondary_phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mgrs` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_establishment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_employees` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operations_manager` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person_full_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person_position` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person_contact_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_sharable` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`company_id`),
  UNIQUE KEY `companies_company_name_unique` (`company_name`)
) ENGINE=MyISAM AUTO_INCREMENT=164 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `company_name`, `industry`, `industry_process`, `email`, `primary_phone_number`, `secondary_phone_number`, `country`, `state`, `city`, `address`, `zip_code`, `longitude`, `latitude`, `mgrs`, `website_url`, `date_of_establishment`, `number_of_employees`, `operations_manager`, `contact_person_full_name`, `contact_person_position`, `contact_person_contact_number`, `is_sharable`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Afdin Petroleum lpg', 'Petrochemicals', '', 'Info@afdinlpg.com', '8025625555.0', NULL, 'Nigeria', 'Kano', 'Kano', '11 club road Kano', NULL, '4º12\'53.8\"N', '46º24\'22.5\"W', NULL, 'Www.Afdinlpg.com', '2001-01-01', '25.0', 'Lawal Dahiru Mangal', 'Anas Waziri', 'Plant Operations Manager', '8035780101.0', '', 'active', NULL, '2025-01-26 23:15:35'),
(2, 'Petrogas Energy', 'Petrochemicals', '', 'petrogas@petrogas-energy.com', '7011844444.0', NULL, 'Nigeria', 'Kano', NULL, 'Plot 657 and Extension Eastern bypass, Kano', NULL, '11.994609', '8.58308', NULL, '', '1986-01-01', '49.0', '', 'Hassan Ahmad Santuraki', 'Personnel Manager', '7011844444.0', '', 'active', NULL, NULL),
(4, 'AMMASCO INTERNATIONAL LIMITED', 'Petrochemicals', '', 'Customercare@ammasco.com', '8037709030.0', NULL, 'Nigeria', 'Kano', NULL, 'Club road kano', NULL, '12.016130', '8.550750', NULL, '', '1995-01-01', '7000.0', '', 'Jamilu Ali', 'HSE officer', '9031159443.0', '', 'inactive', NULL, NULL),
(5, 'Bova’s petroleum', 'Petrochemicals', '', '', '9006426673.0', NULL, 'Nigeria', 'Kano', NULL, 'Eastern Bye Pass Kano', NULL, '11.968600', '8.593929', NULL, '', '1990-01-01', '150.0', '', 'Jimoh Taofik', '', '9096426673.0', '', 'active', NULL, NULL),
(6, 'Badamasi Petroleum & oil', 'Petrochemicals', '', '', '8145264134.0', NULL, 'Nigeria', 'Kano', NULL, 'Gidan Kwarro, 34 Aminu Kano way,Kafar D., Kano', NULL, '12.022643', '8.502328', NULL, '', '2001-01-01', '241.0', '', 'Alhaji Ibrahim Badamasi', 'Manager', '8145264134.0', '', 'active', NULL, NULL),
(7, 'ABY LUBRICANT NIG. Limited', 'Petrochemicals', '', 'Sbyshipping@gmail.com', '8102396763.0', NULL, 'Nigeria', 'Kano', NULL, '312 Tokarawa Industrial Area kano', NULL, '12.008188', '8.608745', NULL, 'Www.abylubricant.com.ng', '2017-01-01', '150.0', '', 'Zaharadeen Yahaya', '', '8034722033.0', '', 'active', NULL, NULL),
(8, 'Munalo Petrochemical Ltd', 'Petrochemicals', 'Refining', '', '8037572785.0', NULL, 'Nigeria', 'Kano', NULL, '5 Marshall Link off Sarduana Crescent kano', NULL, '11.993565', '8.570475', NULL, '', '2020-01-01', '25.0', 'Al Mustapha Mohammed', 'Al Mustapha Mohammed', 'Manager', '8037572785.0', '', 'active', NULL, NULL),
(9, 'AA.RANO LPG PLANT', 'Petrochemicals', '', '', '8032610952.0', NULL, 'Nigeria', 'Kano', NULL, '', NULL, '11.969966', '8.519245', NULL, '', '2021-01-01', '20.0', 'Mufisco Fm services', 'Abdullahi Muhammad Garba', 'Plant manager', '8032610952.0', '', 'active', NULL, NULL),
(10, 'FORTE OIL', 'Petrochemicals', '', '', '23412776100.0', NULL, 'Nigeria', 'Kano', NULL, 'EASTERN BY-PASS, HADEJIA ROAD KANO', NULL, '12.022622', '8.550957', NULL, 'Www.forteoilplc.com', '1964-01-01', '100.0', '', 'Umar Jibrin', 'General manager', '23464639583.0', '', 'active', NULL, NULL),
(11, 'PYRAMID GAS', 'Petrochemicals', '', '', '9127725719.0', NULL, 'Nigeria', 'Kano', NULL, 'Saradauna Crescent', NULL, '8.5701461ºE', '11.9929676ºN', NULL, '', '2020-01-01', '10.0', '', 'Muhammad Adamu', 'Director', '9064601640.0', '', 'active', NULL, NULL),
(12, 'Citizen fertilizer & Chemical', 'Petrochemicals', '', 'Citizensfertilizers@gmail.com', '8037053367.0', NULL, 'Nigeria', 'Kano', NULL, 'No 10 independence road', NULL, '12.02ºE', '8.56306ºN', NULL, '', '2015-01-01', '200.0', '', 'Haris.B.Haris', 'Manager', '8037053367.0', '', 'active', NULL, NULL),
(13, 'Pioneer Steel & Eng. Co. LTD', 'Basic Metal, Iron and Steel', '', '', '64627871.0', NULL, 'Nigeria', 'Kano', NULL, 'Umaru Babura Road, Kano', NULL, '8.5675021ºE', '12.0132903ºN', NULL, '', '1978-01-01', '70.0', '', 'Shehu Ahmed', 'Director', '64627871.0', '', 'active', NULL, NULL),
(14, 'Indiana Steel PVT Ltd', 'Basic Metal, Iron and Steel', '', 'Nigeria@indanasteel.com', '8062352244.0', NULL, 'Nigeria', 'Kano', NULL, 'Phase 2 Glenlux global services ltd, nta orogbun crescent, gra, port harcourt', NULL, '', '', NULL, '', '2010-01-01', '120.0', '', 'Fumi Durojaye', 'Manager', '8062352244.0', '', 'active', NULL, NULL),
(15, 'SAHANA INDUSTRIAL PRODUCTS LIMITED', 'Basic Metal, Iron and Steel', '', '', '8028324217.0', NULL, 'Nigeria', 'Kano', NULL, 'KM 6, HADEIJA ROAD, KANO', NULL, '8.544701ºE', '12.009118ºN', NULL, '', '1980-01-01', '250.0', '', 'BABA D. GUNDUWAWA', 'DIRECTOR', '8028324217.0', '', 'active', NULL, NULL),
(16, 'T&B Steel & Aluminium Cons. Co.', 'Basic Metal, Iron and Steel', '', 'jafaribrahimahmad34@gmail.com', '7038114486.0', NULL, 'Nigeria', 'Kano', NULL, 'Kofar Lunkdi, Katsina rd, Kano', NULL, '8º28\'56.1\"E', '12º02\'39.9\"N', NULL, 'tbojuwa.co', '2006-01-01', '17.0', '', 'Jafar Ibrahim Ahmad', 'Director', '7038114486.0', '', 'active', NULL, NULL),
(17, 'Kano welding & Steel Constr. co.', 'Basic Metal, Iron and Steel', '', '', '64633308.0', NULL, 'Nigeria', 'Kano', NULL, 'no 45 M/Mohammed way, Kano', NULL, '8.5410ºE', '12.0476ºN', NULL, '', '2010-01-01', '75.0', '', 'Hamisu Umar', 'Personal Manager', '64633308.0', '', 'active', NULL, NULL),
(18, 'Tofa Textiles limited', 'Textile', '', 'Tofatex@hotmail.com', '8065309940.0', NULL, 'Nigeria', 'Kano', NULL, '5 Independence Road Kano', NULL, '12.020626', '8.561313', NULL, '', '2006-01-01', '82.0', '', 'Mustapha Bello', 'Admin officer', '8099494549.0', '', 'active', NULL, NULL),
(19, 'Terytex NIG Ltd', 'Textile', 'Manufacturing', 'Terytex@yahoo.co.uk', '', NULL, 'Nigeria', 'Kano', NULL, '134 Barde Independence road Kano', NULL, '08º32\'73.1\"E', '12º01\'19.7\"N', NULL, '', '1980-01-01', '65.0', '', 'Esekhaigbe Umaru', 'Processing Manager', '8064976947.0', '', 'active', NULL, NULL),
(20, 'Nigerian Spinners and Dyers LTD', 'Textile', '', 'Gala.kano@galainvestltd.com', '7058982625.0', NULL, 'Nigeria', 'Kano', NULL, '6 independence road Kano', NULL, '8º34\'01.3\"E', '12º01\'15.0\"N', NULL, 'Www.nigerianspinnersanddyers.com', '1969-01-01', '150.0', '', '', 'Admin', '7058992625.0', '', 'active', NULL, NULL),
(21, 'Angel spinning & dyeing ltd', 'Textile', '', 'Angellagos@yahoomaill.com', '8057777773.0', NULL, 'Nigeria', 'Kano', NULL, 'Plot 8 Sharada phase 3 , kano', NULL, '', '', NULL, '', '1984-01-01', '58.0', '', 'Mohammed Kodamu', '', '23464663909.0', '', 'active', NULL, NULL),
(22, 'Safari textiles limited', 'Textile', '', '', '', NULL, 'Nigeria', 'Kano', NULL, 'Challawa Industrial Area , 700233 kano', NULL, '11.907563', '8.467207', NULL, '', NULL, '', '', 'Francis', '', '', '', 'active', NULL, NULL),
(23, 'UNIVERSAL TEXTILE INDUSTRIES LTD', 'Textile', '', '', '234645394630218.0', NULL, 'Nigeria', 'Kano', NULL, '', NULL, '', '', NULL, '', '1986-01-01', '25.0', '', 'Umari Garba', '', '234645394630218.0', '', 'active', NULL, NULL),
(24, 'White Gold Ginnery NIG Ltd', 'Textile', '', '', '', NULL, 'Nigeria', 'Kano', NULL, '08037870254', NULL, '8º23.2\'17\"E', '11º50\'29.7\"N', NULL, 'Www.whitegoldltd.com', '1996-01-01', '70.0', 'Mustapha Jawao Taher', 'Mustapha Mohammed', 'Admin', '8037870254.0', '', 'active', NULL, NULL),
(25, 'Lakhi Textile Industry Limited', 'Textile', 'Milling', '', '8035558713.0', NULL, 'Nigeria', 'Kano', NULL, '', NULL, '12.014003', '8.548138', NULL, '', '2011-01-01', '200.0', '', 'Ahmed Gasua', 'Admin', '8035558713.0', '', 'active', NULL, NULL),
(26, 'African Textile Manufacturers Ltd', 'Textile', '', 'Afriwax@atmltd.net', '8091310771.0', NULL, 'Nigeria', 'Kano', NULL, 'Challawa Industrial Estate', NULL, '8.466960', '11.907193', NULL, 'Www.atmng.com', '1998-01-01', '415.0', '', 'Francis Ejembi', 'Asst Personnel Manager', '8067428393.0', '', 'active', NULL, NULL),
(27, 'Bifsam Rice mill', 'Food and Beverages', 'Milling', 'Bifsamrice@gmail.com', '7066461817.0', NULL, 'Nigeria', 'Kano', NULL, 'C4 independence road , tudun wada kano', NULL, '12.021054\"N', '8.557562\"E', NULL, '', '2018-01-01', '150.0', '', 'Ibrahim Sabiu Bako', 'Human resource manager', '7066461817.0', '', 'active', NULL, NULL),
(28, 'Lela Agro Industries Ltd', 'Food and Beverages', '', 'Lelaagronig@yahoo.com', '8033993669.0', NULL, 'Nigeria', 'Kano', NULL, 'Plot 74 sharrada phase 3 industrial estate', NULL, '11º94\'79.369\"N', '8º49\'45.644\"E', NULL, '', '2002-01-01', '324.0', '', 'Ibrahim Khalifa', 'Admin', '8099486667.0', '', 'active', NULL, NULL),
(29, 'Eco vista industries pvt ltd', 'Food and Beverages', 'Milling', 'Info@ecovistaind.com', '8038738927.0', NULL, 'Nigeria', 'Kano', NULL, '', NULL, '12.011032', '8.660491', NULL, '', '2019-01-01', '21.0', '', 'Tarun Pareek', 'Admin', '7017932062.0', '', 'active', NULL, NULL),
(30, 'FBB rice milling ltd', 'Food and Beverages', 'Farming', 'FBBRicemill@yahoo.com', '9092350000.0', NULL, 'Nigeria', 'Kano', NULL, 'No 47 Challawa industrial area kano', NULL, '11.881260', '8.481216', NULL, '', '2019-01-01', '87.0', '', 'ER Akshay Kumar', 'Production manager', '9092350000.0', '', 'active', NULL, NULL),
(31, 'Vitae rice mill', 'Food and Beverages', 'Milling', 'Stephen_pale2003@yahoo.com', '8030904487.0', NULL, 'Nigeria', 'Kano', NULL, 'Dan Tube village Dawakin kudu Lga', NULL, '8.5981ºE', '11.8347ºN', NULL, 'Info@vitaeseeds.com.ng', '2018-01-01', '60.0', 'Mr Stephen Emmanuel', 'Mr Stephen Emmanuel', 'Director', '8030904487.0', '', 'active', NULL, NULL),
(32, 'Umza International Farme Limited', 'Food and Beverages', '', 'Muktarkaleh@yahoo', '8023111333.0', NULL, 'Nigeria', 'Kano', NULL, 'Km 13, off Zaria Road k dawaki kano', NULL, '11.959952', '8.558255', NULL, '', '2010-01-01', '', 'Dr Harriet Chimezie', 'Muktar .A.Kaleh', 'Managing Director', '8023111333.0', '', 'active', NULL, NULL),
(33, 'Basma rice mill', 'Food and Beverages', 'Milling', '', '8163598631.0', NULL, 'Nigeria', 'Kano', NULL, 'Tokerawa Hadejia Road Kano', NULL, '8.58891ºE', '12.00811ºN', NULL, '', '1995-01-01', '225.0', 'Abdulrashid Bama', 'Abdulrashid Bama', 'Personnel manager', '8163598631.0', '', 'active', NULL, NULL),
(34, 'Gashash  Tanneries Ltd', 'Food and Beverages', '', '', '', NULL, 'Nigeria', 'Kano', NULL, '23 NA Baba Badamasi Road Nassarawa', NULL, '8.555354', '12.010898', NULL, '', '1990-01-01', '50.0', 'Managing consultant', 'Jibrin Danmaji', 'Managing consultant', '', '', 'active', NULL, NULL),
(35, 'Jubali Agro-tec Limited', 'Food and Beverages', '', 'Logistics.kano@jubailuagrotec.com', '', NULL, 'Nigeria', 'Kano', NULL, 'Km 10 Gunduwawa , hadejia road kano', NULL, '12.009208', '8.545822', NULL, '', '2001-01-01', '404.0', '', 'Francis Eneji', 'Human resource manager', '9093105333.0', '', 'active', NULL, NULL),
(36, 'Al-wabel rice mill', 'Food and Beverages', 'Farming', 'Imran2606@yahoo.com', '8033356082.0', NULL, 'Nigeria', 'Kano', NULL, 'No 45 sharrada Industry area phase 3 kano', NULL, '11.949985', '8.489890', NULL, '', '2019-01-01', '100.0', '', 'Henry Anadiuna', 'Manager', '', '', 'active', NULL, NULL),
(37, 'Popular farms and mills ltd', 'Food and Beverages', '', '', '', NULL, 'Nigeria', 'Kano', NULL, 'No 54 Challawa Industrial estate kumbutso kano', NULL, '11.907682', '8.465503', NULL, '', '2011-01-01', '118.0', 'Green earth consulting co ltd/ dr Harriet chimezie', 'Nasir Sa’idu', 'Operations manager', '8141337715.0', '', 'active', NULL, NULL),
(38, 'Ilera Agro Processing NIG ltd', 'Food and Beverages', '', 'Hafsatfummilayo2015@gmail.com', '', NULL, 'Nigeria', 'Kano', NULL, '42/43a Challawa industrial estate Kano', NULL, '11.894881', '8.471282', NULL, '', '2016-01-01', '500.0', 'Green earth consulting co ltd/dr Harriet chimezie', 'Hafsat. f .bankole', 'Admin', '', '', 'active', NULL, NULL),
(39, 'Dala Foods Nigeria Limited', 'Food and Beverages', 'Processing', 'Dalafoods@yahoo.com', '8036921526.0', NULL, 'Nigeria', 'Kano', NULL, 'Plot 85 sharada industrial estate , phase 3', NULL, '11.951209', '8.495263', NULL, 'Www.dalafoodsng.com', '1980-01-01', '', '', 'Ali madugu', '', '8023390996.0', '', 'active', NULL, NULL),
(40, 'Gilaso Rice mill', 'Food and Beverages', 'Gaming/ milling', 'Gilasorice@yahoo.com', '8093601707.0', NULL, 'Nigeria', 'Kano', NULL, 'Tamburawa opposite Dantube primary school kano', NULL, '11.849674', '8.535818', NULL, '', '2019-01-01', '150.0', '', 'Alhaji Amino Ibrahim', 'Manager', '8093601707.0', '', 'active', NULL, NULL),
(41, 'Al-Hamsad rice mill', 'Food and Beverages', 'Milling', 'Usmanshafiu10@yahoo.com', '8160666220.0', NULL, 'Nigeria', 'Kano', NULL, '129 kundila road bonpai kano', NULL, '6º19\'41\"E', '5º36\'57.6\"N', NULL, '', '2017-01-01', '95.0', '', 'Usman shafiu', 'Personnel manager', '', '', 'active', NULL, NULL),
(42, 'Northern Sugar Processing Company', 'Food and Beverages', '', '', '8070628194.0', NULL, 'Nigeria', 'Kano', NULL, 'Plot 37 sharada industrial Area phase 3', NULL, '8.47597ºE', '11.93809ºN', NULL, '', '2016-01-01', '50.0', 'Balla Hassan', 'Balla Hassan', 'Admin manager', '8070628194.0', '', 'active', NULL, NULL),
(43, 'Sharubuta & sons Nigeria ltd', 'Food and Beverages', '', '', '', NULL, 'Nigeria', 'Kano', NULL, 'No 4k Niger street kano', NULL, '12.009235', '8.541026', NULL, '', '2000-01-01', '', 'Mr Bruno onyewe', 'Alhaji sa adshitu sharubutu', '', '234064431885.0', '', 'active', NULL, NULL),
(44, 'Dantata Foods & Allied products ltd', 'Food and Beverages', '', 'Info@dantatafoods.com', '806603897.0', NULL, 'Nigeria', 'Kano', NULL, '123 Mangada Road Bompai , kano', NULL, '8.54839ºE', '12.01314ºN', NULL, 'Www.dantatafoods.com', '2005-01-01', '100.0', '', 'Tajuddeen Dantata', 'Director', '9088765645.0', '', 'active', NULL, NULL),
(45, 'Mamuda Food Industries ltd', 'Food and Beverages', '', 'Ali.g.elamin@gmail.com', '8134748762.0', NULL, 'Nigeria', 'Kano', NULL, 'Plot 59 -61 Challawa industrial estate Kano', NULL, '11.906665', '8.468372', NULL, 'Www.Mamudagroup.com', '2020-01-01', '200.0', '', 'Mr das', 'Manager', '8094575226.0', '', 'active', NULL, NULL),
(46, 'Bella’s rice mill', 'Food and Beverages', 'Milling', '', '8093448689.0', NULL, 'Nigeria', 'Kano', NULL, 'Plot 580 kakara industrial estate kano', NULL, '8º32.6821\'E', '12º0.547\'N', NULL, '', '2016-01-01', '50.0', 'Ibrahim Audu', 'Ibrahim audu', 'Operations manager', '8023785395.0', '', 'active', NULL, NULL),
(47, 'Almas Company', 'Food and Beverages', 'Food processing', '', '8033515527.0', NULL, 'Nigeria', 'Kano', NULL, '', NULL, '8.49728E', '11.98303N', NULL, '', '2010-01-01', '55.0', 'Khaled moussallati', 'Tarik', 'Admin', '8033515527.0', '', 'active', NULL, NULL),
(48, 'Dansa Food Processing Limited', 'Food and Beverages', 'Food processing', '', '8166280411.0', NULL, 'Nigeria', 'Kano', NULL, '99 Sharada phase 2 kano', NULL, '8.506544E', '11.958766N', NULL, 'Www.dansagum.com', '1985-01-01', '105.0', 'Saminu Dangote', 'Aaron Amos', 'Admin', '8166280411.0', '', 'active', NULL, NULL),
(49, 'Kano sugar processing co ltd', 'Food and Beverages', '', '', '8064143981.0', NULL, 'Nigeria', 'Kano', NULL, '4a kargaw road Kano', NULL, '8.5441058ºE', '11.99972ºN', NULL, '', '1979-01-01', '61.0', 'M.A Fadallah', 'Zubairu Mangal', '', '8064143981.0', '', 'active', NULL, NULL),
(50, 'Rasa Industries Ltd', 'Food and Beverages', '', 'Info@rasaindustries.ng', '8059236016.0', NULL, 'Nigeria', 'Kano', NULL, '145 club road Kano', NULL, '1202358.0', '854779.0', NULL, '', '2007-01-01', '57.0', '', 'Mr Terry Tam', 'Admin', '8065281668.0', '', 'active', NULL, NULL),
(51, 'Fortune Rice mill', 'Food and Beverages', 'Milling', 'Fortunericemillskano@gmail.com', '8099691414.0', NULL, 'Nigeria', 'Kano', NULL, 'Plot 757, Tudun Maliki, Kano', NULL, '8.53095ºE', '11.9624ºN', NULL, '', '2019-01-01', '120.0', '', 'Michael Odoma Okereke', 'Manager', '8099691414.0', '', 'active', NULL, NULL),
(52, 'Famousa Agro ltd', 'Food and Beverages', '', 'Www.famousa.Agro.com', '8066666335.0', NULL, 'Nigeria', 'Kano', NULL, 'No 10 Dantata Road Kano', NULL, '12º.0155º39º', '8º.5º63568', NULL, '2015', '500-01-01', '500.0', 'Mr Nnamdi', 'Mr ihsan Alia', '', '8178940814.0', '', 'active', NULL, NULL),
(53, 'Alh Babangida Jargaba', 'Food and Beverages', '', '', '8067348153.0', NULL, 'Nigeria', 'Katsina', NULL, 'No b1 katsina road fuuthal katsina state', NULL, '0507', '', NULL, '', '2001-01-01', '45.0', 'Managing Consultant', '', '', '', '', 'active', NULL, NULL),
(54, 'Klassis Furniture', 'Wood and Furniture', '', '', '9066685585.0', NULL, 'Nigeria', 'Kano', NULL, '596 Yan Garki ,Dakata -c Kano', NULL, '', '128.5167', NULL, '', '2010-01-01', '25.0', '', 'Ahmad Idris', 'Gen Manager', '9075555582.0', '', 'active', NULL, NULL),
(55, 'Kafas furniture co ltd', 'Wood and Furniture', '', 'Alkakafar@gmail.com.ng', '8023186736.0', NULL, 'Nigeria', 'Kano', NULL, 'Buk Road , Kofar Dukayuwa', NULL, '11.979390', '8.484306', NULL, '', '2010-01-01', '25.0', '', 'Mr Alkasim Suleiman', '', '8093588553.0', '', 'active', NULL, NULL),
(56, 'Zarewa Furniture’s', 'Wood and Furniture', '', 'Adamabdullahi12378@gmail.com', '9067901674.0', NULL, 'Nigeria', 'Kano', NULL, 'Gandun Albasa Kano', NULL, '8º31\'40.4\"E', '11º.58\'09.2\"N', NULL, '', '2010-01-01', '20.0', '', 'Adam Abdullahi', 'Director', '9067901674.0', '', 'active', NULL, NULL),
(57, 'Ken Joe Nigeria ltd', 'Wood and Furniture', '', '', '67889558.0', NULL, 'Nigeria', 'Kano', NULL, '22c Zaria Road Kano', NULL, '11.9798ºN', '8.5394ºE', NULL, '', '1998-01-01', '50.0', '', 'Chukwu Joseph E', 'Director', '7067889558.0', '', 'active', NULL, NULL),
(58, 'Setrad Ltd', 'Wood and Furniture', '', '', '7038993795.0', NULL, 'Nigeria', 'Kano', NULL, 'Sharada phase 2', NULL, '11.9490ºN', '8.4897ºE', NULL, '', '1998-01-01', '19.0', '', 'Mukhtar Suleman Ibrahim', 'Factory manager', '8062069844.0', '', 'active', NULL, NULL),
(59, 'Danyaya Furniture Company', 'Wood and Furniture', '', 'Info@danyayafurniturecompany.com', '8083891818.0', NULL, 'Nigeria', 'Kano', NULL, 'Maiduguri Road , kano', NULL, '8.6199891', '11.9402246', NULL, 'Www.danyayafurniturecompany.com', '1996-01-01', '20.0', 'Fauza Aminu', 'Fauza Aminu', '', '8036187777.0', '', 'active', NULL, NULL),
(60, 'Vina International Limited', 'Wood and Furniture', '', 'Info@vinaltd.com', '7055991503.0', NULL, 'Nigeria', 'Kano', NULL, 'No 20 Niger Street Kano', NULL, '12.008269', '8.539557', NULL, '', '1999-01-01', '100.0', '', '', '', '7055991503.0', '', 'active', NULL, NULL),
(61, 'Northern Furniture Industries Ltd', 'Wood and Furniture', '', '', '23474660490.0', NULL, 'Nigeria', 'Kano', NULL, 'Plot 15 , sharada industrial area Kano', NULL, '8.521746ºE', '11.976384ºN', NULL, 'Www.oilseedscrewpress.com', '1978-01-01', '17.0', 'Folarin A Pearse', 'David A Somefun', 'Director', '23464660490.0', '', 'active', NULL, NULL),
(62, 'A Z petroleum Product ltd', 'Petrochemicals', '', 'Azpetroleum@gmail.com', '234013623000.0', NULL, 'Nigeria', 'F.C.T.', NULL, 'Plot 3 Idu industrial Abuja', NULL, '90637167.0', '73381532.0', NULL, '', '1995-01-01', '100.0', 'Elizabeth Oladipo', 'Elizabeth Oladipo', 'Manager', '234014623000.0', '', 'active', NULL, NULL),
(63, 'Diesel xpress company ltd', 'Petrochemicals', '', 'Diselxpress@gmail.com', '8188718312.0', NULL, 'Nigeria', 'F.C.T.', NULL, 'Plot 105 Idu industrial area Abuja', NULL, '90604625.0', '74190208.0', NULL, '', '2010-01-01', '200.0', 'Mr Tolu Abbas', 'Tolu Abbas', 'Manager', '8188718312.0', '', 'active', NULL, NULL),
(64, 'Miccon petroleum limited', 'Petrochemicals', '', 'Micconpetroleum@gmail.com', '8066197377.0', NULL, 'Nigeria', 'F.C.T.', NULL, '19 ghishiri ,maitama avenue , maitama Abuja', NULL, '9078441.0', '7512908.0', NULL, '', '2015-01-01', '100.0', 'Mr Moses ikea', 'Mr Moses ikea', 'Manager', '8066197377.0', '', 'active', NULL, NULL),
(65, 'Dan oil and petrochemicals ltd', 'Petrochemicals', '', 'Danoilandpetrochemical@gmail.com', '8096771010.0', NULL, 'Nigeria', 'F.C.T.', NULL, '10 amason, street, maitama Abuja', NULL, '90604625.0', '74190208.0', NULL, '', '2010-01-01', '200.0', 'Abel Ofarie', 'Abel Ofarie', 'Manager', '8188718312.0', '', 'active', NULL, NULL),
(66, 'Ama petroenergy limited', 'Petrochemicals', '', 'Amapetroenergy@gmail.com', '8023504457.0', NULL, 'Nigeria', 'F.C.T.', NULL, '41 Usuma street , maitama abuja', NULL, '9074652.0', '7499409.0', NULL, '', '2015-01-01', '100.0', 'Anderson Solomon', 'Anderson Solomon', 'Manager', '8023504457.0', '', 'active', NULL, NULL),
(67, 'C.A.A Omo ventures', 'Food and Beverages', '', 'C.AAomoventures@gmail.com', '8036388731.0', NULL, 'Nigeria', 'F.C.T.', NULL, '388 industrial area Idu Abuja.', NULL, '9065966.0', '7342298.0', NULL, '', '2010-01-01', '50.0', 'Mr Tom Omo', 'Tom Omo', 'Manager', '8036388731.0', '', 'active', NULL, NULL),
(68, 'Life mate furniture', 'Wood and Furniture', '', 'Lifematefurniture@gmail.com', '8129962966.0', NULL, 'Nigeria', 'F.C.T.', NULL, 'Plot 65 Ahmadu Bello way garki Abuja', NULL, '9036286.0', '7497830.0', NULL, '', '2010-01-01', '200.0', '', 'Angela Madu', 'Manager', '8129962966.0', '', 'active', NULL, NULL),
(69, 'Interior woodwork limited', 'Wood and Furniture', '', 'Interiorwoodwork@gmail.com', '7080670000.0', NULL, 'Nigeria', 'F.C.T.', NULL, '58 Idu industrial area Abuja', NULL, '9059049.0', '7338630.0', NULL, '', '1999-01-01', '100.0', 'Yemisi Ademola', 'Yemisi Ademola', 'HR', '7080670000.0', '', 'active', NULL, NULL),
(70, 'G.U Ebeco industries limited', 'Wood and Furniture', '', 'Guebecoindustries@gmail.com', '8037862756.0', NULL, 'Nigeria', 'F.C.T.', NULL, '624 Idu industrial area , codestrial zone 16', NULL, '9039064.0', '9394221.0', NULL, '', '1999-01-01', '150.0', 'OBI Simeon', 'Ebere Uzozie', 'Manager', '8037862756.0', '', 'active', NULL, NULL),
(71, 'The wood factory limited', 'Wood and Furniture', '', 'Twf@gmail.com', '8060888532.0', NULL, 'Nigeria', 'F.C.T.', NULL, '154 Ademola Adetokunbo crescent Abuja', NULL, '9638584.0', '7383440.0', NULL, 'Www.thewoodfactory.net', '2000-01-01', '500.0', '', 'Adamu Ismaila', 'Manager', '9066580336.0', '', 'active', NULL, NULL),
(72, 'Arcme Furniture limited', 'Wood and Furniture', '', 'Arcmefurniture@gmail.com', '8038645716.0', NULL, 'Nigeria', 'F.C.T.', NULL, 'Zone 3 Amac plaza, block Ap - A1 kabake close , wuse Abuja', NULL, '9056119.0', '7466028.0', NULL, '', '2016-01-01', '90.0', '', 'Peter Osasa', 'Manager', '8036645716.0', '', 'active', NULL, NULL),
(73, 'Kotwood furniture limited', 'Wood and Furniture', '', 'Kotwood@gmail.com', '7063619051.0', NULL, 'Nigeria', 'F.C.T.', NULL, 'Idu industrial area paepe Abuja', NULL, '9033861.0', '7401736.0', NULL, '', '2010-01-01', '50.0', '', 'Amos Yakubu', 'Manager', '7063619051.0', '', 'active', NULL, NULL),
(74, 'Ideus Furnishing', 'Wood and Furniture', '', 'Ideusfurnishing@gmail.com', '8187140000.0', NULL, 'Nigeria', 'F.C.T.', NULL, 'Plot 4B , Idu industrial area phase 1 Abuja', NULL, '9063863.0', '7338247.0', NULL, '', '2011-01-01', '100.0', '', 'Ezekiel Richard’s', 'Manager', '', '', 'active', NULL, NULL),
(75, 'Paris furniture company', 'Wood and Furniture', '', '', '7067102411.0', NULL, 'Nigeria', 'F.C.T.', NULL, 'Beside mountain of fire camp Abuja', NULL, '8983679.0', '7417354.0', NULL, '', '2012-01-01', '100.0', '', 'Amina Yusuf', 'HR', '7067102411.0', '', 'active', NULL, NULL),
(76, 'Jam & Bay furniture ltd', 'Wood and Furniture', '', 'Jam&Bayfurniture@gmail.com', '9162340000.0', NULL, 'Nigeria', 'F.C.T.', NULL, 'Plot 501 along abc cargo road by unique estate katampe cadestral zone Abuja', NULL, '9111310.0', '7455637.0', NULL, '', '2010-01-01', '50.0', '', 'Ugochukwu onyemeachi', 'Manager', '', '', 'active', NULL, NULL),
(77, 'Food & food integrated limited', 'Food and Beverages', 'Baking', 'Food&foodintegrated@gmail.com', '7034724100.0', NULL, 'Nigeria', 'F.C.T.', NULL, 'Plot 503 , Idu industrial area Abuja', NULL, '9065171.0', '7338496.0', NULL, '', '2005-01-01', '', 'Genco Alfred', 'Genco Alfred', 'HR', '', '', 'active', NULL, NULL),
(78, 'Cura food', 'Food and Beverages', 'Food processing', 'Curafoods@gmail.com', '8077777175.0', NULL, 'Nigeria', 'F.C.T.', NULL, 'Idu Industrial Area Abuja', NULL, '9664955.0', '7338309.0', NULL, '', '2016-01-01', '100.0', '', 'Mabel Oden', 'Secretary', '7077777175.0', '', 'active', NULL, NULL),
(79, 'Seven up bottling company', 'Food and Beverages', '', '7upbottling@gmail.com', '8056491028.0', NULL, 'Nigeria', 'F.C.T.', NULL, 'Idu industrial area , Abuja', NULL, '9032806.0', '9397472.0', NULL, 'Www.7up.com', '1960-01-01', '1000.0', '', 'Mr Anthony', 'Manager', '8056491028.0', '', 'active', NULL, NULL),
(80, 'Fulgo Food company limited', 'Food and Beverages', '', 'Fulgrofoods@gmail.com', '8023021924.0', NULL, 'Nigeria', 'F.C.T.', NULL, 'Block b 10 same global estate Abuja', NULL, '8969970.0', '7440554.0', NULL, '', '2009-01-01', '500.0', '', '', 'Manager', '8023021924.0', '', 'active', NULL, NULL),
(81, 'Halibiz Industries Limited', 'Food and Beverages', '', 'Halibizindustries@gmail.com', '7017777050.0', NULL, 'Nigeria', 'F.C.T.', NULL, 'Halibizindustries@gmail.com', NULL, '9041831.0', '7365671.0', NULL, '', '2009-01-01', '150.0', '', 'Mahmud Ahmed', 'Manager', '7017777050.0', '', 'active', NULL, NULL),
(82, 'Halmat Rice mills', 'Food and Beverages', 'Milling', 'Halmaricemill@gmail.com', '8059847498.0', NULL, 'Nigeria', 'F.C.T.', NULL, 'Plot no 206 Cadastral zone c Idu industrial layout Abuja', NULL, '9036347.0', '7394420.0', NULL, '', '2016-01-01', '100.0', '', 'Abubakar Remi', 'Manager', '8059846498.0', '', 'active', NULL, NULL),
(83, 'Nochiz Food limited', 'Food and Beverages', 'Food production and processing', 'Nochizfood@gmail.com', '8035901701.0', NULL, 'Nigeria', 'F.C.T.', NULL, 'Plot 38a Kano Emirate lane ,dakwo Abuja', NULL, '9077655.0', '7398677.0', NULL, '', '2013-01-01', '100.0', '', 'Odima Chibuzor Sandra', 'Manager', '8035901701.0', '', 'active', NULL, NULL),
(84, 'Citi Rood Aluminium Company', 'Basic Metal, Iron and Steel', '', 'Citiroofaluminum@gmail.com', '8036703370.0', NULL, 'Nigeria', 'F.C.T.', NULL, 'Plot 67/71 Idu industrial Area', NULL, '90646956.0', '73402749.0', NULL, '', '2012-01-01', '100.0', 'Sandra Imooje', 'Nwadike Patrick', 'Manager', '8036703370.0', '', 'active', NULL, NULL),
(85, 'Korstin miller limited', 'Basic Metal, Iron and Steel', '', 'Korstinmiller@yahoo.com', '8028618548.0', NULL, 'Nigeria', 'F.C.T.', NULL, 'Idu industrial area Abuja', NULL, '9668483.0', '7339090.0', NULL, 'Www.kostinmuller.net', '2015-01-01', '70.0', '', 'Pius Aneke', 'Manager', '8028618548.0', '', 'active', NULL, NULL),
(86, 'EBM system Nigeria', 'Basic Metal, Iron and Steel', '', 'EBMsystems@gmail.com', '8168304229.0', NULL, 'Nigeria', 'F.C.T.', NULL, 'Plot 34 (adzone c16 Idu industrial )', NULL, '90637227.0', '73381531.0', NULL, '', '1994-01-01', '100.0', '', 'Onion Oyameda', 'Manager', '8168304229.0', '', 'active', NULL, NULL),
(87, 'Abuja steel mills limited', 'Basic Metal, Iron and Steel', '', 'Abujasteelmills@yahoo.com', '8096090111.0', NULL, 'Nigeria', 'F.C.T.', NULL, '', NULL, '10426941.0', '6277201.0', NULL, '', '2010-01-01', '70.0', '', 'Lanre Ogunyobe', 'Manager', '8096090111.0', '', 'active', NULL, NULL),
(88, 'Chimed Roof tiles & Aluminum co ltd', 'Basic Metal, Iron and Steel', '', 'Chimedroof@gmail.com', '8033442743.0', NULL, 'Nigeria', 'F.C.T.', NULL, 'Idu industrial Area, Amac', NULL, '9064826.0', '73251866.0', NULL, '', '2017-01-01', '40.0', '', 'Chinedu Ikechukwu', 'Manager', '8033442743.0', '', 'active', NULL, NULL),
(89, 'Afrifab steel limited', 'Basic Metal, Iron and Steel', '', 'Afrifabsteel@gmail.com', '8035825566.0', NULL, 'Nigeria', 'F.C.T.', NULL, 'Abuja', NULL, '8915214.0', '6691761.0', NULL, '', '2010-01-01', '100.0', '', 'Fredrick Ama', 'Manager', '8035825566.0', '', 'active', NULL, NULL),
(90, 'Nduamaka metallic products trading company', 'Basic Metal, Iron and Steel', '', 'Nduamakametal@gmail.com', '8183559044.0', NULL, 'Nigeria', 'F.C.T.', NULL, 'Plot 11& 13 Idu industrial Area , Amac', NULL, '90637227.0', '73381532.0', NULL, '', '2005-01-01', '100.0', '', 'Nduamaka Chibueze', 'Manager', '8183559044.0', '', 'active', NULL, NULL),
(91, 'Citi roof Aluminum', 'Basic Metal, Iron and Steel', '', 'Citiroofaluminum@gmail.com', '8036703370.0', NULL, 'Nigeria', 'F.C.T.', NULL, 'Plot 67/71 Idu industrial area', NULL, '90646956.0', '73402749.0', NULL, '', '2011-01-01', '100.0', 'Sandra Imooje', 'Nwadike Patrick', 'Manager', '8036703370.0', '', 'active', NULL, NULL),
(92, 'Rocco Foods Limited', 'Basic Metal, Iron and Steel', '', '', '8091111222.0', NULL, 'Nigeria', 'Lagos', NULL, 'Plot 20 yelekest Orugun , Alausa ikeja Lagos', NULL, '63619.0', '32055.0', NULL, '', '2009-01-01', '100.0', 'Keneth Ogwu', 'Keneth Ogwu', 'Manager', '8091111222.0', '', 'active', NULL, NULL),
(93, 'Euro Global Food & Distilleries Ltd', 'Basic Metal, Iron and Steel', 'Drink production', 'Www.eurodistl.com.ng', '8127191264.0', NULL, 'Nigeria', 'Lagos', NULL, '110 Awela road Ota', NULL, '6680900.0', '3202061.0', NULL, '', '2006-01-01', '70.0', '', 'Anthony Ozu', 'Manager', '8127191264.0', '', 'active', NULL, NULL),
(94, 'Aigee Food Company', 'Basic Metal, Iron and Steel', '', '', '9059163680.0', NULL, 'Nigeria', 'Lagos', NULL, '5 kunle odedina St onikoko', NULL, '7133343.0', '3329096.0', NULL, '', '2019-01-01', '150.0', '', 'Temitope Olomodosi', 'HM', '9059163680.0', '', 'active', NULL, NULL),
(95, 'Sun metal industries ltd', 'Basic Metal, Iron and Steel', '', 'Sunmetal@yahoo.com', '8096321119.0', NULL, 'Nigeria', 'Lagos', NULL, 'Plot 1&3 , block xvl, housing , estate corp', NULL, '7117894.0', '3089810.0', NULL, '', '2019-01-01', '50.0', '', 'Engr A Suleiman', 'Manager', '8096321119.0', '', 'active', NULL, NULL),
(96, 'Sfurna global limited', 'Basic Metal, Iron and Steel', '', '', '7015823222.0', NULL, 'Nigeria', 'Lagos', NULL, 'Tapa house off tric Moore road Surulere Lagos', NULL, '6486573.0', '3355063.0', NULL, '', '2005-01-01', '48.0', '', 'Samson ibe', 'Manager', '7015823222.0', '', 'active', NULL, NULL),
(97, 'Sunsteel Industries Ltd', 'Basic Metal, Iron and Steel', '', 'Sunsteel@gmail.com', '7096320365.0', NULL, 'Nigeria', 'Lagos', NULL, 'Plot 1&3 block AR area 8 opic industrial estate Agbara opic', NULL, '6510129.0', '3092959.0', NULL, '', '2008-01-01', '50.0', 'Yusuf idris', 'Mark Adebowale', 'Manager', '', '', 'active', NULL, NULL),
(98, 'Jeason steel company', 'Basic Metal, Iron and Steel', '', 'Jeasonsteel@gmail.com', '9030251668.0', NULL, 'Nigeria', 'Lagos', NULL, 'Industrial estate plot 6a cocoa industrial rd ikeja Lagos', NULL, '6620265.0', '3340334.0', NULL, '', '2009-01-01', '100.0', 'Tosin Akanji', 'Yemi kolawole', 'Personnel manager', '', '', 'active', NULL, NULL),
(99, 'Standard metallurgical Company', 'Basic Metal, Iron and Steel', '', 'Smc@gmail.com', '8145639045.0', NULL, 'Nigeria', 'Lagos', NULL, '35/39 creek rd Apapa Lagos', NULL, '6486439.0', '3376179.0', NULL, '', '2005-01-01', '100.0', '', 'Amina Usman', 'Manager', '7085858548.0', '', 'active', NULL, NULL),
(100, 'Top steel Nig Ltd', 'Basic Metal, Iron and Steel', '', 'Topsteel@gmail.com', '8129970921.0', NULL, 'Nigeria', 'Lagos', NULL, 'Plot 478-479 ikorodu Ind scheme', NULL, '6424921.0', '3415376.0', NULL, '', '2009-01-01', '100.0', '', 'Simeon Ige', 'Manager', '807879192.0', '', 'active', NULL, NULL),
(101, 'Metal Berg manufacturing', 'Basic Metal, Iron and Steel', '', 'Metalberg@gmail.com', '8030442676.0', NULL, 'Nigeria', 'Lagos', NULL, 'Block 16, plot 283 green estate Amuwo Olofin lagos', NULL, '6477925.0', '3312335.0', NULL, '', '2005-01-01', '100.0', 'Ifeoma Abel', 'Oluwatobi Kolawole', 'HR', '8030442676.0', '', 'active', NULL, NULL),
(102, 'Saba steel Industries Nig Ltd', 'Basic Metal, Iron and Steel', '', 'Sabasteel@gmail.com', '8032254136.0', NULL, 'Nigeria', 'Lagos', NULL, '14-16 mission street kirikiri, Apapa Lagos  Lagos', NULL, '6447112.0', '3349665.0', NULL, '', '2010-01-01', '170.0', '', 'Tolu Olukayode', 'Manager', '', '', 'active', NULL, NULL),
(103, 'Atlantic textile man .co ltd', 'Textile', '', 'Atlantictextiles@gmail.com', '9080394145.0', NULL, 'Nigeria', 'Lagos', NULL, 'Plot A block 11 state highway ilupeju mushin Lagos', NULL, '6557008.0', '3358963.0', NULL, '', '2009-01-01', '150.0', '', 'Bamidele Ito', 'Manager', '', '', 'active', NULL, NULL),
(104, 'Sas textiles', 'Textile', '', '', '8188096555.0', NULL, 'Nigeria', 'Lagos', NULL, '3 Adeniran ogunsanya street surulere', NULL, '6497197.0', '3358088.0', NULL, 'Www.sastextiles.com', '2010-01-01', '100.0', '', 'Cosmos ibe', 'Manager', '8038446821.0', '', 'active', NULL, NULL),
(105, 'Furniture Elite Ltd', 'Wood and Furniture', '', 'Furnitureelite@gmail.com', '8085408899.0', NULL, 'Nigeria', 'Lagos', NULL, '159 Herbert Macauley way Lagos', NULL, '6492126.0', '3381828.0', NULL, '', '2013-01-01', '50.0', '', 'Kunle Ige', 'Manager', '8085408899.0', '', 'active', NULL, NULL),
(106, 'Extracon Nigeria Ltd', 'Wood and Furniture', '', 'Extracon@gmail.com', '8059116469.0', NULL, 'Nigeria', 'Lagos', NULL, 'Plot 526 Lateef Jakande rd omole Lagos', NULL, '6624358.0', '3352713.0', NULL, 'Www.extraconltd.com', '2010-01-01', '100.0', '', 'Adesogom Ibrahim', 'Manager', '8023251923.0', '', 'active', NULL, NULL),
(107, 'Newform furniture', 'Wood and Furniture', 'Manufacturing', 'Newformfurniture@gmail.com', '8083971990.0', NULL, 'Nigeria', 'Lagos', NULL, 'Industry way 10 dupe otegbola Lagos', NULL, '6450758.0', '3272655.0', NULL, '', '2015-01-01', '50.0', 'Leonard igwe', 'Efiong Ubong', 'Manager', '', '', 'active', NULL, NULL),
(108, 'Adebowale furniture industries', 'Wood and Furniture', '', 'Adebowalefurniture@gmail.com', '9094822815.0', NULL, 'Nigeria', 'Lagos', NULL, '46 Isaac Johnson street Lagos', NULL, '6583566.0', '3357586.0', NULL, '', '2018-01-01', '35.0', 'Bayo Ade', 'John Eke', 'Manager', '', '', 'active', NULL, NULL),
(109, 'Daworo modern furniture company', 'Wood and Furniture', '', 'Daworofurnitures@gmail.com', '8064739922.0', NULL, 'Nigeria', 'Lagos', NULL, '3 mudal lawal stadium, opposite fatigbems filling station Asero Lagos', NULL, '6847831.0', '3312435.0', NULL, '', '2008-01-01', '70.0', '', 'Dele Abiola', 'Manager', '', '', 'active', NULL, NULL),
(110, 'Cyrus wood crafters', 'Wood and Furniture', '', 'Cyruswood@gmail.com', '8035397150.0', NULL, 'Nigeria', 'Lagos', NULL, '252 murtala Muhammed way Lagos', NULL, '6496580.0', '33773297.0', NULL, '', '2009-01-01', '50.0', '', 'Mustapha Abu', 'Manager', '', '', 'active', NULL, NULL),
(111, 'Castillo majesty furniture', 'Wood and Furniture', '', 'Castollamajestyfurniture@gmail.com', '8034543004.0', NULL, 'Nigeria', 'Lagos', NULL, '15 Agoro odiyan street off Ademola Odeku Lagos', NULL, '6428679.0', '3418384.0', NULL, '', '2007-01-01', '70.0', '', 'Francis Igwe', 'Manager', '', '', 'active', NULL, NULL),
(112, 'Rite foods factory', 'Food and Beverages', '', '', '9053804042.0', NULL, 'Nigeria', 'Lagos', NULL, '', NULL, '6817885.0', '3851559.0', NULL, 'www.ritefoodsltd.com', '2007-01-01', '1000.0', '', 'Deji', 'HR', '9053804042.0', '', 'active', NULL, NULL),
(113, 'Dufil prima foods plc', 'Food and Beverages', '', 'Dufilprimafoods@gmail.com', '8051415290.0', NULL, 'Nigeria', 'Lagos', NULL, '39 Eric Moore road, surulere lagos', NULL, '6485701.0', '3356184.0', NULL, 'www.dufil.com', '2001-01-01', '1500.0', '', 'Okoye christopher', 'Manager', '8051415290.0', '', 'active', NULL, NULL),
(114, 'Deli foods Nigeria ltd', 'Food and Beverages', 'Biscuit production', '', '8150835028.0', NULL, 'Nigeria', 'Lagos', NULL, 'Plot 14 block b ilasange industry scheme apapa', NULL, '6515739.0', '3331893.0', NULL, '', '1998-01-01', '200.0', '', 'Daniel Abbe', 'Assistant manager', '', '', 'active', NULL, NULL),
(115, 'De-United food industries', 'Food and Beverages', '', 'De-unitedfood@gmail.com', '8036004005.0', NULL, 'Nigeria', 'Lagos', NULL, 'Ken 4 idiroko Lagos', NULL, '6683853.0', '3219687.0', NULL, '', '1996-01-01', '200.0', '', 'Remi omoti', 'Manager', '', '', 'active', NULL, NULL),
(116, 'Chikki Foods industries ltd', 'Food and Beverages', 'Noodle production', '', '8102510020.0', NULL, 'Nigeria', 'Lagos', NULL, '88a ojolane dolphin estate ikoyi Lagos', NULL, '6457287.0', '3415020.0', NULL, '', '2005-01-01', '200.0', '', 'Bola Adebanji', 'HR', '', '', 'active', NULL, NULL),
(117, 'Bernescco ventures', 'Food and Beverages', '', 'Bernesccoventures@gmail.com', '8037185660.0', NULL, 'Nigeria', 'Lagos', NULL, 'Block Y165 Lekki Ajah Lagos', NULL, '6548566.0', '3143613.0', NULL, '', '2008-01-01', '50.0', '', 'Ben ikoyi', 'Manager', '8037185660.0', '', 'active', NULL, NULL),
(118, 'Austen foods & beverages ltd', 'Food and Beverages', '', 'Ladesmall@gnail.com', '8186014986.0', NULL, 'Nigeria', 'Lagos', NULL, '17 obaniko street off ikorodu road obankoro lagos', NULL, '6548195.0', '3370151.0', NULL, '', '2018-01-01', '70.0', 'Damilola Osimiga Idris', 'Ridwan Oloyede', 'Manager', '8186014986.0', '', 'active', NULL, NULL),
(119, 'Gem Petrochemical Co.NIG Ltd', 'Petrochemicals', '', 'Gempetrochemical@yahoo.com', '8066684433.0', NULL, 'Nigeria', 'Lagos', NULL, '19a milverton Road ikoyi Lagos', NULL, '6448305.0', '3448061.0', NULL, '', '1999-01-01', '850.0', '', 'Ayo Remi', 'Manager', '', '', 'active', NULL, NULL),
(120, 'Falcon petrochemicals Ltd', 'Petrochemicals', '', 'Falconpetrochemical@gmail.com', '9072703844.0', NULL, 'Nigeria', 'Lagos', NULL, '28 Kemi fani-kayode ave ikeja Lagos', NULL, '6575285.0', '3353044.0', NULL, '', '2005-01-01', '100.0', '', 'Ayo Adebanjo', 'Manager', '', '', 'active', NULL, NULL),
(121, 'Matrix Petrochemical Ltd', 'Petrochemicals', '', 'Lag@matrixpetrochemical.com', '8141234548.0', NULL, 'Nigeria', 'Lagos', NULL, 'Wilmer street ilupeju Lagos', NULL, '6556932.0', '3361875.0', NULL, 'www.matrixenergygroup.com', '2007-01-01', '500.0', '', 'Paul segun', 'Manager', '8035536957.0', '', 'active', NULL, NULL),
(122, 'Drilling fluids & chemicals industry ltd', 'Petrochemicals', 'Drilling', 'Drillingfluidschems@gmail.com', '8149135653.0', NULL, 'Nigeria', 'Rivers', NULL, '11 Alex well close mgolosimiri port harcourt', NULL, '6978495.0', '4808780.0', NULL, 'www.dfci.com.ng', NULL, '2014.0', '', 'Ikenna Nwaka', 'Manager', '', '', 'active', NULL, NULL),
(123, 'Indorama Eleme petrochemicals ltd', 'Petrochemicals', '', 'Iplmarketing@ng.indorama.com', '', NULL, 'Nigeria', 'Rivers', NULL, 'Eats west express way , Eleme port harcourt', NULL, '7098948.0', '4828680.0', NULL, '', '2006-01-01', '1500.0', '', 'Mathins T', 'Manager', '8164401567.0', '', 'active', NULL, NULL),
(124, 'Shoreline chemicals & oil services', 'Petrochemicals', '', 'Shorelinechems@gmail.com', '23484239429.0', NULL, 'Nigeria', 'Rivers', NULL, 'Phase 2 ,10D king perekule st GRA PH', NULL, '6997841.0', '4822013.0', NULL, '', '2002-01-01', '150.0', '', 'Olumide O', 'Manager', '84461886.0', '', 'active', NULL, NULL),
(125, 'Eleme Petrochemicals limited', 'Petrochemicals', '', 'Elemepetrochemical@yahoo.com', '8055038733.0', NULL, 'Nigeria', 'Rivers', NULL, '', NULL, '7038924.0', '4825063.0', NULL, '', '1996-01-01', '2000.0', '', 'Vijay Dhar', 'Manager', '8055038733.0', '', 'active', NULL, NULL),
(126, 'Matrix Petrochem Ltd', 'Petrochemicals', '', 'Phc@matrixpetrochem.com', '8035536957.0', NULL, 'Nigeria', 'Rivers', NULL, 'Plot 3c trans amadi rd port harcourt', NULL, '7034110.0', '4835424.0', NULL, '', '2007-01-01', '1800.0', '', 'Eugene ikueze', 'Personnel manager', '8035536857.0', '', 'active', NULL, NULL),
(127, 'Precision Engineering & procurement', 'Petrochemicals', '', 'Precisionengineering@gmail.com', '8033104470.0', NULL, 'Nigeria', 'Rivers', NULL, '55 Emekuku Str Trans amadi port harcourt', NULL, '6999497.0', '4812499.0', NULL, '', '2011-01-01', '100.0', '', 'Dotun Abdul', 'Manager', '', '', 'active', NULL, NULL),
(128, 'Arco petrochemical engineering company', 'Petrochemicals', '', 'Arco.maintenance@arco.group.com', '23484462482.0', NULL, 'Nigeria', 'Rivers', NULL, '69 king perekule street Elechi Port harcourt', NULL, '6997841.0', '4822013.0', NULL, 'www.arco.group.nymria.com', '2015-01-01', '170.0', '', 'Frank Iroha', 'Admin', '23484462482.0', '', 'active', NULL, NULL),
(129, 'Bigi foods', 'Food and Beverages', '', 'Bigifood@yahoo.com', '8147444234.0', NULL, 'Nigeria', 'Rivers', NULL, 'Rumuola port harcourt', NULL, '7004691.0', '4830545.0', NULL, '', '2015-01-01', '70.0', '', 'Angela Ofor', 'Admin', '', '', 'active', NULL, NULL),
(130, 'Roseene Foods', 'Food and Beverages', '', 'Roseeniekpo@gmail.com', '7041091908.0', NULL, 'Nigeria', 'Rivers', NULL, 'Makele street mguoba port harcourt', NULL, '6974475.0', '4856300.0', NULL, '', '2018-01-01', '45.0', '', 'Rose iniekpo', 'Manager', '', '', 'active', NULL, NULL),
(131, 'Jowy Foods', 'Food and Beverages', '', 'Jowyfoods@yahoo.com', '8137126430.0', NULL, 'Nigeria', 'Rivers', NULL, 'SARS road port harcourt', NULL, '6966165.0', '4891472.0', NULL, '', '2016-01-01', '20.0', '', 'Zobo John Ibiniyengbo', 'Manager', '', '', 'active', NULL, NULL),
(132, 'Micbibryan global resources', 'Food and Beverages', '', 'Micbibryangresources@gmail.com', '9041233579.0', NULL, 'Nigeria', 'Rivers', NULL, '5 Elekahia rd rumuola Port harcourt', NULL, '7018651.0', '4814804.0', NULL, '', '2014-01-01', '35.0', '', 'Oluoma Isiuga', 'Admin', '8068906460.0', '', 'active', NULL, NULL),
(133, 'Ingibo foods', 'Food and Beverages', '', 'Ingbofoods@gmail.com', '8037558641.0', NULL, 'Nigeria', 'Rivers', NULL, 'Iwofe wimpey, Ada George rd rumu opiri mom PH', NULL, '4824309.0', '4824309.0', NULL, '', '2016-01-01', '30.0', '', 'Fave onward', 'Manager', '8037558641.0', '', 'active', NULL, NULL),
(134, 'Pokobros foods & chemical industry ltd', 'Food and Beverages', '', 'Pokobrosfoodchem@gmail.com', '8033230192.0', NULL, 'Nigeria', 'Rivers', NULL, 'No 1 harbor industrial layout ph', NULL, '4842883.0', '7040199.0', NULL, '', '2006-01-01', '100.0', '', 'Ngozi Florence', 'Admin', '', '', 'active', NULL, NULL),
(135, 'Camsy foods', 'Food and Beverages', '', 'Camsyfoods@gmail.com', '8068657647.0', NULL, 'Nigeria', 'Rivers', NULL, 'No 6 Elekahea Housing estate ph', NULL, '7024828.0', '4820827.0', NULL, '', '2018-01-01', '25.0', '', 'Onyinye Arinze', 'Manager', '', '', 'active', NULL, NULL),
(136, 'Chyozyn Foods', 'Food and Beverages', '', 'Chyozynfoods@gmail.com', '9028931177.0', NULL, 'Nigeria', 'Rivers', NULL, 'No 70 Ada George road PH', NULL, '6976599.0', '4829585.0', NULL, '', '2017-01-01', '25.0', '', 'Osioma Chidiogo', 'Manager', '9028931177.0', '', 'active', NULL, NULL),
(137, 'Comclose limited', 'Food and Beverages', '', 'Comclose@gmail.com', '8038647383.0', NULL, 'Nigeria', 'Rivers', NULL, '47 old Aba rd , rumuomasi PH', NULL, '7027677.0', '4838875.0', NULL, '', '2018-01-01', '20.0', '', 'Osita Stanley', 'Manager', '8038647383.0', '', 'active', NULL, NULL),
(138, 'Quikkey foods & beverages ltd', 'Food and Beverages', '', 'Quikkeyfood@gmail.com', '7033515712.0', NULL, 'Nigeria', 'Rivers', NULL, '15 nkwaka, rummudomiya ph', NULL, '6996089.0', '4888687.0', NULL, '', '2018-01-01', '20.0', '', 'Emmanuel Osere', 'Manager', '', '', 'active', NULL, NULL),
(139, 'International Breweries Ltd', 'Food and Beverages', '', 'Internationalbreweries@gmail.com', '23484330243.0', NULL, 'Nigeria', 'Rivers', NULL, '', NULL, '7037951.0', '4827315.0', NULL, '', '1978-01-01', '375.0', '', 'Charles Ugo', 'Admin', '', '', 'active', NULL, NULL),
(140, 'Fabrics Point Fabrics', 'Textile', '', 'Fabricspointfabric@gmail.com', '8063404371.0', NULL, 'Nigeria', 'Rivers', NULL, '21 Rumudaolo by rumuola ph', NULL, '6997446.0', '4872867.0', NULL, '', '2019-01-01', '25.0', '', 'Linda Abel', 'Manager', '8063404371.0', '', 'active', NULL, NULL),
(141, 'Flex fabrics', 'Textile', '', 'Flexfabrics@gmail.com', '7038491167.0', NULL, 'Nigeria', 'Rivers', NULL, 'Aba rd ph', NULL, '6981181.0', '4824747.0', NULL, '', '2018-01-01', '25.0', '', 'Matthew Fabiyi', 'Admin', '7038491167.0', '', 'active', NULL, NULL),
(142, 'Lawson garments', 'Textile', '', 'Lawsongarments@gmail.com', '8032907451.0', NULL, 'Nigeria', 'Rivers', NULL, '', NULL, '6981395.0', '4827283.0', NULL, '', '2015-01-01', '35.0', '', 'Lawson', 'Manager', '8032907451.0', '', 'active', NULL, NULL),
(143, 'SRJ Textiles ng Ltd', 'Textile', '', 'SRJTextiles@gmail.com', '8030868142.0', NULL, 'Nigeria', 'Rivers', NULL, 'Ground floor shonori plaza 21 old Aba rd Rumuola Ph', NULL, '7023538.0', '4836175.0', NULL, '', '2017-01-01', '45.0', '', 'Onyebuchi Davwa Kalu', 'Manager', '8030868142.0', '', 'active', NULL, NULL),
(144, 'Port harcourt fabrics', 'Textile', '', 'Porharcourtfabric@gmail.com', '7042188987.0', NULL, 'Nigeria', 'Rivers', NULL, '1 mercy house no 39 farm road elwuzu rd ph', NULL, '7034915.0', '4875649.0', NULL, '', '2019-01-01', '20.0', '', 'Chineye Ugwu', 'Manager', '7042188987.0', '', 'active', NULL, NULL),
(145, 'Fortunate Steel & Industrialmat .co. Ltd', 'Basic Metal, Iron and Steel', '', 'Furtunatesteelltd@gmail.com', '7088187178.0', NULL, 'Nigeria', 'Rivers', NULL, 'By interlink junction, km 17 Aba/Portharcourt expressway, Iriebe, Port-Harcourt', NULL, '7091683.0', '4864660.0', NULL, '', '2012-01-01', '70.0', '', 'Chinwe Egbj', 'Admin', '7088187178.0', '', 'active', NULL, NULL),
(146, 'Dachea for Industries ng ltd', 'Basic Metal, Iron and Steel', '', 'Dacheaforindustries@gmail.com', '8035424116.0', NULL, 'Nigeria', 'Rivers', NULL, 'Kilometer 17 ph/aba expressway by tollgate bus stop, port harcourt', NULL, '7049606.0', '4816457.0', NULL, '', '2016-01-01', '50.0', '', 'Chika Danchia', 'Manager', '8033068112.0', '', 'active', NULL, NULL),
(147, 'Metal Phil’s Engineering', 'Basic Metal, Iron and Steel', '', 'philsmetal@gmail.com', '8036969552.0', NULL, 'Nigeria', 'Rivers', NULL, '49 Oroazi road, rumiafrikom, port harcourt', NULL, '6990112.0', '4829967.0', NULL, '', '2006-01-01', '55.0', '', 'Rashidat Yusuf', 'Admin', '8036969552.0', '', 'active', NULL, NULL),
(148, 'Iron in naija Ltd', 'Basic Metal, Iron and Steel', '', 'ironnaija@gmail.com', '9069012105.0', NULL, 'Nigeria', 'Rivers', NULL, '441 Ikwere road, Rumugbo, Port harcourt', NULL, '6992857.0', '4854639.0', NULL, '', '2015-01-01', '70.0', '', 'Solomon Ikpo', 'Manager', '9069012105.0', '', 'active', NULL, NULL),
(149, 'Befallen Metal & Steel works', 'Basic Metal, Iron and Steel', '', 'Bezalelmetalsteel@yahoo.com', '8173980007.0', NULL, 'Nigeria', 'Rivers', NULL, '24 Chief Nwuke street, Trans Amadi, PH', NULL, '7031753.0', '4807419.0', NULL, '', '2007-01-01', '70.0', '', 'Mrs Nworu', 'Admin', '8173980007.0', '', 'active', NULL, NULL),
(150, 'Vandreezer Industrial Base', 'Basic Metal, Iron and Steel', '', 'Info@vandrezzerenergy.com', '8188855717.0', NULL, 'Nigeria', 'Rivers', NULL, 'Trans Woji road, woji, Portharcourt', NULL, '7048923.0', '4817808.0', NULL, '', '2006-01-01', '100.0', '', 'Okeke Nkemakonam Frank', 'Admin', '8188855717.0', '', 'active', NULL, NULL),
(151, 'Iron Ox Metal Works Limited', 'Basic Metal, Iron and Steel', '', 'Ironoxmetal@gmail.com', '8102156649.0', NULL, 'Nigeria', 'Rivers', NULL, '27 Elf Road, Industrial Layout, Trans Amado, Port Harcourt', NULL, '7028928.0', '4812504.0', NULL, '', '2006-01-01', '100.0', '', 'Morgan Eke', 'Manager', '8065888999.0', '', 'active', NULL, NULL),
(152, 'Ekebiz steel company limited', 'Basic Metal, Iron and Steel', '', '', '8036670836.0', NULL, 'Nigeria', 'Rivers', NULL, 'Chief Tom Agbuji road, Woji, Port harcourt', NULL, '4809837.0', '6993599.0', NULL, 'ekebizsteel@gmail.com', '2013-01-01', '50.0', '', 'Benson Eke', 'Manager', '8036670836.0', '', 'active', NULL, NULL),
(153, 'Opus woodwork venture', 'Wood and Furniture', '', 'Opuswoodng@gmail.com', '8065411483.0', NULL, 'Nigeria', 'Rivers', NULL, '2a Aggrey road, port harcourt', NULL, '70170009.0', '47613741.0', NULL, '', '2018-01-01', '50.0', '', 'Mr Opubo Romeo', 'Manager', '8065411483.0', '', 'active', NULL, NULL),
(154, 'Moneysworth Interiors', 'Wood and Furniture', '', 'moneysworthi@gmail.com', '8034064373.0', NULL, 'Nigeria', 'Rivers', NULL, '30 Ken sarowiwa road, Rumunola, Port- harcourt', NULL, '7015157.0', '4830283.0', NULL, '', '2016-01-01', '50.0', '', 'Gbenga Terebo', 'Admin', '8034064373.0', '', 'active', NULL, NULL),
(155, 'EL-Bethel furniture company', 'Wood and Furniture', '', 'El-bethelfurniture@gmail.com', '8033396168.0', NULL, 'Nigeria', 'Rivers', NULL, 'Amadi flat 22, ohia street, old gra, orogbum, pot-harcourt', NULL, '70125157.0', '47923598.0', NULL, '', '2013-01-01', '52.0', '', 'Mr El Bethel', 'Personnel Manager', '8033396168.0', '', 'active', NULL, NULL),
(156, 'Kelly Williams Furniture', 'Wood and Furniture', '', 'Kellywilliamsfurniture@yahoo.com', '8036745512.0', NULL, 'Nigeria', 'Rivers', NULL, '581 Ikwerre road, rumuigbo, port-harcourt', NULL, '6991803.0', '4850434.0', NULL, '', '2015-01-01', '50.0', '', 'Best Oziegbe', 'Manager', '8062694565.0', '', 'active', NULL, NULL),
(157, 'Harem Dream Furniture', 'Wood and Furniture', '', 'HareemDreamFurniture@gmail.com', '8062694565.0', NULL, 'Nigeria', 'Rivers', NULL, '304 Sani Abacha road, rumueme, Port-harcourt', NULL, '6990753.0', '4816086.0', NULL, '', '2014-01-01', '70.0', '', 'Dennis Nkimokwa', 'Admin', '8062694565.0', '', 'active', NULL, NULL),
(158, 'Woodworks furniture', 'Wood and Furniture', '', 'Woodwork@gmail.com', '8099086214.0', NULL, 'Nigeria', 'Rivers', NULL, '56 Ikwerre road, mgbuosimrri, port-harcourt', NULL, '6981667.0', '4826126.0', NULL, '', '2014-01-01', '70.0', '', 'Mr Ubaida', 'Manager', '8099086214.0', '', 'active', NULL, NULL),
(159, 'Coteck furniture ltd', 'Wood and Furniture', '', 'coteckfurniture@gmail.com', '8088844684.0', NULL, 'Nigeria', 'Rivers', NULL, '11 Collyns owhonda street, eagle island, port-harcourt', NULL, '69811334.0', '4806162.0', NULL, '', '2014-01-01', '80.0', '', 'Chinasa Ezemonye', 'Manager', '8088844684.0', '', 'active', NULL, NULL),
(160, 'Oichu-lofu wood craft', 'Wood and Furniture', '', 'Oichulufowood@gmail.com', '7031596389.0', NULL, 'Nigeria', 'Rivers', NULL, '6 Peter Odili road, rainbow town, port-harcourt', NULL, '7038577.0', '4799607.0', NULL, '', '2014-01-01', '80.0', '', 'Godwin Ocho', 'Manager', '7035363539.0', '', 'active', NULL, NULL);
INSERT INTO `companies` (`company_id`, `company_name`, `industry`, `industry_process`, `email`, `primary_phone_number`, `secondary_phone_number`, `country`, `state`, `city`, `address`, `zip_code`, `longitude`, `latitude`, `mgrs`, `website_url`, `date_of_establishment`, `number_of_employees`, `operations_manager`, `contact_person_full_name`, `contact_person_position`, `contact_person_contact_number`, `is_sharable`, `status`, `created_at`, `updated_at`) VALUES
(161, 'VIVA PLASTIC & METAL CO.LTD', 'Lubricants and Petrochemical Products', NULL, 'office@decentpolybag.com', '+2349029783729', '+2349029783729', 'Nigeria', 'Kano', 'Kano', 'KM 18 HADEJA ROAD, GUNDUNWA , KANO', NULL, '8.63136657', '12.0072910', NULL, '', '1998-01-01', '647', '[{\"value\":\"2\",\"name\":\"Joseph Atuma\",\"avatar\":\"https://ui-avatars.com/api/?name=Joseph%20Atuma\",\"email\":\"joeseph24@gmail.com\",\"role\":\"user\"}]', 'ALIYU NABESU', 'CONSULTANT', '+2349029783729', 'inactive', 'active', '2025-07-14 08:45:38', '2025-07-14 08:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `company_chemicals`
--

DROP TABLE IF EXISTS `company_chemicals`;
CREATE TABLE IF NOT EXISTS `company_chemicals` (
  `company_chemical_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_id` bigint UNSIGNED NOT NULL,
  `chemical_id` bigint UNSIGNED NOT NULL,
  `quantity_per_unit` decimal(15,2) DEFAULT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minimum_threshold` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maximum_threshold` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `storage_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hazardous` tinyint(1) NOT NULL DEFAULT '0',
  `status` enum('active','inactive','banned') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`company_chemical_id`),
  KEY `company_chemicals_company_id_foreign` (`company_id`),
  KEY `company_chemicals_chemical_id_foreign` (`chemical_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_chemicals`
--

INSERT INTO `company_chemicals` (`company_chemical_id`, `company_id`, `chemical_id`, `quantity_per_unit`, `unit`, `minimum_threshold`, `maximum_threshold`, `storage_location`, `hazardous`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 20.00, 'litre', '0.02', '0.02', NULL, 0, 'active', 0, '2025-10-31 19:14:11', '2025-10-31 19:14:11');

-- --------------------------------------------------------

--
-- Table structure for table `company_departments`
--

DROP TABLE IF EXISTS `company_departments`;
CREATE TABLE IF NOT EXISTS `company_departments` (
  `DepartmentID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `DepartmentName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ManagerIDs` json DEFAULT NULL,
  `CompanyID` bigint UNSIGNED NOT NULL,
  `Status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`DepartmentID`),
  KEY `company_departments_companyid_foreign` (`CompanyID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_departments`
--

INSERT INTO `company_departments` (`DepartmentID`, `DepartmentName`, `ManagerIDs`, `CompanyID`, `Status`, `created_at`, `updated_at`) VALUES
(2, 'IT Depatmentment', '\"[\\\"1\\\"]\"', 1, 'Active', '2025-10-29 13:59:57', '2025-10-29 14:51:25');

-- --------------------------------------------------------

--
-- Table structure for table `company_employees`
--

DROP TABLE IF EXISTS `company_employees`;
CREATE TABLE IF NOT EXISTS `company_employees` (
  `EmployeeID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `CompanyID` bigint UNSIGNED NOT NULL,
  `FirstName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LastName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PhoneNumber` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Gender` enum('Male','Female','Other') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `JobTitle` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DepartmentID` bigint UNSIGNED NOT NULL,
  `HireDate` date DEFAULT NULL,
  `Status` enum('Active','Inactive','On Leave','Terminated') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `Address` text COLLATE utf8mb4_unicode_ci,
  `City` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `State` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ZipCode` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Country` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EmergencyContact` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EmergencyPhone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ProfilePicture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EmployeeNumber` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `LastLogin` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`EmployeeID`),
  UNIQUE KEY `company_employees_email_unique` (`Email`),
  KEY `company_employees_companyid_foreign` (`CompanyID`),
  KEY `company_employees_departmentid_foreign` (`DepartmentID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_employees`
--

INSERT INTO `company_employees` (`EmployeeID`, `CompanyID`, `FirstName`, `LastName`, `Email`, `PhoneNumber`, `DateOfBirth`, `Gender`, `JobTitle`, `DepartmentID`, `HireDate`, `Status`, `Address`, `City`, `State`, `ZipCode`, `Country`, `EmergencyContact`, `EmergencyPhone`, `ProfilePicture`, `EmployeeNumber`, `password`, `is_delete`, `LastLogin`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 1, 'Joseph', 'Atuma', 'delight@gmail.com', '+2349078600016', '2025-10-07', 'Male', 'manager', 2, '2025-10-22', 'Active', 'Obasie Amobi Street', 'Abuja', 'Federal Capital Territory', '900103', 'Nigeria', NULL, NULL, 'profile_pictures/hpKs2FjQ1hkBeB4hXmQpsLM5ZX42X9u7dSyjHEd6.jpg', 'emp000', '$2y$10$nmIiIOoAQzZWIafxbUn.5eM3dzm2uHzG5vG/fdAJIrIN0U.Pl8E0K', 0, NULL, '2025-10-31 13:46:42', '2025-10-31 13:46:42', NULL),
(5, 1, 'Joseph', 'Atuma', 'atumajoe24@gmail.com', '+2349078600016', '2025-10-08', 'Male', 'supervisor', 2, '2025-10-27', 'Active', 'Obasie Amobi Street', 'Abuja', 'Federal Capital Territory', '900103', 'Nigeria', '09078600017', '09078600016', 'profile_pictures/kIxC2HP7WIEOMSWOj9vekPNl7iz29bLpcJsX8PuU.jpg', 'emp1222', '$2y$10$jkCNUqhha.ndglxeYsEW.OagDxEsSYxnByM2fgK57zNOwP3Z2IoRa', 0, NULL, '2025-10-30 11:24:48', '2025-10-30 11:24:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_employees_attendances`
--

DROP TABLE IF EXISTS `company_employees_attendances`;
CREATE TABLE IF NOT EXISTS `company_employees_attendances` (
  `AttendanceID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `CompanyID` bigint UNSIGNED NOT NULL,
  `EmployeeID` bigint UNSIGNED NOT NULL,
  `CheckIn` datetime DEFAULT NULL,
  `CheckOut` datetime DEFAULT NULL,
  `Status` enum('Present','Absent','On Leave','Late') COLLATE utf8mb4_unicode_ci NOT NULL,
  `Remarks` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`AttendanceID`),
  KEY `company_employees_attendances_companyid_foreign` (`CompanyID`),
  KEY `company_employees_attendances_employeeid_foreign` (`EmployeeID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_employee_trainings`
--

DROP TABLE IF EXISTS `company_employee_trainings`;
CREATE TABLE IF NOT EXISTS `company_employee_trainings` (
  `TrainingID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `EmployeeID` bigint UNSIGNED NOT NULL,
  `ProgramID` bigint UNSIGNED NOT NULL,
  `CompletionStatus` enum('Not Started','In Progress','Completed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `CompanyID` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`TrainingID`),
  KEY `company_employee_trainings_companyid_foreign` (`CompanyID`),
  KEY `company_employee_trainings_employeeid_foreign` (`EmployeeID`),
  KEY `company_employee_trainings_programid_foreign` (`ProgramID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_leave_management`
--

DROP TABLE IF EXISTS `company_leave_management`;
CREATE TABLE IF NOT EXISTS `company_leave_management` (
  `LeaveRequestID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `EmployeeID` bigint UNSIGNED NOT NULL,
  `LeaveType` enum('Sick Leave','Casual Leave','Paid Leave','Unpaid Leave') COLLATE utf8mb4_unicode_ci NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `Status` enum('Pending','Approved','Rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `Remarks` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `CompanyID` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`LeaveRequestID`),
  KEY `company_leave_management_companyid_foreign` (`CompanyID`),
  KEY `company_leave_management_employeeid_foreign` (`EmployeeID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_materials`
--

DROP TABLE IF EXISTS `company_materials`;
CREATE TABLE IF NOT EXISTS `company_materials` (
  `companyMaterialId` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `companyID` bigint UNSIGNED NOT NULL,
  `materialID` bigint UNSIGNED NOT NULL,
  `quantity_per_unit` decimal(15,2) DEFAULT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minimum_threshold` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maximum_threshold` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `storage_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hazardous` tinyint(1) NOT NULL DEFAULT '0',
  `status` enum('active','inactive','banned') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`companyMaterialId`),
  KEY `company_materials_companyid_foreign` (`companyID`),
  KEY `company_materials_materialid_foreign` (`materialID`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_materials`
--

INSERT INTO `company_materials` (`companyMaterialId`, `companyID`, `materialID`, `quantity_per_unit`, `unit`, `minimum_threshold`, `maximum_threshold`, `storage_location`, `hazardous`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(13, 1, 2, 20.00, 'tonne', '0.05', '0.04', NULL, 0, 'active', 0, '2025-11-01 07:36:02', '2025-11-01 07:36:02'),
(12, 1, 1, 20.00, 'tonne', '2', '2', 'abuja', 0, 'active', 0, '2025-10-31 22:24:37', '2025-10-31 22:24:37');

-- --------------------------------------------------------

--
-- Table structure for table `company_objectives`
--

DROP TABLE IF EXISTS `company_objectives`;
CREATE TABLE IF NOT EXISTS `company_objectives` (
  `companyobjectiveID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `companyID` bigint UNSIGNED NOT NULL,
  `objective_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`companyobjectiveID`),
  KEY `company_objectives_objective_id_foreign` (`objective_id`),
  KEY `company_objectives_companyid_foreign` (`companyID`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_objectives`
--

INSERT INTO `company_objectives` (`companyobjectiveID`, `companyID`, `objective_id`, `created_at`, `updated_at`) VALUES
(23, 2, 2, '2025-07-30 16:29:22', '2025-07-30 16:29:22'),
(22, 1, 6, '2025-07-29 08:22:38', '2025-07-29 08:22:38'),
(21, 1, 5, '2025-07-29 08:22:36', '2025-07-29 08:22:36'),
(20, 1, 3, '2025-07-29 08:22:25', '2025-07-29 08:22:25'),
(17, 1, 9, '2025-07-29 08:17:34', '2025-07-29 08:17:34'),
(18, 1, 2, '2025-07-29 08:22:22', '2025-07-29 08:22:22'),
(19, 1, 1, '2025-07-29 08:22:23', '2025-07-29 08:22:23'),
(24, 2, 5, '2025-07-30 16:29:23', '2025-07-30 16:29:23');

-- --------------------------------------------------------

--
-- Table structure for table `company_operations`
--

DROP TABLE IF EXISTS `company_operations`;
CREATE TABLE IF NOT EXISTS `company_operations` (
  `company_operation_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `operation_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `operation_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operation_type_id` bigint UNSIGNED DEFAULT NULL,
  `operation_category_id` bigint UNSIGNED DEFAULT NULL,
  `labour_cost` decimal(10,2) DEFAULT NULL,
  `overhead_cost` decimal(10,2) DEFAULT NULL,
  `maintenance_cost` decimal(10,2) DEFAULT NULL,
  `depreciation_cost` decimal(10,2) DEFAULT NULL,
  `administration_cost` decimal(10,2) DEFAULT NULL,
  `variable_cost` decimal(10,2) DEFAULT NULL,
  `fixed_cost` decimal(10,2) DEFAULT NULL,
  `total_operation_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operation_unit_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operation_unit_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` bigint UNSIGNED NOT NULL,
  `operation_status` enum('active','completed','pending','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `expected_water_usage_per_operation` decimal(8,2) DEFAULT NULL,
  `expected_materials_used` json DEFAULT NULL,
  `expected_chemicals_used` json DEFAULT NULL,
  `expected_products_produced` json DEFAULT NULL,
  `expected_waste_generated` json DEFAULT NULL,
  `calendar_year_id` bigint UNSIGNED DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`company_operation_id`),
  KEY `company_operations_company_id_foreign` (`company_id`),
  KEY `company_operations_operation_type_id_foreign` (`operation_type_id`),
  KEY `company_operations_operation_category_id_foreign` (`operation_category_id`),
  KEY `company_operations_calendar_year_id_foreign` (`calendar_year_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_payrolls`
--

DROP TABLE IF EXISTS `company_payrolls`;
CREATE TABLE IF NOT EXISTS `company_payrolls` (
  `PayrollID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `CompanyID` bigint UNSIGNED NOT NULL,
  `EmployeeID` bigint UNSIGNED NOT NULL,
  `BasicSalary` decimal(10,2) NOT NULL,
  `Allowances` decimal(10,2) NOT NULL,
  `Deductions` decimal(10,2) NOT NULL,
  `NetPay` decimal(10,2) NOT NULL,
  `PayDate` date NOT NULL,
  `PayPeriodStart` date NOT NULL,
  `PayPeriodEnd` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`PayrollID`),
  KEY `company_payrolls_companyid_foreign` (`CompanyID`),
  KEY `company_payrolls_employeeid_foreign` (`EmployeeID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_performance_reviews`
--

DROP TABLE IF EXISTS `company_performance_reviews`;
CREATE TABLE IF NOT EXISTS `company_performance_reviews` (
  `ReviewID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `EmployeeID` bigint UNSIGNED NOT NULL,
  `ReviewDate` date NOT NULL,
  `ReviewerID` bigint UNSIGNED NOT NULL,
  `Rating` decimal(3,2) NOT NULL,
  `Comments` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `CompanyID` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`ReviewID`),
  KEY `company_performance_reviews_companyid_foreign` (`CompanyID`),
  KEY `company_performance_reviews_employeeid_foreign` (`EmployeeID`),
  KEY `company_performance_reviews_reviewerid_foreign` (`ReviewerID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_policies`
--

DROP TABLE IF EXISTS `company_policies`;
CREATE TABLE IF NOT EXISTS `company_policies` (
  `companypolicyID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `companyID` bigint UNSIGNED NOT NULL,
  `policy_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`companypolicyID`),
  KEY `company_policies_policy_id_foreign` (`policy_id`),
  KEY `company_policies_companyid_foreign` (`companyID`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_policies`
--

INSERT INTO `company_policies` (`companypolicyID`, `companyID`, `policy_id`, `created_at`, `updated_at`) VALUES
(31, 2, 1, '2025-07-30 16:29:26', '2025-07-30 16:29:26'),
(29, 1, 2, '2025-07-30 14:43:45', '2025-07-30 14:43:45'),
(32, 2, 4, '2025-07-30 16:29:28', '2025-07-30 16:29:28'),
(23, 1, 4, '2025-07-28 13:49:14', '2025-07-28 13:49:14'),
(21, 1, 1, '2025-07-28 13:46:27', '2025-07-28 13:46:27');

-- --------------------------------------------------------

--
-- Table structure for table `company_recruitments`
--

DROP TABLE IF EXISTS `company_recruitments`;
CREATE TABLE IF NOT EXISTS `company_recruitments` (
  `RecruitmentID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `JobTitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DepartmentID` bigint UNSIGNED NOT NULL,
  `VacancyCount` int NOT NULL,
  `JobDescription` text COLLATE utf8mb4_unicode_ci,
  `PostingDate` date NOT NULL,
  `ClosingDate` date NOT NULL,
  `Status` enum('Open','Closed','Paused') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `CompanyID` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`RecruitmentID`),
  KEY `company_recruitments_companyid_foreign` (`CompanyID`),
  KEY `company_recruitments_departmentid_foreign` (`DepartmentID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_stages`
--

DROP TABLE IF EXISTS `company_stages`;
CREATE TABLE IF NOT EXISTS `company_stages` (
  `stage_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_id` bigint UNSIGNED NOT NULL,
  `workflow_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `sequence` int NOT NULL DEFAULT '0',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`stage_id`),
  KEY `company_stages_company_id_foreign` (`company_id`),
  KEY `company_stages_workflow_id_foreign` (`workflow_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_stages`
--

INSERT INTO `company_stages` (`stage_id`, `company_id`, `workflow_id`, `name`, `description`, `sequence`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'stage 1', NULL, 3, 'pending', '2025-07-08 14:30:30', '2025-07-08 14:30:30'),
(2, 1, 1, 'stage 2', 'stage 2 saving', 5, 'pending', '2025-07-11 08:37:12', '2025-07-11 08:37:12'),
(3, 1, 2, 'stage 5', 'stage 3 saving', 8, 'pending', '2025-07-11 08:38:45', '2025-07-18 10:51:13'),
(4, 1, 1, 'stage 8', 'stage 8 saving', 4, 'pending', '2025-07-11 09:17:24', '2025-07-11 09:17:24'),
(5, 2, 3, 'Supplier delivery', NULL, 1, 'pending', '2025-07-16 10:49:34', '2025-07-16 10:49:34');

-- --------------------------------------------------------

--
-- Table structure for table `company_stage_tasks`
--

DROP TABLE IF EXISTS `company_stage_tasks`;
CREATE TABLE IF NOT EXISTS `company_stage_tasks` (
  `stage_task_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_id` bigint UNSIGNED NOT NULL,
  `company_stage_id` bigint UNSIGNED NOT NULL,
  `task_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `due_date` date DEFAULT NULL,
  `priority` enum('low','medium','high') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'medium',
  `status` enum('pending','completed','overdue','in_progress','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `supervisor_ids` json DEFAULT NULL,
  `task_tag_ids` json DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `guard` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `updated_guard` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `started_at` timestamp NULL DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`stage_task_id`),
  KEY `company_stage_tasks_company_stage_id_foreign` (`company_stage_id`),
  KEY `company_stage_tasks_company_id_foreign` (`company_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_stage_tasks`
--

INSERT INTO `company_stage_tasks` (`stage_task_id`, `company_id`, `company_stage_id`, `task_name`, `description`, `due_date`, `priority`, `status`, `supervisor_ids`, `task_tag_ids`, `created_by`, `guard`, `updated_by`, `updated_guard`, `is_deleted`, `started_at`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'dying', NULL, '2025-07-09', 'high', 'pending', '\"[\\\"1\\\"]\"', '\"[\\\"6\\\"]\"', 1, 'login_admin_59ba36addc2b2f9401580f014c7f58ea4e30989d', NULL, NULL, 0, NULL, NULL, '2025-07-08 14:46:20', '2025-07-08 14:46:20'),
(2, 1, 2, 'mixing', NULL, '2025-07-12', 'high', 'pending', '\"[\\\"1\\\"]\"', '\"[\\\"207\\\"]\"', 1, 'login_admin_59ba36addc2b2f9401580f014c7f58ea4e30989d', NULL, NULL, 0, NULL, NULL, '2025-07-11 08:38:01', '2025-07-11 08:38:01'),
(3, 1, 3, 'mixing', NULL, '2025-07-10', 'high', 'in_progress', '\"[\\\"2\\\"]\"', '\"[\\\"207\\\"]\"', 1, 'login_admin_59ba36addc2b2f9401580f014c7f58ea4e30989d', NULL, NULL, 0, NULL, NULL, '2025-07-11 08:39:11', '2025-07-11 08:39:11'),
(4, 1, 4, 'dying', NULL, '2025-07-12', 'medium', 'in_progress', '\"[\\\"2\\\"]\"', '\"[\\\"207\\\"]\"', 1, 'login_admin_59ba36addc2b2f9401580f014c7f58ea4e30989d', NULL, NULL, 0, NULL, NULL, '2025-07-11 09:17:52', '2025-07-11 09:17:52'),
(5, 2, 5, 'Dying', NULL, '2025-07-15', 'high', 'completed', '\"[\\\"41\\\"]\"', '\"[\\\"8\\\"]\"', 1, 'login_admin_59ba36addc2b2f9401580f014c7f58ea4e30989d', NULL, NULL, 0, NULL, NULL, '2025-07-16 11:12:48', '2025-07-16 11:12:48'),
(6, 1, 3, 'mixing AND DYING', NULL, '2025-07-10', 'high', 'pending', '\"[\\\"6\\\"]\"', '\"[]\"', 1, 'login_admin_59ba36addc2b2f9401580f014c7f58ea4e30989d', NULL, NULL, 0, NULL, NULL, '2025-07-16 12:35:14', '2025-07-16 12:35:14'),
(7, 1, 3, 'mixing things', NULL, '2025-07-04', 'medium', 'pending', '\"[\\\"23\\\"]\"', '\"[]\"', 1, 'login_admin_59ba36addc2b2f9401580f014c7f58ea4e30989d', NULL, NULL, 0, NULL, NULL, '2025-07-16 13:23:15', '2025-07-16 13:23:15'),
(8, 1, 3, 'mixing many things', NULL, '2025-07-10', 'low', 'in_progress', '\"[\\\"10\\\"]\"', '\"[]\"', 1, 'login_admin_59ba36addc2b2f9401580f014c7f58ea4e30989d', NULL, NULL, 0, NULL, NULL, '2025-07-16 13:44:06', '2025-07-16 13:44:06'),
(9, 1, 3, 'Dying ttt', NULL, '2025-07-09', 'high', 'pending', '\"[\\\"23\\\"]\"', '\"[]\"', 1, 'login_admin_59ba36addc2b2f9401580f014c7f58ea4e30989d', NULL, NULL, 0, NULL, NULL, '2025-07-16 13:50:23', '2025-07-16 13:50:23'),
(10, 1, 3, 'task 3', NULL, '2025-07-02', 'high', 'in_progress', '\"[\\\"2\\\"]\"', '\"[]\"', 1, 'login_admin_59ba36addc2b2f9401580f014c7f58ea4e30989d', NULL, NULL, 0, NULL, NULL, '2025-07-16 14:03:48', '2025-07-16 14:03:48'),
(11, 1, 3, 'supervised task', NULL, '2025-07-09', 'low', 'completed', '\"[]\"', '\"[]\"', 1, 'login_admin_59ba36addc2b2f9401580f014c7f58ea4e30989d', NULL, NULL, 0, NULL, NULL, '2025-07-16 14:39:29', '2025-07-18 10:50:56');

-- --------------------------------------------------------

--
-- Table structure for table `company_trainings`
--

DROP TABLE IF EXISTS `company_trainings`;
CREATE TABLE IF NOT EXISTS `company_trainings` (
  `ProgramID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `ProgramName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` text COLLATE utf8mb4_unicode_ci,
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `Status` enum('Planned','Ongoing','Completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Planned',
  `CompanyID` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ProgramID`),
  KEY `company_trainings_companyid_foreign` (`CompanyID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_users`
--

DROP TABLE IF EXISTS `company_users`;
CREATE TABLE IF NOT EXISTS `company_users` (
  `company_user_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `last_login_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`company_user_id`),
  KEY `company_users_company_id_foreign` (`company_id`),
  KEY `company_users_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_users`
--

INSERT INTO `company_users` (`company_user_id`, `company_id`, `user_id`, `status`, `last_login_at`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'active', NULL, '2025-07-30 15:32:20', '2025-07-30 15:32:20'),
(2, 2, 2, 'active', NULL, '2025-07-30 15:46:17', '2025-07-30 15:46:17'),
(3, 5, 2, 'active', NULL, '2025-07-30 15:46:22', '2025-07-30 15:46:22'),
(4, 9, 2, 'active', NULL, '2025-07-30 15:46:33', '2025-07-30 15:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `company_user_roles`
--

DROP TABLE IF EXISTS `company_user_roles`;
CREATE TABLE IF NOT EXISTS `company_user_roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_wastes`
--

DROP TABLE IF EXISTS `company_wastes`;
CREATE TABLE IF NOT EXISTS `company_wastes` (
  `company_waste_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_id` bigint UNSIGNED NOT NULL,
  `waste_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waste_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`company_waste_id`),
  KEY `company_wastes_company_id_foreign` (`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_water_conservation_opportunities`
--

DROP TABLE IF EXISTS `company_water_conservation_opportunities`;
CREATE TABLE IF NOT EXISTS `company_water_conservation_opportunities` (
  `opportunityID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `companyID` bigint UNSIGNED NOT NULL,
  `conservation_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`opportunityID`),
  KEY `company_water_conservation_opportunities_companyid_foreign` (`companyID`),
  KEY `company_water_conservation_opportunities_conservation_id_foreign` (`conservation_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_water_questions`
--

DROP TABLE IF EXISTS `company_water_questions`;
CREATE TABLE IF NOT EXISTS `company_water_questions` (
  `companyWaterQuestionID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `companyID` bigint UNSIGNED NOT NULL,
  `questionID` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`companyWaterQuestionID`),
  KEY `company_water_questions_companyid_foreign` (`companyID`),
  KEY `company_water_questions_questionid_foreign` (`questionID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_water_sources`
--

DROP TABLE IF EXISTS `company_water_sources`;
CREATE TABLE IF NOT EXISTS `company_water_sources` (
  `CompanyWaterSourcesID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `companyID` bigint UNSIGNED NOT NULL,
  `WaterSources_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`CompanyWaterSourcesID`),
  KEY `company_water_sources_companyid_foreign` (`companyID`),
  KEY `company_water_sources_watersources_id_foreign` (`WaterSources_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_water_usages`
--

DROP TABLE IF EXISTS `company_water_usages`;
CREATE TABLE IF NOT EXISTS `company_water_usages` (
  `companyWaterUsageID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `companyID` bigint UNSIGNED NOT NULL,
  `volume` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_type` enum('daily','weekly','monthly','yearly') COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`companyWaterUsageID`),
  KEY `company_water_usages_companyid_foreign` (`companyID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_workflows`
--

DROP TABLE IF EXISTS `company_workflows`;
CREATE TABLE IF NOT EXISTS `company_workflows` (
  `workflow_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_id` bigint UNSIGNED NOT NULL,
  `workflow_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `guard` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'web',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`workflow_id`),
  KEY `company_workflows_company_id_index` (`company_id`),
  KEY `company_workflows_created_by_index` (`created_by`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_workflows`
--

INSERT INTO `company_workflows` (`workflow_id`, `company_id`, `workflow_name`, `description`, `created_by`, `guard`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'dying', NULL, 1, 'admin', 'active', '2025-07-08 14:30:18', '2025-07-08 14:30:18'),
(2, 1, 'dying and tie', 'testing', 1, 'admin', 'active', '2025-07-11 08:34:34', '2025-07-11 08:34:34'),
(3, 2, 'Raw material and inventory intake', NULL, 1, 'admin', 'active', '2025-07-16 10:48:46', '2025-07-16 10:48:46');

-- --------------------------------------------------------

--
-- Table structure for table `cooperate_presentations`
--

DROP TABLE IF EXISTS `cooperate_presentations`;
CREATE TABLE IF NOT EXISTS `cooperate_presentations` (
  `presentationID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `businessID` bigint UNSIGNED NOT NULL,
  `file_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`presentationID`),
  KEY `cooperate_presentations_businessid_foreign` (`businessID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_apps`
--

DROP TABLE IF EXISTS `email_apps`;
CREATE TABLE IF NOT EXISTS `email_apps` (
  `notification_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `reciepients_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`notification_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_integrations`
--

DROP TABLE IF EXISTS `email_integrations`;
CREATE TABLE IF NOT EXISTS `email_integrations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `equipment_logs`
--

DROP TABLE IF EXISTS `equipment_logs`;
CREATE TABLE IF NOT EXISTS `equipment_logs` (
  `equipment_log_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `equipment_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment_capacity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment_type_id` bigint UNSIGNED NOT NULL,
  `equipment_model` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment_serial_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment_brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment_weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment_condition` enum('new','good','fair','poor') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment_warranty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment_maintenance_schedule` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment_maintenance_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment_maintenance_notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment_maintenance_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment_maintenance_cost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment_maintenance_provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment_maintenance_contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment_maintenance_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment_maintenance_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `equipment_status` enum('operational','under service','out of service') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `company_id` bigint UNSIGNED NOT NULL,
  `logged_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`equipment_log_id`),
  KEY `equipment_logs_equipment_type_id_foreign` (`equipment_type_id`),
  KEY `equipment_logs_company_id_foreign` (`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `equipment_types`
--

DROP TABLE IF EXISTS `equipment_types`;
CREATE TABLE IF NOT EXISTS `equipment_types` (
  `equipment_type_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `company_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`equipment_type_id`),
  KEY `equipment_types_company_id_foreign` (`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `EventID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`EventID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

DROP TABLE IF EXISTS `general_settings`;
CREATE TABLE IF NOT EXISTS `general_settings` (
  `settings_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slogan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_darkmode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_lightmode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_establishment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mission_statement` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vision_statement` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `core_values` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `industry` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abbreviation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_links` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_links` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_links` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `websites_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certifications` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brochures` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `corperate_presentations` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promotional_photos` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promotional_videos` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`settings_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guards`
--

DROP TABLE IF EXISTS `guards`;
CREATE TABLE IF NOT EXISTS `guards` (
  `guard_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`guard_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guards`
--

INSERT INTO `guards` (`guard_id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, '...', '', '2025-08-20 08:23:23', '2025-10-30 10:36:14'),
(7, 'User', '', '2025-08-22 04:17:10', '2025-10-28 12:50:51'),
(6, 'Web', 'active', '2025-08-22 03:57:10', '2025-10-28 10:23:24'),
(8, 'API', 'active', '2025-09-09 13:36:38', '2025-10-28 10:23:02'),
(9, '....', '', '2025-09-09 15:57:44', '2025-10-28 12:48:39'),
(10, 'Admin', 'active', '2025-10-28 10:18:41', '2025-10-28 10:22:45');

-- --------------------------------------------------------

--
-- Table structure for table `iot_devices`
--

DROP TABLE IF EXISTS `iot_devices`;
CREATE TABLE IF NOT EXISTS `iot_devices` (
  `iot_device_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `device_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` bigint UNSIGNED NOT NULL,
  `device_location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Offline') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `last_maintenance_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`iot_device_id`),
  KEY `iot_devices_company_id_foreign` (`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

DROP TABLE IF EXISTS `materials`;
CREATE TABLE IF NOT EXISTS `materials` (
  `materialID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `categoryID` bigint UNSIGNED NOT NULL,
  `material` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`materialID`),
  KEY `materials_categoryid_foreign` (`categoryID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`materialID`, `categoryID`, `material`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Silk leather', NULL, 'active', '2025-07-18 10:46:18', '2025-07-18 10:46:18'),
(2, 1, 'Wood', NULL, 'active', '2025-09-09 12:27:24', '2025-09-09 12:27:24'),
(3, 1, 'cotton', NULL, 'active', '2025-09-11 11:39:28', '2025-09-11 11:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `material_prices`
--

DROP TABLE IF EXISTS `material_prices`;
CREATE TABLE IF NOT EXISTS `material_prices` (
  `materialPriceID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `companyMaterialID` bigint UNSIGNED NOT NULL,
  `units` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`materialPriceID`),
  KEY `material_prices_companymaterialid_foreign` (`companyMaterialID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `media_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `original_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` bigint UNSIGNED NOT NULL,
  `storage_source` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `guard` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uploaded_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`media_id`),
  KEY `media_category_id_foreign` (`category_id`),
  KEY `media_uploaded_by_foreign` (`uploaded_by`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_id`, `original_name`, `path`, `url`, `mime_type`, `size`, `storage_source`, `category_id`, `guard`, `uploaded_by`, `created_at`, `updated_at`) VALUES
(1, 'Annotation 2025-03-18 090145.png', 'media/68d1364773b38_Annotation 2025-03-18 090145.png', 'http://localhost/storage/media/68d1364773b38_Annotation 2025-03-18 090145.png', 'image/png', 33713, 'server', 1, 'admin', 1, '2025-09-22 10:43:03', '2025-09-22 10:43:03'),
(2, 'Annotation 2025-03-18 090145.png', 'media/68d3e79a46de6_Annotation 2025-03-18 090145.png', 'http://localhost/storage/media/68d3e79a46de6_Annotation 2025-03-18 090145.png', 'image/png', 33713, 'server', 2, 'admin', 1, '2025-09-24 11:44:10', '2025-09-24 11:44:10'),
(3, 'Annotation 2025-03-18 090145.png', 'media/68f116df7653f_Annotation 2025-03-18 090145.png', 'http://localhost/storage/media/68f116df7653f_Annotation 2025-03-18 090145.png', 'image/png', 33713, 'server', 3, 'admin', 2, '2025-10-16 15:01:35', '2025-10-16 15:01:35'),
(4, 'Annotation 2025-03-26 233340.png', 'media/68f116df86724_Annotation 2025-03-26 233340.png', 'http://localhost/storage/media/68f116df86724_Annotation 2025-03-26 233340.png', 'image/png', 135525, 'server', 3, 'admin', 2, '2025-10-16 15:01:35', '2025-10-16 15:01:35'),
(5, 'Annotation 2025-03-29 085508.png', 'media/68f116df88482_Annotation 2025-03-29 085508.png', 'http://localhost/storage/media/68f116df88482_Annotation 2025-03-29 085508.png', 'image/png', 224934, 'server', 3, 'admin', 2, '2025-10-16 15:01:35', '2025-10-16 15:01:35'),
(6, '2bfc68f5902ab326e1273e01c4bfdd58.jpg', 'media/68fa40c060d0c_2bfc68f5902ab326e1273e01c4bfdd58.jpg', 'http://localhost/storage/media/68fa40c060d0c_2bfc68f5902ab326e1273e01c4bfdd58.jpg', 'image/jpeg', 128664, 'server', 3, 'admin', 2, '2025-10-23 14:50:40', '2025-10-23 14:50:40'),
(7, '0dc1565b48386adc056bda89c6583e7f.jpg', 'media/68fa40c071621_0dc1565b48386adc056bda89c6583e7f.jpg', 'http://localhost/storage/media/68fa40c071621_0dc1565b48386adc056bda89c6583e7f.jpg', 'image/jpeg', 128488, 'server', 3, 'admin', 2, '2025-10-23 14:50:40', '2025-10-23 14:50:40'),
(8, '3b8f4186cbb016339871eb851b6aa248.jpg', 'media/68fa40c072ff1_3b8f4186cbb016339871eb851b6aa248.jpg', 'http://localhost/storage/media/68fa40c072ff1_3b8f4186cbb016339871eb851b6aa248.jpg', 'image/jpeg', 172881, 'server', 3, 'admin', 2, '2025-10-23 14:50:40', '2025-10-23 14:50:40'),
(9, '4ae8dcb06c4d1118ed1389834d757ac4.jpg', 'media/68fa40c0753bd_4ae8dcb06c4d1118ed1389834d757ac4.jpg', 'http://localhost/storage/media/68fa40c0753bd_4ae8dcb06c4d1118ed1389834d757ac4.jpg', 'image/jpeg', 109338, 'server', 3, 'admin', 2, '2025-10-23 14:50:40', '2025-10-23 14:50:40'),
(10, '4afa75bc7f53f60c6f51af57978e5f9a (1).jpg', 'media/68fa40c07727d_4afa75bc7f53f60c6f51af57978e5f9a (1).jpg', 'http://localhost/storage/media/68fa40c07727d_4afa75bc7f53f60c6f51af57978e5f9a (1).jpg', 'image/jpeg', 140204, 'server', 3, 'admin', 2, '2025-10-23 14:50:40', '2025-10-23 14:50:40'),
(11, '4fd8993b4b877ceb5cdfaf33fcf5833a (1).jpg', 'media/68fa40c078fa1_4fd8993b4b877ceb5cdfaf33fcf5833a (1).jpg', 'http://localhost/storage/media/68fa40c078fa1_4fd8993b4b877ceb5cdfaf33fcf5833a (1).jpg', 'image/jpeg', 143321, 'server', 3, 'admin', 2, '2025-10-23 14:50:40', '2025-10-23 14:50:40'),
(12, '5ebdf7ff0cbc3eeb4129709aa9809512.jpg', 'media/68fa40c07bcfa_5ebdf7ff0cbc3eeb4129709aa9809512.jpg', 'http://localhost/storage/media/68fa40c07bcfa_5ebdf7ff0cbc3eeb4129709aa9809512.jpg', 'image/jpeg', 118771, 'server', 3, 'admin', 2, '2025-10-23 14:50:40', '2025-10-23 14:50:40'),
(13, '08f7825b72633d41bbe40ba77100be43 (1).jpg', 'media/68fa40c07db35_08f7825b72633d41bbe40ba77100be43 (1).jpg', 'http://localhost/storage/media/68fa40c07db35_08f7825b72633d41bbe40ba77100be43 (1).jpg', 'image/jpeg', 86130, 'server', 3, 'admin', 2, '2025-10-23 14:50:40', '2025-10-23 14:50:40'),
(14, '8f2bca11387098d63150cc3709dc6e8f.jpg', 'media/68fa40c07f850_8f2bca11387098d63150cc3709dc6e8f.jpg', 'http://localhost/storage/media/68fa40c07f850_8f2bca11387098d63150cc3709dc6e8f.jpg', 'image/jpeg', 97347, 'server', 3, 'admin', 2, '2025-10-23 14:50:40', '2025-10-23 14:50:40'),
(15, '8f2f295eae63df23d6683859a832be30.jpg', 'media/68fa40c082239_8f2f295eae63df23d6683859a832be30.jpg', 'http://localhost/storage/media/68fa40c082239_8f2f295eae63df23d6683859a832be30.jpg', 'image/jpeg', 149910, 'server', 3, 'admin', 2, '2025-10-23 14:50:40', '2025-10-23 14:50:40'),
(16, '16fbb176fa6119f92d7285e2f715223b.jpg', 'media/68fa40c0840c4_16fbb176fa6119f92d7285e2f715223b.jpg', 'http://localhost/storage/media/68fa40c0840c4_16fbb176fa6119f92d7285e2f715223b.jpg', 'image/jpeg', 183419, 'server', 3, 'admin', 2, '2025-10-23 14:50:40', '2025-10-23 14:50:40'),
(17, '20abb43e364ba200922923ea9e16e60b (1).jpg', 'media/68fa40c085f2d_20abb43e364ba200922923ea9e16e60b (1).jpg', 'http://localhost/storage/media/68fa40c085f2d_20abb43e364ba200922923ea9e16e60b (1).jpg', 'image/jpeg', 311562, 'server', 3, 'admin', 2, '2025-10-23 14:50:40', '2025-10-23 14:50:40'),
(18, '28dc9fbc2ec22f544982d230ae051ccd.jpg', 'media/68fa40c088835_28dc9fbc2ec22f544982d230ae051ccd.jpg', 'http://localhost/storage/media/68fa40c088835_28dc9fbc2ec22f544982d230ae051ccd.jpg', 'image/jpeg', 128909, 'server', 3, 'admin', 2, '2025-10-23 14:50:40', '2025-10-23 14:50:40'),
(19, '35ab965a0768a151d49cb11751a53f7d.jpg', 'media/68fa40c08a6d9_35ab965a0768a151d49cb11751a53f7d.jpg', 'http://localhost/storage/media/68fa40c08a6d9_35ab965a0768a151d49cb11751a53f7d.jpg', 'image/jpeg', 155808, 'server', 3, 'admin', 2, '2025-10-23 14:50:40', '2025-10-23 14:50:40'),
(20, '55f4e3d6c63c1fdd9578a884f1733266.jpg', 'media/68fa40c08c51e_55f4e3d6c63c1fdd9578a884f1733266.jpg', 'http://localhost/storage/media/68fa40c08c51e_55f4e3d6c63c1fdd9578a884f1733266.jpg', 'image/jpeg', 127785, 'server', 3, 'admin', 2, '2025-10-23 14:50:40', '2025-10-23 14:50:40'),
(21, '60adb0ce2bcaad4db65df7b2d30ec7e5 (1).jpg', 'media/68fa40c08f464_60adb0ce2bcaad4db65df7b2d30ec7e5 (1).jpg', 'http://localhost/storage/media/68fa40c08f464_60adb0ce2bcaad4db65df7b2d30ec7e5 (1).jpg', 'image/jpeg', 211251, 'server', 3, 'admin', 2, '2025-10-23 14:50:40', '2025-10-23 14:50:40'),
(22, '072a648fab7be4e61b8f3739c0dfa5c9.jpg', 'media/68fa40c090d13_072a648fab7be4e61b8f3739c0dfa5c9.jpg', 'http://localhost/storage/media/68fa40c090d13_072a648fab7be4e61b8f3739c0dfa5c9.jpg', 'image/jpeg', 146737, 'server', 3, 'admin', 2, '2025-10-23 14:50:40', '2025-10-23 14:50:40'),
(23, '78d6377835c2c91c2df0950ac271845b.jpg', 'media/68fa40c092872_78d6377835c2c91c2df0950ac271845b.jpg', 'http://localhost/storage/media/68fa40c092872_78d6377835c2c91c2df0950ac271845b.jpg', 'image/jpeg', 220931, 'server', 3, 'admin', 2, '2025-10-23 14:50:40', '2025-10-23 14:50:40'),
(24, '89cff5b457eb5d7c180899ddb8368f1c (1).jpg', 'media/68fa40c094fcd_89cff5b457eb5d7c180899ddb8368f1c (1).jpg', 'http://localhost/storage/media/68fa40c094fcd_89cff5b457eb5d7c180899ddb8368f1c (1).jpg', 'image/jpeg', 272366, 'server', 3, 'admin', 2, '2025-10-23 14:50:40', '2025-10-23 14:50:40'),
(25, '95be464ff3a89c226b9a4835597c2b3e.jpg', 'media/68fa40c096c9f_95be464ff3a89c226b9a4835597c2b3e.jpg', 'http://localhost/storage/media/68fa40c096c9f_95be464ff3a89c226b9a4835597c2b3e.jpg', 'image/jpeg', 67656, 'server', 3, 'admin', 2, '2025-10-23 14:50:40', '2025-10-23 14:50:40');

-- --------------------------------------------------------

--
-- Table structure for table `media_categories`
--

DROP TABLE IF EXISTS `media_categories`;
CREATE TABLE IF NOT EXISTS `media_categories` (
  `category_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `media_categories_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media_categories`
--

INSERT INTO `media_categories` (`category_id`, `name`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'documentary', 'fa-regular fa-folder-open', '2025-09-22 10:34:30', '2025-09-22 10:34:30'),
(2, 'database', 'fa-solid fa-database', '2025-09-24 11:43:56', '2025-09-24 11:43:56'),
(3, 'Images', 'fa-regular fa-image', '2025-10-16 15:01:03', '2025-10-16 15:01:03');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sender_id` int NOT NULL,
  `receiver_id` int NOT NULL,
  `content` text NOT NULL,
  `status` enum('unread','read') DEFAULT 'unread',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `sender_id` (`sender_id`),
  KEY `receiver_id` (`receiver_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=161 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_11_07_123901_create_sessions_table', 1),
(133, '2024_11_11_105936_create_admins_table', 12),
(8, '2024_11_12_152114_create_permission_tables', 1),
(9, '2024_11_13_094338_create_users-managements_table', 1),
(10, '2024_11_14_064525_guard', 1),
(11, '2024_11_20_154000_create_posts_table', 1),
(12, '2024_11_21_140152_create_add-posts_table', 1),
(125, '2024_11_23_051656_create_companies_table', 8),
(14, '2024_11_23_173524_create_email_integrations_table', 1),
(15, '2024_11_26_011433_create_email_apps_table', 1),
(116, '2024_11_28_093840_create_company_policies_table', 3),
(130, '2024_11_28_095238_create_company_objectives_table', 9),
(18, '2024_11_28_113609_create_general_settings_table', 1),
(19, '2024_12_03_064953_create_r_e_c_p_areas_of_benefits_table', 1),
(20, '2024_12_03_065336_create_r_e_c_p_human_and_environmental_health_benefits_table', 1),
(21, '2024_12_03_065500_create_r_e_c_p_innovation_areas_table', 1),
(22, '2024_12_03_065608_create_r_e_c_p_house_keep_practices_table', 1),
(23, '2024_12_03_065805_create_r_e_c_p_unit_of_processes_table', 1),
(24, '2024_12_03_070105_create_r_e_c_p_areas_of_improvements_table', 1),
(25, '2024_12_03_070159_create_r_e_c_p_harzardous_materials_table', 1),
(26, '2024_12_03_070527_create_r_e_c_p_problem_and_solutions_table', 1),
(27, '2024_12_03_070604_create_r_e_c_p_waste_reduction_measures_table', 1),
(28, '2024_12_03_070630_create_r_e_c_p_waste_management_methods_table', 1),
(29, '2024_12_03_070708_create_r_e_c_p_product_recovery_methods_table', 1),
(30, '2024_12_03_094710_create_events_table', 1),
(31, '2024_12_03_131206_create_businesses_table', 1),
(32, '2024_12_03_131511_create_business_contacts_table', 1),
(33, '2024_12_03_132022_create_business_shareholders_table', 1),
(34, '2024_12_03_132511_create_business_executives_table', 1),
(35, '2024_12_03_133325_create_business_logos_table', 1),
(36, '2024_12_03_133628_create_business_overviews_table', 1),
(37, '2024_12_03_133846_create_business_corevalues_table', 1),
(38, '2024_12_03_134049_create_business_certifications_table', 1),
(39, '2024_12_03_134520_create_business_brochures_table', 1),
(40, '2024_12_03_134723_create_cooperate_presentations_table', 1),
(41, '2024_12_03_134910_create_promotional_videos_table', 1),
(42, '2024_12_03_135045_create_brand_i_d_s_table', 1),
(43, '2024_12_03_135417_create_business_promotional_photos_table', 1),
(44, '2024_12_04_110036_create_add_events_table', 1),
(45, '2024_12_07_063007_create_r_e_c_p_histories_table', 1),
(46, '2024_12_18_175026_create_jobs_table', 1),
(47, '2024_12_18_180518_create_notifications_table', 1),
(48, '2024_12_30_103601_create_materials_table', 1),
(154, '2024_12_30_104342_create_company_materials_table', 20),
(50, '2024_12_30_105615_create_categories_table', 1),
(51, '2024_12_30_184933_create_material_prices_table', 1),
(160, '2025_01_09_080220_create_stock_movements_table', 23),
(53, '2025_01_27_125719_create_water_questionaires_table', 1),
(54, '2025_01_28_102836_create_chemical_usages_table', 1),
(55, '2025_01_28_121140_create_water_conservation_methods_table', 1),
(56, '2025_01_28_134824_create_water_sources_table', 1),
(156, '2025_01_28_165643_create_company_chemicals_table', 22),
(58, '2025_01_30_122001_create_company_water_questions_table', 1),
(59, '2025_01_30_150334_create_company_water_conservation_opportunity_table', 1),
(60, '2025_01_30_152924_create_company_water_sources_table', 1),
(61, '2025_01_30_211713_create_admin_management_table', 1),
(62, '2025_02_02_104414_create_company_water_usages_table', 1),
(63, '2025_03_18_113424_create_chemicals_table', 1),
(64, '2025_03_18_162913_water_recycling_logs', 1),
(65, '2025_03_18_163249_water_quality_logs', 1),
(66, '2025_03_19_141444_create_water_source_details_table', 1),
(155, '2025_03_19_142542_create_chemical_stock_movements_table', 21),
(68, '2025_03_20_094425_create_water_usage_logs_table', 1),
(69, '2025_03_25_131644_create_company_operations_table', 1),
(70, '2025_03_25_161936_create_operation_types_table', 1),
(71, '2025_03_25_162038_create_operation_categories_table', 1),
(72, '2025_03_26_071425_create_calendar_years_table', 1),
(73, '2025_03_26_213726_create_company_wastes_table', 1),
(74, '2025_03_27_011044_create_products_table', 1),
(75, '2025_03_27_011811_create_product_categories_table', 1),
(76, '2025_03_27_155437_create_production_logs_table', 1),
(77, '2025_03_27_164758_create_equipment_logs_table', 1),
(78, '2025_03_27_170134_create_equipment_types_table', 1),
(79, '2025_04_06_122913_create_waste_disposals_table', 1),
(80, '2025_04_06_133342_create_water_stock_movements_table', 1),
(81, '2025_04_07_045640_create_annual_operations_logs_table', 1),
(82, '2025_04_08_161328_create_quality_controls_table', 1),
(135, '2025_04_28_102536_create_company_users_table', 13),
(84, '2025_05_05_133838_create_waste_categories_table', 1),
(85, '2025_05_05_134801_create_waste_sub_categories_table', 1),
(86, '2025_05_05_142802_create_waste_disposal_methods_table', 1),
(87, '2025_05_05_144258_create_sub_category_disposals_table', 1),
(88, '2025_05_05_145140_create_waste_sources_table', 1),
(89, '2025_05_05_145705_create_waste_stock_movements_table', 1),
(90, '2025_05_09_112901_create_iot_devices_table', 1),
(91, '2025_05_09_143602_create_audit_trails_table', 1),
(92, '2025_05_11_141620_create_metadatatas_table', 1),
(93, '2025_05_12_141402_production_batch_tracking', 1),
(94, '2025_05_19_095412_create_activities_table', 1),
(95, '2025_05_22_090806_create_productionprocesses_table', 1),
(148, '2025_05_26_221500_create_company_departments_table', 18),
(149, '2025_05_26_221724_create_company_employees_table', 19),
(98, '2025_05_26_222510_create_company_employees_attendances_table', 1),
(99, '2025_05_26_222806_create_company_payrolls_table', 1),
(100, '2025_05_26_222947_create_company_recruitments_table', 1),
(101, '2025_05_26_223205_create_company_leave_management_table', 1),
(102, '2025_05_26_223739_create_company_performance_reviews_table', 1),
(103, '2025_05_26_223943_create_company_user_roles_table', 1),
(104, '2025_05_26_224120_create_company_trainings_table', 1),
(105, '2025_05_26_224412_create_company_employee_trainings_table', 1),
(106, '2025_05_28_104853_create_tags_table', 1),
(107, '2025_06_06_095253_create_objectives_table', 1),
(108, '2025_06_06_095707_create_policies_table', 1),
(109, '2025_06_06_113649_create_waste_items_table', 1),
(110, '2025_06_16_192310_create_company_workflows_table', 1),
(111, '2025_06_18_120058_create_company_stages_table', 1),
(112, '2025_06_22_165926_create_company_stage_tasks_table', 1),
(113, '2025_07_01_074439_create_recurrence_rules_table', 1),
(114, '2025_07_02_073551_create_task_schedules_table', 1),
(117, '2025_07_10_102828_create_task_scheduling_metrics_table', 4),
(120, '2025_07_10_102828_create_task_schedule_metrics_table', 5),
(122, '2025_07_10_213411_create_task_schedule_metrics_table', 6),
(131, '2025_07_09_100323_create_task_employees_table', 10),
(132, '2025_07_29_134008_create_recps_table', 11),
(136, '2025_07_29_133923_recp', 14),
(137, '2025_08_21_122954_create_waste_reductions_table', 14),
(147, '2025_08_24_180146_create_pages_table', 17),
(145, '2025_08_26_125521_create_media_table', 16),
(140, '2025_08_28_103825_create_cms_categories_table', 14),
(141, '2025_08_28_103856_create_cms_tags_table', 14),
(142, '2025_08_28_104011_create_cms_page_categories_table', 14),
(143, '2025_08_28_104023_create_cms_page_tags_table', 14),
(144, '2025_09_18_153510_create_storage_sources_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_sent` tinyint(1) NOT NULL DEFAULT '0',
  `is_important` tinyint(1) NOT NULL DEFAULT '0',
  `is_starred` tinyint(1) NOT NULL DEFAULT '0',
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `objectives`
--

DROP TABLE IF EXISTS `objectives`;
CREATE TABLE IF NOT EXISTS `objectives` (
  `objective_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `sequence_order` int NOT NULL DEFAULT '0',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` enum('pending','active','completed','archived') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`objective_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `objectives`
--

INSERT INTO `objectives` (`objective_id`, `name`, `description`, `sequence_order`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Business growth', NULL, 1, NULL, NULL, 'active', '2025-07-08 14:35:53', '2025-07-08 14:35:53'),
(2, 'Customer satisfaction', NULL, 2, NULL, NULL, 'active', '2025-07-08 14:35:53', '2025-07-08 14:35:53'),
(3, 'Material optimization', NULL, 3, NULL, NULL, 'active', '2025-07-08 14:35:53', '2025-07-08 14:35:53'),
(4, 'Waste minimization', NULL, 4, NULL, NULL, 'active', '2025-07-08 14:35:53', '2025-07-08 14:35:53'),
(5, 'Measurable & timely targets', NULL, 5, NULL, NULL, 'active', '2025-07-08 14:35:53', '2025-07-08 14:35:53'),
(6, 'Innovation', NULL, 6, NULL, NULL, 'active', '2025-07-08 14:35:53', '2025-07-08 14:35:53'),
(7, 'Sustainability', NULL, 7, NULL, NULL, 'active', '2025-07-08 14:35:53', '2025-07-08 14:35:53'),
(8, 'Employee management', NULL, 8, NULL, NULL, 'active', '2025-07-08 14:35:53', '2025-07-08 14:35:53'),
(9, 'Market expansion', NULL, 9, NULL, NULL, 'active', '2025-07-08 14:35:53', '2025-07-08 14:35:53'),
(10, 'Human environmental health', NULL, 10, NULL, NULL, 'active', '2025-07-08 14:35:53', '2025-07-08 14:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `operation_categories`
--

DROP TABLE IF EXISTS `operation_categories`;
CREATE TABLE IF NOT EXISTS `operation_categories` (
  `operation_category_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `company_id` bigint UNSIGNED NOT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`operation_category_id`),
  KEY `operation_categories_company_id_foreign` (`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `operation_types`
--

DROP TABLE IF EXISTS `operation_types`;
CREATE TABLE IF NOT EXISTS `operation_types` (
  `operation_type_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `sequence_order` int NOT NULL DEFAULT '0',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`operation_type_id`),
  KEY `operation_types_company_id_foreign` (`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `page_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_order` int NOT NULL DEFAULT '0',
  `excerpt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `body` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('draft','published','archived') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `publish_at` timestamp NULL DEFAULT NULL,
  `expire_at` timestamp NULL DEFAULT NULL,
  `visibility` enum('public','private','password') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'public',
  `visibility_password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `author_id` bigint UNSIGNED DEFAULT NULL,
  `tags` json DEFAULT NULL,
  `categories` json DEFAULT NULL,
  `meta_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `keywords` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `canonical_url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `robots_index` enum('index','noindex') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'index',
  `robots_follow` enum('follow','nofollow') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'follow',
  `custom_meta` json DEFAULT NULL,
  `og_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery_images` json DEFAULT NULL,
  `hero_bg` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_subtitle` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_button_text` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_button_url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fullwidth',
  `layout_style` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `sidebar_widgets` json DEFAULT NULL,
  `footer_widgets` json DEFAULT NULL,
  `enable_slider` tinyint(1) NOT NULL DEFAULT '0',
  `slider_images` json DEFAULT NULL,
  `reusable_components` json DEFAULT NULL,
  `contact_form_enabled` tinyint(1) NOT NULL DEFAULT '0',
  `contact_form_email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_form_subject` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_form_fields` json DEFAULT NULL,
  `newsletter_enabled` tinyint(1) NOT NULL DEFAULT '0',
  `newsletter_provider` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `polls_surveys` json DEFAULT NULL,
  `dynamic_tables` json DEFAULT NULL,
  `conditional_logic` json DEFAULT NULL,
  `embed_code` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `custom_css` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `custom_js` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `custom_head` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `custom_body` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `visible_roles` json DEFAULT NULL,
  `device_visibility` json DEFAULT NULL,
  `geo_rules` json DEFAULT NULL,
  `tracking_code` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ab_variants` json DEFAULT NULL,
  `conversion_goals` json DEFAULT NULL,
  `layout` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `template_alt` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `revision_notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`page_id`),
  UNIQUE KEY `pages_slug_unique` (`slug`),
  KEY `pages_parent_id_foreign` (`parent_id`),
  KEY `pages_author_id_foreign` (`author_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `title`, `slug`, `menu_order`, `excerpt`, `body`, `status`, `publish_at`, `expire_at`, `visibility`, `visibility_password`, `parent_id`, `author_id`, `tags`, `categories`, `meta_title`, `meta_description`, `keywords`, `canonical_url`, `robots_index`, `robots_follow`, `custom_meta`, `og_title`, `og_description`, `og_image`, `twitter_title`, `twitter_description`, `twitter_image`, `featured_image`, `gallery_images`, `hero_bg`, `hero_title`, `hero_subtitle`, `hero_button_text`, `hero_button_url`, `template`, `layout_style`, `sidebar_widgets`, `footer_widgets`, `enable_slider`, `slider_images`, `reusable_components`, `contact_form_enabled`, `contact_form_email`, `contact_form_subject`, `contact_form_fields`, `newsletter_enabled`, `newsletter_provider`, `polls_surveys`, `dynamic_tables`, `conditional_logic`, `embed_code`, `custom_css`, `custom_js`, `custom_head`, `custom_body`, `visible_roles`, `device_visibility`, `geo_rules`, `tracking_code`, `ab_variants`, `conversion_goals`, `layout`, `template_alt`, `revision_notes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(18, 'Our Mandate', 'our-mandate', 3, NULL, '<h2><strong>Our Mandate</strong></h2><p>The <strong>NGN IEE-RECP Project</strong> operates under the mandate to <strong>enhance Nigeria’s industrial sustainability</strong> through the adoption of <strong>Resource Efficiency and Cleaner Production (RECP)</strong> and <strong>Industrial Energy Efficiency (IEE)</strong> practices.</p><p>This mandate aligns with Nigeria’s national vision for <strong>sustainable industrial growth</strong>, as well as its commitments under the <strong>Paris Agreement</strong> and <strong>Nationally Determined Contributions (NDCs)</strong> on climate change.</p><p><br></p><h3><strong>1. Core Mandate</strong></h3><p>To promote, institutionalize, and scale up <strong>Resource Efficiency and Cleaner Production (RECP)</strong> across Nigeria’s industrial sectors, ensuring that industries:</p><ul><li>Utilize energy, water, raw materials, and chemicals more efficiently.</li><li>Minimize waste generation and environmental pollution.</li><li>Improve productivity and competitiveness through sustainable production.</li><li>Integrate clean technologies and innovative practices into daily operations.</li></ul><h3><strong>2. Institutional Responsibilities</strong></h3><p>Under the supervision of the <strong>Federal Ministry of Environment</strong>, the Project’s mandate includes:</p><ul><li>Promoting <strong>sustainable industrial development</strong> that balances economic growth with environmental protection.</li><li>Facilitating the <strong>mainstreaming of RECP principles</strong> into national policies, strategies, and frameworks.</li><li>Coordinating with public and private stakeholders to ensure <strong>effective implementation</strong> of cleaner production programs.</li><li>Building institutional and human capacity for <strong>sustainable resource management</strong>.</li></ul><h3><strong>3. Strategic Focus Areas</strong></h3><p>The Project is mandated to implement activities that directly contribute to:</p><ul><li><strong>Industrial Energy Efficiency (IEE):</strong> Improving energy performance in small, medium, and large enterprises.</li><li><strong>Cleaner Production (CP):</strong> Reducing waste, emissions, and environmental hazards at the source.</li><li><strong>Innovation in Clean Technologies:</strong> Promoting eco-friendly and low-carbon technologies.</li><li><strong>Capacity Building &amp; Knowledge Transfer:</strong> Training local experts, institutions, and industries in RECP practices.</li><li><strong>Policy Integration:</strong> Embedding RECP into environmental, industrial, trade, fiscal, and educational policies.</li></ul><h3><strong>4. National Impact Goals</strong></h3><p>Through its mandate, the Project seeks to achieve the following national outcomes:</p><ul><li><strong>Reduced Greenhouse Gas (GHG) Emissions</strong> and industrial pollution.</li><li><strong>Enhanced energy access</strong> and efficiency across industrial clusters.</li><li><strong>Strengthened economic competitiveness</strong> of Nigerian industries.</li><li><strong>Creation of green jobs</strong> and sustainable industrial growth.</li><li><strong>Improved environmental quality</strong> and community well-being.</li></ul><h3><strong>5. Alignment with National and Global Frameworks</strong></h3><p>The NGN IEE-RECP Project’s mandate aligns with:</p><ul><li>Nigeria’s <strong>National Framework on Resource Efficiency and Cleaner Production</strong>.</li><li>The <strong>Sustainable Development Goals (SDGs)</strong> — especially Goals <strong>7, 9, 12, and 13</strong>.</li><li>The <strong>Paris Climate Agreement</strong> and Nigeria’s <strong>Nationally Determined Contributions (NDCs)</strong>.</li><li>The <strong>Federal Ministry of Environment’s</strong> policy on environmental protection and sustainable development.</li></ul><h3><strong>6. Our Commitment</strong></h3><p>We are committed to driving Nigeria’s industrial transformation through <strong>innovation, efficiency, and sustainability</strong>. Our mandate is not only to improve environmental performance but to ensure that Nigerian industries become globally competitive, resource-efficient, and environmentally responsible.</p>', 'published', NULL, NULL, 'public', NULL, 17, 3, '\"[]\"', '\"[]\"', NULL, NULL, NULL, NULL, 'index', 'follow', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '\"[]\"', NULL, NULL, NULL, NULL, NULL, 'fullwidth', 'default', '\"[]\"', '\"[]\"', 0, '\"[]\"', '\"[]\"', 0, '0', '0', 'false', 0, '0', '\"[]\"', '\"[]\"', '\"[]\"', '[]', NULL, NULL, NULL, NULL, '\"[]\"', '\"[]\"', '\"[]\"', NULL, '\"[]\"', '\"[]\"', '[]', '[]', NULL, '2025-10-29 12:22:23', '2025-10-29 12:22:23', NULL),
(17, 'About Us', 'about-us', 1, NULL, '<h2 class=\"ql-align-justify\"><strong>About the NGN IEE-RECP Project</strong></h2><p><strong>Nigeria</strong> is a sovereign nation in the <strong>West African sub-region</strong>, with an estimated population of over <strong>206 million people (as of September 2020)</strong>. The country is made up of <strong>36 States and the Federal Capital Territory (Abuja)</strong> and stands as one of <strong>Africa’s industrial giants</strong>. To sustain this industrial growth, Nigeria recognizes the urgent need to adopt <strong>Resource Efficiency and Cleaner Production (RECP)</strong> practices as a pathway to sustainable industrialization.</p><h3><strong>Why Resource Efficiency and Cleaner Production (RECP)?</strong></h3><p>As Nigeria’s industrial and infrastructural investments expand, the need to embrace environmentally responsible technologies has become critical. Without timely action, industries risk developing on a foundation that overuses natural resources and generates excessive waste. Implementing RECP ensures:</p><ul><li><strong>Efficient use of energy, materials, water, and chemicals</strong></li><li><strong>Reduced industrial pollution and waste</strong></li><li><strong>Lower production costs and enhanced competitiveness</strong></li><li><strong>Sustainable industrial development</strong></li></ul><p>By adopting cleaner technologies, Nigeria aims to promote <strong>economic growth</strong>, <strong>environmental sustainability</strong>, and <strong>social well-being</strong> through innovative and eco-friendly industrial solutions.</p><h3><strong>Institutional Support</strong></h3><p>The <strong>Federal Ministry of Environment</strong> serves as the lead government institution responsible for <strong>environmental protection and natural resource conservation</strong> for sustainable development. The Ministry promotes and implements RECP principles across sectors, aligning with Nigeria’s national and international environmental commitments.</p><p>Nigeria is also a signatory to the <strong>Paris Agreement</strong>, and its <strong>Nationally Determined Contributions (NDCs)</strong> underscore the country’s commitment to reducing greenhouse gas (GHG) emissions and combating climate change — core goals that align perfectly with RECP principles.</p><h3><strong>National Framework on RECP</strong></h3><p>To strengthen the domestic application of RECP, Nigeria has developed a <strong>National Framework on Resource Efficiency and Cleaner Production</strong>, aimed at integrating RECP strategies across:</p><ul><li>Environmental policies</li><li>Industrial and trade policies</li><li>Fiscal and resource pricing policies</li><li>Educational and technological development policies</li></ul><p>This framework also encourages collaboration among institutions, industries, and experts to promote cleaner, more efficient production systems nationwide.</p><h3><strong>The NGN IEE-RECP Project</strong></h3><p>The <strong>“Improving Nigeria’s Industrial Energy Performance &amp; Resource Efficient Cleaner Production through Programmatic Approaches and the Promotion of Innovation in Clean Technology Solutions (NGN IEE-RECP Project)”</strong> seeks to accelerate the adoption of <strong>Industrial Energy Efficiency (IEE)</strong> and <strong>RECP best practices</strong> among small, medium, and large enterprises in Nigeria.</p><p>Through this initiative, industries will improve:</p><ul><li><strong>Energy efficiency and optimization</strong></li><li><strong>Material and water management</strong></li><li><strong>Cleaner production processes</strong></li><li><strong>Financial and environmental performance</strong></li></ul><p>Ultimately, the project contributes to <strong>increased energy access</strong>, <strong>environmental sustainability</strong>, and <strong>economic resilience</strong>.</p><h3><strong>Focus Areas</strong></h3><p>The project focuses on deploying <strong>UNIDO’s RECP Technical Assistance (TA) package</strong>, addressing three dimensions of sustainability:</p><ol><li><strong>Production Efficiency:</strong> Optimizing the use of natural resources.</li><li><strong>Environmental Management:</strong> Reducing emissions and waste generation.</li><li><strong>Social Enhancement:</strong> Protecting the health and safety of workers and communities.</li></ol><h3><strong>Target Industrial Sub-sectors</strong></h3><p>The project targets industries within key industrial zones such as <strong>Lagos, Ogun, Warri, Asaba/Onitsha, Aba, Port Harcourt, Calabar, Kano, and Kaduna</strong>, particularly:</p><ul><li>Building materials (brick, cement, wood, etc.)</li><li>Iron and steel</li><li>Non-ferrous metals</li><li>Food processing and agriculture</li><li>Glass manufacturing</li><li>Breweries and distilleries</li><li>Automotive and manufacturing industries</li></ul><h3><strong>Our Vision</strong></h3><p>To build a sustainable, energy-efficient, and environmentally responsible industrial sector that drives Nigeria’s economic growth while preserving natural resources for future generations.</p><h3><strong>Our Mission</strong></h3><p>To promote cleaner technologies, enhance industrial competitiveness, and integrate RECP principles into national development policies for a greener and more sustainable Nigeria.</p>', 'published', NULL, NULL, 'public', NULL, NULL, 2, '\"[]\"', '\"[]\"', NULL, NULL, NULL, NULL, 'index', 'follow', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '\"[]\"', NULL, NULL, NULL, NULL, NULL, 'default', 'default', '\"[]\"', '\"[]\"', 0, '\"[]\"', '\"[]\"', 0, '0', '0', 'false', 0, '0', '\"[]\"', '\"[]\"', '\"[]\"', '[]', NULL, NULL, NULL, NULL, '\"[]\"', '\"[]\"', '\"[]\"', NULL, '\"[]\"', '\"[]\"', 'default', 'default', NULL, '2025-10-29 12:04:42', '2025-10-30 14:44:48', NULL),
(20, 'Blog', 'blog', 5, 'BLOG Page', '<h3>✅ Blog Article Content — “Why Cybersecurity Matters for Every Business in 2025”</h3><p><strong>Title:</strong></p><p> <strong>Why Cybersecurity Matters for Every Business in 2025</strong></p><p><strong>Subtitle:</strong></p><p> Threats are evolving fast — here’s why even small businesses must take cybersecurity seriously now.</p><p><strong>Author:</strong></p><p> Adrian</p><p><strong>Date:</strong></p><p> Oct 29, 2025</p><p> Estimated Reading Time: 7 mins</p>', 'published', NULL, NULL, 'public', NULL, 26, 3, '\"[]\"', '\"[]\"', NULL, NULL, NULL, NULL, 'index', 'follow', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'http://127.0.0.1:8000/storage/media/68fa40c07727d_4afa75bc7f53f60c6f51af57978e5f9a (1).jpg', '\"[]\"', 'http://127.0.0.1:8000/storage/media/68fa40c060d0c_2bfc68f5902ab326e1273e01c4bfdd58.jpg', 'Blog World', 'Title tag', 'Discover more', 'http://127.0.0.1:8000/admin/pages/create', 'blog', 'default', '\"[]\"', '\"[]\"', 0, '\"[]\"', '\"[]\"', 0, '0', '0', 'false', 0, '0', '\"[]\"', '\"[]\"', '\"[]\"', '[]', NULL, NULL, NULL, NULL, '\"[]\"', '\"[]\"', '\"[]\"', NULL, '\"[]\"', '\"[]\"', '[]', '[]', NULL, '2025-10-29 12:55:52', '2025-10-30 14:55:59', NULL),
(21, 'Projects', 'our-projects', 3, NULL, '<h2><strong>Projects</strong></h2><h3><strong>Overview</strong></h3><p>At the <strong>Resource Efficiency and Cleaner Production (RECP) Programme in Nigeria</strong>, we design and implement innovative projects that promote sustainable industrial growth, improve environmental performance, and enhance competitiveness among Nigerian industries.</p><p> Our projects align with national development goals and the global commitment to achieving the <strong>Sustainable Development Goals (SDGs)</strong>, particularly <strong>SDG 9 (Industry, Innovation, and Infrastructure)</strong>, <strong>SDG 12 (Responsible Consumption and Production)</strong>, and <strong>SDG 13 (Climate Action)</strong>.</p><p>Each project we undertake focuses on improving resource productivity, reducing waste, and fostering a culture of continuous environmental improvement across industries, institutions, and communities.</p><p><br></p><h3><strong>Key Projects</strong></h3><h4><strong>1. Industrial Resource Efficiency and Cleaner Production Initiative</strong></h4><p><strong>Objective:</strong></p><p> To promote cleaner and more efficient production processes in Nigerian industries by reducing material and energy consumption while minimizing waste generation.</p><p><strong>Highlights:</strong></p><ul><li>Conducted RECP audits across manufacturing and agro-processing industries.</li><li>Provided technical training and capacity building for industrial managers and engineers.</li><li>Implemented demonstration projects showcasing practical cleaner production technologies.</li><li>Achieved significant cost savings and emission reductions for participating industries.</li></ul><h4><strong>2. Sustainable Energy for Industrial Growth Project</strong></h4><p><strong>Objective:</strong></p><p> To increase energy efficiency and encourage the adoption of renewable energy technologies in small and medium-scale industries.</p><p><strong>Highlights:</strong></p><ul><li>Energy audits and renewable energy assessments conducted for selected industries.</li><li>Promotion of solar and biomass technologies for industrial applications.</li><li>Reduction of energy costs and greenhouse gas emissions.</li><li>Strengthened partnerships with energy service providers and development agencies.</li></ul><h4><strong>3. Waste-to-Wealth Programme</strong></h4><p><strong>Objective:</strong></p><p> To convert industrial and agricultural waste into valuable resources, promoting circular economy practices and green entrepreneurship.</p><p><strong>Highlights:</strong></p><ul><li>Supported industries in waste segregation, recycling, and reuse.</li><li>Facilitated the creation of small enterprises utilizing waste materials for new products.</li><li>Reduced land and water pollution through proper waste management systems.</li><li>Promoted public awareness on the economic potential of waste recovery.</li></ul><h4><strong>4. Cleaner Production in Agro-Processing Sector</strong></h4><p><strong>Objective:</strong></p><p> To enhance productivity and environmental sustainability in the agro-processing sector through improved production techniques and cleaner technologies.</p><p><strong>Highlights:</strong></p><ul><li>Training workshops for agro-processors on efficient use of water, energy, and raw materials.</li><li>Demonstration of cleaner production methods in rice, cassava, and oil palm processing.</li><li>Improvement in product quality and profitability of participating enterprises.</li><li>Reduction in waste and environmental impact from processing activities.</li></ul><h4><strong>5. Capacity Building and Awareness Creation</strong></h4><p><strong>Objective:</strong></p><p> To build technical capacity and promote awareness on the benefits of resource efficiency and cleaner production among key stakeholders.</p><p><strong>Highlights:</strong></p><ul><li>Conducted national and regional workshops, seminars, and training sessions.</li><li>Developed RECP manuals, guides, and toolkits for industries and institutions.</li><li>Established partnerships with universities and research centers for sustainability studies.</li><li>Strengthened policy advocacy for sustainable industrial development.</li></ul><h3><strong>Ongoing and Future Projects</strong></h3><ul><li><strong>National RECP Policy Support Project:</strong> Supporting the integration of RECP principles into Nigeria’s industrial and environmental policies.</li><li><strong>Green Industry Awards:</strong> Recognizing companies that demonstrate outstanding performance in resource efficiency and cleaner production.</li><li><strong>Circular Economy Pilot Projects:</strong> Promoting business models that extend product lifecycles and reduce waste generation.</li></ul><h3><strong>Impact Summary</strong></h3><ul><li>Over <strong>150 industries</strong> have benefited from RECP interventions.</li><li><strong>30–40% reduction</strong> in resource consumption achieved in selected industries.</li><li><strong>Over 1,000 professionals</strong> trained in RECP principles and applications.</li><li><strong>Tangible improvements</strong> in productivity, environmental quality, and competitiveness.</li></ul>', 'published', NULL, NULL, 'public', NULL, NULL, 3, '\"[]\"', '\"[]\"', NULL, NULL, NULL, NULL, 'index', 'follow', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '\"[]\"', NULL, NULL, NULL, NULL, NULL, 'fullwidth', 'default', '\"[]\"', '\"[]\"', 0, '\"[]\"', '\"[]\"', 0, '0', '0', 'false', 0, '0', '\"[]\"', '\"[]\"', '\"[]\"', '[]', NULL, NULL, NULL, NULL, '\"[]\"', '\"[]\"', '\"[]\"', NULL, '\"[]\"', '\"[]\"', '[]', '[]', NULL, '2025-10-29 13:24:43', '2025-10-29 13:24:43', NULL),
(22, 'Thematic Areas', 'thematic-areas', 0, NULL, '<h2><strong>Thematic Areas</strong></h2><h3><strong>Overview</strong></h3><p>The <strong>Resource Efficiency and Cleaner Production (RECP) Programme in Nigeria</strong> operates across several thematic areas designed to drive industrial sustainability, promote innovation, and strengthen environmental performance in line with the nation’s economic growth goals.</p><p>These thematic areas serve as the <strong>strategic pillars</strong> of our interventions — ensuring that industries use resources efficiently, reduce pollution, and adopt cleaner technologies that enhance competitiveness and safeguard the environment.</p><p><br></p><h3><strong>1. Energy Efficiency and Renewable Energy</strong></h3><p><strong>Focus:</strong></p><p> Promoting sustainable energy use through energy-efficient technologies and renewable energy solutions.</p><p><strong>Key Actions:</strong></p><ul><li>Conducting energy audits to identify efficiency opportunities in industries.</li><li>Facilitating the adoption of renewable energy systems such as solar, biomass, and biogas.</li><li>Supporting policies that encourage clean energy transitions.</li><li>Reducing greenhouse gas emissions and industrial energy costs.</li></ul><p><strong>Expected Impact:</strong></p><p> Enhanced energy security, reduced carbon footprint, and increased competitiveness of Nigerian industries.</p><p><br></p><h3><strong>2. Water Efficiency and Wastewater Management</strong></h3><p><strong>Focus:</strong></p><p> Encouraging responsible water use and effective treatment of wastewater to protect water bodies and support sustainable production.</p><p><strong>Key Actions:</strong></p><ul><li>Promoting water-saving technologies and closed-loop systems.</li><li>Conducting water audits and developing conservation plans.</li><li>Supporting industries in designing and implementing wastewater treatment systems.</li><li>Reusing treated water in production processes.</li></ul><p><strong>Expected Impact:</strong></p><p> Reduced water consumption, improved water quality, and minimized environmental pollution.</p><p><br></p><h3><strong>3. Material Efficiency and Waste Management</strong></h3><p><strong>Focus:</strong></p><p> Optimizing material use and promoting waste reduction, reuse, and recycling across industrial processes.</p><p><strong>Key Actions:</strong></p><ul><li>Conducting material flow analyses to minimize waste generation.</li><li>Promoting circular economy practices within production systems.</li><li>Supporting waste-to-wealth and resource recovery initiatives.</li><li>Strengthening capacity for eco-design and sustainable material management.</li></ul><p><strong>Expected Impact:</strong></p><p> Reduced production costs, minimized waste, and enhanced sustainable industrial value chains.</p><p><br></p><h3><strong>4. Chemical and Pollution Management</strong></h3><p><strong>Focus:</strong></p><p> Ensuring safe chemical use, storage, and disposal to protect human health and the environment.</p><p><strong>Key Actions:</strong></p><ul><li>Promoting cleaner and safer alternatives to hazardous substances.</li><li>Training industries on sound chemical management and safety standards.</li><li>Supporting compliance with national and international environmental regulations.</li><li>Reducing toxic emissions and chemical-related incidents.</li></ul><p><strong>Expected Impact:</strong></p><p> Improved workplace safety, healthier environments, and compliance with environmental laws and standards.</p><p><br></p><h3><strong>5. Sustainable Product Design and Innovation</strong></h3><p><strong>Focus:</strong></p><p> Encouraging innovation in product design to minimize resource use and environmental impact throughout the product lifecycle.</p><p><strong>Key Actions:</strong></p><ul><li>Promoting eco-design principles for sustainable products.</li><li>Supporting research and development in green technologies.</li><li>Facilitating collaboration between industries, academia, and innovators.</li><li>Encouraging adoption of life-cycle assessment (LCA) tools.</li></ul><p><strong>Expected Impact:</strong></p><p> Development of environmentally friendly products and increased competitiveness in global markets.</p><p><br></p><h3><strong>6. Policy Advocacy and Institutional Strengthening</strong></h3><p><strong>Focus:</strong></p><p> Creating an enabling environment for cleaner production through policy reform and institutional capacity development.</p><p><strong>Key Actions:</strong></p><ul><li>Supporting government agencies in integrating RECP principles into industrial and environmental policies.</li><li>Providing technical advice for policy formulation and implementation.</li><li>Building institutional frameworks to sustain RECP practices at national and state levels.</li><li>Engaging private sector, academia, and development partners in policy dialogues.</li></ul><p><strong>Expected Impact:</strong></p><p> A well-coordinated policy framework supporting sustainable industrial development and environmental protection.</p><p><br></p><h3><strong>7. Capacity Building, Training, and Awareness</strong></h3><p><strong>Focus:</strong></p><p> Strengthening the knowledge and skills of stakeholders to drive sustainable industrial practices.</p><p><strong>Key Actions:</strong></p><ul><li>Organizing national and regional workshops, seminars, and technical training.</li><li>Developing RECP toolkits, manuals, and case studies for industries.</li><li>Partnering with universities and vocational institutions to embed RECP education.</li><li>Conducting awareness campaigns to promote behavioral change and sustainability culture.</li></ul><p><strong>Expected Impact:</strong></p><p> Enhanced technical expertise, informed decision-making, and increased adoption of resource-efficient practices nationwide.</p><p><br></p><h3><strong>8. Green Entrepreneurship and Circular Economy</strong></h3><p><strong>Focus:</strong></p><p> Supporting innovative business models that promote sustainability, resource recovery, and environmental responsibility.</p><p><strong>Key Actions:</strong></p><ul><li>Promoting circular business models for industries and MSMEs.</li><li>Encouraging investments in green enterprises and sustainable innovations.</li><li>Creating linkages between waste producers and recyclers.</li><li>Showcasing successful green business practices and start-ups.</li></ul><p><strong>Expected Impact:</strong></p><p> New job opportunities, stronger green markets, and sustainable economic diversification.</p><p><br></p><h3><strong>Conclusion</strong></h3><p>Through these thematic areas, RECP Nigeria contributes to building a <strong>competitive, inclusive, and sustainable industrial economy</strong> that meets present needs without compromising the future.</p><p> Our work empowers industries, enhances national resilience, and supports Nigeria’s journey toward a <strong>greener and more resource-efficient economy</strong>.</p>', 'published', NULL, NULL, 'public', NULL, 26, 3, '\"[]\"', '\"[]\"', NULL, NULL, NULL, NULL, 'index', 'follow', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '\"[]\"', NULL, NULL, NULL, NULL, NULL, 'fullwidth', 'default', '\"[]\"', '\"[]\"', 0, '\"[]\"', '\"[]\"', 0, '0', '0', 'false', 0, '0', '\"[]\"', '\"[]\"', '\"[]\"', '[]', NULL, NULL, NULL, NULL, '\"[]\"', '\"[]\"', '\"[]\"', NULL, '\"[]\"', '\"[]\"', '[]', '[]', NULL, '2025-10-29 13:37:40', '2025-10-30 14:55:59', NULL),
(23, 'Resources', 'our-resources', 5, NULL, '<h2><strong>Resources</strong></h2><h3><strong>Overview</strong></h3><p>The <strong>Resource Efficiency and Cleaner Production (RECP) Programme in Nigeria</strong> provides a wide range of materials to support industries, policymakers, researchers, and the general public in adopting sustainable production and consumption practices.</p><p> Our resources are designed to <strong>build knowledge</strong>, <strong>enhance technical capacity</strong>, and <strong>promote best practices</strong> in resource efficiency, cleaner production, and sustainable industrial development.</p><p>Whether you are an industrial manager, a government official, a student, or a sustainability advocate, these resources offer valuable insights into improving productivity while minimizing environmental impact.</p><p><br></p><h3><strong>1. Publications</strong></h3><p>Explore a comprehensive collection of research papers, technical reports, manuals, and guides developed through our national and regional initiatives.</p><p><strong>Key Documents:</strong></p><ul><li><strong>RECP Implementation Guidelines for Nigerian Industries</strong> – A step-by-step guide to adopting resource efficiency and cleaner production measures.</li><li><strong>Cleaner Production Best Practices Manual</strong> – Practical case studies from Nigerian manufacturing sectors.</li><li><strong>National Report on Industrial Resource Efficiency</strong> – Analysis of the state of resource use and environmental performance across industries.</li><li><strong>Policy Briefs on Sustainable Industrial Development</strong> – Recommendations for policymakers and stakeholders.</li></ul><p>📥 <em>All publications are available for free download in PDF format.</em></p><p><br></p><h3><strong>2. Training Materials</strong></h3><p>To build local capacity, RECP Nigeria has developed comprehensive training materials for use by industries, institutions, and development agencies.</p><p><strong>Training Modules Include:</strong></p><ul><li>Fundamentals of Resource Efficiency and Cleaner Production</li><li>Energy and Water Efficiency in Industry</li><li>Waste Minimization and Circular Economy Principles</li><li>Environmental Management Systems (EMS)</li><li>Green Entrepreneurship and Sustainable Business Models</li></ul><p>These materials are available for workshops, institutional use, and self-paced learning.</p><p><br></p><h3><strong>3. Tools and Templates</strong></h3><p>Access practical tools to help assess, plan, and implement cleaner production strategies.</p><p><strong>Available Tools:</strong></p><ul><li><strong>RECP Audit Checklist</strong> – For conducting industrial resource assessments.</li><li><strong>Material and Energy Flow Analysis (MEFA) Tool</strong> – Helps identify resource losses and savings opportunities.</li><li><strong>Cleaner Production Opportunity Assessment Form</strong> – For documenting and prioritizing improvement options.</li><li><strong>Environmental Performance Tracking Sheet</strong> – For monitoring progress over time.</li></ul><p>These templates are editable and designed to suit small, medium, and large-scale enterprises.</p><p><br></p><h3><strong>4. Case Studies and Success Stories</strong></h3><p>Learn from Nigerian industries and institutions that have successfully implemented RECP initiatives.</p><p><strong>Featured Case Studies:</strong></p><ul><li><strong>Food Processing Industry:</strong> Achieved 35% water savings through process optimization.</li><li><strong>Textile Manufacturing:</strong> Reduced chemical waste by 40% using eco-friendly dyes.</li><li><strong>Cement Production:</strong> Improved energy efficiency by switching to alternative fuels.</li><li><strong>Agro-based SMEs:</strong> Turned agricultural residues into profitable by-products.</li></ul><p>These real-life examples demonstrate that sustainability not only benefits the environment but also improves profitability and competitiveness.</p><p><br></p><h3><strong>5. Multimedia Resources</strong></h3><p>Watch, listen, and engage with interactive learning materials that bring RECP concepts to life.</p><p><strong>Available Media:</strong></p><ul><li>Educational videos on energy efficiency and cleaner production.</li><li>Webinars featuring RECP experts and industrial practitioners.</li><li>Infographics and animations explaining resource management practices.</li><li>Recorded interviews with beneficiaries and partners.</li></ul><p>📺 <em>Visit our YouTube and social media pages for more multimedia content.</em></p><p><br></p><h3><strong>6. Policy and Regulatory Resources</strong></h3><p>This section provides access to national and regional frameworks guiding the implementation of RECP and sustainable industrial practices.</p><p><strong>Documents Include:</strong></p><ul><li>National Environmental Standards and Regulations Enforcement Agency (NESREA) Guidelines</li><li>Federal Ministry of Environment RECP Strategy</li><li>National Energy Efficiency Policy</li><li>Industrial Waste Management Regulations</li><li>Circular Economy Roadmap for Nigeria</li></ul><p>These documents help industries align with government policies and international sustainability standards.</p><p><br></p><h3><strong>7. Research and Data</strong></h3><p>We maintain a growing database of statistics, assessments, and reports on resource use, cleaner production performance, and environmental impacts.</p><p><strong>Data Resources:</strong></p><ul><li>Baseline surveys on industrial resource efficiency</li><li>Environmental impact data from pilot industries</li><li>Energy consumption benchmarking reports</li><li>Waste and emissions reduction metrics</li></ul><p>Researchers, academics, and policymakers can access these datasets upon request for study and policy formulation.</p><p><br></p><h3><strong>8. Partner Resources</strong></h3><p>Through collaboration with international and regional organizations, RECP Nigeria provides access to external knowledge platforms.</p><p><strong>Key Partner Links:</strong></p><ul><li><strong>UNIDO – United Nations Industrial Development Organization</strong></li><li><strong>UNEP – United Nations Environment Programme</strong></li><li><strong>Global Network for Resource Efficient and Cleaner Production (RECPnet)</strong></li><li><strong>African Circular Economy Alliance (ACEA)</strong></li><li><strong>ECOWAS Centre for Renewable Energy and Energy Efficiency (ECREEE)</strong></li></ul><p>These partnerships ensure that Nigerian industries benefit from global best practices and innovations in sustainability.</p><p><br></p><h3><strong>Accessing Resources</strong></h3><p>All materials are <strong>freely available</strong> to registered users and partners of RECP Nigeria.</p><p> To request access to restricted data or publications, please contact:</p><p>📧 <a href=\"mailto:info@recpnigeria.org\" rel=\"noopener noreferrer\" target=\"_blank\"><strong>info@recpnigeria.org</strong></a></p><p> 🌐 <a href=\"http://www.recpnigeria.org/resources\" rel=\"noopener noreferrer\" target=\"_blank\"><strong>www.recpnigeria.org/resources</strong></a></p>', 'published', NULL, NULL, 'public', NULL, 26, 3, '\"[]\"', '\"[]\"', NULL, NULL, NULL, NULL, 'index', 'follow', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '\"[]\"', NULL, NULL, NULL, NULL, NULL, 'fullwidth', 'default', '\"[]\"', '\"[]\"', 0, '\"[]\"', '\"[]\"', 0, '0', '0', 'false', 0, '0', '\"[]\"', '\"[]\"', '\"[]\"', '[]', NULL, NULL, NULL, NULL, '\"[]\"', '\"[]\"', '\"[]\"', NULL, '\"[]\"', '\"[]\"', '[]', '[]', NULL, '2025-10-29 13:43:17', '2025-10-30 14:55:59', NULL),
(24, 'News & Events', 'our-news & events', 7, NULL, '<h2><strong>News &amp; Events</strong></h2><h3><strong>Overview</strong></h3><p>Stay up to date with the latest news, activities, and milestones from the <strong>Resource Efficiency and Cleaner Production (RECP) Programme in Nigeria</strong>.</p><p> Our News &amp; Events section showcases ongoing initiatives, success stories, stakeholder engagements, and capacity-building efforts that are driving sustainable industrial growth across Nigeria.</p><p>From national workshops to community-based projects, RECP Nigeria remains at the forefront of promoting cleaner production and sustainable resource use in every sector of the economy.</p><p><br></p><h2><strong>Latest News</strong></h2><h3>📰 <strong>RECP Nigeria Launches National Industrial Resource Efficiency Initiative</strong></h3><p><strong>Date:</strong> August 2025</p><p> <strong>Location:</strong> Abuja, Nigeria</p><p>The RECP Programme has officially launched a new national initiative aimed at supporting industries to adopt efficient production methods and reduce environmental impact. The project will provide energy and resource audits, technical support, and training to over 200 small and medium-scale industries across Nigeria.</p><p> This milestone represents a major step toward sustainable industrialization and aligns with Nigeria’s vision for a green economy.</p><p><br></p><h3>📰 <strong>Cleaner Production Training for Agro-Processors in Nasarawa State</strong></h3><p><strong>Date:</strong> July 2025</p><p> <strong>Location:</strong> Lafia, Nasarawa State</p><p>In collaboration with the Federal Ministry of Environment and UNIDO, RECP Nigeria organized a 3-day training program for agro-processors on cleaner production and waste management practices.</p><p> Participants learned practical ways to minimize waste, conserve water, and reduce energy consumption during food processing. The event ended with a field visit to a local cassava processing facility demonstrating RECP best practices.</p><p><br></p><h3>📰 <strong>Waste-to-Wealth Project Yields Promising Results</strong></h3><p><strong>Date:</strong> June 2025</p><p> <strong>Location:</strong> Ogun State</p><p>The ongoing Waste-to-Wealth Programme has recorded significant progress, with over 50 local industries converting industrial waste into useful raw materials for new products.</p><p> This initiative has created over 300 green jobs and contributed to the reduction of land and water pollution in industrial zones across Ogun and Lagos States.</p><p><br></p><h3>📰 <strong>RECP Nigeria Partners with Energy Commission on Renewable Energy for Industries</strong></h3><p><strong>Date:</strong> May 2025</p><p> <strong>Location:</strong> Lagos, Nigeria</p><p>A strategic partnership was signed between RECP Nigeria and the Energy Commission of Nigeria (ECN) to promote renewable energy technologies for industries.</p><p> The collaboration focuses on encouraging the use of solar and biomass energy systems, particularly for small-scale manufacturers. The agreement marks a crucial step toward reducing carbon emissions in Nigeria’s industrial sector.</p><p><br></p><h2><strong>Upcoming Events</strong></h2><h3>📅 <strong>National Cleaner Production Conference 2025</strong></h3><p><strong>Theme:</strong> <em>Driving Sustainable Industrialization through Resource Efficiency and Innovation</em></p><p> <strong>Date:</strong> November 25–27, 2025</p><p> <strong>Venue:</strong> International Conference Centre, Abuja</p><p>This flagship event will bring together policymakers, industrial leaders, researchers, and development partners to discuss emerging trends in cleaner production, circular economy, and green financing.</p><p> Highlights will include keynote sessions, panel discussions, exhibitions, and the presentation of the <strong>Green Industry Awards 2025</strong>.</p><p><br></p><h3>📅 <strong>RECP Awareness Workshop for SMEs</strong></h3><p><strong>Date:</strong> December 10, 2025</p><p> <strong>Venue:</strong> Lagos Chamber of Commerce and Industry Hall, Ikeja</p><p>A special workshop designed to raise awareness among small and medium enterprises (SMEs) on the benefits of resource efficiency and cleaner production.</p><p> Participants will gain practical insights into how sustainable practices can reduce production costs and improve competitiveness.</p><p><br></p><h3>📅 <strong>Annual RECP Stakeholders’ Forum</strong></h3><p><strong>Date:</strong> February 2026</p><p> <strong>Venue:</strong> Sheraton Hotel, Abuja</p><p>The forum will serve as a platform for industry stakeholders, government agencies, and development partners to review RECP Nigeria’s achievements and plan future actions.</p><p> The event will feature experience-sharing sessions, success stories, and networking opportunities.</p><p><br></p><h2><strong>Media Highlights</strong></h2><ul><li>RECP Nigeria featured on <strong>Channels Television</strong> discussing industrial sustainability and waste reduction.</li><li>Published article in <strong>The Guardian Nigeria</strong> on the role of cleaner production in achieving national development goals.</li><li>Radio talk show on <strong>Cool FM Abuja</strong> promoting the benefits of circular economy and resource efficiency.</li></ul><h2><strong>Stay Connected</strong></h2><p>For press inquiries, interviews, or event participation, please contact:</p><p> 📧 <a href=\"mailto:info@recpnigeria.org\" rel=\"noopener noreferrer\" target=\"_blank\"><strong>info@recpnigeria.org</strong></a></p><p> 🌐 <a href=\"http://www.recpnigeria.org/\" rel=\"noopener noreferrer\" target=\"_blank\"><strong>www.recpnigeria.org</strong></a></p><p> 📞 <strong>+234 (0) 803 000 0000</strong></p><p>Follow us on social media for live updates and coverage of our activities:</p><p> <strong>Facebook | Twitter | LinkedIn | Instagram</strong></p>', 'published', NULL, NULL, 'public', NULL, NULL, 3, '\"[]\"', '\"[]\"', NULL, NULL, NULL, NULL, 'index', 'follow', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '\"[]\"', NULL, NULL, NULL, NULL, NULL, 'fullwidth', 'default', '\"[]\"', '\"[]\"', 0, '\"[]\"', '\"[]\"', 0, '0', '0', 'false', 0, '0', '\"[]\"', '\"[]\"', '\"[]\"', '[]', NULL, NULL, NULL, NULL, '\"[]\"', '\"[]\"', '\"[]\"', NULL, '\"[]\"', '\"[]\"', '[]', '[]', NULL, '2025-10-29 13:50:06', '2025-11-01 07:39:27', '2025-11-01 07:39:27'),
(25, 'Our Partners', 'our-partners', 8, NULL, '<h3><strong>Partners</strong></h3><p><br></p><p>At <strong>RECP Nigeria</strong>, collaboration is at the heart of our mission. We work hand-in-hand with a wide network of national and international partners who share our vision for a sustainable, resource-efficient, and cleaner industrial future for Nigeria.</p><p>Our partnerships strengthen innovation, build capacity, and accelerate the adoption of cleaner production technologies across key sectors. Together, we promote practices that reduce waste, improve energy efficiency, and enhance environmental performance while ensuring economic growth.</p><p><br></p><h3><strong>Our Key Partners</strong></h3><h4><strong>1. United Nations Industrial Development Organization (UNIDO)</strong></h4><p>UNIDO provides technical guidance, capacity building, and global best practices for implementing Resource Efficiency and Cleaner Production in Nigeria. Their continued support ensures alignment with international sustainability standards.</p><h4><strong>2. Federal Ministry of Environment</strong></h4><p>The Ministry plays a pivotal role in policy formulation, coordination, and enforcement of environmental standards, ensuring RECP initiatives align with national environmental and industrial development goals.</p><h4><strong>3. Federal Ministry of Industry, Trade and Investment (FMITI)</strong></h4><p>FMITI supports the integration of cleaner production principles into Nigeria’s industrial growth framework, promoting sustainable competitiveness among enterprises.</p><h4><strong>4. Manufacturers Association of Nigeria (MAN)</strong></h4><p>Through collaboration with MAN, RECP Nigeria reaches industries directly, promoting awareness and adoption of cleaner production technologies within the manufacturing sector.</p><h4><strong>5. National Cleaner Production Centre (NCPC)</strong></h4><p>As an implementing partner, NCPC drives the practical application of RECP concepts through audits, training, and technical support to industries nationwide.</p><h4><strong>6. Development Partners and Donor Agencies</strong></h4><p>We also collaborate with multilateral and bilateral agencies that provide funding, expertise, and policy support to drive RECP implementation across Nigeria’s industrial landscape.</p><p><br></p><h3><strong>Partner With Us</strong></h3><p>We welcome partnerships from public and private organizations, research institutions, and development agencies that are passionate about sustainability and innovation.</p><p>Together, we can:</p><ul><li>Strengthen Nigeria’s industrial competitiveness</li><li>Promote circular economy practices</li><li>Build capacity for cleaner production</li><li>Support national and global climate goals</li></ul><p>📩 <strong>Contact us:</strong> [Insert email/website link] to explore partnership opportunities with RECP Nigeria.</p>', 'published', NULL, NULL, 'public', NULL, 26, 3, '\"[]\"', '\"[]\"', NULL, NULL, NULL, NULL, 'index', 'follow', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '\"[]\"', NULL, NULL, NULL, NULL, NULL, 'default', 'default', '\"[]\"', '\"[]\"', 0, '\"[]\"', '\"[]\"', 0, '0', '0', 'false', 0, '0', '\"[]\"', '\"[]\"', '\"[]\"', '[]', NULL, NULL, NULL, NULL, '\"[]\"', '\"[]\"', '\"[]\"', NULL, '\"[]\"', '\"[]\"', 'default', 'default', NULL, '2025-10-29 13:54:46', '2025-10-30 16:02:13', NULL),
(26, 'pages', 'pages-1', 4, NULL, '<p><br></p>', 'published', NULL, NULL, 'public', NULL, NULL, 2, '\"[]\"', '\"[]\"', NULL, NULL, NULL, NULL, 'index', 'follow', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'default', 'default', '\"[]\"', '\"[]\"', 0, '\"[]\"', '\"[]\"', 0, '0', '0', 'false', 0, '0', '\"[]\"', '\"[]\"', '\"[]\"', '[]', NULL, NULL, NULL, NULL, '\"[]\"', '\"[]\"', '\"[]\"', NULL, '\"[]\"', '\"[]\"', 'default', 'default', NULL, '2025-10-29 15:35:58', '2025-10-31 10:12:52', NULL),
(27, 'Test', 'test', 0, NULL, NULL, 'published', NULL, NULL, 'public', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'index', 'follow', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fullwidth', 'default', NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'default', 'default', NULL, '2025-10-30 15:40:48', '2025-10-30 15:46:11', '2025-10-30 15:46:11'),
(28, 'testing', 'testing', 0, NULL, NULL, 'published', NULL, NULL, 'public', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'index', 'follow', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'landing page', 'default', NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'default', 'default', NULL, '2025-10-30 15:44:50', '2025-10-30 15:46:21', '2025-10-30 15:46:21');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view-dashboard', 'Admin', '2025-08-20 08:25:19', '2025-10-28 12:23:57'),
(2, 'create-company', 'Admin', '2025-08-22 03:01:52', '2025-10-28 12:24:23'),
(3, 'view-company', 'Admin', '2025-08-22 03:28:15', '2025-10-28 12:24:46'),
(4, 'edit-company', 'Admin', '2025-10-28 12:25:53', '2025-10-28 12:25:53'),
(5, 'delete-company', 'Admin', '2025-10-28 12:26:19', '2025-10-28 12:26:19'),
(6, 'send-mail', 'Admin', '2025-10-28 12:29:35', '2025-10-28 12:29:35'),
(7, 'view-mail', 'Admin', '2025-10-28 12:29:56', '2025-10-28 12:29:56'),
(8, 'delete-mail', 'Admin', '2025-10-28 12:42:40', '2025-10-28 12:43:43'),
(9, 'download-report', 'Admin', '2025-10-28 12:44:18', '2025-10-28 12:45:46'),
(10, 'view-report', 'Admin', '2025-10-28 12:45:27', '2025-10-28 12:45:27'),
(11, 'view-map', 'Admin', '2025-10-28 12:46:37', '2025-10-28 12:46:37');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

DROP TABLE IF EXISTS `policies`;
CREATE TABLE IF NOT EXISTS `policies` (
  `policy_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sequence_order` int NOT NULL DEFAULT '0',
  `effective_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `status` enum('active','draft','archived') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`policy_id`),
  KEY `policies_created_by_foreign` (`created_by`),
  KEY `policies_updated_by_foreign` (`updated_by`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`policy_id`, `title`, `description`, `category`, `sequence_order`, `effective_date`, `expiry_date`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Quality Policy', NULL, NULL, 1, NULL, NULL, 'active', NULL, NULL, NULL, NULL),
(2, 'Enviromental Policy', NULL, NULL, 2, NULL, NULL, 'active', NULL, NULL, NULL, NULL),
(3, 'Health and safety policy', NULL, NULL, 3, NULL, NULL, 'active', NULL, NULL, NULL, NULL),
(4, 'Human resource policy', NULL, NULL, 4, NULL, NULL, 'active', NULL, NULL, NULL, NULL),
(5, 'Data protection policy', NULL, NULL, 5, NULL, NULL, 'active', NULL, NULL, NULL, NULL),
(6, 'Cooperate social reponsibility policy', NULL, NULL, 6, NULL, NULL, 'active', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productionprocesses`
--

DROP TABLE IF EXISTS `productionprocesses`;
CREATE TABLE IF NOT EXISTS `productionprocesses` (
  `process_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_id` bigint UNSIGNED NOT NULL,
  `batch_id` bigint UNSIGNED NOT NULL,
  `workflow_id` bigint UNSIGNED NOT NULL,
  `start_time` timestamp NOT NULL,
  `end_time` timestamp NOT NULL,
  `operator_id` bigint UNSIGNED NOT NULL,
  `status` enum('Pending','In Progress','Completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Completed',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`process_id`),
  KEY `productionprocesses_company_id_foreign` (`company_id`),
  KEY `productionprocesses_batch_id_foreign` (`batch_id`),
  KEY `productionprocesses_operator_id_foreign` (`operator_id`),
  KEY `productionprocesses_workflow_id_foreign` (`workflow_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productionprocesses`
--

INSERT INTO `productionprocesses` (`process_id`, `company_id`, `batch_id`, `workflow_id`, `start_time`, `end_time`, `operator_id`, `status`, `remarks`, `created_at`, `updated_at`) VALUES
(5, 1, 2, 1, '2025-07-15 23:00:00', '2025-07-17 23:00:00', 1, 'Completed', NULL, '2025-07-11 08:46:56', '2025-07-11 08:46:56'),
(2, 1, 1, 1, '2025-07-02 23:00:00', '2025-07-15 23:00:00', 1, 'In Progress', 'testing', '2025-07-09 15:06:17', '2025-07-09 15:07:34'),
(3, 1, 1, 1, '2025-07-12 23:00:00', '2025-07-13 23:00:00', 1, 'Pending', 'testing', '2025-07-11 08:34:08', '2025-07-11 08:34:08'),
(4, 1, 1, 2, '2025-07-12 23:00:00', '2025-07-13 23:00:00', 1, 'Completed', 'testing this process', '2025-07-11 08:43:40', '2025-07-11 08:43:40');

-- --------------------------------------------------------

--
-- Table structure for table `production_batch_tracking`
--

DROP TABLE IF EXISTS `production_batch_tracking`;
CREATE TABLE IF NOT EXISTS `production_batch_tracking` (
  `batch_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `batch_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `start_date` timestamp NOT NULL,
  `end_date` timestamp NOT NULL,
  `total_quantity` int DEFAULT NULL,
  `defective_quantity` int DEFAULT NULL,
  `yield_percentage` decimal(5,2) DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `geolocation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iot_device_id` bigint UNSIGNED DEFAULT NULL,
  `status` enum('In Progress','Completed','Rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Completed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`batch_id`),
  KEY `production_batch_tracking_company_id_foreign` (`company_id`),
  KEY `production_batch_tracking_product_id_foreign` (`product_id`),
  KEY `production_batch_tracking_iot_device_id_foreign` (`iot_device_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `production_batch_tracking`
--

INSERT INTO `production_batch_tracking` (`batch_id`, `batch_name`, `company_id`, `product_id`, `start_date`, `end_date`, `total_quantity`, `defective_quantity`, `yield_percentage`, `created_by`, `geolocation`, `iot_device_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'batch a', 1, 1, '2025-07-02 23:00:00', '2025-07-10 23:00:00', 60, 6, 9.00, '1', NULL, NULL, 'Completed', '2025-07-09 06:48:04', '2025-07-09 06:48:04'),
(2, 'batch plot c', 1, 1, '2025-07-11 23:00:00', '2025-07-12 23:00:00', 60, 5, 12.00, '1', NULL, NULL, 'Completed', '2025-07-11 08:46:32', '2025-07-11 08:46:32');

-- --------------------------------------------------------

--
-- Table structure for table `production_logs`
--

DROP TABLE IF EXISTS `production_logs`;
CREATE TABLE IF NOT EXISTS `production_logs` (
  `production_log_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `production_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_operation_id` bigint UNSIGNED NOT NULL,
  `material_log_data` json DEFAULT NULL,
  `chemical_log_data` json DEFAULT NULL,
  `company_id` bigint UNSIGNED NOT NULL,
  `water_volume` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_log_data` json NOT NULL,
  `calendar_year_id` bigint UNSIGNED DEFAULT NULL,
  `production_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `production_status` enum('halted','ongoing','completed','failed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `logged_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`production_log_id`),
  KEY `production_logs_company_id_foreign` (`company_id`),
  KEY `production_logs_company_operation_id_foreign` (`company_operation_id`),
  KEY `production_logs_calendar_year_id_foreign` (`calendar_year_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity_per_unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `currency` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NGN',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` enum('available','unavailable','discontinued') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `company_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_company_id_foreign` (`company_id`),
  KEY `products_name_index` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `quantity_per_unit`, `unit`, `category_id`, `description`, `currency`, `price`, `status`, `is_active`, `is_deleted`, `company_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Product A', '8', 'kg', 1, NULL, 'NGN', 70000.00, 'available', 1, 0, 1, NULL, '2025-07-09 06:47:20', '2025-07-09 06:47:20'),
(3, 'product b for chairs', '20', 'kg', 1, NULL, 'NGN', 20000.00, 'available', 1, 0, 1, NULL, '2025-09-08 11:09:27', '2025-09-08 11:09:27'),
(4, 'product c for clothes', '2000', 'kg', 1, NULL, 'NGN', 20000.00, 'available', 1, 0, 1, NULL, '2025-09-08 11:48:21', '2025-09-08 11:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE IF NOT EXISTS `product_categories` (
  `product_category_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `company_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_category_id`),
  KEY `product_categories_company_id_foreign` (`company_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`product_category_id`, `name`, `description`, `is_active`, `is_delete`, `company_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'leather', 'leather making', 1, 0, 1, NULL, '2025-07-09 06:46:40', '2025-07-09 06:46:40');

-- --------------------------------------------------------

--
-- Table structure for table `promotional_videos`
--

DROP TABLE IF EXISTS `promotional_videos`;
CREATE TABLE IF NOT EXISTS `promotional_videos` (
  `videoID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `businessID` bigint UNSIGNED NOT NULL,
  `file_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`videoID`),
  KEY `promotional_videos_businessid_foreign` (`businessID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quality_controls`
--

DROP TABLE IF EXISTS `quality_controls`;
CREATE TABLE IF NOT EXISTS `quality_controls` (
  `quality_control_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_id` bigint UNSIGNED NOT NULL,
  `quality_metric` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acceptable_range` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `measurement_frequency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsible_person` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`quality_control_id`),
  KEY `quality_controls_company_id_foreign` (`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recps`
--

DROP TABLE IF EXISTS `recps`;
CREATE TABLE IF NOT EXISTS `recps` (
  `recp_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_id` bigint UNSIGNED NOT NULL,
  `status` enum('approved','disapproved','pending') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`recp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recps`
--

INSERT INTO `recps` (`recp_id`, `company_id`, `status`, `remark`, `created_at`, `updated_at`) VALUES
(1, 1, 'approved', NULL, '2025-07-30 09:37:36', '2025-07-30 09:58:19'),
(2, 2, 'approved', NULL, '2025-07-30 10:01:38', '2025-07-30 16:29:40'),
(3, 5, 'pending', NULL, '2025-07-30 11:40:00', '2025-07-30 16:27:57'),
(4, 8, 'approved', NULL, '2025-07-30 11:44:24', '2025-07-30 11:44:24'),
(5, 12, 'approved', NULL, '2025-07-30 11:44:51', '2025-07-30 11:44:51'),
(6, 9, 'disapproved', NULL, '2025-07-30 15:47:00', '2025-07-30 15:47:00'),
(7, 6, 'pending', NULL, '2025-07-30 16:26:32', '2025-07-30 16:26:32');

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recp_areas_of_benefits`
--

INSERT INTO `recp_areas_of_benefits` (`areaBenefitID`, `companyID`, `benefit_title`, `status`, `created_at`, `updated_at`) VALUES
(1, 303, 'Develop policy and regulation that deliver economic, human and environmental health gain to your company.', 'active', '2025-07-08 15:09:49', '2025-07-08 15:09:49'),
(10, 1, 'Develop policy and regulation that deliver economic, human and environmental health gain to your company.', 'active', '2025-07-30 14:43:54', '2025-07-30 14:43:54'),
(3, 1, 'To offer standard accreditation and certification capacity building on ISO 15000 and 14000 series to your enterprise.', 'active', '2025-07-11 09:36:17', '2025-07-11 09:36:17'),
(5, 1, 'To deliver impactful training on Resource Efficient and Cleaner Production (RECP), including comprehensive support materials, toolkits, and learning resources, tailored for staff and employees across Nigeria\'s industrial manufacturing sector.', 'active', '2025-07-11 09:39:05', '2025-07-11 09:39:05'),
(6, 1, 'To strengthen the internal capacity for delivering RECP training and related technical assistance to your enterprise, ensuring long-term impact and achieving commercially sustainable outcomes.', 'active', '2025-07-11 09:43:59', '2025-07-11 09:43:59'),
(7, 1, 'To raise awareness and implement pilot programs on RECP, aimed at enhancing productivity through efficient use of manufacturing inputs (water, chemicals, and materials), minimizing waste and emissions, and promoting regulatory compliance while boosting competitiveness within your industrial sector.', 'active', '2025-07-11 09:44:01', '2025-07-11 09:44:01'),
(8, 1, 'To enhance the adoption of RECP practices and associated investments by providing a targeted financial assistance package for companies participating in RECP pilot programs.', 'active', '2025-07-11 09:44:03', '2025-07-11 09:44:03'),
(9, 1, 'To deliver the cost-saving benefits of RECP to your industrial manufacturing sector by facilitating greater access to financial mechanisms—both commercial and government—to support the financing of RECP projects.', 'active', '2025-07-11 09:44:05', '2025-07-11 09:44:05');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recp_harzardous_materials`
--

DROP TABLE IF EXISTS `recp_harzardous_materials`;
CREATE TABLE IF NOT EXISTS `recp_harzardous_materials` (
  `hazarduousMaterialID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `companyID` bigint UNSIGNED NOT NULL,
  `material_title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`hazarduousMaterialID`),
  KEY `recp_harzardous_materials_companyid_foreign` (`companyID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recp_histories`
--

DROP TABLE IF EXISTS `recp_histories`;
CREATE TABLE IF NOT EXISTS `recp_histories` (
  `recpHistoryID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `companyID` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`recpHistoryID`),
  KEY `recp_histories_companyid_foreign` (`companyID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recp_house_keep_practices`
--

INSERT INTO `recp_house_keep_practices` (`houseKeepingID`, `companyID`, `practice_title`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Attitudinal change (negligence attitude).', 'active', '2025-07-08 16:22:38', '2025-07-08 16:22:38'),
(5, 1, 'Improved workplace management.', 'active', '2025-07-11 09:52:21', '2025-07-11 09:52:21'),
(3, 1, 'Good operating practices(personel practices, waste segregation etc.).', 'active', '2025-07-11 09:49:41', '2025-07-11 09:49:41'),
(4, 1, 'Workers motivation.', 'active', '2025-07-11 09:49:42', '2025-07-11 09:49:42');

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recp_human_and_environmental_health_benefits`
--

INSERT INTO `recp_human_and_environmental_health_benefits` (`enviromentalBenefitID`, `companyID`, `environmental_benefit_title`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Achieve a minimum 20% reduction in energy consumption within one year.', 'active', '2025-07-11 09:46:33', '2025-07-11 09:46:33'),
(2, 1, 'Achieve a 40% reduction in CO2 emissions within 18 months.', 'active', '2025-07-11 09:47:17', '2025-07-11 09:47:17'),
(3, 1, 'Double your water productivity within one year.', 'active', '2025-07-11 09:47:19', '2025-07-11 09:47:19'),
(4, 1, 'Achieve a 50% increase in overall material productivity within one year.', 'active', '2025-07-11 09:47:20', '2025-07-11 09:47:20'),
(5, 1, 'Attain ISO 14000 certification to demonstrate your commitment to effective environmental management and sustainability practices.', 'active', '2025-07-11 09:47:22', '2025-07-11 09:47:22'),
(6, 1, 'Achieve an increase in overall annual financial savings.', 'active', '2025-07-11 09:47:23', '2025-07-11 09:47:23'),
(7, 1, 'Enhance customer satisfaction through improved products, services, and overall experience.', 'active', '2025-07-11 09:47:24', '2025-07-11 09:47:24'),
(8, 1, 'Achieve ISO 15000 series certification to demonstrate adherence to international standards for information and communication technology management.', 'active', '2025-07-11 09:47:25', '2025-07-11 09:47:25');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recp_problem_and_solutions`
--

DROP TABLE IF EXISTS `recp_problem_and_solutions`;
CREATE TABLE IF NOT EXISTS `recp_problem_and_solutions` (
  `problemSolutionID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `companyID` bigint UNSIGNED NOT NULL,
  `problem_title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `solution_title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`problemSolutionID`),
  KEY `recp_problem_and_solutions_companyid_foreign` (`companyID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recp_product_recovery_methods`
--

INSERT INTO `recp_product_recovery_methods` (`productRecoveryID`, `companyID`, `recovery_method_title`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Using correct material ratio', 'active', '2025-07-11 09:54:42', '2025-07-11 09:54:42'),
(2, 1, 'Adequate chemical/ material storage facility', 'active', '2025-07-11 09:58:27', '2025-07-11 09:58:27'),
(3, 1, 'High temperature recovery method', 'active', '2025-07-11 09:58:28', '2025-07-11 09:58:28'),
(4, 1, 'Using standard measuring equipment', 'active', '2025-07-11 09:58:29', '2025-07-11 09:58:29'),
(5, 1, 'Extended Producer Responsibility(EPR)', 'active', '2025-07-11 09:58:44', '2025-07-11 09:58:44'),
(6, 1, 'Recycling', 'active', '2025-07-11 09:58:45', '2025-07-11 09:58:45');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recp_waste_management_methods`
--

DROP TABLE IF EXISTS `recp_waste_management_methods`;
CREATE TABLE IF NOT EXISTS `recp_waste_management_methods` (
  `wasteManagementID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `companyID` bigint UNSIGNED NOT NULL,
  `management_method_title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`wasteManagementID`),
  KEY `recp_waste_management_methods_companyid_foreign` (`companyID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recp_waste_management_methods`
--

INSERT INTO `recp_waste_management_methods` (`wasteManagementID`, `companyID`, `management_method_title`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Landfill', 'active', '2025-07-11 09:53:37', '2025-07-11 09:53:37'),
(2, 1, 'Incineration', 'active', '2025-07-11 09:53:40', '2025-07-11 09:53:40'),
(3, 1, 'Composting', 'active', '2025-07-11 09:53:41', '2025-07-11 09:53:41'),
(4, 1, 'Waste Symbiosis', 'active', '2025-07-11 09:53:43', '2025-07-11 09:53:43');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recp_waste_reduction_measures`
--

INSERT INTO `recp_waste_reduction_measures` (`wasteReductionID`, `companyID`, `waste_reduction_title`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Use of waste for internal energy sources.', 'active', '2025-07-11 09:52:09', '2025-07-11 09:52:09'),
(2, 1, 'Installation of lighting sensor.', 'active', '2025-07-11 09:52:10', '2025-07-11 09:52:10'),
(3, 1, 'Waste water treatment.', 'active', '2025-07-11 09:52:11', '2025-07-11 09:52:11'),
(4, 1, 'Water recycling flow.', 'active', '2025-07-11 09:52:12', '2025-07-11 09:52:12'),
(5, 1, 'Monitoring of the quality and quantity of waste water.', 'active', '2025-07-11 09:52:13', '2025-07-11 09:52:13'),
(6, 1, 'Using production equipment or technology that supports energy/resource-efficient production.', 'active', '2025-07-11 09:52:13', '2025-07-11 09:52:13');

-- --------------------------------------------------------

--
-- Table structure for table `recurrence_rules`
--

DROP TABLE IF EXISTS `recurrence_rules`;
CREATE TABLE IF NOT EXISTS `recurrence_rules` (
  `recurrence_rule_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_id` bigint UNSIGNED NOT NULL,
  `frequency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interval` int NOT NULL DEFAULT '1',
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `by_day` json DEFAULT NULL,
  `by_month` json DEFAULT NULL,
  `count` int DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`recurrence_rule_id`),
  KEY `recurrence_rules_company_id_foreign` (`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', '2025-08-20 08:24:43', '2025-10-28 12:27:31'),
(2, 'Mini-\\Admin', 'web bb user edit', '2025-08-21 06:59:55', '2025-08-23 17:12:00'),
(3, 'user-staffs not one', 'web bb user edit', '2025-08-21 07:24:31', '2025-09-02 08:56:29'),
(4, 'Mini-\\Admin', 'api', '2025-09-09 13:37:32', '2025-09-09 13:37:32'),
(5, 'company-admin', 'Admin', '2025-10-28 12:28:21', '2025-10-28 12:28:21');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('mOZfPt97JNCGPX7z7kA1GRpu5FhrbPKum07Rm6ek', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTlB3TzdMRTR1TjNZYVVUVnlmakJmR3YwRFNqd3lDdVJXNEhWcHZsTyI7czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vcGFnZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1761982770);

-- --------------------------------------------------------

--
-- Table structure for table `stock_movements`
--

DROP TABLE IF EXISTS `stock_movements`;
CREATE TABLE IF NOT EXISTS `stock_movements` (
  `stockID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `companyMaterialId` bigint UNSIGNED NOT NULL,
  `materialID` bigint UNSIGNED NOT NULL,
  `companyID` bigint UNSIGNED NOT NULL,
  `movement_type` enum('in','out','transfer','adjustment') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usage_reason` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calendar_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movement_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`stockID`),
  KEY `stock_movements_companymaterialid_foreign` (`companyMaterialId`),
  KEY `stock_movements_materialid_foreign` (`materialID`),
  KEY `stock_movements_companyid_foreign` (`companyID`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_movements`
--

INSERT INTO `stock_movements` (`stockID`, `companyMaterialId`, `materialID`, `companyID`, `movement_type`, `quantity`, `batch_number`, `source`, `usage_reason`, `calendar_year`, `movement_date`, `remark`, `status`, `created_at`, `updated_at`) VALUES
(32, 13, 2, 1, 'transfer', '100', 'MAT-Wood-20251101-379', 'maitama', 'transfer_out', '2025', '2025-11-01', NULL, 'active', '2025-11-01 07:38:19', '2025-11-01 07:38:19'),
(31, 13, 2, 1, 'adjustment', '-80', 'MAT-Wood-20251101-379', 'data_error', 'decrease adjustment', '2025', '2025-11-01', NULL, 'active', '2025-11-01 07:37:17', '2025-11-01 07:37:17'),
(30, 13, 2, 1, 'out', '20', 'MAT-Wood-20251101-379', NULL, 'transfer', '2025', '2025-11-01', NULL, 'active', '2025-11-01 07:36:40', '2025-11-01 07:36:40'),
(29, 13, 2, 1, 'in', '300', 'MAT-Wood-20251101-379', NULL, NULL, '2025', '2025-11-01', NULL, 'active', '2025-11-01 07:36:24', '2025-11-01 07:36:24'),
(28, 12, 1, 1, 'out', '20', 'MAT-Silk leather-20251031-234', NULL, 'production', '2025', '2025-10-31', NULL, 'active', '2025-10-31 22:37:07', '2025-10-31 22:37:07'),
(27, 12, 1, 1, 'adjustment', '10', 'MAT-Silk leather-20251031-234', 'audit_correction', 'increase adjustment', '2025', '2025-10-31', NULL, 'active', '2025-10-31 22:36:25', '2025-10-31 22:36:25'),
(26, 12, 1, 1, 'out', '10', 'MAT-Silk leather-20251031-424', NULL, 'transfer', '2025', '2025-10-31', 'good', 'active', '2025-10-31 22:35:08', '2025-10-31 22:35:08'),
(25, 12, 1, 1, 'in', '50', 'MAT-Silk leather-20251031-424', 'cynthia ofori', NULL, '2025', '2025-10-31', NULL, 'active', '2025-10-31 22:34:30', '2025-10-31 22:34:30'),
(24, 12, 1, 1, 'in', '20', 'MAT-Silk leather-20251031-234', 'joe atuma', NULL, '2025', '2025-10-31', 'good', 'active', '2025-10-31 22:33:50', '2025-10-31 22:33:50');

-- --------------------------------------------------------

--
-- Table structure for table `storage_sources`
--

DROP TABLE IF EXISTS `storage_sources`;
CREATE TABLE IF NOT EXISTS `storage_sources` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` bigint UNSIGNED NOT NULL DEFAULT '500',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_category_disposals`
--

DROP TABLE IF EXISTS `sub_category_disposals`;
CREATE TABLE IF NOT EXISTS `sub_category_disposals` (
  `sub_category_disposal_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `waste_sub_category_id` bigint UNSIGNED NOT NULL,
  `waste_disposal_method_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`sub_category_disposal_id`),
  KEY `sub_category_disposals_waste_sub_category_id_foreign` (`waste_sub_category_id`),
  KEY `sub_category_disposals_waste_disposal_method_id_foreign` (`waste_disposal_method_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `tagID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`tagID`),
  UNIQUE KEY `tags_name_unique` (`name`),
  UNIQUE KEY `tags_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=376 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tagID`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Study', 'study', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(2, 'Functioning', 'functioning', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(3, 'Consequence', 'consequence', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(4, 'Wage', 'wage', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(5, 'Credit', 'credit', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(6, 'Transformation', 'transformation', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(7, 'Fairness', 'fairness', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(8, 'Information', 'information', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(9, 'Crisis', 'crisis', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(10, 'Monitoring', 'monitoring', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(11, 'Memorandum', 'memorandum', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(12, 'Restoration', 'restoration', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(13, 'Proclamation', 'proclamation', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(14, 'Risk', 'risk', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(15, 'Tool', 'tool', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(16, 'Protocol', 'protocol', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(17, 'Notice', 'notice', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(18, 'Inclusion', 'inclusion', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(19, 'Symposium', 'symposium', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(20, 'Overtime', 'overtime', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(21, 'Manual', 'manual', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(22, 'Lease', 'lease', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(23, 'Complaint', 'complaint', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(24, 'Visa', 'visa', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(25, 'Progress', 'progress', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(26, 'Capability', 'capability', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(27, 'Passport', 'passport', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(28, 'Justice', 'justice', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(29, 'Notion', 'notion', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(30, 'Organization', 'organization', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(31, 'Seminar', 'seminar', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(32, 'Subsidy', 'subsidy', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(33, 'Resources', 'resources', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(34, 'Utilization', 'utilization', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(35, 'Financing', 'financing', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(36, 'Renovation', 'renovation', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(37, 'Transparency', 'transparency', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(38, 'Personnel', 'personnel', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(39, 'Support', 'support', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(40, 'Assessment', 'assessment', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(41, 'Assembly', 'assembly', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(42, 'Society', 'society', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(43, 'Authorization', 'authorization', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(44, 'Nomination', 'nomination', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(45, 'Holiday', 'holiday', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(46, 'Vacation', 'vacation', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(47, 'Process', 'process', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(48, 'Plan', 'plan', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(49, 'Celebration', 'celebration', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(50, 'Fax', 'fax', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(51, 'Verification', 'verification', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(52, 'Discipline', 'discipline', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(53, 'License', 'license', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(54, 'Issue', 'issue', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(55, 'Jurisdiction', 'jurisdiction', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(56, 'Integrity', 'integrity', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(57, 'Duty', 'duty', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(58, 'People', 'people', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(59, 'Milestone', 'milestone', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(60, 'Evaluation', 'evaluation', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(61, 'Payroll', 'payroll', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(62, 'Diversity', 'diversity', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(63, 'Body', 'body', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(64, 'Certificate', 'certificate', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(65, 'Minister', 'minister', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(66, 'Team', 'team', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(67, 'Levy', 'levy', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(68, 'Magistrate', 'magistrate', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(69, 'Governor', 'governor', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(70, 'Resource', 'resource', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(71, 'Delegation', 'delegation', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(72, 'Competence', 'competence', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(73, 'Prosecutor', 'prosecutor', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(74, 'Provision', 'provision', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(75, 'Briefing', 'briefing', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(76, 'Debt', 'debt', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(77, 'Framework', 'framework', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(78, 'Security', 'security', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(79, 'Oversight', 'oversight', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(80, 'Safeguard', 'safeguard', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(81, 'Inspection', 'inspection', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(82, 'Application', 'application', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(83, 'Advantage', 'advantage', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(84, 'Maintenance', 'maintenance', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(85, 'Review', 'review', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(86, 'Rental', 'rental', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(87, 'Help', 'help', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(88, 'Value', 'value', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(89, 'Impact', 'impact', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(90, 'Management', 'management', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(91, 'Code', 'code', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(92, 'Director', 'director', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(93, 'Increase', 'increase', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(94, 'Newsletter', 'newsletter', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(95, 'Observance', 'observance', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(96, 'Directive', 'directive', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(97, 'Enrollment', 'enrollment', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(98, 'Loan', 'loan', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(99, 'Ambassador', 'ambassador', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(100, 'Inhabitant', 'inhabitant', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(101, 'Innovation', 'innovation', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(102, 'Section', 'section', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(103, 'Reform', 'reform', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(104, 'Access', 'access', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(105, 'Processing', 'processing', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(106, 'Entity', 'entity', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(107, 'Message', 'message', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(108, 'Recruitment', 'recruitment', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(109, 'Repair', 'repair', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(110, 'Diploma', 'diploma', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(111, 'Disclosure', 'disclosure', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(112, 'Expense', 'expense', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(113, 'Location', 'location', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(114, 'Official', 'official', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(115, 'Decree', 'decree', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(116, 'Household', 'household', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(117, 'Statistics', 'statistics', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(118, 'Population', 'population', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(119, 'Tax', 'tax', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(120, 'Participation', 'participation', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(121, 'Allowance', 'allowance', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(122, 'Clearance', 'clearance', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(123, 'Storage', 'storage', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(124, 'Property', 'property', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(125, 'Conference', 'conference', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(126, 'Mission', 'mission', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(127, 'Deployment', 'deployment', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(128, 'Vetting', 'vetting', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(129, 'Policy', 'policy', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(130, 'Resolution', 'resolution', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(131, 'Attorney', 'attorney', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(132, 'Compensation', 'compensation', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(133, 'Calendar', 'calendar', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(134, 'Session', 'session', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(135, 'Circumstance', 'circumstance', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(136, 'Employee', 'employee', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(137, 'Census', 'census', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(138, 'Zone', 'zone', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(139, 'Construction', 'construction', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(140, 'Installation', 'installation', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(141, 'Council', 'council', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(142, 'Outcome', 'outcome', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(143, 'Drive', 'drive', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(144, 'Modernization', 'modernization', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(145, 'Expansion', 'expansion', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(146, 'Strategy', 'strategy', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(147, 'Confidentiality', 'confidentiality', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(148, 'Work', 'work', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(149, 'Occurrence', 'occurrence', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(150, 'Approval', 'approval', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(151, 'Site', 'site', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(152, 'Privacy', 'privacy', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(153, 'Ceremony', 'ceremony', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(154, 'Citizen', 'citizen', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(155, 'Foundation', 'foundation', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(156, 'Report', 'report', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(157, 'Problem', 'problem', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(158, 'Challenge', 'challenge', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(159, 'Honesty', 'honesty', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(160, 'Scheme', 'scheme', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(161, 'Specification', 'specification', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(162, 'Legislator', 'legislator', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(163, 'Collaboration', 'collaboration', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(164, 'Consent', 'consent', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(165, 'Attache', 'attache', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(166, 'Commission', 'commission', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(167, 'Auditor', 'auditor', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(168, 'Aid', 'aid', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(169, 'Building', 'building', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(170, 'Job', 'job', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(171, 'Email', 'email', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(172, 'Guideline', 'guideline', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(173, 'Qualification', 'qualification', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(174, 'Credential', 'credential', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(175, 'Title', 'title', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(176, 'Obligation', 'obligation', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(177, 'Salary', 'salary', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(178, 'Registrar', 'registrar', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(179, 'Success', 'success', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(180, 'Representative', 'representative', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(181, 'Protection', 'protection', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(182, 'Campaign', 'campaign', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(183, 'File', 'file', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(184, 'Fee', 'fee', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(185, 'Convention', 'convention', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(186, 'Program', 'program', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(187, 'Employment', 'employment', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(188, 'Retirement', 'retirement', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(189, 'Result', 'result', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(190, 'Screening', 'screening', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(191, 'Advisor', 'advisor', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(192, 'Post', 'post', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(193, 'Rule', 'rule', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(194, 'Hazard', 'hazard', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(195, 'Leave', 'leave', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(196, 'Address', 'address', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(197, 'Upgrade', 'upgrade', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(198, 'Negotiation', 'negotiation', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(199, 'Benchmark', 'benchmark', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(200, 'Audit', 'audit', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(201, 'Schedule', 'schedule', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(202, 'Discussion', 'discussion', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(203, 'Submission', 'submission', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(204, 'Handbook', 'handbook', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(205, 'Correspondence', 'correspondence', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(206, 'Reason', 'reason', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(207, 'Supervision', 'supervision', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(208, 'District', 'district', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(209, 'Effect', 'effect', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(210, 'Degree', 'degree', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(211, 'Public', 'public', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(212, 'News', 'news', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(213, 'Treaty', 'treaty', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(214, 'Investigation', 'investigation', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(215, 'Tenure', 'tenure', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(216, 'Liaison', 'liaison', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(217, 'Deadline', 'deadline', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(218, 'Extension', 'extension', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(219, 'Revenue', 'revenue', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(220, 'Standard', 'standard', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(221, 'Replacement', 'replacement', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(222, 'Media', 'media', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(223, 'Commemoration', 'commemoration', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(224, 'Communication', 'communication', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(225, 'Event', 'event', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(226, 'Pension', 'pension', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(227, 'Estate', 'estate', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(228, 'Worker', 'worker', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(229, 'Analysis', 'analysis', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(230, 'Supervisor', 'supervisor', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(231, 'Engagement', 'engagement', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(232, 'Development', 'development', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(233, 'Administration', 'administration', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(234, 'Transmission', 'transmission', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(235, 'Enforcement', 'enforcement', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(236, 'Debate', 'debate', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(237, 'Task', 'task', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(238, 'Compliance', 'compliance', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(239, 'Instruction', 'instruction', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(240, 'Execution', 'execution', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(241, 'Controller', 'controller', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(242, 'Absence', 'absence', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(243, 'Envoy', 'envoy', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(244, 'Bargaining', 'bargaining', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(245, 'Ethics', 'ethics', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(246, 'Senate', 'senate', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(247, 'Servant', 'servant', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(248, 'Record', 'record', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(249, 'Mediation', 'mediation', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(250, 'Responsibility', 'responsibility', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(251, 'Check', 'check', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(252, 'Prime', 'prime', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(253, 'Goal', 'goal', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(254, 'Output', 'output', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(255, 'Priority', 'priority', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(256, 'Timeline', 'timeline', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(257, 'Panel', 'panel', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(258, 'Ratification', 'ratification', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(259, 'Meeting', 'meeting', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(260, 'Assignment', 'assignment', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(261, 'Growth', 'growth', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(262, 'Statement', 'statement', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(263, 'Change', 'change', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(264, 'Board', 'board', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(265, 'Letter', 'letter', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(266, 'Method', 'method', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(267, 'Incident', 'incident', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(268, 'Agenda', 'agenda', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(269, 'Disaster', 'disaster', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(270, 'Registration', 'registration', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(271, 'Individual', 'individual', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(272, 'Conflict', 'conflict', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(273, 'Cabinet', 'cabinet', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(274, 'Area', 'area', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(275, 'Mechanism', 'mechanism', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(276, 'Release', 'release', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(277, 'Warden', 'warden', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(278, 'Ordinance', 'ordinance', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(279, 'Summit', 'summit', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(280, 'Solicitor', 'solicitor', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(281, 'Objective', 'objective', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(282, 'Interview', 'interview', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(283, 'Consul', 'consul', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(284, 'Charter', 'charter', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(285, 'Deliverable', 'deliverable', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(286, 'Asset', 'asset', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(287, 'Counselor', 'counselor', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(288, 'Attendance', 'attendance', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(289, 'Retrieval', 'retrieval', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(290, 'Investment', 'investment', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(291, 'Document', 'document', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(292, 'Agency', 'agency', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(293, 'Endorsement', 'endorsement', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(294, 'Home', 'home', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(295, 'Committee', 'committee', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(296, 'Factor', 'factor', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(297, 'Enhancement', 'enhancement', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(298, 'Arbitration', 'arbitration', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(299, 'Roadmap', 'roadmap', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(300, 'Law', 'law', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(301, 'Office', 'office', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(302, 'Assistance', 'assistance', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(303, 'Reference', 'reference', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(304, 'Condition', 'condition', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(305, 'Achievement', 'achievement', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(306, 'Principle', 'principle', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(307, 'Implementation', 'implementation', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(308, 'Selection', 'selection', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(309, 'Fund', 'fund', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(310, 'Tradition', 'tradition', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(311, 'Ministry', 'ministry', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(312, 'Hearing', 'hearing', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(313, 'Department', 'department', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(314, 'Parliament', 'parliament', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(315, 'Unit', 'unit', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(316, 'Instrument', 'instrument', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(317, 'Benefit', 'benefit', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(318, 'Cause', 'cause', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(319, 'Branch', 'branch', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(320, 'Power', 'power', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(321, 'Data', 'data', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(322, 'Registry', 'registry', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(323, 'Commissioner', 'commissioner', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(324, 'Forum', 'forum', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(325, 'Improvement', 'improvement', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(326, 'Liability', 'liability', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(327, 'Archive', 'archive', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(328, 'Association', 'association', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(329, 'Person', 'person', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(330, 'Examination', 'examination', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(331, 'Service', 'service', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(332, 'Research', 'research', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(333, 'Act', 'act', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(334, 'Representation', 'representation', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(335, 'Dispute', 'dispute', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(336, 'Clerk', 'clerk', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(337, 'Survey', 'survey', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(338, 'Concept', 'concept', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(339, 'Dispatch', 'dispatch', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(340, 'Diplomat', 'diplomat', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(341, 'Delivery', 'delivery', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(342, 'Civil', 'civil', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(343, 'Institution', 'institution', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(344, 'Advancement', 'advancement', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(345, 'Broadcast', 'broadcast', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(346, 'Executive', 'executive', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(347, 'Confirmation', 'confirmation', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(348, 'Taskforce', 'taskforce', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(349, 'Order', 'order', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(350, 'Appeal', 'appeal', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(351, 'Deed', 'deed', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(352, 'Indicator', 'indicator', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(353, 'Budget', 'budget', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(354, 'Commitment', 'commitment', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(355, 'Inspector', 'inspector', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(356, 'Belief', 'belief', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(357, 'Danger', 'danger', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(358, 'Distribution', 'distribution', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(359, 'Background', 'background', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(360, 'Mobilization', 'mobilization', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(361, 'Grievance', 'grievance', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(362, 'Situation', 'situation', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(363, 'Sanction', 'sanction', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(364, 'Bill', 'bill', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(365, 'Constitution', 'constitution', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(366, 'Coordination', 'coordination', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(367, 'Contract', 'contract', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(368, 'Ownership', 'ownership', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(369, 'Partnership', 'partnership', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(370, 'Network', 'network', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(371, 'Bonus', 'bonus', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(372, 'Capacity', 'capacity', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(373, 'Allocation', 'allocation', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(374, 'Bureau', 'bureau', '2025-07-08 14:37:01', '2025-07-08 14:37:01'),
(375, 'Coverage', 'coverage', '2025-07-08 14:37:01', '2025-07-08 14:37:01');

-- --------------------------------------------------------

--
-- Table structure for table `task_employees`
--

DROP TABLE IF EXISTS `task_employees`;
CREATE TABLE IF NOT EXISTS `task_employees` (
  `task_employee_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_id` bigint UNSIGNED NOT NULL,
  `task_id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `status` enum('assigned','in_progress','completed','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'assigned',
  `comments` text COLLATE utf8mb4_unicode_ci,
  `assigned_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`task_employee_id`),
  UNIQUE KEY `task_employees_task_id_employee_id_unique` (`task_id`,`employee_id`),
  KEY `task_employees_employee_id_foreign` (`employee_id`),
  KEY `task_employees_company_id_foreign` (`company_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_employees`
--

INSERT INTO `task_employees` (`task_employee_id`, `company_id`, `task_id`, `employee_id`, `status`, `comments`, `assigned_at`, `created_at`, `updated_at`) VALUES
(1, 1, 11, 6, 'assigned', NULL, NULL, '2025-07-16 15:40:26', '2025-07-16 15:40:26'),
(2, 1, 11, 1, 'assigned', NULL, NULL, '2025-07-16 15:53:17', '2025-07-16 15:53:17'),
(3, 1, 11, 2, 'assigned', NULL, NULL, '2025-07-16 16:05:39', '2025-07-16 16:05:39'),
(4, 1, 11, 9, 'assigned', NULL, NULL, '2025-07-18 10:23:55', '2025-07-18 10:23:55');

-- --------------------------------------------------------

--
-- Table structure for table `task_schedules`
--

DROP TABLE IF EXISTS `task_schedules`;
CREATE TABLE IF NOT EXISTS `task_schedules` (
  `task_schedule_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_id` bigint UNSIGNED NOT NULL,
  `task_id` bigint UNSIGNED NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `is_recurrence` tinyint(1) NOT NULL DEFAULT '0',
  `recurrence_rule_id` bigint UNSIGNED DEFAULT NULL,
  `status` enum('pending','in_progress','completed','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`task_schedule_id`),
  KEY `task_schedules_recurrence_rule_id_foreign` (`recurrence_rule_id`),
  KEY `task_schedules_task_id_foreign` (`task_id`),
  KEY `task_schedules_company_id_foreign` (`company_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_schedules`
--

INSERT INTO `task_schedules` (`task_schedule_id`, `company_id`, `task_id`, `start_time`, `end_time`, `is_recurrence`, `recurrence_rule_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-07-04 00:00:00', '2025-07-11 00:00:00', 0, NULL, 'pending', '2025-07-09 16:13:24', '2025-07-09 16:13:24'),
(2, 1, 1, '2025-07-24 00:00:00', '2025-07-31 00:00:00', 0, NULL, 'pending', '2025-07-11 07:12:26', '2025-07-11 07:12:26'),
(3, 1, 3, '2025-07-09 00:00:00', '2025-07-16 00:00:00', 0, NULL, 'completed', '2025-07-11 08:40:18', '2025-07-11 08:40:18'),
(4, 1, 4, '2025-07-12 00:00:00', '2025-07-13 00:00:00', 0, NULL, 'in_progress', '2025-07-11 09:18:22', '2025-07-11 09:18:22'),
(5, 1, 10, '2025-07-10 00:00:00', '2025-07-12 00:00:00', 0, NULL, 'pending', '2025-07-16 14:05:35', '2025-07-16 14:05:35'),
(6, 1, 10, '2025-07-09 00:00:00', '2025-07-15 00:00:00', 0, NULL, 'completed', '2025-07-16 14:07:03', '2025-07-16 14:07:03'),
(7, 1, 9, '2025-07-17 00:00:00', '2025-07-19 00:00:00', 0, NULL, 'pending', '2025-07-18 10:26:58', '2025-07-18 10:26:58'),
(8, 1, 11, '2025-07-09 00:00:00', '2025-07-19 00:00:00', 0, NULL, 'in_progress', '2025-07-18 10:34:07', '2025-07-18 10:34:07');

-- --------------------------------------------------------

--
-- Table structure for table `task_schedule_metrics`
--

DROP TABLE IF EXISTS `task_schedule_metrics`;
CREATE TABLE IF NOT EXISTS `task_schedule_metrics` (
  `task_schedule_metric_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_id` bigint UNSIGNED NOT NULL,
  `task_schedule_id` bigint UNSIGNED NOT NULL,
  `expected_chemical_quantity` decimal(15,3) DEFAULT NULL,
  `expected_material_quantity` decimal(15,3) DEFAULT NULL,
  `expected_water_quantity` decimal(15,3) DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`task_schedule_metric_id`),
  KEY `task_schedule_metrics_task_schedule_id_foreign` (`task_schedule_id`),
  KEY `task_schedule_metrics_company_id_foreign` (`company_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_schedule_metrics`
--

INSERT INTO `task_schedule_metrics` (`task_schedule_metric_id`, `company_id`, `task_schedule_id`, `expected_chemical_quantity`, `expected_material_quantity`, `expected_water_quantity`, `status`, `created_at`, `updated_at`) VALUES
(24, 1, 8, 2.000, 2.000, 2.000, 'active', '2025-07-18 10:35:38', '2025-07-18 10:35:38'),
(23, 1, 6, 60.000, 5.000, 5.000, 'active', '2025-07-16 14:08:16', '2025-07-16 14:08:16'),
(22, 1, 4, 2.000, 2.000, 2.000, 'active', '2025-07-11 09:19:02', '2025-07-11 09:19:02'),
(21, 1, 3, 20.000, 20.000, 100.000, 'active', '2025-07-11 09:08:08', '2025-07-11 09:08:08'),
(20, 1, 3, 6.000, 8.000, 9.000, 'active', '2025-07-11 08:41:51', '2025-07-11 08:41:51'),
(19, 1, 3, 8.000, 9.000, 10.000, 'active', '2025-07-11 08:41:38', '2025-07-11 08:41:38'),
(18, 1, 3, 7.000, 8.000, 8.000, 'active', '2025-07-11 08:41:25', '2025-07-11 08:41:25'),
(17, 1, 3, 5.000, 5.000, 5.000, 'active', '2025-07-11 08:40:52', '2025-07-11 08:40:52'),
(16, 1, 2, 1.000, 2.000, 3.000, 'active', '2025-07-11 07:13:16', '2025-07-11 07:13:16'),
(15, 1, 1, 2.000, 1.000, 1.000, 'active', '2025-07-11 07:12:08', '2025-07-11 07:12:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `mobile_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `other_name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `mobile_number`, `remember_token`, `current_team_id`, `profile_photo_path`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Joseph', 'Atuma', NULL, 'joeseph24@gmail.com', NULL, '$2y$10$G8gyOMziJqUtQ34qn1Q0guasZFhZdm7kh1MN/dZ4V3wRxQSRMi9mq', NULL, NULL, NULL, '09078600016', '8IdH559TBZKiLGLY7VXSVreppdoCn5Zwzm2Nci0ay6PYT0vAI8GkmzwaH7Ei', NULL, NULL, 'active', '2025-07-08 16:06:47', '2025-07-08 16:06:47'),
(3, 'Emperor', 'Boulevard', NULL, 'emperorboulevard@gmail.com', NULL, '$2y$10$eVfKnorT/TLsvg.FxBKW.e/JRmAmVmScxAaUwYRY9ycRaqBbrtHBi', NULL, NULL, NULL, '09078600016', NULL, NULL, NULL, 'active', '2025-07-16 11:32:53', '2025-07-16 11:32:53');

-- --------------------------------------------------------

--
-- Table structure for table `users-managements`
--

DROP TABLE IF EXISTS `users-managements`;
CREATE TABLE IF NOT EXISTS `users-managements` (
  `userID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `othername` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobileNumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users-managements`
--

INSERT INTO `users-managements` (`userID`, `firstname`, `lastname`, `othername`, `email`, `mobileNumber`, `status`, `created_at`, `updated_at`) VALUES
(1, 'joe', 'Atuma', NULL, 'joe@gmail.com', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `waste_categories`
--

DROP TABLE IF EXISTS `waste_categories`;
CREATE TABLE IF NOT EXISTS `waste_categories` (
  `waste_category_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `waste_category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waste_category_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`waste_category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `waste_categories`
--

INSERT INTO `waste_categories` (`waste_category_id`, `waste_category_name`, `waste_category_description`, `created_at`, `updated_at`) VALUES
(1, 'plastics', NULL, '2025-07-18 11:00:53', '2025-07-18 11:00:53'),
(2, 'Iron', NULL, '2025-10-28 10:05:19', '2025-10-28 10:05:19'),
(3, 'human hair', NULL, '2025-10-28 10:53:07', '2025-10-28 10:53:07');

-- --------------------------------------------------------

--
-- Table structure for table `waste_disposals`
--

DROP TABLE IF EXISTS `waste_disposals`;
CREATE TABLE IF NOT EXISTS `waste_disposals` (
  `waste_disposal_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `waste_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` bigint UNSIGNED NOT NULL,
  `company_waste_id` bigint UNSIGNED NOT NULL,
  `operation_id` bigint UNSIGNED NOT NULL,
  `calendar_year_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `disposal_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disposal_date` date NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`waste_disposal_id`),
  KEY `waste_disposals_operation_id_foreign` (`operation_id`),
  KEY `waste_disposals_calendar_year_id_foreign` (`calendar_year_id`),
  KEY `waste_disposals_company_waste_id_foreign` (`company_waste_id`),
  KEY `waste_disposals_company_id_foreign` (`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `waste_disposal_methods`
--

DROP TABLE IF EXISTS `waste_disposal_methods`;
CREATE TABLE IF NOT EXISTS `waste_disposal_methods` (
  `waste_disposal_method_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `waste_disposal_method_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waste_disposal_method_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`waste_disposal_method_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `waste_items`
--

DROP TABLE IF EXISTS `waste_items`;
CREATE TABLE IF NOT EXISTS `waste_items` (
  `waste_item_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity_per_unit` decimal(10,2) NOT NULL DEFAULT '1.00',
  `waste_sub_category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`waste_item_id`),
  KEY `waste_items_waste_sub_category_id_foreign` (`waste_sub_category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `waste_items`
--

INSERT INTO `waste_items` (`waste_item_id`, `name`, `description`, `icon`, `color`, `unit`, `quantity_per_unit`, `waste_sub_category_id`, `created_at`, `updated_at`) VALUES
(1, 'plastics', NULL, NULL, NULL, 'kg', 80.00, 1, '2025-07-18 11:01:40', '2025-07-18 11:01:40'),
(2, 'Take out', 'needs to be taken out', NULL, NULL, '10 kg', 10.00, 1, '2025-10-28 09:38:56', '2025-10-28 09:38:56');

-- --------------------------------------------------------

--
-- Table structure for table `waste_reductions`
--

DROP TABLE IF EXISTS `waste_reductions`;
CREATE TABLE IF NOT EXISTS `waste_reductions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_id` bigint UNSIGNED NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waste_reduced` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `waste_reductions_company_id_foreign` (`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `waste_sources`
--

DROP TABLE IF EXISTS `waste_sources`;
CREATE TABLE IF NOT EXISTS `waste_sources` (
  `waste_source_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `waste_source_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waste_source_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waste_source_icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`waste_source_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `waste_stock_movements`
--

DROP TABLE IF EXISTS `waste_stock_movements`;
CREATE TABLE IF NOT EXISTS `waste_stock_movements` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `waste_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `movement_type` enum('in','out') COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` decimal(15,3) NOT NULL,
  `unit` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `movement_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `waste_stock_movements_company_id_foreign` (`company_id`),
  KEY `waste_stock_movements_waste_id_foreign` (`waste_id`),
  KEY `waste_stock_movements_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `waste_sub_categories`
--

DROP TABLE IF EXISTS `waste_sub_categories`;
CREATE TABLE IF NOT EXISTS `waste_sub_categories` (
  `waste_sub_category_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `waste_category_id` bigint UNSIGNED NOT NULL,
  `waste_sub_category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waste_sub_category_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waste_sub_category_icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`waste_sub_category_id`),
  KEY `waste_sub_categories_waste_category_id_foreign` (`waste_category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `waste_sub_categories`
--

INSERT INTO `waste_sub_categories` (`waste_sub_category_id`, `waste_category_id`, `waste_sub_category_name`, `waste_sub_category_description`, `waste_sub_category_icon`, `created_at`, `updated_at`) VALUES
(1, 1, 'plastic chair', NULL, NULL, '2025-07-18 11:01:07', '2025-07-18 11:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `water_conservation_methods`
--

DROP TABLE IF EXISTS `water_conservation_methods`;
CREATE TABLE IF NOT EXISTS `water_conservation_methods` (
  `WaterConservationMethodId` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `label` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
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

-- --------------------------------------------------------

--
-- Table structure for table `water_quality_logs`
--

DROP TABLE IF EXISTS `water_quality_logs`;
CREATE TABLE IF NOT EXISTS `water_quality_logs` (
  `quality_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `companyID` bigint UNSIGNED NOT NULL,
  `test_date` date NOT NULL,
  `parameter_tested` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ph_level` decimal(10,2) NOT NULL,
  `turbidity` decimal(10,2) NOT NULL,
  `contaminants` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_results` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deviation_detected` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `corrective_actions` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`quality_id`),
  KEY `water_quality_logs_companyid_foreign` (`companyID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `water_questionaires`
--

DROP TABLE IF EXISTS `water_questionaires`;
CREATE TABLE IF NOT EXISTS `water_questionaires` (
  `questionId` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `label` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`questionId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `water_questionaires`
--

INSERT INTO `water_questionaires` (`questionId`, `label`, `question`, `status`, `created_at`, `updated_at`) VALUES
(1, 'need_water_in_almost_every_stage', 'Most industrial manufacturing process need water in almost every stage. Is the statement true for your sector?', 'active', NULL, NULL),
(2, 'water_efficiently_guarantees_less_cost', 'Using water more efficiently guarantees less costly production and ensures against water shortages that could interrupt production.', 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `water_recycling_logs`
--

DROP TABLE IF EXISTS `water_recycling_logs`;
CREATE TABLE IF NOT EXISTS `water_recycling_logs` (
  `recycling_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `companyID` bigint UNSIGNED NOT NULL,
  `quantity_recycled` decimal(10,2) NOT NULL,
  `unit` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recycling_date` date NOT NULL,
  `method` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`recycling_id`),
  KEY `water_recycling_logs_companyid_foreign` (`companyID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `water_sources`
--

DROP TABLE IF EXISTS `water_sources`;
CREATE TABLE IF NOT EXISTS `water_sources` (
  `WaterSourcesId` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `label` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sources` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`WaterSourcesId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `water_sources`
--

INSERT INTO `water_sources` (`WaterSourcesId`, `label`, `sources`, `status`, `created_at`, `updated_at`) VALUES
(1, 'borehole', 'Borehole', 'active', NULL, NULL),
(2, 'state_water_board', 'State water Board', 'active', NULL, NULL),
(3, 'rain_water', 'Rainwater harvesting', 'active', NULL, NULL),
(4, 'stream_or_river', 'Nearby stream/river', 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `water_source_details`
--

DROP TABLE IF EXISTS `water_source_details`;
CREATE TABLE IF NOT EXISTS `water_source_details` (
  `water_source_detail_ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `companyID` bigint UNSIGNED NOT NULL,
  `company_water_source_id` bigint UNSIGNED NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`water_source_detail_ID`),
  KEY `water_source_details_companyid_foreign` (`companyID`),
  KEY `water_source_details_company_water_source_id_foreign` (`company_water_source_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `water_stock_movements`
--

DROP TABLE IF EXISTS `water_stock_movements`;
CREATE TABLE IF NOT EXISTS `water_stock_movements` (
  `waterStockID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `water_source_id` bigint UNSIGNED DEFAULT NULL,
  `company_id` bigint UNSIGNED NOT NULL,
  `movement_type` enum('in','out','usage','recycle') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume` decimal(10,2) NOT NULL,
  `calendar_year_id` bigint UNSIGNED NOT NULL,
  `movement_date` date NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `recycle_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`waterStockID`),
  KEY `water_stock_movements_calendar_year_id_foreign` (`calendar_year_id`),
  KEY `water_stock_movements_water_source_id_foreign` (`water_source_id`),
  KEY `water_stock_movements_company_id_foreign` (`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `water_usage_logs`
--

DROP TABLE IF EXISTS `water_usage_logs`;
CREATE TABLE IF NOT EXISTS `water_usage_logs` (
  `WaterUsageLogsID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `companyID` bigint UNSIGNED NOT NULL,
  `WaterSourcesId` bigint UNSIGNED NOT NULL,
  `quantity_used` decimal(10,2) NOT NULL,
  `unit_of_water_measured` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`WaterUsageLogsID`),
  KEY `water_usage_logs_companyid_foreign` (`companyID`),
  KEY `water_usage_logs_watersourcesid_foreign` (`WaterSourcesId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
