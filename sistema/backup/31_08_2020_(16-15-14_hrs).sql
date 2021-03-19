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
  KEY `ci` (`ci`),
  CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`idtutor`) REFERENCES `tutores` (`idtutor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

INSERT INTO alumno VALUES("1","76767676","YESSICA J","MARTINES ROSALES","VILOMA KM 19 1/2","2020-01-17","fanny@gmail.com","77254324","img_440679b45ffe34241816284b0dd65853.jpg","1","1","1");
INSERT INTO alumno VALUES("2","76767678","NOELIA","FLORES MENECES","AV. BLACO GALINDO KM 20","2020-01-12","peke862@gmail.com","77254324","img_645fbef5aafcedba86120d9fd918bf8c.jpg","1","1","1");
INSERT INTO alumno VALUES("3","79495159","NORMA","ALBAREZ GOMEZ","VINTO","2016-06-22","norma@gmail.com","72733929","img_81ca943b56bef68d78e6ef1e2134e006.jpg","3","1","1");
INSERT INTO alumno VALUES("4","7949515","JHON","ROCHA ARNEZ","CBBA","2020-03-19","jhon@gmail.com","72733333","img_77fca06061e7b9ac6698769047b2b920.jpg","1","1","1");
INSERT INTO alumno VALUES("5","89765412","JESSICA","MAMANI","PASO","2024-03-28","jesi@gmail.com","76606333","img_5beae181ef327b8ed7876a38ce86e97d.jpg","4","1","1");
INSERT INTO alumno VALUES("6","87652323","RONALDO ","BRAÑEZ JIMENES","SACABA","2013-05-22","noelia@gmail.com","0","img_8ab4119e61ac22ea096b238e956dc073.jpg","3","1","1");
INSERT INTO alumno VALUES("9","7949545","BRUNO BENJAMIN"," CRUZ CAMACHO","TIQUIPAYA","2008-06-12","benjamin@gmail.com","0","img_23a3c2bc405df10ade04eb40b3f48a18.jpg","1","1","1");



DROP TABLE IF EXISTS avisos;

CREATE TABLE `avisos` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `mensaje` varchar(300) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 0,
  `autor` varchar(300) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

INSERT INTO avisos VALUES("1","Reanudamos las class del 11/05/202 actividades virtuales","1","Director: Mario Veliz","2020-08-24 21:53:24");
INSERT INTO avisos VALUES("2","Entrega de boletines  25/05/2020","1","Profesor: Jhony Barrios","2020-05-15 13:33:16");
INSERT INTO avisos VALUES("4","suspeccion bloqueo","1","norma albarez","2020-08-24 18:28:29");
INSERT INTO avisos VALUES("7","clases virtuales se suspenden ","1","Lic. saul conde","2020-08-24 21:49:23");
INSERT INTO avisos VALUES("8","Se re toman las clases de manera voluntaria","1","Lic. saul conde","2020-08-24 21:49:23");



DROP TABLE IF EXISTS bimestre;

CREATE TABLE `bimestre` (
  `bimestre` varchar(20) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  PRIMARY KEY (`bimestre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO bimestre VALUES("1° Bimestre","2020-02-04","2020-05-04");
INSERT INTO bimestre VALUES("2° Bimestre","2020-05-04","2020-08-04");
INSERT INTO bimestre VALUES("3° Bimestre","2020-08-04","2020-09-04");
INSERT INTO bimestre VALUES("4° Bimestre","2020-10-21","2020-12-03");



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
  PRIMARY KEY (`gestion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO gestion VALUES("2020");
INSERT INTO gestion VALUES("2021");
INSERT INTO gestion VALUES("2022");
INSERT INTO gestion VALUES("2023");
INSERT INTO gestion VALUES("2024");



DROP TABLE IF EXISTS horarios;

CREATE TABLE `horarios` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `horario` text DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

INSERT INTO horarios VALUES("23","Primero A","aula:1ro A  ubicado en la entrada ","\n<h1 class=\"horario-name\"><i class=\"fa fa-calendar\" aria-hidden=\"true\"></i> Primero A</h1>\n<table id=\"thetable\" class=\"table table-bordered\">\n<thead class=\"thead\">\n<tr><th class=\"horarioheader\"><i class=\"fa fa-clock-o\"></i> Horario</th>\n<th><i class=\"fa fa-angle-right\"></i> Lunes</th><th><i class=\"fa fa-angle-right\"></i> Martes</th><th><i class=\"fa fa-angle-right\"></i> Miercoles</th><th><i class=\"fa fa-angle-right\"></i> Jueves</th><th><i class=\"fa fa-angle-right\"></i> Viernes</th>\n</tr></thead>\n<tbody><tr id=\"tr96f84ff3f95ca45eb06451cc455f26ca5cca5c76\">\n\n<td class=\"td-time\">\n\n<div id=\"parent96f84ff3f95ca45eb06451cc455f26ca5cca5c76\" class=\"timeblock\">\n<strong id=\"data96f84ff3f95ca45eb06451cc455f26ca5cca5c76\">02:20 pm - 03:05 pm</strong>\n<button data-time=\"96f84ff3f95ca45eb06451cc455f26ca5cca5c76\" class=\"changethetime btn btn-primary btn-xs pull-right\"><i class=\"fa fa-pencil\"></i></button>\n</div>\n\n<div id=\"edit96f84ff3f95ca45eb06451cc455f26ca5cca5c76\" class=\"hideedittime text-center\" style=\"display: none;\">\n  <input id=\"input96f84ff3f95ca45eb06451cc455f26ca5cca5c76\" type=\"text\" class=\"form-control\" value=\"02:20 pm - 03:05 pm\"><p></p><button data-save=\"96f84ff3f95ca45eb06451cc455f26ca5cca5c76\" class=\"savetime btn btn-block btn-xs btn-primary\"><i class=\"fa fa-floppy-o\"></i> Guardar</button><button data-block=\"96f84ff3f95ca45eb06451cc455f26ca5cca5c76\" class=\"deleteblock btn btn-block btn-xs btn-warning\"><i class=\"fa fa-ban\"></i> Eliminar </button><button class=\"canceledit btn btn-block btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Cancelar\n</button></div>\n\n</td>\n       <td class=\"td-line\">\n         <div id=\"mp50301\" class=\"col-sm-12 nopadding\"><label class=\"label-desc purple-label\">Matematicas <a class=\"deltasker\"><i class=\"fa fa-times\"></i></a></label></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp50301\" data-row=\"mp50301\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp50302\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp50302\" data-row=\"mp50302\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp50303\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp50303\" data-row=\"mp50303\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp50304\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp50304\" data-row=\"mp50304\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp50305\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp50305\" data-row=\"mp50305\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	</tr><tr id=\"tr6e74483bfc0537f79af38a1ab752c9a1102bfdfc\">\n\n<td class=\"td-time\">\n\n<div id=\"parent6e74483bfc0537f79af38a1ab752c9a1102bfdfc\" class=\"timeblock\">\n<strong id=\"data6e74483bfc0537f79af38a1ab752c9a1102bfdfc\">03:05 pm - 03:50 pm</strong>\n<button data-time=\"6e74483bfc0537f79af38a1ab752c9a1102bfdfc\" class=\"changethetime btn btn-primary btn-xs pull-right\"><i class=\"fa fa-pencil\"></i></button>\n</div>\n\n<div id=\"edit6e74483bfc0537f79af38a1ab752c9a1102bfdfc\" class=\"hideedittime text-center\" style=\"display: none;\">\n  <input id=\"input6e74483bfc0537f79af38a1ab752c9a1102bfdfc\" type=\"text\" class=\"form-control\" value=\"03:05 pm - 03:50 pm\"><p></p><button data-save=\"6e74483bfc0537f79af38a1ab752c9a1102bfdfc\" class=\"savetime btn btn-block btn-xs btn-primary\"><i class=\"fa fa-floppy-o\"></i> Guardar</button><button data-block=\"6e74483bfc0537f79af38a1ab752c9a1102bfdfc\" class=\"deleteblock btn btn-block btn-xs btn-warning\"><i class=\"fa fa-ban\"></i> Eliminar </button><button class=\"canceledit btn btn-block btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Cancelar\n</button></div>\n\n</td>\n       <td class=\"td-line\">\n         <div id=\"mp05301\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp05301\" data-row=\"mp05301\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp05302\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp05302\" data-row=\"mp05302\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp05303\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp05303\" data-row=\"mp05303\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp05304\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp05304\" data-row=\"mp05304\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp05305\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp05305\" data-row=\"mp05305\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	</tr><tr id=\"tr98e182c7cde7a34bb383f964b7db3e20805416a0\">\n\n<td class=\"td-time\">\n\n<div id=\"parent98e182c7cde7a34bb383f964b7db3e20805416a0\" class=\"timeblock\">\n<strong id=\"data98e182c7cde7a34bb383f964b7db3e20805416a0\">03:50 pm - 04:35 pm</strong>\n<button data-time=\"98e182c7cde7a34bb383f964b7db3e20805416a0\" class=\"changethetime btn btn-primary btn-xs pull-right\"><i class=\"fa fa-pencil\"></i></button>\n</div>\n\n<div id=\"edit98e182c7cde7a34bb383f964b7db3e20805416a0\" class=\"hideedittime text-center\" style=\"display: none;\">\n  <input id=\"input98e182c7cde7a34bb383f964b7db3e20805416a0\" type=\"text\" class=\"form-control\" value=\"03:50 pm - 04:35 pm\"><p></p><button data-save=\"98e182c7cde7a34bb383f964b7db3e20805416a0\" class=\"savetime btn btn-block btn-xs btn-primary\"><i class=\"fa fa-floppy-o\"></i> Guardar</button><button data-block=\"98e182c7cde7a34bb383f964b7db3e20805416a0\" class=\"deleteblock btn btn-block btn-xs btn-warning\"><i class=\"fa fa-ban\"></i> Eliminar </button><button class=\"canceledit btn btn-block btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Cancelar\n</button></div>\n\n</td>\n       <td class=\"td-line\">\n         <div id=\"mp53401\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp53401\" data-row=\"mp53401\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp53402\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp53402\" data-row=\"mp53402\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp53403\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp53403\" data-row=\"mp53403\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp53404\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp53404\" data-row=\"mp53404\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp53405\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp53405\" data-row=\"mp53405\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>      \n         </div>\n      </td>\n	</tr><tr id=\"tra6a2bbf7fd6fac7d306b60d688b84fee34a14025\">\n\n<td class=\"td-time\">\n\n<div id=\"parenta6a2bbf7fd6fac7d306b60d688b84fee34a14025\" class=\"timeblock\">\n<strong id=\"dataa6a2bbf7fd6fac7d306b60d688b84fee34a14025\">04:35 pm - 05:20 pm</strong>\n<button data-time=\"a6a2bbf7fd6fac7d306b60d688b84fee34a14025\" class=\"changethetime btn btn-primary btn-xs pull-right\"><i class=\"fa fa-pencil\"></i></button>\n</div>\n\n<div id=\"edita6a2bbf7fd6fac7d306b60d688b84fee34a14025\" class=\"hideedittime text-center\" style=\"display: none;\">\n  <input id=\"inputa6a2bbf7fd6fac7d306b60d688b84fee34a14025\" type=\"text\" class=\"form-control\" value=\"04:35 pm - 05:20 pm\"><p></p><button data-save=\"a6a2bbf7fd6fac7d306b60d688b84fee34a14025\" class=\"savetime btn btn-block btn-xs btn-primary\"><i class=\"fa fa-floppy-o\"></i> Guardar</button><button data-block=\"a6a2bbf7fd6fac7d306b60d688b84fee34a14025\" class=\"deleteblock btn btn-block btn-xs btn-warning\"><i class=\"fa fa-ban\"></i> Eliminar </button><button class=\"canceledit btn btn-block btn-xs btn-danger\"><i class=\"fa fa-times\"></i> Cancelar\n</button></div>\n\n</td>\n       <td class=\"td-line\">\n         <div id=\"mp02501\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp02501\" data-row=\"mp02501\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp02502\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp02502\" data-row=\"mp02502\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp02503\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp02503\" data-row=\"mp02503\" class=\"addinfo btn btn-xs btn-primary\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp02504\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp02504\" data-row=\"mp02504\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	\n       <td class=\"td-line\">\n         <div id=\"mp02505\" class=\"col-sm-12 nopadding\"></div>\n         <div class=\"col-sm-12 text-center\">\n            <button id=\"edit-mp02505\" data-row=\"mp02505\" class=\"addinfo btn btn-xs btn-primary\" style=\"display: none;\"><i class=\"fa fa-plus\"></i></button>\n         </div>\n      </td>\n	</tr></tbody></table>\n\n<input type=\"hidden\" id=\"descripcioninput\" value=\"aula:1ro A  ubicado en la entrada \">\n<input type=\"hidden\" id=\"nombreinput\" value=\"Primero A\">\n\n<button class=\"guardarhorario btn btn-lg btn-warning pull-right\"><i class=\"fa fa-floppy-o\"></i> Guardar</button>\n\n","2020-08-31");



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
  CONSTRAINT `inscribir_ibfk_2` FOREIGN KEY (`gestion`) REFERENCES `gestion` (`gestion`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `inscribir_ibfk_3` FOREIGN KEY (`grado`) REFERENCES `curso` (`idcurso`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `inscribir_ibfk_4` FOREIGN KEY (`jornada`) REFERENCES `jornada` (`jornada`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=285 DEFAULT CHARSET=utf8mb4;

INSERT INTO inscribir VALUES("1","99999999","2","TARDE","2020","2020-05-07 10:23:41","1","1");
INSERT INTO inscribir VALUES("2","7949515","2","TARDE","2020","2020-05-07 10:24:08","1","1");
INSERT INTO inscribir VALUES("3","76767676","1","MAÑANA","2020","2020-05-14 15:58:15","1","1");
INSERT INTO inscribir VALUES("281","87652323","3","TARDE","2020","2020-07-23 08:32:18","1","1");
INSERT INTO inscribir VALUES("282","7949545","39","TARDE","2020","2020-08-11 09:40:43","1","1");
INSERT INTO inscribir VALUES("283","76767678","5","TARDE","2020","2020-08-11 09:41:54","1","1");
INSERT INTO inscribir VALUES("284","89765412","3","TARDE","2020","2020-08-11 09:46:24","1","1");



DROP TABLE IF EXISTS jornada;

CREATE TABLE `jornada` (
  `jornada` varchar(20) NOT NULL,
  PRIMARY KEY (`jornada`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO jornada VALUES("MAÑANA");
INSERT INTO jornada VALUES("NOCHE");
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
  `ci` int(11) NOT NULL,
  `idmateria` int(11) NOT NULL,
  `bimestre1` int(10) NOT NULL,
  `bimestre2` int(10) NOT NULL,
  `bimestre3` int(10) NOT NULL,
  `bimestre4` int(10) NOT NULL,
  PRIMARY KEY (`idnota`),
  KEY `idalumno` (`ci`),
  KEY `idmateria` (`idmateria`),
  CONSTRAINT `notas_ibfk_5` FOREIGN KEY (`idmateria`) REFERENCES `materia` (`idmateria`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

INSERT INTO notas VALUES("1","7949515","1","23","80","23","40");
INSERT INTO notas VALUES("2","7949515","2","12","0","0","0");
INSERT INTO notas VALUES("3","76767676","1","50","50","90","78");
INSERT INTO notas VALUES("8","76767676","2","56","78","0","0");
INSERT INTO notas VALUES("9","76767676","3","56","56","89","90");
INSERT INTO notas VALUES("10","76767676","4","56","65","78","90");
INSERT INTO notas VALUES("11","76767676","1","98","0","0","0");
INSERT INTO notas VALUES("13","87652323","1","100","40","50","90");
INSERT INTO notas VALUES("14","89765412","1","56","76","51","50");
INSERT INTO notas VALUES("15","89765412","2","87","57","0","0");
INSERT INTO notas VALUES("16","89765412","3","100","0","0","0");
INSERT INTO notas VALUES("17","76767676","4","98","70","0","0");



DROP TABLE IF EXISTS profesor;

CREATE TABLE `profesor` (
  `idprofesor` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

INSERT INTO profesor VALUES("1","76655484","JESSICA","MAMANI CRUZ","CALVARIO","2019-12-12","mamni@gamail.com","43221234","LIC. MATEMATICAS","1","1");
INSERT INTO profesor VALUES("2","45433234","MARIO","VELIS ORTIS","CALLE BOLIVAR ENTRE AROMA Y LA PAZ N° 3","2020-01-17","mario@gmail.com","72733456","LIC. MATEMATICAS","1","1");
INSERT INTO profesor VALUES("3","99999999","FANNY","ALBAREZ","AAAAAAAA","2020-01-10","peke3862@gmail.com","72733929","LIC. RELIGION","1","1");
INSERT INTO profesor VALUES("4","99999994","JHOEL  MATIAS","ALBAREZ GOMEZ","WACHACA CHICO","2004-02-06","matias@gmail.com","72727272","LICENCIATURA FISICA","1","1");
INSERT INTO profesor VALUES("5","988987878","ROCABADO","FERNANDEZ LEDEZMA","COLCAPIRUA","1990-09-12","rocabado@gmail.com","65767676","LICENCIATURA LITERAATURA","1","1");
INSERT INTO profesor VALUES("6","34321231","MELANI ","GUTIERREZ LOZA","PASO ","1995-07-12","melani@gmail.com","766552222","LICENCIATURA CIENCIAS DE LA EDUCACION","1","1");
INSERT INTO profesor VALUES("7","65453423","MICAELA ","CARTAGENA QUISPE","BARRIO MANACO","1995-06-07","micaela@gmail.com","76764455","LICENCIATURA CIENCIAS SOCIALES","1","1");
INSERT INTO profesor VALUES("8","23231564","GUALTER","ROJAS MEDRAANO","TIQUIPAYA","1994-03-12","gualter@gmail.com","767673434","LICENCIATURA RELIGION","1","1");
INSERT INTO profesor VALUES("9","12145354","FREEDY","ESCALARE ESCOBAR","PLAZA CALA CALA","1997-09-12","freddy@gmail.com","71655490","LICENCIATURA MUSICA","1","1");
INSERT INTO profesor VALUES("10","7949666","ISAC ","GOMEZ  MEDRANO","SAN JORGE KM 19","1990-08-11","isac@gmail.com","65444888","LIENCIATURA EDUCACION FISICA","1","1");



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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO tutores VALUES("1","65453436","ROBERT  GUTIERRES BUSTAMANTE","2019-12-18","POLICIA","45459889","MARIA GUSMAN VILALO","2019-12-04","COSTURERA","CHULLA","72733929","45454543","robert@gmail.com","1","1");
INSERT INTO tutores VALUES("2","23232323","GERMAN ALBAREZ VILADO","2020-01-19","CHOFER","0","","0000-00-00","","VILOMA","12345678","45454543","german@gmail.com","1","1");
INSERT INTO tutores VALUES("3","0","","0000-00-00","","34454334","ROSA GOMEEZ MEDRANO","2020-01-25","AMA DE CASA","SIPE SIPE","77254324","0","rosita@gmail.com","1","1");
INSERT INTO tutores VALUES("4","23232323","JUAN","2020-01-11","DOCTOR","0","","0000-00-00","","VINTO","72733989","0","fanny@gmail.com","1","1");
INSERT INTO tutores VALUES("5","87675654","MARCELO INOJOSA MURILLO","1993-08-11","CARPINTERO","78780023","MARIA LOZA VELIZ","1995-08-11","AMA DE CAMA","QUILLACOLLO","77254324","77254324","maria@gmail.com","1","1");
INSERT INTO tutores VALUES("6","45454465","DEINS CREPO ARNEZ","1998-08-11","ABOGADO","78780577","JASINTA OTALORA RUIZ","1999-08-11","ENFERMERA","VINTO","72733222","72733333","jasint@gmail.com","1","1");
INSERT INTO tutores VALUES("7","0","","0000-00-00","","66780023","LUISA ALCOSER ROMERO","1993-08-11","DOCTORA","SIPE SIPE","77548888","0","luisita@gmail.com","1","1");
INSERT INTO tutores VALUES("8","0","","0000-00-00","","78780599","JENNYFER GOSALES MOSTACEDO","1982-08-11","CORTE Y CONFECCION","MANACO KM 13","65444211","65444889","fenny@gmail.com","1","1");



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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

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



SET FOREIGN_KEY_CHECKS=1;