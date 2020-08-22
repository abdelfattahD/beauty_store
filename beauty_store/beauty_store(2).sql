-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2020 at 11:34 AM
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
-- Table structure for table `adminusers`
--

CREATE TABLE `adminusers` (
  `id_admin` int(11) NOT NULL,
  `email_admin` varchar(100) DEFAULT NULL,
  `password_admin` varchar(30) DEFAULT NULL,
  `Fname_admin` varchar(20) NOT NULL,
  `Lname_admin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminusers`
--

INSERT INTO `adminusers` (`id_admin`, `email_admin`, `password_admin`, `Fname_admin`, `Lname_admin`) VALUES
(1, 'abdelmatari36@gmail.com', '123456789', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `client_id` int(50) NOT NULL,
  `item_id` int(50) NOT NULL,
  `item_title` varchar(50) NOT NULL,
  `item_image` varchar(50) NOT NULL,
  `item_price` int(50) NOT NULL,
  `item_quantity` int(20) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`client_id`, `item_id`, `item_title`, `item_image`, `item_price`, `item_quantity`) VALUES
(43, 55, 'yrj,ry', 'b.jpg', 200, 1),
(43, 56, 'poss', 'd.jpg', 19, 1),
(43, 59, 'test', 'bootstrap-ring.png', 171, 1),
(43, 64, 'test 1', 'h.jpg', 9997, 1),
(43, 65, 'test 2', 'bootstrap-ecommerce-templates.PNG', 398, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Id` int(5) NOT NULL,
  `Category_title` varchar(50) NOT NULL,
  `Category_image` blob NOT NULL,
  `promo_categorie` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Id`, `Category_title`, `Category_image`, `promo_categorie`) VALUES
(14, 'face', 0x6361726f7573656c332e706e67, 10),
(15, 'cheeks ', 0x36646631646365376139663531646463653565633265353531643533373232335f69636f6e2e706e67, 60),
(16, 'sets', 0x642e77656270, 0),
(17, 'brows', 0x64642e6a7067, 0),
(18, 'lips', 0x64642e6a7067, 0),
(19, 'nails', 0x64642e706e67, 0),
(20, 'eyes', 0x64642e6a7067, 0),
(21, 'test', 0x632e6a7067, 0);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `coupon_title` varchar(225) NOT NULL,
  `coupon_price` varchar(225) NOT NULL,
  `coupon_code` varchar(225) NOT NULL,
  `coupon_limit` int(100) NOT NULL,
  `coupon_used` int(100) NOT NULL,
  `coupon_type` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `product_id`, `coupon_title`, `coupon_price`, `coupon_code`, `coupon_limit`, `coupon_used`, `coupon_type`) VALUES
(3, 62, 'test comp', '10', '123456789', 4, 4, 0),
(5, 15, 'yyy', '5', '2333', 5, 1, 1);

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
  `Trending_Product` int(2) NOT NULL DEFAULT 0,
  `promo_product` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_price`, `product_desc`, `product_info`, `product_image`, `product_CategoryId`, `product_archif`, `product_date`, `Sou_CategoryId`, `Trending_Product`, `promo_product`) VALUES
(53, 'r,yry,', 16, '<p>yj,</p>', '<p>ryj,</p>', 0x626f6f7473747261702d72696e672e706e67, 14, 0, '2020-07-23', 2, 0, 20),
(54, 'j,yy', 200, '<p>j,ryy</p>', '<p>jry,</p>', 0x626f6f7473747261702d72696e672e706e67, 15, 0, '2020-07-23', 2, 1, 0),
(55, 'yrj,ry', 200, '<p>enj,</p>', '<p>yhzt</p>', 0x622e6a7067, 14, 0, '2020-07-23', 3, 0, 50),
(56, 'poss', 20, '<p>gbrgr</p>', '<p>ggv</p>', 0x642e6a7067, 15, 0, '2020-07-23', 3, 1, 0),
(57, 'grb', 20, '<p>gbg</p>', '<p>grb</p>', 0x652e6a7067, 16, 0, '2020-07-23', 1, 0, 60),
(58, 'gbrbgrg', 200, '<p>rbggb</p>', '<p>grbgr</p>', 0x622e6a7067, 16, 0, '2020-07-23', 6, 1, 0),
(59, 'test', 199, '<p>grbrg</p>', '<p>grbgr</p>', 0x626f6f7473747261702d72696e672e706e67, 15, 0, '2020-07-23', 3, 0, 0),
(60, 'grbrbg', 2000, '<p>rgbdgr</p>', '<p>rbdrzg</p>', 0x612e6a7067, 17, 0, '2020-07-23', 2, 0, 0),
(61, 'rgnb', 199, '<p>rgndr</p>', '<p>rgbdr</p>', 0x632e6a7067, 17, 0, '2020-07-23', 3, 0, 0),
(62, 'miw', 200, '<p>rgdnrgn</p>', '<p>rgbxdvg</p>', 0x642e6a7067, 18, 0, '2020-07-23', 3, 0, 10),
(63, 'dj,j,', 517, '<p>,jsjg,</p>', '<p>,jg,</p>', 0x662e6a7067, 14, 0, '2020-07-23', 4, 1, 0),
(64, 'test 1', 9997, '<p>bzbrgb</p>', '<p>boianklg</p>', 0x682e6a7067, 14, 0, '2020-07-23', 3, 1, 14),
(65, 'test 2', 398, '<p>bnhtn</p>', '<p>thbrzyb</p>', 0x626f6f7473747261702d65636f6d6d657263652d74656d706c617465732e504e47, 14, 0, '2020-07-23', 7, 0, 0),
(66, 'catigory test', 1002, '<p>grfeq</p>', '<p>rfz</p>', 0x70726f647563742d736d2d312e706e67, 14, 0, '2020-07-28', 2, 1, 0),
(67, 'test 2', 200, '<p>\"yhbzgb</p>', '<p>\"h(yubg</p>', 0x642e77656270, 17, 0, '2020-07-28', 10, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id_slide` int(10) NOT NULL,
  `image_slide` varchar(90) NOT NULL,
  `title_slide` varchar(20) NOT NULL,
  `desc_slide` varchar(20) NOT NULL,
  `archif_slide` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id_slide`, `image_slide`, `title_slide`, `desc_slide`, `archif_slide`) VALUES
(1, 'Grand-Seiko-Elegant-slider.jpg', 'new collection 2019', 'new collection 2019', 0),
(2, 'Cartier-Santos-Dumont-slider.jpg', 'clasic watch', 'best calsic watch 20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sou_category`
--

CREATE TABLE `sou_category` (
  `Sou_Category_id` int(3) NOT NULL,
  `Sou_Category_title` varchar(50) NOT NULL,
  `Id` int(5) NOT NULL,
  `sou_categories_img` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sou_category`
--

INSERT INTO `sou_category` (`Sou_Category_id`, `Sou_Category_title`, `Id`, `sou_categories_img`) VALUES
(1, 'mascara', 15, ''),
(2, 'eyeshadow', 14, ''),
(3, 'Eyeshadow', 14, ''),
(4, 'singleeyeshadow', 14, ''),
(5, 'liquideyeshadow', 15, ''),
(6, 'pigment', 14, ''),
(7, 'eyeliner', 17, ''),
(9, 'test1', 17, ''),
(10, 'test2', 19, ''),
(11, 'tes', 20, ''),
(12, 'test1', 20, ''),
(13, 'test1', 19, ''),
(14, 'test1', 18, ''),
(15, 'tes', 16, ''),
(16, 'test', 18, ''),
(17, 'test1', 18, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Fname` varchar(60) DEFAULT NULL,
  `Lname` varchar(60) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Fname`, `Lname`, `Email`, `Password`) VALUES
(29, 'ABDELFATTAH', 'HAISSOUN', 'abdelmatari36@gmail.com', '$2y$10$ZuwQg8bVjykqGMlmr8'),
(30, 'ABDELFATTAH', 'HAISSOUN', 'abdelfatahhaissoun@hotmail.com', '$2y$10$Fz3TE9ASTrFcFZsmYX'),
(31, 'ABDELFATTAH', 'HAISSOUN', 'abdelfataetgvehhaissoun@hotmail.com', '$2y$10$mbi9whCtRT.d4fHsIO'),
(32, 'vaq', 'vqefb', 'abdefvelfatahhaissoun@hotmail.com', '$2y$10$FxYx1DrE5SIxEgDhQ3'),
(33, 'ABDELFATTAH', 'HAISSOUN', 'ffabdelfatahhaissoun@hotmail.com', '$2y$10$4VP2FQOiCIC1TmGSzx'),
(34, 'ABDELFATTAH', 'HAISSOUN', 'dll@hotmail.com', '$2y$10$NF4fMkcr6H56fTHSnF'),
(35, 'ABDELFATTAH', 'HAISSOUN', 'ss@hotmail.com', 'aA2+ibiujb'),
(40, 'abdo', 'abdelfattah', 'koko@gmail.com', '$2y$10$kwbufnPQLbnKaGDX6q'),
(43, 'abdelfatah', 'abdelfattah', 'kokok@gmail.com', '$2y$10$BF4dq3UNtMySGEhWxg.83eI3ezYskko9W6pTo0Wa.GYxuZFPr2Ob.'),
(44, 'abdotest', 'test', 'abdelmatari11@gmail.com', '$2y$10$4DQXrx.fjh71IVSyM1mR7.jB8DxbE5sBTS3nKpn/cDP2heNUovphS'),
(45, 'fve', 'vffdvf', 'kokffffok@gmail.com', '$2y$10$TWkzn3v0aRUFn36sTXN/k.H1LXiJkOkUO/7OTY/ODonCFqXplTyt.'),
(46, 'geqbg', 'gqbqgv', 'kokgggo@gmail.com', '$2y$10$fghZnoKP8EZk2vdwxaj4tuaC384GGbvhjSVHBq.yC9JIxBWksMIWa'),
(47, 'fvfs', 'vevffsce', 'kokvvvok@gmail.com', '$2y$10$jKZL5mglcUDV2FOXXkqvS.j5gHXD4K4y.MFnfveoQCDJyVLYVwL0O');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminusers`
--
ALTER TABLE `adminusers`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id_slide`);

--
-- Indexes for table `sou_category`
--
ALTER TABLE `sou_category`
  ADD PRIMARY KEY (`Sou_Category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminusers`
--
ALTER TABLE `adminusers`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id_slide` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sou_category`
--
ALTER TABLE `sou_category`
  MODIFY `Sou_Category_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
