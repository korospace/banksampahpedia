-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 19, 2023 at 08:36 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_banksampahpedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` varchar(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(300) NOT NULL,
  `thumbnail` varchar(50) NOT NULL,
  `content` longtext NOT NULL,
  `id_kategori` varchar(200) NOT NULL,
  `created_at` bigint(20) NOT NULL,
  `published_at` bigint(20) NOT NULL,
  `id_banksampah` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banksampah`
--

CREATE TABLE `banksampah` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `notelp` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `address` longtext NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banksampah`
--

INSERT INTO `banksampah` (`id`, `name`, `slug`, `email`, `notelp`, `description`, `address`, `logo`, `created_at`, `updated_at`) VALUES
(5, 'bank budi luhur', 'bank-budi-luhur', 'elkoro424@gmail.com', '112233445566', 'deskripsi', 'alamat', '652fec9296b6f.jpeg', 1697639570, NULL),
(7, 'bank sampah teratai', 'bank-sampah-teratai', 'bagaselkoro2@gmail.com', '223344556677', 'deskripsi', 'alamat', '652ff6b2dc985.jpeg', 1697642162, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dompet`
--

CREATE TABLE `dompet` (
  `id` int(11) NOT NULL,
  `id_user` varchar(200) DEFAULT NULL,
  `uang` decimal(11,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `dompet`
--

INSERT INTO `dompet` (`id`, `id_user`, `uang`) VALUES
(423, '0402001', '0.00'),
(424, '0201001', '7200.00');

-- --------------------------------------------------------

--
-- Table structure for table `jual_sampah`
--

CREATE TABLE `jual_sampah` (
  `no` int(11) NOT NULL,
  `id_transaksi` varchar(200) NOT NULL,
  `id_sampah` varchar(200) NOT NULL,
  `harga_pusat` int(11) NOT NULL DEFAULT 0,
  `harga` int(11) NOT NULL DEFAULT 0,
  `jumlah_kg` decimal(65,2) NOT NULL,
  `harga_nasabah` decimal(11,2) NOT NULL,
  `jumlah_rp` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_artikel`
--

CREATE TABLE `kategori_artikel` (
  `id` varchar(6) NOT NULL,
  `icon` text NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `kategori_utama` tinyint(1) NOT NULL,
  `created_at` bigint(20) NOT NULL,
  `id_banksampah` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kategori_artikel`
--

INSERT INTO `kategori_artikel` (`id`, `icon`, `name`, `description`, `kategori_utama`, `created_at`, `id_banksampah`) VALUES
('KA06', '65301cff4b45b.png', 'kat 1 xx', 'kat 1 xx', 1, 1697651967, 7),
('KA08', '65301d343c8ff.png', 'kat hoho', 'kat hoho', 1, 1697652020, 5),
('KA09', '65301d4290401.jpeg', 'kat yuhu', 'kat yuhu', 1, 1697652034, 5);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_sampah`
--

CREATE TABLE `kategori_sampah` (
  `id` varchar(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` bigint(20) NOT NULL,
  `id_banksampah` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kategori_sampah`
--

INSERT INTO `kategori_sampah` (`id`, `name`, `created_at`, `id_banksampah`) VALUES
('KS06', 'tes 1122', 1697647492, 5),
('KS07', 'kertas', 1697696565, 7),
('KS08', 'logam', 1697696567, 7),
('KS09', 'plastik', 1697696571, 7),
('KS10', 'lain-lain', 1697696575, 7);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(27, '2021-11-16-023013', 'App\\Database\\Migrations\\Users', 'default', 'App', 1656643580, 1),
(28, '2021-11-16-023841', 'App\\Database\\Migrations\\KategoriArtikel', 'default', 'App', 1656643580, 1),
(29, '2021-11-16-024046', 'App\\Database\\Migrations\\Artikel', 'default', 'App', 1656643580, 1),
(30, '2021-11-16-031046', 'App\\Database\\Migrations\\KategoriSampah', 'default', 'App', 1656643580, 1),
(31, '2021-11-16-031125', 'App\\Database\\Migrations\\Sampah', 'default', 'App', 1656643580, 1),
(32, '2021-11-16-031158', 'App\\Database\\Migrations\\Transaksi', 'default', 'App', 1656643580, 1),
(33, '2021-11-16-031238', 'App\\Database\\Migrations\\SetorSampah', 'default', 'App', 1656643580, 1),
(34, '2021-11-16-031308', 'App\\Database\\Migrations\\TarikSaldo', 'default', 'App', 1656643580, 1),
(35, '2021-11-16-031428', 'App\\Database\\Migrations\\JualSampah', 'default', 'App', 1656643580, 1),
(36, '2021-11-16-040233', 'App\\Database\\Migrations\\Wilayah', 'default', 'App', 1656643580, 1),
(37, '2021-11-23-225132', 'App\\Database\\Migrations\\Dompet', 'default', 'App', 1656643580, 1),
(38, '2022-04-08-054206', 'App\\Database\\Migrations\\Penghargaan', 'default', 'App', 1656643580, 1),
(39, '2022-04-08-115035', 'App\\Database\\Migrations\\Mitra', 'default', 'App', 1656643580, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `id` int(11) NOT NULL,
  `icon` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `id_banksampah` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`id`, `icon`, `name`, `description`, `id_banksampah`) VALUES
(8, '653074373d9d6.png', 'Bank Sampah Budi Luhur', 'Bank Sampah Budi Luhur', 7),
(9, '6530745213511.png', 'Universitas Budi Luhur', 'Universitas Budi Luhur', 7);

-- --------------------------------------------------------

--
-- Table structure for table `penghargaan`
--

CREATE TABLE `penghargaan` (
  `id` int(11) NOT NULL,
  `icon` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `id_banksampah` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `penghargaan`
--

INSERT INTO `penghargaan` (`id`, `icon`, `name`, `description`, `id_banksampah`) VALUES
(6, '653074ceca88d.jpeg', 'JUARA KETIGA LOMBA PENGELOLAAAN BANK SAMPAH TINGKAT KECAMATAN PINANG TAHUN', 'Kejuaraan mengikuti lomba Pengelolaan Bank Sampah dalam rangka HUT Kota Tangerang ke 29 tingkat Kecamatan Pinang pada bulan Februari 2022', 7),
(7, '653074eed9bde.jpeg', 'JUARA KEDUA BANK SAMPAH UTAMA KOTA TANGERANG TAHUN 2019', 'Kejuaraan mengikuti lomba bank sampah tingkat kota Tangerang pada tahun 2019', 7);

-- --------------------------------------------------------

--
-- Table structure for table `sampah`
--

CREATE TABLE `sampah` (
  `id` varchar(6) NOT NULL,
  `id_kategori` varchar(200) NOT NULL,
  `jenis` varchar(200) NOT NULL,
  `harga` int(11) NOT NULL,
  `harga_pusat` int(11) NOT NULL DEFAULT 0,
  `jumlah` decimal(65,2) NOT NULL DEFAULT 0.00,
  `id_banksampah` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sampah`
--

INSERT INTO `sampah` (`id`, `id_kategori`, `jenis`, `harga`, `harga_pusat`, `jumlah`, `id_banksampah`) VALUES
('S001', 'KS07', 'jenis a', 1800, 2000, '4.00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `setor_sampah`
--

CREATE TABLE `setor_sampah` (
  `no` int(11) NOT NULL,
  `id_transaksi` varchar(200) NOT NULL,
  `id_sampah` varchar(200) NOT NULL,
  `harga_pusat` int(11) NOT NULL DEFAULT 0,
  `harga` int(11) NOT NULL DEFAULT 0,
  `jumlah_kg` decimal(65,2) NOT NULL,
  `jumlah_rp` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `setor_sampah`
--

INSERT INTO `setor_sampah` (`no`, `id_transaksi`, `id_sampah`, `harga_pusat`, `harga`, `jumlah_kg`, `jumlah_rp`) VALUES
(5644, 'TSS178247056', 'S001', 2000, 1800, '4.00', '7200.00');

-- --------------------------------------------------------

--
-- Table structure for table `tarik_saldo`
--

CREATE TABLE `tarik_saldo` (
  `no` int(11) NOT NULL,
  `id_transaksi` varchar(200) NOT NULL,
  `jumlah_tarik` decimal(65,4) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `no` int(11) NOT NULL,
  `id` varchar(12) NOT NULL,
  `id_user` varchar(200) NOT NULL,
  `jenis_transaksi` varchar(50) NOT NULL,
  `date` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`no`, `id`, `id_user`, `jenis_transaksi`, `date`) VALUES
(1, 'TSS178247056', '0201001', 'penyetoran sampah', 1697696580);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(18) NOT NULL,
  `id_banksampah` bigint(20) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  `notelp` varchar(14) DEFAULT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `tgl_lahir` varchar(10) DEFAULT '00-00-0000',
  `kelamin` enum('laki-laki','perempuan') DEFAULT NULL,
  `token` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `last_active` bigint(19) DEFAULT 0,
  `otp` varchar(6) DEFAULT NULL,
  `is_verify` tinyint(1) NOT NULL DEFAULT 0,
  `privilege` varchar(10) NOT NULL,
  `created_at` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_banksampah`, `email`, `username`, `password`, `nama_lengkap`, `notelp`, `nik`, `alamat`, `tgl_lahir`, `kelamin`, `token`, `is_active`, `last_active`, `otp`, `is_verify`, `privilege`, `created_at`) VALUES
('0201001', 7, 'elkoro424@gmail.com', 'bagaskoro', 'f3p1bq8S3637g+gZ6Er82Q==', 'bagaskoro', '112233445577', '3674070310000002', 'serua ciputat', '18-10-2023', 'laki-laki', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjAyMDEwMDEiLCJ1bmlxdWVpZCI6IjY1MzA2MDI0YTg4OGQiLCJwYXNzd29yZCI6ImYzcDFicThTMzYzN2crZ1o2RXI4MlE9PSIsInByaXZpbGVnZSI6Im5hc2FiYWgiLCJleHBpcmVkIjoxNjk3NzU1NTU2fQ.mNUpnbRb1O1-VCjpviZ8mZcp1qmVqDvFyQdYQexyGTI', 1, 1697669156, NULL, 1, 'nasabah', 1697668183),
('0402001', 7, NULL, '0402001', 'c5hmhsex/K5rPievAOIuDQ==', 'nasabah1', NULL, NULL, NULL, '', 'perempuan', NULL, 1, 1697651302, '301066', 1, 'nasabah', 1697651302),
('A004', 7, 'bagaselkoro2@gmail.com', 'admintes1', 'ajAuZRLbwYtUhlWHwTyf1Q==', 'admin 1 bank sampah tes 2', '121213131414', NULL, 'alamat xx', '19-10-2023', 'laki-laki', NULL, 1, 1697696336, NULL, 1, 'superadmin', 1697642162);

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `id` int(11) NOT NULL,
  `id_user` varchar(200) NOT NULL,
  `kodepos` varchar(10) NOT NULL,
  `kelurahan` varchar(200) NOT NULL,
  `kecamatan` varchar(200) NOT NULL,
  `kota` varchar(200) NOT NULL,
  `provinsi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id`, `id_user`, `kodepos`, `kelurahan`, `kecamatan`, `kota`, `provinsi`) VALUES
(422, '0402001', '15414', 'sarua (serua)', 'ciputat', 'tangerang selatan', 'banten'),
(423, '0201001', '15414', 'sarua (serua)', 'ciputat', 'tangerang selatan', 'banten');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `artikel_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `banksampah`
--
ALTER TABLE `banksampah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dompet`
--
ALTER TABLE `dompet`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `jual_sampah`
--
ALTER TABLE `jual_sampah`
  ADD PRIMARY KEY (`no`),
  ADD KEY `jual_sampah_id_transaksi_foreign` (`id_transaksi`),
  ADD KEY `jual_sampah_id_sampah_foreign` (`id_sampah`);

--
-- Indexes for table `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `kategori_sampah`
--
ALTER TABLE `kategori_sampah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `penghargaan`
--
ALTER TABLE `penghargaan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `sampah`
--
ALTER TABLE `sampah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jenis` (`jenis`),
  ADD KEY `sampah_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `setor_sampah`
--
ALTER TABLE `setor_sampah`
  ADD PRIMARY KEY (`no`),
  ADD KEY `setor_sampah_id_transaksi_foreign` (`id_transaksi`),
  ADD KEY `setor_sampah_id_sampah_foreign` (`id_sampah`);

--
-- Indexes for table `tarik_saldo`
--
ALTER TABLE `tarik_saldo`
  ADD PRIMARY KEY (`no`),
  ADD KEY `tarik_saldo_id_transaksi_foreign` (`id_transaksi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_id_user_foreign` (`id_user`),
  ADD KEY `no` (`no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `notelp` (`notelp`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wilayah_id_user_foreign` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banksampah`
--
ALTER TABLE `banksampah`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dompet`
--
ALTER TABLE `dompet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=425;

--
-- AUTO_INCREMENT for table `jual_sampah`
--
ALTER TABLE `jual_sampah`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `penghargaan`
--
ALTER TABLE `penghargaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `setor_sampah`
--
ALTER TABLE `setor_sampah`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5645;

--
-- AUTO_INCREMENT for table `tarik_saldo`
--
ALTER TABLE `tarik_saldo`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=665;

--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=424;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_artikel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dompet`
--
ALTER TABLE `dompet`
  ADD CONSTRAINT `dompet_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jual_sampah`
--
ALTER TABLE `jual_sampah`
  ADD CONSTRAINT `jual_sampah_id_sampah_foreign` FOREIGN KEY (`id_sampah`) REFERENCES `sampah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jual_sampah_id_transaksi_foreign` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sampah`
--
ALTER TABLE `sampah`
  ADD CONSTRAINT `sampah_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_sampah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `setor_sampah`
--
ALTER TABLE `setor_sampah`
  ADD CONSTRAINT `setor_sampah_id_sampah_foreign` FOREIGN KEY (`id_sampah`) REFERENCES `sampah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `setor_sampah_id_transaksi_foreign` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tarik_saldo`
--
ALTER TABLE `tarik_saldo`
  ADD CONSTRAINT `tarik_saldo_id_transaksi_foreign` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD CONSTRAINT `wilayah_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
