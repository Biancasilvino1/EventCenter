-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 24-Jun-2018 às 13:23
-- Versão do servidor: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventcenter1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) CHARACTER SET utf8 NOT NULL,
  `cpf` varchar(20) CHARACTER SET utf8 NOT NULL,
  `telefone` varchar(20) CHARACTER SET utf8 NOT NULL,
  `endereco` varchar(200) CHARACTER SET utf8 NOT NULL,
  `agencia` varchar(10) CHARACTER SET utf8 NOT NULL,
  `conta_corrente` varchar(10) CHARACTER SET utf8 NOT NULL,
  `email` varchar(200) CHARACTER SET utf8 NOT NULL,
  `usuario` varchar(200) CHARACTER SET utf8 NOT NULL,
  `senha` varchar(220) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `cpf`, `telefone`, `endereco`, `agencia`, `conta_corrente`, `email`, `usuario`, `senha`) VALUES
(6, 'romulo', '88888888888', '91999999', 'sÃ£o jorge', '013', '3333', 'romulo@gmail.com', 'romulo10', '$2y$10$LObJOwTgJ9Rf7y/bO8XTYOo24G1oshjkuyYOLh8kpD3hSlB3fAfYm'),
(7, 'renato', '88888888888', '91999999', 'sÃ£o jorge', '013', '3333', 'renato@gmail.com', 'renato10', '$2y$10$0LSYU7bnhaHcLSM/BKIHVuTT3EfXSJK/Q5dFQDNOXkYz.woPeT6I2');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
