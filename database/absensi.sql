-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2024 at 06:07 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kelas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_materi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_asisten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teaching_role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `start` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clas`
--

CREATE TABLE `clas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fakultas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kelas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `code`
--

CREATE TABLE `code` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user_get` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `code`
--

INSERT INTO `code` (`id`, `code`, `id_user`, `id_user_get`, `created_at`, `updated_at`) VALUES
(1, 'sCKaCsiL', '3', NULL, '2021-05-18 18:41:47', '2021-05-18 18:41:47'),
(2, 'WLzIcjnz', '3', NULL, '2021-05-18 18:48:34', '2021-05-18 18:48:34'),
(3, '8vK4Inw9', '3', NULL, '2021-05-18 18:50:29', '2021-05-18 18:50:29'),
(4, 'Glqh2O8d', '3', NULL, '2021-05-18 18:50:34', '2021-05-18 18:50:34'),
(5, 'dxDocHwr', '3', NULL, '2021-05-18 18:50:37', '2021-05-18 18:50:37'),
(6, 'MWlnQU7I', '3', NULL, '2021-05-18 18:50:42', '2021-05-18 18:50:42'),
(7, 'amhIleQk', '3', NULL, '2021-05-18 18:50:46', '2021-05-18 18:50:46'),
(8, 'TsDwIvQ9', '3', NULL, '2021-05-18 18:50:54', '2021-05-18 18:50:54'),
(9, 'Utq6pZyC', '3', NULL, '2021-05-18 18:50:58', '2021-05-18 18:50:58'),
(10, 'LEvLxQvd', '3', NULL, '2021-05-18 18:51:02', '2021-05-18 18:51:02'),
(11, 'hF1wpYMj', '3', NULL, '2021-05-18 18:51:05', '2021-05-18 18:51:05'),
(12, 'PyIyuzxC', '3', '6', '2021-05-18 19:12:01', '2021-05-19 08:09:59'),
(13, 'P5dWy2jE', '3', '6', '2021-05-18 19:12:07', '2021-05-19 07:55:39'),
(14, 'Az7uUre9', '3', '6', '2021-05-18 19:33:54', '2021-05-18 20:45:54'),
(15, 'xUttXebF', '3', '3', '2021-05-18 19:35:02', '2021-05-18 20:44:09'),
(16, '6ls8M27c', '4', NULL, '2021-05-18 21:14:29', '2021-05-18 21:14:29'),
(17, '45IY71hd', '4', '3', '2021-05-18 21:14:33', '2021-05-18 21:15:03'),
(18, 'YDB2lPdn', '4', '6', '2021-05-19 03:08:42', '2021-05-19 03:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `materi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2024_03_15_151502_create_class_table', 1),
(5, '2024_03_15_151528_create_material_table', 1),
(6, '2024_03_15_151548_create_code_table', 1),
(7, '2024_03_15_151607_create_attendance_table', 1),
(8, '2024_03_15_151502_create_clas_table', 2),
(9, '2024_03_15_151528_create_materials_table', 3),
(10, '2024_03_15_151607_create_attendances_table', 4);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_asisten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `join_date` date NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_asisten`, `name`, `join_date`, `role`, `photo`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, '120293333', 'rosalina', '2018-02-21', 'Admin', '2021-04-30_114235.jpg', 'admin@admin.com', NULL, '$2y$10$fij6LT8AMhRPyvop1SmHsu6GTv4WPxOpjEhs.2/MrHxSboXlc7njq', NULL, '2021-05-18 16:55:43', '2021-05-19 10:20:26'),
(4, '32145678', 'Staff 1', '2021-05-03', 'Staff', '20210430_114506.jpg', 'staff1@mail.com', NULL, '$2y$10$fij6LT8AMhRPyvop1SmHsu6GTv4WPxOpjEhs.2/MrHxSboXlc7njq', NULL, '2021-05-18 17:20:31', '2021-05-19 03:12:23'),
(5, '123625478', 'PJ 1', '2021-05-01', 'PJ', 'Screen Shot 2021-04-17 at 23.08.38.png', 'pj1@mail.com', NULL, '$2y$10$fij6LT8AMhRPyvop1SmHsu6GTv4WPxOpjEhs.2/MrHxSboXlc7njq', NULL, '2021-05-18 17:22:09', '2021-05-18 17:22:09'),
(6, '78965412', 'Asisten 1', '2021-05-05', 'Asisten', 'Screen Shot 2021-04-23 at 21.34.55.png', 'asisten1@mail.com', NULL, '$2y$10$fij6LT8AMhRPyvop1SmHsu6GTv4WPxOpjEhs.2/MrHxSboXlc7njq', NULL, '2021-05-18 17:22:49', '2021-05-19 10:19:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clas`
--
ALTER TABLE `clas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clas`
--
ALTER TABLE `clas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `code`
--
ALTER TABLE `code`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
