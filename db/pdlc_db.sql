-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 22, 2022 at 09:00 AM
-- Server version: 10.5.9-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdlc_db`
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
  `institute_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roll_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_marks` int(11) NOT NULL,
  `obtain_marks` decimal(8,2) DEFAULT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passing_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_of_admission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percentage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate_documents`
--

INSERT INTO `candidate_documents` (`id`, `user_id`, `academic_achievement`, `institute_name`, `roll_number`, `total_marks`, `obtain_marks`, `grade`, `passing_year`, `document`, `status`, `grade_type`, `year_of_admission`, `percentage`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'intermediate', '', 'BSELF1802', 100, '90.00', 'A', '2021', 'F50O1ego9xvL5xcY0qZB484ArDXJpWBH.jpeg', 'active', NULL, NULL, NULL, NULL, '2022-01-07 06:00:44', '2022-01-07 06:00:44'),
(2, 11, 'bachelors', '', '12121212', 12, '12.00', 'A', '2012', 'TOz0BusXMp4UWi4JrqaDkRDNKyWZeXWz.pdf', 'active', NULL, NULL, NULL, NULL, '2022-03-28 05:54:32', '2022-03-28 05:54:32'),
(4, 16, 'martic', 'BISE Lahore', '112200', 1100, '864.00', 'A', '2014', 'IR3s2yglpE74GMOvYvYjxrCvZfGcfw1h.pdf', 'active', NULL, NULL, NULL, NULL, '2022-03-30 05:09:30', '2022-03-30 05:09:30'),
(5, 18, 'martic', 'BISE Lahore', '112200', 1100, '864.00', 'A', '2014', 'T0TD2vKW6FFiCU7YURVA0KfsWUA5WmqX.pdf', 'active', NULL, NULL, NULL, NULL, '2022-03-30 06:49:45', '2022-03-30 06:49:45'),
(6, 16, 'intermediate', 'BISE Lahore', '112255', 1100, '784.00', 'A', '2016', 'Ngtga8zPttX3YcX4aiJcQ0WFMY8XTIHY.pdf', 'active', NULL, NULL, NULL, NULL, '2022-04-06 01:49:58', '2022-04-06 01:49:58'),
(7, 16, 'bachelors', 'COMSATS Lahore', '028', 4, '3.00', 'A', '2021', 'DzxNTuqKLZ8EhSFDiAzAaDE8BK9Cb2I4.pdf', 'active', NULL, NULL, NULL, NULL, '2022-04-06 01:50:39', '2022-04-06 01:50:39'),
(8, 1, 'bachelors', 'COMSATS Lahore', '028', 4, '3.00', 'A', '2021', '4LnFh9l53ntcncnbL2Zs07RmLle0r0yD.pdf', 'active', NULL, NULL, NULL, NULL, '2022-04-06 05:44:27', '2022-04-06 05:44:27'),
(10, 17, 'intermediate', 'Govt Gordon College', '7062', 1100, '780.00', 'A', '2002', 'TdZGAAREqwQGdMyz64lpERSuYT5nqiHv.jpg', 'active', 'percentage', '2000', '70.9090909090909', NULL, '2022-04-08 23:35:06', '2022-04-08 23:35:06'),
(11, 21, 'bachelors', 'UMT', '12003065476', 4, '2.93', NULL, '2016', 'v0fSwHHTVGB7EeWkUh0qdsLYKzYJYU1I.pdf', 'active', 'cgpa', '2012', NULL, NULL, '2022-04-14 05:28:00', '2022-04-14 05:28:00'),
(12, 17, 'bachelors', 'Punjab University', '12345', 800, '459.00', 'B', '2006', 'b1IPpUBuPCTXxMeRddtwGrCLRfaYzmTe.jpg', 'active', 'percentage', '2004', '57.38', NULL, '2022-04-16 04:39:57', '2022-04-16 04:39:57'),
(13, 24, 'martic', 'BISE Lahore', '112255', 1100, '864.00', 'A', '2014', 'CU3h83TX2RPlzYsE2luTt1mEA735BUsG.pdf', 'active', 'percentage', '2012', '78.55', NULL, '2022-04-18 00:23:18', '2022-04-18 00:23:18'),
(14, 24, 'intermediate', 'BISE Lahore', '112200', 1100, '784.00', 'A', '2016', '6BVNMWILI4GlMRj8SV6d9EO0LFDkYzYo.pdf', 'active', 'percentage', '2014', '71.27', NULL, '2022-04-18 00:23:46', '2022-04-18 00:23:46'),
(15, 24, 'bachelors', 'COMSATS Lahore', 'SP17-BCS-028', 4, '2.80', NULL, '2021', 'TJ1TO9NFqx7KmU35jf8WQAAnK7MTbtMa.pdf', 'active', 'cgpa', '2017', NULL, NULL, '2022-04-18 00:24:41', '2022-04-18 00:24:41');

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
(3, 1, 'Faisalabad', 'active', NULL, NULL, NULL),
(4, 2, 'Karachi', 'active', NULL, NULL, NULL),
(5, 2, 'Hyderabad', 'active', NULL, NULL, NULL);

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
-- Table structure for table `desk_services`
--

CREATE TABLE `desk_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `to_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_body` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `desk_services`
--

INSERT INTO `desk_services` (`id`, `user_id`, `to_email`, `email_subject`, `email_body`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 17, 'taimoor.khan@bh.edu.pk', 'asd', '<p>asd</p>', 'active', NULL, '2022-04-08 23:36:51', '2022-04-08 23:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abbreviation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `abbreviation`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Badin', NULL, NULL, NULL, NULL),
(2, 'Dadu', NULL, NULL, NULL, NULL),
(3, 'Ghotki', NULL, NULL, NULL, NULL),
(4, 'Hyderabad', NULL, NULL, NULL, NULL),
(5, 'Jamshoro', NULL, NULL, NULL, NULL),
(6, 'Karachi Central', NULL, NULL, NULL, NULL),
(7, 'Karachi East', NULL, NULL, NULL, NULL),
(8, 'Karachi West', NULL, NULL, NULL, NULL),
(9, 'Karachi South', NULL, NULL, NULL, NULL),
(10, 'Karachi Korangi', NULL, NULL, NULL, NULL),
(11, 'Karachi Malir', NULL, NULL, NULL, NULL),
(12, 'Jacobabad', NULL, NULL, NULL, NULL),
(13, 'Kashmore', NULL, NULL, NULL, NULL),
(14, 'Khairpur', NULL, NULL, NULL, NULL),
(15, 'Larkana', NULL, NULL, NULL, NULL),
(16, 'Mitiari', NULL, NULL, NULL, NULL),
(17, 'Mirpur Khas', NULL, NULL, NULL, NULL),
(18, 'Naushahro Feroze', NULL, NULL, NULL, NULL),
(19, 'Shaheed Benazirabad', NULL, NULL, NULL, NULL),
(20, 'Qambar Shahdadkot', NULL, NULL, NULL, NULL),
(21, 'Sanghar', NULL, NULL, NULL, NULL),
(22, 'Shikarpur', NULL, NULL, NULL, NULL),
(23, 'Sukkur', NULL, NULL, NULL, NULL),
(24, 'Tando Allahyar', NULL, NULL, NULL, NULL),
(25, 'Tando Muhammad Khan', NULL, NULL, NULL, NULL),
(26, 'Tharparkar', NULL, NULL, NULL, NULL),
(27, 'Thatta ', NULL, NULL, NULL, NULL),
(28, 'Umerkot', NULL, NULL, NULL, NULL),
(29, 'Sujawal', NULL, NULL, NULL, NULL);

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
  `exam_reg_start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_reg_end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `exam_title`, `exam_description`, `exam_fee`, `exam_start_date`, `exam_end_date`, `exam_reg_start_date`, `exam_reg_end_date`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'MDCAT Exam 2022', 'MDCAT Exam', 6000, '2021-12-23 05:34:25', '2022-01-26 05:34:28', NULL, NULL, 'active', NULL, NULL, NULL),
(2, 'MDCAT Exam 2021', NULL, 6000, '2022-01-09 19:00:00', '2022-01-30 19:00:00', NULL, NULL, 'active', NULL, '2022-01-10 05:40:05', '2022-01-10 05:40:05');

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
-- Table structure for table `institutions`
--

CREATE TABLE `institutions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `institutions`
--

INSERT INTO `institutions` (`id`, `name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'BISE Lahore', 'active', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_announcements`
--

CREATE TABLE `job_announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_education` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_max_age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_selection_criteria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_postal_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_add_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `city_names` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_valid_till` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_announcements`
--

INSERT INTO `job_announcements` (`id`, `job_title`, `job_description`, `job_education`, `job_max_age`, `job_selection_criteria`, `job_email`, `job_postal_address`, `job_add_image`, `state_id`, `city_names`, `job_valid_till`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'Teaching Support Associates', 'Teaching Support Associates play the role of change agents, contributing to changing conventional teaching methodologies and student engagement. They teach at classroom level with focus on English, Maths, and Science, prepare lesson plans, and use Technology for a strong transfer of conceptual knowledge. Moreover, they work on the capacity building and mentorship of teachers for sustaining the academic improvement in line with the SEF’s overall quality framework. On administrative side, they track the students’ performance, lesson plans and activities, and help the subject teachers and Head Teachers in adapting to the changing roles of teachers in schools.', '16 years of Education', '28', 'Test', 'apply.careers@careers.com', 'Middle High School, Sindh', 'nQsRnH2K98DJEAYN6JObpQl7jQxtWias.jpg', 2, 'Karachi , Hyderabad', '2022-05-20', '2022-04-06 01:42:38', '2022-04-18 04:19:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_announcement_skills`
--

CREATE TABLE `job_announcement_skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `skill_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_announcement_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `is_shortlisted` tinyint(1) DEFAULT NULL,
  `shortlisted_at` date DEFAULT NULL,
  `shortlisted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `invitation_sent` tinyint(1) DEFAULT NULL,
  `invitation_sent_by` bigint(20) UNSIGNED DEFAULT NULL,
  `invitation_sent_at` date DEFAULT NULL,
  `sms_sent` tinyint(1) DEFAULT NULL,
  `sms_sent_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_sent_at` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_prefrences`
--

CREATE TABLE `job_prefrences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_application_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `taluka_id` bigint(20) UNSIGNED NOT NULL,
  `union_council` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `union_council_id` bigint(20) UNSIGNED DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
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
(46, '2021_12_30_071150_add_cnic_pic_to_users_table', 11),
(47, '2022_01_07_051104_create_desk_services_table', 12),
(48, '2022_01_07_075650_add_mobile_verification_code_to_users_table', 12),
(49, '2022_01_10_090525_add_exam_reg_start_end_date_to_exams_table', 12),
(50, '2022_01_10_092205_create_institutions_table', 12),
(51, '2022_01_10_114442_update_institute_foreign_candidate_documents', 12),
(52, '2022_03_22_120936_create_job_announcements_table', 12),
(53, '2022_03_22_123031_create_skills_table', 12),
(54, '2022_03_22_124520_create_job_announcement_skills_table', 12),
(55, '2022_03_24_051240_create_job_applications_table', 12),
(56, '2022_03_24_111918_create_user_experiences_table', 12),
(57, '2022_03_24_174656_add_columns_to_users', 12),
(58, '2022_03_30_071051_add_drop_institute_id_to_candidate_documents__table', 13),
(59, '2022_03_30_104505_add_drop_city_id_to_job_announcements__table', 14),
(60, '2022_04_01_114620_add_experience_number_of_years_to_users', 14),
(61, '2022_04_04_060126_create_districts_table', 14),
(62, '2022_04_04_060219_create_talukas_table', 14),
(63, '2022_04_04_060254_create_union_councils_table', 14),
(64, '2022_04_04_060309_create_schools_table', 14),
(65, '2022_04_05_051323_create_job_prefrences_table', 14),
(66, '2022_04_07_062746_add_religion_sef_employee_to_users', 15),
(67, '2022_04_07_065302_add_status_to_job_applications', 15),
(68, '2022_04_07_091020_create_user_certificates_table', 15),
(69, '2022_04_07_113325_add_columns_to_candidate_documents', 15),
(70, '2022_04_10_193848_add_domicile_to_users', 16),
(71, '2022_04_15_062226_add_union_council_to_users', 17),
(72, '2022_04_15_062402_add_union_council_to_job_prefrences', 17),
(73, '2022_04_18_064834_add_image_to_job_announcements', 18);

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
(3, 5, 'App\\Models\\User'),
(2, 6, 'App\\Models\\User'),
(4, 7, 'App\\Models\\User'),
(3, 8, 'App\\Models\\User'),
(3, 9, 'App\\Models\\User'),
(3, 10, 'App\\Models\\User'),
(3, 11, 'App\\Models\\User'),
(3, 15, 'App\\Models\\User'),
(3, 16, 'App\\Models\\User'),
(3, 17, 'App\\Models\\User'),
(3, 18, 'App\\Models\\User'),
(3, 19, 'App\\Models\\User'),
(3, 20, 'App\\Models\\User'),
(3, 21, 'App\\Models\\User'),
(3, 22, 'App\\Models\\User'),
(3, 23, 'App\\Models\\User'),
(3, 24, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `union_council_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `address`, `union_council_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Muhammad Urs Kalhoro Elementary Public School', NULL, NULL, NULL, NULL, NULL),
(2, 'Falcon Model School', NULL, NULL, NULL, NULL, NULL),
(3, 'The Little Star Public School', NULL, NULL, NULL, NULL, NULL),
(4, 'Farida Model School', NULL, NULL, NULL, NULL, NULL),
(5, 'Fatima Public School', NULL, NULL, NULL, NULL, NULL),
(6, 'Zainab Model School', NULL, NULL, NULL, NULL, NULL),
(7, 'Kiran Public School', NULL, NULL, NULL, NULL, NULL),
(8, ' Pak Care Fellowship School', NULL, NULL, NULL, NULL, NULL),
(9, 'Hamza Public School', NULL, NULL, NULL, NULL, NULL),
(10, 'Al Majeed Fellowship School', NULL, NULL, NULL, NULL, NULL),
(11, 'Al-Atta Fellowship School', NULL, NULL, NULL, NULL, NULL),
(12, 'Al Meraj Fellowship School', NULL, NULL, NULL, NULL, NULL),
(13, 'Dream Model Street School', NULL, NULL, NULL, NULL, NULL),
(14, 'Ittehad-Ul-Ellm Fellowship Elementary School', NULL, NULL, NULL, NULL, NULL),
(15, 'Noor Ul Ilim Fellowship School', NULL, NULL, NULL, NULL, NULL),
(16, 'Tamir-E-Nou Fellowship School', NULL, NULL, NULL, NULL, NULL),
(17, 'Al Mamoon Grammar Secondary School', NULL, NULL, NULL, NULL, NULL),
(18, 'Patel Education Foundation School', NULL, NULL, NULL, NULL, NULL),
(19, 'Star Fellow Ship ', NULL, NULL, NULL, NULL, NULL),
(20, 'Roshan Fellowship School', NULL, NULL, NULL, NULL, NULL),
(21, 'Abdul Karim Fellowship School', NULL, NULL, NULL, NULL, NULL),
(22, 'Al Khyber Fellowship School', NULL, NULL, NULL, NULL, NULL),
(23, 'Rahat Chachar Welfare Sec School', NULL, NULL, NULL, NULL, NULL),
(24, 'Faizi Academy', NULL, NULL, NULL, NULL, NULL),
(25, 'Hassan Dawani Model School', NULL, NULL, NULL, NULL, NULL),
(26, 'Ali Nawaz Jokhio School', NULL, NULL, NULL, NULL, NULL),
(27, 'Morand Khan Qaisrani School', NULL, NULL, NULL, NULL, NULL),
(28, 'Fazal Future Developer School', NULL, NULL, NULL, NULL, NULL),
(29, 'Gulshan-e-Ghazi Elementary School ', NULL, NULL, NULL, NULL, NULL),
(30, 'Govt Elementary School Arqania ', NULL, NULL, NULL, NULL, NULL),
(31, 'Ghaziabad Elementary School', NULL, NULL, NULL, NULL, NULL),
(32, 'Lalshahbaz Negar Elementary School', NULL, NULL, NULL, NULL, NULL),
(33, 'Mansira Colony Elementary School', NULL, NULL, NULL, NULL, NULL),
(34, 'Sector 09C Govt Elementary School', NULL, NULL, NULL, NULL, NULL),
(35, 'Itehad Town Govt Elementary School', NULL, NULL, NULL, NULL, NULL),
(36, 'Bibi Amna Fellowship School', NULL, NULL, NULL, NULL, NULL),
(37, 'Tayaba Fellowship School', NULL, NULL, NULL, NULL, NULL),
(38, 'Anwer\'s School', NULL, NULL, NULL, NULL, NULL),
(39, 'The High Talent Academy', NULL, NULL, NULL, NULL, NULL),
(40, 'Lar Elementary Public School ', NULL, NULL, NULL, NULL, NULL),
(41, 'Ram Kolhi Public School', NULL, NULL, NULL, NULL, NULL),
(42, 'Innovative Public School Kadhan ', NULL, NULL, NULL, NULL, NULL),
(43, 'Indus Vellly  Public School ', NULL, NULL, NULL, NULL, NULL),
(44, 'Muslim Hands Elementary School at Khorwaha Chok', NULL, NULL, NULL, NULL, NULL),
(45, 'Soofi Asghar Khoso High School Jhuddo', NULL, NULL, NULL, NULL, NULL),
(46, 'Future Bright High School', NULL, NULL, NULL, NULL, NULL),
(47, 'The Hope High School', NULL, NULL, NULL, NULL, NULL),
(48, 'Baba Mana Public School', NULL, NULL, NULL, NULL, NULL),
(49, 'Sachal Sarmast Public School', NULL, NULL, NULL, NULL, NULL),
(50, 'Rbcs Shafi Muhammad Khaskheli', NULL, NULL, NULL, NULL, NULL),
(51, 'Champion School System', NULL, NULL, NULL, NULL, NULL),
(52, 'The Shining Star Academy', NULL, NULL, NULL, NULL, NULL),
(53, 'Ms School System Khaan Campus', NULL, NULL, NULL, NULL, NULL),
(54, 'Ms School System', NULL, NULL, NULL, NULL, NULL),
(55, 'Bright Future Public School', NULL, NULL, NULL, NULL, NULL),
(56, 'Ghazali Best School', NULL, NULL, NULL, NULL, NULL),
(57, 'Sindh Educate Primary School', NULL, NULL, NULL, NULL, NULL),
(58, 'Choudhrybashir Public School', NULL, NULL, NULL, NULL, NULL),
(59, 'The Allied School', NULL, NULL, NULL, NULL, NULL),
(60, 'SEF Public High School', NULL, NULL, NULL, NULL, NULL),
(61, 'Azad Public High School', NULL, NULL, NULL, NULL, NULL),
(62, 'Primary School Qasim Wighio', NULL, NULL, NULL, NULL, NULL),
(63, 'Kiran Public Elementary School', NULL, NULL, NULL, NULL, NULL),
(64, 'Al-Mairaj Model Elem: School', NULL, NULL, NULL, NULL, NULL),
(65, 'Ali Model Elementary School', NULL, NULL, NULL, NULL, NULL),
(66, 'Tawakal Elementary School ', NULL, NULL, NULL, NULL, NULL),
(67, 'Hira Public Elementary School Ghatti Stop', NULL, NULL, NULL, NULL, NULL),
(68, 'Girls Middle School Fateh Muhammad Arain ', NULL, NULL, NULL, NULL, NULL),
(69, 'MPHS Padidan Station', NULL, NULL, NULL, NULL, NULL),
(70, 'Azad Public School', NULL, NULL, NULL, NULL, NULL),
(71, 'Sachal Community Model School', NULL, NULL, NULL, NULL, NULL),
(72, 'Oxford Model English Medium School ', NULL, NULL, NULL, NULL, NULL),
(73, 'Abid Public School', NULL, NULL, NULL, NULL, NULL),
(74, 'Elementary School Hakeem Khoso', NULL, NULL, NULL, NULL, NULL),
(75, 'The Star Shining School', NULL, NULL, NULL, NULL, NULL),
(76, 'Mehran Education Academy', NULL, NULL, NULL, NULL, NULL),
(77, 'Udero Lal Model Educational Academy', NULL, NULL, NULL, NULL, NULL),
(78, 'The Sky English Medium School', NULL, NULL, NULL, NULL, NULL),
(79, 'Jahan Khan FSP', NULL, NULL, NULL, NULL, NULL),
(80, 'Sobho Khan Fellowship School', NULL, NULL, NULL, NULL, NULL),
(81, 'Syed Shah Dino Shah Girls School', NULL, NULL, NULL, NULL, NULL),
(82, 'Shah Habib FSP', NULL, NULL, NULL, NULL, NULL),
(83, 'Latif FSP', NULL, NULL, NULL, NULL, NULL),
(84, 'City Primary School ', NULL, NULL, NULL, NULL, NULL),
(85, 'Saima Siddiqa Public School ', NULL, NULL, NULL, NULL, NULL),
(86, 'Sultan Memorial School', NULL, NULL, NULL, NULL, NULL),
(87, 'Aas Kids Model School', NULL, NULL, NULL, NULL, NULL),
(88, 'Aakash Public School', NULL, NULL, NULL, NULL, NULL),
(89, 'Indus Bright Future School', NULL, NULL, NULL, NULL, NULL),
(90, 'Mashal Public School', NULL, NULL, NULL, NULL, NULL),
(91, 'Indus Bright Future School', NULL, NULL, NULL, NULL, NULL),
(92, 'Indus Bright Future School', NULL, NULL, NULL, NULL, NULL),
(93, 'Indus Bright Future School', NULL, NULL, NULL, NULL, NULL),
(94, 'Indus Bright Future School', NULL, NULL, NULL, NULL, NULL),
(95, 'Decent Public School Turkish Colony', NULL, NULL, NULL, NULL, NULL),
(96, 'Saleh English Grammar School', NULL, NULL, NULL, NULL, NULL),
(97, 'Decent Public School Datar Nagar', NULL, NULL, NULL, NULL, NULL),
(98, 'Thar Public School', NULL, NULL, NULL, NULL, NULL),
(99, 'The Bright Future Public School ', NULL, NULL, NULL, NULL, NULL),
(100, ' Zawar Shahan Malookhani School', NULL, NULL, NULL, NULL, NULL),
(101, 'Muhammad Bux Brohi  School', NULL, NULL, NULL, NULL, NULL),
(102, 'Zainab Model School ', NULL, NULL, NULL, NULL, NULL),
(103, 'Sadaf Oxford Public School', NULL, NULL, NULL, NULL, NULL),
(104, 'City Model English Academy Of Education Sanghar', NULL, NULL, NULL, NULL, NULL),
(105, 'Maan English Public School', NULL, NULL, NULL, NULL, NULL),
(106, 'Oxford English Elementry Public School Shahpur Chakar', NULL, NULL, NULL, NULL, NULL),
(107, 'Khudadad Kapri Sasui Home School', NULL, NULL, NULL, NULL, NULL),
(108, 'Al-Hussaini Public School', NULL, NULL, NULL, NULL, NULL),
(109, 'M.Siddique Model School', NULL, NULL, NULL, NULL, NULL),
(110, 'Syed Asdullah Shah Elementary School', NULL, NULL, NULL, NULL, NULL),
(111, 'Noor-e- Mustafa Public School', NULL, NULL, NULL, NULL, NULL),
(112, 'Sakhi Sarwar English Model School', NULL, NULL, NULL, NULL, NULL),
(113, 'Indus Public Private School', NULL, NULL, NULL, NULL, NULL),
(114, 'Shaheed Benazeer Bhutto Public School', NULL, NULL, NULL, NULL, NULL),
(115, 'Mehran Public School', NULL, NULL, NULL, NULL, NULL),
(116, 'Ali Sun Shine English Public School', NULL, NULL, NULL, NULL, NULL),
(117, 'Marvi Public School', NULL, NULL, NULL, NULL, NULL),
(118, 'Danish Paradies Elementary School', NULL, NULL, NULL, NULL, NULL),
(119, 'Iqra Public School', NULL, NULL, NULL, NULL, NULL),
(120, 'Indus Public School', NULL, NULL, NULL, NULL, NULL),
(121, 'Atif Model School', NULL, NULL, NULL, NULL, NULL),
(122, 'Noor Public School ', NULL, NULL, NULL, NULL, NULL),
(123, 'ERF Public School', NULL, NULL, NULL, NULL, NULL),
(124, 'Saifullah Public School', NULL, NULL, NULL, NULL, NULL),
(125, 'Sindh Public School', NULL, NULL, NULL, NULL, NULL),
(126, 'S.M Public School', NULL, NULL, NULL, NULL, NULL),
(127, 'PPRS Chhuto Meerwani', NULL, NULL, NULL, NULL, NULL),
(128, 'The Genuis Public Private School, Chhini Road Campus', NULL, NULL, NULL, NULL, NULL),
(129, 'Jordan Primary School', NULL, NULL, NULL, NULL, NULL),
(130, 'Jordan English Medium School', NULL, NULL, NULL, NULL, NULL),
(131, 'Jordan English Medium School', NULL, NULL, NULL, NULL, NULL),
(132, 'Bright Future Academy', NULL, NULL, NULL, NULL, NULL),
(133, 'The Ideal English Middle School Kakar', NULL, NULL, NULL, NULL, NULL),
(134, 'Sindh Public School', NULL, NULL, NULL, NULL, NULL),
(135, 'Indus Public School', NULL, NULL, NULL, NULL, NULL),
(136, 'Allah Rakhio ', NULL, NULL, NULL, NULL, NULL),
(137, 'Bhattai Colony', NULL, NULL, NULL, NULL, NULL),
(138, 'Oscar Public School', NULL, NULL, NULL, NULL, NULL),
(139, 'The Indus Valley Public School', NULL, NULL, NULL, NULL, NULL),
(140, 'Awami Public School Rabdino Ghambhir', NULL, NULL, NULL, NULL, NULL),
(141, 'Awami Public School Sehwan', NULL, NULL, NULL, NULL, NULL),
(142, 'The Shining Star Public School Madina Nagar', NULL, NULL, NULL, NULL, NULL),
(143, 'Rising Kids Public School', NULL, NULL, NULL, NULL, NULL),
(144, 'Indus Public School', NULL, NULL, NULL, NULL, NULL),
(145, 'Ahsan Public School', NULL, NULL, NULL, NULL, NULL),
(146, 'Baab Ul Ilm School', NULL, NULL, NULL, NULL, NULL),
(147, 'Adorn Public School Islamkot  ', NULL, NULL, NULL, NULL, NULL),
(148, 'Bright Public School', NULL, NULL, NULL, NULL, NULL),
(149, 'Faqir Rahim Mangrio Public School', NULL, NULL, NULL, NULL, NULL),
(150, 'Roshni Public School', NULL, NULL, NULL, NULL, NULL),
(151, 'New Oxford Public School Sakrand', NULL, NULL, NULL, NULL, NULL),
(152, 'Girls Community Elementary School Hote Jo Wahan', NULL, NULL, NULL, NULL, NULL),
(153, 'Sakhi Datar Elementary School', NULL, NULL, NULL, NULL, NULL),
(154, 'Saath Welfare Public School', NULL, NULL, NULL, NULL, NULL),
(155, 'Al - Mehran Public High School', NULL, NULL, NULL, NULL, NULL),
(156, 'Shan Public School', NULL, NULL, NULL, NULL, NULL),
(157, 'Shining Star Model School', NULL, NULL, NULL, NULL, NULL),
(158, 'Al Tahir Model School Bucheri ', NULL, NULL, NULL, NULL, NULL),
(159, 'Al-Moez Public School ', NULL, NULL, NULL, NULL, NULL),
(160, 'Shah Latif Model School Thikratho', NULL, NULL, NULL, NULL, NULL),
(161, 'Zanwar Mohammad Ilyas Public Elementary School', NULL, NULL, NULL, NULL, NULL),
(162, 'Shaheed Sooreh Badshah Model School Baati Goth', NULL, NULL, NULL, NULL, NULL),
(163, 'Rehmat Public High School', NULL, NULL, NULL, NULL, NULL),
(164, 'Dr.Jameel Kamboh Model School ', NULL, NULL, NULL, NULL, NULL),
(165, 'Yusra Elementary School', NULL, NULL, NULL, NULL, NULL),
(166, 'The Spark School', NULL, NULL, NULL, NULL, NULL),
(167, 'Diamond Public School', NULL, NULL, NULL, NULL, NULL),
(168, 'Roshni Model School', NULL, NULL, NULL, NULL, NULL),
(169, 'Zindagi Model School ', NULL, NULL, NULL, NULL, NULL),
(170, 'Sindh Model Secondary School', NULL, NULL, NULL, NULL, NULL),
(171, 'Benazir Public School', NULL, NULL, NULL, NULL, NULL),
(172, 'Shah Abdul Latif Model School', NULL, NULL, NULL, NULL, NULL),
(173, 'Muhammad Public School', NULL, NULL, NULL, NULL, NULL),
(174, 'Mubeen Public Middle High School', NULL, NULL, NULL, NULL, NULL),
(175, 'Bismillah Public Elementary School', NULL, NULL, NULL, NULL, NULL),
(176, 'Allama Tarique Elementary School', NULL, NULL, NULL, NULL, NULL),
(177, 'Batool Public School ', NULL, NULL, NULL, NULL, NULL),
(178, 'Liberal Public Elementary School', NULL, NULL, NULL, NULL, NULL),
(179, 'Sahil Elementary Public School', NULL, NULL, NULL, NULL, NULL),
(180, 'Kashif Model Elementary School', NULL, NULL, NULL, NULL, NULL),
(181, 'Valley Of Education Elementary Public School ', NULL, NULL, NULL, NULL, NULL),
(182, 'Ali Model School', NULL, NULL, NULL, NULL, NULL),
(183, 'The Aqsa Public School', NULL, NULL, NULL, NULL, NULL),
(184, 'Malhar Model School', NULL, NULL, NULL, NULL, NULL),
(185, 'Al Mustafa Public School ', NULL, NULL, NULL, NULL, NULL),
(186, 'Sahara Public School', NULL, NULL, NULL, NULL, NULL),
(187, 'Danyal Public School ', NULL, NULL, NULL, NULL, NULL),
(188, 'The Educare Public School ', NULL, NULL, NULL, NULL, NULL),
(189, 'Saifal Public High School', NULL, NULL, NULL, NULL, NULL),
(190, 'Indus Public School', NULL, NULL, NULL, NULL, NULL),
(191, 'Insaf Public School', NULL, NULL, NULL, NULL, NULL),
(192, 'New Hamdard Public Middle School Hussain Beli', NULL, NULL, NULL, NULL, NULL),
(193, 'Mashal Model Elementary School', NULL, NULL, NULL, NULL, NULL),
(194, 'Quied E Azam Rangers School', NULL, NULL, NULL, NULL, NULL),
(195, 'Al-Hussain Elementary Model School Darri', NULL, NULL, NULL, NULL, NULL),
(196, 'Mohammadi Public Elementary School Khamiso Chachar', NULL, NULL, NULL, NULL, NULL),
(197, 'Al-Rehman Elementary Model School', NULL, NULL, NULL, NULL, NULL),
(198, 'Sewai Foundation Elementary Model School', NULL, NULL, NULL, NULL, NULL),
(199, 'New Foundation School', NULL, NULL, NULL, NULL, NULL),
(200, 'Al Ghousia Public Elementary School Chhuto Chachar', NULL, NULL, NULL, NULL, NULL),
(201, 'The Citizen Public Elementary School Ubauro', NULL, NULL, NULL, NULL, NULL),
(202, 'Islamia Public Elementary School Ronwati', NULL, NULL, NULL, NULL, NULL),
(203, 'Sahkar Public School Daharki', NULL, NULL, NULL, NULL, NULL),
(204, 'Kids Education School System ', NULL, NULL, NULL, NULL, NULL),
(205, 'Al-Khair Public Elementary School', NULL, NULL, NULL, NULL, NULL),
(206, 'Roshni Public School', NULL, NULL, NULL, NULL, NULL),
(207, 'Tahreem Public School', NULL, NULL, NULL, NULL, NULL),
(208, 'Kushi Public School', NULL, NULL, NULL, NULL, NULL),
(209, 'Haji Azizullah Middle High School', NULL, NULL, NULL, NULL, NULL),
(210, 'Educator Community High School', NULL, NULL, NULL, NULL, NULL),
(211, 'Moon Fellowship School Luqman-Ii', NULL, NULL, NULL, NULL, NULL),
(212, 'Sachal Sar Mast Public School', NULL, NULL, NULL, NULL, NULL),
(213, 'Luky Star Elementary Model School', NULL, NULL, NULL, NULL, NULL),
(214, 'Bismillah Public School', NULL, NULL, NULL, NULL, NULL),
(215, 'Ali Public Elementary School Kumb', NULL, NULL, NULL, NULL, NULL),
(216, 'Sindh Public Elementary School ', NULL, NULL, NULL, NULL, NULL),
(217, 'Little Star Fellowship School', NULL, NULL, NULL, NULL, NULL),
(218, 'Sukaar Model School Sukk Wahan', NULL, NULL, NULL, NULL, NULL),
(219, 'Rabia Basri Elementary School', NULL, NULL, NULL, NULL, NULL),
(220, 'Gulshan-e-Zehara Fellowship Elementary School', NULL, NULL, NULL, NULL, NULL),
(221, 'Kanwal Elementary School', NULL, NULL, NULL, NULL, NULL),
(222, 'Kids Fellowship School', NULL, NULL, NULL, NULL, NULL),
(223, 'Mazhar Model Elementary School Chakar Wasayo', NULL, NULL, NULL, NULL, NULL),
(224, 'Sachal Model Public Elementary School Kharirah', NULL, NULL, NULL, NULL, NULL),
(225, 'Faaiza Public Elementary School', NULL, NULL, NULL, NULL, NULL),
(226, 'Faizan Public School Hindyari', NULL, NULL, NULL, NULL, NULL),
(227, 'Al Saadat Public  School', NULL, NULL, NULL, NULL, NULL),
(228, 'Modern E Public School Piryaloi', NULL, NULL, NULL, NULL, NULL),
(229, 'Nida Pe School / Ali Public Elementary School', NULL, NULL, NULL, NULL, NULL),
(230, 'Al Ghous Model School', NULL, NULL, NULL, NULL, NULL),
(231, 'Kanwal  Public Elementary School', NULL, NULL, NULL, NULL, NULL),
(232, 'Al-Nafees Model School', NULL, NULL, NULL, NULL, NULL),
(233, 'Sindh Model School', NULL, NULL, NULL, NULL, NULL),
(234, 'Tahira Public School', NULL, NULL, NULL, NULL, NULL),
(235, 'Brigth Future Model Elementary School', NULL, NULL, NULL, NULL, NULL),
(236, 'Fareeda Sultan Elementary School', NULL, NULL, NULL, NULL, NULL),
(237, 'Hussain Model School', NULL, NULL, NULL, NULL, NULL),
(238, 'Bismillah Model School', NULL, NULL, NULL, NULL, NULL),
(239, 'YSWA Model School ', NULL, NULL, NULL, NULL, NULL),
(240, 'Bilal Model School Pir WASSAN', NULL, NULL, NULL, NULL, NULL),
(241, 'Nice School System CAMPUS: 1 (USTAD LATE GHULAM NABI JUNEJO) VISTRA', NULL, NULL, NULL, NULL, NULL),
(242, 'Shams Model School', NULL, NULL, NULL, NULL, NULL),
(243, 'Tofeeque Model School', NULL, NULL, NULL, NULL, NULL),
(244, 'Bismillah Model School', NULL, NULL, NULL, NULL, NULL),
(245, 'Hira Publci School I', NULL, NULL, NULL, NULL, NULL),
(246, 'Al Noor Model School', NULL, NULL, NULL, NULL, NULL),
(247, 'Noor Model School', NULL, NULL, NULL, NULL, NULL),
(248, 'Al Shahbaz Model School', NULL, NULL, NULL, NULL, NULL),
(249, 'Bisma Model School', NULL, NULL, NULL, NULL, NULL),
(250, 'Mudasir Model School', NULL, NULL, NULL, NULL, NULL),
(251, 'Esha Model School', NULL, NULL, NULL, NULL, NULL),
(252, 'Hunain Asad Public School', NULL, NULL, NULL, NULL, NULL),
(253, 'Nice School System  Pirgoth  Kachi Aabadi C-2', NULL, NULL, NULL, NULL, NULL),
(254, 'Jallal Model School', NULL, NULL, NULL, NULL, NULL),
(255, 'FSMS Daraza', NULL, NULL, NULL, NULL, NULL),
(256, 'Shah Mardan Shah Public School', NULL, NULL, NULL, NULL, NULL),
(257, 'Hyder Model School', NULL, NULL, NULL, NULL, NULL),
(258, 'Roshni Public School', NULL, NULL, NULL, NULL, NULL),
(259, 'Roshni Public School', NULL, NULL, NULL, NULL, NULL),
(260, 'Ali Danish 1', NULL, NULL, NULL, NULL, NULL),
(261, 'Indus Public School Pechuha', NULL, NULL, NULL, NULL, NULL),
(262, 'Umair Pablic School', NULL, NULL, NULL, NULL, NULL),
(263, 'Muhtarma Rukhsana Khadim Model School Campus 2', NULL, NULL, NULL, NULL, NULL),
(264, 'Muhtarma Rukhsana Khadim Model School Campus 1', NULL, NULL, NULL, NULL, NULL),
(265, 'Arif Public School', NULL, NULL, NULL, NULL, NULL),
(266, 'Gohram Pahwar', NULL, NULL, NULL, NULL, NULL),
(267, 'Arz Muhammad Lund ', NULL, NULL, NULL, NULL, NULL),
(268, 'Sayed Abdullah Shah Lakyari ', NULL, NULL, NULL, NULL, NULL),
(269, 'Ibk Public School Jamshoro ', NULL, NULL, NULL, NULL, NULL),
(270, 'Hamad Public School ', NULL, NULL, NULL, NULL, NULL),
(271, 'Al-Khair Elementary Schoool', NULL, NULL, NULL, NULL, NULL),
(272, 'Future Bright English Medium School', NULL, NULL, NULL, NULL, NULL),
(273, 'Indus Public School', NULL, NULL, NULL, NULL, NULL),
(274, 'Connect Foundation School', NULL, NULL, NULL, NULL, NULL),
(275, 'Shah Abdul Latif Public School', NULL, NULL, NULL, NULL, NULL),
(276, 'Maryam Foundation NFPPS', NULL, NULL, NULL, NULL, NULL),
(277, 'Maryam Foundation Public Primary School Dayalgarh', NULL, NULL, NULL, NULL, NULL),
(278, 'Maryam Foundation NSDPPS', NULL, NULL, NULL, NULL, NULL),
(279, 'Abdullah Public School', NULL, NULL, NULL, NULL, NULL),
(280, 'Abdullah Public School', NULL, NULL, NULL, NULL, NULL),
(281, 'Pervaiz Memorial Public School', NULL, NULL, NULL, NULL, NULL),
(282, 'Paradise Public School', NULL, NULL, NULL, NULL, NULL),
(283, 'AB Karim Mallah', NULL, NULL, NULL, NULL, NULL),
(284, 'Ali Dino Tetri', NULL, NULL, NULL, NULL, NULL),
(285, 'Kazmi Public School', NULL, NULL, NULL, NULL, NULL),
(286, 'Kainat School', NULL, NULL, NULL, NULL, NULL),
(287, 'Prih Public School ', NULL, NULL, NULL, NULL, NULL),
(288, 'Umar Bux Khan Mazari Primary School ', NULL, NULL, NULL, NULL, NULL),
(289, 'Nazir Ahmed Khan Domki ', NULL, NULL, NULL, NULL, NULL),
(290, 'Mohammad Nawaz Badani Primary School', NULL, NULL, NULL, NULL, NULL),
(291, 'Benazir Model School', NULL, NULL, NULL, NULL, NULL),
(292, 'Sangam Public School ', NULL, NULL, NULL, NULL, NULL),
(293, 'Modern Public School', NULL, NULL, NULL, NULL, NULL),
(294, 'Faqir Jadam Mangrio Public School', NULL, NULL, NULL, NULL, NULL),
(295, 'Shama Public School', NULL, NULL, NULL, NULL, NULL),
(296, 'Sunshine School System Bismillah Campus ', NULL, NULL, NULL, NULL, NULL),
(297, 'Mehran Grammer Public School', NULL, NULL, NULL, NULL, NULL),
(298, 'Konbhoo Mal Kolhi Primary Schoool', NULL, NULL, NULL, NULL, NULL),
(299, 'Iqra Public School', NULL, NULL, NULL, NULL, NULL),
(300, 'Thar Public School', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `skill_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abbreviation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `talukas`
--

CREATE TABLE `talukas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abbreviation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `talukas`
--

INSERT INTO `talukas` (`id`, `name`, `abbreviation`, `district_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Badin', NULL, 1, NULL, NULL, NULL),
(2, 'Matli', NULL, 1, NULL, NULL, NULL),
(3, 'Shaheed Fazal Rahu', NULL, 1, NULL, NULL, NULL),
(4, 'Tando Bago', NULL, 1, NULL, NULL, NULL),
(5, 'Talhar', NULL, 1, NULL, NULL, NULL),
(6, 'Dadu', NULL, 2, NULL, NULL, NULL),
(7, 'Johi', NULL, 2, NULL, NULL, NULL),
(8, 'Khairpur Nathan Shah', NULL, 2, NULL, NULL, NULL),
(9, 'Mehar', NULL, 2, NULL, NULL, NULL),
(10, 'Daharki', NULL, 3, NULL, NULL, NULL),
(11, 'Ghotki', NULL, 3, NULL, NULL, NULL),
(12, 'Khangarh (Khanpur)', NULL, 3, NULL, NULL, NULL),
(13, 'Mirpur Mathelo', NULL, 3, NULL, NULL, NULL),
(14, 'Ubauro', NULL, 3, NULL, NULL, NULL),
(15, 'Hyderabad City', NULL, 4, NULL, NULL, NULL),
(16, 'Hyderabad', NULL, 4, NULL, NULL, NULL),
(17, 'Latifabad', NULL, 4, NULL, NULL, NULL),
(18, 'Qasimabad', NULL, 4, NULL, NULL, NULL),
(19, 'Kotri', NULL, 5, NULL, NULL, NULL),
(20, 'Manjhand', NULL, 5, NULL, NULL, NULL),
(21, 'Sehwan', NULL, 5, NULL, NULL, NULL),
(22, 'Thano Bula Khan', NULL, 5, NULL, NULL, NULL),
(23, 'Gulberg Town', NULL, 6, NULL, NULL, NULL),
(24, 'Liaquatabad Town', NULL, 6, NULL, NULL, NULL),
(25, 'New Karachi Town', NULL, 6, NULL, NULL, NULL),
(26, 'North Nazimabad Town', NULL, 6, NULL, NULL, NULL),
(27, 'Gulshan Town', NULL, 7, NULL, NULL, NULL),
(28, 'Jamshed Town', NULL, 7, NULL, NULL, NULL),
(29, 'Ferozabad', NULL, 7, NULL, NULL, NULL),
(30, 'Gulshan e Iqbal', NULL, 7, NULL, NULL, NULL),
(31, 'Gulzar e Hijri', NULL, 7, NULL, NULL, NULL),
(32, 'Baldia Town', NULL, 8, NULL, NULL, NULL),
(33, 'Kiamari Town', NULL, 8, NULL, NULL, NULL),
(34, 'S.I.T.E. Town', NULL, 8, NULL, NULL, NULL),
(35, 'Orangi Town', NULL, 8, NULL, NULL, NULL),
(36, 'Harbour', NULL, 8, NULL, NULL, NULL),
(37, 'Manghopir', NULL, 8, NULL, NULL, NULL),
(38, 'Mauripur', NULL, 8, NULL, NULL, NULL),
(39, 'Mominabad', NULL, 8, NULL, NULL, NULL),
(40, 'Lyari Town', NULL, 9, NULL, NULL, NULL),
(41, 'Saddar Town', NULL, 9, NULL, NULL, NULL),
(42, 'Aram Bagh', NULL, 9, NULL, NULL, NULL),
(43, 'Civil Line', NULL, 9, NULL, NULL, NULL),
(44, 'Garden', NULL, 9, NULL, NULL, NULL),
(45, 'Korangi Town', NULL, 10, NULL, NULL, NULL),
(46, 'Landhi Town', NULL, 10, NULL, NULL, NULL),
(47, 'Shah Faisal Town', NULL, 10, NULL, NULL, NULL),
(48, 'Model Colony', NULL, 10, NULL, NULL, NULL),
(49, 'Bin Qasim Town', NULL, 11, NULL, NULL, NULL),
(50, 'Gadap Town', NULL, 11, NULL, NULL, NULL),
(51, 'Malir Town', NULL, 11, NULL, NULL, NULL),
(52, 'Jinnah', NULL, 11, NULL, NULL, NULL),
(53, 'Ibrahim Hyderi', NULL, 11, NULL, NULL, NULL),
(54, 'Murad Memon', NULL, 11, NULL, NULL, NULL),
(55, 'Shah Murad', NULL, 11, NULL, NULL, NULL),
(56, 'Garhi Khairo', NULL, 12, NULL, NULL, NULL),
(57, 'Jacobabad', NULL, 12, NULL, NULL, NULL),
(58, 'Thul', NULL, 12, NULL, NULL, NULL),
(59, 'Kandhkot', NULL, 13, NULL, NULL, NULL),
(60, 'Kashmore', NULL, 13, NULL, NULL, NULL),
(61, 'Tangwani', NULL, 13, NULL, NULL, NULL),
(62, 'Faiz Gunj', NULL, 14, NULL, NULL, NULL),
(63, 'Gambat', NULL, 14, NULL, NULL, NULL),
(64, 'Khairpur', NULL, 14, NULL, NULL, NULL),
(65, 'Kingri', NULL, 14, NULL, NULL, NULL),
(66, 'Kot Diji', NULL, 14, NULL, NULL, NULL),
(67, 'Nara', NULL, 14, NULL, NULL, NULL),
(68, 'Sobho Dero', NULL, 14, NULL, NULL, NULL),
(69, 'Thari Mirwah', NULL, 14, NULL, NULL, NULL),
(70, 'Bakrani', NULL, 15, NULL, NULL, NULL),
(71, 'Dokri', NULL, 15, NULL, NULL, NULL),
(72, 'Larkana', NULL, 15, NULL, NULL, NULL),
(73, 'Rato Dero', NULL, 15, NULL, NULL, NULL),
(74, 'Hala', NULL, 16, NULL, NULL, NULL),
(75, 'Matiari', NULL, 16, NULL, NULL, NULL),
(76, 'Saeedabad', NULL, 16, NULL, NULL, NULL),
(77, 'Digri', NULL, 17, NULL, NULL, NULL),
(78, 'Hussain Bux Marri', NULL, 17, NULL, NULL, NULL),
(79, 'Jhuddo', NULL, 17, NULL, NULL, NULL),
(80, 'Kot G. Muhammad', NULL, 17, NULL, NULL, NULL),
(81, 'Mirpur Khas', NULL, 17, NULL, NULL, NULL),
(82, 'Shujabad', NULL, 17, NULL, NULL, NULL),
(83, 'Sindhri', NULL, 17, NULL, NULL, NULL),
(84, 'Bhiria', NULL, 18, NULL, NULL, NULL),
(85, 'Kandioro', NULL, 18, NULL, NULL, NULL),
(86, 'Mehrabpur', NULL, 18, NULL, NULL, NULL),
(87, 'Moro', NULL, 18, NULL, NULL, NULL),
(88, 'Naushahro Feroze', NULL, 18, NULL, NULL, NULL),
(89, 'Daur', NULL, 19, NULL, NULL, NULL),
(90, 'Nawab Shah', NULL, 19, NULL, NULL, NULL),
(91, 'Qazi Ahmed', NULL, 19, NULL, NULL, NULL),
(92, 'Sakrand', NULL, 19, NULL, NULL, NULL),
(93, 'Miro Khan', NULL, 20, NULL, NULL, NULL),
(94, 'Nasirabad', NULL, 20, NULL, NULL, NULL),
(95, 'Qambar', NULL, 20, NULL, NULL, NULL),
(96, 'Kubo Saeed Khan', NULL, 20, NULL, NULL, NULL),
(97, 'Shahdadkot', NULL, 20, NULL, NULL, NULL),
(98, 'Sijawal Junejo', NULL, 20, NULL, NULL, NULL),
(99, 'Warah', NULL, 20, NULL, NULL, NULL),
(100, 'Jam Nawaz Ali', NULL, 21, NULL, NULL, NULL),
(101, 'Khipro', NULL, 21, NULL, NULL, NULL),
(102, 'Sanghar', NULL, 21, NULL, NULL, NULL),
(103, 'Shahdadpur', NULL, 21, NULL, NULL, NULL),
(104, 'Sinjhoro', NULL, 21, NULL, NULL, NULL),
(105, 'Tando Adam', NULL, 21, NULL, NULL, NULL),
(106, 'Garhi Yasin', NULL, 22, NULL, NULL, NULL),
(107, 'Khanpur', NULL, 22, NULL, NULL, NULL),
(108, 'Lakhi', NULL, 22, NULL, NULL, NULL),
(109, 'Shikarpur', NULL, 22, NULL, NULL, NULL),
(110, 'New Sukkur', NULL, 23, NULL, NULL, NULL),
(111, 'Pano Akil', NULL, 23, NULL, NULL, NULL),
(112, 'Rohri', NULL, 23, NULL, NULL, NULL),
(113, 'Salehpat', NULL, 23, NULL, NULL, NULL),
(114, 'Sukkur', NULL, 23, NULL, NULL, NULL),
(115, 'Chamber', NULL, 24, NULL, NULL, NULL),
(116, 'Jhando Mari', NULL, 24, NULL, NULL, NULL),
(117, 'Tando Allahyar', NULL, 24, NULL, NULL, NULL),
(118, 'Bulri Shah Karim', NULL, 25, NULL, NULL, NULL),
(119, 'Tando Ghulam Hyder', NULL, 25, NULL, NULL, NULL),
(120, 'Tando Muhammad Khan', NULL, 25, NULL, NULL, NULL),
(121, 'Chachro', NULL, 26, NULL, NULL, NULL),
(122, 'Dhali', NULL, 26, NULL, NULL, NULL),
(123, 'Diplo', NULL, 26, NULL, NULL, NULL),
(124, 'Islamkot', NULL, 26, NULL, NULL, NULL),
(125, 'Kaloi', NULL, 26, NULL, NULL, NULL),
(126, 'Mithi', NULL, 26, NULL, NULL, NULL),
(127, 'Nagar ParKar', NULL, 26, NULL, NULL, NULL),
(128, 'Ghorabi', NULL, 27, NULL, NULL, NULL),
(129, 'Keti Bunder', NULL, 27, NULL, NULL, NULL),
(130, 'Mirpur Sakro', NULL, 27, NULL, NULL, NULL),
(131, 'Thatta', NULL, 27, NULL, NULL, NULL),
(132, 'Kunri', NULL, 28, NULL, NULL, NULL),
(133, 'Pithoro', NULL, 28, NULL, NULL, NULL),
(134, 'Samaro', NULL, 28, NULL, NULL, NULL),
(135, 'Umerkot', NULL, 28, NULL, NULL, NULL),
(136, 'Jati', NULL, 29, NULL, NULL, NULL),
(137, 'Kharo Chan', NULL, 29, NULL, NULL, NULL),
(138, 'Mirpur Bathoro', NULL, 29, NULL, NULL, NULL),
(139, 'Shah Bunder', NULL, 29, NULL, NULL, NULL),
(140, 'Sujawal', NULL, 29, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `union_councils`
--

CREATE TABLE `union_councils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abbreviation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taluka_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `union_councils`
--

INSERT INTO `union_councils` (`id`, `name`, `abbreviation`, `taluka_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Purano Abd', NULL, 1, '2022-04-06 01:53:36', '2022-04-06 01:53:36', NULL),
(2, 'DHAMRAH', NULL, 1, '2022-04-06 01:54:47', '2022-04-06 01:54:47', NULL),
(3, 'PHULL', NULL, 1, '2022-04-06 01:55:03', '2022-04-06 01:55:03', NULL),
(4, 'WARIS DINO MACHI', NULL, 2, '2022-04-06 02:04:13', '2022-04-06 02:04:13', NULL),
(5, 'UC - II', NULL, 1, '2022-04-06 02:04:30', '2022-04-06 02:04:30', NULL),
(6, 'Dhamrah', NULL, 3, '2022-04-06 02:04:45', '2022-04-06 02:04:45', NULL),
(7, '9', NULL, 2, '2022-04-06 02:05:10', '2022-04-06 02:05:10', NULL),
(8, '20', NULL, 1, '2022-04-06 02:05:25', '2022-04-06 02:05:25', NULL),
(9, 'North Karachi', NULL, 4, '2022-04-06 02:05:53', '2022-04-06 02:05:53', NULL),
(10, 'Safoora', NULL, 9, '2022-04-06 02:06:20', '2022-04-06 02:06:20', NULL),
(11, 'Gughar', NULL, 16, '2022-04-06 02:11:41', '2022-04-06 02:11:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `state_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `city_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `district_id` bigint(20) UNSIGNED DEFAULT NULL,
  `taluka_id` bigint(20) UNSIGNED DEFAULT NULL,
  `union_council_id` bigint(20) UNSIGNED DEFAULT NULL,
  `union_council` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domicile_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domicile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urdu_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnic_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `maritial_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_experience` int(11) DEFAULT NULL,
  `current_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnic_expire_date` timestamp NULL DEFAULT NULL,
  `cnic_front_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnic_back_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'candidate',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sef_employee` tinyint(1) DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_verified_at` timestamp NULL DEFAULT NULL,
  `mobile_verification_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nadra_verified_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `country_id`, `state_id`, `city_id`, `district_id`, `taluka_id`, `union_council_id`, `union_council`, `domicile_number`, `domicile`, `name`, `urdu_name`, `gender`, `father_name`, `mobile_number`, `cnic_number`, `dob`, `maritial_status`, `place_of_birth`, `total_experience`, `current_address`, `postal_address`, `permanent_address`, `cnic_expire_date`, `cnic_front_img`, `cnic_back_img`, `email`, `user_type`, `email_verified_at`, `password`, `status`, `religion`, `sef_employee`, `profile_picture`, `mobile_verified_at`, `mobile_verification_code`, `nadra_verified_at`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 5, 'UC', NULL, NULL, 'Noman Ahmed', NULL, 'Male', 'Fazal Ahmed', '923319636193', '38403-8953094-7', '1999-04-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GymYXMkuq6w3M6SfqPtfxqGdNLGYpoUJ.jpeg', 'UdhoCiIl1dpjjmy4AWhANtLLgvMm56CK.jpeg', 'noman.ahmed1408@gmail.com', 'candidate', '2021-12-17 09:01:50', '$2y$10$zrUCF6R8Uc1U9abRBbNnZOGBhC9aErgbJFgh0YD8StcFgr6vdidrS', NULL, 'Muslim', NULL, 'A6SjBO3nzslJbwHiSjOMkEp8HDRtjOWa.png', NULL, '7635', NULL, NULL, NULL, '2021-12-16 01:46:53', '2022-04-15 05:17:17'),
(5, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Noman Ahmed', NULL, 'Male', NULL, '03319636192', '3840389530943', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'noman.ahmed148@gmail.com', 'candidate', '2021-12-17 00:03:17', '$2y$10$Eyk0Yaisyj/mM8WsvaJTL.K3cwcwb9zGAOJd34iL7msXywBDYtdkK', NULL, NULL, NULL, '0FSAXPbXFXeeX5eI5XTfrQzB8IIY063q.jpg', NULL, NULL, NULL, NULL, NULL, '2021-12-17 00:02:39', '2021-12-17 00:03:17'),
(6, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, 'Male', 'Super Admin', '0321456778', '38403895', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin@app.com', 'administrator', '2021-12-17 00:10:33', '$2y$10$B7QCUtiydPCF9tLBxkpIXeSj1u.3ZoWunrm.JQcXpOBWKVPsRehA.', NULL, NULL, NULL, 'iO9YuUnqP2r06jg2Wgo9CrrIOWVjex4l.png', NULL, NULL, NULL, NULL, NULL, '2021-12-17 00:06:46', '2021-12-17 00:12:31'),
(7, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Examinar User', NULL, 'Male', NULL, '03147736177', '3510105393513', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'examinar@app.com', 'candidate', '2021-12-29 00:52:43', '$2y$10$B7QCUtiydPCF9tLBxkpIXeSj1u.3ZoWunrm.JQcXpOBWKVPsRehA.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-29 00:52:14', '2021-12-29 00:52:43'),
(11, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Jan Muhammad Mirza', NULL, 'Male', NULL, '923334394422', '3520217585002', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'jan@gmail.com', 'candidate', '2021-12-17 00:03:17', '$2y$10$Eyk0Yaisyj/mM8WsvaJTL.K3cwcwb9zGAOJd34iL7msXywBDYtdkK', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '2021-12-17 00:02:39', '2021-12-17 00:03:17'),
(15, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Jan Muhammad Mirza', NULL, 'Male', 'Tariq Mehmood Mirza', '923058967528', '3520217576001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GymYXMkuq6w3M6SfqPtfxqGdNLGYpoUJ.jpeg', 'UdhoCiIl1dpjjmy4AWhANtLLgvMm56CK.jpeg', 'noman@gmail.com', 'candidate', '2021-12-17 09:01:50', '$2y$10$zrUCF6R8Uc1U9abRBbNnZOGBhC9aErgbJFgh0YD8StcFgr6vdidrS', NULL, NULL, NULL, 'A6SjBO3nzslJbwHiSjOMkEp8HDRtjOWa.png', NULL, NULL, NULL, NULL, NULL, '2021-12-16 01:46:53', '2022-01-07 05:50:20'),
(16, 1, 2, 1, 1, 1, 2, NULL, NULL, NULL, 'Jan Muhammad Mirza', 'q', 'Male', 'Tariq Mehmood Mirza', '923334295590', '3520217575001', '1999-05-13', 'single', 'Lahore,Pakistan', 4, NULL, NULL, NULL, NULL, 'nJQBQzTYxOYd3qNj2ttC26NDehpkLSHT.jpeg', 'D1fJnA8alusxBmoU5CXCqakJTkruTvib.jpeg', 'janmuhammadmirza@gmail.com', 'candidate', '2022-03-29 06:02:45', '$2y$10$PZ/fR5nSqg0cpNrxGxAbzu4wqZ32CsCJdxLMHAu6qs3MNzYEdHKG.', NULL, 'Muslim', 0, 'm24m3Eiili8PFnIJgop5yC3jFPsl03RP.png', '2022-03-29 08:15:25', '9079', NULL, NULL, NULL, '2022-03-29 01:01:31', '2022-04-14 01:31:33'),
(17, 1, 2, 4, 2, 5, NULL, 'jkiuy', NULL, 'vqZx87zzLLq5ehsd0bFWYKwdELmJ7rnc.png', 'TAIMOOR KHAN', NULL, 'Male', 'Muhammad Khalid Khan Niazi', '923333000331', '61101-2026974-1', '1982-11-22', 'single', 'karachi', NULL, NULL, 'H.No 43. JCHS, Tipu Sultan Road, Karachi', NULL, NULL, 'OZQuHwhlUUAgAusRmH4gVZGkqGzmXNoN.png', 'rxsObnEpFdqGCdvdJYGeq1NAQJctGIkB.png', 'TAIMES.FCP@GMAIL.COM', 'candidate', '2022-03-29 04:50:33', '$2y$10$jA7co0h87RZM/BpMWlk.sOywe8UOe9Qrv4aQ/O/LAdyitlhQ4xxOO', NULL, 'Muslim', 1, 'cbcrXYp5xTxUBn0ckXqcLyhb2eWTrIOV.png', '2022-04-07 04:18:03', '6980', NULL, NULL, NULL, '2022-03-29 04:43:54', '2022-04-18 03:27:18'),
(18, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'John Doe', NULL, 'Male', 'Taiwo Hassan', '923334295520', '3520217575002', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'edummy304@gmail.com', 'candidate', '2022-03-30 06:37:02', '$2y$10$cdyla3lJpkAFxWBUesNLE.4sHT9rqYZ/vpSLouv.QEI/vukhCqwkq', NULL, NULL, NULL, NULL, '2022-03-30 06:48:03', '7338', NULL, NULL, NULL, '2022-03-30 06:36:37', '2022-03-30 06:49:12'),
(19, 1, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'Kamran Behram Khan', NULL, 'Male', NULL, '923118118064', '4220102337243', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kamran.pdlc@gmail.com', 'candidate', '2022-04-08 03:16:46', '$2y$10$Brqa0IJ6RTDF2NKFZ/ykVexCxbTJgexZKXHNY.WGyYr62E3pBvdnC', NULL, NULL, NULL, NULL, NULL, '2595', NULL, NULL, NULL, '2022-04-08 03:12:45', '2022-04-14 23:25:21'),
(20, 1, 2, 1, 6, NULL, NULL, NULL, NULL, NULL, 'Muhammad Attique', NULL, 'Male', NULL, '03337113394', '4130455878447', '1974-10-05', 'single', 'Sukkur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ateequebhutto@gmail.com', 'candidate', '2022-04-12 03:47:20', '$2y$10$dR1ZMPu41xNzaQnML8RNVOYF8YA6PFOIwMfXkvRZJnR4UCGWV9iMe', NULL, 'Muslim', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-12 03:45:34', '2022-04-12 03:54:15'),
(21, 1, 1, 1, 2, 9, 1, NULL, '951357852456', 'lwmPgD5IWUHgwE30N30EUJ3pd9WozLkb.png', 'Awais Ahmad Azeem', NULL, 'Male', 'Faiz Ahmad', '923217953240', '3310425008851', '1992-08-14', 'married', 'Lahore', NULL, 'xyz-address', 'xyz-address', 'xyz-address', NULL, NULL, NULL, 'awais.ahmad@beaconhousetechnology.com', 'candidate', '2022-04-14 05:19:55', '$2y$10$osefTCSgtQ/IwsZ2n2o8GOaeQ9EPNiuvlfmVhaBL/84SdavFeYwDq', NULL, 'Muslim', 0, 'ynjOtvgs8fye939ytqR9JvYyTojOthkA.png', '2022-04-14 05:22:04', '8266', NULL, NULL, NULL, '2022-04-14 05:19:32', '2022-04-14 05:39:19'),
(24, 1, 1, 1, 1, 4, NULL, '9', NULL, NULL, 'JMMIrza', NULL, 'Male', 'Tariq Mehmood Mirza', '923058967527', '35202-1757500-1', '1999-05-13', 'single', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ihandyapp@gmail.com', 'candidate', '2022-04-18 00:19:59', '$2y$10$Te.gqdsy3vGQWTHRW.WsKeTrKmP1yakO3whWz/G9FgU4ivfQAWJeS', NULL, 'Muslim', 0, 'iO9YuUnqP2r06jg2Wgo9CrrIOWVjex4l.png', '2022-04-19 22:55:36', '9577', NULL, NULL, NULL, '2022-04-18 00:19:40', '2022-04-19 22:55:36');

-- --------------------------------------------------------

--
-- Table structure for table `user_certificates`
--

CREATE TABLE `user_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `institute_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_experiences`
--

CREATE TABLE `user_experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `organization_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date DEFAULT NULL,
  `experience_letter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_experiences`
--

INSERT INTO `user_experiences` (`id`, `user_id`, `organization_name`, `designation`, `date_from`, `date_to`, `experience_letter`, `present`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 11, 'Magnus Mage', 'Analyst Software Developer', '2022-03-29', '2022-07-28', NULL, 0, '2022-03-28 05:52:02', '2022-03-28 06:01:31', '2022-03-28 06:01:31'),
(2, 1, 'Magnus Mage', 'Analyst Software Developer', '2022-03-30', NULL, NULL, 1, '2022-03-28 06:01:39', '2022-03-28 06:08:27', '2022-03-28 06:08:27'),
(3, 1, 'Magnus Mage', 'Analyst Software Developer', '2022-03-26', NULL, 'R8o689mI5mwJELiQMxM7ebwwk9ZLPz4Z.docx', 1, '2022-03-28 06:08:23', '2022-03-28 06:08:23', NULL),
(4, 1, 'Beaconhouse IT', 'Analyst Software Developer', '2022-01-24', NULL, NULL, 1, '2022-03-29 00:53:33', '2022-03-29 00:53:33', NULL),
(5, 16, 'Magnus Mage', 'Analyst Software Developer', '2020-05-20', '2022-01-24', '7OUgP840AL2kdN1cqfPnBP2YgxVeckmC.docx', 0, '2022-03-29 01:47:41', '2022-03-29 04:44:19', '2022-03-29 04:44:19'),
(6, 16, 'Beaconhouse IT', 'Analyst Software Developer', '2022-01-24', NULL, NULL, 1, '2022-03-29 04:43:53', '2022-03-30 05:09:48', '2022-03-30 05:09:48'),
(7, 16, 'Magnus Mage', 'Junior Backend Developer', '2020-05-13', '2022-01-24', NULL, 0, '2022-03-30 05:10:29', '2022-03-30 05:10:29', NULL),
(8, 18, 'Beaconhouse IT', 'Junior Backend Developer', '2022-01-24', NULL, NULL, 1, '2022-03-30 06:50:06', '2022-03-30 06:50:06', NULL),
(9, 17, 'asdfr', 'assddff', '2022-04-07', NULL, NULL, 1, '2022-04-21 05:57:05', '2022-04-21 05:57:05', NULL);

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
-- Indexes for table `desk_services`
--
ALTER TABLE `desk_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `desk_services_user_id_foreign` (`user_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
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
-- Indexes for table `institutions`
--
ALTER TABLE `institutions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_announcements`
--
ALTER TABLE `job_announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_announcements_state_id_foreign` (`state_id`);

--
-- Indexes for table `job_announcement_skills`
--
ALTER TABLE `job_announcement_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_announcement_skills_job_id_foreign` (`job_id`),
  ADD KEY `job_announcement_skills_skill_id_foreign` (`skill_id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_applications_job_announcement_id_foreign` (`job_announcement_id`),
  ADD KEY `job_applications_user_id_foreign` (`user_id`),
  ADD KEY `job_applications_shortlisted_by_foreign` (`shortlisted_by`),
  ADD KEY `job_applications_invitation_sent_by_foreign` (`invitation_sent_by`);

--
-- Indexes for table `job_prefrences`
--
ALTER TABLE `job_prefrences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_prefrences_job_application_id_foreign` (`job_application_id`),
  ADD KEY `job_prefrences_user_id_foreign` (`user_id`),
  ADD KEY `job_prefrences_district_id_foreign` (`district_id`),
  ADD KEY `job_prefrences_taluka_id_foreign` (`taluka_id`),
  ADD KEY `job_prefrences_school_id_foreign` (`school_id`),
  ADD KEY `job_prefrences_union_council_id_foreign` (`union_council_id`);

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
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schools_union_council_id_foreign` (`union_council_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_country_id_foreign` (`country_id`);

--
-- Indexes for table `talukas`
--
ALTER TABLE `talukas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `talukas_district_id_foreign` (`district_id`);

--
-- Indexes for table `union_councils`
--
ALTER TABLE `union_councils`
  ADD PRIMARY KEY (`id`),
  ADD KEY `union_councils_taluka_id_foreign` (`taluka_id`);

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
  ADD KEY `users_city_id_foreign` (`city_id`),
  ADD KEY `users_district_id_foreign` (`district_id`),
  ADD KEY `users_taluka_id_foreign` (`taluka_id`),
  ADD KEY `users_union_council_id_foreign` (`union_council_id`);

--
-- Indexes for table `user_certificates`
--
ALTER TABLE `user_certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_certificates_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_experiences`
--
ALTER TABLE `user_experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_experiences_user_id_foreign` (`user_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `desk_services`
--
ALTER TABLE `desk_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
-- AUTO_INCREMENT for table `institutions`
--
ALTER TABLE `institutions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_announcements`
--
ALTER TABLE `job_announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `job_announcement_skills`
--
ALTER TABLE `job_announcement_skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_prefrences`
--
ALTER TABLE `job_prefrences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

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
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `talukas`
--
ALTER TABLE `talukas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `union_councils`
--
ALTER TABLE `union_councils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_certificates`
--
ALTER TABLE `user_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_experiences`
--
ALTER TABLE `user_experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- Constraints for table `desk_services`
--
ALTER TABLE `desk_services`
  ADD CONSTRAINT `desk_services_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

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
-- Constraints for table `job_announcements`
--
ALTER TABLE `job_announcements`
  ADD CONSTRAINT `job_announcements_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Constraints for table `job_announcement_skills`
--
ALTER TABLE `job_announcement_skills`
  ADD CONSTRAINT `job_announcement_skills_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `job_announcements` (`id`),
  ADD CONSTRAINT `job_announcement_skills_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`);

--
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `job_applications_invitation_sent_by_foreign` FOREIGN KEY (`invitation_sent_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `job_applications_job_announcement_id_foreign` FOREIGN KEY (`job_announcement_id`) REFERENCES `job_announcements` (`id`),
  ADD CONSTRAINT `job_applications_shortlisted_by_foreign` FOREIGN KEY (`shortlisted_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `job_applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `job_prefrences`
--
ALTER TABLE `job_prefrences`
  ADD CONSTRAINT `job_prefrences_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`),
  ADD CONSTRAINT `job_prefrences_job_application_id_foreign` FOREIGN KEY (`job_application_id`) REFERENCES `job_applications` (`id`),
  ADD CONSTRAINT `job_prefrences_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`),
  ADD CONSTRAINT `job_prefrences_taluka_id_foreign` FOREIGN KEY (`taluka_id`) REFERENCES `talukas` (`id`),
  ADD CONSTRAINT `job_prefrences_union_council_id_foreign` FOREIGN KEY (`union_council_id`) REFERENCES `union_councils` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `job_prefrences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

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
-- Constraints for table `schools`
--
ALTER TABLE `schools`
  ADD CONSTRAINT `schools_union_council_id_foreign` FOREIGN KEY (`union_council_id`) REFERENCES `union_councils` (`id`);

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Constraints for table `talukas`
--
ALTER TABLE `talukas`
  ADD CONSTRAINT `talukas_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`);

--
-- Constraints for table `union_councils`
--
ALTER TABLE `union_councils`
  ADD CONSTRAINT `union_councils_taluka_id_foreign` FOREIGN KEY (`taluka_id`) REFERENCES `talukas` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `users_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `users_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`),
  ADD CONSTRAINT `users_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`),
  ADD CONSTRAINT `users_taluka_id_foreign` FOREIGN KEY (`taluka_id`) REFERENCES `talukas` (`id`),
  ADD CONSTRAINT `users_union_council_id_foreign` FOREIGN KEY (`union_council_id`) REFERENCES `union_councils` (`id`);

--
-- Constraints for table `user_certificates`
--
ALTER TABLE `user_certificates`
  ADD CONSTRAINT `user_certificates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_experiences`
--
ALTER TABLE `user_experiences`
  ADD CONSTRAINT `user_experiences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
