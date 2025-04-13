-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2025 at 06:10 AM
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
  `score` int(11) NOT NULL CHECK (`score` in (0,1,2))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'Q1', 'Sering mengeluh sakit kepala, sakit perut atau mual.', ''),
(2, 'Q2', 'Sering merasa khawatir atau cemas.', ''),
(3, 'Q3', 'Mudah merasa takut atau panik.', ''),
(4, 'Q4', 'Sering terlihat sedih atau murung.', ''),
(5, 'Q5', 'Mudah menangis tanpa alasan yang jelas.', ''),
(6, 'Q6', 'Sering bertindak tanpa berpikir.', ''),
(7, 'Q7', 'Sering bertengkar dengan anak lain atau orang dewasa.', ''),
(8, 'Q8', 'Mudah marah dan kehilangan kontrol.', ''),
(9, 'Q9', 'Tidak patuh terhadap aturan.', ''),
(10, 'Q10', 'Sering menyalahkan orang lain atas kesalahan sendiri.', ''),
(11, 'Q11', 'Sulit untuk duduk diam.', ''),
(12, 'Q12', 'Sering gelisah atau tidak bisa diam.', ''),
(13, 'Q13', 'Kesulitan untuk konsentrasi.', ''),
(14, 'Q14', 'Sering melakukan hal yang berisiko.', ''),
(15, 'Q15', 'Sering mudah teralihkan perhatiannya.', ''),
(16, 'Q16', 'Lebih suka sendiri daripada bermain dengan orang lain.', ''),
(17, 'Q17', 'Sering merasa tidak memiliki teman.', ''),
(18, 'Q18', 'Sering merasa ditolak oleh kelompok sebaya.', ''),
(19, 'Q19', 'Kesulitan menjalin pertemanan.', ''),
(20, 'Q20', 'Tidak nyaman berada di sekitar orang lain.', ''),
(21, 'Q21', 'Mudah membantu teman yang sedang kesulitan.', ''),
(22, 'Q22', 'Suka berbagi dengan orang lain.', ''),
(23, 'Q23', 'Memiliki empati terhadap perasaan orang lain.', ''),
(24, 'Q24', 'Senang bekerja sama dalam kelompok.', ''),
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','responden') NOT NULL,
  `umur` int(11) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `question_id` (`question_id`);

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
