-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Okt 2023 pada 14.07
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
-- Database: `restoran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `name`, `price`, `description`, `image_path`) VALUES
(2, 'mie', 12000.00, 'indomie rebus dan goreng', 'Menu/indomie.jpg'),
(3, 'nasi', 5000.00, 'nasi putih dengan bawang goreng', 'Menu/nasi.jpg'),
(4, 'Egg Stake', 25000.00, 'daging steak yang lembut berpadu dengan telur setengah matang ', 'Menu/Egg Stake.jpg'),
(5, 'Pancake', 20000.00, 'pancake tiga Tumpuk dengan es krim diatanya', 'Menu/pancake.jpg'),
(6, 'Matsutake Meal Roll', 30000.00, 'Jamur Matsutake Premium Membalut Irisan Daging Sapi dengan Saus Special', 'Menu/Matsutake Meat Roll.JPG'),
(7, 'Stir Fried', 28000.00, 'Sayuran dan Daging Sapi yang ditumis dengan Saus Signature', 'Menu/Stir Fried.JPG'),
(8, 'Dim Sum', 30000.00, 'Dim Sum dengan Chilie Sauce', 'Menu/Dim Sum.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `role` enum('Admin','User') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `birth_date`, `gender`, `role`) VALUES
(1, 'lauren', 'elisabeth', 'renw357', '$2y$10$riVj4/QCYIu2Z9qc0.np0usN5A6jvm46iZseyHNPk4FGJk9p5T182', '2023-10-31', 'Female', 'User'),
(2, 'admin', 'utamawan', 'adminis', '$2y$10$Cgd8G.8fJS2xuSiRlZyYc.GMKZVIUtg/2KZsYsabe0RjJtjjkU2bK', '2023-10-01', 'Male', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
