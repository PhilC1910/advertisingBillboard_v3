-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 12 Octobre 2018 à 03:10
-- Version du serveur :  5.6.37
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `advertisionbillboardv001`
--

-- --------------------------------------------------------

--
-- Structure de la table `billboards`
--

CREATE TABLE IF NOT EXISTS `billboards` (
  `billboard_id` int(11) NOT NULL,
  `billboard_details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `billboards`
--

INSERT INTO `billboards` (`billboard_id`, `billboard_details`, `created`, `modified`) VALUES
(1, 'the top 100 of the year 2018', '2018-10-05 21:39:43', '2018-10-05 21:39:43');

-- --------------------------------------------------------

--
-- Structure de la table `billboards_hired`
--

CREATE TABLE IF NOT EXISTS `billboards_hired` (
  `billboard_hire_id` int(11) NOT NULL,
  `billboard_id` int(11) NOT NULL,
  `hiring_party_id` int(11) NOT NULL,
  `date_hired_from` datetime NOT NULL,
  `date_hired_to` datetime NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `billboards_hired`
--

INSERT INTO `billboards_hired` (`billboard_hire_id`, `billboard_id`, `hiring_party_id`, `date_hired_from`, `date_hired_to`, `created`, `modified`, `user_id`) VALUES
(1, 1, 1, '2018-10-18 00:00:00', '2018-10-31 00:00:00', NULL, NULL, 4),
(2, 1, 1, '2018-02-09 09:13:00', '2018-07-06 17:26:00', '2018-10-06 01:30:12', '2018-10-06 01:30:12', 3),
(3, 1, 1, '2018-02-09 20:04:00', '2018-03-09 20:04:00', '2018-10-09 20:05:12', '2018-10-09 20:05:12', 3);

-- --------------------------------------------------------

--
-- Structure de la table `billboards_hireds`
--

CREATE TABLE IF NOT EXISTS `billboards_hireds` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `billboards_hireds`
--

INSERT INTO `billboards_hireds` (`id`) VALUES
(1);

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `file_id` int(12) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `files`
--

INSERT INTO `files` (`file_id`, `name`, `path`, `created`, `modified`, `status`) VALUES
(1, 'Invoices_sm.png', 'Files/', '2018-10-10 06:04:15', '2018-10-10 06:04:15', 1);

-- --------------------------------------------------------

--
-- Structure de la table `hiring_parties`
--

CREATE TABLE IF NOT EXISTS `hiring_parties` (
  `hiring_party_id` int(11) NOT NULL,
  `hiring_party_details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hiring_party_type_code_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `hiring_parties`
--

INSERT INTO `hiring_parties` (`hiring_party_id`, `hiring_party_details`, `hiring_party_type_code_id`, `created`, `modified`) VALUES
(1, 'madonna party', 1, '2018-10-05 21:40:17', '2018-10-05 21:40:17');

-- --------------------------------------------------------

--
-- Structure de la table `i18n`
--

CREATE TABLE IF NOT EXISTS `i18n` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `i18n`
--

INSERT INTO `i18n` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(1, 'HT', 'Billboards', 1, 'billboard_details', 'tèt 100 an 2018'),
(2, 'HT', 'HiringParties', 1, 'hiring_party_details', 'madonna pati'),
(3, 'fr_CA', 'Billboards', 1, 'billboard_details', 'le top 100 des années 2018'),
(4, 'fr_CA', 'HiringParties', 1, 'hiring_party_details', 'party de madonna');

-- --------------------------------------------------------

--
-- Structure de la table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `invoice_id` int(11) NOT NULL,
  `billboard_hire_id` int(11) NOT NULL,
  `invoice_details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `billboard_hire_id`, `invoice_details`, `created`, `modified`) VALUES
(1, 1, 'logiciel de music', NULL, NULL),
(2, 1, 'logiciel de mixage', '2018-10-06 02:05:55', '2018-10-06 02:05:55');

-- --------------------------------------------------------

--
-- Structure de la table `invoices_files`
--

CREATE TABLE IF NOT EXISTS `invoices_files` (
  `id` int(12) NOT NULL,
  `invoice_id` int(12) NOT NULL,
  `file_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `invoices_files`
--

INSERT INTO `invoices_files` (`id`, `invoice_id`, `file_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `payment_details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_id`, `payment_details`, `created`, `modified`) VALUES
(1, 1, 'un payment pour les équipements de 100$', NULL, NULL),
(2, 2, 'payment de l''abonnement du logicliel de mixage de 400$', '2018-10-06 02:11:08', '2018-10-06 02:11:08');

-- --------------------------------------------------------

--
-- Structure de la table `phinxlog`
--

CREATE TABLE IF NOT EXISTS `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20181012004349, 'Initial', '2018-10-12 04:43:49', '2018-10-12 04:43:49', 0);

-- --------------------------------------------------------

--
-- Structure de la table `ref_hiring_party_types`
--

CREATE TABLE IF NOT EXISTS `ref_hiring_party_types` (
  `hiring_party_type_code_id` int(11) NOT NULL,
  `hiring_party_type_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `advertising_agency_client` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `ref_hiring_party_types`
--

INSERT INTO `ref_hiring_party_types` (`hiring_party_type_code_id`, `hiring_party_type_description`, `advertising_agency_client`, `created`, `modified`) VALUES
(1, 'fete pour un grand mere', 'club 105', '2018-09-24 16:43:22', '2018-09-24 16:43:22');

-- --------------------------------------------------------

--
-- Structure de la table `Roles`
--

CREATE TABLE IF NOT EXISTS `Roles` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Roles`
--

INSERT INTO `Roles` (`id`) VALUES
('admin'),
('agent de marketing'),
('client');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `role_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codeConfirmation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `verifies` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `created`, `modified`, `role_id`, `email`, `codeConfirmation`, `verifies`) VALUES
(1, 'admin', 'admin', NULL, NULL, 'admin', '', '', 0),
(2, 'client', 'client', NULL, NULL, 'client', '', '', 0),
(3, 'agent', 'agent', NULL, NULL, 'agent de marketing', '', '', 0),
(4, 'admin02 ', '$2y$10$39T1ZgyWV6mV4o1USjOPRujNnaj5ab0mAzQvQDXtPon...', '2018-10-05 21:32:19', '2018-10-05 21:32:19', 'admin', '', '', 0),
(5, 'client01', '$2y$10$agBnx4pbYF11QE4MrBzSGuGg1NPNwWdyaANTyIgUWa9qUxkKKZ3NS', '2018-10-05 21:50:15', '2018-10-05 21:50:15', 'client', '', '', 0),
(6, 'agent01', '$2y$10$qw/1FA3AnoLJ8vWyBU3/fOiLUqt7VyYLQI/ZNr8nl4O/lTsktH3qu', '2018-10-05 21:50:40', '2018-10-05 21:50:40', 'agent de marketing', '', '', 0),
(7, 'admin01', '$2y$10$Ohhdh5IS0B5mtG5Qs2j4TOZuM7ATL9LwsaQKqiLD7SZtKqSxxCxcW', '2018-10-05 22:00:31', '2018-10-05 22:00:31', 'admin', '', '', 0),
(8, 'justin', '$2y$10$zQcakAQ1lgEnIWkfab1JyuHm7EUlo2VZarA/eSUArmGAJYS4LP1CK', '2018-10-11 20:25:26', '2018-10-11 20:46:10', 'agent de marketing', 'intigolasagna@gmail.com', '4c3fc44b-6bf0-444d-a0b6-20b12637e336', 1),
(9, 'phil24', '$2y$10$e/W8Q13qr9ouy9RRxIopl.2UrYgIon.0YYQp58GDFyaCk9K3CL2L6', '2018-10-11 21:01:23', '2018-10-11 21:01:23', 'agent de marketing', 'phil45@gmail.com', '07a8d7cf-e0f5-49cd-b650-7cbfaae1ba92', 0),
(18, 'admin32', '$2y$10$ws.JbhQWwC6QeYQsXAnCIOYMLSRQbaenoTdUXmPewYRdyS55t3r7G', '2018-10-11 23:34:54', '2018-10-11 23:35:17', 'admin', 'philc1019@gmail.com', 'd20f0e09-f854-470b-b20b-fc8f1506d8aa', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `billboards`
--
ALTER TABLE `billboards`
  ADD PRIMARY KEY (`billboard_id`);

--
-- Index pour la table `billboards_hired`
--
ALTER TABLE `billboards_hired`
  ADD PRIMARY KEY (`billboard_hire_id`),
  ADD KEY `billboard_id` (`billboard_id`,`hiring_party_id`),
  ADD KEY `billboard_id_2` (`billboard_id`,`hiring_party_id`),
  ADD KEY `billboard_id_3` (`billboard_id`,`hiring_party_id`),
  ADD KEY `hiring_party_id` (`hiring_party_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `billboards_hireds`
--
ALTER TABLE `billboards_hireds`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`);

--
-- Index pour la table `hiring_parties`
--
ALTER TABLE `hiring_parties`
  ADD PRIMARY KEY (`hiring_party_id`),
  ADD KEY `hiring_party_type_code_id` (`hiring_party_type_code_id`);

--
-- Index pour la table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`(100),`foreign_key`,`field`(100)),
  ADD KEY `I18N_FIELD` (`model`(100),`foreign_key`,`field`(100));

--
-- Index pour la table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `billboard_hire_id` (`billboard_hire_id`);

--
-- Index pour la table `invoices_files`
--
ALTER TABLE `invoices_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_id` (`invoice_id`,`file_id`),
  ADD KEY `file_id` (`file_id`);

--
-- Index pour la table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `invoice_id` (`invoice_id`),
  ADD KEY `invoice_id_2` (`invoice_id`);

--
-- Index pour la table `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `ref_hiring_party_types`
--
ALTER TABLE `ref_hiring_party_types`
  ADD PRIMARY KEY (`hiring_party_type_code_id`);

--
-- Index pour la table `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `billboards`
--
ALTER TABLE `billboards`
  MODIFY `billboard_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `billboards_hired`
--
ALTER TABLE `billboards_hired`
  MODIFY `billboard_hire_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `billboards_hireds`
--
ALTER TABLE `billboards_hireds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `hiring_parties`
--
ALTER TABLE `hiring_parties`
  MODIFY `hiring_party_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `invoices_files`
--
ALTER TABLE `invoices_files`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `ref_hiring_party_types`
--
ALTER TABLE `ref_hiring_party_types`
  MODIFY `hiring_party_type_code_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `billboards_hired`
--
ALTER TABLE `billboards_hired`
  ADD CONSTRAINT `billboards_hired_ibfk_1` FOREIGN KEY (`billboard_id`) REFERENCES `billboards` (`billboard_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `billboards_hired_ibfk_2` FOREIGN KEY (`hiring_party_id`) REFERENCES `hiring_parties` (`hiring_party_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `billboards_hired_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `hiring_parties`
--
ALTER TABLE `hiring_parties`
  ADD CONSTRAINT `hiring_parties_ibfk_1` FOREIGN KEY (`hiring_party_type_code_id`) REFERENCES `ref_hiring_party_types` (`hiring_party_type_code_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`billboard_hire_id`) REFERENCES `billboards_hired` (`billboard_hire_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `invoices_files`
--
ALTER TABLE `invoices_files`
  ADD CONSTRAINT `invoices_files_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`invoice_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoices_files_ibfk_2` FOREIGN KEY (`file_id`) REFERENCES `files` (`file_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`invoice_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `Roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
