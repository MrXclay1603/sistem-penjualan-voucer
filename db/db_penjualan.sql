-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2021 at 08:50 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- Error reading data for table db_penjualan.kategori: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `db_penjualan`.`kategori`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_order`
--

CREATE TABLE `tb_detail_order` (
  `id_detail` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detail_order`
--

INSERT INTO `tb_detail_order` (`id_detail`, `id_order`, `id_produk`, `id_user`, `jumlah`) VALUES
(21, 22, 1, 3, 1),
(22, 23, 3, 7, 2),
(23, 24, 6, 8, 1),
(24, 25, 6, 8, 1),
(25, 25, 1, 8, 1),
(26, 26, 1, 3, 2),
(27, 27, 1, 9, 1),
(28, 28, 1, 9, 2),
(29, 28, 3, 9, 1),
(30, 28, 6, 9, 1),
(31, 29, 4, 3, 1),
(32, 29, 1, 3, 1),
(33, 30, 1, 3, 4),
(34, 31, 1, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_item` int(11) NOT NULL,
  `total_bayar` float NOT NULL,
  `tgl_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `id_user`, `total_item`, `total_bayar`, `tgl_transaksi`) VALUES
(22, 3, 1, 52000, '2020-12-26'),
(23, 7, 2, 160000, '2020-12-26'),
(24, 8, 1, 15000, '2020-12-26'),
(25, 8, 2, 67000, '2020-12-26'),
(26, 3, 2, 104000, '2020-12-27'),
(27, 9, 1, 52000, '2021-01-04'),
(28, 9, 4, 199000, '2021-01-04'),
(29, 3, 2, 60000, '2021-01-12'),
(30, 3, 4, 208000, '2021-01-12'),
(31, 10, 1, 52000, '2021-01-12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga` float NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id`, `nama_produk`, `harga`, `stok`) VALUES
(1, 'Im3 Voucer 20 gb', 52000, 200),
(3, 'Smartfren Voucer Unlimited', 80000, 400),
(4, 'Telkomsel Voucer 1,5 gb', 8000, 500),
(6, 'Axis Voucer 1,5 gb', 15000, 100);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `paswd` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` int(1) NOT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `paswd`, `email`, `nama`, `level`, `ket`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'clay@gmail.com', 'Dodi sahbudi sitorus', 1, 'Administrator'),
(2, 'wahida', '8d99137adcc2d406ecfea1a95a900f12', 'wahidatulhusna@gmail.com', 'Wahidatul Husna', 1, 'Administrator'),
(3, 'nurul', '6968a2c57c3a4fee8fadc79a80355e4d', 'NurulA@gmail.com', 'Nurul Aini', 2, 'Pelanggan'),
(5, 'Dodi', 'dc82a0e0107a31ba5d137a47ab09a26b', 'Dodi@gmail.com', 'dodi', 1, 'Administrator'),
(6, 'jeki', '2d8c5e097d9785d00255722598324b30', 'jeki', 'jek', 2, 'pelanggan'),
(7, 'dimas', 'ebb446ec0e85fc9054e6443099d38106', 'dimass', 'diimmass', 2, 'pelanggan'),
(8, 'budi', '00dfc53ee86af02e742515cdcf075ed3', 'budi', 'budi', 2, 'Pelanggan'),
(9, 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 'user1', 'user1', 2, 'Pelanggan'),
(10, 'afdal', '69a41d444601e48c8e6fda61f81dd0fc', 'afdal@gmail.com', 'afdal', 2, 'Pelanggan'),
(11, 'pembeli', '6f13880d55e80e8d5782ea940a732250', 'pembeli', 'pembeli', 1, 'pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_detail_order`
--
ALTER TABLE `tb_detail_order`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_detail_order`
--
ALTER TABLE `tb_detail_order`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
