-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2021 at 06:28 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `nm_admin` varchar(35) CHARACTER SET latin1 NOT NULL,
  `username` varchar(35) CHARACTER SET latin1 NOT NULL,
  `password` varchar(35) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nm_admin`, `username`, `password`) VALUES
(1, 'user', 'JWD', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tbanggota`
--

CREATE TABLE `tbanggota` (
  `idanggota` varchar(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jeniskelamin` varchar(10) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbanggota`
--

INSERT INTO `tbanggota` (`idanggota`, `nama`, `jeniskelamin`, `alamat`, `foto`, `status`) VALUES
('AG002', 'NICO', 'Pria', 'Jl.Anggrek No 45', '', 'Sedang Meminjam'),
('AG003', 'Hartono K', 'Pria', 'Jl.Manggis 98', '', 'Sedang Meminjam'),
('AG005', 'Agus Wardoyo', 'Pria', 'Jl.Cempedak No 88', 'admin-no-photo.jpg', 'Tidak Meminjam'),
('AG006', 'Shinta Riani', 'Wanita', 'JL.Jeruk No 1', 'admin-no-photo.jpg', 'Sedang Meminjam'),
('AG007', 'Irwan Hakim', 'Pria', 'Jl.Salak No 34', 'admin-no-photo.jpg', 'Tidak Meminjam'),
('AG008', 'Indah Dian', 'Wanita', 'Jl.Semangka No 23', 'admin-no-photo.jpg', 'Tidak Meminjam'),
('AG009', 'Rina Auliah', 'Wanita', 'Jl.Merpati No 44', 'admin-no-photo.jpg', 'Tidak Meminjam'),
('AG010', 'Septi Putri', 'Wanita', 'Jl.Beringin No 2', 'admin-no-photo.jpg', 'Tidak Meminjam'),
('AG014', 'Rangga', 'Pria', 'Jl.Manggis No 41', 'admin-no-photo.jpg', 'Tidak Meminjam'),
('AU001', 'ABDA U SESAT LAGI', 'Wanita', 'CILACAP ON THE GO', 'AU001.jpg', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tbbuku`
--

CREATE TABLE `tbbuku` (
  `idbuku` varchar(5) NOT NULL,
  `judulbuku` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `pengarang` varchar(40) NOT NULL,
  `penerbit` varchar(40) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbbuku`
--

INSERT INTO `tbbuku` (`idbuku`, `judulbuku`, `kategori`, `pengarang`, `penerbit`, `status`) VALUES
('BK001', 'Belajar PHP', 'Ilmu Komputer', 'Candra', 'Media Baca', 'Dipinjam'),
('BK002', 'Belajar HTML', 'Ilmu Komputer', 'Rahmat Hakim', 'Media Baca', 'Dipinjam'),
('BK003', 'Kumpulan Puisi', 'Karya Sastra', 'Bejo', 'Media Kita', 'Tersedia'),
('BK004', 'Sejarah Islam', 'Ilmu Agama', 'Sutejo', 'Media Kita', 'Dipinjam'),
('BK005', 'Pintar CSS', 'Ilmu Komputer', 'Anton', 'Graha Buku', 'Tersedia'),
('BK006', 'Kumpulan Cerpen', 'Karya Sastra', 'Rudi', 'Media Aksara', 'Dipinjam'),
('BK007', 'Keamanan Data', 'Ilmu Komputer', 'Nusron', 'Media Cipta', 'Dipinjam'),
('BK008', 'Dasar-Dasar Database', 'Ilmu Komputer', 'Andi', 'Graha Media', 'Tersedia'),
('BK009', 'Kumpulan Cerpen 2', 'Karya Sastra', 'Sutejo', 'Media Cipta', 'Tersedia'),
('BK010', 'Peradaban Islam', 'Ilmu Agama', 'Aminnudin', 'Media Baca', 'Tersedia'),
('BK011', 'Kumpulan Cerpen 3', 'Karya Sastra', 'Rudi', 'Media Baca', 'Tersedia'),
('BK012', 'Teknologi Informasi', 'Ilmu Komputer', 'Andi A', 'Media Baca', 'Tersedia'),
('BK013', 'Dermaga Biru', 'Karya Sastra', 'Sutejo', 'Media Cipta', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `tbtransaksi`
--

CREATE TABLE `tbtransaksi` (
  `idtransaksi` varchar(5) NOT NULL,
  `idanggota` varchar(5) NOT NULL,
  `idbuku` varchar(5) NOT NULL,
  `tglpinjam` date NOT NULL,
  `tglkembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbtransaksi`
--

INSERT INTO `tbtransaksi` (`idtransaksi`, `idanggota`, `idbuku`, `tglpinjam`, `tglkembali`) VALUES
('TR004', 'AG002', 'BK003', '2016-11-19', '2021-08-28'),
('TR02', 'AG001', 'BK002', '2021-08-28', '2021-08-30'),
('TR04', 'AG001', 'BK002', '2021-08-20', '2021-08-21'),
('TR05', 'AG001', 'BK003', '2021-08-20', '2021-08-27'),
('TU01', 'AG002', 'BK003', '2021-08-20', '2021-08-27'),
('TU03', 'AG001', 'BK009', '2021-08-20', '2021-08-28'),
('TX06', 'AG005', 'BK004', '2021-08-20', '2021-08-27'),
('TZ02', 'AG001', 'BK002', '2021-08-20', '2021-08-31');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `iduser` varchar(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `password` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`iduser`, `nama`, `alamat`, `password`) VALUES
('US001', 'Andi Rahman Hakim', 'Jl.Pramuka No 9', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbanggota`
--
ALTER TABLE `tbanggota`
  ADD PRIMARY KEY (`idanggota`);

--
-- Indexes for table `tbbuku`
--
ALTER TABLE `tbbuku`
  ADD PRIMARY KEY (`idbuku`);

--
-- Indexes for table `tbtransaksi`
--
ALTER TABLE `tbtransaksi`
  ADD PRIMARY KEY (`idtransaksi`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`iduser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
