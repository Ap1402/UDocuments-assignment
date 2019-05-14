-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2019 a las 14:22:44
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

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id_admin`, `estatus`, `usuario`, `contrasena`, `nombre`, `rol`) VALUES
(6, 0, '', '$2y$10$.Ul8xWOVgY71qxmCpOJvbui1bA.wUAyuH5yJ2gSSuAaxuMDCcwmbO', 'Prueba', 2),
(7, 0, 'admin1', '$2y$10$DAGMQ/Z.vWbh3/tyc7YOMugL1VlWdnZRRIb4eHb6vyggXIaiNntiO', 'Andres Pint', 3),
(10, 1, 'Prueba123', '$2y$10$9nibQnfSQx9p5NbaUIW.yOWINs0ELvcWxq5E5O9KKqyh.G8jlYj/a', 'Prueba', 1),
(12, 1, 'juan', '$2y$10$F94eyKBIenT9JfK9PBD3quEjaIdQEQTWQu9pphJu7Qd2F1mBrm7Vy', 'asdasd', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id_alumno` int(11) NOT NULL,
  `cedula` bigint(20) NOT NULL,
  `p_nombre` varchar(100) NOT NULL,
  `s_nombre` varchar(100) NOT NULL,
  `p_apellido` varchar(100) NOT NULL,
  `s_apellido` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `estado_civil` varchar(1) NOT NULL,
  `metodo_ingreso` int(11) NOT NULL,
  `carrera` text NOT NULL,
  `turno` int(11) NOT NULL,
  `pais_nac` varchar(100) NOT NULL,
  `estado_nac` varchar(100) NOT NULL,
  `ciudad_nac` varchar(100) NOT NULL,
  `municipio_nac` varchar(100) NOT NULL,
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
  `fechaCreacion` date NOT NULL,
  `ultActualizacion` date NOT NULL,
  `check_datos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alumno`, `cedula`, `p_nombre`, `s_nombre`, `p_apellido`, `s_apellido`, `fecha_nacimiento`, `estado_civil`, `metodo_ingreso`, `carrera`, `turno`, `pais_nac`, `estado_nac`, `ciudad_nac`, `municipio_nac`, `username`, `contrasena`, `correo`, `documento`, `parientename`, `parentesco`, `discapacidad`, `nombreInst`, `anoEgreso`, `codigoInst`, `estadoInst`, `tipoInst`, `fechaCreacion`, `ultActualizacion`, `check_datos`) VALUES
(1, 0, '', '', '', '', '0000-00-00', '', 0, '', 0, '', '', '0', '0', 'asdasdas@hotmail.com', 'asdasdas@hotmail.com', '', 0, '', '', '', '', 0, '', '', 0, '0000-00-00', '0000-00-00', 0),
(2, 12345, 'Andres', 'Alejandro', 'Pinto', 'Santiso', '0000-00-00', '', 0, '', 0, '', '', '0', '0', 'apinto15@hotmail.com', '1234567332', 'andres.pintosantiso@gmail.com', 0, '', '', '', '', 0, '', '', 0, '0000-00-00', '0000-00-00', 0),
(3, 123456, 'hola', 'prueba', 'prueba1', 'prueba123123', '0000-00-00', '', 0, '', 0, '', '', '0', '0', 'prueba', '$2y$10$rzXG9S26LdESGuEQLClEVuNNoJclEM.JR4qIW9zWSATJrkieywuIy', 'prueba@hotmail.com', 0, '', '', '', '', 0, '', '', 0, '0000-00-00', '0000-00-00', 0),
(4, 125678, 'dasdsa', 'adasd', 'asdasd', 'dasd', '0000-00-00', '', 0, '', 0, '', '', '0', '0', 'dasdsad', '$2y$10$Qkz2cDin1KaJSH/57NBqHuaa.WkJD1EWJhVtFpSxuxA5wM8k6hYGe', 'dasd@hotmail.com', 0, '', '', '', '', 0, '', '', 0, '0000-00-00', '0000-00-00', 0),
(5, 12321321, 'dasdsa', 'dasdsada', 'ddasdsa', 'sadsadsa', '0000-00-00', '', 0, '', 0, '', '', '0', '0', 'dasdasd', '$2y$10$ASpmxQVV6UxBz58SLNG.F.ur8OHOLOKPFMei0KWApSSm.KatEdM0C', 'dsadsadad@hotmail.com', 0, '', '', '', '', 0, '', '', 0, '0000-00-00', '0000-00-00', 0),
(6, 12312321, 'dasdsa', 'dasdasd', 'adasdasd', 'sadsadasd', '0000-00-00', '', 0, '', 0, '', '', '0', '0', 'dasdsad', '$2y$10$775imaUCvkHK0fmlDqeD6ugmBuI6ryUBpW4XNf5XXZ3xvlsycBG0a', 'dasdasdasd', 0, '', '', '', '', 0, '', '', 0, '0000-00-00', '0000-00-00', 0),
(7, 123213, 'asdsad', 'dasdas', 'dsadas', 'dsadasd', '0000-00-00', '', 0, '', 0, '', '', '0', '0', 'dasdsa', '$2y$10$mmALqBFsiTBiNlFzOPasqOS1dH9Nc///frABQQgvErs7wfq.Zpoku', 'sadasddasdas', 0, '', '', '', '', 0, '', '', 0, '0000-00-00', '2019-04-14', 0),
(8, 123, 'Andres', 'Alejandro', 'Pinto', 'Santiso', '0000-00-00', '', 0, '', 0, '', '', '', '', 'pruebauser', '$2y$10$F7vTML6U45FbbjsEv2d5AOCRNFqnD5MgKyzYO2t5SDPMFyw8WpD8m', 'correoprueba@hotmail.com', 0, '', '', '', '', 0, '', '', 0, '0000-00-00', '2019-04-16', 0),
(9, 1234567, 'Hola', '123', '12312', '12312', '2019-05-09', '', 0, '', 0, '', '', '', '', 'prueba', '$2y$10$jx3027snfx37xFLBypOvp./G/TS0TeKO6/UCgKY27E5iRC9rKhKCy', 'dadas@hotmail.com', 0, '', '', '', '', 0, '', '', 0, '0000-00-00', '2019-04-23', 0),
(10, 25582804, 'Andres', 'Alejandro', 'Pinto', 'Santiso', '2008-04-09', '1', 0, '1', 1, 'Venezuel', 'Carabobo', 'Valencia', 'San diego', 'hola', '$2y$10$FlLsgqKWgg9.0I5OuzeO6O46yc08/0ZWOUJx26Qh3Fa7wWjflCvxK', 'asasdas@hotmail.com', 29, 'asdddddddd', 'ddasdddddd', 'dasds', '2asddddddddd', 2000, 'dadassadas', 'dasassadad', 1, '0000-00-00', '2019-05-14', 0),
(11, 67887766, 'aaaa', 'aaa', 'ccc', 'ccc', '0000-00-00', '', 0, '', 0, '', '', '', '', '3414', '$2y$10$gxjfl8vNSvrum3oZ0V4kmeEyxfm/tv.tk/3GrmNI2zUVjebwFfId.', 'dasds@hotmail.com', 0, '', '', '', '', 0, '', '', 0, '0000-00-00', '2019-04-25', 0),
(12, 666666, 'dasdsa', 'dasdsa', 'dasdas', 'dasdas', '0000-00-00', '', 0, '', 0, '', '', '', '', 'adasd', '$2y$10$aVa.lrCnaAvAZ5mScmP1zuNaruQ.QCz89CBQwYDNaGzVuGGvNnDo6', 'dasdasdas@hotmail.com', 0, '', '', '', '', 0, '', '', 0, '0000-00-00', '2019-04-25', 0),
(13, 67777, 'dasdad', 'asdasdas', 'asdasdasd', 'asdas', '0000-00-00', '', 0, '', 0, '', '', '', '', 'dasdas', '$2y$10$FBzS9nHFrOyUvbbyAsX9xO/NRulIvs4377W10ga0I3qafUfpOl6Nu', 'dasd@hotmail.com', 0, '', '', '', '', 0, '', '', 0, '0000-00-00', '2019-04-25', 0),
(14, 4434333, 'dasdsa', 'dasdsa', 'dasdsa', 'adadsa', '0000-00-00', '', 0, '', 0, '', '', '', '', 'dasdsad', '$2y$10$updYebmNY/hDcIybg1Xr7OHyCu4rB3Od1ehLmkYp.7KHn.apl5Sdy', 'dasdsa@hotmail.com', 0, '', '', '', '', 0, '', '', 0, '0000-00-00', '2019-04-25', 0),
(15, 546787555, 'adsd', 'dasdasd', 'asdasdasdas', 'dasdsad', '0000-00-00', '', 0, '', 0, '', '', '', '', 'adv2322', '$2y$10$6pp/KY5Al1fMVJ.99vZG..j1Rrvb1obMUt/WKClgw1RE2uZ6fjNvm', 'sadasd@hotmail.com', 0, '', '', '', '', 0, '', '', 0, '0000-00-00', '2019-04-25', 0),
(17, 2147483647, 'Juan', 'Jose', 'Perez', 'Diaz', '0000-00-00', '', 0, '', 0, '', '', '', '', 'Juan1234', '$2y$10$mkXEe.krMqgtv4styLLjXekiwVqsOSmMk5/vJPiKivgCo9LnZzfi.', 'prueba@hotmail.com', 31, '', '', '', '', 0, '', '', 0, '2019-05-12', '0000-00-00', 0),
(18, 12345672342, 'Juan', 'Jose', 'NuÃ±es', 'Rodriguez', '0000-00-00', '', 0, '', 0, '', '', '', '', 'Probando', '$2y$10$9h9Xh.ObQmeVkAW/0Ul.i.kyvnS7JuXXp3/imtpWkjmZmFOE4SOtO', 'correo@prueba.com', 32, '', '', '', '', 0, '', '', 0, '2019-05-14', '0000-00-00', 0),
(19, 1231243214112, 'Juan', 'Jose', 'nuÃ±es', 'rodriguez', '2009-05-01', '1', 0, '', 0, 'Venezuela', 'proba', 'asdadaas', 'asdasd', 'probando1', '$2y$10$eMzC6Xb6wyaX3yJPf0o9J.7GipB1MmJsIhBv9hTPTbQaNSyl2VEUS', 'probando@hotmail.com', 33, 'adasdsdsas', 'asdasdasds', '', 'asdadsasasd', 2000, 'dasdasdasd', 'asdadadada', 1, '2019-05-14', '2019-05-14', 0);

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
(3, 'Prueba carrera desactivada', 1, 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `estado` varchar(10) NOT NULL,
  `ciudad` varchar(10) NOT NULL,
  `municipio` varchar(10) NOT NULL,
  `urbanizacion` varchar(30) NOT NULL,
  `aptcasa` varchar(30) NOT NULL,
  `calle` varchar(30) NOT NULL,
  `postal_hab` varchar(30) NOT NULL,
  `alumno` int(11) NOT NULL,
  `postal_trabajo` varchar(30) NOT NULL,
  `estado_trabajo` varchar(30) NOT NULL,
  `municipio_trabajo` varchar(30) NOT NULL,
  `ciudad_trabajo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `direcciones`
--

INSERT INTO `direcciones` (`estado`, `ciudad`, `municipio`, `urbanizacion`, `aptcasa`, `calle`, `postal_hab`, `alumno`, `postal_trabajo`, `estado_trabajo`, `municipio_trabajo`, `ciudad_trabajo`) VALUES
('', '', '', '', '', '', '0', 8, '0', '', '', ''),
('ssss', 'Valencia', 'Valencia', 'Tulipan', 'ap14', 'parcela 13', '3333333', 10, '313123', 'dasds', 'dasdas', 'dasdas'),
('312dasd', 'adsadasd', 'asdasdasd', 'dadasdsa', 'dadas', 'dasdasd', '12312321', 19, '', 'dasdadas', 'dasdasdad', 'dasdasd');

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
  `partida` text NOT NULL,
  `check_partida` int(11) NOT NULL,
  `check_nota` int(11) NOT NULL,
  `check_cedula` int(11) NOT NULL,
  `check_foto` int(11) NOT NULL,
  `check_rusinies` int(11) NOT NULL,
  `check_fondo` int(11) NOT NULL,
  `check_metodo` int(11) NOT NULL,
  `porcentaje` int(4) NOT NULL,
  `ultActDoc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id_documento`, `estatus`, `cedula`, `fondo`, `foto`, `partida`, `check_partida`, `check_nota`, `check_cedula`, `check_foto`, `check_rusinies`, `check_fondo`, `check_metodo`, `porcentaje`, `ultActDoc`) VALUES
(29, 1, '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '2019-05-14'),
(30, 0, '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00'),
(31, 0, '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00'),
(32, 0, '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00'),
(33, 0, '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodoing`
--

CREATE TABLE `metodoing` (
  `id` int(11) NOT NULL,
  `documento` int(11) NOT NULL,
  `metodo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `metodoing`
--

INSERT INTO `metodoing` (`id`, `documento`, `metodo`) VALUES
(3, 29, '25582804/metodo_0_05-14-19081556.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `documento` int(11) NOT NULL,
  `nota` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rusnies`
--

CREATE TABLE `rusnies` (
  `documento` int(11) NOT NULL,
  `rusnies` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rusnies`
--

INSERT INTO `rusnies` (`documento`, `rusnies`) VALUES
(29, '25582804/rusnies_1_05-05-19120055.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id_solicitud` int(11) NOT NULL,
  `alumno` int(11) NOT NULL,
  `fechaCreacion` date NOT NULL,
  `estadoSolicitud` int(11) NOT NULL COMMENT '0- Pendiente 1- Atendida',
  `fechaAtencion` date NOT NULL COMMENT 'Fecha en la que fue atendida',
  `tipo` int(11) NOT NULL,
  `carrera` int(11) NOT NULL,
  `turno` int(11) NOT NULL,
  `personalAtencion` varchar(255) NOT NULL COMMENT 'Nombre del personal que la atendio'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`id_solicitud`, `alumno`, `fechaCreacion`, `estadoSolicitud`, `fechaAtencion`, `tipo`, `carrera`, `turno`, `personalAtencion`) VALUES
(1, 0, '0000-00-00', 0, '0000-00-00', 1, 2, 3, ''),
(2, 10, '2019-05-13', 0, '0000-00-00', 2, 2, 2, '');

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
(10, 9223372036854775807, 11111111111, 9223372036854775807, 33333333333, 22222222222222),
(19, 112222222222, 1111111111111, 131321131313131313, 2132132132113, 213123213213);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `documento` (`documento`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD UNIQUE KEY `nota` (`nota`),
  ADD KEY `documento` (`documento`);

--
-- Indices de la tabla `rusnies`
--
ALTER TABLE `rusnies`
  ADD UNIQUE KEY `rusnies` (`rusnies`),
  ADD KEY `documento` (`documento`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id_solicitud`);

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `metodoing`
--
ALTER TABLE `metodoing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
