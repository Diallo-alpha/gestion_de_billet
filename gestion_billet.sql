-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 06 mars 2024 à 16:06
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_billet`
--

-- --------------------------------------------------------

--
-- Structure de la table `billet`
--

CREATE TABLE `billet` (
  `id` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `fk_client` int(11) DEFAULT NULL,
  `detaille` text DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `billet`
--

INSERT INTO `billet` (`id`, `prix`, `date`, `fk_client`, `detaille`, `image`) VALUES
(11, 1000000, '2024-03-11', NULL, 'Réserver votre billet avec royal Air Maroc pour vos prochaine voyage en France ', 'images/value.png'),
(12, 500000, '2024-03-06', NULL, 'maroc afrique du sud', 'images/sql.png'),
(13, 400000, '2024-03-07', NULL, 'nice', 'images/table_cat.png'),
(14, 25000, '2024-03-01', NULL, 'ok ok ', 'images/MLD_innova.png');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `prenom` varchar(120) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `pays` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `nbr_voyageur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `email`, `telephone`, `pays`, `date`, `nbr_voyageur`) VALUES
(1, 'demble', 'moussa', 'alphaloppecity@gmail.com', '781452826', 'canada', '2024-03-05', 5),
(2, 'kane', 'moussa', 'kane.moussa@gmail.com', '778457584', 'france', '2024-03-07', 6),
(3, 'diallo', 'alpha', 'alphaloppecity@gmail.com', '781452826', 'canada', '2024-03-05', 1),
(4, 'diallo', 'alpha', 'alphaloppecity@gmail.com', '781041321', 'canada', '2024-03-05', 1),
(5, 'diallo', 'alpha', 'alphaloppecity@gmail.com', '781041321', 'canada', '2024-03-05', 1),
(6, 'diallo', 'alpha', 'alphaloppecity@gmail.com', '781041321', 'canada', '2024-03-05', 1),
(7, 'diallo', 'alpha', 'alphaloppecity@gmail.com', '781041321', 'canada', '2024-03-05', 1),
(8, 'diallo', 'alpha', 'alphaloppecity@gmail.com', '7810413211', 'canada', '2024-03-05', 1),
(9, 'diallo', 'alpha', 'alphaloppecity@gmail.com', '781041321', 'canada', '2024-03-05', 1),
(10, 'fall', 'aliou', 'alioufall@gmail.com', '781056565', 'sénégal', '2024-03-04', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `billet`
--
ALTER TABLE `billet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_client` (`fk_client`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `billet`
--
ALTER TABLE `billet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `billet`
--
ALTER TABLE `billet`
  ADD CONSTRAINT `billet_ibfk_1` FOREIGN KEY (`fk_client`) REFERENCES `client` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
