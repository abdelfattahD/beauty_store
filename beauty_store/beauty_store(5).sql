-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2020 at 04:56 PM
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
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id_blog` int(11) NOT NULL,
  `title_blog` varchar(20) NOT NULL,
  `parg_blog` varchar(300) NOT NULL,
  `blog_img` blob NOT NULL,
  `blog_date` date NOT NULL,
  `blog_archive` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id_blog`, `title_blog`, `parg_blog`, `blog_img`, `blog_date`, `blog_archive`) VALUES
(1, 'test blog', '<p>test test test</p>', 0x6c2d706f73742d312e6a7067, '2020-08-17', 0),
(2, 'test blog2', '<p>eteaqhqryhjqrj</p>', 0x6d2d626c6f672d322e6a7067, '2020-08-17', 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Id` int(5) NOT NULL,
  `Category_title` varchar(50) NOT NULL,
  `Category_image` blob NOT NULL,
  `promo_categorie` int(3) DEFAULT NULL,
  `promo_Dline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Id`, `Category_title`, `Category_image`, `promo_categorie`, `promo_Dline`) VALUES
(14, 'face', 0x6361726f7573656c332e706e67, 0, '2020-08-24'),
(15, 'cheeks ', 0x36646631646365376139663531646463653565633265353531643533373232335f69636f6e2e706e67, 0, '0000-00-00'),
(16, 'sets', 0x642e77656270, 20, '2020-08-31'),
(17, 'brows', 0x64642e6a7067, 0, '2020-08-05'),
(18, 'lips', 0x64642e6a7067, 0, '0000-00-00'),
(19, 'nails', 0x64642e706e67, 0, '0000-00-00'),
(20, 'eyes', 0x64642e6a7067, 30, '2020-08-31'),
(21, 'test', 0x632e6a7067, 0, '0000-00-00');

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
(5, 15, 'yyy', '5', '2333', 5, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `image_pro` text NOT NULL,
  `title_pro` text NOT NULL,
  `qty` int(10) NOT NULL,
  `color` text NOT NULL,
  `size` text NOT NULL,
  `order_date` date NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `image_pro`, `title_pro`, `qty`, `color`, `size`, `order_date`, `order_status`) VALUES
(1, 48, 10, 1625527977, '', 'bfg', 1, '', '', '2020-08-22', 'Complete'),
(2, 48, 200, 1790115226, 'bootstrap-ring.png', 'color 2', 1, '', '', '2020-08-22', 'Complete'),
(3, 48, 10, 1790115226, 'c.jpg', 'bfg', 1, '', '', '2020-08-22', 'Complete'),
(4, 48, 98, 1790115226, 'c.jpg', 'product', 1, '', '', '2020-08-22', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`, `code`, `payment_date`) VALUES
(0, 1625527977, 10, 'wafa cash', 0, 0, '0000-00-00'),
(1, 1441251583, 120, 'Western Union', 123, 11234, '0000-00-00'),
(2, 164072955, 600, 'Western Union', 1234, 12345676, '0000-00-00'),
(3, 1605176076, 170, 'Western Union', 1234, 2897590, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(100) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `color` text NOT NULL,
  `qty` int(100) NOT NULL,
  `size` text NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `color`, `qty`, `size`, `order_status`) VALUES
(0, 48, 1444774980, 84, '', 1, '', 'pending');

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
  `promo_product` int(3) NOT NULL,
  `promo_Pdline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_price`, `product_desc`, `product_info`, `product_image`, `product_CategoryId`, `product_archif`, `product_date`, `Sou_CategoryId`, `Trending_Product`, `promo_product`, `promo_Pdline`) VALUES
(53, 'prodcut 1', 200, 'product Desc', 'product Info', 0x73686f7070696e672d636172742d74656d706c6174652e504e47, 14, 0, '2020-07-23', 2, 0, 20, '0000-00-00'),
(54, 'product', 200, 'product desc', 'product info', 0x622e6a7067, 15, 0, '2020-07-23', 2, 1, 0, '0000-00-00'),
(55, 'product', 160, 'product des', 'product info', 0x632e6a7067, 14, 0, '2020-07-23', 3, 0, 50, '0000-00-00'),
(56, 'product', 20, 'product desc', 'product info', 0x672e6a7067, 15, 0, '2020-07-23', 3, 1, 0, '0000-00-00'),
(57, 'product', 20, 'product Desc', 'product Info', 0x682e6a7067, 16, 0, '2020-07-23', 1, 0, 60, '0000-00-00'),
(58, 'product ', 200, 'product desc', 'product info', 0x73686f702d636172742e504e47, 16, 0, '2020-07-23', 6, 1, 0, '0000-00-00'),
(59, 'product', 199, 'product desc', 'product info', 0x6a2e6a7067, 15, 0, '2020-07-23', 3, 0, 0, '0000-00-00'),
(60, 'product  ', 2000, 'product desc', 'product info', 0x652e6a7067, 17, 0, '2020-07-23', 2, 0, 0, '0000-00-00'),
(61, 'product  ', 199, 'product des', 'product info', 0x652e6a7067, 17, 0, '2020-07-23', 3, 0, 0, '0000-00-00'),
(62, 'product  ', 200, 'product desc', 'product info', 0x642e6a7067, 18, 0, '2020-07-23', 3, 0, 10, '0000-00-00'),
(63, 'product  ', 517, 'product desc', 'product info', 0x642e77656270, 14, 0, '2020-07-23', 4, 1, 0, '0000-00-00'),
(64, 'product  ', 9997, 'product desc', 'product info', 0x626f6f7473747261702d74656d706c6174652e706e67, 14, 0, '2020-07-23', 3, 1, 14, '0000-00-00'),
(65, 'product  ', 398, 'product desc', 'product info', 0x626f6f7473747261702d72696e672e706e67, 14, 0, '2020-07-23', 7, 0, 0, '0000-00-00'),
(66, 'product  ', 1002, 'product desc', 'product info', 0x626f6f7473747261702d74656d706c6174652e706e67, 14, 0, '2020-07-28', 2, 1, 0, '0000-00-00'),
(67, 'test 2', 200, '<p>\"yhbzgb</p>', '<p>\"h(yubg</p>', 0x642e77656270, 17, 0, '2020-07-28', 10, 0, 0, '0000-00-00'),
(68, 'prduct color test', 250, '<p>zrbrgbfbrt</p>', '<p>gvzrbzrbrb</p>', 0x626f6f7473747261702d74656d706c6174652e706e67, 15, 0, '2020-08-14', 11, 0, 0, '0000-00-00'),
(69, 'prduct color test', 250, '<p>zrbrgbfbrt</p>', '<p>gvzrbzrbrb</p>', 0x626f6f7473747261702d74656d706c6174652e706e67, 15, 0, '2020-08-14', 11, 0, 0, '0000-00-00'),
(70, 'prduct color test', 250, '<p>zrbrgbfbrt</p>', '<p>gvzrbzrbrb</p>', 0x626f6f7473747261702d74656d706c6174652e706e67, 15, 0, '2020-08-14', 11, 0, 0, '0000-00-00'),
(71, 'prduct color test', 250, '<p>zrbrgbfbrt</p>', '<p>gvzrbzrbrb</p>', 0x626f6f7473747261702d74656d706c6174652e706e67, 15, 0, '2020-08-14', 11, 0, 0, '0000-00-00'),
(72, 'test clor', 20, '<p>tgrztgg</p>', '<p>jknikefv</p>', 0x632e6a7067, 16, 0, '2020-08-14', 12, 0, 0, '0000-00-00'),
(73, 'test clor', 20, '<p>tgrztgg</p>', '<p>jknikefv</p>', 0x632e6a7067, 16, 0, '2020-08-14', 12, 0, 0, '0000-00-00'),
(74, 'test color', 200, '<p>gbgebt</p>', '<p>gvq</p>', 0x626f6f7473747261702d74656d706c6174652e706e67, 14, 0, '2020-08-14', 12, 0, 0, '0000-00-00'),
(75, 'tst cllr', 200, '<p>rgbgb</p>', '<p>gevev</p>', 0x626f6f7473747261702d74656d706c6174652e706e67, 15, 0, '2020-08-14', 10, 0, 0, '0000-00-00'),
(76, 'color 2', 200, '<p>rhtbeaqtbg</p>', '<p>gbegbhetb</p>', 0x626f6f7473747261702d72696e672e706e67, 16, 0, '2020-08-15', 2, 0, 0, '0000-00-00'),
(77, 'color 2f', 10, '<p>qtht</p>', '<p>tgtde</p>', 0x626f6f7473747261702d65636f6d6d657263652d74656d706c617465732e504e47, 15, 1, '2020-08-15', 2, 0, 0, '0000-00-00'),
(78, 'bfg', 10, '<p>rtht</p>', '<p>hrth</p>', 0x632e6a7067, 14, 0, '2020-08-15', 10, 0, 0, '0000-00-00'),
(79, 'test', 18, '<p>yg</p>', '<p>hbui</p>', 0x626f6f7473747261702d74656d706c6174652e706e67, 15, 0, '2020-08-15', 9, 0, 0, '0000-00-00'),
(80, 'product', 98, '<p>gw</p>', '<p>425</p>', 0x632e6a7067, 15, 0, '2020-08-15', 6, 0, 0, '0000-00-00'),
(81, 'product', 10, '<p>treg</p>', '<p>tgteg</p>', 0x632e6a7067, 14, 0, '2020-08-15', 4, 0, 0, '0000-00-00'),
(82, 'test video', 0, '<p>ggggg</p>', '<p>200</p>', 0x3237735f746f5f3536735f4d495f363435305f50726f647563745f50726f6d6f74696f6e5f566964656f732e6d7034, 15, 1, '2020-08-20', 9, 0, 0, '0000-00-00'),
(83, 'test video 2', 0, '<p>test</p>', '<p>test</p>', 0x626f6f7473747261702d65636f6d6d657263652d74656d706c617465732e504e47, 14, 1, '2020-08-20', 5, 0, 0, '0000-00-00'),
(84, 'test video 3', 20, '<p>test</p>', '<p>test</p>', 0x626f6f7473747261702d74656d706c6174652e706e67, 15, 0, '2020-08-20', 6, 0, 0, '0000-00-00'),
(85, 'test video 3', 20, '<p>test</p>', '<p>test</p>', 0x626f6f7473747261702d74656d706c6174652e706e67, 15, 0, '2020-08-20', 6, 0, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail` (
  `product_ids` int(11) NOT NULL,
  `product_price1` int(11) DEFAULT NULL,
  `product_price2` int(11) DEFAULT NULL,
  `product_price3` int(11) DEFAULT NULL,
  `product_image1` blob DEFAULT NULL,
  `product_image2` blob DEFAULT NULL,
  `product_video` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`product_ids`, `product_price1`, `product_price2`, `product_price3`, `product_image1`, `product_image2`, `product_video`) VALUES
(75, 200, 100, NULL, 0x626f6f7473747261702d65636f6d6d657263652d74656d706c617465732e504e47, 0x622e6a7067, NULL),
(81, 40, 140, NULL, 0x642e6a7067, 0x626f6f7473747261702d72696e672e706e67, NULL),
(82, 0, 200, NULL, '', '', NULL),
(83, 0, 200, NULL, '', 0x3237735f746f5f3536735f4d495f363435305f50726f647563745f50726f6d6f74696f6e5f566964656f732e6d7034, NULL),
(84, 13, 0, NULL, 0x632e6a7067, '', 0x3237735f746f5f3536735f4d495f363435305f50726f647563745f50726f6d6f74696f6e5f566964656f732e6d7034),
(85, 13, 0, NULL, 0x632e6a7067, '', 0x3237735f746f5f3536735f4d495f363435305f50726f647563745f50726f6d6f74696f6e5f566964656f732e6d7034);

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
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `term_id` int(10) NOT NULL,
  `term_title` varchar(100) NOT NULL,
  `term_link` varchar(100) NOT NULL,
  `term_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`term_id`, `term_title`, `term_link`, `term_desc`) VALUES
(1, 'Les conditions générales de vente :', 'conditions', 'Nous avons tous déjà vu ce long texte sur les sites de boutique en ligne. Il s\'agit en fait d\'un contrat tacite que passent le marchand et le client. Les deux parties doivent être d\'accord avec les termes des conditions générales de vente. Cependant, cela n\'autorise pas le commerçant d\'afficher des clauses abusives (contraires à la loi).\r\nExemple de clause abusive : Si une boutique en ligne de vente de produits électroniques ou informatiques indique qu\'en cas de panne pendant la garantie, le produit ne doit pas lui être retourné, mais qu\'il s\'agit d\'une \"garantie constructeur\", et que le client doit contacter le constructeur directement. C\'est une clause illégale. Le vendeur doit prendre en charge le produit qu\'il a vendu et s\'occuper de la réparation. Le client est en droit de retourner à la boutique, le produit en panne.\r\nDans les conditions générales de vente, n\'oubliez pas d\'aborder les points essentiels :\r\nCommencez par définir les noms des deux partis dans le texte,\r\nPrésenter la prestation.\r\nDescription du passage de commande,\r\nLes tarifs, les taxes, et la durée de validité des prix,\r\nLes modes de paiement,\r\nLa garantie,\r\nLes conditions de retour marchandise,\r\nDélai, prix et moyen de livraison,\r\nRappel du droit et du délai de rétractation sans frais et sans justification pendant 7 jours.\r\nL\'assistance téléphonique, Email, etc...\r\nLes limites de responsabilité,\r\nLes moyens de contacts, et leurs horaires,\r\nLes cas de force majeur,\r\nLe tribunal compétant en cas de litige,\r\nLe fonctionnement du logiciel de la boutique et ses compatibilités avec les OS,\r\nLes droits d\'auteur,');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Fname` varchar(60) DEFAULT NULL,
  `Lname` varchar(60) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `user_img` blob NOT NULL,
  `address` varchar(80) NOT NULL,
  `numero` text NOT NULL,
  `ville` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Fname`, `Lname`, `Email`, `Password`, `user_img`, `address`, `numero`, `ville`) VALUES
(48, 'abdelfattah', 'haissoun', 'abdelmatari36@gmail.com', '$2y$10$msmBuGcN2Si.6suUYxIeiurxsujoLkdr9o7cQzBVIWo51n9.zsCqC', 0x617574686f722e706e67, 'rmal N555 dyor hmrin', '0652852', 'youssoufia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminusers`
--
ALTER TABLE `adminusers`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_blog`);

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
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

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
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`term_id`);

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
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
