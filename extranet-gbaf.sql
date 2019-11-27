-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 27 nov. 2019 à 16:19
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `extranet-gbaf`
--

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(155) NOT NULL,
  `prenom` varchar(155) NOT NULL,
  `username` varchar(155) NOT NULL,
  `password` varchar(255) NOT NULL,
  `question` varchar(500) NOT NULL,
  `reponse` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `account`
--

INSERT INTO `account` (`id_user`, `nom`, `prenom`, `username`, `password`, `question`, `reponse`) VALUES
(9, 'Lambert', 'Thomas', 'aidonas', '$2y$10$Bp03fOzm6JME3Jal9.qHeO7UOzA4dvT2NzvJc0ffuUBG96G8olDse', 'Ma couleur préférée ?', 'Rouge');

-- --------------------------------------------------------

--
-- Structure de la table `acteur`
--

DROP TABLE IF EXISTS `acteur`;
CREATE TABLE IF NOT EXISTS `acteur` (
  `id_acteur` int(11) NOT NULL AUTO_INCREMENT,
  `acteur` varchar(155) NOT NULL,
  `description` varchar(1255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_acteur`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `acteur`
--

INSERT INTO `acteur` (`id_acteur`, `acteur`, `description`, `logo`) VALUES
(1, 'Formation&co', 'Formation&co est une association française présente sur tout le territoire. <br>\r\nNous proposons à des personnes issues de tout milieu de devenir entrepreneur grâce à un crédit et un accompagnement professionnel et personnalisé.<br><br>\r\nNotre proposition :<br> \r\n- un financement jusqu’à 30 000€ ;<br>\r\n- un suivi personnalisé et gratuit ;<br>\r\n- une lutte acharnée contre les freins sociétaux et les stéréotypes.<br><br>\r\n\r\nLe financement est possible, peu importe le métier : coiffeur, banquier, éleveur de chèvres… .<br> \r\nNous collaborons avec des personnes talentueuses et motivées.<br>\r\nVous n’avez pas de diplômes ? Ce n’est pas un problème pour nous ! Nos financements s’adressent à tous.\r\n', 'formation_co.png'),
(2, 'Protectpeople', 'Protectpeople finance la solidarité nationale.<br>\r\nNous appliquons le principe édifié par la Sécurité sociale française en 1945 : permettre à chacun de bénéficier d’une protection sociale.<br><br>\r\n\r\nChez Protectpeople, chacun cotise selon ses moyens et reçoit selon ses besoins.<br>\r\nProectecpeople est ouvert à tous, sans considération d’âge ou d’état de santé.<br>\r\nNous garantissons un accès aux soins et une retraite.<br>\r\nChaque année, nous collectons et répartissons 300 milliards d’euros.<br><br>\r\nNotre mission est double :<br>\r\nsociale : nous garantissons la fiabilité des données sociales ;<br>\r\néconomique : nous apportons une contribution aux activités économiques.', 'protectpeople.png'),
(3, 'Dsa France', 'Dsa France accélère la croissance du territoire et s’engage avec les collectivités territoriales.<br>\r\nNous accompagnons les entreprises dans les étapes clés de leur évolution.<br><br>\r\nNotre philosophie : s’adapter à chaque entreprise.<br>\r\nNous les accompagnons pour voir plus grand et plus loin et proposons des solutions de financement adaptées à chaque étape de la vie des entreprises.', 'Dsa_france.png'),
(4, 'CDE', 'La CDE (Chambre Des Entrepreneurs) accompagne les entreprises dans leurs démarches de formation. <br>\r\nSon président est élu pour 3 ans par ses pairs, chefs d’entreprises et présidents des CDE.', 'CDE.png');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_acteur` int(11) NOT NULL,
  `date_add` date NOT NULL,
  `post` varchar(255) NOT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

DROP TABLE IF EXISTS `vote`;
CREATE TABLE IF NOT EXISTS `vote` (
  `id_user` int(11) NOT NULL,
  `id_acteur` int(11) NOT NULL,
  `vote` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
