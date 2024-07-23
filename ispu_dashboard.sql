-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2024 at 08:44 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ispu_dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(10, 'BAIK', '-', '2024-05-15 17:32:52', '2024-07-23 07:34:07'),
(11, 'SEDANG', '-', '2024-05-15 17:32:56', '2024-07-23 07:34:15'),
(13, 'TIDAK SEHAT', '-', '2024-07-23 07:33:57', '2024-07-23 07:36:03'),
(14, 'SANGAT TIDAK SEHAT', '-', '2024-07-23 07:34:30', '2024-07-23 07:34:30'),
(15, 'BERBAHAYA', '-', '2024-07-23 07:34:39', '2024-07-23 07:34:39');

-- --------------------------------------------------------

--
-- Table structure for table `category_actions`
--

CREATE TABLE `category_actions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_actions`
--

INSERT INTO `category_actions` (`id`, `category_id`, `name`, `created_at`, `updated_at`) VALUES
(7, 11, 'Mengurangi aktivitas di luar ruangan', '2024-05-29 18:24:12', '2024-05-29 18:24:12'),
(8, 11, 'Menutup jendela rumah untuk menghindari udara luar masuk', '2024-05-29 18:24:20', '2024-05-29 18:24:20'),
(9, 10, 'Dapat beraktivitas di luar ruangan seperti biasa', '2024-07-23 07:35:06', '2024-07-23 07:35:06'),
(10, 10, 'Membuka jendela rumah agar sirkulasi udara bagus', '2024-07-23 07:35:12', '2024-07-23 07:35:12'),
(14, 13, 'Mengurangi aktivitas di luar ruangan', '2024-07-23 07:37:09', '2024-07-23 07:37:09'),
(15, 13, 'Di sarankan memakai masker', '2024-07-23 07:37:19', '2024-07-23 07:37:19'),
(16, 13, 'Mengaktifkan air purifier di dalam ruangan', '2024-07-23 07:37:24', '2024-07-23 07:37:24'),
(17, 14, 'Tidak berada di luar ruangan', '2024-07-23 07:37:45', '2024-07-23 07:37:45'),
(18, 14, 'Memakai masker', '2024-07-23 07:37:50', '2024-07-23 07:37:50'),
(19, 14, 'Mengaktifkan air purifier di dalam ruangan', '2024-07-23 07:37:54', '2024-07-23 07:37:54'),
(20, 15, 'Tetap berada di dalam rumah', '2024-07-23 07:38:13', '2024-07-23 07:38:13'),
(21, 15, 'Wajib memakai masker', '2024-07-23 07:38:18', '2024-07-23 07:38:18'),
(22, 15, 'Air purifier harus di aktifkan', '2024-07-23 07:38:24', '2024-07-23 07:38:24');

-- --------------------------------------------------------

--
-- Table structure for table `dailies`
--

CREATE TABLE `dailies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `pm10` int(11) NOT NULL,
  `pm25` int(11) NOT NULL,
  `so2` int(11) NOT NULL,
  `co` int(11) NOT NULL,
  `o3` int(11) NOT NULL,
  `no2` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dailies`
--

INSERT INTO `dailies` (`id`, `location_id`, `category_id`, `date`, `time`, `pm10`, `pm25`, `so2`, `co`, `o3`, `no2`, `created_at`, `updated_at`) VALUES
(6, 9, 11, '07/24/2024', '00:10:00', 35, 44, 64, 35, 18, 20, '2024-07-23 07:47:30', '2024-07-23 10:00:13'),
(7, 9, 11, '07/25/2024', '01:10:00', 67, 74, 34, 24, 42, 31, '2024-07-23 07:48:49', '2024-07-23 09:58:47'),
(8, 9, 10, '07/23/2024', '00:00:00', 24, 35, 13, 16, 9, 12, '2024-07-23 10:00:39', '2024-07-23 10:00:39'),
(9, 9, 11, '07/22/2024', '00:02:00', 40, 93, 32, 41, 27, 12, '2024-07-23 10:02:23', '2024-07-23 10:02:23'),
(10, 9, 10, '07/21/2024', '00:02:00', 16, 24, 7, 8, 12, 9, '2024-07-23 10:02:50', '2024-07-23 10:02:50'),
(11, 9, 10, '07/20/2024', '00:02:00', 31, 36, 12, 5, 7, 5, '2024-07-23 10:03:16', '2024-07-23 10:03:16'),
(12, 9, 11, '07/19/2024', '00:04:00', 65, 58, 34, 37, 29, 31, '2024-07-23 10:04:38', '2024-07-23 10:04:38'),
(13, 9, 10, '07/18/2024', '00:04:00', 16, 24, 48, 33, 17, 26, '2024-07-23 10:05:20', '2024-07-23 10:05:20'),
(14, 9, 11, '07/17/2024', '00:05:00', 56, 34, 32, 35, 76, 34, '2024-07-23 10:05:50', '2024-07-23 10:05:50'),
(16, 10, 11, '07/25/2024', '00:08:00', 23, 62, 32, 12, 34, 12, '2024-07-23 10:08:38', '2024-07-23 10:08:38'),
(17, 10, 11, '07/24/2024', '00:08:00', 48, 43, 12, 42, 86, 93, '2024-07-23 10:09:19', '2024-07-23 10:09:19'),
(18, 10, 11, '07/23/2024', '00:09:00', 36, 23, 72, 12, 34, 12, '2024-07-23 10:09:36', '2024-07-23 10:09:36'),
(19, 10, 13, '07/22/2024', '00:11:00', 67, 126, 56, 34, 51, 25, '2024-07-23 10:11:34', '2024-07-23 10:11:34'),
(20, 10, 11, '07/21/2024', '00:14:00', 35, 24, 12, 51, 23, 15, '2024-07-23 10:12:15', '2024-07-23 10:12:15'),
(21, 10, 11, '07/20/2024', '00:12:00', 56, 45, 47, 54, 33, 23, '2024-07-23 10:12:38', '2024-07-23 10:12:38'),
(22, 10, 10, '07/19/2024', '00:12:00', 34, 23, 21, 26, 26, 12, '2024-07-23 10:13:20', '2024-07-23 10:13:20'),
(23, 10, 11, '07/18/2024', '00:13:00', 47, 44, 34, 73, 23, 31, '2024-07-23 10:13:37', '2024-07-23 10:13:37'),
(24, 10, 11, '07/17/2024', '00:17:00', 65, 54, 57, 23, 56, 34, '2024-07-23 10:13:56', '2024-07-23 10:13:56'),
(25, 11, 11, '07/25/2024', '00:15:00', 54, 34, 32, 13, 41, 24, '2024-07-23 10:14:54', '2024-07-23 10:14:54'),
(26, 11, 11, '07/24/2024', '00:16:00', 57, 34, 23, 12, 45, 32, '2024-07-23 10:17:05', '2024-07-23 10:17:05'),
(27, 11, 13, '07/23/2024', '00:17:00', 87, 104, 24, 65, 86, 35, '2024-07-23 10:17:37', '2024-07-23 10:17:37'),
(28, 11, 10, '07/22/2024', '00:17:00', 46, 32, 12, 31, 24, 12, '2024-07-23 10:17:53', '2024-07-23 10:17:53'),
(29, 11, 10, '07/21/2024', '00:18:00', 12, 31, 7, 5, 3, 6, '2024-07-23 10:18:15', '2024-07-23 10:18:15'),
(30, 11, 11, '07/20/2024', '00:18:00', 78, 64, 63, 25, 43, 32, '2024-07-23 10:18:34', '2024-07-23 10:18:34'),
(31, 11, 10, '07/19/2024', '00:18:00', 45, 23, 12, 31, 21, 15, '2024-07-23 10:19:06', '2024-07-23 10:19:06'),
(32, 11, 10, '07/18/2024', '00:19:00', 21, 12, 11, 7, 9, 6, '2024-07-23 10:19:25', '2024-07-23 10:19:25'),
(33, 11, 10, '07/17/2024', '00:19:00', 43, 21, 32, 12, 12, 11, '2024-07-23 10:19:45', '2024-07-23 10:19:45'),
(34, 12, 13, '07/25/2024', '00:20:00', 125, 67, 36, 32, 12, 53, '2024-07-23 10:21:08', '2024-07-23 10:21:08'),
(35, 12, 11, '07/24/2024', '00:24:00', 53, 23, 25, 12, 41, 12, '2024-07-23 10:24:53', '2024-07-23 10:24:53'),
(36, 12, 10, '07/23/2024', '00:25:00', 45, 24, 23, 12, 31, 12, '2024-07-23 10:25:08', '2024-07-23 10:25:08'),
(37, 12, 10, '07/22/2024', '00:25:00', 23, 21, 11, 5, 6, 9, '2024-07-23 10:25:42', '2024-07-23 10:25:42'),
(38, 12, 11, '07/21/2024', '00:26:00', 67, 86, 12, 51, 74, 21, '2024-07-23 10:26:26', '2024-07-23 10:26:26'),
(39, 12, 11, '07/20/2024', '00:26:00', 56, 34, 23, 15, 17, 11, '2024-07-23 10:26:46', '2024-07-23 10:26:46'),
(40, 12, 13, '07/19/2024', '00:26:00', 102, 124, 96, 64, 73, 36, '2024-07-23 10:27:14', '2024-07-23 10:27:14'),
(41, 12, 11, '07/18/2024', '00:27:00', 45, 63, 23, 41, 22, 51, '2024-07-23 10:27:34', '2024-07-23 10:27:34'),
(42, 12, 11, '07/17/2024', '00:27:00', 65, 36, 24, 16, 19, 24, '2024-07-23 10:27:51', '2024-07-23 10:27:51'),
(43, 13, 10, '07/25/2024', '00:32:00', 26, 42, 13, 31, 17, 7, '2024-07-23 10:32:50', '2024-07-23 10:32:50'),
(44, 13, 11, '07/24/2024', '00:32:00', 56, 45, 24, 13, 15, 11, '2024-07-23 10:33:08', '2024-07-23 10:33:08'),
(45, 13, 11, '07/23/2024', '00:33:00', 78, 56, 24, 12, 15, 24, '2024-07-23 10:33:31', '2024-07-23 10:33:31'),
(46, 13, 10, '07/22/2024', '00:33:00', 46, 23, 12, 31, 12, 33, '2024-07-23 10:34:01', '2024-07-23 10:34:01'),
(47, 13, 10, '07/21/2024', '00:34:00', 41, 23, 15, 23, 11, 15, '2024-07-23 10:34:19', '2024-07-23 10:34:19'),
(48, 13, 11, '07/20/2024', '00:34:00', 78, 58, 45, 24, 26, 12, '2024-07-23 10:34:37', '2024-07-23 10:34:37'),
(49, 13, 10, '07/19/2024', '00:36:00', 25, 15, 23, 12, 11, 7, '2024-07-23 10:34:56', '2024-07-23 10:34:56'),
(50, 13, 10, '07/18/2024', '00:35:00', 18, 24, 23, 22, 15, 17, '2024-07-23 10:35:15', '2024-07-23 10:35:15'),
(51, 13, 11, '07/17/2024', '00:35:00', 67, 45, 73, 23, 51, 24, '2024-07-23 10:35:31', '2024-07-23 10:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `lat`, `lng`, `created_at`, `updated_at`) VALUES
(9, 'DKI1 (Bunderan HI)', '-6.194490', '106.823069', '2024-07-23 07:40:46', '2024-07-23 07:40:46'),
(10, 'DKI2 (Kelapa Gading)', '-6.153030', '106.896785', '2024-07-23 07:41:41', '2024-07-23 07:41:41'),
(11, 'DKI3 (Jagakarsa)', '-6.333571', '106.821257', '2024-07-23 07:42:26', '2024-07-23 07:42:26'),
(12, 'DKI4 (Lubang Buaya)', '-6.293995', '106.904156', '2024-07-23 07:43:27', '2024-07-23 07:43:27'),
(13, 'DKI5 (Kebon Jeruk)', '-6.189077', '106.768717', '2024-07-23 07:44:04', '2024-07-23 07:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
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
(5, '2024_05_15_225718_create_categories_table', 2),
(6, '2024_05_15_230258_create_category_actions_table', 2),
(8, '2024_05_15_234954_create_locations_table', 3),
(10, '2024_05_16_001846_create_dailies_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'agentzebra', 'zebra@gmail.com', NULL, '$2y$10$1XV2cDbG63ct3lt8JPdLmu9yRntoceWMIC67Y7zR.eFmSTapdWGhC', NULL, '2024-05-15 09:30:59', '2024-05-15 09:30:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_actions`
--
ALTER TABLE `category_actions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dailies`
--
ALTER TABLE `dailies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
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
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `category_actions`
--
ALTER TABLE `category_actions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `dailies`
--
ALTER TABLE `dailies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
