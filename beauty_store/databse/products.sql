-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2020 at 11:13 AM
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
-- Database: `beauty_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(50) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_desc` varchar(100) NOT NULL,
  `product_info` varchar(350) NOT NULL,
  `product_image` blob NOT NULL,
  `product_CategoryId` int(11) DEFAULT NULL,
  `product_archif` int(11) DEFAULT 0,
  `product_date` date NOT NULL,
  `Sou_CategoryId` int(3) NOT NULL,
  `Trending_Product` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_price`, `product_desc`, `product_info`, `product_image`, `product_CategoryId`, `product_archif`, `product_date`, `Sou_CategoryId`, `Trending_Product`) VALUES
(53, 'r,yry,', 0, '<p>yj,</p>', '<p>ryj,</p>', 0x626f6f7473747261702d72696e672e706e67, 1, 0, '2020-07-23', 2, 0),
(54, 'j,yy', 200, '<p>j,ryy</p>', '<p>jry,</p>', 0x626f6f7473747261702d72696e672e706e67, 3, 0, '2020-07-23', 2, 1),
(55, 'yrj,ry', 200, '<p>enj,</p>', '<p>yhzt</p>', 0x622e6a7067, 2, 0, '2020-07-23', 3, 0),
(56, 'poss', 20, '<p>gbrgr</p>', '<p>ggv</p>', 0x642e6a7067, 2, 0, '2020-07-23', 3, 1),
(57, 'grb', 20, '<p>gbg</p>', '<p>grb</p>', 0x652e6a7067, 2, 0, '2020-07-23', 1, 0),
(58, 'gbrbgrg', 200, '<p>rbggb</p>', '<p>grbgr</p>', 0x622e6a7067, 2, 0, '2020-07-23', 6, 1),
(59, 'test', 199, '<p>grbrg</p>', '<p>grbgr</p>', 0x626f6f7473747261702d72696e672e706e67, 3, 0, '2020-07-23', 3, 0),
(60, 'grbrbg', 2000, '<p>rgbdgr</p>', '<p>rbdrzg</p>', 0x612e6a7067, 3, 0, '2020-07-23', 2, 0),
(61, 'rgnb', 199, '<p>rgndr</p>', '<p>rgbdr</p>', 0x632e6a7067, 1, 0, '2020-07-23', 3, 0),
(62, 'miw', 200, '<p>rgdnrgn</p>', '<p>rgbxdvg</p>', 0x642e6a7067, 4, 0, '2020-07-23', 3, 0),
(63, 'dj,j,', 517, '<p>,jsjg,</p>', '<p>,jg,</p>', 0x662e6a7067, 2, 0, '2020-07-23', 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
