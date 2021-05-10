-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-05-2021 a las 01:49:48
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_hotel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservations`
--

CREATE TABLE `reservations` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(16) NOT NULL,
  `admission_date` date NOT NULL,
  `departure_date` date NOT NULL,
  `is_pad` tinyint(1) NOT NULL DEFAULT 0,
  `names` varchar(45) NOT NULL,
  `surnames` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `room_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservations`
--

INSERT INTO `reservations` (`id`, `code`, `admission_date`, `departure_date`, `is_pad`, `names`, `surnames`, `email`, `room_id`) VALUES
(5, '60974ce11862f', '2021-05-16', '2021-05-18', 1, 'Julie Vance', 'Melendez', 'xozimuh@mailinator.com', 13),
(6, '60974da37297e', '2021-05-10', '2021-05-13', 1, 'Jaime Ingram', 'Molina', 'xubib@mailinator.com', 17),
(7, '6097641d01312', '2021-05-17', '2021-05-20', 1, 'Malachi Zimmerman', 'Callahan', 'sypiw@mailinator.com', 12),
(8, '609832b68f191', '2021-05-12', '2021-05-13', 1, 'Rinah Ayers', 'Koch', 'lyzykutara@mailinator.com', 15),
(9, '6098384a03b98', '2021-05-12', '2021-05-14', 1, 'Amaya Gould', 'Hardin', 'gihykevu@mailinator.com', 13),
(10, '60983b12c70f2', '2021-05-11', '2021-05-13', 1, 'Cody Montoya', 'Hampton', 'higed@mailinator.com', 12),
(11, '6099c29832970', '2021-05-12', '2021-05-12', 1, 'Naomi Wagner', 'Trujillo', 'runumeco@mailinator.com', 17),
(12, '6099c51ba1d16', '2021-05-14', '2021-05-15', 1, 'Keelie Franco', 'Perez', 'vocy@mailinator.com', 12),
(13, '6099c5f3f1e08', '2021-05-29', '2021-05-30', 0, 'Samson Roy', 'Spencer', 'fiwysur@mailinator.com', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rooms`
--

CREATE TABLE `rooms` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `number` smallint(5) UNSIGNED NOT NULL,
  `has_private_bathroom` tinyint(1) NOT NULL DEFAULT 0,
  `space` decimal(7,2) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `type_room_id` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rooms`
--

INSERT INTO `rooms` (`id`, `number`, `has_private_bathroom`, `space`, `price`, `type_room_id`) VALUES
(12, 236, 1, '94.00', '971.00', 9),
(13, 85, 1, '25.00', '68.00', 16),
(14, 650, 1, '64.00', '50.00', 16),
(15, 992, 1, '58.00', '324.00', 5),
(16, 20, 1, '63.00', '323.00', 16),
(17, 517, 0, '34.00', '453.00', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `room_photos`
--

CREATE TABLE `room_photos` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `room_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `room_photos`
--

INSERT INTO `room_photos` (`id`, `name`, `room_id`) VALUES
(25, '60979e28c2aa3.jpg', 12),
(27, '60979e52dafd9.jpg', 12),
(28, '60979eb0c4196.jpg', 13),
(29, '60979eb0d6fce.jpg', 13),
(30, '60979eb115d1a.jpg', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_rooms`
--

CREATE TABLE `type_rooms` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `description` varchar(70) NOT NULL,
  `number_beds` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `type_rooms`
--

INSERT INTO `type_rooms` (`id`, `description`, `number_beds`) VALUES
(5, 'Doble', 2),
(7, 'Triple', 3),
(8, 'Matrimonial', 1),
(9, 'Suite', 2),
(16, 'Individual', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `room_reservation_fk_id` (`room_id`);

--
-- Indices de la tabla `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_room_room_fk_id` (`type_room_id`);

--
-- Indices de la tabla `room_photos`
--
ALTER TABLE `room_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_room_photo_fk_id` (`room_id`);

--
-- Indices de la tabla `type_rooms`
--
ALTER TABLE `type_rooms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `room_photos`
--
ALTER TABLE `room_photos`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `type_rooms`
--
ALTER TABLE `type_rooms`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `room_reservation_fk_id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `type_room_room_fk_id` FOREIGN KEY (`type_room_id`) REFERENCES `type_rooms` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `room_photos`
--
ALTER TABLE `room_photos`
  ADD CONSTRAINT `room_room_photo_fk_id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
