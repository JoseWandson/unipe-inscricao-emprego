-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: inscricao_emprego
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `candidato`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `candidato` (
  `id_candidato` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `celular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `anexo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_candidato`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidato`
--

/*!40000 ALTER TABLE `candidato` DISABLE KEYS */;
INSERT INTO `candidato` VALUES (1,'Martin','080.648.154-44','martin.pfeifer20@gmail.com','98809-7431','3023-2557','www.linkedin.com',NULL);
/*!40000 ALTER TABLE `candidato` ENABLE KEYS */;

--
-- Table structure for table `candidato_exp_profissional`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `candidato_exp_profissional` (
  `id_candidato` int(11) NOT NULL,
  `id_experiencia_profissional` int(11) NOT NULL,
  PRIMARY KEY (`id_candidato`,`id_experiencia_profissional`),
  KEY `IDX_6E08CB2FA852DB7D` (`id_candidato`),
  KEY `IDX_6E08CB2FFE34A02D` (`id_experiencia_profissional`),
  CONSTRAINT `FK_6E08CB2FA852DB7D` FOREIGN KEY (`id_candidato`) REFERENCES `candidato` (`id_candidato`),
  CONSTRAINT `FK_6E08CB2FFE34A02D` FOREIGN KEY (`id_experiencia_profissional`) REFERENCES `experiencia_profissional` (`id_experiencia_profissional`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidato_exp_profissional`
--

/*!40000 ALTER TABLE `candidato_exp_profissional` DISABLE KEYS */;
INSERT INTO `candidato_exp_profissional` VALUES (1,1);
/*!40000 ALTER TABLE `candidato_exp_profissional` ENABLE KEYS */;

--
-- Table structure for table `candidato_habilidade_tecnica`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `candidato_habilidade_tecnica` (
  `id_candidato` int(11) NOT NULL,
  `id_habilidade_tecnica` int(11) NOT NULL,
  PRIMARY KEY (`id_candidato`,`id_habilidade_tecnica`),
  KEY `IDX_E3F7801EA852DB7D` (`id_candidato`),
  KEY `IDX_E3F7801ECBE55254` (`id_habilidade_tecnica`),
  CONSTRAINT `FK_E3F7801EA852DB7D` FOREIGN KEY (`id_candidato`) REFERENCES `candidato` (`id_candidato`),
  CONSTRAINT `FK_E3F7801ECBE55254` FOREIGN KEY (`id_habilidade_tecnica`) REFERENCES `habilidade_tecnica` (`id_habilidade_tecnica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidato_habilidade_tecnica`
--

/*!40000 ALTER TABLE `candidato_habilidade_tecnica` DISABLE KEYS */;
INSERT INTO `candidato_habilidade_tecnica` VALUES (1,1);
INSERT INTO `candidato_habilidade_tecnica` VALUES (1,2);
/*!40000 ALTER TABLE `candidato_habilidade_tecnica` ENABLE KEYS */;

--
-- Table structure for table `experiencia_profissional`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `experiencia_profissional` (
  `id_experiencia_profissional` int(11) NOT NULL AUTO_INCREMENT,
  `cargo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` longtext COLLATE utf8_unicode_ci NOT NULL,
  `dt_inicio` datetime NOT NULL,
  `dt_final` datetime NOT NULL,
  `is_trabalho_atual` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_experiencia_profissional`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `experiencia_profissional`
--

/*!40000 ALTER TABLE `experiencia_profissional` DISABLE KEYS */;
INSERT INTO `experiencia_profissional` VALUES (1,'Programador','Teste','2015-01-12 02:31:26','2017-02-12 02:31:26',1);
/*!40000 ALTER TABLE `experiencia_profissional` ENABLE KEYS */;

--
-- Table structure for table `habilidade_tecnica`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `habilidade_tecnica` (
  `id_habilidade_tecnica` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_habilidade_tecnica`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `habilidade_tecnica`
--

/*!40000 ALTER TABLE `habilidade_tecnica` DISABLE KEYS */;
INSERT INTO `habilidade_tecnica` VALUES (1,'php');
INSERT INTO `habilidade_tecnica` VALUES (2,'java');
/*!40000 ALTER TABLE `habilidade_tecnica` ENABLE KEYS */;

--
-- Table structure for table `inscricao`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inscricao` (
  `id_inscricao` int(11) NOT NULL AUTO_INCREMENT,
  `id_candidato` int(11) DEFAULT NULL,
  `id_oportunidade` int(11) DEFAULT NULL,
  `codigo_confirmacao` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `is_ativa` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_inscricao`),
  KEY `IDX_5439E49CA852DB7D` (`id_candidato`),
  KEY `IDX_5439E49CF3C747FE` (`id_oportunidade`),
  CONSTRAINT `FK_5439E49CA852DB7D` FOREIGN KEY (`id_candidato`) REFERENCES `candidato` (`id_candidato`),
  CONSTRAINT `FK_5439E49CF3C747FE` FOREIGN KEY (`id_oportunidade`) REFERENCES `oportunidade` (`id_oportunidade`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscricao`
--

/*!40000 ALTER TABLE `inscricao` DISABLE KEYS */;
INSERT INTO `inscricao` VALUES (1,1,1,'948130',1);
/*!40000 ALTER TABLE `inscricao` ENABLE KEYS */;

--
-- Table structure for table `oportunidade`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oportunidade` (
  `id_oportunidade` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` longtext COLLATE utf8_unicode_ci NOT NULL,
  `dt_inicio` datetime NOT NULL,
  `dt_final` datetime NOT NULL,
  `qtd_vagas` int(11) NOT NULL,
  PRIMARY KEY (`id_oportunidade`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oportunidade`
--

/*!40000 ALTER TABLE `oportunidade` DISABLE KEYS */;
INSERT INTO `oportunidade` VALUES (1,'Analista Programador','Atuar com desenvolvimento de interface Web responsiva a partir de layouts PSD / AI. Atuar com criação e manutenção dos sistemas e fazendo eventuais correções necessárias. Programação Front-End utilizando JS, jQuery, TypeScript, Ajax, Conhecimentos em e consumo de serviços REST, WFP e Web-service, HTML5, CSS3, LESS ou SASS / GRUNT ou GULP. Criar, adaptar e recortar layouts do Photoshop ou Illustrator para a criação de HTML e CSS, contato com projetos responsivos e desenvolvimento HTML Cross-browser.\nConhecimento imprescindível em C##, Asp .Net MVC, FluentNHibernate ou EF ou ADO.NET , Web API, criação e consumo de REST e WebService. Conhecimento desejável em SimpleInject (ou Ninject), DDD estruturado, TDD, uso de controle de versão com Git ou TFS.','2016-12-12 18:56:32','2017-12-12 18:56:32',2);
/*!40000 ALTER TABLE `oportunidade` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-05  9:07:27
