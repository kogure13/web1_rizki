-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2017 at 12:04 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_obatherbal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_artikel`
--

CREATE TABLE `tb_artikel` (
  `id` int(11) NOT NULL,
  `judul_artikel` varchar(255) DEFAULT NULL,
  `isi_artikel` text,
  `penulis_artikel` varchar(255) DEFAULT NULL,
  `tgl_artikel` date DEFAULT NULL,
  `publish` int(11) DEFAULT '0',
  `kategori` int(11) DEFAULT NULL,
  `kamus_penyakit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kamuspenyakit`
--

CREATE TABLE `tb_kamuspenyakit` (
  `id` int(11) NOT NULL,
  `kode_penyakit` varchar(255) DEFAULT NULL,
  `nama_penyakit` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kamuspenyakit`
--

INSERT INTO `tb_kamuspenyakit` (`id`, `kode_penyakit`, `nama_penyakit`) VALUES
(1, '011', 'asam urat'),
(2, '02', 'ggg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL,
  `kode_kategori` varchar(255) DEFAULT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `kode_kategori`, `nama_kategori`) VALUES
(1, '01', 'Asam Urat'),
(2, '02', 'Asma / Sesak Nafas'),
(3, '03', 'Batu Ginjal');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `kode_produk` varchar(255) DEFAULT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `harga_produk` double DEFAULT NULL,
  `link_gambar` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id`, `id_kategori`, `kode_produk`, `nama_produk`, `harga_produk`, `link_gambar`) VALUES
(1, 1, '01', 'Ekstrak Bawang Dayak TN57 60 kapsul', 65000, 'http://obatherbalmart.com/wp-content/uploads/2017/05/Ekstrak-Bawang-Dayak-TN57-60-kapsul-300x300.jpg'),
(2, 1, '02', 'Vermint Vermindo Internasional 30 Kapsul', 40000, 'http://obatherbalmart.com/wp-content/uploads/2016/12/Vermint-Vermindo-Internasional-30-Kapsul-300x300.jpg'),
(3, 1, '03', 'Minyak Buah Merah (Red Oil Papua) Fira', 80000, 'http://obatherbalmart.com/wp-content/uploads/2016/01/Minyak-Buah-Merah-Red-Oil-Papua-Fira-Herbalindo-60-Kapsul-300x300.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kamuspenyakit`
--
ALTER TABLE `tb_kamuspenyakit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_kamuspenyakit`
--
ALTER TABLE `tb_kamuspenyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
