-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para projeto-final
CREATE DATABASE IF NOT EXISTS `projeto-final` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `projeto-final`;

-- Copiando estrutura para tabela projeto-final.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL DEFAULT '',
  `telefone` varchar(15) NOT NULL DEFAULT '',
  `endereco` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_clientes_endereco` (`endereco`),
  CONSTRAINT `FK_clientes_endereco` FOREIGN KEY (`endereco`) REFERENCES `endereco` (`IdEndereco`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela projeto-final.clientes: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela projeto-final.endereco
CREATE TABLE IF NOT EXISTS `endereco` (
  `IdEndereco` int NOT NULL AUTO_INCREMENT,
  `logradouro` varchar(100) NOT NULL,
  `numero` int NOT NULL DEFAULT '0',
  `complemento` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidadeEstado` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`IdEndereco`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela projeto-final.endereco: ~8 rows (aproximadamente)
INSERT INTO `endereco` (`IdEndereco`, `logradouro`, `numero`, `complemento`, `bairro`, `cidadeEstado`) VALUES
	(1, 'Rua Manila', 311, 'NULL', 'Havai', 'NULL'),
	(2, 'Av Pena', 20, 'NULL', 'Santo', 'BH'),
	(3, 'Rua um', 1, 'Apto 1', 'um', NULL),
	(4, 'Rua quatro', 4, 'apto 4', 'Bairro quatro', NULL),
	(5, 'Rua dois', 2, 'Apto 2', 'Dois', NULL),
	(6, 'Rua tres', 3, 'apto 3', 'Tres', NULL),
	(12, 'Rua cinco', 5, 'apto 5', 'Cinco', NULL),
	(13, 'rua seis', 6, 'apto 6', 'seis', NULL);

-- Copiando estrutura para tabela projeto-final.item
CREATE TABLE IF NOT EXISTS `item` (
  `idItem` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `descricao` varchar(600) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '',
  `tipo` varchar(15) NOT NULL,
  `valor` float DEFAULT NULL,
  `tamanho` varchar(50) DEFAULT NULL,
  `nomeImg` varchar(50) DEFAULT NULL,
  `quantidade` int DEFAULT '0',
  PRIMARY KEY (`idItem`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela projeto-final.item: ~22 rows (aproximadamente)
INSERT INTO `item` (`idItem`, `nome`, `descricao`, `tipo`, `valor`, `tamanho`, `nomeImg`, `quantidade`) VALUES
	(1, 'ARROZ COM PEQUI', 'Arroz branco, pequi, linguiça, alho, cebola, óleo e sal.', 'refeicao', 19, NULL, 'arrozcompequi.jpeg', 0),
	(2, 'BIFE À CAVALO', 'Contra-filé grelhado servido com ovos fritos por cima, temperados com sal e pimenta. Acompanha uma porção de arroz branco e feijão.', 'refeicao', 22, NULL, 'bifeàcavalo.jpeg', 0),
	(3, 'COSTELINHA DE PORCO COM ORA-PRO-NÓBIS', 'Costelinha de porco, ora-pro-nóbis, alho, cebola, óleo, sal e pimenta. Acompanha uma porção de arroz branco e feijão.', 'refeicao', 25, NULL, 'costelinhadeporcpcomora-pro-nobis.jpeg', 0),
	(4, 'DOBRADINHA', 'Dobradinha, feijão, linguiça, bacon, alho, cebola, tomate, pimentão, cheiro-verde, louro, pimenta e sal. Acompanha uma porção de arroz branco.', 'refeicao', 20, NULL, 'dobradinha.jpeg', 0),
	(5, 'FEIJOADA', 'Feijão preto, carne seca, linguiça, costelinha de porco, paio, pé de porco, orelha de porco, alho, cebola, louro e sal. Acompanha uma porção de arroz branco, couve refogada, laranja, farofa e vinagrete.', 'refeicao', 26, NULL, 'feijoada.jpeg', 0),
	(6, 'FRANGO AO MOLHO PARDO', 'Frango, sangue do próprio frango, alho, cebola, óleo, vinagre, cheiro-verde, louro e sal.  Acompanha uma porção de arroz branco e/ou angu.', 'refeicao', 23, NULL, 'Frangoaomolhopardo.jpeg', 0),
	(7, 'FRANGO COM QUIABO', 'Frango, quiabo, arroz branco, alho, cebola, óleo, cheiro-verde, louro, pimenta e sal.', 'refeicao', 20, NULL, 'frangocomquiabo(2).jpeg', 0),
	(8, 'GALINHADA', 'Frango, arroz branco, alho, cebola, tomate, pimentão, açafrão, cheiro-verde, óleo e sal.', 'refeicao', 20, NULL, 'galinhada(2).jpeg', 0),
	(9, 'KAOL', 'Arroz branco, feijão, ovo frito e linguiça. Acompanha couve refogada e molho de tomate por cima dos ingredientes.', 'refeicao', 17, NULL, 'Kaol.jpeg', 0),
	(10, 'MACARRÃO NA CHAPA', 'Macarrão, carne  de boi, cebola, tomate, pimentão, alho, molho shoyu, óleo, sal e queijo maçaricado.', 'refeicao', 22, NULL, 'macarrãonachapa.jpeg', 0),
	(11, 'PRATO FEITO', 'Arroz branco, feijão, bife, ovo frito, batata frita ou mandioca frita, e salada (tomate, alface e cebola).', 'refeicao', 18, NULL, 'pratofeito.jpeg', 0),
	(12, 'RABADA', 'Rabo de boi, alho, cebola, tomate, cheiro-verde, pimentão, louro, pimenta, óleo e sal. Acompanha polenta e agrião.', 'refeicao', 25, NULL, 'rabada.jpeg', 0),
	(13, 'STROGONOFF', 'Frango, creme de leite, molho de tomate, ketchup, cebola, champignon, alho, manteiga, sal e pimenta. Acompanha uma porção de arroz branco e batata palha.', 'refeicao', 22, NULL, 'strogonoff.jpeg', 0),
	(14, 'TROPEIRO', 'Feijão, farinha de mandioca, linguiça, bacon, ovos, cebola, alho, cheiro verde, couve, torresmo, sal, e pimenta-do-reino. Acompanha uma porção de arroz branco.', 'refeicao', 22, NULL, 'tropeiro.jpeg', 0),
	(15, 'TUTU', 'Feijão cozido e batido, farinha de mandioca, alho, cebola, bacon, linguiça, ovo cozido, cheiro-verde, óleo e sal. Acompanha uma porção de arroz branco.', 'refeicao', 20, NULL, 'tutu.jpeg', 0),
	(16, 'VACA ATOLADA', 'Costela de boi, mandioca, alho, cebola, tomate, cheiro-verde, louro, pimenta, óleo e sal. Acompanha uma porção de arroz branco.', 'refeicao', 23, NULL, 'vacaatolada.jpeg', 0),
	(17, 'COCA-COLA', '', 'bebida', 5, '350ml', 'REFRIGERANTE-COCA-COLA-LATA-350ML-ORIGINAL.png', 0),
	(18, 'COCA-COLA', '', 'bebida', 4, '290ml', 'cocamini.png', 0),
	(19, 'COCA-COLA', '', 'bebida', 10, '1L', 'cocacola1L.png', 0),
	(20, 'PUDIM DE LEITE', '', 'sobremesa', 7, NULL, 'pudim.png', 0),
	(21, 'SALADA DE FRUTAS', 'Uva, morango,kiwi e banana.', 'sobremesa', 11, '400ml', 'saladafruta.png', 0),
	(22, 'BRIGADEIRO GOURMET', 'Feito com chocolate belga.', 'sobremesa', 5, '40g', 'brigadeiro.png', 0);

-- Copiando estrutura para tabela projeto-final.item_pedido
CREATE TABLE IF NOT EXISTS `item_pedido` (
  `idItem` int NOT NULL,
  `idPedido` int DEFAULT NULL,
  `quantidade` int NOT NULL DEFAULT '0',
  KEY `FK__item` (`idItem`),
  KEY `FK__pedido` (`idPedido`),
  CONSTRAINT `FK__item` FOREIGN KEY (`idItem`) REFERENCES `item` (`idItem`) ON UPDATE CASCADE,
  CONSTRAINT `FK__pedido` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`idPedido`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela projeto-final.item_pedido: ~8 rows (aproximadamente)
INSERT INTO `item_pedido` (`idItem`, `idPedido`, `quantidade`) VALUES
	(3, NULL, 1),
	(19, NULL, 1),
	(22, NULL, 1),
	(22, NULL, 1),
	(22, NULL, 1),
	(16, NULL, 1),
	(16, NULL, 1),
	(16, NULL, 1);

-- Copiando estrutura para tabela projeto-final.pedido
CREATE TABLE IF NOT EXISTS `pedido` (
  `idCliente` int NOT NULL,
  `valorTotal` float NOT NULL DEFAULT '0',
  `idPedido` int NOT NULL AUTO_INCREMENT,
  `status` varchar(50) DEFAULT 'iniciado',
  `data` datetime DEFAULT NULL,
  `taxaEntrega` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`idPedido`),
  KEY `FK_pedido_clientes` (`idCliente`),
  CONSTRAINT `FK_pedido_clientes` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela projeto-final.pedido: ~0 rows (aproximadamente)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
