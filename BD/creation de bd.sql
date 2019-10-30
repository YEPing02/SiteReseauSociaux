-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 25 fév. 2019 à 00:02
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `apprecier`
--

DROP TABLE IF EXISTS `apprecier`;
CREATE TABLE IF NOT EXISTS `apprecier` (
  `MemId` int(10) NOT NULL,
  `ComId` int(10) NOT NULL,
  PRIMARY KEY (`MemId`,`ComId`),
  KEY `I_FK_APPRECIER_MEMBRES` (`MemId`) USING BTREE,
  KEY `I_FK_APPRECIER_COMMENTAIRES` (`ComId`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Déchargement des données de la table `apprecier`
--

INSERT INTO `apprecier` (`MemId`, `ComId`) VALUES
(3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `ComId` int(10) NOT NULL AUTO_INCREMENT,
  `ComContenu` char(150) COLLATE latin1_spanish_ci NOT NULL,
  `ComDate` datetime NOT NULL,
  `MemId` int(10) NOT NULL,
  PRIMARY KEY (`ComId`),
  KEY `I_FK_COMMENTAIRES_MEMBRES` (`MemId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`ComId`, `ComContenu`, `ComDate`, `MemId`) VALUES
(1, 'Communication applis JAVA et Oracle. Compliqué ?', '2019-02-20 14:20:46', 3),
(2, 'Pourquoi Oracle est-il si courant dans les applis bancaires', '2019-02-22 17:12:41', 1),
(3, 'Très compliqué, manuel Oracle obligatoire !', '2019-02-23 15:44:13', 1);

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

DROP TABLE IF EXISTS `competences`;
CREATE TABLE IF NOT EXISTS `competences` (
  `CompCode` int(10) NOT NULL AUTO_INCREMENT,
  `CompNom` enum('pilotage projet','Java','Oracle','Banque-Assurance','ETL') COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`CompCode`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Déchargement des données de la table `competences`
--

INSERT INTO `competences` (`CompCode`, `CompNom`) VALUES
(1, 'pilotage projet'),
(2, 'Java'),
(3, 'Oracle'),
(4, 'Banque-Assurance'),
(5, 'ETL');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `MemId` int(10) NOT NULL AUTO_INCREMENT,
  `MemNom` char(30) CHARACTER SET latin1 NOT NULL,
  `MemPrenom` char(30) COLLATE latin1_spanish_ci NOT NULL,
  `MemPseudo` char(30) COLLATE latin1_spanish_ci NOT NULL,
  `MemEmail` char(30) COLLATE latin1_spanish_ci NOT NULL,
  `MemMDP` char(30) COLLATE latin1_spanish_ci NOT NULL DEFAULT '123',
  PRIMARY KEY (`MemId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`MemId`, `MemNom`, `MemPrenom`, `MemPseudo`, `MemEmail`, `MemMDP`) VALUES
(1, '', 'Zoé', '', '', '123'),
(2, '', 'Odile', '', '', '123'),
(3, '', 'Dan', '', '', '123');

-- --------------------------------------------------------

--
-- Structure de la table `posseder`
--

DROP TABLE IF EXISTS `posseder`;
CREATE TABLE IF NOT EXISTS `posseder` (
  `MemId` int(10) NOT NULL,
  `CompCode` int(10) NOT NULL,
  `CompNiveau` enum('expert','confirmé','débutant','') CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`MemId`,`CompCode`),
  KEY `I_FK_POSSEDER_MEMBRES` (`MemId`) USING BTREE,
  KEY `I_FK_POSSEDER_COMPETENCES` (`CompCode`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Déchargement des données de la table `posseder`
--

INSERT INTO `posseder` (`MemId`, `CompCode`, `CompNiveau`) VALUES
(1, 2, 'expert'),
(2, 1, 'expert'),
(3, 2, 'débutant');

-- --------------------------------------------------------

--
-- Structure de la table `recommender`
--

DROP TABLE IF EXISTS `recommender`;
CREATE TABLE IF NOT EXISTS `recommender` (
  `MemEmetId` int(10) NOT NULL,
  `MemRecepId` int(10) NOT NULL,
  `CompCode` int(30) NOT NULL,
  KEY `CompCode` (`CompCode`) USING BTREE,
  KEY `I_FK_RECOMMENDER_MEMBRES_E` (`MemEmetId`) USING BTREE,
  KEY `I_FK_RECOMMENDER_MEMBRES_R` (`MemRecepId`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Déchargement des données de la table `recommender`
--

INSERT INTO `recommender` (`MemEmetId`, `MemRecepId`, `CompCode`) VALUES
(2, 3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `repondre`
--

DROP TABLE IF EXISTS `repondre`;
CREATE TABLE IF NOT EXISTS `repondre` (
  `ComReponId` int(10) NOT NULL,
  `ComRecepId` int(10) NOT NULL,
  PRIMARY KEY (`ComReponId`,`ComRecepId`),
  KEY `I_FK_REPONDRE_COMMENTAIRES_REPON` (`ComReponId`) USING BTREE,
  KEY `I_FK_REPONDRE_COMMENTAIRES_RECEP` (`ComRecepId`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Déchargement des données de la table `repondre`
--

INSERT INTO `repondre` (`ComReponId`, `ComRecepId`) VALUES
(3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `suivre`
--

DROP TABLE IF EXISTS `suivre`;
CREATE TABLE IF NOT EXISTS `suivre` (
  `MemSuivreId` int(10) NOT NULL,
  `MemSuiviId` int(10) NOT NULL,
  PRIMARY KEY (`MemSuivreId`,`MemSuiviId`),
  KEY `I_FK_SUIVRE_MEMBRES_SUIT` (`MemSuivreId`) USING BTREE,
  KEY `I_FK_SUIVRE_MEMBRES_SUIVI` (`MemSuiviId`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Déchargement des données de la table `suivre`
--

INSERT INTO `suivre` (`MemSuivreId`, `MemSuiviId`) VALUES
(1, 3),
(2, 3),
(3, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
