-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Sam 14 Octobre 2017 à 21:45
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `jo2024`
--

-- --------------------------------------------------------

--
-- Structure de la table `athlete`
--

CREATE TABLE `athlete` (
  `id` int(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `discipline_id` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` datetime NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `athlete`
--

INSERT INTO `athlete` (`id`, `country_id`, `discipline_id`, `name`, `first_name`, `birth_date`, `picture`) VALUES
(11, 76, 23, 'Riner', 'Teddy', '1989-04-07 00:00:00', 'dc173680feef0fbfc5267197794ba84f.jpeg'),
(12, 77, 25, 'Anspach', 'Paul', '1986-04-08 00:00:00', '903b6cadabcb9c4b61b807bf98165755.jpeg'),
(13, 78, 26, 'Desforges', 'Arridano', '1987-07-13 00:00:00', '489ae001fe8ebb727587b0d1be3ac947.jpeg'),
(14, 79, 28, 'Bonsaint', 'Sacripant', '1989-09-22 00:00:00', 'ffd94bebd9a865c1291e80168dcd20ad.jpeg'),
(15, 80, 24, 'Larivière', 'Frédéric', '1997-04-12 00:00:00', '7d025d407e3935e07248249fa8697d27.jpeg'),
(16, 81, 27, 'Jardine', 'Merle', '1969-11-17 00:00:00', 'dea26730cb938ea87881d7816bfda5fd.jpeg'),
(18, 78, 29, 'Laforge', 'Léon', '1992-04-18 00:00:00', 'b8c0f7af013907c03b05475dad775fb7.jpeg'),
(19, 76, 30, 'Barrière', 'Joanna', '1986-08-14 00:00:00', 'c03f3ea13d7ae3db332ae02a04e5611b.jpeg'),
(20, 81, 31, 'Rocher', 'Blanche', '1983-05-24 00:00:00', 'a7327de3870e33d3d80e048f13989826.jpeg'),
(21, 78, 32, 'Desnoyer', 'Joy', '1990-07-23 00:00:00', '78113ae285f795e0079bcfce62c8a231.jpeg'),
(22, 80, 28, 'Bonneville', 'Luce', '2001-10-17 00:00:00', 'a7d72960c92034136722e3310fe3c7b6.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `flag` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `country`
--

INSERT INTO `country` (`id`, `name`, `flag`) VALUES
(76, 'France', '76ef0b00f665ae23984820c9d488a011.png'),
(77, 'Belgique', '2cdc6f53fd8c1341d54ff8d12964ef8b.png'),
(78, 'Allemagne', '0b8bbd0b89aba3afb3e486a4cb3e8012.png'),
(79, 'Espagne', '66e0ce396c28a801e368d9b821463b5f.png'),
(80, 'Italie', '324c00b0c37fd441e75ff744c9357f9b.png'),
(81, 'Etats-Unis', 'ce0a61b197fa89a0fe9f28e8b22a5f3c.png');

-- --------------------------------------------------------

--
-- Structure de la table `discipline`
--

CREATE TABLE `discipline` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `discipline`
--

INSERT INTO `discipline` (`id`, `name`) VALUES
(23, 'Judo'),
(24, 'Karaté'),
(25, 'Escrime'),
(26, 'Natation'),
(27, 'Boxe'),
(28, 'BasketBall'),
(29, 'Football'),
(30, 'Golf'),
(31, 'Handball'),
(32, 'Haltérophilie');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `athlete`
--
ALTER TABLE `athlete`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_C03B832116DB4F89` (`picture`),
  ADD KEY `IDX_C03B8321F92F3E70` (`country_id`),
  ADD KEY `IDX_C03B8321A5522701` (`discipline_id`);

--
-- Index pour la table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `discipline`
--
ALTER TABLE `discipline`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `athlete`
--
ALTER TABLE `athlete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT pour la table `discipline`
--
ALTER TABLE `discipline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `athlete`
--
ALTER TABLE `athlete`
  ADD CONSTRAINT `FK_C03B8321A5522701` FOREIGN KEY (`discipline_id`) REFERENCES `discipline` (`id`),
  ADD CONSTRAINT `FK_C03B8321F92F3E70` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`);
