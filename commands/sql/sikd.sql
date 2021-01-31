-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 31, 2021 at 10:38 PM
-- Server version: 10.3.27-MariaDB-0+deb10u1
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikd`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun_belanja`
--

CREATE TABLE `akun_belanja` (
  `id_akun` int(11) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `id_daerah` int(11) DEFAULT NULL,
  `kode_akun` mediumtext DEFAULT NULL,
  `nama_akun` mediumtext DEFAULT NULL,
  `is_pendapatan` int(11) DEFAULT NULL,
  `is_bl` int(11) DEFAULT NULL,
  `is_pembiayaan` int(11) DEFAULT NULL,
  `id_unik` mediumtext DEFAULT NULL,
  `is_locked` int(11) DEFAULT NULL,
  `set_input` int(11) DEFAULT NULL,
  `set_lokus` mediumtext DEFAULT NULL,
  `is_gaji_asn` int(11) DEFAULT NULL,
  `is_barjas` int(11) DEFAULT NULL,
  `is_bunga` int(11) DEFAULT NULL,
  `is_subsidi` int(11) DEFAULT NULL,
  `is_bagi_hasil` int(11) DEFAULT NULL,
  `is_bankeu_umum` int(11) DEFAULT NULL,
  `is_bankeu_khusus` int(11) DEFAULT NULL,
  `is_btt` int(11) DEFAULT NULL,
  `is_hibah_brg` int(11) DEFAULT NULL,
  `is_hibah_uang` int(11) DEFAULT NULL,
  `is_sosial_brg` int(11) DEFAULT NULL,
  `is_sosial_uang` int(11) DEFAULT NULL,
  `is_bos` int(11) DEFAULT NULL,
  `is_modal_tanah` int(11) DEFAULT NULL,
  `status` mediumtext DEFAULT NULL,
  `belanja` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `belanja`
--

CREATE TABLE `belanja` (
  `id_urusan` int(11) DEFAULT NULL,
  `kode_urusan` mediumtext DEFAULT NULL,
  `nama_urusan` mediumtext DEFAULT NULL,
  `id_bidang_urusan` int(11) DEFAULT NULL,
  `kode_bidang_urusan` mediumtext DEFAULT NULL,
  `nama_bidang_urusan` mediumtext DEFAULT NULL,
  `id_program` int(11) DEFAULT NULL,
  `kode_program` mediumtext DEFAULT NULL,
  `nama_program` mediumtext DEFAULT NULL,
  `kode_skpd` mediumtext DEFAULT NULL,
  `nama_skpd` mediumtext DEFAULT NULL,
  `kode_sub_skpd` mediumtext DEFAULT NULL,
  `nama_sub_skpd` mediumtext DEFAULT NULL,
  `id_giat` int(11) DEFAULT NULL,
  `kode_giat` mediumtext DEFAULT NULL,
  `nama_giat` mediumtext DEFAULT NULL,
  `id_sub_giat` int(11) DEFAULT NULL,
  `kode_sub_giat` mediumtext DEFAULT NULL,
  `nama_sub_giat` mediumtext DEFAULT NULL,
  `kode_akun` mediumtext DEFAULT NULL,
  `nama_akun` mediumtext DEFAULT NULL,
  `rincian` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fungsi`
--

CREATE TABLE `fungsi` (
  `kode_fungsi` mediumtext DEFAULT NULL,
  `kode_sub_fungsi` mediumtext DEFAULT NULL,
  `kode_urusan` mediumtext DEFAULT NULL,
  `kode_bidang` mediumtext DEFAULT NULL,
  `sub_fungsi` mediumtext DEFAULT NULL,
  `fungsi` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `skpd`
--

CREATE TABLE `skpd` (
  `id_unit` int(11) DEFAULT NULL,
  `id_skpd` int(11) DEFAULT NULL,
  `kode_skpd` varchar(200) DEFAULT NULL,
  `nama_skpd` varchar(200) DEFAULT NULL,
  `kunci_skpd` int(11) DEFAULT NULL,
  `id_setup_unit` int(11) DEFAULT NULL,
  `is_skpd` int(11) DEFAULT NULL,
  `posisi` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sub_kegiatan`
--

CREATE TABLE `sub_kegiatan` (
  `id_urusan` int(11) DEFAULT NULL,
  `kode_urusan` mediumtext DEFAULT NULL,
  `nama_urusan` mediumtext DEFAULT NULL,
  `id_bidang_urusan` int(11) DEFAULT NULL,
  `kode_bidang_urusan` mediumtext DEFAULT NULL,
  `nama_bidang_urusan` mediumtext DEFAULT NULL,
  `id_program` int(11) DEFAULT NULL,
  `kode_program` mediumtext DEFAULT NULL,
  `nama_program` mediumtext DEFAULT NULL,
  `id_giat` int(11) DEFAULT NULL,
  `kode_giat` mediumtext DEFAULT NULL,
  `nama_giat` mediumtext DEFAULT NULL,
  `id_sub_giat` int(11) DEFAULT NULL,
  `kode_sub_giat` mediumtext DEFAULT NULL,
  `nama_sub_giat` mediumtext DEFAULT NULL,
  `is_locked` int(11) DEFAULT NULL,
  `status` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `urusan_bidang`
--

CREATE TABLE `urusan_bidang` (
  `id_bidang_urusan` int(11) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `id_daerah` int(11) DEFAULT NULL,
  `id_urusan` int(11) DEFAULT NULL,
  `id_fungsi` int(11) DEFAULT NULL,
  `kode_urusan` varchar(200) DEFAULT NULL,
  `nama_urusan` varchar(200) DEFAULT NULL,
  `kode_bidang_urusan` varchar(200) DEFAULT NULL,
  `nama_bidang_urusan` varchar(200) DEFAULT NULL,
  `id_unik` varchar(200) DEFAULT NULL,
  `is_locked` int(11) DEFAULT NULL,
  `created_user` int(11) DEFAULT NULL,
  `created_at` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
