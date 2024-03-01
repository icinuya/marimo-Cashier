-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2024 at 04:05 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `detailpenjualan`
--

CREATE TABLE `detailpenjualan` (
  `id_detail` int(11) NOT NULL,
  `no_faktur` varchar(15) DEFAULT NULL,
  `kode_produk` varchar(25) DEFAULT NULL,
  `modal` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `profit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detailpenjualan`
--

INSERT INTO `detailpenjualan` (`id_detail`, `no_faktur`, `kode_produk`, `modal`, `harga`, `qty`, `subtotal`, `profit`) VALUES
(18, '202402220001', '33333', 8000, 10900, 2, 21800, 5800),
(19, '202402220001', '11111', 8000, 10500, 1, 10500, 2500),
(20, '202402220001', '77777', 10000, 11900, 3, 35700, 5700),
(21, '202402220001', '44444', 5000, 500, 7, 3500, -31500),
(22, '202402240001', '55555', 10000, 13500, 4, 54000, 14000),
(23, '202402240001', '10101', 8000, 9900, 2, 19800, 3800),
(24, '202402240001', '99999', 17500, 2250, 10, 22500, -152500),
(25, '202402240002', '55555', 10000, 13500, 2, 27000, 7000),
(26, '202402250001', '88888', 25000, 28800, 3, 86400, 11400),
(27, '202402250001', '12321', 32500, 1000, 5, 5000, -157500),
(28, '202402250002', '66666', 13000, 14500, 6, 87000, 9000),
(29, '202402250002', '99999', 17500, 2250, 2, 4500, -30500),
(30, '202402250002', '10101', 8000, 9900, 2, 19800, 3800),
(31, '202402250002', '22222', 32500, 35500, 2, 71000, 6000),
(32, '202402250003', '55555', 10000, 13500, 2, 27000, 7000),
(33, '202402250004', '77777', 10000, 11900, 2, 23800, 3800),
(34, '202402250005', '22222', 32500, 35500, 4, 142000, 12000),
(35, '202402260001', '44444', 5000, 500, 1, 500, -4500),
(36, '202402260001', '66666', 13000, 14500, 1, 14500, 1500),
(37, '202402260001', '88888', 25000, 28800, 1, 28800, 3800),
(38, '202402260002', '33333', 8000, 10900, 10, 109000, 29000),
(39, '202402260002', '22222', 32500, 35500, 10, 355000, 30000),
(40, '202402260003', '77777', 10000, 11900, 2, 23800, 3800),
(43, '202402260001', '99999', 17500, 2250, 2, 4500, -30500),
(44, '202402270001', '22222', 32500, 35500, 4, 142000, 12000),
(45, '202402270002', '50505', 45500, 3500, 5, 17500, -210000),
(46, '202402270002', '11111', 8000, 10500, 4, 42000, 10000),
(47, '202402270002', '11111', 8000, 10500, 3, 31500, 7500),
(48, '202402270003', '11111', 8000, 10500, 3, 31500, 7500),
(49, '202402270003', '22222', 32500, 35500, 5, 177500, 15000),
(50, '202402270003', '55555', 10000, 13500, 3, 40500, 10500),
(51, '202402270004', '88888', 25000, 28800, 4, 115200, 15200),
(52, '202402270006', '89686017119', 1500, 2500, 5, 12500, 5000),
(53, '202403010001', '11111', 8000, 10500, 1, 10500, 2500),
(54, '202403010002', '10101', 8000, 9900, 2, 19800, 3800),
(55, '202403010002', '8991002135017', 1300, 2000, 5, 10000, 3500),
(56, '202403010002', '50505', 1700, 3500, 10, 35000, 18000),
(57, '202403010003', '8991002135017', 1300, 2000, 2, 4000, 1400),
(58, '202403010004', '55555', 10000, 13500, 1, 13500, 3500),
(59, '202403010004', '12321', 32500, 1000, 1, 1000, -31500),
(60, '202403010001', '10101', 8000, 9900, 3, 29700, 5700),
(61, '202403010001', '66666', 13000, 14500, 3, 43500, 4500);

--
-- Triggers `detailpenjualan`
--
DELIMITER $$
CREATE TRIGGER `t_detailjual` AFTER INSERT ON `detailpenjualan` FOR EACH ROW BEGIN
	UPDATE produk SET stok = stok - NEW.qty
    WHERE kode_produk = NEW.kode_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jual`
--

CREATE TABLE `jual` (
  `id_jual` int(11) NOT NULL,
  `no_faktur` varchar(15) DEFAULT NULL,
  `tgl_jual` date NOT NULL,
  `time` time DEFAULT NULL,
  `grand_total` decimal(10,2) DEFAULT NULL,
  `cash` decimal(10,2) DEFAULT NULL,
  `kembalian` decimal(10,2) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jual`
--

INSERT INTO `jual` (`id_jual`, `no_faktur`, `tgl_jual`, `time`, `grand_total`, `cash`, `kembalian`, `id_user`) VALUES
(14, '202402220001', '2024-02-01', '14:40:24', 71500.00, 100000.00, 28500.00, 6),
(15, '202402240001', '2024-01-02', '03:34:49', 96300.00, 100000.00, 3700.00, 6),
(16, '202402240002', '2024-01-16', '03:36:11', 27000.00, 30000.00, 3000.00, 6),
(17, '202402250001', '2024-02-06', '08:21:20', 91400.00, 95000.00, 3600.00, 6),
(19, '202402250002', '2024-02-17', '08:23:56', 71000.00, 75000.00, 4000.00, 6),
(20, '202402250003', '2024-02-20', '08:24:42', 27000.00, 30000.00, 3000.00, 6),
(21, '202402250004', '2024-02-25', '08:25:01', 23800.00, 24000.00, 200.00, 6),
(22, '202402250005', '2024-02-25', '11:30:36', 142000.00, 142000.00, 0.00, 6),
(28, '202402260001', '2024-02-26', '20:18:02', 4500.00, 4500.00, 0.00, 6),
(29, '202402270001', '2024-02-27', '07:02:05', 142000.00, 145000.00, 3000.00, 6),
(31, '202402270002', '2024-02-27', '11:45:50', 31500.00, 32000.00, 500.00, 6),
(32, '202402270003', '2024-02-27', '13:03:27', 249500.00, 250000.00, 500.00, 6),
(33, '202402270004', '2024-02-27', '13:04:55', 115200.00, 116000.00, 800.00, 6),
(34, '202402270005', '2024-02-27', '14:00:41', 0.00, 0.00, 0.00, 6),
(35, '202402270006', '2024-02-27', '17:08:36', 12500.00, 15000.00, 2500.00, 6),
(40, '202403010001', '2024-03-01', '22:00:42', 73200.00, 75000.00, 1800.00, 6);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Sembako'),
(4, 'Minuman'),
(6, 'Makanan'),
(7, 'Bumbu Masakan'),
(16, 'Skincare'),
(17, 'Obat');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `kode_produk` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `id_satuan` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `kode_produk`, `nama_produk`, `harga_beli`, `harga_jual`, `id_satuan`, `id_kategori`, `stok`) VALUES
(2, '22222', 'Gerry Salut Chocolate Coconut', 32500, 35500, 21, 6, 75),
(3, '33333', 'Happy Tos Jagung Bakar', 8000, 10900, 21, 6, 88),
(5, '55555', 'Cimori Yoghurt Squezee 100ml', 10000, 13500, 26, 4, 88),
(6, '66666', 'Chitato Lite', 13000, 14500, 26, 6, 90),
(7, '77777', 'Lays Jagung Bakar', 10000, 11900, 26, 6, 93),
(8, '88888', 'Silver Queen Valentine', 25000, 28800, 22, 6, 92),
(10, '10101', 'Mogu Mogu 320 Coconut', 8000, 9900, 21, 4, 91),
(19, '12321', 'Ciki Komo Rasa Jagung', 32500, 1000, 26, 6, 94),
(21, '99999', 'Sasa Instan Nasi Goreng Ayam Spesial', 760, 2250, 30, 7, 86),
(22, '50505', 'Indomie Goreng Aceh', 1700, 3500, 21, 6, 90),
(24, '89686017119', 'Mi Instan Sarimi Rasa Kaldu Ayam', 1500, 2500, 21, 6, 195),
(25, '8968602377', 'Mi Instan Sakura Mi Goreng', 1000, 2000, 21, 6, 200),
(26, '987176081049', 'Head & Shoulders Shampo Anti-Ketombe', 11000, 12500, 30, 2, 50),
(27, '991111109138', 'Johnsons blossoms baby powder 200g', 15500, 18200, 21, 16, 100),
(28, '996001440049', 'Energen sereal & susu bersinergi', 9000, 11500, 30, 4, 100),
(29, '9927700333130', 'Masako Rasa Ayam', 200, 500, 30, 7, 500),
(30, '993137692762', 'EMINA SunBattle SPF30PA+++ 60ml', 24200, 27800, 21, 16, 100),
(31, '8991002135017', 'Kapal Api Gula Aren Special Mix 23g', 1300, 2000, 30, 2, 93),
(32, '9871243854', 'Yakult ', 1200, 2500, 21, 4, 100);

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`) VALUES
(21, 'Pcs'),
(22, 'Box'),
(24, 'Tablet'),
(25, 'Pack'),
(26, 'Dus'),
(29, 'Kaleng'),
(30, 'Sc'),
(33, 'Rc');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(25) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `nama`, `username`, `password`, `level`) VALUES
(6, 'cici@gmail.com', 'Cici Nuranjani', 'xcnaadmin', '202cb962ac59075b964b07152d234b70', '1'),
(22, 'luffly@gmail.com', 'Luffy', 'luffyd', 'caf1a3dfb505ffed0d024130f58c5cfa', '2'),
(23, 'admin@gmail.com', 'Admin', 'admin', '202cb962ac59075b964b07152d234b70', '1'),
(24, 'kasir@gmail.com', 'Kasir', 'kasir', 'caf1a3dfb505ffed0d024130f58c5cfa', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `jual`
--
ALTER TABLE `jual`
  ADD PRIMARY KEY (`id_jual`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_satuan` (`id_satuan`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `jual`
--
ALTER TABLE `jual`
  MODIFY `id_jual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jual`
--
ALTER TABLE `jual`
  ADD CONSTRAINT `jual_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
