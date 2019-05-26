-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2019 a las 03:09:01
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `controlest`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_admin`
--

CREATE TABLE `rol_admin` (
  `id` int(3) NOT NULL,
  `rol_name` varchar(266) NOT NULL,
  `validacion` int(1) NOT NULL DEFAULT '0',
  `ver_perfil_alumno` int(1) NOT NULL DEFAULT '0',
  `crea_editar_alumno` int(1) NOT NULL DEFAULT '0',
  `subir_edicion_documentos` int(1) NOT NULL DEFAULT '0',
  `crear_editar_solicitudes` int(1) NOT NULL DEFAULT '0',
  `edicion_creacion_admin` int(1) NOT NULL DEFAULT '0',
  `metodos_ingreso` int(1) NOT NULL DEFAULT '0',
  `edicion_carreras` int(1) NOT NULL DEFAULT '0',
  `rolActivo` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol_admin`
--

INSERT INTO `rol_admin` (`id`, `rol_name`, `validacion`, `ver_perfil_alumno`, `crea_editar_alumno`, `subir_edicion_documentos`, `crear_editar_solicitudes`, `edicion_creacion_admin`, `metodos_ingreso`, `edicion_carreras`, `rolActivo`) VALUES
(1, 'Super Usuario', 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 'Asistente', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(3, 'Operador', 0, 0, 0, 0, 0, 0, 0, 0, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `rol_admin`
--
ALTER TABLE `rol_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `rol_admin`
--
ALTER TABLE `rol_admin`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
