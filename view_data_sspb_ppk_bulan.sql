-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Waktu pembuatan: 16 Feb 2022 pada 15.11
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
-- Struktur untuk view `view_data_sspb_ppk_bulan`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_data_sspb_ppk_bulan`  AS SELECT `data_realisasi`.`tahun` AS `tahun`, date_format(from_unixtime(`data_realisasi`.`tglsspb`),'%m') AS `bulan`, `data_realisasi`.`kdsatker` AS `kdsatker`, `data_realisasi`.`program` AS `program`, `data_realisasi`.`kegiatan` AS `kegiatan`, `data_realisasi`.`kro` AS `kro`, `data_realisasi`.`ro` AS `ro`, `data_realisasi`.`komponen` AS `komponen`, `data_realisasi`.`subkomponen` AS `subkomponen`, `data_realisasi`.`akun` AS `akun`, `data_realisasi`.`kdppk` AS `kdppk`, sum(`data_realisasi`.`sspb`) AS `sspb` FROM `data_realisasi` WHERE (`data_realisasi`.`sspb` > 0) GROUP BY `data_realisasi`.`tahun`, date_format(from_unixtime(`data_realisasi`.`tglsspb`),'%m'), `data_realisasi`.`kdsatker`, `data_realisasi`.`program`, `data_realisasi`.`kegiatan`, `data_realisasi`.`kro`, `data_realisasi`.`ro`, `data_realisasi`.`komponen`, `data_realisasi`.`subkomponen`, `data_realisasi`.`akun`, `data_realisasi`.`kdppk` ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
