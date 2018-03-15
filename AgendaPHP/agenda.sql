-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-03-2018 a las 01:53:58
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agenda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `dia_completo` tinyint(1) NOT NULL,
  `fk_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `titulo`, `start`, `end`, `dia_completo`, `fk_usuario`) VALUES
(155862973, 'Trabajo', '2018-03-14 16:30:00', '2018-03-14 17:30:00', 0, 'mreyes@gmail.com'),
(156096051, 'Cena', '2018-03-21 19:00:00', '2018-03-21 22:00:00', 0, 'mreyes@gmail.com'),
(160221152, 'Pileta', '2018-03-14 07:00:00', '2018-03-14 14:00:00', 0, 'mreyes@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `email` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`email`, `nombre`, `contrasena`, `fecha_nacimiento`) VALUES
('carlos_gomez@gmail.com', 'Carlos Gomez', '$2y$10$zejjWJudC51mE79nkS0EiO0g1P6Jp/35J/xdKxi.k82/k.VJvls8u', '0000-00-00'),
('gloria_m@gmail.com', 'Gloria Miralles', '$2y$10$LTtdSzECaRMDNdKdAIhPDO/EwsJrlLBSiaiRs6VHz0hZa5Y/gKhw6', '0000-00-00'),
('mreyes@gmail.com', 'Maximiliano Reyes', '$2y$10$sK4YNqOr.uRSUhbdCxGWq.ctQkGRTNAQJ7SDmmaGu297Kb5M4U18a', '0000-00-00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `user_evento` (`fk_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD UNIQUE KEY `email` (`email`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `user_evento` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
