-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2015 at 06:56 PM
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
  `user` varchar(20) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactlist`
--

INSERT INTO `contactlist` (`contactId`, `user`, `firstname`, `lastname`, `email`) VALUES
(1, 'lk', 'lesley', 'khuu', 'lesleykhuu'),
(2, 'lk', 'bob', 'wang', 'dang'),
(3, 'lk', 'yolo', 'swag', 'boi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('105 or 1=1', 'fd7d2e54008c0cc0bdf37de6fe10bd1b5e46317f7c15deed'),
('aa', 'af4959dd87f673dc0f615a5434ca5ee1ba2752f07baeb16d'),
('asdas', '2e842454356af3fc10cf4fa66a55757eb3007c8defbfa39a'),
('asdasdf', 'd916cdc4c1e7cb899ab8f64500134057c6da7e6ae0d02c62'),
('asde', '38b58460c8ecacb628c66af32ccf07b9979398525ec5e1b1'),
('asdf', 'adsf'),
('asdfasdf', 'asdfasdf'),
('asdfasdfas', 'd916cdc4c1e7cb899ab8f64500134057c6da7e6ae0d02c62'),
('asdfasdfasd', 'c7f6092beca6e8fa556163025cc4f1db95d321e54b19762e'),
('asdfasdfasdfasdf', '223c9a0e319c7401441a'),
('asdfasdfasf', 'a6ce1bd6c6754725b7e9e6d6dbeeb34f97800933713ddfc6'),
('aswerqer', '26ddd44f2fef97c1edcfdce33d632344899d941db62aeaa0'),
('guccci', '25fc970a2ea233c9bb34'),
('gucci', '25fc970a2ea233c9bb34'),
('hihiasi', 'eeba5b09cf0979ed3b54'),
('hihiasiwqerwqe', '25fc970a2ea233c9bb34'),
('l', '4dbf51c7f3089a3d15ea3650084cb09a8bc1798b43beea45'),
('lesl12', '25fc970a2ea233c9bb34'),
('lesley', 'khuu'),
('lesley1', '916ea2883d1b55599a21'),
('lesleykhuu', '25fc970a2ea233c9bb34'),
('lesleykhuuww', '25fc970a2ea233c9bb34'),
('lesleysdfasd', '25fc970a2ea233c9bb34'),
('lesleyyasdfasd', '223c9a0e319c7401441a'),
('lesleyyyy', '25fc970a2ea233c9bb34'),
('lk', '9e969111e84c9e7836170ef7c3b8de776b66085f280dc6dc'),
('qwerqwer', '223c9a0e319c7401441a'),
('root', 'eeba5b09cf0979ed3b54'),
('s', '9dcde2a89f9afd1a7c9024ace9a075df13c584f11f40d14a'),
('sd', '9dcde2a89f9afd1a7c9024ace9a075df13c584f11f40d14a'),
('sdf', '25fc970a2ea233c9bb34e0c3a5d13112d171a8ce63961887'),
('wer', '2cfd7f6f336288a7f274'),
('werqer', 'eeba5b09cf0979ed3b54'),
('yoyo', 'eeba5b09cf0979ed3b54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactlist`
--
ALTER TABLE `contactlist`
  ADD PRIMARY KEY (`contactId`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactlist`
--
ALTER TABLE `contactlist`
  MODIFY `contactId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
