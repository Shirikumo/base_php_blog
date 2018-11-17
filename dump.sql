-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `base_php_blog`;
CREATE DATABASE `base_php_blog` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `base_php_blog`;

DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `author` (`author`),
  CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`author`) REFERENCES `users` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO `articles` (`id`, `title`, `content`, `image`, `author`) VALUES
(1,	'Un premier article',	'Hey man, espÃ¨ce de gros fils de pute avec un tout petit pÃ©nis mou. Le ministÃ¨re de la SantÃ© va faire Ã©crire sur les paquets de cigarettes que t\'es rien qu\' un baril de poulet Kentucky tellement Ã©norme qu\'en sortant dehors, il y a une Ã©clipse! J\'en pisse dans mes shorts Ã  l\'idÃ©e de t\'installer sans anesthÃ©sie des implants mamaires remplis de Jello Ã  la cerise Ã  un Jamboree de scouts en manque de Jeanettes pour ensuite foutre les photos sur Internet.  Va jouer le rÃ´le du tampon hygiÃ©nique dans un club de lutteuses sumo amateures!',	'images/5bf09669912d4.jpg',	'usertest'),
(2,	'Un deuxieme article',	'Hey ordure, espÃ¨ce de fond de capote recyclÃ© pervers. La derniÃ¨re manifestation au centre-ville Ã©tait pour protester que t\'es une ostie de police qui sent la marde! Mes Kotex se beurrent plus rapidement Ã  l\'idÃ©e de te faire avaler ton extrait de naissance par la narine gauche en la lubrifiant avec de la morve de vidangeur devant la garderie de tes enfants juste pour le fun cÃ¢lisse.  J\'aimerais mieux mourir pendu par des crochets plantÃ©s dans la chaire Ã  recevoir de la diarrhÃ©e d\'un rhinocÃ©ros dans la face plutÃ´t que d\'aller Ã  la cabane Ã  sucre avec toi!',	'images/5bf09692356c0.jpg',	'usertest'),
(3,	'Un autre article',	'Hey mon chum, espÃ¨ce de tabarnak de mongole avec des acariens comme seuls amis. D\'aprÃ¨s 300 QuÃ©bÃ©cois et QuÃ©bÃ©coises, t\'es juste un spermatozoÃ¯de de lesbienne avec une dÃ©marche de Slinky! Mes Kotex se beurrent plus rapidement Ã  l\'idÃ©e de te voir surprendre par Marcel Beliveau en train de te masser l\'anus avec un stylo Bic quatres-couleurs dans un film de cinÃ©ma I-MAX en version Scratch-N-Sniff pour faire vomir mon beau-frÃ¨re qui est coroner.  Va donc faire la chÃ¨vre dans une initiation des Chevaliers de Colomb!',	'images/5bf096cd22ce6.jpg',	'coucou'),
(4,	'J\'aime le quebec ! (edited)',	'Hey ordure, espÃ¨ce de vieux mononcle nÃ©crophile. La derniÃ¨re manifestation au centre-ville Ã©tait pour protester que t\'es une vieille paire de bobettes qui aime se ... HÃ©Ã©Ã©hooo! Mais qu\'est-ce que tu fais avec ton Thermos au cul? C\'est pas un suppositoire Ã§a, ostie d\'imbÃ©cile! Je crÃ¨ve d\'envie de voir ta poche se coincer dans une strap d\'alternateur de Corvette 82 dans un show de sodomie avec ta femme ostie d\'crisse de tabarnak!.  Ta bite est tellement petite que mÃªme tes morpions ne sentent absolument rien! (edited)',	'images/5bf096eaa3030.jpg',	'coucou'),
(5,	'Je continue d\'Ã©crire..',	'Cher prÃ©sident intergalactique des plus caves de l\'Univers, espÃ¨ce de vieux mononcle avec le quotient intellectuel d\'une fougÃ¨re. Ta mÃ¨re Ã  honte Ã  s\'en tirer une balle dans tÃªte que tu sois un ostie de tÃ©moin de JÃ©hovah qui a les dents tellement avancÃ©es que c\'est Ã©vident que ta mÃ¨re s\'est fait fourrer par un cheval! J\'en pisse dans mes shorts Ã  l\'idÃ©e de te labourer le scrotum avec mon Garden Claw en premiÃ¨re partie d\'un spectacle de Michel Louvain pour rire de toÃ© en ostie.  Va te faire ramoner le muffler chez Canadian Tire!',	'images/5bf097148c61a.jpg',	'usertest'),
(6,	'BASE_PHP',	'Yo Bitch, espÃ¨ce de vieux mononcle castrÃ©. Ta tronche de pÃ©dale me fait penser Ã  une mouche Ã  pourriture qui met des cotons ouatÃ©s avec des loups dessus! Je mouille en pensant Ã  te crisser mon poing dans face devant ta petite soeur Ã  un show des Backstreet Boys espÃ¨ce de face de rectum de moufette.  Tu pus tellement de la yeule que la tapisserie dÃ©colle quand tu parles!',	'images/5bf0974fd7e28.jpg',	'base_php'),
(7,	'BASE_PHP (suite...)',	'Hey tÃªte de pissette, espÃ¨ce de grosse matante dont l\'arbre gÃ©nÃ©alogique est en forme de cercle. Le front page du journal de MontrÃ©al vient de rÃ©vÃ©ler Ã  tout le monde que t\'es un colisse de pÃ©teux de broue carencÃ© tellement rÃ©pugnant que mÃªme l\'herpÃ¨s Ã  peur de t\'attraper! Mon plus grand dÃ©sir est de te pisser Ã  la raie au village gay pour faire vomir mon beau-frÃ¨re qui est coroner.  DÃ©cÃ¢lisse, ostie de gros mongole! T\'es tellement gros que tu courbes l\'espace temps!',	'images/5bf0976acab92.jpg',	'base_php'),
(8,	'ce que c\'est bon la poutine',	'Hey le pouilleux, espÃ¨ce de fond de capote recyclÃ© avec une haleine de bizoune. Les pancartes dans le mÃ©tro pis dans les abris d\'autobus affichent partout que t\'es de la sÃ©crÃ©tion de morpion qui pue tellement que quand on te regarde, nos lunettes fondent! Mon pÃ©nis se gorge de sang Ã  la vision de te pÃ©ter dessus en pages centrales du Photo-Police pendant que ta mÃ¨re me suce... en fin d\'compte... pendant que j\'la fourre dans tÃªte.  Va poser ton cul sur la tour du CN en remplacant la K-Y par d\'la Krazy Glu!',	'images/5bf097ac7ff37.jpg',	'base_php');

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `article` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `article` (`article`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`article`) REFERENCES `articles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `comments` (`id`, `username`, `content`, `article`) VALUES
(1,	'coucou',	'First !',	1),
(2,	'coucou',	'c\'est moche test commentaire',	5),
(3,	'usertest',	'Deuz\'',	1);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1,	'usertest',	'$2y$12$g6lLwjhDo9ul76C./dIjDOcQRSFWabJxlPNxuQEWa7yNl16aQuUZm'),
(2,	'coucou',	'$2y$12$3SFCeabhZBHU8kCXSXUuLe8zdLWN9nuIf5VlIEppmdzunUOihF7b.'),
(3,	'base_php',	'$2y$12$pfBoxRgg2sunAPNY8TyTQ.ywMwa4J5OfJjI4xcRi/2GFfu98icuku');

-- 2018-11-17 22:38:34
