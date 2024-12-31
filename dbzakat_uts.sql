-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2024 at 08:11 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbzakat_uts`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(2, 'zahrul', '$2y$10$bKqVCdh6i'),
(3, 'wulan', '$2y$10$irs/mxQUa');

-- --------------------------------------------------------

--
-- Table structure for table `amilzakat`
--

CREATE TABLE `amilzakat` (
  `id_amil` int(11) NOT NULL,
  `nama_amil` varchar(100) NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `amilzakat`
--

INSERT INTO `amilzakat` (`id_amil`, `nama_amil`, `no_hp`, `alamat`) VALUES
(2, 'sss', '07809790', 'asf'),
(4, 'sss', '07809790', 'asf'),
(5, 'sss', '07809790', 'asf'),
(6, 'sss', '07809790', 'asf');

-- --------------------------------------------------------

--
-- Table structure for table `mustahik`
--

CREATE TABLE `mustahik` (
  `id_mustahik` int(16) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nomor` varchar(16) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mustahik`
--

INSERT INTO `mustahik` (`id_mustahik`, `nama_lengkap`, `jenis_kelamin`, `alamat`, `nomor`, `kategori`) VALUES
(1, 'zahrul', 'Laki-laki', 'jambi', '895626456', 'muallaf'),
(2, 'luffy', 'Laki-laki', 'east blue', '2147483647', 'amil'),
(3, 'luffy', 'Laki-laki', 'east blue', '2147483647', 'amil'),
(8, 'zahrul', 'Laki-laki', 'jepang', '564654897', 'fakir'),
(14, 'zahrul', 'Laki-laki', 'asfsd', '0895555555', 'fakir'),
(15, 'zahrul', 'Laki-laki', 'jepang', '08946452465', 'fakir'),
(16, 'zahrul', 'Laki-laki', 'kumpe', '07809790', 'gharim');

-- --------------------------------------------------------

--
-- Table structure for table `muzakki`
--

CREATE TABLE `muzakki` (
  `id_muzakki` int(16) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nomor` varchar(16) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `muzakki`
--

INSERT INTO `muzakki` (`id_muzakki`, `nama_lengkap`, `jenis_kelamin`, `alamat`, `nomor`, `email`, `kategori`) VALUES
(29, 'luffy', 'Laki-Laki', 'east blue', '08946545', 'zahrul@gmail.com', 'Zakat Tabungan'),
(32, 'zahrul', 'Laki-laki', 'fontaine', '07809790', 'zahrul@gmail.com', 'Zakat Tabungan'),
(34, 'zahrul', 'Laki-laki', 'asfsd', '0895555555', 'zahrul@gmail.com', 'Zakat Tabungan'),
(37, 'ilhamgods', 'Perempuan', 'jepang', '089898989898', 'ilhamgods@gmail.com', 'Zakat Tabungan'),
(49, 'zahrul', 'Laki-Laki', 'asfdsaf', '45656', 'admin@admin.com', 'Zakat Emas'),
(53, 'penaldo', 'Laki-Laki', 'asfdsaf', '45656', 'admin@admin.com', 'Zakat Penghasilan'),
(55, 'contohemas', 'Laki-Laki', 'palembang', '056487546', 'admin@admin.com', 'Zakat Emas'),
(56, 'tes', 'Laki-Laki', 'asf', '123', 'admin@admin.com', 'Zakat Penghasilan'),
(57, 'luffy', 'Laki-Laki', 'safd', '123', 'admin@admin.com', 'Zakat Emas'),
(59, 'luffy', 'Perempuan', 'saf', '123', 'udin@gmail.com', 'Zakat Perdagangan'),
(60, 'luffy', 'Laki-Laki', 'saf', '747789787546', 'udin@gmail.com', 'Zakat Perdagangan'),
(61, 'cotohperdagangan', 'Laki-Laki', 'adasd', '8989', 'admin@admin.com', 'Zakat Perdagangan'),
(63, 'asdfas', 'Laki-Laki', 'asdf', '123654', 'chatgpt@kedivan.me', 'Zakat Perusahaan'),
(65, 'zahrul', 'Laki-Laki', 'dfgs', '0895555555', 'admin@admin.com', 'Zakat Penghasilan'),
(66, 'messi', 'Laki-Laki', 'saf', '8989', 'udin@gmail.com', 'Zakat Penghasilan'),
(67, 'tes', 'Laki-Laki', 'dfg', '8989', 'udin@gmail.com', 'Zakat Emas'),
(68, 'messi', 'Laki-laki', 'jepang', '3214', 'udin@gmail.com', 'Zakat Penghasilan'),
(69, 'Clorinde', 'Perempuan', 'sdf123', '0898432147', 'udin@gmail.com', 'Zakat Penghasilan'),
(70, 'Clorinde', 'Perempuan', 'sdf123', '0898432147', 'udin@gmail.com', 'Zakat Emas');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(16) NOT NULL,
  `nama_pembayar` varchar(100) NOT NULL,
  `kategori_zakat` varchar(100) NOT NULL,
  `tanggal_penyerahan` date NOT NULL,
  `total_pembayaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `nama_pembayar`, `kategori_zakat`, `tanggal_penyerahan`, `total_pembayaran`) VALUES
(1, 'penaldo', 'Zakat Penghasilan', '2024-12-26', '250.000'),
(2, 'contohemas', 'Zakat Emas', '2024-12-28', '2.250.000'),
(3, 'tes', 'Zakat Penghasilan', '2024-12-28', '250.000'),
(4, 'luffy', 'Zakat Emas', '2024-12-28', '2.250.000'),
(5, 'luffy', 'Zakat Perdagangan', '2024-12-19', '7.500.000'),
(6, 'asdfas', 'Zakat Perusahaan', '2024-12-20', '37.500.000'),
(7, 'zahrul', 'Zakat Penghasilan', '2024-12-31', '250.000'),
(8, 'zahrul', 'Zakat Penghasilan', '2024-12-31', '250.000'),
(9, 'zahrul', 'Zakat Penghasilan', '2024-12-31', '250.000'),
(10, 'zahrul', 'Zakat Penghasilan', '2024-12-31', '250.000'),
(11, 'zahrul', 'Zakat Penghasilan', '2024-12-29', '250.000'),
(12, 'zahrul', 'Zakat Penghasilan', '2024-12-25', '250.000'),
(13, 'messi', 'Zakat Penghasilan', '2024-12-21', '250.000'),
(14, 'Clorinde', 'Zakat Emas', '2024-12-25', '2.375.000');

-- --------------------------------------------------------

--
-- Table structure for table `tbadmin`
--

CREATE TABLE `tbadmin` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbadmin`
--

INSERT INTO `tbadmin` (`id`, `username`, `password`) VALUES
(1, 'zahrul', '$2y$10$Yg8Iy.8Z5'),
(2, 'messi', '$2y$10$WjS6jYadW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amilzakat`
--
ALTER TABLE `amilzakat`
  ADD PRIMARY KEY (`id_amil`);

--
-- Indexes for table `mustahik`
--
ALTER TABLE `mustahik`
  ADD PRIMARY KEY (`id_mustahik`);

--
-- Indexes for table `muzakki`
--
ALTER TABLE `muzakki`
  ADD PRIMARY KEY (`id_muzakki`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tbadmin`
--
ALTER TABLE `tbadmin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `amilzakat`
--
ALTER TABLE `amilzakat`
  MODIFY `id_amil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mustahik`
--
ALTER TABLE `mustahik`
  MODIFY `id_mustahik` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `muzakki`
--
ALTER TABLE `muzakki`
  MODIFY `id_muzakki` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbadmin`
--
ALTER TABLE `tbadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
