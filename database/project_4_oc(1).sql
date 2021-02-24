-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 24 fév. 2021 à 16:55
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `project_4_oc`
--

-- --------------------------------------------------------

--
-- Structure de la table `chapters`
--

DROP TABLE IF EXISTS `chapters`;
CREATE TABLE IF NOT EXISTS `chapters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `date_create` datetime NOT NULL DEFAULT current_timestamp(),
  `date_update` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chapters`
--

INSERT INTO `chapters` (`id`, `title`, `content`, `author`, `date_create`, `date_update`) VALUES
(22, 'Chapitre 2', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dignissim diam eros, vitae finibus libero venenatis at. Curabitur rhoncus ornare ligula quis dignissim. Proin sit amet maximus risus, nec facilisis neque. Pellentesque hendrerit tristique lectus a imperdiet. Pellentesque varius pretium sem a ultricies. Vivamus ornare lorem vitae lorem tempor mattis. In maximus nulla id luctus convallis. Donec consequat orci sed massa laoreet, eu tempor turpis condimentum. Proin blandit vestibulum neque, ut dignissim nunc vulputate vitae. Quisque id nunc risus. In rutrum malesuada dui in ullamcorper. Pellentesque elementum leo vel metus facilisis, in cursus libero scelerisque.</p>\r\n\r\n<p>Fusce imperdiet massa magna, quis gravida sem semper eget. Quisque vitae viverra lectus, id accumsan diam. Quisque eget elit ultricies, scelerisque nisi vel, euismod justo. Etiam elementum magna risus, non consequat erat congue vitae. Nunc placerat sodales lorem et luctus. Nullam luctus molestie nulla, id maximus arcu dignissim in. In eu turpis sed est interdum laoreet. In dapibus dictum purus, nec dapibus felis sollicitudin imperdiet. Praesent id nisl in justo tincidunt finibus. Morbi eget erat quis odio fringilla placerat at molestie ante. Nulla cursus, nibh a aliquet commodo, ipsum dui condimentum neque, sed pulvinar risus nisl vel lectus. Nulla dolor ex, auctor pulvinar nulla eu, tincidunt facilisis est. Pellentesque a felis in metus pellentesque volutpat. Mauris vehicula viverra diam id placerat. Etiam efficitur mauris in justo pharetra ultricies.</p>\r\n', 'Jean Forteroche', '2021-02-24 00:10:37', '2021-02-24 00:10:37'),
(23, 'Chapitre 3', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dignissim diam eros, vitae finibus libero venenatis at. Curabitur rhoncus ornare ligula quis dignissim. Proin sit amet maximus risus, nec facilisis neque. Pellentesque hendrerit tristique lectus a imperdiet. Pellentesque varius pretium sem a ultricies. Vivamus ornare lorem vitae lorem tempor mattis. In maximus nulla id luctus convallis. Donec consequat orci sed massa laoreet, eu tempor turpis condimentum. Proin blandit vestibulum neque, ut dignissim nunc vulputate vitae. Quisque id nunc risus. In rutrum malesuada dui in ullamcorper. Pellentesque elementum leo vel metus facilisis, in cursus libero scelerisque.</p>\r\n\r\n<p>Fusce imperdiet massa magna, quis gravida sem semper eget. Quisque vitae viverra lectus, id accumsan diam. Quisque eget elit ultricies, scelerisque nisi vel, euismod justo. Etiam elementum magna risus, non consequat erat congue vitae. Nunc placerat sodales lorem et luctus. Nullam luctus molestie nulla, id maximus arcu dignissim in. In eu turpis sed est interdum laoreet. In dapibus dictum purus, nec dapibus felis sollicitudin imperdiet. Praesent id nisl in justo tincidunt finibus. Morbi eget erat quis odio fringilla placerat at molestie ante. Nulla cursus, nibh a aliquet commodo, ipsum dui condimentum neque, sed pulvinar risus nisl vel lectus. Nulla dolor ex, auctor pulvinar nulla eu, tincidunt facilisis est. Pellentesque a felis in metus pellentesque volutpat. Mauris vehicula viverra diam id placerat. Etiam efficitur mauris in justo pharetra ultricies.</p>\r\n', 'Jean Forteroche', '2021-02-24 00:11:02', '2021-02-24 00:11:02'),
(17, 'Chapitre 1', '<p><s>Lorem ipsum</s> dolor sit amet, consectetur adipiscing elit. Nullam a arcu est. Fusce dui sapien, porta nec scelerisque ac, suscipit quis nunc. Vivamus ornare laoreet elit, a scelerisque enim blandit sit amet. Vivamus eros odio, consectetur quis justo nec, elementum dapibus risus. Aenean faucibus lobortis eros convallis interdum. Aliquam at sollicitudin orci. Proin dolor libero, scelerisque quis pellentesque quis, venenatis at arcu. Integer quis nisi mauris. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur faucibus tortor ac enim consequat, ornare viverra quam rutrum. Sed pellentesque sed leo nec varius. In hac habitasse platea dictumst. Nam vel turpis in velit vehicula euismod.</p>\r\n\r\n<p>Vivamus auctor quis nunc non tempor. Mauris massa orci, porta laoreet massa eget, egestas finibus massa. Proin ac hendrerit mi, non congue elit. Nullam mi dui, sagittis et odio at, tincidunt commodo felis. Curabitur viverra, mi quis dictum varius, tellus lectus venenatis nibh, sed lobortis sem metus non ante. Mauris congue enim dui, eget pulvinar felis hendrerit ut. Nullam lobortis urna vel vehicula venenatis. Ut ut blandit elit. Praesent id auctor metus. Nullam nec lectus placerat, ornare nunc a, efficitur ligula.</p>\r\n', 'Jean Forteroche', '2021-02-18 01:09:29', '2021-02-19 17:55:30');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `date_comment` datetime NOT NULL DEFAULT current_timestamp(),
  `comment` text NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `signal_comment` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `first_name`, `last_name`, `date_comment`, `comment`, `chapter_id`, `signal_comment`) VALUES
(73, 'Florent', 'THOMAS', '2021-02-19 18:08:50', 'Bonjour', 17, 0),
(79, 'Florent', 'THOMAS', '2021-02-24 00:20:52', '<h1>Bonjour</h1>', 23, 1),
(75, 'Florent', 'THOMAS', '2021-02-23 23:44:18', 'commentaire pour le premier chapitre', 17, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password_user`) VALUES
(1, 'Jean ', 'Forteroche', 'jean-forteroche@mail.fr', '$2y$10$2tSNZZxSWfulppW0BBV85.c58hG/UcryLZ02vZ0Ddf9O0k2ufWp3K');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
