CREATE DATABASE tienda_master;
use tienda_master;

CREATE TABLE usuarios (
  id int(255) auto_increment NOT NULL,
  nombre varchar(100) DEFAULT NULL,
  apellidos varchar(255) DEFAULT NULL,
  email varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  rol varchar(25) DEFAULT NULL,
  imagen varchar(255) DEFAULT NULL,
  CONSTRAINT pk_usuarios PRIMARY KEY (id),
  CONSTRAINT  uq_email UNIQUE(email) 
) ENGINE=InnoDB;

INSERT INTO usuarios VALUES(null, 'admin', 'admin', 'admin@admin.com', '1234', 'admin', null);

CREATE TABLE categorias(
  id int(255) auto_increment NOT NULL,
  nombre varchar(100) DEFAULT NULL,
  CONSTRAINT pk_categorias PRIMARY KEY(id)  
) ENGINE=InnoDB;

INSERT INTO categorias VALUES (null, 'Manga corta');
INSERT INTO categorias VALUES (null, 'Tirantes');
INSERT INTO categorias VALUES (null, 'Manga larga');
INSERT INTO categorias VALUES (null, 'Sudaderas');

CREATE TABLE productos (
  id int(255) auto_increment NOT NULL,
  categoria_id int(255) NOT NULL,
  nombre varchar(100) NOT NULL,
  descripcion text DEFAULT NULL,
  precio float(100,2) NOT NULL,
  stock int(255) NOT NULL,
  oferta varchar(2) DEFAULT NULL,
  fecha date NOT NULL,
  imagen varchar(255) DEFAULT NULL,
  CONSTRAINT pk_productos PRIMARY KEY(id),
  CONSTRAINT fk_producto_categoria FOREIGN KEY(categoria_id) REFERENCES categorias(id)
) ENGINE=InnoDB;

CREATE TABLE pedidos (
  id int(255) auto_increment NOT NULL,
  usuario_id int(255) NOT NULL,
  provincia varchar(150) NOT NULL,
  localidad varchar(150) NOT NULL,
  direccion varchar(255) NOT NULL,
  coste float(200,2) NOT NULL,
  estado varchar(20) NOT NULL,
  fecha date DEFAULT NULL,
  hora time DEFAULT NULL,
  CONSTRAINT pk_pedidos PRIMARY KEY(id),
  CONSTRAINT fk_pedido_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id) 
) ENGINE=InnoDB;

CREATE TABLE lineas_pedidos (
  id int(255) auto_increment NOT NULL,
  pedido_id int(255) NOT NULL,
  producto_id int(255) NOT NULL,
  unidades int(10) NOT NULL,
  CONSTRAINT pk_lineas_pedidos PRIMARY KEY(id),
  CONSTRAINT fk_linea_pedido FOREIGN KEY(pedido_id) REFERENCES pedidos(id),  
  CONSTRAINT fk_linea_producto FOREIGN KEY(producto_id) REFERENCES productos(id) 
) ENGINE=InnoDB;


