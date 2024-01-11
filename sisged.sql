-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 11-Jan-2024 às 13:09
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sisged`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `automacao`
--

DROP TABLE IF EXISTS `automacao`;
CREATE TABLE IF NOT EXISTS `automacao` (
  `id_automacao` int(11) NOT NULL,
  `fk_residencia` int(11) NOT NULL,
  `fk_cliente` int(11) NOT NULL,
  `fk_master` int(11) DEFAULT NULL,
  `fk_user` int(11) DEFAULT NULL,
  `fk_gerente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_automacao`),
  KEY `fk_cliente` (`fk_cliente`),
  KEY `fk_master` (`fk_master`),
  KEY `fk_user` (`fk_user`),
  KEY `fk_gerente` (`fk_gerente`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

DROP TABLE IF EXISTS `cadastro`;
CREATE TABLE IF NOT EXISTS `cadastro` (
  `id_cadastro` bigint(20) NOT NULL,
  `fk_endereco` bigint(20) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `contato` varchar(20) NOT NULL,
  PRIMARY KEY (`id_cadastro`),
  KEY `fk_endereco` (`fk_endereco`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`id_cadastro`, `fk_endereco`, `nome`, `email`, `contato`) VALUES
(1515, 69852144141, 'Zyon InformÃ¡tica', 'zyon@gmail.com', '96981145252'),
(8986, 68901785555, 'Robocore ', 'robocorecontato@gmail.com', '96991582363'),
(2412, 68901578563, 'Eletro Link InformÃ¡tica', 'eletrolinkcontato@gmail.com', '96991258544'),
(1480, 689015101204, 'Carlos Leandro Rocha de Souza', 'leandro.rochasouza98@gmail.com', '96981133027'),
(8875, 689015211222, 'Denilson Castro Ferreira Junior', 'denilsoncastro.fj@gmail.com', '96991445563'),
(6473, 68901563963, 'Sol Telecom & Informática', 'soltecnoadmin@gmail.com', '96984142312'),
(860, 68901543148, 'Ronaldo Santos Ribeiro', 'ronaldo.ribeiro17@gmail.com', '96981147455');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

DROP TABLE IF EXISTS `cargo`;
CREATE TABLE IF NOT EXISTS `cargo` (
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cargo` varchar(60) NOT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `nome_cargo`) VALUES
(5, 'Gerente de Produtos'),
(4, 'Gerente de Vendas'),
(3, 'Auxiliar Contábil'),
(2, 'Auxiliar Administrativo'),
(1, 'Chefe'),
(6, 'Gerente de Dados'),
(7, 'Analista de Dados'),
(8, 'Desenvolvedor Web Frontend'),
(9, 'Desenvolvedor Web Backend'),
(10, 'Atendente'),
(11, 'Arquiteto'),
(12, 'Analista de Obra'),
(13, 'Auxiliar Analista de Obra'),
(14, 'Analista de Software'),
(15, 'Engenheiro de Software'),
(16, 'Engenheiro Eletricista'),
(17, 'Motorista');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` bigint(20) NOT NULL,
  `fk_pf` bigint(20) DEFAULT NULL,
  `fk_pj` bigint(20) DEFAULT NULL,
  `fk_master` int(11) DEFAULT NULL,
  `fk_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `fk_pf` (`fk_pf`),
  KEY `fk_pj` (`fk_pj`),
  KEY `fk_master` (`fk_master`),
  KEY `fk_user` (`fk_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `fk_pf`, `fk_pj`, `fk_master`, `fk_user`) VALUES
(202310141515, NULL, 144525870001121515, 85263, NULL),
(202308286473, NULL, 142569850001126473, 85263, NULL),
(20230828860, 25562145899860, NULL, 85263, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comodo`
--

DROP TABLE IF EXISTS `comodo`;
CREATE TABLE IF NOT EXISTS `comodo` (
  `id_comodo` int(11) NOT NULL,
  `fk_residencia` int(11) NOT NULL,
  PRIMARY KEY (`id_comodo`),
  KEY `fk_residencia` (`fk_residencia`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

DROP TABLE IF EXISTS `compra`;
CREATE TABLE IF NOT EXISTS `compra` (
  `id_compra` int(11) NOT NULL,
  `fk_cliente` int(11) NOT NULL,
  `fk_master` int(11) DEFAULT NULL,
  `fk_user` int(11) DEFAULT NULL,
  `fk_gerente` int(11) DEFAULT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id_compra`),
  KEY `fk_cliente` (`fk_cliente`),
  KEY `fk_master` (`fk_master`),
  KEY `fk_user` (`fk_user`),
  KEY `fk_gerente` (`fk_gerente`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `desenvolvimento_web`
--

DROP TABLE IF EXISTS `desenvolvimento_web`;
CREATE TABLE IF NOT EXISTS `desenvolvimento_web` (
  `id_desenvWeb` int(11) NOT NULL,
  `fk_cliente` int(11) NOT NULL,
  `fk_master` int(11) DEFAULT NULL,
  `fk_user` int(11) DEFAULT NULL,
  `fk_gerente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_desenvWeb`),
  KEY `fk_cliente` (`fk_cliente`),
  KEY `fk_master` (`fk_master`),
  KEY `fk_user` (`fk_user`),
  KEY `fk_gerente` (`fk_gerente`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

DROP TABLE IF EXISTS `endereco`;
CREATE TABLE IF NOT EXISTS `endereco` (
  `id_endereco` bigint(20) NOT NULL,
  `cep` int(11) NOT NULL,
  `logradouro` varchar(60) NOT NULL,
  `bairro` varchar(60) NOT NULL,
  `numero` int(11) NOT NULL,
  PRIMARY KEY (`id_endereco`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id_endereco`, `cep`, `logradouro`, `bairro`, `numero`) VALUES
(68901785555, 68901785, 'Avenida Saúde Pimentel', 'Santa Rita', 555),
(689015101204, 68901510, 'Rua Novo Horizonte', 'Santa Inês', 1204),
(68901578563, 68901578, 'Rua Bem Estar', 'Novo Horizonte', 563),
(689015211222, 68901521, 'Avenida Mãe Luzia', 'Renascer', 1222),
(68901563963, 68901563, 'Avenida Independência', 'Santa Rita', 963),
(68901543148, 68901543, 'Rua Treze de Setembro', 'Trem', 148),
(69852144141, 69852144, 'Rua Seis de Julho', 'SÃ£o LazÃ¡ro', 141);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

DROP TABLE IF EXISTS `estoque`;
CREATE TABLE IF NOT EXISTS `estoque` (
  `id_estoque` int(11) NOT NULL,
  `qntd_comprada` int(11) NOT NULL,
  `data_compra` date NOT NULL,
  `data_entrega` date NOT NULL,
  `preco_atacado` double NOT NULL,
  `preco_unidade` double NOT NULL,
  `qntd_estoque` int(11) NOT NULL,
  `qntd_vendas_dia` int(11) NOT NULL,
  `qntd_vendas_mes` int(11) NOT NULL,
  `qntd_vendas_ano` int(11) NOT NULL,
  PRIMARY KEY (`id_estoque`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
CREATE TABLE IF NOT EXISTS `fornecedor` (
  `id_fornecedor` bigint(20) NOT NULL,
  `fk_pj` bigint(20) NOT NULL,
  `fk_master` int(11) DEFAULT NULL,
  `fk_gerente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_fornecedor`),
  KEY `fk_pj` (`fk_pj`),
  KEY `fk_master` (`fk_master`),
  KEY `fk_gerente` (`fk_gerente`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id_fornecedor`, `fk_pj`, `fk_master`, `fk_gerente`) VALUES
(202308282412, 142563330001152412, 85263, NULL),
(202308288986, 161445550001638986, 85263, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `id_funcionario` bigint(20) NOT NULL,
  `fk_master` int(11) NOT NULL,
  `fk_pf` bigint(20) DEFAULT NULL,
  `fk_setor` int(11) DEFAULT NULL,
  `fk_cargo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_funcionario`),
  KEY `fk_master` (`fk_master`),
  KEY `fk_pf` (`fk_pf`),
  KEY `fk_setor` (`fk_setor`),
  KEY `fk_cargo` (`fk_cargo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `fk_master`, `fk_pf`, `fk_setor`, `fk_cargo`) VALUES
(202308288875, 85263, 210147852128875, 3, 10),
(202302182565, 85263, 33383242601480, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `objeto`
--

DROP TABLE IF EXISTS `objeto`;
CREATE TABLE IF NOT EXISTS `objeto` (
  `id_objeto` int(11) NOT NULL,
  `fk_comodo` int(11) NOT NULL,
  PRIMARY KEY (`id_objeto`),
  KEY `fk_comodo` (`fk_comodo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa_fisica`
--

DROP TABLE IF EXISTS `pessoa_fisica`;
CREATE TABLE IF NOT EXISTS `pessoa_fisica` (
  `id_pf` bigint(20) NOT NULL,
  `fk_cadastro` int(11) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `rg` int(11) NOT NULL,
  `data_nasc` date NOT NULL,
  PRIMARY KEY (`id_pf`),
  KEY `fk_cadastro` (`fk_cadastro`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pessoa_fisica`
--

INSERT INTO `pessoa_fisica` (`id_pf`, `fk_cadastro`, `cpf`, `rg`, `data_nasc`) VALUES
(33383242601480, 1480, '3338324260', 640555, '1998-04-17'),
(210147852128875, 8875, '21014785212', 563120, '1993-11-01'),
(25562145899860, 860, '25562145899', 440852, '1985-07-23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa_juridica`
--

DROP TABLE IF EXISTS `pessoa_juridica`;
CREATE TABLE IF NOT EXISTS `pessoa_juridica` (
  `id_pj` bigint(20) NOT NULL,
  `fk_cadastro` bigint(20) NOT NULL,
  `cnpj` bigint(20) NOT NULL,
  PRIMARY KEY (`id_pj`),
  KEY `fk_cadastro` (`fk_cadastro`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pessoa_juridica`
--

INSERT INTO `pessoa_juridica` (`id_pj`, `fk_cadastro`, `cnpj`) VALUES
(161445550001638986, 8986, 16144555000163),
(142563330001152412, 2412, 14256333000115),
(144525870001121515, 1515, 14452587000112),
(142569850001126473, 6473, 14256985000112);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id_produto` int(11) NOT NULL,
  `fk_fornecedor` int(11) NOT NULL,
  `fk_master` int(11) DEFAULT NULL,
  `fk_gerente` int(11) DEFAULT NULL,
  `fk_automacao` int(11) DEFAULT NULL,
  `fk_desenvWeb` int(11) DEFAULT NULL,
  `fk_compra` int(11) DEFAULT NULL,
  `fk_estoque` int(11) DEFAULT NULL,
  `nomeProduto` varchar(60) NOT NULL,
  `codigo` bigint(20) NOT NULL,
  `marca` varchar(60) NOT NULL,
  `modelo` varchar(60) NOT NULL,
  `serie` varchar(60) NOT NULL,
  `qntd` int(11) NOT NULL,
  `preco_venda` double NOT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `fk_fornecedor` (`fk_fornecedor`),
  KEY `fk_master` (`fk_master`),
  KEY `fk_gerente` (`fk_gerente`),
  KEY `fk_automacao` (`fk_automacao`),
  KEY `fk_desenvWeb` (`fk_desenvWeb`),
  KEY `fk_compra` (`fk_compra`),
  KEY `fk_estoque` (`fk_estoque`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `residencia`
--

DROP TABLE IF EXISTS `residencia`;
CREATE TABLE IF NOT EXISTS `residencia` (
  `id_residencia` int(11) NOT NULL,
  `fk_endereco` int(11) NOT NULL,
  PRIMARY KEY (`id_residencia`),
  KEY `fk_endereco` (`fk_endereco`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

DROP TABLE IF EXISTS `servico`;
CREATE TABLE IF NOT EXISTS `servico` (
  `fk_especial` int(11) NOT NULL,
  `fk_automacao` int(11) NOT NULL,
  `fk_desenvWeb` int(11) NOT NULL,
  KEY `fk_especial` (`fk_especial`),
  KEY `fk_automacao` (`fk_automacao`),
  KEY `fk_desenvWeb` (`fk_desenvWeb`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

DROP TABLE IF EXISTS `setor`;
CREATE TABLE IF NOT EXISTS `setor` (
  `id_setor` int(11) NOT NULL AUTO_INCREMENT,
  `nome_setor` varchar(60) NOT NULL,
  PRIMARY KEY (`id_setor`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `setor`
--

INSERT INTO `setor` (`id_setor`, `nome_setor`) VALUES
(1, 'CEO'),
(2, 'Informática'),
(3, 'Atendimento'),
(4, 'Recursos Humanos'),
(5, 'Administração'),
(6, 'Financeiro'),
(7, 'Tesouraria'),
(8, 'Gerencia'),
(9, 'Jurídico'),
(10, 'Engenharia'),
(11, 'Programação'),
(12, 'Arquitetura'),
(13, 'Projeto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_comum`
--

DROP TABLE IF EXISTS `usuario_comum`;
CREATE TABLE IF NOT EXISTS `usuario_comum` (
  `id_user` bigint(20) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `fk_funcionario` bigint(20) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario_comum`
--

INSERT INTO `usuario_comum` (`id_user`, `usuario`, `senha`, `fk_funcionario`) VALUES
(67335, 'denilson.castro', '123', 202308288875);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_especial`
--

DROP TABLE IF EXISTS `usuario_especial`;
CREATE TABLE IF NOT EXISTS `usuario_especial` (
  `id_especial` bigint(20) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `fk_funcionario` bigint(20) NOT NULL,
  PRIMARY KEY (`id_especial`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_gerente`
--

DROP TABLE IF EXISTS `usuario_gerente`;
CREATE TABLE IF NOT EXISTS `usuario_gerente` (
  `id_gerente` bigint(20) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `fk_funcionario` bigint(20) NOT NULL,
  PRIMARY KEY (`id_gerente`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_master`
--

DROP TABLE IF EXISTS `usuario_master`;
CREATE TABLE IF NOT EXISTS `usuario_master` (
  `id_master` bigint(20) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `fk_funcionario` bigint(20) NOT NULL,
  PRIMARY KEY (`id_master`)
) ENGINE=MyISAM AUTO_INCREMENT=85264 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario_master`
--

INSERT INTO `usuario_master` (`id_master`, `usuario`, `senha`, `fk_funcionario`) VALUES
(85263, 'carlos.souza', '123', 202302182565);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
