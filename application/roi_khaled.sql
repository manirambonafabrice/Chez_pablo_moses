-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 16 mars 2019 à 17:45
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `roi_khaled`
--

-- --------------------------------------------------------

--
-- Structure de la table `activites`
--

CREATE TABLE `activites` (
  `ID` int(11) NOT NULL,
  `NOM` varchar(250) NOT NULL,
  `DESCRIPTION` varchar(5000) NOT NULL,
  `FOTO` varchar(200) NOT NULL,
  `AJOUTER_PAR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `activites`
--

INSERT INTO `activites` (`ID`, `NOM`, `DESCRIPTION`, `FOTO`, `AJOUTER_PAR`) VALUES
(1, 'Dépistage', 'Le dépistage est gratuit', '7778715429_un-test-de-depistage-du-vih-dans-un-centre-de-medecins-du-monde-a-cayenne-illustration.jpg', 1),
(2, 'Hospitalisation', 'Nous avons plus de 500 lit pour l\'hospitalisation', 'L-hospitalisation-a-domicile-a-confirme-son-rebond-en-2016.jpg', 1),
(5, 'Vaccination', '<h2>Vaccination</h2><p>Protection contre les epidemie</p>', 'Pediatri.jpg', 1),
(6, 'Planning famillialle', '<h1>Le planning famillialle</h1><p>Lutte contre des grossesse non desirées</p>', '21328414841_45158f515f_b.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `actualites`
--

CREATE TABLE `actualites` (
  `ID` int(11) NOT NULL,
  `DATE` datetime NOT NULL,
  `TITRE` varchar(500) NOT NULL,
  `DESCRIPTION` varchar(5000) NOT NULL,
  `PIECE_JOINTE` varchar(500) NOT NULL,
  `AJOUTER_PAR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `actualites`
--

INSERT INTO `actualites` (`ID`, `DATE`, `TITRE`, `DESCRIPTION`, `PIECE_JOINTE`, `AJOUTER_PAR`) VALUES
(1, '2019-03-03 04:04:40', 'Conference', 'COnference de presse au CHUK Monsieur le premier COnference de presse au CHUK Monsieur le premier COnference de presse au CHUK Monsieur le premier COnference de presse au CHUK Monsieur&nbsp;', 'Gynecologie.jpg', 1),
(2, '2019-03-03 03:51:02', 'Accueil du gouvernement', 'Monsieur le premier vice president de la republique a fait visite A CHUK Monsieur le premier vice president de la republique a fait visite A CHUK&nbsp; Monsieur le premier vice president de la republique a fait visite A CHUK Monsieur le premier vice president de la republique a fait visite A CHUK Monsieur le premier vice president de la republique a fait visite A CHUK', '', 1),
(3, '2019-02-25 19:48:30', 'rencontre', '<p>gfhffy cbjbjbkjbjblkjlk cbjbjbkjbjblkjlk cbjbjbkjbjblkjlk cbjbjbkjbjblkjlk cbjbjbkjbjblkjlk cbjbjbkjbjblkjlk cbjbjbkjbjblkjlkcbjbjbkjbjblkjlkcbjbjbkjbjblkjlk cbjbjbkjbjblkjlk cbjbjbkjbjblkjlk&nbsp; kjbjblkjlkcbj bjbkjbjblkj lkcbjbjbkjbjm blkjlkcbjbjbkjbjblkjl kcbjbjbkjbjb lkjlkcbjbjb kjbjblkjlkcbjbjb kjbjblk jlkcbjbjbkjbjblkjlk cbjbjbkjbjblkjlk cbjbjbkj cbjbjbkjbjblkjlk cbjbjbkjbjblkjlkbjblkjlk cbjbjbkjbjblkjlk cbjbjbkjbjblkjlk cbjbjbkjbjblkjlk v&nbsp; cbjbjbkjbjblkjlk v cbjbjbkjbjblkjlk cbjbjbkjbjblkjlkvv cbjbjbkjbjblkjlk cbjbjbkjbjblkjlk cbjbjbkjbjblkjlk cbjbjbkjbjblkjlk cbjbjbkjbjblkjlk cbjbjbkjbjblkjlk cbjbjbkjbjblkjlk cbjbjbkjbjblkjlkcbjbjbkjbjblkjlk cbjbjbkjbjblkjlk v vcbjbjbkjbjblkjlk cbjbjbkjbjblkjlkv cbjbjbkjbjblkjlk cbjbjbkjbjblkjlk cbjbjbkjbjblkjlkv cbjbjbkjbjblkjlk cbjbjbkjbjblkjlk</p>', 'medecineInter.jpg', 1),
(4, '2019-03-12 04:29:59', 'nbn', '<p>njjkmkll djnsd sjkvjv dfjknjknf dfjkndjn jvdnj&nbsp;<span style=\"font-size: 1rem;\">njjkmkll djnsd sjkvjv dfjknjknf dfjkndjn jvdnj&nbsp;</span><span style=\"font-size: 1rem;\">njjkmkll djnsd sjkvjv dfjknjknf dfjkndjn jvdnj&nbsp;</span><span style=\"font-size: 1rem;\">njjkmkll djnsd sjkvjv dfjknjknf dfjkndjn jvdnj&nbsp;</span><span style=\"font-size: 1rem;\">njjkmkll djnsd sjkvjv dfjknjknf dfjkndjn jvdnj</span><span style=\"font-size: 1rem;\">njjkmkll djnsd sjkvjv dfjknjknf dfjkndjn jvdnj</span><span style=\"font-size: 1rem;\">njjkmkll djnsd sjkvjv dfjknjknf dfjkndjn jvdnj</span><span style=\"font-size: 1rem;\">njjkmkll djnsd sjkvjv dfjknjknf dfjkndjn jvdnj&nbsp;</span><span style=\"font-size: 1rem;\">njjkmkll djnsd sjkvjv dfjknjknf dfjkndjn jvdnj&nbsp;</span><span style=\"font-size: 1rem;\">njjkmkll djnsd sjkvjv dfjknjknf dfjkndjn jvdnj&nbsp;</span><span style=\"font-size: 1rem;\">njjkmkll djnsd sjkvjv dfjknjknf dfjkndjn jvdnj&nbsp;</span><span style=\"font-size: 1rem;\">njjkmkll djnsd sjkvjv dfjknjknf dfjkndjn jvdnj&nbsp;</span><span style=\"font-size: 1rem;\">njjkmkll djnsd sjkvjv dfjknjknf dfjkndjn jvdnj&nbsp;</span><span style=\"font-size: 1rem;\">njjkmkll djnsd sjkvjv dfjknjknf dfjkndjn jvdnj&nbsp;</span><span style=\"font-size: 1rem;\">njjkmkll djnsd sjkvjv dfjknjknf dfjkndjn jvdnj v&nbsp;</span></p>', '', 1),
(10, '2019-03-13 04:47:17', 'aaaa', '<p>aaaa</p>', '', 1),
(11, '2019-03-13 04:53:50', 'vh', '<p>mbj</p>', '', 1),
(12, '2019-03-13 04:55:35', 'sd', '<p>AA</p>', '', 1),
(13, '2019-03-13 04:57:44', 'CDA', '<p>AACA</p>', '', 1),
(14, '2019-03-13 05:01:01', 'HJ', '<p>JB</p>', '', 1),
(15, '2019-03-13 05:02:08', 'HJ', '<p>JB</p>', '', 1),
(16, '2019-03-13 05:02:29', 'KNK', '<p>JBJ</p>', '', 1),
(17, '2019-03-13 05:03:04', 'JBJ', '<p>MJBJ</p>', '', 1),
(18, '2019-03-13 05:03:31', 'JBJ', '<p>MJBJ</p>', '', 1),
(24, '2019-03-13 05:26:34', 'fasd', '<p>ada</p>', 'chirurgi.jpg', 1),
(33, '2019-03-13 05:43:07', 'WQE', '<p>QWQ</p>', '', 1),
(34, '2019-03-14 04:59:03', 'QDdfg', '<p>ADAdfdf</p>', '', 1),
(35, '2019-03-14 04:48:28', 'QD', '<p>ADA</p>', 'chirurgi5.jpg', 1),
(36, '2019-03-14 04:57:46', 'sds', '<p>asca</p>', '', 1),
(37, '2019-03-14 04:54:49', 'a', '<p>nb</p>', 'burundi_20_01.jpg', 1),
(38, '2019-03-14 05:26:02', 'zz', '<p>sdf</p>', '', 1),
(39, '2019-03-14 15:16:26', 'q', '<p>ad</p>', '', 1),
(40, '2019-03-15 06:07:51', 'aada', '<p>ada</p>', '', 1),
(41, '2019-03-16 15:12:52', 'xcv', '<p>zcz scssdsvsvsdvs svsvssvsvs&nbsp;&nbsp;<span style=\"font-size: 1rem;\">scssdsvsvsdvs svsvssvsvs&nbsp;&nbsp;</span><span style=\"font-size: 1rem;\">scssdsvsvsdvs svsvssvsvs&nbsp;&nbsp;</span><span style=\"font-size: 1rem;\">scssdsvsvsdvs svsvssvsvs&nbsp;&nbsp;</span><span style=\"font-size: 1rem;\">scssdsvsvsdvs svsv<b>ssvsvs&nbsp;&nbsp;</b></span><b><span style=\"font-size: 1rem;\">scssdsvsvsdvs svsvssvsvs&nbsp;&nbsp;</span><span style=\"font-size: 1rem;\">scssdsvsvsdvs svsvssvsvs&nbsp;&nbsp;</span><span style=\"font-size: 1rem;\">scssdsvsvsdvs svsvssvsvs&nbsp; </span><span style=\"font-size: 1rem;\">&nbsp;&nbsp;</span><span style=\"font-size: 1rem;\">scssdsvsvsdvs svsvssvsvs&nbsp;&nbsp;</span><span style=\"font-size: 1rem;\">scssdsvsvsdvs svsvssvsvs&nbsp;&nbsp;</span><span style=\"font-size: 1rem;\">scssdsvsvsdvs svsvssvsvs&nbsp;</span><span style=\"font-size: 1rem;\">scssdsvsvsdvs svsvssvsvs&nbsp;&nbsp;</span><span style=\"font-size: 1rem;\">scssdsvsvsdvs svsvssvsvs&nbsp;&nbsp;</span><span style=\"font-size: 1rem;\">scssdsvsvsdvs svsvssvsvs</span></b><span style=\"font-size: 1rem;\">&nbsp;</span></p>', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `actualites_foto`
--

CREATE TABLE `actualites_foto` (
  `ID` int(11) NOT NULL,
  `ACTUALITE_ID` int(11) NOT NULL,
  `FOTO` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `actualites_foto`
--

INSERT INTO `actualites_foto` (`ID`, `ACTUALITE_ID`, `FOTO`) VALUES
(1, 1, 'pediatrie.jpg'),
(2, 2, 'burundi_20_0.jpg'),
(3, 3, 'etudiant_medecine_685714157.jpg'),
(16, 24, 'Chirurgie.jpg'),
(25, 33, 'chirurgi1.jpg'),
(28, 36, 'chirurgi2.jpg'),
(30, 34, 'burundi_20_0_3.jpg'),
(48, 35, '21328414841_45158f515f_b.jpg'),
(49, 37, 'depistage.jpeg'),
(56, 38, '7778715429_un-test-de-depistage-du-vih-dans-un-centre-de-medecins-du-monde-a-cayenne-illustration1.jpg'),
(57, 38, '21328414841_45158f515f_b1.jpg'),
(58, 38, 'anestesie.jpg'),
(59, 38, 'chirurgi_2.jpg'),
(60, 38, 'depistage1.jpeg'),
(61, 39, 'anestesie1.jpg'),
(62, 39, 'chirurgi6.jpg'),
(63, 40, '7778715429_un-test-de-depistage-du-vih-dans-un-centre-de-medecins-du-monde-a-cayenne-illustration2.jpg'),
(64, 40, '21328414841_45158f515f_b2.jpg'),
(65, 40, 'anestesie2.jpg'),
(66, 40, 'burundi_20_0_2.jpg'),
(67, 40, 'burundi_20_0_31.jpg'),
(68, 40, 'chirurgi7.jpg'),
(69, 40, 'depistage_3.jpeg'),
(70, 40, 'etudiant_medecine_6857141571.jpg'),
(71, 41, 'depistage2.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `defenses`
--

CREATE TABLE `defenses` (
  `ID` int(11) NOT NULL,
  `NOM_MEMORANT` varchar(50) NOT NULL,
  `PRENOM_MEMORANT` varchar(50) NOT NULL,
  `SUJET` varchar(500) NOT NULL,
  `NOM_DIRECTEUR` varchar(50) NOT NULL,
  `PRENOM_DIRECTEUR` varchar(50) NOT NULL,
  `TITRE_DIRECTEUR` varchar(20) NOT NULL,
  `NOM_CODIRECTEUR` varchar(200) NOT NULL,
  `PRENOM_CODIRECTEUR` varchar(200) NOT NULL,
  `TITRE_CODIRECTEUR` varchar(20) NOT NULL,
  `DATE_DEFENSE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `defenses`
--

INSERT INTO `defenses` (`ID`, `NOM_MEMORANT`, `PRENOM_MEMORANT`, `SUJET`, `NOM_DIRECTEUR`, `PRENOM_DIRECTEUR`, `TITRE_DIRECTEUR`, `NOM_CODIRECTEUR`, `PRENOM_CODIRECTEUR`, `TITRE_CODIRECTEUR`, `DATE_DEFENSE`) VALUES
(1, 'wewr', 'we', '<p>awqwew</p>', 'ww', 'wee', 'Dr', 'wer', 'we', 'Pr', '2019-03-10 21:07:00'),
(2, 'wrw', 'wfw', '<p>wrw</p>', 'ae', 'wr', 'Pr', 'wrw', 'r', 'Dr', '2019-03-11 21:18:00'),
(3, 'dfg', 'dgd', '<p>dgdf</p>', 'sgf', 'dg', 'Dr', '', '', 'Dr', '2019-03-10 21:21:00'),
(4, 'ssad', 'zc', '<p>zxcz</p>', 'zcz', 'xvx', 'Pr', 'xvsd', 'sfds', 'Pr', '2019-03-17 09:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `emploi`
--

CREATE TABLE `emploi` (
  `ID` int(11) NOT NULL,
  `TITRE` varchar(200) NOT NULL,
  `DESCRIPTION` varchar(5000) NOT NULL,
  `DATE` datetime NOT NULL,
  `EXPIRATION` datetime NOT NULL,
  `PIECE_JOINTE` varchar(100) NOT NULL,
  `AJOUTER_PAR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `emploi`
--

INSERT INTO `emploi` (`ID`, `TITRE`, `DESCRIPTION`, `DATE`, `EXPIRATION`, `PIECE_JOINTE`, `AJOUTER_PAR`) VALUES
(1, 'nhvh', '<p>hvjhvj<br></p>', '2019-02-25 17:54:07', '2019-02-25 18:55:00', '20190108.pdf', 1),
(2, 'svs', '<p>zczc <b>x vxcv ffhfhfhfh ghfhfgfghf gvggvg vjhvjhv vhgvhgv&nbsp;</b><span style=\"font-size: 1rem;\">&nbsp;</span><span style=\"font-size: 1rem; font-weight: bolder;\">x vxcv ffhfhfhfh ghfhfgfghf gvggvg vjhvjhv vhgvhgv</span><span style=\"font-size: 1rem;\">&nbsp;</span><span style=\"font-size: 1rem; font-weight: bolder;\">x vxcv ffhfhfhfh ghfhfgfghf gvggvg vjhvjhv vhgvhgv&nbsp;</span><span style=\"font-size: 1rem;\">&nbsp;</span><span style=\"font-size: 1rem; font-weight: bolder;\">x vxcv ffhfhfhfh ghfhfgfghf gvggvg vjhvjhv vhgvhgv<span style=\"background-color: rgb(255, 255, 0);\">&nbsp;</span></span><span style=\"font-size: 1rem;\">&nbsp;</span><span style=\"font-size: 1rem; font-weight: bolder;\">x vxcv ffhfhfhfh ghfhfgfghf gvggvg vjhvjhv vhgvhgv<span style=\"background-color: rgb(255, 255, 0);\">&nbsp;</span></span><span style=\"font-size: 1rem;\">&nbsp;</span><span style=\"font-size: 1rem; font-weight: bolder;\">x vxcv <span style=\"background-color: rgb(255, 255, 0);\">ffhfhfhfh</span> ghfhfgfghf gvggvg vjhvjhv <span style=\"background-color: rgb(255, 255, 0);\">vhgvhgv</span></span></p>', '2019-03-16 15:06:17', '2019-03-22 16:02:00', '201901081.pdf', 1);

-- --------------------------------------------------------

--
-- Structure de la table `meilleur_memoire`
--

CREATE TABLE `meilleur_memoire` (
  `ID` int(11) NOT NULL,
  `NOM_MEMORANT` varchar(50) NOT NULL,
  `PRENOM_MEMORANT` varchar(50) NOT NULL,
  `SUJET` varchar(500) NOT NULL,
  `NOM_DIRECTEUR` varchar(50) NOT NULL,
  `PRENOM_DIRECTEUR` varchar(50) NOT NULL,
  `TITRE_DIRECTEUR` varchar(20) NOT NULL,
  `NOM_CODIRECTEUR` varchar(200) NOT NULL,
  `PRENOM_CODIRECTEUR` varchar(200) NOT NULL,
  `TITRE_CODIRECTEUR` varchar(20) NOT NULL,
  `DATE_DEFENSE` date NOT NULL,
  `PDF` varchar(200) NOT NULL,
  `AJOUTER_PAR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `meilleur_memoire`
--

INSERT INTO `meilleur_memoire` (`ID`, `NOM_MEMORANT`, `PRENOM_MEMORANT`, `SUJET`, `NOM_DIRECTEUR`, `PRENOM_DIRECTEUR`, `TITRE_DIRECTEUR`, `NOM_CODIRECTEUR`, `PRENOM_CODIRECTEUR`, `TITRE_CODIRECTEUR`, `DATE_DEFENSE`, `PDF`, `AJOUTER_PAR`) VALUES
(1, 'hg', 'jbj', '<p>bkjb<br></p>', 'hghjg', 'hjgj', 'Dr', 'KJK', 'gf', 'Dr', '2019-02-11', '20190108.pdf', 1),
(2, 'hghjg', 'hjgj', '<p>guggn hbjihbj<br></p>', 'bvjh', 'kbjk', 'Dr', 'jbjk', 'nhklj', 'Dr', '2019-02-17', '201901081.pdf', 1),
(3, 'ADa', 'sfsf', '<p>sdfASF<br></p>', 'ssdf', 'sfsd', 'Pr', 'sfsd', 'sfs', 'Dr', '2019-02-18', '201901082.pdf', 1),
(4, 'z', 'y', '<p>aaaa</p>', 'ew', 'we', 'Pr', 'er', 'er', 'Dr', '2019-03-14', '201901083.pdf', 1),
(5, 'we', 'wew', '<p>wefw dbbdfbdb</p>', 'we', 'we', 'Pr', 'we', 'ew', 'Dr', '2019-03-06', '201901084.pdf', 1),
(6, 'xvx', 'xbx', '<p>aa<span style=\"font-size: 1rem; font-weight: bolder; color: rgb(33, 37, 41);\">x vxcv ffhfhfhfh ghfhfgfghf gvggvg vjhvjhv vhgvhgv&nbsp;<span style=\"font-size: 1rem;\">&nbsp;</span><span style=\"font-size: 1rem;\">x vxcv ffhfhfhfh ghfhfgfghf gvggvg vjhvjhv vhgvhgv</span><span style=\"font-size: 1rem;\">&nbsp;</span><span style=\"font-size: 1rem;\">x vxcv ffhfhfhfh ghfhfgfghf gvggvg<span style=\"background-color: rgb(255, 255, 0);\"> vjhvjhv</span> vhgvhgv</span><span style=\"font-size: 1rem;\">&nbsp;</spa', 'xvx', 'xvx', 'Dr', 'xvx', 'xvxcv', 'Dr', '2019-03-16', '201901085.pdf', 1);

-- --------------------------------------------------------

--
-- Structure de la table `multimedia_audios`
--

CREATE TABLE `multimedia_audios` (
  `ID` int(11) NOT NULL,
  `DESCRIPTION` varchar(200) NOT NULL,
  `AUDIO` varchar(200) NOT NULL,
  `AJOUTER_PAR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `multimedia_audios`
--

INSERT INTO `multimedia_audios` (`ID`, `DESCRIPTION`, `AUDIO`, `AJOUTER_PAR`) VALUES
(5, 'wd', 'John_Legend_-_All_of_Me_(Piano_Cello_Cover)_-_Brooklyn_Duo.mp3', 1);

-- --------------------------------------------------------

--
-- Structure de la table `multimedia_fotos`
--

CREATE TABLE `multimedia_fotos` (
  `ID` int(11) NOT NULL,
  `DESCRIPTION` varchar(200) NOT NULL,
  `FOTO` varchar(300) NOT NULL,
  `AJOUTER_PAR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `multimedia_fotos`
--

INSERT INTO `multimedia_fotos` (`ID`, `DESCRIPTION`, `FOTO`, `AJOUTER_PAR`) VALUES
(1, '', 'burundi_20_0.jpg', 1),
(4, '', 'chirurgi.jpg', 1),
(5, '', 'depistage.jpeg', 1),
(6, '', 'Chirurgie.jpg', 1),
(8, '', 'anestesie.jpg', 1),
(9, '', 'medecineInter.jpg', 1),
(10, '', '7778715429_un-test-de-depistage-du-vih-dans-un-centre-de-medecins-du-monde-a-cayenne-illustration.jpg', 1),
(11, '', '21328414841_45158f515f_b.jpg', 1),
(12, '', 'anestesie1.jpg', 1),
(13, '', 'burundi_20_01.jpg', 1),
(14, '', 'burundi_20_0_2.jpg', 1),
(15, '', 'burundi_20_0_3.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `multimedia_videos`
--

CREATE TABLE `multimedia_videos` (
  `ID` int(11) NOT NULL,
  `DESCRIPTION` varchar(200) NOT NULL,
  `VIDEO` varchar(200) NOT NULL,
  `AJOUTER_PAR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `multimedia_videos`
--

INSERT INTO `multimedia_videos` (`ID`, `DESCRIPTION`, `VIDEO`, `AJOUTER_PAR`) VALUES
(3, 'neymar', 'VID-20170731-WA0010.mp4', 1);

-- --------------------------------------------------------

--
-- Structure de la table `noeud_service`
--

CREATE TABLE `noeud_service` (
  `ID` int(11) NOT NULL,
  `APPELATION` varchar(500) NOT NULL,
  `NOM_RESPONSABLE` varchar(500) NOT NULL,
  `PRENOM_RESPONSABLE` varchar(500) NOT NULL,
  `FOTO` varchar(50) NOT NULL,
  `TELEPHONE` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `TITRE` varchar(20) NOT NULL,
  `NOM_AJOINT` varchar(50) NOT NULL,
  `PRENOM_AJOINT` varchar(30) NOT NULL,
  `FOTO1` varchar(50) NOT NULL,
  `TELEPHONE1` varchar(20) NOT NULL,
  `EMAIL1` varchar(30) NOT NULL,
  `TITRE1` varchar(20) NOT NULL,
  `NIVEAU` int(11) NOT NULL,
  `MERE_ID` int(11) NOT NULL,
  `AJOUTER_PAR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `noeud_service`
--

INSERT INTO `noeud_service` (`ID`, `APPELATION`, `NOM_RESPONSABLE`, `PRENOM_RESPONSABLE`, `FOTO`, `TELEPHONE`, `EMAIL`, `TITRE`, `NOM_AJOINT`, `PRENOM_AJOINT`, `FOTO1`, `TELEPHONE1`, `EMAIL1`, `TITRE1`, `NIVEAU`, `MERE_ID`, `AJOUTER_PAR`) VALUES
(1, 'DG', 'mani', 'sfs', 'CROPPED-fab11.jpg', '23424', 'sfs@dvd', '', '', '', '', '', '', '', 1, 0, 1),
(2, 'Direction des soins', 'Dr Bivahagumye', 'Leonard', 'burundi_20_0.jpg', '79145654', 'm@nnm.bi', '', '', '', '', '', '', '', 2, 1, 1),
(3, 'Direction de l\'administration et de finance', 'Nduwimana ', 'Alexia', '21328414841_45158f515f_b.jpg', '7987654', 'mad@m.bi', '', '', '', '', '', '', '', 2, 1, 1),
(4, 'service Nursing', 'Mushimiyimana', 'Rose', '7778715429_un-test-de-depistage-du-vih-dans-un-cen', '76789876', 'nn@jj.bi', '', '', '', '', '', '', '', 3, 2, 1),
(5, 'aca', 'vas', 'wfw', 'burundi_20_0_3_2.jpg', '798734', 'df@rw', 'Dr', 'fwfw', 'werw', '', '764242', 'dff@wefw', 'Pr', 2, 1, 1),
(6, 'svdS', 'ssd', 'sdfsd', 'burundi_20_0_3_21.jpg', '76765432', 'fef@fw', 'Pr', 'wwe', 'wfw', 'Chirurgie_2.jpg', '798787', 'sfds@wf', 'Dr', 2, 1, 1),
(7, 'xd', 'sf', 'wfw', 'pediatrie.jpg', '791568687', 'hg@hbj', 'Dr', 'wfw', 'wfw', 'medecineInter.jpg', '79876543', 'svs@efw', 'Dr', 3, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `presentation`
--

CREATE TABLE `presentation` (
  `ID` int(11) NOT NULL,
  `PRESENTATION` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `recherche`
--

CREATE TABLE `recherche` (
  `ID` int(11) NOT NULL,
  `TYPE` varchar(200) NOT NULL,
  `SUJET` varchar(500) NOT NULL,
  `NOM` varchar(300) NOT NULL,
  `PRENOM` varchar(200) NOT NULL,
  `TITRE_CHERCHEUR` varchar(20) NOT NULL,
  `TEL` varchar(200) NOT NULL,
  `DATE` date NOT NULL,
  `PDF` varchar(200) NOT NULL,
  `AJOUTER_PAR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recherche`
--

INSERT INTO `recherche` (`ID`, `TYPE`, `SUJET`, `NOM`, `PRENOM`, `TITRE_CHERCHEUR`, `TEL`, `DATE`, `PDF`, `AJOUTER_PAR`) VALUES
(2, 'Recherche clinique', '<p>bjbjkbkjb hjgjhgbj hjbjh<br></p>', 'jbj', 'nkl', 'Pr', '7678765', '2019-03-16', '20190108.pdf', 1),
(3, 'Recherche fondamentale', '<p>ADA<br></p>', 'ads', 're', 'Dr', '767867', '2019-03-16', '201901081.pdf', 1),
(4, 'Recherche clinique', '<p>DFDG</p>', 'FSFS', 'SDFSD', 'Dr', '79125467', '2019-03-16', '201901082.pdf', 1),
(5, 'Recherche clinique', '<p>ADA</p>', 'SDGF', 'WW', 'Pr', '79876543', '2019-03-16', '201901083.pdf', 1);

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `ID` int(11) NOT NULL,
  `NOM` varchar(50) NOT NULL,
  `DESCRIPTION` varchar(500) NOT NULL,
  `FOTO` varchar(200) NOT NULL,
  `NOM_CHEF` varchar(50) NOT NULL,
  `PRENOM_CHEF` varchar(50) NOT NULL,
  `TELEPHONE_CHEF` varchar(50) NOT NULL,
  `NOM_AJOINT` varchar(50) NOT NULL,
  `PRENOM_AJOINT` varchar(50) NOT NULL,
  `TELEPHONE_AJOINT` varchar(50) NOT NULL,
  `AJOUTER_PAR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`ID`, `NOM`, `DESCRIPTION`, `FOTO`, `NOM_CHEF`, `PRENOM_CHEF`, `TELEPHONE_CHEF`, `NOM_AJOINT`, `PRENOM_AJOINT`, `TELEPHONE_AJOINT`, `AJOUTER_PAR`) VALUES
(1, 'Pediatrie', 'soin des enfant', 'pediatrie1.jpg', 'manirambona', 'fabrice', '79876433', 'iradukunda', 'estella', '3243677', 1),
(3, 'Churirgie', 'operation et soin des blessure', 'Chirurgie.jpg', 'uwiteka', 'merise', '78765432', 'Keza', 'alicee', '79876543', 1),
(4, 'Medecine interne', 'soin general', 'medecineInterne.jpg', 'Kana', 'Luise', '7656543', 'Irambona', 'jean', '71234321', 1),
(5, 'Gyneco-Obstetrique', 'Suivie des mere aceinte', 'Gynecologie.jpg', 'Niyongabo', 'Marc', '76879876', 'Mahoro', 'Denis', '7565432', 1),
(6, 'Pharmacie', '<h1><b>vente</b></h1><p>vente des medicaments tous les jours ouvrable</p>', 'pharmacie.jpg', 'man', 'fab', '7656889', 'irakunda', 'ines', '7567654', 1),
(7, 'Annestesie', '<h1><b>Annestesie</b></h1><p>faire dormir les malades&nbsp;</p>', 'anestesie.jpg', 'nibizi', 'Denise', '79876543', 'ganiyo', 'hhh', '76543212', 1),
(8, 'nbj', '<p>bjjjj<br></p>', 'chirurgi.jpg', 'vhv', 'n n ', '78765443', 'bhbhbh', 'nbh', '77777777', 1),
(9, 'aaaa', '<p>jnjknkln</p>', '7778715429_un-test-de-depistage-du-vih-dans-un-centre-de-medecins-du-monde-a-cayenne-illustration.jpg', 'hhbjb', 'jbjb', '79876543', 'bjhbj', 'jbjb', '79890987', 1),
(10, 'csd', '<p>zc<b>&nbsp;aaa</b></p>', 'burundi_20_0_3_2.jpg', 'asda', 'aada', '788789', 'aasd', 'adas', '7779', 1);

-- --------------------------------------------------------

--
-- Structure de la table `soumission`
--

CREATE TABLE `soumission` (
  `ID` int(11) NOT NULL,
  `TITRE` varchar(200) NOT NULL,
  `DESCRIPTION` varchar(5000) NOT NULL,
  `DATE` datetime NOT NULL,
  `EXPIRATION` datetime NOT NULL,
  `PIECE_JOINTE` varchar(100) NOT NULL,
  `AJOUTER_PAR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `soumission`
--

INSERT INTO `soumission` (`ID`, `TITRE`, `DESCRIPTION`, `DATE`, `EXPIRATION`, `PIECE_JOINTE`, `AJOUTER_PAR`) VALUES
(1, 'gyhv', '<p>v bv<br></p>', '2019-02-25 17:56:10', '2019-02-25 18:57:00', '201901083.pdf', 1),
(2, 'hv', '<p>jbj</p>', '2019-03-08 06:22:20', '2019-03-08 06:22:00', '201901084.pdf', 1),
(3, ' mn ', '<p>&nbsp;<span style=\"font-weight: bolder;\">x vxcv ffhfhfhfh ghfhfgfghf gvggvg vjhvjhv vhgvhgv</span><span style=\"font-size: 1rem;\">&nbsp;</span><span style=\"font-size: 1rem; font-weight: bolder;\">x vxcv ffhfhfhfh ghfhfgfghf gvggvg vjhvjhv vhgvhgv</span><span style=\"font-size: 1rem;\">&nbsp;</span><span style=\"font-size: 1rem; font-weight: bolder;\">x vxcv ffhfhfhfh ghfhfgfghf gvggvg vjhvjhv vhgvhgv</span><span style=\"font-size: 1rem;\">&nbsp;</span><span style=\"font-size: 1rem; font-weight: bolder;\">x vxcv ffhfhfhfh ghfhfgfghf gvggvg vjhvjhv vhgvhgv</span><span style=\"font-size: 1rem;\">&nbsp;</span><span style=\"font-size: 1rem; font-weight: bolder;\">x vxcv ffhfhfhfh ghfhfgfghf gvggvg vjhvjhv vhgvhgv</span><span style=\"font-size: 1rem;\">&nbsp;</span><span style=\"font-size: 1rem; font-weight: bolder;\">x vxcv ffhfhfhfh ghfhfgfghf gvggvg vjhvjhv vhgvhgv</span><span style=\"font-size: 1rem;\">&nbsp;</span><span style=\"font-size: 1rem; font-weight: bolder;\">x vxcv ffhfhfhfh ghfhfgfghf gvggvg vjhvjhv vhgvhgv</span><span style=\"font-size: 1rem;\">&nbsp;</span><span style=\"font-size: 1rem; font-weight: bolder;\">x vxcv ffhfhfhfh ghfhfgfghf gvggvg vjhvjhv vhgvhgv</span><br></p>', '2019-03-16 16:08:51', '2019-03-29 16:08:00', 'New_Doc_2019-03-09_16_24_55.pdf', 1);

-- --------------------------------------------------------

--
-- Structure de la table `stage`
--

CREATE TABLE `stage` (
  `ID` int(11) NOT NULL,
  `TITRE` varchar(200) NOT NULL,
  `DESCRIPTION` varchar(5000) NOT NULL,
  `DATE` datetime NOT NULL,
  `EXPIRATION` datetime NOT NULL,
  `PIECE_JOINTE` varchar(100) NOT NULL,
  `AJOUTER_PAR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `stage`
--

INSERT INTO `stage` (`ID`, `TITRE`, `DESCRIPTION`, `DATE`, `EXPIRATION`, `PIECE_JOINTE`, `AJOUTER_PAR`) VALUES
(1, 'bc', '<p>nbvh<br></p>', '2019-02-25 17:55:17', '2019-02-25 18:56:00', '201901081.pdf', 1),
(2, 'vcx', '<p>&nbsp;<span style=\"font-weight: bolder;\">x vxcv ffhfhfhfh ghfhfgfghf gvggvg vjhvjhv vhgvhgv</span><span style=\"font-size: 1rem;\">&nbsp;</span><span style=\"font-size: 1rem; font-weight: bolder;\">x vxcv ffhfhfhfh ghfhfgfghf gvggvg vjhvjhv vhgvhgv</span><span style=\"font-size: 1rem;\">&nbsp;</span><span style=\"font-size: 1rem; font-weight: bolder;\">x vxcv ffhfhfhfh ghfhfgfghf gvggvg vjhvjhv vhgvhgv</span><span style=\"font-size: 1rem;\">&nbsp;</span><span style=\"font-size: 1rem; font-weight: bolder;\">x vxcv ffhfhfhfh ghfhfgfghf gvggvg vjhvjhv vhgvhgv</span><span style=\"font-size: 1rem;\">&nbsp;</span><span style=\"font-size: 1rem; font-weight: bolder;\">x vxcv ffhfhfhfh ghfhfgfghf gvggvg vjhvjhv vhgvhgv</span><span style=\"font-size: 1rem;\">&nbsp;</span><span style=\"font-size: 1rem; font-weight: bolder;\">x vxcv ffhfhfhfh ghfhfgfghf gvggvg vjhvjhv vhgvhgv</span><span style=\"font-size: 1rem;\">&nbsp;</span><span style=\"font-size: 1rem; font-weight: bolder;\">x vxcv ffhfhfhfh ghfhfgfghf gvggvg vjhvjhv vhgvhgv</span><span style=\"font-size: 1rem;\">&nbsp;</span><span style=\"font-size: 1rem; font-weight: bolder;\">x vxcv ffhfhfhfh ghfhfgfghf gvggvg vjhvjhv vhgvhgv</span><span style=\"font-size: 1rem;\">&nbsp;</span><span style=\"font-size: 1rem; font-weight: bolder;\">x vxcv ffhfhfhfh ghfhfgfghf gvggvg vjhvjhv vhgvhgv</span><span style=\"font-size: 1rem;\">&nbsp;</span><span style=\"font-size: 1rem; font-weight: bolder;\">x vxcv ffhfhfhfh ghfhfgfghf gvggvg vjhvjhv vhgvhgv</span><br></p>', '2019-03-16 16:07:26', '2019-03-19 16:07:00', '201901082.pdf', 1);

-- --------------------------------------------------------

--
-- Structure de la table `suggestion`
--

CREATE TABLE `suggestion` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `MESSAGE` varchar(5000) NOT NULL,
  `STATUT` tinyint(4) NOT NULL DEFAULT '0',
  `DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `suggestion`
--

INSERT INTO `suggestion` (`ID`, `EMAIL`, `MESSAGE`, `STATUT`, `DATE`) VALUES
(1, 'hvh@cg', '', 1, '0000-00-00 00:00:00'),
(2, 'fstrg@xfg', '', 1, '0000-00-00 00:00:00'),
(3, 's@fsd', '<p>fsfs</p>', 1, '0000-00-00 00:00:00'),
(4, 'a@a', '<p>b</p>', 1, '0000-00-00 00:00:00'),
(5, 'zxfsdf@dg', '<p>sf</p>', 1, '0000-00-00 00:00:00'),
(6, 'rege@rwe', '<p>rwerw<br></p>', 1, '0000-00-00 00:00:00'),
(7, 'er@ds', '<p>aaaaa<br></p>', 1, '0000-00-00 00:00:00'),
(15, 'sada@wf', '<p>ada</p>', 1, '2019-03-07 20:42:53');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `ID` int(20) NOT NULL,
  `ID_ADMIN` int(11) NOT NULL,
  `NOM` varchar(50) NOT NULL,
  `PRENOM` varchar(50) NOT NULL,
  `TELEPHONE` int(20) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PWD` varchar(50) NOT NULL,
  `PROFIL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID`, `ID_ADMIN`, `NOM`, `PRENOM`, `TELEPHONE`, `EMAIL`, `USERNAME`, `PWD`, `PROFIL`) VALUES
(1, 0, 'Manirambona', 'fabrice', 79158793, 'manirambonafabrice@gmail.com', 'fab', '202cb962ac59075b964b07152d234b70', 'Super admin'),
(4, 1, 'cikjkj', 'jhj', 6786, 'ggh@hjgj', 'a', 'c20ad4d76fe97759aa27a0c99bff6710', 'admin'),
(5, 1, 'aaa', 'sasa', 2121, 'ss@bb', 'aa', 'c20ad4d76fe97759aa27a0c99bff6710', 'Super admin'),
(6, 4, 'zzz', 'xxx', 123, 'jhj@gvgv', 'zzz', 'c20ad4d76fe97759aa27a0c99bff6710', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activites`
--
ALTER TABLE `activites`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `actualites`
--
ALTER TABLE `actualites`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `actualites_foto`
--
ALTER TABLE `actualites_foto`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `defenses`
--
ALTER TABLE `defenses`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `emploi`
--
ALTER TABLE `emploi`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `meilleur_memoire`
--
ALTER TABLE `meilleur_memoire`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `multimedia_audios`
--
ALTER TABLE `multimedia_audios`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `multimedia_fotos`
--
ALTER TABLE `multimedia_fotos`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `multimedia_videos`
--
ALTER TABLE `multimedia_videos`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `noeud_service`
--
ALTER TABLE `noeud_service`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `presentation`
--
ALTER TABLE `presentation`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `recherche`
--
ALTER TABLE `recherche`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `soumission`
--
ALTER TABLE `soumission`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `stage`
--
ALTER TABLE `stage`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `suggestion`
--
ALTER TABLE `suggestion`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activites`
--
ALTER TABLE `activites`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `actualites`
--
ALTER TABLE `actualites`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `actualites_foto`
--
ALTER TABLE `actualites_foto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT pour la table `defenses`
--
ALTER TABLE `defenses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `emploi`
--
ALTER TABLE `emploi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `meilleur_memoire`
--
ALTER TABLE `meilleur_memoire`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `multimedia_audios`
--
ALTER TABLE `multimedia_audios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `multimedia_fotos`
--
ALTER TABLE `multimedia_fotos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `multimedia_videos`
--
ALTER TABLE `multimedia_videos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `noeud_service`
--
ALTER TABLE `noeud_service`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `presentation`
--
ALTER TABLE `presentation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `recherche`
--
ALTER TABLE `recherche`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `soumission`
--
ALTER TABLE `soumission`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `stage`
--
ALTER TABLE `stage`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `suggestion`
--
ALTER TABLE `suggestion`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
