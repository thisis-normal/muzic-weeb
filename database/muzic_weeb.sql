-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
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


-- Dumping database structure for muzic_weeb
CREATE DATABASE IF NOT EXISTS `muzic_weeb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `muzic_weeb`;

-- Dumping structure for table muzic_weeb.album
CREATE TABLE IF NOT EXISTS `album` (
  `album_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `artist_id` int NOT NULL,
  `release_date` date NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  PRIMARY KEY (`album_id`),
  KEY `album_fk0` (`artist_id`),
  CONSTRAINT `album_fk0` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`artist_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table muzic_weeb.album: ~0 rows (approximately)

-- Dumping structure for table muzic_weeb.album_genre
CREATE TABLE IF NOT EXISTS `album_genre` (
  `album_id` int NOT NULL,
  `genre_id` int NOT NULL,
  PRIMARY KEY (`album_id`,`genre_id`),
  KEY `album_genre_fk1` (`genre_id`),
  CONSTRAINT `album_genre_fk0` FOREIGN KEY (`album_id`) REFERENCES `album` (`album_id`),
  CONSTRAINT `album_genre_fk1` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`genre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table muzic_weeb.album_genre: ~0 rows (approximately)

-- Dumping structure for table muzic_weeb.artists
CREATE TABLE IF NOT EXISTS `artists` (
  `artist_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `biography` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`artist_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table muzic_weeb.artists: ~0 rows (approximately)

-- Dumping structure for table muzic_weeb.genre
CREATE TABLE IF NOT EXISTS `genre` (
  `genre_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`genre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table muzic_weeb.genre: ~0 rows (approximately)

-- Dumping structure for table muzic_weeb.playlist
CREATE TABLE IF NOT EXISTS `playlist` (
  `playlist_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`playlist_id`),
  KEY `playlist_fk0` (`user_id`),
  CONSTRAINT `playlist_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table muzic_weeb.playlist: ~0 rows (approximately)

-- Dumping structure for table muzic_weeb.playlist_song
CREATE TABLE IF NOT EXISTS `playlist_song` (
  `playlist_song_id` int NOT NULL AUTO_INCREMENT,
  `playlist_id` int NOT NULL,
  `song_id` int NOT NULL,
  PRIMARY KEY (`playlist_song_id`),
  KEY `playlist_song_fk0` (`playlist_id`),
  KEY `playlist_song_fk1` (`song_id`),
  CONSTRAINT `playlist_song_fk0` FOREIGN KEY (`playlist_id`) REFERENCES `playlist` (`playlist_id`),
  CONSTRAINT `playlist_song_fk1` FOREIGN KEY (`song_id`) REFERENCES `song` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table muzic_weeb.playlist_song: ~0 rows (approximately)

-- Dumping structure for table muzic_weeb.reset_tokens
CREATE TABLE IF NOT EXISTS `reset_tokens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `token` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `expired_at` datetime NOT NULL,
  `status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'valid',
  PRIMARY KEY (`id`),
  UNIQUE KEY `token` (`token`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Store token everytime user forget their fucking password';

-- Dumping data for table muzic_weeb.reset_tokens: ~13 rows (approximately)
INSERT INTO `reset_tokens` (`id`, `email`, `token`, `created_at`, `expired_at`, `status`) VALUES
	(4, 'thuonghuunguyen2002@gmail.com', '1ae40e6e0a47d9aa7089b546ba5141ee1dc7a23bbd4ae4ae1a4791eadd703f3baa50e8cb92bef3bd3f1a856cd74ac6d8ca98', '2023-10-17 04:12:04', '2023-10-17 12:12:04', '1'),
	(5, 'bruh@gooo.com', 'fe5d135cc349c8b32b32b5ab578a1751b77064b185a28e59c815c3d7feb2fd313c8b819b02a5c04d7c4b9374b953465ab63d', '2023-10-17 04:29:35', '2023-10-17 12:29:35', '1'),
	(6, 'admin@mmm.com', 'e29cced4ca76f6cc5caba17f1a104993dc2ea0c2686ef964a8fade750cc595c48662ed30e2efd747fd65cb0b4c16724e0755', '2023-10-17 07:23:13', '2023-10-17 15:23:13', '1'),
	(7, 'tysyxy@mailinator.com', '6e6f607505697edf75dc55d9920c55766f9380dce98c518c656d4e3e7cf140089316a8769b8dc3f863546aa7b24d00e6d7e5', '2023-10-17 07:27:29', '2023-10-17 15:27:29', '1'),
	(8, 'thuonghuunguyen2002@gmail.com', 'a24d07acbaa927e1a09b3c9809630f040eb59d6fa32499bd338e71bded5603c8c187d105cc03ffeeba6b32a404ebe8e6a509', '2023-10-17 10:26:33', '2023-10-17 15:27:49', 'invalid'),
	(9, 'thuonghuunguyen2002@gmail.com', '7e01db65a6046c7ea2df03902820b92511389aad211e0cdb6dbb80e4fc039547feb5a1e12acae9be58ee2b69a235ab07e213', '2023-10-17 08:41:15', '2023-10-17 16:41:15', '1'),
	(10, 'thuonghuunguyen2002@gmail.com', 'bfea0508c1f2f2326c9113e4315a5ec6456bf83a74f3b224e20edf944c0ec116c5c640126453d56d649d289704e84229372d', '2023-10-17 08:43:14', '2023-10-17 16:43:14', '1'),
	(11, 'thuonghuunguyen2002@gmail.com', '2be4affadb24e4f2f206b1042df500d124913bffd1618f822195e3338ef402f30e100adb4b73d445baa5f49b2506c5532976', '2023-10-17 08:45:25', '2023-10-17 16:45:25', '1'),
	(12, 'thuonghuunguyen2002@gmail.com', '1ab98f3c4dd9a7a213fd3e07a8a9868ecdcbf567e35dd707e88f5e747ac2876155dbfa0a71903379f72ad894e90134a40df7', '2023-10-17 08:46:34', '2023-10-17 16:46:34', '1'),
	(13, 'thuonghuunguyen2002@gmail.com', 'f9aef3a347b6d0c76ca58e8107d9641bf9826e27d8cd3a3c52d5330bfa3c17a98ce0e036ac42590a741af9d9f7ebb5eb055e', '2023-10-17 08:52:26', '2023-10-17 16:52:26', '1'),
	(14, 'thuonghuunguyen2002@gmail.com', 'cb0403b5d923c78c40a04e77fb2640324d1f9f9e201fa764db115b2f9cefd124074a6adfc128c74a16e28060c4e3411bff65', '2023-10-17 08:54:08', '2023-10-17 16:54:08', '1'),
	(15, 'thuonghuunguyen2002@gmail.com', 'e0433c8e4b86895b4b58baa85111f79efd0d3d63b3f588b13b5d2189f4f82723b92c6396a27f654665f8f5e9eb5b3ae9df0e', '2023-10-17 09:02:57', '2023-10-17 17:02:57', '1'),
	(16, 'thuonghuunguyen2002@gmail.com', 'badc92c0d028a1c54920beeba0af7af6881746c4bbc78445ae9b7b4f9256d7136f947a67814013204cedd6086b7adc0a4333', '2023-10-17 10:23:26', '2023-10-17 18:05:40', 'valid'),
	(17, 'chungvvvv@gmail.com', 'd982f1340db2601a5e8bfdc2b3e922b2bb9cc858db945b875f2abde28e3f8d5f4e89c979cd47b612ccaf7d90f9d01a054195', '2023-10-18 01:56:27', '2023-10-18 09:56:27', 'valid');

-- Dumping structure for table muzic_weeb.song
CREATE TABLE IF NOT EXISTS `song` (
  `id` int NOT NULL AUTO_INCREMENT,
  `artist_id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `album_id` int DEFAULT NULL,
  `request_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `file_path` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`),
  KEY `song_fk0` (`artist_id`),
  KEY `song_fk1` (`album_id`),
  CONSTRAINT `song_fk0` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`artist_id`),
  CONSTRAINT `song_fk1` FOREIGN KEY (`album_id`) REFERENCES `album` (`album_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table muzic_weeb.song: ~0 rows (approximately)

-- Dumping structure for table muzic_weeb.song_genre
CREATE TABLE IF NOT EXISTS `song_genre` (
  `song_id` int NOT NULL,
  `genre_id` int NOT NULL,
  PRIMARY KEY (`song_id`,`genre_id`),
  KEY `song_genre_fk1` (`genre_id`),
  CONSTRAINT `song_genre_fk0` FOREIGN KEY (`song_id`) REFERENCES `song` (`id`),
  CONSTRAINT `song_genre_fk1` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`genre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table muzic_weeb.song_genre: ~0 rows (approximately)

-- Dumping structure for table muzic_weeb.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `regis_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_premium` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: Basic plan (Free & Default)\r\n1: Ads-free\r\n2: Ads-free + Upload Music',
  `role` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table muzic_weeb.users: ~24 rows (approximately)
INSERT INTO `users` (`id`, `username`, `email`, `password`, `regis_date`, `is_premium`, `role`) VALUES
	(1, 'secokisi', 'daqaturo@mailinator.com', '$2y$10$3Usvy1rpwu1Qb5yM2zWlaut/r.EuuPArlACFlrR7WqpLmP5hwHLWm', '2023-10-13 02:10:52', 0, 'user'),
	(2, 'hi', 'kalicamailinator.com', '$2y$10$9/EY3HyERbEv4jtegPLVjeEQIIcCRBdGhoYVag73nCRM/VDu35LLW', '2023-10-13 02:29:46', 0, 'user'),
	(3, 'jyheficy', 'cuxyxohuma@ilinato.rcom', '$2y$10$8oNItZyR0lCx27BJTQb6qOWa5i7keTmhrBgwo1RGFFhMowIcmSClS', '2023-10-13 02:34:32', 0, 'user'),
	(4, 'tymagysyv', 'vejuxirite@mailinator.com', '$2y$10$Yb91MEuxMIXk4.26hoDNMe20Jwtf576XFnqaWEjGHempa6Lg7Mtve', '2023-10-13 06:45:27', 0, 'user'),
	(5, 'notyk', 'tikyc@mailinator.com', '$2y$10$pYdBaSPrMFeAgp3N97o92u2Bd6N9pVHw1HB4U0/2lI92NqPvzY0w2', '2023-10-13 06:46:28', 0, 'user'),
	(6, 'fonyji', 'letozaku@mailinator.com', '$2y$10$iTplO5ySJDp/rth1/TXy5OSb08icFtY3vU3LvGqQMftc0T6HFSXDe', '2023-10-13 06:47:12', 0, 'user'),
	(8, 'bruh', 'bruh@gmail.com', '$2y$10$vhxMymqb80XUllk.NjFMHeKwf9/S74B0BKN1P0qL0l1dfn27gbqV6', '2023-10-13 06:48:03', 0, 'user'),
	(9, 'koryw', 'hihymirubo@mailinator.com', '$2y$10$0p6aY6eftrOBRR9iEqbAt.ARSiWvy/Nv.3k8mQG706vDpVm6FYt.W', '2023-10-12 23:56:02', 0, 'user'),
	(10, 'kivebe', 'werugar@mailinator.com', '$2y$10$iq9LEFIJIeCxIhBwPFHR8.v33yMR/vusKgYILx6YdoVKkn4PflhKe', '2023-10-13 00:01:36', 0, 'user'),
	(11, 'cojeladu', 'qatykuwoz@mailinator.com', '$2y$10$E1m8f6/XW9XvDFQ2xNm7xuimQsw12roGS7itexoztP.7Qz0pPjDD6', '2023-10-13 07:02:37', 0, 'user'),
	(13, 'lmao', 'lmao@lmao.com', '$2y$10$dp/FmFd4XlNDiwzHXo0bE.ixEVR29e3RxhZXDNKvPSIgzLElTGwTK', '2023-10-13 07:42:47', 0, 'user'),
	(14, 'lmao1', 'lmao@laom.com', '$2y$10$MUJfUjE9LrCEobrpP2OcKecMdEVytOI9SJKiTthZAHDTqnpWUe9eC', '2023-10-13 07:54:56', 0, 'user'),
	(15, 'rygaxuwak', 'pixiw@mailinator.com', '$2y$10$WGpmWf/RpSe0/ql0N8SmNOeiHxi3hrLLIghVEkSSkrUXZYsexCdSi', '2023-10-13 08:03:19', 0, 'user'),
	(16, 'hutikypamu', 'degety@mailinator.com', '$2y$10$lfanQ0uL/JtaOjxlS2Dih.y.5wc4icRtiB2r88IvHNyMzCjoXhxGW', '2023-10-13 08:03:36', 0, 'user'),
	(17, 'admin', 'samepass@admin.com', '$2y$10$lVnb2d1Z6j2p4/MVQehSheYaKrlXFpinWE.2wRUhgHs0x4UaX6Vlm', '2023-10-13 08:56:08', 0, 'admin'),
	(18, 'togaxy', 'bokapexek@mailinator.com', '$2y$10$x3q6P3q5Dj.UZVh3AGPxdOnlutnnqy7M54bJUU6qikVZT3IoWIIk6', '2023-10-13 09:00:41', 0, 'user'),
	(19, 'gyxil', 'dikugagon@mailinator.com', '$2y$10$tpKb.kMZOSPvfsGiLhuwl..v/MaRSr0gd3geHssqYShmpnRAzDZWq', '2023-10-13 09:01:20', 0, 'user'),
	(20, 'xitudip', 'hoxyxym@mailinator.com', '$2y$10$UCLybPnuCIwU8leFn253gO.azGnpp/chZ1gpGFmCMWbcokEQLEZHq', '2023-10-13 09:05:21', 0, 'user'),
	(22, 'mabujylos', 'guquw@mailinator.com', '$2y$10$rwQ2cPQM5.7EAsNebwT2guxhEZfahgUTrzCIkexjg0U60GQEhlboa', '2023-10-16 01:43:04', 0, 'user'),
	(23, 'syboky', 'tysyxy@mailinator.com', '$2y$10$OzRZ2a9upss04JeadOHSSuSCFUs5vYPbt1ktcPamWEHoCCNi6PvIK', '2023-10-16 01:50:33', 0, 'user'),
	(24, 'nagiwu', 'hapoxy@mailinator.com', '$2y$10$.XPGynpLoC//MK7JJjEdSuXEesN2XHoxx70EkGAN4tWcBgFIJCRYG', '2023-10-16 01:50:44', 0, 'admin'),
	(25, 'colase', 'hufigyjux@mailinator.com', '$2y$10$xHxT7/J9BPjY6ZHiUxbvWepRnZAs6epawWXJ66QwBFQMltvp41NRu', '2023-10-16 03:52:06', 0, 'user'),
	(26, 'normal', 'thuonghuunguyen2002@gmail.com', '$2y$10$d/XDuq8YLX21yGL2L7MkouwHezYfI6YaI6NCieJUR7aiubVOAkVkG', '2023-10-16 07:34:52', 0, 'user'),
	(27, 'ntc642002', 'chungvvvv@gmail.com', '$2y$10$aiA209k2LKlYvhj0zPMni.Bm1UfP8HMLx6TDXfoLCDaJPGlJPy3wO', '2023-10-18 01:56:14', 0, 'user');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
