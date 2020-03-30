-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2020 at 02:40 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `pengirim` int(11) NOT NULL,
  `penerima` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL COMMENT '0 = belum dibaca, 1 = sudah dibaca'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `pengirim`, `penerima`, `pesan`, `waktu`, `status`) VALUES
(1, 12, 1, 'Halo Admin,', '2020-02-07 07:57:40', 0),
(2, 12, 1, 'Laundry saya sudah selesai?', '2020-02-07 07:57:40', 0),
(3, 1, 12, 'Belum boss', '2020-02-07 07:58:05', 0),
(4, 11, 1, 'Halo min,', '2020-02-07 08:00:00', 0),
(5, 11, 1, 'Laundry buka kapan?', '2020-02-07 08:00:00', 0),
(6, 1, 11, 'Mulai senin sudah buka', '2020-02-07 08:00:23', 0),
(7, 12, 1, 'oke', '2020-02-24 06:49:43', 0),
(11, 1, 12, 'baik kak', '2020-02-24 07:26:39', 0),
(13, 1, 12, 'test', '2020-03-02 07:56:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `laundry_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` char(13) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `is_member` tinyint(1) NOT NULL COMMENT '0 = non member, 1 = member',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_delete` tinyint(1) NOT NULL COMMENT '0 = No, 1 = Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `user_id`, `laundry_id`, `name`, `phone`, `address`, `gender`, `is_member`, `created_at`, `updated_at`, `is_delete`) VALUES
(6, 12, 1, 'Anto Wijaya', '0824234', 'Bandung', 'Laki-laki', 0, '2020-02-07 07:58:59', '2020-02-07 07:58:59', 0),
(7, 11, 1, 'Jaya atmajaya', '0249294', '', 'Laki-laki', 1, '2020-02-07 09:51:38', '2020-02-28 06:52:36', 0),
(10, 17, 2, 'Jaya Wijaya', '42253534', 'Bandung', 'Laki-laki', 1, '2020-03-04 03:02:25', '2020-03-04 03:44:07', 0),
(12, 18, 2, 'Test', '082312132', 'Bandung', 'Laki-laki', 1, '2020-03-29 14:19:07', '2020-03-29 14:19:07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_kuota`
--

CREATE TABLE `customer_kuota` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `paket_id` int(11) NOT NULL,
  `kuota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_kuota`
--

INSERT INTO `customer_kuota` (`id`, `customer_id`, `paket_id`, `kuota`) VALUES
(1, 7, 4, 102),
(2, 7, 4, 102),
(4, 7, 4, 102),
(5, 10, 4, 102);

-- --------------------------------------------------------

--
-- Table structure for table `laundry`
--

CREATE TABLE `laundry` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `address` varchar(100) NOT NULL,
  `owner_name` varchar(50) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `dokumen_siup` varchar(255) NOT NULL COMMENT 'surat izin usaha perdagangan',
  `dokumen_situ` varchar(255) NOT NULL COMMENT 'surat izin tempat usaha',
  `dokumen_imb` varchar(255) NOT NULL COMMENT 'izin mendirikan bangunan',
  `foto_ktp` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laundry`
--

INSERT INTO `laundry` (`id`, `user_id`, `name`, `phone`, `address`, `owner_name`, `no_ktp`, `dokumen_siup`, `dokumen_situ`, `dokumen_imb`, `foto_ktp`, `logo`) VALUES
(1, 1, 'Jaya Laundry', '08234111', 'Bandung', 'Wachid', '123424241', '', '', '', '', ''),
(2, 5, 'Seven Laundry', '3241231', 'Sukabirus Bandung', 'Seven Family', '3424131232432', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `laundry_layanan`
--

CREATE TABLE `laundry_layanan` (
  `id` int(11) NOT NULL,
  `laundry_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_delete` tinyint(1) NOT NULL COMMENT '0 = No, 1 = Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laundry_layanan`
--

INSERT INTO `laundry_layanan` (`id`, `laundry_id`, `name`, `price`, `created_at`, `updated_at`, `is_delete`) VALUES
(2, 1, 'Tas', 22000, '2020-01-06 07:36:15', '2020-01-06 07:36:25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `laundry_paket`
--

CREATE TABLE `laundry_paket` (
  `id` int(11) NOT NULL,
  `laundry_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laundry_paket`
--

INSERT INTO `laundry_paket` (`id`, `laundry_id`, `name`, `created_at`, `updated_at`) VALUES
(4, 1, 'Paket 1 tahun', '2020-02-27 09:06:02', '2020-02-27 09:34:38'),
(5, 1, 'Paket Reguler', '2020-02-27 09:08:36', '2020-02-27 09:44:14');

-- --------------------------------------------------------

--
-- Table structure for table `laundry_paket_member`
--

CREATE TABLE `laundry_paket_member` (
  `id` int(11) NOT NULL,
  `laundry_paket_id` int(11) NOT NULL,
  `kuota` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laundry_paket_member`
--

INSERT INTO `laundry_paket_member` (`id`, `laundry_paket_id`, `kuota`, `price`) VALUES
(2, 4, 102, 800000);

-- --------------------------------------------------------

--
-- Table structure for table `laundry_paket_non_member`
--

CREATE TABLE `laundry_paket_non_member` (
  `id` int(11) NOT NULL,
  `laundry_paket_id` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laundry_paket_non_member`
--

INSERT INTO `laundry_paket_non_member` (`id`, `laundry_paket_id`, `price`) VALUES
(1, 5, 6500);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `laundry_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `paket_id` int(11) DEFAULT NULL,
  `layanan_id` int(11) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `jml_bayar` int(11) NOT NULL,
  `is_bayar` tinyint(1) NOT NULL,
  `bar_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `laundry_id`, `customer_id`, `paket_id`, `layanan_id`, `tanggal_masuk`, `tanggal_selesai`, `berat`, `jml_bayar`, `is_bayar`, `bar_code`) VALUES
(12, 1, 6, 5, NULL, '2020-03-03', '2020-03-04', 2, 13000, 0, ''),
(13, 1, 7, 4, NULL, '2020-03-03', '2020-03-04', 0, 800000, 1, ''),
(15, 1, 6, 5, 2, '2020-03-03', '2020-03-04', 2, 35000, 1, ''),
(17, 1, 6, 5, 2, '2020-03-03', '2020-03-04', 2, 35000, 0, '2020-03-036.jpg'),
(18, 1, 10, 4, 2, '2020-03-04', '2020-03-05', NULL, 822000, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `kode`, `name`) VALUES
(1, 'ROLE_SUPERADMIN', 'Superadmin'),
(2, 'ROLE_ADMIN', 'Admin'),
(3, 'ROLE_CUSTOMER', 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `laundry_id` int(11) NOT NULL,
  `message` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_delete` tinyint(1) NOT NULL COMMENT '0 = No, 1 = Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id`, `customer_id`, `laundry_id`, `message`, `created_at`, `updated_at`, `is_delete`) VALUES
(5, 6, 1, 'Memuaskan', '2020-03-04 03:46:28', '2020-03-04 03:46:28', 0),
(8, 7, 2, 'Sangat Memuaskan', '2020-03-04 03:52:56', '2020-03-04 03:52:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `username` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `enabled` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `created_at`, `updated_at`, `username`, `password`, `email`, `enabled`) VALUES
(1, '2020-02-07 07:44:08', '2020-03-04 02:48:26', 'laundry', '21232f297a57a5a743894a0e4a801fc3', 'laundry@gmail.com', 1),
(5, '2020-01-06 08:23:00', '2020-02-07 07:44:08', '7laundry', '21232f297a57a5a743894a0e4a801fc3', '7laundry@gmail.com', 1),
(6, '2020-01-10 03:26:00', '2020-02-07 07:44:08', 'superadmin', '21232f297a57a5a743894a0e4a801fc3', 'superadmin@gmail.com', 1),
(11, '2020-02-07 07:45:56', '2020-02-07 07:46:20', 'jaya', '91ec1f9324753048c0096d036a694f86', 'customer@gmail.com', 1),
(12, '2020-02-07 07:45:56', '2020-02-07 07:46:44', 'anto', '91ec1f9324753048c0096d036a694f86', 'customer2@gmail.com', 1),
(17, '2020-03-03 21:02:25', '2020-03-04 03:02:25', 'test', '21232f297a57a5a743894a0e4a801fc3', 'test@gmail.com', 1),
(18, '2020-03-29 14:19:07', '2020-03-29 14:19:07', 'admin22', '21232f297a57a5a743894a0e4a801fc3', 'admin@example.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_id`, `role_id`) VALUES
(1, 2),
(5, 2),
(6, 1),
(11, 3),
(12, 3),
(17, 3),
(18, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengirim` (`pengirim`),
  ADD KEY `penerima` (`penerima`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laundry_id` (`laundry_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `customer_kuota`
--
ALTER TABLE `customer_kuota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `customer_kuota_ibfk_2` (`paket_id`);

--
-- Indexes for table `laundry`
--
ALTER TABLE `laundry`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `no_ktp` (`no_ktp`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `laundry_layanan`
--
ALTER TABLE `laundry_layanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laundry_id` (`laundry_id`);

--
-- Indexes for table `laundry_paket`
--
ALTER TABLE `laundry_paket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laundry_id` (`laundry_id`);

--
-- Indexes for table `laundry_paket_member`
--
ALTER TABLE `laundry_paket_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laundry_paket_member_ibfk_1` (`laundry_paket_id`);

--
-- Indexes for table `laundry_paket_non_member`
--
ALTER TABLE `laundry_paket_non_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laundry_paket_non_member_ibfk_1` (`laundry_paket_id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laundry_id` (`laundry_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `paket_id` (`paket_id`),
  ADD KEY `layanan_id` (`layanan_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `laundry_id` (`laundry_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`user_id`,`role_id`) USING BTREE,
  ADD KEY `user_id` (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer_kuota`
--
ALTER TABLE `customer_kuota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `laundry`
--
ALTER TABLE `laundry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `laundry_layanan`
--
ALTER TABLE `laundry_layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `laundry_paket`
--
ALTER TABLE `laundry_paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `laundry_paket_member`
--
ALTER TABLE `laundry_paket_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `laundry_paket_non_member`
--
ALTER TABLE `laundry_paket_non_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`pengirim`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`penerima`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`laundry_id`) REFERENCES `laundry` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_kuota`
--
ALTER TABLE `customer_kuota`
  ADD CONSTRAINT `customer_kuota_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_kuota_ibfk_2` FOREIGN KEY (`paket_id`) REFERENCES `laundry_paket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laundry`
--
ALTER TABLE `laundry`
  ADD CONSTRAINT `laundry_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laundry_layanan`
--
ALTER TABLE `laundry_layanan`
  ADD CONSTRAINT `laundry_layanan_ibfk_1` FOREIGN KEY (`laundry_id`) REFERENCES `laundry` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laundry_paket`
--
ALTER TABLE `laundry_paket`
  ADD CONSTRAINT `laundry_paket_ibfk_1` FOREIGN KEY (`laundry_id`) REFERENCES `laundry` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laundry_paket_member`
--
ALTER TABLE `laundry_paket_member`
  ADD CONSTRAINT `laundry_paket_member_ibfk_1` FOREIGN KEY (`laundry_paket_id`) REFERENCES `laundry_paket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laundry_paket_non_member`
--
ALTER TABLE `laundry_paket_non_member`
  ADD CONSTRAINT `laundry_paket_non_member_ibfk_1` FOREIGN KEY (`laundry_paket_id`) REFERENCES `laundry_paket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`laundry_id`) REFERENCES `laundry` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`paket_id`) REFERENCES `laundry_paket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_4` FOREIGN KEY (`layanan_id`) REFERENCES `laundry_layanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD CONSTRAINT `testimoni_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `testimoni_ibfk_2` FOREIGN KEY (`laundry_id`) REFERENCES `laundry` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_role_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
