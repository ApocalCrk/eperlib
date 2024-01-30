-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 21, 2023 at 02:28 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eperlib`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `email`, `no_hp`, `guard`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '$2y$10$RIBt7xOHpq0oJor.1qiE3.ObbCa6CjZmOU6InmCk.pV/juoowXzOm', 'admin@admin.com', '081234567890', 'admin', '2023-12-21 02:28:21', '2023-12-21 02:28:21');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npm` bigint UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `id` bigint UNSIGNED NOT NULL,
  `npm` bigint UNSIGNED NOT NULL,
  `isbn` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `isbn` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_terbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_halaman` int NOT NULL,
  `jumlah_buku` int NOT NULL,
  `tentang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`isbn`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `jumlah_halaman`, `jumlah_buku`, `tentang`, `cover`, `kategori`, `rak`, `created_at`, `updated_at`) VALUES
(9783161484100, 'Machine Learning', 'Ferdy', 'Gramedia', '2021-01-01', 100, 10, '<p>Machine learning adalah salah satu cabang ilmu kecerdasan buatan yang mempelajari bagaimana membuat komputer belajar dari data. Belajar dari data berarti memberikan komputer kemampuan untuk memecahkan masalah dengan cara mengumpulkan dan menganalisis data, lalu menemukan pola yang tersembunyi di dalamnya. Setelah menemukan pola, komputer dapat membuat keputusan atau prediksi berdasarkan data yang telah dianalisis. Machine learning adalah salah satu cabang ilmu kecerdasan buatan yang mempelajari bagaimana membuat komputer belajar dari data. Belajar dari data berarti memberikan komputer kemampuan untuk memecahkan masalah dengan cara mengumpulkan dan menganalisis data, lalu menemukan pola yang tersembunyi di dalamnya. Setelah menemukan pola, komputer dapat membuat keputusan atau prediksi berdasarkan data yang telah dianalisis.</p>', 'book/machine-learning.jpg', 'Komputer', 'A', '2023-12-21 02:28:28', '2023-12-21 02:28:28');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `like_books`
--

CREATE TABLE `like_books` (
  `id` bigint UNSIGNED NOT NULL,
  `npm` bigint UNSIGNED NOT NULL,
  `isbn` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `npm` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fakultas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_studi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar/avatar.png',
  `verifikasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum verifikasi',
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`npm`, `nama`, `password`, `email`, `fakultas`, `program_studi`, `avatar`, `verifikasi`, `token`, `created_at`, `updated_at`) VALUES
(210711480, 'Ferdy', '$2y$10$DLoYAb8LgO.uVXe7Y9t3cOnx9Uu5a0urffKuI.gkKDWKzyJsWjxDa', 'ferdy@gmail.com', 'FTI', 'Informatika', 'avatar/avatar.png', 'sudah verifikasi', 'j1TOITNk8lmAL8VDKgkb7Zca8GNYtEO4Q1N70FIm', '2023-12-21 02:28:21', '2023-12-21 02:28:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_08_19_000000_create_failed_jobs_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_10_09_065930_create_buku_table', 1),
(4, '2023_10_09_070225_create_member_table', 1),
(5, '2023_10_09_070238_create_transaksi_peminjaman_table', 1),
(6, '2023_10_09_070717_create_admin_table', 1),
(7, '2023_10_09_071329_create_transaksi_pengembalian_table', 1),
(8, '2023_10_09_072654_create_notifications_table', 1),
(9, '2023_10_12_032513_create_bookmarks_table', 1),
(10, '2023_10_12_032753_create_like_books_table', 1),
(11, '2023_10_17_022229_create_ruangan_table', 1),
(12, '2023_10_17_055743_create_booking_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id_notification` bigint UNSIGNED NOT NULL,
  `npm` bigint UNSIGNED NOT NULL,
  `id_transaksi_peminjaman` bigint UNSIGNED NOT NULL,
  `tanggal_notifikasi` date NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('belum dibaca','sudah dibaca') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum dibaca',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `kode_ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`kode_ruangan`, `nama_ruangan`, `created_at`, `updated_at`) VALUES
('K01', 'Discussion Room 1', '2023-12-21 02:28:30', '2023-12-21 02:28:30');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_peminjaman`
--

CREATE TABLE `transaksi_peminjaman` (
  `id_transaksi_peminjaman` bigint UNSIGNED NOT NULL,
  `isbn` bigint UNSIGNED NOT NULL,
  `npm` bigint UNSIGNED NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status` enum('pinjam','kembali') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pinjam',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pengembalian`
--

CREATE TABLE `transaksi_pengembalian` (
  `id_pengembalian` bigint UNSIGNED NOT NULL,
  `id_transaksi_peminjaman` bigint UNSIGNED NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `denda` int NOT NULL,
  `status_pembayaran` enum('tidak ada denda','belum dibayar','sudah dibayar') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'tidak ada denda',
  `bukti_pengembalian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('diproses','diterima','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'diproses',
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `admin_username_unique` (`username`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_kode_ruangan_foreign` (`kode_ruangan`),
  ADD KEY `booking_npm_index` (`npm`);

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookmarks_npm_index` (`npm`),
  ADD KEY `bookmarks_isbn_index` (`isbn`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`isbn`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `like_books`
--
ALTER TABLE `like_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `like_books_npm_index` (`npm`),
  ADD KEY `like_books_isbn_index` (`isbn`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id_notification`),
  ADD KEY `notifications_npm_index` (`npm`),
  ADD KEY `notifications_id_transaksi_peminjaman_index` (`id_transaksi_peminjaman`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`kode_ruangan`);

--
-- Indexes for table `transaksi_peminjaman`
--
ALTER TABLE `transaksi_peminjaman`
  ADD PRIMARY KEY (`id_transaksi_peminjaman`),
  ADD KEY `transaksi_peminjaman_isbn_index` (`isbn`),
  ADD KEY `transaksi_peminjaman_npm_index` (`npm`);

--
-- Indexes for table `transaksi_pengembalian`
--
ALTER TABLE `transaksi_pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD KEY `transaksi_pengembalian_id_transaksi_peminjaman_index` (`id_transaksi_peminjaman`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `isbn` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9783161484101;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `like_books`
--
ALTER TABLE `like_books`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `npm` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210711481;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id_notification` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi_peminjaman`
--
ALTER TABLE `transaksi_peminjaman`
  MODIFY `id_transaksi_peminjaman` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi_pengembalian`
--
ALTER TABLE `transaksi_pengembalian`
  MODIFY `id_pengembalian` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_kode_ruangan_foreign` FOREIGN KEY (`kode_ruangan`) REFERENCES `ruangan` (`kode_ruangan`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_npm_foreign` FOREIGN KEY (`npm`) REFERENCES `member` (`npm`) ON DELETE CASCADE;

--
-- Constraints for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD CONSTRAINT `bookmarks_isbn_foreign` FOREIGN KEY (`isbn`) REFERENCES `buku` (`isbn`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookmarks_npm_foreign` FOREIGN KEY (`npm`) REFERENCES `member` (`npm`) ON DELETE CASCADE;

--
-- Constraints for table `like_books`
--
ALTER TABLE `like_books`
  ADD CONSTRAINT `like_books_isbn_foreign` FOREIGN KEY (`isbn`) REFERENCES `buku` (`isbn`),
  ADD CONSTRAINT `like_books_npm_foreign` FOREIGN KEY (`npm`) REFERENCES `member` (`npm`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_id_transaksi_peminjaman_foreign` FOREIGN KEY (`id_transaksi_peminjaman`) REFERENCES `transaksi_peminjaman` (`id_transaksi_peminjaman`),
  ADD CONSTRAINT `notifications_npm_foreign` FOREIGN KEY (`npm`) REFERENCES `member` (`npm`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi_peminjaman`
--
ALTER TABLE `transaksi_peminjaman`
  ADD CONSTRAINT `transaksi_peminjaman_isbn_foreign` FOREIGN KEY (`isbn`) REFERENCES `buku` (`isbn`),
  ADD CONSTRAINT `transaksi_peminjaman_npm_foreign` FOREIGN KEY (`npm`) REFERENCES `member` (`npm`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi_pengembalian`
--
ALTER TABLE `transaksi_pengembalian`
  ADD CONSTRAINT `transaksi_pengembalian_id_transaksi_peminjaman_foreign` FOREIGN KEY (`id_transaksi_peminjaman`) REFERENCES `transaksi_peminjaman` (`id_transaksi_peminjaman`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
