-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-09-2021 a las 20:35:47
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
  `microprocesador` varchar(266) NOT NULL,
  `motherboard` varchar(266) NOT NULL,
  `ram` int(11) NOT NULL,
  `fk_gabinetes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gabinetes`
--

CREATE TABLE `gabinetes` (
  `id_gabinetes` int(11) NOT NULL,
  `nombre` varchar(266) NOT NULL,
  `marca` varchar(266) NOT NULL,
  `gamer` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gabinetes`
--

INSERT INTO `gabinetes` (`id_gabinetes`, `nombre`, `marca`, `gamer`) VALUES
(1, 'ProArt Station', 'Asus', 0),
(2, 'ProArt Station', 'Asus', 1),
(3, 'One a145s', 'Corsair', 1),
(4, 'F1040ns', 'Hp', 0),
(5, 'MEG Aegis', 'Msi', 0),
(6, 'MAGMETA', 'Msi', 1),
(7, 'Legion', 'Lenovo', 0),
(8, 'Crystal Series 570X', 'Corsair', 1),
(9, 'Carbide Series', 'Corsair', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(266) NOT NULL,
  `password` varchar(266) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `componentes`
--
ALTER TABLE `componentes`
  ADD PRIMARY KEY (`id_componentes`),
  ADD KEY `fk_gabinetes` (`fk_gabinetes`);

--
-- Indices de la tabla `gabinetes`
--
ALTER TABLE `gabinetes`
  ADD PRIMARY KEY (`id_gabinetes`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `componentes`
--
ALTER TABLE `componentes`
  MODIFY `id_componentes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `gabinetes`
--
ALTER TABLE `gabinetes`
  MODIFY `id_gabinetes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `componentes`
--
ALTER TABLE `componentes`
  ADD CONSTRAINT `componentes_ibfk_1` FOREIGN KEY (`fk_gabinetes`) REFERENCES `gabinetes` (`id_gabinetes`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
