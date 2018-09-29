-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Sep 2018 pada 15.54
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.2

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
-- Struktur dari tabel `daftar_anggota`
--

CREATE TABLE `daftar_anggota` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `jenis_kelamin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_tarawih`
--

CREATE TABLE `jadwal_tarawih` (
  `id` int(5) NOT NULL,
  `tanggal` datetime NOT NULL,
  `imam` varchar(30) NOT NULL,
  `bilal` varchar(30) NOT NULL,
  `id_admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kas_masjid`
--

CREATE TABLE `kas_masjid` (
  `id` int(11) NOT NULL,
  `id_admin` int(5) NOT NULL,
  `nama_donatur` varchar(30) NOT NULL,
  `tipe` int(1) NOT NULL COMMENT '6. donatur tetap 7. tidak tetap 8. infaq',
  `jumlah` varchar(25) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` varchar(25) NOT NULL,
  `kategori` tinyint(1) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kas_masjid`
--

INSERT INTO `kas_masjid` (`id`, `id_admin`, `nama_donatur`, `tipe`, `jumlah`, `keterangan`, `tanggal`, `kategori`, `log_time`) VALUES
(1, 1, 'Hamba Allah', 1, '3000000', '', '2018-08-14', 0, '2018-08-14 05:48:14'),
(2, 1, 'joo', 1, '90000', '', '2018-08-15', 0, '2018-08-14 23:55:42'),
(3, 1, 'joo', 1, '20000', '', '2018-08-15', 0, '2018-08-14 23:56:07'),
(8, 1, 'M Nur Fauzan W', 6, 'Rp 5.000.000', '', '27-September-2018', 0, '2018-09-26 01:50:23'),
(12, 1, '-', 2, 'Rp 643.512', '', '26-September-2018', 1, '2018-09-26 04:21:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lap_ahad_dhuha`
--

CREATE TABLE `lap_ahad_dhuha` (
  `nomor` int(11) NOT NULL,
  `id_admin` int(4) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(20) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lap_ahad_dhuha`
--

INSERT INTO `lap_ahad_dhuha` (`nomor`, `id_admin`, `tanggal`, `jumlah`, `log_time`) VALUES
(2, 1, '2018-04-10', 500000, '2018-04-10 02:33:17'),
(3, 1, '2018-04-10', 55555, '2018-04-10 03:10:07'),
(4, 1, '2018-07-28', 555555, '2018-07-28 15:53:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lap_amal_jumat`
--

CREATE TABLE `lap_amal_jumat` (
  `nomor` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `petugas` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lap_amal_jumat`
--

INSERT INTO `lap_amal_jumat` (`nomor`, `id_admin`, `petugas`, `tanggal`, `jumlah`, `log_time`) VALUES
(1, 1, '', '2017-10-03', 800000, '2017-10-03 10:16:13'),
(2, 1, 'Mas ku', '0000-00-00', 50000, '2018-04-09 01:00:05'),
(3, 1, 'joo', '2018-04-09', 500000, '2018-04-09 01:08:55'),
(4, 1, 'joo', '2018-07-19', 600000, '2018-07-19 13:08:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lap_amal_tarawih`
--

CREATE TABLE `lap_amal_tarawih` (
  `nomor` int(11) NOT NULL,
  `id_admin` int(1) NOT NULL,
  `petugas` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lap_amal_tarawih`
--

INSERT INTO `lap_amal_tarawih` (`nomor`, `id_admin`, `petugas`, `tanggal`, `jumlah`, `log_time`) VALUES
(1, 1, '1', '2017-10-03', 500000, '2017-10-03 10:09:07'),
(2, 1, 'Mas Hamim', '2018-04-08', 54121, '2018-04-11 03:52:11'),
(4, 1, 'fauzan', '2018-07-24', 50000, '2018-07-24 00:57:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lap_hewan_kurban`
--

CREATE TABLE `lap_hewan_kurban` (
  `nomor` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `penyumbang` varchar(50) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lap_hewan_kurban`
--

INSERT INTO `lap_hewan_kurban` (`nomor`, `id_admin`, `tanggal`, `penyumbang`, `alamat`, `jenis`, `jumlah`, `log_time`) VALUES
(1, 1, '2017-10-18', 'Sembarang', 'kapas madya', 'sapi', 2, '2017-10-18 04:47:57'),
(4, 1, '2018-07-28', 'Pak Mighfar', 'Indonesia ', 'Unta', 5, '2018-07-28 03:30:02'),
(5, 1, '2018-08-07', 'Joo', 'Kapas Madya 3i no 4', 'Sapi', 1, '2018-08-07 02:26:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lap_idul_adha`
--

CREATE TABLE `lap_idul_adha` (
  `nomor` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lap_idul_adha`
--

INSERT INTO `lap_idul_adha` (`nomor`, `id_admin`, `tanggal`, `jumlah`, `log_time`) VALUES
(1, 1, '2017-10-03', 5000000, '2017-10-03 09:36:46'),
(2, 1, '0000-00-00', 555555, '2018-04-10 06:58:08'),
(3, 1, '2018-04-10', 100000, '2018-04-10 07:02:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lap_idul_fitri`
--

CREATE TABLE `lap_idul_fitri` (
  `nomor` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lap_idul_fitri`
--

INSERT INTO `lap_idul_fitri` (`nomor`, `id_admin`, `tanggal`, `jumlah`, `log_time`) VALUES
(1, 1, '2017-10-03', 2500000, '2017-10-03 09:44:34'),
(2, 1, '0000-00-00', 55555, '2018-04-10 03:18:07'),
(3, 1, '2018-04-10', 505000, '2018-04-10 03:28:15'),
(4, 1, '2018-04-10', 510000, '2018-04-10 03:24:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lap_kotak_amal`
--

CREATE TABLE `lap_kotak_amal` (
  `id` int(7) NOT NULL,
  `id_admin` int(2) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `tipe` int(1) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `lap_kotak_amal`
--

INSERT INTO `lap_kotak_amal` (`id`, `id_admin`, `keterangan`, `tanggal`, `tipe`, `jumlah`, `log_time`) VALUES
(5, 1, '', '25-September-2018', 3, 'Rp 500.000', '2018-09-25 02:43:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lap_pengeluaran`
--

CREATE TABLE `lap_pengeluaran` (
  `Nomor` int(11) NOT NULL,
  `id_admin` int(10) NOT NULL,
  `Tanggal` date NOT NULL,
  `Jumlah` int(20) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lap_pengeluaran`
--

INSERT INTO `lap_pengeluaran` (`Nomor`, `id_admin`, `Tanggal`, `Jumlah`, `log_time`, `catatan`) VALUES
(1, 1, '2017-10-03', 5000000, '2017-10-03 10:48:17', 'Cuma Ngetest');

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_zakat`
--

CREATE TABLE `list_zakat` (
  `nomor` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `zakat_fitrah` varchar(20) NOT NULL,
  `beli` int(1) DEFAULT NULL,
  `zakat_mall` varchar(20) NOT NULL,
  `infaq` varchar(20) NOT NULL,
  `log_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `list_zakat`
--

INSERT INTO `list_zakat` (`nomor`, `id_admin`, `tanggal`, `nama`, `alamat`, `zakat_fitrah`, `beli`, `zakat_mall`, `infaq`, `log_time`) VALUES
(8, 1, '2018-04-07', 'M Nur Fauzan W', 'Kapas Madya 3i no 4', '10', 0, '1000000', '50000', '0000-00-00 00:00:00'),
(11, 1, '2018-07-19', 'M Nur Fauzan W', 'Kapas Madya 3i no 4', '10', 1, '2000000', '200000', '0000-00-00 00:00:00'),
(14, 2, '2018-07-28', 'Joo', 'Pogot', '10', 0, '', '', '0000-00-00 00:00:00'),
(15, 2, '2018-07-28', 'Gigogo', 'Pogot', '20', 0, '55555', '99999', '0000-00-00 00:00:00'),
(16, 2, '2018-07-28', 'Jookun', 'Pogot', '5', 0, '4440005', '51406', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_cabang`
--

CREATE TABLE `master_cabang` (
  `kode_cabang` int(6) NOT NULL,
  `nama_cabang` varchar(25) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `telepon` varchar(14) NOT NULL,
  `email` varchar(40) NOT NULL,
  `status_aktif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `master_cabang`
--

INSERT INTO `master_cabang` (`kode_cabang`, `nama_cabang`, `alamat`, `kota`, `telepon`, `email`, `status_aktif`) VALUES
(1, 'Miftahul Jannah', 'Kapas Madya', 'Surabaya', '-', '-', 1),
(3, 'coba', 'coba', 'sby', '62390742', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_login`
--

CREATE TABLE `master_login` (
  `id_admin` int(11) NOT NULL,
  `kode_cabang` int(11) NOT NULL,
  `kode_akses` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status_aktif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_login`
--

INSERT INTO `master_login` (`id_admin`, `kode_cabang`, `kode_akses`, `nama`, `username`, `password`, `status_aktif`) VALUES
(1, 1, 1, 'M Nur Fauzan W', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 1, 1, 'M Fikri Maulana', 'fikri', '21232f297a57a5a743894a0e4a801fc3', 1),
(3, 2, 2, 'Abdul Chodir J', 'chodir', 'admin', 1),
(4, 3, 3, 'Oky Ferdiansyah', 'oky', '21232f297a57a5a743894a0e4a801fc3', 1),
(5, 3, 3, 'test', 'BARU', '21232f297a57a5a743894a0e4a801fc3', 1),
(6, 1, 1, 'Joo', 'Jooo', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_child`
--

CREATE TABLE `menu_child` (
  `kode_menu_child` int(11) NOT NULL,
  `kode_menu_header` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `file_php` varchar(20) NOT NULL,
  `status_aktif` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_child`
--

INSERT INTO `menu_child` (`kode_menu_child`, `kode_menu_header`, `menu_name`, `file_php`, `status_aktif`) VALUES
(1, 1, 'Laporan Zakat & Infaq', 'Laporan/Zakat_fitrah', 'YES'),
(2, 1, 'Kotak Amal Sholat Jumat', 'jumat_php', 'NO'),
(3, 1, 'Kotak Amal Sholat Tarawih', 'tarawih_php', 'NO'),
(4, 1, 'Kotak Amal Idul Fitri', 'Amal_idul_fitri', 'NO'),
(5, 1, 'Kotak Amal Idul Adha', 'Amal_idul_adha', 'NO'),
(6, 1, 'Laporan Hewan Kurban', 'Laporan/Hewan_kurban', 'YES'),
(7, 1, 'Laporan Pengeluaran', 'Lap_pengeluaran', 'NO'),
(8, 1, 'Kotak Amal Ahad Dhuha', 'ahad_dhuha', 'NO'),
(10, 2, 'Jadwal Sholat Tarawih', 'jadwal_tarawih_ctrl', 'YES'),
(11, 2, 'Jadwal Sholat Jum\'at', 'jadwal_jumat_ctrl', 'YES'),
(12, 2, 'Jadwal Sholat Dhuha', 'jadwal_dhuha_ctrl', 'YES'),
(13, 2, 'Kotak Amal Idul Adha', 'trans_idul_adha', 'NO'),
(14, 2, 'Hewan Kurban', 'trans_hewan_kurban', 'NO'),
(15, 2, 'Pengeluaran', 'trans_pengeluaran', 'NO'),
(16, 2, 'Kotak Amal Ahad Dhuha', 'trans_ahad_dhuha', 'NO'),
(17, 3, 'Ganti Password', 'change_pass.php', 'YES'),
(18, 3, 'Set Hak Akses', 'Hak_akses_ctrl', 'YES'),
(19, 3, 'Setting Menu', 'Menu_level', 'YES'),
(20, 3, 'Daftar User', 'user_ctrl', 'YES'),
(21, 3, 'Cabang', 'Setting_cabang', 'NO'),
(22, 3, 'Menu Child', 'Setting_child', 'NO'),
(23, 3, 'Menu Header', 'Setting_header', 'NO'),
(24, 1, 'Laporan Kotak Amal', 'Laporan/Kotak_amal', 'YES');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_hak_akses`
--

CREATE TABLE `menu_hak_akses` (
  `kode_akses` int(1) NOT NULL,
  `kode_cabang` int(6) NOT NULL,
  `hak_akses` varchar(20) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `status_aktif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_hak_akses`
--

INSERT INTO `menu_hak_akses` (`kode_akses`, `kode_cabang`, `hak_akses`, `keterangan`, `status_aktif`) VALUES
(1, 0, 'Virgorasion', '', 1),
(3, 0, 'Admin', 'test', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_header`
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
-- Dumping data untuk tabel `menu_header`
--

INSERT INTO `menu_header` (`kode_menu_header`, `link`, `icon`, `menu_header`, `menu_child`, `status_aktif`) VALUES
(1, '#', 'fa fa-link', 'LAPORAN', 1, 'YES'),
(2, '#', 'fa fa-calendar', 'JADWAL', 1, 'YES'),
(3, '#', 'fa fa-gear', 'PENGATURAN', 1, 'YES'),
(4, 'takmir_ctrl', 'fa fa-users', 'Takmir', 0, 'YES'),
(5, 'kas_ctrl', 'fa fa-dollar', 'Kas Masjid', 0, 'YES');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_level`
--

CREATE TABLE `menu_level` (
  `kode_menu_level` int(11) NOT NULL,
  `kode_akses` int(11) NOT NULL,
  `kode_menu_child` int(11) NOT NULL,
  `akses_insert` tinyint(1) NOT NULL,
  `akses_view` tinyint(1) NOT NULL,
  `akses_edit` tinyint(1) NOT NULL,
  `akses_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_level`
--

INSERT INTO `menu_level` (`kode_menu_level`, `kode_akses`, `kode_menu_child`, `akses_insert`, `akses_view`, `akses_edit`, `akses_delete`) VALUES
(434, 1, 1, 1, 1, 1, 1),
(435, 1, 2, 1, 1, 1, 1),
(436, 1, 3, 1, 1, 1, 1),
(437, 1, 4, 1, 1, 1, 1),
(438, 1, 5, 1, 1, 1, 1),
(439, 1, 6, 1, 1, 1, 1),
(440, 1, 7, 1, 1, 1, 1),
(441, 1, 8, 1, 1, 1, 1),
(442, 1, 10, 1, 1, 1, 1),
(443, 1, 11, 1, 1, 1, 1),
(444, 1, 12, 1, 1, 1, 1),
(445, 1, 13, 1, 1, 1, 1),
(446, 1, 14, 1, 1, 1, 1),
(447, 1, 15, 1, 1, 1, 1),
(448, 1, 16, 1, 1, 1, 1),
(449, 1, 17, 1, 1, 1, 1),
(450, 1, 18, 1, 1, 1, 1),
(451, 1, 19, 1, 1, 1, 1),
(452, 1, 20, 1, 1, 1, 1),
(453, 1, 21, 1, 1, 1, 1),
(454, 1, 22, 1, 1, 1, 1),
(455, 1, 23, 1, 1, 1, 1),
(478, 3, 1, 1, 1, 1, 1),
(479, 3, 2, 1, 1, 1, 1),
(480, 3, 3, 1, 1, 1, 1),
(481, 3, 4, 1, 1, 1, 1),
(482, 3, 5, 1, 1, 1, 1),
(483, 3, 6, 1, 1, 1, 1),
(484, 3, 7, 1, 1, 1, 1),
(485, 3, 8, 1, 1, 1, 1),
(486, 3, 10, 1, 1, 1, 1),
(487, 3, 11, 1, 1, 1, 1),
(488, 3, 12, 1, 1, 1, 1),
(489, 3, 13, 1, 1, 1, 1),
(490, 3, 14, 1, 1, 1, 1),
(491, 3, 15, 1, 1, 1, 1),
(492, 3, 16, 1, 1, 1, 1),
(493, 3, 17, 1, 1, 1, 1),
(494, 3, 18, 1, 1, 1, 1),
(495, 3, 19, 1, 1, 1, 1),
(496, 3, 20, 1, 1, 1, 1),
(497, 3, 21, 1, 1, 1, 1),
(498, 3, 22, 1, 1, 1, 1),
(499, 3, 23, 1, 1, 1, 1),
(500, 1, 24, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `takmir`
--

CREATE TABLE `takmir` (
  `id` int(6) NOT NULL,
  `id_anggota` int(6) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `status_aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftar_anggota`
--
ALTER TABLE `daftar_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal_tarawih`
--
ALTER TABLE `jadwal_tarawih`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kas_masjid`
--
ALTER TABLE `kas_masjid`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lap_ahad_dhuha`
--
ALTER TABLE `lap_ahad_dhuha`
  ADD PRIMARY KEY (`nomor`);

--
-- Indeks untuk tabel `lap_amal_jumat`
--
ALTER TABLE `lap_amal_jumat`
  ADD PRIMARY KEY (`nomor`);

--
-- Indeks untuk tabel `lap_amal_tarawih`
--
ALTER TABLE `lap_amal_tarawih`
  ADD PRIMARY KEY (`nomor`);

--
-- Indeks untuk tabel `lap_hewan_kurban`
--
ALTER TABLE `lap_hewan_kurban`
  ADD PRIMARY KEY (`nomor`);

--
-- Indeks untuk tabel `lap_idul_adha`
--
ALTER TABLE `lap_idul_adha`
  ADD PRIMARY KEY (`nomor`);

--
-- Indeks untuk tabel `lap_idul_fitri`
--
ALTER TABLE `lap_idul_fitri`
  ADD PRIMARY KEY (`nomor`);

--
-- Indeks untuk tabel `lap_kotak_amal`
--
ALTER TABLE `lap_kotak_amal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lap_pengeluaran`
--
ALTER TABLE `lap_pengeluaran`
  ADD PRIMARY KEY (`Nomor`);

--
-- Indeks untuk tabel `list_zakat`
--
ALTER TABLE `list_zakat`
  ADD PRIMARY KEY (`nomor`);

--
-- Indeks untuk tabel `master_cabang`
--
ALTER TABLE `master_cabang`
  ADD PRIMARY KEY (`kode_cabang`);

--
-- Indeks untuk tabel `master_login`
--
ALTER TABLE `master_login`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `menu_child`
--
ALTER TABLE `menu_child`
  ADD PRIMARY KEY (`kode_menu_child`);

--
-- Indeks untuk tabel `menu_hak_akses`
--
ALTER TABLE `menu_hak_akses`
  ADD PRIMARY KEY (`kode_akses`);

--
-- Indeks untuk tabel `menu_header`
--
ALTER TABLE `menu_header`
  ADD PRIMARY KEY (`kode_menu_header`);

--
-- Indeks untuk tabel `menu_level`
--
ALTER TABLE `menu_level`
  ADD PRIMARY KEY (`kode_menu_level`),
  ADD KEY `kode_akses` (`kode_akses`,`kode_menu_child`);

--
-- Indeks untuk tabel `takmir`
--
ALTER TABLE `takmir`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftar_anggota`
--
ALTER TABLE `daftar_anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kas_masjid`
--
ALTER TABLE `kas_masjid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `lap_ahad_dhuha`
--
ALTER TABLE `lap_ahad_dhuha`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `lap_amal_jumat`
--
ALTER TABLE `lap_amal_jumat`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `lap_amal_tarawih`
--
ALTER TABLE `lap_amal_tarawih`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `lap_hewan_kurban`
--
ALTER TABLE `lap_hewan_kurban`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `lap_idul_adha`
--
ALTER TABLE `lap_idul_adha`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `lap_idul_fitri`
--
ALTER TABLE `lap_idul_fitri`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `lap_kotak_amal`
--
ALTER TABLE `lap_kotak_amal`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `lap_pengeluaran`
--
ALTER TABLE `lap_pengeluaran`
  MODIFY `Nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `list_zakat`
--
ALTER TABLE `list_zakat`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `master_cabang`
--
ALTER TABLE `master_cabang`
  MODIFY `kode_cabang` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `master_login`
--
ALTER TABLE `master_login`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `menu_child`
--
ALTER TABLE `menu_child`
  MODIFY `kode_menu_child` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `menu_hak_akses`
--
ALTER TABLE `menu_hak_akses`
  MODIFY `kode_akses` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `menu_header`
--
ALTER TABLE `menu_header`
  MODIFY `kode_menu_header` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `menu_level`
--
ALTER TABLE `menu_level`
  MODIFY `kode_menu_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=501;

--
-- AUTO_INCREMENT untuk tabel `takmir`
--
ALTER TABLE `takmir`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
