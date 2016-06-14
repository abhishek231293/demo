/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.8-MariaDB : Database - demo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`demo` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `demo`;

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`migration`,`batch`) values ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_05_13_122225_task',1),('2016_06_14_022029_userOtherDetails',2),('2016_06_14_022949_projects',3);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `password_resets` */

insert  into `password_resets`(`email`,`token`,`created_at`) values ('abhishekgupta00143@gmail.com','f528dfd750f656ff1a5044a6795ac2a585cc0ab2f5ea5de7d1e441a7a517a28e','2016-06-14 23:48:12');

/*Table structure for table `project` */

DROP TABLE IF EXISTS `project`;

CREATE TABLE `project` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `project` */

insert  into `project`(`id`,`project_name`,`is_active`) values (1,'Bank Admin',1),(2,'E-challan',1),(3,'MIS',1),(4,'Cloud9',1),(5,'Mada Printing',1),(6,'Laravel',1);

/*Table structure for table `tasks` */

DROP TABLE IF EXISTS `tasks`;

CREATE TABLE `tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tasks` */

insert  into `tasks`(`id`,`name`,`role`,`contact`,`is_active`,`created_at`,`updated_at`) values (9,'Zeshan kumar','Tester','5498456148',1,'2016-06-11 19:07:46','2016-06-14 01:42:45'),(10,'Ashish','tester','84856148',0,'2016-06-12 00:38:45','2016-06-13 18:54:44'),(11,'Abhishek','Developer','641615468',1,'2016-06-12 00:39:08','2016-06-12 00:39:11');

/*Table structure for table `user_other_detail` */

DROP TABLE IF EXISTS `user_other_detail`;

CREATE TABLE `user_other_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `profile_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `skype_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `employee_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `team_lead` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hod` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `about` longtext COLLATE utf8_unicode_ci,
  `facebook_link` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `github_link` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blog_link` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user_other_detail` */

insert  into `user_other_detail`(`id`,`user_id`,`profile_image`,`designation`,`skype_id`,`address`,`phone_number`,`employee_id`,`team_lead`,`hod`,`is_active`,`created_at`,`updated_at`,`about`,`facebook_link`,`github_link`,`blog_link`) values (1,2,'abhishekgupta_2.jpg','Software Engineer','abhishek.gupta231293','B-1319, New Ashok Nagar, Delhi','9015272556','SS/SD/5132','Alok Kumar Modi','Praveen Prasad',1,'2016-06-14 02:28:33','2016-06-14 02:28:36','Donec iaculis a nibh in egestas. Praesent interdum ipsum id tellus ullamcorper tristique. Nam auctor diam massa. Ut diam dui, pretium ac purus vitae, egestas sollicitudin velit. Quisque faucibus metus mattis nunc placerat, in malesuada erat pellentesque. Phasellus molestie elit id egestas aliquam. Donec tincidunt nunc ac congue mattis. Donec non odio nec justo varius ullamcorper.\r\n\r\nVivamus leo dolor, mattis sit amet nisi sed, dictum semper urna. Vivamus ultricies velit ut lacus aliquam, sed scelerisque orci placerat. Duis eget ultrices nulla. Maecenas diam est, aliquet non dictum et, tempor et sem. Fusce tristique varius nisl at venenatis. Suspendisse id sapien non nisl eleifend lacinia quis nec mauris. Fusce eget mauris eu tellus cursus imperdiet quis et metus. Proin non commodo velit. In eget justo vestibulum, scelerisque justo sit amet, iaculis tortor. Suspendisse ut orci mi. Suspendisse suscipit pharetra orci nec dapibus. Integer laoreet libero ut sem ullamcorper tincidunt. Vestibulum quis tincidunt odio. Phasellus tortor nulla, fringilla non turpis pharetra, mollis scelerisque justo. Donec fermentum mauris mauris, ut adipiscing urna ornare eget.\r\n\r\nCurabitur varius pulvinar massa, eget ultricies urna ultricies sed. Vestibulum consequat dictum dui quis gravida. Sed porta sem nec orci aliquam, ac fermentum eros malesuada. Etiam tristique sagittis odio vitae semper. Nulla auctor magna nisl, eget fringilla nunc scelerisque et. Vivamus dictum dui diam, vitae pretium dolor facilisis ornare. Maecenas cursus nisl pretium auctor elementum.','https://www.facebook.com/abhishekgupta00143','https://github.com/abhishek231293','https://blog.com');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`user_name`,`email`,`password`,`remember_token`,`created_at`,`updated_at`) values (2,'Abhishek Gupta','abhi231293','abhishekgupta00143@gmail.com','$2y$10$1X.kaDBpoXa0UB03te74n.qJkD4.EagsrQZgm.j9SQJPjN7bxZdOO','fkCLjdNOKM0p4hj6dE9tk0w8oZUcDLYlOG7vfUaTaF5qqI1jUgGxABfYkmVQ','2016-05-21 17:30:44','2016-06-14 23:48:04');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
