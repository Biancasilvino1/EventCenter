-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 23/08/2018 às 19:28
-- Versão do servidor: 10.2.16-MariaDB
-- Versão do PHP: 7.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u787839908_event`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `arearestrita`
--

CREATE TABLE `arearestrita` (
  `id` int(11) NOT NULL,
  `usuario` varchar(220) NOT NULL,
  `senha` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `arearestrita`
--

INSERT INTO `arearestrita` (`id`, `usuario`, `senha`) VALUES
(1, 'romulo10', '$2y$10$9tS4vUFvTfuzwF2chJnxpuQ4Nklj5TcIdOB11abFmOGqspeM3ESGS');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `arearestrita`
--
ALTER TABLE `arearestrita`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `arearestrita`
--
ALTER TABLE `arearestrita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
