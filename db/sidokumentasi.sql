-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20 Mar 2019 pada 01.50
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sidokumentasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `albums`
--

CREATE TABLE `albums` (
  `id_album` int(11) NOT NULL,
  `object_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `tgl_post` date NOT NULL,
  `nama_album` varchar(200) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `terbaru` varchar(6) NOT NULL,
  `download` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `albums`
--

INSERT INTO `albums` (`id_album`, `object_id`, `kategori_id`, `tgl_post`, `nama_album`, `keterangan`, `user_id`, `terbaru`, `download`) VALUES
(85, 1, 1, '2018-08-31', 'Foto terbaru gubernur', '', 2, 'ya', 1),
(86, 2, 1, '2018-08-31', 'Foto terbaru wagub', '', 2, 'ya', 0),
(87, 3, 1, '2018-08-31', 'Foto terbaru Ibu Gubernur', '', 2, 'ya', 0),
(88, 5, 1, '2018-08-31', 'Foto terbaru sekda', '', 2, 'ya', 0),
(89, 4, 1, '2018-08-31', 'Foto terbaru Ibu Wakil Gubernur', '', 2, 'ya', 0),
(90, 8, 1, '2018-08-31', 'Foto terbaru Ibu Sekda', '', 2, 'ya', 0),
(91, 1, 2, '2018-06-01', 'Upacara Hari Lahir Pancasila', '', 2, 'tidak', 2),
(95, 1, 4, '2018-10-25', 'Seminar nasional', '', 2, 'tidak', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fotos`
--

CREATE TABLE `fotos` (
  `id_foto` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `album_id` int(11) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `prioritas_home` varchar(2) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fotos`
--

INSERT INTO `fotos` (`id_foto`, `nama`, `album_id`, `foto`, `status`, `prioritas_home`, `user_id`) VALUES
(344, '001 Gub REV lencana astha brata', 85, 'gNtXMzCRCSXD7JZcdG89lxvElOSS8LfO.png', 'Tidak Tampil Home', '1', 2),
(345, '2S0I7514', 85, 'YcNhiDoHsVTckt4WSnWvj-VRGCo9O0qT.png', 'Tidak Tampil Home', '0', 2),
(346, 'Gub Hadap Depan Update Astha Brata', 85, 'qQp4E-hYU8J2XF9D9FmkVLLPkkHJVNNn.png', 'Tampil Home', '1', 2),
(347, 'gub PDHa', 85, '1reoN2YqGJ9qZiDLQDxzyUWrO-_hhRMz.png', 'Tidak Tampil Home', '0', 2),
(348, 'SMTI9682 copy', 85, 'eGvsl9RrNMuKVSrMzfjVW5Ei7YeKnX_8.png', 'Tidak Tampil Home', '1', 2),
(349, 'batik 2016 kopyah', 86, '1E_325Fb55VaiOoO0o5oWBVNNNhuMOjX.png', 'Tidak Tampil Home', '0', 2),
(350, 'IMG_6063 more medals ', 86, 'q5y2svkL6vMQ4KiTxdBxwYtKsa_20M_M.png', 'Tampil Home', '2', 2),
(351, 'Wagub PDU Hadap Serong Kanan UPDATE AGUSTUS 2017', 86, 'ueWYqz1w7zgKv2gE81ML2Yh9dbq958AB.png', 'Tidak Tampil Home', '0', 2),
(352, 'MRN_6407 copy plus ninja', 87, 'XrSWyzBUXEXrsIJReZKyXgGm4FW5ZBBl.png', 'Tampil Home', '4', 2),
(353, 'IMG_6241edit', 88, 'iIe9s6KBqf5e59wAkZ6SACUlORAMjZ_G.jpg', 'Tampil Home', '3', 2),
(354, 'IMG_5579 copy', 89, 'DDuI6qvI4et543a5ZizhFJBazLfzr0Rq.png', 'Tampil Home', '5', 2),
(355, 'SMTI1118 copy', 89, '9S7afXeMX_tiBERvXyBHVlmWd9sAS4rU.png', 'Tidak Tampil Home', '0', 2),
(356, '_MG_2378', 90, 'R6iW-pXuNTIIY-aMlTDkHufVW18phnnm.JPG', 'Tampil Home', '6', 2),
(358, 'Gub Jawa Timur Menjadi Inspektur Upacara Peringatan Hari Lahir Pancasila Ke-73 Tahun 2018, di Gedung Negara Grahadi (3)', 91, 'KguIQwEkVgKZNC2PzevxnDNkkzGYVoR6.JPG', 'Tidak Tampil Home', '', 2),
(359, 'Gubernur Jawa Timur Menjadi Inspektur Upacara Peringatan Hari Lahir Pancasila Ke-73 Tahun 2018, di Gedung Negara Grahadi (5)', 91, 'YMOqfzP4zfL02KlsMjcf4GIlsEVxwGKY.JPG', 'Tidak Tampil Home', '0', 2),
(367, 'Halal Bi Halal di Kantor, Gubernur Jatim Bermaaf-maafan dengan Kapolda Jatim', 95, 'R1AZqI28pxYTDhzAE8blXMtHVHRpdx4J.JPG', 'Tidak Tampil Home', '0', 2),
(368, 'Halal Bi Halal, Gubernur Jatim Bermaaf-maafan dengan Konjen Australia', 95, 'ZdGcJB1KVOBfmAb_ARmv0nNQ4cWC_YA1.JPG', 'Tidak Tampil Home', '', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Foto Terbaru'),
(2, 'Upacara Bendera'),
(4, 'Seminar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1523270257),
('m130524_201442_init', 1523270259);

-- --------------------------------------------------------

--
-- Struktur dari tabel `objects`
--

CREATE TABLE `objects` (
  `id_object` int(11) NOT NULL,
  `nama_object` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `objects`
--

INSERT INTO `objects` (`id_object`, `nama_object`) VALUES
(1, 'Gubernur'),
(2, 'Wagub'),
(3, 'Bu Gub'),
(4, 'Bu Wagub'),
(5, 'Sekda'),
(8, 'Bu Sekda'),
(10, 'Lain-lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `level` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama_lengkap`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `level`) VALUES
(2, 'Novia Rahayu Kartika Sari', 'sidoku_admin', 'YdP8w4Qq-xRlQHi7qNQeD5iZuMYnlgbS', '$2y$13$7frMt8ShhQxW4nqU.VRoSel2BTCD0sz5yqgZRpx0alMREw4X2lZwK', NULL, 'sidokuadmin@sidoku.com', 10, 1523270426, 1523270426, 'admin'),
(18, 'Dini Dyah', 'dini_dyah', '6LDREiVIQJJFZRL5ft2dH_B26vj-pLgT', '$2y$13$LKSJQ1WvEkFLfUTf1jCjzuSjhgfNEXCg6QQ3fQRCJIsMYU3k6KRkm', NULL, 'dini@gmail.com', 10, 1532537924, 1532537924, 'petugas_piket'),
(19, 'Fatmawati', 'fatma', '3B4eyvonUJpQPRaVGqRaju6lO0MuPKY6', '$2y$13$5pAfbDc.BbADBydD7KtpQusdLEK8eNxNeM5Wm/mE6.G2CNNv7v/7S', NULL, 'fatma@gmail.com', 10, 1532537961, 1532537961, 'petugas_piket'),
(20, 'Rohmad Nuryanto', 'rohmad', 'gYn41sg-62ezOQhW6vx696DV-YcLtJ9V', '$2y$13$NqrJStre9txLkxM2jBnzl.dx6ENkAd7f15Uan9g0DMCmh9Xk2bthq', NULL, 'rohmad@gmail.com', 10, 1532541431, 1532541431, 'pegawai'),
(21, 'Arditya K', 'ardit', 'RP9VDGGacP_FHvCn2EGDSlpdMu8jhxKv', '$2y$13$5T3qXc4djNF6T7nqO9EGtO4nVkn5N2vJ6FmJz3SJBRGKjju6DdSLS', NULL, 'ardit@gmail.com', 10, 1532542002, 1532542002, 'pegawai'),
(22, 'Joko Bramono', 'joko', 'vbTtbiRZ1P4NBwNgmH0fgUAcTSCFYyfk', '$2y$13$rXSm/S5hCaZdM6/Ddms0IOfeZDWNgP10aUuLNRrIy2/3M3mdI7i7m', NULL, 'joko@gmail.com', 10, 1532542040, 1532542040, 'pegawai'),
(23, 'Dikki S', 'dikkki', 'A4wow6jRA2lIz_RJkBrOKvbdW5_UF6wm', '$2y$13$4uTDEowDvBiJhgtdjGV4WeVxyyWfiWfMOZBbFVttPqbrKJ8q.vhme', NULL, 'dikki@gmail.com', 10, 1532542270, 1532542270, 'pegawai'),
(24, 'Dewi Kurniawati', 'dewi', 'Bl-fGlfFze4cRcepTmKTwWIukXYvdmcq', '$2y$13$zaGAvbCMsg9DxlVD3lkpFezfsXXxByuJp.V5iZuOebc.Hp5T0c3/.', NULL, 'dewi@gmail.com', 10, 1532542357, 1532542357, 'pegawai'),
(25, 'Wiempi Roberto', 'wiempi', '9D0l4Y5kFexGXDN1QADvJlEa9DbL11a_', '$2y$13$8QX8WX0Lzm5WBrYMHoEghOPl7CgpwTW7muErN2sjXDE/.CIKU6EiK', NULL, 'wiempi@gmail.com', 10, 1533192585, 1533192585, 'pegawai'),
(26, 'Vivi Kurniawati', 'Vivi', '1Xn4zOO_9UULz-cv629tsPGSWnFl5Oys', '$2y$13$OdVFd5CKoS583WQkLzsoaup93eEIbe4agUH/mTo9t4SS7A.0CbHkK', NULL, 'vivi@gmail.com', 10, 1533192614, 1533192614, 'pegawai'),
(27, 'Sri Suhartini', 'tini', '5NGExo7RifcS3fUrFmnEbyuSJyQbXlIE', '$2y$13$1CYCqnvhvCRiPJDIWa1pK.GgaJNs9JVrIzgx01mSGVbfn36mOLrea', NULL, 'tini@gmail.com', 10, 1533192724, 1533192724, 'pegawai'),
(28, 'Irawan Yani', 'irawan', '9EDfw3MUODT83ZDjHKT0rNzdMxZWeF46', '$2y$13$NJBQ8hJGKwEKX91BL.ncTuuuw5YgNa2RBN7C8x35QIiMLKOcj8Is.', NULL, 'irawan@gmail.com', 10, 1533193059, 1533193059, 'pegawai'),
(29, 'Cipta Kurnia Putra', 'putra', 'uhMDRlkMOFRNquipkM_zokuPSuF6TrWG', '$2y$13$Cj3if411d3Gle/lzTqgf9.PVs/vuLlGZLqD15SvswX/trHpEt6Jsu', NULL, 'putra@gmail.com', 10, 1533193791, 1533193791, 'pegawai'),
(30, 'Erwin Sugiartha', 'erwin', 'ETRzei-llYWCYuGHI--tOc1xojjXOCzi', '$2y$13$gsfsH4AvSqcBz93q36l0YO7ZSdbU6fQWNTdOPJ2JVLzq9F/qMmXUG', NULL, 'erwin@gmail.com', 10, 1533194001, 1538419477, 'pegawai'),
(31, 'petugas', 'petugas', 'Av0Qnrz0A2eG6LUYvgMD4tahsCygMNvb', '$2y$13$/9YM5fvPLMPpQQJqWKDD2euhwHCtXl9VF6.hAcfOZL1sSkn/W2vay', '-qIgKCttpietMEndh4i8TxTUk3QGgZN8_1538401652', 'petugas@gmail.com', 10, 1533664547, 1538401652, 'pegawai'),
(32, 'petugas piket', 'petugas piket', 'OoQwnotvYC-7L-CNYdFd7xZtik23_vBI', '$2y$13$khB3yr5BxP3dhgsomFio4eA7FQMEFXT3F6bqKre9EchHe4OhReaVe', NULL, 'petugas_piket@gmail.com', 10, 1533686845, 1533686845, 'petugas_piket'),
(33, '', 'novia', 'YlCkvCDN3p7Y4PTgHysNNxN-54Ag4D_W', '$2y$13$6TXeCnk7/KiN9Io/K4GLmOZuO4vHLxTeom5EuSwc22WYFZxZNJpEm', '7ajQrb9krDu9jBQtp_r6FwOJStVW6if9_1538419832', 'novia7a24@gmail.com', 10, 1538398490, 1538419832, 'admin'),
(34, 'User uji coba', 'coba_user', 'd86Z0tluLeHnfbRKjmqrI8xiNRo4-YHO', '$2y$13$xlrn18yF8gMivo2pfmcQv.t5clUIiJk5OuSN3.m/fNfx0tVfWoLzi', NULL, 'coba@user.com', 10, 1538520895, 1538520895, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id_album`),
  ADD KEY `object_id` (`object_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `album_id` (`album_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `objects`
--
ALTER TABLE `objects`
  ADD PRIMARY KEY (`id_object`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=372;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `objects`
--
ALTER TABLE `objects`
  MODIFY `id_object` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_ibfk_1` FOREIGN KEY (`object_id`) REFERENCES `objects` (`id_object`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `albums_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `albums_ibfk_3` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fotos_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id_album`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fotos_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
