-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 29 avr. 2024 à 23:08
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;

--
-- Base de données : `ikea`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
    `id` int(11) NOT NULL, `nom` varchar(255) DEFAULT NULL, `icon` varchar(255) DEFAULT NULL, `categories_at` datetime NOT NULL DEFAULT current_timestamp(), `categories_de` datetime DEFAULT NULL, `categories_md` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO
    `categories` (
        `id`, `nom`, `icon`, `categories_at`, `categories_de`, `categories_md`
    )
VALUES (
        1, 'Téléphones', 'phone', '2024-04-29 20:48:30', NULL, '2024-04-29 20:48:30'
    ),
    (
        2, 'Tablettes', 'tablet', '2024-04-29 20:48:30', NULL, '2024-04-29 20:48:30'
    ),
    (
        3, 'pc portable', 'laptop', '2024-04-29 20:48:30', NULL, '2024-04-29 20:48:30'
    ),
    (
        4, 'pc bureau', 'pc-display', '2024-04-29 20:48:30', NULL, '2024-04-29 20:48:30'
    );

-- --------------------------------------------------------

--
-- Structure de la table `couleurs`
--

CREATE TABLE `couleurs` (
    `id` int(11) NOT NULL, `nom` varchar(255) DEFAULT NULL, `categories_at` datetime NOT NULL DEFAULT current_timestamp(), `categories_de` datetime DEFAULT NULL, `categories_md` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Déchargement des données de la table `couleurs`
--

INSERT INTO
    `couleurs` (
        `id`, `nom`, `categories_at`, `categories_de`, `categories_md`
    )
VALUES (
        1, 'blue', '2024-04-29 20:51:39', NULL, '2024-04-29 20:51:39'
    ),
    (
        2, 'green', '2024-04-29 20:51:39', NULL, '2024-04-29 20:51:39'
    ),
    (
        3, 'red', '2024-04-29 20:51:39', NULL, '2024-04-29 20:51:39'
    ),
    (
        4, 'pink', '2024-04-29 20:51:39', NULL, '2024-04-29 20:51:39'
    ),
    (
        5, 'purple', '2024-04-29 20:51:39', NULL, '2024-04-29 20:51:39'
    ),
    (
        6, 'yellow', '2024-04-29 20:51:39', NULL, '2024-04-29 20:51:39'
    ),
    (
        7, 'orange', '2024-04-29 20:51:39', NULL, '2024-04-29 20:51:39'
    ),
    (
        8, 'test', '2024-04-29 20:51:39', NULL, '2024-04-29 20:51:39'
    ),
    (
        9, 'ikram', '2024-04-29 20:51:39', NULL, '2024-04-29 20:51:39'
    ),
    (
        10, 'gold', '2024-04-29 20:51:39', NULL, '2024-04-29 20:51:39'
    ),
    (
        11, 'orange', '2024-04-29 20:51:39', NULL, '2024-04-29 20:51:39'
    ),
    (
        12, 'blue', '2024-04-29 20:51:39', NULL, '2024-04-29 20:51:39'
    ),
    (
        13, 'purple', '2024-04-29 20:51:39', NULL, '2024-04-29 20:51:39'
    ),
    (
        14, 'ikram', '2024-04-29 20:51:39', NULL, '2024-04-29 20:51:39'
    ),
    (
        15, 'green', '2024-04-29 20:51:39', NULL, '2024-04-29 20:51:39'
    ),
    (
        16, 'nnnnnnn', '2024-04-29 20:51:39', NULL, '2024-04-29 20:51:39'
    );

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
    `id` int(11) NOT NULL, `nom` varchar(255) DEFAULT NULL, `categories_at` datetime NOT NULL DEFAULT current_timestamp(), `categories_de` datetime DEFAULT NULL, `categories_md` datetime NOT NULL DEFAULT current_timestamp(), `image` varchar(255) DEFAULT NULL, `quantite` int(11) NOT NULL DEFAULT 0, `prix` decimal(10, 2) NOT NULL DEFAULT 0.00, `ancien_prix` decimal(10, 2) NOT NULL DEFAULT 0.00
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO
    `produits` (
        `id`, `nom`, `categories_at`, `categories_de`, `categories_md`, `image`, `quantite`, `prix`, `ancien_prix`
    )
VALUES (
        1, 'iphone 14 pro max blue', '2024-04-29 20:52:59', NULL, '2024-04-29 20:52:59', '1.jpg', 10, '15000.00', '15500.00'
    ),
    (
        2, 'iphone 13 pro max gold', '2024-04-29 20:52:59', NULL, '2024-04-29 20:52:59', '2.jpg', 15, '13000.00', '13500.00'
    ),
    (
        3, 'imac 24 pouce m2 pink', '2024-04-29 20:52:59', NULL, '2024-04-29 20:52:59', '3.jpg', 25, '24000.00', '24500.00'
    );

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories` ADD PRIMARY KEY (`id`);

--
-- Index pour la table `couleurs`
--
ALTER TABLE `couleurs` ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits` ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 5;

--
-- AUTO_INCREMENT pour la table `couleurs`
--
ALTER TABLE `couleurs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 17;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 4;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;