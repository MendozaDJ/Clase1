-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 12-03-2024 a las 16:16:28
-- Versión del servidor: 8.0.17
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdre`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`) VALUES
(1, 'David', 'D1@gmail.com', '12345678'),
(2, 'Manuel', 'M1@gmail.com', '12345678'),
(3, 'Juan Pérez', 'J1@gmail.com', '12345678'),
(4, 'María Rodríguez', 'M2@gmail.com', 'abcdefg'),
(5, 'Carlos Gutiérrez', 'C3@gmail.com', 'qwerty123'),
(6, 'Laura García', 'L4@gmail.com', 'password123'),
(7, 'Pedro Martínez', 'P5@gmail.com', 'pass1234'),
(12, 'Pepe', 'pepe@gmail.com', ''),
(13, 'Pedro', 'pepe@gmail.com', 'pepe'),
(14, 'SamuelL', 'LJackson@gmail.com', ''),
(15, 'Lionel Messi', 'LM@sise.com.pe', '1234'),
(16, 'Juancho', '12@gmail.com', '123345'),
(17, 'a', 'a@gmail.com', 'a'),
(18, 'nadne', 'as66@gmail.com', 'as'),
(19, 'nadne', 'as66@gmail.com', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
