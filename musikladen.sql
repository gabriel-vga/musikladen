-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Fev-2020 às 21:11
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `musikladen`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbalbum`
--

CREATE TABLE `tbalbum` (
  `NomeAlbum` varchar(70) NOT NULL DEFAULT '',
  `DataCadAlbum` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idAlbum` int(11) NOT NULL,
  `nomeCapa` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbalbum`
--

INSERT INTO `tbalbum` (`NomeAlbum`, `DataCadAlbum`, `idAlbum`, `nomeCapa`) VALUES
('Discovery', '2017-11-23 19:34:02', 13, '19429.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcantor`
--

CREATE TABLE `tbcantor` (
  `idCantor` int(11) NOT NULL,
  `NomeCantor` varchar(45) NOT NULL,
  `DataCadCantor` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `NomeFotoCantor` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbcantor`
--

INSERT INTO `tbcantor` (`idCantor`, `NomeCantor`, `DataCadCantor`, `NomeFotoCantor`) VALUES
(11, 'David Bowie', '2017-11-23 19:07:18', '3079.jpg'),
(12, 'Daft Punk', '2017-11-23 19:34:19', '18106.jpg'),
(13, 'Joan Jett', '2017-11-23 20:01:56', '15194.jpg'),
(14, 'Cyndi Lauper', '2017-11-23 20:26:01', '14198.jpg'),
(15, 'Juice Newton', '2017-11-23 20:28:32', '16759.jpg'),
(16, 'The Black Eyed Peas', '2017-11-23 20:43:57', '30997.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcliente`
--

CREATE TABLE `tbcliente` (
  `CPF` varchar(10) NOT NULL DEFAULT '',
  `Nome` varchar(45) NOT NULL,
  `Telefone` varchar(15) DEFAULT NULL,
  `EMail` varchar(45) NOT NULL,
  `Senha` varchar(45) NOT NULL,
  `UF` varchar(2) NOT NULL,
  `Cidade` varchar(45) NOT NULL,
  `CEP` varchar(9) NOT NULL,
  `Rua` varchar(45) NOT NULL,
  `Num` varchar(7) NOT NULL,
  `Complemento` varchar(45) DEFAULT NULL,
  `DataCadCliente` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `DataNasc` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbcliente`
--

INSERT INTO `tbcliente` (`CPF`, `Nome`, `Telefone`, `EMail`, `Senha`, `UF`, `Cidade`, `CEP`, `Rua`, `Num`, `Complemento`, `DataCadCliente`, `DataNasc`) VALUES
('11111111', 'Gabriel Vinicius', '111111111111', 'gabriel.vga@r7.com', '123', 'SP', 'sdasdas', '111111111', 'asasd', '111', '', '2017-11-22 16:40:12', '2017-11-08'),
('1111111111', 'Lucas', '3232133213', 'lucas@gmail.com', 'abc', 'SP', 'Campinas', '12435876', 'xxx', '12', 'x', '2017-11-22 15:56:08', '2017-11-07'),
('123.213.12', 'Google', '(12) 2121-12221', 'math@gmail.com', 'abc', 'SP', 'SumarÃ©', '13174-526', 'Rua Presidente Prudente de Moraes', '112', 'XXX', '2017-11-23 06:19:58', '11/08/2017'),
('1234567891', 'Gabriel Vinicius', '32321312232', 'gabriel.vga@bol.com.br', '123', 'SP', 'SumarÃ©', '233213213', '3', '112', 'dsadas', '2017-11-18 01:07:39', '2017-11-22'),
('321.321.33', 'Gabriel Vinicius', '(32) 3213-23333', 'g@g.com', '123', 'SP', 'SumarÃ©', '13174-526', 'Rua Presidente Prudente de Moraes', '11', 'N/D', '2017-11-23 23:58:32', '11/08/2017'),
('342.132.21', 'Jessica', '(31) 1232-13132', 'j@j.com', 'qwerty', 'SP', 'SumarÃ©', '13174-526', 'Rua Presidente Prudente de Moraes', '999', 'N/D', '2017-11-23 18:17:26', '11/21/2017');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcompositor`
--

CREATE TABLE `tbcompositor` (
  `idCompositor` int(11) NOT NULL,
  `NomeCompositor` varchar(45) NOT NULL,
  `DataCadCompositor` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbcompositor`
--

INSERT INTO `tbcompositor` (`idCompositor`, `NomeCompositor`, `DataCadCompositor`) VALUES
(7, 'David Bowie', '2017-11-23 19:08:37'),
(8, 'Mick Jagger & Keith Richards', '2017-11-23 19:09:11'),
(9, ' Thomas Bangalter & Guy-Manuel de Homem-Chris', '2017-11-23 19:37:46'),
(10, '	Angus Young, Malcolm Young, Bon Scott', '2017-11-23 20:04:41'),
(11, 'Boudleaux Bryant', '2017-11-23 20:05:11'),
(12, 'Joan Jett', '2017-11-23 20:07:58'),
(13, 'Robert Hazard', '2017-11-23 20:29:55'),
(14, 'Cyndi Lauper', '2017-11-23 20:30:04'),
(15, 'Chip Taylor', '2017-11-23 20:33:51'),
(16, 'wiil.i.am', '2017-11-23 20:43:13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfornecedor`
--

CREATE TABLE `tbfornecedor` (
  `idFornecedor` int(11) NOT NULL,
  `DataCadGer` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `NomeFornecedor` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbfornecedor`
--

INSERT INTO `tbfornecedor` (`idFornecedor`, `DataCadGer`, `NomeFornecedor`) VALUES
(6, '2017-11-23 19:11:22', 'RCA'),
(7, '2017-11-23 19:38:06', 'Virgin'),
(8, '2017-11-23 19:50:01', 'Columbia Records'),
(9, '2017-11-23 20:04:15', 'Sony'),
(10, '2017-11-23 20:08:06', 'Boardwalk'),
(11, '2017-11-23 20:30:56', 'Portrait'),
(12, '2017-11-23 20:34:42', 'Bell Records'),
(13, '2017-11-23 20:35:12', 'Capitol Records'),
(14, '2017-11-23 20:44:13', 'Interscope');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbgenero`
--

CREATE TABLE `tbgenero` (
  `idGenero` int(11) NOT NULL,
  `NomeGenero` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbgenero`
--

INSERT INTO `tbgenero` (`idGenero`, `NomeGenero`) VALUES
(13, 'Rock'),
(14, 'Pop'),
(16, 'EletrÃ´nica'),
(17, 'Country'),
(18, 'Hip-Hop');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbgerenciador`
--

CREATE TABLE `tbgerenciador` (
  `Nome` varchar(45) NOT NULL,
  `EMail` varchar(45) NOT NULL,
  `Senha` varchar(45) NOT NULL,
  `idGer` int(11) NOT NULL,
  `DataCadGer` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbgerenciador`
--

INSERT INTO `tbgerenciador` (`Nome`, `EMail`, `Senha`, `idGer`, `DataCadGer`) VALUES
('Gabriel', 'adm@adm.com', 'adm', 2, '2017-11-17 18:08:41');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbmusica`
--

CREATE TABLE `tbmusica` (
  `idMusica` int(11) NOT NULL,
  `Duracao` tinyint(8) NOT NULL,
  `NomeMusica` varchar(45) NOT NULL,
  `Lancamento` smallint(4) DEFAULT NULL,
  `Faixa` tinyint(2) DEFAULT NULL,
  `DataCadMusica` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idmForn` int(11) NOT NULL,
  `idmGenero` int(11) NOT NULL,
  `idmAlbum` int(11) NOT NULL,
  `NomeAudio` varchar(45) NOT NULL,
  `idmCantor` int(11) NOT NULL,
  `idmCompositor` int(11) NOT NULL,
  `Gravadora` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbmusica`
--

INSERT INTO `tbmusica` (`idMusica`, `Duracao`, `NomeMusica`, `Lancamento`, `Faixa`, `DataCadMusica`, `idmForn`, `idmGenero`, `idmAlbum`, `NomeAudio`, `idmCantor`, `idmCompositor`, `Gravadora`) VALUES
(17, 5, 'One More Time', 2001, 1, '2017-11-23 19:39:14', 7, 16, 13, '31083.mp3', 12, 9, 'Virgin'),
(18, 3, 'Aerodynamic', 2001, 2, '2017-11-23 19:42:37', 7, 16, 13, '26960.mp3', 12, 9, 'Virgin'),
(19, 4, 'Digital Love', 2001, 3, '2017-11-23 19:43:24', 7, 16, 13, '26441.mp3', 12, 9, 'Virgin'),
(20, 3, 'Harder, Better, Faster, Stronger', 2001, 4, '2017-11-23 19:44:18', 7, 16, 13, '26702.mp3', 12, 9, 'Virgin');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbalbum`
--
ALTER TABLE `tbalbum`
  ADD PRIMARY KEY (`idAlbum`);

--
-- Índices para tabela `tbcantor`
--
ALTER TABLE `tbcantor`
  ADD PRIMARY KEY (`idCantor`),
  ADD UNIQUE KEY `idCantor_UNIQUE` (`idCantor`);

--
-- Índices para tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  ADD PRIMARY KEY (`CPF`),
  ADD UNIQUE KEY `CPF_UNIQUE` (`CPF`),
  ADD UNIQUE KEY `E-Mail_UNIQUE` (`EMail`);

--
-- Índices para tabela `tbcompositor`
--
ALTER TABLE `tbcompositor`
  ADD PRIMARY KEY (`idCompositor`),
  ADD UNIQUE KEY `idCompositor_UNIQUE` (`idCompositor`);

--
-- Índices para tabela `tbfornecedor`
--
ALTER TABLE `tbfornecedor`
  ADD PRIMARY KEY (`idFornecedor`),
  ADD UNIQUE KEY `idFornecedor_UNIQUE` (`idFornecedor`) USING BTREE,
  ADD UNIQUE KEY `NomeFornecedor_UNIQUE` (`NomeFornecedor`) USING HASH;

--
-- Índices para tabela `tbgenero`
--
ALTER TABLE `tbgenero`
  ADD PRIMARY KEY (`idGenero`);

--
-- Índices para tabela `tbgerenciador`
--
ALTER TABLE `tbgerenciador`
  ADD PRIMARY KEY (`idGer`),
  ADD UNIQUE KEY `E-Mail_UNIQUE` (`EMail`),
  ADD UNIQUE KEY `idForn_UNIQUE` (`idGer`);

--
-- Índices para tabela `tbmusica`
--
ALTER TABLE `tbmusica`
  ADD PRIMARY KEY (`idMusica`),
  ADD UNIQUE KEY `idMusica_UNIQUE` (`idMusica`),
  ADD KEY `fk_tbMusica_tbFornecedor1_idx` (`idmForn`),
  ADD KEY `fk_tbMusica_tbGênero1_idx` (`idmGenero`),
  ADD KEY `fk_tbMusica_tbAlbum1_idx` (`idmAlbum`),
  ADD KEY `fk_tbmusica_tbcantor1_idx` (`idmCantor`),
  ADD KEY `fk_tbmusica_tbcompositor1_idx` (`idmCompositor`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbalbum`
--
ALTER TABLE `tbalbum`
  MODIFY `idAlbum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `tbcantor`
--
ALTER TABLE `tbcantor`
  MODIFY `idCantor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `tbcompositor`
--
ALTER TABLE `tbcompositor`
  MODIFY `idCompositor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `tbfornecedor`
--
ALTER TABLE `tbfornecedor`
  MODIFY `idFornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tbgenero`
--
ALTER TABLE `tbgenero`
  MODIFY `idGenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `tbgerenciador`
--
ALTER TABLE `tbgerenciador`
  MODIFY `idGer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbmusica`
--
ALTER TABLE `tbmusica`
  MODIFY `idMusica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbmusica`
--
ALTER TABLE `tbmusica`
  ADD CONSTRAINT `fk_tbMusica_tbAlbum1` FOREIGN KEY (`idmAlbum`) REFERENCES `tbalbum` (`idAlbum`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbMusica_tbFornecedor1` FOREIGN KEY (`idmForn`) REFERENCES `tbfornecedor` (`idFornecedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbMusica_tbGênero1` FOREIGN KEY (`idmGenero`) REFERENCES `tbgenero` (`idGenero`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbmusica_tbcantor1` FOREIGN KEY (`idmCantor`) REFERENCES `tbcantor` (`idCantor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbmusica_tbcompositor1` FOREIGN KEY (`idmCompositor`) REFERENCES `tbcompositor` (`idCompositor`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
