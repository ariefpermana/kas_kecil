-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17 Sep 2018 pada 06.00
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `emp_id` varchar(155) NOT NULL,
  `password` varchar(155) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `emp_id`, `password`, `status`) VALUES
(1, 'Q-001', 'admin', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `e_department`
--

CREATE TABLE `e_department` (
  `id` int(10) NOT NULL,
  `dept` varchar(15) NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='select * from e_department';

--
-- Dumping data untuk tabel `e_department`
--

INSERT INTO `e_department` (`id`, `dept`, `status`) VALUES
(1, 'IT', 'Y'),
(3, 'GA', 'Y'),
(4, 'developer', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `e_karyawan`
--

CREATE TABLE `e_karyawan` (
  `id` int(10) NOT NULL,
  `nik` varchar(12) NOT NULL,
  `nama_lengkap` varchar(45) NOT NULL,
  `id_department` int(10) NOT NULL,
  `id_jabatan` int(1) NOT NULL,
  `gsm` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `akses` int(3) NOT NULL,
  `level_jabatan` varchar(45) NOT NULL,
  `update_password` enum('N','Y') NOT NULL,
  `move_password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `e_karyawan`
--

INSERT INTO `e_karyawan` (`id`, `nik`, `nama_lengkap`, `id_department`, `id_jabatan`, `gsm`, `email`, `level`, `akses`, `level_jabatan`, `update_password`, `move_password`) VALUES
(1, '20180001', 'Tiopan indra', 1, 1, '089687927359', 'tiopan.wahyudi@gmail.com', 0, 0, '0', '', ''),
(2, '20180002', 'tiopan wahyudi', 1, 1, '089687927359', 'wahyudi@gmail.com', 0, 0, '0', '', ''),
(3, '20180003', 'ga', 1, 1, '089687927359', 'ga@gmail.com', 2, 2, '0', '', ''),
(4, '20180004', 'manager', 1, 1, '089687927359', 'manager@gmail.com', 3, 3, '0', '', ''),
(5, '20180005', 'cashier', 1, 1, '089687927359', 'cashier@gmail.com', 4, 4, '0', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
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
-- Dumping data untuk tabel `menu`
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
-- Struktur dari tabel `tbl_pengajuan`
--

CREATE TABLE `tbl_pengajuan` (
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
-- Dumping data untuk tabel `tbl_pengajuan`
--

INSERT INTO `tbl_pengajuan` (`id`, `email_karyawan`, `tgl_pengajuan`, `no_pengajuan`, `keterangan`, `harga`, `ver_ga`, `ver_keuangan`) VALUES
(1, 'tiopan.wahyudi@gmail.com', '2018-09-14', 201809, 'Pembelian galon minum', 1112, 0, 0),
(2, 'tiopan.wahyudi@gmail.com', '2018-09-15', 201810, 'Pembelian Oli Mesin Mobil GA', 34500, 0, 0),
(3, 'tiopan.wahyudi@gmail.com', '2018-09-14', 201811, 'Pembelian sparepart motor', 3421, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_saldo`
--

CREATE TABLE `tbl_saldo` (
  `id` int(10) NOT NULL,
  `date` date NOT NULL,
  `kredit` int(10) NOT NULL,
  `debit` int(11) NOT NULL,
  `keterangan` varchar(115) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_saldo`
--

INSERT INTO `tbl_saldo` (`id`, `date`, `kredit`, `debit`, `keterangan`) VALUES
(2, '2018-09-12', 5000000, 0, 'Penambahan saldo bulanan'),
(3, '2018-09-12', 0, 500000, 'Pembelian Oli Mesin Mobil GA'),
(4, '2018-09-12', 0, 800000, 'Pembelian Oli Mesin Mobil GA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_upload`
--

CREATE TABLE `tbl_upload` (
  `id` int(10) NOT NULL,
  `tgl_upload` date NOT NULL,
  `nomor_pengajuan` varchar(110) NOT NULL,
  `file` varchar(115) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_upload`
--

INSERT INTO `tbl_upload` (`id`, `tgl_upload`, `nomor_pengajuan`, `file`) VALUES
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
-- Indexes for table `e_department`
--
ALTER TABLE `e_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_karyawan`
--
ALTER TABLE `e_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_saldo`
--
ALTER TABLE `tbl_saldo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tbl_upload`
--
ALTER TABLE `tbl_upload`
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
-- AUTO_INCREMENT for table `e_department`
--
ALTER TABLE `e_department`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `e_karyawan`
--
ALTER TABLE `e_karyawan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_saldo`
--
ALTER TABLE `tbl_saldo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_upload`
--
ALTER TABLE `tbl_upload`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
