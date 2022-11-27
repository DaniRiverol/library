-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 27-11-2022 a las 04:46:09
-- Versión del servidor: 5.7.34
-- Versión de PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `library-mvc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `book`
--

CREATE TABLE `book` (
  `id_book` int(11) NOT NULL,
  `id_pubisher` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `edition` int(11) NOT NULL,
  `year` varchar(4) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `available` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `book`
--

INSERT INTO `book` (`id_book`, `id_pubisher`, `title`, `author`, `isbn`, `edition`, `year`, `description`, `image`, `available`) VALUES
(1, 12, 'Collins Pokect Plus', 'Varios', '9789502808468', 1, '2015', 'Diccionario Inglés/Español', 'https://http2.mlstatic.com/D_NQ_NP_746982-MLA43570570693_092020-O.jpg', 1),
(3, 12, 'Cuentos completos', 'Edgard Alan Poe', '9788491052166', 1, '2015', 'Más de 70 cuentos ', 'https://http2.mlstatic.com/D_NQ_NP_813889-MLA41586078677_042020-O.jpg', 0),
(4, 4, 'Steve Jobs', 'Walter Isaacson', '9293949596', 2, '2013', 'Biografia de Steve Jobs', 'https://contentv2.tap-commerce.com/cover/large/9789875669116_1.jpg?id_com=1113', 0),
(6, 7, 'La abuela electrónica', 'Silvia Schujer', '	9789500747158', 1, '2014', '¿Cómo será una abuela que debe enchufarse para que funcione? ¿Cómo hará esa abuela para contar historias? ', 'https://catalogos.libooks.com/9789500747158_md.webp', 1),
(7, 12, 'Animales Fantásticos ', 'J K Rowling', '9788418637056', 2, '2022', 'Siguiendo el ejemplo del magizoólogo Newt Scamander, este increíble viaje sacará a la luz las conexiones entre las criaturas prodigiosas de J. K. Rowling y los extraordinarios animales', 'https://contentv2.tap-commerce.com/cover/large/9788418637056_1.jpg?id_com=1113', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `book_rental`
--

CREATE TABLE `book_rental` (
  `id_rental` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `until_date` date NOT NULL,
  `id_book` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `book_rental`
--

INSERT INTO `book_rental` (`id_rental`, `from_date`, `until_date`, `id_book`, `id_user`) VALUES
(1, '2022-11-27', '2022-12-04', 3, 9),
(2, '2022-11-27', '2022-12-04', 6, 5),
(3, '2022-11-27', '2022-12-04', 4, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publisher`
--

CREATE TABLE `publisher` (
  `id_publisher` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `publisher`
--

INSERT INTO `publisher` (`id_publisher`, `name`, `url`, `email`) VALUES
(1, 'Atlántida', NULL, NULL),
(2, 'Biblioteca Nacional', NULL, NULL),
(3, 'Buena Vista', NULL, NULL),
(4, 'Colihue', NULL, NULL),
(5, 'Estrada', NULL, NULL),
(6, 'Editorial Biblos', NULL, NULL),
(7, 'Editorial Unipe', NULL, NULL),
(8, 'AZ Editora', NULL, NULL),
(9, 'Puerto de Palos', 'www.puertodepalos.com.ar', 'mail@puertodepalos.com.ar'),
(10, 'Editorial Aique', NULL, NULL),
(11, 'Editorial Kapeluz', NULL, NULL),
(12, 'Penguin Ramndom House Editorial', 'www.diccionarioscollins.com', NULL),
(13, 'Santillana', 'www.santillana.com.ar', 'contacto@santillana.com.ar'),
(15, 'Sudamericana', 'www.sudamericana.com.ar', 'mail@sudamericana.com.ar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `identification_document` varchar(10) NOT NULL,
  `address` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `grade` int(2) DEFAULT NULL,
  `shift` enum('TM','TT','TN','') NOT NULL,
  `role` enum('docente','alumno','admin','') NOT NULL DEFAULT 'alumno',
  `user` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `id_book_rental` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `full_name`, `identification_document`, `address`, `phone`, `grade`, `shift`, `role`, `user`, `password`, `id_book_rental`) VALUES
(1, 'Administrador', '35404938', 'La escuela', '114543450', 0, 'TN', 'admin', 'admin', '$2y$10$7xYiA/5h9uW4EO/HYfCd4u/pV9kk1MlUbgH8EBnfDJTGa4K0TDq4.', NULL),
(2, 'Juana Gutierrez', '33094534', 'Murgiondo 2410', '113204958', 7, 'TM', 'docente', 'juanagutierrez', '$2y$10$uwTUJOvwkekphmYVfRfF3eqKfwUpq8.uKAl9jPpbaR0xydtnNHHpW', NULL),
(3, 'Lius Perez', '45345312', 'No se ni donde vivo', '112094355', 3, 'TM', 'alumno', 'luisperez', '$2y$10$Oe6bnSVc/3gvEylink7hlONZPEpIf46FgSXu9LaR9eNFSTiZjns/K', NULL),
(5, 'Soledad Terrada', '46325090', 'Martiniano Chilavert 4521', '1151231239', 5, 'TT', 'alumno', 'soledadterrada', '$2y$10$DCWsS3cUFNxqiZqh8QesueIDlCimR94wNoMzcBHlo/vscvxijo1oS', NULL),
(6, 'Brian Torres', '38232574', 'Inclan 234', '1147938732', 6, 'TN', 'alumno', 'briantorres', '$2y$10$btoFzISEKFuCkSwXdOLWy.TMf4JFR.FcRczzfvH6k0Jsmld5.A5CO', NULL),
(7, 'Maria Lujan', '40980340', 'Av Lisandro de la Torre 6700', '1167234234', 4, 'TT', 'alumno', 'marialujan', '$2y$10$KjqBCl.lOiYMWixKR.9PEuwj5cUtk20dyLiWUpddj2Qct/Ml4yBCa', NULL),
(8, 'Lucia Suárez', '93230985', 'Av Brasil 230', '1142390887', 3, 'TT', 'docente', 'luciasuarez', '$2y$10$k4ss8hkkAOBX2OAH1ULpMe0/cazbZEYZDikI5BvFokqxkqzon2y7q', NULL),
(9, 'Mariano González', '78778787', 'Pasaje España 100', '1130923277', 2, 'TN', 'alumno', 'marianogonzalez', '$2y$10$Fn/5zGhF1i05.bZSrTsPreKu9r.roUOsISX8brg0Aabzk3YqoCe/C', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id_book`),
  ADD KEY `id_pubisher` (`id_pubisher`);

--
-- Indices de la tabla `book_rental`
--
ALTER TABLE `book_rental`
  ADD PRIMARY KEY (`id_rental`),
  ADD KEY `id_book` (`id_book`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`id_publisher`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `book`
--
ALTER TABLE `book`
  MODIFY `id_book` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `book_rental`
--
ALTER TABLE `book_rental`
  MODIFY `id_rental` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `publisher`
--
ALTER TABLE `publisher`
  MODIFY `id_publisher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`id_pubisher`) REFERENCES `publisher` (`id_publisher`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `book_rental`
--
ALTER TABLE `book_rental`
  ADD CONSTRAINT `book_rental_ibfk_1` FOREIGN KEY (`id_book`) REFERENCES `book` (`id_book`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
