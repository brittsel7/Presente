-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-07-2018 a las 18:51:46
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_presente`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_asistencia`
--

CREATE TABLE `tbl_asistencia` (
  `id_asistencia` int(11) NOT NULL,
  `id_grupo_estudiante_fk` int(11) NOT NULL,
  `id_fecha_asistencia_fk` int(11) NOT NULL,
  `txt_asistencia` varchar(1) NOT NULL,
  `int_justificada` tinyint(4) NOT NULL,
  `txt_doc_justificacion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_aula`
--

CREATE TABLE `tbl_aula` (
  `id_aula` int(11) NOT NULL,
  `id_escuela_fk` int(11) NOT NULL,
  `txt_nombre` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_curso`
--

CREATE TABLE `tbl_curso` (
  `id_curso` int(11) NOT NULL,
  `id_plan_fk` int(11) NOT NULL,
  `txt_codigo` varchar(10) NOT NULL,
  `txt_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_docente`
--

CREATE TABLE `tbl_docente` (
  `id_docente` int(11) NOT NULL,
  `txt_nombres` varchar(45) NOT NULL,
  `txt_apellido1` varchar(45) NOT NULL,
  `txt_apellido2` varchar(45) DEFAULT NULL,
  `txt_dni` varchar(20) DEFAULT NULL,
  `int_director` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_escuela`
--

CREATE TABLE `tbl_escuela` (
  `id_escuela` int(11) NOT NULL,
  `txt_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_escuela`
--

INSERT INTO `tbl_escuela` (`id_escuela`, `txt_nombre`) VALUES
(1, 'INGENIERIA DE SISTEMA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estudiante`
--

CREATE TABLE `tbl_estudiante` (
  `id_estudiante` int(11) NOT NULL,
  `txt_cui` varchar(10) NOT NULL,
  `txt_nombres` varchar(45) NOT NULL,
  `txt_apellido1` varchar(45) NOT NULL,
  `txt_apellido2` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_fecha_asistencia`
--

CREATE TABLE `tbl_fecha_asistencia` (
  `id_fecha_asistencia` int(11) NOT NULL,
  `id_grupo_fk` int(11) NOT NULL,
  `txt_tema_avance` varchar(50) NOT NULL,
  `int_porcentaje_avance` int(11) NOT NULL,
  `date_inicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_fin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `int_cerrada` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_grupo`
--

CREATE TABLE `tbl_grupo` (
  `id_grupo` int(11) NOT NULL,
  `id_semestre_fk` int(11) NOT NULL,
  `id_aula_fk` int(11) NOT NULL,
  `id_curso_fk` int(11) NOT NULL,
  `id_docente_fk` int(11) NOT NULL,
  `date_incio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_fin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `int_reprogramada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_grupo_estudiante`
--

CREATE TABLE `tbl_grupo_estudiante` (
  `id_grupo_estudiante` int(11) NOT NULL,
  `id_grupo_fk` int(11) NOT NULL,
  `id_estudiante_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_plan`
--

CREATE TABLE `tbl_plan` (
  `id_plan` int(11) NOT NULL,
  `txt_nombre` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_secretaria`
--

CREATE TABLE `tbl_secretaria` (
  `id_secretaria` int(11) NOT NULL,
  `id_escuela_fk` int(11) NOT NULL,
  `txt_nombres` varchar(45) NOT NULL,
  `txt_apellido1` varchar(45) NOT NULL,
  `txt_apellido2` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_secretaria`
--

INSERT INTO `tbl_secretaria` (`id_secretaria`, `id_escuela_fk`, `txt_nombres`, `txt_apellido1`, `txt_apellido2`) VALUES
(1, 1, 'JULIA', 'BELLIDO', 'LOPEZ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_semestre`
--

CREATE TABLE `tbl_semestre` (
  `id_semestre` int(11) NOT NULL,
  `txt_semestre` varchar(10) NOT NULL,
  `date_inicio` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_fin` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL,
  `usuario_cuenta` varchar(45) NOT NULL,
  `usuario_password` varchar(100) NOT NULL,
  `usuario_secretaria_id` int(11) DEFAULT NULL,
  `usuario_docente_id` int(11) DEFAULT NULL,
  `usuario_estudiante_id` int(11) DEFAULT NULL,
  `usuario_rol_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario_cuenta`, `usuario_password`, `usuario_secretaria_id`, `usuario_docente_id`, `usuario_estudiante_id`, `usuario_rol_id`) VALUES
(1, 'admin', '$2y$10$6nN5d5beEEEPKl0B8i0n3.AWWoHW8FVmfkM94ROm8mgcbV9gd1lSC', 1, NULL, NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_asistencia`
--
ALTER TABLE `tbl_asistencia`
  ADD PRIMARY KEY (`id_asistencia`),
  ADD UNIQUE KEY `id_asistencia_UNIQUE` (`id_asistencia`),
  ADD KEY `tbl_asistencia_grupo_estudiante_idx` (`id_grupo_estudiante_fk`),
  ADD KEY `fk_asistencia_fecha_asistencia_idx` (`id_fecha_asistencia_fk`);

--
-- Indices de la tabla `tbl_aula`
--
ALTER TABLE `tbl_aula`
  ADD PRIMARY KEY (`id_aula`),
  ADD KEY `fk_aula_escuela_idx` (`id_escuela_fk`);

--
-- Indices de la tabla `tbl_curso`
--
ALTER TABLE `tbl_curso`
  ADD PRIMARY KEY (`id_curso`),
  ADD UNIQUE KEY `id_curso_UNIQUE` (`id_curso`),
  ADD KEY `fk_curso_plan_idx` (`id_plan_fk`);

--
-- Indices de la tabla `tbl_docente`
--
ALTER TABLE `tbl_docente`
  ADD PRIMARY KEY (`id_docente`),
  ADD UNIQUE KEY `id_docente_UNIQUE` (`id_docente`);

--
-- Indices de la tabla `tbl_escuela`
--
ALTER TABLE `tbl_escuela`
  ADD PRIMARY KEY (`id_escuela`),
  ADD UNIQUE KEY `id_escuela_UNIQUE` (`id_escuela`);

--
-- Indices de la tabla `tbl_estudiante`
--
ALTER TABLE `tbl_estudiante`
  ADD PRIMARY KEY (`id_estudiante`),
  ADD UNIQUE KEY `id_estudiante_UNIQUE` (`id_estudiante`);

--
-- Indices de la tabla `tbl_fecha_asistencia`
--
ALTER TABLE `tbl_fecha_asistencia`
  ADD PRIMARY KEY (`id_fecha_asistencia`),
  ADD UNIQUE KEY `id_fecha_asistencia_UNIQUE` (`id_fecha_asistencia`),
  ADD KEY `fk_fecha_asistencia_grupo_idx` (`id_grupo_fk`);

--
-- Indices de la tabla `tbl_grupo`
--
ALTER TABLE `tbl_grupo`
  ADD PRIMARY KEY (`id_grupo`),
  ADD UNIQUE KEY `id_grupo_UNIQUE` (`id_grupo`),
  ADD KEY `fk_grupo_semestre_idx` (`id_semestre_fk`),
  ADD KEY `fk_grupo_aula_idx` (`id_aula_fk`),
  ADD KEY `fk_grupo_curso_idx` (`id_curso_fk`),
  ADD KEY `fk_grupo_docente_idx` (`id_docente_fk`);

--
-- Indices de la tabla `tbl_grupo_estudiante`
--
ALTER TABLE `tbl_grupo_estudiante`
  ADD PRIMARY KEY (`id_grupo_estudiante`),
  ADD UNIQUE KEY `id_grupo_estudiante_UNIQUE` (`id_grupo_estudiante`),
  ADD KEY `fk_grupo_estudiante_grupo_idx` (`id_grupo_fk`),
  ADD KEY `fk_grupo_estudiante_estudiante_idx` (`id_estudiante_fk`);

--
-- Indices de la tabla `tbl_plan`
--
ALTER TABLE `tbl_plan`
  ADD PRIMARY KEY (`id_plan`),
  ADD UNIQUE KEY `id_plan_UNIQUE` (`id_plan`);

--
-- Indices de la tabla `tbl_secretaria`
--
ALTER TABLE `tbl_secretaria`
  ADD PRIMARY KEY (`id_secretaria`),
  ADD UNIQUE KEY `id_secretaria_UNIQUE` (`id_secretaria`),
  ADD KEY `fk_secretaria_escuela_idx` (`id_escuela_fk`);

--
-- Indices de la tabla `tbl_semestre`
--
ALTER TABLE `tbl_semestre`
  ADD PRIMARY KEY (`id_semestre`),
  ADD UNIQUE KEY `id_semestre_UNIQUE` (`id_semestre`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`),
  ADD UNIQUE KEY `usuario_id_UNIQUE` (`usuario_id`),
  ADD KEY `fk_usuario_secretaria_idx` (`usuario_secretaria_id`),
  ADD KEY `fk_usuario_docente_idx` (`usuario_docente_id`),
  ADD KEY `fk_usuario_estudiante_idx` (`usuario_estudiante_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_asistencia`
--
ALTER TABLE `tbl_asistencia`
  MODIFY `id_asistencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_curso`
--
ALTER TABLE `tbl_curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_docente`
--
ALTER TABLE `tbl_docente`
  MODIFY `id_docente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_escuela`
--
ALTER TABLE `tbl_escuela`
  MODIFY `id_escuela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_estudiante`
--
ALTER TABLE `tbl_estudiante`
  MODIFY `id_estudiante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_fecha_asistencia`
--
ALTER TABLE `tbl_fecha_asistencia`
  MODIFY `id_fecha_asistencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_grupo`
--
ALTER TABLE `tbl_grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_grupo_estudiante`
--
ALTER TABLE `tbl_grupo_estudiante`
  MODIFY `id_grupo_estudiante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_plan`
--
ALTER TABLE `tbl_plan`
  MODIFY `id_plan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_secretaria`
--
ALTER TABLE `tbl_secretaria`
  MODIFY `id_secretaria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_semestre`
--
ALTER TABLE `tbl_semestre`
  MODIFY `id_semestre` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_asistencia`
--
ALTER TABLE `tbl_asistencia`
  ADD CONSTRAINT `fk_asistencia_fecha_asistencia` FOREIGN KEY (`id_fecha_asistencia_fk`) REFERENCES `tbl_fecha_asistencia` (`id_fecha_asistencia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_asistencia_grupo_estudiante` FOREIGN KEY (`id_grupo_estudiante_fk`) REFERENCES `tbl_grupo_estudiante` (`id_grupo_estudiante`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_aula`
--
ALTER TABLE `tbl_aula`
  ADD CONSTRAINT `fk_aula_escuela` FOREIGN KEY (`id_escuela_fk`) REFERENCES `tbl_escuela` (`id_escuela`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_curso`
--
ALTER TABLE `tbl_curso`
  ADD CONSTRAINT `fk_curso_plan` FOREIGN KEY (`id_plan_fk`) REFERENCES `tbl_plan` (`id_plan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_fecha_asistencia`
--
ALTER TABLE `tbl_fecha_asistencia`
  ADD CONSTRAINT `fk_fecha_asistencia_grupo` FOREIGN KEY (`id_grupo_fk`) REFERENCES `tbl_grupo` (`id_grupo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_grupo`
--
ALTER TABLE `tbl_grupo`
  ADD CONSTRAINT `fk_grupo_aula` FOREIGN KEY (`id_aula_fk`) REFERENCES `tbl_aula` (`id_aula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_grupo_curso` FOREIGN KEY (`id_curso_fk`) REFERENCES `tbl_curso` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_grupo_docente` FOREIGN KEY (`id_docente_fk`) REFERENCES `tbl_docente` (`id_docente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_grupo_semestre` FOREIGN KEY (`id_semestre_fk`) REFERENCES `tbl_semestre` (`id_semestre`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_grupo_estudiante`
--
ALTER TABLE `tbl_grupo_estudiante`
  ADD CONSTRAINT `fk_grupo_estudiante_estudiante` FOREIGN KEY (`id_estudiante_fk`) REFERENCES `tbl_estudiante` (`id_estudiante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_grupo_estudiante_grupo` FOREIGN KEY (`id_grupo_fk`) REFERENCES `tbl_grupo` (`id_grupo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_secretaria`
--
ALTER TABLE `tbl_secretaria`
  ADD CONSTRAINT `fk_secretaria_escuela` FOREIGN KEY (`id_escuela_fk`) REFERENCES `tbl_escuela` (`id_escuela`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_docente` FOREIGN KEY (`usuario_docente_id`) REFERENCES `tbl_docente` (`id_docente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_estudiante` FOREIGN KEY (`usuario_estudiante_id`) REFERENCES `tbl_estudiante` (`id_estudiante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_secretaria` FOREIGN KEY (`usuario_secretaria_id`) REFERENCES `tbl_secretaria` (`id_secretaria`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
