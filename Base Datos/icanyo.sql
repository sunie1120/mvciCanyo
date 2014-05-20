-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-05-2014 a las 20:29:29
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `icanyo`
--
CREATE DATABASE IF NOT EXISTS `icanyo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `icanyo`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE IF NOT EXISTS `actividad` (
  `id_actividad` int(5) NOT NULL AUTO_INCREMENT,
  `titulo_actividad` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cuerpo_actividad` varchar(500) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `lugar_actividad` varchar(150) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fecha_inicio_actividad` date NOT NULL,
  `hora_inicio_actividad` date DEFAULT NULL,
  `fecha_fin_actividad` date NOT NULL,
  `hora_fin_actividad` date DEFAULT NULL,
  `id_usuario` int(5) NOT NULL,
  PRIMARY KEY (`id_actividad`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id_actividad`, `titulo_actividad`, `cuerpo_actividad`, `lugar_actividad`, `fecha_inicio_actividad`, `hora_inicio_actividad`, `fecha_fin_actividad`, `hora_fin_actividad`, `id_usuario`) VALUES
(1, 'MI PRIMERA ACTIVIDAD', 'MI PRIMERA ACTIVIDAD', NULL, '2014-05-09', NULL, '2014-05-09', NULL, 4),
(2, 'OTRA MAS', NULL, NULL, '2014-05-14', NULL, '2014-05-21', NULL, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades_en_calendario`
--

CREATE TABLE IF NOT EXISTS `actividades_en_calendario` (
  `id_calendario` varchar(3) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_actividad` int(5) NOT NULL,
  PRIMARY KEY (`id_calendario`,`id_actividad`),
  KEY `fk_actividades_en_calendario` (`id_actividad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `actividades_en_calendario`
--

INSERT INTO `actividades_en_calendario` (`id_calendario`, `id_actividad`) VALUES
('1', 1),
('2', 1),
('2', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncio`
--

CREATE TABLE IF NOT EXISTS `anuncio` (
  `id_anuncio` int(5) NOT NULL AUTO_INCREMENT,
  `titulo_anuncio` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cuerpo_anuncio` varchar(500) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fecha_inicio_anuncio` date NOT NULL,
  `fecha_fin_anuncio` date DEFAULT NULL,
  `id_usuario` int(5) NOT NULL,
  `publico` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_anuncio`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `anuncio`
--

INSERT INTO `anuncio` (`id_anuncio`, `titulo_anuncio`, `cuerpo_anuncio`, `fecha_inicio_anuncio`, `fecha_fin_anuncio`, `id_usuario`, `publico`) VALUES
(1, 'MI PRIMER ANUNCIO', 'MI PRIMER ANUNCIO', '2014-05-09', NULL, 11, 1),
(2, 'MI SEGUNDO ANUNCIO', 'MI SEGUNDO ANUNCIO', '2014-05-09', NULL, 10, 1),
(3, 'otro más', 'otro más', '2014-05-12', NULL, 20, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendario`
--

CREATE TABLE IF NOT EXISTS `calendario` (
  `id_calendario` varchar(3) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipo_calendario` varchar(5) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_calendario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `calendario`
--

INSERT INTO `calendario` (`id_calendario`, `tipo_calendario`) VALUES
('1', 'CAGNR'),
('2', 'CAADM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `id_departamento` varchar(3) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre_departamento` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_departamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nombre_departamento`) VALUES
('ADM', 'Administración'),
('CNT', 'Contabilidad'),
('INF', 'Informática'),
('LOG', 'Logística: transportes y almacén'),
('RRH', 'Recursos Humanos'),
('TRD', 'Trade: departamento de tiendas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos_perfil`
--

CREATE TABLE IF NOT EXISTS `fotos_perfil` (
  `id_foto` int(5) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(5) NOT NULL,
  `datos_foto` blob NOT NULL,
  PRIMARY KEY (`id_foto`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto`
--

CREATE TABLE IF NOT EXISTS `puesto` (
  `id_puesto` varchar(5) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre_puesto` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_puesto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `puesto`
--

INSERT INTO `puesto` (`id_puesto`, `nombre_puesto`) VALUES
('JFADM', 'Jede del departamento administración'),
('JFCON', 'Jefe del departamento de contabilidad'),
('JFINF', 'Jefe del departamento informática'),
('JFLOG', 'Jefe del departamento de logística'),
('JFRRH', 'Jefe del departamento de recursos humanos'),
('JFTRD', 'Jefe del departamento de trade (ventas)'),
('SDGTR', 'Segundo al cargo del departamento de trade  (ventas)'),
('SGADM', 'Segundo al cargo del departamento de administración'),
('SGCON', 'Segundo al cargo del departamento de contabilidad'),
('SGINF', 'Segundo al cargo del departamento de informática'),
('SGLOG', 'Segundo al cargo del departamento de logística'),
('SGRRH', 'Segundo al cargo del departamento de recursos humanos'),
('TRADM', 'Trabajador del departamento de administración'),
('TRCON', 'Trabajador del departamento de contabilidad'),
('TRINF', 'Trabajador del departamento de informática'),
('TRLOG', 'Trabajador del departamento de logística'),
('TRRRH', 'Trabajador del departamento de recursos humanos'),
('TRTRD', 'Trabajador del departamento de trade (ventas)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `id_rol` varchar(3) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre_rol` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion_acceso_app` varchar(300) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`, `descripcion_acceso_app`) VALUES
('0', 'canyos', 'acceso básico'),
('1', 'ximos', 'acceso nivel 1, encargados, tutores, ...'),
('2', 'quesis', 'acceso de nivel 2, supervisores y jefes de departamento'),
('3', 'martins', 'acceso de nivel 3, directores, jefes de estudio, ...'),
('4', 'grebs', 'usuario de maximo nivel, presidentes y gerentes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE IF NOT EXISTS `tarea` (
  `id_tarea` int(5) NOT NULL AUTO_INCREMENT,
  `titulo_tarea` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cuerpo_tarea` varchar(500) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fecha_vencimiento_tarea` date DEFAULT NULL,
  `hecha` tinyint(1) NOT NULL,
  `id_tarea_padre` int(5) NOT NULL,
  `id_usuario_crea` int(5) NOT NULL,
  `id_usuario_asignado` int(5) NOT NULL,
  PRIMARY KEY (`id_tarea`),
  KEY `id_tarea_padre` (`id_tarea_padre`),
  KEY `id_tarea_padre_2` (`id_tarea_padre`),
  KEY `id_usuario_crea` (`id_usuario_crea`),
  KEY `id_usuario_asignado` (`id_usuario_asignado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`id_tarea`, `titulo_tarea`, `cuerpo_tarea`, `fecha_vencimiento_tarea`, `hecha`, `id_tarea_padre`, `id_usuario_crea`, `id_usuario_asignado`) VALUES
(1, 'prueba', 'prueba', NULL, 0, 1, 2, 2),
(2, 'CONTINUAR LA PRUEBA', 'CONTINUAR LA PRUEBA', '2014-05-21', 0, 1, 5, 2),
(3, 'OTRA TAREA', 'UNA TAREA MÁS DE PRUEBA', NULL, 0, 2, 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `primer_apellido` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `segundo_apellido` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nick_usuario` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `contrasena` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_rol` varchar(3) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `nick_usuario` (`nick_usuario`),
  KEY `id_rol` (`id_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=40 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `primer_apellido`, `segundo_apellido`, `nick_usuario`, `contrasena`, `id_rol`) VALUES
(1, 'Pepa', 'Pinto', 'Perez', 'Pepa', 'pepa', '0'),
(2, 'Pepe', 'Partido', 'Martin', 'Pepe', 'pepe', '0'),
(3, 'Carlos', 'García', 'Justicia', 'Carlos', 'carlos', '0'),
(4, 'Toni', 'Aguilera', 'Garcia', 'Toni', 'toni', '0'),
(5, 'Maria', 'Martinez', 'Molina', 'Maria', 'maria', '0'),
(6, 'Juan', 'Perez', 'Muñoz', 'Juan', 'juan', '1'),
(7, 'Amparo', 'Gaona', 'Julian', 'Amparo', 'amparo', '1'),
(8, 'Mariano', 'Murcia', 'Colleja', 'Mariano', '*B84597541C65B4C861E', '1'),
(10, 'Jesus', 'Jaen', 'Juliano', 'Jesus', '*1F2DD777CB33BA893B0', '1'),
(11, 'Josefa', 'Feliciana', 'Murcia', 'Josefa', '*33DF3BDBF560768DDE1', '1'),
(12, 'Edea', 'Kramer', 'Esteban', 'Edea', '*958135D8A0C1A790ADC', '2'),
(13, 'Javier', 'Murciano', 'Sangres', 'Javier', '*B174F2517BA8F7BD62D', '2'),
(14, 'Nuria', 'Goikoetxea', 'Garcia', 'Nuria', '*98CD857E57ADE6787AD', '3'),
(15, 'Vicent', 'Pelaez', 'Gomez', 'Vicent', '*E6A63E91D8A468413B4', '3'),
(18, 'Joaquin', 'Gris', 'Barroso', 'Joaquin', '*B67C78FEF7C1C834C71', '3'),
(19, 'Martina', 'Judias', 'Verdes', 'Martina', '*A12C2E9A722C2DBA011', '3'),
(20, 'Puri', 'Guzman', 'Mulero', 'Puri', '*B5951F1BFB68422E117', '3'),
(21, 'Dori', 'Justicia', 'Garcia', 'Dori', '*2627622AAB2C46AA9DC', '4'),
(22, 'Paco', 'Garcia', 'Barrios', 'Paco', '*4F8A2551BE90750DB5D', '4'),
(23, 'Daniel', 'Herrero', 'Vega', 'Daniel', 'daniel', '4'),
(24, 'Ana', 'Alba', 'Valencia', 'Ana', '*66BA1D1242DA159012C', '2'),
(25, 'Fernando', 'Soto', 'Amarillo', 'Fernando', '*35EDA4F06FEF7C7DA12', '2'),
(36, 'Javier', 'Coll', 'Lopez', 'Xavi', '*F041C9B9626731F416E', '2'),
(37, 'Javier', 'Tomas', 'Tomas', 'Tomas', '*B4493C8D3AFA2D1601C', '3'),
(38, 'Amapola', 'Roja', 'Fragante', 'Amapola', '*9368D45EA918693A0C5', '4'),
(39, 'Hortensia', 'Rosa', 'Pocha', 'Hortensia', '*340C1B7F5F886E668E9', '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_pertenece`
--

CREATE TABLE IF NOT EXISTS `usuario_pertenece` (
  `id_usuario` int(5) NOT NULL,
  `id_puesto` varchar(5) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_departamento` varchar(3) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_puesto`,`id_departamento`),
  KEY `fk_puesto_usuario` (`id_puesto`),
  KEY `fk_departamento_usuario` (`id_departamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario_pertenece`
--

INSERT INTO `usuario_pertenece` (`id_usuario`, `id_puesto`, `id_departamento`) VALUES
(1, 'TRADM', 'ADM'),
(2, 'JFADM', 'ADM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_solicita_vacaciones`
--

CREATE TABLE IF NOT EXISTS `usuario_solicita_vacaciones` (
  `id_usuario` int(5) NOT NULL,
  `id_vacaciones` int(5) NOT NULL,
  `numero_dias` int(3) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_usuario`,`id_vacaciones`),
  KEY `fk_vacaciones` (`id_vacaciones`),
  KEY `numero_dias` (`numero_dias`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario_solicita_vacaciones`
--

INSERT INTO `usuario_solicita_vacaciones` (`id_usuario`, `id_vacaciones`, `numero_dias`, `estado`) VALUES
(18, 1, 3, 0),
(22, 2, 7, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacaciones`
--

CREATE TABLE IF NOT EXISTS `vacaciones` (
  `id_vacaciones` int(5) NOT NULL AUTO_INCREMENT,
  `dias_totales` int(3) NOT NULL,
  `dias_libre_disposicion` int(3) DEFAULT NULL,
  `otros_dias` int(3) DEFAULT NULL,
  `visibles` tinyint(1) NOT NULL DEFAULT '1',
  `id_usuario` int(5) NOT NULL,
  `id_usuario_aprueba` int(5) NOT NULL,
  PRIMARY KEY (`id_vacaciones`),
  KEY `id_usuario_aprueba` (`id_usuario_aprueba`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_usuario_aprueba_2` (`id_usuario_aprueba`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='visibles indica si son visibles para el resto de la empresa' AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `vacaciones`
--

INSERT INTO `vacaciones` (`id_vacaciones`, `dias_totales`, `dias_libre_disposicion`, `otros_dias`, `visibles`, `id_usuario`, `id_usuario_aprueba`) VALUES
(1, 3, NULL, NULL, 0, 22, 21),
(2, 7, NULL, NULL, 1, 18, 22),
(3, 7, NULL, NULL, 1, 18, 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visibilidad_departamentos`
--

CREATE TABLE IF NOT EXISTS `visibilidad_departamentos` (
  `id_anuncio` int(5) NOT NULL,
  `id_departamento` varchar(3) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_anuncio`,`id_departamento`),
  KEY `fk_anuncio_departamento` (`id_departamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `visibilidad_departamentos`
--

INSERT INTO `visibilidad_departamentos` (`id_anuncio`, `id_departamento`) VALUES
(2, 'CNT'),
(1, 'RRH');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visibilidad_roles`
--

CREATE TABLE IF NOT EXISTS `visibilidad_roles` (
  `id_rol` varchar(3) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_anuncio` int(5) NOT NULL,
  PRIMARY KEY (`id_rol`,`id_anuncio`),
  KEY `fk_visibilidad_anuncio_por_rol` (`id_anuncio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `visibilidad_roles`
--

INSERT INTO `visibilidad_roles` (`id_rol`, `id_anuncio`) VALUES
('1', 3),
('2', 3),
('3', 3);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `fk_actividad_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `actividades_en_calendario`
--
ALTER TABLE `actividades_en_calendario`
  ADD CONSTRAINT `fk_actividades_en_calendario` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tipo_calendario_actividad` FOREIGN KEY (`id_calendario`) REFERENCES `calendario` (`id_calendario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `anuncio`
--
ALTER TABLE `anuncio`
  ADD CONSTRAINT `fk_anuncio_usurario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `fotos_perfil`
--
ALTER TABLE `fotos_perfil`
  ADD CONSTRAINT `FK_foto_id_usu` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD CONSTRAINT `fk_tarea_padre` FOREIGN KEY (`id_tarea_padre`) REFERENCES `tarea` (`id_tarea`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tarea_usuario_asignado` FOREIGN KEY (`id_usuario_asignado`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tarea_usuario_crea` FOREIGN KEY (`id_usuario_crea`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_rol_usuario` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_pertenece`
--
ALTER TABLE `usuario_pertenece`
  ADD CONSTRAINT `fk_departamento_usuario` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_puesto_usuario` FOREIGN KEY (`id_puesto`) REFERENCES `puesto` (`id_puesto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuario_departamento_rol` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_solicita_vacaciones`
--
ALTER TABLE `usuario_solicita_vacaciones`
  ADD CONSTRAINT `fk_usuario_solicita` FOREIGN KEY (`id_usuario`) REFERENCES `vacaciones` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_vacaciones` FOREIGN KEY (`id_vacaciones`) REFERENCES `vacaciones` (`id_vacaciones`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vacaciones`
--
ALTER TABLE `vacaciones`
  ADD CONSTRAINT `fk_vacaciones_aprueba` FOREIGN KEY (`id_usuario_aprueba`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_vacaciones_solicita` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `visibilidad_departamentos`
--
ALTER TABLE `visibilidad_departamentos`
  ADD CONSTRAINT `fk_anuncio_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_anuncio_visible_departamento` FOREIGN KEY (`id_anuncio`) REFERENCES `anuncio` (`id_anuncio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `visibilidad_roles`
--
ALTER TABLE `visibilidad_roles`
  ADD CONSTRAINT `fk_visibilidad_anuncio_por_rol` FOREIGN KEY (`id_anuncio`) REFERENCES `anuncio` (`id_anuncio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_visibilidad_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
