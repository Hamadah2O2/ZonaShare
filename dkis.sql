-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.40 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for dkisshare_cirkab
CREATE DATABASE IF NOT EXISTS `dkisshare_cirkab` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `dkisshare_cirkab`;

-- Dumping structure for table dkisshare_cirkab.files
CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `ukuran` bigint(20) NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `pemilik` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `globaly` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Dumping data for table dkisshare_cirkab.files: ~4 rows (approximately)
DELETE FROM `files`;
INSERT INTO `files` (`id`, `nama`, `ukuran`, `jenis`, `pemilik`, `tag`, `date`, `globaly`) VALUES
	(1, 'Blog.pdf', 2321312312, 'pdf', 'haidar', '', '2023-07-28 06:28:32', 1),
	(8, 'polos.jpg', 635425, 'image/jpeg', 'rama', '', '2023-07-27 12:55:23', 0),
	(9, 'Jadwal PTM.png', 452193, 'image/png', 'rama', 'poweer renger', '2023-07-28 04:11:03', 1),
	(10, '20201127_155601.jpg', 893296, 'image/jpeg', 'haidar', '', '2023-07-28 07:56:52', 0);

-- Dumping structure for table dkisshare_cirkab.users
CREATE TABLE IF NOT EXISTS `users` (
  `UID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`UID`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table dkisshare_cirkab.users: ~2 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`UID`, `username`, `password`, `name`, `jabatan`) VALUES
	('1241141gzsn2', 'haidar', '321', 'Rozyan', 'Programer Jaman Now'),
	('24124128y812', 'rama', '123', 'Mas Rama', '');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
