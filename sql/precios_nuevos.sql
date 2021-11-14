drop table preciosnuevos;
create table preciosnuevos(
	idarticulo MEDIUMINT,
	marca varchar(80),
	descripcion varchar(80),
	contenido varchar(80),
	presentacion varchar(80),
	clasificacion varchar(80),
	subclasificacion varchar(80),
	codigo_barra varchar(80),
	precio_contado double(10,4),
	precio_tarjeta double(10,4),
	stock double(12,0),
	minimo double(12,0),
	maximo double(12,0),
	sucursal varchar(20),
  	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (id)
);
