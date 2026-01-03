-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 09 Des 2025 pada 02.30
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `images`
--

CREATE TABLE `images` (
  `id` int NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `aktif` enum('1','0') DEFAULT '1',
  `hapus` enum('1','0') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `images`
--

INSERT INTO `images` (`id`, `nama_file`, `keterangan`, `timestamp`, `aktif`, `hapus`) VALUES
(1, 'ariel-noah.png', 'Ariel NOAH', '2025-10-28 20:56:19', '1', '0'),
(2, 'donnie-sibarani.jpg', 'Donnie Sibarani', '2025-10-29 01:45:35', '1', '0'),
(3, 'marie.jpg', 'Marie Tampubolon', '2025-10-29 02:10:08', '1', '0'),
(4, 'liam-gallagher.jpg', 'KMIPN', '2025-10-29 07:24:04', '1', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_pegadaian`
--

CREATE TABLE `pengajuan_pegadaian` (
  `id` int NOT NULL,
  `tanggal` date NOT NULL,
  `jenis` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `informasi` text NOT NULL,
  `nilai` bigint NOT NULL,
  `dokumen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `keterangan` text NOT NULL,
  `status` enum('review','disetujui','ditolak') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'review',
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `pengajuan_pegadaian`
--

INSERT INTO `pengajuan_pegadaian` (`id`, `tanggal`, `jenis`, `informasi`, `nilai`, `dokumen`, `keterangan`, `status`, `user_id`) VALUES
(1, '2025-11-21', 'Kendaraan', 'Mobil Pajero', 500000000, 'SAMPLE_PENGAJUAN.pdf', 'Mobil Pajero 2017', 'disetujui', 3),
(2, '2025-11-21', 'Kendaraan', 'Mobil Range Rover', 800000000, 'SAMPLE_PENGAJUAN.pdf', 'Mobil Range Rover 2020', 'disetujui', 3),
(3, '2025-11-21', 'Kendaraan', 'Motor Aerox', 25000000, 'SAMPLE_PENGAJUAN.pdf', 'Motor Aerox 2020', 'ditolak', 3),
(4, '2025-11-21', 'Alat Musik', 'Gitar Yamaha FX310', 1500000, 'SAMPLE_PENGAJUAN.pdf', 'Gitar Yamaha FX310 2024', 'review', 4),
(5, '2025-11-21', 'Smartphone', 'Smartphone Samsung', 2000000, 'SAMPLE_PENGAJUAN.pdf', 'Smartphone Samsung Galaxy A13', 'disetujui', 4),
(6, '2025-11-21', 'Elektronik', 'Microwave LG', 1500000, 'SAMPLE_PENGAJUAN.pdf', 'Microwave LG (Baru)', 'ditolak', 4),
(7, '2025-11-24', 'Perhiasan', 'Cincin Emas', 4500000, 'SAMPLE_PENGAJUAN.pdf', 'Cincin Emas 24 Karat', 'review', 3),
(8, '2025-11-24', 'Laptop', 'Laptop ASUS TUF Gaming', 10000000, 'SAMPLE_PENGAJUAN.pdf', 'Laptop ASUS TUF Gaming', 'disetujui', 3),
(9, '2025-11-24', 'Smartphone', 'HP Poco X7', 5000000, 'SAMPLE_PENGAJUAN.pdf', 'HP Poco X7, RAM 12 GB, Storage 512 GB', 'ditolak', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_peminjaman`
--

CREATE TABLE `pengajuan_peminjaman` (
  `id` int NOT NULL,
  `tanggal` date NOT NULL,
  `besar_pinjaman` int NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `jaminan` varchar(255) NOT NULL,
  `bukti_jaminan` varchar(255) NOT NULL,
  `lama_peminjaman` int NOT NULL,
  `keterangan` text NOT NULL,
  `status` enum('review','disetujui','ditolak') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'review',
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `pengajuan_peminjaman`
--

INSERT INTO `pengajuan_peminjaman` (`id`, `tanggal`, `besar_pinjaman`, `keperluan`, `jaminan`, `bukti_jaminan`, `lama_peminjaman`, `keterangan`, `status`, `user_id`) VALUES
(1, '2025-11-21', 5000000, 'Modal Usaha', 'Motor Vario', 'SAMPLE_PENGAJUAN.pdf', 30, 'Modal Usaha Kuliner', 'review', 3),
(2, '2025-11-21', 500000, 'Kebutuhan Bulanan', 'Kulkas Mini', 'SAMPLE_PENGAJUAN.pdf', 14, 'Kebutuhan Belanja Bulanan', 'disetujui', 3),
(3, '2025-11-21', 1000000, 'Biaya Sekolah Anak', 'TV Samsung', 'SAMPLE_PENGAJUAN.pdf', 14, 'Membayar SPP Sekolah', 'ditolak', 3),
(4, '2025-11-21', 300000, 'Belanja Dapur', 'Rice Cooker', 'SAMPLE_PENGAJUAN.pdf', 3, 'Belanja Kebutuhan Dapur', 'review', 4),
(5, '2025-11-21', 1000000, 'Biaya Kuliah', 'Mesin Cuci', 'SAMPLE_PENGAJUAN.pdf', 30, 'Membayar UKT Kuliah', 'disetujui', 4),
(6, '2025-11-21', 500000, 'Perbaikan Motor', 'Blender', 'SAMPLE_PENGAJUAN.pdf', 7, 'Service Motor Rusak', 'ditolak', 4),
(7, '2025-11-24', 1500000, 'Perbaikan Rumah', 'Kulkas', 'SAMPLE_PENGAJUAN.pdf', 30, 'Perbaikan Rumah', 'review', 3),
(8, '2025-11-24', 1250000, 'Kebutuhan Anak', 'Freezer', 'SAMPLE_PENGAJUAN.pdf', 20, 'Membeli Susu Anak', 'disetujui', 3),
(9, '2025-11-24', 20000000, 'Perbaikan Rumah', 'Motor Aerox', 'SAMPLE_PENGAJUAN.pdf', 90, 'Beli Bahan Bangunan', 'ditolak', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_penitipan`
--

CREATE TABLE `pengajuan_penitipan` (
  `id` int NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_barang` varchar(255) NOT NULL,
  `modal_barang` int NOT NULL,
  `jumlah` int NOT NULL,
  `lama_penitipan` int NOT NULL,
  `status` enum('review','disetujui','ditolak') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'review',
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `pengajuan_penitipan`
--

INSERT INTO `pengajuan_penitipan` (`id`, `tanggal`, `jenis_barang`, `modal_barang`, `jumlah`, `lama_penitipan`, `status`, `user_id`) VALUES
(1, '2025-11-21', 'Makanan', 300000, 10, 7, 'review', 3),
(2, '2025-11-21', 'Minuman', 250000, 15, 5, 'disetujui', 3),
(3, '2025-11-21', 'Pakaian', 800000, 4, 30, 'ditolak', 3),
(4, '2025-11-21', 'Makanan', 275000, 5, 5, 'review', 4),
(5, '2025-11-21', 'Alat Tulis Kantor', 150000, 25, 60, 'disetujui', 4),
(6, '2025-11-21', 'Sembako', 500000, 25, 30, 'ditolak', 4),
(7, '2025-11-24', 'Alat Tulis Kantor', 500000, 100, 90, 'review', 3),
(8, '2025-11-24', 'Makanan', 375000, 20, 7, 'disetujui', 3),
(9, '2025-11-24', 'Pakaian', 285000, 3, 120, 'ditolak', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `avatar` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `keterangan` text NOT NULL,
  `auth` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `aktif` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '1',
  `hapus` enum('1','0') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `avatar`, `nama`, `username`, `password`, `timestamp`, `keterangan`, `auth`, `aktif`, `hapus`) VALUES
(1, 'ariel-noah.png', 'Ariel NOAH', 'ariel', 'ariel', '2025-10-28 03:05:01', 'Administrator', 'administrator', '1', '0'),
(2, 'sammy-simorangkir.png', 'Sammy Simorangkir', 'sammy', 'sammy', '2025-10-28 03:09:09', 'Pegawai', 'pegawai', '1', '0'),
(3, 'donnie-sibarani.jpg', 'Donnie Sibarani', 'donnie', 'donnie', '2025-10-28 03:09:54', 'Anggota', 'anggota', '1', '0'),
(4, 'liam-gallagher.jpg', 'Liam Gallagher', 'liam', 'liam', '2025-10-28 03:18:00', 'Anggota', 'anggota', '1', '0'),
(5, 'raven-sigma.jpg', 'Raven', 'raven', 'raven', '2025-10-28 23:52:05', 'Pegawai', 'tamu', '1', '0'),
(6, 'StockCake-burger_-_984_Images_1765159521.jpg', 'Burger Cheese', 'burger', 'burger', '2025-12-09 02:11:52', 'burger', 'pegawai', '1', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `videos`
--

CREATE TABLE `videos` (
  `id` int NOT NULL,
  `kode_video` varchar(50) NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `aktif` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '1',
  `hapus` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `videos`
--

INSERT INTO `videos` (`id`, `kode_video`, `keterangan`, `timestamp`, `aktif`, `hapus`) VALUES
(1, 'w09ukdgQKho', 'Peterpan - Kisah Cintaku', '2025-10-28 08:18:50', '1', '0'),
(2, 'A_OJzo1LUMI', 'NOAH - Menunggumu', '2025-10-28 08:23:03', '1', '0'),
(3, 'wYKsfZRD8Ac', 'NOAH - Kau Udara Bagiku', '2025-10-28 08:36:33', '1', '0');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengajuan_pegadaian`
--
ALTER TABLE `pengajuan_pegadaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pengajuan_pegadaian_users` (`user_id`);

--
-- Indeks untuk tabel `pengajuan_peminjaman`
--
ALTER TABLE `pengajuan_peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pengajuan_peminjaman_users` (`user_id`);

--
-- Indeks untuk tabel `pengajuan_penitipan`
--
ALTER TABLE `pengajuan_penitipan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pengajuan_penitipan_users` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `images`
--
ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_pegadaian`
--
ALTER TABLE `pengajuan_pegadaian`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_peminjaman`
--
ALTER TABLE `pengajuan_peminjaman`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_penitipan`
--
ALTER TABLE `pengajuan_penitipan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pengajuan_pegadaian`
--
ALTER TABLE `pengajuan_pegadaian`
  ADD CONSTRAINT `fk_pengajuan_pegadaian_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `pengajuan_peminjaman`
--
ALTER TABLE `pengajuan_peminjaman`
  ADD CONSTRAINT `fk_pengajuan_peminjaman_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `pengajuan_penitipan`
--
ALTER TABLE `pengajuan_penitipan`
  ADD CONSTRAINT `fk_pengajuan_penitipan_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
