#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: student
#------------------------------------------------------------
--
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` text NOT NULL,
  `name` text NOT NULL,
  `emailAddress` text NOT NULL,
  `phoneNumber` varchar(11) NOT NULL,
  `year` text NOT NULL,
  `specialization` text NOT NULL,
  `year_id` int(11) NOT NULL,
  `specialization_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4

#------------------------------------------------------------
# Table: specialization
#------------------------------------------------------------

CREATE TABLE `specialization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4

#------------------------------------------------------------
# Table: year
#------------------------------------------------------------

CREATE TABLE `year` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4