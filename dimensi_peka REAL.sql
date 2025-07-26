-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 26, 2025 at 07:47 AM
-- Server version: 9.1.0
-- PHP Version: 8.2.26

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

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `question_id` bigint NOT NULL,
  `option_id` int NOT NULL,
  `urutan` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `question_id` (`question_id`),
  KEY `to_option` (`option_id`)
) ENGINE=InnoDB AUTO_INCREMENT=601 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

DROP TABLE IF EXISTS `histories`;
CREATE TABLE IF NOT EXISTS `histories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `action_type` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `table_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `record_id` bigint UNSIGNED NOT NULL,
  `old_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `new_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `ip_address` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_histories_user_id` (`user_id`),
  KEY `idx_histories_action_type` (`action_type`),
  KEY `idx_histories_table_name` (`table_name`),
  KEY `idx_histories_record_id` (`record_id`),
  KEY `idx_histories_created_at` (`created_at`)
) ;

--
-- Dumping data for table `histories`
--

INSERT INTO `histories` (`id`, `user_id`, `action_type`, `table_name`, `record_id`, `old_data`, `new_data`, `ip_address`, `user_agent`, `created_at`, `updated_at`) VALUES
(70, NULL, 'created', 'users', 1056, NULL, '{\"id\": \"1056\", \"nik\": \"3337503090890910\", \"name\": \"M. Zidane Pradana\", \"email\": \"Zidane@gmail.com\", \"role\": \"responden\", \"umur\": \"14\", \"kelurahan\": \"Jenggot\", \"alamat\": \"Jenggot\", \"kelas\": \"14\", \"sekolah\": \"SMP IT Assalam\", \"jenis_kelamin\": \"L\"}', NULL, NULL, '2025-07-05 15:46:35', '2025-07-05 15:46:35'),
(71, 1056, 'created', 'riwayat', 71, NULL, '{\"id\": \"71\", \"user_id\": \"1056\", \"urutan\": \"1\", \"tanggal\": \"2025-07-05\", \"skor_es\": \"2\", \"hasil_es\": \"NORMAL\", \"skor_cp\": \"4\", \"hasil_cp\": \"BORDERLINE\", \"skor_h\": \"5\", \"hasil_h\": \"NORMAL\", \"skor_p\": \"5\", \"hasil_p\": \"BORDERLINE\", \"skor_pro\": \"8\", \"hasil_pro\": \"NORMAL\", \"total_kesulitan\": \"16\", \"hasil_total\": \"BORDERLINE\", \"created_at\": \"2025-07-05 15:59:37\", \"updated_at\": \"2025-07-05 15:59:37\"}', NULL, NULL, '2025-07-05 15:59:37', '2025-07-05 15:59:37'),
(72, 3, 'created', 'users', 1057, NULL, '{\"id\": \"1057\", \"nik\": \"1122222334434555\", \"name\": \"Bejo\", \"email\": \"Bejo@gmail.com\", \"role\": \"responden\", \"umur\": \"11\", \"kelurahan\": \"Medono\", \"alamat\": \"jl.veteran kraton lor gg 1a no 12b\", \"kelas\": \"7\", \"sekolah\": \"Smp At Taubah\", \"jenis_kelamin\": \"L\"}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', '2025-07-06 15:46:44', '2025-07-06 15:46:44'),
(73, 3, 'deleted', 'users', 1057, '{\"id\": \"1057\", \"nik\": \"1122222334434555\", \"name\": \"Bejo\", \"email\": \"Bejo@gmail.com\", \"role\": \"responden\", \"umur\": \"11\", \"kelurahan\": \"Medono\", \"alamat\": \"jl.veteran kraton lor gg 1a no 12b\", \"kelas\": \"7\", \"sekolah\": \"Smp At Taubah\", \"jenis_kelamin\": \"L\"}', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', '2025-07-06 16:27:48', '2025-07-06 16:27:48'),
(74, 1056, 'created', 'riwayat', 72, NULL, '{\"id\": \"72\", \"user_id\": \"1056\", \"urutan\": \"2\", \"tanggal\": \"2025-07-07\", \"skor_es\": \"5\", \"hasil_es\": \"NORMAL\", \"skor_cp\": \"5\", \"hasil_cp\": \"BORDERLINE\", \"skor_h\": \"5\", \"hasil_h\": \"NORMAL\", \"skor_p\": \"5\", \"hasil_p\": \"BORDERLINE\", \"skor_pro\": \"5\", \"hasil_pro\": \"BORDERLINE\", \"total_kesulitan\": \"20\", \"hasil_total\": \"ABNORMAL\", \"created_at\": \"2025-07-07 07:45:28\", \"updated_at\": \"2025-07-07 07:45:28\"}', NULL, NULL, '2025-07-07 07:45:28', '2025-07-07 07:45:28'),
(75, 1056, 'updated', 'users', 1056, '{\"id\": \"1056\", \"nik\": \"3337503090890910\", \"name\": \"M. Zidane Pradana\", \"email\": \"Zidane@gmail.com\", \"role\": \"responden\", \"umur\": \"14\", \"kelurahan\": \"Jenggot\", \"alamat\": \"Jenggot\", \"kelas\": \"14\", \"sekolah\": \"SMP IT Assalam\", \"jenis_kelamin\": \"L\"}', '{\"id\": \"1056\", \"nik\": \"3337503090890910\", \"name\": \"M. Zidane Pradana\", \"email\": \"Zidane@gmail.com\", \"role\": \"responden\", \"umur\": \"15\", \"kelurahan\": \"Jenggot\", \"alamat\": \"Jenggot\", \"kelas\": \"14\", \"sekolah\": \"SMP IT Assalam\", \"jenis_kelamin\": \"L\"}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-07-07 08:13:40', '2025-07-07 08:13:40'),
(76, 1056, 'updated', 'users', 1056, '{\"id\": \"1056\", \"nik\": \"3337503090890910\", \"name\": \"M. Zidane Pradana\", \"email\": \"Zidane@gmail.com\", \"role\": \"responden\", \"umur\": \"15\", \"kelurahan\": \"Jenggot\", \"alamat\": \"Jenggot\", \"kelas\": \"14\", \"sekolah\": \"SMP IT Assalam\", \"jenis_kelamin\": \"L\"}', '{\"id\": \"1056\", \"nik\": \"3337503090890910\", \"name\": \"M. Zidane Pradana\", \"email\": \"Zidane@gmail.com\", \"role\": \"responden\", \"umur\": \"14\", \"kelurahan\": \"Jenggot\", \"alamat\": \"Jenggot\", \"kelas\": \"14\", \"sekolah\": \"SMP IT Assalam\", \"jenis_kelamin\": \"L\"}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-07-07 08:14:00', '2025-07-07 08:14:00'),
(77, NULL, 'created', 'users', 1058, NULL, '{\"id\": \"1058\", \"nik\": \"3337503090890911\", \"name\": \"Fakhri Nizam\", \"email\": \"Fakhri@gmail.com\", \"role\": \"responden\", \"umur\": \"14\", \"kelurahan\": \"Klego\", \"alamat\": \"jl.Tan Malaka Klego\", \"kelas\": \"7\", \"sekolah\": \"SMP IT Assalam\", \"jenis_kelamin\": \"L\"}', NULL, NULL, '2025-07-07 12:37:17', '2025-07-07 12:37:17'),
(78, 1058, 'created', 'riwayat', 73, NULL, '{\"id\": \"73\", \"user_id\": \"1058\", \"urutan\": \"3\", \"tanggal\": \"2025-07-07\", \"skor_es\": \"4\", \"hasil_es\": \"NORMAL\", \"skor_cp\": \"2\", \"hasil_cp\": \"NORMAL\", \"skor_h\": \"2\", \"hasil_h\": \"NORMAL\", \"skor_p\": \"1\", \"hasil_p\": \"NORMAL\", \"skor_pro\": \"9\", \"hasil_pro\": \"NORMAL\", \"total_kesulitan\": \"9\", \"hasil_total\": \"NORMAL\", \"created_at\": \"2025-07-07 12:42:33\", \"updated_at\": \"2025-07-07 12:42:33\"}', NULL, NULL, '2025-07-07 12:42:33', '2025-07-07 12:42:33'),
(79, 3, 'created', 'users', 1059, NULL, '{\"id\": \"1059\", \"nik\": \"3337503090890953\", \"name\": \"Julyan Rico Saputra\", \"email\": \"Julyan@gmail.com\", \"role\": \"responden\", \"umur\": \"14\", \"kelurahan\": \"Tirto\", \"alamat\": \"tirto\", \"kelas\": \"7\", \"sekolah\": \"SMP IT Assalam\", \"jenis_kelamin\": \"L\"}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-07-07 13:13:50', '2025-07-07 13:13:50'),
(80, 1058, 'created', 'riwayat', 74, NULL, '{\"id\": \"74\", \"user_id\": \"1058\", \"urutan\": \"4\", \"tanggal\": \"2025-07-08\", \"skor_es\": \"5\", \"hasil_es\": \"NORMAL\", \"skor_cp\": \"5\", \"hasil_cp\": \"BORDERLINE\", \"skor_h\": \"5\", \"hasil_h\": \"NORMAL\", \"skor_p\": \"5\", \"hasil_p\": \"BORDERLINE\", \"skor_pro\": \"5\", \"hasil_pro\": \"BORDERLINE\", \"total_kesulitan\": \"20\", \"hasil_total\": \"ABNORMAL\", \"created_at\": \"2025-07-08 13:44:54\", \"updated_at\": \"2025-07-08 13:44:54\"}', NULL, NULL, '2025-07-08 13:44:54', '2025-07-08 13:44:54');

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

DROP TABLE IF EXISTS `kelurahan`;
CREATE TABLE IF NOT EXISTS `kelurahan` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id`, `nama`) VALUES
(1, 'Bendan'),
(2, 'Kramatsati'),
(3, 'Tirto'),
(4, 'Medono'),
(5, 'Sokorejo'),
(6, 'Noyontaan'),
(7, 'Tondano'),
(8, 'Klego'),
(9, 'Pekalongan Selatan'),
(10, 'Jenggot'),
(11, 'Buaran'),
(12, 'Kusuma Bangsa'),
(13, 'Krapyak Kidul'),
(14, 'Dukuh');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `id` int NOT NULL AUTO_INCREMENT,
  `question_id` int NOT NULL,
  `text` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `score` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `kode` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `pertanyaan` text COLLATE utf8mb4_general_ci NOT NULL,
  `kategori` enum('E','P','H','C','Pro') COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `riwayat`
--

DROP TABLE IF EXISTS `riwayat`;
CREATE TABLE IF NOT EXISTS `riwayat` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `urutan` int DEFAULT NULL,
  `tanggal` date NOT NULL,
  `skor_es` int DEFAULT NULL,
  `hasil_es` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `skor_cp` int DEFAULT NULL,
  `hasil_cp` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `skor_h` int DEFAULT NULL,
  `hasil_h` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `skor_p` int DEFAULT NULL,
  `hasil_p` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `skor_pro` int DEFAULT NULL,
  `hasil_pro` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `total_kesulitan` int DEFAULT NULL,
  `hasil_total` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id`, `user_id`, `urutan`, `tanggal`, `skor_es`, `hasil_es`, `skor_cp`, `hasil_cp`, `skor_h`, `hasil_h`, `skor_p`, `hasil_p`, `skor_pro`, `hasil_pro`, `total_kesulitan`, `hasil_total`, `created_at`, `updated_at`) VALUES
(71, 1056, 1, '2025-07-05', 2, 'NORMAL', 4, 'BORDERLINE', 5, 'NORMAL', 5, 'BORDERLINE', 8, 'NORMAL', 16, 'BORDERLINE', '2025-07-05 08:59:37', '2025-07-05 08:59:37'),
(72, 1056, 2, '2025-07-07', 5, 'NORMAL', 5, 'BORDERLINE', 5, 'NORMAL', 5, 'BORDERLINE', 5, 'BORDERLINE', 20, 'ABNORMAL', '2025-07-07 00:45:28', '2025-07-07 00:45:28'),
(73, 1058, 3, '2025-07-07', 4, 'NORMAL', 2, 'NORMAL', 2, 'NORMAL', 1, 'NORMAL', 9, 'NORMAL', 9, 'NORMAL', '2025-07-07 05:42:33', '2025-07-07 05:42:33'),
(74, 1058, 4, '2025-07-08', 5, 'NORMAL', 5, 'BORDERLINE', 5, 'NORMAL', 5, 'BORDERLINE', 5, 'BORDERLINE', 20, 'ABNORMAL', '2025-07-08 06:44:54', '2025-07-08 06:44:54');

--
-- Triggers `riwayat`
--
DROP TRIGGER IF EXISTS `riwayat_after_insert`;
DELIMITER $$
CREATE TRIGGER `riwayat_after_insert` AFTER INSERT ON `riwayat` FOR EACH ROW BEGIN
    -- Deklarasi variabel lokal untuk menyimpan nilai-nilai NEW
    DECLARE new_id BIGINT;
    DECLARE new_user_id BIGINT;
    DECLARE new_urutan INT;
    DECLARE new_tanggal DATE;
    DECLARE new_skor_es INT;
    DECLARE new_hasil_es VARCHAR(255);
    DECLARE new_skor_cp INT;
    DECLARE new_hasil_cp VARCHAR(255);
    DECLARE new_skor_h INT;
    DECLARE new_hasil_h VARCHAR(255);
    DECLARE new_skor_p INT;
    DECLARE new_hasil_p VARCHAR(255);
    DECLARE new_skor_pro INT;
    DECLARE new_hasil_pro VARCHAR(255);
    DECLARE new_total_kesulitan INT;
    DECLARE new_hasil_total VARCHAR(255);
    DECLARE new_created_at DATETIME;
    DECLARE new_updated_at DATETIME;

    -- Set variabel dari baris NEW
    SET new_id = NEW.id;
    SET new_user_id = NEW.user_id;
    SET new_urutan = NEW.urutan;
    SET new_tanggal = NEW.tanggal;
    SET new_skor_es = NEW.skor_es;
    SET new_hasil_es = NEW.hasil_es;
    SET new_skor_cp = NEW.skor_cp;
    SET new_hasil_cp = NEW.hasil_cp;
    SET new_skor_h = NEW.skor_h;
    SET new_hasil_h = NEW.hasil_h;
    SET new_skor_p = NEW.skor_p;
    SET new_hasil_p = NEW.hasil_p;
    SET new_skor_pro = NEW.skor_pro;
    SET new_hasil_pro = NEW.hasil_pro;
    SET new_total_kesulitan = NEW.total_kesulitan;
    SET new_hasil_total = NEW.hasil_total;
    SET new_created_at = NEW.created_at;
    SET new_updated_at = NEW.updated_at;

    INSERT INTO histories (user_id, action_type, table_name, record_id, old_data, new_data, created_at, updated_at, ip_address, user_agent)
    VALUES (
        new_user_id,
        'created',
        'riwayat',
        new_id,
        NULL,
        JSON_OBJECT(
            'id', new_id,
            'user_id', new_user_id,
            'urutan', new_urutan,
            'tanggal', new_tanggal,
            'skor_es', new_skor_es,
            'hasil_es', new_hasil_es,
            'skor_cp', new_skor_cp,
            'hasil_cp', new_hasil_cp,
            'skor_h', new_skor_h,
            'hasil_h', new_hasil_h,
            'skor_p', new_skor_p,
            'hasil_p', new_hasil_p,
            'skor_pro', new_skor_pro,
            'hasil_pro', new_hasil_pro,
            'total_kesulitan', new_total_kesulitan,
            'hasil_total', new_hasil_total,
            'created_at', new_created_at,
            'updated_at', new_updated_at
        ),
        NOW(),
        NOW(),
        @ip_address_session,
        @user_agent_session
    );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nik` varchar(16) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('admin','responden') COLLATE utf8mb4_general_ci NOT NULL,
  `umur` int DEFAULT NULL,
  `kelurahan` text COLLATE utf8mb4_general_ci,
  `alamat` text COLLATE utf8mb4_general_ci,
  `kelas` varchar(11) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sekolah` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=1060 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nik`, `name`, `email`, `password`, `role`, `umur`, `kelurahan`, `alamat`, `kelas`, `sekolah`, `jenis_kelamin`, `created_at`, `updated_at`) VALUES
(3, NULL, 'andi23', 'pimpinan@gmail.com', '$2y$12$3yaVyMenFDzzvJ91uMST3eA7j.0iCGkwSO11SVP7Y4DE4Nngto1Oy', 'admin', NULL, '', NULL, NULL, NULL, NULL, '2025-04-16 11:05:27', '2025-07-01 15:04:33'),
(1056, '3337503090890910', 'M. Zidane Pradana', 'Zidane@gmail.com', '$2y$12$KXUV1WbtEVJXesKLTruq.e/WQy3ONbBFMmyKBptDTjzMMsF8pp7wC', 'responden', 14, 'Jenggot', 'Jenggot', '14', 'SMP IT Assalam', 'L', '2025-07-05 15:46:35', '2025-07-05 15:46:35'),
(1058, '3337503090890911', 'Fakhri Nizam', 'Fakhri@gmail.com', '$2y$12$TF88o8mMQYCl4cwtwvLhKeHe0pGO/0RJZFmCvpXbD5dMcF8ii0ytC', 'responden', 14, 'Klego', 'jl.Tan Malaka Klego', '7', 'SMP IT Assalam', 'L', '2025-07-07 12:37:17', '2025-07-07 12:37:17'),
(1059, '3337503090890953', 'Julyan Rico Saputra', 'Julyan@gmail.com', '$2y$12$sZ5wTEdoV4PRKG40WSUrJ.C1uZ72itcf6fgVz6tMNvy8FnuHsiBrC', 'responden', 14, 'Tirto', 'tirto', '7', 'SMP IT Assalam', 'L', '2025-07-07 06:13:50', '2025-07-07 06:13:50');

--
-- Triggers `users`
--
DROP TRIGGER IF EXISTS `users_after_insert`;
DELIMITER $$
CREATE TRIGGER `users_after_insert` AFTER INSERT ON `users` FOR EACH ROW BEGIN
    -- Deklarasi variabel lokal untuk menyimpan nilai-nilai NEW
    DECLARE new_id BIGINT;
    DECLARE new_nik VARCHAR(20);
    DECLARE new_name VARCHAR(50);
    DECLARE new_email VARCHAR(100);
    DECLARE new_role VARCHAR(20);
    DECLARE new_umur INT;
    DECLARE new_kelurahan TEXT;
    DECLARE new_alamat TEXT;
    DECLARE new_kelas VARCHAR(50);
    DECLARE new_sekolah VARCHAR(100);
    DECLARE new_jenis_kelamin ENUM('L','P');
    -- Tambahkan semua kolom lain dari tabel users yang ingin Anda catat

    -- Set variabel dari baris NEW
    SET new_id = NEW.id;
    SET new_nik = NEW.nik;
    SET new_name = NEW.name;
    SET new_email = NEW.email;
    SET new_role = NEW.role;
    SET new_umur = NEW.umur;
    SET new_kelurahan = NEW.kelurahan;
    SET new_alamat = NEW.alamat;
    SET new_kelas = NEW.kelas;
    SET new_sekolah = NEW.sekolah;
    SET new_jenis_kelamin = NEW.jenis_kelamin;


    INSERT INTO histories (user_id, action_type, table_name, record_id, old_data, new_data, created_at, updated_at, ip_address, user_agent)
    VALUES (
        @user_id_session, -- Anda harus mengatur variabel sesi ini dari aplikasi Laravel
        'created',
        'users',
        new_id, -- Gunakan variabel lokal
        NULL,
        JSON_OBJECT(
            'id', new_id,
            'nik', new_nik,
            'name', new_name,
            'email', new_email,
            'role', new_role,
            'umur', new_umur,
            'kelurahan', new_kelurahan,
            'alamat', new_alamat,
            'kelas', new_kelas,
            'sekolah', new_sekolah,
            'jenis_kelamin', new_jenis_kelamin
        ),
        NOW(),
        NOW(),
        @ip_address_session, -- Ambil dari variabel sesi
        @user_agent_session  -- Ambil dari variabel sesi
    );
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `users_after_update`;
DELIMITER $$
CREATE TRIGGER `users_after_update` AFTER UPDATE ON `users` FOR EACH ROW BEGIN
    -- Deklarasi variabel lokal untuk OLD dan NEW
    DECLARE old_id BIGINT;
    DECLARE old_nik VARCHAR(20);
    DECLARE old_name VARCHAR(50);
    DECLARE old_email VARCHAR(100);
    DECLARE old_role VARCHAR(20);
    DECLARE old_umur INT;
    DECLARE old_kelurahan TEXT;
    DECLARE old_alamat TEXT;
    DECLARE old_kelas VARCHAR(50);
    DECLARE old_sekolah VARCHAR(100);
    DECLARE old_jenis_kelamin ENUM('L','P');

    DECLARE new_id BIGINT;
    DECLARE new_nik VARCHAR(20);
    DECLARE new_name VARCHAR(50);
    DECLARE new_email VARCHAR(100);
    DECLARE new_role VARCHAR(20);
    DECLARE new_umur INT;
    DECLARE new_kelurahan TEXT;
    DECLARE new_alamat TEXT;
    DECLARE new_kelas VARCHAR(50);
    DECLARE new_sekolah VARCHAR(100);
    DECLARE new_jenis_kelamin ENUM('L','P');
    -- Tambahkan semua kolom lain yang ingin Anda catat

    -- Set variabel dari baris OLD
    SET old_id = OLD.id;
    SET old_nik = OLD.nik;
    SET old_name = OLD.name;
    SET old_email = OLD.email;
    SET old_role = OLD.role;
    SET old_umur = OLD.umur;
    SET old_kelurahan = OLD.kelurahan;
    SET old_alamat = OLD.alamat;
    SET old_kelas = OLD.kelas;
    SET old_sekolah = OLD.sekolah;
    SET old_jenis_kelamin = OLD.jenis_kelamin;

    -- Set variabel dari baris NEW
    SET new_id = NEW.id;
    SET new_nik = NEW.nik;
    SET new_name = NEW.name;
    SET new_email = NEW.email;
    SET new_role = NEW.role;
    SET new_umur = NEW.umur;
    SET new_kelurahan = NEW.kelurahan;
    SET new_alamat = NEW.alamat;
    SET new_kelas = NEW.kelas;
    SET new_sekolah = NEW.sekolah;
    SET new_jenis_kelamin = NEW.jenis_kelamin;


    INSERT INTO histories (user_id, action_type, table_name, record_id, old_data, new_data, created_at, updated_at, ip_address, user_agent)
    VALUES (
        @user_id_session,
        'updated',
        'users',
        new_id,
        JSON_OBJECT(
            'id', old_id,
            'nik', old_nik,
            'name', old_name,
            'email', old_email,
            'role', old_role,
            'umur', old_umur,
            'kelurahan', old_kelurahan,
            'alamat', old_alamat,
            'kelas', old_kelas,
            'sekolah', old_sekolah,
            'jenis_kelamin', old_jenis_kelamin
        ),
        JSON_OBJECT(
            'id', new_id,
            'nik', new_nik,
            'name', new_name,
            'email', new_email,
            'role', new_role,
            'umur', new_umur,
            'kelurahan', new_kelurahan,
            'alamat', new_alamat,
            'kelas', new_kelas,
            'sekolah', new_sekolah,
            'jenis_kelamin', new_jenis_kelamin
        ),
        NOW(),
        NOW(),
        @ip_address_session,
        @user_agent_session
    );
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `users_before_delete`;
DELIMITER $$
CREATE TRIGGER `users_before_delete` BEFORE DELETE ON `users` FOR EACH ROW BEGIN
    -- Deklarasi variabel lokal untuk OLD
    DECLARE old_id BIGINT;
    DECLARE old_nik VARCHAR(20);
    DECLARE old_name VARCHAR(50);
    DECLARE old_email VARCHAR(100);
    DECLARE old_role VARCHAR(20);
    DECLARE old_umur INT;
    DECLARE old_kelurahan TEXT;
    DECLARE old_alamat TEXT;
    DECLARE old_kelas VARCHAR(50);
    DECLARE old_sekolah VARCHAR(100);
    DECLARE old_jenis_kelamin ENUM('L','P');

    -- Set variabel dari baris OLD
    SET old_id = OLD.id;
    SET old_nik = OLD.nik;
    SET old_name = OLD.name;
    SET old_email = OLD.email;
    SET old_role = OLD.role;
    SET old_umur = OLD.umur;
    SET old_kelurahan = OLD.kelurahan;
    SET old_alamat = OLD.alamat;
    SET old_kelas = OLD.kelas;
    SET old_sekolah = OLD.sekolah;
    SET old_jenis_kelamin = OLD.jenis_kelamin;

    INSERT INTO histories (user_id, action_type, table_name, record_id, old_data, new_data, created_at, updated_at, ip_address, user_agent)
    VALUES (
        @user_id_session,
        'deleted',
        'users',
        old_id, -- Gunakan variabel lokal
        JSON_OBJECT(
            'id', old_id,
            'nik', old_nik,
            'name', old_name,
            'email', old_email,
            'role', old_role,
            'umur', old_umur,
            'kelurahan', old_kelurahan,
            'alamat', old_alamat,
            'kelas', old_kelas,
            'sekolah', old_sekolah,
            'jenis_kelamin', old_jenis_kelamin
        ),
        NULL,
        NOW(),
        NOW(),
        @ip_address_session,
        @user_agent_session
    );
END
$$
DELIMITER ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `to_option` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
