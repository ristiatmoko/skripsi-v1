-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 18, 2022 at 06:16 PM
-- Server version: 8.0.25
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_jurusan`
--

-- --------------------------------------------------------

--
-- Table structure for table `bobot`
--

CREATE TABLE `bobot` (
  `id_bobot` int NOT NULL,
  `tingkat_kepentingan` varchar(200) NOT NULL,
  `nilai_bobot` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bobot`
--

INSERT INTO `bobot` (`id_bobot`, `tingkat_kepentingan`, `nilai_bobot`) VALUES
(3, 'Sangat Rendah', 1),
(4, 'Rendah', 2),
(5, 'Sedang', 3),
(6, 'Tinggi', 4),
(7, 'Sangat Tinggi', 5);

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int NOT NULL,
  `tanggal` datetime NOT NULL,
  `nisn` varchar(200) NOT NULL,
  `rekomendasi_jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_alternatif` int NOT NULL,
  `kode_jurusan` varchar(100) NOT NULL,
  `jurusan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_alternatif`, `kode_jurusan`, `jurusan`) VALUES
(10, 'TKJ', 'TKJ'),
(11, 'AK', 'Akuntansi');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int NOT NULL,
  `bobot_preferensi` varchar(2) NOT NULL,
  `nama_kriteria` varchar(200) NOT NULL,
  `tipe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `bobot_preferensi`, `nama_kriteria`, `tipe`) VALUES
(13, 'C1', 'Gol', 'Benefit'),
(14, 'C2', 'Assist', 'Benefit'),
(15, 'C3', 'Save', 'Benefit'),
(16, 'C4', 'Clean Sheet', 'Benefit'),
(17, 'C5', 'Main', 'Benefit'),
(18, 'C6', 'Kartu Merah', 'Cost'),
(19, 'C7', 'Kartu Kuning', 'Cost'),
(20, 'C8', 'Bunuhdiri', 'Cost');

-- --------------------------------------------------------

--
-- Table structure for table `musim`
--

CREATE TABLE `musim` (
  `id_musim` int NOT NULL,
  `musim` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `musim`
--

INSERT INTO `musim` (`id_musim`, `musim`) VALUES
(2, 2023);

-- --------------------------------------------------------

--
-- Table structure for table `pertandingan`
--

CREATE TABLE `pertandingan` (
  `id_pertandingan` int NOT NULL,
  `id_musim` int NOT NULL,
  `versus` int NOT NULL,
  `tanggal` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `proses_hitung`
--

CREATE TABLE `proses_hitung` (
  `id_proses_hitung` int NOT NULL,
  `nisn` varchar(200) NOT NULL,
  `kode_jurusan` varchar(20) NOT NULL,
  `w1` varchar(10) NOT NULL,
  `w2` varchar(10) NOT NULL,
  `w3` varchar(10) NOT NULL,
  `w4` varchar(10) NOT NULL,
  `s` varchar(10) NOT NULL,
  `v` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proses_hitung`
--

INSERT INTO `proses_hitung` (`id_proses_hitung`, `nisn`, `kode_jurusan`, `w1`, `w2`, `w3`, `w4`, `s`, `v`) VALUES
(23, '1', 'TKJ', '0.31', '0.19', '0.31', '0.19', '82.869', '0.037161803'),
(24, '1', 'AK', '0.23', '0.23', '0.31', '0.23', '81.301', '0.036458649'),
(25, '2', 'TKJ', '0.31', '0.19', '0.31', '0.19', '80.328', '0.036022316'),
(26, '2', 'AK', '0.23', '0.23', '0.31', '0.23', '79.986', '0.03586895'),
(27, '3', 'TKJ', '0.31', '0.19', '0.31', '0.19', '75.481', '0.033848726'),
(28, '3', 'AK', '0.23', '0.23', '0.31', '0.23', '74.877', '0.033577868'),
(29, '4', 'TKJ', '0.31', '0.19', '0.31', '0.19', '71.933', '0.032257659'),
(30, '4', 'AK', '0.23', '0.23', '0.31', '0.23', '71.513', '0.032069315'),
(31, '5', 'TKJ', '0.31', '0.19', '0.31', '0.19', '74.416', '0.033371137'),
(32, '5', 'AK', '0.23', '0.23', '0.31', '0.23', '74.375', '0.033352751'),
(33, '6', 'TKJ', '0.31', '0.19', '0.31', '0.19', '77.529', '0.034767132'),
(34, '6', 'AK', '0.23', '0.23', '0.31', '0.23', '77.412', '0.034714664'),
(35, '7', 'TKJ', '0.31', '0.19', '0.31', '0.19', '57.688', '0.025869627'),
(36, '7', 'AK', '0.23', '0.23', '0.31', '0.23', '58.561', '0.026261115'),
(37, '8', 'TKJ', '0.31', '0.19', '0.31', '0.19', '73.651', '0.03302808'),
(38, '8', 'AK', '0.23', '0.23', '0.31', '0.23', '74.071', '0.033216425'),
(39, '9', 'TKJ', '0.31', '0.19', '0.31', '0.19', '78.445', '0.035177903'),
(40, '9', 'AK', '0.23', '0.23', '0.31', '0.23', '77.131', '0.034588652'),
(41, '10', 'TKJ', '0.31', '0.19', '0.31', '0.19', '76.737', '0.034411967'),
(42, '10', 'AK', '0.23', '0.23', '0.31', '0.23', '76.636', '0.034366674'),
(43, '11', 'TKJ', '0.31', '0.19', '0.31', '0.19', '73.481', '0.032951845'),
(44, '11', 'AK', '0.23', '0.23', '0.31', '0.23', '72.359', '0.032448695'),
(45, '12', 'TKJ', '0.31', '0.19', '0.31', '0.19', '73.517', '0.032967989'),
(46, '12', 'AK', '0.23', '0.23', '0.31', '0.23', '73.197', '0.032824488'),
(47, '13', 'TKJ', '0.31', '0.19', '0.31', '0.19', '72.979', '0.032726728'),
(48, '13', 'AK', '0.23', '0.23', '0.31', '0.23', '72.818', '0.032654529'),
(49, '14', 'TKJ', '0.31', '0.19', '0.31', '0.19', '70.802', '0.031750473'),
(50, '14', 'AK', '0.23', '0.23', '0.31', '0.23', '71.919', '0.032251381'),
(51, '15', 'TKJ', '0.31', '0.19', '0.31', '0.19', '77.98', '0.034969378'),
(52, '15', 'AK', '0.23', '0.23', '0.31', '0.23', '77.209', '0.034623631'),
(53, '16', 'TKJ', '0.31', '0.19', '0.31', '0.19', '78.879', '0.035372526'),
(54, '16', 'AK', '0.23', '0.23', '0.31', '0.23', '77.823', '0.034898973'),
(55, '17', 'TKJ', '0.31', '0.19', '0.31', '0.19', '62.399', '0.027982229'),
(56, '17', 'AK', '0.23', '0.23', '0.31', '0.23', '62.869', '0.028192996'),
(57, '18', 'TKJ', '0.31', '0.19', '0.31', '0.19', '79.244', '0.035536207'),
(58, '18', 'AK', '0.23', '0.23', '0.31', '0.23', '79.04', '0.035444725'),
(59, '19', 'TKJ', '0.31', '0.19', '0.31', '0.19', '75.288', '0.033762177'),
(60, '19', 'AK', '0.23', '0.23', '0.31', '0.23', '74.538', '0.033425847'),
(61, '20', 'TKJ', '0.31', '0.19', '0.31', '0.19', '82.374', '0.036939825'),
(62, '20', 'AK', '0.23', '0.23', '0.31', '0.23', '82.369', '0.036937583'),
(63, '21', 'TKJ', '0.31', '0.19', '0.31', '0.19', '79.339', '0.035578809'),
(64, '21', 'AK', '0.23', '0.23', '0.31', '0.23', '78.312', '0.03511826'),
(65, '22', 'TKJ', '0.31', '0.19', '0.31', '0.19', '73.159', '0.032807447'),
(66, '22', 'AK', '0.23', '0.23', '0.31', '0.23', '74.142', '0.033248264'),
(67, '23', 'TKJ', '0.31', '0.19', '0.31', '0.19', '79.848', '0.035807065'),
(68, '23', 'AK', '0.23', '0.23', '0.31', '0.23', '80.568', '0.036129942'),
(69, '24', 'TKJ', '0.31', '0.19', '0.31', '0.19', '68.411', '0.030678253'),
(70, '24', 'AK', '0.23', '0.23', '0.31', '0.23', '68.131', '0.030552689'),
(81, '25', 'TKJ', '0.31', '0.19', '0.31', '0.19', '76.811', '0.034445151'),
(82, '25', 'AK', '0.23', '0.23', '0.31', '0.23', '77.647', '0.034820048'),
(83, '26', 'TKJ', '0.31', '0.19', '0.31', '0.19', '69.457', '0.031147321'),
(84, '26', 'AK', '0.23', '0.23', '0.31', '0.23', '67.948', '0.030470625'),
(85, '27', 'TKJ', '0.31', '0.19', '0.31', '0.19', '71.025', '0.031850476'),
(86, '27', 'AK', '0.23', '0.23', '0.31', '0.23', '68.801', '0.030853144'),
(87, '28', 'TKJ', '0.31', '0.19', '0.31', '0.19', '70.96', '0.031821327'),
(88, '28', 'AK', '0.23', '0.23', '0.31', '0.23', '70.045', '0.031411004'),
(89, '29', 'TKJ', '0.31', '0.19', '0.31', '0.19', '67.844', '0.030423987'),
(90, '29', 'AK', '0.23', '0.23', '0.31', '0.23', '67.447', '0.030245956'),
(91, '30', 'TKJ', '0.31', '0.19', '0.31', '0.19', '77.077', '0.034564437'),
(92, '30', 'AK', '0.23', '0.23', '0.31', '0.23', '77.49', '0.034749642');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int NOT NULL,
  `slug` varchar(255) NOT NULL,
  `nisn` int NOT NULL,
  `nama_lengkap` varchar(250) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tinggi_badan` int NOT NULL,
  `berat_badan` int NOT NULL,
  `umur` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `slug`, `nisn`, `nama_lengkap`, `jenis_kelamin`, `tinggi_badan`, `berat_badan`, `umur`) VALUES
(2, '', 21, 'Risti Atmoko', 'Attackers', 0, 0, 0),
(3, '', 10, 'Tika Cantik', 'Defenders', 0, 0, 0),
(6, '', 15, 'Fajar R', 'Goalkeeper', 189, 60, 25);

-- --------------------------------------------------------

--
-- Table structure for table `statistik`
--

CREATE TABLE `statistik` (
  `id_statistik` int NOT NULL,
  `id_pemain` int NOT NULL,
  `id_pertandingan` int NOT NULL,
  `gol` int NOT NULL,
  `assist` int NOT NULL,
  `save` int NOT NULL,
  `cleansheet` int NOT NULL,
  `main` int NOT NULL,
  `kartu_merah` int NOT NULL,
  `kartu_kuning` int NOT NULL,
  `bunuhdiri` int NOT NULL,
  `motm` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_sub_kriteria` int NOT NULL,
  `kode_jurusan` varchar(100) NOT NULL,
  `c1` varchar(10) NOT NULL,
  `c2` varchar(10) NOT NULL,
  `c3` varchar(10) NOT NULL,
  `c4` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_sub_kriteria`, `kode_jurusan`, `c1`, `c2`, `c3`, `c4`) VALUES
(11, 'TKJ', '5', '3', '5', '3'),
(12, 'AK', '3', '3', '4', '3');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) DEFAULT NULL,
  `created_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `created_date`) VALUES
(5, 'admin', '80177534a0c99a7e3645b52f2027a48b', 'admin', '2020-08-15 09:59:43.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`id_bobot`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `musim`
--
ALTER TABLE `musim`
  ADD PRIMARY KEY (`id_musim`);

--
-- Indexes for table `pertandingan`
--
ALTER TABLE `pertandingan`
  ADD PRIMARY KEY (`id_pertandingan`),
  ADD KEY `id_musim` (`id_musim`);

--
-- Indexes for table `proses_hitung`
--
ALTER TABLE `proses_hitung`
  ADD PRIMARY KEY (`id_proses_hitung`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistik`
--
ALTER TABLE `statistik`
  ADD PRIMARY KEY (`id_statistik`),
  ADD KEY `id_pemain` (`id_pemain`),
  ADD KEY `id_pertandingan` (`id_pertandingan`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bobot`
--
ALTER TABLE `bobot`
  MODIFY `id_bobot` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_alternatif` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `musim`
--
ALTER TABLE `musim`
  MODIFY `id_musim` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pertandingan`
--
ALTER TABLE `pertandingan`
  MODIFY `id_pertandingan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proses_hitung`
--
ALTER TABLE `proses_hitung`
  MODIFY `id_proses_hitung` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `statistik`
--
ALTER TABLE `statistik`
  MODIFY `id_statistik` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_sub_kriteria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pertandingan`
--
ALTER TABLE `pertandingan`
  ADD CONSTRAINT `pertandingan_ibfk_1` FOREIGN KEY (`id_musim`) REFERENCES `musim` (`id_musim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `statistik`
--
ALTER TABLE `statistik`
  ADD CONSTRAINT `statistik_ibfk_1` FOREIGN KEY (`id_pemain`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `statistik_ibfk_2` FOREIGN KEY (`id_pertandingan`) REFERENCES `pertandingan` (`id_pertandingan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
