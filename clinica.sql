-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/08/2024 às 23:58
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
  `data` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `consultas`
--

INSERT INTO `consultas` (`id`, `paciente_id`, `doutor_id`, `tipo_id`, `convenio_id`, `data`, `hora`) VALUES
(5, 1, 1, 1, 1, '2024-08-15', '09:00:00'),
(6, 2, 2, 2, 2, '2024-08-16', '10:30:00'),
(7, 3, 3, 3, 3, '2024-08-17', '14:00:00'),
(8, 1, 1, 1, 1, '2024-08-15', '09:00:00'),
(9, 2, 2, 2, 2, '2024-08-16', '10:30:00'),
(10, 3, 3, 3, 3, '2024-08-17', '14:00:00');

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
(1, 'medicos muito bons'),
(2, 'RADADADADADA'),
(3, 'lelel'),
(4, 'Sasas');

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
(19, '231232', 'dasdad', '2024-08-13 19:54:22');

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
(1, 'Maria Oliveira', '1980-05-10', 1),
(2, 'José Silva', '1975-11-22', 2),
(3, 'Ana Costa', '1990-01-30', 3),
(4, 'Carlos Santos', '1985-09-15', 4);

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
(1, 'Consulta Geral'),
(2, 'Consulta Cardiológica'),
(3, 'Consulta Neurológica'),
(4, 'Consulta Pediátrica');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `convenios`
--
ALTER TABLE `convenios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `doutor`
--
ALTER TABLE `doutor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tipo_consulta`
--
ALTER TABLE `tipo_consulta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- Restrições para tabelas `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`convenio_id`) REFERENCES `convenios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
