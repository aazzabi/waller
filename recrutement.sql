-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 21, 2018 at 04:12 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recrutement`
--

-- --------------------------------------------------------

--
-- Table structure for table `action`
--

CREATE TABLE `action` (
  `id` int(11) NOT NULL,
  `etape_destination_id` int(11) DEFAULT NULL,
  `etape_source_id` int(11) DEFAULT NULL,
  `libelle` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `affectation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `action`
--

INSERT INTO `action` (`id`, `etape_destination_id`, `etape_source_id`, `libelle`, `affectation`) VALUES
(1, 2, 1, 'Nouveau to Refusé', 0),
(2, 3, 1, 'Nouveau to En attente', 0),
(3, 4, 1, 'Nouveau to En attente d\'entretien', 0),
(4, 5, 1, 'Nouveau to Entretien programmé', 0),
(5, 6, 1, 'Nouveau to Proposé au client', 0),
(6, 7, 1, 'Nouveau to Recalé', 0),
(7, 8, 1, 'Nouveau to CV proposé', 0),
(8, 9, 1, 'Nouveau to Entretien programmé', 0),
(9, 10, 1, 'Nouveau to CV interressant', 0),
(10, 11, 1, 'Nouveau to Recrutement demandé', 0),
(11, 12, 1, 'Nouveau to Proposition de recrutement', 0),
(12, 13, 1, 'Nouveau to Recruté', 0),
(13, 1, 2, 'Refusé to Nouveau', 0),
(14, 3, 2, 'Refusé to En attente', 0),
(15, 4, 2, 'Refusé to En attente d\'entretien', 0),
(16, 5, 2, 'Refusé to Entretien programmé', 0),
(17, 6, 2, 'Refusé to Proposé au client', 0),
(18, 7, 2, 'Refusé to Recalé', 0),
(19, 8, 2, 'Refusé to CV proposé', 0),
(20, 9, 2, 'Refusé to Entretien programmé', 0),
(21, 10, 2, 'Refusé to CV interressant', 0),
(22, 11, 2, 'Refusé to Recrutement demandé', 0),
(23, 12, 2, 'Refusé to Proposition de recrutement', 0),
(24, 13, 2, 'Refusé to Recruté', 0),
(25, 1, 3, 'En attente to Nouveau', 0),
(26, 2, 3, 'En attente to Refusé', 0),
(27, 4, 3, 'En attente to En attente d\'entretien', 0),
(28, 5, 3, 'En attente to Entretien programmé', 0),
(29, 6, 3, 'En attente to Proposé au client', 0),
(30, 7, 3, 'En attente to Recalé', 0),
(31, 8, 3, 'En attente to CV proposé', 0),
(32, 9, 3, 'En attente to Entretien programmé', 0),
(33, 10, 3, 'En attente to CV interressant', 0),
(34, 11, 3, 'En attente to Recrutement demandé', 0),
(35, 12, 3, 'En attente to Proposition de recrutement', 0),
(36, 13, 3, 'En attente to Recruté', 0),
(37, 1, 4, 'En attente d\'entretien to Nouveau', 0),
(38, 2, 4, 'En attente d\'entretien to Refusé', 0),
(39, 3, 4, 'En attente d\'entretien to En attente', 0),
(40, 5, 4, 'En attente d\'entretien to Entretien programmé', 0),
(41, 6, 4, 'En attente d\'entretien to Proposé au client', 0),
(42, 7, 4, 'En attente d\'entretien to Recalé', 0),
(43, 8, 4, 'En attente d\'entretien to CV proposé', 0),
(44, 9, 4, 'En attente d\'entretien to Entretien programmé', 0),
(45, 10, 4, 'En attente d\'entretien to CV interressant', 0),
(46, 11, 4, 'En attente d\'entretien to Recrutement demandé', 0),
(47, 12, 4, 'En attente d\'entretien to Proposition de recrutement', 0),
(48, 13, 4, 'En attente d\'entretien to Recruté', 0),
(49, 1, 5, 'Entretien programmé to Nouveau', 0),
(50, 2, 5, 'Entretien programmé to Refusé', 0),
(51, 3, 5, 'Entretien programmé to En attente', 0),
(52, 4, 5, 'Entretien programmé to En attente d\'entretien', 0),
(53, 6, 5, 'Entretien programmé to Proposé au client', 0),
(54, 7, 5, 'Entretien programmé to Recalé', 0),
(55, 8, 5, 'Entretien programmé to CV proposé', 0),
(56, 9, 5, 'Entretien programmé to Entretien programmé', 0),
(57, 10, 5, 'Entretien programmé to CV interressant', 0),
(58, 11, 5, 'Entretien programmé to Recrutement demandé', 0),
(59, 12, 5, 'Entretien programmé to Proposition de recrutement', 0),
(60, 13, 5, 'Entretien programmé to Recruté', 0),
(61, 1, 6, 'Proposé au client to Nouveau', 0),
(62, 2, 6, 'Proposé au client to Refusé', 0),
(63, 3, 6, 'Proposé au client to En attente', 0),
(64, 4, 6, 'Proposé au client to En attente d\'entretien', 0),
(65, 5, 6, 'Proposé au client to Entretien programmé', 0),
(66, 7, 6, 'Proposé au client to Recalé', 0),
(67, 8, 6, 'Proposé au client to CV proposé', 0),
(68, 9, 6, 'Proposé au client to Entretien programmé', 0),
(69, 10, 6, 'Proposé au client to CV interressant', 0),
(70, 11, 6, 'Proposé au client to Recrutement demandé', 0),
(71, 12, 6, 'Proposé au client to Proposition de recrutement', 0),
(72, 13, 6, 'Proposé au client to Recruté', 0),
(73, 1, 7, 'Recalé to Nouveau', 0),
(74, 2, 7, 'Recalé to Refusé', 0),
(75, 3, 7, 'Recalé to En attente', 0),
(76, 4, 7, 'Recalé to En attente d\'entretien', 0),
(77, 5, 7, 'Recalé to Entretien programmé', 0),
(78, 6, 7, 'Recalé to Proposé au client', 0),
(79, 8, 7, 'Recalé to CV proposé', 0),
(80, 9, 7, 'Recalé to Entretien programmé', 0),
(81, 10, 7, 'Recalé to CV interressant', 0),
(82, 11, 7, 'Recalé to Recrutement demandé', 0),
(83, 12, 7, 'Recalé to Proposition de recrutement', 0),
(84, 13, 7, 'Recalé to Recruté', 0),
(85, 1, 8, 'CV proposé to Nouveau', 0),
(86, 2, 8, 'CV proposé to Refusé', 0),
(87, 3, 8, 'CV proposé to En attente', 0),
(88, 4, 8, 'CV proposé to En attente d\'entretien', 0),
(89, 5, 8, 'CV proposé to Entretien programmé', 0),
(90, 6, 8, 'CV proposé to Proposé au client', 0),
(91, 7, 8, 'CV proposé to Recalé', 0),
(92, 9, 8, 'CV proposé to Entretien programmé', 0),
(93, 10, 8, 'CV proposé to CV interressant', 0),
(94, 11, 8, 'CV proposé to Recrutement demandé', 0),
(95, 12, 8, 'CV proposé to Proposition de recrutement', 0),
(96, 13, 8, 'CV proposé to Recruté', 0),
(97, 1, 9, 'Entretien programmé to Nouveau', 0),
(98, 2, 9, 'Entretien programmé to Refusé', 0),
(99, 3, 9, 'Entretien programmé to En attente', 0),
(100, 4, 9, 'Entretien programmé to En attente d\'entretien', 0),
(101, 5, 9, 'Entretien programmé to Entretien programmé', 0),
(102, 6, 9, 'Entretien programmé to Proposé au client', 0),
(103, 7, 9, 'Entretien programmé to Recalé', 0),
(104, 8, 9, 'Entretien programmé to CV proposé', 0),
(105, 10, 9, 'Entretien programmé to CV interressant', 0),
(106, 11, 9, 'Entretien programmé to Recrutement demandé', 0),
(107, 12, 9, 'Entretien programmé to Proposition de recrutement', 0),
(108, 13, 9, 'Entretien programmé to Recruté', 0),
(109, 1, 10, 'CV interressant to Nouveau', 0),
(110, 2, 10, 'CV interressant to Refusé', 0),
(111, 3, 10, 'CV interressant to En attente', 0),
(112, 4, 10, 'CV interressant to En attente d\'entretien', 0),
(113, 5, 10, 'CV interressant to Entretien programmé', 0),
(114, 6, 10, 'CV interressant to Proposé au client', 0),
(115, 7, 10, 'CV interressant to Recalé', 0),
(116, 8, 10, 'CV interressant to CV proposé', 0),
(117, 9, 10, 'CV interressant to Entretien programmé', 0),
(118, 11, 10, 'CV interressant to Recrutement demandé', 0),
(119, 12, 10, 'CV interressant to Proposition de recrutement', 0),
(120, 13, 10, 'CV interressant to Recruté', 0),
(121, 1, 11, 'Recrutement demandé to Nouveau', 0),
(122, 2, 11, 'Recrutement demandé to Refusé', 0),
(123, 3, 11, 'Recrutement demandé to En attente', 0),
(124, 4, 11, 'Recrutement demandé to En attente d\'entretien', 0),
(125, 5, 11, 'Recrutement demandé to Entretien programmé', 0),
(126, 6, 11, 'Recrutement demandé to Proposé au client', 0),
(127, 7, 11, 'Recrutement demandé to Recalé', 0),
(128, 8, 11, 'Recrutement demandé to CV proposé', 0),
(129, 9, 11, 'Recrutement demandé to Entretien programmé', 0),
(130, 10, 11, 'Recrutement demandé to CV interressant', 0),
(131, 12, 11, 'Recrutement demandé to Proposition de recrutement', 0),
(132, 13, 11, 'Recrutement demandé to Recruté', 0),
(133, 1, 12, 'Proposition de recrutement to Nouveau', 0),
(134, 2, 12, 'Proposition de recrutement to Refusé', 0),
(135, 3, 12, 'Proposition de recrutement to En attente', 0),
(136, 4, 12, 'Proposition de recrutement to En attente d\'entretien', 0),
(137, 5, 12, 'Proposition de recrutement to Entretien programmé', 0),
(138, 6, 12, 'Proposition de recrutement to Proposé au client', 0),
(139, 7, 12, 'Proposition de recrutement to Recalé', 0),
(140, 8, 12, 'Proposition de recrutement to CV proposé', 0),
(141, 9, 12, 'Proposition de recrutement to Entretien programmé', 0),
(142, 10, 12, 'Proposition de recrutement to CV interressant', 0),
(143, 11, 12, 'Proposition de recrutement to Recrutement demandé', 0),
(144, 13, 12, 'Proposition de recrutement to Recruté', 0),
(145, 1, 13, 'Recruté to Nouveau', 0),
(146, 2, 13, 'Recruté to Refusé', 0),
(147, 3, 13, 'Recruté to En attente', 0),
(148, 4, 13, 'Recruté to En attente d\'entretien', 0),
(149, 5, 13, 'Recruté to Entretien programmé', 0),
(150, 6, 13, 'Recruté to Proposé au client', 0),
(151, 7, 13, 'Recruté to Recalé', 0),
(152, 8, 13, 'Recruté to CV proposé', 0),
(153, 9, 13, 'Recruté to Entretien programmé', 0),
(154, 10, 13, 'Recruté to CV interressant', 0),
(155, 11, 13, 'Recruté to Recrutement demandé', 0),
(156, 12, 13, 'Recruté to Proposition de recrutement', 0);

-- --------------------------------------------------------

--
-- Table structure for table `candidature`
--

CREATE TABLE `candidature` (
  `id` int(11) NOT NULL,
  `current_etape_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `poste_id` int(11) DEFAULT NULL,
  `profile_id` int(11) DEFAULT NULL,
  `workflow_id` int(11) DEFAULT NULL,
  `commentaire` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `candidature`
--

INSERT INTO `candidature` (`id`, `current_etape_id`, `group_id`, `poste_id`, `profile_id`, `workflow_id`, `commentaire`) VALUES
(11, 7, 1, 1, 9, 1, 'un commentaire'),
(12, 5, 1, 1, 10, 1, 'Commentaire pour candidature de fatma'),
(13, 5, 1, 2, 10, 1, 'candidat numero 5');

-- --------------------------------------------------------

--
-- Table structure for table `competence`
--

CREATE TABLE `competence` (
  `id` int(11) NOT NULL,
  `libelle` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `competence`
--

INSERT INTO `competence` (`id`, `libelle`) VALUES
(1, 'Symfony'),
(2, 'Zend'),
(3, 'CakePHP'),
(4, 'Laravel'),
(5, 'Ajax'),
(6, 'AngularJS'),
(7, 'JQuery'),
(8, 'ReactJS');

-- --------------------------------------------------------

--
-- Table structure for table `disponibilite`
--

CREATE TABLE `disponibilite` (
  `id` int(11) NOT NULL,
  `libelle` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `disponibilite`
--

INSERT INTO `disponibilite` (`id`, `libelle`) VALUES
(1, 'Immédiatement'),
(2, 'Dans une semaine\r\n'),
(3, 'Dans un mois '),
(4, 'Dans deux mois'),
(5, 'Dans trois mois\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `etape`
--

CREATE TABLE `etape` (
  `id` int(11) NOT NULL,
  `workflow_id` int(11) DEFAULT NULL,
  `libelle` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `ordre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `etape`
--

INSERT INTO `etape` (`id`, `workflow_id`, `libelle`, `ordre`) VALUES
(1, 1, 'Nouveau', 1),
(2, 1, 'Refusé', 2),
(3, 1, 'En attente', 3),
(4, 1, 'En attente d\'entretien', 4),
(5, 1, 'Entretien programmé', 5),
(6, 1, 'Proposé au client', 6),
(7, 1, 'Recalé', 7),
(8, 1, 'CV proposé', 8),
(9, 1, 'Entretien programmé', 9),
(10, 1, 'CV interressant', 10),
(11, 1, 'Recrutement demandé', 11),
(12, 1, 'Proposition de recrutement', 12),
(13, 1, 'Recruté', 13);

-- --------------------------------------------------------

--
-- Table structure for table `groupe`
--

CREATE TABLE `groupe` (
  `id` int(11) NOT NULL,
  `name` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groupe`
--

INSERT INTO `groupe` (`id`, `name`, `roles`) VALUES
(1, 'Smart Team', 'N;'),
(2, 'Satisfactory', 'N;'),
(3, 'FST\r\n', 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `lien`
--

CREATE TABLE `lien` (
  `id` int(11) NOT NULL,
  `poste_id` int(11) DEFAULT NULL,
  `libelle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lien`
--

INSERT INTO `lien` (`id`, `poste_id`, `libelle`, `url`) VALUES
(1, 1, 'Keejob', 'http://www.keejob.com'),
(12, 2, 'jobi', 'http://www.jobi.tn'),
(15, 10, 'Keejob', 'http://www.keejob.tn'),
(16, 1, 'eaazeazeaze', 'http://www.jobi.tn');

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `candidature_id` int(11) DEFAULT NULL,
  `etape_id` int(11) DEFAULT NULL,
  `commentaire` text COLLATE utf8_unicode_ci,
  `evaluation` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`id`, `candidature_id`, `etape_id`, `commentaire`, `evaluation`, `date_created`) VALUES
(58, 11, 1, 'note en attente', 2, NULL),
(59, 11, 3, '', 5, NULL),
(60, 11, 7, NULL, 0, NULL),
(61, 12, 1, '', 2, NULL),
(62, 12, 3, 'note en attente', 0, NULL),
(63, 12, 4, '', 0, NULL),
(64, 12, 5, NULL, 0, NULL),
(65, 13, 1, 'un 1ere note', 2, NULL),
(66, 13, 3, '', 0, NULL),
(67, 13, 5, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `poste`
--

CREATE TABLE `poste` (
  `id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `libelle` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `profile_demande` text COLLATE utf8_unicode_ci,
  `created_by_group` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `poste`
--

INSERT INTO `poste` (`id`, `group_id`, `libelle`, `description`, `profile_demande`, `created_by_group`) VALUES
(1, 2, 'Développeur Web Full Stack Junior', 'Développeur Web Full Stack Junior', 'Développeur Web Full Stack Junior', NULL),
(2, 2, 'Développeur Web Full Stack Sénior', 'Développeur Web Full Stack Sénior', 'Développeur Web Full Stack Sénior', NULL),
(10, 2, '3aref', 'azeazeazez', 'ssssss', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `disponibilite_id` int(11) DEFAULT NULL,
  `nom` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `niveau` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `skype` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `github` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sivp` tinyint(1) NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prestationSalariale` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cv_updated_at` datetime DEFAULT NULL,
  `photo_updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `disponibilite_id`, `nom`, `prenom`, `telephone`, `email`, `cv`, `experience`, `niveau`, `skype`, `linkedin`, `facebook`, `github`, `sivp`, `photo`, `prestationSalariale`, `cv_updated_at`, `photo_updated_at`) VALUES
(9, 1, 'Arafet', 'Seif', '53924344', 'seif.azzabi@gmail.com', '58d149bbc5eb7.docx', 1, 'Bon en JS', 'arafet.azzabi', 'http://www.linkedin.com/seifallah', 'http://www.facebook.com/seifallah', NULL, 1, '58d149bbc687e.jpg', '9999', '2017-03-21 16:41:47', '2017-03-21 16:41:47'),
(10, 4, 'Azzabi', 'Fatma Ezzahra', '22114455', 'syrine@gmail.com', '58d385b19d2ac.docx', 1, 'Bon en JS', 'syrine', 'http://www.linkedin.com/seifallah', NULL, NULL, 1, '58d385b19d9c4.jpg', '55111', '2017-03-23 09:22:09', '2017-03-23 09:22:09');

-- --------------------------------------------------------

--
-- Table structure for table `profile_competence`
--

CREATE TABLE `profile_competence` (
  `competence_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile_competence`
--

INSERT INTO `profile_competence` (`competence_id`, `profile_id`) VALUES
(1, 9),
(1, 10),
(2, 9),
(3, 10);

-- --------------------------------------------------------

--
-- Table structure for table `rapport`
--

CREATE TABLE `rapport` (
  `id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  `candidature_id` int(11) NOT NULL,
  `libelle` text COLLATE utf8_unicode_ci NOT NULL,
  `user_created` int(11) DEFAULT NULL,
  `user_updated` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rapport`
--

INSERT INTO `rapport` (`id`, `action_id`, `candidature_id`, `libelle`, `user_created`, `user_updated`, `date_created`, `date_updated`) VALUES
(10, 30, 11, 'rapport , recalé', NULL, NULL, '2017-03-21 16:43:54', '2017-03-21 16:43:54'),
(11, 2, 12, 'Raport 1', NULL, NULL, '2017-03-23 09:26:54', '2017-03-23 09:26:54'),
(12, 40, 12, 'Rapport 2', NULL, NULL, '2017-03-23 09:29:03', '2017-03-23 09:29:03'),
(13, 2, 13, 'un 1er rapport', NULL, NULL, '2017-03-27 10:50:11', '2017-03-27 10:50:11'),
(14, 28, 13, 'un 2eme', NULL, NULL, '2017-03-27 10:50:36', '2017-03-27 10:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `group_id` int(11) DEFAULT NULL,
  `nom` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `group_id`, `nom`, `prenom`) VALUES
(1, 'Gabriele', 'gabriele', 'gsantini@smart-team.tn', 'gsantini@smart-team.tn', 1, NULL, '$2y$13$SKYjSHauDA5QJs5hrcqi/.tpYWxSUEsh7v5VqRJqnRhXW66zhJMwO', '2018-03-21 15:02:21', NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 1, '', ''),
(2, 'Arafet', 'arafet', 'aazzabi@smart-team.tn', 'aazzabi@smart-team.tn', 1, NULL, '$2y$13$gpgcdVKGl6PdsenBGcjOHejGom1lhlt6YXl0k5DCnCxD.YjN2MOIC', NULL, NULL, NULL, 'a:0:{}', NULL, '', ''),
(3, 'Amel', 'amel', 'abhar@smart-team.tn', 'abhar@smart-team.tn', 1, NULL, '$2y$13$mHCL8Ri9oYR4alU1CwVzWOCEroDArEiGI8wjkXu0SqzM0Xibbre8u', NULL, NULL, NULL, 'a:0:{}', NULL, '', ''),
(4, 'Walid', 'walid', 'wmnassri@smart-team.tn', 'wmnassri@smart-team.tn', 1, NULL, '$2y$13$IJIc9XVLcRUSm/5uEGGr3eEAzEZK2A8c6J3qHRXBBTHlwob8pTMCO', NULL, NULL, NULL, 'a:0:{}', NULL, '', ''),
(5, 'Sebastien', 'sebastien', 'sebastien@smart-team.tn', 'sebastien@smart-team.tn', 1, NULL, '$2y$13$pW7wheSXDZ4h.nBBKwVsAukkqv4Yd6xa.3xW87v1Aa3acAV.5OSxy', NULL, NULL, NULL, 'a:0:{}', NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`group_id`, `user_id`) VALUES
(1, 1),
(1, 3),
(1, 4),
(2, 5),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `workflow`
--

CREATE TABLE `workflow` (
  `id` int(11) NOT NULL,
  `libelle` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `workflow`
--

INSERT INTO `workflow` (`id`, `libelle`, `description`) VALUES
(1, 'Standard Recruitment Workflow ', 'Standard Recruitment Workflow ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_47CC8C92B82FA98E` (`etape_source_id`),
  ADD KEY `IDX_47CC8C923F0EC820` (`etape_destination_id`);

--
-- Indexes for table `candidature`
--
ALTER TABLE `candidature`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E33BD3B82C7C2CBA` (`workflow_id`),
  ADD KEY `IDX_E33BD3B8D7F4D887` (`current_etape_id`),
  ADD KEY `IDX_E33BD3B8A0905086` (`poste_id`),
  ADD KEY `IDX_E33BD3B8CCFA12B8` (`profile_id`),
  ADD KEY `IDX_E33BD3B8FE54D947` (`group_id`);

--
-- Indexes for table `competence`
--
ALTER TABLE `competence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disponibilite`
--
ALTER TABLE `disponibilite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `etape`
--
ALTER TABLE `etape`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_285F75DD2C7C2CBA` (`workflow_id`);

--
-- Indexes for table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_4B98C215E237E06` (`name`);

--
-- Indexes for table `lien`
--
ALTER TABLE `lien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A532B4B5A0905086` (`poste_id`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CFBDFA14B6121583` (`candidature_id`),
  ADD KEY `IDX_CFBDFA144A8CA2AD` (`etape_id`);

--
-- Indexes for table `poste`
--
ALTER TABLE `poste`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7C890FABFE54D947` (`group_id`),
  ADD KEY `IDX_7C890FAB47DF6A1A` (`created_by_group`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8157AA0F2B9D6493` (`disponibilite_id`);

--
-- Indexes for table `profile_competence`
--
ALTER TABLE `profile_competence`
  ADD PRIMARY KEY (`profile_id`,`competence_id`),
  ADD KEY `IDX_53BF5F2215761DAB` (`competence_id`),
  ADD KEY `IDX_53BF5F22CCFA12B8` (`profile_id`);

--
-- Indexes for table `rapport`
--
ALTER TABLE `rapport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_BE34A09CB6121583` (`candidature_id`),
  ADD KEY `IDX_BE34A09C9D32F035` (`action_id`),
  ADD KEY `IDX_BE34A09CEA30A9B2` (`user_created`),
  ADD KEY `IDX_BE34A09C9E9688FD` (`user_updated`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_8D93D649C05FB297` (`confirmation_token`),
  ADD KEY `IDX_8D93D649FE54D947` (`group_id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`group_id`,`user_id`),
  ADD KEY `IDX_8F02BF9DFE54D947` (`group_id`),
  ADD KEY `IDX_8F02BF9DA76ED395` (`user_id`);

--
-- Indexes for table `workflow`
--
ALTER TABLE `workflow`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action`
--
ALTER TABLE `action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;
--
-- AUTO_INCREMENT for table `candidature`
--
ALTER TABLE `candidature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `competence`
--
ALTER TABLE `competence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `disponibilite`
--
ALTER TABLE `disponibilite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `etape`
--
ALTER TABLE `etape`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lien`
--
ALTER TABLE `lien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `poste`
--
ALTER TABLE `poste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `rapport`
--
ALTER TABLE `rapport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `workflow`
--
ALTER TABLE `workflow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `action`
--
ALTER TABLE `action`
  ADD CONSTRAINT `FK_47CC8C923F0EC820` FOREIGN KEY (`etape_destination_id`) REFERENCES `etape` (`id`),
  ADD CONSTRAINT `FK_47CC8C92B82FA98E` FOREIGN KEY (`etape_source_id`) REFERENCES `etape` (`id`);

--
-- Constraints for table `candidature`
--
ALTER TABLE `candidature`
  ADD CONSTRAINT `FK_E33BD3B82C7C2CBA` FOREIGN KEY (`workflow_id`) REFERENCES `workflow` (`id`),
  ADD CONSTRAINT `FK_E33BD3B8A0905086` FOREIGN KEY (`poste_id`) REFERENCES `poste` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_E33BD3B8CCFA12B8` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_E33BD3B8D7F4D887` FOREIGN KEY (`current_etape_id`) REFERENCES `etape` (`id`),
  ADD CONSTRAINT `FK_E33BD3B8FE54D947` FOREIGN KEY (`group_id`) REFERENCES `groupe` (`id`);

--
-- Constraints for table `etape`
--
ALTER TABLE `etape`
  ADD CONSTRAINT `FK_285F75DD2C7C2CBA` FOREIGN KEY (`workflow_id`) REFERENCES `workflow` (`id`);

--
-- Constraints for table `lien`
--
ALTER TABLE `lien`
  ADD CONSTRAINT `FK_A532B4B5A0905086` FOREIGN KEY (`poste_id`) REFERENCES `poste` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `FK_CFBDFA144A8CA2AD` FOREIGN KEY (`etape_id`) REFERENCES `etape` (`id`),
  ADD CONSTRAINT `FK_CFBDFA14B6121583` FOREIGN KEY (`candidature_id`) REFERENCES `candidature` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `poste`
--
ALTER TABLE `poste`
  ADD CONSTRAINT `FK_7C890FAB47DF6A1A` FOREIGN KEY (`created_by_group`) REFERENCES `groupe` (`id`),
  ADD CONSTRAINT `FK_7C890FABFE54D947` FOREIGN KEY (`group_id`) REFERENCES `groupe` (`id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `FK_8157AA0F2B9D6493` FOREIGN KEY (`disponibilite_id`) REFERENCES `disponibilite` (`id`);

--
-- Constraints for table `profile_competence`
--
ALTER TABLE `profile_competence`
  ADD CONSTRAINT `FK_53BF5F2215761DAB` FOREIGN KEY (`competence_id`) REFERENCES `competence` (`id`),
  ADD CONSTRAINT `FK_53BF5F22CCFA12B8` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`);

--
-- Constraints for table `rapport`
--
ALTER TABLE `rapport`
  ADD CONSTRAINT `FK_BE34A09C9D32F035` FOREIGN KEY (`action_id`) REFERENCES `action` (`id`),
  ADD CONSTRAINT `FK_BE34A09C9E9688FD` FOREIGN KEY (`user_updated`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_BE34A09CB6121583` FOREIGN KEY (`candidature_id`) REFERENCES `candidature` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_BE34A09CEA30A9B2` FOREIGN KEY (`user_created`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D649FE54D947` FOREIGN KEY (`group_id`) REFERENCES `groupe` (`id`);

--
-- Constraints for table `user_group`
--
ALTER TABLE `user_group`
  ADD CONSTRAINT `FK_8F02BF9DA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_8F02BF9DFE54D947` FOREIGN KEY (`group_id`) REFERENCES `groupe` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
