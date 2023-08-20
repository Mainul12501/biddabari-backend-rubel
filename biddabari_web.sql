-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 07, 2023 at 07:38 AM
-- Server version: 5.7.36
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biddabari_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

DROP TABLE IF EXISTS `advertisements`;
CREATE TABLE IF NOT EXISTS `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_type` enum('course','ebook','book','external-link') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `link` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `title`, `content_type`, `description`, `link`, `image`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(2, 'sdfsdfsd', 'course', '<p>sdfsdf</p>', 'http://127.0.0.1:8000/course-details/7/%E0%A7%AA%E0%A7%AD%E0%A6%A4%E0%A6%AE-%E0%A6%AC%E0%A6%BF%E0%A6%B8%E0%A6%BF%E0%A6%8F%E0%A6%B8-%E0%A6%8F%E0%A6%A1%E0%A6%AD%E0%A6%BE%E0%A6%A8%E0%A7%8D%E0%A6%B8-%E0%A6%97%E0%A7%8B%E0%A6%B2%E0%A7%8D%E0%A6%A1-%E0%A6%B2%E0%A6%BE%E0%A6%87%E0%A6%AD-%E0%A6%AC%E0%A7%8D%E0%A6%AF%E0%A6%BE%E0%A6%9A', 'backend/assets/uploaded-files/advertisement-management/advertisements/advertisement--1689345749233.jpg', 'sdfsdfsd', 1, '2023-07-14 14:42:30', '2023-08-01 08:44:23');

-- --------------------------------------------------------

--
-- Table structure for table `batch_exams`
--

DROP TABLE IF EXISTS `batch_exams`;
CREATE TABLE IF NOT EXISTS `batch_exams` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `sub_title` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(10,2) DEFAULT '0.00',
  `banner` text COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `featured_video_url` text COLLATE utf8mb4_unicode_ci,
  `package_duration_in_days` tinyint(4) DEFAULT '1',
  `discount_type` tinyint(4) DEFAULT '1' COMMENT '1 => Fixed; 2 => Percentage',
  `discount_amount` mediumint(9) DEFAULT NULL,
  `discount_start_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_start_date_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_end_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_end_date_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_paid` tinyint(4) DEFAULT '1',
  `is_featured` tinyint(4) DEFAULT NULL,
  `is_approved` tinyint(4) DEFAULT '1',
  `status` tinyint(4) DEFAULT '1',
  `is_master_exam` tinyint(2) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batch_exams`
--

INSERT INTO `batch_exams` (`id`, `title`, `slug`, `sub_title`, `price`, `banner`, `description`, `featured_video_url`, `package_duration_in_days`, `discount_type`, `discount_amount`, `discount_start_date`, `discount_start_date_timestamp`, `discount_end_date`, `discount_end_date_timestamp`, `is_paid`, `is_featured`, `is_approved`, `status`, `is_master_exam`, `created_at`, `updated_at`) VALUES
(1, 'master', 'master', 'safdsdf', '0.00', 'backend/assets/uploaded-files/batch-exam/batch-exam-banners/batch-exams-1691243168128.jpg', '<p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: \" noto=\"\" sans=\"\" bengali\",=\"\" cursive;=\"\" font-size:=\"\" 16px;=\"\" color:=\"\" rgb(20,=\"\" 20,=\"\" 20);=\"\" letter-spacing:=\"\" 0.1px;\"=\"\">একজন গর্বিত সরকারি প্রাথমিক শিক্ষক হিসেবে ক্যারিয়ার গড়তে, পথচলা শুরু হোক বিদ্যাবাড়ির সাথেই!</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: \" noto=\"\" sans=\"\" bengali\",=\"\" cursive;=\"\" font-size:=\"\" 16px;=\"\" color:=\"\" rgb(20,=\"\" 20,=\"\" 20);=\"\" letter-spacing:=\"\" 0.1px;\"=\"\">রাজশাহী, খুলনা ও ময়মনসিংহ বিভাগের প্রার্থীদের জন্য প্রাইমারি শিক্ষক নিয়োগের নতুন সার্কুলার ইতোমধ্যেই প্রকাশিত হয়েছে।</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: \" noto=\"\" sans=\"\" bengali\",=\"\" cursive;=\"\" font-size:=\"\" 16px;=\"\" color:=\"\" rgb(20,=\"\" 20,=\"\" 20);=\"\" letter-spacing:=\"\" 0.1px;\"=\"\">পূর্বের সার্কুলারে বিদ্যাবাড়ি থেকে ৫৫২+ জনের অধিক সফল হয়েছে। তাই, এই সার্কুলারে আপনার চাকরি নিশ্চিত করতে বিদ্যাবাড়ির Master Plan ভিত্তিক বিশেষ আয়োজন</p>', '', 1, 1, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 1, 1, '2023-08-05 13:23:54', '2023-08-05 18:14:01'),
(3, 'sdfsdf', 'sdfsdf', 'sdfsdf', '0.00', 'backend/assets/uploaded-files/batch-exam/batch-exam-banners/batch-exams-1691293473248.jpg', '<p>sdfsdf</p>', '', 1, 1, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 1, 0, '2023-08-05 18:46:21', '2023-08-06 03:44:35');

-- --------------------------------------------------------

--
-- Table structure for table `batch_exam_batch_exam_category`
--

DROP TABLE IF EXISTS `batch_exam_batch_exam_category`;
CREATE TABLE IF NOT EXISTS `batch_exam_batch_exam_category` (
  `batch_exam_category_id` bigint(20) UNSIGNED NOT NULL,
  `batch_exam_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batch_exam_batch_exam_category`
--

INSERT INTO `batch_exam_batch_exam_category` (`batch_exam_category_id`, `batch_exam_id`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `batch_exam_categories`
--

DROP TABLE IF EXISTS `batch_exam_categories`;
CREATE TABLE IF NOT EXISTS `batch_exam_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batch_exam_categories`
--

INSERT INTO `batch_exam_categories` (`id`, `name`, `parent_id`, `note`, `image`, `slug`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'one', 0, '<p>sdfdsf</p>', 'backend/assets/uploaded-files/batch-exam/batch-exam-category-images/batch-exam-category-1690345782852.png', 'one', 1, 1, '2023-07-26 04:29:43', '2023-07-26 04:29:43'),
(2, 'two', 1, NULL, NULL, 'two', 1, 1, '2023-07-26 04:32:31', '2023-07-26 04:32:31'),
(3, 'asdasda', 2, NULL, NULL, 'asdasda', 1, 1, '2023-07-26 04:43:00', '2023-07-26 04:43:00'),
(4, 'yo', 0, NULL, NULL, 'yo', 1, 1, '2023-07-26 04:43:09', '2023-07-26 04:47:03');

-- --------------------------------------------------------

--
-- Table structure for table `batch_exam_results`
--

DROP TABLE IF EXISTS `batch_exam_results`;
CREATE TABLE IF NOT EXISTS `batch_exam_results` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `batch_exam_section_content_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `xm_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `written_xm_file` text COLLATE utf8mb4_unicode_ci,
  `provided_ans` text COLLATE utf8mb4_unicode_ci,
  `result_mark` tinyint(4) DEFAULT '0',
  `is_reviewed` tinyint(4) DEFAULT '0',
  `required_time` mediumint(9) DEFAULT '0',
  `status` enum('pass','fail','pending') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batch_exam_results`
--

INSERT INTO `batch_exam_results` (`id`, `batch_exam_section_content_id`, `user_id`, `xm_type`, `written_xm_file`, `provided_ans`, `result_mark`, `is_reviewed`, `required_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 'exam', NULL, '{\"32\":{\"answer\":\"46\"},\"31\":{\"answer\":\"41\"},\"30\":{\"answer\":\"38\"}}', 1, 0, 11, 'fail', '2023-07-29 10:34:19', '2023-07-29 10:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `batch_exam_routines`
--

DROP TABLE IF EXISTS `batch_exam_routines`;
CREATE TABLE IF NOT EXISTS `batch_exam_routines` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `batch_exam_id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_time_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) DEFAULT '1',
  `is_fack` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `batch_exam_sections`
--

DROP TABLE IF EXISTS `batch_exam_sections`;
CREATE TABLE IF NOT EXISTS `batch_exam_sections` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `batch_exam_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `available_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `is_paid` tinyint(4) DEFAULT '1',
  `status` tinyint(4) DEFAULT '1',
  `order` mediumint(9) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batch_exam_sections`
--

INSERT INTO `batch_exam_sections` (`id`, `batch_exam_id`, `title`, `available_at`, `note`, `is_paid`, `status`, `order`, `created_at`, `updated_at`) VALUES
(5, 3, 'section one', '2023-08-07 00:45', '<p>sdfsdfsdf</p>', 1, 1, NULL, '2023-08-06 06:06:36', '2023-08-06 18:46:54');

-- --------------------------------------------------------

--
-- Table structure for table `batch_exam_section_contents`
--

DROP TABLE IF EXISTS `batch_exam_section_contents`;
CREATE TABLE IF NOT EXISTS `batch_exam_section_contents` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `batch_exam_section_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `content_type` enum('pdf','note','exam','written_exam') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `pdf_link` text COLLATE utf8mb4_unicode_ci,
  `pdf_file` text COLLATE utf8mb4_unicode_ci,
  `note_content` longtext COLLATE utf8mb4_unicode_ci,
  `exam_mode` enum('exam','practice','group') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_duration_in_minutes` mediumint(9) DEFAULT '1',
  `exam_total_questions` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `exam_per_question_mark` tinyint(4) DEFAULT '0',
  `exam_negative_mark` double(3,2) DEFAULT '0.00',
  `exam_pass_mark` tinyint(4) DEFAULT '0',
  `exam_is_strict` tinyint(4) DEFAULT '0',
  `exam_start_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_start_time_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_end_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_end_time_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_result_publish_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_result_publish_time_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_total_subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `written_exam_duration_in_minutes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `written_total_questions` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `written_description` text COLLATE utf8mb4_unicode_ci,
  `written_is_strict` tinyint(4) DEFAULT '0',
  `written_start_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `written_start_time_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `written_end_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `written_end_time_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `written_publish_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `written_publish_time_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `written_total_subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_paid` tinyint(4) DEFAULT '1',
  `order` mediumint(9) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `available_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `available_at_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batch_exam_section_contents`
--

INSERT INTO `batch_exam_section_contents` (`id`, `batch_exam_section_id`, `parent_id`, `content_type`, `title`, `pdf_link`, `pdf_file`, `note_content`, `exam_mode`, `exam_duration_in_minutes`, `exam_total_questions`, `exam_per_question_mark`, `exam_negative_mark`, `exam_pass_mark`, `exam_is_strict`, `exam_start_time`, `exam_start_time_timestamp`, `exam_end_time`, `exam_end_time_timestamp`, `exam_result_publish_time`, `exam_result_publish_time_timestamp`, `exam_total_subject`, `written_exam_duration_in_minutes`, `written_total_questions`, `written_description`, `written_is_strict`, `written_start_time`, `written_start_time_timestamp`, `written_end_time`, `written_end_time_timestamp`, `written_publish_time`, `written_publish_time_timestamp`, `written_total_subject`, `is_paid`, `order`, `status`, `available_at`, `available_at_timestamp`, `created_at`, `updated_at`) VALUES
(9, 5, NULL, 'exam', 'section-content', NULL, NULL, NULL, 'exam', 20, '10', 1, 0.25, 3, 1, '2023-08-07 04:05', '1691359500', '2023-08-07 12:37', '1691390220', '2023-08-31 05:25', '1693437900', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, '2023-08-06 06:30', '1691281800', '2023-08-06 06:07:56', '2023-08-07 06:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `batch_exam_section_content_question_store`
--

DROP TABLE IF EXISTS `batch_exam_section_content_question_store`;
CREATE TABLE IF NOT EXISTS `batch_exam_section_content_question_store` (
  `question_store_id` bigint(20) UNSIGNED NOT NULL,
  `batch_exam_section_content_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batch_exam_section_content_question_store`
--

INSERT INTO `batch_exam_section_content_question_store` (`question_store_id`, `batch_exam_section_content_id`) VALUES
(31, 3),
(30, 3),
(29, 3),
(28, 4),
(26, 4),
(27, 4),
(32, 3),
(32, 7),
(31, 7),
(30, 7),
(26, 8),
(27, 8),
(45, 9),
(40, 9),
(39, 9),
(38, 9),
(37, 9),
(36, 9),
(35, 9),
(34, 9),
(33, 9),
(43, 9),
(42, 9),
(29, 9),
(30, 9),
(31, 9),
(32, 9),
(46, 9);

-- --------------------------------------------------------

--
-- Table structure for table `batch_exam_student`
--

DROP TABLE IF EXISTS `batch_exam_student`;
CREATE TABLE IF NOT EXISTS `batch_exam_student` (
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `batch_exam_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `batch_exam_subscriptions`
--

DROP TABLE IF EXISTS `batch_exam_subscriptions`;
CREATE TABLE IF NOT EXISTS `batch_exam_subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `batch_exam_id` bigint(20) UNSIGNED NOT NULL,
  `price` double(8,2) DEFAULT NULL,
  `package_duration_in_days` tinyint(4) DEFAULT NULL,
  `discount_type` tinyint(4) DEFAULT NULL COMMENT '1 => Fixed; 2 => Percentage',
  `package_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_amount` mediumint(5) DEFAULT '0',
  `discount_start_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_start_date_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_end_date_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_end_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batch_exam_subscriptions`
--

INSERT INTO `batch_exam_subscriptions` (`id`, `batch_exam_id`, `price`, `package_duration_in_days`, `discount_type`, `package_title`, `discount_amount`, `discount_start_date`, `discount_start_date_timestamp`, `discount_end_date_timestamp`, `discount_end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 8, 200.00, 12, 1, NULL, 0, '2023-07-28 21:38', '1690558680', '1690817880', '2023-07-31 21:38', 1, '2023-07-28 15:39:36', '2023-07-28 15:39:36'),
(2, 8, 500.00, 20, 1, NULL, 0, '2023-07-28 21:38', '1690558680', '1690817880', '2023-07-31 21:38', 1, '2023-07-28 15:39:36', '2023-07-28 15:39:36'),
(8, 11, 5000.00, 30, 1, NULL, 500, '2023-07-28 22:07', '1690560420', '1690819620', '2023-07-31 22:07', 1, '2023-07-28 17:56:57', '2023-07-28 17:56:57'),
(7, 11, 5500.00, 60, 1, 'one', 1000, '2023-07-28 22:08', '1690560480', '1690819680', '2023-07-31 22:08', 1, '2023-07-28 17:56:57', '2023-07-28 17:56:57'),
(28, 1, 3000.00, 30, 1, 'package One', NULL, NULL, '0', '0', NULL, 1, '2023-08-05 18:14:01', '2023-08-05 18:14:01'),
(40, 3, 12000.00, 12, 1, 'package One', 1000, '2023-08-05 16:23', '1691230980', '1693477380', '2023-08-31 16:23', 1, '2023-08-06 04:41:53', '2023-08-06 04:41:53'),
(39, 3, 20000.00, 12, 1, 'sdf', 1000, '2023-08-06 00:46', '1691261160', '1693421160', '2023-08-31 00:46', 1, '2023-08-06 04:41:53', '2023-08-06 04:41:53'),
(27, 1, 5000.00, 60, 1, 'package two', 500, '2023-08-05 10:20', '1691209200', '1692138000', '2023-08-16 04:20', 1, '2023-08-05 18:14:01', '2023-08-05 18:14:01');

-- --------------------------------------------------------

--
-- Table structure for table `batch_exam_teacher`
--

DROP TABLE IF EXISTS `batch_exam_teacher`;
CREATE TABLE IF NOT EXISTS `batch_exam_teacher` (
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `batch_exam_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `blog_category_id` bigint(20) UNSIGNED NOT NULL,
  `author_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `body` longtext COLLATE utf8mb4_unicode_ci,
  `slug` longtext COLLATE utf8mb4_unicode_ci,
  `is_featured` tinyint(4) DEFAULT '0',
  `hit_count` int(11) DEFAULT '0',
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blogs_blog_category_id_foreign` (`blog_category_id`),
  KEY `blogs_author_id_foreign` (`author_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blog_category_id`, `author_id`, `title`, `sub_title`, `video_url`, `image`, `body`, `slug`, `is_featured`, `hit_count`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'blogs title', 'sub title', 'https://media.geeksforgeeks.org/wp-content/uploads/20190616234019/Canvas.move_.mp4', 'backend/assets/uploaded-files/blog-management/blogs/blog--1683952505774.jpeg', '<p>kkkkkkkkkkkkkkk sdfjsld sdifjosidjfj sdsndkj d</p>', 'blogs-title', 0, 0, 1, '2023-05-12 22:35:06', '2023-05-12 23:10:05');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

DROP TABLE IF EXISTS `blog_categories`;
CREATE TABLE IF NOT EXISTS `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) UNSIGNED DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` mediumint(9) DEFAULT '1',
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_categories_parent_id_foreign` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `parent_id`, `name`, `image`, `slug`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'demo cat', NULL, 'demo-cat', 1, 1, '2023-05-12 12:23:19', '2023-05-12 12:23:19'),
(2, 1, 'UAE dirham backup', NULL, 'UAE-dirham-backup', 1, 1, '2023-05-12 12:23:26', '2023-08-01 19:19:03'),
(3, 0, 'two', NULL, 'two', 2, 1, '2023-08-01 19:17:38', '2023-08-01 19:18:57');

-- --------------------------------------------------------

--
-- Table structure for table `circulars`
--

DROP TABLE IF EXISTS `circulars`;
CREATE TABLE IF NOT EXISTS `circulars` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `circular_category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vacancy` mediumint(9) DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `publish_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_date_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire_date_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(4) DEFAULT '0',
  `order` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `circulars_circular_category_id_foreign` (`circular_category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `circulars`
--

INSERT INTO `circulars` (`id`, `circular_category_id`, `user_id`, `post_title`, `job_title`, `vacancy`, `image`, `about`, `description`, `publish_date`, `publish_date_timestamp`, `expire_date`, `expire_date_timestamp`, `status`, `slug`, `is_featured`, `order`, `created_at`, `updated_at`) VALUES
(2, 6, 1, 'job', 'circular', 10, 'backend/assets/uploaded-files/blog-management/blogs/blog--169095427520.jpg', '<p>sdfsdf</p>', '<p>sdfdsf</p>', '2023-08-02 11:30', '1690954200', '2023-08-02 11:30', '1690954200', 1, 'job', 1, 1, '2023-08-02 05:31:16', '2023-08-02 05:31:16');

-- --------------------------------------------------------

--
-- Table structure for table `circular_categories`
--

DROP TABLE IF EXISTS `circular_categories`;
CREATE TABLE IF NOT EXISTS `circular_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` mediumint(9) DEFAULT '1',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `circular_categories_parent_id_foreign` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `circular_categories`
--

INSERT INTO `circular_categories` (`id`, `parent_id`, `title`, `image`, `order`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(6, 0, 'one', NULL, 1, 'one', '1', '2023-08-02 05:30:16', '2023-08-02 05:30:16');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

DROP TABLE IF EXISTS `contact_messages`;
CREATE TABLE IF NOT EXISTS `contact_messages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `parent_model_id` bigint(20) UNSIGNED DEFAULT NULL,
  `batch_exam_section_content_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` enum('page','course','batch_exam') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `is_seen` tinyint(4) DEFAULT '0',
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `user_id`, `parent_model_id`, `batch_exam_section_content_id`, `type`, `subject`, `name`, `email`, `mobile`, `message`, `is_seen`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, NULL, NULL, 'page', 'sdfgh', 'Admin', 'admin@admin.com', '01646688970', 'sdfsdf', 1, 1, '2023-08-03 06:53:30', '2023-08-03 07:13:59');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `banner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `duration_in_month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `starting_date_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starting_date_time_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ending_date_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ending_date_time_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_type` tinyint(4) DEFAULT '0' COMMENT '1 => Fixed; 2 => Percentage',
  `discount_amount` int(11) DEFAULT NULL,
  `partial_payment` double(8,2) DEFAULT '0.00',
  `fack_student_count` mediumint(9) DEFAULT NULL,
  `enroll_student_count` mediumint(9) DEFAULT NULL,
  `featured_video_vendor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_video_url` text COLLATE utf8mb4_unicode_ci,
  `total_video` tinyint(4) DEFAULT NULL,
  `total_audio` tinyint(4) DEFAULT NULL,
  `total_exam` tinyint(4) DEFAULT NULL,
  `total_pdf` tinyint(4) DEFAULT NULL,
  `total_note` tinyint(4) DEFAULT NULL,
  `total_link` tinyint(4) DEFAULT NULL,
  `total_live` tinyint(4) DEFAULT NULL,
  `total_zip` tinyint(4) DEFAULT NULL,
  `total_file` tinyint(4) DEFAULT NULL,
  `total_written_exam` tinyint(4) DEFAULT NULL,
  `total_class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `total_hours` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(4) DEFAULT '0',
  `is_paid` tinyint(2) DEFAULT '0',
  `show_home_slider` tinyint(2) DEFAULT '0',
  `status` tinyint(4) DEFAULT '1',
  `is_approved` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `discount_start_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_start_date_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_end_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_end_date_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `sub_title`, `price`, `banner`, `description`, `duration_in_month`, `starting_date_time`, `starting_date_time_timestamp`, `ending_date_time`, `ending_date_time_timestamp`, `discount_type`, `discount_amount`, `partial_payment`, `fack_student_count`, `enroll_student_count`, `featured_video_vendor`, `featured_video_url`, `total_video`, `total_audio`, `total_exam`, `total_pdf`, `total_note`, `total_link`, `total_live`, `total_zip`, `total_file`, `total_written_exam`, `total_class`, `total_hours`, `slug`, `is_featured`, `is_paid`, `show_home_slider`, `status`, `is_approved`, `created_at`, `updated_at`, `discount_start_date`, `discount_start_date_timestamp`, `discount_end_date`, `discount_end_date_timestamp`) VALUES
(8, '৪৭তম বিসিএস এডভান্স গোল্ড লাইভ ব্যাচ', 'ভর্তি চলছে....', 2000.00, 'backend/assets/uploaded-files/course/course-banners/courses-1690987626486.jpg', '<p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">প্রথম বিসিএস এই নিশ্চিত ক্যাডার হতে;</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">৪৭তম বিসিএস-এ আমাদের \"𝐓𝐡𝐫𝐞𝐞 𝐒𝐭𝐞𝐩 𝐌𝐞𝐭𝐡𝐨𝐝\" অনুসরণ করে প্রস্তুতি নিলে,</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">এই বিসিএস-ই আপনি সফল হবেন ইনশাল্লাহ!</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\"></p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">🔥𝐒𝐭𝐞𝐩-𝟏: বিভিন্ন ক্লাসের Text বইগুলো যেমন: মাধ্যমিক এবং উচ্চ মাধ্যমিক বাংলা ব্যাকরণ, বাংলা ভাষা ও সাহিত্য, সাধারণ বিজ্ঞান, সাধারণ গণিত, ভূগোলসহ বোর্ড বইগুলো দাগিয়ে দাগিয়ে পড়ানো সহ বাংলাদেশের ইতিহাস ১৯০৫-১৯৭১, ইংরেজি 𝐅𝐫𝐞𝐞 𝐇𝐚𝐧𝐝 𝐖𝐫𝐢𝐭𝐢𝐧𝐠-এর জন্য নির্বাচিত বই সমূহ সহ অন্যান্য প্রয়োজনীয় বইগুলো পড়ানো হবে। যার ফলে মজবুত হবে আপনার বেসিক। কারন 𝐁𝐂𝐒-এর বিগত বছরের প্রশ্ন দেখলে আমরা দেখি 𝐓𝐞𝐱𝐭 বই থেকে হুবহু প্রশ্ন করা হয়।</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">🔥🔥𝐒𝐭𝐞𝐩-𝟐: এই পর্যায়ে এসে প্রিলি ও লিখিত সমন্বিত প্রস্তুতি হবে। প্রিলির যে টপিকগুলো লিখিতের সাথে মিল রয়েছে সেগুলো পড়ানো ও বাড়ির কাজ দিয়ে 𝐂𝐨𝐦𝐛𝐢𝐧𝐞𝐝 প্রস্তুতি সম্পন্ন হবে।</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">🔥🔥🔥𝐒𝐭𝐞𝐩-𝟑: এতে পুরো বিসিএস এর সিলেবাসের উপর ১৩২টি জুম লাইভ ক্লাস হবে। যেখানে আপনার ২০০ নম্বরের প্রিলির সিলেবাস কাভার হয়ে যাবে। নিশ্চিত 𝐁𝐂𝐒 প্রিলি পাশ করার উপযোগী কোর্স 𝐎𝐮𝐭𝐥𝐢𝐧𝐞 সম্পন্ন করা, 𝐌𝐨𝐝𝐞𝐥 𝐄𝐱𝐚𝐦, 𝐒𝐮𝐛𝐣𝐞𝐜𝐭𝐢𝐯𝐞 𝐄𝐱𝐚𝐦-সহ প্রচুর পরীক্ষার মাধ্যমে এই পর্যায়ে আপনাকে আত্নবিশ্বাসী ও দক্ষ করে গড়ে তোলা হবে। এর পাশাপাশি 𝐒𝐩𝐞𝐜𝐢𝐚𝐥 𝐒𝐮𝐠𝐠𝐞𝐬𝐭𝐢𝐨𝐧 𝐂𝐥𝐚𝐬𝐬, 𝐒𝐮𝐩𝐞𝐫 𝐈𝐧𝐭𝐞𝐧𝐬𝐢𝐯𝐞 𝐂𝐥𝐚𝐬𝐬 সহ পর্যাপ্ত 𝐄𝐱𝐭𝐫𝐚 𝐂𝐥𝐚𝐬𝐬 করানো হবে।</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\"></p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">👉৪৭তম বিসিএস-ই আপনার ক্যাডার নিশ্চিত করতে আমাদের 𝐄𝐱𝐜𝐥𝐮𝐬𝐢𝐯𝐞 ব্যাচ-</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">“৪৭তম বিসিএস এডভান্স গোল্ড লাইভ ব্যাচ”</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">ভর্তি চলছে…</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\"></p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">বিশেষ ছাড়ে আজই ভর্তি হয়ে নিন!</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">✅এই কোর্সে যা যা থাকছে-</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">(১) মোট ১৩২ টি মেগা লাইভ ক্লাস (প্রতিটি Live Class দেড়-দুই ঘন্টার)। [এই ক্লাসগুলো Live শেষে আপনার ভর্তিকৃত ব্যাচে Record করে দেওয়া হবে, আপনি যখন খুশি টেনে টেনে বারবার দেখতে পারবেন।]</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">(i) বাংলা ভাষা ও সাহিত্য- ২০টি ক্লাস;</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">(ii) ইংরেজি ভাষা ও সাহিত্য- ৩০টি ক্লাস;</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">(iii) গাণিতিক যুক্তি- ২০টি;</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">(iv) মানসিক দক্ষতা- ০৫টি;</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">(v) বাংলাদেশ বিষয়াবলি- ১৬টি;</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">(vi) আন্তর্জাতিক বিষয়াবলি- ১৫টি;</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">(vii) দৈনন্দিন বিজ্ঞান- ১৩টি;</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">(viii) কম্পিউটার ও তথ্য প্রযুক্তি- ০৫টি;</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">(ix) ভূগোল- ০৫টি;</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">(x) মূল্যবোধ নৈতিকতা ও সুশাসন- ০২টি;</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">(xi) সাম্প্রতিক বিষয়াবলি- ০১টি;</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">*** প্রতিটি ক্লাসের আগে বিগত ক্লাসের উপর একটি 𝐄𝐱𝐜𝐥𝐮𝐬𝐢𝐯𝐞 𝐒𝐡𝐨𝐫𝐭 𝐄𝐱𝐚𝐦 বাধ্যতামূলক দিতে হবে।</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">২) মোট ২০০+ পরীক্ষা;</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">৩) বাড়িতে পড়ার জন্য সাপ্তাহিক 𝐋𝐢𝐯𝐞 𝐇𝐨𝐦𝐞 𝐀𝐬𝐬𝐢𝐠𝐧𝐦𝐞𝐧𝐭 এবং সে অনুযায়ী পরীক্ষা।</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">৪) সিনিয়র শিক্ষকদের হ্যান্ডনোটের পাশাপাশি বিসিএস ক্যাডার স্যারদের 𝐋𝐢𝐯𝐞 পরামর্শতো থাকছেই!!!</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">৫) বিদ্যাবাড়ির 𝐑𝐞𝐬𝐞𝐚𝐫𝐜𝐡 𝐚𝐧𝐝 𝐃𝐞𝐯𝐞𝐥𝐨𝐩𝐦𝐞𝐧𝐭 টিম কর্তৃক প্রতি সপ্তাহেই 𝐋𝐢𝐯𝐞 𝐂𝐨𝐮𝐧𝐬𝐞𝐥𝐢𝐧𝐠 এর মাধ্যমে 𝐇𝐨𝐦𝐞 𝐒𝐭𝐮𝐝𝐲\'র 𝐃𝐞𝐯𝐞𝐥𝐨𝐩𝐦𝐞𝐧𝐭 করানো।</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">৬) অত্যাধুনিক ও তথ্যসমৃদ্ধ লেকচার শিট 𝐏𝐃𝐅 সম্পূর্ণ ফ্রি। [ বিঃদ্রঃ লেকচার শীটের হার্ডকপি নিতে অতিরিক্ত ১৫০০ টাকা পেমেন্ট করতে হবে।]</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">[এই লেকচার শিট গুলো থেকে বিগত বিসিএস পরীক্ষায় ১৪০+ প্রশ্ন কমন এসেছে এবং এই শিটগুলো শুধুমাত্র ভর্তিকৃত শিক্ষার্থীদের ছাড়া বাইরে কোথাও বিক্রি করা হয় না]</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">৭) 𝐒𝐮𝐛𝐣𝐞𝐜𝐭𝐢𝐯𝐞 𝐄𝐱𝐚𝐦, 𝐒𝐮𝐩𝐞𝐫 𝐌𝐨𝐝𝐞𝐥 𝐄𝐱𝐚𝐦, 𝐆𝐫𝐚𝐧𝐝 𝐅𝐢𝐧𝐚𝐥 𝐌𝐨𝐝𝐞𝐥 𝐄𝐱𝐚𝐦 সহ প্রায় ২০০টির বেশি পরীক্ষা।</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">****প্রতিটি শিক্ষার্থীকে বিশেষ Secret গ্রুপে অভিজ্ঞ Mentor’s-দের সরাসরি তত্ত্বাবধানে বাড়ির কাজ ও গাইডলাইন প্রদান করা হবে।</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">✅ওরিয়েন্টেশন ক্লাসঃ ২ আগস্ট, ২০২৩;</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\"></p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">🟥কোর্স ফি কত❓</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">👉রেগুলার ফি ১৫ হাজার টাকা। তবে, প্রথম ২০ জন পাচ্ছেন ৫০% ছাড়ে মাত্র ৭৫০০ টাকায় ভর্তির সুবর্ণ সুযোগ।</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\"></p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">☎ভর্তি সংক্রান্ত যেকোনো তথ্য জানতে এখনই কল করুনঃ</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">📞01896060800</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">📞01896060801</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">📞01896060802</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">📞01896060803</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">📞01896060804</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">📞01896060805</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">📞01896060806</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">📞01896060807</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">📞01896060808</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">📞01896060809</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">📞01896060810</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">📞01896060811</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">📞01896060812</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">📞01896060813</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">📞01896060814</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\"></p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: rgb(20, 20, 20); letter-spacing: 0.1px;\">আপনার সফলতার শুরু হোক বিদ্যাবাড়িতেই 💯</p>', '3', '2023-08-02 20:46', '1690987560', '2023-08-31 20:46', '1693493160', 1, 123, 500.00, 12, NULL, NULL, 'dBIrr2l8zEQ', 1, 5, 1, 5, 6, 3, 5, 8, 9, 8, '10', '23', '৪৭তম-বিসিএস-এডভান্স-গোল্ড-লাইভ-ব্যাচ', 0, 1, 0, 1, 0, '2023-08-02 14:47:07', '2023-08-02 14:47:07', '2023-08-02 20:46', '1690987560', '2023-08-24 20:46', '1692888360');

-- --------------------------------------------------------

--
-- Table structure for table `course_categories`
--

DROP TABLE IF EXISTS `course_categories`;
CREATE TABLE IF NOT EXISTS `course_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT '0',
  `is_featured` tinyint(4) DEFAULT '0',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `course_categories_parent_id_foreign` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_categories`
--

INSERT INTO `course_categories` (`id`, `name`, `parent_id`, `note`, `icon`, `image`, `meta_title`, `meta_description`, `slug`, `order`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(7, 'UAE dirham backup', 0, 'sdf', NULL, 'backend/assets/uploaded-files/course/course-images/course-category-1683350246798.png', NULL, NULL, 'UAE-dirham-backup', 1, 0, '0', '2023-04-27 09:13:33', '2023-05-05 23:17:26'),
(8, 'sdf', 9, '<p>gxchvjbknlm</p>', 'backend/assets/uploaded-files/course/course-images/course-category-1683690593978.png', 'backend/assets/uploaded-files/course/course-images/course-category-1683690593978.png', NULL, NULL, 'sdf', 1, 0, '1', '2023-04-27 09:13:47', '2023-06-04 13:24:53'),
(9, 'lkjmn,m', 0, NULL, NULL, 'backend/assets/uploaded-files/course/course-images/course-category-168701560684.jpg', NULL, NULL, 'lkjmn,m', 3, 0, '1', '2023-04-27 12:13:27', '2023-07-14 09:59:31'),
(10, 'likguyguk', 8, '\';l,mbjmn', 'backend/assets/uploaded-files/course/course-images/course-category-1682743784591.png', 'backend/assets/uploaded-files/course/course-images/course-category-1682743784591.png', NULL, NULL, 'likguyguk', 1, 0, '1', '2023-04-28 10:42:00', '2023-06-04 13:24:53'),
(16, 'primary', 7, '<p>xcvxccx</p>', NULL, 'backend/assets/uploaded-files/course/course-images/course-category-1687015362764.jpg', NULL, NULL, 'primary', 1, 1, '1', '2023-06-17 09:22:42', '2023-07-14 09:59:31'),
(15, 'yo', 0, NULL, NULL, 'backend/assets/uploaded-files/course/course-images/course-category-1687015593973.jpg', NULL, NULL, 'yo', 2, 0, '1', '2023-06-17 05:12:56', '2023-07-14 09:59:31'),
(17, 'dashboard', 16, NULL, NULL, NULL, NULL, NULL, 'dashboard', 1, 1, '1', '2023-07-14 09:41:19', '2023-07-21 16:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `course_coupons`
--

DROP TABLE IF EXISTS `course_coupons`;
CREATE TABLE IF NOT EXISTS `course_coupons` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('Flat','Percentage') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percentage_value` mediumint(9) DEFAULT NULL,
  `discount_amount` int(11) DEFAULT NULL,
  `flat_discount` mediumint(9) DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `expire_date_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire_date_time_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `available_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avaliable_from_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avaliable_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avaliable_to_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_course_category`
--

DROP TABLE IF EXISTS `course_course_category`;
CREATE TABLE IF NOT EXISTS `course_course_category` (
  `course_category_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  KEY `course_course_category_course_category_id_foreign` (`course_category_id`),
  KEY `course_course_category_course_id_foreign` (`course_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_course_category`
--

INSERT INTO `course_course_category` (`course_category_id`, `course_id`) VALUES
(15, 7),
(9, 7),
(9, 8);

-- --------------------------------------------------------

--
-- Table structure for table `course_exam_results`
--

DROP TABLE IF EXISTS `course_exam_results`;
CREATE TABLE IF NOT EXISTS `course_exam_results` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_section_content_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `xm_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `written_xm_file` text COLLATE utf8mb4_unicode_ci,
  `provided_ans` text COLLATE utf8mb4_unicode_ci,
  `result_mark` tinyint(4) DEFAULT '0',
  `is_reviewed` tinyint(4) DEFAULT '0',
  `required_time` mediumint(9) DEFAULT '0',
  `status` enum('pass','fail','pending') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_exam_results`
--

INSERT INTO `course_exam_results` (`id`, `course_section_content_id`, `user_id`, `xm_type`, `written_xm_file`, `provided_ans`, `result_mark`, `is_reviewed`, `required_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 9, 14, 'exam', NULL, '{\"13\":{\"answer\":\"20\"},\"12\":{\"answer\":\"17\"},\"11\":{\"answer\":\"11\"},\"14\":{\"answer\":\"25\"}}', 1, 0, 1600, 'fail', '2023-07-15 02:29:13', '2023-07-15 02:29:13'),
(2, 9, 1, 'exam', NULL, '{\"13\":{\"answer\":\"19\"},\"12\":{\"answer\":\"16\"},\"11\":{\"answer\":\"14\"},\"14\":{\"answer\":\"24\"},\"15\":{\"answer\":\"27\"}}', 1, 0, 11, 'fail', '2023-07-15 04:53:56', '2023-07-15 04:53:56');

-- --------------------------------------------------------

--
-- Table structure for table `course_orders`
--

DROP TABLE IF EXISTS `course_orders`;
CREATE TABLE IF NOT EXISTS `course_orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `checked_by` bigint(20) UNSIGNED DEFAULT NULL,
  `order_invoice_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor` enum('bkash','nagad','rocket') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `txt_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` mediumint(9) DEFAULT '0',
  `total_amount` mediumint(9) DEFAULT '0',
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_amount` mediumint(9) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '0 => pending, 1 => Approved, 2 => canceled',
  `contact_status` enum('pending','not_answered','confirmed') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `course_orders_course_id_foreign` (`course_id`),
  KEY `course_orders_user_id_foreign` (`user_id`),
  KEY `course_orders_checked_by_foreign` (`checked_by`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_orders`
--

INSERT INTO `course_orders` (`id`, `course_id`, `user_id`, `checked_by`, `order_invoice_number`, `payment_method`, `vendor`, `paid_to`, `paid_from`, `txt_id`, `payment_status`, `paid_amount`, `total_amount`, `coupon_code`, `coupon_amount`, `status`, `contact_status`, `created_at`, `updated_at`) VALUES
(9, 7, 14, NULL, '664381', 'cod', 'nagad', '01423456789', '01423456789', 'sdfsdfsdf', 'complete', 1950, 1950, NULL, NULL, 1, 'pending', '2023-07-21 18:59:51', '2023-07-21 19:00:58'),
(10, 7, 1, NULL, '368363', 'cod', 'bkash', '01646688970', '01646688970', 'szdfsf', 'pending', NULL, 1950, NULL, NULL, 0, 'pending', '2023-07-29 06:47:47', '2023-07-29 06:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `course_routines`
--

DROP TABLE IF EXISTS `course_routines`;
CREATE TABLE IF NOT EXISTS `course_routines` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_time_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) DEFAULT NULL,
  `is_fack` tinyint(2) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_sections`
--

DROP TABLE IF EXISTS `course_sections`;
CREATE TABLE IF NOT EXISTS `course_sections` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `available_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `is_paid` tinyint(4) DEFAULT '0',
  `status` tinyint(4) DEFAULT '1',
  `order` mediumint(9) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `course_sections_course_id_foreign` (`course_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_sections`
--

INSERT INTO `course_sections` (`id`, `course_id`, `title`, `available_at`, `note`, `is_paid`, `status`, `order`, `created_at`, `updated_at`) VALUES
(6, 7, 'one', '2023-07-21 23:57', NULL, 1, 1, 1, '2023-07-21 17:57:37', '2023-07-21 17:57:37');

-- --------------------------------------------------------

--
-- Table structure for table `course_section_contents`
--

DROP TABLE IF EXISTS `course_section_contents`;
CREATE TABLE IF NOT EXISTS `course_section_contents` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_section_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT '0',
  `content_type` enum('pdf','video','note','live','link','assignment','testmoj','exam','written_exam') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf_link` text COLLATE utf8mb4_unicode_ci,
  `pdf_file` text COLLATE utf8mb4_unicode_ci,
  `note_content` longtext COLLATE utf8mb4_unicode_ci,
  `video_link` text COLLATE utf8mb4_unicode_ci,
  `video_vendor` enum('youtube','vimeo','private') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `live_source_type` enum('facebook','meet','youtube','zoom','others') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `live_link` text COLLATE utf8mb4_unicode_ci,
  `live_start_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `live_start_time_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `live_end_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `live_end_time_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `live_msg` text COLLATE utf8mb4_unicode_ci,
  `regular_link` text COLLATE utf8mb4_unicode_ci,
  `assignment_question` text COLLATE utf8mb4_unicode_ci,
  `assignment_instruction` text COLLATE utf8mb4_unicode_ci,
  `assignment_total_mark` mediumint(9) DEFAULT NULL,
  `assignment_pass_mark` mediumint(9) DEFAULT NULL,
  `assignment_start_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assignment_start_time_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assignment_end_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assignment_end_time_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assignment_result_publish_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assignment_result_publish_time_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testmoj_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testmoj_result_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testmoj_xm_duration_in_minutes` mediumint(9) DEFAULT NULL,
  `testmoj_total_questions` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testmoj_start_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testmoj_start_time_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testmoj_result_publish_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testmoj_result_publish_time_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_mode` enum('exam','practice','group') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_duration_in_minutes` mediumint(9) DEFAULT NULL,
  `exam_total_questions` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_per_question_mark` tinyint(4) DEFAULT '1',
  `exam_negative_mark` double(3,2) DEFAULT '0.00',
  `exam_pass_mark` tinyint(4) DEFAULT NULL,
  `exam_is_strict` tinyint(4) DEFAULT '0',
  `exam_start_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_start_time_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_end_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_end_time_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_result_publish_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_result_publish_time_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_total_subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `written_exam_duration_in_minutes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `written_total_questions` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `written_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `written_is_strict` tinyint(4) DEFAULT NULL,
  `written_start_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `written_start_time_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `written_end_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `written_end_time_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `written_publish_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `written_publish_time_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `written_total_subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_paid` tinyint(4) DEFAULT '0',
  `order` mediumint(9) DEFAULT '1',
  `status` tinyint(4) DEFAULT '1',
  `available_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `available_at_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `course_section_contents_course_section_id_foreign` (`course_section_id`),
  KEY `course_section_contents_parent_id_foreign` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_section_contents`
--

INSERT INTO `course_section_contents` (`id`, `course_section_id`, `parent_id`, `content_type`, `title`, `pdf_link`, `pdf_file`, `note_content`, `video_link`, `video_vendor`, `live_source_type`, `live_link`, `live_start_time`, `live_start_time_timestamp`, `live_end_time`, `live_end_time_timestamp`, `live_msg`, `regular_link`, `assignment_question`, `assignment_instruction`, `assignment_total_mark`, `assignment_pass_mark`, `assignment_start_time`, `assignment_start_time_timestamp`, `assignment_end_time`, `assignment_end_time_timestamp`, `assignment_result_publish_time`, `assignment_result_publish_time_timestamp`, `testmoj_link`, `testmoj_result_link`, `testmoj_xm_duration_in_minutes`, `testmoj_total_questions`, `testmoj_start_time`, `testmoj_start_time_timestamp`, `testmoj_result_publish_time`, `testmoj_result_publish_time_timestamp`, `exam_mode`, `exam_duration_in_minutes`, `exam_total_questions`, `exam_per_question_mark`, `exam_negative_mark`, `exam_pass_mark`, `exam_is_strict`, `exam_start_time`, `exam_start_time_timestamp`, `exam_end_time`, `exam_end_time_timestamp`, `exam_result_publish_time`, `exam_result_publish_time_timestamp`, `exam_total_subject`, `written_exam_duration_in_minutes`, `written_total_questions`, `written_description`, `written_is_strict`, `written_start_time`, `written_start_time_timestamp`, `written_end_time`, `written_end_time_timestamp`, `written_publish_time`, `written_publish_time_timestamp`, `written_total_subject`, `is_paid`, `order`, `status`, `available_at`, `available_at_timestamp`, `created_at`, `updated_at`) VALUES
(15, 6, NULL, 'exam', 'fjhkjlk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'practice', 20, '20', 67, 1.00, 5, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2023-07-21 23:55', '1689962100', '2023-07-21 17:58:26', '2023-07-21 17:58:26'),
(16, 6, NULL, 'video', 'vid', NULL, NULL, NULL, 'https://www.youtube.com/watch?v=5UhmcdWCw-8', 'youtube', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2023-07-22 01:55', '1689969300', '2023-07-21 19:03:15', '2023-07-21 19:20:43');

-- --------------------------------------------------------

--
-- Table structure for table `course_section_content_question_store`
--

DROP TABLE IF EXISTS `course_section_content_question_store`;
CREATE TABLE IF NOT EXISTS `course_section_content_question_store` (
  `question_store_id` bigint(20) UNSIGNED NOT NULL,
  `course_section_content_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_section_content_question_store`
--

INSERT INTO `course_section_content_question_store` (`question_store_id`, `course_section_content_id`) VALUES
(13, 9),
(12, 9),
(11, 9),
(14, 9),
(15, 9),
(4, 10),
(16, 10),
(17, 10),
(18, 10),
(36, 11),
(35, 11),
(34, 11),
(33, 11),
(37, 11),
(38, 11),
(39, 11),
(40, 11),
(32, 11),
(31, 11),
(30, 11),
(29, 11),
(45, 9),
(46, 9);

-- --------------------------------------------------------

--
-- Table structure for table `course_student`
--

DROP TABLE IF EXISTS `course_student`;
CREATE TABLE IF NOT EXISTS `course_student` (
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_teacher`
--

DROP TABLE IF EXISTS `course_teacher`;
CREATE TABLE IF NOT EXISTS `course_teacher` (
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_teacher`
--

INSERT INTO `course_teacher` (`teacher_id`, `course_id`) VALUES
(3, 8),
(3, 7),
(7, 7);

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

DROP TABLE IF EXISTS `exams`;
CREATE TABLE IF NOT EXISTS `exams` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `exam_category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `xm_type` enum('MCQ','Written') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xm_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xm_date_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xm_start_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xm_start_time_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xm_end_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xm_end_time_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xm_duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_mark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `xm_pass_mark` tinyint(4) DEFAULT '0',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_paid` tinyint(4) DEFAULT '0',
  `is_featured` tinyint(4) DEFAULT '0',
  `status` tinyint(4) DEFAULT '1',
  `price` float(10,2) DEFAULT '0.00',
  `xm_subscription_duration` tinyint(3) DEFAULT '0',
  `per_question_mark` tinyint(2) DEFAULT '1',
  `negative_mark` float(10,2) DEFAULT '0.00',
  `subject_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mark_base_result` tinyint(2) DEFAULT '0',
  `is_master_exam` tinyint(2) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `exam_category_id`, `title`, `slug`, `xm_type`, `xm_date`, `xm_date_timestamp`, `xm_start_time`, `xm_start_time_timestamp`, `xm_end_time`, `xm_end_time_timestamp`, `xm_duration`, `total_mark`, `xm_pass_mark`, `image`, `is_paid`, `is_featured`, `status`, `price`, `xm_subscription_duration`, `per_question_mark`, `negative_mark`, `subject_name`, `mark_base_result`, `is_master_exam`, `created_at`, `updated_at`) VALUES
(1, 3, 'Practice MCQ Exam', 'Practice-MCQ-Exam', 'MCQ', '2023-06-16', '1686873600', '02:37', '1687142220', '01:55', '1687139700', '10', '5', 3, 'backend/assets/uploaded-files/exam-images/xm--1687182608926.jpg', 0, 0, 1, 0.00, 0, 1, 0.00, NULL, 0, 0, '2023-06-14 13:38:18', '2023-06-19 07:50:08'),
(2, 2, 'Practice Written Exam', 'Practice-Written-Exam', 'Written', '2023-06-17', '1686960000', '11:18', '1687173480', '11:18', '1687173480', '20', '20', 5, 'backend/assets/uploaded-files/exam-images/xm--1687182602593.jpg', 1, 0, 1, 0.00, 0, 1, 0.00, NULL, 0, 0, '2023-06-16 23:19:32', '2023-06-19 07:50:02'),
(3, 3, 'Paid Exam', 'Paid-Exam', 'MCQ', '2023-06-21', '1687305600', '15:27', '1687188420', '05:27', '1687152420', '20', '20', 5, 'backend/assets/uploaded-files/exam-images/xm--1687182595441.jpg', 1, 0, 1, 0.00, 0, 1, 0.00, NULL, 0, 0, '2023-06-19 03:28:23', '2023-06-19 07:49:56'),
(4, 2, 'Bcs New Exam', 'Bcs-New-Exam', 'Written', '2023-07-03', '1688342400', '11:29', '1688383740', '16:29', '1688401740', '12', '34', 2, 'backend/assets/uploaded-files/exam-images/xm--1688362252825.jpg', 1, 0, 1, 100.00, 0, 1, 0.00, NULL, 0, 0, '2023-07-02 23:30:52', '2023-07-02 23:30:52'),
(5, 3, 'slot one xm', 'slot-one-xm', 'Written', '2023-07-03', '1688342400', '11:31', '1688383860', '05:31', '1688362260', '20', '234', 5, 'backend/assets/uploaded-files/exam-images/xm--1688362299817.jpg', 1, 0, 1, 2000.00, 0, 1, 0.00, NULL, 0, 0, '2023-07-02 23:31:39', '2023-07-02 23:31:39'),
(6, 6, 'slot two xm', 'slot-two-xm', 'Written', '2023-07-03', '1688342400', '11:31', '1688383860', '05:32', '1688362320', '20', '34', 3, 'backend/assets/uploaded-files/exam-images/xm--1688362341301.jpg', 1, 0, 1, 1000.00, 0, 1, 0.00, NULL, 0, 0, '2023-07-02 23:32:21', '2023-07-02 23:32:21'),
(7, 7, 'free exam', 'free-exam', 'Written', '2023-07-03', '1688342400', '12:56', '1688388960', '04:56', '1688360160', '20', '20', 5, 'backend/assets/uploaded-files/exam-images/xm--1688367415829.jpg', 0, 0, 1, 2000.00, 0, 1, 0.00, NULL, 0, 0, '2023-07-03 00:56:55', '2023-07-03 00:56:55'),
(8, 2, 'primary bullet exam class 10', 'primary-bullet-exam-class-10', 'Written', '2023-07-04', '1688428800', '23:42', '1688514120', '23:42', '1688514120', '20', '100', 5, 'backend/assets/uploaded-files/exam-images/xm--1688492576918.jpg', 1, 0, 1, 23456.00, 0, 1, 0.00, NULL, 0, 0, '2023-07-04 11:42:56', '2023-07-04 11:42:56'),
(9, 2, 'xxxxx', 'xxxxx', 'MCQ', NULL, '0', '2023-07-21 00:42', '1689878520', '2023-07-29 00:42', '1690569720', '20', NULL, 5, 'backend/assets/uploaded-files/exam-images/xm--1689879233580.jpeg', 1, 1, 1, 2000.00, 90, 1, 0.25, 'bangla', 1, 0, '2023-07-20 18:53:54', '2023-07-20 18:53:54');

-- --------------------------------------------------------

--
-- Table structure for table `exam_categories`
--

DROP TABLE IF EXISTS `exam_categories`;
CREATE TABLE IF NOT EXISTS `exam_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `exam_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_class_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `has_free_xm` tinyint(4) DEFAULT '0',
  `status` tinyint(4) DEFAULT '1',
  `order` int(11) DEFAULT '1',
  `price` float(10,2) DEFAULT '0.00',
  `open_for_sale` tinyint(4) DEFAULT '0',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xm_subscription_duration` tinyint(4) DEFAULT '1',
  `is_master_exam` tinyint(2) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_categories`
--

INSERT INTO `exam_categories` (`id`, `exam_category_id`, `name`, `icon_class_code`, `icon`, `image`, `description`, `has_free_xm`, `status`, `order`, `price`, `open_for_sale`, `slug`, `valid_from`, `valid_to`, `xm_subscription_duration`, `is_master_exam`, `created_at`, `updated_at`) VALUES
(1, 0, 'BCS New', NULL, NULL, NULL, '<p><br></p>', 0, 1, 1, 100.00, 1, 'BCS-New', NULL, NULL, 12, 0, '2023-06-05 00:59:36', '2023-07-22 03:33:12'),
(2, 1, 'BCS new', NULL, NULL, NULL, '<p><br></p>', 0, 1, 1, 1200.00, 0, 'BCS-new', NULL, NULL, 11, 0, '2023-06-05 00:59:46', '2023-07-21 20:08:58'),
(3, 2, 'Slot One', NULL, NULL, 'backend/assets/uploaded-files/course/course-images/course-category-1688050406436.jpg', '<p><br></p>', 0, 1, 1, 0.00, 0, 'Slot-One', NULL, NULL, 1, 0, '2023-06-05 04:55:54', '2023-07-22 03:33:23'),
(6, 3, 'slot two', NULL, NULL, NULL, '<p><br></p>', 0, 1, 1, 600.00, 0, 'slot-two', NULL, NULL, 1, 0, '2023-06-27 11:14:09', '2023-07-22 03:33:32'),
(7, 0, 'Bcs Old', NULL, NULL, NULL, '<p><br></p>', 0, 1, 2, 500.00, 1, 'Bcs-Old', NULL, NULL, 30, 0, '2023-06-29 08:25:47', '2023-07-22 03:33:00'),
(9, 7, 'dd', NULL, NULL, NULL, '<p><br></p>', 0, 1, 1, 2000.00, 0, 'dd', NULL, NULL, 123, 0, '2023-07-21 20:09:15', '2023-07-21 20:09:36');

-- --------------------------------------------------------

--
-- Table structure for table `exam_orders`
--

DROP TABLE IF EXISTS `exam_orders`;
CREATE TABLE IF NOT EXISTS `exam_orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `exam_category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_invoice_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor` enum('bkash','nagad','rocket') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_form` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `txt_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` double(8,2) DEFAULT '0.00',
  `total_amount` double(8,2) DEFAULT NULL,
  `status` enum('pending','approved','canceled') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `contact_status` enum('pending','not_answered','confirmed') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `xm_order_checked_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_orders`
--

INSERT INTO `exam_orders` (`id`, `exam_category_id`, `user_id`, `order_invoice_number`, `payment_method`, `vendor`, `paid_to`, `paid_form`, `txt_id`, `paid_amount`, `total_amount`, `status`, `contact_status`, `xm_order_checked_by`, `created_at`, `updated_at`) VALUES
(2, 2, 14, '222509', 'cod', 'bkash', '123456', '234565432', 'sdfsdf', 0.00, NULL, 'approved', 'confirmed', NULL, '2023-06-21 02:57:35', '2023-07-02 08:50:37'),
(3, 3, 14, '419898', 'cod', 'bkash', '123454321', '2324234234', 'asdadasd', 0.00, NULL, 'pending', 'pending', NULL, '2023-06-29 12:46:13', '2023-06-29 12:46:13'),
(4, 1, 1, '103840', 'cod', 'bkash', '1234567', '12345612', 'ewefwef', 0.00, NULL, 'pending', 'pending', NULL, '2023-07-22 04:16:56', '2023-07-22 04:16:56'),
(5, 1, 1, '145269', 'cod', 'nagad', '123456', '213456', 'asdfsdfsd', 0.00, NULL, 'pending', 'pending', NULL, '2023-07-22 04:17:17', '2023-07-22 04:17:17'),
(6, 1, 1, '234447', 'cod', 'bkash', '2345', '2345', 'ewefwef', 0.00, NULL, 'pending', 'pending', NULL, '2023-07-22 04:24:35', '2023-07-22 04:24:35');

-- --------------------------------------------------------

--
-- Table structure for table `exam_question_store`
--

DROP TABLE IF EXISTS `exam_question_store`;
CREATE TABLE IF NOT EXISTS `exam_question_store` (
  `question_store_id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_question_store`
--

INSERT INTO `exam_question_store` (`question_store_id`, `exam_id`) VALUES
(17, 2),
(16, 2),
(13, 1),
(12, 1),
(11, 1),
(14, 1),
(15, 1),
(18, 2),
(19, 2),
(13, 3),
(12, 3),
(11, 3),
(14, 3),
(15, 3),
(16, 4),
(19, 5),
(17, 6),
(19, 7),
(16, 8),
(17, 8),
(18, 8),
(31, 9),
(30, 9),
(33, 9),
(34, 9),
(35, 9),
(36, 9),
(37, 9),
(38, 9),
(39, 9),
(40, 9),
(45, 9),
(46, 9);

-- --------------------------------------------------------

--
-- Table structure for table `exam_results`
--

DROP TABLE IF EXISTS `exam_results`;
CREATE TABLE IF NOT EXISTS `exam_results` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `xm_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `written_xm_file` text COLLATE utf8mb4_unicode_ci,
  `provided_ans` text COLLATE utf8mb4_unicode_ci,
  `result_mark` tinyint(4) DEFAULT '0',
  `is_reviewed` tinyint(4) DEFAULT '0',
  `status` enum('pass','fail','pending') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `required_time` mediumint(7) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_results`
--

INSERT INTO `exam_results` (`id`, `exam_id`, `user_id`, `xm_type`, `written_xm_file`, `provided_ans`, `result_mark`, `is_reviewed`, `status`, `required_time`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'MCQ', NULL, '{\"13\":{\"answer\":\"19\"},\"12\":{\"answer\":\"16\"},\"11\":{\"answer\":\"13\"},\"14\":{\"answer\":\"26\"},\"15\":{\"answer\":\"30\"}}', 1, 0, 'fail', 0, '2023-06-16 10:56:52', '2023-06-16 10:56:52'),
(2, 1, 1, 'MCQ', NULL, '{\"13\":{\"answer\":\"21\"},\"12\":{\"answer\":\"15\"},\"11\":{\"answer\":\"12\"},\"14\":{\"answer\":\"25\"},\"15\":{\"answer\":\"29\"}}', 4, 0, 'fail', 0, '2023-06-16 11:01:15', '2023-06-16 11:01:15'),
(3, 1, 1, 'MCQ', NULL, '{\"13\":{\"answer\":\"21\"},\"12\":{\"answer\":\"15\"},\"11\":{\"answer\":\"12\"},\"14\":{\"answer\":\"26\"},\"15\":{\"answer\":\"30\"}}', 4, 0, 'pass', 0, '2023-06-16 11:12:41', '2023-06-16 11:12:41'),
(9, 1, 1, 'MCQ', NULL, '{\"13\":{\"answer\":\"19\"}}', 0, 0, 'fail', 0, '2023-06-17 08:05:37', '2023-06-17 08:05:37'),
(10, 1, 14, 'MCQ', NULL, '{\"13\":{\"answer\":\"20\"},\"12\":{\"answer\":\"17\"},\"11\":{\"answer\":\"13\"},\"14\":{\"answer\":\"25\"}}', 1, 0, 'fail', 0, '2023-06-17 10:16:10', '2023-06-17 10:16:10'),
(8, 2, 1, 'Written', 'backend/assets/uploaded-files/written-xm-ans-files/353921686999911.pdf', NULL, 20, 0, 'pass', 0, '2023-06-17 05:05:13', '2023-06-27 09:15:55'),
(7, 2, 1, 'Written', 'backend/assets/uploaded-files/written-xm-ans-files/736501686997986_5620.pdf', NULL, 50, 0, 'pass', 0, '2023-06-17 04:33:07', '2023-06-27 09:16:45'),
(11, 1, 1, 'MCQ', NULL, '{\"12\":{\"answer\":\"16\"}}', 0, 0, 'fail', 0, '2023-06-18 11:42:25', '2023-06-18 11:42:25'),
(12, 1, 1, 'MCQ', NULL, '{\"12\":{\"answer\":\"18\"},\"11\":{\"answer\":\"14\"},\"14\":{\"answer\":\"24\"},\"15\":{\"answer\":\"27\"}}', 0, 0, 'fail', 0, '2023-06-19 11:10:54', '2023-06-19 11:10:54'),
(13, 1, 1, 'MCQ', NULL, '{\"13\":{\"answer\":\"19\"}}', 0, 0, 'fail', 0, '2023-06-19 11:28:07', '2023-06-19 11:28:07');

-- --------------------------------------------------------

--
-- Table structure for table `exam_subscription_packages`
--

DROP TABLE IF EXISTS `exam_subscription_packages`;
CREATE TABLE IF NOT EXISTS `exam_subscription_packages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid_form` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `price` double(10,2) DEFAULT NULL,
  `sell_qtn` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_subscription_packages`
--

INSERT INTO `exam_subscription_packages` (`id`, `name`, `slug`, `valid_form`, `valid_to`, `banner`, `status`, `price`, `sell_qtn`, `created_at`, `updated_at`) VALUES
(3, 'demo', 'demo', '2023-06-19 23:36', '2023-06-30 23:36', 'backend/assets/uploaded-files/xm-subscription-package/xm-sub-pac--168719622738.jpg', 1, 2000.00, 0, '2023-06-19 11:37:07', '2023-06-19 11:37:07'),
(4, 'package 2', 'package-2', '2023-06-20 22:50', '2023-06-30 22:50', 'backend/assets/uploaded-files/xm-subscription-package/xm-sub-pac--1687279859754.jpg', 1, 1000.00, 0, '2023-06-20 10:50:59', '2023-06-20 10:50:59'),
(5, 'package 3', 'package-3', '2023-06-20 22:51', '2023-06-29 22:51', 'backend/assets/uploaded-files/xm-subscription-package/xm-sub-pac--1687279901615.jpg', 1, 3000.00, 0, '2023-06-20 10:51:41', '2023-06-20 10:51:41'),
(6, 'xxxx', 'xxxx', '2023-06-20 22:52', '2023-06-28 22:52', 'backend/assets/uploaded-files/xm-subscription-package/xm-sub-pac--1687279932237.jpg', 1, 500.00, 0, '2023-06-20 10:52:13', '2023-06-20 10:52:13');

-- --------------------------------------------------------

--
-- Table structure for table `exam_subscription_package_user`
--

DROP TABLE IF EXISTS `exam_subscription_package_user`;
CREATE TABLE IF NOT EXISTS `exam_subscription_package_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `exam_subscription_package_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_user`
--

DROP TABLE IF EXISTS `exam_user`;
CREATE TABLE IF NOT EXISTS `exam_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
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
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
CREATE TABLE IF NOT EXISTS `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci,
  `sub_title` text COLLATE utf8mb4_unicode_ci,
  `banner` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `sub_title`, `banner`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Cert Ceremony', 'Cert Ceremony', 'backend/assets/uploaded-files/gallery/gallery/gallery--1690904178873.jpg', '<p>sdkljlsd</p>', 1, '2023-08-01 14:37:39', '2023-08-01 15:36:19'),
(2, 'tow', 'two', 'backend/assets/uploaded-files/gallery/gallery/gallery--1690904201909.png', '<p>sdlfjksdjhf</p>', 1, '2023-08-01 15:36:41', '2023-08-01 15:36:41');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

DROP TABLE IF EXISTS `gallery_images`;
CREATE TABLE IF NOT EXISTS `gallery_images` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `gallery_id` bigint(20) UNSIGNED NOT NULL,
  `image_url` text COLLATE utf8mb4_unicode_ci,
  `image_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_size` mediumint(9) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `gallery_id`, `image_url`, `image_type`, `image_size`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'backend/assets/uploaded-files/gallery/gallery-images/gallery-image--1690911508399.jpg', 'image/jpeg', NULL, NULL, 1, '2023-08-01 17:38:29', '2023-08-01 17:38:29'),
(2, 1, 'backend/assets/uploaded-files/gallery/gallery-images/gallery-image--1690911509989.jpg', 'image/jpeg', NULL, NULL, 1, '2023-08-01 17:38:29', '2023-08-01 17:38:29'),
(3, 1, 'backend/assets/uploaded-files/gallery/gallery-images/gallery-image--1690911509464.jpg', 'image/jpeg', NULL, NULL, 1, '2023-08-01 17:38:29', '2023-08-01 17:38:29');

-- --------------------------------------------------------

--
-- Table structure for table `lbs_log`
--

DROP TABLE IF EXISTS `lbs_log`;
CREATE TABLE IF NOT EXISTS `lbs_log` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `provider` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_json` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `response_json` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lbs_log`
--

INSERT INTO `lbs_log` (`id`, `provider`, `request_json`, `response_json`, `created_at`, `updated_at`) VALUES
(1, 'Xenon\\LaravelBDSms\\Provider\\MimSms', '{\"config\":{\"senderid\":\"\",\"api_key\":\"\",\"type\":\"\"},\"mobile\":\"8801646688970\",\"message\":\"This is test message\"}', '\"<!DOCTYPE html>\\r\\n<html>\\r\\n<head>\\r\\n  <meta charset=\\\"utf-8\\\">\\r\\n  <meta http-equiv=\\\"X-UA-Compatible\\\" content=\\\"IE=edge\\\">\\r\\n  <title>MiM SMS | Log in<\\/title>\\r\\n  <meta content=\\\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\\\" name=\\\"viewport\\\">\\r\\n  <meta name=\\\"google-signin-client_id\\\" content=\\\".apps.googleusercontent.com\\\">\\r\\n  <!-- Styles -->\\r\\n    <link href=\\\"\\/\\/fonts.googleapis.com\\/icon?family=Material+Icons\\\" rel=\\\"stylesheet\\\">\\r\\n\\t<link href=\\\"assets\\/css\\/font-awesome.min.css\\\" rel=\\\"stylesheet\\\" type=\\\"text\\/css\\\" \\/>\\r\\n    <link href=\\\"assets\\/plugins\\/material-preloader\\/css\\/materialPreloader.min.css\\\" rel=\\\"stylesheet\\\">        \\r\\n\\t<link href=\\\"assets\\/plugins\\/sweetalert\\/sweetalert.css\\\" rel=\\\"stylesheet\\\" type=\\\"text\\/css\\\"\\/> \\r\\n   <!-- Theme Styles -->\\r\\n   <link href=\\\"assets\\/css\\/alpha.min.css\\\" rel=\\\"stylesheet\\\" type=\\\"text\\/css\\\"\\/>\\r\\n         \\r\\n  <link rel=\\\"stylesheet\\\" href=\\\"bootstrap\\/css\\/bootstrap.min.css\\\">\\r\\n  <link rel=\\\"stylesheet\\\" href=\\\"https:\\/\\/cdnjs.cloudflare.com\\/ajax\\/libs\\/font-awesome\\/4.5.0\\/css\\/font-awesome.min.css\\\">\\r\\n  <link rel=\\\"stylesheet\\\" href=\\\"https:\\/\\/cdnjs.cloudflare.com\\/ajax\\/libs\\/ionicons\\/2.0.1\\/css\\/ionicons.min.css\\\">\\r\\n  <link rel=\\\"stylesheet\\\" href=\\\"dist\\/css\\/AdminLTE.min.css?1685518937\\\">\\r\\n  <link rel=\\\"stylesheet\\\" href=\\\"plugins\\/iCheck\\/square\\/blue.css\\\">\\r\\n\\r\\n  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->\\r\\n  <!-- WARNING: Respond.js doesn\'t work if you view the page via file:\\/\\/ -->\\r\\n  <!--[if lt IE 9]>\\r\\n  <script src=\\\"https:\\/\\/oss.maxcdn.com\\/html5shiv\\/3.7.3\\/html5shiv.min.js\\\"><\\/script>\\r\\n  <script src=\\\"https:\\/\\/oss.maxcdn.com\\/respond\\/1.4.2\\/respond.min.js\\\"><\\/script>\\r\\n  <![endif]-->\\r\\n  <style>\\r\\n .login-box,.register-box, .btn .primary {border: 3px solid #000000; background: #000000;}\\r\\n body, .login-page {background: url(files\\/temp\\/28491656342663.gif)no-repeat center center fixed; \\r\\n  -webkit-background-size: cover;\\r\\n  -moz-background-size: cover;\\r\\n  -o-background-size: cover;\\r\\n  background-size: cover; background-color: #000000;}\\r\\n.dropdown { position: absolute; display: inline-block; top: 5px; right: 7px; }\\r\\n.dropdown span{ color: #fff; background: #000; padding: 3px 10px; font-size: 13px; font-weight: bold; border: 1px solid #fff; }\\r\\n.dropdown-content {  display: none;  position: absolute; right: 1px;  background-color: #ffffff;  min-width: 160px;   padding: 7px 16px;  z-index: 1999; }\\r\\n\\r\\n.dropdown:hover .dropdown-content {\\r\\n    display: block;\\r\\n}\\r\\n.site-logo {\\r\\n\\twidth: 99.99%;\\r\\n\\tpadding: 40px 0;\\r\\n\\tpadding-bottom: 15px;\\r\\n\\ttext-align: center;\\r\\n}\\r\\n.site-logo img {\\r\\n\\twidth: 80%;\\r\\n\\tdisplay:block;\\r\\n    margin:auto;\\r\\n\\tmax-width: 210px;\\r\\n}\\r\\n@media (min-width:961px)  { .site-logo {padding-bottom: 0px;} }\\r\\n@media (min-width:1025px) { .site-logo {padding-bottom: 0px;} }\\r\\n@media (min-width:1281px) { .site-logo {padding-bottom: 0px;} }\\r\\n<\\/style>\\r\\n<\\/head>\\r\\n<body class=\\\"hold-transition login-page\\\"> \\r\\n<div class=\\\"dropdown\\\">\\r\\n  <span><i class=\\\"fa fa-language\\\"><\\/i> Change Language<\\/span>\\r\\n  <div class=\\\"dropdown-content\\\">\\r\\n    <p><a href=\'index.php?lang=ar\'><strong>Arabic<\\/strong><\\/a><\\/p><p><a href=\'index.php?lang=ar\'><strong>Arabic<\\/strong><\\/a><\\/p><p><a href=\'index.php?lang=ar\'><strong>Arabic<\\/strong><\\/a><\\/p><p><a href=\'index.php?lang=ar\'><strong>Arabic<\\/strong><\\/a><\\/p><p><a href=\'index.php?lang=ar\'><strong>Arabic<\\/strong><\\/a><\\/p><p><a href=\'index.php?lang=ar\'><strong>Arabic<\\/strong><\\/a><\\/p><p><a href=\'index.php?lang=ar\'><strong>Arabic<\\/strong><\\/a><\\/p><p><a href=\'index.php?lang=ar\'><strong>Arabic<\\/strong><\\/a><\\/p><p><a href=\'index.php?lang=en\'><strong>English<\\/strong><\\/a><\\/p><p><a href=\'index.php?lang=hi\'><strong>Hindi<\\/strong><\\/a><\\/p><p><a href=\'index.php?lang=hi\'><strong>Hindi<\\/strong><\\/a><\\/p><p><a href=\'index.php?lang=hi\'><strong>Hindi<\\/strong><\\/a><\\/p><p><a href=\'index.php?lang=hi\'><strong>Hindi<\\/strong><\\/a><\\/p><p><a href=\'index.php?lang=hi\'><strong>Hindi<\\/strong><\\/a><\\/p><p><a href=\'index.php?lang=hi\'><strong>Hindi<\\/strong><\\/a><\\/p><p><a href=\'index.php?lang=hi\'><strong>Hindi<\\/strong><\\/a><\\/p><p><a href=\'index.php?lang=hi\'><strong>Hindi<\\/strong><\\/a><\\/p>  <\\/div>\\r\\n<\\/div>  \\r\\n\\r\\n<div class=\\\"site-logo\\\"><img src=\\\"files\\/temp\\/59681656250900.png\\\" \\/><\\/div>\\r\\n\\r\\n<div class=\\\"login-box\\\">\\r\\n  <div class=\\\"login-logo\\\" style=\\\"\\\">\\r\\n    <strong><a href=\\\"\\\">Sign In<\\/a><\\/strong>\\r\\n  <\\/div>\\r\\n  \\r\\n  <!-- \\/.login-logo -->\\r\\n   <div class=\\\"login-box-body\\\">\\r\\n    <form action=\\\"index.php\\\"  id=\\\"login-form\\\" method=\\\"post\\\">\\r\\n  \\t<p class=\\\"login-box-msg\\\" style=\\\"color: red; display: none;\\\"><\\/p>\\r\\n      <div class=\\\"form-group has-feedback\\\">\\r\\n        <input type=\\\"email\\\" name=\\\"access_login\\\" class=\\\"form-control\\\" id=\\\"emails\\\" placeholder=\\\"Email\\\">\\r\\n        <span class=\\\"glyphicon glyphicon-user form-control-feedback\\\"><\\/span>\\r\\n      <\\/div>\\r\\n      <div class=\\\"form-group has-feedback\\\">\\r\\n        <input type=\\\"password\\\" name=\\\"access_password\\\" class=\\\"form-control\\\" id=\\\"password\\\" placeholder=\\\"Password\\\">\\r\\n        <span class=\\\"glyphicon glyphicon-lock form-control-feedback\\\"><\\/span>\\r\\n      <\\/div>\\r\\n      <div class=\\\"row\\\">\\r\\n        <div class=\\\"col-xs-7\\\">\\r\\n          <div class=\\\"checkbox icheck\\\">\\r\\n            <label>\\r\\n              <a href=\\\"index.php?reset\\\">Lost your Password?<\\/a>\\r\\n            <\\/label>\\r\\n          <\\/div>\\r\\n        <\\/div>\\r\\n        <div class=\\\"col-xs-5\\\">\\r\\n          <button type=\\\"submit\\\" id=\\\"login-button\\\" class=\\\"btn btn-info btn-block btn-flat\\\">Sign In<\\/button>\\r\\n          <span id=\\\"login-spin\\\" class=\\\"spinners\\\" style=\\\"display: none;\\\"><i class=\\\"fa fa-spinner fa-spin\\\"><\\/i> <strong>Processing...<\\/strong><\\/span>\\r\\n        <\\/div>\\r\\n      <\\/div>\\r\\n           <br>\\r\\n                  <br>\\r\\n          <\\/form>\\r\\n        <br>\\r\\n  <\\/div>\\r\\n  <!-- \\/.login-box-body -->\\r\\n<\\/div>\\r\\n<!-- \\/.login-box -->\\r\\n\\r\\n<script src=\\\"plugins\\/jQuery\\/jQuery-2.2.0.min.js\\\"><\\/script>\\r\\n<script src=\\\"bootstrap\\/js\\/bootstrap.min.js\\\"><\\/script>\\r\\n<script src=\\\"plugins\\/iCheck\\/icheck.min.js\\\"><\\/script>\\r\\n\\r\\n<script src=\\\"assets\\/plugins\\/materialize\\/js\\/materialize.min.js\\\"><\\/script>\\r\\n<script src=\\\"assets\\/plugins\\/material-preloader\\/js\\/materialPreloader.min.js\\\"><\\/script>\\r\\n<script src=\\\"assets\\/plugins\\/sweetalert\\/sweetalert.min.js\\\"><\\/script>\\r\\n<script src=\\\"assets\\/plugins\\/jquery-blockui\\/jquery.blockui.js\\\"><\\/script>\\r\\n<script src=\\\"assets\\/plugins\\/google-code-prettify\\/prettify.js\\\"><\\/script>\\r\\n<script src=\\\"assets\\/js\\/alpha.min.js\\\"><\\/script><script>\\r\\n  $(function () {\\r\\n    $(\'input\').iCheck({\\r\\n      checkboxClass: \'icheckbox_square-blue\',\\r\\n      radioClass: \'iradio_square-blue\',\\r\\n      increaseArea: \'20%\' \\/\\/ optional\\r\\n    });\\r\\n  });\\r\\n  \\r\\n$(\\\"#email\\\").blur(function(){\\r\\n \\t$.ajax({\\r\\n       type        : \'POST\', \\r\\n       url         : \'API?checkUser=\'+$(\'#email\').val(),\\r\\n       data        : \'\', \\r\\n       dataType    : \'json\',\\r\\n       encode      : true\\r\\n   }).done(function(data) {\\r\\n       if ( ! data.success) {\\r\\n\\t\\t\\tif (data.errors) {\\r\\n\\t\\t\\t\\t$(\'.login-box-msg\').text(\'Sorry but your email address is already registered. Please login or use a different one\');\\r\\n\\t\\t\\t\\t$(\'.login-box-msg\').css(\'color\', \'red\');\\r\\n\\t\\t\\t\\t$(\'.login-box-msg\').show(\'slow\');\\r\\n\\t\\t\\t\\tswal(\\\"Oops!\\\", \'Sorry but your email address is already registered. Please login or use a different one\', \\\"warning\\\");\\r\\n\\t\\t\\t\\t$(\\\"#submit\\\").hide();\\r\\n\\t\\t\\t\\t$(\\\"#reset\\\").show();\\r\\n\\t\\t\\t}\\r\\n\\t\\t} else {\\r\\n\\t\\t\\t$(\\\"#submit\\\").show(); \\r\\n\\t\\t\\t$(\\\"#reset\\\").hide(); \\r\\n\\t\\t}\\r\\n    }).fail(function (jqXHR,status,err) {\\r\\n\\t});\\t \\r\\n});\\r\\n\\r\\n$(\\\"#password2\\\").blur(function(){ \\r\\n\\tvar pass1 = document.getElementById(\'password1\').value;\\r\\n\\tvar pass2 = document.getElementById(\'password2\').value;\\r\\n  if (pass1 == pass2) {\\r\\n\\t    $(\'.login-box-msg\').hide(\'slow\');\\r\\n\\t   \\t$(\\\"#submit\\\").show(); \\r\\n\\t\\t$(\\\"#reset\\\").hide();\\r\\n\\t} else {\\r\\n\\t\\t$(\'.login-box-msg\').text(\'Your password fields does not match.\');\\r\\n\\t\\t$(\'.login-box-msg\').css(\'color\', \'red\');\\r\\n\\t\\t$(\'.login-box-msg\').show(\'slow\');\\r\\n\\t\\t$(\\\"#submit\\\").hide();\\r\\n\\t\\t$(\\\"#reset\\\").show();\\r\\n  }\\r\\n}) \\r\\n\\r\\n  $(\'#login-form\').submit(function(event) { \\r\\n\\t\\t$(\'#login-button\').hide();\\r\\n\\t\\t$(\'#login-spin\').show();\\r\\n        var formData = {\\r\\n            \'access_login\'    \\t\\t: $(\'#emails\').val(),\\r\\n            \'access_password\'     \\t: $(\'#password\').val()\\r\\n        };\\r\\n        $.ajax({\\r\\n            type        : \'POST\', \\r\\n            url         : \'API\',\\r\\n            data        : formData, \\r\\n            dataType    : \'json\',\\r\\n            encode      : true\\r\\n        }).done(function(data) { \\r\\n\\t\\t\\t\\/\\/var data = JSON.parse(data);\\r\\n            if ( ! data.success) {\\r\\n\\t\\t\\t\\tif (data.errors) {\\r\\n\\t\\t\\t\\t\\tswal(\\\"Oops!\\\", data.errors, \\\"warning\\\");\\r\\n\\t\\t\\t\\t\\t$(\'#login-button\').show();\\r\\n\\t\\t\\t\\t\\t$(\'#login-spin\').hide();\\r\\n\\t\\t\\t\\t}\\r\\n\\t\\t\\t} else {\\r\\n\\t\\t\\t\\twindow.location = \'index.php\'; \\r\\n\\t\\t\\t}\\r\\n            }).fail(function (jqXHR,status,err) { \\r\\n\\t\\t\\t\\tswal(\\\"Oops!\\\", \'Login failed! \'+err, \\\"warning\\\");\\r\\n\\t\\t\\t\\t$(\'#login-button\').show();\\r\\n\\t\\t\\t\\t$(\'#login-spin\').hide();\\r\\n\\t\\t\\t});\\r\\n        event.preventDefault();\\r\\n    });\\t\\r\\n\\r\\n\\/\\/reser pass\\r\\n  $(\'#reset-form\').submit(function(event) { \\r\\n\\t\\t$(\'#reset-button\').hide();\\r\\n\\t\\t$(\'#login-spin\').show();\\r\\n        var formData = {\\r\\n            \'userEmail\'     \\t: $(\'#emaila\').val(),\\r\\n            \'reset\'    \\t\\t: \'1\'\\r\\n        };\\r\\n\\r\\n        $.ajax({\\r\\n            type        : \'POST\', \\r\\n            url         : \'API\',\\r\\n            data        : formData, \\r\\n            dataType    : \'json\',\\r\\n            encode      : true\\r\\n        }).done(function(data) {\\r\\n            if ( ! data.success) {\\r\\n\\t\\t\\t\\tif (data.errors) {\\r\\n\\t\\t\\t\\t\\tswal(\\\"Oops!\\\", data.errors, \\\"warning\\\");\\r\\n\\t\\t\\t\\t\\t$(\'#reset-button\').show();\\r\\n\\t\\t\\t\\t\\t$(\'#login-spin\').hide();\\r\\n\\t\\t\\t\\t}\\r\\n\\t\\t\\t} else {\\r\\n\\t\\t\\t\\talert(\'We have reset your account password. A new one has been sent to your email address.\');\\r\\n\\t\\t\\t\\twindow.location = \'index.php?rst\'; \\r\\n\\t\\t\\t}\\r\\n            }).fail(function (jqXHR,status,err) {\\r\\n\\t\\t\\t\\tswal(\\\"Oops!\\\", \'Request failed! \'+err, \\\"warning\\\");\\r\\n\\t\\t\\t\\t$(\'#reset-button\').show();\\r\\n\\t\\t\\t\\t$(\'#login-spin\').hide();\\r\\n\\t\\t\\t});\\r\\n        event.preventDefault();\\r\\n    });\\t\\r\\n\\t\\r\\n\\/\\/register\\r\\n  $(\'#register-form\').submit(function(event) {\\r\\n        event.preventDefault();\\t  \\r\\n\\t\\t$(\'#register-button\').hide();\\r\\n\\t\\t$(\'#login-spin\').show();\\r\\n\\t\\t        var formData = {\\r\\n            \'first_name\'  : $(\'#first_name\').val(),\\r\\n\\t\\t\\t\'last_name\'  : $(\'#last_name\').val(),\\r\\n            \'email\'    : $(\'#email\').val(),\\r\\n\\t\\t\\t\'phone\'  : $(\'#phone\').val(),\\r\\n\\t\\t\\t\'country_id\'  : $(\'#country\').val(),\\r\\n\\t\\t\\t\'password\'  : $(\'#password1\').val(),\\r\\n\\t\\t\\t\'password2\'  : $(\'#password2\').val(),\\r\\n\\t\\t\\t\\/\\/Do Custom Fields\\r\\n\\t\\t\\t \\t\\t\\t\\t\\t\\t\'join\'\\t: \'1\'\\r\\n        };\\r\\n\\r\\n        $.ajax({\\r\\n            type        : \'POST\', \\r\\n            url         : \'API\',\\r\\n            data        : formData, \\r\\n            dataType    : \'json\',\\r\\n            encode      : true\\r\\n        }).done(function(data) {\\r\\n            if ( ! data.success) { \\r\\n\\t\\t\\t\\tif (data.errors) {\\r\\n\\t\\t\\t\\t\\tswal(\\\"Oops!\\\", data.errors, \\\"warning\\\");\\r\\n\\t\\t\\t\\t\\t$(\'#register-button\').show();\\r\\n\\t\\t\\t\\t\\t$(\'#login-spin\').hide();\\r\\n\\t\\t\\t\\t}\\r\\n\\t\\t\\t} else { \\r\\n\\t\\t\\t\\twindow.location = \'index.php?joined\'; \\r\\n\\t\\t\\t}\\r\\n            }).fail(function (jqXHR,status,err) {\\r\\n\\t\\t\\t\\tswal(\\\"Oops!\\\", \'Sign-up failed! \'+err, \\\"warning\\\");\\r\\n\\t\\t\\t\\t$(\'#register-button\').show();\\r\\n\\t\\t\\t\\t$(\'#login-spin\').hide();\\r\\n\\t\\t\\t});\\r\\n    });\\t\\t\\r\\n\\r\\n\\r\\n\\t\\r\\n\\t\\r\\n\\r\\n\\r\\n<\\/script>\\r\\n<\\/body>\\r\\n<\\/html>\\r\\n\\r\\n\"', '2023-05-31 01:42:18', '2023-05-31 01:42:18'),
(2, 'Xenon\\LaravelBDSms\\Provider\\MimSms', '{\"config\":{\"senderid\":\"\",\"api_key\":\"\",\"type\":\"\"},\"mobile\":\"8801646688970\",\"message\":\"This is test message\"}', '\"{\\\"request\\\": \\\"unknown\\\",\\\"status\\\":\\\"error\\\",\\\"message\\\":\\\"Invalid API Request\\\"}\"', '2023-05-31 01:43:27', '2023-05-31 01:43:27'),
(3, 'Xenon\\LaravelBDSms\\Provider\\MimSms', '{\"config\":{\"senderid\":\"\",\"api_key\":\"\",\"type\":\"\"},\"mobile\":\"8801646688970\",\"message\":\"This is test message\"}', '\"1003\"', '2023-05-31 01:45:43', '2023-05-31 01:45:43'),
(4, 'Xenon\\LaravelBDSms\\Provider\\MimSms', '{\"config\":{\"senderid\":\"\",\"api_key\":\"\",\"type\":\"\"},\"mobile\":\"8801646688970\",\"message\":\"This is test message\"}', '\"1003\"', '2023-05-31 07:50:49', '2023-05-31 07:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_04_19_172920_create_sessions_table', 1),
(7, '2023_04_07_000009_create_permission_categories_table', 2),
(8, '2023_04_07_000008_create_permissions_table', 3),
(9, '2023_04_07_000014_create_permission_role_table', 4),
(10, '2023_04_07_000015_create_roles_table', 4),
(11, '2023_04_07_009008_add_foreigns_to_permission_role_table', 4),
(12, '2023_04_07_000016_create_role_user_table', 5),
(13, '2023_04_07_009009_add_foreigns_to_role_user_table', 5),
(14, '2023_04_07_000002_create_course_categories_table', 6),
(16, '2023_04_07_009001_add_foreigns_to_course_categories_table', 7),
(17, '2023_04_07_000019_create_question_topics_table', 8),
(18, '2023_04_07_009011_add_foreigns_to_question_topics_table', 8),
(22, '2023_04_07_000001_create_courses_table', 9),
(23, '2023_04_07_000023_create_course_course_category_table', 9),
(24, '2023_04_07_009014_add_foreigns_to_course_course_category_table', 9),
(26, '2023_04_07_000005_create_course_routines_table', 10),
(28, '2023_04_07_000004_create_course_coupons_table', 11),
(29, '2023_04_07_000012_create_students_table', 12),
(30, '2023_04_07_000013_create_teachers_table', 12),
(31, '2023_04_07_009016_add_foreigns_to_students_table', 12),
(32, '2023_04_07_009017_add_foreigns_to_teachers_table', 12),
(33, '2023_04_07_000006_create_course_student_table', 13),
(34, '2023_04_07_000007_create_course_teacher_table', 13),
(41, '2023_04_07_000020_create_course_sections_table', 14),
(42, '2023_04_07_000025_create_course_section_contents_table', 14),
(43, '2023_04_07_009012_add_foreigns_to_course_sections_table', 14),
(44, '2023_04_07_009019_add_foreigns_to_course_section_contents_table', 14),
(47, '2023_04_07_000026_create_blogs_table', 15),
(48, '2023_04_07_000027_create_blog_categories_table', 15),
(49, '2023_04_07_009020_add_foreigns_to_blogs_table', 15),
(50, '2023_04_07_009021_add_foreigns_to_blog_categories_table', 15),
(51, '2023_04_07_000028_create_circulars_table', 16),
(52, '2023_04_07_000029_create_circular_categories_table', 16),
(53, '2023_04_07_009022_add_foreigns_to_circulars_table', 16),
(54, '2023_04_07_009023_add_foreigns_to_circular_categories_table', 16),
(55, '2023_04_07_000039_create_popup_notifications_table', 17),
(61, '2023_04_07_000018_create_question_stores_table', 18),
(62, '2023_04_07_000022_create_question_options_table', 18),
(63, '2023_04_07_000040_create_question_store_question_topic_table', 18),
(64, '2023_04_07_009031_add_foreigns_to_question_stores_table', 18),
(65, '2023_04_07_009032_add_foreigns_to_question_store_question_topic_table', 18),
(66, '2023_04_07_000033_create_advertisements_table', 19),
(67, '2023_04_07_000041_create_course_orders_table', 20),
(68, '2023_04_07_009033_add_foreigns_to_course_orders_table', 20),
(69, '2023_04_07_000037_create_notices_table', 21),
(70, '2023_04_07_000038_create_notice_categories_table', 21),
(71, '2023_04_07_009029_add_foreigns_to_notices_table', 21),
(72, '2023_04_07_009030_add_foreigns_to_notice_categories_table', 21),
(73, '2023_05_31_043404_create_laravelbd_sms_table', 22),
(74, '2023_04_07_000034_create_model_tests_table', 23),
(75, '2023_04_07_000035_create_model_test_categories_table', 23),
(76, '2023_04_07_009026_add_foreigns_to_model_tests_table', 23),
(77, '2023_04_07_009027_add_foreigns_to_model_test_categories_table', 23),
(78, '2023_04_07_000030_create_products_table', 24),
(79, '2023_04_07_000031_create_product_authors_table', 24),
(80, '2023_04_07_000032_create_product_categories_table', 24),
(81, '2023_04_07_009024_add_foreigns_to_products_table', 24),
(82, '2023_04_07_009025_add_foreigns_to_product_categories_table', 24),
(83, '2023_04_07_000042_create_exams_table', 25),
(84, '2023_04_07_000043_create_exam_categories_table', 25),
(85, '2023_04_07_000044_create_exam_question_store_table', 25),
(86, '2023_04_07_000045_create_exam_results_table', 26),
(87, '2023_06_19_040044_add_column_to_courses_table', 27),
(88, '2023_04_07_000047_create_exam_subscription_packages_table', 28),
(89, '2023_04_07_000048_create_exam_subscription_package_user_table', 28),
(90, '2023_04_07_000049_create_exam_user_table', 28),
(91, '2023_04_07_000046_create_exam_orders_table', 29),
(92, '2023_04_07_000050_create_subscription_orders_table', 30),
(95, '2023_04_07_000051_create_pdf_stores_table', 31),
(96, '2023_04_07_000052_create_pdf_store_categories_table', 31),
(97, '2023_04_07_000053_create_course_section_content_question_store_table', 32),
(98, '2023_04_07_000054_create_course_exam_results_table', 33),
(99, '2023_04_07_000055_create_batch_exams_table', 34),
(100, '2023_04_07_000056_create_batch_exam_categories_table', 34),
(101, '2023_04_07_000057_create_batch_exam_results_table', 34),
(102, '2023_04_07_000058_create_batch_exam_routines_table', 34),
(103, '2023_04_07_000059_create_batch_exam_sections_table', 34),
(104, '2023_04_07_000060_create_batch_exam_section_contents_table', 34),
(105, '2023_04_07_000061_create_batch_exam_batch_exam_category_table', 34),
(106, '2023_04_07_000062_create_batch_exam_section_content_question_store_table', 34),
(107, '2023_04_07_000063_create_batch_exam_student_table', 34),
(108, '2023_04_07_000064_create_batch_exam_teacher_table', 34),
(109, '2023_04_07_000065_create_parent_orders_table', 34),
(110, '2023_04_07_000066_create_batch_exam_subscriptions_table', 35),
(111, '2023_04_07_000067_create_galleries_table', 36),
(112, '2023_04_07_000068_create_gallery_images_table', 36),
(113, '2023_04_07_000069_create_contact_messages_table', 37),
(114, '2023_04_07_000070_create_product_product_category_table', 38);

-- --------------------------------------------------------

--
-- Table structure for table `model_tests`
--

DROP TABLE IF EXISTS `model_tests`;
CREATE TABLE IF NOT EXISTS `model_tests` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `model_test_category_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `model_tests_model_test_category_id_foreign` (`model_test_category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_tests`
--

INSERT INTO `model_tests` (`id`, `model_test_category_id`, `title`, `image`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(2, 6, 'ihgjkh', NULL, 'ihgjkh', 1, '2023-05-31 11:51:18', '2023-05-31 11:51:18');

-- --------------------------------------------------------

--
-- Table structure for table `model_test_categories`
--

DROP TABLE IF EXISTS `model_test_categories`;
CREATE TABLE IF NOT EXISTS `model_test_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `model_test_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `model_test_categories_model_test_category_id_foreign` (`model_test_category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_test_categories`
--

INSERT INTO `model_test_categories` (`id`, `model_test_category_id`, `name`, `image`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(5, 0, 'ryfhguhjkghdfghgjj', 'backend/assets/uploaded-files/model-test-management/model-test-categories/model-test-category--1685555093805.jpeg', 'ryfhguhjkghdfghgjj', 0, '2023-05-31 11:44:54', '2023-05-31 11:45:01'),
(6, 0, 'yfhyg', NULL, 'yfhyg', 1, '2023-05-31 11:45:32', '2023-05-31 11:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

DROP TABLE IF EXISTS `notices`;
CREATE TABLE IF NOT EXISTS `notices` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `notice_category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('normal','scroll') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notices_notice_category_id_foreign` (`notice_category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `notice_category_id`, `title`, `image`, `type`, `body`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(2, 8, 'Eid ul adha notice', 'backend/assets/uploaded-files/notice-management/notices/notice--1690870024112.png', 'normal', '<p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: var(--bodyText); text-align: justify;\">প্রিয় শিক্ষার্থীবৃন্দ,</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: var(--bodyText); text-align: justify;\">সবাইকে পবিত্র ইদ উল আযহার শুভেচ্ছা। ইদ উপলক্ষ্যে ২৭জুন থেকে ২জুলাই পর্যন্ত আপনাদের সকল কার্যক্রম বন্ধ থাকবে। আগামী ৩ জুলাই থেকে সকল কার্যক্রম যথারীতি চালু হবে।</p><p style=\"background-repeat: no-repeat; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: none; font-family: &quot;Noto Sans Bengali&quot;, cursive; font-size: 16px; color: var(--bodyText); text-align: justify;\">সবার ইদ ভালো কাটুক। ধন্যবাদ</p>', 'Eid-ul-adha-notice', 1, '2023-08-01 06:07:04', '2023-08-01 06:07:04'),
(3, 9, 'scrolling notice', NULL, 'scroll', '<p><span style=\"color: rgb(32, 33, 36); font-family: consolas, &quot;lucida console&quot;, &quot;courier new&quot;, monospace; font-size: 12px; white-space-collapse: preserve;\">💥ভর্তি চলছে &nbsp;💥 Primary Padma Super Care Live Batch 💥ভর্তি চলছে &nbsp;💥 প্রাইমারি বুলেট যমুনা - Extra Care LIVE Batch &nbsp;💥ভর্তি চলছে &nbsp;💥 প্রাইমারি বুলেট মেঘনা - Extra Care LIVE Batch&nbsp;💥ভর্তি চলছে &nbsp;💥 𝐁𝐚𝐧𝐤 𝐒𝐮𝐩𝐞𝐫 𝐂𝐚𝐫𝐞 𝐋𝐢𝐯𝐞 𝐁𝐚𝐭𝐜𝐡 💥ভর্তি চলছে &nbsp;💥 45th BCS Written Gold Live Batch 💥ভর্তি চলছে &nbsp;💥 46th BCS Preli. Gold Live Batch-3  💥ভর্তি চলছে &nbsp;💥 প্রাইমারি বুলেট এক্সাম ব্যাচ</span></p>', 'scrolling-notice', 1, '2023-08-01 06:08:57', '2023-08-01 06:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `notice_categories`
--

DROP TABLE IF EXISTS `notice_categories`;
CREATE TABLE IF NOT EXISTS `notice_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `notice_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notice_categories_notice_category_id_foreign` (`notice_category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notice_categories`
--

INSERT INTO `notice_categories` (`id`, `notice_category_id`, `name`, `image`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(9, 0, 'Normal Notice', NULL, 'Normal-Notice', 1, '2023-08-01 05:57:22', '2023-08-01 05:57:22'),
(8, 0, 'Eid ul adha notice', NULL, 'Eid-ul-adha-notice', 1, '2023-08-01 05:57:09', '2023-08-01 05:57:09');

-- --------------------------------------------------------

--
-- Table structure for table `parent_orders`
--

DROP TABLE IF EXISTS `parent_orders`;
CREATE TABLE IF NOT EXISTS `parent_orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `parent_model_id` bigint(20) UNSIGNED NOT NULL,
  `checked_by` bigint(20) UNSIGNED DEFAULT NULL,
  `batch_exam_subscription_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ordered_for` enum('course','product','course_exam','batch_exam') COLLATE utf8mb4_unicode_ci DEFAULT 'course',
  `order_invoice_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor` enum('bkash','nagad','rocket') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `txt_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` mediumint(9) DEFAULT '0',
  `total_amount` mediumint(9) DEFAULT '0',
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_amount` mediumint(9) DEFAULT '0',
  `status` enum('pending','approved','canceled') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `contact_status` enum('pending','not_answered','confirmed') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parent_orders`
--

INSERT INTO `parent_orders` (`id`, `user_id`, `parent_model_id`, `checked_by`, `batch_exam_subscription_id`, `ordered_for`, `order_invoice_number`, `payment_method`, `vendor`, `paid_to`, `paid_from`, `txt_id`, `paid_amount`, `total_amount`, `coupon_code`, `coupon_amount`, `status`, `contact_status`, `payment_status`, `created_at`, `updated_at`) VALUES
(8, 1, 8, NULL, 0, 'course', '974246', 'cod', 'nagad', '01646688970', '01646688970', '01423456789', 1877, 1877, NULL, NULL, 'approved', 'pending', 'complete', '2023-08-02 14:47:57', '2023-08-02 15:43:49'),
(12, 1, 1, NULL, 1, 'batch_exam', '793955', 'cod', 'bkash', '123123', '123123', '01423456789', 4500, 4500, NULL, NULL, 'approved', 'pending', NULL, '2023-08-05 18:40:18', '2023-08-06 17:22:15');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pdf_stores`
--

DROP TABLE IF EXISTS `pdf_stores`;
CREATE TABLE IF NOT EXISTS `pdf_stores` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pdf_store_category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preview_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_external_link` text COLLATE utf8mb4_unicode_ci,
  `file_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_size` int(11) DEFAULT '0',
  `file_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_extension` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_page` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pdf_stores`
--

INSERT INTO `pdf_stores` (`id`, `pdf_store_category_id`, `title`, `preview_image`, `file_external_link`, `file_url`, `file_size`, `file_type`, `file_extension`, `total_page`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(2, 6, 'class one pdf', NULL, NULL, 'backend/assets/uploaded-files/pdf-management/pdf-store/pdf-store-6009551690428791.pdf', 271790, 'application/pdf', 'pdf', NULL, 'class-one-pdf', 1, '2023-07-06 06:00:26', '2023-07-27 03:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `pdf_store_categories`
--

DROP TABLE IF EXISTS `pdf_store_categories`;
CREATE TABLE IF NOT EXISTS `pdf_store_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) UNSIGNED DEFAULT '0',
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` mediumint(9) DEFAULT '1',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pdf_store_categories`
--

INSERT INTO `pdf_store_categories` (`id`, `parent_id`, `title`, `order`, `image`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(6, 0, 'cat one', 1, 'backend/assets/uploaded-files/pdf-management/pdf-category/pdf-categoryScreenshot_3_87714.png', 'cat-one', 1, '2023-07-05 18:17:03', '2023-07-06 06:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `permission_category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` tinyint(4) DEFAULT '1',
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `permission_category_id`, `title`, `slug`, `is_default`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Super Admin Dashboard', 'super-admin-dashboard', 1, 1, NULL, NULL),
(2, 1, 'Admin Dashboard', 'admin-dashboard', 1, 1, NULL, NULL),
(3, 1, 'Teacher Dashboard', 'teacher-dashboard', 1, 1, NULL, NULL),
(4, 1, 'Student Dashboard', 'student-dashboard', 1, 1, NULL, NULL),
(5, 1, 'Stuff Dashboard', 'stuff-dashboard', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_categories`
--

DROP TABLE IF EXISTS `permission_categories`;
CREATE TABLE IF NOT EXISTS `permission_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `is_default` tinyint(4) DEFAULT '0',
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_categories`
--

INSERT INTO `permission_categories` (`id`, `name`, `slug`, `note`, `is_default`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', 'Dashboard', '<p>zsdghbn</p>', 1, 1, NULL, '2023-05-09 08:21:16');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  KEY `permission_role_permission_id_foreign` (`permission_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
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
-- Table structure for table `popup_notifications`
--

DROP TABLE IF EXISTS `popup_notifications`;
CREATE TABLE IF NOT EXISTS `popup_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `popup_type` enum('course','book','external_link') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_btn_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_btn_link` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_author_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_pdf` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(8,2) DEFAULT NULL,
  `discount_amount` decimal(8,2) DEFAULT NULL,
  `discount_duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_duration_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `specification` longtext COLLATE utf8mb4_unicode_ci,
  `other_details` longtext COLLATE utf8mb4_unicode_ci,
  `in_stock` tinyint(4) DEFAULT '0',
  `stock_amount` int(11) DEFAULT '0',
  `total_sell` int(11) DEFAULT '0',
  `hit_count` int(11) DEFAULT '0',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_featured` tinyint(4) DEFAULT '0',
  `status` tinyint(4) DEFAULT '1',
  `discount_type` tinyint(2) DEFAULT '1',
  `discount_start_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_start_date_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_end_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_end_date_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_product_author_id_foreign` (`product_author_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_author_id`, `title`, `image`, `featured_pdf`, `price`, `discount_amount`, `discount_duration`, `discount_duration_timestamp`, `about`, `description`, `specification`, `other_details`, `in_stock`, `stock_amount`, `total_sell`, `hit_count`, `slug`, `is_featured`, `status`, `discount_type`, `discount_start_date`, `discount_start_date_timestamp`, `discount_end_date`, `discount_end_date_timestamp`, `created_at`, `updated_at`) VALUES
(2, 1, 'qwertyui', 'backend/assets/uploaded-files/product-management/product/product-category-1691127652598.jpg', 'backend/assets/uploaded-files/product-management/product-pdf/product-pdfnested-categories-with-drag-n-drop-laravel_8487.pdf', '20000.00', '123.00', NULL, NULL, '<p>sdfsdf</p>', '<p>sdfsdfsd</p>', '<p>sdfsdfsdf</p>', '<p>sdfsdfds</p>', 0, 44, 0, 0, 'qwertyui', 1, 1, 1, '2023-08-04 11:39', '1691127540', '2023-08-31 23:55', '1693504500', '2023-08-04 05:40:52', '2023-08-04 14:17:58');

-- --------------------------------------------------------

--
-- Table structure for table `product_authors`
--

DROP TABLE IF EXISTS `product_authors`;
CREATE TABLE IF NOT EXISTS `product_authors` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_authors`
--

INSERT INTO `product_authors` (`id`, `name`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Monu', 'backend/assets/uploaded-files/product-management/product-authors/product-authors-1691122994641.jpg', '<p>sfghhghfg</p>', 1, '2023-07-22 18:19:21', '2023-08-04 04:23:14');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE IF NOT EXISTS `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) UNSIGNED DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(4) DEFAULT '0',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` mediumint(9) DEFAULT '1',
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_categories_parent_id_foreign` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `parent_id`, `name`, `image`, `icon_code`, `is_featured`, `slug`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'BCS new', 'backend/assets/uploaded-files/product-management/product-categories/product-category-1691122973408.jpg', NULL, 0, 'BCS-new', 1, 1, '2023-07-22 18:18:44', '2023-08-04 04:22:53'),
(2, NULL, 'Bcs Old', NULL, NULL, 1, 'Bcs-Old', 1, 1, '2023-07-22 18:23:34', '2023-07-22 18:23:34');

-- --------------------------------------------------------

--
-- Table structure for table `product_product_category`
--

DROP TABLE IF EXISTS `product_product_category`;
CREATE TABLE IF NOT EXISTS `product_product_category` (
  `product_category_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_product_category`
--

INSERT INTO `product_product_category` (`product_category_id`, `product_id`) VALUES
(1, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `question_options`
--

DROP TABLE IF EXISTS `question_options`;
CREATE TABLE IF NOT EXISTS `question_options` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `question_store_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `option_title` mediumtext COLLATE utf8mb4_unicode_ci,
  `is_correct` tinyint(4) DEFAULT NULL,
  `option_description` text COLLATE utf8mb4_unicode_ci,
  `option_image` text COLLATE utf8mb4_unicode_ci,
  `option_video_url` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_options`
--

INSERT INTO `question_options` (`id`, `question_store_id`, `created_by`, `option_title`, `is_correct`, `option_description`, `option_image`, `option_video_url`, `created_at`, `updated_at`) VALUES
(14, 11, 1, 'four four four four four four four four four four four four four four four four', 0, '', NULL, '', '2023-06-14 00:32:39', '2023-06-14 00:32:39'),
(12, 11, 1, 'two', 1, '', NULL, '', '2023-06-14 00:32:39', '2023-06-14 00:32:39'),
(13, 11, 1, 'three', 0, '', NULL, '', '2023-06-14 00:32:39', '2023-06-14 00:32:39'),
(11, 11, 1, 'one', 0, '', NULL, '', '2023-06-14 00:32:39', '2023-06-14 00:32:39'),
(15, 12, 1, 'one', 1, '', NULL, '', '2023-06-14 00:32:39', '2023-06-14 00:32:39'),
(16, 12, 1, 'two', 0, '', NULL, '', '2023-06-14 00:32:39', '2023-06-14 00:32:39'),
(17, 12, 1, 'three', 0, '', NULL, '', '2023-06-14 00:32:39', '2023-06-14 00:32:39'),
(18, 12, 1, 'four', 0, '', NULL, '', '2023-06-14 00:32:39', '2023-06-14 00:32:39'),
(19, 13, 1, 'one', 0, '', NULL, '', '2023-06-14 00:32:39', '2023-06-14 00:32:39'),
(20, 13, 1, 'two', 0, '', NULL, '', '2023-06-14 00:32:39', '2023-06-14 00:32:39'),
(21, 13, 1, 'three', 1, '', NULL, '', '2023-06-14 00:32:39', '2023-06-14 00:32:39'),
(22, 13, 1, 'four', 0, '', NULL, '', '2023-06-14 00:32:39', '2023-06-14 00:32:39'),
(23, 14, 1, 'one', 0, '', NULL, '', '2023-06-14 00:32:39', '2023-06-14 00:32:39'),
(24, 14, 1, 'two', 0, '', NULL, '', '2023-06-14 00:32:39', '2023-06-14 00:32:39'),
(25, 14, 1, 'three', 1, '', NULL, '', '2023-06-14 00:32:39', '2023-06-14 00:32:39'),
(26, 14, 1, 'four', 0, '', NULL, '', '2023-06-14 00:32:39', '2023-06-14 00:32:39'),
(27, 15, 1, 'one', 0, '', NULL, '', '2023-06-14 00:32:39', '2023-06-14 00:32:39'),
(28, 15, 1, 'tow', 0, '', NULL, '', '2023-06-14 00:32:39', '2023-06-14 00:32:39'),
(29, 15, 1, 'three', 0, '', NULL, '', '2023-06-14 00:32:39', '2023-06-14 00:32:39'),
(30, 15, 1, 'four', 1, '', NULL, '', '2023-06-14 00:32:39', '2023-06-14 00:32:39'),
(31, 29, 1, '(ক) প্রভু বিশুর বাণী', 0, NULL, NULL, NULL, '2023-07-11 14:48:02', '2023-07-11 14:48:02'),
(32, 29, 1, '(খ) ফুলমনি ও করুণার বিবরন', 0, NULL, NULL, NULL, '2023-07-11 14:48:02', '2023-07-11 14:48:02'),
(33, 29, 1, '(গ) রাজা প্রতাপাদিত্য চরিত্র', 0, NULL, NULL, NULL, '2023-07-11 14:48:02', '2023-07-11 14:48:02'),
(34, 29, 1, '(ঘ) কৃপার শাস্ত্রের অর্থ ভেদ', 1, NULL, NULL, NULL, '2023-07-11 14:48:02', '2023-07-11 14:48:02'),
(35, 30, 1, '(ক) তারিণীচরন মিত্র', 1, NULL, NULL, NULL, '2023-07-11 14:48:02', '2023-07-11 14:48:02'),
(36, 30, 1, '(খ) চণ্ডীচরণ মুন্শী', 0, NULL, NULL, NULL, '2023-07-11 14:48:02', '2023-07-11 14:48:02'),
(37, 30, 1, '(গ) রাজীভলোচন মুখোপাধ্যায়', 0, NULL, NULL, NULL, '2023-07-11 14:48:02', '2023-07-11 14:48:02'),
(38, 30, 1, '(ঘ) গোলকনাথ শর্মা', 0, NULL, NULL, NULL, '2023-07-11 14:48:02', '2023-07-11 14:48:02'),
(39, 31, 1, '(ক) ঈশ্বরচন্দ্র বিদ্যাসাগর', 0, NULL, NULL, NULL, '2023-07-11 14:48:02', '2023-07-11 14:48:02'),
(40, 31, 1, '(খ) মৃত্যুঞ্জয় বিদ্যালঙ্কার', 0, NULL, NULL, NULL, '2023-07-11 14:48:02', '2023-07-11 14:48:02'),
(41, 31, 1, '(গ) রাজা রামমোহন রায়', 1, NULL, NULL, NULL, '2023-07-11 14:48:02', '2023-07-11 14:48:02'),
(42, 31, 1, '(ঘ) উইলিয়াম কেরি', 0, NULL, NULL, NULL, '2023-07-11 14:48:02', '2023-07-11 14:48:02'),
(43, 32, 1, '(ক) ভূদেব মুখোপাধ্যায়', 0, NULL, NULL, NULL, '2023-07-11 14:48:02', '2023-07-11 14:48:02'),
(44, 32, 1, '(খ) বঙ্কিমচন্দ্র চট্টোপাধ্যায়', 1, NULL, NULL, NULL, '2023-07-11 14:48:02', '2023-07-11 14:48:02'),
(45, 32, 1, '(গ) রাজা রামমোহন বার', 0, NULL, NULL, NULL, '2023-07-11 14:48:02', '2023-07-11 14:48:02'),
(46, 32, 1, '(ঘ) ঈশ্বরচন্দ্র বিদ্যাসাগর', 0, NULL, NULL, NULL, '2023-07-11 14:48:02', '2023-07-11 14:48:02'),
(47, 33, 1, '(ক) প্রভু বিশুর বাণী', 0, NULL, NULL, NULL, '2023-07-12 18:10:19', '2023-07-12 18:10:19'),
(48, 33, 1, '(খ) ফুলমনি ও করুণার বিবরন', 0, NULL, NULL, NULL, '2023-07-12 18:10:19', '2023-07-12 18:10:19'),
(49, 33, 1, '(গ) রাজা প্রতাপাদিত্য চরিত্র', 0, NULL, NULL, NULL, '2023-07-12 18:10:19', '2023-07-12 18:10:19'),
(50, 33, 1, '(ঘ) কৃপার শাস্ত্রের অর্থ ভেদ', 1, NULL, NULL, NULL, '2023-07-12 18:10:19', '2023-07-12 18:10:19'),
(51, 34, 1, '(ক) তারিণীচরন মিত্র', 1, NULL, NULL, NULL, '2023-07-12 18:10:19', '2023-07-12 18:10:19'),
(52, 34, 1, '(খ) চণ্ডীচরণ মুন্শী', 0, NULL, NULL, NULL, '2023-07-12 18:10:19', '2023-07-12 18:10:19'),
(53, 34, 1, '(গ) রাজীভলোচন মুখোপাধ্যায়', 0, NULL, NULL, NULL, '2023-07-12 18:10:19', '2023-07-12 18:10:19'),
(54, 34, 1, '(ঘ) গোলকনাথ শর্মা', 0, NULL, NULL, NULL, '2023-07-12 18:10:19', '2023-07-12 18:10:19'),
(55, 35, 1, '(ক) ঈশ্বরচন্দ্র বিদ্যাসাগর', 0, NULL, NULL, NULL, '2023-07-12 18:10:19', '2023-07-12 18:10:19'),
(56, 35, 1, '(খ) মৃত্যুঞ্জয় বিদ্যালঙ্কার', 0, NULL, NULL, NULL, '2023-07-12 18:10:19', '2023-07-12 18:10:19'),
(57, 35, 1, '(গ) রাজা রামমোহন রায়', 1, NULL, NULL, NULL, '2023-07-12 18:10:19', '2023-07-12 18:10:19'),
(58, 35, 1, '(ঘ) উইলিয়াম কেরি', 0, NULL, NULL, NULL, '2023-07-12 18:10:19', '2023-07-12 18:10:19'),
(59, 36, 1, '(ক) ভূদেব মুখোপাধ্যায়', 0, NULL, NULL, NULL, '2023-07-12 18:10:19', '2023-07-12 18:10:19'),
(60, 36, 1, '(খ) বঙ্কিমচন্দ্র চট্টোপাধ্যায়', 1, NULL, NULL, NULL, '2023-07-12 18:10:19', '2023-07-12 18:10:19'),
(61, 36, 1, '(গ) রাজা রামমোহন বার', 0, NULL, NULL, NULL, '2023-07-12 18:10:19', '2023-07-12 18:10:19'),
(62, 36, 1, '(ঘ) ঈশ্বরচন্দ্র বিদ্যাসাগর', 0, NULL, NULL, NULL, '2023-07-12 18:10:19', '2023-07-12 18:10:19'),
(63, 37, 1, '(ক) প্রভু বিশুর বাণী', 0, NULL, NULL, NULL, '2023-07-12 18:10:28', '2023-07-12 18:10:28'),
(64, 37, 1, '(খ) ফুলমনি ও করুণার বিবরন', 0, NULL, NULL, NULL, '2023-07-12 18:10:28', '2023-07-12 18:10:28'),
(65, 37, 1, '(গ) রাজা প্রতাপাদিত্য চরিত্র', 0, NULL, NULL, NULL, '2023-07-12 18:10:28', '2023-07-12 18:10:28'),
(66, 37, 1, '(ঘ) কৃপার শাস্ত্রের অর্থ ভেদ', 1, NULL, NULL, NULL, '2023-07-12 18:10:28', '2023-07-12 18:10:28'),
(67, 38, 1, '(ক) তারিণীচরন মিত্র', 1, NULL, NULL, NULL, '2023-07-12 18:10:28', '2023-07-12 18:10:28'),
(68, 38, 1, '(খ) চণ্ডীচরণ মুন্শী', 0, NULL, NULL, NULL, '2023-07-12 18:10:28', '2023-07-12 18:10:28'),
(69, 38, 1, '(গ) রাজীভলোচন মুখোপাধ্যায়', 0, NULL, NULL, NULL, '2023-07-12 18:10:28', '2023-07-12 18:10:28'),
(70, 38, 1, '(ঘ) গোলকনাথ শর্মা', 0, NULL, NULL, NULL, '2023-07-12 18:10:28', '2023-07-12 18:10:28'),
(71, 39, 1, '(ক) ঈশ্বরচন্দ্র বিদ্যাসাগর', 0, NULL, NULL, NULL, '2023-07-12 18:10:28', '2023-07-12 18:10:28'),
(72, 39, 1, '(খ) মৃত্যুঞ্জয় বিদ্যালঙ্কার', 0, NULL, NULL, NULL, '2023-07-12 18:10:28', '2023-07-12 18:10:28'),
(73, 39, 1, '(গ) রাজা রামমোহন রায়', 1, NULL, NULL, NULL, '2023-07-12 18:10:28', '2023-07-12 18:10:28'),
(74, 39, 1, '(ঘ) উইলিয়াম কেরি', 0, NULL, NULL, NULL, '2023-07-12 18:10:28', '2023-07-12 18:10:28'),
(75, 40, 1, '(ক) ভূদেব মুখোপাধ্যায়', 0, NULL, NULL, NULL, '2023-07-12 18:10:28', '2023-07-12 18:10:28'),
(76, 40, 1, '(খ) বঙ্কিমচন্দ্র চট্টোপাধ্যায়', 1, NULL, NULL, NULL, '2023-07-12 18:10:28', '2023-07-12 18:10:28'),
(77, 40, 1, '(গ) রাজা রামমোহন বার', 0, NULL, NULL, NULL, '2023-07-12 18:10:28', '2023-07-12 18:10:28'),
(78, 40, 1, '(ঘ) ঈশ্বরচন্দ্র বিদ্যাসাগর', 0, NULL, NULL, NULL, '2023-07-12 18:10:28', '2023-07-12 18:10:28'),
(80, 42, 1, 's', 1, '', NULL, '', '2023-07-16 16:24:21', '2023-07-16 16:24:21'),
(81, 42, 1, 'd', 0, '', NULL, '', '2023-07-16 16:24:21', '2023-07-16 16:24:21'),
(84, 43, 1, '11', 0, '', NULL, '', '2023-07-16 16:31:03', '2023-07-16 16:31:03'),
(85, 43, 1, '12', 0, '', NULL, '', '2023-07-16 16:31:03', '2023-07-16 16:31:03'),
(86, 43, 1, '13', 0, '', NULL, '', '2023-07-16 16:31:03', '2023-07-16 16:31:03'),
(87, 43, 1, '14', 1, '', NULL, '', '2023-07-16 16:31:03', '2023-07-16 16:31:03'),
(92, 45, 1, 'abc', 0, '', NULL, '', '2023-07-20 17:27:32', '2023-07-20 17:27:32'),
(93, 45, 1, 'abc', 1, '', NULL, '', '2023-07-20 17:27:32', '2023-07-20 17:27:32'),
(94, 45, 1, 'abc', 0, '', NULL, '', '2023-07-20 17:27:32', '2023-07-20 17:27:32'),
(95, 45, 1, 'abc', 0, '', NULL, '', '2023-07-20 17:27:32', '2023-07-20 17:27:32'),
(96, 45, 1, 'abc', 0, '', NULL, '', '2023-07-20 17:27:32', '2023-07-20 17:27:32'),
(97, 46, 1, 'bbb', 1, 'sds', NULL, NULL, '2023-07-20 17:29:27', '2023-07-20 17:29:27'),
(98, 46, 1, 'cvb', 0, 'sds', NULL, NULL, '2023-07-20 17:29:27', '2023-07-20 17:29:27'),
(99, 46, 1, 'dfdg', 0, 'sds', NULL, NULL, '2023-07-20 17:29:27', '2023-07-20 17:29:27'),
(100, 46, 1, 'werer', 0, 'sds', NULL, NULL, '2023-07-20 17:29:27', '2023-07-20 17:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `question_stores`
--

DROP TABLE IF EXISTS `question_stores`;
CREATE TABLE IF NOT EXISTS `question_stores` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `question_type` enum('MCQ','Written') COLLATE utf8mb4_unicode_ci DEFAULT 'MCQ',
  `question` text COLLATE utf8mb4_unicode_ci,
  `question_description` text COLLATE utf8mb4_unicode_ci,
  `question_image` text COLLATE utf8mb4_unicode_ci,
  `question_video_link` text COLLATE utf8mb4_unicode_ci,
  `question_mark` tinyint(4) DEFAULT '1',
  `negative_mark` double(8,2) DEFAULT '0.00',
  `question_hardness` enum('easy','hard','both') COLLATE utf8mb4_unicode_ci DEFAULT 'both',
  `written_que_ans` longtext COLLATE utf8mb4_unicode_ci,
  `written_que_ans_description` longtext COLLATE utf8mb4_unicode_ci,
  `written_que_file` text COLLATE utf8mb4_unicode_ci,
  `has_all_wrong_ans` tinyint(4) DEFAULT '0',
  `status` tinyint(4) DEFAULT '1',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `question_stores_created_by_foreign` (`created_by`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_stores`
--

INSERT INTO `question_stores` (`id`, `created_by`, `question_type`, `question`, `question_description`, `question_image`, `question_video_link`, `question_mark`, `negative_mark`, `question_hardness`, `written_que_ans`, `written_que_ans_description`, `written_que_file`, `has_all_wrong_ans`, `status`, `slug`, `subject_name`, `created_at`, `updated_at`) VALUES
(13, 1, 'MCQ', '<p>This is question three<br></p><p></p>', '<p>This is question three<br></p><p><br></p><p></p>', NULL, NULL, 1, 0.00, 'both', NULL, NULL, NULL, 0, 1, '<p>This-is-question-three<br></p><p></p>', NULL, '2023-06-14 00:32:39', '2023-06-14 00:32:39'),
(4, 1, 'Written', '<p>written question<br></p>', '<p>written question des<br></p>', NULL, 'written question vid des', 10, 0.50, 'both', '<p>written question ans<br></p>', '<p>written question ans des<br></p>', NULL, 0, 1, '<p>written-question<br></p>', NULL, '2023-05-21 00:08:37', '2023-05-21 09:34:53'),
(12, 1, 'MCQ', '<p>This is question two<br></p><p></p>', '<p>This is question two<br></p><p><br></p><p></p>', NULL, NULL, 1, 0.00, 'both', NULL, NULL, NULL, 0, 1, '<p>This-is-question-two<br></p><p></p>', NULL, '2023-06-14 00:32:39', '2023-06-14 00:32:39'),
(6, 1, 'Written', '<p>written ddddddddddddddddddddddddddddddddddddddd</p>', '<p>written ddddddddddddddddddddddddddddddddddddddd<br></p>', NULL, NULL, 1, 0.00, 'both', '<p>written ddddddddddddddddddddddddddddddddddddddd<br></p>', '<p>written ddddddddddddddddddddddddddddddddddddddd<br></p>', NULL, 0, 1, '<p>written-ddddddddddddddddddddddddddddddddddddddd</p>', NULL, '2023-06-05 08:17:35', '2023-06-05 08:17:35'),
(11, 1, 'MCQ', '<p>This is question One<br></p>', '<p>This is question One<br></p><p></p>', NULL, NULL, 1, 0.00, 'both', NULL, NULL, NULL, 0, 1, '<p>This-is-question-One<br></p>', NULL, '2023-06-14 00:32:39', '2023-06-14 00:32:39'),
(14, 1, 'MCQ', '<p>This is question four<br></p><p></p>', '<p>This is question four<br></p><p><br></p><p></p>', NULL, NULL, 1, 0.00, 'both', NULL, NULL, NULL, 0, 1, '<p>This-is-question-four<br></p><p></p>', NULL, '2023-06-14 00:32:39', '2023-06-14 00:32:39'),
(15, 1, 'MCQ', '<p>This is question five<br></p><p></p>', '<p>This is question five<br></p><p></p>', NULL, NULL, 1, 0.00, 'both', NULL, NULL, NULL, 0, 1, '<p>This-is-question-five<br></p><p></p>', NULL, '2023-06-14 00:32:39', '2023-06-14 00:32:39'),
(16, 1, 'Written', '<p>This is Written Question ONe</p>', NULL, NULL, NULL, 5, 0.00, 'both', '<p>This is Written Question one ans<br></p>', NULL, NULL, 0, 1, '<p>This-is-Written-Question-ONe</p>', NULL, '2023-06-16 11:29:00', '2023-06-16 11:29:00'),
(17, 1, 'Written', '<p>This is Written Question two<br></p>', NULL, NULL, NULL, 1, 0.00, 'both', NULL, NULL, NULL, 0, 1, '<p>This-is-Written-Question-two<br></p>', NULL, '2023-06-16 11:29:00', '2023-06-16 11:29:00'),
(18, 1, 'Written', '<p>This is Written Question three<br></p>', NULL, NULL, NULL, 1, 0.00, 'both', NULL, NULL, NULL, 0, 1, '<p>This-is-Written-Question-three<br></p>', NULL, '2023-06-16 11:29:00', '2023-06-16 11:29:00'),
(19, 1, 'Written', '<p>This is Written Question four<br></p>', NULL, NULL, NULL, 1, 0.00, 'both', NULL, NULL, NULL, 0, 1, '<p>This-is-Written-Question-four<br></p>', NULL, '2023-06-16 11:29:00', '2023-06-16 11:29:00'),
(20, 1, 'Written', '<p>written que xx</p>', '<p>sdes</p>', NULL, NULL, 20, 0.00, 'both', '<p>fsdfgs</p>', '<p>sdfgdgdfgfdg</p>', NULL, 0, 1, '<p>written-que-xx</p>', NULL, '2023-07-10 14:46:24', '2023-07-10 14:52:21'),
(21, 1, 'Written', '<p>asdasd ddsgdfg</p>', '<p>asdasd</p>', NULL, NULL, 1, 0.00, 'both', '<p>asdasd</p>', '<p>asd</p>', NULL, 0, 1, '<p>asdasd-ddsgdfg</p>', NULL, '2023-07-10 14:53:25', '2023-07-10 14:53:37'),
(22, 1, 'Written', '<p>fffffffffff sdzfsdf</p>', '<p>fff</p>', NULL, NULL, 1, 0.00, 'both', '<p>ff</p>', '<p>fff</p>', NULL, 0, 1, '<p>fffffffffff-sdzfsdf</p>', NULL, '2023-07-10 14:55:09', '2023-07-10 15:01:18'),
(28, 1, 'Written', '৩। বাংলা গদ্যরীতিকে পাঠ্যপুস্তকের বাইরে সর্বপ্রথম ব্যবহার করেন কে?', NULL, NULL, '(ক) ঈশ্বরচন্দ্র বিদ্যাসাগর', NULL, 0.00, 'both', NULL, NULL, NULL, 0, 1, NULL, NULL, '2023-07-11 13:35:06', '2023-07-11 13:35:06'),
(26, 1, 'Written', '১। বাংলা গদ্যের প্রাথমিক প্রচেষ্টার নির্দশন কোনটি?', NULL, NULL, '(ক) প্রভু বিশুর বাণী', NULL, 0.00, 'both', NULL, NULL, NULL, 0, 1, NULL, NULL, '2023-07-11 13:35:06', '2023-07-11 13:35:06'),
(27, 1, 'Written', '২। ’ওরিয়েন্টাল ফেবুলিস্ট’ গ্রন্থের রচয়িতা কে?', NULL, NULL, '(ক) তারিণীচরন মিত্র', NULL, 0.00, 'both', NULL, NULL, NULL, 0, 1, NULL, NULL, '2023-07-11 13:35:06', '2023-07-11 13:35:06'),
(29, 1, 'MCQ', '১। বাংলা গদ্যের প্রাথমিক প্রচেষ্টার নির্দশন কোনটি?', NULL, NULL, NULL, 1, 0.50, 'both', NULL, NULL, NULL, 0, 1, NULL, NULL, '2023-07-11 14:48:02', '2023-07-11 14:48:02'),
(30, 1, 'MCQ', '২। ’ওরিয়েন্টাল ফেবুলিস্ট’ গ্রন্থের রচয়িতা কে?', NULL, NULL, NULL, 1, 0.50, 'both', NULL, NULL, NULL, 0, 1, NULL, NULL, '2023-07-11 14:48:02', '2023-07-11 14:48:02'),
(31, 1, 'MCQ', '৩। বাংলা গদ্যরীতিকে পাঠ্যপুস্তকের বাইরে সর্বপ্রথম ব্যবহার করেন কে?', NULL, NULL, NULL, 1, 0.50, 'both', NULL, NULL, NULL, 0, 1, NULL, NULL, '2023-07-11 14:48:02', '2023-07-11 14:48:02'),
(32, 1, 'MCQ', '৪। বাংলা প্রবন্ধ পরিণতি লাভ করে কার হাতে?', NULL, NULL, NULL, 1, 0.50, 'both', NULL, NULL, NULL, 0, 1, NULL, NULL, '2023-07-11 14:48:02', '2023-07-11 14:48:02'),
(33, 1, 'MCQ', '১। বাংলা গদ্যের প্রাথমিক প্রচেষ্টার নির্দশন কোনটি?', NULL, NULL, NULL, 1, 0.50, 'both', NULL, NULL, NULL, 0, 1, NULL, NULL, '2023-07-12 18:10:19', '2023-07-12 18:10:19'),
(34, 1, 'MCQ', '২। ’ওরিয়েন্টাল ফেবুলিস্ট’ গ্রন্থের রচয়িতা কে?', NULL, NULL, NULL, 1, 0.50, 'both', NULL, NULL, NULL, 0, 1, NULL, NULL, '2023-07-12 18:10:19', '2023-07-12 18:10:19'),
(35, 1, 'MCQ', '৩। বাংলা গদ্যরীতিকে পাঠ্যপুস্তকের বাইরে সর্বপ্রথম ব্যবহার করেন কে?', NULL, NULL, NULL, 1, 0.50, 'both', NULL, NULL, NULL, 0, 1, NULL, NULL, '2023-07-12 18:10:19', '2023-07-12 18:10:19'),
(36, 1, 'MCQ', '৪। বাংলা প্রবন্ধ পরিণতি লাভ করে কার হাতে?', NULL, NULL, NULL, 1, 0.50, 'both', NULL, NULL, NULL, 0, 1, NULL, NULL, '2023-07-12 18:10:19', '2023-07-12 18:10:19'),
(37, 1, 'MCQ', '১। বাংলা গদ্যের প্রাথমিক প্রচেষ্টার নির্দশন কোনটি?', NULL, NULL, NULL, 1, 0.50, 'both', NULL, NULL, NULL, 0, 1, NULL, NULL, '2023-07-12 18:10:28', '2023-07-12 18:10:28'),
(38, 1, 'MCQ', '২। ’ওরিয়েন্টাল ফেবুলিস্ট’ গ্রন্থের রচয়িতা কে?', NULL, NULL, NULL, 1, 0.50, 'both', NULL, NULL, NULL, 0, 1, NULL, NULL, '2023-07-12 18:10:28', '2023-07-12 18:10:28'),
(39, 1, 'MCQ', '৩। বাংলা গদ্যরীতিকে পাঠ্যপুস্তকের বাইরে সর্বপ্রথম ব্যবহার করেন কে?', NULL, NULL, NULL, 1, 0.50, 'both', NULL, NULL, NULL, 0, 1, NULL, NULL, '2023-07-12 18:10:28', '2023-07-12 18:10:28'),
(40, 1, 'MCQ', '৪। বাংলা প্রবন্ধ পরিণতি লাভ করে কার হাতে?', NULL, NULL, NULL, 1, 0.50, 'both', NULL, NULL, NULL, 0, 1, NULL, NULL, '2023-07-12 18:10:28', '2023-07-12 18:10:28'),
(42, 1, 'MCQ', '<p>asdasdasd</p>', NULL, NULL, NULL, 1, 0.00, 'both', NULL, NULL, NULL, 0, 1, '<p>asdasdasd</p>', NULL, '2023-07-16 16:24:21', '2023-07-16 16:24:21'),
(43, 1, 'MCQ', '1', NULL, NULL, NULL, 1, 0.00, 'both', NULL, NULL, NULL, 0, 1, '1', NULL, '2023-07-16 16:31:03', '2023-07-16 16:31:03'),
(45, 1, 'MCQ', '<p>abc</p>', '<p>abc<br></p>', NULL, NULL, 1, 0.00, 'both', NULL, NULL, NULL, 0, 1, '<p>abc</p>', NULL, '2023-07-20 17:27:32', '2023-07-20 17:27:32'),
(46, 1, 'MCQ', 'bbb', 'bbb', NULL, NULL, 1, 0.00, 'both', NULL, NULL, NULL, 0, 1, NULL, NULL, '2023-07-20 17:29:27', '2023-07-20 17:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `question_store_question_topic`
--

DROP TABLE IF EXISTS `question_store_question_topic`;
CREATE TABLE IF NOT EXISTS `question_store_question_topic` (
  `question_store_id` bigint(20) UNSIGNED NOT NULL,
  `question_topic_id` bigint(20) UNSIGNED NOT NULL,
  KEY `question_store_question_topic_question_store_id_foreign` (`question_store_id`),
  KEY `question_store_question_topic_question_topic_id_foreign` (`question_topic_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_store_question_topic`
--

INSERT INTO `question_store_question_topic` (`question_store_id`, `question_topic_id`) VALUES
(39, 13),
(38, 13),
(37, 13),
(36, 13),
(4, 3),
(35, 13),
(6, 3),
(34, 13),
(33, 13),
(32, 1),
(31, 1),
(30, 1),
(29, 1),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(22, 11),
(26, 7),
(27, 7),
(28, 7),
(40, 13),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 13),
(46, 13),
(47, 13),
(48, 7),
(49, 7),
(50, 7),
(51, 7),
(52, 7),
(53, 7),
(54, 7),
(55, 7);

-- --------------------------------------------------------

--
-- Table structure for table `question_topics`
--

DROP TABLE IF EXISTS `question_topics`;
CREATE TABLE IF NOT EXISTS `question_topics` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `question_topic_id` bigint(20) UNSIGNED DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `order` tinyint(4) DEFAULT '1',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `type` enum('mcq','written') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `question_topics_question_topic_id_foreign` (`question_topic_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_topics`
--

INSERT INTO `question_topics` (`id`, `question_topic_id`, `created_by`, `name`, `icon`, `image`, `meta_title`, `meta_description`, `order`, `slug`, `status`, `type`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'dashboard', NULL, NULL, NULL, NULL, 1, 'dashboard', 1, 'mcq', '2023-04-27 12:14:57', '2023-04-27 12:21:26'),
(3, 6, 1, 'hello', NULL, NULL, NULL, NULL, 1, 'hello', 1, 'mcq', '2023-04-27 12:38:21', '2023-05-05 23:22:44'),
(5, 0, 1, 'demo cat', NULL, NULL, NULL, NULL, 1, 'demo-cat', 0, 'mcq', '2023-04-28 10:43:18', '2023-04-28 10:43:18'),
(6, 5, 1, 'sub cat', NULL, NULL, NULL, NULL, 1, 'sub-cat', 0, 'mcq', '2023-04-28 10:43:34', '2023-04-28 10:43:34'),
(7, 0, 1, 'Written Exam Category', NULL, NULL, NULL, NULL, 1, 'Written-Exam-Category', 1, 'written', '2023-06-06 22:30:32', '2023-07-10 04:52:11'),
(8, 1, 1, 'dashboardxxxxxxxxx', NULL, NULL, NULL, NULL, 1, 'dashboardxxxxxxxxx', 0, 'mcq', '2023-06-07 12:50:19', '2023-06-07 12:50:19'),
(9, 8, 1, 'sub-sub-topic', NULL, NULL, NULL, NULL, 1, 'sub-sub-topic', 1, 'mcq', '2023-07-10 04:21:21', '2023-07-10 04:21:21'),
(10, 1, 1, 'sub-topic', NULL, NULL, NULL, NULL, 1, 'sub-topic', 1, 'mcq', '2023-07-10 04:21:38', '2023-07-10 04:21:38'),
(11, 0, 1, 'need update', NULL, NULL, NULL, NULL, 1, 'need-update', 1, 'written', '2023-07-10 04:53:48', '2023-07-10 04:55:04'),
(12, 11, 1, 'dashboardcxcxcxccxx', NULL, NULL, NULL, NULL, 1, 'dashboardcxcxcxccxx', 1, 'written', '2023-07-10 15:14:26', '2023-07-10 15:14:26'),
(13, 0, 1, 'test', NULL, NULL, NULL, NULL, 1, 'test', 1, 'mcq', '2023-07-11 04:26:13', '2023-07-11 04:26:13');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` tinyint(4) DEFAULT '0',
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `note`, `slug`, `is_default`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '<p>super-admin</p>', 'super-admin', 1, 1, NULL, '2023-05-09 12:08:41'),
(2, 'Admin', '', 'admin', 1, 1, NULL, NULL),
(3, 'Teacher', '', 'teacher', 1, 1, NULL, NULL),
(4, 'Student', '', 'student', 1, 1, NULL, NULL),
(5, 'Stuff', '', 'stuff', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  KEY `role_user_user_id_foreign` (`user_id`),
  KEY `role_user_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(3, 3),
(1, 2),
(1, 1),
(4, 3),
(13, 3),
(14, 4),
(7, 4),
(25, 3),
(20, 4),
(26, 4),
(12, 4),
(27, 4);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('j7agjjR6QAp9x9in1VFrLQ5ieDn9kFefMUWcoLnt', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiVGFMZ1B2Y2plUDQ4WXBqMEsxNG53QkU0M3E1MDd5WEQ2ZzN6aEhtbSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo3ODoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2JhdGNoLWV4YW0tc2VjdGlvbi1jb250ZW50cz9iYXRjaF9leGFtX2lkPTMmc2VjdGlvbl9pZD01Ijt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdHVkZW50L2JhdGNoLWV4YW0tY29udGVudHMvMy9NQT09L3NkZnNkZiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkZC9ja2E1U05qeXlqSFZQcVBmY2dUdS9xTWZGSEc0eWlFWFlWYjh0aG5EbEZUQU5HYWJHN2UiO30=', 1691392470);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `present_address` text COLLATE utf8mb4_unicode_ci,
  `permanent_address` text COLLATE utf8mb4_unicode_ci,
  `last_education` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) DEFAULT '1',
  `gender` enum('male','female','other') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `college` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `university` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github` text COLLATE utf8mb4_unicode_ci,
  `twitter` text COLLATE utf8mb4_unicode_ci,
  `linkedin` text COLLATE utf8mb4_unicode_ci,
  `whatsapp` text COLLATE utf8mb4_unicode_ci,
  `facebook` text COLLATE utf8mb4_unicode_ci,
  `website` text COLLATE utf8mb4_unicode_ci,
  `institute_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `students_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `first_name`, `last_name`, `email`, `mobile`, `image`, `description`, `present_address`, `permanent_address`, `last_education`, `status`, `gender`, `dob`, `school`, `college`, `university`, `github`, `twitter`, `linkedin`, `whatsapp`, `facebook`, `website`, `institute_name`, `created_at`, `updated_at`) VALUES
(3, 14, 'first', 'last', 'student@student.com', '01423456789', 'backend/assets/uploaded-files/student-images/student-1687925295702.jpg', NULL, NULL, NULL, NULL, 1, 'male', '2000-07-26', 'al amin academy', 'milestone', 'nu', NULL, NULL, NULL, NULL, NULL, NULL, 'bitm', '2023-06-17 09:18:13', '2023-07-03 19:47:24'),
(6, 26, NULL, NULL, 'd@d.d', '01236547890', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-14 03:49:46', '2023-07-14 03:49:46');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_orders`
--

DROP TABLE IF EXISTS `subscription_orders`;
CREATE TABLE IF NOT EXISTS `subscription_orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `exam_subscription_package_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_invoice_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor` enum('bkash','rocket','nagad') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_form` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `txt_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` double(10,2) DEFAULT '0.00',
  `total_amount` double(10,2) DEFAULT '0.00',
  `status` tinyint(4) DEFAULT '0' COMMENT '0=>pending,1=>approved,2=>canceled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_orders`
--

INSERT INTO `subscription_orders` (`id`, `exam_subscription_package_id`, `user_id`, `order_invoice_number`, `payment_method`, `vendor`, `paid_to`, `paid_form`, `txt_id`, `paid_amount`, `total_amount`, `status`, `created_at`, `updated_at`) VALUES
(3, 5, 20, '294138', 'cod', 'bkash', '01576525602', '01576525602', 'zxc02', 0.00, 3000.00, 0, '2023-07-05 10:57:36', '2023-07-05 10:57:36');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `present_address` text COLLATE utf8mb4_unicode_ci,
  `permanent_address` text COLLATE utf8mb4_unicode_ci,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_education` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_commission` int(11) DEFAULT '0',
  `status` tinyint(4) DEFAULT '1',
  `github` text COLLATE utf8mb4_unicode_ci,
  `facebook` text COLLATE utf8mb4_unicode_ci,
  `twitter` text COLLATE utf8mb4_unicode_ci,
  `linkedin` text COLLATE utf8mb4_unicode_ci,
  `whatsapp` text COLLATE utf8mb4_unicode_ci,
  `website` text COLLATE utf8mb4_unicode_ci,
  `gender` enum('male','female','other') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teachers_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `first_name`, `last_name`, `email`, `mobile`, `image`, `description`, `present_address`, `permanent_address`, `subject`, `last_education`, `total_commission`, `status`, `github`, `facebook`, `twitter`, `linkedin`, `whatsapp`, `website`, `gender`, `dob`, `created_at`, `updated_at`) VALUES
(3, 13, 'Teacher', 'One', 'teacher@teacher.com', '01323456789', 'backend/assets/uploaded-files/student-images/student-1685774909798.jpg', NULL, 'Dhaka', NULL, 'Bangla', NULL, 0, 1, 'github.com', 'fb.com', 'twitter.com', 'linkedin.com', NULL, 'teacher.com', NULL, NULL, '2023-06-03 00:19:18', '2023-06-03 00:53:18'),
(7, 25, NULL, NULL, 'a@a.a', '044123456789', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-14 03:39:18', '2023-07-14 03:39:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) DEFAULT '1',
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mobile_unique` (`mobile`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `mobile`, `password`, `status`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '01646688970', '$2y$10$d/cka5SNjyyjHVPqPfcgTu/qMfFHG4yiEXYVb8thnDlFTANGabG7e', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-19 11:34:34', '2023-04-19 11:34:34'),
(13, 'Teacher', 'teacher@teacher.com', NULL, '01323456789', '$2y$10$uoBt7B4LMSzLLgEDxTW9zOCjQzk8mcT3FPOk/MxRqsTqcmsTnqvZ6', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-03 00:19:18', '2023-06-03 04:59:41'),
(14, 'student', 'student@student.com', NULL, '01423456789', '$2y$10$InysB93duaxLTKvYj8.hoOjTmaVTwjlaei.9YkujU5YvdRZQRrtma', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-17 09:18:13', '2023-07-03 08:04:22'),
(27, 'st', NULL, NULL, '01576525602', '$2y$10$LtR1JMy5jI58jIIWR4YdAOehpS2eomvnBgVExbVuJKgv2NWXQUnX6', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-20 17:39:04', '2023-07-20 17:39:04'),
(25, 'teacher 2', 'a@a.a', NULL, '044123456789', '$2y$10$lfsjstpHLbu6TIiOEFrgpuDjiR0.3Xm1cdacp2ocHJ0Fsfo62SX.e', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-14 03:39:18', '2023-07-14 03:39:18'),
(26, 'student 2', 'd@d.d', NULL, '01236547890', '$2y$10$/2GYo8XZMtDQLOZcHy/wnujsfzUSl5kS5ChODgZR2UtPBeiPhSLoi', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-14 03:49:46', '2023-07-14 03:49:46');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
