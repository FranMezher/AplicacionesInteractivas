-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2018 a las 15:42:16
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `pkgenero` smallint(6) NOT NULL,
  `genero` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`pkgenero`, `genero`) VALUES
(1, 'Horror'),
(2, 'Drama'),
(3, 'Comedia'),
(4, 'Accion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `pklibro` int(11) NOT NULL,
  `libro` varchar(200) CHARACTER SET latin1 NOT NULL,
  `autor` varchar(200) CHARACTER SET latin1 NOT NULL,
  `autor_nacional` varchar(2) CHARACTER SET latin1 NOT NULL,
  `fkgenero` smallint(6) NOT NULL,
  `fkidioma` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`pklibro`, `libro`, `autor`, `autor_nacional`, `fkgenero`, `fkidioma`) VALUES
(12, 'pepe', 'papa', 'no', 3, 2),
(13, 'harry potter', 'jk rowling', 'no', 2, 2),
(14, 'esperando la carroza', 'perciavale', 'si', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros_idiomas`
--

CREATE TABLE `libros_idiomas` (
  `pkidioma` smallint(6) NOT NULL,
  `idioma` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `libros_idiomas`
--

INSERT INTO `libros_idiomas` (`pkidioma`, `idioma`) VALUES
(1, 'Espanol'),
(2, 'ingles'),
(3, 'Espanol-ingles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `pkusuario` smallint(6) NOT NULL,
  `usuario_dni` int(11) NOT NULL,
  `nombre_usuario` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`pkusuario`, `usuario_dni`, `nombre_usuario`, `password`) VALUES
(1, 38961210, 'lucas', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`pkgenero`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`pklibro`);

--
-- Indices de la tabla `libros_idiomas`
--
ALTER TABLE `libros_idiomas`
  ADD PRIMARY KEY (`pkidioma`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`pkusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `pkgenero` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `pklibro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `libros_idiomas`
--
ALTER TABLE `libros_idiomas`
  MODIFY `pkidioma` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `pkusuario` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
