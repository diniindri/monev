-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 27, 2021 at 08:19 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `data_dnp`
--

CREATE TABLE `data_dnp` (
  `id` int(11) NOT NULL,
  `tagihan_id` int(11) DEFAULT NULL,
  `nip` varchar(18) DEFAULT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `kdgol` varchar(2) DEFAULT NULL,
  `bruto` double(10,0) DEFAULT NULL,
  `pph` double(10,0) DEFAULT NULL,
  `netto` double(10,0) DEFAULT NULL,
  `rekening` varchar(20) DEFAULT NULL,
  `nmbank` varchar(64) DEFAULT NULL,
  `nmrek` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `data_realisasi`
--

CREATE TABLE `data_realisasi` (
  `id` int(11) NOT NULL,
  `program` varchar(2) DEFAULT NULL,
  `kegiatan` varchar(4) DEFAULT NULL,
  `kro` varchar(3) DEFAULT NULL,
  `ro` varchar(3) DEFAULT NULL,
  `komponen` varchar(3) DEFAULT NULL,
  `subkomponen` varchar(1) DEFAULT NULL,
  `akun` varchar(6) DEFAULT NULL,
  `realisasi` double(10,0) DEFAULT NULL,
  `kdsatker` varchar(6) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `tagihan_id` int(11) DEFAULT NULL,
  `kdppk` varchar(2) DEFAULT NULL,
  `kdunit` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `data_tagihan`
--

CREATE TABLE `data_tagihan` (
  `id` int(11) NOT NULL,
  `notagihan` varchar(5) DEFAULT NULL,
  `jnstagihan` varchar(6) DEFAULT NULL,
  `kdunit` varchar(2) DEFAULT NULL,
  `kddokumen` varchar(2) DEFAULT NULL,
  `kdppk` varchar(2) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `tgltagihan` int(11) DEFAULT NULL,
  `bruto` double(10,0) DEFAULT NULL,
  `tglspm` int(11) DEFAULT NULL,
  `tglsp2d` int(11) DEFAULT NULL,
  `nosp2d` varchar(15) DEFAULT NULL,
  `kdsatker` varchar(6) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `uraian` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `data_upload`
--

CREATE TABLE `data_upload` (
  `id` int(11) NOT NULL,
  `tagihan_id` int(11) DEFAULT NULL,
  `kdberkas` varchar(2) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `file` varchar(128) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ref_bendahara`
--

CREATE TABLE `ref_bendahara` (
  `id` int(11) NOT NULL,
  `kdsatker` varchar(6) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `nmbendahara` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ref_bendahara`
--

INSERT INTO `ref_bendahara` (`id`, `kdsatker`, `tahun`, `nmbendahara`) VALUES
(1, '411792', '2021', 'Cahyo Pambudi');

-- --------------------------------------------------------

--
-- Table structure for table `ref_berkas`
--

CREATE TABLE `ref_berkas` (
  `id` int(11) NOT NULL,
  `kdberkas` varchar(2) DEFAULT NULL,
  `nmberkas` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ref_berkas`
--

INSERT INTO `ref_berkas` (`id`, `kdberkas`, `nmberkas`) VALUES
(1, '01', 'SPP/SPBy'),
(2, '02', 'Berkas Pendukung SPP/SPBy'),
(3, '03', 'SPM'),
(4, '04', 'SSP'),
(5, '05', 'Bukti Payroll');

-- --------------------------------------------------------

--
-- Table structure for table `ref_dokumen`
--

CREATE TABLE `ref_dokumen` (
  `id` int(11) NOT NULL,
  `kddokumen` varchar(2) DEFAULT NULL,
  `nmdokumen` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ref_dokumen`
--

INSERT INTO `ref_dokumen` (`id`, `kddokumen`, `nmdokumen`, `status`) VALUES
(2, '01', 'Perjadin', 0),
(3, '02', 'Honor', 0),
(4, '03', 'Biaya Pulsa', 0),
(5, '04', 'Kontraktual', 0),
(6, '05', 'Non Kontraktual', 0),
(7, '06', 'PPNPN', 0),
(8, '07', 'Gaji', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ref_nondjkn`
--

CREATE TABLE `ref_nondjkn` (
  `id` int(11) NOT NULL,
  `tagihan_id` int(11) DEFAULT NULL,
  `nip` varchar(18) DEFAULT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `kdgol` varchar(2) DEFAULT NULL,
  `bruto` double(10,0) DEFAULT NULL,
  `pph` double(10,0) DEFAULT NULL,
  `netto` double(10,0) DEFAULT NULL,
  `rekening` varchar(20) DEFAULT NULL,
  `nmbank` varchar(64) DEFAULT NULL,
  `nmrek` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ref_nondjkn`
--

INSERT INTO `ref_nondjkn` (`id`, `tagihan_id`, `nip`, `nama`, `kdgol`, `bruto`, `pph`, `netto`, `rekening`, `nmbank`, `nmrek`) VALUES
(1, NULL, '198701142012022005', 'Dini Indri', '32', NULL, NULL, NULL, '0133232332', 'BNI', 'Dini Indri');

-- --------------------------------------------------------

--
-- Table structure for table `ref_pagu`
--

CREATE TABLE `ref_pagu` (
  `id` int(11) NOT NULL,
  `program` varchar(2) DEFAULT NULL,
  `kegiatan` varchar(4) DEFAULT NULL,
  `kro` varchar(3) DEFAULT NULL,
  `ro` varchar(3) DEFAULT NULL,
  `komponen` varchar(3) DEFAULT NULL,
  `subkomponen` varchar(1) DEFAULT NULL,
  `akun` varchar(6) DEFAULT NULL,
  `anggaran` double(10,0) DEFAULT NULL,
  `kdsatker` varchar(6) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `kdppk` varchar(2) DEFAULT NULL,
  `kdunit` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ref_pph`
--

CREATE TABLE `ref_pph` (
  `id` int(11) NOT NULL,
  `kdgol` varchar(1) DEFAULT NULL,
  `tarifpph` decimal(2,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ref_pph`
--

INSERT INTO `ref_pph` (`id`, `kdgol`, `tarifpph`) VALUES
(1, '1', '0.00'),
(2, '2', '0.00'),
(3, '3', '0.05'),
(4, '4', '0.15');

-- --------------------------------------------------------

--
-- Table structure for table `ref_ppk`
--

CREATE TABLE `ref_ppk` (
  `id` int(11) NOT NULL,
  `kdppk` varchar(2) DEFAULT NULL,
  `nmppk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ref_ppk`
--

INSERT INTO `ref_ppk` (`id`, `kdppk`, `nmppk`) VALUES
(1, '01', 'Wielly Prasekti'),
(2, '02', 'Nandang Supriyadi'),
(3, '03', 'Eny Susanti'),
(4, '04', 'Anwar Sulaiman'),
(5, '05', 'Yuzuardi Haban'),
(6, '06', 'Abdul Ghofar'),
(7, '07', 'Jundi Widiantoro'),
(8, '08', 'Iwan Darma'),
(9, '09', 'Mufid Hamdani'),
(10, '10', 'Lilik Hermawan'),
(11, '11', 'Bagus Kurniawan'),
(12, '12', 'Kiki Nurman'),
(13, '13', 'Moh. Arif Rochman'),
(14, '14', 'R. Hariyadi Murti Kurniawan'),
(15, '15', 'Eko Hardiyanto'),
(16, '16', 'Wahyu Setiadi');

-- --------------------------------------------------------

--
-- Table structure for table `ref_satker`
--

CREATE TABLE `ref_satker` (
  `id` int(11) NOT NULL,
  `kdsatker` varchar(6) DEFAULT NULL,
  `nmsatker` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ref_satker`
--

INSERT INTO `ref_satker` (`id`, `kdsatker`, `nmsatker`) VALUES
(1, '119312', 'KPKNL Jakarta V'),
(2, '119393', 'KPKNL Cirebon'),
(3, '119511', 'KPKNL Surakarta'),
(4, '119656', 'KPKNL Batam'),
(5, '119703', 'KPKNL Pematang Siantar'),
(6, '119724', 'KPKNL Serang'),
(7, '119745', 'KPKNL Bukittinggi'),
(8, '119809', 'KPKNL Pangkal Pinang'),
(9, '119834', 'KPKNL Palangkaraya'),
(10, '119944', 'KPKNL Palopo'),
(11, '411786', 'KPKNL Tegal'),
(12, '411792', 'Kantor Pusat DJKN'),
(13, '411806', 'Kantor Wilayah DJKN Sumatera Utara'),
(14, '411812', 'Kantor Wilayah DJKN Jawa Barat'),
(15, '411821', 'Kantor Wilayah DJKN Jawa Tengah dan Daerah Istimewa Yogyakarta'),
(16, '411837', 'Kantor Wilayah DJKN Jawa Timur'),
(17, '411843', 'Kantor Wilayah DJKN Sulawesi Selatan, Tenggara, dan Barat'),
(18, '411852', 'Kantor Wilayah DJKN DKI Jakarta'),
(19, '418495', 'KPKNL Mamuju'),
(20, '506050', 'Kantor Wilayah DJKN Aceh'),
(21, '506069', 'KPKNL Lhokseumawe'),
(22, '506081', 'KPKNL Kisaran'),
(23, '506090', 'KPKNL Padang Sidempuan'),
(24, '506101', 'Kantor Wilayah DJKN Riau, Sumatera Barat dan Kepulauan Riau'),
(25, '506126', 'KPKNL Lahat'),
(26, '506142', 'Kantor Wilayah DJKN Lampung dan Bengkulu'),
(27, '506157', 'KPKNL Metro'),
(28, '506172', 'Kantor Wilayah DJKN Banten'),
(29, '506188', 'KPKNL Tangerang I'),
(30, '506194', 'KPKNL Tangerang II'),
(31, '506208', 'KPKNL Purwakarta'),
(32, '506239', 'KPKNL Pekalongan'),
(33, '506276', 'KPKNL Sidoarjo'),
(34, '506282', 'KPKNL Pamekasan'),
(35, '506291', 'Kantor Wilayah DJKN Kalimantan Barat'),
(36, '506302', 'KPKNL Singkawang'),
(37, '506327', 'Kantor Wilayah DJKN Kalimantan Selatan dan Tengah'),
(38, '506333', 'KPKNL Pangkalan Bun'),
(39, '506358', 'Kantor Wilayah DJKN Kalimantan Timur dan Utara'),
(40, '506364', 'KPKNL Tarakan'),
(41, '506370', 'KPKNL Bontang'),
(42, '506409', 'Kantor Wilayah DJKN Papua dan Maluku'),
(43, '506461', 'KPKNL Dumai'),
(44, '525343', 'KPKNL Tasikmalaya'),
(45, '525474', 'KPKNL Biak'),
(46, '525591', 'KPKNL Singaraja'),
(47, '537721', 'KPKNL Jakarta I'),
(48, '537738', 'KPKNL Bandung'),
(49, '537759', 'KPKNL Bogor'),
(50, '537763', 'KPKNL Semarang'),
(51, '537770', 'KPKNL Purwokerto'),
(52, '537784', 'KPKNL Yogyakarta'),
(53, '537791', 'KPKNL Surabaya'),
(54, '537810', 'KPKNL Malang'),
(55, '537827', 'KPKNL Banda Aceh'),
(56, '537831', 'KPKNL Medan'),
(57, '537848', 'KPKNL Padang'),
(58, '537852', 'KPKNL Pekanbaru'),
(59, '537873', 'KPKNL Jambi'),
(60, '537880', 'Kantor Wilayah DJKN Sumatera Selatan, Jambi dan Bangka Belitung'),
(61, '537894', 'KPKNL Palembang'),
(62, '537902', 'KPKNL Bandar Lampung'),
(63, '537916', 'KPKNL Jakarta III'),
(64, '537920', 'KPKNL Madiun'),
(65, '537937', 'KPKNL Jakarta IV'),
(66, '537941', 'KPKNL Samarinda'),
(67, '537958', 'KPKNL Banjarmasin'),
(68, '537962', 'KPKNL Balikpapan'),
(69, '537979', 'Kantor Wilayah DJKN Sulawesi Utara, Tengah, Gorontalo, dan Maluku Utara'),
(70, '537983', 'KPKNL Manado'),
(71, '537990', 'KPKNL Sorong'),
(72, '538002', 'KPKNL Palu'),
(73, '538019', 'KPKNL Makassar'),
(74, '538023', 'KPKNL Gorontalo'),
(75, '538030', 'KPKNL Kendari'),
(76, '538044', 'KPKNL Ambon'),
(77, '538051', 'Kantor Wilayah DJKN Bali dan Nusa Tenggara'),
(78, '538065', 'KPKNL Denpasar'),
(79, '538072', 'KPKNL Bima'),
(80, '538086', 'KPKNL Mataram'),
(81, '538108', 'KPKNL Kupang'),
(82, '538129', 'KPKNL Jayapura'),
(83, '538133', 'KPKNL Ternate'),
(84, '538140', 'KPKNL Jember'),
(85, '538154', 'KPKNL Bengkulu'),
(86, '538190', 'KPKNL Parepare'),
(87, '604442', 'KPKNL Jakarta II'),
(88, '604445', 'Lembaga Manajemen Aset Negara'),
(89, '604456', 'KPKNL Pontianak'),
(90, '604460', 'KPKNL Bekasi');

-- --------------------------------------------------------

--
-- Table structure for table `ref_tahun`
--

CREATE TABLE `ref_tahun` (
  `id` int(11) NOT NULL,
  `tahun` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ref_tahun`
--

INSERT INTO `ref_tahun` (`id`, `tahun`) VALUES
(2, '2021'),
(3, '2022');

-- --------------------------------------------------------

--
-- Table structure for table `ref_unit`
--

CREATE TABLE `ref_unit` (
  `id` int(11) NOT NULL,
  `kdunit` varchar(2) DEFAULT NULL,
  `nmunit` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ref_unit`
--

INSERT INTO `ref_unit` (`id`, `kdunit`, `nmunit`) VALUES
(1, '10', 'BMN'),
(2, '20', 'HUHU'),
(3, '30', 'KND'),
(4, '40', 'PKNSI'),
(5, '50', 'LELANG'),
(6, '60', 'PENILAIAN'),
(7, '70', 'PNKNL'),
(8, '80', 'SEKRETARIAT'),
(9, '81', 'KEUANGAN'),
(10, '82', 'KEPEGAWAIAN'),
(11, '83', 'OKI'),
(12, '84', 'PERLENGKAPAN'),
(13, '85', 'UMUM');

-- --------------------------------------------------------

--
-- Table structure for table `ref_users`
--

CREATE TABLE `ref_users` (
  `id` int(11) NOT NULL,
  `nip` varchar(18) DEFAULT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  `kdppk` varchar(2) DEFAULT NULL,
  `kdsatker` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_users`
--

INSERT INTO `ref_users` (`id`, `nip`, `nama`, `email`, `password`, `is_active`, `date_created`, `kdppk`, `kdsatker`) VALUES
(4, '198407022003121004', 'Dana Kristiawan', 'danakristiawan@gmail.com', '$2y$10$sXhTMQL3BG6/u5LOKUeYgeVil3jjJOIvwHvR5FRP2O22dTMyeHYWy', 1, 1638797758, '01', '411852'),
(6, '198801142014022005', 'Dini Indri Irianti', 'dinindririanti@gmail.com', '$2y$10$smm8hlRgpVmmhXHrwTc.GOhbTTRJfUV1ivvTQuFHmuiWl3QwVxpj.', 1, 1640569127, '01', '411792'),
(8, '199212012014112002', 'Nur Ayu Saraswati', 'nurayu@gmail.com', '$2y$10$22WH1LN/htdqWbvuSosxuu.9lU6n2x0u6r7lebHnQ1Mx7Uhta6Tui', 1, 1638797791, '02', '119393');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pagu`
-- (See below for the actual view)
--
CREATE TABLE `view_pagu` (
`id` int(11)
,`program` varchar(2)
,`kegiatan` varchar(4)
,`kro` varchar(3)
,`ro` varchar(3)
,`komponen` varchar(3)
,`subkomponen` varchar(1)
,`akun` varchar(6)
,`anggaran` double(10,0)
,`kdsatker` varchar(6)
,`tahun` varchar(4)
,`kdppk` varchar(2)
,`kdunit` varchar(2)
,`kode` varchar(16)
,`realisasi` double(17,0)
,`sisa` double(17,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_realisasi`
-- (See below for the actual view)
--
CREATE TABLE `view_realisasi` (
`program` varchar(2)
,`kegiatan` varchar(4)
,`kro` varchar(3)
,`ro` varchar(3)
,`komponen` varchar(3)
,`subkomponen` varchar(1)
,`akun` varchar(6)
,`tahun` varchar(4)
,`kdppk` varchar(2)
,`kdunit` varchar(2)
,`kdsatker` varchar(6)
,`realisasi` double(17,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_sisa`
-- (See below for the actual view)
--
CREATE TABLE `view_sisa` (
`id` int(11)
,`program` varchar(2)
,`kegiatan` varchar(4)
,`kro` varchar(3)
,`ro` varchar(3)
,`komponen` varchar(3)
,`subkomponen` varchar(1)
,`akun` varchar(6)
,`realisasi` double(10,0)
,`kdsatker` varchar(6)
,`tahun` varchar(4)
,`tagihan_id` int(11)
,`kdppk` varchar(2)
,`kdunit` varchar(2)
,`sisa` double(17,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_spby`
-- (See below for the actual view)
--
CREATE TABLE `view_spby` (
`id` int(11)
,`notagihan` varchar(5)
,`jnstagihan` varchar(6)
,`kdunit` varchar(2)
,`kddokumen` varchar(2)
,`kdppk` varchar(2)
,`status` int(1)
,`tgltagihan` int(11)
,`bruto` double(10,0)
,`tglspm` int(11)
,`tglsp2d` int(11)
,`nosp2d` varchar(15)
,`kdsatker` varchar(6)
,`tahun` varchar(4)
,`uraian` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_spp`
-- (See below for the actual view)
--
CREATE TABLE `view_spp` (
`id` int(11)
,`notagihan` varchar(5)
,`jnstagihan` varchar(6)
,`kdunit` varchar(2)
,`kddokumen` varchar(2)
,`kdppk` varchar(2)
,`status` int(1)
,`tgltagihan` int(11)
,`bruto` double(10,0)
,`tglspm` int(11)
,`tglsp2d` int(11)
,`nosp2d` varchar(15)
,`kdsatker` varchar(6)
,`tahun` varchar(4)
,`uraian` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_tagihan`
-- (See below for the actual view)
--
CREATE TABLE `view_tagihan` (
`id` int(11)
,`notagihan` varchar(5)
,`jnstagihan` varchar(6)
,`kdunit` varchar(2)
,`kddokumen` varchar(2)
,`tgltagihan` int(11)
,`bruto` double(10,0)
,`status` int(1)
,`tglspm` int(11)
,`tglsp2d` int(11)
,`nosp2d` varchar(15)
,`kdsatker` varchar(6)
,`kdppk` varchar(2)
,`tahun` varchar(4)
,`uraian` varchar(255)
,`nmunit` varchar(255)
,`nmdokumen` varchar(255)
,`nmppk` varchar(255)
,`nmbendahara` varchar(128)
);

-- --------------------------------------------------------

--
-- Structure for view `view_pagu`
--
DROP TABLE IF EXISTS `view_pagu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pagu`  AS  select `a`.`id` AS `id`,`a`.`program` AS `program`,`a`.`kegiatan` AS `kegiatan`,`a`.`kro` AS `kro`,`a`.`ro` AS `ro`,`a`.`komponen` AS `komponen`,`a`.`subkomponen` AS `subkomponen`,`a`.`akun` AS `akun`,`a`.`anggaran` AS `anggaran`,`a`.`kdsatker` AS `kdsatker`,`a`.`tahun` AS `tahun`,`a`.`kdppk` AS `kdppk`,`a`.`kdunit` AS `kdunit`,concat(`a`.`kegiatan`,`a`.`kro`,`a`.`ro`,`a`.`akun`) AS `kode`,if(isnull(`b`.`realisasi`),0,`b`.`realisasi`) AS `realisasi`,(`a`.`anggaran` - if(isnull(`b`.`realisasi`),0,`b`.`realisasi`)) AS `sisa` from (`ref_pagu` `a` left join `view_realisasi` `b` on(((`a`.`program` = `b`.`program`) and (`a`.`kegiatan` = `b`.`kegiatan`) and (`a`.`kro` = `b`.`kro`) and (`a`.`ro` = `b`.`ro`) and (`a`.`komponen` = `b`.`komponen`) and (`a`.`subkomponen` = `b`.`subkomponen`) and (`a`.`akun` = `b`.`akun`) and (`a`.`tahun` = `b`.`tahun`) and (`a`.`kdppk` = `b`.`kdppk`) and (`a`.`kdunit` = `b`.`kdunit`) and (`a`.`kdsatker` = `b`.`kdsatker`)))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_realisasi`
--
DROP TABLE IF EXISTS `view_realisasi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_realisasi`  AS  select `data_realisasi`.`program` AS `program`,`data_realisasi`.`kegiatan` AS `kegiatan`,`data_realisasi`.`kro` AS `kro`,`data_realisasi`.`ro` AS `ro`,`data_realisasi`.`komponen` AS `komponen`,`data_realisasi`.`subkomponen` AS `subkomponen`,`data_realisasi`.`akun` AS `akun`,`data_realisasi`.`tahun` AS `tahun`,`data_realisasi`.`kdppk` AS `kdppk`,`data_realisasi`.`kdunit` AS `kdunit`,`data_realisasi`.`kdsatker` AS `kdsatker`,sum(`data_realisasi`.`realisasi`) AS `realisasi` from `data_realisasi` group by `data_realisasi`.`program`,`data_realisasi`.`kegiatan`,`data_realisasi`.`kro`,`data_realisasi`.`ro`,`data_realisasi`.`komponen`,`data_realisasi`.`subkomponen`,`data_realisasi`.`akun`,`data_realisasi`.`tahun`,`data_realisasi`.`kdppk`,`data_realisasi`.`kdunit`,`data_realisasi`.`kdsatker` ;

-- --------------------------------------------------------

--
-- Structure for view `view_sisa`
--
DROP TABLE IF EXISTS `view_sisa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_sisa`  AS  select `a`.`id` AS `id`,`a`.`program` AS `program`,`a`.`kegiatan` AS `kegiatan`,`a`.`kro` AS `kro`,`a`.`ro` AS `ro`,`a`.`komponen` AS `komponen`,`a`.`subkomponen` AS `subkomponen`,`a`.`akun` AS `akun`,`a`.`realisasi` AS `realisasi`,`a`.`kdsatker` AS `kdsatker`,`a`.`tahun` AS `tahun`,`a`.`tagihan_id` AS `tagihan_id`,`a`.`kdppk` AS `kdppk`,`a`.`kdunit` AS `kdunit`,`b`.`sisa` AS `sisa` from (`data_realisasi` `a` left join `view_pagu` `b` on(((`a`.`program` = `b`.`program`) and (`a`.`kegiatan` = `b`.`kegiatan`) and (`a`.`kro` = `b`.`kro`) and (`a`.`ro` = `b`.`ro`) and (`a`.`komponen` = `b`.`komponen`) and (`a`.`subkomponen` = `b`.`subkomponen`) and (`a`.`akun` = `b`.`akun`) and (`a`.`kdsatker` = `b`.`kdsatker`) and (`a`.`tahun` = `b`.`tahun`) and (`a`.`kdppk` = `b`.`kdppk`) and (`a`.`kdunit` = `b`.`kdunit`)))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_spby`
--
DROP TABLE IF EXISTS `view_spby`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_spby`  AS  select `data_tagihan`.`id` AS `id`,`data_tagihan`.`notagihan` AS `notagihan`,`data_tagihan`.`jnstagihan` AS `jnstagihan`,`data_tagihan`.`kdunit` AS `kdunit`,`data_tagihan`.`kddokumen` AS `kddokumen`,`data_tagihan`.`kdppk` AS `kdppk`,`data_tagihan`.`status` AS `status`,`data_tagihan`.`tgltagihan` AS `tgltagihan`,`data_tagihan`.`bruto` AS `bruto`,`data_tagihan`.`tglspm` AS `tglspm`,`data_tagihan`.`tglsp2d` AS `tglsp2d`,`data_tagihan`.`nosp2d` AS `nosp2d`,`data_tagihan`.`kdsatker` AS `kdsatker`,`data_tagihan`.`tahun` AS `tahun`,`data_tagihan`.`uraian` AS `uraian` from `data_tagihan` where (`data_tagihan`.`jnstagihan` = 0) ;

-- --------------------------------------------------------

--
-- Structure for view `view_spp`
--
DROP TABLE IF EXISTS `view_spp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_spp`  AS  select `data_tagihan`.`id` AS `id`,`data_tagihan`.`notagihan` AS `notagihan`,`data_tagihan`.`jnstagihan` AS `jnstagihan`,`data_tagihan`.`kdunit` AS `kdunit`,`data_tagihan`.`kddokumen` AS `kddokumen`,`data_tagihan`.`kdppk` AS `kdppk`,`data_tagihan`.`status` AS `status`,`data_tagihan`.`tgltagihan` AS `tgltagihan`,`data_tagihan`.`bruto` AS `bruto`,`data_tagihan`.`tglspm` AS `tglspm`,`data_tagihan`.`tglsp2d` AS `tglsp2d`,`data_tagihan`.`nosp2d` AS `nosp2d`,`data_tagihan`.`kdsatker` AS `kdsatker`,`data_tagihan`.`tahun` AS `tahun`,`data_tagihan`.`uraian` AS `uraian` from `data_tagihan` where (`data_tagihan`.`jnstagihan` = 1) ;

-- --------------------------------------------------------

--
-- Structure for view `view_tagihan`
--
DROP TABLE IF EXISTS `view_tagihan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_tagihan`  AS  select `a`.`id` AS `id`,`a`.`notagihan` AS `notagihan`,`a`.`jnstagihan` AS `jnstagihan`,`a`.`kdunit` AS `kdunit`,`a`.`kddokumen` AS `kddokumen`,`a`.`tgltagihan` AS `tgltagihan`,`a`.`bruto` AS `bruto`,`a`.`status` AS `status`,`a`.`tglspm` AS `tglspm`,`a`.`tglsp2d` AS `tglsp2d`,`a`.`nosp2d` AS `nosp2d`,`a`.`kdsatker` AS `kdsatker`,`a`.`kdppk` AS `kdppk`,`a`.`tahun` AS `tahun`,`a`.`uraian` AS `uraian`,`b`.`nmunit` AS `nmunit`,`c`.`nmdokumen` AS `nmdokumen`,`d`.`nmppk` AS `nmppk`,`e`.`nmbendahara` AS `nmbendahara` from ((((`data_tagihan` `a` left join `ref_unit` `b` on((`a`.`kdunit` = `b`.`kdunit`))) left join `ref_dokumen` `c` on((`a`.`kddokumen` = `c`.`kddokumen`))) left join `ref_ppk` `d` on((`a`.`kdppk` = `d`.`kdppk`))) left join `ref_bendahara` `e` on(((`a`.`kdsatker` = `e`.`kdsatker`) and (`a`.`tahun` = `e`.`tahun`)))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_dnp`
--
ALTER TABLE `data_dnp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_realisasi`
--
ALTER TABLE `data_realisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_tagihan`
--
ALTER TABLE `data_tagihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_upload`
--
ALTER TABLE `data_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_bendahara`
--
ALTER TABLE `ref_bendahara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_berkas`
--
ALTER TABLE `ref_berkas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_dokumen`
--
ALTER TABLE `ref_dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_nondjkn`
--
ALTER TABLE `ref_nondjkn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_pagu`
--
ALTER TABLE `ref_pagu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_pph`
--
ALTER TABLE `ref_pph`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_ppk`
--
ALTER TABLE `ref_ppk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_satker`
--
ALTER TABLE `ref_satker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_tahun`
--
ALTER TABLE `ref_tahun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_unit`
--
ALTER TABLE `ref_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_users`
--
ALTER TABLE `ref_users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_dnp`
--
ALTER TABLE `data_dnp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_realisasi`
--
ALTER TABLE `data_realisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_tagihan`
--
ALTER TABLE `data_tagihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_upload`
--
ALTER TABLE `data_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_bendahara`
--
ALTER TABLE `ref_bendahara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ref_berkas`
--
ALTER TABLE `ref_berkas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ref_dokumen`
--
ALTER TABLE `ref_dokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ref_nondjkn`
--
ALTER TABLE `ref_nondjkn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ref_pagu`
--
ALTER TABLE `ref_pagu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_pph`
--
ALTER TABLE `ref_pph`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ref_ppk`
--
ALTER TABLE `ref_ppk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ref_satker`
--
ALTER TABLE `ref_satker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `ref_tahun`
--
ALTER TABLE `ref_tahun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ref_unit`
--
ALTER TABLE `ref_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ref_users`
--
ALTER TABLE `ref_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
