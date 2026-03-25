-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpMyAdmin.net/

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company_db`
--

-- --------------------------------------------------------

--
-- Tabel `users`
--
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'client',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Data: `users`
--
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@company.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', NULL, '2025-12-18 00:00:00', '2025-12-18 00:00:00');

-- --------------------------------------------------------

--
-- Tabel `company_profiles`
--
CREATE TABLE `company_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Data contoh: profil perusahaan
--
INSERT INTO `company_profiles` (`id`, `name`, `description`, `logo`, `address`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'PT Global Freight Network', 'Kami adalah jaringan logistik internasional yang menghubungkan forwarder di lebih dari 90 negara. Fokus pada keamanan, kecepatan, dan kolaborasi.', 'assets/images/logo.png', 'Jl. Sudirman No. 123, Jakarta', '+62 21 1234 5678', 'info@globalfreight.id', '2025-12-18 00:00:00', '2025-12-18 00:00:00');

-- --------------------------------------------------------

--
-- Tabel `employees`
--
CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Data contoh: karyawan
--
INSERT INTO `employees` (`id`, `name`, `position`, `photo`, `email`, `phone`, `bio`, `created_at`, `updated_at`) VALUES
(1, 'Andi Prasetyo', 'Logistics Manager', 'assets/images/employee1.jpg', 'andi@globalfreight.id', '+62 812 3456 7890', 'Pengalaman 10 tahun di bidang logistik internasional.', '2025-12-18 00:00:00', '2025-12-18 00:00:00'),
(2, 'Siti Rahayu', 'Customer Support Lead', 'assets/images/employee2.jpg', 'siti@globalfreight.id', '+62 813 4567 8901', 'Ahli dalam manajemen hubungan klien dan resolusi masalah.', '2025-12-18 00:00:00', '2025-12-18 00:00:00');

-- --------------------------------------------------------

--
-- Tabel `news`
--
CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `published_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Data contoh: berita
--
INSERT INTO `news` (`id`, `title`, `content`, `image`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'Ekspansi ke Eropa Tengah', 'Kami dengan bangga mengumumkan kemitraan baru dengan 15 forwarder di Polandia, Rumania, dan Hungaria untuk memperluas jaringan Eropa Tengah kami.', 'assets/images/news1.jpg', '2025-12-10', '2025-12-18 00:00:00', '2025-12-18 00:00:00'),
(2, 'Sistem Pelacakan Real-Time Diluncurkan', 'Mulai 2026, semua klien dapat melacak pengiriman mereka secara real-time melalui portal pelanggan yang baru.', 'assets/images/news2.jpg', '2025-12-05', '2025-12-18 00:00:00', '2025-12-18 00:00:00');

--
-- Indexes
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

ALTER TABLE `company_profiles`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Auto Increment
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `company_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;