-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1:3306
-- Χρόνος δημιουργίας: 28 Ιουλ 2023 στις 11:57:27
-- Έκδοση διακομιστή: 5.7.36
-- Έκδοση PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `cms`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(3) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'PHP'),
(2, 'BOOTSTRAP'),
(54, 'HTML');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(4) NOT NULL AUTO_INCREMENT,
  `post_category_id` int(4) DEFAULT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) DEFAULT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(1, 1, 'My first post', 'Greg', '2023-02-22', 'background-3390802_960_720.webp', 'Some content for mys first try to create a post from db!', 'Post,Blogy,Php', NULL, 'draft'),
(3, 1, 'Publish', 'Greg', '2012-03-23', '176600_1020475114648729_776300132946205878_o.jpg', 'Learn some php noob', 'Php', 4, 'Public');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` text NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_name`) VALUES
(1, 'cops'),
(2, 'Php');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
