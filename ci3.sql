/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT IGNORE INTO `groups` (`id`, `name`, `description`) VALUES
	(1, 'admin', 'Administrator'),
	(2, 'members', 'General User'),
	(3, 'content', 'Content Manager'),
	(4, 'owner', 'Owner'),
	(5, 'partner', 'Partner'),
	(6, 'client', 'Client');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `adv_info` varchar(1024) NOT NULL,
  `img` varchar(256) NOT NULL,
  `full_address` varchar(512) NOT NULL,
  `street` varchar(512) NOT NULL,
  `h_number` varchar(32) NOT NULL,
  `city` varchar(256) NOT NULL,
  `district` varchar(64) NOT NULL,
  `country` varchar(128) NOT NULL,
  `country_code` varchar(8) NOT NULL,
  `admin_area` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT IGNORE INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `adv_info`, `img`, `full_address`, `street`, `h_number`, `city`, `district`, `country`, `country_code`, `admin_area`) VALUES
	(57, '', 'tesla', 'bc250e0d83c37b0953ada14e7bbc1dfd', NULL, 'nikola@tesla.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
	(58, '127.0.0.1', 'saha', '$2y$08$U8VVYBHNQNWiDahvdqqlf.sbb5bk4ZLXYqpucfiPGQgD14WqXBErq', NULL, 'saha@com.ua', NULL, NULL, NULL, NULL, 1487856465, 1487856500, 1, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
	(62, '127.0.0.1', 't', '$2y$08$L8hJfLqsUjZ5/zeWjaXA.OduN9nMy9gTQfysLRbEwd39BnePYaOqu', NULL, 't@t.ua', NULL, NULL, NULL, NULL, 1487857034, 1487858390, 1, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
	(40, '178.93.118.102', '', '$2y$08$xcvygfRmVY2gsGZsGNeBF.yiLHnCz9Jird4cLT8DJDY7S2y26k7NK', NULL, 'asd@gmail.com', NULL, NULL, NULL, NULL, 1486256107, 1486256107, 1, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', ''),
	(59, '127.0.0.1', 'aaaaaaaaaaaaa', '$2y$08$wlyCG/G1MgiERZl9mHlvmOOriHR2Hbd4Ryi1kUpblxjowluZGC0/G', NULL, 'a@a.ua', NULL, NULL, NULL, NULL, 1487856554, NULL, 1, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
	(56, '127.0.0.1', 'alex', '$2y$08$InRlcMfo4pgZAtH2lLrbm.UKr1TyXstfw.d6NLAEoydj49Kv9zOKm', NULL, 'alex@com.ua', NULL, NULL, NULL, NULL, 1487851403, 1487858356, 1, 'Alex', 'Alex', NULL, NULL, '', '', '', '', '', '', '', '', '', '');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=148 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT IGNORE INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
	(1, 1, 1),
	(2, 1, 2),
	(144, 62, 3),
	(145, 62, 4),
	(146, 62, 5),
	(82, 37, 2),
	(147, 62, 6),
	(85, 40, 2),
	(90, 42, 3),
	(89, 42, 2),
	(91, 42, 4),
	(92, 43, 1),
	(93, 44, 1),
	(94, 45, 1),
	(95, 46, 1),
	(96, 47, 1),
	(97, 48, 1),
	(98, 49, 1),
	(99, 50, 1),
	(100, 51, 1),
	(101, 52, 1),
	(102, 53, 1),
	(103, 54, 1),
	(104, 55, 1),
	(106, 56, 1),
	(107, 56, 4),
	(118, 59, 1),
	(117, 58, 3),
	(116, 58, 2),
	(115, 58, 1),
	(114, 57, 1),
	(119, 59, 2),
	(120, 59, 3),
	(143, 62, 2),
	(142, 62, 1);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
