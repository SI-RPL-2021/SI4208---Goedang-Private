-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2021 at 04:45 AM
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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
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
(1, 'Admin', '00000000000', 'admin@goedang.id', '00000000000', '$2y$10$rlMpAx2io0MPlJcDVVdJH./4b2sy1MIlU2R6ZAh3RC5cLEx1MoRxS', 'Admin', 0, 'Admin'),
(2, 'Fatma Kurnia Febrianti', '1231232131', 'fatmaaakf@gmail.com', '08562000807', '$2y$10$CmghemE8z89dnW7NyjMGz.Y6ExOpxEuvOL/ucaqtk7cQE2ZwnOZwS', 'Kurupuk Gumeulis', 270201, 'Kompleks Bukit Permana Residence No. A5, Kel. Citeureup, Kec. Cimahi Utara'),
(3, 'Casey Luong', '123987654', 'keshi@gmail.com', '0811199404', '$2y$10$AW5OzA6.JM0uFhk5oDHVaO//s73H79/U6gJNE6NHHhLdvwCUcyKh.', 'Keshtore', 123987654, 'Jl. Boulevard No. 94'),
(4, 'Diana Romelia', '123459876', 'dromelia20@gmail.com', '08562000806', '$2y$10$0iimjvJAYotB.ToCO5f3gusItAIVmPciGJ7glZSyDncahuT5WqlOe', 'Disaladan', 123459876, 'Bukit Permana Residence No. A5'),
(5, 'Brian Kang', '9876543210', 'whosbrian@gmail.com', '089603491909', '$2y$10$/hPPaeucO/kzcChX8Q2SH./XuRtO9Sa/rAm4XpqV1ylsz2IlK9Vz.', 'YoungOne', 1239876540, 'Gangdong-gu, Seoul, South Korea'),
(6, 'Yuni Kardila', '2134567289', 'yunikardila@gmail.com', '08123456789', '$2y$10$qEg7/oDCtnLxlrIjqrgtzO0mjEiif.wAtJi3r34CPzUdWL99wVlJK', 'Yuni', 123456789, 'Jl. Dimana mana No. 123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
