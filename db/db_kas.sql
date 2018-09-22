-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2018 at 09:47 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `password` varchar(155) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `emp_id`, `password`, `status`) VALUES
(1, 'Q-001', 'a205884cdb8e7f56310b4402ab6730d1ac5b666ca1670c0d0b7e17e54a2069953452611c6e7bccc474ec5ae7a8017e982484dd0f7919133a0c1c1c01b4b302c0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(10) NOT NULL,
  `kode_department` varchar(5) NOT NULL,
  `dept` varchar(15) NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='select * from e_department';

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `kode_department`, `dept`, `status`) VALUES
(1, '1', 'IT', 'Y'),
(3, '2', 'GA', 'Y'),
(4, '3', 'Developer', 'Y'),
(5, '4', 'Finance', 'Y'),
(6, '5', 'Quality Control', 'Y'),
(7, '6', 'General Affair', 'Y'),
(8, '7', 'Cashier', 'Y'),
(9, '8', 'Marketing', 'Y'),
(10, '9', 'OB', 'Y'),
(11, '10', 'Direksi', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(10) NOT NULL,
  `nik` varchar(12) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nama_lengkap` varchar(45) NOT NULL,
  `kode_department` int(10) NOT NULL,
  `gsm` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `akses` int(3) NOT NULL,
  `update_password` int(11) NOT NULL,
  `last_login` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nik`, `password`, `nama_lengkap`, `kode_department`, `gsm`, `email`, `akses`, `update_password`, `last_login`) VALUES
(1, '20180001', 'd90456ccf61a746a8e332bcda9b4290a84761b68e2a09bd0083b668b7fd666305036589dca7a0ac559be58864a72c874d5f408b63d04c1a847b801ea66e42c17', 'Tiopan indra', 0, '089687927359', 'tiopan.wahyudi@gmail.com', 0, 0, '2018-09-22'),
(2, '20180002', '', 'tiopan wahyudi', 0, '089687927359', 'wahyudi@gmail.com', 0, 0, '0000-00-00'),
(3, '20180003', '', 'ga', 3, '089687927359', 'ga@gmail.com', 2, 0, '0000-00-00'),
(4, '20180004', '', 'manager', 1, '089687927359', 'manager@gmail.com', 3, 0, '0000-00-00'),
(5, '20180005', '', 'cashier', 2, '089687927359', 'cashier@gmail.com', 4, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_active` int(1) NOT NULL,
  `is_parent` int(1) NOT NULL,
  `akses` varchar(10) NOT NULL,
  `aktif` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `link`, `icon`, `is_active`, `is_parent`, `akses`, `aktif`) VALUES
(15, 'menu management', 'menu', 'fa fa-list-alt', 1, 5, '5', 'Y'),
(36, 'pengajuan', 'tbl_pengajuan', 'fa fa-money', 1, 0, '0', 'Y'),
(37, 'GA Verifikasi', 'tbl_ga', 'fa fa-plus', 1, 0, '2', 'Y'),
(38, 'Keuangan Verifikasi', 'tbl_manager', 'fa fa-plus', 1, 0, '3', 'Y'),
(39, 'upload bukti', 'tbl_upload', 'fa fa-camera', 1, 0, '0', 'Y'),
(40, 'report', 'tbl_report', 'fa fa-list', 1, 0, '3', 'Y'),
(41, 'report bulanan', 'tbl_report', 'fa fa-list', 1, 40, '3', 'Y'),
(42, 'report departemen', 'tbl_report', 'fa fa-list', 1, 41, '3', 'Y'),
(43, 'report progres', 'tbl_report_progress', 'fa fa-list', 1, 40, '3', 'Y'),
(44, 'cetak ', 'tbl_cetak', 'fa fa-list', 1, 0, '4', 'Y'),
(45, 'bukti transaksi', 'tbl_kasirtransaksi', 'fa fa-list', 1, 0, '4', 'Y'),
(46, 'jurnal', 'tbl_jurnal', 'fa fa-book', 1, 0, '3', 'Y'),
(47, 'input saldo', 'tbl_saldo', 'fa fa-pencil', 1, 0, '3', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(10) NOT NULL,
  `email_karyawan` varchar(100) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `no_pengajuan` int(10) NOT NULL,
  `keterangan` varchar(110) NOT NULL,
  `harga` int(10) NOT NULL,
  `ver_ga` int(2) NOT NULL,
  `ver_keuangan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `email_karyawan`, `tgl_pengajuan`, `no_pengajuan`, `keterangan`, `harga`, `ver_ga`, `ver_keuangan`) VALUES
(1, 'tiopan.wahyudi@gmail.com', '2018-09-14', 201809, 'Pembelian galon minum', 1112, 0, 0),
(2, 'tiopan.wahyudi@gmail.com', '2018-09-15', 201810, 'Pembelian Oli Mesin Mobil GA', 34500, 0, 0),
(3, 'tiopan.wahyudi@gmail.com', '2018-09-14', 201811, 'Pembelian sparepart motor', 3421, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `saldo`
--

CREATE TABLE `saldo` (
  `id` int(10) NOT NULL,
  `date` date NOT NULL,
  `kredit` int(10) NOT NULL,
  `debit` int(11) NOT NULL,
  `keterangan` varchar(115) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saldo`
--

INSERT INTO `saldo` (`id`, `date`, `kredit`, `debit`, `keterangan`) VALUES
(2, '2018-09-12', 5000000, 0, 'Penambahan saldo bulanan'),
(3, '2018-09-12', 0, 500000, 'Pembelian Oli Mesin Mobil GA'),
(4, '2018-09-12', 0, 800000, 'Pembelian Oli Mesin Mobil GA');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(10) NOT NULL,
  `tgl_upload` date NOT NULL,
  `nomor_pengajuan` varchar(110) NOT NULL,
  `file` varchar(115) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `tgl_upload`, `nomor_pengajuan`, `file`) VALUES
(2, '2018-09-03', '20180000', 'file_8563.png'),
(3, '2018-09-03', '20180001\r\n', 'file_85563.png'),
(4, '2018-09-14', '20180001', 'file_13526.jpeg'),
(5, '2018-09-14', '20180001', 'file_17176.jpeg'),
(6, '2018-09-14', '20180001', 'file_4465.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
