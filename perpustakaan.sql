-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2021 at 09:29 PM
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
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `nim` varchar(25) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `id_prodi` varchar(25) NOT NULL,
  `tlp` varchar(50) NOT NULL,
  `foto_anggota` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`nim`, `nama_anggota`, `id_prodi`, `tlp`, `foto_anggota`) VALUES
('TI15180002', 'L Rudi Setiawan', '55423', '087758647122', 'r.jpg'),
('TI15180005', 'Gilang Restu Imam Wahyudi', '55424', '086765654432', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `kd_buku` int(50) NOT NULL,
  `jdl_buku` varchar(150) NOT NULL,
  `penulis_buku` varchar(150) NOT NULL,
  `penerbit_buku` varchar(150) NOT NULL,
  `thn_terbit` date NOT NULL,
  `stok` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`kd_buku`, `jdl_buku`, `penulis_buku`, `penerbit_buku`, `thn_terbit`, `stok`) VALUES
(1111, 'Algoritma', 'Algo', 'Ritma', '2019-11-05', 3),
(88000, 'Memories', 'Gina fs', 'Dreams', '2021-01-01', 3),
(123456, 'Web', 'pipi', 'Dreams', '2021-01-11', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kembali`
--

CREATE TABLE `tb_kembali` (
  `id_kembali` int(11) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `tgl_serah` date NOT NULL,
  `denda` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kembali`
--

INSERT INTO `tb_kembali` (`id_kembali`, `id_pinjam`, `tgl_serah`, `denda`) VALUES
(1, 1, '2021-01-17', 15000),
(4, 3, '2021-01-18', 0),
(5, 7, '2021-01-18', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjam`
--

CREATE TABLE `tb_pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `kd_buku` int(50) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL DEFAULT current_timestamp(),
  `tgl_kembali` date NOT NULL,
  `stts_buku` enum('Dipinjam','Kembali') NOT NULL DEFAULT 'Dipinjam'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pinjam`
--

INSERT INTO `tb_pinjam` (`id_pinjam`, `kd_buku`, `nim`, `id_user`, `tgl_pinjam`, `tgl_kembali`, `stts_buku`) VALUES
(1, 1111, 'TI15180002', 3, '2021-01-16', '2021-01-02', 'Kembali'),
(3, 88000, 'TI15180002', 3, '2021-01-17', '2021-01-23', 'Kembali'),
(5, 88000, 'TI15180005', 4, '2021-01-18', '2021-01-24', 'Kembali'),
(6, 88000, 'TI15180002', 3, '2021-01-18', '2021-01-24', 'Dipinjam'),
(7, 123456, 'TI15180005', 3, '2021-01-18', '2021-01-03', 'Kembali');

-- --------------------------------------------------------

--
-- Table structure for table `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id_prodi` varchar(35) NOT NULL,
  `nama_prodi` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_prodi`
--

INSERT INTO `tb_prodi` (`id_prodi`, `nama_prodi`) VALUES
('123456', 'Pertanian'),
('55423', 'Teknik Informatika'),
('55424', 'Sistem Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pswd` varchar(255) NOT NULL,
  `tlp` varchar(30) NOT NULL,
  `level` enum('Admin','Petugas') NOT NULL,
  `foto_user` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `pswd`, `tlp`, `level`, `foto_user`) VALUES
(2, 'Gina Fairuz Shofi', 'gina@gmail.com', '$2y$10$n6coqhZ9Pf7YMlKOD1dIvuy3ZlJLuvcjcCJFlU8qCQus6Q5mDCVWS', '087758647122', 'Admin', 'IMG-20200529-WA0032.jpg'),
(3, 'Moh Fahrorrozi', 'rozi@gmail.com', '$2y$10$6WlQKLIK3yKNwAlmd/pUaORWauuYmGOAHcrBbQtLzxx.B1wG0PPEa', '0812345678901', 'Petugas', 'rozi_1.jpg'),
(4, 'Ahmad Rezayuhardi', 'reza@gmail.com', '$2y$10$BhOCT8/EJPSCPwMdIw5ndO84X5YpL4tUTdIfs3AveF/MwjnUUIKoe', '08776113258', 'Petugas', 'IMG-20201104-WA0033.jpg'),
(5, 'Anti Susilawati', 'anti@gmail.com', '$2y$10$hqBDfcX3Xvj/3Vf/jYul4ehbigQEmikB1YKKKJxk/SdPSZKvF1Y5W', '087761132589', 'Petugas', 'IMG-20200319-WA0058.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`kd_buku`);

--
-- Indexes for table `tb_kembali`
--
ALTER TABLE `tb_kembali`
  ADD PRIMARY KEY (`id_kembali`);

--
-- Indexes for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kembali`
--
ALTER TABLE `tb_kembali`
  MODIFY `id_kembali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD CONSTRAINT `tbl_anggota_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `tb_prodi` (`id_prodi`),
  ADD CONSTRAINT `tbl_anggota_ibfk_2` FOREIGN KEY (`id_prodi`) REFERENCES `tb_prodi` (`id_prodi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
