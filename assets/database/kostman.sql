-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Des 2024 pada 17.05
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

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
-- Struktur dari tabel `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_akses` int(1) NOT NULL,
  `nama_akses` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `hak_akses`
--

INSERT INTO `hak_akses` (`id_akses`, `nama_akses`) VALUES
(1, 'Admin'),
(2, 'Penghuni'),
(3, 'Calon Penghuni'),
(4, 'nonaktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `info_kost`
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
-- Dumping data untuk tabel `info_kost`
--

INSERT INTO `info_kost` (`id_kost`, `id_pengguna`, `jenis_kost`, `nama_kost`, `alamat_kost`, `provinsi_kost`, `kota_kost`, `no_kost`, `email_kost`, `logo_kost`, `foto_kost`, `deskripsi_kost`) VALUES
(1, 25, 'Kost Putri', 'Kost Bapak Rudi', 'Jl. Bima II No.30 Pendrikan Kidul', 'Jawa tengah', 'Semarang', '087877119922', '-@gmail.com', '', '6747ca0b03dd1.png', 'Kost Putra yang nyaman, aman, bersih, dan modern. Memiliki 2 lantai, dan 13 kamar. Fasilitas oke harga bersahabat. Terletak di daerah yang strategis dan dekat dengan kampus Universitas Dian Nuswantoro. Cocok untuk para mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pengeluaran`
--

CREATE TABLE `jenis_pengeluaran` (
  `id_jenis_pengeluaran` int(11) NOT NULL,
  `kode_pengeluaran` varchar(255) NOT NULL,
  `kategori_pengeluaran` enum('Biaya Operasional','Biaya Pemeliharaan','Biaya Makanan','Biaya Marketing','Biaya Lainnya','Pajak') NOT NULL,
  `nama_pengeluaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `jenis_pengeluaran`
--

INSERT INTO `jenis_pengeluaran` (`id_jenis_pengeluaran`, `kode_pengeluaran`, `kategori_pengeluaran`, `nama_pengeluaran`) VALUES
(1, 'P0001', 'Pajak', 'Pajak Bumi dan Bangunan'),
(2, 'P0002', 'Biaya Operasional', 'Listrik (PLN)'),
(3, 'P0003', 'Biaya Operasional', 'Air (PDAM)'),
(4, 'P0005', 'Biaya Pemeliharaan', 'Kebersihan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_status_pembayaran`
--

CREATE TABLE `jenis_status_pembayaran` (
  `id_status` int(11) NOT NULL,
  `nama_status_pembayaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `jenis_status_pembayaran`
--

INSERT INTO `jenis_status_pembayaran` (`id_status`, `nama_status_pembayaran`) VALUES
(1, 'sudah dikonfirmasi'),
(2, 'belum dikonfirmasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `nomor_kamar` int(11) NOT NULL,
  `luas_kamar` varchar(255) NOT NULL,
  `lantai_kamar` enum('1','2','3','4','5','6','7','8') NOT NULL,
  `kapasitas_kamar` int(11) NOT NULL,
  `deskripsi_kamar` varchar(255) NOT NULL,
  `harga_harian` double NOT NULL,
  `harga_mingguan` double NOT NULL,
  `harga_bulanan` double NOT NULL,
  `harga_tahunan` double NOT NULL,
  `denda` double NOT NULL,
  `foto_kamar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `nomor_kamar`, `luas_kamar`, `lantai_kamar`, `kapasitas_kamar`, `deskripsi_kamar`, `harga_harian`, `harga_mingguan`, `harga_bulanan`, `harga_tahunan`, `denda`, `foto_kamar`) VALUES
(4, 2, '4x4', '1', 1, 'Kamar nomor satu', 10000, 70000, 300000, 1200000, 5000, '674ab2e04279e.jpg'),
(5, 3, '4x4', '1', 1, 'Kamar nomor satu', 10000, 65000, 300000, 330000, 5000, '5e166d28510e6.jpg'),
(6, 4, '4x4', '1', 1, 'Kamar Mandi Dalam, Satu tempat tidur, satu lemari, satu meja, 2 kursi', 10000, 65000, 300000, 330000, 5000, '5e166d36598d9.jpg'),
(7, 5, '4x4', '1', 1, 'Kamar nomor satu', 10000, 65000, 300000, 330000, 5000, '674abe700d0f5.jpg'),
(8, 6, '4x4', '1', 1, 'asdasdasdasdsad', 0, 0, 300000, 0, 5000, '5e192d0d9e4d6.jpg'),
(9, 7, '4x4', '1', 1, 'asdadasdadasadds', 0, 0, 400000, 0, 5000, '674ac0252d663.jpg'),
(10, 1, '4X4', '1', 1, 'fasilitas kursi meja lemari yahh', 0, 0, 500000, 0, 500, '674980cc0ad62.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menghuni`
--

CREATE TABLE `menghuni` (
  `id_menghuni` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `menghuni`
--

INSERT INTO `menghuni` (`id_menghuni`, `id_kamar`, `id_pengguna`, `tanggal_masuk`, `tanggal_keluar`) VALUES
(8, 4, 15, '2019-12-21', '0000-00-00'),
(15, 8, 23, '2020-01-12', '0000-00-00'),
(18, 6, 17, '2024-11-24', '0000-00-00'),
(19, 7, 30, '2024-12-05', '0000-00-00'),
(20, 9, 41, '2024-11-26', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
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
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_menghuni`, `tanggal_pembayaran`, `nilai_pembayaran`, `bukti_pembayaran`, `keterangan`, `id_status`) VALUES
(13, 8, '2019-11-13', 400000, '', 'jjsiiqjjqwkewq', 1),
(17, 8, '2020-01-01', 600000, '5e18691e0128e.jpg', 'baru bayar tahun baruan', 1),
(19, 8, '2020-01-04', 500000, '5e1853b0c7fc1.jpg', 'Bayar euy', 1),
(20, 8, '2020-01-10', 400000, '5e1853da38082.jpg', 'bayar Lagi skuy', 1),
(28, 15, '2020-01-12', 330000, '5e1a8fa039c64.jpg', 'Pembayaran Booking kamar no.6 tanggal: 2020-01-12', 1),
(30, 8, '2024-11-16', 900000, '674c8c4f8894f.jpg', 'tidak ada', 1),
(33, 19, '2024-11-24', 300000, '674abed6b00ae.jpg', 'Pembayaran Booking kamar no.5 tanggal: 2024-11-24', 1),
(34, 20, '2024-11-26', 750000, '674ac2d336ba9.jpg', 'hahayhayahaya', 1),
(38, 19, '2024-12-06', 300000, '675312b8df6c4.jpg', 'BAYAR KOST 10 DECEMBER', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
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
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `id_jenis_pengeluaran`, `tanggal_pengeluaran`, `nilai_pengeluaran`, `keterangan`, `bukti_pengeluaran`, `id_pengguna`) VALUES
(6, 2, '2024-11-24', 900000, 'bayar listrik', '674ac3329d0b8.jpg', 25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
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
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `alamat_pengguna`, `provinsi_pengguna`, `kontak_darurat`, `telepon_pengguna`, `email_pengguna`, `kelamin_pengguna`, `tanggal_lahir_pengguna`, `no_ktp_pengguna`, `password`, `id_akses`, `foto_pengguna`) VALUES
(14, 'Mamank Garox', 'Jl Jalan skuy', 'Jawa TImur', 'Jember', '08123456789', 'epriot23@gmail.com', 'Wanita', '2019-12-21', '2991001876178721', '1234', 3, '5e15a93bb371b.jpg'),
(15, 'RIcardo Milos', 'Jl Banjarsengon', 'Jawa Timur', '097812791293812  (Ibu)', '08322144718', 'royhanalghazy@gmail.com', 'Pria', '1999-04-08', '299100188123', 'aku_ganteng', 2, '6747d3c33867e.jpg'),
(17, 'Alip', 'Jl. Diponegoro VII 73', 'Jawa Timur', '08213292132 (kakak)', '085735678159', 'alip@gmail.com', 'Pria', '2020-01-15', '3509191412990213213', '123\r\n', 2, '674857ccb3470.jpeg'),
(19, 'Siti Maemunah', '', '', '', '0856722458819', 'sitimaemun@gmail.com', 'Pria', '0000-00-00', '', '$2y$10$RsLYh4vjOYpjLZFJ1RWm..F793eN9kwbl/XNDJdTIqEFce8USNoQe', 3, ''),
(21, 'asdas', NULL, NULL, NULL, '12321321', 'admin@indiekost.com', NULL, NULL, NULL, '123', 3, NULL),
(22, 'siti', 'Jl Jakarta Raya 88', 'Jawa Timur', 'Jember', '085735678159', 'siti@gmail.com', 'Wanita', '2020-01-10', '12312321312', '$2y$10$uqtbquIB9pedSERlVwcbI.23OuDI8h9t4R6s1.NsiiGS3MXNGqMAq', 3, '5e19cf3d77a31.jpg'),
(23, 'Meisa', 'Jl. Patimura No. 89', 'Jawa Timur', '0872121929234 (Paman)', '12392388213', 'meisa@gmail.com', 'Wanita', '2020-01-12', '3509191412990007', '$2y$10$ZmlZ/KokAtfu2SYTxJRAzOLuxbjVMaeu3495sHZHyCJ.jcXt23G9C', 2, '67485bb0d68e9.jpeg'),
(25, 'Rudi Indro Yuwono', 'desa kalirandu', 'jawa tengah', '0823122312312(Ayah)', '088888888888', 'hahay@gmail.com', 'Pria', '2024-11-15', '2133133333333333333121', '$2y$10$upyoFeF1r5fyG23d8BY31eFvpPAIVRsm8uFw2dY.aHhD0FvXsgsmC', 1, '6747cd61f0d9c.png'),
(26, 'yayan', NULL, NULL, NULL, '241231231', 'yayan@gmail.com', NULL, '0000-00-00', NULL, '123', 3, NULL),
(27, 'wahyu', 'bogor', 'jawa tengah', 'semarangh', '088888888888', 'wahyu@gmail.com', 'Pria', '2024-11-16', '2133133333333333333121', '$2y$10$Ute1oYW3.sCJ8k4ZC/2CuuqA3RDqp5Fs9BRW9s6v6q8.mxkbwqzQ2', 2, '674858693013d.jpg'),
(29, 'udin', 'semarang', 'jawa tengah', 'semarang kota', '089123123321', 'yayanrifan45@gmail.com', 'Pria', '2024-11-13', '009920238238021788', 'yayan123', 3, NULL),
(30, 'wahyu ', '23423', '32423', '3424981283 (Ibu)', '088888888888', 'wahyudwi@gmail.com', 'Pria', '2024-11-14', '234234234', '$2y$10$T1AFhBQqTAMQaj7PFXsmUeh5tgveJHj2bmP5wDbFqAtiVTds9F42.', 2, '67485813ccbad.jpeg'),
(41, 'hadi pu', 'batang kota asik', 'Jawa Tengah', '09787182782 (Ayah)', '0999932323', 'hpu@gmail.com', 'Pria', '2024-11-05', '12121212121', '$2y$10$22rxxyKMgwoGfz1nT6gKIek06DCTEV8O1hj8F5.cjf996b7.p3SMK', 2, '674858508e474.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indeks untuk tabel `info_kost`
--
ALTER TABLE `info_kost`
  ADD PRIMARY KEY (`id_kost`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `jenis_pengeluaran`
--
ALTER TABLE `jenis_pengeluaran`
  ADD PRIMARY KEY (`id_jenis_pengeluaran`);

--
-- Indeks untuk tabel `jenis_status_pembayaran`
--
ALTER TABLE `jenis_status_pembayaran`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indeks untuk tabel `menghuni`
--
ALTER TABLE `menghuni`
  ADD PRIMARY KEY (`id_menghuni`),
  ADD KEY `id_kamar` (`id_kamar`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_menghuni` (`id_menghuni`),
  ADD KEY `id_status` (`id_status`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`),
  ADD KEY `id_jenis_pengeluaran` (`id_jenis_pengeluaran`,`id_pengguna`),
  ADD KEY `pengeluaran_ibfk_2` (`id_pengguna`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `id_akses` (`id_akses`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id_akses` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `info_kost`
--
ALTER TABLE `info_kost`
  MODIFY `id_kost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jenis_pengeluaran`
--
ALTER TABLE `jenis_pengeluaran`
  MODIFY `id_jenis_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jenis_status_pembayaran`
--
ALTER TABLE `jenis_status_pembayaran`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `menghuni`
--
ALTER TABLE `menghuni`
  MODIFY `id_menghuni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `info_kost`
--
ALTER TABLE `info_kost`
  ADD CONSTRAINT `info_kost_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `menghuni`
--
ALTER TABLE `menghuni`
  ADD CONSTRAINT `menghuni_ibfk_1` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menghuni_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_menghuni`) REFERENCES `menghuni` (`id_menghuni`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `jenis_status_pembayaran` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD CONSTRAINT `pengeluaran_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengeluaran_ibfk_2` FOREIGN KEY (`id_jenis_pengeluaran`) REFERENCES `jenis_pengeluaran` (`id_jenis_pengeluaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`id_akses`) REFERENCES `hak_akses` (`id_akses`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
