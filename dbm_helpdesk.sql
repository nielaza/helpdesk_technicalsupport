-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 11, 2023 at 01:24 AM
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
(1, 'Sekretariat Umum'),
(2, 'Sekretariat Keuangan'),
(3, 'Sekretariat Kepegawaian'),
(4, 'Sekretariat Program'),
(5, 'Bidang Kelengkapan Jalan'),
(6, 'Bidang Jalan dan Jembatan'),
(7, 'Bidang Prasarana dan Sarana Utilitas Kota'),
(8, 'Bidang Penerangan Jalan dan Sarana Umum'),
(9, 'UPPPP'),
(10, 'Unit Alkal'),
(11, 'Pusdatin'),
(12, 'Unit Pengadaan Tanah');

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
  `nama_teknisi` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teknisi`
--

INSERT INTO `teknisi` (`id`, `nama_teknisi`, `status`) VALUES
(1, 'Wahid Ikhsan', 1),
(2, 'Ade Rulliana', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id` int(11) NOT NULL,
  `user_pemohon` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `id_jenis` int(1) NOT NULL,
  `model` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `lampiran` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_general_ci NOT NULL,
  `telp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_teknisi` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id`, `user_pemohon`, `id_jenis`, `model`, `id_lokasi`, `lampiran`, `keterangan`, `telp`, `id_teknisi`, `status`, `created`) VALUES
(1, 'Fulan', 1, 'Asus', 11, 'tiket-230109-6b6cceed88.png', 'Install Ulang', '08998115748', 1, 2, '2023-01-09 11:56:34'),
(2, 'Fulana', 4, 'Lenovo', 8, 'tiket-230110-636f8557c0.png', 'Install', '087871211267', 0, 1, '2023-01-10 08:55:20');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `nama_lengkap` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nip_user` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `level` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_register` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_lokasi`, `nama_lengkap`, `nip_user`, `jenis_kelamin`, `telp`, `email`, `username`, `password`, `level`, `status`) VALUES
(1, 0, 'Admin', '000000001', 'Pria', '08998115748', 'admin@binamarga.jakarta.go.id', 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Admin', 'Aktif');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
