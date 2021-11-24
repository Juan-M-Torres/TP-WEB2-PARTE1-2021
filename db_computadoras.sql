-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2021 a las 22:42:24
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

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
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `puntaje` int(11) NOT NULL,
  `id_comentario_gabinete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `comentario`, `puntaje`, `id_comentario_gabinete`) VALUES
(44, 'probando', 1, 63),
(45, 'holaaaaaaaaa', 1, 62),
(46, 'Muy buena pc ', 4, 68),
(47, 'Muy buena refrigeración', 5, 68),
(48, 'Gabinete no muy grande para las nuevas tarjetas gráficas', 2, 68),
(49, 'Perfecto gabinete para uso de ofimática', 5, 69),
(50, 'Perfecto gabinete para uso hogareño', 5, 69),
(51, 'Muy cara para sus prestaciones ', 1, 70),
(52, 'Calienta demasiado el procesador ', 2, 70);

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
(68, 'LUMINOUS', 'AZZA', 1),
(69, 'MAGNUM', 'TECH', 0),
(70, 'MASTERBOX', 'COOLER MASTER', 1),
(71, 'GALAXY', 'RAIDMAX', 0),
(81, 'prueba', 'gabiente ', 0);

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
(29, 'INTEL I7', 'ASROCK', 12, 'Buen pc para ofimática', 69),
(30, 'INTEL I5', 'ASUS', 64, 'Pc dedicada a juegos ya stream', 68),
(31, 'INTEL I9', 'MSI', 64, 'Pc para juegos de ultima generacion y buena refrigeracion ', 68),
(32, 'INTEL I3', 'ASUS', 16, 'Pc de oficina', 69),
(33, 'AMD A5', 'MSI', 8, 'Pc de ofimatica', 70),
(34, 'AMD A7', 'ASROCK', 64, '', 70);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(266) NOT NULL,
  `password` varchar(266) NOT NULL,
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_usuario`, `email`, `password`, `admin`) VALUES
(12, 'juancarlos@hotmail.com', '$2y$10$1lzfiM3cG7ad.rIBfvA0aO0iJUxhdywwpVp1Xy2vptQ7rDNcv/a2K', 1),
(15, 'candelacapdepont@hotmail.com', '$2y$10$CWEnl93ZPs2PkZq/bzRJdugIdG8j98RX1e5ym6Rs1v5W3t.WaWc2e', 0),
(21, 'juanmatorres2@yahoo.com', '$2y$10$CmpSCdW67lWWPj/z8Kodge/9d.ad1Xs3BCEVQEy18ELoZsN7B3vbO', 1),
(22, 'notengoregistro@yahoo.com', '$2y$10$UNaL5GfnARVkaYJmD664y.q6Hmh8HZQW4fz/4fsPl7mubTWLh8EXC', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `gabinete`
--
ALTER TABLE `gabinete`
  MODIFY `id_gabinete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `kit`
--
ALTER TABLE `kit`
  MODIFY `id_kit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
