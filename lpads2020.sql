-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Ago-2020 às 03:50
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lpads2020`
--
CREATE DATABASE IF NOT EXISTS `lpads2020` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lpads2020`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL,
  `email` varchar(40) NOT NULL,
  `senha` varchar(25) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES ('1', 'gui.steel2', 'gui.steel2@gmail', '1234');



CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL,
  `email` varchar(40) NOT NULL,
  `cidade` varchar(25) NOT NULL,
  `estado` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `cidade`, `estado`) VALUES
(1, 'Guilherme', 'gui.steel2@gmail.com.br', 'Assis', 'SP'),
(2, 'JGuilherme', 'gui.steel2@gmail.com.br', 'SP', 'SP');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens`
--

CREATE TABLE `itens` (
  `id` int(11) NOT NULL,
  `pedidoID` int(11) NOT NULL,
  `produtoID` int(11) NOT NULL,
  `quantidade` float NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `itens` nao esta usando
--

-- INSERT INTO `itens` (`id`, `pedidoID`, `produtoID`, `quantidade`, `valor`) VALUES
-- (2, 1, 3, 2, 14),
-- (3, 1, 3, 1, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos` nao esta usando
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `clienteID` int(11) NOT NULL,
  `dataCompra` date NOT NULL,
  `dataVcto` date NOT NULL,
  `dataPgto` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedidos` nao esta usando
--

-- INSERT INTO `pedidos` (`id`, `clienteID`, `dataCompra`, `dataVcto`, `dataPgto`) VALUES
-- (1, 1, '2020-08-13', '2020-08-18', '0000-00-00'),
-- (2, 3, '2020-08-13', '2020-08-20', '1900-01-01'),
-- (3, 4, '2020-08-14', '2020-08-24', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos` 
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(35) NOT NULL,
  `quantidade` float NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `descricao`, `quantidade`, `valor`) VALUES
(1, 'Arroz', 15, 16.98),
(2, 'Feijão', 100, 7.67),
(3, 'Carne', 30, 24),
(4, 'Cerveja', 100, 2.99);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `itens`
--
ALTER TABLE `itens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidoID` (`pedidoID`),
  ADD KEY `itens_ibfk_2` (`produtoID`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidos_ibfk_1` (`clienteID`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `itens`
--
ALTER TABLE `itens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `itens`
--
ALTER TABLE `itens`
  ADD CONSTRAINT `itens_ibfk_1` FOREIGN KEY (`pedidoID`) REFERENCES `pedidos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `itens_ibfk_2` FOREIGN KEY (`produtoID`) REFERENCES `produtos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`clienteID`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
