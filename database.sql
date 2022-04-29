CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `specialcode` varchar(250) NOT NULL,
  `departement` varchar(250) NOT NULL,
  `medecin` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL, 
  `name` varchar(250) NOT NULL,
  `age` int NOT NULL,
  `date` date NOT NULL,
  `horaire` time NOT NULL,
  `comments` varchar(250) NOT NULL,
  
  PRIMARY KEY (`id`),
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;