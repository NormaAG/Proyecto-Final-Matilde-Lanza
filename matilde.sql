-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-01-2021 a las 14:32:03
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `matilde`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `idadmin` int(11) NOT NULL,
  `ci` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `fecha_nac` date NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` int(8) NOT NULL,
  `especialidad` varchar(100) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idadmin`, `ci`, `nombre`, `apellidos`, `direccion`, `fecha_nac`, `correo`, `telefono`, `especialidad`, `idusuario`, `estatus`) VALUES
(1, 76767676, 'NORMA', 'ALBAREZ', 'MALLCORANCHO', '2020-01-18', 'peke3862@gmail.com', 72733929, 'ADMINISTRADOR', 1, 1),
(2, 79495154, 'EBERTH', 'VILLARROEL', 'PAYACOLLO', '2020-02-01', 'jhoel@gmail.com', 77254324, 'RECTOR', 1, 1),
(3, 94951555, 'DARLING ', 'VEGAMONTE VASQUEZ', 'PAIRUMANI', '2000-08-11', 'darling@gmail.com', 65444889, 'SECRETARIA', 1, 1),
(4, 79495159, 'SAUL ', 'CONDE', 'BLANCO GALINDO KM 15', '1981-08-11', 'conde@gmail.com', 72733333, 'DIRECTOR', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `idalumno` int(11) NOT NULL,
  `ci` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `fecha_nac` date NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` int(8) NOT NULL,
  `foto` text CHARACTER SET latin1 NOT NULL,
  `idtutor` int(11) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`idalumno`, `ci`, `nombre`, `apellidos`, `direccion`, `fecha_nac`, `correo`, `telefono`, `foto`, `idtutor`, `estatus`, `idusuario`) VALUES
(1, 72737345, 'DARLING ', 'PERES CRESPO', 'VILOMA KM 19 1/2', '2020-01-17', 'darling@gmail.com', 77254324, 'img_440679b45ffe34241816284b0dd65853.jpg', 1, 1, 1),
(2, 87878787, 'EPIFANIA ', 'AGUILAR GOMEZ', 'AV. BLACO GALINDO KM 20', '2020-01-12', 'epifanny@gmail.com', 77254324, 'img_645fbef5aafcedba86120d9fd918bf8c.jpg', 1, 1, 1),
(3, 8978670, 'JOSELIN', 'ALBAREZ GOMEZ', 'VINTO', '2016-06-22', 'norma@gmail.com', 72733929, 'img_81ca943b56bef68d78e6ef1e2134e006.jpg', 3, 1, 1),
(4, 77077010, 'JOSEPHT', 'PEREZ CRESPO', 'CBBA', '2020-03-19', 'jhon@gmail.com', 72733333, 'img_77fca06061e7b9ac6698769047b2b920.jpg', 1, 1, 1),
(5, 65544332, 'MARIA ', 'PALMER GISADO', 'PASO', '2024-03-28', 'jesi@gmail.com', 76606333, 'img_5beae181ef327b8ed7876a38ce86e97d.jpg', 4, 1, 1),
(6, 33322211, 'RONALD', 'BRAÑEZ JIMENES', 'SACABA', '2013-05-22', 'noelia@gmail.com', 0, 'img_8ab4119e61ac22ea096b238e956dc073.jpg', 3, 1, 1),
(9, 888777666, 'BRUNO', ' CRUZ CAMACHO', 'TIQUIPAYA', '2008-06-12', 'benjamin@gmail.com', 0, 'img_23a3c2bc405df10ade04eb40b3f48a18.jpg', 1, 1, 1),
(10, 22222123, 'JUAN JOSE', 'GUSVER LENON', 'TIQUIPAYA', '2008-03-12', '', 0, 'img_ab3dfcdbdcc1b699f9fb35ca80eccc84.jpg', 1, 1, 1),
(11, 45344545, 'JHOLANDA', 'MORALES GONZALES', 'PAIRUMANI', '2008-12-12', '', 0, 'img_5b07663221eb1b5f4796b0562a0113e7.jpg', 9, 1, 1),
(12, 56679697, 'JUAN PABLO ', 'MORALES GONZALES', 'PAIRUMANI', '2005-09-12', '', 0, 'img_97ca16bc19582ee58e69a5ea54fa5f79.jpg', 9, 1, 1),
(13, 76677889, 'ROBERTO', 'MORALES GONZALES ', 'PAIRUMANI', '2012-04-12', '', 0, 'img_fd39219496eed8df0fe4764a0a2d8191.jpg', 9, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avisos`
--

CREATE TABLE `avisos` (
  `id` int(30) NOT NULL,
  `mensaje` varchar(300) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 0,
  `autor` varchar(300) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `avisos`
--

INSERT INTO `avisos` (`id`, `mensaje`, `estado`, `autor`, `fecha`) VALUES
(1, 'Reanudamos las class del 11/05/202 actividades virtuales', 1, 'Director: Mario Veliz', '2020-08-25 01:53:24'),
(2, 'Entrega de boletines  25/05/2020', 1, 'Profesor: Jhony Barrios', '2020-05-15 17:33:16'),
(10, 'suspencio de clases', 1, 'norma albarez', '2020-10-28 18:01:46'),
(11, 'suspencion de feria navideña', 1, 'lic. Jessica mamani ', '2020-10-28 18:02:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bimestre`
--

CREATE TABLE `bimestre` (
  `bimestre` varchar(20) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bimestre`
--

INSERT INTO `bimestre` (`bimestre`, `fecha_inicio`, `fecha_fin`) VALUES
('Bimestre1 ', '2020-02-04', '2020-05-04'),
('Bimestre2', '2020-10-21', '2020-12-03'),
('Bimestre3', '2020-05-04', '2020-08-04'),
('Bimestre4', '2020-10-08', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id_bitacora` int(11) NOT NULL,
  `idnota` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `ejecutor` varchar(20) NOT NULL,
  `actividad_realizada` varchar(50) NOT NULL,
  `informacion_actual` text DEFAULT NULL,
  `informacion_anterior` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id_bitacora`, `idnota`, `fecha`, `ejecutor`, `actividad_realizada`, `informacion_actual`, `informacion_anterior`) VALUES
(1, 67, '2020-11-03 23:19:59', 'root@localhost', 'Se inserto Nueva Nota', 'Informacion actual:13210000', NULL),
(2, 67, '2020-11-03 23:40:34', 'root@localhost', 'Se elimino Nota', NULL, 'Informacion anterior:13210000'),
(3, 61, '2020-11-03 23:49:33', 'root@localhost', 'Se actualizo Nota', 'Informacion anterior:32100000', 'Informacion actual:3299221133'),
(4, 61, '2020-11-09 18:17:06', 'root@localhost', 'Se actualizo Nota', 'Informacion anterior:3299221133', 'Informacion actual:3299221133'),
(5, 62, '2020-11-09 18:17:06', 'root@localhost', 'Se actualizo Nota', 'Informacion anterior:120000', 'Informacion actual:1288556660'),
(6, 63, '2020-11-09 18:17:06', 'root@localhost', 'Se actualizo Nota', 'Informacion anterior:420000', 'Informacion actual:4250567670'),
(7, 64, '2020-11-09 18:17:06', 'root@localhost', 'Se actualizo Nota', 'Informacion anterior:220000', 'Informacion actual:2260695050'),
(8, 68, '2020-11-09 18:17:36', 'root@localhost', 'Se inserto Nueva Nota', 'Informacion actual:3150000', NULL),
(9, 69, '2020-11-09 18:17:36', 'root@localhost', 'Se inserto Nueva Nota', 'Informacion actual:1155000', NULL),
(10, 70, '2020-11-09 18:17:36', 'root@localhost', 'Se inserto Nueva Nota', 'Informacion actual:4165000', NULL),
(11, 71, '2020-11-09 18:17:36', 'root@localhost', 'Se inserto Nueva Nota', 'Informacion actual:2145000', NULL),
(12, 76, '2020-11-09 18:17:59', 'root@localhost', 'Se inserto Nueva Nota', 'Informacion actual:33100000', NULL),
(13, 77, '2020-11-09 18:17:59', 'root@localhost', 'Se inserto Nueva Nota', 'Informacion actual:1380000', NULL),
(14, 78, '2020-11-09 18:17:59', 'root@localhost', 'Se inserto Nueva Nota', 'Informacion actual:4370000', NULL),
(15, 79, '2020-11-09 18:17:59', 'root@localhost', 'Se inserto Nueva Nota', 'Informacion actual:2390000', NULL),
(16, 80, '2020-11-09 18:20:05', 'root@localhost', 'Se inserto Nueva Nota', 'Informacion actual:3590000', NULL),
(17, 81, '2020-11-09 18:20:05', 'root@localhost', 'Se inserto Nueva Nota', 'Informacion actual:1550000', NULL),
(18, 82, '2020-11-09 18:20:05', 'root@localhost', 'Se inserto Nueva Nota', 'Informacion actual:4560000', NULL),
(19, 83, '2020-11-09 18:20:05', 'root@localhost', 'Se inserto Nueva Nota', 'Informacion actual:2570000', NULL),
(20, 84, '2020-11-09 18:20:23', 'root@localhost', 'Se inserto Nueva Nota', 'Informacion actual:3658000', NULL),
(21, 85, '2020-11-09 18:20:23', 'root@localhost', 'Se inserto Nueva Nota', 'Informacion actual:1670000', NULL),
(22, 86, '2020-11-09 18:20:23', 'root@localhost', 'Se inserto Nueva Nota', 'Informacion actual:4690000', NULL),
(23, 87, '2020-11-09 18:20:23', 'root@localhost', 'Se inserto Nueva Nota', 'Informacion actual:2680000', NULL),
(24, 88, '2020-11-09 18:20:44', 'root@localhost', 'Se inserto Nueva Nota', 'Informacion actual:3787000', NULL),
(25, 89, '2020-11-09 18:20:44', 'root@localhost', 'Se inserto Nueva Nota', 'Informacion actual:1776000', NULL),
(26, 90, '2020-11-09 18:20:44', 'root@localhost', 'Se inserto Nueva Nota', 'Informacion actual:4756000', NULL),
(27, 91, '2020-11-09 18:20:44', 'root@localhost', 'Se inserto Nueva Nota', 'Informacion actual:2798000', NULL),
(28, 96, '2020-11-25 12:20:57', 'root@localhost', 'Se inserto Nueva Nota', 'Informacion actual:34100000', NULL),
(29, 97, '2020-11-25 12:20:57', 'root@localhost', 'Se inserto Nueva Nota', 'Informacion actual:104100000', NULL),
(30, 98, '2020-11-25 12:20:57', 'root@localhost', 'Se inserto Nueva Nota', 'Informacion actual:64100000', NULL),
(31, 99, '2020-11-25 12:20:57', 'root@localhost', 'Se inserto Nueva Nota', 'Informacion actual:114100000', NULL),
(32, 100, '2020-11-25 12:20:57', 'root@localhost', 'Se inserto Nueva Nota', 'Informacion actual:124100000', NULL),
(33, 101, '2020-11-25 12:20:57', 'root@localhost', 'Se inserto Nueva Nota', 'Informacion actual:14100000', NULL),
(34, 102, '2020-11-25 12:20:57', 'root@localhost', 'Se inserto Nueva Nota', 'Informacion actual:44100000', NULL),
(35, 103, '2020-11-25 12:20:57', 'root@localhost', 'Se inserto Nueva Nota', 'Informacion actual:24100000', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `idcurso` int(11) NOT NULL,
  `grado` varchar(11) NOT NULL,
  `seccion` varchar(11) NOT NULL,
  `nombre` int(11) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`idcurso`, `grado`, `seccion`, `nombre`, `estatus`, `idusuario`) VALUES
(1, 'INICIAL', 'A', 9, 1, 1),
(2, 'INICIAL', 'B', 1, 1, 1),
(3, 'INICIAL', 'C', 8, 1, 1),
(4, 'PRIMERO', 'A', 2, 1, 1),
(5, 'PRIMERO', 'B', 5, 1, 1),
(6, 'PRIMERO', 'C', 7, 1, 1),
(8, 'SEGUNDO', 'B', 4, 1, 1),
(9, 'SEGUNDO', 'C', 6, 1, 1),
(10, 'TERCERO', 'A', 10, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion`
--

CREATE TABLE `gestion` (
  `gestion` year(4) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gestion`
--

INSERT INTO `gestion` (`gestion`, `estatus`) VALUES
(2020, 1),
(2021, 1),
(2022, 1),
(2023, 1),
(2024, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `horario` text DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id`, `nombre`, `descripcion`, `horario`, `fecha`) VALUES
(24, 'Kinder A', 'Kinder A: Primer piso frente Laboratorio.', '\n        \n        \n        \n        \n        \n<h1 class=\"horario-name\"><i class=\"fa fa-calendar\" aria-hidden=\"true\"></i> Kinder A</h1>\n<table class=\"table table-bordered\" id=\"thetable\">\n<thead class=\"thead\">\n<tr><th class=\"horarioheader\"><i class=\"fa fa-clock-o\"></i> Horario</th>\n<th><i class=\"fa fa-angle-right\"></i> Lunes</th><th><i class=\"fa fa-angle-right\"></i> Martes</th><th><i class=\"fa fa-angle-right\"></i> Miercoles</th><th><i class=\"fa fa-angle-right\"></i> Jueves</th><th><i class=\"fa fa-angle-right\"></i> Viernes</th>\n</tr></thead>\n<tbody><tr id=\"trf639e5c45810f973c93e25a20110fe029f202eac\">\n\n<td class=\"td-time\">\n\n<div class=\"timeblock\" id=\"parentf639e5c45810f973c93e25a20110fe029f202eac\">\n<strong id=\"dataf639e5c45810f973c93e25a20110fe029f202eac\">02:15 pm - 03:00 pm</strong>\n<button class=\"changethetime btn btn-primary btn-xs pull-right\" data-time=\"f639e5c45810f973c93e25a20110fe029f202eac\"><i class=\"fa fa-pencil\"></i></button>\n</div>\n\n<div class=\"hideedittime text-center\" id=\"editf639e5c45810f973c93e25a20110fe029f202eac\" style=\"display: none;\">\n  <input class=\"form-control\" id=\"inputf639e5c45810f973c93e25a20110fe029f202eac\" type=\"text\" value=\"02:15 pm - 03:00 pm\"><p></p><button class=\"savetime btn btn-block btn-xs btn-primary\" data-save=\"f639e5c45810f973c93e25a20110fe029f202eac\"><i class=\"fa fa-floppy-o\"></i> Guardar</button><button class=\"deleteblock btn btn-block btn-xs btn-warning\" data-block=\"f639e5c45810f973c93e25a20110fe029f202eac\"><i class=\"fa fa-ban\"></i> Eliminar </button><button class=\"canceledit btn btn-block btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Cancelar\n</button></div>\n\n</td>\n       <td class=\"td-line\">\n         <div class=\"col-sm-12 nopadding\" id=\"mp00301\"><label class=\"label-desc purple-label\">Matematicas <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button class=\"addinfo btn btn-xs btn-primary\" id=\"edit-mp00301\" style=\"display: none;\" data-row=\"mp00301\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div class=\"col-sm-12 nopadding\" id=\"mp00302\"><label class=\"label-desc purple-label\">Matematicas <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button class=\"addinfo btn btn-xs btn-primary\" id=\"edit-mp00302\" style=\"display: none;\" data-row=\"mp00302\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div class=\"col-sm-12 nopadding\" id=\"mp00303\"><label class=\"label-desc red-label\">Lenguaje <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button class=\"addinfo btn btn-xs btn-primary\" id=\"edit-mp00303\" style=\"display: none;\" data-row=\"mp00303\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div class=\"col-sm-12 nopadding\" id=\"mp00304\"><label class=\"label-desc purple-label\">Matematicas <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button class=\"addinfo btn btn-xs btn-primary\" id=\"edit-mp00304\" style=\"display: none;\" data-row=\"mp00304\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div class=\"col-sm-12 nopadding\" id=\"mp00305\"><label class=\"label-desc brow-label\">Musica <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button class=\"addinfo btn btn-xs btn-primary\" id=\"edit-mp00305\" style=\"display: none;\" data-row=\"mp00305\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	</tr><tr id=\"trf51eb468b44bd9ed76a73443617f34ec58805b17\">\n\n<td class=\"td-time\">\n\n<div class=\"timeblock\" id=\"parentf51eb468b44bd9ed76a73443617f34ec58805b17\">\n<strong id=\"dataf51eb468b44bd9ed76a73443617f34ec58805b17\">03:00 pm - 03:45 pm</strong>\n<button class=\"changethetime btn btn-primary btn-xs pull-right\" data-time=\"f51eb468b44bd9ed76a73443617f34ec58805b17\"><i class=\"fa fa-pencil\"></i></button>\n</div>\n\n<div class=\"hideedittime text-center\" id=\"editf51eb468b44bd9ed76a73443617f34ec58805b17\" style=\"display: none;\">\n  <input class=\"form-control\" id=\"inputf51eb468b44bd9ed76a73443617f34ec58805b17\" type=\"text\" value=\"03:00 pm - 03:45 pm\"><p></p><button class=\"savetime btn btn-block btn-xs btn-primary\" data-save=\"f51eb468b44bd9ed76a73443617f34ec58805b17\"><i class=\"fa fa-floppy-o\"></i> Guardar</button><button class=\"deleteblock btn btn-block btn-xs btn-warning\" data-block=\"f51eb468b44bd9ed76a73443617f34ec58805b17\"><i class=\"fa fa-ban\"></i> Eliminar </button><button class=\"canceledit btn btn-block btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Cancelar\n</button></div>\n\n</td>\n       <td class=\"td-line\">\n         <div class=\"col-sm-12 nopadding\" id=\"mp54301\"><label class=\"label-desc purple-label\">Matematicas <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button class=\"addinfo btn btn-xs btn-primary\" id=\"edit-mp54301\" style=\"display: none;\" data-row=\"mp54301\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div class=\"col-sm-12 nopadding\" id=\"mp54302\"><label class=\"label-desc purple-label\">Matematicas <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button class=\"addinfo btn btn-xs btn-primary\" id=\"edit-mp54302\" style=\"display: none;\" data-row=\"mp54302\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div class=\"col-sm-12 nopadding\" id=\"mp54303\"><label class=\"label-desc red-label\">Lenguaje <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button class=\"addinfo btn btn-xs btn-primary\" id=\"edit-mp54303\" style=\"display: none;\" data-row=\"mp54303\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div class=\"col-sm-12 nopadding\" id=\"mp54304\"><label class=\"label-desc purple-label\">Matematicas <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button class=\"addinfo btn btn-xs btn-primary\" id=\"edit-mp54304\" style=\"display: none;\" data-row=\"mp54304\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div class=\"col-sm-12 nopadding\" id=\"mp54305\"><label class=\"label-desc yellow-label\">Educacion Fisica <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button class=\"addinfo btn btn-xs btn-primary\" id=\"edit-mp54305\" style=\"display: none;\" data-row=\"mp54305\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	</tr><tr id=\"trd8e9038bb49576e0a8a538abad5680b62d76650b\">\n\n<td class=\"td-time\">\n\n<div class=\"timeblock\" id=\"parentd8e9038bb49576e0a8a538abad5680b62d76650b\">\n<strong id=\"datad8e9038bb49576e0a8a538abad5680b62d76650b\">03:45 pm - 04:30 pm</strong>\n<button class=\"changethetime btn btn-primary btn-xs pull-right\" data-time=\"d8e9038bb49576e0a8a538abad5680b62d76650b\"><i class=\"fa fa-pencil\"></i></button>\n</div>\n\n<div class=\"hideedittime text-center\" id=\"editd8e9038bb49576e0a8a538abad5680b62d76650b\" style=\"display: none;\">\n  <input class=\"form-control\" id=\"inputd8e9038bb49576e0a8a538abad5680b62d76650b\" type=\"text\" value=\"03:45 pm - 04:30 pm\"><p></p><button class=\"savetime btn btn-block btn-xs btn-primary\" data-save=\"d8e9038bb49576e0a8a538abad5680b62d76650b\"><i class=\"fa fa-floppy-o\"></i> Guardar</button><button class=\"deleteblock btn btn-block btn-xs btn-warning\" data-block=\"d8e9038bb49576e0a8a538abad5680b62d76650b\"><i class=\"fa fa-ban\"></i> Eliminar </button><button class=\"canceledit btn btn-block btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Cancelar\n</button></div>\n\n</td>\n       <td class=\"td-line\">\n         <div class=\"col-sm-12 nopadding\" id=\"mp03401\"><label class=\"label-desc red-label\">Lenguaje <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button class=\"addinfo btn btn-xs btn-primary\" id=\"edit-mp03401\" style=\"display: none;\" data-row=\"mp03401\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div class=\"col-sm-12 nopadding\" id=\"mp03402\"><label class=\"label-desc blue-label\">Ciencias Naturales <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button class=\"addinfo btn btn-xs btn-primary\" id=\"edit-mp03402\" style=\"display: none;\" data-row=\"mp03402\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div class=\"col-sm-12 nopadding\" id=\"mp03403\"><label class=\"label-desc blue-label\">Ciencias Naturales <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button class=\"addinfo btn btn-xs btn-primary\" id=\"edit-mp03403\" style=\"display: none;\" data-row=\"mp03403\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div class=\"col-sm-12 nopadding\" id=\"mp03404\"><label class=\"label-desc green-label\">Ciencias Sociales <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button class=\"addinfo btn btn-xs btn-primary\" id=\"edit-mp03404\" style=\"display: none;\" data-row=\"mp03404\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div class=\"col-sm-12 nopadding\" id=\"mp03405\"><label class=\"label-desc orange-label\">Manualidades <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button class=\"addinfo btn btn-xs btn-primary\" id=\"edit-mp03405\" style=\"display: none;\" data-row=\"mp03405\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	</tr><tr id=\"tr5acce638ada51996de5e5d2990c53f0e2e0f393b\">\n\n<td class=\"td-time\">\n\n<div class=\"timeblock\" id=\"parent5acce638ada51996de5e5d2990c53f0e2e0f393b\">\n<strong id=\"data5acce638ada51996de5e5d2990c53f0e2e0f393b\">04:30 pm - 05:15 pm</strong>\n<button class=\"changethetime btn btn-primary btn-xs pull-right\" data-time=\"5acce638ada51996de5e5d2990c53f0e2e0f393b\"><i class=\"fa fa-pencil\"></i></button>\n</div>\n\n<div class=\"hideedittime text-center\" id=\"edit5acce638ada51996de5e5d2990c53f0e2e0f393b\" style=\"display: none;\">\n  <input class=\"form-control\" id=\"input5acce638ada51996de5e5d2990c53f0e2e0f393b\" type=\"text\" value=\"04:30 pm - 05:15 pm\"><p></p><button class=\"savetime btn btn-block btn-xs btn-primary\" data-save=\"5acce638ada51996de5e5d2990c53f0e2e0f393b\"><i class=\"fa fa-floppy-o\"></i> Guardar</button><button class=\"deleteblock btn btn-block btn-xs btn-warning\" data-block=\"5acce638ada51996de5e5d2990c53f0e2e0f393b\"><i class=\"fa fa-ban\"></i> Eliminar </button><button class=\"canceledit btn btn-block btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Cancelar\n</button></div>\n\n</td>\n       <td class=\"td-line\">\n         <div class=\"col-sm-12 nopadding\" id=\"mp51501\"><label class=\"label-desc red-label\">Lenguaje <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button class=\"addinfo btn btn-xs btn-primary\" id=\"edit-mp51501\" style=\"display: none;\" data-row=\"mp51501\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div class=\"col-sm-12 nopadding\" id=\"mp51502\"><label class=\"label-desc blue-label\">Ciencias Naturales <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button class=\"addinfo btn btn-xs btn-primary\" id=\"edit-mp51502\" style=\"display: none;\" data-row=\"mp51502\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div class=\"col-sm-12 nopadding\" id=\"mp51503\"><label class=\"label-desc blue-label\">Ciencias Naturales <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button class=\"addinfo btn btn-xs btn-primary\" id=\"edit-mp51503\" style=\"display: none;\" data-row=\"mp51503\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div class=\"col-sm-12 nopadding\" id=\"mp51504\"><label class=\"label-desc green-label\">Ciencias Sociales <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button class=\"addinfo btn btn-xs btn-primary\" id=\"edit-mp51504\" style=\"display: none;\" data-row=\"mp51504\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div class=\"col-sm-12 nopadding\" id=\"mp51505\"><label class=\"label-desc gray-label\">Religion <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button class=\"addinfo btn btn-xs btn-primary\" id=\"edit-mp51505\" style=\"display: none;\" data-row=\"mp51505\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	</tr></tbody></table>\n\n<input id=\"descripcioninput\" type=\"hidden\" value=\"Kinder A: Primer piso frente Laboratorio.\">\n<input id=\"nombreinput\" type=\"hidden\" value=\"Kinder A\">\n\n<button class=\"guardarhorario btn btn-lg btn-warning pull-right\"><i class=\"fa fa-floppy-o\"></i> Guardar</button>\n\n\n        \n        \n        \n        \n        ', '2020-09-05'),
(26, 'Primero A', '1 ro ', '\n<h1 class=\"horario-name\"><i class=\"fa fa-calendar\" aria-hidden=\"true\"></i> Primero A</h1>\n<table id=\"thetable\" class=\"table table-bordered\">\n<thead class=\"thead\">\n<tr><th class=\"horarioheader\"><i class=\"fa fa-clock-o\"></i> Horario</th>\n<th><i class=\"fa fa-angle-right\"></i> Lunes</th><th><i class=\"fa fa-angle-right\"></i> Martes</th><th><i class=\"fa fa-angle-right\"></i> Miercoles</th><th><i class=\"fa fa-angle-right\"></i> Jueves</th><th><i class=\"fa fa-angle-right\"></i> Viernes</th>\n</tr></thead>\n<tbody><tr id=\"trfe53b0952bbe9b32d3c17206e94e9d05c7120cfb\">\n\n<td class=\"td-time\">\n\n<div id=\"parentfe53b0952bbe9b32d3c17206e94e9d05c7120cfb\" class=\"timeblock\">\n<strong id=\"datafe53b0952bbe9b32d3c17206e94e9d05c7120cfb\">01:20 pm - 01:55 pm</strong>\n<button data-time=\"fe53b0952bbe9b32d3c17206e94e9d05c7120cfb\" class=\"changethetime btn btn-primary btn-xs pull-right\"><i class=\"fa fa-pencil\"></i></button>\n</div>\n\n<div id=\"editfe53b0952bbe9b32d3c17206e94e9d05c7120cfb\" class=\"hideedittime text-center\">\n  <input id=\"inputfe53b0952bbe9b32d3c17206e94e9d05c7120cfb\" type=\"text\" class=\"form-control\" value=\"01:20 pm - 01:55 pm\"><p></p><button data-save=\"fe53b0952bbe9b32d3c17206e94e9d05c7120cfb\" class=\"savetime btn btn-block btn-xs btn-primary\"><i class=\"fa fa-floppy-o\"></i> Guardar</button><button data-block=\"fe53b0952bbe9b32d3c17206e94e9d05c7120cfb\" class=\"deleteblock btn btn-block btn-xs btn-warning\"><i class=\"fa fa-ban\"></i> Eliminar </button><button class=\"canceledit btn btn-block btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Cancelar\n</button></div>\n\n</td>\n       <td class=\"td-line\">\n         <div id=\"mp55101\" class=\"col-sm-12 nopadding\"><label class=\"label-desc pink-label\">Matematicas <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp55101\" data-row=\"mp55101\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp55102\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp55102\" data-row=\"mp55102\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp55103\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp55103\" data-row=\"mp55103\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp55104\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp55104\" data-row=\"mp55104\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp55105\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp55105\" data-row=\"mp55105\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	</tr><tr id=\"tr88fc0d5ab267f789e392259773bc8063f29b829c\">\n\n<td class=\"td-time\">\n\n<div id=\"parent88fc0d5ab267f789e392259773bc8063f29b829c\" class=\"timeblock\">\n<strong id=\"data88fc0d5ab267f789e392259773bc8063f29b829c\">01:55 pm - 02:30 pm</strong>\n<button data-time=\"88fc0d5ab267f789e392259773bc8063f29b829c\" class=\"changethetime btn btn-primary btn-xs pull-right\"><i class=\"fa fa-pencil\"></i></button>\n</div>\n\n<div id=\"edit88fc0d5ab267f789e392259773bc8063f29b829c\" class=\"hideedittime text-center\">\n  <input id=\"input88fc0d5ab267f789e392259773bc8063f29b829c\" type=\"text\" class=\"form-control\" value=\"01:55 pm - 02:30 pm\"><p></p><button data-save=\"88fc0d5ab267f789e392259773bc8063f29b829c\" class=\"savetime btn btn-block btn-xs btn-primary\"><i class=\"fa fa-floppy-o\"></i> Guardar</button><button data-block=\"88fc0d5ab267f789e392259773bc8063f29b829c\" class=\"deleteblock btn btn-block btn-xs btn-warning\"><i class=\"fa fa-ban\"></i> Eliminar </button><button class=\"canceledit btn btn-block btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Cancelar\n</button></div>\n\n</td>\n       <td class=\"td-line\">\n         <div id=\"mp03201\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp03201\" data-row=\"mp03201\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp03202\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp03202\" data-row=\"mp03202\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp03203\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp03203\" data-row=\"mp03203\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp03204\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp03204\" data-row=\"mp03204\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp03205\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp03205\" data-row=\"mp03205\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	</tr><tr id=\"tr16610d60a8e8f52cb1fe3520b5b710a73ae3c04b\">\n\n<td class=\"td-time\">\n\n<div id=\"parent16610d60a8e8f52cb1fe3520b5b710a73ae3c04b\" class=\"timeblock\">\n<strong id=\"data16610d60a8e8f52cb1fe3520b5b710a73ae3c04b\">02:30 pm - 03:05 pm</strong>\n<button data-time=\"16610d60a8e8f52cb1fe3520b5b710a73ae3c04b\" class=\"changethetime btn btn-primary btn-xs pull-right\"><i class=\"fa fa-pencil\"></i></button>\n</div>\n\n<div id=\"edit16610d60a8e8f52cb1fe3520b5b710a73ae3c04b\" class=\"hideedittime text-center\">\n  <input id=\"input16610d60a8e8f52cb1fe3520b5b710a73ae3c04b\" type=\"text\" class=\"form-control\" value=\"02:30 pm - 03:05 pm\"><p></p><button data-save=\"16610d60a8e8f52cb1fe3520b5b710a73ae3c04b\" class=\"savetime btn btn-block btn-xs btn-primary\"><i class=\"fa fa-floppy-o\"></i> Guardar</button><button data-block=\"16610d60a8e8f52cb1fe3520b5b710a73ae3c04b\" class=\"deleteblock btn btn-block btn-xs btn-warning\"><i class=\"fa fa-ban\"></i> Eliminar </button><button class=\"canceledit btn btn-block btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Cancelar\n</button></div>\n\n</td>\n       <td class=\"td-line\">\n         <div id=\"mp50301\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp50301\" data-row=\"mp50301\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp50302\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp50302\" data-row=\"mp50302\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp50303\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp50303\" data-row=\"mp50303\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp50304\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp50304\" data-row=\"mp50304\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp50305\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp50305\" data-row=\"mp50305\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	</tr><tr id=\"tr6e74483bfc0537f79af38a1ab752c9a1102bfdfc\">\n\n<td class=\"td-time\">\n\n<div id=\"parent6e74483bfc0537f79af38a1ab752c9a1102bfdfc\" class=\"timeblock\">\n<strong id=\"data6e74483bfc0537f79af38a1ab752c9a1102bfdfc\">03:05 pm - 03:40 pm</strong>\n<button data-time=\"6e74483bfc0537f79af38a1ab752c9a1102bfdfc\" class=\"changethetime btn btn-primary btn-xs pull-right\"><i class=\"fa fa-pencil\"></i></button>\n</div>\n\n<div id=\"edit6e74483bfc0537f79af38a1ab752c9a1102bfdfc\" class=\"hideedittime text-center\">\n  <input id=\"input6e74483bfc0537f79af38a1ab752c9a1102bfdfc\" type=\"text\" class=\"form-control\" value=\"03:05 pm - 03:40 pm\"><p></p><button data-save=\"6e74483bfc0537f79af38a1ab752c9a1102bfdfc\" class=\"savetime btn btn-block btn-xs btn-primary\"><i class=\"fa fa-floppy-o\"></i> Guardar</button><button data-block=\"6e74483bfc0537f79af38a1ab752c9a1102bfdfc\" class=\"deleteblock btn btn-block btn-xs btn-warning\"><i class=\"fa fa-ban\"></i> Eliminar </button><button class=\"canceledit btn btn-block btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Cancelar\n</button></div>\n\n</td>\n       <td class=\"td-line\">\n         <div id=\"mp04301\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp04301\" data-row=\"mp04301\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp04302\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp04302\" data-row=\"mp04302\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp04303\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp04303\" data-row=\"mp04303\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp04304\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp04304\" data-row=\"mp04304\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp04305\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp04305\" data-row=\"mp04305\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	</tr><tr id=\"trd2760c0c827135a5a0cc705f314c4dabb8634834\">\n\n<td class=\"td-time\">\n\n<div id=\"parentd2760c0c827135a5a0cc705f314c4dabb8634834\" class=\"timeblock\">\n<strong id=\"datad2760c0c827135a5a0cc705f314c4dabb8634834\">03:40 pm - 04:15 pm</strong>\n<button data-time=\"d2760c0c827135a5a0cc705f314c4dabb8634834\" class=\"changethetime btn btn-primary btn-xs pull-right\"><i class=\"fa fa-pencil\"></i></button>\n</div>\n\n<div id=\"editd2760c0c827135a5a0cc705f314c4dabb8634834\" class=\"hideedittime text-center\">\n  <input id=\"inputd2760c0c827135a5a0cc705f314c4dabb8634834\" type=\"text\" class=\"form-control\" value=\"03:40 pm - 04:15 pm\"><p></p><button data-save=\"d2760c0c827135a5a0cc705f314c4dabb8634834\" class=\"savetime btn btn-block btn-xs btn-primary\"><i class=\"fa fa-floppy-o\"></i> Guardar</button><button data-block=\"d2760c0c827135a5a0cc705f314c4dabb8634834\" class=\"deleteblock btn btn-block btn-xs btn-warning\"><i class=\"fa fa-ban\"></i> Eliminar </button><button class=\"canceledit btn btn-block btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Cancelar\n</button></div>\n\n</td>\n       <td class=\"td-line\">\n         <div id=\"mp51401\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp51401\" data-row=\"mp51401\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp51402\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp51402\" data-row=\"mp51402\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp51403\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp51403\" data-row=\"mp51403\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp51404\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp51404\" data-row=\"mp51404\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp51405\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp51405\" data-row=\"mp51405\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	</tr><tr id=\"tr7409c7ceb138b7db299845edd6fc22ac60246344\">\n\n<td class=\"td-time\">\n\n<div id=\"parent7409c7ceb138b7db299845edd6fc22ac60246344\" class=\"timeblock\">\n<strong id=\"data7409c7ceb138b7db299845edd6fc22ac60246344\">04:15 pm - 04:50 pm</strong>\n<button data-time=\"7409c7ceb138b7db299845edd6fc22ac60246344\" class=\"changethetime btn btn-primary btn-xs pull-right\"><i class=\"fa fa-pencil\"></i></button>\n</div>\n\n<div id=\"edit7409c7ceb138b7db299845edd6fc22ac60246344\" class=\"hideedittime text-center\">\n  <input id=\"input7409c7ceb138b7db299845edd6fc22ac60246344\" type=\"text\" class=\"form-control\" value=\"04:15 pm - 04:50 pm\"><p></p><button data-save=\"7409c7ceb138b7db299845edd6fc22ac60246344\" class=\"savetime btn btn-block btn-xs btn-primary\"><i class=\"fa fa-floppy-o\"></i> Guardar</button><button data-block=\"7409c7ceb138b7db299845edd6fc22ac60246344\" class=\"deleteblock btn btn-block btn-xs btn-warning\"><i class=\"fa fa-ban\"></i> Eliminar </button><button class=\"canceledit btn btn-block btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Cancelar\n</button></div>\n\n</td>\n       <td class=\"td-line\">\n         <div id=\"mp05401\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp05401\" data-row=\"mp05401\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp05402\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp05402\" data-row=\"mp05402\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp05403\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp05403\" data-row=\"mp05403\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp05404\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp05404\" data-row=\"mp05404\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp05405\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp05405\" data-row=\"mp05405\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	</tr><tr id=\"tra6b594d2d45a5092528dcff526d3459474fa5109\">\n\n<td class=\"td-time\">\n\n<div id=\"parenta6b594d2d45a5092528dcff526d3459474fa5109\" class=\"timeblock\">\n<strong id=\"dataa6b594d2d45a5092528dcff526d3459474fa5109\">04:50 pm - 05:25 pm</strong>\n<button data-time=\"a6b594d2d45a5092528dcff526d3459474fa5109\" class=\"changethetime btn btn-primary btn-xs pull-right\"><i class=\"fa fa-pencil\"></i></button>\n</div>\n\n<div id=\"edita6b594d2d45a5092528dcff526d3459474fa5109\" class=\"hideedittime text-center\">\n  <input id=\"inputa6b594d2d45a5092528dcff526d3459474fa5109\" type=\"text\" class=\"form-control\" value=\"04:50 pm - 05:25 pm\"><p></p><button data-save=\"a6b594d2d45a5092528dcff526d3459474fa5109\" class=\"savetime btn btn-block btn-xs btn-primary\"><i class=\"fa fa-floppy-o\"></i> Guardar</button><button data-block=\"a6b594d2d45a5092528dcff526d3459474fa5109\" class=\"deleteblock btn btn-block btn-xs btn-warning\"><i class=\"fa fa-ban\"></i> Eliminar </button><button class=\"canceledit btn btn-block btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Cancelar\n</button></div>\n\n</td>\n       <td class=\"td-line\">\n         <div id=\"mp52501\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp52501\" data-row=\"mp52501\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp52502\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp52502\" data-row=\"mp52502\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp52503\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp52503\" data-row=\"mp52503\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp52504\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp52504\" data-row=\"mp52504\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp52505\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp52505\" data-row=\"mp52505\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	</tr><tr id=\"tr87db17804201c250756021044fbb537930b0f98e\">\n\n<td class=\"td-time\">\n\n<div id=\"parent87db17804201c250756021044fbb537930b0f98e\" class=\"timeblock\">\n<strong id=\"data87db17804201c250756021044fbb537930b0f98e\">05:25 pm - 06:00 pm</strong>\n<button data-time=\"87db17804201c250756021044fbb537930b0f98e\" class=\"changethetime btn btn-primary btn-xs pull-right\"><i class=\"fa fa-pencil\"></i></button>\n</div>\n\n<div id=\"edit87db17804201c250756021044fbb537930b0f98e\" class=\"hideedittime text-center\">\n  <input id=\"input87db17804201c250756021044fbb537930b0f98e\" type=\"text\" class=\"form-control\" value=\"05:25 pm - 06:00 pm\"><p></p><button data-save=\"87db17804201c250756021044fbb537930b0f98e\" class=\"savetime btn btn-block btn-xs btn-primary\"><i class=\"fa fa-floppy-o\"></i> Guardar</button><button data-block=\"87db17804201c250756021044fbb537930b0f98e\" class=\"deleteblock btn btn-block btn-xs btn-warning\"><i class=\"fa fa-ban\"></i> Eliminar </button><button class=\"canceledit btn btn-block btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Cancelar\n</button></div>\n\n</td>\n       <td class=\"td-line\">\n         <div id=\"mp00601\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp00601\" data-row=\"mp00601\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp00602\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp00602\" data-row=\"mp00602\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp00603\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp00603\" data-row=\"mp00603\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp00604\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp00604\" data-row=\"mp00604\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp00605\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp00605\" data-row=\"mp00605\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	</tr></tbody></table>\n\n<input type=\"hidden\" id=\"descripcioninput\" value=\"1 ro \" a\"\"=\"\">\n<input type=\"hidden\" id=\"nombreinput\" value=\"Primero A\">\n\n<button class=\"guardarhorario btn btn-lg btn-warning pull-right\"><i class=\"fa fa-floppy-o\"></i> Guardar</button>\n\n', '2020-11-13');
INSERT INTO `horarios` (`id`, `nombre`, `descripcion`, `horario`, `fecha`) VALUES
(27, 'Segundo A', '2 do ', '\n<h1 class=\"horario-name\"><i class=\"fa fa-calendar\" aria-hidden=\"true\"></i> Segundo A</h1>\n<table id=\"thetable\" class=\"table table-bordered\">\n<thead class=\"thead\">\n<tr><th class=\"horarioheader\"><i class=\"fa fa-clock-o\"></i> Horario</th>\n<th><i class=\"fa fa-angle-right\"></i> Lunes</th><th><i class=\"fa fa-angle-right\"></i> Martes</th><th><i class=\"fa fa-angle-right\"></i> Miercoles</th><th><i class=\"fa fa-angle-right\"></i> Jueves</th><th><i class=\"fa fa-angle-right\"></i> Viernes</th>\n</tr></thead>\n<tbody><tr id=\"trfe53b0952bbe9b32d3c17206e94e9d05c7120cfb\">\n\n<td class=\"td-time\">\n\n<div id=\"parentfe53b0952bbe9b32d3c17206e94e9d05c7120cfb\" class=\"timeblock\">\n<strong id=\"datafe53b0952bbe9b32d3c17206e94e9d05c7120cfb\">01:20 pm - 01:55 pm</strong>\n<button data-time=\"fe53b0952bbe9b32d3c17206e94e9d05c7120cfb\" class=\"changethetime btn btn-primary btn-xs pull-right\"><i class=\"fa fa-pencil\"></i></button>\n</div>\n\n<div id=\"editfe53b0952bbe9b32d3c17206e94e9d05c7120cfb\" class=\"hideedittime text-center\">\n  <input id=\"inputfe53b0952bbe9b32d3c17206e94e9d05c7120cfb\" type=\"text\" class=\"form-control\" value=\"01:20 pm - 01:55 pm\"><p></p><button data-save=\"fe53b0952bbe9b32d3c17206e94e9d05c7120cfb\" class=\"savetime btn btn-block btn-xs btn-primary\"><i class=\"fa fa-floppy-o\"></i> Guardar</button><button data-block=\"fe53b0952bbe9b32d3c17206e94e9d05c7120cfb\" class=\"deleteblock btn btn-block btn-xs btn-warning\"><i class=\"fa fa-ban\"></i> Eliminar </button><button class=\"canceledit btn btn-block btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Cancelar\n</button></div>\n\n</td>\n       <td class=\"td-line\">\n         <div id=\"mp55101\" class=\"col-sm-12 nopadding\"><label class=\"label-desc green-label\">Lenguaje <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp55101\" data-row=\"mp55101\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp55102\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp55102\" data-row=\"mp55102\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp55103\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp55103\" data-row=\"mp55103\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp55104\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp55104\" data-row=\"mp55104\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp55105\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp55105\" data-row=\"mp55105\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	</tr><tr id=\"tr88fc0d5ab267f789e392259773bc8063f29b829c\">\n\n<td class=\"td-time\">\n\n<div id=\"parent88fc0d5ab267f789e392259773bc8063f29b829c\" class=\"timeblock\">\n<strong id=\"data88fc0d5ab267f789e392259773bc8063f29b829c\">01:55 pm - 02:30 pm</strong>\n<button data-time=\"88fc0d5ab267f789e392259773bc8063f29b829c\" class=\"changethetime btn btn-primary btn-xs pull-right\"><i class=\"fa fa-pencil\"></i></button>\n</div>\n\n<div id=\"edit88fc0d5ab267f789e392259773bc8063f29b829c\" class=\"hideedittime text-center\">\n  <input id=\"input88fc0d5ab267f789e392259773bc8063f29b829c\" type=\"text\" class=\"form-control\" value=\"01:55 pm - 02:30 pm\"><p></p><button data-save=\"88fc0d5ab267f789e392259773bc8063f29b829c\" class=\"savetime btn btn-block btn-xs btn-primary\"><i class=\"fa fa-floppy-o\"></i> Guardar</button><button data-block=\"88fc0d5ab267f789e392259773bc8063f29b829c\" class=\"deleteblock btn btn-block btn-xs btn-warning\"><i class=\"fa fa-ban\"></i> Eliminar </button><button class=\"canceledit btn btn-block btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Cancelar\n</button></div>\n\n</td>\n       <td class=\"td-line\">\n         <div id=\"mp03201\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp03201\" data-row=\"mp03201\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp03202\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp03202\" data-row=\"mp03202\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp03203\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp03203\" data-row=\"mp03203\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp03204\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp03204\" data-row=\"mp03204\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp03205\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp03205\" data-row=\"mp03205\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	</tr><tr id=\"tr16610d60a8e8f52cb1fe3520b5b710a73ae3c04b\">\n\n<td class=\"td-time\">\n\n<div id=\"parent16610d60a8e8f52cb1fe3520b5b710a73ae3c04b\" class=\"timeblock\">\n<strong id=\"data16610d60a8e8f52cb1fe3520b5b710a73ae3c04b\">02:30 pm - 03:05 pm</strong>\n<button data-time=\"16610d60a8e8f52cb1fe3520b5b710a73ae3c04b\" class=\"changethetime btn btn-primary btn-xs pull-right\"><i class=\"fa fa-pencil\"></i></button>\n</div>\n\n<div id=\"edit16610d60a8e8f52cb1fe3520b5b710a73ae3c04b\" class=\"hideedittime text-center\">\n  <input id=\"input16610d60a8e8f52cb1fe3520b5b710a73ae3c04b\" type=\"text\" class=\"form-control\" value=\"02:30 pm - 03:05 pm\"><p></p><button data-save=\"16610d60a8e8f52cb1fe3520b5b710a73ae3c04b\" class=\"savetime btn btn-block btn-xs btn-primary\"><i class=\"fa fa-floppy-o\"></i> Guardar</button><button data-block=\"16610d60a8e8f52cb1fe3520b5b710a73ae3c04b\" class=\"deleteblock btn btn-block btn-xs btn-warning\"><i class=\"fa fa-ban\"></i> Eliminar </button><button class=\"canceledit btn btn-block btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Cancelar\n</button></div>\n\n</td>\n       <td class=\"td-line\">\n         <div id=\"mp50301\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp50301\" data-row=\"mp50301\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp50302\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp50302\" data-row=\"mp50302\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp50303\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp50303\" data-row=\"mp50303\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp50304\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp50304\" data-row=\"mp50304\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp50305\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp50305\" data-row=\"mp50305\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	</tr><tr id=\"tr6e74483bfc0537f79af38a1ab752c9a1102bfdfc\">\n\n<td class=\"td-time\">\n\n<div id=\"parent6e74483bfc0537f79af38a1ab752c9a1102bfdfc\" class=\"timeblock\">\n<strong id=\"data6e74483bfc0537f79af38a1ab752c9a1102bfdfc\">03:05 pm - 03:40 pm</strong>\n<button data-time=\"6e74483bfc0537f79af38a1ab752c9a1102bfdfc\" class=\"changethetime btn btn-primary btn-xs pull-right\"><i class=\"fa fa-pencil\"></i></button>\n</div>\n\n<div id=\"edit6e74483bfc0537f79af38a1ab752c9a1102bfdfc\" class=\"hideedittime text-center\">\n  <input id=\"input6e74483bfc0537f79af38a1ab752c9a1102bfdfc\" type=\"text\" class=\"form-control\" value=\"03:05 pm - 03:40 pm\"><p></p><button data-save=\"6e74483bfc0537f79af38a1ab752c9a1102bfdfc\" class=\"savetime btn btn-block btn-xs btn-primary\"><i class=\"fa fa-floppy-o\"></i> Guardar</button><button data-block=\"6e74483bfc0537f79af38a1ab752c9a1102bfdfc\" class=\"deleteblock btn btn-block btn-xs btn-warning\"><i class=\"fa fa-ban\"></i> Eliminar </button><button class=\"canceledit btn btn-block btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Cancelar\n</button></div>\n\n</td>\n       <td class=\"td-line\">\n         <div id=\"mp04301\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp04301\" data-row=\"mp04301\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp04302\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp04302\" data-row=\"mp04302\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp04303\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp04303\" data-row=\"mp04303\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp04304\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp04304\" data-row=\"mp04304\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp04305\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp04305\" data-row=\"mp04305\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	</tr><tr id=\"trd2760c0c827135a5a0cc705f314c4dabb8634834\">\n\n<td class=\"td-time\">\n\n<div id=\"parentd2760c0c827135a5a0cc705f314c4dabb8634834\" class=\"timeblock\">\n<strong id=\"datad2760c0c827135a5a0cc705f314c4dabb8634834\">03:40 pm - 04:15 pm</strong>\n<button data-time=\"d2760c0c827135a5a0cc705f314c4dabb8634834\" class=\"changethetime btn btn-primary btn-xs pull-right\"><i class=\"fa fa-pencil\"></i></button>\n</div>\n\n<div id=\"editd2760c0c827135a5a0cc705f314c4dabb8634834\" class=\"hideedittime text-center\">\n  <input id=\"inputd2760c0c827135a5a0cc705f314c4dabb8634834\" type=\"text\" class=\"form-control\" value=\"03:40 pm - 04:15 pm\"><p></p><button data-save=\"d2760c0c827135a5a0cc705f314c4dabb8634834\" class=\"savetime btn btn-block btn-xs btn-primary\"><i class=\"fa fa-floppy-o\"></i> Guardar</button><button data-block=\"d2760c0c827135a5a0cc705f314c4dabb8634834\" class=\"deleteblock btn btn-block btn-xs btn-warning\"><i class=\"fa fa-ban\"></i> Eliminar </button><button class=\"canceledit btn btn-block btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Cancelar\n</button></div>\n\n</td>\n       <td class=\"td-line\">\n         <div id=\"mp51401\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp51401\" data-row=\"mp51401\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp51402\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp51402\" data-row=\"mp51402\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp51403\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp51403\" data-row=\"mp51403\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp51404\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp51404\" data-row=\"mp51404\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp51405\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp51405\" data-row=\"mp51405\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	</tr><tr id=\"tr7409c7ceb138b7db299845edd6fc22ac60246344\">\n\n<td class=\"td-time\">\n\n<div id=\"parent7409c7ceb138b7db299845edd6fc22ac60246344\" class=\"timeblock\">\n<strong id=\"data7409c7ceb138b7db299845edd6fc22ac60246344\">04:15 pm - 04:50 pm</strong>\n<button data-time=\"7409c7ceb138b7db299845edd6fc22ac60246344\" class=\"changethetime btn btn-primary btn-xs pull-right\"><i class=\"fa fa-pencil\"></i></button>\n</div>\n\n<div id=\"edit7409c7ceb138b7db299845edd6fc22ac60246344\" class=\"hideedittime text-center\">\n  <input id=\"input7409c7ceb138b7db299845edd6fc22ac60246344\" type=\"text\" class=\"form-control\" value=\"04:15 pm - 04:50 pm\"><p></p><button data-save=\"7409c7ceb138b7db299845edd6fc22ac60246344\" class=\"savetime btn btn-block btn-xs btn-primary\"><i class=\"fa fa-floppy-o\"></i> Guardar</button><button data-block=\"7409c7ceb138b7db299845edd6fc22ac60246344\" class=\"deleteblock btn btn-block btn-xs btn-warning\"><i class=\"fa fa-ban\"></i> Eliminar </button><button class=\"canceledit btn btn-block btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Cancelar\n</button></div>\n\n</td>\n       <td class=\"td-line\">\n         <div id=\"mp05401\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp05401\" data-row=\"mp05401\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp05402\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp05402\" data-row=\"mp05402\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp05403\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp05403\" data-row=\"mp05403\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp05404\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp05404\" data-row=\"mp05404\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp05405\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp05405\" data-row=\"mp05405\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	</tr><tr id=\"tra6b594d2d45a5092528dcff526d3459474fa5109\">\n\n<td class=\"td-time\">\n\n<div id=\"parenta6b594d2d45a5092528dcff526d3459474fa5109\" class=\"timeblock\">\n<strong id=\"dataa6b594d2d45a5092528dcff526d3459474fa5109\">04:50 pm - 05:25 pm</strong>\n<button data-time=\"a6b594d2d45a5092528dcff526d3459474fa5109\" class=\"changethetime btn btn-primary btn-xs pull-right\"><i class=\"fa fa-pencil\"></i></button>\n</div>\n\n<div id=\"edita6b594d2d45a5092528dcff526d3459474fa5109\" class=\"hideedittime text-center\">\n  <input id=\"inputa6b594d2d45a5092528dcff526d3459474fa5109\" type=\"text\" class=\"form-control\" value=\"04:50 pm - 05:25 pm\"><p></p><button data-save=\"a6b594d2d45a5092528dcff526d3459474fa5109\" class=\"savetime btn btn-block btn-xs btn-primary\"><i class=\"fa fa-floppy-o\"></i> Guardar</button><button data-block=\"a6b594d2d45a5092528dcff526d3459474fa5109\" class=\"deleteblock btn btn-block btn-xs btn-warning\"><i class=\"fa fa-ban\"></i> Eliminar </button><button class=\"canceledit btn btn-block btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Cancelar\n</button></div>\n\n</td>\n       <td class=\"td-line\">\n         <div id=\"mp52501\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp52501\" data-row=\"mp52501\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp52502\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp52502\" data-row=\"mp52502\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp52503\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp52503\" data-row=\"mp52503\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp52504\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp52504\" data-row=\"mp52504\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp52505\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp52505\" data-row=\"mp52505\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	</tr><tr id=\"tr87db17804201c250756021044fbb537930b0f98e\">\n\n<td class=\"td-time\">\n\n<div id=\"parent87db17804201c250756021044fbb537930b0f98e\" class=\"timeblock\">\n<strong id=\"data87db17804201c250756021044fbb537930b0f98e\">05:25 pm - 06:00 pm</strong>\n<button data-time=\"87db17804201c250756021044fbb537930b0f98e\" class=\"changethetime btn btn-primary btn-xs pull-right\"><i class=\"fa fa-pencil\"></i></button>\n</div>\n\n<div id=\"edit87db17804201c250756021044fbb537930b0f98e\" class=\"hideedittime text-center\">\n  <input id=\"input87db17804201c250756021044fbb537930b0f98e\" type=\"text\" class=\"form-control\" value=\"05:25 pm - 06:00 pm\"><p></p><button data-save=\"87db17804201c250756021044fbb537930b0f98e\" class=\"savetime btn btn-block btn-xs btn-primary\"><i class=\"fa fa-floppy-o\"></i> Guardar</button><button data-block=\"87db17804201c250756021044fbb537930b0f98e\" class=\"deleteblock btn btn-block btn-xs btn-warning\"><i class=\"fa fa-ban\"></i> Eliminar </button><button class=\"canceledit btn btn-block btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Cancelar\n</button></div>\n\n</td>\n       <td class=\"td-line\">\n         <div id=\"mp00601\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp00601\" data-row=\"mp00601\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp00602\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp00602\" data-row=\"mp00602\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp00603\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp00603\" data-row=\"mp00603\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp00604\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp00604\" data-row=\"mp00604\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp00605\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp00605\" data-row=\"mp00605\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	</tr></tbody></table>\n\n<input type=\"hidden\" id=\"descripcioninput\" value=\"2 do \" a\":=\"\" ubicación=\"\" lado=\"\" izquierdo=\"\" puerta=\"\" principal\"=\"\">\n<input type=\"hidden\" id=\"nombreinput\" value=\"Segundo A\">\n\n<button class=\"guardarhorario btn btn-lg btn-warning pull-right\"><i class=\"fa fa-floppy-o\"></i> Guardar</button>\n\n', '2020-11-13'),
(28, 'Tercero A', '3 ro ', '\n<h1 class=\"horario-name\"><i class=\"fa fa-calendar\" aria-hidden=\"true\"></i> Tercero A</h1>\n<table id=\"thetable\" class=\"table table-bordered\">\n<thead class=\"thead\">\n<tr><th class=\"horarioheader\"><i class=\"fa fa-clock-o\"></i> Horario</th>\n<th><i class=\"fa fa-angle-right\"></i> Lunes</th><th><i class=\"fa fa-angle-right\"></i> Martes</th><th><i class=\"fa fa-angle-right\"></i> Miercoles</th><th><i class=\"fa fa-angle-right\"></i> Jueves</th><th><i class=\"fa fa-angle-right\"></i> Viernes</th>\n</tr></thead>\n<tbody><tr id=\"trfe53b0952bbe9b32d3c17206e94e9d05c7120cfb\">\n\n<td class=\"td-time\">\n\n<div id=\"parentfe53b0952bbe9b32d3c17206e94e9d05c7120cfb\" class=\"timeblock\">\n<strong id=\"datafe53b0952bbe9b32d3c17206e94e9d05c7120cfb\">01:20 pm - 02:05 pm</strong>\n<button data-time=\"fe53b0952bbe9b32d3c17206e94e9d05c7120cfb\" class=\"changethetime btn btn-primary btn-xs pull-right\"><i class=\"fa fa-pencil\"></i></button>\n</div>\n\n<div id=\"editfe53b0952bbe9b32d3c17206e94e9d05c7120cfb\" class=\"hideedittime text-center\">\n  <input id=\"inputfe53b0952bbe9b32d3c17206e94e9d05c7120cfb\" type=\"text\" class=\"form-control\" value=\"01:20 pm - 02:05 pm\"><p></p><button data-save=\"fe53b0952bbe9b32d3c17206e94e9d05c7120cfb\" class=\"savetime btn btn-block btn-xs btn-primary\"><i class=\"fa fa-floppy-o\"></i> Guardar</button><button data-block=\"fe53b0952bbe9b32d3c17206e94e9d05c7120cfb\" class=\"deleteblock btn btn-block btn-xs btn-warning\"><i class=\"fa fa-ban\"></i> Eliminar </button><button class=\"canceledit btn btn-block btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Cancelar\n</button></div>\n\n</td>\n       <td class=\"td-line\">\n         <div id=\"mp50201\" class=\"col-sm-12 nopadding\"><label class=\"label-desc gray-label\">Musica <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp50201\" data-row=\"mp50201\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp50202\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp50202\" data-row=\"mp50202\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp50203\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp50203\" data-row=\"mp50203\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp50204\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp50204\" data-row=\"mp50204\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp50205\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp50205\" data-row=\"mp50205\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	</tr><tr id=\"tr0d10e8268a9d3765c1c976483a43a486b870be3a\">\n\n<td class=\"td-time\">\n\n<div id=\"parent0d10e8268a9d3765c1c976483a43a486b870be3a\" class=\"timeblock\">\n<strong id=\"data0d10e8268a9d3765c1c976483a43a486b870be3a\">02:05 pm - 02:50 pm</strong>\n<button data-time=\"0d10e8268a9d3765c1c976483a43a486b870be3a\" class=\"changethetime btn btn-primary btn-xs pull-right\"><i class=\"fa fa-pencil\"></i></button>\n</div>\n\n<div id=\"edit0d10e8268a9d3765c1c976483a43a486b870be3a\" class=\"hideedittime text-center\">\n  <input id=\"input0d10e8268a9d3765c1c976483a43a486b870be3a\" type=\"text\" class=\"form-control\" value=\"02:05 pm - 02:50 pm\"><p></p><button data-save=\"0d10e8268a9d3765c1c976483a43a486b870be3a\" class=\"savetime btn btn-block btn-xs btn-primary\"><i class=\"fa fa-floppy-o\"></i> Guardar</button><button data-block=\"0d10e8268a9d3765c1c976483a43a486b870be3a\" class=\"deleteblock btn btn-block btn-xs btn-warning\"><i class=\"fa fa-ban\"></i> Eliminar </button><button class=\"canceledit btn btn-block btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Cancelar\n</button></div>\n\n</td>\n       <td class=\"td-line\">\n         <div id=\"mp05201\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp05201\" data-row=\"mp05201\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp05202\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp05202\" data-row=\"mp05202\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp05203\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp05203\" data-row=\"mp05203\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp05204\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp05204\" data-row=\"mp05204\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp05205\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp05205\" data-row=\"mp05205\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	</tr><tr id=\"tre0a2fef8575556e0804a5b6494dae78ae71423d8\">\n\n<td class=\"td-time\">\n\n<div id=\"parente0a2fef8575556e0804a5b6494dae78ae71423d8\" class=\"timeblock\">\n<strong id=\"datae0a2fef8575556e0804a5b6494dae78ae71423d8\">02:50 pm - 03:35 pm</strong>\n<button data-time=\"e0a2fef8575556e0804a5b6494dae78ae71423d8\" class=\"changethetime btn btn-primary btn-xs pull-right\"><i class=\"fa fa-pencil\"></i></button>\n</div>\n\n<div id=\"edite0a2fef8575556e0804a5b6494dae78ae71423d8\" class=\"hideedittime text-center\">\n  <input id=\"inpute0a2fef8575556e0804a5b6494dae78ae71423d8\" type=\"text\" class=\"form-control\" value=\"02:50 pm - 03:35 pm\"><p></p><button data-save=\"e0a2fef8575556e0804a5b6494dae78ae71423d8\" class=\"savetime btn btn-block btn-xs btn-primary\"><i class=\"fa fa-floppy-o\"></i> Guardar</button><button data-block=\"e0a2fef8575556e0804a5b6494dae78ae71423d8\" class=\"deleteblock btn btn-block btn-xs btn-warning\"><i class=\"fa fa-ban\"></i> Eliminar </button><button class=\"canceledit btn btn-block btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Cancelar\n</button></div>\n\n</td>\n       <td class=\"td-line\">\n         <div id=\"mp53301\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp53301\" data-row=\"mp53301\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp53302\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp53302\" data-row=\"mp53302\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp53303\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp53303\" data-row=\"mp53303\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp53304\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp53304\" data-row=\"mp53304\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp53305\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp53305\" data-row=\"mp53305\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	</tr><tr id=\"tr94314d42d60b6421d1aabc10f3cc301b2140e207\">\n\n<td class=\"td-time\">\n\n<div id=\"parent94314d42d60b6421d1aabc10f3cc301b2140e207\" class=\"timeblock\">\n<strong id=\"data94314d42d60b6421d1aabc10f3cc301b2140e207\">03:35 pm - 04:20 pm</strong>\n<button data-time=\"94314d42d60b6421d1aabc10f3cc301b2140e207\" class=\"changethetime btn btn-primary btn-xs pull-right\"><i class=\"fa fa-pencil\"></i></button>\n</div>\n\n<div id=\"edit94314d42d60b6421d1aabc10f3cc301b2140e207\" class=\"hideedittime text-center\">\n  <input id=\"input94314d42d60b6421d1aabc10f3cc301b2140e207\" type=\"text\" class=\"form-control\" value=\"03:35 pm - 04:20 pm\"><p></p><button data-save=\"94314d42d60b6421d1aabc10f3cc301b2140e207\" class=\"savetime btn btn-block btn-xs btn-primary\"><i class=\"fa fa-floppy-o\"></i> Guardar</button><button data-block=\"94314d42d60b6421d1aabc10f3cc301b2140e207\" class=\"deleteblock btn btn-block btn-xs btn-warning\"><i class=\"fa fa-ban\"></i> Eliminar </button><button class=\"canceledit btn btn-block btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Cancelar\n</button></div>\n\n</td>\n       <td class=\"td-line\">\n         <div id=\"mp02401\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp02401\" data-row=\"mp02401\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp02402\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp02402\" data-row=\"mp02402\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp02403\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp02403\" data-row=\"mp02403\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp02404\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp02404\" data-row=\"mp02404\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp02405\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp02405\" data-row=\"mp02405\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	</tr><tr id=\"trdf32b920ea2d549ef100783b185c3b8097100483\">\n\n<td class=\"td-time\">\n\n<div id=\"parentdf32b920ea2d549ef100783b185c3b8097100483\" class=\"timeblock\">\n<strong id=\"datadf32b920ea2d549ef100783b185c3b8097100483\">04:20 pm - 05:05 pm</strong>\n<button data-time=\"df32b920ea2d549ef100783b185c3b8097100483\" class=\"changethetime btn btn-primary btn-xs pull-right\"><i class=\"fa fa-pencil\"></i></button>\n</div>\n\n<div id=\"editdf32b920ea2d549ef100783b185c3b8097100483\" class=\"hideedittime text-center\">\n  <input id=\"inputdf32b920ea2d549ef100783b185c3b8097100483\" type=\"text\" class=\"form-control\" value=\"04:20 pm - 05:05 pm\"><p></p><button data-save=\"df32b920ea2d549ef100783b185c3b8097100483\" class=\"savetime btn btn-block btn-xs btn-primary\"><i class=\"fa fa-floppy-o\"></i> Guardar</button><button data-block=\"df32b920ea2d549ef100783b185c3b8097100483\" class=\"deleteblock btn btn-block btn-xs btn-warning\"><i class=\"fa fa-ban\"></i> Eliminar </button><button class=\"canceledit btn btn-block btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Cancelar\n</button></div>\n\n</td>\n       <td class=\"td-line\">\n         <div id=\"mp50501\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp50501\" data-row=\"mp50501\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp50502\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp50502\" data-row=\"mp50502\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp50503\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp50503\" data-row=\"mp50503\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp50504\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp50504\" data-row=\"mp50504\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp50505\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp50505\" data-row=\"mp50505\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	</tr><tr id=\"trc05995e5bc84a88bd0060f985232006cef77d5fe\">\n\n<td class=\"td-time\">\n\n<div id=\"parentc05995e5bc84a88bd0060f985232006cef77d5fe\" class=\"timeblock\">\n<strong id=\"datac05995e5bc84a88bd0060f985232006cef77d5fe\">05:05 pm - 05:50 pm</strong>\n<button data-time=\"c05995e5bc84a88bd0060f985232006cef77d5fe\" class=\"changethetime btn btn-primary btn-xs pull-right\"><i class=\"fa fa-pencil\"></i></button>\n</div>\n\n<div id=\"editc05995e5bc84a88bd0060f985232006cef77d5fe\" class=\"hideedittime text-center\">\n  <input id=\"inputc05995e5bc84a88bd0060f985232006cef77d5fe\" type=\"text\" class=\"form-control\" value=\"05:05 pm - 05:50 pm\"><p></p><button data-save=\"c05995e5bc84a88bd0060f985232006cef77d5fe\" class=\"savetime btn btn-block btn-xs btn-primary\"><i class=\"fa fa-floppy-o\"></i> Guardar</button><button data-block=\"c05995e5bc84a88bd0060f985232006cef77d5fe\" class=\"deleteblock btn btn-block btn-xs btn-warning\"><i class=\"fa fa-ban\"></i> Eliminar </button><button class=\"canceledit btn btn-block btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Cancelar\n</button></div>\n\n</td>\n       <td class=\"td-line\">\n         <div id=\"mp05501\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp05501\" data-row=\"mp05501\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp05502\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp05502\" data-row=\"mp05502\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp05503\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp05503\" data-row=\"mp05503\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp05504\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp05504\" data-row=\"mp05504\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp05505\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp05505\" data-row=\"mp05505\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	</tr></tbody></table>\n\n<input type=\"hidden\" id=\"descripcioninput\" value=\"3 ro \" a\":=\"\" ubicación=\"\" 3er=\"\" piso=\"\" lado=\"\" derecho\"=\"\">\n<input type=\"hidden\" id=\"nombreinput\" value=\"Tercero A\">\n\n<button class=\"guardarhorario btn btn-lg btn-warning pull-right\"><i class=\"fa fa-floppy-o\"></i> Guardar</button>\n\n', '2020-11-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscribir`
--

CREATE TABLE `inscribir` (
  `idinscripcion` int(11) NOT NULL,
  `ci` int(11) NOT NULL,
  `grado` int(11) NOT NULL,
  `jornada` varchar(10) NOT NULL,
  `gestion` year(4) NOT NULL,
  `fecha_inscrib` datetime NOT NULL DEFAULT current_timestamp(),
  `idusuario` int(11) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inscribir`
--

INSERT INTO `inscribir` (`idinscripcion`, `ci`, `grado`, `jornada`, `gestion`, `fecha_inscrib`, `idusuario`, `estatus`) VALUES
(295, 72737345, 1, 'TARDE', 2020, '2020-10-28 17:27:58', 1, 1),
(296, 87878787, 1, 'TARDE', 2020, '2020-10-28 17:44:26', 1, 1),
(297, 8978670, 1, 'TARDE', 2020, '2020-10-28 17:44:39', 1, 1),
(298, 77077010, 1, 'TARDE', 2020, '2020-10-28 17:44:50', 1, 1),
(299, 65544332, 2, 'TARDE', 2020, '2020-11-01 21:41:22', 1, 1),
(300, 76677889, 3, 'TARDE', 2020, '2020-11-03 17:04:06', 4, 1),
(301, 888777666, 3, 'TARDE', 2020, '2020-11-09 14:51:23', 4, 1),
(302, 22222123, 1, 'TARDE', 2020, '2020-11-25 08:10:31', 2, 1),
(303, 33322211, 1, 'TARDE', 2020, '2020-11-25 08:15:51', 2, 1),
(304, 56679697, 1, 'TARDE', 2020, '2020-11-25 08:16:32', 2, 1),
(305, 45344545, 1, 'TARDE', 2020, '2020-11-25 08:16:51', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornada`
--

CREATE TABLE `jornada` (
  `jornada` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `jornada`
--

INSERT INTO `jornada` (`jornada`) VALUES
('TARDE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `idmateria` int(11) NOT NULL,
  `materia` varchar(30) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`idmateria`, `materia`, `estatus`, `idusuario`) VALUES
(1, 'MATEMATICAS', 1, 1),
(2, 'LENGUAJE', 1, 1),
(3, 'MUSICA', 1, 1),
(4, 'RELIGION', 1, 1),
(5, 'EDUCACION FISICA', 1, 1),
(6, 'ARTES PLASTICAS', 1, 1),
(7, 'CIENCIAS NATURALES', 1, 1),
(8, 'CIENCIAS SOCIALES', 1, 1),
(9, 'COMPUT', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `idnota` int(11) NOT NULL,
  `idalumno` int(11) NOT NULL,
  `idmateria` int(11) NOT NULL,
  `nota1` int(3) NOT NULL,
  `nota2` int(3) NOT NULL,
  `nota3` int(3) NOT NULL,
  `nota4` int(3) NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`idnota`, `idalumno`, `idmateria`, `nota1`, `nota2`, `nota3`, `nota4`, `idusuario`) VALUES
(61, 3, 2, 99, 22, 11, 33, 0),
(62, 1, 2, 88, 55, 66, 60, 0),
(63, 4, 2, 50, 56, 76, 70, 0),
(64, 2, 2, 60, 69, 50, 50, 0),
(68, 3, 1, 50, 0, 0, 0, 0),
(69, 1, 1, 55, 0, 0, 0, 0),
(70, 4, 1, 65, 0, 0, 0, 0),
(71, 2, 1, 45, 0, 0, 0, 0),
(76, 3, 3, 100, 0, 0, 0, 0),
(77, 1, 3, 80, 0, 0, 0, 0),
(78, 4, 3, 70, 0, 0, 0, 0),
(79, 2, 3, 90, 0, 0, 0, 0),
(80, 3, 5, 90, 0, 0, 0, 0),
(81, 1, 5, 50, 0, 0, 0, 0),
(82, 4, 5, 60, 0, 0, 0, 0),
(83, 2, 5, 70, 0, 0, 0, 0),
(84, 3, 6, 58, 0, 0, 0, 0),
(85, 1, 6, 70, 0, 0, 0, 0),
(86, 4, 6, 90, 0, 0, 0, 0),
(87, 2, 6, 80, 0, 0, 0, 0),
(88, 3, 7, 87, 0, 0, 0, 0),
(89, 1, 7, 76, 0, 0, 0, 0),
(90, 4, 7, 56, 0, 0, 0, 0),
(91, 2, 7, 98, 0, 0, 0, 0),
(96, 3, 4, 100, 0, 0, 0, 0),
(97, 10, 4, 100, 0, 0, 0, 0),
(98, 6, 4, 100, 0, 0, 0, 0),
(99, 11, 4, 100, 0, 0, 0, 0),
(100, 12, 4, 100, 0, 0, 0, 0),
(101, 1, 4, 100, 0, 0, 0, 0),
(102, 4, 4, 100, 0, 0, 0, 0),
(103, 2, 4, 100, 0, 0, 0, 0);

--
-- Disparadores `notas`
--
DELIMITER $$
CREATE TRIGGER `notasDelete` AFTER DELETE ON `notas` FOR EACH ROW BEGIN
INSERT INTO 
bitacora(idnota,ejecutor,actividad_realizada,informacion_anterior)
VALUES(OLD.idnota,CURRENT_USER,'Se elimino Nota',
concat('Informacion anterior:',OLD.idalumno,OLD.idmateria,OLD.nota1,OLD.nota2,OLD.nota3,OLD.nota4));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `notasInsertar` AFTER INSERT ON `notas` FOR EACH ROW BEGIN
INSERT INTO 
bitacora(idnota,ejecutor,actividad_realizada,informacion_actual) VALUES(NEW.idnota,CURRENT_USER,'Se inserto Nueva Nota',concat('Informacion actual:',NEW.idalumno,NEW.idmateria,NEW.nota1,NEW.nota2,NEW.nota3,NEW.nota4 ));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `notasUpdate` AFTER UPDATE ON `notas` FOR EACH ROW BEGIN
INSERT INTO 
bitacora(idnota,ejecutor,actividad_realizada,informacion_actual,informacion_anterior)
VALUES(OLD.idnota,CURRENT_USER,'Se actualizo Nota',
concat('Informacion anterior:',OLD.idalumno,OLD.idmateria,OLD.nota1,OLD.nota2,
OLD.nota3,OLD.nota4),concat('Informacion actual:',
NEW.idalumno,NEW.idmateria,NEW.nota1,NEW.nota2,NEW.nota3,NEW.nota4));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `idprofesor` int(11) NOT NULL,
  `rda` int(11) NOT NULL,
  `ci` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `fecha_nac` date NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` int(9) NOT NULL,
  `especialidad` varchar(100) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`idprofesor`, `rda`, `ci`, `nombre`, `apellidos`, `direccion`, `fecha_nac`, `correo`, `telefono`, `especialidad`, `idusuario`, `estatus`) VALUES
(1, 98876556, 76655484, 'JESSICA', 'MAMANI CRUZ', 'CALVARIO', '2019-12-12', 'mamni@gamail.com', 43221234, 'LIC. MATEMATICAS', 1, 1),
(2, 76564543, 45433234, 'MARIO', 'VELIS ORTIS', 'PLAZA BOLIVAR', '2020-01-17', 'mario@gmail.com', 72733456, 'LIC. MATEMATICAS', 1, 1),
(4, 34343455, 99999994, 'JHOEL  MATIAS', 'ALBAREZ GOMEZ', 'WACHACA CHICO', '2004-02-06', 'matias@gmail.com', 72727272, 'LIC. FISICA', 1, 1),
(5, 56541233, 988987878, 'ROCABADO', 'FERNANDEZ LEDEZMA', 'COLCAPIRUA', '1990-09-12', 'rocabado@gmail.com', 65767676, 'LIC. LITERATURA', 1, 1),
(6, 34455456, 34321231, 'MELANI ', 'GUTIERREZ LOZA', 'PASO ', '1995-07-12', 'melani@gmail.com', 766552222, 'LIC. EDUCACION FISICA', 1, 1),
(7, 23003200, 65453423, 'MICAELA ', 'CARTAGENA QUISPE', 'BARRIO MANACO', '1995-06-07', 'micaela@gmail.com', 76764455, 'LIC. CIENCIAS SOCIALES', 1, 1),
(8, 10001231, 23231564, 'GUALTER', 'ROJAS MEDRAANO', 'TIQUIPAYA', '1994-03-12', 'gualter@gmail.com', 767673434, 'LIC. RELIGION', 1, 1),
(9, 23506785, 12145354, 'FREEDY JOSE', 'ESCALARE ESCOBAR', 'PLAZA CALA CALA', '1997-09-12', 'freddy@gmail.com', 71655490, 'LIC. MUSICA', 1, 1),
(10, 80808876, 47949666, 'ISAC ', 'GOMEZ  MEDRANO', 'SAN JORGE KM 19', '1990-08-11', 'isac@gmail.com', 65444888, 'LIC. LABORES', 1, 1),
(12, 12121243, 99999999, 'MOYRA', 'GONZALES GUTIERREZ', 'PLAZA CALA CALA', '2000-03-12', 'moyra@gmail.com', 72733929, 'LIC. MATEMATICAS', 1, 1),
(20, 34234523, 877676655, 'JHOEL MATIAS', 'CARTAGENA QUISPE', 'TIQUIPAYA ', '2000-12-12', 'manuel@gmail.com', 87878784, 'LICENCIATURA MATEMATICAS', 9, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `rol`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'ESTUDIANTE'),
(3, 'PROFESOR'),
(4, 'TUTOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutores`
--

CREATE TABLE `tutores` (
  `idtutor` int(11) NOT NULL,
  `ci_padre` int(9) NOT NULL,
  `nombre_padre` varchar(100) NOT NULL,
  `fecha_nac_padre` date NOT NULL,
  `ocupacion_padre` varchar(100) NOT NULL,
  `ci_madre` int(9) NOT NULL,
  `nombre_madre` varchar(100) NOT NULL,
  `fecha_nac_madre` date NOT NULL,
  `ocupacion_madre` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` int(10) NOT NULL,
  `telRef` int(8) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tutores`
--

INSERT INTO `tutores` (`idtutor`, `ci_padre`, `nombre_padre`, `fecha_nac_padre`, `ocupacion_padre`, `ci_madre`, `nombre_madre`, `fecha_nac_madre`, `ocupacion_madre`, `direccion`, `telefono`, `telRef`, `correo`, `idusuario`, `estatus`) VALUES
(1, 65453436, 'ROBERT  GUTIERRES BUSTAMANTE', '2019-12-18', 'POLICIA', 45459889, 'MARIA GUSMAN VILALO', '2019-12-04', 'COSTURERA', 'CHULLA', 72733929, 45454543, 'robert@gmail.com', 1, 1),
(2, 23232323, 'GERMAN ALBAREZ VILADO', '2020-01-19', 'CHOFER', 0, '', '0000-00-00', '', 'VILOMA', 12345678, 45454543, 'german@gmail.com', 1, 1),
(3, 0, '', '0000-00-00', '', 34454334, 'ROSA GOMEEZ MEDRANO', '2020-01-25', 'AMA DE CASA', 'SIPE SIPE', 77254324, 0, 'rosita@gmail.com', 1, 1),
(4, 23232323, 'JUAN', '2020-01-11', 'DOCTOR', 0, '', '0000-00-00', '', 'VINTO', 72733989, 0, 'fanny@gmail.com', 1, 1),
(5, 87675654, 'MARCELO INOJOSA MURILLO', '1993-08-11', 'CARPINTERO', 78780023, 'MARIA LOZA VELIZ', '1995-08-11', 'AMA DE CAMA', 'QUILLACOLLO', 77254324, 77254324, 'maria@gmail.com', 1, 1),
(6, 45454465, 'DEINS CREPO ARNEZ', '1998-08-11', 'ABOGADO', 78780577, 'JASINTA OTALORA RUIZ', '1999-08-11', 'ENFERMERA', 'VINTO', 72733222, 72733333, 'jasint@gmail.com', 1, 1),
(7, 0, '', '0000-00-00', '', 66780023, 'LUISA ALCOSER ROMERO', '1993-08-11', 'DOCTORA', 'SIPE SIPE', 77548888, 0, 'luisita@gmail.com', 1, 1),
(8, 0, '', '0000-00-00', '', 78780599, 'JENNYFER GOSALES MOSTACEDO', '1982-08-11', 'CORTE Y CONFECCION', 'MANACO KM 13', 65444211, 65444889, 'fenny@gmail.com', 1, 1),
(9, 23232323, 'JUAN MORALES RUIZ', '1880-12-12', 'POLICIA', 45454545, 'MARIA GONSALES MAMNI', '1880-12-12', 'AMA DE CASA', 'PAIRUMANI', 65677889, 0, 'maria@gmail.com', 1, 1),
(10, 0, '', '0000-00-00', '', 89876754, 'MARIANA ANTACAMA MANSONI', '1988-11-20', 'DOCTORA', 'QUILLACOLLO', 76564532, 0, 'atacama@gmail.com', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `clave` int(7) NOT NULL,
  `rol` int(11) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `correo`, `usuario`, `clave`, `rol`, `estatus`) VALUES
(1, 'NORMA ALBAREZ GOMEZ', 'norma@gmail.com', 'NORMA', 111111, 1, 1),
(2, 'YESSICA ALBAREZ GOMEZ', 'yessica@gmail.com', 'JOSELUIS', 222222, 3, 1),
(3, 'JOSE ALFREDO', 'jose@gmail.com', 'MARIO', 333333, 4, 1),
(4, 'DARLING PERES CRESPO', 'darling@gmail.com', 'PERES', 121212, 2, 1),
(5, 'ROLANDO MORALES QUISPE', 'ronaldo@gmail.com', 'ROLANDO', 123456, 1, 1),
(6, 'FANNY ROSALES MENECES', 'fanny@gmail.com', 'FANNY', 555555, 1, 1),
(8, 'EPIFANIA AGUILAR GOMEZ', 'epifanny@gmail.com', 'EPIFANIA', 256666, 2, 1),
(9, ' JONNY ANDRADE MARINO', 'jonny@gmail.com', 'JONNY', 876789, 1, 1),
(10, 'CINTHIA MOLO', 'cinthia@gmail.com', 'CINTHIA', 887788, 4, 1),
(11, 'ROBERTH GUTIEREZ MAMNI', 'robert@gmail.com', 'ROBERT', 999999, 2, 1),
(12, 'BRUNO CRUZ CAMACHO', 'bruno@gmail.com', 'BRUNO', 121212, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idadmin`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`idalumno`),
  ADD KEY `idtutor` (`idtutor`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `correo` (`correo`);

--
-- Indices de la tabla `avisos`
--
ALTER TABLE `avisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bimestre`
--
ALTER TABLE `bimestre`
  ADD PRIMARY KEY (`bimestre`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id_bitacora`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idcurso`),
  ADD KEY `nombre` (`nombre`);

--
-- Indices de la tabla `gestion`
--
ALTER TABLE `gestion`
  ADD PRIMARY KEY (`gestion`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inscribir`
--
ALTER TABLE `inscribir`
  ADD PRIMARY KEY (`idinscripcion`),
  ADD KEY `ci` (`ci`),
  ADD KEY `grado` (`grado`),
  ADD KEY `jornada` (`jornada`),
  ADD KEY `gestion` (`gestion`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `ci_2` (`ci`);

--
-- Indices de la tabla `jornada`
--
ALTER TABLE `jornada`
  ADD PRIMARY KEY (`jornada`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`idmateria`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`idnota`),
  ADD KEY `idalumno` (`idalumno`),
  ADD KEY `idmateria` (`idmateria`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`idprofesor`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `tutores`
--
ALTER TABLE `tutores`
  ADD PRIMARY KEY (`idtutor`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `idalumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `avisos`
--
ALTER TABLE `avisos`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id_bitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `idcurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `inscribir`
--
ALTER TABLE `inscribir`
  MODIFY `idinscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `idmateria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `idnota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `idprofesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tutores`
--
ALTER TABLE `tutores`
  MODIFY `idtutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`idtutor`) REFERENCES `tutores` (`idtutor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`nombre`) REFERENCES `profesor` (`idprofesor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inscribir`
--
ALTER TABLE `inscribir`
  ADD CONSTRAINT `inscribir_ibfk_2` FOREIGN KEY (`gestion`) REFERENCES `gestion` (`gestion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscribir_ibfk_3` FOREIGN KEY (`grado`) REFERENCES `curso` (`idcurso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscribir_ibfk_4` FOREIGN KEY (`jornada`) REFERENCES `jornada` (`jornada`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_5` FOREIGN KEY (`idmateria`) REFERENCES `materia` (`idmateria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notas_ibfk_7` FOREIGN KEY (`idalumno`) REFERENCES `alumno` (`idalumno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
