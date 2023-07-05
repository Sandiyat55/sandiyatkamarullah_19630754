-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jul 2023 pada 06.23
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
  `tanggal` date NOT NULL,
  `status` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cek`
--

INSERT INTO `cek` (`id_transaksi`, `id_mobil`, `tanggal`, `status`) VALUES
(1, 1, '2023-06-28', 'menunggu verified'),
(1, 1, '2023-06-29', 'menunggu verified'),
(2, 1, '2023-06-30', 'menunggu verified');

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
  `harga` varchar(64) NOT NULL,
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
(1, 'DA 3421 KAI', 'agya', 'Daihatsu', 2020, '450000', '4', 'Aktif', '264-mobil (2).png', 'Pertalite', 'Matic', 'Merah');

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
(1, 'mobil', 1, 0, 2, 'tidak', 450000, 2, 900000, 'Di setujui', '278-mobil (4).png', '946-mobil (4).png', '2023-06-28', '2023-06-25', 'Baik', 'ghaa'),
(2, 'mobil', 1, 0, 2, 'tidak', 450000, 1, 450000, 'selesai', '797-mobil (2).png', '396-mobil (2).png', '2023-06-30', '2023-06-25', 'Tidak Baik', 'lecet sebelah kiri'),
(3, 'wisata', 0, 1, 2, '', 2500000, 1, 2500000, 'selesai', '797-mobil (2).png', '', '0000-00-00', '2023-06-25', '', '');

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
(2, 'muhammad', 'muhammadrizqy68269@gmail.com', '202cb962ac59075b964b07152d234b70', 'cust.jpg', '082146367827', '082792739373', 'Jl Pemurus Dalam 8', '2000-06-20', 'Laki-Laki', 'cust');

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
  `berapa_hari` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wisata`
--

INSERT INTO `wisata` (`id_wisata`, `nama`, `tanggal`, `harga`, `gambar`, `deskripsi`, `status`, `kuota`, `berapa_hari`) VALUES
(1, 'Paket Garuda', '2023-08-09', '2500000', 'wisata5.jpg', 'Paket 5 hari 4 malam\r\n- siring kotabaru\r\n- pulau birah-birahan\r\n- goa temulangan\r\n- samber gelap\r\n- pantai teluk tamiang \r\n- tanjung dewa kotabaru', 'Aktif', '12', '5'),
(2, 'Paket Merah', '2023-08-17', '1000000', 'wisata 3.jpg', 'Paket 3 hari 2 malam\r\n- siring kotabaru\r\n- pulau birah-birahan\r\n- pantai teluk tamiang \r\n- tanjung dewa kotabaru', 'Aktif', '12', '3');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT untuk tabel `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
