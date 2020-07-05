-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 05, 2020 at 09:21 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `localhub3`
--

-- --------------------------------------------------------

--
-- Table structure for table `Announcement`
--

CREATE TABLE `Announcement` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `disc` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `created` date NOT NULL,
  `recommend` int(11) NOT NULL DEFAULT 1,
  `userid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `field1` varchar(255) DEFAULT NULL,
  `field2` varchar(255) DEFAULT NULL,
  `field3` varchar(255) DEFAULT NULL,
  `field4` varchar(255) DEFAULT NULL,
  `likes` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Stage'),
(2, 'Job'),
(3, 'Shop'),
(4, 'Townhall'),
(5, 'Associations'),
(6, 'Tourst_Office'),
(7, 'Schools'),
(8, 'Library'),
(9, 'Event'),
(10, 'Companies');

-- --------------------------------------------------------

--
-- Table structure for table `favorite_profile`
--

CREATE TABLE `favorite_profile` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `AnnouncementId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `liketable`
--

CREATE TABLE `liketable` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idannouncement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `isAdmin` tinyint(4) NOT NULL DEFAULT 0,
  `isActive` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `isAdmin`, `isActive`) VALUES
(1, 'Mohammad', 'KANBAR', 'm@gmail.com', '6116afedcb0bc31083935c1c262ff4c9', 1, 1),
(2, 'ali', 'ali2', 'ali@gmail.com', '6116afedcb0bc31083935c1c262ff4c9', 1, 0),
(3, 'ahmed', 'daoud', 'ahmed@gmail.com', '6116afedcb0bc31083935c1c262ff4c9', 0, 1),
(4, 'Mohammad', 'KANBAR', 'nor2@gmail.com', '6116afedcb0bc31083935c1c262ff4c9', 0, 1),
(5, 'hadi', 'hadi', 'hadi@gmail.com', '6116afedcb0bc31083935c1c262ff4c9', 2, 1),
(6, 'Mohammad', 'KANBAR', 'ahmed33333@gmail.com', '6116afedcb0bc31083935c1c262ff4c9', 1, 1),
(7, 'Mohammad', 'KANBAR', 'mohamedkanbar8888@hotmail.com', '6116afedcb0bc31083935c1c262ff4c9', 0, 1),
(8, 'ali', 'alikanbar', 'ali23@gmail.com', '6116afedcb0bc31083935c1c262ff4c9', 1, 1),
(9, 'Mohammad', 'KANBAR', 'kkkk@gmail.com', '6116afedcb0bc31083935c1c262ff4c9', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Announcement`
--
ALTER TABLE `Announcement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `categoryid` (`categoryid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorite_profile`
--
ALTER TABLE `favorite_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`,`AnnouncementId`),
  ADD KEY `AnnouncementId` (`AnnouncementId`);

--
-- Indexes for table `liketable`
--
ALTER TABLE `liketable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduser` (`iduser`,`idannouncement`),
  ADD KEY `idannouncement` (`idannouncement`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Announcement`
--
ALTER TABLE `Announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `favorite_profile`
--
ALTER TABLE `favorite_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `liketable`
--
ALTER TABLE `liketable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Announcement`
--
ALTER TABLE `Announcement`
  ADD CONSTRAINT `Announcement_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Announcement_ibfk_2` FOREIGN KEY (`categoryid`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorite_profile`
--
ALTER TABLE `favorite_profile`
  ADD CONSTRAINT `favorite_profile_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorite_profile_ibfk_2` FOREIGN KEY (`AnnouncementId`) REFERENCES `Announcement` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `liketable`
--
ALTER TABLE `liketable`
  ADD CONSTRAINT `liketable_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `liketable_ibfk_2` FOREIGN KEY (`idannouncement`) REFERENCES `Announcement` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
