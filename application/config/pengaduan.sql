-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Mar 2025 pada 08.58
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `nama_jurusan` varchar(150) NOT NULL,
  `code_jurusan` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama_jurusan`, `code_jurusan`) VALUES
(11, ' animator', '11'),
(12, 'gasshaghs', '10'),
(15, 'ayam sangkuriang', '12323'),
(16, 'fauzan', '121221'),
(18, 'RPL', '12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `Foto` varchar(500) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal_diajukan` date NOT NULL,
  `total_pengguna` float NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `judul`, `Foto`, `deskripsi`, `tanggal_diajukan`, `total_pengguna`, `user_id`) VALUES
(35, 'buku hilang', '1740755940_coffe-removebg-preview.png', 'hhhhh', '2025-02-14', 1, 29),
(36, 'pensil ku hilang', '1740756391_21.jpg', 'bekas di patahkan', '2025-02-14', 1, 30),
(37, 'asdadad', '1740808080_a6a28597-0e9b-4bef-98d4-66633875f678.jpeg', 'galo', '2025-03-19', 1, 29);

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_pengaduan`
--

CREATE TABLE `riwayat_pengaduan` (
  `id` int(11) NOT NULL,
  `pengaduan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('diajukan','diproses','ditolak','diselesaikan') NOT NULL,
  `catatan` text DEFAULT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `riwayat_pengaduan`
--

INSERT INTO `riwayat_pengaduan` (`id`, `pengaduan_id`, `user_id`, `status`, `catatan`, `tanggal`) VALUES
(7, 35, 30, 'diselesaikan', 'kurang dana kurang modal\r\n\r\n', '2025-02-28 16:23:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan_id` int(11) NOT NULL,
  `role` enum('kakomli','wakil_kepsek','wali_kelas','kurikulum','admin','pelapor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `email`, `jurusan_id`, `role`) VALUES
(29, 'adittt', '12345', 'aasaa', 'fauzaner867@gmail.com', 11, 'admin'),
(30, 'Fauzan', '12345', 'gagag', 'fauzaner867@gmail.com', 11, 'admin'),
(31, 'pasha love salma', '12345', 'pasha love salma', 'fauzaner867@gmail.com', 18, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `riwayat_pengaduan`
--
ALTER TABLE `riwayat_pengaduan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengaduan_id` (`pengaduan_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jurusan_id` (`jurusan_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `riwayat_pengaduan`
--
ALTER TABLE `riwayat_pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `riwayat_pengaduan`
--
ALTER TABLE `riwayat_pengaduan`
  ADD CONSTRAINT `riwayat_pengaduan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `riwayat_pengaduan_ibfk_2` FOREIGN KEY (`pengaduan_id`) REFERENCES `pengaduan` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
