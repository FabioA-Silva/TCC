-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/12/2023 às 01:51
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `consultas`
--

CREATE TABLE `consultas` (
  `idconsulta` int(11) NOT NULL,
  `idpaciente` int(11) NOT NULL,
  `idprocedimento` int(11) NOT NULL,
  `idodontologo` int(11) NOT NULL,
  `data_consulta` date NOT NULL,
  `hora` time NOT NULL,
  `descripcao` varchar(500) NOT NULL,
  `situacao` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `color` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `consultas`
--

INSERT INTO `consultas` (`idconsulta`, `idpaciente`, `idprocedimento`, `idodontologo`, `data_consulta`, `hora`, `descripcao`, `situacao`, `title`, `color`) VALUES
(83, 5, 2, 23, '2023-10-29', '08:00:00', 'Quero fazer um clareamento dentario', ' pendiente', 'CLAREAMENTO', '#ffffff'),
(84, 9, 3, 30, '2023-10-30', '08:00:00', 'Quero avaliar como esta meu dente', ' pendiente', 'AVALIAÇÃO', '#ffffff'),
(85, 5, 7, 29, '2023-10-31', '15:00:00', 'xxss', ' pendiente', 'sdsd', '#ffffff'),
(86, 14, 6, 30, '2023-11-01', '08:30:00', 'IMPLANTE', ' pendiente', 'IMPLANTE', '#396179'),
(87, 5, 8, 23, '2023-11-02', '09:00:00', 'ORTODONTIA', ' pendiente', 'ORTODONTIA', '#66ffa1'),
(88, 15, 3, 29, '2023-10-29', '15:00:00', 'Quero avaliar como esta meu dente', 'pendiente', 'avaliar', '#472b54'),
(90, 12, 2, 30, '2023-10-29', '07:00:00', 'CORES', 'pendiente', 'CORES', '#396179'),
(91, 15, 5, 30, '2023-10-29', '12:00:00', 'PERIODICO', ' pendiente', 'PERIODICO', '#396179'),
(92, 14, 9, 30, '2023-11-04', '09:00:00', 'MANUTENÇÃO', ' concluida', 'Manutenção', '#396179'),
(93, 14, 6, 30, '2023-11-09', '09:00:00', 'IMPLANTE', ' concluida', 'IMPLANTE', '#396179'),
(95, 14, 9, 30, '2023-12-10', '10:30:00', 'MANUTENÇÃO O)!', ' pendiente', 'MANUTENÇÃO', '#396179'),
(96, 14, 2, 30, '2023-12-30', '07:30:00', 'CLAREAR O DENTE AAA', ' pendiente', 'CLAREAR O DENTE', '#396179'),
(97, 14, 2, 30, '2023-11-03', '08:30:00', 'CLAREAR', ' pendiente', 'CLAREAR', '#396179'),
(99, 14, 9, 30, '2023-12-02', '08:30:00', 'MANUTENÇÃO', ' pendiente', 'MANUTENÇÃO', '#396179'),
(101, 14, 3, 23, '2023-12-04', '09:30:00', 'Clareamento', 'Pendente', 'Clareamento - Daniel Perez', '#ffffff'),
(102, 18, 8, 23, '2024-04-02', '08:30:00', 'euc nao gostuei, eu asmei Ass cleitin', 'Pendente', '!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!', '#66ffa1'),
(103, 18, 2, 30, '2023-12-04', '09:00:00', 'Clarear o Dente', 'Pendente', 'Clareamento - Jonas', '#ffffff'),
(104, 3, 3, 30, '2023-12-05', '10:30:00', 'Avaliar o Dente Esquerdo Frontal Analogico', 'Pendente', 'Avaliação - Dibu', '#396179'),
(105, 18, 6, 30, '2023-12-05', '11:00:00', 'Implante Dentário', 'Pendente', 'Implante Odontológico - Jonas', '#396179'),
(106, 9, 8, 23, '2023-12-05', '08:30:00', 'Ortodontia', 'Pendente', 'ORTODONTIA - Gabriel Lopez', '#66ffa1'),
(107, 14, 9, 29, '2023-12-06', '16:00:00', 'Manutencao', 'Concluída', 'Manutenção - Margaret Renato', '#472b54'),
(108, 8, 7, 29, '2023-12-06', '14:30:00', '', 'Concluída', 'Tratamento Periodontal - Luisão Ochoa', '#472b54'),
(109, 5, 3, 30, '2023-12-09', '09:00:00', '', 'Concluída', 'AVALIACAO - CAROLINA', '#396179'),
(110, 14, 7, 29, '2023-12-09', '15:30:00', '', 'Concluída', 'TRATAMENTO PERIODONTAL - MARGARET RENATO', '#472b54');

-- --------------------------------------------------------

--
-- Estrutura para tabela `detalle`
--

CREATE TABLE `detalle` (
  `id` int(11) NOT NULL,
  `descripcao_proc` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `id_orcamento` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `detalle`
--

INSERT INTO `detalle` (`id`, `descripcao_proc`, `quantidade`, `preco`, `id_orcamento`) VALUES
(1, 'ortodoncia', 1, 480.00, 1),
(2, 'manutencao ortodoncia', 24, 120.00, 1),
(3, 'clareamento', 3, 200.00, 2),
(4, 'TRATAMENTO DE CANAL', 2, 400.00, 3),
(5, 'ORTODONTIA', 1, 350.00, 4),
(6, 'MANUTENÇÃO ORTODONTIA', 12, 120.00, 4),
(7, 'TRATAMENTO DE CANAL', 2, 100.00, 5),
(8, 'IMPLANTE ODONTOLÓGICO', 1, 50.00, 5),
(9, 'AVALIAÇÃO', 1, 1.00, 6),
(10, 'IMPLANTE ODONTOLÓGICO', 2, 100.00, 6),
(11, 'ORTODONTIA', 1, 200.00, 6),
(12, 'CLAREAMENTO', 1, 50.00, 7),
(13, 'ORTODONTIA', 2, 120.00, 7),
(14, 'CLAREAMENTO', 1, 100.00, 8),
(15, 'ORTODONTIA', 2, 2000.00, 8),
(16, 'AVALIAÇÃO', 2, 0.00, 8),
(17, 'TRATAMENTO DE CANAL', 2, 500.00, 9),
(18, 'ORTODONTIA', 1, 200.00, 9),
(19, 'AVALIAÇÃO', 1, 0.00, 9),
(20, 'TRATAMENTO DE CANAL', 1, 100.00, 10),
(21, 'AVALIAÇÃO', 2, 0.00, 10),
(22, 'ORTODONTIA', 2, 1.00, 10),
(23, 'CLAREAMENTO', 1, 50.00, 11),
(24, 'TRATAMENTO DE CANAL', 2, 503.00, 11),
(25, 'AVALIAÇÃO', 1, 1.00, 11),
(26, 'AVALIAÇÃO', 1, 0.00, 12),
(27, 'CLAREAMENTO', 2, 100.00, 12),
(28, 'MANUTENÇÃO ORTODONTIA', 1, 2000.00, 12),
(29, 'CLAREAMENTO', 1, 50.00, 14),
(30, 'IMPLANTE ODONTOLÓGICO', 1, 495.00, 14),
(31, 'TRATAMENTO DE CANAL', 2, 200.00, 14),
(32, 'TRATAMENTO DE CANAL', 1, 656.00, 15),
(33, 'TRATAMENTO PERIODONTAL', 1, 53.00, 15),
(34, 'MANUTENÇÃO ORTODONTIA', 1, 4400.00, 15),
(35, 'CLAREAMENTO', 1, 59.00, 16),
(36, 'AVALIAÇÃO', 1, 0.00, 16),
(37, 'ORTODONTIA', 2, 2000.00, 16),
(38, 'AVALIAÇÃO', 1, 0.00, 17),
(39, 'CLAREAMENTO', 1, 100.00, 17),
(40, 'IMPLANTE ODONTOLÓGICO', 2, 2000.00, 17),
(41, 'AVALIAÇÃO', 1, 100.00, 18),
(42, 'CLAREAMENTO', 2, 200.00, 18),
(43, 'ORTODONTIA', 2, 200.00, 18),
(44, 'CLAREAMENTO', 1, 100.00, 19),
(45, 'CLAREAMENTO', 1, 100.00, 20),
(46, 'TRATAMENTO DE CANAL', 1, 2500.00, 20),
(47, 'PRÓTESE DENTÁRIA REMOVÍVEL', 2, 100.00, 21),
(48, 'TRATAMENTO PERIODONTAL', 2, 2232.00, 21),
(49, 'ORTODONTIA', 2, 1.00, 21),
(50, 'CLAREAMENTO', 1, 50.00, 22),
(51, 'PRÓTESE DENTÁRIA REMOVÍVEL', 1, 1500.00, 22),
(52, 'ORTODONTIA', 2, 550.00, 22),
(53, 'CLAREAMENTO', 2, 100.00, 23),
(54, 'MANUTENÇÃO ORTODONTIA', 1, 2500.00, 23),
(55, 'TRATAMENTO DE CANAL', 1, 500.00, 23),
(56, 'CLAREAMENTO', 1, 0.00, 24),
(57, 'PRÓTESE DENTÁRIA REMOVÍVEL', 2, 50.00, 24),
(58, 'ORTODONTIA', 2, 200.00, 24),
(59, 'AVALIAÇÃO', 1, 100.00, 25),
(60, 'IMPLANTE ODONTOLÓGICO', 2, 150.00, 25),
(61, 'ORTODONTIA', 2, 3000.00, 25),
(62, 'MANUTENÇÃO ORTODONTIA', 1, 5000.00, 25),
(63, 'CLAREAMENTO', 2, 100.00, 26),
(64, 'AVALIAÇÃO', 1, 0.00, 26),
(65, 'IMPLANTE ODONTOLÓGICO', 1, 2000.00, 26),
(66, 'ORTODONTIA', 2, 2200.00, 26),
(67, 'AVALIAÇÃO', 1, 0.00, 27),
(68, 'TRATAMENTO DE CANAL', 2, 200.00, 27),
(69, 'CLAREAMENTO', 1, 0.00, 28),
(70, 'CLAREAMENTO', 2, 100.00, 28),
(71, 'ORTODONTIA', 1, 2000.00, 28),
(72, 'TRATAMENTO DE CANAL', 1, 5000.00, 28),
(73, 'CLAREAMENTO', 1, 100.00, 29),
(74, 'AVALIAÇÃO', 1, 0.00, 29),
(75, 'TRATAMENTO PERIODONTAL', 1, 2000.00, 29),
(76, 'MANUTENÇÃO ORTODONTIA', 2, 2200.00, 29),
(77, 'AVALIAÇÃO', 1, 100.00, 30),
(78, 'CLAREAMENTO', 1, 200.00, 30),
(79, 'TRATAMENTO PERIODONTAL', 1, 2424.00, 30),
(80, 'CLAREAMENTO', 1, 200.00, 31),
(81, 'TRATAMENTO PERIODONTAL', 2, 2000.00, 31),
(82, 'AVALIAÇÃO', 2, 0.00, 31),
(83, 'TRATAMENTO DE CANAL', 1, 500.00, 32),
(84, 'CLAREAMENTO', 2, 100.00, 32),
(85, 'AVALIAÇÃO', 1, 0.00, 32),
(86, 'AVALIAÇÃO', 1, 100.00, 33),
(87, 'TRATAMENTO PERIODONTAL', 1, 200.00, 33),
(88, 'MANUTENÇÃO ORTODONTIA', 1, 455.00, 33),
(89, 'TRATAMENTO DE CANAL', 1, 500.00, 34),
(90, 'AVALIAÇÃO', 1, 0.00, 34),
(91, 'ORTODONTIA', 1, 2000.00, 34),
(92, 'TRATAMENTO DE CANAL', 2, 5000.00, 34),
(93, 'CLAREAMENTO', 2, 100.00, 34),
(94, 'CLAREAMENTO', 1, 100.00, 35),
(95, 'ORTODONTIA', 2, 200.00, 35),
(96, 'MANUTENÇÃO ORTODONTIA', 1, 1000.00, 35),
(97, 'PRÓTESE DENTÁRIA REMOVÍVEL', 2, 2500.00, 35),
(98, 'AVALIAÇÃO', 1, 0.00, 36),
(99, 'PRÓTESE DENTÁRIA REMOVÍVEL', 1, 445.00, 36),
(100, 'ORTODONTIA', 2, 5566.00, 36),
(101, 'AVALIAÇÃO', 1, 0.00, 37),
(102, 'CLAREAMENTO', 2, 100.00, 37),
(103, 'TRATAMENTO PERIODONTAL', 1, 500.00, 37),
(104, 'PRÓTESE DENTÁRIA REMOVÍVEL', 2, 2000.00, 37),
(105, 'CLAREAMENTO', 1, 200.00, 38),
(106, 'AVALIAÇÃO', 1, 0.00, 38),
(107, 'ORTODONTIA', 1, 2000.00, 38),
(108, 'PRÓTESE DENTÁRIA REMOVÍVEL', 2, 2599.00, 38),
(109, 'CLAREAMENTO', 2, 100.00, 39),
(110, 'AVALIAÇÃO', 1, 0.00, 39),
(111, 'PRÓTESE DENTÁRIA REMOVÍVEL', 2, 2500.00, 39),
(112, 'ORTODONTIA', 1, 500.00, 39),
(113, 'CLAREAMENTO', 2, 100.00, 40),
(114, 'TRATAMENTO DE CANAL', 2, 139.00, 40),
(115, 'TRATAMENTO PERIODONTAL', 1, 513.00, 40),
(116, 'AVALIAÇÃO', 1, 0.00, 40),
(117, 'ORTODONTIA', 1, 984.00, 40),
(118, 'AVALIAÇÃO', 2, 33.00, 41),
(119, 'PRÓTESE DENTÁRIA REMOVÍVEL', 1, 4344.00, 41),
(120, 'CLAREAMENTO', 2, 333.00, 41),
(121, 'AVALIAÇÃO', 1, 0.00, 41),
(122, 'TRATAMENTO DE CANAL', 1, 4545.00, 42),
(123, 'CLAREAMENTO', 1, 200.00, 42),
(124, 'AVALIAÇÃO', 1, 0.00, 42),
(125, 'MANUTENÇÃO ORTODONTIA', 1, 2000.00, 42),
(126, 'PRÓTESE DENTÁRIA REMOVÍVEL', 1, 100.00, 43),
(127, 'TRATAMENTO PERIODONTAL', 1, 455.00, 43),
(128, 'CLAREAMENTO', 2, 100.00, 43),
(129, 'AVALIAÇÃO', 1, 0.00, 43),
(130, 'MANUTENÇÃO ORTODONTIA', 1, 5000.00, 43),
(131, 'IMPLANTE ODONTOLÓGICO', 2, 2599.00, 43),
(132, 'TRATAMENTO PERIODONTAL', 2, 100.00, 44),
(133, 'PRÓTESE DENTÁRIA REMOVÍVEL', 1, 50.00, 44),
(134, 'MANUTENÇÃO ORTODONTIA', 1, 1500.00, 45),
(135, 'AVALIAÇÃO', 1, 50.00, 45),
(136, 'TRATAMENTO PERIODONTAL', 2, 100.00, 45),
(137, 'TRATAMENTO DE CANAL', 1, 650.00, 46),
(138, 'PRÓTESE DENTÁRIA REMOVÍVEL', 1, 1500.00, 46),
(139, 'CLAREAMENTO', 2, 400.00, 46),
(140, 'TRATAMENTO DE CANAL', 1, 650.00, 47),
(141, 'CLAREAMENTO', 2, 400.00, 47),
(142, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 47),
(143, 'TRATAMENTO PERIODONTAL', 1, 350.00, 47),
(144, 'ORTODONTIA', 1, 400.00, 47),
(145, 'TRATAMENTO DE CANAL', 1, 650.00, 47),
(146, 'TRATAMENTO DE CANAL', 1, 650.00, 47),
(147, 'PRÓTESE DENTÁRIA REMOVÍVEL', 2, 1500.00, 47),
(148, 'ORTODONTIA', 2, 400.00, 47),
(149, 'TRATAMENTO DE CANAL', 2, 650.00, 48),
(150, 'CLAREAMENTO', 2, 400.00, 48),
(151, 'AVALIAÇÃO', 1, 0.00, 48),
(152, 'ORTODONTIA', 1, 400.00, 48),
(153, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 48),
(154, 'TRATAMENTO PERIODONTAL', 2, 350.00, 48),
(155, 'AVALIAÇÃO', 1, 0.00, 48),
(156, 'TRATAMENTO DE CANAL', 1, 650.00, 49),
(157, 'AVALIAÇÃO', 2, 0.00, 50),
(158, 'TRATAMENTO DE CANAL', 1, 650.00, 50),
(159, 'ORTODONTIA', 1, 400.00, 51),
(160, 'IMPLANTE ODONTOLÓGICO', 2, 3500.00, 51),
(161, 'IMPLANTE ODONTOLÓGICO', 2, 3500.00, 51),
(162, 'CLAREAMENTO', 1, 400.00, 52),
(163, 'PRÓTESE DENTÁRIA REMOVÍVEL', 2, 1500.00, 53),
(164, 'PRÓTESE DENTÁRIA REMOVÍVEL', 1, 1500.00, 53),
(165, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 54),
(166, 'CLAREAMENTO', 1, 400.00, 54),
(167, 'ORTODONTIA', 1, 400.00, 54),
(168, 'AVALIAÇÃO', 1, 0.00, 55),
(169, 'IMPLANTE ODONTOLÓGICO', 2, 3500.00, 55),
(170, 'IMPLANTE ODONTOLÓGICO', 2, 3500.00, 56),
(171, 'ORTODONTIA', 2, 400.00, 56),
(172, 'TRATAMENTO DE CANAL', 1, 650.00, 57),
(173, 'IMPLANTE ODONTOLÓGICO', 2, 3500.00, 57),
(174, 'TRATAMENTO DE CANAL', 2, 650.00, 58),
(175, 'IMPLANTE ODONTOLÓGICO', 2, 3500.00, 58),
(176, 'TRATAMENTO DE CANAL', 2, 650.00, 59),
(177, 'IMPLANTE ODONTOLÓGICO', 2, 3500.00, 59),
(178, 'PRÓTESE DENTÁRIA REMOVÍVEL', 2, 1500.00, 60),
(179, 'ORTODONTIA', 1, 400.00, 60),
(180, 'TRATAMENTO DE CANAL', 2, 650.00, 61),
(181, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 61),
(182, 'IMPLANTE ODONTOLÓGICO', 2, 3500.00, 62),
(183, 'PRÓTESE DENTÁRIA REMOVÍVEL', 1, 1500.00, 63),
(184, 'CLAREAMENTO', 1, 400.00, 63),
(185, 'TRATAMENTO DE CANAL', 1, 650.00, 64),
(186, 'TRATAMENTO PERIODONTAL', 2, 350.00, 65),
(187, 'TRATAMENTO DE CANAL', 2, 650.00, 66),
(188, 'TRATAMENTO DE CANAL', 1, 650.00, 66),
(189, 'PRÓTESE DENTÁRIA REMOVÍVEL', 1, 1500.00, 69),
(190, '', 0, 0.00, 69),
(191, 'TRATAMENTO DE CANAL', 1, 650.00, 70),
(192, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 71),
(193, 'PRÓTESE DENTÁRIA REMOVÍVEL', 1, 1500.00, 72),
(194, 'TRATAMENTO DE CANAL', 1, 650.00, 73),
(195, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 74),
(196, 'TRATAMENTO DE CANAL', 1, 650.00, 75),
(197, 'IMPLANTE ODONTOLÓGICO', 2, 3500.00, 75),
(198, 'TRATAMENTO PERIODONTAL', 1, 350.00, 76),
(199, 'CLAREAMENTO', 2, 400.00, 76),
(200, 'TRATAMENTO DE CANAL', 1, 650.00, 76),
(201, 'MANUTENÇÃO ORTODONTIA', 1, 120.00, 76),
(202, 'PRÓTESE DENTÁRIA REMOVÍVEL', 1, 1500.00, 77),
(203, 'CLAREAMENTO', 1, 400.00, 77),
(204, 'AVALIAÇÃO', 1, 0.00, 77),
(205, 'TRATAMENTO DE CANAL', 1, 650.00, 77),
(206, 'PRÓTESE DENTÁRIA REMOVÍVEL', 1, 1500.00, 77),
(207, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 77),
(208, 'ORTODONTIA', 1, 400.00, 77),
(209, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 78),
(210, 'AVALIAÇÃO', 1, 0.00, 79),
(211, 'TRATAMENTO DE CANAL', 1, 650.00, 80),
(212, 'ORTODONTIA', 1, 400.00, 80),
(213, 'TRATAMENTO DE CANAL', 1, 650.00, 81),
(214, 'PRÓTESE DENTÁRIA REMOVÍVEL', 2, 1500.00, 81),
(215, 'ORTODONTIA', 1, 400.00, 81),
(216, 'MANUTENÇÃO ORTODONTIA', 1, 120.00, 81),
(217, 'AVALIAÇÃO', 1, 0.00, 82),
(218, 'TRATAMENTO DE CANAL', 2, 650.00, 82),
(219, 'CLAREAMENTO', 1, 400.00, 83),
(220, 'PRÓTESE DENTÁRIA REMOVÍVEL', 2, 1500.00, 83),
(221, 'AVALIAÇÃO', 1, 0.00, 84),
(222, 'TRATAMENTO PERIODONTAL', 2, 350.00, 84),
(223, '', 2, 0.00, 85),
(224, '', 1, 650.00, 85),
(225, 'AVALIAÇÃO', 1, 0.00, 86),
(226, 'TRATAMENTO PERIODONTAL', 2, 350.00, 86),
(227, 'TRATAMENTO DE CANAL', 1, 650.00, 87),
(228, 'PRÓTESE DENTÁRIA REMOVÍVEL', 1, 1500.00, 87),
(229, 'PRÓTESE DENTÁRIA REMOVÍVEL', 1, 1500.00, 88),
(230, 'AVALIAÇÃO', 1, 0.00, 88),
(231, 'PRÓTESE DENTÁRIA REMOVÍVEL', 1, 1500.00, 89),
(232, 'TRATAMENTO DE CANAL', 1, 650.00, 90),
(233, 'TRATAMENTO PERIODONTAL', 1, 350.00, 90),
(234, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 91),
(235, 'CLAREAMENTO', 1, 400.00, 91),
(236, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 92),
(237, 'CLAREAMENTO', 1, 400.00, 92),
(238, 'PRÓTESE DENTÁRIA REMOVÍVEL', 2, 1500.00, 93),
(239, 'TRATAMENTO DE CANAL', 1, 650.00, 93),
(240, 'TRATAMENTO DE CANAL', 1, 650.00, 94),
(241, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 94),
(242, 'TRATAMENTO DE CANAL', 1, 650.00, 95),
(243, 'PRÓTESE DENTÁRIA REMOVÍVEL', 1, 1500.00, 95),
(244, 'TRATAMENTO DE CANAL', 1, 650.00, 96),
(245, 'TRATAMENTO PERIODONTAL', 1, 350.00, 96),
(246, 'PRÓTESE DENTÁRIA REMOVÍVEL', 1, 1500.00, 97),
(247, 'MANUTENÇÃO ORTODONTIA', 1, 120.00, 97),
(248, 'CLAREAMENTO', 2, 400.00, 98),
(249, 'TRATAMENTO PERIODONTAL', 1, 350.00, 98),
(250, 'MANUTENÇÃO ORTODONTIA', 1, 120.00, 98),
(251, 'TRATAMENTO DE CANAL', 2, 650.00, 98),
(252, 'ORTODONTIA', 1, 400.00, 98),
(253, 'AVALIAÇÃO', 1, 0.00, 98),
(254, 'PRÓTESE DENTÁRIA REMOVÍVEL', 1, 1500.00, 98),
(255, 'ORTODONTIA', 2, 400.00, 99),
(256, 'TRATAMENTO DE CANAL', 1, 650.00, 99),
(257, 'CLAREAMENTO', 2, 400.00, 99);

-- --------------------------------------------------------

--
-- Estrutura para tabela `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `id` int(11) NOT NULL,
  `descripcao` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `id_factura` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `detalle_factura`
--

INSERT INTO `detalle_factura` (`id`, `descripcao`, `quantidade`, `preco`, `id_factura`) VALUES
(1, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 1),
(2, 'MANUTENÇÃO ORTODONTIA', 1, 120.00, 2),
(3, 'CLAREAMENTO', 1, 0.00, 3),
(4, 'PRÓTESE DENTÁRIA REMOVÍVEL', 1, 200.00, 3),
(5, 'AVALIAÇÃO', 1, 0.00, 4),
(6, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 4),
(7, 'AVALIAÇÃO', 1, 0.00, 4),
(8, '', 0, 0.00, 4),
(9, '', 0, 0.00, 4),
(10, '', 0, 0.00, 4),
(11, '', 0, 0.00, 4),
(12, '', 0, 0.00, 4),
(13, '', 0, 0.00, 4),
(14, '', 0, 0.00, 4),
(15, '', 0, 0.00, 4),
(16, '', 1, 0.00, 4),
(17, '', 1, 3500.00, 4),
(18, '', 1, 0.00, 4),
(19, '', 1, 3500.00, 4),
(20, 'AVALIAÇÃO', 1, 0.00, 5),
(21, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 5),
(22, 'AVALIAÇÃO', 1, 0.00, 5),
(23, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 6),
(24, 'AVALIAÇÃO', 1, 0.00, 7),
(25, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 7),
(26, 'AVALIAÇÃO', 1, 0.00, 8),
(27, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 8),
(28, 'AVALIAÇÃO', 1, 0.00, 9),
(29, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 9),
(30, 'AVALIAÇÃO', 1, 0.00, 10),
(31, 'AVALIAÇÃO', 1, 0.00, 10),
(32, 'AVALIAÇÃO', 1, 0.00, 11),
(33, 'AVALIAÇÃO', 1, 0.00, 12),
(34, 'AVALIAÇÃO', 1, 0.00, 13),
(35, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 14),
(36, 'AVALIAÇÃO', 1, 0.00, 15),
(37, 'AVALIAÇÃO', 1, 0.00, 16),
(38, 'AVALIAÇÃO', 1, 0.00, 17),
(39, 'ORTODONTIA', 1, 400.00, 18),
(40, 'ORTODONTIA', 1, 400.00, 19),
(41, 'ORTODONTIA', 1, 400.00, 20),
(42, 'ORTODONTIA', 1, 400.00, 21),
(43, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 22),
(44, 'ORTODONTIA', 1, 400.00, 23),
(45, 'AVALIAÇÃO', 1, 0.00, 24),
(46, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 25),
(47, 'AVALIAÇÃO', 1, 0.00, 26),
(48, 'ORTODONTIA', 1, 400.00, 27),
(49, 'ORTODONTIA', 1, 400.00, 28),
(50, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 29),
(51, 'AVALIAÇÃO', 1, 0.00, 30),
(52, 'AVALIAÇÃO', 1, 0.00, 31),
(53, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 32),
(54, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 33),
(55, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 34),
(56, 'ORTODONTIA', 1, 400.00, 35),
(57, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 36),
(58, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 37),
(59, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 38),
(60, 'AVALIAÇÃO', 1, 0.00, 39),
(61, 'AVALIAÇÃO', 1, 0.00, 40),
(62, 'AVALIAÇÃO', 1, 0.00, 41),
(63, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 42),
(64, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 43),
(65, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 44),
(66, 'AVALIAÇÃO', 1, 0.00, 45),
(67, 'ORTODONTIA', 1, 400.00, 46),
(68, 'ORTODONTIA', 1, 400.00, 47),
(69, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 48),
(70, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 49),
(71, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 50),
(72, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 51),
(73, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 52),
(74, 'ORTODONTIA', 1, 400.00, 53),
(75, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 54),
(76, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 55),
(77, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 56),
(78, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 57),
(79, 'ORTODONTIA', 1, 400.00, 58),
(80, 'MANUTENÇÃO ORTODONTIA', 1, 120.00, 59),
(81, 'MANUTENÇÃO ORTODONTIA', 1, 120.00, 60),
(82, 'MANUTENÇÃO ORTODONTIA', 1, 120.00, 61),
(83, 'MANUTENÇÃO ORTODONTIA', 1, 120.00, 62),
(84, 'MANUTENÇÃO ORTODONTIA', 1, 120.00, 63),
(85, 'MANUTENÇÃO ORTODONTIA', 1, 120.00, 64),
(86, 'TRATAMENTO PERIODONTAL', 1, 350.00, 65),
(87, 'AVALIAÇÃO', 1, 0.00, 66),
(88, 'TRATAMENTO PERIODONTAL', 1, 350.00, 67);

-- --------------------------------------------------------

--
-- Estrutura para tabela `facturas`
--

CREATE TABLE `facturas` (
  `id` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `idpaciente` int(11) NOT NULL,
  `descripcao` varchar(255) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `total_neto` double NOT NULL,
  `total_iva` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `facturas`
--

INSERT INTO `facturas` (`id`, `data`, `idpaciente`, `descripcao`, `monto`, `total_neto`, `total_iva`) VALUES
(1, '2023-11-15 21:24:44', 14, '', 3500.00, 3500, 455),
(2, '2023-11-15 21:30:38', 14, '', 120.00, 120, 15.6),
(3, '2023-11-28 00:57:11', 6, '', 200.00, 200, 26),
(4, '2023-12-05 09:48:14', 0, '', 10500.00, 10500, 1365),
(5, '2023-12-05 09:49:34', 0, '', 3500.00, 3500, 455),
(6, '2023-12-05 09:49:42', 0, '', 3500.00, 3500, 455),
(7, '2023-12-05 09:51:06', 0, '', 3500.00, 3500, 455),
(8, '2023-12-05 09:51:24', 0, '', 3500.00, 3500, 455),
(9, '2023-12-05 09:53:25', 0, '', 3500.00, 3500, 455),
(10, '2023-12-05 10:02:46', 0, '', 0.00, 0, 0),
(11, '2023-12-05 10:03:29', 0, '', 0.00, 0, 0),
(12, '2023-12-05 10:05:30', 104, '', 0.00, 0, 0),
(13, '2023-12-05 10:06:40', 104, '', 0.00, 0, 0),
(14, '2023-12-05 10:36:51', 105, '', 3500.00, 3500, 455),
(15, '2023-12-05 12:04:00', 104, '', 0.00, 0, 0),
(16, '2023-12-05 12:19:00', 104, '', 0.00, 0, 0),
(17, '2023-12-05 12:21:02', 104, '', 0.00, 0, 0),
(18, '2023-12-05 12:23:26', 106, '', 400.00, 400, 52),
(19, '2023-12-05 13:04:05', 106, '', 400.00, 400, 52),
(20, '2023-12-05 13:05:00', 106, '', 400.00, 400, 52),
(21, '2023-12-05 13:05:25', 106, '', 400.00, 400, 52),
(22, '2023-12-05 13:15:32', 0, '', 3500.00, 3500, 455),
(23, '2023-12-05 13:15:55', 0, '', 400.00, 400, 52),
(24, '2023-12-05 13:52:17', 0, '', 0.00, 0, 0),
(25, '2023-12-05 13:53:40', 0, '', 3500.00, 3500, 455),
(26, '2023-12-05 14:08:47', 0, '', 0.00, 0, 0),
(27, '2023-12-05 14:11:11', 0, '', 400.00, 400, 52),
(28, '2023-12-05 14:15:14', 0, '', 400.00, 400, 52),
(29, '2023-12-05 14:16:55', 0, 'sasasasasa', 3500.00, 3500, 455),
(30, '2023-12-05 14:19:05', 0, 'AVAAAAA', 0.00, 0, 0),
(31, '2023-12-05 14:21:53', 3, '111111111', 0.00, 0, 0),
(32, '2023-12-05 14:32:11', 18, 'sdsdsdsd', 3500.00, 3500, 455),
(33, '2023-12-05 14:32:42', 18, 'dsdsdsdsdsds', 3500.00, 3500, 455),
(34, '2023-12-05 14:33:05', 18, 'dsdss', 3500.00, 3500, 455),
(35, '2023-12-05 14:33:27', 9, '1sds', 400.00, 400, 52),
(36, '2023-12-05 14:34:38', 18, '1dsds', 3500.00, 0, 0),
(37, '2023-12-05 14:35:11', 18, '22', 3500.00, 0, 0),
(38, '2023-12-05 14:35:40', 18, 'sdsd', 3500.00, 0, 0),
(39, '2023-12-05 14:36:53', 3, 'dsds', 0.00, 0, 0),
(40, '2023-12-05 14:38:56', 3, 'dssds', 0.00, 0, 0),
(41, '2023-12-05 14:40:41', 3, 'dsds', 0.00, 0, 0),
(42, '2023-12-05 14:42:12', 18, 'sdsd', 3500.00, 0, 0),
(43, '2023-12-05 14:42:46', 18, 'sdsds', 3500.00, 0, 0),
(44, '2023-12-05 14:43:01', 18, 'dsdsd', 3500.00, 0, 0),
(45, '2023-12-05 14:44:56', 3, 'sdsds', 0.00, 0, 0),
(46, '2023-12-05 14:45:57', 9, 'sdsdsdsds', 400.00, 0, 0),
(47, '2023-12-05 14:46:36', 9, 'dsds', 400.00, 0, 0),
(48, '2023-12-05 14:49:05', 18, 'dsdsd', 3500.00, 0, 0),
(49, '2023-12-05 14:49:32', 18, 'dsds', 3500.00, 0, 0),
(50, '2023-12-05 14:50:15', 18, 'sdsd', 3500.00, 0, 0),
(51, '2023-12-05 14:50:56', 18, 'dsdsdsd', 3500.00, 0, 0),
(52, '2023-12-05 14:51:08', 18, 'sdsdsds', 3500.00, 0, 0),
(53, '2023-12-05 14:52:10', 9, 'dsdsdsd', 400.00, 0, 0),
(54, '2023-12-05 14:52:35', 18, 'sdsds', 3500.00, 0, 0),
(55, '2023-12-05 14:54:59', 18, 'dsdsd', 3500.00, 0, 0),
(56, '2023-12-05 14:55:30', 18, 'sdsdsd', 3500.00, 0, 0),
(57, '2023-12-05 14:55:59', 18, 'dsdsd', 3500.00, 0, 0),
(58, '2023-12-05 15:02:02', 9, 'assa', 400.00, 0, 0),
(59, '2023-12-06 01:02:27', 14, 'Manutenção da Ortodontia, está no processo de corrigir a posição dos dentes.', 120.00, 0, 0),
(60, '2023-12-06 01:04:53', 14, 'ddsdssdsd', 120.00, 0, 0),
(61, '2023-12-06 01:05:04', 14, 'dsdsdssdssssssssssssssssssssssssssssssssddsdsdsdsdsdsdsdsdsd', 120.00, 0, 0),
(62, '2023-12-06 01:05:52', 14, 'Ela veio hoje corrigir a posição dos dentes, está no processo.', 120.00, 0, 0),
(63, '2023-12-06 01:06:43', 14, 'Ela veio corrigir a posição dos dentes, está no processo.', 120.00, 0, 0),
(64, '2023-12-06 01:08:13', 14, 'Ela veio corrigir a posição dos dentes, está melhorando a posição.', 120.00, 0, 0),
(65, '2023-12-06 10:02:06', 8, 'Tudo certo com o tratamento, avançando!', 350.00, 0, 0),
(66, '2023-12-09 01:03:06', 5, 'Isso ai mesmo', 0.00, 0, 0),
(67, '2023-12-09 01:15:24', 14, 'dsdss', 350.00, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `descripcao_proc` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `items_factura`
--

CREATE TABLE `items_factura` (
  `id` int(11) NOT NULL,
  `descripcao` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `odontologos`
--

CREATE TABLE `odontologos` (
  `idodontologo` int(11) NOT NULL,
  `nome_odontologo` varchar(100) NOT NULL,
  `cpf` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `horario_entrada` time NOT NULL,
  `horario_saida` time NOT NULL,
  `color` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `odontologos`
--

INSERT INTO `odontologos` (`idodontologo`, `nome_odontologo`, `cpf`, `email`, `telefone`, `horario_entrada`, `horario_saida`, `color`) VALUES
(23, 'Cleber Ribeiro', '194.695.697-59', 'cleberribas@gmail.com', '4498485884610', '07:30:00', '13:30:00', '#66ffa1'),
(29, 'Pedro Cesar', '596.694.693-50', 'pedrocesar@gmail.com', '449884883085', '14:00:00', '18:00:00', '#472b54'),
(30, 'Adriana Helson', '456.678.585-67', 'adrianahelson@gmail.com', '449885238108', '07:00:00', '12:00:00', '#396179');

-- --------------------------------------------------------

--
-- Estrutura para tabela `orcamentos`
--

CREATE TABLE `orcamentos` (
  `id` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `idpaciente` int(11) NOT NULL,
  `descripcao_orc` varchar(255) NOT NULL,
  `monto` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `orcamentos`
--

INSERT INTO `orcamentos` (`id`, `data`, `idpaciente`, `descripcao_orc`, `monto`) VALUES
(1, '2023-11-14 20:17:39', 3, 'ORTODONCIA COMPLETA', 3360.00),
(2, '2023-11-14 21:05:47', 6, 'CLAREAMENTO DENTAL', 600.00),
(3, '2023-11-15 19:37:53', 6, 'TRATAMENTO DE CANAL', 800.00),
(4, '2023-11-15 21:17:09', 12, 'ORTODONTIA COMPLETA', 1790.00),
(5, '2023-11-21 17:40:21', 9, 'TRATAMENTO DE CANAL e IMPLANTE ODONTOLÓGICO', 250.00),
(6, '2023-11-28 00:10:26', 6, 'sasa', 401.00),
(7, '2023-11-28 00:12:59', 6, 'aaa', 290.00),
(8, '2023-11-28 00:17:28', 6, 'sasa', 4100.00),
(9, '2023-11-28 00:32:46', 6, 'kjk', 1200.00),
(10, '2023-11-28 00:35:39', 6, 'a', 102.00),
(11, '2023-11-28 00:37:54', 6, 'asdasasasasa', 1057.00),
(12, '2023-11-28 00:40:49', 4, 'asdsds', 2200.00),
(13, '2023-11-28 00:43:24', 4, 'sdsdsds', 9400.00),
(14, '2023-11-28 00:46:03', 6, 'ewwew', 945.00),
(15, '2023-11-28 00:46:54', 4, 'ere', 5109.00),
(16, '2023-11-28 00:53:45', 6, 'esessesesd', 4059.00),
(17, '2023-11-28 00:54:45', 4, 'dsds', 4100.00),
(18, '2023-11-28 00:55:24', 6, 'dsds', 900.00),
(19, '2023-11-28 23:15:29', 6, 'csxc', 100.00),
(20, '2023-11-28 23:16:19', 6, 'sd', 2600.00),
(21, '2023-11-28 23:16:59', 6, 'sdsds', 4666.00),
(22, '2023-11-28 23:19:04', 4, 'dfdfd', 2650.00),
(23, '2023-11-28 23:21:47', 6, 'dsd', 3200.00),
(24, '2023-11-28 23:23:40', 4, 'dds', 500.00),
(25, '2023-11-28 23:29:40', 6, 'sdsdssdsddf', 11400.00),
(26, '2023-11-28 23:30:30', 6, 'fdfdfdfdfdfd', 6600.00),
(27, '2023-11-28 23:31:33', 6, 'dfd', 400.00),
(28, '2023-11-28 23:33:36', 6, 'fdfd', 7200.00),
(29, '2023-11-28 23:36:19', 4, 'dsfdfd', 6500.00),
(30, '2023-11-28 23:37:47', 6, 'fdfdfd', 2724.00),
(31, '2023-11-28 23:38:55', 6, 'dsdss', 4200.00),
(32, '2023-11-28 23:39:53', 6, 'gfgfggfg', 700.00),
(33, '2023-11-28 23:42:43', 6, 'ghgh', 755.00),
(34, '2023-11-28 23:46:21', 6, 'ffdfdd', 12700.00),
(35, '2023-11-28 23:47:21', 6, 'dssds', 6500.00),
(36, '2023-11-28 23:50:10', 4, 'gfgfgf', 11577.00),
(37, '2023-11-28 23:51:48', 6, 'fgfgff', 4700.00),
(38, '2023-11-28 23:54:41', 11, 'fdfdfdfdf', 7398.00),
(39, '2023-11-28 23:57:31', 6, 'ffdfdfd', 5700.00),
(40, '2023-11-28 23:59:14', 6, 'dsfdf', 1975.00),
(41, '2023-11-29 00:00:00', 6, 'hhjhh', 5076.00),
(42, '2023-11-29 00:00:43', 6, 'dssds', 6745.00),
(43, '2023-11-29 00:02:22', 6, 'dfdd', 10953.00),
(44, '2023-11-30 10:40:28', 6, '', 250.00),
(45, '2023-11-30 12:24:42', 6, 'dhasdhu', 1750.00),
(46, '2023-11-30 16:36:08', 6, 'CLAREAMENTO', 2950.00),
(47, '2023-11-30 16:44:09', 11, 'Selecione o Procedimento', 10800.00),
(48, '2023-11-30 16:46:34', 6, 'ORTODONTIA', 6700.00),
(49, '2023-12-01 00:18:50', 11, 'Selecione o Procedimento', 650.00),
(50, '2023-12-01 00:19:16', 11, 'Selecione o Procedimento', 650.00),
(51, '2023-12-01 00:19:33', 11, 'IMPLANTE ODONTOLÓGICO', 14400.00),
(52, '2023-12-01 14:29:53', 6, 'Selecione o Procedimento', 400.00),
(53, '2023-12-01 14:30:37', 6, 'Selecione o Procedimento', 4500.00),
(54, '2023-12-01 14:31:13', 6, 'Selecione o Procedimento', 4300.00),
(55, '2023-12-01 14:34:58', 11, 'Selecione o Procedimento', 7000.00),
(56, '2023-12-01 14:35:29', 14, 'Selecione o Procedimento', 7800.00),
(57, '2023-12-01 14:36:12', 11, 'Selecione o Procedimento', 7650.00),
(58, '2023-12-01 14:37:06', 12, 'Selecione o Procedimento', 8300.00),
(59, '2023-12-01 14:39:48', 14, 'Selecione o Procedimento', 8300.00),
(60, '2023-12-01 14:40:17', 12, 'Selecione o Procedimento', 3400.00),
(61, '2023-12-01 14:42:30', 12, 'Selecione o Procedimento', 4800.00),
(62, '2023-12-01 14:43:12', 6, 'Selecione o Procedimento', 7000.00),
(63, '2023-12-01 14:43:28', 12, 'Selecione o Procedimento', 1900.00),
(64, '2023-12-01 14:46:32', 11, 'Selecione o Procedimento', 650.00),
(65, '2023-12-01 14:46:54', 12, 'Selecione o Procedimento', 700.00),
(66, '2023-12-01 14:47:05', 11, 'Selecione o Procedimento', 1950.00),
(67, '2023-12-01 14:49:59', 6, 'Selecione o Procedimento', 6000.00),
(68, '2023-12-01 14:50:19', 6, 'Selecione o Procedimento', 14000.00),
(69, '2023-12-01 14:52:34', 6, 'Selecione o Procedimento', 1500.00),
(70, '2023-12-01 14:53:58', 6, 'Selecione o Procedimento', 650.00),
(71, '2023-12-01 14:54:31', 6, 'Selecione o Procedimento', 3500.00),
(72, '2023-12-01 14:54:57', 11, 'Selecione o Procedimento', 1500.00),
(73, '2023-12-01 14:58:27', 6, 'Selecione o Procedimento', 650.00),
(74, '2023-12-01 15:12:29', 6, 'Selecione o Procedimento', 3500.00),
(75, '2023-12-01 15:12:54', 6, 'Selecione o Procedimento', 7650.00),
(76, '2023-12-01 15:13:16', 18, 'Selecione o Procedimento', 1920.00),
(77, '2023-12-01 15:14:21', 11, 'TRATAMENTO DE CANAL', 7950.00),
(78, '2023-12-01 15:19:51', 6, 'Selecione o Procedimento', 3500.00),
(79, '2023-12-01 15:40:25', 6, 'Selecione o Procedimento', 0.00),
(80, '2023-12-01 15:48:18', 14, 'Selecione o Procedimento', 1050.00),
(81, '2023-12-01 16:03:15', 18, 'Selecione o Procedimento', 4170.00),
(82, '2023-12-01 16:08:50', 11, '', 1300.00),
(83, '2023-12-01 16:12:03', 6, '', 3400.00),
(84, '2023-12-01 16:12:35', 6, '', 700.00),
(85, '2023-12-01 16:14:43', 11, '', 650.00),
(86, '2023-12-01 16:16:44', 12, '', 700.00),
(87, '2023-12-01 16:17:24', 11, 'Selecione o Procedimento', 2150.00),
(88, '2023-12-01 16:18:47', 6, 'Selecione o Procedimento', 1500.00),
(89, '2023-12-01 16:26:21', 6, '', 1500.00),
(90, '2023-12-01 16:47:26', 6, '', 1000.00),
(91, '2023-12-01 16:49:23', 6, '', 3900.00),
(92, '2023-12-01 16:51:15', 6, 'Selecione o Procedimento', 3900.00),
(93, '2023-12-01 16:57:01', 6, 'Selecione o Procedimento', 3650.00),
(94, '2023-12-01 16:58:59', 6, '', 4150.00),
(95, '2023-12-01 17:02:07', 6, '', 2150.00),
(96, '2023-12-01 17:03:23', 6, '', 1000.00),
(97, '2023-12-01 17:04:16', 15, 'PLANO', 1620.00),
(98, '2023-12-03 15:44:44', 18, 'Vários procedimentos.', 4470.00),
(99, '2023-12-06 00:53:26', 18, 'ORTODONTIA e TRATAMENTO DE CANAL e CLAREAMENTO', 2250.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pacientes`
--

CREATE TABLE `pacientes` (
  `idpaciente` int(11) NOT NULL,
  `nome_paciente` varchar(100) NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `data_nascimento` date NOT NULL,
  `cpf` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pacientes`
--

INSERT INTO `pacientes` (`idpaciente`, `nome_paciente`, `sexo`, `data_nascimento`, `cpf`, `email`, `telefone`) VALUES
(3, 'Dibu', 'Masculino', '1981-06-17', '208.958.756.94', 'daniel@gmail.com', '44-998786589'),
(4, 'caro martinez', 'Feminino', '1993-11-17', '145.789.654.32', 'caro@gmail.com', '44-999457632'),
(5, 'Carolina Perez', 'Feminino', '2004-09-14', '524.245.658.19', 'ca@gmail.com', '44-988521365'),
(6, 'Marcia Da Silva', 'Feminino', '2013-08-21', '102.452.789.02', 'si@gmail.com', '44-988578965'),
(8, 'Luisao Ochoa', 'masculino', '1994-06-16', '033.255.588.56', 'luisa@gmail.com', '44-988568923'),
(9, 'Gabriel Lopez', 'masculino', '1984-06-17', '022.455.488.88', 'ga@gmail.com', '45-789546298'),
(11, 'carlos marino', 'masculino', '2000-07-19', '021.452.458.698', 'carlosm@gmail.com', '44-988456325'),
(12, 'maria jose jimenez', 'Feminino', '1986-01-24', '032.457.458.87', 'mR@gmail.com', '+5544988455491'),
(14, 'Margaret Renato', 'Feminino', '1984-11-04', '011.452.874.11', 'margaret@gmail.com', '44-899758965'),
(15, 'Maria Aparecida DaSilva', 'Feminino', '1972-07-17', '088.788.987.15', 'mapa@gmail.com', '44-788457896'),
(18, 'Jonas', 'Masculino', '2004-02-01', '499.593.234-59', 'jonas01@gmail.com', '449884757211');

-- --------------------------------------------------------

--
-- Estrutura para tabela `perfil`
--

CREATE TABLE `perfil` (
  `id` int(11) NOT NULL,
  `nome_comercial` varchar(255) NOT NULL,
  `propietario` varchar(255) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `email` varchar(64) NOT NULL,
  `web` varchar(100) NOT NULL,
  `iva` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `perfil`
--

INSERT INTO `perfil` (`id`, `nome_comercial`, `propietario`, `telefone`, `endereco`, `email`, `web`, `iva`) VALUES
(1, 'Odonto System', 'Norbis,Gabriel,Favio', '+55 44988457812', 'Av São Domingos\r\n                    <br />\r\n                    Maringá-Pr/Brasil.<br />', 'odontosystem@gmail.com', 'www.odontosystem.com', 13);

-- --------------------------------------------------------

--
-- Estrutura para tabela `procedimento_clinico`
--

CREATE TABLE `procedimento_clinico` (
  `idprocedimento` int(11) NOT NULL,
  `nome_procedimento` varchar(100) NOT NULL,
  `preco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `procedimento_clinico`
--

INSERT INTO `procedimento_clinico` (`idprocedimento`, `nome_procedimento`, `preco`) VALUES
(2, 'CLAREAMENTO', 400),
(3, 'AVALIAÇÃO', 0),
(4, 'TRATAMENTO DE CANAL', 650),
(5, 'PRÓTESE DENTÁRIA REMOVÍVEL', 1500),
(6, 'IMPLANTE ODONTOLÓGICO', 3500),
(7, 'TRATAMENTO PERIODONTAL', 350),
(8, 'ORTODONTIA', 400),
(9, 'MANUTENÇÃO ORTODONTIA', 120);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nome_usuario` varchar(100) NOT NULL,
  `tipo_usuario` varchar(50) NOT NULL,
  `senha` varchar(200) DEFAULT NULL,
  `idodontologo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nome_usuario`, `tipo_usuario`, `senha`, `idodontologo`) VALUES
(1, 'admin', 'administrador', 'A665A45920422F9D417E4867EFDC4FB8A04A1F3FFF1FA07E998E86F7F7A27AE3', NULL),
(24, 'Cleber Ribeiro', 'odontologo', 'A665A45920422F9D417E4867EFDC4FB8A04A1F3FFF1FA07E998E86F7F7A27AE3', 23),
(25, 'Cleusa', 'secretaria', 'A665A45920422F9D417E4867EFDC4FB8A04A1F3FFF1FA07E998E86F7F7A27AE3', NULL),
(32, 'Pedro Cesar', 'odontologo', 'A665A45920422F9D417E4867EFDC4FB8A04A1F3FFF1FA07E998E86F7F7A27AE3', 29),
(33, 'Adriana Helson', 'odontologo', 'A665A45920422F9D417E4867EFDC4FB8A04A1F3FFF1FA07E998E86F7F7A27AE3', 30);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`idconsulta`),
  ADD KEY `fk_consultas_pacientes` (`idpaciente`),
  ADD KEY `fk_consultas_odontologos` (`idodontologo`),
  ADD KEY `fk_consultas_procedimento` (`idprocedimento`);

--
-- Índices de tabela `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `items_factura`
--
ALTER TABLE `items_factura`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `odontologos`
--
ALTER TABLE `odontologos`
  ADD PRIMARY KEY (`idodontologo`);

--
-- Índices de tabela `orcamentos`
--
ALTER TABLE `orcamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`idpaciente`);

--
-- Índices de tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `procedimento_clinico`
--
ALTER TABLE `procedimento_clinico`
  ADD PRIMARY KEY (`idprocedimento`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `fk_odontologo` (`idodontologo`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `consultas`
--
ALTER TABLE `consultas`
  MODIFY `idconsulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de tabela `detalle`
--
ALTER TABLE `detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT de tabela `detalle_factura`
--
ALTER TABLE `detalle_factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de tabela `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de tabela `items_factura`
--
ALTER TABLE `items_factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `odontologos`
--
ALTER TABLE `odontologos`
  MODIFY `idodontologo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `orcamentos`
--
ALTER TABLE `orcamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de tabela `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `idpaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `procedimento_clinico`
--
ALTER TABLE `procedimento_clinico`
  MODIFY `idprocedimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `fk_consultas_odontologos` FOREIGN KEY (`idodontologo`) REFERENCES `odontologos` (`idodontologo`),
  ADD CONSTRAINT `fk_consultas_pacientes` FOREIGN KEY (`idpaciente`) REFERENCES `pacientes` (`idpaciente`),
  ADD CONSTRAINT `fk_consultas_procedimento` FOREIGN KEY (`idprocedimento`) REFERENCES `procedimento_clinico` (`idprocedimento`);

--
-- Restrições para tabelas `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_odontologo` FOREIGN KEY (`idodontologo`) REFERENCES `odontologos` (`idodontologo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
