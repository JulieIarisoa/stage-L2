-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 16 nov. 2023 à 17:37
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
-- Base de données : `projet_stage`
--

-- --------------------------------------------------------

--
-- Structure de la table `entre`
--

DROP TABLE IF EXISTS `entre`;
CREATE TABLE IF NOT EXISTS `entre` (
  `id_entre` int NOT NULL AUTO_INCREMENT,
  `numero_personnel` int NOT NULL,
  `date_entre` date DEFAULT NULL,
  `heure_entre` time DEFAULT NULL,
  `materiel_apporter` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_entre`,`numero_personnel`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `entre`
--

INSERT INTO `entre` (`id_entre`, `numero_personnel`, `date_entre`, `heure_entre`, `materiel_apporter`) VALUES
(2, 1, '2023-11-14', '16:20:59', ''),
(5, 1, '2023-11-15', '10:59:02', 'flash'),
(7, 3, '2023-11-15', '11:40:17', 'ordi,....'),
(8, 1, '2023-11-16', '19:19:35', '');

-- --------------------------------------------------------

--
-- Structure de la table `permission`
--

DROP TABLE IF EXISTS `permission`;
CREATE TABLE IF NOT EXISTS `permission` (
  `id_permission` int NOT NULL AUTO_INCREMENT,
  `numero_personnel` int NOT NULL,
  `date_permission` date NOT NULL,
  `heure_sortie` time DEFAULT NULL,
  `heure_retour` time DEFAULT NULL,
  `motif` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_permission`,`numero_personnel`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `permission`
--

INSERT INTO `permission` (`id_permission`, `numero_personnel`, `date_permission`, `heure_sortie`, `heure_retour`, `motif`) VALUES
(31, 1, '2023-11-15', '11:18:01', '11:18:04', 'Gouter'),
(32, 3, '2023-11-15', '11:41:16', '11:41:25', 'Gouter');

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

DROP TABLE IF EXISTS `personnel`;
CREATE TABLE IF NOT EXISTS `personnel` (
  `numero_personnel` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `poste` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `numero_telephone` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `age` int NOT NULL,
  `numero_cin` varchar(12) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `nationalite` varchar(20) NOT NULL,
  `langue` varchar(20) NOT NULL,
  `travail_depuis` date NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`numero_personnel`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`numero_personnel`, `nom`, `prenom`, `poste`, `numero_telephone`, `email`, `age`, `numero_cin`, `adresse`, `nationalite`, `langue`, `travail_depuis`, `image`) VALUES
(1, 'Computer', 'STORE', 'Magasin', '0340000000', 'Computerstore@gmail.com', 4, '000 000 000 ', 'Ampasambazaha Fianarantsoa', 'malagasy', 'Tout les langues', '2023-11-14', 'logo computer store.jpg'),
(2, 'HARISOA', 'Julie', 'Stagiaire', '0341111111', 'harisoajulie@gmail.com', 19, '202 202 202 ', 'Fianarantsoa', 'Malagasy', 'Malagasy', '2023-11-15', 'logo computer store.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `sortie`
--

DROP TABLE IF EXISTS `sortie`;
CREATE TABLE IF NOT EXISTS `sortie` (
  `id_sortie` int NOT NULL AUTO_INCREMENT,
  `numero_personnel` int NOT NULL,
  `date_sortie` date DEFAULT NULL,
  `heure_sortie` time DEFAULT NULL,
  `sortie` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_sortie`,`numero_personnel`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `sortie`
--

INSERT INTO `sortie` (`id_sortie`, `numero_personnel`, `date_sortie`, `heure_sortie`, `sortie`) VALUES
(52, 1, '2023-11-14', '15:28:36', 0),
(53, 2, '2023-11-15', '11:00:29', 0),
(54, 3, '2023-11-15', '11:40:47', 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mot_de_passe` varchar(8) NOT NULL,
  `nom_utilisateur` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `mot_de_passe`, `nom_utilisateur`) VALUES
(1, 'admin', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
