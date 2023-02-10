-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 10 fév. 2023 à 20:37
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
-- Structure de la table `movies`
--

CREATE TABLE `movies` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `image` varchar(500) NOT NULL,
  `trailer` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `movies`
--

INSERT INTO `movies` (`id`, `name`, `price`, `image`, `trailer`, `description`) VALUES
(1, 'cvbn', 14, '158', 'hj', 'hgjklm'),
(2, 'cvbn', 14, '158', 'hj', 'hgjklm'),
(3, 'cvbn', 14, 'https://img-19.commentcamarche.net/cI8qqj-finfDcmx', 'hj', 'hgjklm'),
(4, 'cvbn', 14, 'https://img-19.commentcamarche.net/cI8qqj-finfDcmx', 'hj', 'hgjklm'),
(5, 'cvbn', 14, 'https://img-19.commentcamarche.net/cI8qqj-finfDcmx', 'hj', 'hgjklm'),
(6, 'cvbn', 14, 'https://img-19.commentcamarche.net/cI8qqj-finfDcmx6jMK6Vr-krEw=/1500x/smart/b829396acc244fd484c5ddcdcb2b08f3/ccmcms-commentcamarche/20494859.jpg', 'hj', 'hgjklm'),
(7, 'cvbn', 14, 'https://img-19.commentcamarche.net/cI8qqj-finfDcmx6jMK6Vr-krEw=/1500x/smart/b829396acc244fd484c5ddcdcb2b08f3/ccmcms-commentcamarche/20494859.jpg', 'http://v.traileraddict.com/123367', 'hgjklm'),
(8, 'second', 12, 'https://img-19.commentcamarche.net/cI8qqj-finfDcmx6jMK6Vr-krEw=/1500x/smart/b829396acc244fd484c5ddcdcb2b08f3/ccmcms-commentcamarche/20494859.jpg', 'http://v.traileraddict.com/123367', 'Silva and Browning Traders'),
(9, 'second', 12, 'https://img-19.commentcamarche.net/cI8qqj-finfDcmx6jMK6Vr-krEw=/1500x/smart/b829396acc244fd484c5ddcdcb2b08f3/ccmcms-commentcamarche/20494859.jpg', 'http://v.traileraddict.com/123367', 'Silva and Browning Traders'),
(10, 'Batman', 12, 'https://m.media-amazon.com/images/M/MV5BMDdmMTBiNTYtMDIzNi00NGVlLWIzMDYtZTk3MTQ3NGQxZGEwXkEyXkFqcGdeQXVyMzMwOTU5MDk@._V1_.jpg', 'http://v.traileraddict.com/123367', 'Silva and Browning Traders'),
(11, 'Dark Night', 22, 'https://images.moviesanywhere.com/bd47f9b7d090170d79b3085804075d41/c6140695-a35f-46e2-adb7-45ed829fc0c0.jpg', 'http://v.traileraddict.com/123367', 'The lead character, called \'The Bride,\' was a member\nof the Deadly Viper Assassination Squad, led by her\nlover \'Bill.\' Upon realizing she was pregnant with Bill\'s\nchild, \'The Bride\' decided to escape her life as a killer.\nShe fled to Texas, met a young man, who, on the day\nof their wedding rehearsal was gunned down by....'),
(12, 'Hicks Gilbert Associates', 123, 'https://img-19.commentcamarche.net/cI8qqj-finfDcmx6jMK6Vr-krEw=/1500x/smart/b829396acc244fd484c5ddcdcb2b08f3/ccmcms-commentcamarche/20494859.jpg', 'http://v.traileraddict.com/123367', 'The lead character, called \'The Bride,\' was a member\nof the Deadly Viper Assassination Squad, led by her\nlover \'Bill.\' Upon realizing she was pregnant with Bill\'s\nchild, \'The Bride\' decided to escape her life as a killer.\nShe fled to Texas, met a young man, who, on the day\nof their wedding rehearsal was gunned down by....');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(6) NOT NULL,
  `client_token` varchar(50) NOT NULL,
  `id_room` int(2) NOT NULL,
  `id_movie` int(5) NOT NULL,
  `date` date NOT NULL,
  `seat` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `client_token`, `id_room`, `id_movie`, `date`, `seat`) VALUES
(8, '9e5e5e5d47a44fac806d91efc8fc8ee4', 1, 11, '2023-02-08', 1),
(9, '9e5e5e5d47a44fac806d91efc8fc8ee4', 1, 11, '2023-02-08', 19),
(10, '9e5e5e5d47a44fac806d91efc8fc8ee4', 1, 11, '2023-02-08', 5),
(11, '9e5e5e5d47a44fac806d91efc8fc8ee4', 1, 11, '2023-02-08', 21),
(12, '9e5e5e5d47a44fac806d91efc8fc8ee4', 1, 11, '2023-02-08', 14),
(13, '9e5e5e5d47a44fac806d91efc8fc8ee4', 1, 11, '2023-02-08', 13),
(14, '9e5e5e5d47a44fac806d91efc8fc8ee4', 1, 11, '2023-02-08', 10),
(15, '9e5e5e5d47a44fac806d91efc8fc8ee4', 1, 11, '2023-02-08', 32),
(16, '9e5e5e5d47a44fac806d91efc8fc8ee4', 1, 11, '2023-02-08', 31),
(17, '9e5e5e5d47a44fac806d91efc8fc8ee4', 1, 11, '2023-02-08', 39),
(18, '9e5e5e5d47a44fac806d91efc8fc8ee4', 4, 10, '2023-02-22', 20),
(19, '9e5e5e5d47a44fac806d91efc8fc8ee4', 4, 10, '2023-02-22', 1),
(20, '9e5e5e5d47a44fac806d91efc8fc8ee4', 4, 10, '2023-02-22', 2),
(21, '9e5e5e5d47a44fac806d91efc8fc8ee4', 4, 10, '2023-02-22', 37),
(22, '9e5e5e5d47a44fac806d91efc8fc8ee4', 4, 10, '2023-02-22', 5),
(23, '9e5e5e5d47a44fac806d91efc8fc8ee4', 1, 11, '2023-02-08', 3),
(26, '9e5e5e5d47a44fac806d91efc8fc8ee4', 1, 11, '2023-02-08', 16),
(27, '9e5e5e5d47a44fac806d91efc8fc8ee4', 1, 11, '2023-02-08', 41),
(28, '9e5e5e5d47a44fac806d91efc8fc8ee4', 1, 11, '2023-02-08', 15),
(29, '9e5e5e5d47a44fac806d91efc8fc8ee4', 1, 11, '2023-02-08', 43),
(30, '9e5e5e5d47a44fac806d91efc8fc8ee4', 1, 11, '2023-02-08', 7),
(33, '9e5e5e5d47a44fac806d91efc8fc8ee4', 1, 11, '2023-02-08', 2);

-- --------------------------------------------------------

--
-- Structure de la table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(5) NOT NULL,
  `number` varchar(5) NOT NULL,
  `capacity` int(2) NOT NULL,
  `date_movie` date NOT NULL,
  `movie_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rooms`
--

INSERT INTO `rooms` (`id`, `number`, `capacity`, `date_movie`, `movie_id`) VALUES
(1, 'R1', 48, '2023-02-08', 11),
(3, 'R2', 5, '2023-02-22', 10),
(4, 'R3', 10, '2023-02-22', 10);

-- --------------------------------------------------------

--
-- Structure de la table `seats`
--

CREATE TABLE `seats` (
  `id` int(2) NOT NULL,
  `seatNumber` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `seats`
--

INSERT INTO `seats` (`id`, `seatNumber`) VALUES
(1, 'A1'),
(2, 'A2'),
(3, 'A3'),
(4, 'A4'),
(5, 'A5'),
(6, 'A6'),
(7, 'A7'),
(8, 'A8'),
(9, 'A9'),
(10, 'A1');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `token` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `token`, `name`, `email`, `password`, `lastName`) VALUES
(165, '00704e336ff863f60ee70cb0a5cdba7f', 'Quinlan', 'sonyf@mailinator.com', 'Pa$$w0rd!', 'Tanner'),
(168, '050de5518f8fc1ea1b292a05795edac5', 'Reese', 'tifipuc@mailinator.com', 'Pa$$w0rd!', 'Stafford'),
(160, '18e01d5166c005edd37700e4f6c04c15', 'May', 'nevy@mailinator.com', 'Pa$$w0rd!', 'Gates'),
(146, '1a9475bfc859e1a3ab55021cc89454a6', 'Sasha', 'hirux@mailinator.com', 'Pa$$w0rd!', 'Thornton'),
(161, '21d8c0948f6919c701c1d64e266bbb50', 'May', 'koxojy@mailinator.com', 'Pa$$w0rd!', 'Gates'),
(156, '3aee0497804ef45bec9b13c5fb585a67', 'Gabriel', 'lupus@mailinator.com', 'Pa$$w0rd!', 'Buckner'),
(163, '4968e71f9343626dfae46dc4d3a4b520', 'Regan', 'koxojy@mailinator.com', 'Pa$$w0rd!', 'Fields'),
(162, '4a43237a20335e137aade08d5547a17c', 'Regan', 'koxojy@mailinator.com', 'Pa$$w0rd!', 'Fields'),
(158, '4af5bc84cb6bbef8745b9c483e2e622f', 'May', 'nevy@mailinator.com', 'Pa$$w0rd!', 'Gates'),
(151, '4c4614153c3593909ff03348c1168cbf', 'Aphrodite', 'tuzujogi@mailinator.com', 'Pa$$w0rd!', 'Hall'),
(170, '4de47abcd0c0adb0f7962f316fa762ad', 'Reese', 'tifizzzzpuc@mailinator.com', 'Pa$$w0rd!', 'Stafford'),
(164, '53fbb5f7fad7c2f4cf111e2795f4b7c3', 'Beau', 'zajakuxu@mailinator.com', 'Pa$$w0rd!', 'Herring'),
(171, '546ec0fb3439949f59bc0f29f715be15', 'Althea', 'asiyya@gmail.com', '123456', 'Alvarez'),
(152, '5570fac6bbed2177942603f42e45edd3', 'Bernard', 'niniry@mailinator.com', 'Pa$$w0rd!', 'Barker'),
(154, '5968c9af1a1397a92ae0cbafc0c5a956', 'Lilah', 'beqyz@mailinator.com', 'Pa$$w0rd!', 'May'),
(167, '5a3c271d78bdbd7297de15950f3de4ca', 'Hammett', 'luzvy@mailinator.com', 'Pa$$w0rd!', 'Bell'),
(157, '7444cd2270b45554f2e3c71b2881882b', 'Cairo', 'wekirej@mailinator.com', 'Pa$$w0rd!', 'Alston'),
(147, '789c7e075773b67dcd1ecb230ce1d23a', 'Ruby', 'galibutusa@mailinator.com', 'Pa$$w0rd!', 'Douglas'),
(169, '7e67d3fcb13f9cb1ffcf888e2c3c4eb0', 'Reese', 'tifizzzpuc@mailinator.com', 'Pa$$w0rd!', 'Stafford'),
(153, '872f6f5aae26e3db60d994bb82ae3ebd', 'Wayne', 'xinegu@mailinator.com', 'Pa$$w0rd!', 'Anderson'),
(150, '92840f7846f6deb5c09b41198d7ec42a', 'Alika', 'dezuvevevu@mailinator.com', 'Pa$$w0rd!', 'Foster'),
(159, '98647f0ac752e46d23e89ded6485d115', 'May', 'nevy@mailinator.com', 'Pa$$w0rd!', 'Gates'),
(143, '9e5e5e5d47a44fac806d91efc8fc8ee4', 'Cassady', 'ninacyp@mailinator.com', 'Pa$$w0rd!', 'Chan'),
(144, 'a1464d9316b6a58b2e4040cb05bc8414', 'Russell', 'koxojy@mailinator.com', 'Pa$$w0rd!', 'Bowman'),
(155, 'a4c53adc5da6311b0ac2b3f49fb9ea81', 'Megan', 'wuqywuke@mailinator.com', 'Pa$$w0rd!', 'Owens'),
(145, 'e5ac10fe90c3e526fcaa42c299a2b721', 'Azalia', 'wojezem@mailinator.com', 'Pa$$w0rd!', 'Carney'),
(166, 'e68fa8c151a5e166564c86c916f01062', 'Hammett', 'luvy@mailinator.com', 'Pa$$w0rd!', 'Bell'),
(172, 'edcbb29a580bac32b1503ef18d9d98d9', 'Althea', 'asiyhya@gmail.com', '123456', 'Alvarez'),
(149, 'f00003635733b7eb1759e7d53fffed06', 'Alika', 'dezuvevevu@mailinator.com', 'Pa$$w0rd!', 'Foster'),
(148, 'f123961fa2c3003ce55911c95fb71be0', 'Kylee', 'bucixitozy@mailinator.com', 'Pa$$w0rd!', 'Rocha');

--
-- Index pour les tables déchargées
--

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
  ADD KEY `id_client` (`client_token`),
  ADD KEY `id_movie` (`id_movie`),
  ADD KEY `id_room` (`id_room`);

--
-- Index pour la table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_movie` (`movie_id`);

--
-- Index pour la table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`token`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`id_movie`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_3` FOREIGN KEY (`id_room`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_4` FOREIGN KEY (`client_token`) REFERENCES `users` (`token`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
