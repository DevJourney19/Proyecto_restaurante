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
CREATE TABLE Category
( 
	id          integer  NOT NULL ,
	name                 varchar(20)  NOT NULL 
)
go

ALTER TABLE Category
	ADD CONSTRAINT XPKCategory PRIMARY KEY  CLUSTERED (id ASC)
go

CREATE TABLE Cliente
( 
	id            integer  NOT NULL ,
	fullname             varchar(30)  NOT NULL ,
	password             varchar(20)  NOT NULL ,
	direccion            varchar(30)  NULL ,
	phone_number         char(9)  NULL ,
	email                varchar(20)  NOT NULL 
)
go

ALTER TABLE Cliente
	ADD CONSTRAINT XPKCliente PRIMARY KEY  CLUSTERED (id ASC)
go

CREATE TABLE Location
( 
	id          integer  NOT NULL ,
	district             varchar(50)  NOT NULL ,
	direccion            varchar(20)  NOT NULL ,
	city                 varchar(30)  NOT NULL 
)
go

ALTER TABLE Location
	ADD CONSTRAINT XPKLocation PRIMARY KEY  CLUSTERED (id ASC)
go

CREATE TABLE Metodo_Pago
( 
	id       integer  NOT NULL ,
	name                 varchar(20)  NOT NULL 
)
go

ALTER TABLE Metodo_Pago
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

CREATE TABLE Plato
( 
	id             varchar(20)  NOT NULL ,
	title                 varchar(20)  NOT NULL ,
	src 		TEXT NOT NULL,
	price                float  NULL ,
	stars		integer NOT NULL,
	amount 		integer NULL DEFAULT 1,
	description          varchar(50)  NOT NULL ,
	category_id          integer  NULL 
)
go

ALTER TABLE Plato
	ADD CONSTRAINT XPKPlato PRIMARY KEY  CLUSTERED (id ASC)
go

CREATE TABLE Reservation
( 
	id       varchar(20)  NOT NULL ,
	fullname         varchar(100)  NULL ,
	consult_type 		varchar(50) NOT NULL,
	email            varchar(20)  NOT NULL ,
	phone_number            varchar(20)  NOT NULL ,
	companions       integer  NULL ,
	fecha_hora           datetime NULL ,
	mensaje_adicional    varchar(20)  NULL ,
	location_id          integer  NULL 
)
go

ALTER TABLE Reservation
	ADD CONSTRAINT XPKReservation PRIMARY KEY  CLUSTERED (id ASC)
go

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

ALTER TABLE Plato
	ADD CONSTRAINT R_5 FOREIGN KEY (category_id) REFERENCES Category(id)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION
go

ALTER TABLE Reservation
	ADD CONSTRAINT R_1 FOREIGN KEY (location_id) REFERENCES Location(id)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION
go

INSERT INTO Location (location_id, district, direccion, city)
VALUES (1, 'Miraflores', 'Av La Colmena-Bellavista, Garcia Nelaza 1948', 'Lima');
go

INSERT INTO Location (location_id, district, direccion, city)
VALUES (2, 'Santiago de Surco', 'Av Paraiso, Mendoza 1568', 'Lima');
go

INSERT INTO Location (location_id, district, direccion, city)
VALUES (3, 'San Isidro', 'Av Primavera, Magna Loza 4157', 'Lima');
go

INSERT INTO platos (id, title, src, alt, description, stars, price, amount, type) VALUES
(1, 'Lomo Saltado', 'assets/img/lomo_saltado.png', 'Lomo Saltado', 'Delicioso plato peruano que combina tiernos trozos de lomo de res con cebolla, tomate y papas fritas', 5, 26.50, 1, 'Principal'),
(2, 'Ensalada César', 'assets/img/ensalada_cesar.png', 'Ensalada César', 'Clásica ensalada con lechuga romana, crutones, queso parmesano y aderezo César.', 4, 15.00, 1, 'Ensalada'),
(3, 'Causa Limeña', 'assets/img/causa.png', 'Causa Limeña', 'Puré de papas sazonado con ají amarillo y relleno de pollo, atún o mariscos.', 5, 12.00, 1, 'Aperitivo'),
(4, 'Chicha Morada', 'assets/img/chicha_morada.webp', 'Chicha Morada', 'Refrescante bebida peruana hecha de maíz morado, piña, manzana y especias.', 4, 8.00, 1, 'Bebida'),
(5, 'Suspiro a la Limeña', 'assets/img/suspiro.gif', 'Suspiro a la Limeña', 'Delicioso postre peruano hecho de leche condensada, azúcar, yemas de huevo y merengue.', 5, 10.00, 1, 'Postre'),
(6, 'Seco de Cordero', 'assets/img/seco.png', 'Seco de Cordero', 'Guiso de cordero cocido lentamente con cilantro, ají amarillo y cerveza.', 4, 29.00, 1, 'Principal'),
(7, 'Ensalada de Quinoa', 'assets/img/ensalada_quinoa.png', 'Ensalada de Quinoa', 'Ensalada nutritiva con quinoa, tomates cherry, pepino, y vinagreta de limón.', 5, 23.00, 1, 'Ensalada'),
(8, 'Anticuchos', 'assets/img/anticucho.png', 'Anticuchos', 'Brochetas de corazón de res marinadas en ají panca y especias, servidas con papas doradas.', 5, 14.00, 1, 'Aperitivo'),
(9, 'Pisco Sour', 'assets/img/pisco_sour.png', 'Pisco Sour', 'Cóctel clásico peruano hecho con pisco, jugo de limón, jarabe de goma, clara de huevo y amargo de angostura.', 5, 13.00, 1, 'Bebida'),
(10, 'Turrón de Doña Pepa', 'assets/img/turron.png', 'Turrón de Doña Pepa', 'Dulce tradicional hecho con barras de harina de trigo, bañadas en miel de chancaca y decoradas con caramelos.', 4, 9.00, 1, 'Postre'),
(11, 'Ají de Gallina', 'assets/img/Ajide_gallina.jpeg', 'Ají de Gallina', 'Suave pollo desmenuzado en una cremosa salsa de ají amarillo y nueces. ¡Un clásico reconfortante!', 5, 25.00, 1, 'Principal'),
(12, 'Arroz con Pato', 'assets/img/Arrozcon_pato.jpg', 'Arroz con Pato', 'Exquisito pato cocido a la perfección con arroz verde y especias. ¡Un deleite del norte del Perú!', 5, 35.00, 1, 'Principal'),
(13, 'Solterito', 'assets/img/Solterito.jpg', 'Solterito', 'Fresca mezcla de choclo, habas y queso fresco. ¡Ideal para los días calurosos!', 4, 15.00, 1, 'Ensalada'),
(14, 'Ensalada de Betarraga', 'assets/img/Betarraga.jpg', 'Ensalada de Betarraga', 'Dulce betarraga cocida con zanahoria y papa, aderezada con mayonesa. ¡Un toque dulce y salado!', 4, 12.00, 1, 'Ensalada'),
(15, 'Papa a la Huancaína', 'assets/img/Huancaina.jpg', 'Papa a la Huancaína', 'Rodajas de papa cubiertas con una cremosa salsa de queso y ají. ¡Irresistiblemente deliciosa!', 5, 12.00, 1, 'Aperitivo'),
(16, 'Tamalitos Verdes', 'assets/img/Tamal_verde.jpeg', 'Tamalitos Verdes', 'Tamales verdes de maíz con cilantro, rellenos de carne. ¡Sabor tradicional en cada bocado!', 4, 10.00, 1, 'Aperitivo'),
(17, 'Emoliente', 'assets/img/Emoliente.png', 'Emoliente', 'Bebida caliente a base de granos tostados de cebada, extractos de hierbas medicinales. ¡Reconfortante y saludable!', 4, 8.00, 1, 'Bebida'),
(18, 'Chicha de Jora', 'assets/img/Jora.jpg', 'Chicha de Jora', 'Maíz germinado, denominado Jora, diferentes frutos y especias aromáticas.', 4, 8.00, 1, 'Bebida'),
(19, 'Mazamorra Morada', 'assets/img/Mazamorra_morada.png', 'Mazamorra Morada', 'Postre con frutas frescas y un toque de canela, tradicional peruano que te sorprenderá.', 5, 10.00, 1, 'Postre'),
(20, 'Picarones', 'assets/img/Picarones.jpg', 'Picarones', 'Irresistibles Picarones bañados en miel de chancaca. El postre perfecto para un dulce momento de placer.', 4, 10.00, 1, 'Postre');
go
```
## Cambio de puertos
- Cambiar el puerto, dependiendo de tu servidor local (XAMPP), para evitar conflictos.
  
![Cambiar puerto](puerto_mysql.jpg)

