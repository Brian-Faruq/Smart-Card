-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2026 at 05:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_smart_card`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_10_14_070137_create_santris_table', 1),
(5, '2026_10_14_073458_create_peminjaman_devices_table', 1),
(6, '2026_10_14_073505_create_transaksi_simarts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_devices`
--

CREATE TABLE `peminjaman_devices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `santri_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('dipinjam','dikembalikan') NOT NULL,
  `waktu_ambil` timestamp NULL DEFAULT NULL,
  `waktu_kembali` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjaman_devices`
--

INSERT INTO `peminjaman_devices` (`id`, `santri_id`, `status`, `waktu_ambil`, `waktu_kembali`, `created_at`, `updated_at`) VALUES
(3, 2, 'dikembalikan', '2026-10-18 00:27:53', '2026-10-18 00:32:55', '2026-10-18 00:27:53', '2026-10-18 00:32:55'),
(4, 1, 'dikembalikan', '2026-10-23 20:08:40', '2026-10-23 20:08:48', '2026-10-23 20:08:40', '2026-10-23 20:08:48'),
(5, 1, 'dikembalikan', '2026-10-23 20:35:52', '2026-10-23 20:36:05', '2026-10-23 20:35:52', '2026-10-23 20:36:05');

-- --------------------------------------------------------

--
-- Table structure for table `santris`
--

CREATE TABLE `santris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `rfid_uid` varchar(255) NOT NULL,
  `barcode_code` varchar(255) NOT NULL,
  `saldo` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `santris`
--

INSERT INTO `santris` (`id`, `nis`, `nama`, `kelas`, `rfid_uid`, `barcode_code`, `saldo`, `created_at`, `updated_at`) VALUES
(1, '2026001', 'Ahmad Fikri', '10 MIPA 1', '123', '123', 500000.00, '2026-10-17 23:56:44', '2026-10-18 00:16:03'),
(2, '2026002', 'Siti Aminah', '11 IPS 2', '321', '321', 1000000.00, '2026-10-17 23:56:44', '2026-10-18 00:19:50');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('hZHnwHqUhmuD0b3hy4myRwGxOsBsRAcl1OTCNapH', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiI0SFE3dElZbUt6WVlIV2w5eEJ5Uk1DV0tMYWVCVXBOWEc4aWpwdG9iIiwiZXJyb3IiOiJTaWxha2FuIGxvZ2luIHRlcmxlYmloIGRhaHVsdSEiLCJfZmxhc2giOnsibmV3IjpbXSwib2xkIjpbImVycm9yIl19LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL3RyYW5zYWtzaVwvZGV2aWNlXC9oaXN0b3J5Iiwicm91dGUiOiJ0cmFuc2Frc2kuZGV2aWNlLmhpc3RvcnkifX0=', 1792811249),
('sCDFYusdQWMKiLxI6WPfzXzdOOJ4itZC4gWYrXQy', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJ6TjdxUUltc0d1dmFoMnRwREJGcVJoMzVyRTE1ZmxuSTc5MWxJTnNEIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC90cmFuc2Frc2lcL2RldmljZVwvcmVnaXN0ZXIiLCJyb3V0ZSI6InRyYW5zYWtzaS5kZXZpY2UucmVnaXN0ZXIifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJhdXRoX21vZGUiOiJkZXZpY2UifQ==', 1792812972),
('ztuT15cqboIUQPizIVxMqLPCGzTOhyHrg2KiBfQR', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiI0TlZmdDhiM0czQUlvYmxqYXJEMGpWamRxanNNdWNLNXpzR3Q2bUdBIiwiZXJyb3IiOiJTaWxha2FuIGxvZ2luIHRlcmxlYmloIGRhaHVsdSEiLCJfZmxhc2giOnsibmV3IjpbXSwib2xkIjpbImVycm9yIl19LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL3RyYW5zYWtzaVwvZGV2aWNlXC9oaXN0b3J5Iiwicm91dGUiOiJ0cmFuc2Frc2kuZGV2aWNlLmhpc3RvcnkifX0=', 1792811246);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_simarts`
--

CREATE TABLE `transaksi_simarts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `santri_id` bigint(20) UNSIGNED NOT NULL,
  `total_belanja` decimal(10,2) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_simarts`
--

INSERT INTO `transaksi_simarts` (`id`, `santri_id`, `total_belanja`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 2, 10000.00, 'Belanja di Kantin SIMART', '2026-10-18 00:13:34', '2026-10-18 00:13:34'),
(2, 2, 10000.00, 'Belanja di Kantin SIMART', '2026-10-18 00:14:03', '2026-10-18 00:14:03'),
(3, 2, 10000.00, 'Belanja di Kantin SIMART', '2026-10-18 00:14:38', '2026-10-18 00:14:38'),
(4, 1, 50000.00, 'Belanja di Kantin SIMART', '2026-10-18 00:16:03', '2026-10-18 00:16:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2026-10-17 23:56:43', '$2y$12$8rEDPglO.7th2.Veq0Rpie7cQA1HiHkmhgEPs01nSFrwXDVco5ddO', 'Ywt3n1IDYZ', '2026-10-17 23:56:44', '2026-10-17 23:56:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `peminjaman_devices`
--
ALTER TABLE `peminjaman_devices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjaman_devices_santri_id_foreign` (`santri_id`);

--
-- Indexes for table `santris`
--
ALTER TABLE `santris`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `santris_nis_unique` (`nis`),
  ADD UNIQUE KEY `santris_rfid_uid_unique` (`rfid_uid`),
  ADD UNIQUE KEY `santris_barcode_code_unique` (`barcode_code`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transaksi_simarts`
--
ALTER TABLE `transaksi_simarts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_simarts_santri_id_foreign` (`santri_id`);

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
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `peminjaman_devices`
--
ALTER TABLE `peminjaman_devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `santris`
--
ALTER TABLE `santris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi_simarts`
--
ALTER TABLE `transaksi_simarts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman_devices`
--
ALTER TABLE `peminjaman_devices`
  ADD CONSTRAINT `peminjaman_devices_santri_id_foreign` FOREIGN KEY (`santri_id`) REFERENCES `santris` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi_simarts`
--
ALTER TABLE `transaksi_simarts`
  ADD CONSTRAINT `transaksi_simarts_santri_id_foreign` FOREIGN KEY (`santri_id`) REFERENCES `santris` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
