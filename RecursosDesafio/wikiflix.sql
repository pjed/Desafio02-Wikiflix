-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 01-12-2019 a las 13:36:33
-- Versión del servidor: 5.7.28-0ubuntu0.18.04.4
-- Versión de PHP: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `wikiflix`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `idgeneros` varchar(100) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`idgeneros`, `descripcion`) VALUES
('1', 'Gangsters'),
('2', 'Epica'),
('3', 'Acción'),
('4', 'Aventuras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `idnoticia` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `usuario_usuario` varchar(50) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`idnoticia`, `titulo`, `usuario_usuario`, `fecha`, `descripcion`) VALUES
(1, 'Noticia 1', 'espinosaduque@gmail.com', '2019-11-26 00:00:00', 'Esto es la descripcion de la noticia 1 pues queda dicho y se dijo...');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `idpelicula` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `produccion` varchar(100) NOT NULL,
  `guion` varchar(100) NOT NULL,
  `musica` varchar(100) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `ano` varchar(4) NOT NULL,
  `estreno` varchar(100) NOT NULL,
  `duracion` varchar(45) NOT NULL,
  `idiomas` varchar(200) NOT NULL,
  `productora` varchar(100) NOT NULL,
  `distribucion` varchar(100) NOT NULL,
  `presupuesto` varchar(100) NOT NULL,
  `recaudacion` varchar(100) NOT NULL,
  `generos_idgeneros` varchar(100) NOT NULL,
  `argumento` varchar(500) NOT NULL,
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`idpelicula`, `nombre`, `direccion`, `produccion`, `guion`, `musica`, `pais`, `ano`, `estreno`, `duracion`, `idiomas`, `productora`, `distribucion`, `presupuesto`, `recaudacion`, `generos_idgeneros`, `argumento`, `foto`) VALUES
(1, 'The Irishman', 'Martin Scorsese', 'Martin Scorsese', 'Steven Zaillian', 'Seann Sara Sella', 'Estados Unidos', '2019', '1 de noviembre de 2019 (cines)<br>27 de noviembre de 2019 (Netflix)', '209 minutos', 'Inglés', 'TriBeCa Productions<br>STX Entertainment<br>Sikelia Productions', 'Netflix', '159 000 000 USD1', '4 400 000 USD', '1', 'El irlandés narra la historia de Frank Sheeran, un asesino a sueldo y veterano de guerra que desarrolló sus habilidades durante su servicio en Italia. Ahora anciano, recuerda los hechos que definieron su carrera como sicario, en particular el rol que ocupó en la desaparición de su viejo amigo y líder sindical Jimmy Hoffa y su participación en la familia criminal Bufalino.', NULL),
(2, 'The Irishman', 'Martin Scorsese', 'Martin Scorsese', 'Steven Zaillian', 'Seann Sara Sella', 'Estados Unidos', '2019', '1 de noviembre de 2019 (cines)<br>27 de noviembre de 2019 (Netflix)', '209 minutos', 'Inglés', 'TriBeCa Productions<br>STX Entertainment<br>Sikelia Productions', 'Netflix', '159 000 000 USD1', '4 400 000 USD', '2', 'El irlandés narra la historia de Frank Sheeran, un asesino a sueldo y veterano de guerra que desarrolló sus habilidades durante su servicio en Italia. Ahora anciano, recuerda los hechos que definieron su carrera como sicario, en particular el rol que ocupó en la desaparición de su viejo amigo y líder sindical Jimmy Hoffa y su participación en la familia criminal Bufalino.', NULL),
(11, 'Tomb Raider', 'nose', 'nose', 'nose', 'nose', 'EEUU', '2017', '2019', '120 min', 'EspaÃ±ol', 'Sony', 'Sony', '100', '100', '3', 'Lara Croft y sus peripecias jaja', NULL),
(12, 'Tomb Raider', 'nose', 'nose', 'nose', 'nose', 'EEUU', '2017', '2019', '120 min', 'EspaÃ±ol', 'Sony', 'Sony', '100', '100', '4', 'Lara Croft y sus peripecias jaja', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publica`
--

CREATE TABLE `publica` (
  `idpublica` int(11) NOT NULL,
  `usuario_usuario` varchar(50) NOT NULL,
  `pelicula_idpelicula` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `publica`
--

INSERT INTO `publica` (`idpublica`, `usuario_usuario`, `pelicula_idpelicula`, `fecha`) VALUES
(1, 'espinosaduque@gmail.com', 1, '2019-11-26 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idroles` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idroles`, `descripcion`) VALUES
(1, 'Registrado'),
(2, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_usuario`
--

CREATE TABLE `rol_usuario` (
  `rol_idroles` int(11) NOT NULL,
  `usuario_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol_usuario`
--

INSERT INTO `rol_usuario` (`rol_idroles`, `usuario_usuario`) VALUES
(1, 'amable@gmail.com'),
(1, 'asd'),
(1, 'b'),
(1, 'c'),
(1, 'd'),
(1, 'espinosaduque@gmail.com'),
(1, 'j'),
(1, 'q'),
(1, 'z'),
(2, 'espinosaduque@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario`, `password`, `nombre`, `apellidos`, `direccion`, `telefono`) VALUES
('amable@gmail.com', 'MQ==', 'Amable Espinosa', 'Sanchez', 'Cardenal Monescillo', '638616826'),
('asd', 'MQ==', 'asd', 'asd', 'asd', '111111111'),
('b', 'MQ==', 'b', 'b', 'b', '222222222'),
('c', 'MQ==', 'c', 'c', 'c', '444444444'),
('d', 'MQ==', 'd', 'd', 'd', '555555555'),
('espinosaduque@gmail.com', 'MQ==', 'Pedro Javier', 'Espinosa Duque', 'Cardenal Monescillo', '638288641'),
('j', 'MQ==', 'j', 'j', 'j', '111111111'),
('q', 'MQ==', 'q', 'q', 'q', '111111111'),
('z', 'MQ==', 'z', 'z', 'z', '121111111');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`idgeneros`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`idnoticia`,`usuario_usuario`),
  ADD KEY `fk_noticia_usuario1_idx` (`usuario_usuario`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`idpelicula`,`generos_idgeneros`),
  ADD KEY `FK_GENERO_PELICULA` (`generos_idgeneros`);

--
-- Indices de la tabla `publica`
--
ALTER TABLE `publica`
  ADD PRIMARY KEY (`idpublica`,`usuario_usuario`,`pelicula_idpelicula`),
  ADD KEY `fk_publica_usuario1_idx` (`usuario_usuario`),
  ADD KEY `fk_publica_pelicula1_idx` (`pelicula_idpelicula`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idroles`);

--
-- Indices de la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  ADD PRIMARY KEY (`rol_idroles`,`usuario_usuario`),
  ADD KEY `fk_rol_usuario_rol1_idx` (`rol_idroles`),
  ADD KEY `fk_rol_usuario_usuario1_idx` (`usuario_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `idnoticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `idpelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `publica`
--
ALTER TABLE `publica`
  MODIFY `idpublica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idroles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD CONSTRAINT `fk_noticia_usuario1` FOREIGN KEY (`usuario_usuario`) REFERENCES `usuario` (`usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD CONSTRAINT `FK_GENERO_PELICULA` FOREIGN KEY (`generos_idgeneros`) REFERENCES `generos` (`idgeneros`);

--
-- Filtros para la tabla `publica`
--
ALTER TABLE `publica`
  ADD CONSTRAINT `fk_publica_pelicula1` FOREIGN KEY (`pelicula_idpelicula`) REFERENCES `pelicula` (`idpelicula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_publica_usuario1` FOREIGN KEY (`usuario_usuario`) REFERENCES `usuario` (`usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  ADD CONSTRAINT `fk_rol_usuario_rol1` FOREIGN KEY (`rol_idroles`) REFERENCES `rol` (`idroles`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rol_usuario_usuario1` FOREIGN KEY (`usuario_usuario`) REFERENCES `usuario` (`usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
