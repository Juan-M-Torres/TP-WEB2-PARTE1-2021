-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-09-2021 a las 16:47:14
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_computadoras`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componentes`
--

CREATE TABLE `componentes` (
  `id_componentes` int(11) NOT NULL,
  `marca` varchar(60) NOT NULL,
  `descripcion` varchar(266) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gabinetes`
--

CREATE TABLE `gabinetes` (
  `id_gabinetes` int(11) NOT NULL,
  `nombre` varchar(65) NOT NULL,
  `color` varchar(65) NOT NULL,
  `descripcion` varchar(65) NOT NULL,
  `imagen` varchar(65) DEFAULT NULL,
  `id_componentes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `componentes`
--
ALTER TABLE `componentes`
  ADD PRIMARY KEY (`id_componentes`);

--
-- Indices de la tabla `gabinetes`
--
ALTER TABLE `gabinetes`
  ADD PRIMARY KEY (`id_gabinetes`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `componentes`
--
ALTER TABLE `componentes`
  MODIFY `id_componentes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gabinetes`
--
ALTER TABLE `gabinetes`
  MODIFY `id_gabinetes` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
