# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.5.38)
# Database: kingsmen
# Generation Time: 2017-09-03 03:52:16 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table depth
# ------------------------------------------------------------

DROP TABLE IF EXISTS `depth`;

CREATE TABLE `depth` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (`id`),
  `date` date DEFAULT NULL,
  `isin` varchar(12) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `side` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `volume` int(11) DEFAULT NULL,
  `all_or_nothing` int(11) DEFAULT NULL,
  `flags` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table marketdata
# ------------------------------------------------------------

DROP TABLE IF EXISTS `marketdata`;

CREATE TABLE `marketdata` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (`id`),
  `isin` varchar(12) NOT NULL,
  `name` varchar(128) NOT NULL DEFAULT '',
  `date` date NOT NULL,
  `price` float NOT NULL,
  `volume` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
