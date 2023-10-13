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
  `website` varchar(255) NOT NULL,
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
  `is_premium` tinyint(1) NOT NULL DEFAULT '0',
  `role` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table muzic_weeb.users: ~20 rows (approximately)
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
	(12, 'normal', 'pass.admin123@gmail.com', '$2y$10$xfkQtUiAvXenlWQYZkb8pOfV0KQ54AQuLCS/QiPuNVCZyPq6o9jGO', '2023-10-13 07:39:21', 0, 'user'),
	(13, 'lmao', 'lmao@lmao.com', '$2y$10$dp/FmFd4XlNDiwzHXo0bE.ixEVR29e3RxhZXDNKvPSIgzLElTGwTK', '2023-10-13 07:42:47', 0, 'user'),
	(14, 'lmao1', 'lmao@laom.com', '$2y$10$MUJfUjE9LrCEobrpP2OcKecMdEVytOI9SJKiTthZAHDTqnpWUe9eC', '2023-10-13 07:54:56', 0, 'user'),
	(15, 'rygaxuwak', 'pixiw@mailinator.com', '$2y$10$WGpmWf/RpSe0/ql0N8SmNOeiHxi3hrLLIghVEkSSkrUXZYsexCdSi', '2023-10-13 08:03:19', 0, 'user'),
	(16, 'hutikypamu', 'degety@mailinator.com', '$2y$10$lfanQ0uL/JtaOjxlS2Dih.y.5wc4icRtiB2r88IvHNyMzCjoXhxGW', '2023-10-13 08:03:36', 0, 'user'),
	(17, 'admin', 'samepass@admin.com', '$2y$10$lVnb2d1Z6j2p4/MVQehSheYaKrlXFpinWE.2wRUhgHs0x4UaX6Vlm', '2023-10-13 08:56:08', 0, 'admin'),
	(18, 'togaxy', 'bokapexek@mailinator.com', '$2y$10$x3q6P3q5Dj.UZVh3AGPxdOnlutnnqy7M54bJUU6qikVZT3IoWIIk6', '2023-10-13 09:00:41', 0, 'user'),
	(19, 'gyxil', 'dikugagon@mailinator.com', '$2y$10$tpKb.kMZOSPvfsGiLhuwl..v/MaRSr0gd3geHssqYShmpnRAzDZWq', '2023-10-13 09:01:20', 0, 'user'),
	(20, 'xitudip', 'hoxyxym@mailinator.com', '$2y$10$UCLybPnuCIwU8leFn253gO.azGnpp/chZ1gpGFmCMWbcokEQLEZHq', '2023-10-13 09:05:21', 0, 'user'),
	(21, 'rogikoruv', 'lukepatud@mailinator.com', '$2y$10$z9w3BrJS6UT2QnLfLNJkgOwKKsky/ckoW3j2sYay40fw8bwJqIgEG', '2023-10-13 09:22:42', 0, 'user');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
