CREATE TABLE `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `game` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `participants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `email` varchar(255) NOT NULL,
  `age` varchar(32) NOT NULL,
  `occupation` varchar(32) NOT NULL,
  `skills` text NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `time_confirmed` datetime DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
	UNIQUE KEY `email` (`email`),
  KEY `team_id` (`team_id`),
  CONSTRAINT `participants_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `categories` (
  `name` varchar(32) NOT NULL,
  `desc` varchar(64) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(16) NOT NULL,
  `participant_id` int(11) DEFAULT NULL,
  `time_vote` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `votes_ibfk_1` (`participant_id`),
  CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`participant_id`) REFERENCES `participants` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `vote_categories` (
  `vote_id` int(11) NOT NULL,
  `category` varchar(32) NOT NULL,
  `team_id` int(11) NOT NULL,
  PRIMARY KEY (`vote_id`,`category`),
  KEY `category` (`category`),
  KEY `team_id` (`team_id`),
  CONSTRAINT `vote_categories_ibfk_1` FOREIGN KEY (`vote_id`) REFERENCES `votes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `vote_categories_ibfk_2` FOREIGN KEY (`category`) REFERENCES `categories` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `vote_categories_ibfk_3` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert  into `categories`(`name`,`desc`) values ('design','Оформпление'),('gameplay','Геймплей (начин, по който се играе играта)'),('pleasure','Удоволствие от играта'),('storyline','Най-оригинална идея');
