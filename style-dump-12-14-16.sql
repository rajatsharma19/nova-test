

DROP TABLE IF EXISTS `file_data`;

CREATE TABLE `file_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(36) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `extension` varchar(10) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `is_complete` int(1) unsigned NOT NULL DEFAULT '0',
  `size` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_data_id` int(11) DEFAULT NULL,
  `label` varchar(255) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `file_data_id` (`file_data_id`),
  CONSTRAINT `tags_ibfk_1` FOREIGN KEY (`file_data_id`) REFERENCES `file_data` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


