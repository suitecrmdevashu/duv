-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 19, 2022 at 09:37 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grievancemgmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `abilities`
--

CREATE TABLE `abilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entity_id` bigint(20) UNSIGNED DEFAULT NULL,
  `entity_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `only_owned` tinyint(1) NOT NULL DEFAULT 0,
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `scope` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `abilities`
--

INSERT INTO `abilities` (`id`, `name`, `title`, `entity_id`, `entity_type`, `only_owned`, `options`, `scope`, `created_at`, `updated_at`) VALUES
(1, 'abilities', 'Abilities Listing', NULL, NULL, 0, NULL, NULL, '2022-03-20 05:35:40', '2022-03-20 05:51:28'),
(2, 'create_ability', 'Create Ability', NULL, NULL, 0, NULL, NULL, '2022-03-20 05:52:10', '2022-03-20 05:52:52'),
(3, 'edit_ability', 'Edit Ability', NULL, NULL, 0, NULL, NULL, '2022-03-20 05:52:28', '2022-03-20 05:52:28'),
(4, 'roles', 'Roles Listing', NULL, NULL, 0, NULL, NULL, '2022-03-20 05:53:05', '2022-03-20 05:53:05'),
(5, 'create_role', 'Create Role', NULL, NULL, 0, NULL, NULL, '2022-03-20 05:54:22', '2022-03-20 05:54:22'),
(6, 'edit_role', 'Edit Role', NULL, NULL, 0, NULL, NULL, '2022-03-20 05:54:47', '2022-03-20 05:54:47'),
(7, 'dashboard', 'Dashboard', NULL, NULL, 0, NULL, NULL, '2022-03-20 08:21:30', '2022-03-20 08:21:30'),
(22, 'create_division', 'Create Division', NULL, NULL, 0, NULL, NULL, '2022-08-14 02:00:32', '2022-08-14 02:00:32'),
(23, 'edit_division', 'Edit Division', NULL, NULL, 0, NULL, NULL, '2022-08-14 02:00:54', '2022-08-14 02:00:54'),
(24, 'division_list', 'List Division', NULL, NULL, 0, NULL, NULL, '2022-08-14 02:01:27', '2022-08-14 02:01:27'),
(25, 'delete_division', 'Delete Division', NULL, NULL, 0, NULL, NULL, '2022-08-14 04:41:03', '2022-08-14 04:41:03'),
(26, 'location_list', 'Location List', NULL, NULL, 0, NULL, NULL, '2022-08-14 07:12:49', '2022-08-14 07:12:49'),
(27, 'create_location', 'Create Location', NULL, NULL, 0, NULL, NULL, '2022-08-14 07:13:01', '2022-08-14 07:13:01'),
(28, 'edit_location', 'Edit Location', NULL, NULL, 0, NULL, NULL, '2022-08-14 07:13:13', '2022-08-14 07:13:13'),
(29, 'delete_location', 'Delete Location', NULL, NULL, 0, NULL, NULL, '2022-08-14 07:13:29', '2022-08-14 07:13:29'),
(30, 'inventory_list', 'Inventory List', NULL, NULL, 0, NULL, NULL, '2022-08-14 08:26:13', '2022-08-14 08:26:13'),
(31, 'create_inventory', 'Create Inventory', NULL, NULL, 0, NULL, NULL, '2022-08-14 08:26:32', '2022-08-14 08:26:32'),
(32, 'edit_inventory', 'Edit Inventory', NULL, NULL, 0, NULL, NULL, '2022-08-14 08:26:43', '2022-08-14 08:26:43'),
(33, 'delete_inventory', 'Delete Inventory', NULL, NULL, 0, NULL, NULL, '2022-08-14 08:26:55', '2022-08-14 08:26:55'),
(34, 'inventory', 'Manage Inventory', NULL, NULL, 0, NULL, NULL, '2022-09-12 03:04:39', '2022-09-12 03:04:39'),
(35, 'vendor_list', 'List Vendor', NULL, NULL, 0, NULL, NULL, '2022-09-12 03:07:22', '2022-09-12 03:11:09'),
(36, 'create_vendor', 'Add Vendor', NULL, NULL, 0, NULL, NULL, '2022-09-12 03:09:19', '2022-09-12 03:09:41'),
(37, 'edit_vendors', 'Edit Vendor', NULL, NULL, 0, NULL, NULL, '2022-09-12 03:11:52', '2022-09-12 03:11:52'),
(38, 'delete_vendors', 'Delete Vendor', NULL, NULL, 0, NULL, NULL, '2022-09-12 03:12:15', '2022-09-12 03:12:15'),
(39, 'itemissue_list', 'Item Issue', NULL, NULL, 0, NULL, NULL, '2022-09-12 03:13:27', '2022-09-12 03:13:27'),
(40, 'create_itemissue', 'Create Item Issue', NULL, NULL, 0, NULL, NULL, '2022-09-12 03:13:47', '2022-09-12 03:13:47'),
(41, 'circle_list', 'Circle', NULL, NULL, 0, NULL, NULL, '2022-09-12 03:16:52', '2022-09-12 03:16:52'),
(42, 'create_circle', 'Add Circle', NULL, NULL, 0, NULL, NULL, '2022-09-12 03:17:05', '2022-09-12 03:17:05'),
(43, 'edit_circle', 'Edit Circle', NULL, NULL, 0, NULL, NULL, '2022-09-12 03:17:22', '2022-09-12 03:17:22'),
(44, 'delete_circle', 'Delete Circle', NULL, NULL, 0, NULL, NULL, '2022-09-12 03:17:37', '2022-09-12 03:17:37'),
(45, 'department_list', 'Department', NULL, NULL, 0, NULL, NULL, '2022-09-12 03:18:27', '2022-09-12 03:18:27'),
(46, 'create_department', 'Add Department', NULL, NULL, 0, NULL, NULL, '2022-09-12 03:18:42', '2022-09-12 03:18:42'),
(47, 'edit_department', 'Edit Department', NULL, NULL, 0, NULL, NULL, '2022-09-12 03:19:00', '2022-09-12 03:19:00'),
(48, 'delete_department', 'Delete Department', NULL, NULL, 0, NULL, NULL, '2022-09-12 03:19:16', '2022-09-12 03:19:16'),
(49, 'employee_list', 'Employee', NULL, NULL, 0, NULL, NULL, '2022-09-12 03:20:29', '2022-09-12 03:20:29'),
(50, 'create_employee', 'Add Employee', NULL, NULL, 0, NULL, NULL, '2022-09-12 03:21:03', '2022-09-12 03:21:03'),
(51, 'edit_employee', 'Edit Employee', NULL, NULL, 0, NULL, NULL, '2022-09-12 03:21:31', '2022-09-12 03:21:31'),
(52, 'delete_employee', 'Delete Employee', NULL, NULL, 0, NULL, NULL, '2022-09-12 03:21:50', '2022-09-12 03:21:50'),
(53, 'asset_list', 'Asset', NULL, NULL, 0, NULL, NULL, '2022-09-12 03:22:50', '2022-09-12 03:22:50'),
(54, 'create_asset', 'Create Asset', NULL, NULL, 0, NULL, NULL, '2022-09-12 03:23:03', '2022-09-12 03:23:03'),
(55, 'edit_asset', 'Edit Asset', NULL, NULL, 0, NULL, NULL, '2022-09-12 03:23:16', '2022-09-12 03:23:16'),
(56, 'delete_asset', 'Delete Asset', NULL, NULL, 0, NULL, NULL, '2022-09-12 03:23:29', '2022-09-12 03:23:29'),
(57, 'brand_list', 'Brand', NULL, NULL, 0, NULL, NULL, '2022-09-12 03:24:05', '2022-09-12 03:24:05'),
(58, 'create_brand', 'Create Brand', NULL, NULL, 0, NULL, NULL, '2022-09-12 03:24:19', '2022-09-12 03:24:19'),
(59, 'edit_brand', 'Edit Brand', NULL, NULL, 0, NULL, NULL, '2022-09-12 03:24:34', '2022-09-12 03:24:34'),
(60, 'delete_brand', 'Delete Brand', NULL, NULL, 0, NULL, NULL, '2022-09-12 03:24:51', '2022-09-12 03:24:51'),
(61, 'itemreturn_list', 'Item Return', NULL, NULL, 0, NULL, NULL, '2022-09-12 03:25:33', '2022-09-12 03:25:33'),
(62, 'create_itemreturn', 'Create Item Return', NULL, NULL, 0, NULL, NULL, '2022-09-12 03:25:55', '2022-09-12 03:25:55'),
(63, 'complaint_list', 'Complaints', NULL, NULL, 0, NULL, NULL, '2022-09-12 03:26:39', '2022-09-12 03:26:39'),
(64, 'create_complaint', 'Create Complaint', NULL, NULL, 0, NULL, NULL, '2022-09-12 03:26:54', '2022-09-12 03:26:54'),
(65, 'edit_complaint', 'Edit Complaint', NULL, NULL, 0, NULL, NULL, '2022-09-12 03:27:07', '2022-09-12 03:27:07'),
(66, 'delete_complaint', 'Delete Complaint', NULL, NULL, 0, NULL, NULL, '2022-09-12 03:27:21', '2022-09-12 03:27:21'),
(67, 'createGatePass', 'Gatepass', NULL, NULL, 0, NULL, NULL, '2022-09-12 04:02:10', '2022-09-12 04:03:21'),
(68, 'qrCode', 'Qr Code', NULL, NULL, 0, NULL, NULL, '2022-09-12 04:04:07', '2022-09-12 04:04:07');

-- --------------------------------------------------------

--
-- Table structure for table `asset`
--

CREATE TABLE `asset` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assigned_roles`
--

CREATE TABLE `assigned_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `entity_id` bigint(20) UNSIGNED NOT NULL,
  `entity_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restricted_to_id` bigint(20) UNSIGNED DEFAULT NULL,
  `restricted_to_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scope` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assigned_roles`
--

INSERT INTO `assigned_roles` (`id`, `role_id`, `entity_id`, `entity_type`, `restricted_to_id`, `restricted_to_type`, `scope`) VALUES
(1, 1, 1, 'App\\Models\\User', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `circle`
--

CREATE TABLE `circle` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `circle_id` bigint(20) UNSIGNED DEFAULT NULL,
  `location_id` bigint(20) UNSIGNED DEFAULT NULL,
  `asset_id` bigint(20) UNSIGNED NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sla` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complaint_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `po_number` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `po_expiry` date NOT NULL,
  `model_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mrna_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asset_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_qty` int(11) NOT NULL,
  `item_cost` decimal(10,2) DEFAULT NULL,
  `total_cost` decimal(10,2) DEFAULT NULL,
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vendor_email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_contact` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sla` int(11) NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_serial_number_mapping`
--

CREATE TABLE `inventory_serial_number_mapping` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inventory_id` bigint(20) UNSIGNED NOT NULL,
  `serial_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sold_out` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0->not sold',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0->Inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_issue`
--

CREATE TABLE `item_issue` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `issue_ref_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_type` bigint(20) UNSIGNED NOT NULL,
  `item_qty` int(11) NOT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `asset_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `circle_id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED DEFAULT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `issued_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issued_to_email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confidentiality_rating` tinyint(4) DEFAULT NULL,
  `integrity_rating` tinyint(4) DEFAULT NULL,
  `availability_rating` tinyint(4) DEFAULT NULL,
  `overall_asset` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asset_criticality` tinyint(4) DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issue_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_return`
--

CREATE TABLE `item_return` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `issue_ref_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_type` bigint(20) UNSIGNED NOT NULL,
  `item_qty` int(11) NOT NULL DEFAULT 1,
  `circle_id` bigint(20) UNSIGNED DEFAULT NULL,
  `location_id` bigint(20) UNSIGNED DEFAULT NULL,
  `return_location` bigint(20) UNSIGNED DEFAULT NULL,
  `returned_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `divisions_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

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
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2022_03_19_105511_create_bouncer_tables', 2),
(11, '2022_03_27_111419_create_media_table', 4),
(28, '2022_08_14_072559_create_division_table', 5),
(30, '2022_08_14_124121_create_locations_table', 6),
(31, '2022_08_14_135158_create_inventory_table', 7),
(32, '2022_08_22_064223_create_vendor_table', 8),
(33, '2022_08_22_125656_create_circle_table', 8),
(34, '2022_08_23_053435_create_department_table', 8),
(35, '2022_08_23_102927_create_employee_table', 8),
(36, '2022_08_25_065901_create_itemissue_table', 8),
(37, '2022_08_25_135742_create_itemreturn_table', 8),
(38, '2022_08_27_061931_create_asset_table', 8),
(39, '2022_08_27_101531_alter_serial_number_inventory_table', 8),
(40, '2022_08_27_103129_create_inventory_serial_number_mapping_table', 8),
(41, '2022_08_28_103749_alter_unique_model_number_inventory_table', 8),
(42, '2022_08_28_105225_alter_vender_id_inventory_table', 8),
(43, '2022_08_28_111251_alter_unique_serial_number_inventory_mapping_table', 8),
(44, '2022_08_28_135136_alter_add_division_id_item_issue_table', 8),
(45, '2022_08_28_180810_create_complaint_table', 8),
(46, '2022_09_04_091258_create_brand_table', 8),
(47, '2022_09_05_182251_alter_add_issue_ref_no_issue_item_table', 8),
(48, '2022_09_05_191741_alter_add_mrna_number_inventory_table', 8),
(49, '2022_09_05_192105_create_brand_table', 8),
(50, '2022_09_05_192202_alter_add_brand_id_inventory_table', 8),
(51, '2022_09_06_124338_alter_add_asset_type_table', 8),
(52, '2022_09_06_131936_alter_add_brand_id_item_issue_table', 8),
(53, '2022_09_07_110419_alter_add_overall_asset_item_issue_table', 8);

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
  `ability_id` bigint(20) UNSIGNED NOT NULL,
  `entity_id` bigint(20) UNSIGNED DEFAULT NULL,
  `entity_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forbidden` tinyint(1) NOT NULL DEFAULT 0,
  `scope` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `ability_id`, `entity_id`, `entity_type`, `forbidden`, `scope`) VALUES
(21, 4, 4, 'roles', 0, NULL),
(22, 4, 5, 'roles', 0, NULL),
(23, 4, 6, 'roles', 0, NULL),
(24, 4, 7, 'roles', 0, NULL),
(25, 4, 8, 'roles', 0, NULL),
(147, 4, 2, 'roles', 0, NULL),
(148, 7, 2, 'roles', 0, NULL),
(155, 4, 3, 'roles', 0, NULL),
(179, 3, 10, 'roles', 0, NULL),
(180, 1, 11, 'roles', 0, NULL),
(181, 1, 12, 'roles', 0, NULL),
(677, 1, 1, 'roles', 0, NULL),
(678, 2, 1, 'roles', 0, NULL),
(679, 3, 1, 'roles', 0, NULL),
(680, 4, 1, 'roles', 0, NULL),
(681, 5, 1, 'roles', 0, NULL),
(682, 6, 1, 'roles', 0, NULL),
(683, 7, 1, 'roles', 0, NULL),
(684, 22, 1, 'roles', 0, NULL),
(685, 23, 1, 'roles', 0, NULL),
(686, 24, 1, 'roles', 0, NULL),
(687, 25, 1, 'roles', 0, NULL),
(688, 26, 1, 'roles', 0, NULL),
(689, 27, 1, 'roles', 0, NULL),
(690, 28, 1, 'roles', 0, NULL),
(691, 29, 1, 'roles', 0, NULL),
(692, 30, 1, 'roles', 0, NULL),
(693, 31, 1, 'roles', 0, NULL),
(694, 32, 1, 'roles', 0, NULL),
(695, 33, 1, 'roles', 0, NULL),
(696, 35, 1, 'roles', 0, NULL),
(697, 36, 1, 'roles', 0, NULL),
(698, 37, 1, 'roles', 0, NULL),
(699, 38, 1, 'roles', 0, NULL),
(700, 39, 1, 'roles', 0, NULL),
(701, 40, 1, 'roles', 0, NULL),
(702, 41, 1, 'roles', 0, NULL),
(703, 42, 1, 'roles', 0, NULL),
(704, 43, 1, 'roles', 0, NULL),
(705, 44, 1, 'roles', 0, NULL),
(706, 45, 1, 'roles', 0, NULL),
(707, 46, 1, 'roles', 0, NULL),
(708, 47, 1, 'roles', 0, NULL),
(709, 48, 1, 'roles', 0, NULL),
(710, 49, 1, 'roles', 0, NULL),
(711, 50, 1, 'roles', 0, NULL),
(712, 51, 1, 'roles', 0, NULL),
(713, 52, 1, 'roles', 0, NULL),
(714, 53, 1, 'roles', 0, NULL),
(715, 54, 1, 'roles', 0, NULL),
(716, 55, 1, 'roles', 0, NULL),
(717, 56, 1, 'roles', 0, NULL),
(718, 57, 1, 'roles', 0, NULL),
(719, 58, 1, 'roles', 0, NULL),
(720, 59, 1, 'roles', 0, NULL),
(721, 60, 1, 'roles', 0, NULL),
(722, 61, 1, 'roles', 0, NULL),
(723, 62, 1, 'roles', 0, NULL),
(724, 63, 1, 'roles', 0, NULL),
(725, 64, 1, 'roles', 0, NULL),
(726, 65, 1, 'roles', 0, NULL),
(727, 66, 1, 'roles', 0, NULL),
(728, 67, 1, 'roles', 0, NULL),
(729, 68, 1, 'roles', 0, NULL),
(733, 1, 13, 'roles', 0, NULL);

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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scope` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `title`, `scope`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', NULL, 1, '2022-03-20 07:18:42', '2022-03-20 07:28:35'),
(13, 'Shivani Kumar111', 'Shivani kumar1', NULL, 1, '2022-09-12 04:09:23', '2022-09-12 04:13:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@gmail.com', 'hareram', '2022-03-19 18:11:29', '$2y$10$vIYRgis1Ooc7UiDrkZc0HOy1eZsNSCKPgPWwTVaXltHVfG.zrIqRS', NULL, 1, '2022-03-19 12:17:43', '2022-10-19 05:38:43');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abilities`
--
ALTER TABLE `abilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `abilities_scope_index` (`scope`);

--
-- Indexes for table `asset`
--
ALTER TABLE `asset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assigned_roles`
--
ALTER TABLE `assigned_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assigned_roles_entity_index` (`entity_id`,`entity_type`,`scope`),
  ADD KEY `assigned_roles_role_id_index` (`role_id`),
  ADD KEY `assigned_roles_scope_index` (`scope`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `circle`
--
ALTER TABLE `circle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_email_unique` (`email`),
  ADD KEY `employee_division_id_foreign` (`division_id`),
  ADD KEY `employee_department_id_foreign` (`department_id`),
  ADD KEY `employee_location_id_foreign` (`location_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inventory_model_number_unique` (`model_number`),
  ADD KEY `inventory_vendor_id_foreign` (`vendor_id`),
  ADD KEY `inventory_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `inventory_serial_number_mapping`
--
ALTER TABLE `inventory_serial_number_mapping`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inventory_serial_number_mapping_serial_number_unique` (`serial_number`),
  ADD UNIQUE KEY `inventory_serial_number_mapping_reference_id_unique` (`reference_id`),
  ADD KEY `inventory_serial_number_mapping_inventory_id_foreign` (`inventory_id`);

--
-- Indexes for table `item_issue`
--
ALTER TABLE `item_issue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_issue_circle_id_foreign` (`circle_id`),
  ADD KEY `item_issue_location_id_foreign` (`location_id`),
  ADD KEY `item_issue_division_id_foreign` (`division_id`),
  ADD KEY `item_issue_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `item_return`
--
ALTER TABLE `item_return`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_return_circle_id_foreign` (`circle_id`),
  ADD KEY `item_return_location_id_foreign` (`location_id`),
  ADD KEY `item_return_return_location_foreign` (`return_location`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locations_divisions_id_foreign` (`divisions_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_entity_index` (`entity_id`,`entity_type`,`scope`),
  ADD KEY `permissions_ability_id_index` (`ability_id`),
  ADD KEY `permissions_scope_index` (`scope`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`,`scope`),
  ADD KEY `roles_scope_index` (`scope`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendors_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abilities`
--
ALTER TABLE `abilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `asset`
--
ALTER TABLE `asset`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assigned_roles`
--
ALTER TABLE `assigned_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `circle`
--
ALTER TABLE `circle`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_serial_number_mapping`
--
ALTER TABLE `inventory_serial_number_mapping`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_issue`
--
ALTER TABLE `item_issue`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_return`
--
ALTER TABLE `item_return`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=734;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigned_roles`
--
ALTER TABLE `assigned_roles`
  ADD CONSTRAINT `assigned_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `employee_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`),
  ADD CONSTRAINT `employee_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `inventory_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`);

--
-- Constraints for table `inventory_serial_number_mapping`
--
ALTER TABLE `inventory_serial_number_mapping`
  ADD CONSTRAINT `inventory_serial_number_mapping_inventory_id_foreign` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`id`);

--
-- Constraints for table `item_issue`
--
ALTER TABLE `item_issue`
  ADD CONSTRAINT `item_issue_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `item_issue_circle_id_foreign` FOREIGN KEY (`circle_id`) REFERENCES `circle` (`id`),
  ADD CONSTRAINT `item_issue_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`),
  ADD CONSTRAINT `item_issue_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`);

--
-- Constraints for table `item_return`
--
ALTER TABLE `item_return`
  ADD CONSTRAINT `item_return_circle_id_foreign` FOREIGN KEY (`circle_id`) REFERENCES `circle` (`id`),
  ADD CONSTRAINT `item_return_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`),
  ADD CONSTRAINT `item_return_return_location_foreign` FOREIGN KEY (`return_location`) REFERENCES `locations` (`id`);

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_divisions_id_foreign` FOREIGN KEY (`divisions_id`) REFERENCES `divisions` (`id`);

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_ability_id_foreign` FOREIGN KEY (`ability_id`) REFERENCES `abilities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
