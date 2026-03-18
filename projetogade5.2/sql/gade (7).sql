-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/11/2024 às 20:04
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gade`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `idCarrinho` int(11) NOT NULL,
  `data` date NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `estatos` varchar(45) NOT NULL COMMENT 'Aberto\nFinalizado\nCanccelado\nPendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `idPagamento` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `dataPagamento` date NOT NULL,
  `chavePix` varchar(300) NOT NULL,
  `Pedidos_idPedidos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedidos` int(11) NOT NULL,
  `quantidadePedidos` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `Produto_codigoProduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `idProduto` int(11) NOT NULL,
  `imagem` varchar(200) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `tamanho` varchar(10) NOT NULL,
  `fornecedor` varchar(200) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`idProduto`, `imagem`, `valor`, `nome`, `tamanho`, `fornecedor`, `descricao`) VALUES
(1, 'CamisaMorder.png', 85.00, 'Camisa Morder', 'G', 'gade', 'Bela'),
(3, 'MoletomBD.png', 120.00, 'Moletom DB', 'G', 'gade', 'O melhor'),
(7, 'CamisaHA.png', 85.00, 'Camisa HA', 'G', 'gade', 'A melhor'),
(8, 'MoletomL.png', 120.00, 'Moletom', 'M', 'gade', 'O melhor'),
(9, 'moletonlufy.png', 120.00, 'Moletom Lufy', 'P', 'gade', 'O melhor'),
(10, 'CamisetaOnepiece.png', 55.00, 'Camiseta', 'M', 'gade', 'Bela'),
(13, 'CamisaMoto.png', 55.00, 'Camisa Moto', 'GG', 'gade', 'Bela'),
(14, 'MoletomJesus.png', 120.00, 'Moletom Deus', 'G', 'gade', 'O melhor');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_Usuario` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `perfil` varchar(30) NOT NULL DEFAULT 'Cliente' COMMENT 'Administrador\nCliente',
  `cpf` varchar(14) NOT NULL,
  `cep` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_Usuario`, `nome`, `email`, `senha`, `perfil`, `cpf`, `cep`) VALUES
(1, 'Fillipe', 'fillipe@gmail.com', '123', 'Cliente', '546.446.864-68', '45.434-435'),
(2, 'ADM', 'adm@gmail.com', '123', 'Administrador', '453.453.453-33', '43.434-343'),
(8, 'Eyke', 'eyke@gmail.com', '123', 'Cliente', '453.435.343-43', '43.534-312'),
(9, 'Lucas', 'lucas@gmail.com', '123', 'Cliente', '837.345.335-44', '43.783-453'),
(10, 'Samuel', 'samuel@gmail.com', '123', 'Cliente', '519.848.184-81', '86.468-154'),
(11, 'Alessandro', 'alessandro@gmail.com', '123', 'Cliente', '111.651.811-65', '43.434-387'),
(13, 'Hially', 'hially@gmail.com', '123', 'Cliente', '418.949.848-49', '25.737-837'),
(14, 'Jerusilene', 'lene@gmail.com', '123', 'Cliente', '814.864.654-18', '51.684-161');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`idCarrinho`);

--
-- Índices de tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`idPagamento`),
  ADD KEY `fk_Pagamento_Pedidos1_idx` (`Pedidos_idPedidos`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedidos`),
  ADD KEY `fk_Pedidos_Usuario1_idx` (`Usuario_idUsuario`),
  ADD KEY `fk_Pedidos_Produto1_idx` (`Produto_codigoProduto`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idProduto`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_Usuario`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `idCarrinho` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `idPagamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedidos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `pagamento`
--
ALTER TABLE `pagamento`
  ADD CONSTRAINT `fk_Pagamento_Pedidos1` FOREIGN KEY (`Pedidos_idPedidos`) REFERENCES `pedidos` (`idPedidos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_Pedidos_Produto1` FOREIGN KEY (`Produto_codigoProduto`) REFERENCES `produto` (`idProduto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pedidos_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`id_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
