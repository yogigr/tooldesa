-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2016 at 07:15 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tooldesa`
--

-- --------------------------------------------------------

--
-- Table structure for table `ayah`
--

CREATE TABLE `ayah` (
  `id_ayah` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `umur` varchar(2) NOT NULL,
  `tanggal_lahir` varchar(2) NOT NULL,
  `bulan_lahir` varchar(2) NOT NULL,
  `tahun_lahir` varchar(4) NOT NULL,
  `pekerjaan` varchar(2) NOT NULL,
  `alamat` text NOT NULL,
  `desa` varchar(20) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `kabupaten` varchar(20) NOT NULL,
  `provinsi` varchar(20) NOT NULL,
  `kewarganegaraan` varchar(1) NOT NULL,
  `kebangsaan` varchar(50) NOT NULL,
  `id_bayi` int(11) NOT NULL,
  `id_jenazah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ayah`
--

INSERT INTO `ayah` (`id_ayah`, `nik`, `no_kk`, `nama_ayah`, `umur`, `tanggal_lahir`, `bulan_lahir`, `tahun_lahir`, `pekerjaan`, `alamat`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `kewarganegaraan`, `kebangsaan`, `id_bayi`, `id_jenazah`) VALUES
(1, '3214005006008051', '3214005006008050', 'yaya ardaya', '41', '11', '07', '1977', '15', 'blok a rt 003 rw 001', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', '1', '-', 79, 0),
(2, '3218005006008081', '3218005006008080', 'Asep Yusup', '30', '13', '07', '1976', '15', 'blok a rt 003 rw 001', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', '1', '-', 78, 0),
(3, '3214005006008051', '3214005006008050', 'yaya ardaya', '41', '13', '08', '1967', '15', 'blok a rt 003 rw 001', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', '1', '-', 81, 0),
(10, '3214005006008071', '', 'tarja', '50', '01', '02', '1960', '4', 'blok a rt 004 rw 001', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', '', '', 0, 8),
(12, '3214005006008041', '', 'Karna Nurjaman', '60', '07', '03', '1960', '04', 'blok a rt 003 rw 001', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', '', '', 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `bayi`
--

CREATE TABLE `bayi` (
  `id_bayi` int(11) NOT NULL,
  `nama_bayi` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `tempat_dilahirkan` varchar(1) NOT NULL,
  `tempat_kelahiran` varchar(20) NOT NULL,
  `hari_lahir` varchar(10) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `waktu_lahir` varchar(5) NOT NULL,
  `jenis_kelahiran` varchar(1) NOT NULL,
  `kelahiran_ke` varchar(1) NOT NULL,
  `penolong_kelahiran` varchar(1) NOT NULL,
  `berat_bayi` varchar(2) NOT NULL,
  `panjang_bayi` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bayi`
--

INSERT INTO `bayi` (`id_bayi`, `nama_bayi`, `jenis_kelamin`, `tempat_dilahirkan`, `tempat_kelahiran`, `hari_lahir`, `tanggal_lahir`, `waktu_lahir`, `jenis_kelahiran`, `kelahiran_ke`, `penolong_kelahiran`, `berat_bayi`, `panjang_bayi`) VALUES
(78, 'Aisya Raya Putri Yati dan Yusup', '2', '1', 'Bandung', 'rabu', '2016-07-13', '20.30', '1', '2', '2', '10', '50'),
(79, 'Krisna Mukti', '1', '4', 'Majajalengka', 'senin', '2016-07-14', '18.30', '1', '1', '2', '10', '50'),
(81, 'Bagus Mukti', '1', '1', 'majalengka', 'rabu', '2016-07-14', '18.30', '1', '2', '3', '10', '50');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_anggota_pemohon_kk`
--

CREATE TABLE `daftar_anggota_pemohon_kk` (
  `nik_anggota` varchar(16) NOT NULL,
  `nama_anggota` varchar(100) NOT NULL,
  `shdk` varchar(2) NOT NULL,
  `nik_pemohon` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_anggota_pemohon_kk`
--

INSERT INTO `daftar_anggota_pemohon_kk` (`nik_anggota`, `nama_anggota`, `shdk`, `nik_pemohon`) VALUES
('3212990300299920', 'Krisna Bagus', '03', '3212990300299920'),
('3212990300299921', 'Bagus Krisna', '03', '3212990300299920'),
('3212990300299930', 'Ata Kasta', '01', '3212990300299930'),
('3212990300299931', 'Ibu Nining', '02', '3212990300299930'),
('3212990300299932', 'Yati Nurhayati', '03', '3212990300299930'),
('3212990300299933', 'Baban Subandi', '03', '3212990300299930'),
('3212990300299934', 'Yogi Gilang Ramadhan', '03', '3212990300299930'),
('3213224445456670', 'Yaya Ardaya', '01', '3213224445456670'),
('3213224445456671', 'Ceu Neng', '02', '3213224445456670'),
('3213224445456673', 'Yogi Gilang Ramadhan', '01', '3213224445456673'),
('3213224445456674', 'Baban Subandi', '02', '3213224445456673'),
('3213224445456676', 'Dodi', '01', '3213224445456676'),
('3213224445456677', 'Emed', '02', '3213224445456676'),
('3213224445456679', 'Turangga', '01', '3213224445456679'),
('3213224445456680', 'Emis', '02', '3213224445456679'),
('3213224445456682', 'Amir', '01', '3213224445456682'),
('3213224445456683', 'Turi''ah', '02', '3213224445456682'),
('3213224445456685', 'Minta', '01', '3213224445456685'),
('3213224445456686', 'Eti', '02', '3213224445456685'),
('3213224445456688', 'Mas Bubur', '01', '3213224445456688'),
('3213224445456689', 'Nira', '02', '3213224445456688'),
('3213224445456691', 'Iding', '01', '3213224445456691'),
('3213224445456692', 'Ami', '02', '3213224445456691'),
('3213224445456694', 'Uminta', '01', '3213224445456694'),
('3213224445456695', 'Uni', '02', '3213224445456694'),
('3213224445456697', 'Muslim', '01', '3213224445456697'),
('3213224445456698', 'Senul', '02', '3213224445456697'),
('3213224445456700', 'Sunad', '01', '3213224445456700'),
('3213224445456701', 'Kayah', '02', '3213224445456700');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_anggota_pemohon_kk_2`
--

CREATE TABLE `daftar_anggota_pemohon_kk_2` (
  `nik_anggota` varchar(16) NOT NULL,
  `nama_anggota` varchar(100) NOT NULL,
  `shdk` varchar(2) NOT NULL,
  `nik_pemohon` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_anggota_pemohon_kk_2`
--

INSERT INTO `daftar_anggota_pemohon_kk_2` (`nik_anggota`, `nama_anggota`, `shdk`, `nik_pemohon`) VALUES
('3214895876997008', 'yogi gilang ramadhan', '03', '3214895876997008'),
('3214895876997009', 'ata kasta', '01', '3214895876997008'),
('3214895876997010', 'baban subandi', '03', '3214895876997008'),
('3214895876997018', 'yaya ardaya', '01', '3214895876997018'),
('3214895876997019', 'Ceu Neng', '02', '3214895876997018'),
('3214895876997020', 'Krisna Mukti', '03', '3214895876997018');

-- --------------------------------------------------------

--
-- Table structure for table `ibu`
--

CREATE TABLE `ibu` (
  `id_ibu` int(11) NOT NULL,
  `nik_ibu` varchar(16) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `umur` varchar(2) NOT NULL,
  `tanggal_lahir` varchar(2) NOT NULL,
  `bulan_lahir` varchar(2) NOT NULL,
  `tahun_lahir` varchar(4) NOT NULL,
  `pekerjaan` varchar(2) NOT NULL,
  `alamat` text NOT NULL,
  `desa` varchar(20) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `kabupaten` varchar(20) NOT NULL,
  `provinsi` varchar(20) NOT NULL,
  `kewarganegaraan` varchar(1) NOT NULL,
  `kebangsaan` varchar(20) NOT NULL,
  `tgl_pencatatan_kawin` date NOT NULL,
  `id_bayi` int(11) NOT NULL,
  `id_jenazah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ibu`
--

INSERT INTO `ibu` (`id_ibu`, `nik_ibu`, `nama_ibu`, `umur`, `tanggal_lahir`, `bulan_lahir`, `tahun_lahir`, `pekerjaan`, `alamat`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `kewarganegaraan`, `kebangsaan`, `tgl_pencatatan_kawin`, `id_bayi`, `id_jenazah`) VALUES
(1, '3214005006008052', 'neneng juminten', '40', '15', '08', '1978', '15', 'blok a rt 003 rw 001', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawabarat', '1', '-', '2015-04-01', 79, 0),
(2, '3218005006008082', 'yati nurhayati', '30', '14', '09', '1977', '15', 'blok a rt 003 rw 001', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', '1', '-', '2014-09-02', 78, 0),
(3, '3214005006008052', 'neneng juminten', '40', '12', '08', '1978', '15', 'blok a rt 003 rw 001', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', '1', '-', '2014-12-01', 81, 0),
(12, '3214005006008072', 'wa aya', '50', '01', '01', '1960', '2', 'blok a rt 004 rw 001', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', '', '', '0000-00-00', 0, 8),
(14, '3214005006008042', 'Sayep Munayep', '60', '03', '03', '1960', '02', 'blok a rt 003 rw 001', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', '', '', '0000-00-00', 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `jenazah`
--

CREATE TABLE `jenazah` (
  `id_jenazah` int(11) NOT NULL,
  `nik_jenazah` varchar(16) NOT NULL,
  `nama_jenazah` varchar(50) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `nama_kepala_keluarga` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `tanggal_lahir` varchar(2) NOT NULL,
  `bulan_lahir` varchar(2) NOT NULL,
  `tahun_lahir` varchar(4) NOT NULL,
  `umur` varchar(2) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `kode_prov` varchar(2) NOT NULL,
  `kode_kab` varchar(2) NOT NULL,
  `agama` varchar(1) NOT NULL,
  `pekerjaan` varchar(2) NOT NULL,
  `alamat` text NOT NULL,
  `desa` varchar(20) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `kabupaten` varchar(20) NOT NULL,
  `provinsi` varchar(20) NOT NULL,
  `anak_ke` varchar(2) NOT NULL,
  `tanggal_kematian` date NOT NULL,
  `pukul_kematian` varchar(5) NOT NULL,
  `sebab_kematian` varchar(1) NOT NULL,
  `tempat_kematian` varchar(50) NOT NULL,
  `yang_menerangkan` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenazah`
--

INSERT INTO `jenazah` (`id_jenazah`, `nik_jenazah`, `nama_jenazah`, `no_kk`, `nama_kepala_keluarga`, `jenis_kelamin`, `tanggal_lahir`, `bulan_lahir`, `tahun_lahir`, `umur`, `tempat_lahir`, `kode_prov`, `kode_kab`, `agama`, `pekerjaan`, `alamat`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `anak_ke`, `tanggal_kematian`, `pukul_kematian`, `sebab_kematian`, `tempat_kematian`, `yang_menerangkan`) VALUES
(8, '3214005006008073', 'yadi rusmayadi', '3214005006008070', 'Tarja', '1', '10', '05', '1984', '35', 'majalengka', '32', '10', '1', '01', 'blok a rt 004 rw 001', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', '2', '2016-07-14', '01.50', '1', 'majalengka', '2'),
(10, '3214005006008043', 'Asnam Nurjaman', '3214005006008040', 'Karna Nurjaman', '1', '10', '06', '1983', '30', 'majalengka', '32', '10', '1', '01', 'blok a rt 003 rw 001', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', '3', '2016-07-15', '02.50', '1', 'majalengka', '2');

-- --------------------------------------------------------

--
-- Table structure for table `pbbdesa`
--

CREATE TABLE `pbbdesa` (
  `nop` varchar(18) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `luas_tanah` int(11) NOT NULL,
  `luas_bangunan` int(11) NOT NULL,
  `njop_tanah` int(11) NOT NULL,
  `njop_bangunan` int(11) NOT NULL,
  `tagihan` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pbbdesa`
--

INSERT INTO `pbbdesa` (`nop`, `nama`, `luas_tanah`, `luas_bangunan`, `njop_tanah`, `njop_bangunan`, `tagihan`, `keterangan`, `tanggal_input`) VALUES
('321209001900801455', 'Yogi Gilang ramadhan', 100, 200, 2000, 3000, 25000, '', '2016-07-26 10:03:19'),
('321209001900801456', 'baban subandi', 60, 80, 5000, 6000, 35000, '', '2016-07-26 10:04:07'),
('321209001900801457', 'Ata Kasta', 78, 89, 7000, 9000, 58000, '', '2016-07-26 10:04:45'),
('321209001900801458', 'Yaya Ardaya', 85, 85, 6000, 6000, 12000, '', '2016-07-26 10:05:18'),
('321209001900801459', 'ma''at', 50, 50, 5000, 5000, 10000, '', '2016-07-26 10:07:22'),
('321209001900801460', 'Aminta', 100, 200, 10000, 20000, 30000, '', '2016-07-26 10:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `pbbdesa_bayar`
--

CREATE TABLE `pbbdesa_bayar` (
  `id_bayar` int(11) NOT NULL,
  `nop` varchar(18) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tagihan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelapor`
--

CREATE TABLE `pelapor` (
  `id_pelapor` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `umur` varchar(2) NOT NULL,
  `tanggal_lahir` varchar(2) NOT NULL,
  `bulan_lahir` varchar(2) NOT NULL,
  `tahun_lahir` varchar(4) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `pekerjaan` varchar(2) NOT NULL,
  `alamat` text NOT NULL,
  `desa` varchar(20) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `kabupaten` varchar(20) NOT NULL,
  `provinsi` varchar(20) NOT NULL,
  `id_bayi` int(11) NOT NULL,
  `id_jenazah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelapor`
--

INSERT INTO `pelapor` (`id_pelapor`, `nik`, `nama`, `umur`, `tanggal_lahir`, `bulan_lahir`, `tahun_lahir`, `jenis_kelamin`, `pekerjaan`, `alamat`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `id_bayi`, `id_jenazah`) VALUES
(1, '3214005006008053', 'Ferry Faula Rizal', '30', '', '', '', '1', '15', 'blok a rt 003 rw 001', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', 79, 0),
(2, '3218005006008083', 'yogi gilang ramadhan', '25', '', '', '', '1', '15', 'blok a rt 003 rw 001', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', 78, 0),
(3, '3214005006008053', 'Ferry Faula Rizal', '30', '', '', '', '1', '15', 'blok a rt 003 rw 001', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', 81, 0),
(11, '3214005006008074', 'yogi gilang ramadhan', '25', '19', '04', '1988', '', '15', 'blok a rt 003 rw 001', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', 0, 8),
(13, '3214005006008044', 'Ma''nun Nurkholis', '50', '04', '04', '1965', '', '08', 'blok a rt 003 rw 001', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `pemohon_kk`
--

CREATE TABLE `pemohon_kk` (
  `nik_pemohon` varchar(16) NOT NULL,
  `nama_pemohon` varchar(100) NOT NULL,
  `no_kk_semula` varchar(16) NOT NULL,
  `alamat_pemohon` varchar(255) NOT NULL,
  `rt` varchar(3) NOT NULL,
  `rw` varchar(3) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `propinsi` varchar(50) NOT NULL,
  `kodepos` varchar(5) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alasan_permohonan` varchar(1) NOT NULL,
  `jumlah_anggota_keluarga` int(2) DEFAULT NULL,
  `tanggal_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemohon_kk`
--

INSERT INTO `pemohon_kk` (`nik_pemohon`, `nama_pemohon`, `no_kk_semula`, `alamat_pemohon`, `rt`, `rw`, `desa`, `kecamatan`, `kabupaten`, `propinsi`, `kodepos`, `telepon`, `alasan_permohonan`, `jumlah_anggota_keluarga`, `tanggal_input`) VALUES
('3212990300299920', 'Krisna Mukti', '3212990300299919', 'Blok A', '003', '001', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', '45472', '511114', '2', 2, '2016-06-28 07:28:38'),
('3212990300299930', 'Ata Kasta', '3212990300299929', 'Blok A', '003', '001', 'Rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', '45472', '511114', '2', 5, '2016-06-27 19:44:11'),
('3213224445456670', 'Yaya Ardaya', '3213224445456672', 'Blok A', '003', '001', 'Rajagaluhlor', 'Rajagaluh', 'Majalengka', 'Jawa Barat', '45472', '-', '2', 2, '2016-06-24 15:19:39'),
('3213224445456673', 'Yogi Gilang Ramadhan', '3213224445456675', 'Blok A', '003', '001', 'Rajagaluhlor', 'Rajagaluh', 'Majalengka', 'Jawa Barat', '45472', '-', '2', 2, '2016-06-24 13:59:04'),
('3213224445456676', 'Dodi', '3213224445456678', 'Blok A', '003', '001', 'Rajagaluhlor', 'Rajagaluh', 'Majalengka', 'Jawa Barat', '45472', '-', '2', 2, '2016-06-24 14:01:27'),
('3213224445456679', 'Turangga', '3213224445456681', 'Blok A', '003', '001', 'Rajagaluhlor', 'Rajagaluh', 'Majalengka', 'Jawa Barat', '45472', '-', '1', 2, '2016-06-24 14:04:06'),
('3213224445456682', 'Amir', '3213224445456684', 'Blok A', '003', '001', 'Rajagaluhlor', 'Rajagaluh', 'Majalengka', 'Jawa Barat', '45472', '-', '1', 2, '2016-06-24 14:08:27'),
('3213224445456685', 'Minta', '3213224445456687', 'Blok A', '003', '001', 'Rajagaluhlor', 'Rajagaluh', 'Majalengka', 'Jawa Barat', '45472', '-', '2', 2, '2016-06-24 14:11:39'),
('3213224445456688', 'Mas Bubur', '3213224445456690', 'Blok A', '003', '001', 'Rajagaluhlor', 'Rajagaluh', 'Majalengka', 'Jawa Barat', '45472', '-', '1', 2, '2016-06-24 14:14:14'),
('3213224445456691', 'Iding', '3213224445456693', 'Blok A', '003', '001', 'Rajagaluhlor', 'Rajagaluh', 'Majalengka', 'Jawa Barat', '45472', '-', '2', 2, '2016-06-24 14:15:54'),
('3213224445456694', 'Uminta', '3213224445456696', 'Blok A', '003', '001', 'Rajagaluhlor', 'Rajagaluh', 'Majalengka', 'Jawa Barat', '45472', '-', '2', 2, '2016-06-24 14:18:58'),
('3213224445456697', 'Muslim', '3213224445456699', 'Blok A', '003', '001', 'Rajagaluhlor', 'Rajagaluh', 'Majalengka', 'Jawa Barat', '45472', '-', '1', 2, '2016-06-24 14:21:59'),
('3213224445456700', 'Sunad', '3213224445456702', 'Blok A', '003', '001', 'Rajagaluhlor', 'Rajagaluh', 'Majalengka', 'Jawa Barat', '45472', '-', '2', 2, '2016-06-24 14:23:59');

-- --------------------------------------------------------

--
-- Table structure for table `pemohon_pindah`
--

CREATE TABLE `pemohon_pindah` (
  `no_form` varchar(20) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `nama_kepala_keluarga` varchar(25) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `rt` varchar(3) NOT NULL,
  `rw` varchar(3) NOT NULL,
  `dusun` varchar(20) NOT NULL,
  `desa` varchar(20) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `kabupaten` varchar(20) NOT NULL,
  `provinsi` varchar(20) NOT NULL,
  `kodepos` varchar(5) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `nik_pemohon` varchar(16) NOT NULL,
  `nama_pemohon` varchar(25) NOT NULL,
  `tipe_pindah` varchar(20) NOT NULL,
  `alasan_pindah` varchar(1) NOT NULL,
  `alamat_tujuan` varchar(50) NOT NULL,
  `rt_tujuan` varchar(3) NOT NULL,
  `rw_tujuan` varchar(3) NOT NULL,
  `dusun_tujuan` varchar(20) NOT NULL,
  `desa_tujuan` varchar(20) NOT NULL,
  `kecamatan_tujuan` varchar(20) NOT NULL,
  `kabupaten_tujuan` varchar(20) NOT NULL,
  `provinsi_tujuan` varchar(20) NOT NULL,
  `kodepos_tujuan` varchar(5) NOT NULL,
  `telepon_tujuan` varchar(15) NOT NULL,
  `jenis_kepindahan` varchar(1) NOT NULL,
  `status_kk_yang_tidak_pindah` varchar(1) NOT NULL,
  `status_kk_yang_pindah` varchar(1) NOT NULL,
  `jumlah_anggota_keluarga_yang_pindah` varchar(2) NOT NULL,
  `waktu_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemohon_pindah`
--

INSERT INTO `pemohon_pindah` (`no_form`, `no_kk`, `nama_kepala_keluarga`, `alamat`, `rt`, `rw`, `dusun`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `kodepos`, `telepon`, `nik_pemohon`, `nama_pemohon`, `tipe_pindah`, `alasan_pindah`, `alamat_tujuan`, `rt_tujuan`, `rw_tujuan`, `dusun_tujuan`, `desa_tujuan`, `kecamatan_tujuan`, `kabupaten_tujuan`, `provinsi_tujuan`, `kodepos_tujuan`, `telepon_tujuan`, `jenis_kepindahan`, `status_kk_yang_tidak_pindah`, `status_kk_yang_pindah`, `jumlah_anggota_keluarga_yang_pindah`, `waktu_input`) VALUES
('20160702003', '3215008003697840', 'eyo arnaya', 'blok a', '003', '001', 'iplik mukti', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', '45472', '089245678145', '3215008003697841', 'eyo arnaya', 'antar kecamatan', '4', 'blok d', '003', '001', 'marijuana', 'argalingga', 'maja', 'majalengka', 'jawa barat', '45470', '087314567832', '2', '-', '2', '4', '2016-07-08 08:09:25'),
('20160702004', '3215008003697850', 'h. emed', 'blok a', '003', '001', 'iplik mukti', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', '45472', '089245678146', '3215008003697851', 'h. emed', 'antar kecamatan', '3', 'blok d', '003', '001', 'kembang waluh', 'tonjong', 'cigasong', 'majalengka', 'jawa barat', '45475', '087314567850', '2', '-', '2', '3', '2016-07-08 08:11:09'),
('20160702005', '3215008003697860', 'Amir', 'blok a', '003', '001', 'iplik mukti', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', '45472', '089245678160', '3215008003697861', 'Amir', 'antar kabupaten', '5', 'blok d', '003', '001', 'kembang waluh', 'gagang pacul', 'ciroyom', 'bandung', 'jawa barat', '45000', '087314567860', '2', '-', '2', '3', '2016-07-08 10:15:36'),
('20160702006', '3215008003697870', 'iding', 'blok a', '003', '001', 'iplik mukti', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', '45472', '089245678170', '3215008003697871', 'iding', 'antar kabupaten', '6', 'blok d', '003', '001', 'astrajingga', 'ciroyom kulon', 'ciroyom', 'bandung', 'jawa barat', '45000', '087314567870', '2', '-', '2', '5', '2016-07-08 10:07:01'),
('20160702007', '3215008003697880', 'Ma''nun', 'blok a', '003', '001', 'iplik mukti', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', '45472', '089245678180', '3215008003697881', 'Ma''nun', 'antar kabupaten', '3', 'blok d', '003', '001', 'marijuana', 'ciroyom kulon', 'ciroyom', 'bandung', 'jawa barat', '45000', '087314567880', '2', '-', '2', '4', '2016-07-09 15:59:59'),
('20160704001', '3215008003697820', 'ata kasta', 'blok a', '003', '001', 'iplik mukti', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', '45472', '089345786987', '3215008003697821', 'yogi gilang ramadhan', 'antar desa', '1', 'blok b', '004', '005', 'dangdeur', 'rajagaluh kidul', 'rajagaluh', 'majalengka', 'jawa barat', '45472', '087656400322', '2', '-', '2', '3', '2016-07-04 09:59:18'),
('20160704002', '3215008003697830', 'yaya ardaya', 'blok a', '003', '001', 'iplik mukti', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', '45472', '089345786978', '3215008003697831', 'yaya ardaya', 'antar desa', '3', 'blok c', '004', '003', 'rawamangun', 'cisetu', 'rajagaluh', 'majalengka', 'jawa barat', '45472', '087656400321', '2', '-', '2', '4', '2016-07-04 10:01:05');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk_pindahan`
--

CREATE TABLE `penduduk_pindahan` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `batas_berlaku_ktp` date NOT NULL,
  `shdk` varchar(2) NOT NULL,
  `no_form` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penduduk_pindahan`
--

INSERT INTO `penduduk_pindahan` (`nik`, `nama`, `batas_berlaku_ktp`, `shdk`, `no_form`) VALUES
('3215008003697821', 'yogi gilang ramadhan', '2016-07-04', '03', '20160704001'),
('3215008003697822', 'baban subandi', '2016-07-04', '03', '20160704001'),
('3215008003697823', 'ata kasta', '2016-07-04', '01', '20160704001'),
('3215008003697831', 'yaya ardaya', '2016-07-04', '01', '20160704002'),
('3215008003697832', 'neng murti', '2016-07-04', '02', '20160704002'),
('3215008003697833', 'krisna mukti', '2016-07-04', '03', '20160704002'),
('3215008003697834', 'bagus pisan', '2016-07-04', '03', '20160704002'),
('3215008003697841', 'eyo arnaya', '2016-07-08', '01', '20160702003'),
('3215008003697842', 'emin', '2016-07-08', '02', '20160702003'),
('3215008003697843', 'ria rismawati', '2016-07-08', '03', '20160702003'),
('3215008003697844', 'ipong', '2016-07-08', '03', '20160702003'),
('3215008003697851', 'h.emed', '2016-07-08', '01', '20160702004'),
('3215008003697852', 'h. icih', '2016-07-08', '02', '20160702004'),
('3215008003697853', 'dodi', '2016-07-08', '03', '20160702004'),
('3215008003697861', 'amir', '2016-07-08', '01', '20160702005'),
('3215008003697862', 'aminah', '2016-07-08', '02', '20160702005'),
('3215008003697863', 'oval', '2016-07-08', '03', '20160702005'),
('3215008003697871', 'iding', '2016-07-08', '01', '20160702006'),
('3215008003697872', 'ami', '2016-07-08', '02', '20160702006'),
('3215008003697873', 'ajis', '2016-07-08', '03', '20160702006'),
('3215008003697874', 'neni', '2016-07-08', '03', '20160702006'),
('3215008003697875', 'enok', '2016-07-08', '03', '20160702006'),
('3215008003697881', 'Ma''nun', '2016-07-09', '01', '20160702007'),
('3215008003697882', 'Engkur', '2016-07-09', '02', '20160702007'),
('3215008003697883', 'Maman', '2016-07-09', '03', '20160702007'),
('3215008003697884', 'Yulia Dewi', '2016-07-09', '03', '20160702007');

-- --------------------------------------------------------

--
-- Table structure for table `perubahan_kk`
--

CREATE TABLE `perubahan_kk` (
  `nik_pemohon` varchar(16) NOT NULL,
  `nama_pemohon` varchar(100) NOT NULL,
  `nama_kepala_keluarga` varchar(100) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `rt` varchar(3) NOT NULL,
  `rw` varchar(3) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kodepos` varchar(5) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `nama_kepala_keluarga_lama` varchar(100) NOT NULL,
  `no_kk_lama` varchar(16) NOT NULL,
  `alamat_lama` varchar(100) NOT NULL,
  `rt_lama` varchar(3) NOT NULL,
  `rw_lama` varchar(3) NOT NULL,
  `desa_lama` varchar(50) NOT NULL,
  `kecamatan_lama` varchar(50) NOT NULL,
  `kabupaten_lama` varchar(50) NOT NULL,
  `provinsi_lama` varchar(50) NOT NULL,
  `kodepos_lama` varchar(5) NOT NULL,
  `telepon_lama` varchar(15) NOT NULL,
  `alasan_permohonan` varchar(1) NOT NULL,
  `jumlah_anggota_keluarga` int(2) NOT NULL,
  `tanggal_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perubahan_kk`
--

INSERT INTO `perubahan_kk` (`nik_pemohon`, `nama_pemohon`, `nama_kepala_keluarga`, `no_kk`, `alamat`, `rt`, `rw`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `kodepos`, `telepon`, `nama_kepala_keluarga_lama`, `no_kk_lama`, `alamat_lama`, `rt_lama`, `rw_lama`, `desa_lama`, `kecamatan_lama`, `kabupaten_lama`, `provinsi_lama`, `kodepos_lama`, `telepon_lama`, `alasan_permohonan`, `jumlah_anggota_keluarga`, `tanggal_input`) VALUES
('3214895876997008', 'yogi gilang ramadhan', 'ata kasta', '3214895876997007', 'blok a', '003', '001', 'Rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', '45472', '085467345678', 'ata kasta', '3214895876997006', 'blok a', '003', '001', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', '45472', '085624345123', '3', 3, '2016-06-29 18:10:45'),
('3214895876997018', 'yaya ardaya', 'yaya ardaya', '3214895876997017', 'blok a', '003', '001', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', '45472', '081321456789', 'yaya ardaya', '3214895876997016', 'blok a', '003', '001', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', '45472', '081321456789', '3', 3, '2016-06-29 14:07:50');

-- --------------------------------------------------------

--
-- Table structure for table `saksi1`
--

CREATE TABLE `saksi1` (
  `id_saksi1` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `umur` varchar(2) NOT NULL,
  `tanggal_lahir` varchar(2) NOT NULL,
  `bulan_lahir` varchar(2) NOT NULL,
  `tahun_lahir` varchar(4) NOT NULL,
  `pekerjaan` varchar(2) NOT NULL,
  `alamat` text NOT NULL,
  `desa` varchar(20) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `kabupaten` varchar(20) NOT NULL,
  `provinsi` varchar(20) NOT NULL,
  `id_bayi` int(11) NOT NULL,
  `id_jenazah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saksi1`
--

INSERT INTO `saksi1` (`id_saksi1`, `nik`, `nama`, `umur`, `tanggal_lahir`, `bulan_lahir`, `tahun_lahir`, `pekerjaan`, `alamat`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `id_bayi`, `id_jenazah`) VALUES
(1, '3214005006008054', 'iip goliip', '25', '', '', '', '15', 'blok a rt 003 rw 001', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', 79, 0),
(2, '3218005006008084', 'baban subandi', '30', '', '', '', '15', 'blok a rt 003 rw 001', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', 78, 0),
(3, '3214005006008054', 'iip goliip', '25', '', '', '', '15', 'blok a rt 003 rw 001', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', 81, 0),
(7, '3214005006008075', 'baban subandi', '35', '03', '03', '1979', '15', 'blok a rt 003 rw 001', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', 0, 8),
(9, '3214005006008045', 'Asnen Nurjaman', '25', '02', '03', '1986', '15', 'blok a rt 003 rw 001', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `saksi2`
--

CREATE TABLE `saksi2` (
  `id_saksi2` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `umur` varchar(2) NOT NULL,
  `tanggal_lahir` varchar(2) NOT NULL,
  `bulan_lahir` varchar(2) NOT NULL,
  `tahun_lahir` varchar(4) NOT NULL,
  `pekerjaan` varchar(2) NOT NULL,
  `alamat` text NOT NULL,
  `desa` varchar(20) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `kabupaten` varchar(20) NOT NULL,
  `provinsi` varchar(20) NOT NULL,
  `id_bayi` int(11) NOT NULL,
  `id_jenazah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saksi2`
--

INSERT INTO `saksi2` (`id_saksi2`, `nik`, `nama`, `umur`, `tanggal_lahir`, `bulan_lahir`, `tahun_lahir`, `pekerjaan`, `alamat`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `id_bayi`, `id_jenazah`) VALUES
(1, '3214005006008055', 'eyo arnaya', '50', '', '', '', '4', 'blok a rt 003 rw 001', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', 79, 0),
(2, '3218005006008085', 'ata kasta', '50', '', '', '', '15', 'blok a rt 003 rw 001', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', 78, 0),
(3, '3214005006008055', 'eyo arnaya', '50', '', '', '', '4', 'blok a rt 003 rw 001', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', 81, 0),
(7, '3214005006008076', 'ata kasta', '50', '01', '02', '1960', '4', 'blok a rt 004 rw 001', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', 0, 8),
(8, '3214005006008046', 'Wahyu Nurja''man', '30', '05', '03', '1979', '15', 'blok a rt 003 rw 001', 'rajagaluhlor', 'rajagaluh', 'majalengka', 'jawa barat', 0, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ayah`
--
ALTER TABLE `ayah`
  ADD PRIMARY KEY (`id_ayah`);

--
-- Indexes for table `bayi`
--
ALTER TABLE `bayi`
  ADD PRIMARY KEY (`id_bayi`);

--
-- Indexes for table `daftar_anggota_pemohon_kk`
--
ALTER TABLE `daftar_anggota_pemohon_kk`
  ADD PRIMARY KEY (`nik_anggota`);

--
-- Indexes for table `daftar_anggota_pemohon_kk_2`
--
ALTER TABLE `daftar_anggota_pemohon_kk_2`
  ADD PRIMARY KEY (`nik_anggota`);

--
-- Indexes for table `ibu`
--
ALTER TABLE `ibu`
  ADD PRIMARY KEY (`id_ibu`);

--
-- Indexes for table `jenazah`
--
ALTER TABLE `jenazah`
  ADD PRIMARY KEY (`id_jenazah`);

--
-- Indexes for table `pbbdesa`
--
ALTER TABLE `pbbdesa`
  ADD PRIMARY KEY (`nop`);

--
-- Indexes for table `pbbdesa_bayar`
--
ALTER TABLE `pbbdesa_bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `pelapor`
--
ALTER TABLE `pelapor`
  ADD PRIMARY KEY (`id_pelapor`);

--
-- Indexes for table `pemohon_kk`
--
ALTER TABLE `pemohon_kk`
  ADD PRIMARY KEY (`nik_pemohon`);

--
-- Indexes for table `pemohon_pindah`
--
ALTER TABLE `pemohon_pindah`
  ADD PRIMARY KEY (`no_form`);

--
-- Indexes for table `penduduk_pindahan`
--
ALTER TABLE `penduduk_pindahan`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `perubahan_kk`
--
ALTER TABLE `perubahan_kk`
  ADD PRIMARY KEY (`nik_pemohon`);

--
-- Indexes for table `saksi1`
--
ALTER TABLE `saksi1`
  ADD PRIMARY KEY (`id_saksi1`);

--
-- Indexes for table `saksi2`
--
ALTER TABLE `saksi2`
  ADD PRIMARY KEY (`id_saksi2`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ayah`
--
ALTER TABLE `ayah`
  MODIFY `id_ayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `bayi`
--
ALTER TABLE `bayi`
  MODIFY `id_bayi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `ibu`
--
ALTER TABLE `ibu`
  MODIFY `id_ibu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `jenazah`
--
ALTER TABLE `jenazah`
  MODIFY `id_jenazah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pbbdesa_bayar`
--
ALTER TABLE `pbbdesa_bayar`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pelapor`
--
ALTER TABLE `pelapor`
  MODIFY `id_pelapor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `saksi1`
--
ALTER TABLE `saksi1`
  MODIFY `id_saksi1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `saksi2`
--
ALTER TABLE `saksi2`
  MODIFY `id_saksi2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
