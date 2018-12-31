-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 31 déc. 2018 à 07:12
-- Version du serveur :  10.1.26-MariaDB
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `velo`
--

-- --------------------------------------------------------

--
-- Structure de la table `championat`
--

CREATE TABLE `championat` (
  `id_championat` int(11) NOT NULL,
  `nom_championat` varchar(255) DEFAULT NULL,
  `visibilite` int(11) DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  `date_dabut` date DEFAULT NULL,
  `description` text,
  `date_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `championat`
--

INSERT INTO `championat` (`id_championat`, `nom_championat`, `visibilite`, `date_creation`, `date_dabut`, `description`, `date_fin`) VALUES
(1, '123', NULL, NULL, NULL, NULL, NULL),

-- --------------------------------------------------------

--
-- Structure de la table `coureur`
--

CREATE TABLE `coureur` (
  `id_coureur` int(11) NOT NULL,
  `nom_coureur` varchar(255) DEFAULT NULL,
  `date_inscription` date DEFAULT NULL,
  `id_equipe` int(11) DEFAULT NULL,
  `prenom_coureur` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- --------------------------------------------------------

--
-- Structure de la table `coureur_championat`
--

CREATE TABLE `coureur_championat` (
  `id_championat` int(11) NOT NULL,
  `id_coureur` int(11) NOT NULL,
  `id_equipe` int(11) DEFAULT NULL,
  `temps` varchar(255) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `detail` text,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- --------------------------------------------------------

--
-- Structure de la table `course`
--

CREATE TABLE `course` (
  `id_course` int(11) NOT NULL,
  `id_championat` int(11) DEFAULT NULL,
  `type_course` int(11) DEFAULT NULL,
  `nom_course` varchar(255) DEFAULT NULL,
  `trajet_course` varchar(255) DEFAULT NULL,
  `date_creation` datetime DEFAULT NULL,
  `detail` text,
  `description_course` varchar(255) DEFAULT NULL,
  `depart` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `id_equipe` int(11) NOT NULL,
  `nom_equipe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`id_equipe`, `nom_equipe`) VALUES
(1, 'einstein'),
(2, 'albert');

-- --------------------------------------------------------

--
-- Structure de la table `equipe_coureur`
--

CREATE TABLE `equipe_coureur` (
  `id_coureur` int(11) NOT NULL,
  `id_equipe` int(11) NOT NULL,
  `status_chef` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- --------------------------------------------------------

--
-- Structure de la table `gpm_sp`
--

CREATE TABLE `gpm_sp` (
  `id` int(11) NOT NULL,
  `id_course` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `top_3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--


-- --------------------------------------------------------

--
-- Structure de la table `info_course`
--

CREATE TABLE `info_course` (
  `id_course` int(11) NOT NULL,
  `id_coureur` int(11) NOT NULL,
  `temps` varchar(255) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `arrive` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `info_course`
--


ALTER TABLE `championat`
  ADD PRIMARY KEY (`id_championat`);

--
-- Index pour la table `coureur`
--
ALTER TABLE `coureur`
  ADD PRIMARY KEY (`id_coureur`);

--
-- Index pour la table `coureur_championat`
--
ALTER TABLE `coureur_championat`
  ADD PRIMARY KEY (`id_coureur`,`id_championat`);

--
-- Index pour la table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id_course`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id_equipe`);

--
-- Index pour la table `equipe_coureur`
--
ALTER TABLE `equipe_coureur`
  ADD PRIMARY KEY (`id_coureur`,`id_equipe`);

--
-- Index pour la table `gpm_sp`
--
ALTER TABLE `gpm_sp`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `info_course`
--
ALTER TABLE `info_course`
  ADD PRIMARY KEY (`id_coureur`,`id_course`);

