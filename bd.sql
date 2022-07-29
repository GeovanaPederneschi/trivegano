CREATE DATABASE  IF NOT EXISTS `trivegano` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `trivegano`;
-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: trivegano
-- ------------------------------------------------------
-- Server version	8.0.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tb_adm_fornecedor`
--

DROP TABLE IF EXISTS `tb_adm_fornecedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_adm_fornecedor` (
  `id_adm_fornecedor` int unsigned NOT NULL AUTO_INCREMENT,
  `login_adm_fornecedor` varchar(45) NOT NULL,
  `senha_adm_fornecedor` varchar(20) NOT NULL,
  `email_adm_fornecedor` varchar(80) NOT NULL,
  `status_adm_fornecedor` varchar(40) NOT NULL,
  `tb_fornecedor_id_fornecedor` int unsigned NOT NULL,
  PRIMARY KEY (`id_adm_fornecedor`,`tb_fornecedor_id_fornecedor`),
  UNIQUE KEY `email_adm_fornecedor_UNIQUE` (`email_adm_fornecedor`),
  KEY `fk_tb_usuario_restaurante_tb_fornecedor1_idx` (`tb_fornecedor_id_fornecedor`),
  CONSTRAINT `fk_tb_usuario_restaurante_tb_fornecedor1` FOREIGN KEY (`tb_fornecedor_id_fornecedor`) REFERENCES `tb_fornecedor` (`id_fornecedor`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_adm_fornecedor`
--

LOCK TABLES `tb_adm_fornecedor` WRITE;
/*!40000 ALTER TABLE `tb_adm_fornecedor` DISABLE KEYS */;
INSERT INTO `tb_adm_fornecedor` VALUES (1,'flavia','1307','flavia_alimentacaoltda@gmail.com','ativo',1),(2,'camila','1307','camila_restauranteltda@gmail.com','ativo',50),(3,'augusto','1307','augusto_paesedoces@gmail.com','ativo',55);
/*!40000 ALTER TABLE `tb_adm_fornecedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_cartao`
--

DROP TABLE IF EXISTS `tb_cartao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_cartao` (
  `id_cartao` int unsigned NOT NULL AUTO_INCREMENT,
  `numero_cartao` char(19) NOT NULL,
  `nome_cartao` varchar(45) NOT NULL,
  `bandeira_cartao` varchar(45) NOT NULL,
  `csv_cartao` int DEFAULT NULL,
  `validade_cartao` char(7) NOT NULL,
  `tb_cliente_id_cliente` int unsigned NOT NULL,
  PRIMARY KEY (`id_cartao`,`tb_cliente_id_cliente`),
  UNIQUE KEY `numero_cartao_UNIQUE` (`numero_cartao`),
  KEY `fk_tb_cartao_tb_cliente1_idx` (`tb_cliente_id_cliente`),
  CONSTRAINT `fk_tb_cartao_tb_cliente1` FOREIGN KEY (`tb_cliente_id_cliente`) REFERENCES `tb_cliente` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_cartao`
--

LOCK TABLES `tb_cartao` WRITE;
/*!40000 ALTER TABLE `tb_cartao` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_cartao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_categoria`
--

DROP TABLE IF EXISTS `tb_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_categoria` (
  `id_categoria` int unsigned NOT NULL AUTO_INCREMENT,
  `descricao_categoria` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ramo_categoria` varchar(45) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_categoria`
--

LOCK TABLES `tb_categoria` WRITE;
/*!40000 ALTER TABLE `tb_categoria` DISABLE KEYS */;
INSERT INTO `tb_categoria` VALUES (1,'doce','receita'),(2,'salgado','receita'),(3,'principal','produto'),(4,'entrada','produto'),(5,'bebida','produto'),(6,'sobremesa','produto'),(7,'bebida','receita'),(8,'hamburguer','produto');
/*!40000 ALTER TABLE `tb_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_cliente`
--

DROP TABLE IF EXISTS `tb_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_cliente` (
  `id_cliente` int unsigned NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(60) NOT NULL,
  `dat_nasc_cliente` date NOT NULL,
  `cpf_cliente` char(14) NOT NULL,
  `telefone_cliente` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email_cliente` varchar(80) NOT NULL,
  `senha_cliente` varchar(20) NOT NULL,
  `status_cliente` varchar(40) NOT NULL,
  `dat_cadastro_cliente` datetime NOT NULL,
  `usuario_cliente` varchar(45) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `cpf_cliente_UNIQUE` (`cpf_cliente`),
  UNIQUE KEY `email_cliente_UNIQUE` (`email_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_cliente`
--

LOCK TABLES `tb_cliente` WRITE;
/*!40000 ALTER TABLE `tb_cliente` DISABLE KEYS */;
INSERT INTO `tb_cliente` VALUES (3,'Joâo Silva Santos','2005-02-13','55527425839','977908927','geovana@gmail.com','1307','ativo','2022-06-19 00:00:00','João'),(9,'ala','2005-02-13','12345678909','11977908927','ala@gmail.com','09876543','ativo','2022-06-21 19:50:00','teste'),(11,'Claudio Costa Pederneschi','2005-02-13','55527375807','11989003819','costa.pederneschi@gmail.com','09876543','ativo','2022-06-21 13:35:00','João'),(12,'Julia','2005-02-13','55527425831','098909765','pederneschi@gmail.com','09876543','ativo','2022-06-22 02:40:00','Julia'),(13,'Julia','2005-02-13','55527425833','098909765','pederneschi1@gmail.com','12345678','ativo','2022-06-22 02:48:00','Amanda'),(14,'Fernada','2006-06-09','55527425838','11989003819','fernanda@gmail.com','12345678','ativo','2022-06-22 02:51:00','Nanda'),(15,'Natalia','1999-04-13','31543741836','11989003819','nataliasousa@gmail.com','12345678','ativo','2022-06-22 03:14:00','Nat'),(16,'Giovana Oliveira','1978-09-02','56162946916','(11) 86098379','giovanabarrosoliveira@jourrapide.com','Saipae0rooqu','ativo','2022-07-14 03:11:00','Giovana');
/*!40000 ALTER TABLE `tb_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_endereco_cliente`
--

DROP TABLE IF EXISTS `tb_endereco_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_endereco_cliente` (
  `id_endereco` int unsigned NOT NULL AUTO_INCREMENT,
  `rua_endereco` varchar(80) NOT NULL,
  `num_endereco` int NOT NULL,
  `comp_endereco` varchar(30) DEFAULT NULL,
  `bairro_endereco` varchar(40) NOT NULL,
  `cidade_endereco` varchar(40) NOT NULL,
  `uf_endereco` char(2) NOT NULL,
  `cep_endereco` char(9) NOT NULL,
  `pais_endereco` varchar(50) NOT NULL,
  `tb_cliente_id_cliente` int unsigned NOT NULL,
  PRIMARY KEY (`id_endereco`,`tb_cliente_id_cliente`),
  KEY `fk_tb_endereco_cliente_tb_cliente1_idx` (`tb_cliente_id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_endereco_cliente`
--

LOCK TABLES `tb_endereco_cliente` WRITE;
/*!40000 ALTER TABLE `tb_endereco_cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_endereco_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_fornecedor`
--

DROP TABLE IF EXISTS `tb_fornecedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_fornecedor` (
  `id_fornecedor` int unsigned NOT NULL AUTO_INCREMENT,
  `razao_fornecedor` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `endereco_fornecedor` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `cnpj_fornecedor` char(18) NOT NULL,
  `email_fornecedor` varchar(45) NOT NULL,
  `telefone_fornecedor` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `site_fornecedor` varchar(45) DEFAULT NULL,
  `nome_fantasia_fornecedor` varchar(60) NOT NULL,
  `status_fornecedor` varchar(45) NOT NULL,
  PRIMARY KEY (`id_fornecedor`),
  UNIQUE KEY `nome_fantasia_fornecedor_UNIQUE` (`nome_fantasia_fornecedor`),
  UNIQUE KEY `cnpj_fornecedor_UNIQUE` (`cnpj_fornecedor`),
  UNIQUE KEY `email_fornecedor_UNIQUE` (`email_fornecedor`),
  UNIQUE KEY `site_fornecedor_UNIQUE` (`site_fornecedor`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_fornecedor`
--

LOCK TABLES `tb_fornecedor` WRITE;
/*!40000 ALTER TABLE `tb_fornecedor` DISABLE KEYS */;
INSERT INTO `tb_fornecedor` VALUES (1,'Flávia e Thomas Alimentação Ltda','Céu','99594199000190','qualidade@flaviaethomasalimentacaoltda.com.br','1926769605','starship.html','Starship Restaurante','ativo'),(50,'Laís e Camila Restaurante Ltda',NULL,'57594556000170','financeiro@laisecamilarestauranteltda.com.br','1138248221','www.laisecamilafinanceiraltda.com.br','Restaurante Savvy','ativo'),(55,'Alice e Augusto Pães e Doces ME',NULL,'17587120000130','estoque@aliceeaugustopaesedocesme.com.br','123456788','www.aliceeaugustopaesedocesme.com.br','Flare Restaurante','ativo'),(61,'alelo',NULL,'123456789098765675','tccnavegano2@gmail.com','123456788',NULL,'Pronto','avaliando'),(62,'alelo',NULL,'123456789098765671','tccnavegano4@gmail.com','123456788',NULL,'Feito','avaliando'),(63,'LTDA',NULL,'098909890989098909','restaurante@gmail.com','977908921',NULL,'Cantinho Nordestino','avaliando'),(64,'LTDA',NULL,'098909890989098905','restaurante1@gmail.com','977908921',NULL,'Cantinho Brasileiro','avaliando'),(65,'LTDA',NULL,'098765432123456784','liberal@gmail.com','11989003819',NULL,'Bar Liberal','avaliando'),(66,'LTDA',NULL,'098765432123456787','liberalismo@gmail.com','11989003819',NULL,'Bar da Tijuca','avaliando');
/*!40000 ALTER TABLE `tb_fornecedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_frete`
--

DROP TABLE IF EXISTS `tb_frete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_frete` (
  `uf_frete` char(2) NOT NULL,
  `valor_frete` decimal(5,2) NOT NULL,
  PRIMARY KEY (`uf_frete`),
  UNIQUE KEY `valor_frete_UNIQUE` (`valor_frete`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_frete`
--

LOCK TABLES `tb_frete` WRITE;
/*!40000 ALTER TABLE `tb_frete` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_frete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_guia`
--

DROP TABLE IF EXISTS `tb_guia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_guia` (
  `id_guia` int unsigned NOT NULL AUTO_INCREMENT,
  `data_guia` date NOT NULL,
  `conrteudo_guia` text NOT NULL,
  `autor_guia` varchar(80) DEFAULT NULL,
  `ceo_guia` varchar(45) NOT NULL,
  `titulo_guia` varchar(45) NOT NULL,
  `tb_usuario_adm_id_usuario_adm` int unsigned NOT NULL,
  `tb_categoria_id_categoria` int unsigned NOT NULL,
  PRIMARY KEY (`id_guia`,`tb_usuario_adm_id_usuario_adm`,`tb_categoria_id_categoria`),
  KEY `fk_tb_guia_tb_usuario_adm1_idx` (`tb_usuario_adm_id_usuario_adm`),
  KEY `fk_tb_guia_tb_categoria1_idx` (`tb_categoria_id_categoria`),
  CONSTRAINT `fk_tb_guia_tb_categoria1` FOREIGN KEY (`tb_categoria_id_categoria`) REFERENCES `tb_categoria` (`id_categoria`),
  CONSTRAINT `fk_tb_guia_tb_usuario_adm1` FOREIGN KEY (`tb_usuario_adm_id_usuario_adm`) REFERENCES `tb_usuario_adm` (`id_usuario_adm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_guia`
--

LOCK TABLES `tb_guia` WRITE;
/*!40000 ALTER TABLE `tb_guia` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_guia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_imagem_guia`
--

DROP TABLE IF EXISTS `tb_imagem_guia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_imagem_guia` (
  `id_imagem_guia` int unsigned NOT NULL AUTO_INCREMENT,
  `imagem_guia` varchar(255) NOT NULL,
  `tb_guia_id_guia` int unsigned NOT NULL,
  `tb_guia_tb_usuario_adm_id_usuario_adm` int unsigned NOT NULL,
  `tb_guia_tb_categoria_id_categoria` int unsigned NOT NULL,
  PRIMARY KEY (`id_imagem_guia`,`tb_guia_id_guia`,`tb_guia_tb_usuario_adm_id_usuario_adm`,`tb_guia_tb_categoria_id_categoria`),
  KEY `fk_tb_imagem_guia_tb_guia1_idx` (`tb_guia_id_guia`,`tb_guia_tb_usuario_adm_id_usuario_adm`,`tb_guia_tb_categoria_id_categoria`),
  CONSTRAINT `fk_tb_imagem_guia_tb_guia1` FOREIGN KEY (`tb_guia_id_guia`, `tb_guia_tb_usuario_adm_id_usuario_adm`, `tb_guia_tb_categoria_id_categoria`) REFERENCES `tb_guia` (`id_guia`, `tb_usuario_adm_id_usuario_adm`, `tb_categoria_id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_imagem_guia`
--

LOCK TABLES `tb_imagem_guia` WRITE;
/*!40000 ALTER TABLE `tb_imagem_guia` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_imagem_guia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_imagem_produto`
--

DROP TABLE IF EXISTS `tb_imagem_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_imagem_produto` (
  `id_imagem_produto` int unsigned NOT NULL AUTO_INCREMENT,
  `imagem_produto` varchar(255) NOT NULL,
  `tb_produto_id_produto` int unsigned NOT NULL,
  `tb_produto_tb_categoria_id_categoria` int unsigned NOT NULL,
  `tb_produto_tb_adm_fornecedor_id_adm_fornecedor` int unsigned NOT NULL,
  `tb_produto_tb_adm_fornecedor_tb_fornecedor_id_fornecedor` int unsigned NOT NULL,
  PRIMARY KEY (`id_imagem_produto`,`tb_produto_id_produto`,`tb_produto_tb_categoria_id_categoria`,`tb_produto_tb_adm_fornecedor_id_adm_fornecedor`,`tb_produto_tb_adm_fornecedor_tb_fornecedor_id_fornecedor`),
  KEY `fk_tb_imagem_produto_tb_produto1_idx` (`tb_produto_id_produto`,`tb_produto_tb_categoria_id_categoria`,`tb_produto_tb_adm_fornecedor_id_adm_fornecedor`,`tb_produto_tb_adm_fornecedor_tb_fornecedor_id_fornecedor`),
  CONSTRAINT `fk_tb_imagem_produto_tb_produto1` FOREIGN KEY (`tb_produto_id_produto`, `tb_produto_tb_categoria_id_categoria`, `tb_produto_tb_adm_fornecedor_id_adm_fornecedor`, `tb_produto_tb_adm_fornecedor_tb_fornecedor_id_fornecedor`) REFERENCES `tb_produto` (`id_produto`, `tb_categoria_id_categoria`, `tb_adm_fornecedor_id_adm_fornecedor`, `tb_adm_fornecedor_tb_fornecedor_id_fornecedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_imagem_produto`
--

LOCK TABLES `tb_imagem_produto` WRITE;
/*!40000 ALTER TABLE `tb_imagem_produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_imagem_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_imagem_receitas`
--

DROP TABLE IF EXISTS `tb_imagem_receitas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_imagem_receitas` (
  `id_imagem_receitas` int unsigned NOT NULL AUTO_INCREMENT,
  `imagem_receita` varchar(255) NOT NULL,
  `tb_receitas_id_receitas` int unsigned NOT NULL,
  `tb_receitas_tb_usuario_adm_id_usuario_adm` int unsigned NOT NULL,
  `tb_receitas_tb_categoria_id_categoria` int unsigned NOT NULL,
  PRIMARY KEY (`id_imagem_receitas`,`tb_receitas_id_receitas`,`tb_receitas_tb_usuario_adm_id_usuario_adm`,`tb_receitas_tb_categoria_id_categoria`),
  KEY `fk_tb_imagem_receitas_tb_receitas1_idx` (`tb_receitas_id_receitas`,`tb_receitas_tb_usuario_adm_id_usuario_adm`,`tb_receitas_tb_categoria_id_categoria`),
  CONSTRAINT `fk_tb_imagem_receitas_tb_receitas1` FOREIGN KEY (`tb_receitas_id_receitas`, `tb_receitas_tb_usuario_adm_id_usuario_adm`, `tb_receitas_tb_categoria_id_categoria`) REFERENCES `tb_receitas` (`id_receitas`, `tb_usuario_adm_id_usuario_adm`, `tb_categoria_id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_imagem_receitas`
--

LOCK TABLES `tb_imagem_receitas` WRITE;
/*!40000 ALTER TABLE `tb_imagem_receitas` DISABLE KEYS */;
INSERT INTO `tb_imagem_receitas` VALUES (1,'trivegano/receitas/bolodefuba.jpg',1,2,1),(2,'trivegano/receitas/focacciadetomate.jpg',2,2,1),(3,'trivegano/receitas/wafflessemgluten.jpg',3,2,1),(4,'trivegano/receitas/cracker.jpg',4,2,2);
/*!40000 ALTER TABLE `tb_imagem_receitas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_item_venda`
--

DROP TABLE IF EXISTS `tb_item_venda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_item_venda` (
  `id_item_venda` int unsigned NOT NULL AUTO_INCREMENT,
  `n_item_produto` int NOT NULL,
  `quant_item_produto` int NOT NULL,
  `valor_item_produto` decimal(6,2) NOT NULL,
  `tb_pedido_venda_id_venda` int unsigned NOT NULL,
  `tb_pedido_venda_tb_cliente_id_cliente` int unsigned NOT NULL,
  `tb_produto_id_produto` int unsigned NOT NULL,
  `tb_produto_tb_categoria_id_categoria` int unsigned NOT NULL,
  `tb_produto_tb_adm_fornecedor_id_adm_fornecedor` int unsigned NOT NULL,
  `tb_produto_tb_adm_fornecedor_tb_fornecedor_id_fornecedor` int unsigned NOT NULL,
  `desconto_venda` decimal(7,2) DEFAULT NULL,
  `compra_venda` decimal(7,2) DEFAULT NULL,
  `id_promocao` int DEFAULT NULL,
  PRIMARY KEY (`id_item_venda`,`tb_pedido_venda_id_venda`,`tb_pedido_venda_tb_cliente_id_cliente`,`tb_produto_id_produto`,`tb_produto_tb_categoria_id_categoria`,`tb_produto_tb_adm_fornecedor_id_adm_fornecedor`,`tb_produto_tb_adm_fornecedor_tb_fornecedor_id_fornecedor`),
  KEY `fk_tb_item_venda_tb_pedido_venda1_idx` (`tb_pedido_venda_id_venda`,`tb_pedido_venda_tb_cliente_id_cliente`),
  KEY `fk_tb_item_venda_tb_produto1_idx` (`tb_produto_id_produto`,`tb_produto_tb_categoria_id_categoria`,`tb_produto_tb_adm_fornecedor_id_adm_fornecedor`,`tb_produto_tb_adm_fornecedor_tb_fornecedor_id_fornecedor`),
  CONSTRAINT `fk_tb_item_venda_tb_pedido_venda1` FOREIGN KEY (`tb_pedido_venda_id_venda`, `tb_pedido_venda_tb_cliente_id_cliente`) REFERENCES `tb_pedido_venda` (`id_venda`, `tb_cliente_id_cliente`),
  CONSTRAINT `fk_tb_item_venda_tb_produto1` FOREIGN KEY (`tb_produto_id_produto`, `tb_produto_tb_categoria_id_categoria`, `tb_produto_tb_adm_fornecedor_id_adm_fornecedor`, `tb_produto_tb_adm_fornecedor_tb_fornecedor_id_fornecedor`) REFERENCES `tb_produto` (`id_produto`, `tb_categoria_id_categoria`, `tb_adm_fornecedor_id_adm_fornecedor`, `tb_adm_fornecedor_tb_fornecedor_id_fornecedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_item_venda`
--

LOCK TABLES `tb_item_venda` WRITE;
/*!40000 ALTER TABLE `tb_item_venda` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_item_venda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pedido_venda`
--

DROP TABLE IF EXISTS `tb_pedido_venda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_pedido_venda` (
  `id_venda` int unsigned NOT NULL AUTO_INCREMENT,
  `valor_venda` decimal(7,2) NOT NULL,
  `data_venda` datetime NOT NULL,
  `endereco_venda` varchar(255) NOT NULL,
  `condicao_venda` varchar(8) NOT NULL,
  `desconto_venda` decimal(6,2) DEFAULT NULL,
  `status_venda` varchar(40) NOT NULL,
  `valor_frete_venda` decimal(5,2) NOT NULL,
  `empresa_entrega_venda` varchar(40) NOT NULL,
  `tb_cliente_id_cliente` int unsigned NOT NULL,
  `id_promocao` int DEFAULT NULL,
  PRIMARY KEY (`id_venda`,`tb_cliente_id_cliente`),
  KEY `fk_tb_pedido_venda_tb_cliente1_idx` (`tb_cliente_id_cliente`),
  CONSTRAINT `fk_tb_pedido_venda_tb_cliente1` FOREIGN KEY (`tb_cliente_id_cliente`) REFERENCES `tb_cliente` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pedido_venda`
--

LOCK TABLES `tb_pedido_venda` WRITE;
/*!40000 ALTER TABLE `tb_pedido_venda` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_pedido_venda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_produto`
--

DROP TABLE IF EXISTS `tb_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_produto` (
  `id_produto` int unsigned NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(80) NOT NULL,
  `valor_compra_produto` decimal(7,2) NOT NULL,
  `descricao_produto` text NOT NULL,
  `valor_venda_produto` decimal(7,2) NOT NULL,
  `status_produto` varchar(40) NOT NULL,
  `tb_categoria_id_categoria` int unsigned NOT NULL,
  `tb_adm_fornecedor_id_adm_fornecedor` int unsigned NOT NULL,
  `tb_adm_fornecedor_tb_fornecedor_id_fornecedor` int unsigned NOT NULL,
  `desconto_compra` decimal(7,2) DEFAULT NULL,
  PRIMARY KEY (`id_produto`,`tb_categoria_id_categoria`,`tb_adm_fornecedor_id_adm_fornecedor`,`tb_adm_fornecedor_tb_fornecedor_id_fornecedor`),
  KEY `fk_tb_produto_tb_categoria1_idx` (`tb_categoria_id_categoria`),
  KEY `fk_tb_produto_tb_adm_fornecedor1_idx` (`tb_adm_fornecedor_id_adm_fornecedor`,`tb_adm_fornecedor_tb_fornecedor_id_fornecedor`),
  CONSTRAINT `fk_tb_produto_tb_adm_fornecedor1` FOREIGN KEY (`tb_adm_fornecedor_id_adm_fornecedor`, `tb_adm_fornecedor_tb_fornecedor_id_fornecedor`) REFERENCES `tb_adm_fornecedor` (`id_adm_fornecedor`, `tb_fornecedor_id_fornecedor`),
  CONSTRAINT `fk_tb_produto_tb_categoria1` FOREIGN KEY (`tb_categoria_id_categoria`) REFERENCES `tb_categoria` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_produto`
--

LOCK TABLES `tb_produto` WRITE;
/*!40000 ALTER TABLE `tb_produto` DISABLE KEYS */;
INSERT INTO `tb_produto` VALUES (1,'Pop Burguer',10.00,'Simples e delicioso. Molho especial, um disco de carne 2.0 e cheddar.\n\nContém soja e glúten. Peso Aproximado: 150g.',15.00,'ativo',8,1,1,NULL),(2,'X-Burguer',14.00,'Maionese, dois discos de carne 2.0, queijo cremoso, ketchup e mostarda.\n\nContém soja e glúten. Peso aproximado: 240g.',18.00,'ativo',8,1,1,NULL),(3,'Melt Burguer',15.00,'Cebola chapeada no shoyu, dois discos de carne 2.0 e duas camadas de queijo cheddar.\n\nContém soja e glúten. Peso aproximado: 225g.',17.50,'ativo',8,1,1,NULL),(4,'X-Salada',17.00,'Alface, tomate, cebola roxa, maionese, dois discos de carne 2.0, queijo cremoso, ketchup, mostarda e cheddar.',20.00,'ativo',8,1,1,NULL),(5,'Suco Natural',6.00,'Fruta classica escolida por você.\n300ml.',6.50,'ativo',5,1,1,NULL),(6,'Coca Cola',5.00,'350ml',5.50,'ativo',5,1,1,NULL);
/*!40000 ALTER TABLE `tb_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_promocao`
--

DROP TABLE IF EXISTS `tb_promocao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_promocao` (
  `id_promocao` int unsigned NOT NULL AUTO_INCREMENT,
  `token_promocao` varchar(8) NOT NULL,
  `validade_promocao` date DEFAULT NULL,
  `valor_promocao` decimal(6,2) DEFAULT NULL,
  `status_promocao` varchar(40) NOT NULL,
  `responsavel` varchar(45) NOT NULL,
  `id_usuario_adm` int DEFAULT NULL,
  `id_adm_fornecedor` int DEFAULT NULL,
  `id_fornecedor` int DEFAULT NULL,
  `id_produto` int DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `porcentagem_promocao` int DEFAULT NULL,
  `id_categoria` int DEFAULT NULL,
  `imagem_anuncio` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_promocao`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_promocao`
--

LOCK TABLES `tb_promocao` WRITE;
/*!40000 ALTER TABLE `tb_promocao` DISABLE KEYS */;
INSERT INTO `tb_promocao` VALUES (1,'FIRST','2030-12-25',15.00,'ativo','usuario_adm',2,NULL,NULL,NULL,'Promoção para primeira compra do cliente.',NULL,NULL,NULL),(2,'VERAO_ST','2022-11-13',NULL,'ativo','adm_fornecedor',NULL,1,1,NULL,'Todos os hamburguers com desconto no verão.',5,8,NULL),(3,'ACIMA50',NULL,NULL,'ativo','usuario_adm',2,NULL,NULL,NULL,'Em uma compra de mais de 50,00 reais ganhe 5% de desconto',5,NULL,NULL),(4,'ACIMA4',NULL,NULL,'ativo','adm_fornecedor',NULL,1,1,NULL,'Comprando mais de 4 hamburguers ganhe 5% de desconto',5,8,NULL);
/*!40000 ALTER TABLE `tb_promocao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_receitas`
--

DROP TABLE IF EXISTS `tb_receitas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_receitas` (
  `id_receitas` int unsigned NOT NULL AUTO_INCREMENT,
  `titulo_receita` varchar(45) NOT NULL,
  `descricao_receita` text NOT NULL,
  `tb_usuario_adm_id_usuario_adm` int unsigned NOT NULL,
  `tb_categoria_id_categoria` int unsigned NOT NULL,
  `ceo_receita` varchar(45) NOT NULL,
  `data_receita` date NOT NULL,
  `categoria_dieta_receita` varchar(45) NOT NULL,
  `ingredientes_receita` text,
  PRIMARY KEY (`id_receitas`,`tb_usuario_adm_id_usuario_adm`,`tb_categoria_id_categoria`),
  KEY `fk_tb_receitas_tb_usuario_adm1_idx` (`tb_usuario_adm_id_usuario_adm`),
  KEY `fk_tb_receitas_tb_categoria1_idx` (`tb_categoria_id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_receitas`
--

LOCK TABLES `tb_receitas` WRITE;
/*!40000 ALTER TABLE `tb_receitas` DISABLE KEYS */;
INSERT INTO `tb_receitas` VALUES (1,'Bolo de Fubá','1- Preaqueça o forno a 180°C. Unte uma fôrma de bolo (usei uma de pudim com 20 cm de diâmetro) com óleo e polvilhe fubá para a massa não grudar.\n2- Bata no liquidificador o açúcar demerara para ficar mais fino. Isso irá facilitar na hora de misturar os ingredientes secos com os molhados.\n3- Em um recipiente grande misture o fubá, a farinha de trigo, o açúcar e o fermento.\n4- Adicione o leite de coco e o óleo aos poucos para não formar grumos.\n5- Transfira a massa para a fôrma preparada e asse por cerca de 40 minutos, ou até que um palito saia limpo ao ser inserido no centro do bolo.\n6- Espere esfriar e desenforme.',2,1,'#receita #bolo #vegano #trivegano','2022-07-24','vegan','Farinha de trigo branca – 1 xíc. e 1/2 = 210 g\nFubá orgânico Monama- 1 xíc. = 140 g\nAçúcar demerara – 3/4 xíc. = 165 g\nLeite de coco (ou outro leite vegetal) – 1 xíc. e 1/3 – 330 ml\nÓleo de coco derretido (ou outro óleo vegetal) – 1/3 xíc. = 80 ml\nFermento químico em pó – 1 colher de sopa'),(2,'Focaccia com Tomate Cereja','Reúna todos os ingredientes;\nEm um recipiente, adicione a farinha, o sal e misture. Em seguida, acrescente 1 colher de chá de azeite e não mecha;\nEm outro recipiente, coloque a água e o fermento, mas não misture;\nDespeje a água com fermento na farinha com azeite e misture bem até formar uma massa. Sove a massa, com as mãos, por cerca de 10 minutos;\nTransfira para uma tigela, tampe com um pano e deixe descansar por 40 minutos;\nColoque a massa em uma forma untada e polvilhada com fubá, preenchendo todo o espaço;\nFaça vários furinhos na massa com o dedo, despeje um pouco de azeite por cima e adicione os tomates-cerejas nos buraquinhos;\nSalpique a flor de sal e cubra ela com um pano úmido (em contato com a massa) e deixe descansar por 45 minutos ou até ela crescer e alargar;\nRetire o pano, pincele a gema e leve ao forno preaquecido a 200 ºC por cerca de 45 a 55 minutos;\nAgora é só servir.',2,1,'#focaccia #receitas #vegano #trivegano','2022-07-24','vegan','500 gramas de farinha de trigo\n1 colher de sobremesa de sal\nAzeite a gosto\n325ml de água filtrada\n2 colheres de chá de fermento biológico seco\nFubá para untar\nTomate-cereja a gosto\nFlor de sal a gosto\n1 gema misturada com 1 colher de sopa de água (opcional)'),(3,'Waffles Sem Glutén','1- Em um recipiente coloque todos os ingredientes secos, misture até ficar homogêneo.\n2- Adicione os ingredientes molhados e misture bem até incorporar. Se o óleo de coco estiver sólido, esquente por alguns segundos no micro-ondas ou em banho maria até derreter.\n3- Preaqueça a máquina de waffles e unte com um pouco de óleo.\n4- Despeja a massa e espalhe até cobrir o molde do aparelho. Feche a tampa e deixe assar até a massa ficar dourada.\n5- Sirva imediatamente enquanto estão quentinhos com a cobertura desejada.\n\nDICAS: Para manter os waffles aquecidos enquanto você estiver preparando os demais, armazene no forno preaquecido a 160ºC.\n\nNOTA: Se você não quiser waffles sem glúten, é possível substituir a mistura de farinha sem glúten pela farinha de trigo – 1 xíc. de farinha de trigo branca e 1/2 xíc. de farinha de trigo integral.\n\nEssa receita rendeu 5 waffles de 12 cm² cada.',2,1,'#waffles #vegano #trivegano','2022-07-24','vegan','Mistura de farinha sem glúten (receita aqui – ver NOTA) – 1 xíc. e 1/2 = 225g\nIogurte de arroz, amêndoas ou coco Vida Veg – 1 xíc. = 250ml\nAçúcar mascavo – 1/4 xíc. = 35g\nÓleo de coco derretido (ou outro óleo vegetal) – 1/4 xíc = 60ml\nFermento – 1 colher de chá'),(4,'Cracker Salgado','1- Preaqueça o forno a 200ºC.\n2- Em uma tigela coloque todos os ingredientes secos e misture. Adicione o azeite e a água lentamente até formar uma bola de massa. Misture e amasse com a mão.\n3- Coloque a massa sobre uma folha de papel manteiga e pressione com os dedos para espalhar. Coloque outra folha de papel manteiga em cima da massa e usando um rolo abra a massa finamente. Quanto mais fina a massa ficar, mais leve e crocante serão os crackers.\n4- Retire a camada superior de papel manteiga e corte os crackers do tamanho que preferir.\n5- Transfira para uma assadeira coberta com papel manteiga (usei duas assadeiras e o mesmo papel que abri a massa) e leve ao forno preaquecido por cerca de 20 minutos, ou até que os crackers estejam com as bordas douradas. CUIDADO: depois de dourar as bordas eles queimam com facilidade, fique de olho após 15 minutos no forno.\n\nEssa receita rende um pote de 500 ml cheio.',2,2,'#cracker #vegano #trivegano','2022-07-24','vegan','Farinha de grão de bico – 2 xícaras = 260g\nÁgua – 7 colheres de sopa = 105 ml\nAzeite (ou óleo vegetal) – 1/4 xícara = 60 ml\nGergelim preto (ou branco) – 2 colheres de sopa = 15 g (opcional)\nPáprica doce – 2 colheres de chá\nFermento químico – 1 colher de chá\nSal – 1 colher e 1/2 de chá');
/*!40000 ALTER TABLE `tb_receitas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_usuario_adm`
--

DROP TABLE IF EXISTS `tb_usuario_adm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_usuario_adm` (
  `id_usuario_adm` int unsigned NOT NULL AUTO_INCREMENT,
  `nome_usuario_adm` varchar(60) NOT NULL,
  `senha_usuario_adm` varchar(20) NOT NULL,
  `status_usuario_adm` varchar(40) NOT NULL,
  `email_usuario_adm` varchar(60) NOT NULL,
  PRIMARY KEY (`id_usuario_adm`),
  UNIQUE KEY `email_usuario_adm_UNIQUE` (`email_usuario_adm`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_usuario_adm`
--

LOCK TABLES `tb_usuario_adm` WRITE;
/*!40000 ALTER TABLE `tb_usuario_adm` DISABLE KEYS */;
INSERT INTO `tb_usuario_adm` VALUES (2,'Geovana','1307','ativo','geovanapederneschi@gmail.com');
/*!40000 ALTER TABLE `tb_usuario_adm` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-28 23:49:21
