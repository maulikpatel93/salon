-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 23, 2021 at 11:17 AM
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
(9, '2021_11_22_073429_create_users_add_api_column_table', 8),
(10, '2016_06_01_000001_create_oauth_auth_codes_table', 9),
(11, '2016_06_01_000002_create_oauth_access_tokens_table', 9),
(12, '2016_06_01_000003_create_oauth_refresh_tokens_table', 9),
(13, '2016_06_01_000004_create_oauth_clients_table', 9),
(14, '2016_06_01_000005_create_oauth_personal_access_clients_table', 9),
(15, '2021_11_22_120317_create_categories_add_column_table', 10);

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
('03770c068399a1580bf272a8d55adf089c3b457d4531cc1fe9da799dcde4689ee33594ad205ef01e', 11, 1, 'MyApp', '[]', 0, '2021-11-22 07:29:52', '2021-11-22 07:29:52', '2022-11-22 12:59:52'),
('06f38cec233f8dfe5b74749f147662665e3ffa045a0795052ac571d46e60f50670a6fef1f49f8f1b', 11, 1, 'MyApp', '[]', 0, '2021-11-22 06:49:28', '2021-11-22 06:49:28', '2022-11-22 12:19:28'),
('11c5aa04d3878bac34d5e6fec683f762c53dd73b75faa183a4b09dfcc203d3b3442711145001a459', 11, 1, 'MyApp', '[]', 0, '2021-11-22 07:01:32', '2021-11-22 07:01:32', '2022-11-22 12:31:32'),
('139d7de3b9409d5dc9c4e9976f57c19914309a782c7a14984e6d1adc147fc2d8147ad33b96ee72d3', 11, 1, 'MyApp', '[]', 0, '2021-11-22 06:42:07', '2021-11-22 06:42:07', '2022-11-22 12:12:07'),
('19a09b57b6f7861345ac252752bae678be083b5b25dbca7a2a11b56ddfe914381a874a59e1377554', 11, 1, 'MyApp', '[]', 0, '2021-11-22 23:43:18', '2021-11-22 23:43:18', '2022-11-23 05:13:18'),
('1f46100fd526b1f2fd2f380fda2f951f0b249210bd20ac94e1fce39fff178ae5eb6821444603fe56', 11, 1, 'MyApp', '[]', 0, '2021-11-23 00:38:18', '2021-11-23 00:38:18', '2022-11-23 06:08:18'),
('21184b527bb0f69dcd1ae81a2a2dac36b6a2c9b09f8f22adc1330561821c3e4bc82ffe05609312e5', 11, 1, 'MyApp', '[]', 0, '2021-11-22 07:09:41', '2021-11-22 07:09:41', '2022-11-22 12:39:41'),
('25b81dab2aa677ba44e0b85ee91ad81669a3fc41ddce597d377852999d286760616e7585d04d5125', 11, 1, 'MyApp', '[]', 0, '2021-11-22 06:42:01', '2021-11-22 06:42:01', '2022-11-22 12:12:01'),
('28f2c4d9d10b624c244ab7d0f7bb4f96b42e43534c911fcda93b9a9677237eef8136225fa06a3e6c', 10, 1, 'MyApp', '[]', 0, '2021-11-22 06:30:47', '2021-11-22 06:30:47', '2022-11-22 12:00:47'),
('2add72dbf2e40d276c2687c7447ea2b486161c931d628a819d710161cc16bae84d8851dbba49919b', 11, 1, 'MyApp', '[]', 1, '2021-11-23 01:04:39', '2021-11-23 01:04:39', '2022-11-23 06:34:39'),
('306c7d2cf7d934da8bdf4bbc294daf3c8e9ff4d16c90faa3fe0fc19653d4ea2264cf0c42713209fd', 11, 1, 'MyApp', '[]', 0, '2021-11-22 07:36:18', '2021-11-22 07:36:18', '2022-11-22 13:06:18'),
('3204066ed5e6c4ea1c9cc9dac6d08269639e5d6e08d487fd0b8d47b07ca0886a41b8629e1fe34b9a', 7, 1, 'MyApp', '[]', 0, '2021-11-22 06:17:00', '2021-11-22 06:17:00', '2022-11-22 11:47:00'),
('38578790735f1ab53b323978681201acf67b0c3f175b9585fd90bbc324d5ba66dcb856ecdd5c0cd7', 11, 1, 'MyApp', '[]', 0, '2021-11-22 06:44:06', '2021-11-22 06:44:06', '2022-11-22 12:14:06'),
('3d3156766df0b252832898972754fd4b36d1c21b96c72bc5a15ea20aadf445aae2436ab85f985202', 11, 1, 'MyApp', '[]', 0, '2021-11-23 00:38:27', '2021-11-23 00:38:27', '2022-11-23 06:08:27'),
('3fa48b73c2883648cf1b06a73a68e9fe9057fd460e9de0034737c16c4b4ff6d38c5036c6412133bf', 11, 1, 'MyApp', '[]', 0, '2021-11-22 06:42:19', '2021-11-22 06:42:19', '2022-11-22 12:12:19'),
('4790ef1df324c1939ddc8348e5fda9b915e76cd8d8b5f51e90ae5f01c8bb3ab5c3ee556f24efb4f9', 11, 1, 'MyApp', '[]', 0, '2021-11-22 06:49:35', '2021-11-22 06:49:35', '2022-11-22 12:19:35'),
('5bb2e06a68fb5e8b1895eaf879b3e4cc5b7cb8757c31b4ffd9dfbd6467f09cc3a93a924c0e96fbad', 11, 1, 'MyApp', '[]', 0, '2021-11-22 07:06:11', '2021-11-22 07:06:11', '2022-11-22 12:36:11'),
('7ba9844c97eec0457961da38af2ed2c6cfdb8b3a9b51c4134f53fc4be0a7efcc529301e4aeb95dc6', 11, 1, 'MyApp', '[]', 0, '2021-11-22 06:42:19', '2021-11-22 06:42:19', '2022-11-22 12:12:19'),
('84d05d16d2e28cc5055648e1cc077b344fd989668bf9f068f1e240151741747d0391b83422822d2d', 11, 1, 'MyApp', '[]', 0, '2021-11-22 23:46:44', '2021-11-22 23:46:44', '2022-11-23 05:16:44'),
('89814bfad6103b5af78eb86333470f2fb784c184c895c7f52de8f8cd0a59dd877575cbcd669cb010', 11, 1, 'MyApp', '[]', 0, '2021-11-22 07:36:27', '2021-11-22 07:36:27', '2022-11-22 13:06:27'),
('8a663240aa096ddb589eb9885af9303eba84fb44e0a1e2f3fec86013582c830e0d0914e37aec0b1b', 11, 1, 'MyApp', '[]', 0, '2021-11-22 07:36:15', '2021-11-22 07:36:15', '2022-11-22 13:06:15'),
('8d78dca7898e94b620e363931e75b13778aa2e357e59d281f7ca19fcaece88ead8e365caeba8fa06', 11, 1, 'MyApp', '[]', 1, '2021-11-23 04:44:46', '2021-11-23 04:44:46', '2022-11-23 10:14:46'),
('983e43e5037c28f91422db9bf997dae3cf1ff9b444dc47fef94daad2b653d46b6bf6b23a22e88a3a', 11, 1, 'MyApp', '[]', 0, '2021-11-22 06:43:54', '2021-11-22 06:43:54', '2022-11-22 12:13:54'),
('a1732098784f52c529d7a19fee0d9316693ed13c14efade37ba69614b7ddea4a991f2e70d0ef6c15', 11, 1, 'MyApp', '[]', 0, '2021-11-23 00:53:52', '2021-11-23 00:53:52', '2022-11-23 06:23:52'),
('a3f731745208c6622d27cdd26030833807795b213f9b1da80c79b73be1257fe57c4b3b653e76d997', 11, 1, 'MyApp', '[]', 0, '2021-11-23 00:38:19', '2021-11-23 00:38:19', '2022-11-23 06:08:19'),
('ae0805eb4b6a91789e50664f523740ea782e70c00cc7385a8a774f104cf736f1a3b4c8450716a25c', 11, 1, 'MyApp', '[]', 0, '2021-11-22 07:36:32', '2021-11-22 07:36:32', '2022-11-22 13:06:32'),
('af8c09fe85ad441eb4154205fde31da14e6a703981bacabc00190b60ecac64bbd94cdd99d6dd1960', 11, 1, 'MyApp', '[]', 0, '2021-11-22 07:36:26', '2021-11-22 07:36:26', '2022-11-22 13:06:26'),
('b05907579d8ab99345483f62d133b589a0e2f17369df5308cfa760b081b32bd647af9586d95f0d1e', 8, 1, 'MyApp', '[]', 0, '2021-11-22 06:18:29', '2021-11-22 06:18:29', '2022-11-22 11:48:29'),
('b07c7700ffd29378eb4bbd12cfe44bd6a30db4bcea79bf6aed2fb304c110a0f444e6a1dc68f61b55', 11, 1, 'MyApp', '[]', 0, '2021-11-22 06:42:09', '2021-11-22 06:42:09', '2022-11-22 12:12:09'),
('b1d8436525ad6c44db4a787726ddb22416d7b3c2cc20b1bf7f13588acf4a12740b94053c7ae1caf5', 11, 1, 'MyApp', '[]', 0, '2021-11-22 06:31:35', '2021-11-22 06:31:35', '2022-11-22 12:01:35'),
('b8d17726b147b8fae7b7bc18fab2f7c2d1e7072c999e2095984eeea7f12485bd44317307c2b6794c', 11, 1, 'MyApp', '[]', 0, '2021-11-22 06:42:23', '2021-11-22 06:42:23', '2022-11-22 12:12:23'),
('c3ba232975274d686d7014913e7464d86d8fbf18ab30c5ecf0c9167755e5248bdfcd3956c74e3ab1', 11, 1, 'MyApp', '[]', 0, '2021-11-22 06:42:23', '2021-11-22 06:42:23', '2022-11-22 12:12:23'),
('c90cbf2f2f4cafe44b899d2260c6bc83f577d30e1fc7259d6d3ec0f6d3c3cd238e74a2b657ed436d', 9, 1, 'MyApp', '[]', 0, '2021-11-22 06:29:49', '2021-11-22 06:29:49', '2022-11-22 11:59:49'),
('d03e9969c641c9c7a0d1514c116850004d73384fb79a1c0254531252a81fb72fe08c1f78e908f516', 11, 1, 'MyApp', '[]', 0, '2021-11-22 23:43:13', '2021-11-22 23:43:13', '2022-11-23 05:13:13'),
('d2a64ecf60d9fd8d22d90b4ccae50ab2231b2dcb262c1c6d50db437f94ea8cfe817a45ef33358ad3', 11, 1, 'MyApp', '[]', 0, '2021-11-22 07:05:35', '2021-11-22 07:05:35', '2022-11-22 12:35:35'),
('d4b11b70afb898cc0f3ded39a1e3c4f815395529e172b7a3afcc864de06775c0de641232e0097db0', 11, 1, 'MyApp', '[]', 0, '2021-11-23 00:50:50', '2021-11-23 00:50:50', '2022-11-23 06:20:50'),
('d64567832d7be5214946f8e9da238d0af3cb11fab7b5a999a9cde771f31fc24f19c83cb736ad962c', 11, 1, 'MyApp', '[]', 0, '2021-11-22 06:43:53', '2021-11-22 06:43:53', '2022-11-22 12:13:53'),
('da4efb62334942cb476a4809991b8f31c3529ddf5e4a5a638d0a99b3bfa3f411e33e70a6d59c76b1', 11, 1, 'MyApp', '[]', 0, '2021-11-22 06:42:08', '2021-11-22 06:42:08', '2022-11-22 12:12:08'),
('edc381159393862500ae2672e89adbb46bed01894a4628461b02f92433ee46c103db1c3dc95a9b8c', 11, 1, 'MyApp', '[]', 0, '2021-11-22 23:42:34', '2021-11-22 23:42:34', '2022-11-23 05:12:34'),
('f273b336f8113f2d6f52d9bd5aca8fc44a363e7907dff10fdae34136fffbe2d5f14ea13d4d39b297', 6, 1, 'MyApp', '[]', 0, '2021-11-22 06:15:45', '2021-11-22 06:15:45', '2022-11-22 11:45:45');

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
  `auth_key` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `users` (`id`, `role_id`, `first_name`, `last_name`, `username`, `email`, `email_verified`, `email_verified_at`, `password`, `auth_key`, `phone_number`, `phone_number_verified`, `phone_number_verified_at`, `profile_photo`, `remember_token`, `is_active`, `is_active_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lyla', 'Murazik', 'kyundt', 'programmer93.dynamicdreamz@gmail.com', '1', '1984-02-29 21:41:52', '$2y$10$7pWq7Y9s4nXoW1yTypEO8OwTjJSMlb1Qam/CQ6FMN9zzGQprEAdGm', '93b2b4aff84e168afc31e5f5e0dc8a7d23c801f1d6212f9a7986d5fff4c01f60', '1-531-896-3112', '1', '1996-05-03 08:30:23', '', 'ypkfkK7tLRs0GOIAtKtHdJb7r49bncKbyUMiCdu1rJV5y9L2Akt2DIIzAm4p', '1', '2021-11-22 06:33:12', '1981-08-23 23:48:57', '2021-11-22 03:28:31'),
(3, 3, 'Lyla', 'Murazik1', 'kyundt', 'programmer.dynamicdreamz@gmail.com', '1', '1984-02-29 21:41:52', '$2y$10$7pWq7Y9s4nXoW1yTypEO8OwTjJSMlb1Qam/CQ6FMN9zzGQprEAdGm', NULL, '1-531-896-3112', '1', '1996-05-03 08:30:23', '', NULL, '1', '1994-09-25 23:03:02', '1981-08-23 23:48:57', '2007-11-15 19:36:23'),
(4, 2, 'Lyla', 'Murazik2', 'kyundt', 'programmer_.dynamicdreamz@gmail.com', '1', '1984-02-29 21:41:52', '$2y$10$7pWq7Y9s4nXoW1yTypEO8OwTjJSMlb1Qam/CQ6FMN9zzGQprEAdGm', NULL, '1-531-896-3112', '1', '1996-05-03 08:30:23', '', NULL, '1', '1994-09-25 23:03:02', '1981-08-23 23:48:57', '2007-11-15 19:36:23'),
(5, 4, 'Maulik', 'Patel', '', 'maulik@gmail.com', '1', '2021-11-22 01:47:55', '$2y$10$4oEABjSILhJ/jsFUFzWAGuM5Ojv7UFRD.vf/t4oWde5lnVrqKJiMO', NULL, '123456422', '0', NULL, NULL, NULL, '1', '2021-11-22 07:17:55', '2021-11-22 01:47:55', '2021-11-22 01:57:38'),
(11, 4, 'Maulik', 'Patel', '', 'maulikpatel240@gmail.com', '1', '2021-11-22 06:31:35', '$2y$10$iFEXKR2e.zKVNqOvPpraxOTAZ/vL4GLJWTOl2Ypycql2D8fsYl3BS', '80c1522e039ce7a6dcd1f8e4f2a754443f6c083d7bd07c375f5eb0283a9c6cb0', '', '0', NULL, NULL, NULL, '1', '2021-11-22 12:01:35', '2021-11-22 06:31:35', '2021-11-22 06:31:35');

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
  ADD UNIQUE KEY `users_api_token_unique` (`auth_key`),
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
