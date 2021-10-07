-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-10-2021 a las 23:21:13
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
-- Estructura de tabla para la tabla `gabinete`
--

CREATE TABLE `gabinete` (
  `id_gabinete` int(11) NOT NULL,
  `nombre` varchar(266) NOT NULL,
  `marca` varchar(266) NOT NULL,
  `gamer` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gabinete`
--

INSERT INTO `gabinete` (`id_gabinete`, `nombre`, `marca`, `gamer`) VALUES
(5, 'MEG Aegis', 'Msi', 0),
(6, 'MAGMETA', 'Msi', 1),
(7, 'Legion', 'Lenovo', 0),
(8, 'Crystal Series 570X', 'Corsair', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kit`
--

CREATE TABLE `kit` (
  `id_kit` int(11) NOT NULL,
  `microprocesador` varchar(266) NOT NULL,
  `motherboard` varchar(266) NOT NULL,
  `ram` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `id_gabinete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(266) NOT NULL,
  `password` varchar(266) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_usuario`, `email`, `password`) VALUES
(1, 'do@gmail.com', '$2y$10$IS6hI4MCWjg5OSaYDEwSBuB3Sjjbe8TVXwUxNw6POYwh5iF8JYT/S'),
(2, 'pepe@gmail.com', '$2y$10$n4P5gqzdsUonJWEdGX1SqOkuj0xzrvYDdeAc9G0YcFo93A0pAMoDa'),
(3, 'juancarlos@hotmail.com', '$2y$10$lYJBh/pMSqxwgOycJ.vh2OIINO6GpnS.gXH2ymFDGvctyPuDdAlfK');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `gabinete`
--
ALTER TABLE `gabinete`
  ADD PRIMARY KEY (`id_gabinete`);

--
-- Indices de la tabla `kit`
--
ALTER TABLE `kit`
  ADD PRIMARY KEY (`id_kit`),
  ADD KEY `fk_gabinetes` (`id_gabinete`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `gabinete`
--
ALTER TABLE `gabinete`
  MODIFY `id_gabinete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `kit`
--
ALTER TABLE `kit`
  MODIFY `id_kit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `kit`
--
ALTER TABLE `kit`
  ADD CONSTRAINT `kit_ibfk_1` FOREIGN KEY (`id_gabinete`) REFERENCES `gabinete` (`id_gabinete`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
