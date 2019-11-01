-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2019 at 08:38 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zakat`
--

-- --------------------------------------------------------

--
-- Table structure for table `kas_masjid`
--

CREATE TABLE `kas_masjid` (
  `id` int(11) NOT NULL,
  `id_admin` int(5) DEFAULT NULL,
  `id_tipe` int(1) DEFAULT NULL,
  `nama_donatur` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL DEFAULT '-',
  `tanggal` date NOT NULL,
  `kategori` tinyint(1) UNSIGNED NOT NULL COMMENT 'kategori 1 untuk Kotak Amal',
  `log_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kas_masjid`
--

INSERT INTO `kas_masjid` (`id`, `id_admin`, `id_tipe`, `nama_donatur`, `jumlah`, `keterangan`, `tanggal`, `kategori`, `log_time`) VALUES
(29, 8, 6, 'Fauzan', 900000, '', '2019-01-07', 0, '2019-01-08 05:55:31'),
(30, 8, 6, 'test', 2523423, '', '2019-01-06', 0, '2019-01-08 05:55:35'),
(31, 8, 7, 'joo', 500000, '', '2019-01-01', 0, '2019-01-08 04:28:18'),
(32, 8, 6, 'joo', 90000, '', '2019-02-01', 0, '2019-01-08 06:18:17'),
(33, 8, 7, 'alhamdulillah', 1000000, '', '2019-03-01', 0, '2019-01-08 06:19:01'),
(35, 8, 1, '-', 832500, '-', '2019-01-31', 1, '2019-01-10 16:10:23'),
(36, 11, 6, 'avi', 2000000, 'saya ikhlas lillahhitaalah', '2019-02-28', 0, '2019-09-17 06:16:37'),
(37, 11, 6, 'test', 20000, '', '2019-09-20', 0, '2019-09-20 01:07:43'),
(38, 11, 6, 'Fauzan', 200000, '', '2019-11-01', 0, '2019-11-01 07:16:41'),
(39, 11, 6, 'Fauzan', 50000, '', '2019-11-02', 0, '2019-11-01 07:17:00'),
(40, 11, 6, 'Fauzan', 50000, '', '2019-11-03', 0, '2019-11-01 07:17:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kas_masjid`
--
ALTER TABLE `kas_masjid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_tipe` (`id_tipe`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kas_masjid`
--
ALTER TABLE `kas_masjid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kas_masjid`
--
ALTER TABLE `kas_masjid`
  ADD CONSTRAINT `kas_masjid_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `master_login` (`id_admin`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `kas_masjid_ibfk_2` FOREIGN KEY (`id_tipe`) REFERENCES `tipe_donasi` (`id_tipe`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
