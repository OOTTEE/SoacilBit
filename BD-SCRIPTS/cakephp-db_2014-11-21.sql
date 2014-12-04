-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 04, 2014 at 11:03 PM
-- Server version: 5.5.40
-- PHP Version: 5.4.34

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cakephp`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `contenido` varchar(300) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

DROP TABLE IF EXISTS `friends`;
CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `user_id_user` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `user_id_friend` int(11) NOT NULL,
  `solicitud` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user_id_user`, `fecha`, `user_id_friend`, `solicitud`) VALUES
(1, 21, '2014-11-24', 22, 1),
(2, 21, '2014-11-24', 23, 1),
(3, 24, '2014-11-18', 22, 1),
(6, 22, '2014-11-25', 23, 1),
(8, 21, '2014-11-25', 24, 0),
(9, 22, '2014-11-25', 21, 1),
(10, 22, '2014-11-25', 24, 1),
(11, 21, '2014-11-25', 25, 0),
(12, 21, '2014-11-25', 26, 0);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`,`user_id`, `post_id`) VALUES
(1,0, 8),
(2,0, 21),
(3,7, 21),
(4,8, 21),
(5,21, 0),
(6,22, 7);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `post`, `fecha`) VALUES
(7, 22, 'pene\r\n', '2014-11-23 23:00:00'),
(8, 22, 'asdfasfasdfasdf', '2014-11-23 23:00:00'),
(9, 22, 'asdfasfasdfasdf', '2014-11-23 23:00:00'),
(10, 21, 'user 21', '2014-11-23 23:00:00'),
(11, 23, 'user 23 ', '2014-11-03 23:00:00'),
(12, 24, 'hector\r\n', '2014-11-23 23:00:00'),
(13, 22, 'siiii tiiiio\r\n', '2014-11-23 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE `requests` (
  `user_id_user` int(11) NOT NULL,
  `user_id_new_friend` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(250) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `nombre`, `password`, `image`) VALUES
(21, 'OTE', 'OTE', '$2a$10$b105x9CpBjLCI0Eptd1eh.sfr3zNJksfNZ7uMsIYXjMq/gG1JgDqG', 'imagenes/21-pincho.jpg'),
(22, 'admin', 'admin', '$2a$10$VJxU/996yt3p5jQEhPIaReBJKr6cmGqA2SbkfHltdzbqtPeA5KjZm', NULL),
(23, 'OTE1', 'adrian', '$2a$10$mJox3RsFpTwpNxPb4gqnsuT7sENuBQ4tMVlU07Vy6vYEPOqZJjnb.', NULL),
(24, 'hector', 'hector', '$2a$10$hKQ4RfIprCYXBx/g6htlzeBEb2nwO4KobSKLvK0rXKsKKfkr8DV/a', NULL),
(25, 'Juanchi', 'Juana de arco', '$2a$10$uMHOILub6AEK4sUognRx9eMbDZWCwPHUPhhhVoIfqZbFdDZLwcbDC', NULL),
(26, 'perico', 'el de los palotes', '$2a$10$MePArNxrznWROf2Nx8Hri.dBn3x5F1TGLXmA8aKRtjuOs4c8/9V4i', NULL),
(27, 'bocas', 'el bocas ', '$2a$10$SPDVgkdnhELFf9j2stImx.QE6KWjpGiAJmdazLEJH1obXcNNZ4Bz6', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user_id_user` (`user_id_user`,`user_id_friend`);

--
-- Indexes for table `likes`
--

ALTER TABLE `likes`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
ADD PRIMARY KEY (`user_id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `alias` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;SET FOREIGN_KEY_CHECKS=1;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
