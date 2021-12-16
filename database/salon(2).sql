-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 13, 2021 at 01:41 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salon`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_on_services`
--

CREATE TABLE `add_on_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Service',
  `add_on_service_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Add on Service',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_on_services`
--

INSERT INTO `add_on_services` (`id`, `service_id`, `add_on_service_id`, `created_at`, `updated_at`) VALUES
(2, 2, 3, '2021-11-27 09:53:12', '2021-11-27 09:53:12'),
(3, 2, 4, '2021-11-27 09:53:23', '2021-11-27 09:53:23');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salon_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Salon',
  `client_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Client',
  `service_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Client',
  `staff_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Staff',
  `date` date DEFAULT NULL,
  `start_time` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` decimal(10,2) DEFAULT NULL,
  `repeats` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `booking_notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Scheduled','Confirmed','Completed','Cancelled') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancellation_reason` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reschedule` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `reschedule_at` datetime DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `is_active_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `salon_id`, `client_id`, `service_id`, `staff_id`, `date`, `start_time`, `end_time`, `duration`, `cost`, `repeats`, `booking_notes`, `status`, `cancellation_reason`, `reschedule`, `reschedule_at`, `is_active`, `is_active_at`, `created_at`, `updated_at`) VALUES
(1, 1, 25, 2, 9, '2020-12-12', '9:00', '10:00', '02:00', '20.00', 'No', 'good job1', 'Scheduled', NULL, '0', NULL, '1', '2021-11-30 14:25:32', '2021-11-30 08:55:32', '2021-11-30 11:34:02');

-- --------------------------------------------------------

--
-- Table structure for table `busy_time`
--

CREATE TABLE `busy_time` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salon_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Salon',
  `staff_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Staff',
  `date` date NOT NULL,
  `start_time` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `repeats` enum('Yes','No') COLLATE utf8mb4_unicode_ci DEFAULT 'No',
  `reason` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `is_active_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `busy_time`
--

INSERT INTO `busy_time` (`id`, `salon_id`, `staff_id`, `date`, `start_time`, `end_time`, `repeats`, `reason`, `is_active`, `is_active_at`, `created_at`, `updated_at`) VALUES
(2, 1, 4, '2021-12-05', '09:00', '20:00', 'No', 'test', '1', '2021-11-30 15:57:47', '2021-11-30 10:27:47', '2021-11-30 10:27:47'),
(3, 1, 4, '2021-12-05', '09:00', '20:00', 'No', 'test', '1', '2021-11-30 16:00:59', '2021-11-30 10:30:59', '2021-11-30 10:30:59'),
(4, 1, 4, '2021-12-05', '09:00', '20:00', 'No', 'test', '1', '2021-11-30 16:20:53', '2021-11-30 10:50:53', '2021-11-30 10:50:53');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salon_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Salon',
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `is_active_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `salon_id`, `name`, `description`, `is_active`, `is_active_at`, `created_at`, `updated_at`) VALUES
(2, 1, 'test121', '', '1', '2021-11-26 11:38:39', '2021-11-26 06:08:39', '2021-11-26 11:33:25'),
(3, 1, 'test12', '', '1', '2021-11-26 11:39:00', '2021-11-26 06:09:00', '2021-11-26 06:09:00'),
(4, 1, 'test13', '', '1', '2021-11-26 13:01:39', '2021-11-26 07:31:39', '2021-11-26 07:31:39'),
(5, 1, 'test14', '', '1', '2021-11-26 13:01:56', '2021-11-26 07:31:56', '2021-11-26 07:31:56'),
(6, 2, 'test12', '', '1', '2021-11-26 14:02:35', '2021-11-26 08:32:35', '2021-11-26 08:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

CREATE TABLE `configuration` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('Text','Textarea','File','Date','Time','Datetime','Radio','Checkbox','Select','Other') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Text',
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `is_active_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`id`, `name`, `value`, `description`, `type`, `is_active`, `is_active_at`, `created_at`, `updated_at`) VALUES
(1, 'SiteName', 'Beauty', NULL, 'Text', '1', '2021-12-07 09:51:16', '2021-12-07 03:48:51', '2021-12-07 04:21:16'),
(2, 'logo', '1638870773_Screenshot_from_2021-09-14_10-24-25.png', NULL, 'File', '1', '2021-12-07 09:53:41', '2021-12-07 04:22:42', '2021-12-07 04:23:41');

-- --------------------------------------------------------

--
-- Table structure for table `custom_pages`
--

CREATE TABLE `custom_pages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `is_active_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_pages`
--

INSERT INTO `custom_pages` (`id`, `name`, `title`, `description`, `is_active`, `is_active_at`, `created_at`, `updated_at`) VALUES
(1, 'aboutus', 'About us', 'test test', '1', '2021-12-07 10:22:09', '2021-12-07 04:52:00', '2021-12-07 04:57:21');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `html` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `panel` enum('Backend','Web','App','Common') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Common',
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `is_active_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `code`, `title`, `subject`, `html`, `panel`, `is_active`, `is_active_at`, `created_at`, `updated_at`) VALUES
(1, 'forgot_password', 'Back Management', 'forgot_password', 'dsa sad', 'Common', '1', '2021-12-07 10:53:40', '2021-12-07 05:23:37', '2021-12-07 05:23:43');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates_field`
--

CREATE TABLE `email_templates_field` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email_template_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Email Template',
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2021_10_28_060900_create_basic_table', 1),
(3, '2021_11_15_105553_create_modules_table', 2),
(4, '2021_11_18_101828_create_roles_add_column_table', 3),
(5, '2021_11_19_052744_create_modules_add_column_table', 4),
(6, '2021_11_19_065042_create_permission_add_column_table', 5),
(7, '2021_11_22_071639_create_users_add_column_table', 6),
(8, '2021_11_22_073140_create_users_add_api_column_table', 7),
(9, '2021_11_22_073429_create_users_add_api_column_table', 8),
(10, '2016_06_01_000001_create_oauth_auth_codes_table', 9),
(11, '2016_06_01_000002_create_oauth_access_tokens_table', 9),
(12, '2016_06_01_000003_create_oauth_refresh_tokens_table', 9),
(13, '2016_06_01_000004_create_oauth_clients_table', 9),
(14, '2016_06_01_000005_create_oauth_personal_access_clients_table', 9),
(15, '2021_11_22_120317_create_categories_add_column_table', 10),
(16, '2021_11_23_110716_create_salons_table', 11),
(17, '2021_11_24_044613_create_staff_table', 12),
(18, '2021_11_24_061018_create_clinet_rename_table', 13),
(20, '2021_11_24_071305_create_salons_add_column_table', 14),
(21, '2021_11_24_105759_create_users_slaon_add_column_table', 15),
(26, '2021_11_25_044853_create_add_client_in_user_table', 16),
(27, '2021_11_25_051128_create_add_otpcolumn_in_user_table', 17),
(28, '2021_11_25_124312_create_products_add_column_table', 18),
(29, '2021_11_25_130502_create_supplierunique_table', 19),
(31, '2021_11_26_101907_create_uniqueproducts_table', 20),
(32, '2021_11_26_111904_create_categories_add_column_table', 21),
(33, '2021_11_26_123038_create_services_add_column_table', 22),
(35, '2021_11_27_101331_create_add_otpcolumqn_in_user_table', 23),
(37, '2021_11_27_103334_create_add_on_services_table', 24),
(38, '2021_11_29_111629_create_panel_add_column_table', 25),
(39, '2021_11_29_125741_create_staff_add_column_table', 26),
(40, '2021_11_29_155048_create_voucher_table', 27),
(41, '2021_11_29_170811_create_voucher_add_column_table', 28),
(45, '2021_11_30_111528_create_busy_time_table', 29),
(47, '2021_12_03_161739_create_change_user_column_table', 30);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `panel` enum('Backend','Frontend','Common') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Backend',
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `controller` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `functionality` enum('crud','singleview','other','none') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'crud',
  `type` enum('Menu','Submenu','Subsubmenu') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Menu',
  `parent_menu_id` int(10) UNSIGNED DEFAULT NULL,
  `parent_submenu_id` int(10) UNSIGNED DEFAULT NULL,
  `menu_position` int(10) UNSIGNED DEFAULT NULL,
  `submenu_position` int(10) UNSIGNED DEFAULT NULL,
  `is_hiddden` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `is_active_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `panel`, `title`, `controller`, `action`, `icon`, `functionality`, `type`, `parent_menu_id`, `parent_submenu_id`, `menu_position`, `submenu_position`, `is_hiddden`, `is_active`, `is_active_at`, `created_at`, `updated_at`) VALUES
(1, 'Backend', 'Dashboard', 'dashboard', 'index', 'fas fa-tachometer-alt', 'crud', 'Menu', NULL, NULL, NULL, NULL, '0', '1', '2021-11-18 06:23:47', '2021-11-16 23:50:46', '2021-11-22 00:14:00'),
(2, 'Backend', 'User Management', '', '', 'fas fa-users-cog', 'other', 'Menu', NULL, NULL, NULL, NULL, '0', '1', '2021-11-17 06:16:16', '2021-11-16 23:51:21', '2021-11-18 22:56:29'),
(3, 'Backend', 'Modules', 'modules', 'index', 'far fa-circle', 'crud', 'Submenu', 2, NULL, NULL, NULL, '0', '1', '2021-11-18 06:24:34', '2021-11-16 23:51:38', '2021-11-18 00:54:34'),
(4, 'Backend', 'Permissions', 'permissions', 'index', 'far fa-circle', 'crud', 'Submenu', 2, NULL, NULL, NULL, '0', '1', '2021-11-17 06:53:25', '2021-11-16 23:52:14', '2021-11-22 00:24:10'),
(5, 'Backend', 'Roles', 'roles', 'index', 'far fa-circle', 'crud', 'Submenu', 2, NULL, NULL, NULL, '0', '1', '2021-11-17 06:53:35', '2021-11-16 23:52:51', '2021-11-22 00:09:18'),
(6, 'Backend', 'Templates', '', '', 'fas fa-envelope-open-text', 'other', 'Menu', NULL, NULL, NULL, NULL, '0', '1', NULL, '2021-11-17 02:03:07', '2021-11-17 02:03:07'),
(7, 'Backend', 'Email Templates', 'emailtemplates', 'index', 'far fa-circle', 'crud', 'Submenu', 6, NULL, NULL, NULL, '0', '1', '2021-11-18 06:23:57', '2021-11-17 02:03:53', '2021-12-07 05:09:17'),
(8, 'Backend', 'Settings', 'settings', 'index', 'fas fa-cog', 'crud', 'Menu', NULL, NULL, NULL, NULL, '0', '1', '2021-11-19 05:42:58', '2021-11-18 03:41:22', '2021-11-22 00:09:55'),
(9, 'Backend', 'Custom Pages', 'custompages', 'index', 'far fa-circle', 'crud', 'Submenu', 6, NULL, NULL, NULL, '0', '1', NULL, '2021-11-18 03:44:49', '2021-11-18 03:44:49'),
(10, 'Backend', 'Users', 'users', 'index', 'far fa-circle', 'crud', 'Submenu', 2, NULL, NULL, NULL, '0', '1', '2021-11-19 06:45:13', '2021-11-18 22:56:20', '2021-11-24 05:24:43'),
(11, 'Backend', 'Salons', 'salons', 'index', 'fas fa-spa', 'crud', 'Menu', NULL, NULL, NULL, NULL, '0', '1', '2021-12-07 08:45:19', '2021-11-23 05:25:16', '2021-12-07 03:15:19');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0206997fcf22e162e76f5fbef7a3fbbfb1036dffcbad252d9ce1fcc51480d4eaf6dbf47e76ea084d', 4, 1, '4', '[]', 0, '2021-12-08 07:13:39', '2021-12-08 07:13:39', '2022-12-08 12:43:39'),
('020dfd252545af0d2db20204ec507f4bfc2bcce8170edafc649fd8c613b3624af2e6b0ab291da81b', 4, 1, '4', '[]', 0, '2021-12-09 07:22:00', '2021-12-09 07:22:00', '2022-12-09 12:52:00'),
('0248d652eebd4536192015e74f1681980a9eb0a520d4d56b00c99b4d99d3237b952829235e50b6b3', 4, 1, '4', '[]', 1, '2021-12-13 03:06:29', '2021-12-13 03:06:29', '2022-12-13 08:36:29'),
('02bf33a0835b5204c06b348ecac4e9a843c50fd6094b1354446f9998cf20dd5138a8b3f7ad97dfb5', 4, 1, '4', '[]', 0, '2021-12-10 02:02:10', '2021-12-10 02:02:10', '2022-12-10 07:32:10'),
('030b06de41261d49f8c6dcf30d5480a0e9e3091e538fdbf532e74a2b9c32936eea0145674b776257', 4, 1, '4', '[]', 0, '2021-12-11 03:35:37', '2021-12-11 03:35:37', '2022-12-11 09:05:37'),
('0415dad0396452cbbad614bf5cc5336de28c9d49775fcefafa157675998e0fea0d86fb121c7cb252', 4, 1, '4', '[]', 0, '2021-12-11 06:51:42', '2021-12-11 06:51:42', '2022-12-11 12:21:42'),
('046a0ee1fdfe4b59b64116602b72e099bbd8932723165c9aec1806845535d34d5abb6dcd8d5441e6', 4, 1, '4', '[]', 1, '2021-12-13 05:25:36', '2021-12-13 05:25:36', '2022-12-13 10:55:36'),
('047f535462f9e395794c74445d320a530d09c4524258befc8d050c683bcbda4c39560883f213bc55', 4, 1, '4', '[]', 0, '2021-12-09 07:21:53', '2021-12-09 07:21:53', '2022-12-09 12:51:53'),
('0639c716d4df9d868890f174e41cf60cbc0ffee286915d4132f7e8453a7df49bef04264b48d41b00', 4, 1, '4', '[]', 0, '2021-12-09 06:54:02', '2021-12-09 06:54:02', '2022-12-09 12:24:02'),
('0848f723b5ec93db0e799f53ee61a3d221fb38ad6622f567b6d8f5a27971b848ef7e1043b6a1810f', 4, 1, '4', '[]', 0, '2021-12-10 05:00:23', '2021-12-10 05:00:23', '2022-12-10 10:30:23'),
('097ace64b43e011c394653613e708f1266a8febce2b35805715aa0ff046087b0246b45a406e5f4cc', 4, 1, '4', '[]', 0, '2021-12-09 23:04:55', '2021-12-09 23:04:55', '2022-12-10 04:34:55'),
('09804fe85620f7f64dffd9bb93064901a145c9d889e93b6b5c29f4c9eeaab59e0f0bdae424cd61e4', 4, 1, '4', '[]', 0, '2021-12-10 06:06:50', '2021-12-10 06:06:50', '2022-12-10 11:36:50'),
('0a2cf5e447882dc3ab3a239655f8289e3f7febd020c8b0b23421fbeb811321e36051bcfcf788703e', 4, 1, '4', '[]', 0, '2021-12-09 05:34:57', '2021-12-09 05:34:57', '2022-12-09 11:04:57'),
('0c804004c4ae6a5159b46aa1c13e54b9fcd690879b4b9fceafe2ee9b356a5c232596bdfa6c91086e', 4, 1, '4', '[]', 0, '2021-12-09 07:18:48', '2021-12-09 07:18:48', '2022-12-09 12:48:48'),
('0cc06652fd9756aef0664028a28ac792c02ff2cb2a72daddbb0526f5655a481f96f462fa36958993', 4, 1, '4', '[]', 1, '2021-12-11 07:20:24', '2021-12-11 07:20:24', '2022-12-11 12:50:24'),
('0d937ac5ba9f30672ce1f11b94db791e23e258b5ecbeb9fb2a04eab1f26c59b947cf4fb71f958ab6', 4, 1, '4', '[]', 0, '2021-12-08 07:12:09', '2021-12-08 07:12:09', '2022-12-08 12:42:09'),
('0e988cac3231a70f13e075dac31bfffc6c07a0995dcb114aecc103baab7f0c53e618834a30dacd15', 4, 1, '4', '[]', 0, '2021-12-11 04:11:37', '2021-12-11 04:11:37', '2022-12-11 09:41:37'),
('0fb5f3e1c7fd80a8acd6c71b2f86b117d437d171e8a48eea9090878ce40e972994c6232925a733c8', 4, 1, '4', '[]', 0, '2021-12-09 23:54:56', '2021-12-09 23:54:56', '2022-12-10 05:24:56'),
('0fc0a93c57d0a8da25a5f8c2d7961ddef1073e75d4a62013c379bd1da8ada92549cfa555e0af7f63', 4, 1, '4', '[]', 1, '2021-12-11 07:20:28', '2021-12-11 07:20:28', '2022-12-11 12:50:28'),
('1014d0000950a5ef259f8545b46da23ec280fe817515034526337f3565fb34e8b37140a11df6a9ed', 4, 1, '4', '[]', 0, '2021-12-10 06:02:40', '2021-12-10 06:02:40', '2022-12-10 11:32:40'),
('132a12872ed4455a831788e9d691aa8e8f652555ca866a0413dde606421b0848629df7e9f6e64407', 4, 1, '4', '[]', 0, '2021-12-10 06:10:36', '2021-12-10 06:10:36', '2022-12-10 11:40:36'),
('1348222237cac6126217d896784d354eb5204d77e91469feb6cb78349f9236e9ed1767b49c91ec20', 4, 1, '4', '[]', 0, '2021-12-10 00:09:25', '2021-12-10 00:09:25', '2022-12-10 05:39:25'),
('140da28df2fa28a2c3acc2c0dc6e37dd841928fb11dfed3d70ef7930a5e65c1c98f2fb1cf66a30ba', 4, 1, '4', '[]', 1, '2021-12-13 00:32:11', '2021-12-13 00:32:11', '2022-12-13 06:02:11'),
('1422132d23589213d854ddc626523661e477c280374eda7a9cc3885451e2de8a23310c2b54963a3a', 4, 1, '4', '[]', 0, '2021-12-10 00:51:56', '2021-12-10 00:51:56', '2022-12-10 06:21:56'),
('14791cbeb3e875047419d26a2e5c7a86cf663f6e68e14b7569517a7429df60f75a5682c0c230924a', 4, 1, '4', '[]', 0, '2021-12-09 06:54:23', '2021-12-09 06:54:23', '2022-12-09 12:24:23'),
('15432d8b0e9057ae614441341d4ef716ae79d73ffb7d64bcaacb7af8e1d0484186f28901599f3a49', 4, 1, '4', '[]', 1, '2021-12-11 07:28:09', '2021-12-11 07:28:09', '2022-12-11 12:58:09'),
('16a72c91511b39538bb6b37626cb665bdc634a252b2cc3798f789a731a0e00d2e6ac5c283e3ac5cc', 4, 1, '4', '[]', 0, '2021-12-10 04:54:04', '2021-12-10 04:54:04', '2022-12-10 10:24:04'),
('172b63e82ed49fdda5f351bf2eda12f8bbace8ab06e3b45e8c6e3a78080c77db5942f40bbf27000e', 4, 1, '4', '[]', 0, '2021-12-11 03:34:00', '2021-12-11 03:34:00', '2022-12-11 09:04:00'),
('178f5ededc941bf81eab59171bd3abeda27e6b8d474a2cd7f0a05d9fc1f03c916bd554965d4d9e14', 4, 1, '4', '[]', 0, '2021-12-09 07:22:14', '2021-12-09 07:22:14', '2022-12-09 12:52:14'),
('185f157ecdafe6d2330325c00e0fcab32f316d07afd328ea4b2eea2ce375d9810e3c1f0cfaf16cca', 4, 1, '4', '[]', 0, '2021-12-09 05:18:32', '2021-12-09 05:18:32', '2022-12-09 10:48:32'),
('18b8e35f599f952e90e1429d1a629001b14ed538cdbce7b4423dd8c461b387fb89edb6d09d98f2a4', 4, 1, '4', '[]', 0, '2021-12-08 05:55:49', '2021-12-08 05:55:49', '2022-12-08 11:25:49'),
('1ad5207e2ecd9414f8c9233486f0abf0e825cefb6c1c2109d2cb27ae127b8e763b1bd2c11f30bcea', 4, 1, '4', '[]', 0, '2021-12-10 06:03:27', '2021-12-10 06:03:27', '2022-12-10 11:33:27'),
('1b129cc908b8e638ce213851534ebd4a25a4c34271f7b03a8342a3e3e59a863365ce4ea5742acd9e', 4, 1, '4', '[]', 1, '2021-12-13 00:08:10', '2021-12-13 00:08:10', '2022-12-13 05:38:10'),
('1b54252928111620e6284a61e23d71d232d08d375566acd5b044bf9db103735865bb0b770af72fc8', 4, 1, '4', '[]', 0, '2021-12-11 06:55:56', '2021-12-11 06:55:56', '2022-12-11 12:25:56'),
('1c21960a33beb235f36ae1134db70e482ed238e69d1d53384c01cfb81f7e01055cbef6ff3575f22d', 9, 1, '9', '[]', 0, '2021-12-08 05:57:50', '2021-12-08 05:57:50', '2022-12-08 11:27:50'),
('1c60521dfeacc706ad1d247737524d8e99629850f5f7e9e921108b8d0ea27b2c5b568fc8d93fdde5', 4, 1, '4', '[]', 0, '2021-12-10 06:54:18', '2021-12-10 06:54:18', '2022-12-10 12:24:18'),
('1dd059e02116f80bfeb128ecac607176c904064ae1711c8d2fe70417f82bd3096ca9181a2b934d71', 4, 1, '4', '[]', 0, '2021-12-10 05:48:17', '2021-12-10 05:48:17', '2022-12-10 11:18:17'),
('1e1583cf6bb904682dc2e299b5b0e2cc8ec26c8b540fc01035c1737b64b52da86d6d14f548a1d7aa', 9, 1, '9', '[]', 0, '2021-12-08 06:28:16', '2021-12-08 06:28:16', '2022-12-08 11:58:16'),
('1e33de126a0f0f4882e59d31eb2d4ef0332ff3a61fc066c6b68a9b184c9d4f27f537126f95f9a35c', 4, 1, '4', '[]', 0, '2021-12-09 05:35:01', '2021-12-09 05:35:01', '2022-12-09 11:05:01'),
('1f4a319e0165be695071ca9ef11ee6c9eb0eedc04d71fde787ac3addb5f05f942f5b17f612a93e48', 4, 1, '4', '[]', 0, '2021-12-08 07:45:12', '2021-12-08 07:45:12', '2022-12-08 13:15:12'),
('1f665df3b55f962d52f5cad1e4b5a6c83b8f6bddcd21fb25589e915cbd64004537ff1a94aefe0dea', 4, 1, '4', '[]', 0, '2021-12-09 05:38:09', '2021-12-09 05:38:09', '2022-12-09 11:08:09'),
('1f8903eb5a395a2633672fd7a43f6c6435153f7ba702ca5acda0981403ea2908896b688f783f4ad8', 4, 1, '4', '[]', 0, '2021-12-09 23:24:57', '2021-12-09 23:24:57', '2022-12-10 04:54:57'),
('1ff166ccbc8e20092349f395625675c9d2f124009e17f02b56bea3274c117da913a65e6a27e474d0', 4, 1, '4', '[]', 0, '2021-12-10 01:15:35', '2021-12-10 01:15:35', '2022-12-10 06:45:35'),
('2030ced117b29684507a86cbf014411052b4c95c4b6a8740d5147557560c92b352808596b3441a7b', 9, 1, '9', '[]', 0, '2021-12-11 03:38:10', '2021-12-11 03:38:10', '2022-12-11 09:08:10'),
('209078806a77357119b826d7a899ef93fddd9d60e141af2058ccccac3106151dcca184da1f2f5d48', 4, 1, '4', '[]', 1, '2021-12-13 00:55:02', '2021-12-13 00:55:02', '2022-12-13 06:25:02'),
('20b9f20b6e8ba9aa9932e28915e557daac05feb3cdc18c8d4f454efa29b3bde6f3c1f2405b2eb66b', 4, 1, '4', '[]', 0, '2021-12-10 06:14:20', '2021-12-10 06:14:20', '2022-12-10 11:44:20'),
('21dec799e24d88a32d88357be1b3aead97fbca61dbb8ddb924fd6a6a08ac71ea4b3af10fa9184a4c', 4, 1, '4', '[]', 0, '2021-12-10 06:17:35', '2021-12-10 06:17:35', '2022-12-10 11:47:35'),
('22367453b8e9e7d3d0bb30333ad951eeba7f00dca68d2a9a8db2eca693cbd0e2125f4184f5928bff', 4, 1, '4', '[]', 1, '2021-12-12 23:26:55', '2021-12-12 23:26:55', '2022-12-13 04:56:55'),
('22c201ee324503b7466ea5f7978ff843b71caed5797b1d5b9cffeebc20bd586559ffe491e7812d0f', 4, 1, '4', '[]', 0, '2021-12-10 04:08:47', '2021-12-10 04:08:47', '2022-12-10 09:38:47'),
('234bf858991972fb1d54f802fc2e83d077fbba9e474c14b96e0f6922a8ef067082403367e4ae5115', 4, 1, '4', '[]', 0, '2021-12-10 03:56:47', '2021-12-10 03:56:47', '2022-12-10 09:26:47'),
('247d2adf7424b4ac2a511ef873526f5a500d2164ecc4b24656ee0ec6d60951e8200df1564b796237', 4, 1, '4', '[]', 0, '2021-12-08 05:56:03', '2021-12-08 05:56:03', '2022-12-08 11:26:03'),
('24e8ced8b0a1269260cf29c072d2751d734efdeb5af20a74c8d423a3253e343bb5980fbf68326bcf', 4, 1, '4', '[]', 0, '2021-12-08 07:12:05', '2021-12-08 07:12:05', '2022-12-08 12:42:05'),
('257f6982819ce86a8c3a38c88a309a58ab93a28335fe3e9982368b94a4d57d528623a52735a5b9d9', 4, 1, '4', '[]', 0, '2021-12-08 07:39:18', '2021-12-08 07:39:18', '2022-12-08 13:09:18'),
('26558539ef05e9ab6e011ba162b444bdf772d687c508f50583ba99500c96a1722127a8b2892f67ba', 4, 1, '4', '[]', 1, '2021-12-11 07:19:43', '2021-12-11 07:19:43', '2022-12-11 12:49:43'),
('2673ac4ef71019fcf571042e6431b41dbc56fae1f9cd6e5b34691a112aa535fdfa4238dae629fd96', 4, 1, '4', '[]', 0, '2021-12-11 06:59:17', '2021-12-11 06:59:17', '2022-12-11 12:29:17'),
('267ad1ba6e840949deffc182da4f999d4ef05c8bae0aa9be3119eff7a7878a03b400cd585795e802', 4, 1, '4', '[]', 0, '2021-12-10 05:48:25', '2021-12-10 05:48:25', '2022-12-10 11:18:25'),
('27dc0ac18df3524c0c6f65719ebe5db82ca41d6fc1a18aa2b912ac3ec4b53c82daedbfafa2e07c78', 4, 1, '4', '[]', 0, '2021-12-09 23:28:58', '2021-12-09 23:28:58', '2022-12-10 04:58:58'),
('29229ed6437f2a61631a3b5b83cd19d287075a04d65bd8c81de6fb82e4ba1ca911ed2cd9ea8f00a1', 4, 1, '4', '[]', 0, '2021-12-09 07:21:48', '2021-12-09 07:21:48', '2022-12-09 12:51:48'),
('2a71a35f3382506bc430b671580efa3e65066d4fb3427349aaf29b50178d69c0ffe1d8a34e8af300', 4, 1, '4', '[]', 0, '2021-12-10 04:08:02', '2021-12-10 04:08:02', '2022-12-10 09:38:02'),
('2a7f1c37d88314f4ff6185b89f97a71474c0351d031a387556ecd88ec48f8109f2444ad227543ae9', 4, 1, '4', '[]', 0, '2021-12-10 06:06:17', '2021-12-10 06:06:17', '2022-12-10 11:36:17'),
('2afc5cd392a5ad5cf81e6bae341167440003d44ca98d9d8eba79674cf1417cc1ffedc346c415556b', 4, 1, '4', '[]', 0, '2021-12-08 06:36:47', '2021-12-08 06:36:47', '2022-12-08 12:06:47'),
('2b3f9e600e1eecadd25d3520758ee7f16544d774a8d00d0557f1fed82d7406cc31710c1d30f0add4', 4, 1, '4', '[]', 0, '2021-12-10 00:01:54', '2021-12-10 00:01:54', '2022-12-10 05:31:54'),
('2b9fb09ce077819535b3fdbe3b39f814d462f05720150dd4e487b2e731f06e89bceb8857bf60674e', 4, 1, '4', '[]', 0, '2021-12-09 23:13:35', '2021-12-09 23:13:35', '2022-12-10 04:43:35'),
('2e53c44f0bd46bed3ba05a2a35037309b269fdc5e72dc22bf951505253c06651c907404f634953a9', 4, 1, '4', '[]', 0, '2021-12-11 06:56:37', '2021-12-11 06:56:37', '2022-12-11 12:26:37'),
('2f085a776b9feab28c285867d0c590dae9cd80490cf12ec0fe9bca07a9be2b2f5191656e5b9f1d91', 4, 1, '4', '[]', 0, '2021-12-10 07:03:38', '2021-12-10 07:03:38', '2022-12-10 12:33:38'),
('2f4c66ce120ff08f26ed55427574ee7e8e8d23b7eb226bfa1b63c87336f939d6b656150e907967f0', 4, 1, '4', '[]', 0, '2021-12-10 01:23:07', '2021-12-10 01:23:07', '2022-12-10 06:53:07'),
('2f5833f016258bce4892a72f5f5208c1944ebf9d2bea1169112dfa0de9b22bdb27378964a2e95e1a', 4, 1, '4', '[]', 1, '2021-12-13 04:49:36', '2021-12-13 04:49:36', '2022-12-13 10:19:36'),
('30093ba67cb1c4026a1386ebbc0037cbd31db2821576f97d0a553054e091fd6e4e9d8df89b992987', 4, 1, '4', '[]', 0, '2021-12-09 07:00:09', '2021-12-09 07:00:09', '2022-12-09 12:30:09'),
('30bb3cc4a1a55ae9e8abcc0e0a8021abde621ac7f906749176808dfc084df164c4399b8a7704d9fe', 4, 1, '4', '[]', 0, '2021-12-11 01:38:54', '2021-12-11 01:38:54', '2022-12-11 07:08:54'),
('3184021c5743cdd2b130ab56b455072351135459c31fc4f4bfb28dbe2414c04234a3175bec71575f', 4, 1, '4', '[]', 0, '2021-12-09 23:04:31', '2021-12-09 23:04:31', '2022-12-10 04:34:31'),
('318fb77bc30224782a953219ae859ca7fb0b59ee373526c6a7ea7ba43c057bbdc84e5136124ada91', 4, 1, '4', '[]', 0, '2021-12-08 07:41:00', '2021-12-08 07:41:00', '2022-12-08 13:11:00'),
('31dd5ec567a30585882f0cdb58cececa1796db937704fdc83b1b6ea5cb2154f6dd5951736ef04032', 4, 1, '4', '[]', 0, '2021-12-13 05:57:32', '2021-12-13 05:57:32', '2022-12-13 11:27:32'),
('3343ffd946303bdbd369d44ffd2b6212a92c4d517789f571fa72f70ec2d42c5f42df852542802dba', 4, 1, '4', '[]', 0, '2021-12-10 04:53:32', '2021-12-10 04:53:32', '2022-12-10 10:23:32'),
('33ae6bac3ac53dbe079a8aac679ce30f7d20d1d45aacc1154efd0def748a1e43625daedf86e3f302', 4, 1, '4', '[]', 0, '2021-12-10 01:42:37', '2021-12-10 01:42:37', '2022-12-10 07:12:37'),
('349c49eed016ea0efcab9a0293697ae5febb40236bdff0399a3fb86f277f3041e6b4b8783feefdc5', 4, 1, '4', '[]', 0, '2021-12-10 04:58:57', '2021-12-10 04:58:57', '2022-12-10 10:28:57'),
('34abc5fba71d915c111a03bb902c8398f6f1ba93984e954baa8f5479af759757ae9eba1730d51e47', 4, 1, '4', '[]', 1, '2021-12-11 04:13:30', '2021-12-11 04:13:30', '2022-12-11 09:43:30'),
('35b15db9340c0d6fd73149db610fd61848615196bef085e9fc58711e80342ea8571231af80e82490', 4, 1, '4', '[]', 0, '2021-12-10 05:59:36', '2021-12-10 05:59:36', '2022-12-10 11:29:36'),
('365edc57e2ae4c8d11bc0b994936a6ac16a3b2eeddf383911a7bb552e00bac84c437f0d0f18914dd', 4, 1, '4', '[]', 0, '2021-12-09 23:13:47', '2021-12-09 23:13:47', '2022-12-10 04:43:47'),
('38037fa7c1cfd0d863edb65945561ff00f7a8982a9314736966145c868474df3ea8c9c4c13e6c631', 4, 1, '4', '[]', 0, '2021-12-10 04:47:00', '2021-12-10 04:47:00', '2022-12-10 10:17:00'),
('389899b04e7a88c2bce37c393c934d2bb25ae2cef379ffe5b22dda0f6300f86df5d078e32dfd613d', 4, 1, '4', '[]', 0, '2021-12-10 06:51:11', '2021-12-10 06:51:11', '2022-12-10 12:21:11'),
('38f1c6322e905c5792329ee95ed5e9a01cd8fa1153526f6d2364d6960ef666cefa61cd78cf97a247', 4, 1, '4', '[]', 0, '2021-12-10 01:49:02', '2021-12-10 01:49:02', '2022-12-10 07:19:02'),
('394a24e4ebc7bbdd93ad68554a8b760d023738b82fa566ea50b160ae6753319979708883d3d7a3ff', 4, 1, '4', '[]', 0, '2021-12-11 04:12:35', '2021-12-11 04:12:35', '2022-12-11 09:42:35'),
('39bef286a06062abe225018953c3bc6b8ac05f09c9a894d1c1c7427b356453c7a652962c49ab7ac8', 4, 1, '4', '[]', 0, '2021-12-08 05:58:19', '2021-12-08 05:58:19', '2022-12-08 11:28:19'),
('39dee6d5f34ee2adf522a4b863692e8cc01d51e2ec0d3340858beb797f75221d931a975b67db090b', 4, 1, '4', '[]', 0, '2021-12-09 06:48:48', '2021-12-09 06:48:48', '2022-12-09 12:18:48'),
('3a14e5f92963ca9fadb1ae59eddbf67e6829be51a921845d4d6a5c3461e486f7eed4336192edcc94', 4, 1, '4', '[]', 0, '2021-12-09 23:14:12', '2021-12-09 23:14:12', '2022-12-10 04:44:12'),
('3a6c9a943b0b6a1a6ce947d149e911905cd494b6f4ee923ac771437fe5b4832ce607e7b46be54f6d', 4, 1, '4', '[]', 0, '2021-12-10 06:06:08', '2021-12-10 06:06:08', '2022-12-10 11:36:08'),
('3a93bb969109e5eb89f0ab2c016732df8270e0fb11b7efa66a190c9044e09ea56161d761ea770660', 4, 1, '4', '[]', 1, '2021-12-13 03:46:06', '2021-12-13 03:46:06', '2022-12-13 09:16:06'),
('3b6b60e85c7d3adb3a95de84a330e57ce256f9707873194b2543522feead497e6038501b7a586aea', 4, 1, '4', '[]', 0, '2021-12-10 03:46:16', '2021-12-10 03:46:16', '2022-12-10 09:16:16'),
('3c05bed9ada5add08bf666c6c4c273ef301c489928abd25b848596a1f2744109af03aa1c92adfb4e', 4, 1, '4', '[]', 0, '2021-12-11 04:48:21', '2021-12-11 04:48:21', '2022-12-11 10:18:21'),
('3c2ef114ae4c463b086992fe907ed6eacdc06bc72befdae4be18cd096bca78192111247528683381', 4, 1, '4', '[]', 0, '2021-12-11 06:56:33', '2021-12-11 06:56:33', '2022-12-11 12:26:33'),
('3cdb01aaf86961cd5c2eea784d81725fee6942d7d24b5205ce6957ae14a8de56557dae2fc0a3cd15', 4, 1, '4', '[]', 1, '2021-12-11 07:19:32', '2021-12-11 07:19:32', '2022-12-11 12:49:32'),
('3d51a6f968dd2f551405e008997378146733d6e1a3cd70b7bb370c427d370cf17ce574202ef4fb30', 4, 1, '4', '[]', 0, '2021-12-11 06:07:27', '2021-12-11 06:07:27', '2022-12-11 11:37:27'),
('3d918f6d033c2e26a6c9e692c57f143e1164134473f546e747f09d009a97bc1944469d7bdf42809a', 4, 1, '4', '[]', 0, '2021-12-10 00:31:59', '2021-12-10 00:31:59', '2022-12-10 06:01:59'),
('3dc61c61b94c6338b061fcbde7e8ceb305768e21e606c660af77e31f8006516c9a3f43b633f77aec', 4, 1, '4', '[]', 1, '2021-12-13 00:19:58', '2021-12-13 00:19:58', '2022-12-13 05:49:58'),
('3de5805998608cba3615b56495fc0f307f3baf6decd9df49eb67b55002a60c553642e675065be394', 4, 1, '4', '[]', 0, '2021-12-10 00:38:01', '2021-12-10 00:38:01', '2022-12-10 06:08:01'),
('3e6fe6cdcd51d6aaa086c8c64fc78b042d84b415cbd38ecc1e18797358a6663f461581cd579556de', 4, 1, '4', '[]', 0, '2021-12-09 05:38:11', '2021-12-09 05:38:11', '2022-12-09 11:08:11'),
('3e8087bdf8ff1dd77180f6af7a693613ffb9f063dc85e2cc0860deac6cb846d465cda9f416429391', 4, 1, '4', '[]', 0, '2021-12-10 01:02:20', '2021-12-10 01:02:20', '2022-12-10 06:32:20'),
('3f50883564ea67e65771530bc0577548b0282815d7b0a300866a2eaa57deccb1c14306da6741a7b5', 4, 1, '4', '[]', 0, '2021-12-08 07:44:08', '2021-12-08 07:44:08', '2022-12-08 13:14:08'),
('412d348cb571d47aeae8b04a4d0750498faa0c93568956d3fc2511ded54585e7f8919aba6622196d', 4, 1, '4', '[]', 0, '2021-12-11 01:37:13', '2021-12-11 01:37:13', '2022-12-11 07:07:13'),
('413280c4f513e9f55486d91fd8a22626eb75135fa2e134f9802d237ed8dc9420571ebad0f05eafdb', 4, 1, '4', '[]', 0, '2021-12-10 05:00:16', '2021-12-10 05:00:16', '2022-12-10 10:30:16'),
('417632e2562ed3debb72a6b16133742afd4f4cad0a4a139cbbd6f8a6ef680d5103d8a3d384c0ddba', 4, 1, '4', '[]', 1, '2021-12-13 01:53:13', '2021-12-13 01:53:13', '2022-12-13 07:23:13'),
('4196db936f6b07e2c166b6fd4060d4d63020422cf02ecc2c83c4462e3524b3cb04dcf2d534043604', 4, 1, '4', '[]', 0, '2021-12-09 07:22:31', '2021-12-09 07:22:31', '2022-12-09 12:52:31'),
('41b485afcd30d7afe27a2f62798e8a36489e6c27cd4ef69f136838e6335a0da98528236e4f406f8c', 4, 1, '4', '[]', 0, '2021-12-10 03:54:52', '2021-12-10 03:54:52', '2022-12-10 09:24:52'),
('41fcb2574ff0430ef28d3a0a510a97c8cd0a84f0d478b4e498774636b7daf8d83d08163e74ca3221', 4, 1, '4', '[]', 0, '2021-12-08 05:52:57', '2021-12-08 05:52:57', '2022-12-08 11:22:57'),
('42284cbf0610e84efb63dbdd3e63338a7f33804ee59f8677fd25c627ef25755cec95b43da7f603a9', 4, 1, '4', '[]', 0, '2021-12-11 06:41:54', '2021-12-11 06:41:54', '2022-12-11 12:11:54'),
('42ee8a722c1c0295dedb855d45ce232fc6d094dab314514c4d1a553f2ad9d0215d0c26ed67c7e691', 4, 1, '4', '[]', 1, '2021-12-13 00:54:34', '2021-12-13 00:54:34', '2022-12-13 06:24:34'),
('43a5967dde992d5240aff68ad7f3496bf7a119151e7eb048a46ad97ba0ce1a8bb3ffb0eaf1eb95a7', 4, 1, '4', '[]', 1, '2021-12-13 00:46:38', '2021-12-13 00:46:38', '2022-12-13 06:16:38'),
('43ae61e058f66bf35f8827671855fdf8d301281e2283584378be25f78d35a9270c32da1f557294c1', 4, 1, '4', '[]', 1, '2021-12-13 03:11:02', '2021-12-13 03:11:02', '2022-12-13 08:41:02'),
('43f3d6ca1bfe9b391f876564995f6fe2e07bd6942acf89b0d5e08072670037a15af6df45c40f15ae', 4, 1, '4', '[]', 0, '2021-12-10 04:53:10', '2021-12-10 04:53:10', '2022-12-10 10:23:10'),
('4544795b0c345615f9c585513b456b650fd133ff9513a0c353c0095d425363a86f56ccdf0b116e66', 4, 1, '4', '[]', 1, '2021-12-11 07:23:45', '2021-12-11 07:23:45', '2022-12-11 12:53:45'),
('458c0451fe838361544c75e65aa17bfa709ad61636e26f0b13006f06531dd6c56ae2f13f5babcb25', 4, 1, '4', '[]', 0, '2021-12-10 00:47:01', '2021-12-10 00:47:01', '2022-12-10 06:17:01'),
('47e73b9a0e5692ca5d09f5cb1b58e834bf3df96507fb108d448625a1356cdd92e2677f88857a451f', 4, 1, '4', '[]', 0, '2021-12-10 06:38:43', '2021-12-10 06:38:43', '2022-12-10 12:08:43'),
('482f89a24f82a5bc17c2e2f29eee8067bbbbbdab9732c066bed3688d8e445fa5f75006f04ff1975c', 4, 1, '4', '[]', 1, '2021-12-13 00:35:14', '2021-12-13 00:35:14', '2022-12-13 06:05:14'),
('483b5f8a71479ec35cccfe004483d046f6f72782cbc7da70bcbaa5074e3b5efdbf8a50a75973a344', 4, 1, '4', '[]', 1, '2021-12-13 00:47:36', '2021-12-13 00:47:36', '2022-12-13 06:17:36'),
('48a40e66dcfb3b2b63568364beab08ba22633cb199ed8087d9d81206abbcb23c596e45c84e057a38', 4, 1, '4', '[]', 0, '2021-12-10 06:05:41', '2021-12-10 06:05:41', '2022-12-10 11:35:41'),
('4a30d0e452533e2470ffb31079a1b9cdc69f4327a2e60425d88f29b852879d013e0257cda322274f', 4, 1, '4', '[]', 0, '2021-12-10 06:13:43', '2021-12-10 06:13:43', '2022-12-10 11:43:43'),
('4a38520735605a0f33d9ecbc47dd5c43cbcfae5bb60aa7a278eea13cc1a2cfd46bd6a57d45016742', 4, 1, '4', '[]', 0, '2021-12-10 06:15:16', '2021-12-10 06:15:16', '2022-12-10 11:45:16'),
('4a6b79b57321b41060c7c2391dd105b838e047522c818e780e549f3c35fb2cf7c5993a73758bdee7', 9, 1, '9', '[]', 0, '2021-12-09 05:16:43', '2021-12-09 05:16:43', '2022-12-09 10:46:43'),
('4ab9237b57e45eb070419b663321270feb6fcada449fac44af7d43d9663c2a1990b26c43b85cf6ae', 4, 1, '4', '[]', 1, '2021-12-13 00:57:23', '2021-12-13 00:57:23', '2022-12-13 06:27:23'),
('4b6a6533c16b703ec27533e85f6de659ef385c992a044906666aeef6e7373d13dffe8edd6de47aee', 4, 1, '4', '[]', 0, '2021-12-10 06:03:11', '2021-12-10 06:03:11', '2022-12-10 11:33:11'),
('4bbc6b2f65fa192590087362f0d03740feb77505b44fb842b99c35cc613e8b5a75907b3115c8dde8', 4, 1, '4', '[]', 0, '2021-12-11 04:10:51', '2021-12-11 04:10:51', '2022-12-11 09:40:51'),
('4c8505d93c98bffdba8e6af02ea5aa3669010cb8573dbfe02880d9a0c5b9658ba4a279e1605ab56a', 4, 1, '4', '[]', 0, '2021-12-09 05:36:33', '2021-12-09 05:36:33', '2022-12-09 11:06:33'),
('4e61a22cde4415124cf0c32f53b9f5fe866e880931d4c748f76bd5c183b394d18ae7d1d3bb543145', 4, 1, '4', '[]', 1, '2021-12-13 01:19:10', '2021-12-13 01:19:10', '2022-12-13 06:49:10'),
('4ec7e7a0358bd58d6a835a57b0d1f4e3b2bb4b374a238d3ccdc59d821915fd201eccd6d0cdaf74f4', 9, 1, '9', '[]', 0, '2021-12-08 05:00:15', '2021-12-08 05:00:15', '2022-12-08 10:30:15'),
('4f26832bba10127d7026ee781242b4555c9ca82aed60fdab6efffb1db9cf80096b192c767f9553a7', 4, 1, '4', '[]', 0, '2021-12-10 05:00:18', '2021-12-10 05:00:18', '2022-12-10 10:30:18'),
('5039d0e36f560f8f6c8f8d66ec6f79291c6e9eb46e9bc3c3555687d6a6b8672a2254d836c05e677f', 4, 1, '4', '[]', 1, '2021-12-13 05:13:36', '2021-12-13 05:13:36', '2022-12-13 10:43:36'),
('509da54ec6cb32facbd0cd1d8019c37f74530ffdfebdd86d55942fb0a5d874f102a093f3fe0a0ece', 4, 1, '4', '[]', 1, '2021-12-13 00:46:47', '2021-12-13 00:46:47', '2022-12-13 06:16:47'),
('5123cf73125ec38157e023446a8ba0b453ce7943117ef2df937a6bf3df0a2594726b95f690f99899', 4, 1, '4', '[]', 0, '2021-12-11 03:30:13', '2021-12-11 03:30:13', '2022-12-11 09:00:13'),
('51500f617415fae3caf39d527bb6cb5ff3ac379a9b4b0ba9fa6f66f1ccf6f75d54d0bd93a72bdfa4', 4, 1, '4', '[]', 0, '2021-12-11 01:39:02', '2021-12-11 01:39:02', '2022-12-11 07:09:02'),
('518d5540daa4f94469c21ef9bde8d6213b15bb8da3fde31b5467092dc66ac022205ba425dcae5552', 4, 1, '4', '[]', 0, '2021-12-10 00:46:45', '2021-12-10 00:46:45', '2022-12-10 06:16:45'),
('51fffc8b03aa4f3ea89c5b0b84bfa0105c4113e90b26f16bd6ecf531c4166c8be42ec583cf5dc443', 4, 1, '4', '[]', 0, '2021-12-11 06:56:39', '2021-12-11 06:56:39', '2022-12-11 12:26:39'),
('538795d3a72fce9b8c348d4d3bae49c424764fa9904d2b5cb8327ac6f8df445a6b7077267f53a62d', 4, 1, '4', '[]', 0, '2021-12-10 05:45:06', '2021-12-10 05:45:06', '2022-12-10 11:15:06'),
('53c5b33f780818f727cc5de10414218a5161a4529c7d9a31c9d3b93b2d126a926c6fc976604ecf1f', 4, 1, '4', '[]', 0, '2021-12-09 07:31:27', '2021-12-09 07:31:27', '2022-12-09 13:01:27'),
('546ede0a975581cf63a0a1376565ad6cdf4545fc165d7607215963498ccbc483d1d46f2a410a3df6', 4, 1, '4', '[]', 1, '2021-12-13 00:33:46', '2021-12-13 00:33:46', '2022-12-13 06:03:46'),
('5493d4966bad3e2196dbe138cc577d90b8eab50f41145b7544a4ad684e53700e967bdc9ff0a9da67', 4, 1, '4', '[]', 0, '2021-12-11 06:13:43', '2021-12-11 06:13:43', '2022-12-11 11:43:43'),
('550757513b46fe489f51cc2453f2862b47ec2a95641876ec52c9c69f7801a75f5609378bac456dd8', 4, 1, '4', '[]', 0, '2021-12-10 05:00:21', '2021-12-10 05:00:21', '2022-12-10 10:30:21'),
('5689c2851459d78b3550b628b6f9deee7ba6bd929a2fdf8683f4f74cf4450a757b69de298bd2a603', 4, 1, '4', '[]', 0, '2021-12-08 05:55:35', '2021-12-08 05:55:35', '2022-12-08 11:25:35'),
('56c058dc7ea0109a84e9dad4b0b86fb2957810ceeb7b81e32d63a11c68cc0bccc1de1a52ea2253f7', 4, 1, '4', '[]', 0, '2021-12-10 01:34:24', '2021-12-10 01:34:24', '2022-12-10 07:04:24'),
('570232bc4963153507424654be779eccade2302a8d4ee23f7b4d02201e6c1c8a21a74a199c2ab768', 4, 1, '4', '[]', 0, '2021-12-09 07:22:24', '2021-12-09 07:22:24', '2022-12-09 12:52:24'),
('57d33e1888ec90399f415e74ca5d9f2ef41685061ee38ecd6f98081a1f314450f0b79a2b29246355', 4, 1, '4', '[]', 0, '2021-12-10 00:36:08', '2021-12-10 00:36:08', '2022-12-10 06:06:08'),
('5949d61e570846e21be6ef5a5e1a462e1b2da583dc96d9657d9b8e87c511ab5b45268c1bc8896747', 4, 1, '4', '[]', 0, '2021-12-11 03:30:02', '2021-12-11 03:30:02', '2022-12-11 09:00:02'),
('5992c9f6996ad9152ea8a3cf5ab675f3b600d72f6bc68be50d4f6650c7e274eeceb513ae2c8a5684', 4, 1, '4', '[]', 0, '2021-12-10 06:10:32', '2021-12-10 06:10:32', '2022-12-10 11:40:32'),
('599b4760f0793f9bf05636d67e474a5e8d2b89708ee971deaba07fccf105f960ba55573314599f93', 4, 1, '4', '[]', 0, '2021-12-11 03:33:21', '2021-12-11 03:33:21', '2022-12-11 09:03:21'),
('5a1942aeb5b09946420e318f9b8f01bb9be92fc8c2aa99f008ff3dcccc237fbea5424c05e64251da', 4, 1, '4', '[]', 0, '2021-12-10 06:28:35', '2021-12-10 06:28:35', '2022-12-10 11:58:35'),
('5a1d464fdc47f3e40b63e4326eafa9b1bca78495cda2095e18f8ca2cd677ba5c106b7b1d48fe9fbe', 4, 1, '4', '[]', 0, '2021-12-10 06:10:45', '2021-12-10 06:10:45', '2022-12-10 11:40:45'),
('5a5aa644c5905f0bf69de11005544865a7cbf1931bc5b802cefce2d1e281e7fc28ae575b49f99eac', 4, 1, '4', '[]', 0, '2021-12-08 07:43:47', '2021-12-08 07:43:47', '2022-12-08 13:13:47'),
('5b42e68423c954aa680f47e9d772be5fd07e70e6ff3a7867b45b4bb0b13ec88fc78e5686bdcf5a24', 4, 1, '4', '[]', 0, '2021-12-11 07:33:08', '2021-12-11 07:33:08', '2022-12-11 13:03:08'),
('5b6437dfc285b5f38d26242527c37b91b809d838123df59711682b9711950f05087abfea3d752af2', 4, 1, '4', '[]', 0, '2021-12-10 01:11:08', '2021-12-10 01:11:08', '2022-12-10 06:41:08'),
('5b87dba6493b1e45b77e2273ba9c859276227ee1f89afed4ad38970de36827d0c25a51be7da57a17', 4, 1, '4', '[]', 0, '2021-12-10 00:08:55', '2021-12-10 00:08:55', '2022-12-10 05:38:55'),
('5ba8c3e7086b36d57eff707a42ed1529d82272b75bb8d772bea0067db6ffce921ffb0facf2ff9902', 4, 1, '4', '[]', 0, '2021-12-10 06:08:27', '2021-12-10 06:08:27', '2022-12-10 11:38:27'),
('5cbeed978b44e6204ec85e827606fcab5e096bb3d26a55fcce9ff03f1b16e82201d1308e4dab02d0', 4, 1, '4', '[]', 0, '2021-12-09 23:12:08', '2021-12-09 23:12:08', '2022-12-10 04:42:08'),
('5d2574836e80f6b10525712d77750a66160d5406a1dd4720535612a2757ba6f1fc0f8d7eaa8c84d0', 4, 1, '4', '[]', 1, '2021-12-13 00:08:01', '2021-12-13 00:08:01', '2022-12-13 05:38:01'),
('5d2d515b768d152c256aa02bba91deaa489aa3000936551c02853847f8df882b6b2e8851e5990d5b', 4, 1, '4', '[]', 1, '2021-12-13 00:57:36', '2021-12-13 00:57:36', '2022-12-13 06:27:36'),
('5d5e0c9bcc4d96b876a34b5648ac20fa9248a1b09057fc1f93fe65e3b5a1dcfb9ecb9f14c1d41f44', 4, 1, '4', '[]', 0, '2021-12-11 06:13:09', '2021-12-11 06:13:09', '2022-12-11 11:43:09'),
('5d766da4f58c3447810f2ed4419f2c8574edcac57915b7f3c342326a4e7c383bcbcc6983613c271c', 4, 1, '4', '[]', 1, '2021-12-13 00:20:48', '2021-12-13 00:20:48', '2022-12-13 05:50:48'),
('5d816f3d35a808f698c644f0aab6b054676a913a23bc43d18839ce1c52f859b927188585f99e9ae4', 4, 1, '4', '[]', 0, '2021-12-10 05:57:01', '2021-12-10 05:57:01', '2022-12-10 11:27:01'),
('5e63903d31e33eb8d6cd253242b2429d26fee3a464d946bc36f764852329307e83cebda6ddbbbfdb', 4, 1, '4', '[]', 1, '2021-12-13 05:25:27', '2021-12-13 05:25:27', '2022-12-13 10:55:27'),
('5e7cd3f34b1737d0645997f23adaca5afb8b9770555425054dd6b79ec658c30cbb34c64774cfbe63', 4, 1, '4', '[]', 0, '2021-12-11 06:41:27', '2021-12-11 06:41:27', '2022-12-11 12:11:27'),
('5edbf3558b9b2bf9daf05dc00606a28ffb37b33b0b4e48372e718f9507a571d44f1cc7330f97c142', 4, 1, '4', '[]', 0, '2021-12-09 06:56:51', '2021-12-09 06:56:51', '2022-12-09 12:26:51'),
('5f4ff7868bcd73981f292a952877f17ad064f7ccf4c87e9524ac364b79efbed9d1d9fb79a4927728', 4, 1, '4', '[]', 0, '2021-12-10 05:59:27', '2021-12-10 05:59:27', '2022-12-10 11:29:27'),
('5f5f47b5c5531ffa11c6ae0c1d6b22a64006bf8fa2d73409e1dfabb4f295df4a1caedb2b6c963b69', 4, 1, '4', '[]', 0, '2021-12-09 07:29:18', '2021-12-09 07:29:18', '2022-12-09 12:59:18'),
('60824cd5001403678c4c877878757cb93a329317d71bcb0ab1d35a4ba958c076f917465bded9cdce', 4, 1, '4', '[]', 0, '2021-12-10 00:21:16', '2021-12-10 00:21:16', '2022-12-10 05:51:16'),
('6083aca46c4d2765539da2878baa490424f8f3e3bc7e07b7044cfdcef654a873c573185a83f5ded8', 4, 1, '4', '[]', 0, '2021-12-10 05:54:29', '2021-12-10 05:54:29', '2022-12-10 11:24:29'),
('60abfe8a5cc221229181adc1503a60195c34eedf1986c94fbf35446c849d09998c8b2f9db010546f', 4, 1, '4', '[]', 1, '2021-12-13 01:30:01', '2021-12-13 01:30:01', '2022-12-13 07:00:01'),
('60bab720d647b677b7e9b4a23de40a39e61624f259dd3f0a9ee1c8e43743bccce861887bd68bac7d', 4, 1, '4', '[]', 1, '2021-12-13 01:02:57', '2021-12-13 01:02:57', '2022-12-13 06:32:57'),
('6122f68c43aa257cac92bdcc1548e46759d8e1b3b9bf24f718814e4ef48346a8347a7c10cc590ad8', 4, 1, '4', '[]', 0, '2021-12-10 02:02:19', '2021-12-10 02:02:19', '2022-12-10 07:32:19'),
('618fd98b66db6c6743acf1133a736f6147eb4ee2388a8c4fcbc627a287fbba6eac5d89f9a2ec751f', 4, 1, '4', '[]', 0, '2021-12-10 00:36:24', '2021-12-10 00:36:24', '2022-12-10 06:06:24'),
('61f97cdb476913348aa701c51a569c89a2350aa93e50068894da4914b494a84d55026aa1867af438', 4, 1, '4', '[]', 0, '2021-12-10 00:09:29', '2021-12-10 00:09:29', '2022-12-10 05:39:29'),
('621f57bc68fb6c993110df3cebad6d7df5cb65053d6d4d84d1b87b6efc5b2dc2c9df78f7f459f3c4', 4, 1, '4', '[]', 0, '2021-12-09 07:41:42', '2021-12-09 07:41:42', '2022-12-09 13:11:42'),
('6299faf8bcdea14bfb657c5487c49061e942ff5019d577c14817155690ad1ef8f99759241d147c99', 4, 1, '4', '[]', 0, '2021-12-09 05:38:12', '2021-12-09 05:38:12', '2022-12-09 11:08:12'),
('62bebb3f81a406a2ceb2753820f69b250bcc0d99e39b358e9fb2ede7451e0ea825b074cca39fae7b', 4, 1, '4', '[]', 0, '2021-12-08 06:28:40', '2021-12-08 06:28:40', '2022-12-08 11:58:40'),
('6322b46f615f520f31ef4f890769ee88645ffe85fa88053720c84177fe525a44288492172cab558f', 4, 1, '4', '[]', 0, '2021-12-10 00:40:05', '2021-12-10 00:40:05', '2022-12-10 06:10:05'),
('63e83faa824bb1a6ed43cb9b0a5a60f7c4f866666ebe73c11f6633522c9b8e73a909f860760d8085', 4, 1, '4', '[]', 0, '2021-12-13 05:58:06', '2021-12-13 05:58:06', '2022-12-13 11:28:06'),
('664f6b474f2cfb23ef64373646f6b6f805c3bed811c2c38e3a59d833b1461b8cade6935dc70923af', 4, 1, '4', '[]', 0, '2021-12-10 05:54:21', '2021-12-10 05:54:21', '2022-12-10 11:24:21'),
('687c1b2111a318ec6599003dea761d1af366743b569a4d61f9d25705b47cab7a0806ba3f09563d13', 4, 1, '4', '[]', 0, '2021-12-09 23:04:59', '2021-12-09 23:04:59', '2022-12-10 04:34:59'),
('6a29297b888e420d3124dd8e1a994737d1229d7039245b6f4e6409d05d6f03a2823d3bac5856a272', 4, 1, '4', '[]', 1, '2021-12-13 00:16:06', '2021-12-13 00:16:06', '2022-12-13 05:46:06'),
('6a7eb2b6315fbf75746ad794f8ce6dc0f6efe50155b677523b454b3c7a0f4e53bd5dbe14191129ce', 4, 1, '4', '[]', 1, '2021-12-11 07:20:30', '2021-12-11 07:20:30', '2022-12-11 12:50:30'),
('6bef9d1be642928573d6d197fccc7e743bcd39662f4a08daebe90ff4ba8a2fda20d6797728b59f1d', 4, 1, '4', '[]', 0, '2021-12-10 06:02:01', '2021-12-10 06:02:01', '2022-12-10 11:32:01'),
('6d56e917d84d3729ef580749a9631192b43179bcf0bdb7ff5360be3e2f1f081fcf2bf17abd4de568', 4, 1, '4', '[]', 1, '2021-12-13 00:35:12', '2021-12-13 00:35:12', '2022-12-13 06:05:12'),
('6dd359c1c9eecb65cb8da0193e20f1de671351605d8a6905375c8d24ad0950a116ac4970478d5c89', 4, 1, '4', '[]', 0, '2021-12-08 08:02:10', '2021-12-08 08:02:10', '2022-12-08 13:32:10'),
('6e006affa2535db0ada7f971d752df1dfcf04b89670966e23878640dc1496e9b1d773132915e46af', 4, 1, '4', '[]', 0, '2021-12-10 06:46:07', '2021-12-10 06:46:07', '2022-12-10 12:16:07'),
('6e24b21f97296a48511ac793e4a6b32b8ab973ac77924f156a2a8789a2e9e0fb201db0bc426de511', 4, 1, '4', '[]', 0, '2021-12-11 06:42:18', '2021-12-11 06:42:18', '2022-12-11 12:12:18'),
('6e49cc4b81e2c98057f477398dad24ef1d998ef1260e5ffc1ee84970649d7629e8bef68733287564', 4, 1, '4', '[]', 0, '2021-12-10 01:44:08', '2021-12-10 01:44:08', '2022-12-10 07:14:08'),
('6eca62c5f69ba262efca0409459a9e939470c15d6ba8765e9aeabea0202c428cde989141f0913bcc', 4, 1, '4', '[]', 0, '2021-12-10 05:53:43', '2021-12-10 05:53:43', '2022-12-10 11:23:43'),
('7149ea0be063cc8c922640242f26164a92de92f1d02f9e91b4e56d88e18db92b76941e914cb8de5d', 4, 1, '4', '[]', 0, '2021-12-10 05:13:01', '2021-12-10 05:13:01', '2022-12-10 10:43:01'),
('72232a687eb84075f49d3c3a55389c021565d9fd4d3b644f2d77cbbb8800e596c701cf84de9be573', 4, 1, '4', '[]', 0, '2021-12-11 03:32:56', '2021-12-11 03:32:56', '2022-12-11 09:02:56'),
('72629782be702eefefe13bcf310a2b9108b5ac3ee9dae8404dec024b6f0a4a4304075ab489e1c797', 4, 1, '4', '[]', 0, '2021-12-11 01:46:27', '2021-12-11 01:46:27', '2022-12-11 07:16:27'),
('72b968f61b25395533d4df68899092cd9b57f669f2e568deaea1f6b5697c406eba0177d906bd176f', 4, 1, '4', '[]', 0, '2021-12-10 06:12:18', '2021-12-10 06:12:18', '2022-12-10 11:42:18'),
('733786156a129adbaa2d5c2cb1015b87d3ed9f47eedfa99764fcb704bbc5829a9ede666b67c600d4', 4, 1, '4', '[]', 1, '2021-12-11 07:19:35', '2021-12-11 07:19:35', '2022-12-11 12:49:35'),
('7341952a75f80d9237ccfad34d78b5b6def3fb20ead587641648290262f817e4ce42f5f0fcbd8b64', 4, 1, '4', '[]', 0, '2021-12-08 06:01:21', '2021-12-08 06:01:21', '2022-12-08 11:31:21'),
('74c75b8d37c8c40748c644b738e4ea5709dd6b9873535e2cad5c8e46468053608987caabd1493044', 4, 1, '4', '[]', 0, '2021-12-09 06:52:31', '2021-12-09 06:52:31', '2022-12-09 12:22:31'),
('762f18fe720410e3f5ad3f5b04f651ce0b716366812ce9e5baff55c0f9bd1ac8b279e21d23e11a36', 4, 1, '4', '[]', 1, '2021-12-13 01:04:56', '2021-12-13 01:04:56', '2022-12-13 06:34:56'),
('773c87d3048cc1a470d22b04129d802f0b68c83f60f1d3b24958aaa7ebd9b2b87e33c9a102c16867', 4, 1, '4', '[]', 1, '2021-12-11 07:10:48', '2021-12-11 07:10:48', '2022-12-11 12:40:48'),
('788b6860c541e67455fe4df3d1be79388c706bc9928a83c982835b5b803d668854b98d3ba5ebb6a9', 4, 1, '4', '[]', 0, '2021-12-10 01:28:01', '2021-12-10 01:28:01', '2022-12-10 06:58:01'),
('78b7a59eec2ff14801edbb327e10e1d010068d2bc8b529af0d78b9c65f4a13b4612b1675d3cb8e4e', 4, 1, '4', '[]', 0, '2021-12-10 05:55:30', '2021-12-10 05:55:30', '2022-12-10 11:25:30'),
('795849d181602da2bab5dfe2ae89ca2277a27cf6a8036705f8ae11cfd18d130079b7f15ca274d17e', 4, 1, '4', '[]', 0, '2021-12-08 06:22:10', '2021-12-08 06:22:10', '2022-12-08 11:52:10'),
('7991578a7332d216d9de3a19be4de00466d4b2eb251a08f46e272bc6be31514bfdfdcf00426747a5', 4, 1, '4', '[]', 1, '2021-12-13 00:53:30', '2021-12-13 00:53:30', '2022-12-13 06:23:30'),
('79b2118bb350b7ceba36c920b9e2c20dd8168cecccbba854751146bfdfa3bca9b08b0454aabf44b1', 4, 1, '4', '[]', 0, '2021-12-11 05:07:08', '2021-12-11 05:07:08', '2022-12-11 10:37:08'),
('7a812e2ac1b1e43ab8b7dd42e2e44f71a9bce35b18b36507157a8947f667c00a98624655a308844a', 4, 1, '4', '[]', 0, '2021-12-09 07:21:43', '2021-12-09 07:21:43', '2022-12-09 12:51:43'),
('7a93f4d873f11378b4c0f5782a56da4c5fc8f6ebf535d30fd4f4150e5d1bba5a5a76576a10fbffda', 4, 1, '4', '[]', 0, '2021-12-09 05:38:11', '2021-12-09 05:38:11', '2022-12-09 11:08:11'),
('7b6e2306224e39345ca38bdd1b4897d4ffebdfacdf9b2b1d08bf52b10a59acf53f5778f4255df9a1', 4, 1, '4', '[]', 0, '2021-12-10 06:02:34', '2021-12-10 06:02:34', '2022-12-10 11:32:34'),
('7b76787a4b9f0f9621d4879bafc9ca8f1728f575ee1ac381116dbee9b2dd960f7e105b215ec4c4c2', 4, 1, '4', '[]', 0, '2021-12-08 07:11:19', '2021-12-08 07:11:19', '2022-12-08 12:41:19'),
('7b8b372858b6e27acfccf234d6f6180507f9f8a172b9f96f9a94168a0686c7a9265ee7f8490fcd92', 4, 1, '4', '[]', 0, '2021-12-09 07:21:55', '2021-12-09 07:21:55', '2022-12-09 12:51:55'),
('7bc65e543fa9231314bec390a664e05ff3188b837e94615eda4ce7ed1405c95b245a7d98d10e6fe8', 4, 1, '4', '[]', 0, '2021-12-10 06:00:03', '2021-12-10 06:00:03', '2022-12-10 11:30:03'),
('7c0a2545da2a4f15ea60b7781942e764d1cfeefe952d0e5cbef1504a454929f4753f0d27eb758df6', 4, 1, '4', '[]', 1, '2021-12-13 01:05:04', '2021-12-13 01:05:04', '2022-12-13 06:35:04'),
('7e687c54074a64eccb614f6d2143e51e717e2fc7efddc30fbf22f6ecc7bf9c21f44abc53338b5e58', 4, 1, '4', '[]', 0, '2021-12-09 07:20:42', '2021-12-09 07:20:42', '2022-12-09 12:50:42'),
('7ee62f5a60ca5592cbc4cd68ef9dde723bc87830780bace598a3d449dbffb51fb43fddc6f22aa608', 4, 1, '4', '[]', 0, '2021-12-08 06:12:06', '2021-12-08 06:12:06', '2022-12-08 11:42:06'),
('7f91388ff34d82bd26dadd36fb402015608ffe0c5d62d887d0cff3929a32a0be123371a401e0bd52', 4, 1, '4', '[]', 0, '2021-12-10 03:41:49', '2021-12-10 03:41:49', '2022-12-10 09:11:49'),
('82360e163888a6df8577bac3b7cb9dd618a93304f63ddf88ddbad5d70380d9e374fb59868960a6d0', 4, 1, '4', '[]', 0, '2021-12-10 03:56:26', '2021-12-10 03:56:26', '2022-12-10 09:26:26'),
('82d1059a1d8f6971876c3c1b5481b57c2e057167949929e198167f224a37f26241b183b0be56b772', 4, 1, '4', '[]', 0, '2021-12-11 00:36:40', '2021-12-11 00:36:40', '2022-12-11 06:06:40'),
('83283d28e641a84e1dedfff206f89c6ea5e74d6f0e6fc7e87ab9c1c5863cb6c1e53f12a412acf070', 4, 1, '4', '[]', 1, '2021-12-11 07:23:27', '2021-12-11 07:23:27', '2022-12-11 12:53:27'),
('837c3a3e22422f83d1bf575b43b0160afb1f514804025a6fe67de51b14c32e77c25195f56a40de38', 4, 1, '4', '[]', 0, '2021-12-10 04:08:15', '2021-12-10 04:08:15', '2022-12-10 09:38:15'),
('841b50d547492ecec460cd677b0a00c293c6a64576bb3471ed02953d5236b27324007472464fd216', 4, 1, '4', '[]', 0, '2021-12-10 05:57:08', '2021-12-10 05:57:08', '2022-12-10 11:27:08'),
('85203cf69121d3d90e831c5263f72c123c09f83a675a4b39100ac8571b68cd82aba3f646f2ecb17b', 4, 1, '4', '[]', 0, '2021-12-10 05:53:52', '2021-12-10 05:53:52', '2022-12-10 11:23:52'),
('854896c9b2fbbcf71635809ab63eeb19c2095fa1373d9c9ba5eb53bcceac92d97819184cde994572', 4, 1, '4', '[]', 0, '2021-12-11 03:38:33', '2021-12-11 03:38:33', '2022-12-11 09:08:33'),
('8551220c70dc9199ded02b4d877278323136a0189b7021d0df3e176ae55d8ea9a56b2c6799f4ec57', 4, 1, '4', '[]', 0, '2021-12-08 07:38:20', '2021-12-08 07:38:20', '2022-12-08 13:08:20'),
('85e560425b0ddc483f794ff282483b6d719b8d0333a327543e16c53b174a9d794f8e7845a078bcad', 4, 1, '4', '[]', 0, '2021-12-10 06:56:50', '2021-12-10 06:56:50', '2022-12-10 12:26:50'),
('86f9a949e3017c1a3692e229e42bbaee44907172e5dcc7712cf2e6702dce303b9cd31740ace7d510', 4, 1, '4', '[]', 0, '2021-12-09 05:38:13', '2021-12-09 05:38:13', '2022-12-09 11:08:13'),
('87086077721eb9108a07352eeb716b6ac8639a5166d2730ca1daa53de434e7343828659cc29c9f66', 4, 1, '4', '[]', 1, '2021-12-13 01:55:57', '2021-12-13 01:55:57', '2022-12-13 07:25:57'),
('88dcf9c8c715fa43f654d830c16163d8cbb0945a4cb6f27757a5edc8190ceb94c0ea7c46e2ff51fa', 4, 1, '4', '[]', 0, '2021-12-08 06:26:26', '2021-12-08 06:26:26', '2022-12-08 11:56:26'),
('8a71142a0803663424c6e4d70c6a90c5b70bb8c919a5000565a7c27fe59721011ea877a99e79e045', 4, 1, '4', '[]', 0, '2021-12-09 07:22:03', '2021-12-09 07:22:03', '2022-12-09 12:52:03'),
('8afc8fcbfd3a7dc3561e412dad3c714a35fd86750cef5e0cdf33b46bf5da7da83987d81a1051e8ae', 4, 1, '4', '[]', 0, '2021-12-10 06:54:40', '2021-12-10 06:54:40', '2022-12-10 12:24:40'),
('8b19b16079c68605e57f3b24c1d23e852a626f0803ec772ade54ff4e9efe5b93e44a2e639e556a54', 4, 1, '4', '[]', 0, '2021-12-08 07:36:21', '2021-12-08 07:36:21', '2022-12-08 13:06:21'),
('8bca5b58d3593faa07caf02e4195c4d91af86c068dd071c3bf19e96e29490f23d26676e873ac9612', 4, 1, '4', '[]', 0, '2021-12-09 05:19:20', '2021-12-09 05:19:20', '2022-12-09 10:49:20'),
('8c649e11a37d88ce34df278fe1ba0bb65afd3f3e0bda50b2ff5ea41c907e33b0ad40ebb75b8e6564', 4, 1, '4', '[]', 0, '2021-12-09 23:04:35', '2021-12-09 23:04:35', '2022-12-10 04:34:35'),
('8d47f323b46a40fa6e421f07fef31103b74a6d757b31261f7417ccaf02730babf114d5e06dc1f257', 4, 1, '4', '[]', 0, '2021-12-09 06:54:50', '2021-12-09 06:54:50', '2022-12-09 12:24:50'),
('8d4ff53399d50c6d2a08355af056ae79c5466717556bcccd43b0d52ea61836603a203cb90c849ef1', 4, 1, '4', '[]', 0, '2021-12-10 06:56:35', '2021-12-10 06:56:35', '2022-12-10 12:26:35'),
('8db8bf688c5e58c5f8159f35db5ab682f2c4fc3f26282dd8157d6be7a1757fdd0da368a1f89889bc', 4, 1, '4', '[]', 0, '2021-12-10 06:04:11', '2021-12-10 06:04:11', '2022-12-10 11:34:11'),
('8ecec1ee3e2d797538f0867685ab7f0ee7d58e3313d4a7bdd40526ece6e9506653dff82cfc01a29a', 4, 1, '4', '[]', 1, '2021-12-13 04:59:02', '2021-12-13 04:59:02', '2022-12-13 10:29:02'),
('8f87db0ca94747afa68e16827d141b871d4fe3aa7d55ed20ddfc201162c8b3ea7d67a09d79cbaf54', 4, 1, '4', '[]', 0, '2021-12-11 03:18:35', '2021-12-11 03:18:35', '2022-12-11 08:48:35'),
('91c870204e08e09edae00c3ad2091907ff8d75e99faf8ebb127761c3517afadc7003172df5d1b29d', 4, 1, '4', '[]', 0, '2021-12-10 02:03:01', '2021-12-10 02:03:01', '2022-12-10 07:33:01'),
('9486db159b550d1715580ccfcd4797c945660ff73b2d42c7f8878e36746b2bc17a83260171e0cebf', 4, 1, '4', '[]', 0, '2021-12-10 04:20:47', '2021-12-10 04:20:47', '2022-12-10 09:50:47'),
('9487cf8527cdd978e7ad5892da73f8900499ffde0fba2e566c98c02a78c52c6ab70f80cbbd792b57', 4, 1, '4', '[]', 0, '2021-12-10 06:17:47', '2021-12-10 06:17:47', '2022-12-10 11:47:47'),
('95ec17e6f1956c6d0d3033757f01a5176ab7694e9ed4946e76820d4231bf71e2e65b7f1b0aee7ab0', 4, 1, '4', '[]', 1, '2021-12-13 01:30:23', '2021-12-13 01:30:23', '2022-12-13 07:00:23'),
('963cd28cd2f117a36ce769643a733c244966fcab89cb7a5325b95d391d936f9c6c20498bf5b2c96f', 4, 1, '4', '[]', 0, '2021-12-09 06:50:53', '2021-12-09 06:50:53', '2022-12-09 12:20:53'),
('9648a6c73685904436d51826219381ed426e482e36a2a95d1f8f249f6f5b10079d20054a3e1a87bf', 9, 1, '9', '[]', 0, '2021-12-11 03:36:25', '2021-12-11 03:36:25', '2022-12-11 09:06:25'),
('970f44d919cb42dc6195aed44d1c6666cf1d51f98e74e53b500768be525c45193e7efe5c8dd25b70', 4, 1, '4', '[]', 0, '2021-12-10 00:43:28', '2021-12-10 00:43:28', '2022-12-10 06:13:28'),
('973c231802a6a3486a5686431875db3c3c1e1c6d6abadb4d3ad489fb363abe0de666037a293a0a29', 4, 1, '4', '[]', 1, '2021-12-11 07:23:21', '2021-12-11 07:23:21', '2022-12-11 12:53:21'),
('9806a1fccd6cde9d25fad9a0fa59d2ea32d4efb6256485ae6d41915529bc92bc663c8ccb232ac009', 4, 1, '4', '[]', 0, '2021-12-10 00:31:08', '2021-12-10 00:31:08', '2022-12-10 06:01:08'),
('983f1d82741b8448854424551924fd72032d5a8e942e1174b79cd61a245c0237265a91e5f29f0146', 4, 1, '4', '[]', 0, '2021-12-10 05:43:59', '2021-12-10 05:43:59', '2022-12-10 11:13:59'),
('98740cec0c05e5bfdb663567027f3138ee9bb4b65fedc4f7ea45ddb20b4c4fed598b8100ecf5c7f7', 4, 1, '4', '[]', 0, '2021-12-09 05:52:05', '2021-12-09 05:52:05', '2022-12-09 11:22:05'),
('98ad7fee6b1820f44f60ba4d54bfe7fc2d014e04804b25417114fb7e4c339f3b97737762f69966fe', 4, 1, '4', '[]', 1, '2021-12-13 01:04:59', '2021-12-13 01:04:59', '2022-12-13 06:34:59'),
('98f83fca68b69e4d432808e3f2ffcbd1d7fba4e8176739a4f683431f6900156aaff022fbc8099d5f', 4, 1, '4', '[]', 0, '2021-12-10 00:05:29', '2021-12-10 00:05:29', '2022-12-10 05:35:29'),
('997fdbf482088a3be8ea681d1b5b42f1d25fbaf561d4ae1c7c6f6ff67452216f5c4c40e21e1f6b64', 4, 1, '4', '[]', 0, '2021-12-10 03:51:51', '2021-12-10 03:51:51', '2022-12-10 09:21:51'),
('998af30e69c3306efb06a24877383293966652364129071ee9f343d99dd2bdea77511460445a3a68', 4, 1, '4', '[]', 0, '2021-12-11 03:30:57', '2021-12-11 03:30:57', '2022-12-11 09:00:57'),
('9a883e11758fd0783504b5242629c6f9cfadd77ce943b4f62c8a45ea3dc0924d4500cc2a3c58c976', 4, 1, '4', '[]', 0, '2021-12-08 06:13:08', '2021-12-08 06:13:08', '2022-12-08 11:43:08'),
('9abaf1b47a4cf86dd5ce71f31875210aad07884c3b40979cce97c2c20c29e62a7515ffb37cee01e5', 4, 1, '4', '[]', 0, '2021-12-10 06:25:12', '2021-12-10 06:25:12', '2022-12-10 11:55:12'),
('9affc4e3bf9c9127e88f387b111c5c77dcbeefcc0f0cb48ba0fcc773304aef086196e98c1c111929', 4, 1, '4', '[]', 0, '2021-12-10 03:53:06', '2021-12-10 03:53:06', '2022-12-10 09:23:06'),
('9b36508d340f7c72c0ce772aeaf9cf281323a5ab231dc6da9361061c7f807203560ed8e1fd4776ac', 4, 1, '4', '[]', 0, '2021-12-08 06:26:15', '2021-12-08 06:26:15', '2022-12-08 11:56:15'),
('9cc2089d8abe4956aa0191017094a8423c63b2a1ac8272ff925aace72cf733d8c31daf74f9bc1b28', 4, 1, '4', '[]', 0, '2021-12-10 01:24:26', '2021-12-10 01:24:26', '2022-12-10 06:54:26'),
('9eb18bda6a7899e06c59b178d00f8d944735f86faf778a884251cce850df690dcf2319115a2fa097', 4, 1, '4', '[]', 1, '2021-12-12 23:27:04', '2021-12-12 23:27:04', '2022-12-13 04:57:04'),
('9f9a8c03b546cf491c6fd27b24c1a484a9bc71c8120109ceee20f7ad3ec295da4d00f5f90e56a478', 4, 1, '4', '[]', 0, '2021-12-10 00:09:17', '2021-12-10 00:09:17', '2022-12-10 05:39:17'),
('a00496195c8296519ad08e27b48e5b4f68cd55fd0e34f91befa7c7eb57a062bd62e7b7121c6e3439', 4, 1, '4', '[]', 0, '2021-12-10 05:00:53', '2021-12-10 05:00:53', '2022-12-10 10:30:53'),
('a11b6b6b0816b05f6a7f4b83cfb0d81069afdfeb1869f64fc1aec650b9af167095cc9dcffdf8f466', 4, 1, '4', '[]', 0, '2021-12-08 06:26:29', '2021-12-08 06:26:29', '2022-12-08 11:56:29'),
('a12794498006caf7784b56266ed620c946f6de19a00aa7940ae1f67b6040f566f983c11f0eadfb69', 4, 1, '4', '[]', 0, '2021-12-10 06:10:51', '2021-12-10 06:10:51', '2022-12-10 11:40:51'),
('a13b06a31001a3a1e5e310f894a7b20f8846dbd5d7d373129f20287ab130e0cd38caaef519c098a8', 4, 1, '4', '[]', 1, '2021-12-13 03:13:54', '2021-12-13 03:13:54', '2022-12-13 08:43:54'),
('a18e5ffb7ad7b0d11a06b5ec8009f70e6785817a3d8f027be8602a5cd3979ba53cc4f8d7334c86c3', 4, 1, '4', '[]', 0, '2021-12-09 05:18:18', '2021-12-09 05:18:18', '2022-12-09 10:48:18'),
('a1a5b2e2bcd0c47dbb3a628cbff3ba74ddff3bc60e96078148c2bcc1e811eb09adc4e59dde58d44a', 4, 1, '4', '[]', 0, '2021-12-09 23:14:28', '2021-12-09 23:14:28', '2022-12-10 04:44:28'),
('a1c3abaafdaf5cd00a4e0e4b7b4d52b2e0631bd3d9bfa73350ab1036eaf8fcc26e9d3629bef5b4c1', 4, 1, '4', '[]', 0, '2021-12-10 04:20:37', '2021-12-10 04:20:37', '2022-12-10 09:50:37'),
('a304436ecc2861f7f58265cb41a6cc329cb2f16a45a857a1bcf90be863a9f9e346aea4b36b0b2bf8', 4, 1, '4', '[]', 0, '2021-12-09 07:21:26', '2021-12-09 07:21:26', '2022-12-09 12:51:26'),
('a3146420d7b5d28a4136f8f00010d2442a81c699738f8c68e4e5eeb627fe43ef6c1437ece53e2c30', 4, 1, '4', '[]', 0, '2021-12-10 04:53:53', '2021-12-10 04:53:53', '2022-12-10 10:23:53'),
('a3d9288e0dbfe1423219cad0bde69f5834acd083de70c3c310a4ea0940019eb853e1ea8f73b2d083', 4, 1, '4', '[]', 0, '2021-12-10 04:53:39', '2021-12-10 04:53:39', '2022-12-10 10:23:39'),
('a50872e3d6bb7a6caf2fc0aacc813eba6316346f07c6c7bf7d4cb6ca5b922baba9aad890660d4df5', 4, 1, '4', '[]', 0, '2021-12-10 03:56:37', '2021-12-10 03:56:37', '2022-12-10 09:26:37'),
('a50f3ccc51df873e9e1a683e17baeaa24a8b7a859c80a5a85a53d0a0829134bba45d9b7ee6249f6d', 4, 1, '4', '[]', 0, '2021-12-10 06:19:53', '2021-12-10 06:19:53', '2022-12-10 11:49:53'),
('a575bca133a033922638df229e8591cc0697d158d4b97c9e97186246990e1f3b7227c9e270a071ad', 4, 1, '4', '[]', 0, '2021-12-08 07:38:07', '2021-12-08 07:38:07', '2022-12-08 13:08:07'),
('a5859a120d4aaec1b8074b175ed91b546f6acc39f59375e811cad609a8a8274d8face0d58196f823', 4, 1, '4', '[]', 1, '2021-12-13 00:54:14', '2021-12-13 00:54:14', '2022-12-13 06:24:14'),
('a63ab8fca29aa5cd70fb5bd43adfb59ff058a4206a57918c180a5d17362e53c4face2e0d447928bf', 4, 1, '4', '[]', 1, '2021-12-11 07:23:24', '2021-12-11 07:23:24', '2022-12-11 12:53:24'),
('a68d8fbbbb2f05471cd3fc6c90c0ceec41f56867eb45c90560ede631e2dbe9fd43bb954d76fac314', 4, 1, '4', '[]', 0, '2021-12-10 06:10:24', '2021-12-10 06:10:24', '2022-12-10 11:40:24'),
('a6b4c15d519798810888267c77cf3598f6bb12f5e62d3996acdada79e5d3c44006500ea3f243d5b6', 4, 1, '4', '[]', 0, '2021-12-09 07:34:31', '2021-12-09 07:34:31', '2022-12-09 13:04:31'),
('a6e50aa9d542d6a6d68fe1cbd27f8d0b733845bcdc946997c3da94a7d49e5eb05a14e0c2f30cfacb', 4, 1, '4', '[]', 0, '2021-12-10 06:04:33', '2021-12-10 06:04:33', '2022-12-10 11:34:33'),
('a829beced344b6283e41b2824315951978d9d00d4d7e59cc0959e1fd6515af9a0a277f07f514b6bc', 4, 1, '4', '[]', 0, '2021-12-11 03:29:08', '2021-12-11 03:29:08', '2022-12-11 08:59:08'),
('a926afcd39400fd23be0ec94d2b6f31e403d2fe4ed2826017a2d93fe435ef49cd1844ca051b3aeda', 4, 1, '4', '[]', 0, '2021-12-08 08:02:18', '2021-12-08 08:02:18', '2022-12-08 13:32:18'),
('a9c4738e740d7aed3e87d4abd147e0688620dd087eb085318a5703136873735f4c97af7f096a4297', 4, 1, '4', '[]', 0, '2021-12-11 03:34:14', '2021-12-11 03:34:14', '2022-12-11 09:04:14'),
('ab2b49f39e1f0e68e1480b97eb8ab7a687fc8ed1873886498dbd2a99bde7a6659c0acd7edad7d10f', 4, 1, '4', '[]', 0, '2021-12-10 06:34:36', '2021-12-10 06:34:36', '2022-12-10 12:04:36'),
('ad061f7c91c81b9f832112af2e31047d6c2dfcc8f7eb4656cb0dd104ef04f644daf997b3bd94e132', 4, 1, '4', '[]', 0, '2021-12-10 06:02:26', '2021-12-10 06:02:26', '2022-12-10 11:32:26'),
('ae25e146974a3a27a8804af8b511ff5674b80dcb476aea0ffe2f9ffd211a45558afba09d6fdd0ffa', 4, 1, '4', '[]', 0, '2021-12-10 04:56:52', '2021-12-10 04:56:52', '2022-12-10 10:26:52'),
('ae705848e00f368c52b0b6cd5fb80d0aba02374a00cb194d646b3356d5144bac8615881ba8491c05', 4, 1, '4', '[]', 0, '2021-12-10 06:11:18', '2021-12-10 06:11:18', '2022-12-10 11:41:18'),
('ae8caca313428e8627046d25647fe2e0aff4c3161e8de20b4d313157a09f96d113c912d7c30d88c7', 4, 1, '4', '[]', 1, '2021-12-13 06:05:11', '2021-12-13 06:05:11', '2022-12-13 11:35:11'),
('b104f4c6cf1981d5cbe3f9703823c9e2ddf0861f6b190d2e2339a431b065ac3ebe1757847c1e576a', 4, 1, '4', '[]', 0, '2021-12-10 04:56:59', '2021-12-10 04:56:59', '2022-12-10 10:26:59'),
('b19e19645bc0037c374e2b6166f309ede2802524e81b573a96cc785061aad59e9173f05833159217', 4, 1, '4', '[]', 0, '2021-12-09 07:21:58', '2021-12-09 07:21:58', '2022-12-09 12:51:58'),
('b1fd62902f1594de622ab74117ee5d242c84957ff339081b4813e9b8ad42fad1743fd1d1ed1d80e8', 4, 1, '4', '[]', 0, '2021-12-11 06:42:09', '2021-12-11 06:42:09', '2022-12-11 12:12:09'),
('b1fdbb9bc112a4ecc467032f408f3d4d78f2ded9352f8f6b76ff6756e78edac26ba6281cf12ce9c1', 4, 1, '4', '[]', 1, '2021-12-13 05:25:38', '2021-12-13 05:25:38', '2022-12-13 10:55:38'),
('b268577c2b8dc21c6e81d6f0651e5a38c787097548fcc94d27ebb160fd9a239be70747210a4f9001', 4, 1, '4', '[]', 0, '2021-12-10 05:59:12', '2021-12-10 05:59:12', '2022-12-10 11:29:12'),
('b2866c5c2e95030ec9daac8311d4fa0368c27bbea43fc72785c23b6f247689500871c4e4b6761dae', 4, 1, '4', '[]', 1, '2021-12-13 03:11:40', '2021-12-13 03:11:40', '2022-12-13 08:41:40'),
('b2aaa8cad0ee0b5a13d2c5be2026f696b12fb5e59cafaaacff65f0847d29aa5aa287d9940f59b4be', 4, 1, '4', '[]', 0, '2021-12-10 04:55:33', '2021-12-10 04:55:33', '2022-12-10 10:25:33'),
('b32a551a38ab4dac010a41a22876a0324764bf27436be41484347b0cd2f0d8f628112d0e26dca2a1', 4, 1, '4', '[]', 0, '2021-12-10 05:06:35', '2021-12-10 05:06:35', '2022-12-10 10:36:35'),
('b3966e8c38d3699a73e6146fa8faeb99a99993fcc3c61e28237bc1bccd3f008e313618a1669bc35e', 4, 1, '4', '[]', 0, '2021-12-08 06:26:23', '2021-12-08 06:26:23', '2022-12-08 11:56:23'),
('b5971b2b6a979f19219cd7b859843d694f3b453e1339161abe3645ac4a933509f6274f18756abb5f', 4, 1, '4', '[]', 0, '2021-12-10 04:46:50', '2021-12-10 04:46:50', '2022-12-10 10:16:50');
INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('b5b294dcf9e3fa127879c79823b5e2da1439c0ebe0c4a4ed6a7f39d76af391673e59dcca75222a06', 4, 1, '4', '[]', 0, '2021-12-10 06:12:35', '2021-12-10 06:12:35', '2022-12-10 11:42:35'),
('b6cff4e4772ba727d7ecb4d0015273f69ebb8d7a524c98bcf01d6519d3bc07af8bdf81ece4d8249f', 4, 1, '4', '[]', 0, '2021-12-08 06:36:56', '2021-12-08 06:36:56', '2022-12-08 12:06:56'),
('b78bf02bfae24570f0f45e54a6638a2a5226e0e48ecbe4f85526402653e1686adbc40529034dadff', 4, 1, '4', '[]', 0, '2021-12-10 01:16:14', '2021-12-10 01:16:14', '2022-12-10 06:46:14'),
('b80a7c547f7ec70923dc92cb9a41c1e6a7e9f7d09e55ed679367b8d31ec8693d71efe9f8cef72642', 4, 1, '4', '[]', 0, '2021-12-11 03:38:49', '2021-12-11 03:38:49', '2022-12-11 09:08:49'),
('b81469085530840f531b92aeabc872a58e8e2e04c5491c8df8641c75c98812d98e3c0cd2c335a462', 4, 1, '4', '[]', 0, '2021-12-10 05:34:20', '2021-12-10 05:34:20', '2022-12-10 11:04:20'),
('b890b734d8af944ebd93686b20d8a74e5d9c1a370d5e45ce082259a6aa1fd6cb19cbe4f97a3c8739', 4, 1, '4', '[]', 0, '2021-12-10 06:13:33', '2021-12-10 06:13:33', '2022-12-10 11:43:33'),
('b8f689d34c4a5d222b46e2d445f9d74afa12b913e2575826ce97493cbf3f741df65c188815fcfc1f', 4, 1, '4', '[]', 0, '2021-12-10 05:59:20', '2021-12-10 05:59:20', '2022-12-10 11:29:20'),
('b92200f082b4baf5ffd96e7dc760980c173ad977f153e90ebd9877ceb20b3c6314f89db72ffa639b', 4, 1, '4', '[]', 0, '2021-12-09 06:51:37', '2021-12-09 06:51:37', '2022-12-09 12:21:37'),
('b9a732153187c23bfac97702e824d3e8c011dddb00bd99ecb0cdcddf6cdb167944a72b0b5020c367', 4, 1, '4', '[]', 0, '2021-12-11 03:33:33', '2021-12-11 03:33:33', '2022-12-11 09:03:33'),
('bcbbfd66cc1d877898eabb70430772c8e38405231b8f654e8029d7cdb6c01221fbe8ad7687414bf9', 4, 1, '4', '[]', 1, '2021-12-13 01:22:03', '2021-12-13 01:22:03', '2022-12-13 06:52:03'),
('bd6ab9466822a0e9b15207903271b8a555a1da4f2f0ceb9eb649846ef5a0d9e783d817b28aba3741', 4, 1, '4', '[]', 0, '2021-12-10 06:12:31', '2021-12-10 06:12:31', '2022-12-10 11:42:31'),
('bda72dd597ff90c534f1de3ed4a07e19ec30a274ed82598a8996aab39160cd74e9fd068c408c7b83', 4, 1, '4', '[]', 0, '2021-12-11 06:14:41', '2021-12-11 06:14:41', '2022-12-11 11:44:41'),
('be6736aa6b84c3f769cfcc67c2269dfc782447b660e46f795ac4775f6d47af8d8a7760ac6c266c58', 4, 1, '4', '[]', 0, '2021-12-08 07:38:11', '2021-12-08 07:38:11', '2022-12-08 13:08:11'),
('bf5a3cf736c54a50678d39b4fd9c79acc403de894d1fe665f0b39e4b18dc24802f7ed9484ea6037a', 4, 1, '4', '[]', 0, '2021-12-08 06:38:17', '2021-12-08 06:38:17', '2022-12-08 12:08:17'),
('c13246dece5aa1308435e3e0aec9d7fc7c8c327537d828e0132e4db0b4e0afa698ce86dd57cd2e30', 4, 1, '4', '[]', 1, '2021-12-13 00:54:42', '2021-12-13 00:54:42', '2022-12-13 06:24:42'),
('c2646d9dac3e84dbcd92ae2fbf361fe0162864ea45fd7012d4db70b703b78a1a27f30b07fdfbd767', 4, 1, '4', '[]', 1, '2021-12-11 07:20:17', '2021-12-11 07:20:17', '2022-12-11 12:50:17'),
('c2b634ed873c48b608ae1edacd4c73012bf7e4e556a4d2b05054dd7b12cb695ad6093ac702ae5f5f', 4, 1, '4', '[]', 0, '2021-12-11 06:57:11', '2021-12-11 06:57:11', '2022-12-11 12:27:11'),
('c2c396d4ae98ff63928bfc50e6268d5722e391e0dfcdfbcc9c975951668b2c47d45c55fe93e4f078', 4, 1, '4', '[]', 1, '2021-12-11 05:04:26', '2021-12-11 05:04:26', '2022-12-11 10:34:26'),
('c3bbafbe2133cd36d8e7f851fde4c389df4e8645de25c52bdb4814dce7da7e6be2ba653fba8f1e7e', 4, 1, '4', '[]', 0, '2021-12-10 02:02:44', '2021-12-10 02:02:44', '2022-12-10 07:32:44'),
('c3caf704ba5fbfad2d8c46a4f0a3a0922f913b048b3f087fd31629c4c1cb1243b013d6409dce6ffa', 4, 1, '4', '[]', 0, '2021-12-10 02:02:52', '2021-12-10 02:02:52', '2022-12-10 07:32:52'),
('c46186c68d0b12c3b43a8f8a4edd66942d6977ab2a6ead0443424c93f0215f4096b2aaeb7b77755c', 4, 1, '4', '[]', 1, '2021-12-11 07:32:50', '2021-12-11 07:32:50', '2022-12-11 13:02:50'),
('c4a455ba201a25ef199d3f18471fb75aaff818fa3fc9961b075dcaa47d37e03f86bcfbe7e1d41ce0', 4, 1, '4', '[]', 0, '2021-12-13 06:08:24', '2021-12-13 06:08:24', '2022-12-13 11:38:24'),
('c85e106f2f0bd92204915f1a63c13c7f2f9739dac80f070d7177be1cbcd24c48de4a55f5622c5fd6', 4, 1, '4', '[]', 0, '2021-12-10 07:08:47', '2021-12-10 07:08:47', '2022-12-10 12:38:47'),
('c93507f2ace96e66ee51a0a8cddfdb897288f82adb756eedd5d3dc4a9619dd448e16109a747f2868', 4, 1, '4', '[]', 0, '2021-12-10 00:42:59', '2021-12-10 00:42:59', '2022-12-10 06:12:59'),
('c961209eec468c940a17521f2c798162da4e1232cbc3dac46824d77d33b3205630f19581d6214946', 4, 1, '4', '[]', 1, '2021-12-13 03:14:02', '2021-12-13 03:14:02', '2022-12-13 08:44:02'),
('c9829c0c05fe7854b7595a24c7a748e21abc4790bbc98d8b4e17c8e9f311bb7227b3c5e9d082387d', 4, 1, '4', '[]', 0, '2021-12-10 00:57:19', '2021-12-10 00:57:19', '2022-12-10 06:27:19'),
('c98de399c59b6c7d1078c32dadf850f2381a6109caa21edebf7563e51c2e52f6439c0bf4b94e6c69', 4, 1, '4', '[]', 0, '2021-12-13 06:01:25', '2021-12-13 06:01:25', '2022-12-13 11:31:25'),
('c9dee1d502d69ee064c58c959b87e1b3c6ec77aef9da41fface3d3711d0230e78841755382bee51d', 4, 1, '4', '[]', 0, '2021-12-10 02:03:08', '2021-12-10 02:03:08', '2022-12-10 07:33:08'),
('ca8e6e2d2af58714c6bdc67b6bcfb43d1b298166d8d1a26fc83b740db51b60345b512de9dfce8e02', 4, 1, '4', '[]', 0, '2021-12-09 06:37:21', '2021-12-09 06:37:21', '2022-12-09 12:07:21'),
('cad8a758738342c358631b93c3a95839cc4947c670216a31a145c2707fdda69b572522ea380407a0', 4, 1, '4', '[]', 0, '2021-12-10 05:06:05', '2021-12-10 05:06:05', '2022-12-10 10:36:05'),
('cb6796713b9cbe8490aa3a7d2592e6876f259ac27db4db4d3364330d01421829c3e7a1ffb916b99e', 4, 1, '4', '[]', 0, '2021-12-11 03:30:49', '2021-12-11 03:30:49', '2022-12-11 09:00:49'),
('cc23f464238a6e0162322858ebc14bf96abea82a98b741d459ecc05e7662dd3073dad3435c373531', 4, 1, '4', '[]', 0, '2021-12-08 07:37:57', '2021-12-08 07:37:57', '2022-12-08 13:07:57'),
('cd15d570982353ea77277bb554bd94d978ef2481494b92a47ac733cb269722982ce7b28322f1b49d', 4, 1, '4', '[]', 0, '2021-12-09 23:06:19', '2021-12-09 23:06:19', '2022-12-10 04:36:19'),
('cea97a194716ca41065250d2d1371aead38507cd8fb29551eb308543e2eac3814f099de3fef50e76', 4, 1, '4', '[]', 0, '2021-12-09 06:53:38', '2021-12-09 06:53:38', '2022-12-09 12:23:38'),
('cfe66a71f6c6d94c187d14c3a396b6bd2dcad2a74d8d7e5baf04e7cf7259235074fbd9b8ae224634', 4, 1, '4', '[]', 1, '2021-12-11 07:32:08', '2021-12-11 07:32:08', '2022-12-11 13:02:08'),
('d04c88ffb272af4098de86675ea01bb458d83bcec1ccd4bfc35416caadce99d9fb0a1175b52fbd86', 4, 1, '4', '[]', 1, '2021-12-11 07:00:35', '2021-12-11 07:00:35', '2022-12-11 12:30:35'),
('d0eb4d3416186fe75de90f612b8ec167b4ac01b05914950c97e2b0b0a150391960a0382aab450425', 4, 1, '4', '[]', 1, '2021-12-13 00:17:44', '2021-12-13 00:17:44', '2022-12-13 05:47:44'),
('d125d5ab153a47581e8a933fb0c1f975aa4fc6f52c0f62153368738f2acd3a29bb3197afc0550fe5', 9, 1, '9', '[]', 0, '2021-12-13 05:47:15', '2021-12-13 05:47:15', '2022-12-13 11:17:15'),
('d15382c7533f5fe224e5adb9142cca640389a2b6725a87b78ae800eddd0be24c4924d7b8ef2f6eb4', 4, 1, '4', '[]', 0, '2021-12-10 07:09:52', '2021-12-10 07:09:52', '2022-12-10 12:39:52'),
('d17bf0378c9b1294c0dc9fbf2edd6a5ffeedc4007a54061d036c630e45e0335787f6fa240a6429b8', 4, 1, '4', '[]', 0, '2021-12-09 23:04:52', '2021-12-09 23:04:52', '2022-12-10 04:34:52'),
('d1e8f1e1782661286645178415eb3abd2a7648ebffb28bd7511833c3dbe05d9192ee6b27ca8f9988', 4, 1, '4', '[]', 1, '2021-12-13 03:10:59', '2021-12-13 03:10:59', '2022-12-13 08:40:59'),
('d1ee40e9905b21e15d424c6192c5dec8e3a4ecb4a8eb759e6924b1ac5aea86e4a21045b25fbe4143', 4, 1, '4', '[]', 0, '2021-12-11 04:47:59', '2021-12-11 04:47:59', '2022-12-11 10:17:59'),
('d20b46a573a0ec6a13919249b13f50dfc0edd539dab5255b4876e1769b60f6398bfe88fec7fe98b9', 9, 1, '9', '[]', 0, '2021-12-03 11:15:45', '2021-12-03 11:15:45', '2022-12-03 16:45:45'),
('d2f85719e5c364a1b27f9cca58951d3d4e48e8a05529adb924f55c97e4e9c8df12c9120e39e2f027', 4, 1, '4', '[]', 1, '2021-12-13 04:00:39', '2021-12-13 04:00:39', '2022-12-13 09:30:39'),
('d3e6c1c3076a23bc5408f485b73a5dd45373c7099fb6182dcaf187dfbc8622a8e8aa5354e7e07ca9', 4, 1, '4', '[]', 0, '2021-12-10 06:52:11', '2021-12-10 06:52:11', '2022-12-10 12:22:11'),
('d4523ea21b9e4cd2b97809a445978e48a88905f3c5ac3b6ed83f7207a892a3629fac9852a4c5e503', 4, 1, '4', '[]', 1, '2021-12-12 23:58:13', '2021-12-12 23:58:13', '2022-12-13 05:28:13'),
('d46a43853ae505dafb1cf8a571682c18742ac7a2d04740bceea8c887bc11cd57587d1808d4cfbdec', 4, 1, '4', '[]', 1, '2021-12-13 04:55:40', '2021-12-13 04:55:40', '2022-12-13 10:25:40'),
('d53a54a6fe2b2d8bd4b53016ff9b6aca01e8e6a3e9c62eece630e78554af3fa8ff4ad16bb4d69fb6', 4, 1, '4', '[]', 0, '2021-12-09 07:18:24', '2021-12-09 07:18:24', '2022-12-09 12:48:24'),
('d55debdd0588f691e2068d724e06b908acf4acb4aa7b190a30b9a400c4a62cef43152674e3751e4b', 4, 1, '4', '[]', 0, '2021-12-09 06:51:19', '2021-12-09 06:51:19', '2022-12-09 12:21:19'),
('d56aba6c99f050a03b02b6ea6acb8ef70ca84194dcf2ff5648aa81a6e2ec786658b83b09fcd2c279', 4, 1, '4', '[]', 0, '2021-12-10 05:54:34', '2021-12-10 05:54:34', '2022-12-10 11:24:34'),
('d58e3c9d7202dbb75326c7ff6809a36e1fe7767378e7d6885a798b2b7209f337ae6dc3f91d413602', 4, 1, '4', '[]', 1, '2021-12-13 01:02:44', '2021-12-13 01:02:44', '2022-12-13 06:32:44'),
('d5cb5e4657d93fa14578580ef6ccdb52f4f8096a90bea74a0f70f6c68b73540ebc215d66649e8531', 4, 1, '4', '[]', 0, '2021-12-10 06:45:25', '2021-12-10 06:45:25', '2022-12-10 12:15:25'),
('d6b87e7adc8c14841f78b5bf3e97f9b9a27f17643af445a6d7f64a5d0b2243a531c1760b4d1b93b0', 4, 1, '4', '[]', 0, '2021-12-11 03:56:21', '2021-12-11 03:56:21', '2022-12-11 09:26:21'),
('d6e14873d1f3d1fdd5afc7576fd27a09c59510d6fa1a716604e221266c164be1614c209dcc00ac91', 4, 1, '4', '[]', 0, '2021-12-10 05:08:40', '2021-12-10 05:08:40', '2022-12-10 10:38:40'),
('d7ace582d5ad30082a9fc7b541a6cb20180f37f9bd2f0f37902366664ef5cafc6d9102f719426c30', 4, 1, '4', '[]', 0, '2021-12-10 00:44:15', '2021-12-10 00:44:15', '2022-12-10 06:14:15'),
('d7ade9773dea86aa2dacda5a4a48c05e9319e3a64aab63b226307ef77b11c6fabbee69f004ad184d', 4, 1, '4', '[]', 0, '2021-12-09 06:51:04', '2021-12-09 06:51:04', '2022-12-09 12:21:04'),
('d804837f4edd041839342e8393b0bd62c9b89137746756fd80a6c5f39ad2a05ca7de886f3f0eabff', 4, 1, '4', '[]', 0, '2021-12-09 07:21:38', '2021-12-09 07:21:38', '2022-12-09 12:51:38'),
('d981bf43bd17add477779662e018db19b9c6bf374170942c989bcff2ff5d279f4f58e9f7b7931823', 4, 1, '4', '[]', 1, '2021-12-11 07:23:19', '2021-12-11 07:23:19', '2022-12-11 12:53:19'),
('d9d4a08198a395a23d0a603e2a9fa89923c12fb8e64dec5c7d160ef9c9592efe7f3ffc657dacd396', 4, 1, '4', '[]', 0, '2021-12-09 06:54:35', '2021-12-09 06:54:35', '2022-12-09 12:24:35'),
('da22f324a41bfe9647b03a0a9418bd189675a3b885c6dd525aa46d9ea7bfc29adfa9f8ee4c570bec', 4, 1, '4', '[]', 1, '2021-12-13 03:09:26', '2021-12-13 03:09:26', '2022-12-13 08:39:26'),
('db5d5f9d44c21f027e28c2ed26a913121f9b6f0e232f3817196197f20281d53c45856f3e62472292', 4, 1, '4', '[]', 0, '2021-12-10 04:10:19', '2021-12-10 04:10:19', '2022-12-10 09:40:19'),
('db7c458174d190aeabd10b09afee8f36ac5cddaa047cf6dfc6277dc6e6f7069a426324fa4bb58ef8', 4, 1, '4', '[]', 1, '2021-12-13 05:24:00', '2021-12-13 05:24:00', '2022-12-13 10:54:00'),
('dd7f1326a4fb1ce7cdb8f3e368dc5178d867f1aed69f5a527e529dff7cff2cac75a46f3580be018e', 4, 1, '4', '[]', 0, '2021-12-11 06:56:49', '2021-12-11 06:56:49', '2022-12-11 12:26:49'),
('dd96c615d54a19a0c21317829a0cde5206d6acb592e39f06c2f72cea21bf23a1413175ca9c6c4875', 4, 1, '4', '[]', 0, '2021-12-08 08:02:03', '2021-12-08 08:02:03', '2022-12-08 13:32:03'),
('de0d1ca8360e4e3faaab77f8a74d981178cad4410ca9c967e87b424badabefb9f822990b6de65f5d', 4, 1, '4', '[]', 0, '2021-12-10 06:03:59', '2021-12-10 06:03:59', '2022-12-10 11:33:59'),
('de7718f8c0f27bc6e1e7b817ead94eee616294faf6709e3d312ce2537568845ceea2a49311237a99', 4, 1, '4', '[]', 1, '2021-12-13 00:53:26', '2021-12-13 00:53:26', '2022-12-13 06:23:26'),
('dfc501f34f7ee09bc0e03ca271e7aed6e9272a9f36648b62848e0fd443d346f6a0f2ea97c9722240', 4, 1, '4', '[]', 0, '2021-12-10 04:53:45', '2021-12-10 04:53:45', '2022-12-10 10:23:45'),
('dff84045d6b7e9205b3f8abbc914f1a60c36a490495fc4381a10c8bfee9f4c2b50061333c6c75493', 4, 1, '4', '[]', 0, '2021-12-09 23:33:24', '2021-12-09 23:33:24', '2022-12-10 05:03:24'),
('e01ef6ca2a578ca6cde508faaae69a5daeb17745f3066f12df6a483d32d7af17049971be05b47acc', 4, 1, '4', '[]', 0, '2021-12-10 05:53:37', '2021-12-10 05:53:37', '2022-12-10 11:23:37'),
('e06e0c5a3715a4213c1e50390c96ab5592ebcd0dae6330d3a03045c3cdf014dd5fb08cce60f7cb90', 4, 1, '4', '[]', 0, '2021-12-08 08:02:07', '2021-12-08 08:02:07', '2022-12-08 13:32:07'),
('e1ddaab5e2f9571fe6d5cdce8289535fb30dc433754448f951f4659ca1123c38b21dcdd324838f0c', 4, 1, '4', '[]', 0, '2021-12-08 05:56:16', '2021-12-08 05:56:16', '2022-12-08 11:26:16'),
('e30ca150e59d481151430875fb7ab6e14f679ae79a53ddb50297fba1d980356cecbbdcbb360325cc', 4, 1, '4', '[]', 0, '2021-12-10 04:48:07', '2021-12-10 04:48:07', '2022-12-10 10:18:07'),
('e50424eb2c6a8ed5da70d144337f5cf4c027975c7447e6ba4bcd838a63b0e34473836400fce305ee', 4, 1, '4', '[]', 0, '2021-12-11 03:28:45', '2021-12-11 03:28:45', '2022-12-11 08:58:45'),
('e5092edfe44ab6500ab38c19ed75eb327192fb5a412ece73d0e5ce2b207782ba32060384e3fed3d2', 4, 1, '4', '[]', 0, '2021-12-09 07:27:19', '2021-12-09 07:27:19', '2022-12-09 12:57:19'),
('e531526bbfb946e06b732aee70eb0f4258fae3da02a3d48215897e48a1cf39839f69f4ae8698132b', 4, 1, '4', '[]', 1, '2021-12-13 00:07:57', '2021-12-13 00:07:57', '2022-12-13 05:37:57'),
('e53daa8fc30d93533a2d5fb9fa65973d21393f7ec0d92379aa659540b02b9f45471ea1ab379f9eac', 4, 1, '4', '[]', 0, '2021-12-10 01:08:46', '2021-12-10 01:08:46', '2022-12-10 06:38:46'),
('e6324aac73b627542331709381da64b1c27e4c011ca84cfe6879bb80f3e7ffb49469a59b17232224', 4, 1, '4', '[]', 0, '2021-12-13 05:56:36', '2021-12-13 05:56:36', '2022-12-13 11:26:36'),
('e665bee8c55957674478f09bd2062be55ffc71ccba2e5d47708acc9d986c1c3e15a3154afbb467f2', 4, 1, '4', '[]', 0, '2021-12-10 00:37:50', '2021-12-10 00:37:50', '2022-12-10 06:07:50'),
('e8daae4b050745659ad37d756cd3c58c1295a42fe0a9ea119afb48ae4e667a7a343e00daace5e7a9', 4, 1, '4', '[]', 0, '2021-12-10 06:32:01', '2021-12-10 06:32:01', '2022-12-10 12:02:01'),
('e8eae1304ffad444690440933d5100ddb73fa5c5df0855d1d49cc74723de0aaa4cdb3586de373cb4', 4, 1, '4', '[]', 0, '2021-12-09 23:26:23', '2021-12-09 23:26:23', '2022-12-10 04:56:23'),
('e93db481e1d8034b85a64e60343ae0b8793515ec64d3a23970afcec434cc20a6529cfc1775f7559f', 4, 1, '4', '[]', 0, '2021-12-11 03:29:38', '2021-12-11 03:29:38', '2022-12-11 08:59:38'),
('ea72d36dc3de7bee6c248c298a9100fc101574bef361b7cf6e32c5dfa8b59ff157f4e35a90a11b57', 4, 1, '4', '[]', 0, '2021-12-10 06:13:18', '2021-12-10 06:13:18', '2022-12-10 11:43:18'),
('eb99a52570069a40c20373166e4b6981275965792d897708d21dd425142853177a831e58eafece1b', 4, 1, '4', '[]', 0, '2021-12-11 06:57:37', '2021-12-11 06:57:37', '2022-12-11 12:27:37'),
('ebad25d3aaff30720c315e36e16a05d920b09eb4a8d698d49c68c64b20e98092be58d98dae98afa2', 4, 1, '4', '[]', 0, '2021-12-09 06:52:07', '2021-12-09 06:52:07', '2022-12-09 12:22:07'),
('ec744b955eb9c1fb2ececffed5bb2ea798f9d74a0e98c02a22da179dcb3985f6811b3a0e26ca0923', 4, 1, '4', '[]', 0, '2021-12-10 00:52:07', '2021-12-10 00:52:07', '2022-12-10 06:22:07'),
('ec786dafbf7c7cf6186e45e87ec0d138bf12aa8dea1fbacfd961d076265e7f4aed751906f763f27a', 4, 1, '4', '[]', 0, '2021-12-09 06:50:28', '2021-12-09 06:50:28', '2022-12-09 12:20:28'),
('ecd68e5458d1dafd07f25bcc5c41bde9b7891b7687aac3c6ec634d44b56fcef085e3a11a2a5e3132', 4, 1, '4', '[]', 0, '2021-12-11 06:55:42', '2021-12-11 06:55:42', '2022-12-11 12:25:42'),
('edf60869c5a54aad36cd03b9cd9a47cb2ad5828f91bae06c4900e966440a4294bad79e4120600791', 4, 1, '4', '[]', 0, '2021-12-08 07:14:01', '2021-12-08 07:14:01', '2022-12-08 12:44:01'),
('ef39212747cc4964e5d613f8094af2dbed56f987e7ca8ee3b3d8afd3dbc72056ba64aa30b9b37856', 4, 1, '4', '[]', 0, '2021-12-11 06:43:02', '2021-12-11 06:43:02', '2022-12-11 12:13:02'),
('efa6aee3a3681b1bab5aca1a666aa3284dad369f201c78d3350f1320e9241f15af99415ab5fdb41f', 4, 1, '4', '[]', 0, '2021-12-08 06:05:30', '2021-12-08 06:05:30', '2022-12-08 11:35:30'),
('eff151a8f2f5442464a984cd1974989ce37261d56e766eec673b0eee255f557bd12958f2466a1994', 4, 1, '4', '[]', 0, '2021-12-09 05:52:06', '2021-12-09 05:52:06', '2022-12-09 11:22:06'),
('f2b4f1f12a36fad25d78e79492bfb9bfa120c212869980d4dca7a67ff96b2691b4b6813ef5fa0844', 4, 1, '4', '[]', 0, '2021-12-10 06:57:22', '2021-12-10 06:57:22', '2022-12-10 12:27:22'),
('f2c23923a200a727b5c9931c84549d57d4e5223a8735c4174b2c05482f6016fbbd4b280caf5632ee', 4, 1, '4', '[]', 0, '2021-12-10 05:44:59', '2021-12-10 05:44:59', '2022-12-10 11:14:59'),
('f3c1a2e2d0f56c63856eb413c478e5563ef1489ebffbc66d06191a09a19b725189e8823d2a535274', 4, 1, '4', '[]', 0, '2021-12-10 01:51:11', '2021-12-10 01:51:11', '2022-12-10 07:21:11'),
('f3efb14a905eef5acda342b916b08007c0490216530486f5603dbb15e1c1f07d1af9f3114c5fce69', 4, 1, '4', '[]', 0, '2021-12-09 06:57:37', '2021-12-09 06:57:37', '2022-12-09 12:27:37'),
('f588885f0f888c134f19bd237ac7d9f7d47d65b69be117eb2fcb2458cb866c0e8b4029816ceeac8b', 4, 1, '4', '[]', 0, '2021-12-10 03:56:17', '2021-12-10 03:56:17', '2022-12-10 09:26:17'),
('f6691145ee5ad9d440cec2e211182fd456fd8005c6a1ba2578dcf34d501f3924695cbe6cef27e8eb', 4, 1, '4', '[]', 0, '2021-12-10 04:58:48', '2021-12-10 04:58:48', '2022-12-10 10:28:48'),
('f803e05fe8924ec51135bafe6682cb46379109c6c2c4dc06a71d1ec2495e7d44de9cb25fdb1cb389', 4, 1, '4', '[]', 1, '2021-12-12 23:26:52', '2021-12-12 23:26:52', '2022-12-13 04:56:52'),
('f9d3f31c84c45adaa97f6675a13e4763bb0ae0620ab5d741935fe10c47c7dc1dbba74ab636a56bf2', 4, 1, '4', '[]', 1, '2021-12-13 00:06:18', '2021-12-13 00:06:18', '2022-12-13 05:36:18'),
('fb1f623486215d90566aeca10ed0247ddc873fbf3c8ebdf1dbf3a9c086f5b3d81062d7e038a9cb94', 4, 1, '4', '[]', 1, '2021-12-13 01:53:08', '2021-12-13 01:53:08', '2022-12-13 07:23:08'),
('fb9cdeb47af9f1b4c496f224e03d3626ccea3719ea37126a2f866e3bfb17e8cbbd135a3b672b7a46', 4, 1, '4', '[]', 0, '2021-12-09 23:41:22', '2021-12-09 23:41:22', '2022-12-10 05:11:22'),
('fd6bd2356d2026d2a36d8201fc30db6160a45186989862963fc0808168bc6576d77102c1fe2fac08', 4, 1, '4', '[]', 0, '2021-12-10 05:47:43', '2021-12-10 05:47:43', '2022-12-10 11:17:43'),
('fd83f643ed79e820b810cf681ea3925ebce9c20810416b7aac7eb8b32118af11289c5994ef135ea4', 4, 1, '4', '[]', 1, '2021-12-13 00:31:53', '2021-12-13 00:31:53', '2022-12-13 06:01:53'),
('fd8ce3238522dc9356fda8bfaa81588085d15b91430f1e737e4bbe3d1a898e5fe7c6e7ff2ce5a482', 4, 1, '4', '[]', 0, '2021-12-10 07:03:42', '2021-12-10 07:03:42', '2022-12-10 12:33:42'),
('fdd490cc2893fc63b4a9cee03cd759a90e89b4404ffe8c7e7cc157ea3c939a14cc783c2c66ca96b7', 4, 1, '4', '[]', 0, '2021-12-11 01:39:19', '2021-12-11 01:39:19', '2022-12-11 07:09:19'),
('fe7ee431b00306cbe781bb446e5b574aefff58d4a9bb9a9d0b8e8d4e872c77c14187a08e28d62fc5', 4, 1, '4', '[]', 0, '2021-12-08 07:36:17', '2021-12-08 07:36:17', '2022-12-08 13:06:17'),
('ff12f3dea597dd9bfc533633df8e46dcdf0cf2a1446849193fc92beba720c8c90dac4dc144f4d8a2', 4, 1, '4', '[]', 0, '2021-12-11 06:57:41', '2021-12-11 06:57:41', '2022-12-11 12:27:41'),
('ff688f87456cf556bd77d1dbc6b3f900ccc75378cc695e8df5034086cedf540acb7fc618743a7d19', 4, 1, '4', '[]', 0, '2021-12-10 04:54:27', '2021-12-10 04:54:27', '2022-12-10 10:24:27');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Salon Personal Access Client', 'Bm1I4u1mMho0lCkLwMur4WCViUSwEDs9Id43p1KM', NULL, 'http://localhost', 1, 0, 0, '2021-11-22 04:41:30', '2021-11-22 04:41:30'),
(2, NULL, 'Salon Password Grant Client', 'G9pozEP6Kcv6MZFLo7ofYgtYz16TyiY5hCOplmk4', 'users', 'http://localhost', 0, 1, 0, '2021-11-22 04:41:30', '2021-11-22 04:41:30');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-11-22 04:41:30', '2021-11-22 04:41:30');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Module',
  `panel` enum('Backend','Frontend','App','Common') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Backend',
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `controller` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `module_id`, `panel`, `title`, `name`, `controller`, `action`) VALUES
(1, 3, 'Backend', 'List', 'list', 'modules', 'index'),
(2, 3, 'Backend', 'Create', 'create', 'modules', 'create'),
(3, 3, 'Backend', 'Update', 'update', 'modules', 'update'),
(4, 3, 'Backend', 'View', 'view', 'modules', 'view'),
(5, 3, 'Backend', 'Delete', 'delete', 'modules', 'delete'),
(6, 3, 'Backend', 'Is active', 'isactive', 'modules', 'isactive'),
(7, 3, 'Backend', 'Export', 'export', 'modules', 'export'),
(8, 4, 'Backend', 'List', 'list', 'permissions', 'index'),
(9, 4, 'Backend', 'Create', 'create', 'permissions', 'create'),
(10, 4, 'Backend', 'Update', 'update', 'permissions', 'update'),
(11, 4, 'Backend', 'View', 'view', 'permissions', 'view'),
(12, 4, 'Backend', 'Delete', 'delete', 'permissions', 'delete'),
(13, 4, 'Backend', 'Is active', 'isactive', 'permissions', 'isactive'),
(14, 4, 'Backend', 'Export', 'export', 'permissions', 'export'),
(15, 5, 'Backend', 'List', 'list', 'roles', 'index'),
(16, 5, 'Backend', 'Create', 'create', 'roles', 'create'),
(17, 5, 'Backend', 'Update', 'update', 'roles', 'update'),
(18, 5, 'Backend', 'View', 'view', 'roles', 'view'),
(19, 5, 'Backend', 'Delete', 'delete', 'roles', 'delete'),
(20, 5, 'Backend', 'Is active', 'isactive', 'roles', 'isactive'),
(21, 5, 'Backend', 'Export', 'export', 'roles', 'export'),
(22, 5, 'Backend', 'Access', 'access', 'roles', 'index'),
(23, 7, 'Backend', 'List', 'list', 'emailtemplates', 'index'),
(24, 7, 'Backend', 'Create', 'create', 'emailtemplates', 'create'),
(25, 7, 'Backend', 'Update', 'update', 'emailtemplates', 'update'),
(26, 7, 'Backend', 'View', 'view', 'emailtemplates', 'view'),
(27, 7, 'Backend', 'Delete', 'delete', 'emailtemplates', 'delete'),
(28, 7, 'Backend', 'Is active', 'isactive', 'emailtemplates', 'isactive'),
(29, 8, 'Backend', 'List', 'list', 'settings', 'index'),
(30, 8, 'Backend', 'Create', 'create', 'settings', 'create'),
(31, 8, 'Backend', 'Update', 'update', 'settings', 'update'),
(32, 8, 'Backend', 'View', 'view', 'settings', 'view'),
(33, 8, 'Backend', 'Delete', 'delete', 'settings', 'delete'),
(34, 8, 'Backend', 'Is active', 'isactive', 'settings', 'isactive'),
(35, 8, 'Backend', 'Export', 'export', 'settings', 'export'),
(36, 9, 'Backend', 'List', 'list', 'custompages', 'index'),
(37, 9, 'Backend', 'Create', 'create', 'custompages', 'create'),
(38, 9, 'Backend', 'Update', 'update', 'custompages', 'update'),
(39, 9, 'Backend', 'View', 'view', 'custompages', 'view'),
(40, 9, 'Backend', 'Delete', 'delete', 'custompages', 'delete'),
(41, 9, 'Backend', 'Is active', 'isactive', 'custompages', 'isactive'),
(42, 10, 'Backend', 'List', 'list', 'users', 'index'),
(43, 10, 'Backend', 'Create', 'create', 'users', 'create'),
(44, 10, 'Backend', 'Update', 'update', 'users', 'update'),
(45, 10, 'Backend', 'View', 'view', 'users', 'view'),
(46, 10, 'Backend', 'Delete', 'delete', 'users', 'delete'),
(47, 10, 'Backend', 'Is active', 'isactive', 'users', 'isactive'),
(48, 10, 'Backend', 'Export', 'export', 'users', 'export'),
(49, 10, 'Backend', 'Access', 'access', 'users', 'access'),
(50, 11, 'Backend', 'List', 'list', 'salons', 'index'),
(51, 11, 'Backend', 'Create', 'create', 'salons', 'create'),
(52, 11, 'Backend', 'Update', 'update', 'salons', 'update'),
(53, 11, 'Backend', 'View', 'view', 'salons', 'view'),
(54, 11, 'Backend', 'Delete', 'delete', 'salons', 'delete'),
(55, 11, 'Backend', 'Is active', 'isactive', 'salons', 'isactive'),
(56, 11, 'Backend', 'Export', 'export', 'salons', 'export');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `price_tier`
--

CREATE TABLE `price_tier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salon_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Salon',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `is_active_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `price_tier`
--

INSERT INTO `price_tier` (`id`, `salon_id`, `name`, `description`, `is_active`, `is_active_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Junior stylist', '', '1', '2021-11-29 08:24:26', NULL, NULL),
(2, 1, 'Senior Stylist', '', '1', '2021-11-29 08:24:26', NULL, NULL),
(3, 1, 'Unassigned', '', '1', '2021-11-29 08:24:26', NULL, NULL),
(10, 1, 'test121', '', '1', '2021-11-29 14:46:03', '2021-11-29 09:16:03', '2021-11-29 09:16:03');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salon_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Salon',
  `supplier_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Supplier',
  `tax_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Category',
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_price` decimal(10,2) NOT NULL,
  `retail_price` decimal(10,2) NOT NULL,
  `manage_stock` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `stock_quantity` int(10) UNSIGNED DEFAULT NULL,
  `low_stock_threshold` int(10) UNSIGNED DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `is_active_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `salon_id`, `supplier_id`, `tax_id`, `name`, `image`, `sku`, `description`, `cost_price`, `retail_price`, `manage_stock`, `stock_quantity`, `low_stock_threshold`, `is_active`, `is_active_at`, `created_at`, `updated_at`) VALUES
(1, 3, 20, 1, 'Wella shampoo3', NULL, 'WEL18621', 'test', '50.00', '40.00', '1', 47, 43, '1', NULL, '2021-11-25 23:02:18', '2021-11-25 23:02:18'),
(2, 3, 20, 1, 'Wella shampoo31', NULL, 'WEL1862123', 'test', '50.00', '40.00', '1', 47, 43, '1', NULL, '2021-11-25 23:02:35', '2021-11-25 23:02:35'),
(3, 3, 20, 1, 'Wella shampoo312', NULL, 'WEL186212', 'test', '50.00', '40.00', '1', 47, 43, '1', NULL, '2021-11-25 23:02:57', '2021-11-25 23:02:57'),
(5, 3, 20, 1, 'Wella shampoo31211', '1637901605_Screenshot_from_2021-09-14_10-24-25.png', 'WEL1862122sa', 'test', '50.20', '40.00', '1', 47, 43, '1', '2021-11-26 10:10:05', '2021-11-26 04:40:05', '2021-11-26 09:24:20');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `panel` enum('Backend','Frontend','Common') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Backend',
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `is_active_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `panel`, `is_active`, `is_active_at`, `created_at`, `updated_at`) VALUES
(1, 'masteradmin', 'Backend', '1', '2021-11-19 05:14:19', '1979-08-15 12:29:49', '2021-11-18 23:44:19'),
(2, 'admin', 'Backend', '1', '2021-11-18 10:39:12', '1994-02-01 12:43:21', '2021-11-18 05:09:12'),
(3, 'Subadmin', 'Backend', '1', '2021-11-24 08:32:19', '1971-07-25 04:44:26', '2021-11-24 03:02:19'),
(4, 'Owner', 'Frontend', '1', '2021-11-24 10:52:56', '2021-11-24 05:22:56', '2021-11-24 23:15:54'),
(5, 'Staff', 'Frontend', '1', '2021-11-25 04:45:47', '2021-11-24 23:15:47', '2021-12-03 10:41:30'),
(6, 'Client', 'Frontend', '1', '2021-12-03 16:11:38', '2021-12-03 10:41:38', '2021-12-03 10:41:38');

-- --------------------------------------------------------

--
-- Table structure for table `roles_access`
--

CREATE TABLE `roles_access` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Role',
  `permission_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Permission',
  `access` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles_access`
--

INSERT INTO `roles_access` (`id`, `role_id`, `permission_id`, `access`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1', '2021-11-18 23:19:03', '2021-11-18 23:33:32'),
(2, 1, 2, '1', '2021-11-18 23:19:03', '2021-11-18 23:33:32'),
(3, 1, 3, '1', '2021-11-18 23:19:03', '2021-11-18 23:19:03'),
(4, 1, 4, '1', '2021-11-18 23:19:03', '2021-11-18 23:19:03'),
(5, 1, 5, '1', '2021-11-18 23:19:03', '2021-11-18 23:19:03'),
(6, 1, 6, '1', '2021-11-18 23:19:03', '2021-11-18 23:19:03'),
(7, 1, 7, '1', '2021-11-18 23:19:03', '2021-11-18 23:19:03'),
(8, 1, 8, '1', '2021-11-18 23:19:03', '2021-11-18 23:19:03'),
(9, 1, 9, '1', '2021-11-18 23:19:03', '2021-11-18 23:19:03'),
(10, 1, 10, '1', '2021-11-18 23:19:03', '2021-11-18 23:19:03'),
(11, 1, 11, '1', '2021-11-18 23:19:03', '2021-11-18 23:19:03'),
(12, 1, 12, '1', '2021-11-18 23:19:03', '2021-11-18 23:19:03'),
(13, 1, 13, '1', '2021-11-18 23:19:03', '2021-11-18 23:19:03'),
(14, 1, 14, '1', '2021-11-18 23:19:03', '2021-11-18 23:19:03'),
(15, 1, 15, '1', '2021-11-18 23:19:03', '2021-11-22 00:24:33'),
(16, 1, 16, '1', '2021-11-18 23:19:03', '2021-11-18 23:19:03'),
(17, 1, 17, '1', '2021-11-18 23:19:03', '2021-11-18 23:19:03'),
(18, 1, 18, '1', '2021-11-18 23:19:03', '2021-11-18 23:19:03'),
(19, 1, 19, '1', '2021-11-18 23:19:03', '2021-11-18 23:19:03'),
(20, 1, 20, '1', '2021-11-18 23:19:03', '2021-11-18 23:19:03'),
(21, 1, 21, '1', '2021-11-18 23:19:03', '2021-11-18 23:19:03'),
(22, 1, 22, '1', '2021-11-18 23:19:03', '2021-11-18 23:19:03'),
(23, 1, 23, '1', '2021-11-18 23:19:03', '2021-11-22 00:37:57'),
(24, 1, 24, '1', '2021-11-18 23:19:03', '2021-11-22 00:38:11'),
(25, 1, 25, '1', '2021-11-18 23:19:03', '2021-11-22 00:38:11'),
(26, 1, 26, '1', '2021-11-18 23:19:03', '2021-11-22 00:38:11'),
(27, 1, 27, '1', '2021-11-18 23:19:03', '2021-11-22 00:38:11'),
(28, 1, 28, '1', '2021-11-18 23:19:03', '2021-11-22 00:38:11'),
(29, 1, 29, '1', '2021-11-18 23:19:03', '2021-11-18 23:19:03'),
(30, 1, 30, '1', '2021-11-18 23:19:03', '2021-11-18 23:19:03'),
(31, 1, 31, '1', '2021-11-18 23:19:03', '2021-11-18 23:19:03'),
(32, 1, 32, '1', '2021-11-18 23:19:03', '2021-11-18 23:19:03'),
(33, 1, 33, '1', '2021-11-18 23:19:03', '2021-11-18 23:19:03'),
(34, 1, 34, '1', '2021-11-18 23:19:03', '2021-11-18 23:19:03'),
(35, 1, 35, '1', '2021-11-18 23:19:03', '2021-11-18 23:19:03'),
(36, 1, 36, '1', '2021-11-18 23:19:03', '2021-11-22 00:38:11'),
(37, 1, 37, '1', '2021-11-18 23:19:03', '2021-11-22 00:38:11'),
(38, 1, 38, '1', '2021-11-18 23:19:03', '2021-11-22 00:38:11'),
(39, 1, 39, '1', '2021-11-18 23:19:03', '2021-11-22 00:38:11'),
(40, 1, 40, '1', '2021-11-18 23:19:03', '2021-11-22 00:38:11'),
(41, 1, 41, '1', '2021-11-18 23:19:03', '2021-11-22 00:38:11'),
(42, 1, 42, '1', '2021-11-18 23:19:03', '2021-11-18 23:19:03'),
(43, 1, 43, '1', '2021-11-18 23:19:03', '2021-11-18 23:19:03'),
(44, 1, 44, '1', '2021-11-18 23:19:03', '2021-11-18 23:19:03'),
(45, 1, 45, '1', '2021-11-18 23:19:03', '2021-11-18 23:19:03'),
(46, 1, 46, '1', '2021-11-18 23:19:03', '2021-11-18 23:19:03'),
(47, 1, 47, '1', '2021-11-18 23:19:03', '2021-11-18 23:19:03'),
(48, 1, 48, '1', '2021-11-18 23:19:03', '2021-11-18 23:19:03'),
(49, 1, 49, '0', '2021-11-18 23:19:03', '2021-11-22 01:57:50'),
(50, 2, 1, '0', '2021-11-18 23:55:00', '2021-12-07 00:31:35'),
(51, 2, 2, '0', '2021-11-18 23:55:00', '2021-12-07 00:49:52'),
(52, 2, 3, '0', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(53, 2, 4, '0', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(54, 2, 5, '0', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(55, 2, 6, '0', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(56, 2, 7, '0', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(57, 2, 8, '0', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(58, 2, 9, '0', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(59, 2, 10, '0', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(60, 2, 11, '0', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(61, 2, 12, '0', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(62, 2, 13, '0', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(63, 2, 14, '0', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(64, 2, 15, '0', '2021-11-18 23:55:00', '2021-12-07 00:32:46'),
(65, 2, 16, '0', '2021-11-18 23:55:00', '2021-12-07 00:33:50'),
(66, 2, 17, '0', '2021-11-18 23:55:00', '2021-12-07 00:32:46'),
(67, 2, 18, '0', '2021-11-18 23:55:00', '2021-12-07 00:32:46'),
(68, 2, 19, '0', '2021-11-18 23:55:00', '2021-12-07 00:32:46'),
(69, 2, 20, '0', '2021-11-18 23:55:00', '2021-12-07 00:32:46'),
(70, 2, 21, '0', '2021-11-18 23:55:00', '2021-12-07 00:32:46'),
(71, 2, 22, '0', '2021-11-18 23:55:00', '2021-12-07 00:32:46'),
(72, 2, 23, '0', '2021-11-18 23:55:00', '2021-12-07 05:31:02'),
(73, 2, 24, '0', '2021-11-18 23:55:00', '2021-12-07 05:31:02'),
(74, 2, 25, '0', '2021-11-18 23:55:00', '2021-12-07 05:31:02'),
(75, 2, 26, '0', '2021-11-18 23:55:00', '2021-12-07 05:31:02'),
(76, 2, 27, '0', '2021-11-18 23:55:00', '2021-12-07 05:31:02'),
(77, 2, 28, '0', '2021-11-18 23:55:00', '2021-12-07 05:31:02'),
(78, 2, 29, '0', '2021-11-18 23:55:00', '2021-12-07 05:31:02'),
(79, 2, 30, '0', '2021-11-18 23:55:00', '2021-12-07 05:31:02'),
(80, 2, 31, '0', '2021-11-18 23:55:00', '2021-12-07 05:31:02'),
(81, 2, 32, '0', '2021-11-18 23:55:00', '2021-12-07 05:31:02'),
(82, 2, 33, '0', '2021-11-18 23:55:00', '2021-12-07 05:31:02'),
(83, 2, 34, '0', '2021-11-18 23:55:00', '2021-12-07 05:31:02'),
(84, 2, 35, '0', '2021-11-18 23:55:00', '2021-12-07 05:31:02'),
(85, 2, 36, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(86, 2, 37, '0', '2021-11-18 23:55:00', '2021-12-07 05:31:02'),
(87, 2, 38, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(88, 2, 39, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(89, 2, 40, '0', '2021-11-18 23:55:00', '2021-12-07 05:31:02'),
(90, 2, 41, '0', '2021-11-18 23:55:00', '2021-12-07 05:31:02'),
(91, 2, 42, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(92, 2, 43, '1', '2021-11-18 23:55:00', '2021-12-07 01:36:57'),
(93, 2, 44, '1', '2021-11-18 23:55:00', '2021-12-07 01:47:02'),
(94, 2, 45, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(95, 2, 46, '1', '2021-11-18 23:55:00', '2021-12-07 01:47:26'),
(96, 2, 47, '1', '2021-11-18 23:55:00', '2021-12-07 01:46:41'),
(97, 2, 48, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(98, 2, 49, '0', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(99, 1, 50, '1', '2021-11-23 05:26:14', '2021-11-23 05:26:14'),
(100, 1, 51, '1', '2021-11-23 05:26:14', '2021-11-23 05:26:14'),
(101, 1, 52, '1', '2021-11-23 05:26:14', '2021-11-23 05:26:14'),
(102, 1, 53, '1', '2021-11-23 05:26:14', '2021-11-23 05:26:14'),
(103, 1, 54, '1', '2021-11-23 05:26:14', '2021-11-23 05:26:14'),
(104, 1, 55, '1', '2021-11-23 05:26:14', '2021-11-23 05:26:14'),
(105, 1, 56, '1', '2021-11-23 05:26:14', '2021-11-23 05:26:14'),
(106, 2, 50, '1', '2021-12-07 00:31:07', '2021-12-07 00:32:46'),
(107, 2, 51, '1', '2021-12-07 00:31:07', '2021-12-07 00:32:46'),
(108, 2, 52, '1', '2021-12-07 00:31:07', '2021-12-07 00:32:46'),
(109, 2, 53, '1', '2021-12-07 00:31:07', '2021-12-07 00:32:46'),
(110, 2, 54, '1', '2021-12-07 00:31:07', '2021-12-07 00:32:46'),
(111, 2, 55, '1', '2021-12-07 00:31:07', '2021-12-07 00:32:46'),
(112, 2, 56, '0', '2021-12-07 00:31:07', '2021-12-07 00:31:07');

-- --------------------------------------------------------

--
-- Table structure for table `roster`
--

CREATE TABLE `roster` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salon_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Salon',
  `staff_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Staff',
  `date` date DEFAULT NULL,
  `start_time` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `away` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `is_active_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salons`
--

CREATE TABLE `salons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_email_verified` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `business_email_verified_at` timestamp NULL DEFAULT NULL,
  `business_phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_phone_number_verified` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `business_phone_number_verified_at` timestamp NULL DEFAULT NULL,
  `business_telephone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `salon_type` enum('Unisex','Ladies','Gents') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unisex',
  `logo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `is_active_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salons`
--

INSERT INTO `salons` (`id`, `business_name`, `owner_name`, `business_email`, `business_email_verified`, `business_email_verified_at`, `business_phone_number`, `business_phone_number_verified`, `business_phone_number_verified_at`, `business_telephone_number`, `business_address`, `salon_type`, `logo`, `timezone`, `is_active`, `is_active_at`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'test1', 'test@gmail.com', '1', '2021-11-24 04:20:39', '454-545-4452', '0', NULL, NULL, 'test', 'Unisex', '1637747227_Screenshot_from_2021-09-14_10-24-25.png', 'US/Pacific', '1', '2021-11-24 09:50:39', '2021-11-24 01:46:27', '2021-11-24 04:20:39'),
(2, 'Test2', 'test12', 'test1@gmail.com', '1', '2021-11-24 04:21:23', '121-254-5454', '0', NULL, NULL, 'test', 'Unisex', '1637747472_Screenshot_from_2021-09-25_17-04-14.png', 'US/Pacific', '1', '2021-11-24 09:51:23', '2021-11-24 04:21:12', '2021-11-24 04:21:23'),
(3, 'salons business', 'Maulik Patel', 'maulik245@gmail.com', '1', '2021-11-24 07:06:19', '999-999-9999', '0', NULL, NULL, 'montreal, canada', 'Unisex', NULL, 'US/Pacific', '1', '2021-12-07 08:54:38', '2021-11-24 07:06:19', '2021-12-07 03:24:38');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salon_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Salon',
  `category_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Category',
  `tax_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Category',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'minutes',
  `padding_time` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'minutes',
  `color` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'color code #fcfcfcfc',
  `service_booked_online` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deposit_booked_online` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `deposit_booked_price` decimal(10,2) NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `is_active_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `salon_id`, `category_id`, `tax_id`, `name`, `description`, `duration`, `padding_time`, `color`, `service_booked_online`, `deposit_booked_online`, `deposit_booked_price`, `is_active`, `is_active_at`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 1, 'test12', 'test1', '100', '50', '#f1f1f1', '0', '1', '50.00', '1', '2021-11-26 15:22:58', '2021-11-26 09:52:58', '2021-11-27 11:51:28'),
(3, 3, 2, 1, 'test12', 'test1', '100', '50', '#f1f1f1', '0', '1', '50.00', '1', '2021-11-26 15:23:17', '2021-11-26 09:53:17', '2021-11-26 09:53:17'),
(4, 1, 2, 1, 'test121', 'test1', '100', '50', '#f1f1f1', '0', '1', '50.00', '1', '2021-11-26 18:47:16', '2021-11-26 13:17:16', '2021-11-26 13:17:16'),
(5, 1, 2, 1, 'test1211', 'test1', '100', '50', '#f1f1f1', '0', '1', '50.00', '1', '2021-11-26 18:47:49', '2021-11-26 13:17:49', '2021-11-26 13:17:49');

-- --------------------------------------------------------

--
-- Table structure for table `services_price`
--

CREATE TABLE `services_price` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Service',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `add_on_price` decimal(10,2) DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `is_active_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services_price`
--

INSERT INTO `services_price` (`id`, `service_id`, `name`, `price`, `add_on_price`, `is_active`, `is_active_at`, `created_at`, `updated_at`) VALUES
(1, 2, 'General', '100.00', '0.00', '1', '2021-11-27 17:21:28', '2021-11-26 12:05:31', '2021-11-27 11:51:28'),
(2, 2, 'Junior', '50.00', '0.00', '1', '2021-11-27 17:21:28', '2021-11-26 12:05:31', '2021-11-27 11:51:28'),
(3, 2, 'Senior', '20.00', '5.00', '1', '2021-11-27 17:21:28', '2021-11-26 12:05:31', '2021-11-27 11:51:28'),
(4, 5, 'General', '0.00', '0.00', '1', '2021-11-26 18:47:49', '2021-11-26 13:17:49', '2021-11-26 13:17:49'),
(5, 5, 'Junior', '0.00', '0.00', '1', '2021-11-26 18:47:49', '2021-11-26 13:17:49', '2021-11-26 13:17:49'),
(6, 5, 'Senior', '0.00', '0.00', '1', '2021-11-26 18:47:49', '2021-11-26 13:17:49', '2021-11-26 13:17:49');

-- --------------------------------------------------------

--
-- Table structure for table `staff_services`
--

CREATE TABLE `staff_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Staff',
  `service_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Service',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff_services`
--

INSERT INTO `staff_services` (`id`, `staff_id`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 5, 3, '2021-12-03 11:17:43', '2021-12-03 11:17:43'),
(2, 5, 5, '2021-12-03 11:17:43', '2021-12-03 11:17:43');

-- --------------------------------------------------------

--
-- Table structure for table `staff_working_hours`
--

CREATE TABLE `staff_working_hours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salon_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Salon',
  `staff_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Staff',
  `days` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `break_time` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `is_active_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff_working_hours`
--

INSERT INTO `staff_working_hours` (`id`, `salon_id`, `staff_id`, `days`, `start_time`, `end_time`, `break_time`, `is_active`, `is_active_at`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'Sunday', '', '', '[{\"break_title\":\"Lunch\",\"break_start_time\":\"\",\"break_end_time\":\"\"}]', '1', NULL, '2021-12-03 11:17:43', '2021-12-03 11:17:43'),
(2, 1, 5, 'Monday', '', '', '[{\"break_title\":\"Lunch\",\"break_start_time\":\"\",\"break_end_time\":\"\"}]', '1', NULL, '2021-12-03 11:17:43', '2021-12-03 11:17:43'),
(3, 1, 5, 'Tuesday', '', '', '[{\"break_title\":\"Lunch\",\"break_start_time\":\"\",\"break_end_time\":\"\"}]', '1', NULL, '2021-12-03 11:17:43', '2021-12-03 11:17:43'),
(4, 1, 5, 'Wednesday', '', '', '[{\"break_title\":\"Lunch\",\"break_start_time\":\"\",\"break_end_time\":\"\"}]', '1', NULL, '2021-12-03 11:17:43', '2021-12-03 11:17:43'),
(5, 1, 5, 'Thursday', '', '', '[{\"break_title\":\"Lunch\",\"break_start_time\":\"\",\"break_end_time\":\"\"}]', '1', NULL, '2021-12-03 11:17:43', '2021-12-03 11:17:43'),
(6, 1, 5, 'Friday', '', '', '[{\"break_title\":\"Lunch\",\"break_start_time\":\"\",\"break_end_time\":\"\"}]', '1', NULL, '2021-12-03 11:17:43', '2021-12-03 11:17:43'),
(7, 1, 5, 'Saturday', '', '', '[{\"break_title\":\"Lunch\",\"break_start_time\":\"\",\"break_end_time\":\"\"}]', '1', NULL, '2021-12-03 11:17:43', '2021-12-03 11:17:43');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salon_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Salon',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number_verified` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `phone_number_verified_at` timestamp NULL DEFAULT NULL,
  `telephone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suburb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `is_active_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `salon_id`, `name`, `first_name`, `last_name`, `email`, `email_verified`, `email_verified_at`, `phone_number`, `phone_number_verified`, `phone_number_verified_at`, `telephone`, `logo`, `website`, `address`, `street`, `suburb`, `state`, `postcode`, `description`, `is_active`, `is_active_at`, `created_at`, `updated_at`) VALUES
(19, 1, 'wallmart', 'Evelyn t', 'Martello', 'EvelynTMartello@teleworm.us', '0', NULL, '773-465-1590', '0', NULL, NULL, '1637837292_Screenshot_from_2021-09-14_10-24-25.png', 'http://haydensurfcraft.com/1', '1629 Cherry Camp Road\nChicago, IL 60626', '1629', 'Cherry Camp Road', 'Chicagos', 'IL 60626', '', '1', NULL, '2021-11-25 05:18:12', '2021-11-26 11:24:19'),
(20, 1, 'walla', 'Evelyn', 'Martello', 'EvelynTMartel1lwo@teleworm.us', '0', NULL, '773-465-1590', '0', NULL, NULL, '1637837335_Screenshot_from_2021-09-14_10-24-25.png', 'http://haydensurfcraft.com/', '1629 Cherry Camp Road\nChicago, IL 60626', '1629', 'Cherry Camp Road', 'Chicago', 'IL 60626', '', '1', NULL, '2021-11-25 05:18:55', '2021-11-25 05:18:55'),
(21, 1, 'wallmart2', 'Evelyn', 'Martello', 'EvelynTMartel1lwo2@teleworm.us', '0', NULL, '773-465-1590', '0', NULL, NULL, '1637846643_Screenshot_from_2021-09-14_10-24-25.png', 'http://haydensurfcraft.com/', '1629 Cherry Camp Road\nChicago, IL 60626', '1629', 'Cherry Camp Road', 'Chicago', 'IL 60626', '', '1', NULL, '2021-11-25 07:54:03', '2021-11-25 07:54:03'),
(22, 1, 'wallmart23', 'Evelyn', 'Martello', 'EvelynTMartel1lwo23@teleworm.us', '0', NULL, '773-465-1590', '0', NULL, NULL, '1637846656_Screenshot_from_2021-09-14_10-24-25.png', 'http://haydensurfcraft.com/', '1629 Cherry Camp Road\nChicago, IL 60626', '1629', 'Cherry Camp Road', 'Chicago', 'IL 60626', '', '1', NULL, '2021-11-25 07:54:16', '2021-11-25 07:54:16'),
(23, 1, 'wallmart233', 'Evelyn', 'Martello', 'EvelynTMartel1lwo423@teleworm.us', '0', NULL, '773-465-1590', '0', NULL, NULL, '1637925880_Screenshot_from_2021-09-14_10-24-25.png', 'http://haydensurfcraft.com/', '1629 Cherry Camp Road\nChicago, IL 60626', '1629', 'Cherry Camp Road', 'Chicago', 'IL 60626', '', '1', '2021-11-26 16:54:40', '2021-11-26 11:24:40', '2021-11-26 11:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` decimal(8,2) DEFAULT NULL COMMENT 'percentage %',
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `is_active_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`id`, `name`, `description`, `percentage`, `is_active`, `is_active_at`, `created_at`, `updated_at`) VALUES
(1, 'GST', '', NULL, '1', '2021-11-25 14:10:30', '2021-11-25 13:11:15', '2021-11-25 13:11:18'),
(2, 'QST', '', NULL, '1', '2021-11-25 14:10:30', NULL, NULL),
(3, 'PST', '', NULL, '1', '2021-11-25 14:10:30', NULL, NULL),
(4, 'HST', '', NULL, '1', '2021-11-25 14:10:30', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `panel` enum('Backend','Frontend','Common') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Backend',
  `role_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Role',
  `salon_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Salon',
  `price_tier_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Price tier',
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_otp` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_key` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number_otp` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number_verified` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `phone_number_verified_at` timestamp NULL DEFAULT NULL,
  `profile_photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `is_active_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gender` enum('Male','Female','Other') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Client Role',
  `date_of_birth` date DEFAULT NULL COMMENT 'Client Role',
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Client Role',
  `street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Client Role',
  `suburb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Client Role',
  `state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Client Role',
  `postcode` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Client Role',
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Client Role',
  `send_sms_notification` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Client Role: Send sms notification to client',
  `send_email_notification` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Client Role: Send email notification to client',
  `recieve_marketing_email` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Client Role: Client agrees to receive marketing emails',
  `calendar_booking` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `panel`, `role_id`, `salon_id`, `price_tier_id`, `first_name`, `last_name`, `username`, `email`, `email_otp`, `email_verified`, `email_verified_at`, `password`, `auth_key`, `phone_number`, `phone_number_otp`, `phone_number_verified`, `phone_number_verified_at`, `profile_photo`, `remember_token`, `is_active`, `is_active_at`, `created_at`, `updated_at`, `gender`, `date_of_birth`, `address`, `street`, `suburb`, `state`, `postcode`, `description`, `send_sms_notification`, `send_email_notification`, `recieve_marketing_email`, `calendar_booking`) VALUES
(1, 'Backend', 1, NULL, NULL, 'MasterAdmin', 'Murazik', 'kyundt1', 'programmer93.dynamicdreamz@gmail.com', NULL, '1', '1984-02-29 21:41:52', '$2y$10$TO7IKbjAPp3gVDgqXdKZFudyZU1OPLt66i4dhLQs6E3whd6/P631W', '93b2b4aff84e168afc31e5f5e0dc8a7d23c801f1d6212f9a7986d5fff4c01f60', '153-189-6311', NULL, '1', '1996-05-03 08:30:23', '', '3837NCViZNshqdT7Zj39RJRhpsM4d2dwD97Dht1qLeY40pDpoDLOPrcNJHvP', '1', '2021-11-22 06:33:12', '1981-08-23 23:48:57', '2021-12-01 10:22:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Backend', 3, NULL, NULL, 'SubAdmin', 'Murazik1', 'kyundt2', 'programmer.dynamicdreamz@gmail.com', NULL, '1', '1984-02-29 21:41:52', '$2y$10$TO7IKbjAPp3gVDgqXdKZFudyZU1OPLt66i4dhLQs6E3whd6/P631W', NULL, '153-189-6311', NULL, '1', '1996-05-03 08:30:23', '', NULL, '1', '1994-09-25 23:03:02', '1981-08-23 23:48:57', '2021-11-29 06:44:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Backend', 2, NULL, NULL, 'Admin', 'Murazik2', 'kyundt3', 'programmer_.dynamicdreamz@gmail.com', NULL, '1', '1984-02-29 21:41:52', '$2y$10$TO7IKbjAPp3gVDgqXdKZFudyZU1OPLt66i4dhLQs6E3whd6/P631W', NULL, '1-531-896-3112', NULL, '1', '1996-05-03 08:30:23', '', NULL, '1', '1994-09-25 23:03:02', '1981-08-23 23:48:57', '2007-11-15 19:36:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Frontend', 4, 1, NULL, 'Maulik', 'Patel', 'test', 'maulik@gmail.com', NULL, '1', '2021-11-24 06:07:01', '$2y$10$b71X26hghS/gIMIT.IuOOuUq/BFrtTEyIrc2Pxeh7GEV/dOYkcu3G', 'f3d8f51ae70f08633a25e25604d4c3c5c7a22fec50f073a02d1bbcc3ade79e24', '232-131-2312', NULL, '0', NULL, NULL, NULL, '1', '2021-11-24 11:37:01', '2021-11-24 06:07:01', '2021-11-24 06:07:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Frontend', 4, 1, NULL, 'maulik', 'patel1', 'maulik', 'maulikpatel2@gmail.com', NULL, '1', '2021-11-24 06:09:38', '$2y$10$slkzPbCFiuTza1lMEfg8v.6rYwVNXSBNdlozC/Vy9jig3KTRDl4z6', '2939fa84d2f32a51284c7242f46a91f2d92341bab8a94832c5e99f69ce36deda', '456-258-5694', NULL, '0', NULL, '1638530836_Screenshot_from_2021-09-14_10-24-25.png', NULL, '1', '2021-11-24 11:39:38', '2021-11-24 06:09:38', '2021-12-03 11:27:16', NULL, NULL, '1629 Cherry Camp Road\nChicago, IL 60626', '1629', 'Cherry Camp Road', 'Chicago', 'IL 60626', NULL, NULL, NULL, NULL, '1'),
(8, 'Frontend', 4, 1, NULL, 'maulik', 'patel', 'maulik240', 'maulikpatel240@gmail.com', NULL, '1', '2021-11-24 07:17:46', '$2y$10$6kGylmqx/gnGP15SHD2FBumBtP61Ot7h9/RKJptud9WOIjd6vRzxe', '16814e53d4ed993c6664d1f42a68b4a211e71b48892a008aadaa5c0a7f4693ad', '456-258-5694', NULL, '0', NULL, NULL, NULL, '1', '2021-11-24 12:47:46', '2021-11-24 07:17:46', '2021-11-24 07:17:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Frontend', 4, 1, NULL, 'maulik', 'patel', 'maulik2401', 'maulikpatel2401@gmail.com', NULL, '1', '2021-11-24 08:00:12', '$2y$10$xeSBIM0cWGsW4P3QhtpLsuIPpY1/2QTEEfxw6eoa3pAYVdmW./aS6', '900f2ce21b019ad7c89c245d424420e081c8bedba1da43e49d4877c6ebae6ff1', '456-258-5694', NULL, '0', NULL, NULL, NULL, '1', '2021-11-24 13:30:12', '2021-11-24 08:00:12', '2021-11-24 08:00:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Frontend', 4, 1, NULL, 'maulik', 'patel', 'maulik24012', 'maulikpatel24230@gmail.com', NULL, '1', '2021-11-24 08:00:32', '$2y$10$.i1RCQcjcbzt0V9tk1IWyOV/al2XZ7wO592tZ.FrCxZkQ1kYElraG', '6cd50ccd7a0f08152aa4089ac3da843c4cc01120fa94ab5c76d6891dfded6801', '456-258-5694', NULL, '0', NULL, NULL, NULL, '1', '2021-11-25 13:19:23', '2021-11-24 08:00:32', '2021-11-25 07:49:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Backend', 5, 1, NULL, 'maulik', 'patel', 'maulikpatel2401', 'maulikpatel2401@gmail.com', NULL, '0', NULL, '$2y$10$ur0K8dpjBljYJDES4.oTg.8o2SL84NWCh8Mct9aeQddxWfuJrq4Ui', NULL, '456-258-5694', NULL, '0', NULL, NULL, NULL, '1', '2021-11-29 12:19:33', '2021-11-29 06:49:33', '2021-11-29 06:49:33', 'Male', '2021-11-05', '1629 Cherry Camp Road\nChicago, IL 60626', '1629', 'Cherry Camp Road', 'Chicago', 'IL 60626', 'test', '0', '0', '0', NULL),
(26, 'Backend', 5, 1, NULL, 'maulik', 'patel', 'maulikpatel242', 'maulikpatel242@gmail.com', NULL, '0', NULL, '$2y$10$dZhMp88aIO8.F.bMreIfpuy0gRrgOT/EFq7ElP5Tz8rAcu43u5AY.', NULL, '456-258-5694', NULL, '0', NULL, NULL, NULL, '1', '2021-11-29 12:24:38', '2021-11-29 06:54:38', '2021-11-29 06:54:38', 'Male', '2021-11-05', '1629 Cherry Camp Road\nChicago, IL 60626', '1629', 'Cherry Camp Road', 'Chicago', 'IL 60626', 'test', '0', '0', '0', NULL),
(31, 'Backend', 4, 1, NULL, 'maulik', 'patel', 'maulikpatel21401', 'maulikpatel21401@gmail.com', NULL, '0', NULL, '$2y$10$XIhZ.rUjL4o4eojyQ8NOV.HgTsFrgyW9yctBFqmenAB6zDu0uzIKu', 'cada04c8680cbf64a5103d7e4441d1c9ea0c2415344ae2e2578bfca9b0963be5', '456-258-5694', NULL, '0', NULL, NULL, NULL, '1', '2021-12-07 06:26:57', '2021-11-30 11:56:52', '2021-12-07 00:56:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salon_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Salon',
  `code` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `valid` int(10) UNSIGNED NOT NULL COMMENT 'Valid for Months',
  `used_online` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `limit_uses` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `limit_uses_value` int(10) UNSIGNED DEFAULT NULL,
  `terms_and_conditions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `is_active_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id`, `salon_id`, `code`, `name`, `description`, `amount`, `valid`, `used_online`, `limit_uses`, `limit_uses_value`, `terms_and_conditions`, `is_active`, `is_active_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'hMfC9J', '25% service 1', 'good job', '50.00', 6, '0', '1', 1000, 'test', '1', '2021-11-29 18:09:38', '2021-11-29 12:39:38', '2021-11-30 05:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `voucher_services`
--

CREATE TABLE `voucher_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `voucher_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Voucher',
  `service_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Voucher Service include',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voucher_services`
--

INSERT INTO `voucher_services` (`id`, `voucher_id`, `service_id`, `created_at`, `updated_at`) VALUES
(2, 1, 4, '2021-11-30 05:06:58', '2021-11-30 05:06:58'),
(4, 1, 5, '2021-11-30 05:13:00', '2021-11-30 05:13:00'),
(5, 1, 2, '2021-11-30 05:13:25', '2021-11-30 05:13:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_on_services`
--
ALTER TABLE `add_on_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `add_on_services_service_id_foreign` (`service_id`),
  ADD KEY `add_on_services_add_on_service_id_foreign` (`add_on_service_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointment_salon_id_foreign` (`salon_id`),
  ADD KEY `appointment_client_id_foreign` (`client_id`),
  ADD KEY `appointment_service_id_foreign` (`service_id`),
  ADD KEY `appointment_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `busy_time`
--
ALTER TABLE `busy_time`
  ADD PRIMARY KEY (`id`),
  ADD KEY `busy_time_salon_id_foreign` (`salon_id`),
  ADD KEY `busy_time_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_salon_id_foreign` (`salon_id`);

--
-- Indexes for table `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `configuration_name_unique` (`name`);

--
-- Indexes for table `custom_pages`
--
ALTER TABLE `custom_pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `custom_pages_name_unique` (`name`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates_field`
--
ALTER TABLE `email_templates_field`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_templates_field_email_template_id_foreign` (`email_template_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_reset_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_module_id_foreign` (`module_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `price_tier`
--
ALTER TABLE `price_tier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `price_tier_salon_id_foreign` (`salon_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_salon_id_foreign` (`salon_id`),
  ADD KEY `products_supplier_id_foreign` (`supplier_id`),
  ADD KEY `products_tax_id_foreign` (`tax_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_access`
--
ALTER TABLE `roles_access`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_access_role_id_foreign` (`role_id`),
  ADD KEY `roles_access_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `roster`
--
ALTER TABLE `roster`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roster_salon_id_foreign` (`salon_id`),
  ADD KEY `roster_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `salons`
--
ALTER TABLE `salons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `salons_business_email_unique` (`business_email`),
  ADD UNIQUE KEY `salons_business_phone_number_unique` (`business_phone_number`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_salon_id_foreign` (`salon_id`),
  ADD KEY `services_category_id_foreign` (`category_id`),
  ADD KEY `services_tax_id_foreign` (`tax_id`);

--
-- Indexes for table `services_price`
--
ALTER TABLE `services_price`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_price_service_id_foreign` (`service_id`);

--
-- Indexes for table `staff_services`
--
ALTER TABLE `staff_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_services_service_id_foreign` (`service_id`),
  ADD KEY `staff_services_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `staff_working_hours`
--
ALTER TABLE `staff_working_hours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_working_hours_salon_id_foreign` (`salon_id`),
  ADD KEY `staff_working_hours_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suppliers_salon_id_foreign` (`salon_id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_api_token_unique` (`auth_key`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_salon_id_foreign` (`salon_id`),
  ADD KEY `users_price_tier_id_foreign` (`price_tier_id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `voucher_code_unique` (`code`),
  ADD KEY `voucher_salon_id_foreign` (`salon_id`);

--
-- Indexes for table `voucher_services`
--
ALTER TABLE `voucher_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voucher_services_voucher_id_foreign` (`voucher_id`),
  ADD KEY `voucher_services_service_id_foreign` (`service_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_on_services`
--
ALTER TABLE `add_on_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `busy_time`
--
ALTER TABLE `busy_time`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `configuration`
--
ALTER TABLE `configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `custom_pages`
--
ALTER TABLE `custom_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_templates_field`
--
ALTER TABLE `email_templates_field`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `price_tier`
--
ALTER TABLE `price_tier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles_access`
--
ALTER TABLE `roles_access`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `roster`
--
ALTER TABLE `roster`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salons`
--
ALTER TABLE `salons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services_price`
--
ALTER TABLE `services_price`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff_services`
--
ALTER TABLE `staff_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff_working_hours`
--
ALTER TABLE `staff_working_hours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `voucher_services`
--
ALTER TABLE `voucher_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_on_services`
--
ALTER TABLE `add_on_services`
  ADD CONSTRAINT `add_on_services_add_on_service_id_foreign` FOREIGN KEY (`add_on_service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `add_on_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_salon_id_foreign` FOREIGN KEY (`salon_id`) REFERENCES `salons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `busy_time`
--
ALTER TABLE `busy_time`
  ADD CONSTRAINT `busy_time_salon_id_foreign` FOREIGN KEY (`salon_id`) REFERENCES `salons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `busy_time_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_salon_id_foreign` FOREIGN KEY (`salon_id`) REFERENCES `salons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `email_templates_field`
--
ALTER TABLE `email_templates_field`
  ADD CONSTRAINT `email_templates_field_email_template_id_foreign` FOREIGN KEY (`email_template_id`) REFERENCES `email_templates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `price_tier`
--
ALTER TABLE `price_tier`
  ADD CONSTRAINT `price_tier_salon_id_foreign` FOREIGN KEY (`salon_id`) REFERENCES `salons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_salon_id_foreign` FOREIGN KEY (`salon_id`) REFERENCES `salons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_tax_id_foreign` FOREIGN KEY (`tax_id`) REFERENCES `tax` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `roles_access`
--
ALTER TABLE `roles_access`
  ADD CONSTRAINT `roles_access_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `roles_access_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `roster`
--
ALTER TABLE `roster`
  ADD CONSTRAINT `roster_salon_id_foreign` FOREIGN KEY (`salon_id`) REFERENCES `salons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `roster_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `services_salon_id_foreign` FOREIGN KEY (`salon_id`) REFERENCES `salons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `services_tax_id_foreign` FOREIGN KEY (`tax_id`) REFERENCES `tax` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `services_price`
--
ALTER TABLE `services_price`
  ADD CONSTRAINT `services_price_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff_services`
--
ALTER TABLE `staff_services`
  ADD CONSTRAINT `staff_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `staff_services_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff_working_hours`
--
ALTER TABLE `staff_working_hours`
  ADD CONSTRAINT `staff_working_hours_salon_id_foreign` FOREIGN KEY (`salon_id`) REFERENCES `salons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `staff_working_hours_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD CONSTRAINT `suppliers_salon_id_foreign` FOREIGN KEY (`salon_id`) REFERENCES `salons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_price_tier_id_foreign` FOREIGN KEY (`price_tier_id`) REFERENCES `price_tier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_salon_id_foreign` FOREIGN KEY (`salon_id`) REFERENCES `salons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `voucher`
--
ALTER TABLE `voucher`
  ADD CONSTRAINT `voucher_salon_id_foreign` FOREIGN KEY (`salon_id`) REFERENCES `voucher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `voucher_services`
--
ALTER TABLE `voucher_services`
  ADD CONSTRAINT `voucher_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `voucher_services_voucher_id_foreign` FOREIGN KEY (`voucher_id`) REFERENCES `voucher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
