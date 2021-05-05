-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2021 a las 00:15:55
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
  `code` varchar(5) NOT NULL,
  `admission_date` date NOT NULL DEFAULT current_timestamp(),
  `departure_date` date NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `is_pad` tinyint(1) NOT NULL DEFAULT 0,
  `names` varchar(45) NOT NULL,
  `surnames` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `room_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 101, 1, '31.00', '30.50', 2),
(2, 29, 1, '65.00', '538.00', 9),
(5, 159, 1, '44.00', '954.00', 11),
(6, 806, 1, '2.00', '92.00', 8),
(8, 126, 1, '15.00', '533.00', 9),
(9, 622, 0, '59.00', '786.00', 2),
(10, 702, 0, '73.85', '587.00', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `room_photos`
--

CREATE TABLE `room_photos` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `url` varchar(50) NOT NULL,
  `room_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 'Qui dolor autem dolo', 3),
(5, 'Quia debitis tempore', 2),
(7, 'Corporis provident ', 3),
(8, 'Exercitation officii', 3),
(9, 'Sint mollit dicta ip', 2),
(10, 'Quis excepteur in in', 1),
(11, 'Et eu irure perspici', 4),
(13, 'Sed est in magni co', 2);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `room_photos`
--
ALTER TABLE `room_photos`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `type_rooms`
--
ALTER TABLE `type_rooms`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
