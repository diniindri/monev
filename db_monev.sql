/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:8889
 Source Schema         : db_monev

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 06/12/2021 19:40:22
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for data_dnp
-- ----------------------------
DROP TABLE IF EXISTS `data_dnp`;
CREATE TABLE `data_dnp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tagihan_id` int(11) DEFAULT NULL,
  `nip` varchar(18) DEFAULT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `kdgol` varchar(2) DEFAULT NULL,
  `bruto` double(10,0) DEFAULT NULL,
  `pph` double(10,0) DEFAULT NULL,
  `netto` double(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of data_dnp
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for data_dokumen
-- ----------------------------
DROP TABLE IF EXISTS `data_dokumen`;
CREATE TABLE `data_dokumen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tagihan_id` int(11) DEFAULT NULL,
  `kdberkas` varchar(2) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `file` varchar(128) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of data_dokumen
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for data_realisasi
-- ----------------------------
DROP TABLE IF EXISTS `data_realisasi`;
CREATE TABLE `data_realisasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `kdunit` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of data_realisasi
-- ----------------------------
BEGIN;
INSERT INTO `data_realisasi` VALUES (9, 'CD', '4796', 'BMB', '001', '100', 'A', '521211', 1000000, '411792', '2021', 5, '07', '10');
INSERT INTO `data_realisasi` VALUES (10, 'CD', '4796', 'BMB', '001', '100', 'A', '522151', 500000, '411792', '2021', 5, '07', '10');
INSERT INTO `data_realisasi` VALUES (11, 'CD', '4797', 'FAE', '001', '100', 'B', '521211', 3000000, '411792', '2021', 5, '01', '10');
INSERT INTO `data_realisasi` VALUES (12, 'CD', '4796', 'BMB', '001', '100', 'A', '521211', 1000000, '411792', '2021', 6, '07', '10');
COMMIT;

-- ----------------------------
-- Table structure for data_tagihan
-- ----------------------------
DROP TABLE IF EXISTS `data_tagihan`;
CREATE TABLE `data_tagihan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notagihan` varchar(5) DEFAULT NULL,
  `jnstagihan` varchar(6) DEFAULT NULL,
  `kdunit` varchar(2) DEFAULT NULL,
  `kddokumen` varchar(2) DEFAULT NULL,
  `kdppk` varchar(2) DEFAULT NULL,
  `status` varchar(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of data_tagihan
-- ----------------------------
BEGIN;
INSERT INTO `data_tagihan` VALUES (5, '00100', '0', '10', '01', NULL, NULL);
INSERT INTO `data_tagihan` VALUES (6, '00023', '0', '70', '03', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for ref_berkas
-- ----------------------------
DROP TABLE IF EXISTS `ref_berkas`;
CREATE TABLE `ref_berkas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kdberkas` varchar(2) DEFAULT NULL,
  `nmberkas` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ref_berkas
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for ref_dokumen
-- ----------------------------
DROP TABLE IF EXISTS `ref_dokumen`;
CREATE TABLE `ref_dokumen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kddokumen` varchar(2) DEFAULT NULL,
  `nmdokumen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ref_dokumen
-- ----------------------------
BEGIN;
INSERT INTO `ref_dokumen` VALUES (2, '01', 'Perjadin');
INSERT INTO `ref_dokumen` VALUES (3, '02', 'Honor');
INSERT INTO `ref_dokumen` VALUES (4, '03', 'Biaya Pulsa');
INSERT INTO `ref_dokumen` VALUES (5, '04', 'Kontraktual');
INSERT INTO `ref_dokumen` VALUES (6, '05', 'Non Kontraktual');
INSERT INTO `ref_dokumen` VALUES (7, '06', 'PPNPN');
COMMIT;

-- ----------------------------
-- Table structure for ref_pagu
-- ----------------------------
DROP TABLE IF EXISTS `ref_pagu`;
CREATE TABLE `ref_pagu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `kdunit` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=423 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ref_pagu
-- ----------------------------
BEGIN;
INSERT INTO `ref_pagu` VALUES (1, 'CD', '4796', 'BMB', '001', '100', 'A', '521211', 5520000, '411792', '2021', '07', '10');
INSERT INTO `ref_pagu` VALUES (2, 'CD', '4796', 'BMB', '001', '100', 'A', '522151', 3600000, '411792', '2021', '07', '10');
INSERT INTO `ref_pagu` VALUES (3, 'CD', '4797', 'FAE', '001', '100', 'B', '521211', 6020000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (4, 'CD', '4797', 'FAE', '001', '100', 'B', '522141', 0, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (5, 'CD', '4797', 'FAE', '001', '100', 'B', '522192', 13600000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (6, 'CD', '4797', 'FAE', '001', '100', 'B', '524111', 59000000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (7, 'CD', '4797', 'FAE', '001', '100', 'B', '524114', 136320000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (8, 'CD', '4797', 'FAE', '002', '100', 'A', '521211', 500000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (9, 'CD', '4797', 'FAE', '002', '100', 'A', '522192', 16800000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (10, 'CD', '4797', 'FAE', '002', '100', 'A', '524111', 230580000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (11, 'CD', '4798', 'AAH', '004', '100', 'A', '521211', 99760000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (12, 'CD', '4798', 'FAC', '001', '100', 'A', '521211', 2710000, '411792', '2021', '07', '10');
INSERT INTO `ref_pagu` VALUES (13, 'CD', '4798', 'FAC', '001', '100', 'A', '522141', 0, '411792', '2021', '07', '10');
INSERT INTO `ref_pagu` VALUES (14, 'CD', '4798', 'FAC', '001', '100', 'A', '522151', 5400000, '411792', '2021', '07', '10');
INSERT INTO `ref_pagu` VALUES (15, 'CD', '4798', 'FAC', '001', '100', 'A', '522192', 0, '411792', '2021', '07', '10');
INSERT INTO `ref_pagu` VALUES (16, 'CD', '4798', 'FAC', '001', '100', 'A', '524114', 0, '411792', '2021', '07', '10');
INSERT INTO `ref_pagu` VALUES (17, 'CD', '4798', 'FAC', '001', '100', 'B', '521211', 1500000, '411792', '2021', '07', '10');
INSERT INTO `ref_pagu` VALUES (18, 'CD', '4798', 'FAC', '001', '100', 'B', '522151', 5400000, '411792', '2021', '07', '10');
INSERT INTO `ref_pagu` VALUES (19, 'CD', '4798', 'FAC', '001', '100', 'B', '522192', 2000000, '411792', '2021', '07', '10');
INSERT INTO `ref_pagu` VALUES (20, 'CD', '4798', 'FAC', '001', '100', 'B', '524113', 4360000, '411792', '2021', '07', '10');
INSERT INTO `ref_pagu` VALUES (21, 'CD', '4798', 'FAE', '001', '100', 'A', '521211', 1675000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (22, 'CD', '4798', 'FAE', '001', '100', 'A', '521213', 233100000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (23, 'CD', '4798', 'FAE', '001', '100', 'B', '521211', 15075000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (24, 'CD', '4798', 'FAE', '001', '100', 'B', '522151', 21600000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (25, 'CD', '4798', 'FAE', '001', '100', 'B', '524114', 0, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (26, 'CD', '4798', 'FAE', '003', '100', 'A', '521211', 9200000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (27, 'CD', '4798', 'FAE', '003', '100', 'A', '522151', 5400000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (28, 'CD', '4798', 'FAE', '003', '100', 'A', '522192', 5600000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (29, 'CD', '4798', 'FAE', '003', '100', 'A', '524111', 39680000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (30, 'CD', '4798', 'FAE', '003', '100', 'A', '524114', 68160000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (31, 'CD', '4798', 'FAE', '003', '100', 'B', '521211', 1000000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (32, 'CD', '4798', 'FAE', '005', '100', 'A', '521211', 29620000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (33, 'CD', '4798', 'FAE', '005', '100', 'A', '522141', 0, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (34, 'CD', '4798', 'FAE', '005', '100', 'A', '522151', 14400000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (35, 'CD', '4798', 'FAE', '005', '100', 'A', '522192', 4800000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (36, 'CD', '4798', 'FAE', '005', '100', 'A', '524111', 8320000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (37, 'CD', '4798', 'FAE', '005', '100', 'A', '524114', 56800000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (38, 'CD', '4798', 'FAE', '005', '100', 'C', '521211', 1670000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (39, 'CD', '4798', 'FAE', '005', '100', 'C', '522192', 4000000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (40, 'CD', '4798', 'FAE', '005', '100', 'C', '524114', 56800000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (41, 'CD', '4798', 'FAE', '005', '100', 'D', '521211', 3102000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (42, 'CD', '4798', 'FAE', '005', '100', 'D', '522151', 4000000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (43, 'CD', '4798', 'FAE', '005', '100', 'D', '522192', 8000000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (44, 'CD', '4798', 'FAE', '005', '100', 'D', '524111', 0, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (45, 'CD', '4798', 'FAE', '005', '100', 'D', '524114', 113600000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (46, 'CD', '4798', 'FAE', '005', '100', 'E', '521211', 13720000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (47, 'CD', '4798', 'FAE', '005', '100', 'E', '522141', 0, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (48, 'CD', '4798', 'FAE', '005', '100', 'E', '522151', 12000000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (49, 'CD', '4798', 'FAE', '005', '100', 'E', '522192', 9600000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (50, 'CD', '4798', 'FAE', '005', '100', 'E', '524111', 17040000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (51, 'CD', '4798', 'FAE', '005', '100', 'E', '524114', 113600000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (52, 'CD', '4798', 'FAK', '001', '100', 'A', '521211', 3170000, '411792', '2021', '04', '10');
INSERT INTO `ref_pagu` VALUES (53, 'CD', '4798', 'FAK', '001', '100', 'A', '522192', 0, '411792', '2021', '04', '10');
INSERT INTO `ref_pagu` VALUES (54, 'CD', '4798', 'FAK', '001', '100', 'A', '524111', 0, '411792', '2021', '04', '10');
INSERT INTO `ref_pagu` VALUES (55, 'CD', '4800', 'FAH', '001', '100', 'A', '521211', 34020000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (56, 'CD', '4800', 'FAH', '001', '100', 'A', '524114', 0, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (57, 'CD', '4801', 'AAC', '003', '100', 'A', '521211', 9910000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (58, 'CD', '4801', 'AAC', '003', '100', 'A', '521213', 104300000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (59, 'CD', '4801', 'AAC', '003', '100', 'A', '522151', 3600000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (60, 'CD', '4801', 'AAC', '003', '100', 'A', '524114', 68160000, '411792', '2021', '01', '10');
INSERT INTO `ref_pagu` VALUES (61, 'CD', '4801', 'AAG', '001', '100', 'A', '521211', 6030000, '411792', '2021', '03', '10');
INSERT INTO `ref_pagu` VALUES (62, 'CD', '4801', 'AAG', '001', '100', 'A', '522192', 10800000, '411792', '2021', '03', '10');
INSERT INTO `ref_pagu` VALUES (63, 'CD', '4801', 'AAG', '001', '100', 'A', '524114', 84240000, '411792', '2021', '03', '10');
INSERT INTO `ref_pagu` VALUES (64, 'CD', '4798', 'BDA', '001', '100', 'A', '521211', 0, '411792', '2021', '02', '20');
INSERT INTO `ref_pagu` VALUES (65, 'CD', '4798', 'BDA', '001', '100', 'A', '522151', 0, '411792', '2021', '02', '20');
INSERT INTO `ref_pagu` VALUES (66, 'CD', '4798', 'BDA', '001', '100', 'A', '524119', 3569000, '411792', '2021', '02', '20');
INSERT INTO `ref_pagu` VALUES (67, 'CD', '4798', 'BDA', '002', '100', 'A', '521211', 18476000, '411792', '2021', '02', '20');
INSERT INTO `ref_pagu` VALUES (68, 'CD', '4798', 'BDA', '002', '100', 'A', '522151', 18700000, '411792', '2021', '02', '20');
INSERT INTO `ref_pagu` VALUES (69, 'CD', '4798', 'BDA', '002', '100', 'A', '524113', 7824000, '411792', '2021', '02', '20');
INSERT INTO `ref_pagu` VALUES (70, 'CD', '4799', 'FAE', '001', '100', 'A', '521211', 1643000, '411792', '2021', '02', '20');
INSERT INTO `ref_pagu` VALUES (71, 'CD', '4799', 'FAE', '001', '100', 'A', '522151', 0, '411792', '2021', '02', '20');
INSERT INTO `ref_pagu` VALUES (72, 'CD', '4799', 'FAE', '001', '100', 'A', '522192', 0, '411792', '2021', '02', '20');
INSERT INTO `ref_pagu` VALUES (73, 'CD', '4799', 'FAE', '001', '100', 'A', '524111', 0, '411792', '2021', '02', '20');
INSERT INTO `ref_pagu` VALUES (74, 'CD', '4799', 'FAE', '001', '100', 'A', '524113', 0, '411792', '2021', '02', '20');
INSERT INTO `ref_pagu` VALUES (75, 'CD', '4799', 'FAE', '001', '100', 'A', '524114', 0, '411792', '2021', '02', '20');
INSERT INTO `ref_pagu` VALUES (76, 'CD', '4799', 'FAE', '002', '100', 'A', '521211', 0, '411792', '2021', '02', '20');
INSERT INTO `ref_pagu` VALUES (77, 'CD', '4799', 'FAE', '002', '100', 'A', '522131', 650000000, '411792', '2021', '02', '20');
INSERT INTO `ref_pagu` VALUES (78, 'CD', '4799', 'FAE', '002', '100', 'A', '524111', 0, '411792', '2021', '02', '20');
INSERT INTO `ref_pagu` VALUES (79, 'CD', '4799', 'FAE', '003', '100', 'A', '521211', 363000, '411792', '2021', '02', '20');
INSERT INTO `ref_pagu` VALUES (80, 'CD', '4799', 'FAE', '003', '100', 'A', '522192', 9000000, '411792', '2021', '02', '20');
INSERT INTO `ref_pagu` VALUES (81, 'CD', '4799', 'FAE', '003', '100', 'A', '524111', 90637000, '411792', '2021', '02', '20');
INSERT INTO `ref_pagu` VALUES (82, 'CD', '4799', 'FAE', '003', '100', 'A', '524119', 0, '411792', '2021', '02', '20');
INSERT INTO `ref_pagu` VALUES (83, 'CD', '4799', 'FAE', '004', '100', 'A', '521211', 598000, '411792', '2021', '02', '20');
INSERT INTO `ref_pagu` VALUES (84, 'CD', '4799', 'FAE', '004', '100', 'A', '522192', 10800000, '411792', '2021', '02', '20');
INSERT INTO `ref_pagu` VALUES (85, 'CD', '4799', 'FAE', '004', '100', 'A', '524111', 45634000, '411792', '2021', '02', '20');
INSERT INTO `ref_pagu` VALUES (86, 'CD', '4799', 'FAE', '004', '100', 'A', '524119', 17968000, '411792', '2021', '02', '20');
INSERT INTO `ref_pagu` VALUES (87, 'CD', '4799', 'ABA', '001', '100', 'A', '521211', 200000, '411792', '2021', '02', '20');
INSERT INTO `ref_pagu` VALUES (88, 'CD', '4799', 'ABA', '001', '100', 'A', '522151', 30600000, '411792', '2021', '02', '20');
INSERT INTO `ref_pagu` VALUES (89, 'CD', '4799', 'ABA', '001', '100', 'A', '524113', 19200000, '411792', '2021', '02', '20');
INSERT INTO `ref_pagu` VALUES (90, 'CD', '4800', 'FAH', '002', '100', 'A', '521211', 2500000, '411792', '2021', '02', '20');
INSERT INTO `ref_pagu` VALUES (91, 'CD', '4801', 'AAC', '001', '100', 'A', '521211', 496000, '411792', '2021', '02', '20');
INSERT INTO `ref_pagu` VALUES (92, 'CD', '4801', 'AAC', '001', '100', 'A', '521213', 172580000, '411792', '2021', '02', '20');
INSERT INTO `ref_pagu` VALUES (93, 'CD', '4801', 'AAC', '002', '100', 'A', '521211', 46584000, '411792', '2021', '02', '20');
INSERT INTO `ref_pagu` VALUES (94, 'CD', '4801', 'AAC', '002', '100', 'A', '522151', 4000000, '411792', '2021', '02', '20');
INSERT INTO `ref_pagu` VALUES (95, 'CD', '4801', 'AAC', '002', '100', 'A', '524114', 24416000, '411792', '2021', '02', '20');
INSERT INTO `ref_pagu` VALUES (96, 'CD', '4801', 'AAG', '001', '100', 'B', '521211', 0, '411792', '2021', '03', '20');
INSERT INTO `ref_pagu` VALUES (97, 'CD', '4801', 'AAG', '001', '100', 'B', '522151', 1800000, '411792', '2021', '03', '20');
INSERT INTO `ref_pagu` VALUES (98, 'CD', '4801', 'AAA', '001', '100', 'A', '521211', 5520000, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (99, 'CD', '4801', 'AAA', '001', '100', 'A', '521213', 0, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (100, 'CD', '4801', 'AAA', '001', '100', 'A', '522151', 30000000, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (101, 'CD', '4801', 'AAA', '001', '100', 'A', '524114', 0, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (102, 'CD', '4801', 'AAA', '001', '100', 'B', '521211', 0, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (103, 'CD', '4801', 'AAA', '001', '100', 'B', '522151', 16000000, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (104, 'CD', '4801', 'AAG', '001', '100', 'F', '521211', 12825000, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (105, 'CD', '4801', 'AAG', '001', '100', 'F', '522192', 0, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (106, 'CD', '4801', 'AAG', '001', '100', 'F', '524111', 0, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (107, 'CD', '4801', 'AAG', '001', '100', 'F', '524113', 0, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (108, 'CD', '4801', 'AAH', '001', '100', 'C', '521211', 6210000, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (109, 'CD', '4801', 'AAH', '001', '100', 'C', '524111', 0, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (110, 'CD', '4801', 'AAH', '001', '100', 'C', '524113', 0, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (111, 'WA', '4700', 'EAG', '001', '100', 'A', '521211', 0, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (112, 'WA', '4700', 'EAG', '001', '100', 'A', '524111', 3720000, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (113, 'WA', '4700', 'EAG', '001', '100', 'A', '524113', 0, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (114, 'WA', '4700', 'EAG', '001', '100', 'B', '521211', 0, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (115, 'WA', '4700', 'EAG', '001', '100', 'B', '521219', 32120000, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (116, 'WA', '4700', 'EAG', '001', '100', 'B', '522151', 13500000, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (117, 'WA', '4700', 'EAG', '001', '100', 'B', '522192', 2250000, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (118, 'WA', '4700', 'EAG', '001', '100', 'B', '524111', 101800000, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (119, 'WA', '4700', 'EAG', '001', '100', 'B', '524113', 1200000, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (120, 'WA', '4702', 'BMB', '001', '100', 'A', '521211', 20000000, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (121, 'WA', '4702', 'BMB', '001', '100', 'A', '521219', 0, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (122, 'WA', '4702', 'BMB', '001', '100', 'A', '524111', 0, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (123, 'WA', '4702', 'BMB', '001', '100', 'A', '524113', 0, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (124, 'WA', '4702', 'BMB', '002', '100', 'A', '521219', 0, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (125, 'WA', '4702', 'BMB', '003', '100', 'A', '521211', 77207000, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (126, 'WA', '4702', 'BMB', '003', '100', 'A', '521219', 5000000, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (127, 'WA', '4702', 'BMB', '003', '100', 'A', '524111', 0, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (128, 'WA', '4702', 'BMB', '003', '100', 'A', '524113', 3100000, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (129, 'WA', '4702', 'BMB', '003', '100', 'B', '524111', 0, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (130, 'WA', '4702', 'BMB', '003', '100', 'B', '524113', 0, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (131, 'WA', '4702', 'BMB', '003', '100', 'C', '521211', 30000000, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (132, 'WA', '4702', 'BMB', '003', '100', 'C', '524113', 0, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (133, 'WA', '4702', 'BMB', '004', '100', 'A', '521211', 0, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (134, 'WA', '4702', 'BMB', '004', '100', 'A', '524113', 0, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (135, 'WA', '4702', 'BMB', '005', '100', 'A', '521211', 0, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (136, 'WA', '4702', 'BMB', '005', '100', 'A', '522112', 177588000, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (137, 'WA', '4702', 'BMB', '005', '100', 'A', '524111', 0, '411792', '2021', '03', '30');
INSERT INTO `ref_pagu` VALUES (138, 'CD', '4798', 'AAH', '001', '100', 'A', '521211', 33300000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (139, 'CD', '4798', 'AAH', '001', '100', 'A', '522151', 5400000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (140, 'CD', '4798', 'AAH', '001', '100', 'A', '524111', 103968000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (141, 'CD', '4798', 'AAH', '001', '100', 'A', '524113', 24300000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (142, 'CD', '4798', 'FAE', '005', '100', 'B', '521211', 20677000, '411792', '2021', '01', '40');
INSERT INTO `ref_pagu` VALUES (143, 'CD', '4798', 'FAE', '005', '100', 'B', '522192', 43400000, '411792', '2021', '01', '40');
INSERT INTO `ref_pagu` VALUES (144, 'CD', '4798', 'FAE', '005', '100', 'B', '524111', 131544000, '411792', '2021', '01', '40');
INSERT INTO `ref_pagu` VALUES (145, 'CD', '4798', 'FAE', '005', '100', 'B', '524113', 2700000, '411792', '2021', '01', '40');
INSERT INTO `ref_pagu` VALUES (146, 'CD', '4798', 'FAK', '001', '100', 'C', '521219', 30000000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (147, 'CD', '4798', 'FAK', '001', '100', 'C', '524111', 121296000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (148, 'CD', '4798', 'FAK', '001', '100', 'C', '524113', 2400000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (149, 'CD', '4798', 'FAK', '001', '100', 'D', '521211', 24723000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (150, 'CD', '4798', 'FAK', '001', '100', 'D', '521213', 0, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (151, 'CD', '4798', 'FAK', '001', '100', 'D', '521219', 1752400000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (152, 'CD', '4798', 'FAK', '001', '100', 'D', '522119', 48000000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (153, 'CD', '4798', 'FAK', '001', '100', 'D', '522141', 66000000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (154, 'CD', '4798', 'FAK', '001', '100', 'D', '524111', 121296000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (155, 'CD', '4798', 'FAK', '001', '100', 'D', '524113', 14400000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (156, 'CD', '4798', 'FAK', '001', '100', 'E', '521211', 12020000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (157, 'CD', '4798', 'FAK', '001', '100', 'E', '521213', 241450000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (158, 'CD', '4798', 'FAK', '001', '100', 'E', '524111', 38988000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (159, 'CD', '4798', 'FAK', '001', '100', 'E', '524114', 0, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (160, 'CD', '4798', 'FAK', '001', '100', 'F', '521211', 2040000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (161, 'CD', '4798', 'FAK', '001', '100', 'F', '524111', 8664000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (162, 'CD', '4798', 'FAK', '001', '100', 'G', '521211', 6040000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (163, 'CD', '4798', 'FAK', '001', '100', 'G', '524111', 17328000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (164, 'CD', '4798', 'FAK', '001', '100', 'H', '521211', 8000000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (165, 'CD', '4798', 'FAK', '001', '100', 'H', '521219', 0, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (166, 'CD', '4798', 'FAK', '001', '100', 'H', '522141', 0, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (167, 'CD', '4798', 'FAK', '001', '100', 'H', '524111', 10764000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (168, 'CD', '4798', 'FAK', '001', '100', 'H', '524113', 9600000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (169, 'CD', '4798', 'FAK', '001', '100', 'I', '521211', 5000000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (170, 'CD', '4798', 'FAK', '001', '100', 'I', '522131', 439037000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (171, 'CD', '4798', 'FAK', '001', '100', 'I', '522151', 0, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (172, 'CD', '4798', 'FAK', '001', '100', 'I', '523121', 15000000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (173, 'CD', '4798', 'FAK', '001', '100', 'I', '524111', 95304000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (174, 'CD', '4798', 'FAK', '001', '100', 'K', '521211', 518381000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (175, 'CD', '4798', 'FAK', '001', '100', 'K', '521213', 3155000000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (176, 'CD', '4798', 'FAK', '001', '100', 'K', '522151', 9000000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (177, 'CD', '4798', 'FAK', '001', '100', 'K', '521219', 2061150000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (178, 'CD', '4798', 'FAK', '001', '100', 'K', '522131', 100000000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (179, 'CD', '4798', 'FAK', '001', '100', 'K', '522141', 100350000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (180, 'CD', '4798', 'FAK', '001', '100', 'K', '522192', 138000000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (181, 'CD', '4798', 'FAK', '001', '100', 'K', '524111', 391920000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (182, 'CD', '4798', 'FAK', '001', '100', 'K', '524113', 216960000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (183, 'CD', '4798', 'FAK', '001', '100', 'K', '524114', 34520000, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (184, 'CD', '4798', 'FAK', '001', '100', 'K', '524211', 0, '411792', '2021', '04', '40');
INSERT INTO `ref_pagu` VALUES (185, 'WA', '4705', 'FAB', '001', '100', 'A', '521211', 11844000, '411792', '2021', '05', '40');
INSERT INTO `ref_pagu` VALUES (186, 'WA', '4705', 'FAB', '001', '100', 'A', '522151', 190400000, '411792', '2021', '05', '40');
INSERT INTO `ref_pagu` VALUES (187, 'WA', '4705', 'FAB', '001', '100', 'A', '522192', 7000000, '411792', '2021', '05', '40');
INSERT INTO `ref_pagu` VALUES (188, 'WA', '4705', 'FAB', '001', '100', 'A', '523199', 62700000, '411792', '2021', '05', '40');
INSERT INTO `ref_pagu` VALUES (189, 'WA', '4705', 'FAB', '001', '100', 'A', '524111', 168800000, '411792', '2021', '05', '40');
INSERT INTO `ref_pagu` VALUES (190, 'WA', '4705', 'FAB', '001', '100', 'A', '536121', 618495000, '411792', '2021', '05', '40');
INSERT INTO `ref_pagu` VALUES (191, 'WA', '4705', 'FAB', '001', '100', 'B', '521211', 309272000, '411792', '2021', '05', '40');
INSERT INTO `ref_pagu` VALUES (192, 'WA', '4705', 'FAB', '001', '100', 'B', '522151', 120000000, '411792', '2021', '05', '40');
INSERT INTO `ref_pagu` VALUES (193, 'WA', '4705', 'FAB', '001', '100', 'B', '522192', 10150000, '411792', '2021', '05', '40');
INSERT INTO `ref_pagu` VALUES (194, 'WA', '4705', 'FAB', '001', '100', 'B', '523121', 7564662000, '411792', '2021', '05', '40');
INSERT INTO `ref_pagu` VALUES (195, 'WA', '4705', 'FAB', '001', '100', 'B', '523199', 2985361000, '411792', '2021', '05', '40');
INSERT INTO `ref_pagu` VALUES (196, 'WA', '4705', 'FAB', '001', '100', 'B', '524111', 102232000, '411792', '2021', '05', '40');
INSERT INTO `ref_pagu` VALUES (197, 'WA', '4705', 'FAB', '001', '100', 'B', '524113', 3000000, '411792', '2021', '05', '40');
INSERT INTO `ref_pagu` VALUES (198, 'WA', '4701', 'EAC', '001', '002', 'A', '521114', 20000000, '411792', '2021', '05', '40');
INSERT INTO `ref_pagu` VALUES (199, 'WA', '4701', 'EAC', '001', '002', 'A', '521131', 6840000, '411792', '2021', '05', '40');
INSERT INTO `ref_pagu` VALUES (200, 'WA', '4703', 'EAF', '002', '100', 'A', '522191', 50000000, '411792', '2021', '05', '40');
INSERT INTO `ref_pagu` VALUES (201, 'CD', '4796', 'BMB', '002', '100', 'A', '521211', 21750000, '411792', '2021', '08', '50');
INSERT INTO `ref_pagu` VALUES (202, 'CD', '4796', 'BMB', '002', '100', 'A', '522151', 15200000, '411792', '2021', '08', '50');
INSERT INTO `ref_pagu` VALUES (203, 'CD', '4796', 'BMB', '002', '100', 'A', '522192', 7100000, '411792', '2021', '08', '50');
INSERT INTO `ref_pagu` VALUES (204, 'CD', '4796', 'BMB', '002', '100', 'A', '524111', 85955000, '411792', '2021', '08', '50');
INSERT INTO `ref_pagu` VALUES (205, 'CD', '4796', 'BMB', '002', '100', 'A', '524113', 0, '411792', '2021', '08', '50');
INSERT INTO `ref_pagu` VALUES (206, 'CD', '4797', 'FAE', '001', '100', 'A', '521211', 7000, '411792', '2021', '01', '50');
INSERT INTO `ref_pagu` VALUES (207, 'CD', '4797', 'FAE', '001', '100', 'A', '522192', 0, '411792', '2021', '01', '50');
INSERT INTO `ref_pagu` VALUES (208, 'CD', '4797', 'FAE', '001', '100', 'A', '524111', 0, '411792', '2021', '01', '50');
INSERT INTO `ref_pagu` VALUES (209, 'CD', '4798', 'FAC', '001', '100', 'E', '521211', 44600000, '411792', '2021', '07', '50');
INSERT INTO `ref_pagu` VALUES (210, 'CD', '4798', 'FAC', '001', '100', 'E', '522151', 30400000, '411792', '2021', '07', '50');
INSERT INTO `ref_pagu` VALUES (211, 'CD', '4798', 'FAC', '001', '100', 'E', '522192', 3000000, '411792', '2021', '07', '50');
INSERT INTO `ref_pagu` VALUES (212, 'CD', '4798', 'FAC', '001', '100', 'E', '524111', 150600000, '411792', '2021', '07', '50');
INSERT INTO `ref_pagu` VALUES (213, 'CD', '4798', 'FAC', '001', '100', 'E', '524113', 0, '411792', '2021', '07', '50');
INSERT INTO `ref_pagu` VALUES (214, 'CD', '4798', 'FAE', '008', '100', 'A', '521211', 63500000, '411792', '2021', '06', '50');
INSERT INTO `ref_pagu` VALUES (215, 'CD', '4798', 'FAE', '008', '100', 'A', '522192', 21500000, '411792', '2021', '06', '50');
INSERT INTO `ref_pagu` VALUES (216, 'CD', '4798', 'FAE', '008', '100', 'A', '524111', 120000000, '411792', '2021', '06', '50');
INSERT INTO `ref_pagu` VALUES (217, 'CD', '4798', 'FAE', '008', '100', 'A', '524113', 3000000, '411792', '2021', '06', '50');
INSERT INTO `ref_pagu` VALUES (218, 'CD', '4798', 'FAE', '008', '100', 'B', '521211', 21100000, '411792', '2021', '06', '50');
INSERT INTO `ref_pagu` VALUES (219, 'CD', '4798', 'FAE', '008', '100', 'B', '522192', 6100000, '411792', '2021', '06', '50');
INSERT INTO `ref_pagu` VALUES (220, 'CD', '4798', 'FAE', '008', '100', 'B', '524111', 72800000, '411792', '2021', '06', '50');
INSERT INTO `ref_pagu` VALUES (221, 'CD', '4798', 'FAE', '008', '100', 'B', '524113', 3000000, '411792', '2021', '06', '50');
INSERT INTO `ref_pagu` VALUES (222, 'CD', '4801', 'AAG', '001', '100', 'C', '521211', 0, '411792', '2021', '03', '50');
INSERT INTO `ref_pagu` VALUES (223, 'CD', '4801', 'AAG', '001', '100', 'C', '522192', 0, '411792', '2021', '03', '50');
INSERT INTO `ref_pagu` VALUES (224, 'CD', '4801', 'AAG', '001', '100', 'C', '524111', 0, '411792', '2021', '03', '50');
INSERT INTO `ref_pagu` VALUES (225, 'CD', '4801', 'AAH', '002', '100', 'A', '521211', 31580000, '411792', '2021', '06', '50');
INSERT INTO `ref_pagu` VALUES (226, 'CD', '4801', 'AAH', '002', '100', 'A', '522192', 7100000, '411792', '2021', '06', '50');
INSERT INTO `ref_pagu` VALUES (227, 'CD', '4801', 'AAH', '002', '100', 'A', '524111', 96250000, '411792', '2021', '06', '50');
INSERT INTO `ref_pagu` VALUES (228, 'CD', '4801', 'AAH', '002', '100', 'A', '524113', 4500000, '411792', '2021', '06', '50');
INSERT INTO `ref_pagu` VALUES (229, 'CD', '4796', 'BMB', '001', '100', 'B', '521211', 6600000, '411792', '2021', '07', '70');
INSERT INTO `ref_pagu` VALUES (230, 'CD', '4796', 'BMB', '001', '100', 'B', '522192', 1250000, '411792', '2021', '07', '70');
INSERT INTO `ref_pagu` VALUES (231, 'CD', '4796', 'BMB', '001', '100', 'B', '524111', 43464000, '411792', '2021', '07', '70');
INSERT INTO `ref_pagu` VALUES (232, 'CD', '4796', 'BMB', '002', '100', 'B', '521211', 3000000, '411792', '2021', '08', '70');
INSERT INTO `ref_pagu` VALUES (233, 'CD', '4796', 'BMB', '002', '100', 'B', '522192', 12500000, '411792', '2021', '08', '70');
INSERT INTO `ref_pagu` VALUES (234, 'CD', '4796', 'BMB', '002', '100', 'B', '524111', 111069000, '411792', '2021', '08', '70');
INSERT INTO `ref_pagu` VALUES (235, 'CD', '4796', 'BMB', '002', '100', 'B', '524113', 3300000, '411792', '2021', '08', '70');
INSERT INTO `ref_pagu` VALUES (236, 'CD', '4798', 'AAH', '001', '100', 'B', '521211', 8400000, '411792', '2021', '04', '70');
INSERT INTO `ref_pagu` VALUES (237, 'CD', '4798', 'AAH', '001', '100', 'B', '522192', 12500000, '411792', '2021', '04', '70');
INSERT INTO `ref_pagu` VALUES (238, 'CD', '4798', 'AAH', '001', '100', 'B', '524111', 186004000, '411792', '2021', '04', '70');
INSERT INTO `ref_pagu` VALUES (239, 'CD', '4798', 'AAH', '001', '100', 'B', '524113', 2200000, '411792', '2021', '04', '70');
INSERT INTO `ref_pagu` VALUES (240, 'CD', '4798', 'FAC', '003', '100', 'A', '521211', 0, '411792', '2021', '08', '70');
INSERT INTO `ref_pagu` VALUES (241, 'CD', '4798', 'FAC', '003', '100', 'A', '522192', 0, '411792', '2021', '08', '70');
INSERT INTO `ref_pagu` VALUES (242, 'CD', '4798', 'FAC', '003', '100', 'A', '524111', 0, '411792', '2021', '08', '70');
INSERT INTO `ref_pagu` VALUES (243, 'CD', '4798', 'FAE', '002', '100', 'A', '521211', 3300000, '411792', '2021', '08', '70');
INSERT INTO `ref_pagu` VALUES (244, 'CD', '4798', 'FAE', '002', '100', 'A', '522192', 12500000, '411792', '2021', '08', '70');
INSERT INTO `ref_pagu` VALUES (245, 'CD', '4798', 'FAE', '002', '100', 'A', '524111', 122384000, '411792', '2021', '08', '70');
INSERT INTO `ref_pagu` VALUES (246, 'CD', '4798', 'FAE', '002', '100', 'B', '522192', 5000000, '411792', '2021', '08', '70');
INSERT INTO `ref_pagu` VALUES (247, 'CD', '4798', 'FAE', '002', '100', 'B', '524111', 59700000, '411792', '2021', '08', '70');
INSERT INTO `ref_pagu` VALUES (248, 'CD', '4798', 'FAE', '005', '100', 'F', '521211', 10250000, '411792', '2021', '01', '70');
INSERT INTO `ref_pagu` VALUES (249, 'CD', '4798', 'FAE', '005', '100', 'F', '522151', 10400000, '411792', '2021', '01', '70');
INSERT INTO `ref_pagu` VALUES (250, 'CD', '4798', 'FAE', '005', '100', 'F', '524111', 0, '411792', '2021', '01', '70');
INSERT INTO `ref_pagu` VALUES (251, 'CD', '4798', 'FAE', '007', '100', 'A', '521211', 0, '411792', '2021', '08', '70');
INSERT INTO `ref_pagu` VALUES (252, 'CD', '4798', 'FAE', '007', '100', 'A', '521213', 45000000, '411792', '2021', '08', '70');
INSERT INTO `ref_pagu` VALUES (253, 'CD', '4798', 'FAE', '007', '100', 'A', '522151', 5400000, '411792', '2021', '08', '70');
INSERT INTO `ref_pagu` VALUES (254, 'CD', '4798', 'FAE', '007', '100', 'A', '522192', 0, '411792', '2021', '08', '70');
INSERT INTO `ref_pagu` VALUES (255, 'CD', '4798', 'FAE', '007', '100', 'A', '524111', 15552000, '411792', '2021', '08', '70');
INSERT INTO `ref_pagu` VALUES (256, 'CD', '4798', 'FAK', '001', '100', 'B', '521211', 41400000, '411792', '2021', '04', '70');
INSERT INTO `ref_pagu` VALUES (257, 'CD', '4798', 'FAK', '001', '100', 'B', '521219', 176617000, '411792', '2021', '04', '70');
INSERT INTO `ref_pagu` VALUES (258, 'CD', '4798', 'FAK', '001', '100', 'B', '522192', 25000000, '411792', '2021', '04', '70');
INSERT INTO `ref_pagu` VALUES (259, 'CD', '4798', 'FAK', '001', '100', 'B', '524111', 536477000, '411792', '2021', '04', '70');
INSERT INTO `ref_pagu` VALUES (260, 'CD', '4798', 'FAK', '001', '100', 'B', '524113', 100000, '411792', '2021', '04', '70');
INSERT INTO `ref_pagu` VALUES (261, 'CD', '4800', 'FAH', '003', '100', 'A', '521211', 14800000, '411792', '2021', '08', '70');
INSERT INTO `ref_pagu` VALUES (262, 'CD', '4800', 'FAH', '003', '100', 'A', '522192', 12500000, '411792', '2021', '08', '70');
INSERT INTO `ref_pagu` VALUES (263, 'CD', '4800', 'FAH', '003', '100', 'A', '524111', 201876000, '411792', '2021', '08', '70');
INSERT INTO `ref_pagu` VALUES (264, 'CD', '4800', 'FAH', '003', '100', 'A', '524113', 500000, '411792', '2021', '08', '70');
INSERT INTO `ref_pagu` VALUES (265, 'CD', '4801', 'AAG', '001', '100', 'E', '521211', 34500000, '411792', '2021', '03', '70');
INSERT INTO `ref_pagu` VALUES (266, 'CD', '4801', 'AAG', '001', '100', 'E', '524113', 0, '411792', '2021', '03', '70');
INSERT INTO `ref_pagu` VALUES (267, 'CD', '4801', 'AAH', '001', '100', 'B', '521211', 12420000, '411792', '2021', '03', '70');
INSERT INTO `ref_pagu` VALUES (268, 'CD', '4796', 'BMB', '001', '100', 'C', '521211', 14036000, '411792', '2021', '07', '60');
INSERT INTO `ref_pagu` VALUES (269, 'CD', '4796', 'BMB', '001', '100', 'C', '522151', 32400000, '411792', '2021', '07', '60');
INSERT INTO `ref_pagu` VALUES (270, 'CD', '4796', 'BMB', '001', '100', 'C', '522192', 9000000, '411792', '2021', '07', '60');
INSERT INTO `ref_pagu` VALUES (271, 'CD', '4796', 'BMB', '001', '100', 'C', '524111', 29160000, '411792', '2021', '07', '60');
INSERT INTO `ref_pagu` VALUES (272, 'CD', '4796', 'BMB', '001', '100', 'C', '524113', 0, '411792', '2021', '07', '60');
INSERT INTO `ref_pagu` VALUES (273, 'CD', '4797', 'FAE', '001', '100', 'A', '521211', 930000, '411792', '2021', '01', '60');
INSERT INTO `ref_pagu` VALUES (274, 'CD', '4798', 'AAH', '001', '100', 'C', '521211', 1380000, '411792', '2021', '04', '60');
INSERT INTO `ref_pagu` VALUES (275, 'CD', '4798', 'AAH', '001', '100', 'C', '522192', 21000000, '411792', '2021', '04', '60');
INSERT INTO `ref_pagu` VALUES (276, 'CD', '4798', 'AAH', '001', '100', 'C', '524111', 231000000, '411792', '2021', '04', '60');
INSERT INTO `ref_pagu` VALUES (277, 'CD', '4798', 'AAH', '001', '100', 'C', '524113', 52920000, '411792', '2021', '04', '60');
INSERT INTO `ref_pagu` VALUES (278, 'CD', '4798', 'FAC', '001', '100', 'C', '521211', 3300000, '411792', '2021', '07', '60');
INSERT INTO `ref_pagu` VALUES (279, 'CD', '4798', 'FAC', '001', '100', 'C', '522192', 0, '411792', '2021', '07', '60');
INSERT INTO `ref_pagu` VALUES (280, 'CD', '4798', 'FAC', '001', '100', 'C', '524111', 0, '411792', '2021', '07', '60');
INSERT INTO `ref_pagu` VALUES (281, 'CD', '4798', 'FAC', '001', '100', 'D', '522191', 10000000, '411792', '2021', '07', '60');
INSERT INTO `ref_pagu` VALUES (282, 'CD', '4798', 'FAC', '002', '100', 'A', '521211', 840000, '411792', '2021', '07', '60');
INSERT INTO `ref_pagu` VALUES (283, 'CD', '4798', 'FAC', '002', '100', 'A', '521219', 298600000, '411792', '2021', '07', '60');
INSERT INTO `ref_pagu` VALUES (284, 'CD', '4798', 'FAC', '002', '100', 'A', '522192', 12000000, '411792', '2021', '07', '60');
INSERT INTO `ref_pagu` VALUES (285, 'CD', '4798', 'FAC', '002', '100', 'A', '524111', 35388000, '411792', '2021', '07', '60');
INSERT INTO `ref_pagu` VALUES (286, 'CD', '4798', 'FAC', '002', '100', 'A', '524113', 5850000, '411792', '2021', '07', '60');
INSERT INTO `ref_pagu` VALUES (287, 'CD', '4798', 'FAE', '004', '100', 'A', '521211', 2699000, '411792', '2021', '07', '60');
INSERT INTO `ref_pagu` VALUES (288, 'CD', '4798', 'FAE', '004', '100', 'A', '522151', 21600000, '411792', '2021', '07', '60');
INSERT INTO `ref_pagu` VALUES (289, 'CD', '4798', 'FAE', '004', '100', 'A', '522192', 5250000, '411792', '2021', '07', '60');
INSERT INTO `ref_pagu` VALUES (290, 'CD', '4798', 'FAE', '004', '100', 'A', '524111', 255000000, '411792', '2021', '07', '60');
INSERT INTO `ref_pagu` VALUES (291, 'CD', '4798', 'FAE', '005', '100', 'E', '521211', 0, '411792', '2021', '01', '60');
INSERT INTO `ref_pagu` VALUES (292, 'CD', '4798', 'FAE', '005', '100', 'E', '522151', 0, '411792', '2021', '01', '60');
INSERT INTO `ref_pagu` VALUES (293, 'CD', '4798', 'FAE', '005', '100', 'E', '522192', 0, '411792', '2021', '01', '60');
INSERT INTO `ref_pagu` VALUES (294, 'CD', '4798', 'FAE', '005', '100', 'E', '524111', 0, '411792', '2021', '01', '60');
INSERT INTO `ref_pagu` VALUES (295, 'CD', '4798', 'FAE', '005', '100', 'E', '524113', 0, '411792', '2021', '01', '60');
INSERT INTO `ref_pagu` VALUES (296, 'CD', '4798', 'FAE', '006', '100', 'A', '521211', 440000, '411792', '2021', '07', '60');
INSERT INTO `ref_pagu` VALUES (297, 'CD', '4798', 'FAE', '006', '100', 'A', '524113', 0, '411792', '2021', '07', '60');
INSERT INTO `ref_pagu` VALUES (298, 'CD', '4798', 'FAE', '006', '100', 'B', '521211', 440000, '411792', '2021', '07', '60');
INSERT INTO `ref_pagu` VALUES (299, 'CD', '4801', 'AAG', '001', '100', 'D', '521211', 880000, '411792', '2021', '03', '60');
INSERT INTO `ref_pagu` VALUES (300, 'CD', '4801', 'AAG', '001', '100', 'D', '522151', 5400000, '411792', '2021', '03', '60');
INSERT INTO `ref_pagu` VALUES (401, 'WA', '4701', 'EAC', '002', '100', 'A', '524113', 10000000, '411792', '2021', '16', '85');
INSERT INTO `ref_pagu` VALUES (402, 'WA', '4701', 'EAC', '002', '100', 'B', '521219', 88788000, '411792', '2021', '16', '85');
INSERT INTO `ref_pagu` VALUES (403, 'WA', '4701', 'EAC', '002', '100', 'B', '522192', 0, '411792', '2021', '16', '85');
INSERT INTO `ref_pagu` VALUES (404, 'WA', '4701', 'EAC', '002', '100', 'B', '524111', 2752000, '411792', '2021', '16', '85');
INSERT INTO `ref_pagu` VALUES (405, 'WA', '4701', 'EAC', '003', '100', 'A', '521211', 6900000, '411792', '2021', '16', '85');
INSERT INTO `ref_pagu` VALUES (406, 'WA', '4701', 'EAC', '003', '100', 'A', '522141', 120000000, '411792', '2021', '16', '85');
INSERT INTO `ref_pagu` VALUES (407, 'WA', '4701', 'EAC', '003', '100', 'A', '522151', 10000000, '411792', '2021', '16', '85');
INSERT INTO `ref_pagu` VALUES (408, 'WA', '4701', 'EAC', '003', '100', 'A', '522192', 0, '411792', '2021', '16', '85');
INSERT INTO `ref_pagu` VALUES (409, 'WA', '4701', 'EAC', '003', '100', 'A', '524119', 0, '411792', '2021', '16', '85');
INSERT INTO `ref_pagu` VALUES (410, 'WA', '4701', 'EAC', '003', '100', 'A', '524211', 50000000, '411792', '2021', '16', '85');
INSERT INTO `ref_pagu` VALUES (411, 'WA', '4701', 'EAC', '003', '100', 'B', '521211', 6900000, '411792', '2021', '16', '85');
INSERT INTO `ref_pagu` VALUES (412, 'WA', '4701', 'EAC', '003', '100', 'B', '522141', 141650000, '411792', '2021', '16', '85');
INSERT INTO `ref_pagu` VALUES (413, 'WA', '4701', 'EAC', '004', '100', 'A', '522191', 0, '411792', '2021', '16', '85');
INSERT INTO `ref_pagu` VALUES (414, 'WA', '4701', 'EAC', '004', '100', 'A', '522192', 0, '411792', '2021', '16', '85');
INSERT INTO `ref_pagu` VALUES (415, 'WA', '4701', 'EAC', '004', '100', 'A', '524111', 6000000, '411792', '2021', '16', '85');
INSERT INTO `ref_pagu` VALUES (416, 'WA', '4701', 'EAD', '001', '002', 'A', '523121', 4779215000, '411792', '2021', '15', '85');
INSERT INTO `ref_pagu` VALUES (417, 'WA', '4701', 'EAD', '002', '100', 'A', '532111', 702458000, '411792', '2021', '15', '85');
INSERT INTO `ref_pagu` VALUES (418, 'WA', '4701', 'EAD', '002', '100', 'B', '532121', 8352000000, '411792', '2021', '15', '85');
INSERT INTO `ref_pagu` VALUES (419, 'WA', '4701', 'EAE', '001', '002', 'A', '522131', 979550000, '411792', '2021', '15', '85');
INSERT INTO `ref_pagu` VALUES (420, 'WA', '4701', 'EAE', '001', '002', 'A', '523111', 2028302000, '411792', '2021', '15', '85');
INSERT INTO `ref_pagu` VALUES (421, 'WA', '4701', 'EAE', '001', '002', 'A', '523119', 755969000, '411792', '2021', '15', '85');
INSERT INTO `ref_pagu` VALUES (422, 'WA', '4701', 'EAE', '002', '100', 'A', '533121', 431174000, '411792', '2021', '15', '85');
COMMIT;

-- ----------------------------
-- Table structure for ref_ppk
-- ----------------------------
DROP TABLE IF EXISTS `ref_ppk`;
CREATE TABLE `ref_ppk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kdppk` varchar(2) DEFAULT NULL,
  `nmppk` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ref_ppk
-- ----------------------------
BEGIN;
INSERT INTO `ref_ppk` VALUES (1, '01', 'Wielly Prasekti');
INSERT INTO `ref_ppk` VALUES (2, '02', 'Nandang Supriyadi');
INSERT INTO `ref_ppk` VALUES (3, '03', 'Eny Susanti');
INSERT INTO `ref_ppk` VALUES (4, '04', 'Anwar Sulaiman');
INSERT INTO `ref_ppk` VALUES (5, '05', 'Yuzuardi Haban');
INSERT INTO `ref_ppk` VALUES (6, '06', 'Abdul Ghofar');
INSERT INTO `ref_ppk` VALUES (7, '07', 'Jundi Widiantoro');
INSERT INTO `ref_ppk` VALUES (8, '08', 'Iwan Darma');
INSERT INTO `ref_ppk` VALUES (9, '09', 'Mufid Hamdani');
INSERT INTO `ref_ppk` VALUES (10, '10', 'Lilik Hermawan');
INSERT INTO `ref_ppk` VALUES (11, '11', 'Bagus Kurniawan');
INSERT INTO `ref_ppk` VALUES (12, '12', 'Kiki Nurman');
INSERT INTO `ref_ppk` VALUES (13, '13', 'Moh. Arif Rochman');
INSERT INTO `ref_ppk` VALUES (14, '14', 'R. Hariyadi Murti Kurniawan');
INSERT INTO `ref_ppk` VALUES (15, '15', 'Eko Hardiyanto');
INSERT INTO `ref_ppk` VALUES (16, '16', 'Wahyu Setiadi');
COMMIT;

-- ----------------------------
-- Table structure for ref_satker
-- ----------------------------
DROP TABLE IF EXISTS `ref_satker`;
CREATE TABLE `ref_satker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kdsatker` varchar(6) DEFAULT NULL,
  `nmsatker` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ref_satker
-- ----------------------------
BEGIN;
INSERT INTO `ref_satker` VALUES (1, '119312', 'KPKNL Jakarta V');
INSERT INTO `ref_satker` VALUES (2, '119393', 'KPKNL Cirebon');
INSERT INTO `ref_satker` VALUES (3, '119511', 'KPKNL Surakarta');
INSERT INTO `ref_satker` VALUES (4, '119656', 'KPKNL Batam');
INSERT INTO `ref_satker` VALUES (5, '119703', 'KPKNL Pematang Siantar');
INSERT INTO `ref_satker` VALUES (6, '119724', 'KPKNL Serang');
INSERT INTO `ref_satker` VALUES (7, '119745', 'KPKNL Bukittinggi');
INSERT INTO `ref_satker` VALUES (8, '119809', 'KPKNL Pangkal Pinang');
INSERT INTO `ref_satker` VALUES (9, '119834', 'KPKNL Palangkaraya');
INSERT INTO `ref_satker` VALUES (10, '119944', 'KPKNL Palopo');
INSERT INTO `ref_satker` VALUES (11, '411786', 'KPKNL Tegal');
INSERT INTO `ref_satker` VALUES (12, '411792', 'Kantor Pusat DJKN');
INSERT INTO `ref_satker` VALUES (13, '411806', 'Kantor Wilayah DJKN Sumatera Utara');
INSERT INTO `ref_satker` VALUES (14, '411812', 'Kantor Wilayah DJKN Jawa Barat');
INSERT INTO `ref_satker` VALUES (15, '411821', 'Kantor Wilayah DJKN Jawa Tengah dan Daerah Istimewa Yogyakarta');
INSERT INTO `ref_satker` VALUES (16, '411837', 'Kantor Wilayah DJKN Jawa Timur');
INSERT INTO `ref_satker` VALUES (17, '411843', 'Kantor Wilayah DJKN Sulawesi Selatan, Tenggara, dan Barat');
INSERT INTO `ref_satker` VALUES (18, '411852', 'Kantor Wilayah DJKN DKI Jakarta');
INSERT INTO `ref_satker` VALUES (19, '418495', 'KPKNL Mamuju');
INSERT INTO `ref_satker` VALUES (20, '506050', 'Kantor Wilayah DJKN Aceh');
INSERT INTO `ref_satker` VALUES (21, '506069', 'KPKNL Lhokseumawe');
INSERT INTO `ref_satker` VALUES (22, '506081', 'KPKNL Kisaran');
INSERT INTO `ref_satker` VALUES (23, '506090', 'KPKNL Padang Sidempuan');
INSERT INTO `ref_satker` VALUES (24, '506101', 'Kantor Wilayah DJKN Riau, Sumatera Barat dan Kepulauan Riau');
INSERT INTO `ref_satker` VALUES (25, '506126', 'KPKNL Lahat');
INSERT INTO `ref_satker` VALUES (26, '506142', 'Kantor Wilayah DJKN Lampung dan Bengkulu');
INSERT INTO `ref_satker` VALUES (27, '506157', 'KPKNL Metro');
INSERT INTO `ref_satker` VALUES (28, '506172', 'Kantor Wilayah DJKN Banten');
INSERT INTO `ref_satker` VALUES (29, '506188', 'KPKNL Tangerang I');
INSERT INTO `ref_satker` VALUES (30, '506194', 'KPKNL Tangerang II');
INSERT INTO `ref_satker` VALUES (31, '506208', 'KPKNL Purwakarta');
INSERT INTO `ref_satker` VALUES (32, '506239', 'KPKNL Pekalongan');
INSERT INTO `ref_satker` VALUES (33, '506276', 'KPKNL Sidoarjo');
INSERT INTO `ref_satker` VALUES (34, '506282', 'KPKNL Pamekasan');
INSERT INTO `ref_satker` VALUES (35, '506291', 'Kantor Wilayah DJKN Kalimantan Barat');
INSERT INTO `ref_satker` VALUES (36, '506302', 'KPKNL Singkawang');
INSERT INTO `ref_satker` VALUES (37, '506327', 'Kantor Wilayah DJKN Kalimantan Selatan dan Tengah');
INSERT INTO `ref_satker` VALUES (38, '506333', 'KPKNL Pangkalan Bun');
INSERT INTO `ref_satker` VALUES (39, '506358', 'Kantor Wilayah DJKN Kalimantan Timur dan Utara');
INSERT INTO `ref_satker` VALUES (40, '506364', 'KPKNL Tarakan');
INSERT INTO `ref_satker` VALUES (41, '506370', 'KPKNL Bontang');
INSERT INTO `ref_satker` VALUES (42, '506409', 'Kantor Wilayah DJKN Papua dan Maluku');
INSERT INTO `ref_satker` VALUES (43, '506461', 'KPKNL Dumai');
INSERT INTO `ref_satker` VALUES (44, '525343', 'KPKNL Tasikmalaya');
INSERT INTO `ref_satker` VALUES (45, '525474', 'KPKNL Biak');
INSERT INTO `ref_satker` VALUES (46, '525591', 'KPKNL Singaraja');
INSERT INTO `ref_satker` VALUES (47, '537721', 'KPKNL Jakarta I');
INSERT INTO `ref_satker` VALUES (48, '537738', 'KPKNL Bandung');
INSERT INTO `ref_satker` VALUES (49, '537759', 'KPKNL Bogor');
INSERT INTO `ref_satker` VALUES (50, '537763', 'KPKNL Semarang');
INSERT INTO `ref_satker` VALUES (51, '537770', 'KPKNL Purwokerto');
INSERT INTO `ref_satker` VALUES (52, '537784', 'KPKNL Yogyakarta');
INSERT INTO `ref_satker` VALUES (53, '537791', 'KPKNL Surabaya');
INSERT INTO `ref_satker` VALUES (54, '537810', 'KPKNL Malang');
INSERT INTO `ref_satker` VALUES (55, '537827', 'KPKNL Banda Aceh');
INSERT INTO `ref_satker` VALUES (56, '537831', 'KPKNL Medan');
INSERT INTO `ref_satker` VALUES (57, '537848', 'KPKNL Padang');
INSERT INTO `ref_satker` VALUES (58, '537852', 'KPKNL Pekanbaru');
INSERT INTO `ref_satker` VALUES (59, '537873', 'KPKNL Jambi');
INSERT INTO `ref_satker` VALUES (60, '537880', 'Kantor Wilayah DJKN Sumatera Selatan, Jambi dan Bangka Belitung');
INSERT INTO `ref_satker` VALUES (61, '537894', 'KPKNL Palembang');
INSERT INTO `ref_satker` VALUES (62, '537902', 'KPKNL Bandar Lampung');
INSERT INTO `ref_satker` VALUES (63, '537916', 'KPKNL Jakarta III');
INSERT INTO `ref_satker` VALUES (64, '537920', 'KPKNL Madiun');
INSERT INTO `ref_satker` VALUES (65, '537937', 'KPKNL Jakarta IV');
INSERT INTO `ref_satker` VALUES (66, '537941', 'KPKNL Samarinda');
INSERT INTO `ref_satker` VALUES (67, '537958', 'KPKNL Banjarmasin');
INSERT INTO `ref_satker` VALUES (68, '537962', 'KPKNL Balikpapan');
INSERT INTO `ref_satker` VALUES (69, '537979', 'Kantor Wilayah DJKN Sulawesi Utara, Tengah, Gorontalo, dan Maluku Utara');
INSERT INTO `ref_satker` VALUES (70, '537983', 'KPKNL Manado');
INSERT INTO `ref_satker` VALUES (71, '537990', 'KPKNL Sorong');
INSERT INTO `ref_satker` VALUES (72, '538002', 'KPKNL Palu');
INSERT INTO `ref_satker` VALUES (73, '538019', 'KPKNL Makassar');
INSERT INTO `ref_satker` VALUES (74, '538023', 'KPKNL Gorontalo');
INSERT INTO `ref_satker` VALUES (75, '538030', 'KPKNL Kendari');
INSERT INTO `ref_satker` VALUES (76, '538044', 'KPKNL Ambon');
INSERT INTO `ref_satker` VALUES (77, '538051', 'Kantor Wilayah DJKN Bali dan Nusa Tenggara');
INSERT INTO `ref_satker` VALUES (78, '538065', 'KPKNL Denpasar');
INSERT INTO `ref_satker` VALUES (79, '538072', 'KPKNL Bima');
INSERT INTO `ref_satker` VALUES (80, '538086', 'KPKNL Mataram');
INSERT INTO `ref_satker` VALUES (81, '538108', 'KPKNL Kupang');
INSERT INTO `ref_satker` VALUES (82, '538129', 'KPKNL Jayapura');
INSERT INTO `ref_satker` VALUES (83, '538133', 'KPKNL Ternate');
INSERT INTO `ref_satker` VALUES (84, '538140', 'KPKNL Jember');
INSERT INTO `ref_satker` VALUES (85, '538154', 'KPKNL Bengkulu');
INSERT INTO `ref_satker` VALUES (86, '538190', 'KPKNL Parepare');
INSERT INTO `ref_satker` VALUES (87, '604442', 'KPKNL Jakarta II');
INSERT INTO `ref_satker` VALUES (88, '604445', 'Lembaga Manajemen Aset Negara');
INSERT INTO `ref_satker` VALUES (89, '604456', 'KPKNL Pontianak');
INSERT INTO `ref_satker` VALUES (90, '604460', 'KPKNL Bekasi');
COMMIT;

-- ----------------------------
-- Table structure for ref_tahun
-- ----------------------------
DROP TABLE IF EXISTS `ref_tahun`;
CREATE TABLE `ref_tahun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ref_tahun
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for ref_unit
-- ----------------------------
DROP TABLE IF EXISTS `ref_unit`;
CREATE TABLE `ref_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kdunit` varchar(2) DEFAULT NULL,
  `nmunit` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ref_unit
-- ----------------------------
BEGIN;
INSERT INTO `ref_unit` VALUES (1, '10', 'BMN');
INSERT INTO `ref_unit` VALUES (2, '20', 'HUHU');
INSERT INTO `ref_unit` VALUES (3, '30', 'KND');
INSERT INTO `ref_unit` VALUES (4, '40', 'PKNSI');
INSERT INTO `ref_unit` VALUES (5, '50', 'LELANG');
INSERT INTO `ref_unit` VALUES (6, '60', 'PENILAIAN');
INSERT INTO `ref_unit` VALUES (7, '70', 'PNKNL');
INSERT INTO `ref_unit` VALUES (8, '80', 'SEKRETARIAT');
INSERT INTO `ref_unit` VALUES (9, '81', 'KEUANGAN');
INSERT INTO `ref_unit` VALUES (10, '82', 'KEPEGAWAIAN');
INSERT INTO `ref_unit` VALUES (11, '83', 'OKI');
INSERT INTO `ref_unit` VALUES (12, '84', 'PERLENGKAPAN');
INSERT INTO `ref_unit` VALUES (13, '85', 'UMUM');
COMMIT;

-- ----------------------------
-- Table structure for ref_users
-- ----------------------------
DROP TABLE IF EXISTS `ref_users`;
CREATE TABLE `ref_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(18) DEFAULT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  `kdppk` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ref_users
-- ----------------------------
BEGIN;
INSERT INTO `ref_users` VALUES (4, '198407022003121004', 'Dana Kristiawan', 'danakristiawan@gmail.com', '$2y$10$.WOt64Sf2QnX4NqPkea60uNJMrnhZhWLAGW/JFRvkN1VYK3LG79Wq', 1, 1577811600, NULL);
INSERT INTO `ref_users` VALUES (6, '198801142014022005', 'Dini Indri Irianti', 'dinindririanti@gmail.com', '$2y$10$.WOt64Sf2QnX4NqPkea60uNJMrnhZhWLAGW/JFRvkN1VYK3LG79Wq', 1, 1637294941, NULL);
INSERT INTO `ref_users` VALUES (8, '199212012014112002', 'Nur Ayu Saraswati', 'nurayu@gmail.com', '$2y$10$Et400MlK4JesWRLG/wh4QOK1nEO1LP3HgBYpV5NyU9GIylouvjdz6', 1, 1634008686, NULL);
COMMIT;

-- ----------------------------
-- View structure for view_pagu
-- ----------------------------
DROP VIEW IF EXISTS `view_pagu`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_pagu` AS select `a`.`id` AS `id`,`a`.`program` AS `program`,`a`.`kegiatan` AS `kegiatan`,`a`.`kro` AS `kro`,`a`.`ro` AS `ro`,`a`.`komponen` AS `komponen`,`a`.`subkomponen` AS `subkomponen`,`a`.`akun` AS `akun`,`a`.`anggaran` AS `anggaran`,`a`.`kdsatker` AS `kdsatker`,`a`.`tahun` AS `tahun`,`a`.`kdppk` AS `kdppk`,`a`.`kdunit` AS `kdunit`,`b`.`realisasi` AS `realisasi`,(`a`.`anggaran` - `b`.`realisasi`) AS `sisa` from (`ref_pagu` `a` left join `view_realisasi` `b` on(((`a`.`program` = `b`.`program`) and (`a`.`kegiatan` = `b`.`kegiatan`) and (`a`.`kro` = `b`.`kro`) and (`a`.`ro` = `b`.`ro`) and (`a`.`komponen` = `b`.`komponen`) and (`a`.`subkomponen` = `b`.`subkomponen`) and (`a`.`akun` = `b`.`akun`) and (`a`.`tahun` = `b`.`tahun`) and (`a`.`kdppk` = `b`.`kdppk`) and (`a`.`kdunit` = `b`.`kdunit`) and (`a`.`kdsatker` = `b`.`kdsatker`))));

-- ----------------------------
-- View structure for view_realisasi
-- ----------------------------
DROP VIEW IF EXISTS `view_realisasi`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_realisasi` AS select `data_realisasi`.`program` AS `program`,`data_realisasi`.`kegiatan` AS `kegiatan`,`data_realisasi`.`kro` AS `kro`,`data_realisasi`.`ro` AS `ro`,`data_realisasi`.`komponen` AS `komponen`,`data_realisasi`.`subkomponen` AS `subkomponen`,`data_realisasi`.`akun` AS `akun`,`data_realisasi`.`tahun` AS `tahun`,`data_realisasi`.`kdppk` AS `kdppk`,`data_realisasi`.`kdunit` AS `kdunit`,`data_realisasi`.`kdsatker` AS `kdsatker`,sum(`data_realisasi`.`realisasi`) AS `realisasi` from `data_realisasi` group by `data_realisasi`.`program`,`data_realisasi`.`kegiatan`,`data_realisasi`.`kro`,`data_realisasi`.`ro`,`data_realisasi`.`komponen`,`data_realisasi`.`subkomponen`,`data_realisasi`.`akun`,`data_realisasi`.`tahun`,`data_realisasi`.`kdppk`,`data_realisasi`.`kdunit`,`data_realisasi`.`kdsatker`;

-- ----------------------------
-- View structure for view_tagihan
-- ----------------------------
DROP VIEW IF EXISTS `view_tagihan`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_tagihan` AS select `a`.`id` AS `id`,`a`.`notagihan` AS `notagihan`,`a`.`jnstagihan` AS `jnstagihan`,`a`.`kdunit` AS `kdunit`,`a`.`kddokumen` AS `kddokumen`,`b`.`nmunit` AS `nmunit`,`c`.`nmdokumen` AS `nmdokumen` from ((`data_tagihan` `a` left join `ref_unit` `b` on((`a`.`kdunit` = `b`.`kdunit`))) left join `ref_dokumen` `c` on((`a`.`kddokumen` = `c`.`kddokumen`)));

SET FOREIGN_KEY_CHECKS = 1;
