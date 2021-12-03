-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 03 déc. 2021 à 17:26
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

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

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `login` varchar(200) NOT NULL,
  `hash_password` varchar(255) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`login`, `hash_password`) VALUES
('admin', '$2y$10$YZVaNjgT7SEZ0aRdNpY2V.kmSd.UPxG1hpGe602zPWSSjSHtmv/p6');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `titre` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `lien` varchar(200) NOT NULL,
  `date` varchar(50) NOT NULL,
  `idSite` varchar(200) NOT NULL,
  PRIMARY KEY (`lien`),
  KEY `fk_Site` (`idSite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`titre`, `description`, `lien`, `date`, `idSite`) VALUES
('BFMTV', '\"ELLE ÉTAIT PLEINE DE RÊVES ET D\'ESPOIRS\": LES PROCHES DE MARIAM, QUI A TROUVÉ LA MORT AU LARGE DE CALAIS, S\'EXPRIMENT', 'https://www.bfmtv.com/international/elle-etait-pleine-de-reves-et-d-espoirs-les-proches-de-mariam-qui-a-trouve-la-mort-au-large-de-calais-s-expriment_AV-202111280054.html', '2021-11-28 16:03:48', 'http://bfm.fr\r\n'),
('BFMTV', 'MARINE LE PEN INCITE ERIC ZEMMOUR À SE RALLIER À ELLE, NOTAMMENT APRÈS L\'ÉPISODE DU DOIGT D\'HONNEUR', 'https://www.bfmtv.com/politique/marine-le-pen-appelle-eric-zemmour-a-renoncer-a-sa-candidature-apres-son-doigt-d-honneur_AN-202111280131.html', '2021-11-28 16:04:05', 'http://bfm.fr\r\n'),
('CNews', 'CORONAVIRUS EN FRANCE : LE BILAN DE CE SAMEDI 27 NOVEMBRE', 'https://www.cnews.fr/france/2021-11-27/coronavirus-en-france-le-bilan-de-ce-samedi-27-novembre-1154455', '2021-11-28 16:02:59', 'http://cnews.fr'),
('CNews', 'DIRECT - CORONAVIRUS : LES PAYS-BAS ANNONCENT QUE 13 PASSAGERS ARRIVÉS D\'AFRIQUE DU SUD SONT PORTEURS DU VARIANT OMICRON', 'https://www.cnews.fr/monde/2021-11-28/direct-coronavirus-les-pays-bas-annoncent-que-13-passagers-arrives-dafrique-du-sud', '2021-11-28 16:02:30', 'http://cnews.fr'),
('Gamekult', 'Notre sélection mobile de la semaine : Rubicon, un jeu qu\'il faut oser franchir', 'https://www.gamekult.com/actualite/notre-selection-mobile-de-la-semaine-rubicon-un-jeu-qu-il-faut-oser-franchir-3050844925.html', '2021-11-28 15:58:28', 'https://www.gamekult.com/'),
('Gamekult', 'Black Friday Amazon : La Razer Basilisk Ultimate atteint son plus bas prix (-42 %)', 'https://www.gamekult.com/bon-plan/la-razer-basilisk-ultimate-atteint-son-plus-bas-prix-sur-amazon-42-3050844713.html', '2021-11-28 15:59:12', 'https://www.gamekult.com/'),
('Jeux-Vidéo.com', 'Saints Row : Date de sortie, reboot, open-world... On fait le point sur le GTA-like prometteur', 'https://www.jeuxvideo.com/news/1492054/saints-row-date-de-sortie-reboot-open-world-on-fait-le-point-sur-le-gta-like-prometteur.htm', '2021-11-28 15:56:28', 'https://www.jeuxvideo.com/'),
('Jeux-Vidéo.com', 'La dernière invention d’Apple ne coûte que 29€ pendant le Black Friday', 'https://www.jeuxvideo.com/news/1498835/la-derniere-invention-d-apple-ne-coute-que-29-pendant-le-black-friday.htm', '2021-11-28 15:57:46', 'https://www.jeuxvideo.com/'),
('Jeux-Vidéo.com', 'Boulanger : Voici les 31 ultimes offres à saisir jusqu\'à lundi 29 novembre !', 'https://www.jeuxvideo.com/news/1499648/boulanger-voici-les-31-ultimes-offres-a-saisir-jusqu-a-lundi-29-novembre.htm', '2021-11-28 15:56:57', 'https://www.jeuxvideo.com/'),
('Le Monde', '« En Afrique, la Chine contre-attaque sur l’héritage du colonialisme »', 'https://www.lemonde.fr/afrique/article/2021/11/28/en-afrique-la-chine-contre-attaque-sur-l-heritage-du-colonialisme_6103913_3212.html', '2021-11-28 16:00:27', 'https://www.lemonde.fr/planete/rss_full.xml'),
('Le Monde', 'Présidentielle 2022 : Xavier Bertrand joue son avenir politique à quitte ou double', 'https://www.lemonde.fr/election-presidentielle-2022/article/2021/11/28/presidentielle-2022-xavier-bertrand-joue-son-avenir-politique-a-quitte-ou-double_6103901_6059010.html', '2021-11-28 15:59:52', 'https://www.lemonde.fr/planete/rss_full.xml');

-- --------------------------------------------------------

--
-- Structure de la table `site`
--

DROP TABLE IF EXISTS `site`;
CREATE TABLE IF NOT EXISTS `site` (
  `fluxrss` varchar(200) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `lien` varchar(2000) NOT NULL,
  `logo` varchar(2000) NOT NULL,
  PRIMARY KEY (`fluxrss`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `site`
--

INSERT INTO `site` (`fluxrss`, `nom`, `lien`, `logo`) VALUES
('http://bfm.fr\r\n', 'BFMTV', 'https://www.bfmtv.com/', 'https://www.bfmtv.com/assets/images/BFMTV.svg'),
('http://cnews.fr', 'CNews', 'https://www.cnews.fr/', 'https://static.cnews.fr/sites/all/themes/directmatinv4/cnews-logo.png'),
('https://www.gamekult.com/', 'Gamekult', 'https://www.gamekult.com/', 'https://d3isma7snj3lcx.cloudfront.net/assets/front/img/base/logo/gk-ball-192x192.png'),
('https://www.jeuxvideo.com/', 'Jeux-Video.com', 'https://www.jeuxvideo.com/', 'https://www.jeuxvideo.com/favicon.png'),
('https://www.lemonde.fr/planete/rss_full.xml', 'Le Monde', 'https://www.lemonde.fr/', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/43/Le_Monde.svg/317px-Le_Monde.svg.png');

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
