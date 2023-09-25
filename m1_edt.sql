-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 25 sep. 2023 à 12:20
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `m1_edt`
--

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `id_evenement` int NOT NULL AUTO_INCREMENT,
  `titre_evenement` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `categorie_evenement` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `date_debut_evenement` datetime NOT NULL,
  `date_fin_evenement` datetime NOT NULL,
  `couleur_evenement` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `remarques_evenement` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `code_ue` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `id_salle` int DEFAULT NULL,
  PRIMARY KEY (`id_evenement`),
  KEY `code_ue` (`code_ue`),
  KEY `id_salle` (`id_salle`)
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id_evenement`, `titre_evenement`, `categorie_evenement`, `date_debut_evenement`, `date_fin_evenement`, `couleur_evenement`, `remarques_evenement`, `code_ue`, `id_salle`) VALUES
(78, 'Programmation Mobile', 'CM', '2023-03-21 10:15:00', '2023-03-21 11:45:00', 'ff8040', NULL, 'M1DS9', 2),
(79, 'Programmation Mobile', 'CM', '2023-03-21 13:30:00', '2023-03-21 15:00:00', 'ff8040', NULL, 'M1DS9', 2),
(80, 'Programmation Mobile', 'CM', '2023-03-21 15:15:00', '2023-03-21 16:45:00', 'ff8040', NULL, 'M1DS9', 2),
(85, 'Anglais', 'TD', '2023-08-04 09:00:00', '2023-08-04 11:00:00', '0000ff', NULL, 'M1DS12', 2),
(86, 'Corse', 'TD', '2023-03-24 13:30:00', '2023-03-24 15:30:00', '0000ff', NULL, 'M1ST2CO', 2),
(89, 'Programmation Mobile', 'CM', '2023-03-30 13:30:00', '2023-03-30 15:00:00', 'ff8040', NULL, 'M1DS9', 2),
(90, 'Programmation Mobile', 'TD', '2023-03-30 15:15:00', '2023-03-30 16:45:00', '0000ff', NULL, 'M1DS9', 2),
(91, 'Programmation Mobile', 'CM', '2023-03-28 13:30:00', '2023-03-28 15:00:00', 'ff8040', NULL, 'M1DS9', 2),
(92, 'Programmation Mobile', 'CM', '2023-03-28 15:15:00', '2023-03-28 16:45:00', 'ff8040', NULL, 'M1DS9', 2),
(98, 'Anglais', 'TD', '2023-04-01 09:00:00', '2023-04-01 12:00:00', '0000ff', NULL, 'M1DS12', 2),
(99, 'corse', 'CM', '2023-03-29 14:08:00', '2023-03-29 16:08:00', '3c78d8', NULL, 'L1S1UE1', 1),
(134, 'cm MOBILE 2', 'CM', '2025-09-25 17:00:00', '2025-09-25 18:30:00', '3c78d8', NULL, 'L1S1UE1', 2),
(135, 'cm MOBILE 1', 'CM', '2025-09-26 10:15:00', '2025-09-26 11:45:00', '3c78d8', NULL, 'L1S1UE1', 2),
(136, 'td MOBILE 2', 'TD', '2025-09-26 13:30:00', '2025-09-26 15:00:00', '3c78d8', NULL, 'L1S1UE1', 2),
(137, 'td MOBILE 1', 'TD', '2025-09-27 15:15:00', '2025-09-27 16:45:00', '3c78d8', NULL, 'L1S1UE1', 1),
(138, 'tp MOBILE 2', 'TP', '2025-09-27 17:00:00', '2025-09-27 18:30:00', '3c78d8', NULL, 'L1S1UE1', 4),
(139, 'tp MOBILE 1', 'TP', '2025-09-28 08:30:00', '2025-09-28 10:00:00', '3c78d8', NULL, 'L1S1UE1', 4),
(140, 'cm MOBILE 2', 'CM', '2023-09-25 10:15:00', '2023-09-25 11:45:00', '3c78d8', NULL, 'L1S1UE1', 2),
(141, 'cm MOBILE 1', 'CM', '2023-09-26 15:15:00', '2023-09-26 16:45:00', '3c78d8', NULL, 'L1S1UE1', 2),
(142, 'td MOBILE 2', 'TD', '2023-09-26 13:30:00', '2023-09-26 15:00:00', '3c78d8', NULL, 'L1S1UE1', 2),
(143, 'td MOBILE 1', 'TD', '2023-09-26 17:30:00', '2023-09-26 19:00:00', '3c78d8', NULL, 'L1S1UE1', 1),
(144, 'tp MOBILE 2', 'TP', '2023-09-26 08:30:00', '2023-09-26 10:00:00', '3c78d8', NULL, 'L1S1UE1', 4);

-- --------------------------------------------------------

--
-- Structure de la table `evenement_groupe_liaison`
--

DROP TABLE IF EXISTS `evenement_groupe_liaison`;
CREATE TABLE IF NOT EXISTS `evenement_groupe_liaison` (
  `id_evenement` int NOT NULL,
  `code_groupe` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_evenement`,`code_groupe`),
  KEY `id_evenement` (`id_evenement`),
  KEY `code_groupe` (`code_groupe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `evenement_groupe_liaison`
--

INSERT INTO `evenement_groupe_liaison` (`id_evenement`, `code_groupe`) VALUES
(78, 'mdfull'),
(79, 'mdfull'),
(80, 'mdfull'),
(85, 'mdfull'),
(86, 'mdfull'),
(89, 'mdfull'),
(90, 'mdfull'),
(91, 'mdfull'),
(92, 'mdfull'),
(98, 'mdfull'),
(99, 'mdfull'),
(134, 'L1info'),
(135, 'L1info'),
(136, 'L1info'),
(137, 'L1info'),
(138, 'L1info'),
(139, 'L1info'),
(140, 'L1info'),
(141, 'L1info'),
(142, 'L1info'),
(143, 'L1info'),
(144, 'L1info');

-- --------------------------------------------------------

--
-- Structure de la table `evenement_user_liaison`
--

DROP TABLE IF EXISTS `evenement_user_liaison`;
CREATE TABLE IF NOT EXISTS `evenement_user_liaison` (
  `id_evenement` int NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id_evenement`,`id_user`),
  KEY `id_evenement` (`id_evenement`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `evenement_user_liaison`
--

INSERT INTO `evenement_user_liaison` (`id_evenement`, `id_user`) VALUES
(78, 16),
(79, 16),
(80, 16),
(85, 19),
(86, 18),
(89, 16),
(90, 16),
(91, 16),
(92, 16),
(98, 19),
(99, 18),
(134, 9),
(135, 9),
(136, 9),
(137, 10),
(138, 8),
(139, 8),
(140, 9),
(141, 9),
(142, 9),
(143, 10),
(144, 8);

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE IF NOT EXISTS `groupe` (
  `code_groupe` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `nom_groupe` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`code_groupe`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`code_groupe`, `nom_groupe`) VALUES
('L1SVT', 'licence 1 licence 3 science de la vie'),
('L1info', 'licence 1 informatique'),
('L2SI', 'licence 2 sciences pour l ingenieur'),
('L2SVT', 'licence 2 licence 3 science de la vie'),
('L2info', 'licence 2 informatique'),
('L3SI', 'licence 3 sciences pour l ingenieur'),
('L3SINF', 'Licence Sciences pour l\'Ingénieur'),
('L3STAPS', 'licence 3 sport'),
('L3SVT', 'licence 3 science de la vie '),
('L3info', 'licence 3 informatique'),
('MDFS', 'master_dev_full'),
('MDGF', 'master du futur'),
('MSTAPS', 'master sport'),
('mdfull', 'master tres fort');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `id_salle` int NOT NULL AUTO_INCREMENT,
  `nom_salle` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_salle`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id_salle`, `nom_salle`) VALUES
(1, '111'),
(2, '112'),
(3, '113'),
(4, '400'),
(5, '400b'),
(6, 'AMPHI'),
(7, '400a'),
(8, 'y1.001'),
(9, 'y1.008'),
(10, 'y1.005'),
(11, 'y1.110'),
(12, '600'),
(13, 'P230'),
(14, '320');

-- --------------------------------------------------------

--
-- Structure de la table `ue`
--

DROP TABLE IF EXISTS `ue`;
CREATE TABLE IF NOT EXISTS `ue` (
  `code_ue` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `nom_ue` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `heures_ue` int NOT NULL,
  PRIMARY KEY (`code_ue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `ue`
--

INSERT INTO `ue` (`code_ue`, `nom_ue`, `heures_ue`) VALUES
('L1S1UE1', 'De la Puce au Web', 86),
('L1S1UE4', 'Introduction à l’algorithmique et à la programmation', 90),
('L3S5UE10', 'Arbres et graphes', 69),
('L3S6UE10', 'Algorithmique', 90),
('L3S6UE11', 'Technologies d’accès aux données', 69),
('M1DS10', 'Programmation Parallèle et Distribuée / DevOps', 96),
('M1DS11', 'TECHNOLOGIES-ET-PROGRAMMATION-WEB', 96),
('M1DS12', 'Langues', 36),
('M1DS7', 'Applications Web Avancées et Services Web', 96),
('M1DS8', 'Internet des Objets', 96),
('M1DS9', 'Programmation pour Terminaux Mobiles', 96),
('M1S2UE2', 'Algorithmique et Complexité', 50),
('M1ST2CO', 'Corse', 24);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `prenom_user` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nom_user`, `prenom_user`) VALUES
(8, 'AFSAOUI', 'THEO'),
(9, 'CHAMPION', 'YOUSSEF'),
(10, 'GILOT', 'VALERIE'),
(11, 'LANGEVIN', 'PHILLIPE'),
(12, 'GIES', 'VALENTIN'),
(13, 'nguyen', 'christian'),
(14, 'joel', 'joel'),
(16, 'Fancello', 'Mathieu'),
(18, 'Poggi', 'Frederic'),
(19, 'Williams', 'Marc'),
(22, 'le plus fort', 'des best');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`code_ue`) REFERENCES `ue` (`code_ue`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evenement_ibfk_2` FOREIGN KEY (`id_salle`) REFERENCES `salle` (`id_salle`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `evenement_groupe_liaison`
--
ALTER TABLE `evenement_groupe_liaison`
  ADD CONSTRAINT `evenement_groupe_liaison_ibfk_1` FOREIGN KEY (`id_evenement`) REFERENCES `evenement` (`id_evenement`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evenement_groupe_liaison_ibfk_2` FOREIGN KEY (`code_groupe`) REFERENCES `groupe` (`code_groupe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `evenement_user_liaison`
--
ALTER TABLE `evenement_user_liaison`
  ADD CONSTRAINT `evenement_user_liaison_ibfk_1` FOREIGN KEY (`id_evenement`) REFERENCES `evenement` (`id_evenement`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evenement_user_liaison_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
