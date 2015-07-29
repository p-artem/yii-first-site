-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.5.41-log - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных yii2first
CREATE DATABASE IF NOT EXISTS `yii2first` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `yii2first`;


-- Дамп структуры для таблица yii2first.auth_assignment
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы yii2first.auth_assignment: ~0 rows (приблизительно)
DELETE FROM `auth_assignment`;
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;


-- Дамп структуры для таблица yii2first.auth_item
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы yii2first.auth_item: ~0 rows (приблизительно)
DELETE FROM `auth_item`;
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;


-- Дамп структуры для таблица yii2first.auth_item_child
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы yii2first.auth_item_child: ~0 rows (приблизительно)
DELETE FROM `auth_item_child`;
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;


-- Дамп структуры для таблица yii2first.auth_rule
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы yii2first.auth_rule: ~0 rows (приблизительно)
DELETE FROM `auth_rule`;
/*!40000 ALTER TABLE `auth_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_rule` ENABLE KEYS */;


-- Дамп структуры для таблица yii2first.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii2first.migration: ~3 rows (приблизительно)
DELETE FROM `migration`;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1434306202),
	('m140506_102106_rbac_init', 1434307753),
	('m150614_182846_create_post_table', 1434306868);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;


-- Дамп структуры для таблица yii2first.post
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii2first.post: ~0 rows (приблизительно)
DELETE FROM `post`;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
/*!40000 ALTER TABLE `post` ENABLE KEYS */;


-- Дамп структуры для таблица yii2first.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `role` tinyint(2) NOT NULL,
  `auth_key` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii2first.user: ~18 rows (приблизительно)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `email`, `password`, `status`, `role`, `auth_key`, `created_at`, `updated_at`) VALUES
	(1, 'user5', 'user5@user.ru', '$2y$13$qqr.WPe7Dw1uo4r52M/TJunsdNoI7NU9gySovFiFmlzW.3n3NOvP.', 10, 10, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(7, 'user', 'user@user.ru', '$2y$13$xgxkT/Wl9atE7qRvUJ4kJOCKDgNNiofGpeSSzVSOPl14EC6FUp.tO', 10, 20, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(8, 'user3', 'user3@user.ru', '$2y$13$MAK9lP0MA3uhvTSSHxDTTu.hRRnR/gHhlzuqmS7XTNEcP3DgN8JZ2', 10, 10, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(9, 'user2', 'user2@user.ru', '$2y$13$IQiV/KjUiZuuMLftC1wcIO/ue6LJwTparHIGSW4Ng/LpU9xmXcZ2q', 10, 10, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(15, 'user6', 'user6@user.ru', '', 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(16, 'user7', 'user7@user.ru', '', 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(17, 'user8', 'user8@user.ru', '', 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(18, 'user9', 'user9@user.ru', '', 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(19, 'user10', 'user10@user.ru', '', 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(20, 'user11', 'user11@user.ru', '', 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(21, 'user12', 'user12@user.ru', '', 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(22, 'user13', 'user13@user.ru', '', 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(23, 'artem', 'artem1@mail.ru', '$2y$13$bMJp3a.iRNfvCpQ4Tm3sO.xuFRrUKe4ZalJyXyGcjYvdjElciXhVi', 10, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(24, 'user22', 'user22@user.ru', '$2y$13$o6GrxA5FlQ7Q/P3spdQjdupL8MjPc231PSPGD46w5NrC/ANY.nKvG', 10, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(25, 'user23', 'user23@user.ru', '$2y$13$2dmm/jwkfCXqZIGX3HEUdeWLCYgtMhD8NfCLcUmQpTt5rlUNbSROS', 10, 0, '', '2015-06-17 14:57:02', '0000-00-00 00:00:00'),
	(26, 'user24', 'user24@user.ru', '$2y$13$0AQz88sqtW/0rtoi1TqVsuNSK2waLR0bxcnvgW8v6zOX1Qj7fy2IO', 10, 0, '', '2015-06-17 14:59:01', '0000-00-00 00:00:00'),
	(27, 'user25', 'user25@user.ru', '$2y$13$cfC/rZ5HsfVVRxSyLsG71eJr2CaWt/bbqOvEZCoveCJ5bOQQImycO', 10, 0, '', '2015-06-17 15:01:10', '0000-00-00 00:00:00'),
	(28, 'user26', 'user26@user.ru', '$2y$13$YqyM0OGcIC.DN8p5l8ihVeARKLrApwOZGDP6O7dvY6pHhR1R0uLTO', 10, 0, '', '2015-06-17 15:03:08', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
