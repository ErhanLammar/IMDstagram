-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 16, 2016 at 05:12 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imdstagram`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentid` int(11) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `followid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `followerid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likes_user`
--

CREATE TABLE `likes_user` (
  `likesid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postid` int(11) NOT NULL,
  `post` varchar(300) NOT NULL,
  `likes` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `picture` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersid` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profileimage` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersid`, `firstname`, `lastname`, `username`, `email`, `password`, `profileimage`) VALUES
(1, 'Erhan', 'Lammar', 'erhan', 'erhan@erhanlammar.be', '$2y$12$3Ueoni9inpfDNjDCtR4Byu5b8nb48ECfph4pP9x1M9u8vyk7yetUG', ''),
(2, 'Jacky', 'Lafon', 'Lafon', 'J.lafon@gmail.com', '$2y$12$oqtQfCZXFB.SDvvR3iG7V.PFthI05IxNnbbGaXahCQPfmlPx2Ocv.', ''),
(3, 'Erhan', 'Lammar', 'elammar', 'erhan@lammar.be', '$2y$12$10twnc846SW1aPLzvvtgNeXcOx5TAwiNBWL/HrClluic6u0XoQPOm', ''),
(4, 'Erhan', 'Lammar', 'lammar', 'erhan.lammar@gmail.com', '$2y$12$h1PJFve3gHw5B0VgJ1/FPuyedx0zINhoUnCJaIaheiduMlkF03QDO', ''),
(5, 'Lisa', 'Deroose', 'Lisa', 'lisa@deroose.be', '$2y$12$zSE.5JCFL3beNypGlBzqBOtOc23/j19V8IxiERWXu3ouMKUizNjxK', ''),
(6, 'Johan ', 'Vandelanoite', 'Mieke', 'J.vandelanoite@gmail.com', '$2y$12$Sl4V.B8wxaACSFsf6caHceWPhxGeHFOEm9Vmw4MzXP0RSn8hUsD52', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`followid`);

--
-- Indexes for table `likes_user`
--
ALTER TABLE `likes_user`
  ADD PRIMARY KEY (`likesid`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `followid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `likes_user`
--
ALTER TABLE `likes_user`
  MODIFY `likesid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
