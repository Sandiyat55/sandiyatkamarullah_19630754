-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Agu 2023 pada 17.22
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtour`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cek`
--

CREATE TABLE `cek` (
  `id_transaksi` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `qty` varchar(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cek`
--

INSERT INTO `cek` (`id_transaksi`, `id_mobil`, `id_wisata`, `qty`, `tanggal`, `status`) VALUES
(6, 0, 3, '5', '2023-07-31', 'batal'),
(7, 0, 4, '1', '2023-08-31', 'menunggu persetujuan'),
(8, 3, 0, '', '2023-08-24', 'menunggu verified'),
(9, 6, 0, '', '2023-08-09', 'menunggu verified'),
(9, 6, 0, '', '2023-08-10', 'menunggu verified'),
(9, 6, 0, '', '2023-08-11', 'menunggu verified'),
(10, 5, 0, '', '2023-08-07', 'menunggu verified'),
(10, 5, 0, '', '2023-08-08', 'menunggu verified'),
(10, 5, 0, '', '2023-08-09', 'menunggu verified'),
(11, 6, 0, '', '2023-08-25', 'menunggu verified'),
(11, 6, 0, '', '2023-08-26', 'menunggu verified'),
(12, 0, 6, '2', '2023-08-31', 'menunggu persetujuan'),
(13, 0, 5, '3', '2023-08-31', 'menunggu persetujuan'),
(14, 0, 3, '2', '2023-08-31', 'menunggu persetujuan'),
(15, 0, 4, '4', '2023-08-31', 'menunggu persetujuan'),
(16, 4, 0, '', '2023-08-10', 'menunggu verified'),
(17, 4, 0, '', '2023-08-11', 'menunggu verified');

--
-- Trigger `cek`
--
DELIMITER $$
CREATE TRIGGER `batal_transaksi` AFTER UPDATE ON `cek` FOR EACH ROW BEGIN
UPDATE wisata SET kuota = kuota + NEW.qty WHERE id_wisata = NEW.id_wisata;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `gambar` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `id_wisata`, `gambar`) VALUES
(1, 1, 'siring.jpg'),
(2, 1, 'birahan.jpg'),
(3, 1, 'goatemu.jpg'),
(4, 1, 'sambergelap.jpg'),
(5, 1, 'teluk.jpg'),
(6, 1, 'tanjung.jpg'),
(7, 2, 'siring.jpg'),
(8, 2, 'goatemu.jpg'),
(9, 2, 'teluk.jpg'),
(10, 2, 'tanjung.jpg'),
(11, 3, 'siring.jpg'),
(12, 3, 'teluk.jpg'),
(13, 3, 'tanjung.jpg'),
(14, 4, 'siring.jpg'),
(15, 4, 'birahan.jpg'),
(16, 4, 'goatemu.jpg'),
(17, 4, 'sambergelap.jpg'),
(18, 4, 'teluk.jpg'),
(19, 4, 'tanjung.jpg'),
(20, 5, 'siring.jpg'),
(21, 5, 'goatemu.jpg'),
(22, 5, 'teluk.jpg'),
(23, 5, 'tanjung.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `nomor_kendaraan` varchar(64) NOT NULL,
  `nama_mobil` varchar(64) NOT NULL,
  `merek` varchar(64) NOT NULL,
  `tahun` year(4) NOT NULL,
  `harga` double NOT NULL,
  `seat` varchar(32) NOT NULL,
  `status` varchar(26) NOT NULL,
  `gambar` varchar(120) NOT NULL,
  `bensin` varchar(32) NOT NULL,
  `transmision` varchar(32) NOT NULL,
  `warna` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `nomor_kendaraan`, `nama_mobil`, `merek`, `tahun`, `harga`, `seat`, `status`, `gambar`, `bensin`, `transmision`, `warna`) VALUES
(1, 'DA 3421 KAI', 'agya', 'Daihatsu', 2020, 450000, '4', 'ready', 'agya.png', 'Pertalite', 'Matic', 'Merah'),
(2, 'DA 2021 KAI', 'All New Xenia', 'Daihatsu', 2023, 450000, '6', 'maintenance', 'xenia.png', 'pertamax', 'Matic', 'coklat'),
(3, 'DA 9021 KAI', 'All New Avanza', 'Daihatsu', 2022, 450000, '6', 'ready', 'avanza.png', 'pertamax', 'Manual', 'hijau'),
(4, 'DA 3490 KAI', 'Jazz', 'Honda', 2020, 35000, '4', 'ready', 'jazz.png', 'Pertalite', 'Matic', 'orange'),
(5, 'DA 3200 KAI', 'Hiace', 'toyota', 2021, 1200000, '12', 'ready', 'hiace.png', 'pertamax', 'Matic', 'Putih'),
(6, 'DA 1110 KAI', 'Fortuner', 'toyota', 2023, 800000, '6', 'ready', 'fortuner.png', 'pertamax', 'Matic', 'Putih');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `jenis_transaksi` varchar(12) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `supir` varchar(16) NOT NULL,
  `harga` double NOT NULL,
  `qty` double NOT NULL,
  `total_harga` double NOT NULL,
  `status` varchar(32) NOT NULL,
  `gambar` varchar(32) NOT NULL,
  `gambar_pengembalian` varchar(32) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_booking` date NOT NULL,
  `kondisi` varchar(18) NOT NULL,
  `ket` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `jenis_transaksi`, `id_mobil`, `id_wisata`, `id_user`, `supir`, `harga`, `qty`, `total_harga`, `status`, `gambar`, `gambar_pengembalian`, `tanggal`, `tanggal_booking`, `kondisi`, `ket`) VALUES
(1, 'mobil', 1, 0, 2, 'tidak', 450000, 2, 900000, 'batal', 'bukti1.jpg', '46-agya.png', '2023-06-28', '2023-06-25', 'Baik', '-'),
(2, 'mobil', 3, 0, 3, 'tidak', 450000, 1, 450000, 'selesai', 'bukti2.jpg', '46-agya.png', '2023-06-30', '2023-06-25', 'Baik', '-'),
(3, 'wisata', 0, 1, 2, '', 2500000, 1, 2500000, 'selesai', 'bukti3.jpg', '', '2023-08-09', '2023-06-25', '', ''),
(4, 'wisata', 0, 4, 2, '', 2500000, 3, 7500000, 'disetujui', 'bukti4.jpg', '', '2023-08-31', '2023-07-06', '', ''),
(5, 'wisata', 0, 2, 2, '', 800000, 5, 4000000, 'selesai', 'bukti5.jpg', '', '2023-08-31', '2023-07-07', '', ''),
(6, 'wisata', 0, 3, 2, '', 500000, 5, 2500000, 'batal', 'bukti6.jpg', '', '2023-09-05', '2023-07-07', '', ''),
(7, 'wisata', 0, 4, 2, '', 2500000, 1, 2500000, 'menunggu persetujuan', '', '', '2023-08-31', '2023-07-24', '', ''),
(8, 'mobil', 3, 0, 2, 'iya', 450000, 1, 450000, 'disetujui', 'bukti6.jpg', '46-agya.png', '2023-08-24', '2023-08-05', 'Baik', '-'),
(9, 'mobil', 6, 0, 2, 'iya', 800000, 3, 2400000, 'menunggu persetujuan', '', '', '2023-08-09', '2023-08-06', '', ''),
(10, 'mobil', 5, 0, 2, 'iya', 1200000, 3, 3840000, 'menunggu persetujuan', '', '', '2023-08-07', '2023-08-06', '', ''),
(11, 'mobil', 6, 0, 2, 'iya', 800000, 2, 1760000, 'menunggu persetujuan', '', '', '2023-08-25', '2023-08-06', '', ''),
(12, 'wisata', 0, 5, 2, '', 800000, 2, 1600000, 'menunggu persetujuan', '', '', '2023-08-31', '2023-08-06', '', ''),
(13, 'wisata', 0, 5, 2, '', 800000, 3, 2400000, 'menunggu persetujuan', '', '', '2023-08-31', '2023-08-06', '', ''),
(14, 'wisata', 0, 3, 2, '', 500000, 2, 1000000, 'menunggu persetujuan', '', '', '2023-08-31', '2023-08-06', '', ''),
(15, 'wisata', 0, 4, 2, '', 2500000, 4, 10000000, 'menunggu persetujuan', '', '', '2023-08-31', '2023-08-06', '', ''),
(16, 'mobil', 4, 0, 1, 'iya', 35000, 1, 115000, 'menunggu persetujuan', '', '', '2023-08-10', '2023-08-07', '', ''),
(17, 'mobil', 4, 0, 2, 'iya', 35000, 1, 115000, 'menunggu persetujuan', '', '', '2023-08-11', '2023-08-07', '', '');

--
-- Trigger `transaksi`
--
DELIMITER $$
CREATE TRIGGER `Update` AFTER INSERT ON `transaksi` FOR EACH ROW UPDATE wisata SET wisata.kuota = wisata.kuota - NEW.qty WHERE wisata.id_wisata = NEW.id_wisata
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `email` varchar(92) NOT NULL,
  `password` varchar(120) NOT NULL,
  `gambar` varchar(64) NOT NULL,
  `no_hp` varchar(26) NOT NULL,
  `no_ktp` varchar(26) NOT NULL,
  `alamat` varchar(64) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `role` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `password`, `gambar`, `no_hp`, `no_ktp`, `alamat`, `tanggal_lahir`, `jenis_kelamin`, `role`) VALUES
(1, 'Admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin.jpg', '082153579421', '6300827928392', 'Jl Pemurus Dalam', '1999-11-10', 'laki-laki', 'admin'),
(2, 'Sandi', 'sandi@gmail.com', '202cb962ac59075b964b07152d234b70', 'cust.jpg', '085749740062', '63008279283921', 'Jl. Pemurus dalam, komplek amanah 1 RT.08.A RW.03 No.12', '2000-06-20', 'Laki-Laki', 'cust'),
(3, 'Muhammad', 'Muhammad@gmail.com', '202cb962ac59075b964b07152d234b70', 'cust.jpg', '085749740021', '63008279902190', 'Jl. Perintis, komplek amanah 1 RT.08.A RW.03 No.12', '2000-06-12', 'Laki-Laki', 'cust'),
(4, 'Yusuf', 'yusuf@gmail.com', '202cb962ac59075b964b07152d234b70', 'cust.jpg', '082153579422', '63008279902191', 'Jl Provinsi Km 21', '2000-11-20', 'laki-laki', 'cust'),
(5, 'Rafi', 'Rafi@gmail.com', '202cb962ac59075b964b07152d234b70', 'cust1.jpg', '082153579400', '63008279902100', 'Jl Provinsi Km 26', '2000-11-29', 'laki-laki', 'cust');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata`
--

CREATE TABLE `wisata` (
  `id_wisata` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `tanggal` date NOT NULL,
  `harga` varchar(64) NOT NULL,
  `gambar` varchar(120) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `status` varchar(48) NOT NULL,
  `kuota` varchar(32) NOT NULL,
  `berapa_hari` varchar(12) NOT NULL,
  `rating` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wisata`
--

INSERT INTO `wisata` (`id_wisata`, `nama`, `tanggal`, `harga`, `gambar`, `deskripsi`, `status`, `kuota`, `berapa_hari`, `rating`) VALUES
(1, 'Paket Garuda', '2023-08-31', '2500000', 'wisata5.jpg', 'Paket 5 hari 4 malam\r\n- siring kotabaru\r\n- pulau birah-birahan\r\n- goa temulangan\r\n- samber gelap\r\n- pantai teluk tamiang \r\n- tanjung dewa kotabaru', 'Aktif', '9', '5', '3'),
(2, 'Paket Merah', '2023-08-31', '800000', 'wisata3.jpg', 'Paket 3 hari 2 malam\r\n- siring kotabaru\r\n- goa temulangan\r\n- pantai teluk tamiang \r\n- tanjung dewa kotabaru', 'Aktif', '10', '3', '2'),
(3, 'Paket Putih', '2023-08-31', '500000', 'wisata2.jpg', 'Paket 2 hari 1 malam\r\n- siring kotabaru\r\n- pantai teluk tamiang \r\n- tanjung dewa kotabaru', 'Aktif', '16', '2', '8'),
(4, 'Paket Garuda II', '2023-09-30', '2500000', 'wisata5.jpg', 'Paket 5 hari 4 malam\r\n- siring kotabaru\r\n- pulau birah-birahan\r\n- goa temulangan\r\n- samber gelap\r\n- pantai teluk tamiang \r\n- tanjung dewa kotabaru', 'Aktif', '4', '5', '8'),
(5, 'Paket Merah II', '2023-09-10', '800000', 'wisata3.jpg', 'Paket 3 hari 2 malam\r\n- siring kotabaru\r\n- goa temulangan\r\n- pantai teluk tamiang \r\n- tanjung dewa kotabaru', 'Aktif', '6', '3', '8');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
