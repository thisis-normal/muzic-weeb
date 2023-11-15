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

-- Dumping structure for table muzic_weeb.albums
CREATE TABLE IF NOT EXISTS `albums` (
  `album_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `artist_id` int NOT NULL,
  `release_date` date NOT NULL,
  `cover_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`album_id`),
  KEY `album_fk0` (`artist_id`),
  CONSTRAINT `album_fk0` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`artist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table muzic_weeb.albums: ~9 rows (approximately)
INSERT INTO `albums` (`album_id`, `title`, `artist_id`, `release_date`, `cover_image`) VALUES
	(2, 'Making My Way', 13, '2023-10-25', NULL),
	(3, 'Ch&uacute;ng ta của hiện tại', 13, '2023-10-25', NULL),
	(4, 'Anh kh&ocirc;ng d&ugrave;ng ma to&eacute; đ&acirc;u', 12, '2023-10-25', NULL),
	(5, 'Vũ Trụ C&ograve; Bay', 14, '2023-10-25', NULL),
	(6, 'Đo&aacute;n xem', 14, '2023-10-30', NULL),
	(7, 'Haru Haru', 12, '2023-10-30', NULL),
	(8, 'Losing Interestss', 17, '2023-10-31', NULL),
	(10, 'Time', 18, '2023-11-02', NULL),
	(11, 'Domino', 13, '2023-11-13', NULL);

-- Dumping structure for table muzic_weeb.album_genre
CREATE TABLE IF NOT EXISTS `album_genre` (
  `album_id` int NOT NULL,
  `genre_id` int NOT NULL,
  PRIMARY KEY (`album_id`,`genre_id`),
  KEY `album_genre_fk1` (`genre_id`),
  CONSTRAINT `album_genre_fk0` FOREIGN KEY (`album_id`) REFERENCES `albums` (`album_id`),
  CONSTRAINT `album_genre_fk1` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`genre_id`)
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table muzic_weeb.artists: ~7 rows (approximately)
INSERT INTO `artists` (`artist_id`, `name`, `biography`, `image`, `website`) VALUES
	(11, 'ULSA IT', 'Just someone not familiar', 'page\'s avatar.png', NULL),
	(12, 'G-Dragon', 'G-Dragon, born Kwon Ji-Yong, is a rapper from Seoul, South Korea who also writes and produces. At the age of 11, he signed to  and, a few years later, joined his label&#039;s popular group , for which he wrote and produced a significant amount of material. November 2008&#039;s Remember topped Korea&#039;s Gaon chart, while most of the group&#039;s releases in Japan were certified gold. In August 2009, Kwon released his first solo album, Heartbreaker; a major success, it also topped the Gaon chart. He and fellow  member  then collaborated on December 2010&#039;s GD &amp; TOP, a set that was more R&amp;B and rap-oriented than their group&#039;s dance-pop-leaning releases. Kwon then issued his first solo EP, One of a Kind, which topped the Billboard World Albums chart. The September 2012 release was led by another chart-topping single, an acoustic ballad titled &quot;That XX,&quot; as well as the hit &quot;Crayon.&quot;', 'Gdragon.jpg', NULL),
	(13, 'Sơn T&ugrave;ng', 'Nguyễn Thanh T&ugrave;ng, born in 1994, known professionally as Sơn T&ugrave;ng M-TP, is a Vietnamese singer, songwriter, producer, and actor. He is not only known as one of the most successful Vietnamese artists and as the &quot;Prince of V-pop&quot;, but also as the Chairman of three self-created companies: M-TP Entertainment, M-TP Talent and M-TP &amp; Friends. He has received many achievements: a MTV Europe Music Award, an Mnet Asian Music Award, appeared on Forbes Vietnam&#039;s 2018 30 Under 30 list, and is also the first Vietnamese musician to enter the Billboard Social 50. Up until now, he has already released a total of 25 songs, such as &quot;Cơn mưa ngang qua&quot;, &quot;Em của ng&agrave;y h&ocirc;m qua&quot;, &quot; &Acirc;m thầm b&ecirc;n em&quot;, and many more. His single &quot;Chạy ngay đi&quot; was released with a music video featuring Thai actress Davika Hoorne, and with a collaboration with rapper Snoop Dogg, he went on and created the big hit &quot;H&atilde;y trao cho anh&quot;. After releasing &quot;C&oacute; chắc y&ecirc;u l&agrave; đ&acirc;y&quot; in 2020, the song became the 3rd-most-streamed Youtube premiere at the time with 902,000 live viewers. As we all know, music is, without a doubt, the easiest way to connect people. For Sơn T&ugrave;ng M-TP, music is everything he ever wanted to offer to the world around him with all his heart and soul.', 'mmw-4-956.jpg', NULL),
	(14, 'Phương Mỹ Chi', 'Phuong My Chi was born on January 13, 2003 in a rather crowded family, the whole family had more than 14 people (including My Chi&#039;s parents and eldest sister) living in a small house. Currently, Chi lives in a small alley on Mac Van Street, Ward 12, District 8, Ho Chi Minh City.\r\n\r\nPhuong My Chi is a singer specializing in Southern Vietnamese folk music. My Chi became famous when she participated and won runner-up in the first season of the reality TV show The Voice Kids.', 'pmc.jpg', NULL),
	(16, 'Phương Ly', '.................', 'phuongly.jpg', NULL),
	(17, 'Stract', 'Steven Grant Lee Jr. (born March 22, 1999), known professionally as Stract (an acronym for Seeking To Reveal A Closer Truth), is an American rapper, singer, songwriter, and record producer from Los Angeles, California. The lofi hip-hop artist surfaced in July of 2018 with  collaboration &quot;.&quot; This was followed by the release of his debut album &quot;&quot; (released February 14, 2019), an 11-track LP featuring appearances from a diverse range of collaborators such as , , and Numbers Game. Months after his debut, Stract returned in July of 2019 with yet another  collaboration, &quot;,&quot; which became his breakthrough, eventually landing him a contract with CORBAL Records in April of 2020', 'channels4_profile.jpg', NULL),
	(18, 'Hans Zimmer', 'Hans Florian Zimmer; born 12 September 1957) is a German film score composer and music producer. He has won two Oscars and four Grammys, and has been nominated for three Emmys and a Tony. Zimmer was also named on the list of Top 100 Living Geniuses, published by The Daily Telegraph in 2007', 'hanz.png', NULL);

-- Dumping structure for table muzic_weeb.genres
CREATE TABLE IF NOT EXISTS `genres` (
  `genre_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`genre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table muzic_weeb.genres: ~9 rows (approximately)
INSERT INTO `genres` (`genre_id`, `name`) VALUES
	(1, 'Pop'),
	(2, 'EDM'),
	(3, 'Orchestra'),
	(4, 'Ballad'),
	(5, 'Folk'),
	(6, 'Hiphop'),
	(7, 'Lo-fi'),
	(8, 'Rap'),
	(9, 'Genre2');

-- Dumping structure for table muzic_weeb.genre_song
CREATE TABLE IF NOT EXISTS `genre_song` (
  `song_id` int NOT NULL,
  `genre_id` int NOT NULL,
  PRIMARY KEY (`song_id`,`genre_id`),
  KEY `song_genre_fk1` (`genre_id`),
  CONSTRAINT `song_genre_fk0` FOREIGN KEY (`song_id`) REFERENCES `songs` (`id`),
  CONSTRAINT `song_genre_fk1` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`genre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table muzic_weeb.genre_song: ~13 rows (approximately)
INSERT INTO `genre_song` (`song_id`, `genre_id`) VALUES
	(5, 2),
	(6, 2),
	(5, 3),
	(7, 3),
	(5, 4),
	(8, 4),
	(5, 5),
	(8, 5),
	(11, 5),
	(8, 6),
	(6, 7),
	(8, 7),
	(11, 9);

-- Dumping structure for table muzic_weeb.payments
CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_id` int DEFAULT NULL,
  `fullname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `address` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `paypal_fee` double DEFAULT NULL,
  `net_amount` double DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT 'Paypal',
  `payment_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `expiry_date` datetime NOT NULL,
  `plan` varchar(50) NOT NULL DEFAULT 'Basic',
  `status` varchar(50) DEFAULT 'Active',
  PRIMARY KEY (`payment_id`) USING BTREE,
  UNIQUE KEY `paymentID` (`payment_id`) USING BTREE,
  KEY `FK_payment_user` (`user_id`),
  CONSTRAINT `FK_payment_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Store data after paying using paypal API';

-- Dumping data for table muzic_weeb.payments: ~12 rows (approximately)
INSERT INTO `payments` (`payment_id`, `user_id`, `fullname`, `email`, `address`, `paypal_fee`, `net_amount`, `payment_method`, `payment_status`, `payment_date`, `expiry_date`, `plan`, `status`) VALUES
	('0KJ801808L189420V', 26, 'Thuong Nguyen Huu', 'normal.dev@personal.example.com', '43 Tran Duy Hung, My City, WA, 20001, US', 3, 26.99, 'Paypal', 'Completed', '2023-11-14 08:06:47', '2023-12-14 08:06:47', 'Premium', 'Active'),
	('0TJ73371MP053520R', 26, 'Thuong Nguyen Huu', 'normal.dev@personal.example.com', '43 Tran Duy Hung, My City, WA, 20001, US', 2, 17.99, 'Paypal', 'Completed', '2023-11-03 09:07:12', '2023-12-03 09:07:12', 'Premium', 'Active'),
	('11J73051R04224929', 26, 'Thuong Nguyen Huu', 'normal.dev@personal.example.com', '43 Tran Duy Hung, My City, WA, 20001, US', 1, 8.99, 'Paypal', 'Completed', '2023-11-02 15:03:22', '2023-12-02 15:03:22', 'Premium', 'Active'),
	('23J54684DB911071L', 8, 'Thuong Nguyen Huu', 'normal.dev@personal.example.com', '43 Tran Duy Hung, My City, WA, 20001, US', 1, 8.99, 'Paypal', 'Completed', '2023-11-02 14:25:35', '2023-12-02 14:25:35', 'Premium', 'Active'),
	('44W834388F7933530', 26, 'Thuong Nguyen Huu', 'normal.dev@personal.example.com', '43 Tran Duy Hung, My City, WA, 20001, US', 1, 8.99, 'Paypal', 'Completed', '2023-11-02 14:59:43', '2023-12-02 14:59:43', 'Premium', 'Active'),
	('4SL587226L123391R', 8, 'Thuong Nguyen Huu', 'normal.dev@personal.example.com', '43 Tran Duy Hung, My City, WA, 20001, US', 1, 8.99, 'Paypal', 'Completed', '2023-11-03 08:52:29', '2023-12-03 08:52:29', 'Premium', 'Active'),
	('64U33759A7005401V', 8, 'Thuong Nguyen Huu', 'normal.dev@personal.example.com', '43 Tran Duy Hung, My City, WA, 20001, US', 2, 17.99, 'Paypal', 'Completed', '2023-11-03 08:52:49', '2023-12-03 08:52:49', 'Premium', 'Active'),
	('7ES64703961151256', 26, 'Thuong Nguyen Huu', 'normal.dev@personal.example.com', '43 Tran Duy Hung, My City, WA, 20001, US', 3, 26.99, 'Paypal', 'Completed', '2023-11-14 08:15:45', '2023-12-14 08:15:45', 'Premium', 'Active'),
	('7HS16272F5286492H', 8, 'Thuong Nguyen Huu', 'normal.dev@personal.example.com', '43 Tran Duy Hung, My City, WA, 20001, US', 1, 8.99, 'Paypal', 'Completed', '2023-11-03 08:58:23', '2023-12-03 08:58:23', 'Premium', 'Active'),
	('8H741607Y6622391M', 26, 'Nguyen Thanh Chung', 'ntc@personal.example.com', '1 Main St, San Jose, CA, 95131, US', 2, 17.99, 'Paypal', 'Completed', '2023-11-03 09:08:22', '2023-12-03 09:08:22', 'Premium', 'Active'),
	('8MB72279JL7443054', 26, 'Thuong Nguyen Huu', 'normal.dev@personal.example.com', '43 Tran Duy Hung, My City, WA, 20001, US', 3, 26.99, 'Paypal', 'Completed', '2023-11-14 08:12:39', '2023-12-14 08:12:39', 'Premium', 'Active'),
	('9Y343967AV103471Y', 8, 'Thuong Nguyen Huu', 'normal.dev@personal.example.com', '43 Tran Duy Hung, My City, WA, 20001, US', 1, 8.99, 'Paypal', 'Completed', '2023-11-03 08:57:55', '2023-12-03 08:57:55', 'Premium', 'Active');

-- Dumping structure for table muzic_weeb.playlists
CREATE TABLE IF NOT EXISTS `playlists` (
  `playlist_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`playlist_id`),
  KEY `playlist_fk0` (`user_id`),
  CONSTRAINT `playlist_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table muzic_weeb.playlists: ~0 rows (approximately)
INSERT INTO `playlists` (`playlist_id`, `user_id`, `title`, `description`, `created_at`) VALUES
	(1, 26, 'This is ULSA IT!', 'The biggest playlist ever!!!', '2023-11-14 04:04:14');

-- Dumping structure for table muzic_weeb.playlist_song
CREATE TABLE IF NOT EXISTS `playlist_song` (
  `playlist_song_id` int NOT NULL AUTO_INCREMENT,
  `playlist_id` int NOT NULL,
  `song_id` int NOT NULL,
  PRIMARY KEY (`playlist_song_id`),
  KEY `playlist_song_fk0` (`playlist_id`),
  KEY `playlist_song_fk1` (`song_id`),
  CONSTRAINT `playlist_song_fk0` FOREIGN KEY (`playlist_id`) REFERENCES `playlists` (`playlist_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `playlist_song_fk1` FOREIGN KEY (`song_id`) REFERENCES `songs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table muzic_weeb.playlist_song: ~4 rows (approximately)
INSERT INTO `playlist_song` (`playlist_song_id`, `playlist_id`, `song_id`) VALUES
	(1, 1, 5),
	(2, 1, 6),
	(3, 1, 7),
	(4, 1, 8);

-- Dumping structure for table muzic_weeb.reset_tokens
CREATE TABLE IF NOT EXISTS `reset_tokens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `token` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expired_at` datetime NOT NULL,
  `status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'valid',
  PRIMARY KEY (`id`),
  UNIQUE KEY `token` (`token`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Store token everytime user forget their fucking password';

-- Dumping data for table muzic_weeb.reset_tokens: ~0 rows (approximately)
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
	(14, 'thuonghuunguyen2002@gmail.com', 'cb0403b5d923c78c40a04e77fb2640324d1f9f9e201fa764db115b2f9cefd124074a6adfc128c74a16e28060c4e3411bff65', '2023-10-25 23:02:43', '2023-10-17 16:54:08', 'expired'),
	(15, 'thuonghuunguyen2002@gmail.com', 'e0433c8e4b86895b4b58baa85111f79efd0d3d63b3f588b13b5d2189f4f82723b92c6396a27f654665f8f5e9eb5b3ae9df0e', '2023-10-17 09:02:57', '2023-10-17 17:02:57', '1'),
	(16, 'thuonghuunguyen2002@gmail.com', 'badc92c0d028a1c54920beeba0af7af6881746c4bbc78445ae9b7b4f9256d7136f947a67814013204cedd6086b7adc0a4333', '2023-10-17 10:23:26', '2023-10-17 18:05:40', 'valid'),
	(17, 'chungvvvv@gmail.com', 'd982f1340db2601a5e8bfdc2b3e922b2bb9cc858db945b875f2abde28e3f8d5f4e89c979cd47b612ccaf7d90f9d01a054195', '2023-10-18 01:56:27', '2023-10-18 09:56:27', 'valid'),
	(18, 'thuonghuunguyen2002@gmail.com', '65644487bf597b578566cda3fef25b4b0717db4443bfbf3ab15e6c7e9b6a8c7acf240c276a1cac3d279bd463e99dc049cc11', '2023-10-25 23:01:00', '2023-10-26 07:01:00', 'valid'),
	(19, 'thuonghuunguyen2002@gmail.com', '94e2cfc15632642afc0cde1b5f9ef5c66e94b24a2cd6f9fabc77323531adc27d29e1e50d7a0f70b1b5e64891769cbc9732fb', '2023-10-30 03:32:38', '2023-10-26 07:01:28', 'expired'),
	(20, 'thuonghuunguyen2002@gmail.com', '7883dfa9b704a44c40627cfe1ef9e9fb59a33e74a919bcbbd23c745ad9d5e0aec5e146e88223843e1b2f7872395072e70df0', '2023-11-02 07:45:17', '2023-11-02 15:45:17', 'valid'),
	(21, 'thuonghuunguyen2002@gmail.com', 'c5891089c40ddfc9e879efb29f56a7a133a191ecbe1d3387cde780c418b983e79c2b07d1f3a00afde342453e685d676c8ff5', '2023-11-02 07:45:20', '2023-11-02 15:45:20', 'valid');

-- Dumping structure for table muzic_weeb.songs
CREATE TABLE IF NOT EXISTS `songs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `artist_id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `album_id` int DEFAULT NULL,
  `request_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file_path` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`),
  KEY `song_fk0` (`artist_id`),
  KEY `song_fk1` (`album_id`),
  CONSTRAINT `song_fk0` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`artist_id`),
  CONSTRAINT `song_fk1` FOREIGN KEY (`album_id`) REFERENCES `albums` (`album_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table muzic_weeb.songs: ~0 rows (approximately)
INSERT INTO `songs` (`id`, `artist_id`, `title`, `release_date`, `album_id`, `request_date`, `file_path`, `status`) VALUES
	(5, 12, 'Lmao', '2020-05-20', 2, '2023-11-02 03:09:11', 'damvinhung.mp3', 'Approved'),
	(6, 14, 'Song 1', '2023-08-02', 4, '2023-11-02 03:08:57', '65422203460a7soobin.mp3', 'Approved'),
	(7, 18, 'Time', '2023-12-02', 10, '2023-11-02 03:08:53', 'Time.mp3', 'Approved'),
	(8, 12, 'DDD', '2023-11-02', 4, '2023-11-02 03:08:51', '6543066525909damvinhung.mp3', 'Approved'),
	(11, 13, 'Song demo', '2023-11-16', 6, '2023-11-14 03:29:29', 'demo.mp3', 'Approved');

-- Dumping structure for table muzic_weeb.subscription_plans
CREATE TABLE IF NOT EXISTS `subscription_plans` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `duration` int DEFAULT NULL,
  `advertisement` tinyint DEFAULT NULL COMMENT '0: Has ads\r\n1: Remove ads',
  `download` tinyint DEFAULT NULL COMMENT '0: Undownloading\r\n1: Downloadable',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table muzic_weeb.subscription_plans: ~0 rows (approximately)

-- Dumping structure for table muzic_weeb.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `regis_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_premium` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: Basic plan (Free & Default)\r\n1: Ads-free\r\n2: Ads-free + Upload Music',
  `role` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table muzic_weeb.users: ~24 rows (approximately)
INSERT INTO `users` (`id`, `username`, `email`, `password`, `regis_date`, `updated_at`, `is_premium`, `role`) VALUES
	(1, 'thisisnormal', 'daqaturo@mailinator.co', '$2y$10$p6AZpDKWDVf2S2/8Kb5Iiu1TbjVim5HJdKsjZmZH/2fgg5LK71POq', '2023-11-14 07:11:43', '2023-11-15 08:16:15', 0, 'admin'),
	(2, 'hi', 'kali@camailinator.com', '$2y$10$vtkYnTDvQ.z4v/TyBCiFcuWqRNY8mif2MAsxL1/3QJxqsTYORDf/2', '2023-11-14 07:23:05', '2023-11-15 08:15:50', 0, 'artist'),
	(3, 'jyheficy', 'cuxyxohuma@ilinato.rcom', '$2y$10$dnIV2MpLFsiogTQfA52JC.Tq6vTE4bq0nSnpqE7dIM26uVoojD/wC', '2023-11-14 06:51:07', '2023-11-15 08:15:50', 0, 'user'),
	(4, 'tymagysyv', 'vejuxirite@mailinator.com', '$2y$10$Yb91MEuxMIXk4.26hoDNMe20Jwtf576XFnqaWEjGHempa6Lg7Mtve', '2023-10-13 06:45:27', '2023-11-15 08:15:50', 0, 'user'),
	(5, 'tikyc', 'tikyc@mailinator.com', '$2y$10$GJU5inJjxgWhljsi5AeJwuYLHQU239sbR9R0nrRndaPyG87wIFs.6', '2023-11-14 07:10:24', '2023-11-15 08:15:50', 0, 'admin'),
	(6, 'fonyji', 'letozaku@mailinator.com', '$2y$10$iTplO5ySJDp/rth1/TXy5OSb08icFtY3vU3LvGqQMftc0T6HFSXDe', '2023-10-13 06:47:12', '2023-11-15 08:15:50', 0, 'user'),
	(8, 'bruh', 'bruh@gmail.commm', '$2y$10$DGxo47/yWixj4KD1T6ZNGO1TLL/rM1LilvtsBU6i3mKcj/pabxVva', '2023-11-15 07:22:45', '2023-11-15 15:51:15', 0, 'artist'),
	(9, 'koryw', 'hihymirubo@mailinator.com', '$2y$10$0p6aY6eftrOBRR9iEqbAt.ARSiWvy/Nv.3k8mQG706vDpVm6FYt.W', '2023-10-12 23:56:02', '2023-11-15 08:15:50', 0, 'user'),
	(10, 'kivebe', 'werugar@mailinator.com', '$2y$10$iq9LEFIJIeCxIhBwPFHR8.v33yMR/vusKgYILx6YdoVKkn4PflhKe', '2023-10-13 00:01:36', '2023-11-15 08:15:50', 0, 'user'),
	(11, 'cojeladu', 'qatykuwoz@mailinator.com', '$2y$10$E1m8f6/XW9XvDFQ2xNm7xuimQsw12roGS7itexoztP.7Qz0pPjDD6', '2023-10-13 07:02:37', '2023-11-15 08:15:50', 0, 'user'),
	(13, 'lmao', 'lmao@lmao.com', '$2y$10$dp/FmFd4XlNDiwzHXo0bE.ixEVR29e3RxhZXDNKvPSIgzLElTGwTK', '2023-10-13 07:42:47', '2023-11-15 08:15:50', 0, 'user'),
	(14, 'lmao1', 'lmao@laom.com', '$2y$10$MUJfUjE9LrCEobrpP2OcKecMdEVytOI9SJKiTthZAHDTqnpWUe9eC', '2023-10-13 07:54:56', '2023-11-15 08:15:50', 0, 'user'),
	(15, 'rygaxuwak', 'pixiw@mailinator.com', '$2y$10$WGpmWf/RpSe0/ql0N8SmNOeiHxi3hrLLIghVEkSSkrUXZYsexCdSi', '2023-10-13 08:03:19', '2023-11-15 08:15:50', 0, 'user'),
	(16, 'hutikypamu', 'degety@mailinator.com', '$2y$10$lfanQ0uL/JtaOjxlS2Dih.y.5wc4icRtiB2r88IvHNyMzCjoXhxGW', '2023-10-13 08:03:36', '2023-11-15 08:15:50', 0, 'user'),
	(17, 'admin', 'samepass@admin.com', '$2y$10$lVnb2d1Z6j2p4/MVQehSheYaKrlXFpinWE.2wRUhgHs0x4UaX6Vlm', '2023-10-13 08:56:08', '2023-11-15 08:15:50', 0, 'admin'),
	(18, 'togaxy', 'bokapexek@mailinator.com', '$2y$10$x3q6P3q5Dj.UZVh3AGPxdOnlutnnqy7M54bJUU6qikVZT3IoWIIk6', '2023-10-13 09:00:41', '2023-11-15 08:15:50', 0, 'user'),
	(19, 'gyxil', 'dikugagon@mailinator.com', '$2y$10$tpKb.kMZOSPvfsGiLhuwl..v/MaRSr0gd3geHssqYShmpnRAzDZWq', '2023-10-13 09:01:20', '2023-11-15 08:15:50', 0, 'user'),
	(20, 'xitudip', 'hoxyxym@mailinator.com', '$2y$10$UCLybPnuCIwU8leFn253gO.azGnpp/chZ1gpGFmCMWbcokEQLEZHq', '2023-10-13 09:05:21', '2023-11-15 08:15:50', 0, 'user'),
	(22, 'mabujylos', 'guquw@mailinator.com', '$2y$10$rwQ2cPQM5.7EAsNebwT2guxhEZfahgUTrzCIkexjg0U60GQEhlboa', '2023-10-16 01:43:04', '2023-11-15 08:15:50', 0, 'user'),
	(23, 'syboky', 'tysyxy@mailinator.com', '$2y$10$OzRZ2a9upss04JeadOHSSuSCFUs5vYPbt1ktcPamWEHoCCNi6PvIK', '2023-10-16 01:50:33', '2023-11-15 08:15:50', 0, 'user'),
	(24, 'nagiwu', 'hapoxy@mailinator.com', '$2y$10$.XPGynpLoC//MK7JJjEdSuXEesN2XHoxx70EkGAN4tWcBgFIJCRYG', '2023-10-16 01:50:44', '2023-11-15 08:15:50', 0, 'admin'),
	(25, 'colase', 'hufigyjux@mailinator.com', '$2y$10$xHxT7/J9BPjY6ZHiUxbvWepRnZAs6epawWXJ66QwBFQMltvp41NRu', '2023-10-16 03:52:06', '2023-11-15 08:15:50', 0, 'user'),
	(26, 'normal', 'thuonghuunguyen2002@gmail.com', '$2y$10$agT/psVLJuv07NJx5fmMfObxLHUHKIH/yhPpbXdsRc5L4c68dGGvy', '2023-11-15 01:35:13', '2023-11-15 08:15:50', 0, 'artist'),
	(27, 'ntc642002', 'chungvvvv@gmail.com', '$2y$10$aiA209k2LKlYvhj0zPMni.Bm1UfP8HMLx6TDXfoLCDaJPGlJPy3wO', '2023-10-18 01:56:14', '2023-11-15 08:15:50', 0, 'user');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
