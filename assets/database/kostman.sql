-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2024 at 10:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kostman`
--

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_akses` int(1) NOT NULL,
  `nama_akses` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id_akses`, `nama_akses`) VALUES
(1, 'Admin'),
(2, 'Penghuni'),
(3, 'nonaktif');

-- --------------------------------------------------------

--
-- Table structure for table `info_kost`
--

CREATE TABLE `info_kost` (
  `id_kost` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `jenis_kost` enum('Kost Putra','Kost Putri') NOT NULL,
  `nama_kost` varchar(255) NOT NULL,
  `alamat_kost` varchar(255) NOT NULL,
  `provinsi_kost` varchar(255) NOT NULL,
  `kota_kost` varchar(255) NOT NULL,
  `no_kost` varchar(255) NOT NULL,
  `email_kost` varchar(255) NOT NULL,
  `logo_kost` varchar(255) NOT NULL,
  `foto_kost` varchar(255) NOT NULL,
  `deskripsi_kost` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `info_kost`
--

INSERT INTO `info_kost` (`id_kost`, `id_pengguna`, `jenis_kost`, `nama_kost`, `alamat_kost`, `provinsi_kost`, `kota_kost`, `no_kost`, `email_kost`, `logo_kost`, `foto_kost`, `deskripsi_kost`) VALUES
(1, 25, 'Kost Putri', 'Kost Bapak Rudi', 'Jl. Bima II No.30 Pendrikan Kidul', 'Jawa tengah', 'Semarang', '6287877119922', '-@gmail.com', '', '676bbe0a153bf.jpg', 'Kost Putra yang nyaman, aman, bersih, dan modern. Memiliki 2 lantai, dan 13 kamar. Fasilitas oke harga bersahabat. Terletak di daerah yang strategis dan dekat dengan kampus Universitas Dian Nuswantoro. Cocok untuk para mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pengeluaran`
--

CREATE TABLE `jenis_pengeluaran` (
  `id_jenis_pengeluaran` int(11) NOT NULL,
  `kode_pengeluaran` varchar(255) NOT NULL,
  `kategori_pengeluaran` enum('Biaya Operasional','Biaya Pemeliharaan','Biaya Makanan','Biaya Marketing','Biaya Lainnya','Pajak') NOT NULL,
  `nama_pengeluaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jenis_pengeluaran`
--

INSERT INTO `jenis_pengeluaran` (`id_jenis_pengeluaran`, `kode_pengeluaran`, `kategori_pengeluaran`, `nama_pengeluaran`) VALUES
(1, 'P0001', 'Pajak', 'Pajak Bumi dan Bangunan'),
(2, 'P0002', 'Biaya Operasional', 'Listrik (PLN)'),
(3, 'P0003', 'Biaya Operasional', 'Air (PDAM)'),
(4, 'P0005', 'Biaya Pemeliharaan', 'Kebersihan');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_status_pembayaran`
--

CREATE TABLE `jenis_status_pembayaran` (
  `id_status` int(11) NOT NULL,
  `nama_status_pembayaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jenis_status_pembayaran`
--

INSERT INTO `jenis_status_pembayaran` (`id_status`, `nama_status_pembayaran`) VALUES
(1, 'sudah dikonfirmasi'),
(2, 'belum dikonfirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `nomor_kamar` int(11) NOT NULL,
  `luas_kamar` varchar(255) NOT NULL,
  `lantai_kamar` enum('1','2','3','4','5','6','7','8') NOT NULL,
  `kapasitas_kamar` int(11) NOT NULL,
  `deskripsi_kamar` varchar(255) NOT NULL,
  `harga_bulanan` double NOT NULL,
  `denda` double NOT NULL,
  `foto_kamar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `nomor_kamar`, `luas_kamar`, `lantai_kamar`, `kapasitas_kamar`, `deskripsi_kamar`, `harga_bulanan`, `denda`, `foto_kamar`) VALUES
(4, 2, '4x4', '1', 1, 'Fasitilas kamar meja,kursi kasur busa,sprei kasur,sarung bantal,lemari pakaian, WIFI,Iistrik gratis, kamar mandi luar, tidak banjir, kamar bersih dan nyaman.', 725000, 1000, '676bc8392d355.jpg'),
(5, 3, '4x4', '1', 1, 'Fasitilas kamar meja,kursi kasur busa,sprei kasur,sarung bantal,lemari pakaian, WIFI,Iistrik gratis, kamar mandi luar, tidak banjir, kamar bersih dan nyaman.', 825000, 1000, '676bc844ca336.jpg'),
(6, 4, '4x4', '1', 1, 'Fasitilas kamar meja,kursi kasur busa,sprei kasur,sarung bantal,lemari pakaian, WIFI,Iistrik gratis, kamar mandi luar, tidak banjir, kamar bersih dan nyaman.', 725000, 1000, '676bc85051ad7.jpg'),
(7, 5, '4x4', '2', 1, 'Fasitilas kamar meja,kursi kasur busa,sprei kasur,sarung bantal,lemari pakaian, WIFI,Iistrik gratis, kamar mandi luar, tidak banjir, kamar bersih dan nyaman.', 525000, 1000, '676bc8613494e.jpg'),
(8, 6, '4x4', '2', 1, 'Fasitilas kamar meja,kursi kasur busa,sprei kasur,sarung bantal,lemari pakaian, WIFI,Iistrik gratis, kamar mandi luar, tidak banjir, kamar bersih dan nyaman.', 825000, 1000, '676bc86ac7f62.jpg'),
(9, 7, '4x4', '2', 1, 'Fasitilas kamar meja,kursi kasur busa,sprei kasur,sarung bantal,lemari pakaian, WIFI,Iistrik gratis, kamar mandi luar, tidak banjir, kamar bersih dan nyaman.', 725000, 5000, '676bc8762965a.jpg'),
(10, 1, '4X4', '1', 1, 'Fasitilas kamar meja,kursi kasur busa,sprei kasur,sarung bantal,lemari pakaian, WIFI,Iistrik gratis, kamar mandi luar, tidak banjir, kamar bersih dan nyaman.', 825000, 1000, '676bc823cce97.jpg'),
(11, 8, '4x4', '2', 1, 'Fasitilas kamar meja,kursi kasur busa,sprei kasur,sarung bantal,lemari pakaian, WIFI,Iistrik gratis, kamar mandi luar, tidak banjir, kamar bersih dan nyaman.', 725000, 1000, '676bc889bced1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `menghuni`
--

CREATE TABLE `menghuni` (
  `id_menghuni` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `menghuni`
--

INSERT INTO `menghuni` (`id_menghuni`, `id_kamar`, `id_pengguna`, `tanggal_masuk`, `tanggal_keluar`) VALUES
(19, 7, 30, '2024-11-10', '0000-00-00'),
(20, 9, 41, '2024-11-26', '0000-00-00'),
(21, 5, 2, '2024-12-25', '0000-00-00'),
(22, 10, 42, '2024-12-25', '0000-00-00'),
(23, 11, 43, '2004-06-25', '0000-00-00'),
(24, 6, 44, '2024-11-25', '0000-00-00'),
(25, 4, 45, '2024-11-25', '0000-00-00'),
(26, 8, 46, '2024-11-25', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_menghuni` int(11) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `nilai_pembayaran` double NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_menghuni`, `tanggal_pembayaran`, `nilai_pembayaran`, `bukti_pembayaran`, `keterangan`, `id_status`) VALUES
(33, 19, '2024-11-20', 912000, '674abed6b00ae.jpg', 'Pembayaran Booking kamar no.5 tanggal: 2024-11-24', 1),
(34, 20, '2024-12-26', 725000, '674ac2d336ba9.jpg', 'hahayhayahaya', 1),
(38, 19, '2024-11-10', 300000, '675312b8df6c4.jpg', 'BAYAR KOST 10 DECEMBER', 1),
(40, 21, '2024-12-25', 725000, '676bba5860952.jpg', 'lunas', 1),
(41, 22, '2024-12-25', 725000, '676bbcfc730d6.jpg', 'lunas', 1),
(42, 23, '2004-06-25', 725000, '676bbda3cedcd.jpg', 'lunas', 1),
(43, 24, '2024-11-25', 725000, '676bc09c45fd5.jpg', 'lunas', 1),
(44, 25, '2024-11-25', 725000, '676bc1187e809.jpg', 'lunas', 1),
(45, 26, '2024-11-25', 725000, '676bc303e4c31.jpg', 'lunas', 1),
(46, 26, '2024-12-25', 740000, '676bc36f2108b.jpg', 'pembayaran kost bulan desember', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `id_jenis_pengeluaran` int(11) NOT NULL,
  `tanggal_pengeluaran` date NOT NULL,
  `nilai_pengeluaran` double NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `bukti_pengeluaran` varchar(255) NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `id_jenis_pengeluaran`, `tanggal_pengeluaran`, `nilai_pengeluaran`, `keterangan`, `bukti_pengeluaran`, `id_pengguna`) VALUES
(6, 2, '2024-11-24', 900000, 'bayar listrik', '674ac3329d0b8.jpg', 25);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `alamat_pengguna` varchar(255) DEFAULT NULL,
  `provinsi_pengguna` varchar(255) DEFAULT NULL,
  `kontak_darurat` varchar(255) DEFAULT NULL,
  `telepon_pengguna` varchar(255) NOT NULL,
  `email_pengguna` varchar(255) NOT NULL,
  `kelamin_pengguna` enum('Pria','Wanita') DEFAULT NULL,
  `tanggal_lahir_pengguna` date DEFAULT NULL,
  `no_ktp_pengguna` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `id_akses` int(1) NOT NULL,
  `foto_pengguna` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `alamat_pengguna`, `provinsi_pengguna`, `kontak_darurat`, `telepon_pengguna`, `email_pengguna`, `kelamin_pengguna`, `tanggal_lahir_pengguna`, `no_ktp_pengguna`, `password`, `id_akses`, `foto_pengguna`) VALUES
(2, 'Farras', 'Sumatra', 'Sumatra', '', '62895321233687', 'farras@gmail.com', 'Pria', '2004-07-25', '12836172853621536721312', '$2y$10$BYpmJIUVGimFYLYpFjgIZOWp6PFb51dWH8Di4b2y2pygVJHa4NQ/u', 2, 'none.png'),
(25, 'Rudi Indro Yuwono', 'desa kalirandu', 'jawa tengah', '0823122312312(Ayah)', '088888888888', 'yuwono@gmail.com', 'Pria', '2024-11-15', '2133133333333333333121', '$2y$10$upyoFeF1r5fyG23d8BY31eFvpPAIVRsm8uFw2dY.aHhD0FvXsgsmC', 1, '676bbe56f187f.png'),
(30, 'Bryan', 'Demak', 'Jawa Tengah', '3424981283 (Ibu)', '6282220078449', 'bryan@gmail.com', 'Pria', '2005-01-13', '234234234', '$2y$10$T1AFhBQqTAMQaj7PFXsmUeh5tgveJHj2bmP5wDbFqAtiVTds9F42.', 2, '676bbf9028693.png'),
(41, 'Nicho', 'Tegal', 'Jawa Tengah', '09787182782 (Ayah)', '6287806858597', 'nicho@gmail.com', 'Pria', '2005-06-25', '12121212121', '$2y$10$22rxxyKMgwoGfz1nT6gKIek06DCTEV8O1hj8F5.cjf996b7.p3SMK', 2, '676bbf71d74bd.png'),
(42, 'Rafif', 'Pemalang', 'Jawa Tengah', '62821482648124', '6287730420028', 'rafif@gmail.com', 'Pria', '2004-06-25', '3254235234234234', '$2y$10$rk0WD3hu6Fpn3QBrnphphOYacy5pODflh3trnItBmjAcXc41ecYpG', 2, 'none.png'),
(43, 'Bintang', 'Demak', 'Jawa Tengah', '62821482648124', '6289659256947', 'bintang@gmail.com', 'Pria', '2006-11-16', '2131231231312545456', '$2y$10$XrkhWh06AYzkzboNkzpv1eGj0XzCbWa70U3o6L1PT/P7c1dfA4IXq', 2, 'none.png'),
(44, 'Yayan Rif\'an Awaludin', 'Pemalang', 'Jawa Tengah', '6283123951548', '6283123951548', 'yayan@gmail.com', 'Pria', '2005-01-06', '234532124325235435', '$2y$10$QTjpjontq794x1EAGdMt6.0i0SRPzSNEcGMYw.Rg.niapQ3Iw7s6S', 2, 'none.png'),
(45, 'Rizky Abdul', 'Kendal', 'Jawa Tengah', '6289530822040', '6289530822040', 'rizky@gmail.com', 'Pria', '2005-06-25', '23432453543325324534', '$2y$10$LZME3VvVFZgTxwW.ORzEiedgZiA4t7ukaZ/bHJl9Cv0uZGpJ75Agu', 2, 'none.png'),
(46, 'Kelvin Arip Pratama', 'Jambi', 'Sumatra', '6282214149104', '6282214149104', 'kelvin@gmail.com', 'Pria', '2004-07-27', '32423423423423', '$2y$10$z0MYlTVZD6JbxgVSxaP63eExNI3uAEwc06tZF6sGjyt5rCI2sTrrK', 2, '676bbf9028693.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `info_kost`
--
ALTER TABLE `info_kost`
  ADD PRIMARY KEY (`id_kost`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `jenis_pengeluaran`
--
ALTER TABLE `jenis_pengeluaran`
  ADD PRIMARY KEY (`id_jenis_pengeluaran`);

--
-- Indexes for table `jenis_status_pembayaran`
--
ALTER TABLE `jenis_status_pembayaran`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `menghuni`
--
ALTER TABLE `menghuni`
  ADD PRIMARY KEY (`id_menghuni`),
  ADD KEY `id_kamar` (`id_kamar`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_menghuni` (`id_menghuni`),
  ADD KEY `id_status` (`id_status`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`),
  ADD KEY `id_jenis_pengeluaran` (`id_jenis_pengeluaran`,`id_pengguna`),
  ADD KEY `pengeluaran_ibfk_2` (`id_pengguna`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `id_akses` (`id_akses`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id_akses` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `info_kost`
--
ALTER TABLE `info_kost`
  MODIFY `id_kost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jenis_pengeluaran`
--
ALTER TABLE `jenis_pengeluaran`
  MODIFY `id_jenis_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenis_status_pembayaran`
--
ALTER TABLE `jenis_status_pembayaran`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `menghuni`
--
ALTER TABLE `menghuni`
  MODIFY `id_menghuni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `info_kost`
--
ALTER TABLE `info_kost`
  ADD CONSTRAINT `info_kost_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menghuni`
--
ALTER TABLE `menghuni`
  ADD CONSTRAINT `menghuni_ibfk_1` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menghuni_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_menghuni`) REFERENCES `menghuni` (`id_menghuni`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `jenis_status_pembayaran` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD CONSTRAINT `pengeluaran_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengeluaran_ibfk_2` FOREIGN KEY (`id_jenis_pengeluaran`) REFERENCES `jenis_pengeluaran` (`id_jenis_pengeluaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`id_akses`) REFERENCES `hak_akses` (`id_akses`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
