SELECT * FROM usuarios;

CREATE TABLE marca (
	id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nombre_marca VARCHAR(300) NOT NULL, 
    imagen_marca VARCHAR(300), 
    fecha_marca DATE
);
SELECT * FROM marca;

CREATE TABLE tipo_descuento (
	id INT(11) AUTO_INCREMENT PRIMARY KEY,
    descripcion_descuento VARCHAR(300) NOT NULL
);
SELECT * FROM tipo_descuento;


CREATE TABLE promocion (
	id INT(11) AUTO_INCREMENT PRIMARY KEY,
    descripcion_promocion VARCHAR(300) NOT NULL,
	fecha_inicio_promocion DATE,
	fecha_fin_promocion DATE,
	id_tipo_descuento INT(11),
	activo_descuento VARCHAR(1) DEFAULT 'A',
    CONSTRAINT fk_descuento_promocion FOREIGN KEY (id_tipo_descuento) REFERENCES tipo_descuento(id)
);
SELECT * FROM promocion


