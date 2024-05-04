-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 04 mai 2024 à 12:40
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ikea`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT '1.png',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `icon`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Téléphones', 'phone', '1.png', '2024-05-02 10:15:19', '2024-05-02 12:37:20', NULL),
(2, 'Tablet', 'tablet', '1.png', '2024-05-02 10:15:19', '2024-05-02 12:38:15', NULL),
(3, 'pc portable', 'laptop', '1.png', '2024-05-02 10:15:19', '2024-05-02 12:30:30', NULL),
(4, 'pc bureau', 'pc-display', '1.png', '2024-05-02 10:15:19', '2024-05-02 12:30:30', NULL),
(5, 'Iphone', 'phone', 'iPhone-15-series.jpg', '2024-05-02 12:57:33', NULL, NULL),
(6, 'Ipad', 'tablet', 'iPad-series.jpg', '2024-05-02 12:57:54', NULL, NULL),
(7, 'Ipad 2', '', 'iPad-series.jpg', '2024-05-03 10:30:20', NULL, NULL),
(8, 'Test image', 'tv', 'iPad-series.jpg', '2024-05-03 10:42:07', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `couleurs`
--

CREATE TABLE `couleurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `couleurs`
--

INSERT INTO `couleurs` (`id`, `nom`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'blue', '2024-05-02 10:17:02', NULL, NULL),
(2, 'green', '2024-05-02 10:17:02', NULL, NULL),
(3, 'red', '2024-05-02 10:17:02', NULL, NULL),
(4, 'pink', '2024-05-02 10:17:02', NULL, NULL),
(5, 'purple', '2024-05-02 10:17:02', NULL, NULL),
(6, 'yellow', '2024-05-02 10:17:02', NULL, NULL),
(7, 'orange', '2024-05-02 10:17:02', NULL, NULL),
(8, 'test', '2024-05-02 10:17:02', NULL, NULL),
(9, 'ikram', '2024-05-02 10:17:02', NULL, NULL),
(10, 'gold', '2024-05-02 10:17:02', NULL, NULL),
(11, 'orange', '2024-05-02 10:17:02', NULL, NULL),
(12, 'blue', '2024-05-02 10:17:02', NULL, NULL),
(13, 'purple', '2024-05-02 10:17:02', NULL, NULL),
(14, 'ikram', '2024-05-02 10:17:02', NULL, NULL),
(15, 'green', '2024-05-02 10:17:02', NULL, NULL),
(16, 'nnnnnnn', '2024-05-02 10:17:02', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `quantite` int(11) NOT NULL DEFAULT 0,
  `prix` decimal(10,2) NOT NULL DEFAULT 0.00,
  `ancien_prix` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `image`, `quantite`, `prix`, `ancien_prix`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'iphone 14 pro max blue', '1.jpg', 10, 15000.00, 15500.00, '2024-05-02 10:16:18', NULL, NULL),
(2, 'iphone 13 pro max gold', '2.jpg', 15, 13000.00, 13500.00, '2024-05-02 10:16:18', NULL, NULL),
(3, 'imac 24 pouce m2 pink', '3.jpg', 25, 24000.00, 24500.00, '2024-05-02 10:16:18', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `prenom`, `nom`, `email`, `password`) VALUES
(1, 'othmane', 'mezgueldi', 'othmane@gmail.com', '123456'),
(2, 'Quis et voluptate mo', 'Voluptates lorem omn', 'popohar@mailinator.com', 'Pa$$w0rd!'),
(3, '', '', '', ''),
(4, 'Quae dolores accusam', 'Aut corporis quos ex', 'hivedujege@mailinator.com', 'Dolore duis atque qu'),
(5, 'Et itaque voluptatem', 'Qui nobis dolores ut', 'xileva@mailinator.com', 'Pa$$w0rd!'),
(6, 'Nostrum quo mollitia', 'Aut fuga Laudantium', 'sila@mailinator.com', '$2y$10$7CtweL0DxHYRKXqNiviM8ecwrUEjd.2P8gWOqgGpGFD2Y6YHXLoMG');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `couleurs`
--
ALTER TABLE `couleurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `couleurs`
--
ALTER TABLE `couleurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
