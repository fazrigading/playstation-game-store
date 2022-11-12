-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Nov 2022 pada 12.27
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `playstation-game-store`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `id_product`, `quantity`) VALUES
(11, 11, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `date` varchar(128) NOT NULL,
  `total_price` int(11) NOT NULL,
  `status` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`id`, `id_user`, `product_name`, `date`, `total_price`, `status`) VALUES
(7, 11, 'Sony Playstation 5 Digital Edition Resmi', '11/12/2022-11:28:28', 10618600, 'success'),
(8, 11, '123', '11/12/2022-11:37:18', 123, 'success'),
(9, 11, 'Sony Playstation 5 Digital Edition Resmi123', '11/12/2022-11:41:10', 0, 'success'),
(10, 11, 'Sony Playstation 5 Digital Edition Resmi,123,', '11/12/2022-11:50:57', 0, 'success'),
(11, 11, 'Sony Playstation 5 Digital Edition Resmi,123,', '11/12/2022-12:11:59', 0, 'success'),
(12, 11, 'Sony Playstation 5 Digital Edition Resmi,123,', '11/12/2022-12:14:17', 10618723, 'success'),
(13, 11, 'Sony Playstation 5 Digital Edition Resmi,123,', '11/12/2022-12:18:06', 10618723, 'success'),
(14, 11, 'Sony Playstation 5 Digital Edition Resmi,123,', '11/12/2022-12:19:19', 10618723, 'success'),
(15, 11, 'Sony Playstation 5 Digital Edition Resmi,123,', '11/12/2022-12:19:30', 10618723, 'success'),
(16, 11, 'Sony Playstation 5 Digital Edition Resmi,123,', '11/12/2022-12:19:48', 10618723, 'success'),
(17, 11, 'Sony Playstation 5 Digital Edition Resmi,123,', '11/12/2022-12:20:10', 10618723, 'success'),
(18, 11, 'Sony Playstation 5 Digital Edition Resmi,123,', '11/12/2022-12:20:19', 10618723, 'success'),
(19, 11, 'Sony Playstation 5 Digital Edition Resmi,123,', '11/12/2022-12:20:43', 10618723, 'success'),
(20, 11, 'Sony Playstation 5 Digital Edition Resmi,123,', '11/12/2022-12:21:05', 10618723, 'success'),
(21, 11, 'Sony Playstation 5 Digital Edition Resmi,123,', '11/12/2022-12:26:17', 10618723, 'success');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `descriptions` text NOT NULL,
  `category` varchar(128) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock`, `descriptions`, `category`, `photo`) VALUES
(1, 'Sony Playstation 5 Digital Edition Resmi', 10618600, 100, '*Specifications :\nCPU : 8x 8x Zen 2 Cores at 3.5 GHz\nGPU : 10.28 TFLOPs, 36 CUs at 2.23 GHz\nGPU Architecture : Custom RDNA 2\nMemory/Interface : 16 GB GDDR6/256-bit\nMemory Bandwidth : 448 Gbps\nInternal Storage Custom : 825 GB SSD\nIO Throughput : 5.56 Gbps (Raw), Typical 8-9 Gbps\nExpendable Storage : NVMe SSD Slot\nOptical Drive : 4K UHD Blu-ray Drive\n\n*Box Content :\n1x PlayStation 5 Console Disc Version\n1x Dualsense Wireless Controller PS5\n1x USB Charging Cable\n1x HDMI cable\n1x AC power cord\n1x Manual book\n1x Kartu Garansi', 'Hardware', '000001313769_01_800.jpg'),
(124, '123', 123, 123, ' 123', '123', 'IMG_11122022_012223.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `address`, `photo`) VALUES
(11, '123', '123', '$2y$10$JthkPICYArVfASPFk2.nRuDpu0VQGj0aOCZO0VRGurXoorAyAg5kG', '123', '', ''),
(13, 'admin', 'admin', '$2y$10$TfC5doldIIAmpM2LaJdGpeXkBaXi0pc3FO3K9/cnrrAZks1B.E9XC', 'admin', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
