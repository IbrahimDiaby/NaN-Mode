-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 11 avr. 2018 à 22:44
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

--
-- Déchargement des données de la table `Articles`
--

INSERT INTO `Articles` (`ID`, `Image`, `Article`, `Categories`, `Prix`, `Proprietaires`, `Numero`, `Ville`, `Commune`, `NbreArticleProprio`) VALUES
(1, 'Master ID.png', 'Vetements', 'Vetements', 1500, 'MasterID', 89549209, 'Abidjan', 'Adjamé', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Articles`
--
ALTER TABLE `Articles`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Articles`
--
ALTER TABLE `Articles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
