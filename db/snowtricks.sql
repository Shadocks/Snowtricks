-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 28 mars 2018 à 11:18
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `snowtricks`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trick_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9474526CB281BE2E` (`trick_id`),
  KEY `IDX_9474526CA76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `trick_id`, `user_id`, `content`, `creation_date`) VALUES
(14, 85, 24, 'La classe ! J\'ai hâte du chausser ma board pour tester ce tricks.', '2018-03-23 16:02:35'),
(15, 85, 22, 'Salut Mickael, ça te tente vendredi prochain une sortir à Super Besse pour tester ce grab ?', '2018-03-23 16:41:48'),
(16, 85, 24, 'C\'est sympa mais je ne peux pas j\'ai soutenance !', '2018-03-23 16:49:30'),
(17, 80, 24, 'Bonjour les riders !\r\nQuelqu\'un connait-il un spot comme celui-ci ?', '2018-03-26 07:45:04'),
(18, 85, 24, 'Hello! Quelqu\'un a t-il une vidéo de ce tricks ?', '2018-03-27 07:28:49'),
(20, 85, 26, 'Salut Mickael, je cherche une vidéo pour ce tricks. Ça serait sympa que quelqu\'un en poste une !', '2018-03-27 12:42:33'),
(21, 85, 22, 'Bonjour Mickael et Sophie, je dois en avoir une. Je l\'ajoute au tricks au plus vite.', '2018-03-27 12:44:33'),
(22, 85, 24, 'Merci Milou, la vidéo est super ! Belle contribution pour la communauté. +1', '2018-03-27 12:48:57'),
(23, 85, 26, 'Un grand merci Milou pour la vidéo. Vive la communauté Snowtricks. +1', '2018-03-27 13:27:22'),
(24, 98, 26, 'Hello, voilà une nouvelle contribution concernant le mythique BACKFLIP... Bonne glisse!', '2018-03-28 07:11:34'),
(25, 98, 22, 'Merci à toi Sophie et à MIKA le professeur. +1', '2018-03-28 07:36:09');

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

DROP TABLE IF EXISTS `picture`;
CREATE TABLE IF NOT EXISTS `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `trick_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_16DB4F89A76ED395` (`user_id`),
  KEY `IDX_16DB4F89B281BE2E` (`trick_id`)
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `picture`
--

INSERT INTO `picture` (`id`, `user_id`, `trick_id`, `name`, `url`) VALUES
(115, 22, NULL, NULL, '/img/avatar_default.png'),
(126, 24, NULL, NULL, '/img/avatar_default.png'),
(129, NULL, 77, '9b48ad1d4db0ffa95cbf80cfc86d9eb5.jpeg', '/uploads/picture/9b48ad1d4db0ffa95cbf80cfc86d9eb5.jpeg'),
(130, NULL, 78, '9db5395805670878a401a5a6bf7dbbb9.jpeg', '/uploads/picture/9db5395805670878a401a5a6bf7dbbb9.jpeg'),
(131, NULL, 79, '05752563bf40b4a56cdcaee37bc5d205.jpeg', '/uploads/picture/05752563bf40b4a56cdcaee37bc5d205.jpeg'),
(132, NULL, 80, 'cc81d090bfd748604367037d50315121.jpeg', '/uploads/picture/cc81d090bfd748604367037d50315121.jpeg'),
(133, NULL, 81, '94e305cb482d47a203c8d807e8676e48.jpeg', '/uploads/picture/94e305cb482d47a203c8d807e8676e48.jpeg'),
(134, NULL, 82, '2502fea0150e329a0d40a6006d0b3caf.jpeg', '/uploads/picture/2502fea0150e329a0d40a6006d0b3caf.jpeg'),
(136, NULL, 84, 'ef79b7f7169b63798dc2d94f58fe8d4b.png', '/uploads/picture/ef79b7f7169b63798dc2d94f58fe8d4b.png'),
(137, NULL, 85, '909c80af1d08ad62ccd5a7a73a0dad0f.jpeg', '/uploads/picture/909c80af1d08ad62ccd5a7a73a0dad0f.jpeg'),
(138, NULL, 86, 'fe837cd8ac5603c35ab13caa3e4f4c2c.jpeg', '/uploads/picture/fe837cd8ac5603c35ab13caa3e4f4c2c.jpeg'),
(139, NULL, 87, '88b44c68dc604f30306f7c0912d2495d.jpeg', '/uploads/picture/88b44c68dc604f30306f7c0912d2495d.jpeg'),
(140, NULL, 88, 'adf640ad5522da1b9883ef89da05b37d.jpeg', '/uploads/picture/adf640ad5522da1b9883ef89da05b37d.jpeg'),
(141, NULL, 89, '3c0d08f812fb4d2b08322f81a66c3ddb.jpeg', '/uploads/picture/3c0d08f812fb4d2b08322f81a66c3ddb.jpeg'),
(142, NULL, 90, 'f5ce0a8dbbc8a6484c3c6cf83c6cef4c.jpeg', '/uploads/picture/f5ce0a8dbbc8a6484c3c6cf83c6cef4c.jpeg'),
(143, NULL, 91, '9a208e0b7132d1c0b4f6cfe3ca71a1b4.png', '/uploads/picture/9a208e0b7132d1c0b4f6cfe3ca71a1b4.png'),
(145, NULL, 93, 'ec1e616408cde306770d9ef3636a7d39.jpeg', '/uploads/picture/ec1e616408cde306770d9ef3636a7d39.jpeg'),
(147, NULL, 85, 'acb8dd58ca652599ef24e3de603adadf.jpeg', '/uploads/picture/acb8dd58ca652599ef24e3de603adadf.jpeg'),
(148, NULL, 85, '60bae9f7ba59fa7778b26fd8253749ea.jpeg', '/uploads/picture/60bae9f7ba59fa7778b26fd8253749ea.jpeg'),
(149, NULL, 85, '4cd1ed6ccede11783297785c5eb631a2.jpeg', '/uploads/picture/4cd1ed6ccede11783297785c5eb631a2.jpeg'),
(150, NULL, 85, '607f195046f1aa9c37b004fa76555281.jpeg', '/uploads/picture/607f195046f1aa9c37b004fa76555281.jpeg'),
(152, NULL, 93, '788ba33d7b6381109832ae8cd76a0266.jpeg', '/uploads/picture/788ba33d7b6381109832ae8cd76a0266.jpeg'),
(153, NULL, 93, 'fc8f75d148146a599f5d458ad3aff155.jpeg', '/uploads/picture/fc8f75d148146a599f5d458ad3aff155.jpeg'),
(157, NULL, 97, 'aaa93d3a5275b5937957fa94f6d1a624.png', '/uploads/picture/aaa93d3a5275b5937957fa94f6d1a624.png'),
(159, 26, NULL, '35804b01f90b45694a784447ee1d4013.jpeg', '/uploads/picture/35804b01f90b45694a784447ee1d4013.jpeg'),
(160, NULL, 98, '26cb407a43bca96c737be309d34d73ab.jpeg', '/uploads/picture/26cb407a43bca96c737be309d34d73ab.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `trick`
--

DROP TABLE IF EXISTS `trick`;
CREATE TABLE IF NOT EXISTS `trick` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `creation_date` datetime NOT NULL,
  `modification_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_D8F0A91E5E237E06` (`name`),
  KEY `IDX_D8F0A91EA76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `trick`
--

INSERT INTO `trick` (`id`, `user_id`, `name`, `category`, `description`, `creation_date`, `modification_date`) VALUES
(77, 24, '180°', 'Rotation', 'Saut avec une rotation d\'un demi-tour (souvent abrégé par le sens de rotation.\r\nPar exemple on dit qu\'on réalise un back(side) pour dire un 180° backside)', '2018-03-23 08:06:56', NULL),
(78, 24, '270°', 'Rotation', 'Un saut avec une rotation de trois quarts de tours, généralement effectué en entrée (in) ou en sortie (out) sur des modules de jib (souvent abrégé 2-7 ou 2).', '2018-03-23 12:20:59', NULL),
(79, 24, '360°', 'Rotation', 'Un saut avec une rotation d\'un tour complet (souvent abrégé 3-6 ou 3).', '2018-03-23 12:23:13', NULL),
(80, 24, '540°', 'Rotation', 'Un saut avec une rotation d\'un tour et demi (souvent abrégé 5-4 ou 5)', '2018-03-23 12:25:31', '2018-03-25 14:51:04'),
(81, 24, '720°', 'Rotation', 'Un saut avec une rotation de deux tours complets (souvent abrégé 7-2 ou 7)', '2018-03-23 12:30:22', NULL),
(82, 24, '1080°', 'Rotation', 'Un saut avec une rotation de trois tours complets (souvent abrégé 100-8 ou 10)', '2018-03-23 14:18:50', NULL),
(84, 24, '450°', 'Rotation', 'Un saut avec une rotation de un tour et un quart, généralement effectué en entrée (in) ou en sortie (out) sur des modules de jib (souvent abrégé 4-5 ou 4).', '2018-03-23 14:41:04', '2018-03-24 13:06:07'),
(85, 24, 'Japan Air', 'Grab', 'Saisie de l\'avant de la planche, avec la main avant, du côté de la carre frontside.', '2018-03-23 14:49:48', '2018-03-27 12:46:56'),
(86, 24, 'Truck Driver', 'Grab', 'Saisie du carre avant et carre arrière avec chaque main (comme tenir un volant de voiture)', '2018-03-23 15:31:07', NULL),
(87, 24, 'Indy', 'Grab', 'Saisie de la carre frontside de la planche, entre les deux pieds, avec la main arrière ;', '2018-03-23 15:33:54', NULL),
(88, 24, 'Tail Grab', 'Grab', 'Saisie de la partie arrière de la planche, avec la main arrière.', '2018-03-23 15:37:49', NULL),
(89, 24, 'Tindy', 'Grab', 'Saisir entre le tail grab et le indy grab : la main arrière grab la carre front entre le tail et la fixation arrière.', '2018-03-23 15:42:05', NULL),
(90, 24, 'Nose grab', 'Grab', 'Saisie de la partie avant de la planche, avec la main avant ;', '2018-03-23 15:45:13', NULL),
(91, 24, '810°', 'Rotation', 'Un saut avec une rotation de deux tours et un quart, généralement effectué en entrée (in) ou en sortie (out) sur des modules de jib (souvent abrégé 8).', '2018-03-23 15:46:52', NULL),
(93, 24, 'Seat belt', 'Grab', 'Saisie du carre frontside à l\'arrière avec la main avant.', '2018-03-23 16:00:01', '2018-03-26 13:20:21'),
(97, 22, '1440°', 'Rotation', 'Un saut avec une rotation de quatre tours complets (souvent abrégé 1004 ou 14)', '2018-03-25 13:26:44', NULL),
(98, 26, 'Backflip', 'Flip', 'Saut périlleux arrière effectué dans le sens de la board et non dans le sens du corps. (exemple : backflip en shifty, puis switch double backflip)', '2018-03-28 07:08:47', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `active` tinyint(1) NOT NULL,
  `validated` tinyint(1) NOT NULL,
  `validation_date` datetime DEFAULT NULL,
  `creation_date` datetime NOT NULL,
  `validation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D6495126AC48` (`mail`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `mail`, `password`, `roles`, `active`, `validated`, `validation_date`, `creation_date`, `validation_token`, `reset_token`) VALUES
(22, 'Milou', 'mickalkoa@gmail.com', '$2y$13$OgwXDtxLYPbSM2IMRcqSWedEabz5XzX74vVAnpWsnVdWdKCLSKFV.', 'a:1:{i:0;s:9:\"ROLE_USER\";}', 1, 1, '2018-03-17 15:59:22', '2018-03-17 15:58:41', '_token_5aad3b35a37945.55818945', '_token_5aba5a09d522f1.55990739'),
(24, 'Mickael', 'mickael.bardeau@laposte.net', '$2y$13$p0YJQKbACIZYJhVwl29HruMqWL2gaWtQdc6cG09fgGJlrxvuP2frC', 'a:1:{i:0;s:9:\"ROLE_USER\";}', 1, 1, '2018-03-21 09:53:33', '2018-03-21 09:52:43', '_token_5ab22b6d376660.95992344', '_token_5ab2db5e7e60c5.89533048'),
(26, 'Sophie', 'camille.laumont@laposte.net', '$2y$13$NauGUPH65m04dNCvjtwig.6VrD0geCqjW/iTtAUM3mdbFjPOesByy', 'a:1:{i:0;s:9:\"ROLE_USER\";}', 1, 1, '2018-03-27 12:39:20', '2018-03-27 08:17:31', '_token_5ab9fe1d72bd59.77422910', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trick_id` int(11) DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7CC7DA2CB281BE2E` (`trick_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `video`
--

INSERT INTO `video` (`id`, `trick_id`, `url`) VALUES
(1, 88, 'https://www.youtube.com/watch?v=id8VKl9RVQw'),
(3, 93, 'https://www.youtube.com/watch?v=4vGEOYNGi_c'),
(4, 80, 'https://www.youtube.com/watch?v=w66AU3GdfFo'),
(6, 80, 'https://www.youtube.com/watch?v=XnYlAulS0JQ'),
(7, 85, 'https://www.youtube.com/watch?v=vxBfXyQ_MB4'),
(8, 98, 'https://www.youtube.com/watch?v=W853WVF5AqI');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526CA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_9474526CB281BE2E` FOREIGN KEY (`trick_id`) REFERENCES `trick` (`id`);

--
-- Contraintes pour la table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `FK_16DB4F89A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_16DB4F89B281BE2E` FOREIGN KEY (`trick_id`) REFERENCES `trick` (`id`);

--
-- Contraintes pour la table `trick`
--
ALTER TABLE `trick`
  ADD CONSTRAINT `FK_D8F0A91EA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `FK_7CC7DA2CB281BE2E` FOREIGN KEY (`trick_id`) REFERENCES `trick` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
