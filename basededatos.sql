create database tienda;
use tienda;

CREATE TABLE PRODUCTOS (
    cod_producto int AUTO_INCREMENT,
    nombre varchar(50) null,
    descripcion varchar (100) null,
    precio numeric(6,2) null,
    rutaimg varchar(100) null,
    PRIMARY KEY (cod_producto)
);

CREATE TABLE PEDIDOS (
    cod_pedido int AUTO_INCREMENT,
    fecha varchar(50) null,
    correo varchar (100) null,
    total numeric(6,2) null,
    PRIMARY KEY (cod_pedido)
);

CREATE TABLE DETALLEPEDIDOS (
    cod_detallepedidos int AUTO_INCREMENT,
    cod_producto int not null,
    cod_pedido int not null,
    PRIMARY KEY (cod_detallepedidos),
    FOREIGN KEY (cod_pedido) references PEDIDOS (cod_pedido)
    ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (cod_producto) references PRODUCTOS (cod_producto)
    ON UPDATE CASCADE ON DELETE CASCADE
);

INSERT INTO PRODUCTOS (nombre, descripcion, precio, rutaimg)
VALUES ('Guantes Budha','Guantes de entrenamiento decorados al estilo mexicano','35.99','img/productos/guantesbhuda.jpg');

INSERT INTO PRODUCTOS (nombre, descripcion, precio, rutaimg)
VALUES ('Guantes Charlie','Guantes de entrenamiento marca charlie color negro','69.99','img/productos/guantescharlie.jpg');

INSERT INTO PRODUCTOS ( nombre, descripcion, precio, rutaimg)
VALUES ('Guantes Everlast','Guantes de entrenamiento marca everlast color dorado','49.99','img/productos/guanteseverlast.jpg');

INSERT INTO PRODUCTOS (nombre, descripcion, precio, rutaimg)
VALUES ('Guantes Leone','Guantes de entrenamiento para principiantes marca leone','29.99','img/productos/guantesleone.jpg');

INSERT INTO PRODUCTOS (nombre, descripcion, precio, rutaimg)
VALUES ('Guantes Shark','Guantes de entrenamiento para principiantes marca shark','49.99','img/productos/guantesshark.jpg');

INSERT INTO PRODUCTOS (nombre, descripcion, precio, rutaimg)
VALUES ('Guantes Sugar Ray','Guantes de competicion sugar ray','79.99','img/productos/guantessugarray.jpg');

INSERT INTO PRODUCTOS (nombre, descripcion, precio, rutaimg)
VALUES ('Guantes Venum','Guantes de entrenamiento para principiantes marca venum','39.99','img/productos/guantesvenum.jpg')