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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `churches` */

insert  into `churches`(`id`,`churchid`,`churchname`,`shortname`,`churchlogo`,`dateadded`,`useradded`,`dateupdated`,`userupdated`) values (1,'CCF-CHURCH-0000001','Greenhills Christian Fellowship','GCF','','2024-09-18 12:19:01','',NULL,''),(2,'CCF-CHURCH-0000002','Christ Commission Fellowship','CCF','','2024-09-18 12:19:34','',NULL,''),(6,'CCF-CHURCH-0000003','Victory Christian Fellowship','VCF','','2024-09-18 13:34:01','',NULL,'');

/*Table structure for table `clustermembers` */

DROP TABLE IF EXISTS `clustermembers`;

CREATE TABLE `clustermembers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clusterMID` varchar(30) DEFAULT '',
  `clusterID` varchar(30) DEFAULT '',
  `memberID` varchar(30) DEFAULT '',
  `clusterMType` varchar(15) DEFAULT '' COMMENT 'Assistant, Member = Empty',
  `dateadded` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `useradded` varchar(30) DEFAULT '',
  `dateupdated` datetime DEFAULT NULL,
  `userupdated` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `clustermembers` */

insert  into `clustermembers`(`id`,`clusterMID`,`clusterID`,`memberID`,`clusterMType`,`dateadded`,`useradded`,`dateupdated`,`userupdated`) values (1,'CM-0000001','CLUSTER-0000001','CCF-M-0000002','Assistant','2024-09-26 10:44:04','',NULL,''),(2,'CM-0000002','CLUSTER-0000001','CCF-M-0000003','','2024-09-26 10:44:06','',NULL,'');

/*Table structure for table `clusters` */

DROP TABLE IF EXISTS `clusters`;

CREATE TABLE `clusters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clusterid` varchar(30) NOT NULL DEFAULT '',
  `clustername` varchar(60) NOT NULL DEFAULT '',
  `clusterleaderid` varchar(30) NOT NULL DEFAULT '',
  `churchid` varchar(30) NOT NULL DEFAULT '',
  `satelliteid` varchar(300) NOT NULL DEFAULT '',
  `dateadded` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `useradded` varchar(30) NOT NULL DEFAULT '',
  `dateupdated` datetime DEFAULT NULL,
  `userupdated` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `clusters` */

insert  into `clusters`(`id`,`clusterid`,`clustername`,`clusterleaderid`,`churchid`,`satelliteid`,`dateadded`,`useradded`,`dateupdated`,`userupdated`) values (1,'CLUSTER-0000001','Muntinlupa Cluster','CCF-M-0000001','CCF-CHURCH-0000001','SATELLITE-00000001','2024-09-24 10:15:43','',NULL,''),(2,'CLUSTER-0000002','Laguna Cluster','CCF-M-0000002','CCF-CHURCH-0000001','SATELLITE-00000001','2024-09-24 10:15:43','',NULL,'');

/*Table structure for table `ggmembers` */

DROP TABLE IF EXISTS `ggmembers`;

CREATE TABLE `ggmembers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ggMid` varchar(30) NOT NULL DEFAULT '',
  `growthgroupid` varchar(30) NOT NULL DEFAULT '',
  `ggmemberid` varchar(30) NOT NULL DEFAULT '',
  `ggMtype` varchar(15) NOT NULL DEFAULT '' COMMENT 'Leader, Assistant',
  `dateadded` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `useradded` varchar(30) NOT NULL DEFAULT '',
  `dateupdated` datetime DEFAULT NULL,
  `userupdated` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `ggmembers` */

insert  into `ggmembers`(`id`,`ggMid`,`growthgroupid`,`ggmemberid`,`ggMtype`,`dateadded`,`useradded`,`dateupdated`,`userupdated`) values (1,'GG-0000001','GG-0000001','CCF-M-0000004','','2024-11-04 15:21:55','',NULL,'');

/*Table structure for table `growthgroups` */

DROP TABLE IF EXISTS `growthgroups`;

CREATE TABLE `growthgroups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `growthgroupid` varchar(30) NOT NULL DEFAULT '',
  `growthgroupname` varchar(60) NOT NULL DEFAULT '',
  `growthgroupshortname` varchar(6) NOT NULL DEFAULT '',
  `growthgroupleaderid` varchar(30) NOT NULL DEFAULT '',
  `churchid` varchar(30) NOT NULL DEFAULT '',
  `satelliteid` varchar(300) NOT NULL DEFAULT '',
  `schedtype` varchar(20) DEFAULT '' COMMENT 'Every, Every Other, Once a Month',
  `dayschedule` varchar(10) DEFAULT '',
  `timeschedule` varchar(10) NOT NULL DEFAULT '',
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `useradded` varchar(30) NOT NULL DEFAULT '',
  `dateupdated` datetime DEFAULT NULL,
  `userupdated` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `growthgroups` */

insert  into `growthgroups`(`id`,`growthgroupid`,`growthgroupname`,`growthgroupshortname`,`growthgroupleaderid`,`churchid`,`satelliteid`,`schedtype`,`dayschedule`,`timeschedule`,`dateadded`,`useradded`,`dateupdated`,`userupdated`) values (1,'GG-0000001','God First','GFGG','CCF-M-0000001','CHURCH-00000001','SATELLITE-00000001','','Tuesday','06:30 PM','2024-09-24 10:15:43','',NULL,''),(2,'GG-0000002','No Girlfriend Since Birth','NGSB','CCF-M-0000002','CHURCH-00000001','SATELLITE-00000001','','Friday','08:00 PM','2024-09-24 10:15:43','',NULL,'');

/*Table structure for table `idrecords` */

DROP TABLE IF EXISTS `idrecords`;

CREATE TABLE `idrecords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tablename` varchar(20) NOT NULL DEFAULT '',
  `tablefield` varchar(15) NOT NULL DEFAULT '',
  `tableid` varchar(30) NOT NULL DEFAULT '',
  `dateadded` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `idrecords` */

insert  into `idrecords`(`id`,`tablename`,`tablefield`,`tableid`,`dateadded`) values (1,'members','memberid','CCF-M-0000003','2024-09-18 10:14:11'),(2,'churches','churchid','CCF-CHURCH-0000003','2024-09-18 12:19:01'),(5,'satellites','satellitesid','CCF-SATELLITE-0000002','2024-09-18 13:34:01'),(6,'pastors','pastorid','GCF-PASTOR-0000002','2024-09-20 10:55:35');

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
  `satelliteid` varchar(30) NOT NULL DEFAULT '',
  `memberposition` varchar(30) NOT NULL DEFAULT '' COMMENT 'Pastors, Elders, Deacon',
  `memberstatus` varchar(20) NOT NULL DEFAULT 'Active',
  `dateadded` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `useradded` varchar(20) NOT NULL DEFAULT '',
  `dateupdated` datetime NOT NULL,
  `userupdated` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `members` */

insert  into `members`(`id`,`memberid`,`nickname`,`lastname`,`firstname`,`middlename`,`username`,`password`,`emailaddress`,`gender`,`birthday`,`age`,`lifestage`,`mobilenumber`,`contactdetails`,`homeaddress`,`country`,`region`,`city`,`barangay`,`occupation`,`industry`,`comment`,`picture`,`prevchurch`,`satelliteid`,`memberposition`,`memberstatus`,`dateadded`,`useradded`,`dateupdated`,`userupdated`) values (1,'CCF-M-0000001','Kevs','Macandog','Kevin','Francisco','kevin','kevin','kevin@gmail.com','Male','1995-07-06',29,'Single','','','','','','','','','','','','','','Pastor','Active','2023-09-19 18:56:12','','0000-00-00 00:00:00',''),(2,'CCF-M-0000002','Pretty','Cruz','Wisdom','Bacosa','','','wisdom@gmail.com','Female','2004-06-20',20,'Single','(+63) 9127-187-364','C-0000001','Zone 2 Sitio Pagkakaisa','Philippines','Region 4','Makati','San Lorezon','Sales Accountant','Accounting','Transfering in this church','M-0000002.jpg','Christ Commission Fellowship','','','Active','2024-09-17 14:28:37','','0000-00-00 00:00:00',''),(3,'CCF-M-0000003','Vivi','De Guzman','Ivy','Lazo','','','ivy@gmail.com','Female','1997-06-06',23,'Single','(+63) 918 559-6799 ','C-0000002','Zone 2 Sitio Pagkakaisa','Philippines','Region 4','Muntinlupa City','Alabang','Doctor','Health','A new member','M-0000003.jpg','None','','','Active','2024-09-17 15:28:45','','0000-00-00 00:00:00',''),(4,'CCF-M-0000004','Jeff','Dominguez','Jefferson','Prof','','','jeff@gmail.com','Male','1997-06-06',34,'Single','(+63) 918 559-6799 ','C-0000002','Zone 2 Sitio Pagkakaisa','Philippines','Region 4','Muntinlupa City','Alabang','Doctor','Health','A new member','M-0000003.jpg','None','','','Active','2024-09-17 15:28:45','','0000-00-00 00:00:00','');

/*Table structure for table `pastors` */

DROP TABLE IF EXISTS `pastors`;

CREATE TABLE `pastors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pastorid` varchar(30) NOT NULL DEFAULT '',
  `pastorlevel` varchar(50) NOT NULL DEFAULT '',
  `memberid` varchar(30) NOT NULL DEFAULT '',
  `churchid` varchar(30) NOT NULL DEFAULT '',
  `satellitesid` varchar(30) NOT NULL DEFAULT '',
  `dateadded` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `useradded` varchar(30) NOT NULL DEFAULT '',
  `dateupdated` datetime DEFAULT NULL,
  `userupdated` varchar(30) NOT NULL DEFAULT '',
  `pastorstatus` varchar(10) NOT NULL DEFAULT 'Active' COMMENT 'Active, Inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `pastors` */

insert  into `pastors`(`id`,`pastorid`,`pastorlevel`,`memberid`,`churchid`,`satellitesid`,`dateadded`,`useradded`,`dateupdated`,`userupdated`,`pastorstatus`) values (1,'GCF-PASTOR-0000001','Pastor','CCF-M-0000001','CCF-CHURCH-0000001','CCF-SATELLITE-0000001','2024-09-20 10:55:35','',NULL,'','Active'),(7,'GCF-PASTOR-0000002','Assistant Pastor','CCF-M-0000002','CCF-CHURCH-0000001','CCF-SATELLITE-0000001','2024-09-20 11:52:11','',NULL,'','Active');

/*Table structure for table `satellites` */

DROP TABLE IF EXISTS `satellites`;

CREATE TABLE `satellites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `churchid` varchar(30) NOT NULL DEFAULT '',
  `satellitesid` varchar(30) NOT NULL DEFAULT '',
  `satellitesname` varchar(60) NOT NULL DEFAULT '',
  `worshipday` varchar(12) NOT NULL DEFAULT '',
  `worshiptime` varchar(12) NOT NULL DEFAULT '',
  `areapastorid` varchar(30) NOT NULL DEFAULT '',
  `areapastor` varchar(60) NOT NULL DEFAULT '',
  `satellitelocation` varchar(100) DEFAULT '',
  `registeredsince` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `dateadded` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `useradded` varchar(60) NOT NULL DEFAULT '',
  `dateupdated` datetime DEFAULT NULL,
  `userupdated` varchar(60) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `satellites` */

insert  into `satellites`(`id`,`churchid`,`satellitesid`,`satellitesname`,`worshipday`,`worshiptime`,`areapastorid`,`areapastor`,`satellitelocation`,`registeredsince`,`dateadded`,`useradded`,`dateupdated`,`userupdated`) values (1,'CCF-CHURCH-0000001','CCF-SATELLITE-0000001','GCF Alabang','Sunday','09:00 am','','Pastor Ekek','Hahaha','2024-09-18 13:34:01','2024-09-18 13:34:01','',NULL,''),(2,'CCF-CHURCH-0000003','CCF-SATELLITE-0000002','VCF Makati','Sunday','10:00 pm','','Pastor Okok','Hehehe','2024-09-18 13:34:01','2024-09-18 13:34:01','',NULL,'');

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

insert  into `users`(`id`,`userId`,`firstName`,`lastName`,`dateAdded`,`gender`,`schooId`,`rank`,`emailAddress`,`password`) values (1,'U-0000001','Xandra Nicole','Estrella','2024-09-14 15:04:12','Female','S-0000001','Student','',''),(2,'U-0000002','Kevin','Macandog','2024-09-14 15:04:24','Male','S-0000002','Teacher','',''),(4,'U-0000003','Andrea','Estrella','2024-09-16 20:44:01','Female','S-0000003','teacher','',''),(5,'U-0000003','Adriane','Estrella','2024-09-16 20:50:06','Female','S-0000003','admin','diane143@gmail.com','$2y$10$cKC1z8FXSGKmSvCyUXTuUO6P7Z3osvQQDPjnrzL7rlMSFiBrhkW/a');

/*Table structure for table `growthgroupmembers_information` */

DROP TABLE IF EXISTS `growthgroupmembers_information`;

/*!50001 DROP VIEW IF EXISTS `growthgroupmembers_information` */;
/*!50001 DROP TABLE IF EXISTS `growthgroupmembers_information` */;

/*!50001 CREATE TABLE  `growthgroupmembers_information`(
 `growthgroupid` varchar(30) ,
 `growthgroupname` varchar(60) ,
 `growthgroupshortname` varchar(6) ,
 `leaderName` varchar(101) ,
 `churchid` varchar(30) ,
 `satelliteid` varchar(300) ,
 `schedtype` varchar(20) ,
 `dayschedule` varchar(10) ,
 `timeschedule` varchar(10) 
)*/;

/*Table structure for table `pastors_information` */

DROP TABLE IF EXISTS `pastors_information`;

/*!50001 DROP VIEW IF EXISTS `pastors_information` */;
/*!50001 DROP TABLE IF EXISTS `pastors_information` */;

/*!50001 CREATE TABLE  `pastors_information`(
 `pastorid` varchar(30) ,
 `pastorlevel` varchar(50) ,
 `memberid` varchar(30) ,
 `fullname` varchar(101) ,
 `nickname` varchar(30) ,
 `gender` varchar(8) ,
 `lifestage` varchar(20) ,
 `birthday` date ,
 `emailaddress` varchar(60) ,
 `churchname` varchar(100) ,
 `satellitesname` varchar(60) 
)*/;

/*View structure for view growthgroupmembers_information */

/*!50001 DROP TABLE IF EXISTS `growthgroupmembers_information` */;
/*!50001 DROP VIEW IF EXISTS `growthgroupmembers_information` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`::1` SQL SECURITY DEFINER VIEW `growthgroupmembers_information` AS (select `gg`.`growthgroupid` AS `growthgroupid`,`gg`.`growthgroupname` AS `growthgroupname`,`gg`.`growthgroupshortname` AS `growthgroupshortname`,concat(`mem`.`firstname`,' ',`mem`.`lastname`) AS `leaderName`,`gg`.`churchid` AS `churchid`,`gg`.`satelliteid` AS `satelliteid`,`gg`.`schedtype` AS `schedtype`,`gg`.`dayschedule` AS `dayschedule`,`gg`.`timeschedule` AS `timeschedule` from (`growthgroups` `gg` left join `members` `mem` on((`gg`.`growthgroupleaderid` = `mem`.`memberid`)))) */;

/*View structure for view pastors_information */

/*!50001 DROP TABLE IF EXISTS `pastors_information` */;
/*!50001 DROP VIEW IF EXISTS `pastors_information` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`::1` SQL SECURITY DEFINER VIEW `pastors_information` AS (select `p`.`pastorid` AS `pastorid`,`p`.`pastorlevel` AS `pastorlevel`,`p`.`memberid` AS `memberid`,concat(`m`.`firstname`,' ',`m`.`lastname`) AS `fullname`,`m`.`nickname` AS `nickname`,`m`.`gender` AS `gender`,`m`.`lifestage` AS `lifestage`,`m`.`birthday` AS `birthday`,`m`.`emailaddress` AS `emailaddress`,`c`.`churchname` AS `churchname`,`s`.`satellitesname` AS `satellitesname` from (((`pastors` `p` left join `members` `m` on((`p`.`memberid` = `m`.`memberid`))) left join `churches` `c` on((`p`.`churchid` = `c`.`churchid`))) left join `satellites` `s` on((`p`.`satellitesid` = `s`.`satellitesid`)))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
