/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : db_kas

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-12-12 11:59:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(50) NOT NULL,
  `password` varchar(155) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'Q-001', 'a205884cdb8e7f56310b4402ab6730d1ac5b666ca1670c0d0b7e17e54a2069953452611c6e7bccc474ec5ae7a8017e982484dd0f7919133a0c1c1c01b4b302c0', '1');

-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `kode_department` varchar(2) NOT NULL,
  `dept` varchar(15) NOT NULL,
  `kode_akses` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COMMENT='select * from e_department';

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES ('1', '1', 'IT', '5');
INSERT INTO `department` VALUES ('3', '2', 'General Affair', '1');
INSERT INTO `department` VALUES ('4', '3', 'Developer', '5');
INSERT INTO `department` VALUES ('5', '4', 'Finance', '2');
INSERT INTO `department` VALUES ('6', '5', 'Quality Control', '5');
INSERT INTO `department` VALUES ('7', '6', 'Admin Manager', '2');
INSERT INTO `department` VALUES ('8', '7', 'Cashier', '3');
INSERT INTO `department` VALUES ('9', '8', 'Marketing', '5');
INSERT INTO `department` VALUES ('10', '9', 'OB', '5');
INSERT INTO `department` VALUES ('11', '10', 'Direksi', '4');

-- ----------------------------
-- Table structure for karyawan
-- ----------------------------
DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE `karyawan` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nik` varchar(16) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nama_lengkap` varchar(45) NOT NULL,
  `kode_department` int(2) NOT NULL,
  `gsm` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `akses` int(1) NOT NULL,
  `update_password` int(2) NOT NULL,
  `last_login` date NOT NULL,
  PRIMARY KEY (`id`,`nik`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of karyawan
-- ----------------------------
INSERT INTO `karyawan` VALUES ('8', 'ATU201809254061', '8b036d2857447d37c4f2bfcad0bbbcdfdaab6796fd60257c61139549c05ad7d3a456029908c4c0cf06d22b2748c3982aaa49e7ad10254d2fa6d609f93009397b', 'Agis Puspita', '4', '081297326740', 'agis@gmail.com', '2', '0', '2018-12-05');
INSERT INTO `karyawan` VALUES ('11', 'ATU201809262009', 'f8d0f685c4e12b9c537519dc26d0ba5864171cc9c587313b15a5e461dff14ab565118a415e6e8cdbdf46cb41a833101d1be6e304b4089f91e4190c3d4273a983', 'Sodikin', '2', '082198918928', 'GA@gmail.com', '1', '0', '2018-12-12');
INSERT INTO `karyawan` VALUES ('14', 'ATU201809271092', '18ee70abb5d878c1c991065a0aec8197987e6abec9286dd198853737ff21f02e89027e6d23a224b292be4df7475f85059f4b6e82ea2bdde1a32a8e25fd7b8793', 'Dermawan Cahyadi', '10', '082198918928', 'dermawan@gmail.com', '4', '0', '2018-10-16');
INSERT INTO `karyawan` VALUES ('15', 'ATU201809277068', '1b568692625bbda6ddbd45c7ce923a4ee0b3e102cc945f35b35b7dab1a8a57b359d0471a456d2d09ad426d89142ed98730ed78dcfa198a927faaac8f3cc0ffc4', 'Sri Suryaningsih', '7', '082918289182', 'srie@gmail.com', '3', '0', '2018-10-17');
INSERT INTO `karyawan` VALUES ('16', 'ATU201812051030', '51a92afb5f3b61a1cc5662c768f4bee1c61a6261f24d432af1dcc1d9025986beae3e5e22e9d49183135c451eac07df79b514d01b0c9ffd607f07aada463af508', 'Arief Permana', '1', '081297326740', 'ariefpermana93@gmail.com', '5', '0', '0000-00-00');

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `kode_kategori` varchar(5) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES ('1', '1111', 'Tambahan Kas Kecil');
INSERT INTO `kategori` VALUES ('2', '1112', 'Biaya Operasional');
INSERT INTO `kategori` VALUES ('3', '1113', 'ATK (Alat Tulis Kantor)');
INSERT INTO `kategori` VALUES ('4', '1114', 'Biaya Entertaint');
INSERT INTO `kategori` VALUES ('5', '1115', 'Rupa-rupa Kantor');
INSERT INTO `kategori` VALUES ('6', '1116', 'Fotocopy, Jilid, dan Print');
INSERT INTO `kategori` VALUES ('7', '1117', 'Perjalanan Dinas');

-- ----------------------------
-- Table structure for pengajuan
-- ----------------------------
DROP TABLE IF EXISTS `pengajuan`;
CREATE TABLE `pengajuan` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nik` varchar(16) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `no_pengajuan` varchar(13) NOT NULL,
  `kode_kategori` varchar(5) NOT NULL,
  `keterangan` varchar(110) NOT NULL,
  `harga` int(10) NOT NULL,
  `doc_upload` varchar(120) NOT NULL,
  `status` int(2) NOT NULL,
  `reason` varchar(128) NOT NULL,
  `kode_dept` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pengajuan
-- ----------------------------
INSERT INTO `pengajuan` VALUES ('5', 'ATU201809251004', '2018-09-26', 'NB20180926267', '', 'Transport Ke Luar Kota', '500000', 'SGO_Logo_Horizontal_Putih_CMYK7.jpg', '3', '', '1');
INSERT INTO `pengajuan` VALUES ('6', 'ATU201809251004', '2018-09-26', 'NB20180926289', '', 'Bensin', '500000', 'SGO_Logo_Horizontal_Putih_CMYK8.jpg', '3', '', '1');
INSERT INTO `pengajuan` VALUES ('7', 'ATU201809251004', '2018-09-26', 'NB20180926564', '', 'Biaya makan uang lembur', '50000', 'windows10hero1.jpg', '5', 'Bon tidak jelas gambarnya', '1');
INSERT INTO `pengajuan` VALUES ('8', 'ATU201809251004', '2018-09-29', 'NB20180930225', '', 'Transport Instalasi Perangkat Ke Luar Kota', '1000000', 'windows10hero11.jpg', '3', '', '2');
INSERT INTO `pengajuan` VALUES ('10', 'ATU201809251004', '2018-10-01', 'NB20181001102', '', 'Biaya Hura-hura', '500000', 'windows10hero13.jpg', '3', '', '1');
INSERT INTO `pengajuan` VALUES ('11', 'ATU201809277068', '2018-10-16', 'NB20181016974', '1113', 'Untuk Pembelian Kertas A4', '200000', 'windows10hero14.jpg', '3', '', '7');
INSERT INTO `pengajuan` VALUES ('12', 'ATU201809251004', '2018-10-17', 'NB20181017197', '1112', 'Perjalanan Dinas Keluar Kota', '500000', 'windows10hero15.jpg', '3', '', '1');

-- ----------------------------
-- Table structure for saldo
-- ----------------------------
DROP TABLE IF EXISTS `saldo`;
CREATE TABLE `saldo` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `no_bukti` varchar(16) NOT NULL,
  `no_akun` varchar(5) NOT NULL,
  `keterangan` varchar(120) NOT NULL,
  `debet` int(11) NOT NULL,
  `kredit` int(10) NOT NULL,
  `saldo` int(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of saldo
-- ----------------------------
INSERT INTO `saldo` VALUES ('2', '2018-08-26', '', '', 'Saldo Bulan Agustus', '5000000', '0', '5000000');
INSERT INTO `saldo` VALUES ('3', '2018-09-26', 'NB20180926267', '', 'Transport Ke Luar Kota', '0', '500000', '4500000');
INSERT INTO `saldo` VALUES ('4', '2018-09-26', 'NB20180926289', '', 'Bensin', '0', '500000', '4000000');
INSERT INTO `saldo` VALUES ('5', '2018-09-26', '', '', 'Saldo Bulan September', '5000000', '0', '9000000');
INSERT INTO `saldo` VALUES ('6', '2018-09-26', '', '', 'Saldo Bulan September', '5000000', '0', '14000000');
INSERT INTO `saldo` VALUES ('8', '2018-09-28', '', '1111', 'Penambahan Saldo 28-09-2018', '1000000', '0', '15000000');
INSERT INTO `saldo` VALUES ('9', '2018-09-26', '', '', 'Saldo Bulan September', '5000000', '0', '20000000');
INSERT INTO `saldo` VALUES ('10', '2018-09-30', '', '1111', 'Penambahan Saldo 30-09-2018', '2000000', '0', '22000000');
INSERT INTO `saldo` VALUES ('11', '2018-09-29', 'NB20180930225', '', 'Transport Instalasi Perangkat Ke Luar Kota', '0', '1000000', '21000000');
INSERT INTO `saldo` VALUES ('13', '2018-10-01', 'NB20181001102', '', 'Biaya Hura-hura', '0', '500000', '20500000');
INSERT INTO `saldo` VALUES ('14', '2018-10-04', '', '1111', 'Penambahan Saldo 15-10-2018', '8000000', '0', '28500000');
INSERT INTO `saldo` VALUES ('16', '2018-10-16', 'NB20181016974', '1113', 'Untuk Pembelian Kertas A4', '0', '200000', '28300000');
INSERT INTO `saldo` VALUES ('19', '2018-10-17', 'NB20181017197', '1112', 'Perjalanan Dinas Keluar Kota', '0', '500000', '27800000');
INSERT INTO `saldo` VALUES ('21', '2018-10-17', '', '1111', 'Tambahan Kas Kecil 17 Oct 2018', '10000000', '0', '37800000');
