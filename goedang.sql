-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2021 at 12:06 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goedang`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_user` int(20) NOT NULL,
  `id_produk` int(20) NOT NULL,
  `jumlah` int(15) NOT NULL,
  `subtotal` int(30) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_user`, `id_produk`, `jumlah`, `subtotal`, `catatan`) VALUES
(1, 9, 7, 1295000, ''),
(1, 2, 3, 54000, 'Chocolatos MAMA MIA LEZATOSS');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kat` int(20) NOT NULL,
  `nama_kat` varchar(50) NOT NULL,
  `desk_kat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kat`, `nama_kat`, `desk_kat`) VALUES
(1, 'Makanan Ringan', 'Camilan, kue kering, wafer, keripik, permen dan cokelat.'),
(2, 'Minuman', 'Minuman kemasan, minuman seduh, minuman probiotik.'),
(4, 'Roti', 'Roti isi, roti tawar.'),
(5, 'Keperluan Dapur', ''),
(6, 'Kesehatan & Sanitasi Pribadi', ''),
(7, 'Perawatan Bayi', ''),
(11, 'Peralatan Rumah Tangga', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_bayar` int(20) NOT NULL,
  `id_order` int(20) NOT NULL,
  `atas_nama` varchar(255) NOT NULL,
  `bank_asal` varchar(50) NOT NULL,
  `bank_tujuan` varchar(50) NOT NULL,
  `jumlah_tf` int(255) NOT NULL,
  `tgl_tf` date NOT NULL,
  `bukti_tf` varchar(255) NOT NULL,
  `status_bayar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_order` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `tgl_order` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `ongkir` int(100) NOT NULL,
  `total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_detail`
--

CREATE TABLE `pesanan_detail` (
  `id_ordetail` int(20) NOT NULL,
  `id_order` int(20) NOT NULL,
  `id_produk` int(20) NOT NULL,
  `qty_order` int(15) NOT NULL,
  `subtotal` int(255) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_status`
--

CREATE TABLE `pesanan_status` (
  `id_status` int(20) NOT NULL,
  `id_order` int(20) NOT NULL,
  `ket_status` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(20) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` int(30) NOT NULL,
  `vendor` varchar(50) NOT NULL,
  `id_kat` int(25) NOT NULL,
  `id_subkat` int(25) NOT NULL,
  `stok` int(50) NOT NULL,
  `min_beli` int(20) NOT NULL,
  `berat` double NOT NULL,
  `unit` varchar(50) NOT NULL,
  `desk_produk` text NOT NULL,
  `img_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `vendor`, `id_kat`, `id_subkat`, `stok`, `min_beli`, `berat`, `unit`, `desk_produk`, `img_produk`) VALUES
(1, 'Chocolatos Original', 10500, 'Garudafood', 1, 5, 225, 1, 8.5, '1 Karton (24pcs)', 'Wafer rasa cokelat rasa cokelat original.', ''),
(2, 'Chocolatos Dark', 18000, 'Garudafood', 1, 5, 500, 1, 16, '1 Karton (20pcs)', 'Wafer roll cokelat rasa cokelat dark.', ''),
(3, 'Oreo Original 133gr', 175000, 'PT Kraft Indonesia', 1, 4, 50, 1, 133, '1 Dus (24pcs)', 'Kue kering cokelat berisi krim vanila.', ''),
(4, 'Oreo Chocolate Creme 133gr', 175000, 'PT Kraft Indonesia', 1, 4, 50, 1, 133, '1 Dus (24pcs)', 'Kue kering cokelat berisi krim cokelat.', ''),
(5, 'Oreo Strawberry Creme 133gr', 175000, 'PT Kraft Indonesia', 1, 4, 50, 1, 133, '1 Dus (24pcs)', 'Kue kering cokelat berisi krim stroberi.', ''),
(6, 'Oreo Ice Cream 133gr', 180000, 'PT Kraft Indonesia', 1, 4, 50, 1, 133, '1 Dus (24pcs)', 'Kue kering cokelat berisi krim blueberry dengan sensasi dingin.', ''),
(7, 'Oreo Peanut Butter and Chocolate 133gr', 175000, 'PT Kraft Indonesia', 1, 4, 50, 1, 133, '1 Dus (24pcs)', 'Kue kering cokelat berisi krim selai kacang dan cokelat.', ''),
(8, 'Oreo Double Stuf 133gr', 180000, 'PT Kraft Indonesia', 1, 4, 50, 1, 133, '1 Dus (24pcs)', 'Kue kering cokelat berisi krim vanila yang lebih tebal.', ''),
(9, 'Oreo Red Velvet 133gr', 185000, 'PT Kraft Indonesia', 1, 4, 25, 1, 133, '1 Dus (24pcs)', 'Kue kering red velvet berisi krim vanila.', ''),
(10, 'Oreo Golden 133gr', 180000, 'PT Kraft Indonesia', 1, 4, 35, 1, 133, '1 Dus (24pcs)', 'Kue kering keemasan berisi krim vanila.', ''),
(12, 'Good Time - Classic 72gr', 282000, 'Arnotts', 1, 4, 25, 1, 72, '1 Karton (48pcs)', '', ''),
(13, 'Good Time - Double Choco 72gr', 282000, 'Arnotts', 1, 4, 25, 1, 72, '1 Karton (48pcs)', '', ''),
(14, 'Good Time - Brownies 72gr', 282000, 'Arnotts', 1, 4, 20, 1, 72, '1 Karton (48pcs)', '', ''),
(16, 'Good Time - Pandan 72gr', 282000, 'Arnotts', 1, 4, 20, 1, 72, '1 Karton (48pcs)', '', ''),
(17, 'Good Time - Rainbow 72gr', 282000, 'Arnotts', 1, 4, 20, 1, 72, '1 Karton (48pcs)', '', ''),
(18, 'Good Time - Milky Vanilla 72gr', 282000, 'Arnotts', 1, 4, 20, 1, 72, '1 Karton (48pcs)', '', ''),
(20, 'Coca Cola 250ml', 37000, 'Coca Cola Amatil Indonesia', 2, 15, 50, 1, 250, '1 Karton (24pcs)', '', ''),
(21, 'Livebuoy Batang - Total10 75gr', 340000, 'PT Unilever Indonesia', 6, 25, 15, 1, 75, '1 Karton (144pcs)', '', ''),
(22, 'Livebuoy Batang - Care 75gr', 340000, 'PT Unilever Indonesia', 6, 25, 15, 1, 75, '1 Karton (144pcs)', '', ''),
(23, 'Livebuoy Batang - Fresh 75gr', 340000, 'PT Unilever Indonesia', 6, 25, 15, 1, 75, '1 Karton (144pcs)', '', ''),
(24, 'Livebuoy Batang - Lemon Fresh 75gr', 340000, 'PT Unilever Indonesia', 6, 25, 15, 1, 75, '1 Karton (144pcs)', '', ''),
(25, 'Livebuoy Batang - Nature 75gr', 340000, 'PT Unilever Indonesia', 6, 25, 15, 1, 75, '1 Karton (144pcs)', '', ''),
(26, 'Good Day - Original 20gr', 10300, 'PT Santos Jaya Abadi', 2, 11, 100, 1, 20, '1 Renceng (10pcs)', '', ''),
(27, 'Good Day - Mocacinno 20gr', 10300, 'PT Santos Jaya Abadi', 2, 11, 100, 1, 20, '1 Renceng (10pcs)', '', ''),
(28, 'Good Day - Chococinno 20gr', 10300, 'PT Santos Jaya Abadi', 2, 11, 95, 1, 20, '1 Renceng (10pcs)', '', ''),
(29, 'Good Day - Vanilla Latte 20gr', 10300, 'PT Santos Jaya Abadi', 2, 11, 98, 1, 20, '1 Renceng (10pcs)', '', ''),
(30, 'Good Day - Coolin 20gr', 10300, 'PT Santos Jaya Abadi', 2, 11, 97, 1, 20, '1 Renceng (10pcs)', '', ''),
(31, 'Good Day - Carrebian Nut 20gr', 10300, 'PT Santos Jaya Abadi', 2, 11, 96, 1, 20, '1 Renceng (10pcs)', '', ''),
(32, 'Good Day - White Frape 20gr', 10300, 'PT Santos Jaya Abadi', 2, 11, 90, 1, 20, '1 Renceng (10pcs)', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `produk_img`
--

CREATE TABLE `produk_img` (
  `id_img` int(15) NOT NULL,
  `id_produk` int(15) NOT NULL,
  `images` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_img`
--

INSERT INTO `produk_img` (`id_img`, `id_produk`, `images`, `date_time`) VALUES
(7, 1, 'chocolatos.jpg', '2021-05-28 06:42:37'),
(8, 2, 'chocolatosdark.jpg', '2021-05-28 06:43:09'),
(9, 3, 'oreoor.jpg', '2021-05-28 06:44:41'),
(10, 4, 'oreocc.jpg', '2021-05-28 06:45:21'),
(11, 6, 'oreoice.jpg', '2021-05-28 06:46:04'),
(12, 7, 'oreopbc.png', '2021-05-28 06:46:25'),
(13, 8, 'oreods.jpg', '2021-05-28 06:46:44'),
(14, 9, 'oreorv.png', '2021-05-28 06:47:04'),
(15, 12, 'gtcs.jpg', '2021-05-28 06:47:29'),
(16, 13, 'gtdc.jpg', '2021-05-28 06:48:03'),
(17, 14, 'gtbw.jpg', '2021-05-28 06:48:23'),
(19, 17, 'gtrb.jpg', '2021-05-28 06:49:02'),
(20, 18, 'gdmv.jpg', '2021-05-28 06:49:28'),
(22, 20, 'cocacola.jpg', '2021-05-28 06:50:21'),
(27, 16, 'gtpd.jpg', '2021-06-02 04:50:40');

-- --------------------------------------------------------

--
-- Table structure for table `subkategori`
--

CREATE TABLE `subkategori` (
  `id_subkat` int(20) NOT NULL,
  `id_kat` int(20) NOT NULL,
  `nama_subkat` varchar(50) NOT NULL,
  `desk_subkat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subkategori`
--

INSERT INTO `subkategori` (`id_subkat`, `id_kat`, `nama_subkat`, `desk_subkat`) VALUES
(3, 1, 'Permen & Cokelat', ''),
(4, 1, 'Cookies & Cakes', ''),
(5, 1, 'Biscuits & Wafers', ''),
(6, 1, 'Keripik', ''),
(7, 1, 'Kacang', ''),
(8, 1, 'Jelly', ''),
(9, 2, 'Cokelat & Malt', ''),
(10, 2, 'Probiotik', ''),
(11, 2, 'Kopi', ''),
(12, 2, 'Teh', ''),
(13, 2, 'Susu', ''),
(14, 2, 'Jus', ''),
(15, 2, 'Soda', ''),
(16, 2, 'Sirup', ''),
(17, 4, 'Roti Isi', ''),
(18, 4, 'Roti Tawar', ''),
(19, 5, 'Minyak & Cuka', ''),
(20, 5, 'Gula & Garam', ''),
(21, 5, 'Saus & Kecap', ''),
(22, 5, 'Rempah & Bumbu Masak', ''),
(23, 5, 'Jelly & Pudding', ''),
(24, 5, 'Tepung', ''),
(25, 6, 'Perlengkapan Mandi', ''),
(26, 6, 'Perawatan Rambut', ''),
(27, 6, 'Perawatan Mulut', ''),
(28, 6, 'Perawatan Kulit', ''),
(29, 6, 'Perawatan Wanita', ''),
(30, 6, 'Perawatan Pria', ''),
(31, 6, 'Perawatan Kesehatan & P3K', ''),
(32, 6, 'Suplemen Kesehatan', ''),
(33, 7, 'Popok Bayi', ''),
(34, 7, 'Perawatan Rambut & Tubuh', ''),
(35, 7, 'Kesehatan Bayi', ''),
(47, 7, 'Kebersihan Alat Bayi', ''),
(50, 11, 'Perlengkapan Kebersihan', ''),
(51, 11, 'Perlengkapan Mencuci', ''),
(52, 11, 'Produk Tisu', ''),
(53, 11, 'Pembasmi Serangga', ''),
(54, 11, 'Baterai', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `notelp` varchar(20) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `nama_toko` varchar(25) NOT NULL,
  `no_toko` int(50) NOT NULL,
  `alamat_toko` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `nik`, `email`, `notelp`, `passwd`, `nama_toko`, `no_toko`, `alamat_toko`) VALUES
(1, 'Admin 1', '00000000000', 'admin@goedang.id', '08562000123', '$2y$10$DqcDYzPN7XqyAhk4mEj4JuQehKH1MUUfDZ6/MtwB2FH0EwGAQMcri', 'Toko Goedang', 0, 'Gardenia Regency Jl. Boulevard No. 2A, Kec. Cimahi Utara, Kota Cimahi 40512'),
(2, 'Fatma Kurnia Febrianti', '1231232131', 'fatmaaakf@gmail.com', '08562000807', '$2y$10$CmghemE8z89dnW7NyjMGz.Y6ExOpxEuvOL/ucaqtk7cQE2ZwnOZwS', 'Kurupuk Gumeulis', 270201, 'Kompleks Bukit Permana Residence No. A5, Kel. Citeureup, Kec. Cimahi Utara'),
(3, 'Casey Luong', '123987654', 'keshi@gmail.com', '0811199404', '$2y$10$AW5OzA6.JM0uFhk5oDHVaO//s73H79/U6gJNE6NHHhLdvwCUcyKh.', 'Keshtore', 123987654, 'Jl. Boulevard No. 94'),
(4, 'Diana Romelia', '123459876', 'dromelia20@gmail.com', '08562000806', '$2y$10$0iimjvJAYotB.ToCO5f3gusItAIVmPciGJ7glZSyDncahuT5WqlOe', 'Disaladan', 123459876, 'Bukit Permana Residence No. A5'),
(5, 'Brian Kang', '9876543210', 'whosbrian@gmail.com', '089603491909', '$2y$10$/hPPaeucO/kzcChX8Q2SH./XuRtO9Sa/rAm4XpqV1ylsz2IlK9Vz.', 'YoungOne', 1239876540, 'Gangdong-gu, Seoul, South Korea'),
(6, 'Yuni', '2134567289', 'yunikardila@gmail.com', '08123456789', '$2y$10$uuPD/Nk5zurJxKqsu5RWPOCUj8SKS32IiFmsIxOiyZ4UC4OeF23wG', 'Toko Yuni', 123456789, 'Jl. Dimana mana No. 123'),
(7, 'Test2', '172778398', 'test2@test.id', '08932749273', '$2y$10$AcpZEqGrwwYuy7gFS.NquOYZp1lSe6eSZK4aIIYUgIe5RwPXvEMmC', 'Test2', 1281612, 'Test2'),
(8, 'Test 123', '128462794322', 'test@goedang.id', '08745284912', '$2y$10$Voc86vb0ccXWnwv/5uexBeaXAvG6H7xSnOZB4yUUF92967U/Q06MW', 'Test3', 2147483647, 'Test3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `FK_Us` (`id_user`),
  ADD KEY `FK_Prod` (`id_produk`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kat`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_bayar`),
  ADD KEY `FK_PembayaranOrderID` (`id_order`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `FK_IDUser` (`id_user`);

--
-- Indexes for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD PRIMARY KEY (`id_ordetail`),
  ADD KEY `FK_IDProduk` (`id_produk`),
  ADD KEY `FK_OrderID` (`id_order`);

--
-- Indexes for table `pesanan_status`
--
ALTER TABLE `pesanan_status`
  ADD PRIMARY KEY (`id_status`),
  ADD KEY `FK_StatusOrderID` (`id_order`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `FK_Kat` (`id_kat`),
  ADD KEY `FK_Subkat` (`id_subkat`);

--
-- Indexes for table `produk_img`
--
ALTER TABLE `produk_img`
  ADD PRIMARY KEY (`id_img`),
  ADD KEY `FK_Produk` (`id_produk`);

--
-- Indexes for table `subkategori`
--
ALTER TABLE `subkategori`
  ADD PRIMARY KEY (`id_subkat`),
  ADD KEY `FK_Kategori` (`id_kat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kat` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_bayar` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_order` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  MODIFY `id_ordetail` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan_status`
--
ALTER TABLE `pesanan_status`
  MODIFY `id_status` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `produk_img`
--
ALTER TABLE `produk_img`
  MODIFY `id_img` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `subkategori`
--
ALTER TABLE `subkategori`
  MODIFY `id_subkat` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_Prod` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `FK_Us` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `FK_PembayaranOrderID` FOREIGN KEY (`id_order`) REFERENCES `pesanan` (`id_order`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `FK_IDUser` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD CONSTRAINT `FK_IDOrder` FOREIGN KEY (`id_order`) REFERENCES `pesanan` (`id_order`),
  ADD CONSTRAINT `FK_IDProduk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `FK_OrderID` FOREIGN KEY (`id_order`) REFERENCES `pesanan` (`id_order`);

--
-- Constraints for table `pesanan_status`
--
ALTER TABLE `pesanan_status`
  ADD CONSTRAINT `FK_StatusOrderID` FOREIGN KEY (`id_order`) REFERENCES `pesanan` (`id_order`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `FK_Kat` FOREIGN KEY (`id_kat`) REFERENCES `kategori` (`id_kat`),
  ADD CONSTRAINT `FK_Subkat` FOREIGN KEY (`id_subkat`) REFERENCES `subkategori` (`id_subkat`);

--
-- Constraints for table `produk_img`
--
ALTER TABLE `produk_img`
  ADD CONSTRAINT `FK_Produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `subkategori`
--
ALTER TABLE `subkategori`
  ADD CONSTRAINT `FK_Kategori` FOREIGN KEY (`id_kat`) REFERENCES `kategori` (`id_kat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
