-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2022 at 02:56 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_serendipity2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_fasilitas`
--

CREATE TABLE `tb_fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `nama_fasilitas` varchar(50) NOT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_fasilitas`
--

INSERT INTO `tb_fasilitas` (`id_fasilitas`, `nama_fasilitas`, `ket`) VALUES
(1, 'Restaurant', '08 AM - 11 PM'),
(2, 'Spa & Massage', '07 AM - 09 PM'),
(3, 'Swimming Pool', '24 Hours'),
(4, 'Bar', '10 AM - 09 PM'),
(5, 'Indoor Restaurant', '08 AM - 11 PM'),
(6, 'Cafe', '11 AM - 4 PM'),
(9, 'Barr', '11 AM - 4 PM');

-- --------------------------------------------------------

--
-- Table structure for table `tb_multi`
--

CREATE TABLE `tb_multi` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_multi`
--

INSERT INTO `tb_multi` (`id_petugas`, `username`, `password`, `level`) VALUES
(1, 'agatha', '81186d077459fca990144f65d3340e06', 'admin'),
(2, 'athan', '81186d077459fca990144f65d3340e06', 'admin'),
(3, 'nevan', '81186d077459fca990144f65d3340e06', 'admin'),
(4, 'brian', '9a276015077f5748e06bcf22621e9503', 'resepsionis'),
(5, 'satya', '9a276015077f5748e06bcf22621e9503', 'resepsionis'),
(6, 'devan', '9a276015077f5748e06bcf22621e9503', 'resepsionis');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `kd_bayar` char(6) NOT NULL,
  `kd_reservasi` char(6) NOT NULL,
  `bukti_bayar` varchar(100) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `nama_rekening` varchar(50) NOT NULL,
  `nomor_rekening` char(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`kd_bayar`, `kd_reservasi`, `bukti_bayar`, `tanggal_bayar`, `nama_rekening`, `nomor_rekening`) VALUES
('BYR001', 'RSV001', '-', '2022-03-21', 'lili', '89468906457428'),
('BYR002', 'RSV002', '-', '2022-03-22', 'lulu', '89652468760248'),
('BYR003', 'RSV003', '-', '2022-03-22', 'RADIT', '24976069834542'),
('BYR005', 'RSV006', '', '0000-00-00', 'Rudi', '85649786321578'),
('BYR006', 'RSV006', '', '0000-00-00', 'Rudi', '85649786321578'),
('BYR009', 'RSV008', '', '0000-00-00', 'Rudi', '85649786321578'),
('BYR010', 'RSV008', '', '0000-00-00', 'Rudi', '85649786321578'),
('BYR011', 'RSV008', '', '0000-00-00', 'Rudi', '85649786321578'),
('BYR012', 'RSV009', '', '0000-00-00', 'Rudi', '85649786321578'),
('BYR013', 'RSV010', '', '0000-00-00', 'rudi', '89563478216895'),
('BYR014', 'RSV010', '', '0000-00-00', 'rudi', '89563478216895'),
('BYR015', 'RSV010', '', '0000-00-00', 'rudi', '89563478216895'),
('BYR016', 'RSV011', '', '0000-00-00', 'gigi', '89563478216896'),
('BYR017', 'RSV013', '', '0000-00-00', 'rudi', '89563478216896'),
('BYR018', 'RSV013', '', '0000-00-00', 'rudi', '89563478216896'),
('BYR019', 'RSV013', '', '2022-03-27', 'rudi', '89563478216899');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reservasi`
--

CREATE TABLE `tb_reservasi` (
  `kd_reservasi` char(6) NOT NULL,
  `id_user` char(5) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `jml_kamar` int(11) NOT NULL,
  `jml_hari` int(11) NOT NULL,
  `id_kamar` int(4) NOT NULL,
  `tgl_dipesan` date NOT NULL,
  `total` int(30) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_reservasi`
--

INSERT INTO `tb_reservasi` (`kd_reservasi`, `id_user`, `check_in`, `check_out`, `jml_kamar`, `jml_hari`, `id_kamar`, `tgl_dipesan`, `total`, `status`) VALUES
('RSV001', 'TM001', '2022-03-21', '2022-03-23', 1, 2, 1, '2022-03-21', 3, 1),
('RSV002', 'TM002', '2022-03-21', '2022-03-22', 1, 1, 3, '2022-03-21', 3, 1),
('RSV003', 'TM003', '2022-03-23', '2022-03-25', 2, 2, 2, '2022-03-21', 3, 1),
('RSV004', 'TM004', '2022-03-26', '2022-03-27', 1, 1, 1, '2022-03-26', 1500000, 0),
('RSV006', 'TM004', '2022-03-26', '2022-03-27', 1, 1, 1, '2022-03-26', 1500000, 0),
('RSV007', 'TM004', '2022-03-26', '2022-03-27', 1, 1, 1, '2022-03-26', 1500, 0),
('RSV008', 'TM004', '2022-03-26', '2022-03-27', 1, 1, 1, '2022-03-26', 1500000, 0),
('RSV009', 'TM006', '0000-00-00', '0000-00-00', 4, 1, 3, '2022-03-26', 1500, 0),
('RSV010', 'TM004', '2022-03-26', '2022-03-27', 1, 1, 3, '2022-03-26', 3600, 0),
('RSV011', 'TM007', '2022-03-24', '2022-03-26', 1, 2, 1, '2022-03-26', 3000000, 0),
('RSV012', 'TM004', '2022-03-27', '2022-03-28', 1, 1, 2, '2022-03-27', 2300000, 0),
('RSV013', 'TM004', '2022-03-27', '2022-03-28', 1, 1, 1, '2022-03-27', 1500000, 0),
('RSV014', 'TM001', '2022-03-29', '2022-03-30', 1, 1, 1, '2022-03-27', 500000, 0),
('RSV015', 'TM001', '2022-03-29', '2022-03-30', 1, 1, 12, '2022-03-27', 400000, 0),
('RSV016', 'TM001', '2022-03-28', '2022-03-29', 1, 1, 1, '2022-03-28', 1500000, 0),
('RSV017', 'TM001', '2022-03-28', '2022-03-29', 1, 1, 1, '2022-03-28', 1500000, 0),
('RSV018', 'TM001', '2022-03-28', '2022-03-29', 1, 1, 1, '2022-03-28', 1500000, 0),
('RSV019', 'TM003', '2022-03-28', '2022-03-29', 1, 1, 1, '2022-03-28', 1500000, 0),
('RSV020', 'TM003', '2022-03-28', '2022-03-29', 1, 1, 1, '2022-03-28', 1500000, 0),
('RSV021', 'TM003', '2022-03-28', '2022-03-29', 1, 1, 1, '2022-03-28', 1500000, 0),
('RSV022', 'TM001', '2022-03-28', '2022-03-29', 1, 1, 1, '2022-03-28', 1500000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tamu`
--

CREATE TABLE `tb_tamu` (
  `id_user` char(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `no_telp` char(13) NOT NULL,
  `password` varchar(225) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kabkot` varchar(50) NOT NULL,
  `kec` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tamu`
--

INSERT INTO `tb_tamu` (`id_user`, `username`, `email`, `no_telp`, `password`, `alamat`, `provinsi`, `kabkot`, `kec`) VALUES
('TM001', 'lili', 'lili@gmail.com', '0895352367400', '777bbb7869ae8193249f8ff7d3e59afe', 'Cipatik', 'Jawa Barat', 'Cimahi', 'Cihampelas'),
('TM002', 'luluuu', 'luluadilah388@gmail.com', '0895352367401', 'a73d49f03849fa768255780c7f4d2cec', 'Cipatik', 'Jawa Barat', 'Bandung Barat', 'Cihampelas'),
('TM003', 'radit', 'radit@gmail.com', '0895352367402', '827ccb0eea8a706c4c34a16891f84e7b', 'cimahi', 'Jawa Barat', 'Cimahi', 'Cihampelas'),
('TM004', 'rudi', 'rudi@gmail.com', '0895352367403', '827ccb0eea8a706c4c34a16891f84e7b', 'cimahi', 'Jawa Barat', 'Cimahi', 'Cihampelas'),
('TM005', 'lolo', 'lolo@gmail.com', '0895352367404', 'd6581d542c7eaf801284f084478b5fcc', 'Batujajar', 'Jawa Barat', 'Bandung Barat', 'Batujajar'),
('TM006', 'juju', 'jsangrill@gmail.com', '9858489683', '0348dcd774a2892097b9d5c84ce882d3', 'huh', 'Jawa Barat', 'Bandung Barat', 'Saguling'),
('TM007', 'gigi', 'gigi@gmail.com', '0895352367407', 'ec0c8fe7ad80dfe93c0de35448b1d581', 'btjjr', 'Jawa Barat', 'Bandung Barat', 'Batujajar'),
('TM008', 'Syanie Khoiru Nissa', 'syanikhn@gmail.com', '083829410684', '462950d333ef567a2ec5796d6d99070b', 'Kp. Padakasih Rt 005 RW 008', 'Jawa Barat', 'Cimahi', 'Cihampelas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tipekamar`
--

CREATE TABLE `tb_tipekamar` (
  `id_kamar` int(4) NOT NULL,
  `tipe_kamar` varchar(50) NOT NULL,
  `jml_kamar` int(3) NOT NULL,
  `harga_kamar` char(10) NOT NULL,
  `Fasilitas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tipekamar`
--

INSERT INTO `tb_tipekamar` (`id_kamar`, `tipe_kamar`, `jml_kamar`, `harga_kamar`, `Fasilitas`) VALUES
(1, 'Standard Room', 15, '1.500.000', 'AC,\r\nBathtub,\r\nLED TV 32inch'),
(2, 'Deluxe Room', 10, '2.300.000', 'AC,\r\nSofa,\r\nBathtub,\r\nLED TV 45inch'),
(3, 'Suite Room', 5, '3.600.000', 'AC,\r\nSofa,\r\nGym,\r\nBathtub,\r\nLED TV 45inch,\r\nPrivate Swimming Pool\r\n'),
(12, 'Standard Room', 3, '4.000.000', 'wifi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_fasilitas`
--
ALTER TABLE `tb_fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `tb_multi`
--
ALTER TABLE `tb_multi`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`kd_bayar`),
  ADD KEY `kd_reservasi` (`kd_reservasi`);

--
-- Indexes for table `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  ADD PRIMARY KEY (`kd_reservasi`),
  ADD KEY `id_kamar` (`id_kamar`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_tamu`
--
ALTER TABLE `tb_tamu`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_tipekamar`
--
ALTER TABLE `tb_tipekamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_fasilitas`
--
ALTER TABLE `tb_fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_multi`
--
ALTER TABLE `tb_multi`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_tipekamar`
--
ALTER TABLE `tb_tipekamar`
  MODIFY `id_kamar` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `tb_pembayaran_ibfk_1` FOREIGN KEY (`kd_reservasi`) REFERENCES `tb_reservasi` (`kd_reservasi`);

--
-- Constraints for table `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  ADD CONSTRAINT `tb_reservasi_ibfk_1` FOREIGN KEY (`id_kamar`) REFERENCES `tb_tipekamar` (`id_kamar`),
  ADD CONSTRAINT `tb_reservasi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_tamu` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
