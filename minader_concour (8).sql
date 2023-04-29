-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 28, 2023 at 07:02 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minader_concour`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidat`
--

CREATE TABLE `candidat` (
  `id` int(11) NOT NULL,
  `num_recepice` varchar(255) DEFAULT NULL,
  `nom_complet` varchar(255) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `parcour` varchar(255) DEFAULT NULL,
  `parcour_option` varchar(255) DEFAULT NULL,
  `statut_candidat` varchar(255) DEFAULT NULL,
  `sexe` varchar(255) DEFAULT NULL,
  `nationalite_candidat` varchar(255) DEFAULT NULL,
  `centre_depot_dossier` varchar(255) DEFAULT NULL,
  `centre_examen` varchar(255) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `lieu_naissance` varchar(255) DEFAULT NULL,
  `diplome_entrer` varchar(255) DEFAULT NULL,
  `etat_diplome` varchar(255) DEFAULT NULL,
  `ecole_choisi_1` varchar(255) DEFAULT NULL,
  `ecole_choisi_2` varchar(255) DEFAULT NULL,
  `ecole_choisi_3` varchar(255) DEFAULT NULL,
  `langue_candidat` varchar(255) DEFAULT NULL,
  `telephone_candidat` varchar(255) DEFAULT NULL,
  `telephone_parent` varchar(255) DEFAULT NULL,
  `certif_acte_naiss` varchar(255) DEFAULT NULL,
  `certif_medical` varchar(255) DEFAULT NULL,
  `autori_minader` varchar(255) DEFAULT NULL,
  `certif_diplome` varchar(255) DEFAULT NULL,
  `photo_candidat` varchar(255) DEFAULT NULL,
  `recu_paie` varchar(255) DEFAULT NULL,
  `attest_diplome` varchar(255) DEFAULT NULL,
  `attest_ancien` varchar(255) DEFAULT NULL,
  `code_fiche` varchar(255) DEFAULT NULL,
  `anonymat` varchar(255) DEFAULT NULL,
  `creer_le` datetime DEFAULT NULL,
  `modifier_le` datetime DEFAULT NULL,
  `etat` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidat`
--

INSERT INTO `candidat` (`id`, `num_recepice`, `nom_complet`, `session`, `parcour`, `parcour_option`, `statut_candidat`, `sexe`, `nationalite_candidat`, `centre_depot_dossier`, `centre_examen`, `date_naissance`, `lieu_naissance`, `diplome_entrer`, `etat_diplome`, `ecole_choisi_1`, `ecole_choisi_2`, `ecole_choisi_3`, `langue_candidat`, `telephone_candidat`, `telephone_parent`, `certif_acte_naiss`, `certif_medical`, `autori_minader`, `certif_diplome`, `photo_candidat`, `recu_paie`, `attest_diplome`, `attest_ancien`, `code_fiche`, `anonymat`, `creer_le`, `modifier_le`, `etat`) VALUES
(1, '79804042840', 'GILDAS NGUEKENG METENOU', 2023, 'ATA', '', 'EXTERNE', 'MASCULIN', 'Etranger', 'EFSDC-KUMBA', 'CRA-MAROUA', '1998-03-02', 'KUMBA', 'GCE-O-L-SCIENCE', 'SOUS-RESERVE', 'EFSDC-SANTA', 'ETA-EBOLOWA', 'EFSDC-KUMBA', 'ANGLAIS', '657533794', '657533794', 'uploads/79804042840_EFSDC-SANTA_2023_ATA_EXTERNE_Etranger/certif_acte.pdf', 'uploads/79804042840_EFSDC-SANTA_2023_ATA_EXTERNE_Etranger/recu.pdf', NULL, 'uploads/79804042840_EFSDC-SANTA_2023_ATA_EXTERNE_Etranger/certif_dip.pdf', 'uploads/79804042840_EFSDC-SANTA_2023_ATA_EXTERNE_Etranger/photo.jpeg', 'uploads/79804042840_EFSDC-SANTA_2023_ATA_EXTERNE_Etranger/recu.pdf', 'uploads/79804042840_EFSDC-SANTA_2023_ATA_EXTERNE_Etranger/recu.pdf', NULL, NULL, NULL, '2023-04-28 08:44:44', NULL, 1),
(2, '68478539643', 'GILDAS NGUEKENG METENOU', 2023, 'ATA', '', 'EXTERNE', 'FEMININ', 'Etranger', 'CRA-BAMBILI', 'DEFACC', '1951-02-03', 'KUMBA', 'GCE-O-L-ART', 'SOUS-RESERVE', 'EFSDC-KUMBA', 'ETA-BAFANG', 'ETA-MAROUA', 'ANGLAIS', '657533794', '657533794', 'uploads/68478539643_EFSDC-KUMBA_2023_ATA_EXTERNE_Etranger/certif_acte.pdf', 'uploads/68478539643_EFSDC-KUMBA_2023_ATA_EXTERNE_Etranger/certif_medic.pdf', NULL, 'uploads/68478539643_EFSDC-KUMBA_2023_ATA_EXTERNE_Etranger/certif_dip.pdf', 'uploads/68478539643_EFSDC-KUMBA_2023_ATA_EXTERNE_Etranger/photo.jpeg', 'uploads/68478539643_EFSDC-KUMBA_2023_ATA_EXTERNE_Etranger/recu.pdf', 'uploads/68478539643_EFSDC-KUMBA_2023_ATA_EXTERNE_Etranger/attest_dip.pdf', NULL, NULL, NULL, '2023-04-28 11:08:37', NULL, 0),
(3, '86182988508', 'GILDAS NGUEKENG METENOU', 2023, 'ATA', '', 'EXTERNE', 'FEMININ', 'Cameroun', 'DRADER-LITTORAL', 'CRA-BAMBILI', '1951-02-02', 'KUMBA', 'GCE-O-L-ART', 'SOUS-RESERVE', 'EFSDC-GUIDER', 'ETA-ABONG-MBANG', 'EFSDC-KUMBA', 'FRANCAIS', '657533794', '657533794', 'uploads/86182988508_EFSDC-GUIDER_2023_ATA_EXTERNE_Cameroun/certif_acte.pdf', 'uploads/86182988508_EFSDC-GUIDER_2023_ATA_EXTERNE_Cameroun/certif_medic.pdf', NULL, 'uploads/86182988508_EFSDC-GUIDER_2023_ATA_EXTERNE_Cameroun/certif_dip.pdf', 'uploads/86182988508_EFSDC-GUIDER_2023_ATA_EXTERNE_Cameroun/photo.jpg', 'uploads/86182988508_EFSDC-GUIDER_2023_ATA_EXTERNE_Cameroun/recu.pdf', 'uploads/86182988508_EFSDC-GUIDER_2023_ATA_EXTERNE_Cameroun/attest_dip.pdf', NULL, NULL, NULL, '2023-04-28 13:03:04', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `centre_depot`
--

CREATE TABLE `centre_depot` (
  `nom_centre_depot` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `centre_depot`
--

INSERT INTO `centre_depot` (`nom_centre_depot`) VALUES
('CRA-BAMBILI'),
('DRADER-LITTORAL'),
('EFSDC-KUMBA');

-- --------------------------------------------------------

--
-- Table structure for table `centre_examen_s`
--

CREATE TABLE `centre_examen_s` (
  `nom_centre_examen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `centre_examen_s`
--

INSERT INTO `centre_examen_s` (`nom_centre_examen`) VALUES
('CIEPO'),
('CRA-BAMBILI'),
('CRA-EBOLOWA'),
('CRA-MAROUA'),
('DEFACC'),
('DOUALA'),
('DRADER-ADAMAOUA'),
('DRADER-LITTORAL'),
('EFSC-BAMENDA'),
('EFSC-EBOLOWA'),
('EFSDC-GUIDER'),
('EFSDC-KUMBA'),
('EFSDC-SANTA'),
('EFSEAR-KUMBA'),
('ETA-ABONG-MBANG'),
('ETA-BAFANG'),
('ETA-BAMBILI'),
('ETA-DIBOMBARI'),
('ETA-EBOLOWA'),
('ETA-GAROUA'),
('ETA-MAROUA'),
('ETA-NKAMBE'),
('ETA-SANGMELIMA'),
('HORTI-FLORAL'),
('ISAGO'),
('ISMAM'),
('ISSAEER'),
('ISTAO'),
('NGAOUNDERE'),
('TEST'),
('WALYA-SUP'),
('YAOUNDE');

-- --------------------------------------------------------

--
-- Table structure for table `centre_formation_option`
--

CREATE TABLE `centre_formation_option` (
  `ref_option` varchar(255) NOT NULL,
  `ref_formation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `centre_formation_option`
--

INSERT INTO `centre_formation_option` (`ref_option`, `ref_formation`) VALUES
('CAP', 'CRA-EBOLOWA'),
('CAP', 'CRA-MAROUA'),
('CAP', 'EFSDC-GUIDER'),
('CAP', 'EFSDC-SANTA'),
('EAP', 'CRA-BAMBILI'),
('EAP', 'ETA-ABONG-MBANG'),
('EAP', 'ETA-BAFANG'),
('EAP', 'ETA-BAMBILI'),
('EAP', 'ETA-DIBOMBARI'),
('EAP', 'ETA-EBOLOWA'),
('EAP', 'ETA-GAROUA'),
('EAP', 'ETA-MAROUA'),
('EAP', 'ETA-NKAMBE'),
('EAP', 'ETA-SANGMELIMA'),
('EAP', 'ISAGO'),
('EAP', 'ISSAEER'),
('EAP', 'ISTAO'),
('GEC', 'EFSC-BAMENDA'),
('GEC', 'EFSC-EBOLOWA');

-- --------------------------------------------------------

--
-- Table structure for table `centre_formation_parcour`
--

CREATE TABLE `centre_formation_parcour` (
  `ref_parcour` varchar(255) NOT NULL,
  `ref_centre_formation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `centre_formation_parcour`
--

INSERT INTO `centre_formation_parcour` (`ref_parcour`, `ref_centre_formation`) VALUES
('TSA', 'CRA-EBOLOWA'),
('TSA', 'CRA-MAROUA'),
('TSA', 'EFSDC-KUMBA'),
('TSA', 'EFSDC-SANTA'),
('TSA', 'CRA-BAMBILI'),
('TSA', 'ETA-ABONG-MBANG'),
('TSA', 'ETA-BAFANG'),
('TSA', 'ETA-BAMBILI'),
('TSA', 'ETA-DIBOMBARI'),
('TSA', 'ETA-EBOLOWA'),
('TSA', 'ETA-GAROUA'),
('TSA', 'ETA-MAROUA'),
('TSA', 'ETA-NKAMBE'),
('TSA', 'ETA-SANGMELIMA'),
('TSA', 'ISAGO'),
('TSA', 'ISSAEER'),
('TSA', 'ISTAO'),
('TSA', 'EFSC-EBOLOWA'),
('TSA', 'EFSC-BAMENDA'),
('TSGR', 'EFSEAR-KUMBA'),
('TSGR', 'ETA-GAROUA'),
('TSGR', 'CIEPO'),
('TA', 'CRA-EBOLOWA'),
('TA', 'CRA-MAROUA'),
('TA', 'EFSDC-GUIDER'),
('TA', 'EFSDC-KUMBA'),
('TA', 'CRA-BAMBILI'),
('TA', 'ETA-ABONG-MBANG'),
('TA', 'ETA-BAFANG'),
('TA', 'ETA-DIBOMBARI'),
('TA', 'ETA-EBOLOWA'),
('TA', 'ETA-GAROUA'),
('TA', 'ETA-MAROUA'),
('TA', 'ETA-NKAMBE'),
('TA', 'ETA-SANGMELIMA'),
('TA', 'ISAGO'),
('TA', 'EFSC-EBOLOWA'),
('ATA', 'EFSDC-GUIDER'),
('ATA', 'EFSDC-KUMBA'),
('ATA', 'EFSDC-SANTA'),
('ATA', 'ETA-ABONG-MBANG'),
('ATA', 'ETA-BAFANG'),
('ATA', 'ETA-DIBOMBARI'),
('ATA', 'ETA-EBOLOWA'),
('ATA', 'ETA-MAROUA'),
('ATA', 'ETA-NKAMBE'),
('ATA', 'ETA-SANGMELIMA'),
('ATA', 'EFSC-EBOLOWA');

-- --------------------------------------------------------

--
-- Table structure for table `centre_formation_s`
--

CREATE TABLE `centre_formation_s` (
  `nom_centre_formation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `centre_formation_s`
--

INSERT INTO `centre_formation_s` (`nom_centre_formation`) VALUES
('CIEPO'),
('CRA-BAMBILI'),
('CRA-EBOLOWA'),
('CRA-MAROUA'),
('EFSC-BAMENDA'),
('EFSC-EBOLOWA'),
('EFSDC-GUIDER'),
('EFSDC-KUMBA'),
('EFSDC-SANTA'),
('EFSEAR-KUMBA'),
('ETA-ABONG-MBANG'),
('ETA-BAFANG'),
('ETA-BAMBILI'),
('ETA-DIBOMBARI'),
('ETA-EBOLOWA'),
('ETA-GAROUA'),
('ETA-MAROUA'),
('ETA-NKAMBE'),
('ETA-SANGMELIMA'),
('ISAGO'),
('ISSAEER'),
('ISTAO');

-- --------------------------------------------------------

--
-- Table structure for table `diplome_entrer`
--

CREATE TABLE `diplome_entrer` (
  `nom_diplome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diplome_entrer`
--

INSERT INTO `diplome_entrer` (`nom_diplome`) VALUES
('BACCALAUREAT'),
('BACCALAUREAT-C'),
('BACCALAUREAT-D'),
('BACCALAUREAT-E'),
('BACCALAUREAT-FIG'),
('BEPC'),
('BREVET-PRO'),
('BREVET-PRO-COMMERCIALES '),
('BREVET-PRO-INDUSTRIEL'),
('BREVET-TECHNICIEN'),
('GCE-ADVANCED-L'),
('GCE-O-L-ART'),
('GCE-O-L-SCIENCE'),
('PROBATOIRE-A1'),
('PROBATOIRE-A2'),
('PROBATOIRE-A4'),
('PROBATOIRE-ACA'),
('PROBATOIRE-ACC'),
('PROBATOIRE-AF1'),
('PROBATOIRE-AF2'),
('PROBATOIRE-AF3'),
('PROBATOIRE-AG/PA'),
('PROBATOIRE-AG/PV'),
('PROBATOIRE-AG/TP'),
('PROBATOIRE-B'),
('PROBATOIRE-C'),
('PROBATOIRE-CG'),
('PROBATOIRE-CI'),
('PROBATOIRE-D'),
('PROBATOIRE-E'),
('PROBATOIRE-EF'),
('PROBATOIRE-ESF'),
('PROBATOIRE-F1'),
('PROBATOIRE-F2'),
('PROBATOIRE-F3'),
('PROBATOIRE-F4/BA'),
('PROBATOIRE-F4/BE'),
('PROBATOIRE-F4/TP'),
('PROBATOIRE-F5'),
('PROBATOIRE-F7/BIOCH'),
('PROBATOIRE-F7/BIOLO'),
('PROBATOIRE-F8'),
('PROBATOIRE-FIG'),
('PROBATOIRE-GT'),
('PROBATOIRE-HH'),
('PROBATOIRE-HR'),
('PROBATOIRE-IB'),
('PROBATOIRE-IH'),
('PROBATOIRE-IS'),
('PROBATOIRE-MA'),
('PROBATOIRE-MAV'),
('PROBATOIRE-MEB'),
('PROBATOIRE-MEM'),
('PROBATOIRE-MF/CM'),
('PROBATOIRE-MHB'),
('PROBATOIRE-TAC'),
('PROBATOIRE-TGT');

-- --------------------------------------------------------

--
-- Table structure for table `diplome_entrer_parcour`
--

CREATE TABLE `diplome_entrer_parcour` (
  `diplome_ref` varchar(255) NOT NULL,
  `parcour_ref` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diplome_entrer_parcour`
--

INSERT INTO `diplome_entrer_parcour` (`diplome_ref`, `parcour_ref`) VALUES
('BACCALAUREAT-C', 'TSGR'),
('BACCALAUREAT-D', 'TSGR'),
('BACCALAUREAT-E', 'TSGR'),
('BEPC', 'ATA'),
('GCE-O-L-ART', 'ATA'),
('GCE-O-L-SCIENCE', 'ATA'),
('PROBATOIRE-A1', 'TA'),
('PROBATOIRE-A2', 'TA'),
('PROBATOIRE-A4', 'TA'),
('PROBATOIRE-ACA', 'TA'),
('PROBATOIRE-ACC', 'TA'),
('PROBATOIRE-AF1', 'TA'),
('PROBATOIRE-AF2', 'TA'),
('PROBATOIRE-AF3', 'TA'),
('PROBATOIRE-AG/PA', 'TA'),
('PROBATOIRE-AG/PV', 'TA'),
('PROBATOIRE-AG/TP', 'TA'),
('PROBATOIRE-B', 'TA'),
('PROBATOIRE-C', 'TA'),
('PROBATOIRE-CG', 'TA'),
('PROBATOIRE-CI', 'TA'),
('PROBATOIRE-D', 'TA'),
('PROBATOIRE-E', 'TA'),
('PROBATOIRE-EF', 'TA'),
('PROBATOIRE-ESF', 'TA'),
('PROBATOIRE-F1', 'TA'),
('PROBATOIRE-F2', 'TA'),
('PROBATOIRE-F3', 'TA'),
('PROBATOIRE-F4/BA', 'TA'),
('PROBATOIRE-F4/BE', 'TA'),
('PROBATOIRE-F4/TP', 'TA'),
('PROBATOIRE-F5', 'TA'),
('PROBATOIRE-F7/BIOCH', 'TA'),
('PROBATOIRE-F7/BIOLO', 'TA'),
('PROBATOIRE-F8', 'TA'),
('PROBATOIRE-FIG', 'TA'),
('PROBATOIRE-GT', 'TA'),
('PROBATOIRE-HH', 'TA'),
('PROBATOIRE-HR', 'TA'),
('PROBATOIRE-IB', 'TA'),
('PROBATOIRE-IH', 'TA'),
('PROBATOIRE-IS', 'TA'),
('PROBATOIRE-MA', 'TA'),
('PROBATOIRE-MAV', 'TA'),
('PROBATOIRE-MEB', 'TA'),
('PROBATOIRE-MEM', 'TA'),
('PROBATOIRE-MF/CM', 'TA'),
('PROBATOIRE-MHB', 'TA'),
('PROBATOIRE-TAC', 'TA'),
('PROBATOIRE-TGT', 'TA'),
('BACCALAUREAT', 'TSA');

-- --------------------------------------------------------

--
-- Table structure for table `notecg`
--

CREATE TABLE `notecg` (
  `id` int(11) NOT NULL,
  `idcandidat` varchar(255) DEFAULT NULL,
  `notecg` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notecs`
--

CREATE TABLE `notecs` (
  `id` int(11) NOT NULL,
  `idcandidat` varchar(255) DEFAULT NULL,
  `notecs` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notecs`
--

INSERT INTO `notecs` (`id`, `idcandidat`, `notecs`) VALUES
(1, 'K0A01', '20');

-- --------------------------------------------------------

--
-- Table structure for table `option_p`
--

CREATE TABLE `option_p` (
  `nom_option` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `option_p`
--

INSERT INTO `option_p` (`nom_option`) VALUES
('CAP'),
('EAP'),
('GEC');

-- --------------------------------------------------------

--
-- Table structure for table `option_parcour`
--

CREATE TABLE `option_parcour` (
  `idoption` varchar(255) NOT NULL,
  `idparcour` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `option_parcour`
--

INSERT INTO `option_parcour` (`idoption`, `idparcour`) VALUES
('CAP', 'TSA'),
('EAP', 'TSA'),
('GEC', 'TSA');

-- --------------------------------------------------------

--
-- Table structure for table `parcour_s`
--

CREATE TABLE `parcour_s` (
  `nom_parcour` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parcour_s`
--

INSERT INTO `parcour_s` (`nom_parcour`) VALUES
('ATA'),
('TA'),
('TSA'),
('TSGR');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `nom_session` float NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `nom_session`, `date_debut`, `date_fin`) VALUES
(1, 2023, '2023-04-18 00:00:00', '2023-04-18 23:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `matricule` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `statut` varchar(255) DEFAULT NULL,
  `etat` varchar(10) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `last_connexion` datetime DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `matricule`, `nom`, `statut`, `etat`, `password`, `create_at`, `update_at`, `last_connexion`, `username`, `email`, `tel`) VALUES
(1, '23JEYZ8', 'GILDAS NGUEKENG METENOU', 'admin', 'on', '$2a$12$y6L1wby6RDs/c9XEhHk0Auf4UqrRt935Q9Tz3BWWjVYo8VzFWkeCK', '2023-04-18 05:30:59', '2023-04-18 05:41:09', '2023-04-28 13:30:29', NULL, 'ingenieursage@gmail.com', '+33650378450');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidat`
--
ALTER TABLE `candidat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `num_recepice` (`num_recepice`),
  ADD KEY `id_2` (`id`),
  ADD KEY `num_recepice_2` (`num_recepice`),
  ADD KEY `nom_complet` (`nom_complet`),
  ADD KEY `anonymat` (`anonymat`) USING BTREE;

--
-- Indexes for table `centre_depot`
--
ALTER TABLE `centre_depot`
  ADD PRIMARY KEY (`nom_centre_depot`);

--
-- Indexes for table `centre_examen_s`
--
ALTER TABLE `centre_examen_s`
  ADD PRIMARY KEY (`nom_centre_examen`);

--
-- Indexes for table `centre_formation_option`
--
ALTER TABLE `centre_formation_option`
  ADD PRIMARY KEY (`ref_option`,`ref_formation`),
  ADD KEY `ref_option` (`ref_option`),
  ADD KEY `ref_formation` (`ref_formation`);

--
-- Indexes for table `centre_formation_parcour`
--
ALTER TABLE `centre_formation_parcour`
  ADD KEY `ref_parcour` (`ref_parcour`),
  ADD KEY `ref_centre_formation` (`ref_centre_formation`);

--
-- Indexes for table `centre_formation_s`
--
ALTER TABLE `centre_formation_s`
  ADD PRIMARY KEY (`nom_centre_formation`),
  ADD UNIQUE KEY `nom_centre_formation` (`nom_centre_formation`),
  ADD KEY `nom_centre_formation_2` (`nom_centre_formation`);

--
-- Indexes for table `diplome_entrer`
--
ALTER TABLE `diplome_entrer`
  ADD PRIMARY KEY (`nom_diplome`),
  ADD KEY `nom_diplome` (`nom_diplome`);

--
-- Indexes for table `diplome_entrer_parcour`
--
ALTER TABLE `diplome_entrer_parcour`
  ADD KEY `diplome_ref` (`diplome_ref`),
  ADD KEY `parcour_ref` (`parcour_ref`);

--
-- Indexes for table `notecg`
--
ALTER TABLE `notecg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcandidat` (`idcandidat`);

--
-- Indexes for table `notecs`
--
ALTER TABLE `notecs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcandidat` (`idcandidat`);

--
-- Indexes for table `option_p`
--
ALTER TABLE `option_p`
  ADD PRIMARY KEY (`nom_option`),
  ADD KEY `nom_option` (`nom_option`);

--
-- Indexes for table `option_parcour`
--
ALTER TABLE `option_parcour`
  ADD PRIMARY KEY (`idoption`,`idparcour`),
  ADD KEY `idparcour` (`idparcour`);

--
-- Indexes for table `parcour_s`
--
ALTER TABLE `parcour_s`
  ADD PRIMARY KEY (`nom_parcour`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matricule` (`matricule`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidat`
--
ALTER TABLE `candidat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notecg`
--
ALTER TABLE `notecg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notecs`
--
ALTER TABLE `notecs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `centre_formation_option`
--
ALTER TABLE `centre_formation_option`
  ADD CONSTRAINT `centre_formation_option_ibfk_1` FOREIGN KEY (`ref_formation`) REFERENCES `centre_formation_s` (`nom_centre_formation`),
  ADD CONSTRAINT `centre_formation_option_ibfk_2` FOREIGN KEY (`ref_option`) REFERENCES `option_p` (`nom_option`);

--
-- Constraints for table `centre_formation_parcour`
--
ALTER TABLE `centre_formation_parcour`
  ADD CONSTRAINT `centre_formation_parcour_ibfk_1` FOREIGN KEY (`ref_parcour`) REFERENCES `parcour_s` (`nom_parcour`),
  ADD CONSTRAINT `centre_formation_parcour_ibfk_2` FOREIGN KEY (`ref_centre_formation`) REFERENCES `centre_formation_s` (`nom_centre_formation`);

--
-- Constraints for table `diplome_entrer_parcour`
--
ALTER TABLE `diplome_entrer_parcour`
  ADD CONSTRAINT `diplome_entrer_parcour_ibfk_1` FOREIGN KEY (`diplome_ref`) REFERENCES `diplome_entrer` (`nom_diplome`),
  ADD CONSTRAINT `diplome_entrer_parcour_ibfk_2` FOREIGN KEY (`parcour_ref`) REFERENCES `parcour_s` (`nom_parcour`);

--
-- Constraints for table `notecg`
--
ALTER TABLE `notecg`
  ADD CONSTRAINT `notecg_ibfk_1` FOREIGN KEY (`idcandidat`) REFERENCES `candidat` (`anonymat`);

--
-- Constraints for table `notecs`
--
ALTER TABLE `notecs`
  ADD CONSTRAINT `notecs_ibfk_1` FOREIGN KEY (`idcandidat`) REFERENCES `candidat` (`anonymat`);

--
-- Constraints for table `option_parcour`
--
ALTER TABLE `option_parcour`
  ADD CONSTRAINT `option_parcour_ibfk_1` FOREIGN KEY (`idoption`) REFERENCES `option_p` (`nom_option`),
  ADD CONSTRAINT `option_parcour_ibfk_2` FOREIGN KEY (`idparcour`) REFERENCES `parcour_s` (`nom_parcour`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
