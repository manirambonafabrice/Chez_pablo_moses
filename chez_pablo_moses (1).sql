-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 17 fév. 2022 à 14:24
-- Version du serveur :  10.1.40-MariaDB
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `chez_pablo_moses`
--

-- --------------------------------------------------------

--
-- Structure de la table `achat_points`
--

CREATE TABLE `achat_points` (
  `ACHAT_POINT_ID` int(11) NOT NULL,
  `COMMANDE_ID` int(11) DEFAULT NULL,
  `VENTE_ID` int(11) DEFAULT NULL,
  `PRODUIT_ID` int(11) NOT NULL,
  `CLIENT` int(11) NOT NULL,
  `QUANTITE` int(11) NOT NULL,
  `PRIX_UNITAIRE` int(11) NOT NULL,
  `PRIX_TOTAL` int(11) NOT NULL,
  `DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `BONUS` int(11) NOT NULL,
  `STATUT_SYNC` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `achat_points`
--

INSERT INTO `achat_points` (`ACHAT_POINT_ID`, `COMMANDE_ID`, `VENTE_ID`, `PRODUIT_ID`, `CLIENT`, `QUANTITE`, `PRIX_UNITAIRE`, `PRIX_TOTAL`, `DATE`, `BONUS`, `STATUT_SYNC`) VALUES
(1, 11, 0, 12, 19, 2, 45550, 91100, '2021-01-04 14:29:24', 0, 0),
(2, 11, 0, 3, 19, 8, 35000, 280000, '2021-01-04 14:29:24', 0, 0),
(3, 12, 0, 3, 19, 8, 35000, 280000, '2021-01-09 18:23:50', 0, 0),
(4, 12, 0, 12, 19, 8, 45550, 364400, '2021-01-09 18:23:50', 0, 0),
(5, 13, 0, 12, 20, 3, 45550, 136650, '2021-01-15 14:51:32', 0, 0),
(6, 14, 0, 12, 20, 2, 45550, 91100, '2021-01-17 15:31:37', 0, 0),
(7, 15, 0, 19, 20, 9, 0, 0, '2021-01-17 18:00:42', 0, 0),
(8, 16, 0, 12, 21, 9, 45550, 409950, '2021-01-22 10:27:55', 0, 0),
(9, 16, 0, 3, 21, 8, 35000, 280000, '2021-01-22 10:27:55', 0, 0),
(10, 16, 0, 17, 21, 5, 0, 0, '2021-01-22 10:27:55', 0, 0),
(11, 16, 0, 19, 21, 9, 0, 0, '2021-01-22 10:27:55', 0, 0),
(12, 17, 0, 12, 21, 9, 45550, 409950, '2021-01-22 12:18:14', 0, 0),
(13, 17, 0, 17, 21, 8, 0, 0, '2021-01-22 12:18:14', 0, 0),
(14, 20, 0, 12, 22, 3, 45550, 136650, '2021-01-27 18:52:43', 0, 0),
(15, 21, 0, 12, 22, 3, 45550, 136650, '2021-01-28 08:50:21', 0, 0),
(16, 22, 0, 12, 22, 1, 45550, 45550, '2021-01-29 12:07:00', 0, 0),
(17, 22, 0, 17, 22, 9, 0, 0, '2021-01-29 12:07:00', 0, 0),
(18, 23, 0, 12, 21, 6, 45550, 273300, '2021-02-02 19:15:46', 0, 0),
(19, 24, 0, 12, 21, 8, 45550, 364400, '2021-02-17 12:06:08', 0, 0),
(20, 24, 0, 72, 21, 9, 0, 0, '2021-02-17 12:06:08', 0, 0),
(21, 25, 0, 12, 23, 1, 45550, 45550, '2021-02-19 19:01:51', 0, 0),
(22, 25, 0, 97, 23, 1, 0, 0, '2021-02-19 19:01:51', 0, 0),
(23, 26, 0, 12, 21, 6, 45550, 273300, '2021-02-23 20:33:16', 0, 0),
(24, 27, 0, 13, 21, 8, 6000, 48000, '2021-03-14 18:22:52', 0, 0),
(25, 30, 0, 13, 25, 2, 6000, 12000, '2021-04-02 15:41:06', 0, 0),
(26, 31, 0, 13, 26, 2, 6000, 12000, '2021-04-02 18:11:57', 0, 0),
(27, 0, 4, 12, 20, 1, 45550, 45550, '2022-01-30 17:11:08', 0, 0),
(28, 0, 5, 12, 20, 1, 45550, 45550, '2022-01-30 17:23:53', 0, 0),
(29, 0, 6, 37, 20, 1, 3000, 3000, '2022-01-30 17:39:31', 0, 0),
(30, 0, 7, 123, 20, 1, 3400, 3400, '2022-01-30 17:39:31', 0, 0),
(31, 0, 8, 123, 20, 1, 3400, 3400, '2022-01-30 17:56:53', 0, 0),
(32, 0, 9, 81, 20, 1, 500, 500, '2022-01-30 17:56:53', 0, 0),
(33, 0, 10, 34, 20, 1, 4500, 4500, '2022-01-30 17:56:53', 0, 0),
(34, 0, 11, 120, 20, 1, 4500, 4500, '2022-01-30 17:56:53', 0, 0),
(35, 0, 12, 55, 20, 1, 5500, 5500, '2022-01-30 17:56:53', 0, 0),
(36, 32, 0, 13, 27, 2, 6000, 12000, '2022-02-04 09:46:58', 0, 0),
(37, 33, 0, 13, 28, 6, 6000, 36000, '2022-02-04 10:50:08', 0, 0),
(38, 34, 0, 13, 29, 4, 6000, 24000, '2022-02-06 16:03:36', 0, 0),
(39, 35, 0, 13, 30, 5, 6000, 30000, '2022-02-06 16:33:02', 0, 0),
(40, 36, 0, 13, 30, 6, 6000, 36000, '2022-02-06 16:41:12', 0, 0),
(41, 37, 0, 13, 31, 4, 6000, 24000, '2022-02-06 17:02:35', 0, 0),
(42, 38, 0, 13, 32, 5, 6000, 30000, '2022-02-06 17:18:24', 0, 0),
(43, 0, 13, 31, 20, 1, 1000, 1000, '2022-02-06 18:23:16', 0, 0),
(44, 0, 14, 31, 20, 1, 1000, 1000, '2022-02-06 18:23:16', 0, 0),
(45, 0, 15, 31, 20, 1, 1000, 1000, '2022-02-06 18:23:16', 0, 0),
(46, 0, 16, 42, 20, 1, 2000, 2000, '2022-02-06 18:23:16', 0, 0),
(47, 0, 17, 42, 20, 1, 2000, 2000, '2022-02-06 18:23:16', 0, 0),
(48, 0, 18, 31, 20, 1, 1000, 1000, '2022-02-06 18:23:16', 0, 0),
(49, 39, 0, 13, 32, 5, 6000, 30000, '2022-02-07 09:45:30', 0, 0),
(50, 39, 0, 28, 32, 2, 2000, 4000, '2022-02-07 09:45:30', 0, 0),
(51, 40, 0, 13, 33, 2, 6000, 12000, '2022-02-07 10:07:52', 0, 0),
(52, 0, 19, 55, 20, 1, 5500, 5500, '2022-02-07 10:20:57', 0, 0),
(53, 41, 0, 13, 34, 1, 6000, 6000, '2022-02-07 12:06:39', 0, 0),
(54, 41, 0, 28, 34, 1, 2000, 2000, '2022-02-07 12:06:39', 0, 0),
(55, 42, 0, 13, 35, 6, 6000, 36000, '2022-02-07 12:56:41', 0, 0),
(56, 42, 0, 28, 35, 1, 2000, 2000, '2022-02-07 12:56:41', 0, 0),
(57, 43, 0, 26, 34, 1, 8000, 8000, '2022-02-08 09:47:37', 0, 0),
(58, 43, 0, 28, 34, 2, 3000, 6000, '2022-02-08 09:47:37', 0, 0),
(59, 44, 0, 13, 36, 5, 6000, 30000, '2022-02-08 10:06:06', 0, 0),
(60, 0, 20, 136, 0, 1, 600, 600, '2022-02-08 10:14:24', 0, 0),
(61, 0, 21, 28, 0, 2, 3000, 6000, '2022-02-08 10:21:54', 0, 0),
(62, 0, 22, 31, 29, 1, 1000, 1000, '2022-02-08 10:28:01', 0, 0),
(63, 45, 0, 13, 37, 4, 6000, 24000, '2022-02-08 11:52:15', 0, 0),
(64, 0, 23, 31, 29, 1, 1000, 1000, '2022-02-09 08:48:13', 0, 0),
(65, 46, 0, 13, 38, 5, 6000, 30000, '2022-02-10 09:09:08', 0, 0),
(66, 47, 0, 28, 40, 2, 3000, 6000, '2022-02-13 13:59:14', 0, 0),
(67, 47, 0, 128, 40, 2, 10900, 21800, '2022-02-13 13:59:14', 0, 0),
(68, 47, 0, 131, 40, 3, 5000, 15000, '2022-02-13 13:59:14', 0, 0),
(69, 0, 24, 145, 0, 5, 8800, 44000, '2022-02-14 09:00:56', 0, 0),
(70, 0, 25, 65, 0, 2, 2900, 5800, '2022-02-15 11:18:13', 0, 0),
(71, 0, 26, 13, 34, 1, 6000, 6000, '2022-02-15 11:34:08', 0, 0),
(72, 0, 27, 65, 34, 1, 2900, 2900, '2022-02-15 11:34:08', 0, 0),
(73, 0, 28, 14, 34, 3, 6700, 20100, '2022-02-15 11:34:08', 0, 0),
(74, 0, 29, 30, 0, 2, 3500, 7000, '2022-02-15 11:37:56', 0, 0),
(75, 0, 30, 135, 0, 2, 34500, 69000, '2022-02-15 11:37:56', 0, 0),
(76, 0, 31, 60, 0, 2, 15500, 31000, '2022-02-15 13:09:34', 0, 0),
(77, 0, 32, 14, 0, 1, 6700, 6700, '2022-02-15 13:09:34', 0, 0),
(78, 0, 33, 145, 0, 3, 8800, 26400, '2022-02-15 13:09:34', 0, 0),
(79, 0, 34, 37, 0, 2, 3000, 6000, '2022-02-15 13:17:56', 0, 0),
(80, 0, 35, 135, 0, 2, 34500, 69000, '2022-02-15 13:17:56', 0, 0),
(81, 0, 36, 14, 0, 2, 6700, 13400, '2022-02-15 13:33:45', 0, 0),
(82, 0, 37, 60, 0, 1, 15500, 15500, '2022-02-15 13:33:45', 0, 0),
(83, 0, 38, 65, 0, 2, 2900, 5800, '2022-02-15 13:33:45', 0, 0),
(84, 0, 39, 37, 34, 1, 3000, 3000, '2022-02-15 14:02:05', 0, 0),
(85, 0, 40, 26, 34, 1, 10500, 10500, '2022-02-15 14:04:42', 0, 0),
(86, 0, 41, 121, 34, 1, 4500, 4500, '2022-02-15 14:04:42', 0, 0),
(87, 0, 42, 28, 34, 1, 3000, 3000, '2022-02-15 14:04:42', 0, 0),
(88, 0, 43, 146, 0, 5, 10800, 54000, '2022-02-15 15:03:21', 0, 0),
(89, 0, 44, 145, 0, 2, 8800, 17600, '2022-02-15 15:03:21', 0, 0),
(90, 0, 45, 14, 0, 2, 6700, 13400, '2022-02-15 15:03:21', 0, 0),
(91, 0, 46, 148, 0, 1, 6300, 6300, '2022-02-15 15:06:07', 0, 0),
(92, 0, 47, 65, 0, 1, 2900, 2900, '2022-02-15 15:06:07', 0, 0),
(93, 0, 48, 145, 0, 1, 8800, 8800, '2022-02-15 15:06:07', 0, 0),
(94, 0, 49, 145, 0, 8, 8800, 70400, '2022-02-15 15:15:51', 0, 0),
(95, 0, 50, 146, 0, 5, 10800, 54000, '2022-02-15 15:15:51', 0, 0),
(96, 0, 51, 148, 0, 4, 6300, 25200, '2022-02-15 15:15:51', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `bank`
--

CREATE TABLE `bank` (
  `BANK_ID` int(11) NOT NULL,
  `BANK_NAME` varchar(200) NOT NULL,
  `BANK_NUMERO` varchar(200) NOT NULL,
  `BANK_PROPRIETAIRE` varchar(200) DEFAULT NULL,
  `STATUT_SYNC` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bank`
--

INSERT INTO `bank` (`BANK_ID`, `BANK_NAME`, `BANK_NUMERO`, `BANK_PROPRIETAIRE`, `STATUT_SYNC`) VALUES
(1, 'FINBANK', '10033561011', 'Chez Pablo Moses', 0),
(2, 'KCB', '6690550249', 'Chez Pablo', 0),
(3, 'BCB', '10002', '', 0),
(4, 'IBB', '10003', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `CATEGORIE_ID` int(11) NOT NULL,
  `CATEGORIE_DESCR` varchar(200) NOT NULL,
  `CATEGORIE_IMAGE` varchar(300) NOT NULL,
  `STATUT_SYNC` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`CATEGORIE_ID`, `CATEGORIE_DESCR`, `CATEGORIE_IMAGE`, `STATUT_SYNC`) VALUES
(3, 'Produits d’épicerie', 'uploads/categorie/canned-goods-row-tinned-food-product-stuff-preserved-supplied-sealed-can-vector-flat-style-cartoon-illustration-isolated-109145727.jpg', 0),
(7, 'Produits vivriers', 'uploads/categorie/VIVRE.jpg', 0),
(8, 'Fruits et Légumes', 'uploads/categorie/Many-kinds-of-vegetables-and-fruits-white-background_m.jpg', 0),
(9, 'Menage', 'uploads/categorie/images_(45)1.jpg', 0),
(10, 'Laits,The,Cafe', 'uploads/categorie/CA.jpg', 0),
(11, 'Article de toilette', 'uploads/categorie/WB149174510_1.jpeg', 0),
(13, 'Produits diétetique', 'uploads/categorie/images_(19).jpg', 0),
(14, 'Boissons non alcoolisées', 'uploads/categorie/211015-boissons-gazeuses.jpg', 0),
(15, 'Boisson Alcoolisées', 'uploads/categorie/boissons-alcoolisées.jpg', 0),
(16, 'Produits du petit Déjeuner', 'uploads/categorie/i110419-pate-a-tartiner-choco-noisettes-au-thermomix.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `COMMANDE_ID` int(11) NOT NULL,
  `MODE_PAIEMENT_ID` int(11) NOT NULL,
  `BANK_ID` int(11) DEFAULT NULL,
  `MOBILE_ID` int(11) DEFAULT NULL,
  `CASH` int(11) DEFAULT NULL,
  `MONTANT_CLIENT` int(11) DEFAULT NULL,
  `FRAIS_DE_TRANSFAIRE` int(11) DEFAULT NULL,
  `USER_ID` int(11) NOT NULL,
  `TELEPHONE` int(11) NOT NULL,
  `DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `MODE_DE_CONFIRMATION` varchar(200) DEFAULT NULL,
  `ADRESSE_DE_CONFIRMATION` varchar(200) DEFAULT NULL,
  `FRAIS_DE_TRANSPORT` int(11) DEFAULT NULL,
  `MODE_RECUPERATION` varchar(250) DEFAULT NULL,
  `DESTINATION_LIVRAISON` int(11) DEFAULT NULL,
  `ADRESSE_LIVAISON` varchar(300) DEFAULT NULL,
  `CONTACT_LIVRAISON` int(11) DEFAULT NULL,
  `REFERENCE` varchar(200) NOT NULL,
  `STATUT` int(11) NOT NULL DEFAULT '0',
  `STATUT_LIVRAISON` varchar(200) NOT NULL DEFAULT 'Non livré',
  `STATUT_SYNC` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `ID_FACTURE` int(11) NOT NULL,
  `ID_CLIENT` int(11) NOT NULL,
  `DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CONSOMMATION_POINT` int(11) NOT NULL,
  `STATUT_SYNC` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`ID_FACTURE`, `ID_CLIENT`, `DATE`, `CONSOMMATION_POINT`, `STATUT_SYNC`) VALUES
(1, 4, '2020-11-01 20:08:01', 0, 0),
(2, 20, '2022-01-30 17:11:08', 0, 0),
(3, 20, '2022-01-30 17:23:53', 0, 0),
(4, 20, '2022-01-30 17:39:31', 0, 0),
(5, 20, '2022-01-30 17:56:53', 0, 0),
(6, 20, '2022-02-06 18:23:16', 0, 0),
(7, 20, '2022-02-07 10:20:57', 0, 0),
(8, 0, '2022-02-08 10:14:24', 0, 0),
(9, 0, '2022-02-08 10:21:54', 0, 0),
(10, 29, '2022-02-08 10:28:01', 0, 0),
(11, 29, '2022-02-09 08:48:13', 0, 0),
(12, 0, '2022-02-14 09:00:56', 0, 0),
(13, 0, '2022-02-15 11:18:13', 0, 0),
(14, 34, '2022-02-15 11:34:08', 0, 0),
(15, 0, '2022-02-15 11:37:56', 0, 0),
(16, 0, '2022-02-15 13:09:34', 0, 0),
(17, 0, '2022-02-15 13:17:56', 0, 0),
(18, 0, '2022-02-15 13:33:45', 0, 0),
(19, 34, '2022-02-15 14:02:05', 0, 0),
(20, 34, '2022-02-15 14:04:42', 0, 0),
(21, 0, '2022-02-15 15:03:21', 0, 0),
(22, 0, '2022-02-15 15:06:07', 0, 0),
(23, 0, '2022-02-15 15:15:51', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `frais_de_retrait`
--

CREATE TABLE `frais_de_retrait` (
  `ID` int(11) NOT NULL,
  `MAKE` int(11) NOT NULL,
  `MENSHI` int(11) NOT NULL,
  `ECOCASH` int(11) NOT NULL,
  `LUMICASH` int(11) NOT NULL,
  `SMARTPESA` int(11) NOT NULL,
  `STATUT_SYNC` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `frais_de_retrait`
--

INSERT INTO `frais_de_retrait` (`ID`, `MAKE`, `MENSHI`, `ECOCASH`, `LUMICASH`, `SMARTPESA`, `STATUT_SYNC`) VALUES
(1, 500, 999, 0, 0, 0, 0),
(2, 1000, 2500, 190, 200, 0, 0),
(3, 2501, 5000, 250, 270, 0, 0),
(4, 5001, 10000, 380, 400, 0, 0),
(5, 10001, 15000, 500, 520, 0, 0),
(6, 15001, 20000, 620, 650, 0, 0),
(7, 20001, 30000, 810, 850, 0, 0),
(8, 30001, 45000, 1050, 1100, 0, 0),
(9, 45001, 60000, 1290, 1350, 0, 0),
(10, 60001, 75000, 1710, 1800, 0, 0),
(11, 75001, 100000, 1900, 2000, 0, 0),
(12, 100001, 150000, 2430, 2550, 0, 0),
(13, 150001, 200000, 2900, 3050, 0, 0),
(14, 200001, 300000, 3900, 4100, 0, 0),
(15, 300001, 400000, 4370, 4600, 0, 0),
(16, 400001, 500000, 5610, 5900, 0, 0),
(17, 500001, 1000000, 8550, 9000, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `mobile_money`
--

CREATE TABLE `mobile_money` (
  `MOBILE_ID` int(11) NOT NULL,
  `MOBILE_NAME` varchar(50) NOT NULL,
  `MOBILE_IMAGE` varchar(300) NOT NULL,
  `TELEPHONE` varchar(50) NOT NULL,
  `NOM` varchar(50) NOT NULL,
  `STATUT_SYNC` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mobile_money`
--

INSERT INTO `mobile_money` (`MOBILE_ID`, `MOBILE_NAME`, `MOBILE_IMAGE`, `TELEPHONE`, `NOM`, `STATUT_SYNC`) VALUES
(1, 'LUMICASH', 'uploads/Systeme/lumitel.jpg', '68681212', 'Chez pablo', 0),
(2, 'ECOCASH', 'uploads/Systeme/ecocash.jpg', '79000000', 'Chez pablo', 0),
(3, 'SMART PESA', 'uploads/Systeme/pesaflash.jpg', '75000000', 'Chez pablo', 0);

-- --------------------------------------------------------

--
-- Structure de la table `mode_de_paiement`
--

CREATE TABLE `mode_de_paiement` (
  `MODE_ID` int(11) NOT NULL,
  `MODE_DESCRIPTION` varchar(200) NOT NULL,
  `STATUT_SYNC` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mode_de_paiement`
--

INSERT INTO `mode_de_paiement` (`MODE_ID`, `MODE_DESCRIPTION`, `STATUT_SYNC`) VALUES
(1, 'Mobile Money', 0),
(2, 'Virement bancaire', 0),
(3, 'cash', 0),
(4, 'Chéque', 0);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `PRODUIT_ID` int(11) NOT NULL,
  `PRODUIT_DESCR` varchar(200) NOT NULL,
  `PRODUIT_PRIX` int(11) NOT NULL,
  `PRODUIT_UNITE_MESURE` varchar(30) DEFAULT NULL,
  `PRODUIT_IMAGE` varchar(300) NOT NULL,
  `CATEGORIE_ID` int(11) NOT NULL,
  `FOR_BONUS` int(11) NOT NULL,
  `PRIX_BONUS` varchar(50) NOT NULL,
  `STOCK_MINIMUM` varchar(50) NOT NULL,
  `STATUT_SYNC` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`PRODUIT_ID`, `PRODUIT_DESCR`, `PRODUIT_PRIX`, `PRODUIT_UNITE_MESURE`, `PRODUIT_IMAGE`, `CATEGORIE_ID`, `FOR_BONUS`, `PRIX_BONUS`, `STOCK_MINIMUM`, `STATUT_SYNC`) VALUES
(3, 'nido', 35000, NULL, 'uploads/produits/111.jpg', 3, 1, '', '', 0),
(7, 'Spaghetti Spirelli', 3600, 'Piece(s)', 'uploads/produits/spagetti.jpg', 7, 0, '', '10', 0),
(17, 'CERELAC', 0, NULL, 'uploads/produits/cerelac.jpg', 3, 0, '', '', 0),
(18, 'CORNFLAKES', 0, NULL, 'uploads/produits/cornflakes.jpg', 3, 0, '', '', 0),
(19, 'FROMAGE', 0, NULL, 'uploads/produits/fromage.jpg', 3, 0, '', '', 0),
(20, 'MIEL', 0, NULL, 'uploads/produits/miel.jpg', 3, 0, '', '', 0),
(22, 'SEL DE CUISINE', 3000, NULL, 'uploads/produits/sel_de_cuisine.jpg', 3, 0, '', '', 0),
(23, 'SPIRELLI', 0, NULL, 'uploads/produits/spirelli.jpg', 3, 0, '', '', 0),
(24, 'SUCRE', 0, NULL, 'uploads/produits/sucre.jpg', 3, 0, '', '', 0),
(25, 'OEUF ', 0, NULL, 'uploads/produits/savoir-oeuf-frais.jpg', 3, 0, '', '', 0),
(26, 'QUAKER', 10500, NULL, 'uploads/produits/QUAKER-OATS-500G-TIN-HACCP-GMP-ISO.jpg', 3, 0, '', '', 0),
(28, 'CAFE', 3000, NULL, 'uploads/produits/CA.jpg', 10, 0, '', '', 0),
(29, 'THE DES COLLINES DU BURUNDI', 0, NULL, 'uploads/produits/THE_DES_COLINE.jpg', 10, 0, '', '', 0),
(30, 'THE VERT', 3500, NULL, 'uploads/produits/THE_VERT.jpg', 10, 0, '', '', 0),
(31, 'THE OTB', 1000, NULL, 'uploads/produits/OTB.jpg', 10, 0, '', '', 0),
(32, 'FRANCE LAIT', 0, NULL, 'uploads/produits/lait-pour-nourrisson-1-0-6-mois-400-g.jpg', 10, 0, '', '', 0),
(33, 'SUPALAIT', 0, NULL, 'uploads/produits/Supalait_PS.jpg', 10, 0, '', '', 0),
(34, 'LILAC ', 4500, NULL, 'uploads/produits/LAIT_BLUE.jpg', 10, 0, '', '', 0),
(35, 'LILAC', 0, NULL, 'uploads/produits/LAIT_ROUGE.jpg', 10, 0, '', '', 0),
(36, 'NESCAFE', 0, NULL, 'uploads/produits/91F4I5ya-oL._SX425_.jpg', 10, 0, '', '', 0),
(37, 'BIC', 3000, NULL, 'uploads/produits/WB149174510_1.jpeg', 11, 0, '', '', 0),
(38, 'IMPERIAL', 0, NULL, 'uploads/produits/51BJlk-RduL._SY355_1.jpg', 11, 0, '', '', 0),
(39, 'FA', 0, NULL, 'uploads/produits/téléchargement_(15).jpg', 11, 0, '', '', 0),
(40, 'SAVON DETTOL', 0, NULL, 'uploads/produits/savon-anti-bacterien-dettol.jpg', 11, 0, '', '', 0),
(41, 'SAVON DETTOL VERT', 0, NULL, 'uploads/produits/savon-antibacterien-original-dettol-60g-hypermarche-en-ligne-prix-maroc-mymarket-571.jpg', 11, 0, '', '', 0),
(42, 'PALMOLIVE', 2000, NULL, 'uploads/produits/téléchargement_(16).jpg', 11, 0, '', '', 0),
(43, 'FAMILY', 1800, NULL, 'uploads/produits/FAMILY.jpg', 11, 0, '', '', 0),
(44, 'MUGANGA', 900, 'Piece(s)', 'uploads/produits/MUGANGA1.jpg', 11, 0, '', '11', 0),
(45, 'SHAZA ALOE', 1200, 'Piece(s)', 'uploads/produits/SHAZA1.jpg', 11, 0, '', '12', 0),
(46, 'VIP BABY', 0, NULL, 'uploads/produits/VIP_BABY.jpg', 11, 0, '', '', 0),
(47, 'BEBIKO', 3500, NULL, 'uploads/produits/BEBIKO.jpg', 11, 0, '', '', 0),
(49, 'LOVE MARY', 0, NULL, 'uploads/produits/LOVE_MARY.jpg', 11, 0, '', '', 0),
(50, 'SERVIETTE BONI', 0, NULL, 'uploads/produits/SERVIETTE_BONI.jpg', 11, 0, '', '', 0),
(51, 'FREESTYLE', 0, NULL, 'uploads/produits/FREESTYLE.jpg', 11, 0, '', '', 0),
(52, 'FASHION QUEEN', 0, NULL, 'uploads/produits/FASHION_QUEEN.jpg', 11, 0, '', '', 0),
(53, 'NETTOYANT MULTI USAGE', 4500, NULL, 'uploads/produits/NETTOYANT_MULTI_USAGE.jpg', 11, 0, '', '', 0),
(54, 'PAPIER DE TOILETTE ', 0, 'Piece(s)', 'uploads/produits/FINE1.jpg', 11, 0, '', '10', 0),
(55, ' Dentifrice Whitedent', 5600, 'Piece(s)', 'uploads/produits/WHITEDENT1.jpg', 11, 0, '', '5', 0),
(56, 'DENTIFRICE ALOE', 1200, NULL, 'uploads/produits/ALOE.jpg', 11, 0, '', '', 0),
(57, 'TOMATE', 0, NULL, 'uploads/produits/SOSI_TOMATE.jpg', 7, 0, '', '', 0),
(58, 'OLIVES VERT', 0, NULL, 'uploads/produits/OLIVES_VERT.jpg', 7, 0, '', '', 0),
(59, 'OLIVES NOIR', 0, NULL, 'uploads/produits/OLIVE_NOIR.jpg', 7, 0, '', '', 0),
(60, 'EUROPA', 15500, NULL, 'uploads/produits/EURROPA.jpg', 7, 0, '', '', 0),
(61, 'SUNSEED', 0, NULL, 'uploads/produits/SUNSEED.jpg', 7, 0, '', '', 0),
(62, 'COOKI', 0, NULL, 'uploads/produits/COOKI.jpg', 7, 0, '', '', 0),
(64, 'MOUTARDE EVERYDAY', 5000, NULL, 'uploads/produits/everyday-moutarde-dijon-370gr.jpg', 7, 0, '', '', 0),
(66, 'PATATE DOUCE', 0, NULL, 'uploads/produits/patates-douces.jpg', 7, 0, '', '', 0),
(67, 'BAYGON', 0, NULL, 'uploads/produits/9b002a6f14035ba8c37c072bfc49982bdb3445b4.jpg', 9, 0, '', '', 0),
(68, 'VAGUE', 0, NULL, 'uploads/produits/images_(45).jpg', 9, 0, '', '', 0),
(69, 'Eaux Minerales Aquavie', 0, 'Bouteille(s)', 'uploads/produits/m_portfolio_36.jpg', 14, 0, '', '10', 0),
(70, 'Eaux Mineral Kinju 0,5L', 0, 'Cartons', 'uploads/produits/1596499164_pk.jpg', 14, 0, '', '10', 0),
(71, 'Eaux Mineral TANGA', 0, 'Bouteille(s)', 'uploads/produits/download.jpg', 14, 0, '', '10', 0),
(72, 'Jus de fruits cocktail Everyday', 0, 'Piece(s)', 'uploads/produits/jus-multifruit-everyday-1L-540x540.jpg', 14, 0, '', '10', 0),
(73, 'Jus de pommes Everyday', 0, 'Piece(s)', 'uploads/produits/V0000170359_large.jpg', 14, 0, '', '10', 0),
(74, 'Jus de fruits cocktail FARAGELLO', 0, 'Piece(s)', 'uploads/produits/download_(1).jpg', 14, 0, '', '10', 0),
(75, 'Jus de fruits Gold FARAGELLO', 0, 'Piece(s)', 'uploads/produits/faragello_gold_100_cocktail_nectar_fruit_juice_-_250ml_001.jpg', 14, 0, '', '10', 0),
(76, 'Sirop de grenadine Elite', 0, 'Bouteille(s)', 'uploads/produits/elite.jpg', 14, 0, '', '10', 0),
(77, 'Sirop de grenadine', 0, 'Bouteille(s)', 'uploads/produits/feuillejus.jpg', 14, 0, '', '10', 0),
(78, 'Marakuja Akezamutima', 0, 'Bouteille(s)', 'uploads/produits/feuille_akeza.jpg', 14, 0, '', '10', 0),
(79, 'Ananas(Grands)', 0, 'Piece(s)', 'uploads/produits/des-ananas-photo-d-illustration_6159926.jpg', 8, 0, '', '10', 0),
(80, 'Ananas (Moyen)', 0, 'Piece(s)', 'uploads/produits/33469-0w470h470_Ananas_Frais_Bio.jpg', 8, 0, '', '10', 0),
(81, 'Avocats', 500, 'Piece(s)', 'uploads/produits/download_(19).jpg', 8, 0, '', '10', 0),
(82, 'Avocats(Petits)', 0, 'Piece(s)', 'uploads/produits/images_(10).jpg', 8, 0, '', '10', 0),
(83, 'Bananes(Grands)', 0, 'Piece(s)', 'uploads/produits/10662309.webp', 8, 0, '', '10', 0),
(84, 'Bananas(Petits)', 0, 'Piece(s)', 'uploads/produits/banane-petite-naine.jpg', 8, 0, '', '10', 0),
(85, 'Citrons', 0, 'Piece(s)', 'uploads/produits/citron-vert-lime-1-piece.jpg', 8, 0, '', '10', 0),
(87, 'Mandarine', 0, 'Piece(s)', 'uploads/produits/download_(21).jpg', 8, 0, '', '10', 0),
(88, 'Mangues', 0, 'Piece(s)', 'uploads/produits/mangues.jpg', 8, 0, '', '10', 0),
(89, 'Orange', 0, 'Piece(s)', 'uploads/produits/50913eeb04768a5b1fa9985c16704d96.jpg', 8, 0, '', '10', 0),
(90, 'Papaye(Grandes)', 0, 'Piece(s)', 'uploads/produits/unnamed_(2).jpg', 8, 0, '', '10', 0),
(91, 'Papaye(Moyennes)', 0, 'Piece(s)', 'uploads/produits/download_(22).jpg', 8, 0, '', '10', 0),
(92, 'Pazteques(Grandes)', 0, 'Piece(s)', 'uploads/produits/download_(24).jpg', 8, 0, '', '10', 0),
(93, 'Pazteques(Moyennes)', 0, 'Piece(s)', 'uploads/produits/varietes-pasteques-600x444.jpg', 8, 0, '', '10', 0),
(94, 'Pomme', 0, 'Piece(s)', 'uploads/produits/quels-sont-les-bienfaits-de-la-pomme.jpeg', 8, 0, '', '10', 0),
(95, 'Prune', 0, 'Kg', 'uploads/produits/280px-Prunus_Graf-Althanns-Reneklode.jpg', 8, 0, '', '10', 0),
(96, 'Fruit de la passion', 0, 'Kg', 'uploads/produits/download_(20).jpg', 8, 0, '', '10', 0),
(97, 'Ail', 0, 'Kg', 'uploads/produits/L-ail-les-5-vertus-de-cette-gousse-de-sante.jpg', 8, 0, '', '10', 0),
(98, 'Aubergines', 0, 'Piece(s)', 'uploads/produits/Aubergines-whole-and-sliced-9e79878-scaled.jpg', 8, 0, '', '10', 0),
(99, 'Betteraves', 0, 'Piece(s)', 'uploads/produits/betteraves.jpg', 8, 0, '', '10', 0),
(100, 'Brocoli', 0, 'Piece(s)', 'uploads/produits/download_(11).jpg', 8, 0, '', '10', 0),
(101, 'Carotte', 0, 'Kg', 'uploads/produits/carrots-673184.jpg', 8, 0, '', '10', 0),
(102, 'celeri', 0, 'M', 'uploads/produits/download_(16).jpg', 8, 0, '', '10', 0),
(103, 'Choux', 0, 'Piece(s)', 'uploads/produits/istock_savooikool.jpg', 8, 0, '', '10', 0),
(104, 'Choux-fleur', 0, 'Piece(s)', 'uploads/produits/chou-fleur.jpg', 8, 0, '', '10', 0),
(105, 'Concombre', 2600, 'M', 'uploads/produits/images_(8).jpg', 8, 0, '', '10', 0),
(106, 'Courgette', 0, 'M', 'uploads/produits/download_(13)1.jpg', 8, 0, '', '10', 0),
(107, 'Epinard', 0, 'M', 'uploads/produits/download_(14).jpg', 8, 0, '', '10', 0),
(108, 'Gingembre', 0, 'M', 'uploads/produits/dangers-du-gingembre.jpg', 8, 0, '', '10', 0),
(109, 'Haricot vert', 0, 'M', 'uploads/produits/haricots-verts-vapeur-0.jpg', 8, 0, '', '10', 0),
(110, 'Intore', 0, 'M', 'uploads/produits/Thai-Eggplant.jpg', 8, 0, '', '10', 0),
(111, 'Laitue', 0, 'M', 'uploads/produits/3-3-945x1024.jpg', 8, 0, '', '10', 0),
(112, 'Lengalenga', 0, 'M', 'uploads/produits/png-transparent-green-leafy-vegetable-spinach-amaranthus-viridis-amaranthus-dubius-love-lies-bleeding-chard-amaranth-leaves-leaf-vegetable-food-leaf.png', 8, 0, '', '10', 0),
(113, 'Oignons Blanc', 0, 'Kg', 'uploads/produits/download_(15).jpg', 8, 0, '', '10', 0),
(114, 'Oignons Rouge', 0, 'Kg', 'uploads/produits/fotolia_61211686_subscription_xl-copy.jpg', 8, 0, '', '10', 0),
(115, 'Petit pois', 0, 'Kg', 'uploads/produits/images_(9).jpg', 8, 0, '', '10', 0),
(116, 'Poireaux', 0, 'M', 'uploads/produits/poireau.jpg', 8, 0, '', '10', 0),
(117, 'Poivrons', 0, 'M', 'uploads/produits/67464_w300h300c1cx350cy350.jpg', 8, 0, '', '10', 0),
(118, 'Sombe', 0, 'M', 'uploads/produits/SOMBE_grande.jpg', 8, 0, '', '10', 0),
(119, 'Tomate', 0, 'Kg', 'uploads/produits/tomate-grappe.jpg', 8, 0, '', '10', 0),
(120, 'Bière Bavaria', 4500, 'Bouteille(s)', 'uploads/produits/images_(3).jpg', 15, 0, '', '10', 0),
(121, 'Bière Heineken', 4500, 'Bouteille(s)', 'uploads/produits/images_(5).jpg', 15, 0, '', '10', 0),
(122, 'Vin non alcoolisé', 0, 'Bouteille(s)', 'uploads/produits/images_uuuu.jpg', 15, 0, '', '10', 0),
(123, 'Vin Blanc', 3400, 'Bouteille(s)', 'uploads/produits/download_(5).jpg', 15, 0, '', '10', 0),
(125, 'Vin rouge EL EMPERADOR', 0, 'Bouteille(s)', 'uploads/produits/103440751.jpg', 15, 0, '', '10', 0),
(126, 'Vin rouge SAUVIGNON', 0, 'Bouteille(s)', 'uploads/produits/3175520018716_PHOTOSITE_20200629_170537_01.jpg', 15, 0, '', '10', 0),
(127, 'Essuie tout EVERYDAY', 5000, 'Piece(s)', 'uploads/produits/ESSUIE_TOUT.jpg', 9, 0, '', '10', 0),
(128, 'Feuille en Aluminium', 10900, 'Piece(s)', 'uploads/produits/FEUILLE_D-ALMINIUM.jpg', 9, 0, '', '10', 0),
(130, 'Nettoyant Handwash sain doux', 4800, 'Piece(s)', 'uploads/produits/SAVON_LIQUIDE1.jpg', 9, 0, '', '6', 0),
(131, 'Liquide Vaisselle', 5000, 'Piece(s)', 'uploads/produits/DETERGENT_LIQUIDE.jpg', 9, 0, '', '10', 0),
(132, 'Nettoyant VIM SAVONOR', 0, 'Piece(s)', 'uploads/produits/VIM.jpg', 9, 0, '', '10', 0),
(133, 'Papier mouchoirs EVERYDAY', 800, 'Piece(s)', 'uploads/produits/MOUCHOIRS_EVERYDAY.jpg', 9, 0, '', '10', 0),
(134, 'Papiers serviettes FINE', 2500, 'Piece(s)', 'uploads/produits/SERVIETTE_FINE.jpg', 9, 0, '', '10', 0),
(135, 'Poudre de Lessive ARIEL', 34500, 'Cartons', 'uploads/produits/ARIEL.jpg', 9, 0, '', '10', 0),
(136, 'Savon de lessive GIFURANGUWO ', 700, 'Piece(s)', 'uploads/produits/SAVONOR.jpg', 9, 0, '', '10', 0),
(137, 'Savon de lessive OMO', 0, 'Piece(s)', 'uploads/produits/OMO.jpg', 9, 0, '', '10', 0),
(138, 'Biscuits Fourres', 0, 'Piece(s)', 'uploads/produits/BISCOUTS_FOURRES.jpg', 7, 0, '', '10', 0),
(139, 'Biscuits petit Beurre', 0, 'Piece(s)', 'uploads/produits/PETIT_BEURRE.jpg', 7, 0, '', '10', 0),
(140, 'Huile de Tournesol cooki 1,5L', 0, 'Piece(s)', 'uploads/produits/COOKI_1,5L.jpg', 7, 0, '', '10', 0),
(141, 'Huile de Tournesol cooki 5L', 0, 'Bidon(s)', 'uploads/produits/COOKI1.jpg', 7, 0, '', '10', 0),
(142, 'Huile de Tournesol Royal', 0, 'Bidon(s)', 'uploads/produits/SUNSEED1.jpg', 7, 0, '', '10', 0),
(143, 'Ketchup BONI', 0, 'Piece(s)', 'uploads/produits/TOMATE_KETCHUP1.jpg', 7, 0, '', '10', 0),
(144, 'Maggi Cube', 0, 'Piece(s)', 'uploads/produits/images_(40)1.jpg', 7, 0, '', '10', 0),
(145, 'Maggi Sauce', 8800, 'Piece(s)', 'uploads/produits/71X5ymHpUdL._SX425_.jpg', 7, 0, '', '10', 0),
(146, 'Mayonnaise Culino', 10800, 'Piece(s)', 'uploads/produits/CULINO-mayonnaise-lemon-500-ml.jpg_350x350.jpg', 7, 0, '', '10', 0),
(147, 'Sel de cuisine', 0, 'Piece(s)', 'uploads/produits/sel.jpg', 7, 0, '', '10', 0),
(148, 'Sel de table NEZO', 6300, 'Piece(s)', 'uploads/produits/NEZO.jpg', 7, 0, '', '10', 0),
(149, 'Vinaigre Apple EVERYDAY', 8300, 'Piece(s)', 'uploads/produits/VINAIGRE.jpg', 7, 0, '', '10', 0),
(150, 'Vinaigre ', 0, 'Piece(s)', 'uploads/produits/téléchargement_(14).jpg', 7, 0, '', '10', 0),
(151, 'Mayonnaise Everyday', 8300, 'Piece(s)', 'uploads/produits/images_(41).jpg', 7, 0, '', '10', 0),
(152, 'Bananes plantins', 0, 'M', 'uploads/produits/banane-plantain-legumes-bonduelle-e1478531950564.png', 7, 0, '', '10', 0),
(153, 'Bananes vertes', 0, 'M', 'uploads/produits/download_(6).jpg', 7, 0, '', '10', 0),
(154, 'Farine de Blé', 0, 'Kg', 'uploads/produits/top_10_des_farines_670.jpg', 7, 0, '', '10', 0),
(155, 'Farine de Maïs', 0, 'Kg', 'uploads/produits/corn-flour-500x500.jpg', 7, 0, '', '10', 0),
(156, 'Farine de Manioc', 0, 'Kg', 'uploads/produits/11c11e8580c4662be3bd0a08e8a32f6d.jpg', 7, 0, '', '10', 0),
(157, 'Farine de soja', 0, 'Kg', 'uploads/produits/Hde7d093fd572435d99f13c290edd2052A.jpg_350x350.jpg', 7, 0, '', '10', 0),
(158, 'Farine de sorgho', 0, 'Kg', 'uploads/produits/images_(6).jpg', 7, 0, '', '10', 0),
(159, 'Haricot jaune', 0, 'Kg', 'uploads/produits/yellow-beans.png', 7, 0, '', '10', 0),
(160, 'Haricot kinure', 0, 'Kg', 'uploads/produits/beans-557268_960_720.jpg', 7, 0, '', '10', 0),
(161, 'Haricot Kirundo', 0, 'Kg', 'uploads/produits/download_(8).jpg', 7, 0, '', '10', 0),
(162, 'Manioc', 0, 'Kg', 'uploads/produits/man--1592212734.jpg', 7, 0, '', '10', 0),
(163, 'Patate douce', 0, 'Kg', 'uploads/produits/10660236.webp', 7, 0, '', '10', 0),
(164, 'Pomme de terre Kijumbu', 0, 'Kg', 'uploads/produits/106602361.webp', 7, 0, '', '10', 0),
(165, 'Pomme de terre Mauve', 0, 'Kg', 'uploads/produits/08431_0371_pomme_de_terre.jpg', 7, 0, '', '10', 0),
(166, 'Riz Buryohe', 0, 'Kg', 'uploads/produits/5dc28afee7cf4_riz_1-1207845.jpg', 7, 0, '', '10', 0),
(167, 'Riz tanzania', 0, 'Kg', 'uploads/produits/arsenic-riz-800x445.jpg', 7, 0, '', '10', 0),
(168, 'Riz tanzanie', 0, 'Kg', 'uploads/produits/tout-savoir-sur-le-riz.jpeg', 7, 0, '', '10', 0),
(169, 'Riz zambie', 0, 'Kg', 'uploads/produits/riz-blanc-asie-coronavirus-1.jpg', 7, 0, '', '10', 0),
(170, 'Café Nescafé 100 gr', 0, 'Piece(s)', 'uploads/produits/91F4I5ya-oL._SX425_1.jpg', 16, 0, '', '10', 0),
(171, 'Céréale porrige Quaker', 0, 'Piece(s)', 'uploads/produits/QUAKER-OATS-500G-TIN-HACCP-GMP-ISO1.jpg', 16, 0, '', '10', 0),
(172, 'Confitures de fraises Everyday 700gr', 12000, 'Piece(s)', 'uploads/produits/ccc1.jpg', 16, 0, '', '10', 0),
(173, 'Confitures 4 fruits Everyday 450 gr', 6800, 'Piece(s)', 'uploads/produits/ccc2.jpg', 16, 0, '', '10', 0),
(174, 'Lait Nido 400gr', 27500, 'Piece(s)', 'uploads/produits/images_(1).jpg', 16, 0, '', '10', 0),
(175, 'Lait Supalait 400 gr', 13500, 'Casier(s)', 'uploads/produits/Supalait_PS1.jpg', 16, 0, '', '10', 0),
(176, 'Margarine BleuBand 100gr', 2100, 'Piece(s)', 'uploads/produits/BLUE_BAND.jpg', 16, 0, '', '10', 0),
(177, 'Margarine BleuBand 250 gr', 4000, 'Piece(s)', 'uploads/produits/BLUE_BAND1.jpg', 16, 0, '', '10', 0),
(178, 'Margarine BleuBand 500 gr', 6700, 'Piece(s)', 'uploads/produits/BLUE_BAND2.jpg', 16, 0, '', '10', 0),
(179, 'Margarine Prestige 250gr', 3500, 'Piece(s)', 'uploads/produits/Prestige-margarine-250g1.jpg', 16, 0, '', '10', 0),
(180, 'Miel 450 gr', 0, 'Piece(s)', 'uploads/produits/miel1.jpg', 16, 0, '', '10', 0),
(181, 'Pate a tartiner Jempy 400gr', 6700, 'Piece(s)', 'uploads/produits/eeee1.jpg', 16, 0, '', '10', 0),
(182, 'The Noir 200gr OTB', 1700, 'Piece(s)', 'uploads/produits/OTB1.jpg', 16, 0, '', '10', 0),
(183, 'Thé vert', 0, 'Piece(s)', 'uploads/produits/THE_VERT1.jpg', 16, 0, '', '10', 0),
(184, 'Maggy cube', 0, 'Piece(s)', 'uploads/produits/images_(40).jpg', 3, 0, '', '10', 0),
(185, 'Maggy sauce', 0, 'Piece(s)', 'uploads/produits/71X5ymHpUdL._SX425_1.jpg', 3, 0, '', '10', 0),
(186, 'Mayonnaise Everyday 370gr', 0, 'Piece(s)', 'uploads/produits/MAYONAISE_CULINO.jpg', 3, 0, '', '10', 0),
(187, 'Mayonnaise Everyday 470gr', 0, 'Piece(s)', 'uploads/produits/MAYONAISE.jpg', 3, 0, '', '10', 0),
(188, 'Moutarde Everyday 370gr', 0, 'Piece(s)', 'uploads/produits/everyday-moutarde-dijon-370gr1.jpg', 3, 0, '', '10', 0),
(189, 'Spaghetti Santa lucia', 0, 'Piece(s)', 'uploads/produits/spagetti1.jpg', 3, 0, '', '5', 0),
(190, 'Sardines Any', 2900, 'Piece(s)', 'uploads/produits/ANNY1.jpg', 3, 0, '', '5', 0),
(191, 'Sauce Tomates Salsa', 0, 'Piece(s)', 'uploads/produits/SOSI_TOMATE1.jpg', 3, 0, '', '10', 0),
(192, 'Sel de cuisine en vrac', 0, 'Piece(s)', 'uploads/produits/UMUNYU.jpg', 3, 0, '', '10', 0),
(193, 'Sel de table  Nezo', 0, 'Piece(s)', 'uploads/produits/NEZO1.jpg', 3, 0, '', '10', 0),
(194, 'Vinaigre Everyday', 0, 'Piece(s)', 'uploads/produits/VINAIGRE1.jpg', 3, 0, '', '10', 0),
(195, 'Nettoyant Multi usage', 4500, 'Piece(s)', 'uploads/produits/NETTOYANT_MULTI_USAGE1.jpg', 9, 0, '', '10', 0),
(196, 'Margarine Prestige 500 gr', 6700, 'Piece(s)', 'uploads/produits/Prestige-margarine500g1.jpg', 16, 0, '', '5', 0),
(197, 'Beur d\'archides Crunchy', 6000, 'Piece(s)', 'uploads/produits/arachide.jpg', 16, 0, '', '5', 0),
(198, 'Essuie tout ', 5000, 'Piece(s)', 'uploads/produits/ESSUIE_TOUT1.jpg', 9, 0, '', '6', 0);

-- --------------------------------------------------------

--
-- Structure de la table `produit_commande`
--

CREATE TABLE `produit_commande` (
  `PRODUIT_COMMANDE_ID` int(11) NOT NULL,
  `COMMANDE_ID` int(11) NOT NULL,
  `PRODUIT_ID` int(11) NOT NULL,
  `QUANTITE` int(11) NOT NULL,
  `PRIX_UNITAIRE` int(11) NOT NULL,
  `PRIX_TOTAL` int(11) NOT NULL,
  `BONUS` int(11) NOT NULL,
  `STATUT_SYNC` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `profiles_users`
--

CREATE TABLE `profiles_users` (
  `PROFILE_ID` int(11) NOT NULL,
  `DESCRIPTION_PROFILE` varchar(100) NOT NULL,
  `STATUT_SYNC` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `profiles_users`
--

INSERT INTO `profiles_users` (`PROFILE_ID`, `DESCRIPTION_PROFILE`, `STATUT_SYNC`) VALUES
(1, 'ADMIN', 0),
(2, 'ADMIN SECONDAIRE', 0),
(3, 'CLIENT', 0);

-- --------------------------------------------------------

--
-- Structure de la table `qr_code_requisition`
--

CREATE TABLE `qr_code_requisition` (
  `ID_QR_CODE` int(11) NOT NULL,
  `ID_REQUISITION` int(11) NOT NULL,
  `QR_CODE` varchar(200) NOT NULL,
  `STATUT_SYNC` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `qr_code_requisition`
--

INSERT INTO `qr_code_requisition` (`ID_QR_CODE`, `ID_REQUISITION`, `QR_CODE`, `STATUT_SYNC`) VALUES
(5, 8, '1643348745-0', 0),
(6, 8, '1643348745-1', 0),
(7, 9, '1643348745-5', 0),
(8, 9, '1643348745-4', 0),
(9, 10, '1602496249-41', 0),
(10, 11, '1643348745-11', 0),
(11, 12, '1602496248-35', 0),
(12, 13, '1602496249-42', 0),
(13, 14, '1602496249-49', 0),
(14, 15, '1602496249-56', 0),
(15, 16, '1643348745-9', 0),
(16, 17, '1602496248-36', 0),
(17, 18, '1643348745-80', 0),
(18, 18, '1643348745-74', 0),
(19, 19, '5410228154693', 0),
(20, 20, '6164004676235', 0),
(21, 21, '1643348745-54', 0),
(22, 22, '1643348745-52', 0),
(23, 22, '1643348745-50', 0),
(24, 22, '1643348745-64', 0),
(25, 23, '1643348745-71', 0),
(26, 23, '1643348745-68', 0),
(27, 23, '1643348745-67', 0),
(28, 23, '1643348745-72', 0),
(29, 24, '1643348745-22', 0),
(30, 25, '1643348745-37', 0),
(31, 25, '1643348745-41', 0),
(32, 26, '1643348745-25', 0),
(33, 26, '1643348745-26', 0),
(34, 27, '1643348745-30', 0),
(35, 27, '1643348745-32', 0),
(36, 28, '1644398588°220', 0),
(37, 28, '1644398588°263', 0),
(38, 28, '1644398588°266', 0),
(39, 28, '1644398588°233', 0),
(40, 29, '1644398588°244', 0),
(41, 29, '1644398588°235', 0),
(42, 29, '1644398588°225', 0),
(43, 29, '1644398588°240', 0),
(44, 29, '1644398588°236', 0),
(45, 29, '1644398588°222', 0),
(46, 29, '1644398588°241', 0),
(47, 29, '1644398588°216', 0),
(48, 29, '1644398588°229', 0),
(49, 29, '1644398588°228', 0),
(50, 30, '1644398587°189', 0),
(51, 30, '1644398587°192', 0),
(52, 30, '1644398587°184', 0),
(53, 30, '1644398587°187', 0),
(54, 31, '1644398588°218', 0),
(55, 31, '1644398588°247', 0),
(56, 31, '1644398588°265', 0),
(57, 31, '1644398588°232', 0),
(58, 31, '1644398588°259', 0),
(59, 31, '1644398588°231', 0),
(60, 32, '1644398587°136', 0),
(61, 32, '1644398587°145', 0),
(62, 32, '1644398587°153', 0),
(63, 32, '1644398587°160', 0),
(64, 32, '1644398587°179', 0),
(65, 32, '1644398587°178', 0),
(66, 32, '1644398587°141', 0),
(67, 32, '1644398587°171', 0),
(68, 32, '1644398586°115', 0),
(69, 32, '1644398587°170', 0),
(76, 34, '1644480823-195', 0),
(77, 34, '1644480824-242', 0),
(78, 34, '1644480825-348', 0),
(79, 34, '1644480825-349', 0),
(80, 34, '1644480824-251', 0),
(81, 34, '1644480825-352', 0),
(82, 35, '1644398587-154', 0),
(83, 35, '1644398587-168', 0),
(84, 35, '1644398587-143', 0),
(85, 35, '1644398586-114', 0),
(86, 35, '1644398587-172', 0),
(87, 35, '1644398587-121', 0),
(88, 36, '1644480824-221', 0),
(89, 36, '1644480825-284', 0),
(90, 36, '1644480826-368', 0),
(91, 36, '1644480825-309', 0),
(92, 36, '1644480824-261', 0),
(93, 36, '1644480824-227', 0),
(119, 38, '1644398586-40', 0),
(120, 38, '1644398586-39', 0),
(121, 38, '1644398586-57', 0),
(122, 38, '1644398586-52', 0),
(123, 38, '1644398586-43', 0),
(124, 38, '1644398586-68', 0),
(125, 39, '1644398586-45', 0),
(126, 39, '1644398586-77', 0),
(127, 39, '1644398585-26', 0),
(128, 39, '1644398586-61', 0),
(129, 39, '1644398586-59', 0),
(130, 39, '1644398586-65', 0),
(205, 48, '&-\'\'\'_à_é&)&è', 0),
(206, 48, '&-\'\'\'_à_é&)éç', 0),
(207, 48, '&-\'\'\'_à_é\")&çà', 0),
(208, 48, '&-\'\'\'_à_éé)&&ç', 0),
(209, 48, '&-\'\'\'_à_é&)é(', 0),
(210, 48, '&-\'\'\'_à_é&)\"é', 0),
(211, 48, '&-\'\'\'_à_é\')éàç', 0),
(212, 48, '&-\'\'\'_à_é\')éàé', 0),
(213, 48, '&-\'\'\'_à_éé)-\'', 0),
(214, 48, '&-\'\'\'_à_é&)&(', 0),
(215, 48, '&-\'\'\'_à_é\")&(è', 0),
(216, 48, '&-\'\'\'_à_éé)&à(', 0),
(217, 49, '&-\'\'\"ç_(_-)_é', 0),
(218, 49, '&-\'\'\"ç_(_-)èç', 0),
(219, 49, '&-\'\'\"ç_(_è)&\'é', 0),
(220, 49, '&-\'\'\"ç_(_()é', 0),
(221, 49, '&-\'\'\"ç_(_è)&é\'', 0),
(222, 49, '&-\'\'\"ç_(_()éà', 0),
(223, 50, '&-\'\'\'_à_é-)\'&_', 0),
(224, 50, '&-\'\'\'_à_é-)\"_\'', 0),
(225, 50, '&-\'\'\'_à_é\')éè\'', 0),
(226, 50, '&-\'\'\"ç_(_-)((', 0),
(227, 50, '&-\'\'\"ç_(_-)-\"', 0),
(228, 50, '&-\'\'\'_à_é\')é&-', 0),
(229, 50, '&-\'\'\'_à_é()é_à', 0),
(230, 50, '&-\'\'\"ç_(_-)è-', 0),
(231, 50, '&-\'\'\"ç_(_-)\"é', 0),
(232, 50, '&-\'\'\'_à_é-)\"_&', 0),
(233, 50, '&-\'\'\'_à_é-)\"-\"', 0),
(234, 50, '&-\'\'\"ç_(_-)(_', 0),
(235, 51, '&-\'\'\'_à_é\")&--', 0),
(236, 51, '&-\'\'\'_à_éé)&&-', 0),
(237, 51, '&-\'\'\'_à_é()\"&_', 0),
(238, 51, '&-\'\'\'_à_é\')é(-', 0),
(239, 51, '&-\'\'\'_à_é\")&\"-', 0),
(240, 52, '1644398587-174', 0),
(241, 52, '1644398586-99', 0),
(242, 52, '1644398587-122', 0),
(243, 52, '1644398587-147', 0),
(244, 52, '1644398585-19', 0),
(245, 52, '1644398587-128', 0),
(246, 52, '1644398585-21', 0),
(247, 52, '1644398587-175', 0),
(248, 52, '1644398587-137', 0),
(249, 52, '1644398586-104', 0),
(250, 52, '1644398587-134', 0),
(251, 52, '1644398585-23', 0),
(252, 53, '1644398587-157', 0),
(253, 53, '1644398586-94', 0),
(254, 53, '1644398585-14', 0),
(255, 53, '1644398585-16', 0),
(256, 53, '1644398585-8', 0),
(257, 53, '1644398585-22', 0),
(258, 53, '1644398586-118', 0),
(259, 53, '1644398585-11', 0),
(260, 53, '1644398586-103', 0),
(261, 54, '1644480821-18', 0),
(262, 54, '1644480821-34', 0),
(263, 54, '1644480822-56', 0),
(264, 54, '1644480822-71', 0),
(265, 54, '1644480822-73', 0),
(266, 54, '1644480821-46', 0),
(267, 54, '1644480823-169', 0),
(268, 54, '1644480822-109', 0),
(269, 54, '1644480821-44', 0),
(270, 54, '1644480821-4', 0),
(271, 54, '1644480821-41', 0),
(272, 54, '1644480823-163', 0),
(273, 54, '1644480821-37', 0),
(274, 54, '1644480822-114', 0),
(275, 54, '1644480823-137', 0),
(276, 54, '1644480822-94', 0),
(277, 54, '1644480822-121', 0),
(278, 54, '1644480822-87', 0),
(279, 54, '1644480823-127', 0),
(280, 54, '1644480822-57', 0),
(281, 54, '1644480821-13', 0),
(282, 54, '1644480822-108', 0),
(283, 54, '1644480821-40', 0),
(284, 54, '1644480821-27', 0),
(285, 54, '1644480823-160', 0),
(286, 55, '1644398586-110', 0),
(287, 55, '1644398586-100', 0),
(288, 55, '1644398586-93', 0),
(289, 55, '1644398587-176', 0),
(290, 55, '1644398586-80', 0),
(291, 55, '1644398587-133', 0),
(292, 56, '1644398586-117', 0),
(293, 56, '1644398585-10', 0),
(294, 56, '1644398585-0', 0),
(295, 56, '1644398585-7', 0),
(296, 56, '1644398585-13', 0),
(297, 56, '1644398586-54', 0),
(298, 57, '1644480821-20', 0),
(299, 57, '1644480822-99', 0),
(300, 57, '1644480822-106', 0),
(301, 57, '1644480821-43', 0),
(302, 57, '1644480822-118', 0),
(303, 57, '1644480823-145', 0),
(304, 58, '1644480823-192', 0),
(305, 58, '1644480825-346', 0),
(306, 58, '1644480823-141', 0),
(307, 58, '1644480822-53', 0),
(308, 58, '1644480821-12', 0),
(309, 59, '1644480823-170', 0),
(310, 59, '1644480825-298', 0),
(311, 59, '1644480821-28', 0),
(312, 60, '1644398586-62', 0),
(313, 60, '1644398586-44', 0),
(314, 60, '1644398586-33', 0),
(315, 60, '1644398586-46', 0),
(316, 60, '1644398585-28', 0),
(317, 60, '1644398586-53', 0),
(318, 60, '1644398586-67', 0),
(319, 60, '1644398586-51', 0),
(320, 60, '1644398585-25', 0),
(321, 60, '1644398586-31', 0),
(322, 61, '1644398586-41', 0),
(323, 61, '1644398586-47', 0),
(324, 61, '1644398586-29', 0),
(325, 61, '1644398586-69', 0),
(326, 61, '1644398586-64', 0),
(327, 61, '1644398586-35', 0),
(328, 62, '1644398586-70', 0),
(329, 62, '1644398586-38', 0),
(330, 62, '1644398585-27', 0),
(331, 62, '1644398586-74', 0),
(332, 62, '1644398586-56', 0),
(333, 63, '1644398586-96', 0),
(334, 63, '1644398587-140', 0),
(335, 63, '1644398587-146', 0),
(336, 63, '1644398586-98', 0),
(337, 63, '1644398586-111', 0),
(338, 63, '1644398587-129', 0),
(339, 64, '1644480824-234', 0),
(340, 64, '1644480822-58', 0),
(341, 65, '1644480823-165', 0),
(342, 65, '1644480822-70', 0),
(343, 65, '1644480822-91', 0),
(344, 65, '1644480822-111', 0),
(345, 65, '1644480822-96', 0),
(346, 65, '1644480822-101', 0),
(347, 65, '1644480821-21', 0),
(348, 66, '', 0),
(349, 67, '', 0),
(350, 68, '', 0),
(351, 69, '', 0),
(352, 70, '', 0),
(353, 71, '', 0),
(354, 72, '', 0),
(355, 73, '', 0),
(356, 74, '', 0),
(357, 75, '', 0),
(358, 76, '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `quartier_de_distribution`
--

CREATE TABLE `quartier_de_distribution` (
  `QUARTEIR_ID` int(11) NOT NULL,
  `QUARTIER_NOM` varchar(200) NOT NULL,
  `QUARTIER_COUT` int(11) NOT NULL,
  `STATUT_SYNC` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `quartier_de_distribution`
--

INSERT INTO `quartier_de_distribution` (`QUARTEIR_ID`, `QUARTIER_NOM`, `QUARTIER_COUT`, `STATUT_SYNC`) VALUES
(1, 'CENTRE VILLE', 0, 0),
(2, 'QUARTIER INSS', 0, 0),
(3, 'ROHEROI', 0, 0),
(4, 'ROHEROII', 0, 0),
(5, 'BUYENZI', 2000, 0),
(6, 'BWIZA', 2000, 0),
(7, 'CIBITOKE', 2000, 0),
(8, 'KABONDO', 2000, 0),
(9, 'KIRIRI', 2000, 0),
(10, 'QUARTIER ASIATIQUE', 2000, 0),
(11, 'MUTANGA SUD', 2000, 0),
(12, 'NYAKABIGA', 2000, 0),
(13, 'SORSREZO', 2000, 0),
(14, 'GASEKEBUYE', 4000, 0),
(15, 'GIHOSHA', 4000, 0),
(16, 'KIBENGA', 4000, 0),
(17, 'KIGOBE', 4000, 0),
(18, 'KININDO', 4000, 0),
(19, 'MUSAGA', 4000, 0),
(20, 'MUTANGA NORD', 2000, 0),
(21, 'NGAGARA', 4000, 0);

-- --------------------------------------------------------

--
-- Structure de la table `requisition`
--

CREATE TABLE `requisition` (
  `ID_REQUISITION` int(11) NOT NULL,
  `PRODUIT_ID` int(11) NOT NULL,
  `NOMBRE` int(11) NOT NULL,
  `PA_UNITAIRE` int(11) NOT NULL,
  `PV_UNITAIRE` int(11) NOT NULL,
  `PEREMPRION` date NOT NULL,
  `DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `USER_ID` int(11) NOT NULL,
  `STATUT_SYNC` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `requisition`
--

INSERT INTO `requisition` (`ID_REQUISITION`, `PRODUIT_ID`, `NOMBRE`, `PA_UNITAIRE`, `PV_UNITAIRE`, `PEREMPRION`, `DATE`, `USER_ID`, `STATUT_SYNC`) VALUES
(8, 12, 2, 45000, 45550, '2022-02-05', '2022-01-30 17:02:28', 1, 0),
(9, 55, 2, 5000, 5500, '2022-02-05', '2022-01-30 17:27:07', 1, 0),
(10, 47, 1, 3000, 3500, '2022-02-04', '2022-01-30 17:27:07', 1, 0),
(11, 120, 1, 4000, 4500, '2022-02-05', '2022-01-30 17:31:45', 1, 0),
(12, 37, 1, 2000, 3000, '2022-02-05', '2022-01-30 17:31:45', 1, 0),
(13, 123, 1, 3000, 3400, '2022-02-05', '2022-01-30 17:31:45', 1, 0),
(14, 81, 1, 400, 500, '2022-02-05', '2022-01-30 17:35:41', 1, 0),
(15, 34, 1, 4000, 4500, '2022-02-05', '2022-01-30 17:38:17', 1, 0),
(16, 121, 1, 2000, 4500, '2022-02-05', '2022-01-30 17:38:17', 1, 0),
(17, 13, 1, 5000, 6000, '2023-04-01', '2022-02-04 09:55:29', 1, 0),
(18, 13, 2, 5000, 6000, '2023-04-02', '2022-02-04 09:55:29', 1, 0),
(19, 13, 1, 5000, 6000, '2023-02-04', '2022-02-04 10:35:23', 1, 0),
(20, 13, 1, 5500, 6000, '2022-07-07', '2022-02-04 11:00:05', 1, 0),
(21, 28, 1, 1500, 2000, '2023-04-04', '2022-02-06 17:41:06', 1, 0),
(22, 31, 3, 800, 1000, '2022-05-11', '2022-02-06 17:59:01', 1, 0),
(23, 42, 4, 1000, 2000, '2022-09-13', '2022-02-06 18:10:03', 1, 0),
(24, 105, 1, 2300, 2600, '2022-03-11', '2022-02-07 12:38:36', 1, 0),
(25, 28, 2, 150, 3000, '2022-02-09', '2022-02-08 09:26:09', 1, 0),
(26, 26, 2, 6000, 8000, '2022-04-20', '2022-02-08 09:26:09', 1, 0),
(27, 136, 2, 500, 600, '2022-04-17', '2022-02-08 09:35:02', 1, 0),
(28, 53, 4, 3750, 4500, '2023-12-29', '2022-02-10 10:47:00', 1, 0),
(29, 128, 10, 8958, 10900, '2024-04-02', '2022-02-10 10:55:04', 1, 0),
(30, 135, 4, 28750, 34500, '2023-07-31', '2022-02-10 11:00:55', 1, 0),
(31, 131, 6, 4167, 5000, '2023-10-31', '2022-02-10 11:11:44', 1, 0),
(32, 145, 10, 7250, 8800, '2022-11-30', '2022-02-10 11:19:02', 1, 0),
(34, 22, 6, 2500, 3000, '2024-05-29', '2022-02-11 08:24:00', 1, 0),
(35, 149, 6, 6833, 8300, '2023-12-31', '2022-02-11 08:37:50', 1, 0),
(36, 148, 6, 5166, 6300, '2023-05-14', '2022-02-11 08:43:05', 1, 0),
(38, 146, 6, 8916, 10800, '2023-07-13', '2022-02-11 09:29:24', 1, 0),
(39, 64, 6, 4167, 5000, '2022-06-17', '2022-02-11 09:34:23', 1, 0),
(48, 60, 12, 12917, 15500, '2022-12-31', '2022-02-11 14:37:37', 1, 0),
(49, 26, 6, 8750, 10500, '2023-03-02', '2022-02-11 14:50:08', 1, 0),
(50, 151, 12, 6833, 8300, '2022-08-23', '2022-02-11 14:59:05', 1, 0),
(51, 30, 5, 2900, 3500, '2023-09-30', '2022-02-11 15:09:39', 1, 0),
(52, 179, 12, 2833, 3500, '2022-07-02', '2022-02-15 16:26:09', 1, 0),
(53, 196, 9, 5556, 6700, '2022-06-22', '2022-02-15 16:29:41', 1, 0),
(54, 190, 25, 2320, 2900, '2023-12-31', '2022-02-15 17:00:20', 1, 0),
(55, 173, 6, 5667, 6800, '2023-05-31', '2022-02-15 17:16:27', 1, 0),
(56, 172, 6, 10000, 12000, '2022-10-31', '2022-02-15 17:22:47', 1, 0),
(57, 174, 6, 25000, 27500, '2023-08-31', '2022-02-15 17:28:06', 1, 0),
(58, 175, 5, 11250, 13500, '2023-04-30', '2022-02-15 17:34:20', 1, 0),
(59, 175, 3, 11250, 13500, '2023-04-30', '2022-02-15 17:36:53', 1, 0),
(60, 176, 10, 1750, 2100, '2022-07-01', '2022-02-15 17:41:46', 1, 0),
(61, 178, 6, 5556, 6700, '2022-07-01', '2022-02-15 17:47:23', 1, 0),
(62, 177, 5, 3317, 4000, '2022-07-17', '2022-02-15 17:52:43', 1, 0),
(63, 181, 6, 5583, 6700, '2022-08-31', '2022-02-15 18:02:26', 1, 0),
(64, 182, 2, 1400, 1700, '2023-08-01', '2022-02-15 18:29:52', 1, 0),
(65, 182, 7, 1400, 1700, '2023-08-31', '2022-02-15 18:31:24', 1, 0),
(66, 56, 36, 944, 1200, '2023-01-31', '2022-02-16 14:19:05', 1, 0),
(67, 45, 24, 9375, 1200, '2023-03-31', '2022-02-16 14:41:20', 1, 0),
(68, 43, 24, 1458, 1800, '2023-03-31', '2022-02-16 14:49:09', 1, 0),
(69, 44, 24, 729, 900, '2023-03-31', '2022-02-16 14:57:15', 1, 0),
(70, 127, 12, 4167, 5000, '2023-03-15', '2022-02-16 15:32:22', 1, 0),
(71, 130, 12, 4000, 4800, '2023-09-28', '2022-02-16 15:54:41', 1, 0),
(72, 130, 12, 4000, 4800, '2023-09-28', '2022-02-16 16:00:18', 1, 0),
(73, 195, 8, 3750, 4500, '2023-12-29', '2022-02-16 16:03:41', 1, 0),
(74, 133, 30, 600, 800, '2023-05-25', '2022-02-16 16:19:09', 1, 0),
(75, 134, 20, 2050, 2500, '2023-05-31', '2022-02-16 16:21:51', 1, 0),
(76, 136, 24, 600, 700, '2023-03-02', '2022-02-16 16:25:45', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `suggestion`
--

CREATE TABLE `suggestion` (
  `SUGGESTION_ID` int(11) NOT NULL,
  `SUGGESTION_DESCR` text NOT NULL,
  `STATUT_SYNC` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_reduction`
--

CREATE TABLE `type_reduction` (
  `ID_TYPE_REDUCTION` int(11) NOT NULL,
  `TYPE_REDUCTION` varchar(50) NOT NULL,
  `STATUT_SYNC` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_reduction`
--

INSERT INTO `type_reduction` (`ID_TYPE_REDUCTION`, `TYPE_REDUCTION`, `STATUT_SYNC`) VALUES
(0, 'Pas de reduction', 0),
(1, 'Achat sur prix de requisition Consommation points ', 0),
(2, 'Bonus total', 0);

-- --------------------------------------------------------

--
-- Structure de la table `unite_mesure`
--

CREATE TABLE `unite_mesure` (
  `UNITE_ID` int(11) NOT NULL,
  `UNITE_DESCR` varchar(200) NOT NULL,
  `STATUT_SYNC` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `unite_mesure`
--

INSERT INTO `unite_mesure` (`UNITE_ID`, `UNITE_DESCR`, `STATUT_SYNC`) VALUES
(1, 'KILOGRAME(S)', 0),
(2, 'LITRES(S)', 0),
(3, 'X', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `USER_ID` int(11) NOT NULL,
  `NOM_USER` varchar(100) DEFAULT NULL,
  `PRENOM_USER` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `TELEPHONE` int(11) NOT NULL,
  `USERNAME` varchar(200) NOT NULL,
  `PROFILE_ID` int(11) NOT NULL,
  `PASSWORD` varchar(200) NOT NULL,
  `VIP` int(11) NOT NULL,
  `STATUT_SYNC` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`USER_ID`, `NOM_USER`, `PRENOM_USER`, `EMAIL`, `TELEPHONE`, `USERNAME`, `PROFILE_ID`, `PASSWORD`, `VIP`, `STATUT_SYNC`) VALUES
(1, 'manirambon', 'fabrice', 'manirambona@jj.bi', 77898982, 'fab', 1, 'WS', 0, 0),
(2, 'mm', 'ss', 'rer', 989878, 'a', 3, '12', 0, 0),
(4, 'am', 'je suis', 'dsd@df.c', 999, 'david', 3, '123', 0, 0),
(5, 'ss', 'ss', 'df@rfr', 32, 'david', 3, '12', 0, 0),
(6, 'rq', 'fw', 'sd@dsdfs.com', 212, 'fab1', 2, '12', 0, 0),
(7, 'manirambona', 'fabrice', 'manirambonafabrice@gmail.com', 79158793, 'fab2', 3, '12', 0, 0),
(8, 'nn', 'bb', 'm@gmail.com', 79158790, 'ee', 3, 'TW', 0, 0),
(9, 'man', 'fab', 'mani@mk.com', 1234, 'fab3', 1, '12', 0, 0),
(10, 'jij', 'e', 'kjnjkq@qwedji.com', 12, 'fab4', 2, '12', 0, 0),
(11, 'aaa', 'aqaaa', 'fdxfd@edxr.nj', 124, 'fab5', 1, '12', 0, 0),
(12, 'sdfs', 'egfer', 'fsd@wefwe.vi', 1245, 'fab14', 3, '12', 0, 0),
(13, 'ccc', 'cccc', 'vv@bb.m', 123, 'cc', 3, '12', 0, 0),
(14, 'cc', 'ccc', 'vcv@gg.nn', 12477, 'fccc', 3, '12', 0, 0),
(15, 'zz', 'zz', 'zz@zz.b', 1211, 'zz', 3, 'KH', 0, 0),
(16, 'baransananiye', 'moses', 'moses@yahoo.com', 68681212, 'mose', 3, '\\]@', 0, 0),
(17, 'er', 'nshi', 'eric@yahoo.com', 75419031, 'er', 3, 'T@V', 0, 0),
(18, 'baransananiye', 'PERICLES', 'pericles@yahoo.com', 79787812, 'peri', 3, 'AW', 0, 0),
(19, 'test', 'eric', 'test.eric@yahoo.com', 75419032, 'eric', 3, 'T@', 0, 0),
(20, 'aime', 'moses', 'aime@yahoo.com', 112233, 'aime moses', 3, 'PX_W^', 0, 0),
(21, '', '', '', 75446189, 'HPRC', 3, 'z`ct', 1, 0),
(22, '', '', '', 4321, 'aime', 3, 'P[^Q', 0, 0),
(23, '', '', '', 4444, 'Debbie', 3, 'p', 0, 0),
(24, '', '', '', 4022000, 'salomon', 3, 'CU\\]', 0, 0),
(25, '', '', '', 80705, 'Deborah', 3, 't]RXBT', 0, 0),
(26, '', '', '', 30404, 'comanche', 3, 'S\\]U^W', 0, 0),
(27, 'nshimirimana', 'eric', '', 61428487, 'eric1', 3, 'T@', 0, 0),
(28, '', '', '', 75152161, 'michoue', 3, '\\[P', 0, 0),
(29, '', '', '', 79063370, 'kiki', 3, '\\^\\', 0, 0),
(30, '', '', '', 77527589, 'michou', 3, 'Z\\U', 0, 0),
(31, '', '', '', 61860316, 'clairia', 3, 'S_P_', 0, 0),
(32, '', '', '', 67501443, 'nadine', 3, '_X]Q', 0, 0),
(33, '', '', '', 88855557, 'michoue3', 3, 'Z]R', 0, 0),
(34, '', '', '', 79351389, 'christian', 3, 'T_B^', 0, 0),
(35, '', '', '', 61276295, 'osanna', 3, 'XGP', 0, 0),
(36, '', '', '', 75324172, 'michoue4', 3, 'T_P', 0, 0),
(37, '', '', '', 71082553, 'Ange', 3, 'pW^]', 0, 0),
(38, '', '', '', 79055792, 'Annick', 3, 'pWWQ', 0, 0),
(39, '', '', '', 667899, 'uii', 3, 'GZ', 0, 0),
(40, 'eic', 'eeeed', '', 11, 'aa', 3, 'PS', 0, 0),
(41, '', '', '', 22, 'aaa', 3, 'PS', 0, 0),
(42, '', '', '', 33, 'xz', 3, 'IH', 0, 0),
(43, '', '', '', 99, 'zx', 3, 'KJ', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

CREATE TABLE `vente` (
  `ID_VENTE` int(11) NOT NULL,
  `QR_CODE` varchar(100) NOT NULL,
  `PRODUIT_ID` int(11) NOT NULL,
  `PRIX` int(11) NOT NULL,
  `ID_FACTURE` int(11) NOT NULL,
  `REDUCTION_POINT` int(11) NOT NULL,
  `ID_TYPE_REDUCTION` tinyint(4) NOT NULL DEFAULT '0',
  `CLIENT` int(11) NOT NULL,
  `FAIT_PAR` int(11) NOT NULL,
  `DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `QUANTITE` int(1) NOT NULL,
  `STATUT_SYNC` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vente`
--

INSERT INTO `vente` (`ID_VENTE`, `QR_CODE`, `PRODUIT_ID`, `PRIX`, `ID_FACTURE`, `REDUCTION_POINT`, `ID_TYPE_REDUCTION`, `CLIENT`, `FAIT_PAR`, `DATE`, `QUANTITE`, `STATUT_SYNC`) VALUES
(4, 'CONFITURE', 12, 45550, 2, 0, 0, 20, 1, '2022-01-30 17:11:08', 1, 0),
(5, 'CONFITURE', 12, 45550, 3, 0, 0, 20, 1, '2022-01-30 17:23:53', 1, 0),
(6, 'BIC', 37, 3000, 4, 0, 0, 20, 1, '2022-01-30 17:39:31', 1, 0),
(7, 'Vin Blanc', 123, 3400, 4, 0, 0, 20, 1, '2022-01-30 17:39:31', 1, 0),
(8, 'Vin Blanc', 123, 3400, 5, 0, 0, 20, 1, '2022-01-30 17:56:53', 1, 0),
(9, 'Avocats', 81, 500, 5, 0, 0, 20, 1, '2022-01-30 17:56:53', 1, 0),
(10, 'LILAC ', 34, 4500, 5, 0, 0, 20, 1, '2022-01-30 17:56:53', 1, 0),
(11, 'Bière Bavaria', 120, 4500, 5, 0, 0, 20, 1, '2022-01-30 17:56:53', 1, 0),
(12, ' DENTIFRICE WHITEDENT', 55, 5500, 5, 0, 0, 20, 1, '2022-01-30 17:56:53', 1, 0),
(13, 'THE OTB', 31, 1000, 6, 0, 0, 20, 1, '2022-02-06 18:23:16', 1, 0),
(14, 'THE OTB', 31, 1000, 6, 0, 0, 20, 1, '2022-02-06 18:23:16', 1, 0),
(15, 'THE OTB', 31, 1000, 6, 0, 0, 20, 1, '2022-02-06 18:23:16', 1, 0),
(16, 'PALMOLIVE', 42, 2000, 6, 0, 0, 20, 1, '2022-02-06 18:23:16', 1, 0),
(17, 'PALMOLIVE', 42, 2000, 6, 0, 0, 20, 1, '2022-02-06 18:23:16', 1, 0),
(18, 'THE OTB', 31, 1000, 6, 0, 0, 20, 1, '2022-02-06 18:23:16', 1, 0),
(19, ' Dentifrice Whitedent', 55, 5500, 7, 0, 0, 20, 1, '2022-02-07 10:20:57', 1, 0),
(20, 'Savon de lessive GIFURANGUWO ', 136, 600, 8, 0, 0, 0, 1, '2022-02-08 10:14:24', 1, 0),
(21, 'CAFE', 28, 3000, 9, 0, 0, 0, 1, '2022-02-08 10:21:54', 2, 0),
(22, 'THE OTB', 31, 1000, 10, 0, 0, 29, 1, '2022-02-08 10:28:01', 1, 0),
(23, 'THE OTB', 31, 1000, 11, 0, 0, 29, 1, '2022-02-09 08:48:13', 1, 0),
(24, 'Maggi Sauce', 145, 8800, 12, 0, 0, 0, 1, '2022-02-14 09:00:56', 5, 0),
(25, 'Sardine ANNY', 65, 2900, 13, 0, 0, 0, 1, '2022-02-15 11:18:13', 2, 0),
(26, 'blue band', 13, 6000, 14, 0, 0, 34, 1, '2022-02-15 11:34:08', 1, 0),
(27, 'Sardine ANNY', 65, 2900, 14, 0, 0, 34, 1, '2022-02-15 11:34:08', 1, 0),
(28, 'Jumpy', 14, 6700, 14, 0, 0, 34, 1, '2022-02-15 11:34:08', 3, 0),
(29, 'THE VERT', 30, 3500, 15, 0, 0, 0, 1, '2022-02-15 11:37:56', 2, 0),
(30, 'Poudre de Lessive ARIEL', 135, 34500, 15, 0, 0, 0, 1, '2022-02-15 11:37:56', 2, 0),
(31, 'EUROPA', 60, 15500, 16, 0, 0, 0, 1, '2022-02-15 13:09:34', 2, 0),
(32, 'Jumpy', 14, 6700, 16, 0, 0, 0, 1, '2022-02-15 13:09:34', 1, 0),
(33, 'Maggi Sauce', 145, 8800, 16, 0, 0, 0, 1, '2022-02-15 13:09:34', 3, 0),
(34, 'BIC', 37, 3000, 17, 0, 0, 0, 1, '2022-02-15 13:17:56', 2, 0),
(35, 'Poudre de Lessive ARIEL', 135, 34500, 17, 0, 0, 0, 1, '2022-02-15 13:17:56', 2, 0),
(36, 'Jumpy', 14, 6700, 18, 0, 0, 0, 1, '2022-02-15 13:33:45', 2, 0),
(37, 'EUROPA', 60, 15500, 18, 0, 0, 0, 1, '2022-02-15 13:33:45', 1, 0),
(38, 'Sardine ANNY', 65, 2900, 18, 0, 0, 0, 1, '2022-02-15 13:33:45', 2, 0),
(39, 'BIC', 37, 3000, 19, 0, 0, 34, 1, '2022-02-15 14:02:05', 1, 0),
(40, 'QUAKER', 26, 10500, 20, 0, 0, 34, 1, '2022-02-15 14:04:42', 1, 0),
(41, 'Bière Heineken', 121, 4500, 20, 0, 0, 34, 1, '2022-02-15 14:04:42', 1, 0),
(42, 'CAFE', 28, 3000, 20, 0, 0, 34, 1, '2022-02-15 14:04:42', 1, 0),
(43, 'Mayonnaise Culino', 146, 10800, 21, 0, 0, 0, 1, '2022-02-15 15:03:21', 5, 0),
(44, 'Maggi Sauce', 145, 8800, 21, 0, 0, 0, 1, '2022-02-15 15:03:21', 2, 0),
(45, 'Jumpy', 14, 6700, 21, 0, 0, 0, 1, '2022-02-15 15:03:21', 2, 0),
(46, 'Sel de table NEZO', 148, 6300, 22, 0, 0, 0, 1, '2022-02-15 15:06:07', 1, 0),
(47, 'Sardine ANNY', 65, 2900, 22, 0, 0, 0, 1, '2022-02-15 15:06:07', 1, 0),
(48, 'Maggi Sauce', 145, 8800, 22, 0, 0, 0, 1, '2022-02-15 15:06:07', 1, 0),
(49, 'Maggi Sauce', 145, 8800, 23, 0, 0, 0, 1, '2022-02-15 15:15:51', 8, 0),
(50, 'Mayonnaise Culino', 146, 10800, 23, 0, 0, 0, 1, '2022-02-15 15:15:51', 5, 0),
(51, 'Sel de table NEZO', 148, 6300, 23, 0, 0, 0, 1, '2022-02-15 15:15:51', 4, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `achat_points`
--
ALTER TABLE `achat_points`
  ADD PRIMARY KEY (`ACHAT_POINT_ID`);

--
-- Index pour la table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`BANK_ID`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`CATEGORIE_ID`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`COMMANDE_ID`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`ID_FACTURE`);

--
-- Index pour la table `frais_de_retrait`
--
ALTER TABLE `frais_de_retrait`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `mobile_money`
--
ALTER TABLE `mobile_money`
  ADD PRIMARY KEY (`MOBILE_ID`);

--
-- Index pour la table `mode_de_paiement`
--
ALTER TABLE `mode_de_paiement`
  ADD PRIMARY KEY (`MODE_ID`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`PRODUIT_ID`);

--
-- Index pour la table `produit_commande`
--
ALTER TABLE `produit_commande`
  ADD PRIMARY KEY (`PRODUIT_COMMANDE_ID`);

--
-- Index pour la table `profiles_users`
--
ALTER TABLE `profiles_users`
  ADD PRIMARY KEY (`PROFILE_ID`);

--
-- Index pour la table `qr_code_requisition`
--
ALTER TABLE `qr_code_requisition`
  ADD PRIMARY KEY (`ID_QR_CODE`);

--
-- Index pour la table `quartier_de_distribution`
--
ALTER TABLE `quartier_de_distribution`
  ADD PRIMARY KEY (`QUARTEIR_ID`);

--
-- Index pour la table `requisition`
--
ALTER TABLE `requisition`
  ADD PRIMARY KEY (`ID_REQUISITION`);

--
-- Index pour la table `suggestion`
--
ALTER TABLE `suggestion`
  ADD PRIMARY KEY (`SUGGESTION_ID`);

--
-- Index pour la table `type_reduction`
--
ALTER TABLE `type_reduction`
  ADD PRIMARY KEY (`ID_TYPE_REDUCTION`);

--
-- Index pour la table `unite_mesure`
--
ALTER TABLE `unite_mesure`
  ADD PRIMARY KEY (`UNITE_ID`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USER_ID`);

--
-- Index pour la table `vente`
--
ALTER TABLE `vente`
  ADD PRIMARY KEY (`ID_VENTE`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `achat_points`
--
ALTER TABLE `achat_points`
  MODIFY `ACHAT_POINT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT pour la table `bank`
--
ALTER TABLE `bank`
  MODIFY `BANK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `CATEGORIE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `COMMANDE_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `ID_FACTURE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `frais_de_retrait`
--
ALTER TABLE `frais_de_retrait`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `mobile_money`
--
ALTER TABLE `mobile_money`
  MODIFY `MOBILE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `mode_de_paiement`
--
ALTER TABLE `mode_de_paiement`
  MODIFY `MODE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `PRODUIT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT pour la table `produit_commande`
--
ALTER TABLE `produit_commande`
  MODIFY `PRODUIT_COMMANDE_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `profiles_users`
--
ALTER TABLE `profiles_users`
  MODIFY `PROFILE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `qr_code_requisition`
--
ALTER TABLE `qr_code_requisition`
  MODIFY `ID_QR_CODE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=359;

--
-- AUTO_INCREMENT pour la table `quartier_de_distribution`
--
ALTER TABLE `quartier_de_distribution`
  MODIFY `QUARTEIR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `requisition`
--
ALTER TABLE `requisition`
  MODIFY `ID_REQUISITION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT pour la table `suggestion`
--
ALTER TABLE `suggestion`
  MODIFY `SUGGESTION_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_reduction`
--
ALTER TABLE `type_reduction`
  MODIFY `ID_TYPE_REDUCTION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `unite_mesure`
--
ALTER TABLE `unite_mesure`
  MODIFY `UNITE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `vente`
--
ALTER TABLE `vente`
  MODIFY `ID_VENTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
