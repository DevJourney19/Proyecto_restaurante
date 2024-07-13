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
## Posterior Actualizacion
- Todavia no usar esta base de datos
```sql
CREATE DATABASE restaurante;
USE restaurante;

CREATE TABLE Client
( 
	id            integer  NOT NULL ,
	fullname             varchar(30)  NOT NULL ,
	password             varchar(20)  NOT NULL ,
	direccion            varchar(30)  NULL ,
	phone_number         char(9)  NULL ,
	email                varchar(20)  NOT NULL 
)
go

ALTER TABLE Client
	ADD CONSTRAINT XPKCliente PRIMARY KEY  CLUSTERED (id ASC)
go

CREATE TABLE Payment_method
( 
	id       integer  NOT NULL ,
	name                 varchar(20)  NOT NULL 
)
go

ALTER TABLE Payment_method
	ADD CONSTRAINT XPKMetodo_Pago PRIMARY KEY  CLUSTERED (id ASC)
go

CREATE TABLE Order_Detail
( 
	id      integer  NOT NULL ,
	cantidad_platos      integer  NOT NULL ,
	subtotal             integer  NOT NULL ,
	order_id             integer  NULL ,
	plato_id             varchar(20)  NULL 
)
go

ALTER TABLE Order_Detail
	ADD CONSTRAINT XPKOrder_Detail PRIMARY KEY  CLUSTERED (id ASC)
go

CREATE TABLE Orders
( 
	id             integer  NOT NULL ,
	fecha_hora                datetime  NOT NULL ,
	tipo_pedido          varchar(30)  NOT NULL ,
	precio_total         float  NULL ,
	location_id          integer  NULL ,
	client_id            integer  NULL ,
	metodo_pago_id       integer  NULL 
)
go

ALTER TABLE Orders
	ADD CONSTRAINT XPKOrders PRIMARY KEY  CLUSTERED (id ASC)
go

CREATE TABLE Reservation
( 
	id       integer  NOT NULL PRIMARY KEY AUTO_INCREMENT ,
	fullname         varchar(150) NOT NULL ,
	consult_type 		varchar(50) NOT NULL,
	email            varchar(100)  NOT NULL ,
	phone_number            varchar(20)  NOT NULL ,
	companions       integer  NULL ,
	date          date NULL ,
	time 	      time NULL,
	message    varchar(300)  NULL ,
	location_id          integer  NULL,
    FOREIGN KEY fk_loc(location_id) REFERENCES location(id)
);

ALTER TABLE Order_Detail
	ADD CONSTRAINT R_6 FOREIGN KEY (order_id) REFERENCES Orders(id)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION
go

ALTER TABLE Order_Detail
	ADD CONSTRAINT R_7 FOREIGN KEY (plato_id) REFERENCES Plato(id)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION
go

ALTER TABLE Orders
	ADD CONSTRAINT R_2 FOREIGN KEY (location_id) REFERENCES Location(id)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION
go

ALTER TABLE Orders
	ADD CONSTRAINT R_3 FOREIGN KEY (client_id) REFERENCES Cliente(id)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION
go

ALTER TABLE Orders
	ADD CONSTRAINT R_4 FOREIGN KEY (metodo_pago_id) REFERENCES Metodo_Pago(id)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION
go

CREATE TABLE Location
( 
	id          integer  NOT NULL AUTO_INCREMENT PRIMARY KEY,
	district             varchar(50)  NOT NULL ,
	address            varchar(150)  NOT NULL ,
	city                 varchar(30)  NOT NULL 
);

INSERT INTO Location (district, address, city)
VALUES ( 'Miraflores', 'Av La Colmena-Bellavista, Garcia Nelaza 1948', 'Lima');

INSERT INTO Location (district, address, city)
VALUES ('Santiago de Surco', 'Av Paraiso, Mendoza 1568', 'Lima');

INSERT INTO Location (district, address, city)
VALUES ('San Isidro', 'Av Primavera, Magna Loza 4157', 'Lima');

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

ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

ALTER TABLE `products`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

```
## Cambio de puertos
- Cambiar el puerto, dependiendo de tu servidor local (XAMPP), para evitar conflictos.
  
![Cambiar puerto](puerto_mysql.jpg)

