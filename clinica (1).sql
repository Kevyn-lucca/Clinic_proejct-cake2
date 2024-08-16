-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15/08/2024 às 23:15
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
-- Banco de dados: `clinica`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `doutor_id` int(11) NOT NULL,
  `tipo_id` int(11) NOT NULL,
  `convenio_id` int(11) NOT NULL,
  `data_consulta` date DEFAULT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `consultas`
--

INSERT INTO `consultas` (`id`, `paciente_id`, `doutor_id`, `tipo_id`, `convenio_id`, `data_consulta`, `hora`) VALUES
(51, 13, 2, 7, 11, '2024-12-28', '08:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `consultas_desmarcadas`
--

CREATE TABLE `consultas_desmarcadas` (
  `id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `doutor_id` int(11) NOT NULL,
  `tipo_id` int(11) NOT NULL,
  `convenio_id` int(11) NOT NULL,
  `data_consulta` date DEFAULT NULL,
  `hora` time NOT NULL,
  `data_delecao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `convenios`
--

CREATE TABLE `convenios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `convenios`
--

INSERT INTO `convenios` (`id`, `nome`) VALUES
(9, 'AMIL'),
(10, 'Bradesco'),
(11, 'Unimed'),
(12, 'SulAmérica');

-- --------------------------------------------------------

--
-- Estrutura para tabela `doutor`
--

CREATE TABLE `doutor` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `crm` varchar(255) NOT NULL,
  `created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `doutor`
--

INSERT INTO `doutor` (`id`, `nome`, `crm`, `created`) VALUES
(1, 'Dr. João Almeida', '12345-SP', '2024-08-12 16:20:06'),
(2, 'Dr. Laura Santos', '67890-RJ', '2024-08-12 16:20:06'),
(3, 'Dr. Felipe Pereira', '23456-MG', '2024-08-12 16:20:06'),
(25, 'Dra.paula', '2312-df', '2024-08-15 21:58:48');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `nascimento` date NOT NULL,
  `convenio_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pacientes`
--

INSERT INTO `pacientes` (`id`, `nome`, `nascimento`, `convenio_id`) VALUES
(13, 'Kevyn', '2003-12-28', 9),
(14, 'Pedrinho jr', '2018-10-28', 11),
(15, 'Cleide', '1968-06-17', 12),
(16, '', '0000-00-00', NULL),
(17, 'Kevyn', '0222-12-31', NULL),
(18, 'Kevyn', '3000-12-28', NULL),
(19, 'Kevyn', '0333-03-22', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_consulta`
--

CREATE TABLE `tipo_consulta` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tipo_consulta`
--

INSERT INTO `tipo_consulta` (`id`, `nome`) VALUES
(1, 'Consulta especifica'),
(2, 'Consulta Cardiológica'),
(3, 'Consulta Neurológica'),
(7, 'Consulta Generalizada');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paciente_id` (`paciente_id`),
  ADD KEY `doutor_id` (`doutor_id`),
  ADD KEY `tipo_id` (`tipo_id`),
  ADD KEY `convenio_id` (`convenio_id`);

--
-- Índices de tabela `consultas_desmarcadas`
--
ALTER TABLE `consultas_desmarcadas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paciente_id` (`paciente_id`),
  ADD KEY `doutor_id` (`doutor_id`),
  ADD KEY `tipo_id` (`tipo_id`),
  ADD KEY `convenio_id` (`convenio_id`);

--
-- Índices de tabela `convenios`
--
ALTER TABLE `convenios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `doutor`
--
ALTER TABLE `doutor`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `convenio_id` (`convenio_id`);

--
-- Índices de tabela `tipo_consulta`
--
ALTER TABLE `tipo_consulta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de tabela `consultas_desmarcadas`
--
ALTER TABLE `consultas_desmarcadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `convenios`
--
ALTER TABLE `convenios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `doutor`
--
ALTER TABLE `doutor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `tipo_consulta`
--
ALTER TABLE `tipo_consulta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `consultas_ibfk_1` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`),
  ADD CONSTRAINT `consultas_ibfk_2` FOREIGN KEY (`doutor_id`) REFERENCES `doutor` (`id`),
  ADD CONSTRAINT `consultas_ibfk_3` FOREIGN KEY (`tipo_id`) REFERENCES `tipo_consulta` (`id`),
  ADD CONSTRAINT `consultas_ibfk_4` FOREIGN KEY (`convenio_id`) REFERENCES `convenios` (`id`);

--
-- Restrições para tabelas `consultas_desmarcadas`
--
ALTER TABLE `consultas_desmarcadas`
  ADD CONSTRAINT `consultas_desmarcadas_ibfk_1` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `consultas_desmarcadas_ibfk_2` FOREIGN KEY (`doutor_id`) REFERENCES `doutor` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `consultas_desmarcadas_ibfk_3` FOREIGN KEY (`tipo_id`) REFERENCES `tipo_consulta` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `consultas_desmarcadas_ibfk_4` FOREIGN KEY (`convenio_id`) REFERENCES `convenios` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`convenio_id`) REFERENCES `convenios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
