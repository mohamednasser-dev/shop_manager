-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2020 at 09:27 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chairs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manual_pass_resets`
--

CREATE TABLE `manual_pass_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manual_pass_resets`
--

INSERT INTO `manual_pass_resets` (`id`, `email`, `token`, `created_at`, `updated_at`) VALUES
(1, 'kareem@gmail.com', '9461', '2020-11-10 15:30:58', '2020-11-10 15:31:08');

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
(26, '2020_11_10_165129_create_manual_pass_resets_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`) VALUES
(1, 'amera@gmail.com', '$2y$10$4C4BkkW8CnL//at5sa2ch.DhX6v8zE7Mcqe5SnkXIyJJDigGg/Zci', '2020-11-10 10:28:38'),
(17, 'kareem@gmail.com', '$2y$10$Zzqv1nORjv9pjnip/H8Y9.ZENAHFOo6vMK8WwQy3X6S9JLMyHUQza', '2020-11-10 16:02:53'),
(26, 'user4@gmail.com', '$2y$10$cuygRl21x7kUV8OsC2KCvOoUQFwjzIuK0Va4WnKYxGC4MPuYXYyra', '2020-11-22 15:25:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` bigint(20) DEFAULT 0,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default_avatar.jpg',
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('admin','user','monitor','editor') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `gender`, `phone`, `points`, `email`, `email_verified_at`, `password`, `image`, `api_token`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, 'mal', '01201636129', 0, 'admin@admin.com', NULL, '$2y$10$MhZXXgZipzVXZn/wiH7lW.eR/aJb1PyjMBDqLwFdldeUMkofB6iBG', NULL, NULL, 'admin', NULL, NULL, NULL),
(4, 'monitor', NULL, NULL, NULL, 0, 'monitor@gmail.com', NULL, '$2y$10$MhZXXgZipzVXZn/wiH7lW.eR/aJb1PyjMBDqLwFdldeUMkofB6iBG', NULL, NULL, 'monitor', NULL, '2020-10-29 01:01:28', '2020-10-29 01:01:28'),
(5, 'kareem', NULL, NULL, NULL, 0, 'ahmed@gmail.com', NULL, '$2y$10$.qOdLRLM8zo40f9id.VoceQE8qwdgcWx4uGIKLc1w24CqSjk7neH.', NULL, NULL, 'monitor', NULL, '2020-11-04 22:40:12', '2020-11-04 22:40:12'),
(6, 'kareem', NULL, NULL, NULL, 0, 'kareem@gmail.com', NULL, '$2y$10$HdFY2D60.0TNH5pwaCye4ep2sl/oPH/uOEMAQ3w1lvR22vu9ETy.G', NULL, 'tjUMtoAwOJHZ7A7n42Bs2gxRyF5yqOZowMCDklgRhpQx2EPfXEX0AISLDjPH', 'user', NULL, '2020-11-05 05:23:49', '2020-11-10 15:47:31'),
(7, 'User', '005', 'femal', '01094641332', 15, 'user@gmail.com', NULL, '$2y$10$MhZXXgZipzVXZn/wiH7lW.eR/aJb1PyjMBDqLwFdldeUMkofB6iBG', 'img_1604917144.jpg', 'DZF3KMy08VDTTUelCbzAI4DTh1PdeLwWPp6NI8Lg6A80vwD8KUBf9PEqrj0O', 'user', NULL, '2020-11-05 05:25:17', '2020-12-03 07:28:42'),
(8, 'editor', NULL, NULL, NULL, 0, 'editor@editor.com', NULL, '$2y$10$Q7SGtpapWZxXrKM0QerKX.aEhoRVGqdVLFuPVdYUuQYyp7r1hlnP2', NULL, NULL, 'editor', NULL, '2020-11-07 23:21:01', '2020-11-07 23:21:01'),
(9, 'user1', NULL, NULL, NULL, 100, 'user1@gmail.com', NULL, '$2y$10$2J9vOpO9AUTRJYMwwKK74.EQ3MKRdcDZQuYNvgsP6ZtXy2GZKuP2m', 'default_avatar.jpg', 'Ec5tGsxPk1SVrawgXfXpVlz1UJKELBzMrnXotCdY75PEmaPDF6bmeRHoEiMl', 'user', NULL, '2020-11-11 11:27:30', '2020-11-11 11:27:30'),
(10, 'user2', NULL, NULL, NULL, 95, 'user2@gmail.com', NULL, '$2y$10$M0b0GFufjrgJ2kKolX.bCOKYw9tGP7s8IfiStXvoVeLXrsP1VAYK6', 'default_avatar.jpg', 'GrSDeXf9tHoPC4YUHdYA4JPZHAXqdSGKz8VMArTjnpSmjlr1gCUSbuJlXRSx', 'user', NULL, '2020-11-11 11:27:45', '2020-11-11 11:27:45'),
(11, 'user3', NULL, NULL, NULL, 90, 'user3@gmail.com', NULL, '$2y$10$ft33ArIWG47VblhVr06VXOSUCn/RLCvtrGKUFsA7q5tupRZcPQtoW', 'default_avatar.jpg', 'PSoNAU3kYn62E7SeD68L5FWVNUWAcHfKwrsOIORbLcLOl0ZT4yrNaIz6GoXR', 'user', NULL, '2020-11-11 11:27:54', '2020-11-11 11:27:54'),
(12, 'amera', '005', 'femal', '01201636125', 85, 'user4@gmail.com', NULL, '$2y$10$7.xrOPqPLuC.ktKeqPrHs.hxl6KKLZHtk4eCM2lUlJA35a2G2U9gO', 'default_avatar.jpg', 'ScRLeGTwBBtg9N09st2ZvSeqal5e9bAskAc2chofn93uXR3zqzyHTCwq5drd', 'user', NULL, '2020-11-11 11:28:04', '2020-11-17 10:13:31'),
(13, 'user5', NULL, NULL, NULL, 80, 'user5@gmail.com', NULL, '$2y$10$53pz8iNf2KUp/MNl/zXxQu2q0.hODUBqEBHJmf0BSQKjGI.NLzq8G', 'default_avatar.jpg', 'ld3uzXyZG8loQXTrN2GvTDTicNvrumMr7ZhfHObt3OtGdVXe0FPnX1Ex672H', 'user', NULL, '2020-11-11 11:28:14', '2020-11-11 11:28:14'),
(14, 'user6', NULL, NULL, NULL, 75, 'user6@gmail.com', NULL, '$2y$10$8WLQtbZLV6h7/Z2sePEQZOLmMQs/YjYWIrSdUscUlLzesbDSD4peO', 'default_avatar.jpg', 'IUICawTJNebgmJxMHuYvAufnm6JQAmF1CRy0ZaC9TlmZH9Jr91oCxQ0axWHz', 'user', NULL, '2020-11-11 11:28:27', '2020-12-03 07:30:01'),
(15, 'user7', NULL, NULL, NULL, 70, 'user7@gmail.com', NULL, '$2y$10$leRnjpVFUMs9fPnE.LkGV./IgWbk1ChOyd0wSG46WFQzmXFJpI8xu', 'default_avatar.jpg', 'kdFQyAN0j1XKQ1t85M7YNV1FatBgEvoz1sQaQJWhPnuVmnE5wSOakskN40nZ', 'user', NULL, '2020-11-11 11:28:35', '2020-11-19 13:18:33'),
(16, 'user8', NULL, NULL, NULL, 65, 'user8@gmail.com', NULL, '$2y$10$05QkFtAuvIsEywZ6AkgE/e.76gB5osxPJgmpXkJP6ChaD2wK4udCm', 'default_avatar.jpg', 'Fl2mvMKLnf6yzvbQXoe8JL5EXLQgkUmLjayVF0Gx1HNBQysYwcoRSek14S7o', 'user', NULL, '2020-11-11 11:28:43', '2020-12-07 09:13:02'),
(17, 'user9', NULL, NULL, NULL, 60, 'user9@gmail.com', NULL, '$2y$10$USv1H1NiUtDD7LnRAdqsbeXvcXbJO56japDF/.SAakMWjr2wV460K', 'default_avatar.jpg', 'vD4E5uaXbWCNkFUpKkBlxHtvrx5qihXIVOFS5oPwDjrBGolltfsQBRNTzGd4', 'user', NULL, '2020-11-11 11:28:53', '2020-11-11 11:28:53'),
(18, 'user10', NULL, NULL, NULL, 55, 'user10@gmail.com', NULL, '$2y$10$Hhf3BPr6z1NN0xX/LMGLz.AomKfoH5Xlhm4bXqoiOsX9t5zNLra5y', 'default_avatar.jpg', 'yF2p824Y8mFPNuWIIx2BUCSLJ9isbLMByNzbObjk8SRGAJ6rqSxpbkROHnTD', 'user', NULL, '2020-11-11 11:29:07', '2020-11-11 11:29:07'),
(19, 'user11', NULL, NULL, NULL, 50, 'user11@gmail.com', NULL, '$2y$10$BEEfAkinX69zLOPozhqQyOYCm0C4Gb.hRdanxKPxPvqwFuaX7ht2u', 'default_avatar.jpg', 'OrdEjFWvF0gwLBHapgZyWNoUcrCKooQZfs9CZja7iSoN2oH9NJpWATjd1E9b', 'user', NULL, '2020-11-11 11:29:15', '2020-11-11 11:29:15'),
(20, 'amera', '005', 'femal', '01094641442', 45, 'amera@gmail.com', NULL, '$2y$10$LhaYZ6IMwXl7frdPlb2mE.MohDjsWbLGmHx.6Y02IthFaidbdPzzO', 'default_avatar.jpg', 'xNutkSzo1TJDr4TbBpVthhKFm13BDP0vsgOPUi1hKLbg7z324dd2cFwQ6aRB', 'user', NULL, '2020-11-11 11:29:25', '2020-11-11 12:24:51'),
(21, 'user13', NULL, NULL, NULL, 0, 'user13@gmail.com', NULL, '$2y$10$lb8P9l.RI6b/vP1RfMDcTeqmRRMx.lV9BzikrhXqT1K.IFng1gd3e', 'default_avatar.jpg', NULL, 'user', NULL, '2020-11-11 14:20:52', '2020-11-11 14:20:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manual_pass_resets`
--
ALTER TABLE `manual_pass_resets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manual_pass_resets`
--
ALTER TABLE `manual_pass_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
