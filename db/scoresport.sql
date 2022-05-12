-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-02-2022 a las 17:00:35
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `scoresport`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bateo`
--

CREATE TABLE `bateo` (
  `idbateo` int(11) NOT NULL,
  `nrobateo` varchar(150) NOT NULL,
  `cod` varchar(150) NOT NULL,
  `realizadopor` varchar(150) NOT NULL,
  `fecha` varchar(150) NOT NULL,
  `promedio` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bateo`
--

INSERT INTO `bateo` (`idbateo`, `nrobateo`, `cod`, `realizadopor`, `fecha`, `promedio`) VALUES
(14, '2', '1234354353', '26115037', '07-02-2022', 'Hit|Out'),
(15, '2', '1234567', '26115037', '07-02-2022', '1|0'),
(16, '10', '27654892', '26115037', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicion`
--

CREATE TABLE `condicion` (
  `idcondi` int(11) NOT NULL,
  `velocidad` int(11) NOT NULL,
  `peso` varchar(150) NOT NULL,
  `estatura` varchar(150) NOT NULL,
  `cod` varchar(150) NOT NULL,
  `realizadopor` varchar(150) NOT NULL,
  `fecha` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `condicion`
--

INSERT INTO `condicion` (`idcondi`, `velocidad`, `peso`, `estatura`, `cod`, `realizadopor`, `fecha`) VALUES
(8, 7, '22', '1.5', '27654892', '26115037', '07-02-2022'),
(9, 20, '20', '1.2', '27654892', '26115037', '07-02-2022'),
(10, 9, '20', '15', '26115037', '26115037', '07-02-2022'),
(11, 25, '18', '1.5', '27654892', '26115037', '16-02-2022');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dataprimaryathletes`
--

CREATE TABLE `dataprimaryathletes` (
  `idatletas` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `age` varchar(150) NOT NULL,
  `dateofbirth` varchar(150) NOT NULL,
  `code` varchar(150) NOT NULL,
  `ci` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dataprimaryathletes`
--

INSERT INTO `dataprimaryathletes` (`idatletas`, `name`, `lastname`, `age`, `dateofbirth`, `code`, `ci`) VALUES
(1, 'luis', 'navas', '25', '1996-11-25', '26115037', '26115037'),
(2, 'Hodward', 'Yepez', '24', '1997-03-05', '27654892', '27654892'),
(3, 'david', 'quitero', '15', '1995-11-25', '1234567', '1234567'),
(4, 'luciano', 'navas', '25', '2022-02-21', '1234354353', '1234354353');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pitcheo`
--

CREATE TABLE `pitcheo` (
  `idpitcheo` int(11) NOT NULL,
  `tipolanza` varchar(150) NOT NULL,
  `nrolanza` varchar(150) NOT NULL,
  `cod` varchar(150) NOT NULL,
  `velocidad` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL,
  `realizadopor` varchar(150) NOT NULL,
  `fecha` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pitcheo`
--

INSERT INTO `pitcheo` (`idpitcheo`, `tipolanza`, `nrolanza`, `cod`, `velocidad`, `status`, `realizadopor`, `fecha`) VALUES
(54, 'Recta', '2', '26115037', '', '', '26115037', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `cargo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `clave`, `cargo`) VALUES
(1, 'Eduardo Montiel', 'dezain', '202cb962ac59075b964b07152d234b70', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bateo`
--
ALTER TABLE `bateo`
  ADD PRIMARY KEY (`idbateo`);

--
-- Indices de la tabla `condicion`
--
ALTER TABLE `condicion`
  ADD PRIMARY KEY (`idcondi`);

--
-- Indices de la tabla `dataprimaryathletes`
--
ALTER TABLE `dataprimaryathletes`
  ADD PRIMARY KEY (`idatletas`);

--
-- Indices de la tabla `pitcheo`
--
ALTER TABLE `pitcheo`
  ADD PRIMARY KEY (`idpitcheo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bateo`
--
ALTER TABLE `bateo`
  MODIFY `idbateo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `condicion`
--
ALTER TABLE `condicion`
  MODIFY `idcondi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `dataprimaryathletes`
--
ALTER TABLE `dataprimaryathletes`
  MODIFY `idatletas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pitcheo`
--
ALTER TABLE `pitcheo`
  MODIFY `idpitcheo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
