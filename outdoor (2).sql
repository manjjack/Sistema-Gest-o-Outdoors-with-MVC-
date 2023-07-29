-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Jul-2023 às 09:22
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `outdoor`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluguer`
--

CREATE TABLE `aluguer` (
  `idOutdoor` int(11) NOT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `dataInicio` date NOT NULL,
  `dataFim` date NOT NULL,
  `precoFinal` double NOT NULL,
  `imagem` varchar(60) DEFAULT NULL,
  `estado` varchar(60) NOT NULL,
  `comuna` int(11) NOT NULL,
  `idGestor` int(11) DEFAULT NULL,
  `pdf` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `aluguer`
--

INSERT INTO `aluguer` (`idOutdoor`, `idCliente`, `dataInicio`, `dataFim`, `precoFinal`, `imagem`, `estado`, `comuna`, `idGestor`, `pdf`) VALUES
(15, 24, '2023-07-24', '2023-07-24', 1230000, 'Capturar.PNG', 'Pagamento por Validar', 1, 38, 'Modelo Relatório BDII 2023.pdf'),
(18, 24, '2023-07-24', '2023-07-24', 340000, 'Capturar.PNG', 'Ocupado', 4, 39, 'Compiladores Final - Jackson.pdf'),
(19, 24, '2023-07-24', '2023-07-24', 70000, 'Capturar.PNG', 'Aguardando Pagamento', 2, 39, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `tipoCliente` varchar(20) NOT NULL,
  `actividade` varchar(40) DEFAULT NULL,
  `nacionalidade` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `tipoCliente`, `actividade`, `nacionalidade`, `status`) VALUES
(24, 'empresa', 'pescaria', 'Angola', 'ativo'),
(25, 'particular', NULL, 'Angolana', 'desativado'),
(28, 'particular', NULL, 'Angolano', 'desativado'),
(29, 'particular', NULL, 'Angolano', 'ativo'),
(34, 'empresa', 'Pesca', 'Angola', 'desativado'),
(40, 'particular', NULL, 'Angola', 'desativado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comuna`
--

CREATE TABLE `comuna` (
  `idcomuna` int(11) NOT NULL,
  `comunas` varchar(40) NOT NULL,
  `fkMunicipio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `comuna`
--

INSERT INTO `comuna` (`idcomuna`, `comunas`, `fkMunicipio`) VALUES
(1, 'Caxito', 6),
(2, 'Ambriz', 6),
(3, 'Benfica', 2),
(4, 'Calumbo', 4),
(5, 'Funda ', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `municipio`
--

CREATE TABLE `municipio` (
  `idmunicipio` int(11) NOT NULL,
  `municipios` varchar(40) NOT NULL,
  `fkProvincia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `municipio`
--

INSERT INTO `municipio` (`idmunicipio`, `municipios`, `fkProvincia`) VALUES
(1, 'Belas', 1),
(2, 'Talatona', 1),
(3, 'Cazenga', 1),
(4, 'Viana', 1),
(5, 'Cacuaco', 1),
(6, 'Ambriz', 7),
(7, 'Dande', 7),
(8, 'Cabinda', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `outdoors`
--

CREATE TABLE `outdoors` (
  `id` int(11) NOT NULL,
  `tipoOutdoor` int(11) NOT NULL,
  `preco` double NOT NULL,
  `comuna` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `imagem` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `outdoors`
--

INSERT INTO `outdoors` (`id`, `tipoOutdoor`, `preco`, `comuna`, `estado`, `imagem`) VALUES
(15, 2, 1230000, 1, 1, '2.jpg'),
(17, 2, 2000, 2, 0, 'ESPAÇOS-PUBLICIDADE.jpg'),
(18, 1, 340000, 4, 1, 'Capturar.PNG'),
(19, 3, 70000, 2, 1, 'tela2.PNG'),
(20, 1, 1500, 3, 0, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `provincia`
--

CREATE TABLE `provincia` (
  `idProvincia` int(11) NOT NULL,
  `provincias` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `provincia`
--

INSERT INTO `provincia` (`idProvincia`, `provincias`) VALUES
(7, 'Bengo'),
(2, 'Benguela'),
(4, 'Cabinda'),
(3, 'Huila'),
(5, 'Kwanza-Norte'),
(6, 'Kwanza-Sul'),
(1, 'Luanda'),
(8, 'Lunda Sul');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipooutdoor`
--

CREATE TABLE `tipooutdoor` (
  `idTipo` int(11) NOT NULL,
  `tipo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `tipooutdoor`
--

INSERT INTO `tipooutdoor` (`idTipo`, `tipo`) VALUES
(1, 'Paineis Luminosos'),
(2, 'Paineis nao Luminosos'),
(3, 'Faixadas'),
(4, 'Placas Indicativas '),
(5, 'Lampoles');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `morada` varchar(40) NOT NULL,
  `provincia` varchar(20) NOT NULL,
  `municipio` varchar(20) NOT NULL,
  `comuna` int(11) NOT NULL,
  `telefone` int(11) NOT NULL,
  `perfil` varchar(20) NOT NULL,
  `senha_alterada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `nome`, `username`, `password`, `email`, `morada`, `provincia`, `municipio`, `comuna`, `telefone`, `perfil`, `senha_alterada`) VALUES
(2, 'demo', 'demo', '12345', 'inteligentejackson@gmail.com', 'Talatona', 'Luanda', 'Talatona', 3, 923567543, 'Admin', 0),
(24, 'Limitado', 'cliente1', '123', '20200313@isptec.co.ao', 'Benfica', 'Luanda', 'Cacuaco', 2, 2147483647, 'Cliente', 0),
(25, 'pesca', 'cliente2', '123', '909ter@hotmail.com', 'Morro Bento', 'Luanda', 'Cacuaco', 3, 943951414, 'Cliente', 0),
(28, 'pesca', 'teste', '123', '20200313@isptec.co.ao', 'Morro Bento', 'Luanda', 'Cacuaco', 3, 943951414, 'Cliente', 0),
(29, 'pescaria', 'cliente3', '123', '20200313@isptec.co.ao', 'Benfica ', 'Luanda', 'Cacuaco', 4, 2147483647, 'Cliente', 0),
(30, 'Jackson Júnior', 'gestor1', '123', 'manjjackson@hotmail.com', 'Morro Bento', 'Luanda', 'Cacuaco', 3, 2147483647, 'Gestor', 1),
(34, 'pesca', 'gestornovo', '123', 'manjjackson@hotmail.com', 'Morro Bento', 'Luanda', 'Cacuaco', 3, 2147483647, 'Cliente', 0),
(35, 'Novo gestor', 'jackson', '123', 'inteligentejackson@gmail.com', 'Morro Bento', 'Luanda', 'Cacuaco', 1, 943951414, 'Gestor', 1),
(38, 'Pedro J', 'gestor2', '123', 'manjjackson@hotmail.com', 'Morro Bento', 'Luanda', 'Cacuaco', 4, 943951414, 'Gestor', 1),
(39, 'novo membro', 'gestor10', '123', '20200313@isptec.co.ao', 'Morro Bento', 'Luanda', 'Cacuaco', 2, 2147483647, 'Gestor', 1),
(40, 'pesca3', 'cliente10', '123', 'manjjackson@hotmail.com', 'Morro Bento', 'Luanda', 'Cacuaco', 2, 2147483647, 'Cliente', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluguer`
--
ALTER TABLE `aluguer`
  ADD PRIMARY KEY (`idOutdoor`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `comuna`
--
ALTER TABLE `comuna`
  ADD PRIMARY KEY (`idcomuna`),
  ADD KEY `fkMunicipio` (`fkMunicipio`);

--
-- Índices para tabela `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`idmunicipio`),
  ADD KEY `fkProvincia` (`fkProvincia`);

--
-- Índices para tabela `outdoors`
--
ALTER TABLE `outdoors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comuna` (`comuna`),
  ADD KEY `tipoOutdoor` (`tipoOutdoor`);

--
-- Índices para tabela `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`idProvincia`),
  ADD UNIQUE KEY `provincia` (`provincias`);

--
-- Índices para tabela `tipooutdoor`
--
ALTER TABLE `tipooutdoor`
  ADD PRIMARY KEY (`idTipo`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comuna` (`comuna`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comuna`
--
ALTER TABLE `comuna`
  MODIFY `idcomuna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `municipio`
--
ALTER TABLE `municipio`
  MODIFY `idmunicipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `outdoors`
--
ALTER TABLE `outdoors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `provincia`
--
ALTER TABLE `provincia`
  MODIFY `idProvincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tipooutdoor`
--
ALTER TABLE `tipooutdoor`
  MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aluguer`
--
ALTER TABLE `aluguer`
  ADD CONSTRAINT `aluguer_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `aluguer_ibfk_2` FOREIGN KEY (`idOutdoor`) REFERENCES `outdoors` (`id`);

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `comuna`
--
ALTER TABLE `comuna`
  ADD CONSTRAINT `comuna_ibfk_1` FOREIGN KEY (`fkMunicipio`) REFERENCES `municipio` (`idmunicipio`);

--
-- Limitadores para a tabela `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`fkProvincia`) REFERENCES `provincia` (`idProvincia`);

--
-- Limitadores para a tabela `outdoors`
--
ALTER TABLE `outdoors`
  ADD CONSTRAINT `outdoors_ibfk_1` FOREIGN KEY (`comuna`) REFERENCES `comuna` (`idcomuna`),
  ADD CONSTRAINT `outdoors_ibfk_2` FOREIGN KEY (`tipoOutdoor`) REFERENCES `tipooutdoor` (`idTipo`);

--
-- Limitadores para a tabela `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`comuna`) REFERENCES `comuna` (`idcomuna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
