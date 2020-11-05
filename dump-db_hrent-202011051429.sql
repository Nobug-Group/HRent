-- MariaDB dump 10.17  Distrib 10.4.10-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: db_hrent
-- ------------------------------------------------------
-- Server version	10.4.10-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `db_anexo_contrato`
--

DROP TABLE IF EXISTS `db_anexo_contrato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_anexo_contrato` (
  `num_contrato` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`num_contrato`),
  KEY `db_anexo_contrato_num_contrato_IDX` (`num_contrato`,`path`) USING BTREE,
  CONSTRAINT `db_anexo_contrato_FK` FOREIGN KEY (`num_contrato`) REFERENCES `db_contrato` (`num_contrato`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_anexo_contrato`
--

LOCK TABLES `db_anexo_contrato` WRITE;
/*!40000 ALTER TABLE `db_anexo_contrato` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_anexo_contrato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_complemento`
--

DROP TABLE IF EXISTS `db_complemento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_complemento` (
  `cep` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `complemento` varchar(50) NOT NULL,
  `referencia` varchar(100) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cep`,`num`),
  KEY `FK_END` (`cep`),
  CONSTRAINT `db_complemento_FK` FOREIGN KEY (`cep`) REFERENCES `db_enderecos` (`cep`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_complemento`
--

LOCK TABLES `db_complemento` WRITE;
/*!40000 ALTER TABLE `db_complemento` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_complemento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_contato`
--

DROP TABLE IF EXISTS `db_contato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_contato` (
  `idcontato` int(11) NOT NULL AUTO_INCREMENT,
  `idpessoa` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `numero` int(20) NOT NULL,
  `operadora` varchar(100) DEFAULT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`idcontato`),
  KEY `db_contato_FK` (`idpessoa`),
  CONSTRAINT `db_contato_FK` FOREIGN KEY (`idpessoa`) REFERENCES `db_pessoa` (`idpessoa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_contato`
--

LOCK TABLES `db_contato` WRITE;
/*!40000 ALTER TABLE `db_contato` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_contato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_contrato`
--

DROP TABLE IF EXISTS `db_contrato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_contrato` (
  `num_contrato` int(11) NOT NULL,
  `cod_imovel` int(11) NOT NULL,
  `id_inquilino` int(11) NOT NULL,
  `id_fiador` int(11) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_termino` date NOT NULL,
  `data_registro` datetime NOT NULL,
  `id_imobiliaria` int(11) NOT NULL,
  `path_contrato` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`num_contrato`),
  KEY `db_contrato_FK_inquilino` (`id_inquilino`),
  KEY `db_contrato_FK_fiador` (`id_fiador`),
  KEY `db_contrato_FK_imobiliaria` (`id_imobiliaria`),
  KEY `db_contrato_FK_imovel` (`cod_imovel`),
  CONSTRAINT `db_contrato_FK_fiador` FOREIGN KEY (`id_fiador`) REFERENCES `db_pessoa` (`idpessoa`),
  CONSTRAINT `db_contrato_FK_imobiliaria` FOREIGN KEY (`id_imobiliaria`) REFERENCES `db_pessoa` (`idpessoa`),
  CONSTRAINT `db_contrato_FK_imovel` FOREIGN KEY (`cod_imovel`) REFERENCES `db_imovel` (`cod_imovel`),
  CONSTRAINT `db_contrato_FK_inquilino` FOREIGN KEY (`id_inquilino`) REFERENCES `db_pessoa` (`idpessoa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_contrato`
--

LOCK TABLES `db_contrato` WRITE;
/*!40000 ALTER TABLE `db_contrato` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_contrato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_enderecos`
--

DROP TABLE IF EXISTS `db_enderecos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_enderecos` (
  `cep` int(11) NOT NULL,
  `logradouro` varchar(45) NOT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  PRIMARY KEY (`cep`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_enderecos`
--

LOCK TABLES `db_enderecos` WRITE;
/*!40000 ALTER TABLE `db_enderecos` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_enderecos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_groups`
--

DROP TABLE IF EXISTS `db_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_groups`
--

LOCK TABLES `db_groups` WRITE;
/*!40000 ALTER TABLE `db_groups` DISABLE KEYS */;
INSERT INTO `db_groups` VALUES (1,'admin','Administrador'),(2,'members','Usuários Gerais');
/*!40000 ALTER TABLE `db_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_imovel`
--

DROP TABLE IF EXISTS `db_imovel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_imovel` (
  `cod_imovel` int(11) NOT NULL AUTO_INCREMENT,
  `cep` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `comp` varchar(50) NOT NULL,
  `valor_base_aluguel` double DEFAULT NULL,
  PRIMARY KEY (`cod_imovel`),
  KEY `db_imovel_cep_IDX` (`cep`,`num`,`comp`) USING BTREE,
  CONSTRAINT `db_imovel_FK` FOREIGN KEY (`cep`, `num`) REFERENCES `db_complemento` (`cep`, `num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_imovel`
--

LOCK TABLES `db_imovel` WRITE;
/*!40000 ALTER TABLE `db_imovel` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_imovel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_login_attempts`
--

DROP TABLE IF EXISTS `db_login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_login_attempts` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) DEFAULT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_login_attempts`
--

LOCK TABLES `db_login_attempts` WRITE;
/*!40000 ALTER TABLE `db_login_attempts` DISABLE KEYS */;
INSERT INTO `db_login_attempts` VALUES (25,'127.0.0.1','bruno.gl.higuera@gmail.com',1603302864);
/*!40000 ALTER TABLE `db_login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_migrations`
--

DROP TABLE IF EXISTS `db_migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_migrations`
--

LOCK TABLES `db_migrations` WRITE;
/*!40000 ALTER TABLE `db_migrations` DISABLE KEYS */;
INSERT INTO `db_migrations` VALUES (1,'20181211100537','IonAuth\\Database\\Migrations\\Migration_Install_ion_auth','','IonAuth',1602672261,1);
/*!40000 ALTER TABLE `db_migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_pessoa`
--

DROP TABLE IF EXISTS `db_pessoa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_pessoa` (
  `idpessoa` int(11) NOT NULL AUTO_INCREMENT,
  `nome_razao` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tipo_pessoa` varchar(100) NOT NULL,
  `rg` int(11) DEFAULT NULL,
  `cpf_cnpj` int(11) NOT NULL,
  PRIMARY KEY (`idpessoa`),
  KEY `db_pessoa_idpessoa_IDX` (`idpessoa`,`cpf_cnpj`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_pessoa`
--

LOCK TABLES `db_pessoa` WRITE;
/*!40000 ALTER TABLE `db_pessoa` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_pessoa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_proprietario`
--

DROP TABLE IF EXISTS `db_proprietario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_proprietario` (
  `idpessoa` int(11) NOT NULL,
  `porcentagem` smallint(3) NOT NULL,
  `data` date NOT NULL,
  `cod_imovel` int(11) NOT NULL,
  PRIMARY KEY (`idpessoa`,`cod_imovel`),
  KEY `db_proprietario_FK` (`cod_imovel`),
  CONSTRAINT `db_proprietario_FK` FOREIGN KEY (`cod_imovel`) REFERENCES `db_imovel` (`cod_imovel`),
  CONSTRAINT `db_proprietario_FK_1` FOREIGN KEY (`idpessoa`) REFERENCES `db_pessoa` (`idpessoa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_proprietario`
--

LOCK TABLES `db_proprietario` WRITE;
/*!40000 ALTER TABLE `db_proprietario` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_proprietario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_users`
--

DROP TABLE IF EXISTS `db_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `activation_selector` (`activation_selector`),
  UNIQUE KEY `forgotten_password_selector` (`forgotten_password_selector`),
  UNIQUE KEY `remember_selector` (`remember_selector`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_users`
--

LOCK TABLES `db_users` WRITE;
/*!40000 ALTER TABLE `db_users` DISABLE KEYS */;
INSERT INTO `db_users` VALUES (1,'127.0.0.1','administrator','$2y$12$ptdl6uY0kdqtpDC61ZnphueKIFspXC66JbsrIIsDub45TtOHM547a','admin@admin.com',NULL,'',NULL,NULL,NULL,NULL,NULL,1268889823,1603210036,1,'Administrator','adm','ADMIN','0'),(2,'127.0.0.1','bhiguera','$2y$12$Dv8bIQnj4.PvW0OKP3BHp.ASmxHetAko/CFa8M2EnLrwgt6qtcNJy','bruno.gl.higuera@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1268889823,1603281108,1,'Bruno','Higuera','Nobug','011 99199-9458'),(3,'127.0.0.1','higuera_sp@hotmail.com','$2y$10$S8Z331fOEQ9dJf7NlDs0POOcF8mTQ.2Bd4c9gwg4DOEsiJOHECqlq','higuera_sp@hotmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1603188198,NULL,1,'Hugo','Higuera','Teste','11991999458'),(4,'127.0.0.1','manoel.higuera@qualymax.com.br','$2y$10$vOinvywDk7Gw7XgYaHIjreLre3fMQ1Vtvq790pQ8KTvOq8cKmJU5y','manoel.higuera@qualymax.com.br',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1603209916,1603209959,1,'Manoel','Pascua Higuera','Teste','');
/*!40000 ALTER TABLE `db_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_users_groups`
--

DROP TABLE IF EXISTS `db_users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `db_users_groups_user_id_foreign` (`user_id`),
  KEY `db_users_groups_group_id_foreign` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_users_groups`
--

LOCK TABLES `db_users_groups` WRITE;
/*!40000 ALTER TABLE `db_users_groups` DISABLE KEYS */;
INSERT INTO `db_users_groups` VALUES (15,1,1),(16,1,2),(20,3,2),(22,4,2),(23,2,1),(24,2,2);
/*!40000 ALTER TABLE `db_users_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'db_hrent'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-05 14:29:33
