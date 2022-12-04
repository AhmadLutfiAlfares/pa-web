-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Des 2022 pada 14.33
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `journable`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_journal` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `artikel_file` varchar(255) DEFAULT NULL,
  `date_upload` datetime NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id`, `id_user`, `id_journal`, `title`, `artikel_file`, `date_upload`, `status`) VALUES
(1, 1, 29, 'JFSAOFOASU UUoasduau', 'uploads/JFSAOFOASU_UUoasduau_file-artikel.pde', '2022-12-04 14:31:12', 'pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookmark`
--

CREATE TABLE `bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_journal` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `journal`
--

CREATE TABLE `journal` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_publisher` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `published_date` year(4) NOT NULL,
  `category` varchar(64) DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  `issn` varchar(20) NOT NULL,
  `cover_filename` varchar(255) DEFAULT NULL,
  `journal_filename` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `journal`
--

INSERT INTO `journal` (`id`, `id_publisher`, `title`, `published_date`, `category`, `last_updated`, `issn`, `cover_filename`, `journal_filename`) VALUES
(29, 26, 'Egyptian Journal of Critical Care Medicine', 2012, NULL, '2022-11-12 13:39:51', '21-321031-21', 'uploads/cover/Egyptian_Journal_of_Critical_Care_Medicine_cover.jpg', 'uploads/file-jurnal/Egyptian_Journal_of_Critical_Care_Medicine_file-jurnal.pdf'),
(30, 26, 'adfewffdasf', 2019, 'Agrikultur', '2022-11-14 05:54:06', '12213-11', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `publisher`
--

CREATE TABLE `publisher` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `publisher`
--

INSERT INTO `publisher` (`id`, `name`, `email`, `password`, `username`) VALUES
(1, 'Universitas Mulawarman', '', '', NULL),
(4, 'Pustaka', '', '', NULL),
(25, 'dafdsefe', 'example@god.com', '$2y$10$Hq2mAMC2xXgxS9WBROuMBOzR1DL3Qcgeq.qZc77k9AvGxl0rmUVR.', NULL),
(26, 'Wolters Kluwer Medknow Publications', 'humas@wolterspublishing.in', '$2y$10$4cf8mHN.9MdcrX/H50K.neqIujqLZzhIjNvs2NlwCnstneUKH.TGC', NULL),
(28, 'Magnolia Press', 'humas@magnolia.co', '$2y$10$7gOTk3Gnd5vUL5oapbEzEeGwlXP.ml6JLBhA1abrxwIWY0CW.ST/e', 'magnolia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(1, 'zeerafle', 'vsefareez@gmail.com', '$2y$10$zrNGuFdqJyhB5bTfd.9RSOwn.LF/pZg7Crpx9hvFZkC5SWPjvazxi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key_id_journal` (`id_journal`);

--
-- Indeks untuk tabel `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`id`),
  ADD KEY `journal_fk` (`id_journal`),
  ADD KEY `user_fk` (`id_user`);

--
-- Indeks untuk tabel `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publisher_fk` (`id_publisher`);

--
-- Indeks untuk tabel `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `journal`
--
ALTER TABLE `journal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `publisher`
--
ALTER TABLE `publisher`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `foreign_key_id_journal` FOREIGN KEY (`id_journal`) REFERENCES `journal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bookmark`
--
ALTER TABLE `bookmark`
  ADD CONSTRAINT `journal_fk` FOREIGN KEY (`id_journal`) REFERENCES `journal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `journal`
--
ALTER TABLE `journal`
  ADD CONSTRAINT `publisher_fk` FOREIGN KEY (`id_publisher`) REFERENCES `publisher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
