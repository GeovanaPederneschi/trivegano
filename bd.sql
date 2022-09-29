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
  `imagem` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_categoria`
--

LOCK TABLES `tb_categoria` WRITE;
/*!40000 ALTER TABLE `tb_categoria` DISABLE KEYS */;
INSERT INTO `tb_categoria` VALUES (1,'doce','receita',NULL),(2,'salgado','receita',NULL),(3,'pizza','produto','pizza.jfif'),(4,'refeição','produto','refeicao.jfif'),(5,'bebida','produto','bebida.jfif'),(6,'sobremesa','produto','sobremesa.jfif'),(7,'bebida','receita',NULL),(8,'burguer','produto','burguer.jfif'),(9,'entrada','produto','entrada.jpg');
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
  `logo` varchar(45) DEFAULT NULL,
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
INSERT INTO `tb_fornecedor` VALUES (1,'Flávia e Thomas Alimentação Ltda','Céu','99594199000190','qualidade@flaviaethomasalimentacaoltda.com.br','1926769605','starship.html','Starship Restaurante','ativo','logo5.jfif'),(50,'Laís e Camila Restaurante Ltda',NULL,'57594556000170','financeiro@laisecamilarestauranteltda.com.br','1138248221','www.laisecamilafinanceiraltda.com.br','Restaurante Savvy','ativo','logo5.jfif'),(55,'Alice e Augusto Pães e Doces ME',NULL,'17587120000130','estoque@aliceeaugustopaesedocesme.com.br','123456788','www.aliceeaugustopaesedocesme.com.br','Flare Restaurante','ativo','logo5.jfif'),(61,'alelo',NULL,'123456789098765675','tccnavegano2@gmail.com','123456788',NULL,'Pronto','avaliando','logo5.jfif'),(62,'alelo',NULL,'123456789098765671','tccnavegano4@gmail.com','123456788',NULL,'Feito','avaliando','logo5.jfif'),(63,'LTDA',NULL,'098909890989098909','restaurante@gmail.com','977908921',NULL,'Cantinho Nordestino','avaliando','logo5.jfif'),(64,'LTDA',NULL,'098909890989098905','restaurante1@gmail.com','977908921',NULL,'Cantinho Brasileiro','avaliando','logo5.jfif'),(65,'LTDA',NULL,'098765432123456784','liberal@gmail.com','11989003819',NULL,'Bar Liberal','avaliando','logo5.jfif'),(66,'LTDA',NULL,'098765432123456787','liberalismo@gmail.com','11989003819',NULL,'Bar da Tijuca','avaliando','logo5.jfif');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_imagem_produto`
--

LOCK TABLES `tb_imagem_produto` WRITE;
/*!40000 ALTER TABLE `tb_imagem_produto` DISABLE KEYS */;
INSERT INTO `tb_imagem_produto` VALUES (1,'prato.jfif',1,8,1,1),(2,'prato.jfif',2,8,1,1),(3,'prato.jfif',3,8,1,1),(4,'prato.jfif',4,8,1,1),(5,'prato.jfif',5,5,1,1),(6,'prato.jfif',6,5,1,1),(7,'prato1.jfif',1,8,1,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_imagem_receitas`
--

LOCK TABLES `tb_imagem_receitas` WRITE;
/*!40000 ALTER TABLE `tb_imagem_receitas` DISABLE KEYS */;
INSERT INTO `tb_imagem_receitas` VALUES (1,'trivegano/receitas/bolodefuba.jpg',1,2,1),(2,'trivegano/receitas/focacciadetomate.jpg',2,2,1),(3,'trivegano/receitas/wafflessemgluten.jpg',3,2,1),(4,'trivegano/receitas/cracker.jpg',4,2,2),(5,'trivegano/receitas/pão.jpg',5,3,2),(6,'trivegano/receitas/tapiocadoce.jpg',6,3,1),(7,'trivegano/receitas/miniaboboras.jpg',7,3,2),(10,'trivegano/receitas/tofuempanado.jpg',8,3,2),(11,'trivegano/receitas/salada.jpg',9,3,10),(12,'trivegano/receitas/lasanhadeabobrinha.jpg',11,3,2),(18,'trivegano/receitas/tabule.jpg\n',10,3,10),(19,'trivegano/receitas/nhoquedeabobora.jpg',12,3,2),(20,'trivegano/receitas/browniecastanha.jpg',15,3,1),(21,'trivegano/receitas/cookiesaveia.jpg',16,3,1),(22,'trivegano/receitas/pudim.jpg',18,3,1),(23,'trivegano/receitas/pãodebanana.jpg',20,3,1),(25,'trivegano/receitas/granola.jpg',21,3,1),(26,'trivegano/receitas/strogonoffberinjela.jpg',25,3,2),(27,'trivegano/receitas/bolinhainhame.jpg',27,3,2),(28,'trivegano/receitas/esfihaespinafre.jpg',28,3,2),(29,'trivegano/receitas/batataaomurro.jpg',30,3,2),(30,'trivegano/receitas/pizzademandioca.jpg',31,3,2),(31,'trivegano/receitas/doceabobora.jpg',32,3,1),(32,'trivegano/receitas/tortasorvetemorango.jpg',33,3,1),(33,'trivegano/receitas/cupcakecoco.jpg',34,3,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_receitas`
--

LOCK TABLES `tb_receitas` WRITE;
/*!40000 ALTER TABLE `tb_receitas` DISABLE KEYS */;
INSERT INTO `tb_receitas` VALUES (1,'Bolo de Fubá','1- Preaqueça o forno a 180°C. Unte uma fôrma de bolo (usei uma de pudim com 20 cm de diâmetro) com óleo e polvilhe fubá para a massa não grudar.\n2- Bata no liquidificador o açúcar demerara para ficar mais fino. Isso irá facilitar na hora de misturar os ingredientes secos com os molhados.\n3- Em um recipiente grande misture o fubá, a farinha de trigo, o açúcar e o fermento.\n4- Adicione o leite de coco e o óleo aos poucos para não formar grumos.\n5- Transfira a massa para a fôrma preparada e asse por cerca de 40 minutos, ou até que um palito saia limpo ao ser inserido no centro do bolo.\n6- Espere esfriar e desenforme.',2,1,'#receita #bolo #vegano #trivegano','2022-07-24','vegan','Farinha de trigo branca – 1 xíc. e 1/2 = 210 g\nFubá orgânico Monama- 1 xíc. = 140 g\nAçúcar demerara – 3/4 xíc. = 165 g\nLeite de coco (ou outro leite vegetal) – 1 xíc. e 1/3 – 330 ml\nÓleo de coco derretido (ou outro óleo vegetal) – 1/3 xíc. = 80 ml\nFermento químico em pó – 1 colher de sopa'),(2,'Focaccia com Tomate Cereja','Reúna todos os ingredientes;\nEm um recipiente, adicione a farinha, o sal e misture. Em seguida, acrescente 1 colher de chá de azeite e não mecha;\nEm outro recipiente, coloque a água e o fermento, mas não misture;\nDespeje a água com fermento na farinha com azeite e misture bem até formar uma massa. Sove a massa, com as mãos, por cerca de 10 minutos;\nTransfira para uma tigela, tampe com um pano e deixe descansar por 40 minutos;\nColoque a massa em uma forma untada e polvilhada com fubá, preenchendo todo o espaço;\nFaça vários furinhos na massa com o dedo, despeje um pouco de azeite por cima e adicione os tomates-cerejas nos buraquinhos;\nSalpique a flor de sal e cubra ela com um pano úmido (em contato com a massa) e deixe descansar por 45 minutos ou até ela crescer e alargar;\nRetire o pano, pincele a gema e leve ao forno preaquecido a 200 ºC por cerca de 45 a 55 minutos;\nAgora é só servir.',2,1,'#focaccia #receitas #vegano #trivegano','2022-07-24','vegan','500 gramas de farinha de trigo\n1 colher de sobremesa de sal\nAzeite a gosto\n325ml de água filtrada\n2 colheres de chá de fermento biológico seco\nFubá para untar\nTomate-cereja a gosto\nFlor de sal a gosto\n1 gema misturada com 1 colher de sopa de água (opcional)'),(3,'Waffles Sem Glutén','1- Em um recipiente coloque todos os ingredientes secos, misture até ficar homogêneo.\n2- Adicione os ingredientes molhados e misture bem até incorporar. Se o óleo de coco estiver sólido, esquente por alguns segundos no micro-ondas ou em banho maria até derreter.\n3- Preaqueça a máquina de waffles e unte com um pouco de óleo.\n4- Despeja a massa e espalhe até cobrir o molde do aparelho. Feche a tampa e deixe assar até a massa ficar dourada.\n5- Sirva imediatamente enquanto estão quentinhos com a cobertura desejada.\n\nDICAS: Para manter os waffles aquecidos enquanto você estiver preparando os demais, armazene no forno preaquecido a 160ºC.\n\nNOTA: Se você não quiser waffles sem glúten, é possível substituir a mistura de farinha sem glúten pela farinha de trigo – 1 xíc. de farinha de trigo branca e 1/2 xíc. de farinha de trigo integral.\n\nEssa receita rendeu 5 waffles de 12 cm² cada.',2,1,'#waffles #vegano #trivegano','2022-07-24','vegan','Mistura de farinha sem glúten (receita aqui – ver NOTA) – 1 xíc. e 1/2 = 225g\nIogurte de arroz, amêndoas ou coco Vida Veg – 1 xíc. = 250ml\nAçúcar mascavo – 1/4 xíc. = 35g\nÓleo de coco derretido (ou outro óleo vegetal) – 1/4 xíc = 60ml\nFermento – 1 colher de chá'),(4,'Cracker Salgado','1- Preaqueça o forno a 200ºC.\n2- Em uma tigela coloque todos os ingredientes secos e misture. Adicione o azeite e a água lentamente até formar uma bola de massa. Misture e amasse com a mão.\n3- Coloque a massa sobre uma folha de papel manteiga e pressione com os dedos para espalhar. Coloque outra folha de papel manteiga em cima da massa e usando um rolo abra a massa finamente. Quanto mais fina a massa ficar, mais leve e crocante serão os crackers.\n4- Retire a camada superior de papel manteiga e corte os crackers do tamanho que preferir.\n5- Transfira para uma assadeira coberta com papel manteiga (usei duas assadeiras e o mesmo papel que abri a massa) e leve ao forno preaquecido por cerca de 20 minutos, ou até que os crackers estejam com as bordas douradas. CUIDADO: depois de dourar as bordas eles queimam com facilidade, fique de olho após 15 minutos no forno.\n\nEssa receita rende um pote de 500 ml cheio.',2,2,'#cracker #vegano #trivegano','2022-07-24','vegan','Farinha de grão de bico – 2 xícaras = 260g\nÁgua – 7 colheres de sopa = 105 ml\nAzeite (ou óleo vegetal) – 1/4 xícara = 60 ml\nGergelim preto (ou branco) – 2 colheres de sopa = 15 g (opcional)\nPáprica doce – 2 colheres de chá\nFermento químico – 1 colher de chá\nSal – 1 colher e 1/2 de chá'),(5,'Pão sem glúten','Modo de Preparo:\nEm uma tigela adicione a farinha de arroz, fécula de mandioca, sal, açúcar, vinagre, óleo e fermento. Misture tudo até ficar homogêneo;\nColoque no liquidificador o inhame ralado e a água morna. Triture bem até ficar cremoso;\nAdicione o creme de inhame aos demais ingredientes. Misture tudo por cerca de 3 minutos até a massa ficar homogênea. Ela irá ficar mole e grudenta;\nUnte uma fôrma de pão (usei uma com 24cm x 10cm) com óleo. Despeja a massa e distribua uniformemente. Espalhe as sementes escolhidas sobre o pão (opcional);\nDeixe o pão descansar em algum lugar quentinho por 30 minutos para crescer;\nLeve ao forno preaquecido a 200ºC por cerca de 40 minutos, ou até o pão ficar dourado;\nCom cuidado retire o pão da fôrma e deixe esfriar;\nDepois de frio, embrulhe em um pano de prato e guarde em local fresco e seco por até 5 dias.\nDica: Como é possível ver nas fotos, a parte de cima do pão não está tão dourada quanto dos lados. Para deixar dourado em cima espalhe um fio de óleo vegetal por cima antes de assar.\n',3,2,'#receita #pão #vegetariano','2022-08-08','vegan','Ingredientes:\n2 xíc. de farinha de arroz\n1 xíc. de inhame cru ralado\n1 xíc. de fécula de mandioca/polvilho doce ou fécula de batata\n1 xíc. de água morna\n1 colher de chá de sal\n1 colher de chá de açúcar mascavo\n1 colher de chá de vinagre de maçã\n10g de fermento biológico\n2 colheres de sopa de óleo vegetal\n2 colheres de sopa de sementes (opcional) usei sementes de abóbora e girassol\n'),(6,'Tapioca Doce','Modo de preparo:\nGoma de tapioca:\n1- Coloque a quantidade que desejar de polvilho doce em uma tigela e adicione um pouco de água e uma pitada de sal, misture bem até ficar no ponto enfarinhado. Quando você colocar água no polvilho ele irá endurecer, mas isso é normal, deve-se ir quebrando em blocos menores com as mãos. A quantidade de água varia de acordo com a quantidade de polvilho usado, o objetivo de usá-la é para hidratar e não encharcar, então cuidado com a quantidade.\n \nA tapioca em si:\n2- Aqueça uma frigideira em fogo médio e espalhe a goma de tapioca passando por uma peneira até preencher o fundo da frigideira com uma camada da espessura que preferir. Tampe a frigideira e deixe por alguns minutos.\n3- A tapioca estará no ponto quando você mexe a frigideira e ela se desgrudar, quando ocorrer isso vire-a com ajuda de uma espátula e recheie a gosto. Eu prefiro fazer do jeito tradicional, que é colocar o recheio em metade da tapioca e dobrar ela, como nas fotos, mas se você quiser espalhar o recheio por toda ela e deixar aberto fique a vontade.\n',3,1,'#receita #vegetariana #tapioca','2022-08-08','vegan','Ingredientes:\nPara a massa:\nPolvilho doce\nPitada de sal\nÁgua\nRecheio opcional\n'),(7,'Mini-Abóboras Recheadas','Modo de preparo:\nLave e seque bem as mini abóboras. Corte uma tampa na parte do caule e com uma colher pequena, retire as sementes.\nTempere o interior com sal e pimenta em pó. Feche as mini abóboras com a tampa e embrulhe-as com papel manteiga.\nTransfira para uma assadeira e leve ao forno preaquecido a 200º por cerca de 30 minutos, ou até ficarem macias.\nEnquanto as mini abóboras estão assando, prepare o recheio. Em uma panela cozinhe a quinoa com água e sal até ficar macia ou ao dente (depende do seu gosto).\nEscorra a água e adicione as azeitonas e a cebolinha picada.\nEm uma frigideira aqueça o óleo vegetal e doure o alho.\nTransfira para a panela com a quinoa e misture até ficar homogêneo. Experimente e ajuste os temperos de acordo com o seu paladar.\nRetire as mini abóboras do forno e desembrulhe-as. Recheie com a quinoa e leve de volta ao forno por cerca de 5 minutos sem o papel manteiga.\nRetire do forno e sirva logo em seguida.\n',3,2,'#entrada #vegan #receita','2022-08-08','vegan','Ingredientes:\nAbóboras Mini Jack – 4 unidades = 480g aprox.\nQuinoa em grãos – 1/4 xícara = 60g aprox.\nAzeitonas picadas sem caroço – 6 unidades\nDente de alho picado – 1 unidade\nÓleo vegetal – o suficiente para dourar o alho\nSal, cebolinha e pimenta em pó a gosto\n'),(8,'Tofu Empanado','Modo de preparo:\nComece preparando a marinada. Coloque todos os ingredientes num recipiente e misture bem;\nTire o excesso de água do tofu com um pano limpo e seco (assim ele absorve melhor a marinada). Corte em cubinhos de mais ou menos 2 cm. Quanto menor for, mais em contato com a marinada irá ficar, e assim mais saboroso;\nColoque os cubinhos de tofu numa tigela. Despeja a marinada sobre eles e misture para envolver todos;\nCubra a tigela com um pano limpo ou filme de PVC e deixe marinar em temperatura ambiente por 30 minutos. Essa marinada pode ser preparada na véspera e conservada na geladeira, o sabor fica mais forte;\nColoque um pouco de farinha num prato e passe os cubinhos, um a um. Não retire o líquido da marinada que envolve eles;\nAgora existem duas opções de preparo, fritar ou assar:\n\n\nFRITAR: aqueça o óleo numa panela pequena. Coloque os cubinhos no óleo e deixe fritar por cerca de 1 a 2 minutos até dourarem levemente. Evite fritar todos de uma vez, e ao colocar no óleo evite mexer muito eles senão a farinha irá desgrudar do tofu. Depois de fritos, coloque-os sobre um papel toalha para tirar o excesso de gordura. Consuma logo em seguida.\nASSAR: unte uma fôrma com óleo. Espalhe os cubinhos sobre a fôrma sem encostar ou sobrepor um no outro para assarem por inteiro. Leve ao forno preaquecido a 200 °C por cerca de 15 minutos ou até dourarem levemente. Consuma logo em seguida.\n',3,2,'#receita #vegan #entrada','2022-08-08','vegan','Ingredientes:\nPara a marinada:\n2 colheres de sopa de óleo de gergelim tostado ou azeite de oliva\n2 colheres de sopa de mostarda\n3 colheres de sopa de água\n2 dentes de alho picados\n2 colheres de chá de ervas secas a gosto (usei orégano)\n1 colher de chá de sal\n \nPara o tofu empanado:\n250g de tofu firme\nFarinha de trigo (integral ou branco), farinha de rosca ou farinha de painço o suficiente para empanar\nÓleo vegetal para fritar (caso for assar não precisa)\n \n'),(9,'Salada de Grão de Bico','Modo de preparo:\n1- Em um recipiente grande adicione todos os ingredientes;\n2- Misture tudo e experimente, corrija o tempero se necessário, acrescentando mais sal, suco de limão ou salsinha;\n3- Leve a geladeira por pelo menos uma hora para os grãos absorverem bem os temperos;\n4- Sirva acompanhado de azeite de oliva (opcional).\n \nNota: Essa salada dura em média de 3 dias na geladeira se mantida num pote fechado.\n',3,10,'#salada #vegetariano #receita','2022-08-08','vegan','Ingredientes:\n1 xícara e 1/2 de grão de bico cozido\n1/2 xícara de tomate picado (não tirei a casca e as sementes)\n1/4 xícara de cebola picada em cubinhos\nSalsinha a gosto (utilizei 3 colheres de sopa de salsinha picada)\n1 colher de sopa de suco de limão\n1 /2 colher de chá de sal\n'),(10,'Tabule de Caprese','Modo de preparo:\nHidrate o trigo em água filtrada por uma hora. Escorra, espremendo bem para sair todo o líquido e reserve. Corte os tomatinhos, o queijo e as folhas de manjericão e acrescente o trigo. Misture tudo, tempere com sal, limão e azeite, e preencha as conchas de folha de alface.\n',3,10,'#salada #vegetariano #receita','2022-08-08','vegan','Ingredientes:\n1 alface americana\n1 xícara de trigo pra quibe\n150g de tomatinhos\n150g de muçarela de Búfala\nManjericão\nSal\nAzeite\nLimão\n'),(11,'Lasanha de Abobrinha','Modo de preparo:\nCorte a abobrinha e os tomates em fatias finas no sentido horizontal, não precisar descascar os legumes. Para ter mais controle no corte das fatias da abobrinha, você pode cortar ela ao meio, sentido vertical, antes de fatiar;\nEm travessa (usei uma de 25cmx16cm) monte a lasanha. Comece com uma camada de abobrinha, depois com uma de tomate, de “cream cheese” de castanha e de molho pesto. Repita até terminar os ingredientes, ou até a altura/quantidade de lasanha desejado. Não precisa seguir essa ordem de camadas, varie do jeito que preferir;\nFinalize a lasanha com folhas de manjericão (opcional), sal e pimenta do reino (opcional) por cima.\n \nDica: Se você não quiser as fatias de abobrinha crocante, você pode marinar elas para que fiquem bem macias e suculentas. Para isso, deixe as fatias de molho por 1 hora na geladeira numa mistura de suco de meio limão, 1/4 de xícara de azeite de oliva e sal a gosto. Depois, retire as fatias da marinada e seque-as com pano para tirar o excesso de água, utilize normalmente na receita.\n',3,2,'#salada #vegetariano #receita','2022-08-08','vegan','Ingredientes:\n1 abobrinha italiana grande\n2 tomates médios\n1/2 xícara de “cream cheese” de castanha\nMolho pesto a gosto\nSal e pimenta do reino (opcional) a gosto\n \n'),(12,'Nhoque de Abóbora','Modo de preparo:\nPreaqueça o forno a 230 °C.\nRetire as sementes da abóbora com uma colher e envolva com papel manteiga ou alumínio.\nLeve ao forno preaquecido por cerca de 40 minutos ou até a polpa estiver macia.\nRetire do forno e, ainda quente, tire toda a polpa e transfira para um recipiente. Amasse bem com um garfo até formar um purê homogêneo, sem pedacinhos de abóbora. Reserve até esfriar.\nAdicione o fubá, a fécula de batata, o azeite de oliva, metade do sal e a pimenta do reino. Misture bem até obter uma bola de massa lisa e firme. Se necessário, adicione mais fubá.\nPolvilhe uma superfície lisa com um pouco de fubá e faça rolinhos com pequenas porções da massa. Corte em pedaços de aproximadamente 2 cm e reserve.\nLeve uma panela grande com água ao fogo alto. Assim que ferver adicione o restante do sal.\nCom o auxílio de uma escumadeira, mergulhe cerca de 10 nhoques por vez na água fervente. Deixe cozinhar até subirem à superfície. Retire os nhoques, escorrendo bem a água, e transfira para um recipiente. Adicione um fio de azeite enquanto ainda estão quentes e chacoalhe o recipiente até todos os nhoques estiverem envolvidos, assim eles não grudam um nos outros. Repita esse processo até cozinhar todos.\nSirva ainda quente com molho de tomate ou pesto de manjericão como na foto.\n \nEsta receita rende 3 porções.\n',3,2,'#receita #salgada #vegetariano','2022-08-08','vegan','Ingredientes:\nAbóbora japonesa/cabotiá – metade de uma grande (1 kg)\nFubá fino (ou farinha de trigo branca) – 1 xícara (140 g) + um pouco para modelar\nFécula de batata – 1/2 xícara (70 g)\nAzeite de oliva – 3 colheres de sopa (45 ml)\nSal – 2 colheres de chá (10 g)\nPimenta do reino – a gosto (opcional)\n'),(13,'Farofa de Proteína de Soja','Modo de preparo:\nMisture a PTS e o creme de cebola em uma vasilha de alumínio ou vidro, e reserve.\nEsquente o óleo em uma panela, até ele ficar no ponto de fritura, caso queira fazer um teste jogue um pedacinho de PTS no óleo pra ver se ele frita, se sim, desligue o óleo. Tome cuidado para este não ficar quente demais, a ponto de queimar a mistura.\nDespeje o óleo quente na mistura, para que o creme de cebola juntamente com a PTS frita.\nAcrescente a farinha biju e o cheiro verde e pronto. \n',3,2,'#acompanhamento #receita #vegetariano','2022-08-08','vegan','Ingredientes:\n1 xícara de proteína texturizada de soja (PTS) média\n1/2 xícara de óleo (milho, canola, girassol)\n1 pacote de creme de cebola\n2 xícaras de farinha biju (pode ser farinha de milho em flocos também)\n6 colheres de cheiro verde (salsinha e cebolinha) picado\n'),(14,'Quibe Assado de Berinjela','Modo de preparo:\nPré-aqueça o forno a 210ºC. Corte uma berinjela grande ao meio, no sentido do comprimento e faça cortes cruzados sobre sua superfície, formando losangos. Deixe estas metades da berinjela de molho em um litro de água com 1 colher de sopa de vinagre por 15 minutos.\nColoque estas metades da berinjela em uma assadeira forrada com papel manteiga, juntamente com 3 dentes de alho grandes, regue com cerca de 2 colheres de sopa de azeite, tempere com sal e pimenta do reino a gosto e leve para assar por 30 minutos ou até a polpa estiver macia.\nColoque o trigo para quibe em uma vasilha, adicione a água fervente, misture e deixe hidratando até a água secar totalmente, o que vai levar cerca de 15 minutos.\nRetire a assadeira do forno e espere esfriar um pouco. Raspe toda a polpa da casca com o auxílio de uma colher e coloque em uma vasilha. Adicione os alhos assados picados, a cebola picada, o tahine, o limão, o cheiro verde, a hortelã e misture. Adicione o trigo hidratado e misture novamente. Tempere com mais sal, misture e coloque esta mistura em uma travessa ou forma untada com cerca de 20cmx20cm.\nLeve para assar a 240ºC por 40 minutos ou até o quibe ficar levemente corado. Regue com azeite para servir e está pronto!\n',3,2,'#receita #vegetariano #salgado','2022-08-08','vegan','Ingredientes:\n1 berinjela grande (a minha tinha cerca de 500g)\n3 dentes de alho grandes\n1/2 xícara (de chá) de cebola picada\n1 colher (de sopa) de tahine (opcional)\nSuco de 1 limão tahiti\n1/2 xícara (de chá) de cheiro verde picado\n1 colher (de sopa) de hortelã desidratada\n1 xícara (de chá) de trigo para quibe\n1 e 1/2 xícara (de chá) de água fervente\nSal a gosto\nPimenta do reino a gosto\n'),(15,'Brownie de Castanha de Baru','Modo de preparo:\nHidrate as tâmaras colocando em um recipiente com água morna até cobrir por cerca de 15 minutos.\nEnquanto hidratam, coloque no processador a castanha de baru e triture em pedaços pequenos. Não precisa triturar muito, o ideal é deixar alguns pedaços para dar textura ao brownie. Reserve a castanha.\nDerreta o chocolate em banho maria com 100ml de água, até ficar liso e cremoso. Reserve.\nEscorra a água das tâmaras e transfira para o processador, bata até virar um purê. Se necessário, desligue o processador e raspe a lateral com uma colher para auxiliar o processo.\nAdicione a farinha de aveia, a castanha de baru e o chocolate derretido. Bata até ficar homogêneo.\nForre uma fôrma com papel manteiga para facilitar na hora de desenformar. Utilizei uma fôrma de pão de 24cm x 10cm.\nTransfira a massa para a fôrma e distribua uniformemente. Como a massa é densa e pegajosa, sugiro você usar as pontas dos dedos umedecidos com água para distribuir a massa com facilidade. Pressione para baixo até que fique lisa e firme.\nPolvilhe a gosto com castanha de baru picado (etapa opcional).\nLeve à geladeira por cerca de 1 hora ou até o brownie firmar.\nLevante o papel manteiga para desenformar. Corte os brownies no tamanho que preferir e sirva.\nGuarde os brownies em um recipiente hermético na geladeira por cerca de 5 dias.\n',3,1,'#receita #doce #vegetariano','2022-08-08','vegan','Ingredientes:\nFarinha de aveia – 1 xíc. = 110g\nTâmaras sem caroço – 1 xíc. = 145g\nChocolate 70% cacau picado – 1/2 xíc. = 70g\nCastanha de baru da Monama – 1/2 xíc. = 80g + um pouco para polvilhar (opcional)\nÁgua – 100ml\n'),(16,'Cookies de Aveia com Alfarroba','Modo de preparo:\nEm um recipiente adicione todos os ingredientes e misture até ficar homogêneo.\nModele os cookies do tamanho que preferir e disponha sobre uma assadeira. Indico você utilizar uma colher de sopa para medir a quantidade de massa pra cada um. Assim eles irão ficar iguais e pequenos, e assarão por inteiro e rapidamente.\nLeve ao forno preaquecido a 180°C por cerca de 15 minutos.\nRetire do forno e vire todos os cookies para assarem embaixo. Leve novamente ao forno por cerca de 10 minutos.\nRetire do forno e espere esfriar. Ao saírem do forno, os cookies devem estar levemente úmidos e macios. Ao esfriarem irão ficar sequinhos e crocantes.\nEsses cookies duram em média de duas semanas, se bem conservados num pote fechado em local seco e fresco.\n',3,1,'#receita #doce #vegetariano','2022-08-08','vegan','Ingredientes:\nAveia em flocos finos – 2 xícaras = 200g aprox.\nAçúcar mascavo – 1/2 xícara = 75g aprox.\nAlfarroba em pó (ou cacau em pó) – 3 colheres de sopa\nÓleo de coco derretido (ou outro óleo vegetal) – 3 colheres de sopa\nÁgua – 1/4 xícara = 60ml\n'),(17,'Chips Assados','Modo de preparo:\nPré-aqueça o forno a 180ºC e descasque o ingrediente escolhido. Corte-o em fatias finas e uniformes, cerca de 1mm está ótimo.\nCaso escolher a batata-doce, como disse acima, você precisará deixá-la de molho em uma mistura de água com sal por pelo menos 15 minutos, e em seguida seque bem no papel toalha ou guardanapo.\nFaça uma misturinha de azeite com sal a gosto, em quantidade suficiente para passar uma fina camada sobre os chips.\nDisponha as fatias sobre uma assadeira com papel manteiga e com o auxílio de um pincel passe esta mistura de azeite e sal.\nAsse por 20 minutos, vire as fatias, abaixe a temperatura do forno para 160ºC e devolva a assadeira para terminar de assar.\nVeja de tempos em tempos, de 10 em 10 minutos, ou de 5 em 5 (se seu forno for meio maluquinho). Vai demorar um total de 40 minutos para ficarem prontos.\nRecomendo que consuma esses chips no mesmo dia, mas, caso quiser guardar, guarde em um pote de vidro bem fechadinho. Já guardei por uns 2 dias e ainda estavam crocantes.\n',3,2,'#receita #lanches #vegetariano','2022-08-08','vegan','Ingredientes:\n2 unidades médias de batata doce, beterraba, cenoura ou inhame\nAzeite e sal a gosto\n'),(18,'Pudim de Tapioca com Coco','Modo de preparo:\nEm uma panela grande adicione o leite de coco, açúcar demerara e 1 xícara do coco ralado ou resíduo do leite de coco. Misture bem até ficar homogêneo.\nLeve ao fogo médio e adicione a tapioca granulada aos poucos, mexendo sempre para não empelotar. Continue mexendo em fogo médio até engrossar.\nUnte uma fôrma de pudim (a minha tem 20 cm de diâmetro) com o óleo vegetal e polvilhe com o restante do coco ralado (1/2 xícara).\nTransfira a mistura para a fôrma e deixe esfriar em temperatura ambiente.\nLeve à geladeira por cerca de 4 horas ou até gelar.\nDesenforme o pudim e polvilhe com mais coco ralado se desejar. Sirva gelado.\n',3,1,'#receita #sobremesa #vegetariano','2022-08-08','vegan','Ingredientes:\nTapioca granulada – 1 xícara e 1/2 = 290g aprox.\nCoco ralado ou resíduo do leite de coco – 1 xícara e 1/2 = 115g aprox.\nAçúcar demerara ou cristal – 1 xícara = 220g aprox.\nLeite de coco – 800 ml (usei leite caseiro)\nÓleo vegetal – 2 colheres de sopa (usei óleo de coco)\n'),(19,'Pave de Paçoca','Modo de preparo:\nEm uma panela em fogo médio, coloque o leite de amendoim, o açúcar e a essência de baunilha. Misture e deixe ferver. Abaixe o fogo e adicione o amido de milho misturado no leite vegetal, misture e deixe engrossar. Adicione a paçoca esfarelada e misture novamente, até ficar um creme uniforme. Desligue e reserve.\nMolhe bolachas maisena em leite vegetal e coloque-as em uma travessa grande, lado a lado e cubra com uma camada de creme. Repita o procedimento, alternando bolacha e creme, finalizando com uma camada do creme. Cubra e leve à geladeira por pelo menos 8 horas antes de servir.\nSe quiser, salpique resíduos de leite de amendoim torrados para servir.\nPara torrar os resíduos do leite de amendoim: eu costumo espalhar eles por uma assadeira antiaderente e levo para assar em forno médio por uns 20 minutos mais ou menos, olhando sempre, mexendo para não queimarem.\n',3,1,'#receita #doce #vegetariano','2022-08-08','vegan','Ingredientes:\n3 xícaras (de chá) de leite de amendoim (ou amêndoas, ou soja)\n1/4 de xícara (de chá) de açúcar demerara ou cristal\n2 colheres (de chá) de essência de baunilha\n1/4 de xícara (de chá) de leite vegetal misturado com  3 colheres (de sopa) de amido de milho\n400g de paçoca esfarelada\n1 pacote de bolachas tipo maisena\nLeite vegetal para molhar as bolachas\n'),(20,'Pão de Banana e Canela','Modo de preparo:\nEm uma bacia grande misture todos os ingredientes menos as bananas. Sove bastante até desgrudar das mãos, deixando crescer por 1 hora. Depois, acrescente as bananas, dividindo em 6 pães. Deixe-os crescer novamente em assadeiras untadas com manteiga. Asse em forno médio, pre-aquecido até que dourem por cima, como nas fotos. Se sobrar muito, corte em fatias e congele. Aí, basta aquecer novamente no forno para ter sempre um pão fresquinho à mão.\n',3,1,'#receita #pão #vegetariano','2022-08-08','vegan','Ingredientes:\n2 xícaras e meia de farinha de trigo branca\n1 colher (chá) de canela\n4 colheres (sopa) de açúcar demerara\n3 colheres (sopa) de óleo vegetal\n1 pacote de fermento biológico seco\n2 banana-nanicas médias\n1 xícara de leite de soja ou outro leite vegetal em temperatura ambiente ou até morninho\n'),(21,'Granola Caseira','Modo de preparo:\nMisture tudo numa bacia grande, com exceção da uva passa e das castanhas. Depois, disponha numa assadeira (eu precisei dividir em duas) e coloque para assar em temperatura média até que a aveia fique dourada.\nAcrescente a uva passa e as castanhas.\nEspere esfriar e reserve num pote fechado para que não murche. Afinal, a queremos bem crocante.\n',3,1,'#receita #vegetariano #cafédamanhã','0000-00-00','vegan','Ingredientes:\n2 ½ xícaras (chá) de aveia prensada\n1 xícara (chá) de castanha de caju e do pará\n1 xícara (chá) de farelo de trigo\n2 xícaras (chá) de sementes (gergelim, chia, linhaça)\n1 xícara (chá) de gérmen de trigo\n1 colher (café) de canela em pó\n1 xícara (chá) de mel (glicose de milho)\n½ xícara (chá) de óleo\n1 pitada de sal\n1 xícara (chá) de uva passa\n½ xícara (chá) de lascas coco seco (se encontrar)\n2 xícaras (chá) de flocos de milho\n'),(22,'Leite de Coco Caseiro','Modo de preparo:\nPré-aqueça o forno a 240ºC, retire toda a água de um coco seco, coloque ele em uma assadeira e leve para assar por 15 minutos ou até ficar bem rachado. É importante retirar toda a água do coco para não correr o risco de se queimar quando for abrir.\nEspere ficar morno e dê leves marteladinhas para ajudar a quebrar o restante que faltou. Separe a casca da polpa com o auxílio de uma faca sem ponta. Pique esta polpa em pedaços menores.\nEm um liquidificador, coloque esta polpa de coco, adicione a água quente e bata por 3 minutos. Se o seu liquidificador for pequeno, divida em duas partes.\nEspere ficar morno para não se queimar e em seguida coe com o auxílio de um pano limpo ou peneira bem fina.\n',3,7,'#receita #bebida #vegetariano','2022-08-08','vegan','Ingredientes:\n1 coco seco (2 xícaras e meia de coco picado ou cerca de 250g)\n3 xícaras (de chá) de água quente (cerca de 720ml ou mais se preferir mais fino)\n'),(23,'Polenta ao Molho Bolonhesa','Modo de preparo:\nHidrate a proteína de soja e pique os ingredientes. Eu costumo colocar a proteína de soja em uma vasilha, cubro com o dobro de água em temperatura ambiente e deixo de molho até ficar macia, o que geralmente leva 10 minutos. Escorro, lavo bem (para tirar aquele gosto forte e característico dela) e em seguida espremo muito bem (para não ficar esponjosa).\nPrepare o molho. Em uma panela em fogo médio, coloque um fio de óleo e refogue os dentes de alho picados até dourar. Acrescente a cebola e refogue mais um pouco. Adicione a proteína de soja, tempere com sal a gosto e adicione o pimentão picado. Refogue até a soja ficar levemente dourada, o que vai levar cerca de 5 minutos. Desta forma a proteína de soja ficará mais sequinha, e não borrachuda.\nAdicione o molho de tomate, a água e deixe ferver. Acrescente as azeitonas, o milho e a ervilha e deixe cozinhando por uns 2 minutinhos.\nAcrescente o cheiro verde picado, regue com azeite a gosto, misture, desligue e reserve.\nEm uma vasilha, coloque o fubá e a água, mexa e deixe descansando por 10 minutos.\nEm uma outra panela, alta de preferência, e em fogo médio, refogue os outros dentes de alho picados até dourar. Acrescente a água, tempere com uma pitada de sal, e acrescente o creme de cebola. Deixe ferver.\nQuando estiver fervendo, abaixe o fogo e adicione a mistura do fubá com a água aos poucos e mexa sempre. Prove o sal e corrija se necessário. Você precisará misturar por cerca de 10 minutos, ou até a polenta estar cremosa e grossa.\nColoque em uma vasilha, cubra com molho e está pronto!\n\n',3,2,'#almoço #salgado #receita #vegetariano','2022-08-08','vegan','Ingredientes:\n2 xícaras (de chá) de fubá\n2 xícaras (de chá) de água\n2 dentes de alho grandes picados\n1/2 xícara (de chá) de creme de cebola (sopa de cebola) – opcional, caso não quiser usar, adicione 1 dente de alho a mais\n3 xícaras (de chá) de água\nSal a gosto\nÓleo\nSugestão: Molho Bolonhesa de PTS\n2 dentes de alho grandes picados\n1/2 cebola grande picada\n1 xícara (de chá) de proteína de soja hidratada e escorrida\n1/2 xícara (de chá) de pimentão picado\n1 pacote de molho de tomate (340g)\n1/2 xícara (de chá) de água\n1/2 xícara (de chá) de azeitonas picadas\n1/2 lata de milho e 1/2 lata de ervilha (ou uma lata de dueto)\n1/2 xícara (de chá) de cheiro verde picado\nSal a gosto\nAzeite a gosto'),(24,'Salpicão com Carne de Jaca','Modo de preparo:\nLave e pique os ingredientes conforme a descrição. Também cozinhe os cubinhos de batata em água quente até ficarem macios (basta atravessar uma faca por eles com facilidade). Para preparar o salsão, retirei a casca com uma faca e depois piquei bem.\nEm uma vasilha grande, coloque a cenoura ralada, a maçã verde picada, o milho, o salsão, a azeitona picada, os cubinhos de batata cozidos, a ervilha, a uva passa e, se quiser, acrescente a carne de jaca desfiada.\nAdicione a maionese vegana de sua preferência, a mostarda, o suco de limão, a salsinha e cebolinha picadas e tempere com sal e pimenta moída a gosto. Misture bem, cubra com um plástico e leve a geladeira por pelo menos duas horas antes de servir.\nColoque em uma travessa bonita e, se quiser, salpique batata palha por cima. Está pronto!\n',3,2,'#almoço #receita #vegetariano','2022-08-08','vegan','Ingredientes:\n1 xícara (de chá) de cenoura ralada\n1/2 xícara (de chá) de maçã verde picada\n1/2 xícara (de chá) de milho em conserva\n1/2 xícara (de chá) de salsão bem picado\n1/2 xícara (de chá) de azeitonas picadas\n1 xícara (de chá) de cubinhos de batata cozidos\n1 xícara (de chá) de ervilha\n1/2 xícara (de chá) de uva passa\n1 xícara (de chá) de carne de jaca desfiada\n1/2 xícara (de chá) de maionese vegana\n1 colher (de sopa) de mostarda\nSuco de meio limão\n1/2 xícara (de chá) de salsinha e cebolinha picadas\nSal e pimenta moída a gosto\nBatata palha (opcional)\n'),(25,'Strogonoff de Berinjela',' \nModo de preparo:\nReúna todos os ingredientes;\nHigienize a berinjela e corte ela em cubinhos de cerca de 2,5 cm;\nTransfira para uma bacia com água, vinagre e deixe de molho por 10 minutos;\nEm uma panela, esquente o azeite e refogue o alho, a cebola até dourarem;\nEscorra as berinjelas, adicione na frigideira, tempere com sal e deixe refogar por cerca de 5 minutos (elas devem ficar moles, mas não muito);\nDespeje o molho de tomate, a água, a mostarda, misture bem e deixe ferver;\nAcrescente o leite de aveia, acerte o sal, misture e deixe engrossar;\nDesligue o fogo, salpique o cheiro-verde e sirva.\nSirva com arroz branco feito com leite de coco ao invés de água – fica delicioso. Adicione folhas de manjericão fresco, traz um perfume ótimo.\n',3,2,'#receita #salgado #vegetariano','2022-08-08','vegan','Ingredientes:\n2 berinjelas médias picadas (cerca de 600 gramas)\nAzeite a gosto\n3 dentes de alho picados\n1 cebola média picada\nSal a gosto\n2 xícaras de chá de molho de tomate\n1/2 xícara de chá de água\n2 colheres de sopa de mostarda amarela\n1 e 1/2 de xícara de chá de leite de aveia\n1 xícara de chá de cheiro-verde picado\n'),(26,'Biscoito de Banana e Aveia','Modo de preparo:\nPré-aqueça o forno a 180ºC. Em uma vasilha, coloque a banana amassada, a aveia em flocos finos, o óleo vegetal, o fermento, a canela e misture. Se gostar, adicione as uvas passas e as castanhas picadas. Misture bem, até ficar uniforme.\nColoque esta massa com o auxílio de duas colheres sobre uma assadeira forrada com papel manteiga, ou forma antiaderente levemente untada, e leve para assar por 20 minutos ou até ficarem bem sequinhos. Remova com cuidado do papel. \n',3,1,'#lanches #doce #vegetariano #receita','2022-08-08','vegan','Ingredientes:\n1 xícara (de chá) de banana nanica amassada (cerca de 2 bananas grandes)\n1 xícara (de chá) de aveia em flocos finos\n1 colher (de sopa) de óleo vegetal (usei o de coco)\n1 colher (de chá) de fermento químico em pó\nCanela em pó a gosto (opcional)\n1/4 de xícara (de chá) de uvas passas (opcional)\n1/4 de xícara (de chá) de castanha do Para picadas (opcional)\n'),(27,'Bolinho de Inhame','Modo de preparo:\nEm uma tigela, misture bem o inhame, óleo de coco sem sabor, sal, ervas finas e alho amassado.\nAcrescente o polvilho doce e mexa até ficar uma massa homogênea, que não grude nas mãos.\nCaso necessário acrescente mais polvilho.\nUnte uma forma.\nFaça bolinhas com a massa do tamanho que preferir.\nAsse em forno pré-aquecido à 200 graus por 30-40 minutos.\n',3,2,'#lanches #receita #vegetariano','2022-08-08','vegan','Ingredientes:	\n1 xícara de inhame cru ralado\n3 colheres de sopa de óleo de coco sem sabor ou azeite de oliva\n1/2 colher de chá de sal\n2 colheres de chá de ervas finas\n1 dente de alho amassado\n3/4 xícara de polvilho doce\n'),(28,'Esfiha de Espinafre','Modo de preparo:\nNuma tigela grande dissolva completamente o fermento no açúcar e no sal. Junte a água, que deve estar morna, e depois acrescente os demais ingredientes, adicionando a farinha de trigo por último e aos poucos.\n',3,2,'#receita #salgada #vegetariano','2022-08-08','vegan','Ingredientes:\nMassa\n1 tablete de fermento biológico fresco (ou seco)\n300 ml de água morna\n100 ml de óleo\n1 colher (sobremesa) de sal\n1 colher (sobremesa) de açúcar\n5 xícaras de farinha de trigo (pode misturar branca com integral)\nRecheio\n3 maços de espinafre\nalho e cebola\nsal a gosto\npimenta calabresa (opcional)\n'),(29,'Hambúrguer de Grão-de-Bico ','Modo de Preparo:\nColoque o grão-de-bico de molho por 8 horas\n\nEm uma panela de pressão, cozinhe por 10 minutos após pegar pressão\n\nEscorra a água que sobrou e passe o grão-de-bico por um processador ou liquidificador (na função pulsar) até obter uma massinha\n\nColoque essa massinha em uma vasilha e reserve\n\nEm uma panela aqueça o azeite de oliva e doure a cebola e o alho\n\nAcrescente o alho e a cebola na massa do grão-de-bico juntamente com os temperos, o suco do limão, o sal e a farinha\n\nMisture até obter uma massa modelável e modele seus hambúrgueres\n\nCaso não esteja modelável ainda, acrescente um pouco mais de farinha, mas com cuidado para não secar a massa\n\nPara conservar, você pode congelar os hambúrgueres',3,2,'#receita #salgada #vegetariano','2022-08-08','vegan','Ingredientes:\n1 xícara de grão-de-bico\n1/2 cebola picada\n2 dentes de alho picados\n2 colheres (sopa) de azeite de oliva\n2 colheres (sopa) de suco de limão\n1/4 de xícara de farinha de trigo\ncheiro verde a gosto\norégano a gosto\ncominho a gosto\npáprica doce a gosto\nsal a gosto'),(30,'Batata ao Murro','Modo de preparo:\nLave bem suas pequenas batatas e as coloque em uma panela com bastante água e deixe-as cozinhando até que fiquem macias, faça um teste enfiando um garfo nelas a cada 5 minutos após os 10 primeiros min. de cozimento.\nEscorra a água de cozimento, jogue um pouco de água corrente sobre as batatas para resfriá-las.\nColoque um pano de prato limpo sobre uma bancada, posicione uma batatinha sobre o pano de prato, dobre o pano de prato sobre a batata e dê um leve ‘murro’ para dar uma esmagadinha na batata (não é para destroçá-la ok!?), desdobre o pano de prato e coloque a batata num prato reservando-a, faça isso com todas as batatas.\nDepois de esmurrar as batatas coloque uma quantidade generosa de azeite ou margarina vegetal em uma frigideira (é pra forrar todo o fundo da frigideira), e vá adicionando as batatas uma ao lado da outra, em fogo médio enquanto ‘fritam’ adicione sal, temperos em pó (eu coloquei pimenta, cominho e louro nas minhas), vire as batatas para que doure do outro lado e finalize colocando temperos frescos ou orégano.\n',3,2,'#receita #salgado #vegetariano','2022-08-08','vegan','Ingredientes:\nBatatas inglesa pequenas\nSal e temperos a gosto\nOrégano ou temperos frescos para temperar\nÁgua o quanto baste para cozinhar\nAzeite ou margarina vegetal para fritar\n'),(31,'Pizza com Massa de Mandioca','Modo de preparo:\nUnte o prato ou tabuleiro com azeite ou óleo vegetal.\nColoque todo o aipim amassado no prato/tabuleiro e com os dedos espalhe bem por toda a superfície, a ideia é unir essa massa de aipim para que seja possível cortar os pedaços depois.\nPasse o molho de tomate por cima, coloque o seu queijo vegetal, se você não tiver ou não quiser usar um queijo vegetal use uma pastinha daquelas de soja.\nComplete com um toque de orégano e adicionando por cima os ingredientes que você mais gosta eu fiz a minha apenas com tomate.\nPara terminar você pode colocar no forno até que doure ou no microondas por aproximadamente 5 minutos.\n',3,2,'#receita #salgado #vegetariano','2022-08-08','vegan','Ingredientes:\nAipim cozido com sal, escorrido e amassado.\nMolho de tomate\nQueijo vegetal ou uma pasta de sua preferência\nAzeite ou óleo para untar o prato ou o tabuleiro\nOrégano, tomates, azeitonas\n'),(32,'Doce de Abóbora','Modo de preparo:\nNuma panela média coloque a abóbora, a canela, os cravos, o vinagre e a água. Tampe e deixe cozinhar em fogo médio até a abóbora ficar desmanchando. Se a água secar pode pingar um pouquinho mais.\nRetire a canela e os cravos. Nesse momento, se a preferência for por um doce mais cremoso, passe a abóbora numa peneira ou bata com o mixer na panela mesmo. Se gostar do doce com mais textura (eu prefiro assim) amasse a abóbora com um garfo para desmanchar.\nJunte o açúcar, misture e deixe cozinhar em fogo médio-alto com a panela destampada até restar pouco líquido.\nAproveite para untar a bancada ou uma assadeira com manteiga.\nComece a mexer o doce com uma colher de pau ou espátula de silicone como se fosse brigadeiro, até o líquido secar e desprender do fundo da panela. Nesse momento é importante não deixar cozinhar demais, senão o doce açucara totalmente quando esfria e vira uma rapadurinha de abóbora.\nPasse o doce da panela para a bancada ou assadeira untada. Deixe amornar e firmar e corte os corações. Deixe descansar por algumas horas (deixei umas 3 horas) e vire para secar o outro lado.\n',3,1,'#receita #doce #vegetariano','2022-08-08','vegan','Ingredientes:\n700g de abóbora seca, descascada e cortada em cubos\n1 pauzinho de canela\n6 cravos\n1/2 xícara de água\n1 colher de chá de vinagre\n700g de açúcar cristal\n'),(33,'Torta de Sorvete de Morango','Modo de preparo:\nComece preparando a crosta colocando as tâmaras de molho em água morna por cerca de 15 minutos.\nColoque as oleaginosas em um processador e triture bem até obter pedaços pequenos. Se necessário, desligue o processador de vez em quando e raspe a lateral com uma colher.\nEscorra a água das tâmaras e coloque no processador junto com as oleaginosas. Triture bem até obter uma farofa grossa e pegajosa.\nTransfira a mistura para uma fôrma. Cubra todo o fundo e um pouco das laterais pressionando a mistura com as pontas dos dedos. Certifique-se que esteja bem vedado a lateral com a crosta para não escorrer a cobertura, caso esteja usando uma fôrma com fundo falso.\nReserve a crosta e prepare a cobertura. Em um liquidificador adicione todos os ingredientes. Bata bem até ficar homogêneo.\nTransfira a mistura para a fôrma e leve ao congelador por no mínimo 4 horas, ou até congelar por inteiro.\nRetire do congelador pelo menos 10 minutos antes de servir. Conserve no freezer.\n',3,1,'#receita #doce #vegetariano','2022-08-08','vegan','Ingredientes:\npara a crosta:\n2 xícaras de oleaginosas a gosto (mistura de amêndoas, nozes e castanha de caju)\n20 tâmaras sem caroço\npara a cobertura:\n3 xícaras de morangos\n1 litro de leite de coco \n1/2 xícara de óleo de coco derretido\n1/2 xícara de açúcar cristal\n'),(34,'Cupcake de Coco','Modo de Preparo da Massa:\nMisturar bem (à mão ou com batedeira) todos os ingredientes até que fique homogêneo.\nModo de Preparo do Ganache:\nLevar o chocolate vegano (sem leite) ao microondas de 1 em 1 minuto, mexendo nos intervalos até que esteja derretido. Acrescentar o creme de soja, aos poucos, mexendo sempre, até que fique cremoso.\nMontagem:\nColocar metade da massa na forminha própria para cupcake, colocar um pouco da ganache e completar com a massa. Assar em forno pré aquecido, a 250°C até assar. Decorar com a ganache em saco de confeiteiro\n\n',3,1,'#receita #doce #vegetariano','2022-08-08','vegan','Massa:\n1 1/2 xícara (chá) de trigo integral\n1 1/2 xícara (chá) de trigo refinado\n1 1/2 xícara (chá) de açúcar\n2 xícaras (chá) leite de coco\n1 xícara (chá) de coco ralado (sem açúcar)\n1 xícara (chá) água\n1 colher (sopa) de fermento em pó\n1 xícara (chá) de óleo\nGanache de Chocolate:\n1 barra de chocolate amargo ou meio-amargo\n1 caixinha de creme de soja (Soymilk/ Olvebra/ Naturis/ Batavo)\n');
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

-- Dump completed on 2022-08-22  6:34:49
