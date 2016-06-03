-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2016 at 03:33 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactlist`
--

CREATE TABLE `contactlist` (
  `contactId` int(11) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactlist`
--

INSERT INTO `contactlist` (`contactId`, `lastname`, `email`, `user`, `firstname`) VALUES
(1, 'khuu', 'lk', 1, 'lesley'),
(2, 'wang', 'bro', 1, 'ted'),
(3, 'po', 'po', 1, 'po'),
(4, 'lee', 'beo', 3, 'bob'),
(5, 'bro', 'doe', 3, 'joe'),
(6, '', '', 1, ''),
(7, '', '', 1, ''),
(8, '', '', 1, ''),
(9, '', '', 1, ''),
(10, '', '', 1, ''),
(11, '', '', 1, ''),
(12, '', '', 1, ''),
(13, '', '', 1, ''),
(14, '', '', 1, ''),
(15, '', '', 1, ''),
(16, '', '', 1, ''),
(17, '', '', 1, ''),
(18, '', '', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `fieldrelation`
--

CREATE TABLE `fieldrelation` (
  `user` int(11) NOT NULL,
  `field` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE `fields` (
  `fieldid` int(11) NOT NULL,
  `fieldname` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `user`) VALUES
('lk', '9e969111e84c9e7836170ef7c3b8de776b66085f280dc6dc', 1),
('yoyo', '39e4bda1774cd6e5b11ca4c595927838e05a7503ea11e5b9', 2),
('po', '42ab1d524cf3ebcd4e22c8e71e6c5c2e0dc6e3e8a61085b2', 3),
('hello', 'de120e09571917a767e7e8cae6739c256f168d2030f0a6b8', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactlist`
--
ALTER TABLE `contactlist`
  ADD PRIMARY KEY (`contactId`);

--
-- Indexes for table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`fieldid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactlist`
--
ALTER TABLE `contactlist`
  MODIFY `contactId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `fieldid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
