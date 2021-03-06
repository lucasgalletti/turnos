-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 21-09-2020 a las 23:52:02
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ehs_indumentaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `legajo` int(11) NOT NULL,
  `id_sector` int(11) NOT NULL,
  `user` varchar(16) COLLATE utf8_spanish_ci NOT NULL,
  `pass` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `id_rol` int(2) NOT NULL,
  PRIMARY KEY (`id_usuario`,`user`)
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `legajo`, `id_sector`, `user`, `pass`, `id_rol`) VALUES
(1, 'Julieta', 'Pugliese', 34320, 7, 'jpugliese', '123', 2),
(2, 'Ignacio', 'Toledo', 34226, 7, 'itoledo', '123', 2),
(3, 'Virginia', 'Garzon', 34326, 7, 'vgarzon', '123', 2),
(4, 'Pablo', 'Regueiro', 33988, 2, 'pregueir', '123', 3),
(5, 'Guadalupe', 'Gallego', 34183, 2, 'ggallego', '123', 3),
(6, 'Mariano', 'Sole', 34232, 2, 'msole', '123', 3),
(7, 'Lucas', 'Galletti', 0, 8, 'lgalletti', '123', 1),
(8, 'Laura Veronica', 'Castro', 22373, 3, 'lcastro', '123', 3),
(9, 'Claudia Beatriz', 'Benincasa', 22386, 3, 'cbenincasa', '123', 3),
(10, 'Diego Javier', 'Corti', 22388, 2, 'dcorti', '123', 3),
(11, 'Nora Emilce', 'Gonzalez', 22389, 2, 'ngonzalez', '123', 3),
(12, 'Omar Agustin', 'Castro', 22417, 3, 'ocastro', '123', 3),
(13, 'Romina Valeria', 'Naveira', 22421, 2, 'rnaveira', '123', 3),
(14, 'Lidia Noemi', 'Videla', 22439, 2, 'lvidela', '123', 3),
(15, 'Alejandro Omar', 'Santos', 26712, 6, 'asantos', '123', 3),
(16, 'Alejandro Miguel', 'Moscatelli', 33081, 2, 'amoscatelli', '123', 3),
(17, 'Gladys Elena', 'Bobinac', 33819, 10, 'gbobinac', '123', 3),
(18, 'Leonardo Ariel', 'Navarro', 33833, 3, 'lnavarro', '123', 3),
(19, 'Marcela Andrea', 'Casal', 33844, 3, 'mcasal', '123', 3),
(20, 'Marcela Noemi', 'Movio', 33854, 3, 'mmovio', '123', 3),
(21, 'Carlos Alberto', 'Lestudie', 33868, 1, 'clestudie', '123', 3),
(22, 'Daniel Diego', 'Scibilia', 33872, 4, 'dscibilia', '123', 3),
(23, 'Lila Gabriela', 'Gonzalez', 33890, 1, 'lgonzalez', '123', 3),
(24, 'Claudia Lorena', 'Rolon', 33895, 2, 'crolon', '123', 3),
(25, 'German Ezequiel', 'Balbuena', 33917, 6, 'gbalbuena', '123', 3),
(26, 'Guillermo Maximiliano', 'Grumelli', 33925, 6, 'ggrumelli', '123', 3),
(27, 'Marchet Gisela Silvana', 'Bonfiglio', 33972, 2, 'mbonfiglio', '123', 3),
(28, 'Hector Hugo', 'Flores', 33976, 1, 'hflores', '123', 3),
(29, 'Walter Eduardo', 'Vidal', 33977, 1, 'wvidal', '123', 3),
(30, 'Juan Jose', 'Lista', 33979, 10, 'jlista', '123', 3),
(31, 'Lidia Beatriz', 'Kloberdanz', 33980, 1, 'lkloberdanz', '123', 3),
(32, 'Sergio Alfredo', 'Lemos', 33982, 10, 'slemos', '123', 3),
(33, 'Alfredo', 'Ovando', 33985, 10, 'aovando', '123', 3),
(34, 'Susana Ines', 'Ponce', 33991, 2, 'sponce', '123', 3),
(35, 'Francisco Jose', 'Portela', 33992, 2, 'fportela', '123', 3),
(36, 'Jorge Daniel', 'Reyes', 33993, 10, 'jreyes', '123', 3),
(37, 'Walter Ramon', 'Mendez', 33997, 1, 'wmendez', '123', 3),
(38, 'Juan Pablo Cristian', 'Baltore', 33999, 1, 'jbaltore', '123', 3),
(39, 'Angel Emilio', 'Maidana', 34000, 6, 'amaidana', '123', 3),
(40, 'Ricardo', 'Toledo', 34001, 10, 'rtoledo', '123', 3),
(41, 'Javier Enrique', 'Salega', 34002, 1, 'jsalega', '123', 3),
(42, 'Mario Fernando', 'Basso', 34003, 1, 'mbasso', '123', 3),
(43, 'Franco Rodrigo', 'Benitez', 34005, 9, 'fbenitez', '123', 3),
(44, 'Eduardo Alberto', 'Monteiro Franqueira', 34007, 6, 'amonteiro', '123', 3),
(45, 'Lucas Gabriel', 'Pawluch', 34009, 1, 'lpawluch', '123', 3),
(46, 'Javier Nicolas', 'Sanchez', 34013, 1, 'jsanchez', '123', 3),
(47, 'Claudia Alejandra', 'Ponce', 34014, 1, 'cponce', '123', 3),
(48, 'Ariel Leonardo', 'Semeniuk', 34015, 1, 'asemeniuk', '123', 3),
(49, 'Fernando Lionel', 'Bazan', 34016, 1, 'fbazan', '123', 3),
(50, 'Leonardo Adrian', 'Segovia', 34018, 1, 'lsegovia', '123', 3),
(51, 'Andrea Judith', 'Zelwianski', 34019, 3, 'azelwianski', '123', 3),
(52, 'Gabriel Evaristo', 'Maciel', 34020, 1, 'gmaciel', '123', 3),
(53, 'Cesar Luis', 'Barrionuevo', 34021, 1, 'cbarrionuevo', '123', 3),
(54, 'Miguel Ernesto', 'Viera', 34025, 1, 'mviera', '123', 3),
(55, 'Heleno Rafael', 'Herbotte', 34027, 1, 'hherbotte', '123', 3),
(56, 'Flavio Javier', 'Montivero', 34028, 10, 'fmontivero', '123', 3),
(57, 'Luis Ariel', 'De Mattia', 34029, 10, 'ldemattia', '123', 3),
(58, 'Juan Pablo', 'Vercelli', 34034, 1, 'jvercelli', '123', 3),
(59, 'Ricardo Fabian', 'Diarte', 34035, 10, 'rdiarte', '123', 3),
(60, 'Hernan Ivan', 'Araujo', 34036, 1, 'haraujo', '123', 3),
(61, 'Jorge Sebastian', 'Bossio', 34037, 2, 'jbossio', '123', 3),
(62, 'Ariel Fabian', 'Gerige', 34038, 1, 'agerige', '123', 3),
(63, 'Adrian Oscar', 'Juarez', 34042, 2, 'ajuarez', '123', 3),
(64, 'Marcelo Ariel', 'Sanchez', 34045, 1, 'msanchez', '123', 3),
(65, 'Nelson Alexander', 'Lemos', 34047, 1, 'nlemos', '123', 3),
(66, 'Jose Javier', 'Soldani', 34051, 1, 'jsoldani', '123', 3),
(67, 'Luciano Matias', 'De Luca', 34052, 6, 'ldeluca', '123', 3),
(68, 'Romina Valeria', 'Shimabukuro', 34054, 2, 'rshimabukuro', '123', 3),
(69, 'Vanesa Veronica', 'Godoy', 34057, 1, 'vgodoy', '123', 3),
(70, 'Monica Ines', 'Ortiz', 34058, 1, 'mortiz', '123', 3),
(71, 'Maria Ines', 'Franco', 34059, 2, 'mfranco', '123', 3),
(72, 'Nerina Sonia', 'Diaz', 34060, 2, 'ndiaz', '123', 3),
(73, 'Pablo Daniel', 'Zabala', 34061, 1, 'pzabala', '123', 3),
(74, 'Liliana Cecilia', 'Enrrst', 34063, 1, 'lenrrst', '123', 3),
(75, 'Sofia Lorena', 'Sequeira', 34065, 1, 'ssequeira', '123', 3),
(76, 'Gustavo Abraham', 'Santa Cruz Aguilera', 34069, 1, 'gsantac', '123', 3),
(77, 'Leonardo Adrian', 'Raffaelli', 34070, 1, 'lraffaelli', '123', 3),
(78, 'Veronica Alejandra', 'Fernandez', 34075, 2, 'vfernandez', '123', 3),
(79, 'Jaquelina Elizabeth', 'Mendoza', 34076, 3, 'jmendoza', '123', 3),
(80, 'Irma', 'Almada Fernandez', 34080, 1, 'ialmada', '123', 3),
(81, 'Luis Enrique', 'Kauffmann', 34081, 1, 'lkauffmann', '123', 3),
(82, 'Facundo Ariel', 'Sassano', 34082, 3, 'fsassano', '123', 3),
(83, 'Fernando Ariel', 'Villareal', 34092, 2, 'fvillareal', '123', 3),
(84, 'Fernando Javier', 'Girlando', 34102, 2, 'fgirlando', '123', 3),
(85, 'Guillermo Eduardo', 'Fernandez Scarano', 34103, 2, 'gfernandez', '123', 3),
(86, 'Jesica Natalia', 'Jorge', 34110, 2, 'jjorge', '123', 3),
(87, 'Rolando Antonio', 'Suarez', 34120, 2, 'rsuarez', '123', 3),
(88, 'Miriam Dora', 'Piermarteri', 34130, 2, 'mpiermarteri', '123', 3),
(89, 'Javier Alejandro', 'Gamberg', 34132, 8, 'jgamberg', '123', 3),
(90, 'Pablo Emiliano', 'Portela', 34138, 10, 'pportela', '123', 3),
(91, 'Walter Matias', 'Lopez', 34141, 2, 'wlopez', '123', 3),
(92, 'Matias Lionel', 'Cantero', 34143, 3, 'mcantero', '123', 3),
(93, 'Pablo Ricardo', 'Makse', 34150, 10, 'pmakse', '123', 3),
(94, 'Hector Nicolas', 'Gomez', 34152, 1, 'hgomez', '123', 3),
(95, 'Roberto Adrian', 'Bottelli', 34160, 10, 'rbottelli', '123', 3),
(96, 'Eduardo Fabian', 'Torres', 34166, 6, 'etorres', '123', 3),
(97, 'Javier', 'Bianchi', 34169, 3, 'jbianchi', '123', 3),
(98, 'Oscar Gabriel', 'Paez', 34170, 10, 'opaez', '123', 3),
(99, 'Noelia Andrea', 'Gomez', 34171, 3, 'ngomez', '123', 3),
(100, 'Pablo Sebastian', 'Medina', 34174, 10, 'pmedina', '123', 3),
(101, 'Matias Ezequiel', 'Inveraldi', 34178, 2, 'minveraldi', '123', 3),
(102, 'Leonardo Gabriel', 'Orfano', 34187, 10, 'lorfano', '123', 3),
(103, 'Christian Ariel', 'Sanchez', 34189, 2, 'csanchez', '123', 3),
(104, 'Viviana Georgina', 'Di Vincenzo', 34202, 1, 'vdivincenzo', '123', 3),
(105, 'Omar Esteban', 'Flores', 34204, 2, 'oflores', '123', 3),
(106, 'Ignacio José', 'Posadas', 34206, 3, 'iposadas', '123', 3),
(107, 'Emmanuel Guillermo', 'Rios', 34207, 10, 'erios', '123', 3),
(108, 'Ricardo Hernan', 'Centorbi', 34211, 10, 'rcentorbi', '123', 3),
(109, 'Solange Vanina', 'Alvarez', 34212, 3, 'salvarez', '123', 3),
(110, 'Maximiliano Nicolas', 'Lembo Terre', 34214, 8, 'mlembo', '123', 3),
(111, 'Diego', 'Maidana', 34220, 10, 'dmaidana', '123', 3),
(112, 'Carlos Daniel', 'Leal', 34227, 5, 'cleal', '123', 3),
(113, 'Miguel', 'Guerra', 34229, 3, 'mguerra', '123', 3),
(114, 'Marcelo Ricardo', 'Portioli', 34230, 2, 'mportioli', '123', 3),
(115, 'Maria Fernanda', 'Montes', 34233, 2, 'mmontes', '123', 3),
(116, 'Diego Alberto', 'Rojas Galarza', 34234, 2, 'drojas', '123', 3),
(117, 'Ignacio David', 'Salariato', 34235, 10, 'isalariato', '123', 3),
(118, 'Valeria Elizabeth', 'Meli', 34236, 3, 'vmeli', '123', 3),
(119, 'Alejandro', 'Luna', 34238, 1, 'aluna', '123', 3),
(120, 'Alberto Daniel', 'Medina', 34239, 1, 'amedina', '123', 3),
(121, 'Pablo Jesus', 'Protasiewicz', 34241, 10, 'pprotasiewicz', '123', 3),
(122, 'Ivan Rodrigo', 'Lizarraga', 34243, 1, 'ilizarraga', '123', 3),
(123, 'Hugo', 'Andino', 34244, 2, 'handino', '123', 3),
(124, 'Oscar Sebastian', 'Gomez Coria', 34247, 10, 'ogomez', '123', 3),
(125, 'Roberto Gustavo', 'Dellucchi', 34248, 1, 'rdellucchi', '123', 3),
(126, 'Irma Beatriz', 'Carrizo', 34249, 1, 'icarrizo', '123', 3),
(127, 'Facundo Sebastian', 'Mongelos', 34250, 2, 'fmongelos', '123', 3),
(128, 'Hector Anibal', 'Palacios', 34251, 1, 'hpalacios', '123', 3),
(129, 'Marcos Ramon Antonio', 'Suarez', 34252, 1, 'msuarez', '123', 3),
(130, 'Walter Oscar', 'Echebarne', 34254, 1, 'wechebarne', '123', 3),
(131, 'Luis Alberto', 'Ruffet', 34255, 10, 'lruffet', '123', 3),
(132, 'Rocio Florencia', 'Rodriguez', 34257, 6, 'rrodriguez', '123', 3),
(133, 'Gustavo Daniel', 'Espindola', 34258, 1, 'gespindola', '123', 3),
(134, 'Gaston Oscar', 'Aicardi', 34259, 1, 'gaicardi', '123', 3),
(135, 'Gustavo Ariel', 'Arrieta', 34260, 2, 'garrieta', '123', 3),
(136, 'Oscar Daniel', 'Rodriguez Moron', 34261, 1, 'orodriguez', '123', 3),
(137, 'Fernando Daniel', 'Sanchez', 34262, 1, 'fsanchez', '123', 3),
(138, 'Jeronimo Agustin', 'Sanchez', 34263, 1, 'jsanchez', '123', 3),
(139, 'Brenda', 'Marquez', 34265, 2, 'bmarquez', '123', 3),
(140, 'Alejandro Daniel', 'Puntillo', 34267, 1, 'apuntillo', '123', 3),
(141, 'Nicolas Ezequiel', 'Calbanese', 34268, 1, 'ncalbanese', '123', 3),
(142, 'Juan Domingo', 'Perea', 34269, 1, 'jperea', '123', 3),
(143, 'Nahuel Leandro', 'Stark', 34272, 1, 'nstark', '123', 3),
(144, 'Francisco Jesus Maria', 'Galarza', 34273, 2, 'fgalarza', '123', 3),
(145, 'Maria Laura', 'Dejesus', 34274, 1, 'mdejesus', '123', 3),
(146, 'Cristian Miguel', 'Perez', 34275, 10, 'cperez', '123', 3),
(147, 'Dario Omar', 'Hazan', 34276, 2, 'dhazan', '123', 3),
(148, 'Romina Ester', 'Higa', 34277, 2, 'rhiga', '123', 3),
(149, 'Nestor Alejandro', 'Mendy', 34278, 2, 'nmendy', '123', 3),
(150, 'Claudia Andrea', 'Ventrice', 34279, 3, 'cventrice', '123', 3),
(151, 'Luis Alejandro', 'Espinoza Tezara', 34280, 2, 'lespinoza', '123', 3),
(152, 'Marcelo Alejandro', 'Palavecino', 34281, 1, 'mpalavecino', '123', 3),
(153, 'Sergio Denis', 'Vera Lopez', 34282, 10, 'svera', '123', 3),
(154, 'Florencia Cecilia', 'Ibañez', 34284, 4, 'fibañez', '123', 3),
(155, 'Glenda', 'Pollard', 34285, 4, 'gpollard', '123', 3),
(156, 'Agustin', 'Motta', 34288, 1, 'amotta', '123', 3),
(157, 'Gustavo Ariel', 'Almeida', 34289, 6, 'galmeida', '123', 3),
(158, 'Patricia Susana', 'Bonamico', 34290, 1, 'pbonamico', '123', 3),
(159, 'Fermin', 'Cañete Alberdi', 34293, 5, 'fcañete', '123', 3),
(160, 'Tamara Soledad', 'Napoli', 34294, 2, 'tnapoli', '123', 3),
(161, 'Cristina Gladys', 'Monzon', 34296, 1, 'cmonzon', '123', 3),
(162, 'Andres Sergio', 'Papini', 34297, 1, 'apapini', '123', 3),
(163, 'Edith Astrid', 'Firpo', 34299, 1, 'efirpo', '123', 3),
(164, 'Nancy Del Carmen', 'Ortega Ariza', 34300, 1, 'nortega', '123', 3),
(165, 'Lorena Vanesa', 'Galindez', 34301, 2, 'lgalindez', '123', 3),
(166, 'Matias Nahuel', 'Lacabe', 34304, 1, 'mlacabe', '123', 3),
(167, 'Jose Ignacio', 'Leon Garcia', 34305, 1, 'jleon', '123', 3),
(168, 'Jose Leonardo', 'Ballesteros', 34307, 1, 'jballesteros', '123', 3),
(169, 'Marcelo Alejandro', 'Cabrera', 34308, 1, 'mcabrera', '123', 3),
(170, 'Leonardo Atilio', 'Fernandez', 34309, 1, 'lfernandez', '123', 3),
(171, 'Ercilio Moises', 'Romero Coitiño', 34310, 1, 'eromero', '123', 3),
(172, 'Yael Estefania', 'Navas Alvarez', 34311, 2, 'ynavas', '123', 3),
(173, 'Eduardo Jose', 'Caraballo Gonzalez', 34312, 1, 'ecaraballo', '123', 3),
(174, 'Neuman Oscar', 'Sequera Garcia', 34313, 10, 'nsequera', '123', 3),
(175, 'Ayelen Natalia', 'Pelaytay', 34314, 3, 'apelaytay', '123', 3),
(176, 'Tomas Jose', 'Gallardo', 34316, 10, 'tgallardo', '123', 3),
(177, 'Leandro Gaston', 'Caceres', 34317, 1, 'lcaceres', '123', 3),
(178, 'Gonzalo Alejandro', 'Nuñez', 34318, 1, 'gnuñez', '123', 3),
(179, 'Miguel Angel', 'Abosaleh', 34319, 1, 'mabosaleh', '123', 3),
(180, 'Miguel Angel', 'Gomez', 34321, 9, 'mgomez', '123', 3),
(181, 'Diego German', 'Vitale', 34322, 2, 'dvitale', '123', 3),
(182, 'Sebastian Bernardo', 'Cossettini', 34324, 1, 'scossettini', '123', 3),
(183, 'Edgary Anabell', 'Bolivar Belandria', 34325, 2, 'ebolivar', '123', 3),
(184, 'Myriam Elizabeth', 'Navarro', 34327, 2, 'mnavarro', '123', 3),
(185, 'Monica Viviana', 'Aguirre', 34328, 1, 'maguirre', '123', 3),
(186, 'Jose Ariel', 'Pereyra', 34329, 1, 'jpereyra', '123', 3),
(187, 'Sebastian Walter', 'Rios', 34330, 1, 'srios', '123', 3),
(188, 'Valeria Natividad', 'Urquiza Carrizo', 34331, 1, 'vurquiza', '123', 3),
(189, 'Liliana Graciela', 'Guaymas', 34332, 1, 'lguaymas', '123', 3),
(190, 'Gonzalo Carlos Ezequiel', 'Segovia', 34334, 1, 'gsegovia', '123', 3),
(191, 'Lizandro Yoshimar', 'Infantes Reyes', 34335, 1, 'linfantes', '123', 3),
(192, 'Claudio Ezequiel', 'Flecha', 34336, 2, 'cflecha', '123', 3),
(193, 'Marcelo Daniel', 'Vazquez Merlo', 34337, 10, 'mvazquez', '123', 3),
(194, 'Sebastian', 'Medic Skontra', 34338, 10, 'smedic', '123', 3),
(195, 'Merlyn Vigdalia', 'Ramirez Suarez', 34340, 4, 'mramirez', '123', 3),
(196, 'Monica Sandra', 'Boiero', 34341, 1, 'mboiero', '123', 3),
(197, 'Marco Antonio', 'Martinez', 34342, 1, 'mmartinez', '123', 3),
(198, 'Maximiliano Hernan', 'Diaz', 34343, 6, 'mdiaz', '123', 3),
(199, 'Julian', 'Boyer', 34344, 1, 'jboyer', '123', 3),
(200, 'Claudio Sebastian', 'Batto Hernandez', 34345, 1, 'cbatto', '123', 3),
(201, 'Emilse Gabriela', 'Duarte', 34346, 2, 'eduarte', '123', 3),
(202, 'Yamila Natalia', 'Bisso', 34347, 2, 'ybisso', '123', 3),
(203, 'Gabriela Alejandra', 'Coria', 34350, 1, 'gcoria', '123', 3),
(204, 'Juan Martin', 'Huala', 34351, 4, 'jhuala', '123', 3),
(205, 'Carlos Yair', 'Sad', 34354, 1, 'csad', '123', 3),
(206, 'Luis Miguel', 'Valdez', 34356, 8, 'lvaldez', '123', 3),
(207, 'Maria Salomé', 'Cerra', 34357, 3, 'mcerra', '123', 3),
(208, 'Ariel Edgardo', 'Alonso', 34358, 10, 'aalonso', '123', 3),
(209, 'Hector Angel Ramon', 'Villareal', 34359, 1, 'hvillareal', '123', 3),
(210, 'Ignacio Tomas', 'Vargas Biason', 34360, 3, 'ivargas', '123', 3),
(211, 'Patricio', 'Cabada', 34361, 1, 'pcabada', '123', 3),
(212, 'Marcos Emmanuel', 'Suarez', 34364, 1, 'msuarez', '123', 3),
(213, 'Alejo', 'Leal', 34365, 1, 'aleal', '123', 3),
(214, 'Roberto Antonio', 'Albertoni', 34367, 1, 'ralbertoni', '123', 3),
(215, 'Maria Eva', 'Niz', 34369, 2, 'mniz', '123', 3),
(216, 'Luciana', 'Segalini', 34370, 2, 'lsegalini', '123', 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
