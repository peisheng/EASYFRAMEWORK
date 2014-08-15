# SQL-Front 5.1  (Build 4.16)

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40101 SET SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;
/*!40103 SET SQL_NOTES='ON' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;


# Host: localhost    Database: datacenterdb
# ------------------------------------------------------
# Server version 5.5.36

DROP DATABASE IF EXISTS `datacenterdb`;
CREATE DATABASE `datacenterdb` /*!40100 DEFAULT CHARACTER SET gbk */;
USE `datacenterdb`;

#
# Source for table tbl_advertisement
#

DROP TABLE IF EXISTS `tbl_advertisement`;
CREATE TABLE `tbl_advertisement` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `adname` varchar(100) NOT NULL DEFAULT '',
  `code` text NOT NULL,
  `width` int(10) NOT NULL DEFAULT '0',
  `height` int(10) NOT NULL DEFAULT '0',
  `adtype` varchar(100) NOT NULL DEFAULT '',
  `begindate` datetime NOT NULL,
  `enddate` datetime NOT NULL,
  `websiteid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Dumping data for table tbl_advertisement
#

LOCK TABLES `tbl_advertisement` WRITE;
/*!40000 ALTER TABLE `tbl_advertisement` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_advertisement` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table tbl_article
#

DROP TABLE IF EXISTS `tbl_article`;
CREATE TABLE `tbl_article` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL DEFAULT '',
  `description` varchar(1000) NOT NULL DEFAULT '',
  `mappingname` varchar(100) NOT NULL DEFAULT '',
  `articlecontent` text NOT NULL,
  `isready` tinyint(1) NOT NULL DEFAULT '1',
  `categoryid` int(10) NOT NULL DEFAULT '0',
  `author` varchar(60) NOT NULL DEFAULT '',
  `publisheddate` datetime NOT NULL,
  `articlesource` varchar(200) NOT NULL DEFAULT '',
  `sourceurl` varchar(500) NOT NULL DEFAULT '',
  `isimagearticle` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Dumping data for table tbl_article
#

LOCK TABLES `tbl_article` WRITE;
/*!40000 ALTER TABLE `tbl_article` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_article` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table tbl_article_website
#

DROP TABLE IF EXISTS `tbl_article_website`;
CREATE TABLE `tbl_article_website` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `articleid` int(10) NOT NULL DEFAULT '0',
  `websiteid` int(10) NOT NULL DEFAULT '0',
  `ispublished` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Dumping data for table tbl_article_website
#

LOCK TABLES `tbl_article_website` WRITE;
/*!40000 ALTER TABLE `tbl_article_website` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_article_website` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table tbl_category
#

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE `tbl_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `catename` varchar(100) NOT NULL DEFAULT '',
  `description` varchar(300) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Dumping data for table tbl_category
#

LOCK TABLES `tbl_category` WRITE;
/*!40000 ALTER TABLE `tbl_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_category` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table tbl_comment
#

DROP TABLE IF EXISTS `tbl_comment`;
CREATE TABLE `tbl_comment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `articleid` int(10) NOT NULL DEFAULT '0',
  `commentcontent` varchar(1000) NOT NULL DEFAULT '',
  `websiteid` int(10) NOT NULL DEFAULT '0',
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Dumping data for table tbl_comment
#

LOCK TABLES `tbl_comment` WRITE;
/*!40000 ALTER TABLE `tbl_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_comment` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table tbl_keyword
#

DROP TABLE IF EXISTS `tbl_keyword`;
CREATE TABLE `tbl_keyword` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(200) NOT NULL DEFAULT '',
  `createdate` datetime NOT NULL,
  `iscatched` tinyint(1) NOT NULL DEFAULT '0',
  `expireddate` datetime NOT NULL,
  `categoryid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Dumping data for table tbl_keyword
#

LOCK TABLES `tbl_keyword` WRITE;
/*!40000 ALTER TABLE `tbl_keyword` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_keyword` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table tbl_spidercontent
#

DROP TABLE IF EXISTS `tbl_spidercontent`;
CREATE TABLE `tbl_spidercontent` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL DEFAULT '',
  `description` varchar(800) NOT NULL DEFAULT '',
  `htmlcontent` text NOT NULL,
  `textcontent` text NOT NULL,
  `sourceurl` varchar(200) NOT NULL DEFAULT '',
  `categoryid` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Dumping data for table tbl_spidercontent
#

LOCK TABLES `tbl_spidercontent` WRITE;
/*!40000 ALTER TABLE `tbl_spidercontent` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_spidercontent` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table tbl_spiderlink
#

DROP TABLE IF EXISTS `tbl_spiderlink`;
CREATE TABLE `tbl_spiderlink` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `linkurl` varchar(200) NOT NULL DEFAULT '',
  `iscatched` tinyint(1) NOT NULL DEFAULT '0',
  `urltype` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Dumping data for table tbl_spiderlink
#

LOCK TABLES `tbl_spiderlink` WRITE;
/*!40000 ALTER TABLE `tbl_spiderlink` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_spiderlink` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table tbl_user
#

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `nickname` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Dumping data for table tbl_user
#

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table tbl_website
#

DROP TABLE IF EXISTS `tbl_website`;
CREATE TABLE `tbl_website` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL DEFAULT '',
  `sitenamecn` varchar(80) NOT NULL DEFAULT '',
  `sitenameen` varchar(80) NOT NULL DEFAULT '',
  `siteurl` varchar(300) NOT NULL DEFAULT '',
  `homepageconfuse` varchar(1000) NOT NULL DEFAULT '',
  `detailsconfuse` varchar(1000) NOT NULL DEFAULT '',
  `lastupdatetime` datetime NOT NULL,
  `createtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Dumping data for table tbl_website
#

LOCK TABLES `tbl_website` WRITE;
/*!40000 ALTER TABLE `tbl_website` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_website` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table tbl_website_category
#

DROP TABLE IF EXISTS `tbl_website_category`;
CREATE TABLE `tbl_website_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `categoryid` int(10) NOT NULL,
  `websiteid` int(10) NOT NULL,
  `mappingname` varchar(100) NOT NULL DEFAULT '',
  `ispublished` tinyint(1) NOT NULL DEFAULT '1',
  `ordernum` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Dumping data for table tbl_website_category
#

LOCK TABLES `tbl_website_category` WRITE;
/*!40000 ALTER TABLE `tbl_website_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_website_category` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table tbl_websitesetting
#

DROP TABLE IF EXISTS `tbl_websitesetting`;
CREATE TABLE `tbl_websitesetting` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `settingkey` varchar(100) NOT NULL DEFAULT '',
  `settingvalue` varchar(300) NOT NULL DEFAULT '',
  `description` varchar(500) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Dumping data for table tbl_websitesetting
#

LOCK TABLES `tbl_websitesetting` WRITE;
/*!40000 ALTER TABLE `tbl_websitesetting` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_websitesetting` ENABLE KEYS */;
UNLOCK TABLES;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
