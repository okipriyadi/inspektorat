-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2019 at 02:04 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iman`
--

-- --------------------------------------------------------

--
-- Table structure for table `columns`
--

CREATE TABLE `columns` (
  `id` int(11) DEFAULT NULL,
  `title` text,
  `position` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `task_limit` int(11) DEFAULT NULL,
  `description` text,
  `hide_in_dashboard` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `jawaban` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pertanyaan` int(11) DEFAULT NULL,
  `skor` float DEFAULT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pilihan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `keterangan` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `pertanyaan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `id_survei` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pilihan`
--

CREATE TABLE `pilihan` (
  `id_pilihan` int(11) NOT NULL,
  `pilihan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `skor` int(11) DEFAULT NULL,
  `id_pertanyaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `survei`
--

CREATE TABLE `survei` (
  `id_survei` int(11) NOT NULL,
  `survei` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_detail`
--

CREATE TABLE `task_detail` (
  `id_detail` bigint(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `id_creator` int(11) NOT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `id_status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `last_update` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_detail`
--

INSERT INTO `task_detail` (`id_detail`, `title`, `description`, `id_creator`, `id_petugas`, `id_status`, `created_at`, `start_date`, `end_date`, `last_update`) VALUES
(9, 'Buat Skeleton Aplikasi', 'Buat Skeleton Aplikasi untuk menyiman manajemen resiko', 1, 1, 16, '2019-09-10 22:24:40', '2019-09-10 00:00:00', '2019-09-10 00:00:00', '2019-09-11 20:51:00'),
(10, 'Buat Petunjuk Teknis Manajemen Resiko', 'Buat Petunjuk Teknis Manajemen Resiko', 1, 14, 17, '2019-09-10 22:25:21', '2019-09-10 00:00:00', '2019-09-27 00:00:00', '2019-09-11 20:51:00'),
(11, 'Ikuti Pelatihan Managemen Resiko', 'Ikuti Pelatihan Managemen Resiko', 1, 4, 18, '2019-09-10 22:30:37', '2019-09-10 00:00:00', '2019-09-14 00:00:00', '2019-09-11 20:51:00'),
(12, 'Ikuti Pelatihan Managemen Resiko', 'Ikuti Pelatihan Managemen Resiko', 1, 5, 17, '2019-09-10 22:32:52', '2019-09-10 00:00:00', '2019-09-14 00:00:00', '2019-09-11 20:51:00'),
(13, 'Membuat Petunjuk Teknis Evaluasi Implementasi Akuntabilitas Kinerja Pada Unit Kerja', '', 1, 2, 27, '2019-09-12 09:02:50', '2019-09-02 00:00:00', '2019-09-03 00:00:00', '2019-09-12 09:02:50'),
(14, 'Penyusunan Revisi Internal Audit Charter', '', 1, 2, 23, '2019-09-12 09:04:36', '2019-09-04 00:00:00', '2019-09-05 00:00:00', '2019-09-12 09:04:36'),
(15, 'Mengecek kelengkapan dokumen terkait telaah sejawat', '', 1, 16, 23, '2019-09-12 09:08:18', '2019-09-01 00:00:00', '2019-09-24 00:00:00', '2019-09-12 09:08:18'),
(16, 'Membuat PKPT dan Profil Resiko Kementerian', '', 1, 16, 18, '2019-09-12 09:09:27', '2019-08-22 00:00:00', '2019-09-06 00:00:00', '2019-09-12 09:09:27'),
(17, 'Mengecek Dokumen Pendukung untuk Evaluasi RB Deputi Balaks', '', 1, 16, 21, '2019-09-12 09:10:48', '2019-09-01 00:00:00', '2019-09-06 00:00:00', '2019-09-12 09:10:48'),
(18, 'Melaksanakan Evaluasi terperinci pengelolaan keuangan unit kerja di lingkungan Kementerian PANRB', '', 1, 6, 30, '2019-09-12 09:13:24', '2019-08-08 00:00:00', '2019-08-30 00:00:00', '2019-09-12 09:13:24'),
(19, 'Melaksanakan Evaluasi Sakip Deputi Yanlik', '', 1, 6, 26, '2019-09-12 09:14:27', '2019-09-02 00:00:00', '2019-09-20 00:00:00', '2019-09-12 09:14:27'),
(20, 'Mengecek Kelengkapan Dokumen terkait telaah sejawat', '', 1, 4, 23, '2019-09-12 09:18:58', '2019-09-02 00:00:00', '2019-09-24 00:00:00', '2019-09-12 09:18:58'),
(21, 'Penyesuaian MR dengan Juknis yang baru', '', 1, 18, 16, '2019-09-12 09:24:27', '2019-09-11 00:00:00', '2019-09-13 00:00:00', '2019-09-12 09:24:27'),
(22, 'Penyesuaian MR dengan Juknis yang baru', '', 1, 19, 17, '2019-09-12 09:25:02', '2019-09-11 00:00:00', '2019-09-13 00:00:00', '2019-09-12 09:25:02'),
(23, 'Penyesuaian MR dengan Juknis yang baru', '', 1, 20, 18, '2019-09-12 09:26:07', '2019-09-11 00:00:00', '2019-09-13 00:00:00', '2019-09-12 09:26:07'),
(24, 'Penyesuaian MR dengan Juknis yang baru', '', 1, 21, 17, '2019-09-12 09:26:30', '2019-09-11 00:00:00', '2019-09-13 00:00:00', '2019-09-12 09:26:30'),
(25, 'Pembuatan Logo Inspektorat', '', 1, 3, 33, '2019-09-12 09:29:34', '2019-08-27 00:00:00', '2019-08-28 00:00:00', '2019-09-12 09:29:34'),
(26, 'Pembuatan Logo ISMA', '', 1, 3, 33, '2019-09-12 09:30:08', '2019-08-27 00:00:00', '2019-08-28 00:00:00', '2019-09-12 09:30:08'),
(27, 'Pembuatan Desain Baju Inspektorat', '', 1, 3, 33, '2019-09-12 09:31:33', '2019-09-11 00:00:00', '2019-09-12 00:00:00', '2019-09-12 09:31:33'),
(28, 'Buat Database Manajemen Resiko', '', 1, 1, 17, '2019-09-12 10:40:50', '2019-09-12 00:00:00', '2019-10-10 00:00:00', '2019-09-12 10:40:50'),
(29, 'Mengecek Dokumen Pendukung untuk Evaluasi RB Deputi Balaks', '', 1, 14, 21, '2019-09-12 10:47:53', '2019-09-02 00:00:00', '2019-09-12 00:00:00', '2019-09-12 10:47:53'),
(30, 'Menambahkan Pilihan Penanganan Resiko', '', 1, 1, 18, '2019-09-12 11:50:38', '2019-09-02 00:00:00', '2019-09-03 00:00:00', '2019-09-12 11:50:38'),
(31, 'Tampilkan Warna Pada Kolom Besaran Resiko', '', 1, 1, 18, '2019-09-12 11:53:22', '2019-09-02 00:00:00', '2019-09-03 00:00:00', '2019-09-12 11:53:22'),
(32, 'Mengidentifikasi bisnis proses yang berlaku di unit inspektorat dengan cara konsultasi kepada rekan kerja dan atasan ', 'Mengidentifikasi bisnis proses yang berlaku di unit inspektorat dengan cara konsultasi kepada rekan kerja dan atasan ', 1, 1, 35, '2019-09-17 09:36:09', '2019-08-05 00:00:00', '2019-08-09 00:00:00', '2019-09-17 09:36:09'),
(33, 'Melakukan perancangan databasa', '', 1, 1, 36, '2019-09-17 09:36:55', '2019-08-05 00:00:00', '2019-09-18 00:00:00', '2019-09-17 09:36:55'),
(34, 'Melakukan perencanaan antar muka pengguna', '', 1, 1, 36, '2019-09-17 09:37:25', '2019-08-05 00:00:00', '2019-09-06 00:00:00', '2019-09-17 09:37:25'),
(35, 'Pembuatan Database', '', 1, 1, 35, '2019-09-17 09:39:19', '2019-08-05 00:00:00', '2019-09-18 00:00:00', '2019-09-17 09:39:19'),
(36, 'Pembuatan Web Template', '', 1, 1, 34, '2019-09-17 09:43:38', '2019-08-12 00:00:00', '2019-08-16 00:00:00', '2019-09-17 09:43:38'),
(37, 'Pengkodean/pemrograman aplikasi', '', 1, 1, 34, '2019-09-17 09:44:41', '2019-08-12 00:00:00', '2019-09-20 00:00:00', '2019-09-17 09:44:41'),
(38, 'Membuat rancangan konsep layanan konsultasi berbasis web', '', 1, 4, 34, '2019-09-17 09:52:10', '2019-08-07 00:00:00', '2019-09-19 00:00:00', '2019-09-17 09:52:10'),
(39, 'Melakukan konsultasi dengan mentor dan atasan mengenai konsep layanan konsultasi berbasis web', '', 1, 4, 35, '2019-09-17 09:52:43', '2019-09-12 00:00:00', '2019-09-17 00:00:00', '2019-09-17 09:52:43'),
(40, 'Membuat list pertanyaan FAQ E-Consulting', '', 1, 4, 36, '2019-09-17 09:53:34', '2019-08-14 00:00:00', '2019-09-18 00:00:00', '2019-09-17 09:53:34'),
(41, 'Membuat list peraturan atau dokumen terkait layanan konsultasi', '', 1, 5, 34, '2019-09-17 09:54:45', '2019-09-10 00:00:00', '2019-09-20 00:00:00', '2019-09-17 09:54:45'),
(42, 'Melakukan konsultasi dengan mentor  mengenai mekanisme layanan konsultasi berbasis web beserta unsur pendukungnya', '', 1, 5, 35, '2019-09-17 09:55:13', '2019-09-10 00:00:00', '2019-09-17 00:00:00', '2019-09-17 09:55:13'),
(44, 'Ada', '', 1, 0, 34, '2019-11-07 11:25:02', '2019-01-01 00:00:00', '2019-12-31 00:00:00', '2019-11-07 11:25:02'),
(45, 'jk', '', 1, 0, 34, '2019-11-07 11:29:00', '2019-08-05 00:00:00', '2019-09-18 00:00:00', '2019-11-07 11:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `task_history`
--

CREATE TABLE `task_history` (
  `id_history` bigint(20) NOT NULL,
  `history_name` text NOT NULL,
  `id_creator` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_task` bigint(20) DEFAULT NULL,
  `data` int(11) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_history`
--

INSERT INTO `task_history` (`id_history`, `history_name`, `id_creator`, `id_project`, `id_task`, `data`, `date_creation`) VALUES
(1, 'Oki Priyadi membuat proyek \'Aktualisasi Latsar\'', 1, 18, NULL, 0, '2019-09-17 09:34:34'),
(2, 'Oki Priyadi membuat pekerjaan \'Mengidentifikasi bisnis proses yang berlaku di unit inspektorat dengan cara konsultasi kepada rekan kerja dan atasan \' yang ditugaskan kepada Oki Priyadi', 1, 18, 34, 0, '2019-09-17 09:36:09'),
(3, 'Oki Priyadi membuat pekerjaan \'Melakukan perancangan database \' yang ditugaskan kepada Oki Priyadi', 1, 18, 34, 0, '2019-09-17 09:36:55'),
(4, 'Oki Priyadi membuat pekerjaan \'Melakukan perencanaan antar muka pengguna\' yang ditugaskan kepada Oki Priyadi', 1, 18, 34, 0, '2019-09-17 09:37:25'),
(5, 'Oki Priyadi memindahkan tugas Oki Priyadi  \'Mengidentifikasi bisnis proses yang berlaku di unit inspektorat dengan cara konsultasi kepada rekan kerja dan atasan \' dari status To Do menjadi In Progress', 1, 18, 32, 0, '2019-09-17 09:38:39'),
(6, 'Oki Priyadi memindahkan tugas Oki Priyadi  \'Melakukan perancangan database \' dari status To Do menjadi Done', 1, 18, 33, 0, '2019-09-17 09:38:44'),
(7, 'Oki Priyadi memindahkan tugas Oki Priyadi  \'Melakukan perencanaan antar muka pengguna\' dari status To Do menjadi Done', 1, 18, 34, 0, '2019-09-17 09:38:47'),
(8, 'Oki Priyadi membuat pekerjaan \'Pembuatan Database\' yang ditugaskan kepada Oki Priyadi', 1, 18, 34, 0, '2019-09-17 09:39:19'),
(9, 'Oki Priyadi membuat pekerjaan \'Pembuatan Web Template\' yang ditugaskan kepada Oki Priyadi', 1, 18, 34, 0, '2019-09-17 09:43:38'),
(10, 'Oki Priyadi membuat pekerjaan \'Pengkodean/pemrograman aplikasi\' yang ditugaskan kepada Oki Priyadi', 1, 18, 34, 0, '2019-09-17 09:44:41'),
(11, 'Oki Priyadi membuat pekerjaan \'Membuat rancangan konsep layanan konsultasi berbasis web\' yang ditugaskan kepada Devinta', 1, 18, 34, 0, '2019-09-17 09:52:10'),
(12, 'Oki Priyadi membuat pekerjaan \'Melakukan konsultasi dengan mentor dan atasan mengenai konsep layanan konsultasi berbasis web\' yang ditugaskan kepada Devinta', 1, 18, 34, 0, '2019-09-17 09:52:43'),
(13, 'Oki Priyadi memindahkan tugas Devinta  \'Melakukan konsultasi dengan mentor dan atasan mengenai konsep layanan konsultasi berbasis web\' dari status To Do menjadi In Progress', 1, 18, 39, 0, '2019-09-17 09:52:50'),
(14, 'Oki Priyadi membuat pekerjaan \'Membuat list pertanyaan FAQ E-Consulting\' yang ditugaskan kepada Devinta', 1, 18, 36, 0, '2019-09-17 09:53:34'),
(15, 'Oki Priyadi membuat pekerjaan \'Membuat list peraturan atau dokumen terkait layanan konsultasi\' yang ditugaskan kepada Dian Ismiati', 1, 18, 34, 0, '2019-09-17 09:54:45'),
(16, 'Oki Priyadi membuat pekerjaan \'Melakukan konsultasi dengan mentor  mengenai mekanisme layanan konsultasi berbasis web beserta unsur pendukungnya\' yang ditugaskan kepada Dian Ismiati', 1, 18, 35, 0, '2019-09-17 09:55:14'),
(17, 'Oki Priyadi memindahkan tugas Oki Priyadi  \'Pembuatan Database\' dari status To Do menjadi In Progress', 1, 18, 35, 0, '2019-09-17 14:29:24'),
(18, 'Oki Priyadi menambah status Pending', 1, 18, NULL, 0, '2019-09-17 14:32:52'),
(19, 'Oki Priyadi membuat pekerjaan \'ada\' yang ditugaskan kepada Iref', 1, 18, 34, 0, '2019-11-07 11:23:42'),
(20, 'Oki Priyadi membuat pekerjaan \'Ada\' yang ditugaskan kepada Dani Triatmaja', 1, 18, 34, 0, '2019-11-07 11:25:02'),
(21, 'Oki Priyadi membuat pekerjaan \'jk\' yang ditugaskan kepada ', 1, 18, 34, 0, '2019-11-07 11:29:00'),
(22, 'Oki Priyadi membuat pekerjaan \'tug\' yang ditugaskan kepada Array, Array, Array, ', 1, 18, 34, 0, '2019-11-07 14:45:52'),
(23, 'Oki Priyadi membuat pekerjaan \'as\' yang ditugaskan kepada Dani Triatmaja, Devinta, ', 1, 18, 34, 0, '2019-11-07 14:46:22');

-- --------------------------------------------------------

--
-- Table structure for table `task_lampiran`
--

CREATE TABLE `task_lampiran` (
  `id_task_lampiran` int(11) NOT NULL,
  `link` varchar(800) NOT NULL,
  `id_task_detail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_lampiran`
--

INSERT INTO `task_lampiran` (`id_task_lampiran`, `link`, `id_task_detail`) VALUES
(6, 'C:/xampp/htdocs/etag/assets/task/id_detail_33/122ce369b05e7ba24732661d888b74e1.pdf', 33),
(7, 'C:/xampp/htdocs/etag/assets/task/id_detail_35/c3c30594f61be97d9df56f0d74274996.pdf', 35),
(12, 'assets/task/id_detail_45/219b519a9e6625eb8b1ed035fd3edf60.pdf', 45);

-- --------------------------------------------------------

--
-- Table structure for table `task_lampiran_link`
--

CREATE TABLE `task_lampiran_link` (
  `id_task_lampiran_link` int(11) NOT NULL,
  `link` varchar(800) NOT NULL,
  `id_task_detail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_lampiran_link`
--

INSERT INTO `task_lampiran_link` (`id_task_lampiran_link`, `link`, `id_task_detail`) VALUES
(2, 'urlz', 33);

-- --------------------------------------------------------

--
-- Table structure for table `task_project`
--

CREATE TABLE `task_project` (
  `id_project` bigint(20) NOT NULL,
  `project_name` text NOT NULL,
  `status` text NOT NULL COMMENT 'Status proyek tersebut masih aktif, sudah selesai, pending atau belum dikerjakan',
  `id_creator` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_project`
--

INSERT INTO `task_project` (`id_project`, `project_name`, `status`, `id_creator`, `created_at`, `start_date`, `end_date`) VALUES
(12, 'Manajemen Resiko', '', 1, '2019-09-10 21:54:12', '2019-09-10 00:00:00', '2019-09-10 00:00:00'),
(13, 'Evaluasi RB', '', 1, '2019-09-10 21:54:56', '2019-09-10 00:00:00', '2019-09-30 00:00:00'),
(14, 'Telaah Sejawat', '', 1, '2019-09-11 09:32:32', '2019-09-11 00:00:00', '2019-10-10 00:00:00'),
(15, 'Evaluasi Sakip', '', 1, '2019-09-12 09:01:14', '2019-09-01 00:00:00', '2019-09-14 00:00:00'),
(16, 'Evaluasi terperinci pengelolaan keuangan unit kerja di lingkungan Kementerian PANRB', '', 1, '2019-09-12 09:12:32', '2019-08-08 00:00:00', '2019-08-30 00:00:00'),
(17, 'Desain', '', 1, '2019-09-12 09:28:23', '2019-09-11 00:00:00', '2019-12-31 00:00:00'),
(18, 'Aktualisasi Latsar', '', 1, '2019-09-17 09:34:34', '2019-08-05 00:00:00', '2019-09-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `task_state`
--

CREATE TABLE `task_state` (
  `id_state` int(11) NOT NULL,
  `state` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_state`
--

INSERT INTO `task_state` (`id_state`, `state`) VALUES
(1, 'To Do'),
(2, 'In Progress'),
(3, 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `task_status`
--

CREATE TABLE `task_status` (
  `id_status` int(11) NOT NULL,
  `status_name` varchar(55) NOT NULL,
  `id_project` bigint(20) NOT NULL,
  `id_state` int(11) NOT NULL,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_status`
--

INSERT INTO `task_status` (`id_status`, `status_name`, `id_project`, `id_state`, `deskripsi`) VALUES
(13, 'To Do', 11, 1, NULL),
(14, 'In Progress', 11, 2, NULL),
(15, 'Done', 11, 3, NULL),
(16, 'To Do', 12, 1, NULL),
(17, 'In Progress', 12, 2, NULL),
(18, 'Done', 12, 3, NULL),
(19, 'To Do', 13, 1, NULL),
(20, 'In Progress', 13, 2, NULL),
(21, 'Done', 13, 3, NULL),
(22, 'To Do', 14, 1, NULL),
(23, 'In Progress', 14, 2, NULL),
(24, 'Done', 14, 3, NULL),
(25, 'To Do', 15, 1, NULL),
(26, 'In Progress', 15, 2, NULL),
(27, 'Done', 15, 3, NULL),
(28, 'To Do', 16, 1, NULL),
(29, 'In Progress', 16, 2, NULL),
(30, 'Done', 16, 3, NULL),
(31, 'To Do', 17, 1, NULL),
(32, 'In Progress', 17, 2, NULL),
(33, 'Done', 17, 3, NULL),
(34, 'To Do', 18, 1, NULL),
(35, 'In Progress', 18, 2, NULL),
(36, 'Done', 18, 3, NULL),
(37, 'Pending', 18, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `nama` text NOT NULL,
  `nip` varchar(19) NOT NULL,
  `role` varchar(15) NOT NULL,
  `jabatan` text NOT NULL,
  `unit_kerja` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `foto` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nama`, `nip`, `role`, `jabatan`, `unit_kerja`, `username`, `password`, `foto`) VALUES
(1, 'Oki Priyadi', '1234', 'insp', 'Analis Sistem Informasi', 'inspektorat', 'oki.priyadi', '8557A0E3223DCB09CB3AD2BF32AC0C2C', 'oki2.jpg'),
(2, 'Bagas', '1234', 'insp', 'pranata ahli', 'inspektorat', 'bagas', '8557A0E3223DCB09CB3AD2BF32AC0C2C', 'bagas.jpg'),
(3, 'Dani Triatmaja', '12345', 'insp', '-', 'inpektorat', 'dani', '8557A0E3223DCB09CB3AD2BF32AC0C2C', 'dani.jpeg'),
(4, 'Devinta', '12345', 'insp', 'jabatan', 'inspektorat', 'devinta', '8557A0E3223DCB09CB3AD2BF32AC0C2C', 'devinta.jpg'),
(5, 'Dian Ismiati', '12345', 'insp', '-', 'inspektorat', 'dian', '8557A0E3223DCB09CB3AD2BF32AC0C2C', 'dian2.jpg'),
(6, 'Iref', '1234', 'insp', 'pranata ahli', 'inspektorat', 'iref', '8557A0E3223DCB09CB3AD2BF32AC0C2C', 'refitri.jpg'),
(7, 'Naomi', '1234', 'insp', 'pranata ahli', 'inspektorat', 'naomi', '8557A0E3223DCB09CB3AD2BF32AC0C2C', 'naomi.jpg'),
(8, 'Aji', '1234', 'insp', 'pranata ahli', 'inspektorat', 'aji', '8557A0E3223DCB09CB3AD2BF32AC0C2C', 'aji22.jpg'),
(9, 'Azizah', '1234', 'insp', 'pranata ahli', 'inspektorat', 'azizah', '8557A0E3223DCB09CB3AD2BF32AC0C2C', 'azizah.jpg'),
(10, 'Amsori', '1234', 'insp', 'pranata ahli', 'inspektorat', 'amsori', '8557A0E3223DCB09CB3AD2BF32AC0C2C', 'amsori.jpg'),
(12, 'Luqman Fikri', '1234', 'insp', 'pranata ahli', 'inspektorat', 'lukman', '8557A0E3223DCB09CB3AD2BF32AC0C2C', 'lukman.jpg'),
(13, 'Geni Indah', '1234', 'insp', 'pranata ahli', 'inspektorat', 'geni', '8557A0E3223DCB09CB3AD2BF32AC0C2C', 'geni.jpg'),
(14, 'Fikri Azardy', '1234', 'insp', 'jabatan', 'inspektorat', 'fikri', '8557A0E3223DCB09CB3AD2BF32AC0C2C', 'fikri2.jpg'),
(15, 'Budi Prawira, S.E.', '12345', 'inspektur', 'Inspektur', 'inspektorat', 'inspektur', '8557A0E3223DCB09CB3AD2BF32AC0C2C', NULL),
(16, 'Hiasinta', '12345', 'insp', 'jabatan', 'inspektorat', 'hiasinta', '8557A0E3223DCB09CB3AD2BF32AC0C2C', 'sinta.jpg'),
(18, 'Hesti', '12345', 'insp', 'jabatan', 'inspektorat', 'hesti', '8557A0E3223DCB09CB3AD2BF32AC0C2C', 'hesti.jpg'),
(20, 'Vioni Abigail', '12345', 'insp', '-', 'inspektorat', 'vioni', '8557A0E3223DCB09CB3AD2BF32AC0C2C', 'vioni.jpeg'),
(21, 'Widayanti', '12345', 'insp', '-', 'inspektorat', 'widayanti', '8557A0E3223DCB09CB3AD2BF32AC0C2C', 'widay.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user_task_detail`
--

CREATE TABLE `user_task_detail` (
  `id_user_task_detail` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_task_detail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_task_detail`
--

INSERT INTO `user_task_detail` (`id_user_task_detail`, `id_user`, `id_task_detail`) VALUES
(3, 8, 33),
(4, 1, 45),
(5, 2, 45),
(6, 2, 46),
(7, 3, 46),
(8, 4, 46),
(9, 3, 47),
(10, 4, 47);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indexes for table `pilihan`
--
ALTER TABLE `pilihan`
  ADD PRIMARY KEY (`id_pilihan`);

--
-- Indexes for table `survei`
--
ALTER TABLE `survei`
  ADD PRIMARY KEY (`id_survei`);

--
-- Indexes for table `task_detail`
--
ALTER TABLE `task_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `task_history`
--
ALTER TABLE `task_history`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `task_lampiran`
--
ALTER TABLE `task_lampiran`
  ADD PRIMARY KEY (`id_task_lampiran`);

--
-- Indexes for table `task_lampiran_link`
--
ALTER TABLE `task_lampiran_link`
  ADD PRIMARY KEY (`id_task_lampiran_link`);

--
-- Indexes for table `task_project`
--
ALTER TABLE `task_project`
  ADD PRIMARY KEY (`id_project`);

--
-- Indexes for table `task_state`
--
ALTER TABLE `task_state`
  ADD PRIMARY KEY (`id_state`);

--
-- Indexes for table `task_status`
--
ALTER TABLE `task_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_task_detail`
--
ALTER TABLE `user_task_detail`
  ADD PRIMARY KEY (`id_user_task_detail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pilihan`
--
ALTER TABLE `pilihan`
  MODIFY `id_pilihan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survei`
--
ALTER TABLE `survei`
  MODIFY `id_survei` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_detail`
--
ALTER TABLE `task_detail`
  MODIFY `id_detail` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `task_history`
--
ALTER TABLE `task_history`
  MODIFY `id_history` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `task_lampiran`
--
ALTER TABLE `task_lampiran`
  MODIFY `id_task_lampiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `task_lampiran_link`
--
ALTER TABLE `task_lampiran_link`
  MODIFY `id_task_lampiran_link` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `task_project`
--
ALTER TABLE `task_project`
  MODIFY `id_project` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `task_state`
--
ALTER TABLE `task_state`
  MODIFY `id_state` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `task_status`
--
ALTER TABLE `task_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_task_detail`
--
ALTER TABLE `user_task_detail`
  MODIFY `id_user_task_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
