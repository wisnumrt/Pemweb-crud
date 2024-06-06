-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2024 at 06:14 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buku`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `idbuku` varchar(20) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `penulis` varchar(100) DEFAULT NULL,
  `penerbit` varchar(200) DEFAULT NULL,
  `tahun_terbit` int(11) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `jumlah_hlmn` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `bahasa` varchar(50) DEFAULT NULL,
  `jenis_cover` varchar(50) DEFAULT NULL,
  `harga` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`idbuku`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `kategori`, `jumlah_hlmn`, `stok`, `bahasa`, `jenis_cover`, `harga`) VALUES
('12231', 'Nemo', 'Uus', 'Disbu', 2010, 'Fiksi', 250, 50, 'Inggris, Lainnya', 'Softcover', '75000'),
('12232', 'Harry Potter', 'James', 'Scholastic', 1997, 'Fantasi', 320, 45, 'Inggris, Lainnya', 'Hardcover', '150000'),
('12233', 'Dilan', 'Pidi Baiq', 'Bukune', 2004, 'Fiksi Remaja', 310, 55, 'Indonesia', 'Softcover', '80000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`idbuku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
