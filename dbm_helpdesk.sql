-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 01, 2023 at 04:38 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbm_helpdesk`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory_komputer`
--

CREATE TABLE `inventory_komputer` (
  `id` int(11) NOT NULL,
  `no_barang` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `barcode` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jenis_infrastruktur` int(1) DEFAULT NULL,
  `pc_printer` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `processor` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ram_ddr` int(11) DEFAULT NULL,
  `ram_gb` int(11) DEFAULT NULL,
  `hd_ssd` int(11) DEFAULT NULL,
  `hd_hdd` int(11) DEFAULT NULL,
  `grafik_card` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sistem_operasi` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kondisi` int(1) DEFAULT NULL,
  `sumber_dana` int(11) DEFAULT NULL,
  `tahun_pengadaan` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kelengkapan` int(1) DEFAULT NULL,
  `nama_pc` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mac_address` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lantai` int(11) DEFAULT NULL,
  `bidang_unit` int(11) DEFAULT NULL,
  `seksi` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pengguna` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_komputer`
--

INSERT INTO `inventory_komputer` (`id`, `no_barang`, `barcode`, `jenis_infrastruktur`, `pc_printer`, `processor`, `ram_ddr`, `ram_gb`, `hd_ssd`, `hd_hdd`, `grafik_card`, `sistem_operasi`, `kondisi`, `sumber_dana`, `tahun_pengadaan`, `kelengkapan`, `nama_pc`, `mac_address`, `lantai`, `bidang_unit`, `seksi`, `pengguna`) VALUES
(1, '001', 'LT11TA2019PUSDATINPC001', 2, 'All in One PC', 'Intel i7 8700T', NULL, 8, NULL, 2000, NULL, 'Windows 10 Pro', 1, 1, '2019', 1, 'DESKTOP-IVEHF0I', NULL, 11, 11, 'TU', 'Erwin Santoso'),
(2, '002', 'LT11TA2019PUSDATINPC002', 2, 'All in One PC', 'Intel i7 8700T', NULL, 8, NULL, 2000, NULL, 'Windows 10 Pro', 1, 1, '2019', 1, 'DESKTOP-SUSFFJ1', NULL, 11, 11, 'TU', 'Dini'),
(3, '003', 'LT11TAKIBPUSDATINPC003', 2, 'PC', NULL, NULL, 4, NULL, 512, NULL, 'Windows 7 Ultimate', 3, 1, 'KIB', 2, 'Fajri PC', NULL, 11, 11, 'DATA', 'Agung Pramudya'),
(4, '004', 'LT11TAKIBPUSDATINPC004', 2, 'PC', 'Intel i5-35700', NULL, 4, NULL, 1000, NULL, 'Windows 10 Home', 1, 1, 'KIB', 1, 'DESKTOP-5PMIPO6', NULL, 11, 11, 'SI', 'Tenaga Ahli -  Ade'),
(5, '005', 'LT11TAKIBPUSDATINPC005', 2, 'PC HP Pavilion HPE', 'Intel i7-2600', NULL, 14, NULL, 1000, NULL, 'Windows 7 Ultimate', 1, 1, 'KIB', 1, 'Ben10- PC', NULL, 11, 11, 'DATA', 'Benny '),
(6, '006', 'LT11TA2019PUSDATINPC006', 2, 'HP', 'Intel i7-8700', NULL, 8, NULL, 2000, NULL, 'Windows 10 Home', 1, 1, '2019', 1, 'DESKTOP- 2UNCAO', NULL, 11, 11, 'DATA', 'Fajri'),
(7, '007', 'LT11TA2014PUSDATINPC007', 2, 'DELL OptiPlex 3011 AIO', 'Intel i5-3470S', NULL, 12, 256, 0, NULL, 'Windows 7 Pro 32 bit', 1, 1, '2014', 1, 'PU1-PC', NULL, 11, 11, 'SI', 'Wahid'),
(8, '008', 'LT11TA2017PUSDATINPC008', 2, 'HP 24-g251d             ', 'Intel i5-7200U ', NULL, 8, NULL, 1000, NULL, 'Windows 10 Home 64 bit', 1, 1, '2017', 1, 'DESKTOP- FD8II2K', NULL, 11, 11, 'DATA', 'Petugas CC'),
(9, '009', 'LT11TA2017PUSDATINPC009', 2, 'HP 24-g251d             ', 'Intel i5-7200U', NULL, 8, NULL, 1000, NULL, 'Windows 10 Home 64 bit', 1, 1, '2017', 1, 'Posko-DPE-1', NULL, 11, 11, 'DATA', 'Petugas CC'),
(10, '010', 'LT11TA2019PUSDATINPC010', 2, 'HP', 'Intel i7-8700', NULL, 8, NULL, 1000, NULL, 'Windows 10 Home 64 bit', 1, 1, '2019', 1, NULL, NULL, 11, 11, 'SI', 'Rani Rimadani'),
(11, '011', 'LT11TA2019PUSDATINPC011', 2, 'HP', 'Intel i7-8700', NULL, 8, NULL, 2000, NULL, 'Windows 10 Home 64 bit', 1, 1, '2019', 1, 'DESKTOP - D8NKJ4K', NULL, 11, 11, 'TU', 'Tim Medsos Pusdatin'),
(12, '012', 'LT11TA2015PUSDATINPR012', 4, 'Epson L350', '-', NULL, 0, 0, 0, '-', '-', 1, 1, '2015', 1, '-', '-', 11, 11, 'PUSDATIN', 'Ruangan Pusdatin'),
(13, '013', 'LT11TAKIBPUSDATINPR013', 4, 'Epson L350', '-', NULL, 0, 0, 0, '-', '-', 1, 1, 'KIB', 1, '-', '-', 11, 11, 'PUSDATIN', 'Ruangan CC'),
(14, '014', 'LT11TAKIBPUSDATINPR014', 4, 'Epson L350', '-', NULL, 0, 0, 0, '-', '-', 1, 1, 'KIB', 1, '-', '-', 11, 11, 'PUSDATIN', 'Ruangan CC'),
(15, '015', 'LT11TA2021PUSDATINPC015', 2, 'HP 280 Pro G6', 'Intel i7 10700', NULL, 8, NULL, 1000, 'Intel UHD 630', 'Windows 11 Pro', 1, 1, '2021', 1, NULL, NULL, 11, 11, 'SI', 'Aisha'),
(16, '016', 'LT11TA2021PUSDATINPC016', 2, 'HP 280 Pro G6', 'Intel i7 10700', NULL, 8, 256, 1000, 'Intel UHD 630', 'Windows 11 Pro', 1, 1, '2021', 1, NULL, NULL, 11, 11, 'DATA', 'Mario'),
(17, '017', 'LT11TA2021PUSDATINPC017', 2, 'HP 280 Pro G6', 'Intel i7 10700', NULL, 8, NULL, 1000, 'Intel UHD 630', 'Windows 11 Pro', 1, 1, '2021', 1, NULL, NULL, 11, 11, 'SI', 'Prayudi'),
(18, '018', 'LT11TA2021PUSDATINPC018', 2, 'HP 280 Pro G6', 'Intel i7 10700', NULL, 8, NULL, 1000, 'Intel UHD 630', 'Windows 11 Pro', 1, 1, '2021', 1, NULL, NULL, 11, 11, 'KAPUS', 'Kapusdatin'),
(19, '019', 'LT11TA2021PUSDATINPC019', 2, 'DELL Optiplex 5090', 'Intel i7 10700', NULL, 16, 256, 1000, 'Radeon 550', 'Windows 11', 1, 1, '2021', 1, NULL, NULL, 11, 11, 'TU', 'Ade Bowo'),
(20, '020', 'LT11TA2021PUSDATINPC020', 2, 'DELL Optiplex 5090', 'Intel i7 10700', NULL, 16, NULL, 1000, 'Radeon 550', 'Windows 11', 1, 1, '2021', 1, NULL, NULL, 11, 11, 'TU', 'Tim Medsos Pusdatin'),
(21, '021', 'LT11TA2021PUSDATINPR021', 4, 'EPSON L1450', '-', NULL, 0, 0, 0, '-', '-', 1, 1, '2021', 1, '-', '-', 11, 11, 'PUSDATIN', 'Ruangan Pusdatin'),
(22, '022', 'LT11TA2021PUSDATINPR022', 4, 'EPSON L1450', '-', NULL, 0, 0, 0, '-', '-', 1, 1, '2021', 1, '-', '-', 11, 11, 'PUSDATIN', 'Ruangan Pusdatin'),
(23, '023', 'LT11TA2021PUSDATINPR023', 4, 'Cannon PIXMA IP8770', '-', NULL, 0, 0, 0, '-', '-', 1, 1, '2021', 1, '-', '-', 11, 11, 'PUSDATIN', 'Ruangan Pusdatin'),
(24, '024', 'LT11TA2022PUSDATINPC024', 2, 'HP ProOne 600 G6 22 AIO', 'Intel i7 10700T', NULL, 8, 256, 1000, 'Intel UHD 630', 'Windows 11 Pro', 1, 1, '2022', 1, 'MEDSOS', NULL, 11, 11, 'TU', 'Media Sosial'),
(25, '025', 'LT11TA2022PUSDATINPC025', 2, 'HP ProOne 600 G6 22 AIO', 'Intel i7 10700T', NULL, 8, 256, 1000, 'Intel UHD 630', 'Windows 11 Pro', 1, 1, '2022', 1, NULL, NULL, 11, 11, 'DATA', 'Agung Pramudya'),
(26, '026', 'LT11TA2022PUSDATINPC026', 2, 'HP ProOne 600 G6 22 AIO', 'Intel i7 10700T', NULL, 8, 256, 1000, 'Intel UHD 630', 'Windows 11 Pro', 1, 1, '2022', 1, NULL, NULL, 11, 11, 'KAPUS', 'Wiwik Wahyuni'),
(27, '027', 'LT11TA2022PUSDATINPC027', 2, 'HP ProOne 600 G6 22 AIO', 'Intel i7 10700T', NULL, 8, 256, 1000, 'Intel UHD 630', 'Windows 11 Pro', 1, 1, '2022', 1, NULL, NULL, 11, 11, 'TU', 'Turmudi, ST, MT'),
(28, '028', 'LT11TA2022PUSDATINPC028', 2, 'HP ProOne 600 G6 22 AIO', 'Intel i7 10700T', NULL, 8, 256, 1000, 'Intel UHD 630', 'Windows 11 Pro', 1, 1, '2022', 1, NULL, NULL, 11, 11, 'TU', 'Riyana Raraswati'),
(29, '029', 'LT11TA2022PUSDATINPC029', 2, 'HP Pavilion 27-D0733D', 'Intel i7 10700T', NULL, 16, 256, 2000, 'Nvidia GEForce MX350', 'Windows 11', 1, 1, '2022', 1, NULL, NULL, 11, 11, 'DATA', 'Fahriar'),
(30, '030', 'LT11TA2022PUSDATINPC030', 2, 'HP Pavilion 27-D0733D', 'Intel i7 10700T', NULL, 16, 256, 2000, 'Nvidia GEForce MX350', 'Windows 11', 1, 1, '2022', 1, NULL, NULL, 11, 11, 'DATA', 'Vindy'),
(31, '031', 'LT11TA2022PUSDATINPC031', 2, 'HP Pavilion 27-D0733D', 'Intel i7 10700T', NULL, 16, 256, 2000, 'Nvidia GEForce MX350', 'Windows 11', 1, 1, '2022', 1, NULL, NULL, 11, 11, 'TU', 'Media Sosial'),
(32, '032', 'LT11TA2022PUSDATINPR032', 4, 'HP Smart Tank 515', '-', NULL, 0, 0, 0, '-', '-', 1, 1, '2022', 1, '-', '-', 11, 11, 'PUSDATIN', 'Ade Bowo'),
(33, '033', 'LT11TA2022PUSDATINPR033', 4, 'HP Smart Tank 515', '-', NULL, 0, 0, 0, '-', '-', 1, 1, '2022', 1, '-', '-', 11, 11, 'PUSDATIN', 'Riyana Raraswati');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_hardware`
--

CREATE TABLE `jenis_hardware` (
  `id` int(11) NOT NULL,
  `jenis` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_hardware`
--

INSERT INTO `jenis_hardware` (`id`, `jenis`) VALUES
(1, 'Server (minimal menjelaskan Merek Processor, CPU, Ram, HDD)'),
(2, 'Personal Computer'),
(3, 'Laptop-PC'),
(4, 'Printer'),
(5, ' Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_infrastruktur`
--

CREATE TABLE `jenis_infrastruktur` (
  `id` int(11) NOT NULL,
  `jenis` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_infrastruktur`
--

INSERT INTO `jenis_infrastruktur` (`id`, `jenis`) VALUES
(1, 'Komputer/PC'),
(2, 'Laptop'),
(3, 'Printer'),
(4, 'Kabel LAN & Internet'),
(5, 'Software Aplikasi');

-- --------------------------------------------------------

--
-- Table structure for table `kelengkapan`
--

CREATE TABLE `kelengkapan` (
  `id` int(11) NOT NULL,
  `kelengkapan` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelengkapan`
--

INSERT INTO `kelengkapan` (`id`, `kelengkapan`) VALUES
(1, 'Lengkap (Keyboard + Mouse / Kabel Printer)'),
(2, 'Unit Saja');

-- --------------------------------------------------------

--
-- Table structure for table `kondisi`
--

CREATE TABLE `kondisi` (
  `id` int(11) NOT NULL,
  `kondisi` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kondisi`
--

INSERT INTO `kondisi` (`id`, `kondisi`) VALUES
(1, 'Baik'),
(2, 'Bermasalah (Lemot/Error)'),
(3, 'Rusak (Tidak terpakai)');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_infrastruktur`
--

CREATE TABLE `lokasi_infrastruktur` (
  `id` int(11) NOT NULL,
  `lokasi` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lokasi_infrastruktur`
--

INSERT INTO `lokasi_infrastruktur` (`id`, `lokasi`) VALUES
(1, 'Sekretariat'),
(2, 'Bidang Jalan dan Jembatan'),
(3, 'Bidang Kelengkapan Jalan'),
(4, 'Bidang Prasarana dan Sarana Utilitas Kota'),
(5, 'Bidang Penerangan Jalan dan Sarana Umum'),
(6, 'Unit Peralatan dan Perbekalan Bina Marga'),
(7, 'Unit Pengadaan Tanah Bina Marga'),
(8, 'Unit Pengelola Penyelidikan, Pengujian dan Pengukuran Bina Marga'),
(9, 'Pusat Data dan Informasi Bina Marga');

-- --------------------------------------------------------

--
-- Table structure for table `review_user`
--

CREATE TABLE `review_user` (
  `id` int(11) NOT NULL,
  `id_tiket` int(11) NOT NULL,
  `emot` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `komentar` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_lokasi_infrastruktur`
--

CREATE TABLE `sub_lokasi_infrastruktur` (
  `id` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `sub_lokasi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_lokasi_infrastruktur`
--

INSERT INTO `sub_lokasi_infrastruktur` (`id`, `id_lokasi`, `sub_lokasi`) VALUES
(1, 1, 'Sekretariat Umum'),
(2, 1, 'Sekretariat Kepegawaian'),
(3, 1, 'Sekretariat Program dan Pelaporan'),
(4, 1, 'Sekretariat Keuangan'),
(5, 2, 'Seksi Perencanaan Jalan dan Jembatan'),
(6, 2, 'Seksi Pembangunan dan Peningkatan Jalan dan Jembatan'),
(7, 2, 'Seksi Pemeliharaan Jalan dan Jembatan'),
(8, 3, 'Seksi Perencanaan dan Kelengkapan Prasarana Jalan'),
(9, 3, 'Seksi Pembangunan dan Peningkatan Kelengkapan Jalan'),
(10, 3, 'Seksi Pemeliharaan Kelengkapan Jalan'),
(11, 4, 'Seksi Perencanaan Sarana dan Prasarana Utilitas Kota'),
(12, 4, 'Seksi Pembangunan dan Peningkatan Sarana dan Prasarana Utilitas Kota'),
(13, 4, 'Seksi Pemeliharaan Prasarana dan Sarana Utilitas Kota'),
(14, 5, 'Seksi Penerangan Jalan'),
(15, 5, 'Seksi Penerangan Sarana Umum'),
(16, 5, 'Seksi Pengembangan dan Logistik'),
(17, 6, 'Unit Peralatan dan Perbekalan Bina Marga'),
(18, 7, 'Unit Pengadaan Tanah Bina Marga'),
(19, 8, 'Unit Pengelola Penyelidikan, Pengujian dan Pengukuran Bina Marga'),
(20, 9, 'Pusat Data dan Informasi Bina Marga');

-- --------------------------------------------------------

--
-- Table structure for table `sumber_dana`
--

CREATE TABLE `sumber_dana` (
  `id` int(11) NOT NULL,
  `sumber` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sumber_dana`
--

INSERT INTO `sumber_dana` (`id`, `sumber`) VALUES
(1, 'APBD'),
(2, 'K/L/D/I Pusat'),
(3, 'Hibah'),
(4, 'Inovasi ASN'),
(5, 'Inovasi Proyek Perubahan'),
(6, 'Swadana/ BLUD'),
(7, 'Milik Pribadi');

-- --------------------------------------------------------

--
-- Table structure for table `teknisi`
--

CREATE TABLE `teknisi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_teknisi` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teknisi`
--

INSERT INTO `teknisi` (`id`, `id_user`, `nama_teknisi`, `status`) VALUES
(1, 2, 'Wahid Ikhsan', 1),
(2, 3, 'Ade Rulliana', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id` int(11) NOT NULL,
  `kode_tiket` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `group_tiket` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_pemohon` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `id_jenis` int(1) NOT NULL,
  `model` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `id_sublokasi` int(11) NOT NULL,
  `lampiran` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_pekerjaan` text COLLATE utf8mb4_general_ci NOT NULL,
  `telp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_teknisi` int(1) NOT NULL,
  `approval` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tiket_group`
--

CREATE TABLE `tiket_group` (
  `id` int(11) NOT NULL,
  `kode_tiket` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `group_tiket` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_lokasi` int(11) DEFAULT NULL,
  `id_sublokasi` int(11) DEFAULT NULL,
  `nama_lengkap` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nip_user` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jenis_kelamin` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telp` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `level` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_register` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_lokasi`, `id_sublokasi`, `nama_lengkap`, `nip_user`, `jenis_kelamin`, `telp`, `email`, `username`, `password`, `level`, `status`, `tgl_register`) VALUES
(1, 0, 0, 'Admin', NULL, NULL, '08998115748', 'admin@binamarga.jakarta.go.id', 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Admin', 'Aktif', '2023-02-01 02:30:35'),
(2, 0, 0, 'Wahid Ikhsan', NULL, NULL, NULL, NULL, 'wahid', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Teknisi', 'Aktif', '2023-02-01 02:30:35'),
(3, 0, 0, 'Ade Rulliana', NULL, NULL, NULL, NULL, 'ade', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Teknisi', 'Aktif', '2023-02-01 02:30:35'),
(4, 1, 1, 'Sekretariat Umum', NULL, NULL, NULL, NULL, 'umum', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Unit', 'Aktif', '2023-02-01 02:30:35'),
(5, 1, 2, 'Sekretariat Kepegawaian', NULL, NULL, NULL, NULL, 'kepegawaian', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Unit', 'Aktif', '2023-02-01 02:30:35'),
(6, 1, 3, 'Sekretariat Program dan Pelaporan', NULL, NULL, NULL, NULL, 'program', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Unit', 'Aktif', '2023-02-01 02:30:35'),
(7, 1, 4, 'Sekretariat Keuangan', NULL, NULL, NULL, NULL, 'keuangan', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Unit', 'Aktif', '2023-02-01 02:30:35'),
(8, 2, 5, 'Seksi Perencanaan Jalan dan Jembatan', NULL, NULL, NULL, NULL, 'jantan1', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Unit', 'Aktif', '2023-02-01 02:30:35'),
(9, 2, 6, 'Seksi Pembangunan dan Peningkatan Jalan dan Jembatan', NULL, NULL, NULL, NULL, 'jantan2', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Unit', 'Aktif', '2023-02-01 02:30:35'),
(10, 2, 7, 'Seksi Pemeliharaan Jalan dan Jembatan', NULL, NULL, NULL, NULL, 'jantan3', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Unit', 'Aktif', '2023-02-01 02:30:35'),
(11, 3, 8, 'Seksi Perencanaan dan Kelengkapan Prasarana Jalan', NULL, NULL, NULL, NULL, 'jalan1', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Unit', 'Aktif', '2023-02-01 02:30:35'),
(12, 3, 9, 'Seksi Pembangunan dan Peningkatan Kelengkapan Jalan', NULL, NULL, NULL, NULL, 'jalan2', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Unit', 'Aktif', '2023-02-01 02:30:35'),
(13, 3, 10, 'Seksi Pemeliharaan Kelengkapan Jalan', NULL, NULL, NULL, NULL, 'jalan3', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Unit', 'Aktif', '2023-02-01 02:30:35'),
(14, 4, 11, 'Seksi Perencanaan Sarana dan Prasarana Utilitas Kota', NULL, NULL, NULL, NULL, 'kota1', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Unit', 'Aktif', '2023-02-01 02:30:35'),
(15, 4, 12, 'Seksi Pembangunan dan Peningkatan Sarana dan Prasarana Utilitas Kota', NULL, NULL, NULL, NULL, 'kota2', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Unit', 'Aktif', '2023-02-01 02:30:35'),
(16, 4, 13, 'Seksi Pemeliharaan Prasarana dan Sarana Utilitas Kota', NULL, NULL, NULL, NULL, 'kota3', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Unit', 'Aktif', '2023-02-01 02:30:35'),
(17, 5, 14, 'Seksi Penerangan Jalan', NULL, NULL, NULL, NULL, 'peneranganjalan', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Unit', 'Aktif', '2023-02-01 02:30:35'),
(18, 5, 15, 'Seksi Penerangan Sarana Umum', NULL, NULL, NULL, NULL, 'peneranganumum', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Unit', 'Aktif', '2023-02-01 02:30:35'),
(19, 5, 16, 'Seksi Pengembangan dan Logistik', NULL, NULL, NULL, NULL, 'pengembanganlogistik', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Unit', 'Aktif', '2023-02-01 02:30:35'),
(20, 6, 17, 'Unit Peralatan dan Perbekalan Bina Marga', NULL, NULL, NULL, NULL, 'alkal', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Unit', 'Aktif', '2023-02-01 02:30:35'),
(21, 7, 18, 'Unit Pengadaan Tanah Bina Marga', NULL, NULL, NULL, NULL, 'upt', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Unit', 'Aktif', '2023-02-01 02:30:35'),
(22, 8, 19, 'Unit Pengelola Penyelidikan, Pengujian dan Pengukuran Bina Marga', NULL, NULL, NULL, NULL, 'upp', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Unit', 'Aktif', '2023-02-01 02:30:35'),
(23, 9, 20, 'Pusat Data dan Informasi Bina Marga', NULL, NULL, NULL, NULL, 'pusdatin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Unit', 'Aktif', '2023-02-01 02:30:35'),
(24, 1, 1, 'Ka. Sub Bagian Umum', NULL, NULL, NULL, NULL, 'kasubbag_umum', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Pimpinan', 'Aktif', '2023-02-01 02:30:35'),
(25, 1, 2, 'Ka. Sub Koord. Kepegawaian', NULL, NULL, NULL, NULL, 'kasubkoord_kepegawaian', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Pimpinan', 'Aktif', '2023-02-01 02:30:35'),
(26, 1, 3, 'Ka. Sub Koord.  Program dan Pelaporan', NULL, NULL, NULL, NULL, 'kasubkoord_program', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Pimpinan', 'Aktif', '2023-02-01 02:30:35'),
(27, 1, 4, 'Ka. Sub Bagian Keuangan', NULL, NULL, NULL, NULL, 'kasubbag_keuangan', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Pimpinan', 'Aktif', '2023-02-01 02:30:35'),
(28, 2, 5, 'Ka. Sub Koord.  Perencanaan Jalan dan Jembatan', NULL, NULL, NULL, NULL, 'kasubkoord_jantan1', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Pimpinan', 'Aktif', '2023-02-01 02:30:35'),
(29, 2, 6, 'Ka. Sub Koord.  Pembangunan dan Peningkatan Jalan dan Jembatan', NULL, NULL, NULL, NULL, 'kasubkoord_jantan2', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Pimpinan', 'Aktif', '2023-02-01 02:30:35'),
(30, 2, 7, 'Ka. Sub Koord.  Pemeliharaan Jalan dan Jembatan', NULL, NULL, NULL, NULL, 'kasubkoord_jantan3', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Pimpinan', 'Aktif', '2023-02-01 02:30:35'),
(31, 3, 8, 'Ka. Sub Koord.  Perencanaan dan Kelengkapan Prasarana Jalan', NULL, NULL, NULL, NULL, 'kasubkoord_jalan1', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Pimpinan', 'Aktif', '2023-02-01 02:30:35'),
(32, 3, 9, 'Ka. Sub Koord.  Pembangunan dan Peningkatan Kelengkapan Jalan', NULL, NULL, NULL, NULL, 'kasubkoord_jalan2', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Pimpinan', 'Aktif', '2023-02-01 02:30:35'),
(33, 3, 10, 'Ka. Sub Koord.  Urusan Pemeliharaan Kelengkapan Jalan', NULL, NULL, NULL, NULL, 'kasubkoord_jalan3', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Pimpinan', 'Aktif', '2023-02-01 02:30:35'),
(34, 4, 11, 'Ka. Sub Koord.  Urusan Perencanaan Sarana dan Prasarana Utilitas Kota', NULL, NULL, NULL, NULL, 'kasubkoord_kota1', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Pimpinan', 'Aktif', '2023-02-01 02:30:35'),
(35, 4, 12, 'Ka. Sub Koord.  Urusan Pembangunan dan Peningkatan Sarana dan Prasarana Utilitas Kota', NULL, NULL, NULL, NULL, 'kasubkoord_kota2', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Pimpinan', 'Aktif', '2023-02-01 02:30:35'),
(36, 4, 13, 'Ka. Sub Koord.  UrusanPemeliharaan Prasarana dan Sarana Utilitas Kota', NULL, NULL, NULL, NULL, 'kasubkoord_kota3', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Pimpinan', 'Aktif', '2023-02-01 02:30:35'),
(37, 5, 14, 'Ka. Sub Koord.  Urusan Penerangan Jalan', NULL, NULL, NULL, NULL, 'kasubkoord_peneranganjalan', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Pimpinan', 'Aktif', '2023-02-01 02:30:35'),
(38, 5, 15, 'Ka. Sub Koord.  Urusan Penerangan Sarana Umum', NULL, NULL, NULL, NULL, 'kasubkoord_peneranganumum', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Pimpinan', 'Aktif', '2023-02-01 02:30:35'),
(39, 5, 16, 'Ka. Sub Koord.  Urusan Pengembangan dan Logistik', NULL, NULL, NULL, NULL, 'kasubkoord_pengembanganlogistik', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Pimpinan', 'Aktif', '2023-02-01 02:30:35'),
(40, 6, 17, 'Ka. Sub Bagian  Unit Peralatan dan Perbekalan Bina Marga', NULL, NULL, NULL, NULL, 'kasubbag_alkal', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Pimpinan', 'Aktif', '2023-02-01 02:30:35'),
(41, 7, 18, 'Ka. Sub Bagian  Unit Pengadaan Tanah Bina Marga', NULL, NULL, NULL, NULL, 'kasubbag_upt', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Pimpinan', 'Aktif', '2023-02-01 02:30:35'),
(42, 8, 19, 'Ka. Sub Bagian  Unit Pengelola Penyelidikan, Pengujian dan Pengukuran Bina Marga', NULL, NULL, NULL, NULL, 'kasubbag_upp', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Pimpinan', 'Aktif', '2023-02-01 02:30:35'),
(43, 9, 20, 'Ka. Sub Bagian Pusat Data dan Informasi Bina Marga', NULL, NULL, NULL, NULL, 'kasubbag_pusdatin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Pimpinan', 'Aktif', '2023-02-01 02:30:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory_komputer`
--
ALTER TABLE `inventory_komputer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_hardware`
--
ALTER TABLE `jenis_hardware`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_infrastruktur`
--
ALTER TABLE `jenis_infrastruktur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelengkapan`
--
ALTER TABLE `kelengkapan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kondisi`
--
ALTER TABLE `kondisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi_infrastruktur`
--
ALTER TABLE `lokasi_infrastruktur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_user`
--
ALTER TABLE `review_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_lokasi_infrastruktur`
--
ALTER TABLE `sub_lokasi_infrastruktur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumber_dana`
--
ALTER TABLE `sumber_dana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teknisi`
--
ALTER TABLE `teknisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiket_group`
--
ALTER TABLE `tiket_group`
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
-- AUTO_INCREMENT for table `inventory_komputer`
--
ALTER TABLE `inventory_komputer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `jenis_hardware`
--
ALTER TABLE `jenis_hardware`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_infrastruktur`
--
ALTER TABLE `jenis_infrastruktur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelengkapan`
--
ALTER TABLE `kelengkapan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kondisi`
--
ALTER TABLE `kondisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lokasi_infrastruktur`
--
ALTER TABLE `lokasi_infrastruktur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `review_user`
--
ALTER TABLE `review_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_lokasi_infrastruktur`
--
ALTER TABLE `sub_lokasi_infrastruktur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sumber_dana`
--
ALTER TABLE `sumber_dana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teknisi`
--
ALTER TABLE `teknisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tiket_group`
--
ALTER TABLE `tiket_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
