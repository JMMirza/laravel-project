-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 07, 2022 at 08:07 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmc_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `cadidate_documents_old`
--

CREATE TABLE `cadidate_documents_old` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `academic_achievement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roll_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_marks` int(11) NOT NULL,
  `obtain_marks` int(11) NOT NULL,
  `grade` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passing_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cadidate_documents_old`
--

INSERT INTO `cadidate_documents_old` (`id`, `user_id`, `academic_achievement`, `institute`, `roll_number`, `total_marks`, `obtain_marks`, `grade`, `passing_year`, `document`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 1, 'bachelors', 'NCBA&E', '2151130', 100, 70, 'A', '2021', 'I0qNyjwZc9B3qrNhVBlRhoCe1XBKmLVX.jpeg', 'active', NULL, '2021-12-21 00:06:50', '2021-12-21 00:06:50'),
(3, 1, 'bachelors', 'NCBA&E', 'BSELF1802', 100, 70, 'A', '2021', NULL, 'active', NULL, '2021-12-22 07:43:57', '2021-12-22 07:43:57');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_documents`
--

CREATE TABLE `candidate_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `academic_achievement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roll_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_marks` int(11) NOT NULL,
  `obtain_marks` int(11) NOT NULL,
  `grade` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passing_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate_documents`
--

INSERT INTO `candidate_documents` (`id`, `user_id`, `academic_achievement`, `institute`, `roll_number`, `total_marks`, `obtain_marks`, `grade`, `passing_year`, `document`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'intermediate', 'NCBA&E', 'BSELF1802', 100, 90, 'A', '2021', 'F50O1ego9xvL5xcY0qZB484ArDXJpWBH.jpeg', 'active', NULL, '2022-01-07 06:00:44', '2022-01-07 06:00:44');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `state_id`, `name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lahore', 'active', NULL, NULL, NULL),
(2, 1, 'Multan', 'active', NULL, NULL, NULL),
(3, 1, 'Faisalabad', 'active', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Pakistan', 'active', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `examiner_exam_centers`
--

CREATE TABLE `examiner_exam_centers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `exam_center_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_title` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_fee` int(11) DEFAULT NULL,
  `exam_start_date` timestamp NULL DEFAULT NULL,
  `exam_end_date` timestamp NULL DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `exam_title`, `exam_description`, `exam_fee`, `exam_start_date`, `exam_end_date`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'MDCAT Exam 2022', 'MDCAT Exam', 6000, '2021-12-23 05:34:25', '2022-01-26 05:34:28', 'active', NULL, NULL, NULL),
(2, 'MDCAT Exam 2021', NULL, 6000, '2022-01-09 19:00:00', '2022-01-30 19:00:00', 'active', NULL, '2022-01-10 05:40:05', '2022-01-10 05:40:05');

-- --------------------------------------------------------

--
-- Table structure for table `exam_calendars`
--

CREATE TABLE `exam_calendars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` int(11) NOT NULL,
  `exam_center_id` int(11) NOT NULL,
  `exam_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_calendars`
--

INSERT INTO `exam_calendars` (`id`, `exam_id`, `exam_center_id`, `exam_date`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-12-21 07:20:45', 'active', NULL, '2021-12-21 07:20:43', NULL),
(2, 1, 1, '2022-12-22 07:20:45', 'active', NULL, '2021-12-21 07:20:43', NULL),
(3, 1, 1, '2022-12-22 07:20:45', 'active', NULL, '2021-12-21 07:20:43', NULL),
(4, 1, 1, '2022-12-23 07:20:45', 'active', NULL, '2021-12-21 07:20:43', NULL),
(5, 1, 1, '2022-12-24 07:20:45', 'active', NULL, '2021-12-21 07:20:43', NULL),
(6, 1, 1, '2022-12-25 07:20:45', 'active', NULL, '2021-12-21 07:20:43', NULL),
(7, 1, 1, '2022-12-26 07:20:45', 'active', NULL, '2021-12-21 07:20:43', NULL),
(8, 1, 1, '2022-12-27 07:20:45', 'active', NULL, '2021-12-21 07:20:43', NULL),
(9, 1, 1, '2022-12-28 07:20:45', 'active', NULL, '2021-12-21 07:20:43', NULL),
(10, 1, 1, '2022-12-29 07:20:45', 'active', NULL, '2021-12-21 07:20:43', NULL),
(11, 1, 1, '2022-12-30 07:20:45', 'active', NULL, '2021-12-21 07:20:43', NULL),
(12, 1, 2, '2022-12-21 07:20:45', 'active', NULL, '2021-12-21 07:20:43', NULL),
(13, 1, 2, '2022-12-22 07:20:45', 'active', NULL, '2021-12-21 07:20:43', NULL),
(14, 1, 2, '2022-12-22 07:20:45', 'active', NULL, '2021-12-21 07:20:43', NULL),
(15, 1, 2, '2022-12-23 07:20:45', 'active', NULL, '2021-12-21 07:20:43', NULL),
(16, 1, 2, '2022-12-24 07:20:45', 'active', NULL, '2021-12-21 07:20:43', NULL),
(17, 1, 2, '2022-12-25 07:20:45', 'active', NULL, '2021-12-21 07:20:43', NULL),
(18, 1, 2, '2022-12-26 07:20:45', 'active', NULL, '2021-12-21 07:20:43', NULL),
(19, 1, 2, '2022-12-27 07:20:45', 'active', NULL, '2021-12-21 07:20:43', NULL),
(20, 1, 2, '2022-12-28 07:20:45', 'active', NULL, '2021-12-21 07:20:43', NULL),
(21, 1, 2, '2022-12-29 07:20:45', 'active', NULL, '2021-12-21 07:20:43', NULL),
(22, 1, 2, '2022-12-30 07:20:45', 'active', NULL, '2021-12-21 07:20:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exam_calendar_timeslots`
--

CREATE TABLE `exam_calendar_timeslots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_calender_id` int(11) NOT NULL,
  `time_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_begins_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_end_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_calendar_timeslots`
--

INSERT INTO `exam_calendar_timeslots` (`id`, `exam_calender_id`, `time_from`, `time_to`, `exam_begins_at`, `exam_end_at`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '08:00 AM', '12:00 AM', '08:00 AM', '12:00 AM', NULL, NULL, NULL, NULL),
(2, 1, '02:00 AM', '06:00 PM', '02:00 AM', '06:00 PM', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exam_centers`
--

CREATE TABLE `exam_centers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int(11) NOT NULL,
  `longitude` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_centers`
--

INSERT INTO `exam_centers` (`id`, `name`, `email`, `phone_number`, `address`, `capacity`, `longitude`, `latitude`, `city_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Exam Center 01', 'examcenter01@app.com', '03211234567', '488, Y، Block, Phase-III Sector Y DHA Phase 3, Lahore', 300, NULL, NULL, 1, 'active', NULL, NULL, NULL),
(2, 'Exam Center 02', 'examcenter02@app.com', '03211234569', '488, Y، Block, Phase-III Sector Y DHA Phase 3, Lahore', 300, NULL, NULL, 1, 'active', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exam_registrations`
--

CREATE TABLE `exam_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `exam_center_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` int(11) NOT NULL,
  `exam_calendar_timeslot_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `challan_picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `challan_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_paid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biometric_verified` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `arrived_at` timestamp NULL DEFAULT NULL,
  `exam_password` int(11) DEFAULT NULL,
  `seat_no` int(11) DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_registrations`
--

INSERT INTO `exam_registrations` (`id`, `user_id`, `exam_center_id`, `city_id`, `exam_calendar_timeslot_id`, `payment_method`, `challan_picture`, `challan_number`, `reg_number`, `is_paid`, `biometric_verified`, `paid_date`, `arrived_at`, `exam_password`, `seat_no`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(700, 1, 1, 1, 1, 'MCB Online', '', '12345678', '100000700', 'Y', NULL, '2022-01-04 05:39:05', NULL, NULL, NULL, 'active', NULL, '2021-12-21 07:10:15', '2021-12-22 05:38:15'),
(701, 1, 1, 1, 1, 'MCB Online', '', '', '100000701', 'Y', NULL, '2021-12-22 15:04:42', '2021-12-22 10:03:58', 14764842, 2, 'active', NULL, '2021-12-22 05:03:06', '2021-12-22 10:04:42'),
(702, 1, 1, 1, 2, 'MCB Online', '', '', '100000702', 'Y', NULL, '2021-12-22 14:57:08', '2021-12-22 09:57:08', 28053426, NULL, 'active', NULL, '2021-12-22 06:25:01', '2021-12-22 09:57:08'),
(703, 1, 1, 1, 1, '', '', '', '', '', NULL, '2021-12-22 12:29:15', NULL, NULL, NULL, 'active', NULL, '2021-12-22 06:41:37', '2021-12-22 06:41:37'),
(704, 1, 1, 1, 2, 'MCB Online', '', '', '100000704', 'Y', NULL, '2021-12-22 14:43:57', '2021-12-22 09:43:57', 28157394, 1, 'active', NULL, '2021-12-22 07:45:17', '2021-12-22 09:43:57'),
(705, 1, 1, 1, 1, 'MCB Online', '', '222222', '100000705', 'Y', NULL, '2022-01-04 05:39:24', '2021-12-23 01:48:27', 43470789, 3, 'active', NULL, '2021-12-23 01:05:47', '2021-12-23 01:48:35'),
(706, 1, 1, 1, 2, '', '', '', '', '', NULL, '2022-01-06 10:48:54', NULL, NULL, NULL, 'active', NULL, '2022-01-06 05:48:54', '2022-01-06 05:48:54');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_08_140720_create_exams_table', 1),
(6, '2021_12_09_093812_create_exam_centers_table', 1),
(7, '2021_12_09_094931_create_exam_calendars_table', 1),
(8, '2021_12_09_095252_create_exam_calendar_timeslots_table', 1),
(9, '2021_12_15_054856_create_countries_table', 1),
(10, '2021_12_15_055342_create_states_table', 1),
(11, '2021_12_15_055402_create_cities_table', 1),
(15, '2021_12_16_050128_create_cadidate_documents_table', 2),
(16, '2021_12_16_083147_add_user_type_to_users_table', 2),
(17, '2021_12_16_125416_create_exam_registrations_table', 2),
(18, '2021_12_21_070918_add_capacity_to_exam_centers_table', 3),
(19, '2021_12_21_110447_alter_table_exam_calendar_timeslots_change_columns', 4),
(23, '2021_12_21_113034_add_columns_to_exam_registrations_table', 5),
(24, '2021_12_21_181125_laratrust_setup_tables', 6),
(33, '2021_12_22_045545_add_payment_method_to_exam_registration_table', 7),
(34, '2021_12_22_050115_add_challan_picture_to_exam_registrations_table', 7),
(35, '2021_12_22_050134_add_challan_number_to_exam_registrations_table', 7),
(36, '2021_12_22_050149_add_reg_roll_number_to_exam_registrations_table', 7),
(37, '2021_12_22_063617_add_exam_fee_to_exams_table', 7),
(39, '2021_12_22_132805_add_attendance_time_password_to_exam_registrations_table', 8),
(40, '2021_12_28_114002_add_country_to_users_table', 9),
(41, '2021_12_29_120458_create_examinar_exam_centers_table', 10),
(42, '2021_12_29_121317_add_biometric_verified_to_exam_registrations_table', 10),
(43, '2021_12_16_050128_create_candidate_documents_table', 11),
(44, '2021_12_29_120458_create_examiner_exam_centers_table', 11),
(45, '2021_12_30_064634_rename_candidate_table', 11),
(46, '2021_12_30_071150_add_cnic_pic_to_users_table', 11);

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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'users-create', 'Create Users', 'Create Users', '2021-12-21 13:22:17', '2021-12-21 13:22:17'),
(2, 'users-read', 'Read Users', 'Read Users', '2021-12-21 13:22:17', '2021-12-21 13:22:17'),
(3, 'users-update', 'Update Users', 'Update Users', '2021-12-21 13:22:17', '2021-12-21 13:22:17'),
(4, 'users-delete', 'Delete Users', 'Delete Users', '2021-12-21 13:22:17', '2021-12-21 13:22:17'),
(5, 'profile-read', 'Read Profile', 'Read Profile', '2021-12-21 13:22:17', '2021-12-21 13:22:17'),
(6, 'profile-update', 'Update Profile', 'Update Profile', '2021-12-21 13:22:17', '2021-12-21 13:22:17'),
(7, 'module_1_name-create', 'Create Module_1_name', 'Create Module_1_name', '2021-12-21 13:22:17', '2021-12-21 13:22:17'),
(8, 'module_1_name-read', 'Read Module_1_name', 'Read Module_1_name', '2021-12-21 13:22:17', '2021-12-21 13:22:17'),
(9, 'module_1_name-update', 'Update Module_1_name', 'Update Module_1_name', '2021-12-21 13:22:17', '2021-12-21 13:22:17'),
(10, 'module_1_name-delete', 'Delete Module_1_name', 'Delete Module_1_name', '2021-12-21 13:22:17', '2021-12-21 13:22:17');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(5, 3),
(6, 1),
(6, 2),
(6, 3),
(7, 4),
(8, 4),
(9, 4),
(10, 4);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superadministrator', 'Superadministrator', 'Superadministrator', '2021-12-21 13:22:17', '2021-12-21 13:22:17'),
(2, 'administrator', 'Administrator', 'For Exam Center', '2021-12-21 13:22:17', '2021-12-21 13:22:17'),
(3, 'user', 'User', 'User', '2021-12-21 13:22:17', '2021-12-21 13:22:17'),
(4, 'examiner', 'Examiner', 'Exam center user access', '2021-12-21 13:22:17', '2021-12-21 13:22:17');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(3, 1, 'App\\Models\\User'),
(2, 6, 'App\\Models\\User'),
(4, 7, 'App\\Models\\User'),
(3, 8, 'App\\Models\\User'),
(3, 9, 'App\\Models\\User'),
(3, 10, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Punjab', 'active', NULL, NULL, NULL),
(2, 1, 'Sindh', 'active', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `state_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `city_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urdu_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnic_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnic_expire_date` timestamp NULL DEFAULT NULL,
  `cnic_front_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnic_back_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'candidate',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_verified_at` timestamp NULL DEFAULT NULL,
  `nadra_verified_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `country_id`, `state_id`, `city_id`, `name`, `urdu_name`, `gender`, `father_name`, `mobile_number`, `cnic_number`, `cnic_expire_date`, `cnic_front_img`, `cnic_back_img`, `email`, `user_type`, `email_verified_at`, `password`, `status`, `profile_picture`, `mobile_verified_at`, `nadra_verified_at`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Noman Ahmed', NULL, 'Male', 'Fazal Ahmed', '923319636193', '3840389530947', NULL, 'GymYXMkuq6w3M6SfqPtfxqGdNLGYpoUJ.jpeg', 'UdhoCiIl1dpjjmy4AWhANtLLgvMm56CK.jpeg', 'noman.ahmed1408@gmail.com', 'candidate', '2021-12-17 09:01:50', '$2y$10$zrUCF6R8Uc1U9abRBbNnZOGBhC9aErgbJFgh0YD8StcFgr6vdidrS', NULL, 'A6SjBO3nzslJbwHiSjOMkEp8HDRtjOWa.png', NULL, NULL, NULL, NULL, '2021-12-16 01:46:53', '2022-01-07 05:50:20'),
(5, 1, 1, 1, 'Noman Ahmed', NULL, 'Male', NULL, '03319636192', '3840389530943', NULL, NULL, NULL, 'noman.ahmed148@gmail.com', 'candidate', '2021-12-17 00:03:17', '$2y$10$Eyk0Yaisyj/mM8WsvaJTL.K3cwcwb9zGAOJd34iL7msXywBDYtdkK', NULL, '0FSAXPbXFXeeX5eI5XTfrQzB8IIY063q.jpg', NULL, NULL, NULL, NULL, '2021-12-17 00:02:39', '2021-12-17 00:03:17'),
(6, 1, 1, 1, 'Admin', NULL, 'Male', 'Super Admin', '0321456778', '38403895', NULL, NULL, NULL, 'admin@app.com', 'administrator', '2021-12-17 00:10:33', '$2y$10$B7QCUtiydPCF9tLBxkpIXeSj1u.3ZoWunrm.JQcXpOBWKVPsRehA.', NULL, '0FSAXPbXFXeeX5eI5XTfrQzB8IIY063q.jpg', NULL, NULL, NULL, NULL, '2021-12-17 00:06:46', '2021-12-17 00:12:31'),
(7, 1, 1, 1, 'Examinar User', NULL, 'Male', NULL, '03147736177', '3510105393513', NULL, NULL, NULL, 'examinar@app.com', 'candidate', '2021-12-29 00:52:43', '$2y$10$B7QCUtiydPCF9tLBxkpIXeSj1u.3ZoWunrm.JQcXpOBWKVPsRehA.', NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-29 00:52:14', '2021-12-29 00:52:43'),
(9, 1, 1, 1, 'Noman Ahmed', NULL, 'Male', NULL, '03319636193', '3840389530949', NULL, NULL, NULL, 'noman@beaconhousetechnology.com', 'candidate', '2022-01-03 06:48:07', '$2y$10$j3fMWXnpTfqWdYnTQAUEDui8JPLr8S1z3YguDJC8fGKBmnskMEHae', NULL, 'GoaUJHteSkmiFoDGpJJJR4QTO1AO4hXh.png', NULL, NULL, NULL, NULL, '2022-01-03 00:29:29', '2022-01-03 01:53:46'),
(10, 1, 1, 1, 'Noman Ahmed', NULL, 'Male', NULL, '03128204060', '3840389530974', NULL, NULL, NULL, 'umair@beaconhousetechnology.com', 'candidate', '2022-01-05 11:52:29', '$2y$10$R09/pzZ07W/9lsOzoU7nmOiEC1B9/.ZRS.bifyaKighCTwau6JJz2', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-05 06:51:21', '2022-01-05 06:51:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cadidate_documents_old`
--
ALTER TABLE `cadidate_documents_old`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cadidate_documents_user_id_foreign` (`user_id`);

--
-- Indexes for table `candidate_documents`
--
ALTER TABLE `candidate_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidate_documents_user_id_foreign` (`user_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_state_id_foreign` (`state_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examiner_exam_centers`
--
ALTER TABLE `examiner_exam_centers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `examiner_exam_centers_user_id_foreign` (`user_id`),
  ADD KEY `examiner_exam_centers_exam_center_id_foreign` (`exam_center_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_calendars`
--
ALTER TABLE `exam_calendars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_calendar_timeslots`
--
ALTER TABLE `exam_calendar_timeslots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_centers`
--
ALTER TABLE `exam_centers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exam_centers_email_unique` (`email`),
  ADD UNIQUE KEY `exam_centers_phone_number_unique` (`phone_number`);

--
-- Indexes for table `exam_registrations`
--
ALTER TABLE `exam_registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_registrations_user_id_foreign` (`user_id`),
  ADD KEY `exam_registrations_exam_center_id_foreign` (`exam_center_id`),
  ADD KEY `exam_registrations_exam_calendar_timeslot_id_foreign` (`exam_calendar_timeslot_id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

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
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_country_id_foreign` (`country_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_mobile_number_unique` (`mobile_number`),
  ADD UNIQUE KEY `users_cnic_number_unique` (`cnic_number`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_country_id_foreign` (`country_id`),
  ADD KEY `users_state_id_foreign` (`state_id`),
  ADD KEY `users_city_id_foreign` (`city_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cadidate_documents_old`
--
ALTER TABLE `cadidate_documents_old`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `candidate_documents`
--
ALTER TABLE `candidate_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `examiner_exam_centers`
--
ALTER TABLE `examiner_exam_centers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exam_calendars`
--
ALTER TABLE `exam_calendars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `exam_calendar_timeslots`
--
ALTER TABLE `exam_calendar_timeslots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exam_centers`
--
ALTER TABLE `exam_centers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exam_registrations`
--
ALTER TABLE `exam_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=707;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cadidate_documents_old`
--
ALTER TABLE `cadidate_documents_old`
  ADD CONSTRAINT `cadidate_documents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `candidate_documents`
--
ALTER TABLE `candidate_documents`
  ADD CONSTRAINT `candidate_documents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Constraints for table `examiner_exam_centers`
--
ALTER TABLE `examiner_exam_centers`
  ADD CONSTRAINT `examiner_exam_centers_exam_center_id_foreign` FOREIGN KEY (`exam_center_id`) REFERENCES `exam_centers` (`id`),
  ADD CONSTRAINT `examiner_exam_centers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `exam_registrations`
--
ALTER TABLE `exam_registrations`
  ADD CONSTRAINT `exam_registrations_exam_calendar_timeslot_id_foreign` FOREIGN KEY (`exam_calendar_timeslot_id`) REFERENCES `exam_calendar_timeslots` (`id`),
  ADD CONSTRAINT `exam_registrations_exam_center_id_foreign` FOREIGN KEY (`exam_center_id`) REFERENCES `exam_centers` (`id`),
  ADD CONSTRAINT `exam_registrations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `users_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `users_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
