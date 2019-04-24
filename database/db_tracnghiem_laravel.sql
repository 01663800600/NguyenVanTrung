-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2019 at 03:43 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tracnghiem_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE `chapter` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chapter_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_chapter` bigint(20) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`id`, `chapter_name`, `status_chapter`) VALUES
(1, 'toán Rơi tự gio', 0),
(2, 'Sinh viên mac cấp1', 21),
(3, 'Sinh viên mac cấp 2', 22),
(4, 'Sinh viên english giao tiếp', 17),
(5, 'Sinh viên english ngữ pháp', 18),
(6, 'Sinh thực hành', 24),
(7, 'english bai tap', 0),
(8, 'tư tưởng hồ chí minh', 22),
(9, 'Toán cao cấp', 0),
(10, 'Lập trình html', 16),
(11, 'lập trình php', 16),
(12, 'lập trình MVC', 16),
(13, 'tiếng anh cơ bản', 18),
(14, 'tiếng anh 1', 17),
(15, 'tiếng anh cao cấp', 17),
(16, 'tiếng anh 3', 18),
(17, 'toán rời rạc', 0),
(18, 'mạng máy tính', 23),
(19, 'tin học đại cương', 24),
(20, 'Cuộc sống hả', 24);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class_name`) VALUES
(1, 'Lớp 10'),
(2, 'Lớp 11'),
(3, 'Lớp 12'),
(4, 'Sinh Viên'),
(5, 'Xa hội');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `id_subject` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `time_to_do` int(11) NOT NULL,
  `exam_number` int(11) DEFAULT NULL,
  `number_question` int(11) DEFAULT NULL,
  `level_of_exam` int(11) DEFAULT NULL,
  `same_exam` int(11) DEFAULT NULL,
  `id_group` int(11) NOT NULL,
  `status_exam` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `id_user`, `id_subject`, `title`, `created_at`, `time_to_do`, `exam_number`, `number_question`, `level_of_exam`, `same_exam`, `id_group`, `status_exam`) VALUES
(1, 2, 1, 'đề thi 1 môn toán lớp 10', '2019-04-17 00:00:00', 40, 2, 40, 10, NULL, 0, 0),
(2, 2, 1, 'đề thi 2 môn toán lớp 10', '2019-04-16 00:00:00', 40, 2, 40, 10, NULL, 0, 0),
(3, 1, 14, 'đề thi 1 ad 1 môn Tiếng anh sinh vien', '2019-04-15 00:00:00', 40, 2, 40, 10, NULL, 0, 0),
(4, 1, 14, 'đề thi 2 ad 2 môn Tiếng anh sinh vien', '2019-04-16 00:00:00', 40, 2, 40, 10, NULL, 0, 0),
(5, 1, 1, 'mới tạo', '2019-04-30 00:00:00', 40, 2, 40, 10, NULL, 0, 1),
(6, 2, 1, 'mới tạo 2', '2019-04-16 00:00:00', 40, 2, 40, 10, NULL, 0, 2),
(7, 1, 13, 'mới tạo 3', '2019-04-28 00:00:00', 40, 2, 40, 10, NULL, 0, 2),
(8, 1, 1, 'đề thi 2 ad 2 môn Tiếng anh sinh vien', '2019-04-27 00:00:00', 40, 2, 40, 10, NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_friend` bigint(20) UNSIGNED NOT NULL,
  `status_friend` tinyint(4) NOT NULL DEFAULT '0',
  `created_friend` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id_user`, `id_friend`, `status_friend`, `created_friend`) VALUES
(1, 3, 1, '2019-04-18'),
(1, 6, 1, '2019-04-29'),
(2, 3, 0, '2019-04-05'),
(6, 1, 1, '2019-04-10'),
(6, 2, 0, '2019-04-08'),
(6, 3, 1, '2019-04-18'),
(6, 4, 0, '2019-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `matrixs`
--

CREATE TABLE `matrixs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_subject` bigint(20) UNSIGNED DEFAULT '0',
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `id_item` bigint(20) UNSIGNED DEFAULT NULL,
  `id_chapter` bigint(20) UNSIGNED DEFAULT NULL,
  `status_matrix` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matrixs`
--

INSERT INTO `matrixs` (`id`, `id_subject`, `id_user`, `id_item`, `id_chapter`, `status_matrix`) VALUES
(1, 1, 1, 1, 1, 1),
(2, 1, 2, 2, 1, 0),
(3, 3, 1, 4, 6, 0),
(6, 6, 1, 16, 4, 1),
(7, 6, 2, 16, 4, 0),
(11, 6, 2, 10, 4, 0),
(12, 14, 2, 14, 5, 0),
(13, 14, 2, 15, 4, 0),
(14, 14, 2, 14, 4, 0),
(15, 14, 2, 12, 4, 0),
(16, 14, 2, 11, 4, 0),
(17, 13, 1, 7, 2, 1),
(19, 13, 1, 9, 3, 1),
(20, 13, 1, 8, 2, 1),
(28, 18, 6, 13, 15, 1),
(29, 23, 6, 21, 18, 1),
(30, 16, 6, 20, 11, 1),
(31, 16, 6, 20, 12, 1),
(32, 23, 6, 24, 18, 1),
(33, 16, 6, 25, 11, 1),
(34, 23, 6, 22, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(26, '2014_10_12_000000_create_users_table', 1),
(27, '2014_10_12_100000_create_password_resets_table', 1),
(28, '2019_04_04_121001_classes', 1),
(29, '2019_04_04_121101_subjects', 1),
(30, '2019_04_04_121119_matrixs', 1),
(31, '2019_04_04_121556_questions', 1),
(32, '2019_04_04_121900_exams', 1),
(33, '2019_04_04_122001_question_and_exam', 1),
(34, '2019_04_04_122513_scores', 1),
(35, '2019_04_17_215414_subject_define', 2),
(36, '2019_04_17_221152_update_table_subjects', 3),
(39, '2019_04_18_125149_subject_and_chapter_item', 4),
(41, '2019_04_18_110236_chapter', 5),
(42, '2019_04_18_111540_update_table_matrixs', 6),
(47, '2019_04_18_110100_subject_and_chapter_item', 7),
(48, '2019_04_18_111541_update_table_matrixs', 8),
(50, '2019_04_17_221153_update_table_subjects', 9),
(52, '2019_04_19_205052_friends', 10),
(53, '2019_04_19_214601_user_info', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_matrix` bigint(20) UNSIGNED NOT NULL,
  `content_question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_a` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_b` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_c` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_d` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` int(11) NOT NULL,
  `level_of_question` int(11) NOT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `status_question` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `id_matrix`, `content_question`, `question_a`, `question_b`, `question_c`, `question_d`, `answer`, `level_of_question`, `id_user`, `status_question`) VALUES
(1, 1, ' 1', ' noi dung a', 'Noi dung b', 'noi dung c', 'l noi dung d', 1, 3, 1, 0),
(2, 1, 'nội dung câu hỏi 2', ' noi dung a', 'Noi dung b', 'noi dung c', 'l noi dung d', 1, 3, 1, 0),
(3, 1, 'nội dung câu hỏi 3', ' noi dung a', 'Noi dung b', 'noi dung c', 'l noi dung d', 1, 3, 1, 0),
(4, 1, 'nội dung câu hỏi 4', ' noi dung a', 'Noi dung b', 'noi dung c', 'l noi dung d', 1, 3, 1, 0),
(5, 1, 'nội dung câu hỏi 5', ' noi dung a', 'Noi dung b', 'noi dung c', 'l noi dung d', 1, 3, 1, 0),
(6, 1, 'nội dung câu hỏi 6', ' noi dung a', 'Noi dung b', 'noi dung c', 'l noi dung d', 1, 3, 1, 0),
(7, 3, 'nội dung câu hỏi 1 ma trận 3', ' noi dung a', 'Noi dung b', 'noi dung c', 'l noi dung d', 2, 6, 1, 0),
(8, 3, 'nội dung câu hỏi 2 ma trận 3', ' noi dung a', 'Noi dung b', 'noi dung c', 'l noi dung d', 4, 6, 1, 0),
(9, 3, 'nội dung câu hỏi 3 ma trận 3', ' noi dung a', 'Noi dung b', 'noi dung c', 'l noi dung d', 3, 6, 1, 0),
(10, 3, 'nội dung câu hỏi 4 ma trận 3', ' noi dung a', 'Noi dung b', 'noi dung c', 'l noi dung d', 2, 6, 1, 0),
(11, 3, 'nội dung câu hỏi 5 ma trận 3', ' noi dung a', 'Noi dung b', 'noi dung c', 'l noi dung d', 1, 6, 1, 0),
(12, 3, 'nội dung câu hỏi 6 ma trận 3', ' noi dung a', 'Noi dung b', 'noi dung c', 'l noi dung d', 4, 6, 1, 0),
(13, 3, 'nội dung câu hỏi 7 ma trận 3', ' noi dung a', 'Noi dung b', 'noi dung c', 'l noi dung d', 4, 6, 1, 0),
(14, 3, 'nội dung câu hỏi 8 ma trận 3', ' noi dung a', 'Noi dung b', 'noi dung c', 'l noi dung d', 3, 6, 1, 0),
(15, 3, 'nội dung câu hỏi 9 ma trận 3', ' noi dung a', 'Noi dung b', 'noi dung c', 'l noi dung d', 2, 6, 1, 0),
(16, 3, 'nội dung câu hỏi 10 ma trận 3', ' noi dung a', 'Noi dung b', 'noi dung c', 'l noi dung d', 2, 6, 1, 0),
(17, 3, 'nội dung câu hỏi 11 ma trận 3', ' noi dung a', 'Noi dung b', 'noi dung c', 'l noi dung d', 1, 6, 1, 0),
(18, 3, 'nội dung câu hỏi 12 ma trận 3', ' noi dung a', 'Noi dung b', 'noi dung c', 'l noi dung d', 4, 6, 1, 0),
(19, 12, 'nội dung câu hỏi 1 ma trận 12', ' noi dung a', 'Noi dung b', 'noi dung c', 'l noi dung d', 4, 6, 2, 0),
(20, 12, 'nội dung câu hỏi 2 ma trận 12', ' noi dung a', 'Noi dung b', 'noi dung c', 'l noi dung d', 1, 6, 2, 0),
(21, 12, 'nội dung câu hỏi 3 ma trận 12', ' noi dung a', 'Noi dung b', 'noi dung c', 'l noi dung d', 1, 6, 2, 0),
(22, 12, 'nội dung câu hỏi 4 ma trận 12', ' noi dung a', 'Noi dung b', 'noi dung c', 'l noi dung d', 2, 6, 2, 0),
(23, 12, 'nội dung câu hỏi 5 ma trận 12', ' noi dung a', 'Noi dung b', 'noi dung c', 'l noi dung d', 2, 6, 2, 0),
(24, 12, 'nội dung câu hỏi 6 ma trận 12', ' noi dung a', 'Noi dung b', 'noi dung c', 'l noi dung d', 3, 6, 2, 0),
(25, 12, 'nội dung câu hỏi 7 ma trận 12', ' noi dung a', 'Noi dung b', 'noi dung c', 'l noi dung d', 3, 6, 2, 0),
(30, 12, 'nội dung câu hỏi 3 ma trận 3', ' noi dung a', 'Noi dung b', 'noi dung c', 'l noi dung d', 3, 6, 1, 0),
(31, 34, 'nội dung câu hỏi 8 ma trận 3', ' noi dung a', 'Noi dung b', 'noi dung c', 'l noi dung d', 3, 6, 6, 1),
(40, 34, 'nội dung câu hỏi 5', ' noi dung a', 'Noi dung b', 'noi dung c', 'l noi dung d', 1, 3, 6, 1),
(41, 1, 'nội dung câu hỏi 11 ma trận 3', ' noi dung a', 'Noi dung b', 'noi dung c', 'l noi dung d', 1, 6, 1, 1),
(42, 1, 'nội dung câu hỏi 12 ma trận 3', ' noi dung a', 'Noi dung b', 'noi dung c', 'l noi dung d', 4, 6, 1, 1),
(43, 1, ' 1', ' noi dung a', 'Noi dung b', 'noi dung c', 'l noi dung d', 1, 3, 1, 1),
(44, 1, 'nội dung câu hỏi 2', ' noi dung a', 'Noi dung b', 'noi dung c', 'l noi dung d', 1, 3, 1, 2),
(45, 6, ' 1', ' noi dung a', 'Noi dung b', 'noi dung c', 'l noi dung d', 1, 3, 1, 1),
(46, 17, ',l;k;k;lk', 'jjgjhghjkj', 'ktygy', 'jl;j;lk', 'tyug7', 2, 8, 1, 1),
(49, 28, 'sửa AAAAAAAAAAA', 'adadw', 'adadw', '3424234', 'adadw', 3, 10, 6, 1),
(50, 29, 'trungggggg AI IAAAIIAIIAIII', 'trungggggg AI IAAAIIAIIAIII', 'trungggggg AI IAAAIIAIIAIII', 'trungggggg AI IAAAIIAIIAIII', 'trungggggg AI IAAAIIAIIAIII', 2, 10, 6, 1),
(51, 29, 'Cau hoi thu 2', '2131', 'Cau hoi thu 2', 'Cau hoi thu 2', 'Cau hoi thu 2', 1, 7, 6, 1),
(52, 29, 'Cau hoi thu 2', '2131', 'Cau hoi thu 2', 'Cau hoi thu 2', 'Cau hoi thu 2', 1, 7, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `question_and_exam`
--

CREATE TABLE `question_and_exam` (
  `id_exam` bigint(20) UNSIGNED NOT NULL,
  `id_question` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_and_exam`
--

INSERT INTO `question_and_exam` (`id_exam`, `id_question`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(2, 1),
(2, 2),
(2, 6),
(3, 19),
(3, 20),
(3, 21),
(3, 22),
(3, 23),
(4, 23),
(4, 24),
(4, 25),
(7, 14),
(7, 15),
(7, 16),
(7, 17),
(7, 18),
(7, 21);

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_exam` bigint(20) UNSIGNED DEFAULT NULL,
  `answer_number` int(11) NOT NULL,
  `exam_number` int(11) NOT NULL,
  `exam_day` datetime NOT NULL,
  `id` int(11) NOT NULL,
  `score` double NOT NULL,
  `status_user_scores` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id_user`, `id_exam`, `answer_number`, `exam_number`, `exam_day`, `id`, `score`, `status_user_scores`) VALUES
(6, 7, 0, 6, '2019-04-21 18:18:42', 47, 0, 1),
(6, 7, 0, 6, '2019-04-21 18:19:02', 48, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_class` int(10) UNSIGNED DEFAULT NULL,
  `subject_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `id_sd` bigint(20) UNSIGNED DEFAULT NULL,
  `status_subject` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `id_class`, `subject_name`, `id_user`, `id_sd`, `status_subject`) VALUES
(1, 1, 'Toán', 2, 5, 0),
(2, 1, 'Hóa', 2, 11, 0),
(3, 1, 'Sinh', 2, 8, 0),
(4, 3, 'Hóa', 2, 11, 0),
(5, 3, 'Sinh', 2, 8, 0),
(6, 3, 'Tiếng anh', 2, 10, 0),
(7, 3, 'GDCD', 2, 9, 0),
(8, 2, 'Hóa', 1, 11, 0),
(9, 2, 'Văn', 1, 4, 0),
(10, 2, 'Tiếng Anh', 2, 13, 0),
(11, 2, 'Sử', 2, 6, 0),
(12, 2, 'Địa', 1, 3, 0),
(13, 4, 'sinh viên mác', 1, 2, 0),
(14, 4, 'Sinh viên english', 2, 1, 0),
(15, 2, 'Toán', 2, 5, 0),
(16, NULL, 'Lập trình web cơ bản', NULL, NULL, 1),
(17, NULL, 'Tiếng anh cơ bản', NULL, NULL, 1),
(18, NULL, 'Tiếng anh 2', NULL, NULL, 1),
(19, NULL, 'OPP hướng đối tượng', NULL, NULL, 1),
(20, NULL, 'Lập trình C++', NULL, NULL, 1),
(21, NULL, 'Tư tưởng hồ chí minh', NULL, NULL, 1),
(22, NULL, 'Mac-Lenin', NULL, NULL, 1),
(23, NULL, 'Mạng máy tính', NULL, NULL, 1),
(24, NULL, 'Môn Học khác', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject_and_chapter_item`
--

CREATE TABLE `subject_and_chapter_item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_name_item` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject_and_chapter_item`
--

INSERT INTO `subject_and_chapter_item` (`id`, `subject_name_item`) VALUES
(1, 'Lực ma sát'),
(2, 'không lực ma sát'),
(3, 'có lực ma sát'),
(4, 'Thực hành con cóc'),
(5, 'Thực hành con voi'),
(6, 'Thực hành con ruồi'),
(7, 'Tư tưởng hồ chí minh'),
(8, 'tư tưởng Mác lê nin'),
(9, 'Tư tưởng đảng cộng sản việt nam'),
(10, 'bài tập giao tiếp cơ bản'),
(11, 'bài tập giao tiếp trung bình'),
(12, 'bài tập giao tiếp khó'),
(13, 'bài tập giao tiếp bản ngữ'),
(14, 'english đời sống'),
(15, 'english công ty'),
(16, 'english gia đình'),
(17, 'đường lối cách mạng mới'),
(18, 'hồ chí minh sau 1980'),
(19, 'lập trình front end'),
(20, 'lập trình back end'),
(21, 'cấu hình mạng máy tính'),
(22, 'cấu hình mạng lan'),
(23, 'hàm cơ bản tin học Đại cương'),
(24, 'hàm nâng cao'),
(25, 'sử dụng lập trình vào thực tiễn'),
(26, 'hác não tiếng anh'),
(27, 'mẹo ở trương');

-- --------------------------------------------------------

--
-- Table structure for table `subject_define`
--

CREATE TABLE `subject_define` (
  `sd_id` bigint(20) UNSIGNED NOT NULL,
  `subject_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject_define`
--

INSERT INTO `subject_define` (`sd_id`, `subject_name`) VALUES
(1, 'Sinh viên english'),
(2, 'sinh viên mác'),
(3, 'Địa'),
(4, 'Văn'),
(5, 'Toán'),
(6, 'Sử'),
(8, 'Sinh'),
(9, 'GDCD'),
(10, 'Tiếng anh'),
(11, 'Hóa'),
(13, 'Tiếng Anh');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `level` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `birthday`, `level`, `remember_token`, `created_at`, `updated_at`, `images`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$WE6PI225ncWeVDa/G3L8.eoxGEbGsf7VK5QWj0LnuLkBrHMCr7SyS', '0aD0c8MUgr', '2019-07-07', 2, NULL, NULL, NULL, 'Hinh.jpg'),
(2, 'ic5dl', 'miL7etqPM7@gmail.com', NULL, '$2y$10$E884AeeEQIMaYs8rmKUY5.rul0VAnuQpRXZGF.ymzIXciWK3PJc8u', 'nu1P2M5wo0', '2019-04-05', 1, NULL, NULL, NULL, NULL),
(3, '2T1JO', 'ORwvk8ZRSx@gmail.com', NULL, '$2y$10$n3qsGDoIp/GpZzXH1fIyw.HUXjiYF7nvaH.0trDmnDK96.ElEaQMW', 'hJyYnRkK7P', '2019-04-05', 1, NULL, NULL, NULL, NULL),
(4, 'JCXkW', 'tu8ccTtARz@gmail.com', NULL, '$2y$10$RDNzDGrV6k3mI2vbQb/Wfu2ByWvfrz4p4ffZKsouv.u0SYkdqdTCy', 'LD5P08C33F', '2019-04-05', 1, NULL, NULL, NULL, NULL),
(5, 'b7bct', 'pDmKCVVIGz@gmail.com', NULL, '$2y$10$iKZyRjZNGSDfiURKemZEjeUVnVRqESGtoy6ZS3mPUbR4FoU4PLksi', 'z49u11RTgf', '2019-04-05', 0, NULL, NULL, NULL, NULL),
(6, 'EICZJ', 'a9p7NufgN8@gmail.com', NULL, '$2y$10$Rvsrzbsp/Cb0cgjN9Oo2tewqp6wm5GUxAehogiMLWTvNi2sKtlm4a', 'aCsknqyBCI', '2019-04-05', 0, NULL, NULL, NULL, NULL),
(7, 'TeBw6', 'oRwezTpNAG@gmail.com', NULL, '$2y$10$BjjfUF6ZEf1pNVj1rDtleOufrUQD2MR7hXFBBq.ECaf7Abkgzbon2', 'qxm49Te2Y3', '2019-04-05', 0, NULL, NULL, NULL, NULL),
(8, 'pakdx', 'lcz78DJZjx@gmail.com', NULL, '$2y$10$KyvmmWvpXQfgAZKE8N405./P8FsJPwy7fqLs.qaG518UuHvw0SHpq', 'WNB2mfmtam', '2019-04-05', 0, NULL, NULL, NULL, NULL),
(9, '27cbJ', 'gmjPjUCSht@gmail.com', NULL, '$2y$10$T42ONSpW9ukRrAeZtt/nX.lzj3Q7bOSvTxyF3eQVREl/TEZLPhwQy', 'BtRiZFGeHh', '2019-04-05', 0, NULL, NULL, NULL, NULL),
(10, 'DlHXz', 'lw5bCzWBt2@gmail.com', NULL, '$2y$10$TDCTuqD2mAVBw8E.GW34pO/7x.2pV59eFcKmPRI44PwNUW2CA3Dna', 'RWH9hViznW', '2019-04-05', 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Hinh.jpg',
  `gender` tinyint(4) NOT NULL,
  `introduct` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ago` int(3) DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id_user`, `images`, `gender`, `introduct`, `created_at`, `full_name`, `title_user`, `ago`, `phone`) VALUES
(1, 'Hinh.jpg', 1, 'admin', '2019-04-09', 'bos ne', 'chi co anh', 21, NULL),
(2, 'Hinh.jpg', 0, 'nguoi dung 2', '2019-04-02', 'kong có', 'cai thu 2', 12, NULL),
(3, 'Hinh.jpg', 0, 'nguoi dung 3', '2019-04-17', 'adawdwdw', 'xong haha', 20, NULL),
(4, 'Hinh.jpg', 1, 'nguoi dung 4', '2019-04-02', 'nguoi dung 4', 'a hihi', 18, NULL),
(6, 'Hinh.jpg', 0, 'Thích xem phim', '2019-04-09', 'Nguyên Văn', 'Học ngành CNTT và không thích', 19, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `chapter_id_unique` (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exams_id_user_foreign` (`id_user`),
  ADD KEY `exams_id_subject_foreign` (`id_subject`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD UNIQUE KEY `friends_id_user_id_fiend_unique` (`id_user`,`id_friend`),
  ADD KEY `id_fiend` (`id_friend`);

--
-- Indexes for table `matrixs`
--
ALTER TABLE `matrixs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matrixs_id_chapter_id_item_id_user_id_subject_unique` (`id_chapter`,`id_item`,`id_user`,`id_subject`),
  ADD KEY `matrixs_id_subject_foreign` (`id_subject`),
  ADD KEY `matrixs_id_user_foreign` (`id_user`),
  ADD KEY `matrixs_id_item_foreign` (`id_item`);

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
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_id_matrix_foreign` (`id_matrix`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `question_and_exam`
--
ALTER TABLE `question_and_exam`
  ADD UNIQUE KEY `question_and_exam_id_exam_id_question_unique` (`id_exam`,`id_question`),
  ADD KEY `question_and_exam_id_question_foreign` (`id_question`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scores_id_user_foreign` (`id_user`),
  ADD KEY `scores_id_exam_foreign` (`id_exam`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subjects_id_class_id_sd_id_user_unique` (`id_class`,`id_sd`,`id_user`),
  ADD UNIQUE KEY `subjects_id_class_id_sd_unique` (`id_class`,`id_sd`),
  ADD KEY `subjects_id_user_foreign` (`id_user`),
  ADD KEY `subjects_id_sd_foreign` (`id_sd`);

--
-- Indexes for table `subject_and_chapter_item`
--
ALTER TABLE `subject_and_chapter_item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subject_and_chapter_item_id_unique` (`id`);

--
-- Indexes for table `subject_define`
--
ALTER TABLE `subject_define`
  ADD PRIMARY KEY (`sd_id`),
  ADD UNIQUE KEY `subject_define_id_unique` (`sd_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `images` (`images`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD UNIQUE KEY `user_info_id_user_unique` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `matrixs`
--
ALTER TABLE `matrixs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `subject_and_chapter_item`
--
ALTER TABLE `subject_and_chapter_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `subject_define`
--
ALTER TABLE `subject_define`
  MODIFY `sd_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_id_subject_foreign` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exams_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`id_friend`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `friends_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `matrixs`
--
ALTER TABLE `matrixs`
  ADD CONSTRAINT `matrixs_id_chapter_foreign` FOREIGN KEY (`id_chapter`) REFERENCES `chapter` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matrixs_id_item_foreign` FOREIGN KEY (`id_item`) REFERENCES `subject_and_chapter_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matrixs_id_subject_foreign` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matrixs_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `questions_id_matrix_foreign` FOREIGN KEY (`id_matrix`) REFERENCES `matrixs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question_and_exam`
--
ALTER TABLE `question_and_exam`
  ADD CONSTRAINT `question_and_exam_id_exam_foreign` FOREIGN KEY (`id_exam`) REFERENCES `exams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_and_exam_id_question_foreign` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_id_exam_foreign` FOREIGN KEY (`id_exam`) REFERENCES `exams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `scores_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_id_class_foreign` FOREIGN KEY (`id_class`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subjects_id_sd_foreign` FOREIGN KEY (`id_sd`) REFERENCES `subject_define` (`sd_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `subjects_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
