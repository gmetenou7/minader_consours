-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 16, 2023 at 02:32 PM
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
-- Database: `minader_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidats`
--

CREATE TABLE `candidats` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_naissance` varchar(255) NOT NULL,
  `lieu_naissance` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `code_fiche` varchar(255) NOT NULL,
  `anonymat` varchar(255) NOT NULL,
  `code_diplome` varchar(255) NOT NULL,
  `code_parcours` varchar(255) NOT NULL,
  `code_options` varchar(255) NOT NULL,
  `code_centre_formation1` varchar(255) NOT NULL,
  `code_centre_formation2` varchar(255) NOT NULL,
  `code_centre_formation3` varchar(255) NOT NULL,
  `code_langue` varchar(255) NOT NULL,
  `code_centre_examen` varchar(255) NOT NULL,
  `code_centre_depot` varchar(255) NOT NULL,
  `code_sexe` varchar(255) NOT NULL,
  `code_status` varchar(255) NOT NULL,
  `code_nationalite` varchar(255) NOT NULL,
  `code_session` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `centre_depot`
--

CREATE TABLE `centre_depot` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `centre_examen`
--

CREATE TABLE `centre_examen` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `centre_formation`
--

CREATE TABLE `centre_formation` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `centre_formation_options`
--

CREATE TABLE `centre_formation_options` (
  `code_centre_formation` varchar(255) NOT NULL,
  `code_options` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `centre_formation_parcours`
--

CREATE TABLE `centre_formation_parcours` (
  `code_parcours` varchar(255) NOT NULL,
  `code_centre_formation` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dimplome_parcours`
--

CREATE TABLE `dimplome_parcours` (
  `code_diplome` varchar(255) NOT NULL,
  `code_parcours` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `diplome`
--

CREATE TABLE `diplome` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `link_doc` varchar(255) NOT NULL,
  `code_intitule_doc` varchar(255) NOT NULL,
  `code_candidat` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `intitule_doc`
--

CREATE TABLE `intitule_doc` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `langue`
--

CREATE TABLE `langue` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nationalite`
--

CREATE TABLE `nationalite` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notecg`
--

CREATE TABLE `notecg` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `note` double NOT NULL,
  `code_candidat` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notecs`
--

CREATE TABLE `notecs` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `note` double NOT NULL,
  `code_candidat` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `parcours`
--

CREATE TABLE `parcours` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `parcours_options`
--

CREATE TABLE `parcours_options` (
  `code_parcours` varchar(255) NOT NULL,
  `code_options` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `annee` varchar(255) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sexe`
--

CREATE TABLE `sexe` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `code`, `nom`, `created_at`, `updated_at`) VALUES
(1, '23-00001', 'admin', '2023-04-16 00:00:00', '2023-04-16 00:00:00'),
(2, '23-00002', 'note', '2023-04-16 00:00:00', '2023-04-16 00:00:00'),
(3, '23-00003', 'dossier', '2023-04-16 00:00:00', '2023-04-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code_users_groups` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `code`, `nom`, `prenom`, `email`, `telephone`, `state`, `password`, `code_users_groups`, `created_at`, `updated_at`) VALUES
(1, '23-00047', 'NGUEKENG METENOU', 'GILDAS', 'oktest@ok.com', '+237657533794', 1, '$2y$10$jUTaSQzjx3RaN8vjVJZDY.4Bfy3AR0yHAoP2i1jGs9s28l0NtkqXm', '23-00002', '2023-04-16 10:22:08', '2023-04-16 13:49:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidats`
--
ALTER TABLE `candidats`
  ADD PRIMARY KEY (`code`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `anonymat` (`anonymat`),
  ADD KEY `code_diplome` (`code_diplome`),
  ADD KEY `code_parcours` (`code_parcours`),
  ADD KEY `code_options` (`code_options`),
  ADD KEY `code_centre_formation` (`code_centre_formation1`),
  ADD KEY `code_langue` (`code_langue`),
  ADD KEY `code_centre_examen` (`code_centre_examen`),
  ADD KEY `code_centre_depot` (`code_centre_depot`),
  ADD KEY `code_sexe` (`code_sexe`),
  ADD KEY `code_status` (`code_status`),
  ADD KEY `code_nationalite` (`code_nationalite`),
  ADD KEY `code_session` (`code_session`),
  ADD KEY `code_centre_formation2` (`code_centre_formation2`),
  ADD KEY `code_centre_formation3` (`code_centre_formation3`),
  ADD KEY `code_fiche` (`code_fiche`,`anonymat`);

--
-- Indexes for table `centre_depot`
--
ALTER TABLE `centre_depot`
  ADD PRIMARY KEY (`code`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `centre_examen`
--
ALTER TABLE `centre_examen`
  ADD PRIMARY KEY (`code`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `centre_formation`
--
ALTER TABLE `centre_formation`
  ADD PRIMARY KEY (`code`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `centre_formation_options`
--
ALTER TABLE `centre_formation_options`
  ADD PRIMARY KEY (`code_centre_formation`,`code_options`),
  ADD KEY `code_options` (`code_options`);

--
-- Indexes for table `centre_formation_parcours`
--
ALTER TABLE `centre_formation_parcours`
  ADD PRIMARY KEY (`code_parcours`,`code_centre_formation`),
  ADD KEY `code_centre_formation` (`code_centre_formation`);

--
-- Indexes for table `dimplome_parcours`
--
ALTER TABLE `dimplome_parcours`
  ADD PRIMARY KEY (`code_diplome`,`code_parcours`),
  ADD KEY `code_parcours` (`code_parcours`);

--
-- Indexes for table `diplome`
--
ALTER TABLE `diplome`
  ADD PRIMARY KEY (`code`),
  ADD UNIQUE KEY `unique diplome id` (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`code`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `code_intitule_doc` (`code_intitule_doc`),
  ADD KEY `code_candidat` (`code_candidat`);

--
-- Indexes for table `intitule_doc`
--
ALTER TABLE `intitule_doc`
  ADD PRIMARY KEY (`code`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `langue`
--
ALTER TABLE `langue`
  ADD PRIMARY KEY (`code`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `nationalite`
--
ALTER TABLE `nationalite`
  ADD PRIMARY KEY (`code`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `notecg`
--
ALTER TABLE `notecg`
  ADD PRIMARY KEY (`code`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `code_candidat` (`code_candidat`);

--
-- Indexes for table `notecs`
--
ALTER TABLE `notecs`
  ADD PRIMARY KEY (`code`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `code_candidat` (`code_candidat`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`code`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `parcours`
--
ALTER TABLE `parcours`
  ADD PRIMARY KEY (`code`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `parcours_options`
--
ALTER TABLE `parcours_options`
  ADD PRIMARY KEY (`code_parcours`,`code_options`),
  ADD KEY `code_options` (`code_options`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`code`),
  ADD UNIQUE KEY `unique session id` (`id`);

--
-- Indexes for table `sexe`
--
ALTER TABLE `sexe`
  ADD PRIMARY KEY (`code`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`code`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`code`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`code`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `code_users_groups` (`code_users_groups`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidats`
--
ALTER TABLE `candidats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `centre_depot`
--
ALTER TABLE `centre_depot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `centre_examen`
--
ALTER TABLE `centre_examen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `centre_formation`
--
ALTER TABLE `centre_formation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diplome`
--
ALTER TABLE `diplome`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `intitule_doc`
--
ALTER TABLE `intitule_doc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `langue`
--
ALTER TABLE `langue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nationalite`
--
ALTER TABLE `nationalite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notecg`
--
ALTER TABLE `notecg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notecs`
--
ALTER TABLE `notecs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parcours`
--
ALTER TABLE `parcours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sexe`
--
ALTER TABLE `sexe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidats`
--
ALTER TABLE `candidats`
  ADD CONSTRAINT `candidats_ibfk_1` FOREIGN KEY (`code_diplome`) REFERENCES `diplome` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `candidats_ibfk_10` FOREIGN KEY (`code_nationalite`) REFERENCES `nationalite` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `candidats_ibfk_11` FOREIGN KEY (`code_session`) REFERENCES `session` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `candidats_ibfk_12` FOREIGN KEY (`code_centre_formation2`) REFERENCES `centre_formation` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `candidats_ibfk_13` FOREIGN KEY (`code_centre_formation3`) REFERENCES `centre_formation` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `candidats_ibfk_2` FOREIGN KEY (`code_parcours`) REFERENCES `parcours` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `candidats_ibfk_3` FOREIGN KEY (`code_options`) REFERENCES `notecs` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `candidats_ibfk_4` FOREIGN KEY (`code_centre_formation1`) REFERENCES `centre_formation` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `candidats_ibfk_5` FOREIGN KEY (`code_langue`) REFERENCES `langue` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `candidats_ibfk_6` FOREIGN KEY (`code_centre_examen`) REFERENCES `centre_examen` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `candidats_ibfk_7` FOREIGN KEY (`code_centre_depot`) REFERENCES `candidats` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `candidats_ibfk_8` FOREIGN KEY (`code_sexe`) REFERENCES `sexe` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `candidats_ibfk_9` FOREIGN KEY (`code_status`) REFERENCES `status` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `centre_formation_options`
--
ALTER TABLE `centre_formation_options`
  ADD CONSTRAINT `centre_formation_options_ibfk_1` FOREIGN KEY (`code_centre_formation`) REFERENCES `centre_formation` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `centre_formation_options_ibfk_2` FOREIGN KEY (`code_options`) REFERENCES `options` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `centre_formation_parcours`
--
ALTER TABLE `centre_formation_parcours`
  ADD CONSTRAINT `centre_formation_parcours_ibfk_1` FOREIGN KEY (`code_centre_formation`) REFERENCES `centre_formation` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `centre_formation_parcours_ibfk_2` FOREIGN KEY (`code_parcours`) REFERENCES `parcours` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dimplome_parcours`
--
ALTER TABLE `dimplome_parcours`
  ADD CONSTRAINT `dimplome_parcours_ibfk_1` FOREIGN KEY (`code_diplome`) REFERENCES `diplome` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dimplome_parcours_ibfk_2` FOREIGN KEY (`code_parcours`) REFERENCES `parcours` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`code_intitule_doc`) REFERENCES `intitule_doc` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `documents_ibfk_2` FOREIGN KEY (`code_candidat`) REFERENCES `candidats` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notecg`
--
ALTER TABLE `notecg`
  ADD CONSTRAINT `notecg_ibfk_1` FOREIGN KEY (`code_candidat`) REFERENCES `candidats` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notecs`
--
ALTER TABLE `notecs`
  ADD CONSTRAINT `notecs_ibfk_1` FOREIGN KEY (`code_candidat`) REFERENCES `candidats` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `parcours_options`
--
ALTER TABLE `parcours_options`
  ADD CONSTRAINT `parcours_options_ibfk_1` FOREIGN KEY (`code_options`) REFERENCES `options` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parcours_options_ibfk_2` FOREIGN KEY (`code_parcours`) REFERENCES `parcours` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `utilisateurs_ibfk_1` FOREIGN KEY (`code_users_groups`) REFERENCES `users_groups` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
