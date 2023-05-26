-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/05/2023 às 00:35
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `uzzebd`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `consumidor`
--

CREATE TABLE `consumidor` (
  `id` int(11) NOT NULL,
  `img` longblob DEFAULT NULL,
  `nome` varchar(255) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cpf` char(11) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `consumidor`
--

INSERT INTO `consumidor` (`id`, `img`, `nome`, `numero`, `email`, `cpf`, `senha`) VALUES
(1, 0x686f6d656d2e6a706567, 'EVERTHON MANOEL DA SILVA INACIO', '1327', 'everthonmanoell@gmail.com', '11782265490', '123'),
(2, NULL, 'Hefestos', '1327', 'everthonmanoell@gmail.com', '66806399487', '123');

-- --------------------------------------------------------

--
-- Estrutura para tabela `loja`
--

CREATE TABLE `loja` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cnpj` char(14) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `imagem` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `img` longblob NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cor` varchar(255) NOT NULL,
  `tamanho` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor_uni` double NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `fk_loja_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `venda`
--

CREATE TABLE `venda` (
  `id` int(11) NOT NULL,
  `quantidade_vendida` int(11) NOT NULL,
  `data_hora` datetime NOT NULL,
  `valor_uni` double NOT NULL,
  `fk_consumidor_id` int(11) NOT NULL,
  `fk_produto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `consumidor`
--
ALTER TABLE `consumidor`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `loja`
--
ALTER TABLE `loja`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_loja` (`fk_loja_id`);

--
-- Índices de tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_consumidor_id` (`fk_consumidor_id`),
  ADD KEY `fk_produto_id` (`fk_produto_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `consumidor`
--
ALTER TABLE `consumidor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `loja`
--
ALTER TABLE `loja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_loja` FOREIGN KEY (`fk_loja_id`) REFERENCES `loja` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `fk_consumidor_id` FOREIGN KEY (`fk_consumidor_id`) REFERENCES `consumidor` (`id`),
  ADD CONSTRAINT `fk_produto_id` FOREIGN KEY (`fk_produto_id`) REFERENCES `produto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
