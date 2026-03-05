-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 05 mars 2026 à 23:36
-- Version du serveur : 8.0.43
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `devis`
--

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------


--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `civilite` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_client` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_client` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_postal_client` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville_client` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tva_intra` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rcs` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `civilite`, `nom_client`, `adresse_client`, `code_postal_client`, `ville_client`, `tel`, `tva_intra`, `rcs`, `created_at`, `updated_at`) VALUES
(1, '132', 'PERDRIX', '1 chemin de la conge', '85560', 'LONGEVILLE', NULL, NULL, NULL, '2026-01-08', '2026-03-05'),
(2, NULL, 'DEPREUX Construction', '146 route des Sorinières', '44400', 'REZE', '02.40.59.77.77', 'FR 31 350 460 101', 'B 350 460 101 NANTES', '2026-01-08', '2026-01-08'),
(3, NULL, 'CHEREAU et BLANLOEIL', '3 all; du clos des Meuniers', '44690', 'MONNIERES', '06 16 78 08 96', NULL, NULL, '2026-01-08', '2026-01-08'),
(4, NULL, 'CR Construction', 'Le Moulin de Treignac', '44460', 'AVESSAC', '02.59.10.12.14', 'FR 05 448 832 998 000 18', 'B 448 832 998 Saint Nazaire', '2026-01-08', '2026-01-08'),
(5, NULL, 'BAT Aménagement', '4 l\'espérance', '44460', 'AVESSAC', '02.99.72.47.61', 'FR 05 448 832 998 000 18', 'B 448 832 998 Saint Nazaire', '2026-01-08', '2026-01-08'),
(6, NULL, 'INTRA MUROS', '146 route des Sorinières', '44400', 'REZE', '02.40.59.77.77', 'FR 30 381 135 995', 'B 381 135 995 NANTES', '2026-01-08', '2026-01-08'),
(7, NULL, 'KERSCHENMEYER Romain et Clémence', '29 rue Elisa Mercoeur', '44230', 'ST SEBASTIEN SUR LOIRE', '07,86,88,54,31', NULL, NULL, '2026-01-08', '2026-01-08'),
(8, NULL, 'M. FEGER Baptiste et Mme SCHNEIDER Tiffany', '10 impasse du Four', '44160', 'CROSSAC', '06,74,92,25,78 / 06,05,09,78,15', NULL, NULL, '2026-01-08', '2026-01-08'),
(9, NULL, 'GARCON Damien et Lorène', '99 rue Anne de bretagne', '44360', 'VIGNEUX DE BRETAGNE', '06,40,82,34,65', NULL, NULL, '2026-01-08', '2026-01-08'),
(10, NULL, 'TRECOBAT', '178 Route des Sorinières', '44400', 'REZE', NULL, 'FR 81 637 220 377', 'B 637 220 377 BREST', '2026-01-08', '2026-01-08'),
(11, NULL, 'AGIUS Maçonnerie', '22 le Pâtis Cibot', '44130', 'Saint Emilien de Blain', '02.40.51.19.39/06 23 90 66 88', 'FR 71 488 666 652', 'B 488 666 652 Saint-Nazaire', '2026-01-08', '2026-01-08'),
(12, NULL, 'GAUFFNY David et Mme BODIN Carole', '30 rue du docteur Paul Michaux', '44230', 'SAINT SEBASTIEN SUR LOIRE', NULL, NULL, NULL, '2026-01-08', '2026-01-08'),
(13, NULL, 'DUBREIL Jeremy et COLLIOU Alexia', '2 chem. du Bicorgnon', '44830', 'BOUYAE', '06,66,66,92,05', 'dubcol@yahoo.com', NULL, '2026-01-08', '2026-01-08'),
(14, NULL, 'GEDIMAT', 'ZI du Champ Fleuri', '44840', 'LES SORINIERES', '06 85 82 05 26', 'FR 07 339 706 673', 'B 339 706 673 NANTES', '2026-01-08', '2026-01-08'),
(15, NULL, 'WENG Shishen', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-08', '2026-01-08'),
(16, NULL, 'POINT P Agence REDON', 'La Digue', '44460', 'SAINT NICOLAS DE REDON', '02,99,71,40,17', NULL, NULL, '2026-01-08', '2026-01-08'),
(17, NULL, 'MORTIER CONSTRUCTION', '11 Avenue des Améthystes', '44300', 'NANTES', '02.40.59.77.77', 'FR 23 330 772 849', '330 772 849 NANTES', '2026-01-08', '2026-01-08'),
(18, NULL, 'ACTIV - ANIMATION', '11 rue des cerisiers', '35230', 'BOURBARRE', '06,07,49,54,36', 'FR 23 402 869 069', NULL, '2026-01-08', '2026-01-08'),
(19, NULL, 'GNK CONSTRUCTIONS', '17 Les 4 vents', '35600', 'BAINS SUR OUST', '06.85.67.69.67', 'FR 85 881 481 089', 'B 881 481 089 RENNES', '2026-01-08', '2026-01-08'),
(20, NULL, 'Maçonnerie Sylvain THAUMOUX', '1150, chemin du Tertre Chevalier', '56350', 'RIEUX', '02.99.93.10.67', 'FR 94 450 534 052', '450 534 052 00029', '2026-01-08', '2026-01-08'),
(21, NULL, 'M. KANTAROGLU Tunay et Mme ALTUNDAG Imine', '6 rue d\'ardignon', '44530', 'DREFFEAC', '06,62,17,48,14', NULL, NULL, '2026-01-08', '2026-01-08');

-- --------------------------------------------------------

--
-- Structure de la table `chantiers`
--

DROP TABLE IF EXISTS `chantiers`;
CREATE TABLE IF NOT EXISTS `chantiers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_client` int NOT NULL,
  `nom_chantier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_chantier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_postal_chantier` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville_chantier` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conducteur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chantiers_id_client_foreign` (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `chantiers`
--

INSERT INTO `chantiers` (`id`, `id_client`, `nom_chantier`, `adresse_chantier`, `code_postal_chantier`, `ville_chantier`, `conducteur`, `created_at`, `updated_at`) VALUES
(1, 2, 'TASSEEL Jean Marie', 'Rue de Gorève', '44410', 'HERBIGNAC', 'M. FOUILLEN Jérôme', '2026-01-08', '2026-01-08'),
(2, 2, 'ROUSSEL -JONELIUNAITE', '1 rte du Toupoussard', '44350', 'ST MOLF', 'M. FOUILLEN Jérôme', '2026-01-08', '2026-01-08'),
(3, 2, 'BELLAUD ROMAIN', 'Impasse du Bourg d\'Avau', '44160', 'BESNE', 'M. VERGNE Julien', '2026-01-08', '2026-01-08'),
(4, 2, 'BRETON JACQUES', 'La résidence des Forges Lot 6', '44380', 'PORNICHET', 'M. NICAUD Tony', '2026-01-08', '2026-01-08'),
(5, 2, 'SCI MERCURE', 'Allée des Parcs des Genêts', '44410', 'SAINT LYPHARD', 'M. FOUILLEN Jérôme', '2026-01-08', '2026-01-08'),
(6, 2, 'BONNOT - MOU HEN', '65 rue St Jean', '44522', 'POUILLE LES COTEAUX', 'M. VERGNE Julien', '2026-01-08', '2026-01-08'),
(7, 2, 'SIRACUSA BRACCIALE', '2 allée des Mauves', '44500', 'LA BAULE ESCOUBLAC', 'M. VERGNE Julien', '2026-01-08', '2026-01-08'),
(8, 2, 'SCI CHARLOTTE MAUROIS', '10 rue de la Fraie', '85330', 'NOIRMOUTIER EN L\'ILE', 'M. NICAUD Tony', '2026-01-08', '2026-01-08'),
(9, 6, 'FLANQUART ARNAUD', '2 rue Auguste Renoir', '44470', 'THOUARE SUR LOIRE', 'M. GABLAIN Marc', '2026-01-08', '2026-01-08'),
(10, 10, 'LAUVERGNAT / WOSIEK Damien/ Sylvie', 'Chemin des courtes', '44760', 'LES MOUTIERS EN RETZ', 'M. HAGUENAUER Nicolas', '2026-01-08', '2026-01-08'),
(11, 10, 'WENG', '12 rue du Beau Soleil', '44340', 'BOUGUENAIS', 'M. HAGUENAUER Nicolas', '2026-01-08', '2026-01-08'),
(12, 6, 'SUREAU Antoine', 'Route du Menhir', '44160', 'PONTCHATEAU', 'M. VERGNE Julien', '2026-01-08', '2026-01-08'),
(13, 4, 'ARBM', 'Route de Rochalot', '44500', 'LA BAULE', NULL, '2026-01-08', '2026-01-08'),
(14, 4, 'ARBM', 'Route de Rochalot', '44500', 'LA BAULE', NULL, '2026-01-08', '2026-01-08'),
(15, 2, 'FAFIN-ALLARD', 'Rue de la pierre blanche', '44270', 'St Etienne de Mer Morte', 'M. NICAUD Tony', '2026-01-08', '2026-01-08'),
(16, 10, 'AUDUSSEAU/MARY Alexi/Chloé', '17 rue de la Robinière', '44400', 'REZE', 'M. HAGUENAUER Nicolas', '2026-01-08', '2026-01-08'),
(17, 2, 'RIVALLAND DANIEL 4437', '14 rue de l\'Hermitage', '44640', 'LE PELLERIN', 'M. VERGNE Julien', '2026-01-08', '2026-01-08'),
(18, 2, 'FRANCES - BERGER 4488', 'Lot \"Le Domaine de la Soivre\"', '85000', 'LA ROCHE SUR YON', 'M. NICAUD Tony', '2026-01-08', '2026-01-08'),
(19, 10, 'JUNGBLUTH Marc 211378', 'rue de Bourgneuf - Lot 2', '44320', 'CHAUMES EN RETZ', 'M. HAGUENAUER Nicolas', '2026-01-08', '2026-01-08'),
(20, 10, 'MARTIN', NULL, NULL, NULL, 'M. HAGUENAUER Nicolas', '2026-01-08', '2026-01-08'),
(21, 10, 'TALL', NULL, NULL, NULL, 'M. HAGUENAUER Nicolas', '2026-01-08', '2026-01-08'),
(22, 10, 'GUILLOIS', NULL, NULL, NULL, 'M. HAGUENAUER Nicolas', '2026-01-08', '2026-01-08'),
(23, 10, 'REGNIER', '30 bis rue du Panty', '44340', 'BOUGUENAIS', 'M. HAGUENAUER Nicolas', '2026-01-08', '2026-01-08'),
(24, 10, 'COPLO Olivier/Nathalie', '7 chemin des Courtes', '44760', 'LES MOUTIERS EN RETZ', 'M. HAGUENAUER Nicolas', '2026-01-08', '2026-01-08'),
(25, 17, 'LE CORRE Loic', 'lot La Boissière', '56130', 'NIVILLAC', 'M. ROUXEL Pierre Yves', '2026-01-08', '2026-01-08'),
(26, 2, 'LAMOUR - JOLLY', '11 rue des salines', '44490', 'LE CROISIC', 'M. VERGNE Julien', '2026-01-08', '2026-01-08'),
(27, 10, 'VERDY / FARADE', 'impasse des bles d\'or', '44210', 'PORNIC', 'M. HAGUENAUER Nicolas', '2026-01-08', '2026-01-08'),
(28, 10, 'D\'HERVILLY 202937', '3 impasse des bles d\'or', '44210', 'PORNIC', 'M. HAGUENAUER Nicolas', '2026-01-08', '2026-01-08'),
(29, 10, 'RENAULT', '29 rue des nouïes', '44680', 'SAINT PAZANNE', 'M. HAGUENAUER Nicolas', '2026-01-08', '2026-01-08'),
(30, 10, 'HERAMBOURG Laure Claire', ' 3 les jardins du moulin', '44320', 'CHAUMES EN RETZ', 'M. HAGUENAUER Nicolas', '2026-01-08', '2026-01-08'),
(31, 10, 'CHOCTEAU / VANNAVONG Yoann', 'Route de Bourgneuf', '44760', 'CHAUMES EN RETZ', 'M. HAGUENAUER Nicolas', '2026-01-08', '2026-01-08'),
(32, 10, 'KAIL', 'Route du Plessis', '44170', 'JANS', 'M. VEILLARD Damien', '2026-01-08', '2026-01-08'),
(33, 10, 'EPAULE 210261', '89 les Bordeaux', '44170', 'TREFFIEUX', 'M. CHARAF Elmehdi', '2026-01-08', '2026-01-08');

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

DROP TABLE IF EXISTS `factures`;
CREATE TABLE IF NOT EXISTS `factures` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_client` int NOT NULL,
  `id_chantier` int DEFAULT NULL,
  `numero_situation` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pv_numero` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_facture` date DEFAULT NULL,
  `sous_total` decimal(12,2) DEFAULT NULL,
  `montant_facture` decimal(12,2) DEFAULT NULL,
  `echeance` date DEFAULT NULL,
  `affacturage` tinyint(1) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `factures_id_client_foreign` (`id_client`),
  KEY `factures_id_chantier_foreign` (`id_chantier`)
) ENGINE=InnoDB AUTO_INCREMENT=211 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `factures`
--

INSERT INTO `factures` (`id`, `id_client`, `id_chantier`, `numero_situation`, `pv_numero`, `date_facture`, `sous_total`, `montant_facture`, `echeance`, `affacturage`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, '2025-10-28', 1635.00, 1635.00, '2025-09-29', NULL, '2026-01-08', '2026-01-08'),
(2, 2, 1, '2', '47', '2025-10-28', 15570.65, 14718.16, '2025-12-10', 1, '2026-01-08', '2026-01-08'),
(3, 2, 2, '3', '46', '2025-10-28', 16925.54, 15998.86, '2025-12-10', 1, '2026-01-08', '2026-01-08'),
(4, 2, 3, '3', '45', '2025-10-28', 20028.05, 19026.65, '2025-12-10', 1, '2026-01-08', '2026-01-08'),
(5, 3, NULL, '1', NULL, '2025-10-24', NULL, NULL, NULL, NULL, '2026-01-08', '2026-01-08'),
(6, 4, NULL, NULL, NULL, '2025-10-10', NULL, 7526.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(7, 2, 3, '2', '44', '2025-10-02', 13567.55, 12824.73, '2025-12-10', 1, '2026-01-08', '2026-01-08'),
(8, 2, 3, '1', '43', '2025-09-29', 17908.13, 16927.66, '2025-11-10', 1, '2026-01-08', '2026-01-08'),
(9, 2, NULL, NULL, NULL, '2025-09-26', 4165.00, 4144.18, '2025-11-10', NULL, '2026-01-08', '2026-01-08'),
(10, 2, 2, '2', '42', '2025-09-25', 8938.39, 8449.01, '2025-11-10', 1, '2026-01-08', '2026-01-08'),
(11, 2, 4, '5', '41', '2025-09-25', -453.91, -429.06, '2025-11-10', 1, '2026-01-08', '2026-01-08'),
(12, 2, 4, '4', '40', '2025-09-25', 464.91, 439.46, '2025-11-10', 1, '2026-01-08', '2026-01-08'),
(13, 5, NULL, '1', NULL, '2025-09-18', NULL, 3269.30, NULL, NULL, '2026-01-08', '2026-01-08'),
(14, 2, 5, '4', '39', '2025-09-17', 7283.54, 6884.76, '2025-11-10', 1, '2026-01-08', '2026-01-08'),
(15, 2, 4, '3', '38', '2025-09-15', 8696.34, 8652.86, '2025-11-10', 1, '2026-01-08', '2026-01-08'),
(16, 2, 2, '1', '37', '2025-09-10', 6963.18, 6581.94, '2025-11-10', 1, '2026-01-08', '2026-01-08'),
(17, 2, 6, '4', NULL, '2025-09-10', NULL, 94.03, '2025-11-10', NULL, '2026-01-08', '2026-01-08'),
(18, 2, 5, '3', '36', '2025-09-10', 5733.41, 5419.50, '2025-11-10', 1, '2026-01-08', '2026-01-08'),
(19, 2, 1, '1', '35', '2025-09-10', NULL, 9459.83, '2025-11-10', 1, '2026-01-08', '2026-01-08'),
(20, 2, 5, '2', '34', '2025-08-29', 24918.01, 23553.74, '2025-10-10', 1, '2026-01-08', '2026-01-08'),
(21, 2, 7, '4', '33', '2025-08-29', NULL, 945.25, '2025-10-10', 1, '2026-01-08', '2026-01-08'),
(22, 4, NULL, NULL, NULL, '2025-08-14', NULL, 5812.51, NULL, NULL, '2026-01-08', '2026-01-08'),
(23, 4, NULL, NULL, NULL, '2025-08-14', NULL, 1713.50, NULL, NULL, '2026-01-08', '2026-01-08'),
(24, 2, 8, NULL, NULL, '2025-08-13', NULL, 22.39, '2025-08-13', NULL, '2026-01-08', '2026-01-08'),
(25, 6, 9, 'TS', NULL, '2025-07-31', 1050.00, 1044.75, '2025-08-10', NULL, '2026-01-08', '2026-01-08'),
(26, 6, 9, '2', '32', '2025-07-31', 4562.80, 4312.99, '2025-09-10', NULL, '2026-01-08', '2026-01-08'),
(27, 2, 5, '1', '31', '2025-07-21', NULL, 26190.54, '2025-09-10', 1, '2026-01-08', '2026-01-08'),
(28, 2, 4, '2', '30', '2025-07-16', NULL, 8805.13, '2025-09-10', 1, '2026-01-08', '2026-01-08'),
(29, 2, 4, '1', '29', '2025-06-30', NULL, 30687.27, '2025-08-10', 1, '2026-01-08', '2026-01-08'),
(30, 2, NULL, NULL, NULL, '2025-06-20', NULL, 3570.02, NULL, NULL, '2026-01-08', '2026-01-08'),
(31, 7, NULL, '3', NULL, '2025-06-18', NULL, 9293.54, NULL, NULL, '2026-01-08', '2026-01-08'),
(32, 2, NULL, NULL, NULL, '2025-06-16', NULL, 348.25, '2025-08-10', NULL, '2026-01-08', '2026-01-08'),
(33, 4, NULL, NULL, NULL, '2025-06-13', NULL, 1351.40, NULL, NULL, '2026-01-08', '2026-01-08'),
(34, 8, NULL, '3', NULL, '2025-05-30', NULL, 13661.42, NULL, NULL, '2026-01-08', '2026-01-08'),
(35, 2, NULL, NULL, NULL, '2025-05-21', NULL, 4464.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(36, 7, NULL, '2', NULL, '2025-05-19', NULL, 5808.46, NULL, NULL, '2026-01-08', '2026-01-08'),
(37, 7, NULL, '1', NULL, '2025-05-15', NULL, 3872.30, NULL, NULL, '2026-01-08', '2026-01-08'),
(38, 2, NULL, NULL, NULL, '2025-05-09', NULL, 400.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(39, 2, 8, NULL, NULL, '2025-05-09', NULL, 447.75, NULL, NULL, '2026-01-08', '2026-01-08'),
(40, 8, NULL, '2', NULL, '2025-05-05', NULL, 8196.84, NULL, NULL, '2026-01-08', '2026-01-08'),
(41, 9, NULL, '5', NULL, '2025-04-29', NULL, 9307.82, NULL, NULL, '2026-01-08', '2026-01-08'),
(42, 10, 10, '3', NULL, '2025-04-29', NULL, 2679.60, '2025-05-09', NULL, '2026-01-08', '2026-01-08'),
(43, 2, 7, '3', '28', '2025-04-23', NULL, 8121.39, '2025-06-10', 1, '2026-01-08', '2026-01-08'),
(44, 8, NULL, '1', NULL, '2025-04-17', NULL, 5464.56, NULL, NULL, '2026-01-08', '2026-01-08'),
(45, 2, 8, '4', '27', '2025-04-09', NULL, 2139.39, '2025-06-10', 1, '2026-01-08', '2026-01-08'),
(46, 11, NULL, NULL, NULL, '2025-04-07', NULL, 4464.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(47, 2, 7, '2', '25', '2025-04-04', NULL, 20371.94, '2025-06-10', 1, '2026-01-08', '2026-01-08'),
(48, 9, NULL, '4', NULL, '2025-04-04', NULL, 14379.12, NULL, NULL, '2026-01-08', '2026-01-08'),
(49, 10, 10, '2', NULL, '2025-04-04', NULL, 5500.00, '2025-04-14', NULL, '2026-01-08', '2026-01-08'),
(50, 2, 8, '3', '24', '2025-03-20', NULL, 6339.92, '2025-05-10', 1, '2026-01-08', '2026-01-08'),
(51, 2, 6, '3', '23', '2025-03-20', NULL, 7486.51, '2025-05-10', 0, '2026-01-08', '2026-01-08'),
(52, 5, NULL, NULL, NULL, '2025-03-14', NULL, 874.50, NULL, NULL, '2026-01-08', '2026-01-08'),
(53, 5, NULL, NULL, NULL, '2025-03-14', NULL, 10431.50, NULL, NULL, '2026-01-08', '2026-01-08'),
(54, 5, NULL, NULL, NULL, '2025-03-14', NULL, 10406.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(55, 5, NULL, NULL, NULL, '2025-03-14', NULL, 9483.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(56, 5, NULL, NULL, NULL, '2025-03-14', NULL, 9659.50, NULL, NULL, '2026-01-08', '2026-01-08'),
(57, 2, 7, '1', '22', '2025-03-08', NULL, 18422.23, '2025-05-10', 1, '2026-01-08', '2026-01-08'),
(58, 9, NULL, '3', NULL, '2025-02-28', NULL, 12171.76, NULL, NULL, '2026-01-08', '2026-01-08'),
(59, 10, 10, '1', NULL, '2025-02-28', NULL, 4019.40, '2025-03-10', NULL, '2026-01-08', '2026-01-08'),
(60, 2, 8, '2', '21', '2025-02-28', NULL, 17209.26, '2025-04-10', 1, '2026-01-08', '2026-01-08'),
(61, 2, 6, '2', '20', '2025-02-28', NULL, 14386.21, '2025-04-10', 1, '2026-01-08', '2026-01-08'),
(62, 2, NULL, '6', '19', '2025-02-28', NULL, 2941.80, '2025-04-10', 1, '2026-01-08', '2026-01-08'),
(63, 10, 11, '3', NULL, '2025-02-21', NULL, 7511.62, '2025-03-03', NULL, '2026-01-08', '2026-01-08'),
(64, 9, NULL, '2', NULL, '2025-01-23', NULL, 21479.58, NULL, NULL, '2026-01-08', '2026-01-08'),
(65, 2, 8, '1', '18', '2025-01-24', NULL, 14436.52, '2025-03-10', 1, '2026-01-08', '2026-01-08'),
(66, 2, 6, '1', '17', '2025-01-24', NULL, 13280.81, '2025-03-10', 1, '2026-01-08', '2026-01-08'),
(67, 9, NULL, '1', NULL, '2025-01-23', NULL, 14319.72, NULL, NULL, '2026-01-08', '2026-01-08'),
(68, 6, 12, '4', '16', '2025-01-22', NULL, 136.39, '2025-03-10', 0, '2026-01-08', '2026-01-08'),
(69, 10, 11, '2', NULL, '2025-01-17', NULL, 7290.00, '2025-01-27', NULL, '2026-01-08', '2026-01-08'),
(70, 12, NULL, '3', NULL, '2025-01-17', NULL, 1858.32, NULL, NULL, '2026-01-08', '2026-01-08'),
(71, 2, NULL, '5', '15', '2025-01-15', NULL, 2750.48, '2025-03-10', 1, '2026-01-08', '2026-01-08'),
(72, 2, NULL, '4', '14', '2025-01-07', NULL, 896.20, '2025-03-10', 1, '2026-01-08', '2026-01-08'),
(73, 2, NULL, '3', '13', '2025-01-06', NULL, 15308.01, '2025-03-10', 1, '2026-01-08', '2026-01-08'),
(74, 6, 9, 'TS', '12', '2025-01-06', NULL, 921.62, '2025-03-10', 1, '2026-01-08', '2026-01-08'),
(75, 6, 9, '1', '11', '2025-01-06', NULL, 5981.19, '2025-03-10', 1, '2026-01-08', '2026-01-08'),
(76, 4, NULL, NULL, NULL, '2024-12-23', NULL, 4994.50, NULL, NULL, '2026-01-08', '2026-01-08'),
(77, 10, 11, '1', NULL, '2024-12-12', NULL, 7290.69, '2024-12-22', NULL, '2026-01-08', '2026-01-08'),
(78, 4, NULL, NULL, NULL, '2024-12-10', NULL, 7416.03, NULL, NULL, '2026-01-08', '2026-01-08'),
(79, 2, NULL, '2', '10', '2024-12-06', NULL, 945.25, '2025-02-10', 1, '2026-01-08', '2026-01-08'),
(80, 2, NULL, '1', '9', '2024-12-05', NULL, 18297.28, '2025-02-10', 1, '2026-01-08', '2026-01-08'),
(81, 4, NULL, NULL, NULL, '0224-11-28', NULL, 9151.50, NULL, NULL, '2026-01-08', '2026-01-08'),
(82, 13, NULL, '4', NULL, '2024-11-27', NULL, 2072.81, NULL, 1, '2026-01-08', '2026-01-08'),
(83, 6, 12, '3', '8', '2024-11-18', NULL, 1461.90, '2025-01-10', 1, '2026-01-08', '2026-01-08'),
(84, 12, NULL, '2', NULL, '2024-11-15', NULL, 7291.60, NULL, NULL, '2026-01-08', '2026-01-08'),
(85, 5, NULL, NULL, NULL, '2024-11-15', NULL, 1492.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(86, 5, NULL, NULL, NULL, '2024-11-15', NULL, 1231.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(87, 5, NULL, NULL, NULL, '2024-11-15', NULL, 1207.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(88, 5, NULL, NULL, NULL, '2024-11-15', NULL, 1260.40, NULL, NULL, '2026-01-08', '2026-01-08'),
(89, 5, NULL, NULL, NULL, '2024-11-15', NULL, 2171.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(90, 4, NULL, NULL, NULL, '2024-11-15', NULL, 1348.35, NULL, NULL, '2026-01-08', '2026-01-08'),
(91, 4, NULL, NULL, NULL, '2024-11-15', NULL, 1633.40, NULL, NULL, '2026-01-08', '2026-01-08'),
(92, 13, NULL, '3', NULL, '2024-11-05', NULL, 6003.02, NULL, NULL, '2026-01-08', '2026-01-08'),
(93, 4, NULL, NULL, NULL, '2024-10-31', NULL, 2143.50, NULL, NULL, '2026-01-08', '2026-01-08'),
(94, 4, 13, NULL, NULL, '2024-10-31', NULL, 19611.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(95, 4, 14, NULL, NULL, '2024-10-31', NULL, 23389.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(96, 5, NULL, NULL, NULL, '2024-10-24', NULL, 3176.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(97, 14, NULL, NULL, NULL, '2024-10-23', NULL, 780.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(98, 12, NULL, '1', NULL, '2024-10-23', NULL, 9291.60, NULL, NULL, '2026-01-08', '2026-01-08'),
(99, 13, NULL, NULL, NULL, '2024-10-14', NULL, 5200.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(100, 6, 12, '2', '7', '2024-10-08', NULL, 6482.68, '2024-12-10', 1, '2026-01-08', '2026-01-08'),
(101, 13, NULL, '2', NULL, '2024-10-03', NULL, 11605.84, NULL, 0, '2026-01-08', '2026-01-08'),
(102, 2, NULL, NULL, NULL, '2024-10-03', NULL, 3989.85, NULL, NULL, '2026-01-08', '2026-01-08'),
(103, 2, 15, NULL, NULL, '2024-10-03', NULL, 2231.59, NULL, NULL, '2026-01-08', '2026-01-08'),
(104, 15, NULL, '1', NULL, '2024-09-25', NULL, 6120.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(105, 6, 12, '1', '6', '2024-09-20', NULL, 7586.14, '2024-11-10', 1, '2026-01-08', '2026-01-08'),
(106, 10, 16, '2', NULL, '2024-09-20', NULL, 3785.46, '2024-09-30', NULL, '2026-01-08', '2026-01-08'),
(107, 13, NULL, '1', NULL, '2024-07-25', NULL, 20010.07, NULL, 0, '2026-01-08', '2026-01-08'),
(108, 10, 16, '1', NULL, '2024-07-23', NULL, 5227.54, '2024-08-02', NULL, '2026-01-08', '2026-01-08'),
(109, 4, NULL, NULL, NULL, '2024-07-17', NULL, 6736.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(110, 2, 17, 'TS', '5', NULL, NULL, 16688.19, '2024-09-10', 1, '2026-01-08', '2026-01-08'),
(111, 2, 17, '2', '4', NULL, NULL, 888.54, '2024-09-10', 1, '2026-01-08', '2026-01-08'),
(112, 16, NULL, NULL, '-', '2024-07-09', NULL, NULL, NULL, 0, '2026-01-08', '2026-01-08'),
(113, 2, 18, '4', '3', NULL, NULL, 12968.82, '2024-09-10', 1, '2026-01-08', '2026-01-08'),
(114, 5, NULL, NULL, NULL, '2024-07-01', NULL, 3409.20, NULL, NULL, '2026-01-08', '2026-01-08'),
(115, 4, NULL, NULL, NULL, '2024-07-01', NULL, 1574.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(116, 5, NULL, NULL, NULL, '2024-07-01', NULL, 34431.25, NULL, NULL, '2026-01-08', '2026-01-08'),
(117, 10, 19, NULL, NULL, '2024-06-26', NULL, 173.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(118, 10, 20, 'TS', NULL, '2024-06-25', NULL, 850.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(119, 10, 21, 'TS', NULL, '2024-06-25', NULL, 350.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(120, 10, 22, 'TS', NULL, '2024-06-25', NULL, 250.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(121, 2, 17, '1', '2', NULL, NULL, 19453.67, '2024-08-10', 1, '2026-01-08', '2026-01-08'),
(122, 2, 18, '3', '1', NULL, NULL, 10696.14, '2024-08-10', 1, '2026-01-08', '2026-01-08'),
(123, 2, 18, NULL, NULL, '2024-05-24', NULL, 12857.02, NULL, NULL, '2026-01-08', '2026-01-08'),
(124, 10, 23, NULL, NULL, '2024-05-10', NULL, 3375.60, NULL, NULL, '2026-01-08', '2026-01-08'),
(125, 2, 18, NULL, NULL, '2024-05-07', NULL, 29403.54, NULL, NULL, '2026-01-08', '2026-01-08'),
(126, 10, 23, NULL, NULL, '2024-04-23', NULL, 4163.24, NULL, NULL, '2026-01-08', '2026-01-08'),
(127, 5, NULL, NULL, NULL, '2024-04-22', NULL, 4181.40, NULL, NULL, '2026-01-08', '2026-01-08'),
(128, 10, 24, NULL, NULL, '2024-03-29', NULL, 8125.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(129, 17, 25, NULL, NULL, '2024-03-27', NULL, 1456.80, NULL, NULL, '2026-01-08', '2026-01-08'),
(130, 2, 26, NULL, NULL, '2024-03-27', NULL, 1092.53, NULL, NULL, '2026-01-08', '2026-01-08'),
(131, 10, 24, NULL, NULL, '2024-03-12', NULL, 8125.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(132, 10, 27, NULL, NULL, '2024-03-12', NULL, 2600.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(133, 10, 28, NULL, NULL, '2024-03-12', NULL, 500.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(134, 2, 26, NULL, NULL, '2024-03-07', NULL, 4954.25, NULL, NULL, '2026-01-08', '2026-01-08'),
(135, 2, 26, NULL, NULL, '2024-03-04', NULL, 23777.10, NULL, NULL, '2026-01-08', '2026-01-08'),
(136, 10, 23, NULL, NULL, '2024-02-12', NULL, 3713.16, NULL, NULL, '2026-01-08', '2026-01-08'),
(137, 4, NULL, NULL, NULL, '2024-02-03', NULL, 4880.50, NULL, NULL, '2026-01-08', '2026-01-08'),
(138, 5, NULL, NULL, NULL, '2024-02-02', NULL, 8447.70, NULL, NULL, '2026-01-08', '2026-01-08'),
(139, 5, NULL, NULL, NULL, '2024-01-25', NULL, 1000.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(140, 17, 25, NULL, NULL, '2024-01-25', NULL, 8968.97, NULL, NULL, '2026-01-08', '2026-01-08'),
(141, 2, 26, NULL, NULL, '2024-01-11', NULL, 23086.97, NULL, NULL, '2026-01-08', '2026-01-08'),
(142, 10, 29, NULL, NULL, '2023-12-19', NULL, 6035.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(143, 2, 26, NULL, NULL, '2023-12-18', NULL, 7960.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(144, 10, 30, NULL, NULL, '2023-12-15', NULL, 3152.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(145, 10, 31, NULL, NULL, '2023-12-15', NULL, 3988.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(146, 10, 19, NULL, NULL, '2023-12-15', NULL, 4023.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(147, 2, 26, NULL, NULL, '2023-12-15', NULL, 2020.20, NULL, NULL, '2026-01-08', '2026-01-08'),
(148, 2, 26, NULL, NULL, '2023-12-13', NULL, 18274.91, NULL, NULL, '2026-01-08', '2026-01-08'),
(149, 17, 25, NULL, NULL, '2023-12-05', NULL, 854.26, NULL, NULL, '2026-01-08', '2026-01-08'),
(150, 5, NULL, NULL, NULL, '2023-12-05', NULL, 5552.50, NULL, NULL, '2026-01-08', '2026-01-08'),
(151, 17, 25, NULL, NULL, '2023-12-01', NULL, 15244.17, NULL, NULL, '2026-01-08', '2026-01-08'),
(152, 4, NULL, NULL, NULL, '2023-11-29', NULL, 4164.50, NULL, NULL, '2026-01-08', '2026-01-08'),
(153, 18, NULL, NULL, NULL, '2023-11-27', NULL, 367.20, NULL, NULL, '2026-01-08', '2026-01-08'),
(154, 4, NULL, NULL, NULL, '2023-11-02', NULL, 1212.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(155, 10, 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-08', '2026-01-08'),
(156, 5, NULL, NULL, NULL, '2023-11-02', NULL, 8296.05, NULL, NULL, '2026-01-08', '2026-01-08'),
(157, 10, 29, NULL, NULL, '2023-10-26', NULL, 7242.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(158, 4, NULL, NULL, NULL, '2023-10-09', NULL, 7133.50, NULL, NULL, '2026-01-08', '2026-01-08'),
(159, 4, NULL, NULL, NULL, '2023-09-25', NULL, 1325.50, NULL, NULL, '2026-01-08', '2026-01-08'),
(160, 4, NULL, NULL, NULL, '2023-09-25', NULL, 7153.60, NULL, NULL, '2026-01-08', '2026-01-08'),
(161, 5, NULL, NULL, NULL, '2023-09-25', NULL, 8296.05, NULL, NULL, '2026-01-08', '2026-01-08'),
(162, 4, NULL, NULL, NULL, '2023-07-25', NULL, 5553.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(163, 19, NULL, NULL, NULL, '2023-07-07', NULL, 2790.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(164, 5, NULL, NULL, NULL, '2023-07-07', NULL, 2564.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(165, 4, NULL, NULL, NULL, '2023-07-07', NULL, 7706.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(166, 10, 32, NULL, NULL, '2023-06-23', NULL, 2151.04, NULL, NULL, '2026-01-08', '2026-01-08'),
(167, 4, NULL, NULL, NULL, '2023-06-23', NULL, 4096.60, NULL, NULL, '2026-01-08', '2026-01-08'),
(168, 4, NULL, NULL, NULL, '2023-06-19', NULL, 991.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(169, 4, NULL, NULL, NULL, '2023-06-16', NULL, 1233.50, NULL, NULL, '2026-01-08', '2026-01-08'),
(170, 4, NULL, NULL, NULL, '2023-06-16', NULL, 818.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(171, 4, NULL, NULL, NULL, '2023-06-07', NULL, 2330.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(172, 5, NULL, NULL, NULL, '2023-06-07', NULL, 3500.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(173, 10, 28, NULL, NULL, '2023-05-24', NULL, 2925.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(174, 5, NULL, NULL, NULL, '2023-05-19', NULL, 2720.50, NULL, NULL, '2026-01-08', '2026-01-08'),
(175, 10, 33, NULL, NULL, '2023-05-17', NULL, 600.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(176, 5, NULL, NULL, NULL, '2023-05-10', NULL, 5423.60, NULL, NULL, '2026-01-08', '2026-01-08'),
(177, 10, 28, NULL, NULL, '2023-04-24', NULL, 8775.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(178, 10, 32, NULL, NULL, '2023-04-24', NULL, 6184.24, NULL, NULL, '2026-01-08', '2026-01-08'),
(179, 5, NULL, NULL, NULL, '2023-04-10', NULL, 2408.10, NULL, NULL, '2026-01-08', '2026-01-08'),
(180, 20, NULL, NULL, NULL, '2023-04-04', NULL, 6368.80, NULL, NULL, '2026-01-08', '2026-01-08'),
(181, 5, NULL, NULL, NULL, '2023-03-29', NULL, 5618.90, NULL, NULL, '2026-01-08', '2026-01-08'),
(182, 5, NULL, NULL, NULL, '2023-03-22', NULL, 4709.80, NULL, NULL, '2026-01-08', '2026-01-08'),
(183, 5, NULL, NULL, NULL, '2023-03-17', NULL, 1452.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(184, 5, NULL, NULL, NULL, '2023-03-16', NULL, 3161.44, NULL, NULL, '2026-01-08', '2026-01-08'),
(185, 20, NULL, NULL, NULL, '2023-02-27', NULL, 11377.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(186, 5, NULL, NULL, NULL, '2023-02-27', NULL, 4742.16, NULL, NULL, '2026-01-08', '2026-01-08'),
(187, 5, NULL, NULL, NULL, '2023-02-27', NULL, 5699.50, NULL, NULL, '2026-01-08', '2026-01-08'),
(188, 4, NULL, NULL, NULL, '2023-02-09', NULL, 7602.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(189, 20, NULL, NULL, NULL, '2023-01-28', NULL, 8734.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(190, 4, NULL, NULL, NULL, '2023-01-26', NULL, 2110.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(191, 10, 33, NULL, NULL, '2023-01-13', NULL, 3343.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(192, 10, 32, NULL, NULL, '2023-01-13', NULL, 5108.72, NULL, NULL, '2026-01-08', '2026-01-08'),
(193, 4, NULL, NULL, NULL, '2023-01-12', NULL, 3851.92, NULL, NULL, '2026-01-08', '2026-01-08'),
(194, 20, NULL, NULL, NULL, '2023-02-27', NULL, 5134.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(195, 4, NULL, NULL, NULL, '2023-01-04', NULL, 3610.60, NULL, NULL, '2026-01-08', '2026-01-08'),
(196, 5, NULL, NULL, NULL, '2023-01-04', NULL, 3577.88, NULL, NULL, '2026-01-08', '2026-01-08'),
(197, 5, NULL, NULL, NULL, '2022-12-05', NULL, 1000.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(198, 4, NULL, NULL, NULL, '2022-12-05', NULL, 3577.88, NULL, NULL, '2026-01-08', '2026-01-08'),
(199, 4, NULL, NULL, NULL, '2022-12-05', NULL, 3610.60, NULL, NULL, '2026-01-08', '2026-01-08'),
(200, 4, NULL, NULL, NULL, '2022-12-05', NULL, 7153.58, NULL, NULL, '2026-01-08', '2026-01-08'),
(201, 5, NULL, NULL, NULL, '2022-11-17', NULL, 1157.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(202, 5, NULL, NULL, NULL, '2022-11-16', NULL, 1087.50, NULL, NULL, '2026-01-08', '2026-01-08'),
(203, 5, NULL, NULL, NULL, '2022-11-16', NULL, 2556.00, NULL, NULL, '2026-01-08', '2026-01-08'),
(204, 2, 8, NULL, '26', '2025-04-07', NULL, -516.11, '2025-06-10', 1, '2026-01-08', '2026-01-08'),
(205, 2, 18, NULL, NULL, '2024-07-01', NULL, -1282.15, NULL, 1, '2026-01-08', '2026-01-08'),
(206, 2, 26, NULL, NULL, '2023-12-13', NULL, -10.10, NULL, NULL, '2026-01-08', '2026-01-08'),
(207, 9, 20, '12', '3', '2026-03-04', 3.00, 3.00, '2026-03-04', 1, '2026-03-05', '2026-03-05'),
(209, 1, 3, '3', '3', '0001-03-03', 3.00, 3.00, '0001-03-03', NULL, '2026-03-05', '2026-03-05'),
(210, 1, 1, '1', '1', '0001-01-01', 1.00, 1.00, '0001-01-11', 1, '2026-03-05', '2026-03-05');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_11_28_005925_create_clients_table', 1),
(5, '2025_11_28_005954_create_chantiers_table', 1),
(6, '2025_11_28_010024_create_factures_table', 1),
(7, '2025_11_28_010044_create_reglements_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reglements`
--

DROP TABLE IF EXISTS `reglements`;
CREATE TABLE IF NOT EXISTS `reglements` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_facture` int NOT NULL,
  `date_reglement` date DEFAULT NULL,
  `montant_regle` decimal(12,2) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reglements_id_facture_foreign` (`id_facture`)
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reglements`
--

INSERT INTO `reglements` (`id`, `id_facture`, `date_reglement`, `montant_regle`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-09-29', 1635.00, '2026-01-08', '2026-01-08'),
(2, 13, '2025-09-18', 3269.30, '2026-01-08', '2026-01-08'),
(3, 22, '2025-08-01', 4000.00, '2026-01-08', '2026-01-08'),
(4, 23, '2025-08-01', 1713.50, '2026-01-08', '2026-01-08'),
(5, 24, '2025-07-07', 22.39, '2026-01-08', '2026-01-08'),
(6, 25, '2025-09-12', 992.51, '2026-01-08', '2026-01-08'),
(7, 26, '2025-09-16', 4312.90, '2026-01-08', '2026-01-08'),
(8, 27, '2025-07-24', 23571.49, '2026-01-08', '2026-01-08'),
(9, 28, '0025-08-01', 5986.24, '2026-01-08', '2026-01-08'),
(10, 29, '2025-07-10', 29452.16, '2026-01-08', '2026-01-08'),
(11, 30, '2025-07-07', 3570.00, '2026-01-08', '2026-01-08'),
(12, 31, '2025-06-24', 9293.54, '2026-01-08', '2026-01-08'),
(13, 32, '2025-07-07', 348.25, '2026-01-08', '2026-01-08'),
(14, 34, '2025-06-12', 13661.41, '2026-01-08', '2026-01-08'),
(15, 36, '2025-05-20', 5808.46, '2026-01-08', '2026-01-08'),
(16, 37, '2025-05-20', 3872.31, '2026-01-08', '2026-01-08'),
(17, 38, '1998-07-07', 398.00, '2026-01-08', '2026-01-08'),
(18, 39, '2025-07-07', 447.75, '2026-01-08', '2026-01-08'),
(19, 40, '2025-05-14', 8196.84, '2026-01-08', '2026-01-08'),
(20, 41, '2025-05-05', 9307.82, '2026-01-08', '2026-01-08'),
(21, 43, '2025-05-07', 8121.39, '2026-01-08', '2026-01-08'),
(22, 44, '2025-04-28', 5464.56, '2026-01-08', '2026-01-08'),
(23, 47, '2025-04-14', 21995.25, '2026-01-08', '2026-01-08'),
(24, 57, '2025-03-17', 10372.93, '2026-01-08', '2026-01-08'),
(25, 58, '2025-03-06', 12171.76, '2026-01-08', '2026-01-08'),
(26, 59, '2025-03-24', 3818.43, '2026-01-08', '2026-01-08'),
(27, 63, '2025-03-03', 6813.32, '2026-01-08', '2026-01-08'),
(28, 64, '2025-02-03', 21479.58, '2026-01-08', '2026-01-08'),
(29, 65, '2025-02-05', 11894.45, '2026-01-08', '2026-01-08'),
(30, 66, '2025-02-06', 11952.73, '2026-01-08', '2026-01-08'),
(31, 67, '2025-01-28', 14319.72, '2026-01-08', '2026-01-08'),
(32, 69, '2025-02-04', 6926.16, '2026-01-08', '2026-01-08'),
(33, 70, '2025-01-20', 1858.32, '2026-01-08', '2026-01-08'),
(34, 71, '2025-01-24', 2475.44, '2026-01-08', '2026-01-08'),
(35, 72, '2025-01-10', 806.58, '2026-01-08', '2026-01-08'),
(36, 73, '2025-01-10', 13777.21, '2026-01-08', '2026-01-08'),
(37, 74, '2025-01-17', 829.46, '2026-01-08', '2026-01-08'),
(38, 75, '2025-01-17', 5383.08, '2026-01-08', '2026-01-08'),
(39, 76, '2025-01-13', 4994.50, '2026-01-08', '2026-01-08'),
(40, 77, '2025-01-06', 6681.64, '2026-01-08', '2026-01-08'),
(41, 78, '2024-12-17', 7416.03, '2026-01-08', '2026-01-08'),
(42, 79, '2024-12-12', 850.73, '2026-01-08', '2026-01-08'),
(43, 80, '2024-12-12', 16721.11, '2026-01-08', '2026-01-08'),
(44, 81, '2024-12-03', 9151.50, '2026-01-08', '2026-01-08'),
(45, 82, '2024-11-29', 2072.81, '2026-01-08', '2026-01-08'),
(46, 83, '2025-12-06', 1315.71, '2026-01-08', '2026-01-08'),
(47, 84, '2024-11-18', 7433.28, '2026-01-08', '2026-01-08'),
(48, 85, '2024-12-05', 1492.00, '2026-01-08', '2026-01-08'),
(49, 86, '2024-12-05', 1231.00, '2026-01-08', '2026-01-08'),
(50, 87, '2024-12-05', 1207.00, '2026-01-08', '2026-01-08'),
(51, 88, '2024-12-05', 1260.00, '2026-01-08', '2026-01-08'),
(52, 89, '2024-12-05', 2171.00, '2026-01-08', '2026-01-08'),
(53, 90, '2024-11-25', 1348.35, '2026-01-08', '2026-01-08'),
(54, 91, '2024-11-25', 1633.40, '2026-01-08', '2026-01-08'),
(55, 92, '2024-11-08', 6003.02, '2026-01-08', '2026-01-08'),
(56, 93, '2024-11-13', 2413.00, '2026-01-08', '2026-01-08'),
(57, 96, '2024-11-04', 3176.00, '2026-01-08', '2026-01-08'),
(58, 97, '2024-12-23', 780.00, '2026-01-08', '2026-01-08'),
(59, 98, '2024-10-24', 9291.00, '2026-01-08', '2026-01-08'),
(60, 99, '2024-10-21', 5200.00, '2026-01-08', '2026-01-08'),
(61, 100, '2024-10-15', 6482.68, '2026-01-08', '2026-01-08'),
(62, 101, '2024-10-14', 11605.84, '2026-01-08', '2026-01-08'),
(63, 102, '2024-10-17', 3809.40, '2026-01-08', '2026-01-08'),
(64, 103, '2024-10-17', 2242.80, '2026-01-08', '2026-01-08'),
(65, 104, '2024-09-25', 5000.00, '2026-01-08', '2026-01-08'),
(66, 104, '2024-09-26', 1120.00, '2026-01-08', '2026-01-08'),
(67, 105, '2024-10-03', 7586.14, '2026-01-08', '2026-01-08'),
(68, 107, '2024-08-02', 20010.07, '2026-01-08', '2026-01-08'),
(69, 108, '2024-08-02', 4866.84, '2026-01-08', '2026-01-08'),
(70, 109, '2024-07-26', 6736.00, '2026-01-08', '2026-01-08'),
(71, 114, '2024-07-05', 3409.20, '2026-01-08', '2026-01-08'),
(72, 115, '2024-07-09', 1574.00, '2026-01-08', '2026-01-08'),
(73, 116, '2024-06-03', 15000.00, '2026-01-08', '2026-01-08'),
(74, 116, '2024-07-08', 19431.25, '2026-01-08', '2026-01-08'),
(75, 120, '2024-07-15', 250.00, '2026-01-08', '2026-01-08'),
(76, 123, '2024-06-14', 11847.74, '2026-01-08', '2026-01-08'),
(77, 124, '2024-05-22', 3142.68, '2026-01-08', '2026-01-08'),
(78, 125, '2024-05-27', 27095.36, '2026-01-08', '2026-01-08'),
(79, 126, '2024-05-14', 3955.08, '2026-01-08', '2026-01-08'),
(80, 127, '2024-04-29', 4181.40, '2026-01-08', '2026-01-08'),
(81, 128, '2024-04-09', 5718.75, '2026-01-08', '2026-01-08'),
(82, 128, '2024-04-23', 2000.00, '2026-01-08', '2026-01-08'),
(83, 129, '2024-05-02', 1383.96, '2026-01-08', '2026-01-08'),
(84, 130, '2024-04-08', 1006.76, '2026-01-08', '2026-01-08'),
(85, 131, '2024-03-23', 7626.37, '2026-01-08', '2026-01-08'),
(86, 131, '2024-03-22', 3250.00, '2026-01-08', '2026-01-08'),
(87, 132, '2024-03-28', 2070.00, '2026-01-08', '2026-01-08'),
(88, 132, '2024-04-23', 400.00, '2026-01-08', '2026-01-08'),
(89, 134, '0024-03-20', 4565.35, '2026-01-08', '2026-01-08'),
(90, 135, '0024-03-12', 21910.59, '2026-01-08', '2026-01-08'),
(91, 136, '2024-02-23', 3481.95, '2026-01-08', '2026-01-08'),
(92, 136, '2024-05-22', 1.00, '2026-01-08', '2026-01-08'),
(93, 137, '2024-02-07', 4880.50, '2026-01-08', '2026-01-08'),
(94, 138, '2024-02-08', 8447.70, '2026-01-08', '2026-01-08'),
(95, 139, '2024-01-26', 1000.00, '2026-01-08', '2026-01-08'),
(96, 140, '2024-02-10', 8350.11, '2026-01-08', '2026-01-08'),
(97, 141, '2024-01-31', 21274.64, '2026-01-08', '2026-01-08'),
(98, 142, '2024-01-02', 5637.58, '2026-01-08', '2026-01-08'),
(99, 142, '2024-02-08', 1000.00, '2026-01-08', '2026-01-08'),
(100, 143, '2023-12-18', 7335.14, '2026-01-08', '2026-01-08'),
(101, 144, '2023-12-28', 2934.51, '2026-01-08', '2026-01-08'),
(102, 145, '2023-12-28', 3712.83, '2026-01-08', '2026-01-08'),
(103, 146, '2023-12-28', 3745.41, '2026-01-08', '2026-01-08'),
(104, 147, '2023-12-15', 1861.43, '2026-01-08', '2026-01-08'),
(105, 148, '2028-12-13', 16840.32, '2026-01-08', '2026-01-08'),
(106, 150, '2023-12-05', 5552.50, '2026-01-08', '2026-01-08'),
(107, 151, '2023-12-12', 14192.64, '2026-01-08', '2026-01-08'),
(108, 152, '2023-12-05', 4164.50, '2026-01-08', '2026-01-08'),
(109, 153, '2023-11-28', 367.20, '2026-01-08', '2026-01-08'),
(110, 154, '2023-11-09', 1212.00, '2026-01-08', '2026-01-08'),
(111, 155, '2024-01-16', 1766.00, '2026-01-08', '2026-01-08'),
(112, 155, '2023-12-06', 10317.85, '2026-01-08', '2026-01-08'),
(113, 156, '2023-11-09', 8296.05, '2026-01-08', '2026-01-08'),
(114, 157, '2023-11-10', 6879.90, '2026-01-08', '2026-01-08'),
(115, 158, '2023-10-11', 7133.50, '2026-01-08', '2026-01-08'),
(116, 159, '2023-09-25', 1325.50, '2026-01-08', '2026-01-08'),
(117, 160, '2023-09-29', 7153.60, '2026-01-08', '2026-01-08'),
(118, 161, '2023-09-26', 8296.05, '2026-01-08', '2026-01-08'),
(119, 162, '2023-07-28', 5553.00, '2026-01-08', '2026-01-08'),
(120, 163, '2023-07-10', 2790.00, '2026-01-08', '2026-01-08'),
(121, 164, '2023-07-08', 2564.00, '2026-01-08', '2026-01-08'),
(122, 165, '2023-07-17', 7706.00, '2026-01-08', '2026-01-08'),
(123, 166, '2023-07-07', 2002.62, '2026-01-08', '2026-01-08'),
(124, 167, '2023-07-07', 1985.18, '2026-01-08', '2026-01-08'),
(125, 167, '2023-06-14', 2111.72, '2026-01-08', '2026-01-08'),
(126, 168, '2023-06-23', 991.00, '2026-01-08', '2026-01-08'),
(127, 169, '2023-06-23', 1233.50, '2026-01-08', '2026-01-08'),
(128, 170, '2023-06-23', 818.00, '2026-01-08', '2026-01-08'),
(129, 171, '2023-06-08', 2330.00, '2026-01-08', '2026-01-08'),
(130, 172, '2023-06-23', 3500.00, '2026-01-08', '2026-01-08'),
(131, 173, '2023-06-06', 2723.17, '2026-01-08', '2026-01-08'),
(132, 174, '2023-06-12', 2720.50, '2026-01-08', '2026-01-08'),
(133, 175, '2023-07-10', 570.00, '2026-01-08', '2026-01-08'),
(134, 176, '2023-05-12', 5423.60, '2026-01-08', '2026-01-08'),
(135, 177, '2023-05-08', 8169.52, '2026-01-08', '2026-01-08'),
(136, 178, '2023-05-15', 5757.53, '2026-01-08', '2026-01-08'),
(137, 179, '2023-05-11', 2408.10, '2026-01-08', '2026-01-08'),
(138, 180, '2023-04-20', 6368.80, '2026-01-08', '2026-01-08'),
(139, 181, '2023-04-11', 5618.90, '2026-01-08', '2026-01-08'),
(140, 182, '2023-03-31', 4709.80, '2026-01-08', '2026-01-08'),
(141, 183, '2023-03-24', 1452.00, '2026-01-08', '2026-01-08'),
(142, 184, '2023-03-31', 3161.44, '2026-01-08', '2026-01-08'),
(143, 185, '2023-03-15', 11376.00, '2026-01-08', '2026-01-08'),
(144, 186, '2023-03-09', 4742.16, '2026-01-08', '2026-01-08'),
(145, 187, '2023-03-04', 5699.50, '2026-01-08', '2026-01-08'),
(146, 188, '2023-02-10', 7602.00, '2026-01-08', '2026-01-08'),
(147, 189, '2023-02-14', 8734.00, '2026-01-08', '2026-01-08'),
(148, 190, '2023-02-01', 2110.00, '2026-01-08', '2026-01-08'),
(149, 191, '2023-02-01', 3175.00, '2026-01-08', '2026-01-08'),
(150, 192, '2023-01-23', 4756.21, '2026-01-08', '2026-01-08'),
(151, 193, '2023-01-23', 3851.92, '2026-01-08', '2026-01-08'),
(152, 194, '2023-01-12', 5134.00, '2026-01-08', '2026-01-08'),
(153, 195, '2023-01-06', 3610.60, '2026-01-08', '2026-01-08'),
(154, 196, '2023-01-09', 3577.88, '2026-01-08', '2026-01-08'),
(155, 197, '2023-12-06', 1000.00, '2026-01-08', '2026-01-08'),
(156, 198, '2022-12-14', 3577.88, '2026-01-08', '2026-01-08'),
(157, 199, '2022-12-16', 3610.60, '2026-01-08', '2026-01-08'),
(158, 200, '2022-12-16', 7153.58, '2026-01-08', '2026-01-08'),
(159, 207, '2026-03-01', NULL, '2026-03-05', '2026-03-05'),
(160, 2, '0001-02-02', 10354.00, '2026-03-05', '2026-03-05');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('eooujsZZ7NkniDvLzwQOgFe34S83Zf9sNhKuONHR', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicE1oWlNyb1p0dzNjRnJXSFhVNVhvZHNkZkZteGcybnphdTJBR3pzTCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZWdsZW1lbnRzIjtzOjU6InJvdXRlIjtzOjE2OiJyZWdsZW1lbnRzLmluZGV4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1772677052);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2026-01-08 14:28:08', '$2y$12$YE7NjVWWPPSUF3EGr0Obn.HZFQ7XOWPAV6EKDP9bmtvLM6CcgOuwy', 'U1B9WVLUOe', '2026-01-08 14:28:09', '2026-01-08 14:28:09');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chantiers`
--
ALTER TABLE `chantiers`
  ADD CONSTRAINT `chantiers_id_client_foreign` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`);

--
-- Contraintes pour la table `factures`
--
ALTER TABLE `factures`
  ADD CONSTRAINT `factures_id_chantier_foreign` FOREIGN KEY (`id_chantier`) REFERENCES `chantiers` (`id`),
  ADD CONSTRAINT `factures_id_client_foreign` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`);

--
-- Contraintes pour la table `reglements`
--
ALTER TABLE `reglements`
  ADD CONSTRAINT `reglements_id_facture_foreign` FOREIGN KEY (`id_facture`) REFERENCES `factures` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
