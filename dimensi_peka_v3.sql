-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2025 at 06:24 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dimensi_peka`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `question_id` bigint(20) NOT NULL,
  `option_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `question_id`, `option_id`) VALUES
(177, 2, 1, 1),
(178, 2, 2, 5),
(179, 2, 3, 9),
(180, 2, 4, 12),
(181, 2, 5, 14),
(182, 2, 6, 16),
(183, 2, 7, 19),
(184, 2, 8, 23),
(185, 2, 9, 27),
(186, 2, 10, 30),
(187, 2, 11, 32),
(188, 2, 12, 35),
(189, 2, 13, 37),
(190, 2, 14, 40),
(191, 2, 15, 44),
(192, 2, 16, 47),
(193, 2, 17, 51),
(194, 2, 18, 54),
(195, 2, 19, 55),
(196, 2, 20, 58),
(197, 2, 21, 62),
(198, 2, 22, 66),
(199, 2, 23, 68),
(200, 2, 24, 70),
(201, 2, 25, 74);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `text` varchar(100) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_id`, `text`, `score`) VALUES
(1, 1, 'Tidak Benar', 0),
(2, 1, 'Agak Benar', 1),
(3, 1, 'Selalu Benar', 2),
(4, 2, 'Tidak Benar', 0),
(5, 2, 'Agak Benar', 1),
(6, 2, 'Selalu Benar', 2),
(7, 3, 'Tidak Benar', 0),
(8, 3, 'Agak Benar', 1),
(9, 3, 'Selalu Benar', 2),
(10, 4, 'Tidak Benar', 0),
(11, 4, 'Agak Benar', 1),
(12, 4, 'Selalu Benar', 2),
(13, 5, 'Tidak Benar', 0),
(14, 5, 'Agak Benar', 1),
(15, 5, 'Selalu Benar', 2),
(16, 6, 'Tidak Benar', 0),
(17, 6, 'Agak Benar', 1),
(18, 6, 'Selalu Benar', 2),
(19, 7, 'Tidak Benar', 2),
(20, 7, 'Agak Benar', 1),
(21, 7, 'Selalu Benar', 0),
(22, 8, 'Tidak Benar', 0),
(23, 8, 'Agak Benar', 1),
(24, 8, 'Selalu Benar', 2),
(25, 9, 'Tidak Benar', 0),
(26, 9, 'Agak Benar', 1),
(27, 9, 'Selalu Benar', 2),
(28, 10, 'Tidak Benar', 0),
(29, 10, 'Agak Benar', 1),
(30, 10, 'Selalu Benar', 2),
(31, 11, 'Tidak Benar', 2),
(32, 11, 'Agak Benar', 1),
(33, 11, 'Selalu Benar', 0),
(34, 12, 'Tidak Benar', 0),
(35, 12, 'Agak Benar', 1),
(36, 12, 'Selalu Benar', 2),
(37, 13, 'Tidak Benar', 0),
(38, 13, 'Agak Benar', 1),
(39, 13, 'Selalu Benar', 2),
(40, 14, 'Tidak Benar', 2),
(41, 14, 'Agak Benar', 1),
(42, 14, 'Selalu Benar', 0),
(43, 15, 'Tidak Benar', 0),
(44, 15, 'Agak Benar', 1),
(45, 15, 'Selalu Benar', 2),
(46, 16, 'Tidak Benar', 0),
(47, 16, 'Agak Benar', 1),
(48, 16, 'Selalu Benar', 2),
(49, 17, 'Tidak Benar', 0),
(50, 17, 'Agak Benar', 1),
(51, 17, 'Selalu Benar', 2),
(52, 18, 'Tidak Benar', 0),
(53, 18, 'Agak Benar', 1),
(54, 18, 'Selalu Benar', 2),
(55, 19, 'Tidak Benar', 0),
(56, 19, 'Agak Benar', 1),
(57, 19, 'Selalu Benar', 2),
(58, 20, 'Tidak Benar', 0),
(59, 20, 'Agak Benar', 1),
(60, 20, 'Selalu Benar', 2),
(61, 21, 'Tidak Benar', 2),
(62, 21, 'Agak Benar', 1),
(63, 21, 'Selalu Benar', 0),
(64, 22, 'Tidak Benar', 0),
(65, 22, 'Agak Benar', 1),
(66, 22, 'Selalu Benar', 2),
(67, 23, 'Tidak Benar', 0),
(68, 23, 'Agak Benar', 1),
(69, 23, 'Selalu Benar', 2),
(70, 24, 'Tidak Benar', 0),
(71, 24, 'Agak Benar', 1),
(72, 24, 'Selalu Benar', 2),
(73, 25, 'Tidak Benar', 2),
(74, 25, 'Agak Benar', 1),
(75, 25, 'Selalu Benar', 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `pertanyaan` text NOT NULL,
  `kategori` enum('E','P','H','C','Pro') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `kode`, `pertanyaan`, `kategori`) VALUES
(1, 'Q1', 'Sering mengeluh sakit kepala, sakit perut atau mual.', 'Pro'),
(2, 'Q2', 'Sering merasa khawatir atau cemas.', 'E'),
(3, 'Q3', 'Mudah merasa takut atau panik.', 'H'),
(4, 'Q4', 'Sering terlihat sedih atau murung.', 'Pro'),
(5, 'Q5', 'Mudah menangis tanpa alasan yang jelas.', 'C'),
(6, 'Q6', 'Sering bertindak tanpa berpikir.', 'Pro'),
(7, 'Q7', 'Sering bertengkar dengan anak lain atau orang dewasa.', 'H'),
(8, 'Q8', 'Mudah marah dan kehilangan kontrol.', 'E'),
(9, 'Q9', 'Tidak patuh terhadap aturan.', 'P'),
(10, 'Q10', 'Sering menyalahkan orang lain atas kesalahan sendiri.', 'H'),
(11, 'Q11', 'Sulit untuk duduk diam.', 'C'),
(12, 'Q12', 'Sering gelisah atau tidak bisa diam.', 'C'),
(13, 'Q13', 'Kesulitan untuk konsentrasi.', 'Pro'),
(14, 'Q14', 'Sering melakukan hal yang berisiko.', 'E'),
(15, 'Q15', 'Sering mudah teralihkan perhatiannya.', 'P'),
(16, 'Q16', 'Lebih suka sendiri daripada bermain dengan orang lain.', 'Pro'),
(17, 'Q17', 'Sering merasa tidak memiliki teman.', 'E'),
(18, 'Q18', 'Sering merasa ditolak oleh kelompok sebaya.', 'C'),
(19, 'Q19', 'Kesulitan menjalin pertemanan.', 'Pro'),
(20, 'Q20', 'Tidak nyaman berada di sekitar orang lain.', 'E'),
(21, 'Q21', 'Mudah membantu teman yang sedang kesulitan.', 'Pro'),
(22, 'Q22', 'Suka berbagi dengan orang lain.', 'E'),
(23, 'Q23', 'Memiliki empati terhadap perasaan orang lain.', 'C'),
(24, 'Q24', 'Senang bekerja sama dalam kelompok.', 'H'),
(25, 'Q25', 'Sering memuji atau menyemangati orang lain.', '');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `emosional` int(11) DEFAULT 0,
  `perilaku` int(11) DEFAULT 0,
  `hiperaktif` int(11) DEFAULT 0,
  `teman` int(11) DEFAULT 0,
  `prosocial` int(11) DEFAULT 0,
  `total` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `skor_es` int(11) DEFAULT NULL,
  `hasil_es` varchar(20) DEFAULT NULL,
  `skor_cp` int(11) DEFAULT NULL,
  `hasil_cp` varchar(20) DEFAULT NULL,
  `skor_h` int(11) DEFAULT NULL,
  `hasil_h` varchar(20) DEFAULT NULL,
  `skor_p` int(11) DEFAULT NULL,
  `hasil_p` varchar(20) DEFAULT NULL,
  `skor_pro` int(11) DEFAULT NULL,
  `hasil_pro` varchar(20) DEFAULT NULL,
  `total_kesulitan` int(11) DEFAULT NULL,
  `hasil_total` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id`, `user_id`, `tanggal`, `skor_es`, `hasil_es`, `skor_cp`, `hasil_cp`, `skor_h`, `hasil_h`, `skor_p`, `hasil_p`, `skor_pro`, `hasil_pro`, `total_kesulitan`, `hasil_total`, `created_at`, `updated_at`) VALUES
(1, 2, '2025-04-19', 8, 'ABNORMAL', 6, 'BORDERLINE', 6, 'BORDERLINE', 3, 'NORMAL', 4, 'ABNORMAL', 23, 'ABNORMAL', '2025-04-19 08:06:32', '2025-04-19 08:06:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','responden') NOT NULL,
  `umur` int(11) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kelas` varchar(11) DEFAULT NULL,
  `sekolah` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `umur`, `alamat`, `kelas`, `sekolah`, `jenis_kelamin`, `created_at`) VALUES
(1, 'admin1', 'admin@gmail.com', '', 'admin', 12, '', '', '', NULL, '2025-04-13 17:10:59'),
(2, 'cahyo', 'ok@admin.com', '$2y$12$Wn9/uH33QI45Jsmd0p21XueF8eSzR/xffvsBdTCxFMOjUhBXtJdd.', 'responden', 34, 'sadasd', '7g', 'SMK K KALIMANTAN', NULL, '2025-04-15 09:31:45'),
(3, 'andi23', 'pimpinan@gmail.com', '$2y$12$3yaVyMenFDzzvJ91uMST3eA7j.0iCGkwSO11SVP7Y4DE4Nngto1Oy', 'admin', NULL, NULL, NULL, NULL, NULL, '2025-04-16 11:05:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `to_option` (`option_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `to_option` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
