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
-- Struktur dari tabel `ref_satker`
--

CREATE TABLE `ref_satker` (
  `id` int(11) NOT NULL,
  `kdsatker` varchar(6) DEFAULT NULL,
  `kdppk` varchar(2) DEFAULT NULL,
  `nmsatker` varchar(128) DEFAULT NULL,
  `header1` varchar(256) DEFAULT NULL,
  `header2` varchar(256) DEFAULT NULL,
  `subheader1` varchar(256) DEFAULT NULL,
  `subheader2` varchar(256) DEFAULT NULL,
  `subheader3` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ref_satker`
--

INSERT INTO `ref_satker` (`id`, `kdsatker`, `kdppk`, `nmsatker`, `header1`, `header2`, `subheader1`, `subheader2`, `subheader3`) VALUES
(1, '411792', '09', 'Kantor Pusat DJKN', 'SEKRETARIAT DIREKTORAT JENDERAL', 'BAGIAN KEUANGAN', 'GEDUNG SYAFRUDIN PRAWIRANEGARA II LANTAI 10 SELATAN', 'JALAN LAPANGAN BANTENG TIMUR NO. 2-4 JAKARTA 10710 KOTAK POS 3169', 'TELP. (021) 3810162 ext.4550 situs: http://www.djkn.kemenkeu.go.id'),
(2, '506050', NULL, 'Kanwil DJKN Aceh', 'Kanwil DJKN Aceh', 'Kanwil DJKN Aceh', NULL, NULL, NULL),
(3, '537827', NULL, 'KPKNL Banda Aceh', 'Kanwil DJKN Aceh', 'KPKNL Banda Aceh', NULL, NULL, NULL),
(4, '506069', NULL, 'KPKNL Lhokseumawe', 'Kanwil DJKN Aceh', 'KPKNL Lhokseumawe', NULL, NULL, NULL),
(5, '411806', NULL, 'Kanwil DJKN Sumatera Utara', 'Kanwil DJKN Sumatera Utara', '', NULL, NULL, NULL),
(6, '537831', NULL, 'KPKNL Medan', 'Kanwil DJKN Sumatera Utara', 'KPKNL Medan', NULL, NULL, NULL),
(7, '119703', NULL, 'KPKNL Pematang Siantar', 'Kanwil DJKN Sumatera Utara', 'KPKNL Pematang Siantar', NULL, NULL, NULL),
(8, '506081', NULL, 'KPKNL Kisaran', 'Kanwil DJKN Sumatera Utara', 'KPKNL Kisaran', NULL, NULL, NULL),
(9, '506090', NULL, 'KPKNL Padang Sidimpuan', 'Kanwil DJKN Sumatera Utara', 'KPKNL Padang Sidimpuan', NULL, NULL, NULL),
(10, '506101', NULL, 'Kanwil DJKN Riau, Sumatera Barat, dan Kepulauan Riau', 'KANTOR WILAYAH PROVINSI RIAU, SUMBAR, DAN KEPRI', '', 'Gedung Keuangan Negara', 'Jalan Pepaya No. 5 Pekanbaru, Riau', 'email: kanwilpekanbaru@kemenkeu.go.id Telp: 021-1331311'),
(11, '537848', NULL, 'KPKNL Padang', 'Kanwil DJKN Riau, Sumatera Barat, dan Kepulauan Riau', 'KPKNL Padang', NULL, NULL, NULL),
(12, '119745', NULL, 'KPKNL Bukittinggi', 'Kanwil DJKN Riau, Sumatera Barat, dan Kepulauan Riau', 'KPKNL Bukittinggi', NULL, NULL, NULL),
(13, '537852', NULL, 'KPKNL Pekanbaru', 'Kanwil DJKN Riau, Sumatera Barat, dan Kepulauan Riau', 'KPKNL Pekanbaru', NULL, NULL, NULL),
(14, '119656', NULL, 'KPKNL Batam', 'Kanwil DJKN Riau, Sumatera Barat, dan Kepulauan Riau', 'KPKNL Batam', NULL, NULL, NULL),
(15, '506461', NULL, 'KPKNL Dumai', 'Kanwil DJKN Riau, Sumatera Barat, dan Kepulauan Riau', 'KPKNL Dumai', NULL, NULL, NULL),
(16, '537880', NULL, 'Kanwil DJKN Sumatera Selatan, Jambi, dan Bangka Belitung', 'Kanwil DJKN Sumatera Selatan, Jambi, dan Bangka Belitung', '', NULL, NULL, NULL),
(17, '537873', NULL, 'KPKNL Jambi', 'Kanwil DJKN Sumatera Selatan, Jambi, dan Bangka Belitung', 'KPKNL Jambi', NULL, NULL, NULL),
(18, '537894', NULL, 'KPKNL Palembang', 'Kanwil DJKN Sumatera Selatan, Jambi, dan Bangka Belitung', 'KPKNL Palembang', NULL, NULL, NULL),
(19, '506126', NULL, 'KPKNL Lahat', 'Kanwil DJKN Sumatera Selatan, Jambi, dan Bangka Belitung', 'KPKNL Lahat', NULL, NULL, NULL),
(20, '119809', NULL, 'KPKNL Pangkal Pinang', 'Kanwil DJKN Sumatera Selatan, Jambi, dan Bangka Belitung', 'KPKNL Pangkal Pinang', NULL, NULL, NULL),
(21, '506142', NULL, 'Kanwil DJKN Lampung dan Bengkulu', 'Kanwil DJKN Lampung dan Bengkulu', '', NULL, NULL, NULL),
(22, '538154', NULL, 'KPKNL Bengkulu', 'Kanwil DJKN Lampung dan Bengkulu', 'KPKNL Bengkulu', NULL, NULL, NULL),
(23, '537902', NULL, 'KPKNL Bandar Lampung', 'Kanwil DJKN Lampung dan Bengkulu', 'KPKNL Bandar Lampung', NULL, NULL, NULL),
(24, '506157', NULL, 'KPKNL Metro', 'Kanwil DJKN Lampung dan Bengkulu', 'KPKNL Metro', NULL, NULL, NULL),
(25, '506172', NULL, 'Kanwil DJKN Banten', 'Kanwil DJKN Banten', '', NULL, NULL, NULL),
(26, '119724', NULL, 'KPKNL Serang', 'Kanwil DJKN Banten', 'KPKNL Serang', NULL, NULL, NULL),
(27, '506188', NULL, 'KPKNL Tangerang I', 'Kanwil DJKN Banten', 'KPKNL Tangerang I', NULL, NULL, NULL),
(28, '506194', NULL, 'KPKNL Tangerang II', 'Kanwil DJKN Banten', 'KPKNL Tangerang II', NULL, NULL, NULL),
(29, '411852', NULL, 'Kanwil DJKN DKI Jakarta', 'Kanwil DJKN DKI Jakarta', '', NULL, NULL, NULL),
(30, '537721', NULL, 'KPKNL Jakarta I', 'Kanwil DJKN DKI Jakarta', 'KPKNL Jakarta I', NULL, NULL, NULL),
(31, '604442', NULL, 'KPKNL Jakarta II', 'Kanwil DJKN DKI Jakarta', 'KPKNL Jakarta II', NULL, NULL, NULL),
(32, '537916', NULL, 'KPKNL Jakarta III', 'Kanwil DJKN DKI Jakarta', 'KPKNL Jakarta III', NULL, NULL, NULL),
(33, '537937', NULL, 'KPKNL Jakarta IV', 'Kanwil DJKN DKI Jakarta', 'KPKNL Jakarta IV', NULL, NULL, NULL),
(34, '119312', NULL, 'KPKNL Jakarta V', 'Kanwil DJKN DKI Jakarta', 'KPKNL Jakarta V', NULL, NULL, NULL),
(35, '411812', NULL, 'Kanwil DJKN Jawa Barat', 'Kanwil DJKN Jawa Barat', '', NULL, NULL, NULL),
(36, '537738', NULL, 'KPKNL Bandung', 'Kanwil DJKN Jawa Barat', 'KPKNL Bandung', NULL, NULL, NULL),
(37, '604460', NULL, 'KPKNL Bekasi', 'Kanwil DJKN Jawa Barat', 'KPKNL Bekasi', NULL, NULL, NULL),
(38, '537759', NULL, 'KPKNL Bogor', 'Kanwil DJKN Jawa Barat', 'KPKNL Bogor', NULL, NULL, NULL),
(39, '506208', NULL, 'KPKNL Purwakarta', 'Kanwil DJKN Jawa Barat', 'KPKNL Purwakarta', NULL, NULL, NULL),
(40, '525343', NULL, 'KPKNL Tasikmalaya', 'Kanwil DJKN Jawa Barat', 'KPKNL Tasikmalaya', NULL, NULL, NULL),
(41, '119393', NULL, 'KPKNL Cirebon', 'Kanwil DJKN Jawa Barat', 'KPKNL Cirebon', NULL, NULL, NULL),
(42, '411821', NULL, 'Kanwil DJKN Jawa Tengah dan D.I. Yogyakarta', 'Kanwil DJKN Jawa Tengah dan D.I. Yogyakarta', '', NULL, NULL, NULL),
(43, '537763', NULL, 'KPKNL Semarang', 'Kanwil DJKN Jawa Tengah dan D.I. Yogyakarta', 'KPKNL Semarang', NULL, NULL, NULL),
(44, '119511', NULL, 'KPKNL Surakarta', 'Kanwil DJKN Jawa Tengah dan D.I. Yogyakarta', 'KPKNL Surakarta', NULL, NULL, NULL),
(45, '506239', NULL, 'KPKNL Pekalongan', 'Kanwil DJKN Jawa Tengah dan D.I. Yogyakarta', 'KPKNL Pekalongan', NULL, NULL, NULL),
(46, '411786', NULL, 'KPKNL Tegal', 'Kanwil DJKN Jawa Tengah dan D.I. Yogyakarta', 'KPKNL Tegal', NULL, NULL, NULL),
(47, '537784', NULL, 'KPKNL Yogyakarta', 'Kanwil DJKN Jawa Tengah dan D.I. Yogyakarta', 'KPKNL Yogyakarta', NULL, NULL, NULL),
(48, '537770', NULL, 'KPKNL Purwokerto', 'Kanwil DJKN Jawa Tengah dan D.I. Yogyakarta', 'KPKNL Purwokerto', NULL, NULL, NULL),
(49, '411837', NULL, 'Kanwil DJKN Jawa Timur', 'Kanwil DJKN Jawa Timur', '', NULL, NULL, NULL),
(50, '537791', NULL, 'KPKNL Surabaya', 'Kanwil DJKN Jawa Timur', 'KPKNL Surabaya', NULL, NULL, NULL),
(51, '506276', NULL, 'KPKNL Sidoarjo', 'Kanwil DJKN Jawa Timur', 'KPKNL Sidoarjo', NULL, NULL, NULL),
(52, '537810', NULL, 'KPKNL Malang', 'Kanwil DJKN Jawa Timur', 'KPKNL Malang', NULL, NULL, NULL),
(53, '538140', NULL, 'KPKNL Jember', 'Kanwil DJKN Jawa Timur', 'KPKNL Jember', NULL, NULL, NULL),
(54, '506282', NULL, 'KPKNL Pamekasan', 'Kanwil DJKN Jawa Timur', 'KPKNL Pamekasan', NULL, NULL, NULL),
(55, '537920', NULL, 'KPKNL Madiun', 'Kanwil DJKN Jawa Timur', 'KPKNL Madiun', NULL, NULL, NULL),
(56, '506291', NULL, 'Kanwil DJKN Kalimantan Barat', 'Kanwil DJKN Kalimantan Barat', '', NULL, NULL, NULL),
(57, '604456', NULL, 'KPKNL Pontianak', 'Kanwil DJKN Kalimantan Barat', 'KPKNL Pontianak', NULL, NULL, NULL),
(58, '506302', NULL, 'KPKNL Singkawang', 'Kanwil DJKN Kalimantan Barat', 'KPKNL Singkawang', NULL, NULL, NULL),
(59, '506327', NULL, 'Kanwil DJKN Kalimantan Selatan dan Tengah', 'Kanwil DJKN Kalimantan Selatan dan Tengah', '', NULL, NULL, NULL),
(60, '119834', NULL, 'KPKNL Palangka Raya', 'Kanwil DJKN Kalimantan Selatan dan Tengah', 'KPKNL Palangka Raya', NULL, NULL, NULL),
(61, '506333', NULL, 'KPKNL Pangkalan Bun', 'Kanwil DJKN Kalimantan Selatan dan Tengah', 'KPKNL Pangkalan Bun', NULL, NULL, NULL),
(62, '537958', NULL, 'KPKNL Banjarmasin', 'Kanwil DJKN Kalimantan Selatan dan Tengah', 'KPKNL Banjarmasin', NULL, NULL, NULL),
(63, '506358', NULL, 'Kanwil DJKN Kalimantan Timur dan Utara', 'Kanwil DJKN Kalimantan Timur dan Utara', '', NULL, NULL, NULL),
(64, '537962', NULL, 'KPKNL Balikpapan', 'Kanwil DJKN Kalimantan Timur dan Utara', 'KPKNL Balikpapan', NULL, NULL, NULL),
(65, '537941', NULL, 'KPKNL Samarinda', 'Kanwil DJKN Kalimantan Timur dan Utara', 'KPKNL Samarinda', NULL, NULL, NULL),
(66, '506364', NULL, 'KPKNL Tarakan', 'Kanwil DJKN Kalimantan Timur dan Utara', 'KPKNL Tarakan', NULL, NULL, NULL),
(67, '506370', NULL, 'KPKNL Bontang', 'Kanwil DJKN Kalimantan Timur dan Utara', 'KPKNL Bontang', NULL, NULL, NULL),
(68, '538051', NULL, 'Kanwil DJKN Bali dan Nusa Tenggara', 'Kanwil DJKN Bali dan Nusa Tenggara', '', NULL, NULL, NULL),
(69, '538065', NULL, 'KPKNL Denpasar', 'Kanwil DJKN Bali dan Nusa Tenggara', 'KPKNL Denpasar', NULL, NULL, NULL),
(70, '525591', NULL, 'KPKNL Singaraja', 'Kanwil DJKN Bali dan Nusa Tenggara', 'KPKNL Singaraja', NULL, NULL, NULL),
(71, '538086', NULL, 'KPKNL Mataram', 'Kanwil DJKN Bali dan Nusa Tenggara', 'KPKNL Mataram', NULL, NULL, NULL),
(72, '538072', NULL, 'KPKNL Bima', 'Kanwil DJKN Bali dan Nusa Tenggara', 'KPKNL Bima', NULL, NULL, NULL),
(73, '538108', NULL, 'KPKNL Kupang', 'Kanwil DJKN Bali dan Nusa Tenggara', 'KPKNL Kupang', NULL, NULL, NULL),
(74, '411843', NULL, 'Kanwil DJKN Sulawesi Selatan, Tenggara, dan Barat', 'Kanwil DJKN Sulawesi Selatan, Tenggara, dan Barat', '', NULL, NULL, NULL),
(75, '538019', NULL, 'KPKNL Makassar', 'Kanwil DJKN Sulawesi Selatan, Tenggara, dan Barat', 'KPKNL Makassar', NULL, NULL, NULL),
(76, '538190', NULL, 'KPKNL Pare-Pare', 'Kanwil DJKN Sulawesi Selatan, Tenggara, dan Barat', 'KPKNL Pare-Pare', NULL, NULL, NULL),
(77, '119944', NULL, 'KPKNL Palopo', 'Kanwil DJKN Sulawesi Selatan, Tenggara, dan Barat', 'KPKNL Palopo', NULL, NULL, NULL),
(78, '538030', NULL, 'KPKNL Kendari', 'Kanwil DJKN Sulawesi Selatan, Tenggara, dan Barat', 'KPKNL Kendari', NULL, NULL, NULL),
(79, '418495', NULL, 'KPKNL Mamuju', 'Kanwil DJKN Sulawesi Selatan, Tenggara, dan Barat', 'KPKNL Mamuju', NULL, NULL, NULL),
(80, '537979', NULL, 'Kanwil DJKN Sulawesi Utara, Tengah, Gorontalo, dan Maluku Utara', 'KANWIL DJKN SULAWESI UTARA, TENGAH, GORONTALO, dan MALUKU UTARA', '', 'GEDUNG SYAFRUDIN PRAWIRANEGARA II LANTAI 10 SELATAN', 'JALAN LAPANGAN BANTENG TIMUR NO. 2-4 JAKARTA 10710 KOTAK POS 3169', 'TELP. (021) 3810162 ext.4550 situs: http://www.djkn.kemenkeu.go.id'),
(81, '538023', NULL, 'KPKNL Gorontalo', 'KANWIL DJKN SULAWESI UTARA, TENGAH, GORONTALO, dan MALUKU UTARA', 'KPKNL GORONTALO', '', '', ''),
(82, '538002', NULL, 'KPKNL Palu', 'Kanwil DJKN Sulawesi Selatan, Tenggara, dan Barat', 'KPKNL Palu', NULL, NULL, NULL),
(83, '538133', NULL, 'KPKNL Ternate', 'Kanwil DJKN Sulawesi Utara, Tengah, Gorontalo, dan Maluku Utara', 'KPKNL Ternate', NULL, NULL, NULL),
(84, '537983', NULL, 'KPKNL Manado', 'Kanwil DJKN Sulawesi Utara, Tengah, Gorontalo, dan Maluku Utara', 'KPKNL Manado', NULL, NULL, NULL),
(85, '506409', NULL, 'Kanwil DJKN Papua, Papua Barat, dan Maluku', 'Kanwil DJKN Papua, Papua Barat, dan Maluku', '', NULL, NULL, NULL),
(86, '538129', NULL, 'KPKNL Jayapura', 'Kanwil DJKN Papua, Papua Barat, dan Maluku', 'KPKNL Jayapura', NULL, NULL, NULL),
(87, '537990', NULL, 'KPKNL Sorong', 'Kanwil DJKN Papua, Papua Barat, dan Maluku', 'KPKNL Sorong', NULL, NULL, NULL),
(88, '525474', NULL, 'KPKNL Biak', 'Kanwil DJKN Papua, Papua Barat, dan Maluku', 'KPKNL Biak', NULL, NULL, NULL),
(89, '538044', NULL, 'KPKNL Ambon', 'Kanwil DJKN Papua, Papua Barat, dan Maluku', 'KPKNL Ambon', NULL, NULL, NULL),
(90, '604445', NULL, 'Lembaga Manajemen Aset Negara', 'Lembaga Manajemen Aset Negara', 'Lembaga Manajemen Aset Negara', NULL, NULL, NULL),
(91, '411792', '01', 'Kantor Pusat DJKN', 'DIREKTORAT BARANG MILIK NEGARA', '', 'GEDUNG SYAFRUDIN PRAWIRANEGARA II LANTAI 10 SELATAN', 'JALAN LAPANGAN BANTENG TIMUR NO. 2-4 JAKARTA 10710 KOTAK POS 3169', 'TELP. (021) 3810162 ext.4550 situs: http://www.djkn.kemenkeu.go.id');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ref_satker`
--
ALTER TABLE `ref_satker`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ref_satker`
--
ALTER TABLE `ref_satker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
