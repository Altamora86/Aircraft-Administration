-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Des 2023 pada 04.00
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pesawat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `email`, `password`, `nama_lengkap`) VALUES
(5, 'al123@gmail.com', '$2y$10$z2GNA9.0GMvYEzaa7Q208e4pNi/SGhZdxkhhFCPW6e6BDfrVunpuK', 'al123456'),
(6, 'pwd123@gmail.com', '$2y$10$pe28E8vb6N86FK03lPipXeufNP1kzVsfksuwyFWFmLosakBnscg.2', 'pwd12345'),
(7, 'tes123@gmail.com', '$2y$10$Jk8ho7i9iZKSNG49U9/Qu.iPCp1TqN5.GlcaThuj.I4vD3UXXB9PS', 'tes12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `jumlah_penumpang` int(11) NOT NULL,
  `kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `nama`, `alamat`, `no_telp`, `tgl_pesan`, `tgl_berangkat`, `tujuan`, `jumlah_penumpang`, `kelas`) VALUES
(4, 'putra', 'Purworejo', '082131412131', '2023-12-25', '2023-12-27', 'Surabaya', 1, 'Ekonomi'),
(5, 'Purnomo', 'Sragen', '08787878787878', '2023-12-25', '2023-12-27', 'Surabaya', 1, 'Ekonomi'),
(9, 'Tiara', 'Madiun', '085757575757', '2023-12-20', '2023-12-26', 'Jakarta', 1, 'Bisnis'),
(10, 'Anton', 'jogja', '0898989898989', '2023-12-25', '2023-12-27', 'Surabaya', 2, 'First Class'),
(13, 'Andi', 'Solo', '0821212121212121', '2023-12-26', '2023-12-27', 'Jakarta', 3, 'Bisnis'),
(14, 'Putri', 'Aceh', '083131313131313131', '2023-12-26', '2023-12-26', 'Jakarta', 4, 'Ekonomi'),
(15, 'Sinta', 'Bandung', '084141414141414141', '2023-12-26', '2023-12-26', 'Jakarta', 2, 'First Class'),
(16, 'Dina', 'Makasar', '082121215454545', '2023-12-26', '2023-12-30', 'Surabaya', 5, 'Ekonomi'),
(17, 'Putra', 'Ambon', '08978713111222111', '2023-12-26', '2023-12-30', 'Jakarta', 1, 'First Class');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
