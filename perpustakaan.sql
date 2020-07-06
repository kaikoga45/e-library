-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 06, 2020 at 04:46 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `alamat_tinggal` text NOT NULL,
  `nomor_kontak` varchar(20) NOT NULL,
  `bergabung_sejak` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `nama`, `alamat_tinggal`, `nomor_kontak`, `bergabung_sejak`) VALUES
(5, 'Nataliya Lavera', 'Jalan Bayusuta', '0826125121', '2020-07-02'),
(10, 'Rizky Fahmid', 'Jalan Durian', '098752416212', '2020-07-05'),
(12, 'Rowan Atkinston', 'Jalan London', '0987261721', '2020-07-05'),
(14, 'Irfanda', 'Jalan Durian', '0982612512', '2020-07-05'),
(15, 'Indra Ahmad', 'Jalan Teleng', '092162121', '2020-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `kategori` text NOT NULL,
  `pengarang` text NOT NULL,
  `halaman` int(11) NOT NULL,
  `penerbit` text NOT NULL,
  `tahun_terbit` date NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `status_buku` text NOT NULL,
  `waktu_ditambahkan` date NOT NULL,
  `input_oleh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `kategori`, `pengarang`, `halaman`, `penerbit`, `tahun_terbit`, `jumlah_buku`, `status_buku`, `waktu_ditambahkan`, `input_oleh`) VALUES
(13, 'Komunikasi Organisasi Versi 3', 'Psikologi', 'Mozilla', 21, 'Gramedia', '2020-07-04', 12, 'Tidak tersedia', '2020-07-05', 'Kai Koga'),
(14, 'Mind of Albert Einstein Vol.2', 'Gaya Hidup', 'Nikola Cage', 222, 'Gramedia', '2020-07-04', 12, 'Tersedia', '2020-07-05', 'Kai Koga'),
(22, 'Manfaat Reksadana Yang Terbaru', 'Pendidikan', 'Nadiem', 12, 'Gramedia', '2020-07-15', 9, 'Tersedia', '2020-07-05', 'Kai Koga'),
(23, 'The mind of Mark Zuckebery', 'Pendidikan', 'Elon Musk', 12, 'Gramedia', '2020-07-22', 10, 'Tersedia', '2020-07-05', 'Kai Koga'),
(24, 'National Geographic Earth edition', 'Pendidikan', 'NGC', 52, 'Gramedia', '2020-07-21', 1, 'Tersedia', '2020-07-05', 'Kai Koga');

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
(2, '2014_10_12_100000_create_password_resets_table', 1);

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
-- Table structure for table `peminjam`
--

CREATE TABLE `peminjam` (
  `id` int(11) NOT NULL,
  `anggota` text NOT NULL,
  `buku` text NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_dikembalikan` date DEFAULT NULL,
  `durasi_terlambat` int(11) DEFAULT NULL,
  `total_denda` int(11) DEFAULT NULL,
  `status` text NOT NULL,
  `terima_oleh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjam`
--

INSERT INTO `peminjam` (`id`, `anggota`, `buku`, `tanggal_peminjaman`, `tanggal_dikembalikan`, `durasi_terlambat`, `total_denda`, `status`, `terima_oleh`) VALUES
(29, 'Rizky Fahmid', 'Komunikasi Organisasi Versi 3', '2020-07-05', '2020-07-13', 1, 500, 'Telah Dikembalikan', 'Kai Koga'),
(33, 'Rowan Atkinston', 'Mind of Albert Einstein Vol.2', '2020-07-05', '2020-07-05', 0, 0, 'Telah Dikembalikan', 'Kai Koga'),
(36, 'Nataliya Lavera', 'The mind of Mark Zuckebery', '2020-07-05', '2020-07-05', 0, 0, 'Telah Dikembalikan', 'Kai Koga'),
(37, 'Indra Ahmad', 'National Geographic Earth edition', '2020-07-05', '2020-07-05', 0, 0, 'Telah Dikembalikan', 'Kai Koga'),
(38, 'Rowan Atkinston', 'National Geographic Earth edition', '2020-07-05', '2020-07-05', 0, 0, 'Telah Dikembalikan', 'Kai Koga'),
(40, 'Rizky Fahmid', 'Manfaat Reksadana Yang Terbaru', '2020-07-05', NULL, 0, 0, 'Belum Dikembalikan', '-');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kai Koga', 'kaikoga7', 'kai@undiksha.ac.id', NULL, '$2y$10$ghUrhH5VJH8ms0EZvE8QeeOTlx3R7n1et0PvOZi.p2mDmhUBPp9U2', 'QWNuHk025y26lccUX2pvQ45LgQJL6GjR2VvtUveYY00GSaObXy86LE1JCMd2', '2020-07-04 06:33:14', '2020-07-04 06:33:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
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
-- Indexes for table `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `peminjam`
--
ALTER TABLE `peminjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
