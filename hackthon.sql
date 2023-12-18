-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2022 at 03:11 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hackthon`
--

-- --------------------------------------------------------

--
-- Table structure for table `famousfood`
--

CREATE TABLE `famousfood` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `district` varchar(1000) NOT NULL,
  `history` varchar(1000) NOT NULL,
  `location` varchar(1000) NOT NULL,
  `image3` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `famousfood`
--

INSERT INTO `famousfood` (`id`, `name`, `district`, `history`, `location`, `image3`) VALUES
(1, 'pongal', 'madurai', 'dsdfs', 'dsvdf', 'asus-computer-electronic-gamer-wallpaper-preview.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `famousplace`
--

CREATE TABLE `famousplace` (
  `id` int(11) NOT NULL,
  `name` mediumtext NOT NULL,
  `district` longtext NOT NULL,
  `history` mediumtext NOT NULL,
  `location` mediumtext NOT NULL,
  `image3` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `famousplace`
--

INSERT INTO `famousplace` (`id`, `name`, `district`, `history`, `location`, `image3`) VALUES
(16, 'nayakkarplace', 'madurai', 'gdgdfh', 'hgjgd', 'IMG-20220208-WA0076.jpg'),
(17, 'sample2', 'mew', 'jhdgshjhd', 'sdhyegfj', 'bg.jfif'),
(18, 'sample2', 'madurai', 'this is sample 2 madurai city', 'madurai', 'parrot.png');

-- --------------------------------------------------------

--
-- Table structure for table `famoustable`
--

CREATE TABLE `famoustable` (
  `number` bigint(20) NOT NULL,
  `country` varchar(1000) NOT NULL,
  `state` varchar(1000) NOT NULL,
  `district` varchar(1000) NOT NULL,
  `city` varchar(1000) NOT NULL,
  `famousplace` varchar(1000) NOT NULL,
  `famousfood` varchar(1000) NOT NULL,
  `famousfriut` varchar(1000) NOT NULL,
  `handicraft` varchar(1000) NOT NULL,
  `farming` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `famoustable`
--

INSERT INTO `famoustable` (`number`, `country`, `state`, `district`, `city`, `famousplace`, `famousfood`, `famousfriut`, `handicraft`, `farming`) VALUES
(1, 'india', 'tamilnadu', 'madurai', 'maduari', 'nayakkarplace', 'pongal', 'mango', 'traler', 'yes,avaible'),
(5, 'paki', 'toki', 'mew', 'mewtwo', 'sample2', 'briyani', 'mangrew', 'trio', 'no,not'),
(6, 'india', 'cxcvx', 'fdb', 'cgbg', 'cgbg', 'cvbcv', 'gcbgb', 'cgbg', 'cvbv');

-- --------------------------------------------------------

--
-- Table structure for table `statesanddistrict`
--

CREATE TABLE `statesanddistrict` (
  `number` bigint(20) NOT NULL,
  `country` varchar(1000) NOT NULL,
  `state` varchar(1000) NOT NULL,
  `district` varchar(1000) NOT NULL,
  `city` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statesanddistrict`
--

INSERT INTO `statesanddistrict` (`number`, `country`, `state`, `district`, `city`) VALUES
(52, 'india', 'tamilnadu', 'madurai', 'maduari'),
(53, 'india', 'tamilnadu', 'madurai', 'ahaniyur'),
(60, 'paki', 'toki', 'mew', 'mewtwo'),
(61, 'cvc', 'cbc', 'gbf', 'fbfg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `famousfood`
--
ALTER TABLE `famousfood`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `famousplace`
--
ALTER TABLE `famousplace`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `famoustable`
--
ALTER TABLE `famoustable`
  ADD PRIMARY KEY (`number`);

--
-- Indexes for table `statesanddistrict`
--
ALTER TABLE `statesanddistrict`
  ADD PRIMARY KEY (`number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `famousfood`
--
ALTER TABLE `famousfood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `famousplace`
--
ALTER TABLE `famousplace`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `famoustable`
--
ALTER TABLE `famoustable`
  MODIFY `number` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `statesanddistrict`
--
ALTER TABLE `statesanddistrict`
  MODIFY `number` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
