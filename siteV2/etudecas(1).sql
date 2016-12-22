-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 01 Décembre 2016 à 23:42
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `etudecas`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `IdAdh` int(11) NOT NULL,
  `DateAdh` datetime DEFAULT NULL,
  `IdProducteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `adherent`
--

INSERT INTO `adherent` (`IdAdh`, `DateAdh`, `IdProducteur`) VALUES
(11, '2016-11-09 16:54:06', 1),
(12, '2016-11-23 17:15:29', 8),
(13, '2016-11-26 13:48:23', 9),
(14, '2016-11-30 06:11:43', 11);

-- --------------------------------------------------------

--
-- Structure de la table `agrur`
--

CREATE TABLE `agrur` (
  `IdAgr` int(11) NOT NULL,
  `CodeAgr` varchar(255) NOT NULL,
  `MdpAgr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `agrur`
--

INSERT INTO `agrur` (`IdAgr`, `CodeAgr`, `MdpAgr`) VALUES
(1, '123', '$2a$11$098f6bcd4621d373cade4e2IoEQ/BiFFUTygtuHSLAAUSHgPsiEgK$%'),
(2, '456', '$2a$11$098f6bcd4621d373cade4e2IoEQ/BiFFUTygtuHSLAAUSHgPsiEgK$%');

-- --------------------------------------------------------

--
-- Structure de la table `avoir`
--

CREATE TABLE `avoir` (
  `DateCertif` date DEFAULT NULL,
  `IdCertif` int(11) NOT NULL,
  `IdAdh` int(11) NOT NULL,
  `IdProducteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `avoir`
--

INSERT INTO `avoir` (`DateCertif`, `IdCertif`, `IdAdh`, `IdProducteur`) VALUES
('2016-11-23', 1, 12, 8),
('2016-11-26', 1, 13, 9);

-- --------------------------------------------------------

--
-- Structure de la table `certification`
--

CREATE TABLE `certification` (
  `IdCertif` int(11) NOT NULL,
  `NomCertif` varchar(255) DEFAULT NULL,
  `DateCertif` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `certification`
--

INSERT INTO `certification` (`IdCertif`, `NomCertif`, `DateCertif`) VALUES
(1, 'Tracteurs avec des émissions de CO² réduits', '2016-11-09 00:00:00'),
(2, 'Pas de pulvérisations d\'insecticides', '2016-11-09 00:00:00'),
(3, 'Pas de pesticides', '2016-11-09 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `IdClient` int(11) NOT NULL,
  `NomClient` varchar(25) DEFAULT NULL,
  `AdresseClient` varchar(255) DEFAULT NULL,
  `NomResponsableClient` varchar(25) DEFAULT NULL,
  `CodeClient` int(11) NOT NULL,
  `Mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`IdClient`, `NomClient`, `AdresseClient`, `NomResponsableClient`, `CodeClient`, `Mdp`) VALUES
(1, 'Orange', 'Paris Cedex', 'M.Punch', 123, '$2a$11$098f6bcd4621d373cade4e2IoEQ/BiFFUTygtuHSLAAUSHgPsiEgK$%');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `IdCommande` int(11) NOT NULL,
  `DateEnvoie` datetime DEFAULT NULL,
  `IdClient` int(11) DEFAULT NULL,
  `IdLot` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`IdCommande`, `DateEnvoie`, `IdClient`, `IdLot`) VALUES
(2, '2016-12-01 23:26:16', 1, 9),
(3, '2016-12-01 23:27:07', 1, 9),
(4, '2016-12-01 23:27:17', 1, 9),
(5, '2016-12-01 23:27:35', 1, 9),
(6, '2016-12-01 23:28:10', 1, 9),
(7, '2016-12-01 23:28:27', 1, 9),
(8, '2016-12-01 23:29:16', 1, 9),
(9, '2016-12-01 23:30:44', 1, 9),
(10, '2016-12-01 23:31:04', 1, 9),
(11, '2016-12-01 23:31:07', 1, 9),
(12, '2016-12-01 23:33:44', 1, 9);

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

CREATE TABLE `commune` (
  `IdCommune` int(11) NOT NULL,
  `Nom` varchar(25) DEFAULT NULL,
  `aoc` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commune`
--

INSERT INTO `commune` (`IdCommune`, `Nom`, `aoc`) VALUES
(1, 'Commune', 1),
(2, 'Commune2', 0);

-- --------------------------------------------------------

--
-- Structure de la table `conditionner`
--

CREATE TABLE `conditionner` (
  `Quantite` varchar(25) DEFAULT NULL,
  `IdCommande` int(11) NOT NULL,
  `IdConditionnement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `conditionner`
--

INSERT INTO `conditionner` (`Quantite`, `IdCommande`, `IdConditionnement`) VALUES
(NULL, 8, 1),
(NULL, 8, 2),
(NULL, 9, 3),
(NULL, 9, 4),
('4', 10, 5),
('4999', 10, 6),
('4', 11, 7),
('4999', 11, 8),
('4', 12, 9),
('4999', 12, 10);

-- --------------------------------------------------------

--
-- Structure de la table `listecalibre`
--

CREATE TABLE `listecalibre` (
  `IdCalibre` int(11) NOT NULL,
  `NomCalibre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `listecalibre`
--

INSERT INTO `listecalibre` (`IdCalibre`, `NomCalibre`) VALUES
(1, 'gros (12)'),
(2, 'moyen (10)'),
(3, 'petit (8)');

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE `livraison` (
  `IdLivraison` int(11) NOT NULL,
  `DateLivraison` datetime DEFAULT NULL,
  `TypeProduit` varchar(25) DEFAULT NULL,
  `Quantite` varchar(25) DEFAULT NULL,
  `IdVerger` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `livraison`
--

INSERT INTO `livraison` (`IdLivraison`, `DateLivraison`, `TypeProduit`, `Quantite`, `IdVerger`) VALUES
(31, '2016-12-02 00:00:00', '1', '5000', 10),
(32, '2016-12-06 00:00:00', '1', '500', 9),
(33, '2016-12-15 00:00:00', '2', '100', 6);

-- --------------------------------------------------------

--
-- Structure de la table `lot`
--

CREATE TABLE `lot` (
  `IdLot` int(11) NOT NULL,
  `Calibre` varchar(255) DEFAULT NULL,
  `IdLivraison` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lot`
--

INSERT INTO `lot` (`IdLot`, `Calibre`, `IdLivraison`) VALUES
(9, 'gros (12)', 31),
(10, 'petit (8)', 32),
(11, 'moyen (10)', 33);

-- --------------------------------------------------------

--
-- Structure de la table `producteur`
--

CREATE TABLE `producteur` (
  `IdProducteur` int(11) NOT NULL,
  `NomSociete` varchar(255) DEFAULT NULL,
  `AdresseSociete` varchar(255) DEFAULT NULL,
  `AgriBio` tinyint(1) DEFAULT NULL,
  `NomResponsable` varchar(255) DEFAULT NULL,
  `PrenomResponsable` varchar(255) DEFAULT NULL,
  `CodeSite` varchar(255) NOT NULL,
  `EtatProd` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `producteur`
--

INSERT INTO `producteur` (`IdProducteur`, `NomSociete`, `AdresseSociete`, `AgriBio`, `NomResponsable`, `PrenomResponsable`, `CodeSite`, `EtatProd`) VALUES
(1, 'JMCorpokjh', '  69 rue Marseille 59000 Meriseeq oifrezhiÃ¨tr"Ã©_oÃ¨(\'jhb', 1, '.  Mediaaaazeeaaaaaaaaaaaaa', '  JacquesÃ©"& azertfyghujgfdrtyhjnbvgftyghftrygjhgrgdfb vtyb(nu iyot(tta \'"(-i^Ã _', '123', 1),
(2, '456', '456  69 rue Marseille 59000 Meriseeq oifrezhiÃ¨tr"Ã©_oÃ¨(\'jhb', 1, '456.  Mediaaaazeeaaaaaaaaaaaaa', '456  JacquesÃ©"& azertfyghujgfdrtyhjnbvgftyghftrygjhgrgdfb vtyb(nu iyot(tta \'"(-i^Ã _', '456', 1),
(8, 's', 's', 1, 's', 's\r\n\r\n', '222', 1),
(9, 'maison', 'troll', 0, 'yolo', 'pre', '333', 0),
(10, '"efr', 'ezrezrzf', 1, 'zerz&fdfcd', 'ezrzf', '', 0),
(11, 'corentin', 'lille', 1, 'je', 'tu', '000', 1);

-- --------------------------------------------------------

--
-- Structure de la table `typeconditionnement`
--

CREATE TABLE `typeconditionnement` (
  `IdConditionnement` int(11) NOT NULL,
  `Libelle` varchar(25) DEFAULT NULL,
  `Poids` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `typeconditionnement`
--

INSERT INTO `typeconditionnement` (`IdConditionnement`, `Libelle`, `Poids`) VALUES
(1, 'Sachet', '250'),
(2, 'Filet', '1000'),
(3, 'Sachet', '250'),
(4, 'Filet', '1000'),
(5, 'Sachet', '250'),
(6, 'Filet', '1000'),
(7, 'Sachet', '250'),
(8, 'Filet', '1000'),
(9, 'Sachet', '250'),
(10, 'Filet', '1000');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `IdUser` int(11) NOT NULL,
  `CodeUser` varchar(11) NOT NULL,
  `MdpUser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`IdUser`, `CodeUser`, `MdpUser`) VALUES
(1, '123', '$2a$11$098f6bcd4621d373cade4e2IoEQ/BiFFUTygtuHSLAAUSHgPsiEgK$%'),
(3, '456', '$2a$11$098f6bcd4621d373cade4e2IoEQ/BiFFUTygtuHSLAAUSHgPsiEgK$%'),
(4, '4567', '$2a$11$098f6bcd4621d373cade4e2IoEQ/BiFFUTygtuHSLAAUSHgPsiEgK$%'),
(12, '222', '$2a$11$098f6bcd4621d373cade4e2IoEQ/BiFFUTygtuHSLAAUSHgPsiEgK$%'),
(13, '333', '$2a$11$1cc9a3c58f8009fdb8ea3OUzoQaxSwK633wmkmXUURXRyahgy5LJG$%'),
(15, '000', '$2a$11$098f6bcd4621d373cade4e2IoEQ/BiFFUTygtuHSLAAUSHgPsiEgK$%');

-- --------------------------------------------------------

--
-- Structure de la table `variete`
--

CREATE TABLE `variete` (
  `IdVariete` int(11) NOT NULL,
  `Libelle` varchar(25) DEFAULT NULL,
  `aoc` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `variete`
--

INSERT INTO `variete` (`IdVariete`, `Libelle`, `aoc`) VALUES
(1, 'Libre', 1),
(2, 'Libre2', 0);

-- --------------------------------------------------------

--
-- Structure de la table `verger`
--

CREATE TABLE `verger` (
  `IdVerger` int(11) NOT NULL,
  `NomVerger` varchar(25) DEFAULT NULL,
  `SuperficieVerger` varchar(25) DEFAULT NULL,
  `Arbres` varchar(25) DEFAULT NULL,
  `Hectar` varchar(25) DEFAULT NULL,
  `IdProducteur` int(11) DEFAULT NULL,
  `IdCommune` int(11) DEFAULT NULL,
  `IdVariete` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `verger`
--

INSERT INTO `verger` (`IdVerger`, `NomVerger`, `SuperficieVerger`, `Arbres`, `Hectar`, `IdProducteur`, `IdCommune`, `IdVariete`) VALUES
(6, 'aaaaaaa', '', '', '', 1, 1, 1),
(7, 'aa', 'aaa', 'a', 'a', 1, 1, 1),
(8, 'aaa', 'a', 'a', 'zzz', 1, 2, 1),
(9, 'az', 'zre', 'rr', 'rrr', 1, 2, 2),
(10, 'croute', '14cmÂ²', 'croutiers', '29', 1, 2, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`IdAdh`,`IdProducteur`),
  ADD KEY `FK_Adherent_IdProducteur` (`IdProducteur`);

--
-- Index pour la table `agrur`
--
ALTER TABLE `agrur`
  ADD PRIMARY KEY (`IdAgr`),
  ADD UNIQUE KEY `CodeAgr` (`CodeAgr`);

--
-- Index pour la table `avoir`
--
ALTER TABLE `avoir`
  ADD PRIMARY KEY (`IdCertif`,`IdAdh`,`IdProducteur`),
  ADD KEY `FK_avoir_IdAdh` (`IdAdh`),
  ADD KEY `FK_avoir_IdProducteur` (`IdProducteur`);

--
-- Index pour la table `certification`
--
ALTER TABLE `certification`
  ADD PRIMARY KEY (`IdCertif`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`IdClient`),
  ADD UNIQUE KEY `CodeClient` (`CodeClient`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`IdCommande`),
  ADD KEY `FK_commande_IdClient` (`IdClient`),
  ADD KEY `FK_commande_IdLot` (`IdLot`);

--
-- Index pour la table `commune`
--
ALTER TABLE `commune`
  ADD PRIMARY KEY (`IdCommune`);

--
-- Index pour la table `conditionner`
--
ALTER TABLE `conditionner`
  ADD PRIMARY KEY (`IdCommande`,`IdConditionnement`),
  ADD KEY `FK_Conditionner_IdConditionnement` (`IdConditionnement`);

--
-- Index pour la table `listecalibre`
--
ALTER TABLE `listecalibre`
  ADD PRIMARY KEY (`IdCalibre`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`IdLivraison`),
  ADD KEY `FK_livraison_IdVerger` (`IdVerger`);

--
-- Index pour la table `lot`
--
ALTER TABLE `lot`
  ADD PRIMARY KEY (`IdLot`),
  ADD KEY `FK_lot_IdLivraison` (`IdLivraison`);

--
-- Index pour la table `producteur`
--
ALTER TABLE `producteur`
  ADD PRIMARY KEY (`IdProducteur`),
  ADD UNIQUE KEY `CodeSite` (`CodeSite`);

--
-- Index pour la table `typeconditionnement`
--
ALTER TABLE `typeconditionnement`
  ADD PRIMARY KEY (`IdConditionnement`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`IdUser`),
  ADD UNIQUE KEY `CodeUser` (`CodeUser`);

--
-- Index pour la table `variete`
--
ALTER TABLE `variete`
  ADD PRIMARY KEY (`IdVariete`);

--
-- Index pour la table `verger`
--
ALTER TABLE `verger`
  ADD PRIMARY KEY (`IdVerger`),
  ADD KEY `FK_Verger_IdProducteur` (`IdProducteur`),
  ADD KEY `FK_Verger_IdCommune` (`IdCommune`),
  ADD KEY `FK_Verger_IdVariete` (`IdVariete`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `IdAdh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `agrur`
--
ALTER TABLE `agrur`
  MODIFY `IdAgr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `certification`
--
ALTER TABLE `certification`
  MODIFY `IdCertif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `IdClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `IdCommande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `commune`
--
ALTER TABLE `commune`
  MODIFY `IdCommune` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `listecalibre`
--
ALTER TABLE `listecalibre`
  MODIFY `IdCalibre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `IdLivraison` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT pour la table `lot`
--
ALTER TABLE `lot`
  MODIFY `IdLot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `producteur`
--
ALTER TABLE `producteur`
  MODIFY `IdProducteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `typeconditionnement`
--
ALTER TABLE `typeconditionnement`
  MODIFY `IdConditionnement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `variete`
--
ALTER TABLE `variete`
  MODIFY `IdVariete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `verger`
--
ALTER TABLE `verger`
  MODIFY `IdVerger` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD CONSTRAINT `FK_Adherent_IdProducteur` FOREIGN KEY (`IdProducteur`) REFERENCES `producteur` (`IdProducteur`);

--
-- Contraintes pour la table `avoir`
--
ALTER TABLE `avoir`
  ADD CONSTRAINT `FK_avoir_IdAdh` FOREIGN KEY (`IdAdh`) REFERENCES `adherent` (`IdAdh`),
  ADD CONSTRAINT `FK_avoir_IdCertif` FOREIGN KEY (`IdCertif`) REFERENCES `certification` (`IdCertif`),
  ADD CONSTRAINT `FK_avoir_IdProducteur` FOREIGN KEY (`IdProducteur`) REFERENCES `producteur` (`IdProducteur`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_commande_IdClient` FOREIGN KEY (`IdClient`) REFERENCES `client` (`IdClient`),
  ADD CONSTRAINT `FK_commande_IdLot` FOREIGN KEY (`IdLot`) REFERENCES `lot` (`IdLot`);

--
-- Contraintes pour la table `conditionner`
--
ALTER TABLE `conditionner`
  ADD CONSTRAINT `FK_Conditionner_IdCommande` FOREIGN KEY (`IdCommande`) REFERENCES `commande` (`IdCommande`),
  ADD CONSTRAINT `FK_Conditionner_IdConditionnement` FOREIGN KEY (`IdConditionnement`) REFERENCES `typeconditionnement` (`IdConditionnement`);

--
-- Contraintes pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `FK_livraison_IdVerger` FOREIGN KEY (`IdVerger`) REFERENCES `verger` (`IdVerger`);

--
-- Contraintes pour la table `lot`
--
ALTER TABLE `lot`
  ADD CONSTRAINT `FK_lot_IdLivraison` FOREIGN KEY (`IdLivraison`) REFERENCES `livraison` (`IdLivraison`);

--
-- Contraintes pour la table `verger`
--
ALTER TABLE `verger`
  ADD CONSTRAINT `FK_Verger_IdCommune` FOREIGN KEY (`IdCommune`) REFERENCES `commune` (`IdCommune`),
  ADD CONSTRAINT `FK_Verger_IdProducteur` FOREIGN KEY (`IdProducteur`) REFERENCES `producteur` (`IdProducteur`),
  ADD CONSTRAINT `FK_Verger_IdVariete` FOREIGN KEY (`IdVariete`) REFERENCES `variete` (`IdVariete`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
