-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08 Des 2017 pada 04.34
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(1, 1, '2017-10-13', 1, '2017-10-13 11:26:44'),
(2, 1, '2017-10-18', 50000, '2017-10-18 04:18:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lap_amal_jumat`
--

CREATE TABLE `lap_amal_jumat` (
  `nomor` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lap_amal_jumat`
--

INSERT INTO `lap_amal_jumat` (`nomor`, `id_admin`, `tanggal`, `jumlah`, `log_time`) VALUES
(1, 1, '2017-10-03', 800000, '2017-10-03 10:16:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lap_amal_tarawih`
--

CREATE TABLE `lap_amal_tarawih` (
  `nomor` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lap_amal_tarawih`
--

INSERT INTO `lap_amal_tarawih` (`nomor`, `id_admin`, `tanggal`, `jumlah`, `log_time`) VALUES
(1, 1, '2017-10-03', 500000, '2017-10-03 10:09:07');

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
(1, 1, '2017-10-18', 'Sembarang', 'kapas madya', 'sapi', 2, '2017-10-18 04:47:57');

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
(1, 1, '2017-10-03', 5000000, '2017-10-03 09:36:46');

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
(1, 1, '2017-10-03', 2500000, '2017-10-03 09:44:34');

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
  `beli` varchar(10) NOT NULL,
  `zakat_mall` varchar(20) NOT NULL,
  `infaq` varchar(20) NOT NULL,
  `log_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `list_zakat`
--

INSERT INTO `list_zakat` (`nomor`, `id_admin`, `tanggal`, `nama`, `alamat`, `zakat_fitrah`, `beli`, `zakat_mall`, `infaq`, `log_time`) VALUES
(2, 1, '2017-09-21', 'lasjdh', 'alsd', 'asldh', 'Beli', '', '', '2017-09-21 12:16:43'),
(3, 1, '2017-09-21', '', '', '', 'Tidak', '', '', '2017-09-21 12:19:01'),
(4, 1, '2017-09-21', 'Fauzan', 'kapas madya 3i no 4', '20 KG', 'Beli', '2000000', '2000000', '2017-09-21 14:27:10'),
(5, 1, '2017-09-21', 'akshdg', 'kg', 'khgd', 'Beli', '', '', '2017-09-21 14:34:12'),
(6, 1, '2017-09-21', 'asdlfj', 'kasjbf', '', 'Beli', '', '', '2017-09-21 14:35:05'),
(7, 1, '2017-09-24', 'arif', 'sembarnag', '5', 'Tidak', '50000', '50000', '2017-09-24 12:41:18'),
(8, 1, '2017-09-25', 'M Nur Fauzan W', 'Kapas Madya 3i/4', '20', 'Tidak', '2000000', '20000', '2017-09-25 09:20:35'),
(9, 1, '2017-10-03', 'Ainul Di Poles', 'Bikini Bottom', '5', 'Tidak', '10000', '', '2017-10-03 09:47:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_login`
--

CREATE TABLE `master_login` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `kode_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_login`
--

INSERT INTO `master_login` (`id_admin`, `nama`, `username`, `password`, `kode_akses`) VALUES
(1, 'M Nur Fauzan W', 'admin', 'admin', 1),
(2, 'M Fikri Maulana', 'fikri', 'admin', 1),
(3, 'Abdul Chodir J', 'chodir', 'admin', 2),
(4, 'Oky Ferdiansyah', 'oky', 'admin', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_child`
--

CREATE TABLE `menu_child` (
  `kode_menu_child` int(11) NOT NULL,
  `kode_menu_header` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `file_php` varchar(50) NOT NULL,
  `status_aktif` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_child`
--

INSERT INTO `menu_child` (`kode_menu_child`, `kode_menu_header`, `menu_name`, `file_php`, `status_aktif`) VALUES
(1, 1, 'Laporan Zakat & Infaq', 'zakat_ctrl', 'YES'),
(2, 1, 'Laporan Kotak Amal Jumat', 'jumat_php', 'YES'),
(3, 1, 'Laporan Kotak Amal Tarawih', 'tarawih_php', 'YES'),
(4, 1, 'Laporan Amal Idul Fitri', 'Amal_idul_fitri', 'YES'),
(5, 1, 'Laporan Amal Idul Adha', 'Amal_idul_adha', 'YES'),
(6, 1, 'Laporan Hewan Kurban', 'Hewan_kurban', 'YES'),
(7, 1, 'Laporan Pengeluaran', 'Lap_pengeluaran', 'YES'),
(8, 1, 'Laporan Ahad Dhuha', 'ahad_dhuha', 'YES'),
(10, 2, 'Kotak Amal Jumat', 'trans_jumat', 'YES'),
(11, 2, 'Kotak Amal Tarawih', 'trans_tarawih', 'YES'),
(12, 2, 'Kotak Amal Idul Fitri', 'trans_idul_fitri', 'YES'),
(13, 2, 'Kotak Amal Idul Adha', 'trans_idul_adha', 'YES'),
(14, 2, 'Hewan Kurban', 'trans_hewan_kurban', 'YES'),
(15, 2, 'Pengeluaran', 'trans_pengeluaran', 'YES'),
(16, 2, 'Kotak Amal Ahad Dhuha', 'trans_ahad_dhuha', 'YES'),
(17, 3, 'Ganti Password', 'change_pass.php', 'YES'),
(18, 3, 'Set Hak Akses', 'hak_akses', 'YES'),
(19, 3, 'Set Menu Child', 'Menu_level_controller', 'YES');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_hak_akses`
--

CREATE TABLE `menu_hak_akses` (
  `kode_akses` int(11) NOT NULL,
  `hak_akses` varchar(20) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `status_aktif` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_hak_akses`
--

INSERT INTO `menu_hak_akses` (`kode_akses`, `hak_akses`, `keterangan`, `status_aktif`) VALUES
(1, 'Admin', 'Admin Pusat', 'YES');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_header`
--

CREATE TABLE `menu_header` (
  `kode_menu_header` int(11) NOT NULL,
  `menu_header` varchar(20) NOT NULL,
  `status_aktif` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_header`
--

INSERT INTO `menu_header` (`kode_menu_header`, `menu_header`, `status_aktif`) VALUES
(1, 'LAPORAN', 'YES'),
(2, 'TRANSAKSI', 'NO'),
(3, 'PENGATURAN', 'YES');

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
(1, 1, 1, 1, 1, 1, 1),
(2, 1, 2, 1, 1, 1, 1),
(3, 1, 3, 1, 1, 1, 1),
(4, 1, 4, 1, 1, 1, 1),
(5, 1, 5, 1, 1, 1, 1),
(6, 1, 6, 1, 1, 1, 1),
(7, 1, 7, 1, 1, 1, 1),
(8, 1, 8, 1, 1, 1, 1),
(9, 1, 9, 1, 1, 1, 1),
(10, 1, 10, 1, 1, 1, 1),
(11, 1, 11, 1, 1, 1, 1),
(12, 1, 12, 1, 1, 1, 1),
(13, 1, 13, 1, 1, 1, 1),
(14, 1, 14, 1, 1, 1, 1),
(15, 1, 15, 1, 1, 1, 1),
(16, 1, 16, 1, 1, 1, 1),
(17, 1, 17, 1, 1, 1, 1),
(18, 1, 18, 1, 1, 1, 1),
(19, 1, 19, 1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lap_ahad_dhuha`
--
ALTER TABLE `lap_ahad_dhuha`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `lap_amal_jumat`
--
ALTER TABLE `lap_amal_jumat`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `lap_amal_tarawih`
--
ALTER TABLE `lap_amal_tarawih`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `lap_hewan_kurban`
--
ALTER TABLE `lap_hewan_kurban`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `lap_idul_adha`
--
ALTER TABLE `lap_idul_adha`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `lap_idul_fitri`
--
ALTER TABLE `lap_idul_fitri`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `lap_pengeluaran`
--
ALTER TABLE `lap_pengeluaran`
  ADD PRIMARY KEY (`Nomor`);

--
-- Indexes for table `list_zakat`
--
ALTER TABLE `list_zakat`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `master_login`
--
ALTER TABLE `master_login`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `menu_child`
--
ALTER TABLE `menu_child`
  ADD PRIMARY KEY (`kode_menu_child`);

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
  ADD KEY `kode_akses` (`kode_akses`,`kode_menu_child`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lap_ahad_dhuha`
--
ALTER TABLE `lap_ahad_dhuha`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lap_amal_jumat`
--
ALTER TABLE `lap_amal_jumat`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lap_amal_tarawih`
--
ALTER TABLE `lap_amal_tarawih`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lap_hewan_kurban`
--
ALTER TABLE `lap_hewan_kurban`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lap_idul_adha`
--
ALTER TABLE `lap_idul_adha`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lap_idul_fitri`
--
ALTER TABLE `lap_idul_fitri`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lap_pengeluaran`
--
ALTER TABLE `lap_pengeluaran`
  MODIFY `Nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `list_zakat`
--
ALTER TABLE `list_zakat`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `master_login`
--
ALTER TABLE `master_login`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `menu_child`
--
ALTER TABLE `menu_child`
  MODIFY `kode_menu_child` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `menu_hak_akses`
--
ALTER TABLE `menu_hak_akses`
  MODIFY `kode_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `menu_header`
--
ALTER TABLE `menu_header`
  MODIFY `kode_menu_header` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `menu_level`
--
ALTER TABLE `menu_level`
  MODIFY `kode_menu_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
