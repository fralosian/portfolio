select current_date;
select * from cadastro;
select * from vagas;
select * from aluno;
select * from curriculo;
select * from aluno;
select * from endereco;
truncate aluno;
truncate curriculo;


truncate aluno;
truncate endereco;
alter DATABASE `techjobs_012016` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
use `techjobs_012016`;
--
-- Database: `techjobs_012016`
--
-- --------------------------------------------------------
--
-- Estrutura da tabela `aluno`
--
CREATE TABLE `aluno` (
  `id_aluno` int(11) PRIMARY key NOT NULL AUTO_INCREMENT,
  `Cadastro_id_cadastro` int(11) NOT NULL,
  `Endereco_id_endereco` int(11) NOT NULL,
  `rm` int(11) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(12) NOT NULL,
  `dt_nascimento` date NOT NULL,
  `celular` varchar(14) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `trancado` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
--
-- --------------------------------------------------------
--
-- Estrutura da tabela `cadastro`
--
CREATE TABLE `cadastro` (
  `id_cadastro` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `email` varchar(250) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `codigo` varchar(250) NOT NULL,
  `tipo` int(11) NOT NULL,
  `ativo` tinyint(1) DEFAULT NULL,
  `nome` varchar(90) NOT NULL,
  `dica_senha` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
--
-- --------------------------------------------------------
--
-- Estrutura da tabela `empresa`
--
CREATE TABLE `empresa` (
  `Cadastro_id_cadastro` int(11) NOT NULL,
  `Endereco_id_endereco` int(11) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `telefone_comercial` varchar(14) NOT NULL,
  `data_fundacao` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
--
-- --------------------------------------------------------
--
-- Estrutura da tabela `endereco`
--
CREATE TABLE `endereco` (
  `id_endereco` int(11) key NOT NULL auto_increment,
  `rua` varchar(500) NOT NULL,
  `numero` bigint NOT NULL,
  `cep` varchar(9) NOT NULL,
  `bairro` varchar(250) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `complemento` varchar(155) NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
--
-- --------------------------------------------------------
--
-- Estrutura da tabela `status_entrevista`
--
CREATE TABLE `status_entrevista` (
  `Cadastro_id_cadastro` int(11) NOT NULL,
  `Aluno_id_aluno` int(11) NOT NULL,
  `presente` tinyint(1) DEFAULT NULL,
  `aprovado` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
--
-- --------------------------------------------------------
--
-- Estrutura da tabela `curriculo`
--
drop table curriculo;
CREATE TABLE `curriculo` (
  Aluno_id_aluno INT NOT NULL,
  escolaridade VARCHAR(255) NULL,
  instituicao_escolar VARCHAR(250) NULL,
  conclusao_escolar VARCHAR(40) NULL,
  ano_escolar varchar(4) NULL,
  curso1 VARCHAR(80) NULL,
  curso1_instituicao VARCHAR(80) NULL,
  curso1_conclusao VARCHAR(80) NULL,
  curso1_ano  varchar(4) NULL,
  curso2 VARCHAR(80) NULL,
  curso2_instituicao VARCHAR(80) NULL,
  curso2_conclusao VARCHAR(80) NULL,
  curso2_ano  varchar(4) NULL,
  curso3 VARCHAR(80) NULL,
  curso3_instituicao VARCHAR(80) NULL,
  curso3_conclusao VARCHAR(80) NULL,
  curso3_ano  varchar(4) NULL,
  nacionalidade VARCHAR(70) NOT NULL,
  idioma1 VARCHAR(25) NULL,
  idioma1_nivel VARCHAR(25) NULL,
  idioma2 VARCHAR(25) NULL,
  idioma2_nivel VARCHAR(25) NULL,
  idioma3 VARCHAR(25) NULL,
  idioma3_nivel VARCHAR(25) NULL,
  exp1_cargo varchar (150) null,
  exp1_empresa varchar (150) null,
  exp1_entrada  varchar(7) null,
  exp1_saida varchar(7) null,
  exp2_cargo varchar (150) null,
  exp2_empresa varchar (150) null,
  exp2_entrada varchar(7) null,
  exp2_saida varchar(7) null,
  exp3_cargo varchar (150) null,
  exp3_empresa varchar (150) null,
  exp3_entrada varchar(7) null,
  exp3_saida varchar(7) null,
  INDEX Curiculo_FKIndex1(Aluno_id_aluno)
);
--
-- --------------------------------------------------------
--
-- Estrutura da tabela `vagas`
--
CREATE TABLE `vagas` (
  `id_vaga` int(11)  PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `vaga` varchar(60) NOT NULL,
  `area` varchar(20) NOT NULL,
  `dt_vaga` datetime NOT NULL,
  `id_cadastro` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `periodo` varchar(50) NOT NULL,
  `exigencias` text NULL,
  `beneficios` text NULL  
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
--
-- --------------------------------------------------------
--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
ADD KEY `Aluno_FKIndex1` (`Endereco_id_endereco`),
ADD KEY `Empresa_FKIndex3` (`Cadastro_id_cadastro`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
ADD KEY `Empresa_FKIndex1` (`Endereco_id_endereco`),
ADD KEY `Empresa_FKIndex3` (`Cadastro_id_cadastro`);

--
-- Indexes for table `vagas`
--
ALTER TABLE `vagas`
ADD KEY `id_cadastro` (`id_cadastro`);
