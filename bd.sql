CREATE DATABASE pruebaweb;
USE
    pruebaweb;
CREATE TABLE categorias(
    id_categoria INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombrecategoria VARCHAR(50),
    descripcioncategoria VARCHAR(50)
);
CREATE TABLE productos(
    id_producto INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_categoria INT NOT NULL,
    nombreproducto VARCHAR(50),
    descripcionproducto VARCHAR(50),
    FOREIGN KEY(id_categoria) REFERENCES categorias(id_categoria)
);
