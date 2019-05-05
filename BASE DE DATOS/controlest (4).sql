-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-05-2019 a las 00:13:00
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
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id_admin` int(11) NOT NULL,
  `estatus` int(11) NOT NULL,
  `usuario` text NOT NULL,
  `contrasena` text NOT NULL,
  `nombre` text NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id_alumno` int(11) NOT NULL,
  `cedula` int(11) NOT NULL,
  `p_nombre` tinytext NOT NULL,
  `s_nombre` tinytext NOT NULL,
  `p_apellido` text NOT NULL,
  `s_apellido` text NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `estado_civil` text NOT NULL,
  `metodo_ingreso` int(11) NOT NULL,
  `carrera` text NOT NULL,
  `turno` int(11) NOT NULL,
  `pais_nac` varchar(10) NOT NULL,
  `estado_nac` varchar(10) NOT NULL,
  `ciudad_nac` varchar(11) NOT NULL,
  `municipio_nac` varchar(11) NOT NULL,
  `username` text NOT NULL,
  `contrasena` text NOT NULL,
  `correo` text NOT NULL,
  `documento` int(11) NOT NULL,
  `parientename` varchar(10) NOT NULL,
  `parentesco` varchar(10) NOT NULL,
  `discapacidad` varchar(10) NOT NULL,
  `nombreInst` varchar(20) NOT NULL,
  `anoEgreso` int(10) NOT NULL,
  `codigoInst` varchar(10) NOT NULL,
  `estadoInst` varchar(10) NOT NULL,
  `tipoInst` int(1) NOT NULL,
  `ultActualizacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alumno`, `cedula`, `p_nombre`, `s_nombre`, `p_apellido`, `s_apellido`, `fecha_nacimiento`, `estado_civil`, `metodo_ingreso`, `carrera`, `turno`, `pais_nac`, `estado_nac`, `ciudad_nac`, `municipio_nac`, `username`, `contrasena`, `correo`, `documento`, `parientename`, `parentesco`, `discapacidad`, `nombreInst`, `anoEgreso`, `codigoInst`, `estadoInst`, `tipoInst`, `ultActualizacion`) VALUES
(1, 0, '', '', '', '', '0000-00-00', '', 0, '', 0, '', '', '0', '0', 'asdasdas@hotmail.com', 'asdasdas@hotmail.com', '', 0, '', '', '', '', 0, '', '', 0, '0000-00-00'),
(2, 12345, 'Andres', 'Alejandro', 'Pinto', 'Santiso', '0000-00-00', '', 0, '', 0, '', '', '0', '0', 'apinto15@hotmail.com', '1234567332', 'andres.pintosantiso@gmail.com', 0, '', '', '', '', 0, '', '', 0, '0000-00-00'),
(3, 123456, 'hola', 'prueba', 'prueba1', 'prueba123123', '0000-00-00', '', 0, '', 0, '', '', '0', '0', 'prueba', '$2y$10$rzXG9S26LdESGuEQLClEVuNNoJclEM.JR4qIW9zWSATJrkieywuIy', 'prueba@hotmail.com', 0, '', '', '', '', 0, '', '', 0, '0000-00-00'),
(4, 125678, 'dasdsa', 'adasd', 'asdasd', 'dasd', '0000-00-00', '', 0, '', 0, '', '', '0', '0', 'dasdsad', '$2y$10$Qkz2cDin1KaJSH/57NBqHuaa.WkJD1EWJhVtFpSxuxA5wM8k6hYGe', 'dasd@hotmail.com', 0, '', '', '', '', 0, '', '', 0, '0000-00-00'),
(5, 12321321, 'dasdsa', 'dasdsada', 'ddasdsa', 'sadsadsa', '0000-00-00', '', 0, '', 0, '', '', '0', '0', 'dasdasd', '$2y$10$ASpmxQVV6UxBz58SLNG.F.ur8OHOLOKPFMei0KWApSSm.KatEdM0C', 'dsadsadad@hotmail.com', 0, '', '', '', '', 0, '', '', 0, '0000-00-00'),
(6, 12312321, 'dasdsa', 'dasdasd', 'adasdasd', 'sadsadasd', '0000-00-00', '', 0, '', 0, '', '', '0', '0', 'dasdsad', '$2y$10$775imaUCvkHK0fmlDqeD6ugmBuI6ryUBpW4XNf5XXZ3xvlsycBG0a', 'dasdasdasd', 0, '', '', '', '', 0, '', '', 0, '0000-00-00'),
(7, 123213, 'asdsad', 'dasdas', 'dsadas', 'dsadasd', '0000-00-00', '', 0, '', 0, '', '', '0', '0', 'dasdsa', '$2y$10$mmALqBFsiTBiNlFzOPasqOS1dH9Nc///frABQQgvErs7wfq.Zpoku', 'sadasddasdas', 0, '', '', '', '', 0, '', '', 0, '2019-04-14'),
(8, 123, 'Andres', 'Alejandro', 'Pinto', 'Santiso', '0000-00-00', '', 0, '', 0, '', '', '', '', 'pruebauser', '$2y$10$F7vTML6U45FbbjsEv2d5AOCRNFqnD5MgKyzYO2t5SDPMFyw8WpD8m', 'correoprueba@hotmail.com', 0, '', '', '', '', 0, '', '', 0, '2019-04-16'),
(9, 1234567, 'Hola', '123', '12312', '12312', '2019-05-09', '', 0, '', 0, '', '', '', '', 'prueba', '$2y$10$jx3027snfx37xFLBypOvp./G/TS0TeKO6/UCgKY27E5iRC9rKhKCy', 'dadas@hotmail.com', 0, '', '', '', '', 0, '', '', 0, '2019-04-23'),
(10, 12369778, 'dasa', 'asdasd', 'dadsa', 'dasd', '2019-05-01', '1', 0, '1', 0, '312dasdasd', 'sadasdas', 'sadasd', 'asdsadsa', 'hola', '$2y$10$FlLsgqKWgg9.0I5OuzeO6O46yc08/0ZWOUJx26Qh3Fa7wWjflCvxK', 'asasdas@hotmail.com', 29, 'asdasdsada', 'sdadasdasd', '', '4adasdsadadadaad', 2001, 'dasdasdsad', 'dasdadsads', 1, '2019-05-02'),
(11, 67887766, 'aaaa', 'aaa', 'ccc', 'ccc', '0000-00-00', '', 0, '', 0, '', '', '', '', '3414', '$2y$10$gxjfl8vNSvrum3oZ0V4kmeEyxfm/tv.tk/3GrmNI2zUVjebwFfId.', 'dasds@hotmail.com', 0, '', '', '', '', 0, '', '', 0, '2019-04-25'),
(12, 666666, 'dasdsa', 'dasdsa', 'dasdas', 'dasdas', '0000-00-00', '', 0, '', 0, '', '', '', '', 'adasd', '$2y$10$aVa.lrCnaAvAZ5mScmP1zuNaruQ.QCz89CBQwYDNaGzVuGGvNnDo6', 'dasdasdas@hotmail.com', 0, '', '', '', '', 0, '', '', 0, '2019-04-25'),
(13, 67777, 'dasdad', 'asdasdas', 'asdasdasd', 'asdas', '0000-00-00', '', 0, '', 0, '', '', '', '', 'dasdas', '$2y$10$FBzS9nHFrOyUvbbyAsX9xO/NRulIvs4377W10ga0I3qafUfpOl6Nu', 'dasd@hotmail.com', 0, '', '', '', '', 0, '', '', 0, '2019-04-25'),
(14, 4434333, 'dasdsa', 'dasdsa', 'dasdsa', 'adadsa', '0000-00-00', '', 0, '', 0, '', '', '', '', 'dasdsad', '$2y$10$updYebmNY/hDcIybg1Xr7OHyCu4rB3Od1ehLmkYp.7KHn.apl5Sdy', 'dasdsa@hotmail.com', 0, '', '', '', '', 0, '', '', 0, '2019-04-25'),
(15, 546787555, 'adsd', 'dasdasd', 'asdasdasdas', 'dasdsad', '0000-00-00', '', 0, '', 0, '', '', '', '', 'adv2322', '$2y$10$6pp/KY5Al1fMVJ.99vZG..j1Rrvb1obMUt/WKClgw1RE2uZ6fjNvm', 'sadasd@hotmail.com', 0, '', '', '', '', 0, '', '', 0, '2019-04-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `codigo` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `estatus` int(11) NOT NULL,
  `manana` int(11) NOT NULL,
  `tarde` int(11) NOT NULL,
  `noche` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`codigo`, `nombre`, `estatus`, `manana`, `tarde`, `noche`) VALUES
(1, 'ING COMPUTACION', 1, 1, 1, 0),
(2, 'ING ELECTRONICA', 1, 0, 1, 1),
(3, 'Prueba carrera desactivada', 0, 0, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `estado` varchar(10) NOT NULL,
  `ciudad` varchar(10) NOT NULL,
  `municipio` varchar(10) NOT NULL,
  `urbanizacion` varchar(10) NOT NULL,
  `aptcasa` varchar(10) NOT NULL,
  `calle` varchar(10) NOT NULL,
  `alumno` int(11) NOT NULL,
  `postal_trabajo` int(11) NOT NULL,
  `estado_trabajo` varchar(11) NOT NULL,
  `municipio_trabajo` varchar(11) NOT NULL,
  `ciudad_trabajo` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `direcciones`
--

INSERT INTO `direcciones` (`estado`, `ciudad`, `municipio`, `urbanizacion`, `aptcasa`, `calle`, `alumno`, `postal_trabajo`, `estado_trabajo`, `municipio_trabajo`, `ciudad_trabajo`) VALUES
('', '', '', '', '', '', 8, 0, '', '', ''),
('asdsad', 'sadasdas', 'dasdsadasd', '', '', '', 10, 0, 'asdasdasdas', 'dasdasdasda', 'asdsadasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id_documento` int(11) NOT NULL,
  `estatus` int(11) NOT NULL,
  `cedula` text NOT NULL,
  `fondo` text NOT NULL,
  `foto` text NOT NULL,
  `partida` varchar(30) NOT NULL,
  `check_partida` int(11) NOT NULL,
  `check nota` int(11) NOT NULL,
  `check_cedula` int(11) NOT NULL,
  `check_foto` int(11) NOT NULL,
  `check_rusinies` int(11) NOT NULL,
  `check_fondo` int(11) NOT NULL,
  `check_titulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id_documento`, `estatus`, `cedula`, `fondo`, `foto`, `partida`, `check_partida`, `check nota`, `check_cedula`, `check_foto`, `check_rusinies`, `check_fondo`, `check_titulo`) VALUES
(29, 1, '', '', '', '', 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodoing`
--

CREATE TABLE `metodoing` (
  `documento` int(11) NOT NULL,
  `metodo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `metodoing`
--

INSERT INTO `metodoing` (`documento`, `metodo`) VALUES
(29, 'foto_0_04-27-19102956');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `documento` int(11) NOT NULL,
  `nota` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`documento`, `nota`) VALUES
(29, 'notas_0_04-27-19103004');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rusnies`
--

CREATE TABLE `rusnies` (
  `documento` int(11) NOT NULL,
  `rusnies` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rusnies`
--

INSERT INTO `rusnies` (`documento`, `rusnies`) VALUES
(29, 'rusnies_0_04-27-19103015');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos`
--

CREATE TABLE `telefonos` (
  `alumno` int(11) NOT NULL,
  `num_movil` bigint(15) NOT NULL,
  `num_habitacion` bigint(16) NOT NULL,
  `num_trabajo` bigint(16) NOT NULL,
  `num_habitacion_pariente` bigint(17) NOT NULL,
  `num_movil_pariente` bigint(17) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `telefonos`
--

INSERT INTO `telefonos` (`alumno`, `num_movil`, `num_habitacion`, `num_trabajo`, `num_habitacion_pariente`, `num_movil_pariente`) VALUES
(10, 321312312321, 2121321312321, 3123213213213, 3333333333333333, 4444444444444444);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_solicitud`
--

CREATE TABLE `tipo_solicitud` (
  `tipo` int(2) NOT NULL,
  `nombre_solicitud` text NOT NULL,
  `activa` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Para activar y desactivar solicitudes';

--
-- Volcado de datos para la tabla `tipo_solicitud`
--

INSERT INTO `tipo_solicitud` (`tipo`, `nombre_solicitud`, `activa`) VALUES
(1, 'Inscripción Curso Introductorio', 1),
(2, 'Inscripción Curso Básico', 1),
(3, 'Inscripción Prueba de Admisión', 1),
(4, 'Inscripción Ingreso Directo', 1),
(5, 'Inscripción por Equivalencia', 1),
(6, 'Reincorporación', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id_alumno`),
  ADD KEY `documento` (`documento`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD UNIQUE KEY `alumno` (`alumno`),
  ADD KEY `alumno_2` (`alumno`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id_documento`);

--
-- Indices de la tabla `metodoing`
--
ALTER TABLE `metodoing`
  ADD KEY `documento` (`documento`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD KEY `documento` (`documento`);

--
-- Indices de la tabla `rusnies`
--
ALTER TABLE `rusnies`
  ADD KEY `documento` (`documento`);

--
-- Indices de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD UNIQUE KEY `alumno_2` (`alumno`),
  ADD KEY `alumno` (`alumno`);

--
-- Indices de la tabla `tipo_solicitud`
--
ALTER TABLE `tipo_solicitud`
  ADD PRIMARY KEY (`tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `tipo_solicitud`
--
ALTER TABLE `tipo_solicitud`
  MODIFY `tipo` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD CONSTRAINT `direcciones_ibfk_1` FOREIGN KEY (`alumno`) REFERENCES `alumnos` (`id_alumno`);

--
-- Filtros para la tabla `metodoing`
--
ALTER TABLE `metodoing`
  ADD CONSTRAINT `metodoing_ibfk_1` FOREIGN KEY (`documento`) REFERENCES `documentos` (`id_documento`);

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`documento`) REFERENCES `documentos` (`id_documento`);

--
-- Filtros para la tabla `rusnies`
--
ALTER TABLE `rusnies`
  ADD CONSTRAINT `rusnies_ibfk_1` FOREIGN KEY (`documento`) REFERENCES `documentos` (`id_documento`);

--
-- Filtros para la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD CONSTRAINT `telefonos_ibfk_1` FOREIGN KEY (`alumno`) REFERENCES `alumnos` (`id_alumno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
