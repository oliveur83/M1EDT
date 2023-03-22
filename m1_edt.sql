-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 22 mars 2023 à 14:54
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

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
  `id_evenement` int(11) NOT NULL AUTO_INCREMENT,
  `titre_evenement` varchar(500) COLLATE utf8mb4_bin NOT NULL,
  `categorie_evenement` varchar(500) COLLATE utf8mb4_bin DEFAULT NULL,
  `date_debut_evenement` datetime NOT NULL,
  `date_fin_evenement` datetime NOT NULL,
  `couleur_evenement` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `remarques_evenement` varchar(500) COLLATE utf8mb4_bin DEFAULT NULL,
  `code_ue` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `id_salle` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_evenement`),
  KEY `code_ue` (`code_ue`),
  KEY `id_salle` (`id_salle`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id_evenement`, `titre_evenement`, `categorie_evenement`, `date_debut_evenement`, `date_fin_evenement`, `couleur_evenement`, `remarques_evenement`, `code_ue`, `id_salle`) VALUES
(1, 'ddd', 'TP', '2023-02-02 10:30:00', '2023-02-02 13:30:00', '6aa84f', '', 'M1S2UE2', 3),
(8, '1TT', NULL, '2023-01-31 11:30:00', '2023-01-31 12:00:00', '6aa84f', NULL, NULL, 2),
(9, 'event', NULL, '2023-02-15 10:00:00', '2023-02-15 10:30:00', '6aa84f', NULL, NULL, 2),
(10, 'event', NULL, '2023-03-07 09:30:00', '2023-03-07 11:00:00', '6aa84f', NULL, NULL, 1),
(13, 'event', NULL, '2023-03-03 11:00:00', '2023-03-03 11:30:00', '6aa84f', NULL, NULL, 1),
(14, 'event', NULL, '2023-03-02 10:00:00', '2023-03-02 10:30:00', '6aa84f', NULL, NULL, 2),
(15, 'event', NULL, '2023-02-28 10:00:00', '2023-02-28 11:30:00', '6aa84f', NULL, 'M1S2UE2', 1),
(16, 'event', NULL, '2023-02-28 09:30:00', '2023-02-28 10:00:00', '6aa84f', NULL, NULL, 2),
(17, 'physique', NULL, '2023-03-01 09:30:00', '2023-03-01 11:30:00', '6aa84f', NULL, 'L1S1UE1', 2),
(18, 'physique', NULL, '2023-03-02 09:00:00', '2023-03-02 11:00:00', '6aa84f', NULL, 'L1S1UE1', 1),
(19, 'math', NULL, '2023-02-27 11:00:00', '2023-02-27 13:00:00', '6aa84f', NULL, 'L1S1UE1', 2),
(20, 'INFO', NULL, '2023-02-27 14:00:00', '2023-02-27 16:00:00', '6aa84f', NULL, 'L1S1UE1', 2),
(21, 'SVT', NULL, '2023-02-27 16:00:00', '2023-02-27 18:00:00', '6aa84f', NULL, 'L1S1UE1', 2),
(46, 'event', NULL, '2023-03-01 15:00:00', '2023-03-01 16:45:00', '3c78d8', NULL, NULL, NULL),
(57, 'titi', NULL, '2023-02-28 15:20:00', '2023-02-28 17:20:00', '3c78d8', NULL, NULL, NULL),
(62, 'titi', 'CM', '2023-03-01 12:30:00', '2023-03-01 14:30:00', '6aa84f', NULL, NULL, 1),
(63, 'pain', 'CM', '2023-03-09 10:30:00', '2023-03-09 10:45:00', 'f1c232', NULL, 'L1S1UE1', 1),
(73, 'DevOps', 'CM', '2023-03-20 08:30:00', '2023-03-20 10:00:00', 'ff8040', NULL, 'M1DS10', 1),
(74, 'DevOps', 'TD', '2023-03-20 10:15:00', '2023-03-20 11:45:00', '0000ff', NULL, 'M1DS10', 1),
(75, 'RIA', 'CM', '2023-03-20 13:30:00', '2023-03-20 15:00:00', 'ff8040', NULL, 'M1DS7', 3),
(76, 'RIA', 'CM', '2023-03-20 15:15:00', '2023-03-20 16:45:00', '0000ff', NULL, 'M1DS7', 3),
(77, 'Programmation Mobile', 'CM', '2023-03-21 08:30:00', '2023-03-21 10:00:00', 'ff8040', NULL, 'M1DS9', 2),
(78, 'Programmation Mobile', 'CM', '2023-03-21 10:15:00', '2023-03-21 11:45:00', 'ff8040', NULL, 'M1DS9', 2),
(79, 'Programmation Mobile', 'CM', '2023-03-21 13:30:00', '2023-03-21 15:00:00', 'ff8040', NULL, 'M1DS9', 2),
(80, 'Programmation Mobile', 'CM', '2023-03-21 15:15:00', '2023-03-21 16:45:00', 'ff8040', NULL, 'M1DS9', 2),
(81, 'IoT', 'TP', '2023-03-22 09:00:00', '2023-03-22 12:00:00', 'ff0080', NULL, 'M1DS8', 3),
(82, 'IoT', 'TP', '2023-03-22 14:00:00', '2023-03-22 17:00:00', 'ff0080', NULL, 'M1DS8', 3),
(83, 'RIA', 'TD', '2023-03-23 13:30:00', '2023-03-23 15:00:00', '0000ff', NULL, 'M1DS7', 1),
(84, 'RIA', 'TD', '2023-03-23 15:15:00', '2023-03-23 16:45:00', '0000ff', NULL, 'M1DS7', 1),
(85, 'Anglais', 'TD', '2023-03-24 08:30:00', '2023-03-24 10:30:00', '0000ff', NULL, 'M1DS12', 2),
(86, 'Corse', 'TD', '2023-03-24 13:30:00', '2023-03-24 15:30:00', '0000ff', NULL, 'M1ST2CO', 2),
(87, 'RIA', 'CM', '2023-03-27 13:30:00', '2023-03-27 15:00:00', 'ff8040', NULL, 'M1DS7', 3),
(88, 'RIA', 'CM', '2023-03-27 15:15:00', '2023-03-27 16:45:00', 'ff8040', NULL, 'M1DS7', 3),
(89, 'Programmation Mobile', 'CM', '2023-03-30 13:30:00', '2023-03-30 15:00:00', 'ff8040', NULL, 'M1DS9', 2),
(90, 'Programmation Mobile', 'TD', '2023-03-30 15:15:00', '2023-03-30 16:45:00', '0000ff', NULL, 'M1DS9', 2),
(91, 'Programmation Mobile', 'CM', '2023-03-28 13:30:00', '2023-03-28 15:00:00', 'ff8040', NULL, 'M1DS9', 2),
(92, 'Programmation Mobile', 'CM', '2023-03-28 15:15:00', '2023-03-28 16:45:00', 'ff8040', NULL, 'M1DS9', 2),
(93, 'IoT', 'TP', '2023-03-29 09:00:00', '2023-03-29 12:00:00', 'ff0080', NULL, 'M1DS8', 3),
(94, 'DevOps', 'CM', '2023-03-30 08:30:00', '2023-03-30 10:00:00', 'ff8040', NULL, 'M1DS10', 3),
(95, 'DevOps', 'TD', '2023-03-30 10:15:00', '2023-03-30 11:45:00', '0000ff', NULL, 'M1DS10', 3),
(96, 'RIA', 'CM', '2023-03-28 08:30:00', '2023-03-28 10:00:00', 'ff8040', NULL, 'M1DS7', 1),
(97, 'RIA', 'TD', '2023-03-28 10:15:00', '2023-03-28 11:45:00', '0000ff', NULL, 'M1DS7', 1),
(98, 'Anglais', 'TD', '2023-03-31 08:30:00', '2023-03-31 10:30:00', '0000ff', NULL, 'M1DS12', 2),
(99, 'Corse', 'TD', '2023-03-31 13:30:00', '2023-03-31 15:30:00', '0000ff', NULL, 'M1ST2CO', 2);

-- --------------------------------------------------------

--
-- Structure de la table `evenement_groupe_liaison`
--

DROP TABLE IF EXISTS `evenement_groupe_liaison`;
CREATE TABLE IF NOT EXISTS `evenement_groupe_liaison` (
  `id_evenement` int(11) NOT NULL,
  `code_groupe` varchar(50) COLLATE utf8mb4_bin NOT NULL,
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
(63, 'L1info'),
(73, 'M1DS'),
(74, 'M1DS'),
(75, 'M1DS'),
(76, 'M1DS'),
(77, 'M1DS'),
(78, 'M1DS'),
(79, 'M1DS'),
(80, 'M1DS'),
(81, 'M1DS'),
(82, 'M1DS'),
(83, 'M1DS'),
(84, 'M1DS'),
(85, 'M1DS'),
(86, 'M1DS'),
(87, 'M1DS'),
(88, 'M1DS'),
(89, 'M1DS'),
(90, 'M1DS'),
(91, 'M1DS'),
(92, 'M1DS'),
(93, 'M1DS'),
(94, 'M1DS'),
(95, 'M1DS'),
(96, 'M1DS'),
(97, 'M1DS'),
(98, 'M1DS'),
(99, 'M1DS');

-- --------------------------------------------------------

--
-- Structure de la table `evenement_user_liaison`
--

DROP TABLE IF EXISTS `evenement_user_liaison`;
CREATE TABLE IF NOT EXISTS `evenement_user_liaison` (
  `id_evenement` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_evenement`,`id_user`),
  KEY `id_evenement` (`id_evenement`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `evenement_user_liaison`
--

INSERT INTO `evenement_user_liaison` (`id_evenement`, `id_user`) VALUES
(1, 5),
(17, 8),
(73, 15),
(74, 15),
(75, 5),
(76, 5),
(77, 16),
(78, 16),
(79, 16),
(80, 16),
(81, 17),
(82, 17),
(83, 5),
(84, 5),
(85, 19),
(86, 18),
(87, 5),
(88, 5),
(89, 16),
(90, 16),
(91, 16),
(92, 16),
(93, 17),
(94, 15),
(95, 15),
(96, 5),
(97, 5),
(98, 19),
(99, 18);

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE IF NOT EXISTS `groupe` (
  `code_groupe` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `nom_groupe` varchar(500) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`code_groupe`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`code_groupe`, `nom_groupe`) VALUES
('L1SI', 'licence 1 sciences pour l ingenieur'),
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
('M1DS', 'Master Développement Full Stack'),
('MSTAPS', 'master sport');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `id_salle` int(11) NOT NULL AUTO_INCREMENT,
  `nom_salle` varchar(500) COLLATE utf8mb4_bin NOT NULL,
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
  `code_ue` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `nom_ue` varchar(500) COLLATE utf8mb4_bin NOT NULL,
  `heures_ue` int(11) NOT NULL,
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
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(500) COLLATE utf8mb4_bin NOT NULL,
  `prenom_user` varchar(500) COLLATE utf8mb4_bin NOT NULL,
  `mdp_user` varchar(2047) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nom_user`, `prenom_user`, `mdp_user`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'Delhom', 'Marielle', 'mdp'),
(3, 'Vareille', 'Matthieu', 'mdp'),
(4, 'Paoli', 'Christophe', 'mdp'),
(5, 'Bisgambiglia', 'Paul-Antoine', 'mdp'),
(6, 'olivier', 'tom', 'mdp'),
(7, 'BAZAN', 'CLEMENT', 'mdp'),
(8, 'AFSAOUI', 'THEO', 'mdp'),
(9, 'CHAMPION', 'YOUSSEF', 'mdp'),
(10, 'GILOT', 'VALERIE', 'mdp'),
(11, 'LANGEVIN', 'PHILLIPE', 'mdp'),
(12, 'GIES', 'VALENTIN', 'mdp'),
(13, 'nguyen', 'christian', 'mdp'),
(14, 'joel', 'joel', 'mdp'),
(15, 'Bisgambiglia', 'Paul', 'mdp'),
(16, 'Fancello', 'Mathieu', 'mdp'),
(17, 'Duchaud', 'Jean', 'mdp'),
(18, 'Poggi', 'Frederic', 'mdp'),
(19, 'Williams', 'Marc', 'mdp');

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
