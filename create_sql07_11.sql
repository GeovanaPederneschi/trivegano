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
-- Table structure for table `tb_adicional_item_venda`
--

DROP TABLE IF EXISTS `tb_adicional_item_venda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_adicional_item_venda` (
  `id_adicional_venda` int NOT NULL AUTO_INCREMENT,
  `tb_item_venda_id_item_venda` varchar(45) NOT NULL,
  `tb_produtos_adicionais_id_adicionais` varchar(45) NOT NULL,
  PRIMARY KEY (`id_adicional_venda`,`tb_item_venda_id_item_venda`,`tb_produtos_adicionais_id_adicionais`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_adicional_item_venda`
--

LOCK TABLES `tb_adicional_item_venda` WRITE;
/*!40000 ALTER TABLE `tb_adicional_item_venda` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_adicional_item_venda` ENABLE KEYS */;
UNLOCK TABLES;

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
  `foto` varchar(45) DEFAULT NULL,
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
INSERT INTO `tb_adm_fornecedor` VALUES (1,'flavia','1307','flavia_alimentacaoltda@gmail.com','ativo',1,'stevie.png'),(2,'camila','1307','camila_restauranteltda@gmail.com','ativo',50,''),(3,'augusto','1307','augusto_paesedoces@gmail.com','ativo',55,NULL);
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
  `cvv_cartao` int NOT NULL,
  `validade_cartao` date NOT NULL,
  `tb_cliente_id_cliente` int unsigned NOT NULL,
  PRIMARY KEY (`id_cartao`,`tb_cliente_id_cliente`),
  UNIQUE KEY `numero_cartao_UNIQUE` (`numero_cartao`),
  KEY `fk_tb_cartao_tb_cliente1_idx` (`tb_cliente_id_cliente`),
  CONSTRAINT `fk_tb_cartao_tb_cliente1` FOREIGN KEY (`tb_cliente_id_cliente`) REFERENCES `tb_cliente` (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_cartao`
--

LOCK TABLES `tb_cartao` WRITE;
/*!40000 ALTER TABLE `tb_cartao` DISABLE KEYS */;
INSERT INTO `tb_cartao` VALUES (1,'4716 0707 2518 2737','João Silva Santos','Visa',562,'2023-06-06',3),(2,'5272 6826 8885 4723','João Silva Santos','MasterCard',156,'2023-06-06',3);
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_categoria`
--

LOCK TABLES `tb_categoria` WRITE;
/*!40000 ALTER TABLE `tb_categoria` DISABLE KEYS */;
INSERT INTO `tb_categoria` VALUES (1,'doce','receita',NULL),(2,'salgado','receita',NULL),(3,'pizza','produto','pizza.png'),(4,'refeição','produto','refeicao.png'),(5,'bebida','produto','bebida.png'),(6,'sobremesa','produto','sobremesa.png'),(7,'bebida','receita',NULL),(8,'burguer','produto','burguer.png'),(9,'entrada','produto','entrada.jpg'),(10,'DIY','guia',NULL),(11,'noticia','guia',NULL),(12,'blog','guia',NULL),(13,'burguer','forncedor','burguer.png'),(14,'refeição','fornecedor','refeicao.png'),(15,'sobremesa','fornecedor','sobremesa.png'),(16,'pizza','fornecedor','pizzza.png');
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
  `foto` varchar(100) DEFAULT NULL,
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
INSERT INTO `tb_cliente` VALUES (3,'João Silva Santos','2005-02-13','55527425839','11977908927','geovana@gmail.com','1307','ativo','2022-06-19 00:00:00','João','joao3.jpg'),(9,'Sabrina Isis Freitas','2005-02-13','28508392800','77992418157','sabrina-freitas80@eton.com.br','09876543','ativo','2022-06-21 19:50:00','teste','sabrina9.jpg'),(11,'Claudio Costa Pederneschi','2005-02-13','55527375807','11989003819','costa.pederneschi@gmail.com','09876543','ativo','2022-06-21 13:35:00','João','claudio11.png'),(12,'Julia Maria','2005-02-13','55527425831','098909765','pederneschi@gmail.com','09876543','ativo','2022-06-22 02:40:00','Julia','julia12.jpg'),(13,'Julia Fernanda','2005-02-13','55527425833','098909765','pederneschi1@gmail.com','12345678','ativo','2022-06-22 02:48:00','Julia','julia13'),(14,'Fernada Carvalho','2006-06-09','55527425838','11989003819','fernanda@gmail.com','12345678','ativo','2022-06-22 02:51:00','Nanda','fernanda14.png'),(15,'Natalia Silva','1999-04-13','31543741836','11989003819','nataliasousa@gmail.com','12345678','ativo','2022-06-22 03:14:00','Nat','natalia15.jpg'),(16,'Giovana Oliveira','1978-09-02','56162946916','(11) 86098379','giovanabarrosoliveira@jourrapide.com','Saipae0rooqu','ativo','2022-07-14 03:11:00','Giovana','giovana16.jpg');
/*!40000 ALTER TABLE `tb_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_comentario`
--

DROP TABLE IF EXISTS `tb_comentario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_comentario` (
  `id_comentario` int NOT NULL AUTO_INCREMENT,
  `comentario` varchar(100) NOT NULL,
  `tb_guia_id_guia` int unsigned NOT NULL,
  `tb_cliente_id_cliente` int unsigned NOT NULL,
  `id_guia_r` int unsigned DEFAULT NULL,
  `data_coment` date DEFAULT NULL,
  `foto_usuario` varchar(45) DEFAULT NULL,
  `nome_usuario` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_comentario`,`tb_guia_id_guia`,`tb_cliente_id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_comentario`
--

LOCK TABLES `tb_comentario` WRITE;
/*!40000 ALTER TABLE `tb_comentario` DISABLE KEYS */;
INSERT INTO `tb_comentario` VALUES (14,'Melhor receita do mundo',2,3,NULL,'2022-11-04','joao3.jpg','João'),(23,'Trivegano o melhor',2,3,NULL,'2022-11-04','joao3.jpg','João'),(28,'Vcs me ajudam muito como ser humano!!',2,3,NULL,'2022-11-04','joao3.jpg','João'),(29,'Olha que coisa mais linda mais cheia de graça',2,3,NULL,'2022-11-04','joao3.jpg','João'),(38,'bora la',2,3,NULL,'2022-11-05','joao3.jpg','João'),(54,'e agora',2,3,NULL,'2022-11-05','joao3.jpg','João'),(55,'mds',2,3,NULL,'2022-11-05','joao3.jpg','João'),(56,'mds',2,3,NULL,'2022-11-05','joao3.jpg','João'),(57,'amanha eu faço isso',2,3,NULL,'2022-11-05','joao3.jpg','João'),(58,'amanha eu faço isso',2,3,NULL,'2022-11-05','joao3.jpg','João'),(59,'amanha eu faço isso',2,3,NULL,'2022-11-05','joao3.jpg','João'),(60,'caraca',2,3,NULL,'2022-11-05','joao3.jpg','João'),(61,'caraca',2,3,NULL,'2022-11-05','joao3.jpg','João'),(62,'caraca',2,3,NULL,'2022-11-05','joao3.jpg','João'),(63,'caraca',2,3,NULL,'2022-11-05','joao3.jpg','João'),(64,'Comentario',1,3,NULL,'2022-11-05','joao3.jpg','João'),(65,'ala',1,3,NULL,'2022-11-05',NULL,'João'),(66,'ala',1,3,NULL,'2022-11-05',NULL,'João'),(67,'eai',2,3,NULL,'2022-11-05',NULL,'João');
/*!40000 ALTER TABLE `tb_comentario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_endereco_cliente`
--

DROP TABLE IF EXISTS `tb_endereco_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_endereco_cliente` (
  `id_endereco` int NOT NULL AUTO_INCREMENT,
  `cep_endereco` char(8) NOT NULL,
  `rua_endereco` varchar(45) NOT NULL,
  `cidade_endereco` varchar(45) NOT NULL,
  `bairro_endereco` varchar(45) NOT NULL,
  `estado_endereco` char(2) NOT NULL,
  `complemento_endereco` varchar(45) DEFAULT NULL,
  `numero_endereco` int NOT NULL,
  `tb_cliente_id_cliente` int unsigned NOT NULL,
  `tipo_endereco` varchar(45) NOT NULL,
  PRIMARY KEY (`id_endereco`,`tb_cliente_id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_endereco_cliente`
--

LOCK TABLES `tb_endereco_cliente` WRITE;
/*!40000 ALTER TABLE `tb_endereco_cliente` DISABLE KEYS */;
INSERT INTO `tb_endereco_cliente` VALUES (1,'09853330','Alameda das Glicínias','São Bernardo do Campo','Alvarenga','SP',NULL,79,3,'casa'),(2,'09894240','Praça João Caetano','São Bernardo do Campo','Jordanópolis','SP',NULL,90,9,'casa'),(4,'09784290','Rua Frei Damião','São Bernardo do Campo','Montanhão','SP',NULL,678,11,'casa'),(5,'09812601','Rua Cristiano Angeli','São Bernardo do Campo','Assunção','SP',NULL,467,12,'casa'),(14,'09930510','Rua Mamanguape','Diadema','Campanário','SP',NULL,65,13,'casa'),(15,'09952388','Passagem A Vida da Gente','Diadema','Vila Nogueira','SP',NULL,35,14,'casa'),(16,'09913190','Rua Tenente Oscar Nunes','Diadema','Centro','SP',NULL,578,15,'casa'),(17,'09980800','Rua Charles Chaplin','Diadema','Serraria','SP',NULL,987,16,'casa');
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
  `endereco_complemento` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `cnpj_fornecedor` char(18) NOT NULL,
  `email_fornecedor` varchar(45) NOT NULL,
  `telefone_fornecedor` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `site_fornecedor` varchar(45) DEFAULT NULL,
  `nome_fantasia_fornecedor` varchar(60) NOT NULL,
  `status_fornecedor` varchar(45) NOT NULL,
  `logo` varchar(45) DEFAULT NULL,
  `avaliacao` decimal(7,2) DEFAULT NULL,
  `descricao` varchar(250) DEFAULT NULL,
  `cep_fornecedor` varchar(9) NOT NULL,
  `endereco_numero` int NOT NULL,
  `endereco_rua` varchar(45) NOT NULL,
  `endereco_bairro` varchar(45) NOT NULL,
  `endereco_cidade` varchar(45) NOT NULL,
  `endereco_estado` varchar(45) NOT NULL,
  `distanciaKm_permitida` int DEFAULT NULL,
  `tb_categoria_id_categoria` varchar(45) NOT NULL,
  PRIMARY KEY (`id_fornecedor`,`tb_categoria_id_categoria`),
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
INSERT INTO `tb_fornecedor` VALUES (1,'Flávia e Thomas Alimentação Ltda','','99594199000190','qualidade@flaviaethomasalimentacaoltda.com.br','1926769605','starship.html','Starship Burguer','ativo','logo5.png',NULL,'Somos uma hamburgueria pequena que se dispoem a fazer o maximo pelos seus clientes, desde o preparo dos lanches a se garantir a suprir as expectativas que a comida pode trazer as pessoas. Compre conosco e se delicie com os nossos lanches saudáveis.','09931540',45,'Rua Rouxinol','Campanário','Diadema','SP',20,'13'),(50,'Laís e Camila Restaurante Ltda',NULL,'57594556000170','financeiro@laisecamilarestauranteltda.com.br','1138248221','www.laisecamilafinanceiraltda.com.br','Restaurante Savvy','ativo','logo5.png',NULL,'Somos um dos restaurantes mais antigo de Diadema, comprometidos com o sabor, aroma e beleza dos pratos. Convidamos você a se deliciar com nossas refeições diversas, com muito sabor e diversidade que aprimoraram seu paladar.','09842041',56,'Rua Águas de São Pedro','Batistini','São Bernardo do Campo','SP',20,'14'),(55,'Alice e Augusto Pães e Doces ME',NULL,'17587120000130','estoque@aliceeaugustopaesedocesme.com.br','123456788','www.aliceeaugustopaesedocesme.com.br','Flare Restaurante','ativo','logo5.png',NULL,'Uma padaria em ascensão que se compromete com  o sabor dos seus produtos e que possue uma responsabilidade social e ambiental tão quanto importante o crescimento economico da empresa. Venha fazer parte disso.','09860122',89,'Avenida Robert Kennedy','Independência','São Bernardo do Campo','SP',25,'15'),(61,'alelo',NULL,'123456789098765675','tccnavegano2@gmail.com','123456788',NULL,'Pronto','avaliando','logo5.png',NULL,NULL,'09940420',798,'Rua Humberto de Campos','Taboão','Diadema','SP',NULL,''),(62,'alelo',NULL,'123456789098765671','tccnavegano4@gmail.com','123456788',NULL,'Feito','avaliando','logo5.png',NULL,NULL,'09951310',678,'Rua Manoel Ramos Domingues','Piraporinha','Diadema','SP',NULL,''),(63,'LTDA',NULL,'098909890989098909','restaurante@gmail.com','977908921',NULL,'Cantinho Nordestino','avaliando','logo5.png',NULL,NULL,'09980405',456,'Travessa Vicente Francisco da Rocha','Serraria','Diadema','SP',NULL,''),(64,'LTDA',NULL,'098909890989098905','restaurante1@gmail.com','977908921',NULL,'Cantinho Brasileiro','avaliando','logo5.png',NULL,NULL,'09690110',34,'Rua Ângelo Gobato','Paulicéia','São Bernardo do Campo','SP',NULL,''),(65,'LTDA',NULL,'098765432123456784','liberal@gmail.com','11989003819',NULL,'Bar Liberal','avaliando','logo5.png',NULL,NULL,'09830330',78,'Rua José','Rio Grande','São Bernardo do Campo','SP',NULL,''),(66,'LTDA',NULL,'098765432123456787','liberalismo@gmail.com','11989003819',NULL,'Bar da Tijuca','avaliando','logo5.png',NULL,NULL,'09693040',778,'Rua João Daré','Paulicéia','São Bernardo do Campo','SP',NULL,'');
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
  `conteudo_guia` text NOT NULL,
  `autor_guia` varchar(80) DEFAULT NULL,
  `ceo_guia` varchar(45) NOT NULL,
  `titulo_guia` varchar(45) NOT NULL,
  `tb_usuario_adm_id_usuario_adm` int unsigned NOT NULL,
  `tb_categoria_id_categoria` int unsigned NOT NULL,
  `descricao_guia` varchar(100) NOT NULL,
  PRIMARY KEY (`id_guia`,`tb_usuario_adm_id_usuario_adm`,`tb_categoria_id_categoria`),
  KEY `fk_tb_guia_tb_usuario_adm1_idx` (`tb_usuario_adm_id_usuario_adm`),
  KEY `fk_tb_guia_tb_categoria1_idx` (`tb_categoria_id_categoria`),
  CONSTRAINT `fk_tb_guia_tb_categoria1` FOREIGN KEY (`tb_categoria_id_categoria`) REFERENCES `tb_categoria` (`id_categoria`),
  CONSTRAINT `fk_tb_guia_tb_usuario_adm1` FOREIGN KEY (`tb_usuario_adm_id_usuario_adm`) REFERENCES `tb_usuario_adm` (`id_usuario_adm`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_guia`
--

LOCK TABLES `tb_guia` WRITE;
/*!40000 ALTER TABLE `tb_guia` DISABLE KEYS */;
INSERT INTO `tb_guia` VALUES (1,'2022-10-28','Para ter ideia, 46% da população brasileira já deixa de comer carne pelo menos uma vez por semana. Existe até um movimento chamado Segunda sem Carne, que estimula que isso aconteça às segunda-feiras.E, em 2018, segundo a Sociedade Vegetariana Brasileira, 14% dos brasileiros disseram se considerar vegetarianos. \nAs dietas vegetariana e vegana são nutricionalmente saudáveis e adequadas, tanto que são apropriadas para todas as fases da vida, incluindo gestação, lactação, infância, adolescência, idade adulta e terceira idade. Os atletas também se dão muito bem com esses cardápios. Mas, afinal, quais as diferenças entre eles? \nA dieta vegetariana não inclui carne vermelha, frango e peixe, mas muita gente que segue esse padrão consome leite e derivados e ovos. Agora, há o vegetariano estrito, que não come nenhum alimento de origem animal. Portanto, ele abdica de todos os tipos de carnes, além de ovos, leite e derivados. \n\nVale ainda mencionar aqui a dieta flexitariana. O nome tem a ver com o fato de que quem segue essa vertente é considerado um “vegetariano flexível”, porque diminui bastante a ingestão de carnes, mas não chega a fazer uma restrição absoluta do alimento.\n\n Trata-se de um padrão alimentar plant based, ou seja, baseado em alimentos de origem vegetal. O número de pessoas que se dizem flexitarianas passou de 29%, em 2018, para 50% em 2020, segundo uma pesquisa realizada pelo The Good Food Institute junto com o Ibope.\n\nJá o vegano faz mudanças que vão além da cozinha. Fora não ingerir nada de origem animal, ele não usa nenhum produto que tenha esse apelo, como jaquetas de couro ou casacos de lã. Itens de limpeza doméstica e higiene pessoal também não podem levar certas substâncias nem passar por testes com bichos.\n\n Por que é bacana priorizar os vegetais\nDietas compostas por esse grupo alimentar são sustentáveis porque utilizam menos recursos naturais e estão relacionadas a menores danos ao meio ambiente. Ao se ingerir proteínas por meio de uma variedade de produtos de origem vegetal, é possível suprir o organismo com todos os aminoácidos essenciais. \n\nO uso regular de leguminosas e grãos, por exemplo, garante boa qualidade e quantidade proteica aos vegetarianos, além de fornecer os outros nutrientes de que o organismo precisa. \n\nEstudos com adultos vegetarianos e veganos identificam que esses padrões proporcionam múltiplos benefícios à saúde, como menor risco de obesidade, doenças cardiovasculares e diabetes. \n\nMas é sempre bom buscar a orientação de um profissional especializado para planejar sua alimentação e verificar a necessidade de uso de suplementos.\n\nNa hora de montar seu prato, se você quiser evitar a proteína animal, faça da seguinte forma: \n\n½ prato de salada crua e legumes cozidos ou grelhados, com três cores diferentes e pelo menos um vegetal verde-escuro.\n¼ do prato com fontes de carboidratos, de preferência ricos em fibras. Algumas opções: arroz (melhor se for o integral); quinua ou batatas cozidas (se possível com casca); macarrão (integral) com molho de tomate; ou purê de algum tipo de tubérculo ou raiz (batata inglesa ou doce, mandioca, mandioquinha, etc).\n¼ do prato com fontes de proteínas. Podemos usar, por exemplo, 1 concha de um dos seguintes alimentos: feijão, lentilha, ervilha, vagem, grão-de-bico ou soja. Outra possibilidade é recorrer a uma fatia de tofu.\nAcrescente, se possível, uma dessas opções: 3 colheres de sopa de edamame ou tremoço; 2 colheres de sopa de semente de girassol ou de abóbora; ou, ainda, 1/3 de xícara (30 g) de nozes, castanhas ou amêndoas.\nComplemente com uma fruta, de preferência rica em vitamina C. \n','','#alimentacao #saudavel #trivegano #guia','Alimentação Saudável',2,12,'Vegetarianismo e veganismo diferenças e visões alimentares.'),(2,'2002-10-28','Dicas para quem quer ser vegano\nPara quem come carne e gostaria de ser vegano, mas tem dificuldade em mudar o consumo alimentar, uma dica é ir reduzindo gradativamente a quantidade de proteína animal e aumentar a ingestão de leguminosas, que são ricas em proteínas, como grão de bico, soja ou feijão. \nOutra boa opção para diminuir o consumo de proteína animal é adotar o “Segunda Sem Carne\", que é um programa mundial que incentiva o não consumo de proteína animal durante todo o dia e acontece sempre às segundas-feiras.\nQuando é necessário usar suplementação\nA suplementação em veganos só deve ser indicada após avaliação do consumo alimentar e de um exame de sangue, solicitado pelo médico ou nutricionista, para confirmar se, de fato, existe deficiência de vitaminas ou minerais.\nEmbora a alimentação vegana normalmente seja variada e rica em fibras, vitaminas C, A, E e do complexo B, minerais, como o magnésio e proteínas vegetais, é fundamental ter o acompanhamento de um nutricionista, pois neste tipo de dieta pode haver deficiência de alguns nutrientes encontrados em maior quantidade nos alimentos de origem animal, como a vitamina B12, a vitamina D, o cálcio e as proteínas de alta qualidade.\nPara manter o consumo adequado de proteínas e evitar deficiência deste nutriente, é importante priorizar alimentos como, tofu, grão de bico, feijão e castanhas ao longo do dia. Para evitar deficiência de cálcio, pode-se optar por alimentos como leites vegetais, enriquecidos com este mineral. Já a deficiência da Vitamina D pode ser evitada ao consumir alimentos enriquecidos com a vitamina, como os leites vegetais, ou exposição regular e equilibrada ao sol.\nPara suprir ou prevenir possíveis carências nutricionais, o nutricionista pode optar por recomendar suplementos como o óleo de linhaça como fonte de ômega-3, suplementos de vitamina B12, cálcio, proteínas vegetais e vitamina D.\nO que evitar comer\nNa dieta vegana deve-se evitar todos os alimentos de origem animal, como:\nCarnes em geral, como frango, ovos, peixes e frutos do mar;\nLeite e derivados, como queijos, iogurte, requeijão e manteiga;\nEmbutidos como salsicha, linguiça, presunto, mortadela, peito de peru, salame;\nGorduras de origem animal, como manteiga e banha;\nMel e produtos com mel, própolis;\nFermentos com organismos vivos, como fermento fresco (de padeiro);\nGelatina e produtos feitos com colágeno.\nAlém disso, os veganos também não costumam consumir outros produtos que tenham sido testados em animais, como xampus, sabonetes, maquiagem, hidratantes, ou produtos que utilizam partes de animais em sua produção, como roupas de seda ou couro, por exemplo.',NULL,'#iniciando #vegeanismo #dicas #trivegano','Como começar uma nova alimentação?',2,12,'Dicas de como começar uma nova alimentação.');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_imagem_guia`
--

LOCK TABLES `tb_imagem_guia` WRITE;
/*!40000 ALTER TABLE `tb_imagem_guia` DISABLE KEYS */;
INSERT INTO `tb_imagem_guia` VALUES (1,'alimentacao_saudavel.webp',1,2,12),(2,'nova_alimentacao.jpg',2,2,12);
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_imagem_produto`
--

LOCK TABLES `tb_imagem_produto` WRITE;
/*!40000 ALTER TABLE `tb_imagem_produto` DISABLE KEYS */;
INSERT INTO `tb_imagem_produto` VALUES (1,'popburguer.png',1,8,1,1),(2,'xburguer.png',2,8,1,1),(3,'meltburguer.png',3,8,1,1),(4,'xsalada.png',4,8,1,1),(5,'suconatural.jpg',5,5,1,1),(6,'cocacola.jpg',6,5,1,1),(8,'refeicao_7.png',7,4,2,50),(9,'refeicao_8.png',8,4,2,50),(10,'refeicao_9.png',9,4,2,50),(11,'refeicao_10.png',10,4,2,50),(12,'refeicao_11.png',11,4,2,50),(13,'refeicao_12.png',12,4,2,50);
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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_imagem_receitas`
--

LOCK TABLES `tb_imagem_receitas` WRITE;
/*!40000 ALTER TABLE `tb_imagem_receitas` DISABLE KEYS */;
INSERT INTO `tb_imagem_receitas` VALUES (1,'bolodefuba.jpg',1,2,1),(2,'focacciadetomate.jpg',2,2,1),(3,'wafflessemgluten.jpg',3,2,1),(4,'cracker.jpg',4,2,2),(5,'pão.jpg',5,3,2),(6,'tapiocadoce.jpg',6,3,1),(7,'miniaboboras.jpg',7,3,2),(10,'tofuempanado.jpg',8,3,2),(12,'lasanhadeabobrinha.jpg',11,3,2),(19,'nhoquedeabobora.jpg',12,3,2),(20,'brownie_castanha.jpg',15,3,1),(21,'cookies_aveia.jpg',16,3,1),(22,'_pudim.jpg',18,3,1),(23,'pãodebanana.jpg',20,3,1),(25,'granola.jpg',21,3,1),(26,'strogonoffberinjela.jpg',25,3,2),(27,'bolinhainhame.png',27,3,2),(28,'esfihaespinafre.jpg',28,3,2),(29,'batataaomurro.jpg',30,3,2),(30,'pizzademandioca.jpg',31,3,2),(31,'doceabobora.jpg',32,3,1),(32,'torta_sorvete_morango.jpg',33,3,1),(33,'cupcakecoco.jpg',34,3,1),(34,'chocolatequente.jpg',45,2,1),(35,'coxinhadejaca.jpg',48,2,2);
/*!40000 ALTER TABLE `tb_imagem_receitas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_item_venda`
--

DROP TABLE IF EXISTS `tb_item_venda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_item_venda` (
  `id_item_venda` int NOT NULL AUTO_INCREMENT,
  `tb_produto_venda_id_produto_venda` varchar(45) NOT NULL,
  `n_item_produto` int DEFAULT NULL,
  `observacao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_item_venda`,`tb_produto_venda_id_produto_venda`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_item_venda`
--

LOCK TABLES `tb_item_venda` WRITE;
/*!40000 ALTER TABLE `tb_item_venda` DISABLE KEYS */;
INSERT INTO `tb_item_venda` VALUES (57,'56',1,''),(58,'57',1,''),(59,'58',1,'');
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
  `valor_frete_venda` decimal(5,2) DEFAULT NULL,
  `empresa_entrega_venda` varchar(40) NOT NULL,
  `tb_cliente_id_cliente` int unsigned NOT NULL,
  `id_promocao` int DEFAULT NULL,
  `tb_fornecedor_id_fornecedor` varchar(45) NOT NULL,
  PRIMARY KEY (`id_venda`,`tb_cliente_id_cliente`,`tb_fornecedor_id_fornecedor`),
  KEY `fk_tb_pedido_venda_tb_cliente1_idx` (`tb_cliente_id_cliente`),
  CONSTRAINT `fk_tb_pedido_venda_tb_cliente1` FOREIGN KEY (`tb_cliente_id_cliente`) REFERENCES `tb_cliente` (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pedido_venda`
--

LOCK TABLES `tb_pedido_venda` WRITE;
/*!40000 ALTER TABLE `tb_pedido_venda` DISABLE KEYS */;
INSERT INTO `tb_pedido_venda` VALUES (45,41.60,'2022-11-07 02:50:00','Estr. Água Santa, 371 - Eldorado, São Paulo - SP, 04476-490, Brasil','debito',1.90,'enviada',0.00,'propia',3,2,'1');
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
  CONSTRAINT `fk_tb_produto_tb_categoria1` FOREIGN KEY (`tb_categoria_id_categoria`) REFERENCES `tb_categoria` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_produto`
--

LOCK TABLES `tb_produto` WRITE;
/*!40000 ALTER TABLE `tb_produto` DISABLE KEYS */;
INSERT INTO `tb_produto` VALUES (1,'Pop Burguer',10.00,'Simples e delicioso. Molho especial, um disco de carne 2.0 e cheddar.\n\nContém soja e glúten. Peso Aproximado: 150g.',15.00,'ativo',8,1,1,NULL),(2,'X-Burguer',14.00,'Maionese, dois discos de carne 2.0, queijo cremoso, ketchup e mostarda.\n\nContém soja e glúten. Peso aproximado: 240g.',18.00,'ativo',8,1,1,NULL),(3,'Melt Burguer',15.00,'Cebola chapeada no shoyu, dois discos de carne 2.0 e duas camadas de queijo cheddar.\n\nContém soja e glúten. Peso aproximado: 225g.',17.50,'ativo',8,1,1,NULL),(4,'X-Salada',17.00,'Alface, tomate, cebola roxa, maionese, dois discos de carne 2.0, queijo cremoso, ketchup, mostarda e cheddar.',20.00,'ativo',8,1,1,NULL),(5,'Suco Natural',6.00,'Fruta classica escolida por você.\n300ml.',6.50,'ativo',5,1,1,NULL),(6,'Coca Cola',5.00,'350ml',5.50,'ativo',5,1,1,NULL),(7,'Almoço',20.00,'Arroz Temperado com Especiarias e Proteina Vegetal\nA refeição que saceia sua fome',22.00,'ativo',4,2,50,NULL),(8,'Almoço Enfeitado',25.00,'Um alomoço delicioso, com arroz, proteina vegetal, e muitas fribras.',30.00,'ativo',4,2,50,NULL),(9,'Massa com Especiarias',27.00,'Uma massa sequinha com legumes e folhas assadas.',32.00,'ativo',4,2,50,NULL),(10,'Legumando',35.00,'Uma refeição completa com legunes assados e temperados.\n\n',37.00,'ativo',4,2,50,NULL),(11,'Refeição Completa',37.00,'Arroz, feijão, proteina de soja, repolho, leguminosa e tomate.',45.00,'ativo',4,2,50,NULL),(12,'Escondidinho de Grão de Bico',34.00,'Arroz, feijão preto, batata doce, brocolis, tomate, folha verde e escondidinho de grão de bico.',40.00,'ativo',4,2,50,NULL);
/*!40000 ALTER TABLE `tb_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_produto_venda`
--

DROP TABLE IF EXISTS `tb_produto_venda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_produto_venda` (
  `id_produto_venda` int unsigned NOT NULL AUTO_INCREMENT,
  `tb_pedido_venda_id_venda` int unsigned NOT NULL,
  `tb_pedido_venda_tb_cliente_id_cliente` int unsigned NOT NULL,
  `tb_produto_id_produto` int unsigned NOT NULL,
  `tb_produto_tb_categoria_id_categoria` int unsigned NOT NULL,
  `tb_produto_tb_adm_fornecedor_id_adm_fornecedor` int unsigned NOT NULL,
  `tb_produto_tb_adm_fornecedor_tb_fornecedor_id_fornecedor` int unsigned NOT NULL,
  PRIMARY KEY (`id_produto_venda`,`tb_pedido_venda_id_venda`,`tb_pedido_venda_tb_cliente_id_cliente`,`tb_produto_id_produto`,`tb_produto_tb_categoria_id_categoria`,`tb_produto_tb_adm_fornecedor_id_adm_fornecedor`,`tb_produto_tb_adm_fornecedor_tb_fornecedor_id_fornecedor`),
  KEY `fk_tb_item_venda_tb_pedido_venda1_idx` (`tb_pedido_venda_id_venda`,`tb_pedido_venda_tb_cliente_id_cliente`),
  KEY `fk_tb_item_venda_tb_produto1_idx` (`tb_produto_id_produto`,`tb_produto_tb_categoria_id_categoria`,`tb_produto_tb_adm_fornecedor_id_adm_fornecedor`,`tb_produto_tb_adm_fornecedor_tb_fornecedor_id_fornecedor`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_produto_venda`
--

LOCK TABLES `tb_produto_venda` WRITE;
/*!40000 ALTER TABLE `tb_produto_venda` DISABLE KEYS */;
INSERT INTO `tb_produto_venda` VALUES (56,45,3,2,8,1,1),(57,45,3,4,8,1,1),(58,45,3,6,5,1,1);
/*!40000 ALTER TABLE `tb_produto_venda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_produtos_adicionais`
--

DROP TABLE IF EXISTS `tb_produtos_adicionais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_produtos_adicionais` (
  `id_adicional` int NOT NULL AUTO_INCREMENT,
  `adicional` varchar(45) NOT NULL,
  `preco` decimal(7,2) NOT NULL,
  `status` varchar(45) NOT NULL,
  `tb_produto_id_produto` int unsigned NOT NULL,
  `tb_categoria_id_categoria` int unsigned NOT NULL,
  `tb_adm_fornecedor_id_adm_fornecedor` int unsigned NOT NULL,
  `tb_adm_fornecedor_tb_fornecedor_id_fornecedor` int unsigned NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_adicional`,`tb_produto_id_produto`,`tb_categoria_id_categoria`,`tb_adm_fornecedor_id_adm_fornecedor`,`tb_adm_fornecedor_tb_fornecedor_id_fornecedor`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_produtos_adicionais`
--

LOCK TABLES `tb_produtos_adicionais` WRITE;
/*!40000 ALTER TABLE `tb_produtos_adicionais` DISABLE KEYS */;
INSERT INTO `tb_produtos_adicionais` VALUES (1,'Picles',0.00,'ativo',2,8,1,1,'picles.jpg'),(2,'Hamburguer de Soja',5.00,'ativo',2,8,1,1,'burguersoja.png'),(3,'Picles',0.00,'ativo',4,8,1,1,'picles.jpg'),(4,'Hamburguer de Soja',5.00,'ativo',4,8,1,1,'burguersoja.png');
/*!40000 ALTER TABLE `tb_produtos_adicionais` ENABLE KEYS */;
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
  `id_usuario_adm` int DEFAULT NULL,
  `id_adm_fornecedor` int DEFAULT NULL,
  `id_fornecedor` int DEFAULT NULL,
  `descricao` varchar(150) DEFAULT NULL,
  `porcentagem_promocao` int DEFAULT NULL,
  `id_categoria` int DEFAULT NULL,
  `imagem_anuncio` varchar(45) DEFAULT NULL,
  `itens` int DEFAULT NULL,
  `tipo_promocao` varchar(45) DEFAULT NULL,
  `valor_compra` decimal(6,2) DEFAULT NULL,
  PRIMARY KEY (`id_promocao`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_promocao`
--

LOCK TABLES `tb_promocao` WRITE;
/*!40000 ALTER TABLE `tb_promocao` DISABLE KEYS */;
INSERT INTO `tb_promocao` VALUES (1,'FIRST','2030-12-25',15.00,'ativo',2,NULL,NULL,'Promoção para primeira compra do cliente, válida para todos os produtos e estabelecimentos.',NULL,0,'first_promocao.png',NULL,'compra',NULL),(2,'VERAO_ST','2022-12-09',NULL,'ativo',NULL,1,1,'Todos os hamburguers com desconto no verão, promoção válida para alguns produtos do estabeleciomento Starship Burguer.',5,8,'verao_st_promocao.png',NULL,'periodo',NULL),(3,'ACIMA50',NULL,NULL,'ativo',2,NULL,NULL,'Em uma compra de mais de 50,00 reais ganhe 5% de desconto',5,0,'acima50_promocao.png',NULL,'valor',50.00),(4,'ACIMA4',NULL,NULL,'ativo',NULL,1,1,'Comprando mais de 4 hamburguers ganhe 5% de desconto',5,8,'acima4_promocao.png',4,'itens',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_receitas`
--

LOCK TABLES `tb_receitas` WRITE;
/*!40000 ALTER TABLE `tb_receitas` DISABLE KEYS */;
INSERT INTO `tb_receitas` VALUES (1,'Bolo de Fubá','1- Preaqueça o forno a 180°C. Unte uma fôrma de bolo (usei uma de pudim com 20 cm de diâmetro) com óleo e polvilhe fubá para a massa não grudar.\r\n2- Bata no liquidificador o açúcar demerara para ficar mais fino. Isso irá facilitar na hora de misturar os ingredientes secos com os molhados.\r\n3- Em um recipiente grande misture o fubá, a farinha de trigo, o açúcar e o fermento.\r\n4- Adicione o leite de coco e o óleo aos poucos para não formar grumos.\r\n5- Transfira a massa para a fôrma preparada e asse por cerca de 40 minutos, ou até que um palito saia limpo ao ser inserido no centro do bolo.\r\n6- Espere esfriar e desenforme.',2,1,'#receita #vegano #trivegano #bolofuba','2022-07-24','vegan','     Farinha de trigo branca – 1 xíc. e 1/2 = 210 g\r\nFubá orgânico Monama- 1 xíc. = 140 g\r\nAçúcar demerara – 3/4 xíc. = 165 g\r\nLeite de coco (ou outro leite vegetal) – 1 xíc. e 1/3 – 330 ml\r\nÓleo de coco derretido (ou outro óleo vegetal) – 1/3 xíc. = 80 ml\r\nFermento químico em pó – 1 colher de sopa       '),(2,'Focaccia com Tomate Cereja','Reúna todos os ingredientes;\r\nEm um recipiente, adicione a farinha, o sal e misture. Em seguida, acrescente 1 colher de chá de azeite e não mecha;\r\nEm outro recipiente, coloque a água e o fermento, mas não misture;\r\nDespeje a água com fermento na farinha com azeite e misture bem até formar uma massa. Sove a massa, com as mãos, por cerca de 10 minutos;\r\nTransfira para uma tigela, tampe com um pano e deixe descansar por 40 minutos;\r\nColoque a massa em uma forma untada e polvilhada com fubá, preenchendo todo o espaço;\r\nFaça vários furinhos na massa com o dedo, despeje um pouco de azeite por cima e adicione os tomates-cerejas nos buraquinhos;\r\nSalpique a flor de sal e cubra ela com um pano úmido (em contato com a massa) e deixe descansar por 45 minutos ou até ela crescer e alargar;\r\nRetire o pano, pincele a gema e leve ao forno preaquecido a 200 ºC por cerca de 45 a 55 minutos;\r\nAgora é só servir.',2,1,'#focaccia #receitas #vegano  #trivegano','2022-07-24','vegan','    500 gramas de farinha de trigo\r\n1 colher de sobremesa de sal\r\nAzeite a gosto\r\n325ml de água filtrada\r\n2 colheres de chá de fermento biológico seco\r\nFubá para untar\r\nTomate-cereja a gosto\r\nFlor de sal a gosto\r\n1 gema misturada com 1 colher de sopa de água (opcional)    '),(3,'Waffles Sem Glutén','1- Em um recipiente coloque todos os ingredientes secos, misture até ficar homogêneo.\r\n2- Adicione os ingredientes molhados e misture bem até incorporar. Se o óleo de coco estiver sólido, esquente por alguns segundos no micro-ondas ou em banho maria até derreter.\r\n3- Preaqueça a máquina de waffles e unte com um pouco de óleo.\r\n4- Despeja a massa e espalhe até cobrir o molde do aparelho. Feche a tampa e deixe assar até a massa ficar dourada.\r\n5- Sirva imediatamente enquanto estão quentinhos com a cobertura desejada.\r\n\r\nDICAS: Para manter os waffles aquecidos enquanto você estiver preparando os demais, armazene no forno preaquecido a 160ºC.\r\n\r\nNOTA: Se você não quiser waffles sem glúten, é possível substituir a mistura de farinha sem glúten pela farinha de trigo – 1 xíc. de farinha de trigo branca e 1/2 xíc. de farinha de trigo integral.\r\n\r\nEssa receita rendeu 5 waffles de 12 cm² cada.',2,1,'#waffles #vegano #trivegano#semgluten','2022-07-24','vegan',' Mistura de farinha sem glúten (receita aqui – ver NOTA) – 1 xíc. e 1/2 = 225g\r\nIogurte de arroz, amêndoas ou coco Vida Veg – 1 xíc. = 250ml\r\nAçúcar mascavo – 1/4 xíc. = 35g\r\nÓleo de coco derretido (ou outro óleo vegetal) – 1/4 xíc = 60ml\r\nFermento – 1 colher de chá '),(4,'Cracker Salgado','1- Preaqueça o forno a 200ºC.\r\n2- Em uma tigela coloque todos os ingredientes secos e misture. Adicione o azeite e a água lentamente até formar uma bola de massa. Misture e amasse com a mão.\r\n3- Coloque a massa sobre uma folha de papel manteiga e pressione com os dedos para espalhar. Coloque outra folha de papel manteiga em cima da massa e usando um rolo abra a massa finamente. Quanto mais fina a massa ficar, mais leve e crocante serão os crackers.\r\n4- Retire a camada superior de papel manteiga e corte os crackers do tamanho que preferir.\r\n5- Transfira para uma assadeira coberta com papel manteiga (usei duas assadeiras e o mesmo papel que abri a massa) e leve ao forno preaquecido por cerca de 20 minutos, ou até que os crackers estejam com as bordas douradas. CUIDADO: depois de dourar as bordas eles queimam com facilidade, fique de olho após 15 minutos no forno.\r\n\r\nEssa receita rende um pote de 500 ml cheio.',2,2,'#cracker #vegano #trivegano #receita','2022-07-24','vegan',' Farinha de grão de bico – 2 xícaras = 260g\r\nÁgua – 7 colheres de sopa = 105 ml\r\nAzeite (ou óleo vegetal) – 1/4 xícara = 60 ml\r\nGergelim preto (ou branco) – 2 colheres de sopa = 15 g (opcional)\r\nPáprica doce – 2 colheres de chá\r\nFermento químico – 1 colher de chá\r\nSal – 1 colher e 1/2 de chá '),(5,'Pão sem glúten','Modo de Preparo:\nEm uma tigela adicione a farinha de arroz, fécula de mandioca, sal, açúcar, vinagre, óleo e fermento. Misture tudo até ficar homogêneo;\nColoque no liquidificador o inhame ralado e a água morna. Triture bem até ficar cremoso;\nAdicione o creme de inhame aos demais ingredientes. Misture tudo por cerca de 3 minutos até a massa ficar homogênea. Ela irá ficar mole e grudenta;\nUnte uma fôrma de pão (usei uma com 24cm x 10cm) com óleo. Despeja a massa e distribua uniformemente. Espalhe as sementes escolhidas sobre o pão (opcional);\nDeixe o pão descansar em algum lugar quentinho por 30 minutos para crescer;\nLeve ao forno preaquecido a 200ºC por cerca de 40 minutos, ou até o pão ficar dourado;\nCom cuidado retire o pão da fôrma e deixe esfriar;\nDepois de frio, embrulhe em um pano de prato e guarde em local fresco e seco por até 5 dias.\nDica: Como é possível ver nas fotos, a parte de cima do pão não está tão dourada quanto dos lados. Para deixar dourado em cima espalhe um fio de óleo vegetal por cima antes de assar.\n',3,2,'#receita #pão #vegetariano','2022-08-08','vegan','Ingredientes:\n2 xíc. de farinha de arroz\n1 xíc. de inhame cru ralado\n1 xíc. de fécula de mandioca/polvilho doce ou fécula de batata\n1 xíc. de água morna\n1 colher de chá de sal\n1 colher de chá de açúcar mascavo\n1 colher de chá de vinagre de maçã\n10g de fermento biológico\n2 colheres de sopa de óleo vegetal\n2 colheres de sopa de sementes (opcional) usei sementes de abóbora e girassol\n'),(6,'Tapioca Doce','Modo de preparo:\nGoma de tapioca:\n1- Coloque a quantidade que desejar de polvilho doce em uma tigela e adicione um pouco de água e uma pitada de sal, misture bem até ficar no ponto enfarinhado. Quando você colocar água no polvilho ele irá endurecer, mas isso é normal, deve-se ir quebrando em blocos menores com as mãos. A quantidade de água varia de acordo com a quantidade de polvilho usado, o objetivo de usá-la é para hidratar e não encharcar, então cuidado com a quantidade.\n \nA tapioca em si:\n2- Aqueça uma frigideira em fogo médio e espalhe a goma de tapioca passando por uma peneira até preencher o fundo da frigideira com uma camada da espessura que preferir. Tampe a frigideira e deixe por alguns minutos.\n3- A tapioca estará no ponto quando você mexe a frigideira e ela se desgrudar, quando ocorrer isso vire-a com ajuda de uma espátula e recheie a gosto. Eu prefiro fazer do jeito tradicional, que é colocar o recheio em metade da tapioca e dobrar ela, como nas fotos, mas se você quiser espalhar o recheio por toda ela e deixar aberto fique a vontade.\n',3,1,'#receita #vegetariana #tapioca','2022-08-08','vegan','Ingredientes:\nPara a massa:\nPolvilho doce\nPitada de sal\nÁgua\nRecheio opcional\n'),(7,'Mini-Abóboras Recheadas','Modo de preparo:\nLave e seque bem as mini abóboras. Corte uma tampa na parte do caule e com uma colher pequena, retire as sementes.\nTempere o interior com sal e pimenta em pó. Feche as mini abóboras com a tampa e embrulhe-as com papel manteiga.\nTransfira para uma assadeira e leve ao forno preaquecido a 200º por cerca de 30 minutos, ou até ficarem macias.\nEnquanto as mini abóboras estão assando, prepare o recheio. Em uma panela cozinhe a quinoa com água e sal até ficar macia ou ao dente (depende do seu gosto).\nEscorra a água e adicione as azeitonas e a cebolinha picada.\nEm uma frigideira aqueça o óleo vegetal e doure o alho.\nTransfira para a panela com a quinoa e misture até ficar homogêneo. Experimente e ajuste os temperos de acordo com o seu paladar.\nRetire as mini abóboras do forno e desembrulhe-as. Recheie com a quinoa e leve de volta ao forno por cerca de 5 minutos sem o papel manteiga.\nRetire do forno e sirva logo em seguida.\n',3,2,'#entrada #vegan #receita','2022-08-08','vegan','Ingredientes:\nAbóboras Mini Jack – 4 unidades = 480g aprox.\nQuinoa em grãos – 1/4 xícara = 60g aprox.\nAzeitonas picadas sem caroço – 6 unidades\nDente de alho picado – 1 unidade\nÓleo vegetal – o suficiente para dourar o alho\nSal, cebolinha e pimenta em pó a gosto\n'),(8,'Tofu Empanado','Modo de preparo:\nComece preparando a marinada. Coloque todos os ingredientes num recipiente e misture bem;\nTire o excesso de água do tofu com um pano limpo e seco (assim ele absorve melhor a marinada). Corte em cubinhos de mais ou menos 2 cm. Quanto menor for, mais em contato com a marinada irá ficar, e assim mais saboroso;\nColoque os cubinhos de tofu numa tigela. Despeja a marinada sobre eles e misture para envolver todos;\nCubra a tigela com um pano limpo ou filme de PVC e deixe marinar em temperatura ambiente por 30 minutos. Essa marinada pode ser preparada na véspera e conservada na geladeira, o sabor fica mais forte;\nColoque um pouco de farinha num prato e passe os cubinhos, um a um. Não retire o líquido da marinada que envolve eles;\nAgora existem duas opções de preparo, fritar ou assar:\n\n\nFRITAR: aqueça o óleo numa panela pequena. Coloque os cubinhos no óleo e deixe fritar por cerca de 1 a 2 minutos até dourarem levemente. Evite fritar todos de uma vez, e ao colocar no óleo evite mexer muito eles senão a farinha irá desgrudar do tofu. Depois de fritos, coloque-os sobre um papel toalha para tirar o excesso de gordura. Consuma logo em seguida.\nASSAR: unte uma fôrma com óleo. Espalhe os cubinhos sobre a fôrma sem encostar ou sobrepor um no outro para assarem por inteiro. Leve ao forno preaquecido a 200 °C por cerca de 15 minutos ou até dourarem levemente. Consuma logo em seguida.\n',3,2,'#receita #vegan #entrada','2022-08-08','vegan','Ingredientes:\nPara a marinada:\n2 colheres de sopa de óleo de gergelim tostado ou azeite de oliva\n2 colheres de sopa de mostarda\n3 colheres de sopa de água\n2 dentes de alho picados\n2 colheres de chá de ervas secas a gosto (usei orégano)\n1 colher de chá de sal\n \nPara o tofu empanado:\n250g de tofu firme\nFarinha de trigo (integral ou branco), farinha de rosca ou farinha de painço o suficiente para empanar\nÓleo vegetal para fritar (caso for assar não precisa)\n \n'),(11,'Lasanha de Abobrinha','Modo de preparo:\nCorte a abobrinha e os tomates em fatias finas no sentido horizontal, não precisar descascar os legumes. Para ter mais controle no corte das fatias da abobrinha, você pode cortar ela ao meio, sentido vertical, antes de fatiar;\nEm travessa (usei uma de 25cmx16cm) monte a lasanha. Comece com uma camada de abobrinha, depois com uma de tomate, de “cream cheese” de castanha e de molho pesto. Repita até terminar os ingredientes, ou até a altura/quantidade de lasanha desejado. Não precisa seguir essa ordem de camadas, varie do jeito que preferir;\nFinalize a lasanha com folhas de manjericão (opcional), sal e pimenta do reino (opcional) por cima.\n \nDica: Se você não quiser as fatias de abobrinha crocante, você pode marinar elas para que fiquem bem macias e suculentas. Para isso, deixe as fatias de molho por 1 hora na geladeira numa mistura de suco de meio limão, 1/4 de xícara de azeite de oliva e sal a gosto. Depois, retire as fatias da marinada e seque-as com pano para tirar o excesso de água, utilize normalmente na receita.\n',3,2,'#salada #vegetariano #receita','2022-08-08','vegan','Ingredientes:\n1 abobrinha italiana grande\n2 tomates médios\n1/2 xícara de “cream cheese” de castanha\nMolho pesto a gosto\nSal e pimenta do reino (opcional) a gosto\n \n'),(12,'Nhoque de Abóbora','Modo de preparo:\nPreaqueça o forno a 230 °C.\nRetire as sementes da abóbora com uma colher e envolva com papel manteiga ou alumínio.\nLeve ao forno preaquecido por cerca de 40 minutos ou até a polpa estiver macia.\nRetire do forno e, ainda quente, tire toda a polpa e transfira para um recipiente. Amasse bem com um garfo até formar um purê homogêneo, sem pedacinhos de abóbora. Reserve até esfriar.\nAdicione o fubá, a fécula de batata, o azeite de oliva, metade do sal e a pimenta do reino. Misture bem até obter uma bola de massa lisa e firme. Se necessário, adicione mais fubá.\nPolvilhe uma superfície lisa com um pouco de fubá e faça rolinhos com pequenas porções da massa. Corte em pedaços de aproximadamente 2 cm e reserve.\nLeve uma panela grande com água ao fogo alto. Assim que ferver adicione o restante do sal.\nCom o auxílio de uma escumadeira, mergulhe cerca de 10 nhoques por vez na água fervente. Deixe cozinhar até subirem à superfície. Retire os nhoques, escorrendo bem a água, e transfira para um recipiente. Adicione um fio de azeite enquanto ainda estão quentes e chacoalhe o recipiente até todos os nhoques estiverem envolvidos, assim eles não grudam um nos outros. Repita esse processo até cozinhar todos.\nSirva ainda quente com molho de tomate ou pesto de manjericão como na foto.\n \nEsta receita rende 3 porções.\n',3,2,'#receita #salgada #vegetariano','2022-08-08','vegan','Ingredientes:\nAbóbora japonesa/cabotiá – metade de uma grande (1 kg)\nFubá fino (ou farinha de trigo branca) – 1 xícara (140 g) + um pouco para modelar\nFécula de batata – 1/2 xícara (70 g)\nAzeite de oliva – 3 colheres de sopa (45 ml)\nSal – 2 colheres de chá (10 g)\nPimenta do reino – a gosto (opcional)\n'),(15,'Brownie de Castanha de Baru','Modo de preparo:\nHidrate as tâmaras colocando em um recipiente com água morna até cobrir por cerca de 15 minutos.\nEnquanto hidratam, coloque no processador a castanha de baru e triture em pedaços pequenos. Não precisa triturar muito, o ideal é deixar alguns pedaços para dar textura ao brownie. Reserve a castanha.\nDerreta o chocolate em banho maria com 100ml de água, até ficar liso e cremoso. Reserve.\nEscorra a água das tâmaras e transfira para o processador, bata até virar um purê. Se necessário, desligue o processador e raspe a lateral com uma colher para auxiliar o processo.\nAdicione a farinha de aveia, a castanha de baru e o chocolate derretido. Bata até ficar homogêneo.\nForre uma fôrma com papel manteiga para facilitar na hora de desenformar. Utilizei uma fôrma de pão de 24cm x 10cm.\nTransfira a massa para a fôrma e distribua uniformemente. Como a massa é densa e pegajosa, sugiro você usar as pontas dos dedos umedecidos com água para distribuir a massa com facilidade. Pressione para baixo até que fique lisa e firme.\nPolvilhe a gosto com castanha de baru picado (etapa opcional).\nLeve à geladeira por cerca de 1 hora ou até o brownie firmar.\nLevante o papel manteiga para desenformar. Corte os brownies no tamanho que preferir e sirva.\nGuarde os brownies em um recipiente hermético na geladeira por cerca de 5 dias.\n',3,1,'#receita #doce #vegetariano','2022-08-08','vegan','Ingredientes:\nFarinha de aveia – 1 xíc. = 110g\nTâmaras sem caroço – 1 xíc. = 145g\nChocolate 70% cacau picado – 1/2 xíc. = 70g\nCastanha de baru da Monama – 1/2 xíc. = 80g + um pouco para polvilhar (opcional)\nÁgua – 100ml\n'),(16,'Cookies de Aveia com Alfarroba','Modo de preparo:\nEm um recipiente adicione todos os ingredientes e misture até ficar homogêneo.\nModele os cookies do tamanho que preferir e disponha sobre uma assadeira. Indico você utilizar uma colher de sopa para medir a quantidade de massa pra cada um. Assim eles irão ficar iguais e pequenos, e assarão por inteiro e rapidamente.\nLeve ao forno preaquecido a 180°C por cerca de 15 minutos.\nRetire do forno e vire todos os cookies para assarem embaixo. Leve novamente ao forno por cerca de 10 minutos.\nRetire do forno e espere esfriar. Ao saírem do forno, os cookies devem estar levemente úmidos e macios. Ao esfriarem irão ficar sequinhos e crocantes.\nEsses cookies duram em média de duas semanas, se bem conservados num pote fechado em local seco e fresco.\n',3,1,'#receita #doce #vegetariano','2022-08-08','vegan','Ingredientes:\nAveia em flocos finos – 2 xícaras = 200g aprox.\nAçúcar mascavo – 1/2 xícara = 75g aprox.\nAlfarroba em pó (ou cacau em pó) – 3 colheres de sopa\nÓleo de coco derretido (ou outro óleo vegetal) – 3 colheres de sopa\nÁgua – 1/4 xícara = 60ml\n'),(18,'Pudim de Tapioca com Coco','Modo de preparo:\nEm uma panela grande adicione o leite de coco, açúcar demerara e 1 xícara do coco ralado ou resíduo do leite de coco. Misture bem até ficar homogêneo.\nLeve ao fogo médio e adicione a tapioca granulada aos poucos, mexendo sempre para não empelotar. Continue mexendo em fogo médio até engrossar.\nUnte uma fôrma de pudim (a minha tem 20 cm de diâmetro) com o óleo vegetal e polvilhe com o restante do coco ralado (1/2 xícara).\nTransfira a mistura para a fôrma e deixe esfriar em temperatura ambiente.\nLeve à geladeira por cerca de 4 horas ou até gelar.\nDesenforme o pudim e polvilhe com mais coco ralado se desejar. Sirva gelado.\n',3,1,'#receita #sobremesa #vegetariano','2022-08-08','vegan','Ingredientes:\nTapioca granulada – 1 xícara e 1/2 = 290g aprox.\nCoco ralado ou resíduo do leite de coco – 1 xícara e 1/2 = 115g aprox.\nAçúcar demerara ou cristal – 1 xícara = 220g aprox.\nLeite de coco – 800 ml (usei leite caseiro)\nÓleo vegetal – 2 colheres de sopa (usei óleo de coco)\n'),(20,'Pão de Banana e Canela','Modo de preparo:\nEm uma bacia grande misture todos os ingredientes menos as bananas. Sove bastante até desgrudar das mãos, deixando crescer por 1 hora. Depois, acrescente as bananas, dividindo em 6 pães. Deixe-os crescer novamente em assadeiras untadas com manteiga. Asse em forno médio, pre-aquecido até que dourem por cima, como nas fotos. Se sobrar muito, corte em fatias e congele. Aí, basta aquecer novamente no forno para ter sempre um pão fresquinho à mão.\n',3,1,'#receita #pão #vegetariano','2022-08-08','vegan','Ingredientes:\n2 xícaras e meia de farinha de trigo branca\n1 colher (chá) de canela\n4 colheres (sopa) de açúcar demerara\n3 colheres (sopa) de óleo vegetal\n1 pacote de fermento biológico seco\n2 banana-nanicas médias\n1 xícara de leite de soja ou outro leite vegetal em temperatura ambiente ou até morninho\n'),(21,'Granola Caseira','Modo de preparo:\nMisture tudo numa bacia grande, com exceção da uva passa e das castanhas. Depois, disponha numa assadeira (eu precisei dividir em duas) e coloque para assar em temperatura média até que a aveia fique dourada.\nAcrescente a uva passa e as castanhas.\nEspere esfriar e reserve num pote fechado para que não murche. Afinal, a queremos bem crocante.\n',3,1,'#receita #vegetariano #cafédamanhã','0000-00-00','vegan','Ingredientes:\n2 ½ xícaras (chá) de aveia prensada\n1 xícara (chá) de castanha de caju e do pará\n1 xícara (chá) de farelo de trigo\n2 xícaras (chá) de sementes (gergelim, chia, linhaça)\n1 xícara (chá) de gérmen de trigo\n1 colher (café) de canela em pó\n1 xícara (chá) de mel (glicose de milho)\n½ xícara (chá) de óleo\n1 pitada de sal\n1 xícara (chá) de uva passa\n½ xícara (chá) de lascas coco seco (se encontrar)\n2 xícaras (chá) de flocos de milho\n'),(22,'Leite de Coco Caseiro','Modo de preparo:\nPré-aqueça o forno a 240ºC, retire toda a água de um coco seco, coloque ele em uma assadeira e leve para assar por 15 minutos ou até ficar bem rachado. É importante retirar toda a água do coco para não correr o risco de se queimar quando for abrir.\nEspere ficar morno e dê leves marteladinhas para ajudar a quebrar o restante que faltou. Separe a casca da polpa com o auxílio de uma faca sem ponta. Pique esta polpa em pedaços menores.\nEm um liquidificador, coloque esta polpa de coco, adicione a água quente e bata por 3 minutos. Se o seu liquidificador for pequeno, divida em duas partes.\nEspere ficar morno para não se queimar e em seguida coe com o auxílio de um pano limpo ou peneira bem fina.\n',3,7,'#receita #bebida #vegetariano','2022-08-08','vegan','Ingredientes:\n1 coco seco (2 xícaras e meia de coco picado ou cerca de 250g)\n3 xícaras (de chá) de água quente (cerca de 720ml ou mais se preferir mais fino)\n'),(23,'Polenta ao Molho Bolonhesa','Modo de preparo:\nHidrate a proteína de soja e pique os ingredientes. Eu costumo colocar a proteína de soja em uma vasilha, cubro com o dobro de água em temperatura ambiente e deixo de molho até ficar macia, o que geralmente leva 10 minutos. Escorro, lavo bem (para tirar aquele gosto forte e característico dela) e em seguida espremo muito bem (para não ficar esponjosa).\nPrepare o molho. Em uma panela em fogo médio, coloque um fio de óleo e refogue os dentes de alho picados até dourar. Acrescente a cebola e refogue mais um pouco. Adicione a proteína de soja, tempere com sal a gosto e adicione o pimentão picado. Refogue até a soja ficar levemente dourada, o que vai levar cerca de 5 minutos. Desta forma a proteína de soja ficará mais sequinha, e não borrachuda.\nAdicione o molho de tomate, a água e deixe ferver. Acrescente as azeitonas, o milho e a ervilha e deixe cozinhando por uns 2 minutinhos.\nAcrescente o cheiro verde picado, regue com azeite a gosto, misture, desligue e reserve.\nEm uma vasilha, coloque o fubá e a água, mexa e deixe descansando por 10 minutos.\nEm uma outra panela, alta de preferência, e em fogo médio, refogue os outros dentes de alho picados até dourar. Acrescente a água, tempere com uma pitada de sal, e acrescente o creme de cebola. Deixe ferver.\nQuando estiver fervendo, abaixe o fogo e adicione a mistura do fubá com a água aos poucos e mexa sempre. Prove o sal e corrija se necessário. Você precisará misturar por cerca de 10 minutos, ou até a polenta estar cremosa e grossa.\nColoque em uma vasilha, cubra com molho e está pronto!\n\n',3,2,'#almoço #salgado #receita #vegetariano','2022-08-08','vegan','Ingredientes:\n2 xícaras (de chá) de fubá\n2 xícaras (de chá) de água\n2 dentes de alho grandes picados\n1/2 xícara (de chá) de creme de cebola (sopa de cebola) – opcional, caso não quiser usar, adicione 1 dente de alho a mais\n3 xícaras (de chá) de água\nSal a gosto\nÓleo\nSugestão: Molho Bolonhesa de PTS\n2 dentes de alho grandes picados\n1/2 cebola grande picada\n1 xícara (de chá) de proteína de soja hidratada e escorrida\n1/2 xícara (de chá) de pimentão picado\n1 pacote de molho de tomate (340g)\n1/2 xícara (de chá) de água\n1/2 xícara (de chá) de azeitonas picadas\n1/2 lata de milho e 1/2 lata de ervilha (ou uma lata de dueto)\n1/2 xícara (de chá) de cheiro verde picado\nSal a gosto\nAzeite a gosto'),(24,'Salpicão com Carne de Jaca','Modo de preparo:\nLave e pique os ingredientes conforme a descrição. Também cozinhe os cubinhos de batata em água quente até ficarem macios (basta atravessar uma faca por eles com facilidade). Para preparar o salsão, retirei a casca com uma faca e depois piquei bem.\nEm uma vasilha grande, coloque a cenoura ralada, a maçã verde picada, o milho, o salsão, a azeitona picada, os cubinhos de batata cozidos, a ervilha, a uva passa e, se quiser, acrescente a carne de jaca desfiada.\nAdicione a maionese vegana de sua preferência, a mostarda, o suco de limão, a salsinha e cebolinha picadas e tempere com sal e pimenta moída a gosto. Misture bem, cubra com um plástico e leve a geladeira por pelo menos duas horas antes de servir.\nColoque em uma travessa bonita e, se quiser, salpique batata palha por cima. Está pronto!\n',3,2,'#almoço #receita #vegetariano','2022-08-08','vegan','Ingredientes:\n1 xícara (de chá) de cenoura ralada\n1/2 xícara (de chá) de maçã verde picada\n1/2 xícara (de chá) de milho em conserva\n1/2 xícara (de chá) de salsão bem picado\n1/2 xícara (de chá) de azeitonas picadas\n1 xícara (de chá) de cubinhos de batata cozidos\n1 xícara (de chá) de ervilha\n1/2 xícara (de chá) de uva passa\n1 xícara (de chá) de carne de jaca desfiada\n1/2 xícara (de chá) de maionese vegana\n1 colher (de sopa) de mostarda\nSuco de meio limão\n1/2 xícara (de chá) de salsinha e cebolinha picadas\nSal e pimenta moída a gosto\nBatata palha (opcional)\n'),(25,'Strogonoff de Berinjela',' \nModo de preparo:\nReúna todos os ingredientes;\nHigienize a berinjela e corte ela em cubinhos de cerca de 2,5 cm;\nTransfira para uma bacia com água, vinagre e deixe de molho por 10 minutos;\nEm uma panela, esquente o azeite e refogue o alho, a cebola até dourarem;\nEscorra as berinjelas, adicione na frigideira, tempere com sal e deixe refogar por cerca de 5 minutos (elas devem ficar moles, mas não muito);\nDespeje o molho de tomate, a água, a mostarda, misture bem e deixe ferver;\nAcrescente o leite de aveia, acerte o sal, misture e deixe engrossar;\nDesligue o fogo, salpique o cheiro-verde e sirva.\nSirva com arroz branco feito com leite de coco ao invés de água – fica delicioso. Adicione folhas de manjericão fresco, traz um perfume ótimo.\n',3,2,'#receita #salgado #vegetariano','2022-08-08','vegan','Ingredientes:\n2 berinjelas médias picadas (cerca de 600 gramas)\nAzeite a gosto\n3 dentes de alho picados\n1 cebola média picada\nSal a gosto\n2 xícaras de chá de molho de tomate\n1/2 xícara de chá de água\n2 colheres de sopa de mostarda amarela\n1 e 1/2 de xícara de chá de leite de aveia\n1 xícara de chá de cheiro-verde picado\n'),(26,'Biscoito de Banana e Aveia','Modo de preparo:\nPré-aqueça o forno a 180ºC. Em uma vasilha, coloque a banana amassada, a aveia em flocos finos, o óleo vegetal, o fermento, a canela e misture. Se gostar, adicione as uvas passas e as castanhas picadas. Misture bem, até ficar uniforme.\nColoque esta massa com o auxílio de duas colheres sobre uma assadeira forrada com papel manteiga, ou forma antiaderente levemente untada, e leve para assar por 20 minutos ou até ficarem bem sequinhos. Remova com cuidado do papel. \n',3,1,'#lanches #doce #vegetariano #receita','2022-08-08','vegan','Ingredientes:\n1 xícara (de chá) de banana nanica amassada (cerca de 2 bananas grandes)\n1 xícara (de chá) de aveia em flocos finos\n1 colher (de sopa) de óleo vegetal (usei o de coco)\n1 colher (de chá) de fermento químico em pó\nCanela em pó a gosto (opcional)\n1/4 de xícara (de chá) de uvas passas (opcional)\n1/4 de xícara (de chá) de castanha do Para picadas (opcional)\n'),(27,'Bolinho de Inhame','Modo de preparo:\nEm uma tigela, misture bem o inhame, óleo de coco sem sabor, sal, ervas finas e alho amassado.\nAcrescente o polvilho doce e mexa até ficar uma massa homogênea, que não grude nas mãos.\nCaso necessário acrescente mais polvilho.\nUnte uma forma.\nFaça bolinhas com a massa do tamanho que preferir.\nAsse em forno pré-aquecido à 200 graus por 30-40 minutos.\n',3,2,'#lanches #receita #vegetariano','2022-08-08','vegan','Ingredientes:	\n1 xícara de inhame cru ralado\n3 colheres de sopa de óleo de coco sem sabor ou azeite de oliva\n1/2 colher de chá de sal\n2 colheres de chá de ervas finas\n1 dente de alho amassado\n3/4 xícara de polvilho doce\n'),(28,'Esfiha de Espinafre','Modo de preparo:\nNuma tigela grande dissolva completamente o fermento no açúcar e no sal. Junte a água, que deve estar morna, e depois acrescente os demais ingredientes, adicionando a farinha de trigo por último e aos poucos.\n',3,2,'#receita #salgada #vegetariano','2022-08-08','vegan','Ingredientes:\nMassa\n1 tablete de fermento biológico fresco (ou seco)\n300 ml de água morna\n100 ml de óleo\n1 colher (sobremesa) de sal\n1 colher (sobremesa) de açúcar\n5 xícaras de farinha de trigo (pode misturar branca com integral)\nRecheio\n3 maços de espinafre\nalho e cebola\nsal a gosto\npimenta calabresa (opcional)\n'),(29,'Hambúrguer de Grão-de-Bico ','Modo de Preparo:\nColoque o grão-de-bico de molho por 8 horas\n\nEm uma panela de pressão, cozinhe por 10 minutos após pegar pressão\n\nEscorra a água que sobrou e passe o grão-de-bico por um processador ou liquidificador (na função pulsar) até obter uma massinha\n\nColoque essa massinha em uma vasilha e reserve\n\nEm uma panela aqueça o azeite de oliva e doure a cebola e o alho\n\nAcrescente o alho e a cebola na massa do grão-de-bico juntamente com os temperos, o suco do limão, o sal e a farinha\n\nMisture até obter uma massa modelável e modele seus hambúrgueres\n\nCaso não esteja modelável ainda, acrescente um pouco mais de farinha, mas com cuidado para não secar a massa\n\nPara conservar, você pode congelar os hambúrgueres',3,2,'#receita #salgada #vegetariano','2022-08-08','vegan','Ingredientes:\n1 xícara de grão-de-bico\n1/2 cebola picada\n2 dentes de alho picados\n2 colheres (sopa) de azeite de oliva\n2 colheres (sopa) de suco de limão\n1/4 de xícara de farinha de trigo\ncheiro verde a gosto\norégano a gosto\ncominho a gosto\npáprica doce a gosto\nsal a gosto'),(30,'Batata ao Murro','Modo de preparo:\nLave bem suas pequenas batatas e as coloque em uma panela com bastante água e deixe-as cozinhando até que fiquem macias, faça um teste enfiando um garfo nelas a cada 5 minutos após os 10 primeiros min. de cozimento.\nEscorra a água de cozimento, jogue um pouco de água corrente sobre as batatas para resfriá-las.\nColoque um pano de prato limpo sobre uma bancada, posicione uma batatinha sobre o pano de prato, dobre o pano de prato sobre a batata e dê um leve ‘murro’ para dar uma esmagadinha na batata (não é para destroçá-la ok!?), desdobre o pano de prato e coloque a batata num prato reservando-a, faça isso com todas as batatas.\nDepois de esmurrar as batatas coloque uma quantidade generosa de azeite ou margarina vegetal em uma frigideira (é pra forrar todo o fundo da frigideira), e vá adicionando as batatas uma ao lado da outra, em fogo médio enquanto ‘fritam’ adicione sal, temperos em pó (eu coloquei pimenta, cominho e louro nas minhas), vire as batatas para que doure do outro lado e finalize colocando temperos frescos ou orégano.\n',3,2,'#receita #salgado #vegetariano','2022-08-08','vegan','Ingredientes:\nBatatas inglesa pequenas\nSal e temperos a gosto\nOrégano ou temperos frescos para temperar\nÁgua o quanto baste para cozinhar\nAzeite ou margarina vegetal para fritar\n'),(31,'Pizza com Massa de Mandioca','Modo de preparo:\nUnte o prato ou tabuleiro com azeite ou óleo vegetal.\nColoque todo o aipim amassado no prato/tabuleiro e com os dedos espalhe bem por toda a superfície, a ideia é unir essa massa de aipim para que seja possível cortar os pedaços depois.\nPasse o molho de tomate por cima, coloque o seu queijo vegetal, se você não tiver ou não quiser usar um queijo vegetal use uma pastinha daquelas de soja.\nComplete com um toque de orégano e adicionando por cima os ingredientes que você mais gosta eu fiz a minha apenas com tomate.\nPara terminar você pode colocar no forno até que doure ou no microondas por aproximadamente 5 minutos.\n',3,2,'#receita #salgado #vegetariano','2022-08-08','vegan','Ingredientes:\nAipim cozido com sal, escorrido e amassado.\nMolho de tomate\nQueijo vegetal ou uma pasta de sua preferência\nAzeite ou óleo para untar o prato ou o tabuleiro\nOrégano, tomates, azeitonas\n'),(32,'Doce de Abóbora','Modo de preparo:\nNuma panela média coloque a abóbora, a canela, os cravos, o vinagre e a água. Tampe e deixe cozinhar em fogo médio até a abóbora ficar desmanchando. Se a água secar pode pingar um pouquinho mais.\nRetire a canela e os cravos. Nesse momento, se a preferência for por um doce mais cremoso, passe a abóbora numa peneira ou bata com o mixer na panela mesmo. Se gostar do doce com mais textura (eu prefiro assim) amasse a abóbora com um garfo para desmanchar.\nJunte o açúcar, misture e deixe cozinhar em fogo médio-alto com a panela destampada até restar pouco líquido.\nAproveite para untar a bancada ou uma assadeira com manteiga.\nComece a mexer o doce com uma colher de pau ou espátula de silicone como se fosse brigadeiro, até o líquido secar e desprender do fundo da panela. Nesse momento é importante não deixar cozinhar demais, senão o doce açucara totalmente quando esfria e vira uma rapadurinha de abóbora.\nPasse o doce da panela para a bancada ou assadeira untada. Deixe amornar e firmar e corte os corações. Deixe descansar por algumas horas (deixei umas 3 horas) e vire para secar o outro lado.\n',3,1,'#receita #doce #vegetariano','2022-08-08','vegan','Ingredientes:\n700g de abóbora seca, descascada e cortada em cubos\n1 pauzinho de canela\n6 cravos\n1/2 xícara de água\n1 colher de chá de vinagre\n700g de açúcar cristal\n'),(33,'Torta de Sorvete de Morango','Modo de preparo:\nComece preparando a crosta colocando as tâmaras de molho em água morna por cerca de 15 minutos.\nColoque as oleaginosas em um processador e triture bem até obter pedaços pequenos. Se necessário, desligue o processador de vez em quando e raspe a lateral com uma colher.\nEscorra a água das tâmaras e coloque no processador junto com as oleaginosas. Triture bem até obter uma farofa grossa e pegajosa.\nTransfira a mistura para uma fôrma. Cubra todo o fundo e um pouco das laterais pressionando a mistura com as pontas dos dedos. Certifique-se que esteja bem vedado a lateral com a crosta para não escorrer a cobertura, caso esteja usando uma fôrma com fundo falso.\nReserve a crosta e prepare a cobertura. Em um liquidificador adicione todos os ingredientes. Bata bem até ficar homogêneo.\nTransfira a mistura para a fôrma e leve ao congelador por no mínimo 4 horas, ou até congelar por inteiro.\nRetire do congelador pelo menos 10 minutos antes de servir. Conserve no freezer.\n',3,1,'#receita #doce #vegetariano','2022-08-08','vegan','Ingredientes:\npara a crosta:\n2 xícaras de oleaginosas a gosto (mistura de amêndoas, nozes e castanha de caju)\n20 tâmaras sem caroço\npara a cobertura:\n3 xícaras de morangos\n1 litro de leite de coco \n1/2 xícara de óleo de coco derretido\n1/2 xícara de açúcar cristal\n'),(34,'Cupcake de Coco','Modo de Preparo da Massa:\nMisturar bem (à mão ou com batedeira) todos os ingredientes até que fique homogêneo.\nModo de Preparo do Ganache:\nLevar o chocolate vegano (sem leite) ao microondas de 1 em 1 minuto, mexendo nos intervalos até que esteja derretido. Acrescentar o creme de soja, aos poucos, mexendo sempre, até que fique cremoso.\nMontagem:\nColocar metade da massa na forminha própria para cupcake, colocar um pouco da ganache e completar com a massa. Assar em forno pré aquecido, a 250°C até assar. Decorar com a ganache em saco de confeiteiro\n\n',3,1,'#receita #doce #vegetariano','2022-08-08','vegan','Massa:\n1 1/2 xícara (chá) de trigo integral\n1 1/2 xícara (chá) de trigo refinado\n1 1/2 xícara (chá) de açúcar\n2 xícaras (chá) leite de coco\n1 xícara (chá) de coco ralado (sem açúcar)\n1 xícara (chá) água\n1 colher (sopa) de fermento em pó\n1 xícara (chá) de óleo\nGanache de Chocolate:\n1 barra de chocolate amargo ou meio-amargo\n1 caixinha de creme de soja (Soymilk/ Olvebra/ Naturis/ Batavo)\n'),(45,'Chocolate Quente','COMO FAZER:\r\n1- Coloque todos os ingredientes numa panela pequena e misture até todo o cacau em pó se dissolver no leite. Isso irá demorar um pouco porque é difícil dissolver o cacau em líquidos. Se preferir bata todos os ingredientes no liquidificador, esse é o jeito mais rápido e fácil de misturar. Faça isso antes levar ao fogo;\r\n2- Leve a panela ao fogo médio mexendo sem parar. Mexa até engrossar no ponto que preferir;\r\n3- Retire do fogo, transfira para uma xícara e polvilhe com canela em pó (opcional). Beba logo em seguida.',2,1,'#vegano;#receita;#chocolatequente','2022-09-26','vegan','INGREDIENTES:\r\n1 xíc. de leite de aveia – receita aqui (ou outro leite vegetal)\r\n3 colheres de sopa de açúcar mascavo\r\n1/2 colher de sopa de cacau em pó\r\n1/4 colher de chá de essência de baunilha\r\nUma pitada de sal (serve para realçar o sabor)'),(48,'Coxinha de Jaca','Modo de Preparo da Coxinha de Jaca Verde\r\nComece fazendo o recheio: Descasque e pique o alho e a cebola, coloque-os em uma panela com 2 colheres de sopa de azeite e deixe em fogo baixo para dourar por aproximadamente 5 minutos.\r\n\r\nMisture a carne de jaca, coloque o molho de tomate, sal e temperos a gosto, deixe cozinhar por mais 5 minutos e desligue o fogo.\r\n\r\nAgora é a vez da massa, antes de começar higienize uma bancada para poder trabalhar a massa depois de pronta.\r\n\r\nEm uma panela coloque para ferver a água com os temperos, sal e óleo. Enquanto a água ferve peneire a farinha de trigo e reserve.\r\n\r\nAssim que ferver deixe o fogo em potência baixa e acrescente toda a farinha de uma única vez, misture sem parar com uma colher tentando desfazer todos os grumos de farinha.\r\n\r\nAssim que a massa ficar firme e desgrudando do fundo da panela passe-a para a bancada, e com a colher vá amassando-a até que seja possível colocar as mãos.\r\n\r\nForme uma massa lisa e homogênea que não grude nas mãos.\r\n\r\nDepois é só modelar as coxinhas como mostro nas fotos abaixo.\r\n\r\nAo terminar de modelar passa as coxinhas na água fria e depois na farinha de rosca, frite em óleo quente ou congele por até 3 meses!',2,2,'#coxinha;#jaca;#vegana;#receita','2022-09-26','vegan','Ingredientes da massa\r\n3 Xícaras de água\r\n1 Colher de sopa de temperos em pó de sua preferência (para a massa ficar mais amarelada use açafrão ou curry)\r\n1 Colher de sopa de sal\r\n3 Colheres de sopa de óleo\r\n3 Xícaras de farinha de trigo\r\nIngredientes do recheio \r\n2 Xícaras de carne de jaca\r\n1 Xícara de molho de tomate\r\n3 Dentes de alho\r\n1 Cebola pequena\r\n2 Colheres de sopa de óleo\r\nSal e temperos a gosto\r\nPara finalizar \r\nÁgua gelada\r\n1 Xícara de farinha de rosca\r\nÓleo o quanto baste para fritar\r\n');
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
  `foto` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_usuario_adm`),
  UNIQUE KEY `email_usuario_adm_UNIQUE` (`email_usuario_adm`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_usuario_adm`
--

LOCK TABLES `tb_usuario_adm` WRITE;
/*!40000 ALTER TABLE `tb_usuario_adm` DISABLE KEYS */;
INSERT INTO `tb_usuario_adm` VALUES (1,'Ana Julia','123','ativo','tccnavegano@gmail.com',NULL),(2,'Geovana','1307','ativo','geovanapederneschi@gmail.com','steve.png\n'),(3,'Eric','123','ativo','tccnavegano2@gmail.com',NULL),(4,'Melissa','123','ativo','tccnavegano3@gmail.com',NULL),(5,'Mateus','123','ativo','tccnavegano4@gmail.com',NULL),(6,'Gabriel','123','ativo','tccnavegano5@gmail.com',NULL);
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

-- Dump completed on 2022-11-07  1:19:34
