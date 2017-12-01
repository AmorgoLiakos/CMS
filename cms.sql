-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2017 at 09:59 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `artimageurl` varchar(255) NOT NULL,
  `authorid` int(11) NOT NULL,
  `createdate` date NOT NULL,
  `categories` varchar(50) NOT NULL,
  `published` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `artimageurl`, `authorid`, `createdate`, `categories`, `published`) VALUES
(1, 'Test No1', 'Kalispera kurioi!!! aefgojlsdfgns ligsl gnsldfjgn lskfjng snfg lsfn gserignalgnnljgkn slnfgl jsng', 'images/59b3cfaaf422a.jpg', 1, '2017-09-09', 'Food', 1),
(2, 'Title', 'pdfokadpfoka pfoka pfokapdfkpaofdkpoafpok apfokap kfpaokfp akfpo akpfok paofk poak fpoakp fokapofk apofkapo kfpak fpo akd fopkapofkpkfpoiaalkjfnlkjgn', 'images/59b6e70a89cfe.jpg', 1, '2017-09-11', 'Sports', 1),
(3, 'Update No33', 'Kalispera kai kalil vradia, mas exete skotisei ta autia!!!', 'images/59b6e5e114f79.jpg', 1, '2017-09-11', 'Decoration', 1),
(4, 'Update Και τα Μυαλά!!!', 'Στο Μίξερ!!!δαφαδφαδ αδφαδ φερ αερφzxcvxzc bv serg sfg', 'images/59b6e6e84fa26.jpg', 1, '2017-09-11', 'Fashion', 1),
(5, 'Dokimi Update Date', 'Tipota syntaraktiko re gamw ta spanakia!!!', 'images/59b6e807bd3dc.jpg', 1, '2017-09-11', 'Games', 1),
(6, 'Trixes Apo Papia', 'dfa fd afoapk kafpdo kfprok apweok akdfpoak pekafwpoek fpwokf p', 'images/59b49ab463964.jpg', 1, '2017-09-10', 'Food', 1),
(7, 'Final???', 'An eixame lusei to search ola tha itan poli kalutera!!!! Allo kai kalisperes!!!', 'images/59b5a6e7a05e4.jpg', 1, '2017-09-10', 'Fashion', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categoryname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categoryname`) VALUES
(1, 'Sports'),
(2, 'Fashion'),
(3, 'Food'),
(4, 'Travel'),
(6, 'Decoration'),
(7, 'Games'),
(8, 'Cooking');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menuname` varchar(50) NOT NULL,
  `menuposition` int(11) NOT NULL,
  `menucategory` varchar(50) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menuname`, `menuposition`, `menucategory`, `active`) VALUES
(1, 'Sports', 1, 'Sports', 1),
(2, 'Fashion', 2, ' Fashion', 1),
(3, 'Food', 3, 'Food', 1),
(4, 'Travel', 4, 'Travel', 1),
(6, 'Decoration', 5, ' Decoration', 1),
(7, 'Games', 6, 'Games ', 1),
(8, 'Cooking', 7, 'Cooking ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `imageurl` varchar(255) NOT NULL,
  `isadmin` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `name`, `surname`, `username`, `email`, `password`, `imageurl`, `isadmin`, `active`) VALUES
(1, 'Liakos', 'Prekas', 'AmorgoLiakos', 'katharma7@hotmail.com', '9eccf320e53607e2b9ac6fa27030479b', 'images/59a9e7614072b.jpg', 1, 1),
(2, 'Stavros', 'Cris', 'Rookos', 'rookos@rookos.gr', '467b617fec4d9fcb63505734ee224851', 'images/59b0349b2a007.jpg', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
