-- phpMyAdmin SQL Dump
-- version 5.0.4deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 11 déc. 2021 à 17:24
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
('user', 'pasdemotdepasse', 7);

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

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`titre`, `description`, `lien`, `date`, `idSite`) VALUES
('Trump à propos de Netanyahu: «Qu’il aille se faire foutre!»', 'Trump à propos de Netanyahu: «Qu’il aille se faire foutre!»', 'https://www.20min.ch/fr/100879247679', '2021-12-10 17:39:48', 'https://partner-feeds.20min.ch/rss/20minutes/monde'),
('Le périple inhumain des migrants dans les camions d’Amérique centrale', 'Le périple inhumain des migrants dans les camions d’Amérique centrale', 'https://www.20min.ch/fr/103403298958', '2021-12-11 10:53:48', 'https://partner-feeds.20min.ch/rss/20minutes/monde'),
('Biden conclut son sommet pour la démocratie sous les critiques', 'Biden conclut son sommet pour la démocratie sous les critiques', 'https://www.20min.ch/fr/149482032166', '2021-12-11 00:01:02', 'https://partner-feeds.20min.ch/rss/20minutes/monde'),
('Le contrat franco-grec est «signé», souligne Paris après l’offre américaine', 'Le contrat franco-grec est «signé», souligne Paris après l’offre américaine', 'https://www.20min.ch/fr/190749528409', '2021-12-10 23:52:46', 'https://partner-feeds.20min.ch/rss/20minutes/monde'),
('Une énorme tornade fait au moins 50 morts dans le Kentucky', 'Une énorme tornade fait au moins 50 morts dans le Kentucky', 'https://www.20min.ch/fr/210964679032', '2021-12-11 11:44:28', 'https://partner-feeds.20min.ch/rss/20minutes/monde'),
('Ghislaine Maxwell: l’accusation a bouclé ses interrogatoires', 'Ghislaine Maxwell: l’accusation a bouclé ses interrogatoires', 'https://www.20min.ch/fr/238537179926', '2021-12-11 05:17:34', 'https://partner-feeds.20min.ch/rss/20minutes/monde'),
('Le référendum se déroulera sous préalerte cyclonique', 'Le référendum se déroulera sous préalerte cyclonique', 'https://www.20min.ch/fr/275362253055', '2021-12-11 09:02:20', 'https://partner-feeds.20min.ch/rss/20minutes/monde'),
('L’opposante Reckya Madougou condamnée à 20 ans de prison', 'L’opposante Reckya Madougou condamnée à 20 ans de prison', 'https://www.20min.ch/fr/281558773787', '2021-12-11 06:51:17', 'https://partner-feeds.20min.ch/rss/20minutes/monde'),
('La fille du premier Américain dans l’espace s’apprête à décoller à son tour ', 'La fille du premier Américain dans l’espace s’apprête à décoller à son tour ', 'https://www.20min.ch/fr/360125569045', '2021-12-11 14:42:41', 'https://partner-feeds.20min.ch/rss/20minutes/monde'),
('Annonce d’un nouveau gouvernement de coalition inédit', 'Annonce d’un nouveau gouvernement de coalition inédit', 'https://www.20min.ch/fr/369470123075', '2021-12-11 14:52:36', 'https://partner-feeds.20min.ch/rss/20minutes/monde'),
('Elle présente un faux pass sanitaire et décède à l\'hôpital', 'Elle présente un faux pass sanitaire et décède à l\'hôpital', 'https://www.20min.ch/fr/372497392812', '2021-12-11 12:40:26', 'https://partner-feeds.20min.ch/rss/20minutes/monde'),
('Un avocat réputé mis en examen pour «viol»', 'Un avocat réputé mis en examen pour «viol»', 'https://www.20min.ch/fr/372532940605', '2021-12-10 17:18:16', 'https://partner-feeds.20min.ch/rss/20minutes/monde'),
('Le G7 veut montrer un front uni face aux «agresseurs mondiaux»', 'Le G7 veut montrer un front uni face aux «agresseurs mondiaux»', 'https://www.20min.ch/fr/390030761737', '2021-12-11 01:22:19', 'https://partner-feeds.20min.ch/rss/20minutes/monde'),
('Des millions de pilules de captagon saisies au Liban et en Syrie', 'Des millions de pilules de captagon saisies au Liban et en Syrie', 'https://www.20min.ch/fr/450720447655', '2021-12-11 15:38:17', 'https://partner-feeds.20min.ch/rss/20minutes/monde'),
('Lourdes peines pour les responsables de l’incendie d’une discothèque', 'Lourdes peines pour les responsables de l’incendie d’une discothèque', 'https://www.20min.ch/fr/461864264223', '2021-12-11 01:52:45', 'https://partner-feeds.20min.ch/rss/20minutes/monde'),
('Les Palestiniens de Cisjordanie votent aux municipales', 'Les Palestiniens de Cisjordanie votent aux municipales', 'https://www.20min.ch/fr/565937799279', '2021-12-11 07:33:10', 'https://partner-feeds.20min.ch/rss/20minutes/monde'),
('«Je n’avais jamais eu de sapin de Noël chez moi»', '«Je n’avais jamais eu de sapin de Noël chez moi»', 'https://www.20min.ch/fr/579953359308', '2021-12-11 15:00:55', 'https://partner-feeds.20min.ch/rss/20minutes/monde'),
('Le Parlement des Serbes de Bosnie fait un pas vers le séparatisme', 'Le Parlement des Serbes de Bosnie fait un pas vers le séparatisme', 'https://www.20min.ch/fr/611558808050', '2021-12-11 01:46:22', 'https://partner-feeds.20min.ch/rss/20minutes/monde'),
('«La démocratie américaine est une arme de destruction massive»', '«La démocratie américaine est une arme de destruction massive»', 'https://www.20min.ch/fr/668631816583', '2021-12-11 09:04:58', 'https://partner-feeds.20min.ch/rss/20minutes/monde'),
('De Cannes à l’enfermement à Kaboul: un réalisateur afghan à l’ère des talibans', 'De Cannes à l’enfermement à Kaboul: un réalisateur afghan à l’ère des talibans', 'https://www.20min.ch/fr/669960886689', '2021-12-11 11:19:26', 'https://partner-feeds.20min.ch/rss/20minutes/monde'),
('«Il s’est avéré que c’était un virus complètement différent»', '«Il s’est avéré que c’était un virus complètement différent»', 'https://www.20min.ch/fr/720821813143', '2021-12-11 09:33:59', 'https://partner-feeds.20min.ch/rss/20minutes/monde'),
('Un élu breton mis en examen pour viol aggravé', 'Un élu breton mis en examen pour viol aggravé', 'https://www.20min.ch/fr/730627937687', '2021-12-11 13:39:53', 'https://partner-feeds.20min.ch/rss/20minutes/monde'),
('Les images du jour', 'Les images du jour', 'https://www.20min.ch/fr/854039659326', '2021-01-02 18:51:16', 'https://partner-feeds.20min.ch/rss/20minutes/monde'),
('Londres accorde 23 licences supplémentaires aux Français', 'Londres accorde 23 licences supplémentaires aux Français', 'https://www.20min.ch/fr/859537113471', '2021-12-11 15:05:44', 'https://partner-feeds.20min.ch/rss/20minutes/monde'),
('Libération de deux humanitaires du CICR enlevés le 30 novembre', 'Libération de deux humanitaires du CICR enlevés le 30 novembre', 'https://www.20min.ch/fr/924895733091', '2021-12-11 13:15:26', 'https://partner-feeds.20min.ch/rss/20minutes/monde'),
('Mexico demande à Washington de changer de politique migratoire', 'Mexico demande à Washington de changer de politique migratoire', 'https://www.20min.ch/fr/954182360862', '2021-12-11 05:28:12', 'https://partner-feeds.20min.ch/rss/20minutes/monde'),
('BFMTV', '\"ELLE ÉTAIT PLEINE DE RÊVES ET D\'ESPOIRS\": LES PROCHES DE MARIAM, QUI A TROUVÉ LA MORT AU LARGE DE CALAIS, S\'EXPRIMENT', 'https://www.bfmtv.com/international/elle-etait-pleine-de-reves-et-d-espoirs-les-proches-de-mariam-qui-a-trouve-la-mort-au-large-de-calais-s-expriment_AV-202111280054.html', '2021-11-28 00:00:00', 'http://bfm.fr'),
('BFMTV', 'MARINE LE PEN INCITE ERIC ZEMMOUR À SE RALLIER À ELLE, NOTAMMENT APRÈS L\'ÉPISODE DU DOIGT D\'HONNEUR', 'https://www.bfmtv.com/politique/marine-le-pen-appelle-eric-zemmour-a-renoncer-a-sa-candidature-apres-son-doigt-d-honneur_AN-202111280131.html', '2021-11-28 00:00:00', 'http://bfm.fr'),
('CNews', 'CORONAVIRUS EN FRANCE : LE BILAN DE CE SAMEDI 27 NOVEMBRE', 'https://www.cnews.fr/france/2021-11-27/coronavirus-en-france-le-bilan-de-ce-samedi-27-novembre-1154455', '2021-11-28 00:00:00', 'http://cnews.fr'),
('CNews', 'DIRECT - CORONAVIRUS : LES PAYS-BAS ANNONCENT QUE 13 PASSAGERS ARRIVÉS D\'AFRIQUE DU SUD SONT PORTEURS DU VARIANT OMICRON', 'https://www.cnews.fr/monde/2021-11-28/direct-coronavirus-les-pays-bas-annoncent-que-13-passagers-arrives-dafrique-du-sud', '2021-11-28 00:00:00', 'http://cnews.fr'),
('Gamekult', 'Notre sélection mobile de la semaine : Rubicon, un jeu qu\'il faut oser franchir', 'https://www.gamekult.com/actualite/notre-selection-mobile-de-la-semaine-rubicon-un-jeu-qu-il-faut-oser-franchir-3050844925.html', '2021-11-28 00:00:00', 'https://www.gamekult.com'),
('Gamekult', 'Black Friday Amazon : La Razer Basilisk Ultimate atteint son plus bas prix (-42 %)', 'https://www.gamekult.com/bon-plan/la-razer-basilisk-ultimate-atteint-son-plus-bas-prix-sur-amazon-42-3050844713.html', '2021-11-28 00:00:00', 'https://www.gamekult.com'),
('Jeux-Vidéo.com', 'Saints Row : Date de sortie, reboot, open-world... On fait le point sur le GTA-like prometteur', 'https://www.jeuxvideo.com/news/1492054/saints-row-date-de-sortie-reboot-open-world-on-fait-le-point-sur-le-gta-like-prometteur.htm', '2021-11-28 00:00:00', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Jeux-Vidéo.com', 'La dernière invention d’Apple ne coûte que 29€ pendant le Black Friday', 'https://www.jeuxvideo.com/news/1498835/la-derniere-invention-d-apple-ne-coute-que-29-pendant-le-black-friday.htm', '2021-11-28 00:00:00', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Jeux-Vidéo.com', 'Boulanger : Voici les 31 ultimes offres à saisir jusqu\'à lundi 29 novembre !', 'https://www.jeuxvideo.com/news/1499648/boulanger-voici-les-31-ultimes-offres-a-saisir-jusqu-a-lundi-29-novembre.htm', '2021-11-28 00:00:00', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('New World : \"Nous voulons faire savoir aux joueurs que nous les écoutons\"', 'New World : \"Nous voulons faire savoir aux joueurs que nous les écoutons\"', 'https://www.jeuxvideo.com/news/1501579/new-world-nous-voulons-faire-savoir-aux-joueurs-que-nous-les-ecoutons.htm', '2021-12-11 15:00:02', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Marvel, Naruto, Batman... À qui profitent les collabs de Fortnite ?', 'Marvel, Naruto, Batman... À qui profitent les collabs de Fortnite ?', 'https://www.jeuxvideo.com/news/1502368/marvel-naruto-batman-a-qui-profitent-les-collabs-de-fortnite.htm', '2021-12-11 09:30:02', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Genshin Impact, tout savoir sur l\'événement \"L\'affaire du Bantan Sango : Le chien guerrier\" (2ème', 'Genshin Impact, tout savoir sur l\'événement \"L\'affaire du Bantan Sango : Le chien guerrier\" (2ème partie)', 'https://www.jeuxvideo.com/news/1503563/genshin-impact-tout-savoir-sur-l-evenement-l-affaire-du-bantan-sango-le-chien-guerrier.htm', '2021-12-10 17:45:00', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Wartales, guide : astuces et conseils pour bien débuter votre vie de mercenaire', 'Wartales, guide : astuces et conseils pour bien débuter votre vie de mercenaire', 'https://www.jeuxvideo.com/news/1504446/wartales-guide-astuces-et-conseils-pour-bien-debuter-votre-vie-de-mercenaire.htm', '2021-12-10 18:02:46', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Les jeux gratuits du week-end avec Dying Light, Chivalry 2, Anno et bien d\'autres', 'Les jeux gratuits du week-end avec Dying Light, Chivalry 2, Anno et bien d\'autres', 'https://www.jeuxvideo.com/news/1504558/les-jeux-gratuits-du-week-end-avec-dying-light-chivalry-2-anno-et-bien-d-autres.htm', '2021-12-10 16:49:22', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('The Game Awards : Le Zelda-like, Tunic, trouve sa date de sortie', 'The Game Awards : Le Zelda-like, Tunic, trouve sa date de sortie', 'https://www.jeuxvideo.com/news/1504598/the-game-awards-le-zelda-like-tunic-trouve-sa-date-de-sortie.htm', '2021-12-10 14:30:02', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Star Wars Eclipse : infos, histoire, période... Tout savoir sur le jeu développé en France', 'Star Wars Eclipse : infos, histoire, période... Tout savoir sur le jeu développé en France', 'https://www.jeuxvideo.com/news/1504779/star-wars-eclipse-infos-histoire-periode-tout-savoir-sur-le-jeu-developpe-en-france.htm', '2021-12-10 17:45:02', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Dune : après le film, un jeu vidéo annoncé aux Game Awards 2021 !', 'Dune : après le film, un jeu vidéo annoncé aux Game Awards 2021 !', 'https://www.jeuxvideo.com/news/1504783/dune-apres-le-film-un-jeu-video-annonce-aux-game-awards-2021.htm', '2021-12-10 13:35:02', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Game Awards 2021 : Wonder Woman aura le droit à son adaptation par un grand studio !', 'Game Awards 2021 : Wonder Woman aura le droit à son adaptation par un grand studio !', 'https://www.jeuxvideo.com/news/1504786/game-awards-2021-wonder-woman-aura-le-droit-a-son-adaptation-par-un-grand-studio.htm', '2021-12-10 13:00:02', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Final Fantasy 7 PS5 : le Remake déjà sur une autre plateforme avec un somptueux trailer aux Game A', 'Final Fantasy 7 PS5 : le Remake déjà sur une autre plateforme avec un somptueux trailer aux Game Awards 2021 ', 'https://www.jeuxvideo.com/news/1504847/final-fantasy-7-ps5-le-remake-deja-sur-une-autre-plateforme-avec-un-somptueux-trailer-aux-game-awards-2021.htm', '2021-12-10 14:05:01', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('L\'Ecran PC Gamer Samsung Odyssey G5 toujours en promo avant Noël', 'L\'Ecran PC Gamer Samsung Odyssey G5 toujours en promo avant Noël', 'https://www.jeuxvideo.com/news/1504848/l-ecran-pc-gamer-samsung-odyssey-g5-toujours-en-promo-avant-noel.htm', '2021-12-10 16:50:02', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Game Awards 2021 : Nightingale, nouveau jeu de survie par des anciens de BioWare (Mass Effect, Drago', 'Game Awards 2021 : Nightingale, nouveau jeu de survie par des anciens de BioWare (Mass Effect, Dragon Age)', 'https://www.jeuxvideo.com/news/1504857/game-awards-2021-nightingale-nouveau-jeu-de-survie-par-des-anciens-de-bioware-mass-effect-dragon-age.htm', '2021-12-10 17:15:02', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Game Awards 2021 : Elden Ring au-dessus de la masse avec un trailer magistral', 'Game Awards 2021 : Elden Ring au-dessus de la masse avec un trailer magistral', 'https://www.jeuxvideo.com/news/1504894/game-awards-2021-elden-ring-au-dessus-de-la-masse-avec-un-trailer-magistrale.htm', '2021-12-10 15:00:02', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('A Plague Tale Requiem : la France à l\'honneur, une fois de plus, avec un trailer spectaculaire aux ', 'A Plague Tale Requiem : la France à l\'honneur, une fois de plus, avec un trailer spectaculaire aux Game Awards 2021', 'https://www.jeuxvideo.com/news/1504897/a-plague-tale-requiem-la-france-a-l-honneur-une-fois-de-plus-avec-un-trailer-spectaculaire-aux-game-awards-2021.htm', '2021-12-10 16:25:02', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('PUBG annonce son nouveau modèle économique, pour le meilleur ?', 'PUBG annonce son nouveau modèle économique, pour le meilleur ?', 'https://www.jeuxvideo.com/news/1504974/pubg-annonce-son-nouveau-modele-economique-pour-le-meilleur.htm', '2021-12-10 18:25:02', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Sonic Frontiers : Découvrez le monde ouvert pour la première fois avec ce trailer des Game Awards ', 'Sonic Frontiers : Découvrez le monde ouvert pour la première fois avec ce trailer des Game Awards 2021', 'https://www.jeuxvideo.com/news/1504990/sonic-frontiers-decouvrez-le-monde-ouvert-pour-la-premiere-fois-avec-ce-trailer-des-game-awards-2021.htm', '2021-12-10 18:30:02', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('The Game Awards 2021 : le DLC de l’excellent Cuphead se précise dans un trailer délicieusement o', 'The Game Awards 2021 : le DLC de l’excellent Cuphead se précise dans un trailer délicieusement old-school', 'https://www.jeuxvideo.com/news/1505006/the-game-awards-2021-le-dlc-de-l-excellent-cuphead-se-precise-dans-un-trailer-delicieusement-old-school.htm', '2021-12-10 14:10:49', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Star Wars Eclipse : le jeu de Quantic Dream offre déjà un bonus aux joueurs ! Comment l\'obtenir ?', 'Star Wars Eclipse : le jeu de Quantic Dream offre déjà un bonus aux joueurs ! Comment l\'obtenir ?', 'https://www.jeuxvideo.com/news/1505008/star-wars-eclipse-le-jeu-de-quantic-dream-offre-deja-un-bonus-aux-joueurs-comment-l-obtenir.htm', '2021-12-10 15:23:19', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Notre avis sur GeForce Now : la façon la plus économique de jouer sur une RTX 3080 en 2021', 'Notre avis sur GeForce Now : la façon la plus économique de jouer sur une RTX 3080 en 2021', 'https://www.jeuxvideo.com/news/1505011/notre-avis-sur-geforce-now-la-facon-la-plus-economique-de-jouer-sur-une-rtx-3080-en-2021.htm', '2021-12-10 17:17:35', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Forspoken : date de sortie, DLC, trailer, le jeu impose son style aux Game Awards 2021', 'Forspoken : date de sortie, DLC, trailer, le jeu impose son style aux Game Awards 2021', 'https://www.jeuxvideo.com/news/1505030/forspoken-date-de-sortie-dlc-trailer-le-jeu-impose-son-style-aux-game-awards-2021.htm', '2021-12-10 18:50:02', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Game Awards : Le Seigneur des Anneaux Gollum livre un nouveau trailer à l’esprit torturé ', 'Game Awards : Le Seigneur des Anneaux Gollum livre un nouveau trailer à l’esprit torturé ', 'https://www.jeuxvideo.com/news/1505075/game-awards-le-seigneur-des-anneaux-gollum-livre-un-nouveau-trailer-a-l-esprit-torture.htm', '2021-12-10 15:30:05', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Dying Light 2 aux Game Awards 2021 : Un destin tragique dévoilé en vidéo', 'Dying Light 2 aux Game Awards 2021 : Un destin tragique dévoilé en vidéo', 'https://www.jeuxvideo.com/news/1505095/dying-light-2-aux-game-awards-2021-un-destin-tragique-devoile-en-video.htm', '2021-12-10 16:47:59', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Très bon prix pour la carte graphique Radeon RX 6600', 'Très bon prix pour la carte graphique Radeon RX 6600', 'https://www.jeuxvideo.com/news/1505117/tres-bon-prix-pour-la-carte-graphique-radeon-rx-6600.htm', '2021-12-11 16:10:02', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Game Awards : Among Us VR, trahissez vos amis en 3 dimensions', 'Game Awards : Among Us VR, trahissez vos amis en 3 dimensions', 'https://www.jeuxvideo.com/news/1505119/game-awards-among-us-vr-trahissez-vos-amis-en-3-dimensions.htm', '2021-12-11 10:05:02', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Genshin Impact, préparez l\'arrivée d\'Itto et Gorou : les ressources nécessaires pour les faire é', 'Genshin Impact, préparez l\'arrivée d\'Itto et Gorou : les ressources nécessaires pour les faire évoluer', 'https://www.jeuxvideo.com/news/1505139/genshin-impact-preparez-l-arrivee-d-itto-et-gorou-les-ressources-necessaires-pour-les-faire-evoluer.htm', '2021-12-10 18:02:10', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Call of Duty Warzone Pacific : gros changements sur les armes, découvrez le premier patch ', 'Call of Duty Warzone Pacific : gros changements sur les armes, découvrez le premier patch ', 'https://www.jeuxvideo.com/news/1505155/call-of-duty-warzone-pacific-gros-changements-sur-les-armes-decouvrez-le-premier-patch.htm', '2021-12-10 17:03:51', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Fortnite Chapitre 3 : déjà un rééquilibrage pour les armes plus appréciées et celles les plus ', 'Fortnite Chapitre 3 : déjà un rééquilibrage pour les armes plus appréciées et celles les plus critiquées !', 'https://www.jeuxvideo.com/news/1505173/fortnite-chapitre-3-deja-un-reequilibrage-pour-les-armes-plus-appreciees-et-celles-les-plus-critiquees.htm', '2021-12-10 17:23:19', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Lost Ark : le MMO free-to-play qui veut détrôner Final Fantasy XIV révèle sa date de sortie lors', 'Lost Ark : le MMO free-to-play qui veut détrôner Final Fantasy XIV révèle sa date de sortie lors des Game Awards', 'https://www.jeuxvideo.com/news/1505275/lost-ark-le-mmo-free-to-play-qui-veut-detroner-final-fantasy-xiv-revele-sa-date-de-sortie-lors-des-game-awards.htm', '2021-12-10 20:30:02', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Game Awards 2021 : Tout ce qu’il faut savoir sur Sonic (film et jeu)', 'Game Awards 2021 : Tout ce qu’il faut savoir sur Sonic (film et jeu)', 'https://www.jeuxvideo.com/news/1505295/game-awards-2021-tout-ce-qu-il-faut-savoir-sur-sonic-film-et-jeu.htm', '2021-12-10 20:50:02', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Game Awards 2021 : Le reboot Saints Row 2022 refait parler de lui', 'Game Awards 2021 : Le reboot Saints Row 2022 refait parler de lui', 'https://www.jeuxvideo.com/news/1505307/game-awards-2021-le-reboot-saints-row-2022-refait-parler-de-lui.htm', '2021-12-11 09:41:49', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Game Awards 2021 : Genshin Impact donne un aperçu de la belle Yun Jin', 'Game Awards 2021 : Genshin Impact donne un aperçu de la belle Yun Jin', 'https://www.jeuxvideo.com/news/1505312/game-awards-2021-genshin-impact-donne-un-apercu-de-la-belle-yun-jin.htm', '2021-12-11 10:31:55', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Game Awards 2021 : SteelRising, la rencontre entre NieR Automata et l\'Histoire de France ?', 'Game Awards 2021 : SteelRising, la rencontre entre NieR Automata et l\'Histoire de France ?', 'https://www.jeuxvideo.com/news/1505317/game-awards-2021-steelrising-la-rencontre-entre-nier-automata-et-l-histoire-de-france.htm', '2021-12-11 11:32:35', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Genshin Impact, 1600 primo-gemmes gratuites à récupérer : attention, durée limitée !', 'Genshin Impact, 1600 primo-gemmes gratuites à récupérer : attention, durée limitée !', 'https://www.jeuxvideo.com/news/1505325/genshin-impact-1600-primo-gemmes-gratuites-a-recuperer-attention-duree-limitee.htm', '2021-12-11 13:19:43', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Game Awards 2021 : Destiny 2 La Reine Sorcière nous éblouit', 'Game Awards 2021 : Destiny 2 La Reine Sorcière nous éblouit', 'https://www.jeuxvideo.com/news/1505339/game-awards-2021-destiny-2-la-reine-sorciere-nous-eblouit.htm', '2021-12-11 16:38:31', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Noara The Conspiracy : TFT et League of Legends n’ont qu’à bien se tenir', 'Noara The Conspiracy : TFT et League of Legends n’ont qu’à bien se tenir', 'https://www.jeuxvideo.com/preview/1504589/noara-the-conspiracy-tft-et-league-of-legends-n-ont-qu-a-bien-se-tenir.htm', '2021-12-11 11:05:01', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('White Shadows : Le platformer dystopique à la croisée d\'Inside et Limbo ', 'White Shadows : Le platformer dystopique à la croisée d\'Inside et Limbo ', 'https://www.jeuxvideo.com/test/1503858/white-shadows-le-platformer-dystopique-a-la-croisee-d-inside-et-limbo.htm', '2021-12-10 12:00:02', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Call of Duty Warzone : petit tour de la nouvelle map Caldera en vidéo', 'Call of Duty Warzone : petit tour de la nouvelle map Caldera en vidéo', 'https://www.jeuxvideo.com/videos/1504391/call-of-duty-warzone-petit-tour-de-la-nouvelle-map-caldera-en-video.htm', '2021-12-10 11:59:49', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Game Awards 2021 : Wonder Woman aura le droit à son adaptation, par un grand studio !', 'Game Awards 2021 : Wonder Woman aura le droit à son adaptation, par un grand studio !', 'https://www.jeuxvideo.com/videos/1504658/game-awards-2021-wonder-woman-aura-le-droit-a-son-adaptation-par-un-grand-studio.htm', '2021-12-10 13:00:02', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('DokeV : le MMO \"Pokemon Like\" a droit à un trailer original aux Game Awards 2021 ', 'DokeV : le MMO \"Pokemon Like\" a droit à un trailer original aux Game Awards 2021 ', 'https://www.jeuxvideo.com/videos/1504802/dokev-le-mmo-pokemon-like-a-droit-a-un-trailer-original-aux-game-awards-2021.htm', '2021-12-10 13:25:02', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Evil West : Cowboy Vs Démons en action par les créateurs de Shadow Warrior', 'Evil West : Cowboy Vs Démons en action par les créateurs de Shadow Warrior', 'https://www.jeuxvideo.com/videos/1504867/evil-west-cowboy-vs-demons-en-action-par-les-createurs-de-shadow-warrior.htm', '2021-12-10 15:50:02', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Tiny Tina\'s Wonderlands : nouvelle incursion dans le monde déjanté de Tina', 'Tiny Tina\'s Wonderlands : nouvelle incursion dans le monde déjanté de Tina', 'https://www.jeuxvideo.com/videos/1504924/tiny-tina-s-wonderlands-nouvelle-incursion-dans-le-monde-dejante-de-tina.htm', '2021-12-10 11:57:06', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Final Fantasy VII Remake Intergrade : le titre arrive bientôt sur PC', 'Final Fantasy VII Remake Intergrade : le titre arrive bientôt sur PC', 'https://www.jeuxvideo.com/videos/1504987/final-fantasy-vii-remake-intergrade-le-titre-arrive-bientot-sur-pc.htm', '2021-12-10 14:05:01', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Babylon\'s Fall se démarque avec son trailer aux Game Awards 2021 ', 'Babylon\'s Fall se démarque avec son trailer aux Game Awards 2021 ', 'https://www.jeuxvideo.com/videos/1504996/babylon-s-fall-se-demarque-avec-son-trailer-aux-game-awards-2021.htm', '2021-12-10 19:35:02', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('A Plague Tale Requiem : De nouvelles images puissantes pour la suite d\'Innocence', 'A Plague Tale Requiem : De nouvelles images puissantes pour la suite d\'Innocence', 'https://www.jeuxvideo.com/videos/1504998/a-plague-tale-requiem-de-nouvelles-images-puissantes-pour-la-suite-d-innocence.htm', '2021-12-10 16:25:02', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Cuphead The Last Delicious Course : Enfin une date pour le DLC tant attendu du célèbre shoot\'em up', 'Cuphead The Last Delicious Course : Enfin une date pour le DLC tant attendu du célèbre shoot\'em up', 'https://www.jeuxvideo.com/videos/1505014/cuphead-the-last-delicious-course-enfin-une-date-pour-le-dlc-tant-attendu-du-celebre-shoot-em-up.htm', '2021-12-10 14:10:29', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Le Seigneur des Anneaux : Gollum, histoire et infiltration', 'Le Seigneur des Anneaux : Gollum, histoire et infiltration', 'https://www.jeuxvideo.com/videos/1505015/le-seigneur-des-anneaux-gollum-histoire-et-infiltration.htm', '2021-12-10 15:29:04', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Monster Hunter Rise : nouveau monstre, terrain de chasse inédit, l\'extension Sunbreak se dévoile u', 'Monster Hunter Rise : nouveau monstre, terrain de chasse inédit, l\'extension Sunbreak se dévoile un peu plus', 'https://www.jeuxvideo.com/videos/1505031/monster-hunter-rise-nouveau-monstre-terrain-de-chasse-inedit-l-extension-sunbreak-se-devoile-un-peu-plus.htm', '2021-12-10 19:55:02', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Have a Nice Death : la mort va si bien à ce nouveau roguelite 2D', 'Have a Nice Death : la mort va si bien à ce nouveau roguelite 2D', 'https://www.jeuxvideo.com/videos/1505057/have-a-nice-death-la-mort-va-si-bien-a-ce-nouveau-roguelite-2d.htm', '2021-12-10 17:10:02', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Dune Spice Wars : route vers l\'épice pour le jeu de gestion dans l\'univers culte de Dune', 'Dune Spice Wars : route vers l\'épice pour le jeu de gestion dans l\'univers culte de Dune', 'https://www.jeuxvideo.com/videos/1505097/dune-spice-wars-route-vers-l-epice-pour-le-jeu-de-gestion-dans-l-univers-culte-de-dune.htm', '2021-12-10 16:52:06', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Planet of Lana : poésie, aventure et puzzle', 'Planet of Lana : poésie, aventure et puzzle', 'https://www.jeuxvideo.com/videos/1505210/planet-of-lana-poesie-aventure-et-puzzle.htm', '2021-12-10 20:15:02', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Marvel, Naruto, Batman... Pourquoi Fortnite devient le Avengers de la pop culture ?', 'Marvel, Naruto, Batman... Pourquoi Fortnite devient le Avengers de la pop culture ?', 'https://www.jeuxvideo.com/videos/chroniques/1502369/marvel-naruto-batman-pourquoi-fortnite-devient-le-avengers-de-la-pop-culture.htm', '2021-12-11 09:30:02', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Star Wars Eclipse : du jamais vu pour la franchise !', 'Star Wars Eclipse : du jamais vu pour la franchise !', 'https://www.jeuxvideo.com/videos/chroniques/1504879/star-wars-eclipse-du-jamais-vu-pour-la-franchise.htm', '2021-12-10 17:45:02', 'https://www.jeuxvideo.com/rss/rss-pc.xml'),
('Le Monde', '« En Afrique, la Chine contre-attaque sur l’héritage du colonialisme »', 'https://www.lemonde.fr/afrique/article/2021/11/28/en-afrique-la-chine-contre-attaque-sur-l-heritage-du-colonialisme_6103913_3212.html', '2021-11-28 00:00:00', 'https://www.lemonde.fr/planete/rss_full.xml'),
('Au Soudan du Sud, la difficile lutte contre le mystérieux « syndrome du hochement de tête »', 'Au Soudan du Sud, la difficile lutte contre le mystérieux « syndrome du hochement de tête »', 'https://www.lemonde.fr/afrique/article/2021/12/10/au-soudan-du-sud-la-difficile-lutte-contre-le-mysterieux-syndrome-du-hochement-de-tete_6105562_3212.html', '2021-12-10 16:19:33', 'https://www.lemonde.fr/planete/rss_full.xml'),
('Covid-19 : « Il n’y a pas de signal d’alarme à ce stade sur la sévérité des infections av', 'Covid-19 : « Il n’y a pas de signal d’alarme à ce stade sur la sévérité des infections avec Omicron »', 'https://www.lemonde.fr/afrique/article/2021/12/10/covid-19-il-n-y-a-pas-de-signal-d-alarme-a-ce-stade-sur-la-severite-des-infections-avec-omicron_6105473_3212.html', '2021-12-10 10:38:12', 'https://www.lemonde.fr/planete/rss_full.xml'),
('Le Monde', 'Présidentielle 2022 : Xavier Bertrand joue son avenir politique à quitte ou double', 'https://www.lemonde.fr/election-presidentielle-2022/article/2021/11/28/presidentielle-2022-xavier-bertrand-joue-son-avenir-politique-a-quitte-ou-double_6103901_6059010.html', '2021-11-28 00:00:00', 'https://www.lemonde.fr/planete/rss_full.xml'),
('Election présidentielle 2022 : les meetings politiques menacés par la cinquième vague de Covid-1', 'Election présidentielle 2022 : les meetings politiques menacés par la cinquième vague de Covid-19', 'https://www.lemonde.fr/election-presidentielle-2022/article/2021/12/10/election-presidentielle-2022-les-meetings-politiques-menaces-par-la-cinquieme-vague-de-covid-19_6105507_6059010.html', '2021-12-10 12:33:19', 'https://www.lemonde.fr/planete/rss_full.xml'),
('Bruno Latour : « L’écologie, c’est la nouvelle lutte des classes »', 'Bruno Latour : « L’écologie, c’est la nouvelle lutte des classes »', 'https://www.lemonde.fr/idees/article/2021/12/10/bruno-latour-l-ecologie-c-est-la-nouvelle-lutte-des-classes_6105547_3232.html', '2021-12-10 15:20:55', 'https://www.lemonde.fr/planete/rss_full.xml'),
('« Aucun gouvernement n’a suivi ou devancé avec une telle constance les desiderata du productivi', '« Aucun gouvernement n’a suivi ou devancé avec une telle constance les desiderata du productivisme agricole »', 'https://www.lemonde.fr/idees/article/2021/12/11/aucun-gouvernement-n-a-suivi-ou-devance-avec-une-telle-constance-les-desiderata-du-productivisme-agricole_6105704_3232.html', '2021-12-11 17:00:15', 'https://www.lemonde.fr/planete/rss_full.xml'),
('« L’intégration du défi climatique dans les stratégies financières est l’un des leviers su', '« L’intégration du défi climatique dans les stratégies financières est l’un des leviers sur lequel les fondations peuvent agir »', 'https://www.lemonde.fr/idees/article/2021/12/11/l-integration-du-defi-climatique-dans-les-strategies-financieres-est-l-un-des-leviers-sur-lequel-les-fondations-peuvent-agir_6105663_3232.html', '2021-12-11 10:00:16', 'https://www.lemonde.fr/planete/rss_full.xml'),
('Emmanuel Macron appelle à « concilier » développement économique et ambition climatique', 'Emmanuel Macron appelle à « concilier » développement économique et ambition climatique', 'https://www.lemonde.fr/international/article/2021/12/10/emmanuel-macron-appelle-a-concilier-developpement-economique-et-ambition-climatique_6105465_3210.html', '2021-12-10 10:04:56', 'https://www.lemonde.fr/planete/rss_full.xml'),
('Aux Etats-Unis, une tornade fait au moins cinquante morts dans le Kentucky, selon le gouverneur de l', 'Aux Etats-Unis, une tornade fait au moins cinquante morts dans le Kentucky, selon le gouverneur de l’Etat', 'https://www.lemonde.fr/international/article/2021/12/11/aux-etats-unis-une-tornade-fait-au-moins-cinquante-morts-dans-le-kentucky-selon-le-gouverneur-de-l-etat_6105687_3210.html', '2021-12-11 12:22:31', 'https://www.lemonde.fr/planete/rss_full.xml'),
('En Inde, les agriculteurs quittent New Delhi au terme d’un an de manifestations contre la réforme', 'En Inde, les agriculteurs quittent New Delhi au terme d’un an de manifestations contre la réforme agraire de Narendra Modi', 'https://www.lemonde.fr/international/article/2021/12/11/en-inde-les-agriculteurs-quittent-new-delhi-au-terme-d-un-an-de-manifestations-contre-la-reforme-agraire-de-narendra-modi_6105682_3210.html', '2021-12-11 11:34:04', 'https://www.lemonde.fr/planete/rss_full.xml'),
('Covid-19 : la cinquième vague est-elle vraiment différente des précédentes ?', 'Covid-19 : la cinquième vague est-elle vraiment différente des précédentes ?', 'https://www.lemonde.fr/les-decodeurs/article/2021/12/10/covid-19-la-cinquieme-vague-est-elle-vraiment-differente-des-precedentes_6105474_4355770.html', '2021-12-10 10:40:43', 'https://www.lemonde.fr/planete/rss_full.xml'),
('En Indre-et-Loire, un loup et beaucoup de flou', 'En Indre-et-Loire, un loup et beaucoup de flou', 'https://www.lemonde.fr/m-le-mag/article/2021/12/11/en-indre-et-loire-un-loup-et-beaucoup-de-flou_6105629_4500055.html', '2021-12-11 06:00:10', 'https://www.lemonde.fr/planete/rss_full.xml'),
('Vous n’êtes pas vacciné·e, comment organisez-vous votre vie sans passe sanitaire ?', 'Vous n’êtes pas vacciné·e, comment organisez-vous votre vie sans passe sanitaire ?', 'https://www.lemonde.fr/planete/appel-temoignages/2021/12/10/vous-n-etes-pas-vaccine-e-comment-organisez-vous-votre-vie-sans-passe-sanitaire_6105522_3244.html', '2021-12-10 13:50:16', 'https://www.lemonde.fr/planete/rss_full.xml'),
('Covid-19 dans le monde : l’obligation vaccinale fait son chemin en Allemagne et en République tc', 'Covid-19 dans le monde : l’obligation vaccinale fait son chemin en Allemagne et en République tchèque', 'https://www.lemonde.fr/planete/article/2021/12/10/covid-19-dans-le-monde-l-obligation-vaccinale-fait-son-chemin-en-allemagne-et-en-republique-tcheque_6105528_3244.html', '2021-12-10 14:20:49', 'https://www.lemonde.fr/planete/rss_full.xml'),
('Covid-19 : le plan blanc activé dans l’ensemble des Hauts-de-France, en Normandie et dans une p', 'Covid-19 : le plan blanc activé dans l’ensemble des Hauts-de-France, en Normandie et dans une partie de la Bretagne', 'https://www.lemonde.fr/planete/article/2021/12/10/covid-19-le-plan-blanc-active-dans-l-ensemble-des-hauts-de-france-en-normandie-et-dans-une-partie-de-la-bretagne_6105607_3244.html', '2021-12-10 21:36:42', 'https://www.lemonde.fr/planete/rss_full.xml'),
('Gaspillage : à partir du 1er janvier, les invendus non alimentaires ne pourront plus être détru', 'Gaspillage : à partir du 1er janvier, les invendus non alimentaires ne pourront plus être détruits', 'https://www.lemonde.fr/planete/article/2021/12/10/gaspillage-a-partir-du-1er-janvier-les-invendus-non-alimentaires-ne-pourront-plus-etre-detruits_6105601_3244.html', '2021-12-10 20:10:09', 'https://www.lemonde.fr/planete/rss_full.xml'),
('Inondations : les Landes et les Pyrénées-Atlantiques restent en vigilance rouge après des pluies', 'Inondations : les Landes et les Pyrénées-Atlantiques restent en vigilance rouge après des pluies exceptionnelles', 'https://www.lemonde.fr/planete/article/2021/12/10/pyrenees-atlantiques-debordements-et-glissements-de-terrain-apres-des-pluies-intenses_6105487_3244.html', '2021-12-10 11:27:07', 'https://www.lemonde.fr/planete/rss_full.xml'),
('Inondations : les Landes et les Pyrénées-Atlantiques redescendent en vigilance orange', 'Inondations : les Landes et les Pyrénées-Atlantiques redescendent en vigilance orange', 'https://www.lemonde.fr/planete/article/2021/12/11/inondations-les-landes-et-les-pyrenees-atlantiques-redescendent-en-vigilance-orange_6105641_3244.html', '2021-12-11 07:00:38', 'https://www.lemonde.fr/planete/rss_full.xml'),
('Camille Etienne : « Quand le réel devient intolérable, il faut prendre en main l’histoire pou', 'Camille Etienne : « Quand le réel devient intolérable, il faut prendre en main l’histoire pour la dévier »', 'https://www.lemonde.fr/planete/video/2021/12/10/camille-etienne-quand-le-reel-devient-intolerable-il-faut-prendre-en-main-l-histoire-pour-la-devier_6105469_3244.html', '2021-12-10 10:13:54', 'https://www.lemonde.fr/planete/rss_full.xml'),
('Election présidentielle 2022 : à droite, un début de campagne bousculé par le Covid-19', 'Election présidentielle 2022 : à droite, un début de campagne bousculé par le Covid-19', 'https://www.lemonde.fr/politique/article/2021/12/10/election-presidentielle-2022-a-droite-un-debut-de-campagne-bouscule-par-le-covid-19_6105523_823448.html', '2021-12-10 13:54:11', 'https://www.lemonde.fr/planete/rss_full.xml'),
('Un étonnant bateau-laboratoire en Polynésie', 'Un étonnant bateau-laboratoire en Polynésie', 'https://www.lemonde.fr/sciences/video/2021/12/10/un-etonnant-bateau-laboratoire-en-polynesie_6105503_1650684.html', '2021-12-10 12:11:25', 'https://www.lemonde.fr/planete/rss_full.xml'),
('Covid-19 : « C’est injuste que les boîtes ferment »', 'Covid-19 : « C’est injuste que les boîtes ferment »', 'https://www.lemonde.fr/societe/article/2021/12/10/covid-19-c-est-injuste-que-les-boites-ferment_6105535_3224.html', '2021-12-10 14:45:35', 'https://www.lemonde.fr/planete/rss_full.xml');

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
('http://bfm.fr', 'BFMTV', 'https://www.bfmtv.com/', 'https://www.bfmtv.com/assets/images/BFMTV.svg'),
('http://cnews.fr', 'CNews', 'https://www.cnews.fr/', 'https://static.cnews.fr/sites/all/themes/directmatinv4/cnews-logo.png'),
('https://partner-feeds.20min.ch/rss/20minutes/monde', '20 Minutes (Monde)', 'https://www.20min.ch/fr/monde', 'https://www.20min.ch/icons/20min_fr.png'),
('https://www.gamekult.com', 'Gamekult', 'https://www.gamekult.com/', 'https://d3isma7snj3lcx.cloudfront.net/assets/front/img/base/logo/gk-ball-192x192.png'),
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
