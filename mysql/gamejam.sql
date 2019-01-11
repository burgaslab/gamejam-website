CREATE TABLE `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `game` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `participants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(255) NOT NULL,
  `age` varchar(32) NOT NULL,
  `occupation` varchar(32) NOT NULL,
  `skills` text NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `time_confirmed` datetime DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`,`year`),
  KEY `team_id` (`team_id`),
  CONSTRAINT `participants_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `desc` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `year` (`year`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `code` varchar(16) NOT NULL,
  `participant_id` int(11) DEFAULT NULL,
  `time_vote` datetime DEFAULT NULL,
  `is_reserved` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`,`year`),
  UNIQUE KEY `codes_ibfk_1` (`participant_id`),
  CONSTRAINT `codes_ibfk_1` FOREIGN KEY (`participant_id`) REFERENCES `participants` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `votes` (
  `code_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  PRIMARY KEY (`code_id`,`category_id`),
  KEY `votes_ibfk_2` (`category_id`),
  KEY `votes_ibfk_1` (`team_id`),
  CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`code_id`) REFERENCES `codes` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `votes_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `votes_ibfk_3` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


insert  into `categories`(`year`, `name`,`desc`) values (2016, 'design','Оформпление'),(2016, 'gameplay','Геймплей (начин, по който се играе играта)'),(2016, 'pleasure','Удоволствие от играта'),(2016, 'storyline','Най-оригинална идея');
insert  into `categories`(`year`, `name`,`desc`) values (2017, 'design','Аудио и визуално оформление'),(2017, 'gameplay','Геймплей и сюжет'),(2017, 'originality','Оригиналност');


CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `desc` varchar(64) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO settings (`id`, `name`, `desc`, `value`)
VALUES (1, 'registration', 'Отворена регистрация', 'true'),(2, 'vote', 'Отворено гласуване', 'false'),(3, 'standing', 'Класиране', 'true');
INSERT INTO settings VALUES (4, 'live-stream', 'Лайв стрийм код', '');
INSERT INTO `settings` (`id`, `name`, `desc`, `value`) VALUES ('5', 'embed', 'Embed', ''); 

CREATE TABLE `pages` (
  `name` varchar(32) NOT NULL,
  `year` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`name`,`year`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO pages (`name`, `year`, `title`) VALUES ('home', 2019, 'Начало');
INSERT INTO pages (`name`, `year`, `title`) VALUES ('about', 2019, 'Какво е Game Jam?');
INSERT INTO pages (`name`, `year`, `title`) VALUES ('rules', 2019, 'Правила');
INSERT INTO pages (`name`, `year`, `title`) VALUES ('programme', 2019, 'Програма');
INSERT INTO pages (`name`, `year`, `title`) VALUES ('jammers', 2019, 'За Jammer-и');
INSERT INTO pages (`name`, `year`, `title`) VALUES ('support', 2019, 'Подкрепи');
INSERT INTO pages (`name`, `year`, `title`) VALUES ('press', 2019, 'Press Release');

