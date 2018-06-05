-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 18 Septembre 2016 à 22:42
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cartenum`
--

-- --------------------------------------------------------

--
-- Structure de la table `carte`
--

CREATE TABLE `carte` (
  `id` int(10) NOT NULL,
  `refCarte` varchar(20) NOT NULL,
  `SoldeCarte` double NOT NULL,
  `refEtu` varchar(20) NOT NULL,
  `statut` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `carte`
--

INSERT INTO `carte` (`id`, `refCarte`, `SoldeCarte`, `refEtu`, `statut`) VALUES
(1, 'C01D140916', 275, 'E01D140916', 1),
(2, 'C02D140916', 405, 'E04D140916', 0),
(3, 'C03D140916', 500, 'E06D140916', 1),
(4, 'C04D140916', 405, 'E03D140916', 0),
(7, 'C07D140916', 405, 'E02D140916', 0),
(6, 'C06D140916', 405, 'E05D140916', 0),
(8, 'C08D180916', 2000, 'E02D140916', 0),
(9, 'C08D180920', 500, 'E01D140916', 0);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `refPerson` int(11) NOT NULL,
  `refEtud` int(11) NOT NULL,
  `montant` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id`, `refPerson`, `refEtud`, `montant`) VALUES
(1, 5, 1, 10),
(2, 5, 1, 10),
(3, 5, 1, 10),
(4, 5, 1, 10),
(5, 5, 1, 10),
(6, 5, 1, 20),
(7, 5, 1, 20),
(8, 5, 1, 1),
(9, 5, 1, 22),
(10, 5, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(10) NOT NULL,
  `refEtud` varchar(20) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(20) NOT NULL,
  `Etablissement` varchar(20) NOT NULL,
  `Filiere` varchar(20) NOT NULL,
  `datenaiss` date NOT NULL,
  `gsm` varchar(20) NOT NULL,
  `annee` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `refEtud`, `Nom`, `Prenom`, `Etablissement`, `Filiere`, `datenaiss`, `gsm`, `annee`) VALUES
(1, 'E01D140916', 'Belarabi', 'Imad', 'FSI', 'GI', '1993-06-03', '0622048873', 2),
(2, 'E02D140916', 'Sabic', 'Hamza', 'ESMAB', 'AI', '1998-12-20', '0675887496', 1),
(3, 'E03D140916', 'Sbai', 'Yassir', 'FSI', 'GI', '1985-07-19', '0673397993', 4),
(4, 'E04D140916', 'El Brahmi', 'Khaoula', 'ECM', 'Management', '1995-05-05', '0623587796', 2),
(5, 'E05D140916', 'Benabdeljalil', 'Yassine', 'FSI', 'GEAA', '1997-03-02', '0675895412', 4),
(6, 'E06D140916', 'Aakroude', 'Sanae', 'CPE', 'ECT', '1995-05-06', '0675849623', 1);

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

CREATE TABLE `historique` (
  `id` int(11) NOT NULL,
  `refPersonnel` int(11) NOT NULL,
  `date` date NOT NULL,
  `operation` varchar(20) NOT NULL,
  `detail` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `historique`
--

INSERT INTO `historique` (`id`, `refPersonnel`, `date`, `operation`, `detail`) VALUES
(1, 5, '2016-09-18', 'Commande', 'le prix de cette commande est: 10DH'),
(2, 5, '2016-09-18', 'Commande', 'le prix de cette commande est: 10DH'),
(3, 5, '2016-09-18', 'Commande', 'le prix de cette commande est: 10DH'),
(4, 5, '2016-09-18', 'UPDATE', 'le solde de la carte :C01D140916 est debit&eacute; de10'),
(5, 5, '2016-09-18', 'Commande', 'le prix de cette commande est: 10DH'),
(6, 5, '2016-09-18', 'Commande', 'le prix de cette commande est: 10DH'),
(7, 5, '2016-09-18', 'Commande', 'le prix de cette commande est: 20DH'),
(8, 5, '2016-09-18', 'UPDATE', 'le solde de la carte :C01D140916 est debitee de 20'),
(9, 5, '2016-09-18', 'Commande', 'le prix de cette commande est: 20DH'),
(10, 5, '2016-09-18', 'UPDATE', 'le solde de la carte :C01D140916 est debitee de 20'),
(11, 5, '2016-09-18', 'Commande', 'le prix de cette commande est: 1DH'),
(12, 5, '2016-09-18', 'UPDATE', 'le solde de la carte :C01D140916 est debitee de 1'),
(13, 5, '2016-09-18', 'Commande', 'le prix de cette commande est: 22DH'),
(14, 5, '2016-09-18', 'UPDATE', 'le solde de la carte :C01D140916 est debitee de 22'),
(15, 5, '2016-09-18', 'Commande', 'le prix de cette commande est: 2DH'),
(16, 5, '2016-09-18', 'UPDATE', 'le solde de la carte :C01D140916 est debitee de 2'),
(17, 1, '2016-09-18', 'ADD Carte', 'Ajout de la carteC08D180916 son statut: 0'),
(18, 1, '2016-09-18', 'ADD Carte', 'Ajout de la carte: C08D180920 son statut: Desactivee'),
(19, 1, '2016-09-18', 'ADD Carte', 'Ajout de la carte: C09D180920 son statut: Desactivee'),
(20, 1, '2016-09-18', 'UPDATE Carte', 'Mis a jour de la carte: C03D140916 son statut: Activee son solde: 500'),
(21, 1, '2016-09-18', 'DELETE Carte', 'Suppression de la carte: '),
(22, 1, '2016-09-18', 'UPDATE Etudiant', 'Mis a jour de student :Belarabi Imad de reference: E01D140916'),
(23, 1, '2016-09-18', 'ADD Etudiant', 'Ajout de student :test test de reference: tet'),
(24, 1, '2016-09-18', 'UPDATE Etudiant', 'Mis a jour de student :test test de reference: tetr'),
(25, 1, '2016-09-18', 'DELETE Etudiant', 'Suppression de student :  de reference: tetr'),
(26, 1, '2016-09-18', 'Delete Membre', 'Suppression de Membre :'),
(27, 1, '2016-09-18', 'ADD Membre', 'Ajout de Membre :yassir'),
(28, 1, '2016-09-18', 'UPDATE LOGIN', 'Mis a jour de Login :EmadAdmin mdp :pwd'),
(29, 1, '2016-09-18', 'UPDATE LOGIN', 'Mis a jour de Login :EmadAdmin mdp :1234'),
(30, 1, '2016-09-18', 'UPDATE Compte', 'Nom: Belarabi Prenom:  CIN: D775999 Description: I am a Supper Admin LOL');

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `refPersonnel` int(11) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `role` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `login`
--

INSERT INTO `login` (`id`, `refPersonnel`, `userName`, `Password`, `role`) VALUES
(1, 1, 'EmadAdmin', '1234', 3),
(7, 7, 'yassir', '1234', 3),
(5, 5, 'Anas', '123', 2),
(6, 6, 'Salim', '123', 2);

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

CREATE TABLE `personnel` (
  `id` int(10) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(20) NOT NULL,
  `CIN` varchar(10) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `personnel`
--

INSERT INTO `personnel` (`id`, `Nom`, `Prenom`, `CIN`, `description`) VALUES
(1, 'Belarabi', 'Emad', 'D775999', 'I am a Supper Admin LOL'),
(7, 'test', 'tet', 'tet', 'tesst'),
(5, 'El Baron', 'Anas', 'D778556', 'responsable de club integration'),
(6, 'test', 'tet', 'tet', 'tesst');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `carte`
--
ALTER TABLE `carte`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `refCarte` (`refCarte`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `refEtud` (`refEtud`);

--
-- Index pour la table `historique`
--
ALTER TABLE `historique`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `carte`
--
ALTER TABLE `carte`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `historique`
--
ALTER TABLE `historique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
