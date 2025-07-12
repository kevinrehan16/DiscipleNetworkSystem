/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 5.6.17 : Database - dms
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dms` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dms`;

/*Table structure for table `churches` */

DROP TABLE IF EXISTS `churches`;

CREATE TABLE `churches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `churchid` varchar(30) NOT NULL DEFAULT '',
  `churchname` varchar(100) NOT NULL DEFAULT '',
  `shortname` varchar(10) NOT NULL DEFAULT '',
  `churchlogo` varchar(50) NOT NULL DEFAULT '',
  `dateadded` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `useradded` varchar(30) NOT NULL DEFAULT '',
  `dateupdated` datetime DEFAULT NULL,
  `userupdated` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `churches` */

insert  into `churches`(`id`,`churchid`,`churchname`,`shortname`,`churchlogo`,`dateadded`,`useradded`,`dateupdated`,`userupdated`) values (1,'C-0000001','Greenhills Christian Fellowship South Metro','GCF','','2024-09-18 00:01:31','',NULL,''),(2,'C-0000002','Christ Commission Fellowship','CCF','','2024-09-18 00:44:02','',NULL,''),(3,'C-0000002','Victory christian fellowship','VCF','','2024-09-18 00:50:22','',NULL,''),(4,'C-0000002','Muntinlupa Word Of Truth','MWOT','','2024-09-18 00:51:19','',NULL,''),(5,'C-0000002','Tunasan Word Of Life','TWOH','','2024-09-18 00:52:28','',NULL,''),(6,'C-0000002','Alabang Word Of Hope','AWOL','','2024-09-18 00:57:22','',NULL,''),(7,'C-0000002','Dating Daan Iglesia Ni Cristo','DDC','','2024-09-18 00:59:00','',NULL,''),(8,'C-0000002','Iglesia Ni Cristo Church','INC','','2024-09-18 01:00:40','',NULL,'');

/*Table structure for table `members` */

DROP TABLE IF EXISTS `members`;

CREATE TABLE `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memberid` varchar(20) NOT NULL DEFAULT '',
  `nickname` varchar(30) NOT NULL DEFAULT '',
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `middlename` varchar(50) NOT NULL DEFAULT '',
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(60) NOT NULL DEFAULT '',
  `emailaddress` varchar(60) NOT NULL DEFAULT '',
  `gender` varchar(8) NOT NULL DEFAULT '',
  `birthday` date NOT NULL,
  `age` tinyint(3) NOT NULL,
  `lifestage` varchar(20) NOT NULL DEFAULT '',
  `mobilenumber` varchar(20) NOT NULL DEFAULT '',
  `contactdetails` varchar(100) NOT NULL DEFAULT '',
  `homeaddress` varchar(100) NOT NULL DEFAULT '',
  `country` varchar(30) NOT NULL DEFAULT '',
  `region` varchar(30) NOT NULL DEFAULT '',
  `city` varchar(30) NOT NULL DEFAULT '',
  `barangay` varchar(30) NOT NULL DEFAULT '',
  `occupation` varchar(50) NOT NULL DEFAULT '',
  `industry` varchar(50) NOT NULL DEFAULT '',
  `comment` text NOT NULL,
  `picture` varchar(20) NOT NULL DEFAULT '',
  `prevchurch` varchar(50) NOT NULL DEFAULT '',
  `memberstatus` varchar(20) NOT NULL DEFAULT 'Active',
  `dateadded` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `useradded` varchar(20) NOT NULL DEFAULT '',
  `dateupdated` datetime NOT NULL,
  `userupdated` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `members` */

insert  into `members`(`id`,`memberid`,`nickname`,`lastname`,`firstname`,`middlename`,`username`,`password`,`emailaddress`,`gender`,`birthday`,`age`,`lifestage`,`mobilenumber`,`contactdetails`,`homeaddress`,`country`,`region`,`city`,`barangay`,`occupation`,`industry`,`comment`,`picture`,`prevchurch`,`memberstatus`,`dateadded`,`useradded`,`dateupdated`,`userupdated`) values (1,'M-0000001','Kevs','Macandog','Kevin','Francisco','kevin','kevin','kevin@gmail.com','Male','1995-07-06',29,'Single','','','','','','','','','','','','','Active','2024-09-14 18:56:12','','0000-00-00 00:00:00',''),(2,'M-0000002','Pretty','Cruz','Wisdom','Bacosa','','','wisdom@gmail.com','Female','2004-06-20',20,'Single','(+63) 9127-187-364','C-0000001','Zone 2 Sitio Pagkakaisa','Philippines','Region 4','Makati','San Lorezon','Sales Accountant','Accounting','Transfering in this church','M-0000002.jpg','Christ Commission Fellowship','Active','2024-09-17 14:28:37','','0000-00-00 00:00:00',''),(3,'M-0000003','Vivi','De Guzman','Ivy','Lazo','','','ivy@gmail.com','Female','1997-06-06',23,'Single','(+63) 918 559-6799 ','C-0000002','Zone 2 Sitio Pagkakaisa','Philippines','Region 4','Muntinlupa City','Alabang','Doctor','Health','A new member','M-0000003.jpg','None','Active','2024-09-17 15:28:45','','0000-00-00 00:00:00','');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` varchar(20) NOT NULL DEFAULT '',
  `firstName` varchar(40) NOT NULL DEFAULT '',
  `lastName` varchar(40) NOT NULL DEFAULT '',
  `dateAdded` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `gender` varchar(8) NOT NULL DEFAULT '',
  `schooId` varchar(20) NOT NULL DEFAULT '',
  `rank` varchar(20) NOT NULL DEFAULT '' COMMENT 'It is the position of the user e.g Admin, Student, Teacher',
  `emailAddress` varchar(60) NOT NULL DEFAULT '',
  `password` varchar(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `USERID` (`userId`),
  KEY `FIRSTNAME` (`firstName`),
  KEY `LASTNAME` (`lastName`),
  KEY `DATEADDED` (`dateAdded`),
  KEY `GENDER` (`gender`),
  KEY `SCHOOLID` (`schooId`),
  KEY `RANK` (`rank`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`userId`,`firstName`,`lastName`,`dateAdded`,`gender`,`schooId`,`rank`,`emailAddress`,`password`) values (1,'U-0000001','Xandra Nicole','Estrella','2024-09-14 15:04:12','Female','S-0000001','Student','',''),(2,'U-0000002','Kevin','Macandog','2024-09-14 15:04:24','Male','S-0000002','Teacher','',''),(4,'U-0000003','Andrea','Estrella','2024-09-16 20:44:01','Female','S-0000003','teacher','',''),(5,'U-0000003','Adriane','Estrella','2024-09-16 20:50:06','Female','S-0000003','admin','diane143@gmail.com','$2y$10$l87m1ZLtRB/fe7ILjuLRjOHU22zWI5twx9gyqZgmOkBId03F8mJmS');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
