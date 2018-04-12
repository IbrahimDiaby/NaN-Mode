-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  jeu. 12 avr. 2018 à 03:38
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `Mode`
--

-- --------------------------------------------------------

--
-- Structure de la table `Articles`
--

CREATE TABLE `Articles` (
  `ID` int(11) NOT NULL,
  `Image` varchar(1000) NOT NULL,
  `Article` varchar(100) NOT NULL,
  `Categories` varchar(100) NOT NULL,
  `Prix` int(11) NOT NULL,
  `Proprietaires` varchar(100) NOT NULL,
  `Numero` int(11) NOT NULL,
  `Ville` varchar(100) NOT NULL,
  `Commune` varchar(100) NOT NULL,
  `NbreArticleProprio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Categories`
--

CREATE TABLE `Categories` (
  `ID` int(11) NOT NULL,
  `Categorie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Categories`
--

INSERT INTO `Categories` (`ID`, `Categorie`) VALUES
(1, 'Vetements'),
(2, 'Montres'),
(3, 'Chaussures'),
(4, 'Lunettes'),
(5, 'Sous_Vet'),
(6, 'Pull'),
(7, 'Chapeau'),
(8, 'Jeans'),
(9, 'Pretaporter');

-- --------------------------------------------------------

--
-- Structure de la table `Client`
--

CREATE TABLE `Client` (
  `ID` int(11) NOT NULL,
  `Avatar` varchar(1000) NOT NULL,
  `Admin` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Connected` int(11) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Prenom` varchar(100) NOT NULL,
  `Anniversaire` varchar(40) NOT NULL,
  `Mail` varchar(100) NOT NULL,
  `Sexe` varchar(100) NOT NULL,
  `Numero` int(11) NOT NULL,
  `Ville` varchar(100) NOT NULL,
  `Commune` varchar(100) NOT NULL,
  `Premium` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Client`
--

INSERT INTO `Client` (`ID`, `Avatar`, `Admin`, `Password`, `Connected`, `Nom`, `Prenom`, `Anniversaire`, `Mail`, `Sexe`, `Numero`, `Ville`, `Commune`, `Premium`) VALUES
(1, 'MasterID.png', 'MasterID', '#MASTERIDid2018', 0, 'Diaby', 'Ibrahim', '3 Juillet 1999', 'ibrahim.diaby@uvci.edu.ci', 'Homme', 89549209, 'Abidjan', 'Adjamé', 0);

-- --------------------------------------------------------

--
-- Structure de la table `Messages`
--

CREATE TABLE `Messages` (
  `ID` int(11) NOT NULL,
  `NameDestinateur` varchar(100) NOT NULL,
  `Destinateur` varchar(100) NOT NULL,
  `NameExpediteur` varchar(100) NOT NULL,
  `Expediteur` varchar(100) NOT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Pub`
--

CREATE TABLE `Pub` (
  `ID` int(11) NOT NULL,
  `Compagnie` varchar(255) NOT NULL,
  `Premium` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Vendu`
--

CREATE TABLE `Vendu` (
  `ID` int(11) NOT NULL,
  `Article` int(11) NOT NULL,
  `Catégories` int(11) NOT NULL,
  `Nombre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Articles`
--
ALTER TABLE `Articles`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Messages`
--
ALTER TABLE `Messages`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Pub`
--
ALTER TABLE `Pub`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Vendu`
--
ALTER TABLE `Vendu`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Articles`
--
ALTER TABLE `Articles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `Categories`
--
ALTER TABLE `Categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `Client`
--
ALTER TABLE `Client`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `Messages`
--
ALTER TABLE `Messages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `Pub`
--
ALTER TABLE `Pub`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Vendu`
--
ALTER TABLE `Vendu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
