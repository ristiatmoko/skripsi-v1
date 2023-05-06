-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 06 Bulan Mei 2023 pada 05.04
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `westham`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bobot`
--

CREATE TABLE `bobot` (
  `id_bobot` int(11) NOT NULL,
  `tingkat_kepentingan` varchar(200) NOT NULL,
  `nilai_bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bobot`
--

INSERT INTO `bobot` (`id_bobot`, `tingkat_kepentingan`, `nilai_bobot`) VALUES
(4, 'Rendah', 2),
(5, 'Sedang', 3),
(6, 'Tinggi', 4),
(7, 'Sangat Tinggi', 5),
(8, 'Sangat Rendah', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `bobot_preferensi` varchar(2) NOT NULL,
  `nama_kriteria` varchar(200) NOT NULL,
  `bobot_kepentingan` double NOT NULL,
  `tipe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `bobot_preferensi`, `nama_kriteria`, `bobot_kepentingan`, `tipe`) VALUES
(13, 'C1', 'Gol', 5, 'Benefit'),
(17, 'C3', 'Save', 2, 'Benefit'),
(18, 'C4', 'Clean Sheet', 2, 'Benefit'),
(19, 'C5', 'Main', 2, 'Benefit'),
(20, 'C6', 'Kartu Merah', 2, 'Cost'),
(21, 'C2', 'Assist ', 4, 'Benefit'),
(22, 'C7', 'Kartu Kuning', 1, 'Cost'),
(23, 'C8', 'Bunuh Diri', 2, 'Cost');

-- --------------------------------------------------------

--
-- Struktur dari tabel `musim`
--

CREATE TABLE `musim` (
  `id_musim` int(11) NOT NULL,
  `musim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `musim`
--

INSERT INTO `musim` (`id_musim`, `musim`) VALUES
(12, 2022);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemain`
--

CREATE TABLE `pemain` (
  `id_pemain` int(11) NOT NULL,
  `no_punggung` int(11) NOT NULL,
  `nama_lengkap` varchar(250) NOT NULL,
  `posisi` varchar(20) NOT NULL,
  `tinggi_badan` int(11) NOT NULL,
  `berat_badan` int(11) NOT NULL,
  `umur` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemain`
--

INSERT INTO `pemain` (`id_pemain`, `no_punggung`, `nama_lengkap`, `posisi`, `tinggi_badan`, `berat_badan`, `umur`, `created_at`) VALUES
(25, 28, 'Tomás Soucek', 'Midfielders', 192, 86, 27, '2022-12-02 18:23:52'),
(26, 11, 'Lucas Paquetá', 'Attackers', 180, 72, 25, '2022-12-02 18:25:06'),
(27, 3, 'Aaron Cresswell', 'Defenders', 170, 66, 32, '2022-12-02 18:26:18'),
(28, 1, 'Lukasz Fabianski', 'Goalkeeper', 190, 83, 37, '2022-12-02 18:27:14'),
(29, 22, 'Saïd Benrahma', 'Attackers', 172, 67, 27, '2022-12-02 18:28:02'),
(30, 4, 'Kurt Zouma', 'Defenders', 190, 96, 28, '2022-12-02 18:29:34'),
(31, 20, 'Jarrod Bowen', 'Attackers', 175, 70, 25, '2022-12-02 18:30:23'),
(32, 2, 'Ben Johnson', 'Defenders', 175, 67, 22, '2022-12-02 18:31:01'),
(33, 15, 'Craig Dawson', 'Defenders', 188, 82, 32, '2022-12-02 18:31:43'),
(34, 8, 'Pablo Fornals', 'Midfielders', 178, 67, 26, '2022-12-02 18:32:37'),
(35, 7, 'Gianluca Scamacca', 'Attackers', 196, 85, 23, '2022-12-02 18:33:25'),
(36, 5, 'Vladimír Coufal', 'Defenders', 179, 76, 30, '2022-12-05 12:50:34'),
(37, 27, 'Nayef Aguerd', 'Defenders', 190, 76, 26, '2022-12-05 12:51:33'),
(38, 9, 'Michail Antonio', 'Attackers', 180, 82, 32, '2022-12-05 12:52:55'),
(39, 24, 'Thilo Kehrer', 'Defenders', 186, 76, 26, '2022-12-05 12:54:14'),
(40, 14, 'Maxwel Cornet', 'Defenders', 179, 69, 26, '2022-12-05 12:54:52'),
(41, 12, 'Flynn Downes', 'Midfielders', 173, 70, 23, '2022-12-05 12:55:33'),
(42, 21, 'Angelo Ogbonna', 'Defenders', 191, 86, 34, '2022-12-05 12:56:11'),
(43, 33, 'Emerson', 'Defenders', 176, 63, 28, '2022-12-05 12:57:25'),
(44, 32, 'Conor Coventry', 'Midfielders', 177, 63, 22, '2022-12-05 12:57:58'),
(45, 10, 'Manuel Lanzini', 'Midfielders', 167, 59, 29, '2022-12-05 12:58:37'),
(46, 13, 'Alphonse Aréola', 'Goalkeeper', 195, 94, 29, '2022-12-05 12:59:17'),
(47, 18, 'Danny Ings', 'Attackers', 178, 73, 30, '2023-02-07 15:19:07'),
(48, 72, 'Divin Mubama', 'Attackers', 0, 0, 18, '2023-02-07 15:21:45'),
(49, 41, 'Declan Rice', 'Midfielders', 185, 76, 23, '2023-02-27 12:40:08'),
(57, 21, 'Risti Atmoko', 'Midfielders', 170, 65, 24, '2023-02-28 10:35:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertandingan`
--

CREATE TABLE `pertandingan` (
  `id_pertandingan` int(11) NOT NULL,
  `id_musim` int(11) NOT NULL,
  `versus` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pertandingan`
--

INSERT INTO `pertandingan` (`id_pertandingan`, `id_musim`, `versus`, `tanggal`) VALUES
(7, 12, 'Brighton vs West Ham United', '2023-02-25'),
(8, 12, 'Tottenham vs West Ham United', '2023-02-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proses_hitung`
--

CREATE TABLE `proses_hitung` (
  `id_proses_hitung` int(11) NOT NULL,
  `id_pemain` varchar(200) NOT NULL,
  `s` float NOT NULL,
  `v` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `proses_hitung`
--

INSERT INTO `proses_hitung` (`id_proses_hitung`, `id_pemain`, `s`, `v`) VALUES
(49, '5', 2.3, '0.046046046'),
(50, '25', 2.09, '0.038568002'),
(51, '26', 2.17, '0.042042042'),
(52, '27', 2.01, '0.04024024'),
(53, '28', 3.63, '0.072672673'),
(54, '29', 2.64, '0.048717476'),
(55, '35', 2.61, '0.052252252'),
(56, '34', 1.98, '0.03963964'),
(57, '36', 1.91, '0.038238238'),
(58, '30', 2.04, '0.040840841'),
(59, '31', 2.99, '0.05985986'),
(60, '32', 1.86, '0.037237237'),
(61, '33', 1.87, '0.037437438'),
(62, '37', 1.73, '0.034634635'),
(63, '38', 2.7, '0.054054054'),
(64, '39', 1.92, '0.038438439'),
(65, '40', 1.56, '0.031231231'),
(66, '41', 1.76, '0.035235235'),
(67, '42', 1.77, '0.035435436'),
(68, '43', 1.81, '0.036236236'),
(69, '44', 1, '0.02002002'),
(70, '45', 1.62, '0.032432433'),
(71, '46', 1.59, '0.031831832'),
(72, '47', 1.34, '0.026826827'),
(73, '48', 1.12, '0.022422423'),
(74, '49', 2.3, '0.044019139'),
(75, '57', 1.87, '0.034508212');

-- --------------------------------------------------------

--
-- Struktur dari tabel `statistik`
--

CREATE TABLE `statistik` (
  `id_statistik` int(11) NOT NULL,
  `id_pemain` int(11) NOT NULL,
  `id_pertandingan` int(11) DEFAULT NULL,
  `gol` int(11) NOT NULL DEFAULT '0',
  `assist` int(11) NOT NULL DEFAULT '0',
  `save` int(11) NOT NULL,
  `clean` int(11) NOT NULL,
  `main` int(11) NOT NULL DEFAULT '0',
  `kartu_merah` int(11) DEFAULT '0',
  `kartu_kuning` int(11) DEFAULT '0',
  `bunuh_diri` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `statistik`
--

INSERT INTO `statistik` (`id_statistik`, `id_pemain`, `id_pertandingan`, `gol`, `assist`, `save`, `clean`, `main`, `kartu_merah`, `kartu_kuning`, `bunuh_diri`, `created_at`) VALUES
(20, 25, NULL, 1, 1, 0, 0, 1563, 0, 1, 0, '2022-12-02 18:23:52'),
(21, 26, NULL, 1, 2, 0, 0, 1006, 0, 3, 0, '2022-12-02 18:25:06'),
(22, 27, NULL, 0, 0, 0, 0, 1534, 0, 2, 0, '2022-12-02 18:26:18'),
(23, 28, NULL, 0, 0, 58, 4, 1695, 0, 0, 0, '2022-12-02 18:27:14'),
(24, 29, NULL, 3, 1, 0, 0, 1052, 0, 0, 0, '2022-12-02 18:28:02'),
(25, 30, NULL, 1, 0, 0, 0, 1275, 0, 0, 0, '2022-12-02 18:29:34'),
(26, 31, NULL, 4, 0, 0, 0, 1793, 0, 1, 0, '2022-12-02 18:30:23'),
(27, 32, NULL, 0, 0, 0, 0, 498, 0, 0, 0, '2022-12-02 18:31:01'),
(28, 33, NULL, 0, 0, 0, 0, 720, 0, 2, 0, '2022-12-02 18:31:43'),
(29, 34, NULL, 1, 0, 0, 0, 949, 0, 0, 0, '2022-12-02 18:32:37'),
(30, 35, NULL, 3, 0, 0, 0, 929, 0, 0, 0, '2022-12-02 18:33:25'),
(31, 36, NULL, 0, 0, 0, 0, 1112, 0, 3, 0, '2022-12-05 12:50:34'),
(32, 37, NULL, 0, 0, 0, 0, 346, 0, 2, 0, '2022-12-05 12:51:33'),
(33, 38, NULL, 2, 2, 0, 0, 903, 0, 1, 0, '2022-12-05 12:52:55'),
(34, 39, NULL, 0, 0, 0, 0, 1350, 0, 4, 1, '2022-12-05 12:54:14'),
(35, 40, NULL, 0, 0, 0, 0, 88, 0, 0, 0, '2022-12-05 12:54:52'),
(36, 41, NULL, 0, 0, 0, 0, 285, 0, 0, 0, '2022-12-05 12:55:33'),
(37, 42, NULL, 0, 0, 0, 0, 295, 0, 0, 0, '2022-12-05 12:56:11'),
(38, 43, NULL, 0, 0, 0, 0, 368, 0, 1, 0, '2022-12-05 12:57:25'),
(40, 45, NULL, 0, 0, 0, 0, 124, 0, 0, 0, '2022-12-05 12:58:37'),
(41, 46, NULL, 0, 0, 0, 0, 106, 0, 0, 0, '2022-12-05 12:59:17'),
(42, 47, NULL, 0, 0, 0, 0, 18, 0, 0, 0, '2023-02-07 15:19:07'),
(43, 48, NULL, 0, 0, 0, 0, 3, 0, 0, 0, '2023-02-07 15:21:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `level` varchar(20) DEFAULT NULL,
  `created_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `is_active`, `level`, `created_date`) VALUES
(1, 'admin', 'adm123', 1, 'superadmin', '2020-08-15 09:59:43.000000'),
(19, 'risti', '12345', 1, 'admin', '2023-02-20 09:47:11.970624'),
(20, 'atmoko', '12345', 1, 'admin', '2023-02-28 14:28:29.138279');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`id_bobot`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `musim`
--
ALTER TABLE `musim`
  ADD PRIMARY KEY (`id_musim`);

--
-- Indeks untuk tabel `pemain`
--
ALTER TABLE `pemain`
  ADD PRIMARY KEY (`id_pemain`);

--
-- Indeks untuk tabel `pertandingan`
--
ALTER TABLE `pertandingan`
  ADD PRIMARY KEY (`id_pertandingan`),
  ADD KEY `id_musim` (`id_musim`);

--
-- Indeks untuk tabel `proses_hitung`
--
ALTER TABLE `proses_hitung`
  ADD PRIMARY KEY (`id_proses_hitung`);

--
-- Indeks untuk tabel `statistik`
--
ALTER TABLE `statistik`
  ADD PRIMARY KEY (`id_statistik`),
  ADD KEY `id_pemain` (`id_pemain`),
  ADD KEY `id_pertandingan` (`id_pertandingan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bobot`
--
ALTER TABLE `bobot`
  MODIFY `id_bobot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `musim`
--
ALTER TABLE `musim`
  MODIFY `id_musim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pemain`
--
ALTER TABLE `pemain`
  MODIFY `id_pemain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `pertandingan`
--
ALTER TABLE `pertandingan`
  MODIFY `id_pertandingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `proses_hitung`
--
ALTER TABLE `proses_hitung`
  MODIFY `id_proses_hitung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `statistik`
--
ALTER TABLE `statistik`
  MODIFY `id_statistik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pertandingan`
--
ALTER TABLE `pertandingan`
  ADD CONSTRAINT `pertandingan_ibfk_1` FOREIGN KEY (`id_musim`) REFERENCES `musim` (`id_musim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `statistik`
--
ALTER TABLE `statistik`
  ADD CONSTRAINT `statistik_ibfk_1` FOREIGN KEY (`id_pemain`) REFERENCES `pemain` (`id_pemain`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `statistik_ibfk_2` FOREIGN KEY (`id_pertandingan`) REFERENCES `pertandingan` (`id_pertandingan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
