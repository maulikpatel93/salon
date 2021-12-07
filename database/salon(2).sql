-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 07, 2021 at 12:38 PM
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
('d20b46a573a0ec6a13919249b13f50dfc0edd539dab5255b4876e1769b60f6398bfe88fec7fe98b9', 9, 1, '9', '[]', 0, '2021-12-03 11:15:45', '2021-12-03 11:15:45', '2022-12-03 16:45:45');

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
(1, 'Backend', 1, NULL, NULL, 'MasterAdmin', 'Murazik', 'kyundt1', 'programmer93.dynamicdreamz@gmail.com', NULL, '1', '1984-02-29 21:41:52', '$2y$10$TO7IKbjAPp3gVDgqXdKZFudyZU1OPLt66i4dhLQs6E3whd6/P631W', '93b2b4aff84e168afc31e5f5e0dc8a7d23c801f1d6212f9a7986d5fff4c01f60', '153-189-6311', NULL, '1', '1996-05-03 08:30:23', '', 'KVHeEWMld6KRuSreQjLWi9W9mtHVxKspXvRhGwRs4G5QmJV5rJ9VCPIfTiCK', '1', '2021-11-22 06:33:12', '1981-08-23 23:48:57', '2021-12-01 10:22:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
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
