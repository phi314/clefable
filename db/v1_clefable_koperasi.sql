-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 28, 2015 at 11:57 
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `clefable_koperasi`
--
CREATE DATABASE IF NOT EXISTS `clefable_koperasi` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `clefable_koperasi`;

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE IF NOT EXISTS `angsuran` (
  `id_pinjam` char(10) NOT NULL,
  `cicilan` smallint(6) NOT NULL,
  `angsuran` int(11) NOT NULL,
  `bunga` int(11) NOT NULL,
  `tgl_jatuh_tempo` date DEFAULT NULL,
  `tgl_bayar` date NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `ket` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `angsuran`
--

INSERT INTO `angsuran` (`id_pinjam`, `cicilan`, `angsuran`, `bunga`, `tgl_jatuh_tempo`, `tgl_bayar`, `jumlah_bayar`, `ket`) VALUES
('P0003', 4, 833333, 83333, '2013-06-01', '0000-00-00', 0, '2013-06-01'),
('P0003', 5, 833333, 83333, '2013-07-01', '0000-00-00', 0, '2013-07-01'),
('P0003', 2, 833333, 83333, '2013-05-01', '0000-00-00', 0, '2013-05-01'),
('P0003', 3, 833333, 83333, '2013-05-01', '0000-00-00', 0, '2013-05-01'),
('P0003', 1, 833333, 83333, '2013-04-01', '0000-00-00', 0, '2013-04-01'),
('P0002', 2, 1666667, 166667, '2013-05-01', '2013-05-01', 1850000, '2013-05-01'),
('P0003', 6, 833333, 83333, '2013-08-01', '0000-00-00', 0, '2013-08-01'),
('P0002', 6, 1666667, 166667, '2013-08-01', '0000-00-00', 0, '2013-08-01'),
('P0002', 4, 1666667, 166667, '2013-06-01', '0000-00-00', 0, '2013-06-01'),
('P0002', 1, 1666667, 166667, '2013-04-01', '2013-04-01', 1850000, '2013-04-01'),
('P0002', 3, 1666667, 166667, '2013-05-01', '0000-00-00', 0, '2013-05-01'),
('P0002', 5, 1666667, 166667, '2013-07-01', '0000-00-00', 0, '2013-07-01'),
('P0001', 3, 1666667, 166667, '2013-05-12', '2013-03-01', 1850000, '2013-05-12'),
('P0001', 6, 1666667, 166667, '2013-08-12', '0000-00-00', 0, '2013-08-12'),
('P0001', 5, 1666667, 166667, '2013-07-12', '0000-00-00', 0, '2013-07-12'),
('P0001', 4, 1666667, 166667, '2013-06-12', '0000-00-00', 0, '2013-06-12'),
('P0001', 2, 1666667, 166667, '2013-04-12', '2013-04-12', 1850000, '2013-04-12'),
('P0001', 1, 1666667, 166667, '2013-03-12', '2013-03-12', 1850000, '2013-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('0b3f017b4940250c8a59a412a0b2325f', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31', 1364662471, ''),
('14fb892ffe65aba98c526f02cbb51cd0', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.160 Safari/537.22', 1363870001, 'a:4:{s:9:"user_data";s:0:"";s:9:"logged_in";s:13:"yesGetMeLogin";s:8:"username";s:5:"admin";s:13:"nama_pengguna";s:13:"Administrator";}'),
('82193b1d9647079381581cdd2788f471', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/536.26.17 (KHTML, like Gecko) Version/6.0.2 Safari/536.26.17', 1364080874, ''),
('8c04382981b7131e16ceae866e836f22', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/536.26.17 (KHTML, like Gecko) Version/6.0.2 Safari/536.26.17', 1364304041, ''),
('fc78f76de0dfc229c2a46896379dadc5', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/536.26.17 (KHTML, like Gecko) Version/6.0.2 Safari/536.26.17', 1364301174, 'a:4:{s:9:"user_data";s:0:"";s:9:"logged_in";s:13:"yesGetMeLogin";s:8:"username";s:5:"admin";s:13:"nama_pengguna";s:13:"Administrator";}');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_simpanan`
--

CREATE TABLE IF NOT EXISTS `jenis_simpanan` (
  `id_jenis` char(2) NOT NULL,
  `jenis_simpanan` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_simpanan`
--

INSERT INTO `jenis_simpanan` (`id_jenis`, `jenis_simpanan`, `jumlah`) VALUES
('01', 'Simpanan Pokok', 50000),
('02', 'Simpanan Wajib', 30000),
('03', 'Simpanan Sukarela', 0),
('04', 'Simpanan Apa Saja', 5000000);

-- --------------------------------------------------------

--
-- Table structure for table `nasabah`
--

CREATE TABLE IF NOT EXISTS `nasabah` (
  `noanggota` char(10) NOT NULL,
  `namaanggota` varchar(50) NOT NULL,
  `jk` char(2) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `hp` char(30) NOT NULL,
  `noidentitas` char(30) NOT NULL,
  `pwd` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nasabah`
--

INSERT INTO `nasabah` (`noanggota`, `namaanggota`, `jk`, `tempat_lahir`, `tgl_lahir`, `alamat`, `hp`, `noidentitas`, `pwd`) VALUES
('A001', 'Deddy Rusdiansyah,S.Kom', 'L', 'Pandeglang', '1979-08-05', 'Cimuncang Sidomuncul No.9', '087774846856', '123456', '4b2770de9b8e1d12df1be94c096cfc29'),
('A002', 'Ugih Sugiarti', 'P', 'Cianjur', '1978-03-01', 'Cimuncang Sidomuncul', '087774846856', '654321', '4b2770de9b8e1d12df1be94c096cfc29'),
('A003', 'Jihan Salsabila', 'P', 'Serang', '2002-06-15', 'Cimuncang Sidomuncul', '087774846856', '987654', '4b2770de9b8e1d12df1be94c096cfc29'),
('A004', 'Danis Putra Pramudia', 'L', 'Serang', '2013-01-26', 'cimuncang sidomuncul', '0877748', '4321', '4b2770de9b8e1d12df1be94c096cfc29');

-- --------------------------------------------------------

--
-- Table structure for table `pengambilan`
--

CREATE TABLE IF NOT EXISTS `pengambilan` (
`id_ambil` int(10) NOT NULL,
  `tgl` date NOT NULL,
  `noanggota` char(10) NOT NULL,
  `id_jenis` char(2) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `tglinsert` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengambilan`
--

INSERT INTO `pengambilan` (`id_ambil`, `tgl`, `noanggota`, `id_jenis`, `jumlah`, `user_id`, `tglinsert`) VALUES
(3, '2012-11-08', 'A003', '03', 5000, 'admin', '2012-11-08 10:38:50'),
(4, '2012-11-08', 'A001', '03', 20000, 'admin', '2012-11-08 10:58:58'),
(8, '2012-11-08', 'A001', '03', 210000, 'admin', '2012-11-08 13:39:27'),
(9, '2013-01-30', 'A003', '03', 50000, 'admin', '2013-01-30 02:12:12'),
(10, '2013-01-30', 'A003', '03', 100000, 'admin', '2013-01-30 02:12:50'),
(11, '2013-01-30', 'A003', '04', 50000, 'admin', '2013-01-30 02:13:16'),
(12, '2013-01-30', 'A003', '04', 200000, 'admin', '2013-01-30 02:26:29'),
(13, '2013-01-30', 'A002', '03', 50000, 'admin', '2013-01-30 02:32:45'),
(14, '2013-02-15', 'A001', '03', 50000, 'admin', '2013-02-15 09:53:59'),
(15, '2013-03-01', 'A003', '03', 100000, 'admin', '2013-02-15 10:03:12');

-- --------------------------------------------------------

--
-- Table structure for table `perencanaan`
--

CREATE TABLE IF NOT EXISTS `perencanaan` (
`id` int(11) NOT NULL,
  `id_kas` int(11) NOT NULL,
  `target` float NOT NULL,
  `realita` float NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE IF NOT EXISTS `pinjaman` (
  `id_pinjam` char(10) NOT NULL,
  `tgl` date NOT NULL,
  `noanggota` char(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `lama` smallint(6) NOT NULL,
  `bunga` smallint(6) NOT NULL,
  `user_id` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`id_pinjam`, `tgl`, `noanggota`, `jumlah`, `lama`, `bunga`, `user_id`) VALUES
('P0003', '2013-04-01', 'A003', 5000000, 6, 10, 'admin'),
('P0002', '2013-04-01', 'A002', 10000000, 6, 10, 'admin'),
('P0001', '2013-03-12', 'A001', 10000000, 6, 10, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
`id` int(11) NOT NULL,
  `koperasi` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `hp` varchar(30) DEFAULT NULL,
  `fax` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `koperasi`, `alamat`, `kota`, `hp`, `fax`, `email`, `logo`) VALUES
(1, 'KOPERASI DEDDY RUSDIANSYAH', 'cimuncang Sidomuncul No.9 Rt.03 Rw.20', 'Kota Serang', '087774846856', '0', 'deddy_rusdiansyah@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `simpanan`
--

CREATE TABLE IF NOT EXISTS `simpanan` (
`id_simpanan` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `noanggota` char(10) NOT NULL,
  `id_jenis` char(2) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `tglinsert` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simpanan`
--

INSERT INTO `simpanan` (`id_simpanan`, `tgl`, `noanggota`, `id_jenis`, `jumlah`, `user_id`, `tglinsert`) VALUES
(22, '2012-11-08', 'A001', '01', 50000, 'admin', '2012-11-08 10:37:56'),
(23, '2012-11-08', 'A001', '02', 30000, 'admin', '2012-11-08 10:37:57'),
(24, '2012-11-08', 'A001', '03', 100000, 'admin', '2012-11-08 10:38:04'),
(25, '2012-11-08', 'A002', '01', 50000, 'admin', '2012-11-08 10:38:11'),
(26, '2012-11-08', 'A002', '02', 30000, 'admin', '2012-11-08 10:38:13'),
(27, '2012-11-08', 'A002', '03', 50000, 'admin', '2012-11-08 10:38:17'),
(28, '2012-11-08', 'A003', '01', 50000, 'admin', '2012-11-08 10:38:25'),
(29, '2012-11-08', 'A003', '02', 30000, 'admin', '2012-11-08 10:38:27'),
(30, '2012-11-08', 'A003', '03', 10000, 'admin', '2012-11-08 10:38:31'),
(31, '2012-11-08', 'A001', '03', 50000, 'admin', '2012-11-08 10:57:36'),
(32, '2013-01-17', 'A001', '02', 30000, 'admin', '2013-01-17 20:44:29'),
(34, '2013-01-29', 'A003', '03', 30000, 'admin', '2013-01-28 19:17:12'),
(49, '2013-04-01', 'A001', '01', 50000, 'admin', '2013-04-01 19:54:10'),
(45, '2013-02-15', 'A002', '03', 500000, 'admin', '2013-02-15 09:13:24'),
(43, '2013-01-29', 'A003', '03', 30000, 'admin', '2013-01-29 04:40:53'),
(42, '2013-01-29', 'A003', '03', 400000, 'admin', '2013-01-29 04:39:33'),
(44, '2013-01-29', 'A003', '03', 30000, 'admin', '2013-01-29 04:57:04'),
(40, '2013-01-29', 'A001', '03', 40000, 'admin', '2013-01-28 19:17:30'),
(46, '2013-02-15', 'A003', '02', 30000, 'admin', '2013-02-15 11:10:40'),
(47, '2013-03-01', 'A001', '03', 500000, 'admin', '2013-02-15 11:11:16'),
(51, '2015-12-25', 'A001', '01', 200000, 'admin', '2015-12-25 02:01:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `namalengkap` varchar(100) DEFAULT NULL,
  `level` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `password`, `namalengkap`, `level`, `foto`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'super admin', 'ayah_profile.jpg'),
('satu', '27946274a201346f0322e3861909b5ff', 'Deddy Rusdiansyah', 'admin', '4376e209c000d5a9e2d889cb869b051325d5647b.jpg'),
('dua', 'a319360336c8cac32102f4dffbee4260', 'aa', 'admin', 'soal.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
 ADD PRIMARY KEY (`id_pinjam`,`cicilan`), ADD KEY `id_pinjam` (`id_pinjam`,`cicilan`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD PRIMARY KEY (`session_id`), ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `jenis_simpanan`
--
ALTER TABLE `jenis_simpanan`
 ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
 ADD PRIMARY KEY (`noanggota`);

--
-- Indexes for table `pengambilan`
--
ALTER TABLE `pengambilan`
 ADD PRIMARY KEY (`id_ambil`);

--
-- Indexes for table `perencanaan`
--
ALTER TABLE `perencanaan`
 ADD PRIMARY KEY (`id`), ADD KEY `id_kas` (`id_kas`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
 ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `simpanan`
--
ALTER TABLE `simpanan`
 ADD PRIMARY KEY (`id_simpanan`), ADD KEY `noanggota` (`noanggota`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengambilan`
--
ALTER TABLE `pengambilan`
MODIFY `id_ambil` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `perencanaan`
--
ALTER TABLE `perencanaan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `simpanan`
--
ALTER TABLE `simpanan`
MODIFY `id_simpanan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
