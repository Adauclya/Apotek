-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2019 at 05:19 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `kd_barang` varchar(50) NOT NULL,
  `jml_barang` int(11) NOT NULL,
  `golongan` enum('obat_bebas','obat_keras','obat_psikotropika','obat_narkotika','alat') NOT NULL,
  `tgl_kdl` date NOT NULL,
  `nip` int(25) NOT NULL,
  `harga_jual` int(30) NOT NULL,
  `harga_beli` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kd_barang`, `jml_barang`, `golongan`, `tgl_kdl`, `nip`, `harga_jual`, `harga_beli`) VALUES
(5, 'A001-Hexetidine', 3000, 'obat_psikotropika', '2019-05-31', 2019001, 30000, 20000),
(6, 'A001-Hexetidine', 30, 'obat_psikotropika', '2019-05-23', 2019001, 30000, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `operasional`
--

CREATE TABLE `operasional` (
  `kd_operasional` int(11) NOT NULL,
  `tanggal_op` date NOT NULL,
  `oleh` varchar(30) NOT NULL,
  `pengeluaran` int(25) NOT NULL,
  `uraian` varchar(100) NOT NULL,
  `nip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operasional`
--

INSERT INTO `operasional` (`kd_operasional`, `tanggal_op`, `oleh`, `pengeluaran`, `uraian`, `nip`) VALUES
(2, '2019-04-20', 'syam', 54000, 'bayar PLN', 2019001),
(3, '2019-04-20', 'syam', 153000, 'bayar PDAM', 2019001),
(4, '2019-04-20', 'syam', 153000, 'bayar Internet', 2019001),
(5, '2019-05-20', 'ryandi', 120000, 'bayar PDAM', 2019005),
(6, '2019-05-19', 'ryandi', 135000, 'bayar PLN', 2019005),
(7, '2019-05-19', 'ryandi', 450000, 'bayar Internet', 2019005);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` int(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `ttl` date NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `agama` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `foto` varchar(200) NOT NULL DEFAULT 'default.png',
  `level` enum('admin','resepsionis','divkeu','divsup') NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `username`, `password`, `ttl`, `alamat`, `agama`, `status`, `foto`, `level`, `nama`) VALUES
(2019001, 'syam', 'syam', '2000-03-12', 'Jl. Lodaya Purwakarta', 'Islam', 'Single', 'default.png', 'admin', 'Muhammad Syam'),
(2019002, 'ryandi', 'ryandi', '2019-04-25', 'JL', 'apa', '404', 'default.png', 'admin', 'Ryandi Johansah'),
(2019004, 'resepsionis', 'resepsionis', '2019-04-25', 'Alamat', 'Agama', '404', 'receptionist.png', 'resepsionis', 'Resepsionis'),
(2019005, 'divkeu', 'divkeu', '2019-04-25', 'Alamat', 'Agama', '404', 'keuangan.png', 'divkeu', 'Divisi Keuangan'),
(2019006, 'divsup', 'divsup', '2019-04-25', 'Alamat', 'Agama', '404', 'supplier.png', 'divsup', 'divsup');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `kd_pembelian` varchar(11) NOT NULL,
  `kd_barang` varchar(50) NOT NULL,
  `jml` int(11) NOT NULL,
  `hrg_barang` int(30) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `nip` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`kd_pembelian`, `kd_barang`, `jml`, `hrg_barang`, `tanggal_beli`, `nip`) VALUES
('001', 'A003-Klindamisin', 12, 20000, '2019-04-20', 2019001),
('12346', 'A001-Hexetidine', 122, 50000, '2019-04-19', 2019001);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `kd_penjualan` int(11) NOT NULL,
  `kd_barang` varchar(50) NOT NULL,
  `jml_barang` int(11) NOT NULL,
  `harga_barang` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `nip` int(25) NOT NULL,
  `id_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `penjualan`
--
DELIMITER $$
CREATE TRIGGER `otoharga` AFTER INSERT ON `penjualan` FOR EACH ROW BEGIN
UPDATE barang SET jml_barang = jml_barang - new.jml_barang
WHERE kd_barang = new.kd_barang;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `operasional`
--
ALTER TABLE `operasional`
  ADD PRIMARY KEY (`kd_operasional`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`kd_pembelian`),
  ADD KEY `fk_barang_pembelian` (`kd_barang`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`kd_penjualan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `operasional`
--
ALTER TABLE `operasional`
  MODIFY `kd_operasional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `kd_penjualan` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
