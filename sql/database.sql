-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 15 déc. 2025 à 20:39
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tom-troc`
--

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `author` text NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(255) NOT NULL DEFAULT 'http://localhost/tomTroc/assets/books/default.webp',
  `user_id` int(11) NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `description`, `image_url`, `user_id`, `available`, `created_at`) VALUES
(20, 'Le Nom du vent', 'Patrick Rothfuss', 'Premier tome des Chroniques du Tueur de Roi. Kvothe, musicien et mage de génie, raconte sa vie d’aventures, de drames et de découvertes. Une fantasy poétique, centrée sur le pouvoir des mots et du savoir.', 'http://localhost/tomTroc/assets/books/book1.jpg', 4, 1, '2025-11-10 13:37:44'),
(21, '1984', 'George Orwell', 'Dans un monde totalitaire, Big Brother surveille tout. Winston Smith tente de garder sa liberté de pensée. Une dystopie glaçante, toujours d’actualité, sur la manipulation et le contrôle.', 'http://localhost/tomTroc/assets/books/book2.jpg', 3, 1, '2025-11-10 13:39:34'),
(22, 'L’Hôtel', 'Emma Straub', 'Un vieux complexe hôtelier de Floride, une famille dysfonctionnelle, et des secrets qui remontent à la surface. Une chronique douce-amère sur le passage du temps et la complexité des relations humaines.', 'http://localhost/tomTroc/assets/books/book3.jpg', 5, 0, '2025-11-10 13:39:34'),
(23, 'Le Chardonneret', 'Donna Tartt', 'Après un attentat, Theo vole un tableau qui va hanter toute sa vie. Un roman dense et bouleversant sur la culpabilité, l’art et la survie émotionnelle.', 'http://localhost/tomTroc/assets/books/book4.jpg', 4, 1, '2025-11-10 13:39:56'),
(24, 'Shutter Island', 'Dennis Lehane', 'Deux marshals enquêtent sur la disparition d’une patiente dans un asile isolé. L’île cache un secret terrifiant. Un thriller psychologique brillant, au twist mémorable.', 'http://localhost/tomTroc/assets/books/book5.jpg', 3, 0, '2025-11-10 13:40:31'),
(25, 'Stardust', 'Neil Gaiman', 'Un jeune homme promet d’apporter une étoile tombée du ciel à sa bien-aimée… mais découvre un monde féérique plein de dangers et de magie. Un conte moderne à la fois drôle et émouvant.', 'http://localhost/tomTroc/assets/books/book6.jpg', 4, 1, '2025-11-10 13:40:31'),
(26, 'Eleanor Oliphant va très bien', 'Gail Honeyman', 'Eleanor mène une vie solitaire et méthodique, jusqu’à ce qu’un simple acte de gentillesse change tout. Un roman plein d’humour et de tendresse sur la solitude et la guérison.', 'http://localhost/tomTroc/assets/books/book7.jpg', 4, 1, '2025-11-10 13:41:51'),
(27, 'Le Fléau', 'Stephen King', 'Une épidémie décime la population mondiale. Les survivants doivent choisir entre le bien et le mal. Une fresque apocalyptique monumentale, mêlant fantastique et tension psychologique.', 'http://localhost/tomTroc/assets/books/book8.jpg', 3, 1, '2025-11-10 13:41:51'),
(28, 'Dune', 'Frank Herbert', 'Sur la planète désertique Arrakis, le jeune Paul Atreides découvre son destin au cœur des luttes de pouvoir pour l’épice. Une épopée mythique entre science, écologie et spiritualité.', 'http://localhost/tomTroc/assets/books/book9.jpg', 4, 1, '2025-11-10 13:42:30'),
(29, 'Mexican Gothic', 'Silvia Moreno-Garcia', 'Années 1950, Mexique. Une jeune femme enquête dans un manoir où la pourriture n’est pas que dans les murs. Un gothique moderne et envoûtant, entre horreur et élégance.', 'http://localhost/tomTroc/assets/books/book10.jpg', 4, 1, '2025-11-10 13:42:30'),
(32, 'Farenheit 451', 'Ray Bradbury', 'Dans un futur où les livres sont interdits, un pompier chargé de les brûler commence à douter. Un classique sur la censure, la mémoire et la liberté de penser.', 'http://localhost/tomTroc/assets/books/book11.jpg', 3, 1, '2025-11-10 13:43:15'),
(33, 'La Maison des Feuilles', 'Mark Z. Danielewski', 'Un livre-labyrinthe sur une maison plus grande à l’intérieur qu’à l’extérieur, un film inexistant et un lecteur obsédé. Expérimental, angoissant et fascinant.', 'http://localhost/tomTroc/assets/books/book12.jpg', 4, 1, '2025-11-10 13:43:15'),
(34, 'Le Cercle littéraire des amateurs d’épluchures de patates', 'Mary Ann Shaffer', 'Après la guerre, une écrivaine découvre une île où la littérature a aidé à survivre. Une correspondance charmante et pleine d’humanité.', 'http://localhost/tomTroc/assets/books/book13.jpg', 4, 1, '2025-11-10 13:43:42'),
(35, 'Les Fils de l’homme', 'P. D. James', 'Dans un futur sans naissances depuis 25 ans, l’humanité s’éteint doucement… jusqu’à l’apparition d’une femme enceinte. Une dystopie sobre et profondément humaine.', 'http://localhost/tomTroc/assets/books/book14.jpg', 3, 0, '2025-11-10 13:43:42'),
(36, 'Dans les forêts de Sibérie', 'Sylvain Tesson', 'Un homme s’isole six mois dans une cabane au bord du lac Baïkal. Journal poétique d’une quête de silence, de liberté et de beauté brute.', 'http://localhost/tomTroc/assets/books/book15.jpg', 4, 1, '2025-11-10 13:44:12'),
(37, 'World War Z', 'Max Brooks', 'Des survivants racontent comment le monde a survécu à l’apocalypse zombie. Une mosaïque réaliste et terrifiante, écrite comme un vrai reportage.', 'http://localhost/tomTroc/assets/books/book16.jpg', 4, 1, '2025-11-10 13:44:12'),
(38, 'La femme du voyageur du temps', 'Audrey Niffenegger', 'Un homme souffre d’un trouble génétique qui le fait voyager involontairement dans le temps. Une histoire d’amour poignante, pleine de mélancolie et de poésie.', 'http://localhost/tomTroc/assets/books/book1.jpg', 3, 1, '2025-11-10 13:44:27'),
(39, 'L’Énigme du retour', 'Dany Laferrière', 'Un écrivain haïtien revient au pays après la mort de son père. Un récit poétique sur l’exil, la mémoire et l’identité.', 'http://localhost/tomTroc/assets/books/book2.jpg', 4, 1, '2025-11-10 13:44:55'),
(40, 'Vernon Subutex', 'Virginie Despentes', 'Ancien disquaire devenu SDF, Vernon erre dans Paris. Chronique sociale percutante, entre rock, solitude et désillusion.', 'http://localhost/tomTroc/assets/books/book3.jpg', 4, 1, '2025-11-10 13:44:55'),
(41, 'Kafka sur le rivage', 'Haruki Murakami', 'Un adolescent en fuite et un vieil homme qui parle aux chats voient leurs destins se croiser dans une odyssée onirique. Mystère, philosophie et surréalisme au programme.', 'http://localhost/tomTroc/assets/books/book4.jpg', 4, 1, '2025-11-10 13:45:09');

-- --------------------------------------------------------

--
-- Structure de la table `discussions`
--

DROP TABLE IF EXISTS `discussions`;
CREATE TABLE IF NOT EXISTS `discussions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_1` int(11) NOT NULL,
  `user_2` int(11) NOT NULL,
  `last_message` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_1` (`user_1`),
  KEY `fk_user_2` (`user_2`),
  KEY `fk_last_message` (`last_message`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `discussions`
--

INSERT INTO `discussions` (`id`, `user_1`, `user_2`, `last_message`) VALUES
(5, 3, 4, 28),
(6, 5, 4, 13);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `sended_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text NOT NULL,
  `discussion` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sender` (`sender_id`),
  KEY `fk_discussion` (`discussion`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `sender_id`, `sended_at`, `content`, `discussion`) VALUES
(4, 3, '2025-11-26 16:09:08', 'Bonjour ! J’ai vu que tu proposais Le Nom du vent en prêt. Est-ce qu’il est toujours disponible ?', 5),
(5, 4, '2025-11-26 16:21:24', 'Oui, il est toujours dispo. Tu souhaites l’emprunter pour combien de temps ?', 5),
(6, 3, '2025-12-05 11:27:34', 'Super ! Environ 3 semaines si ça te va. Je peux m’adapter si besoin.', 5),
(7, 3, '2025-12-05 11:27:37', '3 semaines, c’est parfait. Tu es de quel côté pour l’échange ?', 5),
(8, 5, '2025-12-05 11:37:55', 'Salut ! Je suis intéressé par 1984 que tu proposes en échange. Est-ce qu’il est toujours dispo ?', 6),
(12, 4, '2025-12-09 16:52:13', 'Salut ! Oui, il est toujours disponible. Tu voulais l’emprunter ou proposer un échange ?', 6),
(13, 4, '2025-12-09 16:52:48', 'Plutôt un emprunt si possible. Je pensais à deux semaines environ.', 6),
(14, 4, '2025-12-09 16:54:53', 'Pas de souci pour deux semaines. Tu en prendras soin ?', 5),
(27, 4, '2025-12-09 17:18:25', 'Je lis surtout le soir, il restera en parfait état.', 5),
(28, 4, '2025-12-11 13:08:34', 'Parfait alors. Tu es dispo quand pour le récupérer ?', 5);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `pseudo` text NOT NULL,
  `profile_picture` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `pseudo`, `profile_picture`, `created_at`) VALUES
(3, 'benjamin.mechenet@live.fr', '$2y$10$QkrvrCSSUVendG9c9sSBR.4dpbdNd2zZdv97E5FKK7OIgirMTZ24q', 'Ben2', 'assets/profil/profil_69406df283e941.69005669.webp', '2025-10-28 16:29:36'),
(4, 'benjamin_mechenet@live.fr', '$2y$10$KrkKFV55rSgDNj.H7WS6reY02foeSlDkFoYhYl2TbLfOWPqZ6D/Nu', 'Ben', 'assets/profil/profil_6911f89ad9fb34.07823881.webp', '2025-11-10 13:30:41'),
(5, 'marie@gmail.com', '$2y$10$X6htOuQyxwIJWdoQg2/XYepOu8EXgZsbMXN80hJlh3R3bUR4hWhL2', 'Marie', 'assets/profil/profil_69406e18a47827.24353595.webp', '2025-12-05 11:28:31');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `discussions`
--
ALTER TABLE `discussions`
  ADD CONSTRAINT `fk_last_message` FOREIGN KEY (`last_message`) REFERENCES `message` (`id`),
  ADD CONSTRAINT `fk_user_1` FOREIGN KEY (`user_1`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user_2` FOREIGN KEY (`user_2`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_sender` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
