-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2022 at 11:28 AM
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
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`idProduit`, `nom`, `prix`, `description`) VALUES
(1, 'O\'Hare Air', 130, 'Besoin de respirer ? Achetez notre air de haute qualité ! \r\nCertifiée sans pollution <3'),
(2, 'Pomme de la reine', 78, 'Envie de fructose ? Cette douce pomme au goût caramélisée raviera vos papilles !\r\nGarantie sans \"additif\" <3'),
(3, 'Miroir Magique', 600, 'Vous vous sentez seul ? Notre miroir vous tiendra compagnie !\r\nGarantie 100% magique <3'),
(4, 'Omnidroide by Syndrome', 1000, 'Fatigué de faire le ménage ? Notre robot ménager prendra soin de votre intérieur !\r\nDélicatesse 100% garantie <3'),
(5, 'Iago le perroquet', 30, 'Besoin d\'un ami fidèle ? Iago est le partenaire idéale pour vos moments de gossip !\r\nGarantie 100% fiable <3');

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
  ADD PRIMARY KEY (`idProduit`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
