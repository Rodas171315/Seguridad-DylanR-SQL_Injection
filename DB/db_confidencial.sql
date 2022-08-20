-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-08-2022 a las 01:11:40
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_confidencial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_usuarios`
--

CREATE TABLE `datos_usuarios` (
  `nickname` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `apellido` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `datos_usuarios`
--

INSERT INTO `datos_usuarios` (`nickname`, `nombre`, `apellido`, `tel`, `email`) VALUES
('anakinskywalker', 'Anakin', 'Skywalker', '12366', 'ani@sith.com'),
('doomslayer', 'Doom', 'Guy', '654321', 'doom@mars.com'),
('dukenukem', 'Duke', 'Nukem', '789654', 'duke@boom.com'),
('kratos', 'Don', 'Kratos', '654123', 'kratos@olimpo.com'),
('marcusfenix', 'Marcus', 'Fenix', '321456', 'marcus@cgo.com'),
('masterchief', 'John', 'Sierra', '123117', 'john@halo.com'),
('seriousSam', 'Sam', NULL, '321654', 'sam@croteam.com'),
('turok', 'Turok', NULL, '789456', 'turok@dino.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id_perfil` int(11) NOT NULL,
  `perfil` varchar(20) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfil`, `perfil`) VALUES
(1, 'Cliente'),
(2, 'Colaborador'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nickname` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `contra` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `id_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nickname`, `contra`, `id_perfil`) VALUES
('doomslayer', 'abc123abc', 3),
('marcusfenix', '123abc', 2),
('turok', 'abc123', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos_usuarios`
--
ALTER TABLE `datos_usuarios`
  ADD PRIMARY KEY (`nickname`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD UNIQUE KEY `nickname` (`nickname`),
  ADD KEY `id_perfil` (`id_perfil`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`nickname`) REFERENCES `datos_usuarios` (`nickname`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_perfil`) REFERENCES `perfiles` (`id_perfil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
