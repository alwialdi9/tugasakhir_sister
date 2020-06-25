-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jun 2020 pada 00.23
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lkpd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gambar`
--

CREATE TABLE `tb_gambar` (
  `id` int(11) NOT NULL,
  `nama_gambar` varchar(100) NOT NULL,
  `jawaban_gambar` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_gambar`
--

INSERT INTO `tb_gambar` (`id`, `nama_gambar`, `jawaban_gambar`) VALUES
(1, 'buaya.jpg', 0),
(2, 'burung.jpg', 0),
(3, 'katak.jpg', 0),
(4, 'langit.jpg', 1),
(5, 'laut.jpg', 1),
(6, 'lumba.jpg', 0),
(7, 'padangrumput.jpg', 1),
(8, 'rawa.jpg', 1),
(9, 'rusa.jpg', 0),
(10, 'sawah.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hasil`
--

CREATE TABLE `tb_hasil` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nis` int(11) NOT NULL,
  `nilai` decimal(11,0) DEFAULT 0,
  `mapel` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_hasil`
--

INSERT INTO `tb_hasil` (`id`, `nama`, `nis`, `nilai`, `mapel`, `date`) VALUES
(77, 'alwi', 11111, '30', 'agama', '2020-06-24 01:00:55'),
(78, 'alwi', 11111, '30', 'agama', '2020-06-24 01:27:18'),
(79, 'alwi', 11111, '10', 'agama', '2020-06-24 01:29:01'),
(80, 'alwi', 11111, '100', 'agama', '2020-06-24 01:31:49'),
(81, 'alwi', 11111, '40', 'agama', '2020-06-24 01:32:38'),
(82, 'Taufik Akbar', 99999, '40', 'aerodynamic', '2020-06-24 01:36:57'),
(83, 'Taufik Akbar', 99999, '80', 'aerodynamic', '2020-06-24 01:38:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jawaban`
--

CREATE TABLE `tb_jawaban` (
  `id` int(11) NOT NULL,
  `jawaban` varchar(128) NOT NULL,
  `pertanyaan_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jawaban`
--

INSERT INTO `tb_jawaban` (`id`, `jawaban`, `pertanyaan_id`) VALUES
(146, 'Injil', '1'),
(147, 'Al-QURAN', '1'),
(148, 'Taurat', '1'),
(149, 'Zabur', '1'),
(150, 'Isa A.S', '40'),
(151, 'Yusuf A.S', '40'),
(152, 'Muhammad SAW', '40'),
(153, 'Ibrahim A.S', '40'),
(154, '2', '41'),
(155, '5', '41'),
(156, '6', '41'),
(157, '1', '41'),
(158, 'Mengucapkan 2 Kalimat Syahadat', '42'),
(159, 'Membayar Zakat', '42'),
(160, 'Menunaikan Haji Bagi yang mampu', '42'),
(161, 'Mendirikan Solat 5 waktu', '42'),
(162, 'Mekkah', '43'),
(163, 'Madinah', '43'),
(164, 'Baghdad', '43'),
(165, 'Jeddah', '43'),
(166, 'Flight Control', '44'),
(167, 'Stabilizer Control', '44'),
(168, 'Aileron', '44'),
(169, 'Elevator', '44'),
(170, 'Plain flap, split flap, dan fowler flap', '45'),
(171, 'Aileron, elevator, dan rudder', '45'),
(172, 'Pitching, rolling, dan yawing', '45'),
(173, 'Fixed slot, automatic slot, dan blown slot', '45'),
(174, 'Rudder', '46'),
(175, 'Elevator', '46'),
(176, 'Aileron', '46'),
(177, 'Wings', '46'),
(178, 'Sriwijaya', '47'),
(179, 'Lion Air', '47'),
(180, 'Emirates', '47'),
(181, 'Garuda', '47'),
(182, 'persegi', '48'),
(183, 'airfoil', '48'),
(184, 'oval', '48'),
(185, 'lingkaran', '48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nis` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`id`, `nama`, `nis`, `status`, `tanggal`) VALUES
(57, 'Alwi Aldiansyach', '0', 1, '2020-06-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `jumlah_benar` int(11) NOT NULL,
  `jumlah_salah` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id` int(11) NOT NULL,
  `mapel` varchar(255) NOT NULL,
  `pengajar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_paket`
--

INSERT INTO `tb_paket` (`id`, `mapel`, `pengajar`) VALUES
(1, 'agama', 'Sya\'ban,. MA'),
(2, 'aerodynamic', 'Amiran., MT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id` int(11) NOT NULL,
  `nis` int(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mapel` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id`, `nis`, `nama`, `password`, `mapel`, `status`) VALUES
(4, 11111, 'alwi', '$2y$10$EFd0loFOmUmBHpZZqCSfvuQQ8jZiFGm0mEBdUFU4bCWHoKXZDFgFq', 'agama', 'offline'),
(5, 99999, 'Taufik Akbar', '$2y$10$DDFHpZdHNnNNAy8necJwc.k3mG/p.epbDsHub5zgY47Ba4PKVHrHa', 'aerodynamic', 'offline');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_soal`
--

CREATE TABLE `tb_soal` (
  `id` int(11) NOT NULL,
  `soal` varchar(256) NOT NULL,
  `pertanyaan_id` varchar(11) NOT NULL,
  `hasil` varchar(20) NOT NULL,
  `mapel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_soal`
--

INSERT INTO `tb_soal` (`id`, `soal`, `pertanyaan_id`, `hasil`, `mapel`) VALUES
(39, 'Kitab Umat Islam', '1', 'Al-QURAN', 'agama'),
(40, 'Nabi Terakhir', '40', 'Muhammad SAW', 'agama'),
(41, 'Ada berapakah rukun islam ?', '41', '5', 'agama'),
(42, 'Rukun Islam ke-3 adalah ...', '42', 'Membayar Zakat', 'agama'),
(43, 'Dimanakah Letak Masjidil Haram', '43', 'Mekkah', 'agama'),
(44, 'Salah satu sistem dalam pesawat terbang untuk mengendalikan pesawat selama terbang. Merupakan pengertian dari….', '44', 'Flight Control', 'aerodynamic'),
(45, 'Primary Flight Control meliputi ...', '45', 'Aileron, elevator, d', 'aerodynamic'),
(46, 'Untuk gerak pesawat miring kiri dan miring kanan terhadap sumbu longitudinal axis. Merupakan fungsi dari….', '46', 'Aileron', 'aerodynamic'),
(47, 'Badan Usaha Negara yang bergerak dibidang Penerbangan adalah ...', '47', 'Garuda', 'aerodynamic'),
(48, 'Bentuk Sempurna untuk permukaan sayap pesawat agar memaksimalkan tekanan udara adalah ...', '48', 'airfoil', 'aerodynamic');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_timer`
--

CREATE TABLE `tb_timer` (
  `id` int(11) NOT NULL,
  `waktu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_timer`
--

INSERT INTO `tb_timer` (`id`, `waktu`) VALUES
(1, 70);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `nis` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `name`, `nis`, `email`, `password`, `role_id`, `date_created`, `image`) VALUES
(1, 'Alwi Aldiansyach', 0, 'alwi.aldisyach@gmail.com', '$2y$10$kTDxmN7QWySbCuQBjs3z2OHMJ3q0IIVcMWgLAV5SjQbfT9LHnvAYa', 1, 1582560548, 'default.jpg'),
(3, 'Safa Aulia Firdaus', 11111, '', '$2y$10$69zdg2Jc8w7GGULu/7CzBOsXMTs55VBhoX.spVUa4ELfzHdln/U1S', 2, 1582687295, 'default.jpg'),
(4, 'admin', 1, 'admin@gmail.com', '$2y$10$JXpJVQyqfKFnBA3tBxiyAO8wzdcSWNQMmBQPDJmN2prTwz4W4Dh8C', 1, 1582693929, 'default.jpg'),
(9, 'Hisam Humaidi', 11733, '', '$2y$10$B3/6WRnznqzIc0dThXNbluydIVqAgvcxUQBAq6eRio7T25nK6UYK6', 2, 1582908177, 'default.jpg'),
(10, 'Tri Laksono', 11732, '', '$2y$10$Ec828MFW9QLhtaMHNMflveWMLeOefYyXg9Um.GL7fkIehC0JzxVEC', 2, 1582908996, 'default.jpg'),
(16, 'Agung', 0, 'agung@gmail.com', '$2y$10$it/oyM4mh0OwaUyTHa.RP.f35TpNYpa5Yji376levQSFDo2lZnO6.', 1, 1592935250, 'default.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role_name`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_gambar`
--
ALTER TABLE `tb_gambar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_timer`
--
ALTER TABLE `tb_timer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_gambar`
--
ALTER TABLE `tb_gambar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_hasil`
--
ALTER TABLE `tb_hasil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT untuk tabel `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_soal`
--
ALTER TABLE `tb_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `tb_timer`
--
ALTER TABLE `tb_timer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
