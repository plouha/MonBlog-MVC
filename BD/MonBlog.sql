-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:8889
-- Généré le :  ven. 29 juin 2018 à 19:55
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `monblog`
--

-- --------------------------------------------------------

--
-- Structure de la table `T_ADMIN`
--

CREATE TABLE `T_ADMIN` (
  `id` int(2) NOT NULL,
  `pseudo` varchar(10) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_ADMIN`
--

INSERT INTO `T_ADMIN` (`id`, `pseudo`, `pass`) VALUES
(1, 'admin', '$2y$10$rrwYnL4OKflk54NYvSD5Ou51Tmce3yqRM5hShufaonWn53nZiV2O.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `T_ADMIN`
--
ALTER TABLE `T_ADMIN`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `T_ADMIN`
--
ALTER TABLE `T_ADMIN`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

create table T_BILLET (
  BIL_ID integer primary key auto_increment,
  BIL_DATE datetime not null,
  BIL_TITRE varchar(100) not null,
  BIL_CONTENU varchar(400) not null
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

create table T_COMMENTAIRE (
  COM_ID integer primary key auto_increment,
  COM_DATE datetime not null,
  COM_AUTEUR varchar(100) not null,
  COM_CONTENU varchar(200) not null,
  BIL_ID integer not null,
  constraint fk_com_bil foreign key(BIL_ID) references T_BILLET(BIL_ID)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE T_MEMBRE (
  id               int(10) unsigned NOT NULL AUTO_INCREMENT,
  pseudo           varchar(32)  NOT NULL,
  pass             varchar(255)     NOT NULL,
  mail             varchar(128) NOT NULL,
  date_creation    datetime NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY pseudo (pseudo),
  UNIQUE KEY mail (mail),
  KEY pass (pass)
) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


