-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 21, 2018 at 05:35 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ClientDatabases-33353a30`
--
CREATE DATABASE IF NOT EXISTS `ClientDatabases-33353a30` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ClientDatabases-33353a30`;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` bigint(20) NOT NULL,
  `date` datetime NOT NULL,
  `text` varchar(255) NOT NULL,
  `userId` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `date`, `text`, `userId`) VALUES
(8, '2018-05-21 18:27:55', 'Lorem ipsum, ... &lt;br&gt;Testing one, two, three...', 3);

-- --------------------------------------------------------

--
-- Table structure for table `postImages`
--

CREATE TABLE `postImages` (
  `id` bigint(20) NOT NULL,
  `postId` bigint(20) NOT NULL,
  `imageName` varchar(255) NOT NULL,
  `extension` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postImages`
--

INSERT INTO `postImages` (`id`, `postId`, `imageName`, `extension`) VALUES
(18, 8, '1', 'png'),
(19, 8, '2', 'png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `signupDate` datetime NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mm` int(2) NOT NULL,
  `dd` int(2) NOT NULL,
  `yy` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `signupDate`, `fname`, `lname`, `profile`, `email`, `phone`, `country`, `password`, `mm`, `dd`, `yy`) VALUES
(3, '2018-05-16 16:08:06', 'Peter', 'Mukiibi', '', 'coderscave1@gmail.com', '256703396923', 'Uganda', '9a948d553c8098ed0960688c295f28ed', 6, 1, 1997);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postImages`
--
ALTER TABLE `postImages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `postImages`
--
ALTER TABLE `postImages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
