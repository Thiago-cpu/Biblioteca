-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2020 a las 04:35:30
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `libreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idcom` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_lib` int(11) DEFAULT NULL,
  `comentario` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`idcom`, `id_user`, `id_lib`, `comentario`) VALUES
(6, 19, 22, 'Buen libro de mi infancia'),
(7, 19, 17, 'Para pensar'),
(8, 19, 18, 'Interesante lo que dice el bigote, me hubiera sido Ãºtil leerlo hace 2 aÃ±os, pero gracias'),
(9, 20, 23, 'Mi libro favorito\r\n'),
(10, 20, 22, 'Concuerdo con Strariux'),
(11, 21, 25, 'No me gusta el libro, siento que no es de mi agrado'),
(12, 21, 18, 'Strariux toxico'),
(13, 21, 16, 'Eso de pensar rapido a mi no me sale, me dedico de 5 a 8 horas diarias a procesar un pensamiento lentamente y buscar la mejor opciÃ³n. Thiago Valdiviezo\r\n'),
(16, 21, 21, 'Buen libro, me gusta, es interesante.'),
(17, 21, 17, 'Buen libro'),
(18, 22, 26, 'Buen libro'),
(19, 22, 22, 'Willy te sigo desde chiquito, no se si leas esto, pero me encantan tus videos y tus libros, saludos'),
(21, 24, 19, 'Me encanto el libro y toda su saga'),
(22, 24, 21, 'Interesante'),
(23, 19, 16, 'Listo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `titulo` varchar(50) DEFAULT NULL,
  `año` date DEFAULT NULL,
  `idioma` varchar(50) DEFAULT NULL,
  `edit` varchar(50) DEFAULT NULL,
  `pags` int(11) DEFAULT NULL,
  `sinopsis` varchar(512) DEFAULT NULL,
  `saga` varchar(10) DEFAULT NULL,
  `encuadernado` varchar(50) DEFAULT NULL,
  `autores` varchar(50) DEFAULT NULL,
  `genero` varchar(50) DEFAULT NULL,
  `portadasrc` varchar(200) DEFAULT NULL,
  `autorsrc` varchar(200) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`titulo`, `año`, `idioma`, `edit`, `pags`, `sinopsis`, `saga`, `encuadernado`, `autores`, `genero`, `portadasrc`, `autorsrc`, `id`) VALUES
('Pensar rápido, pensar despacio', '2011-10-25', 'Español', '	Farrar, Straus and Giroux', 499, 'Pensar Rápido, Pensar Despacio es un libro en el que se presenta una síntesis de las investigaciones realizadas por su autor, Daniel Kahneman, que fue ganador del Premio Nobel de Economía. El tema central es la forma de pensar de los seres humanos, que condiciona su vida. La obra presenta la dicotomía existente entre dos modos de pensamiento, a los que el autor llama \"Sistemas\". El Sistema 1 es rápido, instintivo y emocional; el Sistema 2 es lento, más racional, más lógico. ', 'No', 'Tapa Dura', 'Daniel Kahneman', 'No Ficcion', 'libros/PENSAR RAPIDO PENSAR DESPACIO.jpg', 'autores/Aurum-Speakers-Bureau-Daniel-Kahneman.jpg', 16),
('Tus zonas erróneas', '1976-08-01', 'Español', 'Random House Mondadori', 208, 'No proyectes tu insatisfacción en otros, la causa está en ti, en las zonas erróneas de tu personalidad, que te bloquean e impiden que te realices. Esta obra, quizá la más leída y respetada de toda la literatura de autoayuda, muestra dónde se encuentran, qué significan y cómo superarlas.', 'No', 'Tapa Dura', 'Wayne Dyer', 'Ensayo', 'libros/81zV3RqlEZL.jpg', 'autores/20150831183135-wayne-dyer.jpeg', 17),
('¿Amar o depender?', '2014-11-17', 'Español', 'Zenith', 208, '¿Amar o depender? un libro de referencia en situaciones de crisis de pareja. Entregarse afectivamente no implica desaparecer en el otro, sino integrarse respetuosamente. El amor sano es una suma de dos, en la cual nadie pierde.', 'No', 'Tapa Blanda', 'Walter Riso', 'Psicología | Divulgación psicológica', 'libros/amar-o-depender_9788408126249.jpg', 'autores/walter-riso.jpg', 18),
('Mr. Mercedes', '2014-06-03', 'Ingles', 'Scribner', 436, 'Mr. Mercedes, primera novela de la «Trilogía Bill Hodges», es la historia de una guerra entre el Bien y el Mal. Un retrato inolvidable de la mente de un asesino obsesionado y demente.', 'Si', 'Tapa Blanda', 'Stephen King', 'Crimen, Misterio, Thriller', 'libros/220px-Mrmercedes.jpg', 'autores/1111915.jpg', 19),
('Game Of Thrones', '1996-08-06', 'Ingles', 'Bantam Spectra, HarperCollins', 835, 'Tras el largo verano, el invierno se acerca a los Siete Reinos. Lord Eddars Stark, señor de Invernalia, deja sus dominios para unirse a la corte del rey Robert Baratheon el Usurpador, hombre díscolo y otrora guerrero audaz cuyas mayores aficiones son comer, beber y engendrar bastardos. Eddard Stark desempeñará el cargo de Mano del Rey e intentará desentrañar una maraña de intrigas que pondrá en peligro su vida... y la de los suyos.', 'Si', 'Rustica', 'George R. R. Martin', 'Novela', 'libros/c6276b30f0c71980dd7ec2a84c41a8b7.jpg', 'autores/24grrm-mobileMasterAt3x.jpg', 21),
('Wigetta. Un viaje magico', '2015-11-08', 'Español', 'Ediciones Temas de Hoy', 192, 'Una historia ilustrada e interactiva que se inspira en el mundo de los videojuegos.\r\nPara Willy y Vegetta, una invasión zombi que fulmina el sitio en el que vives es solo el principio de una gran aventura. Viajes a las profundidades, intensos duelos al amanecer, misteriosas brujas y temibles gigantes...', 'Si', 'Rústica con solapas', 'Guillermo Diaz y Samuel De Luque', 'Aventura, Fantasia', 'libros/portada_wigetta_vegetta777_201503131941.jpg', 'autores/28028332-288-k503504.jpg', 22),
('El principito', '1951-09-05', 'Español', 'Emecé Editores', 111, 'El principito es una narración corta del escritor francés Antoine de Saint-Exupéry, que trata de la historia de un pequeño príncipe que parte de su asteroide a una travesía por el universo, en la cual descubre la extraña forma en que los adultos ven la vida y comprende el valor del amor y la amistad.', 'No', 'Tapa Dura', 'Antoine de Saint-Exupéry', 'Novela, Fantasia', 'libros/9788478887194.jpg', 'autores/17191.jpg', 23),
('Harry Potter y la piedra filosofal', '1997-06-30', 'Ingles', 'Bloomsbury Publishing', 223, 'La obra comienza cuando Harry Potter siendo un bebe es dejado en la puerta de la casa de sus tíos por tres magos, quienes comentan que el mago más tenebroso había sido vencido por Harry, quien siendo apenas un bebe sobrevivió a la maldición de un poderoso mago que mato a sus padres. La historia continua cuando el niño cumplió diez años y seguía sin saber que era un mago.', 'Si', 'Tapa Dura', 'J. K. Rowling', 'Novela', 'libros/517DxWbJNZL._SY445_QL70_ML2_.jpg', 'autores/7b7b00b295974cd02f285f3bb1f94ae9ce-3-jk-rowling.rvertical.w1200.jpg', 25),
('Cien años de soledad', '1967-06-05', 'Español', 'Sudamericana', 471, 'El libro narra la historia de la familia Buendía a lo largo de siete generaciones en el pueblo ficticio de Macondo. ... En medio del camino José Arcadio Buendía tiene un sueño en que se le aparecen construcciones con paredes de espejo y, preguntando su nombre, le responden \"Macondo\".\r\n', 'No', 'Cuero', 'Gabriel García Márquez', 'Novela', 'libros/220px-Cien_años_de_soledad.png', 'autores/gabrielgarciamarquez12.jpg', 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `nickname` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contra` varchar(20) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `user_img` varchar(200) DEFAULT 'usuarios/default.PNG',
  `admin` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `apellido`, `fecha_nac`, `nickname`, `email`, `contra`, `id_user`, `user_img`, `admin`) VALUES
('Alejo', 'Ironi', '2000-11-14', 'Strariux', 'alejo.simonian9@gmail.com', 'alejoironi', 19, 'usuarios/FuerzaNatural.jpg', b'1'),
('Tomas', 'Canosa', '2003-01-18', 'Abrocoly', 'Abrocoly@gmail.com', 'abrocoly123', 20, 'usuarios/Screenshot_4.png', b'0'),
('Thiago', 'Valdiviezo', '2002-08-14', 'Pasta', 'Pasta@gmail.com', 'Pasta123', 21, 'usuarios/Captura de pantalla 2020-11-08 225917.png', b'0'),
('Lucas', 'Torres', '2002-11-28', 'Wachiraton', 'Wachiraton@gmail.com', 'wachiwachi', 22, 'usuarios/9a9801955564ce4d2376fff92bca1615.jpg', b'0'),
('Leandro', 'Britez', '2003-03-02', 'Wachirata', 'Wachirata@gmail.com', 'Wachiarata123', 23, 'usuarios/default.PNG', b'0'),
('Fiorella', 'Rodriguez', '2002-02-01', 'Fiore', 'fiorerodriguez@gmail.com', 'Fio123', 24, 'usuarios/MP-Stephen_King.png', b'0'),
('Thiago2', 'Valdiviezo', '2002-08-14', 'ThiagoLoco', 'thiagoloco@gmail.com', 'default', 25, 'usuarios/default.PNG', b'0'),
('Thiago23', 'Valdiviezo', '2002-08-14', 'ThiagoLoco3', 'thiagol3oco@gmail.com', 'qweqwe', 26, 'usuarios/default.PNG', b'0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idcom`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_lib` (`id_lib`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idcom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_lib`) REFERENCES `libros` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
