-- phpMyAdmin SQL Dump
-- version 5.0.4deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 11 déc. 2021 à 18:26
-- Version du serveur :  10.5.12-MariaDB-0+deb11u1
-- Version de PHP : 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbphpnews`
--
CREATE DATABASE IF NOT EXISTS `dbphpnews` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dbphpnews`;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `login` varchar(200) NOT NULL,
  `hash_password` varchar(255) NOT NULL,
  `nbNewsParPage` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`login`, `hash_password`, `nbNewsParPage`) VALUES
('root', '$2y$10$YZVaNjgT7SEZ0aRdNpY2V.kmSd.UPxG1hpGe602zPWSSjSHtmv/p6', NULL),
('user', 'pasdemotdepasse', 10);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `titre` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `lien` varchar(256) NOT NULL,
  `date` datetime NOT NULL,
  `idSite` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `site`
--

CREATE TABLE `site` (
  `fluxrss` varchar(256) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `lien` varchar(256) NOT NULL,
  `logo` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `site`
--

INSERT INTO `site` (`fluxrss`, `nom`, `lien`, `logo`) VALUES
('http://fetchrss.com/rss/5d9f4c7d8a93f892718b45675e197ee98a93f81a218b4567.xml', 'CNews', 'https://www.cnews.fr/', 'https://static.cnews.fr/sites/all/themes/directmatinv4/cnews-logo.png'),
('https://partner-feeds.20min.ch/rss/20minutes/monde', '20 Minutes (Monde)', 'https://www.20min.ch/fr/monde', 'https://www.20min.ch/icons/20min_fr.png'),
('https://www.bfmtv.com/rss/news-24-7', 'BFMTV', 'https://www.bfmtv.com/', 'https://upload.wikimedia.org/wikipedia/commons/b/b6/Logo_BFM_TV_%282019%29.png'),
('https://www.gamekult.com/feed.xml', 'Gamekult', 'https://www.gamekult.com/', 'https://d3isma7snj3lcx.cloudfront.net/assets/front/img/base/logo/gk-ball-192x192.png'),
('https://www.jeuxvideo.com/rss/rss-pc.xml', 'Jeux-Video.com', 'https://www.jeuxvideo.com/', 'https://www.jeuxvideo.com/favicon.png'),
('https://www.lemonde.fr/planete/rss_full.xml', 'Le Monde', 'https://www.lemonde.fr/', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/43/Le_Monde.svg/317px-Le_Monde.svg.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`login`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`lien`),
  ADD KEY `fk_Site` (`idSite`);

--
-- Index pour la table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`fluxrss`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_Site` FOREIGN KEY (`idSite`) REFERENCES `site` (`fluxrss`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
