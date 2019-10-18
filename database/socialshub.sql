-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2019 at 02:35 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socialshub`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_views`
--

CREATE TABLE `account_views` (
  `account_id` int(11) DEFAULT NULL,
  `views` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_views`
--

INSERT INTO `account_views` (`account_id`, `views`) VALUES
(10, 98),
(5, 0),
(9, 51),
(14, 41),
(29, 0),
(0, 0),
(31, 0);

-- --------------------------------------------------------

--
-- Table structure for table `social_clicks`
--

CREATE TABLE `social_clicks` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `smedia` text NOT NULL,
  `clicker_ip` text NOT NULL,
  `click_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `smedia` varchar(255) NOT NULL,
  `smedia_name` varchar(255) NOT NULL,
  `smedia_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `account_id`, `smedia`, `smedia_name`, `smedia_link`) VALUES
(1, 10, 'instagram', 'krys.czajkowski', 'https://instagram.com/krys.czajkowski'),
(2, 10, 'tiktok', 'tiktokerpierwszaklasa', 'https://tiktok.com/czaja'),
(3, 10, 'twitter', 'twittermistrz', ''),
(4, 10, 'facebook', 'Krystian Czajkowski', 'https://www.facebook.com/profile.php?id=100008701864345'),
(6, 10, 'twitch', 'xdXD', ''),
(7, 10, 'youtube', 'kczaja', 'https://youtube.com'),
(8, 10, 'discord', 'Czaja#2024', ''),
(9, 10, 'snapchat', 'nie_majuznazw', ''),
(10, 10, 'mail', 'czajkowski.krystian@gmail.com', ''),
(11, 14, 'youtube', 'xd', ''),
(12, 14, 'instagram', '', ''),
(13, 14, 'tiktok', '', ''),
(14, 14, 'twitch', '', ''),
(15, 14, 'twitter', '', ''),
(16, 14, 'discord', '', ''),
(17, 14, 'snapchat', '', ''),
(18, 14, 'facebook', '', ''),
(19, 14, 'mail', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `screenName` varchar(40) NOT NULL,
  `profileImage` varchar(255) NOT NULL,
  `profileCover` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `validationCode` text NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `screenName`, `profileImage`, `profileCover`, `bio`, `validationCode`, `active`) VALUES
(9, 'gracjan@gmail.com', '3fc0a7acf087f549ac2b266baf94b8b1', 'kredka', 'images/image9medusakredki.jpg', 'images/image9kot.jpg', 'Przykladowe Bio \r\n\r\nhttps://google.com\r\nhttp://facebook.com', '0', 1),
(10, 'czajkowski.krystian@gmail.com', '3fc0a7acf087f549ac2b266baf94b8b1', 'KrysCzajkowski', 'images/image10krolMacius1.jpg', 'images/image10delfinek.jpg', 'xd', '0', 1),
(14, 'krystian@gmail.com', '3fc0a7acf087f549ac2b266baf94b8b1', 'krystian', 'images/image14brzydkiKOt.jpg', 'images/image14bmw.jpg', 'Siema jestem KRYSTIAN!\r\na\r\na\r\na\r\na', '0', 1),
(26, 'asdfasdff@gmail.com', '3fc0a7acf087f549ac2b266baf94b8b1', 'asdfasdf', 'images/defaultProfileImage.png', 'images/defaultCoverImage.png', '', '7c580605d38ed1a3e99a312ae37ce43a', 0);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `visitor_ip` text NOT NULL,
  `visit_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `account_id`, `visitor_ip`, `visit_date`) VALUES
(1, 10, '::1', '2019-09-26 06:30:11'),
(2, 9, '::1', '2019-09-26 06:30:11'),
(5, 26, '::1', '2019-09-26 06:30:11'),
(12, 10, '127.0.0.1', '2019-10-04 17:17:04'),
(13, 14, '::1', '2019-10-18 10:26:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `social_clicks`
--
ALTER TABLE `social_clicks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `social_clicks`
--
ALTER TABLE `social_clicks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
