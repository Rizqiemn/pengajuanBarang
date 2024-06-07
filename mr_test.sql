-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 08:11 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mr_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `ket_pengajuan` text NOT NULL,
  `status` varchar(25) NOT NULL,
  `tgl_pengajuan` datetime NOT NULL,
  `upd_tgl_pengajuan` datetime NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `nama_barang`, `jumlah`, `harga`, `ket_pengajuan`, `status`, `tgl_pengajuan`, `upd_tgl_pengajuan`, `id_user`) VALUES
(1, 'Laptop', 10, 100000, 'a812e4ee39508a1f35931ddb98ece0c0.png', 'Approve', '2024-06-06 20:20:35', '2024-06-07 02:11:14', 1),
(2, 'Handphone', 3, 0, 'Barang tidak ditemukan', 'Reject', '2024-06-07 02:34:54', '0000-00-00 00:00:00', 1),
(3, 'Monitor', 100, 0, 'Barang tidak boleh terlalu banyak', 'Reject', '2024-06-07 02:46:41', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(11) NOT NULL,
  `created_at` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `status`, `created_at`) VALUES
(1, 'officer', '$2y$10$1yyBQlUNFikUQhaxi2Pn8uCN3o9MXGmoWVrrCT8CIWJ.7QDgD2CKO', 'officer', 1717677284),
(2, 'manager', '$2y$10$1yyBQlUNFikUQhaxi2Pn8uCN3o9MXGmoWVrrCT8CIWJ.7QDgD2CKO', 'manager', 1717677336),
(3, 'finance', '$2y$10$1yyBQlUNFikUQhaxi2Pn8uCN3o9MXGmoWVrrCT8CIWJ.7QDgD2CKO', 'finance', 1717677347);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
