-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2022 at 12:22 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goodgoods`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `nomCategorie` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`nomCategorie`) VALUES
('animaux'),
('electromenager'),
('mobilier '),
('nourriture');

-- --------------------------------------------------------

--
-- Table structure for table `lignespanier`
--

CREATE TABLE `lignespanier` (
  `idProduit` int(11) NOT NULL,
  `idPanier` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

CREATE TABLE `panier` (
  `idPanier` int(11) NOT NULL,
  `date` date NOT NULL,
  `mailUtilisateur` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `idProduit` int(11) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `prix` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `nomCategorie` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`idProduit`, `nom`, `prix`, `description`, `nomCategorie`) VALUES
(1, 'O\'Hare Air', 130, 'Besoin de respirer ? Achetez notre air de haute qualité ! \r\nCertifiée sans pollution <3', 'nourriture'),
(2, 'Pomme de la reine', 78, 'Envie de fructose ? Cette douce pomme au goût caramélisée raviera vos papilles !\r\nGarantie sans \"additif\" <3', 'nourriture'),
(3, 'Miroir Magique', 600, 'Vous vous sentez seul ? Notre miroir vous tiendra compagnie !\r\nGarantie 100% magique <3', 'mobilier '),
(4, 'Omnidroide by Syndrome', 1000, 'Fatigué de faire le ménage ? Notre robot ménager prendra soin de votre intérieur !\r\nDélicatesse 100% garantie <3', 'electromenager'),
(5, 'Iago le perroquet', 30, 'Besoin d\'un ami fidèle ? Iago est le partenaire idéale pour vos moments de gossip !\r\nGarantie 100% fiable <3', 'animaux');

-- --------------------------------------------------------

--
-- Table structure for table `produitspartags`
--

CREATE TABLE `produitspartags` (
  `nomTag` varchar(32) NOT NULL,
  `idProduit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produitspartags`
--

INSERT INTO `produitspartags` (`nomTag`, `idProduit`) VALUES
('disney', 1),
('disney', 2),
('mort', 2),
('rouge', 2),
('disney', 3),
('magique', 3),
('vivant', 3),
('disney', 4),
('electrique', 4),
('disney', 5),
('rouge', 5),
('vivant', 5),
('volant', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `nomTag` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`nomTag`) VALUES
('disney'),
('electrique'),
('magique'),
('mort'),
('rouge'),
('vilain'),
('vivant'),
('volant');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `mail` varchar(32) NOT NULL,
  `mdp` varchar(32) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `adresse` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`nomCategorie`);

--
-- Indexes for table `lignespanier`
--
ALTER TABLE `lignespanier`
  ADD PRIMARY KEY (`idProduit`,`idPanier`),
  ADD KEY `fk_idpanier` (`idPanier`);

--
-- Indexes for table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`idPanier`),
  ADD KEY `fk_mailUtilisateur` (`mailUtilisateur`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`idProduit`),
  ADD KEY `fk_nomCategorie` (`nomCategorie`);

--
-- Indexes for table `produitspartags`
--
ALTER TABLE `produitspartags`
  ADD PRIMARY KEY (`nomTag`,`idProduit`),
  ADD KEY `fk_ProduitTag` (`idProduit`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`nomTag`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lignespanier`
--
ALTER TABLE `lignespanier`
  ADD CONSTRAINT `fk_idProduit` FOREIGN KEY (`idProduit`) REFERENCES `produits` (`idProduit`),
  ADD CONSTRAINT `fk_idpanier` FOREIGN KEY (`idPanier`) REFERENCES `panier` (`idPanier`);

--
-- Constraints for table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `fk_mailUtilisateur` FOREIGN KEY (`mailUtilisateur`) REFERENCES `utilisateurs` (`mail`);

--
-- Constraints for table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `fk_nomCategorie` FOREIGN KEY (`nomCategorie`) REFERENCES `categories` (`nomCategorie`);

--
-- Constraints for table `produitspartags`
--
ALTER TABLE `produitspartags`
  ADD CONSTRAINT `fk_ProduitTag` FOREIGN KEY (`idProduit`) REFERENCES `produits` (`idProduit`),
  ADD CONSTRAINT `fk_idNomTag` FOREIGN KEY (`nomTag`) REFERENCES `tags` (`nomTag`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
