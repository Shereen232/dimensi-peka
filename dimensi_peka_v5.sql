-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2025 at 09:53 AM
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
(176, 18, 1, 3),
(177, 18, 2, 4),
(178, 18, 3, 8),
(179, 18, 4, 12),
(180, 18, 5, 13),
(181, 18, 6, 17),
(182, 18, 7, 19),
(183, 18, 8, 24),
(184, 18, 9, 26),
(185, 18, 10, 29),
(186, 18, 11, 31),
(187, 18, 12, 34),
(188, 18, 13, 39),
(189, 18, 14, 40),
(190, 18, 15, 43),
(191, 18, 16, 47),
(192, 18, 17, 50),
(193, 18, 18, 53),
(194, 18, 19, 56),
(195, 18, 20, 59),
(196, 18, 21, 62),
(197, 18, 22, 65),
(198, 18, 23, 68),
(199, 18, 24, 72),
(200, 18, 25, 75);

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
(1, 'Q1', 'Saya berusaha baik kepada orang lain. Saya peduli dengan perasaan mereka.', 'Pro'),
(2, 'Q2', 'Saya gelisah, saya tidak dapat diam untuk waktu lama.', 'H'),
(3, 'Q3', 'Saya sering sakit kepala, sakit perut atau macam-macam sakit lainnya.', 'E'),
(4, 'Q4', 'Kalau saya memiliki mainan, CD, atau makanan, Saya biasanya berbagi dengan orang lain.', 'Pro'),
(5, 'Q5', 'Saya menjadi sangat marah dan sering tidak dapat mengendalikan kemarahan saya.', 'C'),
(6, 'Q6', 'Saya lebih suka sendiri daripada bersama dengan orang yang seusiaku.', 'P'),
(7, 'Q7', 'Saya biasanya melakukan apa yang diperintahkan oleh orang lain.', 'C'),
(8, 'Q8', 'Saya banyak merasa cemas atau khawatir terhadap apapun.', 'E'),
(9, 'Q9', 'Saya selalu siap menolong jika seseorang terluka, kecewa atau merasa sakit.', 'Pro'),
(10, 'Q10', 'Bila sedang gelisah atau cemas badan saya sering bergerak-gerak tanpa saya sadari.', 'H'),
(11, 'Q11', 'Saya mempunyai satu orang teman baik atau lebih.', 'P'),
(12, 'Q12', 'Saya sering bertengkar dengan orang lain. Saya dapat memaksa orang lain melakukan apa yang saya inginkan.', 'C'),
(13, 'Q13', 'Saya sering merasa tidak bahagia, sedih atau menangis.', 'E'),
(14, 'Q14', 'Orang lain seusia saya umumnya menyukai saya.', 'P'),
(15, 'Q15', 'Perhatian saya mudah teralih, saya sulit untuk memusatkan perhatian pada apapun.', 'H'),
(16, 'Q16', 'Saya merasa gugup dalam situasi baru, saya mudah kehilangan rasa percaya diri.', 'E'),
(17, 'Q17', 'Saya bersikap baik terhadap anak-anak yang lebih muda dari saya.', 'Pro'),
(18, 'Q18', 'Saya sering dituduh berbohong atau berbuat curang.', 'C'),
(19, 'Q19', 'Saya sering diganggu atau dipermainkan oleh anak-anak atau remaja lainnya.', 'P'),
(20, 'Q20', 'Saya sering menawarkan diri untuk membantu orang lain (orang tua, guru, anak-anak).', 'Pro'),
(21, 'Q21', 'Saya berpikir terlebih dulu akibat yang akan terjadi, sebelum berbuat atau melakukan sesuatu.', 'H'),
(22, 'Q22', 'Saya mengambil barang yang bukan milik saya dari rumah, sekolah atau dari mana saja.', 'C'),
(23, 'Q23', 'Saya lebih mudah berteman dengan orang dewasa daripada dengan orang seusia saya.', 'P'),
(24, 'Q24', 'Banyak yang saya takuti, saya mudah menjadi takut.', 'E'),
(25, 'Q25', 'Saya menyelesaikan pekerjaan yang sedang saya lakukan. Saya mempunyai perhatian yang baik terhadap apapun.', 'H');

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
(8, 18, '2025-06-22', 8, 'ABNORMAL', 4, 'BORDERLINE', 2, 'NORMAL', 7, 'ABNORMAL', 7, 'NORMAL', 21, 'ABNORMAL', '2025-06-21 22:45:52', '2025-06-21 22:45:52'),
(9, 1001, '2025-06-24', 6, 'BORDERLINE', 5, 'BORDERLINE', 6, 'BORDERLINE', 4, 'BORDERLINE', 5, 'BORDERLINE', 18, 'BORDERLINE', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(10, 1002, '2025-06-24', 4, 'NORMAL', 2, 'NORMAL', 3, 'NORMAL', 2, 'NORMAL', 7, 'NORMAL', 10, 'NORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(11, 1003, '2025-06-24', 8, 'ABNORMAL', 11, 'ABNORMAL', 7, 'ABNORMAL', 7, 'ABNORMAL', 3, 'ABNORMAL', 25, 'ABNORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(12, 1004, '2025-06-24', 5, 'NORMAL', 7, 'BORDERLINE', 5, 'NORMAL', 5, 'BORDERLINE', 6, 'NORMAL', 15, 'NORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(13, 1005, '2025-06-24', 7, 'ABNORMAL', 9, 'BORDERLINE', 7, 'ABNORMAL', 6, 'ABNORMAL', 4, 'ABNORMAL', 20, 'ABNORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(14, 1006, '2025-06-24', 3, 'NORMAL', 3, 'NORMAL', 2, 'NORMAL', 2, 'NORMAL', 8, 'NORMAL', 10, 'NORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(15, 1007, '2025-06-24', 6, 'BORDERLINE', 6, 'BORDERLINE', 6, 'BORDERLINE', 4, 'BORDERLINE', 5, 'BORDERLINE', 19, 'BORDERLINE', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(16, 1008, '2025-06-24', 9, 'ABNORMAL', 12, 'ABNORMAL', 8, 'ABNORMAL', 8, 'ABNORMAL', 2, 'ABNORMAL', 28, 'ABNORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(17, 1009, '2025-06-24', 5, 'NORMAL', 4, 'BORDERLINE', 5, 'NORMAL', 3, 'NORMAL', 7, 'NORMAL', 14, 'NORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(18, 1010, '2025-06-24', 7, 'ABNORMAL', 8, 'BORDERLINE', 7, 'ABNORMAL', 6, 'ABNORMAL', 3, 'ABNORMAL', 21, 'ABNORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(19, 1011, '2025-06-24', 2, 'NORMAL', 1, 'NORMAL', 1, 'NORMAL', 1, 'NORMAL', 9, 'NORMAL', 7, 'NORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(20, 1012, '2025-06-24', 6, 'BORDERLINE', 5, 'BORDERLINE', 6, 'BORDERLINE', 4, 'BORDERLINE', 5, 'BORDERLINE', 17, 'BORDERLINE', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(21, 1013, '2025-06-24', 8, 'ABNORMAL', 10, 'ABNORMAL', 7, 'ABNORMAL', 7, 'ABNORMAL', 4, 'ABNORMAL', 26, 'ABNORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(22, 1014, '2025-06-24', 4, 'NORMAL', 3, 'NORMAL', 4, 'NORMAL', 3, 'NORMAL', 6, 'NORMAL', 12, 'NORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(23, 1015, '2025-06-24', 7, 'ABNORMAL', 9, 'BORDERLINE', 7, 'ABNORMAL', 6, 'ABNORMAL', 3, 'ABNORMAL', 20, 'ABNORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(24, 1016, '2025-06-24', 5, 'NORMAL', 2, 'NORMAL', 5, 'NORMAL', 2, 'NORMAL', 7, 'NORMAL', 13, 'NORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(25, 1017, '2025-06-24', 6, 'BORDERLINE', 6, 'BORDERLINE', 6, 'BORDERLINE', 4, 'BORDERLINE', 5, 'BORDERLINE', 18, 'BORDERLINE', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(26, 1018, '2025-06-24', 8, 'ABNORMAL', 11, 'ABNORMAL', 7, 'ABNORMAL', 7, 'ABNORMAL', 2, 'ABNORMAL', 27, 'ABNORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(27, 1019, '2025-06-24', 3, 'NORMAL', 4, 'BORDERLINE', 3, 'NORMAL', 3, 'NORMAL', 8, 'NORMAL', 13, 'NORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(28, 1020, '2025-06-24', 7, 'ABNORMAL', 8, 'BORDERLINE', 7, 'ABNORMAL', 6, 'ABNORMAL', 3, 'ABNORMAL', 22, 'ABNORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(29, 1021, '2025-06-24', 5, 'NORMAL', 2, 'NORMAL', 5, 'NORMAL', 2, 'NORMAL', 7, 'NORMAL', 14, 'NORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(30, 1022, '2025-06-24', 6, 'BORDERLINE', 5, 'BORDERLINE', 6, 'BORDERLINE', 4, 'BORDERLINE', 5, 'BORDERLINE', 16, 'BORDERLINE', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(31, 1023, '2025-06-24', 9, 'ABNORMAL', 12, 'ABNORMAL', 8, 'ABNORMAL', 8, 'ABNORMAL', 2, 'ABNORMAL', 29, 'ABNORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(32, 1024, '2025-06-24', 4, 'NORMAL', 3, 'NORMAL', 4, 'NORMAL', 3, 'NORMAL', 6, 'NORMAL', 11, 'NORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(33, 1025, '2025-06-24', 7, 'ABNORMAL', 9, 'BORDERLINE', 7, 'ABNORMAL', 6, 'ABNORMAL', 3, 'ABNORMAL', 23, 'ABNORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(34, 1026, '2025-06-24', 2, 'NORMAL', 1, 'NORMAL', 1, 'NORMAL', 1, 'NORMAL', 9, 'NORMAL', 8, 'NORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(35, 1027, '2025-06-24', 6, 'BORDERLINE', 5, 'BORDERLINE', 6, 'BORDERLINE', 4, 'BORDERLINE', 5, 'BORDERLINE', 17, 'BORDERLINE', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(36, 1028, '2025-06-24', 8, 'ABNORMAL', 10, 'ABNORMAL', 7, 'ABNORMAL', 7, 'ABNORMAL', 4, 'ABNORMAL', 25, 'ABNORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(37, 1029, '2025-06-24', 5, 'NORMAL', 4, 'BORDERLINE', 5, 'NORMAL', 3, 'NORMAL', 7, 'NORMAL', 15, 'NORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(38, 1030, '2025-06-24', 7, 'ABNORMAL', 8, 'BORDERLINE', 7, 'ABNORMAL', 6, 'ABNORMAL', 3, 'ABNORMAL', 24, 'ABNORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(39, 1031, '2025-06-24', 3, 'NORMAL', 2, 'NORMAL', 2, 'NORMAL', 2, 'NORMAL', 8, 'NORMAL', 10, 'NORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(40, 1032, '2025-06-24', 6, 'BORDERLINE', 6, 'BORDERLINE', 6, 'BORDERLINE', 4, 'BORDERLINE', 5, 'BORDERLINE', 19, 'BORDERLINE', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(41, 1033, '2025-06-24', 9, 'ABNORMAL', 11, 'ABNORMAL', 8, 'ABNORMAL', 8, 'ABNORMAL', 2, 'ABNORMAL', 28, 'ABNORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(42, 1034, '2025-06-24', 4, 'NORMAL', 3, 'NORMAL', 4, 'NORMAL', 3, 'NORMAL', 6, 'NORMAL', 12, 'NORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(43, 1035, '2025-06-24', 7, 'ABNORMAL', 9, 'BORDERLINE', 7, 'ABNORMAL', 6, 'ABNORMAL', 3, 'ABNORMAL', 21, 'ABNORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(44, 1036, '2025-06-24', 5, 'NORMAL', 2, 'NORMAL', 5, 'NORMAL', 2, 'NORMAL', 7, 'NORMAL', 13, 'NORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(45, 1037, '2025-06-24', 6, 'BORDERLINE', 5, 'BORDERLINE', 6, 'BORDERLINE', 4, 'BORDERLINE', 5, 'BORDERLINE', 17, 'BORDERLINE', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(46, 1038, '2025-06-24', 8, 'ABNORMAL', 10, 'ABNORMAL', 7, 'ABNORMAL', 7, 'ABNORMAL', 4, 'ABNORMAL', 26, 'ABNORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(47, 1039, '2025-06-24', 3, 'NORMAL', 4, 'BORDERLINE', 3, 'NORMAL', 3, 'NORMAL', 8, 'NORMAL', 14, 'NORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(48, 1040, '2025-06-24', 7, 'ABNORMAL', 8, 'BORDERLINE', 7, 'ABNORMAL', 6, 'ABNORMAL', 3, 'ABNORMAL', 20, 'ABNORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(49, 1041, '2025-06-24', 5, 'NORMAL', 2, 'NORMAL', 5, 'NORMAL', 2, 'NORMAL', 7, 'NORMAL', 15, 'NORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(50, 1042, '2025-06-24', 6, 'BORDERLINE', 6, 'BORDERLINE', 6, 'BORDERLINE', 4, 'BORDERLINE', 5, 'BORDERLINE', 16, 'BORDERLINE', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(51, 1043, '2025-06-24', 9, 'ABNORMAL', 11, 'ABNORMAL', 8, 'ABNORMAL', 8, 'ABNORMAL', 2, 'ABNORMAL', 29, 'ABNORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(52, 1044, '2025-06-24', 4, 'NORMAL', 3, 'NORMAL', 4, 'NORMAL', 3, 'NORMAL', 6, 'NORMAL', 11, 'NORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(53, 1045, '2025-06-24', 7, 'ABNORMAL', 9, 'BORDERLINE', 7, 'ABNORMAL', 6, 'ABNORMAL', 3, 'ABNORMAL', 22, 'ABNORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(54, 1046, '2025-06-24', 2, 'NORMAL', 1, 'NORMAL', 1, 'NORMAL', 1, 'NORMAL', 9, 'NORMAL', 7, 'NORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(55, 1047, '2025-06-24', 6, 'BORDERLINE', 5, 'BORDERLINE', 6, 'BORDERLINE', 4, 'BORDERLINE', 5, 'BORDERLINE', 18, 'BORDERLINE', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(56, 1048, '2025-06-24', 8, 'ABNORMAL', 10, 'ABNORMAL', 7, 'ABNORMAL', 7, 'ABNORMAL', 4, 'ABNORMAL', 27, 'ABNORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(57, 1049, '2025-06-24', 5, 'NORMAL', 4, 'BORDERLINE', 5, 'NORMAL', 3, 'NORMAL', 7, 'NORMAL', 14, 'NORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29'),
(58, 1050, '2025-06-24', 7, 'ABNORMAL', 8, 'BORDERLINE', 7, 'ABNORMAL', 6, 'ABNORMAL', 3, 'ABNORMAL', 25, 'ABNORMAL', '2025-06-24 06:54:29', '2025-06-24 06:54:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','responden') NOT NULL,
  `umur` int(11) DEFAULT NULL,
  `kelurahan` text DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kelas` varchar(11) DEFAULT NULL,
  `sekolah` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nik`, `name`, `email`, `password`, `role`, `umur`, `kelurahan`, `alamat`, `kelas`, `sekolah`, `jenis_kelamin`, `created_at`) VALUES
(3, NULL, 'andi23', 'pimpinan@gmail.com', '$2y$12$3yaVyMenFDzzvJ91uMST3eA7j.0iCGkwSO11SVP7Y4DE4Nngto1Oy', 'admin', NULL, '', NULL, NULL, NULL, NULL, '2025-04-16 11:05:27'),
(18, '3326111912030004', 'rico', 'rico@mail.com', '$2y$12$ZUjDQUgrrasLBFg7v8.pKueDX29aLRBuUk3yUNqSIfBgj0pZhYYG2', 'responden', 22, 'Buaran', 'buaran 9', '8h', 'SMK 3 PEKALONGAN', 'L', '2025-06-22 05:34:53'),
(1001, '3326119112000001', 'user_1', 'user1@example.com', 'hashed_password_1', 'responden', 25, 'Bendan', 'Jl. Contoh No.1', '10', 'SMA Negeri 1', 'L', '2025-06-24 06:50:44'),
(1002, '3326119112000002', 'user_2', 'user2@example.com', 'hashed_password_2', 'responden', 28, 'Kramatsari', 'Jl. Contoh No.2', '11', 'SMA Negeri 2', 'P', '2025-06-24 06:50:44'),
(1003, '3326119112000003', 'user_3', 'user3@example.com', 'hashed_password_3', 'responden', 30, 'Tirto', 'Jl. Contoh No.3', '12', 'SMK Negeri 3', 'L', '2025-06-24 06:50:44'),
(1004, '3326119112000004', 'user_4', 'user4@example.com', 'hashed_password_4', 'responden', 22, 'Medono', 'Jl. Contoh No.4', '10', 'SMA Swasta 1', 'P', '2025-06-24 06:50:44'),
(1005, '3326119112000005', 'user_5', 'user5@example.com', 'hashed_password_5', 'responden', 27, 'Sokorejo', 'Jl. Contoh No.5', '11', 'SMK Swasta 2', 'L', '2025-06-24 06:50:44'),
(1006, '3326119112000006', 'user_6', 'user6@example.com', 'hashed_password_6', 'responden', 24, 'Noyontaan', 'Jl. Contoh No.6', '12', 'MA Negeri 1', 'P', '2025-06-24 06:50:44'),
(1007, '3326119112000007', 'user_7', 'user7@example.com', 'hashed_password_7', 'responden', 29, 'Klego', 'Jl. Contoh No.7', '10', 'SMA Negeri 1', 'L', '2025-06-24 06:50:44'),
(1008, '3326119112000008', 'user_8', 'user8@example.com', 'hashed_password_8', 'responden', 26, 'Pekalongan Selatan', 'Jl. Contoh No.8', '11', 'SMA Negeri 2', 'P', '2025-06-24 06:50:44'),
(1009, '3326119112000009', 'user_9', 'user9@example.com', 'hashed_password_9', 'responden', 31, 'Jenggot', 'Jl. Contoh No.9', '12', 'SMK Negeri 3', 'L', '2025-06-24 06:50:44'),
(1010, '3326119112000010', 'user_10', 'user10@example.com', 'hashed_password_10', 'responden', 23, 'Kusuma Bangsa', 'Jl. Contoh No.10', '10', 'SMA Swasta 1', 'P', '2025-06-24 06:50:44'),
(1011, '3326119112000011', 'user_11', 'user11@example.com', 'hashed_password_11', 'responden', 20, 'Krapyak Kidul', 'Jl. Contoh No.11', '11', 'SMK Swasta 2', 'L', '2025-06-24 06:50:44'),
(1012, '3326119112000012', 'user_12', 'user12@example.com', 'hashed_password_12', 'responden', 21, 'Dukuh', 'Jl. Contoh No.12', '12', 'MA Negeri 1', 'P', '2025-06-24 06:50:44'),
(1013, '3326119112000013', 'user_13', 'user13@example.com', 'hashed_password_13', 'responden', 35, 'Buaran', 'Jl. Contoh No.13', '10', 'SMA Negeri 1', 'L', '2025-06-24 06:50:44'),
(1014, '3326119112000014', 'user_14', 'user14@example.com', 'hashed_password_14', 'responden', 32, 'Tondano', 'Jl. Contoh No.14', '11', 'SMA Negeri 2', 'P', '2025-06-24 06:50:44'),
(1015, '3326119112000015', 'user_15', 'user15@example.com', 'hashed_password_15', 'responden', 28, 'Bendan', 'Jl. Contoh No.15', '12', 'SMK Negeri 3', 'L', '2025-06-24 06:50:44'),
(1016, '3326119112000016', 'user_16', 'user16@example.com', 'hashed_password_16', 'responden', 25, 'Kramatsari', 'Jl. Contoh No.16', '10', 'SMA Swasta 1', 'P', '2025-06-24 06:50:44'),
(1017, '3326119112000017', 'user_17', 'user17@example.com', 'hashed_password_17', 'responden', 29, 'Tirto', 'Jl. Contoh No.17', '11', 'SMK Swasta 2', 'L', '2025-06-24 06:50:44'),
(1018, '3326119112000018', 'user_18', 'user18@example.com', 'hashed_password_18', 'responden', 24, 'Medono', 'Jl. Contoh No.18', '12', 'MA Negeri 1', 'P', '2025-06-24 06:50:44'),
(1019, '3326119112000019', 'user_19', 'user19@example.com', 'hashed_password_19', 'responden', 30, 'Sokorejo', 'Jl. Contoh No.19', '10', 'SMA Negeri 1', 'L', '2025-06-24 06:50:44'),
(1020, '3326119112000020', 'user_20', 'user20@example.com', 'hashed_password_20', 'responden', 26, 'Noyontaan', 'Jl. Contoh No.20', '11', 'SMA Negeri 2', 'P', '2025-06-24 06:50:44'),
(1021, '3326119112000021', 'user_21', 'user21@example.com', 'hashed_password_21', 'responden', 33, 'Klego', 'Jl. Contoh No.21', '12', 'SMK Negeri 3', 'L', '2025-06-24 06:50:44'),
(1022, '3326119112000022', 'user_22', 'user22@example.com', 'hashed_password_22', 'responden', 27, 'Pekalongan Selatan', 'Jl. Contoh No.22', '10', 'SMA Swasta 1', 'P', '2025-06-24 06:50:44'),
(1023, '3326119112000023', 'user_23', 'user23@example.com', 'hashed_password_23', 'responden', 22, 'Jenggot', 'Jl. Contoh No.23', '11', 'SMK Swasta 2', 'L', '2025-06-24 06:50:44'),
(1024, '3326119112000024', 'user_24', 'user24@example.com', 'hashed_password_24', 'responden', 20, 'Kusuma Bangsa', 'Jl. Contoh No.24', '12', 'MA Negeri 1', 'P', '2025-06-24 06:50:44'),
(1025, '3326119112000025', 'user_25', 'user25@example.com', 'hashed_password_25', 'responden', 31, 'Krapyak Kidul', 'Jl. Contoh No.25', '10', 'SMA Negeri 1', 'L', '2025-06-24 06:50:44'),
(1026, '3326119112000026', 'user_26', 'user26@example.com', 'hashed_password_26', 'responden', 29, 'Dukuh', 'Jl. Contoh No.26', '11', 'SMA Negeri 2', 'P', '2025-06-24 06:50:44'),
(1027, '3326119112000027', 'user_27', 'user27@example.com', 'hashed_password_27', 'responden', 24, 'Buaran', 'Jl. Contoh No.27', '12', 'SMK Negeri 3', 'L', '2025-06-24 06:50:44'),
(1028, '3326119112000028', 'user_28', 'user28@example.com', 'hashed_password_28', 'responden', 26, 'Tondano', 'Jl. Contoh No.28', '10', 'SMA Swasta 1', 'P', '2025-06-24 06:50:44'),
(1029, '3326119112000029', 'user_29', 'user29@example.com', 'hashed_password_29', 'responden', 34, 'Bendan', 'Jl. Contoh No.29', '11', 'SMK Swasta 2', 'L', '2025-06-24 06:50:44'),
(1030, '3326119112000030', 'user_30', 'user30@example.com', 'hashed_password_30', 'responden', 23, 'Kramatsari', 'Jl. Contoh No.30', '12', 'MA Negeri 1', 'P', '2025-06-24 06:50:44'),
(1031, '3326119112000031', 'user_31', 'user31@example.com', 'hashed_password_31', 'responden', 28, 'Tirto', 'Jl. Contoh No.31', '10', 'SMA Negeri 1', 'L', '2025-06-24 06:50:44'),
(1032, '3326119112000032', 'user_32', 'user32@example.com', 'hashed_password_32', 'responden', 25, 'Medono', 'Jl. Contoh No.32', '11', 'SMA Negeri 2', 'P', '2025-06-24 06:50:44'),
(1033, '3326119112000033', 'user_33', 'user33@example.com', 'hashed_password_33', 'responden', 30, 'Sokorejo', 'Jl. Contoh No.33', '12', 'SMK Negeri 3', 'L', '2025-06-24 06:50:44'),
(1034, '3326119112000034', 'user_34', 'user34@example.com', 'hashed_password_34', 'responden', 27, 'Noyontaan', 'Jl. Contoh No.34', '10', 'SMA Swasta 1', 'P', '2025-06-24 06:50:44'),
(1035, '3326119112000035', 'user_35', 'user35@example.com', 'hashed_password_35', 'responden', 22, 'Klego', 'Jl. Contoh No.35', '11', 'SMK Swasta 2', 'L', '2025-06-24 06:50:44'),
(1036, '3326119112000036', 'user_36', 'user36@example.com', 'hashed_password_36', 'responden', 20, 'Pekalongan Selatan', 'Jl. Contoh No.36', '12', 'MA Negeri 1', 'P', '2025-06-24 06:50:44'),
(1037, '3326119112000037', 'user_37', 'user37@example.com', 'hashed_password_37', 'responden', 31, 'Jenggot', 'Jl. Contoh No.37', '10', 'SMA Negeri 1', 'L', '2025-06-24 06:50:44'),
(1038, '3326119112000038', 'user_38', 'user38@example.com', 'hashed_password_38', 'responden', 29, 'Kusuma Bangsa', 'Jl. Contoh No.38', '11', 'SMA Negeri 2', 'P', '2025-06-24 06:50:44'),
(1039, '3326119112000039', 'user_39', 'user39@example.com', 'hashed_password_39', 'responden', 24, 'Krapyak Kidul', 'Jl. Contoh No.39', '12', 'SMK Negeri 3', 'L', '2025-06-24 06:50:44'),
(1040, '3326119112000040', 'user_40', 'user40@example.com', 'hashed_password_40', 'responden', 26, 'Dukuh', 'Jl. Contoh No.40', '10', 'SMA Swasta 1', 'P', '2025-06-24 06:50:44'),
(1041, '3326119112000041', 'user_41', 'user41@example.com', 'hashed_password_41', 'responden', 33, 'Buaran', 'Jl. Contoh No.41', '11', 'SMK Swasta 2', 'L', '2025-06-24 06:50:44'),
(1042, '3326119112000042', 'user_42', 'user42@example.com', 'hashed_password_42', 'responden', 27, 'Tondano', 'Jl. Contoh No.42', '12', 'MA Negeri 1', 'P', '2025-06-24 06:50:44'),
(1043, '3326119112000043', 'user_43', 'user43@example.com', 'hashed_password_43', 'responden', 22, 'Bendan', 'Jl. Contoh No.43', '10', 'SMA Negeri 1', 'L', '2025-06-24 06:50:44'),
(1044, '3326119112000044', 'user_44', 'user44@example.com', 'hashed_password_44', 'responden', 20, 'Kramatsari', 'Jl. Contoh No.44', '11', 'SMA Negeri 2', 'P', '2025-06-24 06:50:44'),
(1045, '3326119112000045', 'user_45', 'user45@example.com', 'hashed_password_45', 'responden', 31, 'Tirto', 'Jl. Contoh No.45', '12', 'SMK Negeri 3', 'L', '2025-06-24 06:50:44'),
(1046, '3326119112000046', 'user_46', 'user46@example.com', 'hashed_password_46', 'responden', 29, 'Medono', 'Jl. Contoh No.46', '10', 'SMA Swasta 1', 'P', '2025-06-24 06:50:44'),
(1047, '3326119112000047', 'user_47', 'user47@example.com', 'hashed_password_47', 'responden', 24, 'Sokorejo', 'Jl. Contoh No.47', '11', 'SMK Swasta 2', 'L', '2025-06-24 06:50:44'),
(1048, '3326119112000048', 'user_48', 'user48@example.com', 'hashed_password_48', 'responden', 26, 'Noyontaan', 'Jl. Contoh No.48', '12', 'MA Negeri 1', 'P', '2025-06-24 06:50:44'),
(1049, '3326119112000049', 'user_49', 'user49@example.com', 'hashed_password_49', 'responden', 34, 'Klego', 'Jl. Contoh No.49', '10', 'SMA Negeri 1', 'L', '2025-06-24 06:50:44'),
(1050, '3326119112000050', 'user_50', 'user50@example.com', 'hashed_password_50', 'responden', 23, 'Pekalongan Selatan', 'Jl. Contoh No.50', '11', 'SMA Negeri 2', 'P', '2025-06-24 06:50:44');

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1051;

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
