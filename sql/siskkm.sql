-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jan 2024 pada 06.15
-- Versi server: 8.2.0
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siskkm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` mediumint UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'PKA', 'Pusat Kemahasiswaan dan Alumni'),
(3, 'mahasiswa', 'Mahasiswa ITI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int NOT NULL,
  `jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `jenis`) VALUES
(13, 'Merdeka Belajar Kampus Merdeka'),
(14, 'Program Kreativitas Mahasiswa'),
(15, 'Lomba'),
(16, 'Non-Lomba'),
(17, 'Ormawa'),
(18, 'Pengembangan Karir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama_jurusan`) VALUES
(1, 'Teknik'),
(2, 'Non-Teknik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int NOT NULL,
  `kelas` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`) VALUES
(1, 'Reguler'),
(2, 'Karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `isi_pengumuman` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `judul`, `slug`, `isi_pengumuman`, `tanggal`, `id_user`) VALUES
(9, 'Pengumpulan SKKM', 'pengumpulan-skkm', '<p>&nbsp;</p>\r\n<p>Hai Para Mahasiswa,</p>\r\n<p>&nbsp;</p>\r\n<p>Kami ingin mengingatkan kalian semua terkait pengumpulan SKKM (Surat Keterangan Kegiatan Mahasiswa) sebelum UAS (Ujian Akhir Semester). Pengumpulan SKKM ini penting sebagai salah satu syarat administratif yang harus dipenuhi oleh setiap mahasiswa.</p>\r\n<p>&nbsp;</p>\r\n<p>Detail Pengumpulan:</p>\r\n<p>1. Batas Akhir Pengumpulan:&nbsp;<strong>24 Maret 2024</strong></p>\r\n<p>2. Cara Pengumpulan: Silakan kumpulkan dokumen SKKM ke [Lokasi Pengumpulan], atau unggah secara online melalui portal akademik.</p>\r\n<p>3. Dokumen Pendukung: Pastikan melampirkan semua dokumen pendukung kegiatan yang telah kalian ikuti selama semester ini.</p>\r\n<p>&nbsp;</p>\r\n<p>Penting untuk Diperhatikan:</p>\r\n<p>- SKKM yang tidak lengkap atau tidak memenuhi persyaratan dapat mengakibatkan ketidakvalidan pengajuan.</p>\r\n<p>- Pastikan dokumen yang diunggah atau diserahkan sudah dalam format yang jelas dan mudah diverifikasi.</p>\r\n<p>&nbsp;</p>\r\n<p>Jika ada pertanyaan atau kebingungan terkait prosedur pengumpulan SKKM, jangan ragu untuk menghubungi bagian akademik atau koordinator program studi.</p>\r\n<p>&nbsp;</p>\r\n<p>Terima kasih atas kerjasama dan semangat kalian dalam mengikuti berbagai kegiatan selama semester ini. Selamat menghadapi UAS, dan tetap jaga kesehatan!</p>\r\n<p>&nbsp;</p>\r\n<p>Hormat kami,</p>\r\n<p>Admin PDSI</p>\r\n<p>Jonathan Zefanya</p>', '2024-01-03 07:05:17', 1),
(11, 'Surat Keterangan Rektor', 'surat-keterangan-rektor', '<p>Berikut SK Rektor:</p>\r\n<p>&nbsp;</p>\r\n<p><em>https://drive.google.com/file/d/1wj3k3iF1MJnB1HBviLFAUb44zUHYROx7/view</em></p>', '2024-01-04 07:19:31', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` int NOT NULL,
  `id_tingkat_fk` int NOT NULL,
  `prestasi` varchar(255) NOT NULL,
  `bobot` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `prestasi`
--

INSERT INTO `prestasi` (`id_prestasi`, `id_tingkat_fk`, `prestasi`, `bobot`) VALUES
(96, 43, 'Magang', 20),
(97, 43, 'KKN', 20),
(98, 43, 'Mengajar Di Sekolah', 20),
(99, 43, 'PMM', 20),
(100, 43, 'Penelitian/Riset', 20),
(101, 43, 'Kegiatan Wirausaha', 20),
(102, 43, 'Studi Independen', 20),
(103, 43, 'Proyek Kemanusiaan', 20),
(104, 44, 'Proposal', 10),
(105, 44, 'Lolos Internal', 20),
(106, 44, 'Pendanaan', 40),
(107, 44, 'PIMNAS', 50),
(108, 45, 'Proposal', 10),
(109, 45, 'Lolos Internal', 20),
(110, 45, 'Pendanaan', 40),
(111, 45, 'PIMNAS', 50),
(112, 46, 'Proposal', 10),
(113, 46, 'Lolos Internal', 20),
(114, 46, 'Pendanaan', 40),
(115, 46, 'PIMNAS', 50),
(116, 47, 'Proposal', 10),
(117, 47, 'Lolos Internal', 20),
(118, 47, 'Pendanaan', 40),
(119, 47, 'PIMNAS', 50),
(120, 48, 'Lomba Akademik', 15),
(121, 48, 'Lomba Non-Akademik', 10),
(122, 48, 'Rekognisi', 15),
(123, 49, 'Lomba Akademik', 30),
(124, 49, 'Lomba Non-Akademik', 20),
(125, 49, 'Rekognisi', 30),
(126, 50, 'Lomba Akademik', 50),
(127, 50, 'Lomba Non-Akademik', 40),
(128, 50, 'Rekognisi', 50),
(129, 51, 'Lomba Akademik', 15),
(130, 51, 'Lomba Non-Akademik', 10),
(131, 51, 'Rekognisi', 15),
(132, 52, 'PKKMB', 20),
(133, 52, 'Aslab', 25),
(134, 52, 'Asdos', 25),
(135, 52, 'Abdimas Dosen', 25),
(136, 52, 'Relawan Anti Narkoba', 10),
(137, 52, 'Satgas PPKS', 10),
(138, 52, 'Panitia Adhoc ITI', 10),
(139, 53, 'Ketua', 25),
(140, 53, 'Wakil Ketua', 20),
(141, 53, 'Sekretaris', 20),
(142, 53, 'Koordinator', 15),
(143, 53, 'Anggota', 5),
(144, 54, 'Ketua', 25),
(145, 54, 'Wakil Ketua', 20),
(146, 54, 'Sekretaris', 20),
(147, 54, 'Koordinator', 15),
(148, 54, 'Anggota', 5),
(149, 55, 'Ketua', 25),
(150, 55, 'Wakil Ketua', 20),
(151, 55, 'Sekretaris', 20),
(152, 55, 'Koordinator', 15),
(153, 55, 'Anggota', 5),
(154, 56, 'Ketua', 15),
(155, 56, 'Wakil Ketua', 10),
(156, 56, 'Sekretaris', 10),
(157, 56, 'Bendahara', 10),
(158, 56, 'Koordinator', 10),
(159, 56, 'Anggota', 5),
(160, 57, 'Seminar', 5),
(161, 57, 'Workshop HardSkill', 10),
(162, 57, 'Workshop SoftSkill', 10),
(163, 57, 'Anggota Organisasi Profesi', 15),
(164, 57, 'Sertifikasi', 20),
(165, 57, 'Tes Toefl', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id` int NOT NULL,
  `nama_prodi` varchar(255) NOT NULL,
  `jenjang` char(2) NOT NULL,
  `id_jurusan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id`, `nama_prodi`, `jenjang`, `id_jurusan`) VALUES
(101, 'Teknik Elektro', 'S1', 1),
(110, 'Teknik Sipil', 'S1', 1),
(111, 'Teknik Industri', 'S1', 1),
(112, 'Arsitektur', 'S1', 1),
(113, 'Teknik Kimia', 'S1', 1),
(115, 'Teknik Informatika', 'S1', 1),
(120, 'Teknik Mesin', 'S1', 1),
(121, 'Manajemen', 'S1', 1),
(123, 'Teknologi Industri Pertanian', 'S1', 1),
(125, 'Perencanaan Wilayah dan Kota', 'S1', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester`
--

CREATE TABLE `semester` (
  `id` int NOT NULL,
  `semester` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `semester`
--

INSERT INTO `semester` (`id`, `semester`) VALUES
(1, 'I'),
(2, 'II'),
(3, 'III'),
(4, 'IV'),
(5, 'V'),
(6, 'VI'),
(7, 'VII'),
(8, 'VIII');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skkm`
--

CREATE TABLE `skkm` (
  `id_user` int NOT NULL,
  `id` int NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `filefoto` text NOT NULL,
  `id_jenis` int NOT NULL,
  `id_tingkat` int NOT NULL,
  `id_prestasi` int NOT NULL,
  `nilai` int NOT NULL,
  `status` tinyint(1) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `skkm`
--

INSERT INTO `skkm` (`id_user`, `id`, `nama_kegiatan`, `filefoto`, `id_jenis`, `id_tingkat`, `id_prestasi`, `nilai`, `status`, `keterangan`) VALUES
(5, 6, 'Pelatihan JNA', 'contoh-sertifikat-penghargaan-2.jpg', 18, 57, 164, 20, 1, '-'),
(5, 7, 'Aslab', 'contoh-sertifikat-penghargaan-21.jpg', 16, 52, 133, 25, 1, '-'),
(5, 8, 'Ketua UKM DCI', 'contoh-sertifikat-penghargaan-22.jpg', 17, 54, 144, 25, 1, '-'),
(5, 9, 'Seminar Genshin', 'contoh-sertifikat-penghargaan-23.jpg', 18, 57, 160, 5, 1, '-'),
(5, 10, 'Seminar Membaca', 'contoh-sertifikat-penghargaan-24.jpg', 18, 57, 160, 5, 1, '-'),
(9, 11, 'Aslab', 'contoh-sertifikat-penghargaan-25.jpg', 16, 52, 133, 25, 1, '-'),
(9, 12, 'Gemnastik', 'contoh-sertifikat-penghargaan-26.jpg', 15, 49, 123, 30, 1, '-'),
(10, 13, 'Aslab', 'contoh-sertifikat-penghargaan-27.jpg', 16, 52, 134, 25, 1, '-'),
(14, 14, 'Seminar Konten Kreator', 'contoh-sertifikat-penghargaan-28.jpg', 18, 57, 160, 5, 1, '-'),
(15, 15, 'Pelatihan JNA', 'contoh-sertifikat-penghargaan-29.jpg', 18, 57, 164, 20, 1, 'File sertif mirip punya Matthew'),
(15, 20, 'Seminar Konten Kreator', 'image_2024-01-06_195622528.png', 18, 57, 160, 5, 1, '-'),
(9, 21, 'Pelatihan JNA', 'image_2024-01-08_080216460.png', 18, 57, 164, 20, 1, '-'),
(18, 22, 'Aslab', 'image_2024-01-08_121147764.png', 16, 52, 133, 25, 0, '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `standar`
--

CREATE TABLE `standar` (
  `id` int NOT NULL,
  `jenjang` char(2) NOT NULL,
  `standar` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `standar`
--

INSERT INTO `standar` (`id`, `jenjang`, `standar`) VALUES
(1, 'S1', 80),
(2, 'D4', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tingkat`
--

CREATE TABLE `tingkat` (
  `id_tingkat` int NOT NULL,
  `id_jenis_fk` int NOT NULL,
  `tingkat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `tingkat`
--

INSERT INTO `tingkat` (`id_tingkat`, `id_jenis_fk`, `tingkat`) VALUES
(43, 13, 'Mandiri'),
(44, 14, 'Kota/Kabupaten'),
(45, 14, 'Provinsi'),
(46, 14, 'Nasional'),
(47, 14, 'Internasional'),
(48, 15, 'Provinsi'),
(49, 15, 'Nasional'),
(50, 15, 'Internasional'),
(51, 15, 'Kota/Kabupaten'),
(52, 16, 'Mandiri'),
(53, 17, 'Himpunan Jurusan'),
(54, 17, 'UKM'),
(55, 17, 'UKKM'),
(56, 17, 'Panitia Kegiatan Ormawa'),
(57, 18, 'Mandiri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int UNSIGNED NOT NULL,
  `last_login` int UNSIGNED DEFAULT NULL,
  `active` tinyint UNSIGNED DEFAULT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `nim` varchar(10) DEFAULT NULL,
  `nip` varchar(18) DEFAULT NULL,
  `id_jurusan` int DEFAULT NULL,
  `id_prodi` int DEFAULT NULL,
  `id_kelas` int DEFAULT NULL,
  `id_semester` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `nama_lengkap`, `nim`, `nip`, `id_jurusan`, `id_prodi`, `id_kelas`, `id_semester`) VALUES
(1, '127.0.0.1', 'admin', '$2y$08$L3ZUX1v2kdrH7pZaSELUb.J1ko5KzRf167CNPbB9LBKAS6yCv.Qpu', '', 'admin@admin.com', '', NULL, NULL, 'uW5bA7p9BRegXbBW/JyXye', 1268889823, 1704775094, 1, 'Administrator', NULL, '123456789012345', NULL, NULL, NULL, NULL),
(5, '::1', '', '$2y$08$L3ZUX1v2kdrH7pZaSELUb.J1ko5KzRf167CNPbB9LBKAS6yCv.Qpu', NULL, 'mahasiswa@iti.ac.id', NULL, NULL, NULL, 'JMaH88/Y5xKasvd7qPncS.', 1474434127, 1704743830, 1, 'Mahasiswa ITI', '1012005090', NULL, 1, 101, 2, 7),
(6, '::1', NULL, '$2y$08$Qfk8uK16gDhZkrYPZPBfkuFgFxxPCETRdsP0u70BWcqzuflpmDoe.', NULL, 'pkaiti@iti.ac.id', NULL, 'hPKgOIo7PwQ.8qh7Oa.vrO3be8f4c8a0919c4ff2', 1704675985, 'vLUYnywJJ1rcmYFumli6Ve', 1474434293, 1704774211, 1, 'PKA ITI', NULL, '199205142023052008', 1, NULL, NULL, NULL),
(9, '::1', NULL, '$2y$08$e9JnNkp1fFIEI.iYLnsDYOilJu.u1xZK0yjdyUsLt0MsRB4UTMZ3G', NULL, 'matthew@tirtagt.xyz', '830e6eaa4ca5722bb716a4ed02c0c8126b7c33f7', '8Cwo9thIzhIO.bqU0Pud5.c9655e295543a479a1', 1704294107, 'qQYTNjhLkm8gVL/hwTqxdu', 1704214043, 1704694001, 1, 'Matthew TirtaWidjaja', '1152200010', NULL, 1, 115, 1, 3),
(16, '::1', NULL, '$2y$08$oV9DiMJT381KXFFG0TeI8OgLEPV3LNbd8wNQPmSJYW7rsomavGSAG', NULL, 'anandapgt@gmail.com', NULL, NULL, NULL, '8VHPpfJST/0EV65p4Xsrre', 1704354434, 1704354503, 1, 'Ananda Putra Andika', '1152200011', NULL, 1, 115, 1, 4),
(17, '::1', NULL, '$2y$08$aeA0WsLYLbY/kHQTv0/mp.H/AH0VMjddfFShb6rVYIrBaJeqHlCtK', NULL, 'ridhuankeren@gmail.com', NULL, NULL, NULL, '3rP4T1GkIucRWXgstVeEPu', 1704690494, 1704690887, 1, 'Ridhuan Rangga Kusuma', '1152200025', NULL, 1, 115, 1, 3),
(18, '::1', NULL, '$2y$08$v4ClRDOepUyRTT8gXdZMFewTiJdgHzaFgDteh/Ger69iguAQudWd6', NULL, 'arfarrija22@gmail.com', NULL, NULL, NULL, '56afTl8dfotgQXbeDaVte.', 1704690532, 1704690785, 1, 'Arief Farroja', '1152605001', NULL, 1, 115, 1, 3),
(19, '::1', NULL, '$2y$08$jZ3vzWuDqZWy1wrjtZEgAeY8o2V7CQygl6wdLks3h5m3raCMGFLgO', NULL, 'mohammedtristan03@gmail.com', NULL, NULL, NULL, 'jToKLruLPtpwKrKLTSOjB.', 1704694036, 1704694186, 1, 'Tristan', '1152700040', NULL, 1, 115, 1, 1),
(20, '::1', NULL, '$2y$08$/FS3SUWEhWcCesVDqG6BuOPPbBpMHp5NSByRfCwtZ4bKQ4lBkPNYy', NULL, 'danar.devs@gmail.com', NULL, NULL, NULL, NULL, 1704774421, NULL, 1, 'Danardi Listyono', '1132200022', NULL, 1, 113, 1, 3),
(21, '::1', NULL, '$2y$08$kMHX1KowYSLKidA2XafuveIrFuqyeT3nIVTwo9p9bL1JXxji2s0tW', NULL, 'rizkyadityasyahputraa@gmail.com', NULL, NULL, NULL, NULL, 1704774692, NULL, 1, 'Rizky Aditya Syahputra', '1132200010', NULL, 1, 113, 1, 3),
(22, '::1', NULL, '$2y$08$Vq4CRwYmDoYE67QxwO7C..Vcg8sI92FcRYeF9a1ORr74tFtnE0uei', NULL, 'jonathan.zefanya16@gmail.com', NULL, NULL, NULL, NULL, 1704774727, NULL, 1, 'Jonathan Natannael Zefanya', '1132200024', NULL, 1, 113, 1, 3),
(23, '::1', NULL, '$2y$08$o3h4HG3r7OBZG4AfCiMjxeKo/eiiai/am1jVAK1RiKb33H8mjVpM.', NULL, 'daffanur19@gmail.com', NULL, NULL, NULL, NULL, 1704774816, NULL, 1, 'Daffa Nur Fakhri', '1132200027', NULL, 1, 113, 1, 3),
(24, '::1', NULL, '$2y$08$TtVoF8cmT0LriPjYfZ.7XeKjS/V6Oju0vLNHGvR4FoKVafdJKe0KK', NULL, 'lutfiekj@gmail.com', NULL, NULL, NULL, NULL, 1704774909, NULL, 1, 'Lutfi Ekaprima Jannata', '1132205006', NULL, 1, 113, 2, 3),
(25, '::1', NULL, '$2y$08$82UctpqpHA7CK0TOLW3mxOnshznQ3EyG6GmQH7UxnBxPPQhGbxgvq', NULL, 'ramli@iti.ac.id', NULL, NULL, NULL, 'mGoPZK0HUmZyX/EaAHHkee', 1704775077, 1704777246, 1, 'Muhammad Ramli', NULL, '202110051985080910', NULL, NULL, NULL, NULL),
(26, '::1', NULL, '$2y$08$2V0PJAv8f/0Z0PalCcMmPuni1hpYxK7SAvK.FAw8kwVuTT4S0cysS', NULL, 'daffadanindraaa@gmail.com', NULL, NULL, NULL, NULL, 1704777029, NULL, 1, 'Daffa Danindra', '1012200028', NULL, 1, 101, 1, 3),
(27, '::1', NULL, '$2y$08$M5OAZZNxWsUXHTYnTqESY.QR6lBDJd10tzgnB9yM4y2HxNsvlRSqm', NULL, 'dimasaliefy04@gmail.com', NULL, NULL, NULL, NULL, 1704777117, NULL, 1, 'Dimas Alief Yudhistira', '1012200002', NULL, 1, 101, 1, 3),
(28, '::1', NULL, '$2y$08$0RLopYzu/teHEos6R22cMeGe0.GQz9zF6JW2PIZrZH17dbjLAeqWW', NULL, 'wildankrisyanto35@gmail.com', 'd3ba7d0876253f7bd21ee845077e75deb07e05ab', NULL, NULL, NULL, 1704777245, NULL, 0, 'Wildan Krisyanto', '1012205002', NULL, 1, 101, 2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `group_id` mediumint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(52, 5, 3),
(40, 6, 2),
(33, 9, 3),
(38, 16, 3),
(42, 17, 3),
(43, 18, 3),
(44, 19, 3),
(45, 20, 3),
(46, 21, 3),
(47, 22, 3),
(48, 23, 3),
(49, 24, 3),
(50, 25, 1),
(54, 26, 3),
(53, 27, 3),
(55, 28, 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`);

--
-- Indeks untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_prestasi`),
  ADD KEY `id_tingkat` (`id_tingkat_fk`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_prodi_jurusan` (`id_jurusan`);

--
-- Indeks untuk tabel `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `skkm`
--
ALTER TABLE `skkm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `standar`
--
ALTER TABLE `standar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tingkat`
--
ALTER TABLE `tingkat`
  ADD PRIMARY KEY (`id_tingkat`),
  ADD KEY `id_jenis` (`id_jenis_fk`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id_prestasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT untuk tabel `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `skkm`
--
ALTER TABLE `skkm`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `standar`
--
ALTER TABLE `standar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tingkat`
--
ALTER TABLE `tingkat`
  MODIFY `id_tingkat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
