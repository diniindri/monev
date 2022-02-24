-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Waktu pembuatan: 24 Feb 2022 pada 04.45
-- Versi server: 5.7.34
-- Versi PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_monev`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_register`
--

CREATE TABLE `data_register` (
  `id` int(11) NOT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `kdsatker` varchar(6) DEFAULT NULL,
  `kdppk` varchar(2) DEFAULT NULL,
  `nomor` varchar(5) DEFAULT NULL,
  `ekstensi` varchar(64) DEFAULT NULL,
  `tanggal` int(11) DEFAULT NULL,
  `jumlah` int(4) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `total` double(15,0) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `date` varchar(64) DEFAULT NULL,
  `id_dokumen` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `data_register`
--

INSERT INTO `data_register` (`id`, `tahun`, `kdsatker`, `kdppk`, `nomor`, `ekstensi`, `tanggal`, `jumlah`, `status`, `total`, `file`, `date`, `id_dokumen`) VALUES
(17, NULL, NULL, NULL, '0001', '/KN.13/2021', 1644907098, 0, 0, NULL, NULL, NULL, NULL),
(19, NULL, NULL, NULL, '0002', '/KN.13/2021', 1644908375, 1, 1, NULL, NULL, NULL, NULL),
(21, '2021', '411792', NULL, '0001', '/KNKPDJKN/2021', 1644995385, 1, 1, NULL, NULL, NULL, NULL),
(22, '2021', '411792', NULL, '0002', '/KNKPDJKN/2021', 1644998153, 1, 1, NULL, NULL, NULL, NULL),
(23, '2021', '411792', NULL, '0003', '/KNKPDJKN/2021', 1644998223, 1, 2, NULL, NULL, NULL, NULL),
(24, '2022', '411792', NULL, '0003', '/KN.13/2021', 1645099154, 0, 0, NULL, NULL, NULL, NULL),
(27, '2021', '411792', '01', '0006', '/KNKPDJKN/2021', 1645579830, 2, 0, 14000000, 'Ptc9SCLT9yH7tUsgxF4ov6J0PabkAeYYDMGWEvzIVTlGpuQhznXMIEQFBrpoqfV5.pdf', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_register`
--
ALTER TABLE `data_register`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_register`
--
ALTER TABLE `data_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
