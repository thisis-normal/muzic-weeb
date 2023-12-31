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
  CONSTRAINT `FK_album_artist` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`artist_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
	(11, 'Domino', 13, '2023-11-13', NULL),
	(12, 'Biri-Biri', 19, '2023-12-02', NULL),
	(13, 'Đ&aacute;nh đổi', 32, '2023-12-05', NULL);

-- Dumping structure for table muzic_weeb.album_genre
CREATE TABLE IF NOT EXISTS `album_genre` (
  `album_id` int NOT NULL,
  `genre_id` int NOT NULL,
  PRIMARY KEY (`album_id`,`genre_id`),
  KEY `album_genre_fk1` (`genre_id`),
  CONSTRAINT `FK_LinkAlbumGenre_Album` FOREIGN KEY (`album_id`) REFERENCES `albums` (`album_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_LinkAlbumGenre_Genre` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`genre_id`) ON DELETE CASCADE ON UPDATE CASCADE
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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table muzic_weeb.artists: ~13 rows (approximately)
INSERT INTO `artists` (`artist_id`, `name`, `biography`, `image`, `website`) VALUES
	(11, 'ULSA IT', 'Just someone not familiar', 'page\'s avatar.png', NULL),
	(12, 'G-Dragon', 'G-Dragon, born Kwon Ji-Yong, is a rapper from Seoul, South Korea who also writes and produces. At the age of 11, he signed to  and, a few years later, joined his label&#039;s popular group , for which he wrote and produced a significant amount of material. November 2008&#039;s Remember topped Korea&#039;s Gaon chart, while most of the group&#039;s releases in Japan were certified gold. In August 2009, Kwon released his first solo album, Heartbreaker; a major success, it also topped the Gaon chart. He and fellow  member  then collaborated on December 2010&#039;s GD &amp; TOP, a set that was more R&amp;B and rap-oriented than their group&#039;s dance-pop-leaning releases. Kwon then issued his first solo EP, One of a Kind, which topped the Billboard World Albums chart. The September 2012 release was led by another chart-topping single, an acoustic ballad titled &quot;That XX,&quot; as well as the hit &quot;Crayon.&quot;', 'Gdragon.jpg', NULL),
	(13, 'Sơn T&ugrave;ng', 'Nguyễn Thanh T&ugrave;ng, born in 1994, known professionally as Sơn T&ugrave;ng M-TP, is a Vietnamese singer, songwriter, producer, and actor. He is not only known as one of the most successful Vietnamese artists and as the &quot;Prince of V-pop&quot;, but also as the Chairman of three self-created companies: M-TP Entertainment, M-TP Talent and M-TP &amp; Friends. He has received many achievements: a MTV Europe Music Award, an Mnet Asian Music Award, appeared on Forbes Vietnam&#039;s 2018 30 Under 30 list, and is also the first Vietnamese musician to enter the Billboard Social 50. Up until now, he has already released a total of 25 songs, such as &quot;Cơn mưa ngang qua&quot;, &quot;Em của ng&agrave;y h&ocirc;m qua&quot;, &quot; &Acirc;m thầm b&ecirc;n em&quot;, and many more. His single &quot;Chạy ngay đi&quot; was released with a music video featuring Thai actress Davika Hoorne, and with a collaboration with rapper Snoop Dogg, he went on and created the big hit &quot;H&atilde;y trao cho anh&quot;. After releasing &quot;C&oacute; chắc y&ecirc;u l&agrave; đ&acirc;y&quot; in 2020, the song became the 3rd-most-streamed Youtube premiere at the time with 902,000 live viewers. As we all know, music is, without a doubt, the easiest way to connect people. For Sơn T&ugrave;ng M-TP, music is everything he ever wanted to offer to the world around him with all his heart and soul.', 'mmw-4-956.jpg', NULL),
	(14, 'Phương Mỹ Chi', 'Phuong My Chi was born on January 13, 2003 in a rather crowded family, the whole family had more than 14 people (including My Chi&#039;s parents and eldest sister) living in a small house. Currently, Chi lives in a small alley on Mac Van Street, Ward 12, District 8, Ho Chi Minh City.\r\n\r\nPhuong My Chi is a singer specializing in Southern Vietnamese folk music. My Chi became famous when she participated and won runner-up in the first season of the reality TV show The Voice Kids.', 'pmc.jpg', NULL),
	(16, 'Phương Ly', '.................', 'phuongly.jpg', NULL),
	(17, 'Stract', 'Steven Grant Lee Jr. (born March 22, 1999), known professionally as Stract (an acronym for Seeking To Reveal A Closer Truth), is an American rapper, singer, songwriter, and record producer from Los Angeles, California. The lofi hip-hop artist surfaced in July of 2018 with  collaboration &quot;.&quot; This was followed by the release of his debut album &quot;&quot; (released February 14, 2019), an 11-track LP featuring appearances from a diverse range of collaborators such as , , and Numbers Game. Months after his debut, Stract returned in July of 2019 with yet another  collaboration, &quot;,&quot; which became his breakthrough, eventually landing him a contract with CORBAL Records in April of 2020', 'channels4_profile.jpg', NULL),
	(18, 'Hans Zimmer', 'Hans Florian Zimmer; born 12 September 1957) is a German film score composer and music producer. He has won two Oscars and four Grammys, and has been nominated for three Emmys and a Tony. Zimmer was also named on the list of Top 100 Living Geniuses, published by The Daily Telegraph in 2007', 'hanz.png', NULL),
	(19, 'Yoasobi', 'Just Yoasobi!', 'yoasobi.jpg', NULL),
	(20, 'Sam Wills', 'Traingazing song', 'samwills.jpg', NULL),
	(21, 'IU', 'South Korean singer, songwriter, and actress Lee Ji-eun performs on the sweeter side of the K-pop spectrum, often focused on ballads and light pop. Choosing the stage name IU -- derived from &quot;I&quot; and &quot;you&quot; to symbolize unity -- Lee debuted in the late 2000s with early efforts Lost &amp; Found and IU...IM, but had her breakthrough in 2010 with the chart-topping &quot;Good Day&quot; from her third EP, Real. She remained a fixture at the top of the Korean charts into the 2020s with hits such as 2011&#039;s Last Fantasy, 2019&#039;s Love Poem, and 2021&#039;s platinum-certified Lilac. In addition to her success in Korea, she also branched out into the Japanese market and, in 2020, scored her first number one in the U.S. with &quot;Eight.&quot;', 'IU.jpg', NULL),
	(31, 'Normal', 'Just a normal person in a normal world!', '656cbf7edd6a8myself.jpg', NULL),
	(32, 'Obito', 'This is obito', '656e877dc6952channels4_profile.jpg', NULL),
	(33, 'INZO', 'INZO!!!!', '656e8d48cd84csamwills.jpg', NULL);

-- Dumping structure for table muzic_weeb.genres
CREATE TABLE IF NOT EXISTS `genres` (
  `genre_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`genre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table muzic_weeb.genres: ~16 rows (approximately)
INSERT INTO `genres` (`genre_id`, `name`) VALUES
	(1, 'Pop'),
	(2, 'EDM'),
	(3, 'Orchestra'),
	(4, 'Ballad'),
	(5, 'Folk'),
	(6, 'Hiphop'),
	(7, 'Lo-fi'),
	(8, 'Rap'),
	(9, 'Genre2'),
	(10, 'J-Pop'),
	(11, 'V-Pop'),
	(12, 'K-Pop'),
	(13, 'US-UK'),
	(14, 'V-Rap'),
	(15, 'J-Rap'),
	(16, 'K-Rap');

-- Dumping structure for table muzic_weeb.lnk_artist_song
CREATE TABLE IF NOT EXISTS `lnk_artist_song` (
  `id` int NOT NULL AUTO_INCREMENT,
  `song_id` int NOT NULL DEFAULT '0',
  `artist_id` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`artist_id`,`song_id`) USING BTREE,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table muzic_weeb.lnk_artist_song: ~13 rows (approximately)
INSERT INTO `lnk_artist_song` (`id`, `song_id`, `artist_id`) VALUES
	(1, 1, 1),
	(2, 1, 2),
	(3, 5, 12),
	(4, 6, 14),
	(5, 7, 18),
	(6, 8, 12),
	(7, 11, 13),
	(8, 13, 12),
	(9, 14, 12),
	(10, 15, 18),
	(11, 16, 18),
	(12, 17, 12),
	(13, 16, 12);

-- Dumping structure for table muzic_weeb.lnk_genre_song
CREATE TABLE IF NOT EXISTS `lnk_genre_song` (
  `id` int NOT NULL AUTO_INCREMENT,
  `song_id` int NOT NULL,
  `genre_id` int NOT NULL,
  PRIMARY KEY (`song_id`,`genre_id`,`id`) USING BTREE,
  UNIQUE KEY `id` (`id`),
  KEY `song_genre_fk1` (`genre_id`),
  CONSTRAINT `song_genre_fk0` FOREIGN KEY (`song_id`) REFERENCES `songs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `song_genre_fk1` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`genre_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table muzic_weeb.lnk_genre_song: ~15 rows (approximately)
INSERT INTO `lnk_genre_song` (`id`, `song_id`, `genre_id`) VALUES
	(5, 6, 2),
	(6, 6, 7),
	(7, 7, 3),
	(12, 11, 5),
	(13, 11, 9),
	(17, 15, 4),
	(18, 15, 5),
	(19, 15, 9),
	(20, 16, 4),
	(21, 17, 4),
	(22, 18, 4),
	(23, 18, 2),
	(24, 19, 10),
	(25, 20, 2),
	(26, 21, 1),
	(27, 25, 2),
	(28, 26, 10),
	(29, 27, 4),
	(30, 28, 5),
	(31, 28, 9),
	(32, 29, 4),
	(33, 29, 2),
	(34, 30, 4),
	(35, 31, 4),
	(36, 32, 4),
	(37, 32, 2),
	(38, 33, 4),
	(39, 34, 4),
	(40, 34, 12),
	(41, 35, 4),
	(42, 36, 4),
	(43, 37, 4),
	(44, 38, 4),
	(45, 38, 2),
	(46, 38, 5),
	(47, 39, 4),
	(48, 39, 10),
	(49, 40, 12),
	(50, 41, 2),
	(51, 41, 9),
	(52, 42, 4),
	(53, 42, 5),
	(54, 43, 2),
	(55, 43, 5),
	(56, 44, 2),
	(57, 44, 5),
	(58, 45, 2),
	(59, 45, 5),
	(60, 46, 2),
	(61, 46, 5),
	(62, 46, 4);

-- Dumping structure for table muzic_weeb.lnk_playlist_song
CREATE TABLE IF NOT EXISTS `lnk_playlist_song` (
  `playlist_song_id` int NOT NULL AUTO_INCREMENT,
  `playlist_id` int NOT NULL,
  `song_id` int NOT NULL,
  PRIMARY KEY (`playlist_song_id`),
  KEY `playlist_song_fk0` (`playlist_id`),
  KEY `playlist_song_fk1` (`song_id`),
  CONSTRAINT `playlist_song_fk0` FOREIGN KEY (`playlist_id`) REFERENCES `playlists` (`playlist_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `playlist_song_fk1` FOREIGN KEY (`song_id`) REFERENCES `songs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table muzic_weeb.lnk_playlist_song: ~9 rows (approximately)
INSERT INTO `lnk_playlist_song` (`playlist_song_id`, `playlist_id`, `song_id`) VALUES
	(2, 1, 6),
	(3, 1, 7),
	(9, 1, 15),
	(10, 1, 16),
	(11, 1, 17),
	(12, 1, 18),
	(13, 1, 19),
	(14, 1, 20),
	(15, 1, 21);

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
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`payment_id`) USING BTREE,
  UNIQUE KEY `paymentID` (`payment_id`) USING BTREE,
  KEY `FK_payment_user` (`user_id`),
  CONSTRAINT `FK_payment_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Store data after paying using paypal API';

-- Dumping data for table muzic_weeb.payments: ~31 rows (approximately)
INSERT INTO `payments` (`payment_id`, `user_id`, `fullname`, `email`, `address`, `paypal_fee`, `net_amount`, `payment_method`, `payment_status`, `create_at`) VALUES
	('09385995UJ5149817', 26, 'Nguyen Thanh Chung', 'ntc@personal.example.com', '1 Main St, San Jose, CA, 95131, US', 1, 8.99, 'Paypal', 'Completed', '2023-12-03 12:11:01'),
	('0A455027AA450160U', 26, 'Nguyen Thanh Chung', 'ntc@personal.example.com', '1 Main St, San Jose, CA, 95131, US', 1, 8.99, 'Paypal', 'Completed', '2023-12-03 12:07:46'),
	('0KJ801808L189420V', 26, 'Thuong Nguyen Huu', 'normal.dev@personal.example.com', '43 Tran Duy Hung, My City, WA, 20001, US', 3, 26.99, 'Paypal', 'Completed', '2023-12-02 15:47:28'),
	('0TJ73371MP053520R', 26, 'Thuong Nguyen Huu', 'normal.dev@personal.example.com', '43 Tran Duy Hung, My City, WA, 20001, US', 2, 17.99, 'Paypal', 'Completed', '2023-09-02 15:47:26'),
	('0X906967LL058034L', 26, 'Nguyen Thanh Chung', 'ntc@personal.example.com', '1 Main St, San Jose, CA, 95131, US', 1, 8.99, 'Paypal', 'Completed', '2023-12-03 12:15:41'),
	('11J73051R04224929', 26, 'Thuong Nguyen Huu', 'normal.dev@personal.example.com', '43 Tran Duy Hung, My City, WA, 20001, US', 1, 8.99, 'Paypal', 'Completed', '2023-10-02 15:47:27'),
	('13U14928BA768821B', 8, 'ULSA IT', 'followULSAIT@facebook.com', '1 Main St, San Jose, CA, 95131, US', 1, 8.99, 'Paypal', 'Completed', '2023-12-05 00:49:40'),
	('1D25706556450125G', 26, 'Nguyen Thanh Chung', 'ntc@personal.example.com', '1 Main St, San Jose, CA, 95131, US', 7, 62.96, 'Paypal', 'Completed', '2023-12-03 11:04:11'),
	('1SG94864E13773821', 8, 'ULSA IT', 'followULSAIT@facebook.com', '1 Main St, San Jose, CA, 95131, US', 1, 8.99, 'Paypal', 'Completed', '2023-12-05 00:43:21'),
	('1UD26520VK9641308', 8, 'Nguyen Thanh Chung', 'ntc@personal.example.com', '1 Main St, San Jose, CA, 95131, US', 2, 17.99, 'Paypal', 'Completed', '2023-11-02 13:41:24'),
	('23J54684DB911071L', 8, 'Thuong Nguyen Huu', 'normal.dev@personal.example.com', '43 Tran Duy Hung, My City, WA, 20001, US', 1, 8.99, 'Paypal', 'Completed', '2023-10-02 15:47:29'),
	('2R925284AC776290G', 26, 'Nguyen Thanh Chung', 'ntc@personal.example.com', '1 Main St, San Jose, CA, 95131, US', 1, 8.99, 'Paypal', 'Completed', '2023-12-03 11:11:15'),
	('416367601Y311031V', 26, 'Nguyen Thanh Chung', 'ntc@personal.example.com', '1 Main St, San Jose, CA, 95131, US', 7, 62.96, 'Paypal', 'Completed', '2023-12-03 12:23:17'),
	('44W834388F7933530', 26, 'Thuong Nguyen Huu', 'normal.dev@personal.example.com', '43 Tran Duy Hung, My City, WA, 20001, US', 1, 8.99, 'Paypal', 'Completed', '2023-12-02 15:47:29'),
	('4AR08404R77445130', 26, 'Nguyen Thanh Chung', 'ntc@personal.example.com', '1 Main St, San Jose, CA, 95131, US', 1, 8.99, 'Paypal', 'Completed', '2023-12-03 15:09:04'),
	('4BE494451C6806435', 26, 'ULSA IT', 'followULSAIT@facebook.com', '1 Main St, San Jose, CA, 95131, US', 10.2, 91.79, 'Paypal', 'Completed', '2023-12-03 15:41:17'),
	('4MW652394J824983Y', 8, 'Nguyen Thanh Chung', 'ntc@personal.example.com', '1 Main St, San Jose, CA, 95131, US', 3, 26.99, 'Paypal', 'Completed', '2023-11-02 13:42:15'),
	('4SL587226L123391R', 8, 'Thuong Nguyen Huu', 'normal.dev@personal.example.com', '43 Tran Duy Hung, My City, WA, 20001, US', 1, 8.99, 'Paypal', 'Completed', '2023-12-02 15:47:30'),
	('51989384B40331741', 8, 'ULSA IT', 'followULSAIT@facebook.com', '1 Main St, San Jose, CA, 95131, US', 1, 8.99, 'Paypal', 'Completed', '2023-12-05 00:49:04'),
	('64U33759A7005401V', 8, 'Thuong Nguyen Huu', 'normal.dev@personal.example.com', '43 Tran Duy Hung, My City, WA, 20001, US', 2, 17.99, 'Paypal', 'Completed', '2023-12-02 15:47:30'),
	('6N5493409J1050223', 8, 'Nguyen Thanh Chung', 'ntc@personal.example.com', '1 Main St, San Jose, CA, 95131, US', 2, 17.99, 'Paypal', 'Completed', '2023-12-02 15:47:31'),
	('7EH069132A925284M', 8, 'ULSA IT', 'followULSAIT@facebook.com', '1 Main St, San Jose, CA, 95131, US', 1, 8.99, 'Paypal', 'Completed', '2023-12-05 00:49:23'),
	('7ES64703961151256', 26, 'Thuong Nguyen Huu', 'normal.dev@personal.example.com', '43 Tran Duy Hung, My City, WA, 20001, US', 3, 26.99, 'Paypal', 'Completed', '2023-12-02 15:47:31'),
	('7FY215285M126770F', 26, 'Nguyen Thanh Chung', 'ntc@personal.example.com', '1 Main St, San Jose, CA, 95131, US', 1, 8.99, 'Paypal', 'Completed', '2023-12-03 11:52:48'),
	('7HS16272F5286492H', 8, 'Thuong Nguyen Huu', 'normal.dev@personal.example.com', '43 Tran Duy Hung, My City, WA, 20001, US', 1, 8.99, 'Paypal', 'Completed', '2023-12-02 15:47:32'),
	('81Y734934J0662235', 26, 'Nguyen Thanh Chung', 'ntc@personal.example.com', '1 Main St, San Jose, CA, 95131, US', 1, 8.99, 'Paypal', 'Completed', '2023-12-03 12:15:13'),
	('8H741607Y6622391M', 26, 'Nguyen Thanh Chung', 'ntc@personal.example.com', '1 Main St, San Jose, CA, 95131, US', 2, 17.99, 'Paypal', 'Completed', '2023-12-02 15:47:33'),
	('8MB72279JL7443054', 26, 'Thuong Nguyen Huu', 'normal.dev@personal.example.com', '43 Tran Duy Hung, My City, WA, 20001, US', 3, 26.99, 'Paypal', 'Completed', '2023-12-02 15:47:32'),
	('94298231WY626142C', 8, 'ULSA IT', 'followULSAIT@facebook.com', '1 Main St, San Jose, CA, 95131, US', 1, 8.99, 'Paypal', 'Completed', '2023-12-05 00:44:08'),
	('9RG34232T9589631B', 8, 'ULSA IT', 'followULSAIT@facebook.com', '1 Main St, San Jose, CA, 95131, US', 7, 62.96, 'Paypal', 'Completed', '2023-12-05 00:43:42'),
	('9Y343967AV103471Y', 8, 'Thuong Nguyen Huu', 'normal.dev@personal.example.com', '43 Tran Duy Hung, My City, WA, 20001, US', 1, 8.99, 'Paypal', 'Completed', '2023-12-02 15:47:33');

-- Dumping structure for table muzic_weeb.playlists
CREATE TABLE IF NOT EXISTS `playlists` (
  `playlist_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`playlist_id`),
  KEY `playlist_fk0` (`user_id`),
  CONSTRAINT `FK_playlist_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table muzic_weeb.playlists: ~1 rows (approximately)
INSERT INTO `playlists` (`playlist_id`, `user_id`, `title`, `description`, `created_at`) VALUES
	(1, 26, 'This is ULSA IT!', 'The biggest playlist ever!!!', '2023-11-14 04:04:14');

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Store token everytime user forget their fucking password';

-- Dumping data for table muzic_weeb.reset_tokens: ~20 rows (approximately)
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
	(21, 'thuonghuunguyen2002@gmail.com', 'c5891089c40ddfc9e879efb29f56a7a133a191ecbe1d3387cde780c418b983e79c2b07d1f3a00afde342453e685d676c8ff5', '2023-11-02 07:45:20', '2023-11-02 15:45:20', 'valid'),
	(22, 'thuonghuunguyen2002@gmail.com', '7d3dcff0ff4b3a8031211f59125d1c991367f6ed2616506fa6e7e5bd2e2a10fd027a80df23ea667256919affb4524fe729e5', '2023-11-24 01:25:19', '2023-11-23 10:28:34', 'expired'),
	(23, 'thuonghuunguyen2002@gmail.com', '9aac57688219b757d4e3fcb5176c3203e7043710d459c51702ccb2f5547befc5935571020566a699969c4c3bdcbaf7942cfc', '2023-11-24 01:25:22', '2023-11-24 09:25:22', 'valid');

-- Dumping structure for table muzic_weeb.songs
CREATE TABLE IF NOT EXISTS `songs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `artist_id` int DEFAULT NULL,
  `uploader_id` int DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `album_id` int DEFAULT NULL,
  `request_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `file_path` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `duration` int DEFAULT NULL COMMENT 'Song''s duration, count as second',
  PRIMARY KEY (`id`),
  KEY `song_fk0` (`artist_id`),
  KEY `song_fk1` (`album_id`),
  CONSTRAINT `song_fk0` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`artist_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `song_fk1` FOREIGN KEY (`album_id`) REFERENCES `albums` (`album_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table muzic_weeb.songs: ~32 rows (approximately)
INSERT INTO `songs` (`id`, `artist_id`, `uploader_id`, `title`, `release_date`, `album_id`, `request_date`, `file_path`, `status`, `duration`) VALUES
	(6, 14, 17, 'Song 1', '2023-08-02', 4, '2023-12-03 16:07:37', '65422203460a7soobin.mp3', 'Pending', 273),
	(7, 18, 17, 'Time', '2023-12-02', 10, '2023-12-03 16:07:40', 'Time.mp3', 'Pending', 276),
	(11, 13, 17, 'Song demo', '2023-11-16', 6, '2023-12-05 02:48:29', '656e8df0d7746Tragazing.mp3', 'Approved', 140),
	(15, 18, 17, 'Time (again)', '2023-11-09', 5, '2023-12-05 02:48:34', '656e8df0d7746Tragazing.mp3', 'Approved', 276),
	(16, 18, 17, 'Song abc', '2023-11-23', 7, '2023-12-05 02:48:43', '656e8df0d7746Tragazing.mp3', 'Approved', 276),
	(17, 12, 17, 'Shea Hodges', '1990-11-02', 8, '2023-12-02 16:36:12', '6563f68c3e3dadamvinhung.mp3', 'Approved', 320),
	(18, 31, 26, 'Overthinker', '2023-12-02', 4, '2023-12-03 18:03:06', 'INZO - Overthinker.mp3', 'Approved', 274),
	(19, 19, 17, 'Biri-Biri', '2023-12-02', 12, '2023-12-05 02:49:47', 'YOASOBIBiri-Biri Official Music Video.mp3', 'Approved', 191),
	(20, 14, 17, 'Fake Song', '2023-12-03', 11, '2023-12-03 04:22:57', 'Tragazing.mp3', 'Approved', 60),
	(21, 20, 17, 'Traingazing', '2023-12-03', 11, '2023-12-03 04:30:19', '656c045823ed3Tragazing.mp3', 'Approved', 60),
	(25, 31, 26, 'Request Song #1', '2023-12-04', 11, '2023-12-03 17:53:47', '656cc0a915720Tragazing.mp3', 'Pending', 60),
	(26, 19, 17, 'Yoasobi 1', '2023-12-05', 12, '2023-12-05 02:36:38', '656e8cab9e952YOASOBIBiri-Biri Official Music Video.mp3', 'Approved', 191),
	(27, 19, 17, 'Yoasobi 2', '2023-12-05', 12, '2023-12-05 02:36:58', '656e8cc925f2cYOASOBIBiri-Biri Official Music Video.mp3', 'Approved', 191),
	(28, 19, 17, 'Yoasobi 3', '2023-12-05', 12, '2023-12-05 02:37:23', '656e8ce0d79c7YOASOBIBiri-Biri Official Music Video.mp3', 'Approved', 191),
	(29, 33, 17, 'Overthinker', '2023-12-06', 13, '2023-12-05 02:39:34', '656e8d64a7c7fINZO - Overthinker.mp3', 'Approved', 274),
	(30, 33, 17, 'INZO1', '2023-12-05', 12, '2023-12-05 02:39:53', '656e8d78293dcINZO - Overthinker.mp3', 'Approved', 274),
	(31, 31, 17, 'INZO2', '2023-12-05', 4, '2023-12-05 02:40:15', '656e8d8ec8d12Tragazing.mp3', 'Approved', 60),
	(32, 11, 17, 'ULSA IT1', '2023-12-05', 4, '2023-12-05 02:41:04', '656e8dbfbbaf1Tragazing.mp3', 'Approved', 60),
	(33, 11, 17, 'THIS IS ULSA IT', '2023-12-04', 4, '2023-12-05 02:41:23', '656e8dd19894dINZO - Overthinker.mp3', 'Approved', 274),
	(34, 12, 17, 'GD01', '2023-12-05', 4, '2023-12-05 02:41:53', '656e8df0d7746Tragazing.mp3', 'Approved', 60),
	(35, 13, 17, 'Son Tung', '2023-12-05', 4, '2023-12-05 02:42:25', '656e8e10cd8e8INZO - Overthinker.mp3', 'Approved', 274),
	(36, 12, 17, 'GD02', '2023-12-05', 4, '2023-12-05 02:43:10', '656e8e3da09ceTragazing.mp3', 'Approved', 60),
	(37, 12, 17, 'GD03', '2023-11-28', 12, '2023-12-05 02:43:23', '656e8e49eefcdTragazing.mp3', 'Approved', 60),
	(38, 16, 17, 'Mặt Trời Của Em', '2023-12-05', 6, '2023-12-05 02:45:15', '656e8eba9346cTragazing.mp3', 'Approved', 60),
	(39, 16, 17, 'anh l&agrave; ngoại lệ của em', '2023-12-05', 4, '2023-12-05 02:45:52', '656e8edee0563Tragazing.mp3', 'Approved', 60),
	(40, 21, 17, 'Blueming', '2023-12-05', 4, '2023-12-05 02:51:45', '656e903f7d159Tragazing.mp3', 'Approved', 60),
	(41, 21, 17, 'You', '2023-12-05', 12, '2023-12-05 02:52:02', '656e90516c7d7Tragazing.mp3', 'Approved', 60),
	(42, 21, 17, 'Drama', '2023-12-05', 3, '2023-12-05 02:52:29', '656e906c976ddTragazing.mp3', 'Approved', 60),
	(43, 32, 17, 'Đ&aacute;nh đổi', '2023-12-05', 13, '2023-12-05 02:53:24', '656e90a2ad083Tragazing.mp3', 'Approved', 60),
	(44, 32, 17, 'H&agrave; Nội', '2023-12-05', 13, '2023-12-05 02:54:03', '656e90ca94eecTragazing.mp3', 'Approved', 60),
	(45, 32, 17, 'Đầu Đường X&oacute; Chợ', '2023-12-05', 13, '2023-12-05 02:55:11', 'Obito - Đánh Đổi ft. MCK.mp3', 'Approved', 227),
	(46, 32, 17, 'Đ&aacute;nh đổi', '2023-12-05', 13, '2023-12-05 02:55:45', '656e912f20b32Obito - Đánh Đổi ft. MCK.mp3', 'Approved', 227);

-- Dumping structure for table muzic_weeb.subscriptions
CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `payment_id` varchar(50) NOT NULL DEFAULT '',
  `user_id` int NOT NULL DEFAULT '0',
  `plan_id` int NOT NULL DEFAULT '0',
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL COMMENT '1. Active\r\n2. Expired',
  PRIMARY KEY (`id`),
  KEY `FK_Subs_User` (`user_id`),
  KEY `FK_Subs_Plan` (`plan_id`),
  KEY `FK_Subs_Bill` (`payment_id`),
  CONSTRAINT `FK_Subs_Bill` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`payment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_Subs_Plan` FOREIGN KEY (`plan_id`) REFERENCES `subscription_plans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_Subs_User` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table muzic_weeb.subscriptions: ~10 rows (approximately)
INSERT INTO `subscriptions` (`id`, `payment_id`, `user_id`, `plan_id`, `start_date`, `end_date`, `status`) VALUES
	(1, '0X906967LL058034L', 26, 2, '2023-11-03 12:15:35', '2024-01-03 12:15:35', 'Active'),
	(2, '416367601Y311031V', 3, 4, '2023-10-03 12:23:10', '2024-12-03 12:23:10', 'Active'),
	(3, '4AR08404R77445130', 4, 2, '2023-12-03 15:08:47', '2024-01-03 15:08:47', 'Active'),
	(4, '4BE494451C6806435', 5, 3, '2023-12-03 15:41:03', '2024-12-03 15:41:03', 'Active'),
	(5, '1SG94864E13773821', 8, 2, '2023-12-05 00:43:13', '2024-01-05 00:43:13', 'Active'),
	(6, '9RG34232T9589631B', 18, 4, '2023-12-05 00:43:39', '2024-12-05 00:43:39', 'Active'),
	(7, '94298231WY626142C', 9, 2, '2023-12-05 00:44:04', '2024-01-05 00:44:04', 'Active'),
	(8, '51989384B40331741', 20, 2, '2023-12-05 00:49:02', '2024-01-05 00:49:02', 'Active'),
	(9, '7EH069132A925284M', 19, 2, '2023-12-05 00:49:20', '2024-01-05 00:49:20', 'Active'),
	(10, '13U14928BA768821B', 22, 2, '2023-12-05 00:49:37', '2024-01-05 00:49:37', 'Active');

-- Dumping structure for table muzic_weeb.subscription_plans
CREATE TABLE IF NOT EXISTS `subscription_plans` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `alias` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `download_music` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT 'download_music has 2 main type:\r\n1. Yes\r\n2. No',
  `ads_disable` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT 'ads_disable has 2 main type:\r\n1. Yes\r\n2. No',
  `period` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT 'Period has 2 main type:\r\n1. Month\r\n2. Year\r\n3. Lifetime (Free plan only) (But you can upgrade this project if u want)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table muzic_weeb.subscription_plans: ~4 rows (approximately)
INSERT INTO `subscription_plans` (`id`, `name`, `alias`, `price`, `discount`, `download_music`, `ads_disable`, `period`) VALUES
	(1, 'Free plan', 'Free', 0, 0, 'No', 'No', 'Lifetime'),
	(2, 'Premium', 'Premium_Month', 9.99, 0, 'Yes', 'Yes', 'Monthly'),
	(3, 'Premium', 'Premium_Year', 101.99, 15, 'Yes', 'Yes', 'Yearly'),
	(4, 'Artist', 'Artist', 69.96, 0, 'Yes', 'Yes', 'Yearly');

-- Dumping structure for table muzic_weeb.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `regis_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `subscription_id` int NOT NULL DEFAULT '0' COMMENT '0: Basic plan (Free & Default)\r\n1: Ads-free\r\n2: Ads-free + Upload Music',
  `role` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'user',
  `artist_id` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`),
  KEY `FK_user_artist` (`artist_id`),
  CONSTRAINT `FK_user_artist` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`artist_id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table muzic_weeb.users: ~24 rows (approximately)
INSERT INTO `users` (`id`, `username`, `email`, `password`, `regis_date`, `updated_at`, `subscription_id`, `role`, `artist_id`) VALUES
	(1, 'thisisnormal', 'daqaturo@mailinator.co', '$2y$10$p6AZpDKWDVf2S2/8Kb5Iiu1TbjVim5HJdKsjZmZH/2fgg5LK71POq', '2023-11-14 07:11:43', '2023-12-03 08:54:54', 1, 'admin', NULL),
	(2, 'hi', 'kali@camailinator.com', '$2y$10$vtkYnTDvQ.z4v/TyBCiFcuWqRNY8mif2MAsxL1/3QJxqsTYORDf/2', '2023-11-14 07:23:05', '2023-12-03 08:54:54', 1, 'artist', NULL),
	(3, 'jyheficy', 'cuxyxohuma@ilinato.rcom', '$2y$10$dnIV2MpLFsiogTQfA52JC.Tq6vTE4bq0nSnpqE7dIM26uVoojD/wC', '2023-11-14 06:51:07', '2023-12-03 08:54:54', 1, 'user', NULL),
	(4, 'tymagysyv', 'vejuxirite@mailinator.com', '$2y$10$Yb91MEuxMIXk4.26hoDNMe20Jwtf576XFnqaWEjGHempa6Lg7Mtve', '2023-10-13 06:45:27', '2023-12-03 08:54:54', 1, 'user', NULL),
	(5, 'tikyc', 'tikyc@mailinator.com', '$2y$10$GJU5inJjxgWhljsi5AeJwuYLHQU239sbR9R0nrRndaPyG87wIFs.6', '2023-11-14 07:10:24', '2023-12-03 08:54:54', 1, 'admin', NULL),
	(6, 'fonyji', 'letozaku@mailinator.com', '$2y$10$iTplO5ySJDp/rth1/TXy5OSb08icFtY3vU3LvGqQMftc0T6HFSXDe', '2023-10-13 06:47:12', '2023-12-03 08:54:54', 1, 'user', NULL),
	(8, 'bruh', 'bruh@gmail.commm', '$2y$10$DGxo47/yWixj4KD1T6ZNGO1TLL/rM1LilvtsBU6i3mKcj/pabxVva', '2023-11-15 07:22:45', '2023-12-04 17:44:08', 2, 'user', NULL),
	(9, 'koryw', 'hihymirubo@mailinator.com', '$2y$10$0p6aY6eftrOBRR9iEqbAt.ARSiWvy/Nv.3k8mQG706vDpVm6FYt.W', '2023-10-12 23:56:02', '2023-12-03 08:54:54', 1, 'user', NULL),
	(10, 'kivebe', 'werugar@mailinator.com', '$2y$10$iq9LEFIJIeCxIhBwPFHR8.v33yMR/vusKgYILx6YdoVKkn4PflhKe', '2023-10-13 00:01:36', '2023-12-03 08:54:54', 1, 'user', NULL),
	(11, 'cojeladu', 'qatykuwoz@mailinator.com', '$2y$10$E1m8f6/XW9XvDFQ2xNm7xuimQsw12roGS7itexoztP.7Qz0pPjDD6', '2023-10-13 07:02:37', '2023-12-03 08:54:54', 1, 'user', NULL),
	(13, 'lmao', 'lmao@lmao.com', '$2y$10$dp/FmFd4XlNDiwzHXo0bE.ixEVR29e3RxhZXDNKvPSIgzLElTGwTK', '2023-10-13 07:42:47', '2023-12-03 08:54:54', 1, 'user', NULL),
	(14, 'lmao1', 'lmao@laom.com', '$2y$10$MUJfUjE9LrCEobrpP2OcKecMdEVytOI9SJKiTthZAHDTqnpWUe9eC', '2023-10-13 07:54:56', '2023-12-03 08:54:54', 1, 'user', NULL),
	(15, 'rygaxuwak', 'pixiw@mailinator.com', '$2y$10$WGpmWf/RpSe0/ql0N8SmNOeiHxi3hrLLIghVEkSSkrUXZYsexCdSi', '2023-10-13 08:03:19', '2023-12-03 08:54:54', 1, 'user', NULL),
	(16, 'hutikypamu', 'degety@mailinator.com', '$2y$10$lfanQ0uL/JtaOjxlS2Dih.y.5wc4icRtiB2r88IvHNyMzCjoXhxGW', '2023-10-13 08:03:36', '2023-12-03 08:54:54', 1, 'user', NULL),
	(17, 'admin', 'samepass@admin.com', '$2y$10$lVnb2d1Z6j2p4/MVQehSheYaKrlXFpinWE.2wRUhgHs0x4UaX6Vlm', '2023-10-13 08:56:08', '2023-12-03 08:54:54', 1, 'admin', NULL),
	(18, 'togaxy', 'bokapexek@mailinator.com', '$2y$10$x3q6P3q5Dj.UZVh3AGPxdOnlutnnqy7M54bJUU6qikVZT3IoWIIk6', '2023-10-13 09:00:41', '2023-12-03 08:54:54', 1, 'user', NULL),
	(19, 'gyxil', 'dikugagon@mailinator.com', '$2y$10$tpKb.kMZOSPvfsGiLhuwl..v/MaRSr0gd3geHssqYShmpnRAzDZWq', '2023-10-13 09:01:20', '2023-12-03 08:54:54', 1, 'user', NULL),
	(20, 'xitudip', 'hoxyxym@mailinator.com', '$2y$10$UCLybPnuCIwU8leFn253gO.azGnpp/chZ1gpGFmCMWbcokEQLEZHq', '2023-10-13 09:05:21', '2023-12-03 08:54:54', 1, 'user', NULL),
	(22, 'mabujylos', 'guquw@mailinator.com', '$2y$10$rwQ2cPQM5.7EAsNebwT2guxhEZfahgUTrzCIkexjg0U60GQEhlboa', '2023-10-16 01:43:04', '2023-12-03 08:54:54', 1, 'user', NULL),
	(23, 'syboky', 'tysyxy@mailinator.com', '$2y$10$OzRZ2a9upss04JeadOHSSuSCFUs5vYPbt1ktcPamWEHoCCNi6PvIK', '2023-10-16 01:50:33', '2023-12-03 08:54:54', 1, 'user', NULL),
	(24, 'nagiwu', 'hapoxy@mailinator.com', '$2y$10$.XPGynpLoC//MK7JJjEdSuXEesN2XHoxx70EkGAN4tWcBgFIJCRYG', '2023-10-16 01:50:44', '2023-12-03 08:54:54', 1, 'admin', NULL),
	(25, 'colase', 'hufigyjux@mailinator.com', '$2y$10$xHxT7/J9BPjY6ZHiUxbvWepRnZAs6epawWXJ66QwBFQMltvp41NRu', '2023-10-16 03:52:06', '2023-12-03 08:54:54', 1, 'user', NULL),
	(26, 'normal', 'thuonghuunguyen2002@gmail.com', '$2y$10$agT/psVLJuv07NJx5fmMfObxLHUHKIH/yhPpbXdsRc5L4c68dGGvy', '2023-11-15 01:35:13', '2023-12-03 17:48:46', 3, 'artist', 31),
	(27, 'ntc642002', 'chungvvvv@gmail.com', '$2y$10$aiA209k2LKlYvhj0zPMni.Bm1UfP8HMLx6TDXfoLCDaJPGlJPy3wO', '2023-10-18 01:56:14', '2023-12-03 08:54:54', 1, 'user', NULL),
	(31, 'lahocuh', 'cypinyp@mailinator.com', '$2y$10$0oci1dvaT9BhlU8N.j2mG.YXiIPj7R/wx8iKZ9d5vJVh8G/RV6khS', '2023-12-04 17:06:52', '2023-12-04 17:06:52', 0, 'user', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
