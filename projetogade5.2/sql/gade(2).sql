-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Nov-2024 às 19:47
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

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
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `idCarrinho` int(11) NOT NULL,
  `data` date NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `estatos` varchar(45) NOT NULL COMMENT 'Aberto\nFinalizado\nCanccelado\nPendente',
  `Usuario_id_Usuario` int(11) NOT NULL,
  `Produto_idProduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `idPagamento` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `dataPagamento` date NOT NULL,
  `chavePix` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedidos` int(11) NOT NULL,
  `quantidadePedidos` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `Produto_codigoProduto` int(11) NOT NULL,
  `Pagamento_idPagamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idProduto` int(11) NOT NULL,
  `imagem` varchar(200) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `tamanho` varchar(10) NOT NULL,
  `fornecedor` varchar(200) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idProduto`, `imagem`, `valor`, `nome`, `tamanho`, `fornecedor`, `descricao`) VALUES
(1, 'CamisaHA.png', '85.00', 'Camisa HA', 'M', 'gade', 'Bela'),
(2, 'MoletomJesus.png', '120.00', 'Moletom Jesus', 'G', 'gade', 'Bela'),
(3, 'CamisaMorder.png', '85.00', 'Camisa Morder', 'GG', 'gade', 'Bonita'),
(4, 'Moletomle.png', '120.00', 'Moletom Leoa', 'M', 'gade', 'Bela'),
(5, 'CamisaCaveira.png', '80.00', 'Camiseta Caveira', 'M', 'gade', 'Bela'),
(6, 'CamisetaOnepiece.png', '80.00', 'Camisa OnePiece', 'P', 'gade', 'Bela'),
(7, 'CamisaMoto.png', '80.00', 'Camisa Moto', 'G', 'gade', 'Bonita'),
(8, 'moletonlufy.png', '120.00', 'Moletom Lufy', 'G', 'gade', 'Confortável');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_Usuario` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `perfil` varchar(30) NOT NULL DEFAULT 'Cliente' COMMENT 'Administrador\nCliente',
  `cpf` varchar(14) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `ncasa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_Usuario`, `nome`, `email`, `senha`, `perfil`, `cpf`, `cep`, `endereco`, `ncasa`) VALUES
(1, 'André', 'andre@gmail.com', '123', 'Cliente', '153.454.153-45', '24.536-837', 'QNP 17 Conjunto C ', 31),
(2, 'ADM', 'adm@gmail.com', '123', 'Administrador', '543.545.343-54', '35.438-738', 'Quadra QNM 10 Conjunto G', 2),
(7, 'Henrrique', 'h@gmail.com', '123', 'Cliente', '327.838.737-83', '38.737-837', 'Quadra QNM 10 Conjunto H', 32);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`idCarrinho`),
  ADD KEY `fk_Carrinho_Usuario1_idx` (`Usuario_id_Usuario`),
  ADD KEY `fk_Carrinho_Produto1_idx` (`Produto_idProduto`);

--
-- Índices para tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`idPagamento`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedidos`),
  ADD KEY `fk_Pedidos_Usuario1_idx` (`Usuario_idUsuario`),
  ADD KEY `fk_Pedidos_Produto1_idx` (`Produto_codigoProduto`),
  ADD KEY `fk_Pedidos_Pagamento1_idx` (`Pagamento_idPagamento`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idProduto`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_Usuario`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
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
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `fk_Carrinho_Produto1` FOREIGN KEY (`Produto_idProduto`) REFERENCES `produto` (`idProduto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Carrinho_Usuario1` FOREIGN KEY (`Usuario_id_Usuario`) REFERENCES `usuario` (`id_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_Pedidos_Pagamento1` FOREIGN KEY (`Pagamento_idPagamento`) REFERENCES `pagamento` (`idPagamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pedidos_Produto1` FOREIGN KEY (`Produto_codigoProduto`) REFERENCES `produto` (`idProduto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pedidos_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`id_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
