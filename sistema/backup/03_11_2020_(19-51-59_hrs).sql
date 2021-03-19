SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS matilde;

USE matilde;

DROP TABLE IF EXISTS administrador;

CREATE TABLE `administrador` (
  `idadmin` int(11) NOT NULL AUTO_INCREMENT,
  `ci` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `fecha_nac` date NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` int(8) NOT NULL,
  `especialidad` varchar(100) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idadmin`),
  KEY `idusuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO administrador VALUES("1","76767676","NORMA","ALBAREZ","MALLCORANCHO","2020-01-18","peke3862@gmail.com","72733929","ADMINISTRADOR","1","1");
INSERT INTO administrador VALUES("2","79495154","EBERTH","VILLARROEL","PAYACOLLO","2020-02-01","jhoel@gmail.com","77254324","RECTOR","1","1");
INSERT INTO administrador VALUES("3","94951555","DARLING ","VEGAMONTE VASQUEZ","PAIRUMANI","2000-08-11","darling@gmail.com","65444889","SECRETARIA","1","1");
INSERT INTO administrador VALUES("4","79495159","SAUL ","CONDE","BLANCO GALINDO KM 15","1981-08-11","conde@gmail.com","72733333","DIRECTOR","1","1");



DROP TABLE IF EXISTS alumno;

CREATE TABLE `alumno` (
  `idalumno` int(11) NOT NULL AUTO_INCREMENT,
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
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idalumno`),
  KEY `idtutor` (`idtutor`),
  KEY `idusuario` (`idusuario`),
  CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`idtutor`) REFERENCES `tutores` (`idtutor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

INSERT INTO alumno VALUES("1","72737345","MARIA JOSEFINA","LOPEZ SUAREZ","VILOMA KM 19 1/2","2020-01-17","fanny@gmail.com","77254324","img_440679b45ffe34241816284b0dd65853.jpg","1","1","1");
INSERT INTO alumno VALUES("2","87878787","NOELIA","FLORES MENECES","AV. BLACO GALINDO KM 20","2020-01-12","peke862@gmail.com","77254324","img_645fbef5aafcedba86120d9fd918bf8c.jpg","1","1","1");
INSERT INTO alumno VALUES("3","8978670","JOSELIN","ALBAREZ GOMEZ","VINTO","2016-06-22","norma@gmail.com","72733929","img_81ca943b56bef68d78e6ef1e2134e006.jpg","3","1","1");
INSERT INTO alumno VALUES("4","77077010","JOSEPHT","PEREZ CRESPO","CBBA","2020-03-19","jhon@gmail.com","72733333","img_77fca06061e7b9ac6698769047b2b920.jpg","1","1","1");
INSERT INTO alumno VALUES("5","65544332","MARIA ","PALMER GISADO","PASO","2024-03-28","jesi@gmail.com","76606333","img_5beae181ef327b8ed7876a38ce86e97d.jpg","4","1","1");
INSERT INTO alumno VALUES("6","33322211","RONALD","BRAÑEZ JIMENES","SACABA","2013-05-22","noelia@gmail.com","0","img_8ab4119e61ac22ea096b238e956dc073.jpg","3","1","1");
INSERT INTO alumno VALUES("9","888777666","BRUNO"," CRUZ CAMACHO","TIQUIPAYA","2008-06-12","benjamin@gmail.com","0","img_23a3c2bc405df10ade04eb40b3f48a18.jpg","1","1","1");
INSERT INTO alumno VALUES("10","22222123","JUAN JOSE","GUSVER LENON","TIQUIPAYA","2008-03-12","","0","img_ab3dfcdbdcc1b699f9fb35ca80eccc84.jpg","1","1","1");
INSERT INTO alumno VALUES("11","45344545","JHOLANDA","MORALES GONZALES","PAIRUMANI","2008-12-12","","0","img_5b07663221eb1b5f4796b0562a0113e7.jpg","9","1","1");
INSERT INTO alumno VALUES("12","56679697","JUAN PABLO ","MORALES GONZALES","PAIRUMANI","2005-09-12","","0","img_97ca16bc19582ee58e69a5ea54fa5f79.jpg","9","1","1");
INSERT INTO alumno VALUES("13","76677889","ROBERTO","MORALES GONZALES ","PAIRUMANI","2012-04-12","","0","img_fd39219496eed8df0fe4764a0a2d8191.jpg","9","1","1");



DROP TABLE IF EXISTS avisos;

CREATE TABLE `avisos` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `mensaje` varchar(300) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 0,
  `autor` varchar(300) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

INSERT INTO avisos VALUES("1","Reanudamos las class del 11/05/202 actividades virtuales","1","Director: Mario Veliz","2020-08-24 21:53:24");
INSERT INTO avisos VALUES("2","Entrega de boletines  25/05/2020","1","Profesor: Jhony Barrios","2020-05-15 13:33:16");
INSERT INTO avisos VALUES("10","suspencio de clases","1","norma albarez","2020-10-28 14:01:46");
INSERT INTO avisos VALUES("11","suspencion de feria navideña","1","lic. Jessica mamani ","2020-10-28 14:02:18");



DROP TABLE IF EXISTS bimestre;

CREATE TABLE `bimestre` (
  `bimestre` varchar(20) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  PRIMARY KEY (`bimestre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO bimestre VALUES("Bimestre1 ","2020-02-04","2020-05-04");
INSERT INTO bimestre VALUES("Bimestre2","2020-10-21","2020-12-03");
INSERT INTO bimestre VALUES("Bimestre3","2020-05-04","2020-08-04");
INSERT INTO bimestre VALUES("Bimestre4","2020-10-08","0000-00-00");



DROP TABLE IF EXISTS bitacora;

CREATE TABLE `bitacora` (
  `id_bitacora` int(11) NOT NULL AUTO_INCREMENT,
  `idnota` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `ejecutor` varchar(20) NOT NULL,
  `actividad_realizada` varchar(50) NOT NULL,
  `informacion_actual` text DEFAULT NULL,
  `informacion_anterior` text DEFAULT NULL,
  PRIMARY KEY (`id_bitacora`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO bitacora VALUES("1","67","2020-11-03 19:19:59","root@localhost","Se inserto Nueva Nota","Informacion actual:13210000","");
INSERT INTO bitacora VALUES("2","67","2020-11-03 19:40:34","root@localhost","Se elimino Nota","","Informacion anterior:13210000");
INSERT INTO bitacora VALUES("3","61","2020-11-03 19:49:33","root@localhost","Se actualizo Nota","Informacion anterior:32100000","Informacion actual:3299221133");



DROP TABLE IF EXISTS curso;

CREATE TABLE `curso` (
  `idcurso` int(11) NOT NULL AUTO_INCREMENT,
  `grado` varchar(11) NOT NULL,
  `seccion` varchar(11) NOT NULL,
  `nombre` int(11) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idcurso`),
  KEY `nombre` (`nombre`),
  CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`nombre`) REFERENCES `profesor` (`idprofesor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;

INSERT INTO curso VALUES("1","INICIAL","A","9","1","1");
INSERT INTO curso VALUES("2","INICIAL","B","1","1","1");
INSERT INTO curso VALUES("3","INICIAL","C","8","1","1");
INSERT INTO curso VALUES("4","PRIMERO","A","2","1","1");
INSERT INTO curso VALUES("5","PRIMERO","B","5","1","1");
INSERT INTO curso VALUES("6","PRIMERO","C","7","1","1");
INSERT INTO curso VALUES("7","SEGUNDO","A","3","1","1");
INSERT INTO curso VALUES("8","SEGUNDO","B","4","1","1");
INSERT INTO curso VALUES("9","SEGUNDO","C","6","1","1");
INSERT INTO curso VALUES("39","TERCERO","A","10","1","1");



DROP TABLE IF EXISTS gestion;

CREATE TABLE `gestion` (
  `gestion` year(4) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`gestion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO gestion VALUES("2020","1");
INSERT INTO gestion VALUES("2021","1");
INSERT INTO gestion VALUES("2022","1");
INSERT INTO gestion VALUES("2023","1");
INSERT INTO gestion VALUES("2024","1");



DROP TABLE IF EXISTS horarios;

CREATE TABLE `horarios` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `horario` text DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

INSERT INTO horarios VALUES("24","Kinder A","Kinder A: Primer piso frente Laboratorio.","\n<h1 class=\"horario-name\"><i class=\"fa fa-calendar\" aria-hidden=\"true\"></i> Kinder A</h1>\n<table id=\"thetable\" class=\"table table-bordered\">\n<thead class=\"thead\">\n<tr><th class=\"horarioheader\"><i class=\"fa fa-clock-o\"></i> Horario</th>\n<th><i class=\"fa fa-angle-right\"></i> Lunes</th><th><i class=\"fa fa-angle-right\"></i> Martes</th><th><i class=\"fa fa-angle-right\"></i> Miercoles</th><th><i class=\"fa fa-angle-right\"></i> Jueves</th><th><i class=\"fa fa-angle-right\"></i> Viernes</th>\n</tr></thead>\n<tbody><tr id=\"trf639e5c45810f973c93e25a20110fe029f202eac\">\n\n<td class=\"td-time\">\n\n<div id=\"parentf639e5c45810f973c93e25a20110fe029f202eac\" class=\"timeblock\">\n<strong id=\"dataf639e5c45810f973c93e25a20110fe029f202eac\">02:15 pm - 03:00 pm</strong>\n<button data-time=\"f639e5c45810f973c93e25a20110fe029f202eac\" class=\"changethetime btn btn-primary btn-xs pull-right\"><i class=\"fa fa-pencil\"></i></button>\n</div>\n\n<div id=\"editf639e5c45810f973c93e25a20110fe029f202eac\" class=\"hideedittime text-center\" style=\"display: none;\">\n  <input id=\"inputf639e5c45810f973c93e25a20110fe029f202eac\" type=\"text\" class=\"form-control\" value=\"02:15 pm - 03:00 pm\"><p></p><button data-save=\"f639e5c45810f973c93e25a20110fe029f202eac\" class=\"savetime btn btn-block btn-xs btn-primary\"><i class=\"fa fa-floppy-o\"></i> Guardar</button><button data-block=\"f639e5c45810f973c93e25a20110fe029f202eac\" class=\"deleteblock btn btn-block btn-xs btn-warning\"><i class=\"fa fa-ban\"></i> Eliminar </button><button class=\"canceledit btn btn-block btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Cancelar\n</button></div>\n\n</td>\n       <td class=\"td-line\">\n         <div id=\"mp00301\" class=\"col-sm-12 nopadding\"><label class=\"label-desc purple-label\">Matematicas <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp00301\" data-row=\"mp00301\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp00302\" class=\"col-sm-12 nopadding\"><label class=\"label-desc purple-label\">Matematicas <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp00302\" data-row=\"mp00302\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp00303\" class=\"col-sm-12 nopadding\"><label class=\"label-desc red-label\">Lenguaje <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp00303\" data-row=\"mp00303\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp00304\" class=\"col-sm-12 nopadding\"><label class=\"label-desc purple-label\">Matematicas <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp00304\" data-row=\"mp00304\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp00305\" class=\"col-sm-12 nopadding\"><label class=\"label-desc brow-label\">Musica <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp00305\" data-row=\"mp00305\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	</tr><tr id=\"trf51eb468b44bd9ed76a73443617f34ec58805b17\">\n\n<td class=\"td-time\">\n\n<div id=\"parentf51eb468b44bd9ed76a73443617f34ec58805b17\" class=\"timeblock\">\n<strong id=\"dataf51eb468b44bd9ed76a73443617f34ec58805b17\">03:00 pm - 03:45 pm</strong>\n<button data-time=\"f51eb468b44bd9ed76a73443617f34ec58805b17\" class=\"changethetime btn btn-primary btn-xs pull-right\"><i class=\"fa fa-pencil\"></i></button>\n</div>\n\n<div id=\"editf51eb468b44bd9ed76a73443617f34ec58805b17\" class=\"hideedittime text-center\" style=\"display: none;\">\n  <input id=\"inputf51eb468b44bd9ed76a73443617f34ec58805b17\" type=\"text\" class=\"form-control\" value=\"03:00 pm - 03:45 pm\"><p></p><button data-save=\"f51eb468b44bd9ed76a73443617f34ec58805b17\" class=\"savetime btn btn-block btn-xs btn-primary\"><i class=\"fa fa-floppy-o\"></i> Guardar</button><button data-block=\"f51eb468b44bd9ed76a73443617f34ec58805b17\" class=\"deleteblock btn btn-block btn-xs btn-warning\"><i class=\"fa fa-ban\"></i> Eliminar </button><button class=\"canceledit btn btn-block btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Cancelar\n</button></div>\n\n</td>\n       <td class=\"td-line\">\n         <div id=\"mp54301\" class=\"col-sm-12 nopadding\"><label class=\"label-desc purple-label\">Matematicas <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp54301\" data-row=\"mp54301\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp54302\" class=\"col-sm-12 nopadding\"><label class=\"label-desc purple-label\">Matematicas <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp54302\" data-row=\"mp54302\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp54303\" class=\"col-sm-12 nopadding\"><label class=\"label-desc red-label\">Lenguaje <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp54303\" data-row=\"mp54303\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp54304\" class=\"col-sm-12 nopadding\"><label class=\"label-desc purple-label\">Matematicas <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp54304\" data-row=\"mp54304\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp54305\" class=\"col-sm-12 nopadding\"><label class=\"label-desc yellow-label\">Educacion Fisica <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp54305\" data-row=\"mp54305\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	</tr><tr id=\"trd8e9038bb49576e0a8a538abad5680b62d76650b\">\n\n<td class=\"td-time\">\n\n<div id=\"parentd8e9038bb49576e0a8a538abad5680b62d76650b\" class=\"timeblock\">\n<strong id=\"datad8e9038bb49576e0a8a538abad5680b62d76650b\">03:45 pm - 04:30 pm</strong>\n<button data-time=\"d8e9038bb49576e0a8a538abad5680b62d76650b\" class=\"changethetime btn btn-primary btn-xs pull-right\"><i class=\"fa fa-pencil\"></i></button>\n</div>\n\n<div id=\"editd8e9038bb49576e0a8a538abad5680b62d76650b\" class=\"hideedittime text-center\" style=\"display: none;\">\n  <input id=\"inputd8e9038bb49576e0a8a538abad5680b62d76650b\" type=\"text\" class=\"form-control\" value=\"03:45 pm - 04:30 pm\"><p></p><button data-save=\"d8e9038bb49576e0a8a538abad5680b62d76650b\" class=\"savetime btn btn-block btn-xs btn-primary\"><i class=\"fa fa-floppy-o\"></i> Guardar</button><button data-block=\"d8e9038bb49576e0a8a538abad5680b62d76650b\" class=\"deleteblock btn btn-block btn-xs btn-warning\"><i class=\"fa fa-ban\"></i> Eliminar </button><button class=\"canceledit btn btn-block btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Cancelar\n</button></div>\n\n</td>\n       <td class=\"td-line\">\n         <div id=\"mp03401\" class=\"col-sm-12 nopadding\"><label class=\"label-desc red-label\">Lenguaje <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp03401\" data-row=\"mp03401\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp03402\" class=\"col-sm-12 nopadding\"><label class=\"label-desc blue-label\">Ciencias Naturales <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp03402\" data-row=\"mp03402\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp03403\" class=\"col-sm-12 nopadding\"><label class=\"label-desc blue-label\">Ciencias Naturales <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp03403\" data-row=\"mp03403\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp03404\" class=\"col-sm-12 nopadding\"><label class=\"label-desc green-label\">Ciencias Sociales <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp03404\" data-row=\"mp03404\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp03405\" class=\"col-sm-12 nopadding\"><label class=\"label-desc orange-label\">Manualidades <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp03405\" data-row=\"mp03405\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	</tr><tr id=\"tr5acce638ada51996de5e5d2990c53f0e2e0f393b\">\n\n<td class=\"td-time\">\n\n<div id=\"parent5acce638ada51996de5e5d2990c53f0e2e0f393b\" class=\"timeblock\">\n<strong id=\"data5acce638ada51996de5e5d2990c53f0e2e0f393b\">04:30 pm - 05:15 pm</strong>\n<button data-time=\"5acce638ada51996de5e5d2990c53f0e2e0f393b\" class=\"changethetime btn btn-primary btn-xs pull-right\"><i class=\"fa fa-pencil\"></i></button>\n</div>\n\n<div id=\"edit5acce638ada51996de5e5d2990c53f0e2e0f393b\" class=\"hideedittime text-center\" style=\"display: none;\">\n  <input id=\"input5acce638ada51996de5e5d2990c53f0e2e0f393b\" type=\"text\" class=\"form-control\" value=\"04:30 pm - 05:15 pm\"><p></p><button data-save=\"5acce638ada51996de5e5d2990c53f0e2e0f393b\" class=\"savetime btn btn-block btn-xs btn-primary\"><i class=\"fa fa-floppy-o\"></i> Guardar</button><button data-block=\"5acce638ada51996de5e5d2990c53f0e2e0f393b\" class=\"deleteblock btn btn-block btn-xs btn-warning\"><i class=\"fa fa-ban\"></i> Eliminar </button><button class=\"canceledit btn btn-block btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Cancelar\n</button></div>\n\n</td>\n       <td class=\"td-line\">\n         <div id=\"mp51501\" class=\"col-sm-12 nopadding\"><label class=\"label-desc red-label\">Lenguaje <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp51501\" data-row=\"mp51501\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp51502\" class=\"col-sm-12 nopadding\"><label class=\"label-desc blue-label\">Ciencias Naturales <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp51502\" data-row=\"mp51502\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp51503\" class=\"col-sm-12 nopadding\"><label class=\"label-desc blue-label\">Ciencias Naturales <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp51503\" data-row=\"mp51503\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp51504\" class=\"col-sm-12 nopadding\"><label class=\"label-desc green-label\">Ciencias Sociales <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp51504\" data-row=\"mp51504\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp51505\" class=\"col-sm-12 nopadding\"><label class=\"label-desc gray-label\">Religion <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp51505\" data-row=\"mp51505\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	</tr></tbody></table>\n\n<input type=\"hidden\" id=\"descripcioninput\" value=\"Kinder A: Primer piso frente Laboratorio.\">\n<input type=\"hidden\" id=\"nombreinput\" value=\"Kinder A\">\n\n<button class=\"guardarhorario btn btn-lg btn-warning pull-right\"><i class=\"fa fa-floppy-o\"></i> Guardar</button>\n\n","2020-09-05");



DROP TABLE IF EXISTS inscribir;

CREATE TABLE `inscribir` (
  `idinscripcion` int(11) NOT NULL AUTO_INCREMENT,
  `ci` int(11) NOT NULL,
  `grado` int(11) NOT NULL,
  `jornada` varchar(10) NOT NULL,
  `gestion` year(4) NOT NULL,
  `fecha_inscrib` datetime NOT NULL DEFAULT current_timestamp(),
  `idusuario` int(11) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idinscripcion`),
  KEY `ci` (`ci`),
  KEY `grado` (`grado`),
  KEY `jornada` (`jornada`),
  KEY `gestion` (`gestion`),
  KEY `idusuario` (`idusuario`),
  KEY `ci_2` (`ci`),
  CONSTRAINT `inscribir_ibfk_2` FOREIGN KEY (`gestion`) REFERENCES `gestion` (`gestion`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `inscribir_ibfk_3` FOREIGN KEY (`grado`) REFERENCES `curso` (`idcurso`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `inscribir_ibfk_4` FOREIGN KEY (`jornada`) REFERENCES `jornada` (`jornada`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=301 DEFAULT CHARSET=utf8mb4;

INSERT INTO inscribir VALUES("295","72737345","1","TARDE","2020","2020-10-28 17:27:58","1","1");
INSERT INTO inscribir VALUES("296","87878787","1","TARDE","2020","2020-10-28 17:44:26","1","1");
INSERT INTO inscribir VALUES("297","8978670","1","TARDE","2020","2020-10-28 17:44:39","1","1");
INSERT INTO inscribir VALUES("298","77077010","1","TARDE","2020","2020-10-28 17:44:50","1","1");
INSERT INTO inscribir VALUES("299","65544332","2","TARDE","2020","2020-11-01 21:41:22","1","1");
INSERT INTO inscribir VALUES("300","76677889","3","TARDE","2020","2020-11-03 17:04:06","4","1");



DROP TABLE IF EXISTS jornada;

CREATE TABLE `jornada` (
  `jornada` varchar(20) NOT NULL,
  PRIMARY KEY (`jornada`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO jornada VALUES("TARDE");



DROP TABLE IF EXISTS materia;

CREATE TABLE `materia` (
  `idmateria` int(11) NOT NULL AUTO_INCREMENT,
  `materia` varchar(30) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idmateria`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO materia VALUES("1","MATEMATICAS","1","1");
INSERT INTO materia VALUES("2","LENGUAJE","1","1");
INSERT INTO materia VALUES("3","MUSICA","1","1");
INSERT INTO materia VALUES("4","RELIGION","1","1");
INSERT INTO materia VALUES("5","EDUCACION FISICA","1","1");
INSERT INTO materia VALUES("6","ARTES PLASTICAS","1","1");
INSERT INTO materia VALUES("7","CIENCIAS NATURALES","1","1");
INSERT INTO materia VALUES("8","CIENCIAS SOCIALES","1","1");
INSERT INTO materia VALUES("9","COMPUT","0","1");



DROP TABLE IF EXISTS notas;

CREATE TABLE `notas` (
  `idnota` int(11) NOT NULL AUTO_INCREMENT,
  `idalumno` int(11) NOT NULL,
  `idmateria` int(11) NOT NULL,
  `nota1` int(3) NOT NULL,
  `nota2` int(3) NOT NULL,
  `nota3` int(3) NOT NULL,
  `nota4` int(3) NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idnota`),
  KEY `idalumno` (`idalumno`),
  KEY `idmateria` (`idmateria`),
  KEY `idusuario` (`idusuario`),
  CONSTRAINT `notas_ibfk_5` FOREIGN KEY (`idmateria`) REFERENCES `materia` (`idmateria`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `notas_ibfk_7` FOREIGN KEY (`idalumno`) REFERENCES `alumno` (`idalumno`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4;

INSERT INTO notas VALUES("61","3","2","99","22","11","33","0");
INSERT INTO notas VALUES("62","1","2","0","0","0","0","0");
INSERT INTO notas VALUES("63","4","2","0","0","0","0","0");
INSERT INTO notas VALUES("64","2","2","0","0","0","0","0");



DROP TABLE IF EXISTS profesor;

CREATE TABLE `profesor` (
  `idprofesor` int(11) NOT NULL AUTO_INCREMENT,
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
  `estatus` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idprofesor`),
  KEY `idusuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

INSERT INTO profesor VALUES("1","0","76655484","JESSICA","MAMANI CRUZ","CALVARIO","2019-12-12","mamni@gamail.com","43221234","LIC. MATEMATICAS","1","1");
INSERT INTO profesor VALUES("2","0","45433234","MARIO","VELIS ORTIS","PLAZA BOLIVAR","2020-01-17","mario@gmail.com","72733456","LIC. MATEMATICAS","1","1");
INSERT INTO profesor VALUES("3","0","99999999","FANNY","ALBAREZ","TIQUIPAYA ","2020-01-10","peke3862@gmail.com","72733929","LIC. RELIGION","1","1");
INSERT INTO profesor VALUES("4","0","99999994","JHOEL  MATIAS","ALBAREZ GOMEZ","WACHACA CHICO","2004-02-06","matias@gmail.com","72727272","LIC. FISICA","1","1");
INSERT INTO profesor VALUES("5","0","988987878","ROCABADO","FERNANDEZ LEDEZMA","COLCAPIRUA","1990-09-12","rocabado@gmail.com","65767676","LIC. LITERATURA","1","1");
INSERT INTO profesor VALUES("6","0","34321231","MELANI ","GUTIERREZ LOZA","PASO ","1995-07-12","melani@gmail.com","766552222","LIC. EDUCACION FISICA","1","1");
INSERT INTO profesor VALUES("7","0","65453423","MICAELA ","CARTAGENA QUISPE","BARRIO MANACO","1995-06-07","micaela@gmail.com","76764455","LIC. CIENCIAS SOCIALES","1","1");
INSERT INTO profesor VALUES("8","0","23231564","GUALTER","ROJAS MEDRAANO","TIQUIPAYA","1994-03-12","gualter@gmail.com","767673434","LIC. RELIGION","1","1");
INSERT INTO profesor VALUES("9","0","12145354","FREEDY","ESCALARE ESCOBAR","PLAZA CALA CALA","1997-09-12","freddy@gmail.com","71655490","LIC. MUSICA","1","1");
INSERT INTO profesor VALUES("10","0","47949666","ISAC ","GOMEZ  MEDRANO","SAN JORGE KM 19","1990-08-11","isac@gmail.com","65444888","LIC. LABORES","1","1");
INSERT INTO profesor VALUES("12","121212","99999999","MOYRA","GONZALES GUTIERREZ","PLAZA CALA CALA","2000-03-12","moyra@gmail.com","72733929","LIC. MATEMATICAS","1","0");
INSERT INTO profesor VALUES("14","121212","76767676","NORMA","ALBAREZ","VILOMA","1990-09-12","norma@gmail.com","65453434","LIC. CIENCIAS NATURALES","1","1");
INSERT INTO profesor VALUES("15","121212","76767678","FANNY","ALBAREZ","VINTO","1890-12-12","fany@gmail.com","72733456","LIC. LABORES","1","1");
INSERT INTO profesor VALUES("16","121212","99999999","NORMA","ALBAREZ","PLAZA CALA CALA","1212-12-12","peke3862@gmail.com","72733929","LIC. RELIGION","1","0");
INSERT INTO profesor VALUES("17","121212","99999999","NORMA","ALBAREZ","PLAZA CALA CALA","1212-12-12","peke3862@gmail.com","72733929","LIC. RELIGION","1","0");
INSERT INTO profesor VALUES("18","121212","76767678","FANNY","ALBAREZ","VINTO","1890-12-12","fany@gmail.com","72733456","LIC. LABORES","1","0");
INSERT INTO profesor VALUES("19","121212","99999999","NORMA","NABERLK","TIQUIPAYA","1890-02-12","nal@gmail.com","72733989","LIC. MUSICA","1","0");
INSERT INTO profesor VALUES("20","34234523","877676655","JHOEL MATIAS","CARTAGENA QUISPE","TIQUIPAYA ","2000-12-12","manuel@gmail.com","87878784","LICENCIATURA MATEMATICAS","9","1");



DROP TABLE IF EXISTS rol;

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(20) NOT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO rol VALUES("1","ADMINISTRADOR");
INSERT INTO rol VALUES("2","ESTUDIANTE");
INSERT INTO rol VALUES("3","PROFESOR");
INSERT INTO rol VALUES("4","TUTOR");



DROP TABLE IF EXISTS tutores;

CREATE TABLE `tutores` (
  `idtutor` int(11) NOT NULL AUTO_INCREMENT,
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
  `estatus` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idtutor`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

INSERT INTO tutores VALUES("1","65453436","ROBERT  GUTIERRES BUSTAMANTE","2019-12-18","POLICIA","45459889","MARIA GUSMAN VILALO","2019-12-04","COSTURERA","CHULLA","72733929","45454543","robert@gmail.com","1","1");
INSERT INTO tutores VALUES("2","23232323","GERMAN ALBAREZ VILADO","2020-01-19","CHOFER","0","","0000-00-00","","VILOMA","12345678","45454543","german@gmail.com","1","1");
INSERT INTO tutores VALUES("3","0","","0000-00-00","","34454334","ROSA GOMEEZ MEDRANO","2020-01-25","AMA DE CASA","SIPE SIPE","77254324","0","rosita@gmail.com","1","1");
INSERT INTO tutores VALUES("4","23232323","JUAN","2020-01-11","DOCTOR","0","","0000-00-00","","VINTO","72733989","0","fanny@gmail.com","1","1");
INSERT INTO tutores VALUES("5","87675654","MARCELO INOJOSA MURILLO","1993-08-11","CARPINTERO","78780023","MARIA LOZA VELIZ","1995-08-11","AMA DE CAMA","QUILLACOLLO","77254324","77254324","maria@gmail.com","1","1");
INSERT INTO tutores VALUES("6","45454465","DEINS CREPO ARNEZ","1998-08-11","ABOGADO","78780577","JASINTA OTALORA RUIZ","1999-08-11","ENFERMERA","VINTO","72733222","72733333","jasint@gmail.com","1","1");
INSERT INTO tutores VALUES("7","0","","0000-00-00","","66780023","LUISA ALCOSER ROMERO","1993-08-11","DOCTORA","SIPE SIPE","77548888","0","luisita@gmail.com","1","1");
INSERT INTO tutores VALUES("8","0","","0000-00-00","","78780599","JENNYFER GOSALES MOSTACEDO","1982-08-11","CORTE Y CONFECCION","MANACO KM 13","65444211","65444889","fenny@gmail.com","1","1");
INSERT INTO tutores VALUES("9","23232323","JUAN MORALES RUIZ","1880-12-12","POLICIA","45454545","MARIA GONSALES MAMNI","1880-12-12","AMA DE CASA","PAIRUMANI","65677889","0","maria@gmail.com","1","1");



DROP TABLE IF EXISTS usuario;

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `clave` int(7) NOT NULL,
  `rol` int(11) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idusuario`),
  KEY `rol` (`rol`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

INSERT INTO usuario VALUES("1","NORMA ALBAREZ GOMEZ","peke3862@gmail.com","NORMA","111111","1","1");
INSERT INTO usuario VALUES("2","YESSICA ALBAREZ GOMEZ","yessica@gmail.com","JOSELUIS","222222","3","1");
INSERT INTO usuario VALUES("3","JOSE ALFREDO","estudiante@gmail.com","MARIO","333333","4","1");
INSERT INTO usuario VALUES("4","DARLING PERES CRESPO","tutor@gmail.com","PERES","444444","2","1");
INSERT INTO usuario VALUES("5","ROLANDO MORALES QUISPE","rolando@gmail.com","ROLANDO","123456","1","1");
INSERT INTO usuario VALUES("6","FANNY ROSALES MENECES","fanny@gmail.com","FANNY","555555","1","1");
INSERT INTO usuario VALUES("8","EPIFANIA AGUILAR GOMEZ","epi@gmail.es","EPIFANIA","256666","2","1");
INSERT INTO usuario VALUES("9"," JONNY AÃ‘ES MARINO","jonny@hotmail.com","JONNY","876789","1","1");
INSERT INTO usuario VALUES("10","CINTHIA MOLO","sullcani@gmail.com","CINTHIA","887788","4","1");
INSERT INTO usuario VALUES("11","ROBERTH GUTIEREZ MAMNI","robert@gmail.com","ROBERT","999999","2","1");
INSERT INTO usuario VALUES("12","BRUNO CRUZ CAMACHO","manuel@gmail.com","BRUNO","121212","1","1");



SET FOREIGN_KEY_CHECKS=1;