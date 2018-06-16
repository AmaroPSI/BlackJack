DROP TABLE IF EXISTS `history`;
CREATE TABLE IF NOT EXISTS `history` (
  `time` datetime NOT NULL,
  `type` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `credit` int(11) NOT NULL,
  `debit` int(11) NOT NULL,
  `wallet` int(11) NOT NULL,
  `idhistory` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  PRIMARY KEY (`idhistory`)
) ENGINE=InnoDB;

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `birth` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `permission` int(11) NOT NULL DEFAULT '2',
  `ban` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6;

ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`idhistory`) REFERENCES `users` (`id`);
COMMIT;

