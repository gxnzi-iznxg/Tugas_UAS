-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2024 at 01:20 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(11) NOT NULL,
  `nama_buku` varchar(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `sampul_buku` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `nama_buku`, `pengarang`, `penerbit`, `genre`, `tahun_terbit`, `sampul_buku`) VALUES
('1', 'Laskar Pelangi', 'Andrea Hirataa', 'Bentang Pustaka', 'Novel', 2005, ''),
('BK2', 'Ayat Ayat Cinta', 'Habiburrahman El Shirazy', 'Bentang Pustaka', 'Novel', 2008, 'assets/uploads/download1.jpg'),
('BK3', 'To Kill a Mockingbird', 'Harper Lee', 'J. B. Lippincott & Co.', 'Fiksi', 1960, 'assets/uploads/download_(1).jpg'),
('BK4', 'The Lord of the Rings', 'J.R.R. Tolkien', '-', 'Fantasi', 1955, 'assets/uploads/download_(2).jpg'),
('BK5', 'The Girl with the Dragon Tattoo', 'Stieg Larsson', 'Gramedia', 'Thriller', 2005, 'assets/uploads/download_(3).jpg'),
('BK6', 'Sapiens: A Brief History of Humankind', 'Yuval Noah Harari', 'Gramedia', 'Non-Fiksi', 2019, 'assets/uploads/download_(4).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjam` varchar(8) NOT NULL,
  `nama_peminjam` varchar(100) NOT NULL,
  `no_telp` bigint(11) NOT NULL,
  `nama_buku` varchar(100) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjam`, `nama_peminjam`, `no_telp`, `nama_buku`, `tgl_pinjam`, `tgl_kembali`) VALUES
('PMJ21234', 'Dono Kasino', 81444222331, 'Laskar Pelangi', '2024-01-12', '2024-01-15'),
('PMJ21235', 'Dono Kasino', 81444222331, 'Laskar Pelangi', '2024-01-12', '2024-01-15'),
('PMJ21236', 'Dono Kasino', 81444222331, 'Laskar Pelangi', '2024-01-12', '2024-01-15'),
('PMJ21237', 'Dedik Santoso', 81444222331, 'Laskar Pelangi', '2024-01-12', '2024-01-15'),
('PMJ21238', 'Dedik Santoso', 81432952354, 'Laskar Pelangi', '2024-01-12', '2024-01-15'),
('PMJ22525', 'Rahmat Hidayat', 8123456789, 'Laskar Pelangi', '2024-01-23', '2024-01-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjam`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
