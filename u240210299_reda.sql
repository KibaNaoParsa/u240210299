-- MySQL dump 10.16  Distrib 10.2.23-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: u240210299_reda
-- ------------------------------------------------------
-- Server version	10.2.23-MariaDB

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
-- Table structure for table `aluno`
--

DROP TABLE IF EXISTS `aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aluno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `ano_entrada` varchar(4) NOT NULL,
  `recupera` int(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_turma` (`id_turma`),
  CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aluno`
--

/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
INSERT INTO `aluno` VALUES (13,'Thaís Alves Fagundes','tataalvesfagundes@hotmail.com','246e4a55c1728eee0f266512e71641a5d9a39de4',6,'2016',NULL),(15,'Luan Sousa Reis','emaildoluanreis@gmail.com','e6c810520b62c9ca416e8ebdb4a789319f87e052',6,'2015',NULL),(16,'Isabela Santos de Souza','isabelasantoss001@gmail.com','4d52360f0dd44fb9abe07d426b7456c6afcfc0c5',6,'2016',NULL),(18,'Jeverson Gonçalves','jeversontp@gmail.com','ea3a56c6a1f0272ec675c598699add1d43e4cf12',6,'2016',0),(19,'Luana Calili Goffi Romeiro','luanacalili86@gmail.com','4a62e2691dfb61233d4c24fb29b31353fdc9b1f7',6,'2016',NULL),(20,'Rafaela Costa Alves','rafaela.costa.alves01@gmail.com','d2ae60c80c84c7531874a17f892fdce1a3c32f4f',6,'2016',NULL),(21,'Debora Nuccini Maciente','deboranuccini@outlook.com','dbde1fe32d2ecbab4a67a19d0aa7e8aa7c73595b',15,'2016',NULL),(22,'Igor Gregori S. Carlos','igorgcefet@gmail.com','efb348c5ade1b4f8bebb614bdf669dbe3cee5caa',6,'2016',NULL),(23,'Rayane Soares de Almeida','rayanesalmeida620@gmail.com','2049e501d27f56e78012b3afa887142d7fb747d3',6,'2016',NULL),(24,'Igor Marques Costa Bacellar','igormbacellar@gmail.com','642cfc21dbfcf1b9d34d3a82fa0b32581b694c89',6,'2016',NULL),(25,'Rebeca de Souza','rebecadsouza128@gmail.com','5519b76923ba33a76c31eb1e2d5439131fbc01fd',6,'2016',NULL),(26,'Thalita Maria de Souza Teixeira','thalitamaria62@gmail.com','b8cd39e30f4c3364dffd151a55096e8f25507acd',6,'2016',NULL),(27,'Thiago Silva Machado','machadothiago084@gmail.com','c54b688990ce13b57b063ffc181f0938095d0f85',6,'2018',NULL),(28,'Mariana Vianini Brito','marivianini7@gmail.com','3decd49a6c6dce88c16a85b9a8e42b51aa36f1e2',6,'2015',NULL),(29,'Gabriela de Moura Camargo','gamoura9@yahoo.com.br','9c97394e5314c2877d3d650201c216058e9888e3',6,'2016',NULL),(30,'Melissa Azevedo Vicente','mell-azevedo@outlook.com','ae69574790166f9e45f544a95f8b35e6b54ec3de',6,'2016',NULL),(31,'Júlia Lopes Olivier','julialopesoliviercefet@gmail.com','3963fb8f2811ea7e0cb6e8cec892a15226eda61b',6,'2016',NULL),(32,'Larissa Dionísio Ferrari','larissadferrari@outlook.com','91e58828a08fb412ea4bd39f3c55a90be2dc5f15',6,'2016',NULL),(33,'Diego Henrique Amaral Rodrigues','amaralrodriguesd@gmail.com','3c363836cf4e16666669a25da280a1865c2d2874',15,'2016',NULL),(35,'Matheus José Françoso Goulart Maiolini','matheus.jose507@gmail.com','1f6b75977dd77300e556b50737c3dafec12ba49e',6,'2015',NULL),(36,' Ruan Gustavo Abreu','ruangabreu@gmail.com','1ac66d8e53025160d210d3773739efcc64f123f4',6,'2015',NULL),(38,'Gabriel Aluno','gabriel2018@gmail.com','cff7a9d87e2a96c4ceaae3a413d5644a2eaeb43b',6,'2016',NULL),(39,'Henrique Manoel Vasconcelos Maciel','hmanoel47@gmail.com','27d5482eebd075de44389774fce28c69f45c8a75',6,'2018',531926),(41,'Isaac Bernardes Marques','ibernardesmarques@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b',6,'2016',NULL),(42,'Natália de Oliveira Caldeira','natycaldeira551@gmail.com','5b3e21e1ff50960614f57cc5f87b35b005caef89',15,'2018',NULL),(43,'Marcelly Faustino de Souza','marcellyfaustino@gmail.com','42b5bf53605aebc4a7624445a00d16ca206e2cca',15,'2018',NULL);
/*!40000 ALTER TABLE `aluno` ENABLE KEYS */;

--
-- Table structure for table `arquivos`
--

DROP TABLE IF EXISTS `arquivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arquivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_genero` int(11) NOT NULL,
  `caminho` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_genero` (`id_genero`),
  CONSTRAINT `arquivos_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arquivos`
--

/*!40000 ALTER TABLE `arquivos` DISABLE KEYS */;
INSERT INTO `arquivos` VALUES (1,9,'download_esquemas/CONTO.pdf',1),(2,9,'download_exemplos/CONTO.pdf',0),(3,13,'download_exemplos/NOTICIA.pdf',0),(4,13,'download_esquemas/NOTICIA.pdf',1),(11,15,'download_esquemas/APOLOGO.pdf\r\n',1),(12,15,'download_exemplos/APOLOGO.pdf\r\n',0),(18,14,'download_exemplos/ARTIGO_DE_OPINIAO.pdf',0),(19,14,'download_esquemas/ARTIGO_DE_OPINIAO.pdf',1),(20,16,'download_exemplos/COMENTARIO.pdf',0),(21,16,'download_esquemas/COMENTARIO.pdf',1),(22,26,'download_exemplos/SINOPSE.pdf',0),(23,26,'download_esquemas/SINOPSE.pdf',1),(24,25,'download_exemplos/RESUMO.pdf',0),(25,25,'download_esquemas/RESUMO.pdf',1),(26,24,'download_exemplos/REPORTAGEM.pdf',0),(27,24,'download_esquemas/REPORTAGEM.pdf',1),(28,23,'download_exemplos/RELATORIO.pdf',0),(29,23,'download_esquemas/RELATORIO.pdf',1),(30,22,'download_exemplos/RELATO.pdf',0),(31,22,'download_esquemas/RELATO.pdf',1),(32,21,'download_exemplos/MANUAL.pdf',0),(33,21,'download_esquemas/MANUAL.pdf',1),(34,20,'download_exemplos/FABULA.pdf',0),(35,20,'download_esquemas/FABULA.pdf',1),(36,19,'download_exemplos/EDITORIAL.pdf',0),(37,19,'download_esquemas/EDITORIAL.pdf',1),(38,18,'download_exemplos/DISSERTAÇÃO.pdf',0),(39,18,'download_esquemas/DISSERTAÇÃO.pdf',1),(40,17,'download_exemplos/CRONICA.pdf',0),(41,17,'download_esquemas/CRONICA.pdf',1);
/*!40000 ALTER TABLE `arquivos` ENABLE KEYS */;

--
-- Table structure for table `atividade`
--

DROP TABLE IF EXISTS `atividade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atividade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `data_limite` datetime NOT NULL,
  `bimestre` enum('1','2','3','4') NOT NULL,
  `valor` float NOT NULL,
  `id_genero` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_genero` (`id_genero`),
  KEY `id_tipo` (`id_tipo`),
  KEY `id_turma` (`id_turma`),
  CONSTRAINT `atividade_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id`),
  CONSTRAINT `atividade_ibfk_2` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_textual` (`id`),
  CONSTRAINT `atividade_ibfk_3` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atividade`
--

/*!40000 ALTER TABLE `atividade` DISABLE KEYS */;
INSERT INTO `atividade` VALUES (13,'Teste 2','<p>tewasdasd</p>','2018-12-13 00:00:00','4',10,26,4,6),(14,'Atividade nº 1','<p>Atividade para testar notas e Corre&ccedil;&otilde;es:</p>','2018-12-15 00:00:00','4',10,8,1,15),(18,'asdasdasd','<p>asdasdasdasdassd</p>','2018-12-13 00:00:00','4',12,8,2,6),(19,'teste','<p>asdasd</p>','2018-12-13 00:00:00','1',10,10,2,6),(20,'Teste de uso do sistema DIGGITTUS para alunas do BIC-Jr 2019','<p>Redigir uma carta argmentativa, sensibilizando pais e educadores sobre o uso de tecnologia aliada ao exerc&iacute;cio motor da escrita de m&atilde;o.</p>','2019-05-09 00:00:00','1',8,7,3,15);
/*!40000 ALTER TABLE `atividade` ENABLE KEYS */;

--
-- Table structure for table `convidados`
--

DROP TABLE IF EXISTS `convidados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `convidados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `convidados`
--

/*!40000 ALTER TABLE `convidados` DISABLE KEYS */;
/*!40000 ALTER TABLE `convidados` ENABLE KEYS */;

--
-- Table structure for table `correcao`
--

DROP TABLE IF EXISTS `correcao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `correcao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_professor` int(11) NOT NULL,
  `id_texto` int(11) NOT NULL,
  `nota` float NOT NULL,
  `comentarios` text NOT NULL,
  `data_correcao` date NOT NULL,
  `status` enum('Andamento','Finalizado','') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_professor` (`id_professor`),
  KEY `id_texto` (`id_texto`),
  CONSTRAINT `correcao_ibfk_1` FOREIGN KEY (`id_professor`) REFERENCES `professor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `correcao_ibfk_2` FOREIGN KEY (`id_texto`) REFERENCES `texto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `correcao`
--

/*!40000 ALTER TABLE `correcao` DISABLE KEYS */;
INSERT INTO `correcao` VALUES (16,1,69,2,'<p>wdwdw</p>','0000-00-00','Finalizado');
/*!40000 ALTER TABLE `correcao` ENABLE KEYS */;

--
-- Table structure for table `destaque`
--

DROP TABLE IF EXISTS `destaque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `destaque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_atividade` int(11) NOT NULL,
  `titulo` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `conteudo` text COLLATE utf8_unicode_ci NOT NULL,
  `autor` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_atividade` (`id_atividade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `destaque`
--

/*!40000 ALTER TABLE `destaque` DISABLE KEYS */;
/*!40000 ALTER TABLE `destaque` ENABLE KEYS */;

--
-- Table structure for table `exemplo`
--

DROP TABLE IF EXISTS `exemplo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exemplo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` text NOT NULL,
  `nome_arquivo` varchar(75) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `autor` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_genero` (`id_genero`),
  CONSTRAINT `exemplo_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exemplo`
--

/*!40000 ALTER TABLE `exemplo` DISABLE KEYS */;
INSERT INTO `exemplo` VALUES (1,'feeeeeeeeeeeeee','sucesso.jpg',7,'fffffffffffffffffffffffff');
/*!40000 ALTER TABLE `exemplo` ENABLE KEYS */;

--
-- Table structure for table `genero`
--

DROP TABLE IF EXISTS `genero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genero` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `caracteristicas` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genero`
--

/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` VALUES (7,'Carta',''),(8,'Ficção Científica',''),(9,'Conto',''),(10,'Piada',''),(11,'Ensaio',''),(12,'Livro Didáditico','Conteúdo do Livro Didático'),(13,'Notícia',''),(14,'Artigo de Opinião ',''),(15,'Apólogo',''),(16,'Comentário',''),(17,'Crônica',''),(18,'Dissertação',''),(19,'Editorial',''),(20,'Fabula',''),(21,'Manual',''),(22,'Relato',''),(23,'Relatório',''),(24,'Reportagem',''),(25,'Resumo',''),(26,'Sinopse','');
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;

--
-- Table structure for table `gerenciador_turma`
--

DROP TABLE IF EXISTS `gerenciador_turma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gerenciador_turma` (
  `id_gerenciador` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  KEY `id_gerenciador` (`id_gerenciador`),
  KEY `id_turma` (`id_turma`),
  CONSTRAINT `gerenciador_turma_ibfk_1` FOREIGN KEY (`id_gerenciador`) REFERENCES `professor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gerenciador_turma_ibfk_2` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gerenciador_turma`
--

/*!40000 ALTER TABLE `gerenciador_turma` DISABLE KEYS */;
INSERT INTO `gerenciador_turma` VALUES (3,6);
/*!40000 ALTER TABLE `gerenciador_turma` ENABLE KEYS */;

--
-- Table structure for table `professor`
--

DROP TABLE IF EXISTS `professor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `tipo_usuario` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professor`
--

/*!40000 ALTER TABLE `professor` DISABLE KEYS */;
INSERT INTO `professor` VALUES (1,'Diloca','edigonfer@gmail.com','a0ca80a6c991bf0494cbd16234e841c69733dd54',1),(3,'Gabriel','gabriel2018@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef',2),(10,'Isaac Bernardes Marques','ibernardesmarques@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef',2);
/*!40000 ALTER TABLE `professor` ENABLE KEYS */;

--
-- Table structure for table `texto`
--

DROP TABLE IF EXISTS `texto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `texto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` text NOT NULL,
  `conteudo` text NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `data_envio` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_atividade` int(11) NOT NULL,
  `situacao` enum('Em andamento','Enviado') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_aluno` (`id_aluno`),
  KEY `id_atividade` (`id_atividade`),
  CONSTRAINT `texto_ibfk_1` FOREIGN KEY (`id_aluno`) REFERENCES `aluno` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `texto_ibfk_2` FOREIGN KEY (`id_atividade`) REFERENCES `atividade` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `texto`
--

/*!40000 ALTER TABLE `texto` DISABLE KEYS */;
INSERT INTO `texto` VALUES (69,'hfhfg','<p>hhhhhhhhhhhhhh</p>',39,'2018-12-07 12:21:52',13,'Enviado'),(70,'Os benefícios da aprendizagem tecnológica aliada a escrita de mão.','<p>Caros senhores pais e educadores,</p>\r\n<p>Venho por meio desta para explicar aos senhores sobre algo muito presente em nosso cotidiano: a tecnologia. Para os pais que assistem seus filhos crescerem, muitas vezes ela pode ser vista como um vil&atilde;o. Mas a grande verdade &eacute; que esse simples contato (desde que controlado) pode fazer uma diferen&ccedil;a muito grande na forma&ccedil;&atilde;o das crian&ccedil;as e dos adolescentes.</p>\r\n<p>De fato, hoje em dia o uso descontrolado da tecnologia tr&aacute;s muitos malef&iacute;cios, mas a nossa proposta &eacute; conciliar a tecnologia de forma adequada ao processo de aprendizado.</p>\r\n<p>Ao aprender o c&eacute;rebro cria sinapses, que nos permite guardar aquelas informa&ccedil;&otilde;es. Todas as atividades que fazemos que mexem com nossos sentidos nos permitem criar essas sinapses. Ao escrever ativamos certas partes do c&eacute;rebro, e ao usar o computador, celular ou outro meio tecnol&oacute;gico, utilizamos outras partes do nosso c&eacute;rebro.</p>\r\n<p>Por isso &eacute; importante usarmos todos os recursos dispon&iacute;veis para facilitar e tornar mais interessante o aprendizado de nossos jovens.</p>\r\n<p>Pensem em como pode ser mais divertido o aprendizado atrav&eacute;s de meios que os jovens gostam e se sentem bem.</p>\r\n<p>Atenciosamente,</p>\r\n<p>Nat&aacute;lia de Oliveira Caldeira.</p>',42,'2019-05-02 22:26:13',20,'Enviado');
/*!40000 ALTER TABLE `texto` ENABLE KEYS */;

--
-- Table structure for table `texto_marcado`
--

DROP TABLE IF EXISTS `texto_marcado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `texto_marcado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_texto` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `conteudo` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_correcao` (`id_texto`),
  CONSTRAINT `texto_marcado_ibfk_1` FOREIGN KEY (`id_texto`) REFERENCES `texto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `texto_marcado`
--

/*!40000 ALTER TABLE `texto_marcado` DISABLE KEYS */;
INSERT INTO `texto_marcado` VALUES (16,69,'hfhfg','<p>hhhhhhhhhhhhhh</p>');
/*!40000 ALTER TABLE `texto_marcado` ENABLE KEYS */;

--
-- Table structure for table `tipo_textual`
--

DROP TABLE IF EXISTS `tipo_textual`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_textual` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `caracteristicas` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_textual`
--

/*!40000 ALTER TABLE `tipo_textual` DISABLE KEYS */;
INSERT INTO `tipo_textual` VALUES (1,'Narrativo',''),(2,'Descritivo',''),(3,'Dissertativo-Argumentativo',''),(4,'Expositivo',''),(5,'Injuntivo',''),(6,'Dever','');
/*!40000 ALTER TABLE `tipo_textual` ENABLE KEYS */;

--
-- Table structure for table `turma`
--

DROP TABLE IF EXISTS `turma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `id_professor` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_professor` (`id_professor`),
  CONSTRAINT `turma_ibfk_1` FOREIGN KEY (`id_professor`) REFERENCES `professor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turma`
--

/*!40000 ALTER TABLE `turma` DISABLE KEYS */;
INSERT INTO `turma` VALUES (6,'3º Informática 2017',1),(15,'Turma para testes 07/12/2018',1),(19,'Turma que não é da Diloca 2',3);
/*!40000 ALTER TABLE `turma` ENABLE KEYS */;

--
-- Dumping routines for database 'u240210299_reda'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-03  9:14:19
