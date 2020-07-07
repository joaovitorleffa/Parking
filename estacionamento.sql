-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Tempo de geração: 07-Jul-2020 às 13:22
-- Versão do servidor: 8.0.18
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `estacionamento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `estacionamento`
--

DROP TABLE IF EXISTS `estacionamento`;
CREATE TABLE IF NOT EXISTS `estacionamento` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_veiculo` int(11) NOT NULL,
  `entrada` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_veiculo` (`id_veiculo`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

DROP TABLE IF EXISTS `historico`;
CREATE TABLE IF NOT EXISTS `historico` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_veiculo` int(11) NOT NULL,
  `entrada` datetime NOT NULL,
  `saida` datetime NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `estadia` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_veiculo` (`id_veiculo`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`id`, `id_veiculo`, `entrada`, `saida`, `valor`, `estadia`) VALUES
(1, 1, '2020-06-19 21:52:42', '2020-06-19 21:52:43', '0.00', '0.00'),
(2, 1, '2020-06-24 17:43:31', '2020-06-24 17:43:38', '0.00', '0.00'),
(3, 2, '2020-06-24 17:44:03', '2020-06-24 17:44:08', '0.00', '0.00'),
(4, 1, '2020-06-24 17:44:05', '2020-06-24 17:44:10', '0.00', '0.00'),
(5, 2, '2020-06-24 18:45:18', '2020-06-24 18:46:15', '0.31', '0.02'),
(6, 3, '2020-06-24 18:45:15', '2020-06-24 18:46:17', '0.31', '0.02'),
(7, 1, '2020-06-24 18:45:18', '2020-06-24 18:46:19', '0.31', '0.02'),
(8, 4, '2020-06-24 18:46:14', '2020-06-24 18:46:20', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

DROP TABLE IF EXISTS `veiculos`;
CREATE TABLE IF NOT EXISTS `veiculos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `modelo` varchar(30) NOT NULL,
  `placa` varchar(7) NOT NULL,
  `cliente` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `veiculos`
--

INSERT INTO `veiculos` (`id`, `modelo`, `placa`, `cliente`) VALUES
(1, 'das', 'das', 'João Vitor'),
(2, 'Hyundai HB20', 'JNM2451', 'Predro'),
(3, 'Fiat Uno', 'KMN8910', 'Julia'),
(4, 'dkas', 'dksa', 'Rosane');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
