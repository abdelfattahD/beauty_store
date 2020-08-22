-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 20 juil. 2020 à 00:26
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecomme`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin_users`
--

CREATE TABLE `admin_users` (
  `id_admin` int(50) NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(20) NOT NULL,
  `password2` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin_users`
--

INSERT INTO `admin_users` (`id_admin`, `firstname`, `lastname`, `email`, `password`, `password2`) VALUES
(1, 'Abderrahim', 'Bounaga', 'abderrahimbounaga60@gmail.com', 'abderrahim', 'abderrahim'),
(2, 'Abderrahim', 'Bounaga', 'aboodbounaga@gmail.com', 'aaaaaa', ''),
(3, 'Abderrahim', 'Bounaga', 'aboodbng2@gmail.com', 'hhhhhh', '');

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `client_id` int(50) NOT NULL,
  `item_id` int(50) NOT NULL,
  `item_title` varchar(50) NOT NULL,
  `item_image` varchar(50) NOT NULL,
  `item_price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `product_id` int(50) NOT NULL,
  `product_title` varchar(50) NOT NULL,
  `product_image` varchar(50) NOT NULL,
  `product_desc` varchar(100) NOT NULL,
  `product_info` varchar(100) NOT NULL,
  `product_price` int(50) NOT NULL,
  `product_date` int(50) NOT NULL,
  `idCatégorie` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_image`, `product_desc`, `product_info`, `product_price`, `product_date`, `idCatégorie`) VALUES
(2, 'asta', 'banner-02.jpg', '                        kkkkkkkkkk', '                        hhhhhhhhhh', 400, 0, 0),
(3, 'asta', 'banner-02.jpg', '                        hhhhhhhhh', '                        hhhhhhh', 50, 0, 0),
(4, 'coffee', 'banner-04.jpg', 'ggggggggggggggg', 'hhhhhhhhhhhhh', 30, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(80) NOT NULL,
  `firstname` varchar(70) NOT NULL,
  `lastname` varchar(70) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(20) NOT NULL,
  `password2` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `password2`) VALUES
(1, 'Abderrahim', 'Bounaga', 'bounaga1997@gmail.com', 'aaaaaa', ''),
(3, 'Abderrahim', 'Bounaga', 'lucamok145@gmail.com', 'hhhhhh', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`client_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id_admin` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `client_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
