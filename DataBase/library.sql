
/*
INSERT INTO `admin` (`aid`,`name`,`ContactNumber`,`email`) VALUES
(`123`, `PavanTejan`,`97054*****`,`@gmail.com`);

INSERT INTO dummy(`rfid`,`name`) VALUES('123', 'Pavan');
*/

CREATE TABLE IF NOT EXISTS `dummy` (
  `rfid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`rfid`)
);


CREATE TABLE IF NOT EXISTS `admin` (
  `aid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ContactNumber` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`aid`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `ContactNumber` (`ContactNumber`)
);

CREATE TABLE IF NOT EXISTS `books` (
  `rfid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  PRIMARY KEY (`rfid`),
  UNIQUE KEY `name` (`name`)
);

CREATE TABLE IF NOT EXISTS `issue` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `sid` varchar(255) NOT NULL,
  `bid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bid` (`bid`)
);

CREATE TABLE IF NOT EXISTS `request` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `sid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
);

CREATE TABLE IF NOT EXISTS `students` (
  `sid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `sem` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`sid`),  
  UNIQUE KEY `email` (`email`)
);
