-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Abr-2023 às 21:31
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `curso`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `idaluno` int(6) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `celular` varchar(30) NOT NULL,
  `logradouro` varchar(100) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `bairro` varchar(80) NOT NULL,
  `cidade` varchar(80) NOT NULL,
  `latitude` varchar(15) NOT NULL,
  `longitude` varchar(15) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`idaluno`, `nome`, `cpf`, `email`, `celular`, `logradouro`, `numero`, `bairro`, `cidade`, `latitude`, `longitude`, `status`) VALUES
(2, 'Claudio Araujo', '345.567.890-34', 'claudio@gmail.com', '(14)98845674', 'Rua XV de Novembro', '2873', 'Parque Jardim Europa', 'Jahuuuuuuu', '-22.330251', '-49.068236', 'A'),
(3, 'Mario da Silva', '1231123132', 'mario@gmail.com', '99999', '', '', '', '', '-22.329616', '-49.068271', 'A'),
(4, 'Joao Paulo Cabral', '9821902812', 'joao@gmail.com', '9992982928', '', '', '', '', '-22.330365', '-49.071288', 'A'),
(5, 'Claudio Araujo', '33333333333', 'maria@gmail.com', '99888827', 'Rua XV de Novembro', '1234', 'Centro', 'Jahu', '-23.77887', '-49.9999', 'A'),
(7, 'Maria da Silva', '222222222', 'maria@gmail.com', '988888', 'Rua 7 de Setembro', '1234', 'Centro', 'Barra Bonita', '-23.77887', '-49.909', 'A'),
(8, 'Meire Alberta', '55555555', 'meire@gmail.com', '9723636', 'Rua Antônio Alves', '45', 'Centro', 'Jahu', '-24.9888', '-49.9999', 'A'),
(9, 'hgh', '656565655', 'gustavo@gmail.com', '6888', '66666', '777', 'Centro', 'Barra Bonita', '-23.77887', '-49.909', 'A'),
(10, 'jkdhskfhk', '9201391892398', 'alsaduas@gmail', '0888qywu', 'askdjhsdk', '192871', 'Centro', 'Barra Bonita', '-23.77887', '-49.9999', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunocurso`
--

CREATE TABLE `alunocurso` (
  `idalunocurso` int(6) NOT NULL,
  `idaluno` int(6) NOT NULL,
  `idcurso` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `alunocurso`
--

INSERT INTO `alunocurso` (`idalunocurso`, `idaluno`, `idcurso`) VALUES
(24, 7, 3),
(25, 2, 3),
(26, 4, 1),
(27, 2, 11),
(28, 2, 1),
(29, 2, 1),
(30, 2, 3),
(31, 2, 1),
(32, 2, 1),
(33, 2, 3),
(34, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `idcurso` int(6) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`idcurso`, `nome`, `status`) VALUES
(1, 'Alemão', 'I'),
(2, 'Espanhol', 'I'),
(3, 'Francês', 'A'),
(5, 'Mandarim', 'A'),
(11, 'Russo', 'A');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`idaluno`);

--
-- Índices para tabela `alunocurso`
--
ALTER TABLE `alunocurso`
  ADD PRIMARY KEY (`idalunocurso`),
  ADD KEY `idaluno` (`idaluno`),
  ADD KEY `idcurso` (`idcurso`);

--
-- Índices para tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idcurso`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `idaluno` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `alunocurso`
--
ALTER TABLE `alunocurso`
  MODIFY `idalunocurso` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `idcurso` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `alunocurso`
--
ALTER TABLE `alunocurso`
  ADD CONSTRAINT `alunocurso_ibfk_1` FOREIGN KEY (`idcurso`) REFERENCES `curso` (`idcurso`),
  ADD CONSTRAINT `alunocurso_ibfk_2` FOREIGN KEY (`idaluno`) REFERENCES `aluno` (`idaluno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
