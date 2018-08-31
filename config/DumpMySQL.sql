/**
 * Author:  Juliano de Barcellos
 * Created: 31/08/2018
 */

CREATE DATABASE  IF NOT EXISTS `blogdozend` DEFAULT CHARACTER SET utf8;
USE `blogdozend`;

--
-- Table structure for table `aluno`
--

DROP TABLE IF EXISTS `aluno`;

CREATE TABLE `aluno` (
  `idaluno` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`idaluno`);

--
-- Dumping data for table `aluno`
--

LOCK TABLES `aluno` WRITE;

INSERT INTO `aluno` VALUES (1,'nomeAluno','sobrenomeAluno','emailAluno@gmail.com','senhaAluno');

UNLOCK TABLES;
