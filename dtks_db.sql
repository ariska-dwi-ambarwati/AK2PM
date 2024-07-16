-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jul 2024 pada 05.44
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dtks_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtks`
--

CREATE TABLE `dtks` (
  `id` int(11) NOT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kelurahan` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `nokk` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `bantuan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dtks`
--

INSERT INTO `dtks` (`id`, `kecamatan`, `kelurahan`, `nama`, `nik`, `nokk`, `alamat`, `bantuan`) VALUES
(1, 'tpi', 'kh', 'nh', '8997999', '89798', 'jh', 'SD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `no_kk` varchar(255) DEFAULT NULL,
  `nik` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `no_kk`, `nik`) VALUES
(1, 'admin', '$2y$10$NIPXCt3rQc5C2XtvbhBZEeSmSO473qWy8XmBMacb5ZgHp4pA8oN/6', NULL, NULL, NULL),
(2, NULL, '$2y$10$tRMzeaEd1YRNRO8zXMhRvuFTbKpKHRsBv82RBvljsMWg5wpBlXxOi', 'nisa', '875873883', '4678392820651768'),
(3, NULL, '$2y$10$nLF0sReHSVamHu0Qi.ltc.TwNds/E3L1V1n31cB2VGMOqztM9IaOa', 'nisa', '875873883', '4678392820651768'),
(11, NULL, '$2y$10$AO0u4IADWOYllpAG/240AeJs.33WBQCpGZUeYBDU.UCeJ6H3L6eI.', 'Khairunnisa Munawwarah ', '34873992849', '4873485773845285'),
(12, NULL, '$2y$10$HklnLhk7REfIgrVBVLsVT.EGkoaPqbVbfxxtR3DdyI43HFppm.7Yy', 'Khairunnisa Munawwarah ', '34873992849', '4873485773845285'),
(13, NULL, '$2y$10$qUwnBFsM6blCs.zkJEJJdezts0mzPLA8rd22FOHmQpWkBrclDsfF6', 'Khairunnisa Munawwarah ', '34873992849', '4873485773845285'),
(14, NULL, '$2y$10$3Qg1x7AZ.oNvjm.CKSPr7eSBXHiZh8rZ3VKNTkwnyoNymYJ..JE.e', 'Khairunnisa ', '82934892', '328482983928'),
(15, NULL, '$2y$10$qzd2HVNDrJTgbNxT/FJ3pOvaJxtwdgBbDoLDNDJoo9jnvNPGaSniK', 'Khairunnisa ', '82934892', '328482983928'),
(16, NULL, '$2y$10$mIfTvHhQx0WO1oHhCUAap.mI7FPU4r0d1mvDXhb6pnNwAFH3S9mmy', 'Khairunnisa ', '82934892', '328482983928'),
(17, NULL, '$2y$10$2iOqDsyMPg5FuwTXGP7XhO2EHvd9SBcDJs.eADEEOYqXXs2u1h4LK', 'Khairunnisa ', '82934892', '328482983928'),
(18, NULL, '$2y$10$6usU931Vx9nuUqplT1OF6.C5mVI3x3YqrHIzqjW1xGURQ.WIGnUGi', 'Khairunnisa Munawwarah ', '34873992849', '4678392820651768'),
(19, NULL, '$2y$10$veYVFW3F2h9Lb03ZBCaq8e643.Nf7TIrf0w5ytw4rYyhCY9irpxcm', 'Khairunnisa Munawwarah ', '34873992849', '4678392820651768'),
(20, NULL, '$2y$10$BfpFWJJ/8VovALGv4dMf4esSBrA8jFz5zboRRP9h64x7ebvHD4FVm', 'Khairunnisa ', '34873992849', '4678392820651768'),
(21, NULL, '$2y$10$mrflM89Cek2tH9Qx25nKyuyPxn2srlTf.hpTFVXUSOVm0MSCeONVu', 'Khairunnisa ', '34873992849', '4678392820651768'),
(22, NULL, '$2y$10$gewO7K5GPAI9ykxSF6mrWOqIV3tSmsyAdZc8TYah7TfajNq2jm.7a', 'Khairunnisa Munawwarah ', '34873992849', '7657657576576576'),
(23, NULL, '$2y$10$p3mER1lnKDfPSjrqMG2Pb.WRGszDw6uE58O5gV41Do.BnVdxw.EAS', 'Khairunnisa Munawwarah ', '7846826274', '8247428764287462');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dtks`
--
ALTER TABLE `dtks`
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
-- AUTO_INCREMENT untuk tabel `dtks`
--
ALTER TABLE `dtks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
