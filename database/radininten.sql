-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2020 at 06:18 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `radininten`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `nomor_dokumen` varchar(10) NOT NULL,
  `nama_dokumen` varchar(30) NOT NULL,
  `tanggal_dokumen` date DEFAULT NULL,
  `file_dokumen` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `unit` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('kepala bandara','pegawai kampen','kepala staff','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama`, `jabatan`, `unit`, `password`, `role`) VALUES
('180207000', 'Moh. Yamin', 'kepala staff', 'kampen', 'yamin', 'kepala staff'),
('1802071105990003', 'arjuna', 'kepala bandara', 'kepala ', 'arjuna', 'kepala bandara'),
('1802071310980002', 'vivi', 'staff', 'kampen', 'vivi', 'pegawai kampen');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pengiriman`
--

CREATE TABLE `riwayat_pengiriman` (
  `tanggal` date NOT NULL,
  `tujuan` varchar(30) NOT NULL,
  `status` enum('0','1','') NOT NULL,
  `komentar` varchar(1000) NOT NULL,
  `id` varchar(10) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nomor_dokumen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`nomor_dokumen`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `riwayat_pengiriman`
--
ALTER TABLE `riwayat_pengiriman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`nip`),
  ADD KEY `nomor_dokumen` (`nomor_dokumen`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `riwayat_pengiriman`
--
ALTER TABLE `riwayat_pengiriman`
  ADD CONSTRAINT `riwayat_pengiriman_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`),
  ADD CONSTRAINT `riwayat_pengiriman_ibfk_2` FOREIGN KEY (`nomor_dokumen`) REFERENCES `dokumen` (`nomor_dokumen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
