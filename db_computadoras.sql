-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2021 a las 19:31:06
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

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
(6, 'MAGMETA', 'Msi', 1),
(7, 'Luminus 110F', 'AZZA', 0),
(13, 'Bolt usb 3', 'AeroCool', 1),
(16, 'Carbide 100R', 'Corsair', 1),
(17, 'MasterBox', 'Cooler Master', 0),
(18, 'Crystal Series', 'Corsair', 0),
(19, 'HT700', 'Msi', 0),
(20, 'BakeOff 450', 'AZZA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kit`
--

CREATE TABLE `kit` (
  `id_kit` int(11) NOT NULL,
  `microprocesador` varchar(266) NOT NULL,
  `motherboard` varchar(266) NOT NULL,
  `ram` int(11) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `id_gabinete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `kit`
--

INSERT INTO `kit` (`id_kit`, `microprocesador`, `motherboard`, `ram`, `descripcion`, `id_gabinete`) VALUES
(9, 'Intel Core I7', 'AsRock', 64, 'Pc dedicada exclusivamente a el mundo gamer ', 6),
(10, 'Intel Core I5', 'ASUS', 8, 'Pc con microprocesador de ultima generación, perfecto para jugar juegos básicos y ofimática ', 7),
(11, 'Intel Core I3', 'Lenovo', 4, 'Pc exclusivamente para uso de ofimática ', 17),
(12, 'Ryzen 7 2700X', 'MSI', 16, 'Pc con microprocesador de ultima generación exclusivo para edición de video y fotos', 16),
(13, 'Ryzen 5 2600', 'AsRock', 8, 'Pc de alta eficacia para usar en oficinas', 20),
(14, 'Ryzen Threadripper', 'Asus', 64, '', 19),
(18, 'Intel Core I3', 'Lenovo', 16, '', 17);

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
  MODIFY `id_gabinete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `kit`
--
ALTER TABLE `kit`
  MODIFY `id_kit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
