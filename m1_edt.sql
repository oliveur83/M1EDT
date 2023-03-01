-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 01 mars 2023 à 08:41
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
  `date_debut_evenement` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `date_fin_evenement` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `couleur_evenement` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `remarques_evenement` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `code_ue` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `id_salle` int DEFAULT NULL,
  PRIMARY KEY (`id_evenement`),
  KEY `code_ue` (`code_ue`),
  KEY `id_salle` (`id_salle`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id_evenement`, `titre_evenement`, `categorie_evenement`, `date_debut_evenement`, `date_fin_evenement`, `couleur_evenement`, `remarques_evenement`, `code_ue`, `id_salle`) VALUES
(1, 'ddd', 'TP', '2023-02-02T10:30:00', '2023-02-02T13:30:00', '6aa84f', '', 'M1S2UE2', 3),
(8, '1TT', NULL, '2023-01-31T11:30:00', '2023-01-31T12:00:00', '6aa84f', NULL, NULL, 2),
(9, 'event', NULL, '2023-02-15T10:00:00', '2023-02-15T10:30:00', '6aa84f', NULL, NULL, 2),
(10, 'event', NULL, '2023-03-07T09:30:00', '2023-03-07T11:00:00', '6aa84f', NULL, NULL, 1),
(13, 'event', NULL, '2023-03-03T11:00:00', '2023-03-03T11:30:00', '6aa84f', NULL, NULL, 1),
(14, 'event', NULL, '2023-03-02T10:00:00', '2023-03-02T10:30:00', '6aa84f', NULL, NULL, 2),
(15, 'event', NULL, '2023-03-02T10:00:00', '2023-03-02T11:30:00', '6aa84f', NULL, 'M1S2UE2', 1),
(16, 'event', NULL, '2023-02-28T09:30:00', '2023-02-28T10:00:00', '6aa84f', NULL, NULL, 2),
(17, 'physique', NULL, '2023-03-01T09:30:00', '2023-03-01T11:30:00', '6aa84f', NULL, 'L1S1UE1', 2),
(18, 'physique', NULL, '2023-03-02T09:00:00', '2023-03-02T11:00:00', '6aa84f', NULL, 'L1S1UE1', 1),
(19, 'math', NULL, '2023-02-27T11:00:00', '2023-02-27T13:00:00', '6aa84f', NULL, 'L1S1UE1', 2),
(20, 'INFO', NULL, '2023-02-27T14:00:00', '2023-02-27T16:00:00', '6aa84f', NULL, 'L1S1UE1', 2),
(21, 'SVT', NULL, '2023-02-27T16:00:00', '2023-02-27T18:00:00', '6aa84f', NULL, 'L1S1UE1', 2),
(46, 'event', NULL, '2023-03-01T12:00:00', '2023-03-01T15:45:00', '3c78d8', NULL, NULL, NULL),
(56, 'toto', NULL, '2023-02-28T16:05:00', '2023-02-28T18:05:00', 'blue', NULL, NULL, NULL),
(57, 'titi', NULL, '2023-02-28T15:20:00', '2023-02-28T17:20:00', '3c78d8', NULL, NULL, NULL),
(62, 'titi', 'CM', '2023-03-01T12:30:00', '2023-03-01T14:30:00', '6aa84f', NULL, NULL, 1),
(63, 'putain', 'CM', '2023-03-09T10:30:00', '2023-03-09T10:45:00', 'f1c232', NULL, 'L1S1UE1', 1);

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
(15, 'M1DS'),
(18, 'L1info'),
(62, 'L1info'),
(63, 'L1info');

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
(1, 5),
(17, 8);

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
('L1SI', 'licence 3 science de l ingenieur'),
('L1SVT', 'licence 1 licence 3 science de la vie'),
('L1info', 'licence 1 informatique'),
('L2SI', 'licence 3 science de l ingenieur'),
('L2SVT', 'licence 2 licence 3 science de la vie'),
('L2info', 'licence 2 informatique'),
('L3SI', 'licence 3 science de l ingenieur'),
('L3SINF', 'Licence Sciences pour l\'Ingénieur'),
('L3STAPS', 'licence 3 sport'),
('L3SVT', 'licence 3 science de la vie '),
('L3info', 'licence 3 informatique'),
('M1DS', 'Master Développement Full Stack'),
('MSTAPS', 'master sport');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `id_salle` int NOT NULL AUTO_INCREMENT,
  `nom_salle` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_salle`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id_salle`, `nom_salle`) VALUES
(1, '111'),
(2, '112'),
(3, '113'),
(4, '400'),
(5, '400b'),
(6, 'AMPHIE'),
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
('L1S1UE1', 'De la Puce au Web', 96),
('L1S1UE4', 'Introduction à l’algorithmique et à la programmation', 90),
('L3S5UE10', 'Arbres et graphes', 69),
('L3S6UE10', 'Algorithmique', 90),
('L3S6UE11', 'Technologies d’accès aux données', 69),
('M1S2UE2', 'Algorithmique et Complexité', 50);

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nom_user`, `prenom_user`) VALUES
(1, 'Paoli', 'Christophe'),
(2, 'Delhom', 'Marielle'),
(3, 'Vareille', 'Matthieu'),
(5, 'Bisgambiglia', 'Paul-Antoine'),
(6, 'olivier', 'tom'),
(7, 'BAZAN', 'CLEMENT'),
(8, 'AFSAOUI', 'THEO'),
(9, 'CHAMPION', 'YOUSSEF'),
(10, 'GILOT', 'VALERIE'),
(11, 'LANGEVIN', 'PHILLIPE'),
(12, 'GIES', 'VALENTIN'),
(13, 'nguyen', 'christian'),
(14, 'joel', 'joel'),
(15, 'joel', 'joel'),
(16, 'tututut', 'tututut');

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
