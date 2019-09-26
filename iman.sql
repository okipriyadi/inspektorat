-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Sep 2019 pada 04.46
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

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
-- Struktur dari tabel `columns`
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
-- Struktur dari tabel `task_detail`
--

CREATE TABLE `task_detail` (
  `id_detail` bigint(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `id_creator` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `task_detail`
--

INSERT INTO `task_detail` (`id_detail`, `title`, `description`, `id_creator`, `id_status`, `created_at`, `start_date`, `end_date`) VALUES
(1, 'Tutorial CRUD', 'CRUD Job for the Tutorial functionality', 0, 1, '2018-07-12 18:45:01', NULL, NULL),
(2, 'Listing with Filtering and Pagination', 'Tutorial listing with search filter option and pagination links', 0, 1, '2018-07-12 18:44:54', NULL, NULL),
(3, 'Sorting and Change Ordering', 'Enabling dynamic sorting and change the list order with AJAX  ', 0, 1, '2018-07-12 18:44:58', NULL, NULL),
(4, 'Client-side and server-side Validation', 'Validating user data with client and the server side validation mechanism.', 0, 1, '2018-07-12 18:44:56', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `task_history`
--

CREATE TABLE `task_history` (
  `id_history` bigint(20) NOT NULL,
  `history_name` text NOT NULL,
  `id_creator` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_task` bigint(20) NOT NULL,
  `data` int(11) NOT NULL,
  `date_creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `task_project`
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
-- Dumping data untuk tabel `task_project`
--

INSERT INTO `task_project` (`id_project`, `project_name`, `status`, `id_creator`, `created_at`, `start_date`, `end_date`) VALUES
(1, 'coba', '', 0, '2019-08-27 23:22:41', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `task_state`
--

CREATE TABLE `task_state` (
  `id_state` int(11) NOT NULL,
  `state` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `task_state`
--

INSERT INTO `task_state` (`id_state`, `state`) VALUES
(1, 'To Do'),
(2, 'In Progress'),
(3, 'Done');

-- --------------------------------------------------------

--
-- Struktur dari tabel `task_status`
--

CREATE TABLE `task_status` (
  `id_status` int(11) NOT NULL,
  `status_name` varchar(55) NOT NULL,
  `id_project` bigint(20) NOT NULL,
  `id_state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `task_status`
--

INSERT INTO `task_status` (`id_status`, `status_name`, `id_project`, `id_state`) VALUES
(1, 'New', 1, 1),
(2, 'In Progress', 1, 2),
(3, 'Pending', 1, 2),
(4, 'Done', 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `task_detail`
--
ALTER TABLE `task_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `task_history`
--
ALTER TABLE `task_history`
  ADD PRIMARY KEY (`id_history`);

--
-- Indeks untuk tabel `task_project`
--
ALTER TABLE `task_project`
  ADD PRIMARY KEY (`id_project`);

--
-- Indeks untuk tabel `task_state`
--
ALTER TABLE `task_state`
  ADD PRIMARY KEY (`id_state`);

--
-- Indeks untuk tabel `task_status`
--
ALTER TABLE `task_status`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `task_detail`
--
ALTER TABLE `task_detail`
  MODIFY `id_detail` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `task_history`
--
ALTER TABLE `task_history`
  MODIFY `id_history` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `task_project`
--
ALTER TABLE `task_project`
  MODIFY `id_project` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `task_state`
--
ALTER TABLE `task_state`
  MODIFY `id_state` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `task_status`
--
ALTER TABLE `task_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
