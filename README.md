## Primera Actualizacion
- Se requiere de una base de datos local en phpmyadmi llamada restaurante para poder ejecutar el proyecto y la tabla clientes para la lectura de los usuarios.
```sql
-- Para avance 5 usar--
CREATE DATABASE restaurante;
USE restaurante;
CREATE TABLE clientes (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre_completo VARCHAR(50),
  correo VARCHAR(50),
  usuario VARCHAR(150),
  contrasena VARCHAR(150)
);
```
## Tablas
```sql
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3308
-- Tiempo de generación: 14-07-2024 a las 04:37:36
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Principal'),
(2, 'Ensalada'),
(3, 'Aperitivo'),
(4, 'Bebida'),
(5, 'Postre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `password` blob NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id`, `fullname`, `password`, `email`, `username`) VALUES
(3, 'Elena', 0x81f44672f7707f551ea23c36b66f7afe, 'easp0104@gmail.com', 'lena');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `district` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `city` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `location`
--

INSERT INTO `location` (`id`, `district`, `address`, `city`) VALUES
(1, 'Miraflores', 'Av La Colmena-Bellav', 'Lima'),
(2, 'Santiago de Surco', 'Av Paraiso, Mendoza ', 'Lima'),
(3, 'San Isidro', 'Av Primavera, Magna ', 'Lima');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `type_order` varchar(50) DEFAULT NULL,
  `total_price` float NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `payment_method` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `address` varchar(150) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `amount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `type_order`, `total_price`, `location_id`, `client_id`, `payment_method`, `created_at`, `address`, `phone_number`, `amount`) VALUES
(17, 'online', 59, 1, 3, 'visa', '2024-07-13 18:47:40', 'dsdsds', 'dsdsds', 0),
(18, 'online', 125, 3, 3, 'visa', '2024-07-13 18:49:40', 'las esmeraldas 1650', '912905731', 0),
(19, 'online', 125, 1, 3, 'visa', '2024-07-13 18:50:38', 'dsdsdsd', 'dsdsdddddddddddddddd', 0),
(20, 'online', 125, 1, 3, 'visa', '2024-07-13 18:54:11', 'dsds', 'dsdsdsds', 0),
(21, 'online', 125, 1, 3, 'visa', '2024-07-13 18:55:35', 'dsds', 'dsdsdsds', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `order_detail`
--

INSERT INTO `order_detail` (`id`, `quantity`, `subtotal`, `order_id`, `product_id`) VALUES
(26, 2, 30, 17, 2),
(27, 1, 29, 17, 6),
(28, 2, 30, 18, 2),
(29, 1, 8, 18, 4),
(30, 3, 87, 18, 6),
(31, 2, 30, 19, 2),
(32, 1, 8, 19, 4),
(33, 3, 87, 19, 6),
(34, 2, 30, 20, 2),
(35, 1, 8, 20, 4),
(36, 3, 87, 20, 6),
(37, 2, 30, 21, 2),
(38, 1, 8, 21, 4),
(39, 3, 87, 21, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `src` text NOT NULL,
  `price` float DEFAULT NULL,
  `stars` int(11) NOT NULL,
  `amount` int(11) DEFAULT 1,
  `description` varchar(50) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `title`, `src`, `price`, `stars`, `amount`, `description`, `category_id`) VALUES
(1, 'Lomo Saltado', 'assets/img/lomo_saltado.png', 26.5, 5, 1, 'Delicioso plato peruano que combina tiernos trozos', 1),
(2, 'Ensalada César', 'assets/img/ensalada_cesar.png', 15, 4, 1, 'Clásica ensalada con lechuga romana, crutones, que', 2),
(3, 'Causa Limeña', 'assets/img/causa.png', 12, 5, 1, 'Puré de papas sazonado con ají amarillo y relleno ', 3),
(4, 'Chicha Morada', 'assets/img/chicha_morada.webp', 8, 4, 1, 'Refrescante bebida peruana hecha de maíz morado, p', 4),
(5, 'Suspiro a la Limeña', 'assets/img/suspiro.gif', 10, 5, 1, 'Delicioso postre peruano hecho de leche condensada', 5),
(6, 'Seco de Cordero', 'assets/img/seco.png', 29, 4, 1, 'Guiso de cordero cocido lentamente con cilantro, a', 1),
(7, 'Ensalada de Quinoa', 'assets/img/ensalada_quinoa.png', 23, 5, 1, 'Ensalada nutritiva con quinoa, tomates cherry, pep', 2),
(8, 'Anticuchos', 'assets/img/anticucho.png', 14, 5, 1, 'Brochetas de corazón de res marinadas en ají panca', 3),
(9, 'Pisco Sour', 'assets/img/pisco_sour.png', 13, 5, 1, 'Cóctel clásico peruano hecho con pisco, jugo de li', 4),
(10, 'Turrón de Doña Pepa', 'assets/img/turron.png', 9, 4, 1, 'Dulce tradicional hecho con barras de harina de tr', 5),
(11, 'Ají de Gallina', 'assets/img/Ajide_gallina.jpeg', 25, 5, 1, 'Suave pollo desmenuzado en una cremosa salsa de aj', 1),
(12, 'Arroz con Pato', 'assets/img/Arrozcon_pato.jpg', 35, 5, 1, 'Exquisito pato cocido a la perfección con arroz ve', 1),
(13, 'Solterito', 'assets/img/Solterito.jpg', 15, 4, 1, 'Fresca mezcla de choclo habas y queso fresco. ¡Ide', 2),
(14, 'Ensalada de Betarrag', 'assets/img/Betarraga.jpg', 12, 4, 1, 'Dulce betarraga cocida con zanahoria y papa, adere', 2),
(15, 'Papa a la Huancaína', 'assets/img/Huancaina.jpg', 12, 5, 1, 'Rodajas de papa cubiertas con una cremosa salsa de', 3),
(16, 'Tamalitos Verdes', 'assets/img/Tamal_verde.jpeg', 10, 4, 1, 'Tamales verdes de maíz con cilantro, rellenos de c', 3),
(17, 'Emoliente', 'assets/img/Emoliente.png', 8, 4, 1, 'Bebida caliente a base de granos tostados de cebad', 4),
(18, 'Chicha de Jora', 'assets/img/Jora.jpg', 8, 4, 1, 'Maíz germinado, denominado Jora, diferentes frutos', 4),
(19, 'Mazamorra Morada', 'assets/img/Mazamorra_morada.png', 10, 5, 1, 'Postre con frutas frescas y un toque de canela, tr', 5),
(20, 'Picarones', 'assets/img/Picarones.jpg', 10, 4, 1, 'Irresistibles Picarones bañados en miel de chancac', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NULL,
  `fullname` varchar(150) NOT NULL,
  `consult_type` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `companions` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `message` varchar(300) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservation`
--

INSERT INTO `reservation` (`id`, `client_id`, `fullname`, `consult_type`, `email`, `phone_number`, `companions`, `date`, `time`, `message`, `location_id`) VALUES
(5, 3,'Elena Suarez', 'mensajes', 'easp0104@gmail.com', '912905731', 0, '0000-00-00', '00:00:00', 'Hola', NULL),
(10, 3,'Elena', 'mensaje', 'easp0104@gmail.com', '912478321', 0, '0000-00-00', '00:00:00', 'Dsds', NULL),
(11, 3, 'Elena', 'reservacion', 'ea@hotmail.com', '912478321', 5, '2024-06-25', '12:00:00', 'Dsdsdsdsds', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location_id` (`location_id`) USING BTREE,
  ADD KEY `client_id` (`client_id`) USING BTREE;

--
-- Indices de la tabla `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`product_id`) USING BTREE,
  ADD KEY `order_id` (`order_id`) USING BTREE;

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indices de la tabla `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);
  

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
    ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



```
## Cambio de puertos
- Cambiar el puerto, dependiendo de tu servidor local (XAMPP), para evitar conflictos.
  
![Cambiar puerto](puerto_mysql.jpg)

