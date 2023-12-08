-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2023 a las 01:34:28
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tcc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
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
-- Volcado de datos para la tabla `consultas`
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
(95, 14, 9, 30, '2023-12-10', '10:30:00', 'MANUTENÇÃO', ' pendiente', 'MANUTENÇÃO', '#396179'),
(96, 14, 2, 30, '2023-12-30', '07:30:00', 'CLAREAR O DENTE', ' pendiente', 'CLAREAR O DENTE', '#396179'),
(97, 14, 2, 30, '2023-11-03', '08:30:00', 'CLAREAR', ' pendiente', 'CLAREAR', '#396179'),
(99, 14, 9, 30, '2023-12-02', '08:30:00', 'MANUTENÇÃO', ' pendiente', 'MANUTENÇÃO', '#396179');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `id` int(11) NOT NULL,
  `descripcao_proc` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `id_orcamento` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`id`, `descripcao_proc`, `quantidade`, `preco`, `id_orcamento`) VALUES
(1, 'ortodoncia', 1, 480.00, 1),
(2, 'manutencao ortodoncia', 24, 120.00, 1),
(3, 'clareamento', 3, 200.00, 2),
(4, 'TRATAMENTO DE CANAL', 2, 400.00, 3),
(5, 'ORTODONTIA', 1, 350.00, 4),
(6, 'MANUTENÇÃO ORTODONTIA', 12, 120.00, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `id` int(11) NOT NULL,
  `descripcao` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `id_factura` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `detalle_factura`
--

INSERT INTO `detalle_factura` (`id`, `descripcao`, `quantidade`, `preco`, `id_factura`) VALUES
(1, 'IMPLANTE ODONTOLÓGICO', 1, 3500.00, 1),
(2, 'MANUTENÇÃO ORTODONTIA', 1, 120.00, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
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
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id`, `data`, `idpaciente`, `descripcao`, `monto`, `total_neto`, `total_iva`) VALUES
(1, '2023-11-15 21:24:44', 14, '', 3500.00, 3500, 455),
(2, '2023-11-15 21:30:38', 14, '', 120.00, 120, 15.6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `descripcao_proc` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items_factura`
--

CREATE TABLE `items_factura` (
  `id` int(11) NOT NULL,
  `descripcao` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `odontologos`
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
-- Volcado de datos para la tabla `odontologos`
--

INSERT INTO `odontologos` (`idodontologo`, `nome_odontologo`, `cpf`, `email`, `telefone`, `horario_entrada`, `horario_saida`, `color`) VALUES
(23, 'Cleber Ribeiro', '194.695.697-59', 'cleberribas@gmail.com', '4498485884610', '07:30:00', '13:30:00', '#66ffa1'),
(29, 'Pedro Cesar', '596.694.693-50', 'pedrocesar@gmail.com', '449884883085', '14:00:00', '18:00:00', '#472b54'),
(30, 'Adriana Helson', '456.678.585-67', 'adrianahelson@gmail.com', '449885238108', '07:00:00', '12:00:00', '#396179');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orcamentos`
--

CREATE TABLE `orcamentos` (
  `id` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `idpaciente` int(11) NOT NULL,
  `descripcao_orc` varchar(255) NOT NULL,
  `monto` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `orcamentos`
--

INSERT INTO `orcamentos` (`id`, `data`, `idpaciente`, `descripcao_orc`, `monto`) VALUES
(1, '2023-11-14 20:17:39', 3, 'ORTODONCIA COMPLETA', 3360.00),
(2, '2023-11-14 21:05:47', 6, 'CLAREAMENTO DENTAL', 600.00),
(3, '2023-11-15 19:37:53', 6, 'TRATAMENTO DE CANAL', 800.00),
(4, '2023-11-15 21:17:09', 12, 'ORTODONTIA COMPLETA', 1790.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
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
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`idpaciente`, `nome_paciente`, `sexo`, `data_nascimento`, `cpf`, `email`, `telefone`) VALUES
(3, 'Daniel perez', 'Masculino', '1981-06-17', '208.958.756.94', 'daniel@gmail.com', '44-998786589'),
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
-- Estructura de tabla para la tabla `perfil`
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
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `nome_comercial`, `propietario`, `telefone`, `endereco`, `email`, `web`, `iva`) VALUES
(1, 'Odonto System', 'Norbis,Gabriel,Favio', '+55 44988457812', 'Av São Domingos\r\n                    <br />\r\n                    Maringá-Pr/Brasil.<br />', 'odontosystem@gmail.com', 'www.odontosystem.com', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedimento_clinico`
--

CREATE TABLE `procedimento_clinico` (
  `idprocedimento` int(11) NOT NULL,
  `nome_procedimento` varchar(100) NOT NULL,
  `preco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `procedimento_clinico`
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
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nome_usuario` varchar(100) NOT NULL,
  `tipo_usuario` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `idodontologo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nome_usuario`, `tipo_usuario`, `senha`, `idodontologo`) VALUES
(1, 'admin', 'administrador', '123', NULL),
(24, 'Cleber Ribeiro', 'odontologo', '123 ', 23),
(25, 'Cleusa', 'secretaria', '123', NULL),
(32, 'Pedro Cesar', 'odontologo', '123', 29),
(33, 'Adriana Helson', 'odontologo', '123', 30);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`idconsulta`),
  ADD KEY `fk_consultas_pacientes` (`idpaciente`),
  ADD KEY `fk_consultas_odontologos` (`idodontologo`),
  ADD KEY `fk_consultas_procedimento` (`idprocedimento`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `items_factura`
--
ALTER TABLE `items_factura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `odontologos`
--
ALTER TABLE `odontologos`
  ADD PRIMARY KEY (`idodontologo`);

--
-- Indices de la tabla `orcamentos`
--
ALTER TABLE `orcamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`idpaciente`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `procedimento_clinico`
--
ALTER TABLE `procedimento_clinico`
  ADD PRIMARY KEY (`idprocedimento`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `fk_odontologo` (`idodontologo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `idconsulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `items_factura`
--
ALTER TABLE `items_factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `odontologos`
--
ALTER TABLE `odontologos`
  MODIFY `idodontologo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `orcamentos`
--
ALTER TABLE `orcamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `idpaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `procedimento_clinico`
--
ALTER TABLE `procedimento_clinico`
  MODIFY `idprocedimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `fk_consultas_odontologos` FOREIGN KEY (`idodontologo`) REFERENCES `odontologos` (`idodontologo`),
  ADD CONSTRAINT `fk_consultas_pacientes` FOREIGN KEY (`idpaciente`) REFERENCES `pacientes` (`idpaciente`),
  ADD CONSTRAINT `fk_consultas_procedimento` FOREIGN KEY (`idprocedimento`) REFERENCES `procedimento_clinico` (`idprocedimento`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_odontologo` FOREIGN KEY (`idodontologo`) REFERENCES `odontologos` (`idodontologo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
