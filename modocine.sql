-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2020 a las 00:26:03
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `modocine`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `genero` varchar(40) NOT NULL,
  `sinopsis` text CHARACTER SET latin1 NOT NULL,
  `puntaje_imdb` float NOT NULL,
  `id_sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id`, `nombre`, `genero`, `sinopsis`, `puntaje_imdb`, `id_sala`) VALUES
(1, 'La Monja', 'Terror', 'Una monja se suicida en una abadía rumana y el Vaticano envía a un sacerdote y una novicia a investigar lo sucedido. Lo que ambos encuentran allá es un secreto perverso que los enfrentará cara a cara con el mal en su esencia más pura.', 5.3, 1),
(2, 'Tenet', 'Suspenso', 'Una acción épica que gira en torno al espionaje internacional, los viajes en el tiempo y la evolución, en la que un agente secreto debe prevenir la Tercera Guerra Mundial.', 7.8, 2),
(4, 'Ford vs Ferrari', 'Drama', 'El visionario automovilístico Carroll Shelby y su conductor británico Ken Miles reciben la misión de construir un nuevo automóvil con el fin de derrocar el dominio de Ferrari en el Campeonato del Mundo de Le Mans de 1966.', 8.1, 1),
(5, 'John Wick: Chapter 3 – Parabellum', 'Accion', 'John Wick se da a la fuga, pero el trabajo se le dificulta ya que es el objetivo de todos los asesinos a sueldo del mundo luego de que saliera una recompensa de 14 millones de dólares por su cabeza.', 7.5, 2),
(6, 'Joker', 'Drama', 'Arthur Fleck adora hacer reír a la gente, pero su carrera como comediante es un fracaso. El repudio social, la marginación y una serie de trágicos acontecimientos lo conducen por el sendero de la locura y, finalmente, cae en el mundo del crimen.', 9, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `id` int(11) NOT NULL,
  `letra` varchar(11) CHARACTER SET latin1 NOT NULL,
  `capacidad` int(11) NOT NULL,
  `formato` varchar(10) CHARACTER SET latin1 NOT NULL,
  `butaca` varchar(100) NOT NULL,
  `info_butaca` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`id`, `letra`, `capacidad`, `formato`, `butaca`, `info_butaca`) VALUES
(1, 'A', 120, '2D', 'D-BOX', 'Butacas programadas para moverse según los efectos especiales de la película, brindando al espectador una innovadora y diferente manera de vivir el cine. La suma de estos efectos hará la experiencia de ver una película aún más espectacular.'),
(2, 'B', 100, '3D', 'Comfort', 'Comfort es un concepto pensado para brindar la mayor comodidad. Las butacas Comfort son más amplias y cómodas, poseen apoya pies y un sistema de reclinado electrónico que permite al espectador mirar la película en un cómodo sillón casi a 180 grados.'),
(3, 'C', 150, '2D', 'XD Digital', 'Una pantalla gigante de piso a techo y de pared a pared, con posibilidad de visualizar películas tanto en 2D como en 3D en formato completamente digital, con butacas más grande y cómodas, acompañado de un impactante sistema de audio digital superior.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `password`, `admin`) VALUES
(1, 'admin@modocine.com.ar', '$2y$12$GOuGI9qa.bhNJ1Ve4vycZeyY1aCnTZ/m4UBLxE8MDg210oZ/KKqWW', 1),
(2, 'usuariocomun@usuario.com', '$2y$10$3TKAMlb4.iO21S/TaStVluF53mkKFa2hiRmeynOv16HzwWGdItxAG', 0),
(3, 'usuariocomun2@usuario.com', '$2y$10$YcjxokT7ILoQ9.nAEeG/GuyHSay3mFo6a55G.DDs1fDJIddBrTCi6', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sala` (`id_sala`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD CONSTRAINT `pelicula_ibfk_1` FOREIGN KEY (`id_sala`) REFERENCES `sala` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
