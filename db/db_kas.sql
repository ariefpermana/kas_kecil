-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2018 at 05:42 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

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
  `kode_akses` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='select * from e_department';

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `kode_department`, `dept`, `kode_akses`) VALUES
(1, '1', 'IT', 5),
(3, '2', 'General Affair', 1),
(4, '3', 'Developer', 5),
(5, '4', 'Finance', 2),
(6, '5', 'Quality Control', 5),
(7, '6', 'Admin Manager', 2),
(8, '7', 'Cashier', 3),
(9, '8', 'Marketing', 5),
(10, '9', 'OB', 5),
(11, '10', 'Direksi', 4);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(10) NOT NULL,
  `nik` varchar(16) NOT NULL,
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
(8, 'ATU201809254061', '8b036d2857447d37c4f2bfcad0bbbcdfdaab6796fd60257c61139549c05ad7d3a456029908c4c0cf06d22b2748c3982aaa49e7ad10254d2fa6d609f93009397b', 'Agis Puspita', 4, '081297326740', 'agis@gmail.com', 2, 0, '2018-09-30'),
(9, 'ATU201809251004', '2289aad83a8fe15e4abbdd0af222f83245d2a255250b49d6836e34b299b9590dabd6072644249033b757f3d49b8fae9ae2808dbea73cbf657e846141e7d9fb03', 'Arief Permana', 10, '081297326740', 'ariefpermana93@gmail.com', 5, 0, '2018-09-29'),
(10, 'ATU201809261001', '84c5fde67e7dc2c67cc9e494699d3b4ac1fe46e0838ae946e3e07221af8dc8a9d4b277702988079793002551ee9dd97736b17937dc7eb0b8eb8884dec66d82c4', 'Asta Maringis', 1, '081297326740', 'asta@gmail.com', 5, 0, '0000-00-00'),
(11, 'ATU201809262009', 'f8d0f685c4e12b9c537519dc26d0ba5864171cc9c587313b15a5e461dff14ab565118a415e6e8cdbdf46cb41a833101d1be6e304b4089f91e4190c3d4273a983', 'Sodikin', 2, '082198918928', 'GA@gmail.com', 1, 0, '2018-09-30'),
(14, 'ATU201809271092', '18ee70abb5d878c1c991065a0aec8197987e6abec9286dd198853737ff21f02e89027e6d23a224b292be4df7475f85059f4b6e82ea2bdde1a32a8e25fd7b8793', 'Dermawan Cahyadi', 10, '082198918928', 'dermawan@gmail.com', 4, 0, '2018-09-27'),
(15, 'ATU201809277068', '1b568692625bbda6ddbd45c7ce923a4ee0b3e102cc945f35b35b7dab1a8a57b359d0471a456d2d09ad426d89142ed98730ed78dcfa198a927faaac8f3cc0ffc4', 'Sri Suryaningsih', 7, '082918289182', 'srie@gmail.com', 3, 0, '2018-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(10) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `no_pengajuan` varchar(15) NOT NULL,
  `keterangan` varchar(110) NOT NULL,
  `harga` int(10) NOT NULL,
  `doc_upload` varchar(120) NOT NULL,
  `status` int(2) NOT NULL,
  `reason` varchar(128) NOT NULL,
  `kode_dept` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `nik`, `tgl_pengajuan`, `no_pengajuan`, `keterangan`, `harga`, `doc_upload`, `status`, `reason`, `kode_dept`) VALUES
(5, 'ATU201809251004', '2018-09-26', 'NB20180926267', 'Transport Ke Luar Kota', 500000, 'SGO_Logo_Horizontal_Putih_CMYK7.jpg', 4, '', '1'),
(6, 'ATU201809251004', '2018-09-26', 'NB20180926289', 'Bensin', 500000, 'SGO_Logo_Horizontal_Putih_CMYK8.jpg', 4, '', '1'),
(7, 'ATU201809251004', '2018-09-26', 'NB20180926564', 'Biaya makan uang lembur', 50000, 'windows10hero1.jpg', 5, 'Bon tidak jelas gambarnya', '1'),
(8, 'ATU201809251004', '2018-09-29', 'NB20180930225', 'Transport Instalasi Perangkat Ke Luar Kota', 1000000, 'windows10hero11.jpg', 4, '', '2');

-- --------------------------------------------------------

--
-- Table structure for table `saldo`
--

CREATE TABLE `saldo` (
  `id` int(10) NOT NULL,
  `date` date NOT NULL,
  `kredit` int(10) NOT NULL,
  `debet` int(11) NOT NULL,
  `no_bukti` varchar(115) NOT NULL,
  `keterangan` varchar(120) NOT NULL,
  `saldo` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saldo`
--

INSERT INTO `saldo` (`id`, `date`, `kredit`, `debet`, `no_bukti`, `keterangan`, `saldo`) VALUES
(2, '2018-08-26', 0, 5000000, '', 'Saldo Bulan Agustus', 5000000),
(3, '2018-09-26', 500000, 0, 'NB20180926267', 'Transport Ke Luar Kota', 4500000),
(4, '2018-09-26', 500000, 0, 'NB20180926289', 'Bensin', 4000000),
(5, '2018-09-26', 0, 5000000, '', 'Saldo Bulan September', 9000000),
(6, '2018-09-26', 0, 5000000, '', 'Saldo Bulan September', 14000000),
(8, '2018-09-28', 0, 1000000, '', 'Penambahan Saldo 28-09-2018', 15000000),
(9, '2018-09-26', 0, 5000000, '', 'Saldo Bulan September', 20000000),
(10, '2018-09-30', 0, 2000000, '', 'Penambahan Saldo 30-09-2018', 22000000),
(11, '2018-09-29', 1000000, 0, 'NB20180930225', 'Transport Instalasi Perangkat Ke Luar Kota', 21000000);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
