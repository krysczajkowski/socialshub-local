-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 14, 2020 at 04:35 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

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
-- Table structure for table `custom_links`
--

CREATE TABLE `custom_links` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `custom_links`
--

INSERT INTO `custom_links` (`id`, `account_id`, `title`, `link`) VALUES
(1, 10, 'Pierwszy tytuł', 'https://socialshub.net'),
(2, 10, '&lt;?php echo &quot;siema jd&quot;; ?&gt;', ''),
(3, 10, 'Drugi tytuł', 'https:// chuj ci to nie tytul');

-- --------------------------------------------------------

--
-- Table structure for table `custom_links_clicks`
--

CREATE TABLE `custom_links_clicks` (
  `id` int(11) NOT NULL,
  `clickOn` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 10, 'instagram', '_kczajkowski', 'https://instagram.com/_kczajkowski'),
(2, 10, 'tiktok', 'tiktokerpierwszaklasa', 'https://tiktok.com/@tiktokerpierwszaklasa'),
(3, 10, 'twitter', 'twittermistrz', 'https://twitter.com/twittermistrz'),
(4, 10, 'facebook', 'Krystian Czajkowski', 'https://facebook.com/Krystian Czajkowski'),
(6, 10, 'twitch', 'xdXD', 'https://twitch.tv/xdXD'),
(7, 10, 'youtube', 'kczajak', 'https://youtube.com/user/kczajak'),
(9, 10, 'snapchat', '', ''),
(11, 14, 'youtube', 'xd', ''),
(12, 14, 'instagram', '', ''),
(13, 14, 'tiktok', '', ''),
(14, 14, 'twitch', '', ''),
(15, 14, 'twitter', '', ''),
(17, 14, 'snapchat', '', ''),
(18, 14, 'facebook', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `social_links_clicks`
--

CREATE TABLE `social_links_clicks` (
  `id` int(11) NOT NULL,
  `clickOn` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social_links_clicks`
--

INSERT INTO `social_links_clicks` (`id`, `clickOn`, `date`) VALUES
(4, 2, '2020-03-07 22:10:25'),
(5, 3, '2020-03-07 22:10:35'),
(6, 2, '2020-03-07 22:10:41'),
(7, 2, '2020-03-07 22:10:44'),
(8, 9, '2020-03-07 22:17:13'),
(9, 4, '2020-03-08 06:45:23'),
(10, 1, '2020-03-08 06:54:50'),
(11, 3, '2020-03-08 06:54:53'),
(12, 1, '2020-03-08 06:55:39'),
(13, 1, '2020-03-08 12:20:19'),
(14, 2, '2020-03-08 12:20:26'),
(15, 1, '2020-03-11 21:04:19'),
(16, 2, '2020-03-11 21:07:27');

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
  `fb_user` int(1) NOT NULL DEFAULT 0,
  `bio` varchar(255) NOT NULL,
  `validationCode` text NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `screenName`, `profileImage`, `profileCover`, `fb_user`, `bio`, `validationCode`, `active`) VALUES
(9, 'gracjan@gmail.com', '3fc0a7acf087f549ac2b266baf94b8b1', 'kredka', 'images/image10delfinek.jpg', 'images/image9kot.jpg', 0, 'Przykladowe Bio \r\n\r\nhttps://google.com\r\nhttp://facebook.com', '0', 1),
(10, 'czajkowski.krystian@gmail.com', '3fc0a7acf087f549ac2b266baf94b8b1', 'KrysCzajkowski', 'images/6ad72f63e642f9862aec160cd4b3b8bc.jpg', 'images/image10delfinek.jpg', 0, 'COOL GUY\r\nxd', '0', 1),
(14, 'krystian@gmail.com', '3fc0a7acf087f549ac2b266baf94b8b1', 'krystian', 'images/image14brzydkiKOt.jpg', 'images/image14paris.jpg', 0, 'Siema jestem KRYSTIAN!\r\na\r\na\r\na\r\na', '0', 1),
(26, 'asdfasdff@gmail.com', '3fc0a7acf087f549ac2b266baf94b8b1', 'asdfasdf', 'images/defaultProfileImage.png', 'images/defaultCoverImage.png', 0, '', '7c580605d38ed1a3e99a312ae37ce43a', 0);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `visitor_ip` text NOT NULL,
  `visit_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `account_id`, `visitor_ip`, `visit_date`) VALUES
(1, 10, '::1', '2020-03-07 06:30:11'),
(2, 9, '::1', '2020-01-21 06:30:11'),
(5, 26, '::1', '2019-09-26 06:30:11'),
(12, 10, '127.0.0.1', '2019-12-22 17:17:04'),
(13, 14, '::1', '2019-10-18 10:26:44'),
(14, 10, '192.168.64.1', '2019-12-22 13:44:00'),
(15, 9, '192.168.64.1', '2019-12-22 15:06:22'),
(16, 10, '192.168.2.16', '2019-12-29 18:10:31'),
(17, 14, '192.168.64.1', '2020-01-03 13:25:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `custom_links`
--
ALTER TABLE `custom_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_links_clicks`
--
ALTER TABLE `custom_links_clicks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links_clicks`
--
ALTER TABLE `social_links_clicks`
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
-- AUTO_INCREMENT for table `custom_links`
--
ALTER TABLE `custom_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `custom_links_clicks`
--
ALTER TABLE `custom_links_clicks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `social_links_clicks`
--
ALTER TABLE `social_links_clicks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
