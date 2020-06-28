-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 08 fév. 2019 à 19:59
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestionconference`
--

-- --------------------------------------------------------

--
-- Structure de la table `conference`
--

CREATE TABLE `conference` (
  `conferenceid` int(2) NOT NULL,
  `titre` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `dateConference` date NOT NULL,
  `dateSoumission` date NOT NULL,
  `dateEvaluation` date NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `conference`
--

INSERT INTO `conference` (`conferenceid`, `titre`, `description`, `dateConference`, `dateSoumission`, `dateEvaluation`, `image`) VALUES
(1, 'Modelisation, analyse mathematique et calcul scientifique', 'L\'objectif de cette école est une initiation à la modélisation mathématique et numérique de la gestion des déchets urbains, allant de leur transport à l\'impact sur la nappe. La biodégradation et les phénomènes d\'écoulement et de transport (Lixiviat et biogaz) sont les \"moteurs\" essentiels dans la gestion des centres de stockage. Le recyclage de la phase liquide des déchets ménagers est un autre aspect de cette gestion. La modélisation mathématique (déterministe ou/et stochastique) est un outil incontournable pour bien comprendre les phénomènes sous-jacents et les paramètres déterminants dans ces processus. Elle aboutit à des systèmes d’Équations aux Dérivées Partielles (EDP) couplées avec des Équations Différentielles Ordinaires (EDO).', '2019-02-27', '2019-02-19', '2019-02-10', 'conferencee'),
(2, 'ICAMOP2019', 'The Ibn Tofaïl University - Kénitra and the Moroccan Society for university-business bridges\r\nThe ICAMOP\'2019 congress is a place of exchange between researchers, professors and industrialists active in the field of applied modeling, optimization and planning. The aim is to promote theoretical and / or methodological results but also to allow presentations describing practical cases. The objectives of ICAMOP\'2019 are multiple: Take stock of recent advances in modeling, simulation and planning of projects, technologies and techniques. Bring together researchers and experts to share and pool their experiences and thoughts on the development of themes set by the organizing committee. Present recent research related to these themes. Develop models and decision support methods for a broad class of operations management issues. Discuss some current topics: Innovation in modeling, simulation and optimization of systems, process design, etc. This scientific event will bring together speakers and speakers from different countries: scientists, economic actors and institutional actors will present and exchange their work around different themes to address innovation and optimization.', '2019-01-31', '2019-01-31', '2019-01-31', 'conferencefsk'),
(3, 'The IEEE 5th International Conference ', 'The IEEE fifth International Conference on Optimization and Applications (ICOA2019) provides a high-level international forum and an excellent venue for scientists, researchers, academic faculty, students, industry leaders, and others in the fields of optimization to present, discuss and publish their recent research results and approaches. The conference is an opportunity to develop new ideas and collaborations, and to be aware of the latest search trends in the optimization techniques and their applications in the various fields. This 5th edition is enriched by very important special sessions that deal with problems using the latest methods of optimization.', '2019-01-31', '2019-01-31', '2019-01-31', 'conferenceensa');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `contactid` int(2) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`contactid`, `nom`, `email`, `message`) VALUES
(1, 'youness', 'gfdgfdgf@fgdgf.hdgf', 'gfhghfdgf\r\njgfhggh\r\nngchfghgdgh');

-- --------------------------------------------------------

--
-- Structure de la table `demendechangement`
--

CREATE TABLE `demendechangement` (
  `papierid` int(11) NOT NULL,
  `etatadmin` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `demendechangement`
--

INSERT INTO `demendechangement` (`papierid`, `etatadmin`) VALUES
(4, 'accepter');

-- --------------------------------------------------------

--
-- Structure de la table `evaluationcomite`
--

CREATE TABLE `evaluationcomite` (
  `evaluationcomiteid` int(2) NOT NULL,
  `papierid` int(2) NOT NULL,
  `membreid` int(2) NOT NULL,
  `notecomite` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `evaluationcomite`
--

INSERT INTO `evaluationcomite` (`evaluationcomiteid`, `papierid`, `membreid`, `notecomite`) VALUES
(1, 4, 4, NULL),
(3, 13, 4, 15);

-- --------------------------------------------------------

--
-- Structure de la table `inscriptionconference`
--

CREATE TABLE `inscriptionconference` (
  `conferenceid` int(11) NOT NULL,
  `auteurid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `inscriptionconference`
--

INSERT INTO `inscriptionconference` (`conferenceid`, `auteurid`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `membreid` int(2) NOT NULL,
  `nomcomplete` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `type` varchar(20) NOT NULL,
  `login` varchar(200) NOT NULL,
  `motpass` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`membreid`, `nomcomplete`, `email`, `type`, `login`, `motpass`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin'),
(2, 'auteur', 'auteur', 'auteur', 'auteur', 'auteur'),
(3, 'presedent', 'presedent', 'presedent', 'presedent', 'presedent'),
(4, 'comite', 'comite', 'comite', 'comite', 'comite');

-- --------------------------------------------------------

--
-- Structure de la table `papier`
--

CREATE TABLE `papier` (
  `papierid` int(2) NOT NULL,
  `titre` varchar(200) NOT NULL,
  `sessionid` int(2) NOT NULL,
  `auteurid` int(2) NOT NULL,
  `etatadmin` varchar(100) DEFAULT NULL,
  `etatpresedent` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `papier`
--

INSERT INTO `papier` (`papierid`, `titre`, `sessionid`, `auteurid`, `etatadmin`, `etatpresedent`) VALUES
(4, 'Acueil', 1, 2, 'accepter', NULL),
(5, '9782212673609', 1, 2, 'accepter', NULL),
(6, '0540-tutoriel-sur-laravel', 1, 2, NULL, NULL),
(7, '0540-tutoriel-sur-laravel', 3, 2, 'accepter', NULL),
(8, '0540-tutoriel-sur-laravel', 1, 2, 'accepter', NULL),
(9, 'link_words', 4, 2, NULL, NULL),
(10, 'link_words', 4, 2, NULL, NULL),
(11, 'link_words', 4, 2, NULL, NULL),
(12, 'link_words', 4, 2, NULL, NULL),
(13, 'linking-words', 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE `session` (
  `sessionid` int(2) NOT NULL,
  `titre` varchar(200) NOT NULL,
  `conferenceid` int(2) NOT NULL,
  `presedentid` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `session`
--

INSERT INTO `session` (`sessionid`, `titre`, `conferenceid`, `presedentid`) VALUES
(1, 'session1', 1, 3),
(2, 'session2', 1, 3),
(3, 'session3', 2, 3),
(4, 'session4', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sessioncomite`
--

CREATE TABLE `sessioncomite` (
  `sessioncomiteid` int(2) NOT NULL,
  `sessionid` int(2) NOT NULL,
  `membreid` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sessioncomite`
--

INSERT INTO `sessioncomite` (`sessioncomiteid`, `sessionid`, `membreid`) VALUES
(1, 1, 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `conference`
--
ALTER TABLE `conference`
  ADD PRIMARY KEY (`conferenceid`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactid`);

--
-- Index pour la table `evaluationcomite`
--
ALTER TABLE `evaluationcomite`
  ADD PRIMARY KEY (`evaluationcomiteid`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`membreid`);

--
-- Index pour la table `papier`
--
ALTER TABLE `papier`
  ADD PRIMARY KEY (`papierid`);

--
-- Index pour la table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`sessionid`);

--
-- Index pour la table `sessioncomite`
--
ALTER TABLE `sessioncomite`
  ADD PRIMARY KEY (`sessioncomiteid`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `conference`
--
ALTER TABLE `conference`
  MODIFY `conferenceid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `contactid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `evaluationcomite`
--
ALTER TABLE `evaluationcomite`
  MODIFY `evaluationcomiteid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `membreid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `papier`
--
ALTER TABLE `papier`
  MODIFY `papierid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `session`
--
ALTER TABLE `session`
  MODIFY `sessionid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `sessioncomite`
--
ALTER TABLE `sessioncomite`
  MODIFY `sessioncomiteid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
