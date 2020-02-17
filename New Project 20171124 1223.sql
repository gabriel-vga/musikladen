-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.13-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema musikladen
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ musikladen;
USE musikladen;

--
-- Table structure for table `musikladen`.`tbalbum`
--

DROP TABLE IF EXISTS `tbalbum`;
CREATE TABLE `tbalbum` (
  `NomeAlbum` varchar(70) NOT NULL DEFAULT '',
  `DataCadAlbum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idAlbum` int(11) NOT NULL AUTO_INCREMENT,
  `nomeCapa` varchar(45) NOT NULL,
  PRIMARY KEY (`idAlbum`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `musikladen`.`tbalbum`
--

/*!40000 ALTER TABLE `tbalbum` DISABLE KEYS */;
INSERT INTO `tbalbum` (`NomeAlbum`,`DataCadAlbum`,`idAlbum`,`nomeCapa`) VALUES 
 ('Aladdin Sane','2017-11-23 16:09:36',12,'19000.jpg'),
 ('Discovery','2017-11-23 16:34:02',13,'19429.jpg'),
 ('Random Access Memories','2017-11-23 16:49:24',14,'23919.jpg'),
 ('The Hit List','2017-11-23 17:02:15',15,'24971.jpg'),
 ('Bad Reputation','2017-11-23 17:09:19',16,'12377.JPG'),
 ('Juice','2017-11-23 17:28:54',17,'20964.jpg'),
 ('Shes So Unusual','2017-11-23 17:29:14',18,'1613.jpg'),
 ('The Beginning','2017-11-23 17:43:37',19,'13004.jpg');
/*!40000 ALTER TABLE `tbalbum` ENABLE KEYS */;


--
-- Table structure for table `musikladen`.`tbcantor`
--

DROP TABLE IF EXISTS `tbcantor`;
CREATE TABLE `tbcantor` (
  `idCantor` int(11) NOT NULL AUTO_INCREMENT,
  `NomeCantor` varchar(45) NOT NULL,
  `DataCadCantor` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `NomeFotoCantor` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCantor`),
  UNIQUE KEY `idCantor_UNIQUE` (`idCantor`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `musikladen`.`tbcantor`
--

/*!40000 ALTER TABLE `tbcantor` DISABLE KEYS */;
INSERT INTO `tbcantor` (`idCantor`,`NomeCantor`,`DataCadCantor`,`NomeFotoCantor`) VALUES 
 (11,'David Bowie','2017-11-23 16:07:18','3079.jpg'),
 (12,'Daft Punk','2017-11-23 16:34:19','18106.jpg'),
 (13,'Joan Jett','2017-11-23 17:01:56','15194.jpg'),
 (14,'Cyndi Lauper','2017-11-23 17:26:01','14198.jpg'),
 (15,'Juice Newton','2017-11-23 17:28:32','16759.jpg'),
 (16,'The Black Eyed Peas','2017-11-23 17:43:57','30997.jpg');
/*!40000 ALTER TABLE `tbcantor` ENABLE KEYS */;


--
-- Table structure for table `musikladen`.`tbcliente`
--

DROP TABLE IF EXISTS `tbcliente`;
CREATE TABLE `tbcliente` (
  `CPF` varchar(10) NOT NULL DEFAULT '',
  `Nome` varchar(45) NOT NULL,
  `Telefone` varchar(15) DEFAULT NULL,
  `EMail` varchar(45) NOT NULL,
  `Senha` varchar(45) NOT NULL,
  `UF` varchar(2) NOT NULL,
  `Cidade` varchar(45) NOT NULL,
  `CEP` varchar(9) NOT NULL,
  `Rua` varchar(45) NOT NULL,
  `Num` varchar(7) NOT NULL,
  `Complemento` varchar(45) DEFAULT NULL,
  `DataCadCliente` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `DataNasc` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`CPF`),
  UNIQUE KEY `CPF_UNIQUE` (`CPF`),
  UNIQUE KEY `E-Mail_UNIQUE` (`EMail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `musikladen`.`tbcliente`
--

/*!40000 ALTER TABLE `tbcliente` DISABLE KEYS */;
INSERT INTO `tbcliente` (`CPF`,`Nome`,`Telefone`,`EMail`,`Senha`,`UF`,`Cidade`,`CEP`,`Rua`,`Num`,`Complemento`,`DataCadCliente`,`DataNasc`) VALUES 
 ('11111111','Gabriel Vinicius','111111111111','gabriel.vga@r7.com','123','SP','sdasdas','111111111','asasd','111','','2017-11-22 13:40:12','2017-11-08'),
 ('1111111111','Lucas','3232133213','lucas@gmail.com','abc','SP','Campinas','12435876','xxx','12','x','2017-11-22 12:56:08','2017-11-07'),
 ('123.213.12','Google','(12) 2121-12221','math@gmail.com','abc','SP','SumarÃ©','13174-526','Rua Presidente Prudente de Moraes','112','XXX','2017-11-23 03:19:58','11/08/2017'),
 ('1234567891','Gabriel Vinicius','32321312232','gabriel.vga@bol.com.br','123','SP','SumarÃ©','233213213','3','112','dsadas','2017-11-17 22:07:39','2017-11-22'),
 ('321.321.33','Gabriel Vinicius','(32) 3213-23333','g@g.com','123','SP','SumarÃ©','13174-526','Rua Presidente Prudente de Moraes','11','N/D','2017-11-23 20:58:32','11/08/2017'),
 ('342.132.21','Jessica','(31) 1232-13132','j@j.com','qwerty','SP','SumarÃ©','13174-526','Rua Presidente Prudente de Moraes','999','N/D','2017-11-23 15:17:26','11/21/2017');
/*!40000 ALTER TABLE `tbcliente` ENABLE KEYS */;


--
-- Table structure for table `musikladen`.`tbcompositor`
--

DROP TABLE IF EXISTS `tbcompositor`;
CREATE TABLE `tbcompositor` (
  `idCompositor` int(11) NOT NULL AUTO_INCREMENT,
  `NomeCompositor` varchar(45) NOT NULL,
  `DataCadCompositor` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idCompositor`),
  UNIQUE KEY `idCompositor_UNIQUE` (`idCompositor`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `musikladen`.`tbcompositor`
--

/*!40000 ALTER TABLE `tbcompositor` DISABLE KEYS */;
INSERT INTO `tbcompositor` (`idCompositor`,`NomeCompositor`,`DataCadCompositor`) VALUES 
 (7,'David Bowie','2017-11-23 16:08:37'),
 (8,'Mick Jagger & Keith Richards','2017-11-23 16:09:11'),
 (9,' Thomas Bangalter & Guy-Manuel de Homem-Chris','2017-11-23 16:37:46'),
 (10,'	Angus Young, Malcolm Young, Bon Scott','2017-11-23 17:04:41'),
 (11,'Boudleaux Bryant','2017-11-23 17:05:11'),
 (12,'Joan Jett','2017-11-23 17:07:58'),
 (13,'Robert Hazard','2017-11-23 17:29:55'),
 (14,'Cyndi Lauper','2017-11-23 17:30:04'),
 (15,'Chip Taylor','2017-11-23 17:33:51'),
 (16,'wiil.i.am','2017-11-23 17:43:13');
/*!40000 ALTER TABLE `tbcompositor` ENABLE KEYS */;


--
-- Table structure for table `musikladen`.`tbfornecedor`
--

DROP TABLE IF EXISTS `tbfornecedor`;
CREATE TABLE `tbfornecedor` (
  `idFornecedor` int(11) NOT NULL AUTO_INCREMENT,
  `DataCadGer` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `NomeFornecedor` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`idFornecedor`),
  UNIQUE KEY `idFornecedor_UNIQUE` (`idFornecedor`) USING BTREE,
  UNIQUE KEY `NomeFornecedor_UNIQUE` (`NomeFornecedor`) USING HASH
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `musikladen`.`tbfornecedor`
--

/*!40000 ALTER TABLE `tbfornecedor` DISABLE KEYS */;
INSERT INTO `tbfornecedor` (`idFornecedor`,`DataCadGer`,`NomeFornecedor`) VALUES 
 (6,'2017-11-23 16:11:22','RCA'),
 (7,'2017-11-23 16:38:06','Virgin'),
 (8,'2017-11-23 16:50:01','Columbia Records'),
 (9,'2017-11-23 17:04:15','Sony'),
 (10,'2017-11-23 17:08:06','Boardwalk'),
 (11,'2017-11-23 17:30:56','Portrait'),
 (12,'2017-11-23 17:34:42','Bell Records'),
 (13,'2017-11-23 17:35:12','Capitol Records'),
 (14,'2017-11-23 17:44:13','Interscope');
/*!40000 ALTER TABLE `tbfornecedor` ENABLE KEYS */;


--
-- Table structure for table `musikladen`.`tbgenero`
--

DROP TABLE IF EXISTS `tbgenero`;
CREATE TABLE `tbgenero` (
  `idGenero` int(11) NOT NULL AUTO_INCREMENT,
  `NomeGenero` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`idGenero`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `musikladen`.`tbgenero`
--

/*!40000 ALTER TABLE `tbgenero` DISABLE KEYS */;
INSERT INTO `tbgenero` (`idGenero`,`NomeGenero`) VALUES 
 (13,'Rock'),
 (14,'Pop'),
 (16,'EletrÃ´nica'),
 (17,'Country'),
 (18,'Hip-Hop');
/*!40000 ALTER TABLE `tbgenero` ENABLE KEYS */;


--
-- Table structure for table `musikladen`.`tbgerenciador`
--

DROP TABLE IF EXISTS `tbgerenciador`;
CREATE TABLE `tbgerenciador` (
  `Nome` varchar(45) NOT NULL,
  `EMail` varchar(45) NOT NULL,
  `Senha` varchar(45) NOT NULL,
  `idGer` int(11) NOT NULL AUTO_INCREMENT,
  `DataCadGer` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idGer`),
  UNIQUE KEY `E-Mail_UNIQUE` (`EMail`),
  UNIQUE KEY `idForn_UNIQUE` (`idGer`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `musikladen`.`tbgerenciador`
--

/*!40000 ALTER TABLE `tbgerenciador` DISABLE KEYS */;
INSERT INTO `tbgerenciador` (`Nome`,`EMail`,`Senha`,`idGer`,`DataCadGer`) VALUES 
 ('Gabriel','adm@adm.com','adm',2,'2017-11-17 15:08:41');
/*!40000 ALTER TABLE `tbgerenciador` ENABLE KEYS */;


--
-- Table structure for table `musikladen`.`tbmusica`
--

DROP TABLE IF EXISTS `tbmusica`;
CREATE TABLE `tbmusica` (
  `idMusica` int(11) NOT NULL AUTO_INCREMENT,
  `Duracao` tinyint(8) NOT NULL,
  `NomeMusica` varchar(45) NOT NULL,
  `Lancamento` smallint(4) DEFAULT NULL,
  `Faixa` tinyint(2) DEFAULT NULL,
  `DataCadMusica` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idmForn` int(11) NOT NULL,
  `idmGenero` int(11) NOT NULL,
  `idmAlbum` int(11) NOT NULL,
  `NomeAudio` varchar(45) NOT NULL,
  `idmCantor` int(11) NOT NULL,
  `idmCompositor` int(11) NOT NULL,
  `Gravadora` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`idMusica`),
  UNIQUE KEY `idMusica_UNIQUE` (`idMusica`),
  KEY `fk_tbMusica_tbFornecedor1_idx` (`idmForn`),
  KEY `fk_tbMusica_tbGênero1_idx` (`idmGenero`),
  KEY `fk_tbMusica_tbAlbum1_idx` (`idmAlbum`),
  KEY `fk_tbmusica_tbcantor1_idx` (`idmCantor`),
  KEY `fk_tbmusica_tbcompositor1_idx` (`idmCompositor`),
  CONSTRAINT `fk_tbMusica_tbAlbum1` FOREIGN KEY (`idmAlbum`) REFERENCES `tbalbum` (`idAlbum`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbMusica_tbFornecedor1` FOREIGN KEY (`idmForn`) REFERENCES `tbfornecedor` (`idFornecedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbMusica_tbGênero1` FOREIGN KEY (`idmGenero`) REFERENCES `tbgenero` (`idGenero`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbmusica_tbcantor1` FOREIGN KEY (`idmCantor`) REFERENCES `tbcantor` (`idCantor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbmusica_tbcompositor1` FOREIGN KEY (`idmCompositor`) REFERENCES `tbcompositor` (`idCompositor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `musikladen`.`tbmusica`
--

/*!40000 ALTER TABLE `tbmusica` DISABLE KEYS */;
INSERT INTO `tbmusica` (`idMusica`,`Duracao`,`NomeMusica`,`Lancamento`,`Faixa`,`DataCadMusica`,`idmForn`,`idmGenero`,`idmAlbum`,`NomeAudio`,`idmCantor`,`idmCompositor`,`Gravadora`) VALUES 
 (7,4,'Watch That Man',1973,1,'2017-11-23 16:12:35',6,13,12,'28980.mp3',11,7,'rca'),
 (8,5,'Aladdin Sane (1913-1938-197?)',1973,2,'2017-11-23 16:13:32',6,13,12,'15197.mp3',11,7,'RCA'),
 (9,4,'Drive-In Saturday',1973,3,'2017-11-23 16:14:19',6,13,12,'19666.mp3',11,7,'RCA'),
 (10,4,'Panic in Detroit',1973,4,'2017-11-23 16:19:01',6,13,12,'26385.mp3',11,7,'RCA'),
 (11,2,'Cracked Actor',1973,5,'2017-11-23 16:19:28',6,13,12,'16502.mp3',11,7,'RCA'),
 (12,5,'Time',1973,6,'2017-11-23 16:20:09',6,13,12,'5751.mp3',11,7,'RCA'),
 (13,3,'The Prettiest Star',1973,7,'2017-11-23 16:21:57',6,13,12,'740.mp3',11,7,'RCA'),
 (14,3,'Lets Spend the Night Together',1973,8,'2017-11-23 16:23:02',6,13,12,'25421.mp3',11,8,'RCA'),
 (15,4,'The Jean Genie',1973,9,'2017-11-23 16:23:30',6,13,12,'28162.mp3',11,7,'RCA'),
 (16,3,'Lady Grinning Soul',1973,10,'2017-11-23 16:24:03',6,13,12,'8979.mp3',11,7,'RCA'),
 (17,5,'One More Time',2001,1,'2017-11-23 16:39:14',7,16,13,'31083.mp3',12,9,'Virgin');
INSERT INTO `tbmusica` (`idMusica`,`Duracao`,`NomeMusica`,`Lancamento`,`Faixa`,`DataCadMusica`,`idmForn`,`idmGenero`,`idmAlbum`,`NomeAudio`,`idmCantor`,`idmCompositor`,`Gravadora`) VALUES 
 (18,3,'Aerodynamic',2001,2,'2017-11-23 16:42:37',7,16,13,'26960.mp3',12,9,'Virgin'),
 (19,4,'Digital Love',2001,3,'2017-11-23 16:43:24',7,16,13,'26441.mp3',12,9,'Virgin'),
 (20,3,'Harder, Better, Faster, Stronger',2001,4,'2017-11-23 16:44:18',7,16,13,'26702.mp3',12,9,'Virgin'),
 (21,4,'Give Life Back to Music',2013,1,'2017-11-23 16:51:05',8,16,14,'19068.mp3',12,9,'Daft Life'),
 (22,5,'The Game of Love ',201,2,'2017-11-23 16:52:01',8,16,14,'12037.mp3',12,9,'Daft Life'),
 (23,3,'Dirty Deeds',1990,1,'2017-11-23 17:05:57',9,13,15,'24995.mp3',13,10,'Blackheart Records'),
 (24,3,'Love Hurts',1990,2,'2017-11-23 17:06:33',9,13,15,'27808.mp3',13,11,'Blackheart Records'),
 (25,2,'Bad Reputation',1980,1,'2017-11-23 17:10:03',10,13,16,'25630.mp3',13,12,'Blackheart Records'),
 (26,3,'Jezebel',1980,10,'2017-11-23 17:15:25',10,13,16,'23057.mp3',13,12,'Blackheart Records'),
 (27,3,'Girls Just Want to Have Fun',1983,2,'2017-11-23 17:31:42',11,14,18,'21762.mp3',14,13,'Record Plant');
INSERT INTO `tbmusica` (`idMusica`,`Duracao`,`NomeMusica`,`Lancamento`,`Faixa`,`DataCadMusica`,`idmForn`,`idmGenero`,`idmAlbum`,`NomeAudio`,`idmCantor`,`idmCompositor`,`Gravadora`) VALUES 
 (28,4,'Time After Time',1983,4,'2017-11-23 17:32:32',11,14,18,'32275.mp3',14,14,'Record Plant'),
 (29,4,'Angel of The Morning',1981,1,'2017-11-23 17:36:10',13,17,17,'29951.mp3',15,15,'Capitol Records'),
 (30,4,'Someday',2010,5,'2017-11-23 17:45:32',14,18,19,'9258.mp3',16,16,'Interscope');
/*!40000 ALTER TABLE `tbmusica` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
