-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2021 at 11:13 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pembukuan`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `agenda` text NOT NULL,
  `tanggal` date DEFAULT NULL,
  `expired` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id`, `agenda`, `tanggal`, `expired`, `created_at`, `updated_at`) VALUES
(7, 'qwerty', '2020-12-02', '2020-12-17', '2020-12-09 18:55:51', '2020-12-09 18:55:51'),
(8, 'pertemuan setelah pencoblosan pilkades', '2020-12-20', '2020-12-21', '2020-12-10 20:34:38', '2020-12-10 20:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `img`
--

CREATE TABLE `img` (
  `id` int(11) NOT NULL,
  `img` varchar(120) NOT NULL,
  `judul` varchar(120) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `img`
--

INSERT INTO `img` (`id`, `img`, `judul`, `tanggal`, `created_at`, `updated_at`) VALUES
(13, '1607354006_7a15a4e6bfb718a3c2b4.jpg', 'Pemenang masker terbaik', '2020-11-22', '2020-12-07 22:13:26', '2020-12-07 22:13:26'),
(14, '1607354052_b90394c8ba327010c4fb.jpg', 'Membuat masker lukis', '2020-11-22', '2020-12-07 22:14:12', '2020-12-07 22:14:12'),
(15, '1607354083_d56ab8a0c63f4e224ecd.jpg', 'Dosen dari UMSIDA ikut melukis', '2020-11-22', '2020-12-07 22:14:43', '2020-12-07 22:14:43'),
(17, '1607354151_95166cf600581e562099.jpeg', 'salah satu masker lukis terbaik', '2020-11-22', '2020-12-07 22:15:51', '2020-12-07 22:15:51'),
(18, '1607354187_096bf909234258891cb3.jpeg', 'Contoh masker lukis ', '2020-11-22', '2020-12-07 22:16:27', '2020-12-07 22:16:27'),
(19, '1607354212_68ab5e19cbea799d545e.jpg', 'UMKM Tanjung Jaya', '2020-11-22', '2020-12-07 22:16:52', '2020-12-07 22:16:52'),
(20, '1607354248_e86eef2174f48fa80829.jpg', 'Ketua dari kelompok Abdimas dan UMKM Tanjung ', '2020-11-22', '2020-12-07 22:17:28', '2020-12-07 22:17:28');

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

CREATE TABLE `kas` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL,
  `pemasukan` double DEFAULT NULL,
  `pengeluaran` double DEFAULT NULL,
  `saldo` double DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kas`
--

INSERT INTO `kas` (`id`, `tanggal`, `keterangan`, `pemasukan`, `pengeluaran`, `saldo`, `created_at`, `updated_at`) VALUES
(17, '2020-12-10', 'arisan kas', 500000, NULL, 500000, '2020-12-10 20:31:29', '2020-12-10 20:31:29'),
(18, '2020-12-12', 'beli aqua kardus', NULL, 30000, 470000, '2020-12-10 20:32:50', '2020-12-10 20:32:50');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `role` int(11) NOT NULL,
  `nomor` varchar(120) NOT NULL,
  `blok` varchar(120) NOT NULL,
  `img` varchar(120) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `role`, `nomor`, `blok`, `img`, `created_at`, `updated_at`) VALUES
(7, 'SASMITO BAGUS SUMADYO', 'mamat10', '$2y$10$CyIbXW82BR19/KjICz9EgejX5u5TTdNv.kj2iveXJUQmQ4Zc/W47G', 3, '087851368915', 'N2/28', '1607347621_ae48d7b39a8aabb8b359.jpg', '2020-12-04 08:01:18', '2020-12-18 21:17:50'),
(20, 'tess', 'tess12', '123', 1, '', '', NULL, NULL, NULL),
(21, 'ads', 'tess123', '$2y$10$ltJ9beafTDE21EP5jGhOh.dmkOj608duZbzRKPizKDlro3ioiAYRm', 0, '123123123123', '1233', NULL, '2020-12-18 21:06:21', '2020-12-18 21:06:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `img`
--
ALTER TABLE `img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kas`
--
ALTER TABLE `kas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
