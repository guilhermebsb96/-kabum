-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 05-Jun-2023 às 19:59
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `login`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(140) DEFAULT NULL,
  `email` varchar(140) NOT NULL,
  `senha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `cpf` int NOT NULL,
  `rg` int NOT NULL,
  `telefone` varchar(13) NOT NULL,
  `rua` varchar(140) NOT NULL,
  `bairro` varchar(140) NOT NULL,
  `numero` int NOT NULL,
  `cidade` varchar(140) NOT NULL,
  `estado` varchar(140) NOT NULL,
  `sexo` varchar(3) NOT NULL,
  `sobrenome` varchar(140) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `data_nascimento`, `cpf`, `rg`, `telefone`, `rua`, `bairro`, `numero`, `cidade`, `estado`, `sexo`, `sobrenome`) VALUES
(1, 'Guilherme', 'guilhermeb.redentor@gmail.com', 'teste', '0000-00-00', 324242424, 2342424, '2423424', 'rua das flores', 'campo belo', 1212, 'franca', 'SP', 'M', 'Barrios'),
(3, 'Maria', 'maria@gmail.com', 'teste', '0000-00-00', 324242424, 2342424, '2423424', 'rua das flores', 'campo belo', 1212, 'franca', 'SP', 'M', 'Barrios');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
