-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 31 jan. 2023 à 14:50
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cinehall`
--

-- --------------------------------------------------------

--
-- Structure de la table `halls`
--

CREATE TABLE `halls` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `movie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `movies`
--

INSERT INTO `movies` (`id`, `title`, `image`, `description`) VALUES
(1, 'The Imitation Game', 'https://m.media-amazon.com/images/M/MV5BOTgwMzFiMWYtZDhlNS00ODNkLWJiODAtZDVhNzgyNzJhYjQ4L2ltYWdlXkEyXkFqcGdeQXVyNzEzOTYxNTQ@._V1_.jpg', 'Benedict Cumberbatch, Keira Knightley'),
(2, 'Game Night', 'https://m.media-amazon.com/images/M/MV5BMjI3ODkzNDk5MF5BMl5BanBnXkFtZTgwNTEyNjY2NDM@._V1_.jpg', 'Jason Bateman, Rachel McAdams'),
(3, 'Game of Thrones', 'https://m.media-amazon.com/images/M/MV5BYTRiNDQwYzAtMzVlZS00NTI5LWJjYjUtMzkwNTUzMWMxZTllXkEyXkFqcGdeQXVyNDIzMzcwNjc@._V1_.jpg', 'Emilia Clarke, Peter Dinklage'),
(4, 'The Game', 'https://m.media-amazon.com/images/M/MV5BNWQ2ODFhNWItNTA4NS00MzkyLTgyYzUtZjlhYWE5MmEzY2Q1XkEyXkFqcGdeQXVyMjUzOTY1NTc@._V1_.jpg', 'Michael Douglas, Deborah Kara Unger'),
(5, 'Squid Game', 'https://m.media-amazon.com/images/M/MV5BYWE3MDVkN2EtNjQ5MS00ZDQ4LTliNzYtMjc2YWMzMDEwMTA3XkEyXkFqcGdeQXVyMTEzMTI1Mjk3._V1_.jpg', 'Lee Jung-jae, Park Hae-soo'),
(6, 'Game-Show', 'https://m.media-amazon.com/images/I/314t8YNB69L.png', 'Top 50 Game-Show Movies and TV Shows'),
(7, 'The Game', 'https://m.media-amazon.com/images/M/MV5BZjYyMDVhMzEtNmM4ZS00YzliLWExOWEtMzRjZmFkZTk2YjI0XkEyXkFqcGdeQXVyMTEzMTI1Mjk3._V1_.jpg', 'Wendy Raquel Robinson, Hosea Chanchez'),
(8, 'Molly\'s Game', 'https://m.media-amazon.com/images/M/MV5BNTkzMzRlYjEtMTQ5Yi00OWY3LWI0NzYtNGQ4ZDkzZTU0M2IwXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_.jpg', 'Jessica Chastain, Idris Elba'),
(9, 'How to Train Your Dragon', 'https://m.media-amazon.com/images/M/MV5BMjA5NDQyMjc2NF5BMl5BanBnXkFtZTcwMjg5ODcyMw@@._V1_.jpg', 'Jay Baruchel, Gerard Butler'),
(10, 'How to Train Your Dragon: Homecoming', 'https://m.media-amazon.com/images/M/MV5BMTlkZjM1MDctZTZlOC00NDQwLTg3ZGEtNTJhMWQ2YWIxNGViXkEyXkFqcGdeQXVyMjQ5MjYwNDE@._V1_.jpg', 'Jay Baruchel, America Ferrera'),
(11, 'How to Train Your Dragon 2', 'https://m.media-amazon.com/images/M/MV5BMzMwMTAwODczN15BMl5BanBnXkFtZTgwMDk2NDA4MTE@._V1_.jpg', 'Jay Baruchel, Cate Blanchett'),
(12, 'How to Train Your Dragon: Snoggletog Log', 'https://m.media-amazon.com/images/M/MV5BNDhjZWY0ZTMtOGY0Yy00ZWY2LTg1MzMtNjE0YzhjZmUyY2Y2XkEyXkFqcGdeQXVyMTEwNTU2NzM3._V1_.jpg', ''),
(13, 'How to Train Your Dragon: The Hidden World', 'https://m.media-amazon.com/images/M/MV5BMjIwMDIwNjAyOF5BMl5BanBnXkFtZTgwNDE1MDc2NTM@._V1_.jpg', 'Jay Baruchel, America Ferrera'),
(14, 'Dreamworks How to Train Your Dragon Legends', 'https://m.media-amazon.com/images/M/MV5BMTQzMjE5NDQwMl5BMl5BanBnXkFtZTgwMjI2NzA2MDE@._V1_.jpg', 'Jay Baruchel, Gerard Butler'),
(15, 'Dreamworks How to Train Your Dragon Legends', 'https://m.media-amazon.com/images/M/MV5BODdhMzNjNGItYmUzMC00NWM5LTgyYmEtNzI3YjFlNGY5MTkyXkEyXkFqcGdeQXVyNTM3MDMyMDQ@._V1_.jpg', 'Christopher Mintz-Plasse, Jay Baruchel'),
(16, 'How to Train Your Dragon: Viking-Sized Cast', 'https://m.media-amazon.com/images/M/MV5BYzY1M2RjZGEtMGI5NS00YmJjLWFiN2MtMDgxYTk1ODNkNzljXkEyXkFqcGdeQXVyNDQ5MDYzMTk@._V1_.jpg', 'Bonnie Arnold, Jay Baruchel');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `costumer` int(11) NOT NULL,
  `seat` int(11) NOT NULL,
  `hall` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `identifier`, `full_name`, `email`, `password`, `role`) VALUES
(1, 'eec47fc02ccbda3f1bca255e6be99efc', 'abderrahamne', 'abdo@gmail.com', '1a1dc91c907325c69271ddf0c944bc72', 'client'),
(2, 'ec84c415d56636358c33210507b1b40e', 'abderrahamne', 'abderrahmane@gmail.com', '1a1dc91c907325c69271ddf0c944bc72', 'client');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie` (`movie`);

--
-- Index pour la table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `costumer` (`costumer`),
  ADD KEY `hall` (`hall`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `halls`
--
ALTER TABLE `halls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `halls`
--
ALTER TABLE `halls`
  ADD CONSTRAINT `halls_ibfk_1` FOREIGN KEY (`movie`) REFERENCES `movies` (`id`);

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`costumer`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`hall`) REFERENCES `halls` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
