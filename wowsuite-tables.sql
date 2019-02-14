-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.61 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table ipb_dev.wowsuite_instance_boss
DROP TABLE IF EXISTS `wowsuite_instance_boss`;
CREATE TABLE IF NOT EXISTS `wowsuite_instance_boss` (
  `boss_id` int(11) NOT NULL AUTO_INCREMENT,
  `boss_instance` int(11) NOT NULL DEFAULT '0',
  `boss_name` varchar(55) DEFAULT NULL,
  `boss_abv` varchar(55) DEFAULT NULL,
  `boss_video` text,
  `boss_normal` tinyint(1) NOT NULL DEFAULT '0',
  `boss_heroic` tinyint(1) NOT NULL DEFAULT '0',
  `boss_mythic` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`boss_id`),
  KEY `instance` (`boss_instance`),
  CONSTRAINT `instance` FOREIGN KEY (`boss_instance`) REFERENCES `wowsuite_raid_instances` (`raid_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table ipb_dev.wowsuite_instance_boss: ~9 rows (approximately)
/*!40000 ALTER TABLE `wowsuite_instance_boss` DISABLE KEYS */;
INSERT INTO `wowsuite_instance_boss` (`boss_id`, `boss_instance`, `boss_name`, `boss_abv`, `boss_video`, `boss_normal`, `boss_heroic`, `boss_mythic`) VALUES
	(1, 1, 'Taloc', 'taloc', 'https://faceroll.org/videos/view-5-mythic-taloc/', 1, 1, 1),
	(2, 1, 'MOTHER', 'mother', '', 1, 1, 1),
	(3, 1, 'Fetid Devourer', 'fetid', '', 1, 1, 0),
	(4, 1, 'Zek\'voz', 'zekvoz', '', 1, 1, 0),
	(5, 1, 'Vectis', 'vectis', '', 1, 1, 0),
	(6, 1, 'Zul', 'zul', '', 1, 1, 0),
	(7, 1, 'Mythrax', 'mythrax', '', 1, 1, 0),
	(8, 1, 'G\'huun', 'G\'huun', 'https://faceroll.org/videos/view-4-heroic-ghuun/', 1, 0, 0),
	(9, 2, 'Test', 'Test', '', 0, 0, 0);
/*!40000 ALTER TABLE `wowsuite_instance_boss` ENABLE KEYS */;

-- Dumping structure for table ipb_dev.wowsuite_raid_instances
DROP TABLE IF EXISTS `wowsuite_raid_instances`;
CREATE TABLE IF NOT EXISTS `wowsuite_raid_instances` (
  `raid_id` int(11) NOT NULL AUTO_INCREMENT,
  `raid_name` varchar(50) DEFAULT NULL,
  `raid_abv` varchar(50) DEFAULT NULL,
  `raid_image` text,
  `raid_current_tier` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`raid_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table ipb_dev.wowsuite_raid_instances: ~2 rows (approximately)
/*!40000 ALTER TABLE `wowsuite_raid_instances` DISABLE KEYS */;
INSERT INTO `wowsuite_raid_instances` (`raid_id`, `raid_name`, `raid_abv`, `raid_image`, `raid_current_tier`) VALUES
	(1, 'Uldir', 'uldir', 'monthly_2018_11/uldir.png.25d765bf86939974e69cc54013e22f45.png', 0),
	(2, 'Battle for Dazar\'alor', 'dazar', 'monthly_2018_11/dazar.png.195852d220fb834fb61f0d9e1d62050e.png', 1);
/*!40000 ALTER TABLE `wowsuite_raid_instances` ENABLE KEYS */;

-- Dumping structure for table ipb_dev.wowsuite_recruit_class
DROP TABLE IF EXISTS `wowsuite_recruit_class`;
CREATE TABLE IF NOT EXISTS `wowsuite_recruit_class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(50) DEFAULT NULL,
  `class_abv` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table ipb_dev.wowsuite_recruit_class: ~12 rows (approximately)
/*!40000 ALTER TABLE `wowsuite_recruit_class` DISABLE KEYS */;
INSERT INTO `wowsuite_recruit_class` (`class_id`, `class_name`, `class_abv`) VALUES
	(1, 'Mage', 'mage'),
	(2, 'Priest', 'priest'),
	(3, 'Warlock', 'warlock'),
	(4, 'Rogue', 'rogue'),
	(5, 'Druid', 'druid'),
	(6, 'Monk', 'monk'),
	(7, 'Demon Hunter', 'dh'),
	(8, 'Shaman', 'shaman'),
	(9, 'Hunter', 'hunter'),
	(10, 'Paladin', 'paladin'),
	(11, 'Warrior', 'warrior'),
	(12, 'Death Knight', 'dk');
/*!40000 ALTER TABLE `wowsuite_recruit_class` ENABLE KEYS */;

-- Dumping structure for table ipb_dev.wowsuite_recruit_date
DROP TABLE IF EXISTS `wowsuite_recruit_date`;
CREATE TABLE IF NOT EXISTS `wowsuite_recruit_date` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `last_updated` varchar(10) NOT NULL DEFAULT '12/31/2000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table ipb_dev.wowsuite_recruit_date: ~1 rows (approximately)
/*!40000 ALTER TABLE `wowsuite_recruit_date` DISABLE KEYS */;
INSERT INTO `wowsuite_recruit_date` (`id`, `last_updated`) VALUES
	(1, '12/31/2000');
/*!40000 ALTER TABLE `wowsuite_recruit_date` ENABLE KEYS */;

-- Dumping structure for table ipb_dev.wowsuite_recruit_spec
DROP TABLE IF EXISTS `wowsuite_recruit_spec`;
CREATE TABLE IF NOT EXISTS `wowsuite_recruit_spec` (
  `spec_id` int(11) NOT NULL AUTO_INCREMENT,
  `spec_class` int(11) NOT NULL DEFAULT '0',
  `spec_name` varchar(50) DEFAULT NULL,
  `spec_abv` varchar(50) DEFAULT NULL,
  `spec_icon` text,
  `spec_recruiting` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`spec_id`),
  KEY `spec_class` (`spec_class`),
  CONSTRAINT `spec_class` FOREIGN KEY (`spec_class`) REFERENCES `wowsuite_recruit_class` (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- Dumping data for table ipb_dev.wowsuite_recruit_spec: ~37 rows (approximately)
/*!40000 ALTER TABLE `wowsuite_recruit_spec` DISABLE KEYS */;
INSERT INTO `wowsuite_recruit_spec` (`spec_id`, `spec_class`, `spec_name`, `spec_abv`, `spec_icon`, `spec_recruiting`) VALUES
	(1, 1, 'Frost', 'frost', 'monthly_2018_11/mage_frost.jpg.0f7cc2bb1364cb00584fb2cf28d3bd62.jpg', 1),
	(2, 1, 'Fire', 'fire', 'monthly_2018_11/mage_fire.jpg.da0d9d0ae83ede5e4cd3c1602f0c8c80.jpg', 1),
	(3, 1, 'Arcane', 'Arcane', 'monthly_2018_11/mage_arcane.jpg.384fe1ee15555ef53ffb36e80a199a3c.jpg', 0),
	(4, 2, 'Discipline', 'discipline', 'monthly_2018_11/priest_discipline.jpg.6d8ad59599486655b4fd53ac9f35720c.jpg', 1),
	(5, 2, 'Holy', 'holy', 'monthly_2018_11/priest_holy.jpg.275a41c3b3a54f6e93f38fd0e47e3e56.jpg', 1),
	(6, 2, 'Shadow', 'shadow', 'monthly_2018_11/priest_shadow.jpg.53bb7ef93e86765c32a44e33f827c821.jpg', 1),
	(7, 3, 'Affliction', 'affliction', 'monthly_2018_11/warlock_affliction.jpg.03acc5aab9d7257a2e2166c481ad5050.jpg', 1),
	(8, 3, 'Demonology', 'demonology', 'monthly_2018_11/warlock_demonology.jpg.846eb128accf22beb34338902308c166.jpg', 1),
	(9, 3, 'Destruction', 'destruction', 'monthly_2018_11/warlock_destruction.jpg.6234fdb931ac17f87877e626bbe90fc5.jpg', 1),
	(10, 4, 'Assassination', 'assassination', 'monthly_2018_11/rogue_assassination.jpg.187027b681c9d3572d275831a0a5804e.jpg', 1),
	(11, 4, 'Outlaw', 'outlaw', 'monthly_2018_11/rogue_outlaw.jpg.5b96731e0ebf27f58d7773b3a7923fc9.jpg', 1),
	(12, 4, 'Subtlety', 'subtlety', 'monthly_2018_11/rogue_subtlety.jpg.a857d7137e0f97f02b3579ebce3c9ef1.jpg', 1),
	(13, 5, 'Guardian', 'guardian', 'monthly_2018_11/druid_guardian.jpg.8bab70bb2fd61d06c301c6b186c23e07.jpg', 1),
	(14, 5, 'Restoration', 'restoration', 'monthly_2018_11/druid_restoration.jpg.6cfb100c177179cf018e9ec8da5d55ff.jpg', 1),
	(15, 5, 'Balance', 'balance', 'monthly_2018_11/druid_balance.jpg.b8a08600fa36201f57dff163bf06a927.jpg', 1),
	(16, 5, 'Feral', 'feral', 'monthly_2018_11/druid_feral.jpg.7234644449f3ecfbce721def1e053843.jpg', 1),
	(17, 6, 'Brewmaster', 'brewmaster', 'monthly_2018_11/monk_brewmaster.jpg.0f696a6d0a14d56e19082bc67e10b2fa.jpg', 1),
	(18, 6, 'Mistweaver', 'mistweaver', 'monthly_2018_11/monk_mistweaver.jpg.fb519eefbf40078ee58ed5b2817d5277.jpg', 1),
	(19, 6, 'Mistweaver', 'mistweaver', 'monthly_2018_11/monk_mistweaver.jpg.8662985d9e7c26593afbce80e0c32a67.jpg', 1),
	(20, 6, 'Windwalker', 'windwalker', 'monthly_2018_11/monk_windwalker.jpg.1b417120d2e40fe1d97cf947c373f223.jpg', 1),
	(21, 7, 'Vengeance', 'vengeance', 'monthly_2018_11/2044436335_demonhunter_vengeance.jpg.3ecf303ca7315f1b5328fc5c469cc09e.jpg', 1),
	(22, 7, 'Havoc', 'havoc', 'monthly_2018_11/842325774_demonhunter_havoc.jpg.697453965d69362a62b1e65bee9eb02a.jpg', 1),
	(23, 8, 'Restoration', 'restoration', 'monthly_2018_11/shaman_restoration.jpg.b582fd1904c90caa7635f7cfc21b8990.jpg', 1),
	(24, 8, 'Elemental', 'elemental', 'monthly_2018_11/shaman_elemental.jpg.75c15c59d23df4b1199e60324e2e0a96.jpg', 1),
	(25, 8, 'Enhancement', 'enhancement', 'monthly_2018_11/shaman_enhancement.jpg.ac44c217e67a8b407a54dbe3ae23783b.jpg', 1),
	(26, 9, 'Beast Mastery', 'beast_mastery', 'monthly_2018_11/9955679_hunter_beastmastery.jpg.49ad71a18bb3f4ee024679a4f3e6822e.jpg', 1),
	(27, 9, 'Survival', 'survival', 'monthly_2018_11/hunter_survival.jpg.82a514e50219fe57802f7772779f54e4.jpg', 1),
	(28, 9, 'Marksmanship', 'marksmanship', 'monthly_2018_11/hunter_marksmanship.jpg.54a61a33caecebabcd9535528fb5f8c1.jpg', 1),
	(29, 10, 'Protection', 'protection', 'monthly_2018_11/paladin_protection.jpg.f492e03f93323cbaac8ed34abb877ac4.jpg', 1),
	(30, 10, 'Holy', 'holy', 'monthly_2018_11/paladin_holy.jpg.7e686f078df59ef2aadbe9f6569dea77.jpg', 1),
	(31, 10, 'Retribution', 'retribution', 'monthly_2018_11/paladin_retribution.jpg.f64c050cf9dc2e8afb22e181045d9508.jpg', 1),
	(32, 11, 'Protection', 'protection', 'monthly_2018_11/warrior_protection.jpg.a627799828fb8760720b29c2df926681.jpg', 1),
	(33, 11, 'Arms', 'arms', 'monthly_2018_11/warrior_arms.jpg.c9dfed476f92207974b93781fac7b156.jpg', 1),
	(34, 11, 'Fury', 'fury', 'monthly_2018_11/warrior_fury.jpg.cc6c54387edffa11345c00d7e98555d1.jpg', 1),
	(35, 12, 'Blood', 'blood', 'monthly_2018_11/1188526833_deathknight_blood.jpg.79be40a16251bfa7b6e85596bb5298f1.jpg', 1),
	(36, 12, 'Frost', 'frost', 'monthly_2018_11/1141371287_deathknight_frost.jpg.c635f19f1713beb792a18acc66f8ac38.jpg', 1),
	(37, 12, 'Unholy', 'unholy', 'monthly_2018_11/1073729454_deathknight_unholy.jpg.b8efaecdc26490998678ebf386233b8b.jpg', 1);
/*!40000 ALTER TABLE `wowsuite_recruit_spec` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
