-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2017 a las 19:08:59
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `enlistalo`
--
CREATE DATABASE IF NOT EXISTS `enlistalo` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `enlistalo`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

DROP TABLE IF EXISTS `articulo`;
CREATE TABLE IF NOT EXISTS `articulo` (
  `id_articulo` int(11) NOT NULL AUTO_INCREMENT,
  `nom_articulo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `desc_articulo` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cant_articulo` int(11) NOT NULL,
  `urlejemplo_articulo` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_articulo`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id_articulo`, `nom_articulo`, `desc_articulo`, `cant_articulo`, `urlejemplo_articulo`) VALUES
(60, 'asdasd', 'assd', 0, 'assd'),
(61, 'asd', 'asd', 0, 'asd'),
(64, 'asd', 'asd', 0, 'asd'),
(65, 'asa', 'asas', 0, 'asa'),
(66, 'asdasd', 'asdasdasd', 0, 'asdasd'),
(67, 'asd', 'asd', 0, 'asd'),
(68, 'asd', 'assd', 0, 'asd'),
(72, 'qwe', 'asd', 0, 'asdasd'),
(73, 'aa', 'aa', 12, 'aasasa'),
(74, 'qweºqeº', 'asdº', 0, 'asd'),
(76, 'adfh', 'qweºº', 0, 'asdassd'),
(77, 'asdasdasd', 'asdassdasd', 13, 'asdasdassdassd'),
(79, 'asa', 'asa', 12, 'asasa'),
(81, 'asd', 'asd', 0, 'asd'),
(82, 'asasa', 'asasa', 132, 'asasa'),
(83, 'a', 'aa', 12, 'asasas'),
(84, 'asas', 'asas', 0, 'sasasa'),
(85, 'asa', 'asa', 0, 'sasas'),
(86, 'asa', 'asa', 0, 'sasas'),
(87, 'asd', 'asd', 0, 'asd'),
(88, 'asa', 'sasa', 0, 'asasa'),
(89, 'asa', 'asa', 0, 'asas'),
(90, 'asdasd', 'asdasd', 0, 'asdads'),
(91, 'asa', 'sas', 0, 'asasa'),
(92, ' Prueba', 'Descripcion', 0, 'asasasasasa'),
(93, 'asd', 'asd', 0, 'asd'),
(94, 'asd', 'asd', 0, 'asd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listas`
--

DROP TABLE IF EXISTS `listas`;
CREATE TABLE IF NOT EXISTS `listas` (
  `id_lista` int(11) NOT NULL AUTO_INCREMENT,
  `nom_lista` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `desc_lista` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_lista` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `creador_lista` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_lista`),
  KEY `tipo_lista` (`tipo_lista`),
  KEY `creador_lista` (`creador_lista`),
  KEY `creador_lista_2` (`creador_lista`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `listas`
--

INSERT INTO `listas` (`id_lista`, `nom_lista`, `desc_lista`, `tipo_lista`, `creador_lista`) VALUES
(45, 'puto enrique tio ', 'tu antes molabas', 'articulos', 'asd'),
(48, 'a', 'a', 'articulos', 'Prueba'),
(49, 'as', 'asas', 'articulos', 'Prueba'),
(50, 'asd', 'asd', 'articulos', 'alberto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_articulo`
--

DROP TABLE IF EXISTS `lista_articulo`;
CREATE TABLE IF NOT EXISTS `lista_articulo` (
  `id_lista` int(11) NOT NULL,
  `nom_user_comprador` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_articulo` int(11) NOT NULL,
  PRIMARY KEY (`id_lista`,`id_articulo`),
  KEY `id_articulo` (`id_articulo`),
  KEY `id_user` (`nom_user_comprador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `lista_articulo`
--

INSERT INTO `lista_articulo` (`id_lista`, `nom_user_comprador`, `id_articulo`) VALUES
(45, NULL, 81),
(45, NULL, 87),
(45, NULL, 90),
(45, NULL, 93),
(48, NULL, 92),
(50, NULL, 94);

--
-- Disparadores `lista_articulo`
--
DROP TRIGGER IF EXISTS `BD_lista_articulo`;
DELIMITER $$
CREATE TRIGGER `BD_lista_articulo` BEFORE DELETE ON `lista_articulo` FOR EACH ROW BEGIN
	DELETE FROM articulo WHERE id_articulo = OLD.id_articulo;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_invitado`
--

DROP TABLE IF EXISTS `lista_invitado`;
CREATE TABLE IF NOT EXISTS `lista_invitado` (
  `id_lista` int(11) NOT NULL,
  `id_invitado` int(11) NOT NULL,
  PRIMARY KEY (`id_invitado`,`id_lista`),
  KEY `lista_invitado_ibfk_1` (`id_lista`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_procontra`
--

DROP TABLE IF EXISTS `lista_procontra`;
CREATE TABLE IF NOT EXISTS `lista_procontra` (
  `id_lista` int(11) NOT NULL,
  `pro` text COLLATE utf8_spanish_ci NOT NULL,
  `contra` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_lista`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_lista`
--

DROP TABLE IF EXISTS `tipo_lista`;
CREATE TABLE IF NOT EXISTS `tipo_lista` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tipo`),
  KEY `nombre_tipo` (`nombre_tipo`),
  KEY `nombre_tipo_2` (`nombre_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_lista`
--

INSERT INTO `tipo_lista` (`id_tipo`, `nombre_tipo`) VALUES
(2, 'articulos'),
(1, 'pro_contra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `username_user` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email_user` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `contr_user` varchar(135) COLLATE utf8_spanish_ci NOT NULL,
  `user_activo` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_user`),
  KEY `username_user` (`username_user`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `username_user`, `email_user`, `contr_user`, `user_activo`) VALUES
(54, 'enriquer', 'enriquen7@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(71, 'Prueba', 'eebonillar@gmail.com', '3cf3d96ef23780663565536bc3c187b0', 0),
(72, '12345678', 'sasasasa', 'e10adc3949ba59abbe56e057f20f883e', 0),
(74, 'asd', 'asd', '7815696ecbf1c96e6894b779456d330e', 0),
(75, 'alberto', 'alberto@alberto.com', '177dacb14b34103960ec27ba29bd686b', 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `listas`
--
ALTER TABLE `listas`
  ADD CONSTRAINT `listas_ibfk_1` FOREIGN KEY (`creador_lista`) REFERENCES `usuarios` (`username_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `lista_articulo`
--
ALTER TABLE `lista_articulo`
  ADD CONSTRAINT `lista_articulo_ibfk_1` FOREIGN KEY (`id_lista`) REFERENCES `listas` (`id_lista`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lista_articulo_ibfk_2` FOREIGN KEY (`id_articulo`) REFERENCES `articulo` (`id_articulo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lista_articulo_ibfk_3` FOREIGN KEY (`nom_user_comprador`) REFERENCES `usuarios` (`username_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `lista_invitado`
--
ALTER TABLE `lista_invitado`
  ADD CONSTRAINT `lista_invitado_ibfk_1` FOREIGN KEY (`id_lista`) REFERENCES `listas` (`id_lista`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lista_invitado_ibfk_2` FOREIGN KEY (`id_invitado`) REFERENCES `usuarios` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `lista_procontra`
--
ALTER TABLE `lista_procontra`
  ADD CONSTRAINT `lista_procontra_ibfk_1` FOREIGN KEY (`id_lista`) REFERENCES `listas` (`id_lista`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
