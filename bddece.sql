-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mer. 02 mai 2018 à 10:29
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `bddece`
--

-- --------------------------------------------------------

--
-- Structure de la table `aimer`
--

CREATE TABLE `aimer` (
  `aimeur` int(11) NOT NULL,
  `aimé` int(11) NOT NULL,
  `dateai` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ajouter_poste`
--

CREATE TABLE `ajouter_poste` (
  `ajouteur` int(11) NOT NULL,
  `dateaj` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `amis1`
--

CREATE TABLE `amis1` (
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `amis1`
--

INSERT INTO `amis1` (`id`) VALUES
(2),
(3);

-- --------------------------------------------------------

--
-- Structure de la table `amis2`
--

CREATE TABLE `amis2` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `amis2`
--

INSERT INTO `amis2` (`id`) VALUES
(3),
(4),
(1);

-- --------------------------------------------------------

--
-- Structure de la table `amis3`
--

CREATE TABLE `amis3` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `amis3`
--

INSERT INTO `amis3` (`id`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Structure de la table `amis4`
--

CREATE TABLE `amis4` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `amis4`
--

INSERT INTO `amis4` (`id`) VALUES
(2);

-- --------------------------------------------------------

--
-- Structure de la table `commenter`
--

CREATE TABLE `commenter` (
  `commentateur` int(11) NOT NULL,
  `commenté` int(11) NOT NULL,
  `dateco` datetime NOT NULL,
  `commentaire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `emploi`
--

CREATE TABLE `emploi` (
  `idem` int(11) NOT NULL,
  `employeur` text NOT NULL,
  `dateem` datetime NOT NULL,
  `poste` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `envoyer_message`
--

CREATE TABLE `envoyer_message` (
  `envoyeur` int(11) NOT NULL,
  `envoyé` int(11) NOT NULL,
  `dateen` datetime NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etre_ami`
--

CREATE TABLE `etre_ami` (
  `demandeur` int(11) NOT NULL,
  `demandé` int(11) NOT NULL,
  `dateam` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `partager`
--

CREATE TABLE `partager` (
  `partageur` int(11) NOT NULL,
  `partagé` int(11) NOT NULL,
  `datepa` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

CREATE TABLE `publication` (
  `idpu` int(11) NOT NULL,
  `doc` text NOT NULL,
  `lieu` text NOT NULL,
  `date` datetime NOT NULL,
  `ressenti` text NOT NULL,
  `activité` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `publier`
--

CREATE TABLE `publier` (
  `publieur` int(11) NOT NULL,
  `datepu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `mail` text NOT NULL,
  `mdp` text NOT NULL,
  `statut` text NOT NULL,
  `pp` text NOT NULL,
  `couverture` text NOT NULL,
  `cv` text NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--
