-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jun 2025 pada 15.27
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `customer_name`, `phone`, `address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Rey Berak', '087823567142', 'Manggarai', '2025-06-17 11:09:18', '2025-06-17 11:20:46', NULL),
(4, 'Test Test', '087887691212', 'tester', '2025-06-18 11:36:05', '2025-06-20 10:49:49', '2025-06-20 00:00:00'),
(5, 'Tester', '087826152921', 'Bogor', '2025-06-22 04:12:53', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `level_name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id`, `level_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'administrator', '2025-06-12 13:14:46', NULL, NULL),
(2, 'operator', '2025-06-12 13:14:46', NULL, NULL),
(4, 'leader', '2025-06-22 11:06:59', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_laundry_pickup`
--

CREATE TABLE `trans_laundry_pickup` (
  `id` int(11) NOT NULL,
  `id_order` varchar(50) DEFAULT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `pickup_date` datetime NOT NULL,
  `notes` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `trans_laundry_pickup`
--

INSERT INTO `trans_laundry_pickup` (`id`, `id_order`, `id_customer`, `pickup_date`, `notes`, `created_at`, `updated_at`) VALUES
(2, 'TR-202506201249502', 3, '2025-06-20 16:03:23', 'udah diambil', '2025-06-20 14:03:23', NULL),
(3, 'TR-202506220612562', 5, '2025-06-22 07:02:01', '', '2025-06-22 05:02:01', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_order`
--

CREATE TABLE `trans_order` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `order_code` varchar(50) NOT NULL,
  `order_date` date NOT NULL,
  `order_end_date` date NOT NULL,
  `order_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  `order_pay` int(11) DEFAULT NULL,
  `order_change` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `trans_order`
--

INSERT INTO `trans_order` (`id`, `id_customer`, `order_code`, `order_date`, `order_end_date`, `order_status`, `created_at`, `update_at`, `deleted_at`, `order_pay`, `order_change`, `total`) VALUES
(2, 3, 'TR-202506181128582', '2025-06-18', '2025-06-20', 0, '2025-06-18 09:29:32', '2025-06-20 10:49:42', '2025-06-20 00:00:00', 50000, 19900, 30100),
(3, 4, 'TR-202506181336302', '2025-06-18', '2025-06-20', 0, '2025-06-18 11:37:05', '2025-06-18 11:37:11', '2025-06-18 00:00:00', 20000, 1100, 18900),
(4, 3, 'TR-202506201249502', '2025-06-20', '2025-06-22', 1, '2025-06-20 10:50:32', '2025-06-20 14:03:23', NULL, 50000, 4250, 45750),
(5, 5, 'TR-202506220612562', '2025-06-22', '2025-06-25', 1, '2025-06-22 04:13:13', '2025-06-22 05:02:01', NULL, 50000, 8000, 42000),
(6, 5, 'TR-202506220704272', '2025-06-22', '2025-06-24', 0, '2025-06-22 05:04:39', NULL, NULL, NULL, NULL, 200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_order_detail`
--

CREATE TABLE `trans_order_detail` (
  `id` int(11) NOT NULL,
  `id_order` varchar(50) DEFAULT NULL,
  `id_service` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` double(10,2) NOT NULL,
  `notes` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `trans_order_detail`
--

INSERT INTO `trans_order_detail` (`id`, `id_order`, `id_service`, `qty`, `sub_total`, `notes`, `created_at`, `update_at`) VALUES
(1, 'TR-202506181128582', 4, 4, 30100.00, 'oke', '2025-06-18 09:29:32', NULL),
(2, 'TR-202506181336302', 2, 4, 18900.00, 'test', '2025-06-18 11:37:05', NULL),
(3, 'TR-202506201249502', 4, 4250, 29750.00, 'oke', '2025-06-20 10:50:32', NULL),
(4, 'TR-202506201249502', 1, 3200, 16000.00, 'oke', '2025-06-20 10:50:32', NULL),
(5, 'TR-202506220612562', 4, 6000, 42000.00, 'oke', '2025-06-22 04:13:14', NULL),
(6, 'TR-202506220704272', 1, 40000, 200000.00, 'oke', '2025-06-22 05:04:39', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `type_of_service`
--

CREATE TABLE `type_of_service` (
  `id` int(11) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `type_of_service`
--

INSERT INTO `type_of_service` (`id`, `service_name`, `price`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cuci & Gosok', 5000, '', '2025-06-17 14:28:39', NULL, NULL),
(2, 'Cuci', 4500, '', '2025-06-17 14:28:52', NULL, NULL),
(3, 'Gosok', 5000, '', '2025-06-17 14:29:05', NULL, NULL),
(4, 'Big & Heavy Stuff', 7000, '', '2025-06-17 14:29:17', '2025-06-18 08:10:53', NULL),
(5, 'test', 123123, 'dada', '2025-06-18 11:15:33', '2025-06-18 11:15:36', '2025-06-18 13:15:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_level` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `id_level`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(2, 1, 'agra saputra', 'agra@gmail.com', '660c455c02558fc26bc5934f405bc0ede72ae486', '2025-06-12 13:16:14', '2025-06-13 07:13:29'),
(3, 2, 'zuzanna', 'zuza@gmail.com', '660c455c02558fc26bc5934f405bc0ede72ae486', '2025-06-12 13:16:14', '2025-06-22 11:18:11'),
(21, 4, 'James Gosling', 'james@gmail.com', '660c455c02558fc26bc5934f405bc0ede72ae486', '2025-06-22 11:19:12', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `trans_laundry_pickup`
--
ALTER TABLE `trans_laundry_pickup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer_pu_to_id_customer` (`id_customer`),
  ADD KEY `id_order_pu_to_order_code_order` (`id_order`);

--
-- Indeks untuk tabel `trans_order`
--
ALTER TABLE `trans_order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_code` (`order_code`),
  ADD KEY `id_customer_tr_to_id_customer` (`id_customer`);

--
-- Indeks untuk tabel `trans_order_detail`
--
ALTER TABLE `trans_order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_service_od_to_id_service` (`id_service`),
  ADD KEY `id_order_od_to_order_code_order` (`id_order`);

--
-- Indeks untuk tabel `type_of_service`
--
ALTER TABLE `type_of_service`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_level_user_to_id_level` (`id_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `trans_laundry_pickup`
--
ALTER TABLE `trans_laundry_pickup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `trans_order`
--
ALTER TABLE `trans_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `trans_order_detail`
--
ALTER TABLE `trans_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `type_of_service`
--
ALTER TABLE `type_of_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `trans_laundry_pickup`
--
ALTER TABLE `trans_laundry_pickup`
  ADD CONSTRAINT `id_customer_pu_to_id_customer` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `id_order_pu_to_order_code_order` FOREIGN KEY (`id_order`) REFERENCES `trans_order` (`order_code`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `trans_order`
--
ALTER TABLE `trans_order`
  ADD CONSTRAINT `id_customer_tr_to_id_customer` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `trans_order_detail`
--
ALTER TABLE `trans_order_detail`
  ADD CONSTRAINT `id_order_od_to_order_code_order` FOREIGN KEY (`id_order`) REFERENCES `trans_order` (`order_code`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `id_service_od_to_id_service` FOREIGN KEY (`id_service`) REFERENCES `type_of_service` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `id_level_user_to_id_level` FOREIGN KEY (`id_level`) REFERENCES `level` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
