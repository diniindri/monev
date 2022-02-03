
-- --------------------------------------------------------

--
-- Struktur untuk view `view_data_realisasi_unit_bulan`
--
DROP TABLE IF EXISTS `view_data_realisasi_unit_bulan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_data_realisasi_unit_bulan`  AS SELECT `data_realisasi`.`tahun` AS `tahun`, date_format(from_unixtime(`data_tagihan`.`tgltagihan`),'%m') AS `bulan`, `data_realisasi`.`kdsatker` AS `kdsatker`, `data_realisasi`.`program` AS `program`, `data_realisasi`.`kegiatan` AS `kegiatan`, `data_realisasi`.`kro` AS `kro`, `data_realisasi`.`ro` AS `ro`, `data_realisasi`.`komponen` AS `komponen`, `data_realisasi`.`subkomponen` AS `subkomponen`, `data_realisasi`.`akun` AS `akun`, `data_realisasi`.`kdunit` AS `kdunit`, sum(`data_realisasi`.`realisasi`) AS `realisasi` FROM (`data_realisasi` left join `data_tagihan` on((`data_realisasi`.`tagihan_id` = `data_tagihan`.`id`))) GROUP BY `data_realisasi`.`tahun`, date_format(from_unixtime(`data_tagihan`.`tgltagihan`),'%m'), `data_realisasi`.`kdsatker`, `data_realisasi`.`program`, `data_realisasi`.`kegiatan`, `data_realisasi`.`kro`, `data_realisasi`.`ro`, `data_realisasi`.`komponen`, `data_realisasi`.`subkomponen`, `data_realisasi`.`akun`, `data_realisasi`.`kdunit` ;
