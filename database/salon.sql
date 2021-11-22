-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2021 at 10:10 AM
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
-- Table structure for table `configuration`
--

CREATE TABLE `configuration` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Text','Textarea','File','Date','Time','Datetime','Radio','Checkbox','Select','Other') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Text',
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `is_active_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `type` enum('Backend','Web','App','Common') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Common',
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `is_active_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(9, '2021_11_22_073429_create_users_add_api_column_table', 8);

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
(7, 'Backend', 'Email Templates', 'email-templates', 'index', 'far fa-circle', 'crud', 'Submenu', 6, NULL, NULL, NULL, '0', '1', '2021-11-18 06:23:57', '2021-11-17 02:03:53', '2021-11-18 00:53:57'),
(8, 'Backend', 'Settings', 'settings', 'index', 'fas fa-cog', 'crud', 'Menu', NULL, NULL, NULL, NULL, '0', '1', '2021-11-19 05:42:58', '2021-11-18 03:41:22', '2021-11-22 00:09:55'),
(9, 'Backend', 'Custom Pages', 'custompages', 'index', 'far fa-circle', 'crud', 'Submenu', 6, NULL, NULL, NULL, '0', '1', NULL, '2021-11-18 03:44:49', '2021-11-18 03:44:49'),
(10, 'Backend', 'Users', 'users', 'index', 'far fa-circle', 'crud', 'Submenu', 2, NULL, NULL, NULL, '0', '1', '2021-11-19 06:45:13', '2021-11-18 22:56:20', '2021-11-19 01:15:13');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
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
  `panel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Backend',
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
(23, 7, 'Backend', 'List', 'list', 'email-templates', 'index'),
(24, 7, 'Backend', 'Create', 'create', 'email-templates', 'create'),
(25, 7, 'Backend', 'Update', 'update', 'email-templates', 'update'),
(26, 7, 'Backend', 'View', 'view', 'email-templates', 'view'),
(27, 7, 'Backend', 'Delete', 'delete', 'email-templates', 'delete'),
(28, 7, 'Backend', 'Is active', 'isactive', 'email-templates', 'isactive'),
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
(49, 10, 'Backend', 'Access', 'access', 'users', 'access');

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
(3, 'Subadmin', 'Backend', '1', '2021-11-18 10:43:34', '1971-07-25 04:44:26', '2021-11-19 05:38:38'),
(4, 'User', 'Frontend', '1', '2021-11-19 12:54:12', '2021-11-19 05:38:28', '2021-11-19 07:24:12');

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
(50, 2, 1, '0', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(51, 2, 2, '0', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
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
(64, 2, 15, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(65, 2, 16, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(66, 2, 17, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(67, 2, 18, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(68, 2, 19, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(69, 2, 20, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(70, 2, 21, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(71, 2, 22, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(72, 2, 23, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(73, 2, 24, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(74, 2, 25, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(75, 2, 26, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(76, 2, 27, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(77, 2, 28, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(78, 2, 29, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(79, 2, 30, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(80, 2, 31, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(81, 2, 32, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(82, 2, 33, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(83, 2, 34, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(84, 2, 35, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(85, 2, 36, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(86, 2, 37, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(87, 2, 38, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(88, 2, 39, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(89, 2, 40, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(90, 2, 41, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(91, 2, 42, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(92, 2, 43, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(93, 2, 44, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(94, 2, 45, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(95, 2, 46, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(96, 2, 47, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(97, 2, 48, '1', '2021-11-18 23:55:00', '2021-11-18 23:55:00'),
(98, 2, 49, '0', '2021-11-18 23:55:00', '2021-11-18 23:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Role',
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number_verified` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `phone_number_verified_at` timestamp NULL DEFAULT NULL,
  `profile_photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `is_active_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `first_name`, `last_name`, `username`, `email`, `email_verified`, `email_verified_at`, `password`, `api_token`, `phone_number`, `phone_number_verified`, `phone_number_verified_at`, `profile_photo`, `remember_token`, `is_active`, `is_active_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lyla', 'Murazik', 'kyundt', 'programmer93.dynamicdreamz@gmail.com', '1', '1984-02-29 21:41:52', '$2y$10$7pWq7Y9s4nXoW1yTypEO8OwTjJSMlb1Qam/CQ6FMN9zzGQprEAdGm', '93b2b4aff84e168afc31e5f5e0dc8a7d23c801f1d6212f9a7986d5fff4c01f60', '1-531-896-3112', '1', '1996-05-03 08:30:23', '', 'DM0HnB8tfydbwwGho37B6Tt8H6UQuoOyAGRhpZOlX0Jfl4cOgG23cUaqB4f8', '1', '2021-11-22 06:33:12', '1981-08-23 23:48:57', '2021-11-22 03:28:31'),
(3, 3, 'Lyla', 'Murazik1', 'kyundt', 'programmer.dynamicdreamz@gmail.com', '1', '1984-02-29 21:41:52', '$2y$10$7pWq7Y9s4nXoW1yTypEO8OwTjJSMlb1Qam/CQ6FMN9zzGQprEAdGm', NULL, '1-531-896-3112', '1', '1996-05-03 08:30:23', '', NULL, '1', '1994-09-25 23:03:02', '1981-08-23 23:48:57', '2007-11-15 19:36:23'),
(4, 2, 'Lyla', 'Murazik2', 'kyundt', 'programmer_.dynamicdreamz@gmail.com', '1', '1984-02-29 21:41:52', '$2y$10$7pWq7Y9s4nXoW1yTypEO8OwTjJSMlb1Qam/CQ6FMN9zzGQprEAdGm', NULL, '1-531-896-3112', '1', '1996-05-03 08:30:23', '', NULL, '1', '1994-09-25 23:03:02', '1981-08-23 23:48:57', '2007-11-15 19:36:23'),
(5, 4, 'Maulik', 'Patel', '', 'maulik@gmail.com', '1', '2021-11-22 01:47:55', '$2y$10$4oEABjSILhJ/jsFUFzWAGuM5Ojv7UFRD.vf/t4oWde5lnVrqKJiMO', NULL, '123456422', '0', NULL, NULL, NULL, '1', '2021-11-22 07:17:55', '2021-11-22 01:47:55', '2021-11-22 01:57:38');

-- --------------------------------------------------------

--
-- Table structure for table `users_access`
--

CREATE TABLE `users_access` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Role',
  `permission_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Type Of Permission',
  `access` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `users_access`
--
ALTER TABLE `users_access`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_access_user_id_foreign` (`user_id`),
  ADD KEY `users_access_permission_id_foreign` (`permission_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `configuration`
--
ALTER TABLE `configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_pages`
--
ALTER TABLE `custom_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles_access`
--
ALTER TABLE `roles_access`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_access`
--
ALTER TABLE `users_access`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `roles_access`
--
ALTER TABLE `roles_access`
  ADD CONSTRAINT `roles_access_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `roles_access_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_access`
--
ALTER TABLE `users_access`
  ADD CONSTRAINT `users_access_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_access_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
