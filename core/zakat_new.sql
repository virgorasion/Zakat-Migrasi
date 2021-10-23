-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2021 at 06:46 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zakat_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE `bulan` (
  `id` int(11) NOT NULL,
  `bulan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`id`, `bulan`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'Maret'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'Agust'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `hewan_kurban`
--

CREATE TABLE `hewan_kurban` (
  `id` int(6) NOT NULL,
  `id_admin` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `penyumbang` varchar(255) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `jenis` tinyint(1) NOT NULL,
  `jumlah` smallint(4) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hewan_kurban`
--

INSERT INTO `hewan_kurban` (`id`, `id_admin`, `tanggal`, `penyumbang`, `alamat`, `jenis`, `jumlah`, `log_time`) VALUES
(1, 8, '2019-01-09', 'joo', 'kapas madya', 1, 5, '2019-01-09 10:16:49'),
(2, 8, '2019-01-09', 'sam', 'kapas', 1, 2, '2019-01-09 10:17:00'),
(3, 8, '2019-01-09', 'ku', 'kaps', 2, 2, '2019-01-09 10:17:07'),
(4, 11, '2019-11-21', 'Fauzan', 'Kapas Madya', 2, 5, '2019-11-21 01:04:22');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(3) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `keterangan` varchar(80) NOT NULL,
  `status_aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama`, `keterangan`, `status_aktif`) VALUES
(1, 'Ketua Remas', '-', 1),
(4, 'Anggota Remas', '-', 1),
(5, 'Seksi Humas', '-', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(6) NOT NULL,
  `kode_jadwal` int(1) NOT NULL,
  `imam` varchar(30) NOT NULL,
  `bilal` varchar(30) NOT NULL,
  `ceramah` tinyint(1) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `kode_jadwal`, `imam`, `bilal`, `ceramah`, `tanggal`) VALUES
(6, 1, 'Gunardi', 'Fauzan', 0, '2018-11-01'),
(7, 1, 'Pak Agus', 'Fikri', 1, '2018-11-02'),
(8, 1, 'Mas Hamim', 'Qodir', 0, '2018-11-03'),
(14, 1, 'Afif', 'Fauzan', 0, '2018-11-04'),
(15, 1, 'alucard', 'kagura', 0, '2018-11-05'),
(16, 1, 'balmond', 'wanda', 0, '2018-11-06'),
(17, 1, 'Wibu', 'Kpop', 0, '2018-11-07'),
(18, 2, 'test 1', 'test 1', 1, '2018-11-02'),
(19, 2, 'test 2', 'test 2', 1, '2018-11-09'),
(20, 2, 'test 3', 'test 3', 1, '2018-11-16'),
(22, 3, '&lt;script&gt;alert(&quot;asda', 'hgc', 1, '2018-12-06'),
(23, 3, 'Mas Hamim', 'test 1', 1, '2019-01-01'),
(24, 3, 'test 3', 'hgc', 0, '2019-01-02'),
(25, 2, 'balmond', 'Qodir', 1, '2019-02-01'),
(26, 2, 'ashdg', 'askdb', 0, '2019-02-08'),
(27, 2, 'ajsdb', 'kasdb', 1, '2019-02-15');

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
  `kategori` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'kategori 1 untuk Kotak Amal',
  `log_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kas_masjid`
--

INSERT INTO `kas_masjid` (`id`, `id_admin`, `id_tipe`, `nama_donatur`, `jumlah`, `keterangan`, `tanggal`, `kategori`, `log_time`) VALUES
(29, 8, 6, 'Fauzan', 900000, '', '2019-01-07', 0, '2019-01-08 05:55:31'),
(30, 8, 6, 'test', 2523423, '', '2019-01-06', 0, '2019-01-08 05:55:35'),
(31, 8, 7, 'joo', 500000, '', '2019-01-01', 0, '2019-01-08 04:28:18'),
(32, 8, 6, 'joo', 90000, '', '2019-02-01', 0, '2019-01-08 06:18:17'),
(33, 11, 7, 'Fatin Zahidah Mas\'ud', 1000000, '', '2019-11-01', 0, '2019-11-20 19:28:46'),
(36, 11, 6, 'avi', 2000000, 'saya ikhlas lillahhitaalah', '2019-02-28', 0, '2019-09-17 06:16:37'),
(38, 11, 6, 'Amira Hanifa', 1500000, '', '2019-11-21', 0, '2019-11-20 19:30:12'),
(39, 11, 8, 'Virgorasion', 5000000, '', '2019-11-21', 0, '2019-11-20 19:30:42'),
(41, 11, 8, 'BE', 500000, '', '2019-11-21', 0, '2019-11-21 03:08:33'),
(43, 8, 8, 'robby', 500000, '', '2019-11-21', 0, '2019-11-21 03:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `lap_pengeluaran`
--

CREATE TABLE `lap_pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `id_admin` int(10) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(10) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lap_pengeluaran`
--

INSERT INTO `lap_pengeluaran` (`id_pengeluaran`, `id_admin`, `tanggal`, `jumlah`, `log_time`, `keterangan`) VALUES
(2, 8, '2018-12-05', 3515335, '2018-12-03 07:24:29', 'Initial Testa'),
(3, 8, '2019-01-07', 500000, '2019-01-08 06:48:35', ''),
(4, 8, '2019-01-23', 500000, '2019-01-09 16:39:51', ''),
(5, 8, '2019-02-01', 250000, '2019-01-09 16:45:29', ''),
(6, 8, '2019-02-02', 250000, '2019-01-09 16:45:56', ''),
(7, 8, '2019-01-31', 250000, '2019-01-10 15:11:00', ''),
(8, 8, '2019-02-01', 250000, '2019-01-10 15:11:20', ''),
(9, 8, '2019-01-18', 250000, '2019-01-10 15:11:32', ''),
(10, 8, '2019-02-01', 250000, '2019-01-10 15:11:42', ''),
(11, 8, '2019-02-01', 250000, '2019-01-10 15:11:50', ''),
(12, 8, '2019-02-01', 250000, '2019-01-10 15:15:29', ''),
(13, 11, '2019-11-20', 55555, '2019-11-20 19:11:32', ''),
(14, 8, '2019-11-21', 1500000, '2019-11-20 19:43:38', 'bayar listrik');

-- --------------------------------------------------------

--
-- Table structure for table `list_anggota`
--

CREATE TABLE `list_anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `list_anggota`
--

INSERT INTO `list_anggota` (`id_anggota`, `nama`, `alamat`, `no_hp`, `no_telp`, `jenis_kelamin`, `status`) VALUES
(1, 'M Nur Fauzan W ', 'Kapas Madya 3i/4', '083849575737', '', 'L', 0);

-- --------------------------------------------------------

--
-- Table structure for table `list_zakat`
--

CREATE TABLE `list_zakat` (
  `nomor` int(11) NOT NULL,
  `id_admin` int(5) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `zakat_fitrah` varchar(20) NOT NULL,
  `beli` int(1) DEFAULT NULL,
  `zakat_mall` varchar(20) NOT NULL,
  `infaq` varchar(20) NOT NULL,
  `log_time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_zakat`
--

INSERT INTO `list_zakat` (`nomor`, `id_admin`, `tanggal`, `nama`, `alamat`, `zakat_fitrah`, `beli`, `zakat_mall`, `infaq`, `log_time`) VALUES
(19, NULL, '2018-11-24', 'M Nur Fauzan W', 'kapas madya 3i', '5', 0, '', '', '0000-00-00 00:00:00'),
(22, 11, '2019-11-21', 'Fahrii Ilmy', 'Kapas Madya', '3', 0, '', '', '2019-11-21 03:33:47');

-- --------------------------------------------------------

--
-- Table structure for table `master_login`
--

CREATE TABLE `master_login` (
  `id_admin` int(5) NOT NULL,
  `kode_akses` int(1) DEFAULT NULL,
  `nama` varchar(30) CHARACTER SET latin1 NOT NULL,
  `username` varchar(30) CHARACTER SET latin1 NOT NULL,
  `password` varchar(32) CHARACTER SET latin1 NOT NULL,
  `status_aktif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master_login`
--

INSERT INTO `master_login` (`id_admin`, `kode_akses`, `nama`, `username`, `password`, `status_aktif`) VALUES
(8, 1, 'M Nur Fauzan W', 'fauzan', '21232f297a57a5a743894a0e4a801fc3', 1),
(11, 1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(12, 1, 'Dewan Juri', 'juri', '2f40bde8529e99bf8648a0a5718d0650', 1),
(14, NULL, 'Fatin Zahidah Mas\'ud', 'fatin', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_child`
--

CREATE TABLE `menu_child` (
  `kode_menu_child` int(11) NOT NULL,
  `kode_menu_header` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `file_php` varchar(35) NOT NULL,
  `status_aktif` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_child`
--

INSERT INTO `menu_child` (`kode_menu_child`, `kode_menu_header`, `menu_name`, `file_php`, `status_aktif`) VALUES
(1, 3, 'Laporan Zakat & Infaq', 'zakat_ctrl', 'YES'),
(2, 3, 'Kotak Amal Sholat Jumat', 'jumat_php', 'NO'),
(3, 3, 'Kotak Amal Sholat Tarawih', 'tarawih_php', 'NO'),
(4, 3, 'Kotak Amal Idul Fitri', 'Amal_idul_fitri', 'NO'),
(5, 3, 'Kotak Amal Idul Adha', 'Amal_idul_adha', 'NO'),
(6, 3, 'Laporan Hewan Kurban', 'Hewan_kurban', 'YES'),
(7, 3, 'Laporan Pengeluaran', 'Lap_pengeluaran', 'YES'),
(8, 3, 'Kotak Amal Ahad Dhuha', 'ahad_dhuha', 'NO'),
(10, 4, 'Jadwal Sholat Tarawih', 'jadwal_tarawih_ctrl', 'YES'),
(11, 4, 'Jadwal Sholat Jum\'at', 'Jadwal_jumat_ctrl', 'YES'),
(12, 4, 'Jadwal Sholat Dhuha', 'Jadwal_dhuha_ctrl', 'YES'),
(13, 4, 'Kotak Amal Idul Adha', 'trans_idul_adha', 'NO'),
(14, 4, 'Hewan Kurban', 'trans_hewan_kurban', 'NO'),
(15, 4, 'Pengeluaran', 'trans_pengeluaran', 'NO'),
(16, 4, 'Kotak Amal Ahad Dhuha', 'trans_ahad_dhuha', 'NO'),
(17, 6, 'Ganti Password', 'Setting_pass', 'YES'),
(18, 6, 'Set Hak Akses', 'Hak_akses_ctrl', 'YES'),
(19, 6, 'Setting Menu', 'Menu_level', 'YES'),
(20, 6, 'Daftar User', 'user_ctrl', 'YES'),
(21, 6, 'Cabang', 'Setting_cabang', 'NO'),
(22, 6, 'Menu Child', 'Setting_child', 'NO'),
(23, 6, 'Menu Header', 'Setting_header', 'NO'),
(24, 3, 'Laporan Kotak Amal', 'Kotak_amal_ctrl', 'YES'),
(25, 1, 'Kas Masjid', '-', 'YES'),
(26, 2, 'Takmir', '-', 'YES'),
(27, 6, 'Setting Jabatan', 'Jabatan_ctrl', 'YES'),
(28, 3, 'Laporan Perlengkapan', 'Perlengkapan', 'NO'),
(29, 5, 'Riwayat Kehadiran', 'riwayat_absensi', 'YES'),
(30, 5, 'Manajemen Mata Pelajaran', 'Mapel', 'YES'),
(31, 5, 'Daftar Kelas', 'Kelas', 'YES'),
(32, 5, 'Daftar Ustadz/Ustadzah', 'Ustadz', 'YES'),
(33, 5, 'Daftar Santri & Penilaian', 'Santri', 'YES'),
(34, 5, 'Tambah Santri', 'Tambah_santri', 'YES'),
(35, 5, 'Absensi Kehadiran', 'Absensi', 'YES'),
(36, 5, 'Dashboard TPA', 'Tpa_controller', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `menu_hak_akses`
--

CREATE TABLE `menu_hak_akses` (
  `kode_akses` int(1) NOT NULL,
  `hak_akses` varchar(20) CHARACTER SET latin1 NOT NULL,
  `keterangan` varchar(100) CHARACTER SET latin1 NOT NULL,
  `status_aktif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_hak_akses`
--

INSERT INTO `menu_hak_akses` (`kode_akses`, `hak_akses`, `keterangan`, `status_aktif`) VALUES
(1, 'Super Admin', '', 1),
(2, 'Tester', 'untuk debugging', 1),
(3, 'Seksi Keuangan', '-', 1),
(4, 'admin', 'Bukan Super Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_header`
--

CREATE TABLE `menu_header` (
  `kode_menu_header` int(11) NOT NULL,
  `link` varchar(20) NOT NULL,
  `icon` varchar(20) NOT NULL,
  `menu_header` varchar(20) NOT NULL,
  `menu_child` int(1) NOT NULL,
  `status_aktif` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_header`
--

INSERT INTO `menu_header` (`kode_menu_header`, `link`, `icon`, `menu_header`, `menu_child`, `status_aktif`) VALUES
(1, 'kas_ctrl', 'fa fa-dollar', 'KAS MASJID', 0, 'YES'),
(2, 'takmir_ctrl', 'fa fa-users', 'TAKMIR', 0, 'YES'),
(3, '#', 'fa fa-link', 'LAPORAN', 1, 'YES'),
(4, '#', 'fa fa-calendar', 'JADWAL', 1, 'YES'),
(5, '#', 'fa fa-university', 'PENGATURAN TPQ', 1, 'YES'),
(6, '#', 'fa fa-gear', 'PENGATURAN', 1, 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `menu_level`
--

CREATE TABLE `menu_level` (
  `kode_menu_level` int(11) NOT NULL,
  `kode_akses` int(1) NOT NULL,
  `kode_menu_child` int(11) DEFAULT NULL,
  `akses_insert` tinyint(1) NOT NULL,
  `akses_view` tinyint(1) NOT NULL,
  `akses_edit` tinyint(1) NOT NULL,
  `akses_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_level`
--

INSERT INTO `menu_level` (`kode_menu_level`, `kode_akses`, `kode_menu_child`, `akses_insert`, `akses_view`, `akses_edit`, `akses_delete`) VALUES
(16, 4, 1, 1, 1, 1, 1),
(17, 4, 6, 1, 1, 1, 1),
(18, 4, 7, 1, 1, 1, 1),
(19, 4, 10, 1, 1, 1, 1),
(20, 4, 11, 1, 1, 1, 1),
(21, 4, 12, 1, 1, 1, 1),
(22, 4, 17, 1, 1, 1, 1),
(23, 4, 18, 0, 1, 0, 0),
(24, 4, 19, 0, 1, 0, 0),
(25, 4, 20, 1, 1, 1, 1),
(26, 4, 24, 1, 1, 1, 1),
(27, 4, 25, 1, 1, 1, 1),
(28, 4, 26, 1, 1, 1, 1),
(29, 4, 27, 1, 1, 1, 1),
(45, 2, 1, 0, 1, 0, 0),
(46, 2, 6, 0, 1, 0, 0),
(47, 2, 7, 0, 1, 0, 0),
(48, 2, 10, 0, 1, 0, 0),
(49, 2, 11, 0, 1, 0, 0),
(50, 2, 12, 0, 1, 0, 0),
(51, 2, 17, 0, 1, 0, 0),
(52, 2, 18, 0, 0, 0, 0),
(53, 2, 19, 0, 0, 0, 0),
(54, 2, 20, 0, 0, 0, 0),
(55, 2, 24, 0, 0, 0, 0),
(56, 2, 25, 0, 1, 0, 0),
(57, 2, 26, 0, 1, 0, 0),
(58, 2, 27, 0, 0, 0, 0),
(59, 2, 28, 0, 1, 0, 0),
(132, 1, 1, 1, 1, 1, 1),
(133, 1, 6, 1, 1, 1, 1),
(134, 1, 7, 1, 1, 1, 1),
(135, 1, 10, 1, 1, 1, 1),
(136, 1, 11, 1, 1, 1, 1),
(137, 1, 12, 1, 1, 1, 1),
(138, 1, 17, 1, 1, 1, 1),
(139, 1, 18, 1, 1, 1, 1),
(140, 1, 19, 1, 1, 1, 1),
(141, 1, 20, 1, 1, 1, 1),
(142, 1, 24, 1, 1, 1, 1),
(143, 1, 25, 1, 0, 1, 1),
(144, 1, 26, 1, 0, 1, 1),
(145, 1, 27, 1, 1, 1, 1),
(146, 1, 29, 1, 1, 1, 1),
(147, 1, 30, 1, 1, 1, 1),
(148, 1, 31, 1, 1, 1, 1),
(149, 1, 32, 1, 1, 1, 1),
(150, 1, 33, 1, 1, 1, 1),
(151, 1, 34, 1, 1, 1, 1),
(152, 1, 35, 1, 1, 1, 1),
(153, 1, 36, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `perlengkapan`
--

CREATE TABLE `perlengkapan` (
  `id` int(4) NOT NULL,
  `id_ruang` int(4) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `kondisi` varchar(15) NOT NULL,
  `jumlah` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perlengkapan`
--

INSERT INTO `perlengkapan` (`id`, `id_ruang`, `nama_barang`, `kondisi`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sapu', 'Bagus', 2, '2019-10-21 00:00:00', '2019-10-21 00:00:00'),
(2, 2, 'AC', 'Buruk', 3, '2019-10-21 00:00:00', '2019-10-21 00:00:00'),
(3, 2, 'sekop', 'bagus', 1, '2019-10-22 00:00:00', '2019-10-22 00:00:00'),
(4, 2, 'sekop', 'bagus', 1, '2019-10-22 00:00:00', '2019-10-22 00:00:00'),
(5, 2, 'sekop', 'bagus', 1, '2019-10-22 00:00:00', '2019-10-22 00:00:00'),
(6, 2, 'sekop', 'bagus', 1, '2019-10-22 00:00:00', '2019-10-22 00:00:00'),
(7, 2, 'sekop', 'bagus', 1, '2019-10-22 00:00:00', '2019-10-22 00:00:00'),
(8, 2, 'sekop', 'bagus', 1, '2019-10-22 00:00:00', '2019-10-22 00:00:00'),
(9, 2, 'sekop', 'bagus', 1, '2019-10-22 00:00:00', '2019-10-22 00:00:00'),
(10, 2, 'sekop', 'bagus', 1, '2019-10-22 00:00:00', '2019-10-22 00:00:00'),
(11, 2, 'sekop', 'bagus', 1, '2019-10-22 00:00:00', '2019-10-22 00:00:00'),
(12, 2, 'sekop', 'bagus', 1, '2019-10-22 00:00:00', '2019-10-22 00:00:00'),
(13, 2, 'sekop', 'bagus', 1, '2019-10-22 00:00:00', '2019-10-22 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan_masjid`
--

CREATE TABLE `ruangan_masjid` (
  `id` int(11) NOT NULL,
  `nama_ruang` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan_masjid`
--

INSERT INTO `ruangan_masjid` (`id`, `nama_ruang`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 'Lantai 1', '-', '2019-10-17 00:00:00', '0000-00-00 00:00:00'),
(3, 'Lantai 2', '-', '2019-10-17 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `takmir`
--

CREATE TABLE `takmir` (
  `id` int(6) NOT NULL,
  `id_anggota` int(6) NOT NULL,
  `id_jabatan` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tipe_donasi`
--

CREATE TABLE `tipe_donasi` (
  `id_tipe` int(1) NOT NULL,
  `tipe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipe_donasi`
--

INSERT INTO `tipe_donasi` (`id_tipe`, `tipe`) VALUES
(1, 'Amal Jumatan'),
(2, 'Amal Ahad Dhuha'),
(3, 'Amal Tarawih'),
(4, 'Amal Idul Fitri'),
(5, 'Amal Idul Adha'),
(6, 'Donatur Tetap'),
(7, 'Donatur Tidak Tetap'),
(8, 'Infaq'),
(9, 'Undefined');

-- --------------------------------------------------------

--
-- Table structure for table `tpq_absen`
--

CREATE TABLE `tpq_absen` (
  `id` int(11) NOT NULL,
  `id_santri` int(11) NOT NULL,
  `absen` varchar(15) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `tanggal` date NOT NULL,
  `guru` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tpq_absen`
--

INSERT INTO `tpq_absen` (`id`, `id_santri`, `absen`, `keterangan`, `tanggal`, `guru`) VALUES
(1, 1, 'H', NULL, '2021-06-19', NULL),
(2, 11, 'H', NULL, '2021-06-25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tpq_guru`
--

CREATE TABLE `tpq_guru` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `syahadah` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tpq_guru`
--

INSERT INTO `tpq_guru` (`id`, `nama`, `alamat`, `no_telp`, `syahadah`, `created_at`) VALUES
(1, 'Fatin Zahidah Mas\'ud', 'Jl. raden said', '08312412512', 'punya', '2021-06-23 06:40:16'),
(2, 'Mutmainnah', 'Dr. Sutomo 2/68', '081231532021', 'punya', '2021-06-25 03:52:13'),
(3, 'Abdul Hamid', 'JL Surakarta No 20', '081231987621', 'punya', '2021-06-25 05:55:53'),
(4, 'Samsul Hadi', 'JL Pati No 10 GKB', '081231539392', 'punya', '2021-06-25 05:56:44'),
(5, 'Siti Mabruroh', 'Dusun Tambak sari', '081998634975', 'punya', '2021-06-25 05:57:41');

-- --------------------------------------------------------

--
-- Table structure for table `tpq_kelas`
--

CREATE TABLE `tpq_kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `jumlah_santri` int(3) NOT NULL,
  `metode` varchar(20) NOT NULL,
  `tingkatan` varchar(20) NOT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tpq_kelas`
--

INSERT INTO `tpq_kelas` (`id`, `nama_kelas`, `jumlah_santri`, `metode`, `tingkatan`, `id_guru`, `keterangan`, `created_at`) VALUES
(1, 'Baca Al-quran', 0, 'iqro', '2', 1, '', '2021-06-23 08:27:14'),
(2, 'Kitab', 0, '-', '2', 1, '', '2021-06-23 08:27:20'),
(6, 'Akidah Akhlak', 0, 'Ceramah dan praktek', '2', 4, '', '2021-06-25 06:02:55'),
(7, 'Fiqih', 0, 'Ceramah dan Praktek', '2', 5, '', '2021-06-25 06:01:55'),
(8, 'Sejarah Kebudayaan Islam', 0, 'Ceramah', '2', 3, '', '2021-06-25 06:02:36'),
(9, 'Ini Kelas Baru', 0, '-', '1', 3, '', '2021-06-25 15:05:07');

-- --------------------------------------------------------

--
-- Table structure for table `tpq_matapelajaran`
--

CREATE TABLE `tpq_matapelajaran` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tpq_matapelajaran`
--

INSERT INTO `tpq_matapelajaran` (`id`, `nama`) VALUES
(1, 'Aqidah'),
(2, 'Akhlak'),
(3, 'Fiqih');

-- --------------------------------------------------------

--
-- Table structure for table `tpq_raport`
--

CREATE TABLE `tpq_raport` (
  `id` int(11) NOT NULL,
  `id_santri` int(11) NOT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `nilai` float NOT NULL,
  `id_guru` int(11) NOT NULL,
  `keterangan` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `publish` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tpq_raport`
--

INSERT INTO `tpq_raport` (`id`, `id_santri`, `id_mapel`, `nilai`, `id_guru`, `keterangan`, `tanggal`, `publish`) VALUES
(2, 11, 1, 80, 3, '-', '2021-06-25', 1),
(3, 11, 2, 75, 3, '-', '2021-06-25', 1),
(4, 11, 3, 55, 3, '-', '2021-06-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tpq_rombel`
--

CREATE TABLE `tpq_rombel` (
  `id` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_mapel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tpq_rombel`
--

INSERT INTO `tpq_rombel` (`id`, `id_kelas`, `id_mapel`) VALUES
(12, 1, 1),
(13, 1, 2),
(14, 1, NULL),
(15, 6, NULL),
(16, 6, NULL),
(17, 6, NULL),
(18, 6, NULL),
(19, 7, NULL),
(20, 7, NULL),
(21, 7, NULL),
(22, 7, NULL),
(23, 8, NULL),
(24, 8, NULL),
(25, 8, NULL),
(26, 8, NULL),
(30, 9, 1),
(31, 9, 2),
(32, 9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tpq_santri`
--

CREATE TABLE `tpq_santri` (
  `id` int(11) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `nama` varchar(30) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `nama_wali` varchar(30) NOT NULL,
  `nomor_hp` varchar(15) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `tgl_lahir` date NOT NULL,
  `kode_akses` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tpq_santri`
--

INSERT INTO `tpq_santri` (`id`, `id_kelas`, `nama`, `jk`, `alamat`, `nama_wali`, `nomor_hp`, `tanggal_masuk`, `tanggal_keluar`, `tgl_lahir`, `kode_akses`) VALUES
(1, 1, 'Fauzan', 'L', 'kapas madya', 'santri', '087236423', '2021-06-01', NULL, '2021-05-30', '827412'),
(2, 8, 'Nayla Salsabila Afiyah', 'P', 'JL Surakarta No 20', 'Ahmadi', '081387880811', '2021-06-25', NULL, '2007-05-18', '627136'),
(3, 8, 'Muhammad Raditya Zidane', 'L', 'JL Pati No 19 GKB', 'Sugiono', '081212389899', '2021-06-25', NULL, '2006-12-18', '167694'),
(4, 7, 'Kayla Zakia Nursadrina', 'P', 'Dusun Tambak sari', 'Supardi', '087880319993', '2021-06-25', NULL, '2007-09-18', '825627'),
(5, 1, 'Jihan Zahirah Talita', 'P', 'JL Surakarta 1 No 3 GKB', 'Haryadi', '085624444236', '2021-06-25', NULL, '2009-01-02', '289007'),
(6, 6, 'Dzakira Talita Sa\'adah', 'P', 'JL Pati 1 No 6 ', 'Hermanto', '085238228888', '2021-06-25', NULL, '2013-06-05', '914290'),
(7, 2, 'Abbil Daffa Muaffaq', 'L', 'JL Surakarta No 10', 'Ahmad Fauzan', '085239227868', '2021-06-25', NULL, '2008-01-07', '109506'),
(8, 6, 'Farhan Abqary Zhafar', 'L', 'JL Pati 3 No 65', 'Kusairi', '0877803188793', '2021-06-25', NULL, '2009-08-05', '844361'),
(9, 7, 'Muhammad Azwar Haidar', 'L', 'Dusun Tambak sari', 'Ahmad Haidar', '081387990921', '2021-06-25', NULL, '2008-04-02', '968522'),
(10, 2, 'Aini Damayanti', 'P', 'Dr. Sutomo 3/66', 'Abdul Aziz', '085622314236', '2021-06-25', NULL, '2009-09-09', '197545'),
(11, 9, 'Santri Baru', 'L', 'kapas madya', 'ojan', '083849727281', '2021-06-25', NULL, '2004-08-31', '538856');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hewan_kurban`
--
ALTER TABLE `hewan_kurban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kas_masjid`
--
ALTER TABLE `kas_masjid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_tipe` (`id_tipe`);

--
-- Indexes for table `lap_pengeluaran`
--
ALTER TABLE `lap_pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `list_anggota`
--
ALTER TABLE `list_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `list_zakat`
--
ALTER TABLE `list_zakat`
  ADD PRIMARY KEY (`nomor`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `master_login`
--
ALTER TABLE `master_login`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `kode_akses` (`kode_akses`);

--
-- Indexes for table `menu_child`
--
ALTER TABLE `menu_child`
  ADD PRIMARY KEY (`kode_menu_child`),
  ADD KEY `kode_menu_header` (`kode_menu_header`);

--
-- Indexes for table `menu_hak_akses`
--
ALTER TABLE `menu_hak_akses`
  ADD PRIMARY KEY (`kode_akses`);

--
-- Indexes for table `menu_header`
--
ALTER TABLE `menu_header`
  ADD PRIMARY KEY (`kode_menu_header`);

--
-- Indexes for table `menu_level`
--
ALTER TABLE `menu_level`
  ADD PRIMARY KEY (`kode_menu_level`),
  ADD KEY `kode_akses` (`kode_akses`,`kode_menu_child`),
  ADD KEY `kode_menu_child` (`kode_menu_child`);

--
-- Indexes for table `perlengkapan`
--
ALTER TABLE `perlengkapan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ruang` (`id_ruang`) USING BTREE;

--
-- Indexes for table `ruangan_masjid`
--
ALTER TABLE `ruangan_masjid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `takmir`
--
ALTER TABLE `takmir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `tipe_donasi`
--
ALTER TABLE `tipe_donasi`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indexes for table `tpq_absen`
--
ALTER TABLE `tpq_absen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `murid` (`id_santri`),
  ADD KEY `guru` (`guru`);

--
-- Indexes for table `tpq_guru`
--
ALTER TABLE `tpq_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tpq_kelas`
--
ALTER TABLE `tpq_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indexes for table `tpq_matapelajaran`
--
ALTER TABLE `tpq_matapelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tpq_raport`
--
ALTER TABLE `tpq_raport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `murid` (`id_santri`),
  ADD KEY `guru` (`id_guru`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `tpq_rombel`
--
ALTER TABLE `tpq_rombel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `tpq_santri`
--
ALTER TABLE `tpq_santri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bulan`
--
ALTER TABLE `bulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hewan_kurban`
--
ALTER TABLE `hewan_kurban`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `kas_masjid`
--
ALTER TABLE `kas_masjid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `lap_pengeluaran`
--
ALTER TABLE `lap_pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `list_anggota`
--
ALTER TABLE `list_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `list_zakat`
--
ALTER TABLE `list_zakat`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `master_login`
--
ALTER TABLE `master_login`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `menu_child`
--
ALTER TABLE `menu_child`
  MODIFY `kode_menu_child` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=346;

--
-- AUTO_INCREMENT for table `menu_hak_akses`
--
ALTER TABLE `menu_hak_akses`
  MODIFY `kode_akses` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu_header`
--
ALTER TABLE `menu_header`
  MODIFY `kode_menu_header` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menu_level`
--
ALTER TABLE `menu_level`
  MODIFY `kode_menu_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `perlengkapan`
--
ALTER TABLE `perlengkapan`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ruangan_masjid`
--
ALTER TABLE `ruangan_masjid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `takmir`
--
ALTER TABLE `takmir`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tipe_donasi`
--
ALTER TABLE `tipe_donasi`
  MODIFY `id_tipe` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tpq_absen`
--
ALTER TABLE `tpq_absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tpq_guru`
--
ALTER TABLE `tpq_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tpq_kelas`
--
ALTER TABLE `tpq_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tpq_matapelajaran`
--
ALTER TABLE `tpq_matapelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tpq_raport`
--
ALTER TABLE `tpq_raport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tpq_rombel`
--
ALTER TABLE `tpq_rombel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tpq_santri`
--
ALTER TABLE `tpq_santri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hewan_kurban`
--
ALTER TABLE `hewan_kurban`
  ADD CONSTRAINT `hewan_kurban_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `master_login` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kas_masjid`
--
ALTER TABLE `kas_masjid`
  ADD CONSTRAINT `kas_masjid_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `master_login` (`id_admin`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `kas_masjid_ibfk_2` FOREIGN KEY (`id_tipe`) REFERENCES `tipe_donasi` (`id_tipe`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `lap_pengeluaran`
--
ALTER TABLE `lap_pengeluaran`
  ADD CONSTRAINT `lap_pengeluaran_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `master_login` (`id_admin`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `list_zakat`
--
ALTER TABLE `list_zakat`
  ADD CONSTRAINT `list_zakat_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `master_login` (`id_admin`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `master_login`
--
ALTER TABLE `master_login`
  ADD CONSTRAINT `master_login_ibfk_1` FOREIGN KEY (`kode_akses`) REFERENCES `menu_hak_akses` (`kode_akses`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `menu_child`
--
ALTER TABLE `menu_child`
  ADD CONSTRAINT `menu_child_ibfk_1` FOREIGN KEY (`kode_menu_header`) REFERENCES `menu_header` (`kode_menu_header`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_level`
--
ALTER TABLE `menu_level`
  ADD CONSTRAINT `menu_level_ibfk_1` FOREIGN KEY (`kode_menu_child`) REFERENCES `menu_child` (`kode_menu_child`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_level_ibfk_2` FOREIGN KEY (`kode_akses`) REFERENCES `menu_hak_akses` (`kode_akses`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `takmir`
--
ALTER TABLE `takmir`
  ADD CONSTRAINT `takmir_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `list_anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `takmir_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tpq_absen`
--
ALTER TABLE `tpq_absen`
  ADD CONSTRAINT `tpq_absen_ibfk_1` FOREIGN KEY (`id_santri`) REFERENCES `tpq_santri` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tpq_absen_ibfk_2` FOREIGN KEY (`guru`) REFERENCES `tpq_guru` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tpq_kelas`
--
ALTER TABLE `tpq_kelas`
  ADD CONSTRAINT `tpq_kelas_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `tpq_guru` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tpq_raport`
--
ALTER TABLE `tpq_raport`
  ADD CONSTRAINT `tpq_raport_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `tpq_guru` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tpq_raport_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `tpq_matapelajaran` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tpq_raport_ibfk_3` FOREIGN KEY (`id_santri`) REFERENCES `tpq_santri` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tpq_rombel`
--
ALTER TABLE `tpq_rombel`
  ADD CONSTRAINT `tpq_rombel_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tpq_kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tpq_rombel_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `tpq_matapelajaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tpq_santri`
--
ALTER TABLE `tpq_santri`
  ADD CONSTRAINT `tpq_santri_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tpq_kelas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
