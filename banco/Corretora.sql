-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 27/11/2014 às 23:22
-- Versão do servidor: 5.6.20
-- Versão do PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `Corretora`
--
CREATE DATABASE IF NOT EXISTS `Corretora` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `Corretora`;

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `altera_seguro`(data_vencimento varchar(2), preco_mensal decimal(18,2), status varchar(1), id int)
begin
	update Seguros set data_vencimento = data_vencimento,  preco_mensal = preco_mensal, status = status where idSeguros = id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cadastro_cliente`(nome varchar(100), endereco varchar(100), telefone varchar(20), tipo varchar(1), email varchar(50), cpf_cnpj varchar(20))
begin
	insert into Clientes (nome, endereco, telefone, tipo, email, cpf_cnpj) values (nome, endereco, telefone, tipo, email, cpf_cnpj);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `efetuar_pagamento`(data_pagamento date, id int)
begin
	insert into Pagamentos (data_pagamento, idSeguros) values (data_pagamento, id);
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Administrador`
--

CREATE TABLE IF NOT EXISTS `Administrador` (
`idAdministrador` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Fazendo dump de dados para tabela `Administrador`
--

INSERT INTO `Administrador` (`idAdministrador`, `nome`, `login`, `senha`) VALUES
(1, 'Victor Arruda', 'victor', '123');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Clientes`
--

CREATE TABLE IF NOT EXISTS `Clientes` (
`idCliente` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `tipo` varchar(1) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `cpf_cnpj` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Fazendo dump de dados para tabela `Clientes`
--

INSERT INTO `Clientes` (`idCliente`, `nome`, `endereco`, `telefone`, `tipo`, `email`, `cpf_cnpj`) VALUES
(1, 'Victor Arruda', 'Rua Recife', '', '1', 'victor.arruda23@gmail.com', '035.473.970-06'),
(4, 'Eduardo Jorge', 'Rua Verde', '43', '2', 'pv@gmail.com', '555'),
(8, 'Carlos', 'Rua Azul', '(51) 1111-1111111', '1', 'churrros@ibest.com', '666.666.666-66'),
(9, 'Nilvia', 'Rua Recife', '(51) 92641523', '1', 'nilvia@bol.com.br', '541.822.200-72'),
(10, 'Otávio Schwanck', 'Rua Ernesto Silva, 412', '(51) 1111-1111', '1', 'otavioscwanck@gmail.com', '000.000.000-00'),
(11, 'Jonas Almeida', 'Rua Verde, Número 14', '(51) 3664-4612', '2', 'jonas_almeida@gmail.com', '00.000.000/0000-00'),
(13, 'Douglas Neves', 'Avenida independencia', '(51) 3664-4612', '1', 'aaa@gmail.com', '035.473.970-06'),
(14, 'Carlos Alberto da Silva', 'Rua Recife, 647', '(51) 3664-4612', '1', 'silberthes@ibest.com.br', '210.634.510-00'),
(15, 'Alexandro Arruda', 'Rua 1234', '(51) 3664-4612', '1', 'alexandro@gmail.com', '000.000.000-00'),
(16, 'Victor Arruda', 'Rua Recife, 647', '(51) 3664-4631', '1', 'victor.arruda23@gmail.com', '000.000.000-00'),
(17, 'João da Silva Sauro', 'Rua Azul, 23', '(51) 3664-2721', '1', 'jao@hotmail.com', '000.000.000-00'),
(18, 'Junior', 'Rua Verde', '(51) 3664-9999', '1', 'jr@bol.com.br', '111.111.111-11'),
(19, '1231', '1231321', '(32) 1312-312', '1', 'otavio@gmail.com', '111.111.111-11');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Historico`
--

CREATE TABLE IF NOT EXISTS `Historico` (
`idHistorico` int(11) NOT NULL,
  `data_modificacao` date DEFAULT NULL,
  `idSeguros` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `idCliente` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Fazendo dump de dados para tabela `Historico`
--

INSERT INTO `Historico` (`idHistorico`, `data_modificacao`, `idSeguros`, `usuario`, `descricao`, `idCliente`) VALUES
(1, '2014-11-20', 21, 'root@localhost', NULL, NULL),
(2, '2014-11-21', 22, 'root@localhost', 'Criou um Novo Seguro', NULL),
(3, '2014-11-21', 23, 'root@localhost', 'Criou um Novo Seguro', NULL),
(4, '2014-11-21', 23, 'root@localhost', 'Editou um Seguro', NULL),
(5, '2014-11-23', 24, 'root@localhost', 'Criou um Novo Seguro', NULL),
(6, '2014-11-23', 24, 'root@localhost', 'Editou um Seguro', NULL),
(7, '2014-11-26', 24, 'root@localhost', 'Editou um Seguro', NULL),
(8, '2014-11-26', 25, 'root@localhost', 'Criou um Novo Seguro', NULL),
(9, '2014-11-26', 25, 'root@localhost', 'Editou um Seguro', NULL),
(10, '2014-11-26', 26, 'root@localhost', 'Criou um Novo Seguro', NULL),
(11, '2014-11-26', 26, 'root@localhost', 'Editou um Seguro', NULL),
(12, '2014-11-26', 27, 'root@localhost', 'Criou um Novo Seguro', NULL),
(13, '2014-11-26', 27, 'root@localhost', 'Editou um Seguro', NULL),
(14, '2014-11-27', 27, 'root@localhost', 'Editou um Seguro', NULL),
(15, '2014-11-27', 27, 'root@localhost', 'Editou um Seguro', NULL),
(16, '2014-11-27', 27, 'root@localhost', 'Efetuou um pagamento', NULL),
(17, '2014-11-27', 28, 'root@localhost', 'Criou um Novo Seguro', NULL),
(18, '2014-11-27', 28, 'root@localhost', 'Editou um Seguro', NULL),
(19, '2014-11-27', 8, 'root@localhost', 'Efetuou um pagamento', NULL),
(20, '2014-11-27', 1, 'root@localhost', 'Efetuou um pagamento', NULL),
(21, '2014-11-27', 28, 'root@localhost', 'Editou um Seguro', NULL),
(22, '2014-11-27', 1, 'root@localhost', 'Editou um Seguro', NULL),
(23, '2014-11-27', 27, 'root@localhost', 'Efetuou um pagamento', NULL),
(24, '2014-11-27', 27, 'root@localhost', 'Efetuou um pagamento', NULL),
(25, '2014-11-28', 27, 'root@localhost', 'Efetuou um pagamento', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Pagamentos`
--

CREATE TABLE IF NOT EXISTS `Pagamentos` (
`idPagamentos` int(11) NOT NULL,
  `data_pagamento` varchar(45) DEFAULT NULL,
  `idSeguros` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Fazendo dump de dados para tabela `Pagamentos`
--

INSERT INTO `Pagamentos` (`idPagamentos`, `data_pagamento`, `idSeguros`) VALUES
(1, '2014-11-22', 1),
(2, '2014-11-23', 24),
(3, '2014-11-26', 25),
(4, '2014-11-26', 26),
(5, '2014-11-26', 27),
(6, '2014-11-27', 27),
(7, '2014-11-27', 25),
(8, '2014-11-27', 27),
(9, '0019-12-12', 8),
(10, '1994-12-15', 1),
(11, '2014-11-27', 27),
(12, '2014-11-28', 27),
(13, '2014-11-28', 27);

--
-- Gatilhos `Pagamentos`
--
DELIMITER //
CREATE TRIGGER `efetuou_pagamento` AFTER INSERT ON `Pagamentos`
 FOR EACH ROW begin
	insert into Historico (data_modificacao, idSeguros, usuario, descricao)
		 values (new.data_pagamento, new.idSeguros, current_user(), 'Efetuou um pagamento');
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Seguros`
--

CREATE TABLE IF NOT EXISTS `Seguros` (
`idSeguros` int(11) NOT NULL,
  `tipo` varchar(2) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_vencimento` varchar(2) NOT NULL,
  `preco_mensal` double NOT NULL,
  `status` varchar(1) NOT NULL,
  `idCliente` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Fazendo dump de dados para tabela `Seguros`
--

INSERT INTO `Seguros` (`idSeguros`, `tipo`, `data_inicio`, `data_vencimento`, `preco_mensal`, `status`, `idCliente`) VALUES
(1, '20', '2014-11-19', '10', 40, '1', 1),
(2, '9', '2014-11-20', '12', 47, '1', 1),
(3, '18', '2014-11-19', '13', 35.47, '1', 4),
(7, '1', '0000-00-00', '', 0, '1', 1),
(8, '1', '0000-00-00', '', 0, '1', 4),
(9, '1', '2014-11-04', '14', 2132131, '1', 4),
(10, '16', '2014-11-20', '1', 666, '1', 1),
(11, '1', '2014-11-20', '33', 22, '1', 1),
(17, '1', '2014-11-20', '11', 22, '1', 10),
(20, '13', '2014-11-21', '11', 22.3, '1', 9),
(21, '17', '2014-11-20', '11', 23, '1', 10),
(22, '20', '2014-11-21', '10', 55.6, '1', 1),
(23, '15', '2014-11-22', '10', 30.9, '1', 11),
(24, '20', '2014-11-23', '10', 20, '1', 14),
(25, '11', '2014-11-26', '12', 40.99, '1', 15),
(26, '18', '2014-11-26', '10', 50.25, '1', 16),
(27, '4', '2014-11-26', '10', 70, '1', 17),
(28, '19', '1994-12-15', '11', 200, '1', 18);

--
-- Gatilhos `Seguros`
--
DELIMITER //
CREATE TRIGGER `criou_seguro` AFTER INSERT ON `Seguros`
 FOR EACH ROW begin
	insert into Historico (data_modificacao, idSeguros, usuario, descricao) values (curdate(), new.idSeguros, current_user(), 'Criou um Novo Seguro');
end
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `editou_seguro` AFTER UPDATE ON `Seguros`
 FOR EACH ROW begin
	insert into Historico (data_modificacao, idSeguros, usuario, descricao) values (curdate(), new.idSeguros, current_user(), 'Editou um Seguro');
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `dados_para_historico`
--
CREATE TABLE IF NOT EXISTS `dados_para_historico` (
`data_modificacao` date
,`usuario` varchar(50)
,`descricao` varchar(100)
,`tipo` varchar(2)
,`nome` varchar(45)
,`cpf_cnpj` varchar(20)
);
-- --------------------------------------------------------

--
-- Estrutura stand-in para view `pagamentos_do_cliente`
--
CREATE TABLE IF NOT EXISTS `pagamentos_do_cliente` (
`id_c` int(11)
,`data_pagamento` varchar(45)
,`tipo` varchar(2)
,`nome` varchar(45)
);
-- --------------------------------------------------------

--
-- Estrutura para view `dados_para_historico`
--
DROP TABLE IF EXISTS `dados_para_historico`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dados_para_historico` AS select `i`.`data_modificacao` AS `data_modificacao`,`i`.`usuario` AS `usuario`,`i`.`descricao` AS `descricao`,`s`.`tipo` AS `tipo`,`c`.`nome` AS `nome`,`c`.`cpf_cnpj` AS `cpf_cnpj` from ((`Historico` `i` join `Seguros` `s` on((`i`.`idSeguros` = `s`.`idSeguros`))) join `Clientes` `c` on((`c`.`idCliente` = `s`.`idCliente`)));

-- --------------------------------------------------------

--
-- Estrutura para view `pagamentos_do_cliente`
--
DROP TABLE IF EXISTS `pagamentos_do_cliente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pagamentos_do_cliente` AS select `c`.`idCliente` AS `id_c`,`p`.`data_pagamento` AS `data_pagamento`,`s`.`tipo` AS `tipo`,`c`.`nome` AS `nome` from ((`Pagamentos` `p` join `Seguros` `s` on((`p`.`idSeguros` = `s`.`idSeguros`))) join `Clientes` `c` on((`s`.`idCliente` = `c`.`idCliente`)));

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `Administrador`
--
ALTER TABLE `Administrador`
 ADD PRIMARY KEY (`idAdministrador`);

--
-- Índices de tabela `Clientes`
--
ALTER TABLE `Clientes`
 ADD PRIMARY KEY (`idCliente`);

--
-- Índices de tabela `Historico`
--
ALTER TABLE `Historico`
 ADD PRIMARY KEY (`idHistorico`), ADD KEY `idSeguros` (`idSeguros`);

--
-- Índices de tabela `Pagamentos`
--
ALTER TABLE `Pagamentos`
 ADD PRIMARY KEY (`idPagamentos`), ADD KEY `fk_Pagamentos_Seguros1_idx` (`idSeguros`);

--
-- Índices de tabela `Seguros`
--
ALTER TABLE `Seguros`
 ADD PRIMARY KEY (`idSeguros`), ADD KEY `fk_Seguros_Clientes1_idx` (`idCliente`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `Administrador`
--
ALTER TABLE `Administrador`
MODIFY `idAdministrador` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `Clientes`
--
ALTER TABLE `Clientes`
MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de tabela `Historico`
--
ALTER TABLE `Historico`
MODIFY `idHistorico` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de tabela `Pagamentos`
--
ALTER TABLE `Pagamentos`
MODIFY `idPagamentos` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de tabela `Seguros`
--
ALTER TABLE `Seguros`
MODIFY `idSeguros` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `Historico`
--
ALTER TABLE `Historico`
ADD CONSTRAINT `Historico_ibfk_1` FOREIGN KEY (`idSeguros`) REFERENCES `Seguros` (`idSeguros`);

--
-- Restrições para tabelas `Pagamentos`
--
ALTER TABLE `Pagamentos`
ADD CONSTRAINT `fk_Pagamentos_Seguros1` FOREIGN KEY (`idSeguros`) REFERENCES `Seguros` (`idSeguros`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `Seguros`
--
ALTER TABLE `Seguros`
ADD CONSTRAINT `fk_Seguros_Clientes1` FOREIGN KEY (`idCliente`) REFERENCES `Clientes` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
