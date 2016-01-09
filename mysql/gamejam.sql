CREATE TABLE `participants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `email` varchar(255) NOT NULL,
  `age` varchar(32) NOT NULL,
  `occupation` varchar(32) NOT NULL,
  `skills` text NOT NULL,
  `date_confirmed` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
